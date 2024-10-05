-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 11:40:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdhansel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `x_ini` float DEFAULT NULL,
  `y_ini` float DEFAULT NULL,
  `x_fin` float DEFAULT NULL,
  `y_fin` float DEFAULT NULL,
  `superficie` float DEFAULT NULL,
  `ci_persona` varchar(20) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `id_tramite` int(11) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `x_ini`, `y_ini`, `x_fin`, `y_fin`, `superficie`, `ci_persona`, `distrito`, `id_tramite`, `id_zona`) VALUES
(2, '31', -16.507, -68.12, -16.51, -68.117, 400, '9876543', '3', 6, NULL),
(3, '10', -16.513, -68.14, -16.515, -68.137, 800, '4567890', '1', NULL, NULL),
(5, 'Achumani', -16.538, -68.085, -16.54, -68.082, 800, '6543210', '6', NULL, NULL),
(9, 'El Tejar', 1, 2, 3, 4, 200, '10084126', 'El Tejar', 2, NULL),
(10, 'Zona 1', -16.5, -68.119, -16.497, -68.117, 120, '1111111', 'Centro Histórico', NULL, NULL),
(12, 'Zona 3', -16.5, -68.125, -16.498, -68.123, 220, '3333333', 'San Pedro', NULL, NULL),
(15, 'Villa San Antonio', 1, 2, 3, 4, 800, '4444', 'Villa San Antonio', 1, NULL),
(17, '20', 1, 2, 3, 4, 200, '8888', '2', 4, NULL),
(18, NULL, 1, 2, 3, 4, 10000, '999', NULL, NULL, NULL),
(19, NULL, 1, 2, 3, 4, 10000, '10000', '4', 6, 36),
(20, NULL, 1, 2, 3, 4, 10000, '20000', '8', 2, 76),
(21, NULL, 0, 0, 0, 0, 2000, '7721', '5', 6, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`) VALUES
(1, 'Cotahuma'),
(2, 'San Antonio'),
(3, 'Periférica'),
(4, 'Max Paredes'),
(5, 'Centro'),
(6, 'Sur'),
(7, 'Mallasa'),
(8, 'Hampaturi'),
(9, 'Zongo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `paterno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`) VALUES
('10000', 'alain', 'apaza'),
('10084126', 'Hansel', 'Bustamante'),
('1111111', 'Fernando', 'Lopez'),
('20000', 'Alan', 'Quisp'),
('3333333', 'Diego', 'Pérez'),
('4444', 'Alan', 'Callisaya'),
('4567890', 'Carlos', 'Quisp'),
('6543210', 'José', 'Flores'),
('7721', 'Ivan', 'Bustamante'),
('8888', 'HB', 'Quisp'),
('9876543', 'María', 'Gutiérrez'),
('999', 'Hansel', 'Bustamante'),
('admin', 'Admin', 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `tipo_tramite` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `tipo_tramite`) VALUES
(1, 'Inscripción de Propiedad'),
(2, 'Transferencia de Propiedad'),
(3, 'Actualización de Datos'),
(4, 'Registro de Propiedad'),
(5, 'Inscripción de Inmuebles'),
(6, 'Cambio de Propietario'),
(7, 'Fraccionamiento'),
(8, 'Consulta de Catastro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `ci_persona` varchar(20) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` enum('admin','usuario_normal') DEFAULT 'usuario_normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci_persona`, `contrasena`, `rol`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, '10084126', '10084126', 'usuario_normal'),
(3, '1111111', '1111111', 'usuario_normal'),
(5, '3333333', '3333333', 'usuario_normal'),
(7, '4567890', '4567890', 'usuario_normal'),
(10, '6543210', '6543210', 'usuario_normal'),
(11, '9876543', '9876543', 'usuario_normal'),
(13, '8888', '8888', 'usuario_normal'),
(14, '999', '999', 'usuario_normal'),
(15, '10000', '10000', 'usuario_normal'),
(16, '20000', '20000', 'usuario_normal'),
(17, '7721', '7721', 'usuario_normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_distrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `id_distrito`) VALUES
(1, 'Llojeta', 1),
(2, 'Bajo Llojeta', 1),
(3, 'Sopocachi', 1),
(4, 'Sopocachi Alto', 1),
(5, 'Villa Pabón', 1),
(6, 'San Pedro', 1),
(7, 'Kantutani', 1),
(8, 'Huacollo', 1),
(9, 'Tacagua', 1),
(10, 'Tacagua Bajo', 1),
(11, 'Alto Tacagua', 1),
(12, 'Pampahasi', 2),
(13, 'Kupini', 2),
(14, 'Villa Armonía', 2),
(15, 'Villa Salomé', 2),
(16, 'San Antonio', 2),
(17, 'Bella Vista', 2),
(18, 'Callapa', 2),
(19, 'Villa Litoral', 2),
(20, 'Villa Copacabana', 2),
(21, 'Ciudadela', 2),
(22, 'Cuarto Centenario', 2),
(23, 'Villa Fátima', 3),
(24, 'Villa Copacabana', 3),
(25, 'Munaypata', 3),
(26, 'Achachicala', 3),
(27, 'Vino Tinto', 3),
(28, 'Alto Tejar', 3),
(29, 'Panticirca', 3),
(30, 'Cotahuma Bajo', 3),
(31, 'Las Nieves', 3),
(32, 'Alto San Pedro', 3),
(33, 'Ciudad Satélite', 3),
(34, 'Tembladerani', 4),
(35, 'Gran Poder', 4),
(36, 'El Tejar', 4),
(37, 'Chijini', 4),
(38, 'Chamoco Chico', 4),
(39, 'San Sebastián', 4),
(40, 'Alto Tejar', 4),
(41, 'Munaypata Alto', 4),
(42, 'Gran Poder', 4),
(43, 'Los Andes', 4),
(44, 'Miraflores', 5),
(45, 'Central', 5),
(46, 'San Jorge', 5),
(47, 'Sopocachi Bajo', 5),
(48, 'Villa Nuevo Potosí', 5),
(49, 'San Pedro Bajo', 5),
(50, 'Tembladerani', 5),
(51, 'Cristo Rey', 5),
(52, 'Alto Miraflores', 5),
(53, 'Obrajes', 6),
(54, 'Achumani', 6),
(55, 'Calacoto', 6),
(56, 'Irpavi', 6),
(57, 'Los Pinos', 6),
(58, 'La Florida', 6),
(59, 'Bella Vista Sur', 6),
(60, 'Cota Cota', 6),
(61, 'Ovejuyo', 6),
(62, 'Alto Obrajes', 6),
(63, 'Mallasa', 7),
(64, 'Mallasilla', 7),
(65, 'Jupapina', 7),
(66, 'Aranjuez', 7),
(67, 'Lipari', 7),
(68, 'Mecapaca', 7),
(69, 'Ananta', 7),
(70, 'Callapa', 7),
(71, 'Chuquiaguillo', 7),
(72, 'Alto Mallasa', 7),
(73, 'Palca', 8),
(74, 'Chuquiaguillo', 8),
(75, 'Hampaturi Bajo', 8),
(76, 'Alto Hampaturi', 8),
(77, 'Laguna Verde', 8),
(78, 'Uchu Pata', 8),
(79, 'Bella Vista Hampaturi', 8),
(80, 'Zongo Choro', 9),
(81, 'Zongo Grande', 9),
(82, 'Churiaca', 9),
(83, 'Chicaloma', 9),
(84, 'Milluni Bajo', 9),
(85, 'Chuñavi', 9),
(86, 'Coroico Viejo', 9),
(87, 'Saynani', 9),
(88, 'Villa Aspiazu', 9),
(89, 'Unduavi', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_persona` (`ci_persona`),
  ADD KEY `id_tramite` (`id_tramite`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_persona` (`ci_persona`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distrito` (`id_distrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catastro`
--
ALTER TABLE `catastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD CONSTRAINT `catastro_ibfk_1` FOREIGN KEY (`ci_persona`) REFERENCES `persona` (`ci`),
  ADD CONSTRAINT `catastro_ibfk_2` FOREIGN KEY (`id_tramite`) REFERENCES `tramites` (`id`),
  ADD CONSTRAINT `catastro_ibfk_3` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ci_persona`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
