CREATE DATABASE  IF NOT EXISTS `instapro` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `instapro`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: instapro
-- ------------------------------------------------------
-- Server version	5.5.8

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_acesso` int(2) unsigned NOT NULL,
  `tipo_pessoa` int(2) unsigned NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pessoas` (`tipo_acesso`),
  KEY `FK_pessoas_tipo` (`tipo_pessoa`),
  CONSTRAINT `FK_pessoas` FOREIGN KEY (`tipo_acesso`) REFERENCES `pessoa_acesso` (`id`),
  CONSTRAINT `FK_pessoas_tipo` FOREIGN KEY (`tipo_pessoa`) REFERENCES `pessoa_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Alejandro Schmechel',1,1,NULL,'alejandro',NULL),(2,'Deivisson Sedrez',1,1,NULL,'deivisson',NULL),(3,'Deivisson',1,1,'8eb1b363422156a9aa6c253580b51ac661cbcb9d6554b86cc809c7a3c490d719','deivisson.sedrez',NULL),(4,'Joao',1,1,'8eb1b363422156a9aa6c253580b51ac661cbcb9d6554b86cc809c7a3c490d719','joao',NULL),(5,'pedro',1,1,'bcc064aa787829cbcc5091dfb2f9457d9df88f292ed4f8dcb885a52cd74d71da','pedro',NULL),(6,'maria',1,1,'bcc064aa787829cbcc5091dfb2f9457d9df88f292ed4f8dcb885a52cd74d71da','maria',NULL),(7,'joao',1,1,'bcc064aa787829cbcc5091dfb2f9457d9df88f292ed4f8dcb885a52cd74d71da','joao',NULL);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-29 19:26:55
