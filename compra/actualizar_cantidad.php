<?php
include('../php/conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $item_id = $_POST['item_id'];
    $cantidad = $_POST['cantidad'];

    // Realizar la consulta SQL para actualizar la cantidad
    $query = "UPDATE Elementos_del_carrito SET quantity = ? WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $cantidad, $item_id);
    $stmt->execute();

    // Verificar si la consulta se ejecutó correctamente
    if ($stmt->affected_rows > 0) {
    echo "Cantidad actualizada correctamente.";
    } else {
    echo "Error al actualizar la cantidad.";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();

}
?>