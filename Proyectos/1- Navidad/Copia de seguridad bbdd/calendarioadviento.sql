-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2023 a las 21:32:07
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
-- Base de datos: `calendarioadviento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `Identificador` int(255) NOT NULL,
  `idusuario` int(255) NOT NULL,
  `idtema` int(255) NOT NULL,
  `fechainicio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ultimaconexion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`Identificador`, `idusuario`, `idtema`, `fechainicio`, `ultimaconexion`) VALUES
(2, 5, 1, '2023-01-03', '2023-01-03'),
(3, 3, 2, '2023-01-03', '2023-01-03'),
(4, 1, 1, '2023-01-03', '2023-01-03'),
(6, 2, 4, '2023-01-03', '2023-01-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retos`
--

CREATE TABLE `retos` (
  `Identificador` int(255) NOT NULL,
  `idhijo` int(255) NOT NULL,
  `reto` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `retos`
--

INSERT INTO `retos` (`Identificador`, `idhijo`, `reto`, `logo`) VALUES
(1, 1, 'Apunta en una libreta o nota del móvil todas las cosas buenas que te sucedan a lo largo del día y léelo antes de ir a dormir.', 'capullo.png'),
(2, 1, 'Busca en internet y lee tres noticias positivas que hayan sucedido en los últimos días.', 'capullo.png'),
(4, 1, 'Queda o llama por teléfono a la persona más optimista que conozcas y mantén una conversación sobre lo que tú quieras.', 'capullo.png'),
(5, 1, 'Cuando te levantes de la cama repite enfrente del espejo “merezco ser feliz” cinco veces.', 'capullo.png'),
(6, 1, 'Proponte una meta sencilla, como hacer deporte o realizar alguna tarea pendiente, y cúmplela en el día de hoy.', 'oruga.png'),
(7, 1, 'Piensa en alguna actividad que te guste y que hace tiempo que no haces, busca un hueco a lo largo del día para realizarla.', 'oruga.png'),
(8, 1, 'Intenta no hablar negativamente, ni criticar a otras personas a lo largo del día.', 'oruga.png'),
(9, 1, 'Haz una lista de las cosas que te gustan de ti mismo y léela antes de ir a dormir.', 'oruga.png'),
(10, 1, 'Inventa y escribe un relato corto con un comienzo catastrófico y que tenga un final extraordinario.', 'mariposa.png'),
(11, 1, 'Pon tu canción favorita 3 veces en el día y báilala solo/a o acompañado/a.', 'mariposa.png'),
(12, 1, 'Recuerda alguna mala experiencia pasada. Piensa de qué forma pudo afectar en tu vida positivamente y apúntalo en una libreta o nota del móvil.', 'mariposa.png'),
(13, 1, 'Haz una lista con las cosas buenas que te gustan de tu pareja, un amigo/a o familiar y díselo a lo largo del día.', 'mariposa.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `Identificador` int(255) NOT NULL,
  `tema` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idpadre` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`Identificador`, `tema`, `descripcion`, `foto`, `idpadre`) VALUES
(1, 'Optimismo', 'El pensamiento positivo es útil para el manejo del estrés e incluso puede mejorar tu salud. Estos retos te ayudarán a superar el diálogo interno negativo. Los investigadores aún exploran los efectos del pensamiento positivo y del optimismo en la salud y algunos de ellos pueden ser: aumento de la esperanza de vida, tasas más bajas de depresión, mayor resistencia a las enfermedades, mejor salud cardiovascular, etc.', 'optimismo.jpg', 1),
(2, 'Autocuidado', 'El autocuidado se puede definir como el cuidado propio que se tiene a sí mismo, en el que se busca bienestar mental, emocional, social y físico. Son prácticas diarias y cotidianas que realiza una persona para cuidar de sus emociones, su mente y su salud física. Se realizan con el propósito de cultivar, fortalecer o recuperar el cuidado propio que está relacionado con la autoestima y el amor propio.', 'autocuidado.jpg', 2),
(3, 'Relajación', 'La ansiedad y el estrés son reacciones de alerta hacia algo que puede ocurrir y cuya finalidad es que estemos preparados ante esa amenaza. Esta respuesta puede ser normal o desproporcionada, causando una angustia y miedo constantes. Si sentirnos nerviosos, preocupados o ansiosos se ha convertido en nuestra rutina, estos retos de relajación nos ayudarán a reducir la ansiedad.', 'relajacion.jpg', 3),
(4, 'Agradecimiento', 'Ser agradecido es esencial para apreciar y disfrutar plenamente de la vida. Estos retos te ayudarán a agradecer lo que somos, lo que hemos conseguido, lo que tenemos, las personas que nos rodea, etc. El agradecimiento nos facilita vivir en armonía con nuestro entorno y con un alto grado de bienestar, y nos ayudará a ser conscientes de las cosas buenas en nuestras vidas que parecen obvias y habituales.', 'agradecimiento.jpg', 4),
(5, 'Detox digital', 'Entendemos como desintoxicación digital cuando nos tomamos un descanso de los aparatos electrónicos, principalmente el teléfono, el ordenador y la televisión. Hay muchas razones por las que podemos necesitar una desintoxicación digital: sentirse abrumado por la cantidad de información que nos llega, o tal vez estemos luchando contra la adicción a la pantalla. Estos retos nos ayudarán a tomarnos un descanso de los dispositivos, lo cual tiene muchos beneficios: reduce la fatiga y el estrés, ayuda a mejorar el sueño, estimulas las relaciones personales,  mejora la creatividad, etc.', 'digital.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(255) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Identificador`, `usuario`, `contrasena`, `email`) VALUES
(1, 'isabel', 'isacontra', 'iglez@mail.com'),
(2, 'alberto', 'alberto', 'alberto@alberto.com'),
(3, 'joaquin', 'joaquin', 'joaquin@mail.com'),
(5, 'rosa', 'rosa', 'rosa@mail.com'),
(6, 'Fernando', 'dernando', 'fernando@mail.com'),
(7, 'maria', 'maria', 'maria@mail.com'),
(8, 'javier', 'javier', 'javier@mail.com'),
(9, 'ruben', 'ruben', 'ruben@ruben.com'),
(10, 'rodolfo', 'rodolfo', 'rodol@rodol.com'),
(11, 'rita', 'rita', 'rita@rita.com'),
(12, 'manolo', 'manolo', 'manolo@mail.com'),
(13, 'roberto', 'roberto', 'rober@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `retos`
--
ALTER TABLE `retos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
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
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `retos`
--
ALTER TABLE `retos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
