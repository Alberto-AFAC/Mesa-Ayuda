-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2018 a las 21:28:00
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `adscripcion` text NOT NULL,
  `id_sub` int(10) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `adscripcion`, `id_sub`, `estado`) VALUES
(0, '0', 0, 1),
(1, 'DirecciÃƒÂ³n General de Marina Mercante', 0, 0),
(2, 'DirecciÃƒÂ³n General Adjunta de ProtecciÃƒÂ³n y Seguridad MarÃƒÂ­tima  ', 0, 0),
(3, 'DirecciÃƒÂ³n General Adjunta de Desarrollo de la Industria MarÃƒÂ­tima ', 0, 0),
(4, 'DirecciÃƒÂ³n de ProtecciÃƒÂ³n MarÃƒÂ­tima Portuaria', 0, 0),
(5, 'DirecciÃƒÂ³n de NavegaciÃƒÂ³n', 0, 0),
(6, 'DirecciÃƒÂ³n de Registro y Programas', 0, 0),
(7, 'DirecciÃƒÂ³n de AdministraciÃƒÂ³n ', 0, 0),
(8, 'DirecciÃƒÂ³n de ConcertaciÃƒÂ³n Gubernamental y con Organizaciones Privadas ', 1, 0),
(9, 'DirecciÃƒÂ³n de SupervisiÃƒÂ³n Operativa y de SeÃƒÂ±alamiento MarÃƒÂ­timo de las CapitanÃƒÂ­as', 2, 0),
(10, 'SubdirecciÃƒÂ³n Operativa', 2, 0),
(11, 'Departamento de PlanimetrÃƒÂ­a', 2, 0),
(12, 'DirecciÃƒÂ³n de Desarrollo de la Industria MarÃƒÂ­tima', 3, 0),
(13, 'Unidad de InvestigaciÃƒÂ³n EconÃƒÂ³mica, Estudios Mar. y PolÃƒÂ­ticas PÃƒÂºblicas para el Desarrollo de la Ind. Naval Mercante', 3, 0),
(14, 'Departamento de Estudios y Proyectos MarÃƒÂ­timos', 3, 0),
(15, 'SubdirecciÃƒÂ³n de PlaneaciÃƒÂ³n EstratÃƒÂ©gica, EstadÃƒÂ­sticas MarÃƒÂ­timas Portuarias y Programas de Calidad para Mejora de la Ind. Nav. Merc.', 3, 0),
(16, 'Departamento de PlaneaciÃƒÂ³n y Calidad', 3, 0),
(17, 'Departamento de Programas y PolÃƒÂ­ticas', 3, 0),
(18, 'Departamento de EstadÃƒÂ­stica', 3, 0),
(19, 'SubdirecciÃƒÂ³n de TecnologÃƒÂ­as de la InformaciÃƒÂ³n, Sistemas MarÃƒÂ­timos y Comunicaciones', 3, 0),
(20, 'CoordinaciÃƒÂ³n de ProtecciÃƒÂ³n MarÃƒÂ­tima y Portuaria de la Sala TÃƒÂ¡ctica "B"', 4, 0),
(21, 'CoordinaciÃƒÂ³n de ProtecciÃƒÂ³n MarÃƒÂ­tima y Portuaria de la Sala TÃƒÂ¡ctica "A" ', 4, 0),
(22, 'Departamento de CertificaciÃƒÂ³n del CÃƒÂ³digo PBIP', 4, 0),
(23, 'Departamento de Control a la NavegaciÃƒÂ³n', 5, 0),
(24, 'Departamento de CertificaciÃƒÂ³n del Personal Naval Mercante', 5, 0),
(25, 'Departamento de Seguridad y TrÃƒÂ¡fico MarÃƒÂ­timo', 5, 0),
(26, 'SubdirecciÃƒÂ³n de Registro Matriculas y Permisos', 6, 0),
(27, 'Departamento de Registro PÃƒÂºbico MarÃƒÂ­timo Nacional', 6, 0),
(28, 'Departamento de MatrÃƒÂ­culas y Permisos', 6, 0),
(29, 'SubdirecciÃƒÂ³n de Asuntos Internacionales', 6, 0),
(30, 'Departamento de Convenios', 6, 0),
(31, 'Departamento de CoordinaciÃƒÂ³n y Auxilio con Dependencias Gubernamentales', 6, 0),
(32, 'Departamento de CoordinaciÃƒÂ³n y Auxilio con Organismos Internacionales', 6, 0),
(33, 'Departamento de AnÃƒÂ¡lisis y Proyectos Normativos', 6, 0),
(34, 'Departamento de Asuntos Contenciosos', 6, 0),
(35, 'Departamento de Transparencia y Mejora Regulatoria', 6, 0),
(36, 'SubdirecciÃƒÂ³n de AdministraciÃƒÂ³n', 7, 0),
(37, 'Departamento de CapacitaciÃƒÂ³n, Servicio Profesional de Carrera y Desarrollo de Personal', 7, 0),
(38, 'Departamento de ContrataciÃƒÂ³n y Movimientos del Personal', 7, 0),
(39, 'Departamento de Relaciones Laborales y Prestaciones al Personal', 7, 0),
(40, 'Departamento de Recursos Financieros', 7, 0),
(41, 'Departamento de Recursos Materiales y Servicios Generales', 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asig` int(11) NOT NULL,
  `id_equi` int(11) NOT NULL,
  `n_emp` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asig`, `id_equi`, `n_emp`, `estado`) VALUES
(1, 2, 7138435, 1),
(2, 3, 7136872, 1),
(3, 2, 7136872, 1),
(4, 3, 7138435, 1);

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
  `ubicacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `num_sigtic`, `num_exp`, `marca_cpu`, `serie_cpu`, `memoria_ram`, `procesador`, `velocidad_proc`, `uni_disc_flax`, `disco_duro`, `serie_teclado`, `serie_monitor`, `version_windows`, `version_office`, `serie_mouse`, `direccion_ip`, `nombre_equipo`, `servicio_internet`, `tipo_equipo`, `ubicacion`) VALUES
(2, 987, 987, '987', '987', '2GB', 'i7', '10', '10', '750', '987', '987', '987', '987', '987', '987', 'HP wINDOWS 10', '987', '987', '5'),
(3, 789, 789, '798', '798', '789', '798', '789', '789', '789', '798', '987', '789', '789', '789', '798', 'HP version windows 7', '798', '798', '8779');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `n_reporte` int(11) NOT NULL,
  `n_empleado` int(10) NOT NULL,
  `des_problema` text NOT NULL,
  `intervencion` varchar(20) NOT NULL,
  `equipo` varchar(20) NOT NULL,
  `res_falla` text NOT NULL,
  `res_ext` text NOT NULL,
  `proc_reporte` varchar(20) NOT NULL,
  `fecha_inicio` varchar(30) NOT NULL,
  `hora_inicio` varchar(15) NOT NULL,
  `fecha_termino` varchar(30) NOT NULL,
  `hora_termino` varchar(15) NOT NULL,
  `evaluacion` varchar(15) NOT NULL,
  `obs` text NOT NULL,
  `pila` int(7) NOT NULL,
  `id_tec` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`n_reporte`, `n_empleado`, `des_problema`, `intervencion`, `equipo`, `res_falla`, `res_ext`, `proc_reporte`, `fecha_inicio`, `hora_inicio`, `fecha_termino`, `hora_termino`, `evaluacion`, `obs`, `pila`, `id_tec`) VALUES
(1, 5110045, 'problema de prueba', 'm', 'm', 'resumen falla prueba', 'si es externo falla', 'Realizando', '18/07/2018', '05:00 p.m', '18/07/2018', '05:30 p.m', 'BUeno', 'ok', 1, 1);

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
(1, 135, 'b', 'b', 'admin', 1, 0),
(2, 143, '7', '7', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
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

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `area_ads`, `extension`, `correo`, `ubicacion`, `n_empleado`, `estado`) VALUES
(3, 'ADOLFO', 'LOPEZ RESENDIZ ', 0, 26214, 'alopezre@sct.gob.mx', '0', 7132719, 0),
(4, 'ANA MARGARITA', 'SANCHEZ TALAVERA BEILES', 0, 26002, 'beiles.sanchez@sct.gob.mx', '0', 7137503, 0),
(5, 'VELIA', 'RAMIREZ MAYA', 0, 26405, 'vramimay@sct.gob.mx', '0', 5110367, 0),
(6, 'CARLOS', 'CAZARES BENAVIDES', 0, 26207, 'ccazareb@sct.gob.mx', '0', 5110045, 0),
(8, 'RAQUEL', 'MEDINA RODRIGUEZ', 0, 26259, 'rmedinar@sct.gob.mx', '0', 5110272, 0),
(9, 'SEIDY ARIDAI', 'GARCIA NAVA', 0, 26406, 'sgarcian@sct.gob.mx', '0', 7135243, 0),
(10, 'ELVIS DAMIAN', 'CARRILLO ALCANTARA', 0, 26032, 'elvis.carrillo@sct.gob.mx', '0', 7137891, 0),
(11, 'SATURNINO', 'HERMIDA MAYORAL', 0, 26000, 'shermida@sct.gob.mx', '0', 5110194, 0),
(12, 'CLARA', 'GOMEZ RECILLAS', 0, 26404, 'cgomezre@sct.gob.mx', '0', 5110164, 0),
(16, 'OSCAR', 'CANDELARIA CORTES', 0, 26450, 'oscar.candelaria@sct.gob.', '0', 7138117, 0),
(17, 'CYNTHIA LIZZETTE', 'GOMEZ RAMIREZ', 0, 26412, 'cynthia.gomez@sct.gob.mx', '0', 7136998, 0),
(21, 'GUADALUPE', 'TORRES JASSO', 0, 26053, 'guadalupe.torresj@sct.gob', '0', 7138499, 0),
(22, 'MOISES', 'ALVARADO HERMIDA', 0, 26277, 'malvarah@sct.gob.mx', '0', 7133742, 0),
(35, 'DIANA AFRODITA', 'RAMIREZ ELIAS', 0, 26262, 'diana.ramirez@sct.gob.mx', '0', 7136794, 0),
(36, 'EVANGELINA', 'GALICIA MARTINEZ', 0, 26255, 'evangelina.galicia@sct.go', '0', 7139875, 0),
(39, 'JULIAN', 'HERNANDEZ AHUACATITLA', 0, 26014, 'jhahuaca@sct.gob.mx', '0', 6450160, 0),
(43, 'ALEJANDRO', 'ROMERO REYES', 0, 26025, 'aromerre@sct.gob.mx', '0', 7135710, 0),
(44, 'JAVIER ELEAZAR', 'LUIS MENDEZ', 0, 26425, 'javier.luis@sct.gob.mx', '0', 7137889, 0),
(46, 'JOSE DEL CARMEN', 'MATA FIGUEROA', 0, 26271, 'jmatafig@sct.gob.mx', '0', 7132301, 0),
(48, 'EMILIO', 'MARTINEZ RAMIREZ', 0, 26031, 'emilio.martinez@sct.gob.m', '0', 7136743, 0),
(49, 'PAULINA DANIELA', 'VELAZQUEZ SEDAN', 0, 26431, 'paulina.velazquez@sct.gob', '0', 7138383, 0),
(51, 'HECTOR ENRIQUE ', 'DE LILLE GARCIA', 0, 26220, 'hdelille@sct.gob.mx', '0', 5110219, 0),
(52, 'AMINTA', 'ROMERO DAVALOS', 0, 26043, 'aminta.romero@sct.gob.mx', '0', 7135268, 0),
(53, 'MARIA DE LOURDES', 'CARRASCO ORTEGA', 0, 26270, 'mcarraso@sct.gob.mx', '0', 5110059, 0),
(54, 'MARIA DEL CARMEN', 'GONZALEZ HERNANDEZ', 0, 0, 'mgonzahe@sct.gob.mx', '0', 5110157, 0),
(55, 'MARIO', 'SANCHEZ CORTES', 0, 26433, 'msancort@sct.gob.mx', '0', 5110419, 0),
(57, 'ALEA DEL CARMEN', 'CANUDAS ZACOUT', 0, 26004, 'alea.canudas@sct.gob.mx', '0', 7137058, 0),
(59, 'FRANCISCO GUSTAVO', 'FLORES VEGA', 0, 26003, 'ffloreve@sct.gob.mx', '0', 7134660, 0),
(60, 'MANUEL ALEJANDRO ', 'MELO MARTINEZ', 0, 26056, 'manuel.melo@sct.gob.mx', '0', 7136692, 0),
(61, 'LUIS DANIEL', 'SALAS LOPEZ', 0, 26046, 'luis.salas@sct.gob.mx', '0', 7136754, 0),
(64, 'SERGIO', 'HERNANDEZ GOMEZ', 0, 26017, 'sherngom@sct.gob.mx', '0', 7132380, 0),
(67, 'ANTONIO', 'ALVAREZ GONZALEZ', 0, 26035, 'antonio.alvarezg@sct.gob.', '0', 7136669, 0),
(76, 'MARIA DEL CARMEN', 'RAYA GARCIA', 0, 0, 'mrayagar@sct.gob.mx', '0', 7131225, 0),
(79, 'JOSE ALBERTO', 'ZURITA RAMIREZ', 0, 26269, 'jzuritar@sct.gob.mx', '0', 5110510, 0),
(83, 'MARIO', 'RICO ALVAREZ', 0, 26437, 'mricoalv@sct.gob.mx', '0', 5110382, 0),
(85, 'ERIKA', 'GARCIA GOMEZ', 0, 26428, 'egarcigo@sct.gob.mx', '0', 7132385, 0),
(86, 'PEDRO ANTONIO', 'RIVAS FLORES', 0, 0, 'pedro.rivasf@sct.gob.mx', '0', 7137785, 0),
(91, 'TOMAS', 'PEREA PAZ', 0, 26408, 'tpereapaz@sct.gob.mx', '0', 7111613, 0),
(92, 'ALVARO', 'GUADARRAMA MEJIA', 0, 26005, 'aguadarramam@sct.gob.mx', '0', 7131218, 0),
(93, 'MONTSERRAT MIROSLABA', 'MARTINEZ AGUILAR', 0, 26411, 'mmartiag@sct.gob.mx', '0', 5110238, 0),
(94, 'DAFNE', 'ADAM GONZALEZ', 0, 26008, 'dadamgon@sct.gob.mx', '0', 7133355, 0),
(98, 'MARIA ELENA', 'GARCIA RODRIGUEZ', 0, 26212, 'mgarciro@sct.gob.mx', '0', 7111472, 0),
(99, 'MARIA FERNANDA', 'SANCHEZ CARRANZA', 0, 26268, 'fernanda.sanchez@sct.gob.', '0', 7138375, 0),
(100, 'TERESA', 'RUIZ MARTINEZ', 0, 26041, 'truizmar@sct.gob.mx', '0', 7133845, 0),
(101, 'MARTHA', 'ARCE SANCHEZ', 0, 26233, 'marcesan@sct.gob.mx', '0', 5110016, 0),
(102, 'LORENA', 'ISLAS CORREA', 0, 26430, 'lislasco@sct.gob.mx', '0', 5110201, 0),
(103, ' ERIKA', 'SILVA GONZALEZ', 0, 0, 'esilvago@sct.gob.mx', '0', 5110447, 0),
(104, 'JUANA MARGARITA', 'GARCIA REYES', 0, 26221, 'mgarcia@sct.gob.mx', '0', 5110145, 0),
(107, 'JOSE RAMON', 'CUEVAS BARRERA', 0, 26023, 'jcuevasb@sct.gob.mx', '0', 7131107, 0),
(109, 'IRMA ESTELA', 'NICOLAS JIMENEZ', 0, 26441, 'inicolas@sct.gob.mx', '0', 5110304, 0),
(112, 'MADHYA BRESCIA', 'GONZALEZ HERNANDEZ', 0, 26051, 'mgonzher@sct.gob.mx', '0', 7134673, 0),
(114, 'LUIS OCTAVIO', 'MENESES AGUILA', 0, 26423, 'omeneses@sct.gob.mx', '0', 5110261, 0),
(117, 'ANA LILIA  ', 'FERNANDEZ PEREZ', 0, 26042, 'ana.fernandez@sct.gob.mx', '0', 7138062, 0),
(118, 'ANGEL ASCENCION', 'CORTES PEREZ', 0, 26012, 'acortesp@sct.gob.mx', '0', 5100318, 0),
(119, 'TANIA DAYANIRA', 'ZURITA MEDINA', 0, 26232, 'tania.zurita@sct.gob.mx', '0', 7136695, 0),
(120, 'SOLEDAD AIDA', 'ARENAS RUEDA', 0, 26016, 'soledad.arenas@s', '0', 7136545, 0),
(123, 'ALEJANDRO', 'AVALOS TEJEDA', 0, 26022, 'alejandro.avalos@sct.gob.', '0', 5120231, 0),
(124, 'JORGE', 'PANIAGUA NUCAMENDI', 0, 26009, 'jpaniagu@sct.gob.mx', '0', 5110338, 0),
(126, 'DULCE MARIA', 'RUELAS VAZQUEZ', 0, 26424, 'druelasv@sct.gob.mx', '0', 7131105, 0),
(127, 'HUMBERTO', 'VALENCIA OLIVARES', 0, 0, 'hvalenco@sct.gob.mx', '0', 5110484, 0),
(128, 'FRANCISCO', 'PEREZ LAGOS ', 0, 26261, 'fperezla@sct.gob.mx', '0', 5110349, 0),
(129, 'LIVIA ERIKA', 'FUENTES QUENEL', 0, 26024, 'livia.fuentes@sct.gob.mx', '0', 7137632, 0),
(130, 'VICTORIA DEL CARMEN', 'COELLO LEMARROY', 0, 26422, 'vcoellol@sct.gob.mx', '0', 5110086, 0),
(132, 'LOURDES', 'SANCHEZ FERNANDEZ', 0, 26260, 'lsanchef@sct.gob.mx', '0', 5110423, 0),
(135, 'BERTHA', 'GUZMAN PERALTA', 19, 26223, 'bguzmanp@sct.gob.mx', '0', 5110175, 0),
(138, 'SERGIO MODESTO', 'LOPEZ CERVANTES', 19, 26209, 'sergio.lopez@sct.gob.mx', '0', 7136872, 0),
(141, 'MARTHA ITZEL', 'GARCIA FORTANEL', 0, 26246, 'martha.garciaf@sct.gob.mx', '0', 7137913, 0),
(142, 'KARLA PATRICIA', 'CONTRERAS MORALES', 0, 26035, 'karla.contreras@sct.gob.m', '0', 7138325, 0),
(143, 'ANGEL ', 'CANSECO CABRERA', 19, 26040, 'angel.canseco@sct.gob.mx', 'Piso 5', 7138435, 0),
(144, 'DANIEL MITCHEL', 'RAMIREZ CARTAS', 19, 26250, 'daniel.ramirez@sct.gob.mx', 'Piso 5', 7138511, 0),
(146, 'OSCAR', 'SANCHEZ PEREZ', 0, 26050, 'osanchez@sct.gob.mx', '0', 5110434, 0),
(147, 'PEDRO', 'LESCIEUR MEDINA', 0, 26007, 'pedro.lescieur@sct.gob.mx', '0', 7138653, 0),
(148, 'MARIA CRISTINA', 'TREJO ABARCA', 0, 26210, 'mtrejoab@sct.gob.mx', '0', 5120171, 0),
(149, 'SILVERIO', 'GALICIA PALACIOS', 0, 26018, 'silverio.galicia@sct.gob.', '0', 7137391, 0),
(150, 'MARIA DEL ROCIO', 'POSADAS ROBLES', 0, 26413, 'maria.posada@sct.gob.mx', '0', 5000061, 0),
(151, 'ROCIO TATIANA', 'GONZALEZ CARRILLO', 0, 26049, 'rgonzcar@sct.gob.mx', '0', 7133356, 0),
(152, 'ALBERTO ISAAC', 'DIAZ MORALES', 0, 26449, 'adiazmor@sct.gob.mx', '0', 7132193, 0),
(153, 'SOFIA', 'LOPEZ GALINDO', 0, 26258, 'sofia.galindo@sct.gob.mx', '0', 5120233, 0),
(154, 'LEONARDO', 'SANCHEZ ORTIZ', 0, 0, 'leonardo.sanchez@sct.gob.', '0', 7137671, 0),
(156, 'ADRIANA', 'YAÃ‘EZ GALVEZ', 0, 26227, 'ayanezga@sct.gob.mx', '0', 5110507, 0),
(161, 'JOSE LUIS', 'MORALES MEDRANO', 0, 26029, 'jose.moralesm@sct.gob.mx', '0', 7136593, 0),
(162, 'ADAMELIA', 'RODRIGUEZ ALVIRO', 0, 26048, 'arodrial@sct.gob.mx', '0', 5110392, 0),
(163, 'ALEJANDRO ARTURO', 'SANCHEZ REYES', 0, 26231, 'asanchre@sct.gob.mx', '0', 5110532, 0),
(165, 'JOSE FRANCISCO', 'LINARES BARRAGAN', 0, 0, 'jlinareb@sct.gob.mx', '0', 7131554, 0),
(166, 'CHRISTIAN DAVID', 'RIVAS FRANCO', 0, 26224, 'christian.rivas@sct.gob.m', '0', 7136490, 0),
(169, 'MA. DEL CARMEN', 'GUZMAN AGUIRRE', 0, 26208, 'mguzmana@sct.gob.mx', '0', 5110169, 0),
(170, 'GUADALUPE JAZMIN', 'LOPEZ PIZA', 0, 26244, 'glopezpi@sct.gob.mx', '0', 7111383, 0),
(171, 'JOSE CARMEN JAIME', 'VARELA MARTINEZ', 0, 26211, 'jvarelma@sct.gob.mx', '0', 5110481, 0),
(177, 'JUAN MANUEL', 'MARTINEZ SUAREZ', 0, 26228, 'jmartis@sct.gob.mx', '0', 5110258, 0),
(178, 'FRANCISCO JAVIER', 'CALLEJAS OLIVARES', 0, 26426, 'fcalleja@sct.gob.mx', '0', 7135269, 0),
(179, 'MARIA GUADALUPE', 'MAYA NAVA ', 0, 26242, 'mmayanav@sct.gob.mx', '0', 5110253, 0),
(180, 'RITA', 'VAZQUEZ AGUILAR', 0, 26237, 'rvazquag@sct.gob.mx', '0', 5110471, 0),
(181, 'HORACIO MANUEL', 'CANSINO ROSALES', 0, 0, 'hcancino@sct.gob.mx', '0', 7110214, 0),
(183, 'FABIAN', 'MADERA CHAO', 0, 0, 'fmaderac@sct.gob.mx', '0', 4100180, 0),
(184, 'VERONICA', 'GARCIA ZAMUDIO', 0, 0, 'vgarciaz@sct.gob.mx', '0', 5110151, 0),
(186, 'MARIA NOEMI', 'ALCARAZ GUILLEN', 0, 26409, 'malcarazg@sct.gob.mx', '0', 6110004, 0),
(187, 'RAMONA', 'GONZALEZ MONTES', 0, 26402, 'ramona.gonzalez@sct.gob.m', '0', 7136418, 0),
(190, 'NANCY PAMELA', 'GONZALEZ RODRIGUEZ', 0, 0, 'ngonzalr@sct.gob.mx', '0', 7131151, 0),
(193, 'AZUCENA', 'CARMONA PADRON', 0, 0, 'acarmonp@sct.gob.mx', '0', 5110060, 0),
(194, 'MAURO', 'BRAVO DIAZ', 0, 25736, 'mbravodi@sct.gob.mx', '0', 5110027, 0),
(195, 'JOSE ALBERTO', 'LOPEZ SANCHEZ ', 0, 0, 'jlosanch@sct.gob.mx', '0', 5110232, 0),
(196, 'JOSE ANTONIO', 'JURADO MONTIEL', 0, 0, 'jjurado@sct.gob.mx', '0', 5100147, 0),
(198, 'REBECA', 'GOMEZ CRISTOBAL', 0, 0, 'rgomezcr@sct.gob.mx', '0', 5100105, 0),
(201, 'GUADALUPE PATRICIA', 'ALVAREZ HERNANDEZ', 0, 26420, 'palvarez@sct.gob.mx', '0', 5110004, 0),
(203, 'EVELYN', 'VIZCAYA VILLA', 0, 26229, 'evelyn.vizcaya@sct.gob.mx', '0', 7138857, 0),
(204, 'LAURA', 'CABRERA GARCIA', 0, 26055, 'laura.cabrera@sct.gob.mx', '0', 7138856, 0),
(205, 'DIANA', 'GUTIERREZ CAMACHO', 0, 26403, 'diana.gutierrez@sct.gob.m', '0', 7138852, 0),
(206, 'TANIA GABRIELA', 'GÃ“MEZ LÃ“PEZ', 0, 26217, 'tania.gomez@sct.gob.mx', '0', 7139105, 0),
(208, 'EDUARDO', 'REGINO NAVA', 0, 26045, 'eduardo.regino@sct.gob.mx', '0', 7139129, 0),
(209, 'FRANCISCO ALBERTO', 'SANTIAGO CRUZ', 0, 26418, 'francisco.santiago@sct.go', '0', 7139104, 0),
(210, 'DIANA LISSETH', 'ALVARADO MENDOZA', 0, 26240, 'diana.alvarado@sct.gob.mx', '0', 7139102, 0),
(212, 'FRANCISCO JAVIER', 'GARCIA JURADO ACOSTA', 0, 26006, 'francisco.garciajurado@sc', '0', 7139386, 0),
(213, 'MAURICIO', 'MAYA NAVA', 0, 26235, 'mauricio.maya@sct.gob.mx', '0', 7139260, 0),
(214, 'VICTOR ALFONSO', 'DIAZ VILLAREAL', 0, 26264, 'victor.diaz@sct.gob.mx', '0', 7139303, 0),
(215, 'RENE', 'NARVAEZ MARTINEZ', 0, 26013, 'rene.narvaez@sct.gob.mx', '0', 7139418, 0),
(216, 'ANGELICA', 'MERLOS GUTIERREZ', 0, 26028, 'angelica.merlos@sct.gob.m', '0', 7139399, 0),
(218, 'JORGE', 'CARRILLO VIVEROS', 0, 26410, 'jorge.carrillo@sct.gob.mx', '0', 7138754, 0),
(219, 'OMAR', 'SALAS JACOME', 0, 26276, 'omar.salas@sct.gob.mx', '0', 7139509, 0),
(220, 'EDUARDO', 'SANCHEZ FLORES', 0, 26218, 'eduardo.sanchez@sct.gob.m', '0', 7138326, 0),
(221, 'VANYA NALLELY', 'GALICIA CASTILLON', 0, 26414, 'vanya.galicia@sct.gob.mx', '0', 7139432, 0),
(222, 'VICTOR', 'ZERMEÃ‘O GONZALEZ', 0, 260266, 'victor.zermeno@sct.gob.mx', '0', 7137253, 0),
(223, 'LILIANA', 'CELAYA BECERRA', 0, 26444, 'lcelayab@sct.gob.mx', '0', 5120035, 0),
(224, 'EDUARDO', 'GIORGANA PERALTA', 0, 26219, 'eduardo.giorgana@sct.gob.', '0', 7139401, 0),
(225, 'MARLITH SELENE', 'MARTINEZ FERREIRO', 0, 26030, 'marlith.martinez@sct.gob.', '0', 7137367, 0),
(226, 'NAYELI', 'MARTINEZ GOMEZ', 0, 26038, 'nayeli.martinez@sct.gob.m', '0', 7139556, 0),
(227, 'MIGUEL GERTZAI', 'GONZALEZ CARRILLO', 0, 26434, 'miguel.gonzalez@sct.gob.m', '0', 7139543, 0),
(228, 'MAYRA GABRIELA', 'GARCIA GARCIA', 0, 26407, 'mayra.garcia@sct.gob.mx', '0', 7139603, 0),
(229, 'JESSICA SARAIN', 'ANGUIANO KORBER', 0, 26052, 'jessica.anguiano@sct.gob.', '0', 7139562, 0),
(230, 'LILIAN IXCHEL', 'ORTEGA ARANDIA', 0, 26401, 'lilian.ortega@sct.gob.mx', '0', 7139601, 0),
(231, 'BRANDON', 'CONTRERAS VAZQUEZ', 0, 26419, 'brandon.vazquezm@sct.gob.', '0', 7139587, 0),
(232, 'SERGIO ', 'DOMINGUEZ REYNA', 0, 26015, 'sergio.dominguezr@sct.gob', '0', 7139823, 0),
(233, 'OSCAR CRISTIAN', 'ALCANTARA SANCHEZ', 0, 26225, 'oscar.alcantara@sct.gob.m', '0', 7139821, 0),
(234, 'FRANCISCO URIEL', 'VALLEJO PEREZ', 0, 26054, 'francisco.vallejo@sct.gob', '0', 7139879, 0),
(235, 'MARISOL NALLELY', 'RAMIREZ SALAS', 0, 26215, 'marisol.ramirez@sct.gob.m', '0', 7139867, 0),
(236, 'KARINA', 'MEJÃA GUERRERO', 0, 0, 'karina.mejia@sct.gob.mx', '0', 7139869, 0),
(237, 'SAMUEL', 'REYES NOE', 0, 26238, 'nreyes@sct.gob.mx', '0', 5110377, 0),
(238, 'FRANCISCO', 'ESPINOZA VELAZQUEZ', 0, 26016, 'fespinoz@sct.gob.mx', '0', 5110529, 0),
(239, 'MANUEL ANTONIO', 'BRIONES RODRIGUEZ', 0, 26234, 'manuel.briones@sct.gob.mx', '0', 7140017, 0),
(241, 'ABEL MIGUEL', 'ULAJE AGUILAR', 0, 26226, 'aulajeag@sct.gob.mx', '0', 6491084, 0),
(242, 'GABRIELA', 'PEDRAZA VALDEZ', 0, 0, 'gpedraza@sct.gob.mx', '0', 5110353, 0),
(243, 'JONAS', 'RAMIREZ GALICIA', 0, 26229, 'jonas.ramirez@sct.gob.mx', '0', 7140064, 0),
(244, 'NANCY ALEJANDRA', 'MARTINEZ CERVANTES', 0, 26212, 'nancy.martinez@sct.gob.mx', '0', 7139931, 0),
(245, 'KARLA MARIANA', 'RAMON LOPEZ', 0, 26242, 'karla.ramon@sct.gob.mx', '0', 7140171, 0),
(246, 'BERENICE', 'GUZMAN GARCIA', 0, 26042, 'berenice.guzman@sct.gob.m', '0', 7140168, 0),
(247, 'MARCO ANTONIO ', 'LOPEZ TAFOYA', 0, 0, 'mlopezta@sct.gob.mx', '0', 7135836, 0),
(248, ' LETICIA', 'SANCHEZ PALACIO', 0, 0, '', '0', 5110433, 0),
(249, 'ALEJANDRO ', 'VAZQUEZ DEL MERCADO REYNOSO', 0, 0, '', '0', 5110485, 0),
(250, 'MARIA MAGDALENA', 'CEJA MANZO', 0, 26409, 'maria.ceja@sct.gob.mx', '0', 7140305, 0),
(251, 'EDUARDO NOE', 'REYES SANDOVAL', 0, 26267, 'eduardo.reyes@sct.gob.mx', '0', 7140304, 0),
(252, 'VICTOR RAUL', 'PEREZ MAGAÃ‘A', 0, 26050, 'victor.perez@sct.gob.mx', '0', 7140307, 0),
(253, 'SALVADOR ALEJANDRO', 'VILLEGAS ROBLES', 0, 26050, 'salvador.villegas@sct.gob', '0', 7140460, 0),
(254, 'ESTEBAN', 'RAYMUNDO RAMOS', 0, 26025, 'esteban.raymundo@sct.gob.', '0', 7140463, 0),
(255, 'ADAN', 'CHAVEZ SANTIAGO', 0, 26041, 'adan.chavez@sct.gob.mx', '0', 7140482, 0),
(256, 'NELIDA', 'CAMPUZANO VARGAS', 0, 26258, 'nelida.campuzano@sct.gob.', '0', 7137581, 0);

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
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`n_reporte`),
  ADD KEY `id_tec` (`id_tec`),
  ADD KEY `id_tec_2` (`id_tec`),
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
  ADD KEY `area_ads` (`area_ads`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `n_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;
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
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`id_tec`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`area_ads`) REFERENCES `area` (`id_area`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
