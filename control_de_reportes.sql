-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2021 a las 05:31:27
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_de_reportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `identificador` varchar(15) NOT NULL,
  `adscripcion` text NOT NULL,
  `id_sub` int(10) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `identificador`, `adscripcion`, `id_sub`, `estado`) VALUES
(0, '0', '0', 0, 1),
(1, '8.1.', 'Dirección General de la Agencia Federal de Aviación Civil', 0, 0),
(2, '8.2.  ', 'Dirección Ejecutiva de Seguridad Aérea', 0, 0),
(3, '8.2.1.   ', 'Dirección de Seguridad Aérea', 0, 0),
(4, '8.2.1.1. ', 'Subdirección de Seguridad Aérea', 0, 0),
(5, '8.2.1.1.1. ', 'Departamento de Inspección', 0, 0),
(6, '8.2.1.2. ', 'Subdirección de Normas', 0, 0),
(7, '8.2.1.2.1. ', 'Departamento de Coordinación de Áreas Foráneas', 0, 0),
(8, '8.2.1.2.2. ', 'Departamento Técnico', 0, 0),
(9, '8.2.1.3. ', 'Subdirección de Certificación de Licencias', 0, 0),
(10, '8.2.1.3.1. ', 'Departamento de Certificación de Estudio', 0, 0),
(11, '8.2.1.4. ', 'Subdirección de Certificación SMS', 0, 0),
(12, '8.2.1.4.1. ', 'Departamento de Certificación SMS Talleres, Taxis Aéreos y Aeronaves XC', 0, 0),
(13, '8.2.1.4.2. ', 'Departamento de Certificación SMS Aerolíneas y Centros de Adiestramiento', 0, 0),
(14, '8.2.1.4.3. ', 'Departamento de Certificación SMS Aeropuertos y SENEAM', 0, 0),
(15, '8.2.1.5. ', 'Subdirección de Vigilancia SMS', 0, 0),
(16, '8.2.1.5.1. ', 'Departamento de Vigilancia SMS de Talleres, Taxis Aéreos y Aeronaves XC', 0, 0),
(17, '8.2.1.5.2. ', 'Departamento de Vigilancia SMS Aerolíneas y Centros de Adiestramiento', 0, 0),
(18, '8.2.1.5.3. ', 'Departamento de Vigilancia SMS Aeropuertos y SENEAM', 0, 0),
(19, '8.2.1.6. ', 'Subdirección SSP', 0, 0),
(20, '8.2.1.6.1. ', 'Departamento de Planificación y Vigilancia del SSP', 0, 0),
(21, '8.2.1.6.2. ', 'Departamento de Auditoría y Comunicación del SSP', 0, 0),
(22, '8.2.1.7. ', 'Departamento de Gestión de Riesgos de Aerolíneas y Centros de Adiestramiento', 0, 0),
(23, '8.2.1.8. ', 'Departamento de Gestión de Riesgos de Aeropuertos y SENEAM', 0, 0),
(24, '8.2.1.9. ', 'Departamento Jurídico y Gestión de Riesgos de Taxis Aeronáuticos y Operadores Aéreos XC', 0, 0),
(25, '8.2.2.   ', 'Dirección de Verificación Aeroportuaria', 0, 0),
(26, '8.2.2.1. ', 'Subdirección de Soporte Operativo', 0, 0),
(27, '8.2.2.1.1. ', 'Departamento de Programación de Rutas y Logística', 0, 0),
(28, '8.2.2.1.2. ', 'Departamento de Mantenimiento y Reparación de Aeronaves', 0, 0),
(29, '8.2.2.1.3. ', 'Departamento de Sistemas Eléctricos y Electrónicos', 0, 0),
(30, '8.2.2.1.4. ', 'Departamento de Taller', 0, 0),
(31, '8.2.2.2. ', 'Subdirección \"A, B, C, D\" de Verificación Aeroportuaria', 0, 0),
(32, '8.2.2.2.1. ', 'Departamento \"A, B, C, D\" de Verificación Aeroportuaria', 0, 0),
(33, '8.2.3.   ', 'Dirección de Seguridad de la Aviación Civil', 0, 0),
(34, '8.2.3.1. ', 'Departamento Técnico de Seguridad', 0, 0),
(35, '8.2.4.   ', 'Dirección de Aeropuertos', 0, 0),
(36, '8.2.4.1. ', 'Subdirección de Aeropuertos y Servicios', 0, 0),
(37, '8.2.4.1.1. ', 'Departamento Operacional', 0, 0),
(38, '8.2.4.2. ', 'Subdirección de Infraestructura', 0, 0),
(39, '8.2.4.2.1. ', 'Departamento de Infraestructura', 0, 0),
(40, '8.2.4.2.2. ', 'Departamento de Aeródromos y Helipuertos', 0, 0),
(41, '8.2.4.3. ', 'Subdirección de Evaluación de Programas Maestros de Desarrollo', 0, 0),
(42, '8.2.4.3.1. ', 'Departamento de Evaluaciones de Concesiones.', 0, 0),
(43, '8.2.5.   ', 'Dirección de Certificación de Licencias', 0, 0),
(44, '8.2.5.1. ', 'Subdirección de Licencias Foráneas', 0, 0),
(45, '8.2.5.2. ', 'Subdirección de Escuelas', 0, 0),
(46, '8.2.5.3. ', 'Subdirección de Exámenes', 0, 0),
(47, '8.2.6.   ', 'Comandancia General del AICM', 0, 0),
(48, '8.2.6.1. ', 'Departamento de Coordinación de Supervisión y Verificación', 0, 0),
(49, '8.2.6.2. ', 'Departamento de Coordinación de Operaciones y Mantenimiento', 0, 0),
(50, '8.2.6.3. ', 'Comandancia de Aeropuerto Terminal II', 0, 0),
(51, '8.2.7.   ', 'Comandancia de Aeropuerto', 0, 0),
(52, '8.2.8.   ', 'Comandancia Regional I, II, III, IV, V y VI', 0, 0),
(53, '8.3.  ', 'Dirección Ejecutiva de Aviación', 0, 0),
(54, '8.3.1.   ', 'Dirección de Aviación', 0, 0),
(55, '8.3.1.1. ', 'Subdirección de Aviación', 0, 0),
(56, '8.3.1.1.1. ', 'Departamento de Control de Tránsito Aéreo', 0, 0),
(57, '8.3.1.2. ', 'Departamento de Talleres Aeronáuticos', 0, 0),
(58, '8.3.1.3. ', 'Departamento de Ingeniería', 0, 0),
(59, '8.3.1.4. ', 'Departamento de Ingeniería \"A\"', 0, 0),
(60, '8.3.2.   ', 'Dirección de Ingeniería, Normas y Certificación', 0, 0),
(61, '8.3.2.1. ', 'Subdirección de Aeronavegabilidad', 0, 0),
(62, '8.3.2.2. ', 'Subdirección de Certificación de Aeronaves, Motores y Hélice', 0, 0),
(63, '8.3.2.3. ', 'Subdirección de Ingeniería de Certificación', 0, 0),
(64, '8.3.2.3.1. ', 'Departamento de Certificación de Producción y Aeronavegabilidad', 0, 0),
(65, '8.3.2.4. ', 'Subdirección de Ingeniería de Normas', 0, 0),
(66, '8.3.2.4.1. ', 'Departamento de Normas', 0, 0),
(67, '8.4.  ', 'Dirección Ejecutiva de Transporte y Control Aeronáutico', 0, 0),
(68, '8.4.1.   ', 'Subdirección de Aviación General', 0, 0),
(69, '8.4.1.1. ', 'Departamento de Aviación Privada', 0, 0),
(70, '8.4.2.   ', 'Subdirección de Estudios Económico-Financieros', 0, 0),
(71, '8.4.2.1. ', 'Departamento de Análisis Financiero', 0, 0),
(72, '8.4.3.   ', 'Subdirección de Aviación Regular', 0, 0),
(73, '8.4.3.1. ', 'Departamento de Transporte Aéreo Internacional', 0, 0),
(74, '8.4.4.   ', 'Departamento de Validación del Registro Aeronáutico Mexicano', 0, 0),
(75, '8.4.5.   ', 'Departamento de Operación del Registro Aeronáutico Mexicano', 0, 0),
(76, '8.4.6.   ', 'Departamento de Convenios', 0, 0),
(77, '8.4.7.   ', 'Departamento de Empresas de Fletamento', 0, 0),
(78, '8.5.  ', 'Dirección Ejecutiva Técnica', 0, 0),
(79, '8.5.1.   ', 'Dirección de Tarifas', 0, 0),
(80, '8.5.1.1. ', 'Subdirección de Tarifas de Transporte Aéreo y Aeropuertos', 0, 0),
(81, '8.5.1.1.1. ', 'Departamento de Tarifas de Transporte Aéreo', 0, 0),
(82, '8.5.1.1.2. ', 'Departamento de Tarifas de Servicios Aeroportuarios y Complementarios', 0, 0),
(83, '8.5.2.   ', 'Subdirección Jurídica Contenciosa', 0, 0),
(84, '8.5.2.1. ', 'Departamento Contencioso de Aviación y Aeropuertos', 0, 0),
(85, '8.5.2.2. ', 'Departamento Jurídico \"A\" y \"B\"', 0, 0),
(86, '8.5.3. ', 'Departamento Jurídico', 0, 0),
(87, '8.5.4. ', 'Departamento Consultivo', 0, 0),
(88, '8.5.5. ', 'Departamento Normativo', 0, 0),
(89, '8.5.6. ', 'Departamento de Organismos Internacionales', 0, 0),
(90, '8.6.  ', 'Dirección Ejecutiva como Representante Permanente en el Extranjero ante la OACI', 0, 0),
(91, '8.7.  ', 'Dirección de Administración', 0, 0),
(92, '8.7.1.   ', 'Subdirección de Recursos Humanos', 0, 0),
(93, '8.7.2.   ', 'Subdirección de Recursos Financieros', 0, 0),
(94, '8.7.2.1. ', 'Departamento de Servicios Generales', 0, 0),
(95, '8.7.2.2. ', 'Departamento de Recursos Materiales', 0, 0),
(96, '8.8.  ', 'Dirección de Análisis de Accidentes e Incidentes de Aviación', 0, 0),
(97, '8.8.1.   ', 'Departamento de Análisis de Accidentes e Incidentes de Aviación', 0, 0),
(98, '8.9.  ', 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil', 0, 0),
(99, '8.9.1.   ', 'Subdirección de Programas para la Capacitación de Autoridades Aeronáuticas', 0, 0),
(100, '8.9.1.1. ', 'Departamento Académico', 0, 0),
(101, '8.9.1.2. ', 'Departamento de Calidad en la Operación de la Capacitación Aeronáutica', 0, 0),
(102, '8.9.1.3.  ', 'Departamento de Logística para Programas Presenciales y OJT', 0, 0),
(103, '8.9.2. ', 'Subdirección de Formación Técnica Aeronáutica Especializada', 0, 0),
(104, '8.9.2.1. ', 'Departamento de Formación Técnica en Operaciones', 0, 0),
(105, '8.9.2.2. ', 'Departamento de Formación Técnica en Operaciones en Cabina', 0, 0),
(106, '8.9.2.3. ', 'Departamento de Formación Técnica en Aeronavegabilidad', 0, 0),
(107, '8.9.2.4. ', 'Departamento de Formación en Operaciones de Vuelo', 0, 0),
(108, '8.9.3. ', 'Subdirección de Diseño Pedagógico de Programas Aeronáuticos', 0, 0),
(109, '8.9.3.1. ', 'Departamento de Diseño y Evaluación de Programas de Capacitación y Seguimiento In Situ (OJT)', 0, 0),
(110, '8.9.3.2. ', 'Departamento de Diseño y Evaluación de Programación de Capacitación Aeronáutica Presencial', 0, 0),
(111, '8.10. ', 'Dirección de Control', 0, 0),
(112, '8.10.1. ', 'Subdirección de Verificación de Vuelo', 0, 0),
(113, '8.10.2. ', 'Inspector Verificador Aeronáutico de Sobrecargos', 0, 0),
(114, '8.10.3. ', 'Inspector Verificador Aeronáutico de Pilotos', 0, 0),
(115, '8.10.4. ', 'Inspector Verificador Aeronáutico de Operaciones de Vuelos de Aviación Comercial', 0, 0),
(116, '8.11. ', 'Dirección de Desarrollo Estratégico', 0, 0),
(117, '8.11.1. ', 'Subdirección de Estadística', 116, 0),
(118, '8.11.1.1. ', 'Departamento de Estadística', 117, 0),
(119, '8.11.2. ', 'Departamento de Proyectos Especiales', 0, 0),
(120, '8.11.3. ', 'Departamento de Soporte Técnico y Redes', 0, 0),
(121, '8.11.4. ', 'Departamento de Tecnología Informática y Atención a Usuarios', 0, 0),
(122, '8.11.5. ', 'Departamento de Sistemas', 0, 0),
(123, '8.12. ', 'Unidad de Gestión y Trámite', 0, 0),
(124, '8.13. ', 'Subdirección Técnica y Operativa', 0, 0),
(133, '8889', 'Sisate', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asig` int(11) NOT NULL,
  `id_equi` int(11) NOT NULL,
  `n_emp` int(11) NOT NULL,
  `proceso` varchar(13) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asig`, `id_equi`, `n_emp`, `proceso`, `estado`) VALUES
(82, 52, 12345678, 'asignado', 0),
(83, 53, 12345678, 'designado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`, `estado`) VALUES
(1, 'Director ejecutivo', 0),
(2, 'Director de área', 0),
(3, 'Subdirector', 0),
(4, 'Jefe departamento', 0),
(5, 'Enlace', 0),
(6, 'Operativo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(10) NOT NULL,
  `num_sigtic` int(10) NOT NULL,
  `num_exp` int(15) NOT NULL,
  `marca_cpu` varchar(35) NOT NULL,
  `serie_cpu` varchar(35) NOT NULL,
  `memoria_ram` varchar(15) NOT NULL,
  `procesador` varchar(15) NOT NULL,
  `velocidad_proc` varchar(15) NOT NULL,
  `uni_disc_flax` varchar(15) NOT NULL,
  `disco_duro` varchar(15) NOT NULL,
  `serie_teclado` varchar(35) NOT NULL,
  `serie_monitor` varchar(35) NOT NULL,
  `version_windows` varchar(20) NOT NULL,
  `version_office` varchar(20) NOT NULL,
  `serie_mouse` varchar(35) NOT NULL,
  `direccion_ip` varchar(15) NOT NULL,
  `nombre_equipo` varchar(25) NOT NULL,
  `servicio_internet` varchar(15) NOT NULL,
  `tipo_equipo` varchar(15) NOT NULL,
  `ubicacion` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `num_sigtic`, `num_exp`, `marca_cpu`, `serie_cpu`, `memoria_ram`, `procesador`, `velocidad_proc`, `uni_disc_flax`, `disco_duro`, `serie_teclado`, `serie_monitor`, `version_windows`, `version_office`, `serie_mouse`, `direccion_ip`, `nombre_equipo`, `servicio_internet`, `tipo_equipo`, `ubicacion`, `estado`) VALUES
(52, 0, 0, 'DELL', '7777', '0', '0', '0', '0', '0', '0', '0', 'WINDOWS 10', '0', '0', '0', '0', '0', '0', '0', 0),
(53, 0, 0, 'HP', '98798798', '0', '0', '0', '0', '0', '0', '0', 'WINDOWS 10', '0', '0', '0', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `n_reporte` int(11) NOT NULL,
  `n_empleado` int(10) NOT NULL,
  `rptTserv` varchar(20) NOT NULL COMMENT 'Tipo de servicio',
  `rptIntrv` varchar(20) NOT NULL COMMENT 'Intervención ',
  `rptDscrp` text NOT NULL COMMENT 'Descripción',
  `rptRfall` text NOT NULL COMMENT 'Respuesta de la falla',
  `rptRxtrn` text NOT NULL COMMENT 'Respuesta externa',
  `rptFinic` date NOT NULL,
  `rptHrini` varchar(15) NOT NULL,
  `rptFtrmi` date NOT NULL,
  `rptHrtrm` varchar(15) NOT NULL,
  `rptEvalu` varchar(15) NOT NULL COMMENT 'Evaluación al técnico ',
  `rptObsrv` text NOT NULL,
  `rptStado` varchar(20) NOT NULL COMMENT 'Proceso del reporte',
  `rptPila` int(7) NOT NULL,
  `rptIdtec` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`n_reporte`, `n_empleado`, `rptTserv`, `rptIntrv`, `rptDscrp`, `rptRfall`, `rptRxtrn`, `rptFinic`, `rptHrini`, `rptFtrmi`, `rptHrtrm`, `rptEvalu`, `rptObsrv`, `rptStado`, `rptPila`, `rptIdtec`) VALUES
(107, 12345678, 'SISTEMAS', 'TARANTELLA', 'ESTA LENTO', 'okokokokoko', '0', '2021-05-28', '0', '0000-00-00', '0', 'okokok', '0', 'Finalizado', 0, 2),
(108, 12345678, 'SISTEMAS_APLICATIVOS', 'POWER POINT', 'ESTA LENTO', '234567890', '0', '2021-05-28', '0', '0000-00-00', '0', '0', '0', 'Pendiente', 0, 2),
(109, 12345678, 'SISTEMAS', 'SIA MATERIALES', 'NO PUEDO ACCEDER', '789798798', '0', '2021-05-28', '0', '0000-00-00', '0', '0', '0', 'Pendiente', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `id_usu` int(5) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `privilegios` varchar(15) NOT NULL,
  `activo` int(5) NOT NULL,
  `baja` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `id_usu`, `usuario`, `password`, `privilegios`, `activo`, `baja`) VALUES
(1, 1, '12345678', '12345678', 'admin', 0, 0),
(2, 2, '77777777', '77777777', 'tecnico', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `area_ads` int(2) NOT NULL,
  `extension` int(6) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `ubicacion` varchar(10) NOT NULL,
  `n_empleado` int(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `idcargo`, `area_ads`, `extension`, `correo`, `ubicacion`, `n_empleado`, `estado`) VALUES
(0, 'ADMIN', '', 5, 0, 0, '0', '0', 0, 0),
(1, 'ANGEL', 'CANSECO CABRERA', 5, 0, 123456, 'angel.canseco@sct.gob.mx', 'Piso 3', 12345678, 0),
(2, 'SERGIO', 'LOPEZ', 5, 122, 1852, 'sergio.lopez@sct.gob.mx', 'Piso 3', 23232323, 0),
(285, 'LAURA JESSICA', 'SOTO SÁNCHEZ', 5, 0, 18127, 'laura.soto@sct.gob.mx', 'Piso 3', 123123123, 0),
(296, 'ALEJANDRO', 'MAGALLON', 4, 122, 18230, 'amagall@sct.gob.mx', 'Piso 3', 3100946, 0),
(297, 'JESÚS SHIRAKY', 'BELTRAN MORA', 4, 116, 18020, 'jesus.beltran@sct.gob.mx', 'Piso 3', 7139286, 0),
(298, 'DANIEL', 'DUARTE AYALA', 5, 116, 18682, 'daniel.duarte@sct.gob.mx', 'Piso 3', 7138979, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_asig`),
  ADD KEY `id_equi` (`id_equi`),
  ADD KEY `n_emp` (`n_emp`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`n_reporte`),
  ADD KEY `id_tec` (`rptIdtec`),
  ADD KEY `id_tec_2` (`rptIdtec`),
  ADD KEY `n_empleado` (`n_empleado`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `n_empleado` (`n_empleado`),
  ADD KEY `area_ads` (`area_ads`),
  ADD KEY `idcargo` (`idcargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `n_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_equi`) REFERENCES `equipo` (`id_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`n_emp`) REFERENCES `usuarios` (`n_empleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`rptIdtec`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`n_empleado`) REFERENCES `usuarios` (`n_empleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `tecnico_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`area_ads`) REFERENCES `area` (`id_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
