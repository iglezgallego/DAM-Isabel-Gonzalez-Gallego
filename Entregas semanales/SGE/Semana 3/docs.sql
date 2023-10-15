-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 12:22:07
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
-- Base de datos: `docs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `Identificador` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` text NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`Identificador`, `fecha`, `titulo`, `contenido`) VALUES
(1, '2023-10-11', 'Este es el título de la noticia ', 'Los estudiantes que se presenten a la EBAU se examinarán de Lengua Castellana y Literatura II, Lengua Extranjera II y la materia específica obligatoria de la modalidad.\r\nEn las comunidades autónomas con lengua cooficial, también lo harán de esa materia. En cumplimiento de la Ley educativa, los alumnos y alumnas deberán elegir si examinarse de Historia de España o Historia de la Filosofía.'),
(2, '2023-10-12', 'Este es el título de la segunda noticia', 'Este 2023, la Tribunal Real -donde se sitúan las autoridades- no estará en la Plaza de Lima (junto al Santiago Bernabéu) sino que se trasladará a la Plaza de Neptuno, cerca del Congreso de los Diputados. El recorrido del desfile del 12 de octubre empezará en el Paseo del Prado a la altura del Jardín Botánico.\r\n\r\nPosteriormente, irá subiendo el Paseo del Prado para pasar por la Plaza de Neptuno, donde estará la Tribuna Real, la Plaza de Cibeles y recorrer el Paseo de Recoletos hasta la Plaza de Colón, donde terminará el desfile.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms`
--

CREATE TABLE `cms` (
  `Identificador` int(15) NOT NULL,
  `elemento` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `idioma` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cms`
--

INSERT INTO `cms` (`Identificador`, `elemento`, `contenido`, `idioma`) VALUES
(1, 'titulo', 'Docs', 'es'),
(2, 'subtitulo', 'Aquí puedes crear tus documentos en la nube', 'es'),
(3, 'copyright', '(c) Isabel González-Gallego Rivera', 'es'),
(4, 'bannertitulo', 'Este es el título del banner', 'es'),
(5, 'bannertexto', 'Este es el texto que encontramos dentro del banner', 'es'),
(6, 'iniciocaja1', 'Este es un bloque de texto que vamos a encontrar en la primera caja del inicio.', 'es'),
(7, 'iniciocaja2', 'Este es un bloque de texto que vamos a encontrar en la segunda caja del inicio.', 'es'),
(8, 'iniciocaja3', 'Este es un bloque de texto que vamos a encontrar en tercera caja del inicio.', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compartido`
--

CREATE TABLE `compartido` (
  `Identificador` int(15) NOT NULL,
  `FK_documentos_titulo` int(15) NOT NULL,
  `FK_usuarios_nombre` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `Identificador` int(15) NOT NULL,
  `FK_usuarios_nombre` int(15) NOT NULL,
  `FK_tipodocumento_documento` int(15) NOT NULL,
  `fechadecreacion` date NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `compartido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `Identificador` int(4) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(15) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `compartido`
--
ALTER TABLE `compartido`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `Identificador` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cms`
--
ALTER TABLE `cms`
  MODIFY `Identificador` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compartido`
--
ALTER TABLE `compartido`
  MODIFY `Identificador` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `Identificador` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `Identificador` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
