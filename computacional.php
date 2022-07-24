<?php
    
    session_start();

    if (!isset($_SESSION['acceso'])) {
     header("Location: computacional_sin_log.php")  ; 
    }
    include_once("php/conexion_be.php");
    include_once("php/conexion_search_be.php");
    require 'config/database.php';
    require 'config/config.php';
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id, nombre, precio, id_categoria FROM productos WHERE id_categoria='Oficina' or id_categoria='Teclado' or id_categoria='Mouse' ");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
                        <li class=menu__item><a href="indexlog.php" class="menu__link">Inicio</a></li>
                        <li class=menu__item><a href="ofertas.php" class="menu__link">Ofertas</a></li>
                        <li class=menu__item><a href="computacional.php" class="menu__link">Computación</a></li>
                        <li class=menu__item><a href="robotica.php" class="menu__link">Robótica</a></li>
                        <li class=menu__item><a href="nuevo.php" class="menu__link">Nuevo</a></li>
                        </ul>
                    </nav>
                </div>
                <div class = "main-header__container">
                    <a href="https://wa.me/59173657823" class="main-header__txt2">¿Necesitas ayuda?</a>
                    <p class="main-header__txt"><i class="fas fa-phone"></i> Llama +591 77777777</p>
                </div>   
                <div class = "main-header__container">
                    <a href="php/cerrar_sesion.php" class="main-header__btn"><i class="fas fa-user"></i>Bienvenido Daniel</a>
                    <!---<a href="car-shop.php" class="main-header__btn"> Mi Carrito <i class="fas fa-shopping-cart"></i></a>--->
                    <input type = "search" class="main-header__input" placeholder="Buscar productos"><i class="fas fa-search"></i>
                    <a href="search-log.php" class="btn__shop2">Buscar</a>
                </div>       
            </div>
        </header>
        <!-- CODIGO DEL SLIDER DE LA PAGINA PRINCIPAL -->

   <!---<div class="container-slider"> 
        <div class="slider" id="slider">
            <div class="slider__section">
                <img src="assets/img/sliders/t5.jpg" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Productos nuevos</h2>
                    <p class="slider__txt">variedad de teclados, mouses,monitores</p>
                    <a href="" class="btn__shop">Comprar Ahora</a>
                </div>
            </div>
        <div class="slider__section">
                <img src="assets/img/sliders/img2.jpg" alt="" class="slider__img">
                <div class="slider__content">
                  <h2 class="slider__title">Productos para robótica</h2>
                    <p class="slider__txt">Arduino Uno - Arduino Nano</p>
                    <a href="" class="btn__shop">Comprar Ahora</a>
                </div>
            </div>
        <div class="slider__section">
                <img src="assets/img/sliders/img3.jpg" alt="" class="slider__img">
                <div class="slider__content">
                   <h2 class="slider__title">Nuevos modelos</h2>
                    <p class="slider__txt">Logitech - Razer - Redragon</p>
                    <a href="" class="btn__shop">Comprar Ahora</a>
                </div>
            </div>
        <div class="slider__section">
                <img src="assets/img/sliders/img4.jpg" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Productos para gamer's</h2>
                    <p class="slider__txt">Logitech - Razer - Redragon</p>
                    <a href="" class="btn__shop">Comprar Ahora</a>
                </div>
            </div>
        </div>
        <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
        <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
    </div>--->
    <main class="main">
        <div class="container">
            <h2 class="main-title">Artículos computacionales para oficina</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           
            <section class="container-products">
                 <?php foreach($resultado as $row) { ?>
            <div class="product">
                <?php
                    $id = $row['id'];
                    $imagen = "assets/img/productos_computacion/". $id ."/img.jpg";

                    if(!file_exists("$imagen")){
                        $imagen = "assets/img/back.jpg";
                    }

                ?>
                <a href="preview-productlog.php?id=<?php echo $row['id'];?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>"> <img src="<?php echo $imagen; ?>" alt="" class="product__img"> </a> 
                <div class="product__description">
                    <a href="preview-productlog.php?id=<?php echo $row['id'];?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="product__title"><h3 ><?php echo $row['nombre']; ?></h3></a>
                    <span class="product__price">Bs. <?php echo number_format($row['precio'],2,'.',','); ?></span>
                </div>
                <a href="factura.php" class="product__icon" >Comprar ahora <i class="fas fa-money-bill-wave"></i></a>
               </div>

               <?php } ?>
        </section>
    
    </div>

    <section class="container__testimonial">
        <h2 class="section__title">Comentarios</h2>
        <h3 class="testimonial__title">Bolivia Duran</h3>
        <p class="testimonial__txt">Muy buena tienda, productos nuevos, bonitos y baratos. Con productos originales, compras seguras y con la facilidad de hacerlas desde la comodidad de estar en casa.</p>
    </section>
        
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


 <section class="container-tips">
        <div class="tip">
            <i class="fas fa-grin-stars"></i>
            <h2 class="tip__title">Productos de calidad</h2>
            <p class="tip__txt">En nuestra tienda le garantizamos una compra tranquila, sin temor de ser estafado con imitaciones de pésima calidad y con la satisfacción de poder realizar sus compras desde la comodidad de su casa.</p>
            <a href="indexlog.php" class="btn__shop">Comprar ahora</a>
        </div>
        <div class="tip">
           <i class="fas fa-laptop"></i>
            <h2 class="tip__title">Computación</h2>
            <p class="tip__txt">En nuestra tienda online puedes encontrar una variedad de productos para computación, tanto como para oficinas y gamer's.</p>
            <a href="computacional.php" class="btn__shop">Comprar ahora</a>
        </div>
        <div class="tip">
            <i class="fas fa-robot"></i></i>
            <h2 class="tip__title">Robótica</h2>
            <p class="tip__txt">Realiza tus compras para tus proyectos de robótica de manera fácil y segura en nuestra tienda online, disponible las 24hrs al día.</p>
            <a href="robotica.php" class="btn__shop">Comprar ahora</a>
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
                <a href="" class="footer__link">Inicio</a>
                <a href="" class="footer__link">Sobre Nosotros</a>
                <a href="" class="footer__link">Reportar un error</a>
                <a href="" class="footer__link">Tienda</a>
                <a href="" class="footer__link">Contactos</a>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">¿Deseas Cerrar Sesión?</h2>
                <p class="footer__txt">Has click en el bot{on de abajo para cerrar tu sesión en la tienda.</p>
                <a href="php/cerrar_sesion.php" class="footer__btn"><i class="fas fa-user"></i> Cerrar Sesión</a>
                
            </div>
            <p class="copy">ElectroStore © 2022. All Rights Reserved | Desing by DanBan</p>
        </footer>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/menu.js"></script>
    </body>
</html>