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
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` bigint(20) unsigned NOT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `ctps_num` int(14) DEFAULT NULL,
  `ctps_serie` int(5) DEFAULT NULL,
  `oab` int(10) DEFAULT NULL,
  `tratamento` varchar(20) DEFAULT NULL,
  `estado_civil` int(2) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL,
  `rg` int(10) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `titulo_eleitor` int(14) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pessoa_fisica` (`id_pessoa`),
  CONSTRAINT `FK_pessoa_fisica` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` VALUES (1,3,'M',NULL,NULL,NULL,'sr.',0,'0000-00-00','Brasileiro',107,11766,NULL),(2,4,'M',2147483647,124,NULL,'Sr.',0,'0000-00-00','Brasileiro',NULL,11766,NULL),(3,5,'M',NULL,NULL,NULL,'sro',0,NULL,'',NULL,123456,NULL),(4,6,'M',NULL,NULL,NULL,'sro',0,NULL,'',NULL,123456,NULL),(5,7,'M',NULL,NULL,NULL,'sro',0,NULL,'',NULL,123456,NULL);
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-29 19:26:57
