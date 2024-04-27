<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #333333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            margin-top:30px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #cccccc;
            font-size: 18px;
        }
        select, input, textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: none;
            border-radius: 3px;
            background-color: #444444;
            color: #ffffff;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            cursor: pointer;
            background-color: #4CAF50;
            color: #000000;
            font-size: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Panel de Usuario Particular</h1>
    
    <h2>Mis Reservas</h2>
    <!-- Tabla de reservas -->
    <table>
        <thead>
            <tr>
                <th>Localizador</th>
                <th>Fecha de Reserva</th>
                <th>Destino</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se deben cargar las reservas existentes del usuario -->
        </tbody>
    </table>

    <h2>Realizar una Reserva</h2>
    <!-- Formulario para nueva reserva -->
    <form id="reservationForm">
        <label for="tipoTrayecto">Tipo de Trayecto:</label>
        <select name="tipoTrayecto" id="tipoTrayecto">
            <option value="aeropuertoHotel">Aeropuerto a Hotel</option>
            <option value="hotelAeropuerto">Hotel a Aeropuerto</option>
            <option value="idaYVuelta">Ida y Vuelta</option>
        </select>
        <!-- Otros campos según el tipo de trayecto se gestionan aquí -->
        <input type="submit" value="Crear Reserva" onclick="return validateReservation()">
    </form>

    <h2>Mis Datos Personales</h2>
    <!-- Formulario para datos personales -->
    <form id="personalInfoForm">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">

        <input type="submit" value="Actualizar Datos">
    </form>
</div>

<script>
    function validateReservation() {
        // Crear la fecha actual y sumar 48 horas
        var now = new Date();
        now.setHours(now.getHours() + 48);

        // Obtener la fecha de la reserva del formulario
        var fechaReserva = new Date(document.getElementById('reservationForm')['fechaReserva'].value);
        
        // Verificar si la reserva se está haciendo con al menos 48 horas de anticipación
        if (fechaReserva < now) {
            alert('Las reservas deben hacerse con un mínimo de 48 horas de anticipación.');
            return false;
        }
        return true;
    }
</script>
</body>
</html>
