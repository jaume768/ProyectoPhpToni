INSERT INTO `transfer_zona` (`descripcion`) VALUES
(101),
(102),
(103),
(104),
(105);

INSERT INTO `transfer_viajeros` (`nombre`, `apellido1`, `apellido2`, `direccion`, `codigoPostal`, `ciudad`, `pais`, `email`, `password`, `rol`) VALUES
('Juan', 'Pérez', 'García', 'Calle Falsa 123', '28080', 'Madrid', 'España', 'juan.perez@example.com', 'juan123', 'Particular'),
('Ana', 'López', 'Díaz', 'Av. Siempre Viva 456', '28081', 'Madrid', 'España', 'ana.lopez@example.com', 'ana456', 'Particular'),
('Carlos', 'Martín', 'Sánchez', 'Paseo de la Reforma 789', '28082', 'Madrid', 'España', 'carlos.martin@example.com', 'carlos789', 'Particular'),
('Laura', 'Gómez', 'Ruiz', 'Ronda de Toledo 012', '28083', 'Madrid', 'España', 'laura.gomez@example.com', 'laura012', 'Particular'),
('Elena', 'Moreno', 'Jiménez', 'Plaza Mayor 345', '28084', 'Madrid', 'España', 'elena.moreno@example.com', 'elena345', 'Particular');

INSERT INTO `transfer_tipo_reserva` (`Descripción`) VALUES
(1),
(2),
(3),
(4),
(5);

INSERT INTO `transfer_vehiculo` (`Descripción`, `email_conductor`, `password`) VALUES
('Vehiculo 1', 'conductor1@example.com', 'pass1'),
('Vehiculo 2', 'conductor2@example.com', 'pass2'),
('Vehiculo 3', 'conductor3@example.com', 'pass3'),
('Vehiculo 4', 'conductor4@example.com', 'pass4'),
('Vehiculo 5', 'conductor5@example.com', 'pass5');

INSERT INTO `tranfer_hotel` (`id_zona`, `Comision`, `usuario`, `password`) VALUES
(1, 10, 1, 'pass123'),
(2, 15, 2, 'pass456'),
(3, 20, 3, 'pass789'),
(1, 25, 4, 'pass012'),
(2, 30, 5, 'pass345');

INSERT INTO `transfer_precios` (`id_precios`,`id_vehiculo`, `id_hotel`, `Precio`) VALUES
(1,1, 1, 50),
(2,2, 2, 60),
(3,3, 3, 70),
(4,4, 4, 80),
(5,5, 5, 90);

INSERT INTO `transfer_reservas` (`localizador`, `id_hotel`, `id_tipo_reserva`, `email_cliente`, `fecha_reserva`, `fecha_modificacion`, `id_destino`, `fecha_entrada`, `hora_entrada`, `numero_vuelo_entrada`, `origen_vuelo_entrada`, `hora_vuelo_salida`, `fecha_vuelo_salida`, `num_viajeros`, `id_vehiculo`) VALUES
('XYZ123', 1, 1, 'juan.perez@example.com', '2024-04-27 08:00:00', '2024-04-27 08:00:00', 1, '2024-05-01', '10:00:00', 'AB123', 'City1', '2024-05-01 12:00:00', '2024-05-01', 2, 1),
('XYZ456', 2, 2, 'ana.lopez@example.com', '2024-04-27 09:00:00', '2024-04-27 09:00:00', 2, '2024-05-02', '11:00:00', 'CD456', 'City2', '2024-05-02 13:00:00', '2024-05-02', 3, 2),
('XYZ789', 3, 1, 'carlos.martin@example.com', '2024-04-27 10:00:00', '2024-04-27 10:00:00', 3, '2024-05-03', '12:00:00', 'EF789', 'City3', '2024-05-03 14:00:00', '2024-05-03', 4, 3),
('XYZ012', 4, 2, 'laura.gomez@example.com', '2024-04-27 11:00:00', '2024-04-27 11:00:00', 4, '2024-05-04', '13:00:00', 'GH012', 'City4', '2024-05-04 15:00:00', '2024-05-04', 5, 4),
('XYZ345', 5, 1, 'elena.moreno@example.com', '2024-04-27 12:00:00', '2024-04-27 12:00:00', 5, '2024-05-05', '14:00:00', 'IJ345', 'City5', '2024-05-05 16:00:00', '2024-05-05', 6, 5);
