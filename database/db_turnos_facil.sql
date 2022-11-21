-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2022 a las 01:32:44
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_turnos_facil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `importe_consulta` double DEFAULT NULL,
  `especialidad` varchar(35) NOT NULL DEFAULT 'Clínico',
  `dia` varchar(30) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `id_secretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nombre`, `apellido`, `matricula`, `importe_consulta`, `especialidad`, `dia`, `desde`, `hasta`, `id_secretaria`) VALUES
(2, 'Carlos', 'Alvarez', '123', 1500, 'Cardiologo', 'martes', '10:00:00', '15:30:00', NULL),
(3, 'Juan', 'Vena', '234', 2000, 'Pediatra', 'jueves', '10:00:00', '17:00:00', NULL),
(4, 'Daira', 'Galcerán', '345', 5000, 'Clínico', 'viernes', '10:00:00', '12:30:00', NULL),
(5, 'Claudio', 'Carmusciano', '897', 4500, 'Clínico', 'lunes', '15:30:00', '16:30:00', NULL),
(6, 'Mari', 'Esteberena', '328972397', 1800, 'kinesiólogo', 'jueves', '14:00:00', '16:00:00', NULL),
(7, 'Yazmín', 'Villalba', '4232342', NULL, 'Clínico', 'miercoles', '10:00:00', '17:00:00', NULL),
(28, 'pepe', 'pepito', 'lkj', 45, 'LKL', '4', '04:00:00', '15:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_os`
--

CREATE TABLE `medico_os` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_obra_social` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico_os`
--

INSERT INTO `medico_os` (`id`, `id_medico`, `id_obra_social`) VALUES
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
-- Estructura de tabla para la tabla `obra_social`
--

CREATE TABLE `obra_social` (
  `id` int(11) NOT NULL,
  `nombre_os` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obra_social`
--

INSERT INTO `obra_social` (`id`, `nombre_os`) VALUES
(1, 'OSDE'),
(2, 'PAMI'),
(3, 'IOMA'),
(4, 'AVALIAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
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
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`nombre`, `apellido`, `direccion`, `telefono`, `mail`, `dni`, `id_obra_social`, `nro_afiliado`, `id`) VALUES
('Teresa', 'Calcuta', 'San Martín 2822', '2284123456', 'tcalcuta@gmail.com', 10222345, 2, '1212414', 1),
('Carlos', 'Menem', 'Urquiza 1234', '1128768373', 'cmenem@hotmail.com', 4123456, 1, '11111', 2),
('Marcela', 'Osam', 'Libertador 234', '1198765342', 'mosam@outoolk.com', 28321111, NULL, NULL, 3),
('Pedro', 'Picapiedras', 'Piedras 2874', '2281989849', 'piedrita@piedra.com', 34098764, 4, '4324324', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `id_secretaria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `dia` varchar(9) NOT NULL,
  `fecha` date NOT NULL,
  `horario` varchar(5) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `id_medico`, `dia`, `fecha`, `horario`, `id_paciente`) VALUES
(1, 2, 'Martes', '2022-11-08', '10:00', 1),
(2, 2, 'Martes', '2022-11-08', '10:30', 1),
(3, 2, 'Martes', '2022-11-08', '11:00', 1),
(4, 2, 'Martes', '2022-11-08', '11:30', NULL),
(5, 2, 'Martes', '2022-11-08', '12:00', NULL),
(6, 2, 'Martes', '2022-11-10', '15:00', NULL),
(7, 2, 'Martes', '2022-11-10', '15:30', 1),
(8, 7, 'Miércoles', '2022-11-09', '10:00', 1),
(9, 7, 'Miércoles', '2022-11-09', '10:30', 1),
(10, 7, 'Miércoles', '2022-11-09', '11:00', 4),
(11, 7, 'Miércoles', '2022-11-09', '11:30', 1),
(12, 4, 'Viernes', '2022-11-11', '10:00', NULL),
(13, 4, 'Viernes', '2022-11-11', '10:30', NULL),
(14, 4, 'Viernes', '2022-11-11', '11:00', NULL),
(15, 4, 'Viernes', '2022-11-11', '11:30', NULL),
(16, 4, 'Viernes', '2022-11-11', '12:00', NULL),
(17, 4, 'Viernes', '2022-11-11', '12:30', NULL),
(18, 5, 'Lunes', '2022-11-14', '15:30', NULL),
(19, 5, 'Lunes', '2022-11-14', '15:45', NULL),
(20, 5, 'Lunes', '2022-11-14', '16:00', NULL),
(21, 5, 'Lunes', '2022-11-14', '16:15', NULL),
(22, 5, 'Lunes', '2022-11-14', '16:30', NULL),
(23, 3, 'Jueves', '2022-11-10', '10:00', NULL),
(24, 3, 'Jueves', '2022-11-10', '10:30', NULL),
(25, 3, 'Jueves', '2022-11-10', '11:00', NULL),
(26, 3, 'Jueves', '2022-11-10', '11:30', NULL),
(27, 3, 'Jueves', '2022-11-10', '12:00', NULL),
(28, 3, 'Jueves', '2022-11-10', '15:00', NULL),
(29, 3, 'Jueves', '2022-11-10', '15:30', NULL),
(30, 3, 'Jueves', '2022-11-10', '16:00', NULL),
(31, 3, 'Jueves', '2022-11-10', '16:30', NULL),
(32, 3, 'Jueves', '2022-11-10', '17:00', NULL),
(43, 6, 'Jueves', '2022-11-10', '14:00', NULL),
(44, 6, 'Jueves', '2022-11-10', '14:30', NULL),
(45, 6, 'Jueves', '2022-11-10', '15:00', NULL),
(46, 6, 'Jueves', '2022-11-10', '15:30', NULL),
(47, 6, 'Jueves', '2022-11-10', '16:00', NULL),
(48, 7, 'Miércoles', '2022-11-09', '15:00', 1),
(49, 7, 'Miércoles', '2022-11-09', '15:30', NULL),
(50, 7, 'Miércoles', '2022-11-09', '16:00', NULL),
(51, 7, 'Miércoles', '2022-11-09', '16:30', NULL),
(52, 7, 'Miércoles', '2022-11-09', '17:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_rol` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `id_rol`) VALUES
(1, 'metodologia', 'metodologia@demo.com', '$2y$10$4iCfPDe5Uv8BnRm08xzfQeYXihf9nikS48qeufTYM2X6dw3pfyn92', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_secretaria` (`id_secretaria`);

--
-- Indices de la tabla `medico_os`
--
ALTER TABLE `medico_os`
  ADD PRIMARY KEY (`id`,`id_medico`,`id_obra_social`),
  ADD KEY `fk_medico` (`id_medico`),
  ADD KEY `fk_obra_social` (`id_obra_social`);

--
-- Indices de la tabla `obra_social`
--
ALTER TABLE `obra_social`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obra_social_fk` (`id_obra_social`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id_secretaria`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_fk` (`id_medico`),
  ADD KEY `paciente_fk` (`id_paciente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `medico_os`
--
ALTER TABLE `medico_os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `obra_social`
--
ALTER TABLE `obra_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_secretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medico_os`
--
ALTER TABLE `medico_os`
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `fk_obra_social` FOREIGN KEY (`id_obra_social`) REFERENCES `obra_social` (`id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `obra_social_fk` FOREIGN KEY (`id_obra_social`) REFERENCES `obra_social` (`id`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `medico_fk` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `paciente_fk` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
