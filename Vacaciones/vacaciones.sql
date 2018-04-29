-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2018 a las 02:30:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vacaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `turno` varchar(25) NOT NULL,
  `nomina` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `jefe` varchar(55) NOT NULL,
  `fechadeantiguedad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellido`, `puesto`, `turno`, `nomina`, `correo`, `contrasena`, `jefe`, `fechadeantiguedad`) VALUES
(1, 'ramon', 'maraboto', 'admin', 'siempre', 'A00512214', 'ramonmaraboto@teleton.mx', 'maraboto', 'alguien', '2018-01-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `imagen` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`imagen`, `descripcion`) VALUES
('carls-jr-cupones-agranda-tu-combo-gratis.jpg', 'CupÃ³n para Carls Jr.'),
('cupones-burger-king-enero-2016.png', 'Promo de burger king');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(3) NOT NULL,
  `nombre` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `nomina` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `jefe` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `horasdisponibles` int(2) NOT NULL,
  `fechadeantiguedad` date NOT NULL,
  `diasdisponibles` int(3) NOT NULL,
  `vacacionesdisponibles` int(3) NOT NULL,
  `titulacion` varchar(20) NOT NULL,
  `matrimonio` varchar(20) NOT NULL,
  `practicante` varchar(5) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `puesto`, `area`, `turno`, `nomina`, `correo`, `contrasena`, `jefe`, `horasdisponibles`, `fechadeantiguedad`, `diasdisponibles`, `vacacionesdisponibles`, `titulacion`, `matrimonio`, `practicante`, `imagen`) VALUES
(2, 'Juan', 'Perez', 'Guardia', '', 'Matutino', 'A00511478', 'juanperez@teleton.mx', 'perez', 'JosÃ© Rodriguez', 6, '2018-02-02', 7, 10, 'usado', 'disponible', 'no', ''),
(3, 'otro', 'sipi', 'ese', '', 'Matutino', 'A00510492', '', '', 'El SeÃ±or Jefe', 10, '0000-00-00', 0, 0, '', '', '', ''),
(5, 'Diego', 'Hernandezs', 'Gerentes', '', '', '', '', '', '', 0, '0000-00-00', 0, 0, '', '', '', ''),
(8, 'Fernando', 'Gonzalez', 'Gerente', '', 'Nocturno', 'A00513555', '', '', 'jefe', 0, '0000-00-00', 0, 0, '', '', '', ''),
(11, 'AdriÃ¡n', 'Rosales', 'NiÃ±o', '', 'Matutino', 'A00512067', '', '', 'RamÃ³n Maraboto', 0, '0000-00-00', 0, 0, '', '', '', ''),
(12, 'Antonio Belsain', 'Villafuerte', 'Tecnico Soporte', '', 'Matutino', '10286', '', '', 'Luis Alberto Arteaga Rocha', 0, '0000-00-00', 0, 0, 'disponible', 'disponible', '', ''),
(13, 'Empleado 1', 'Del empleado', 'TÃ©cnico', '', 'Nocturno', '48920', '', '', 'RaulHernandez', 0, '0000-00-00', 0, 0, 'disponible', 'disponible', '', ''),
(18, 'ejemplo', 'ejemplo', 'ejemplo', '', 'Nocturno', '78963', '', '', 'jefazorodriguez', 0, '2015-05-13', 0, 0, 'disponible', 'disponible', '', ''),
(22, 'eee', 'eee', 'eee', '', 'Matutino', '12356', '', '', 'jefazorodriguez', 0, '2018-02-08', 0, 0, 'usado', 'usado', '', ''),
(23, 'prueba2', 'una prubea', 'un puesto', '', 'Matutino', '14852', '', '', 'RaulHernandez', 0, '2018-03-01', 0, 0, 'disponible', 'disponible', '', '14852'),
(24, 'empleado 2', 'dasdad', 'uno', '', 'Matutino', '78945', '', '', 'jefazorodriguez', 0, '2018-03-04', 0, 0, 'usado', 'usado', '', '78945.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechasprohibidas`
--

CREATE TABLE `fechasprohibidas` (
  `fechas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fechasprohibidas`
--

INSERT INTO `fechasprohibidas` (`fechas`) VALUES
('2018-04-24'),
('2018-04-30'),
('2018-05-23'),
('2018-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id`, `nombre`, `apellido`, `area`) VALUES
(1, 'jefazo', 'rodriguez', 'finanzas'),
(2, 'Raul', 'Hernandez', 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(4) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `noticia` varchar(750) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `empleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `noticia`, `fecha`, `tipo`, `empleado`) VALUES
(1, 'Fiesta!', 'MaÃ±ana se va a tener un festejo a las 12:00 Pm, para que todos se presenten en la sala principal, gracias.', '2018-03-05', 'general', ''),
(2, 'Adeudo', 'Hola, se te manda esta noticia porque tienes un adeudo de 600 pesos que tienes que pagar.', '2018-03-05', 'personal', 'juan'),
(3, 'La gran noticia', 'Esta es una noticia importante... eso es todo, gracias.', '2018-03-05', 'general', ''),
(5, 'La prueba', 'Probando', '2018-03-21', 'Personal', 'otro sipi'),
(6, 'Importante', 'Eres una buena persona :)', '2018-03-28', 'Personal', 'Juan Perez'),
(7, 'No tan importante', 'No faltes a trabajar porfavor.', '2018-03-28', 'Personal', 'Juan Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(3) NOT NULL,
  `nombredesolicitante` varchar(75) NOT NULL,
  `fechadeantiguedad` date NOT NULL,
  `nodediassueldo` int(2) NOT NULL,
  `nodediassueldo2` int(2) NOT NULL,
  `nodediasnosueldo` int(2) NOT NULL,
  `nodediasnosueldo2` int(2) NOT NULL,
  `nodediasvacaciones` int(2) NOT NULL,
  `nodediasvacaciones2` int(2) NOT NULL,
  `delsueldo` date NOT NULL,
  `delsueldo2` date NOT NULL,
  `delnosueldo` date NOT NULL,
  `delnosueldo2` date NOT NULL,
  `delvacaciones` date NOT NULL,
  `delvacaciones2` date NOT NULL,
  `alsueldo` date NOT NULL,
  `alsueldo2` date NOT NULL,
  `alnosueldo` date NOT NULL,
  `alnosueldo2` date NOT NULL,
  `alvacaciones` date NOT NULL,
  `alvacaciones2` date NOT NULL,
  `razondepermiso` varchar(30) NOT NULL,
  `motivosinsueldo` varchar(100) NOT NULL,
  `motivohoras` varchar(100) NOT NULL,
  `nodehoras` int(2) NOT NULL,
  `fechahoras` date NOT NULL,
  `horariodehoras` time(6) NOT NULL,
  `horarioahoras` time(6) NOT NULL,
  `estatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombredesolicitante`, `fechadeantiguedad`, `nodediassueldo`, `nodediassueldo2`, `nodediasnosueldo`, `nodediasnosueldo2`, `nodediasvacaciones`, `nodediasvacaciones2`, `delsueldo`, `delsueldo2`, `delnosueldo`, `delnosueldo2`, `delvacaciones`, `delvacaciones2`, `alsueldo`, `alsueldo2`, `alnosueldo`, `alnosueldo2`, `alvacaciones`, `alvacaciones2`, `razondepermiso`, `motivosinsueldo`, `motivohoras`, `nodehoras`, `fechahoras`, `horariodehoras`, `horarioahoras`, `estatus`) VALUES
(3, '', '0000-00-00', 8, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'nacimiento', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(4, 'juan', '0000-00-00', 22, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(5, 'juan', '0000-00-00', 5, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'comision', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(6, 'juan', '0000-00-00', 0, 0, 4, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Me enfermÃ© muy feo.', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(7, 'juan', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'Me despertÃ© tarde, lo siento.', 0, '2018-02-25', '08:00:00.000000', '10:00:00.000000', 'pendiente'),
(8, 'juan', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'yolo', 0, '2018-11-11', '14:00:00.000000', '15:00:00.000000', 'pendiente'),
(9, 'juan', '2018-02-01', 1, 0, 0, 0, 0, 0, '2018-02-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-02-24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', ''),
(10, 'juan', '2018-02-02', 1, 0, 0, 0, 0, 0, '2018-05-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-05-17', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(11, 'juan', '2018-02-02', 1, 0, 0, 0, 0, 0, '2018-03-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-03-03', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(12, 'juan', '2018-02-02', 2, 0, 0, 0, 0, 0, '2018-02-22', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-02-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'rechazado'),
(13, 'juanperez@teleton.mx', '0000-00-00', 2, 0, 0, 0, 0, 0, '2018-04-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-04-18', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'cursos', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(14, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 3, 0, 0, 0, '0000-00-00', '0000-00-00', '2018-04-22', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-04-25', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Motivo X', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(15, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 3, 0, 0, 0, '0000-00-00', '0000-00-00', '2018-04-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-04-19', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Motivo Y', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(16, 'juanperez@teleton.mx', '2018-02-02', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'Prueba 1', 0, '2018-04-10', '09:00:00.000000', '13:00:00.000000', 'aceptado'),
(17, 'juanperez@teleton.mx', '2018-02-02', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'sdgj', 0, '2018-04-12', '10:00:00.000000', '13:00:00.000000', 'pendiente'),
(18, 'juanperez@teleton.mx', '0000-00-00', 10, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(19, 'juanperez@teleton.mx', '0000-00-00', 10, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(20, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(21, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 3, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(22, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '14:00:00.000000', '19:00:00.000000', 'pendiente'),
(23, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 1, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(24, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(25, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(26, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 1, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(27, 'juanperez@teleton.mx', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 0, '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retardos`
--

CREATE TABLE `retardos` (
  `id` int(4) NOT NULL,
  `empleado` varchar(50) NOT NULL,
  `nomina` int(10) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`imagen`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fechasprohibidas`
--
ALTER TABLE `fechasprohibidas`
  ADD PRIMARY KEY (`fechas`);

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `jefes`
--
ALTER TABLE `jefes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
