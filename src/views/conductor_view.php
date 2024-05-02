<?php
session_start();

// Validar que el conductor ha iniciado sesión correctamente
if (!isset($_SESSION['email']) || $_SESSION['rol'] !== 'Conductor') {
    echo '<script>window.location.href="login_view.php?msg=Acceso denegado. Debe iniciar sesión como conductor";</script>';
    exit();
}

// Función para cargar las diferentes secciones
function loadSection($section) {
    switch ($section) {
        case 'calendario':
            include('plantillas/calendario.php');
            break;
        case 'datos':
            include('plantillas/datos.php');
            break;
        default:
            include('plantillas/calendario.php');  // Por defecto carga el calendario
    }
}

// Determinar la sección actual basada en la entrada de GET
if (isset($_GET['section'])) {
    $section = $_GET['section'];
} else {
    $section = 'calendario';  // Por defecto es 'calendario'
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Conductor</title>
    <link rel="stylesheet" href="css/conductor.css">
</head>
<body>
<div class="container">
    <h1>Panel del Conductor</h1>
    <nav>
        <ul>
            <li><a href="conductor_view.php?section=calendario" <?php echo ($section == 'calendario' ? 'class="active"' : ''); ?>>Calendario de Trayectos</a></li>
            <li><a href="conductor_view.php?section=datos" <?php echo ($section == 'datos' ? 'class="active"' : ''); ?>>Mis Datos Personales</a></li>
        </ul>
    </nav>

    <?php loadSection($section); ?>
</div>
<script src="js/functions.js"></script>
</body>
</html>
