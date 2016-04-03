-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2016 at 12:26 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteAdviser` (IN `spIdentifier` INT UNSIGNED)  NO SQL
delete from adviser where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteAuthor` (IN `spIdentifier` INT UNSIGNED)  NO SQL
delete from author where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteIncludes` (IN `spIdentifier` INT UNSIGNED)  NO SQL
delete from includes where projectIdentifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteInvestigationLine` (IN `spIdentifier` INT UNSIGNED)  NO SQL
delete from investigationLine where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteProject` (IN `spIdentifier` INT UNSIGNED)  NO SQL
delete from project where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAdviserByIdentifier` (IN `spIdentifier` VARCHAR(20))  NO SQL
select name, lastName from adviser where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAdvisers` ()  NO SQL
select * from adviser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAuthors` ()  NO SQL
select * from author$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllIncludes` ()  NO SQL
select * from includes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllInvestigationLines` ()  NO SQL
select * from investigationLine$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllProjects` ()  NO SQL
select * from project$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAuthorByIdentifier` (IN `spIdentifier` INT UNSIGNED)  NO SQL
select name, lastName from author where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetInvestigationLineByIdentifier` (IN `spIdentifier` INT UNSIGNED)  NO SQL
select name from investigationLine where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetInvestigationLineByName` (IN `spName` VARCHAR(200))  NO SQL
select identifier from investigationLine where name = spName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetProjectByName` (IN `spName` VARCHAR(100))  NO SQL
select identifier, calification, addedDate, quota, adviserIdentifier, investigationLineIdentifier from project where name = spName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetProjectIdentifierByAuthorIdentifier` (IN `spIdentifier` INT UNSIGNED)  NO SQL
select projectIdentifier from includes where authorIdentifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetUserByNickname` (IN `spNickname` VARCHAR(10))  NO SQL
select password, type from user where nickname = spNickname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spIncreaseProjectQuota` (IN `spIdentifier` INT UNSIGNED)  NO SQL
update project set quota = (quota + 1) where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAdviser` (IN `spName` VARCHAR(20), IN `spLastName` VARCHAR(20))  NO SQL
insert into adviser (name, lastName) values (spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetAuthor` (IN `spName` VARCHAR(20), IN `spLastName` VARCHAR(20))  NO SQL
insert into author (name, lastName) values (spName, spLastName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetIncludes` (IN `spAuthorIdentifier` INT(11) UNSIGNED, IN `spProjectIdentifier` INT(11) UNSIGNED)  NO SQL
insert into includes (authorIdentifier, projectIdentifier) values (spAuthorIdentifier, spProjectIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetInvestigationLine` (IN `spName` VARCHAR(200))  NO SQL
insert into investigationLine (name) values (spName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetProject` (IN `spName` VARCHAR(100), IN `spCalification` INT(1) UNSIGNED, IN `spAddedDate` DATE, IN `spAdviserIdentifier` INT UNSIGNED, IN `spInvestigationLineIdentifier` INT UNSIGNED)  NO SQL
insert into project (name, calification, addedDate, adviserIdentifier, investigationLineIdentifier) values (spName, spCalification, spAddedDate, spAdviserIdentifier, spInvestigationLineIdentifier)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSetUser` (IN `spNickname` VARCHAR(10), IN `spPassword` VARCHAR(100), IN `spType` INT(1) UNSIGNED)  NO SQL
insert into user (nickname, password, type) values (spNickname, spPassword, spType)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateAdviser` (IN `spIdentifier` INT UNSIGNED, IN `spName` VARCHAR(20), IN `spLastName` VARCHAR(20))  NO SQL
update adviser set name = spName, lastName = spLastName where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateAuthor` (IN `spIdentifier` INT UNSIGNED, IN `spName` VARCHAR(20), IN `spLastName` VARCHAR(20))  NO SQL
update author set name = spName, lastName = spLastName where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateInvestigationLine` (IN `spIdentifier` INT UNSIGNED, IN `spName` VARCHAR(200))  NO SQL
update investigationLine set name = spName where identifier = spIdentifier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateProject` (IN `spIdentifier` INT UNSIGNED, IN `spName` VARCHAR(100), IN `spCalification` INT(1) UNSIGNED, IN `spAddedDate` DATE, IN `spQuota` INT(1) UNSIGNED, IN `spAdviserIdentifier` INT UNSIGNED, IN `spInvestigationLineIdentifier` INT UNSIGNED)  NO SQL
update project set name = spName, calification = spCalification, addedDate = spAddedDate, quota = spQuota, adviserIdentifier = spAdviserIdentifier, investigationLineIdentifier = spInvestigationLineIdentifier where identifier = spIdentifier$$

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
(1, 'Mary Angel', 'Gonzales Lopez'),
(2, 'Carlos Manuel', 'Sanchez Mendoza'),
(3, 'Argemiro', 'Martinez Medrano'),
(4, 'Luis Esteban', 'Garcia Cuida'),
(5, 'Samuel David', 'Narvaez Perez');

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
(1, 'Jose David', 'Garcia Rodriguez'),
(4, 'Moises David', 'Lopez Suarez'),
(5, 'Carlos Daniel', 'Gomez Pajaro');

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
(1, 3),
(1, 4),
(5, 4);

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
(15, 'Big data'),
(11, 'Machine learning'),
(16, 'Professional design'),
(10, 'Programming II'),
(14, 'Software architecture'),
(13, 'Software engineering'),
(12, 'Telematics');

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
(3, 'Logistic regression', 4, '2016-03-23', 2, 3, 11),
(4, 'Information retrieval', 5, '2015-11-18', 1, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `identifier` int(11) NOT NULL,
  `nickname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`identifier`, `nickname`, `password`, `type`) VALUES
(17, 'davidweb', '$2a$15$TBl8LVVdu1GUXqpWSRLDNuMwnFUYgp/NHVa.ZDI84OhgXWRGU6yri', 1),
(18, 'davidweb2', '$2a$15$3iuBgI4em58sLR5wW8PUG.QgF2ilAhDl.erKTNu3grlhV9i7u4mTe', 2),
(19, 'davidweb3', '$2a$15$9DQkW11w0vnlKW0BqvajO.V38PgrAivYEcrhomXF6.ty5eEjyHTLG', 3);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`identifier`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `investigationLine`
--
ALTER TABLE `investigationLine`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `identifier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `includes`
--
ALTER TABLE `includes`
  ADD CONSTRAINT `includes_ibfk_2` FOREIGN KEY (`projectIdentifier`) REFERENCES `project` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `includes_ibfk_3` FOREIGN KEY (`authorIdentifier`) REFERENCES `author` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`investigationLineIdentifier`) REFERENCES `investigationLine` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`adviserIdentifier`) REFERENCES `adviser` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
