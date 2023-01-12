-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2022 a las 11:43:36
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
-- Base de datos: `cursoaplicacionesweb`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `ventas_clientes`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ventas_clientes`  AS SELECT `usuarios`.`nombre` AS `Nombre del usuario`, `usuarios`.`apellidos` AS `Apellidos del usuario`, `usuarios`.`email` AS `Email del usuario`, `pedidos`.`cantidad` AS `Cantidad del producto`, `gestion`.`nombre` AS `Producto comprado`, `gestion`.`precio` AS `Precio del producto`, `pedidos`.`cantidad`* `gestion`.`precio` AS `Subtotal` FROM ((`pedidos` left join `usuarios` on(`pedidos`.`idusuario` = `usuarios`.`Identificador`)) left join `gestion` on(`pedidos`.`idproducto` = `gestion`.`Identificador`))  ;

--
-- VIEW `ventas_clientes`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
