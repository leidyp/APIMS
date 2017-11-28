-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2017 a las 16:28:25
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `masalud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `cita_id` int(11) NOT NULL,
  `med_id` int(11) DEFAULT NULL,
  `pac_id` int(11) DEFAULT NULL,
  `rec_id` int(11) DEFAULT NULL,
  `cita_fecha` date DEFAULT NULL,
  `cita_hora` time DEFAULT NULL,
  `cita_estado` varchar(30) DEFAULT NULL,
  `cita_descripcion` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `hc_id` int(11) NOT NULL,
  `pac_id` int(11) DEFAULT NULL,
  `proc_id` int(11) DEFAULT NULL,
  `hc_serial` varchar(50) DEFAULT NULL,
  `hc_fecha` date DEFAULT NULL,
  `hc_descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `med_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `med_especialidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`med_id`, `per_id`, `med_especialidad`) VALUES
(1, 1, 'PEDIATRIA'),
(2, 5, 'GINECOLOGIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `pac_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `pac_tipo_sangre` varchar(50) DEFAULT NULL,
  `med_id_cabecera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`pac_id`, `per_id`, `pac_tipo_sangre`, `med_id_cabecera`) VALUES
(3, 4, 'O-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_id` int(11) NOT NULL,
  `us_id` int(11) DEFAULT NULL,
  `per_cedula` varchar(50) DEFAULT NULL,
  `per_nombres` varchar(50) DEFAULT NULL,
  `per_apellidos` varchar(50) DEFAULT NULL,
  `per_fechan` date DEFAULT NULL,
  `per_direccion` varchar(90) DEFAULT NULL,
  `per_telefono` varchar(50) DEFAULT NULL,
  `per_correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `us_id`, `per_cedula`, `per_nombres`, `per_apellidos`, `per_fechan`, `per_direccion`, `per_telefono`, `per_correo`) VALUES
(1, 1, '2342342', 'leidy', 'acuña', '2017-11-01', 'serfeswrsf', 'dsfsdfsdf', 'sdfsdfsdf'),
(4, NULL, '193412456', 'Leonel', 'Messi', '2017-01-01', 'arerwerwerwre24', '21312321112', 'correoprueba@gmail.com'),
(5, 2, '2132132139', 'Darren', 'Oz', '2017-01-01', 'arerwerwerwre24', '21312321112', 'darrenoz@gmail.com'),
(6, 3, '123132312', 'Darren Recepcionista', 'Oz', '2017-01-01', 'arerwerwerwre24', '21312321112', 'darregnoz@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `proc_id` int(11) NOT NULL,
  `proc_nombre` varchar(50) DEFAULT NULL,
  `proc_descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `rec_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`rec_id`, `per_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `us_id` int(11) NOT NULL,
  `us_nombre` varchar(50) DEFAULT NULL,
  `us_user` varchar(50) DEFAULT NULL,
  `us_password` varchar(150) DEFAULT NULL,
  `us_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nombre`, `us_user`, `us_password`, `us_token`) VALUES
(1, 'Leidy Acuña', 'lacuna', '$2y$10$ORvKrdHqLeBN0EZExmdAtOgTjwL5ta8zJNeq.gSYUeyb1ve3mtZhS', 'RlVuQTVVUTB5QWg5aDh3SjlYTk4yRnhtSDlBVkUxTFVMWVp5amFDOA=='),
(2, NULL, 'darren.oz', '$2y$10$p.pNpVOfqftCvs9JwufowuK.0c6X.xF8GTJs3y8497rTxX3GrjXke', NULL),
(3, NULL, 'darren.ozr', '$2y$10$a9xCTWKZVzmEOgTn74AXgOmCLInXXFlctoV23rhiwFtVxvJpPHp36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `ur_id` int(11) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `us_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`cita_id`),
  ADD KEY `fk_citam` (`med_id`),
  ADD KEY `fk_citap` (`pac_id`),
  ADD KEY `fk_citar` (`rec_id`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`hc_id`),
  ADD KEY `fk_historia_clinicap` (`pac_id`),
  ADD KEY `fk_historia_clinicapr` (`proc_id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `fk_medicom` (`per_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pac_id`),
  ADD KEY `fk_pacientep` (`per_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `fk_personap` (`us_id`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`proc_id`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `fk_recepcionista` (`per_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_id`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`ur_id`),
  ADD KEY `fk_usuarior` (`rol_id`),
  ADD KEY `fk_usuariou` (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `cita_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `hc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `proc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_citam` FOREIGN KEY (`med_id`) REFERENCES `medico` (`med_id`),
  ADD CONSTRAINT `fk_citap` FOREIGN KEY (`pac_id`) REFERENCES `paciente` (`pac_id`),
  ADD CONSTRAINT `fk_citar` FOREIGN KEY (`rec_id`) REFERENCES `recepcionista` (`rec_id`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `fk_historia_clinicap` FOREIGN KEY (`pac_id`) REFERENCES `paciente` (`pac_id`),
  ADD CONSTRAINT `fk_historia_clinicapr` FOREIGN KEY (`proc_id`) REFERENCES `procedimiento` (`proc_id`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medicom` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_pacientep` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_personap` FOREIGN KEY (`us_id`) REFERENCES `usuario` (`us_id`);

--
-- Filtros para la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD CONSTRAINT `fk_recepcionista` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fk_usuarior` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`),
  ADD CONSTRAINT `fk_usuariou` FOREIGN KEY (`us_id`) REFERENCES `usuario` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
