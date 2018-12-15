-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2018 at 08:48 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ISproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `course` varchar(50) COLLATE utf8_bin NOT NULL,
  `grade` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` enum('TA','Student','DR') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'mohamed saeed', 'mo', '1', 'TA'),
(2, 'sdf', '', '$2y$10$5319xPoRxaqjvddf6UdwXuJKVSP4dnVwhT4f.Yghk7sz8YUcsR2jC', ''),
(3, 'zezi', 'smsms', '$2y$10$2L28TSQ.D1sPUhFgABBgouIvyYdEziniLIjCwTEKL2tNArZzbWqW6', 'TA'),
(8, 'kiko', 'sdfdsf', '$2y$10$MYWzGeA.7o91k4OgwgOQ4OGv5HzAsm9IxfzbpQj1Q/8aam8I6bx.S', ''),
(9, 'sdfdfs', 'dfsdfdf', '$2y$10$7mBVA5c5aRAv032amyhAYuokZz2k4.4TX2MmbKpHkZYx1ahVefCx2', 'Student'),
(10, 'zeyad', 'zero', '$2y$10$HiszVKtslqroJYLRFS6r4eVHUy8bjaJK667KIlep4pMXp5kEXuqRa', 'DR'),
(11, 'ss', 'ss', '$2y$10$ZL1cNxcYnpI4ywoR7jz0k.UdGv9pDndIjLPh5jW7KdK.so55Nf/4.', 'DR'),
(12, 'xx', 'xx', '9336ebf25087d91c818ee6e9ec29f8c1', 'DR'),
(13, 'cc', 'cc', 'e0323a9039add2978bf5b49550572c7c', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`,`course`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
