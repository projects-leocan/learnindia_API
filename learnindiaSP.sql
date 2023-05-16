-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2023 at 10:21 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAbout` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `about_main` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addAboutInner` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `about_inner` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addBlogContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `blog` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addBlogInner` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `blogInner` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCareerArticles` (IN `givenText` LONGTEXT, IN `head` TEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_articles` (`content`,`heading`) VALUES (givenText,head);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCounseling` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `counseling` (`content`,`heading`) VALUES (givenText,head);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addGuidenceContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_guidence` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addJourneyContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` INT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_journey` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addKeyToSuccess` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` INT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `home` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSuccessStory` (IN `givenText` LONGTEXT, IN `sName` VARCHAR(50), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `success_stories` (`content`,`student_name`) VALUES (givenText,sName);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTeamMember` (IN `t_name` VARCHAR(15), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))  BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `our_team` (`teacher_name`) VALUES (t_name);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_login` (IN `admin_email` VARCHAR(50), IN `admin_password` VARCHAR(30))  BEGIN

SELECT * FROM `admin` 
WHERE email = admin_email AND
password = admin_password;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCareerArticles` (IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

DELETE FROM `career_articles`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKeyToSuccess` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

DELETE FROM `home`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTeamMember` (IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

DELETE FROM `our_team`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAbout` ()  BEGIN
SELECT * FROM `about_main`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAboutInner` ()  BEGIN
SELECT * FROM `about_inner`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchBlogContent` ()  BEGIN
SELECT * FROM `blog`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchblogInnerContent` ()  BEGIN
SELECT * FROM `blogInner`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchCareerArticles` ()  BEGIN
SELECT * FROM `career_articles`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchCounselingContent` ()  BEGIN
SELECT * FROM `counseling`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchEducationLogo` ()  BEGIN

SELECT * FROM `education_logo`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchGuidenceContent` ()  BEGIN
SELECT * FROM `career_guidence`;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchJourneyContent` ()  BEGIN
SELECT * FROM `career_journey`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchKeyToSuccess` ()  BEGIN
SELECT * FROM `home`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchSuccessStory` ()  BEGIN
SELECT * FROM `success_stories`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchTeamMember` ()  BEGIN
SELECT * FROM `our_team`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAbout` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `about_main`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAboutInner` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `about_inner`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateBlogContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

UPDATE `blog`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateblogInner` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

UPDATE `blogInner`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCareerArticles` (IN `givenText` LONGTEXT, IN `head` TEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `career_articles`
SET content	 = givenText,
heading = head
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCounseling` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `counseling`
SET content	 = givenText,
heading = head
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGuidenceContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

UPDATE `career_guidence`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateJourneyContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

UPDATE `career_journey`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSuccessStory` (IN `givenText` LONGTEXT, IN `sName` VARCHAR(50), IN `text_id` INT(11), OUT `is_done` TINYINT(4))  BEGIN
set is_done =  0;

UPDATE `success_stories`
SET content	 = givenText,
student_name = sName
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTeamMember` (IN `t_name` VARCHAR(25), IN `text_id` INT(11), OUT `is_done` INT(4))  BEGIN
set is_done =  0;

UPDATE `our_team`
SET teacher_name = t_name
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `about_inner`
--

CREATE TABLE `about_inner` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_inner`
--

INSERT INTO `about_inner` (`id`, `content`) VALUES
(1, '<p><strong>Lorem ipsum dolor</strong> sit amet consectetur adipisicing elit. Delectus in aperiam dolor dolorum minima error eius sit nulla quod mollitia, praesentium soluta, eos vitae et. Quasi sapiente dolore, repellendus distinctio officiis voluptatibus ducimus, doloremque maiores mollitia sint eos quae fugiat magnam itaque hic nam minus doloribus quod ipsa tempore autem veniam architecto neque. Officia maiores perspiciatis ratione enim omnis harum ullam eos possimus recusandae voluptas in aliquam a sunt aliquid ut at natus, vel accusantium perferendis vero explicabo fugit adipisci. Velit veritatis quos aliquid, ullam incidunt est alias, sunt quidem distinctio, praesentium libero ex aut labore. Eligendi harum nam odit.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `about_main`
--

CREATE TABLE `about_main` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_main`
--

INSERT INTO `about_main` (`id`, `content`) VALUES
(1, '<p>&nbsp;minus doloribus <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus in aperiam dolor dolorum minima error eius sit nulla quod mollitia, praesentium soluta, eos vitae et. Quasi sapiente dolore, repellendus distinctio officiis voluptatibus ducimus, doloremque maiores mollitia sint eos quae fugiat magnam itaque hic nam</strong>quod ipsa tempore autem veniam architecto neque. Officia maiores perspiciatis ratione enim omnis harum ullam eos possimus recusandae voluptas in aliquam a sunt aliquid ut at natus, vel accusantium perferendis vero explicabo fugit adipisci. Velit veritatis quos aliquid, ullam incidunt est alias, sunt quidem distinctio, praesentium libero ex aut labore. Eligendi harum nam odit.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '741852');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `content`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `blogInner`
--

CREATE TABLE `blogInner` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogInner`
--

INSERT INTO `blogInner` (`id`, `content`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `career_articles`
--

CREATE TABLE `career_articles` (
  `id` int(11) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_articles`
--

INSERT INTO `career_articles` (`id`, `image`, `heading`, `content`) VALUES
(7, '1684221513_img.jpg', 'test heading ', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>'),
(8, '1684221568_img.jpg', 'established fact that a reader', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now</p>'),
(9, '1684221630_img.jpg', 'testt', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now&nbsp;</p>'),
(10, '1684221646_img.jpg', 'testt gg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it ha<strong>s a more-or-le</strong>ss normal distribution of letters, as opposed t o using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now&nbsp;</p>'),
(11, '1684221659_img.jpg', ' fdf dffd  45544343434', '<p>It is a long established fact that<i> a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it ha<strong>s a more-or-le</strong>ss normal distribution of letters, as opposed t o using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now &nbsp;dfd fd 3434 343434&nbsp;</i></p>'),
(12, '1684224659_img.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `career_guidence`
--

CREATE TABLE `career_guidence` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `image2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_guidence`
--

INSERT INTO `career_guidence` (`id`, `content`, `image`, `image2`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '1683281894_img.jpg', '1683281894_img2.jpg');

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

--
-- Dumping data for table `career_journey`
--

INSERT INTO `career_journey` (`id`, `content`) VALUES
(1, '<p>Lorem ipsum dolo<strong>r sit amet consectetur adipisicing elit</strong>. Quos aperiam, saepe quaerat ipsum sed esse, est perferendis blanditiis sapiente vel asperiores facere ea expedita soluta nostrum magnam eligendi quis quas?Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas qui, consequuntur debitis voluptatum quis recusandae exercitationem ex obcaecati natus fugit ratione aliquid doloremque aliquam quo, tenetur sint officiis esse,&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `heading` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counseling`
--

INSERT INTO `counseling` (`id`, `content`, `heading`) VALUES
(1, '<p><strong>Lorem ipsum</strong> dolor sit amet consectetur, adipisicing elit. Dolore culpa beatae praesentium ratione deleniti, tempore quia perspiciatis totam officiis quaerat ipsum, voluptates aliquam excepturi enim velit blanditiis error sit ipsa vitae fugiat suscipit amet. Quas a vero at ex enim perferendis ea dignissimos explicabo! Libero reprehenderit velit maxime aut accusantium.</p>', 'Conseling Heading Here');

-- --------------------------------------------------------

--
-- Table structure for table `education_logo`
--

CREATE TABLE `education_logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_logo`
--

INSERT INTO `education_logo` (`id`, `image`) VALUES
(1, '16841337970.jpg'),
(2, '16841337971.jpg'),
(3, '16841337972.jpg'),
(4, '16841337973.jpg');

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
(1, '<p>Lorem ipsum dolo<strong>r sit amet consectetur adipisicing elit</strong>. Quos aperiam, saepe quaerat ipsum sed esse, est perferendis blanditiis sapiente vel asperiores facere ea expedita soluta nostrum magnam eligendi quis quas?Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas qui, consequuntur debitis voluptatum quis recusandae exercitationem ex obcaecati natus fugit ratione aliquid doloremque aliquam quo, tenetur sint officiis esse, corporis earum magnam.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `teacher_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `image`, `teacher_name`) VALUES
(2, '1684141599_img.jpg', 'John Smith'),
(3, '1684141620_img.jpg', 'Jerry Nohara'),
(4, '1684141668_img.jpg', 'Cristine Shaw'),
(5, '1684141708_img.jpg', 'Roman Tears');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `student_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `content`, `student_name`) VALUES
(1, '<p>It is a long <strong>established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now.</p>', 'Rin Nohara - Student'),
(2, '<p>It is a long <strong>established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now</p>', 'kakashi  Hatake -  Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_inner`
--
ALTER TABLE `about_inner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_main`
--
ALTER TABLE `about_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogInner`
--
ALTER TABLE `blogInner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_articles`
--
ALTER TABLE `career_articles`
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
-- Indexes for table `education_logo`
--
ALTER TABLE `education_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
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
-- AUTO_INCREMENT for table `about_inner`
--
ALTER TABLE `about_inner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_main`
--
ALTER TABLE `about_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogInner`
--
ALTER TABLE `blogInner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_articles`
--
ALTER TABLE `career_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `career_guidence`
--
ALTER TABLE `career_guidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_help`
--
ALTER TABLE `career_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_journey`
--
ALTER TABLE `career_journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counseling`
--
ALTER TABLE `counseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education_logo`
--
ALTER TABLE `education_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
