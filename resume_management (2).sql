-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 08:49 AM
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `philhealth` varchar(100) DEFAULT NULL,
  `pagibig` varchar(100) DEFAULT NULL,
  `record_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 'Employee'),
(2, 'Intern'),
(3, 'Freelance');

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
  `exam_result` tinyint(4) DEFAULT NULL,
  `interview_result` tinyint(4) DEFAULT NULL,
  `current_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_date`, `role_id`, `pos_id`, `email`, `comment`, `home_address`, `phone_number`, `birthday`, `date_hired`, `file`, `images`, `available_date`, `interviewer`, `interview_notes`, `exam_result`, `interview_result`, `current_status`, `created_at`, `update_at`) VALUES
(7, 'asdsad', 'Asdasd', 'Asdsad', '1232', '3123', '0002-03-21', '138', 1, '12321@gmail.com', '312', '12323', '13123', '0002-03-12', '2017-10-20', 'AdaSamples20.pdf', NULL, '0002-03-12', '', NULL, 1, 0, 'Applicant', '2017-10-19 08:03:40', '2017-10-20 06:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pos_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `pos_id`, `status`, `created_at`, `updated_at`) VALUES
(138, 'Java Developer', '1', 1, '2017-10-17 12:10:10', '2017-10-20 02:44:10'),
(139, 'PHP Developer', '1', 1, '2017-10-17 12:10:10', '2017-10-20 04:58:26'),
(140, 'Graphics Designer', '2', 1, '2017-10-17 12:10:10', '2017-10-17 12:10:28'),
(141, 'Content Writer', '3', 1, '2017-10-17 12:10:10', '2017-10-17 12:10:28'),
(142, 'Ruby On Rails', '2', 1, '2017-10-18 02:25:07', '2017-10-18 02:29:58');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
