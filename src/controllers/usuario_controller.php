<?php

//Recogemos el id del usuario
$id_viajero = $usuario['id_viajero'];
//Llamamos al modelo para recuperar las reservas
require_once('../models/reservas.php');
//Instanciamos el objtos reservas
$reservas = new Reservas();
//Recuperamos todas las reservas asociadas al usuario
$lista_reservas = $reservas->get_reservas_by_usuario_id($id_viajero);

require('../views/usuario_reservas_view.php');
?>