-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2020 a las 01:55:07
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
-- Base de datos: `bd_sistemadecontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m1ct_fechasnomina`
--

CREATE TABLE `m1ct_fechasnomina` (
  `id_qna` int(11) NOT NULL,
  `nombre_qna` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `fechaIunidad` date NOT NULL,
  `fechaFunidad` date NOT NULL,
  `fechaIanalista` date NOT NULL,
  `fechaFanalista` date NOT NULL,
  `fechaPago` date NOT NULL,
  `estadoActual` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `m1ct_fechasnomina`
--

INSERT INTO `m1ct_fechasnomina` (`id_qna`, `nombre_qna`, `fechaIunidad`, `fechaFunidad`, `fechaIanalista`, `fechaFanalista`, `fechaPago`, `estadoActual`) VALUES
(1, 'Qna 01', '2019-12-10', '0000-00-00', '0000-00-00', '0000-00-00', '2020-01-10', 'cerrada '),
(2, 'Qna 02', '2019-12-26', '0000-00-00', '0000-00-00', '0000-00-00', '2020-01-24', 'cerrada '),
(3, 'Qna 03', '2020-01-08', '0000-00-00', '0000-00-00', '0000-00-00', '2020-02-10', 'cerrada '),
(4, 'Qna 04', '2020-01-22', '0000-00-00', '0000-00-00', '0000-00-00', '2020-02-25', 'cerrada '),
(5, 'Qna 05', '2020-02-07', '0000-00-00', '0000-00-00', '0000-00-00', '2020-03-10', 'cerrada '),
(6, 'Qna 06', '2020-02-21', '0000-00-00', '0000-00-00', '0000-00-00', '2020-03-25', 'cerrada '),
(7, 'Qna 07', '2020-03-06', '0000-00-00', '0000-00-00', '0000-00-00', '2020-04-08', 'cerrada '),
(8, 'Qna 08', '2020-03-23', '2020-03-27', '2020-03-27', '2020-04-02', '2020-04-24', 'abierta '),
(9, 'Qna 09', '2000-04-06', '2020-04-14', '2020-04-14', '2020-04-17', '2020-05-08', 'proxima'),
(10, 'Qna 10', '2020-04-21', '2020-04-27', '2020-04-27', '2020-05-05', '2020-05-25', 'proxima'),
(11, 'Qna 11', '2020-05-08', '2020-05-14', '2020-05-14', '2020-05-21', '2020-06-10', 'proxima'),
(12, 'Qna 12', '2020-05-25', '2020-05-29', '2020-05-29', '2020-06-05', '2020-06-25', 'proxima'),
(13, 'Qna 13', '2020-06-09', '2020-06-15', '2020-06-15', '2020-06-22', '2020-07-10', 'proxima'),
(14, 'Qna 14', '2020-06-24', '2020-06-30', '2020-06-30', '2020-07-06', '2020-07-24', 'proxima'),
(15, 'Qna 15', '2020-07-08', '2020-07-14', '2020-07-14', '2020-07-21', '2020-08-10', 'proxima'),
(16, 'Qna 16', '2020-07-23', '2020-07-29', '2020-07-29', '2020-08-05', '2020-08-25', 'proxima'),
(17, 'Qna 17', '2020-08-10', '2020-08-14', '2020-08-14', '2020-08-21', '2020-09-10', 'proxima'),
(18, 'Qna 18', '2020-08-25', '2020-08-31', '2020-08-31', '2020-09-03', '2020-09-25', 'proxima'),
(19, 'Qna 19', '2020-09-07', '2020-09-11', '2020-09-11', '2020-09-21', '2020-10-09', 'proxima'),
(20, 'Qna 20', '2020-09-23', '2020-09-29', '2020-09-29', '2020-10-05', '2020-10-23', 'proxima'),
(21, 'Qna 21', '2020-10-07', '2020-10-13', '2020-10-13', '2020-10-20', '2020-11-10', 'proxima'),
(22, 'Qna 22', '2020-10-22', '2020-10-28', '2020-10-28', '2020-11-04', '2020-11-25', 'proxima'),
(23, 'Qna 23', '2020-11-06', '2020-11-12', '2020-11-12', '2020-11-20', '2020-12-10', 'proxima'),
(24, 'Qna 24', '2020-11-24', '2020-11-30', '2020-11-30', '2020-12-03', '2020-12-23', 'proxima');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `m1ct_fechasnomina`
--
ALTER TABLE `m1ct_fechasnomina`
  ADD PRIMARY KEY (`id_qna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
