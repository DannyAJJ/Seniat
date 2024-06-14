-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2024 a las 19:13:55
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expendiobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacion_licores`
--

CREATE TABLE `autorizacion_licores` (
  `Numero_registro` int(11) NOT NULL,
  `Fecha_registro` varchar(10) NOT NULL,
  `Numero_autorizacion` varchar(10) NOT NULL,
  `Fecha_autorizacion` varchar(10) DEFAULT NULL,
  `Region` varchar(15) NOT NULL DEFAULT 'REGION CENTRAL',
  `Unidad` int(11) NOT NULL,
  `Razon_social` varchar(60) NOT NULL,
  `Numero_rif_solicitante` varchar(15) NOT NULL,
  `Direccion` text NOT NULL,
  `Autorizacion_ejerce` int(11) NOT NULL,
  `Clasificacion_indice_ejerce` int(11) NOT NULL,
  `Administrador_representante_legal` varchar(35) NOT NULL,
  `Nacionalidad` int(11) DEFAULT NULL,
  `Cedula_representante` varchar(15) NOT NULL,
  `Numero_rif_representante` varchar(15) NOT NULL,
  `Observaciones` text NOT NULL,
  `Firmante` int(11) NOT NULL,
  `Segunda_firma` int(11) NOT NULL,
  `Persona_juridica` tinyint(1) NOT NULL,
  `Grado_alcoholico` decimal(5,2) NOT NULL,
  `Materia_prima` varchar(80) NOT NULL,
  `Telefono_solicitante` varchar(20) NOT NULL,
  `Telefono_reprensentante` varchar(20) NOT NULL,
  `Direccion_representante_legal` text NOT NULL,
  `Habilitado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autorizacion_licores`
--

INSERT INTO `autorizacion_licores` (`Numero_registro`, `Fecha_registro`, `Numero_autorizacion`, `Fecha_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Clasificacion_indice_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Observaciones`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, `Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`) VALUES
(350, '27/05/2024', 'FC 00005', NULL, 'REGION CENTRAL', 1, 'CERBERCERIA CHURUATA', 'J-500333297', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', 1, 1, 'OSCAR ALFREDO ARELLANO DUARTE', 0, 'V21603439', 'V216034399', 'En un valle donde el sol acaricia las copas de los árboles y el viento susurra historias antiguas, se alza un pequeño pueblo lleno de color y vida. Sus habitantes, alegres y trabajadores, se dedican a la artesanía y la agricultura, cosechando los frutos que la tierra generosa les ofrece. La armonía entre la naturaleza y la comunidad se refleja en cada rincón, creando un mosaico de paz y belleza.', 1, 1, 0, '9.99', 'uvas', '04243567729', '0424-3567729', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacion_tabaco`
--

CREATE TABLE `autorizacion_tabaco` (
  `Numero_registro` int(11) NOT NULL,
  `Fecha_registro` varchar(10) NOT NULL,
  `Numero_autorizacion` varchar(10) NOT NULL,
  `Fecha_autorizacion` varchar(10) DEFAULT NULL,
  `Region` varchar(15) NOT NULL DEFAULT 'REGION CENTRAL',
  `Unidad` int(11) NOT NULL,
  `Razon_social` varchar(60) NOT NULL,
  `Numero_rif_solicitante` varchar(15) NOT NULL,
  `Direccion` text NOT NULL,
  `Autorizacion_ejerce` int(11) NOT NULL,
  `Clasificacion_indice_ejerce` int(11) NOT NULL,
  `Administrador_representante_legal` varchar(35) NOT NULL,
  `Nacionalidad` int(11) DEFAULT NULL,
  `Cedula_representante` varchar(15) NOT NULL,
  `Numero_rif_representante` varchar(15) NOT NULL,
  `Observaciones` text NOT NULL,
  `Firmante` int(11) NOT NULL,
  `Segunda_firma` int(11) NOT NULL,
  `Persona_juridica` tinyint(1) NOT NULL,
  `Materia_prima` varchar(80) NOT NULL,
  `Telefono_solicitante` varchar(20) NOT NULL,
  `Telefono_reprensentante` varchar(20) NOT NULL,
  `Direccion_representante_legal` text NOT NULL,
  `Habilitado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `Id_banco` int(11) NOT NULL,
  `Nombre_banco` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`Id_banco`, `Nombre_banco`) VALUES
(1, 'Banco de Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmantes`
--

CREATE TABLE `firmantes` (
  `Id_firmante` int(11) NOT NULL,
  `Nombre_ firmante` varchar(50) NOT NULL,
  `Segunda_linea` varchar(60) NOT NULL,
  `Tercera_linea` varchar(60) NOT NULL,
  `Cuarta_linea` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `firmantes`
--

INSERT INTO `firmantes` (`Id_firmante`, `Nombre_ firmante`, `Segunda_linea`, `Tercera_linea`, `Cuarta_linea`) VALUES
(1, 'FREDDY J. MARTINEZ G.', 'Gerente Regional de Tributos Internos Región Central', 'Providencia Nro. SNAT -2023-000062 del 01/09/2023', 'Gaceta Oficial Nro. 42.706 del 04/09/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovacion_licores`
--

CREATE TABLE `renovacion_licores` (
  `Constancia_renovacion` int(11) NOT NULL,
  `Fecha_renovacion` varchar(10) NOT NULL,
  `Fecha_expedicion` varchar(10) NOT NULL,
  `Numero_autorizacion` int(11) NOT NULL,
  `Banco` int(11) NOT NULL,
  `Fecha_pago` varchar(10) NOT NULL,
  `Forma16` varchar(20) NOT NULL,
  `Monto_cancelado` decimal(20,2) NOT NULL,
  `Proxima_renovacion` varchar(10) NOT NULL,
  `Primer_firmante` int(11) NOT NULL,
  `Segundo_firmante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segundo_firmante`
--

CREATE TABLE `segundo_firmante` (
  `Id_firmante` int(11) NOT NULL,
  `Texto_firmante` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `segundo_firmante`
--

INSERT INTO `segundo_firmante` (`Id_firmante`, `Texto_firmante`) VALUES
(1, 'RL/MR/yr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `Id_unidad` int(11) NOT NULL,
  `Unidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`Id_unidad`, `Unidad`) VALUES
(1, 'VALENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula_funcionario` varchar(15) NOT NULL,
  `Nombre_funcionario` varchar(40) NOT NULL,
  `Nivel_usuario` int(11) NOT NULL,
  `Unidad` int(11) NOT NULL,
  `Correo_institucional` varchar(40) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula_funcionario`, `Nombre_funcionario`, `Nivel_usuario`, `Unidad`, `Correo_institucional`, `Contraseña`) VALUES
('28249780', 'Danny', 3, 1, 'Dannyalejandro.jj@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizacion_licores`
--
ALTER TABLE `autorizacion_licores`
  ADD PRIMARY KEY (`Numero_registro`,`Numero_autorizacion`),
  ADD KEY `Firmante_autorizacion_licores` (`Firmante`),
  ADD KEY `Unidad_autorizacion_licores` (`Unidad`),
  ADD KEY `Segundo_firmante_autorizacion_licores` (`Segunda_firma`);

--
-- Indices de la tabla `autorizacion_tabaco`
--
ALTER TABLE `autorizacion_tabaco`
  ADD PRIMARY KEY (`Numero_registro`,`Numero_autorizacion`),
  ADD KEY `Firmante_autorizacion_licores` (`Firmante`),
  ADD KEY `Unidad_autorizacion_licores` (`Unidad`),
  ADD KEY `Segundo_firmante_autorizacion_licores` (`Segunda_firma`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`Id_banco`);

--
-- Indices de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  ADD PRIMARY KEY (`Id_firmante`);

--
-- Indices de la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  ADD PRIMARY KEY (`Constancia_renovacion`),
  ADD KEY `Renovacion_banco` (`Banco`),
  ADD KEY `Autorizacion_renovacion_licores` (`Numero_autorizacion`),
  ADD KEY `Firmantes_renovacion` (`Primer_firmante`),
  ADD KEY `Segundo_firmante_renovacion` (`Segundo_firmante`);

--
-- Indices de la tabla `segundo_firmante`
--
ALTER TABLE `segundo_firmante`
  ADD PRIMARY KEY (`Id_firmante`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`Id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula_funcionario`),
  ADD KEY `unidad_usuario` (`Unidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `Id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  MODIFY `Constancia_renovacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `segundo_firmante`
--
ALTER TABLE `segundo_firmante`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `Id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autorizacion_licores`
--
ALTER TABLE `autorizacion_licores`
  ADD CONSTRAINT `Firmante_autorizacion_licores` FOREIGN KEY (`Firmante`) REFERENCES `firmantes` (`Id_firmante`),
  ADD CONSTRAINT `Segundo_firmante_autorizacion_licores` FOREIGN KEY (`Segunda_firma`) REFERENCES `segundo_firmante` (`Id_firmante`),
  ADD CONSTRAINT `Unidad_autorizacion_licores` FOREIGN KEY (`Unidad`) REFERENCES `unidades` (`Id_unidad`);

--
-- Filtros para la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  ADD CONSTRAINT `Autorizacion_renovacion_licores` FOREIGN KEY (`Numero_autorizacion`) REFERENCES `autorizacion_licores` (`Numero_registro`),
  ADD CONSTRAINT `Firmantes_renovacion` FOREIGN KEY (`Primer_firmante`) REFERENCES `firmantes` (`Id_firmante`),
  ADD CONSTRAINT `Renovacion_banco` FOREIGN KEY (`Banco`) REFERENCES `bancos` (`Id_banco`),
  ADD CONSTRAINT `Segundo_firmante_renovacion` FOREIGN KEY (`Segundo_firmante`) REFERENCES `segundo_firmante` (`Id_firmante`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `unidad_usuario` FOREIGN KEY (`Unidad`) REFERENCES `unidades` (`Id_unidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
