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
$user_id = $Usuario['user_id'];
// Actualizar datos
if (isset($_POST["actualizar"])) {
    $dni = $_POST['dni'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $distrito = $_POST['distrito'];
    $region = $_POST['region'];
    $telefono = $_POST['telefono'];
    // Preparar la consulta de actualización
    $query = "UPDATE Usuarios SET dni=?, direccion=?, ciudad=?, region=?, telefono=?, distrito=? WHERE user_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $dni, $direccion, $ciudad, $region, $telefono, $distrito, $user_id);

    // Ejecutar la consulta de actualización
    if ($stmt->execute()) {
        $updateSuccess = true;
    } else {
        $updateSuccess = false;
    }
    $stmt->close();
}
// consulta para obtener los elementos del carrito con la información adicional del producto
$query = "SELECT e.quantity, p.product_name, p.precio, p.image, t.talla_nombre FROM elementos_del_carrito e 
INNER JOIN productos p ON e.product_id = p.product_id 
LEFT JOIN productos_tallas pt ON e.producto_talla_id = pt.producto_talla_id
LEFT JOIN tallas t ON pt.talla_id = t.talla_id
WHERE e.cart_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cart_id);
$stmt->execute();
$result = $stmt->get_result();

$queryUser = "SELECT name, dni, direccion, ciudad, region, distrito FROM Usuarios WHERE user_id = $user_id";
$rsUsuario = mysqli_query($conn, $queryUser);
if ($rsUsuario && mysqli_num_rows($rsUsuario) > 0) {
    $user = mysqli_fetch_assoc($rsUsuario);
    $user_name = $user['name'];
    $user_dni = $user['dni'];
    $user_direccion = $user['direccion'];
    $user_ciudad = $user['ciudad'];
    $user_region = $user['region'];
    $user_distrito = $user['distrito'];
    $user_info = $user_dni . ', ' . $user_direccion . ', ' . $user_ciudad . ' ' . $user_region . ', ' . $user_distrito . ', Perú';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envios</title>
    <link rel="stylesheet" href="../assets/css/informacion.css">
</head>

<body>
    <div class="container-info">
        <div class="info-pedido-direccion">
            <div class="info-pedido-logo">
                <img src="../assets/images/logo_retro_groove.png" alt="">
                <nav class="nav-info">
                    <a href="cart.php">Carrito</a>
                    <span>&gt;</span>
                    <a href="informacion.php" class="info">Información</a>
                    <span>&gt;</span>
                    <a>Envios</a>
                    <span>&gt;</span>
                    <a>Pago</a>
                    <span>&gt;</span>
                    <a>Final</a>
                </nav>
            </div>
            <form>
                <div class="envio-container">
                    <div class="enviar">
                        <p>Enviar a</p>
                        <span><?php echo $user_info ?></span>
                        <a href="informacion.php?cart_id=<?php echo $cart_id; ?>">Cambiar</a>
                    </div>
                    <div class="title-info">
                        <h2>Envios</h2>
                    </div>
                    <div class="envio-precio">
                        <span>Envío a nivel nacional</span>
                        <p>Gratis</p>
                    </div>
                </div>
                <div class="button-box">
                    <div class="cart-button">
                        <a href="informacion.php?cart_id=<?php echo $cart_id; ?>">
                            <span>&lt;</span> Volver a la información
                        </a>
                    </div>
                    <a href="pagos.php?cart_id=<?php echo $cart_id; ?>" class="pay-card">Continuar con el Pago</a>

                </div>
            </form>
        </div>
        <div class="info-pedido-resumen">
            <?php
            $total = 0;
            while ($row = $result->fetch_assoc()) {

                $imagen = $row['image'];
                $nombre = $row['product_name'];
                $quantity = $row['quantity'];
                $precio = $row['precio'];
                $talla_nombre = $row['talla_nombre'];

                echo '<div class="resumen-producto">';
                echo '<div class="resumen-producto-name">';
                echo '<div class="img-producto-resumen">';
                echo '<img src="../assets/images/products/' . $imagen . '" alt="">';
                echo '<span>' . $quantity . '</span>';
                echo '</div>';
                echo '<span>' . $nombre . " " . $talla_nombre . '</span>';
                echo '</div>';
                echo '<div class="resumen-producto-subtotal">';
                echo '<span>S/ ' . number_format($precio * $quantity, 2) . '</span>';
                echo '</div>';
                echo '</div>';
                $subTotal = $precio * $quantity;
                $total += $subTotal;
            }
            ?>
            <div class="resumen-pay">
                <div class="subtotal">
                    <h3>Subotal</h3>
                    <span>S/. <?php echo number_format($total, 2); ?></span>
                </div>
                <div class="envio">
                    <h3>Envíos</h3>
                    <span>Gratis</span>
                </div>
                <div class="total">
                    <h3>Total</h3>
                    <span>S/. <?php echo number_format($total, 2); ?></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>