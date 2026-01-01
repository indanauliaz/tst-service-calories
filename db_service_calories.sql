-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2026 at 06:23 PM
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
-- Database: `db_service_calories`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `food_key` varchar(100) DEFAULT NULL,
  `calories` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `food_key`, `calories`) VALUES
(1, 'buttermilk', 127),
(2, 'cornstarch', 275),
(3, 'cheese', 240),
(4, 'cream cheese', 105),
(5, 'butter', 100),
(6, 'mayonnaise', 110),
(7, 'olive oil', 125),
(8, 'chicken', 185),
(9, 'lobster', 92),
(10, 'mackerel', 155),
(11, 'shrimp', 110),
(12, 'celery', 20),
(13, 'cucumbers', 6),
(14, 'eggplant', 30),
(15, 'lettuce', 14),
(16, 'onions', 80),
(17, 'parsley', 2),
(18, 'spinach', 26),
(19, 'tomatoes', 50),
(20, 'fresh', 55),
(21, 'avocado', 185),
(22, 'blueberries', 245),
(23, 'cantaloupe', 40),
(24, 'cherries', 100),
(25, 'figs', 120),
(26, 'grapes', 70),
(27, 'lemon juice', 30),
(28, 'orange juice', 112),
(29, 'frozen', 330),
(30, 'peaches', 200),
(31, 'pineapple', 95),
(32, 'raisins', 230),
(33, 'strawberries', 242),
(34, 'watermelon', 120),
(35, 'flour', 460),
(36, 'rice', 748),
(37, 'white', 692),
(38, 'bouillon', 24),
(39, 'chicken soup', 75),
(40, 'vegetable', 80),
(41, 'marshmallows', 98),
(42, 'honey', 120),
(43, 'ices', 117),
(44, 'mince', 340),
(45, 'pecans', 343),
(46, 'walnuts', 325);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
