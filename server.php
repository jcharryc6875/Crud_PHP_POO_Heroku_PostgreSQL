<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 29/03/2018
 * Time: 16:01
 */
    //Mostrar notificaciones de mensajes
    //3
    session_start();

    //INICIALIZAR VARIABLES
    $name = "";
    $address = "";
    $id = 0;

    //actualizar registros
    //3
    $edit_state = false;


    //conectar con la base de datos

    $db = pg_connect("host=ec2-174-129-206-173.compute-1.amazonaws.com port=5432 dbname=d2oaf061dbl65i user=chykwwejhjedvl password=f8aad8b00e6d9665e459f23546f8d67dc622657d4390636a8358c03ba0dc1c4a");

    // si se presiona el boton save de el formulario

    if(isset($_POST['save'])){
        //empiezo a pasar los nombres de los atributos de mi formulario

        $name = $_POST['name'];
        $address = $_POST['address'];


        // hacemos la query de insertar datos

        $query = "INSERT INTO info(name,address) VALUES('$name', '$address')";
        pg_query($db, $query);
        //Mostrar notificaciones de mensajes
        //3
        $_SESSION['msg'] = "Dirrecion Guardada";

        header('location: index.php'); //redireccionamos a la pagina principal

    }

    //actualizar registros
    //3-->

    if (isset($_POST['update'])){
        $name = pg_escape_string($_POST['name']);
        $address = pg_escape_string($_POST['address']);
        $id = pg_escape_string($_POST['id']);

        pg_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
        $_SESSION['msg'] = "Imformacion Actualizada";

        header('location: index.php'); //redireccionamos a la pagina principal
    }

    //recuperar registros##################
    //2
    $results = pg_query($db, "SELECT * FROM info");


?>