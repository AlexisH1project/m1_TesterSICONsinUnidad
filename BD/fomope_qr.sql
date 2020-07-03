-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2020 a las 01:30:12
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
-- Estructura de tabla para la tabla `fomope_qr`
--

CREATE TABLE `fomope_qr` (
  `id_movimiento_qr` int(4) NOT NULL,
  `estatus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoRegistro` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `qna` int(2) NOT NULL,
  `llave` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_movimiento` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `lote` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_p` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_m` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `sar` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `num_acta_banco` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `clabe` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `num_exterior` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `num_interior` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_post` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `estado_municipio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `cr` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `partida` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_puesto` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `edo_ai` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `gf` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `funcion` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `subfuncion` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `num_puesto` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_trabajo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `fing_gf` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fing_ssa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `num_horas` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `rango` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `quin` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `fini` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fter` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `con_36` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `entidad_nac` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tex_con` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `anio` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modifco` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAutorizacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fomope_qr`
--
ALTER TABLE `fomope_qr`
  ADD PRIMARY KEY (`id_movimiento_qr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fomope_qr`
--
ALTER TABLE `fomope_qr`
  MODIFY `id_movimiento_qr` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
