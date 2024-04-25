<?php
$tipo = $_GET['tipo'];

if ($tipo == 'usuario') {
    require('../views/registro_usuario_view.php');
} elseif ($tipo == 'conductor') {
    require('../views/registro_conductor_view.php');
}

?>