-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2020 a las 20:10:56
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
-- Estructura de tabla para la tabla `plazas_ctrlp`
--

CREATE TABLE `plazas_ctrlp` (
  `id_plaza` int(11) NOT NULL,
  `ramo` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `unidadResponsable` varchar(4) COLLATE utf8mb4_spanish_ci NOT NULL,
  `grupoPersonal` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `gfuncionalResposabilidad` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `zonaEconomica` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivel` varchar(7) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigoPuesto` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rangoSalarial` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigoFederalPuestos` varchar(14) COLLATE utf8mb4_spanish_ci NOT NULL,
  `regimenDeSeguridadSocial` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `curvaSalarial` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipoPlaza` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipoPersonal` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipoNombramiento` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `grupoJerarquicoDePersonal` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL,
  `argumentoDePuestos` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaInicioVigencia` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaFinalVigencia` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numDePlazas` int(2) NOT NULL,
  `numDeHoras` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `indiceTabulador` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL,
  `subIndiceTabulador` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `plazas_ctrlp`
--
ALTER TABLE `plazas_ctrlp`
  ADD PRIMARY KEY (`id_plaza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plazas_ctrlp`
--
ALTER TABLE `plazas_ctrlp`
  MODIFY `id_plaza` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
