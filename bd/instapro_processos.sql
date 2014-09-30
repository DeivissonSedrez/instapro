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
-- Table structure for table `processos`
--

DROP TABLE IF EXISTS `processos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processos` (
  `idprocessos` bigint(20) NOT NULL AUTO_INCREMENT,
  `pasta` varchar(50) DEFAULT NULL,
  `id_escritorio_origem` bigint(20) unsigned DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `id_cliente` bigint(20) unsigned DEFAULT NULL,
  `acao` varchar(45) DEFAULT NULL,
  `posicao_cliente` varchar(45) DEFAULT NULL,
  `natureza` varchar(45) DEFAULT NULL,
  `id_advogado_responsavel` bigint(20) unsigned DEFAULT NULL,
  `fase_processual` varchar(45) DEFAULT NULL,
  `id_parte_contraria` bigint(20) unsigned DEFAULT NULL,
  `numero_incial` varchar(45) DEFAULT NULL,
  `orgao_inicial` varchar(45) DEFAULT NULL,
  `numero_principal` varchar(45) DEFAULT NULL,
  `orgao_principal` varchar(45) DEFAULT NULL,
  `contrato_negociacao` varchar(45) DEFAULT NULL,
  `centro_custo` varchar(45) DEFAULT NULL,
  `risco` varchar(45) DEFAULT NULL,
  `data_distribuicao` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `data_decisao` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`idprocessos`),
  KEY `FK_escritorio_origem_idx` (`id_escritorio_origem`),
  KEY `FK_cliente_idx` (`id_cliente`),
  KEY `FK_advogado_responsavel_idx` (`id_advogado_responsavel`),
  KEY `FK_parte_contraria_idx` (`id_parte_contraria`),
  CONSTRAINT `FK_advogado_responsavel` FOREIGN KEY (`id_advogado_responsavel`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_escritorio_origem` FOREIGN KEY (`id_escritorio_origem`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_parte_contraria` FOREIGN KEY (`id_parte_contraria`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processos`
--

LOCK TABLES `processos` WRITE;
/*!40000 ALTER TABLE `processos` DISABLE KEYS */;
/*!40000 ALTER TABLE `processos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-29 19:26:56
