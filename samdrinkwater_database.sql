-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2024 at 04:05 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samdrinkwater_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `username`, `email`, `password`, `date_of_birth`, `address`, `join_date`, `last_login`) VALUES
(19, 'sam.drinkwater', 'sjdrinkwater@outlook.com', '$2y$10$dMVkGRgcOZtigKh4O1xofuimp8EVnYWJJ0lV9XcnSjlwtlNQgPJFK', '2000-05-03', '8 Hawthorn Street', '2023-01-20', '2023-02-14 10:57:07'),
(20, 'billy.robinson', 'billyrobinson@gmail.com', '$2y$10$OArdDtlBm0ak7BUzzn6utOhpIVjVQDH0g3DqoJFYYzZ6oczk20PFS', '1999-02-18', 'Beech House, Little Ouseburn, YO26 9TD', '2023-01-20', '2023-01-20 13:20:36'),
(21, 'rachel.jackson', 'rach.jackson@hotmail.co.uk', '$2y$10$o.4GINhAdDBnmjQ.pCkcJeF1jm9FxojJMFRh/kRNM2o24UU5jdqbq', '2003-11-16', '6 Belgrave Street, YO31 0XP', '2023-01-20', '2023-01-20 14:27:32'),
(22, 'bruce.drinkwater', 'bddrinkwater@outlook.com', '$2y$10$dDRH024qzwxRQPjdgbKY9OCqW6VODbeZJErFv4hXVER/saOAvwBcm', '1978-06-14', '232', '2023-01-20', '2023-01-20 17:02:33'),
(24, 'S', 'sjdrinkwater@outloo.com', '$2y$10$DEn2p1rueOnXJAUbkvgOCeCoMgn3NwZFT56jAR2bKbEgHjILZaEWG', '2023-02-15', '8 Hawthorn St', '2023-02-10', '2023-02-10 22:52:07'),
(25, 'aaa', 'aaa@aaa', '$2y$10$IdyMQJd4CG7IZKS89pPcHeESrx4eRcLmTuOaUrSwz.x4edfQvt9sy', '2001-01-01', 'here', '2023-02-14', '2023-02-14 10:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `player_weapons`
--

CREATE TABLE `player_weapons` (
  `player_id` int NOT NULL,
  `weapon_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `player_weapons`
--

INSERT INTO `player_weapons` (`player_id`, `weapon_id`) VALUES
(19, 7),
(22, 7),
(21, 8),
(24, 9),
(20, 12),
(25, 13);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `player_id` int NOT NULL,
  `rank` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`player_id`, `rank`) VALUES
(19, 2605),
(20, 122),
(21, 16884),
(22, 664),
(24, 58),
(25, 43);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `player_id` int NOT NULL,
  `wins` int DEFAULT NULL,
  `losses` int DEFAULT NULL,
  `kills` int DEFAULT NULL,
  `deaths` int DEFAULT NULL,
  `k_d` float DEFAULT NULL,
  `headshots` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`player_id`, `wins`, `losses`, `kills`, `deaths`, `k_d`, `headshots`) VALUES
(19, 856, 106, 8876, 6823, 1.30089, 2111),
(20, 12, 1, 765, 565, 1.35398, 85),
(21, 5787, 2744, 53097, 15902, 3.33901, 7802),
(22, 321, 323, 221, 22, 10.0455, 321),
(24, 12, 2, 125, 13, 9.61539, 173),
(25, 20, 1, 27, 4, 6.75, 2);

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE `weapons` (
  `weapon_id` int NOT NULL,
  `weapon_name` varchar(255) NOT NULL,
  `weapon_type` varchar(255) NOT NULL,
  `damage` int NOT NULL,
  `accuracy` decimal(5,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`weapon_id`, `weapon_name`, `weapon_type`, `damage`, `accuracy`, `image`) VALUES
(1, 'Glock-18', 'Pistol', 24, '0.50', 'Glock-18.jpg'),
(4, 'AK-47', 'Assault Rifle', 48, '0.65', 'AK-47.jpg'),
(5, 'M4A4', 'Assault Rifle', 72, '0.60', 'M4A4.jpg'),
(6, 'AUG', 'Assault Rifle', 67, '0.90', 'AUG.jpg'),
(7, 'P90', 'Submachine Gun', 47, '0.30', 'P90.jpg'),
(8, 'AWP', 'Sniper Rifle', 100, '1.00', 'AWP.jpg'),
(9, 'Desert Eagle', 'Pistol', 100, '0.97', 'Deagle.jpg'),
(10, 'USP-S', 'Pistol', 73, '0.82', 'USP-S.jpg'),
(11, 'Nova', 'Shotgun', 100, '1.00', 'nova.jpg'),
(12, 'Negev', 'Light Machine Gun', 73, '0.46', 'negev.jpg'),
(13, 'FAMAS', 'Assault Rifle', 69, '0.77', 'famas.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `player_weapons`
--
ALTER TABLE `player_weapons`
  ADD PRIMARY KEY (`player_id`,`weapon_id`),
  ADD KEY `weapon_id` (`weapon_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`weapon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `weapon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player_weapons`
--
ALTER TABLE `player_weapons`
  ADD CONSTRAINT `player_weapons_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`),
  ADD CONSTRAINT `player_weapons_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `weapons` (`weapon_id`);

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`);

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
