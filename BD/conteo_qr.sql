-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2021 a las 08:27:32
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
-- Estructura de tabla para la tabla `conteo_qr`
--

CREATE TABLE `conteo_qr` (
  `id_cont` int(11) NOT NULL,
  `rfc` varchar(13) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `hora` varchar(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioAgrego` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `qna` varchar(2) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `anio` varchar(4) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conteo_qr`
--
ALTER TABLE `conteo_qr`
  ADD PRIMARY KEY (`id_cont`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conteo_qr`
--
ALTER TABLE `conteo_qr`
  MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
