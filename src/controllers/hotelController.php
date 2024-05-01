<?php
include __DIR__ . '/../config/db.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos como lo mostraste

class hotelController {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }
    
    function getHotelOptions() {
        $sql = "SELECT id_hotel, nombre FROM tranfer_hotel";
        $result = $this->db->query($sql);
        $options = "";

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $options .= "<option value='" . $row["id_hotel"] . "'>" . htmlspecialchars($row["nombre"], ENT_QUOTES, 'UTF-8') . "</option>";
            }
        } else {
            $options = "<option value=''>No hay hoteles disponibles</option>";
        }

        return $options;
    }
}


?>
