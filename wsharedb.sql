-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2021 at 02:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsharedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `insidePost`
--

CREATE TABLE `insidePost` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `topicown` varchar(100) CHARACTER SET latin1 NOT NULL,
  `comment` varchar(255) CHARACTER SET latin1 NOT NULL,
  `commentown` varchar(100) CHARACTER SET latin1 NOT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insidePost`
--

INSERT INTO `insidePost` (`id`, `topic`, `topicown`, `comment`, `commentown`, `like`) VALUES
(1, 'I LOVE YOU 3000', 'Tony Stark', 'I love you more than 3,000', 'its me', 30),
(2, 'I LOVE YOU 3000', 'Tony Stark', '34', 'tukta', 13),
(3, 'I LOVE YOU 3000', 'Tony Stark', 'love tuk ta mak mak lei', 'hathum', 13),
(8, 'I LOVE YOU 3000', 'Tony Stark', 'we should go', 'hathum', 13),
(9, 'I LOVE YOU 3000', 'Tony Stark', 'haha', 'hathum', 13),
(10, 'I LOVE YOU 3000', 'Tony Stark', 'I wish you a marry christmas', 'hathum', 13),
(11, 'DUSK TILL DOWN WITH PHP!!', 'hathum', 'I want this job so bad haha', 'hathum', 13);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `comment` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `topic`, `username`, `comment`) VALUES
(5, 'I LOVE YOU 3000', 'Tony Stark', '40'),
(6, 'HOW YOU LIKE THAT?', 'Lisa M', '34'),
(10, 'BTS', 'tukta', '30'),
(11, 'haha', 'tukta', '30'),
(13, 'It\'s work!!', 'hathum', '30'),
(17, '11 April 2019', 'tukta', '40'),
(18, 'I LOVE TUKTA MAK MAK NA', 'hathum', '40'),
(19, 'I CANT ADD ANYTHING', 'kittitus', '40'),
(20, 'DUSK TILL DOWN WITH PHP!!', 'hathum', '40');

-- --------------------------------------------------------

--
-- Table structure for table `wshareuser`
--

CREATE TABLE `wshareuser` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wshareuser`
--

INSERT INTO `wshareuser` (`id`, `username`, `email`, `password`) VALUES
(3, 'hathum', 'hathum@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'hathum2', 'nopgerg@outlook.co.th', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'tukta', 'kittita0702@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'kittitus', 'kittitus.kong@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insidePost`
--
ALTER TABLE `insidePost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wshareuser`
--
ALTER TABLE `wshareuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insidePost`
--
ALTER TABLE `insidePost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wshareuser`
--
ALTER TABLE `wshareuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
