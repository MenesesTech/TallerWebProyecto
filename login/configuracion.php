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
    <link rel="stylesheet" href="../assets/css/informacion.css">
</head>

<body>
    <main>
    <?php
// Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            // Obtener los atributos actualizados desde los campos de entrada del formulario
            $nuevoAtributo1 = $_POST['direccion'];
            $nuevoAtributo2 = $_POST['ciudad'];
            $nuevoAtributo3 = $_POST['distrito'];
            $nuevoAtributo4 = $_POST['region'];


            // Actualizar los atributos del registro en la base de datos
            $query = "UPDATE usuarios SET direccion = '$nuevoAtributo1', ciudad = '$nuevoAtributo2', distrito = '$nuevoAtributo3', region = '$nuevoAtributo4' WHERE user_id = $registroId";
            if ($conn->query($query) === TRUE) {
                echo "Los atributos han sido actualizados correctamente.";
            } else {
                echo "Error al actualizar los atributos: " . $conn->error;
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
            header("Location: perfil.php");
        }


        $user_id = $_SESSION['user_id'];
        $queryUser = "SELECT direccion, ciudad, region, distrito, telefono, dni FROM usuarios WHERE user_id = ?";
        $stmt = $conn->prepare($queryUser);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();
        $direccion = $userData['direccion'];
        $ciudad = $userData['ciudad'];
        $user_region = $userData['region'];
        $distrito = $userData['distrito'];
        ?>
        <div class="container-info">
            <div class="info-pedido-direccion">
                <div class="info-pedido-logo">
                    <img src="../assets/images/logo_retro_groove.png" alt="">
                    
                </div>
                <div class="title-info">
                    <h2>Dirección de envío</h2>
                </div>
                <form method="POST" action="">

                    <div class="direccion-box">
                        <input type="text" id="direccion" name="direccion" required="" value="<?php echo $direccion; ?>">
                        <label for="direccion">Dirección</label>
                    </div>
                    <div class="ciudad-box">
                        <input type="text" id=" $nuevoAtributo1" name="ciudad" required="" value="<?php echo $ciudad; ?>">
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
                        <input type="text" id="distrito" name="distrito" required="" value="<?php echo $distrito; ?>">
                        <label for="distrito">Distrito</label>
                    </div>
                    
                    <div class="button-box">
                        <div class="cart-button">
                            <a href="perfil.php">
                                <span>&lt;</span> Volver al perfil
                            </a>
                        </div>
                        <input type="submit" name="actualizar" value="Guardar contraseña"></input>
                    </div>
                </form>
            </div>
            
        </div>
    </main>
</body>

</html>