<?php
    
    session_start();

    if (!isset($_SESSION['acceso'])) {
     header("Location: index.php"); 
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

<?php 
if(isset($_SESSION['carrito'])){
$carrito_mio=$_SESSION['carrito'];
}
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
        if(isset($carrito_mio[$i])){
        if($carrito_mio[$i]!=NULL){ 
        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
        $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
    $totalcantidad += $total_cantidad;
    }}}
}
     if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}
?>






<!DOCTYPE html>
<html  lang="es">
<head>
    <meta charset="UTF-8">
    <title>ElectroStore</title>
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel = "stylesheet" href="assets/css/styles.css">
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
                    <a href="" class="main-header__txt2">¿Necesitas ayuda?</a>
                    <p class="main-header__txt"><i class="fas fa-phone"></i> Llama +5910000000</p>
                </div>   
                <div class = "main-header__container">
                    <a href="login_register.php" class="main-header__btn"><i class="fas fa-user"></i><?php echo ($_SESSION['usuario']); ?></a>
                    <a href="indexlog.php" class="main-header__btn"><i class="fas fa-home"></i>Volver al inicio</a>
                    <input type = "search" class="main-header__input" placeholder="Buscar productos"><i class="fas fa-search"></i>
                    <!---<form action="php/search.php" method="POST" class="main-header__input">
                    <input type="text" placeholder="Buscar Producto" name="search"><i class="fas fa-search"></i>
                    <button>Buscar</button>
                </form>-->
                </div>  
            </div>
        </header>
        <form id="formulario" name="formulario" method="post" action="cart.php">
                

                  <input name="ref" type="hidden" id="ref" value="mu001" />                           
                  <input name="precio" type="hidden" id="precio" value="200" />
                  <input name="titulo" type="hidden" id="titulo" value="Mueble madera moderno" />
                  <input name="cantidad" type="hidden" id="cantidad" value="2" class="pl-2" />

              </form>

    </body>
</html>