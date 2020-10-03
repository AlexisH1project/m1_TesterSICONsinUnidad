-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2020 a las 19:22:18
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
  `personaAsignada` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fomope_qr`
--

INSERT INTO `fomope_qr` (`id_movimiento_qr`, `estatus`, `tipoRegistro`, `qna`, `llave`, `tipo_movimiento`, `lote`, `rfc`, `apellido_p`, `apellido_m`, `nombre`, `estado_civil`, `sar`, `curp`, `num_acta_banco`, `clabe`, `tipo`, `banco`, `calle`, `num_exterior`, `num_interior`, `colonia`, `codigo_post`, `estado_municipio`, `cr`, `ap`, `unidad`, `partida`, `codigo_puesto`, `edo_ai`, `gf`, `funcion`, `subfuncion`, `num_puesto`, `Tipo_trabajo`, `fing_gf`, `fing_ssa`, `num_horas`, `rango`, `quin`, `fini`, `fter`, `con_36`, `genero`, `entidad_nac`, `tex_con`, `anio`, `usuario_modifico`, `fechaAutorizacion`, `motivo_rechazo`, `personaAsignada`) VALUES
(410, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000283', 'GORV8909224A2', 'GONZALEZ', 'ROJAS', 'VIANEY', '1', '00000000000000000000', 'GORV890922MVZNJN07', '0029769600730102', '012840029769600734', '02', '40012', 'AV CHAPULTEPEC', '512', 'D-404', 'ROMA NORTE', '06700', '09015', '0960000000', 'P012', '600', '1202', 'CFN1001', '09014', '2', '3', '04', '0006', '07', '20181201', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000283|4505|0000283|GORV8909224A2|GONZALEZ,ROJAS/VIANEY|1|00000000000000000000|GORV890922MVZNJN07|0029769600730102|012840029769600734|02|40012|AV CHAPULTEPEC|512|D-404|ROMA NORTE|06700|09015|0960000000|P012|600|1202|CFN1001|09014|2|3|04|0006|07|20181201|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'Lulu', '2020-10-02 - Lulu', '', 'Tostado'),
(411, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000240', 'DAVM750114719', 'DAVILA', 'VENTURA', 'MANUEL', '1', '00000000000000000000', 'DAVM750114HDFVNN06', '0064504273680102', '021180064504273689', '02', '40021', '4a. CALLE DE CONTRERAS', '121', '00000', 'LA CONCEPCION', '10840', '09008', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0014', '07', '20061101', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000240|4505|0000240|DAVM750114719|DAVILA,VENTURA/MANUEL|1|00000000000000000000|DAVM750114HDFVNN06|0064504273680102|021180064504273689|02|40021|4a. CALLE DE CONTRERAS|121|00000|LA CONCEPCION|10840|09008|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0014|07|20061101|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(412, 'Revisión', 'EVENTUALES', '3', ' 4505000027', '4505', '0000277', 'LOGL690826ENA', 'LOPEZ', 'GOMEZ', 'MARIA LORENA', '2', '00000000000000000000', 'LOGL690826MDFPMR04', '0001342243960102', '012180001342243966', '02', '40012', 'SECCION ZURCO', '3', 'D-301', 'INFONAVIT IZTACALCO', '08900', '09006', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0013', '07', '19950916', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000277|4505|0000277|LOGL690826ENA|LOPEZ,GOMEZ/MARIA LORENA|2|00000000000000000000|LOGL690826MDFPMR04|0001342243960102|012180001342243966|02|40012|SECCION ZURCO|3|D-301|INFONAVIT IZTACALCO|08900|09006|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0013|07|19950916|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'Lulu', '2020-10-02 - Lulu', '', 'MElenaDSPO'),
(413, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000242', 'OEVI750921RH6', 'OSEGUERA', 'VALENCIA', 'ISRAEL', '1', '00000000000000000000', 'OEVI750921HDFSLS06', '0012226228150102', '012180012226228151', '02', '40012', 'AV. 508', '89', '00000', 'U. ARAGON 1A. SECC', '07969', '09005', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0012', '07', '20020901', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000242|4505|0000242|OEVI750921RH6|OSEGUERA,VALENCIA/ISRAEL|1|00000000000000000000|OEVI750921HDFSLS06|0012226228150102|012180012226228151|02|40012|AV. 508|89|00000|U. ARAGON 1A. SECC|07969|09005|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0012|07|20020901|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(414, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000242', 'OEVI750921RH6', 'OSEGUERA', 'VALENCIA', 'ISRAEL', '1', '00000000000000000000', 'OEVI750921HDFSLS06', '0012226228150102', '012180012226228151', '02', '40012', 'AV. 508', '89', '00000', 'U. ARAGON 1A. SECC', '07969', '09005', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0012', '07', '20020901', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000242|4505|0000242|OEVI750921RH6|OSEGUERA,VALENCIA/ISRAEL|1|00000000000000000000|OEVI750921HDFSLS06|0012226228150102|012180012226228151|02|40012|AV. 508|89|00000|U. ARAGON 1A. SECC|07969|09005|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0012|07|20020901|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(415, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000242', 'OEVI750921RH6', 'OSEGUERA', 'VALENCIA', 'ISRAEL', '1', '00000000000000000000', 'OEVI750921HDFSLS06', '0012226228150102', '012180012226228151', '02', '40012', 'AV. 508', '89', '00000', 'U. ARAGON 1A. SECC', '07969', '09005', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0012', '07', '20020901', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000242|4505|0000242|OEVI750921RH6|OSEGUERA,VALENCIA/ISRAEL|1|00000000000000000000|OEVI750921HDFSLS06|0012226228150102|012180012226228151|02|40012|AV. 508|89|00000|U. ARAGON 1A. SECC|07969|09005|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0012|07|20020901|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(416, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000244', 'PISB8007261MA', 'PINEDA', 'SOLORIO', 'BRENDA MARISOL', '2', '00000000000000000000', 'PISB800726MDFNLR04', '0001047282180102', '044180001047282180', '02', '40044', 'EDUARDO MOLINA', '2205', '00000', 'NUEVA ATZACOALCO', '07420', '09005', '0950000000', 'M001', '500', '1202', 'CFN3001', '09002', '2', '3', '04', '0010', '07', '20140701', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000244|4505|0000244|PISB8007261MA|PINEDA,SOLORIO/BRENDA MARISOL|2|00000000000000000000|PISB800726MDFNLR04|0001047282180102|044180001047282180|02|40044|EDUARDO MOLINA|2205|00000|NUEVA ATZACOALCO|07420|09005|0950000000|M001|500|1202|CFN3001|09002|2|3|04|0010|07|20140701|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(417, 'Revisión', 'EVENTUALES', '3', ' 4505000024', '4505', '0000244', 'PISB8007261MA', 'PINEDA', 'SOLORIO', 'BRENDA MARISOL', '2', '00000000000000000000', 'PISB800726MDFNLR04', '0001047282180102', '044180001047282180', '02', '40044', 'EDUARDO MOLINA', '2205', '00000', 'NUEVA ATZACOALCO', '07420', '09005', '0950000000', 'M001', '500', '1202', 'CFN3001', '09002', '2', '3', '04', '0010', '07', '20140701', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000244|4505|0000244|PISB8007261MA|PINEDA,SOLORIO/BRENDA MARISOL|2|00000000000000000000|PISB800726MDFNLR04|0001047282180102|044180001047282180|02|40044|EDUARDO MOLINA|2205|00000|NUEVA ATZACOALCO|07420|09005|0950000000|M001|500|1202|CFN3001|09002|2|3|04|0010|07|20140701|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(418, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000234', 'AORC720721CD1', 'ACOSTA', 'ROMERO', 'CECILIA', '1', '00000000000000000000', 'AORC720721MDFCMC06', '0040064815010102', '021180040064815019', '02', '40021', 'FERROCARRIL DEL VALLE', '123', '00000', 'TIZAPAN', '01090', '09010', '0950000000', 'M001', '500', '1202', 'CFM3001', '09002', '2', '3', '04', '0005', '07', '19950116', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000234|4505|0000234|AORC720721CD1|ACOSTA,ROMERO/CECILIA|1|00000000000000000000|AORC720721MDFCMC06|0040064815010102|021180040064815019|02|40021|FERROCARRIL DEL VALLE|123|00000|TIZAPAN|01090|09010|0950000000|M001|500|1202|CFM3001|09002|2|3|04|0005|07|19950116|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(419, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000234', 'AORC720721CD1', 'ACOSTA', 'ROMERO', 'CECILIA', '1', '00000000000000000000', 'AORC720721MDFCMC06', '0040064815010102', '021180040064815019', '02', '40021', 'FERROCARRIL DEL VALLE', '123', '00000', 'TIZAPAN', '01090', '09010', '0950000000', 'M001', '500', '1202', 'CFM3001', '09002', '2', '3', '04', '0005', '07', '19950116', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000234|4505|0000234|AORC720721CD1|ACOSTA,ROMERO/CECILIA|1|00000000000000000000|AORC720721MDFCMC06|0040064815010102|021180040064815019|02|40021|FERROCARRIL DEL VALLE|123|00000|TIZAPAN|01090|09010|0950000000|M001|500|1202|CFM3001|09002|2|3|04|0005|07|19950116|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(420, 'Revisión', 'EVENTUALES', '3', ' 4505000020', '4505', '0000205', 'AEAS551228GI7', 'ARES DE PARGA', 'ALVAREZ UGENA', 'MARIA DEL SACRAMENTO', '1', '00000000000000000000', 'AEAS551228MDFRLC09', '0040595072510102', '021180040595072512', '02', '40021', 'CALLEJON DE LIENZO', '28', '00000', 'RINCON COLONIAL', '52996', '15013', '0960000000', 'P012', '600', '1202', 'CFN2002', '09014', '2', '3', '04', '0003', '07', '20160916', '20160916', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000205|4505|0000205|AEAS551228GI7|ARES DE PARGA,ALVAREZ UGENA/MARIA DEL SACRAMENTO|1|00000000000000000000|AEAS551228MDFRLC09|0040595072510102|021180040595072512|02|40021|CALLEJON DE LIENZO|28|00000|RINCON COLONIAL|52996|15013|0960000000|P012|600|1202|CFN2002|09014|2|3|04|0003|07|20160916|20160916|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(421, 'Revisión', 'EVENTUALES', '3', ' 4505000020', '4505', '0000205', 'AEAS551228GI7', 'ARES DE PARGA', 'ALVAREZ UGENA', 'MARIA DEL SACRAMENTO', '1', '00000000000000000000', 'AEAS551228MDFRLC09', '0040595072510102', '021180040595072512', '02', '40021', 'CALLEJON DE LIENZO', '28', '00000', 'RINCON COLONIAL', '52996', '15013', '0960000000', 'P012', '600', '1202', 'CFN2002', '09014', '2', '3', '04', '0003', '07', '20160916', '20160916', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000205|4505|0000205|AEAS551228GI7|ARES DE PARGA,ALVAREZ UGENA/MARIA DEL SACRAMENTO|1|00000000000000000000|AEAS551228MDFRLC09|0040595072510102|021180040595072512|02|40021|CALLEJON DE LIENZO|28|00000|RINCON COLONIAL|52996|15013|0960000000|P012|600|1202|CFN2002|09014|2|3|04|0003|07|20160916|20160916|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(422, 'Revisión', 'EVENTUALES', '3', ' 4505000016', '4505', '0000169', 'HEMV7302109S4', 'HERNANDEZ', 'MARCOS', 'VICTOR', '2', '00000000000000000000', 'HEMV730210HMCRRC05', '0060204820630102', '021180060204820637', '02', '40021', '1RA. PRIVADA DE TLAQUEXPA', 'M2 L9', '00000', 'SN ANDRES TOTOLTEPEC', '14400', '09012', '0960000000', 'P012', '600', '1202', 'CFM1003', '09014', '2', '3', '04', '0003', '07', '19940201', '19940201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000169|4505|0000169|HEMV7302109S4|HERNANDEZ,MARCOS/VICTOR|2|00000000000000000000|HEMV730210HMCRRC05|0060204820630102|021180060204820637|02|40021|1RA. PRIVADA DE TLAQUEXPA|M2 L9|00000|SN ANDRES TOTOLTEPEC|14400|09012|0960000000|P012|600|1202|CFM1003|09014|2|3|04|0003|07|19940201|19940201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(423, 'Revisión', 'EVENTUALES', '3', ' 4505000021', '4505', '0000217', 'GOVE800411QW2', 'GONZALEZ', 'VALLEJO', 'ERIKA JEANETTE', '1', '00000000000000000000', 'GOVE800411MDFNLR00', '0005594782170102', '014180605594782174', '02', '40014', 'NOGAL', '282', 'D-4', 'STA MARIA LA RIBERA', '06400', '09015', '0960000000', 'P012', '600', '1202', 'CFP2003', '09014', '2', '3', '04', '0001', '07', '20200401', '20200401', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000217|4505|0000217|GOVE800411QW2|GONZALEZ,VALLEJO/ERIKA JEANETTE|1|00000000000000000000|GOVE800411MDFNLR00|0005594782170102|014180605594782174|02|40014|NOGAL|282|D-4|STA MARIA LA RIBERA|06400|09015|0960000000|P012|600|1202|CFP2003|09014|2|3|04|0001|07|20200401|20200401|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(424, 'Revisión', 'EVENTUALES', '3', ' 4505000021', '4505', '0000217', 'GOVE800411QW2', 'GONZALEZ', 'VALLEJO', 'ERIKA JEANETTE', '1', '00000000000000000000', 'GOVE800411MDFNLR00', '0005594782170102', '014180605594782174', '02', '40014', 'NOGAL', '282', 'D-4', 'STA MARIA LA RIBERA', '06400', '09015', '0960000000', 'P012', '600', '1202', 'CFP2003', '09014', '2', '3', '04', '0001', '07', '20200401', '20200401', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000217|4505|0000217|GOVE800411QW2|GONZALEZ,VALLEJO/ERIKA JEANETTE|1|00000000000000000000|GOVE800411MDFNLR00|0005594782170102|014180605594782174|02|40014|NOGAL|282|D-4|STA MARIA LA RIBERA|06400|09015|0960000000|P012|600|1202|CFP2003|09014|2|3|04|0001|07|20200401|20200401|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(425, 'Revisión', 'EVENTUALES', '3', ' 4505000017', '4505', '0000171', 'RAPR810807IW5', 'RAMIREZ', 'PEREZ', 'RACIEL ANTONIO', '2', '00000000000000000000', 'RAPR810807HVZMRC00', '0002713075770102', '002180902713075775', '02', '40002', 'BOSQUES DE BELGICA', '100-B', '00000', 'BOSQUES DE ARAGON', '57170', '15058', '0960000000', 'P012', '600', '1202', 'CFM1003', '09014', '2', '3', '04', '0004', '07', '20191016', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000171|4505|0000171|RAPR810807IW5|RAMIREZ,PEREZ/RACIEL ANTONIO|2|00000000000000000000|RAPR810807HVZMRC00|0002713075770102|002180902713075775|02|40002|BOSQUES DE BELGICA|100-B|00000|BOSQUES DE ARAGON|57170|15058|0960000000|P012|600|1202|CFM1003|09014|2|3|04|0004|07|20191016|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(426, 'Revisión', 'EVENTUALES', '3', ' 4505000022', '4505', '0000221', 'OORO661212A73', 'OROZCO', 'RAMIREZ', 'OMAR', '2', '00000000000000000000', 'OORO661212HDFRMM07', '0005019114470102', '072180005019114474', '02', '40072', 'AVENIDA UNIVERSIDAD', '1953', 'D-604', 'U-HAB COPILCO', '04340', '09003', '0960000000', 'P012', '600', '1202', 'CFM1003', '09014', '2', '3', '04', '0005', '07', '20160116', '20160116', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000221|4505|0000221|OORO661212A73|OROZCO,RAMIREZ/OMAR|2|00000000000000000000|OORO661212HDFRMM07|0005019114470102|072180005019114474|02|40072|AVENIDA UNIVERSIDAD|1953|D-604|U-HAB COPILCO|04340|09003|0960000000|P012|600|1202|CFM1003|09014|2|3|04|0005|07|20160116|20160116|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(427, 'Revisión', 'EVENTUALES', '3', ' 4505000003', '4505', '0000034', 'AANR620118766', 'ANAYA', 'NU&EZ', 'RAUL RAFAEL', '1', '00000000000000000000', 'AANR620118HHGNXL04', '0002704342490102', '002180902704342491', '02', '40002', 'MINERIA', '88', '205', 'ESCANDON', '11800', '09016', '0910020000', 'M001', '100', '1202', 'CFK1001', '09002', '2', '3', '04', '0003', '07', '20190116', '20190116', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000034|4505|0000034|AANR620118766|ANAYA,NU&EZ/RAUL RAFAEL|1|00000000000000000000|AANR620118HHGNXL04|0002704342490102|002180902704342491|02|40002|MINERIA|88|205|ESCANDON|11800|09016|0910020000|M001|100|1202|CFK1001|09002|2|3|04|0003|07|20190116|20190116|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(428, 'Rechazado duplicado', 'EVENTUALES', '3', ' 4505000024', '4505', '0000240', 'DAVM750114719', 'DAVILA', 'VENTURA', 'MANUEL', '1', '00000000000000000000', 'DAVM750114HDFVNN06', '0064504273680102', '021180064504273689', '02', '40021', '4a. CALLE DE CONTRERAS', '121', '00000', 'LA CONCEPCION', '10840', '09008', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0014', '07', '20061101', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000240|4505|0000240|DAVM750114719|DAVILA,VENTURA/MANUEL|1|00000000000000000000|DAVM750114HDFVNN06|0064504273680102|021180064504273689|02|40021|4a. CALLE DE CONTRERAS|121|00000|LA CONCEPCION|10840|09008|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0014|07|20061101|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(429, 'Rechazado duplicado', 'EVENTUALES', '3', ' 4505000027', '4505', '0000277', 'LOGL690826ENA', 'LOPEZ', 'GOMEZ', 'MARIA LORENA', '2', '00000000000000000000', 'LOGL690826MDFPMR04', '0001342243960102', '012180001342243966', '02', '40012', 'SECCION ZURCO', '3', 'D-301', 'INFONAVIT IZTACALCO', '08900', '09006', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0013', '07', '19950916', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000277|4505|0000277|LOGL690826ENA|LOPEZ,GOMEZ/MARIA LORENA|2|00000000000000000000|LOGL690826MDFPMR04|0001342243960102|012180001342243966|02|40012|SECCION ZURCO|3|D-301|INFONAVIT IZTACALCO|08900|09006|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0013|07|19950916|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(430, 'Rechazado duplicado', 'EVENTUALES', '3', ' 4505000027', '4505', '0000277', 'LOGL690826ENA', 'LOPEZ', 'GOMEZ', 'MARIA LORENA', '2', '00000000000000000000', 'LOGL690826MDFPMR04', '0001342243960102', '012180001342243966', '02', '40012', 'SECCION ZURCO', '3', 'D-301', 'INFONAVIT IZTACALCO', '08900', '09006', '0950000000', 'M001', '500', '1202', 'CFO2003', '09002', '2', '3', '04', '0013', '07', '19950916', '20191016', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000277|4505|0000277|LOGL690826ENA|LOPEZ,GOMEZ/MARIA LORENA|2|00000000000000000000|LOGL690826MDFPMR04|0001342243960102|012180001342243966|02|40012|SECCION ZURCO|3|D-301|INFONAVIT IZTACALCO|08900|09006|0950000000|M001|500|1202|CFO2003|09002|2|3|04|0013|07|19950916|20191016|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(431, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000231', 'AUPE860125DX8', 'AGUIRRE', 'PAREDES', 'ELIZABETH JANETH', '2', '00000000000000000000', 'AUPE860125MMCGRL04', '0014447276140102', '012180014447276142', '02', '40012', 'CALLE 2', '42', 'I-18', 'AGRICOLA PANTITTLAN', '08100', '09006', '0950000000', 'M001', '500', '1202', 'CFN3001', '09002', '2', '3', '04', '0011', '07', '20130601', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000231|4505|0000231|AUPE860125DX8|AGUIRRE,PAREDES/ELIZABETH JANETH|2|00000000000000000000|AUPE860125MMCGRL04|0014447276140102|012180014447276142|02|40012|CALLE 2|42|I-18|AGRICOLA PANTITTLAN|08100|09006|0950000000|M001|500|1202|CFN3001|09002|2|3|04|0011|07|20130601|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(432, 'Revisión', 'EVENTUALES', '3', ' 4505000027', '4505', '0000279', 'SAAM8401194E5', 'SANTIN', 'ALDUNCIN', 'MAYRA SELENE', '2', '00000000000000000000', 'SAAM840119MDFNLY01', '0001014508830102', '044180001014508839', '02', '40044', 'HOPELCHEN', 'MZ-22', 'LT-14', 'HEROES DE PADIERNA', '14200', '09012', '0950000000', 'M001', '500', '1202', 'CFM2003', '09002', '2', '3', '04', '0003', '07', '20081116', '20190601', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000279|4505|0000279|SAAM8401194E5|SANTIN,ALDUNCIN/MAYRA SELENE|2|00000000000000000000|SAAM840119MDFNLY01|0001014508830102|044180001014508839|02|40044|HOPELCHEN|MZ-22|LT-14|HEROES DE PADIERNA|14200|09012|0950000000|M001|500|1202|CFM2003|09002|2|3|04|0003|07|20081116|20190601|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(433, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000280', 'MARR831016ND0', 'MARTINEZ', 'RODRIGUEZ', 'ROSA ELDA', '1', '00000000000000000000', 'MARR831016MDFRDS03', '0063196729550102', '021180063196729555', '02', '40021', 'SAN SAMUEL', 'M-572', 'L-11', 'P. DE SANTA URSULA C', '04650', '09003', '0950000000', 'M001', '500', '1202', 'CFM3003', '09002', '2', '3', '04', '0004', '07', '20111016', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000280|4505|0000280|MARR831016ND0|MARTINEZ,RODRIGUEZ/ROSA ELDA|1|00000000000000000000|MARR831016MDFRDS03|0063196729550102|021180063196729555|02|40021|SAN SAMUEL|M-572|L-11|P. DE SANTA URSULA C|04650|09003|0950000000|M001|500|1202|CFM3003|09002|2|3|04|0004|07|20111016|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(434, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000280', 'MARR831016ND0', 'MARTINEZ', 'RODRIGUEZ', 'ROSA ELDA', '1', '00000000000000000000', 'MARR831016MDFRDS03', '0063196729550102', '021180063196729555', '02', '40021', 'SAN SAMUEL', 'M-572', 'L-11', 'P. DE SANTA URSULA C', '04650', '09003', '0950000000', 'M001', '500', '1202', 'CFM3003', '09002', '2', '3', '04', '0004', '07', '20111016', '20181201', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000280|4505|0000280|MARR831016ND0|MARTINEZ,RODRIGUEZ/ROSA ELDA|1|00000000000000000000|MARR831016MDFRDS03|0063196729550102|021180063196729555|02|40021|SAN SAMUEL|M-572|L-11|P. DE SANTA URSULA C|04650|09003|0950000000|M001|500|1202|CFM3003|09002|2|3|04|0004|07|20111016|20181201|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(435, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000235', 'VEGM6602136TA', 'VEGA', 'GRANADOS', 'MARCO ANTONIO', '1', '00000000000000000000', 'VEGM660213HMCGRR01', '0000390382380102', '036180500390382385', '02', '40036', 'AV. CANAL DE TEZONTLE', '1102', '101', 'PASEOS DE CHURUBUSCO', '09030', '09007', '0931300000', 'P018', '313', '1202', 'CFO1001', '09014', '2', '3', '04', '0004', '07', '20170301', '20200101', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000235|4505|0000235|VEGM6602136TA|VEGA,GRANADOS/MARCO ANTONIO|1|00000000000000000000|VEGM660213HMCGRR01|0000390382380102|036180500390382385|02|40036|AV. CANAL DE TEZONTLE|1102|101|PASEOS DE CHURUBUSCO|09030|09007|0931300000|P018|313|1202|CFO1001|09014|2|3|04|0004|07|20170301|20200101|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(436, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000238', 'FOTT660427B84', 'FLORES', 'TLAXCALTECA', 'MARIA TERESA', '2', '00000000000000000000', 'FOTT660427MDFLLR06', '0064979673840102', '021180064979673843', '02', '40021', 'GLADIOLA', '42', '18', 'LOS ANGELES', '09830', '09007', '0931300000', 'P018', '313', '1202', 'CFO1001', '09014', '2', '3', '04', '0003', '07', '20030401', '20030401', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000238|4505|0000238|FOTT660427B84|FLORES,TLAXCALTECA/MARIA TERESA|2|00000000000000000000|FOTT660427MDFLLR06|0064979673840102|021180064979673843|02|40021|GLADIOLA|42|18|LOS ANGELES|09830|09007|0931300000|P018|313|1202|CFO1001|09014|2|3|04|0003|07|20030401|20030401|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(437, 'Revisión', 'EVENTUALES', '3', ' 4505000023', '4505', '0000238', 'FOTT660427B84', 'FLORES', 'TLAXCALTECA', 'MARIA TERESA', '2', '00000000000000000000', 'FOTT660427MDFLLR06', '0064979673840102', '021180064979673843', '02', '40021', 'GLADIOLA', '42', '18', 'LOS ANGELES', '09830', '09007', '0931300000', 'P018', '313', '1202', 'CFO1001', '09014', '2', '3', '04', '0003', '07', '20030401', '20030401', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000238|4505|0000238|FOTT660427B84|FLORES,TLAXCALTECA/MARIA TERESA|2|00000000000000000000|FOTT660427MDFLLR06|0064979673840102|021180064979673843|02|40021|GLADIOLA|42|18|LOS ANGELES|09830|09007|0931300000|P018|313|1202|CFO1001|09014|2|3|04|0003|07|20030401|20030401|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(438, 'Revisión', 'EVENTUALES', '3', ' 4505000002', '4505', '0000024', 'BADV830929JP3', 'BARRON', 'DEGOLLADO', 'VIVIANA PENELOPE', '1', '00000000000000000000', 'BADV830929MDFRGV06', '0028711403370102', '012180028711403378', '02', '40012', 'MANUEL JOSE OTHON', '92', '302 C', 'OBRERA', '06800', '09015', '0931500000', 'P018', '315', '1202', 'CFO1001', '09014', '2', '3', '04', '0010', '07', '20190701', '20190701', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000024|4505|0000024|BADV830929JP3|BARRON,DEGOLLADO/VIVIANA PENELOPE|1|00000000000000000000|BADV830929MDFRGV06|0028711403370102|012180028711403378|02|40012|MANUEL JOSE OTHON|92|302 C|OBRERA|06800|09015|0931500000|P018|315|1202|CFO1001|09014|2|3|04|0010|07|20190701|20190701|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(439, 'Revisión', 'EVENTUALES', '3', ' 4505000011', '4505', '0000112', 'AICC690909116', 'ARRIAGA', 'CAMARENA', 'CESAR', '2', '00000000000000000000', 'AICC690909HDFRM209', '0060645085590102', '021180060645085594', '02', '40021', 'EMILIO CARRANZA', '6', '00000', 'BUENAVISTA', '53800', '15057', '0931500000', 'P018', '315', '1202', 'CFO1001', '09014', '2', '3', '04', '0007', '07', '19921001', '19921001', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000112|4505|0000112|AICC690909116|ARRIAGA,CAMARENA/CESAR|2|00000000000000000000|AICC690909HDFRM209|0060645085590102|021180060645085594|02|40021|EMILIO CARRANZA|6|00000|BUENAVISTA|53800|15057|0931500000|P018|315|1202|CFO1001|09014|2|3|04|0007|07|19921001|19921001|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(440, 'Revisión', 'EVENTUALES', '3', ' 4505000003', '4505', '0000036', 'METO750606EB4', 'MEMIJE', 'TAMES', 'OSCAR ALEXIL', '2', '00000000000000000000', 'METO750606HDFMMS06', '0040589841390102', '021180040589841393', '02', '40021', 'JUAN DE LA BARRERA', '28', '', '101', 'NI&OS H', '03440', '09014', '0931', 'P018', '315', '1202', 'CFN10', '0', '2', '3', '04', '00', '07', '20040101', '2', '8', '3', '0', '20200701', '2', '', '', ' 45050000036|4505|0000036|METO750606EB4|MEMIJE,TAMES/OSCAR ALEXIL|2|00000000000000000000|METO750606HDFMMS06|0040589841390102|021180040589841393|02|40021|JUAN DE LA BARRERA|28||101|NI&OS HEROES|03440|09014|0931500000|P018|315|1202|CFN1001|09014|2|3|04|0007|07|20040101|20100116|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(441, 'Revisión', 'EVENTUALES', '3', ' 4505000010', '4505', '0000108', 'BABL600110370', 'BAAS', 'BRICE&O', 'LAURA MAGDALENA', '1', '00000000000000000000', 'BABL600110MDFSRR08', '0040388295860102', '021180040388295865', '02', '40021', 'ROBERTO RIOS ELIZONDO', '62', '5', 'OLIVAR DE LOS PADRES', '01780', '09010', '0931500000', 'P018', '315', '1202', 'CFM1001', '09014', '2', '3', '04', '0003', '07', '19871101', '20010501', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000108|4505|0000108|BABL600110370|BAAS,BRICE&O/LAURA MAGDALENA|1|00000000000000000000|BABL600110MDFSRR08|0040388295860102|021180040388295865|02|40021|ROBERTO RIOS ELIZONDO|62|5|OLIVAR DE LOS PADRES|01780|09010|0931500000|P018|315|1202|CFM1001|09014|2|3|04|0003|07|19871101|20010501|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(442, 'Revisión', 'EVENTUALES', '3', ' 4505000010', '4505', '0000108', 'BABL600110370', 'BAAS', 'BRICE&O', 'LAURA MAGDALENA', '1', '00000000000000000000', 'BABL600110MDFSRR08', '0040388295860102', '021180040388295865', '02', '40021', 'ROBERTO RIOS ELIZONDO', '62', '5', 'OLIVAR DE LOS PADRES', '01780', '09010', '0931500000', 'P018', '315', '1202', 'CFM1001', '09014', '2', '3', '04', '0003', '07', '19871101', '20010501', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000108|4505|0000108|BABL600110370|BAAS,BRICE&O/LAURA MAGDALENA|1|00000000000000000000|BABL600110MDFSRR08|0040388295860102|021180040388295865|02|40021|ROBERTO RIOS ELIZONDO|62|5|OLIVAR DE LOS PADRES|01780|09010|0931500000|P018|315|1202|CFM1001|09014|2|3|04|0003|07|19871101|20010501|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(443, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000285', 'PAAM751017TH1', 'PLASCENCIA', 'ANDRADE', 'MARGARITA', '1', '00000000000000000000', 'PAAM751017MDFLNR06', '0015686809570102', '012180015686809573', '02', '40012', 'AV. 6', '223', '00000', 'GRAL IGNACIO ZARAGOZ', '15000', '09017', '09S0000000', 'G004', 'S00', '1202', 'CFO2003', '09017', '2', '3', '01', '0001', '07', '20200316', '20200316', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000285|4505|0000285|PAAM751017TH1|PLASCENCIA,ANDRADE/MARGARITA|1|00000000000000000000|PAAM751017MDFLNR06|0015686809570102|012180015686809573|02|40012|AV. 6|223|00000|GRAL IGNACIO ZARAGOZ|15000|09017|09S0000000|G004|S00|1202|CFO2003|09017|2|3|01|0001|07|20200316|20200316|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(444, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000285', 'PAAM751017TH1', 'PLASCENCIA', 'ANDRADE', 'MARGARITA', '1', '00000000000000000000', 'PAAM751017MDFLNR06', '0015686809570102', '012180015686809573', '02', '40012', 'AV. 6', '223', '00000', 'GRAL IGNACIO ZARAGOZ', '15000', '09017', '09S0000000', 'G004', 'S00', '1202', 'CFO2003', '09017', '2', '3', '01', '0001', '07', '20200316', '20200316', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000285|4505|0000285|PAAM751017TH1|PLASCENCIA,ANDRADE/MARGARITA|1|00000000000000000000|PAAM751017MDFLNR06|0015686809570102|012180015686809573|02|40012|AV. 6|223|00000|GRAL IGNACIO ZARAGOZ|15000|09017|09S0000000|G004|S00|1202|CFO2003|09017|2|3|01|0001|07|20200316|20200316|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(445, 'Revisión', 'EVENTUALES', '3', ' 4505000026', '4505', '0000263', 'LASR790310IT1', 'LARIOS', 'SANTOYO', 'RAFAEL', '1', '00000000000000000000', 'LASR790310HPLRNF09', '0001039897470102', '044180001039897473', '02', '40044', 'CALLEJON DE IXPANTENCO', '12', '6', 'LOS REYES', '04330', '09003', '09S0000000', 'G004', 'S00', '1202', 'CFM2003', '09017', '2', '3', '01', '0003', '07', '20190601', '20190601', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000263|4505|0000263|LASR790310IT1|LARIOS,SANTOYO/RAFAEL|1|00000000000000000000|LASR790310HPLRNF09|0001039897470102|044180001039897473|02|40044|CALLEJON DE IXPANTENCO|12|6|LOS REYES|04330|09003|09S0000000|G004|S00|1202|CFM2003|09017|2|3|01|0003|07|20190601|20190601|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(446, 'Revisión', 'EVENTUALES', '3', ' 4505000028', '4505', '0000286', 'AUHH780818R35', 'AGUILA', 'HERNANDEZ', 'HUGO LENIN', '2', '00000000000000000000', 'AUHH780818HMNGRG06', '0015850014660102', '012180015850014660', '02', '40012', 'VIRGINIA FABREGAS', '31', 'B D32', 'JORGE NEGRETE', '07280', '09005', '09S0000000', 'G004', 'S00', '1202', 'CFO2003', '09017', '2', '3', '01', '0002', '07', '20170316', '20200501', '8', '3', '0', '20200701', '20201231', '1', '', '', ' 45050000286|4505|0000286|AUHH780818R35|AGUILA,HERNANDEZ/HUGO LENIN|2|00000000000000000000|AUHH780818HMNGRG06|0015850014660102|012180015850014660|02|40012|VIRGINIA FABREGAS|31|B D32|JORGE NEGRETE|07280|09005|09S0000000|G004|S00|1202|CFO2003|09017|2|3|01|0002|07|20170316|20200501|8|3|0|20200701|20201231|1| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(447, 'Revisión', 'CARAVANAS', '3', ' 4008611963', '4008', 'DGP4064', 'FOAA940630DX3', 'FLORES', 'ARZOLA', 'ADRIX SABDI', '1', '00000000000000000000', 'FOAA940630HSPLRD00', '0065138576440102', '021580065138576445', '02', '40021', 'LERDO DE TEJADA', '705', '00000', 'LA GRANJA', '78716', '24020', '0961100019', 'S200', '611', '1204', ' M04012', '09015', '2', '3', '01', '0000', '09', '20201001', '20201001', '8', '3', '0', '20201001', '20201231', '1', 'H', '24', ' 40086119639|4008|DGP4064|FOAA940630DX3|FLORES,ARZOLA/ADRIX SABDI|1|00000000000000000000|FOAA940630HSPLRD00|0065138576440102|021580065138576445|02|40021|LERDO DE TEJADA|705|00000|LA GRANJA|78716|24020|0961100019|S200|611|1204| M04012|09015|2|3|01|0000|09|20201001|20201001|8|3|0|20201001|20201231|1|H|24| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(448, 'Revisión', 'CARAVANAS', '3', ' 4008611964', '4008', 'DGP4064', 'MUVG890317TF0', 'MUÑOZ', 'VERONICA', 'GIBRAN', '1', '00000000000000000000', 'MUVG890317HGRXRB09', '0065121890070102', '021260065121890076', '02', '40021', 'LOTE 9', 'MZA-X', '00000', 'REVOLUCION', '39097', '12029', '0961100012', 'S200', '611', '1204', ' M04012', '09015', '2', '3', '01', '0000', '09', '20201001', '20201001', '8', '3', '0', '20201001', '20201231', '1', 'H', '12', ' 40086119647|4008|DGP4064|MUVG890317TF0|MUÑOZ,VERONICA/GIBRAN|1|00000000000000000000|MUVG890317HGRXRB09|0065121890070102|021260065121890076|02|40021|LOTE 9|MZA-XVII|00000|REVOLUCION|39097|12029|0961100012|S200|611|1204| M04012|09015|2|3|01|0000|09|20201001|20201001|8|3|0|20201001|20201231|1|H|12| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(449, 'Revisión', 'CARAVANAS', '3', ' 4008611965', '4008', 'DGP4064', 'HELR910824HK1', 'HERRERA', 'LEYVA', 'ROSA MARIA', '1', '00000000000000000000', 'HELR910824MMSRYS06', '0065199444950102', '021542065199444952', '02', '40021', 'TEPALCINGO', '211', '00000', 'MORELOS', '62744', '17006', '096110017A', 'S200', '611', '1204', ' M04012', '09015', '2', '3', '01', '0000', '09', '20201001', '20201001', '8', '3', '0', '20201001', '20201231', '1', 'M', '17', ' 40086119650|4008|DGP4064|HELR910824HK1|HERRERA,LEYVA/ROSA MARIA|1|00000000000000000000|HELR910824MMSRYS06|0065199444950102|021542065199444952|02|40021|TEPALCINGO|211|00000|MORELOS|62744|17006|096110017A|S200|611|1204| M04012|09015|2|3|01|0000|09|20201001|20201001|8|3|0|20201001|20201231|1|M|17| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(450, 'Revisión', 'CARAVANAS', '3', ' 4008611964', '4008', 'DGP4064', 'RODL920403GJ7', 'ROMAN', 'DOMINGUEZ', 'LUIS ANTONIO', '1', '00000000000000000000', 'RODL920403HPLMMS06', '0065130055740102', '021650065130055742', '02', '40021', 'AV. IGNACIO ZARAGOZA', '432', '00000', 'SAN BALTAZAR CAMPECH', '72550', '21114', '0961100021', 'S200', '611', '1204', ' M04012', '09015', '2', '3', '01', '0000', '09', '20201001', '20201001', '8', '3', '0', '20201001', '20201231', '1', 'H', '21', ' 40086119640|4008|DGP4064|RODL920403GJ7|ROMAN,DOMINGUEZ/LUIS ANTONIO|1|00000000000000000000|RODL920403HPLMMS06|0065130055740102|021650065130055742|02|40021|AV. IGNACIO ZARAGOZA|432|00000|SAN BALTAZAR CAMPECH|72550|21114|0961100021|S200|611|1204| M04012|09015|2|3|01|0000|09|20201001|20201001|8|3|0|20201001|20201231|1|H|21| \r', '2019', 'velazquez', '2020-10-02', '', ''),
(451, 'Revisión', 'CARAVANAS', '3', ' 4008611964', '4008', 'DGP4064', 'RODL920403GJ7', 'ROMAN', 'DOMINGUEZ', 'LUIS ANTONIO', '1', '00000000000000000000', 'RODL920403HPLMMS06', '0065130055740102', '021650065130055742', '02', '40021', 'AV. IGNACIO ZARAGOZA', '432', '00000', 'SAN BALTAZAR CAMPECH', '72550', '21114', '0961100021', 'S200', '611', '1204', ' M04012', '09015', '2', '3', '01', '0000', '09', '20201001', '20201001', '8', '3', '0', '20201001', '20201231', '1', 'H', '21', ' 40086119640|4008|DGP4064|RODL920403GJ7|ROMAN,DOMINGUEZ/LUIS ANTONIO|1|00000000000000000000|RODL920403HPLMMS06|0065130055740102|021650065130055742|02|40021|AV. IGNACIO ZARAGOZA|432|00000|SAN BALTAZAR CAMPECH|72550|21114|0961100021|S200|611|1204| M04012|09015|2|3|01|0000|09|20201001|20201001|8|3|0|20201001|20201231|1|H|21| \r', '2019', 'velazquez', '2020-10-02', '', '');

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
  MODIFY `id_movimiento_qr` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
