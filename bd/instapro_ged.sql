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
-- Table structure for table `ged`
--

DROP TABLE IF EXISTS `ged`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ged` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) DEFAULT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_sub_tipo_documento` int(11) DEFAULT NULL,
  `versao` varchar(45) DEFAULT NULL,
  `inicio_vigencia` date DEFAULT NULL,
  `fim_vigencia` date DEFAULT NULL,
  `localizacao_fisica` varchar(45) DEFAULT NULL,
  `observacao` varchar(20) DEFAULT NULL,
  `palavras_chaves` varchar(200) DEFAULT NULL,
  `id_processo` bigint(20) DEFAULT NULL,
  `id_pessoa_upload` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docuemento_tipo_idx` (`id_tipo_documento`),
  KEY `FK_documento_processo_idx` (`id_processo`),
  KEY `FK_documento_pessoa_up_idx` (`id_pessoa_upload`),
  KEY `FK_documento_subtipo_idx` (`id_sub_tipo_documento`),
  CONSTRAINT `FK_docuemento_tipo` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_documento_subtipo` FOREIGN KEY (`id_sub_tipo_documento`) REFERENCES `sub_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_documento_processo` FOREIGN KEY (`id_processo`) REFERENCES `processos` (`idprocessos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_documento_pessoa_up` FOREIGN KEY (`id_pessoa_upload`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ged`
--

LOCK TABLES `ged` WRITE;
/*!40000 ALTER TABLE `ged` DISABLE KEYS */;
/*!40000 ALTER TABLE `ged` ENABLE KEYS */;
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
