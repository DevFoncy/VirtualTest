-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2017 a las 00:45:22
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simulacro_unac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternativa`
--

CREATE TABLE `alternativa` (
  `id_pregunta` int(11) NOT NULL,
  `alt1` int(1) NOT NULL,
  `alt2` int(1) NOT NULL,
  `alt3` int(1) NOT NULL,
  `alt4` int(1) NOT NULL,
  `alt5` int(1) NOT NULL,
  `alternativa_sol` int(1) NOT NULL,
  `curso_pertenece` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alternativa`
--

INSERT INTO `alternativa` (`id_pregunta`, `alt1`, `alt2`, `alt3`, `alt4`, `alt5`, `alternativa_sol`, `curso_pertenece`) VALUES
(1, 1, 2, 3, 4, 5, 3, 1),
(2, 3, 4, 1, 5, 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternativa_detalle`
--

CREATE TABLE `alternativa_detalle` (
  `id` int(5) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alternativa_detalle`
--

INSERT INTO `alternativa_detalle` (`id`, `nombre`) VALUES
(1, '13'),
(2, '14'),
(3, '32'),
(4, '09.4'),
(5, '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nro_recibo` varchar(8) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `dni`, `nombre`, `apellido`, `nro_recibo`, `correo`, `password`) VALUES
(1, 12345, 'Victor', 'Arias', '123', 'prueba@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`id`, `nombre`) VALUES
(1, 'Ciencias e Ingenierias '),
(2, 'Ciencias Empresariales'),
(3, 'Ciencias de la Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `codigo` int(2) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `bloque_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`codigo`, `nombre`, `bloque_id`) VALUES
(1, 'Administracion', 2),
(31, 'Ingenieria Electrónica', 1),
(81, 'Enfermeria', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(2) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cant_preguntas` int(2) NOT NULL,
  `bloque_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `cant_preguntas`, `bloque_id`) VALUES
(1, 'Razonamiento Matematico', 22, 1),
(2, 'Razonamiento Verbal', 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `curso_id` int(2) NOT NULL,
  `peso_id` float NOT NULL,
  `bloque_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `nombre`, `curso_id`, `peso_id`, `bloque_id`) VALUES
(1, 'Cuanto es la raiz cuadrada de 4 ', 1, 1, 1),
(2, 'Cuanto es la suma de 2+4', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(1) NOT NULL,
  `bloque_id` int(1) NOT NULL,
  `cant_preguntas` int(2) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `bloque_id`, `cant_preguntas`, `nombre`) VALUES
(1, 1, 45, 'Aptitud Academica'),
(2, 1, 55, 'Conocimiento');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alternativa`
--
ALTER TABLE `alternativa`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `curso_pertenece` (`curso_pertenece`);

--
-- Indices de la tabla `alternativa_detalle`
--
ALTER TABLE `alternativa_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `bloque_fk` (`bloque_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bloque_fk_3` (`bloque_id`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`,`peso_id`),
  ADD KEY `curso_fk` (`curso_id`),
  ADD KEY `bloque_foreign` (`bloque_id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bloque_fk_2` (`bloque_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alternativa`
--
ALTER TABLE `alternativa`
  ADD CONSTRAINT `pregunta_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `bloque_fk` FOREIGN KEY (`bloque_id`) REFERENCES `bloque` (`id`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `bloque_fk_3` FOREIGN KEY (`bloque_id`) REFERENCES `bloque` (`id`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `bloque_foreign` FOREIGN KEY (`bloque_id`) REFERENCES `curso` (`bloque_id`),
  ADD CONSTRAINT `curso_fk` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `bloque_fk_2` FOREIGN KEY (`bloque_id`) REFERENCES `bloque` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
