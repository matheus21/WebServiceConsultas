/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 10.1.21-MariaDB : Database - consultas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`consultas` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `consultas`;

/*Table structure for table `consultas` */

DROP TABLE IF EXISTS `consultas`;

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `situacao_id` int(1) DEFAULT '1' COMMENT '1 = Agendado / 2 = Confirmado / 3 = Aguardando cancelamento / 4 = Cancelada',
  PRIMARY KEY (`id`),
  KEY `cpf_paciente` (`paciente_id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`situacao_id`) REFERENCES `situacao_consultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `consultas` */

insert  into `consultas`(`id`,`paciente_id`,`data`,`hora`,`situacao_id`) values (41,6,'2017-07-12','17:25:00',1),(42,6,'2017-07-11','20:30:00',3),(43,7,'2017-07-12','17:25:00',4),(44,7,'2017-07-11','17:00:00',1),(45,7,'2017-08-07','15:18:00',1);

/*Table structure for table `pacientes` */

DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cns` varchar(15) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `acessou` int(1) DEFAULT '2' COMMENT '1 = Primeiro Acesso / 2 = ja acessou',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pacientes` */

insert  into `pacientes`(`id`,`nome`,`cpf`,`cns`,`senha`,`email`,`telefone`,`acessou`) values (6,'Matheus','04431824189','701008848036999','12345','matheusoliveira21@live.com','33639612',1),(7,'Teste','12345612300','1234567','12345','teste@mail.com','33639612',1);

/*Table structure for table `situacao_consultas` */

DROP TABLE IF EXISTS `situacao_consultas`;

CREATE TABLE `situacao_consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `situacao_consultas` */

insert  into `situacao_consultas`(`id`,`nome`) values (1,'Solicitado'),(2,'Confirmado'),(3,'Aguardando Cancelamento'),(4,'Cancelado');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
