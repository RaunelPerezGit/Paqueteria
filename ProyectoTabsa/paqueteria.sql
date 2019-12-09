-- MySQL dump 10.13  Distrib 5.6.35, for Win64 (x86_64)
--
-- Host: localhost    Database: paqueteria
-- ------------------------------------------------------
-- Server version	5.6.35-log

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `cve_adm` int(10) unsigned NOT NULL,
  `nom_adm` varchar(50) NOT NULL,
  `contra_adm` varchar(70) NOT NULL,
  PRIMARY KEY (`cve_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenidopaquete`
--

DROP TABLE IF EXISTS `contenidopaquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenidopaquete` (
  `cve_conpaq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `articulo_conpaq` varchar(40) NOT NULL,
  `cant_conpaq` int(10) unsigned NOT NULL,
  `valor_conpaq` float NOT NULL,
  `cve_paq` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_conpaq`),
  KEY `cve_paq` (`cve_paq`),
  CONSTRAINT `contenidopaquete_ibfk_1` FOREIGN KEY (`cve_paq`) REFERENCES `paquete` (`cve_paq`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenidopaquete`
--

LOCK TABLES `contenidopaquete` WRITE;
/*!40000 ALTER TABLE `contenidopaquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenidopaquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinatario`
--

DROP TABLE IF EXISTS `destinatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinatario` (
  `cve_dest` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_dest` varchar(45) NOT NULL,
  `ap_dest` varchar(100) NOT NULL,
  `tel_dest` varchar(15) NOT NULL,
  `cve_dir` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_dest`),
  KEY `cve_dir` (`cve_dir`),
  CONSTRAINT `destinatario_ibfk_1` FOREIGN KEY (`cve_dir`) REFERENCES `direccion` (`cve_dir`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinatario`
--

LOCK TABLES `destinatario` WRITE;
/*!40000 ALTER TABLE `destinatario` DISABLE KEYS */;
/*!40000 ALTER TABLE `destinatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `cve_dir` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `est_dir` varchar(45) NOT NULL,
  `ciu_dir` varchar(45) NOT NULL,
  `cpcod_dir` int(11) NOT NULL,
  `col_dir` varchar(45) NOT NULL,
  `calle_dir` varchar(45) NOT NULL,
  `ori_dir` varchar(45) NOT NULL,
  `num_dir` varchar(15) NOT NULL,
  PRIMARY KEY (`cve_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `num_fact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fech_fact` date NOT NULL,
  `numguia_fact` varchar(15) NOT NULL,
  `valorpaq_fact` float NOT NULL,
  `monto_fact` float NOT NULL,
  `statuspago_fact` varchar(25) DEFAULT NULL,
  `servicio_fact` varchar(45) NOT NULL,
  `tiposer_fact` varchar(45) NOT NULL,
  `tipopago_fact` varchar(30) DEFAULT NULL,
  `cve_rem` int(10) unsigned NOT NULL,
  `cve_dest` int(10) unsigned NOT NULL,
  `folio_listapaq` int(10) unsigned NOT NULL,
  PRIMARY KEY (`num_fact`),
  KEY `cve_rem` (`cve_rem`),
  KEY `cve_dest` (`cve_dest`),
  KEY `folio_listapaq` (`folio_listapaq`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cve_rem`) REFERENCES `remitente` (`cve_rem`),
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`cve_dest`) REFERENCES `destinatario` (`cve_dest`),
  CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`folio_listapaq`) REFERENCES `listapaquete` (`folio_listapaq`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listapaquete`
--

DROP TABLE IF EXISTS `listapaquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listapaquete` (
  `folio_listapaq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statusentrega_listapaq` varchar(25) NOT NULL,
  `cve_vehicon` int(10) unsigned NOT NULL,
  `cve_ruta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`folio_listapaq`),
  KEY `cve_vehicon` (`cve_vehicon`),
  KEY `cve_ruta` (`cve_ruta`),
  CONSTRAINT `listapaquete_ibfk_1` FOREIGN KEY (`cve_vehicon`) REFERENCES `vehiculoconductor` (`cve_vehicon`),
  CONSTRAINT `listapaquete_ibfk_2` FOREIGN KEY (`cve_ruta`) REFERENCES `ruta` (`cve_ruta`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listapaquete`
--

LOCK TABLES `listapaquete` WRITE;
/*!40000 ALTER TABLE `listapaquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `listapaquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete`
--

DROP TABLE IF EXISTS `paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete` (
  `cve_paq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `largo_paq` float unsigned NOT NULL,
  `alto_paq` float unsigned NOT NULL,
  `ancho_paq` float unsigned NOT NULL,
  `pes_paq` float unsigned NOT NULL,
  `status_paq` varchar(35) NOT NULL,
  `num_fact` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_paq`),
  KEY `num_fact` (`num_fact`),
  CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`num_fact`) REFERENCES `factura` (`num_fact`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete`
--

LOCK TABLES `paquete` WRITE;
/*!40000 ALTER TABLE `paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remitente`
--

DROP TABLE IF EXISTS `remitente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remitente` (
  `cve_rem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_rem` varchar(45) NOT NULL,
  `ap_rem` varchar(100) NOT NULL,
  `tel_rem` varchar(15) NOT NULL,
  `cve_dir` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_rem`),
  KEY `cve_dir` (`cve_dir`),
  CONSTRAINT `remitente_ibfk_1` FOREIGN KEY (`cve_dir`) REFERENCES `direccion` (`cve_dir`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remitente`
--

LOCK TABLES `remitente` WRITE;
/*!40000 ALTER TABLE `remitente` DISABLE KEYS */;
/*!40000 ALTER TABLE `remitente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `cve_ruta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_ruta` varchar(100) NOT NULL,
  `origen_ruta` varchar(50) NOT NULL,
  `destino_ruta` varchar(50) NOT NULL,
  PRIMARY KEY (`cve_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `cve_ser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_ser` varchar(45) NOT NULL,
  `desc_ser` longtext NOT NULL,
  PRIMARY KEY (`cve_ser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposervicio`
--

DROP TABLE IF EXISTS `tiposervicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervicio` (
  `num_tipser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_tipser` varchar(45) NOT NULL,
  `tiempoent_tipser` varchar(45) NOT NULL,
  `monto_tipser` float NOT NULL,
  `pkm_tipser` float NOT NULL,
  `cve_ser` int(10) unsigned NOT NULL,
  PRIMARY KEY (`num_tipser`),
  KEY `cve_ser` (`cve_ser`),
  CONSTRAINT `tiposervicio_ibfk_1` FOREIGN KEY (`cve_ser`) REFERENCES `servicio` (`cve_ser`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposervicio`
--

LOCK TABLES `tiposervicio` WRITE;
/*!40000 ALTER TABLE `tiposervicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposervicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `cve_tipusu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_tipusu` varchar(45) NOT NULL,
  `desc_tipusu` longtext NOT NULL,
  PRIMARY KEY (`cve_tipusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cve_usu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(45) NOT NULL,
  `ap_usu` varchar(50) NOT NULL,
  `correo_usu` varchar(45) NOT NULL,
  `tel_usu` varchar(10) NOT NULL,
  `pass_usu` varchar(70) NOT NULL,
  `cve_tipusu` int(10) unsigned NOT NULL,
  `cve_dir` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_usu`),
  KEY `cve_tipusu` (`cve_tipusu`),
  KEY `cve_dir` (`cve_dir`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cve_tipusu`) REFERENCES `tipousuario` (`cve_tipusu`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cve_dir`) REFERENCES `direccion` (`cve_dir`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `cve_vehi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelo_vehi` varchar(30) NOT NULL,
  `marca_vehi` varchar(30) NOT NULL,
  `placas` varchar(15) DEFAULT NULL,
  `capacidadvolu_vehi` float DEFAULT NULL,
  PRIMARY KEY (`cve_vehi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculoconductor`
--

DROP TABLE IF EXISTS `vehiculoconductor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculoconductor` (
  `cve_vehicon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cve_vehi` int(10) unsigned NOT NULL,
  `cve_usu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_vehicon`),
  KEY `cve_vehi` (`cve_vehi`),
  KEY `cve_usu` (`cve_usu`),
  CONSTRAINT `vehiculoconductor_ibfk_1` FOREIGN KEY (`cve_vehi`) REFERENCES `vehiculo` (`cve_vehi`),
  CONSTRAINT `vehiculoconductor_ibfk_2` FOREIGN KEY (`cve_usu`) REFERENCES `usuario` (`cve_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculoconductor`
--

LOCK TABLES `vehiculoconductor` WRITE;
/*!40000 ALTER TABLE `vehiculoconductor` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculoconductor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viaje`
--

DROP TABLE IF EXISTS `viaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viaje` (
  `cve_via` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaini_via` datetime NOT NULL,
  `fechafin_via` datetime DEFAULT NULL,
  `tipo_via` varchar(30) NOT NULL,
  `folio_listapaq` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cve_via`),
  KEY `folio_listapaq` (`folio_listapaq`),
  CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`folio_listapaq`) REFERENCES `listapaquete` (`folio_listapaq`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viaje`
--

LOCK TABLES `viaje` WRITE;
/*!40000 ALTER TABLE `viaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `viaje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-02 19:49:04
