
<?php

include_once("../modulos/Controlador.php");
include_once("../modulos/Enrutador.php");
$controlador = new controladorEstudiantes();
$resultado = $controlador->index();
?>



<h3>Pagina de Inicio</h3>

    <table>
        <thead>
        <th>id</th>
        <th>cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Promedio</th>
        <th>Accion</th>
        </thead>

        <tbody>
        <?php while ($row = pg_fetch_array($resultado)): ?>
            <tr>
                <td> <?php echo $row['id'];?></td>
                <td><?php echo $row['cedula']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['promedio']; ?></td>
                <td>
                    <a href="?cargar=ver&id=<?php echo $row['id']; ?>"> Ver</a>
                    <a href="?cargar=editar&id=<?php echo $row['id']; ?>"> Editar</a>
                    <a href="?cargar=eliminar&id=<?php echo $row['id']; ?>"> Eliminar</a>

                </td>

            </tr>
         <?php endwhile;  ?>

        </tbody>


    </table>





