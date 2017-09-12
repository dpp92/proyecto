-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2017 a las 14:19:54
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
(8, '111k0093', NULL, '2017-09-12 01:43:26', '2017-09-12 01:43:26'),
(12, '111k000129', 1, '2017-09-12 01:49:22', '2017-09-12 01:49:22'),
(13, '111k0002', 1, '2017-09-12 10:22:39', '2017-09-12 10:22:39'),
(14, '111J00213', 2, '2017-09-12 11:18:12', '2017-09-12 11:18:12'),
(15, '111L3424', 2, '2017-09-12 11:19:20', '2017-09-12 11:19:20'),
(16, '523k3124', 1, '2017-09-12 11:20:11', '2017-09-12 11:20:11'),
(17, '111K3459', 2, '2017-09-12 11:59:32', '2017-09-12 11:59:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `calificacion` double(5,2) DEFAULT NULL,
  `dni_alumnos` varchar(120) NOT NULL,
  `id_materias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `calificacion`, `dni_alumnos`, `id_materias`) VALUES
(1, 98.20, 'al1', 1),
(2, 75.30, 'al1', 2);

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
(1, 'dc1', 'Matematico', '2017-09-12 05:12:51', '0000-00-00 00:00:00'),
(2, 'dc2', 'Master en Programacion y EER', '2017-09-12 07:56:21', '0000-00-00 00:00:00'),
(3, 'DC-0010', 'Administración', '2017-09-12 10:13:55', '2017-09-12 10:13:55'),
(4, 'DC-0003', 'Ingeniero', '2017-09-12 15:26:43', '2017-09-12 15:26:43'),
(5, 'DC-093958', 'Psicología', '2017-09-12 16:57:15', '2017-09-12 16:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`) VALUES
(1, '1 SEMESTRE'),
(2, '2 SEMESTRE');

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
(1, 'mh-1', 'Matematicas', '08:00:00', '10:20:00', 1, 1, '2017-09-12 12:18:39', '0000-00-00 00:00:00'),
(2, 'mh-2', 'Español', '10:20:00', '12:00:00', 1, 1, '2017-09-12 12:18:39', '0000-00-00 00:00:00'),
(3, 'dh-1', 'Desarrollo de Apps', '08:00:00', '11:00:00', 2, 2, '2017-09-12 12:18:39', '0000-00-00 00:00:00'),
(4, 'dh-2', 'BD EER', '11:00:00', '12:30:00', 2, 2, '2017-09-12 12:18:39', '0000-00-00 00:00:00'),
(5, 'MJDK12', 'FISICA', '08:40:00', '10:20:00', 5, NULL, '2017-09-12 17:18:44', '2017-09-12 17:18:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` int(11) NOT NULL,
  `salon` varchar(120) DEFAULT NULL,
  `grados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `salon`, `grados_id`) VALUES
(1, 'j1', 1),
(2, 'j2', 2);

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
(1, 'al1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'David ', 'Puc Poot', '9831812202', '1', '2017-09-11 20:53:49', '0000-00-00 00:00:00', 'b0XMk3A3B5VCDwVtHjAlQdZ3ozy74eCIa8t4cEkeugAd3uaxIIVuqqX3VrMl'),
(2, 'dc1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Juan de Dios', 'Puc Tun', '9831143692', '2', '2017-09-11 15:32:33', '0000-00-00 00:00:00', ''),
(3, 'dc2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Miguel Alejandro', 'Cervantes', '9992238143', '2', '2017-09-12 07:54:45', '0000-00-00 00:00:00', ''),
(4, 'al2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jesus', 'Poot', '9843749812', '1', '2017-09-11 15:32:48', '0000-00-00 00:00:00', ''),
(5, 'al3', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jaqueline', 'Gomez', '9831485678', '1', '2017-09-11 15:32:51', '0000-00-00 00:00:00', ''),
(6, 'admin', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Admin', 'Root', '9009099000', '0', '2017-09-11 21:02:56', '0000-00-00 00:00:00', 'fcSvRZjJo5yX1Jt3Lvi5QxSJaGzKBJZEyosQ5iA3pRseuzrE1KUpHwhixqn3'),
(19, '111k0093', '$2y$10$VkGp2ZIeO38cc9BxQRNEKuoSp8ehvg8gljGo27Eo/Qe643vg6FkoK', 'David', 'Gonzales Prado', '9841234567', '1', '2017-09-12 06:43:26', '2017-09-12 06:43:26', NULL),
(20, '111k000129', '$2y$10$WZM/U92G00pl7EgbAGNW0.Z2C0o6aaO4B4f6rbH0EbGLU.ETfsmxS', 'dsadasd', 'ddasda', NULL, '1', '2017-09-12 06:49:22', '2017-09-12 06:49:22', NULL),
(27, 'DC-0010', '$2y$10$c4YMODVoZ/TTLed5I15YvO9NI8VacxCgxH.v/SCRhEels2Gg1/YlW', 'Roberto', 'Cruz', '984-123-4500', '2', '2017-09-12 10:13:55', '2017-09-12 10:13:55', NULL),
(28, '111k0002', '$2y$10$8RY5AVC4s2oc4v4u.SW0..9tYpjB.GslxJ3N4jZv5bftHcGeDQAMC', 'Pedro Joaquin', 'Gonzales', '984-123-3454', '1', '2017-09-12 15:22:38', '2017-09-12 15:22:38', NULL),
(29, 'DC-0003', '$2y$10$1nynvZVpEViwQ1ts6smg0.z3SS0HYGKCHYPDYYq0Lc7Un4wwIlBvG', 'JOSE JUAN', 'POOT Cruz', '984-123-4356', '2', '2017-09-12 10:34:18', '2017-09-12 15:26:43', NULL),
(30, '111J00213', '$2y$10$uOC8x5IntHXHDUzdojnnh.5tgFipR1IQ6SdGSLpochAR6pnVAx2Ei', 'DAVID', 'FERNANDES', '984-123-3454', '1', '2017-09-12 16:18:11', '2017-09-12 16:18:11', NULL),
(31, '111L3424', '$2y$10$0Q3KcDnTkob05JBQbYFG7Ol7NfEfvidkkWMAx/YWAa6/Nue4qPWvC', 'JOAQUIN', 'FERNANDO', '984-1445-672', '1', '2017-09-12 16:19:20', '2017-09-12 16:19:20', NULL),
(32, '523k3124', '$2y$10$W6ErGkQprdJDyBuvKMK3pOJZDw/LDNh7rcYG0DREA7CpFI2xqxQNu', 'Maria de la luz', 'Pat', '984-124-3587', '1', '2017-09-12 16:20:11', '2017-09-12 16:20:11', NULL),
(33, 'DC-093958', '$2y$10$tN4sGGBNlgu0o9vmA51zW.jt6LF1Zt9Ya4.khRp6Lk/7rPLXAg2ki', 'JUAN MANUEL', 'DIAZ', '983823789', '2', '2017-09-12 16:57:15', '2017-09-12 16:57:15', NULL),
(34, '111K3459', '$2y$10$fP2tHWBa5k7uufeZipAO0.xCbwlHsdqnzjvBmzW2zb1WDjALZf4gK', 'JOSE', 'LOPEZ', '984-124-3456', '1', '2017-09-12 16:59:32', '2017-09-12 16:59:32', NULL);

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
  ADD KEY `id_docente_idx` (`id_docente`),
  ADD KEY `id_grado_idx` (`id_grado`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salones_grados1_idx` (`grados_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `dni_alumno` FOREIGN KEY (`dni_alumno`) REFERENCES `users` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grado` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `id_alumno` FOREIGN KEY (`dni_alumnos`) REFERENCES `alumnos` (`dni_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_materias` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `dni_docente` FOREIGN KEY (`dni_docente`) REFERENCES `users` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `id_docente` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salones`
--
ALTER TABLE `salones`
  ADD CONSTRAINT `fk_salones_grados1` FOREIGN KEY (`grados_id`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
