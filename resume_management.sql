-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 05:24 AM
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
  `salary` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `comment` text,
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
  `category` tinyint(4) DEFAULT NULL,
  `sss` int(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `philhealth` varchar(50) DEFAULT NULL,
  `pagibig` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `salary`, `position`, `comment`, `address`, `phone_no`, `bdate`, `date_hired`, `start_date`, `email_add`, `file`, `images`, `password`, `available_date`, `applied_position`, `interview_result`, `exam_result`, `interviewer`, `category`, `sss`, `tin`, `philhealth`, `pagibig`) VALUES
(41, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University of Santo Tomas', 2, '2017-12-06', '1', '1', '', 'farrahdee24@gmail.com', '09169497936', '1996-02-09', NULL, NULL, NULL, NULL, 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-41.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Farrah', 'Dionisio', 'Delos Santos', '', '', 1, '1970-01-01', '', '2', '', 'farrahdee24@gmail.com', '09169497936', '1996-02-09', NULL, NULL, NULL, NULL, 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-42.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Farrah', 'dee', 'Delos Santos', 'BS Information Systems', 'University of Santo Tomas', 1, '2017-06-19', '1', '3', 'nice', '700 J.P Rizal St Makati City', '123456', '1996-09-24', NULL, NULL, 'farrahdee24@gmail.com', 'Resume3.docx', NULL, 'a0362d54a8f9706a33fecae35ee64a1fe8e6ad1d', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Java Developer'),
(2, 'Web Developer'),
(3, 'Intern'),
(4, 'Front-End Developer'),
(5, 'HR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
