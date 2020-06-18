-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 12:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findrightcrop2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindCropWithDistrict` (IN `VarDistrict` VARCHAR(255))  NO SQL
select district.DistrictName, crop.CropName from district NATURAL JOIN districtwise NATURAL JOIN crop WHERE district.DistrictName = VarDistrict$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FindCropWithDistrictAndSeason` (IN `VarDistrict` VARCHAR(255), IN `VarSeason` VARCHAR(255))  NO SQL
select district.DistrictName, crop.CropName, season.SeasonName from district NATURAL JOIN districtwise NATURAL JOIN crop NATURAL JOIN seasonwise NATURAL JOIN season WHERE district.DistrictName = VarDistrict AND season.SeasonName = VarSeason$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalProfit` (IN `VarDistrict` VARCHAR(255), IN `VarSeason` VARCHAR(255), IN `landAmount` INT(10) UNSIGNED)  NO SQL
select district.DistrictName, crop.CropName, (crop.ProductionPerAcre*landAmount*crop.SellingPricePerKilo - crop.ProductionPerAcre*landAmount*districtwise.EstimateCostPerKilo) as profit, crop.TimeToHarvest as FirstHarvest from district NATURAL JOIN districtwise NATURAL JOIN crop NATURAL JOIN seasonwise NATURAL JOIN season WHERE district.DistrictName = VarDistrict AND season.SeasonName = VarSeason order by profit DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `CropId` int(11) NOT NULL,
  `CropName` varchar(255) DEFAULT NULL,
  `ProductionPerAcre` double DEFAULT NULL,
  `TimeToHarvest` double DEFAULT NULL,
  `SellingPricePerKilo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`CropId`, `CropName`, `ProductionPerAcre`, `TimeToHarvest`, `SellingPricePerKilo`) VALUES
(1, 'Rice - Aman', 1881, 4, 50),
(2, 'Rice - Aush', 1377, 4, 70),
(3, 'Rice - Boro', 3314, 5, 40),
(4, 'Wheat', 2528, 5, 35),
(5, 'Pulse', 932, 7, 80),
(6, 'Jute', 3854, 4, 55),
(7, 'Mango', 4500, 42, 35),
(8, 'Tea', 800, 30, 140),
(9, 'Mustard', 550, 24, 170),
(10, 'Potato', 8155, 12, 12),
(11, 'Banana', 8000, 18, 20),
(12, 'Onion', 5100, 5, 20),
(13, 'Brinjal', 2600, 2, 35),
(14, 'Cauliflower', 1400, 3, 25),
(15, 'Tomato', 7500, 3, 35),
(16, 'Sugar Cane', 12517, 13, 10),
(17, 'Cabbage', 1250, 2, 20),
(18, 'Corn', 2532, 4, 35),
(19, 'Rose', 50, 2, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `DistrictId` int(11) NOT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  `DivisionName` varchar(255) DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistrictId`, `DistrictName`, `DivisionName`, `Longitude`, `Latitude`) VALUES
(1, 'Rajshahi', 'Rajshahi', 88.607349, 24.374578),
(2, 'Chapai Nawabganj', 'Rajshahi', 88.262664, 24.58216),
(3, 'Naogoan', 'Rajshahi', 88.944737, 24.804153),
(4, 'Pabna', 'Rajshahi', 89.264261, 24.016226),
(5, 'Nator', 'Rajshahi', 88.98687, 24.409204),
(6, 'Dinajpur', 'Rangpur', 88.645753, 25.629697),
(7, 'Sylhet', 'Sylhet', 91.880415, 24.886548),
(8, 'Khulna', 'Khulna', 89.542171, 22.828406),
(9, 'Khagrachuri', 'Chittagong', 91.990474, 23.103987),
(10, 'Jamalpur', 'Mymensingh', 89.950635, 24.925274),
(11, 'Panchagor', 'Rangpur', 88.550321, 26.331232);

-- --------------------------------------------------------

--
-- Table structure for table `districtwise`
--

CREATE TABLE `districtwise` (
  `DistrictWiseId` int(11) NOT NULL,
  `DistrictId` int(11) DEFAULT NULL,
  `CropId` int(11) DEFAULT NULL,
  `EstimateCostPerKilo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districtwise`
--

INSERT INTO `districtwise` (`DistrictWiseId`, `DistrictId`, `CropId`, `EstimateCostPerKilo`) VALUES
(1, 1, 1, 30),
(2, 1, 7, 10),
(3, 1, 18, 20),
(4, 1, 13, 25),
(5, 1, 14, 15),
(6, 1, 9, 100),
(7, 1, 5, 50),
(8, 2, 1, 30),
(9, 2, 4, 20),
(10, 2, 7, 10),
(11, 2, 17, 5),
(12, 2, 14, 10),
(13, 2, 18, 20),
(14, 3, 4, 15),
(15, 3, 5, 40),
(16, 3, 18, 25),
(17, 3, 7, 25),
(18, 3, 9, 80),
(19, 3, 10, 3),
(20, 3, 19, 1200),
(21, 4, 2, 40),
(22, 4, 3, 25),
(23, 4, 4, 25),
(24, 4, 5, 55),
(25, 4, 7, 25),
(26, 4, 9, 110),
(27, 4, 11, 5),
(28, 4, 13, 15),
(29, 4, 15, 10),
(30, 6, 1, 25),
(31, 6, 2, 30),
(32, 6, 3, 20),
(33, 6, 9, 120),
(34, 6, 13, 15),
(35, 6, 14, 10),
(36, 6, 15, 15),
(37, 6, 16, 4),
(38, 7, 8, 60),
(39, 7, 10, 8),
(40, 7, 11, 5),
(41, 7, 15, 20),
(42, 7, 17, 10),
(43, 7, 18, 27),
(44, 7, 19, 1750),
(45, 8, 1, 30),
(46, 8, 3, 15),
(47, 8, 4, 15),
(48, 8, 5, 30),
(49, 8, 9, 90),
(50, 8, 12, 5),
(51, 8, 13, 10),
(52, 8, 14, 10),
(53, 8, 15, 15),
(54, 8, 16, 4),
(55, 8, 17, 8),
(56, 9, 3, 30),
(57, 9, 18, 28),
(58, 10, 1, 30),
(59, 10, 2, 30),
(60, 10, 3, 25),
(61, 10, 4, 20),
(62, 10, 5, 30),
(63, 10, 6, 40),
(64, 10, 10, 3),
(65, 10, 15, 20),
(66, 11, 8, 90),
(67, 11, 19, 1100),
(68, 11, 9, 110),
(69, 11, 13, 20);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `SeasonId` int(11) NOT NULL,
  `SeasonName` varchar(255) DEFAULT NULL,
  `StartMonth` varchar(255) DEFAULT NULL,
  `EndMonth` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`SeasonId`, `SeasonName`, `StartMonth`, `EndMonth`) VALUES
(1, 'Summer', 'March', 'June'),
(2, 'Autumn', 'July', 'October'),
(3, 'Winter', 'November', 'February');

-- --------------------------------------------------------

--
-- Table structure for table `seasonwise`
--

CREATE TABLE `seasonwise` (
  `SeasonWiseId` int(11) NOT NULL,
  `SeasonId` int(11) DEFAULT NULL,
  `CropId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seasonwise`
--

INSERT INTO `seasonwise` (`SeasonWiseId`, `SeasonId`, `CropId`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 8),
(9, 2, 9),
(10, 3, 10),
(11, 2, 11),
(12, 1, 12),
(13, 3, 13),
(14, 3, 14),
(15, 2, 15),
(16, 1, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`CropId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`DistrictId`);

--
-- Indexes for table `districtwise`
--
ALTER TABLE `districtwise`
  ADD PRIMARY KEY (`DistrictWiseId`),
  ADD KEY `DistrictId` (`DistrictId`),
  ADD KEY `CropId` (`CropId`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`SeasonId`);

--
-- Indexes for table `seasonwise`
--
ALTER TABLE `seasonwise`
  ADD PRIMARY KEY (`SeasonWiseId`),
  ADD KEY `SeasonId` (`SeasonId`),
  ADD KEY `CropId` (`CropId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `CropId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `districtwise`
--
ALTER TABLE `districtwise`
  MODIFY `DistrictWiseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `SeasonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seasonwise`
--
ALTER TABLE `seasonwise`
  MODIFY `SeasonWiseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districtwise`
--
ALTER TABLE `districtwise`
  ADD CONSTRAINT `districtwise_ibfk_1` FOREIGN KEY (`DistrictId`) REFERENCES `district` (`DistrictId`),
  ADD CONSTRAINT `districtwise_ibfk_2` FOREIGN KEY (`CropId`) REFERENCES `crop` (`CropId`);

--
-- Constraints for table `seasonwise`
--
ALTER TABLE `seasonwise`
  ADD CONSTRAINT `seasonwise_ibfk_1` FOREIGN KEY (`SeasonId`) REFERENCES `season` (`SeasonId`),
  ADD CONSTRAINT `seasonwise_ibfk_2` FOREIGN KEY (`CropId`) REFERENCES `crop` (`CropId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
