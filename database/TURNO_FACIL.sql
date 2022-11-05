-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-10-2022 a las 23:19:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TURNO_FACIL`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MEDICO`
--

CREATE TABLE `MEDICO` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `importe_consulta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `MEDICO`
--

INSERT INTO `MEDICO` (`id`, `nombre`, `apellido`, `matricula`, `importe_consulta`) VALUES
(2, 'Carlos', 'Alvarez', '123', 1500),
(3, 'Juan', 'Vena', '234', 2000),
(4, 'Daira', 'Galcerán', '345', 5000),
(5, 'Claudio', 'Carmusciano', '897', 4500),
(6, 'Mari', 'Esteberena', '328972397', 1800),
(7, 'Yazmín', 'Villalba', '4232342', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MEDICO_OS`
--

CREATE TABLE `MEDICO_OS` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_obra_social` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `MEDICO_OS`
--

INSERT INTO `MEDICO_OS` (`id`, `id_medico`, `id_obra_social`) VALUES
(1, 2, 3),
(2, 2, 4),
(3, 5, 1),
(4, 5, 2),
(5, 4, 2),
(6, 4, 3),
(7, 3, 4),
(8, 3, 3),
(9, 6, 1),
(10, 6, 3),
(11, 6, 1),
(12, 6, 2),
(13, 7, 2),
(14, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OBRA_SOCIAL`
--

CREATE TABLE `OBRA_SOCIAL` (
  `id` int(11) NOT NULL,
  `nombre_os` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `OBRA_SOCIAL`
--

INSERT INTO `OBRA_SOCIAL` (`id`, `nombre_os`) VALUES
(1, 'OSDE'),
(2, 'PAMI'),
(3, 'IOMA'),
(4, 'AVALIAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PACIENTE`
--

CREATE TABLE `PACIENTE` (
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `dni` int(8) NOT NULL,
  `id_obra_social` int(11) DEFAULT NULL,
  `nro_afiliado` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `PACIENTE`
--

INSERT INTO `PACIENTE` (`nombre`, `apellido`, `direccion`, `telefono`, `mail`, `dni`, `id_obra_social`, `nro_afiliado`, `id`) VALUES
('Teresa', 'Calcuta', 'San Martín 2822', '2284123456', 'tcalcuta@gmail.com', 10222345, 2, '1212414', 1),
('Carlos', 'Menem', 'Urquiza 1234', '1128768373', 'cmenem@hotmail.com', 4123456, 1, '11111', 2),
('Marcela', 'Osam', 'Libertador 234', '1198765342', 'mosam@outoolk.com', 28321111, NULL, NULL, 3),
('Pedro', 'Picapiedras', 'Piedras 2874', '2281989849', 'piedrita@piedra.com', 34098764, 4, '4324324', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TURNO`
--

CREATE TABLE `TURNO` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horario` varchar(5) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TURNO`
--

INSERT INTO `TURNO` (`id`, `id_medico`, `fecha`, `horario`, `id_paciente`) VALUES
(1, 2, '2022-11-08', '10:00', NULL),
(2, 2, '2022-11-08', '10:30', NULL),
(3, 2, '2022-11-08', '11:00', NULL),
(4, 2, '2022-11-08', '11:30', NULL),
(5, 2, '2022-11-08', '12:00', NULL),
(6, 2, '2022-11-10', '15:00', NULL),
(7, 2, '2022-11-10', '15:30', NULL),
(8, 7, '2022-11-09', '10:00', NULL),
(9, 7, '2022-11-09', '10:30', NULL),
(10, 7, '2022-11-09', '11:00', NULL),
(11, 7, '2022-11-09', '11:30', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `MEDICO`
--
ALTER TABLE `MEDICO`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `MEDICO_OS`
--
ALTER TABLE `MEDICO_OS`
  ADD PRIMARY KEY (`id`,`id_medico`,`id_obra_social`),
  ADD KEY `fk_medico` (`id_medico`),
  ADD KEY `fk_obra_social` (`id_obra_social`);

--
-- Indices de la tabla `OBRA_SOCIAL`
--
ALTER TABLE `OBRA_SOCIAL`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `PACIENTE`
--
ALTER TABLE `PACIENTE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obra_social_fk` (`id_obra_social`);

--
-- Indices de la tabla `TURNO`
--
ALTER TABLE `TURNO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_fk` (`id_medico`),
  ADD KEY `paciente_fk` (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `MEDICO`
--
ALTER TABLE `MEDICO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `MEDICO_OS`
--
ALTER TABLE `MEDICO_OS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `OBRA_SOCIAL`
--
ALTER TABLE `OBRA_SOCIAL`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `PACIENTE`
--
ALTER TABLE `PACIENTE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `TURNO`
--
ALTER TABLE `TURNO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `MEDICO_OS`
--
ALTER TABLE `MEDICO_OS`
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`id_medico`) REFERENCES `MEDICO` (`id`),
  ADD CONSTRAINT `fk_obra_social` FOREIGN KEY (`id_obra_social`) REFERENCES `OBRA_SOCIAL` (`id`);

--
-- Filtros para la tabla `PACIENTE`
--
ALTER TABLE `PACIENTE`
  ADD CONSTRAINT `obra_social_fk` FOREIGN KEY (`id_obra_social`) REFERENCES `OBRA_SOCIAL` (`id`);

--
-- Filtros para la tabla `TURNO`
--
ALTER TABLE `TURNO`
  ADD CONSTRAINT `medico_fk` FOREIGN KEY (`id_medico`) REFERENCES `MEDICO` (`id`),
  ADD CONSTRAINT `paciente_fk` FOREIGN KEY (`id_paciente`) REFERENCES `PACIENTE` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
