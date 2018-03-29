<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 28/03/2018
 * Time: 17:13
 */

include_once("../modulos/Controlador.php");

    $controlador = new controladorEstudiantes();
    if(isset($_POST['enviar'])){
        $r = $controlador->crear($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],
            $_POST['edad'],$_POST['nota1'],$_POST['nota2'],$_POST['nota3']);

        if($r){
            echo "Se ha registrado el estudiante";
        }else{
            echo "La cedula que esta intentando registrar ya existe";
        }
    }

?>


<h3>Registro de nuevo estudiante</h3>
<hr>
<form action="" method="POST">
    <label for="">Cedula</label><br>
    <input type="number" name="cedula" maxlength="20" required>
    <br><br>
    <label for="">Nombre</label><br>
    <input type="text" name="nombre" required>
    <br><br>
    <label for="">Apellido</label><br>
    <input type="text" name="apellido" required>
    <br><br>
    <label for="">Telefono</label><br>
    <input type="number" name="telefono" maxlength="20" required>
    <br><br>
    <label for="">Edad</label><br>
    <input type="number" name="edad" min="1" maxlength="20" required>
    <br><br>
    <label for="">Nota 1:</label>
    <input type="number" name="nota1" min="1" max="10" required>
    <label for="">Nota 2:</label>
    <input type="number" name="nota2" min="1" max="10" required>
    <label for="">Nota 3:</label>
    <input type="number" name="nota3" min="1" max="10" required>
    <br><br>
    <input type="submit" name="enviar" value="crear" >


</form>