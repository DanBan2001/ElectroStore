<?php
    
    session_start();

    if (!isset($_SESSION['acceso'])) {
   
    }

    include_once("php/conexion_be.php");
    include_once("php/conexion_search_be.php");
    require 'config/database.php';
    require 'config/config.php';
    $db = new Database();
    $con = $db->conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';


    if($id == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

        IF($token == $token_tmp){

            $sql = $con->prepare("SELECT count(id), nombre, precio FROM productos WHERE id=? AND activo=0");
            $sql->execute([$id]);
            if($sql->fetchColumn() > 0){

                $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=0");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = 'assets/img/productos_home/'. $id . '/';

            $rutaImg = $dir_images . 'img.jpg';

             if(!file_exists($rutaImg)){
                        $rutaImg = 'assets/img/back.jpg';
                    }

            $imagenes = array();
            $dir = dir($dir_images);

            while(($archivo = $dir->read()) != false){
                if($archivo != 'img.jpg' && (strpos($archivo,'jpg') || strpos($archivo,'jpeg'))){
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        }

        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }

?>

<!DOCTYPE html>
<html  lang="es">
<head>
    <meta charset="UTF-8">
    <title>ElectroStore</title>
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel = "stylesheet" href="assets/css/styles.css">
<link rel = "stylesheet" href="assets/css/styleFactura.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">
</head>
    <body>
        <header class="main-header">
            <div class="container container--flex">
                <div class = "main-header__container">
                    <!--<h1 class="main-header__title"> <img src="img/logo.jpg"alt=""></h1> -->
                <h1 class="main-header__title">ElectroStore</h1>

                    <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
                    <nav class="main-nav" id="main-nav">
                        <ul class="menu">
                        <li class=menu__item><a href="index.php" class="menu__link">Inicio</a></li>
                        <li class=menu__item><a href="ofertas_sin_log.php" class="menu__link">Ofertas</a></li>
                        <li class=menu__item><a href="computacional_sin_log.php" class="menu__link">Computación</a></li>
                        <li class=menu__item><a href="robotica_sin_log.php" class="menu__link">Robótica</a></li>
                        <li class=menu__item><a href="nuevo_sin_log.php" class="menu__link">Nuevo</a></li>
                        </ul>
                    </nav>
                </div>
                <div class = "main-header__container">
                    <a href="https://wa.me/59173657823" class="main-header__txt2">¿Necesitas ayuda?</a>
                    <p class="main-header__txt"><i class="fas fa-phone"></i> Llama +591 77777777</p>
                </div>   
                 <div class = "main-header__container">
                    <a href="login_register.php" class="main-header__btn"><i class="fas fa-user"></i> Iniciar Sesión o Registrarse</a>
                     <!---<a href="" class="main-header__link"> <i class="fas fa-shopping-cart"></i></a>-->
                    <input type = "search" class="main-header__input" placeholder="Buscar productos"><i class="fas fa-search"></i>
                    <a href="search.php" class="btn__shop2">Buscar</a>
                    <!---<form action="php/search.php" method="POST" class="main-header__input">
                    <input type="text" placeholder="Buscar Producto" name="search"><i class="fas fa-search"></i>
                    <button>Buscar</button>
                </form>-->
                </div>        
            </div>
        </header>
        <!---PHP DE LAS IMAGENES-->

        <!---AQUI COMIENZAN LOS COMENTARIO Y EL SLIDER Y PRODUCTOS (ESTOS DOS ULTIMOS ELIMINADOS)-->
    <main class="main">
      

        <div class="container">
            <div class="container2">
                    <img src="<?php echo  $rutaImg; ?>"  >
                    <div><h2><?php echo $nombre; ?></h2>
                <h3><?php echo MONEDA . ' ' . number_format($precio, 2, '.','.'); ?></h3>
                <p class="lead">
                    <?php echo $descripcion; ?>
                </p>
                <div class="container2">
                    
                </div>
                <a href="php/compra-fail-be.php" class="btn__shop2">Comprar ahora</a>
            </div>
       </div>



    <section class="container__testimonial">
        <h2 class="section__title">Comentarios</h2>
        <h3 class="testimonial__title">Bolivia Duran</h3>
        <p class="testimonial__txt">Muy buena tienda, productos nuevos, bonitos y baratos. Con productos originales, compras seguras y con la facilidad de hacerlas desde la comodidad de estar en casa.</p>
        
    </section>
        <a href="">
            <div class="container-editor">
        <div class="editor__item">
            <img src="assets/img/t3.jpg" alt=""class="editor__img">
            <p class="editor__circle">Promoción hasta agotar STOCK</p>
        </div>
        <div class="editor__item">
            <img src="assets/img/img1.jpg" alt="" class="editor__img">
         <p class="editor__circle">Promoción hasta agotar STOCK</p>
        </div>
    </div>
        </a>


    <section class="container-tips">
        <div class="tip">
            <i class="far fa-hand-paper"></i>
            <h2 class="tip__title">Satisfacción Garantizada</h2>
            <p class="tip__txt">En nuestra tienda le garantizamos una compra tranquila y con la satisfacción de realizarlas desde la comodidad de su casa.</p>
            <a href="" class="btn__shop">Comprar ahora</a>
        </div>
        <div class="tip">
            <i class="fas fa-rocket"></i>
            <h2 class="tip__title">Compras rápidas</h2>
            <p class="tip__txt">En nuestra tienda online puede realizar sus compras con mayor rapidez.</p>
            <a href="" class="btn__shop">Comprar ahora</a>
        </div>
        <div class="tip">
            <i class="fas fa-cog"></i>
            <h2 class="tip__title">Protección</h2>
            <p class="tip__txt">Realiza tus compras de manera fácil y segura en nuestra tienda online, disponible las 24hrs al día.</p>
            <a href="" class="btn__shop">Comprar ahora</a>
        </div>
    </section>
    </div>

    </main>
        <footer class="main-footer">
            <div class="footer__section">
                <h2 class="footer__title">Sobre Nosotros</h2>
                <p class="footer__txt">Somos un emprendimientos realiado por jovenes con ganas de emprender mientras terminan sus carreras universitarias.</p>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">Ubicación :</h2>
                <p class="footer__txt">Santa Cruz, Andres Ibañez, Santa Cruz de la Sierra - Bolivia</p>
                <h2 class="footer__title">Contactos :</h2>
                <p class="footer__txt">Celular: +591 0000000</p>
                <p class="footer__txt">Correo Electrónico: ElectroStore_web@gmail.com</p>
                
            </div>
            <div class="footer__section">
                <h2 class="footer__title">Accesos Rápidos</h2>
                <a href="index.php" class="footer__link">Inicio</a>
                <a href="ofertas_sin_log.php" class="footer__link">Ofertas</a>
                <a href="computacional_sin_log.php" class="footer__link">Computacional</a>
                <a href="robotica_sin_log.php" class="footer__link">Robótica</a>
                <a href="nuevo_sin_log.php" class="footer__link">Nuevo</a>

            </div>
            <div class="footer__section">
                <h2 class="footer__title">Suscribete para obtener ofertas</h2>
                <p class="footer__txt">Al suscribirse a nuestra tienta online usted siempre recibirá nuestras últimas noticias y actualizaciones.</p>
                <a href="login_register.php" class="footer__btn"><i class="fas fa-user"></i> Inicia Sesión o Registrate aquí</a>
                
            </div>
            <p class="copy">ElectroStore © 2022. All Rights Reserved | Desing by DanBan</p>
        </footer>
    <script src="assets/js/menu.js"></script>
    </body>
</html>