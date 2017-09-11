-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2017 a las 19:35:15
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
  `grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni_alumno`, `grado`) VALUES
(1, 'al1', 1),
(2, 'al2', 1),
(3, 'al3', 2);

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
  `titulo` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `dni_docente`, `titulo`) VALUES
(1, 'dc1', 'Matematico'),
(2, 'dc2', 'Master en Programacion');

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
  `id_grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `clave_materia`, `materia`, `hora_inicio`, `hora_fin`, `id_docente`, `id_grado`) VALUES
(1, 'mh-1', 'Matematicas', '08:00:00', '10:20:00', 1, 1),
(2, 'mh-2', 'Español', '10:20:00', '12:00:00', 1, 1),
(3, 'dh-1', 'Desarrollo de Apps', '08:00:00', '11:00:00', 2, 2),
(4, 'dh-2', 'BD EER', '11:00:00', '12:30:00', 2, 2);

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
(1, 'al1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'David ', 'Puc Poot', '9831812202', '1', '2017-09-11 15:32:27', '0000-00-00 00:00:00', ''),
(2, 'dc1', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Juan de Dios', 'Puc Tun', '9831143692', '2', '2017-09-11 15:32:33', '0000-00-00 00:00:00', ''),
(3, 'dc2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Miguel', 'Cervantes', '9992238143', '2', '2017-09-11 15:32:42', '0000-00-00 00:00:00', ''),
(4, 'al2', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jesus', 'Poot', '9843749812', '1', '2017-09-11 15:32:48', '0000-00-00 00:00:00', ''),
(5, 'al3', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jaqueline', 'Gomez', '9831485678', '1', '2017-09-11 15:32:51', '0000-00-00 00:00:00', ''),
(6, 'admin', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Admin', 'Root', '9009099000', '0', '2017-09-11 15:32:56', '0000-00-00 00:00:00', ''),
(7, '111k0017', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Jose', 'de la cruz', NULL, '1', '2017-09-11 15:33:01', '2017-09-11 18:49:51', ''),
(8, '111k0018', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'Cahposo', 'eqweq', NULL, '1', '2017-09-11 15:33:06', '2017-09-11 19:49:32', ''),
(9, '111k0000', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'dsadas', 'dasdasdas', NULL, '1', '2017-09-11 15:33:10', '2017-09-11 19:53:05', ''),
(10, '1111', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'otro', 'otro', NULL, '1', '2017-09-11 15:33:14', '2017-09-11 20:03:56', ''),
(11, '12345', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'DASDASDAS', 'DASDASDASD', NULL, '1', '2017-09-11 15:33:18', '2017-09-11 20:09:30', ''),
(12, 'dpuc92', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'David', 'Puc Poot', NULL, '1', '2017-09-11 16:03:00', '2017-09-11 20:22:00', ''),
(13, 'dpp92', '$2y$10$8RSiw7bzFmTBgJnmdG7ZUOM/vKMF0K3GBOf3XqnX/dzQFSkxmM3FC', 'David', 'Puc Poot', NULL, '1', '2017-09-11 16:03:05', '2017-09-11 20:28:15', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
