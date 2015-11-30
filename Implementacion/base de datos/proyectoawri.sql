-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2012 a las 19:01:15
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectoawri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `ultima_actualizacion` date NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`cedula`, `nombre`, `apellido`, `contrasena`, `ultima_actualizacion`, `email`) VALUES
('11111', 'Jairo', 'Leyton', 'jairo123', '2012-11-30', 'jairo@hotmail.com'),
('14444', 'Josue', 'Hurtado', 'josue123', '2012-12-03', 'josue@hotmail.com'),
('155555', 'Claudia', 'Quiceno', 'claudia123', '2012-12-03', 'claudia@hotmail.com'),
('22222', 'Maria Alejandra', 'Pabon', 'maria123', '2012-12-03', 'maria@hotmail.com'),
('33333', 'Victor Camilo', 'Jimenez', 'camilo123', '2012-12-03', 'camilo@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE IF NOT EXISTS `asignaturas` (
  `codigo_asg` varchar(15) NOT NULL,
  `nombre_asg` varchar(45) NOT NULL,
  `grupo` varchar(3) NOT NULL,
  PRIMARY KEY (`codigo_asg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`codigo_asg`, `nombre_asg`, `grupo`) VALUES
('111048M', 'Algebra Lineal', '3'),
('111050M', 'Calculo I', '4'),
('111051M', 'Calculo II', '3'),
('201011M', 'Constitucion Politica', '3'),
('204101M', 'Ingles I', '3'),
('204104M', 'Ingles II', '3'),
('204161M', 'Español', '3'),
('404001M', 'Deporte', '2'),
('710192M', 'Arquitectura I', '3'),
('710193M', 'Arquitectura II', '3'),
('730125M', 'Impacto Ambiental', '3'),
('750008M', 'Sistemas operativos', '3'),
('750030M', 'Base de Datos', '4'),
('750080M', 'Fundamentos de programacion', '4'),
('750081M', 'I.P.O.O', '4'),
('750082M', 'I.T.I', '2'),
('750083M', 'Matematicas Discretas I', '4'),
('750084M', 'Matematicas Discretas II', '4'),
('750085M', 'Programacion Interactiva', '4'),
('750091M', 'Desarrollo Software I', '3'),
('750093M', 'D.I.U', '3'),
('750099M', 'I.T.S.I', '2'),
('760081M', 'T.G.S', '3'),
('801208M', 'Org. Admon. Empresas', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becarios`
--

CREATE TABLE IF NOT EXISTS `becarios` (
  `estudiantes_Codigo` varchar(10) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  PRIMARY KEY (`estudiantes_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becarios`
--

INSERT INTO `becarios` (`estudiantes_Codigo`, `cargo`, `contrasena`) VALUES
('201252953', 'monitor', 'abcde'),
('201252959', 'monitor', '123'),
('201252960', 'monitor', '1234'),
('201252965', 'ewq', 'ewq'),
('201252991', 'monit', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=529 ;

--
-- Volcado de datos para la tabla `captcha`
--

INSERT INTO `captcha` (`id`, `time`, `ip_address`, `word`) VALUES
(528, 1354643704, '::1', 'zYGUOa0b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('09d2457fabc33d375252af80829b027b', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354604016, ''),
('136d1aef65fb908cf3e435295f781591', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354643746, ''),
('182a3ad3739b2eceb4249d0d48f46f12', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354571709, ''),
('1d0540bb98810f247ffc8d6eb1d60387', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354572029, ''),
('21a908f98d4e00a07726f9cfbe4a5442', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592547, ''),
('301b590eced34238fcf95865d10fa0f0', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354600778, ''),
('355a3ef8eeeab2d799157290863dcce4', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354604016, ''),
('35feaa0c2a8add944fca41462377c6ca', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354600778, ''),
('361550a1bbd603fc867ec6ba8b3608df', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354602652, ''),
('4c8c355bad36071c6923e5f52648be8f', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354604016, ''),
('4fa3bac948e962c7845bb7815fc46e20', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354604016, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('5868298090e8f2cf2de4a8b9d68d981e', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592879, ''),
('67618c4180dcfa81c78c1358d7b9768a', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354604016, ''),
('6905e82775d87a1ddacdb6206fb5aeaf', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354602652, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('730ed0bb5356d9aa62764eb78fda9e9b', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354554282, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:4:"1234";}'),
('7911d1c78ba03a1435ba62e4f3d7984d', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354602652, ''),
('85525b638d92d62232d2af225db6289a', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592879, ''),
('8f143c6763e90781f69ebaee32f77aaf', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592878, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('8f2af1033e71af5f4c4faee533ce32de11', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354502858, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:7:"becario";s:6:"estado";s:1:"1";s:5:"datos";a:7:{s:6:"Codigo";s:9:"201252959";s:8:"Programa";s:4:"2716";s:15:"Nombre_Completo";s:28:"HURTADO PALOMA LAURA DANIELA";s:8:"Telefono";s:0:"";s:9:"Direccion";s:0:"";s:6:"Correo";s:0:"";s:6:"Estado";s:1:"1";}}'),
('914b8c946c7f6c563f99ce5f72438c4a', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354584820, ''),
('9297cdc288a4257448f081c29d2bcdf0', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354600778, ''),
('96ba62ba1a34b4b04d8881974c858f21', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354603337, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('a2785710ee43b02672e37dc4aa781d34', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592879, ''),
('a3dde25f0de7a53b7e1ba61d754bc337', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354592880, ''),
('a74fae9a7d83bda7e560f9b902458997', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354600778, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('b7165b88f532ce86f5076a43b85a22fb', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354554785, ''),
('c259669d7e50e3559e8642411a843b72', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354589234, 'a:3:{s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('cd4ac974134652c804d0fe282bd1fb93', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354593233, 'a:4:{s:9:"user_data";s:0:"";s:6:"perfil";s:13:"administrador";s:6:"estado";s:1:"1";s:6:"cedula";s:5:"22222";}'),
('ceae67e52970372263f7881101659d33', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354602653, ''),
('cfeb2096b58c0f45e8b3fdd7b99bd6eb', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354602652, ''),
('e8b7c483efce35a635dc7989446a470b', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354583455, ''),
('e917c43a5d1fee8d73e8dbdd459fe50b', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354600778, ''),
('ebf7a1499209ec5122ff371e6fd01a9d', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354594014, ''),
('f35ac6348d3db5b1a6c10078dbcf2cd8', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1354593233, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadores`
--

CREATE TABLE IF NOT EXISTS `computadores` (
  `cod_comp` int(11) NOT NULL AUTO_INCREMENT,
  `salas_Cod_sala` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `nombre_comp` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_comp`),
  KEY `fk_Computador_Salas1_idx` (`salas_Cod_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `computadores`
--

INSERT INTO `computadores` (`cod_comp`, `salas_Cod_sala`, `ip`, `nombre_comp`) VALUES
(12, 1, '127.0.0.2', 'PC12'),
(13, 1, '127.0.0.1', 'PC13'),
(14, 1, '::1', 'PC14'),
(21, 12, '127.0.0.1', 'PC21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoestudiantes`
--

CREATE TABLE IF NOT EXISTS `estadoestudiantes` (
  `cod_estado` int(11) NOT NULL,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadoestudiantes`
--

INSERT INTO `estadoestudiantes` (`cod_estado`, `descripcion`) VALUES
(0, 'No activo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosancion`
--

CREATE TABLE IF NOT EXISTS `estadosancion` (
  `cod_estado` int(1) NOT NULL,
  `descipcion` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadosancion`
--

INSERT INTO `estadosancion` (`cod_estado`, `descipcion`) VALUES
(1, 'Deuda'),
(2, 'PazySalvo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `Codigo` varchar(10) NOT NULL,
  `Programa` varchar(4) NOT NULL,
  `Nombre_Completo` varchar(100) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_Estudiantes_Programas1_idx` (`Programa`),
  KEY `fk_Estudiantes_Estadoestudiantes_idx` (`Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`Codigo`, `Programa`, `Nombre_Completo`, `Telefono`, `Direccion`, `Correo`, `Estado`) VALUES
('201252953', '2702', 'MEZA GARCIA JOHNNY MAURICIO', '2312323', 'Calle', 'jhomega-16@hotmail.com', 1),
('201252959', '2716', 'HURTADO PALOMA LAURA DANIELA', '2222222', 'Calle', 'ronald-barona@hotmail.com', 1),
('201252960', '3842', 'MURILLO ROJAS YESICA MAYERLY', '2719590', 'Calle 11 # 16-50', 'esteban_1031@hotmail.com', 1),
('201252963', '2704', 'GAVIRIA HERNANDEZ JEAN CARLOS', '2719685', 'CL 35 16 - 72', 'JEAN-K_13@HOTMAIL.COM', 0),
('201252964', '2703', 'MOLINEROS HERNANDEZ BRIAN', '2719638', 'cr 10 # 24-65', 'BROAN199320@HOTMAIL.ES', 0),
('201252965', '3845', 'TORRES TRUJILLO CARLOS ALBERTO', '2719864', 'CALLE 72A 1A339', 'Actualizar', 0),
('201252991', '3842', 'CASANOVA VERA GEORGES STEVEN', '2719825', 'cra 46 N53-4', 'stiven_caz@hotmail.com', 0),
('201252993', '3845', 'DUQUE VELASQUEZ LIZETH VICTORI', '2719865', 'CALLE 72A 1A340', 'myli_2a@hotmail.com', 0),
('201252996', '2703', 'SANCHEZ CASTILLO GREICY LORENA', '2719639', 'cr 10 # 24-64', 'lorenasanchez-ms@hotmail.com', 0),
('201252997', '2702', 'BARONA RESTREPO RONALD', '2719589', 'Calle 11 # 16-51', 'ronald-barona@hotmail.com', 0),
('201252998', '3842', 'MORENO OSPINA RUBEN ANTONIO', '2719826', 'cra 46 N53-3', 'rubenospina08@hotmail.com', 0),
('201253000', '2702', 'SERRANO CALLEJAS HAROLD ESTEBA', '2719590', 'Calle 11 # 16-50', 'esteban_1031@hotmail.com', 0),
('201253001', '2703', 'OCAMPO GALINDO JOHAN STEED', '2719640', 'cr 10 # 24-63', 'johan_steed_14@hotmail.com', 0),
('201253003', '3484', 'CAMACHO SUAREZ RUBEN DARIO', '2719781', 'cra 1 hn 80-32', 'hassanislive@hotmail.com', 0),
('201253005', '2702', 'SILVA AMAYA DAVID ORLANDO', '2719591', 'Calle 11 # 16-49', 'david_silva_1993@hotmail.com', 0),
('201253010', '3484', 'MOLINA ECHEVERRY CRISTHIAN', '2719782', 'cra 1 hn 80-31', 'crismo824@hotmail.com', 0),
('201253011', '3484', 'MARTINEZ PAYAN DANIEL ALFONSO', '2719783', 'cra 1 hn 80-30', 'danyband@hotmail.com', 0),
('201253013', '2703', 'VELEZ MUÃ±oZ ADRIANA MARCELA', '2719641', 'cr 10 # 24-62', 'marcevelezs@hotmail.com', 0),
('201253015', '2702', 'CEBALLOS ARIAS JHON EDWARD', '2719592', 'Calle 11 # 16-48', 'jhon-ed113@hotmail.com', 0),
('201253021', '3845', 'MORALES ORTEGA ALEJANDRA', '2719866', 'CALLE 72A 1A341', 'alejandra.m.o1991@hotmail.com', 0),
('201253022', '2704', 'SANCLEMENTE DEAZA ANDRES FERNA', '2719686', 'CL 35 16 - 73', 'sancleafsd_9352@hotmail.com', 0),
('201253023', '2716', 'LOPEZ RESTREPO EDUARD ALEXIS', '2719733', 'Cra 11c 19-60', 'alex-353@hotmail.com', 0),
('201253024', '2716', 'SANMARTIN MONTENEGRO YESENIA ANDREA', '2719734', 'Cra 11c 19-59', 'yese_125@hotmail.com', 0),
('201253034', '2704', 'BASANTE BADOS ARMANDO ANDRES', '2719687', 'CL 35 16 - 74', 'basantepentecostal@hotmail.com', 0),
('201253035', '2716', 'TROCHEZ DUQUE JUAN DAVID', '2719735', 'Cra 11c 19-58', 'juancho_16_duque@hotmail.com', 0),
('201253040', '2703', 'RAMIREZ VALENCIA JOSE EDUARDO', '2719642', 'cr 10 # 24-61', 'jryochi-94@hotmail.com', 0),
('201253045', '3845', 'TRUJILLO JIMENEZ KAREN ALICIA', '2719867', 'CALLE 72A 1A342', 'kartu1994@hotmail.com', 0),
('201253055', '2716', 'CHACÃ“N GÃ“MEZ LAURA JULIANA', '2719736', 'Cra 11c 19-57', 'laurajuliana_@hotmail.com', 0),
('201253064', '3845', '', '2719868', 'CALLE 72A 1A343', 'princes.789@hotmail.com', 0),
('201253066', '2702', 'GOMEZ IBARGUEN NELLY VANESSA', '2719593', 'Calle 11 # 16-47', 'vanessa9231@hotmail.com', 0),
('201253067', '2702', 'RESTREPO SOMERA GIOVANNI STEVEN', '2719594', 'Calle 11 # 16-46', 'giovannisteven@hotmail.com', 0),
('201253071', '3484', 'SANCHEZ TRUJILLO MAURICIO', '2719784', 'cra 1 hn 80-29', 'mauricioapos@hotmail.com', 0),
('201253073', '2702', 'BALCAZAR LEIVA LUISA FERNANDA', '2719595', 'Calle 11 # 16-45', 'luisafer_1405@hotmail.com', 0),
('201253076', '2704', 'SOTELO SERNA YERSON EDUARDO', '2719688', 'CL 35 16 - 75', 'yerson.eduardo_94@hotmail.com', 0),
('201253081', '2716', 'TRIANA MADRID JUAN CAMILO', '2719737', 'Cra 11c 19-56', 'juan_k2894@hotmail.com', 0),
('201253082', '2704', 'MEDINA PARRA JUAN SEBASTIAN', '2719689', 'CL 35 16 - 76', 'sebazz_007@hotmail.com', 0),
('201253084', '2716', 'CHARJUELAN VILLAFAÑE GIOVANNY', '2719738', 'Cra 11c 19-55', 'giovannychv@gmail.com', 0),
('201253086', '2702', 'VASQUEZ CARDOZO STEPHEN STEVE', '2719596', 'Calle 11 # 16-44', 'stid_15.v@hotmail.com', 0),
('201253087', '2702', 'LOAIZA ORREGO OSCAR EDUARDO', '2719597', 'Calle 11 # 16-43', 'oscar-elo-92@hotmail.com', 0),
('201253091', '3484', 'LÃ³PEZ ROBLES JOHN JAMES', '2719785', 'cra 1 hn 80-28', 'james183bon@hotmail.com', 0),
('201253102', '3845', 'ARANGO VELEZ CLARENA', '2719869', 'CALLE 72A 1A344', 'clarena1983@hotmail.com', 0),
('201253106', '2716', 'ARANZAZU MORALES JERSSON KALET', '2719739', 'Cra 11c 19-54', 'jerara.024@hotmail.com', 0),
('201253107', '2716', 'BEDOYA GIRALDO KELLY JOHANNA', '2719740', 'Cra 11c 19-53', 'kellita_bedoya628@hortmail.com', 0),
('201253111', '2702', 'HERRERA TELLEZ ARLENSON', '2719598', 'Calle 11 # 16-42', 'arlensonherrera@hotmail.com', 0),
('201253112', '2702', 'AYALA NIETO JEISON STEVEN', '2719599', 'Calle 11 # 16-41', 'jeiayala2009@hotmail.com', 0),
('201253114', '3842', 'MORALES RAMIREZ ESTEFANIA', '2719827', 'cra 46 N53-2', 'estefaniam1994@hotmail.com', 0),
('201253120', '2703', 'MARTINEZ VELASCO LUZ STEPHANIE', '2719643', 'cr 10 # 24-60', 'tefy199459@hotmail.com', 0),
('201253122', '2703', 'POLANIA PAREDES DANIELA ANDREA', '2719644', 'cr 10 # 24-59', 'Actualizar', 0),
('201253125', '3842', 'AGUIRRE OSSA DIANA LORENA', '2719828', 'cra 46 N53-1', 'lorenita-57@hotmail.com', 0),
('201253132', '2703', 'PAZ LONDOÃ‘O JOHN EDINSON', '2719645', 'cr 10 # 24-58', 'jei-ck@hotmail.com', 0),
('201253148', '3842', 'REDONDO TASCON NESTOR', '2719829', 'CALLE 72A 1A304', 'nestRED@hotmail.com', 0),
('201253151', '2704', 'TABARES VALENCIA FRANCISCO JAV', '2719690', 'CL 35 16 - 77', 'nelcyvalencia@hotmail.com', 0),
('201253153', '3842', 'DIAZ ALARCoN JOHN SEBASTIAN', '2719830', 'CALLE 72A 1A305', 'john.diaz.93@ hotmail.com', 0),
('201253156', '2703', 'SAAVEDRA GUZMAN NAILA ALEXANDR', '2719646', 'cr 10 # 24-57', 'micinal_94_bonita@hotmail.es', 0),
('201253158', '3845', 'OSORIO JARA MARLLY LICETH', '2719870', 'CALLE 72A 1A345', 'marllyli0816@hotmail.com', 0),
('201253159', '2704', 'GARZON MARTINEZ JHONATAN', '2719691', 'CL 35 16 - 78', 'centralhm@hotmail.com', 0),
('201253161', '3842', 'OCHOA PORTILLO MARIA ALEJANDRA', '2719831', 'CALLE 72A 1A306', 'maye2332@hotmail.com', 0),
('201253163', '3484', 'CUARAN CUARAN EDWIN LEONARDO', '2719786', 'cra 1 hn 80-27', 'edwinleonardo66@hotmail.com', 0),
('201253169', '2702', 'PUERTAS REYES CARLOS ESTEBAN', '2719600', 'Calle 11 # 16-40', 'carlosestebanpuertas@hotmail.com', 0),
('201253174', '2716', 'LUCUMI LOPEZ MARIA CAMILA', '2719741', 'Cra 11c 19-52', 'cammila.14@hotmail.com', 0),
('201253176', '3842', 'SEPULVEDA LUCUMI DIANA KATHERI', '2719832', 'CALLE 72A 1A307', 'diana.kiss_123@hotmail.com', 0),
('201253178', '2703', 'SCHWERY HERNANDEZ JHON EDUARDO', '2719647', 'cr 10 # 24-56', 'jhon.jesh.91@hotmail.com', 0),
('201253180', '3484', 'GUAICHAR ZABALA CARLOS ALBERTO', '2719787', 'cra 1 hn 80-26', 'carlosalbertogu56@yahoo.es', 0),
('201253189', '2704', 'CEPERO ROBBY JUAN CARLOS', '2719692', 'CL 35 16 - 79', 'cebup@hotmail.com', 0),
('201253195', '2704', 'MONTEALEGRE ROMERO BRAHIAN ANDRES', '2719693', 'CL 35 16 - 80', 'andresss-94@hotmail.com', 0),
('201253198', '2704', 'MURCIA RUEDA NORBERTO ANDRES', '2719694', 'CL 35 16 - 81', 'betomurueda@hotmail.com', 0),
('201253202', '2702', 'NARVAEZ ERAZO DIEGO FERNANDO', '2719601', 'Calle 11 # 16-39', 'diego_narvaez_dinxo@hotmail.com', 0),
('201253204', '3484', 'CORTEZ MARTINEZ JOHN CAMILO', '2719788', 'cra 1 hn 80-25', 'camilo1051@hotmail.es', 0),
('201253206', '2703', 'VICTORIA SANCHEZ SHIRLEY', '2719648', 'cr 10 # 24-55', 'shirley_025@hotmail.com', 0),
('201253207', '3842', 'GRAJALES TRUJILLO CRISTHIAN ALEXIS', '2719833', 'CALLE 72A 1A308', 'cristianalexis013@hotmail.com', 0),
('201253210', '2703', 'RAMIREZ ARISTIZABAL ALEJANDRA', '2719649', 'cr 10 # 24-54', 'Actualizar', 0),
('201253212', '2702', 'ROSERO GUERRERO FRANCISCO JAVI', '2719602', 'Calle 11 # 16-38', 'usuariosamaniego@hotmail.com', 0),
('201253217', '3842', 'GOMEZ LOPEZ BRIGIT LINDCEY', '2719834', 'CALLE 72A 1A309', 'brige.55@hotmail.com', 0),
('201253220', '3845', 'VALENCIA ARENAS BRYAN ALEXANDE', '2719871', 'CALLE 72A 1A346', 'bryan.bava_531@hotmail.com', 0),
('201253221', '2716', 'CASTILLO CAICEDO YENI VANESSA', '2719742', 'Cra 11c 19-51', 'jennyvane_12@hotmail.com', 0),
('201253225', '2702', 'HURTADO OCAMPO JOHN ALEXANDER', '2719603', 'Calle 11 # 16-37', 'chico_radio12@hotmail.com', 0),
('201253228', '2702', 'SANCHEZ VALLEJO SAMUEL DAVID', '2719604', 'Calle 11 # 16-36', 'davidpuma21@hotmail.com', 0),
('201253232', '3484', 'DUQUE CASTRO YORDI FERNANDO', '2719789', 'cra 1 hn 80-24', 'Actualizar', 0),
('201253238', '3484', 'ARANGO BUITRAGO MAURICIO', '2719790', 'cra 1 hn 80-23', 'arango.b@hotmail.com', 0),
('201253239', '2704', 'VILLEGAS LACHE GLORIA STEPHANY', '2719695', 'CL 35 16 - 82', 'glorita32@yahoo.es', 0),
('201253242', '3842', 'ROMO AGUIAR GINA ALEXANDRA', '2719835', 'CALLE 72A 1A310', 'gina2864@hotmail.com', 0),
('201253243', '3484', 'CEBALLOS GIRON DIEGO FERNANDO', '2719791', 'cra 1 hn 80-22', 'diego-0314@hotmail.com', 0),
('201253249', '2716', 'PAZ SEPULVEDA ANGIE MELISSA', '2719743', 'Cra 11c 19-50', 'meli_paz_@hotmail.com', 0),
('201253251', '3484', 'ACOSTA HOYOS ADEIBA YANETH', '2719792', 'cra 1 hn 80-21', 'janeth_628@hotmail.com', 0),
('201253252', '3845', 'SAAVEDRA BETANCOURT JUAN DAVID', '2719872', 'CALLE 72A 1A347', 'Actualizar', 0),
('201253253', '3845', 'RAMIREZ VELEZ DAVID', '2719873', 'CALLE 72A 1A348', 'davidramirez0416@hotmail.com', 0),
('201253259', '2716', 'MUNERA OSPINA DIANA LIZETH', '2719744', 'Cra 11c 19-49', 'lizeth-el-angel-10@hotmail.com', 0),
('201253269', '3484', 'MARIN NARANJO NATHALIA', '2719793', 'cra 1 hn 80-20', 'natha_marin@hotmail.com', 0),
('201253273', '2704', 'HERNANDEZ CASTRO SERGIO', '2719696', 'CL 35 16 - 83', 'sergiiohernandez@hotmail.com', 0),
('201253277', '3845', 'HENAO VINASCO JUAN CAMILO', '2719874', 'CALLE 72A 1A349', 'jchenao-1991@hotmail.com', 0),
('201253280', '2702', 'DOMINGUEZ CALERO JULIAN DAVID', '2719605', 'Calle 11 # 16-35', 'julianbuffon@gmail.com', 0),
('201253281', '3845', 'SOTO ANAYA JAMES REINEL', '2719875', 'CALLE 72A 1A350', 'jamesreinelsoto@gmail.com', 0),
('201253283', '3484', 'VILLAMUES SANCHEZ DIANA CAROLI', '2719794', 'cra 1 hn 80-19', 'dcvs1989@hotmail.com', 0),
('201253289', '3484', 'CORREA AVILES JAVIER ANDRES', '2719795', 'cra 1 hn 80-18', 'javierandres0705@hotmail.com', 0),
('201253291', '3484', 'SANDOVAL HECTOR ENRIQUE', '2719796', 'cra 1 hn 80-17', 'kiquesando@hotmail.com', 0),
('201253293', '3484', 'PARAMO ORTEGON WILMER ANDRES', '2719797', 'cra 1 hn 80-16', 'tomanchoo@hotmail.com', 0),
('201253297', '2703', 'CUERVO ROMO HERMIN YUVIRI', '2719650', 'cr 10 # 24-53', 'YUVIRI_14@HOTMAIL.COM', 0),
('201253300', '3842', 'ZAMBRANO NARVAEZ DEXI MARCELA', '2719836', 'CALLE 72A 1A311', 'marcelaz33@hotmail.com', 0),
('201253308', '2703', 'ALVARADO CORRALES LUISA MARIA', '2719651', 'cr 10 # 24-52', 'cereza31@hotmail.es', 0),
('201253318', '3484', 'ARISTIZABAL COLLAZOS CARLOS ALBERTO', '2719798', 'cra 1 hn 80-15', 'carlitos4010@hotmail.com', 0),
('201253323', '3842', 'BUESAQUILLO PIAMBA NULVY AMPARO', '2719837', 'CALLE 72A 1A312', 'Nulambupy@yahoo.com', 0),
('201253330', '2704', 'OBANDO TOLEDO HOOVER ANDRES', '2719697', 'CL 35 16 - 84', 'Hooverok@hotmail.com', 0),
('201253332', '3484', 'GALVEZ NARVAEZ FRANCISCO JAVIE', '2719799', 'cra 1 hn 80-14', 'franjavi8@hotmail.com', 0),
('201253334', '3845', 'VIVEROS PEREZ JEFFERSON', '2719876', 'CALLE 72A 1A351', 'jevipe25@hotmail.com', 0),
('201253341', '2702', 'MARTINEZ GIL CESAR AUGUSTO', '2719606', 'Calle 11 # 16-34', 'cesar_n92@hotmail.com', 0),
('201253343', '3484', 'WILCHES LOPEZ ANGELICA MARIA', '2719800', 'cra 1 hn 80-13', 'angelwilches@hotmail.com', 0),
('201253347', '2702', 'BERMUDEZ GUZMAN CRISTIAN CAMIL', '2719607', 'Calle 11 # 16-33', 'cristiancamilo_0102@hotmail.com', 0),
('201253350', '3845', 'LEÃ“N HOYOS LUIS FELIPE', '2719877', 'CALLE 72A 1A352', 'FELIPE940530@HOTMAIL.COM', 0),
('201253351', '2704', 'BOLAÃ‘OS VICTORIA PEDRO ALEJAND', '2719698', 'CL 35 16 - 85', 'dragon-slayer09@hotmail.com', 0),
('201253354', '2716', 'MARIN MARIN LICETH DAYANA', '2719745', 'Cra 11c 19-48', 'dayanamarin2010@hotmail.com', 0),
('201253357', '3845', 'QUIJANO ACHICANOY CHRISTIAN DA', '2719878', 'CALLE 72A 1A353', 'c-quijano@hotmail.com', 0),
('201253358', '2703', 'NARVAEZ ACOSTA MARCELA PAOLA', '2719652', 'cr 10 # 24-51', 'Actualizar', 0),
('201253360', '3842', 'SERRANO CUERO ZULIANY', '2719838', 'CALLE 72A 1A313', 'zulyse9401@hotmail.com', 0),
('201253363', '3842', 'PATIÃ±O DUQUE LAUREN YINARY', '2719839', 'CALLE 72A 1A314', 'lauren_122994@hotmail.com', 0),
('201253365', '3484', 'VELEZ SOTO DIEGO ALEJANDRO', '2719801', 'cra 1 hn 80-12', 'alejandritoelmas94@hotmail.com', 0),
('201253367', '3845', 'SALAZAR GIRALDO ESTEFANIA', '2719879', 'CALLE 72A 1A354', 'tefis1703@hotmail.com', 0),
('201253372', '3845', 'GARCIA VALENCIA DANNY FABIAN', '2719880', 'CALLE 72A 1A355', 'dannyfa92@hotmail.com', 0),
('201253373', '3484', 'MACHADO MARULANDA ANDRES FELIPE', '2719802', 'cra 1 hn 80-11', 'femach08@hotmail.com', 0),
('201253379', '2716', 'MARQUEZ MONTEALEGRE DANIEL ROD', '2719746', 'Cra 11c 19-47', 'danielxitup@hotmail.com', 0),
('201253381', '3845', 'TOVAR RAMÃREZ JESSICA', '2719881', 'CALLE 72A 1A356', 'jessica.tovar@hotmail.com', 0),
('201253385', '2703', 'FIGUEROA MURIEL KATHERIN', '2719653', 'cr 10 # 24-50', 'Kathefigueroa_m@hotmail.com', 0),
('201253389', '2702', 'MARTINEZ SUAREZ MIGUEL ANGEL', '2719608', 'cr 10 # 24-95', 'angelmsn93@hotmail.com', 0),
('201253392', '2704', 'VELOZA ECHEVERRY LUIS ALBERTO', '2719699', 'CL 35 16 - 86', 'lutove94@hotmail.com', 0),
('201253394', '2703', 'CHARRIA DURAN LUIS EDUARDO', '2719654', 'cr 10 # 24-49', 'charritho18@hotmail.com', 0),
('201253397', '2716', 'IDROBO BECERRA DIEGO FERNANDO', '2719747', 'Cra 11c 19-46', 'Diefer9517@hotmail.com', 0),
('201253401', '2702', 'RODRIGUEZ VARGAS CARLOS ALBERTO', '2719609', 'cr 10 # 24-94', 'karlozonline@hotmail.com', 0),
('201253404', '2703', 'TAPASCO MOLINA JENNIFER', '2719655', 'cr 10 # 24-48', 'jemor95@hotmail.com', 0),
('201253427', '3842', 'MALTE TARAPUES SILVIA LUCERO', '2719840', 'CALLE 72A 1A315', 'maltesilvia@hotmail.com', 0),
('201253434', '3842', 'IBAÃ‘EZ CARDONA LAURA ISABELA', '2719841', 'CALLE 72A 1A316', 'lauralinda94@hotmail.com', 0),
('201253435', '2702', 'TORRES CANCHALA GERMÃN ANDRES', '2719610', 'cr 10 # 24-93', 'andres_lotorres@hotmail.com', 0),
('201253440', '2704', 'ESPINAL MARIN JAVIER STEVEN', '2719700', 'CL 35 16 - 87', 'javiersteven94@hotmail.com', 0),
('201253443', '3484', 'RUIZ LOPEZ YESID MAURICIO', '2719803', 'cra 1 hn 80-10', 'mauro-2425@hotmail.com', 0),
('201253447', '2702', 'ECHEVERRI LUGO JUAN DANIEL', '2719611', 'cr 10 # 24-92', 'Actualizar', 0),
('201253448', '3845', 'GIL VIVAS KELLY TATIANA', '2719882', 'CALLE 72A 1A357', 'kellytatianagil@hotmail.com', 0),
('201253453', '3845', 'GAVIRIA CICERI JONATHAN ALEXAN', '2719883', 'CALLE 72A 1A358', 'aleszapatos@hotmail.com', 0),
('201253454', '2704', 'CARABALI IBARGUEN CRISTIAN FELipe', '2719701', 'CL 35 16 - 88', 'j.onwilder@hotmail.com', 0),
('201253455', '2716', 'GOMEZ VARGAS HELLEN MELISSA', '2719748', 'Cra 11c 19-45', 'melissagomez4@hotmail.com', 0),
('201253460', '2704', 'REYES BERRIO CHRISTIAN DAVID', '2719702', 'CL 35 16 - 89', 'cdrb_1992@hotmail.com', 0),
('201253461', '2702', 'REYES BERRIO INGRID JOANA', '2719612', 'cr 10 # 24-91', 'pato0248@hotmail.com', 0),
('201253465', '2703', 'OROZCO MARQUEZ ZULENY ANDREA', '2719656', 'cr 10 # 24-47', 'pukitap_1706@homail.com', 0),
('201253472', '3842', 'GONZALEZ RIVERA ALBA DORIS', '2719842', 'CALLE 72A 1A317', 'albadorisgonzalez@yahoo.es', 0),
('201253475', '2702', 'CAMPO BALCAZAR JUAN CAMILO', '2719613', 'cr 10 # 24-90', 'j_kmilo19@hotmail.com', 0),
('201253482', '3484', 'GUTIERREZ SUAREZ CRISTIAN CAMI', '2719804', 'cra 1 hn 80-9', 'camilogutierrez993@hotmail.com', 0),
('201253484', '2704', 'MOTATO AMARILES JOAN ANDRES', '2719703', 'CL 35 16 - 90', 'MOTATO99@HOTMAIL.COM', 0),
('201253485', '2716', 'SILVA CUERO DIANA PATRICIA', '2719749', 'Cra 11c 19-44', 'diana.psc@hotmail.com', 0),
('201253488', '2704', 'ORDOÃ‘EZ ROJAS JUAN CAMILO', '2719704', 'CL 35 16 - 91', 'kamilo_kor@hotmail.com', 0),
('201253490', '2716', 'DAZA GOMEZ MABEL XIOMARA', '2719750', 'Cra 11c 19-43', 'mabel_peke15@hotmail.com', 0),
('201253491', '2702', 'BEJARANO SANCHEZ CRISTIAN ALEJANDRO', '2719614', 'cr 10 # 24-89', 'cristianb528@hotmail.com', 0),
('201253493', '2716', 'MONCADA GUEVARA JULIANA ANDREA', '2719751', 'Cra 11c 19-42', 'julianaandre92@hotmail.com', 0),
('201253507', '3842', 'CASTRO MEJIA JAIRO ALEXANDER', '2719843', 'CALLE 72A 1A318', 'emersonkastro@hotmail.com', 0),
('201253508', '2716', 'CORTES CORTES JERLINSON FERNANdo', '2719752', 'Cra 11c 19-41', 'asesinopacharam@hotmail.com', 0),
('201253511', '2716', 'CARDONA ORTIZ JULIANA', '2719753', 'Cra 11c 19-40', 'juli-912@hotmail.com', 0),
('201253521', '2704', 'QUINTERO LENIS SEBASTIAN', '2719705', 'Cra 11c 19-88', 'sebas3007@hotmail.com', 0),
('201253522', '2702', 'BECERRA GARZON ASTRID CAROLINA', '2719615', 'cr 10 # 24-88', 'caro-1994-23@hotmail.com', 0),
('201253528', '3845', 'VALENCIA RAIGOZA ERIKA VANESSA', '2719884', 'CALLE 72A 1A359', 'iketta_05@hotmail.com', 0),
('201253529', '3842', 'VALENCIA RAIGOZA DIANA MARCELA', '2719844', 'CALLE 72A 1A319', 'didival0495@hotmail.com', 0),
('201253530', '2702', 'VALENCIA RAIGOZA PAOLA ANDREA', '2719616', 'cr 10 # 24-87', 'andreita14_94@hotmail.com', 0),
('201253533', '2702', 'BUITRAGO VALENCIA JOSE LEONARD', '2719617', 'cr 10 # 24-86', 'leobuitragov@gmail.com', 0),
('201253540', '3842', 'GALEANO SORIANO GERSON', '2719845', 'CALLE 72A 1A320', 'ge_ga_sor@hotmail.com', 0),
('201253551', '3484', 'MELGAREJO RODRIGUEZ DIEGO ALEJ', '2719805', 'cra 1 hn 80-8', 'dsal8888@hotmail.com', 0),
('201253552', '3845', 'GALLEGO TILMANS JESSICA LUCIA', '2719885', 'CALLE 72A 1A360', 'YESSIK_209@HOTMAIL.COM', 0),
('201253558', '2716', 'ALZATE AGUIRRE STEPHANIE', '2719754', 'Cra 11c 19-39', 'stefa_9408@hotmail.com', 0),
('201253561', '3484', 'LOZANO RENDON CARLOS ANDRES', '2719806', 'cra 1 hn 80-7', 'loquito.lozano@hotmail.com', 0),
('201253563', '2702', 'PEÃ‘A CASTAÃ‘O DIEGO ENRIQUE', '2719618', 'cr 10 # 24-85', 'diego5850@hotmail.com', 0),
('201253564', '2702', 'VELASCO TOWERS ISMAEL ENRIQUE', '2719619', 'cr 10 # 24-84', 'towersismael7@gmail.com', 0),
('201253571', '2716', 'ORTIZ GIRON JUAN CAMILO', '2719755', 'Cra 11c 19-38', 'juandeadmanhotmail.com', 0),
('201253572', '2704', 'CHEVEZ TROCHEZ MAYRA ALEJANDRA', '2719706', 'Cra 11c 19-87', 'xxalejitapxx@hotmail.com', 0),
('201253573', '3845', 'MARIN GARCIA LILIANA', '2719886', 'CALLE 72A 1A361', 'Lilixma@gmail.com', 0),
('201253574', '2703', 'OREJUELA GARCIA FRANCISCO JAVI', '2719657', 'cr 10 # 24-46', 'pacho-o03@hotmail.com', 0),
('201253575', '2704', 'RODRIGUEZ VASQUEZ JULIAN DAVID', '2719707', 'Cra 11c 19-86', 'jdrv_94@hotmail.com', 0),
('201253577', '2703', 'CUELLAR CADAVID VALERIA', '2719658', 'cr 10 # 24-45', 'valeri-1994@hotmail.com', 0),
('201253578', '2704', 'OROZCO DOMINGUEZ HAROLD ANDRES', '2719708', 'Cra 11c 19-85', 'haroldan93@hotmail.com', 0),
('201253579', '2704', 'RIVERA CHAZATAR JUAN PABLO', '2719709', 'Cra 11c 19-84', 'juanpa1794@hotmail.com', 0),
('201253580', '2704', 'OROZCO CORTES JHOSEP MAURICIO', '2719710', 'Cra 11c 19-83', 'mauri_1322@hotmail.com', 0),
('201253590', '2716', 'MARTINEZ IMBACHI LEIDY JOHANNA', '2719756', 'Cra 11c 19-37', 'lady.th6591@hotmail.com', 0),
('201253591', '2716', 'JORDAN VIDAL ANDRES MAURICIO', '2719757', 'Cra 11c 19-36', 'chio-3269@hotmail.com', 0),
('201253592', '2716', 'AÃƒâ€˜ASCO FERNANDEZ GERALDINE', '2719758', 'Cra 11c 19-35', 'geraf-@hotmail.com', 0),
('201253597', '2716', 'COLLAZOS GRAJALES STEPHANY', '2719759', 'Cra 11c 19-34', 'stephany.collazos@hotmail.com', 0),
('201253598', '2703', 'COLLAZOS RAMIREZ LILYAN DAYANA', '2719659', 'CL 35 16 - 46', 'lily_tsubasa_66@hotmail.com', 0),
('201253601', '2704', 'BELTRAN ESCOBAR HUGO ALEJANDRO', '2719711', 'Cra 11c 19-82', 'alejodrum93@hotmail.com', 0),
('201253610', '2702', 'AGUDELO HERNANDEZ MICHAEL STEV', '2719620', 'cr 10 # 24-83', 'agudelo93@hotmail.com', 0),
('201253614', '3484', 'VEGA SANDRA VIVIANA', '2719807', 'cra 1 hn 80-6', 'tormenta_88@hotmail.com', 0),
('201253618', '2702', 'DUQUE HIGIDIO ROGER ANDERSON', '2719621', 'cr 10 # 24-82', 'roger_112006@hotmail.com', 0),
('201253619', '2704', 'BISCUNDA QUINTANA MAR ZEIN', '2719712', 'Cra 11c 19-81', 'marzein@hotmail.com', 0),
('201253621', '3845', 'RESTREPO VELASCO JUAN CAMILO', '2719887', 'CALLE 72A 1A362', 'cami-1308@hotmail.com', 0),
('201253623', '2704', 'ARANGO FIGUEROA CRISTHIAN FELI', '2719713', 'Cra 11c 19-80', 'pipefbl12@hotmail.com', 0),
('201253624', '2702', 'LUGO VALENCIA CRISTIAN DAVID', '2719622', 'cr 10 # 24-81', 'Actualizar', 0),
('201253626', '2703', 'CAÃ‘AVERAL VELASQEZ OSCAR EDUAR', '2719660', 'CL 35 16 - 47', 'Actualizar', 0),
('201253628', '3845', 'PARRA MARIN YESID FERNANDO', '2719888', 'carrera 20 16-25', 'jessygarabato@hotmail.com', 0),
('201253633', '2704', 'ZULUAGA DUQUE JADER ALFREDO', '2719714', 'Cra 11c 19-79', 'jadermx12hotmail.com', 0),
('201253635', '3842', 'GALLEGO GAMBOA ESNEIDER ALEXAN', '2719846', 'CALLE 72A 1A321', 'mamey.1218@hotmail.com', 0),
('201253637', '3484', 'RAMIREZ RUALES MICHAEL', '2719808', 'cra 1 hn 80-5', 'miike.ramiirez@hotmail.com', 0),
('201253638', '3842', 'QUINTERO MENESES MEYLIN VANESSa', '2719847', 'CALLE 72A 1A322', 'vanesita_0502@hotmail.com', 0),
('201253643', '2716', 'COLORADO OSORIO CARLOS ANDRES', '2719760', 'Cra 11c 19-33', 'andres.u07@hotmail.com', 0),
('201253646', '2702', 'BARRAGAN AVELLANEDA SAMUEL FER', '2719623', 'cr 10 # 24-80', 's.ferbaa0712@hotmail.com', 0),
('201253648', '2703', 'AREVALO CRIOLLO SULEY CAROLINA', '2719661', 'CL 35 16 - 48', 'k-rito1989@hotmail.com', 0),
('201253649', '2703', 'SÃNCHEZ AGUDELO LADY JOANA', '2719662', 'CL 35 16 - 49', 'yimarlore@hotmail.com', 0),
('201253650', '3484', 'ROSERO GALLEGO NEILOTH', '2719809', 'cra 1 hn 80-4', 'ledesnaider@hotmail.com', 0),
('201253652', '2704', 'CHAPARRO MOSCOSO SAMUEL ANDRES', '2719715', 'Cra 11c 19-78', 'samyisa@live.com', 0),
('201253657', '3845', 'GARAVIÑO SANCHEZ MARIA DEL MAR', '2719889', 'carrera 20 16-24', 'delmar94_0224@hotmail.com', 0),
('201253661', '2703', 'BEDOYA CASTAÃ‘EDA ADRIAN ALBENS', '2719663', 'CL 35 16 - 50', 'criadri@hotmail.com', 0),
('201253662', '2703', 'PATIÃ‘O MENESES CRISTIAN DAVID', '2719664', 'CL 35 16 - 51', 'criadri@hotmail.com', 0),
('201253663', '2704', 'CAJIGAS GUERRERO LIANNA FERNANDA', '2719716', 'Cra 11c 19-77', 'li-chowder@hotmail.com', 0),
('201253664', '3842', 'VALENCIA ZAPATA DIANA MELISSA', '2719848', 'CALLE 72A 1A323', 'dianamelisa908@hotmail.com', 0),
('201253665', '3842', 'CRUZ VARON JUAN PABLO', '2719849', 'CALLE 72A 1A324', 'jupac3010@hotmail.com', 0),
('201253669', '2716', 'NARANJO ACOSTA JENNIFER', '2719761', 'Cra 11c 19-32', 'jenaac1029@hotmail.com', 0),
('201253671', '3845', 'HUERTAS PEDROZA DIDIER YUSEF', '2719890', 'carrera 20 16-23', 'yusef-1392@hotmail.com', 0),
('201253674', '2703', 'CASTAÃ‘O MARTINEZ GINETH CAROLINA', '2719665', 'CL 35 16 - 52', 'giny9426@hotmail.com', 0),
('201253675', '2702', 'PEREZ GETIAL BRAYAN STEVEN', '2719624', 'cr 10 # 24-79', 'lkklk1@hotmail.com', 0),
('201253679', '3845', 'ARANGO RESTREPO CLAUDIA MARCEL', '2719891', 'carrera 20 16-22', 'marcelita_arango@hotmail.com', 0),
('201253681', '2704', 'ROSERO RODRIGUEZ CHRISTIAN CAMILO', '2719717', 'Cra 11c 19-76', 'mayor-chris@hotmail.com', 0),
('201253682', '2716', 'SARRIA ORTIZ JAIRO ALFONSO', '2719762', 'Cra 11c 19-31', 'jairo-413@hotmail.com', 0),
('201253683', '2704', 'CUELLAR VACA DAVID FERNANDO', '2719718', 'Cra 11c 19-75', 'david.810@hotmail.com', 0),
('201253686', '3842', 'JIMENEZ CUESTA JHON SEBASTIAN', '2719850', 'CALLE 72A 1A325', 'jhonse.13@hotmail.com', 0),
('201253687', '2716', 'TENORIO SAAVEDRA DANIEL', '2719763', 'Cra 11c 19-30', 'tenoriosaa@hotmail.com', 0),
('201253692', '2704', 'CABRERA MARTINEZ GIOVANNY', '2719719', 'Cra 11c 19-74', 'giomacama@hotmail.com', 0),
('201253696', '3845', 'AVILA OREJUELA LINA VANESSA', '2719892', 'carrera 20 16-21', 'nalixx_hj93@hotmail.com', 0),
('201253697', '2704', 'LONDOÃ‘O ISAZA CRISTIAN DAVID', '2719720', 'Cra 11c 19-73', 'cristians125@hotmail.com', 0),
('201253698', '2716', 'CUADROS DIAZ YISEL DANITZA', '2719764', 'Cra 11c 19-29', 'paulaqadros2604@hotmail.com', 0),
('201253699', '2716', 'ALARCON GOMEZ ADRIANA', '2719765', 'Cra 11c 19-28', 'adrianita_bonita17@hotmail.com', 0),
('201253704', '2704', 'PEREZ SILVA MIGUEL ANGEL', '2719721', 'Cra 11c 19-72', 'miguelitoaps1993@hotmail.com', 0),
('201253706', '3842', 'BEDOYA JARAMILLO MAYRA ALEJAND', '2719851', 'CALLE 72A 1A326', 'mayra4578@hotmail.com', 0),
('201253707', '3842', 'PAZ OSORIO ANDRES FELIPE', '2719852', 'CALLE 72A 1A327', 'pipe0_10@hotmail.com', 0),
('201253709', '3845', 'MUÃ‘OZ BURBANO ANGELA PATRICIA', '2719893', 'carrera 20 16-20', 'angelamunozb@hotmail.com', 0),
('201253716', '3484', 'MORA GOMEZ MOISES DAVID', '2719810', 'cra 1 hn 80-3', 'moiso_d@hotmail.com', 0),
('201253724', '2702', 'MURILLO SOTELO GABRIEL ALEJAND', '2719625', 'cr 10 # 24-78', 'alejogm18@gmail.com', 0),
('201253728', '3842', 'SUAREZ YEPES ROOSEVELT', '2719853', 'CALLE 72A 1A328', 'roos-7141@hotmail.com', 0),
('201253731', '3845', 'COLLAZOS CASTRO YURANI', '2719894', 'carrera 20 16-19', 'ycollazoscc@hotmail.com', 0),
('201253735', '3842', 'RESTREPO GARCIA DIANA CAROLINA', '2719854', 'CALLE 72A 1A329', 'k-rolina-27@hotmail.com', 0),
('201253743', '2703', 'CARDENAS ARAQUE CRHISTIAN CAMI', '2719666', 'CL 35 16 - 53', 'c.cardenasaraque24@hotmail.com', 0),
('201253744', '3845', 'GIRÃ“N ARAQUE YULI VANESSA', '2719895', 'carrera 20 16-18', 'vanegiron87@hotma.com', 0),
('201253752', '2703', 'CORRALES PATIÃƒâ€˜O CRISTIAN DAVID', '2719667', 'CL 35 16 - 54', 'TUTTO0225@hotmail.com', 0),
('201253760', '2703', 'POLANCO VILLEGAS ANGIE JULIETH', '2719668', 'CL 35 16 - 55', 'angiejulieth1991@hotmail.com', 0),
('201253761', '2702', 'GAVIRIA MAZUERA DANIEL EDUARDO', '2719626', 'cr 10 # 24-77', 'danielgaviria94@hotmail.com', 0),
('201253765', '2716', 'CORAL ROMERO KATERINE', '2719766', 'Cra 11c 19-27', 'katecol96@hotmail.com', 0),
('201253776', '3845', 'OCAMPO OCAMPO JESÃšS ANTONIO', '2719896', 'carrera 20 16-17', 'jessampo@gmail.com', 0),
('201253777', '2702', 'GARCIA LOPEZ JADER ANDRES', '2719627', 'cr 10 # 24-76', 'jade_r_a@hotmail.com', 0),
('201253778', '2704', 'INFANTE ZUÃ‘IGA NATALIA', '2719722', 'Cra 11c 19-71', 'natalia.infante5@hotmail.com', 0),
('201253779', '2716', 'CASTRO MARIN LUISA FERNANDA', '2719767', 'Cra 11c 19-26', 'fer-1794@hotmail.com', 0),
('201253780', '3484', 'MACANA LOPEZ LINA MARCELA', '2719811', 'cra 1 hn 80-2', 'Actualizar', 0),
('201253782', '2703', 'GARCIA APONTE LEYDI TATIANA', '2719669', 'CL 35 16 - 56', 'leidyga94@hotmail.com', 0),
('201253786', '3842', 'RIVERA MARIN LEIDY TATIANA', '2719855', 'CALLE 72A 1A330', 'tatis-195@hotmail.com', 0),
('201253795', '2716', 'GUERRERO ESCOBAR CRHISTIAN ORLANDO', '2719768', 'Cra 11c 19-25', 'kristian_0427@hotmail.com', 0),
('201253797', '2702', 'CORTES PAZ CRISTHIAN ALFONSO', '2719628', 'cr 10 # 24-75', 'cristhian-sony@hotmail.com', 0),
('201253801', '2716', 'TORO BUSTAMANTE LAURA VANESSA', '2719769', 'Cra 11c 19-24', 'peque.9401@hotmail.com', 0),
('201253803', '2716', 'RAYO ALVAREZ DANIELA', '2719770', 'Cra 11c 19-23', 'dani_19958246@hotmail.com', 0),
('201253812', '2716', 'POLANIA ARANGO DIEGO FERNANDO', '2719771', 'Cra 11c 19-22', 'diego.1914@hotmail.com', 0),
('201253813', '2703', 'QUINTERO JIMENEZ JUAN ANDRES', '2719670', 'CL 35 16 - 57', 'roguerip@hotmail.com', 0),
('201253815', '2703', 'MORA LÃ“PEZ DIANA CAROLINA', '2719671', 'CL 35 16 - 58', 'krolina_305@hotmail.com', 0),
('201253818', '3842', 'FERNANDEZ SANCHEZ JANETH', '2719856', 'CALLE 72A 1A331', 'janeth_a3_t1@hotmail.com', 0),
('201253819', '2703', 'VALENCIA RIOS KATHERINE', '2719672', 'CL 35 16 - 59', 'katherinev321@hotmail.com', 0),
('201253824', '2704', 'RUEDA RODRIGUEZ CRISTHIAN FELIpe', '2719723', 'Cra 11c 19-70', 'cristianfr_@hotmail.com', 0),
('201253825', '2704', 'HUACA CUELLAR BRANDON STID', '2719724', 'Cra 11c 19-69', 'brandonstid94@hotmail.com', 0),
('201253826', '2716', 'ALVAREZ DIAZ SHERELYN', '2719772', 'Cra 11c 19-21', 'sherelyn61@hotmail.com', 0),
('201253836', '3845', 'CARDONA JIMENEZ LEIDY', '2719897', 'carrera 20 16-16', 'lcardona92@hotmail.com', 0),
('201253837', '3484', 'CAMPO FERNANDEZ KELY YINETH', '2719812', 'cra 1 hn 80-1', 'kelly_hebest@hotmail.com', 0),
('201253849', '3842', 'DOMINGUEZ RIOS DANIELA', '2719857', 'CALLE 72A 1A332', 'daguez33@hotmail.com', 0),
('201253860', '3842', 'GRISALES VALENCIA ANYELI ANDRE', '2719858', 'CALLE 72A 1A333', 'yelitogris@hotmail.com', 0),
('201253861', '2703', 'CALLE CAMACHO MERLIN', '2719673', 'CL 35 16 - 60', 'Actualizar', 0),
('201253864', '2703', 'GALLEGO COLONIA CLAUDIA STEFANIE', '2719674', 'CL 35 16 - 61', 'claugallego30@hotmail.com', 0),
('201253865', '2716', 'RODRIGUEZ GARCIA NIYIRETH', '2719773', 'Cra 11c 19-20', 'niyi_rodriguez@hotmail.com', 0),
('201253866', '2702', 'MEDINA CORDOBA ANGIE PAOLA', '2719629', 'cr 10 # 24-74', 'angie_p93@hotmail.com', 0),
('201253867', '2703', 'TOVAR MOLINA SEBASTIAN', '2719675', 'CL 35 16 - 62', 'sebastovarm@gmail.com', 0),
('201253871', '2702', 'MENDEZ GOMEZ ANDRES FERNANDO', '2719630', 'cr 10 # 24-73', 'andresmendhez@hotmail.com', 0),
('201253873', '2703', 'SANCHEZ SANGUINO AMBER JOSE AL', '2719676', 'CL 35 16 - 63', 'gape.ing@hotmail.com', 0),
('201253874', '3842', 'CORREA YEPES ORLANDO', '2719859', 'CALLE 72A 1A334', 'orlacorrye@hotmail.com', 0),
('201253875', '2703', 'HERNANDEZ ORDOÃ‘EZ JEINY ESTEFA', '2719677', 'CL 35 16 - 64', 'estefa940513@hotmail.com', 0),
('201253876', '3845', 'TAFUR PALACIOS LEONARDO', '2719898', 'carrera 20 16-15', 'tafurpa@hotmail.com', 0),
('201253880', '2702', 'MORENO TORRES PAULA ANDREA', '2719631', 'cr 10 # 24-72', 'paulandreat@hotmail.com', 0),
('201253887', '2716', 'GRUESO PERLAZA YUZMARY JOSEFINA', '2719774', 'Cra 11c 19-19', 'yux-mai17@hotmail.com', 0),
('201253889', '3484', 'ACEVEDO RUIZ JANNIER STIVEN', '2719813', 'cra 46 N53-16', 'Actualizar', 0),
('201253892', '3484', 'ESCOBAR CASTRO JORGE ANDRES', '2719814', 'cra 46 N53-15', 'jorge.cetel@hotmail.com', 0),
('201253896', '2703', 'ORTEGA ESCRUCERIA JESUS STIVEN', '2719678', 'CL 35 16 - 65', 'jestiven0895@hotmail.com', 0),
('201253899', '2703', 'OTERO BRITO JOHN EDINSON', '2719679', 'CL 35 16 - 66', 'johnotero88@hotmail.com', 0),
('201253903', '2716', 'BAENA MUNERA ANGIE LORENA', '2719775', 'Cra 11c 19-18', 'angielorena678@hotmail.com', 0),
('201253905', '3842', 'RODRIGUEZ RENGIFO JUAN SEBASTIAN', '2719860', 'CALLE 72A 1A335', 'sebastian_0626@hotmail.com', 0),
('201253906', '3842', 'MORENO LOPEZ JUAN SEBASTIAN', '2719861', 'CALLE 72A 1A336', 'sebastian.moreno0@gmail.com', 0),
('201253907', '2716', 'BECERRA GOMEZ PAUL', '2719776', 'Cra 11c 19-17', 'thegeneralbeast@hotmail.com', 0),
('201253909', '2702', 'DIAZ BORRERO ANDRES FELIPE', '2719632', 'cr 10 # 24-71', 'andresfelipdi94@hotmail.com', 0),
('201253911', '3484', 'MONTEALEGRE MEDINA SILVIO', '2719815', 'cra 46 N53-14', 'simome1993@gmail.com', 0),
('201253912', '3484', 'QUINTERO NARVAEZ GABRIELA', '2719816', 'cra 46 N53-13', 'gabylyoko@hotmail.com', 0),
('201253913', '2704', 'QUIJANO PERDOMO IVAN ANDRES', '2719725', 'Cra 11c 19-68', 'ivancho1909@hotmail.com', 0),
('201253914', '2703', 'FERNANDEZ SOTO ALBA LORENA', '2719680', 'CL 35 16 - 67', 'lorenafs07@hotmail.com', 0),
('201253920', '2702', 'MEJÃA PERLAZA NICOLAS', '2719633', 'cr 10 # 24-70', 'nickmeka@hotmail,com', 0),
('201253922', '2704', 'BUITRAGO FLOREZ ALAN', '2719726', 'Cra 11c 19-67', 'alan_brito_92@hotmail.com', 0),
('201253931', '3484', 'CUMBAL CUARAN CARLOS CESAR', '2719817', 'cra 46 N53-12', 'carloscesarc4@hotmail.com', 0),
('201253935', '3845', 'ALMARIO VILLANUEVA CARMEN', '2719899', 'carrera 20 16-14', 'k-rmen-35@hotmail.com', 0),
('201253936', '3484', 'PORRAS MORALES SERGIO OTONIEL', '2719818', 'cra 46 N53-11', 'sergioelcalidoso@hotmail.com', 0),
('201253945', '3484', 'VALENCIA GRAJALES SERGIO', '2719819', 'cra 46 N53-10', 'sergiovalencia.02@hotmail.com', 0),
('201253947', '2703', 'MAQUILON CASTILLO NISLEY DADIA', '2719681', 'CL 35 16 - 68', 'ndadiana@hotmail.com', 0),
('201253950', '2702', 'MARTINEZ VALENCIA ANDRES FERNA', '2719634', 'cr 10 # 24-69', 'andrescito13@hotmail.com', 0),
('201253952', '2704', 'QUINTERO MONTOYA JAIME ANDRES', '2719727', 'Cra 11c 19-66', 'jaime-691@hotmail.com', 0),
('201253953', '3845', 'AFANADOR ARROYO EDUARDO ALBERT', '2719900', 'carrera 20 16-13', 'eduardoafanador@yahoo.com', 0),
('201253957', '3842', 'GARCIA ROJAS HERMINSUN DAVID', '2719862', 'CALLE 72A 1A337', 'david94_garcia@hotmail.com', 0),
('201253960', '2704', 'PIEDRAHITA PIANDOY SERGIO DANIEL', '2719728', 'Cra 11c 19-65', 'sergio-2506@hotmail.com', 0),
('201253962', '3484', 'IBARRA CHAVEZ CAROLINA', '2719820', 'cra 46 N53-9', 'caro.i.b.140294@hotmail.com', 0),
('201253964', '3842', 'LOPEZ VASQUEZ ANDRES MAURI', '2719863', 'CALLE 72A 1A338', 'elpaisa-1945@hotmail.com', 0),
('201253966', '3845', 'RESTREPO VARON LISBELLY', '2719901', 'carrera 20 16-12', 'lis-0902@hotmail.com', 0),
('201253972', '3484', 'GUERRERO ESCOBAR JOSE FABIAN', '2719821', 'cra 46 N53-8', 'guerrero092009@hotmail.com', 0),
('201253980', '3845', 'ARDILA DIAZ DAVID ARTURO', '2719902', 'carrera 20 16-11', 'david-qki@hotmail.com', 0),
('201253999', '2703', 'RAMIREZ ENRIQUEZ LUZ KARIME', '2719682', 'CL 35 16 - 69', 'luzk-93@hotmail.com', 0),
('201254005', '3484', 'REALPE MONTAÃƒâ€˜O JHOAN SEBASTIAN', '2719822', 'cra 46 N53-7', 'sebas18080622@hotmail.com', 0),
('201254015', '3845', 'CARREÃ‘O VILLAQUIRAN MARIA FERN', '2719903', 'carrera 20 16-10', 'meryfernandavilla @hotmail.com', 0),
('201254024', '2702', 'SANCHEZ BOHORQUEZ JUAN GABRIEL', '2719635', 'cr 10 # 24-68', 'juanga0907@hotmail.com', 0),
('201254028', '2704', 'HINESTROZA POVEDA DIANA CATHERINE', '2719729', 'Cra 11c 19-64', 'katherine11_2@hotmail.com', 0),
('201254035', '3845', 'LARROTTA BARAJAS JHON FREDY', '2719904', 'carrera 20 16-9', 'jhonlato2008@hotmail.com', 0),
('201254040', '2716', 'sinisterra hurtado maria del mar', '2719777', 'Cra 11c 19-16', 'marymar_1991@hotmail.com', 0),
('201254043', '2702', 'RODRIGUEZ CASTILLO CESAR AUGUS', '2719636', 'cr 10 # 24-67', 'cesar_14_rodriguez@hotmail.com', 0),
('201254045', '2716', 'PAZ RIVERA JASSIR MADELY', '2719778', 'Cra 11c 19-15', 'madelypaz@hotmail.com', 0),
('201254053', '2703', 'VIANA ARIAS JOSE LUIS', '2719683', 'CL 35 16 - 70', 'Jos3luis543@hotmail.es', 0),
('201254054', '2716', 'SERRANO ECHEVERRY VICTOR ALEJA', '2719779', 'Cra 11c 19-14', 'victoralejo1996@hotmail.com', 0),
('201254055', '2716', 'CONTRERAS LEON DANIELA', '2719780', 'cra 1 hn 80-33', 'daniela_cole@hotmail.com', 0),
('201254070', '2704', 'GONZALEZ PEREZ ENRIQUE', '2719730', 'Cra 11c 19-63', 'enrique12-@hotmail.com', 0),
('201254072', '2703', 'VALENCIA CACERES JAHAIRA ANDRE', '2719684', 'CL 35 16 - 71', 'Actualizar', 0),
('201254074', '2704', 'VELASCO TABARES HAROLD SMITH', '2719731', 'Cra 11c 19-62', 'harold_smith94@hotmail.com', 0),
('201254078', '2702', 'MARTINEZ ARIAS MOISES SERGIO E', '2719637', 'cr 10 # 24-66', 'ritmico.amarillo@hotmail.com', 0),
('201254103', '3484', 'LOPEZ CHARRIA CARLOS ANDRES', '2719823', 'cra 46 N53-6', 'elkpilopez@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `cedula` varchar(12) NOT NULL,
  `nombre_fun` varchar(100) NOT NULL,
  `telefono1` varchar(30) NOT NULL,
  `telefono2` varchar(30) NOT NULL,
  `correo_fun` varchar(100) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`cedula`, `nombre_fun`, `telefono1`, `telefono2`, `correo_fun`, `contrasena`, `estado`) VALUES
('12345', 'profesor', '1234567', '1234567', 'profe@gmail.com', '12345', 0),
('66924300', 'GLORIA PATRICIA  AVILA FAJARDO', '3103654789', '2736659', 'usuario01@univalle.edu.co', '66924300', 1),
('66924301', 'FRANCISCO ANDRES  GONGORA NAZARENO', '3103654790', '2736660', 'usuario02@univalle.edu.co', '66924301', 1),
('66924302', 'OSCAR  FERNANDEZ', '3103654791', '2736661', 'usuario03@univalle.edu.co', '66924302', 1),
('66924303', 'GUSTAVO ADOLFO  GONZALEZ ABONIA', '3103654792', '2736662', 'usuario04@univalle.edu.co', '66924303', 1),
('66924304', 'ANTONIO JOSE  VELEZ QUINTERO', '3103654793', '2736663', 'usuario05@univalle.edu.co', '66924304', 1),
('66924305', 'LINA MARIA  BUITRAGO VELASQUEZ', '3103654794', '2736664', 'usuario06@univalle.edu.co', '66924305', 1),
('66924306', 'MARIA FERNANDA  ESCOBAR', '3103654795', '2736665', 'usuario07@univalle.edu.co', '66924306', 1),
('66924307', 'OMAR JULIAN  FLOREZ', '3103654796', '2736666', 'usuario08@univalle.edu.co', '66924307', 1),
('66924308', 'MARIELA  GALINDO', '3103654797', '2736667', 'usuario09@univalle.edu.co', '66924308', 1),
('66924309', 'NANCY  GIRONZA', '3103654798', '2736668', 'usuario10@univalle.edu.co', '66924309', 1),
('66924310', 'MILLERLAY  GRISALES COLORADO', '3103654799', '2736669', 'usuario11@univalle.edu.co', '66924310', 1),
('66924311', 'TANIA PAOLA  HAMANN', '3103654800', '2736670', 'usuario12@univalle.edu.co', '66924311', 1),
('66924312', 'NATHALIA  HENAO CARDONA', '3103654801', '2736671', 'usuario13@univalle.edu.co', '66924312', 1),
('66924313', 'ROSA AMELIA  IZQUIERDO', '3103654802', '2736672', 'usuario14@univalle.edu.co', '66924313', 1),
('66924314', 'ADOLFO ANDRES  JARAMILLO', '3103654803', '2736673', 'usuario15@univalle.edu.co', '66924314', 1),
('66924315', 'LEONARDO  DANIEL  JARAMILLO', '3103654804', '2736674', 'usuario16@univalle.edu.co', '66924315', 1),
('66924316', 'CLAUDIA  LANDAZURY', '3103654805', '2736675', 'usuario17@univalle.edu.co', '66924316', 1),
('66924317', 'MARTHA INES  MANZANO', '3103654806', '2736676', 'usuario18@univalle.edu.co', '66924317', 1),
('66924318', 'OMAIRA  MOSQUERA', '3103654807', '2736677', 'usuario19@univalle.edu.co', '66924318', 1),
('66924319', 'GUILLERMO  PE?UELA', '3103654808', '2736678', 'usuario20@univalle.edu.co', '66924319', 1),
('66924320', 'JULIA INES  PIEDRAHITA', '3103654809', '2736679', 'usuario21@univalle.edu.co', '66924320', 1),
('66924321', 'FLOR NEIDA  RANGEL', '3103654810', '2736680', 'usuario22@univalle.edu.co', '66924321', 1),
('66924322', 'ANGELA MARIA  ROJAS', '3103654811', '2736681', 'usuario23@univalle.edu.co', '66924322', 1),
('66924323', 'MARIA CLAUDIA  SOLARTE', '3103654812', '2736682', 'usuario24@univalle.edu.co', '66924323', 1),
('66924324', 'YULI CATALINA  TORRES', '3103654813', '2736683', 'usuario25@univalle.edu.co', '66924324', 1),
('66924325', 'JORGE ELIECER  PAYAN REY', '3103654814', '2736684', 'usuario26@univalle.edu.co', '66924325', 1),
('66924326', 'HERMAN  BELALCAZAR ORDO?EZ', '3103654815', '2736685', 'usuario27@univalle.edu.co', '66924326', 1),
('66924327', 'JES?S GERM?N  MOLINA RENGIFO', '3103654816', '2736686', 'usuario28@univalle.edu.co', '66924327', 1),
('66924328', 'VICTOR MANUEL  VARGAS FORERO', '3103654817', '2736687', 'usuario29@univalle.edu.co', '66924328', 1),
('66924329', 'GUSTAVO ALFREDO  PEREZ VICTORIA', '3103654818', '2736688', 'usuario30@univalle.edu.co', '66924329', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `Programa` varchar(4) NOT NULL,
  `nombre_prog` varchar(45) NOT NULL,
  PRIMARY KEY (`Programa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`Programa`, `nombre_prog`) VALUES
('2702', 'Tecnologia en Sistemas'),
('2703', 'Tecnologia en Alimentos'),
('2704', 'Tecnologia en Electronica'),
('2716', 'Tecnologia Agroambiental'),
('3484', 'Licenciatura en Educacion Fisica y Deportes'),
('3842', 'Contaduria Publica'),
('3845', 'Administracion de Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrobecarios`
--

CREATE TABLE IF NOT EXISTS `registrobecarios` (
  `idRegistobecario` int(11) NOT NULL AUTO_INCREMENT,
  `becarios_Estudiantes_Codigo` varchar(10) NOT NULL,
  `computadores_Cod_comp` int(11) NOT NULL,
  `fecha_reg_bec` date NOT NULL,
  `hora_ing` time NOT NULL,
  `hora_sal` time DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`idRegistobecario`),
  KEY `fk_Registobecarios_Becarios1_idx` (`becarios_Estudiantes_Codigo`),
  KEY `fk_Registobecarios_Computadores1_idx` (`computadores_Cod_comp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `registrobecarios`
--

INSERT INTO `registrobecarios` (`idRegistobecario`, `becarios_Estudiantes_Codigo`, `computadores_Cod_comp`, `fecha_reg_bec`, `hora_ing`, `hora_sal`, `observaciones`) VALUES
(13, '201252953', 12, '2012-11-09', '18:01:21', '18:43:20', 'NingunObservacion'),
(14, '201252953', 12, '2012-11-09', '18:25:48', '18:43:20', 'Ninguna Observacion'),
(15, '201252953', 12, '2012-11-09', '18:29:19', '18:43:20', 'Ninguna Observacion'),
(16, '201252953', 12, '2012-11-09', '18:43:10', '18:43:20', 'Ninguna Observacion'),
(17, '201252953', 12, '2012-11-09', '18:45:24', '18:45:31', 'Ninguna Observacion'),
(18, '201252953', 12, '2012-11-09', '18:46:21', '18:43:20', 'Ninguna Observacion'),
(19, '201252953', 12, '2012-11-09', '18:47:40', '18:43:20', 'Ninguna Observacion'),
(20, '201252953', 12, '2012-11-09', '18:48:37', NULL, NULL),
(21, '201252953', 12, '2012-11-09', '19:13:58', NULL, NULL),
(22, '201252953', 12, '2012-11-09', '19:20:29', '18:43:20', 'Ninguna Observacion'),
(23, '201252953', 12, '2012-11-09', '19:25:19', NULL, NULL),
(24, '201252959', 12, '2012-11-09', '19:27:38', NULL, NULL),
(25, '201252953', 12, '2012-11-09', '19:30:18', NULL, NULL),
(26, '201252953', 12, '2012-11-09', '19:36:34', NULL, NULL),
(27, '201252959', 12, '2012-11-27', '22:15:27', '23:43:20', 'Ninguna observacion'),
(28, '201252959', 12, '2012-11-30', '00:01:23', NULL, NULL),
(29, '201252959', 12, '2012-11-30', '00:01:40', NULL, NULL),
(30, '201252959', 12, '2012-11-30', '00:01:48', NULL, NULL),
(31, '201252959', 12, '2012-11-30', '00:07:22', NULL, NULL),
(32, '201252959', 12, '2012-11-30', '00:09:44', NULL, NULL),
(33, '201252959', 12, '2012-11-30', '00:11:52', NULL, NULL),
(34, '201252959', 12, '2012-11-30', '01:14:04', NULL, NULL),
(35, '201252959', 12, '2012-11-30', '02:56:39', NULL, NULL),
(36, '201252959', 12, '2012-11-30', '02:57:31', NULL, NULL),
(37, '201252959', 12, '2012-11-30', '03:21:50', NULL, NULL),
(38, '201252959', 12, '2012-11-30', '03:53:21', NULL, NULL),
(39, '201252959', 12, '2012-11-30', '03:53:27', NULL, NULL),
(40, '201252959', 12, '2012-11-30', '03:54:07', NULL, NULL),
(41, '201252959', 12, '2012-11-30', '05:00:09', NULL, NULL),
(42, '201252959', 12, '2012-11-30', '09:18:01', NULL, NULL),
(43, '201252959', 12, '2012-11-30', '15:43:16', NULL, NULL),
(44, '201252959', 12, '2012-11-30', '15:49:55', NULL, NULL),
(45, '201252959', 12, '2012-11-30', '15:52:15', NULL, NULL),
(46, '201252959', 12, '2012-11-30', '16:02:32', NULL, NULL),
(47, '201252959', 12, '2012-11-30', '16:32:43', NULL, NULL),
(48, '201252959', 12, '2012-12-01', '04:11:53', NULL, NULL),
(49, '201252959', 12, '2012-12-01', '06:08:49', NULL, NULL),
(50, '201252959', 14, '2012-12-01', '01:08:20', NULL, NULL),
(51, '201252959', 14, '2012-12-01', '02:09:48', NULL, NULL),
(52, '201252959', 14, '2012-12-01', '03:05:36', NULL, NULL),
(53, '201252959', 14, '2012-12-01', '11:45:23', NULL, NULL),
(54, '201252959', 14, '2012-12-01', '14:30:09', NULL, NULL),
(55, '201252959', 14, '2012-12-01', '22:12:43', NULL, NULL),
(56, '201252959', 14, '2012-12-01', '23:38:05', NULL, NULL),
(57, '201252959', 14, '2012-12-01', '23:50:06', NULL, NULL),
(58, '201252959', 14, '2012-12-02', '12:45:19', NULL, NULL),
(59, '201252959', 14, '2012-12-02', '13:08:05', NULL, NULL),
(60, '201252959', 14, '2012-12-02', '19:03:58', NULL, NULL),
(61, '201252959', 14, '2012-12-02', '20:45:13', NULL, NULL),
(62, '201252959', 14, '2012-12-02', '21:17:42', NULL, NULL),
(63, '201252959', 12, '2012-12-03', '03:43:52', NULL, NULL),
(64, '201252959', 12, '2012-12-03', '03:47:52', NULL, NULL),
(65, '201252959', 14, '2012-12-03', '06:34:33', NULL, NULL),
(66, '201252959', 14, '2012-12-03', '06:41:55', NULL, NULL),
(67, '201252959', 14, '2012-12-03', '16:35:40', NULL, NULL),
(68, '201252959', 14, '2012-12-03', '17:01:29', NULL, NULL),
(69, '201252959', 14, '2012-12-03', '17:30:38', NULL, NULL),
(70, '201252959', 14, '2012-12-03', '20:13:20', NULL, NULL),
(71, '201252959', 14, '2012-12-03', '22:48:41', NULL, NULL),
(72, '201252959', 14, '2012-12-03', '23:23:37', NULL, NULL),
(73, '201252959', 14, '2012-12-03', '23:42:54', NULL, NULL),
(74, '201252959', 14, '2012-12-03', '23:52:57', '06:11:45', 'ewqewrewrwerwerwer'),
(75, '201252959', 14, '2012-12-04', '01:19:14', NULL, NULL),
(76, '201252959', 14, '2012-12-04', '11:59:31', NULL, NULL),
(77, '201252959', 14, '2012-12-04', '12:36:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocomputador`
--

CREATE TABLE IF NOT EXISTS `registrocomputador` (
  `idRegistro_computador` int(11) NOT NULL AUTO_INCREMENT,
  `registoestudiantes_idRegistoestudiante` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro_computador`),
  KEY `fk_Registro_computador_Registoestudiantes1_idx` (`registoestudiantes_idRegistoestudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroestudiantes`
--

CREATE TABLE IF NOT EXISTS `registroestudiantes` (
  `idRegistoestudiante` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_Codigo` varchar(10) NOT NULL,
  `tipo_practica_Cod_practica` int(11) NOT NULL,
  `computador_Cod_comp` int(11) NOT NULL,
  `fecha_reg_est` date NOT NULL,
  `hora_ing` time NOT NULL,
  `hora_sal` time DEFAULT NULL,
  PRIMARY KEY (`idRegistoestudiante`),
  KEY `fk_Registoestudiante_Estudiante_idx` (`estudiante_Codigo`),
  KEY `fk_Registoestudiante_Tipo_practica1_idx` (`tipo_practica_Cod_practica`),
  KEY `fk_Registoestudiante_Computador1_idx` (`computador_Cod_comp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `registroestudiantes`
--

INSERT INTO `registroestudiantes` (`idRegistoestudiante`, `estudiante_Codigo`, `tipo_practica_Cod_practica`, `computador_Cod_comp`, `fecha_reg_est`, `hora_ing`, `hora_sal`) VALUES
(1, '201252953', 1, 12, '2012-11-09', '18:58:09', '20:00:00'),
(2, '201252959', 1, 13, '2012-11-23', '03:16:42', '10:15:09'),
(3, '201252953', 1, 13, '2012-11-23', '03:57:24', '04:05:09'),
(4, '201252953', 1, 13, '2012-11-23', '04:53:25', '09:08:07'),
(5, '201252959', 1, 13, '2012-11-23', '06:16:26', '06:20:25'),
(6, '201252965', 1, 13, '2012-11-23', '22:47:51', '22:50:51'),
(7, '201252960', 1, 13, '2012-11-25', '01:23:59', '02:29:09'),
(8, '201252960', 1, 13, '2012-11-25', '01:28:18', '09:08:10'),
(9, '201252960', 1, 13, '2012-11-25', '01:28:42', '02:29:30'),
(10, '201252963', 2, 13, '2012-11-25', '08:34:41', '10:15:09'),
(11, '201252959', 1, 12, '2012-11-29', '17:20:40', '02:23:28'),
(12, '201252959', 1, 12, '2012-11-29', '17:50:23', NULL),
(13, '201252959', 1, 12, '2012-11-29', '18:11:47', '02:23:31'),
(14, '201252959', 1, 12, '2012-11-29', '19:13:59', NULL),
(15, '201252959', 1, 12, '2012-11-29', '19:16:54', NULL),
(16, '201252959', 1, 12, '2012-11-29', '19:19:32', NULL),
(17, '201252959', 1, 12, '2012-11-29', '19:22:41', NULL),
(18, '201252959', 1, 12, '2012-11-29', '20:18:40', NULL),
(19, '201252959', 1, 12, '2012-11-30', '02:53:07', '10:15:09'),
(20, '201252959', 1, 12, '2012-11-30', '09:40:11', '10:15:09'),
(21, '201252959', 1, 12, '2012-11-30', '09:57:44', NULL),
(22, '201252959', 1, 12, '2012-11-30', '10:17:02', NULL),
(23, '201252959', 1, 12, '2012-11-30', '10:31:13', NULL),
(24, '201252953', 1, 14, '2012-12-04', '12:35:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrofuncionarios`
--

CREATE TABLE IF NOT EXISTS `registrofuncionarios` (
  `idRegistofuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario_Cedula` varchar(12) NOT NULL,
  `computador_Cod_comp` int(11) NOT NULL,
  `asignatura_Codigo_asg` varchar(15) NOT NULL,
  `tipo_practica_Cod_practica` int(11) NOT NULL,
  `programas_Codigo_prog` varchar(4) NOT NULL,
  `fecha_reg_fun` date NOT NULL,
  `hora_ing` time NOT NULL,
  `observaciones` text,
  `hora_sal` time DEFAULT NULL,
  PRIMARY KEY (`idRegistofuncionario`),
  KEY `fk_Registoestudiante_Tipo_practica1` (`tipo_practica_Cod_practica`),
  KEY `fk_Registofuncionario_Funcionario1_idx` (`funcionario_Cedula`),
  KEY `fk_Registofuncionario_Asignatura1_idx` (`asignatura_Codigo_asg`),
  KEY `fk_Registofuncionario_Computador1_idx` (`computador_Cod_comp`),
  KEY `fk_Registofuncionarios_Programas1_idx` (`programas_Codigo_prog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `registrofuncionarios`
--

INSERT INTO `registrofuncionarios` (`idRegistofuncionario`, `funcionario_Cedula`, `computador_Cod_comp`, `asignatura_Codigo_asg`, `tipo_practica_Cod_practica`, `programas_Codigo_prog`, `fecha_reg_fun`, `hora_ing`, `observaciones`, `hora_sal`) VALUES
(11, '12345', 14, '111048M', 1, '2702', '2012-12-03', '22:23:10', 'obserrrvacion', '00:12:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `cod_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sala` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`cod_sala`, `nom_sala`) VALUES
(1, 'Sala Zeus'),
(12, 'Sala Atenea'),
(13, 'Sala Apolo'),
(14, 'Sala Atlas'),
(15, 'Sala Urano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sancion`
--

CREATE TABLE IF NOT EXISTS `sancion` (
  `con_san` int(11) NOT NULL AUTO_INCREMENT,
  `estudiantes_Codigo` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha_san` date NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`con_san`),
  KEY `fk_Sancion_Estudiantes1_idx` (`estudiantes_Codigo`),
  KEY `fk_Sancion_estadoSancion_idx` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `sancion`
--

INSERT INTO `sancion` (`con_san`, `estudiantes_Codigo`, `descripcion`, `fecha_san`, `estado`) VALUES
(2, '201252960', 'Sancion', '2012-10-04', 1),
(12, '201252953', 'Problema con pc', '2012-11-09', 2),
(16, '201252953', 'Sancion', '2012-12-03', 1),
(17, '201252953', 'Sancion por mal comportamiento', '2012-12-03', 1),
(18, '201252998', 'Sancion', '2012-12-03', 2),
(19, '201252953', 'Sancion', '2012-12-03', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_practicas`
--

CREATE TABLE IF NOT EXISTS `tipo_practicas` (
  `cod_practica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_practica` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_practica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_practicas`
--

INSERT INTO `tipo_practicas` (`cod_practica`, `nombre_practica`) VALUES
(1, 'Académica'),
(2, 'Capacitación'),
(3, 'Extención'),
(4, 'Libre');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `becarios`
--
ALTER TABLE `becarios`
  ADD CONSTRAINT `fk_Becarios_Estudiantes1` FOREIGN KEY (`estudiantes_Codigo`) REFERENCES `estudiantes` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `computadores`
--
ALTER TABLE `computadores`
  ADD CONSTRAINT `fk_Computador_Salas1` FOREIGN KEY (`salas_Cod_sala`) REFERENCES `salas` (`cod_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `estadoestudiantes` (`cod_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_Programas1` FOREIGN KEY (`Programa`) REFERENCES `programas` (`Programa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrobecarios`
--
ALTER TABLE `registrobecarios`
  ADD CONSTRAINT `fk_Registobecarios_Becarios1` FOREIGN KEY (`becarios_Estudiantes_Codigo`) REFERENCES `becarios` (`estudiantes_Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registobecarios_Computadores1` FOREIGN KEY (`computadores_Cod_comp`) REFERENCES `computadores` (`cod_comp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrocomputador`
--
ALTER TABLE `registrocomputador`
  ADD CONSTRAINT `fk_Registro_computador_Registoestudiantes1` FOREIGN KEY (`registoestudiantes_idRegistoestudiante`) REFERENCES `registroestudiantes` (`idRegistoestudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registroestudiantes`
--
ALTER TABLE `registroestudiantes`
  ADD CONSTRAINT `fk_Registoestudiante_Computador1` FOREIGN KEY (`computador_Cod_comp`) REFERENCES `computadores` (`cod_comp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registoestudiante_Estudiante` FOREIGN KEY (`estudiante_Codigo`) REFERENCES `estudiantes` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registoestudiante_Tipo_practica1` FOREIGN KEY (`tipo_practica_Cod_practica`) REFERENCES `tipo_practicas` (`cod_practica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrofuncionarios`
--
ALTER TABLE `registrofuncionarios`
  ADD CONSTRAINT `fk_Registoestudiante_Tipo_practica10` FOREIGN KEY (`tipo_practica_Cod_practica`) REFERENCES `tipo_practicas` (`cod_practica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registofuncionarios_Programas1` FOREIGN KEY (`programas_Codigo_prog`) REFERENCES `programas` (`Programa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registofuncionario_Asignatura1` FOREIGN KEY (`asignatura_Codigo_asg`) REFERENCES `asignaturas` (`codigo_asg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registofuncionario_Computador1` FOREIGN KEY (`computador_Cod_comp`) REFERENCES `computadores` (`cod_comp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registofuncionario_Funcionario1` FOREIGN KEY (`funcionario_Cedula`) REFERENCES `funcionarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sancion`
--
ALTER TABLE `sancion`
  ADD CONSTRAINT `fk_Sancion_Estudiantes1` FOREIGN KEY (`estudiantes_Codigo`) REFERENCES `estudiantes` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sancion_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estadosancion` (`cod_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
