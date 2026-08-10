-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2026 a las 05:06:20
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
-- Base de datos: `gestion_activos26`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `sistema_operativo` varchar(100) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `estado` enum('activo','dañado','reparacion','baja') DEFAULT 'activo',
  `ubicacion` varchar(150) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `garantia_fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`id`, `codigo`, `serie`, `modelo`, `sistema_operativo`, `tipo_id`, `estado`, `ubicacion`, `fecha_compra`, `garantia_fin`, `created_at`) VALUES
(1, 'WPB-MAITRED', '1CZ201012K', 'HP ProDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(2, 'WPB-GERENCIA-AYB', 'BLHWVW3', 'Latitude 5440', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(3, 'PTYBW-ASIST-AyB', '25JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(4, 'PTYBW-SUB-AYB02', '2JZKK44', 'OptiPlex Micro 7020', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(5, 'PTYBW-SUPHSK02', 'JJZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(6, 'WPB-SUP-HKI', '1CZ1200328', 'HP ProDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(7, 'PTYBW-ALL-JROJ', '5CG2071WGV', 'HP EliteBook 840 G8', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(8, 'WPB-SUP-RECEP', 'MXL6391N8M', 'HP ProDesk 400 G3', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(9, 'PTYBW-ANIMACION05', '5CD74415P9', 'HP ProBook 440', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(10, NULL, NULL, 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(11, 'WPB-BARES', 'B5JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(12, 'PTYBW-COCINA-02', '66JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(13, 'PTYBW-GR-CHEF02', 'GTQ6WH3', 'Latitude 5450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(14, 'WPB-ALMACEN', 'H5JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(15, 'DESKTOP-T7Q601G', 'MXL8513FLG', 'HP EliteDesk 800 G4 SFF', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(16, 'PTYBW-CONTA10', '16JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(17, 'PTYBW-INGRESOS1', '36JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(18, 'PTYBW-CONTABILIDAD06', 'BJZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(19, 'PTYBW-CONTA09', '1CZ2010125', 'HP ProDesk 400 G7', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(20, 'PTYBW-CONTA-AN1', '9JZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(21, 'PTYBW-CxC2', 'F8FFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(22, 'PTYBW-CxC1', '75JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(23, 'PTYBW-CAJAGENERAL02', '6JZKK44', 'Optiplex Micro 7020', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(24, 'DESKTOP-C0HGU4F', '5CD307308N', 'HP ProBook 450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(25, 'WPB-COSTOS-03', 'J5JFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(26, 'DESKTOP-5BVQD30', '5CD5442CFH', 'HP ProBook 450 G3', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(27, 'PTYBW-RCON-2', 'MXL2281569', 'HP Compaq 6200 Pro', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(28, 'PTYBW-RCON-1', '1CZ201012Y', 'HP Compaq Pro 4300', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(29, NULL, NULL, 'Latitude 5450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(30, 'PTYBW-GiftShop', 'C5JFH04', 'Optiplex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(31, 'PTYBW-POST-GTS', '8KFVZC3', 'Optiplex 3080', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(32, 'PTYBW-GYB-06', '5DC1289QK0', 'HP ProBook 440 G7', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(33, 'WPB-Gevento-006', '5DC8374M71', 'HP ProoBook450 G5', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(34, 'PTYBW-001', 'B2D9Q34', 'Latitude 5550', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(35, 'wpb-rcontroller', '5CG2071WG5', 'HP EliteBook 840 G8', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(36, 'PTYBW-GYB05', '5DC9240XRN', 'HP ProoBook 450 G6', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(37, 'WPB-GYE-04', '7SHWVW3', 'Latitude 5440', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(38, 'eventosybanquet', 'MXL25126WK', 'ProLiant DL20 Gen10', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(39, 'wpb-banquetes', 'MXL90439TK', 'HP ProDesk 400 G5', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(40, 'PTYBW-GUEST2', '5CD9240XTT', 'HP ProBook 450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(41, 'PTYBW-FO-YDIX', '5CD74157ST', NULL, 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(42, 'WPB-CLUBLUNCH', 'MXL2500FF0', 'HP Compaq Pro 6300', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(43, 'PTYBW-GER-MAN03', '693XVW3', 'Latitude 5450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(44, 'PTYBW-MANT06', 'FJZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(45, 'WPB-MANTEN-03', 'H8FFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(46, 'WPB-ASSIT-MANT', 'MXL8513FL9', 'HP EliteDesk 800', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(47, 'TOURDESK2-WPB', '1CZ1200309', 'HP ProDesk 400 G7', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(48, 'GT-TOURDESKWPB', '1CZ120032S', 'HP ProDesk 400 G7', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(49, 'PTYBW-RECEP-SUP', 'MXL63716BJ', 'HP ProoDesk 600 G2', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(50, 'PTYBW-LOBBY2', '1CZ201012Y', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(51, 'PTYBW-RECEP', '1CZ120032H', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(52, 'PTYBW-RECEPCION5', '1CZ201012Z', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(53, 'PTYBW_RECEP_7', '1CZ12002ZR', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(54, 'PTYBW_RECEP_8', '1CZ2010131', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(55, 'ragetsh6d754', '5CG2071WDP', 'HP EliteBook 840', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(56, 'PTYBW-RECEP-VIP1', 'MXL5281Y4Y', 'HP ProDesk 600', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(57, 'PTYBW-RECEP-VIP2', '4JZKK44', 'Optiplex Micro 7020', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(58, 'PTYBW_RECEP_1', '1CA201012T', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(59, 'PTYBW-RECEPCION2', '1CZ201012C', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(60, 'PTYBW_RECEP_4', '1CZ120031J', 'HP ProoDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(61, 'PTYBW-005', 'G2D9Q34', 'Latitude 5550', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(62, 'WPB-Ldell-03', '1NHWVW3', 'Latitude 5450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(63, 'WPB-GERENCIA-RH', '4WCXVW3', 'Latitude 5440', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(64, 'WPB-Lap-Dell-02', 'DD3XVW3', 'Latitude 5450', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(65, 'PTYBW-SEG-5', '5CD8342GQX', 'HP ProBook 440 G5', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(66, 'WPB-SEGURIDAD-02', 'G8FFH04', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(67, 'PTYBW-SRVXPRESS04', 'CJZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(68, 'PTYBW-SRVXPRESS05', '1KZKK44', 'OptiPlex Micro 7010', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(69, NULL, NULL, NULL, 'Wind 10 Home', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(70, 'PTYBWCAPS01', '1CZ201011V', 'HP ProDesk 400 G7', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(71, 'DC03386A', '8YWGXQ1', 'PowerEdge R610', 'Wind Server 2008 R2', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(72, 'AP03386A', '8SYXWQ1', 'PowerEdge R610', 'Wind Server 2008 R2', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(73, 'PTYBWOPRIFC', '2M214403CY', 'ProLiant DL20 Gen10', 'Wind Server 2016', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(74, 'POS03386A', '9YT8JQ1', 'PowerEdge R610', 'Wind Server 2008 R2', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(75, 'wpb-auditor-N', 'MXL7411X3G', 'HP ProDesk 400 G4', 'Wind 10 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(76, 'PTYBW-TV-WESTIN', '1CZ120033S', 'HP ProDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(77, NULL, NULL, NULL, 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(78, NULL, NULL, NULL, 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(79, 'WPB-Sensory_SPA01', 'GXCXVW3', 'Latitude 5440', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(80, 'PTYBW-RECEP-SPA', '1CZ12002ZV', 'HP ProDesk 400', 'Wind 11 Pro', 1, 'activo', NULL, NULL, NULL, '2026-07-21 19:17:07'),
(81, '2003wpb', '5072023', 'lenovo thinkpad', 'windows 11 Pro', 2, 'baja', NULL, NULL, NULL, '2026-08-03 14:09:05'),
(82, 's', '', '', '', 1, 'baja', NULL, NULL, NULL, '2026-08-03 19:13:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL,
  `activo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `estado` enum('activo','finalizado') DEFAULT 'activo',
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id`, `activo_id`, `usuario_id`, `fecha_asignacion`, `fecha_devolucion`, `estado`, `observacion`) VALUES
(1, 1, 1, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(2, 2, 2, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(3, 3, 3, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(4, 4, 4, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(5, 5, 5, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(6, 6, 6, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(7, 7, 7, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(8, 8, 8, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(9, 9, 9, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(10, 12, 12, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(11, 13, 13, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(12, 14, 14, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(13, 15, 15, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(14, 16, 16, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(15, 17, 17, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(16, 18, 18, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(17, 19, 19, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(18, 20, 20, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(19, 21, 21, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(20, 22, 22, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(21, 23, 23, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(22, 24, 24, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(23, 25, 25, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(24, 26, 25, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(25, 30, 29, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(26, 32, 31, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(27, 33, 32, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(28, 34, 33, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(29, 35, 34, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(30, 36, 35, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(31, 37, 36, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(32, 38, 37, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(33, 39, 38, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(34, 40, 39, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(35, 41, 40, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(36, 42, 41, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(37, 43, 42, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(38, 44, 43, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(39, 45, 44, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(40, 46, 45, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(41, 49, 48, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(42, 50, 49, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(43, 51, 50, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(44, 52, 51, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(45, 53, 52, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(46, 54, 53, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(47, 55, 54, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(48, 56, 55, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(49, 57, 56, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(50, 58, 57, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(51, 59, 58, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(52, 60, 59, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(53, 62, 61, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(54, 63, 62, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(55, 65, 64, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(56, 66, 65, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(57, 67, 66, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(58, 68, 67, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(59, 79, 78, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial'),
(60, 80, 79, '2026-07-30', NULL, 'activo', 'Importado desde inventario inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_wpb_2026_limpio`
--

CREATE TABLE `equipos_wpb_2026_limpio` (
  `COL 1` varchar(14) DEFAULT NULL,
  `COL 2` varchar(13) DEFAULT NULL,
  `COL 3` varchar(22) DEFAULT NULL,
  `COL 4` varchar(11) DEFAULT NULL,
  `COL 5` varchar(20) DEFAULT NULL,
  `COL 6` varchar(23) DEFAULT NULL,
  `COL 7` varchar(19) DEFAULT NULL,
  `COL 8` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `equipos_wpb_2026_limpio`
--

INSERT INTO `equipos_wpb_2026_limpio` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`) VALUES
('Nombre', 'Apellido', 'Departamento', 'Serie', 'Nomenclatura', 'Modelo', 'OS', 'Observación'),
('Eric', 'Delgado', 'Alimentos & Bebidas', '1CZ201012K', 'WPB-MAITRED', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Miguel ', 'Martinez', 'Alimentos & Bebidas', 'BLHWVW3', 'WPB-GERENCIA-AYB', 'Latitude 5440', 'Wind 11 Pro', ''),
('Kathia', 'Justavino', 'Alimentos & Bebidas', '25JFH04', 'PTYBW-ASIST-AyB', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Ricardo', 'Batista', 'Alimentos & Bebidas', '2JZKK44', 'PTYBW-SUB-AYB02', 'OptiPlex Micro 7020', 'Wind 11 Pro', ''),
('Maritza', 'Gonzalez', 'Ama de llaves', 'JJZKK44', 'PTYBW-SUPHSK02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Micaela', 'Conceccion', 'Ama de llaves', '1CZ1200328', 'WPB-SUP-HKI', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Jaime ', 'Rojas', 'Ama de llaves', '5CG2071WGV', 'PTYBW-ALL-JROJ', 'HP EliteBook 840 G8', 'Wind 11 Pro', ''),
('Genesis', 'Othon', 'Animación', 'MXL6391N8M', 'WPB-SUP-RECEP', 'HP ProDesk 400 G3', 'Wind 10 Pro', ''),
('Alberto', 'Pao', 'Animación', '5CD74415P9', 'PTYBW-ANIMACION05', 'HP ProBook 440', 'Wind 11 Pro', ''),
('Manuel', 'Rios', 'Areas Publicas', '', '', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jesus', 'Muñoz', 'Bares', 'B5JFH04', 'WPB-BARES', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Carlos', 'Flores', 'Cocina', '66JFH04', 'PTYBW-COCINA-02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Enzo', 'Fornito', 'Cocina', 'GTQ6WH3', 'PTYBW-GR-CHEF02', 'Latitude 5450', 'Wind 11 Pro', ''),
('Jorgue', 'Dominguez', 'Compras', 'H5JFH04', 'WPB-ALMACEN', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Guillermo ', 'Gomez', 'Compras', 'MXL8513FLG', 'DESKTOP-T7Q601G', 'HP EliteDesk 800 G4 SFF', 'Wind 11 Pro', ''),
('Yovana ', 'Clarke', 'Contabilidad', '16JFH04', 'PTYBW-CONTA10', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Maybe ', 'Betia', 'Contabilidad', '36JFH04', 'PTYBW-INGRESOS1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Greivin', 'Mendoza', 'Contabilidad', 'BJZKK44', 'PTYBW-CONTABILIDAD06', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Claudia ', 'Sanchez', 'Contabilidad', '1CZ2010125', 'PTYBW-CONTA09', 'HP ProDesk 400 G7', 'Wind 11 Pro', ''),
('Leonardo ', 'Richard', 'Contabilidad', '9JZKK44', 'PTYBW-CONTA-AN1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Eduardo', 'Tirado', 'Contabilidad', 'F8FFH04', 'PTYBW-CxC2', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Geronimo', 'Olivares', 'Contabilidad', '75JFH04', 'PTYBW-CxC1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Deisy', 'Rivera', 'Contabilidad', '6JZKK44', 'PTYBW-CAJAGENERAL02', 'Optiplex Micro 7020', 'Wind 11 Pro', ''),
('Cesar', 'Bal', 'Contabilidad', '5CD307308N', 'DESKTOP-C0HGU4F', 'HP ProBook 450', 'Wind 11 Pro', ''),
('Jose', 'Rodriguez', 'Costos', 'J5JFH04', 'WPB-COSTOS-03', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jose', 'Rodriguez', 'Costos', '5CD5442CFH', 'DESKTOP-5BVQD30', 'HP ProBook 450 G3', 'Wind 10 Pro', 'No sube'),
('Entrenamiento1', '', 'Entrenamiento RRHH', 'MXL2281569', 'PTYBW-RCON-2', 'HP Compaq 6200 Pro', 'Wind 10 Pro', ''),
('Entrenamiento2', '', 'Entrenamiento RRHH', '1CZ201012Y', 'PTYBW-RCON-1', 'HP Compaq Pro 4300', 'Wind 10 Pro', ''),
('Oliver ', 'SanMartin', 'Gerencia', '', '', 'Latitude 5450', 'Wind 11 Pro', ''),
('Jazmely', 'Shirley', 'GiftShop', 'C5JFH04', 'PTYBW-GiftShop', 'Optiplex Micro 7010', 'Wind 11 Pro', ''),
('Maria', '', 'GiftShop', '8KFVZC3', 'PTYBW-POST-GTS', 'Optiplex 3080', 'Wind 11 Pro', ''),
('Paola ', 'Vergara', 'Grupo & Eventos', '5DC1289QK0', 'PTYBW-GYB-06', 'HP ProBook 440 G7', 'Wind 11 Pro', ''),
('Ebbe ', 'Pedersene', 'Grupo & Eventos', '5DC8374M71', 'WPB-Gevento-006', 'HP ProoBook450 G5', 'Wind 11 Pro', ''),
('Carolina', 'Lezcano', 'Grupo & Eventos', 'B2D9Q34', 'PTYBW-001', 'Latitude 5550', 'Wind 11 Pro', ''),
('Carolin', 'Jordan', 'Grupo & Eventos', '5CG2071WG5', 'wpb-rcontroller', 'HP EliteBook 840 G8', 'Wind 11 Pro', ''),
('Yasmelin ', 'Villarreal', 'Grupo & Eventos', '5DC9240XRN', 'PTYBW-GYB05', 'HP ProoBook 450 G6', 'Wind 11 Pro', ''),
('Nelly', 'Morales', 'Grupo & Eventos', '7SHWVW3', 'WPB-GYE-04', 'Latitude 5440', 'Wind 11 Pro', ''),
('Room', 'Viewer', 'Grupo & Eventos', 'MXL25126WK', 'eventosybanquet', 'ProLiant DL20 Gen10', 'Wind 10 Pro', 'No sube'),
('Abril', 'Quatrochi', 'Grupo & Eventos', 'MXL90439TK', 'wpb-banquetes', 'HP ProDesk 400 G5', 'Wind 10 Pro', 'No sube'),
('Ezequiel', 'Arias', 'Guest Relationes', '5CD9240XTT', 'PTYBW-GUEST2', 'HP ProBook 450', 'Wind 11 Pro', ''),
('Johanna', 'Dixon', 'Guest Relationes', '5CD74157ST', 'PTYBW-FO-YDIX', '', 'Wind 11 Pro', ''),
('Club', 'Lunch', 'Guest Relationes', 'MXL2500FF0', 'WPB-CLUBLUNCH', 'HP Compaq Pro 6300', 'Wind 11 Pro', ''),
('Ivan', 'Zapata', 'Mantenimiento', '693XVW3', 'PTYBW-GER-MAN03', 'Latitude 5450', 'Wind 11 Pro', ''),
('Carmen ', 'Vasquez', 'Mantenimiento', 'FJZKK44', 'PTYBW-MANT06', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jessica ', 'Suira', 'Mantenimiento', 'H8FFH04', 'WPB-MANTEN-03', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Asistente ', 'Mantenimiento', 'Mantenimiento', 'MXL8513FL9', 'WPB-ASSIT-MANT', 'HP EliteDesk 800', 'Wind 11 Pro', ''),
('Tour Desk 3', '', 'Panamazing', '1CZ1200309', 'TOURDESK2-WPB', 'HP ProDesk 400 G7', 'Wind 10 Pro', ''),
('Tourdesk WPB', '', 'Panamazing', '1CZ120032S', 'GT-TOURDESKWPB', 'HP ProDesk 400 G7', 'Wind 10 Pro', ''),
('Edilsa', 'Batista', 'Recepcion', 'MXL63716BJ', 'PTYBW-RECEP-SUP', 'HP ProoDesk 600 G2', 'Wind 10 Pro', 'No sube'),
('Pantalla', 'Lobby', 'Recepción', '1CZ201012Y', 'PTYBW-LOBBY2', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Jose', 'Fernandez', 'Recepción', '1CZ120032H ', 'PTYBW-RECEP', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Nestor', 'Santos', 'Recepción', '1CZ201012Z', 'PTYBW-RECEPCION5', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Ashlei', 'Alvarez', 'Recepción', '1CZ12002ZR', 'PTYBW_RECEP_7', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Jorge', 'Obon', 'Recepción', '1CZ2010131', 'PTYBW_RECEP_8', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Armando', 'Martinez', 'Recepción', '5CG2071WDP', 'ragetsh6d754', 'HP EliteBook 840', 'Wind 11 Pro', ''),
('Gustavo', 'Coronado', 'Recepción', 'MXL5281Y4Y', 'PTYBW-RECEP-VIP1', 'HP ProDesk 600', 'Wind 11 Pro', ''),
('Iveth', 'Aparicio', 'Recepción', '4JZKK44', 'PTYBW-RECEP-VIP2', 'Optiplex Micro 7020', 'Wind 11 Pro', ''),
('Carolina', 'Sanchez', 'Recepción', '1CA201012T', 'PTYBW_RECEP_1', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Ricardo', 'Gomez', 'Recepción', '1CZ201012C', 'PTYBW-RECEPCION2', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Brayan', 'Ortega', 'Recepción', '1CZ120031J', 'PTYBW_RECEP_4', 'HP ProoDesk 400', 'Wind 11 Pro', ''),
('Francisco', 'Cedeño', 'Room Controler', 'G2D9Q34', 'PTYBW-005', 'Latitude 5550', 'Wind 11 Pro', ''),
('Ashley', 'Valdes', 'RRHH', '1NHWVW3', 'WPB-Ldell-03', 'Latitude 5450', 'Wind 11 Pro', ''),
('Kiara', 'Pinilla', 'RRHH', '4WCXVW3', 'WPB-GERENCIA-RH', 'Latitude 5440', 'Wind 11 Pro', ''),
('Lucila ', 'González', 'RRHH', 'DD3XVW3', 'WPB-Lap-Dell-02', 'Latitude 5450', 'Wind 11 Pro', ''),
('Ernesto', 'Miller', 'Seguridad', '5CD8342GQX', 'PTYBW-SEG-5', 'HP ProBook 440 G5', 'Wind 11 Pro', ''),
('Carlos', 'Torres', 'Seguridad', 'G8FFH04', 'WPB-SEGURIDAD-02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Julieth', 'Roman', 'Service Express', 'CJZKK44', 'PTYBW-SRVXPRESS04', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Iris', 'Gonzalez', 'Service Express', '1KZKK44', 'PTYBW-SRVXPRESS05', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Assa ABLOY', '', 'Servidor Assa ABLOY', '', '', '', 'Wind 10 Home', ''),
('CAPS-WPB', '', 'Servidor CAPS', '1CZ201011V', 'PTYBWCAPS01', 'HP ProDesk 400 G7', 'Wind 11 Pro', ''),
('Administrador', '', 'Servidor DC', '8YWGXQ1', 'DC03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor File Server', '8SYXWQ1', 'AP03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor Interface', '2M214403CY', 'PTYBWOPRIFC', 'ProLiant DL20 Gen10', 'Wind Server 2016 ', ''),
('Administrador', '', 'Servidor MAITRE D 2016', '9YT8JQ1', 'POS03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor Satcom', 'MXL7411X3G', 'wpb-auditor-N', 'HP ProDesk 400 G4', 'Wind 10 Pro', 'No sube'),
('Administrador', '', 'Servidor TV LG', '1CZ120033S', 'PTYBW-TV-WESTIN', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Jose Moya', '', 'Sistema', '', '', '', 'Wind 11 Pro', ''),
('Victor Ramos', '', 'Sistema', '', '', '', 'Wind 11 Pro', ''),
('Jenny', 'Pinzon', 'SPA', 'GXCXVW3', 'WPB-Sensory_SPA01', 'Latitude 5440', 'Wind 11 Pro', ''),
('Delani', 'Flores', 'SPA', '1CZ12002ZV', 'PTYBW-RECEP-SPA', 'HP ProDesk 400', 'Wind 11 Pro', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_activos`
--

CREATE TABLE `historial_activos` (
  `id` int(11) NOT NULL,
  `activo_id` int(11) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `historial_activos`
--

INSERT INTO `historial_activos` (`id`, `activo_id`, `accion`, `descripcion`, `fecha`) VALUES
(1, 81, 'Baja de activo', 'Activo marcado como baja', '2026-08-03 14:13:05'),
(2, 1, 'Mantenimiento', 'Preventivo registrado', '2026-08-03 15:18:42'),
(3, 82, 'Baja de activo', 'Activo marcado como baja', '2026-08-03 19:13:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `import_activos`
--

CREATE TABLE `import_activos` (
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `nomenclatura` varchar(100) DEFAULT NULL,
  `modelo` varchar(150) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id` int(11) NOT NULL,
  `activo_id` int(11) DEFAULT NULL,
  `tipo` enum('preventivo','correctivo') DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `tecnico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id`, `activo_id`, `tipo`, `descripcion`, `fecha`, `costo`, `tecnico`) VALUES
(1, 1, 'preventivo', 'Mantenimiento de software y hardware', '2026-08-03', 0.00, 'Luis Williams');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_usuarios`
--

CREATE TABLE `sistema_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` enum('admin','tecnico','consulta') DEFAULT 'consulta',
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sistema_usuarios`
--

INSERT INTO `sistema_usuarios` (`id`, `nombre`, `usuario`, `password`, `rol`, `estado`) VALUES
(1, 'Administrador', 'admin', '$2y$10$SfhWAjA8s9LGTCA0MUJISO3MYSbOiGfA1cbfay3wwhaX5BpapHT1q', 'admin', 'activo'),
(4, 'carlos', 'carlos ', 'c92a10324374fac681719d63979d00fe', 'consulta', 'activo'),
(5, 'Tecnico', 'tecnico', 'c92a10324374fac681719d63979d00fe', 'tecnico', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `COL 1` varchar(14) DEFAULT NULL,
  `COL 2` varchar(18) DEFAULT NULL,
  `COL 3` varchar(22) DEFAULT NULL,
  `COL 4` varchar(17) DEFAULT NULL,
  `COL 5` varchar(20) DEFAULT NULL,
  `COL 6` varchar(23) DEFAULT NULL,
  `COL 7` varchar(19) DEFAULT NULL,
  `COL 8` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`) VALUES
('Eric', 'Delgado', 'Alimentos & Bebidas', '1CZ201012K', 'WPB-MAITRED', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Miguel ', 'Martinez', 'Alimentos & Bebidas', 'BLHWVW3', 'WPB-GERENCIA-AYB', 'Latitude 5440', 'Wind 11 Pro', ''),
('Kathia', 'Justavino', 'Alimentos & Bebidas', '25JFH04', 'PTYBW-ASIST-AyB', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Ricardo', 'Batista', 'Alimentos & Bebidas', '2JZKK44', 'PTYBW-SUB-AYB02', 'OptiPlex Micro 7020', 'Wind 11 Pro', ''),
('Maritza', 'Gonzalez', 'Ama de llaves', 'JJZKK44', 'PTYBW-SUPHSK02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Micaela', 'Conceccion', 'Ama de llaves', '1CZ1200328', 'WPB-SUP-HKI', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Jaime ', 'Rojas', 'Ama de llaves', '5CG2071WGV', 'PTYBW-ALL-JROJ', 'HP EliteBook 840 G8', 'Wind 11 Pro', ''),
('Genesis', 'Othon', 'Animaci?n,MXL6391N8M', 'WPB-SUP-RECEP', 'HP ProDesk 400 G3', 'Wind 10 Pro', '', NULL),
('Alberto', 'Pao', 'Animaci?n,5CD74415P9', 'PTYBW-ANIMACION05', 'HP ProBook 440', 'Wind 11 Pro', '', NULL),
('Manuel', 'Rios', 'Areas Publicas', '', '', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jesus', 'Mu?oz,Bares', 'B5JFH04', 'WPB-BARES', 'OptiPlex Micro 7010', 'Wind 11 Pro', '', NULL),
('Carlos', 'Flores', 'Cocina', '66JFH04', 'PTYBW-COCINA-02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Enzo', 'Fornito', 'Cocina', 'GTQ6WH3', 'PTYBW-GR-CHEF02', 'Latitude 5450', 'Wind 11 Pro', ''),
('Jorgue', 'Dominguez', 'Compras', 'H5JFH04', 'WPB-ALMACEN', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Guillermo ', 'Gomez', 'Compras', 'MXL8513FLG', 'DESKTOP-T7Q601G', 'HP EliteDesk 800 G4 SFF', 'Wind 11 Pro', ''),
('Yovana ', 'Clarke', 'Contabilidad', '16JFH04', 'PTYBW-CONTA10', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Maybe ', 'Betia', 'Contabilidad', '36JFH04', 'PTYBW-INGRESOS1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Greivin', 'Mendoza', 'Contabilidad', 'BJZKK44', 'PTYBW-CONTABILIDAD06', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Claudia ', 'Sanchez', 'Contabilidad', '1CZ2010125', 'PTYBW-CONTA09', 'HP ProDesk 400 G7', 'Wind 11 Pro', ''),
('Leonardo ', 'Richard', 'Contabilidad', '9JZKK44', 'PTYBW-CONTA-AN1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Eduardo', 'Tirado', 'Contabilidad', 'F8FFH04', 'PTYBW-CxC2', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Geronimo', 'Olivares', 'Contabilidad', '75JFH04', 'PTYBW-CxC1', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Deisy', 'Rivera', 'Contabilidad', '6JZKK44', 'PTYBW-CAJAGENERAL02', 'Optiplex Micro 7020', 'Wind 11 Pro', ''),
('Cesar', 'Bal', 'Contabilidad', '5CD307308N', 'DESKTOP-C0HGU4F', 'HP ProBook 450', 'Wind 11 Pro', ''),
('Jose', 'Rodriguez', 'Costos', 'J5JFH04', 'WPB-COSTOS-03', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jose', 'Rodriguez', 'Costos', '5CD5442CFH', 'DESKTOP-5BVQD30', 'HP ProBook 450 G3', 'Wind 10 Pro', 'No sube'),
('Entrenamiento1', '', 'Entrenamiento RRHH', 'MXL2281569', 'PTYBW-RCON-2', 'HP Compaq 6200 Pro', 'Wind 10 Pro', ''),
('Entrenamiento2', '', 'Entrenamiento RRHH', '1CZ201012Y', 'PTYBW-RCON-1', 'HP Compaq Pro 4300', 'Wind 10 Pro', ''),
('Oliver ', 'SanMartin', 'Gerencia', '', '', 'Latitude 5450', 'Wind 11 Pro', ''),
('Jazmely', 'Shirley', 'GiftShop', 'C5JFH04', 'PTYBW-GiftShop', 'Optiplex Micro 7010', 'Wind 11 Pro', ''),
('Maria', '', 'GiftShop', '8KFVZC3', 'PTYBW-POST-GTS', 'Optiplex 3080', 'Wind 11 Pro', ''),
('Paola ', 'Vergara', 'Grupo & Eventos', '5DC1289QK0', 'PTYBW-GYB-06', 'HP ProBook 440 G7', 'Wind 11 Pro', ''),
('Ebbe ', 'Pedersene', 'Grupo & Eventos', '5DC8374M71', 'WPB-Gevento-006', 'HP ProoBook450 G5', 'Wind 11 Pro', ''),
('Carolina', 'Lezcano', 'Grupo & Eventos', 'B2D9Q34', 'PTYBW-001', 'Latitude 5550', 'Wind 11 Pro', ''),
('Carolin', 'Jordan', 'Grupo & Eventos', '5CG2071WG5', 'wpb-rcontroller', 'HP EliteBook 840 G8', 'Wind 11 Pro', ''),
('Yasmelin ', 'Villarreal', 'Grupo & Eventos', '5DC9240XRN', 'PTYBW-GYB05', 'HP ProoBook 450 G6', 'Wind 11 Pro', ''),
('Nelly', 'Morales', 'Grupo & Eventos', '7SHWVW3', 'WPB-GYE-04', 'Latitude 5440', 'Wind 11 Pro', ''),
('Room', 'Viewer', 'Grupo & Eventos', 'MXL25126WK', 'eventosybanquet', 'ProLiant DL20 Gen10', 'Wind 10 Pro', 'NO sube'),
('Abril', 'Quatrochi', 'Grupo & Eventos', 'MXL90439TK', 'wpb-banquetes', 'HP ProDesk 400 G5', 'Wind 10 Pro', 'NO sube'),
('Ezequiel', 'Arias', 'Guest Relationes', '5CD9240XTT', 'PTYBW-GUEST2', 'HP ProBook 450', 'Wind 11 Pro', ''),
('Johanna', 'Dixon', 'Guest Relationes', '5CD74157ST', 'PTYBW-FO-YDIX', '', 'Wind 11 Pro', ''),
('Club', 'Lunch', 'Guest Relationes', 'MXL2500FF0', 'WPB-CLUBLUNCH', 'HP Compaq Pro 6300', 'Wind 11 Pro', ''),
('Ivan', 'Zapata', 'Mantenimiento', '693XVW3', 'PTYBW-GER-MAN03', 'Latitude 5450', 'Wind 11 Pro', ''),
('Carmen ', 'Vasquez', 'Mantenimiento', 'FJZKK44', 'PTYBW-MANT06', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Jessica ', 'Suira', 'Mantenimiento', 'H8FFH04', 'WPB-MANTEN-03', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Asistente ', 'Mantenimiento', 'Mantenimiento', 'MXL8513FL9', 'WPB-ASSIT-MANT', 'HP EliteDesk 800', 'Wind 11 Pro', ''),
('Tour Desk 3', '', 'Panamazing', '1CZ1200309', 'TOURDESK2-WPB', 'HP ProDesk 400 G7', 'Wind 10 Pro', ''),
('Tourdesk WPB', '', 'Panamazing', '1CZ120032S', 'GT-TOURDESKWPB', 'HP ProDesk 400 G7', 'Wind 10 Pro', ''),
('Edilsa', 'Batista', 'Recepcion', 'MXL63716BJ', 'PTYBW-RECEP-SUP', 'HP ProoDesk 600 G2', 'Wind 10 Pro', 'No sube'),
('Pantalla', 'Lobby', 'Recepci?n,1CZ201012Y', 'PTYBW-LOBBY2', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Jose', 'Fernandez', 'Recepci?n,1CZ120032H ', 'PTYBW-RECEP', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Nestor', 'Santos', 'Recepci?n,1CZ201012Z', 'PTYBW-RECEPCION5', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Ashlei', 'Alvarez', 'Recepci?n,1CZ12002ZR', 'PTYBW_RECEP_7', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Jorge', 'Obon', 'Recepci?n,1CZ2010131', 'PTYBW_RECEP_8', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Armando', 'Martinez', 'Recepci?n,5CG2071WDP', 'ragetsh6d754', 'HP EliteBook 840', 'Wind 11 Pro', '', NULL),
('Gustavo', 'Coronado', 'Recepci?n,MXL5281Y4Y', 'PTYBW-RECEP-VIP1', 'HP ProDesk 600', 'Wind 11 Pro', '', NULL),
('Iveth', 'Aparicio', 'Recepci?n,4JZKK44', 'PTYBW-RECEP-VIP2', 'Optiplex Micro 7020', 'Wind 11 Pro', '', NULL),
('Carolina', 'Sanchez', 'Recepci?n,1CA201012T', 'PTYBW_RECEP_1', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Ricardo', 'Gomez', 'Recepci?n,1CZ201012C', 'PTYBW-RECEPCION2', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Brayan', 'Ortega', 'Recepci?n,1CZ120031J', 'PTYBW_RECEP_4', 'HP ProoDesk 400', 'Wind 11 Pro', '', NULL),
('Francisco', 'Cede?o,Room Contro', 'G2D9Q34', 'PTYBW-005', 'Latitude 5550', 'Wind 11 Pro', '', NULL),
('Ashley', 'Valdes', 'RRHH', '1NHWVW3', 'WPB-Ldell-03', 'Latitude 5450', 'Wind 11 Pro', ''),
('Kiara', 'Pinilla', 'RRHH', '4WCXVW3', 'WPB-GERENCIA-RH', 'Latitude 5440', 'Wind 11 Pro', ''),
('Lucila ', 'Gonz?lez', 'RRHH', 'DD3XVW3', 'WPB-Lap-Dell-02', 'Latitude 5450', 'Wind 11 Pro', ''),
('Ernesto', 'Miller', 'Seguridad', '5CD8342GQX', 'PTYBW-SEG-5', 'HP ProBook 440 G5', 'Wind 11 Pro', ''),
('Carlos', 'Torres', 'Seguridad', 'G8FFH04', 'WPB-SEGURIDAD-02', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Julieth', 'Roman', 'Service Express', 'CJZKK44', 'PTYBW-SRVXPRESS04', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Iris', 'Gonzalez', 'Service Express', '1KZKK44', 'PTYBW-SRVXPRESS05', 'OptiPlex Micro 7010', 'Wind 11 Pro', ''),
('Assa ABLOY', '', 'Servidor Assa ABLOY', '', '', '', 'Wind 10 Home', ''),
('CAPS-WPB', '', 'Servidor CAPS', '1CZ201011V', 'PTYBWCAPS01', 'HP ProDesk 400 G7', 'Wind 11 Pro', ''),
('Administrador', '', 'Servidor DC', '8YWGXQ1', 'DC03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor File Server', '8SYXWQ1', 'AP03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor Interface', '2M214403CY', 'PTYBWOPRIFC', 'ProLiant DL20 Gen10', 'Wind Server 2016 ', ''),
('Administrador', '', 'Servidor MAITRE D 2016', '9YT8JQ1', 'POS03386A', 'PowerEdge R610', 'Wind Server 2008 R2', ''),
('Administrador', '', 'Servidor Satcom', 'MXL7411X3G', 'wpb-auditor-N', 'HP ProDesk 400 G4', 'Wind 10 Pro', 'No sube'),
('Administrador', '', 'Servidor TV LG', '1CZ120033S', 'PTYBW-TV-WESTIN', 'HP ProDesk 400', 'Wind 11 Pro', ''),
('Jose Moya', '', 'Sistema', '', '', '', 'Wind 11 Pro', ''),
('Victor Ramos', '', 'Sistema', '', '', '', 'Wind 11 Pro', ''),
('Jenny', 'Pinzon', 'SPA', 'GXCXVW3', 'WPB-Sensory_SPA01', 'Latitude 5440', 'Wind 11 Pro', ''),
('Delani', 'Flores', 'SPA', '1CZ12002ZV', 'PTYBW-RECEP-SPA', 'HP ProDesk 400', 'Wind 11 Pro', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_activo`
--

CREATE TABLE `tipos_activo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipos_activo`
--

INSERT INTO `tipos_activo` (`id`, `nombre`) VALUES
(1, 'PC'),
(2, 'Laptop'),
(3, 'Impresora'),
(4, 'Switch'),
(5, 'Access Point'),
(6, 'Servidor'),
(7, 'Router');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `apellido` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `departamento` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cargo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `departamento`, `cargo`, `estado`, `created_at`, `correo`, `telefono`) VALUES
(1, 'Eric', 'Delgado', 'Alimentos & Bebidas', '', 'activo', '2026-07-22 14:14:25', '', ''),
(2, 'Miguel', 'Martinez', 'Alimentos & Bebidas', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(3, 'Kathia', 'Justavino', 'Alimentos & Bebidas', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(4, 'Ricardo', 'Batista', 'Alimentos & Bebidas', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(5, 'Maritza', 'Gonzalez', 'Ama de llaves', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(6, 'Micaela', 'Conceccion', 'Ama de llaves', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(7, 'Jaime', 'Rojas', 'Ama de llaves', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(8, 'Genesis', 'Othon', 'AnimaciÃ³n', '', 'activo', '2026-07-22 14:14:25', '', ''),
(9, 'Alberto', 'Pao', 'Animación', '', 'activo', '2026-07-22 14:14:25', '', ''),
(10, 'Manuel', 'Rios', 'Areas Publicas', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(11, 'Jesus', 'MuÃ±oz', 'Bares', '', 'activo', '2026-07-22 14:14:25', '', ''),
(12, 'Carlos', 'Flores', 'Cocina', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(13, 'Enzo', 'Fornito', 'Cocina', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(14, 'Jorgue', 'Dominguez', 'Compras', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(15, 'Guillermo', 'Gomez', 'Compras', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(16, 'Yovana', 'Clarke', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(17, 'Maybe', 'Betia', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(18, 'Greivin', 'Mendoza', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(19, 'Claudia', 'Sanchez', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(20, 'Leonardo', 'Richard', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(21, 'Eduardo', 'Tirado', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(22, 'Geronimo', 'Olivares', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(23, 'Deisy', 'Rivera', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(24, 'Cesar', 'Bal', 'Contabilidad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(25, 'Jose', 'Rodriguez', 'Costos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(26, 'Entrenamiento1', NULL, 'Entrenamiento RRHH', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(27, 'Entrenamiento2', NULL, 'Entrenamiento RRHH', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(28, 'Oliver', 'SanMartin', 'Gerencia', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(29, 'Jazmely', 'Shirley', 'GiftShop', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(30, 'Maria', NULL, 'GiftShop', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(31, 'Paola', 'Vergara', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(32, 'Ebbe', 'Pedersene', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(33, 'Carolina', 'Lezcano', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(34, 'Carolin', 'Jordan', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(35, 'Yasmelin', 'Villarreal', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(36, 'Nelly', 'Morales', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(37, 'Room', 'Viewer', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(38, 'Abril', 'Quatrochi', 'Grupo & Eventos', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(39, 'Ezequiel', 'Arias', 'Guest Relationes', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(40, 'Johanna', 'Dixon', 'Guest Relationes', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(41, 'Club', 'Lunch', 'Guest Relationes', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(42, 'Ivan', 'Zapata', 'Mantenimiento', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(43, 'Carmen', 'Vasquez', 'Mantenimiento', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(44, 'Jessica', 'Suira', 'Mantenimiento', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(45, 'Asistente', 'Mantenimiento', 'Mantenimiento', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(46, 'Tour Desk 3', NULL, 'Panamazing', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(47, 'Tourdesk WPB', NULL, 'Panamazing', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(48, 'Edilsa', 'Batista', 'Recepcion', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(49, 'Pantalla', 'Lobby', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(50, 'Jose', 'Fernandez', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(51, 'Nestor', 'Santos', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(52, 'Ashlei', 'Alvarez', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(53, 'Jorge', 'Obon', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(54, 'Armando', 'Martinez', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(55, 'Gustavo', 'Coronado', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(56, 'Iveth', 'Aparicio', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(57, 'Carolina', 'Sanchez', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(58, 'Ricardo', 'Gomez', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(59, 'Brayan', 'Ortega', 'Recepción', '', 'activo', '2026-07-22 14:14:25', '', ''),
(60, 'Francisco', 'CedeÃ±o', 'Room Controler', '', 'activo', '2026-07-22 14:14:25', '', ''),
(61, 'Ashley', 'Valdes', 'RRHH', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(62, 'Kiara', 'Pinilla', 'RRHH', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(63, 'Lucila', 'GonzÃ¡lez', 'RRHH', '', 'activo', '2026-07-22 14:14:25', '', ''),
(64, 'Ernesto', 'Miller', 'Seguridad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(65, 'Carlos', 'Torres', 'Seguridad', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(66, 'Julieth', 'Roman', 'Service Express', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(67, 'Iris', 'Gonzalez', 'Service Express', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(68, 'Assa ABLOY', NULL, 'Servidor Assa ABLOY', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(69, 'CAPS-WPB', NULL, 'Servidor CAPS', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(70, 'Administrador', NULL, 'Servidor DC', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(71, 'Administrador', NULL, 'Servidor File Server', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(72, 'Administrador', NULL, 'Servidor Interface', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(73, 'Administrador', NULL, 'Servidor MAITRE D 2016', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(74, 'Administrador', NULL, 'Servidor Satcom', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(75, 'Administrador', NULL, 'Servidor TV LG', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(76, 'Jose Moya', NULL, 'Sistema', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(77, 'Victor Ramos', NULL, 'Sistema', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(78, 'Jenny', 'Pinzon', 'SPA', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(79, 'Delani', 'Flores', 'SPA', NULL, 'activo', '2026-07-22 14:14:25', NULL, NULL),
(80, 'luis', 'Williams', 'Sistema', 'tecnico', 'activo', '2026-08-03 21:09:01', 'pueba@gmail.com', '6267-5111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activo_id` (`activo_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `historial_activos`
--
ALTER TABLE `historial_activos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activo_id` (`activo_id`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activo_id` (`activo_id`);

--
-- Indices de la tabla `sistema_usuarios`
--
ALTER TABLE `sistema_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `tipos_activo`
--
ALTER TABLE `tipos_activo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `historial_activos`
--
ALTER TABLE `historial_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sistema_usuarios`
--
ALTER TABLE `sistema_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_activo`
--
ALTER TABLE `tipos_activo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `activos_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_activo` (`id`);

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `historial_activos`
--
ALTER TABLE `historial_activos`
  ADD CONSTRAINT `historial_activos_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id`);

--
-- Filtros para la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD CONSTRAINT `mantenimientos_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
