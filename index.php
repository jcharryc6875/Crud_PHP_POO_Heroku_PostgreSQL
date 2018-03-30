<?php
    include_once('server.php');

    //fetch the record to be updated
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
    //frontend 7) llamara datos
        $rec = pg_query($db, "SELECT * FROM employees WHERE empleado_id=$empleado_id");
        $record = pg_fetch_array($rec);

        $primer_nombre = $record['primer_nombre'];
        $segundo_nombre = $record['segundo_nombre'];
        $correo = $record['correo'];
        $numero_telefono = $record['numero_telefono'];
        $fecha_ingreso = $record['fecha_ingreso'];
        $trabajo_id = $record['trabajo_id'];
        $salario = $record['salario'];
        $jefe_id = $record['jefe_id'];
        $departamento_id = $record['departamento_id'];
        $sexo = $record['sexo'];
        $genero = $record['genero'];
        $estado_civil = $record['estado_civil'];
        $empleado_id = $record['empleado_id'];

    }

?>


<!DOCTYPE HTML>

<html lang="es">

<head>
    <title> MI primer CRUD</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <!--    //SEMANTIC UI CON  JQUERY-->

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="js/semantic.js"></script>

</head>
<body>

<!--//Mostrar notificaciones de mensajes
//3-->
        <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
        </div>

      <?php endif;  ?>



<table class="ui inverted olive table">
    <thead>
        <tr>
            <!--fronted 8) desplegar datos en html-->

            <th>primer_nombre</th>
            <th>segundo_nombre</th>
            <th>correo</th>
            <th>numero_telefon</th>
            <th>fecha_ingreso</th>
            <th>trabajo_id</th>
            <th>salario</th>
            <th>jefe_id</th>
            <th>departamento_id</th>
            <th>sexo</th>
            <th>genero</th>
            <th>estado_civil</th>
            
            <th colspan="2" >Action</th>
        </tr>

    </thead>


    <tbody>
    <!-- 9)llamando registros de la base de datos-->
    <?php while ($row = pg_fetch_array($results))   { ?>
    <tr>

        <td><?php echo $row['primer_nombre']; ?></td>
        <td><?php echo $row['segundo_nombre']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php echo $row['numero_telefono']; ?></td>
        <td><?php echo $row['fecha_ingreso']; ?></td>
        <td><?php echo $row['trabajo_id']; ?></td>
        <td><?php echo $row['salario']; ?></td>
        <td><?php echo $row['jefe_id']; ?></td>
        <td><?php echo $row['departamento_id']; ?></td>
        <td><?php echo $row['sexo']; ?></td>
        <td><?php echo $row['genero']; ?></td>
        <td><?php echo $row['estado_civil']; ?></td>
        <td>
            <!--10)//actualizar registros-->
            <a class="edit_btn" href="index.php?edit=<?php echo $row['empleado_id'];?>"> Edit</a>
        </td>
        <td>
           <!-- 11)BORRAR REGISTROS-->
            <a class="delete_btn" href="server.php?del=<?php echo $row['empleado_id'];?>">Delete</a>
        </td>
    </tr>

    <?php }?>
    </tbody>

</table>
<!--server.php conexion con la base de datos-->
<form action="server.php" method="POST">
    <!--//12) actualizar registros en el formulario-->
   <input type="hidden" name="empleado_id"  value="<?php echo $empleado_id;?>">

    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

    <div class="input-group">

        <label for="">Primer Nombre</label>
        <input type="text" name="primer_nombre" value="<?php echo $primer_nombre;?>">
    </div>
    <div class="input-group">

        <label for="">Segundo Nombre</label>
        <input type="text" name="segundo_nombre" value="<?php echo $segundo_nombre;?>">
    </div>

    <div class="input-group">

        <label for="">Correo</label>
        <input type="email" name="correo" value="<?php echo $correo;?>">
    </div>

    <div class="input-group">

        <label for="">Numero_Telefono</label>
        <input type="number" name="numero_telefono" value="<?php echo $numero_telefono;?>">
    </div>

    <div class="input-group">

        <label for="">Fecha_Ingreso</label>
        <input type="datetime-local" name="fecha_ingreso" value="<?php echo $fecha_ingreso;?>">
    </div>

    <div class="input-group">

        <label for="">Trabajo Id</label>
        <input type="text" name="trabajo_id" value="<?php echo $trabajo_id;?>">
    </div>

    <div class="input-group">

        <label for="">Salario</label>
        <input type="number" name="salario" value="<?php echo $salario;?>">
    </div>

    <div class="input-group">

        <label for="">Jefe Id</label>
        <input type="number" name="jefe_id" value="<?php echo $jefe_id;?>">
    </div>

    <div class="input-group">

        <label for="">Departamento Id</label>
        <input type="number" name="departamento_id" value="<?php echo $departamento_id;?>">
    </div>

    <div class="input-group">

        <label for="">Sexo</label>
        <input type="text" name="sexo" value="<?php echo $sexo;?>">
    </div>

    <div class="input-group">

        <label for="">Genero</label>
        <input type="text" name="genero" value="<?php echo $genero;?>">
    </div>
    <div class="input-group">

        <label for="">Estado Civil</label>
        <input type="text" name="estado_civil" value="<?php echo $estado_civil;?>">
    </div>
    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="input-group">
       <!-- //actualizar registros
        //3-->
        <?php   if ($edit_state == false): ?>

        <button type="submit" name="save" class="btn">Guardar</button>
        <?php else: ?>

        <button type="submit" name="update" class="btn">Actualizar</button>
        <?php endif; ?>

    </div>



</form>


</body>


</html>