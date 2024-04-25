// registro_usuario_controller.php
<?php
ob_start(); // Iniciar búfer de salida
include '../config/db.php';

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$codigoPostal = $_POST['codigoPostal'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encriptar la contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Preparar y ejecutar la consulta
$sql = "INSERT INTO transfer_viajeros (nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nombre, $apellido1, $apellido2, $direccion, $codigoPostal, $ciudad, $pais, $email, $passwordHash);

if ($stmt->execute()) {
    echo '<script>window.location.href="../views/login_view.php?msg=Registro exitoso. Puede iniciar sesión ahora."</script>';
} else {
    echo '<script>window.location.href="../views/registro_usuario_view.php?error=Error al registrar: ' . addslashes($stmt->error) . '"</script>';
}

$stmt->close();
$conn->close();
ob_end_flush();
?>
