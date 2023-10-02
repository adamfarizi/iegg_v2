-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iegg_data`
CREATE DATABASE iegg_data;
--

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `ID_MONITOR` int(11) NOT NULL,
  `SUHU` int(11) DEFAULT NULL,
  `KELEMBABAN` int(11) DEFAULT NULL,
  `WAKTU` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`ID_MONITOR`, `SUHU`, `KELEMBABAN`, `WAKTU`) VALUES
(2241, 33, 65, '2023-04-15 00:00:00'),
(2242, 37, 65, '2023-04-17 00:00:00'),
(2243, 37, 65, '2023-04-17 00:00:00'),
(2244, 32, 65, '2023-04-18 00:00:00'),
(2245, 33, 65, '2023-04-18 00:00:00'),
(2246, 35, 65, '2023-04-18 00:00:00'),
(2247, 36, 65, '2023-04-18 00:00:00'),
(2248, 33, 65, '2023-04-18 00:00:00'),
(2249, 32, 65, '2023-04-18 00:00:00'),
(2250, 33, 65, '2023-04-18 00:00:00'),
(2251, 37, 65, '2023-04-17 00:00:00'),
(2252, 37, 65, '2023-04-17 00:00:00'),
(2253, 37, 65, '2023-04-17 00:00:00'),
(2254, 33, 65, '2023-04-15 00:00:00'),
(2255, 33, 65, '2023-04-15 00:00:00'),
(2256, 33, 65, '2023-04-15 00:00:00'),
(2257, 33, 65, '2023-04-15 00:00:00'),
(2258, 35, 65, '2023-04-16 00:00:00'),
(2259, 35, 65, '2023-04-16 00:00:00'),
(2260, 35, 65, '2023-04-16 00:00:00'),
(2261, 35, 65, '2023-04-16 00:00:00'),
(2262, 35, 65, '2023-04-16 00:00:00'),
(2263, 33, 65, '2023-04-18 00:00:00'),
(2663, 20, 60, '2023-04-18 00:00:00'),
(2664, 22, 55, '2023-04-18 03:00:00'),
(2665, 25, 50, '2023-04-18 06:00:00'),
(2666, 23, 52, '2023-04-18 09:00:00'),
(2667, 21, 58, '2023-04-18 12:00:00'),
(2668, 19, 56, '2023-04-19 00:00:00'),
(2669, 23, 53, '2023-04-19 03:00:00'),
(2670, 26, 48, '2023-04-19 06:00:00'),
(2671, 24, 51, '2023-04-19 09:00:00'),
(2672, 20, 57, '2023-04-19 12:00:00'),
(2673, 21, 59, '2023-04-20 00:00:00'),
(2674, 24, 54, '2023-04-20 03:00:00'),
(2675, 27, 47, '2023-04-20 06:00:00'),
(2676, 25, 50, '2023-04-20 09:00:00'),
(2677, 22, 56, '2023-04-20 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penetasan`
--

CREATE TABLE `penetasan` (
  `ID_KLOTER` int(11) NOT NULL,
  `ID_PETERNAK` int(11) DEFAULT NULL,
  `NO_KLOTER` int(10) NOT NULL,
  `TGL_MASUK` date DEFAULT NULL,
  `JMLH_TELUR` int(11) DEFAULT NULL,
  `PRED_MENETAS` date DEFAULT NULL,
  `KET_MENETAS` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penetasan`
--

INSERT INTO `penetasan` (`ID_KLOTER`, `ID_PETERNAK`, `NO_KLOTER`, `TGL_MASUK`, `JMLH_TELUR`, `PRED_MENETAS`, `KET_MENETAS`) VALUES
(1, 438, 1, '2023-05-11', 200, '2023-05-30', 100),
(2, 438, 2, '2023-05-11', 100, '2023-05-30', 100),
(3, 438, 3, '2023-05-11', 100, '2023-05-25', 100),
(6, 438, 4, '2023-05-25', 300, '2023-05-31', 143),
(7, 560, 1, '2023-05-11', 100, '2023-05-14', 50),
(8, 438, 5, '2023-05-21', 150, '2023-06-10', 113),
(9, 438, 6, '2023-05-12', 150, '2023-05-30', 120),
(10, 438, 7, '2023-05-01', 250, '2023-05-12', 222),
(11, 438, 8, '2023-05-12', 150, '2023-05-23', 100),
(12, 438, 9, '2023-05-12', 150, '2023-05-22', 97),
(13, 438, 10, '2023-05-12', 150, '2023-05-31', 116),
(14, 438, 11, '2023-05-05', 150, '2023-05-27', 100),
(15, 438, 12, '2023-05-12', 50, '2023-05-21', 50),
(16, 438, 13, '2023-05-12', 200, '2023-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peternak`
--

CREATE TABLE `peternak` (
  `ID_PETERNAK` int(11) NOT NULL,
  `NAMA_PETERNAK` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peternak`
--

INSERT INTO `peternak` (`ID_PETERNAK`, `NAMA_PETERNAK`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(438, 'Bagus Adam', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(560, 'Adam Test', 'adam', 'adam@gmail.com', '1d7c2923c1684726dc23d2901c4d8157');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`ID_MONITOR`);

--
-- Indexes for table `penetasan`
--
ALTER TABLE `penetasan`
  ADD PRIMARY KEY (`ID_KLOTER`),
  ADD KEY `FK_MENGELOLA` (`ID_PETERNAK`);

--
-- Indexes for table `peternak`
--
ALTER TABLE `peternak`
  ADD PRIMARY KEY (`ID_PETERNAK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penetasan`
--
ALTER TABLE `penetasan`
  MODIFY `ID_KLOTER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penetasan`
--
ALTER TABLE `penetasan`
  ADD CONSTRAINT `FK_MENGELOLA` FOREIGN KEY (`ID_PETERNAK`) REFERENCES `peternak` (`ID_PETERNAK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
