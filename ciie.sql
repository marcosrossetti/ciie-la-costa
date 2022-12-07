-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 17:42:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
  `estado` int(1) NOT NULL,
  `eliminado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `estado`, `eliminado`) VALUES
(8, 'ROGELITO', 1, 0);

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

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `telefono`, `mensaje`) VALUES
(14, 'ROGELIO', 'pepe@gmail.com', '3232323', 'hola como estan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `horario` time NOT NULL,
  `dia` text NOT NULL,
  `nombre` text NOT NULL,
  `id_f` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `area` varchar(70) NOT NULL,
  `formador` text NOT NULL,
  `estado` int(1) NOT NULL,
  `eliminado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `link`, `horario`, `dia`, `nombre`, `id_f`, `id_a`, `area`, `formador`, `estado`, `eliminado`) VALUES
(42, 'https://www.youtube.com/watch?v=I3kqiV_tWCY', '14:30:00', 'LUNES', 'CHARLY14', 0, 0, 'ROGELITO', 'TUCU MAN (TUXU HOMBRE)', 0, 0),
(43, 'https://www.youtube.com/watch?v=Kqivqp-mMeQ', '13:20:00', 'LUNES', 'CURSO DE ARQUITECTURA', 0, 0, 'ROGELITO', 'TUCU MAN (TUXU HOMBRE)', 0, 0);

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
  `estado` int(11) NOT NULL,
  `eliminado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formador`
--

INSERT INTO `formador` (`id`, `mail`, `tel`, `nombre`, `dni`, `estado`, `eliminado`) VALUES
(19, 'pepe@gmail.com', '02257300849', 'TUCU MAN (TUXU HOMBRE)', '45422796', 1, 0);

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
  `eliminado` int(1) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_o`, `fecha`, `titulo`, `nivel`, `estado`, `eliminado`, `descripcion`) VALUES
(30, '2023-12-15', 'Termotanque', 'Primario', 1, 0, 'Eso no ma'),
(31, '2002-12-13', 'Prueba 2', 'Inicial', 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(32, '2022-11-06', 'PRUEBA123', 'SECUNDARIO', 0, 0, 'pruebaAaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_ofcu`
--

CREATE TABLE `rel_ofcu` (
  `id` int(11) NOT NULL,
  `id_o` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rel_ofcu`
--

INSERT INTO `rel_ofcu` (`id`, `id_o`, `id_c`, `estado`) VALUES
(1, 30, 42, 1),
(2, 30, 43, 1),
(10, 31, 43, 0),
(11, 30, 42, 1),
(12, 31, 42, 1),
(13, 31, 43, 1),
(14, 32, 42, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriales`
--

CREATE TABLE `tutoriales` (
  `id` int(11) NOT NULL,
  `url` varchar(150) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `des` varchar(150) NOT NULL,
  `estado` int(1) NOT NULL,
  `eliminado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutoriales`
--

INSERT INTO `tutoriales` (`id`, `url`, `titulo`, `des`, `estado`, `eliminado`) VALUES
(15, 'https://github.com', 'LOL', 'sape', 0, 0);

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
(1, 'lauti1304@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `visitas` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `visitas`) VALUES
(1, 64);

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
-- Indices de la tabla `rel_ofcu`
--
ALTER TABLE `rel_ofcu`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `formador`
--
ALTER TABLE `formador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `rel_ofcu`
--
ALTER TABLE `rel_ofcu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tutoriales`
--
ALTER TABLE `tutoriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
