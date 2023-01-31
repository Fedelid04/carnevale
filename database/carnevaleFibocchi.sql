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


-- Dump della struttura del database carnevalefibocchi
CREATE DATABASE IF NOT EXISTS `carnevalefibocchi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `carnevalefibocchi`;

-- Dump della struttura di tabella carnevalefibocchi.carica
CREATE TABLE IF NOT EXISTS `carica` (
  `codCarica` varchar(50) NOT NULL,
  `tipoCarica` varchar(25) NOT NULL,
  PRIMARY KEY (`codCarica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.deposito
CREATE TABLE IF NOT EXISTS `deposito` (
  `codDeposito` varchar(50) NOT NULL,
  `via` varchar(255) NOT NULL,
  `citta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `codEvento` varchar(50) NOT NULL,
  `descrizione` varchar(50) NOT NULL,
  `incassoEvento` int(11) DEFAULT NULL,
  `requisito` varchar(50) DEFAULT NULL,
  `via` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `dataEvento` date NOT NULL,
  `esterno` set('si','no') DEFAULT 'no',
  PRIMARY KEY (`codEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.figurante
CREATE TABLE IF NOT EXISTS `figurante` (
  `codSocio` varchar(50) NOT NULL,
  `codMaschera` varchar(50) NOT NULL,
  `mascheraRiserva` varchar(50) DEFAULT NULL,
  `uscita` set('si','no') DEFAULT 'no',
  `uscitaEsterna` set('si','no') DEFAULT 'no',
  KEY `codSocio` (`codSocio`),
  KEY `codMaschera` (`codMaschera`),
  CONSTRAINT `figurante_ibfk_1` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`),
  CONSTRAINT `figurante_ibfk_2` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.figurante_manichino
CREATE TABLE IF NOT EXISTS `figurante_manichino` (
  `codManichino` varchar(50) NOT NULL,
  `codMaschera` varchar(50) NOT NULL,
  KEY `codManichino` (`codManichino`),
  KEY `codMaschera` (`codMaschera`),
  CONSTRAINT `figurante_manichino_ibfk_1` FOREIGN KEY (`codManichino`) REFERENCES `manichino` (`codManichino`),
  CONSTRAINT `figurante_manichino_ibfk_2` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.galleria
CREATE TABLE IF NOT EXISTS `galleria` (
  `codFoto` varchar(50) NOT NULL,
  `percorso` varchar(255) NOT NULL,
  `codMaschera` varchar(50) NOT NULL,
  PRIMARY KEY (`codFoto`),
  KEY `codMaschera` (`codMaschera`),
  CONSTRAINT `galleria_ibfk_1` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.login
CREATE TABLE IF NOT EXISTS `login` (
  `codSocio` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL,
  PRIMARY KEY (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.manichino
CREATE TABLE IF NOT EXISTS `manichino` (
  `codManichino` varchar(50) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `codDeposito` varchar(50) NOT NULL,
  PRIMARY KEY (`codManichino`),
  KEY `codDeposito` (`codDeposito`),
  CONSTRAINT `manichino_ibfk_1` FOREIGN KEY (`codDeposito`) REFERENCES `deposito` (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.manichino_evento
CREATE TABLE IF NOT EXISTS `manichino_evento` (
  `codManichino` varchar(50) NOT NULL,
  `codEvento` varchar(50) NOT NULL,
  `mascheraPrimaria` varchar(50) NOT NULL,
  KEY `codManichino` (`codManichino`),
  KEY `codEvento` (`codEvento`),
  CONSTRAINT `manichino_evento_ibfk_1` FOREIGN KEY (`codManichino`) REFERENCES `manichino` (`codManichino`),
  CONSTRAINT `manichino_evento_ibfk_2` FOREIGN KEY (`codEvento`) REFERENCES `evento` (`codEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.maschera
CREATE TABLE IF NOT EXISTS `maschera` (
  `codMaschera` varchar(50) NOT NULL,
  `colore` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `riparazione` set('si','no') DEFAULT 'no',
  `codSarta` varchar(50) NOT NULL,
  `codDeposito` varchar(50) NOT NULL,
  PRIMARY KEY (`codMaschera`),
  KEY `codSarta` (`codSarta`),
  KEY `codDeposito` (`codDeposito`),
  CONSTRAINT `maschera_ibfk_1` FOREIGN KEY (`codSarta`) REFERENCES `sarta` (`codSarta`),
  CONSTRAINT `maschera_ibfk_2` FOREIGN KEY (`codDeposito`) REFERENCES `deposito` (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.pagamento_tessera
CREATE TABLE IF NOT EXISTS `pagamento_tessera` (
  `codTessera` varchar(50) NOT NULL,
  `anno` year(4) NOT NULL,
  `dataPagamento` date NOT NULL,
  PRIMARY KEY (`codTessera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.riparazione
CREATE TABLE IF NOT EXISTS `riparazione` (
  `codMaschera` varchar(50) NOT NULL,
  `codSarta` varchar(50) NOT NULL,
  `inizioRiparazione` date DEFAULT NULL,
  `fineRiparazione` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  KEY `codMaschera` (`codMaschera`),
  KEY `codSarta` (`codSarta`),
  CONSTRAINT `riparazione_ibfk_1` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`),
  CONSTRAINT `riparazione_ibfk_2` FOREIGN KEY (`codSarta`) REFERENCES `sarta` (`codSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.sarta
CREATE TABLE IF NOT EXISTS `sarta` (
  `codSarta` varchar(50) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  PRIMARY KEY (`codSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.socio
CREATE TABLE IF NOT EXISTS `socio` (
  `codSocio` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `via` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `cf` char(16) DEFAULT NULL,
  `cell` varchar(25) DEFAULT NULL,
  `dataIscrizione` date DEFAULT NULL,
  `figurante` set('si','no') DEFAULT 'no',
  `staff` set('si','no') DEFAULT 'no',
  `codCarica` varchar(50) NOT NULL,
  PRIMARY KEY (`codSocio`),
  KEY `codCarica` (`codCarica`),
  CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`codCarica`) REFERENCES `carica` (`codCarica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.socio_evento
CREATE TABLE IF NOT EXISTS `socio_evento` (
  `codSocio` varchar(50) NOT NULL,
  `codEvento` varchar(50) NOT NULL,
  `mascheraPrimaria` varchar(50) NOT NULL,
  `mascheraSecondaria` varchar(50) DEFAULT NULL,
  KEY `codSocio` (`codSocio`),
  KEY `codEvento` (`codEvento`),
  CONSTRAINT `socio_evento_ibfk_1` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`),
  CONSTRAINT `socio_evento_ibfk_2` FOREIGN KEY (`codEvento`) REFERENCES `evento` (`codEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.socio_tessera
CREATE TABLE IF NOT EXISTS `socio_tessera` (
  `codSocio` varchar(50) NOT NULL,
  `codTessera` varchar(50) NOT NULL,
  `dataErogazione` date NOT NULL,
  KEY `codSocio` (`codSocio`),
  KEY `codTessera` (`codTessera`),
  CONSTRAINT `socio_tessera_ibfk_1` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`),
  CONSTRAINT `socio_tessera_ibfk_2` FOREIGN KEY (`codTessera`) REFERENCES `tessera` (`codTessera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.tessera
CREATE TABLE IF NOT EXISTS `tessera` (
  `codTessera` varchar(50) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `attiva` set('si','no') DEFAULT 'si',
  PRIMARY KEY (`codTessera`),
  KEY `idTipo` (`idTipo`),
  CONSTRAINT `tessera_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo_tessera` (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella carnevalefibocchi.tipo_tessera
CREATE TABLE IF NOT EXISTS `tipo_tessera` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipologia` varchar(255) NOT NULL,
  `prezzo` int(11) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
