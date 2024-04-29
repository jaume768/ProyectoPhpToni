<!-- reservas.php -->
<?php
include __DIR__ . '/../../controllers/UserController.php';
$userController = new UserController($conn);
$reservations = $userController->getUserReservations($_SESSION['email']);
?>
<h2>Mis Reservas</h2>
<table>
    <thead>
        <tr>
            <th>Localizador</th>
            <th>Fecha de Reserva</th>
            <th>Hora entrada</th>
            <th>Numero de vuelo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?php echo htmlspecialchars($reservation['localizador']); ?></td>
                <td><?php echo htmlspecialchars($reservation['fecha_reserva']); ?></td>
                <td><?php echo htmlspecialchars($reservation['hora_entrada']); ?></td>
                <td><?php echo htmlspecialchars($reservation['numero_vuelo_entrada']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
