-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 01:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAbout` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `about_main` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addAboutInner` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `about_inner` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addBlogContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `blog` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addBlogInner` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `blogInner` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCareerArticles` (IN `givenText` LONGTEXT, IN `head` TEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_articles` (`content`,`heading`) VALUES (givenText,head);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addContact` (IN `givenText` LONGTEXT, IN `con_no` VARCHAR(20), IN `email` VARCHAR(30), IN `given_address` VARCHAR(255), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `contact` (`content`,`contact_num`,`email`,`address`) VALUES (givenText,con_no,email,given_address);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCounseling` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `counseling` (`content`,`heading`) VALUES (givenText,head);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addGuidenceContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_guidence` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addJourneyContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` INT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `career_journey` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addKeyToSuccess` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` INT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `home` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addOption` (IN `opt` LONGTEXT, IN `q_id` INT(11), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `options` (`options`,`question_id`) VALUES (opt,q_id);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addQuestionnaire` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `questionnaire` (`question`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addServeyContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `survey` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSuccessStory` (IN `givenText` LONGTEXT, IN `sName` VARCHAR(50), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `success_stories` (`content`,`student_name`) VALUES (givenText,sName);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTeamMember` (IN `t_name` VARCHAR(15), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `our_team` (`teacher_name`) VALUES (t_name);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTerms` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `terms` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTermsContent` (IN `givenText` LONGTEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `add_terms` (`content`) VALUES (givenText);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTerms_condition` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `terms_condition` (`content`,`heading`) VALUES (givenText,head);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_login` (IN `admin_email` VARCHAR(50), IN `admin_password` VARCHAR(30))   BEGIN

SELECT * FROM `admin` 
WHERE email = admin_email AND
password = admin_password;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCareerArticles` (IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

DELETE FROM `career_articles`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEducationLogo` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

DELETE FROM `education_logo`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKeyToSuccess` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

DELETE FROM `home`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteQuestionnaire` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

DELETE FROM `questionnaire`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteServeyResponse` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

DELETE FROM `survey_form`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTeamMember` (IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

DELETE FROM `our_team`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTerms_conditon` (IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

DELETE FROM `terms_condition`
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAbout` ()   BEGIN
SELECT * FROM `about_main`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAboutInner` ()   BEGIN
SELECT * FROM `about_inner`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAnswers` (IN `eml` VARCHAR(30))   SELECT a.answer, a.user_name, a.question_id, a.option_id, q.question, o.options
FROM answers AS a
JOIN questionnaire AS q ON a.question_id = q.id
JOIN options AS o ON a.option_id = o.id
WHERE a.user_name = eml$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchBlogContent` ()   BEGIN
SELECT * FROM `blog`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchblogInnerContent` ()   BEGIN
SELECT * FROM `blogInner`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchCareerArticles` ()   BEGIN
SELECT * FROM `career_articles`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchContact` ()   BEGIN
SELECT * FROM `contact`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchContactFormDetails` ()   BEGIN
SELECT * FROM `contact_form` ORDER by id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchCounselingContent` ()   BEGIN
SELECT * FROM `counseling`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchEducationLogo` ()   BEGIN

SELECT * FROM `education_logo`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchGuidenceContent` ()   BEGIN
SELECT * FROM `career_guidence`;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchJourneyContent` ()   BEGIN
SELECT * FROM `career_journey`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchKeyToSuccess` ()   BEGIN
SELECT * FROM `home`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchQuestionnaire` (IN `page` INT, IN `pageSize` INT, OUT `totalQuestions` INT)   BEGIN
    -- Fetch the questions for the specified page
    SELECT q.id, q.question, GROUP_CONCAT(o.options) AS options
    FROM (
        SELECT q.*, ROW_NUMBER() OVER (ORDER BY q.id) AS row_num
        FROM questionnaire AS q
    ) AS q
    JOIN options AS o ON q.id = o.question_id
    WHERE q.row_num BETWEEN ((page - 1) * pageSize) + 1 AND (page * pageSize)
    GROUP BY q.id, q.question;

    -- Calculate the total number of questions
    SELECT COUNT(*) INTO totalQuestions FROM questionnaire;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchQuestions` ()   BEGIN

SELECT q.*, GROUP_CONCAT(o.options) AS options
FROM questionnaire AS q
JOIN options AS o ON q.id = o.question_id
GROUP BY q.id, q.question;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchServeyContent` ()   BEGIN
SELECT * FROM `survey`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchServeyForm` ()   BEGIN
SELECT * FROM `survey_form`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchSuccessStory` ()   BEGIN
SELECT * FROM `success_stories`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchTeamMember` ()   BEGIN
SELECT * FROM `our_team`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchTerms` ()   BEGIN
SELECT * FROM `terms`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchTermsContent` ()   BEGIN
SELECT * FROM `add_terms`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchTerms_condition` ()   BEGIN
SELECT * FROM `terms_condition`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fillContactForm` (IN `u_name` VARCHAR(30), IN `eml` VARCHAR(30), IN `msg` TEXT, OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `contact_form`(`user_name`,`email`,`message`) VALUES (u_name,eml,msg);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fillServeyForm` (IN `fname` VARCHAR(25), IN `lname` VARCHAR(25), IN `eml` VARCHAR(25), IN `dob` VARCHAR(20), IN `gndr` VARCHAR(20), IN `grd` VARCHAR(30), OUT `is_done` TINYINT(4), OUT `last_added` TINYINT(4))   BEGIN

SET is_done = 0;
SET last_added = 0;

INSERT INTO `survey_form` (`first_name`,`last_name`,`email`,`date_of_birth`,`gender`,`grade`) VALUES (fname,lname,eml,dob,gndr,grd);

IF Row_Count() > 0 THEN
SET last_added  = last_insert_id();
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `storeAnswers` (IN `ans` LONGTEXT, IN `u_name` VARCHAR(30), OUT `is_done` TINYINT(4))   BEGIN

SET is_done = 0;

INSERT INTO `answers` (`answer`,`user_name`) VALUES (ans,u_name);

IF Row_Count() > 0 THEN
SET is_done = 1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAbout` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `about_main`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAboutInner` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `about_inner`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateBlogContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `blog`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateblogInner` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `blogInner`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCareerArticles` (IN `givenText` LONGTEXT, IN `head` TEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `career_articles`
SET content	 = givenText,
heading = head
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateContact` (IN `givenText` LONGTEXT, IN `co_no` VARCHAR(20), IN `email_add` VARCHAR(30), IN `given_add` TEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `contact`
SET content	 = givenText,
contact_num = co_no,
email = email_add,
address = given_add
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCounseling` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `counseling`
SET content	 = givenText,
heading = head
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGuidenceContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `career_guidence`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateJourneyContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `career_journey`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateKeyToSuccess` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `home`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateOption` (IN `opt` TEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `options`
SET options	 = opt,
question_id = text_id
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateQuestionnaire` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `questionnaire`
SET question = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateServeyContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `survey`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSuccessStory` (IN `givenText` LONGTEXT, IN `sName` VARCHAR(50), IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `success_stories`
SET content	 = givenText,
student_name = sName
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTeamMember` (IN `t_name` VARCHAR(25), IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `our_team`
SET teacher_name = t_name
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTerms` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` INT(4))   BEGIN
set is_done =  0;

UPDATE `terms`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTermsContent` (IN `givenText` LONGTEXT, IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `add_terms`
SET content	 = givenText
WHERE id = text_id;

IF Row_Count() > 0 THEN
	set is_done = 1;
end IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTerms_condition` (IN `givenText` LONGTEXT, IN `head` VARCHAR(255), IN `text_id` INT(11), OUT `is_done` TINYINT(4))   BEGIN
set is_done =  0;

UPDATE `terms_condition`
SET content	 = givenText,
heading = head
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_main`
--

INSERT INTO `about_main` (`id`, `content`) VALUES
(1, '<p>&nbsp;minus doloribus <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus in aperiam dolor dolorum minima error eius sit nulla quod mollitia, praesentium soluta, eos vitae et. Quasi sapiente dolore, repellendus distinctio officiis voluptatibus ducimus, doloremque maiores mollitia sint eos quae fugiat magnam itaque hic nam</strong>quod ipsa tempore autem veniam architecto neque. Officia maiores perspiciatis ratione enim omnis harum ullam eos possimus recusandae voluptas in aliquam a sunt aliquid ut at natus, vel accusantium perferendis vero explicabo fugit adipisci. Velit veritatis quos aliquid, ullam incidunt est alias, sunt quidem distinctio, praesentium libero ex aut labore. Eligendi harum nam odit.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `add_terms`
--

CREATE TABLE `add_terms` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_terms`
--

INSERT INTO `add_terms` (`id`, `content`) VALUES
(1, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '741852');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `form_submitted_date` date NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(20) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `form_submitted_date`, `user_name`, `question_id`, `option_id`) VALUES
(1, 'Yes', '2023-05-22', 'naruto@gmail.com', 1, 1),
(2, 'Natuto', '2023-05-22', 'naruto@gmail.com', 2, 2),
(3, 'Fine', '2023-05-22', 'naruto@gmail.com', 3, 3),
(4, 'passages', '2023-05-22', 'naruto@gmail.com', 4, 4),
(5, 'dummy text', '2023-05-22', 'naruto@gmail.com', 8, 8),
(6, 'dummy', '2023-05-22', 'naruto@gmail.com', 9, 9),
(7, 'scrambled', '2023-05-22', 'naruto@gmail.com', 10, 10),
(8, 'Black', '2023-05-22', 'naruto@gmail.com', 11, 11),
(9, 'Yes', '2023-05-23', 'levi@gmail.com', 1, 1),
(10, 'Natuto', '2023-05-23', 'levi@gmail.com', 2, 2),
(11, 'bad', '2023-05-23', 'levi@gmail.com', 3, 3),
(12, 'passages', '2023-05-23', 'levi@gmail.com', 4, 4),
(13, 'dummy text', '2023-05-23', 'levi@gmail.com', 8, 8),
(14, 'Ipsum', '2023-05-23', 'levi@gmail.com', 9, 9),
(15, ' scrambled', '2023-05-23', 'levi@gmail.com', 10, 10),
(16, 'White', '2023-05-23', 'levi@gmail.com', 11, 11),
(17, 'Yes', '2023-05-23', 'levi@gmail.com', 12, 12),
(18, 'want', '2023-05-23', 'levi@gmail.com', 13, 13),
(19, 'again', '2023-05-23', 'levi@gmail.com', 14, 14),
(20, 'yes', '2023-05-23', 'levi@gmail.com', 15, 15),
(21, 'Yes', '2023-05-23', 'mikasa@gmail.com', 1, 1),
(22, 'Natuto', '2023-05-23', 'mikasa@gmail.com', 2, 2),
(23, 'Fine', '2023-05-23', 'mikasa@gmail.com', 3, 3),
(24, 'randomised', '2023-05-23', 'mikasa@gmail.com', 4, 4),
(25, 'dummy text', '2023-05-23', 'mikasa@gmail.com', 8, 8),
(26, 'Ipsum', '2023-05-23', 'mikasa@gmail.com', 9, 9),
(27, 'unknown option', '2023-05-23', 'mikasa@gmail.com', 10, 10),
(28, 'White', '2023-05-23', 'mikasa@gmail.com', 11, 11),
(29, 'No', '2023-05-23', 'mikasa@gmail.com', 12, 12),
(30, ' Hold', '2023-05-23', 'mikasa@gmail.com', 13, 13),
(31, 'again', '2023-05-23', 'mikasa@gmail.com', 14, 14),
(32, 'yes', '2023-05-23', 'mikasa@gmail.com', 15, 15),
(33, 'No', '2023-05-23', 'armin@gmail.com', 1, 1),
(34, 'luffy', '2023-05-23', 'armin@gmail.com', 2, 2),
(35, 'bad', '2023-05-23', 'armin@gmail.com', 3, 3),
(36, 'passages', '2023-05-23', 'armin@gmail.com', 4, 4),
(37, 'typesetting', '2023-05-23', 'armin@gmail.com', 8, 8),
(38, 'Ipsum', '2023-05-23', 'armin@gmail.com', 9, 9),
(39, 'unknown option', '2023-05-23', 'armin@gmail.com', 10, 10),
(40, 'White', '2023-05-23', 'armin@gmail.com', 11, 11),
(41, 'No', '2023-05-23', 'armin@gmail.com', 12, 12),
(42, 'want', '2023-05-23', 'armin@gmail.com', 13, 13),
(43, 'again', '2023-05-23', 'armin@gmail.com', 14, 14),
(44, 'yes', '2023-05-23', 'armin@gmail.com', 15, 15),
(45, 'Yes', '2023-05-23', 'konan@gmail.com', 1, 1),
(46, 'Natuto', '2023-05-23', 'konan@gmail.com', 2, 2),
(47, 'Fine', '2023-05-23', 'konan@gmail.com', 3, 3),
(48, 'passages', '2023-05-23', 'konan@gmail.com', 4, 4),
(49, 'typesetting', '2023-05-23', 'konan@gmail.com', 8, 8),
(50, 'Ipsum', '2023-05-23', 'konan@gmail.com', 9, 9),
(51, 'unknown option', '2023-05-23', 'konan@gmail.com', 10, 10),
(52, 'White', '2023-05-23', 'konan@gmail.com', 11, 11),
(53, 'White', '2023-05-23', 'konan@gmail.com', 11, 11),
(54, 'Yes', '2023-05-23', 'konan@gmail.com', 12, 12),
(55, ' Hold', '2023-05-23', 'konan@gmail.com', 13, 13),
(56, 'again', '2023-05-23', 'konan@gmail.com', 14, 14),
(57, 'yes', '2023-05-23', 'konan@gmail.com', 15, 15),
(58, 'No', '2023-05-23', 'nagato@gmail.com', 1, 1),
(59, 'luffy', '2023-05-23', 'nagato@gmail.com', 2, 2),
(60, 'Fine', '2023-05-23', 'nagato@gmail.com', 3, 3),
(61, 'variations', '2023-05-23', 'nagato@gmail.com', 4, 4),
(62, 'variations', '2023-05-23', 'nagato@gmail.com', 4, 4),
(63, 'typesetting', '2023-05-23', 'nagato@gmail.com', 8, 8),
(64, 'Ipsum', '2023-05-23', 'nagato@gmail.com', 9, 9),
(65, ' scrambled', '2023-05-23', 'nagato@gmail.com', 10, 10),
(66, 'Black', '2023-05-23', 'nagato@gmail.com', 11, 11),
(67, 'No', '2023-05-23', 'nagato@gmail.com', 12, 12),
(68, ' Hold', '2023-05-23', 'nagato@gmail.com', 13, 13),
(69, 'again', '2023-05-23', 'nagato@gmail.com', 14, 14),
(70, 'No', '2023-05-23', 'nagato@gmail.com', 15, 15),
(71, 'Yes', '2023-05-23', 'yamato@gmail.com', 1, 1),
(72, 'Natuto', '2023-05-23', 'yamato@gmail.com', 2, 2),
(73, 'bad', '2023-05-23', 'yamato@gmail.com', 3, 3),
(74, 'passages', '2023-05-23', 'yamato@gmail.com', 4, 4),
(75, 'typesetting', '2023-05-23', 'yamato@gmail.com', 8, 8),
(76, 'Yes', '2023-05-23', 'gojo@gmail.com', 1, 1),
(77, 'Natuto', '2023-05-23', 'gojo@gmail.com', 2, 2),
(78, 'Fine', '2023-05-23', 'gojo@gmail.com', 3, 3),
(79, 'randomised', '2023-05-23', 'gojo@gmail.com', 4, 4),
(80, 'typesetting', '2023-05-23', 'gojo@gmail.com', 8, 8),
(81, 'unknown option', '2023-05-23', 'gojo@gmail.com', 10, 10),
(82, 'Black', '2023-05-23', 'gojo@gmail.com', 11, 11),
(83, 'No', '2023-05-23', 'gojo@gmail.com', 12, 12),
(84, 'want', '2023-05-23', 'gojo@gmail.com', 13, 13),
(85, 'again', '2023-05-23', 'gojo@gmail.com', 14, 14),
(86, 'yes', '2023-05-23', 'gojo@gmail.com', 15, 15),
(87, 'again', '2023-05-23', 'iruka@gmail.com', 14, 14),
(88, 'yes', '2023-05-23', 'iruka@gmail.com', 15, 15),
(89, 'No', '2023-05-23', 'tsunade@gmail.com', 1, 1),
(90, 'Natuto', '2023-05-23', 'tsunade@gmail.com', 2, 2),
(91, 'Fine', '2023-05-23', 'tsunade@gmail.com', 3, 3),
(92, 'randomised', '2023-05-23', 'tsunade@gmail.com', 4, 4),
(93, 'dummy text', '2023-05-23', 'tsunade@gmail.com', 8, 8),
(94, 'Ipsum', '2023-05-23', 'tsunade@gmail.com', 9, 9),
(95, ' scrambled', '2023-05-23', 'tsunade@gmail.com', 10, 10),
(96, 'White', '2023-05-23', 'tsunade@gmail.com', 11, 11),
(97, 'Yes', '2023-05-23', 'tsunade@gmail.com', 12, 12),
(98, 'want', '2023-05-23', 'tsunade@gmail.com', 13, 13),
(99, 'again', '2023-05-23', 'tsunade@gmail.com', 14, 14),
(100, 'yes', '2023-05-23', 'tsunade@gmail.com', 15, 15),
(101, 'No', '2023-05-23', 'eren@gmail.com', 1, 1),
(102, 'Natuto', '2023-05-23', 'eren@gmail.com', 2, 2),
(103, 'bad', '2023-05-23', 'eren@gmail.com', 3, 3),
(104, 'randomised', '2023-05-23', 'eren@gmail.com', 4, 4),
(105, 'typesetting', '2023-05-23', 'eren@gmail.com', 8, 8),
(106, 'Ipsum', '2023-05-23', 'eren@gmail.com', 9, 9),
(107, ' scrambled', '2023-05-23', 'eren@gmail.com', 10, 10),
(108, 'Black', '2023-05-23', 'eren@gmail.com', 11, 11),
(109, 'Yes', '2023-05-23', 'eren@gmail.com', 12, 12),
(110, ' Hold', '2023-05-23', 'eren@gmail.com', 13, 13),
(111, 'again', '2023-05-23', 'eren@gmail.com', 14, 14),
(112, 'yes', '2023-05-23', 'eren@gmail.com', 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `content`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `bloginner`
--

CREATE TABLE `bloginner` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloginner`
--

INSERT INTO `bloginner` (`id`, `content`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_articles`
--

INSERT INTO `career_articles` (`id`, `image`, `heading`, `content`) VALUES
(8, '1684239111_img.jpg', 'established fact that a reader', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now</p>'),
(9, '1684239145_img.jpg', 'Many desktop publishing packages and web page editors now ', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now </p>'),
(10, '1684239191_img.jpg', 'distracted by the readable content of a page when looking at its layout', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it ha<strong>s a more-or-le</strong>ss normal distribution of letters, as opposed t o using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now </p>'),
(11, '1684239239_img.jpg', 'distracted by the readable content', '<p>It is a long established fact that<i> a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it ha<strong>s a more-or-le</strong>ss normal distribution of letters, as opposed t o using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now  dfd fd 3434 343434 </i></p>'),
(12, '1684239283_img.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p>'),
(13, '1684300586_img.jpg', 'unknown printer took a galley ', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>');

-- --------------------------------------------------------

--
-- Table structure for table `career_guidence`
--

CREATE TABLE `career_guidence` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `image2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_guidence`
--

INSERT INTO `career_guidence` (`id`, `content`, `image`, `image2`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', '1684238815_img.jpg', '1684238815_img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `career_help`
--

CREATE TABLE `career_help` (
  `id` int(11) NOT NULL,
  `heading` varchar(25) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_journey`
--

CREATE TABLE `career_journey` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_journey`
--

INSERT INTO `career_journey` (`id`, `content`) VALUES
(1, '<p>Lorem ipsum dolo<strong>r sit amet consectetur adipisicing elit</strong>. Quos aperiam, saepe quaerat ipsum sed esse, est perferendis blanditiis sapiente vel asperiores facere ea expedita soluta nostrum magnam eligendi quis quas?Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas qui, consequuntur debitis voluptatum quis recusandae exercitationem ex obcaecati natus fugit ratione aliquid doloremque aliquam quo, tenetur sint officiis esse,&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `contact_num` bigint(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `content`, `contact_num`, `email`, `address`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus. In hendrerit gravida rutrum quisque non tellus. Morbi tristique senectus et netus et malesuada fames. Suscipit tellus mauris a diam maecenas sed. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Amet consectetur adipiscing elit ut. Etiam tempor orci eu lobortis. Purus faucibus ornare suspendisse sed.</p>', 8596895556, 'abcd123@gmail.com', 'Etiam tempor orci eu lobortis. Purus faucibus ornare suspendisse sed.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `form_submitted_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `user_name`, `email`, `message`, `form_submitted_date`) VALUES
(1, 'kakashi', 'kakskl', 'dfddkfdlkd', '2023-05-17'),
(2, 'itachi', 'itachi@gmail.com', 'dfjkdjfk', '2023-05-17'),
(3, 'kakashi', 'kakashi@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus.', '2023-05-17'),
(4, 'itachi', 'itachi@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus.', '2023-05-17'),
(5, 'obito', 'obito@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus.', '2023-05-17'),
(6, 'hinata', 'hinata@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus.', '2023-05-17'),
(7, 'honey', 'honey', 'honey', '2023-05-17'),
(8, 'sakura', 'sakura@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sociis natoque penatibus et magnis dis parturient montes. At augue eget arcu dictum varius duis. Libero justo laoreet sit amet cursus. Netus et malesuada fames ac turpis egestas sed tempus.', '2023-05-17'),
(9, '', '', '', '2023-05-18'),
(10, 'levi', 'levi@gmail.com', 'amazing', '2023-05-23'),
(11, 'k', 'k@gmail.com', 'good', '2023-05-23'),
(12, 'k', '3993@gmail.com', 'hmm', '2023-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `heading` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_logo`
--

INSERT INTO `education_logo` (`id`, `image`) VALUES
(1, '16847534760.png'),
(2, '16842389171.png'),
(5, '16847544800.png'),
(6, '16847544801.png');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `content`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `options` text NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `options`, `question_id`) VALUES
(1, 'Yes, No', 1),
(2, 'Natuto, luffy', 2),
(3, 'Fine, bad', 3),
(4, 'randomised, passages, variations', 4),
(8, 'dummy text, typesetting', 8),
(9, 'Ipsum, dummy, typesetting', 9),
(10, 'unknown option,  scrambled,  specimen', 10),
(11, 'Black, White, Blue', 11),
(12, 'Yes, No', 12),
(13, 'want,  Hold', 13),
(14, 'again, test', 14),
(15, 'yes, No', 15);

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `teacher_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `image`, `teacher_name`) VALUES
(2, '1684238978_img.jpg', 'John Smith'),
(3, '1684238997_img.jpg', 'Jerry Nohara'),
(4, '1684239013_img.jpg', 'Cristine Shaw'),
(5, '1684239041_img.jpg', 'Roman Tears');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `question`) VALUES
(1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>'),
(2, '<p>what is your name&nbsp;</p>'),
(3, '<p>how are you ??</p>'),
(4, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>'),
(8, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>'),
(9, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>'),
(10, '<p>hen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially <strong>unchanged</strong>.</p>'),
(11, '<p>what is your fav.color</p>'),
(12, '<p>shole demo kimi wo itsteri</p>'),
(13, '<p>update the question</p>'),
(14, '<p>Untitled Question <strong>here</strong></p>'),
(15, '<p>you should come out first ?</p>');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `student_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `content`, `student_name`) VALUES
(1, '<p>It is a long <strong>established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now.</p>', 'Rin Nohara - Student'),
(2, '<p>It is a long <strong>established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now</p>', 'kakashi  Hatake -  Student');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `content`) VALUES
(1, '<p><strong>Contrary</strong> to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Please email us with details if you can help.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `survey_form`
--

CREATE TABLE `survey_form` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `submitted_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_form`
--

INSERT INTO `survey_form` (`id`, `first_name`, `last_name`, `email`, `date_of_birth`, `gender`, `grade`, `submitted_date`) VALUES
(1, 'naruto', 'uzumaki', 'naruto@gmail.com', '2002-10-11', 'male', 'A', '2023-05-22'),
(2, 'levi', 'ackerman', 'levi@gmail.com', '2023-05-01', 'male', 'A', '2023-05-23'),
(3, 'mikasa', 'ackerman', 'mikasa@gmail.com', '2023-05-29', 'male', 'A', '2023-05-23'),
(4, 'armin', 'arlet', 'armin@gmail.com', '2023-05-31', 'male', 'A', '2023-05-23'),
(5, 'konan', 'paper', 'konan@gmail.com', '2023-05-31', 'female', 'A', '2023-05-23'),
(6, 'nagato', 'uzumaki', 'nagato@gmail.com', '2023-05-30', 'male', 'A', '2023-05-23'),
(7, 'yamato', 'wood', 'yamato@gmail.com', '2002-10-11', 'male', 'A', '2023-05-23'),
(8, 'gojo', 'satoru', 'gojo@gmail.com', '2023-05-31', 'male', 'A', '2023-05-23'),
(9, 'isuka', 'iruka', 'iruka@gmail.com', '2023-05-30', 'male', 'C', '2023-05-23'),
(10, 'tsunade', 'senju', 'tsunade@gmail.com', '2023-05-31', 'female', 'A', '2023-05-23'),
(11, 'eren', 'yeager', 'eren@gmail.com', '2023-05-31', 'male', 'A', '2023-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `content`) VALUES
(1, '<p><strong>Contrary to popular belief,</strong> <strong>Lorem </strong><i>Ipsum </i>is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `heading`, `content`) VALUES
(2, 'There are many variations of passages of L orem Ipsum available, but the majorit', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet</p>'),
(9, 'There are many variations of passages', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>'),
(16, ' Personal Financial Advisor', '<p>Praesent nec ex a justo ultrices iaculis a bibendum erat. Integer neque ante, volutpat vitae consequat ut, tempor et nisl. Quisque lobortis justo a enim luctus feugiat. Nam ullamcorper efficitur nulla. Mauris massa nibh, ornare non nibh non, porttitor auctor leo. Duis gravida finibus sodales. Nam eu ante at lectus vehicula blandit a sed sem.Praesent nec ex a justo ultrices iaculis a bibendum erat. Integer neque ante, volutpat vitae consequat ut, tempor et nisl. Quisque lobortis justo a enim luctus feugiat. Nam ullamcorper efficitur nulla.s sodales. Nam eu ante at lectus vehicula blandit a sed sem. Praesent nec ex a justo ultrices iaculis a bibendum erat. Integer neque ante, volutpat vitae consequat ut, tempor et nisl. Quisque lobortis justo a enim luctus feugiat. Nam ullamcorper efficitur nulla. Mauris massa nibh, ornare non nibh non, porttitor auctor leo. Duis gravida finibus sodales. Nam eu ante at lectus vehicula blandit a sed sem.Praesent nec ex a justo ultrices iaculis a bibendum erat. Integer neque ante, volutpat vitae consequat ut, tempor et nisl. Quisque lobortis justo a enim luctus feugiat. Nam ullamcorper efficitur nulla.s sodales. Nam eu ante at lectus vehicula blandit a sed sem.</p>'),
(17, 'Latine', '<p>hi</p>');

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
-- Indexes for table `add_terms`
--
ALTER TABLE `add_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_fk` (`question_id`),
  ADD KEY `opt_fk` (`option_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloginner`
--
ALTER TABLE `bloginner`
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
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
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_fk` (`question_id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_form`
--
ALTER TABLE `survey_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
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
-- AUTO_INCREMENT for table `add_terms`
--
ALTER TABLE `add_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloginner`
--
ALTER TABLE `bloginner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_articles`
--
ALTER TABLE `career_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counseling`
--
ALTER TABLE `counseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education_logo`
--
ALTER TABLE `education_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_form`
--
ALTER TABLE `survey_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `opt_fk` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ques_fk` FOREIGN KEY (`question_id`) REFERENCES `questionnaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `option_fk` FOREIGN KEY (`question_id`) REFERENCES `questionnaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
