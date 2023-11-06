-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 21:49:19
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
(165734, 'Roberto', 'Llanas', 'Márquez', 'LWUT927461RT2', 'Niño Artillero #900', 1928374587, 'rober@hotmail.com', 928375767, 1, 0),
(308588, 'José Eduardo', 'Sánchez', 'Sifuentes', 'SSJE010416FDA', 'Socrates #485, colonia progreso', 12345678, 'A308588@alumnos.uaslp.mx', 928375767, 1, 0),
(746352, 'Lola Jimena', 'Vaca', 'Domínguez', 'ASDF283459QW1', 'Manuel Nava #200', 2147483647, 'ljvd@outlook.com', 928375769, 1, 1),
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
(2, 987654, 'Toyota Tacoma color verde', 2, '2023-09-03', '0000-00-00', 0, 2),
(3, 746352, 'Nissan Tsuru, Negro', 2, '2023-10-29', '2024-10-29', 0, 1),
(7, 165734, 'Ford Raptor, Café', 2, '2023-10-29', '2024-10-29', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes_caja`
--
-- Creación: 01-11-2023 a las 04:20:45
--

CREATE TABLE `cortes_caja` (
  `num_Corte` int(11) NOT NULL COMMENT 'Número de corte de caja',
  `id_User` int(11) NOT NULL COMMENT 'Identificador unico de usuario',
  `inicio_Turno` datetime NOT NULL COMMENT 'Inicio de turno de trabajo',
  `fin_Turno` datetime NOT NULL COMMENT 'Fin de turno de trabajo',
  `autos_Salida` int(11) NOT NULL COMMENT 'Total de autos que han salido',
  `tickets_Canc` int(11) NOT NULL COMMENT 'Tickets cancelados durante el turno',
  `efectivo` float NOT NULL COMMENT 'Cantidad pagada en efectivo durante el turno',
  `depos` int(11) NOT NULL COMMENT 'Total de comprobantes de pago de mes durante el turno',
  `total_Corte` float NOT NULL COMMENT 'Cantidad total acumulada durante el corte.',
  `corte_Act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cortes_caja`
--

INSERT INTO `cortes_caja` (`num_Corte`, `id_User`, `inicio_Turno`, `fin_Turno`, `autos_Salida`, `tickets_Canc`, `efectivo`, `depos`, `total_Corte`, `corte_Act`) VALUES
(90, 123456, '2023-09-01 00:00:00', '2023-09-01 00:00:00', 100, 5, 4570, 3, 6000, 0);

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
(827463521, 'Leonardo Mendoza'),
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
-- Estructura de tabla para la tabla `porcentajes`
--
-- Creación: 06-11-2023 a las 20:44:35
--

CREATE TABLE `porcentajes` (
  `num_Porc` int(11) NOT NULL,
  `tipo_Est` int(11) NOT NULL,
  `cant_Docs` int(11) NOT NULL,
  `cant_Admins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(123458, 'Lalo', 'Sifuentes', 'Castro', 1, 'eduardo15@gmail.com', 1234567891, 0, 'cvbnmkuyqw3$'),
(193782, 'Pedro', 'Lopez', 'Perez', 1, 'juan@gmail.com', 4444462012, 1, 'qwerty123456'),
(313131, 'Rogelio', 'Guerra', 'Cruz', 1, '123@ada.com', 3456789098, 0, 'asdfghjklq1!');

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
-- Indices de la tabla `porcentajes`
--
ALTER TABLE `porcentajes`
  ADD PRIMARY KEY (`num_Porc`),
  ADD KEY `tipo_Est` (`tipo_Est`);

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
  MODIFY `id_Contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT de la tabla `porcentajes`
--
ALTER TABLE `porcentajes`
  MODIFY `num_Porc` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_User` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de usuario', AUTO_INCREMENT=313132;

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
-- Filtros para la tabla `porcentajes`
--
ALTER TABLE `porcentajes`
  ADD CONSTRAINT `porc_tipoEst` FOREIGN KEY (`tipo_Est`) REFERENCES `tipos_estacionamientos` (`tipo_Est`) ON DELETE CASCADE ON UPDATE CASCADE;

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
--
-- Base de datos: `kardex_escolar`
--
CREATE DATABASE IF NOT EXISTS `kardex_escolar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kardex_escolar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--
-- Creación: 01-11-2023 a las 17:23:02
--

CREATE TABLE `alumnos` (
  `cve_Alumno` int(11) NOT NULL,
  `nom_Al` varchar(25) NOT NULL,
  `ap_Pat` varchar(15) NOT NULL,
  `ap_Mat` varchar(15) NOT NULL,
  `facultad` varchar(25) NOT NULL,
  `carrera` varchar(25) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cve_Alumno`, `nom_Al`, `ap_Pat`, `ap_Mat`, `facultad`, `carrera`, `semestre`) VALUES
(23456, 'Luz Elena', 'Pérez', 'López', 'Ingeniería', 'Ing. Telecomunicacione', 1),
(98745, 'Miguel', 'Mata', 'Vega', 'Ingeniería', 'Ing. Telecomunicaciones', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--
-- Creación: 01-11-2023 a las 17:17:38
--

CREATE TABLE `calificaciones` (
  `id_Cali` int(11) NOT NULL,
  `cve_Alumno` int(11) NOT NULL,
  `cve_Materia` int(11) NOT NULL,
  `cali_Ord` int(11) NOT NULL,
  `cali_Extra` int(11) NOT NULL,
  `cali_Titulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_Cali`, `cve_Alumno`, `cve_Materia`, `cali_Ord`, `cali_Extra`, `cali_Titulo`) VALUES
(1, 23456, 1, 80, 0, 0),
(2, 98745, 1, 55, 60, 0),
(3, 23456, 2, 90, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--
-- Creación: 01-11-2023 a las 17:00:33
--

CREATE TABLE `cursos` (
  `cve_Materia` int(11) NOT NULL,
  `nom_Materia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cve_Materia`, `nom_Materia`) VALUES
(1, 'Tecnologías de Internet'),
(2, 'Sistemas de Información');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`cve_Alumno`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_Cali`),
  ADD KEY `cve_Alumno` (`cve_Alumno`),
  ADD KEY `cve_Materia` (`cve_Materia`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cve_Materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `cve_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98746;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_Cali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cve_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `cali_Alumno` FOREIGN KEY (`cve_Alumno`) REFERENCES `alumnos` (`cve_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cali_Materia` FOREIGN KEY (`cve_Materia`) REFERENCES `cursos` (`cve_Materia`);
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- Volcado de datos para la tabla `pma__central_columns`
--

INSERT INTO `pma__central_columns` (`db_name`, `col_name`, `col_type`, `col_length`, `col_collation`, `col_isNull`, `col_extra`, `col_default`) VALUES
('estacionamientobd', 'auto_Cliente', 'mediumtext', '', 'utf8mb4_general_ci', 0, ',', ''),
('estacionamientobd', 'fechacont_Cliente', 'date', '', '', 0, ',', ''),
('estacionamientobd', 'id_Cliente', 'int', '11', '', 0, ',', ''),
('estacionamientobd', 'id_Contrato', 'int', '11', '', 0, 'auto_increment,', ''),
('estacionamientobd', 'pago_Cliente', 'int', '11', '', 0, ',', ''),
('estacionamientobd', 'tipo_Cajon', 'int', '11', '', 0, ',', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--
-- Creación: 07-09-2023 a las 20:06:55
-- Última actualización: 06-11-2023 a las 20:42:36
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"estacionamientobd\",\"table\":\"porcentajes\"},{\"db\":\"estacionamientobd\",\"table\":\"tipos_estacionamientos\"},{\"db\":\"estacionamientobd\",\"table\":\"estacionamientos\"},{\"db\":\"kardex_escolar\",\"table\":\"calificaciones\"},{\"db\":\"kardex_escolar\",\"table\":\"alumnos\"},{\"db\":\"kardex_escolar\",\"table\":\"cursos\"},{\"db\":\"kardex_escolar\",\"table\":\"Alumnos\"},{\"db\":\"estacionamientobd\",\"table\":\"cortes_caja\"},{\"db\":\"estacionamientobd\",\"table\":\"usuarios\"},{\"db\":\"estacionamientobd\",\"table\":\"contratos\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--
-- Creación: 07-09-2023 a las 20:06:56
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--
-- Creación: 07-09-2023 a las 20:06:55
-- Última actualización: 06-11-2023 a las 20:39:26
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-11-06 20:39:26', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"NavigationWidth\":186}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--
-- Creación: 07-09-2023 a las 20:06:55
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
