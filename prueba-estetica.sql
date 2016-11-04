-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2016 a las 01:25:10
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba-estetica`
--
CREATE DATABASE IF NOT EXISTS `prueba-estetica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `prueba-estetica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `hora_inicio` int(11) DEFAULT NULL,
  `hora_fin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `hora_inicio`, `hora_fin`) VALUES
(1, 8, 9),
(2, 9, 10),
(3, 10, 11),
(4, 11, 12),
(5, 14, 13),
(6, 13, 14),
(7, 14, 15),
(8, 15, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `email`, `telefono`) VALUES
(7, 'carlos ', 'romero pertuz', 'carlos.romero54@uac.edu.co', '567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `minutos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `costo`, `detalle`, `horas`, `minutos`) VALUES
(74, 'Masajes', '56789', 'Masaje en espalda', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `sucursal_producto_id` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horario_idhorario` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `sucursal_producto_id`, `persona_idpersona`, `fecha`, `horario_idhorario`, `cliente`) VALUES
(5, 11, 7, '2016-11-04', 1, 7),
(6, 11, 7, '2016-11-04', 2, 7),
(7, 11, 7, '2016-11-25', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idsucursal`, `nombre`, `direccion`, `telefono`) VALUES
(5, 'barranquilla', 'calle 98', '45678324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_producto`
--

CREATE TABLE `sucursal_producto` (
  `id` int(11) NOT NULL,
  `sucursal_idsucursal` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal_producto`
--

INSERT INTO `sucursal_producto` (`id`, `sucursal_idsucursal`, `producto_idproducto`) VALUES
(11, 5, 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_trabajador`
--

CREATE TABLE `sucursal_trabajador` (
  `id` int(11) NOT NULL,
  `sucursal_producto_id` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal_trabajador`
--

INSERT INTO `sucursal_trabajador` (`id`, `sucursal_producto_id`, `persona_idpersona`) VALUES
(10, 11, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_sucursal_producto1_idx` (`sucursal_producto_id`),
  ADD KEY `fk_reserva_persona1_idx` (`persona_idpersona`),
  ADD KEY `fk_reserva_horario1_idx` (`horario_idhorario`),
  ADD KEY `fk_reserva_persona2_idx` (`cliente`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idsucursal`);

--
-- Indices de la tabla `sucursal_producto`
--
ALTER TABLE `sucursal_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sucursal_has_producto_producto1_idx` (`producto_idproducto`),
  ADD KEY `fk_sucursal_has_producto_sucursal_idx` (`sucursal_idsucursal`);

--
-- Indices de la tabla `sucursal_trabajador`
--
ALTER TABLE `sucursal_trabajador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sucursal_producto_has_persona_persona1_idx` (`persona_idpersona`),
  ADD KEY `fk_sucursal_producto_has_persona_sucursal_producto1_idx` (`sucursal_producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idsucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sucursal_producto`
--
ALTER TABLE `sucursal_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `sucursal_trabajador`
--
ALTER TABLE `sucursal_trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_horario1` FOREIGN KEY (`horario_idhorario`) REFERENCES `horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_persona2` FOREIGN KEY (`cliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_sucursal_producto1` FOREIGN KEY (`sucursal_producto_id`) REFERENCES `sucursal_producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal_producto`
--
ALTER TABLE `sucursal_producto`
  ADD CONSTRAINT `fk_sucursal_has_producto_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sucursal_has_producto_sucursal` FOREIGN KEY (`sucursal_idsucursal`) REFERENCES `sucursal` (`idsucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal_trabajador`
--
ALTER TABLE `sucursal_trabajador`
  ADD CONSTRAINT `fk_sucursal_producto_has_persona_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sucursal_producto_has_persona_sucursal_producto1` FOREIGN KEY (`sucursal_producto_id`) REFERENCES `sucursal_producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
