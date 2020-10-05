-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 00:59:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fomope2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_qr`
--

CREATE TABLE `historial_qr` (
  `id_registro_qr` int(11) NOT NULL,
  `id_movimiento_qr` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaMovimiento` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `horaMovimiento` varchar(24) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `historial_qr`
--

INSERT INTO `historial_qr` (`id_registro_qr`, `id_movimiento_qr`, `usuario`, `fechaMovimiento`, `horaMovimiento`) VALUES
(9, 175, 'Lulu', '2020-09-30', '23:40:46'),
(10, 177, 'Lulu', '2020-09-30', '23:40:56'),
(11, 785, 'Lulu', '2020-10-05', '17:26:44'),
(12, 628, 'Lulu', '2020-10-05', '17:27:09'),
(13, 634, 'Lulu', '2020-10-05', '17:55:26'),
(14, 635, 'Lulu', '2020-10-05', '17:57:44'),
(15, 631, 'Lulu', '2020-10-05', '17:58:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_qr`
--
ALTER TABLE `historial_qr`
  ADD PRIMARY KEY (`id_registro_qr`),
  ADD KEY `id_movimiento_qr` (`id_movimiento_qr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_qr`
--
ALTER TABLE `historial_qr`
  MODIFY `id_registro_qr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
