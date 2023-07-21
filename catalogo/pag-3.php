<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | pagina 3</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Vincular los archivos CSS de cada estructura de codigo -->
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>PRODUCTOS</h3>
        </div>
        <div class="nav-pag-container">
            <nav id="nav-pagina" class="pagination is-small" role="navigation" aria-label="pagination">
                <a href="pag-2.php" class="pagination-previous">Previous</a>
                <ul class="pagination-list">
                    <li><a class="pagination-link" aria-label="Goto page 1" href="pag-1.php">1</a></li>
                    <li><a class="pagination-link" aria-label="Goto page 2" href="pag-2.php">2</a></li>
                    <li><a id="page" class="pagination-link" aria-label="Page 3" aria-current="page" href="pag-3.php">3</a></li>
                </ul>
            </nav>
        </div>
        <div class="cards-container">
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage1/img1.webp" alt="crop-top-mara-knit">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.39.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=13" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage2/img1.webp" alt="crop-top-crop-knit">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.39.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=14" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/blusas_vintage/blusa3/img1.webp" alt="blusas_vintage3">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=11" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/blusas_vintage/blusa4/img1.webp" alt="blusas_vintage4">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=12" class="card-footer-item">Detalles</a>
                </footer>
            </div>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>