<!-- reserva.php -->
<h2>Realizar una Reserva</h2>
<form action="particular_view.php?section=create_reservation" method="post" id="adminReservationForm" onsubmit="return validateForm()">
    <label for="tipoTrayecto">Tipo de Trayecto:</label>
    <select name="tipoTrayecto" id="tipoTrayecto" onchange="updateFormFields()">
        <option value="aeropuertoHotel">Aeropuerto a Hotel</option>
        <option value="hotelAeropuerto">Hotel a Aeropuerto</option>
        <option value="idaYVuelta">Ida y Vuelta</option>
    </select>
    <div id="aeropuertoHotelFields" style="display:none;">
        <label for="diaLlegada">Día de llegada:</label>
        <input type="date" id="diaLlegada" name="diaLlegada">
        <label for="horaLlegada">Hora de llegada:</label>
        <input type="time" id="horaLlegada" name="horaLlegada">
        <label for="numeroVueloLlegada">Número del vuelo:</label>
        <input type="text" id="numeroVueloLlegada" name="numeroVueloLlegada">
        <label for="origenVuelo">Aeropuerto de origen:</label>
        <input type="text" id="origenVuelo" name="origenVuelo">
    </div>
    <div id="hotelAeropuertoFields" style="display:none;">
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