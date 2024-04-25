<?php
require_once dirname(__FILE__).'/../config/db.php';

class Conductor {
    private $db;
    
    public function __construct(){
    }

    public function login_conductor($email, $pass){
        
        $conexion = new Conexion();

        //Consulta realizada a la BBDD
        $sql = "SELECT * FROM `transfer_vehiculo` WHERE `transfer_vehiculo`.`email_conductor`=:email AND `transfer_vehiculo`.`password`=:pass";
        //Preparamos la consulta
        $query = $conexion -> prepare($sql);
        //Vinculamos los parametros de la consulta
        $query -> bindParam(':email',$email,PDO::PARAM_STR);
        $query -> bindParam(':pass',$pass,PDO::PARAM_STR);
        //Ejecutamos la consulta
        $query -> execute();
        //Asignamos los resultados y los devolvemos
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;

    }
    
}