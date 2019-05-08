# Host: localhost  (Version: 5.6.21)
# Date: 2015-10-06 23:08:05
# Generator: MySQL-Front 5.3  (Build 4.198)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "tb_asignacion_trabajos_actuales"
#

DROP TABLE IF EXISTS `tb_asignacion_trabajos_actuales`;
CREATE TABLE `tb_asignacion_trabajos_actuales` (
  `id_asig` int(11) DEFAULT NULL,
  `fkid_usuario` int(11) DEFAULT NULL,
  `fkid_trab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_asignacion_trabajos_actuales"
#


#
# Structure for table "tb_pagos"
#

DROP TABLE IF EXISTS `tb_pagos`;
CREATE TABLE `tb_pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `fkid_usuario` int(11) NOT NULL DEFAULT '0',
  `fkid_trab` int(11) NOT NULL DEFAULT '0',
  `fecha_desde` varchar(100) DEFAULT NULL,
  `fecha_hasta` varchar(100) DEFAULT NULL,
  `monto_depo` int(11) NOT NULL DEFAULT '0',
  `nume_depo` int(11) NOT NULL DEFAULT '0',
  `img_depo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_pagos"
#


#
# Structure for table "tb_prioridad"
#

DROP TABLE IF EXISTS `tb_prioridad`;
CREATE TABLE `tb_prioridad` (
  `id_prio` int(11) NOT NULL AUTO_INCREMENT,
  `desc_prio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "tb_prioridad"
#

INSERT INTO `tb_prioridad` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10');

#
# Structure for table "tb_requerimientos"
#

DROP TABLE IF EXISTS `tb_requerimientos`;
CREATE TABLE `tb_requerimientos` (
  `id_requ` int(11) NOT NULL AUTO_INCREMENT,
  `desc_requ` varchar(250) NOT NULL,
  PRIMARY KEY (`id_requ`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "tb_requerimientos"
#

INSERT INTO `tb_requerimientos` VALUES (1,'Management'),(2,'Programación'),(3,'Programación Android'),(4,'Programación iOs'),(5,'Página Web'),(6,'Estudio/ Research'),(7,'Redes Sociales'),(8,'Consultoría'),(9,'Levantamiento Información'),(10,'Cultural'),(11,'UX'),(12,'Otros\r\n'),(13,'Manejo Base de Datos'),(14,'Diseño '),(15,'Constante'),(16,'Comunicación');

#
# Structure for table "tb_roles"
#

DROP TABLE IF EXISTS `tb_roles`;
CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `desc_rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tb_roles"
#

INSERT INTO `tb_roles` VALUES (1,'Administrador'),(2,'Usuario');

#
# Structure for table "tb_solicitudes"
#

DROP TABLE IF EXISTS `tb_solicitudes`;
CREATE TABLE `tb_solicitudes` (
  `id_soli` int(11) NOT NULL AUTO_INCREMENT,
  `fkid_usuario` int(11) DEFAULT NULL,
  `fkid_trab` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soli`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_solicitudes"
#


#
# Structure for table "tb_trabajos_actuales"
#

DROP TABLE IF EXISTS `tb_trabajos_actuales`;
CREATE TABLE `tb_trabajos_actuales` (
  `id_trab` int(11) NOT NULL AUTO_INCREMENT,
  `fkid_prio` int(11) NOT NULL,
  `fkid_requ` varchar(500) NOT NULL DEFAULT '',
  `proy_trab` varchar(1000) NOT NULL DEFAULT '',
  `trab_trab` varchar(1000) NOT NULL,
  `form_trab` varchar(20) NOT NULL,
  `moda_trab` varchar(20) NOT NULL,
  `obse_trab` varchar(1000) NOT NULL DEFAULT '',
  `cant_trab` int(10) NOT NULL,
  `mont_bsf_trab` int(10) NOT NULL,
  `tota_vef_trab` int(10) NOT NULL DEFAULT '0',
  `tiem_esti_trab` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_trab`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tb_trabajos_actuales"
#


#
# Structure for table "tb_usuarios"
#

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_usuario` varchar(250) NOT NULL,
  `apel_usuario` varchar(250) NOT NULL,
  `cedu_usuario` varchar(20) NOT NULL,
  `corr_usuario` varchar(100) NOT NULL,
  `tele_usuario` varchar(20) NOT NULL,
  `tele_opci_usuario` varchar(20) NOT NULL,
  `pass_usuario` varchar(250) NOT NULL,
  `id_rol` int(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tb_usuarios"
#

INSERT INTO `tb_usuarios` VALUES (1,'Daniel','Mejia','18190473','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',1),(3,'DanielS','Simki','12222222','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',1),(4,'Daviana','Master','12345678','mejia@jirehpro.com','04249353937','04249353937','eb0a191797624dd3a48fa681d3061212',1),(9,'Usuario','','18190473','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',2),(14,'Usuario2','','','','','','eb0a191797624dd3a48fa681d3061212',2);

#
# Structure for table "tb_vizualizacion_oferta"
#

DROP TABLE IF EXISTS `tb_vizualizacion_oferta`;
CREATE TABLE `tb_vizualizacion_oferta` (
  `id_visu` int(11) NOT NULL DEFAULT '0',
  `fkid_usuario` varchar(255) DEFAULT NULL,
  `fkid_trab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_vizualizacion_oferta"
#

