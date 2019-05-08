-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2015 a las 22:34:06
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cuentas_claras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_oferta_trabajo`
--

CREATE TABLE IF NOT EXISTS `tb_oferta_trabajo` (
`id_ofer` int(11) NOT NULL,
  `fkid_prio` int(11) NOT NULL DEFAULT '0',
  `fkid_requ` varchar(500) NOT NULL DEFAULT '',
  `proy_ofer` varchar(250) NOT NULL DEFAULT '',
  `trab_ofer` varchar(1000) NOT NULL DEFAULT '',
  `form_ofer` varchar(20) NOT NULL DEFAULT '',
  `moda_ofer` varchar(20) NOT NULL DEFAULT '',
  `obse_ofer` varchar(500) NOT NULL DEFAULT '',
  `cant_ofer` int(10) NOT NULL DEFAULT '0',
  `mont_bsf_ofer` int(10) NOT NULL DEFAULT '0',
  `tota_vef_ofer` int(10) NOT NULL DEFAULT '0',
  `tiem_esti_ofer` varchar(250) NOT NULL DEFAULT '',
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_oferta_trabajo`
--

INSERT INTO `tb_oferta_trabajo` (`id_ofer`, `fkid_prio`, `fkid_requ`, `proy_ofer`, `trab_ofer`, `form_ofer`, `moda_ofer`, `obse_ofer`, `cant_ofer`, `mont_bsf_ofer`, `tota_vef_ofer`, `tiem_esti_ofer`, `id_usuario`) VALUES
(2, 10, '16', '', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', '1', '0', '', 1, 21, 21, '', 9),
(3, 9, '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería d', '2', '1', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 2, 23, 46, '12', 0),
(4, 1, '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', '1', '1', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 6, 6, 36, '396.00', 0),
(5, 2, '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 24, 2, 48, '112', 0),
(6, 5, '1', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', '1', '2', '', 3, 3, 9, '', 9),
(8, 7, '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', '0', '0', '', 1, 5458, 5458, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prioridad`
--

CREATE TABLE IF NOT EXISTS `tb_prioridad` (
`id_prio` int(11) NOT NULL,
  `desc_prio` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_prioridad`
--

INSERT INTO `tb_prioridad` (`id_prio`, `desc_prio`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_requerimientos`
--

CREATE TABLE IF NOT EXISTS `tb_requerimientos` (
`id_requ` int(11) NOT NULL,
  `desc_requ` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_requerimientos`
--

INSERT INTO `tb_requerimientos` (`id_requ`, `desc_requ`) VALUES
(1, 'Management'),
(2, 'Programación'),
(3, 'Programación Android'),
(4, 'Programación iOs'),
(5, 'Página Web'),
(6, 'Estudio/ Research'),
(7, 'Redes Sociales'),
(8, 'Consultoría'),
(9, 'Levantamiento Información'),
(10, 'Cultural'),
(11, 'UX'),
(12, 'Otros\r\n'),
(13, 'Manejo Base de Datos'),
(14, 'Diseño '),
(15, 'Constante'),
(16, 'Comunicación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE IF NOT EXISTS `tb_roles` (
`id_rol` int(11) NOT NULL,
  `desc_rol` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `desc_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
`id_status` int(10) NOT NULL,
  `desc_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `desc_status`) VALUES
(1, 'Asignado'),
(2, 'No Asignado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_trabajos_actuales`
--

CREATE TABLE IF NOT EXISTS `tb_trabajos_actuales` (
`id_trab` int(11) NOT NULL,
  `fkid_prio` int(11) NOT NULL,
  `fkid_requ` varchar(500) NOT NULL DEFAULT '',
  `proy_trab` varchar(250) NOT NULL,
  `trab_trab` varchar(1000) NOT NULL,
  `form_trab` varchar(20) NOT NULL,
  `moda_trab` varchar(20) NOT NULL,
  `obse_trab` varchar(500) NOT NULL,
  `cant_trab` int(10) NOT NULL,
  `mont_bsf_trab` int(10) NOT NULL,
  `tota_vef_trab` int(10) NOT NULL DEFAULT '0',
  `tiem_esti_trab` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fkid_status` int(10) DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=1043 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_trabajos_actuales`
--

INSERT INTO `tb_trabajos_actuales` (`id_trab`, `fkid_prio`, `fkid_requ`, `proy_trab`, `trab_trab`, `form_trab`, `moda_trab`, `obse_trab`, `cant_trab`, `mont_bsf_trab`, `tota_vef_trab`, `tiem_esti_trab`, `id_usuario`, `fkid_status`) VALUES
(1005, 5, '8', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de ', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de', 12, 123, 123, '12', 0, 2),
(1006, 1, '16', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de ', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.', 123, 22, 123, '1122', 0, 2),
(1007, 1, '14', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ', 123, 123, 123, '1122', 0, 2),
(1008, 1, '9', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de ', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ', 123, 123, 123, '1122', 0, 2),
(1009, 1, '8', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ', 123, 22, 123, '1122', 1, 1),
(1010, 1, '6', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ', 123, 12, 123, '1122', 4, 1),
(1011, 7, '12', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de ', '0', '0', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar', 123, 123, 123, '1122', 0, 2),
(1012, 2, '8', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', '11Lorem Ipsum es simplemente el texto de ', '1', '2', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trab', 123, 1232, 152, '12', 0, 2),
(1013, 10, '5', '', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería d', '1', '1', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 1, 124, 124, '12', 9, 1),
(1039, 3, '3', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería d', '1', '1', '34', 1, 5054, 5054, '2 semanas', 9, 1),
(1040, 10, '5', 'hola', '', '', '', '', 0, 0, 0, '', 0, 2),
(1041, 10, '1', 'Proyecto:', 'Trabajo:', '1', '2', '', 0, 0, 0, '', 0, 2),
(1042, 6, '6', '', '', '2', '2', '', 0, 0, 0, '', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
`id_usuario` int(11) NOT NULL,
  `nomb_usuario` varchar(250) NOT NULL,
  `apel_usuario` varchar(250) NOT NULL,
  `cedu_usuario` varchar(20) NOT NULL,
  `corr_usuario` varchar(100) NOT NULL,
  `tele_usuario` varchar(20) NOT NULL,
  `tele_opci_usuario` varchar(20) NOT NULL,
  `pass_usuario` varchar(250) NOT NULL,
  `id_rol` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nomb_usuario`, `apel_usuario`, `cedu_usuario`, `corr_usuario`, `tele_usuario`, `tele_opci_usuario`, `pass_usuario`, `id_rol`) VALUES
(1, 'Daniel', 'Mejia', '18190473', 'mejia@jirehpro.com', '04241930146', '04249353937', 'eb0a191797624dd3a48fa681d3061212', 1),
(3, 'DanielS', 'Simki', '12222222', 'mejia@jirehpro.com', '04241930146', '04249353937', 'eb0a191797624dd3a48fa681d3061212', 1),
(4, 'Daviana', 'Master', '12345678', 'mejia@jirehpro.com', '04249353937', '04249353937', 'eb0a191797624dd3a48fa681d3061212', 1),
(9, 'Usuario', '', '18190473', 'mejia@jirehpro.com', '04241930146', '04249353937', 'eb0a191797624dd3a48fa681d3061212', 2),
(12, 'Prueba', '', '', '', '', '', 'eb0a191797624dd3a48fa681d3061212', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_oferta_trabajo`
--
ALTER TABLE `tb_oferta_trabajo`
 ADD PRIMARY KEY (`id_ofer`);

--
-- Indices de la tabla `tb_prioridad`
--
ALTER TABLE `tb_prioridad`
 ADD PRIMARY KEY (`id_prio`);

--
-- Indices de la tabla `tb_requerimientos`
--
ALTER TABLE `tb_requerimientos`
 ADD PRIMARY KEY (`id_requ`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_status`
--
ALTER TABLE `tb_status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `tb_trabajos_actuales`
--
ALTER TABLE `tb_trabajos_actuales`
 ADD PRIMARY KEY (`id_trab`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_oferta_trabajo`
--
ALTER TABLE `tb_oferta_trabajo`
MODIFY `id_ofer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_prioridad`
--
ALTER TABLE `tb_prioridad`
MODIFY `id_prio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tb_requerimientos`
--
ALTER TABLE `tb_requerimientos`
MODIFY `id_requ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_status`
--
ALTER TABLE `tb_status`
MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_trabajos_actuales`
--
ALTER TABLE `tb_trabajos_actuales`
MODIFY `id_trab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1043;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
