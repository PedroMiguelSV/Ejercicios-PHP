-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: ejemplo
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `DNI` varchar(10) NOT NULL,
  `APENOM` varchar(30) DEFAULT NULL,
  `DIREC` varchar(30) DEFAULT NULL,
  `POBLA` varchar(15) DEFAULT NULL,
  `TELEF` varchar(10) DEFAULT NULL,
  `FNAC` date DEFAULT NULL,
  `curso` int DEFAULT '0',
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES ('12344345','Alcalde García, Elena','C/Las Matas, 24','Madrid','917766545',NULL,0),('12345678K','José Antonio','C/Carmen 3','Lugo','654321543','2020-11-29',0),('12345679K','José','C/Carmen 7','Murcia','654521543',NULL,0),('4448242','Cerrato Vela, Luis','C/Mina 28 - 3A','Madrid','916566545','2003-12-01',0),('56882942','Díaz Fernández, María','C/Luis Vives 25','Móstoles','915577545',NULL,0),('82344345','Burguete Echalar, Antonio','C/Arenal, 124','Madrid','917766535',NULL,NULL);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignaturas` (
  `COD` int NOT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`COD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (1,'Prog. Leng. Estr.'),(2,'Sist. Informáticos'),(3,'Análisis'),(4,'FOL'),(5,'RET'),(6,'Entornos Gráficos'),(7,'Aplic. Entornos 4ªGen'),(8,'Idioma'),(9,'Algoritmos'),(10,'Matemáticas');
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `boletinnotas`
--

DROP TABLE IF EXISTS `boletinnotas`;
/*!50001 DROP VIEW IF EXISTS `boletinnotas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `boletinnotas` AS SELECT 
 1 AS `nombre`,
 1 AS `asignatura`,
 1 AS `nota`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `examenes`
--

DROP TABLE IF EXISTS `examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examenes` (
  `asignatura` int NOT NULL,
  `aula` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`asignatura`,`fecha`),
  CONSTRAINT `FKEXAMENESASIG` FOREIGN KEY (`asignatura`) REFERENCES `asignaturas` (`COD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes`
--

LOCK TABLES `examenes` WRITE;
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
INSERT INTO `examenes` VALUES (1,'Aula 1','2024-02-17 09:00:00'),(2,'Aula 2','2024-02-17 10:30:00'),(3,'Aula 1','2024-02-17 14:00:00'),(4,'Aula 3','2024-02-17 15:30:00');
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `DNI` varchar(10) NOT NULL,
  `COD` int NOT NULL,
  `NOTA` int DEFAULT NULL,
  PRIMARY KEY (`DNI`,`COD`),
  KEY `FKNOTASASIG` (`COD`),
  CONSTRAINT `FKNOTASALUM` FOREIGN KEY (`DNI`) REFERENCES `alumnos` (`DNI`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FKNOTASASIG` FOREIGN KEY (`COD`) REFERENCES `asignaturas` (`COD`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES ('12344345',1,6),('12344345',2,5),('12344345',3,6),('12344345',10,10),('12345679K',9,9),('4448242',4,6),('4448242',5,8),('4448242',6,4),('4448242',7,5),('56882942',4,8),('56882942',5,7),('56882942',6,8),('56882942',7,9),('56882942',9,9);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `boletinnotas`
--

/*!50001 DROP VIEW IF EXISTS `boletinnotas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`usuarioEj`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `boletinnotas` AS select `alumnos`.`APENOM` AS `nombre`,`asignaturas`.`NOMBRE` AS `asignatura`,`notas`.`NOTA` AS `nota` from ((`notas` join `asignaturas`) join `alumnos`) where ((`notas`.`DNI` = `alumnos`.`DNI`) and (`notas`.`COD` = `asignaturas`.`COD`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-16  0:23:00
