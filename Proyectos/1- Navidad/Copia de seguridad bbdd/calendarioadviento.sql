-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2023 a las 13:53:25
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
  `fechainicio` varchar(255) NOT NULL,
  `ultimaconexion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`Identificador`, `idusuario`, `idtema`, `fechainicio`, `ultimaconexion`) VALUES
(6, 2, 4, '2023-01-03', '2023-01-03'),
(11, 3, 1, '2023-02-21', '2023-02-21'),
(12, 11, 5, '2023-02-21', '2023-02-21'),
(13, 1, 2, '2023-02-21', '2023-02-21'),
(20, 5, 6, '2023-02-21', '2023-02-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retos`
--

CREATE TABLE `retos` (
  `Identificador` int(255) NOT NULL,
  `idhijo` int(255) NOT NULL,
  `reto` text NOT NULL,
  `logo` varchar(255) NOT NULL
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
(13, 1, 'Haz una lista con las cosas buenas que te gustan de tu pareja, un amigo/a o familiar y díselo a lo largo del día.', 'mariposa.png'),
(14, 2, 'Sal a caminar durante 20-30 minutos.', 'capullo.png'),
(15, 2, 'Busca en internet una receta de comida saludable que nunca antes habías cocinado y prepárala para comer/cenar.', 'capullo.png'),
(16, 2, 'Bebe al menos 2 litros de agua durante el día.', 'capullo.png'),
(17, 2, 'Levántate temprano y observa el amanecer mientras desayunas. ', 'capullo.png'),
(18, 2, 'Duerme una siesta reparadora', 'oruga.png'),
(19, 2, 'Date un baño relajante con sales de baño/bolas efervescentes, música lenta y velas perfumadas', 'oruga.png'),
(20, 2, 'Establece horarios de desconexión de las redes sociales y del teléfono móvil en general. Utiliza ese tiempo para realizar otras tareas, como organizar tareas pendientes, cocinar, etc.', 'oruga.png'),
(21, 2, 'Dedica parte tu día a realizar alguna actividad deportiva, dentro o fuera de casa.', 'oruga.png'),
(22, 2, 'Organiza tu habitación y deshazte de 5 cosas que ya no uses.', 'mariposa.png'),
(23, 2, 'Ve a un centro comercial o visita tus páginas de compras favoritas y hazte un auto-regalo. ', 'mariposa.png'),
(24, 2, 'Realiza una clase de yoga/pilates/meditación guiada, puedes buscar vídeos en internet y hacerlo en casa. ', 'mariposa.png'),
(25, 2, 'Empieza a leer un libro que te hayan recomendado o que te hubiera gustado empezar hace tiempo. ', 'mariposa.png'),
(26, 3, 'No tomes bebidas azucaradas o gaseosas ni bebidas con cafeína o alcohol durante todo el día', 'capullo.png'),
(27, 3, 'Acuéstate una hora más temprano que de costumbre y asegúrate de dormir al menos 8 horas esta noche', 'capullo.png'),
(28, 3, 'Saca un hueco durante el día de hoy para practicar una actividad que te guste y que te haga desconectar del día a día.', 'capullo.png'),
(29, 3, 'Apunta en una libreta o nota del móvil todas las preocupaciones que te surjan a lo largo del día.', 'capullo.png'),
(30, 3, 'Lee la libreta/nota donde escribiste tus preocupaciones y reflexiona en busca de solucionar o amedrantar al menos una de ellas', 'oruga.png'),
(31, 3, 'Haz ejercicios de respiración profunda: inhalando y exhalando profundamente, durante 2 minutos 3 veces durante el día. ', 'oruga.png'),
(32, 3, 'Realiza una clase de yoga/pilates/meditación guiada, puedes buscar vídeos en internet y hacerlo en casa. ', 'oruga.png'),
(33, 3, 'Reserva un hueco durante el día para ir a un espacio natural y conectar con la naturaleza, llévate un libro/revista y léelo allí durante un rato, intenta no usar el teléfono móvil durante ese tiempo.', 'oruga.png'),
(34, 3, 'Empieza a escribir un diario. Escribe en él todas las cosas que te hayan hecho sentir nervioso y las que te hayan apaciguado, sincerándote contigo mismo', 'mariposa.png'),
(35, 3, 'Comparte tiempo con algún amigo o familiar al que te gustaría ver a más a menudo durante el día de hoy.', 'mariposa.png'),
(36, 3, 'Escucha tus canciones favoritas mientras realizas las actividades cotidianas como cocinar, limpiar, ducharte, etc.', 'mariposa.png'),
(37, 3, 'Date un baño relajante con sales de baño/bolas efervescentes, música lenta y velas perfumadas', 'mariposa.png'),
(38, 4, 'Haz un cumplido a un amigo con el que no tengas mucha confianza', 'capullo.png'),
(39, 4, 'Limpieza de armario y obra caritativa: Dona la ropa que ya no uses', 'capullo.png'),
(40, 4, 'Esta noche cocina algo especial para tu pareja/familia/amigos', 'capullo.png'),
(41, 4, 'Dona algunos libros que ya hayas leído a una librería local ', 'capullo.png'),
(42, 4, 'Ofrece ayuda a algún amigo o familiar de manera desinteresada', 'oruga.png'),
(43, 4, 'Haz una lista de todas las cosas por las que te sientes agradecido en tu día', 'oruga.png'),
(44, 4, 'Piensa en las experiencias positivas de tu pasado y cuánto han aportado en tu vida.', 'oruga.png'),
(45, 4, 'Llama a ese amigo/a con el que hace tiempo que no contactas por falta de tiempo', 'oruga.png'),
(46, 4, 'Anota en un cuaderno/nota de móvil las cualidades, talentos y capacidades que te hacen único/a.', 'mariposa.png'),
(47, 4, 'Resignifica las experiencias negativas que hayas experimentado a lo largo del día', 'mariposa.png'),
(48, 4, 'Habla con un familiar o amigo/a y dile cuánto lo aprecias', 'mariposa.png'),
(49, 4, 'Expresa tu agradecimiento cada vez que tengas un sentimiento positivo a lo largo del día.', 'mariposa.png'),
(50, 5, 'Pregúntate a ti mismo/a: ¿Qué quieres lograr con el détox? ¿En qué quieres enfocarte? ¿Qué te gustaría cambiar o incorporar en tu vida?', 'capullo.png'),
(51, 5, 'Regula las notificaciones. Deja activas los mensajes y llamadas de mamá, papá, pareja, trabajo y desactiva las demás. Tiempo recomendado para revisar el celular: 30 min.', 'capullo.png'),
(52, 5, 'Durante tu jornada diaria, esconde el teléfono móvil y otros dispositivos donde no puedas verlos o sea difícil de llegar', 'capullo.png'),
(53, 5, 'Cuando sientas ganas de utilizar algún dispositivo por aburrimiento, comienza a leer un libro. Puedes empezar por una novela corta', 'capullo.png'),
(54, 5, 'Siéntate frente a una ventana y usa el paisaje como modelo para crear un dibujo, de esta forma estimulas tu creatividad mientras te relajas. No tiene por qué ser perfecto, nada muy profesional', 'oruga.png'),
(55, 5, 'Haz una excursión a la naturaleza, y no uses el teléfono móvil durante el tiempo que estés allí. Puedes explorar un bosque, playa, sendero, etc.', 'oruga.png'),
(56, 5, 'Invierte tu tiempo libre y de ocio en jugar a algún juego de mesa, ya sea solo o acompañado, si puede ser en compañía lo disfrutarás aún más', 'oruga.png'),
(57, 5, 'Crea tu pequeño jardín interior/en el patio o la terraza. Hoy puedes empezar comprando una planta como ficus, rosario, lirio, etc. Un jardín aporta armonía y paz a los ambientes', 'oruga.png'),
(58, 5, 'Invierte en tiempo de calidad: Haz una visita sorpresa a ese familiar al que no visitas mucho e invierte el tiempo conversando con él/ella', 'mariposa.png'),
(59, 5, 'Pon tus canciones favoritas y baila como si nadie te estuviera viendo', 'mariposa.png'),
(60, 5, 'Día de aromaterapia: date un baño relajante con sales de baño o bombas aromáticas. Enciende también unas velas perfumadas y quédate disfrutando del baño en silencio (si no tienes bañera en casa, puedes hacerlo solo con velas en una habitación silenciosa).', 'mariposa.png'),
(61, 5, 'Para continuar con el detox y obtener resultados debes ser constante. Establece hoy unas nuevas reglas para el consumo de las pantallas: horario y tiempo, prioridades y nuevas actividades de desconexión como las que hemos ido realizando estos días', 'mariposa.png'),
(62, 6, 'Planifica tus próximas semanas para organizar tu día a día una rutina de ejercicio diario de entre 20 y 60 minutos al día', 'capullo.png'),
(63, 6, 'Busca una playlist de música animada que te motive o créala tú mism@', 'capullo.png'),
(64, 6, 'Usa la playlist del reto anterior para salir a caminar durante 15 minutos', 'capullo.png'),
(65, 6, 'Haz una lista de los pros de realizar ejercicio físico y el porque quieres comenzar a realizarlo', 'capullo.png'),
(66, 6, 'Realiza 6 sentadillas y 4 flexiones al despertarte por la mañana', 'oruga.png'),
(67, 6, '¡Prepara tu outfit de deporte favorito (si no tienes consigue ropa de deporte nueva) y sal a caminar durante 20 minutos.', 'oruga.png'),
(68, 6, 'Habla con alguien que haga deporte con frecuencia o que se haya iniciado en el mundo del deporte y dile que te muestre su avance en el tiempo que lleva.', 'oruga.png'),
(69, 6, 'Busca en internet algún grupo de entrenamiento que haga deporte al aire libre y únete a ellos en su próximo encuentro.  ', 'oruga.png'),
(70, 6, 'Realiza una clase de fitness guiado en un gimnasio o en casa (puedes usar videos de youtube) de entre 20 y 30 minutos', 'mariposa.png'),
(71, 6, 'Durante el día escucha música que te genere ganas de hacer ejercicio, de bailar, etc. Sal a caminar 30 minutos cuando puedas', 'mariposa.png'),
(72, 6, 'Realiza dos sesiones de 6 sentadillas y otras dos sesiones de 6 abdominales al levantarte por la mañana. Por la tarde da un paseo de 20 minutos', 'mariposa.png'),
(73, 6, 'Intenta mantener esta rutina de ejercicios y paseos de al menos 20 minutos todos los días y apunta tus logros semanales ¡mucho ánimo!', 'mariposa.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `Identificador` int(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(255) NOT NULL,
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
(5, 'Detox digital', 'Se entiende como desintoxicación digital cuando nos tomamos un descanso de los aparatos electrónicos, principalmente el teléfono, el ordenador y la televisión. Estos retos nos ayudarán a tomarnos un descanso de los dispositivos, lo cual tiene muchos beneficios: reduce la fatiga y el estrés, ayuda a mejorar el sueño, estimulas las relaciones personales, ayuda a disminuir problemas físicos relacionados con el consumo de pantallas, mejora la creatividad, etc.', 'desconectar.jpg', 5),
(6, 'Fitness', 'La actividad física tiene múltiples beneficios tanto para la salud física como mental. El ejercicio estimula varias sustancias químicas cerebrales que pueden hacer que te sientas más feliz, más relajado y menos ansioso. Es posible que también te sientas mejor sobre tu aspecto y sobre ti mismo si haces ejercicios regularmente, lo cual puede aumentar tu confianza y mejorar tu autoestima. Estos retos nos ayudarán a comenzar una rutina de ejercicio físico y dejar de lado el sedentarismo.', 'fitness.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
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
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `retos`
--
ALTER TABLE `retos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
