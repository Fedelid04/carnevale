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
DROP DATABASE IF EXISTS `carnevalefibocchi`;
CREATE DATABASE IF NOT EXISTS `carnevalefibocchi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `carnevalefibocchi`;

-- Dump della struttura di tabella carnevalefibocchi.carica
DROP TABLE IF EXISTS `carica`;
CREATE TABLE IF NOT EXISTS `carica` (
  `codCarica` varchar(50) NOT NULL,
  `tipoCarica` varchar(25) NOT NULL,
  PRIMARY KEY (`codCarica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.carica: ~4 rows (circa)
INSERT INTO `carica` (`codCarica`, `tipoCarica`) VALUES
	('C1', 'presidente'),
	('C2', 'vicepresidente'),
	('C3', 'segretario'),
	('C4', 'generica');

-- Dump della struttura di tabella carnevalefibocchi.deposito
DROP TABLE IF EXISTS `deposito`;
CREATE TABLE IF NOT EXISTS `deposito` (
  `codDeposito` varchar(50) NOT NULL,
  `via` varchar(255) NOT NULL,
  `citta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.deposito: ~0 rows (circa)
INSERT INTO `deposito` (`codDeposito`, `via`, `citta`) VALUES
	('D1', 'Via calamandrei 2', 'Arezzo');

-- Dump della struttura di tabella carnevalefibocchi.evento
DROP TABLE IF EXISTS `evento`;
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

-- Dump dei dati della tabella carnevalefibocchi.evento: ~2 rows (circa)
INSERT INTO `evento` (`codEvento`, `descrizione`, `incassoEvento`, `requisito`, `via`, `citta`, `provincia`, `dataEvento`, `esterno`) VALUES
	('E1', 'Mostra carri', 700, NULL, 'Via Dogas Bar 3', 'Arezzo', 'Arezzo', '2023-02-01', 'si'),
	('E2', 'Grandi statue', 554, NULL, 'Via fossa buca', 'ROMA', 'Arezzo', '2023-02-04', 'si');

-- Dump della struttura di tabella carnevalefibocchi.figurante
DROP TABLE IF EXISTS `figurante`;
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

-- Dump dei dati della tabella carnevalefibocchi.figurante: ~2 rows (circa)
INSERT INTO `figurante` (`codSocio`, `codMaschera`, `mascheraRiserva`, `uscita`, `uscitaEsterna`) VALUES
	('SC2', 'MS4', 'MS7', 'si', 'no'),
	('SC1', 'MS1', 'MS1', 'si', 'si');

-- Dump della struttura di tabella carnevalefibocchi.figurante_manichino
DROP TABLE IF EXISTS `figurante_manichino`;
CREATE TABLE IF NOT EXISTS `figurante_manichino` (
  `codManichino` varchar(50) NOT NULL,
  `codMaschera` varchar(50) NOT NULL,
  KEY `codManichino` (`codManichino`),
  KEY `codMaschera` (`codMaschera`),
  CONSTRAINT `figurante_manichino_ibfk_1` FOREIGN KEY (`codManichino`) REFERENCES `manichino` (`codManichino`),
  CONSTRAINT `figurante_manichino_ibfk_2` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.figurante_manichino: ~1 rows (circa)
INSERT INTO `figurante_manichino` (`codManichino`, `codMaschera`) VALUES
	('MN1', 'MS2');

-- Dump della struttura di tabella carnevalefibocchi.galleria
DROP TABLE IF EXISTS `galleria`;
CREATE TABLE IF NOT EXISTS `galleria` (
  `codFoto` varchar(50) NOT NULL,
  `percorso` varchar(255) NOT NULL,
  `codMaschera` varchar(50) NOT NULL,
  PRIMARY KEY (`codFoto`),
  KEY `codMaschera` (`codMaschera`),
  CONSTRAINT `galleria_ibfk_1` FOREIGN KEY (`codMaschera`) REFERENCES `maschera` (`codMaschera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.galleria: ~4 rows (circa)
INSERT INTO `galleria` (`codFoto`, `percorso`, `codMaschera`) VALUES
	('FT1', 'IMG-62e3e2aa9ac4c3.38166641.png', 'MS1'),
	('FT2', 'IMG-62e3e24ba90c74.36521260.png', 'MS2'),
	('FT3', 'IMG-62fd11fc50a606.35870220.jpg', 'MS3'),
	('FT4', 'IMG-62fd251b1989d1.73623807.jpg', 'MS4');

-- Dump della struttura di tabella carnevalefibocchi.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `codSocio` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL,
  PRIMARY KEY (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.login: ~4 rows (circa)
INSERT INTO `login` (`codSocio`, `psw`) VALUES
	('SC1', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
	('SC2', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
	('SC3', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
	('SC4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

-- Dump della struttura di tabella carnevalefibocchi.manichino
DROP TABLE IF EXISTS `manichino`;
CREATE TABLE IF NOT EXISTS `manichino` (
  `codManichino` varchar(50) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `codDeposito` varchar(50) NOT NULL,
  PRIMARY KEY (`codManichino`),
  KEY `codDeposito` (`codDeposito`),
  CONSTRAINT `manichino_ibfk_1` FOREIGN KEY (`codDeposito`) REFERENCES `deposito` (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.manichino: ~0 rows (circa)
INSERT INTO `manichino` (`codManichino`, `note`, `codDeposito`) VALUES
	('MN1', 'sdraiato', 'D1');

-- Dump della struttura di tabella carnevalefibocchi.manichino_evento
DROP TABLE IF EXISTS `manichino_evento`;
CREATE TABLE IF NOT EXISTS `manichino_evento` (
  `codManichino` varchar(50) NOT NULL,
  `codEvento` varchar(50) NOT NULL,
  `mascheraPrimaria` varchar(50) NOT NULL,
  KEY `codManichino` (`codManichino`),
  KEY `codEvento` (`codEvento`),
  CONSTRAINT `manichino_evento_ibfk_1` FOREIGN KEY (`codManichino`) REFERENCES `manichino` (`codManichino`),
  CONSTRAINT `manichino_evento_ibfk_2` FOREIGN KEY (`codEvento`) REFERENCES `evento` (`codEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.manichino_evento: ~0 rows (circa)
INSERT INTO `manichino_evento` (`codManichino`, `codEvento`, `mascheraPrimaria`) VALUES
	('MN1', 'E1', 'MS2');

-- Dump della struttura di tabella carnevalefibocchi.maschera
DROP TABLE IF EXISTS `maschera`;
CREATE TABLE IF NOT EXISTS `maschera` (
  `codMaschera` varchar(50) NOT NULL,
  `colore` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `riparazione` set('si','no') DEFAULT 'no',
  `codSarta` varchar(50) NOT NULL,
  `codDeposito` varchar(50) NOT NULL,
  `eliminato` set('si','no') DEFAULT 'no',
  PRIMARY KEY (`codMaschera`),
  KEY `codSarta` (`codSarta`),
  KEY `codDeposito` (`codDeposito`),
  CONSTRAINT `FK_sarta` FOREIGN KEY (`codSarta`) REFERENCES `sarta` (`codSarta`),
  CONSTRAINT `maschera_ibfk_1` FOREIGN KEY (`codSarta`) REFERENCES `sarta` (`codSarta`),
  CONSTRAINT `maschera_ibfk_2` FOREIGN KEY (`codDeposito`) REFERENCES `deposito` (`codDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.maschera: ~8 rows (circa)
INSERT INTO `maschera` (`codMaschera`, `colore`, `descrizione`, `riparazione`, `codSarta`, `codDeposito`, `eliminato`) VALUES
	('MS1', 'red', 'Arlecchino', 'si', 'S1', 'D1', 'si'),
	('MS2', 'black', 'Pulcinella', 'si', 'S1', 'D1', 'no'),
	('MS3', 'green', 'Burlamacco', 'si', 'S1', 'D1', 'no'),
	('MS4', '#00ecf0', 'Brighella', 'no', 'S2', 'D1', 'no'),
	('MS5', '#ff7a7a', 'Mosaico', 'no', 'S1', 'D1', 'no'),
	('MS6', '#dd31cf', 'Arlecchino', 'no', 'S2', 'D1', 'no'),
	('MS7', '#ffdd00', 'Piumina', 'no', 'S1', 'D1', 'no'),
	('MS8', '#c800ff', 'Malagioia', 'no', 'S1', 'D1', 'no');

-- Dump della struttura di tabella carnevalefibocchi.pagamento_tessera
DROP TABLE IF EXISTS `pagamento_tessera`;
CREATE TABLE IF NOT EXISTS `pagamento_tessera` (
  `codPagamento` varchar(50) NOT NULL,
  `anno` year(4) NOT NULL,
  `dataPagamento` date NOT NULL,
  `codTessera` varchar(50) NOT NULL,
  PRIMARY KEY (`codPagamento`) USING BTREE,
  KEY `FK_tessera` (`codTessera`),
  CONSTRAINT `FK_tessera` FOREIGN KEY (`codTessera`) REFERENCES `tessera` (`codTessera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.pagamento_tessera: ~0 rows (circa)

-- Dump della struttura di tabella carnevalefibocchi.riparazione
DROP TABLE IF EXISTS `riparazione`;
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

-- Dump dei dati della tabella carnevalefibocchi.riparazione: ~0 rows (circa)
INSERT INTO `riparazione` (`codMaschera`, `codSarta`, `inizioRiparazione`, `fineRiparazione`, `note`) VALUES
	('MS2', 'S1', '2023-01-31', NULL, 'taglio');

-- Dump della struttura di tabella carnevalefibocchi.sarta
DROP TABLE IF EXISTS `sarta`;
CREATE TABLE IF NOT EXISTS `sarta` (
  `codSarta` varchar(50) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  PRIMARY KEY (`codSarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.sarta: ~2 rows (circa)
INSERT INTO `sarta` (`codSarta`, `nome`, `cognome`, `costo`) VALUES
	('S1', 'Igor', 'Rogi', 10),
	('S2', 'Lucrezia', 'Lucrenti', 2);

-- Dump della struttura di tabella carnevalefibocchi.socio
DROP TABLE IF EXISTS `socio`;
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
  `eliminato` set('si','no') DEFAULT 'no',
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codSocio`),
  KEY `codCarica` (`codCarica`),
  CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`codCarica`) REFERENCES `carica` (`codCarica`),
  CONSTRAINT `socio_ibfk_2` FOREIGN KEY (`codCarica`) REFERENCES `carica` (`codCarica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.socio: ~5 rows (circa)
INSERT INTO `socio` (`codSocio`, `nome`, `cognome`, `via`, `citta`, `provincia`, `cf`, `cell`, `dataIscrizione`, `figurante`, `staff`, `codCarica`, `eliminato`, `email`) VALUES
	('SC1', 'caio', 'ROMA', 'Guido Monaco', 'A', 'Arezzo', 'RSSMRA80A01A390R', '23423', '2023-01-31', 'no', 'no', 'C1', 'no', NULL),
	('SC2', 'Michele', 'Brunostrati', 'Via Governo 22B', 'Bibbiena', 'Arezzo', 'MCHBNS80A01A851Q', '675314312', '2023-01-31', 'si', 'si', 'C1', 'si', NULL),
	('SC3', 'caio', 'GEPPETTO', 'Guido Monaco', 'A', 'Arezzo', 'CRSLNS04S21A509G', '213432', '2023-01-31', 'no', 'no', 'C4', 'no', NULL),
	('SC4', 'caio', 'GEPPETTO', 'Guido Monaco', 'efwff', 'ffff', 'CRSLNS04S21A509G', '21334', '2023-02-02', 'no', 'si', 'C2', 'no', NULL),
	('SC5', 'Falier', 'Biagioni', 'Via setteponti 92/A', 'Castiglion Fibocchi', 'Arezzo', 'BGNFLR78B11A390R', '3409127619', '2000-01-11', 'si', 'si', 'C4', 'no', NULL);

-- Dump della struttura di tabella carnevalefibocchi.socio_evento
DROP TABLE IF EXISTS `socio_evento`;
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

-- Dump dei dati della tabella carnevalefibocchi.socio_evento: ~2 rows (circa)
INSERT INTO `socio_evento` (`codSocio`, `codEvento`, `mascheraPrimaria`, `mascheraSecondaria`) VALUES
	('SC1', 'E1', 'MS1', 'MS3'),
	('SC2', 'E1', 'MS4', 'MS3');

-- Dump della struttura di tabella carnevalefibocchi.tessera
DROP TABLE IF EXISTS `tessera`;
CREATE TABLE IF NOT EXISTS `tessera` (
  `codTessera` varchar(50) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `attiva` set('si','no') DEFAULT 'si',
  `codSocio` varchar(50) NOT NULL,
  `dataErogazione` date DEFAULT NULL,
  PRIMARY KEY (`codTessera`),
  KEY `idTipo` (`idTipo`),
  KEY `codSocio` (`codSocio`),
  CONSTRAINT `tessera_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo_tessera` (`idTipo`),
  CONSTRAINT `tessera_ibfk_2` FOREIGN KEY (`idTipo`) REFERENCES `tipo_tessera` (`idTipo`),
  CONSTRAINT `tessera_ibfk_3` FOREIGN KEY (`codSocio`) REFERENCES `socio` (`codSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.tessera: ~5 rows (circa)
INSERT INTO `tessera` (`codTessera`, `idTipo`, `attiva`, `codSocio`, `dataErogazione`) VALUES
	('TS1', 2, 'si', 'SC1', '2023-02-02'),
	('TS2', 1, 'no', 'SC2', '2023-02-02'),
	('TS3', 3, 'si', 'SC3', '2023-02-02'),
	('TS4', 3, 'si', 'SC4', '2023-02-02'),
	('TS5', 1, 'si', 'SC2', '2023-02-02'),
	('TS6', 3, 'si', 'SC5', '2023-02-02');

-- Dump della struttura di tabella carnevalefibocchi.tipo_tessera
DROP TABLE IF EXISTS `tipo_tessera`;
CREATE TABLE IF NOT EXISTS `tipo_tessera` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipologia` varchar(255) NOT NULL,
  `prezzo` int(11) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella carnevalefibocchi.tipo_tessera: ~3 rows (circa)
INSERT INTO `tipo_tessera` (`idTipo`, `tipologia`, `prezzo`) VALUES
	(1, 'membro onorario', 0),
	(2, 'minorenne', 5),
	(3, 'maggiorenne', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
