<!DOCTYPE HTML>

<html lang="es">

<head>
    <title> MI primer CRUD</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/semantic.min.css">
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th colspan="2" >Action</th>
        </tr>

    </thead>

    <tbody>
    <tr>
        <td>Camilo</td>
        <td>Colombia</td>
        <td>
            <a href="#"> Edit</a>
        </td>
        <td>
            <a href="#">Delete</a>
        </td>
    </tr>
    </tbody>

</table>

<form action="" method="POST">
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