-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 10:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remindly`
--
CREATE DATABASE IF NOT EXISTS `remindly` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `remindly`;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`) VALUES
(5, 'Lavoro'),
(6, 'Scuola'),
(7, 'Sport'),
(8, 'Famiglia'),
(9, 'Amici'),
(10, 'Salute'),
(11, 'Tempo libero'),
(12, 'Viaggi'),
(13, 'Feste'),
(14, 'Altro');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `scadenza` date NOT NULL,
  `completato` tinyint(1) NOT NULL DEFAULT 0,
  `idUtente` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`idEvento`, `titolo`, `descrizione`, `scadenza`, `completato`, `idUtente`, `idCategoria`) VALUES
(99, 'Riunione lavoro', 'Discussione progetto con il team', '2026-01-10', 1, 1, 5),
(100, 'Consegna compiti scuola', 'Preparare esercizi di matematica', '2026-01-12', 1, 1, 6),
(101, 'Partita di calcio', 'Allenamento con amici', '2026-01-14', 0, 1, 7),
(102, 'Cena in famiglia', 'Serata con i parenti', '2026-01-16', 1, 1, 8),
(103, 'Uscita con amici', 'Cinema o pizza', '2026-01-18', 0, 1, 9),
(104, 'Visita medica', 'Controllo annuale dal dottore', '2026-01-20', 0, 1, 10),
(105, 'Lettura libro', 'Finire il libro di storia', '2026-01-22', 1, 1, 11),
(106, 'Passeggiata al parco', 'Camminata per rilassarsi', '2026-01-24', 0, 1, 12),
(107, 'Festa di compleanno', 'Compleanno cugino', '2026-01-26', 0, 1, 13),
(108, 'Pulizia casa', 'Riordinare camere e salotto', '2026-01-28', 0, 1, 14),
(109, 'Incontro lavoro cliente', 'Presentazione nuovo prodotto', '2026-01-30', 0, 1, 5),
(110, 'Studio storia', 'Preparare appunti per interrogazione', '2026-02-01', 0, 1, 6),
(111, 'Allenamento palestra', 'Circuito completo', '2026-02-03', 0, 1, 7),
(112, 'Cena con amici', 'Provare nuovo ristorante', '2026-02-05', 0, 1, 9),
(113, 'Viaggio weekend', 'Visitare città vicina', '2026-02-07', 0, 1, 12),
(114, 'Riunione ufficio', 'Discussione budget trimestrale', '2026-01-11', 1, 2, 5),
(115, 'Compiti inglese', 'Scrivere saggio breve', '2026-01-13', 0, 2, 6),
(116, 'Allenamento nuoto', '50 vasche in piscina', '2026-01-15', 0, 2, 7),
(117, 'Pranzo famiglia', 'Riunione domenicale', '2026-01-17', 1, 2, 8),
(118, 'Cinema con amici', 'Guardare nuovo film', '2026-01-19', 0, 2, 9),
(119, 'Visita dentista', 'Controllo semestrale', '2026-01-21', 0, 2, 10),
(120, 'Yoga mattutino', 'Lezione di gruppo', '2026-01-23', 0, 2, 11),
(121, 'Weekend montagna', 'Escursione e relax', '2026-01-25', 0, 2, 12),
(122, 'Festa compleanno', 'Festeggiamenti in casa', '2026-01-27', 0, 2, 13),
(123, 'Pulizie generali', 'Casa e garage', '2026-01-29', 0, 2, 14),
(124, 'Incontro clienti', 'Presentazione progetti', '2026-01-31', 0, 2, 5),
(125, 'Studio matematica', 'Ripasso teoremi', '2026-02-02', 0, 2, 6),
(126, 'Palestra serale', 'Sessione gambe', '2026-02-04', 0, 2, 7),
(127, 'Cena amici', 'Serata pizza', '2026-02-06', 1, 2, 9),
(128, 'Viaggio breve', 'Visitare città d’arte', '2026-02-08', 0, 2, 12),
(129, 'Meeting lavoro', 'Discussione progetto software', '2026-01-10', 1, 3, 5),
(130, 'Compiti scienze', 'Esperimento laboratorio', '2026-01-12', 0, 3, 6),
(131, 'Partita tennis', 'Allenamento con amici', '2026-01-14', 0, 3, 7),
(132, 'Cena di famiglia', 'Serata domenicale', '2026-01-16', 1, 3, 8),
(133, 'Uscita con amici', 'Serata giochi', '2026-01-18', 0, 3, 9),
(134, 'Controllo medico', 'Visita di routine', '2026-01-20', 0, 3, 10),
(135, 'Lettura romanzo', 'Romanzo giallo da finire', '2026-01-22', 1, 3, 11),
(136, 'Passeggiata al lago', 'Relax pomeridiano', '2026-01-24', 0, 3, 12),
(137, 'Festa anniversario', 'Festeggiamenti in famiglia', '2026-01-26', 0, 3, 13),
(138, 'Riordino casa', 'Pulizie generali', '2026-01-28', 0, 3, 14),
(139, 'Incontro con clienti', 'Discussione contratti', '2026-01-30', 0, 3, 5),
(140, 'Studio storia', 'Ripasso eventi storici', '2026-02-01', 0, 3, 6),
(141, 'Allenamento palestra', 'Cardio e pesi', '2026-02-03', 0, 3, 7),
(142, 'Cena con amici', 'Provare nuovo ristorante', '2026-02-05', 1, 3, 9),
(143, 'Viaggio weekend', 'Escursione in montagna', '2026-02-07', 0, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
CREATE TABLE `utente` (
  `idUtente` int(11) NOT NULL,
  `nomeUtente` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomeAnagrafico` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `data_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`idUtente`, `nomeUtente`, `password`, `nomeAnagrafico`, `cognome`, `data_nascita`) VALUES
(1, 'ilVecio', '$2y$10$.zdyVT1mVHRK6NfYQVz7tetQLs63FUcbMFLj4ytDTiAlqQoGw1vjS', 'Lorenzo', 'Floriani', '2007-09-04'),
(2, 'loZio', '$2y$10$t1jx9ayvJdJOd4sJ5.AIV.ga1jOUZatXw4y6evjeCzMn7CnsymlE.', 'Alberto', 'Cavallari', '2007-01-01'),
(3, 'pieMandorla', '$2y$10$EyZur.4x9oTHe/rKnw63/etmg0xrOY/5I3f7OTJ5yoFoZZE/Cuaya', 'Pietro', 'Avi', '2007-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idUtente` (`idUtente`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`idUtente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utente` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
