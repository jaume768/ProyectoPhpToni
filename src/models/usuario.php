<?php
require_once dirname(__FILE__).'/../config/db.php';

class Usuario {
    private $db;
    
    public function __construct(){
    }

    public function login_usuario($email, $pass){
        
        $conexion = new Conexion();

        //Consulta realizada a la BBDD
        $sql = "SELECT * FROM `transfer_viajeros` WHERE `transfer_viajeros`.`email`=:email AND `transfer_viajeros`.`password`=:pass";
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

    public function check_user_exists($email){

        $conexion = new Conexion();

        //Consulta realizada a la BBDD
        $sql = "SELECT * FROM `transfer_viajeros` WHERE `transfer_viajeros`.`email`=:email";
        //Preparamos la consulta
        $query = $conexion->prepare($sql);
        //Vinculamos los parametros de la consulta
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        //Ejecutamos la consulta
        $query->execute();
        //Asignamos los resultados y los devolvemos
        $result = $query -> fetch(PDO::FETCH_OBJ);
        if (empty($result)){
            return false;
        }else{
            return true;
        }

    }

    public function registro_usuario($nombre, $apellido1, $apellido2, $direccion, 
                                     $codigopostal, $ciudad, $pais, $email, $password){
        
        $conexion = new Conexion();

        //Primero comprobamos que no existe ya el usuario
        $exists = $this->check_user_exists($email);
        if ($exists == true){
            throw new Exception('Ya existe un usuario con ese correo electronico');
        }

        //Preparamos el insert
        $sql = "INSERT INTO `transfer_viajeros` (`id_viajero`, `nombre`, `apellido1`, `apellido2`, `direccion`, `codigoPostal`, 
                `ciudad`, `pais`, `email`, `password`) VALUES (NULL, :nombre, :apellido1, :apellido2, :direccion, 
                :codigoPostal, :ciudad, :pais, :email, :pass)";

        //Preparamos la consulta
        $sql = $conexion->prepare($sql);

        //Vinculamos los parametros
        $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sql->bindParam(':apellido1',$apellido1,PDO::PARAM_STR);
        $sql->bindParam(':apellido2',$apellido2,PDO::PARAM_STR);
        $sql->bindParam(':direccion',$direccion,PDO::PARAM_STR);
        $sql->bindParam(':codigoPostal',$codigopostal,PDO::PARAM_STR);
        $sql->bindParam(':ciudad',$ciudad,PDO::PARAM_STR);
        $sql->bindParam(':pais',$pais,PDO::PARAM_STR);
        $sql->bindParam(':email',$email,PDO::PARAM_STR);
        $sql->bindParam(':pass',$password,PDO::PARAM_STR);

        //Ejecutamos
        $sql->execute();

        //Comprobamos si ha ido bien
        $lastInsertId = $conexion->lastInsertId();
        if($lastInsertId>0){
            return true;
        }else{
            throw new Exception('Error al crear el usuario');
        }

    }

    public function get_usuario($id_viajero){

        $conexion = new Conexion();

        //Consulta realizada a la BBDD
        $sql = "SELECT * FROM `transfer_viajeros` WHERE `transfer_viajeros`.`id_viajero`=:id";
        //Preparamos la consulta
        $query = $conexion -> prepare($sql);
        //Vinculamos los parametros de la consulta
        $query -> bindParam(':id',$id_viajero,PDO::PARAM_INT);
        //Ejecutamos la consulta
        $query -> execute();
        //Asignamos los resultados y los devolvemos
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;        

    }

}