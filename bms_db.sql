-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 06:14 PM
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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ip_addr` varchar(32) NOT NULL,
  `ip_loc` varchar(128) NOT NULL,
  `org` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `os` varchar(32) NOT NULL,
  `net_prov` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `model` varchar(64) NOT NULL,
  `device` varchar(64) NOT NULL,
  `resolution` varchar(32) NOT NULL,
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
  `id` int(11) NOT NULL,
  `author` int(8) NOT NULL,
  `title` varchar(256) NOT NULL,
  `permalink` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `contents` text NOT NULL,
  `tags` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `permalink`, `category`, `date`, `contents`, `tags`) VALUES
(6, 1, 'SummerNote Test1', 'summernote-test1', 'Bisnis, Ekonomi, Bola', '2023-03-13 05:32:52', '<p>This is a Summ<font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">erNote exampl</font>e1.1212</p>', 'tag1, tag2, asdasd, sds'),
(7, 1, 'SummerNote Test2', 'summernote-test2', 'Bisnis, Ekonomi', '2023-10-13 11:23:27', '<p>This is other SummerNote example.</p>', 'tag1, tag2'),
(8, 1, 'SummerNote Test3', 'summernote-test3', 'Bisnis, Ekonomi', '2023-11-13 14:07:46', '<p>This is another SummerNote example.</p>', 'tag1, tag2'),
(9, 1, 'SummerNote Test4', 'summernote-test4', 'Bisnis, Ekonomi', '2023-11-13 14:23:18', '<p>This is SummerNote example 4.</p>', 'tag1, tag2'),
(10, 1, 'SummerNote 5', 'summernote-5', 'Bisnis, Ekonomi', '2023-11-13 14:52:11', '<p>This is SummerNote example 5.</p>', 'tag1, tag2'),
(12, 1, 'SummerNote Test 6', 'summernote-test-6', 'Bisnis, Ekonomi', '2023-11-13 15:42:52', '<p>This is SumerNote example 6.</p>', 'tag1, tag2');

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
(1, 'admin@gmail.com', '$2y$10$rSiDuaRdElqLRUEoKSE1MOMgvEWBEb0XZvVX7.gKjW9O51PBRAVc6', 'Jason Alava', 'admin', 6280744585, 2000),
(5, 'user@gmail.com', '$2y$10$AxIVbqHp//WdmL4UgmnViehqA3U/7.OVV9/QuTdiCKdgAsPpF/glS', 'Allen Miguel', 'author', 123123, 3000);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `author_idx` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
