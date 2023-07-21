<?php
session_start();
include("../php/conexion.php");

$cart_id = $_GET['cart_id'];

$queryUsuario = "SELECT user_id FROM Carrito_de_compras WHERE cart_id = ?";
$stmtUsuario = $conn->prepare($queryUsuario);
$stmtUsuario->bind_param("i", $cart_id);
$stmtUsuario->execute();
$resultUsuario = $stmtUsuario->get_result();
$Usuario = $resultUsuario->fetch_assoc();

$user_name = "";
$user_dni = "";
$user_direccion = "";
$user_ciudad = "";
$user_region = "";
$user_distrito = "";
$user_telefono = "";

$query = "SELECT e.quantity, p.product_name, p.image, t.talla_nombre FROM elementos_del_carrito e 
INNER JOIN productos p ON e.product_id = p.product_id 
LEFT JOIN productos_tallas pt ON e.producto_talla_id = pt.producto_talla_id
LEFT JOIN tallas t ON pt.talla_id = t.talla_id
WHERE e.cart_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cart_id);
$stmt->execute();
$result = $stmt->get_result();

if ($Usuario !== null) {
    $user_id = $Usuario['user_id'];

    // Obtener los datos del usuario
    $queryUser = "SELECT name, dni, direccion, ciudad, region, distrito, telefono FROM Usuarios WHERE user_id = ?";
    $stmtUser = $conn->prepare($queryUser);
    $stmtUser->bind_param("i", $user_id);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser && mysqli_num_rows($resultUser) > 0) {
        $user = mysqli_fetch_assoc($resultUser);
        $user_name = $user['name'];
        $user_dni = $user['dni'];
        $user_direccion = $user['direccion'];
        $user_ciudad = $user['ciudad'];
        $user_region = $user['region'];
        $user_distrito = $user['distrito'];
        $user_telefono = $user['telefono'];
    }
}

if (isset($_POST["pagar"])) {
    // Recuperar elementos del carrito
    $querycartelements = "SELECT e.quantity, p.product_id, p.precio, t.talla_id, p.product_name, p.image, t.talla_nombre
    FROM elementos_del_carrito e
    INNER JOIN productos p ON e.product_id = p.product_id
    LEFT JOIN tallas t ON e.producto_talla_id = t.talla_id
    WHERE e.cart_id = ?";
    $stmt = $conn->prepare($querycartelements);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $status = 'pendiente';
    $created_at = date('Y-m-d H:i:s');

    $queryPedido = "INSERT INTO PEDIDO (user_id, created_at, status, total) VALUES (?, ?, ?, ?)";
    $stmtPedido = $conn->prepare($queryPedido);
    $stmtPedido->bind_param("issd", $user_id, $created_at, $status, $total);
    $stmtPedido->execute();

    // Obtener el ID del pedido recién insertado
    $pedido_id = $stmtPedido->insert_id;

    $queryDetalle = "INSERT INTO DETALLE_PEDIDO (pedido_id, product_id, producto_talla_id, quantity) VALUES (?, ?, ?, ?)";
    $stmtDetalle = $conn->prepare($queryDetalle);
    $stmtDetalle->bind_param("iiii", $pedido_id, $product_id, $producto_talla_id, $quantity);

    $total = 0; // Inicializar la variable $total

    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $producto_talla_id = $row['talla_id'];
        $quantity = $row['quantity'];
        $precio = $row['precio'];
        $subTotal = $precio * $quantity;
        $total += $subTotal;

        $stmtDetalle->execute();
    }

    // Actualizar el total en la tabla de pedidos
    $queryPedidoUpdate = "UPDATE PEDIDO SET total = ? WHERE pedido_id = ?";
    $stmtPedidoUpdate = $conn->prepare($queryPedidoUpdate);
    $stmtPedidoUpdate->bind_param("di", $total, $pedido_id);
    $stmtPedidoUpdate->execute();

    $queryEliminar = "DELETE FROM elementos_del_carrito WHERE cart_id = ?";
    $stmtEliminar = $conn->prepare($queryEliminar);
    $stmtEliminar->bind_param("i", $cart_id);
    $stmtEliminar->execute();

    $queryEliminarCarrito = "DELETE FROM carrito_de_compras WHERE cart_id = ?";
    $stmtEliminarCart = $conn->prepare($queryEliminarCarrito);
    $stmtEliminarCart->bind_param("i", $cart_id);
    $stmtEliminarCart->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final</title>
    <link rel="stylesheet" href="../assets/css/final.css">
</head>

<body>
    <main>
        <div class="container-info">
            <div class="info-pedido-direccion">
                <div class="info-pedido-logo">
                    <img src="../assets/images/logo_retro_groove.png" alt="">
                    <nav class="nav-info">
                        <a href="">Carrito</a>
                        <span>&gt;</span>
                        <a href="">Información</a>
                        <span>&gt;</span>
                        <a>Envios</a>
                        <span>&gt;</span>
                        <a>Pago</a>
                        <span>&gt;</span>
                        <a class="info">Final</a>
                    </nav>
                </div>
                <div class="container-info">
                    <div class="info-pedido-direccion">
                        <div class="title-info">
                            <h2>Detalles finales de la compra</h2>
                        </div>
                        <form method="POST" id="form-information" action="https://formspree.io/f/mgejebvw">
                            <div class="nombre">
                                <label for="nombre-a">Nombre:</label>
                                <span>
                                    <?php echo $user_name; ?>
                                </span>
                                <input type="hidden" id="nombre-a" name="nombre" value="<?php echo $user_name; ?>">
                            </div>
                            <div class="direccion">
                                <label for="direccion-a">Dirección:</label>
                                <span>
                                    <?php echo $user_direccion; ?>
                                </span>
                                <input type="hidden" id="direccion-a" name="direccion"
                                    value="<?php echo $user_direccion; ?>">
                            </div>
                            <div class="dni">
                                <label for="dni-a">DNI:</label>
                                <span>
                                    <?php echo $user_dni; ?>
                                </span>
                                <input type="hidden" id="dni-a" name="dni" value="<?php echo $user_dni; ?>">
                            </div>
                            <div class="ciudad">
                                <label for="ciudad-a">Ciudad:</label>
                                <span>
                                    <?php echo $user_ciudad; ?>
                                </span>
                                <input type="hidden" id="ciudad-a" name="ciudad" value="<?php echo $user_ciudad; ?>">
                            </div>
                            <div class="telefono">
                                <label for="telefono-a">Teléfono:</label>
                                <span>
                                    <?php echo $user_telefono; ?>
                                </span>
                                <input type="hidden" id="telefono-a" name="telefono"
                                    value="<?php echo $user_telefono; ?>">
                            </div>

                            <?php
                            $total = 0;
                            while ($row = $result->fetch_assoc()) {
                                $imagen = $row['image'];
                                $nombre = $row['product_name'];
                                $quantity = $row['quantity'];
                                $precio = $row['precio'];
                                $talla_nombre = $row['talla_nombre'];

                                $subTotal = $precio * $quantity;
                                $total += $subTotal;

                                // Agregar campos ocultos para enviar los datos de productos al formulario
                                echo '<input type="hidden" name="productos[]" value="' . $nombre . '">';
                                echo '<input type="hidden" name="cantidades[]" value="' . $quantity . '">';
                                echo '<input type="hidden" name="subtotal[]" value="' . number_format($subTotal, 2) . '">';

                                // Mostrar nombre de la prenda y su imagen
                                echo '<div class="nombre-prenda">';
                                echo '<label for="nombre-prenda-a">Nombre de la prenda:</label>';
                                echo '<span name="nombre_producto">' . $nombre . '</span>';
                                echo '<div class="img-producto-resumen">';
                                echo '<img src="../assets/images/products/' . $imagen . '" alt="">';
                                echo '</div>';
                                echo '<input type="hidden" id="nombre-prenda-a" name="total" value="' . $nombre . '">';
                                echo '</div>';
                            }

                            // Mostrar la sección del total
                            echo '<div class="total">';
                            echo '<label for="total-a">Total:</label>';
                            echo '<span>S/ ' . number_format($total, 2) . '</span>';
                            echo '<input type="hidden" id="total-a" name="total" value="' . number_format($total, 2) . '">';
                            echo '</div>';
                            ?>
                            
                            <input type="submit" class="btn-enviar" name="pagar" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const $form = document.querySelector('#form-information')

            $form.addEventListener('submit', handleSubmit)

            async function handleSubmit(event) {
                event.preventDefault();
                const form = new FormData(this);
                const response = await fetch(this.action, {
                    method: this.method,
                    body: form,
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                window.location.href = "cart.php";
            }
        </script>
    </main>
</body>

</html>