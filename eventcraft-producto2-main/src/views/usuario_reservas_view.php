<html>
    <head>
        <title>Panel viajero</title>
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #000000;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
</style>
    </head>

    <body>
        <br>
        <h2>Reservas activas</h2>
        <br>
        <?php
            if (count($lista_reservas) > 0) {
                echo "<div>
                        <table>
                            <tr>
                                <th>id_reserva</th>
                                <th>localizador</th>
                                <th>id_hotel</th>
                                <th>tipo_reserva</th>
                                <th>email_cliente</th>
                                <th>fecha_reserva</th>
                                <th>fecha_modificacion</th>
                                <th>id_destino</th>
                                <th>fecha_entrada</th>
                                <th>hora_entrada</th>
                                <th>numero_vuelo_entrada</th>
                                <th>origen_vuelo_entrada</th>
                                <th>hora_vuelo_salida</th>
                                <th>fecha_vuelo_salida</th>
                                <th>numero_viajeros</th>
                                <th>id_vehiculo</th>
                                <th></th>
                                <th></th>
                            </tr>";
                foreach($lista_reservas as $reserva){
                    echo "<tr>
                            <td>".$reserva->id_reserva."</td>
                            <td>".$reserva->localizador."</td>
                            <td>".$reserva->id_hotel."</td>
                            <td>".$reserva->id_tipo_reserva."</td>
                            <td>".$reserva->email_cliente."</td>
                            <td>".$reserva->fecha_reserva."</td>
                            <td>".$reserva->fecha_modificacion."</td>
                            <td>".$reserva->id_destino."</td>
                            <td>".$reserva->fecha_entrada."</td>
                            <td>".$reserva->hora_entrada."</td>
                            <td>".$reserva->numero_vuelo_entrada."</td>
                            <td>".$reserva->origen_vuelo_entrada."</td>
                            <td>".$reserva->hora_vuelo_salida."</td>
                            <td>".$reserva->fecha_vuelo_salida."</td>
                            <td>".$reserva->num_viajeros."</td>
                            <td>".$reserva->id_vehiculo."</td>
                            <td><a href=\"modificar_reserva.php?id_reserva=".$reserva->id_reserva."&id_usuario=".$id_viajero."\">Modificar</a></td>
                            <td><a href=\"borrar_reserva.php?id=".$reserva->id_reserva."&id_usuario=".$id_viajero."\">Borrar</a></td>
                          </tr>";
                }
                echo "</table>
                    </div>";
            } else {
                echo "<div>
                        <span>No hay reservas activas</span><br>
                      </div>";
            }
            echo "<br><br>
                  <div>
                    <span><a href=\"crear_reserva_controller.php\">Crear Reserva</a>
                  </div>
                  <br><br>
                  <div>
                    <span><a href=\"modificar_usuario_controller.php?id=".$id_viajero."\">Modificar perfil</a></span>
                  </div>";
        ?>

    </body>


