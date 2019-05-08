# Host: localhost  (Version: 5.6.21)
# Date: 2015-08-12 20:10:40
# Generator: MySQL-Front 5.3  (Build 4.198)

/*!40101 SET NAMES latin1 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_solicitudes"
#

INSERT INTO `tb_solicitudes` VALUES (1,9,1040),(2,9,1011),(3,12,1040);

#
# Structure for table "tb_trabajos_actuales"
#

DROP TABLE IF EXISTS `tb_trabajos_actuales`;
CREATE TABLE `tb_trabajos_actuales` (
  `id_trab` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_trab`)
) ENGINE=InnoDB AUTO_INCREMENT=1042 DEFAULT CHARSET=latin1;

#
# Data for table "tb_trabajos_actuales"
#

INSERT INTO `tb_trabajos_actuales` VALUES (1005,5,'8','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de ','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de',12,123,123,'12',4),(1006,1,'16','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de ','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.',123,22,123,'1122',0),(1007,1,'14','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de','1','1','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ',123,123,123,'1122',0),(1008,1,'9','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de ','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ',123,123,123,'1122',0),(1009,1,'8','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ',123,22,123,'1122',1),(1010,1,'6','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. ',123,12,123,'1122',4),(1011,7,'12','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de ','0','0','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar',123,123,123,'1122',0),(1012,2,'8','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','11Lorem Ipsum es simplemente el texto de ','1','2','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trabLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sidobse_trab',123,1232,152,'12',1),(1013,10,'5','','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería d','1','1','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p',1,124,124,'12',9),(1040,5,'14','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ','2','1','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido ',0,0,0,'',0),(1041,0,'6','fwe4fw4t','tet4e4t','0','0','',0,0,0,'',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "tb_usuarios"
#

INSERT INTO `tb_usuarios` VALUES (1,'Daniel','Mejia','18190473','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',1),(3,'DanielS','Simki','12222222','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',1),(4,'Daviana','Master','12345678','mejia@jirehpro.com','04249353937','04249353937','eb0a191797624dd3a48fa681d3061212',1),(9,'Usuario','','18190473','mejia@jirehpro.com','04241930146','04249353937','eb0a191797624dd3a48fa681d3061212',2),(12,'Prueba','','','','','','eb0a191797624dd3a48fa681d3061212',2);

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

INSERT INTO `tb_vizualizacion_oferta` VALUES (15,'9',1011),(16,'9',1040),(16,'12',1040);
