<?php
session_start();
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "database";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$localizador = substr(md5(uniqid(rand(), true)), 0, 4);
$email_cliente = isset($_POST['emailCliente']) ? $_POST['emailCliente'] : $_SESSION['email'];

// Preparar y vincular parámetros
$stmt = $conn->prepare("INSERT INTO transfer_reservas (localizador, id_hotel, id_tipo_reserva, email_cliente, fecha_reserva, fecha_modificacion, id_destino, fecha_entrada, hora_entrada, numero_vuelo_entrada, origen_vuelo_entrada, hora_vuelo_salida, fecha_vuelo_salida, num_viajeros, id_vehiculo) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, NOW(), ?, ?, 1)");
$stmt->bind_param("siisssissssi", $localizador, $id_hotel, $id_tipo_reserva, $email_cliente, $fecha_reserva, $id_destino, $fecha_entrada, $hora_entrada, $numero_vuelo_entrada, $origen_vuelo_entrada, $fecha_vuelo_salida, $num_viajeros);

// Asignar valores
$id_hotel = $_POST['id_hotel'];
$id_tipo_reserva = $_POST['id_tipo_reserva'];
$fecha_reserva = isset($_POST['fecha_reserva']) ? $_POST['fecha_reserva'] : $_POST['dia_llegada'];
$id_destino = $_POST['id_hotel'];
$fecha_entrada = isset($_POST['fecha_entrada']) ? $_POST['fecha_entrada'] : $_POST['dia_llegada'];
$hora_entrada = isset($_POST['hora_entrada']) ? $_POST['hora_entrada'] : $_POST['hora_llegada'];
$numero_vuelo_entrada = $_POST['numero_vuelo_llegada'];
$origen_vuelo_entrada = $_POST['origen_vuelo_entrada'];
if(isset($_POST['dia_vuelo']) && !empty($_POST['dia_vuelo'])) {
    $fecha_vuelo_salida = $_POST['dia_vuelo'];
} else {
    $fecha_vuelo_salida = NULL;
}
$num_viajeros = $_POST['num_viajeros'];

if ($stmt->execute()) {
    $redirectPage = !empty($_POST['emailCliente']) ? "../views/admin_view.php" : "../views/particular_view.php";
    echo '<script>window.location.href="' . $redirectPage . '";</script>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
