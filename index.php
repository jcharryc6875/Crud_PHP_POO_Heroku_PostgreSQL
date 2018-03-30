<?php
    include_once('server.php');

    //fetch the record to be updated
    if(isset($_GET['edit'])){
        $empleado_id = $_GET['edit'];
        $edit_state = true;
    //frontend 7) llamara datos
        $rec = pg_query($db, "SELECT * FROM employees WHERE empleado_id=$empleado_id");
        $record = pg_fetch_array($rec);
        $empleado_id = $record['empleado_id'];
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



<table class="ui inverted olive">
    <thead>
        <tr>
            <!--fronted 8) desplegar datos en html-->
            <th>empleado_id</th>
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
        <td><?php echo $row['empleado_id']; ?></td>
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
  <div class="ui right labeled input">
        <input type="number" placeholder="Enter ..." name="empleado_id" value="<?php echo $empleado_id;?>">
        <div class="ui basic label">
            empleado_id
        </div>
    </div>



    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="primer_nombre" value="<?php echo $primer_nombre;?>">
        <div class="ui basic label">
            Primer Nombre
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="segundo_nombre" value="<?php echo $segundo_nombre;?>">
        <div class="ui basic label">
            Segundo Nombre
        </div>
    </div>

    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="email" name="correo" value="<?php echo $correo;?>">
        <div class="ui basic label">
            Correo
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="tel" placeholder="Enter ..." name="numero_telefono" value="<?php echo $numero_telefono;?>">
        <div class="ui basic label">
            Numero_Telefono
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="fecha_ingreso" value="<?php echo $fecha_ingreso;?>">
        <div class="ui basic label">
            Fecha Ingreso
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="trabajo_id" value="<?php echo $trabajo_id;?>">
        <div class="ui basic label">
            Trabajo Id
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <div class="ui right labeled input">
        <input type="number" placeholder="Enter ..." name="salario" value="<?php echo $salario;?>">
        <div class="ui basic label">
            Salario
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
     <div class="ui right labeled input">
        <input type="number" placeholder="Enter ..." name="jefe_id" value="<?php echo $jefe_id;?>">
        <div class="ui basic label">
            Jefe Id
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="number" placeholder="Enter ..." name="departamento_id" value="<?php echo $departamento_id;?>">
        <div class="ui basic label">
            Departamento Id
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="sexo" value="<?php echo $sexo;?>">
        <div class="ui basic label">
            Sexo
        </div>
    </div>


    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="ui right labeled input">
        <input type="text" placeholder="Enter ..." name="genero" value="<?php echo $genero;?>">
        <div class="ui basic label">
            Genero
        </div>
    </div>

    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <!-- <div class="ui right labeled input">
        <input type="checkbox" placeholder="Enter ..." name="estado_civil" value="<?php /*echo $estado_civil;*/?>">
        <div class="ui basic label">
            Estado Civil
        </div>
    </div>-->
    <div class="ui right labeled" >
       <select name="estado_civil" required>
            <option value="<?php echo $estado_civil;?>">SOLTERO</option>
            <option value="<?php echo $estado_civil;?>">CASADO</option>
      </select>

        <div class="ui basic label">
            Estado Civil
        </div>

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