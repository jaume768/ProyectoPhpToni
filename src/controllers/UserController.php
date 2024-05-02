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

    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    public function getVehicleByDriverEmail($email) {
        $stmt = $this->db->prepare("SELECT id_vehiculo FROM transfer_vehiculo WHERE email_conductor = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getTrips($vehicleId, $startDate, $endDate) {
        $trips = [];
        $stmt = $this->db->prepare("SELECT * FROM transfer_reservas WHERE id_vehiculo = ? AND fecha_entrada BETWEEN ? AND ?");
        $stmt->bind_param("iss", $vehicleId, $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $trips[] = $row;
        }
        $stmt->close();
        return $trips;
    }

    public function closeDB() {
        $this->db->close();
    }
    
}

?>