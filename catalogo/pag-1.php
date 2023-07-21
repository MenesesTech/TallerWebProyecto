<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | pagina 1</title>
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
                <a href="pag-2.php" class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li><a id="page" class="pagination-link" aria-label="Page 1" aria-current="page" href="pag-1.php">1</a></li>
                    <li><a class="pagination-link" aria-label="Goto page 2" href="pag-2.php">2</a></li>
                    <li><a class="pagination-link" aria-label="Goto page 3" href="pag-3.php">3</a></li>
                </ul>
            </nav>
        </div>
        <div class="cards-container">
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top3/img1.webp" alt="">
                <div class="descripcion">CAMISETA SMILE</div>
                <div class="precio">S/.29.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=3" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top4/img1.webp" alt="camiseta_soul">
                <div class="descripcion">CAMISETA SOUL</div>
                <div class="precio">S/.29.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=4" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage1/img1.webp" alt="pantalon_vintage26">
                <div class="descripcion">PANTALON VINTAGE TALLA 26</div>
                <div class="precio">S/.55.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=17" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage2/img1.webp" alt="pantalon_vintage29">
                <div class="descripcion">PANTALÓN VINTAGE TALLA 29</div>
                <div class="precio">S/.45.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=18" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage1/img1.webp" alt="casaca_vintageSM">
                <div class="descripcion">CASACA VINTAGE Talla M</div>
                <div class="precio">S/.65.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=5" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage2/img1.webp" alt="casaca-jean-vintage">
                <div class="descripcion">CASACA JEAN VINTAGE</div>
                <div class="precio">S/.49.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=6" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top1/img1.jpg" alt="crop-top-mara-knit">
                <div class="descripcion">MARA KNIT</div>
                <div class="precio">S/.49.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=1" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top2/img1.webp" alt="crop-top-crop-knit">
                <div class="descripcion">CROP KNIT</div>
                <div class="precio">S/.39.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=2" class="card-footer-item">Detalles</a>
                </footer>
            </div>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>