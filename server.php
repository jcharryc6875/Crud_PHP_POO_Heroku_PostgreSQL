<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 29/03/2018
 * Time: 16:01
 */


    //INICIALIZAR VARIABLES
    $name = "";
    $address = "";
    $id = 0;


    //conectar con la base de datos

    $db = pg_connect("host=ec2-174-129-206-173.compute-1.amazonaws.com port=5432 dbname=d2oaf061dbl65i user=chykwwejhjedvl password=f8aad8b00e6d9665e459f23546f8d67dc622657d4390636a8358c03ba0dc1c4a");

    // si se presiona el boton save de el formulario

    if(isset($_POST['save'])){
        //empiezo a pasar los nombres de los atributos de mi formulario

        $name = $_POST['name'];
        $address = $_POST['address'];


        // hacemos la query de insertar datos

        $query = "INSERT INTO info (name, address ) VALUES('$name', '$address')";
        pg_query($db, $query);
        header('location: index.php'); //redireccionamos a la pagina principal

    }


?>