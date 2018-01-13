CREATE DATABASE IF NOT EXISTS reporte;

use reporte;

 CREATE TABLE `usuario` (
  `pk_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `a_paterno` varchar(100) NOT NULL,
  `a_materno` varchar(100) NULL,
  `id_otro_sistema` varchar(30) NULL,
  `nombre_otro_sistema` varchar(100) NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificación` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  `es_administrador` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_usuario`),
  UNIQUE KEY `correo` (`correo_electronico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `actividad` (
  `pk_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `descripcion_avance` text,
  `incidencia` varchar(15) DEFAULT NULL,
  `resumen_problematica` text,
  `solicito` varchar(200) DEFAULT NULL,
  `medio_solicitado` varchar(100) DEFAULT NULL,
  `editable` tinyint(4) DEFAULT '1',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `retraso` text,
  `finalizo` tinyint(4) NOT NULL DEFAULT '0',
  `porcentaje` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_actividad`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `actividad_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
  
  

CREATE TABLE `adjunto` (
  `pk_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `fk_actividad` int(11) NOT NULL,
  `archivo_binario` MEDIUMBLOB NOT NULL,
  `archivo_nombre` varchar(255) NOT NULL default '',
  `archivo_peso` varchar(15) NOT NULL default '',
  `archivo_tipo` varchar(25) NOT NULL default '',
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pk_adjunto`),
  KEY `fk_actividad` (`fk_actividad`),
  CONSTRAINT `adjunto_actividad` FOREIGN KEY (`fk_actividad`) REFERENCES `actividad` (`pk_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `catalogo_act` (
  `pk_catalogo_act` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(255) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pk_catalogo_act`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `hora_act` (
  `fk_actividad` int(11) NOT NULL,
  `fk_catalogo_act` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  KEY `fk_actividad` (`fk_actividad`),
  KEY `fk_catalogo_act` (`fk_catalogo_act`),
  CONSTRAINT `hora_act_actividad` FOREIGN KEY (`fk_actividad`) REFERENCES `actividad` (`pk_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hora_act_calatolo_act` FOREIGN KEY (`fk_catalogo_act`) REFERENCES `catalogo_act` (`pk_catalogo_act`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE USER 'reporte_actividad'@'localhost' IDENTIFIED BY 'm3d1c0S0ft';

GRANT ALL PRIVILEGES ON reporte.* TO 'reporte_actividad'@'localhost';

FLUSH PRIVILEGES;