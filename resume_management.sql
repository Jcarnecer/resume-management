-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 06:32 PM
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
  `available_date` date DEFAULT NULL,
  `interview_result` tinyint(4) DEFAULT NULL,
  `exam_result` tinyint(4) DEFAULT NULL,
  `interviewer` varchar(200) DEFAULT NULL,
  `category` tinyint(4) DEFAULT NULL,
  `interview_notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_status`, `application_date`, `salary`, `position`, `comment`, `address`, `phone_no`, `bdate`, `date_hired`, `start_date`, `email_add`, `file`, `images`, `available_date`, `interview_result`, `exam_result`, `interviewer`, `category`, `interview_notes`) VALUES
(65, 'Farrah', 'Dionisio', 'Delos Santos', 'BS Information Systems', 'University of Santo Tomas', 4, '1996-06-19', '1', '3', ' Beyonce ', '700 J.P Rizal St Makati City', '01211', '1996-09-24', NULL, NULL, 'farrahdee24@gmail.com', 'Basic_Curriculum_Vitae_example16.pdf', 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-439.jpg', NULL, NULL, NULL, 'Beyonce', 1, 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-440.jpg'),
(66, 'Armani', 'Dee', 'Delos Santos', 'BS Information Systems', 'University of Santo Tomas', 1, '2017-06-19', '200', '1', 'dog', '700 J.P Rizal St Makati City', '09169497936', '1996-09-24', NULL, NULL, 'farrahdee24@gmail.com', 'Basic_Curriculum_Vitae_example18.pdf', 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-442.jpg', NULL, 1, 0, 'Beyonce', 1, 'beyonce-2016-press-Parkwood-Entertainment-Lemonade-billboard-1548-650-456.jpg');

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
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `last_name`, `first_name`, `middle_name`, `home_address`, `email_address`, `phone_number`, `birth_date`, `position`, `date_hired`, `sss`, `tin`, `philhealth`, `pagibig`, `status`) VALUES
(2, 'Dionisio', 'Farrah', 'Delos Santos', '700 J.P Rizal St Makati City', 'farrahdee24@gmail.com', '123456', '1996-06-24', 'intern', '2017-06-19', '12346789', '0926354', '6516561', '151521', 1),
(3, 'Dionisio', 'Farrah', 'Delos Santos', '700 J.P Rizal St Makati City', 'farrahdee24@gmail.com', '123456', '1996-09-24', 'intern', '2017-06-19', '12346789', '0926354', '6516561', '151521', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
