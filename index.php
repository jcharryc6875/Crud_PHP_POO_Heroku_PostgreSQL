<?php
    include_once('./BaseDatos/server.php');

    //fetch the record to be updated
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;

        $rec = pg_query($db, "SELECT * FROM info WHERE id=$id");
        $record = pg_fetch_array($rec);
        $name = $record['name'];
        $address = $record['address'];
        $id = $record['id'];

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

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th colspan="2" >Action</th>
        </tr>

    </thead>
    <!-- llamando registros de la base de datos 2-->
    <!-- 2 -->
    <tbody>

    <?php while ($row = pg_fetch_array($results))   { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td>
            <!--//actualizar registros
        //3-->
            <a class="edit_btn" href="index.php?edit=<?php echo $row['id'];?>"> Edit</a>
        </td>
        <td>
           <!-- BORRAR REGISTROS
            4-->
            <a class="delete_btn" href="BaseDatos/server.php?del=<?php echo $row['id'];?>">Delete</a>
        </td>
    </tr>

    <?php }?>
    </tbody>

</table>
<!--server.php conexion con la base de datos-->
<form action="BaseDatos/server.php" method="POST">
    <!--//actualizar registros
    //3-->
    <input type="hidden" name="id"  value="<?php echo $id;?>">
    <div class="input-group">

        <label for="">Name</label>
        <input type="text" name="name" value="<?php echo $name;?>">
    </div>
    <div class="input-group">

        <label for="">Address</label>
        <input type="text" name="address" value="<?php echo $address;?>">
    </div>

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