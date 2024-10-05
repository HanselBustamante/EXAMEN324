-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 05:27:37
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
  `id_tramite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `x_ini`, `y_ini`, `x_fin`, `y_fin`, `superficie`, `ci_persona`, `distrito`, `id_tramite`) VALUES
(2, 'Plaza Murillo', -16.507, -68.12, -16.51, -68.117, 400, '9876543', 'Centro Histórico', 2),
(3, 'Plaza Murillo', -16.513, -68.14, -16.515, -68.137, 800, '4567890', 'Centro Histórico', 1),
(5, 'Achumani', -16.538, -68.085, -16.54, -68.082, 800, '6543210', '6', NULL),
(9, 'El Tejar', 1, 2, 3, 4, 200, '10084126', 'El Tejar', 2),
(10, 'Zona 1', -16.5, -68.119, -16.497, -68.117, 120, '1111111', 'Centro Histórico', NULL),
(12, 'Zona 3', -16.5, -68.125, -16.498, -68.123, 220, '3333333', 'San Pedro', NULL),
(14, 'Zona 5', -16.494, -68.115, -16.492, -68.113, 310, '5555555', 'Achumani', NULL),
(15, 'Villa San Antonio', 1, 2, 3, 4, 800, '4444', 'Villa San Antonio', 1),
(17, NULL, 1, 2, 3, 4, 200, '8888', NULL, NULL),
(18, NULL, 1, 2, 3, 4, 10000, '999', NULL, NULL);

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
('10084126', 'Hansel', 'Bustamante'),
('1111111', 'Fernando', 'Lopez'),
('3333333', 'Diego', 'Pérez'),
('4444', 'Alan', 'Callisaya'),
('4567890', 'Carlos', 'Quisp'),
('5555555', 'Sofía', 'López'),
('6543210', 'José', 'Flores'),
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
(2, '10084126', '10084126', ''),
(3, '1111111', '1111111', ''),
(5, '3333333', '3333333', ''),
(7, '4567890', '4567890', ''),
(8, '5555555', '5555555', ''),
(10, '6543210', '6543210', ''),
(11, '9876543', '9876543', ''),
(13, '8888', '8888', ''),
(14, '999', '999', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_persona` (`ci_persona`),
  ADD KEY `id_tramite` (`id_tramite`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catastro`
--
ALTER TABLE `catastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD CONSTRAINT `catastro_ibfk_1` FOREIGN KEY (`ci_persona`) REFERENCES `persona` (`ci`),
  ADD CONSTRAINT `catastro_ibfk_2` FOREIGN KEY (`id_tramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ci_persona`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
