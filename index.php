<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 28/03/2018
 * Time: 13:18
 */
    include_once("modulos/Enrutador.php");
    include_once("modulos/Controlador.php");


?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Crud PHP POO POSTGRESQL</title>
    <link rel="stylesheet" href="css/estilos.css">

<!--    //SEMANTIC UI CON  JQUERY-->
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="js/semantic.js"></script>

</head>

<body>

<h1 class="hola">Bienvenidos los estudiantes</h1>
<a href="vistas/inicio.php">Click Me!</a>

<!-- CODIGO SEMANTIC -->


<!-- CODIGO SEMANTIC -->

<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="?cargar=crear">Registrar</a></li>
        <li><a href="vistas/crear.php">Registrar2</a></li>
    </ul>
</nav>

<section>

    <?php
    $enrutador = new Enrutador();

    if($enrutador->validarGET($_GET['cargar'])){

        $enrutador->cargarVista($_GET['cargar']);

    }

    ?>

</section>



</body>





</html>
