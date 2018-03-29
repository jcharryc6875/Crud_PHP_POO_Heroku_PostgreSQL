<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 29/03/2018
 * Time: 1:19
 */

include_once("../modulos/Controlador.php");
include_once("../modulos/Enrutador.php");
include_once("../index.php");
$controlador = new controladorEstudiantes();
// llamamos este metodo para ver los datos de ese id
if(isset($_GET['id'])){
    $row = $controlador->ver($_GET['id']);
}else{
    header('Location: index.php');
}

?>

<!--Montrar datos html-->
<b>Cedula:</b> <?php echo $row['cedula']; ?>
<br><br>
<b>Nombre:</b> <?php echo $row['nombre']; ?>
<br><br>
<b>Apellido:</b> <?php echo $row['apellido']; ?>
<br><br>
<b>Promedio:</b> <?php echo $row['promedio']; ?>
<br><br>