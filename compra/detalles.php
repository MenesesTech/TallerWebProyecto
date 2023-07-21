<?php
session_start();
?>
<?php
include("../php/conexion.php");
$id = $_GET['product_id'];
$querydetails = "SELECT product_name, precio, image, stock FROM Productos WHERE product_id = $id";
$querytalla = "SELECT t.talla_nombre FROM Tallas AS t INNER JOIN Productos_Tallas AS pt ON t.talla_id = pt.talla_id WHERE pt.product_id = $id";
$rsdetails = mysqli_query($conn, $querydetails);
$rstallas = mysqli_query($conn, $querytalla);

if ($rsdetails && mysqli_num_rows($rsdetails) > 0) {
    // Obtener los datos del producto
    $product = mysqli_fetch_assoc($rsdetails);

    // Extraer los valores de los campos
    $product_name = $product['product_name'];
    $precio = $product['precio'];
    $image = $product['image'];
    $stock = $product['stock'];

    // Obtener las tallas disponibles
    $tallas = array();
    while ($talla = mysqli_fetch_assoc($rstallas)) {
        $tallas[] = $talla['talla_nombre'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de producto</title>
    <!-- Vincular el archivo CSS de Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../assets/css/detalles.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="deatils-container">
            <div class="title-details">
                <h1><?php echo $product_name; ?></h1>
                <h2>S/. <?php echo $precio; ?></h2>
            </div>
            <div class="details-complete">
                <div class="details-image">
                    <img src="../assets/images/products/<?php echo $image; ?>" alt="">
                </div>
                <div class="details-description">
                    <form action="cart.php" method="get">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <p>Talla Etiqueta:
                            <select name="talla">
                                <?php
                                // Obtener las tallas disponibles desde la base de datos o algún otro origen de datos
                                $tallas_disponibles = $tallas;

                                // Generar las opciones del desplegable
                                foreach ($tallas_disponibles as $talla) {
                                    echo "<option value='$talla'>$talla</option>";
                                }
                                ?>
                            </select>
                        </p>
                        <p>Stock: <span><?php echo $stock; ?></span></p>
                        <p>Detalle:</p>
                        <p>✔️Esta prenda puede haber sido intervenida para su venta👌</p>
                        <p>✔️El color puedes ser +/- intenso debido a la luz de foto.</p>
                        <div class="btn-pays-container">
                            <div class="btn-pays">
                                <!-- Ventana modal, por defecto no visible -->
                                <div id="modal3" class="modalmask">
                                    <div class="modalbox movedown">
                                        <a href="#" title="Close" class="close">x</a>
                                        <h2><strong>VER MEDIDAS DE:</strong></h2>
                                        <a href="#modalCrops" class="btn-secciones">CROPS</a>
                                        <a href="#modalCamisetas" class="btn-secciones">CAMISETAS</a>
                                        <a href="#modalCasacas" class="btn-secciones">CASACAS</a>
                                        <a href="#modalBlusas" class="btn-secciones">BLUSAS</a>
                                        <a href="#modalChompas" class="btn-secciones">CHOMPAS</a>
                                        <a href="#modalPantalones" class="btn-secciones">PANTALONES</a>
                                    </div>
                                </div>

                                <div id="modalCrops" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA CROPS</strong></h1>
                                        <div class="img-talla"><img src="../assets/images/medidas_productos/crop-medidas.jpg" alt=""></div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th>A</th>
                                                    <th>B</th>
                                                    <th>C</th>
                                                    <th>D</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td>47</td>
                                                    <td>49</td>
                                                    <td>37</td>
                                                    <td>23</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td>48</td>
                                                    <td>49</td>
                                                    <td>42</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td>51</td>
                                                    <td>54</td>
                                                    <td>44</td>
                                                    <td>26</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <div id="modalCamisetas" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA CAMISETAS</strong></h1>
                                        <div class="img-talla"><img src="../assets/images/medidas_productos/camiseta-medidas.jpg" alt=""></div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th>A</th>
                                                    <th>B</th>
                                                    <th>C</th>
                                                    <th>D</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td>58</td>
                                                    <td>58</td>
                                                    <td>75</td>
                                                    <td>46</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td>60</td>
                                                    <td>60</td>
                                                    <td>76</td>
                                                    <td>47</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td>62</td>
                                                    <td>62</td>
                                                    <td>77</td>
                                                    <td>48</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <div id="modalCasacas" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA CASACAS</strong></h1>
                                        <div class="img-talla"><img src="../assets/images/medidas_productos/csaca-medidas.jpg" alt=""></div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th style="color: red">PECHO</th>
                                                    <th style="color: green">ALTURA</th>
                                                    <th style="color: yellow">MANGAS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td style="color: red">58</td>
                                                    <td style="color: green">58</td>
                                                    <td style="color: yellow">75</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td style="color: red">60</td>
                                                    <td style="color: green">60</td>
                                                    <td style="color: yellow">76</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td style="color: red">62</td>
                                                    <td style="color: green">62</td>
                                                    <td style="color: yellow">77</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <div id="modalBlusas" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA BLUSAS</strong></h1>
                                        <div class="img-talla"><img src="../assets/images/medidas_productos/blusa-medidas.jpg" alt=""></div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th>A</th>
                                                    <th>B</th>
                                                    <th>C</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td>85</td>
                                                    <td>90</td>
                                                    <td>102</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td>87</td>
                                                    <td>92</td>
                                                    <td>105</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td>89</td>
                                                    <td>94</td>
                                                    <td>107</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <div id="modalChompas" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA CHOMPAS</strong></h1>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th style="color: red">PECHO</th>
                                                    <th style="color: green">ALTURA</th>
                                                    <th style="color: yellow">MANGAS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td style="color: red">58</td>
                                                    <td style="color: green">58</td>
                                                    <td style="color: yellow">75</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td style="color: red">60</td>
                                                    <td style="color: green">60</td>
                                                    <td style="color: yellow">76</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td style="color: red">62</td>
                                                    <td style="color: green">62</td>
                                                    <td style="color: yellow">77</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <div id="modalPantalones" class="modalmask">
                                    <div class="modalbox2 movedown">
                                        <a href="#close" title="Close" class="close">x</a>
                                        <h1><strong>MEDIDA PANTALONES</strong></h1>
                                        <div class="img-talla"><img src="../assets/images/medidas_productos/pantalon-medidas.jpg" alt=""></div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>TALLA</th>
                                                    <th>CINTURA</th>
                                                    <th>LARGO</th>
                                                    <th>CADERA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>S</td>
                                                    <td>36-49</td>
                                                    <td>98</td>
                                                    <td>75</td>
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>M</td>
                                                    <td>37-54</td>
                                                    <td>99</td>
                                                    <td>76</td>
                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>L</td>
                                                    <td>43-58</td>
                                                    <td>100</td>
                                                    <td>77</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- boton volver -->
                                        <a href="#modal3">
                                            <a class="btn-back" href="#modal3">BACK</a>
                                        </a>
                                    </div>
                                </div>

                                <a href="#modal3" class="btn-tallas">GUIA DE TALLAS</a>
                                <a href="../compra/cart.php?product_id=<?php echo $id; ?>"><button type="submit" id="btnCart">Agregar al carrito</button></a>
                                <button type="submit" id="btnBuy">Comprar Ahora</button>
                            </div>
                        </div>
                </div>
            </div>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>