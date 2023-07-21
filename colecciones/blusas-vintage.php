<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleeciones | Blusas Vintage</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Vincular los archivos CSS de cada estructura de codigo -->
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>BLUSAS VINTAGE</h3>
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
                <img src="../assets/images/products/blusas_vintage/blusa1/img1.jpg" alt="blusas_vintage1">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.29.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=9" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/blusas_vintage/blusa2/img1.webp" alt="blusas_vintage2">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=10" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/blusas_vintage/blusa3/img1.webp" alt="blusas_vintage3">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=11" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/blusas_vintage/blusa4/img1.webp" alt="blusas_vintage4">
                <div class="descripcion">BLUSA VINTAGE</div>
                <div class="precio">S/.35.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=12" class="card-footer-item">Detalles</a>
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