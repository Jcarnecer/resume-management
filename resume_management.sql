-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 10:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `degree` varchar(250) DEFAULT NULL,
  `school` varchar(250) DEFAULT NULL,
  `application_status` tinyint(4) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `expected_salary` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `comment` text,
  `home_address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `interview_result` tinyint(4) DEFAULT NULL,
  `exam_result` tinyint(4) DEFAULT NULL,
  `interviewer` varchar(200) DEFAULT NULL,
  `interview_notes` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `expected_salary`, `position`, `comment`, `home_address`, `phone_number`, `birth_date`, `date_hired`, `start_date`, `email_address`, `file`, `images`, `available_date`, `interview_result`, `exam_result`, `interviewer`, `interview_notes`, `status`) VALUES
(73, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University Of Santo Tomas', 3, '2017-06-19', '200', '13', 'Hello!', '700 J.P Rizal St Makati City', '63985', '1996-09-24', NULL, NULL, 'Farrahdee24@gmail.com', '20117372_1578945632155889_1325661114_n4.jpg', '20117372_1578945632155889_1325661114_n5.jpg', NULL, NULL, NULL, NULL, NULL, 0),
(74, 'Farrah', 'Dionisio', 'Delos Santos', '', '', 1, '0000-00-00', '', '19', '', '700 J.P Rizal St Makati City', '7291660', '0000-00-00', NULL, NULL, 'Farrahdee24@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `home_address` varchar(200) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `philhealth` varchar(100) DEFAULT NULL,
  `pagibig` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `employment_type` tinyint(4) NOT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `last_name`, `first_name`, `middle_name`, `home_address`, `email_address`, `phone_number`, `birth_date`, `position`, `date_hired`, `sss`, `tin`, `philhealth`, `pagibig`, `status`, `employment_type`, `degree`, `school`, `comment`) VALUES
(15, 'Dionisio', 'Farrah', 'Delos Santos', '700 J.P Rizal St Makati City', 'Farrahdee24@gmail.com', '7291660', '2017-09-24', '20', '2017-06-19', '12346789', '0926354', '6516561', '151521', 1, 2, 'BS Information Systems', 'University Of Santo Tomas', '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `type`) VALUES
(18, 'President', 2),
(19, 'Java Developer', 1),
(20, 'PHP Developer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
