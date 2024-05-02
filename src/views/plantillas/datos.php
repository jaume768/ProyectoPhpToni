<?php
include __DIR__ . '/../../controllers/UserController.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$userController = new UserController($conn);

// Comprobar que la sesión tiene un email y un rol definidos antes de usarlos
if (!isset($_SESSION['email']) || !isset($_SESSION['rol'])) {
    // Redirigir al usuario al login si no está definido el email o el rol
    header("Location: ../views/login_view.php");
    exit();
}

$email = $_SESSION['email'];
$rol = $_SESSION['rol'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userController->updateUser(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['apellido1'],
        $_POST['apellido2'],
        $_POST['direccion'],
        $_POST['codigoPostal'],
        $_POST['ciudad'],
        $_POST['pais'],
        $_POST['email']
    );

    $_SESSION['update_success'] = "Datos actualizados con éxito.";

    if ($rol === 'Particular') {
        header("Location: ../particular_view.php?section=datos");
    } else {
        header("Location: ../admin_view.php?section=datos");
    }
    exit();
}

$user = $userController->getUserByEmail($email);
?>

<?php if (isset($_SESSION['update_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['update_success']; ?>
        <?php unset($_SESSION['update_success']); // Eliminar el mensaje después de mostrarlo ?>
    </div>
<?php endif; ?>
<h2>Mis Datos Personales</h2>
<form id="personalInfoForm" action="../views/plantillas/datos.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id_viajero']; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre']; ?>">
    <label for="apellido1">Primer Apellido:</label>
    <input type="text" id="apellido1" name="apellido1" value="<?php echo $user['apellido1']; ?>">
    <label for="apellido2">Segundo Apellido:</label>
    <input type="text" id="apellido2" name="apellido2" value="<?php echo $user['apellido2']; ?>">
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $user['direccion']; ?>">
    <label for="codigoPostal">Código Postal:</label>
    <input type="text" id="codigoPostal" name="codigoPostal" value="<?php echo $user['codigoPostal']; ?>">
    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" name="ciudad" value="<?php echo $user['ciudad']; ?>">
    <label for="pais">País:</label>
    <input type="text" id="pais" name="pais" value="<?php echo $user['pais']; ?>">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
    <input type="submit" value="Actualizar Datos">
</form>
<!-- Botón de cerrar sesión -->
<form action="../controllers/logout.php" method="post" onsubmit="return confirm('¿Estás seguro de que deseas cerrar sesión?');">
    <button type="submit" class="button-logout">Cerrar Sesión</button>
</form>
