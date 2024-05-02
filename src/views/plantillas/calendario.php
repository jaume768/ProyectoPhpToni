<?php
include __DIR__ . '/../../controllers/UserController.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$userController = new UserController($conn);

$email = $_SESSION['email'] ?? null;

$startDate = $_POST['startDate'] ?? date('Y-m-01');
$endDate = $_POST['endDate'] ?? date('Y-m-t');

$vehicle = $userController->getVehicleByDriverEmail($email);
$trayectos = $userController->getTrips($vehicle['id_vehiculo'], $startDate, $endDate);

$userController->closeDB();
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
