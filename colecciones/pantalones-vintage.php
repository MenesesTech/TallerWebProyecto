<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleeciones | Crop Tops</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Vincular los archivos CSS de cada estructura de codigo -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/productos.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <script src="../js/script.js"></script>
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>PANTALONES VINTAGE</h3>
        </div>
        <div class="nav-pag-container">
            <nav id="nav-pagina" class="pagination is-small" role="navigation" aria-label="pagination">
                <a class="pagination-previous">Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li><a id="page" class="pagination-link" aria-label="Page 1" aria-current="page" href="pag-1.html">1</a></li>
                </ul>
            </nav>
        </div>
        <div class="cards-container">
            <div class="card">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage1/img1.webp" alt="pantalon_vintage26">
                <div class="descripcion">PANTALON VINTAGE TALLA 26</div>
                <div class="precio">S/.55.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=17" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage2/img1.webp" alt="pantalon_vintage29">
                <div class="descripcion">PANTALÓN VINTAGE TALLA 29</div>
                <div class="precio">S/.45.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=18" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage3/img1.webp" alt="pantalon_vintage31">
                <div class="descripcion">PANTALÓN VINTAGE TALLA 31</div>
                <div class="precio">S/.55.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=19" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage4/img1.webp" alt="pantalon_vintage31">
                <div class="descripcion">PANTALON VINTAGE TALLA 31</div>
                <div class="precio">S/.45.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=20" class="card-footer-item">Detalles</a>
                </footer>
            </div>
        </div>
        <div class="return-pag">
            <div class="return-btn">
                <a href="../nosotros-colecciones/colecciones.php"><img src="https://img.icons8.com/ios-filled/50/left.png" alt=""></a>
                <a href="../nosotros-colecciones/colecciones.php">Retroceder a colecciones</a>
            </div>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>