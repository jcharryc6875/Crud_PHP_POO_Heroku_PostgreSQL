<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 28/03/2018
 * Time: 13:20
 */
class Conexion{
    //Atributos
    private $host;
    private $user;
    private $password;
    private $db;
    private $puerto;

    //Metodos

    public function __construct()
    {
       /* $this->host = "ec2-174-129-206-173.compute-1.amazonaws.com";//ec2-174-129-206-173.compute-1.amazonaws.com
        $this->user = "chykwwejhjedvl";//chykwwejhjedvl
        $this->password = "f8aad8b00e6d9665e459f23546f8d67dc622657d4390636a8358c03ba0dc1c4a";//f8aad8b00e6d9665e459f23546f8d67dc622657d4390636a8358c03ba0dc1c4a
        $this->db = "d2oaf061dbl65i"; //d2oaf061dbl65i
        $this->puerto = "5432";//5432*/


        $conexion1 = pg_connect("host=ec2-174-129-206-173.compute-1.amazonaws.com port=5432 dbname=d2oaf061dbl65i user=chykwwejhjedvl password=f8aad8b00e6d9665e459f23546f8d67dc622657d4390636a8358c03ba0dc1c4a");
        //$conexion1 = pg_connect($this->host,$this->puerto,$this->user,$this->password);
        //echo 'Connected successfully';
        if($conexion1)
            echo pg_dbname($this->db,$conexion1);
    }


    public function consultaSimple($sql){
        pg_query($sql);

    }
    public function consultaRetorno($sql){
        $consulta = pg_query($sql);
        return $consulta;


    }

}


?>