-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2025 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moj-budzet`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `tip` enum('prihod','rashod') NOT NULL,
  `iznos` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`, `tip`, `iznos`, `user_id`) VALUES
(2, 'Kirija', 'rashod', 30000.00, 1),
(3, 'Hrana', 'rashod', 50000.00, 1),
(6, 'Plata', 'prihod', 100000.00, 2),
(7, 'Plata', 'prihod', 100000.00, 1),
(19, 'Plata', 'prihod', 1000001.31, 4),
(20, 'Teretana', 'rashod', 5000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'PeraPeric', '$2y$10$jF5znXdrA3W.0WuYB7iMy.Y3.YIxn0irzFvTQFL8zM.KjZFhPBQ9K'),
(2, 'MikaMikic', '$2y$10$7qIPeB1AKmknjcZzfE5Wp.hKxxs7f9tPn2Ivamc6Gj3YnqhKBe7ii'),
(4, 'IvoAndric', '$2y$10$FbSTzp77/5v7zMwrBU0VU.3ENDVooHERkl0uEHSQdY5KSIYLDZbJq'),
(9, 'luka', '$2y$10$UC5ZA/.GZBmVVEhZKsNOm.zyN8sv7GTGjj3xZM5uuh/M/SLk14Fp6'),
(11, 'Kupac', '$2y$10$2LEYzNnuo2M4Kl1mjBHtyOhEKlfAkrdH5Iwzmk/pspFy3MxCGFl1C'),
(13, 'asd', '$2y$10$JeUUCS/40KpyAVBcP/E4ZuTWPTGfiFQufoZtp4CTh8k.so0tuKRaq'),
(14, 'test', '$2y$10$olhaduAQ1IYr2Fm.4RbD7uTN9PXkdAuAVk5faO5vZt2xKHlXq5HAm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD CONSTRAINT `kategorije_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `korisnici` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
