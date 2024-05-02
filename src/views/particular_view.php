<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['rol'] !== 'Particular') {
    echo '<script>window.location.href="login_view.php?msg=Acceso denegado. Debe iniciar sesión como particular";</script>';
    exit();
}

function loadSection($section) {
    switch ($section) {
        case 'reserva':
            include('plantillas/reserva.php');
            break;
        case 'datos':
            include('plantillas/datos.php');
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