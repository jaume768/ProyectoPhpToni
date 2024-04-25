<?php
require_once dirname(__FILE__).'/../config/db.php';

class Reservas {
    private $db;

    public function __construct(){
    }

    public function get_reservas_by_usuario_id($id_viajero){

        $conexion = new Conexion();

        //Consulta realizada a la BBDD
        $sql = "SELECT * FROM `transfer_reservas` WHERE `transfer_reservas`.`email_cliente`=:id_viajero";
        //Preparamos la consulta
        $query = $conexion -> prepare($sql);
        //Vinculamos los parametros de la consulta
        $query -> bindParam(':id_viajero',$id_viajero,PDO::PARAM_INT);
        //Ejecutamos la consulta
        $query -> execute();
        //Asignamos los resultados y los devolvemos
        $result = $query -> fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}