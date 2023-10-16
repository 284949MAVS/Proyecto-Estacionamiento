-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 06:25:16
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
-- Creación: 07-09-2023 a las 20:14:34
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
(987, 100, 115, 1, 0),
(988, 200, 430, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--
-- Creación: 02-10-2023 a las 04:49:15
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
(308588, 'José Eduardo', 'Sánchez', 'Sifuentes', 'SSJE010416FDA', 'Socrates #485, colonia progreso', 12345678, 'A308588@alumnos.uaslp.mx', 928375767, 1, 0),
(987654, 'Lola', 'Perez', 'Ortiz', 'OPLO123456WE3', 'Av. Manuel Nava #223', 12345679, 'lola@gmail.com', 928375769, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--
-- Creación: 05-10-2023 a las 05:26:19
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
(1, 308588, 'Mazda 3, color rojo', 1, '2023-09-03', '0000-00-00', 0, 1),
(2, 987654, 'Toyota Tacoma color verde', 2, '2023-09-03', '0000-00-00', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes_caja`
--
-- Creación: 07-09-2023 a las 20:14:34
--

CREATE TABLE `cortes_caja` (
  `num_Corte` int(11) NOT NULL COMMENT 'Número de corte de caja',
  `id_User` int(11) NOT NULL COMMENT 'Identificador unico de usuario',
  `inicio_Turno` date NOT NULL COMMENT 'Inicio de turno de trabajo',
  `fin_Turno` date NOT NULL COMMENT 'Fin de turno de trabajo',
  `autos_Salida` int(11) NOT NULL COMMENT 'Total de autos que han salido',
  `tickets_Canc` int(11) NOT NULL COMMENT 'Tickets cancelados durante el turno',
  `efectivo` float NOT NULL COMMENT 'Cantidad pagada en efectivo durante el turno',
  `depos` int(11) NOT NULL COMMENT 'Total de comprobantes de pago de mes durante el turno',
  `total_Corte` float NOT NULL COMMENT 'Cantidad total acumulada durante el corte.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cortes_caja`
--

INSERT INTO `cortes_caja` (`num_Corte`, `id_User`, `inicio_Turno`, `fin_Turno`, `autos_Salida`, `tickets_Canc`, `efectivo`, `depos`, `total_Corte`) VALUES
(90, 123456, '2023-09-01', '2023-09-01', 100, 5, 4570, 3, 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--
-- Creación: 07-09-2023 a las 20:14:34
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
-- Creación: 07-09-2023 a las 20:14:34
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
(100, 1, 'Av. Niño Artillero, frente a los edificios del DUI', 450),
(200, 2, 'Av. Niño Artillero frente al estacionamiento de cobro.', 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--
-- Creación: 07-09-2023 a las 20:14:34
--

CREATE TABLE `tickets` (
  `id_Ticket` int(11) NOT NULL,
  `cve_Est` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `hr_Ent` time NOT NULL,
  `hr_Sal` time NOT NULL,
  `num_Cajon` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_Ticket`, `cve_Est`, `id_User`, `hr_Ent`, `hr_Sal`, `num_Cajon`, `fecha`, `status`) VALUES
(8567, 100, 123456, '11:37:27', '24:37:27', 430, '2023-09-04 00:37:27', 1),
(9876, 200, 193782, '11:37:27', '24:37:27', 115, '2023-09-04 00:38:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_cajones`
--
-- Creación: 07-09-2023 a las 20:14:34
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
-- Creación: 07-09-2023 a las 20:14:34
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
(3, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estacionamientos`
--
-- Creación: 07-09-2023 a las 20:14:34
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
-- Creación: 07-09-2023 a las 20:14:34
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
-- Creación: 07-09-2023 a las 20:14:34
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
-- Creación: 07-09-2023 a las 20:14:34
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
  `pass_User` varchar(12) NOT NULL COMMENT 'Contraseña del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_User`, `nom_User`, `ap_PatU`, `ap_MatU`, `tipo_User`, `correo_User`, `tel_User`, `act_User`, `pass_User`) VALUES
(123456, 'Carlos', 'Martinez', 'Solis', 2, 'carlos@gmail.com', 9876543210, 1, 'zxcvbn098765'),
(193782, 'Pedro', 'Lopez', 'Perez', 1, 'juan@gmail.com', 4444462012, 1, 'qwerty123456');

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
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_Ticket`),
  ADD KEY `ff_tick_est` (`cve_Est`),
  ADD KEY `ff_tick_user` (`id_User`);

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
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987655;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_Contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cortes_caja`
--
ALTER TABLE `cortes_caja`
  MODIFY `num_Corte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número de corte de caja', AUTO_INCREMENT=91;

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
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_Ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9877;

--
-- AUTO_INCREMENT de la tabla `tipos_cajones`
--
ALTER TABLE `tipos_cajones`
  MODIFY `id_Cajon` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tipo de cajon', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_clientes`
--
ALTER TABLE `tipos_clientes`
  MODIFY `tipo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
