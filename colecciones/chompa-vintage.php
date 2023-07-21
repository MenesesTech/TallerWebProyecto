<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleeciones | Chompas Vintage</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Vincular los archivos CSS de cada estructura de codigo -->
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>CHOMPA VINTAGE</h3>
        </div>
        <div class="nav-pag-container">
            <nav id="nav-pagina" class="pagination is-small" role="navigation" aria-label="pagination">
                <a class="pagination-previous">Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li><a id="page" class="pagination-link" aria-label="Page 1" aria-current="page">1</a></li>
                </ul>
            </nav>
        </div>
        <div class="cards-container">
            <div class="card">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage1/img1.webp" alt="crop-top-mara-knit">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.39.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=13" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage2/img1.webp" alt="crop-top-crop-knit">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.39.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=14" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage3/img1.webp" alt="camiseta_smile">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.29.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=15" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/chompas_vintage/chompa_vintage4/img1.webp" alt="camiseta_soul">
                <div class="descripcion">CHOMPA VINTAGE OVERSIZE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=16" class="card-footer-item">Detalles</a>
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