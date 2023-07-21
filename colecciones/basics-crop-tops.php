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
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>CROP TOPS & CAMISETAS</h3>
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
                <img src="../assets/images/products/crop_tops_camisetas/crop_top1/img1.jpg" alt="crop-top-mara-knit">
                <div class="descripcion">MARA KNIT</div>
                <div class="precio">S/.49.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=1" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top2/img1.webp" alt="crop-top-crop-knit">
                <div class="descripcion">CROP KNIT</div>
                <div class="precio">S/.39.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=2" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top3/img1.webp" alt="camiseta_smile">
                <div class="descripcion">CAMISETA SMILE</div>
                <div class="precio">S/.29.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=3" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/crop_tops_camisetas/crop_top4/img1.webp" alt="camiseta_soul">
                <div class="descripcion">CAMISETA SOUL</div>
                <div class="precio">S/.29.90</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=4" class="card-footer-item">Detalles</a>
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