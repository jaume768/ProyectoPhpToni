<?php

// UserController.php
include __DIR__ . '/../config/db.php';

class UserController {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM transfer_viajeros WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Devuelve un único usuario
    }

    public function updateUser($id, $nombre, $apellido1, $apellido2, $direccion, $codigoPostal, $ciudad, $pais, $email) {
        $stmt = $this->db->prepare("UPDATE transfer_viajeros SET nombre = ?, apellido1 = ?, apellido2 = ?, direccion = ?, codigoPostal = ?, ciudad = ?, pais = ?, email = ? WHERE id_viajero = ?");
        $stmt->bind_param("ssssssssi", $nombre, $apellido1, $apellido2, $direccion, $codigoPostal, $ciudad, $pais, $email, $id);
        return $stmt->execute();
    }

    public function getUserReservations($email) {
        $reservations = [];
        $sql = "SELECT * FROM transfer_reservas WHERE email_cliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }
        $stmt->close();
        return $reservations;
    }

    public function createReservation($data) {
        $sql = "INSERT INTO transfer_reservas (localizador, id_hotel, id_tipo_reserva, email_cliente, fecha_reserva, fecha_modificacion, id_destino, fecha_entrada, hora_entrada, numero_vuelo_entrada, origen_vuelo_entrada, hora_vuelo_salida, fecha_vuelo_salida, num_viajeros, id_vehiculo) VALUES (?, ?, ?, ?, NOW(), NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            return ['success' => false, 'message' => "Error de preparación: " . $this->db->error];
        }
    
        // Asumiendo que todos los datos necesarios son proporcionados y son correctos
        $stmt->bind_param("siisisssssssii", 
            $data['localizador'], 
            $data['id_hotel'], 
            $data['id_tipo_reserva'], 
            $data['email_cliente'], 
            $data['id_destino'], 
            $data['fecha_entrada'], 
            $data['hora_entrada'], 
            $data['numero_vuelo_entrada'], 
            $data['origen_vuelo_entrada'], 
            $data['hora_vuelo_salida'], 
            $data['fecha_vuelo_salida'], 
            $data['num_viajeros'], 
            $data['id_vehiculo']
        );
    
        if ($stmt->execute()) {
            return ['success' => true, 'message' => "Reserva creada exitosamente"];
        } else {
            return ['success' => false, 'message' => "Error al ejecutar: " . $stmt->error];
        }
    }
    
    
}

?>