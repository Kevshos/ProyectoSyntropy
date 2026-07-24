-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2026 a las 14:34:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `syntropy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE `camion` (
  `matricula` varchar(8) NOT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `capacidadCarga` int(11) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioncuadrilla`
--

CREATE TABLE `camioncuadrilla` (
  `ID_cuadrilla` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

CREATE TABLE `canton` (
  `ID_canton` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_acopio`
--

CREATE TABLE `centro_acopio` (
  `ID_acopio` int(11) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `tipoResiduo` varchar(100) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

CREATE TABLE `contenedor` (
  `ID_contenedor` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `capacidadCarga` int(11) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `calle` varchar(30) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `barrio` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrilla`
--

CREATE TABLE `cuadrilla` (
  `ID_cuadrilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga`
--

CREATE TABLE `descarga` (
  `ID_descarga` int(11) NOT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `ID_acopio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_residuos`
--

CREATE TABLE `envio_residuos` (
  `ID_envio` int(11) NOT NULL,
  `ID_acopio` int(11) DEFAULT NULL,
  `ID_vertedero` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiallogin`
--

CREATE TABLE `historiallogin` (
  `ID_Login` int(11) NOT NULL,
  `Estado` varchar(200) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historiallogin`
--

INSERT INTO `historiallogin` (`ID_Login`, `Estado`, `fecha`, `mail`) VALUES
(4, 'Exitoso', '2026-07-16 09:38:28', 'emietc@gmail.com'),
(5, 'Exitoso', '2026-07-16 09:51:52', NULL),
(6, 'Exitoso', '2026-07-16 09:51:58', NULL),
(7, 'Exitoso', '2026-07-16 09:53:30', NULL),
(8, 'Exitoso', '2026-07-16 09:53:39', NULL),
(9, 'Fallido - Cuenta pendiente', '2026-07-16 09:56:07', 'emietc@gmail.com'),
(10, 'Exitoso', '2026-07-16 09:59:24', 'emietc@gmail.com'),
(11, 'Exitoso', '2026-07-18 18:55:10', 'emietc@gmail.com'),
(12, 'Exitoso', '2026-07-18 18:58:27', 'emietc@gmail.com'),
(13, 'Exitoso', '2026-07-18 19:00:59', 'emietc@gmail.com'),
(14, 'Fallido - Cuenta pendiente', '2026-07-18 19:04:46', 'kcarballo625@gmail.com'),
(15, 'Exitoso', '2026-07-20 19:29:57', NULL),
(16, 'Exitoso', '2026-07-20 19:40:47', NULL),
(17, 'Exitoso', '2026-07-20 19:40:57', NULL),
(18, 'Exitoso', '2026-07-20 19:45:28', NULL),
(19, 'Exitoso', '2026-07-20 19:46:16', NULL),
(20, 'Exitoso', '2026-07-20 19:46:25', NULL),
(21, 'Exitoso', '2026-07-20 19:46:27', NULL),
(22, 'Exitoso', '2026-07-20 19:55:13', NULL),
(23, 'Exitoso', '2026-07-20 20:15:54', NULL),
(24, 'Fallido - Cuenta pendiente', '2026-07-20 20:31:32', 'nachotrullen@gmail.com'),
(25, 'Fallido - Cuenta pendiente', '2026-07-20 20:32:40', 'nachotrullen@gmail.com'),
(26, 'Fallido - Cuenta pendiente', '2026-07-20 20:33:49', 'nachotrullen@gmail.com'),
(27, 'Fallido - Cuenta pendiente', '2026-07-20 20:34:03', 'nachotrullen@gmail.com'),
(28, 'Fallido - Cuenta pendiente', '2026-07-20 20:38:43', 'nachotrullen@gmail.com'),
(29, 'Fallido - Cuenta pendiente', '2026-07-20 20:43:33', 'nachotrullen@gmail.com'),
(30, 'Fallido - Cuenta pendiente', '2026-07-20 20:43:56', 'nachotrullen@gmail.com'),
(31, 'Fallido - Cuenta pendiente', '2026-07-20 20:44:09', 'nachotrullen@gmail.com'),
(32, 'Exitoso', '2026-07-20 20:44:21', NULL),
(33, 'Fallido - Cuenta pendiente', '2026-07-20 20:52:26', 'nachotrullen@gmail.com'),
(34, 'Exitoso', '2026-07-20 20:52:34', NULL),
(35, 'Exitoso', '2026-07-20 20:54:28', NULL),
(36, 'Exitoso', '2026-07-20 20:56:59', 'nachotrullen@gmail.com'),
(37, 'Exitoso', '2026-07-23 10:37:27', NULL),
(38, 'Exitoso', '2026-07-23 10:38:31', NULL),
(39, 'Exitoso', '2026-07-23 15:52:28', NULL),
(40, 'Fallido - Cuenta pendiente', '2026-07-24 09:26:16', 'pedro@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `ID_incidencia` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ID_operario` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `imagen` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_cuadrilla`
--

CREATE TABLE `integrante_cuadrilla` (
  `ID_cuadrilla` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `ID_mantenimiento` int(11) NOT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recoleccion`
--

CREATE TABLE `recoleccion` (
  `ID_recoleccion` int(11) NOT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `ID_contenedor` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorrido`
--

CREATE TABLE `recorrido` (
  `ID_recorrido` int(11) NOT NULL,
  `ID_ruta` int(11) DEFAULT NULL,
  `ID_cuadrilla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `ID_registro` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(30) DEFAULT 'Pendiente',
  `mailAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`ID_registro`, `mail`, `fecha`, `estado`, `mailAdmin`) VALUES
(2, 'kcarballo625@gmail.com', '2026-07-18 19:04:32', 'Aceptado', NULL),
(3, 'gonzallovet@gmail.com', '2026-07-20 19:45:17', 'Aceptado', NULL),
(4, 'nachotrullen@gmail.com', '2026-07-20 20:15:45', 'Aceptado', NULL),
(5, 'aguslandin@gmail.com', '2026-07-20 20:28:41', 'Pendiente', NULL),
(6, 'laracasanova@gmail.com', '2026-07-20 20:29:14', 'Pendiente', NULL),
(7, 'francoalmiron@gmail.com', '2026-07-20 20:29:39', 'Pendiente', NULL),
(8, 'juanteper@gmail.com', '2026-07-23 10:38:21', 'Aceptado', NULL),
(9, 'pedro@gmail', '2026-07-24 09:25:24', 'Pendiente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `ID_ruta` int(11) NOT NULL,
  `horario` varchar(15) DEFAULT NULL,
  `direccionInicio` varchar(150) DEFAULT NULL,
  `direccionFinal` varchar(150) DEFAULT NULL,
  `recorridoKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutacanton`
--

CREATE TABLE `rutacanton` (
  `ID_ruta` int(11) DEFAULT NULL,
  `ID_canton` int(11) DEFAULT NULL,
  `tipo` enum('Inicia','Termina') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `a2f` tinyint(1) DEFAULT 0,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `rol` enum('Administrador','Operario','Recolector','Vecino') NOT NULL,
  `nickname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `mail`, `contrasena`, `a2f`, `estado`, `rol`, `nickname`) VALUES
('Agustina', 'Landin', 'aguslandin@gmail.com', '$2y$10$m6MJybdsj7EUGPXJeBYMm.DzRkqfbEm6VxsPBz60rIhB9XCUW/AEe', 0, 'Activo', 'Vecino', 'agus'),
('Emilia', 'Etchebarne', 'emietc@gmail.com', '$2y$10$nBuEGe9lkfGKpQLnnL00M.i/CtmhN9zYZNYT2iYoJc8gmmTDwrbLG', 0, 'Activo', 'Administrador', 'memi'),
('Franco', 'Almiron', 'francoalmiron@gmail.com', '$2y$10$og7x4RxPr3O/rdzpA60c4ut2sKRjrltOzcPCy3JHn0ziojcC89Sxi', 0, 'Activo', 'Vecino', 'franco'),
('Gonza', 'Llovet', 'gonzallovet@gmail.com', '$2y$10$ffKmrTCCRrVz4fv8Ekn/N.T0aV6Z97PcBEeh8oTZ3/OQo80j54l/a', 0, 'Activo', 'Vecino', 'gonzanmapa'),
('Juan', 'Teper', 'juanteper@gmail.com', '$2y$10$MmWiZTzKd5UtpikaKLeYUucbd47CvBlcQBtYNM65M4vc9.qldaGR.', 0, 'Activo', 'Vecino', 'jjuan'),
('Kevin', 'Carballo', 'kcarballo625@gmail.com', '$2y$10$kv2WHmqiAx/KCMrIoxjzQ.n8.gk/IGRqIRzqmA6JuMMpv9KRuVIqi', 0, 'Activo', 'Vecino', 'Quebin'),
('Lara', 'Casanova', 'laracasanova@gmail.com', '$2y$10$9J0Uw8mk6Ab32wW/eP5g1eqK9lw9thuwNVA8q6AHl864aOaZdhIWi', 0, 'Activo', 'Vecino', 'lara'),
('Nacho', 'tulle', 'nachotrullen@gmail.com', '$2y$10$5qhoIL6bIfdHpTjzYDm3k.K7gEpBCsjx2pxm58MINamvOtZ8bgtSi', 0, 'Activo', 'Vecino', 'nacho'),
('111111', 'gonza', 'pedro@gmail', '$2y$10$gCEAu946UirM.t.5g2L6SOuI9Q2ti.6kfPDgfuJTD.BzxwOMYZEp.', 0, 'Activo', 'Vecino', 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vertedero`
--

CREATE TABLE `vertedero` (
  `ID_vertedero` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `horario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `camioncuadrilla`
--
ALTER TABLE `camioncuadrilla`
  ADD PRIMARY KEY (`ID_cuadrilla`,`matricula`,`fecha`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`ID_canton`);

--
-- Indices de la tabla `centro_acopio`
--
ALTER TABLE `centro_acopio`
  ADD PRIMARY KEY (`ID_acopio`);

--
-- Indices de la tabla `contenedor`
--
ALTER TABLE `contenedor`
  ADD PRIMARY KEY (`ID_contenedor`);

--
-- Indices de la tabla `cuadrilla`
--
ALTER TABLE `cuadrilla`
  ADD PRIMARY KEY (`ID_cuadrilla`);

--
-- Indices de la tabla `descarga`
--
ALTER TABLE `descarga`
  ADD PRIMARY KEY (`ID_descarga`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `ID_acopio` (`ID_acopio`);

--
-- Indices de la tabla `envio_residuos`
--
ALTER TABLE `envio_residuos`
  ADD PRIMARY KEY (`ID_envio`),
  ADD KEY `ID_acopio` (`ID_acopio`),
  ADD KEY `ID_vertedero` (`ID_vertedero`);

--
-- Indices de la tabla `historiallogin`
--
ALTER TABLE `historiallogin`
  ADD PRIMARY KEY (`ID_Login`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`ID_incidencia`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `integrante_cuadrilla`
--
ALTER TABLE `integrante_cuadrilla`
  ADD PRIMARY KEY (`ID_cuadrilla`,`mail`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`ID_mantenimiento`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  ADD PRIMARY KEY (`ID_recoleccion`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `ID_contenedor` (`ID_contenedor`);

--
-- Indices de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD PRIMARY KEY (`ID_recorrido`),
  ADD KEY `ID_ruta` (`ID_ruta`),
  ADD KEY `ID_cuadrilla` (`ID_cuadrilla`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_registro`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`ID_ruta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`mail`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indices de la tabla `vertedero`
--
ALTER TABLE `vertedero`
  ADD PRIMARY KEY (`ID_vertedero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camioncuadrilla`
--
ALTER TABLE `camioncuadrilla`
  MODIFY `ID_cuadrilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canton`
--
ALTER TABLE `canton`
  MODIFY `ID_canton` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_acopio`
--
ALTER TABLE `centro_acopio`
  MODIFY `ID_acopio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenedor`
--
ALTER TABLE `contenedor`
  MODIFY `ID_contenedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuadrilla`
--
ALTER TABLE `cuadrilla`
  MODIFY `ID_cuadrilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descarga`
--
ALTER TABLE `descarga`
  MODIFY `ID_descarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envio_residuos`
--
ALTER TABLE `envio_residuos`
  MODIFY `ID_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiallogin`
--
ALTER TABLE `historiallogin`
  MODIFY `ID_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `ID_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `ID_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  MODIFY `ID_recoleccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  MODIFY `ID_recorrido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `ID_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vertedero`
--
ALTER TABLE `vertedero`
  MODIFY `ID_vertedero` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camioncuadrilla`
--
ALTER TABLE `camioncuadrilla`
  ADD CONSTRAINT `camioncuadrilla_ibfk_1` FOREIGN KEY (`ID_cuadrilla`) REFERENCES `cuadrilla` (`ID_cuadrilla`),
  ADD CONSTRAINT `camioncuadrilla_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`);

--
-- Filtros para la tabla `descarga`
--
ALTER TABLE `descarga`
  ADD CONSTRAINT `descarga_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`),
  ADD CONSTRAINT `descarga_ibfk_2` FOREIGN KEY (`ID_acopio`) REFERENCES `centro_acopio` (`ID_acopio`);

--
-- Filtros para la tabla `envio_residuos`
--
ALTER TABLE `envio_residuos`
  ADD CONSTRAINT `envio_residuos_ibfk_1` FOREIGN KEY (`ID_acopio`) REFERENCES `centro_acopio` (`ID_acopio`),
  ADD CONSTRAINT `envio_residuos_ibfk_2` FOREIGN KEY (`ID_vertedero`) REFERENCES `vertedero` (`ID_vertedero`);

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuario` (`mail`);

--
-- Filtros para la tabla `integrante_cuadrilla`
--
ALTER TABLE `integrante_cuadrilla`
  ADD CONSTRAINT `integrante_cuadrilla_ibfk_1` FOREIGN KEY (`ID_cuadrilla`) REFERENCES `cuadrilla` (`ID_cuadrilla`),
  ADD CONSTRAINT `integrante_cuadrilla_ibfk_2` FOREIGN KEY (`mail`) REFERENCES `usuario` (`mail`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`);

--
-- Filtros para la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  ADD CONSTRAINT `recoleccion_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`),
  ADD CONSTRAINT `recoleccion_ibfk_2` FOREIGN KEY (`ID_contenedor`) REFERENCES `contenedor` (`ID_contenedor`);

--
-- Filtros para la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD CONSTRAINT `recorrido_ibfk_1` FOREIGN KEY (`ID_ruta`) REFERENCES `ruta` (`ID_ruta`),
  ADD CONSTRAINT `recorrido_ibfk_2` FOREIGN KEY (`ID_cuadrilla`) REFERENCES `cuadrilla` (`ID_cuadrilla`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuario` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
