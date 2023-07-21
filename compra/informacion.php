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

// Obtener el nombre del usuario y otros datos
$queryUser = "SELECT name, dni, direccion, ciudad, region, distrito, telefono FROM Usuarios WHERE user_id = $user_id";
$rsUsuario = mysqli_query($conn, $queryUser);
if ($rsUsuario && mysqli_num_rows($rsUsuario) > 0) {
    $user = mysqli_fetch_assoc($rsUsuario);
    $user_name = $user['name'];
    $user_dni = $user['dni'];
    $user_direccion = $user['direccion'];
    $user_ciudad = $user['ciudad'];
    $user_region = $user['region'];
    $user_distrito = $user['distrito'];
    $user_telefono = $user['telefono'];
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <link rel="stylesheet" href="../assets/css/informacion.css">
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
                        <a href="" class="info">Información</a>
                        <span>&gt;</span>
                        <a>Envios</a>
                        <span>&gt;</span>
                        <a>Pago</a>
                    </nav>
                </div>
                <div class="title-info">
                    <h2>Dirección de envío</h2>
                </div>
                <form method="POST" action="envios.php?cart_id=<?php echo $cart_id; ?>">

                    <div class="name-box">
                        <input type="text" id="nombre" name="nombre" required="" value="<?php echo $user_name; ?>">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="dni-box">
                        <input type="text" id="dni" name="dni" required="" value="<?php echo $user_dni; ?>">
                        <label for="dni">DNI</label>
                    </div>
                    <div class="direccion-box">
                        <input type="text" id="direccion" name="direccion" required="" value="<?php echo $user_direccion; ?>">
                        <label for="direccion">Dirección</label>
                    </div>
                    <div class="ciudad-box">
                        <input type="text" id="ciudad" name="ciudad" required="" value="<?php echo $user_ciudad; ?>">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="region-box">
                        <select id="region" name="region" required>
                            <option value="Amazonas" <?php if ($user_region == 'Amazonas') echo 'selected'; ?>>Amazonas</option>
                            <option value="Ancash" <?php if ($user_region == 'Ancash') echo 'selected'; ?>>Ancash</option>
                            <option value="Apurimac" <?php if ($user_region == 'Apurimac') echo 'selected'; ?>>Apurimac</option>
                            <option value="Arequipa" <?php if ($user_region == 'Arequipa') echo 'selected'; ?>>Arequipa</option>
                            <option value="Ayacucho" <?php if ($user_region == 'Ayacucho') echo 'selected'; ?>>Ayacucho</option>
                            <option value="Cajamarca" <?php if ($user_region == 'Cajamarca') echo 'selected'; ?>>Cajamarca</option>
                            <option value="Callao" <?php if ($user_region == 'Callao') echo 'selected'; ?>>Callao</option>
                            <option value="Cusco" <?php if ($user_region == 'Cusco') echo 'selected'; ?>>Cusco</option>
                            <option value="Huancavelica" <?php if ($user_region == 'Huancavelica') echo 'selected'; ?>>Huancavelica</option>
                            <option value="Huanuco" <?php if ($user_region == 'Huanuco') echo 'selected'; ?>>Huanuco</option>
                            <option value="Ica" <?php if ($user_region == 'Ica') echo 'selected'; ?>>Ica</option>
                            <option value="Junin" <?php if ($user_region == 'Junin') echo 'selected'; ?>>Junin</option>
                            <option value="La Libertad" <?php if ($user_region == 'La Libertad') echo 'selected'; ?>>La Libertad</option>
                            <option value="Lambayeque" <?php if ($user_region == 'Lambayeque') echo 'selected'; ?>>Lambayeque</option>
                            <option value="Lima" <?php if ($user_region == 'Lima') echo 'selected'; ?>>Lima</option>
                            <option value="Loreto" <?php if ($user_region == 'Loreto') echo 'selected'; ?>>Loreto</option>
                            <option value="Madre de Dios" <?php if ($user_region == 'Madre de Dios') echo 'selected'; ?>>Madre de Dios</option>
                            <option value="Moquegua" <?php if ($user_region == 'Moquegua') echo 'selected'; ?>>Moquegua</option>
                            <option value="Pasco" <?php if ($user_region == 'Pasco') echo 'selected'; ?>>Pasco</option>
                            <option value="Piura" <?php if ($user_region == 'Piura') echo 'selected'; ?>>Piura</option>
                            <option value="Puno" <?php if ($user_region == 'Puno') echo 'selected'; ?>>Puno</option>
                            <option value="San Martin" <?php if ($user_region == 'San Martin') echo 'selected'; ?>>San Martin</option>
                            <option value="Tacna" <?php if ($user_region == 'Tacna') echo 'selected'; ?>>Tacna</option>
                            <option value="Tumbes" <?php if ($user_region == 'Tumbes') echo 'selected'; ?>>Tumbes</option>
                            <option value="Ucayali" <?php if ($user_region == 'Ucayali') echo 'selected'; ?>>Ucayali</option>
                        </select>
                        <label for="region">Región</label>
                    </div>

                    <div class="distrito-box">
                        <input type="text" id="distrito" name="distrito" required="" value="<?php echo $user_distrito; ?>">
                        <label for="distrito">Distrito</label>
                    </div>
                    <div class="telefono-box">
                        <input type="text" id="telefono" name="telefono" required="" value="<?php echo $user_telefono; ?>">
                        <label for="telefono">Teléfono</label>
                    </div>
                    <div class="button-box">
                        <div class="cart-button">
                            <a href="cart.php">
                                <span>&lt;</span> Volver al carrito
                            </a>
                        </div>
                        <input type="submit" name="actualizar" value="Continuar con envíos"></input>
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
                    echo '<span>' . $nombre." ".$talla_nombre . '</span>';
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
    </main>
</body>

</html>