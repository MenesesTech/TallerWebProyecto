<?php
session_start();
include("../php/conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion de direccion</title>
    <link rel="stylesheet" href="../assets/css/configuracion.css">
</head>

<body>
    <main>
    <?php
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            // Obtén el ID del usuario desde la sesión o cualquier otra fuente de datos
        $usuarioId = $_SESSION['user_id'];
        // Obtén la nueva contraseña ingresada por el usuario
        $nuevaContraseña = $_POST['password'];
        // Actualiza la contraseña cifrada en la base de datos
        // Reemplaza 'tu_tabla' con el nombre de tu tabla de usuarios y 'contraseña' con el nombre de la columna que almacena las contraseñas
        $query = "UPDATE usuarios SET password = '$nuevaContraseña' WHERE user_id = $usuarioId";
        // Ejecuta la consulta y verifica si se actualizó correctamente
        // Aquí debes usar tu propio código para ejecutar la consulta y verificar los resultados en tu base de datos
        if ($conn->query($query) === TRUE) {
            echo "Los atributos han sido actualizados correctamente.";
            header("Location: ../index.php");
        } else {
            echo "Error al actualizar los atributos: " . $conn->error;
        }
        }
?>
        <div class="container-info">
            <div class="info-pedido-direccion">
                <div class="info-pedido-logo">
                    <img src="../assets/images/logo_retro_groove.png" alt="">
                    
                </div>
                <div class="title-info">
                    <h2>Reestablecimiento de contraseña</h2>
                </div>
                <form method="POST" action="">

                    <div class="password-box">
                        <input type="text" id="password" name="password" required="" value="">
                        <label for="password">Contraseña nueva</label>
                    </div>
                    <div class="button-box">
                        <div class="cart-button">
                            <a href="perfil.php">
                                <span>&lt;</span> Volver al perfil
                            </a>
                        </div>
                        <input type="submit" name="actualizar" value="Guardar datos"></input>
                    </div>
                </form>
            </div>
            
        </div>
    </main>
</body>

</html>