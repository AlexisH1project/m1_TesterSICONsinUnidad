-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 20:10:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

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
-- Estructura de tabla para la tabla `ct_documentos_qr`
--

CREATE TABLE `ct_documentos_qr` (
  `id_docqr` int(11) NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `documentos` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ct_documentos_qr`
--

INSERT INTO `ct_documentos_qr` (`id_docqr`, `nombre_documento`, `documentos`) VALUES
(1, 'Acta de Nacimiento', 'ACTA'),
(2, 'Estado de Cuenta Bancaria', 'BAN'),
(3, 'Designación de Beneficiarios de Sueldos y/o Prestaciones Devengadas No Cobradas', 'BEN_NDV'),
(4, 'Copia del Certificado o Cédula Profesional; en su caso. (Cuando se Presente Cédula Profesional; deberá agregarse la consulta realizada a través de internet en la página del registro Nacional de Profesionistas de la SEP). ', 'CED'),
(5, 'Copia de Constancia Máxima de Estudios', 'CONS'),
(6, 'Clave Única de Registro de Población (CURP)', 'CURP'),
(7, 'Comprobante de Cursos de capacitación; en su caso.', 'CURSO'),
(8, 'Original de Currículum Vitae; firmado por el interesado (En el reverso del CV; deberá asentarse la leyenda que haga constar la verificación realizada sobre las referencias laborales; realizadas por el área contratante).', 'CV'),
(9, 'Dictamen', 'DICT'),
(10, 'Comprobante de Domicilio  Agua () Luz () Teléfono Fijo ()', 'DOM'),
(11, 'Formato de Movimientos de Personal', 'FMP'),
(12, 'Documento de Identificación Oficial Credencial para votar del INE  () Pasaporte vigente ()  Cédula Profesional ()', 'IDE'),
(13, 'Manifiesto por escrito de la Inexistencia de Situación o Supuesto que pudiera generar Conflicto de Intereses.', 'INEX'),
(14, 'Manifiesto por escrito que no es parte en algún juicio de cualquier naturaleza en contra de la Secretaría de Salud u otra Institución', 'MANIF'),
(15, 'Manifiesto por escrito que no desempeña otro empleo; cargo o comisión de la Administración Pública Federal y en caso contrario que cuenta con el dictamen de compatibilidad de empleos respectivo', 'N_EMP'),
(16, 'Constancia de NO inhabilitación para el desempeño del empleo; cargo o comisión', 'N_INHAB'),
(17, 'Carta protesta de decir verdad en la que el interesado manifieste que todos los documentos originales y copias son fidedignos', 'N_JUI'),
(18, 'PERF', 'PERF'),
(19, 'Registro Federal de Contribuyentes (R.F.C.) ', 'RFC'),
(20, 'Seguros', 'SEG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ct_documentos_qr`
--
ALTER TABLE `ct_documentos_qr`
  ADD PRIMARY KEY (`id_docqr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ct_documentos_qr`
--
ALTER TABLE `ct_documentos_qr`
  MODIFY `id_docqr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
