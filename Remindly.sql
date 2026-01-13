-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 09:57 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'scuola'),
(2, 'lavoro'),
(3, 'hobby'),
(4, 'casa');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

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
(63, 'Compiti matematica', 'Completare esercizi algebra', '2026-01-20', 0, 1, 1),
(64, 'Progetto scienze', 'Preparare esperimento laboratorio', '2026-01-15', 1, 1, 1),
(65, 'Lavoro extra', 'Revisionare report', '2026-01-22', 0, 1, 2),
(66, 'Pulizia casa', 'Riordinare camera', '2026-01-10', 1, 1, 4),
(67, 'Pittura hobby', 'Completare disegno', '2026-01-25', 0, 1, 3),
(68, 'Incontro scuola', 'Partecipare riunione genitori', '2026-01-12', 1, 1, 1),
(69, 'Documenti lavoro', 'Preparare documenti da consegnare', '2026-01-27', 0, 1, 2),
(70, 'Giardinaggio', 'Potare piante', '2026-01-28', 0, 1, 4),
(71, 'Lezione chitarra', 'Ripetere scale', '2026-01-09', 0, 1, 3),
(72, 'Studio storia', 'Leggere capitolo 5', '2026-01-30', 0, 1, 1),
(73, 'Compiti italiano', 'Scrivere tema', '2026-01-21', 0, 2, 1),
(74, 'Progetto lavoro', 'Preparare presentazione', '2026-01-14', 1, 2, 2),
(75, 'Fotografia hobby', 'Scattare foto paesaggi', '2026-01-23', 0, 2, 3),
(76, 'Spesa casa', 'Fare lista della spesa', '2026-01-11', 1, 2, 4),
(77, 'Laboratorio chimica', 'Esperimento acidi', '2026-01-26', 0, 2, 1),
(78, 'Report lavoro', 'Revisionare fogli Excel', '2026-01-13', 1, 2, 2),
(79, 'Decorazione casa', 'Appendere quadri', '2026-01-29', 0, 2, 4),
(80, 'Musica hobby', 'Esercitarsi al pianoforte', '2026-01-28', 0, 2, 3),
(81, 'Riunione scuola', 'Partecipare online', '2026-01-08', 0, 2, 1),
(82, 'Compiti matematica', 'Esercizi trigonometria', '2026-01-30', 0, 2, 1),
(83, 'Allenamento hobby', 'Corsa in montagna', '2026-01-22', 0, 3, 3),
(84, 'Progetto lavoro', 'Scrivere relazione', '2026-01-16', 1, 3, 2),
(85, 'Pulizia casa', 'Lavare bagno', '2026-01-24', 1, 3, 4),
(86, 'Compiti scuola', 'Esercizi geografia', '2026-01-10', 0, 3, 1),
(87, 'Pittura hobby', 'Disegnare acquerello', '2026-01-27', 0, 3, 3),
(88, 'Incontro lavoro', 'Riunione con team', '2026-01-12', 1, 3, 2),
(89, 'Cucina casa', 'Preparare cena', '2026-01-28', 0, 3, 4),
(90, 'Musica hobby', 'Prove canto', '2026-01-29', 0, 3, 3),
(91, 'Riunione scuola', 'Incontro con professore', '2026-01-09', 1, 3, 1),
(92, 'Studio inglese', 'Leggere capitolo 3', '2026-01-30', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

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
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utente` (`idUtente`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
