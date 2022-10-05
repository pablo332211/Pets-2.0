-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: pets++
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Dumping data for table `administracion`
--

LOCK TABLES `administracion` WRITE;
/*!40000 ALTER TABLE `administracion` DISABLE KEYS */;
INSERT INTO `administracion` VALUES (1,'Oral'),(2,'SubLingual'),(3,'Topica'),(4,'Transdermica'),(5,'Oftalmologica'),(6,'Inhalatoria'),(7,'Rectal'),(8,'Vaginal'),(9,'Intravenosa'),(10,'Intramuscular'),(11,'Subcutanea');
/*!40000 ALTER TABLE `administracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `certificacion`
--

LOCK TABLES `certificacion` WRITE;
/*!40000 ALTER TABLE `certificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cirugia`
--

LOCK TABLES `cirugia` WRITE;
/*!40000 ALTER TABLE `cirugia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cirugia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cita_medica`
--

LOCK TABLES `cita_medica` WRITE;
/*!40000 ALTER TABLE `cita_medica` DISABLE KEYS */;
/*!40000 ALTER TABLE `cita_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (1,'Canino'),(2,'Felino'),(3,'Ave'),(4,'Bobino'),(5,'Roedor'),(6,'Equino'),(7,'Otros');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `formula_medica`
--

LOCK TABLES `formula_medica` WRITE;
/*!40000 ALTER TABLE `formula_medica` DISABLE KEYS */;
INSERT INTO `formula_medica` VALUES (1,'2022-06-20 22:37:33');
/*!40000 ALTER TABLE `formula_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `formulamedica_medicamento`
--

LOCK TABLES `formulamedica_medicamento` WRITE;
/*!40000 ALTER TABLE `formulamedica_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `formulamedica_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Macho'),(2,'Hembra');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historia_clinica`
--

LOCK TABLES `historia_clinica` WRITE;
/*!40000 ALTER TABLE `historia_clinica` DISABLE KEYS */;
INSERT INTO `historia_clinica` VALUES (5,'1032492720',7);
/*!40000 ALTER TABLE `historia_clinica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_cirugia`
--

LOCK TABLES `historiaclinica_cirugia` WRITE;
/*!40000 ALTER TABLE `historiaclinica_cirugia` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiaclinica_cirugia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_examen`
--

LOCK TABLES `historiaclinica_examen` WRITE;
/*!40000 ALTER TABLE `historiaclinica_examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiaclinica_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_formulamedica`
--

LOCK TABLES `historiaclinica_formulamedica` WRITE;
/*!40000 ALTER TABLE `historiaclinica_formulamedica` DISABLE KEYS */;
INSERT INTO `historiaclinica_formulamedica` VALUES (5,1);
/*!40000 ALTER TABLE `historiaclinica_formulamedica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_hospitalizacion`
--

LOCK TABLES `historiaclinica_hospitalizacion` WRITE;
/*!40000 ALTER TABLE `historiaclinica_hospitalizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiaclinica_hospitalizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_pruebalaboratorio`
--

LOCK TABLES `historiaclinica_pruebalaboratorio` WRITE;
/*!40000 ALTER TABLE `historiaclinica_pruebalaboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiaclinica_pruebalaboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historiaclinica_remision`
--

LOCK TABLES `historiaclinica_remision` WRITE;
/*!40000 ALTER TABLE `historiaclinica_remision` DISABLE KEYS */;
/*!40000 ALTER TABLE `historiaclinica_remision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `hospitalizacion`
--

LOCK TABLES `hospitalizacion` WRITE;
/*!40000 ALTER TABLE `hospitalizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospitalizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `hospitalizacion_bitacora`
--

LOCK TABLES `hospitalizacion_bitacora` WRITE;
/*!40000 ALTER TABLE `hospitalizacion_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospitalizacion_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mascota`
--

LOCK TABLES `mascota` WRITE;
/*!40000 ALTER TABLE `mascota` DISABLE KEYS */;
INSERT INTO `mascota` VALUES (7,'123456','Luna',3,'Amarillo','15',2,'Es Hermosa');
/*!40000 ALTER TABLE `mascota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mascota_citamedica`
--

LOCK TABLES `mascota_citamedica` WRITE;
/*!40000 ALTER TABLE `mascota_citamedica` DISABLE KEYS */;
/*!40000 ALTER TABLE `mascota_citamedica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `medicamento_cirugia`
--

LOCK TABLES `medicamento_cirugia` WRITE;
/*!40000 ALTER TABLE `medicamento_cirugia` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamento_cirugia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES ('1032492720','David','Fernando','Miranda','Diaz','dm1236789@gmail.com','6757920','3187254236','administrador',1);
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (1,'Tableta'),(2,'Jarabe'),(3,'Inyectable'),(4,'Crema'),(5,'Gel'),(6,'Sprite'),(7,'Otros');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profilactico`
--

LOCK TABLES `profilactico` WRITE;
/*!40000 ALTER TABLE `profilactico` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilactico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profilactico_mascota`
--

LOCK TABLES `profilactico_mascota` WRITE;
/*!40000 ALTER TABLE `profilactico_mascota` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilactico_mascota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profilactico_medico`
--

LOCK TABLES `profilactico_medico` WRITE;
/*!40000 ALTER TABLE `profilactico_medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilactico_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES ('123456','Miguel','Angel','Mendoza','','Calle 1 # 30 - 05','123456789','3214654987','miguel@gmail.com');
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `propietario_citamedica`
--

LOCK TABLES `propietario_citamedica` WRITE;
/*!40000 ALTER TABLE `propietario_citamedica` DISABLE KEYS */;
/*!40000 ALTER TABLE `propietario_citamedica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prueba_laboratorio`
--

LOCK TABLES `prueba_laboratorio` WRITE;
/*!40000 ALTER TABLE `prueba_laboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `prueba_laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `remision`
--

LOCK TABLES `remision` WRITE;
/*!40000 ALTER TABLE `remision` DISABLE KEYS */;
/*!40000 ALTER TABLE `remision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Medico');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_citamedica`
--

LOCK TABLES `tipo_citamedica` WRITE;
/*!40000 ALTER TABLE `tipo_citamedica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_citamedica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-20 19:22:05
