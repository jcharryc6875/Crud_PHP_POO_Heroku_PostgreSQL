<?php
    include_once('server.php');

?>


<!DOCTYPE HTML>

<html lang="es">

<head>
    <title> MI primer CRUD</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/semantic.min.css">
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
            <a href="#"> Edit</a>
        </td>
        <td>
            <a href="#">Delete</a>
        </td>
    </tr>

    <?php }?>
    </tbody>

</table>
<!--server.php conexion con la base de datos-->
<form action="server.php" method="POST">
    <div class="input-group">

        <label for="">Name</label>
        <input type="text" name="name" >
    </div>
    <div class="input-group">

        <label for="">Address</label>
        <input type="text" name="address" >
    </div>

    <div class="input-group">
        <button type="submit" name="save" class="btn">Guardar</button>

    </div>



</form>


</body>


</html>