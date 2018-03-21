-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2018 a las 03:57:54
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
  `jefe` varchar(55) NOT NULL,
  `fechadeantiguedad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellido`, `puesto`, `turno`, `nomina`, `correo`, `jefe`, `fechadeantiguedad`) VALUES
(1, 'ramon', 'maraboto', 'admin', 'siempre', 'A00512214', '', 'alguien', '2018-01-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(3) NOT NULL,
  `nombre` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `nomina` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `jefe` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `horasdisponibles` int(2) NOT NULL,
  `fechadeantiguedad` date NOT NULL,
  `diasdisponibles` int(3) NOT NULL,
  `vacacionesdisponibles` int(3) NOT NULL,
  `titulacion` varchar(20) NOT NULL,
  `matrimonio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `puesto`, `turno`, `nomina`, `correo`, `jefe`, `horasdisponibles`, `fechadeantiguedad`, `diasdisponibles`, `vacacionesdisponibles`, `titulacion`, `matrimonio`) VALUES
(1, 'JosÃ© Luis', 'OrdoÃ±ez', 'Almacenista', 'Matutino', '78937', '', 'Gilberto Casanova', 0, '0000-00-00', 0, 0, '', ''),
(2, 'Juan', 'Perez', 'Guardia', 'Matutino', 'A00511478', '', 'JosÃ© Rodriguez', 10, '2018-02-02', 10, 10, 'usado', 'disponible'),
(3, 'otro', 'sipi', 'ese', 'Matutino', 'A00510492', '', 'El SeÃ±or Jefe', 10, '0000-00-00', 0, 0, '', ''),
(5, 'Diego', 'Hernandezs', 'Gerentes', '', '', '', '', 0, '0000-00-00', 0, 0, '', ''),
(8, 'Fernando', 'Gonzalez', 'Gerente', 'Nocturno', 'A00513555', '', 'jefe', 0, '0000-00-00', 0, 0, '', ''),
(11, 'AdriÃ¡n', 'Rosales', 'NiÃ±o', 'Matutino', 'A00512067', '', 'RamÃ³n Maraboto', 0, '0000-00-00', 0, 0, '', ''),
(12, 'Antonio Belsain', 'Villafuerte', 'Tecnico Soporte', 'Matutino', '10286', '', 'Luis Alberto Arteaga Rocha', 0, '0000-00-00', 0, 0, 'disponible', 'disponible'),
(13, 'Empleado 1', 'Del empleado', 'TÃ©cnico', 'Nocturno', '48920', '', 'RaulHernandez', 0, '0000-00-00', 0, 0, 'disponible', 'disponible'),
(18, 'ejemplo', 'ejemplo', 'ejemplo', 'Nocturno', '78963', '', 'jefazorodriguez', 0, '2015-05-13', 0, 0, 'disponible', 'disponible');

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
(1, 'Fiesta!', 'Mañana se va a tener un festejo a las 12:00 Pm, para que todos se presenten en la sala principal, gracias.', '2018-03-05', 'general', ''),
(2, 'Adeudo', 'Hola, se te manda esta noticia porque tienes un adeudo de 400 pesos que tienes que pagar.', '2018-03-05', 'personal', 'juan'),
(3, 'La gran noticia', 'Esta es una noticia importante... eso es todo, gracias.', '2018-03-05', 'general', ''),
(4, 'Noticia nueva', 'Esta noticia acaba de ser aÃ±adida ahora mismo.', '2018-03-06', 'General', '');

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
  `fechahoras` date NOT NULL,
  `horariodehoras` time(6) NOT NULL,
  `horarioahoras` time(6) NOT NULL,
  `estatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombredesolicitante`, `fechadeantiguedad`, `nodediassueldo`, `nodediassueldo2`, `nodediasnosueldo`, `nodediasnosueldo2`, `nodediasvacaciones`, `nodediasvacaciones2`, `delsueldo`, `delsueldo2`, `delnosueldo`, `delnosueldo2`, `delvacaciones`, `delvacaciones2`, `alsueldo`, `alsueldo2`, `alnosueldo`, `alnosueldo2`, `alvacaciones`, `alvacaciones2`, `razondepermiso`, `motivosinsueldo`, `motivohoras`, `fechahoras`, `horariodehoras`, `horarioahoras`, `estatus`) VALUES
(3, '', '0000-00-00', 8, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'nacimiento', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(4, 'juan', '0000-00-00', 22, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(5, 'juan', '0000-00-00', 5, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'comision', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(6, 'juan', '0000-00-00', 0, 0, 4, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Me enfermÃ© muy feo.', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'pendiente'),
(7, 'juan', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'Me despertÃ© tarde, lo siento.', '2018-02-25', '08:00:00.000000', '10:00:00.000000', 'pendiente'),
(8, 'juan', '0000-00-00', 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'yolo', '2018-11-11', '14:00:00.000000', '15:00:00.000000', 'pendiente'),
(9, 'juan', '2018-02-01', 1, 0, 0, 0, 0, 0, '2018-02-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-02-24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', ''),
(10, 'juan', '2018-02-02', 1, 0, 0, 0, 0, 0, '2018-05-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-05-17', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(11, 'juan', '2018-02-02', 1, 0, 0, 0, 0, 0, '2018-03-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-03-03', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'aceptado'),
(12, 'juan', '2018-02-02', 2, 0, 0, 0, 0, 0, '2018-02-22', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2018-02-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'titulacion', '', '', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 'rechazado');

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
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `jefes`
--
ALTER TABLE `jefes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
