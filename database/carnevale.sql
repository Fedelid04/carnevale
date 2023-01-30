-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.27-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database carnevale
CREATE DATABASE IF NOT EXISTS `carnevale` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `carnevale`;

-- Dump della struttura di tabella carnevale.cariche
CREATE TABLE IF NOT EXISTS `cariche` (
  `codiceCarica` varchar(30) NOT NULL,
  `carica` varchar(30) NOT NULL,
  PRIMARY KEY (`carica`,`codiceCarica`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.deposito
CREATE TABLE IF NOT EXISTS `deposito` (
  `deposito` varchar(30) NOT NULL,
  `descrizione` longtext DEFAULT NULL,
  `citta` varchar(30) DEFAULT NULL,
  `costoMese` float DEFAULT NULL,
  `dataInizioNoleggio` date DEFAULT NULL,
  `dataFineNoleggio` date DEFAULT NULL,
  PRIMARY KEY (`deposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `codiceEvento` varchar(30) NOT NULL,
  `descrizione` longtext DEFAULT NULL,
  `dataEvento` date DEFAULT NULL,
  `provinciaEvento` varchar(30) DEFAULT NULL,
  `cittaEvento` varchar(30) DEFAULT NULL,
  `comuneEvento` varchar(30) DEFAULT NULL,
  `incassoEvento` float DEFAULT NULL,
  PRIMARY KEY (`codiceEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.figuranti
CREATE TABLE IF NOT EXISTS `figuranti` (
  `codSocio` varchar(50) DEFAULT NULL,
  `uscita` set('si','no') DEFAULT NULL,
  `mascheraBase` varchar(50) DEFAULT NULL,
  `mascheraRecupero` varchar(50) DEFAULT NULL,
  `uscitaEsterna` set('si','no') DEFAULT NULL,
  KEY `FK2_codSocio` (`codSocio`),
  KEY `FK_mascheraBase` (`mascheraBase`),
  CONSTRAINT `FK2_codSocio` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`),
  CONSTRAINT `FK_mascheraBase` FOREIGN KEY (`mascheraBase`) REFERENCES `maschera` (`nMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.galleria
CREATE TABLE IF NOT EXISTS `galleria` (
  `nMaschera` varchar(50) DEFAULT NULL,
  `immagine` longtext DEFAULT NULL,
  KEY `FK0_maschera` (`nMaschera`),
  CONSTRAINT `FK0_maschera` FOREIGN KEY (`nMaschera`) REFERENCES `maschera` (`nMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.login
CREATE TABLE IF NOT EXISTS `login` (
  `codSocio` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  KEY `FK_login_socio` (`codSocio`),
  CONSTRAINT `FK_login_socio` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.manichini
CREATE TABLE IF NOT EXISTS `manichini` (
  `codSocio` varchar(50) NOT NULL,
  `nMaschera` varchar(50) DEFAULT NULL,
  `dataIscrizione` date DEFAULT NULL,
  `dataPrimoEvento` date DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  PRIMARY KEY (`codSocio`),
  KEY `FK_manichini` (`nMaschera`),
  CONSTRAINT `FK_manichini` FOREIGN KEY (`nMaschera`) REFERENCES `maschera` (`nMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.maschera
CREATE TABLE IF NOT EXISTS `maschera` (
  `nMaschera` varchar(50) NOT NULL DEFAULT '',
  `descrizione` longtext DEFAULT NULL,
  `deposito` varchar(30) NOT NULL,
  `codiceSarta` varchar(50) DEFAULT NULL,
  `riparazione` set('si','no') DEFAULT NULL,
  PRIMARY KEY (`nMaschera`),
  KEY `FK2_codiceSarta` (`codiceSarta`),
  CONSTRAINT `FK2_codiceSarta` FOREIGN KEY (`codiceSarta`) REFERENCES `sarta` (`codiceSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.pagamentotessera
CREATE TABLE IF NOT EXISTS `pagamentotessera` (
  `quota` int(11) DEFAULT NULL,
  `codSocio` varchar(50) DEFAULT NULL,
  `nTessera` int(11) DEFAULT NULL,
  `annoPagato` year(4) DEFAULT NULL,
  `numeroRicevuta` varchar(10) DEFAULT NULL,
  KEY `FK6_codSocio` (`codSocio`),
  KEY `FK4_nTessera` (`nTessera`),
  CONSTRAINT `FK4_nTessera` FOREIGN KEY (`nTessera`) REFERENCES `tessera` (`nTessera`),
  CONSTRAINT `FK6_codSocio` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.partecipazioneevento
CREATE TABLE IF NOT EXISTS `partecipazioneevento` (
  `codiceEvento` varchar(50) DEFAULT NULL,
  `codSocio` varchar(50) DEFAULT NULL,
  `dataEvento` date DEFAULT NULL,
  `mascheraBase` varchar(50) DEFAULT NULL,
  `mascheraRecupero` varchar(50) DEFAULT NULL,
  KEY `FK2_codiceEvento` (`codiceEvento`),
  KEY `FK4_codSocio` (`codSocio`),
  CONSTRAINT `FK2_codiceEvento` FOREIGN KEY (`codiceEvento`) REFERENCES `evento` (`codiceEvento`),
  CONSTRAINT `FK4_codSocio` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.riparazione
CREATE TABLE IF NOT EXISTS `riparazione` (
  `codiceMaschera` varchar(50) DEFAULT NULL,
  `codiceSarta` varchar(50) DEFAULT NULL,
  `dataInizioRiparazione` date DEFAULT NULL,
  `dataFineRiparazione` date DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  KEY `FK2_codiceMaschera` (`codiceMaschera`),
  KEY `FK_codiceSarta` (`codiceSarta`),
  CONSTRAINT `FK2_codiceMaschera` FOREIGN KEY (`codiceMaschera`) REFERENCES `maschera` (`nMaschera`),
  CONSTRAINT `FK_codiceSarta` FOREIGN KEY (`codiceSarta`) REFERENCES `sarta` (`codiceSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.sarta
CREATE TABLE IF NOT EXISTS `sarta` (
  `codiceSarta` varchar(50) NOT NULL,
  `nomeSarta` varchar(50) NOT NULL,
  `costoOra` float NOT NULL,
  PRIMARY KEY (`codiceSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.sociminorenni
CREATE TABLE IF NOT EXISTS `sociminorenni` (
  `codSocio` varchar(30) DEFAULT NULL,
  `cfGenitore` varchar(16) DEFAULT NULL,
  `cf2Genitore2` varchar(16) DEFAULT NULL,
  KEY `FK_codSocioMinorenne` (`codSocio`),
  CONSTRAINT `FK_codSocioMinorenne` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.socio
CREATE TABLE IF NOT EXISTS `socio` (
  `codSocio` varchar(30) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `cf` varchar(16) DEFAULT NULL,
  `indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀` varchar(30) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `citta` varchar(30) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cell` varchar(30) DEFAULT NULL,
  `nTessera` int(11) NOT NULL,
  `carica` varchar(30) DEFAULT NULL,
  `nMaschera` varchar(30) DEFAULT NULL,
  `dataIscrizione` date DEFAULT NULL,
  `dataEvento` date DEFAULT NULL,
  `anniPagati` year(4) DEFAULT NULL,
  `staff` varchar(2) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `figurante` set('si','no') DEFAULT NULL,
  PRIMARY KEY (`codSocio`,`nTessera`) USING BTREE,
  KEY `FK_carica` (`carica`),
  KEY `FK_nMaschera` (`nMaschera`),
  CONSTRAINT `FK_carica` FOREIGN KEY (`carica`) REFERENCES `cariche` (`carica`),
  CONSTRAINT `FK_nMaschera` FOREIGN KEY (`nMaschera`) REFERENCES `maschera` (`nMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevale.tessera
CREATE TABLE IF NOT EXISTS `tessera` (
  `nTessera` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `codSocio` varchar(30) DEFAULT NULL,
  `attivita` set('si','no') DEFAULT NULL,
  PRIMARY KEY (`nTessera`),
  KEY `FK_codSocio` (`codSocio`),
  CONSTRAINT `FK_codSocio` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
