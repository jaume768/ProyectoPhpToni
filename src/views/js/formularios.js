    
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