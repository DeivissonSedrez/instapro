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
-- Table structure for table `pessoa_contato`
--

DROP TABLE IF EXISTS `pessoa_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_contato` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` bigint(20) unsigned NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `id_cidade` bigint(20) unsigned DEFAULT NULL,
  `id_estado` bigint(20) unsigned DEFAULT NULL,
  `id_pais` bigint(20) unsigned DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone_1` int(10) DEFAULT NULL,
  `tipo_tel_1` varchar(50) DEFAULT NULL,
  `telefone_2` int(10) DEFAULT NULL,
  `tipo_tel_2` varchar(50) DEFAULT NULL,
  `telefone_3` int(10) DEFAULT NULL,
  `tipo_tel_3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pessoa_contato` (`id_pessoa`),
  CONSTRAINT `FK_pessoa_contato` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_contato`
--

LOCK TABLES `pessoa_contato` WRITE;
/*!40000 ALTER TABLE `pessoa_contato` DISABLE KEYS */;
INSERT INTO `pessoa_contato` VALUES (1,3,'Rua comendador Rheingantz 299','apto 101','',7777,23,33,NULL,'',NULL,'',NULL,'',NULL,''),(2,4,'Rua dos Andradas 343','apto 810','centro historico',7777,23,33,90200,'joao@joao.com.br',0,'celular',NULL,'',NULL,''),(3,5,'','','',1,1,33,NULL,'',NULL,'',NULL,'',NULL,''),(4,6,'','','',1,1,33,NULL,'',NULL,'',NULL,'',NULL,''),(5,7,'','','',1,1,33,NULL,'',NULL,'',NULL,'',NULL,'');
/*!40000 ALTER TABLE `pessoa_contato` ENABLE KEYS */;
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
