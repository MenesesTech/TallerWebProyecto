<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | pagina 2</title>
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
                <a href="pag-1.php" class="pagination-previous">Previous</a>
                <a href="pag-3.php" class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li><a class="pagination-link" aria-label="Goto page 1" href="pag-1.php">1</a></li>
                    <li><a id="page" class="pagination-link" aria-label="Page 2" aria-current="page" href="pag-2.php">2</a></li>
                    <li><a class="pagination-link" aria-label="Goto page 3" href="pag-3.php">3</a></li>
                </ul>
            </nav>
        </div>
        <div class="cards-container">
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage3/img1.webp" alt="pantalon_vintage31">
                <div class="descripcion">PANTALÓN VINTAGE TALLA 31</div>
                <div class="precio">S/.55.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=19" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/Pantalones_vintage/pantalon_vintage4/img1.webp" alt="pantalon_vintage31">
                <div class="descripcion">PANTALON VINTAGE TALLA 31</div>
                <div class="precio">S/.45.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=20" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/blusas_vintage/blusa1/img1.jpg" alt="blusas_vintage1">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.29.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=9" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/blusas_vintage/blusa2/img1.webp" alt="blusas_vintage2">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=10" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage3/img1.webp" alt="camiseta_smile">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.29.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=15" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage4/img1.webp" alt="camiseta_soul">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=16" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage3/img1.webp" alt="casaca_vintageXL">
                <div class="descripcion">CASACA JEAN VINTAGE TALLA XL</div>
                <div class="precio">S/.75.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=7" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card" id="elemento-fadeIn">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage4/img1.jpg" alt="casaca_jean__vintageM">
                <div class="descripcion">CASACA JEAN VINTAGE</div>
                <div class="precio">S/.65.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=8" class="card-footer-item">Detalles</a>
                </footer>
            </div>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>