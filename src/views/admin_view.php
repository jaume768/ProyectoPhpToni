<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="css/admin.css">
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

<script src="js/formularios.js"></script>
</body>
</html>
