<?php
header('Content-Type: application/json');
session_start();

// Incluir conexión a la base de datos
include '../config/db.php';

// Asumiendo que el email del conductor está almacenado en una sesión
$conductorEmail = "conductor1@example.com";

// Preparar y ejecutar la consulta SQL
$sql = "SELECT 
            r.id_reserva as id, 
            r.localizador as title, 
            r.fecha_entrada as start, 
            r.hora_entrada, 
            r.fecha_vuelo_salida as end 
        FROM 
            transfer_reservas r
        JOIN 
            transfer_vehiculo v ON r.id_vehiculo = v.id_vehiculo
        WHERE 
            v.email_conductor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $conductorEmail);
$stmt->execute();
$result = $stmt->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

// Ajustar formato de las fechas para que sean compatibles con FullCalendar
foreach ($events as $key => $event) {
    $events[$key]['start'] = $event['start'] . 'T' . $event['hora_entrada'];
    $events[$key]['end'] = $event['end'] . 'T' . $event['hora_entrada']; // Asumiendo que la hora de fin es la misma que la de inicio
}

echo json_encode($events);
?>
