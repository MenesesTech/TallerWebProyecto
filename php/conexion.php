<?php
include("configuracion.php");
$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

