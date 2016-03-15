-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 06:01 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `degree_works`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAdviserByIdentifier` (IN `spIdentifier` VARCHAR(20))  NO SQL
select name, lastName from adviser where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAdvisers` ()  NO SQL
select * from adviser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAuthors` ()  NO SQL
select * from author$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllInvestigationLines` ()  NO SQL
select * from investigationLine$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllProjects` ()  NO SQL
select * from project$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetInvestigationLineByIdentifier` (IN `spIdentifier` INT UNSIGNED)  NO SQL
select name from investigationLine where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetInvestigationLineByName` (IN `spName` VARCHAR(200))  NO SQL
select identifier from investigationLine where name = spName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetProjectByName` (IN `spName` VARCHAR(100))  NO SQL
select identifier, calification, addedDate, quota, adviserIdentifier, investigationLineIdentifier from project where name = spName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAdviser` (IN `spIdentifier` INT(11) UNSIGNED, IN `spName` VARCHAR(20) CHARSET utf8, IN `spLastName` VARCHAR(20) CHARSET utf8)  NO SQL
insert into adviser (identifier, name, lastName) values (spIdentifier, spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAuthor` (IN `spIdentifier` INT(11) UNSIGNED, IN `spName` VARCHAR(20) CHARSET utf8, IN `spLastName` VARCHAR(20) CHARSET utf8)  NO SQL
insert into author (identifier, name, lastName) values (spIdentifier, spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetIncludes` (IN `spAuthorIdentifier` INT(11) UNSIGNED, IN `spProjectIdentifier` INT(11) UNSIGNED)  NO SQL
insert into includes (authorIdentifier, projectIdentifier) values (spAuthorIdentifier, spProjectIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetInvestigationLine` (IN `spName` VARCHAR(200))  NO SQL
insert into investigationLine (name) values (spName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetProject` (IN `spName` VARCHAR(100), IN `spCalification` INT(1) UNSIGNED, IN `spAddedDate` DATE, IN `spAdviserIdentifier` INT UNSIGNED, IN `spInvestigationLineIdentifier` INT UNSIGNED)  NO SQL
insert into project (name, calification, addedDate, adviserIdentifier, investigationLineIdentifier) values (spName, spCalification, spAddedDate, spAdviserIdentifier, spInvestigationLineIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateQuotaProject` (IN `spIdentifier` INT(11) UNSIGNED)  NO SQL
update project set quota = (quota - 1) where identifier = spIdentifier$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE `adviser` (
  `identifier` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`identifier`, `name`, `lastName`) VALUES
(1, 'Luis Esteban', 'Garcia Cuida'),
(2, 'Carlos Daniel', 'Perez Montaner'),
(3, 'Luis Daniel', 'Gomez Ortiz'),
(4, 'Juan David', 'Morales Sejin');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `identifier` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`identifier`, `name`, `lastName`) VALUES
(1, 'Juan Carlos', 'Morales Perez'),
(2, 'Luis David', 'Suarez Morales'),
(3, 'Luis Fernando', 'Perez Martinez'),
(4, 'Jose David', 'Garcia Rodriguez');

-- --------------------------------------------------------

--
-- Table structure for table `includes`
--

CREATE TABLE `includes` (
  `authorIdentifier` int(11) NOT NULL,
  `projectIdentifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `includes`
--

INSERT INTO `includes` (`authorIdentifier`, `projectIdentifier`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `investigationLine`
--

CREATE TABLE `investigationLine` (
  `identifier` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `investigationLine`
--

INSERT INTO `investigationLine` (`identifier`, `name`) VALUES
(4, 'Big data'),
(3, 'Computing'),
(7, 'Database'),
(2, 'Machine learning'),
(1, 'Programming I'),
(6, 'Programming II'),
(5, 'Web development');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `identifier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `calification` int(1) DEFAULT NULL,
  `addedDate` date DEFAULT NULL,
  `quota` int(1) NOT NULL DEFAULT '3',
  `adviserIdentifier` int(11) NOT NULL,
  `investigationLineIdentifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`identifier`, `name`, `calification`, `addedDate`, `quota`, `adviserIdentifier`, `investigationLineIdentifier`) VALUES
(1, 'Objects array', 3, '2016-03-04', 1, 1, 1),
(2, 'Bidimensionals array', 2, '2016-03-21', 2, 3, 1);

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
  ADD KEY `user_identifier` (`authorIdentifier`,`projectIdentifier`),
  ADD KEY `project_identifier` (`projectIdentifier`);

--
-- Indexes for table `investigationLine`
--
ALTER TABLE `investigationLine`
  ADD PRIMARY KEY (`identifier`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`identifier`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `advice_identifier` (`adviserIdentifier`),
  ADD KEY `investigationLineIdentifier` (`investigationLineIdentifier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investigationLine`
--
ALTER TABLE `investigationLine`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`adviserIdentifier`) REFERENCES `adviser` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`investigationLineIdentifier`) REFERENCES `investigationLine` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
