-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2017 a las 07:51:28
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abrhilsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `dni_alumno` varchar(120) NOT NULL,
  `grado` int(11) DEFAULT NULL,
  `updated_at` varchar(150) NOT NULL,
  `created_at` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni_alumno`, `grado`, `updated_at`, `created_at`) VALUES
(1, 'al1', 1, '', ''),
(2, 'al2', 1, '', ''),
(3, 'al3', 2, '', ''),
(8, '111k0093', 1, '2017-09-17 06:42:30', '2017-09-12 01:43:26'),
(13, '111k0002', 1, '2017-09-12 10:22:39', '2017-09-12 10:22:39'),
(14, '111J00213', 2, '2017-09-12 11:18:12', '2017-09-12 11:18:12'),
(15, '111L3424', 2, '2017-09-12 11:19:20', '2017-09-12 11:19:20'),
(16, '523k3124', 1, '2017-09-12 11:20:11', '2017-09-12 11:20:11'),
(17, '111K3459', 2, '2017-09-12 11:59:32', '2017-09-12 11:59:32'),
(19, 'AL-2354', 21, '2017-09-17 02:16:25', '2017-09-17 02:14:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `calificacion` double(5,2) DEFAULT NULL,
  `dni_alumnos` varchar(120) DEFAULT NULL,
  `id_materias` int(11) DEFAULT NULL,
  `id_docente` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `calificacion`, `dni_alumnos`, `id_materias`, `id_docente`, `created_at`, `updated_at`) VALUES
(19, 98.50, 'al3', 5, 'DC-0010', '2017-09-18 07:34:37', '2017-09-18 07:34:37'),
(20, 78.50, '111J00213', 5, 'DC-0010', '2017-09-18 07:34:38', '2017-09-18 07:34:38'),
(21, 68.30, '111L3424', 5, 'DC-0010', '2017-09-18 07:34:38', '2017-09-18 07:34:38'),
(22, 78.20, '111K3459', 5, 'DC-0010', '2017-09-18 07:34:39', '2017-09-18 07:34:39'),
(23, 84.50, 'al1', 7, 'DC-0010', '2017-09-18 07:34:39', '2017-09-18 07:34:39'),
(24, 98.60, 'al2', 7, 'DC-0010', '2017-09-18 07:34:40', '2017-09-18 07:34:40'),
(25, 65.60, '111k0093', 7, 'DC-0010', '2017-09-18 07:34:40', '2017-09-18 07:34:40'),
(26, 77.80, '111k0002', 7, 'DC-0010', '2017-09-18 07:34:40', '2017-09-18 07:34:40'),
(27, 85.60, '523k3124', 7, 'DC-0010', '2017-09-18 07:34:41', '2017-09-18 07:34:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `dni_docente` varchar(120) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `dni_docente`, `titulo`, `updated_at`, `created_at`) VALUES
(1, 'DC1', 'Matematico', '2017-09-17 02:07:47', '0000-00-00 00:00:00'),
(2, 'DC2', 'Master en Programacion y EER', '2017-09-17 02:08:03', '0000-00-00 00:00:00'),
(3, 'DC-0010', 'Administración', '2017-09-12 10:13:55', '2017-09-12 10:13:55'),
(4, 'DC-0003', 'Ingeniero', '2017-09-12 15:26:43', '2017-09-12 15:26:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `grado` varchar(120) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `grado`, `updated_at`, `created_at`) VALUES
(1, '1 Semestre', '2017-09-16 21:48:26', '0000-00-00 00:00:00'),
(2, '2 Semestre', '2017-09-16 21:48:47', '0000-00-00 00:00:00'),
(19, '3 Semestre', '2017-09-16 21:48:53', '2017-09-16 21:31:34'),
(20, '4 Semestre', '2017-09-16 21:48:33', '2017-09-16 21:31:40'),
(21, '5 Semestre', '2017-09-16 21:49:10', '2017-09-16 21:49:10'),
(22, '6 Semestre', '2017-09-16 21:49:44', '2017-09-16 21:49:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `clave_materia` varchar(120) DEFAULT NULL,
  `materia` varchar(120) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `clave_materia`, `materia`, `hora_inicio`, `hora_fin`, `id_docente`, `id_grado`, `updated_at`, `created_at`) VALUES
(5, 'FIS-DER45', 'FISICA', '12:10:00', '14:50:00', 3, 2, '2017-09-15 14:03:20', '2017-09-15 14:03:20'),
(6, 'GEO-3-DR', 'GEOGRAFIA', '17:10:00', '19:00:00', 1, 1, '2017-09-15 14:06:02', '2017-09-15 14:06:02'),
(7, 'HRT-5674', 'Historia Nacional', '13:00:00', '14:50:00', 3, 1, '2017-09-15 16:00:00', '2017-09-15 14:48:21'),
(8, 'LI-de34', 'Literatura Inglesa', '16:00:00', '17:20:00', 4, 19, '2017-09-16 21:52:01', '2017-09-16 21:52:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` int(11) NOT NULL,
  `salon` varchar(150) NOT NULL,
  `grados_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `salon`, `grados_id`, `created_at`, `updated_at`) VALUES
(1, 'J1', 1, '2017-09-16 20:27:05', '2017-09-16 20:27:05'),
(5, 'J5', 2, '2017-09-16 20:28:13', '2017-09-16 20:28:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dni` varchar(120) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `telefono` varchar(120) DEFAULT NULL,
  `tipo` enum('1','2','0') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `password`, `nombre`, `apellidos`, `telefono`, `tipo`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'al1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'David', 'Puc Poot', '9831812202', '1', '2017-09-18 01:53:16', '0000-00-00 00:00:00', 'b0XMk3A3B5VCDwVtHjAlQdZ3ozy74eCIa8t4cEkeugAd3uaxIIVuqqX3VrMl'),
(2, 'DC1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Juan de Dios', 'Puc Tun', '9831143692', '2', '2017-09-17 02:07:47', '0000-00-00 00:00:00', ''),
(3, 'DC2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Miguel Alejandro', 'Cervantes', '9992238143', '2', '2017-09-17 02:08:03', '0000-00-00 00:00:00', ''),
(4, 'al2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jesus', 'Poot', '9843749812', '1', '2017-09-11 15:32:48', '0000-00-00 00:00:00', ''),
(5, 'al3', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jaqueline', 'Gomez', '9831485678', '1', '2017-09-11 15:32:51', '0000-00-00 00:00:00', ''),
(6, 'admin', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Admin', 'Root', '9009099000', '0', '2017-09-17 20:53:59', '0000-00-00 00:00:00', '3qTwvGImG4JxJXZQJnIPjyAECKgFUfFj6gLlECo22sgcIUq7gBlaTqqqlF6a'),
(19, '111k0093', '$2y$10$VkGp2ZIeO38cc9BxQRNEKuoSp8ehvg8gljGo27Eo/Qe643vg6FkoK', 'David', 'Gonzales Prado', '9841234567', '1', '2017-09-12 06:43:26', '2017-09-12 06:43:26', NULL),
(27, 'DC-0010', '$2y$10$c4YMODVoZ/TTLed5I15YvO9NI8VacxCgxH.v/SCRhEels2Gg1/YlW', 'Roberto', 'Cruz', '984-123-4500', '2', '2017-09-18 05:47:05', '2017-09-12 10:13:55', 'iipvgYOkT7oOJNIEITZ96nJyyOlzyFKxSkGJ6iGgbosxE9WNEyu1kG5fOCQn'),
(28, '111k0002', '$2y$10$8RY5AVC4s2oc4v4u.SW0..9tYpjB.GslxJ3N4jZv5bftHcGeDQAMC', 'Pedro Joaquin', 'Gonzales', '984-123-3454', '1', '2017-09-12 15:22:38', '2017-09-12 15:22:38', NULL),
(29, 'DC-0003', '$2y$10$1nynvZVpEViwQ1ts6smg0.z3SS0HYGKCHYPDYYq0Lc7Un4wwIlBvG', 'JOSE JUAN', 'POOT Cruz', '984-123-4356', '2', '2017-09-12 10:34:18', '2017-09-12 15:26:43', NULL),
(30, '111J00213', '$2y$10$uOC8x5IntHXHDUzdojnnh.5tgFipR1IQ6SdGSLpochAR6pnVAx2Ei', 'DAVID', 'FERNANDES', '984-123-3454', '1', '2017-09-12 16:18:11', '2017-09-12 16:18:11', NULL),
(31, '111L3424', '$2y$10$0Q3KcDnTkob05JBQbYFG7Ol7NfEfvidkkWMAx/YWAa6/Nue4qPWvC', 'JOAQUIN', 'FERNANDO', '984-1445-672', '1', '2017-09-12 16:19:20', '2017-09-12 16:19:20', NULL),
(32, '523k3124', '$2y$10$W6ErGkQprdJDyBuvKMK3pOJZDw/LDNh7rcYG0DREA7CpFI2xqxQNu', 'Maria de la luz', 'Pat', '984-124-3587', '1', '2017-09-12 16:20:11', '2017-09-12 16:20:11', NULL),
(33, 'DC-093958', '$2y$10$tN4sGGBNlgu0o9vmA51zW.jt6LF1Zt9Ya4.khRp6Lk/7rPLXAg2ki', 'JUAN MANUEL', 'DIAZ', '983823789', '2', '2017-09-12 16:57:15', '2017-09-12 16:57:15', NULL),
(34, '111K3459', '$2y$10$fP2tHWBa5k7uufeZipAO0.xCbwlHsdqnzjvBmzW2zb1WDjALZf4gK', 'JOSE', 'LOPEZ', '984-124-3456', '1', '2017-09-12 16:59:32', '2017-09-12 16:59:32', NULL),
(37, 'AL-2354', '$2y$10$kGqLpgWn/L8OgPwIHkKSWO1ZsL4XWufdVZhJnJtANo5apLf0WxiRO', 'Jose', 'Luja', '984-456-78-78', '1', '2017-09-17 02:18:52', '2017-09-17 07:14:20', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni_alumno`),
  ADD KEY `grado_idx` (`grado`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materias_idx` (`id_materias`),
  ADD KEY `id_alumno` (`dni_alumnos`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni_docente`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave_materia` (`clave_materia`),
  ADD KEY `id_docente_idx` (`id_docente`),
  ADD KEY `id_grado_idx` (`id_grado`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `dni_alumno` FOREIGN KEY (`dni_alumno`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grado` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `id_alumno` FOREIGN KEY (`dni_alumnos`) REFERENCES `alumnos` (`dni_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_materias` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `dni_docente` FOREIGN KEY (`dni_docente`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `id_docente` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
