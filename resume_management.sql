-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 07:38 PM
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
  `role` varchar(50) DEFAULT NULL,
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
  `status` tinyint(4) NOT NULL,
  `applicant_type` tinyint(4) NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `philhealth` varchar(100) DEFAULT NULL,
  `pagibig` varchar(100) DEFAULT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `sss`, `tin`, `philhealth`, `pagibig`, `record_id`) VALUES
(1, '12346789', '0926354', '6516561', '151521', 58),
(2, '12346789', '0926354', '6516561', '151521', 59),
(3, '12346789', '0926354', '6516561', '151521', 60),
(4, '12346789', '0926354', '6516561', '151521', 61),
(5, '12346789', '0926354', '6516561', '151521', 62),
(6, '12346789', '0926354', '6516561', '151521', 63),
(7, '12346789', '0926354', '6516561', '151521', 70),
(8, '12346789', '0926354', '6516561', '151521', 71),
(9, '12346789', '0926354', '6516561', '151521', 72),
(10, '12346789', '0926354', '6516561', '151521', 73),
(11, '12346789', '0926354', '6516561', '151521', 72),
(12, '12346789', '0926354', '6516561', '151521', 73),
(13, '12346789', '0926354', '6516561', '151521', 78),
(14, '12346789', '0926354', '6516561', '151521', 79),
(15, '', '', '', '', 80),
(16, '', '', '', '', 81),
(17, '', '', '', '', 82),
(18, '', '', '', '', 83),
(19, '12346789', '0926354', '6516561', '151521', 82),
(20, '12346789', '0926354', '6516561', '151521', 83),
(21, '12346789', '0926354', '6516561', '151521', 86),
(22, '12346789', '0926354', '6516561', '151521', 87),
(23, '', '', '', '', 88),
(24, '', '', '', '', 89),
(25, '123', '123', '123', '123', 92),
(26, '123', '123', '123', '123', 93);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Employee'),
(2, 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(509) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `school` varchar(200) NOT NULL,
  `application_status` tinyint(4) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `role_id` varchar(50) DEFAULT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `home_address` text,
  `phone_number` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `interviewer` varchar(100) DEFAULT NULL,
  `interview_notes` text,
  `exam_result` tinyint(4) NOT NULL,
  `interview_result` tinyint(4) NOT NULL,
  `current_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `role_id`, `pos_id`, `email`, `comment`, `home_address`, `phone_number`, `birthday`, `date_hired`, `file`, `images`, `available_date`, `interviewer`, `interview_notes`, `exam_result`, `interview_result`, `current_status`) VALUES
(94, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', '', 1, '2015-09-30', '81', 1, 'farrahdee24@gmail.com', 'Cdsergtrfdsx', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', NULL, '20117372_1578945632155889_1325661114_n28.jpg', '21272215_1820654874641235_5372675952941739769_n25.jpg', '1996-09-24', NULL, NULL, 0, 0, 'Applicant'),
(95, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', '', 5, '2015-09-30', '81', 1, 'farrahdee24@gmail.com', 'Cdsergtrfdsx', '700 J.P Rizal St Makati City', '7291660', '0000-00-00', NULL, '20117372_1578945632155889_1325661114_n29.jpg', '21272215_1820654874641235_5372675952941739769_n26.jpg', '1996-09-24', NULL, NULL, 0, 0, 'current');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pos_id` int(11) NOT NULL,
  `applicant` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `pos_id`, `applicant`) VALUES
(81, 'Java Developer', 1, 1),
(82, 'PHP Developer', 2, 1);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
