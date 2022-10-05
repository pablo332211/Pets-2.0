CREATE DATABASE  IF NOT EXISTS `pets++` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pets++`;
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
-- Table structure for table `administracion`
--

DROP TABLE IF EXISTS `administracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administracion` (
  `Codigo_Administracion` int NOT NULL AUTO_INCREMENT,
  `Tipo_Administracion` varchar(50) NOT NULL,
  PRIMARY KEY (`Codigo_Administracion`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `Documento_Adm` varchar(20) NOT NULL,
  `NombreA_Adm` varchar(20) NOT NULL,
  `NombreB_Adm` varchar(20) DEFAULT NULL,
  `ApellidoA_Adm` varchar(20) NOT NULL,
  `ApellidoB_Adm` varchar(20) DEFAULT NULL,
  `Correo_Adm` varchar(100) NOT NULL,
  `Telefono_Adm` varchar(45) NOT NULL,
  `Celular_Adm` varchar(45) NOT NULL,
  `Contrasena_Adm` varchar(30) NOT NULL,
  `FK_CodigoRoles` int NOT NULL,
  PRIMARY KEY (`Documento_Adm`),
  KEY `AdministradorRoles_idx` (`FK_CodigoRoles`),
  CONSTRAINT `FK_AdministradorRoles` FOREIGN KEY (`FK_CodigoRoles`) REFERENCES `roles` (`Codigo_Roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bitacora` (
  `Codigo_Bitacora` int NOT NULL AUTO_INCREMENT,
  `FechaActual_Bitacora` date NOT NULL,
  `FormMedTratada_Bitacora` varchar(100) NOT NULL,
  `Temperatura_Bitacora` varchar(45) NOT NULL,
  `FrecCardiaca_Bitacora` varchar(45) NOT NULL,
  `FrecRespiratoria_Bitacora` varchar(45) NOT NULL,
  `ColorMucosa_Bitacora` varchar(45) NOT NULL,
  `Apetito_Bitacora` varchar(45) NOT NULL,
  `Sed_Bitacora` varchar(45) NOT NULL,
  `EstadoAnimo_Bitacora` varchar(45) NOT NULL,
  `Vomito_Bitacora` varchar(45) NOT NULL,
  `Orina_Bitacora` varchar(45) NOT NULL,
  `GradoHidratacion_Bitacora` varchar(45) NOT NULL,
  `Observacion_Bitacora` varchar(200) NOT NULL,
  PRIMARY KEY (`Codigo_Bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `certificacion`
--

DROP TABLE IF EXISTS `certificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `certificacion` (
  `Codigo_Certificacion` int NOT NULL AUTO_INCREMENT,
  `FK_DocumentoPropietario` varchar(20) NOT NULL,
  `Tipo_Certificacion` varchar(20) NOT NULL,
  `Fecha_Certificacion` date NOT NULL,
  `EntidadSolicitadora_Certificacion` varchar(45) NOT NULL,
  `Observacion_Certificacion` varchar(300) NOT NULL,
  PRIMARY KEY (`Codigo_Certificacion`),
  KEY `FK_CertificacionPropietario_idx` (`FK_DocumentoPropietario`),
  CONSTRAINT `FK_CertificacionPropietario` FOREIGN KEY (`FK_DocumentoPropietario`) REFERENCES `propietario` (`Documento_Propietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cirugia`
--

DROP TABLE IF EXISTS `cirugia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cirugia` (
  `Codigo_Cirugia` int NOT NULL AUTO_INCREMENT,
  `Fecha_Cirugia` date NOT NULL,
  `Peso_Cirugia` varchar(45) NOT NULL,
  `TipoProcedimiento_Cirugia` varchar(45) NOT NULL,
  `TipoAnestecia_Cirugia` varchar(45) NOT NULL,
  `NombrePropietario_Cirugia` varchar(45) NOT NULL,
  `Identificacion_Cirugia` varchar(45) NOT NULL,
  `Direccion_Cirugia` varchar(45) NOT NULL,
  `Celular_Cirugia` varchar(45) NOT NULL,
  `PreQuirurgicos` varchar(45) NOT NULL,
  `AutorizaCirugia_Cirugia` varchar(45) NOT NULL,
  `Observacion_Cirugia` varchar(45) NOT NULL,
  PRIMARY KEY (`Codigo_Cirugia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cita_medica`
--

DROP TABLE IF EXISTS `cita_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cita_medica` (
  `Codigo_CitaMedica` int NOT NULL AUTO_INCREMENT,
  `FK_DocumentoMedico` varchar(20) NOT NULL,
  `FK_CodigoTipoCitaMedica` int NOT NULL,
  `Oidos_CitaMedica` varchar(50) NOT NULL,
  `FrecCardiaca_CitaMedica` varchar(50) NOT NULL,
  `Auscultacion_CitaMedica` varchar(50) NOT NULL,
  `FrecRespiratoria_CitaMedica` varchar(50) NOT NULL,
  `Ojos_CitaMedica` varchar(50) NOT NULL,
  `Mucosas_CitaMedica` varchar(50) NOT NULL,
  `Peso_CitaMedica` varchar(50) NOT NULL,
  `Tilc_CitaMedica` varchar(50) NOT NULL,
  `Ganglios_CitaMedica` varchar(50) NOT NULL,
  `Palpitacion_CitaMedica` varchar(50) NOT NULL,
  `CavidadOral_CitaMedica` varchar(50) NOT NULL,
  `Nervioso_CitaMedica` varchar(50) NOT NULL,
  `Temperatura_CitaMedica` varchar(50) NOT NULL,
  `Tegumento_CitaMedica` varchar(50) NOT NULL,
  `Observacion_CitaMedica` varchar(400) NOT NULL,
  PRIMARY KEY (`Codigo_CitaMedica`),
  KEY `FK_CitaMedicaMedico_idx` (`FK_DocumentoMedico`),
  KEY `FK_CitaMedicaTipoCitaMedica_idx` (`FK_CodigoTipoCitaMedica`),
  CONSTRAINT `FK_CitaMedicaMedico` FOREIGN KEY (`FK_DocumentoMedico`) REFERENCES `medico` (`Documento_Medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CitaMedicaTipoCitaMedica` FOREIGN KEY (`FK_CodigoTipoCitaMedica`) REFERENCES `tipo_citamedica` (`Codigo_TipoCitaMedica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especie` (
  `Codigo_Especie` int NOT NULL,
  `Tipo_Especie` varchar(15) NOT NULL,
  PRIMARY KEY (`Codigo_Especie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examen` (
  `Codigo_Examen` int NOT NULL AUTO_INCREMENT,
  `Fecha_Examen` date NOT NULL,
  `Tipo_Examen` varchar(45) NOT NULL,
  `Correo_Examen` varchar(70) NOT NULL,
  `Resultado_Examen` varchar(400) NOT NULL,
  `Observacion_Examen` varchar(45) NOT NULL,
  PRIMARY KEY (`Codigo_Examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `formula_medica`
--

DROP TABLE IF EXISTS `formula_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formula_medica` (
  `Codigo_FormulaMedica` int NOT NULL AUTO_INCREMENT,
  `Fecha_FormulaMedica` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo_FormulaMedica`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `formulamedica_medicamento`
--

DROP TABLE IF EXISTS `formulamedica_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formulamedica_medicamento` (
  `FK_CodigoFormulaMedica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoMedicamento` int NOT NULL,
  `Dosis_Medicamento` varchar(45) NOT NULL,
  `FK_CodigoAdministracion` int NOT NULL,
  `Observacion_Medicamento` varchar(45) NOT NULL,
  PRIMARY KEY (`FK_CodigoFormulaMedica`,`FK_CodigoMedicamento`),
  KEY `medicamento_formulamedica_idx` (`FK_CodigoMedicamento`),
  KEY `administracion_medicamento_idx` (`FK_CodigoAdministracion`),
  CONSTRAINT `administracion_medicamento` FOREIGN KEY (`FK_CodigoAdministracion`) REFERENCES `administracion` (`Codigo_Administracion`),
  CONSTRAINT `formulamedica_medicamento` FOREIGN KEY (`FK_CodigoFormulaMedica`) REFERENCES `formula_medica` (`Codigo_FormulaMedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `medicamento_formulamedica` FOREIGN KEY (`FK_CodigoMedicamento`) REFERENCES `medicamento` (`Codigo_Medicamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `Codigo_Genero` int NOT NULL,
  `Tipo_Genero` varchar(20) NOT NULL,
  PRIMARY KEY (`Codigo_Genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historia_clinica`
--

DROP TABLE IF EXISTS `historia_clinica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historia_clinica` (
  `Codigo_HistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_DocumentoMedico` varchar(20) NOT NULL,
  `FK_CodigoMascota` int NOT NULL,
  PRIMARY KEY (`Codigo_HistoriaClinica`),
  KEY `FK_HistoriaClinicaMedico_idx` (`FK_DocumentoMedico`),
  KEY `FK_HistoriaClinicaMascota_idx` (`FK_CodigoMascota`),
  CONSTRAINT `FK_HistoriaClinicaMascota` FOREIGN KEY (`FK_CodigoMascota`) REFERENCES `mascota` (`Codigo_Mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HistoriaClinicaMedico` FOREIGN KEY (`FK_DocumentoMedico`) REFERENCES `medico` (`Documento_Medico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_cirugia`
--

DROP TABLE IF EXISTS `historiaclinica_cirugia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_cirugia` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoCirugia` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoCirugia`),
  KEY `FK_CirugiaHistoriaClinica_idx` (`FK_CodigoCirugia`),
  CONSTRAINT `FK_CirugiaHistoriaClinica` FOREIGN KEY (`FK_CodigoCirugia`) REFERENCES `cirugia` (`Codigo_Cirugia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HistoriaClinicaCirugia` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_examen`
--

DROP TABLE IF EXISTS `historiaclinica_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_examen` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoExamen` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoExamen`),
  KEY `FK_ExamenHistoriaClinica_idx` (`FK_CodigoExamen`),
  CONSTRAINT `FK_ExamenHistoriaClinica` FOREIGN KEY (`FK_CodigoExamen`) REFERENCES `examen` (`Codigo_Examen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HistoriaClinicaExamen` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_formulamedica`
--

DROP TABLE IF EXISTS `historiaclinica_formulamedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_formulamedica` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoFormulaMedica` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoFormulaMedica`),
  KEY `FK_FormulaMedicaHistoriaClinica_idx` (`FK_CodigoFormulaMedica`),
  CONSTRAINT `FK_FormulaMedicaHistoriaClinica` FOREIGN KEY (`FK_CodigoFormulaMedica`) REFERENCES `formula_medica` (`Codigo_FormulaMedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HistoriaClinicaFormulaMedica` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_hospitalizacion`
--

DROP TABLE IF EXISTS `historiaclinica_hospitalizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_hospitalizacion` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoHospitalizacion` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoHospitalizacion`),
  KEY `FK_HospitalizacionHistoriaClinica_idx` (`FK_CodigoHospitalizacion`),
  CONSTRAINT `FK_HistoriaClinicaHospitalizacion` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HospitalizacionHistoriaClinica` FOREIGN KEY (`FK_CodigoHospitalizacion`) REFERENCES `hospitalizacion` (`Codigo_Hospitalizacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_pruebalaboratorio`
--

DROP TABLE IF EXISTS `historiaclinica_pruebalaboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_pruebalaboratorio` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoPruebaLaboratorio` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoPruebaLaboratorio`),
  KEY `pruebalaboratorio_historiaclinica_idx` (`FK_CodigoPruebaLaboratorio`),
  CONSTRAINT `historiaclinica_pruebalaboratorio` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pruebalaboratorio_historiaclinica` FOREIGN KEY (`FK_CodigoPruebaLaboratorio`) REFERENCES `prueba_laboratorio` (`Codigo_PruebaLaboratorio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica_remision`
--

DROP TABLE IF EXISTS `historiaclinica_remision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiaclinica_remision` (
  `FK_CodigoHistoriaClinica` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoRemision` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHistoriaClinica`,`FK_CodigoRemision`),
  KEY `FK_RemisionHistoriaClinica_idx` (`FK_CodigoRemision`),
  CONSTRAINT `FK_HistoriaClinicaRemision` FOREIGN KEY (`FK_CodigoHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo_HistoriaClinica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_RemisionHistoriaClinica` FOREIGN KEY (`FK_CodigoRemision`) REFERENCES `remision` (`Codigo_Remision`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hospitalizacion`
--

DROP TABLE IF EXISTS `hospitalizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospitalizacion` (
  `Codigo_Hospitalizacion` int NOT NULL AUTO_INCREMENT,
  `FechaIngreso_Hospitalizacion` date NOT NULL,
  `FechaSalida_Hospitalizacion` date NOT NULL,
  PRIMARY KEY (`Codigo_Hospitalizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hospitalizacion_bitacora`
--

DROP TABLE IF EXISTS `hospitalizacion_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospitalizacion_bitacora` (
  `FK_CodigoHospitalizacion` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoBitacora` int NOT NULL,
  PRIMARY KEY (`FK_CodigoHospitalizacion`,`FK_CodigoBitacora`),
  KEY `FK_BitacoraHospitalizacion_idx` (`FK_CodigoBitacora`),
  CONSTRAINT `FK_BitacoraHospitalizacion` FOREIGN KEY (`FK_CodigoBitacora`) REFERENCES `bitacora` (`Codigo_Bitacora`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_HospitalizacionBitacora` FOREIGN KEY (`FK_CodigoHospitalizacion`) REFERENCES `hospitalizacion` (`Codigo_Hospitalizacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mascota`
--

DROP TABLE IF EXISTS `mascota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascota` (
  `Codigo_Mascota` int NOT NULL AUTO_INCREMENT,
  `FK_DocumentoPropietario` varchar(20) NOT NULL,
  `Nombre_Mascota` varchar(20) NOT NULL,
  `FK_EspecieMascota` int NOT NULL,
  `Color_Mascota` varchar(50) NOT NULL,
  `Edad_Mascota` varchar(4) NOT NULL,
  `FK_GeneroMascota` int NOT NULL,
  `Observacion_Mascota` varchar(300) NOT NULL,
  PRIMARY KEY (`Codigo_Mascota`),
  KEY `FK_MascotaPropietario_idx` (`FK_DocumentoPropietario`),
  KEY `FK_MascotaEspecie_idx` (`FK_EspecieMascota`),
  KEY `FK_MascotaGenero_idx` (`FK_GeneroMascota`),
  CONSTRAINT `FK_MascotaEspecie` FOREIGN KEY (`FK_EspecieMascota`) REFERENCES `especie` (`Codigo_Especie`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MascotaGenero` FOREIGN KEY (`FK_GeneroMascota`) REFERENCES `genero` (`Codigo_Genero`),
  CONSTRAINT `FK_MascotaPropietario` FOREIGN KEY (`FK_DocumentoPropietario`) REFERENCES `propietario` (`Documento_Propietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mascota_citamedica`
--

DROP TABLE IF EXISTS `mascota_citamedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascota_citamedica` (
  `FK_CodigoMascota` int NOT NULL,
  `FK_CodigoCitaMedica` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`FK_CodigoCitaMedica`,`FK_CodigoMascota`),
  KEY `FK_MascotaCitaMedica_idx` (`FK_CodigoMascota`),
  CONSTRAINT `FK_CitaMedicaMascota` FOREIGN KEY (`FK_CodigoCitaMedica`) REFERENCES `cita_medica` (`Codigo_CitaMedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MascotaCitaMedica` FOREIGN KEY (`FK_CodigoMascota`) REFERENCES `mascota` (`Codigo_Mascota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento` (
  `Codigo_Medicamento` int NOT NULL AUTO_INCREMENT,
  `Nombre_Medicamento` varchar(45) NOT NULL,
  `Tipo_Medicamento` varchar(45) NOT NULL,
  `FK_CodigoPresentacion` int NOT NULL,
  `Concentracion_Medicamento` varchar(45) NOT NULL,
  PRIMARY KEY (`Codigo_Medicamento`),
  KEY `presentacion_medicamento_idx` (`FK_CodigoPresentacion`),
  CONSTRAINT `presentacion_medicamento` FOREIGN KEY (`FK_CodigoPresentacion`) REFERENCES `presentacion` (`Codigo_Presentacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medicamento_cirugia`
--

DROP TABLE IF EXISTS `medicamento_cirugia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento_cirugia` (
  `FK_CodigoMedicamento` int NOT NULL AUTO_INCREMENT,
  `FK_CodigoCirugia` int NOT NULL,
  `FK_CodigoAdministracion` int NOT NULL,
  `Dosis_MedicamentoCirugia` varchar(20) NOT NULL,
  `Observacion_MedicamentoCirugia` varchar(200) NOT NULL,
  PRIMARY KEY (`FK_CodigoMedicamento`,`FK_CodigoCirugia`),
  KEY `cirugia_medicamento_idx` (`FK_CodigoCirugia`),
  KEY `administracion_cirugia_idx` (`FK_CodigoAdministracion`),
  CONSTRAINT `administracion_cirugia` FOREIGN KEY (`FK_CodigoAdministracion`) REFERENCES `administracion` (`Codigo_Administracion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cirugia_medicamento` FOREIGN KEY (`FK_CodigoCirugia`) REFERENCES `cirugia` (`Codigo_Cirugia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `medicamento_cirugia` FOREIGN KEY (`FK_CodigoMedicamento`) REFERENCES `medicamento` (`Codigo_Medicamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `Documento_Medico` varchar(20) NOT NULL,
  `NombreA_Medico` varchar(20) NOT NULL,
  `NombreB_Medico` varchar(20) DEFAULT NULL,
  `ApellidoA_Medico` varchar(20) NOT NULL,
  `ApellidoB_Medico` varchar(20) DEFAULT NULL,
  `Correo_Medico` varchar(100) NOT NULL,
  `Telefono_Medico` varchar(45) NOT NULL,
  `Celular_Medico` varchar(45) NOT NULL,
  `Contrasena_Medico` varchar(30) NOT NULL,
  `FK_CodigoRoles` int NOT NULL,
  PRIMARY KEY (`Documento_Medico`),
  KEY `FK_MedicoRoles_idx` (`FK_CodigoRoles`),
  CONSTRAINT `FK_MedicoRoles` FOREIGN KEY (`FK_CodigoRoles`) REFERENCES `roles` (`Codigo_Roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presentacion` (
  `Codigo_Presentacion` int NOT NULL,
  `Tipo_Presentacion` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo_Presentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profilactico`
--

DROP TABLE IF EXISTS `profilactico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profilactico` (
  `Codigo_Profilactico` int NOT NULL AUTO_INCREMENT,
  `Nombre_Profilactico` varchar(50) NOT NULL,
  `Presentacion_Profilactico` varchar(50) NOT NULL,
  PRIMARY KEY (`Codigo_Profilactico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profilactico_mascota`
--

DROP TABLE IF EXISTS `profilactico_mascota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profilactico_mascota` (
  `FK_CodigoMascota` int NOT NULL,
  `FK_CodigoProfilactico` int NOT NULL AUTO_INCREMENT,
  `Fecha_ProfilacticoMascota` date NOT NULL,
  `Dosis_ProfilacticoMascota` varchar(20) NOT NULL,
  `FK_Administracion` int NOT NULL,
  `Observacion_ProfilacticoMascota` varchar(400) NOT NULL,
  PRIMARY KEY (`FK_CodigoProfilactico`,`FK_CodigoMascota`),
  KEY `FK_MascotaProfilacticos_idx` (`FK_CodigoMascota`),
  KEY `FK_AdministracionProfilactico_idx` (`FK_Administracion`),
  CONSTRAINT `FK_AdministracionProfilactico` FOREIGN KEY (`FK_Administracion`) REFERENCES `administracion` (`Codigo_Administracion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MascotaProfilactico` FOREIGN KEY (`FK_CodigoMascota`) REFERENCES `mascota` (`Codigo_Mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ProfilacticoMascota` FOREIGN KEY (`FK_CodigoProfilactico`) REFERENCES `profilactico` (`Codigo_Profilactico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profilactico_medico`
--

DROP TABLE IF EXISTS `profilactico_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profilactico_medico` (
  `FK_DocumentoMedico` varchar(20) NOT NULL,
  `FK_CodigoProfilactico` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`FK_DocumentoMedico`,`FK_CodigoProfilactico`),
  KEY `FK_ProfilacticoMedico_idx` (`FK_CodigoProfilactico`),
  CONSTRAINT `FK_MedicoProfilactico` FOREIGN KEY (`FK_DocumentoMedico`) REFERENCES `medico` (`Documento_Medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ProfilacticoMedico` FOREIGN KEY (`FK_CodigoProfilactico`) REFERENCES `profilactico` (`Codigo_Profilactico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietario` (
  `Documento_Propietario` varchar(20) NOT NULL,
  `NombreA_Propietario` varchar(20) NOT NULL,
  `NombreB_Propietario` varchar(20) NOT NULL,
  `ApellidoA_Propietario` varchar(20) NOT NULL,
  `ApellidoB_Propietario` varchar(20) NOT NULL,
  `Direccion_Propietario` varchar(20) NOT NULL,
  `Telefono_Propietario` varchar(20) NOT NULL,
  `Celular_Propietario` varchar(20) NOT NULL,
  `Correo_Propietario` varchar(20) NOT NULL,
  PRIMARY KEY (`Documento_Propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `propietario_citamedica`
--

DROP TABLE IF EXISTS `propietario_citamedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietario_citamedica` (
  `FK_DocumentoPropietario` varchar(20) NOT NULL,
  `FK_CodigoCitaMedica` int NOT NULL AUTO_INCREMENT,
  `Fecha_CitaMedica` date NOT NULL,
  `Observacion_CitaMedica` varchar(400) NOT NULL,
  PRIMARY KEY (`FK_CodigoCitaMedica`,`FK_DocumentoPropietario`),
  KEY `FK_PropietarioCitaMedica_idx` (`FK_DocumentoPropietario`),
  CONSTRAINT `FK_CitaMedicaPropietario` FOREIGN KEY (`FK_CodigoCitaMedica`) REFERENCES `cita_medica` (`Codigo_CitaMedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_PropietarioCitaMedica` FOREIGN KEY (`FK_DocumentoPropietario`) REFERENCES `propietario` (`Documento_Propietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prueba_laboratorio`
--

DROP TABLE IF EXISTS `prueba_laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prueba_laboratorio` (
  `Codigo_PruebaLaboratorio` int NOT NULL AUTO_INCREMENT,
  `Nombre_PruebaLaboratorio` varchar(45) NOT NULL,
  `Tipo_PruebaLaboratorio` varchar(45) NOT NULL,
  `Fecha_PruebaLaboratorio` date NOT NULL,
  `Laboratorio_PruebaLaboratorio` varchar(100) NOT NULL,
  `Resultado_PruebaLaboratorio` varchar(500) NOT NULL,
  PRIMARY KEY (`Codigo_PruebaLaboratorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `remision`
--

DROP TABLE IF EXISTS `remision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remision` (
  `Codigo_Remision` int NOT NULL AUTO_INCREMENT,
  `Fehca_Remision` date NOT NULL,
  `Especialista_Remision` varchar(100) NOT NULL,
  `Celular_Remision` varchar(45) NOT NULL,
  `Entidad_Remision` varchar(100) NOT NULL,
  `Observacion_Remision` varchar(300) NOT NULL,
  PRIMARY KEY (`Codigo_Remision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `Codigo_Roles` int NOT NULL AUTO_INCREMENT,
  `Tipo_Roles` varchar(20) NOT NULL,
  PRIMARY KEY (`Codigo_Roles`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_citamedica`
--

DROP TABLE IF EXISTS `tipo_citamedica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_citamedica` (
  `Codigo_TipoCitaMedica` int NOT NULL,
  `Tipo_CitaMedica` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo_TipoCitaMedica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-20 19:21:44
