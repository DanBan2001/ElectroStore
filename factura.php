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

    $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE nuevo=1");
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
                    <<a href="https://wa.me/59173657823" class="main-header__txt2">¿Necesitas ayuda?</a>
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
        <?php
                    $imagen = "assets/img/qr/qr.jpeg";

                    if(!file_exists("$imagen")){
                        $imagen = "assets/img/back.jpg";
                    }

                ?>
    <!--- COMENZAMOS EL METODO DE LA FACTURA  -->
     <main class="main">
    <div class="container">
        <h2 >Escanea el QR con tu banca movil para realiar el pago</h2>
            <div class="container2">
                <div class="container3">
                     
                    <img src="<?php echo $imagen; ?>" >
                </div>
                <div class="container3">
                      <div class="contenedor__todo">
                    <div class="contenedor__login-register">
                    <form action="https://formsubmit.co/electrostore.web.scz@gmail.com"
                            method="POST"
  enctype="multipart/form-data" class="factura">
                    <h3 class="h3">Rellena con tus datos personales</h3>
                    <input type="text" placeholder="Nombres" name="Nombre">
                    <input type="text" placeholder="Apellidos" name="Apellidos">
                    <input type="text" placeholder="Número de celular" name="Número_de_celular">
                    <input type="text" placeholder="Dirección" name="Direccion">
                    <input type="email" placeholder="Correo Electrónico" name="Correo_Electronico">
                    <input type="file"  name="upload" class="btn__shop3">
                     

                    </div>
                   
                   </div>
                </div>
                 
               
                

       </div>
        <p class="lead">
                    Luego de escanear el qr con su banca movil debes subir una captura del recibo del banco, una vez subida la captura de pantalla deberas esperar el correo de confirmación y tu pedido ya estara en camino.
                </p>
 <button type= "submit" class="btn__shop2">Pagar</button>

                                </form>
                         
                          <!--- <form action="https://formsubmit.co/banegasdaniel424@gmail.com" method="POST" class="factura">
                            
                         </form> -->         

    <!--- FINALIZA EL METODO DE LA FACTURA  -->

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
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/menu.js"></script>
    </body>
</html>