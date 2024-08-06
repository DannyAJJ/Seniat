-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2024 a las 01:29:45
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
-- Estructura de tabla para la tabla `clase_producto`
--

CREATE TABLE `clase_producto` (
  `Id` int(11) NOT NULL,
  `Nombre_producto` varchar(30) NOT NULL,
  `Clasificacion_indole` varchar(50) NOT NULL,
  `Siglas` varchar(5) NOT NULL,
  `Codigo_impuesto_produccion` varchar(15) NOT NULL,
  `Codigo_impuesto_pvp` varchar(15) NOT NULL,
  `Impuesto_pvp` float NOT NULL,
  `Impuesto_produccion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase_producto`
--

INSERT INTO `clase_producto` (`Id`, `Nombre_producto`, `Clasificacion_indole`, `Siglas`, `Codigo_impuesto_produccion`, `Codigo_impuesto_pvp`, `Impuesto_pvp`, `Impuesto_produccion`) VALUES
(1, 'CERVEZA', 'FABRICA DE CERVEZA', 'FC', '3.01.02.03', '3.02.03.05', 0.15, 0.00135),
(2, 'ESPECIES Y BEBIDAS ALCOHÓLICAS', 'FABRICA DE BEBIDAS', 'FB', '3.01.02.03.02', '3.01.02.03.07', 0.5, 0.1215),
(3, 'SANGRÍA FERMENTADA', 'FABRICA DE VINOS', 'FV', '3.01.02.03.04', '3.02.03.05', 0.5, 0.00135),
(4, 'SANGRÍA ADICIÓN DE ALCOHOL', 'FABRICA DE VINOS', 'FV', '3.01.02.03.04', '3.02.03.05', 0.5, 0.081),
(5, 'VINO', 'FABRICA DE VINOS', 'FV', '3.01.02.03.04', '3.02.03.05', 0.35, 0.00135),
(6, 'TABACO', 'FABRICA DE TABACO', '', '', '', 0.7, 0);

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
  `Aa` float NOT NULL,
  `Total_detalle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_produccion_licores`
--

INSERT INTO `detalle_produccion_licores` (`Id_detalle`, `Id_liquidacion`, `Clase`, `Litrovr`, `Frgl`, `Litroaa`, `Aa`, `Total_detalle`) VALUES
(2, 1, 1, 12, 10, 112, 1234, 20),
(3, 1, 1, 44324, 3423, 342, 342, 343),
(4, 2, 1, 12, 10, 112, 1234, 600),
(5, 5, 2, 12, 10, 112, 1234, 500),
(6, 5, 2, 12, 10, 112, 1234, 50.5),
(7, 6, 2, 12, 10, 112, 1234, 50),
(13, 14, 2, 23, 2344, 539.12, 0.1215, 65.5),
(14, 15, 2, 25000, 30, 7500, 0.1215, 911.25),
(15, 15, 2, 3000, 25, 750, 0.1215, 91.13),
(16, 16, 5, 2320, 32, 742.4, 0.00135, 1),
(17, 16, 3, 32300, 33, 10659, 0.00135, 14.39),
(18, 16, 4, 4400, 25, 1100, 0.081, 89.1),
(19, 17, 3, 34442, 24, 8266.08, 0.00135, 11.16),
(20, 17, 5, 55553, 45, 24998.8, 0.00135, 33.75),
(21, 17, 4, 6666, 34, 2266.44, 0.081, 183.58),
(22, 18, 5, 23000, 21, 4830, 0.00135, 6.52),
(23, 18, 4, 3200, 23, 736, 0.081, 59.62),
(24, 18, 3, 340023, 24, 81605.5, 0.00135, 110.17),
(25, 19, 5, 34002, 23, 7820.46, 0.00135, 10.56),
(26, 19, 3, 234533, 24, 56287.9, 0.00135, 75.99),
(27, 19, 4, 689, 43, 296.27, 0.081, 24),
(28, 20, 1, 3440000, 18, 619200, 0.00135, 835.92),
(29, 21, 2, 34222, 55, 18822.1, 0.1215, 2286.89),
(30, 22, 2, 3235, 32, 1035.2, 0.1215, 125.78),
(31, 22, 2, 3244, 32, 1038.08, 0.1215, 126.13),
(32, 23, 2, 23333, 44, 10266.5, 0.1215, 1247.38),
(33, 24, 2, 22222, 34, 7555.48, 0.1215, 917.99),
(34, 25, 2, 343333, 42, 144200, 0.1215, 17520.3),
(35, 26, 1, 10000, 100, 10000, 0.00135, 13.5),
(36, 26, 1, 15000, 100, 15000, 0.00135, 20.25),
(37, 27, 2, 233333, 34, 79333.2, 0.1215, 9638.99),
(38, 28, 5, 23333, 32, 7466.56, 0.00135, 10.08);

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
  `Total_detalle` float NOT NULL,
  `Porcentaje_sobre_pvp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pvp_licores`
--

INSERT INTO `detalle_pvp_licores` (`Id_detalle`, `Id_liquidacion`, `Clase`, `Cantidad_envases`, `Cap_env_litros`, `Pvp_envases`, `Litrosvr`, `Total_detalle`, `Porcentaje_sobre_pvp`) VALUES
(1, 3, 1, 312, 12321, 3123, 123123, 123, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tabaco`
--

CREATE TABLE `detalle_tabaco` (
  `Marca` varchar(15) NOT NULL DEFAULT 'TABACO',
  `Id_detalle` int(11) NOT NULL,
  `Id_liquidacion` int(11) NOT NULL,
  `Unidad` float NOT NULL,
  `Cantidad` float NOT NULL,
  `Pvp_bs` float NOT NULL,
  `Venta` float NOT NULL,
  `Total_detalle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_tabaco`
--

INSERT INTO `detalle_tabaco` (`Marca`, `Id_detalle`, `Id_liquidacion`, `Unidad`, `Cantidad`, `Pvp_bs`, `Venta`, `Total_detalle`) VALUES
('TABACO', 1, 1, 212, 1231, 2342, 23432, 23424),
('TABACO', 2, 1, 1, 1231, 2342, 23432, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmantes`
--

CREATE TABLE `firmantes` (
  `Id_firmante` int(11) NOT NULL,
  `Nombre_firmante` varchar(50) NOT NULL,
  `Segunda_linea` varchar(60) NOT NULL,
  `Tercera_linea` varchar(60) NOT NULL,
  `Cuarta_linea` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `firmantes`
--

INSERT INTO `firmantes` (`Id_firmante`, `Nombre_firmante`, `Segunda_linea`, `Tercera_linea`, `Cuarta_linea`) VALUES
(1, 'FREDDY J. MARTINEZ G.', 'Gerente Regional de Tributos Internos Región Central', 'Providencia Nro. SNAT -2023-000062 del 01/09/2023', 'Gaceta Oficial Nro. 42.706 del 04/09/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmante_liquidacion`
--

CREATE TABLE `firmante_liquidacion` (
  `Id_firmante` int(11) NOT NULL,
  `Nombre_firmante` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `firmante_liquidacion`
--

INSERT INTO `firmante_liquidacion` (`Id_firmante`, `Nombre_firmante`) VALUES
(1, 'Ramón Lara'),
(2, 'Monica Rodríguez F.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia_licores`
--

CREATE TABLE `licencia_licores` (
  `Numero_registro` int(11) DEFAULT NULL,
  `Fecha_autorizacion` varchar(10) NOT NULL,
  `Numero_autorizacion` varchar(10) NOT NULL,
  `Region` varchar(15) DEFAULT 'REGION CENTRAL',
  `Unidad` int(11) NOT NULL,
  `Razon_social` varchar(60) NOT NULL,
  `Numero_cedula_solicitante` varchar(20) DEFAULT NULL,
  `Numero_rif_solicitante` varchar(15) NOT NULL,
  `Direccion` text DEFAULT NULL,
  `Autorizacion_ejerce` varchar(50) DEFAULT 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS',
  `Administrador_representante_legal` varchar(35) DEFAULT NULL,
  `Nacionalidad` tinyint(1) DEFAULT NULL,
  `Cedula_representante` varchar(15) DEFAULT NULL,
  `Numero_rif_representante` varchar(15) DEFAULT NULL,
  `Firmante` int(11) DEFAULT NULL,
  `Segunda_firma` int(11) DEFAULT NULL,
  `Persona_juridica` tinyint(1) DEFAULT NULL,
  `Materia_prima` varchar(80) DEFAULT NULL,
  `Telefono_solicitante` varchar(20) DEFAULT NULL,
  `Telefono_reprensentante` varchar(20) DEFAULT NULL,
  `Direccion_representante_legal` text DEFAULT NULL,
  `Habilitado` tinyint(1) DEFAULT 1,
  `Correo_representante` varchar(25) DEFAULT NULL,
  `N_inscripcion` int(11) DEFAULT NULL,
  `Tomo` varchar(11) DEFAULT NULL,
  `Oficina_resgistro_mercantil` varchar(40) DEFAULT NULL,
  `Grado_alcoholico` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licencia_licores`
--

INSERT INTO `licencia_licores` (`Numero_registro`, `Fecha_autorizacion`, `Numero_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_cedula_solicitante`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Materia_prima`, `Telefono_solicitante`, `Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`, `Correo_representante`, `N_inscripcion`, `Tomo`, `Oficina_resgistro_mercantil`, `Grado_alcoholico`) VALUES
(50, '23-11-2000', '010-E-0002', 'REGION CENTRAL', 1, 'INDUSTRIAS EL CARMEN, C.A.', '', 'J-6', 'ZONA INDUSTRIAL CARABOBO 8VA TRANSVERSAL PARCELAS Q3 Y Q4, VALENCIA EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'marco', 1, '29750553', 'J-87', 1, 1, 1, 'zapato', '04128914811', '2445', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 15, 'sdfd', 'casa de marco', 20.00),
(NULL, '24-09-1997', '010-FB-000', 'REGION CENTRAL', 1, 'INDUSTRIAL SERVIBOTTLE, C.A.', NULL, 'J-304076606', 'ZONA INDUSTRIAL CASTILLITO CALLE 100 ENTRE AV. 68 Y 70 SAN DIEGO EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '03-08-1999', '010-FC-FC-', 'REGION CENTRAL', 3, 'CERVECERIA REGIONAL C.A.', NULL, 'J-070003448', 'ZONA INDUSTRIAL SANTA ROSALIA AV. PRINCIPAL NORTE CAGUA EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '13-07-1989', '010-FV-000', 'REGION CENTRAL', 1, 'INDUSTRIAS EL CARMEN, C.A.', NULL, 'J-000195676', 'ZONA INDUSTRIAL CARABOBO 8VA TRANSVERSAL PARCELAS Q3 Y Q4, VALENCIA EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '20-01-1981', '010-FV-FV-', 'REGION CENTRAL', 3, 'INDUSTRIAS TRES CORONAS, C.A.', NULL, 'J-000196451', 'CARRETERA NACIONAL VILLA DE CURA-SAN FRANCISCO DE ASIS, SECTOR GUAYABAL, VILLA DE CURA EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '07-07-1982', '043-0009', 'REGION CENTRAL', 2, 'BODEGAS LUEDIAZ, C.A.', NULL, 'J-075045696', 'SAN VICENTE ZONA INDUSTRIAL 1 GALPON NRO 2, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '19-01-2021', 'AED-AE-18', 'REGION CENTRAL', 2, 'TOMADO, C.A.', NULL, 'J-314934856', 'AV. PRINCIPAL, CASA NRO 42 ZONA INDUSTRIAL COROPO, SECTOR SAN LUIS MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-05-1981', 'D-01', 'REGION CENTRAL', 4, 'RON SANTA TERESA C.A.', NULL, 'J-000325693', 'HACIENDA SANTA TERESA, EL CONSEJO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '03-07-1981', 'D-043-11', 'REGION CENTRAL', 2, 'CONSORCIO LICORERO NACIONAL, C.A.', NULL, 'J-075057538', 'AV. MARACAY NRO 15 ZONA INDUSTRIAL SAN VICENTE 1, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-11-2020', 'D-12', 'REGION CENTRAL', 4, 'CERVECERIA TOVAR, C.A.', NULL, 'J-306442537', 'SECTOR EL MOLINO ROJO S/N, COLONIA TOVAR, EDO ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '29-10-2018', 'D-5-043-00', 'REGION CENTRAL', 2, 'BODEGAS LUEDIAZ, C.A.', NULL, 'J-075045696', 'SAN VICENTE ZONA INDUSTRIAL 1 GALPON NRO 2, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-05-1981', 'DA-01', 'REGION CENTRAL', 4, 'RON SANTA TERESA C.A.', NULL, 'J-000325693', 'HACIENDA SANTA TERESA, EL CONSEJO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-05-1981', 'E-02', 'REGION CENTRAL', 4, 'RON SANTA TERESA C.A.', NULL, 'J-000325693', 'HACIENDA SANTA TERESA, EL CONSEJO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '03-07-1981', 'E-043-0005', 'REGION CENTRAL', 2, 'BODEGAS LUEDIAZ, C.A.', NULL, 'J-075045696', 'SAN VICENTE ZONA INDUSTRIAL 1 GALPON NRO 2, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '31-12-2019', 'E-05', 'REGION CENTRAL', 4, 'LANDER & VERA, S.A.', NULL, 'J-000217084', 'AV.PRINCIPAL OESTE, LA MORA, MANZANA 1, PARCELA NOR. 2, LA VICTORIA EDO. ARAGUA.', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '12-06-2020', 'E-07', 'REGION CENTRAL', 3, 'DISAVICAR, C.A.', NULL, 'J-405450576', 'CALLE OESTE II, PROLONGACION AV. ARAGUA GALPON 6 ACENTAMIENTO CAMPESINO LA MORITA I, TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-11-2020', 'E-14', 'REGION CENTRAL', 4, 'CERVECERIA TOVAR, C.A.', NULL, 'J-306442537', 'SECTOR EL MOLINO ROJO S/N, COLONIA TOVAR, EDO ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(6554, '10-07-2024', 'FB-0000', 'REGION CENTRAL', 1, 'Marilucy Jardim', NULL, 'J-3', 'addw', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '324', 'j-4', 1, 1, 0, 'zapato', '04128914811', '2434', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23, 'das', 'casa de marco', 20.00),
(6541, '10-05-1200', 'FB-00002', 'REGION CENTRAL', 2, 'empresita', NULL, 'J-500333223', 'unadireccio n', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'OSCAR ALFREDO ARELLANO DUARTE', 1, 'dsds', 'dasda', 1, 1, 1, 'cana', '234234', '23113', 'otradirecion', 1, 'dsadasda', 45347, 'text', 'texto', 0.00),
(6553, '01-07-2024', 'FB-00004', 'REGION CENTRAL', 1, 'emp', NULL, 'J-4', 'sadas', 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO', 'Marilucy', NULL, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '34224', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 324, 'hola', 'casa de marco', 90.00),
(NULL, '27-02-2018', 'FB-001', 'REGION CENTRAL', 2, 'TOMADO, C.A.', NULL, 'J-314934856', 'AV. PRINCIPAL, CASA NRO 42 ZONA INDUSTRIAL COROPO, SECTOR SAN LUIS MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-03-2018', 'FB-002', 'REGION CENTRAL', 3, 'INDUSTRIAS TRES CORONAS, C.A.', NULL, 'J-000196451', 'CARRETERA NACIONAL VILLA DE CURA-SAN FRANCISCO DE ASIS, SECTOR GUAYABAL, VILLA DE CURA EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-05-1981', 'FB-02', 'REGION CENTRAL', 4, 'RON SANTA TERESA C.A.', NULL, 'J-000325693', 'HACIENDA SANTA TERESA, EL CONSEJO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '08-07-1981', 'FB-04', 'REGION CENTRAL', 4, 'LANDER & VERA, S.A.', NULL, 'J-000217084', 'AV.PRINCIPAL OESTE, LA MORA, MANZANA 1, PARCELA NOR. 2, LA VICTORIA EDO. ARAGUA.', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '07-07-1981', 'FB-043-000', 'REGION CENTRAL', 2, 'BODEGAS LUEDIAZ, C.A.', NULL, 'J-075045696', 'SAN VICENTE ZONA INDUSTRIAL 1 GALPON NRO 2, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '03-07-1981', 'FB-043-001', 'REGION CENTRAL', 2, 'CONSORCIO LICORERO NACIONAL, C.A.', NULL, 'J-075057538', 'AV. MARACAY NRO 15 ZONA INDUSTRIAL SAN VICENTE 1, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '07-10-2004', 'FB-044-24', 'REGION CENTRAL', 3, 'INDUSTRIAS CASA TURMERO, C.A.', NULL, 'J-310561370', 'ZONA INDUSTRIAL SAN PABLO, AV. PRINCIPAL GALPON 31-A, TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-11-2020', 'FB-13', 'REGION CENTRAL', 4, 'CERVECERIA TOVAR, C.A.', NULL, 'J-306442537', 'SECTOR EL MOLINO ROJO S/N, COLONIA TOVAR, EDO ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '17-05-2021', 'FB-20', 'REGION CENTRAL', 1, 'INDUSTRIAS PAMPARITO, C.A.', NULL, 'J-500866453', 'AV. LA HONDA, CRUCE CON CALLE LOS MAGALLANES, LOCAL GALPON NRO. 17 SECTOR BANCO OBRERO, TOCUYITO EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '17-05-2021', 'FB-21', 'REGION CENTRAL', 3, 'INVERSIONES INOVA 2020, C.A.', NULL, 'J-411182575', 'AV. PICHINCHA ENTRE CALLE BOYACA Y CALLE AYACUCHO, SECTOR CENTRO CAGUA EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '27-10-2021', 'FB-27', 'REGION CENTRAL', 1, 'LICORES CAMPANIA, C.A.', NULL, 'J-410534133', 'AV. MIRANDA SECTOR FRANCISCO DE MIRANDA MONTALBAN, EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-07-2022', 'FB-30', 'REGION CENTRAL', 2, 'CONSORCIO LICORERO DEL CENTRO GMA, C.A.', NULL, 'J-501567778', 'CALLE COLOMBIA, CASA NRO. 120 SECTOR CENTRO SAN MATEO, EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(6555, '10-07-2024', 'FB-31', 'REGION CENTRAL', 1, 'Marilucy Jardim', NULL, 'J-3', 'addw', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '324', 'J-4', 1, 1, 0, 'zapato', '04128914811', '2131', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 2, 'sdfd', 'shdf', 90.00),
(NULL, '13-08-2019', 'FBD-001-19', 'REGION CENTRAL', 2, 'INDUSTRIAS C & CJR, C.A.', NULL, 'J-412727931', 'AV. PRINCIPAL LOS JABILLOS, CRUCE CON CALLEJON GERARDO PEREZ NRO. 62, BARRIO VALLECITO, SANTA RITA, MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '06-11-2018', 'FBE-001', 'REGION CENTRAL', 2, 'TOMADO, C.A.', NULL, 'J-314934856', 'AV. PRINCIPAL, CASA NRO 42 ZONA INDUSTRIAL COROPO, SECTOR SAN LUIS MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '07-10-2019', 'FBE-001-19', 'REGION CENTRAL', 3, 'GUARAPOS VENEZOLANOS GUVENCA, C.A.', NULL, 'J-3078883316', 'AV. INTERCOMUNAL S/LA PROVIDENCIA, PARCELA NRO 1; G-2. TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '10-06-2019', 'FBE-006', 'REGION CENTRAL', 2, 'RONES AÑEJOS DE VENEZUELA, C.A.', NULL, 'J-309974718', 'CALLE PICHINCHA, ENTRE AV. BOLIVAR Y AV. MIRANDA GALPON NRO 22, SECTOR CENTRO DE MARACAY, EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-05-2017', 'FBFC-001', 'REGION CENTRAL', 4, 'CERVECENTRO, C.A.', NULL, 'J-403013136', 'CALLE SUR CON CALLE ESTE, ZONA INDUSTRIAL SOCO, LA VICTORIA EDO, ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(6545, '26-06-2024', 'FC 00001', 'REGION CENTRAL', 1, 'Marilucy Jardim', NULL, 'J-1', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '12313', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 3141, 'DFADF', 'casa de marco', 0.00),
(350, '27-05-2024', 'FC 00005', 'REGION CENTRAL', 1, 'CERBERCERIA CHURUATA', NULL, 'J-500333297', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', '1', 'OSCAR ALFREDO ARELLANO DUARTE', 0, 'V21603439', 'V216034399', 1, 1, 0, 'uvas', '04243567729', '0424-3567729', 'CALLE LAS ROSAS LOCAL NRO 135 URB LAS ROSAS EL CONSEJO EDO ARAGUA', 1, '0', 0, '0', '0', 0.00),
(6549, '26-06-2024', 'FC 00006', 'REGION CENTRAL', 1, 'camisa cerveza', NULL, 'J-3', 'sadas', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '221312', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23123, 'hola', 'casa de marco', 0.00),
(6550, '26-06-2024', 'FC 00007', 'REGION CENTRAL', 1, 'camisa cervezaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaa', NULL, 'J-2', 'sadas', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '312312', 'J-12', 1, 1, 2, 'zapato', '04128914811', '324234', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 213, 'hola', 'casa de marco', 0.00),
(6548, '26-06-2024', 'FC-00002', 'REGION CENTRAL', 1, 'camisa cerveza', NULL, 'J-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '221312', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23123, 'hola', 'casa de marco', 0.00),
(6552, '27-06-2024', 'FC-00008', 'REGION CENTRAL', 1, 'Marilucy Jardim', NULL, 'J-4', 'sadas', 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO', 'Marilucy', 1, '312312', 'J-12', 1, 1, 0, 'zapato', '04128914811', '3242', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23234, 'sdfd', 'casa de marco', 90.00),
(NULL, '13-06-2000', 'FC-044-002', 'REGION CENTRAL', 4, 'CERVECERIA TOVAR, C.A.', NULL, 'J-306442537', 'SECTOR EL MOLINO ROJO S/N, COLONIA TOVAR, EDO ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '29-11-2023', 'FD-03', 'REGION CENTRAL', 1, 'INVERSIONES LICORES VENEZUELA 2019, C.A.', NULL, 'J-412717405', 'VIA PRINCIPAL FLOR AMARILLO, C.C. OASIS LOCAL N/A, GALPON 40, VALENCIA EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '12-06-2020', 'FD-05', 'REGION CENTRAL', 3, 'DISAVICAR, C.A.', NULL, 'J-405450576', 'CALLE OESTE II, PROLONGACION AV. ARAGUA GALPON 6 ACENTAMIENTO CAMPESINO LA MORITA I, TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '13-10-2020', 'FD-09', 'REGION CENTRAL', 1, 'INDUSTRIAS MONTE CARMELO, C.A.', NULL, 'J-500262191', ' CALLE LAS MARGARITAS AL FINAL COMPLEJO INDUSTRIAL VEPYNCA, GALPON 3 LOCAL NRO. 3 SECTOR MIRANDA, MIRANDA EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(6551, '26-06-2024', 'FV-00003', 'REGION CENTRAL', 1, 'camisa cerveza', NULL, 'J-3', 'efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf efafafafqwf ', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '221312', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23123, 'hola', 'casa de marco', 0.00),
(NULL, '07-10-2019', 'FV-001', 'REGION CENTRAL', 3, 'GUARAPOS VENEZOLANOS GUVENCA, C.A.', NULL, 'J-3078883316', 'AV. INTERCOMUNAL S/LA PROVIDENCIA, PARCELA NRO 1; G-2. TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '08-07-1981', 'FV-02', 'REGION CENTRAL', 4, 'LANDER & VERA, S.A.', NULL, 'J-000217084', 'AV.PRINCIPAL OESTE, LA MORA, MANZANA 1, PARCELA NOR. 2, LA VICTORIA EDO. ARAGUA.', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '27-09-2021', 'FV-26', 'REGION CENTRAL', 1, 'CERVECERIA POLAR, C.A.', NULL, 'J-000063729', 'CARRETERA NACIONAL PANAMERICANA SAN JOAQUIN, EDO CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '15-08-2022', 'FV-31', 'REGION CENTRAL', 3, 'INVERSIONES INOVA 2020, C.A.', NULL, 'J-411182575', 'AV. PICHINCHA ENTRE CALLE BOYACA Y CALLE AYACUCHO, SECTOR CENTRO CAGUA EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '16-09-2023', 'FV-32', 'REGION CENTRAL', 1, 'INVERSIONES LICORES VENEZUELA 2019, C.A.', NULL, 'J-412717405', 'VIA PRINCIPAL FLOR AMARILLO, C.C. OASIS LOCAL N/A, GALPON 40, VALENCIA EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '18-10-2022', 'FV-33', 'REGION CENTRAL', 2, 'TOMADO, C.A.', NULL, 'J-314934856', 'AV. PRINCIPAL, CASA NRO 42 ZONA INDUSTRIAL COROPO, SECTOR SAN LUIS MARACAY EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(52, '15-11-2022', 'FV-34', 'REGION CENTRAL', 1, 'INDUSTRIAL SERVIBOTTLE, C.A.', '', 'Distribuidora E', 'ZONA INDUSTRIAL CASTILLITO CALLE 100 ENTRE AV. 68 Y 70 SAN DIEGO EDO. CARABOBO', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', 'Marilucy', 1, '4334', '434', 1, 1, 1, '4334', '2232', '3443', '434', 1, 'marilucy.jardim@hotmail.c', 3232, '2323', '443', 999.99),
(NULL, '28-11-2022', 'FV-35', 'REGION CENTRAL', 4, 'CONSORCIO LICORERO ALTU, C.A.', NULL, 'J-501798141', 'CALLE APARICION, LOCAL 87 SECTOR CENTRO SAN MATEO, EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '24-01-2023', 'FV-36', 'REGION CENTRAL', 3, 'DISAVICAR, C.A.', NULL, 'J-405450576', 'CALLE OESTE II, PROLONGACION AV. ARAGUA GALPON 6 ACENTAMIENTO CAMPESINO LA MORITA I, TURMERO EDO. ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '28-03-2023', 'FV-37', 'REGION CENTRAL', 4, 'CERVECERIA TOVAR, C.A.', NULL, 'J-306442537', 'SECTOR EL MOLINO ROJO S/N, COLONIA TOVAR, EDO ARAGUA', 'INDUSTRIA DE ALCOHOL Y ESPECIES ALCOHOLICAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia_tabaco`
--

CREATE TABLE `licencia_tabaco` (
  `Numero_registro` int(11) NOT NULL,
  `Fecha_autorizacion` varchar(10) NOT NULL,
  `Numero_autorizacion` int(11) NOT NULL,
  `Region` varchar(15) NOT NULL DEFAULT 'REGION CENTRAL',
  `Unidad` int(11) NOT NULL,
  `Razon_social` varchar(60) NOT NULL,
  `Numero_rif_solicitante` varchar(15) NOT NULL,
  `Direccion` text NOT NULL,
  `Autorizacion_ejerce` varchar(50) NOT NULL DEFAULT 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO',
  `Administrador_representante_legal` varchar(35) NOT NULL,
  `Nacionalidad` int(11) DEFAULT NULL,
  `Cedula_representante` varchar(15) NOT NULL,
  `Numero_rif_representante` varchar(15) NOT NULL,
  `Firmante` int(11) NOT NULL,
  `Segunda_firma` int(11) NOT NULL,
  `Persona_juridica` tinyint(1) NOT NULL,
  `Materia_prima` varchar(80) NOT NULL,
  `Telefono_solicitante` varchar(20) NOT NULL,
  `Telefono_reprensentante` varchar(20) NOT NULL,
  `Direccion_representante_legal` text NOT NULL,
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `Correo_representante` varchar(25) NOT NULL,
  `N_inscripcion` int(11) NOT NULL,
  `Tomo` varchar(11) NOT NULL,
  `Oficina_resgistro_mercantil` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licencia_tabaco`
--

INSERT INTO `licencia_tabaco` (`Numero_registro`, `Fecha_autorizacion`, `Numero_autorizacion`, `Region`, `Unidad`, `Razon_social`, `Numero_rif_solicitante`, `Direccion`, `Autorizacion_ejerce`, `Administrador_representante_legal`, `Nacionalidad`, `Cedula_representante`, `Numero_rif_representante`, `Firmante`, `Segunda_firma`, `Persona_juridica`, `Materia_prima`, `Telefono_solicitante`, `Telefono_reprensentante`, `Direccion_representante_legal`, `Habilitado`, `Correo_representante`, `N_inscripcion`, `Tomo`, `Oficina_resgistro_mercantil`) VALUES
(1, '27-06-2024', 2, 'REGION CENTRAL', 1, 'marilucy tabacos', 'J-4', 'sadas', 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO', 'Marilucy', 1, '312312', 'J-12', 1, 1, 1, 'zapato', '04128914811', '3442', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 213, 'pdfa', 'casa de marco'),
(2, '27-06-2024', 3, 'REGION CENTRAL', 1, 'empresa juju martes', 'j-5', 'la casa de gabriel con techo', 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO', 'marco', 1, '29750553', 'j-30', 1, 1, 0, 'techos', '04124456784', '02415568944', 'la casa de gabriel en el techo', 1, 'marilucy.jardim@hotmail.c', 230948, 'jeje', 'shdf'),
(3, '01-07-2024', 4, 'REGION CENTRAL', 1, 'Marilucy Jardim', 'J-4', 'aasd', 'FABRICA DE CIGARRIOS Y MANUFACTURA DE TABACO', 'Marilucy', 1, '312312', 'J-12', 1, 1, 0, 'techos', '04128914811', '3323', 'Calle 1 con Calle 2 Sector 1 Caña de Azúcar', 1, 'marilucy.jardim@hotmail.c', 23, 'fsfa', 'shdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_licores`
--

CREATE TABLE `liquidacion_licores` (
  `Secuencial` int(11) NOT NULL,
  `N_liquidacion` int(11) NOT NULL,
  `Licencia` varchar(10) NOT NULL,
  `Fecha_liquidacion` varchar(10) NOT NULL,
  `Numero_manfiesto` varchar(10) NOT NULL,
  `Fecha_manifiesto` varchar(10) NOT NULL,
  `Firmante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liquidacion_licores`
--

INSERT INTO `liquidacion_licores` (`Secuencial`, `N_liquidacion`, `Licencia`, `Fecha_liquidacion`, `Numero_manfiesto`, `Fecha_manifiesto`, `Firmante`) VALUES
(1, 1, 'FC-00008', '03-07-2024', '12', '', 1),
(2, 2, 'FC-00008', '03-07-2024', '12', '', 1),
(3, 3, 'FC-00008', '03-07-2024', '11', '', 2),
(4, 4, 'FB-00004', '03-07-2024', '12', '03-07-2024', 1),
(5, 5, 'FB-00004', '03-08-2024', '11', '03-07-2024', 2),
(6, 6, 'FB-00004', '03-08-2025', '12', '03-07-2024', 2),
(1, 7, 'FB-00004', '18-07-2024', '34', '19-07-2024', 2),
(1, 8, 'FB-00004', '18-07-2024', '35', '20-07-2024', 2),
(1, 9, 'FB-00004', '18-07-2024', '36', '19-07-2024', 2),
(6, 10, 'FB-00004', '18-07-2024', '36', '19-07-2024', 2),
(7, 11, 'FB-00004', '18-07-2024', '38', '18-07-2024', 1),
(8, 12, 'FB-00004', '18-07-2024', '38', '18-07-2024', 1),
(9, 13, 'FB-00004', '18-07-2024', '39', '18-07-2024', 1),
(10, 14, 'FB-00004', '18-07-2024', '55', '19-07-2024', 1),
(11, 15, 'FB-00004', '18-07-2024', '40', '21-07-2024', 1),
(12, 16, 'FV-00003', '18-07-2024', '2', '19-07-2024', 2),
(13, 17, 'FV-00003', '18-07-2024', '3', '20-07-2024', 1),
(14, 18, 'FV-00003', '18-07-2024', '4', '19-07-2024', 1),
(15, 19, 'FV-00003', '18-07-2024', '5', '20-07-2024', 1),
(16, 20, 'FC-00008', '18-07-2024', '23', '19-07-2024', 2),
(17, 21, 'FB-00004', '18-07-2024', '2', '13-07-2024', 2),
(18, 22, 'FB-00004', '18-07-2024', '1', '13-07-2024', 1),
(19, 23, 'FB-00004', '18-07-2024', '2', '12-07-2024', 2),
(20, 24, 'FB-00004', '18-07-2024', '1', '20-07-2024', 2),
(21, 25, 'FB-00004', '18-07-2024', '2', '12-07-2024', 1),
(22, 26, 'FC-00002', '18-07-2024', '1', '18-07-2024', 1),
(23, 27, 'FB-13', '18-07-2024', '5', '18-07-2024', 1),
(24, 28, 'FV-00003', '22-07-2024', '23', '18-07-2024', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_tabaco`
--

CREATE TABLE `liquidacion_tabaco` (
  `Secuencial` int(11) NOT NULL,
  `N_liquidacion` int(11) NOT NULL,
  `Licencia` int(11) NOT NULL,
  `Fecha_liquidacion` varchar(10) NOT NULL,
  `Firmante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liquidacion_tabaco`
--

INSERT INTO `liquidacion_tabaco` (`Secuencial`, `N_liquidacion`, `Licencia`, `Fecha_liquidacion`, `Firmante`) VALUES
(4, 1, 2, '03-07-2024', 2);

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
(1, 'FC 00005'),
(1, 'FC-00008'),
(2, 'FB-00004'),
(5, 'FV-00003'),
(3, 'FV-00003'),
(4, 'FV-00003'),
(1, 'FC-00002'),
(2, 'FB-13'),
(1, '010-E-0002'),
(3, 'FV-34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_productos_tabaco`
--

CREATE TABLE `relacion_productos_tabaco` (
  `Id_licencia` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Denominacion_producto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `relacion_productos_tabaco`
--

INSERT INTO `relacion_productos_tabaco` (`Id_licencia`, `Id_producto`, `Denominacion_producto`) VALUES
(2, 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovacion_licores`
--

CREATE TABLE `renovacion_licores` (
  `Id_renovacion` int(11) NOT NULL,
  `Constancia_renovacion` int(11) NOT NULL,
  `Numero_autorizacion` varchar(10) NOT NULL,
  `Fecha_renovacion` varchar(10) NOT NULL,
  `Banco` int(11) NOT NULL,
  `Fecha_pago` varchar(10) NOT NULL,
  `Forma16` varchar(20) NOT NULL,
  `Monto_cancelado` decimal(20,2) NOT NULL,
  `Proxima_renovacion` varchar(10) NOT NULL,
  `Primer_firmante` int(11) NOT NULL,
  `Segundo_firmante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `renovacion_licores`
--

INSERT INTO `renovacion_licores` (`Id_renovacion`, `Constancia_renovacion`, `Numero_autorizacion`, `Fecha_renovacion`, `Banco`, `Fecha_pago`, `Forma16`, `Monto_cancelado`, `Proxima_renovacion`, `Primer_firmante`, `Segundo_firmante`) VALUES
(2, 4, 'FC-00008', '10/08/2024', 1, '10/08/2024', 'asdsda', 20.40, '10/08/2025', 1, 1),
(3, 5, 'FC-00008', '10/08/2023', 1, '10/08/2024', 'asdsda', 20.40, '10/08/2026', 1, 1),
(4, 84, 'FC-00004', '10/08/2024', 1, '10/08/2024', 'asdsda', 20.40, '10/08/2023', 1, 1),
(7, 85, 'FB-00004', '11-07-2024', 1, '2024-07-11', 'sdfaaefaf', 12.00, '11-07-2025', 1, 1),
(8, 86, 'FB-00004', '11-07-2024', 2, '2024-07-11', 'sdfaaefaf', 12.00, '11-07-2025', 1, 1);

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
(1, 'VALENCIA'),
(2, 'MARACAY'),
(3, 'CAGUA'),
(4, 'LA VICTORIA'),
(5, 'SAN CARLOS'),
(6, 'TINAQUILLO');

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
('', 'Gabriel', 1, 2, 'gabrielcorreo', '1234', 'Gabriel'),
('28249780', 'Danny', 3, 1, 'Dannyalejandro.jj@gmail.com', '1234', 'DAJardim'),
('28249781', 'Marco Antonio Herrera', 2, 1, 'marcocorreo', '4321', 'MAHerrera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`Id_banco`);

--
-- Indices de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `detalle_produccion_licores`
--
ALTER TABLE `detalle_produccion_licores`
  ADD PRIMARY KEY (`Id_detalle`),
  ADD KEY `Id_liquidacion` (`Id_liquidacion`),
  ADD KEY `detalle_produccion_licores_ibfk_2` (`Clase`);

--
-- Indices de la tabla `detalle_pvp_licores`
--
ALTER TABLE `detalle_pvp_licores`
  ADD PRIMARY KEY (`Id_detalle`),
  ADD KEY `Id_liquidacion` (`Id_liquidacion`),
  ADD KEY `Clase` (`Clase`);

--
-- Indices de la tabla `detalle_tabaco`
--
ALTER TABLE `detalle_tabaco`
  ADD PRIMARY KEY (`Id_detalle`),
  ADD KEY `Id_liquidacion` (`Id_liquidacion`);

--
-- Indices de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  ADD PRIMARY KEY (`Id_firmante`);

--
-- Indices de la tabla `firmante_liquidacion`
--
ALTER TABLE `firmante_liquidacion`
  ADD PRIMARY KEY (`Id_firmante`);

--
-- Indices de la tabla `licencia_licores`
--
ALTER TABLE `licencia_licores`
  ADD PRIMARY KEY (`Numero_autorizacion`),
  ADD KEY `Firmante_autorizacion_licores` (`Firmante`),
  ADD KEY `Unidad_autorizacion_licores` (`Unidad`),
  ADD KEY `Segundo_firmante_autorizacion_licores` (`Segunda_firma`);

--
-- Indices de la tabla `licencia_tabaco`
--
ALTER TABLE `licencia_tabaco`
  ADD PRIMARY KEY (`Numero_autorizacion`),
  ADD KEY `Unidad` (`Unidad`),
  ADD KEY `Firmante` (`Firmante`),
  ADD KEY `Segunda_firma` (`Segunda_firma`);

--
-- Indices de la tabla `liquidacion_licores`
--
ALTER TABLE `liquidacion_licores`
  ADD PRIMARY KEY (`N_liquidacion`),
  ADD KEY `Licencia` (`Licencia`),
  ADD KEY `Firmante` (`Firmante`);

--
-- Indices de la tabla `liquidacion_tabaco`
--
ALTER TABLE `liquidacion_tabaco`
  ADD PRIMARY KEY (`N_liquidacion`),
  ADD KEY `Licencia` (`Licencia`),
  ADD KEY `Firmante` (`Firmante`);

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
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `relacion_productos_tabaco_ibfk_4` (`Id_licencia`);

--
-- Indices de la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  ADD PRIMARY KEY (`Id_renovacion`),
  ADD KEY `Numero_autorizacion` (`Numero_autorizacion`),
  ADD KEY `c` (`Banco`),
  ADD KEY `a` (`Primer_firmante`),
  ADD KEY `b` (`Segundo_firmante`);

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
-- AUTO_INCREMENT de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detalle_produccion_licores`
--
ALTER TABLE `detalle_produccion_licores`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `detalle_pvp_licores`
--
ALTER TABLE `detalle_pvp_licores`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_tabaco`
--
ALTER TABLE `detalle_tabaco`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `firmantes`
--
ALTER TABLE `firmantes`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `firmante_liquidacion`
--
ALTER TABLE `firmante_liquidacion`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `licencia_tabaco`
--
ALTER TABLE `licencia_tabaco`
  MODIFY `Numero_autorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `liquidacion_licores`
--
ALTER TABLE `liquidacion_licores`
  MODIFY `N_liquidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `liquidacion_tabaco`
--
ALTER TABLE `liquidacion_tabaco`
  MODIFY `N_liquidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `renovacion_licores`
--
ALTER TABLE `renovacion_licores`
  MODIFY `Id_renovacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `segundo_firmante`
--
ALTER TABLE `segundo_firmante`
  MODIFY `Id_firmante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `Id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_produccion_licores`
--
ALTER TABLE `detalle_produccion_licores`
  ADD CONSTRAINT `detalle_produccion_licores_ibfk_1` FOREIGN KEY (`Id_liquidacion`) REFERENCES `liquidacion_licores` (`N_liquidacion`),
  ADD CONSTRAINT `detalle_produccion_licores_ibfk_2` FOREIGN KEY (`Clase`) REFERENCES `relacion_productos_licores` (`Id_producto`);

--
-- Filtros para la tabla `detalle_pvp_licores`
--
ALTER TABLE `detalle_pvp_licores`
  ADD CONSTRAINT `detalle_pvp_licores_ibfk_1` FOREIGN KEY (`Id_liquidacion`) REFERENCES `liquidacion_licores` (`N_liquidacion`),
  ADD CONSTRAINT `detalle_pvp_licores_ibfk_2` FOREIGN KEY (`Clase`) REFERENCES `relacion_productos_licores` (`Id_producto`);

--
-- Filtros para la tabla `detalle_tabaco`
--
ALTER TABLE `detalle_tabaco`
  ADD CONSTRAINT `detalle_tabaco_ibfk_1` FOREIGN KEY (`Id_liquidacion`) REFERENCES `liquidacion_tabaco` (`N_liquidacion`);

--
-- Filtros para la tabla `licencia_licores`
--
ALTER TABLE `licencia_licores`
  ADD CONSTRAINT `Firmante_autorizacion_licores` FOREIGN KEY (`Firmante`) REFERENCES `firmantes` (`Id_firmante`),
  ADD CONSTRAINT `Segundo_firmante_autorizacion_licores` FOREIGN KEY (`Segunda_firma`) REFERENCES `segundo_firmante` (`Id_firmante`),
  ADD CONSTRAINT `Unidad_autorizacion_licores` FOREIGN KEY (`Unidad`) REFERENCES `unidades` (`Id_unidad`);

--
-- Filtros para la tabla `licencia_tabaco`
--
ALTER TABLE `licencia_tabaco`
  ADD CONSTRAINT `licencia_tabaco_ibfk_1` FOREIGN KEY (`Unidad`) REFERENCES `unidades` (`Id_unidad`),
  ADD CONSTRAINT `licencia_tabaco_ibfk_2` FOREIGN KEY (`Firmante`) REFERENCES `firmantes` (`Id_firmante`),
  ADD CONSTRAINT `licencia_tabaco_ibfk_3` FOREIGN KEY (`Segunda_firma`) REFERENCES `segundo_firmante` (`Id_firmante`);

--
-- Filtros para la tabla `liquidacion_licores`
--
ALTER TABLE `liquidacion_licores`
  ADD CONSTRAINT `liquidacion_licores_ibfk_1` FOREIGN KEY (`Licencia`) REFERENCES `licencia_licores` (`Numero_autorizacion`),
  ADD CONSTRAINT `liquidacion_licores_ibfk_2` FOREIGN KEY (`Firmante`) REFERENCES `firmante_liquidacion` (`Id_firmante`);

--
-- Filtros para la tabla `liquidacion_tabaco`
--
ALTER TABLE `liquidacion_tabaco`
  ADD CONSTRAINT `liquidacion_tabaco_ibfk_1` FOREIGN KEY (`Licencia`) REFERENCES `licencia_tabaco` (`Numero_autorizacion`),
  ADD CONSTRAINT `liquidacion_tabaco_ibfk_2` FOREIGN KEY (`Firmante`) REFERENCES `firmante_liquidacion` (`Id_firmante`);

--
-- Filtros para la tabla `relacion_productos_licores`
--
ALTER TABLE `relacion_productos_licores`
  ADD CONSTRAINT `relacion_productos_licores_ibfk_1` FOREIGN KEY (`Id_licencia`) REFERENCES `licencia_licores` (`Numero_autorizacion`),
  ADD CONSTRAINT `relacion_productos_licores_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `clase_producto` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
