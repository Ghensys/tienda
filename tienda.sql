-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: tienda1
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_69E94E917ADA1FB5` (`color_id`),
  CONSTRAINT `FK_69E94E917ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (6,'Hanes - Camiseta de manga corta para hombre','100 % Algodón Importado Lavar a máquina Algodón hilado en anillo, pesado y duradero pero súper suave. El corte completo le aporta un ajuste espacioso.','verde-5fd6c83bd620b.jpg',5,5.99),(7,'Hanes - Camiseta de manga corta para hombre','100 % Algodón Importado Lavar a máquina Algodón hilado en anillo, pesado y duradero pero súper suave. El corte completo le aporta un ajuste espacioso.','negro-5fd6f166e1ad8.jpg',3,4.99),(8,'Hanes - Camiseta de manga corta para hombre','100 % Algodón Importado Lavar a máquina Algodón hilado en anillo, pesado y duradero pero súper suave. El corte completo le aporta un ajuste espacioso.','azul-5fd6feea81e8f.jpg',1,5.99),(9,'Hanes - Camiseta de manga corta para hombre','100 % Algodón Importado Lavar a máquina Algodón hilado en anillo, pesado y duradero pero súper suave. El corte completo le aporta un ajuste espacioso.','blanco-5fd6fefce740c.jpg',2,3.99),(10,'Hanes - Camiseta de manga corta para hombre','100 % Algodón Importado Lavar a máquina Algodón hilado en anillo, pesado y duradero pero súper suave. El corte completo le aporta un ajuste espacioso.','rojo-5fd6ff0b94f9a.jpg',4,5.99);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` double NOT NULL,
  `talla_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_77E6BED52DBC2FC9` (`articulo_id`),
  KEY `IDX_77E6BED55997DE7B` (`talla_id`),
  CONSTRAINT `FK_77E6BED52DBC2FC9` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  CONSTRAINT `FK_77E6BED55997DE7B` FOREIGN KEY (`talla_id`) REFERENCES `talla` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (2,6,2,5.99,3),(4,7,2,4.99,2),(5,6,4,5.99,3),(6,7,2,4.99,6),(7,7,1,4.99,1),(8,8,1,5.99,1);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Camisas'),(2,'Chaquetas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Azul'),(2,'Blanco'),(3,'Negro'),(4,'Rojo'),(5,'Verde');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20201213150559','2020-12-13 11:59:59',734);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo_id` int(11) NOT NULL,
  `talla_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6A194EF52DBC2FC9` (`articulo_id`),
  KEY `IDX_6A194EF55997DE7B` (`talla_id`),
  KEY `IDX_6A194EF57ADA1FB5` (`color_id`),
  CONSTRAINT `FK_6A194EF52DBC2FC9` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  CONSTRAINT `FK_6A194EF55997DE7B` FOREIGN KEY (`talla_id`) REFERENCES `talla` (`id`),
  CONSTRAINT `FK_6A194EF57ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,6,1,1,'azul-5fd6c9732a80a.jpg',5.99,20),(2,6,2,1,'azul-5fd6c9d8d5297.jpg',5.99,20),(3,6,3,1,'azul-5fd6c9e1010ba.jpg',5.99,20),(4,6,4,1,'azul-5fd6ca0589f42.jpg',5.99,20),(5,6,5,1,'azul-5fd6ca118d359.jpg',6.99,20),(6,6,6,1,'azul-5fd6ca19987ac.jpg',7.99,20),(7,6,1,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(8,6,2,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(9,6,3,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(10,6,4,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(11,6,5,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(12,6,6,2,'blanco-5fd6d2c35f2e4.jpg',4.99,20),(13,6,1,3,'negro-5fd6d349d70b0.jpg',4.99,20),(14,6,2,3,'negro-5fd6d349d70b0.jpg',4.99,20),(15,6,3,3,'negro-5fd6d349d70b0.jpg',4.99,20),(16,6,4,3,'negro-5fd6d349d70b0.jpg',4.99,20),(17,6,5,3,'negro-5fd6d349d70b0.jpg',4.99,20),(18,6,1,4,'rojo-5fd6d3a0783de.jpg',5.99,20),(19,6,2,4,'rojo-5fd6d3a0783de.jpg',4.99,20),(20,6,3,4,'rojo-5fd6d3a0783de.jpg',4.99,20);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba`
--

DROP TABLE IF EXISTS `prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_46711E437ADA1FB5` (`color_id`),
  CONSTRAINT `FK_46711E437ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba`
--

LOCK TABLES `prueba` WRITE;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talla`
--

DROP TABLE IF EXISTS `talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talla`
--

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
INSERT INTO `talla` VALUES (1,'XS'),(2,'S'),(3,'M'),(4,'L'),(5,'XL'),(6,'XXL');
/*!40000 ALTER TABLE `talla` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-14  2:47:27
