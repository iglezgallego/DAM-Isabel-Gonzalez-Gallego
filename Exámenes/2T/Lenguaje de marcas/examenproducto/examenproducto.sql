-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 18:29:04
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
-- Base de datos: `examenproducto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera`
--

CREATE TABLE `cabecera` (
  `Identificador` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `boton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabecera`
--

INSERT INTO `cabecera` (`Identificador`, `titulo`, `descripcion`, `boton`) VALUES
(1, 'TIENDA DE ELECTRÓNICA', 'Informática, electrónica, tecnología al mejor precio, calidad y servicio.', 'Saber más');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Identificador` int(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Identificador`, `producto`, `descripcion`) VALUES
(1, 'Ordenadores', 'Portátiles y sobremesa'),
(2, 'Telefonía', 'Smartphones, iPhone y teléfonos fijos'),
(3, 'Audio y fotografía', 'Cámaras de fotos, TV, videocámaras y auriculares'),
(4, 'Periféricos', 'Ratones, teclados y monitores');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera`
--
ALTER TABLE `cabecera`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabecera`
--
ALTER TABLE `cabecera`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
