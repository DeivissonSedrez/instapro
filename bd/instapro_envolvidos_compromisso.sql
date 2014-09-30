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
-- Table structure for table `envolvidos_compromisso`
--

DROP TABLE IF EXISTS `envolvidos_compromisso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envolvidos_compromisso` (
  `id` bigint(20) NOT NULL COMMENT 'Um compromisso pode ter mais de um envolvido, que pode ser solicitante, responsavel, participante ou os três, então cada envolvido sera flagado true ou false pro tipo que ele for nessa tabela',
  `id_compromisso` bigint(20) NOT NULL,
  `id_pessoa` bigint(20) unsigned NOT NULL,
  `solicitante` tinyint(1) DEFAULT NULL,
  `responsavel` tinyint(1) DEFAULT NULL,
  `participante` tinyint(1) DEFAULT NULL,
  `permissao_cumprir` tinyint(1) DEFAULT NULL,
  `permissao_andamentos` tinyint(1) DEFAULT NULL,
  `permissao_total` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_envolvido_pessoa_idx` (`id_pessoa`),
  KEY `FK_envolvido_compromisso_idx` (`id_compromisso`),
  CONSTRAINT `FK_envolvido_compromisso` FOREIGN KEY (`id_compromisso`) REFERENCES `compromissos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_envolvido_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envolvidos_compromisso`
--

LOCK TABLES `envolvidos_compromisso` WRITE;
/*!40000 ALTER TABLE `envolvidos_compromisso` DISABLE KEYS */;
/*!40000 ALTER TABLE `envolvidos_compromisso` ENABLE KEYS */;
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
