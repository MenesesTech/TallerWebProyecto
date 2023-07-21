<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleeciones | Casacas Vintage</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Vincular los archivos CSS de cada estructura de codigo -->
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="title__contenido">
            <h3>CASACAS VINTAGE</h3>
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
                <img src="../assets/images/products/casacas_vintage/casaca_vintage1/img1.webp" alt="casaca_vintageSM">
                <div class="descripcion">CASACA VINTAGE Talla SM</div>
                <div class="precio">S/.65.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=5" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage2/img1.webp" alt="casaca-jean-vintage">
                <div class="descripcion">CASACA JEAN VINTAGE</div>
                <div class="precio">S/.49.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=6" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage3/img1.webp" alt="casaca_vintageXL">
                <div class="descripcion">CASACA JEAN VINTAGE TALLA XL</div>
                <div class="precio">S/.75.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=7" class="card-footer-item">Detalles</a>
                </footer>
            </div>
            <div class="card">
                <img src="../assets/images/products/casacas_vintage/casaca_vintage4/img1.jpg" alt="casaca_jean__vintageM">
                <div class="descripcion">CASACA JEAN VINTAGE</div>
                <div class="precio">S/.65.00</div>
                <footer class="card-footer">
                    <a href="../compra/detalles.php?product_id=8" class="card-footer-item">Detalles</a>
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