-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2024 at 08:49 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hommukax_ikt`
--

-- --------------------------------------------------------

--
-- Table structure for table `Kalender`
--

CREATE TABLE `Kalender` (
  `Urituse_ID` int(11) DEFAULT NULL,
  `Pealkiri` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Praktika`
--

CREATE TABLE `Praktika` (
  `Firma_nimi` varchar(255) NOT NULL,
  `Algusaeg` datetime DEFAULT NULL,
  `Loppaeg` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Tunnustused`
--

CREATE TABLE `Tunnustused` (
  `Tunnustuse_ID` int(11) NOT NULL,
  `Eesnimi` varchar(255) DEFAULT NULL,
  `Perenimi` varchar(255) DEFAULT NULL,
  `Uritus` varchar(255) DEFAULT NULL,
  `Kuupäev` date DEFAULT NULL,
  `Autasu` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Uritused`
--

CREATE TABLE `Uritused` (
  `Urituse_ID` int(11) NOT NULL,
  `Tekst` text DEFAULT NULL,
  `Korraldaja` varchar(255) DEFAULT NULL,
  `Kuupaev` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Uudised`
--

CREATE TABLE `Uudised` (
  `Uudise_ID` int(11) NOT NULL,
  `Pilt` longblob DEFAULT NULL,
  `Tekst` text DEFAULT NULL,
  `Kuupaev` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Kalender`
--
ALTER TABLE `Kalender`
  ADD KEY `Urituse_ID` (`Urituse_ID`) USING BTREE;

--
-- Indexes for table `Praktika`
--
ALTER TABLE `Praktika`
  ADD PRIMARY KEY (`Firma_nimi`);

--
-- Indexes for table `Tunnustused`
--
ALTER TABLE `Tunnustused`
  ADD PRIMARY KEY (`Tunnustuse_ID`);

--
-- Indexes for table `Uritused`
--
ALTER TABLE `Uritused`
  ADD PRIMARY KEY (`Urituse_ID`);

--
-- Indexes for table `Uudised`
--
ALTER TABLE `Uudised`
  ADD PRIMARY KEY (`Uudise_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Tunnustused`
--
ALTER TABLE `Tunnustused`
  MODIFY `Tunnustuse_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Uritused`
--
ALTER TABLE `Uritused`
  MODIFY `Urituse_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Uudised`
--
ALTER TABLE `Uudised`
  MODIFY `Uudise_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
