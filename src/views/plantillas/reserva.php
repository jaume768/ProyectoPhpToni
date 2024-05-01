<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Reserva</title>
    <script>
        function updateFormVisibility() {
            var tipoReserva = document.getElementById("id_tipo_reserva").value;
            document.getElementById("aeropuerto-hotel").style.display = tipoReserva === "1" || tipoReserva === "3" ? "block" : "none";
            document.getElementById("hotel-aeropuerto").style.display = tipoReserva === "2" || tipoReserva === "3" ? "block" : "none";
        }
    </script>
</head>
<body>
    <h2>Crear Reserva</h2>
    <form action="../controllers/insertar_reserva.php" method="post">
        Tipo de Reserva:
        <select name="id_tipo_reserva" id="id_tipo_reserva" onchange="updateFormVisibility()" required>
            <option value="1">Aeropuerto a Hotel</option>
            <option value="2">De Hotel a Aeropuerto</option>
            <option value="3">Trayectos de Ida y Vuelta</option>
        </select><br>
        
        <div id="aeropuerto-hotel" style="display:none;">
            <h3>Detalles de Llegada al Hotel</h3>
            Día de Llegada: <input type="date" name="dia_llegada"><br>
            Hora de Llegada: <input type="time" name="hora_llegada"><br>
            Número de Vuelo: <input type="text" name="numero_vuelo_llegada"><br>
            Origen: <input type="text" name="origen_vuelo_entrada"><br>
            Aeropuerto de Origen: <input type="text" name="aeropuerto_origen"><br>
        </div>
        
        <div id="hotel-aeropuerto" style="display:none;">
            <h3>Detalles del Vuelo desde Hotel</h3>
            Día del Vuelo: <input type="date" name="dia_vuelo"><br>
            Hora del Vuelo: <input type="time" name="hora_vuelo"><br>
            Número de Vuelo: <input type="text" name="numero_vuelo_salida"><br>
            Hora de Recogida: <input type="time" name="hora_recogida"><br>
        </div>

        Hotel de Destino/Recogida:
        <select name="id_hotel" required>
            <?php include __DIR__ . '/../../controllers/hotelController.php';
                  $hotelController = new hotelController($conn); 
                  echo $hotelController->getHotelOptions(); ?>
        </select><br>
        
        Número de Viajeros: <input type="number" name="num_viajeros" required><br>
        <input type="submit" value="Enviar">
    </form>

    <script>
        // Asegurar que el formulario se carga con los campos correctos visibles
        window.onload = function() {
            updateFormVisibility();
        };
    </script>
</body>
</html>
