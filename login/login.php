<?php
session_start();
include("../php/conexion.php");

if (isset($_POST["ingresar"])) {
    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sqlpass = "SELECT password FROM usuarios WHERE email = '$correo'";
    $resultadopass = $conn->query($sqlpass);
    $sqlid = "SELECT user_id FROM usuarios WHERE email = '$correo'";
    $resultadoid = $conn->query($sqlid); // Corregido el nombre de la variable
    $filas = $resultadoid->num_rows;
    if ($filas > 0) {
        $row = $resultadopass->fetch_assoc();
        $contrasena_guardada = $row['password'];
        if ($contrasena_guardada) {
            $row_id = $resultadoid->fetch_assoc(); // Obtener el resultado de la consulta
            $_SESSION['user_id'] = $row_id['user_id']; // Almacenar el ID del usuario en la variable de sesión
            header("Location: ../index.php");
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos. Por favor, verifique sus datos e intente nuevamente.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <!-- Contenedor de Login -->
        <div id="login__contenedor">
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" class="main__login__form" method="POST">
                <h2>INICIAR SESIÓN</h2>
                <p>Por favor, introduzca su email y contraseña:</p>
                <div class="input-control">
                    <input type="text" id="usuario" placeholder="Correo electrónico" name="email">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <input type="password" id="contraseña" placeholder="Contraseña" name="password">
                    <div class="error"></div>
                </div>
                <button type="submit" id="loginButton" name="ingresar">INICIAR SESIÓN</button>
                <ul>
                    <li class="registroLogin">
                        <p>¿No eres miembro?</p>
                    </li>
                    <b><a href="loginRegistro.php" id="registerUserBtn">Regístrate</a></b>
                </ul>
            </form>
        </div>
        <!-- <script src="js/login.js"></script> -->
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>