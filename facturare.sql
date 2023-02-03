-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: szamlazo
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chitante`
--

DROP TABLE IF EXISTS `chitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitante` (
  `serie_chit` varchar(1) DEFAULT NULL,
  `nr_chit` smallint(4) unsigned zerofill DEFAULT NULL,
  `data_chit` date DEFAULT NULL,
  `val_chit` decimal(12,2) DEFAULT NULL,
  `serie_factura` char(1) DEFAULT NULL,
  `numar_factura` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitante`
--

LOCK TABLES `chitante` WRITE;
/*!40000 ALTER TABLE `chitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cine_sunt`
--

DROP TABLE IF EXISTS `cine_sunt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cine_sunt` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(65) NOT NULL,
  `reg_com` varchar(15) DEFAULT NULL,
  `tva` varchar(5) DEFAULT NULL,
  `cif` varchar(20) DEFAULT NULL,
  `adresa` varchar(150) DEFAULT NULL,
  `banca` varchar(45) NOT NULL,
  `cont_bancar` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cine_sunt`
--

LOCK TABLES `cine_sunt` WRITE;
/*!40000 ALTER TABLE `cine_sunt` DISABLE KEYS */;
/*!40000 ALTER TABLE `cine_sunt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clienti` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(65) NOT NULL,
  `reg_com` varchar(15) DEFAULT NULL,
  `tva` varchar(5) DEFAULT NULL,
  `cif` varchar(20) DEFAULT NULL,
  `adresa` varchar(150) DEFAULT NULL,
  `banca` varchar(45) NOT NULL,
  `cont_bancar` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturi`
--

DROP TABLE IF EXISTS `facturi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serie` varchar(1) DEFAULT NULL,
  `numar_factura` smallint(4) unsigned zerofill DEFAULT NULL,
  `aviz` varchar(8) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `nume` varchar(65) DEFAULT NULL,
  `nr_crt` smallint(2) DEFAULT NULL,
  `prod` varchar(100) DEFAULT NULL,
  `um` varchar(5) DEFAULT NULL,
  `cant` decimal(10,2) DEFAULT NULL,
  `pret` decimal(10,2) DEFAULT NULL,
  `valoare` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturi`
--

LOCK TABLES `facturi` WRITE;
/*!40000 ALTER TABLE `facturi` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-03 11:35:13
