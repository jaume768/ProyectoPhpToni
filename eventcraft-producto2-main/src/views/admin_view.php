
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .admin-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #333333;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 3px;
            background-color: #444444;
            color: #ffffff;
            box-sizing: border-box;
        }
        .trayectoAeropuertoHotel, .trayectoHotelAeropuerto {
            display: none;
            padding: 10px;
            border: 1px solid #555555;
            border-radius: 3px;
            background-color: #222222;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="admin-container">
    <h1>Panel de Administración - Reservas</h1>
    <form action="ruta_del_controlador_para_reservas.php" method="post">
        <!-- Selección del tipo de trayecto -->
        <label for="tipoTrayecto">Tipo de Trayecto:</label>
        <select name="tipoTrayecto" id="tipoTrayecto">
            <option value="aeropuertoHotel">Aeropuerto a Hotel</option>
            <option value="hotelAeropuerto">Hotel a Aeropuerto</option>
            <option value="idaYVuelta">Ida y Vuelta</option>
        </select>
        
        <div class="trayectoAeropuertoHotel">
            <h2>Detalles de Aeropuerto a Hotel</h2>
            <!-- Inputs para día de llegada, hora de llegada, número de vuelo, aeropuerto de origen -->
        </div>

        <div class="trayectoHotelAeropuerto">
            <h2>Detalles de Hotel a Aeropuerto</h2>
            <!-- Inputs para día de vuelo, hora de vuelo, número de vuelo, hora de recogida -->
        </div>
        
        <input type="submit" value="Crear Reserva">
    </form>
    
    <!-- Aquí irían más formularios o interfaces para la gestión de reservas, vehículos y conductores -->
</div>

</body>
</html>
