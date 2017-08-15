-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 04:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `application_status` tinyint(4) NOT NULL,
  `application_date` date NOT NULL,
  `salary` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `email_add` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `applied_position` varchar(250) DEFAULT NULL,
  `interview_result` int(250) DEFAULT NULL,
  `exam_result` int(200) DEFAULT NULL,
  `interviewer` int(200) DEFAULT NULL,
  `catergory` int(150) DEFAULT NULL,
  `sss` int(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `philhealth` varchar(50) DEFAULT NULL,
  `pagibig` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `salary`, `position`, `comment`, `address`, `phone_no`, `bdate`, `date_hired`, `start_date`, `email_add`, `file`, `images`, `password`, `available_date`, `applied_position`, `interview_result`, `exam_result`, `interviewer`, `catergory`, `sss`, `tin`, `philhealth`, `pagibig`) VALUES
(28, '', 'Dee', '', '', '', 1, '2017-08-31', '', '', '', '', '', '2017-08-31', NULL, NULL, NULL, NULL, '20170705-Xian_Gaza-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '', 'Dee', '', '', '', 1, '2017-08-31', '', 'Java Developer', '', '', '', '2017-08-30', NULL, NULL, NULL, NULL, 'FHM-Oct-cover-Rachel-Ann-Daquis.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'asd', 'asdf', 'farrahdee24@gmail.com', '', '', 1, '2017-08-31', '', '', '', '', '', '2017-08-31', NULL, NULL, NULL, NULL, NULL, 'password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'testingpassword', 'testingpassword', 'farrahdee24@gmail.com', '', '', 1, '2017-08-31', '', '', '', 'testingpassword@mail.com', '', '2017-08-31', NULL, NULL, NULL, NULL, NULL, 'cbfdac6008f9cab4083784cbd1874f76618d2a97', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '', 'rugas', '', '', '', 1, '2017-08-31', '', 'Web Developer', '', '', '', '2017-08-31', NULL, NULL, 'ejr012495@gmail.com', NULL, NULL, 'ecad9a58403cec71cf8c042d4e4c82374c3bc3b9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'asdsad', 'asdasd', 'farrahdee24@gmail.com', '', '', 1, '2017-08-31', '', 'Web Developer', '', '', '', '2017-08-05', NULL, NULL, 'sample@mail.com', NULL, NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University of Santo Tomas', 1, '2017-06-19', '1', 'Intern', '', 'farrahdee24@gmail.com', '09169497936', '1996-09-24', NULL, NULL, NULL, NULL, '12988037_1141198455930611_1499812535_n.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `addrole` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`addrole`) VALUES
('Java Developer'),
('Web Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
