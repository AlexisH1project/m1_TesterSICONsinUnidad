-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-04-2020 a las 23:32:56
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
-- Estructura de tabla para la tabla `correos_ur`
--

CREATE TABLE `correos_ur` (
  `UR` varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correoAdmin1` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correoAdmin2` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cc1` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cc2` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cc3` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cc4` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cc5` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `correos_ur`
--


INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('100', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('111', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('112', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('113', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('114', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('160', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('170', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('171', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('172', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('180', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('300', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('310', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('313', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('315', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('316', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('500', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('510', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('511', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('512', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('513', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('514', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('600', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('610', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('611', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('613', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('614', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('E00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('I00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('K00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('L00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('M00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('M7A', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('M7F', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('M7K', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('N00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NAW', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBB', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBD', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBQ', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBG', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBR', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBS', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBT', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBU', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NBV', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCA', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCD', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCE', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCG', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCH', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCK', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NCZ', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NDE', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NDF', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NDY', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NEF', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('NHK', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('O00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('Q00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('R00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('S00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('T00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('U00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('V00', '', '', '', '', '', '', '');
INSERT INTO `correos_ur` (`UR`, `correoAdmin1`, `correoAdmin2`, `cc1`, `cc2`, `cc3`, `cc4`, `cc5`) VALUES('X00', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correos_ur`
--
ALTER TABLE `correos_ur`
  ADD UNIQUE KEY `UR` (`UR`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correos_ur`
--
ALTER TABLE `correos_ur`
  ADD CONSTRAINT `correos_ur_ibfk_1` FOREIGN KEY (`UR`) REFERENCES `ct_unidades` (`UR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
