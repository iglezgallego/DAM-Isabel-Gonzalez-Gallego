-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 18:28:48
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Identificador` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Identificador`, `categoria`, `titulo`, `fecha`, `descripcion`) VALUES
(1, 'Noticias', 'Noticias nacionales', '2023-02-16', 'Aquí podrás leer las noticas nacionales destacadas'),
(2, 'Tendencias', 'Tendencias mundiales', '2023-02-16', 'Aquí podrás ver la tendencias mundiales'),
(3, 'Política', 'Política internacional', '2023-02-16', 'Aquí podrás informarte sobre la política internacional reciente'),
(5, 'Arte', 'Arte nacional', '2023-02-16', 'Aquí podrás ver las novedades y tendencias en arte nacional'),
(6, 'Deportes', 'Futbol España', '2023-02-16', 'Aquí podrás ver las últimas noticias sobre el futbol español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `Identificador` int(255) NOT NULL,
  `blognumero` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `contenido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`Identificador`, `blognumero`, `fecha`, `autor`, `titulo`, `subtitulo`, `texto`, `contenido`) VALUES
(1, 'Blog  Nº1', '16 de febrero de 2023', 'Isabel', 'Título del primer blog', 'Subtítulo del primer blog', 'Texto del primer blog', 'Contenido del primer blog'),
(2, 'Blog Nº2', '16 de febrero de 2023', 'Juan', 'Título del segundo blog', 'Subtítulo del segundo blog', 'Texto del segundo blog', 'Contenido del segundo blog'),
(3, 'Blog Nº 3', '16 de febrero de 2023', 'Rosa', 'Título del tercer blog', 'Subtítulo del tercer blog', 'Texto del tercer blog', 'Contenido del tercer blog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `Identificador` int(255) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`Identificador`, `menu`) VALUES
(1, 'Inicio'),
(2, 'Noticias'),
(3, 'Tendencias'),
(4, 'Deportes'),
(5, 'Arte'),
(6, 'Política'),
(7, 'Contacto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
