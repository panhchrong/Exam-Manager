-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 06:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblperson`
--

CREATE TABLE `tblperson` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `_Password` text NOT NULL,
  `Picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblperson`
--

INSERT INTO `tblperson` (`ID`, `Username`, `Email`, `_Password`, `Picture`) VALUES
(38, 'Sith Panhchakroung', 'sithpanhchrong@gmail.com', '012890989', '38ky4qwf1xlam61.jpg'),
(39, 'Heng Sreypov', 'sreypovheng@gmail.com', '123456678', NULL),
(40, 'rong2', '13123@asdf.com', '12345678', NULL),
(42, 'Dexbuild42069', 'abcdef@gmail.com', '123456789', NULL),
(43, 'rong2', 'email2@gmail.com', '12345678', NULL),
(44, 'pov', 'pov@gmail.com', '12345678', NULL),
(45, 'rong-cool', 'rong3@gmail.com', '12345678', '4578236548_p0_master1200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestions`
--

CREATE TABLE `tblquestions` (
  `ID` int(11) NOT NULL,
  `TestCode` varchar(10) DEFAULT NULL,
  `question` char(100) DEFAULT NULL,
  `option1` varchar(40) NOT NULL,
  `option2` varchar(40) NOT NULL,
  `option3` varchar(40) NOT NULL,
  `option4` varchar(40) NOT NULL,
  `correctedOption` char(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblquestions`
--

INSERT INTO `tblquestions` (`ID`, `TestCode`, `question`, `option1`, `option2`, `option3`, `option4`, `correctedOption`, `score`) VALUES
(39, 'vC0yLBdz', 'Question 1', 'option 1-1', 'option 1-2', 'option 1-3', 'option 1-4', 'b', 5),
(40, 'vC0yLBdz', 'Question 2', 'option 2-1', 'option 2-2', 'option 2-3', 'option 2-4', 'c', 5),
(41, 'vC0yLBdz', 'Question 3', 'option 3-1', 'option 3-2', 'option 3-3', 'option 3-4', 'a', 5),
(42, 'DYc0Rvha', '1', '1', '1', '1', '1', 'a', 30),
(43, 'DYc0Rvha', '2', '2', '2', '2', '2', 'd', 30),
(44, 'FKLpGbRk', '3', '3', '3', '3', '3', 'b', 30),
(45, 'FKLpGbRk', '4', '4', '4', '4', '4', 'a', 30),
(46, '89esn9Ia', '1', '1', '1', '1', '1', 'b', 4),
(47, 'H05us6MB', 'question', 'option1', 'option2', 'option3', 'option4', 'a', 100),
(48, '7Exkbvry', '1', '2', '2', '2', '2', 'a', 5),
(49, 'tJFMz4dW', '3', '3', '3', '3', '3', 'c', 5),
(50, 'Ya8J5S4s', 'hello', '123', '1234', '12345', '1213456', 'c', 4),
(51, '5pXNUtNt', 'public', '1', '21', '2', '3', 'a', 5),
(52, 'iZF2XjiW', '1', '1', '1', '1', '1', 'a', 5),
(53, 'R6x71qwO', '1', '1', '1', '1', '1', 'c', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblreturntest`
--

CREATE TABLE `tblreturntest` (
  `ID` int(11) NOT NULL,
  `resultID` int(11) DEFAULT NULL,
  `answer` char(150) DEFAULT NULL,
  `Question` varchar(50) NOT NULL,
  `Option1` varchar(40) NOT NULL,
  `Option2` varchar(40) NOT NULL,
  `Option3` varchar(40) NOT NULL,
  `Option4` varchar(40) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreturntest`
--

INSERT INTO `tblreturntest` (`ID`, `resultID`, `answer`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Score`) VALUES
(2, 15, 'Hello', 'how do u write hello', 'hi', 'hey', 'how', 'hello', 5),
(3, 15, 'yo', 'how do u write yo', 'hi', 'hey', 'yo', 'hello', 5),
(4, 15, 'is', 'how do u write is', 'hi', 'is', 'how', 'hello', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbltest`
--

CREATE TABLE `tbltest` (
  `testID` int(11) NOT NULL,
  `hostID` int(11) DEFAULT NULL,
  `TestStartDate` char(50) DEFAULT NULL,
  `TestEndDate` varchar(50) NOT NULL,
  `testDuration` int(11) DEFAULT NULL,
  `isPublic` tinyint(1) DEFAULT NULL,
  `testScore` int(11) DEFAULT NULL,
  `testCode` char(8) DEFAULT NULL,
  `testName` char(50) DEFAULT NULL,
  `testDescription` char(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltest`
--

INSERT INTO `tbltest` (`testID`, `hostID`, `TestStartDate`, `TestEndDate`, `testDuration`, `isPublic`, `testScore`, `testCode`, `testName`, `testDescription`) VALUES
(44, 38, '2022-02-03T15:38', '2022-02-04T15:38', 30, 1, 15, 'vC0yLBdz', 'First-Test', 'hello world'),
(45, 38, '2022-02-03T22:43', '2022-02-05T22:43', 20, 1, 60, 'DYc0Rvha', 'Test name', ''),
(46, 38, '2022-02-03T23:27', '2022-02-04T23:27', 30, 1, 60, 'FKLpGbRk', '5', ''),
(47, 38, '2022-02-09T23:29', '2022-02-17T23:29', 555, 1, 4, '89esn9Ia', '1', ''),
(48, 38, '2022-02-10T09:39', '2022-02-12T00:43', 1, 1, 100, 'H05us6MB', 'time test', ''),
(49, 38, '2022-02-14T15:30', '2022-02-15T14:41', 20, 1, 5, '7Exkbvry', 'test time2', ''),
(50, 44, '2022-02-14T16:30', '2022-02-15T15:29', 23, 1, 5, 'tJFMz4dW', 'test time 3', ''),
(51, 38, '2022-02-18T15:55', '2022-02-19T14:55', 23, 0, 4, 'Ya8J5S4s', 'test time', ''),
(52, 38, '2022-02-19T15:00', '2022-02-24T15:00', 12, 1, 5, '5pXNUtNt', 'public test', 'abc'),
(53, 44, '2022-02-19T15:25', '2022-02-26T14:26', 5, 0, 5, 'iZF2XjiW', 'private test', ''),
(54, 44, '2022-02-19T14:27', '2022-02-24T14:27', 5, 1, 5, 'R6x71qwO', 'Public Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestresult`
--

CREATE TABLE `tbltestresult` (
  `ID` int(11) NOT NULL,
  `perID` int(11) DEFAULT NULL,
  `testID` int(11) DEFAULT NULL,
  `SubmitDate` varchar(20) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltestresult`
--

INSERT INTO `tbltestresult` (`ID`, `perID`, `testID`, `SubmitDate`, `score`) VALUES
(20, 44, 44, '2022-02-10T04:12', 5),
(21, 44, 45, '2022-02-10T04:24', 0),
(22, 44, 48, '2022-02-10T12:39', 10),
(23, 44, 47, '2022-02-14T07:48', 0),
(24, 38, 54, '2022-02-19T08:41', 0),
(25, 38, 53, '2022-02-20T08:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testaccepted`
--

CREATE TABLE `testaccepted` (
  `perID` int(11) DEFAULT NULL,
  `testID` int(11) DEFAULT NULL,
  `_status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testaccepted`
--

INSERT INTO `testaccepted` (`perID`, `testID`, `_status`) VALUES
(44, 44, 'completed'),
(44, 45, 'completed'),
(44, 48, 'completed'),
(43, 48, 'overdue'),
(44, 47, 'completed'),
(44, 49, 'overdue'),
(38, 50, 'ongoing'),
(44, 51, 'overdue'),
(44, 52, 'ongoing'),
(38, 53, 'completed'),
(38, 54, 'completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblperson`
--
ALTER TABLE `tblperson`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblquestions`
--
ALTER TABLE `tblquestions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreturntest`
--
ALTER TABLE `tblreturntest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltest`
--
ALTER TABLE `tbltest`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `tbltestresult`
--
ALTER TABLE `tbltestresult`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblperson`
--
ALTER TABLE `tblperson`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblquestions`
--
ALTER TABLE `tblquestions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblreturntest`
--
ALTER TABLE `tblreturntest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltest`
--
ALTER TABLE `tbltest`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbltestresult`
--
ALTER TABLE `tbltestresult`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
