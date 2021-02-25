-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2021 a las 21:31:57
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
-- Estructura de tabla para la tabla `m1ct_documentos`
--

CREATE TABLE `m1ct_documentos` (
  `id_doc` int(11) NOT NULL,
  `nombre_documento` varchar(265) COLLATE utf8_spanish_ci NOT NULL,
  `documentos` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `m1ct_documentos`
--

INSERT INTO `m1ct_documentos` (`id_doc`, `nombre_documento`, `documentos`) VALUES
(0, 'Formato de Movimientos de Personal', 'doc74'),
(1, 'Documento de Identificación Oficial Credencial para votar del INE  () Pasaporte vigente ()  Cédula Profesional ()', 'doc1'),
(2, 'Acta de Nacimiento', 'doc2'),
(3, 'Registro Federal de Contribuyentes (R.F.C.) ', 'doc3'),
(4, 'Clave Única de Registro de Población (CURP)', 'doc4'),
(5, 'Comprobante de Domicilio  Agua () Luz () Teléfono Fijo ()', 'doc5'),
(6, 'Copia de Constancia Máxima de Estudios', 'doc6'),
(7, 'Comprobante de Cursos de capacitación; en su caso.', 'doc7'),
(8, 'Original de Currículum Vitae; firmado por el interesado (En el reverso del CV; deberá asentarse la leyenda que haga constar la verificación realizada sobre las referencias laborales; realizadas por el área contratante).', 'doc8'),
(9, 'Copia del Certificado o Cédula Profesional; en su caso. (Cuando se Presente Cédula Profesional; deberá agregarse la consulta realizada a través de internet en la página del registro Nacional de Profesionistas de la SEP).', 'doc9'),
(10, 'Original del Dictamen de Evaluación Rama Médica; Paramédica y Afín  ()', 'doc10'),
(11, 'Nombramiento por Art. 34  ()  Acta de Ganador de Concurso ()', 'doc11'),
(12, 'Manifiesto por escrito de la Inexistencia de Situación o Supuesto que pudiera generar Conflicto de Intereses.', 'doc12'),
(13, 'Manifiesto por escrito que no es parte en algún juicio de cualquier naturaleza en contra de la Secretaría de Salud u otra Institución', 'doc13'),
(14, 'Manifiesto por escrito que no desempeña otro empleo; cargo o comisión de la Administración Pública Federal y en caso contrario que cuenta con el dictamen de compatibilidad de empleos respectivo', 'doc14'),
(15, 'Constancia de NO inhabilitación para el desempeño del empleo; cargo o comisión', 'doc15'),
(16, 'Carta protesta de decir verdad en la que el interesado manifieste que todos los documentos originales y copias son fidedignos', 'doc16'),
(17, 'Cuenta Bancaria a 18 dígitos.', 'doc17'),
(18 , 'Justificación (en su caso) para la ocupación de la plaza.', 'doc18'),
(19 , 'Aviso de declaración Inicial y/o Declaratoria de Cumplimiento de Obligaciones.', 'doc19'),
(20 , 'Antecedente de la plaza', 'doc20'),
(21, 'Último talón de Pago', 'doc21'),
(22, 'Acta de Escalafón', 'doc23'),
(23, 'Oficio de Autorización de la DGRHO', 'doc45'),
(24, 'Autorización de la DIPSP.', 'doc46'),
(25, 'Checklist con detalle de documentos entregados por la Unidad.', 'doc61'),
(26, 'Autorización de la DIPSP.', 'doc63'),
(27, 'Constancia de Hoja de Servicios en original y copia.', 'doc66'),
(28, 'Seguros', 'doc71'),
(29, 'Expediente Completo', 'doc67'),
(30, 'Expediente Completo con loteo', 'doc68'),
(31, 'Seguros', 'doc71'),
(32, 'Oficio de solicitud para ingreso de movimientos', 'doc72'),
(33, 'Otros', 'doc73'),
(34, 'Designación de Beneficiario', 'doc75'),
(35, 'Fomope Loteado y Firmado', 'doc76'),
(36, 'Oficio Sellado', 'doc77'),
(37, 'Oficio de Solicitud Para Ingreso de Movimiento', 'doc78'),
(38, 'Acuse de Archivo', 'doc79'),
(39, 'Acuse de Fomope Operado a la Unidad', 'doc80'),
(40, 'Acuse de Fomope en Validación de Personal', 'doc81');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `m1ct_documentos`
--
ALTER TABLE `m1ct_documentos`
  ADD PRIMARY KEY (`id_doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `m1ct_documentos`
--
ALTER TABLE `m1ct_documentos`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
