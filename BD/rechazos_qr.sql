-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 00:59:41
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
-- Estructura de tabla para la tabla `rechazos_qr`
--

CREATE TABLE `rechazos_qr` (
  `id_movimiento_qr` int(11) NOT NULL,
  `id_rechazo_qr` int(11) NOT NULL,
  `justificacionRechazo` varchar(240) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaRechazo` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rechazos_qr`
--

INSERT INTO `rechazos_qr` (`id_movimiento_qr`, `id_rechazo_qr`, `justificacionRechazo`, `usuario`, `fechaRechazo`) VALUES
(785, 1, 'aaa', 'Lulu', '2020-10-05'),
(628, 2, 'aaaa', 'Lulu', '2020-10-05'),
(634, 3, 'SNS', 'Lulu', '2020-10-05'),
(635, 4, 'XDSXSXSXS', 'Lulu', '2020-10-05'),
(631, 5, 'SCSCASCASAS', 'Lulu', '2020-10-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rechazos_qr`
--
ALTER TABLE `rechazos_qr`
  ADD PRIMARY KEY (`id_rechazo_qr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rechazos_qr`
--
ALTER TABLE `rechazos_qr`
  MODIFY `id_rechazo_qr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
