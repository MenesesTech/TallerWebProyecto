<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colecciones</title>
    <link rel="stylesheet" href="../assets/css/colecciones.css">
    <script src="../js/script.js"></script>
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <!-- Contenedor de Colecciones -->
        <div id="colecciones__contenedor">
            <div class="title__contenido">
                <h3>COLECCIONES</h3>
            </div>
            <div class="coleccion-container">
                <div class="coleccion" id="categ__croptops">
                    <a href="../colecciones/basics-crop-tops.php"><img src="../assets/images/category/categ__croptops.webp" alt="category__croptops"></a>
                    <h3>CROP TOPS & CAMISETAS</h3>
                </div>
                <div class="coleccion" id="categ__casacas">
                    <a href="../colecciones/casacas-vintage.php"><img src="../assets/images/category/categ__casacas.webp" alt="categ__casacas"></a>
                    <h3>CASACAS VINTAGE</h3>
                </div>
                <div class="coleccion" id="categ__blusas__vintage">
                    <a href="../colecciones/blusas-vintage.php"><img src="../assets/images/category/categ__blusas__vintage.webp" alt="categ__blusas__vintage"></a>
                    <h3>BLUSAS VINTAGE</h3>
                </div>
                <div class="coleccion" id="categ__chompa__vintage">
                    <a href="../colecciones/chompa-vintage.php"><img src="../assets/images/category/categ__chompa__vintage.webp" alt="categ__chompa__vintage"></a>
                    <h3>CHOMPAS VINTAGE</h3>
                </div>
                <div class="coleccion" id="categ__pantalon_vintage">
                    <a href="../colecciones/pantalones-vintage.php"><img src="../assets/images/category/categ__pantalon_vintage.webp" alt="categ__pantalon_vintage"></a>
                    <h3>PANTALONES VINTAGE</h3>
                </div>
            </div>

        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>