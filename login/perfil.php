<?php
session_start();
if (isset($_POST['logout'])) {
    // Eliminar todas las variables de sesión
    $_SESSION = array();

    // Destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión u otra página deseada
    header("Location: login.php");
    exit();
}

if (isset($_POST['edit-address'])) {
    header("Location: configuracion.php");
}

if (isset($_POST['reset-password'])) {
    header("Location: restablecer_contraseña.php");
}

    // Verificar si se ha enviado el formulario
    if (isset($_POST['delete-address'])) {
        // Obtener los datos de conexión a la base de datos
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'retrobd';

        // Conectar a la base de datos
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Obtener el ID del registro desde la sesión
        $registroId = $_SESSION['user_id'];

        // Eliminar los atributos del registro
        $query = "UPDATE usuarios SET direccion = NULL, distrito = NULL, ciudad = NULL, region=NULL WHERE user_id = $registroId";
        if ($conn->query($query) === TRUE) {
            // echo "Los atributos han sido eliminados correctamente.";
        } else {
            // echo "Error al eliminar los atributos: " . $conn->error;
        }
        // Cerrar la conexión a la base de datos
        $conn->close(); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../assets/css/perfil.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <?php
        $user_id = $_SESSION['user_id'];
        $queryUser = "SELECT direccion, ciudad, region, distrito, telefono, dni FROM Usuarios WHERE user_id = ?";
        $stmt = $conn->prepare($queryUser);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();
        $dni = $userData['dni'];
        $telefono = $userData['telefono'];
        $direccion = $userData['direccion'];
        $ciudad = $userData['ciudad'];
        $distrito = $userData['distrito'];

        ?>
        <section class="account-section">

            <h2>Información Personal</h2>
            <div class="account-details">
                <p><strong>Nombre:</strong> <?php echo $user; ?></p>
                <br>
                <p><strong>Dni:</strong> <?php echo $dni; ?></p>
                <br>
                <p><strong>Telefono:</strong> <?php echo $telefono; ?></p>
                <form action="" method="post">
                    <button type="submit" name="logout">Cerrar sesión</button>
                </form>
            </div>
            <form action="" method="post">
            <button name="reset-password">Restablecer contraseña</button></form>
        </section>

        <section class="address-section">
            <h2>Dirección principal</h2>
            <div class="address-details">
                <form action="" method="post">
                <br>
                <p><strong>Dirección:</strong> <?php echo $direccion, ', ', $distrito, ' - ', $ciudad; ?></p>
                <div class="address-buttons">
                    <button type="submit" name="edit-address">Editar direccion</button>
                    <button name="delete-address">Borrar</button>
                </div>
                </form>
            </div>
        </section>

        <section class="pedidos-section">
            <h2>Mis pedidos</h2>
            <div class="pedidos-details">
                <?php
                $queryPedido = "SELECT p.product_name, p.image, t.talla_nombre, dp.quantity, ped.status, ped.total
                FROM detalle_pedido dp
                INNER JOIN productos p ON dp.product_id = p.product_id
                INNER JOIN pedido ped ON ped.pedido_id = dp.pedido_id
                LEFT JOIN productos_Tallas pt ON pt.producto_talla_id = dp.producto_talla_id
                LEFT JOIN Tallas t ON t.talla_id = pt.talla_id
                WHERE ped.user_id = $user_id";
                $result = $conn->query($queryPedido);
                echo "<tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<td>";
                    echo "<div class='pedido-item'>";
                    echo "<div class='product-info'>";
                    echo "<img src='../assets/images/products/" . $row['image'] . "' alt='Product Image'>";
                    echo "<div class='product-details'>";
                    echo "<h4>" . $row['product_name'] . "</h4>";
                    echo "<p>Talla: " . $row['talla_nombre'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='pedido-info'>";
                    echo "<p>Cantidad: " . $row['quantity'] . "</p>";
                    echo "<p>Estado: " . $row['status'] . "</p>";
                    echo "<p>Total: " . $row['total'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                }
                echo "</tr>";
                ?>
            </div>
        </section>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>