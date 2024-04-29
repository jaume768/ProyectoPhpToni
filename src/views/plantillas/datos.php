<?php
include __DIR__ . '/../../controllers/UserController.php';
$userController = new UserController($conn);

// Suponiendo que el email del usuario se almacena en la sesión al iniciar sesión
$email = "pepe@gmail.com";

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

    header("Location: ../particular_view.php?section=datos");
    exit(); // Es una buena práctica llamar a exit() después de una redirección.
}

$user = $userController->getUserByEmail($email);
?>
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
