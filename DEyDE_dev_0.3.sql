-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2010 at 12:28 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

--
-- Database: `wcursosextdb`
-- user: wcursosextdbuser
-- password: apusonco
-- DEyDE_dev_0.3.sql
-- Comments: Base de datos de la aplicación DEyDE
-- Date: 2010-03-09
-- Version: 0.3

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL COMMENT 'Nombre del archivo con la imagen',
  `type` varchar(200) NOT NULL COMMENT 'Tipo del archivo',
  `size` int(11) NOT NULL COMMENT 'Tamaño en bytes del archivo',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de archivos de un curso';

--
-- Dumping data for table `archivos`
--


-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Áreas de estudio de los cursos';

--
-- Dumping data for table `areas`
--


-- --------------------------------------------------------

--
-- Table structure for table `area_cursos`
--

DROP TABLE IF EXISTS `area_cursos`;
CREATE TABLE `area_cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `area_id` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Áreas a las cuales pertenece un curso';

--
-- Dumping data for table `area_cursos`
--


-- --------------------------------------------------------

--
-- Table structure for table `ciudads`
--

DROP TABLE IF EXISTS `ciudads`;
CREATE TABLE `ciudads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_id` (`estado_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de ciudades por estado, provincia, departamento, etc.';

--
-- Dumping data for table `ciudads`
--


-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `tipo_curso_id` int(11) NOT NULL,
  `horas` varchar(3) NOT NULL DEFAULT '0',
  `instructor_id` int(11) NOT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `precio` double NOT NULL DEFAULT '0',
  `objetivo` mediumtext NOT NULL,
  `perfil` mediumtext NOT NULL,
  `temario` mediumtext NOT NULL,
  `imagen_logo` varchar(200) DEFAULT NULL COMMENT 'Imagen promocional del curso',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_limite_modif` date DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `campus` varchar(50) DEFAULT NULL,
  `edificio` varchar(25) DEFAULT NULL,
  `salon` varchar(10) DEFAULT NULL,
  `detalle_salon` varchar(150) DEFAULT NULL,
  `venta_solo_grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'Valida que el curso solo se ofrezca dentro de un programa, no individualmente. tinyint(1) - 0=NO 1=SI',
  `status_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_curso_id` (`tipo_curso_id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `vendedor_id` (`vendedor_id`),
  KEY `ciudad_id` (`ciudad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de cursos';

--
-- Dumping data for table `cursos`
--


-- --------------------------------------------------------

--
-- Table structure for table `cursos_relacionados`
--

DROP TABLE IF EXISTS `cursos_relacionados`;
CREATE TABLE `cursos_relacionados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `curso_rel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `curso_rel_id` (`curso_rel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de otros cursos relacionados con un curso en particula';

--
-- Dumping data for table `cursos_relacionados`
--


-- --------------------------------------------------------

--
-- Table structure for table `curso_participantes`
--

DROP TABLE IF EXISTS `curso_participantes`;
CREATE TABLE `curso_participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `participante_id` (`participante_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Relaciones entre cursos y sus participantes';

--
-- Dumping data for table `curso_participantes`
--


-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paise_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paise_id` (`paise_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de estados, provincias, departamentos, etc., de cada p';

--
-- Dumping data for table `estados`
--


-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de países donde se imparten los cursos';

--
-- Dumping data for table `paises`
--


-- --------------------------------------------------------

--
-- Table structure for table `participantes`
--

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE `participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(100) DEFAULT NULL,
  `grado_estudio` varchar(30) DEFAULT NULL,
  `exatec_matricula` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Información de los participantes (alumnos) de los cursos.';

--
-- Dumping data for table `participantes`
--


-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
CREATE TABLE `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(30) NOT NULL,
  `editar_status_id` int(11) NOT NULL,
  `borrar_status_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `editar_status_id` (`editar_status_id`),
  KEY `borrar_status_id` (`borrar_status_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de roles para usuarios';

--
-- Dumping data for table `rols`
--


-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elemento` varchar(10) NOT NULL,
  `clave` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de estados lógicos de los registros en la base de dato';

--
-- Dumping data for table `statuses`
--


-- --------------------------------------------------------

--
-- Table structure for table `tipo_cursos`
--

DROP TABLE IF EXISTS `tipo_cursos`;
CREATE TABLE `tipo_cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL COMMENT 'Nombre del archivo de la imagen',
  `type` varchar(200) NOT NULL COMMENT 'Tipo de archivo de la imagen',
  `size` int(11) NOT NULL COMMENT 'Tamaño en bytes del archivo de la imagen',
  `borrar_status_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `borrar_status_id` (`borrar_status_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lista de tipos de cursos';

--
-- Dumping data for table `tipo_cursos`
--


-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(80) NOT NULL,
  `password` char(40) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `correo_electronico` varchar(80) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `extension` varchar(8) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`),
  KEY `rol_id` (`rol_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Información general de los usuarios del sistema';

--
-- Dumping data for table `usuarios`
--
