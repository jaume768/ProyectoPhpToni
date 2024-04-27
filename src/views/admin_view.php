<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e1e;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .admin-container {
            margin-top:70px;
            max-width: 800px;
            padding: 40px 60px;
            border-radius: 8px;
            background-color: #333333;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select, textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #555555;
            border-radius: 5px;
            background-color: #444444;
            color: #ffffff;
            box-sizing: border-box;
        }
        input[type="submit"] {
            cursor: pointer;
            background-color: #550000;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>
<div class="admin-container">
    <h1>Panel de Administración - Reservas</h1>
    <form action="ruta_del_controlador_para_reservas.php" method="post" id="reservationForm">
        <label for="tipoTrayecto">Tipo de Trayecto:</label>
        <select name="tipoTrayecto" id="tipoTrayecto" onchange="updateFormFields()">
            <option value="aeropuertoHotel">Aeropuerto a Hotel</option>
            <option value="hotelAeropuerto">Hotel a Aeropuerto</option>
            <option value="idaYVuelta">Ida y Vuelta</option>
        </select>

        <!-- Campos para Aeropuerto a Hotel -->
        <div id="aeropuertoHotelFields" class="hidden">
            <label for="diaLlegada">Día de llegada:</label>
            <input type="date" id="diaLlegada" name="diaLlegada">
            <label for="horaLlegada">Hora de llegada:</label>
            <input type="time" id="horaLlegada" name="horaLlegada">
            <label for="numeroVueloLlegada">Número del vuelo:</label>
            <input type="text" id="numeroVueloLlegada" name="numeroVueloLlegada">
            <label for="origenVuelo">Aeropuerto de origen:</label>
            <input type="text" id="origenVuelo" name="origenVuelo">
        </div>

        <!-- Campos para Hotel a Aeropuerto -->
        <div id="hotelAeropuertoFields" class="hidden">
            <label for="diaVuelo">Día del vuelo:</label>
            <input type="date" id="diaVuelo" name="diaVuelo">
            <label for="horaVuelo">Hora del vuelo:</label>
            <input type="time" id="horaVuelo" name="horaVuelo">
            <label for="numeroVueloSalida">Número de vuelo:</label>
            <input type="text" id="numeroVueloSalida" name="numeroVueloSalida">
            <label for="horaRecogida">Hora de recogida:</label>
            <input type="time" id="horaRecogida" name="horaRecogida">
        </div>

        <label for="hotelDestino">Hotel de destino/recogida:</label>
        <input type="text" id="hotelDestino" name="hotelDestino">
        
        <label for="numViajeros">Número de viajeros:</label>
        <input type="number" id="numViajeros" name="numViajeros">

        <label for="datosPersonales">Datos personales del reservante (si no se han ingresado previamente):</label>
        <textarea id="datosPersonales" name="datosPersonales"></textarea>

        <input type="submit" value="Crear Reserva">
    </form>
</div>

<script>
    function updateFormFields() {
        var selectedOption = document.getElementById('tipoTrayecto').value;
        var aeropuertoHotelFields = document.getElementById('aeropuertoHotelFields');
        var hotelAeropuertoFields = document.getElementById('hotelAeropuertoFields');

        aeropuertoHotelFields.style.display = 'none';
        hotelAeropuertoFields.style.display = 'none';

        if (selectedOption == 'aeropuertoHotel' || selectedOption == 'idaYVuelta') {
            aeropuertoHotelFields.style.display = 'block';
        }
        if (selectedOption == 'hotelAeropuerto' || selectedOption == 'idaYVuelta') {
            hotelAeropuertoFields.style.display = 'block';
        }
    }

    // Inicializar el formulario para mostrar los campos correctos al cargar
    document.addEventListener('DOMContentLoaded', function () {
        updateFormFields();
    });
</script>
</body>
</html>
