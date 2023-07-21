<?php
include("../php/conexion.php");
if (isset($_SESSION['user_id'])) {
    $queryid = "SELECT name FROM usuarios WHERE user_id = " . $_SESSION['user_id'];
    $resultadoid = mysqli_query($conn, $queryid);
    if ($resultadoid) {
        $row = mysqli_fetch_assoc($resultadoid);
        $user = $row['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado</title>
    <link rel="stylesheet" href="../assets/css/header.css">
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<body>
    <!-- Indicador de carga -->
    <div id="contenedor__carga">
        <div id="carga"></div>
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Icono de WhatsApp -->
    <div class="whatsapp__icon">
        <a href="https://web.whatsapp.com/" target="_blank"><img src="https://cdn.shopify.com/s/files/1/0265/2572/8803/files/wa-icon.svg?v=1586940530" alt="whatsapp--v1"></a>
    </div>
    <header>
        <div class="header__container">
            <!-- Menu de navegación principal -->
            <nav class="header__container__primario">
                <a href="../index.php"><img src="../assets/images/Logo_footer_2.jpg" alt="RetroGroove" class="logo_tienda"></a>
                <ul>
                    <li class="menu__item"><a href="../index.php" id="inicio">Inicio</a>
                    </li>
                    <li class="menu__item"><a href="../catalogo/pag-1.php" id="productos">Productos</a>
                    </li>
                    <li class="menu__item"><a href="../nosotros-colecciones/colecciones.php" id="colecciones">Colecciones</a>
                    </li>
                    <li class="menu__item"><a href="../nosotros-colecciones/nosotros.php" id="nosotros">Nosotros</a></li>
                </ul>
            </nav>
            <!-- Menu de navegación secundaria -->
            <nav class="header__container__secundario">
                <ul>
                    <?php
                    if (!empty($user)) {
                        echo '<li class="btn__icon" id="login-btn"><a href="../login/perfil.php" class="name_user">' . $user . '</a></li>';
                    } else {
                        echo '<li class="btn__icon" id="login-btn"><a href="../login/login.php"><img src="../assets/images/login.png" alt="login"></a></li>';
                    }
                    ?>
                    <li class="btn__icon"><a href="" onclick="mostrarSearch(event);"><img src="../assets/images/search.png" alt=""></a></li>
                    <li class="btn__icon" id="cart-btn"><a href="../compra/cart.php"><img src="../assets/images/cart.png" alt="cart"></a>
                    </li>
                </ul>
            </nav>
            <!-- Menú de navegación para dispositivos móviles -->
            <div class="mobile-header-close">
                <div class="mobile-header-close-btnNav">
                    <img src="../assets/images/menu.png" alt="menu-v1" onclick="abrirNavegacion();" />
                </div>
                <a href="../index.php"><img src="../assets/images/Logo_footer_2.jpg" alt="RetroGroove" class="logo_tienda"></a>
                <a href="../compra/cart.php" class="btn__cart"><img src="../assets/images/cart.png" alt="cart"></a>
            </div>
            <!-- Menú de navegación para dispositivos móviles -->
            <div class="mobile-header-open" id="headerNavOpen">
                <nav class="mobile-header-openNav">
                    <ul class="menu">
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="../catalogo/pag-1.php">Productos</a></li>
                        <li><a href="../nosotros-colecciones/colecciones.php">Colecciones</a></li>
                        <li><a href="../nosotros-colecciones/nosotros.php">Nosotros</a></li>
                        <?php
                        if (!empty($user)) {
                            echo '<li class="btn__icon" id="login-btn"><a href="../login/perfil.php" class="name_user">' . $user . '</a></li>';
                        } else {
                            echo '<li class="btn__icon" id="login-btn"><a href="../login/login.php">Iniciar Sesión</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="close-btn-container">
                        <button id="closeBtn" onclick="cerrarNavegacion();">Cerrar</button>
                    </div>
                </nav>
                <div class="transparent__container__nav">

                </div>
            </div>
        </div>
    </header>
    <section class="search-container">
        <form id="search-form">
            <input onkeypress="buscarAhora($('#buscar_1').val());" type="text" name="buscar_1" id="buscar_1" placeholder="Buscar" class="src">
        </form>
        <div id="search-results-container">
        </div>
    </section>
</body>

</html>