-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 03:31:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamientobd`
--
CREATE DATABASE IF NOT EXISTS `estacionamientobd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `estacionamientobd`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajones`
--

CREATE TABLE `cajones` (
  `id_Cajon` int(11) NOT NULL COMMENT 'Clave identificadora del tipo de cajon',
  `cve_Est` int(11) NOT NULL COMMENT 'Clave del estacionamiento',
  `num_Cajon` int(11) NOT NULL COMMENT 'Numero de cajón individual',
  `tipo_Cajon` int(11) NOT NULL COMMENT 'Tipo de cajon',
  `disp_Cajon` tinyint(1) NOT NULL COMMENT 'Disponibilidad de cajon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cajones`
--

INSERT INTO `cajones` (`id_Cajon`, `cve_Est`, `num_Cajon`, `tipo_Cajon`, `disp_Cajon`) VALUES
(987, 4, 115, 1, 0),
(988, 2, 430, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(11) NOT NULL,
  `nom_Cliente` varchar(50) NOT NULL,
  `ap_Patc` varchar(15) NOT NULL,
  `ap_Matc` varchar(15) NOT NULL,
  `rfc_Cliente` varchar(30) NOT NULL,
  `dir_Cliente` varchar(70) NOT NULL,
  `tel_Cliente` int(11) NOT NULL,
  `correo_Cliente` mediumtext NOT NULL,
  `id_Credencial` int(11) NOT NULL,
  `tipo_Cliente` int(11) NOT NULL,
  `act_Cli` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_Cliente`, `nom_Cliente`, `ap_Patc`, `ap_Matc`, `rfc_Cliente`, `dir_Cliente`, `tel_Cliente`, `correo_Cliente`, `id_Credencial`, `tipo_Cliente`, `act_Cli`) VALUES
(308588, 'José Eduardo', 'Sánchez', 'Sifuentes', 'SSJE010416FDA', 'Socrates #485, colonia progreso', 12345678, 'A308588@alumnos.uaslp.mx', 928375767, 1, 1),
(308856, 'Leo', 'Mendoza', 'Perez', '32432jk', 'juan', 44432332, 'leo@gmail.com', 928375769, 3, 1),
(308858, 'Leo2', 'Mendoza', 'Perez', '32432jk', 'juan', 44432332, 'leo@gmail.com', 928375769, 4, 1),
(555555, 'Cortesia', 'Cortesia', 'Cortesia', 'nada', 'Cortesa', 55555, 'cortesia@gmail.com', 928375769, 6, 1),
(987654, 'Lola', 'Perez', 'Ortiz', 'OPLO123456WE3', 'Av. Manuel Nava #223', 12345679, 'lola@gmail.com', 928375769, 2, 0),
(999999, 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 9999999, 'libre@gmail.com', 928375769, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_Contrato` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL,
  `auto_Cliente` mediumtext NOT NULL,
  `pago_Cliente` int(11) NOT NULL,
  `fechacont_Cliente` date NOT NULL,
  `vigCon_cliente` date NOT NULL,
  `cont_Act` tinyint(1) NOT NULL,
  `tipo_Cajon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_Contrato`, `id_Cliente`, `auto_Cliente`, `pago_Cliente`, `fechacont_Cliente`, `vigCon_cliente`, `cont_Act`, `tipo_Cajon`) VALUES
(1, 308588, 'Mazda 3, color rojo', 1, '2023-09-03', '0000-00-00', 1, 1),
(2, 987654, 'Toyota Tacoma color verde', 2, '2023-09-03', '0000-00-00', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes_caja`
--

CREATE TABLE `cortes_caja` (
  `num_Corte` int(11) NOT NULL COMMENT 'Número de corte de caja',
  `id_User` int(11) NOT NULL COMMENT 'Identificador unico de usuario',
  `inicio_Turno` datetime NOT NULL COMMENT 'Inicio de turno de trabajo',
  `fin_Turno` datetime DEFAULT NULL COMMENT 'Fin de turno de trabajo',
  `autos_Salida` int(11) DEFAULT 0 COMMENT 'Total de autos que han salido',
  `tickets_Canc` int(11) DEFAULT 0 COMMENT 'Tickets cancelados durante el turno',
  `efectivo` float DEFAULT 0 COMMENT 'Cantidad pagada en efectivo durante el turno',
  `depos` int(11) DEFAULT 0 COMMENT 'Total de comprobantes de pago de mes durante el turno',
  `total_Corte` float DEFAULT 0 COMMENT 'Cantidad total acumulada durante el corte.',
  `corte_Act` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cortes_caja`
--

INSERT INTO `cortes_caja` (`num_Corte`, `id_User`, `inicio_Turno`, `fin_Turno`, `autos_Salida`, `tickets_Canc`, `efectivo`, `depos`, `total_Corte`, `corte_Act`) VALUES
(90, 123456, '2023-09-01 00:00:00', '2023-09-01 00:00:00', 100, 8, 4570, 3, 6000, 0),
(93, 123456, '2023-11-17 19:28:29', '2023-11-17 19:28:43', NULL, NULL, NULL, NULL, NULL, 0),
(94, 123456, '2023-11-20 17:19:23', '2023-11-20 22:09:33', NULL, NULL, NULL, NULL, NULL, 0),
(95, 123456, '2023-11-20 22:09:30', '2023-11-20 22:09:33', NULL, NULL, NULL, NULL, NULL, 0),
(96, 123456, '2023-11-29 01:46:39', '2023-11-29 02:02:26', NULL, NULL, NULL, NULL, NULL, 0),
(97, 123456, '2023-11-29 02:04:35', '2023-11-29 02:53:15', NULL, NULL, NULL, NULL, NULL, 0),
(98, 123456, '2023-11-29 02:54:11', '2023-11-29 04:57:33', NULL, NULL, NULL, NULL, NULL, 0),
(99, 123456, '2023-11-29 05:01:29', '2023-11-30 00:54:03', NULL, NULL, NULL, NULL, NULL, 0),
(100, 123456, '2023-11-30 00:54:12', '2023-11-30 00:56:22', NULL, NULL, 153.52, NULL, 153.52, 0),
(101, 123456, '2023-11-30 00:56:35', '2023-11-30 01:06:21', 0, 0, 102.265, 0, 102.265, 0),
(102, 123456, '2023-11-30 01:14:49', NULL, 0, 0, 106.825, 0, 106.825, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `id_Credencial` int(11) NOT NULL,
  `nom_Cliente` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`id_Credencial`, `nom_Cliente`) VALUES
(928375767, 'Lionel Messi'),
(928375769, 'Cristiano Ronaldo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientos`
--

CREATE TABLE `estacionamientos` (
  `cve_Est` int(11) NOT NULL COMMENT 'Identificador unico de cada estacionamiento',
  `tipo_Est` int(11) NOT NULL COMMENT 'Tipo de estacionamiento',
  `ubi_Est` mediumtext NOT NULL COMMENT 'Ubicación del estacionamiento',
  `lugares_Tot` int(11) NOT NULL COMMENT 'Lugares totales que contiene cada estacionamiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estacionamientos`
--

INSERT INTO `estacionamientos` (`cve_Est`, `tipo_Est`, `ubi_Est`, `lugares_Tot`) VALUES
(1, 2, 'Zona u', 320),
(2, 1, 'Av. Niño Artillero frente al estacionamiento de cobro.', 550),
(3, 2, 'Zona', 300),
(4, 2, 'Av. Niño Artillero, frente a los edificios del DUI', 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_clientes`
--

CREATE TABLE `historial_clientes` (
  `id_historial` int(100) NOT NULL,
  `fecha_entrada` datetime(6) NOT NULL,
  `fecha_salida` datetime(6) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_cliente` varchar(20) NOT NULL,
  `clave_estacionamiento` int(20) NOT NULL,
  `operacion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_clientes`
--

INSERT INTO `historial_clientes` (`id_historial`, `fecha_entrada`, `fecha_salida`, `nombre`, `tipo_cliente`, `clave_estacionamiento`, `operacion`) VALUES
(1, '2023-11-20 18:59:22.000000', '2023-11-29 05:43:14.000000', 'José Eduardo', '1', 1, 2),
(2, '2023-11-20 19:58:48.000000', NULL, 'José Eduardo', '1', 2, 2),
(3, '2023-11-20 20:02:37.000000', NULL, 'José Eduardo', '1', 3, 3),
(4, '2023-11-20 21:58:41.000000', NULL, 'José Eduardo', '1', 1, 2),
(5, '2023-11-20 22:46:38.000000', '2023-11-20 22:49:51.000000', 'José Eduardo', '1', 1, 2),
(6, '2023-11-21 00:33:26.000000', '2023-11-21 00:33:42.000000', 'José Eduardo', '1', 1, 2),
(7, '2023-11-21 00:40:08.000000', '2023-11-29 05:42:58.000000', 'José Eduardo', '1', 1, 2),
(8, '2023-11-21 00:43:50.000000', '2023-11-21 00:43:59.000000', 'José Eduardo', '1', 1, 2),
(9, '2023-11-29 04:52:18.000000', NULL, 'José Eduardo', '1', 4, 1),
(10, '2023-11-29 05:33:43.000000', '2023-11-29 05:34:03.000000', 'Leo', '3', 1, 2),
(11, '2023-11-29 05:34:21.000000', '2023-11-29 05:41:59.000000', 'Leo2', '4', 1, 2),
(12, '2023-11-29 05:44:18.000000', '2023-11-29 05:44:28.000000', 'Leo', '3', 1, 2),
(13, '2023-11-29 05:47:34.000000', '2023-11-29 05:47:41.000000', 'Leo', '3', 1, 2),
(14, '2023-11-29 05:50:42.000000', NULL, 'Leo', '3', 2, 1),
(15, '2023-11-29 05:51:04.000000', NULL, 'Leo', '3', 3, 1),
(16, '2023-11-29 06:18:42.000000', NULL, 'Leo', '3', 1, 1),
(17, '2023-11-30 02:17:45.000000', '2023-11-30 02:18:02.000000', 'Leo', '3', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentajes`
--

CREATE TABLE `porcentajes` (
  `num_Porc` int(11) NOT NULL,
  `tipo_Est` int(11) NOT NULL,
  `cant_Docs` int(11) NOT NULL,
  `cant_Admins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `porcentajes`
--

INSERT INTO `porcentajes` (`num_Porc`, `tipo_Est`, `cant_Docs`, `cant_Admins`) VALUES
(0, 1, 70, 29),
(0, 3, 40, 59),
(0, 4, 50, 50),
(0, 1, 160, 159),
(0, 3, 90, 209),
(0, 4, 270, 180),
(0, 1, 160, 159),
(0, 3, 240, 59),
(0, 4, 270, 180),
(0, 1, 192, 127),
(0, 3, 120, 180),
(0, 4, 180, 270),
(1, 1, 160, 160),
(1, 3, 180, 120),
(1, 4, 315, 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_Ticket` int(11) NOT NULL,
  `cve_Est` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `hr_Ent` datetime NOT NULL,
  `hr_Sal` datetime NOT NULL,
  `num_Cajon` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_Cliente` int(8) DEFAULT NULL,
  `pago` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_Ticket`, `cve_Est`, `id_User`, `hr_Ent`, `hr_Sal`, `num_Cajon`, `fecha`, `status`, `id_Cliente`, `pago`) VALUES
(8567, 4, 123456, '2023-11-28 11:37:27', '2023-11-29 00:37:27', 430, '2023-09-04 00:37:27', 1, NULL, NULL),
(9876, 2, 193782, '2023-11-28 11:37:27', '2023-11-29 00:37:27', 115, '2023-09-04 00:38:37', 1, NULL, NULL),
(9883, 2, 123456, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 431, '2023-11-29 12:00:08', 0, NULL, NULL),
(9884, 2, 123456, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 432, '2023-11-29 12:00:11', 0, NULL, NULL),
(9885, 2, 123456, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 433, '2023-11-29 12:05:33', 1, NULL, NULL),
(9886, 2, 123456, '2023-11-29 12:06:51', '0000-00-00 00:00:00', 434, '2023-11-29 12:06:51', 1, NULL, NULL),
(9887, 2, 123456, '2023-11-29 12:15:08', '0000-00-00 00:00:00', 435, '2023-11-29 12:15:08', 1, NULL, NULL),
(9888, 2, 123456, '2023-11-29 12:15:09', '0000-00-00 00:00:00', 436, '2023-11-29 12:15:09', 1, NULL, NULL),
(9889, 2, 123456, '2023-11-29 12:20:12', '0000-00-00 00:00:00', 437, '2023-11-29 12:20:12', 1, NULL, NULL),
(9890, 2, 123456, '2023-11-29 12:24:33', '0000-00-00 00:00:00', 438, '2023-11-29 12:24:33', 1, NULL, NULL),
(9891, 2, 123456, '2023-11-29 12:24:33', '0000-00-00 00:00:00', 439, '2023-11-29 12:24:33', 1, NULL, NULL),
(9892, 2, 123456, '2023-11-29 12:25:22', '0000-00-00 00:00:00', 440, '2023-11-29 12:25:22', 1, NULL, NULL),
(9893, 2, 123456, '2023-11-29 12:27:41', '0000-00-00 00:00:00', 441, '2023-11-29 12:27:41', 1, NULL, NULL),
(9894, 2, 123456, '2023-11-29 12:27:42', '0000-00-00 00:00:00', 442, '2023-11-29 12:27:42', 1, NULL, NULL),
(9895, 2, 123456, '2023-11-29 12:27:47', '0000-00-00 00:00:00', 443, '2023-11-29 12:27:47', 1, NULL, NULL),
(9896, 2, 123456, '2023-11-29 12:27:48', '0000-00-00 00:00:00', 444, '2023-11-29 12:27:48', 1, NULL, NULL),
(9897, 2, 123456, '2023-11-29 12:27:48', '0000-00-00 00:00:00', 445, '2023-11-29 12:27:48', 1, NULL, NULL),
(9898, 2, 123456, '2023-11-29 12:27:48', '0000-00-00 00:00:00', 446, '2023-11-29 12:27:48', 1, NULL, NULL),
(9899, 2, 123456, '2023-11-29 12:27:49', '0000-00-00 00:00:00', 447, '2023-11-29 12:27:49', 1, NULL, NULL),
(9900, 2, 123456, '2023-11-29 12:27:49', '0000-00-00 00:00:00', 448, '2023-11-29 12:27:49', 1, NULL, NULL),
(9901, 2, 123456, '2023-11-29 12:27:49', '0000-00-00 00:00:00', 449, '2023-11-29 12:27:49', 1, NULL, NULL),
(9902, 2, 123456, '2023-11-29 12:27:59', '0000-00-00 00:00:00', 450, '2023-11-29 12:27:59', 1, NULL, NULL),
(9903, 2, 123456, '2023-11-29 12:30:45', '0000-00-00 00:00:00', 451, '2023-11-29 12:30:45', 1, NULL, NULL),
(9904, 2, 123456, '2023-11-29 12:30:49', '2023-11-29 18:55:12', 452, '2023-11-29 12:30:49', 0, 999999, 76.8678),
(9905, 2, 123456, '2023-11-29 12:30:49', '2023-11-29 18:11:57', 453, '2023-11-29 12:30:49', 0, 999999, 68.2257),
(9906, 2, 123456, '2023-11-29 12:30:50', '2023-11-29 18:21:32', 454, '2023-11-29 12:30:50', 0, 999999, 70.1025),
(9907, 2, 123456, '2023-11-29 12:30:51', '2023-11-29 18:52:28', 455, '2023-11-29 12:30:51', 0, 999999, 76.3154),
(9908, 2, 123456, '2023-11-29 12:31:11', '2023-11-29 18:48:39', 456, '2023-11-29 12:31:11', 0, 999999, 75.4815),
(9909, 2, 123456, '2023-11-29 12:31:12', '2023-11-29 19:22:31', 457, '2023-11-29 12:31:12', 0, 308588, 25),
(9910, 2, 123456, '2023-11-29 12:31:13', '2023-11-29 18:54:32', 458, '2023-11-29 12:31:13', 0, 999999, 76.6519),
(9911, 2, 123456, '2023-11-29 12:31:14', '2023-11-29 18:57:08', 459, '2023-11-29 12:31:14', 0, 308588, 25),
(9912, 2, 123456, '2023-11-29 12:31:14', '2023-11-29 18:57:35', 460, '2023-11-29 12:31:14', 0, 999999, 77.2653),
(9913, 2, 123456, '2023-11-29 12:31:14', '0000-00-00 00:00:00', 461, '2023-11-29 12:31:14', 1, NULL, NULL),
(9914, 2, 123456, '2023-11-29 12:31:14', '0000-00-00 00:00:00', 462, '2023-11-29 12:31:14', 1, NULL, NULL),
(9915, 2, 123456, '2023-11-29 12:33:43', '2023-11-29 19:22:57', 463, '2023-11-29 12:33:43', 0, 999999, 81.8247),
(9916, 2, 123456, '2023-11-29 12:37:16', '0000-00-00 00:00:00', 464, '2023-11-29 12:37:16', 1, NULL, NULL),
(9917, 2, 123456, '2023-11-29 12:39:42', '0000-00-00 00:00:00', 465, '2023-11-29 12:39:42', 1, NULL, NULL),
(9918, 2, 123456, '2023-11-29 12:39:43', '0000-00-00 00:00:00', 466, '2023-11-29 12:39:43', 1, NULL, NULL),
(9919, 2, 123456, '2023-11-29 12:39:49', '0000-00-00 00:00:00', 467, '2023-11-29 12:39:49', 1, NULL, NULL),
(9920, 2, 123456, '2023-11-29 13:05:37', '0000-00-00 00:00:00', 468, '2023-11-29 13:05:37', 1, NULL, NULL),
(9921, 2, 123456, '2023-11-29 13:05:59', '0000-00-00 00:00:00', 469, '2023-11-29 13:05:59', 1, NULL, NULL),
(9922, 2, 123456, '2023-11-29 13:09:20', '0000-00-00 00:00:00', 470, '2023-11-29 13:09:20', 1, NULL, NULL),
(9923, 2, 123456, '2023-11-29 13:09:20', '0000-00-00 00:00:00', 471, '2023-11-29 13:09:20', 1, NULL, NULL),
(9924, 2, 123456, '2023-11-29 13:09:27', '0000-00-00 00:00:00', 472, '2023-11-29 13:09:27', 1, NULL, NULL),
(9925, 2, 123456, '2023-11-29 13:43:34', '0000-00-00 00:00:00', 473, '2023-11-29 13:43:34', 1, NULL, NULL),
(9926, 2, 123456, '2023-11-29 13:43:41', '0000-00-00 00:00:00', 474, '2023-11-29 13:43:41', 1, NULL, NULL),
(9927, 2, 123456, '2023-11-29 13:43:49', '0000-00-00 00:00:00', 475, '2023-11-29 13:43:49', 1, NULL, NULL),
(9928, 2, 123456, '2023-11-29 13:43:52', '0000-00-00 00:00:00', 476, '2023-11-29 13:43:52', 1, NULL, NULL),
(9929, 2, 123456, '2023-11-29 13:43:56', '0000-00-00 00:00:00', 477, '2023-11-29 13:43:56', 1, NULL, NULL),
(9930, 2, 123456, '2023-11-29 13:44:04', '0000-00-00 00:00:00', 478, '2023-11-29 13:44:04', 1, NULL, NULL),
(9931, 2, 123456, '2023-11-29 13:45:23', '0000-00-00 00:00:00', 479, '2023-11-29 13:45:23', 1, NULL, NULL),
(9932, 2, 123456, '2023-11-29 13:48:03', '0000-00-00 00:00:00', 480, '2023-11-29 13:48:03', 1, NULL, NULL),
(9933, 2, 123456, '2023-11-29 13:48:06', '0000-00-00 00:00:00', 481, '2023-11-29 13:48:06', 1, NULL, NULL),
(9934, 2, 123456, '2023-11-29 13:48:35', '0000-00-00 00:00:00', 482, '2023-11-29 13:48:35', 1, NULL, NULL),
(9935, 2, 123456, '2023-11-29 13:48:38', '0000-00-00 00:00:00', 483, '2023-11-29 13:48:38', 1, NULL, NULL),
(9936, 2, 123456, '2023-11-29 13:48:38', '0000-00-00 00:00:00', 484, '2023-11-29 13:48:38', 1, NULL, NULL),
(9937, 2, 123456, '2023-11-29 13:48:39', '0000-00-00 00:00:00', 485, '2023-11-29 13:48:39', 1, NULL, NULL),
(9938, 2, 123456, '2023-11-29 13:48:43', '0000-00-00 00:00:00', 486, '2023-11-29 13:48:43', 1, NULL, NULL),
(9939, 2, 123456, '2023-11-29 13:48:49', '0000-00-00 00:00:00', 487, '2023-11-29 13:48:49', 1, NULL, NULL),
(9940, 2, 123456, '2023-11-29 13:48:52', '0000-00-00 00:00:00', 488, '2023-11-29 13:48:52', 1, NULL, NULL),
(9941, 2, 123456, '2023-11-29 13:49:30', '0000-00-00 00:00:00', 489, '2023-11-29 13:49:30', 1, NULL, NULL),
(9942, 2, 123456, '2023-11-29 13:57:35', '0000-00-00 00:00:00', 490, '2023-11-29 13:57:35', 1, NULL, NULL),
(9943, 2, 123456, '2023-11-29 14:06:42', '0000-00-00 00:00:00', 491, '2023-11-29 14:06:42', 1, NULL, NULL),
(9944, 2, 123456, '2023-11-29 14:09:53', '0000-00-00 00:00:00', 492, '2023-11-29 14:09:53', 1, NULL, NULL),
(9945, 2, 123456, '2023-11-29 14:09:58', '0000-00-00 00:00:00', 493, '2023-11-29 14:09:58', 1, NULL, NULL),
(9946, 2, 123456, '2023-11-29 14:10:04', '0000-00-00 00:00:00', 494, '2023-11-29 14:10:04', 1, NULL, NULL),
(9947, 2, 123456, '2023-11-29 14:13:25', '0000-00-00 00:00:00', 495, '2023-11-29 14:13:25', 1, NULL, NULL),
(9948, 2, 123456, '2023-11-29 14:14:16', '0000-00-00 00:00:00', 496, '2023-11-29 14:14:16', 1, NULL, NULL),
(9949, 2, 123456, '2023-11-29 14:17:23', '0000-00-00 00:00:00', 497, '2023-11-29 14:17:23', 1, NULL, NULL),
(9950, 2, 123456, '2023-11-29 14:27:42', '0000-00-00 00:00:00', 498, '2023-11-29 14:27:42', 1, NULL, NULL),
(9951, 2, 123456, '2023-11-29 14:28:10', '0000-00-00 00:00:00', 499, '2023-11-29 14:28:10', 1, NULL, NULL),
(9952, 2, 123456, '2023-11-29 14:29:42', '0000-00-00 00:00:00', 500, '2023-11-29 14:29:42', 1, NULL, NULL),
(9953, 2, 123456, '2023-11-29 14:29:45', '0000-00-00 00:00:00', 501, '2023-11-29 14:29:45', 1, NULL, NULL),
(9954, 2, 123456, '2023-11-29 14:30:23', '0000-00-00 00:00:00', 502, '2023-11-29 14:30:23', 1, NULL, NULL),
(9955, 2, 123456, '2023-11-29 14:31:02', '0000-00-00 00:00:00', 503, '2023-11-29 14:31:02', 1, NULL, NULL),
(9956, 2, 123456, '2023-11-29 14:37:01', '0000-00-00 00:00:00', 504, '2023-11-29 14:37:01', 1, NULL, NULL),
(9957, 2, 123456, '2023-11-29 14:38:06', '0000-00-00 00:00:00', 505, '2023-11-29 14:38:06', 1, NULL, NULL),
(9958, 2, 123456, '2023-11-29 14:43:12', '0000-00-00 00:00:00', 506, '2023-11-29 14:43:12', 1, NULL, NULL),
(9959, 2, 123456, '2023-11-29 14:44:56', '0000-00-00 00:00:00', 507, '2023-11-29 14:44:56', 1, NULL, NULL),
(9960, 2, 123456, '2023-11-29 14:56:46', '0000-00-00 00:00:00', 508, '2023-11-29 14:56:46', 1, NULL, NULL),
(9961, 2, 123456, '2023-11-29 15:02:05', '0000-00-00 00:00:00', 509, '2023-11-29 15:02:05', 1, NULL, NULL),
(9962, 2, 123456, '2023-11-29 15:05:02', '0000-00-00 00:00:00', 510, '2023-11-29 15:05:02', 1, NULL, NULL),
(9963, 2, 123456, '2023-11-29 15:05:33', '0000-00-00 00:00:00', 511, '2023-11-29 15:05:33', 1, NULL, NULL),
(9964, 2, 123456, '2023-11-29 15:06:00', '0000-00-00 00:00:00', 512, '2023-11-29 15:06:00', 1, NULL, NULL),
(9965, 2, 123456, '2023-11-29 15:06:50', '0000-00-00 00:00:00', 513, '2023-11-29 15:06:50', 1, NULL, NULL),
(9966, 2, 123456, '2023-11-29 15:09:41', '0000-00-00 00:00:00', 514, '2023-11-29 15:09:41', 1, NULL, NULL),
(9967, 2, 123456, '2023-11-29 15:10:07', '0000-00-00 00:00:00', 515, '2023-11-29 15:10:07', 1, NULL, NULL),
(9968, 2, 123456, '2023-11-29 16:23:08', '0000-00-00 00:00:00', 516, '2023-11-29 16:23:08', 1, NULL, NULL),
(9969, 2, 123456, '2023-11-29 16:23:39', '0000-00-00 00:00:00', 517, '2023-11-29 16:23:39', 1, NULL, NULL),
(9970, 2, 123456, '2023-11-29 16:31:26', '0000-00-00 00:00:00', 518, '2023-11-29 16:31:26', 1, NULL, NULL),
(9971, 2, 123456, '2023-11-29 16:33:23', '0000-00-00 00:00:00', 519, '2023-11-29 16:33:23', 1, NULL, NULL),
(9972, 2, 123456, '2023-11-29 17:09:21', '0000-00-00 00:00:00', 520, '2023-11-29 17:09:21', 1, NULL, NULL),
(9973, 2, 123456, '2023-11-29 19:01:41', '0000-00-00 00:00:00', 521, '2023-11-29 19:01:41', 1, NULL, NULL),
(9974, 2, 123456, '2023-11-29 19:02:39', '0000-00-00 00:00:00', 522, '2023-11-29 19:02:39', 1, NULL, NULL),
(9975, 2, 123456, '2023-11-29 19:18:51', '0000-00-00 00:00:00', 523, '2023-11-29 19:18:51', 1, NULL, NULL),
(9976, 2, 123456, '2023-11-29 19:22:10', '0000-00-00 00:00:00', 524, '2023-11-29 19:22:10', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_cajones`
--

CREATE TABLE `tipos_cajones` (
  `id_Cajon` int(11) NOT NULL COMMENT 'Tipo de cajon',
  `desc_Cajon` mediumtext NOT NULL COMMENT 'Descripcion del tipo de cajon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_cajones`
--

INSERT INTO `tipos_cajones` (`id_Cajon`, `desc_Cajon`) VALUES
(1, 'Exclusivo'),
(2, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clientes`
--

CREATE TABLE `tipos_clientes` (
  `tipo_Cliente` int(11) NOT NULL,
  `desc_Cliente` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_clientes`
--

INSERT INTO `tipos_clientes` (`tipo_Cliente`, `desc_Cliente`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administrativo'),
(4, 'Academico'),
(5, 'libre'),
(6, 'Cortesia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estacionamientos`
--

CREATE TABLE `tipos_estacionamientos` (
  `tipo_Est` int(11) NOT NULL COMMENT 'Tipo de estacionamiento',
  `desc_Esta` mediumtext NOT NULL COMMENT 'Descripción del estacionamiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_estacionamientos`
--

INSERT INTO `tipos_estacionamientos` (`tipo_Est`, `desc_Esta`) VALUES
(1, 'Cobro'),
(2, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `pago_Cliente` int(11) NOT NULL,
  `desc_PCliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`pago_Cliente`, `desc_PCliente`) VALUES
(1, 'Nomina'),
(2, 'Depósito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tipo_User` int(1) NOT NULL COMMENT 'Tipo de usuario',
  `desc_User` varchar(20) NOT NULL COMMENT 'Descripción del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tipo_User`, `desc_User`) VALUES
(1, 'Administrador'),
(2, 'Caseta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_User` int(8) NOT NULL COMMENT 'Identificador único de usuario',
  `nom_User` varchar(30) NOT NULL COMMENT 'Nombre del usuario',
  `ap_PatU` varchar(20) NOT NULL COMMENT 'Apellido paterno del usuario',
  `ap_MatU` varchar(20) NOT NULL COMMENT 'Apellido materno del usuario',
  `tipo_User` int(11) NOT NULL COMMENT 'Tipo de usuario',
  `correo_User` mediumtext NOT NULL COMMENT 'Correo del usuario',
  `tel_User` bigint(20) NOT NULL COMMENT 'Telefono del usuario',
  `act_User` tinyint(1) NOT NULL COMMENT 'Verificador de actividad del usuario',
  `pass_User` varchar(12) NOT NULL COMMENT 'Contraseña del usuario',
  `corte_Act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_User`, `nom_User`, `ap_PatU`, `ap_MatU`, `tipo_User`, `correo_User`, `tel_User`, `act_User`, `pass_User`, `corte_Act`) VALUES
(123456, 'Carlos', 'Martinez', 'Solis', 2, 'carlos@gmail.com', 9876543210, 1, 'hola123', 0),
(193782, 'Pedro', 'Lopez', 'Perez', 1, 'juan@gmail.com', 4444462012, 1, 'qwerty123456', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajones`
--
ALTER TABLE `cajones`
  ADD PRIMARY KEY (`id_Cajon`),
  ADD KEY `fk_caj_type` (`tipo_Cajon`),
  ADD KEY `fk_caj_est` (`cve_Est`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`),
  ADD KEY `fk_cl_cre` (`id_Credencial`),
  ADD KEY `fk_cl_type` (`tipo_Cliente`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_Contrato`),
  ADD KEY `fk_con_cli` (`id_Cliente`),
  ADD KEY `fk_con_typec` (`tipo_Cajon`),
  ADD KEY `fk_con_typep` (`pago_Cliente`);

--
-- Indices de la tabla `cortes_caja`
--
ALTER TABLE `cortes_caja`
  ADD PRIMARY KEY (`num_Corte`),
  ADD KEY `fk_cc_usuario` (`id_User`);

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`id_Credencial`);

--
-- Indices de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
  ADD PRIMARY KEY (`cve_Est`),
  ADD KEY `fk_est_type` (`tipo_Est`);

--
-- Indices de la tabla `historial_clientes`
--
ALTER TABLE `historial_clientes`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_Ticket`),
  ADD KEY `ff_tick_est` (`cve_Est`);

--
-- Indices de la tabla `tipos_cajones`
--
ALTER TABLE `tipos_cajones`
  ADD PRIMARY KEY (`id_Cajon`);

--
-- Indices de la tabla `tipos_clientes`
--
ALTER TABLE `tipos_clientes`
  ADD PRIMARY KEY (`tipo_Cliente`);

--
-- Indices de la tabla `tipos_estacionamientos`
--
ALTER TABLE `tipos_estacionamientos`
  ADD PRIMARY KEY (`tipo_Est`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`pago_Cliente`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipo_User`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_User`),
  ADD KEY `fk_usuarios_tipo_usuario` (`tipo_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_Contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cortes_caja`
--
ALTER TABLE `cortes_caja`
  MODIFY `num_Corte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número de corte de caja', AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `id_Credencial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928375770;

--
-- AUTO_INCREMENT de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
  MODIFY `cve_Est` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico de cada estacionamiento', AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `historial_clientes`
--
ALTER TABLE `historial_clientes`
  MODIFY `id_historial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_Ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9977;

--
-- AUTO_INCREMENT de la tabla `tipos_cajones`
--
ALTER TABLE `tipos_cajones`
  MODIFY `id_Cajon` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tipo de cajon', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_clientes`
--
ALTER TABLE `tipos_clientes`
  MODIFY `tipo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `pago_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tipo_User` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Tipo de usuario', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_User` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de usuario', AUTO_INCREMENT=312310;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajones`
--
ALTER TABLE `cajones`
  ADD CONSTRAINT `fk_caj_est` FOREIGN KEY (`cve_Est`) REFERENCES `estacionamientos` (`cve_Est`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_caj_type` FOREIGN KEY (`tipo_Cajon`) REFERENCES `tipos_cajones` (`id_Cajon`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cl_cre` FOREIGN KEY (`id_Credencial`) REFERENCES `credencial` (`id_Credencial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cl_type` FOREIGN KEY (`tipo_Cliente`) REFERENCES `tipos_clientes` (`tipo_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `fk_con_cli` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_con_typec` FOREIGN KEY (`tipo_Cajon`) REFERENCES `tipos_cajones` (`id_Cajon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_con_typep` FOREIGN KEY (`pago_Cliente`) REFERENCES `tipo_pago` (`pago_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cortes_caja`
--
ALTER TABLE `cortes_caja`
  ADD CONSTRAINT `fk_cc_usuario` FOREIGN KEY (`id_User`) REFERENCES `usuarios` (`id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
  ADD CONSTRAINT `fk_est_type` FOREIGN KEY (`tipo_Est`) REFERENCES `tipos_estacionamientos` (`tipo_Est`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ff_tick_est` FOREIGN KEY (`cve_Est`) REFERENCES `estacionamientos` (`cve_Est`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ff_tick_user` FOREIGN KEY (`id_User`) REFERENCES `usuarios` (`id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_tipo_usuario` FOREIGN KEY (`tipo_User`) REFERENCES `tipo_usuario` (`tipo_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
