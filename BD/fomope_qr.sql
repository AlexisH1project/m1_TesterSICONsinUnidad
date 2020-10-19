-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2020 a las 20:18:50
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
  `tipoRegistro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `qna` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
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
  `usuario_modifico` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAutorizacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `motivo_rechazo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `personaAsignada` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `color_estado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `oficio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Frecepcion` date NOT NULL,
  `Fen_firma` date NOT NULL,
  `Ffirmado` date NOT NULL,
  `Fentrega_ur` date NOT NULL,
  `envio_personal` date NOT NULL,
  `archivo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fomope_qr`
--

INSERT INTO `fomope_qr` (`id_movimiento_qr`, `estatus`, `tipoRegistro`, `qna`, `llave`, `tipo_movimiento`, `lote`, `rfc`, `apellido_p`, `apellido_m`, `nombre`, `estado_civil`, `sar`, `curp`, `num_acta_banco`, `clabe`, `tipo`, `banco`, `calle`, `num_exterior`, `num_interior`, `colonia`, `codigo_post`, `estado_municipio`, `cr`, `ap`, `unidad`, `partida`, `codigo_puesto`, `edo_ai`, `gf`, `funcion`, `subfuncion`, `num_puesto`, `Tipo_trabajo`, `fing_gf`, `fing_ssa`, `num_horas`, `rango`, `quin`, `fini`, `fter`, `con_36`, `genero`, `entidad_nac`, `tex_con`, `anio`, `usuario_modifico`, `fechaAutorizacion`, `motivo_rechazo`, `personaAsignada`, `color_estado`, `oficio`, `Frecepcion`, `Fen_firma`, `Ffirmado`, `Fentrega_ur`, `envio_personal`, `archivo`) VALUES
(616, 'Revisión', 'PERSONAL DE CONFIANZA (ALTA)', '9', ' 4002000281', '4002', 'Alexis1', 'BAAC861203AAA', 'BADILLO', 'AGUILAR', 'CARLOS EDUARDO', '1', '00000000000000000000', 'BAAC861203HMCDGR01', '0064906221760102', '021010064906221765', '02', '40021', 'JOSEFA ORTIZ DE DMZ.', '178', '104', 'COLONIA', '52140', '15054', '0951302000', 'M001', '513', '1103', 'CFO3003', '00002', '2', '3', '04', '0009', '02', '20201001', '20201001', '8', '3', '0', '20201001', '', '1', 'H', '15', ' 40020002813|4002|Alexis1|BAAC861203AAA|BADILLO,AGUILAR/CARLOS EDUARDO|1|00000000000000000000|BAAC861203HMCDGR01|0064906221760102|021010064906221765|02|40021|JOSEFA ORTIZ DE DMZ.|178|104|COLONIA|52140|15054|0951302000|M001|513|1103|CFO3003|00002|2|3|04|0009|02|20201001|20201001|8|3|0|20201001||1|H|15| \r', '2019', 'Lulu', '2020-10-19', '', '', 'amarillo0', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(617, 'Revisión', 'PERSONAL DE CONFIANZA (ALTA)', '9', ' 5009000276', '5009', 'Alexis1', 'ROLA750921RI1', 'ROMERO', 'LOPEZ', 'ANABEL NAACHIELY', '1', '00000000000000000000', 'ROLA750921MDFMPN04', '0010771951050102', '072180010771951054', '02', '40072', 'PASEOS DE LOS FRAMBOYANES', '197', '00000', 'PASEOS DE TAXQUE&A', '04250', '09003', '0916000001', 'E023', '160', '1103', 'CFK2002', '09018', '2', '3', '02', '0000', '02', '20200116', '20200116', '8', '3', '0', '20200601', '', '1', 'M', '09', ' 50090002763|5009|Alexis1|ROLA750921RI1|ROMERO,LOPEZ/ANABEL NAACHIELY|1|00000000000000000000|ROLA750921MDFMPN04|0010771951050102|072180010771951054|02|40072|PASEOS DE LOS FRAMBOYANES|197|00000|PASEOS DE TAXQUE&A|04250|09003|0916000001|E023|160|1103|CFK2002|09018|2|3|02|0000|02|20200116|20200116|8|3|0|20200601||1|M|09| \r', '2019', 'Lulu', '2020-10-19', '', '', 'amarillo0', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(618, 'Revisión', 'PERSONAL DE CONFIANZA (ALTA)', '9', ' 5009000277', '5009', 'Alexis1', 'SAAA771028GP4', 'SANTOS', 'AVILES', 'ANALI', '1', '00000000000000000000', 'SAAA771028MMCNVN01', '0010994899450102', '072180010994899456', '02', '40072', 'DR JOSE MARIA VERTIZ', '665', '501', 'NARVARTE NORTE', '03023', '09014', '0951300000', 'M001', '513', '1103', 'CFK2002', '09002', '2', '3', '04', '0000', '02', '20040101', '20040101', '8', '3', '0', '20200601', '', '1', 'M', '15', ' 50090002774|5009|Alexis1|SAAA771028GP4|SANTOS,AVILES/ANALI|1|00000000000000000000|SAAA771028MMCNVN01|0010994899450102|072180010994899456|02|40072|DR JOSE MARIA VERTIZ|665|501|NARVARTE NORTE|03023|09014|0951300000|M001|513|1103|CFK2002|09002|2|3|04|0000|02|20040101|20040101|8|3|0|20200601||1|M|15| \r', '2019', 'Lulu', '2020-10-19', '', '', 'amarillo0', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(619, 'Revisión', 'PERSONAL DE CONFIANZA (ALTA)', '9', ' 5009000277', '5009', 'Alexis1', 'MAMF640827HU6', 'MARTINEZ', 'MARTINEZ', 'FRANCISCO', '2', '00000000000000000000', 'MAMF640827HDFRRR07', '0001046150260102', '044180001046150268', '02', '40044', 'CIRCUITO BAHAMAS', '49', 'C3', 'LOMAS ESTRELLA', '09890', '09007', '0951000000', 'M001', '510', '1103', 'CFK2002', '09002', '2', '3', '04', '0000', '02', '19860901', '19860901', '8', '3', '0', '20200601', '', '1', 'H', '09', ' 50090002771|5009|Alexis1|MAMF640827HU6|MARTINEZ,MARTINEZ/FRANCISCO|2|00000000000000000000|MAMF640827HDFRRR07|0001046150260102|044180001046150268|02|40044|CIRCUITO BAHAMAS|49|C3|LOMAS ESTRELLA|09890|09007|0951000000|M001|510|1103|CFK2002|09002|2|3|04|0000|02|19860901|19860901|8|3|0|20200601||1|H|09| \r', '2019', 'Lulu', '2020-10-19', '', '', 'amarillo0', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(620, 'Revisión', 'PERSONAL DE CONFIANZA (ALTA)', '9', ' 5009000276', '5009', 'Alexis1', 'CAGM630108BX2', 'CABRERA', 'GARCIA', 'MARTA BEATRIZ', '1', '00000000000000000000', 'CAGM630108MDFBRR04', '0001031602890102', '044180001031602899', '02', '40044', 'DIAGONAL SAN ANTONIO', '835', 'A-405', 'DEL VALLE', '03100', '09014', '0911200000', 'M001', '112', '1103', 'CFK2002', '09002', '2', '3', '04', '0000', '02', '20190516', '20190516', '8', '3', '0', '20200601', '', '1', 'M', '09', ' 50090002761|5009|Alexis1|CAGM630108BX2|CABRERA,GARCIA/MARTA BEATRIZ|1|00000000000000000000|CAGM630108MDFBRR04|0001031602890102|044180001031602899|02|40044|DIAGONAL SAN ANTONIO|835|A-405|DEL VALLE|03100|09014|0911200000|M001|112|1103|CFK2002|09002|2|3|04|0000|02|20190516|20190516|8|3|0|20200601||1|M|09| \r', '2019', 'Lulu', '2020-10-19', '', '', 'amarillo0', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

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
  MODIFY `id_movimiento_qr` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=621;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
