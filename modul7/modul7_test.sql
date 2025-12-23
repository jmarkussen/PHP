-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24. Nov, 2025 10:00 AM
-- Tjener-versjon: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul7_test`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `testbrukere`
--

CREATE TABLE `testbrukere` (
  `id` int(11) NOT NULL,
  `navn` varchar(100) NOT NULL,
  `epost` varchar(100) NOT NULL,
  `registreringsdato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `testbrukere`
--

INSERT INTO `testbrukere` (`id`, `navn`, `epost`, `registreringsdato`) VALUES
(1, 'Test Bruker 1', 'test1@example.com', '2025-11-24'),
(2, 'Test Bruker 2', 'test2@example.com', '2025-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testbrukere`
--
ALTER TABLE `testbrukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `epost` (`epost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testbrukere`
--
ALTER TABLE `testbrukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
