-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 03-05-2024 a las 06:41:23
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tranfer_hotel`
--

CREATE TABLE `tranfer_hotel` (
  `id_hotel` int NOT NULL,
  `id_zona` int DEFAULT NULL,
  `Comision` int DEFAULT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tranfer_hotel`
--

INSERT INTO `tranfer_hotel` (`id_hotel`, `id_zona`, `Comision`, `nombre`) VALUES
(6, 1, 10, 'Hotel Sunset');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_precios`
--

CREATE TABLE `transfer_precios` (
  `id_precios` int NOT NULL,
  `id_vehiculo` int NOT NULL,
  `id_hotel` int NOT NULL,
  `Precio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_precios`
--

INSERT INTO `transfer_precios` (`id_precios`, `id_vehiculo`, `id_hotel`, `Precio`) VALUES
(1, 1, 6, 50),
(2, 2, 6, 60),
(3, 3, 6, 70),
(4, 4, 6, 80),
(5, 5, 6, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_reservas`
--

CREATE TABLE `transfer_reservas` (
  `id_reserva` int NOT NULL,
  `localizador` varchar(100) NOT NULL,
  `id_hotel` int DEFAULT NULL COMMENT 'Es el hotel que realiza la reserva',
  `id_tipo_reserva` int NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `id_destino` int NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `numero_vuelo_entrada` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `origen_vuelo_entrada` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hora_vuelo_salida` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_vuelo_salida` date DEFAULT NULL,
  `num_viajeros` int NOT NULL,
  `id_vehiculo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_reservas`
--

INSERT INTO `transfer_reservas` (`id_reserva`, `localizador`, `id_hotel`, `id_tipo_reserva`, `email_cliente`, `fecha_reserva`, `fecha_modificacion`, `id_destino`, `fecha_entrada`, `hora_entrada`, `numero_vuelo_entrada`, `origen_vuelo_entrada`, `hora_vuelo_salida`, `fecha_vuelo_salida`, `num_viajeros`, `id_vehiculo`) VALUES
(6, 'XYZ123', 6, 1, 'juan.perez@example.com', '2024-04-27 08:00:00', '2024-04-27 08:00:00', 1, '2024-05-01', '10:00:00', 'AB123', 'City1', '2024-04-30 17:29:38', '2024-05-01', 2, 1),
(7, 'XYZ456', 6, 2, 'ana.lopez@example.com', '2024-04-27 09:00:00', '2024-04-27 09:00:00', 2, '2024-05-02', '11:00:00', 'CD456', 'City2', '2024-04-30 17:29:38', '2024-05-02', 3, 2),
(8, 'XYZ789', 6, 1, 'carlos.martin@example.com', '2024-04-27 10:00:00', '2024-04-27 10:00:00', 3, '2024-05-03', '12:00:00', 'EF789', 'City3', '2024-04-30 17:29:38', '2024-05-03', 4, 3),
(9, 'XYZ012', 6, 2, 'laura.gomez@example.com', '2024-04-27 11:00:00', '2024-04-27 11:00:00', 4, '2024-05-04', '13:00:00', 'GH012', 'City4', '2024-04-30 17:29:38', '2024-05-04', 5, 4),
(10, 'XYZ345', 6, 1, 'elena.moreno@example.com', '2024-04-27 12:00:00', '2024-04-27 12:00:00', 5, '2024-05-05', '14:00:00', 'IJ345', 'City5', '2024-04-30 17:29:38', '2024-05-05', 6, 5),
(11, 'RES1000', 6, 1, 'juan.perez@example.com', '2024-04-27 08:00:00', '2024-04-27 08:00:00', 1, '2024-05-01', '10:00:00', 'AB123', 'City1', '2024-04-30 17:29:38', '2024-05-01', 2, 1),
(12, 'RES1001', 6, 2, 'ana.lopez@example.com', '2024-04-27 09:00:00', '2024-04-27 09:00:00', 2, '2024-05-02', '11:00:00', 'CD456', 'City2', '2024-04-30 17:29:38', '2024-05-02', 3, 2),
(13, '121fsd', 6, 1, 'pepe@gmail.com', '1111-12-12 12:12:00', '1111-11-11 12:12:00', 1, '1111-12-12', '12:12:00', '1', '1', '2024-04-30 17:29:38', '1111-11-11', 1, 1),
(14, '12a2', 6, 1, 'pepe@gmail.com', '1324-12-11 01:12:00', '2024-04-30 17:18:02', 1, '2000-12-12', '12:45:00', '1', '1', '2024-04-30 17:29:38', '4322-03-02', 1, 1),
(31, '0e57', 1, 1, 'prova@gmail.com', '1111-11-11 00:00:00', '2024-05-02 07:26:39', 1, '2000-11-11', '11:11:00', '1', '1', '2024-05-02 07:26:39', NULL, 1, 1),
(104, 'f614', 6, 1, 'tonibarea@gmail.com', '1111-11-11 00:00:00', '2024-05-03 06:21:46', 6, '2000-11-11', '11:11:00', '1', '1', '2024-05-03 06:21:46', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_tipo_reserva`
--

CREATE TABLE `transfer_tipo_reserva` (
  `id_tipo_reserva` int NOT NULL,
  `Descripción` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_tipo_reserva`
--

INSERT INTO `transfer_tipo_reserva` (`id_tipo_reserva`, `Descripción`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_vehiculo`
--

CREATE TABLE `transfer_vehiculo` (
  `id_vehiculo` int NOT NULL,
  `Descripción` varchar(100) NOT NULL,
  `email_conductor` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_vehiculo`
--

INSERT INTO `transfer_vehiculo` (`id_vehiculo`, `Descripción`, `email_conductor`, `password`) VALUES
(1, 'Vehiculo 1', 'conductor1@example.com', 'pass1'),
(2, 'Vehiculo 2', 'conductor2@example.com', 'pass2'),
(3, 'Vehiculo 3', 'conductor3@example.com', 'pass3'),
(4, 'Vehiculo 4', 'conductor4@example.com', 'pass4'),
(5, 'Vehiculo 5', 'conductor5@example.com', 'pass5'),
(6, 'Vehículo 6', 'conductor1@example.com', 'pass123'),
(7, 'Vehículo 7', 'conductor2@example.com', 'pass456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_viajeros`
--

CREATE TABLE `transfer_viajeros` (
  `id_viajero` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codigoPostal` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` enum('Conductor','Corporativo','Administrador','Particular') NOT NULL DEFAULT 'Particular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_viajeros`
--

INSERT INTO `transfer_viajeros` (`id_viajero`, `nombre`, `apellido1`, `apellido2`, `direccion`, `codigoPostal`, `ciudad`, `pais`, `email`, `password`, `rol`) VALUES
(1, 'Juan', 'Pérez', 'García', 'Calle Falsa 123', '28080', 'Madrid', 'España', 'juan.perez@example.com', 'juan123', 'Particular'),
(2, 'Ana', 'López', 'Díaz', 'Av. Siempre Viva 456', '28081', 'Madrid', 'España', 'ana.lopez@example.com', 'ana456', 'Particular'),
(3, 'Carlos', 'Martín', 'Sánchez', 'Paseo de la Reforma 789', '28082', 'Madrid', 'España', 'carlos.martin@example.com', 'carlos789', 'Particular'),
(4, 'Laura', 'Gómez', 'Ruiz', 'Ronda de Toledo 012', '28083', 'Madrid', 'España', 'laura.gomez@example.com', 'laura012', 'Particular'),
(5, 'Elena', 'Moreno', 'Jiménez', 'Plaza Mayor 345', '28084', 'Madrid', 'España', 'elena.moreno@example.com', 'elena345', 'Particular'),
(7, 'Pepe', 'Fer', 'Fernandez', 'carrer mallorca 50', '07500', 'Manacor', 'España', 'pepe@gmail.com', '$2y$10$IAr7fTqxTetv7m5hibR5beHKfkIkxsDv7GpLVQqg/0q1e6VtsZcPW', 'Particular'),
(8, 'Carlos', 'Martín', 'Gomez', 'Calle Sol 123', '28080', 'Madrid', 'España', 'conductor1@example.com', '$2y$10$IAr7fTqxTetv7m5hibR5beHKfkIkxsDv7GpLVQqg/0q1e6VtsZcPW', 'Conductor'),
(9, 'Lucia', 'Vega', 'Fernandez', 'Calle Luna 456', '28081', 'Madrid', 'España', 'conductor2@example.com', 'pass456', 'Conductor'),
(10, 'Toni', 'Barea', 'Barea', 'Calle Mallorca', '07500', 'Manacor', 'España', 'tonibarea@gmail.com', '$2y$10$H6corCOrLdUIHz9LtSj0EupaYBfGrohRAoIuLgkSjEk4LTINONVCW', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_zona`
--

CREATE TABLE `transfer_zona` (
  `id_zona` int NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_zona`
--

INSERT INTO `transfer_zona` (`id_zona`, `descripcion`) VALUES
(1, '101'),
(2, '102'),
(3, '103'),
(4, '104'),
(5, '105');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tranfer_hotel`
--
ALTER TABLE `tranfer_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `FK_HOTEL_ZONA` (`id_zona`);

--
-- Indices de la tabla `transfer_precios`
--
ALTER TABLE `transfer_precios`
  ADD KEY `FK_PRECIOS_HOTEL` (`id_hotel`),
  ADD KEY `FK_PRECIOS_VEHICULO` (`id_vehiculo`);

--
-- Indices de la tabla `transfer_reservas`
--
ALTER TABLE `transfer_reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_RESERVAS_DESTINO` (`id_destino`),
  ADD KEY `FK_RESERVAS_HOTEL` (`id_hotel`),
  ADD KEY `FK_RESERVAS_TIPO` (`id_tipo_reserva`),
  ADD KEY `FK_RESERVAS_VEHICULO` (`id_vehiculo`),
  ADD KEY `FK_RESERVAS_VIAJEROS` (`email_cliente`);

--
-- Indices de la tabla `transfer_tipo_reserva`
--
ALTER TABLE `transfer_tipo_reserva`
  ADD PRIMARY KEY (`id_tipo_reserva`);

--
-- Indices de la tabla `transfer_vehiculo`
--
ALTER TABLE `transfer_vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`);

--
-- Indices de la tabla `transfer_viajeros`
--
ALTER TABLE `transfer_viajeros`
  ADD PRIMARY KEY (`id_viajero`),
  ADD UNIQUE KEY `idx_email` (`email`);

--
-- Indices de la tabla `transfer_zona`
--
ALTER TABLE `transfer_zona`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tranfer_hotel`
--
ALTER TABLE `tranfer_hotel`
  MODIFY `id_hotel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transfer_reservas`
--
ALTER TABLE `transfer_reservas`
  MODIFY `id_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `transfer_tipo_reserva`
--
ALTER TABLE `transfer_tipo_reserva`
  MODIFY `id_tipo_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transfer_vehiculo`
--
ALTER TABLE `transfer_vehiculo`
  MODIFY `id_vehiculo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transfer_viajeros`
--
ALTER TABLE `transfer_viajeros`
  MODIFY `id_viajero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `transfer_zona`
--
ALTER TABLE `transfer_zona`
  MODIFY `id_zona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tranfer_hotel`
--
ALTER TABLE `tranfer_hotel`
  ADD CONSTRAINT `FK_HOTEL_ZONA` FOREIGN KEY (`id_zona`) REFERENCES `transfer_zona` (`id_zona`);

--
-- Filtros para la tabla `transfer_precios`
--
ALTER TABLE `transfer_precios`
  ADD CONSTRAINT `FK_PRECIOS_HOTEL` FOREIGN KEY (`id_hotel`) REFERENCES `tranfer_hotel` (`id_hotel`),
  ADD CONSTRAINT `FK_PRECIOS_VEHICULO` FOREIGN KEY (`id_vehiculo`) REFERENCES `transfer_vehiculo` (`id_vehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
