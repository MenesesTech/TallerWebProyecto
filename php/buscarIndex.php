<?php
include('../php/conexion.php');

if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = '';
}

if (!empty($_POST['buscar'])) {
    $akeyword = explode(" ", $_POST['buscar']);
    $query = "SELECT * FROM productos WHERE product_name LIKE '%" . $akeyword[0] . "%'";

    for ($i = 1; $i < count($akeyword); $i++) {
        if (!empty($akeyword[$i])) {
            $query .= " OR product_name LIKE '%" . $akeyword[$i] . "%'";
        }
    }

    $resultado = $conn->query($query);
    $numero = $resultado->num_rows;

    if ($numero > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo '<div class="search-result" style="display: inline-flex; padding: 20px; align-items: center; max-width: 100%;">';
            echo '<a href="compra/detalles.php?product_id=' . $row['product_id'] . '" style="display: flex; align-items: center;">';
            echo '<img src="assets/images/products/' . $row['image'] . '" alt="" style="width: 100px; height: 100px; cursor: pointer;">';
            echo '<p class="descripcion" style="margin-left: 20px;">' . $row['product_name'] . '</p>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo '<div class="no-results">No se encontraron resultados.</div>';
    }
}