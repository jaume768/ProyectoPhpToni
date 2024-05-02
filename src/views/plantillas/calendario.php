<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Conexión a la base de datos
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = 'conductor1@example.com'; // Esto se establecería durante el login

// Obtener las fechas del formulario o usar fechas por defecto
$startDate = $_POST['startDate'] ?? date('Y-m-01'); // Usa la fecha del formulario o el primer día del mes actual
$endDate = $_POST['endDate'] ?? date('Y-m-t'); // Usa la fecha del formulario o el último día del mes actual

// Consulta para obtener el id_vehiculo basado en el email del conductor
$sqlVehiculo = "SELECT id_vehiculo FROM transfer_vehiculo WHERE email_conductor = ?";
$stmtVehiculo = $conn->prepare($sqlVehiculo);
$stmtVehiculo->bind_param("s", $email);
$stmtVehiculo->execute();
$resultVehiculo = $stmtVehiculo->get_result();
$vehiculo = $resultVehiculo->fetch_assoc();

// Consulta para obtener los trayectos basados en id_vehiculo
$sql = "SELECT * FROM transfer_reservas WHERE id_vehiculo = ? AND fecha_entrada BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $vehiculo['id_vehiculo'], $startDate, $endDate);
$stmt->execute();
$result = $stmt->get_result();

$trayectos = [];
while ($row = $result->fetch_assoc()) {
    $trayectos[] = $row;
}
$stmt->close();
$conn->close();
?>
<h2>Calendario de Trayectos</h2>
<form method="post">
    <label for="startDate">Inicio:</label>
    <input type="date" id="startDate" name="startDate" value="<?= $startDate ?>">
    <label for="endDate">Fin:</label>
    <input type="date" id="endDate" name="endDate" value="<?= $endDate ?>">
    <button type="submit" class="actualizar">Actualizar</button>
</form>
<table>
    <tr>
        <th>Fecha</th>
        <th>Detalles del Trayecto</th>
    </tr>
    <?php foreach ($trayectos as $trayecto): ?>
    <tr>
        <td><?= htmlspecialchars($trayecto['fecha_entrada']) ?></td>
        <td>
            Localizador: <?= htmlspecialchars($trayecto['localizador']) ?><br>
            Hora de entrada: <?= htmlspecialchars($trayecto['hora_entrada']) ?><br>
            Vuelo de entrada: <?= htmlspecialchars($trayecto['numero_vuelo_entrada']) ?> desde <?= htmlspecialchars($trayecto['origen_vuelo_entrada']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
