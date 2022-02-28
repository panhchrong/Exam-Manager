-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 12:14 PM
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
(38, 'Sith Panhchakroung', 'sithpanhchrong@gmail.com', '1234567890', '38member1.jpg'),
(39, 'Heng Sreypov', 'sreypovheng@gmail.com', '123456678', NULL),
(40, 'rong2', '13123@asdf.com', '12345678', NULL),
(42, 'Dexbuild42069', 'abcdef@gmail.com', '123456789', NULL),
(43, 'rong2', 'email2@gmail.com', '12345678', NULL),
(44, 'pov', 'pov@gmail.com', '12345678', NULL),
(45, 'rong-cool', 'rong3@gmail.com', '12345678', NULL),
(46, 'Rith Panhapich', 'panhapich.rith@yahoo.com', '1234567890', '46member2.jpg'),
(47, 'Test holder', 'testholder@yahoo.com', '123456789', NULL),
(48, 'user', 'user@gmail.com', '1234567890', NULL);

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
(53, 'R6x71qwO', '1', '1', '1', '1', '1', 'c', 5),
(54, 'djLKhoHF', 'what', 'f', 'g', 'h', 'j', 'a', 69),
(55, 'NLi7Yaoc', 'Which county did Ravi Shastri play for?', 'Glamorgan', 'Leicestershire', 'Gloucestershire', 'Lancashire', 'a', 10),
(56, 'NLi7Yaoc', 'The new committee system constitutes an improvement over the earlier committee system in so far as?', 'it assures representation to all the pol', 'it enables the Parliament to examine the', 'it enables the Parliament to accept the ', 'None of the above', 'b', 10),
(57, 'NLi7Yaoc', 'The Parliament exercises control over council of ministers, the real executive, in several ways. Whi', 'Questions', 'Supplementary questions', 'Adjournment motions', 'None of the above', 'd', 10),
(58, 'NLi7Yaoc', 'The Golf player Vijay Singh represents', 'Canada', 'Fiji', 'Sri Lanka', 'India', 'b', 10),
(59, 'NLi7Yaoc', 'Rangaswamy Cup is associated with?', 'archery', 'cricket', 'football', 'hockey', 'd', 10),
(60, 'XL5mqrU4', 'The Board of Industrial and Financial Reconstruction (BIFR) came into existence in', '1984', '1986', '1987', '1989', 'c', 10),
(61, 'XL5mqrU4', 'Deficit financing implies', 'printing new currency notes', 'replacing new currency with worn out cur', 'public expenditure in excess of public r', 'public revenue in excess of public expen', 'c', 10),
(62, 'XL5mqrU4', 'Lal Bahadur Shastri is also known as', 'Guruji', 'Man of Peace', 'Punjab Kesari', 'Mahamana', 'b', 10),
(63, 'XL5mqrU4', 'Liquid asset is', 'a type of asset that is in cash in the c', 'a type of asset that is in the form of a', 'either of these', 'None of the above', 'c', 10),
(64, 'XL5mqrU4', 'Moment of inertia is', 'vector', 'scalar', 'phasor', 'tensor', 'd', 10),
(65, 'seWzy0dG', 'What invention caused many deaths while testing it?', 'Dynamite', 'Ladders', 'Race cars', 'Parachute', 'd', 10),
(66, 'seWzy0dG', 'What beverage was invented by Charles Alderton in 1885 in Waco, Texas?', 'Cream soda', 'Coca-Cola', 'Dr. Pepper', 'Sprite', 'c', 10),
(67, 'seWzy0dG', 'Experts say the healthiest way to view a computer monitor is by...', 'Placing it 18 to 30 inches away from you', 'Viewing from a darkened room', 'Adjusting the screen for maximum contras', 'Using special glasses that filter out UV', 'a', 10),
(68, 'seWzy0dG', 'Ramapithecus and Cro-Magnon man are considered', 'ancestors of modern man', 'ancestors of monkey', 'ancestors of lion', 'None of the above', 'a', 10),
(69, 'seWzy0dG', 'The important industries of Assam are', 'tea processing, oil refineries and coal', 'silk and plywood', 'both (a) and (b)', 'None of the above', 'c', 10),
(70, 'xMCpwqtS', 'The scientist who first discovered that the earth revolves round the sun was', 'Newton', 'Dalton', 'Copernicus', 'Einstein', 'c', 10),
(71, '1uXV33kO', 'echo htmlspecialchars($str);\r\n', 'a', 'b', 'c', 'd', 'a', 10),
(72, 'awFnIEBW', 'Jude Felix is a famous Indian player in which of the fields?', 'Volleyball', 'Tennis', 'Football', 'Hockey', 'd', 10),
(73, 'awFnIEBW', 'The title of sparrow given to', 'Napoleon', 'Major General Rajinder Singh', 'Major General Rajinder Singh', 'Sardar Patel', 'b', 10),
(74, 'awFnIEBW', 'Which of the following awards was conferred on Mrs. Kiran Bedi?', 'Golden Globe', 'Rani Lakshmi', 'Magsaysay', 'Saraswati', 'c', 10),
(75, 'awFnIEBW', 'Crime and Punishment was written by', 'Fyodor Dostoevsky', 'Vladimir Nabakov', 'Lewis Carrol', 'Alexander Solzhenitsyn', 'a', 10),
(76, 'awFnIEBW', 'Gypsum is added to cement clinker to', 'increase the tensile strength of cement', 'decrease the rate of setting of cement', 'facilitate the formation of colloidal ge', 'bind the particles of calcium silicate', 'b', 10),
(77, 'DXpY8zAK', 'The members of the Rajya Sabha are', 'directly elected by the people on the ba', 'elected by the members of the state legi', 'elected by the members of the state legi', 'elected by the members of the state legi', 'b', 10),
(78, 'DXpY8zAK', 'The islands of Seychelles are located in the', 'Arctic Ocean', 'Atlantic Ocean', 'Indian Ocean', 'Pacific Ocean', 'c', 10),
(79, 'DXpY8zAK', 'For which of the following disciplines is Nobel Prize awarded?\r\n\r\n', 'Physics and Chemistry', 'Physiology or Medicine', 'Literature, Peace and Economics', 'All of the above', 'd', 10),
(80, 'DXpY8zAK', 'India played its first cricket Test Match in\r\n\r\n', '1922', '1922', '1942', '1952', 'b', 10),
(81, 'DXpY8zAK', 'ML2T-2 is the dimensional formula for\r\n\r\n', 'moment of inertia', 'pressure', 'elasticity', 'couple acting on a body', 'd', 10),
(82, 'v3hYZYm3', 'How many gold medals did P.T.Usha win in the 1986 Seoul Asian Games?\r\n\r\n', '1', '2', '3', '4', 'd', 10),
(83, 'v3hYZYm3', 'Gautam Gambhir made his ODI debut in 2003.That match was won by India by 200 runs.How many balls did', '10', '11', '22', '33', 'c', 10),
(84, 'v3hYZYm3', 'The transformer that develops the high voltage in a home television is commonly called a...?\r\n\r\n', 'Tesla coil', 'Flyback', 'Yoke', 'Van de Graaf', 'b', 10),
(85, 'v3hYZYm3', 'How many bits is a byte?\r\n\r\n', '4', '8', '16', '32', 'b', 10),
(86, 'v3hYZYm3', 'What does CPU stand for?\r\n\r\n', 'Cute People United', 'Commonwealth Press Union', 'Computer Parts of USA', 'Central Processing Unit', 'd', 10),
(87, 'sCgkIdC6', 'The most abundant rare gas in the atmosphere is\r\n\r\n', 'He', 'Ne', 'Ar', 'Xe', 'c', 10),
(88, 'sCgkIdC6', 'Pyorrhoea is a disease of the\r\n\r\n', 'nose', 'gums', 'heart', 'lungs', 'b', 10),
(89, 'sCgkIdC6', 'O2 released in the process of photosynthesis comes from\r\n\r\n', 'CO2', 'water', 'sugar', 'pyruvic acid', 'b', 10),
(90, 'sCgkIdC6', 'The temperature increases rapidly after\r\n\r\n', 'ionosphere', 'exosphere', 'stratosphere', 'troposphere', 'a', 10),
(91, 'sCgkIdC6', 'Tripping is associates with\r\n\r\n', 'Snooker', 'Volleyball', 'Football', 'Cricket', 'c', 10),
(92, 'KhT8x2sr', 'Girilal Jain was a noted figure in which of the following fields?\r\n\r\n', 'Social Service', 'Journalism', 'Literature', 'Politics', 'b', 10),
(93, 'KhT8x2sr', 'The famous book Anandmath was authored by\r\n\r\n', 'Sarojini Naidu', 'Bankim Chandra Chottapadhya', 'Sri Aurobindo', 'Rabindrnath Tagore', 'b', 10),
(94, 'KhT8x2sr', 'Which of the following is a military alliance?\r\n\r\n', 'NATO', 'NAFTA', 'EEC', 'ASEAN', 'a', 10),
(95, 'KhT8x2sr', 'The filament of an electric bulb is made of\r\n\r\n', 'tungsten', 'nichrome', 'graphite', 'iron', 'a', 10),
(96, 'KhT8x2sr', 'The main constituents of pearls are\r\n\r\n', 'calcium oxide and ammonium chloride', 'calcium carbonate and magnesium carbonat', 'aragonite and conchiolin', 'ammonium sulphate and sodium carbonate', 'b', 10),
(97, 'vDyO2INg', 'The iron and steel industries of which of the following countries are almost fully dependent on impo', 'Britain', 'Japan', 'Poland', 'Germany', 'b', 10),
(98, 'vDyO2INg', 'The iron ore mined at Bailadila is mostly\r\n\r\n', 'haematite', 'siderite', 'limonite', 'magnetic', 'a', 10),
(99, 'xJoMaTDW', 'Which of the following crops needs maximum water per hectare?\r\n\r\n', 'Barley', 'Maize', 'Sugarcane', 'Wheat', 'c', 10),
(100, 'xJoMaTDW', 'Sir C.V. Raman was awarded Nobel Prize for his work connected with which of the following phenomenon', 'Scattering', 'Diffraction', 'Interference', 'Polarization', 'a', 10),
(101, 'xJoMaTDW', 'If the picture is stretched or distorted up and down like a fun house mirror the circuit to adjust o', 'Vertical', 'Tuning', 'Horizontal', 'Filament', 'a', 10),
(102, 'xJoMaTDW', 'Who created Pretty Good Privacy (PGP)?\r\n\r\n', 'Phil Zimmermann', 'Tim Berners-Lee', 'Marc Andreessen', 'Ken Thompson', 'a', 10),
(103, 'xJoMaTDW', 'Placenta is the structure formed\r\n\r\n', 'by the union of foetal and uterine tissu', 'by foetus only', 'by fusion of germ layers', 'None of these', 'a', 10),
(104, 'sg0tUPgJ', 'Mumps is a disease caused by\r\n\r\n', 'fungus', 'bacterium', 'virus', 'None of these', 'c', 10),
(105, 'sg0tUPgJ', 'The helicopter fleet of Air Force consists of\r\n\r\n', 'Chetak', 'Cheetah', 'MI-8s, MI-17s, MI-26', 'All of the above', 'd', 10),
(106, 'sg0tUPgJ', 'Which of the following are the members of SAARC (South Asian Association for Regional Cooperation)?\r', 'Bhutan, Bangladesh, India and Pakistan', 'Bhutan, Bangladesh, the Maldives, Nepal,', 'Afghanistan, Pakistan, Thailand, Indones', 'None of the above', 'b', 10),
(107, 'sg0tUPgJ', 'The ratio of the weight of water vapour to the total weight of air (including the water vapor) is ca', 'specific humidity', 'mixing ratio', 'relative humidity', 'absolute humidity', 'a', 10),
(108, 'sg0tUPgJ', 'The sidereal month may be defined as\r\n\r\n', 'the period in which the moon completes a', 'the period in which the moon completes a', 'the period of rotation of moon', 'None of the above', 'b', 10),
(109, 'Rakc7c7T', 'On whose name is the highest award for services to the development of cinema given?\r\n\r\n', 'Raj Kapoor', 'Dada Saheb', 'Meena Kumari', 'Amitabh Bachchan', 'b', 10),
(110, 'Rakc7c7T', 'In India the first television programme was broadcasted in\r\n\r\n', '1959', '1965', '1976', '1957', 'a', 10),
(111, 'Rakc7c7T', 'The United Nations declared 1993 as a year of the\r\n\r\n', 'disabled', 'forests', 'girl child', 'indigenous people', 'd', 10),
(112, 'Rakc7c7T', 'The United Nations Conference on Trade and Development (UNCTAD) is located at which of the following', 'Geneva', 'Rome', 'Paris', 'Vienna', 'a', 10),
(113, 'Rakc7c7T', 'Who suggested that most of the mass of the atom is located in the nucleus?\r\n\r\n', 'Thompson', 'Bohr', 'Rutherford', 'Einstein', 'c', 10),
(114, 'gUekikvB', 'The iron and steel industries of which of the following countries are almost fully dependent on impo', 'Britain', 'Japan', 'Poland', 'Germany', 'b', 10),
(115, 'gUekikvB', 'The iron ore mined at Bailadila is mostly\r\n\r\n', 'haematite', 'siderite', 'limonite', 'magnetic', 'a', 10),
(116, 'ecxsvB9L', 'Which of the following is the first Indian private company to sign an accord with Government of Myan', 'Reliance Energy', 'Essar Oil', 'GAIL', 'ONGC', 'b', 10),
(117, 'ecxsvB9L', 'John F. Kennedy was\r\n\r\n', 'one the most popular Presidents of USA', 'the first Roman Catholic President', 'writer of Why England slept and Profile ', 'All the above', 'd', 10),
(118, 'ecxsvB9L', 'The Salal Project is on the river\r\n\r\n', 'Chenab', 'Jhelum', 'Ravi', 'Sutlej', 'a', 10),
(119, 'ecxsvB9L', 'Light from the star, Alpha Centauri, which is nearest to the earth after the sun, reaches the earth', '4.2 seconds', '42 seconds', '4.2 years', '42 years', 'c', 10),
(120, 'ecxsvB9L', 'CORN FLAKES - Who made them first?\r\n\r\n', 'Nabisco', 'Kellogg', 'Quaker', 'Archers', 'b', 10),
(121, 'xIcCy2RF', 'How many wickets did Yograj Singh take in his 1st ODI match?\r\n\r\n', '1', '2', '3', '4', 'b', 10),
(122, 'xIcCy2RF', 'The velocity of light was first measured by\r\n\r\n', 'Einstein', 'Newton', 'Romer', 'Galileo', 'c', 10),
(123, 'UAJlA8TY', 'How many wickets did Yograj Singh take in his 1st ODI match?\r\n\r\n', '1', '2', '3', '4', 'b', 10),
(124, 'UAJlA8TY', 'The velocity of light was first measured by\r\n\r\n', 'Einstein', 'Newton', 'Romer', 'Galileo', 'c', 10),
(125, '3KSjGKpw', 'India first won the Olympic Hockey gold at\r\n\r\n', 'London', 'Rome', 'Berlin', 'Amsterdam', 'd', 10),
(126, '3KSjGKpw', 'Bahadur Singh is famous in which of the following?\r\n\r\n', 'Athletics', 'Swimming', 'Boxing', 'Weight Lifting', 'a', 10),
(127, '3KSjGKpw', 'Which of the following fields A. Nageshwara Rao is associated with?\r\n\r\n', 'Sports', 'Literature', 'Motion Pictures', 'Politics', 'c', 10),
(128, '3KSjGKpw', 'Who is the author of the book The Future of Freedom?\r\n\r\n', 'Richard Wolfee', 'Peter Hudson', 'Peter Hudson', 'Fareed Zakaria', 'd', 10),
(129, '3KSjGKpw', 'The average salinity of sea water is\r\n\r\n', '3%', '3.5%', '2.5%', '2%', 'b', 10);

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
(54, 44, '2022-02-19T14:27', '2022-02-24T14:27', 5, 1, 5, 'R6x71qwO', 'Public Test', ''),
(55, 38, '2022-02-21T14:15', '2022-02-25T14:14', 69, 1, 69, 'djLKhoHF', 'today', '69'),
(56, 47, '2022-02-20T13:00', '2022-04-21T15:13', 10, 1, 50, 'NLi7Yaoc', 'test1', 'test number one'),
(57, 47, '2022-02-21T15:40', '2022-04-21T15:40', 20, 1, 50, 'XL5mqrU4', 'test 2', 'test number two'),
(58, 47, '2022-02-21T15:43', '2022-04-21T15:43', 20, 1, 50, 'seWzy0dG', 'test3', 'test number three'),
(61, 47, '2022-02-21T16:00', '2022-04-21T16:01', 20, 1, 50, 'awFnIEBW', 'test4', 'test number four'),
(62, 47, '2022-02-21T16:04', '2022-04-21T16:04', 20, 1, 50, 'DXpY8zAK', 'test5', 'test number five'),
(63, 47, '2022-02-21T16:06', '2022-04-21T16:06', 20, 1, 50, 'v3hYZYm3', 'test6', 'test number six'),
(64, 47, '2022-02-21T16:09', '2022-04-21T16:09', 20, 1, 50, 'sCgkIdC6', 'test7', 'test number seven'),
(65, 47, '2022-02-21T16:11', '2022-04-21T16:11', 20, 1, 50, 'KhT8x2sr', 'test8', 'test number eight'),
(67, 47, '2022-02-21T16:38', '2022-04-21T16:38', 20, 1, 50, 'xJoMaTDW', 'test9', 'test number nine'),
(68, 47, '2022-02-21T16:40', '2022-04-21T16:40', 20, 1, 50, 'sg0tUPgJ', 'test10', 'test number ten'),
(69, 47, '2022-02-21T16:44', '2022-04-21T16:44', 20, 1, 50, 'Rakc7c7T', 'test11', 'test number eleven'),
(71, 47, '2022-02-21T16:52', '2022-04-21T16:52', 20, 1, 50, 'ecxsvB9L', 'test12', 'test number twelve'),
(72, 47, '2022-02-21T16:54', '2022-04-21T16:54', 20, 1, 50, 'xIcCy2RF', 'test13', 'test number thirteen'),
(74, 47, '2022-02-21T16:59', '2022-04-21T16:59', 20, 1, 50, '3KSjGKpw', 'test14', 'test number fourteen');

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
(25, 38, 53, '2022-02-20T08:44', 0),
(26, 46, 54, '2022-02-21T08:12', 0),
(27, 46, 52, '2022-02-21T08:12', 0),
(28, 46, 55, '2022-02-21T08:15', 69),
(29, 38, 60, '2022-02-21T09:54', 10),
(30, 47, 55, '2022-02-21T09:56', 0),
(31, 47, 54, '2022-02-21T09:57', 0),
(32, 38, 56, '2022-02-21T11:12', 20);

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
(38, 54, 'completed'),
(46, 54, 'completed'),
(46, 52, 'completed'),
(46, 55, 'completed'),
(38, 60, 'completed'),
(47, 55, 'completed'),
(47, 54, 'completed'),
(38, 56, 'completed'),
(38, 57, 'ongoing'),
(38, 58, 'ongoing'),
(38, 61, 'ongoing'),
(38, 62, 'ongoing'),
(38, 63, 'ongoing'),
(38, 64, 'ongoing'),
(38, 65, 'ongoing'),
(38, 67, 'ongoing'),
(38, 68, 'ongoing'),
(38, 69, 'ongoing'),
(38, 71, 'ongoing'),
(38, 72, 'ongoing'),
(38, 74, 'ongoing');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tblquestions`
--
ALTER TABLE `tblquestions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tblreturntest`
--
ALTER TABLE `tblreturntest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltest`
--
ALTER TABLE `tbltest`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbltestresult`
--
ALTER TABLE `tbltestresult`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
