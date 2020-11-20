-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.epizy.com
-- Generation Time: Nov 20, 2020 at 05:39 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_23607028_viraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `img_code` text NOT NULL,
  `platform_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `img_code`, `platform_name`) VALUES
(1, '<img src=\"otherImages/platforms/4973782.jpg\" class=\"platformimg\" title=\"Autodesk Maya\" alt=\"Autodesk Maya\" height=\"100px\">', 'Autodesk Maya'),
(2, '<a href=\"https://aframe.io\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/A-Frame_logo.png\" class=\"platformimg\" title=\"Aframe JS\" alt=\"Aframe JS\" height=\"100px\"></a>', 'AFrame JS'),
(3, '<img src=\"otherImages/platforms/bmysql-5-logo-png-transparent.png\" class=\"platformimg\" title=\"MySQL\" alt=\"MySQL\" height=\"100px\">', 'MySQL'),
(4, '<img src=\"otherImages/platforms/html5.png\" class=\"platformimg\" title=\"HTML\" alt=\"HTML\" height=\"100px\">', 'HTML'),
(5, '<img src=\"otherImages/platforms/bJavaScript-logo.png\" class=\"platformimg\" title=\"JavaScript\" alt=\"JavaScript\" height=\"100px\">', 'JavaScript'),
(6, '<img src=\"otherImages/platforms/phplogo.png\" class=\"platformimg\" title=\"PHP\" alt=\"PHP\" height=\"100px\">', 'PHP'),
(7, '<img src=\"otherImages/platforms/bcsslogo%20copy.png\" class=\"platformimg\" title=\"CSS\" alt=\"CSS\" height=\"100px\">', 'CSS'),
(8, '<a href=\"https://www.figma.com/\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/a558b426cb8973523f37bbed94cf0f09%20(1).png\" class=\"platformimg\" title=\"HTML\" alt=\"HTML\" height=\"100px\"></a>', 'Figma'),
(9, '<a href=\"https://nodejs.org/\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/nodejs.png\" class=\"platformimg\" title=\"Node JS\" alt=“Node JS\" height=\"100px\"></a>', 'Node JS'),
(10, '<a href=\"https://www.mongodb.com/\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/mongodb.png\" class=\"platformimg\" title=\"Mondo DB\" alt=“Mondo DB\" height=\"100px\"></a>', 'MongoDB'),
(11, '<a href=\"https://expressjs.com/\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/express.png\" class=\"platformimg\" title=\"Express JS\" alt=“Express JS\" height=\"100px\"></a>', 'Express JS'),
(12, '<a href=\"https://cheerio.js.org/\" target=\"_blank\" class=\"platformlink\"><img src=\"otherImages/platforms/cheerio.png\" class=\"platformimg\" title=\"Cheerio JS\" alt=“Cheerio JS” height=\"100px\"></a>', 'Cheerio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
