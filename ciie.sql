-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2022 a las 04:36:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `horario` time(6) NOT NULL,
  `dia` text NOT NULL,
  `nombre` text NOT NULL,
  `id_f` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `area` varchar(70) NOT NULL,
  `formador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `link`, `horario`, `dia`, `nombre`, `id_f`, `id_a`, `area`, `formador`) VALUES
(36, 'https://www.youtube.com/watch?v=IP29VlrTvB4&ab_channel=77riestra77', '13:12:00.000000', 'LUNES', 'RODRIGO', 0, 0, 'INFORMATICA', 'LAUTARO'),
(37, 'https://www.youtube.com/watch?v=IP29VlrTvB4&ab_channel=77riestra77', '14:12:00.000000', 'MIERCOLES', 'RODRIGO', 0, 0, 'INFORMATICA', 'LAUTARO'),
(38, 'https://www.youtube.com/watch?v=IP29VlrTvB4&ab_channel=77riestra77', '13:16:00.000000', 'MIERCOLES', 'RODRIGO', 0, 0, 'INFORMATICA', 'LAUTARO'),
(39, 'https://www.youtube.com/watch?v=TtKPhnJDIL0&t=789s', '13:36:00.000000', 'MARTES', 'RODRIGO', 0, 0, 'INFORMATICA', 'LAUTARO'),
(40, 'https://mail.google.com/mail/u/0/#inbox', '21:02:00.000000', 'MARTES', 'RODRIGO', 0, 0, 'DSADSA', 'LAUTARO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formador`
--

CREATE TABLE `formador` (
  `id` int(11) NOT NULL,
  `mail` varchar(90) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `nombre` text NOT NULL,
  `dni` varchar(12) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formador`
--

INSERT INTO `formador` (`id`, `mail`, `tel`, `nombre`, `dni`, `estado`) VALUES
(10, 'rodrigosebastianok@gmail.com', '2211321254', 'RODRIGO', '38844259', 0),
(11, 'rodrigosebastianok@gmail.com', '2211321254', 'LAUTARO', '38844259', 0),
(12, 'rodrigosebastianok@gmail.com', '2211321254', 'RODRIGO', '38844259', 0),
(13, 'rodrigosebastianok@gmail.com', '2211321254', 'RODRIGO', '38844259', 0),
(14, 'rodrigosebastianok@gmail.com', '2211321254', 'DSADASD', '38844259', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_o` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_o`, `fecha`, `titulo`, `nivel`, `estado`, `descripcion`) VALUES
(20, '2022-09-10', 'PROGRAMACION ORIENTADA A OBJETOS PHP', 'SECUNDARIO', 0, 'aprende lo mas nuevo de la programacion orientada a objetos!'),
(26, '2022-09-16', 'CURSO DE EDUCACION MATERNAL', 'SECUNDARIO', 0, 'Lorep ipsum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_ofcu`
--

CREATE TABLE `rel_ofcu` (
  `id_o` int(11) NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriales`
--

CREATE TABLE `tutoriales` (
  `id` int(11) NOT NULL,
  `url` varchar(150) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `des` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutoriales`
--

INSERT INTO `tutoriales` (`id`, `url`, `titulo`, `des`) VALUES
(12, 'https://www.youtube.com/watch?v=g5ylN-d9v5c&ab_channel=LavinyTuttini', 'COMO INSERTAR VIDEOS DE YOUTUBE (API)', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'rodrigo12@gmail.com', '12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `formador`
--
ALTER TABLE `formador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_o`);

--
-- Indices de la tabla `tutoriales`
--
ALTER TABLE `tutoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `formador`
--
ALTER TABLE `formador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tutoriales`
--
ALTER TABLE `tutoriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
