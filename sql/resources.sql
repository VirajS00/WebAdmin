-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2021 at 08:41 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `links` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `type`, `short_desc`, `links`, `category`, `sort`) VALUES
(1, 'Kevin Powell', 'Youtuber', 'one of the best resources for learning CSS. His tutorials cover cutting edge techniques and how to make CSS much less frustrating. ', '[{\"link_type\":\"YouTube\",\"url\":\"https://www.youtube.com/user/KepowOb\"},{\"link_type\":\"Twitch\",\"url\":\"https://www.twitch.tv/kevinpowellcss\"}]', 'CD', 1),
(2, 'Web Dev Simplified', 'Youtuber', 'Kyle runs this channel, Kyle\'s channel covers HTML, CSS and JS for for beginners and more experienced developers alike. ', '[{\"link_type\":\"YouTube\",\"url\":\"https://www.youtube.com/channel/UCFbNIlppjAuEX4znoulh0Cw\"}]', 'CD', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
