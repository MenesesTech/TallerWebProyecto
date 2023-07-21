<?php
include("../php/conexion.php");

if (isset($_POST["registrar"])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['name']);
    $apellido = mysqli_real_escape_string($conn, $_POST['lastname']);
    $nombreCompleto = $nombre . " " . $apellido;
    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $sqluser = "SELECT user_id FROM usuarios WHERE email = '$correo'";
    $resultadouser = $conn->query($sqluser);
    $filas = $resultadouser->num_rows;
    if ($filas > 0) {
        echo "<script>alert('El correo ya está registrado en nuestra tienda. Por favor, regístrese con otro correo.');</script>";
    } else {
        $sqlusuario = "INSERT INTO usuarios(name,email,password) VALUES('$nombreCompleto','$correo','$password')";
        $resultadousuario = $conn->query($sqlusuario);
        if ($resultadousuario) {
            echo "<script>alert('Registro exitoso');</script>";
            header("Location: ../index.php");
        } else {
            echo "<script>alert('Error al registrar');</script>";
            header("Location: loginRegistro.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../assets/css/loginRegistro.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div id="mainRegister" class="tab">
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="main__register__form" id="form">
                <h2>REGISTRAR</h2>
                <p class="info_register">Regístrate y compra tus prendas favoritas</p>
                <div class="input-control">
                    <label for="name" class="label">Nombre</label>
                    <input id="name" name="name" type="text" class="input_">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="lastname" class="label">Apellido</label>
                    <input id="lastname" name="lastname" type="text" class="input_">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="email" class="label">Email</label>
                    <input id="email" name="email" type="text">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="password" class="label">Contraseña</label>
                    <input id="password" name="pass" type="password">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="password2" class="label">Confirmar contraseña</label>
                    <input id="password2" name="passrepeat" type="password">
                    <div class="error"></div>
                </div>
                
                <button type="submit" id="RegisterButton" name="registrar">CREAR UNA CUENTA</button>
            </form>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>
