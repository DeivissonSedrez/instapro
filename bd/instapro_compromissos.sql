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
-- Table structure for table `compromissos`
--

DROP TABLE IF EXISTS `compromissos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compromissos` (
  `id` bigint(20) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_tipo_compromisso` int(11) DEFAULT NULL,
  `id_sub_tipocompromisso` int(11) DEFAULT NULL,
  `data_criacao` varchar(45) DEFAULT NULL,
  `compromissoscol` varchar(45) DEFAULT NULL,
  `id_processo` bigint(20) DEFAULT NULL,
  `id_criador` bigint(20) unsigned DEFAULT NULL,
  `id_responsavel` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_processo_compromisso_idx` (`id_processo`),
  KEY `FK_tipo_compromisso_idx` (`id_tipo_compromisso`),
  KEY `FK_subtipo_compromisso_idx` (`id_sub_tipocompromisso`),
  KEY `FK_status_compromisso_idx` (`id_status`),
  KEY `FK_criador_compromisso_idx` (`id_criador`),
  KEY `FK_responsavel_compromisso_idx` (`id_responsavel`),
  CONSTRAINT `FK_criador_compromisso` FOREIGN KEY (`id_criador`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_processo_compromisso` FOREIGN KEY (`id_processo`) REFERENCES `processos` (`idprocessos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_responsavel_compromisso` FOREIGN KEY (`id_responsavel`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_status_compromisso` FOREIGN KEY (`id_status`) REFERENCES `compromisso_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_subtipo_compromisso` FOREIGN KEY (`id_sub_tipocompromisso`) REFERENCES `subtipo_compromisso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tipo_compromisso` FOREIGN KEY (`id_tipo_compromisso`) REFERENCES `tipo_compromisso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compromissos`
--

LOCK TABLES `compromissos` WRITE;
/*!40000 ALTER TABLE `compromissos` DISABLE KEYS */;
/*!40000 ALTER TABLE `compromissos` ENABLE KEYS */;
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
