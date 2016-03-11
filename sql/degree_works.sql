-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2016 at 05:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `degree_works`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAdvisers`()
    NO SQL
select * from adviser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAuthors`()
    NO SQL
select * from author$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllProjects`()
    NO SQL
select * from project$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAdviser`(IN `spIdentifier` INT(11) UNSIGNED, IN `spName` VARCHAR(20) CHARSET utf8, IN `spLastName` VARCHAR(20) CHARSET utf8)
    NO SQL
insert into adviser (identifier, name, lastName) values (spIdentifier, spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAuthor`(IN `spIdentifier` INT(11) UNSIGNED, IN `spName` VARCHAR(20) CHARSET utf8, IN `spLastName` VARCHAR(20) CHARSET utf8)
    NO SQL
insert into author (identifier, name, lastName) values (spIdentifier, spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetIncludes`(IN `spAuthorIdentifier` INT(11) UNSIGNED, IN `spProjectIdentifier` INT(11) UNSIGNED)
    NO SQL
insert into includes (authorIdentifier, projectIdentifier) values (spAuthorIdentifier, spProjectIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetProject`(IN `spName` VARCHAR(100) CHARSET utf8, IN `spInvestigationLine` VARCHAR(200) CHARSET utf8, IN `spCalification` INT(1) UNSIGNED, IN `spAddedDate` DATE, IN `spAdviserIdentifier` INT(11) UNSIGNED)
    NO SQL
insert into project (name, investigationLine, calification, addedDate, adviserIdentifier) values (spName, spInvestigationLine, spCalification, spAddedDate, spAdviserIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateQuotaProject`(IN `spIdentifier` INT(11) UNSIGNED)
    NO SQL
update project set quota = (quota - 1) where identifier = spIdentifier$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE IF NOT EXISTS `adviser` (
  `identifier` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`identifier`, `name`, `lastName`) VALUES
(1, 'Adviser', 'One'),
(2, 'Adviser', 'Two'),
(3, 'Adviser', 'Three'),
(4, 'Adviser', 'Four');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `identifier` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`identifier`, `name`, `lastName`) VALUES
(1, 'Author', 'One'),
(2, 'Author', 'Two'),
(3, 'Author', 'Three');

-- --------------------------------------------------------

--
-- Table structure for table `includes`
--

CREATE TABLE IF NOT EXISTS `includes` (
  `authorIdentifier` int(11) NOT NULL,
  `projectIdentifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`identifier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `investigationLine` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `calification` int(1) DEFAULT NULL,
  `addedDate` date DEFAULT NULL,
  `quota` int(1) NOT NULL DEFAULT '3',
  `adviserIdentifier` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`identifier`, `name`, `investigationLine`, `calification`, `addedDate`, `quota`, `adviserIdentifier`) VALUES
(1, 'Lights recognition', 'Software engineering', 5, NULL, 3, 1),
(2, 'Automathic server', 'Systems engineering', 3, NULL, 3, 4),
(4, 'Test', 'Test', 0, NULL, 3, 4),
(5, 'Test 2', 'Test 2', 0, NULL, 3, 2),
(6, 'Test 3', 'Test 3', 0, NULL, 3, 1),
(8, 'Test 4', 'Test 4', 3, NULL, 3, 1),
(9, 'Test 5', 'Test 5', 0, NULL, 3, 2),
(10, 'Test 6', 'Test 6', 0, NULL, 3, 4),
(11, 'Test 7 ', 'Test 7', 5, NULL, 3, 3),
(12, 'Test 8', 'Test 8', 1, NULL, 3, 4),
(14, 'Test 9', 'Test 9', 1, NULL, 3, 4),
(15, 'Test 10', 'Test 10', 1, '2016-03-25', 3, 4),
(16, 'Test 11', 'Test 11', 2, '2016-03-11', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
 ADD PRIMARY KEY (`identifier`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`identifier`);

--
-- Indexes for table `includes`
--
ALTER TABLE `includes`
 ADD KEY `user_identifier` (`authorIdentifier`,`projectIdentifier`), ADD KEY `project_identifier` (`projectIdentifier`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`identifier`), ADD UNIQUE KEY `name` (`name`), ADD KEY `advice_identifier` (`adviserIdentifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `includes`
--
ALTER TABLE `includes`
ADD CONSTRAINT `includes_ibfk_1` FOREIGN KEY (`authorIdentifier`) REFERENCES `author` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `includes_ibfk_2` FOREIGN KEY (`projectIdentifier`) REFERENCES `project` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`adviserIdentifier`) REFERENCES `adviser` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
