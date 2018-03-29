<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 29/03/2018
 * Time: 1:42
 */
    include_once("../modulos/Controlador.php");
    include_once("../index.php");
    $controlador = new controladorEstudiantes();
    // llamamos este metodo para ver los datos de ese id
    if(isset($_GET['id'])){
        $row = $controlador->ver($_GET['id']);
    }else{
        header('Location: index.php');
    }

?>

<form action="" method="post">
    <input type="number" name="cedula" value="<?php echo $row['cedula']; ?>" disabled>
    <input type="text" name="nombre" value="<?php echo $row['nombre'];?>" required >
    <input type="text" name="apellido" value="<?php echo $row['apellido'];?>" required>
    <input type="text">
    <input type="text">



</form>

