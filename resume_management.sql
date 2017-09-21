-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2017 at 01:06 AM
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

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `expected_salary`, `role`, `comment`, `home_address`, `phone_number`, `birth_date`, `date_hired`, `start_date`, `email_address`, `file`, `images`, `available_date`, `interview_result`, `exam_result`, `interviewer`, `interview_notes`, `status`, `applicant_type`, `position`) VALUES
(81, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University Of Santo Tomas', 1, '2017-06-19', '200', '35', 'Askfabslfkja', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', NULL, NULL, 'Farrahdee24@gmail.com', NULL, '20117372_1578945632155889_1325661114_n.jpg', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(82, 'Farrah', 'Dionisio', 'Delos Santos', '1', 'University Of Santo Tomas', 1, '2014-11-30', 'A;lsfjna;lsnfa', '36', 'Lfnasl;faks', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', NULL, NULL, 'Farrahdee24@gmail.com', '20117372_1578945632155889_1325661114_n19.jpg', '20117372_1578945632155889_1325661114_n20.jpg', NULL, NULL, NULL, NULL, NULL, 0, 0, 1),
(83, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University Of Santo Tomas', 1, '2015-08-30', 'A', '36', '.nalsaks', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', NULL, NULL, 'Farrahdee24@gmail.com', '20117372_1578945632155889_1325661114_n23.jpg', '20117372_1578945632155889_1325661114_n24.jpg', NULL, NULL, NULL, NULL, NULL, 0, 0, 1);

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
  `comment` varchar(250) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `last_name`, `first_name`, `middle_name`, `home_address`, `email_address`, `phone_number`, `birth_date`, `position`, `date_hired`, `sss`, `tin`, `philhealth`, `pagibig`, `status`, `employment_type`, `degree`, `school`, `comment`, `role`) VALUES
(26, 'Dionisio', 'Farrah', 'Delos Santos', '700 J.P Rizal St Makati City', 'Farrahdee24@gmail.com', '7291660', '0000-00-00', '23', '2017-09-21', NULL, NULL, NULL, NULL, 1, 3, 'BS Information Systems', 'University Of Santo Tomas', '', 0),
(27, 'Dionisio', 'Farrah', 'Delos Santos', '700 J.P Rizal St Makati City', 'Farrahdee24@gmail.com', '7291660', '1996-09-24', '2', '0000-00-00', '', '', '', '', 0, 2, 'BS Information Systems', 'University Of Santo Tomas', '', 0),
(28, 'Dionisio', 'Armani', 'Delos Santos', '700 J.P Rizal St Makati City', 'Farrahdee24@gmail.com', '7291660', '2017-09-24', '2', '0000-00-00', '', '', '', '', 0, 2, 'BS Information Systems', 'University Of Santo Tomas', '', 37);

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `degree` varchar(150) NOT NULL,
  `school` varchar(150) NOT NULL,
  `application_status` tinyint(4) NOT NULL,
  `application_date` date NOT NULL,
  `expected_salary` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `date_hired` date NOT NULL,
  `start_date` date NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `available_date` date NOT NULL,
  `interview_result` tinyint(4) NOT NULL,
  `exam_result` tinyint(4) NOT NULL,
  `interviewer` varchar(150) NOT NULL,
  `interview_notes` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `applicant_type` tinyint(4) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Applicant'),
(2, 'Employee'),
(3, 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `pos_id`) VALUES
(35, 'Java Developer', 3),
(36, 'Front Developer', 1),
(37, 'President', 2);

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
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
