-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2025 at 11:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id`, `name`, `location`) VALUES
(1, 'Mojiken', 'Surabaya, Indonesia'),
(2, 'ConcernedApe', 'Seattle, United States'),
(3, 'Mojang Studios', 'Stockholm, Sweden'),
(4, 'Rusty Lake', 'Amsterdam, Netherlands'),
(5, 'Maxis', 'California, United States');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `developer_id` int NOT NULL,
  `publisher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `description`, `developer_id`, `publisher_id`) VALUES
(1, 'A Space for The Unbound', 'Self-discovery through a possible POV of dearest late friend.', 1, 1),
(2, 'Stardew Valley', 'Develop your inherited-from-grandpa-farm to escape mundane and stressing worker lyfe.', 2, 2),
(3, 'Minecraft', 'Self-explanatory. Mining and Crafting.', 3, 3),
(4, 'Cube Escape', 'Solve the misteries to escape from series of eerie and daunting situation.', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `location`) VALUES
(1, 'Toge Production', 'Tangerang, Indonesia'),
(2, 'ConcernedApe', 'Seattle, United States'),
(3, 'Xbox Game Studios', 'Washington, United States'),
(4, 'Rusty Lake', 'Amsterdam, Netherlands'),
(5, 'Electronic Arts', 'California, United States');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developer_id` (`developer_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
