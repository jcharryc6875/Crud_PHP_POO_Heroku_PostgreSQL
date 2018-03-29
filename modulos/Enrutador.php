<?php
/**
 * Created by PhpStorm.
 * User: Kernel-2018
 * Date: 28/03/2018
 * Time: 16:55
 */


class Enrutador{

    public function cargarVista($vista){

        switch ($vista):
            //revisar estas lineas
            case "crear":
                include_once('vistas/'.$vista.'.php');
                break;
            case "ver":
                include_once('vistas/'.$vista.'.php');
                break;
            case "editar":
                include_once('vistas/'.$vista.'.php');
                break;
            default:
                include_once('vistas/error.php');



        endswitch;



    }


    public function validarGET($variable){
        if(empty($variable)){
            include_once('vistas/inicio.php');
        }
        else{
            return true;
        }


    }


}



?>