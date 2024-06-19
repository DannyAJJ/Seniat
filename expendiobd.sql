-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 21:28:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `Id_banco` int(11) NOT NULL,
  `Nombre_banco` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`Id_banco`, `Nombre_banco`) VALUES
(1, 'SETA'),
(2, 'SIARTEC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `Id_ciudad` int(11) NOT NULL,
  `Id_estado` int(11) NOT NULL,
  `Nombre_ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`Id_ciudad`, `Id_estado`, `Nombre_ciudad`) VALUES
(1, 1, 'VALENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_producto`
--

CREATE TABLE `clase_producto` (
  `Id` int(11) NOT NULL,
  `Nombre_producto` varchar(30) NOT NULL,
  `Clasificacion_indole` varchar(50) NOT NULL,
  `Siglas` varchar(5) NOT NULL,
  `Codigo_determinacion_impuesto` int(11) NOT NULL,
  `Impuesto_pvp` float NOT NULL,
  `Impuesto_produccion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase_producto`
--

INSERT INTO `clase_producto` (`Id`, `Nombre_producto`, `Clasificacion_indole`, `Siglas`, `Codigo_determinacion_impuesto`, `Impuesto_pvp`, `Impuesto_produccion`) VALUES
(1, 'CERVEZA', 'FABRICA DE CERVEZA', 'FB', 0, 0, 0),
(2, 'AGUARDIENTE', '', '', 0, 0, 0),
(3, 'AGUARDIENTE COMPUESTO', '', '', 0, 0, 0),
(4, 'PISCO', '', '', 0, 0, 0),
(5, 'CUCUY', '', '', 0, 0, 0),
(6, 'TEQUILA', '', '', 0, 0, 0),
(7, 'RON', '', '', 0, 0, 0),
(8, 'WISKEY', '', '', 0, 0, 0),
(9, 'GINEBRA', '', '', 0, 0, 0),
(10, 'VODKA', '', '', 0, 0, 0),
(11, 'BEBIDA ESPIRITUOSA SECA', '', '', 0, 0, 0),
(12, 'LICORES CORDIALES', '', '', 0, 0, 0),
(13, 'LICORES AMARGOS', '', '', 0, 0, 0),
(14, 'CREMA', '', '', 0, 0, 0),
(15, 'COKTEL', '', '', 0, 0, 0),
(16, 'PONCHE', '', '', 0, 0, 0),
(17, 'BEBIDAS CON SODA', '', '', 0, 0, 0),
(18, 'VINO', '', '', 0, 0, 0),
(19, 'SANGIA', '', '', 0, 0, 0),
(20, 'MISTELAS', '', '', 0, 0, 0),
(21, 'TABACO', '', '', 0, 0, 0),
(22, 'CHIMÓ', '', '', 0, 0, 0),
(23, 'PICADURA', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_produccion_licores`
--

CREATE TABLE `detalle_produccion_licores` (
  `Id_detalle` int(11) NOT NULL,
  `Id_liquidacion` int(11) NOT NULL,
  `Clase` int(11) NOT NULL,
  `Litrovr` float NOT NULL,
  `Frgl` float NOT NULL,
  `Litroaa` float NOT NULL,
  `Vaa` float NOT NULL,
  `Aa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pvp_licores`
--

CREATE TABLE `detalle_pvp_licores` (
  `Id_detalle` int(11) NOT NULL,
  `Id_liquidacion` int(11) NOT NULL,
  `Clase` int(11) NOT NULL,
  `Cantidad_envases` float NOT NULL,
  `Cap_env_litros` float NOT NULL,
  `Pvp_envases` float NOT NULL,
  `Litrosvr` float NOT NULL,
  `Total` float NOT NULL,
  `Porcentaje_sobre_pvp` float NOT NULL,
  `Impuesto_detalle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tabaco`
--

CREATE TABLE `detalle_tabaco` (
  `Marca` varchar(30) NOT NULL,
  `Unidad` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Pvp_bs` int(11) NOT NULL,
  `Venta` int(11) NOT NULL,
  `Impuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id_estado` int(11) NOT NULL,
  `Nombre_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`Id_estado`, `Nombre_estado`) VALUES
(1, 'CARABOBO');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `firmantes`
--

INSERT INTO `firmantes` (`Id_firmante`, `Nombre_ firmante`, `Segunda_linea`, `Tercera_linea`, `Cuarta_linea`) VALUES
(1, 'FREDDY J. MARTINEZ G.', 'Gerente Regional de Tributos Internos Región Central', 'Providencia Nro. SNAT -2023-000062 del 01/09/2023', 'Gaceta Oficial Nro. 42.706 del 04/09/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia_licores`
--

CREATE TABLE `licencia_licores` (
  `Numero_registro` int(11) NOT NULL,
  `Fecha_autorizacion` varchar(10) NOT NULL,
  `Numero_autorizacion` varchar(10) NOT NULL,
  `Region` varchar(15) NOT NULL DEFAULT 'REGION CENTRAL',
  `Unidad` int(11) NOT NULL,
  `Razon_social` varchar(60) NOT NULL,
  `Numero_rif_solicitante` varchar(15) NOT NULL,
  `Direccion` text NOT NULL,
  `Autorizacion_ejerce` varchar(50) NOT NULL DEFAULT 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS',
  `Administrador_representante_legal` varchar(35) NOT NULL,
  `Nacionalidad` int(11) DEFAULT NULL,
  `Cedula_representante` varchar(15) NOT NULL,
  `Numero_rif_representante` varchar(15) NOT NULL,
  `Firmante` int(11) NOT NULL,
  `Segunda_firma` int(11) NOT NULL,
  `Persona_juridica` tinyint(1) NOT NULL,
  `Grado_alcoholico` decimal(5,2) NOT NULL,
  `Materia_prima` varchar(80) NOT NULL,
  `Telefono_solicitante` varchar(20) NOT NULL,
  `Telefono_reprensentante` varchar(20) NOT NULL,
  `Direccion_representante_legal` text NOT NULL,
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `Correo_representante` varchar(25) NOT NULL,
  `N_inscripcion` int(11) NOT NULL,
  `Tomo` varchar(11) NOT NULL,
  `Oficina_resgistro_mercantil` varchar(40) NOT NULL,
  `Ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licencia_licores`
--

INSERT INTO `licencia_licores` (`Numero_registro`, `Fecha_autorizacion`, `Numero_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Grado_alcoholico`, `Materia_prima`, `Telefono_solicitante`, `Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`, `Correo_representante`, `N_inscripcion`, `Tomo`, `Oficina_resgistro_mercantil`, `Ciudad`) VALUES
(350, '27/05/2024', 'FC 00005', 'REGION CENTRAL', 1, 'CERBERCERIA CHURUATA', 'J-500333297', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', '1', 'OSCAR ALFREDO ARELLANO DUARTE', 0, 'V21603439', 'V216034399', 1, 1, 0, 9.99, 'uvas', '04243567729', '0424-3567729', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', 1, '0', 0, '0', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia_tabaco`
--

CREATE TABLE `licencia_tabaco` (
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
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `Correo_solicitante` varchar(25) NOT NULL,
  `N_inscripcion` int(11) NOT NULL,
  `Tomo` varchar(11) NOT NULL,
  `Oficina_resgistro_mercantil` varchar(40) NOT NULL,
  `Clase_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_licores`
--

CREATE TABLE `liquidacion_licores` (
  `Secuencial` int(11) NOT NULL,
  `N_liquidacion` int(11) NOT NULL,
  `Año` int(11) NOT NULL,
  `Licencia` varchar(10) NOT NULL,
  `Fecha_liquidacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_productos_licores`
--

CREATE TABLE `relacion_productos_licores` (
  `Id_producto` int(11) NOT NULL,
  `Id_licencia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `relacion_productos_licores`
--

INSERT INTO `relacion_productos_licores` (`Id_producto`, `Id_licencia`) VALUES
(1, 'FC 00005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_productos_tabaco`
--

CREATE TABLE `relacion_productos_tabaco` (
  `Id_licencia` varchar(10) NOT NULL,
  `Id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segundo_firmante`
--

CREATE TABLE `segundo_firmante` (
  `Id_firmante` int(11) NOT NULL,
  `Texto_firmante` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Contraseña` varchar(30) NOT NULL,
  `Username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula_funcionario`, `Nombre_funcionario`, `Nivel_usuario`, `Unidad`, `Correo_institucional`, `Contraseña`, `Username`) VALUES
('28249780', 'Danny', 3, 1, 'Dannyalejandro.jj@gmail.com', '1234', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`Id_banco`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Id_ciudad`),
  ADD KEY `Id_estado` (`Id_estado`);

--
-- Indices de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `detalle_produccion_licores`
--
ALTER TABLE `detalle_produccion_licores`
  ADD PRIMARY KEY (`Id_detalle`);

--
-- Indices de la tabla `detalle_pvp_licores`
--
ALTER TABLE `detalle_pvp_licores`
  ADD PRIMARY KEY (`Id_detalle`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`Id_estado`);

--
-- Indices de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  ADD PRIMARY KEY (`Id_firmante`);

--
-- Indices de la tabla `licencia_licores`
--
ALTER TABLE `licencia_licores`
  ADD PRIMARY KEY (`Numero_registro`) USING BTREE,
  ADD UNIQUE KEY `Numero_autorizacion` (`Numero_autorizacion`),
  ADD KEY `Firmante_autorizacion_licores` (`Firmante`),
  ADD KEY `Unidad_autorizacion_licores` (`Unidad`),
  ADD KEY `Segundo_firmante_autorizacion_licores` (`Segunda_firma`),
  ADD KEY `Ciudad` (`Ciudad`);

--
-- Indices de la tabla `licencia_tabaco`
--
ALTER TABLE `licencia_tabaco`
  ADD PRIMARY KEY (`Numero_registro`) USING BTREE,
  ADD UNIQUE KEY `Numero_autorizacion` (`Numero_autorizacion`),
  ADD KEY `Firmante_autorizacion_licores` (`Firmante`),
  ADD KEY `Unidad_autorizacion_licores` (`Unidad`),
  ADD KEY `Segundo_firmante_autorizacion_licores` (`Segunda_firma`);

--
-- Indices de la tabla `liquidacion_licores`
--
ALTER TABLE `liquidacion_licores`
  ADD PRIMARY KEY (`N_liquidacion`);

--
-- Indices de la tabla `relacion_productos_licores`
--
ALTER TABLE `relacion_productos_licores`
  ADD KEY `Id_licencia` (`Id_licencia`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `relacion_productos_tabaco`
--
ALTER TABLE `relacion_productos_tabaco`
  ADD KEY `Id_licencia` (`Id_licencia`),
  ADD KEY `Id_producto` (`Id_producto`);

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
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `unidad_usuario` (`Unidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `Id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `Id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detalle_produccion_licores`
--
ALTER TABLE `detalle_produccion_licores`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pvp_licores`
--
ALTER TABLE `detalle_pvp_licores`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `Id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `licencia_licores`
--
ALTER TABLE `licencia_licores`
  MODIFY `Numero_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT de la tabla `liquidacion_licores`
--
ALTER TABLE `liquidacion_licores`
  MODIFY `N_liquidacion` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`Id_estado`) REFERENCES `estados` (`Id_estado`);

--
-- Filtros para la tabla `licencia_licores`
--
ALTER TABLE `licencia_licores`
  ADD CONSTRAINT `Firmante_autorizacion_licores` FOREIGN KEY (`Firmante`) REFERENCES `firmantes` (`Id_firmante`),
  ADD CONSTRAINT `Segundo_firmante_autorizacion_licores` FOREIGN KEY (`Segunda_firma`) REFERENCES `segundo_firmante` (`Id_firmante`),
  ADD CONSTRAINT `Unidad_autorizacion_licores` FOREIGN KEY (`Unidad`) REFERENCES `unidades` (`Id_unidad`),
  ADD CONSTRAINT `licencia_licores_ibfk_1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudades` (`Id_ciudad`);

--
-- Filtros para la tabla `relacion_productos_licores`
--
ALTER TABLE `relacion_productos_licores`
  ADD CONSTRAINT `relacion_productos_licores_ibfk_1` FOREIGN KEY (`Id_licencia`) REFERENCES `licencia_licores` (`Numero_autorizacion`),
  ADD CONSTRAINT `relacion_productos_licores_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `clase_producto` (`Id`);

--
-- Filtros para la tabla `relacion_productos_tabaco`
--
ALTER TABLE `relacion_productos_tabaco`
  ADD CONSTRAINT `relacion_productos_tabaco_ibfk_1` FOREIGN KEY (`Id_licencia`) REFERENCES `licencia_tabaco` (`Numero_autorizacion`),
  ADD CONSTRAINT `relacion_productos_tabaco_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `clase_producto` (`Id`);

--
-- Filtros para la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  ADD CONSTRAINT `Autorizacion_renovacion_licores` FOREIGN KEY (`Numero_autorizacion`) REFERENCES `licencia_licores` (`Numero_registro`),
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
