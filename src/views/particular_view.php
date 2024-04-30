<?php
session_start();

require_once '../controllers/UserController.php';

$controller = new UserController($conn);

function loadSection($section) {
    switch ($section) {
        case 'reserva':
            include('plantillas/reserva.php');
            break;
        case 'datos':
            include('plantillas/datos.php');
            break;
        case 'create_reservation':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'create_reservation') {
                $data = [
                    'localizador' => bin2hex(random_bytes(10)), 
                    'id_hotel' => $_POST['hotelDestino'], 
                    'id_tipo_reserva' => $_POST['tipoTrayecto'],
                    'email_cliente' => $_SESSION['email'], 
                    'id_destino' => $_POST['hotelDestino'],
                    'fecha_entrada' => $_POST['diaLlegada'],
                    'hora_entrada' => $_POST['horaLlegada'],
                    'numero_vuelo_entrada' => $_POST['numeroVueloLlegada'],
                    'origen_vuelo_entrada' => $_POST['origenVuelo'],
                    'hora_vuelo_salida' => $_POST['horaVuelo'],
                    'fecha_vuelo_salida' => $_POST['diaVuelo'],
                    'num_viajeros' => $_POST['numViajeros'],
                    'id_vehiculo' => 1 
                ];
                $result = $controller->createReservation($data);
                if ($result['success']) {
                    echo '<p>Reserva creada con éxito.</p>';
                } else {
                    echo '<p>Error al crear la reserva: ' . $result['message'] . '</p>';
                }
            }
            include('plantillas/reserva.php');
            break;
        default:
            include('plantillas/reservas.php'); 
    }
}

if (isset($_GET['section'])) {
    $section = $_GET['section'];
} else {
    $section = ''; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Usuario</title>
    <link rel="stylesheet" href="css/particular.css">
</head>
<body>
<div class="container">
    <h1>Panel de Usuario Particular</h1>

    <nav>
        <ul>
            <li><a href="particular_view.php" <?php echo ($section == '' ? 'class="active"' : ''); ?>>Mis Reservas</a></li>
            <li><a href="particular_view.php?section=reserva" <?php echo ($section == 'reserva' ? 'class="active"' : ''); ?>>Realizar una Reserva</a></li>
            <li><a href="particular_view.php?section=datos" <?php echo ($section == 'datos' ? 'class="active"' : ''); ?>>Mis Datos Personales</a></li>
        </ul>
    </nav>

    <?php loadSection($section); // Carga la sección basada en la selección del usuario ?>
</div>

<script src="js/functions.js"></script>
</body>
</html>