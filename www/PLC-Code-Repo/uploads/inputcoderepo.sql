-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2024 at 05:09 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `input-coderepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `submission_form`
--

CREATE TABLE `submission_form` (
  `submissionID` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `programfile` blob NOT NULL,
  `supplementalfile` blob NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `programmertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `realworldsys` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_form`
--

INSERT INTO `submission_form` (`submissionID`, `programfile`, `supplementalfile`, `vendor`, `lang`, `programmertype`, `realworldsys`) VALUES
('65eb470a86214', 0x696e646570656e64656e742d73746172742d73746f702e70726f6a656374, 0x74657374537570706c656d656e74616c2e747874, 'CODESYS', 'Ladder Logic', 'Industry Professional', 'No'),
('65f0a78762297', 0x53545f4c617463682e70726f6a656374, 0x74657374537570706c656d656e74616c2e747874, 'CODESYS', 'Ladder Logic', 'Select a role', 'No');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
