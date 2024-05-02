<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['rol'] !== 'Administrador') {
    echo '<script>window.location.href="login_view.php?msg=Acceso denegado. Debe iniciar sesión como administrador";</script>';
    exit();
}

function loadSection($section) {
    switch ($section) {
        case 'reserva':
            include('plantillas/reserva_admin.php');
            break;
        case 'datos':
            include('plantillas/datos.php');
            break;
        default:
            include('plantillas/reserva_admin.php'); 
    }
}

if (isset($_GET['section'])) {
    $section = $_GET['section'];
} else {
    $section = 'reserva';  // Set default section to 'reserva'
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="container">
    <h1>Panel de Administración</h1>

    <nav>
        <ul>
            <li><a href="admin_view.php?section=reserva" <?php echo ($section == 'reserva' ? 'class="active"' : ''); ?>>Crear Reserva</a></li>
            <li><a href="admin_view.php?section=datos" <?php echo ($section == 'datos' ? 'class="active"' : ''); ?>>Mis datos</a></li>
        </ul>
    </nav>

    <?php loadSection($section); // Load the section based on the user's selection ?>
</div>
</body>
</html>
