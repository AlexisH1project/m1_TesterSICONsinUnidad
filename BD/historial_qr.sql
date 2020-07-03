-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2020 a las 20:17:01
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  MODIFY `id_registro_qr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_qr`
--
ALTER TABLE `historial_qr`
  ADD CONSTRAINT `historial_qr_ibfk_1` FOREIGN KEY (`id_movimiento_qr`) REFERENCES `fomope_qr` (`id_movimiento_qr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
