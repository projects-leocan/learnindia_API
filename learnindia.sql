-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnindia`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addKeyToSuccess` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` INT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `home` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKeyToSuccess` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

DELETE FROM `home`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchKeyToSuccess` ()  BEGIN
SELECT * FROM `home`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateKeyToSuccess` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `home`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `career_guidence`
--

CREATE TABLE `career_guidence` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `career_help`
--

CREATE TABLE `career_help` (
  `id` int(11) NOT NULL,
  `heading` varchar(25) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `career_journey`
--

CREATE TABLE `career_journey` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `heading` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `content`) VALUES
(1, '<p>dummy text</p>');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `student_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_guidence`
--
ALTER TABLE `career_guidence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_help`
--
ALTER TABLE `career_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_journey`
--
ALTER TABLE `career_journey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counseling`
--
ALTER TABLE `counseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_guidence`
--
ALTER TABLE `career_guidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_help`
--
ALTER TABLE `career_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_journey`
--
ALTER TABLE `career_journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counseling`
--
ALTER TABLE `counseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
