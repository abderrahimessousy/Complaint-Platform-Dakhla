-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 01:04 AM
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
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `user` varchar(100) NOT NULL,
  `mod_passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`user`, `mod_passe`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `National_id` varchar(50) NOT NULL,
  `nom_prenom` varchar(50) DEFAULT NULL,
  `date_entreetravail` date DEFAULT NULL,
  `date_fintravail` date DEFAULT NULL,
  `N_telephoneemp` varchar(50) DEFAULT NULL,
  `Genre` varchar(50) DEFAULT NULL,
  `Nom_entreprise` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `N_telephoneempr` varchar(50) DEFAULT NULL,
  `plainte` varchar(50) DEFAULT NULL,
  `demandes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`National_id`, `nom_prenom`, `date_entreetravail`, `date_fintravail`, `N_telephoneemp`, `Genre`, `Nom_entreprise`, `adresse`, `N_telephoneempr`, `plainte`, `demandes`) VALUES
('OD45872', ' ABDERRAHIM ES SOUSY', '2025-07-10', '2025-07-08', '0659531422', 'Homme', 'ABDERRAHIM ES SOUSY', 'hay salam rue 39 nr 12 dakhla', '0659531422', ' i have a problem', '  التعويض عن سابق الاعلام'),
('yy', ' ABDERRAHIM ES SOUSY', '2025-07-02', '2025-07-17', '0659531422', 'Homme', 'ABDERRAHIM ES SOUSY', 'hay salam rue 39 nr 12 dakhla', '0659531422', ' HBJH', '  التعويض عن سابق الاعلام');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`National_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
