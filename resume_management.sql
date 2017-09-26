-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 11:15 PM
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
(26, NULL, NULL, NULL, NULL, 0),
(27, '', '', '', '', 0),
(28, '', '', '', '', 0),
(29, '', '', '', '', 0),
(30, '', '', '', '', 0);

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
  `record_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(509) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
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
  `interview_note` text,
  `current_status` varchar(50) DEFAULT NULL,
  `school` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `first_name`, `last_name`, `middle_name`, `degree`, `application_status`, `application_date`, `role_id`, `pos_id`, `email`, `comment`, `home_address`, `phone_number`, `birthday`, `date_hired`, `file`, `images`, `available_date`, `interviewer`, `interview_note`, `current_status`, `school`) VALUES
(22, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 5, '2017-06-19', '46', 1, 'farrahdee24@gmail.com', 'Hello', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', '0000-00-00', '20117372_1578945632155889_1325661114_n45.jpg', '20117372_1578945632155889_1325661114_n46.jpg', '2017-06-19', NULL, NULL, 'current', ''),
(23, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', NULL, '2017-06-19', '44', 1, 'farrahdee24@gmail.com', 'A.dfmdlfv,', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', '2017-04-22', '20117372_1578945632155889_1325661114_n47.jpg', '21272215_1820654874641235_5372675952941739769_n5.jpg', '2017-09-09', NULL, NULL, 'Current', ''),
(24, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', NULL, '2017-06-19', '44', 1, 'farrahdee24@gmail.com', 'A.dfmdlfv,', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', '2017-04-22', '20117372_1578945632155889_1325661114_n48.jpg', '21272215_1820654874641235_5372675952941739769_n6.jpg', '2017-09-09', NULL, NULL, 'Current', ''),
(25, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', NULL, '2017-02-19', '46', 1, 'farrahdee24@gmail.com', ',mfaks', '700 J.P Rizal St Makati City', '7291660', '1996-09-24', '2017-06-19', '21272215_1820654874641235_5372675952941739769_n7.jpg', '20117372_1578945632155889_1325661114_n49.jpg', '2017-09-19', NULL, NULL, 'Current', ''),
(26, 'Farrah', 'Dionisio', 'Fasfafs', 'BS Information Systems', 1, '2017-06-19', '44', 1, 'farrahdee24@gmail.com', 'Aksjnsj', '700 J.P Rizal St Makati City', '7291660', '2017-06-19', '2017-06-19', '20117372_1578945632155889_1325661114_n50.jpg', '20117372_1578945632155889_1325661114_n51.jpg', '2017-06-19', NULL, NULL, 'Applicant', ''),
(27, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 1, '2017-06-19', '44', 1, 'farrahdee24@gmail.com', 'Svsdgs', '700 J.P Rizal St Makati City', '7291660', '2017-06-19', '2017-02-19', '20117372_1578945632155889_1325661114_n52.jpg', '21687624_1399134633538897_2319669677008062652_n.jpg', '2017-06-19', NULL, NULL, 'Applicant', '');

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
(44, 'President', 1, NULL),
(46, 'Java', 1, 1),
(48, 'HELLO', 2, NULL),
(49, 'PHP Developer', 2, 1);

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
  ADD PRIMARY KEY (`record_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
