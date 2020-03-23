-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 10:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `major`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `attendance_status` char(1) NOT NULL,
  `attendance_date` date NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `lecture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `attendance_status`, `attendance_date`, `faculty_id`, `lecture`) VALUES
(1, '17041C04013', 'A', '2020-03-20', 5, 1),
(2, '17041C04060', 'A', '2020-03-20', 5, 1),
(3, '17041C04061', 'P', '2020-03-20', 5, 1),
(4, '17041C04013', 'A', '2020-03-21', 5, 1),
(5, '17041C04060', 'A', '2020-03-21', 5, 1),
(6, '17041C04061', 'A', '2020-03-21', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `sno` int(11) NOT NULL,
  `code` text NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`sno`, `code`, `branch`) VALUES
(4, 'civil', 'Civil'),
(1, 'cse', 'Computer Science'),
(3, 'et', 'Electronics & Telecommunication'),
(5, 'ft', 'Fashion Technology'),
(2, 'mech', 'Mechanical'),
(6, 'mom', 'Modern Office Management'),
(7, 'tnt', 'Travel & Tourism');

-- --------------------------------------------------------

--
-- Table structure for table `facreg`
--

CREATE TABLE `facreg` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `branch` text NOT NULL,
  `pass` varchar(50) NOT NULL,
  `qualify` varchar(10) NOT NULL,
  `post` text NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facreg`
--

INSERT INTO `facreg` (`sno`, `name`, `img`, `mobile`, `email`, `branch`, `pass`, `qualify`, `post`, `address`) VALUES
(5, 'Jayesh', 'Screenshot (1).png', 1234567890, 'yashnavik99@gmail.com', 'cse', '202cb962ac59075b964b07152d234b70', '10 pass', 'guest faculty', 'dvhd'),
(6, 'Mayur', '', 1234567890, 'mayur@gmail.com', 'cse', '81dc9bdb52d04dc20036dbd8313ed055', '10th pass', 'guest faculty', 'xc');

-- --------------------------------------------------------

--
-- Table structure for table `query_ans`
--

CREATE TABLE `query_ans` (
  `ans_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `ans_desc` varchar(250) NOT NULL,
  `answerer_type` int(11) NOT NULL,
  `answerer` varchar(35) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_ans`
--

INSERT INTO `query_ans` (`ans_id`, `que_id`, `ans_desc`, `answerer_type`, `answerer`, `time`) VALUES
(1, 1, 'aukaat me reh', 4, '17041c04061', '2020-03-21 14:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `query_que`
--

CREATE TABLE `query_que` (
  `que_id` int(11) NOT NULL,
  `qtopic` varchar(15) NOT NULL,
  `qtitle` varchar(35) NOT NULL,
  `qdesc` varchar(250) NOT NULL,
  `asker_type` int(11) NOT NULL,
  `asker` varchar(35) NOT NULL,
  `time` datetime NOT NULL,
  `ask_to` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_que`
--

INSERT INTO `query_que` (`que_id`, `qtopic`, `qtitle`, `qdesc`, `asker_type`, `asker`, `time`, `ask_to`) VALUES
(1, 'C', 'How to use Functions', 'I wanted to know about the functions of C\r\nPlease help me out..', 4, '17041c04061', '2020-03-21 14:54:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stdinfo`
--

CREATE TABLE `stdinfo` (
  `roll_no` varchar(15) NOT NULL,
  `fatname` text NOT NULL,
  `motname` text NOT NULL,
  `gender` text NOT NULL,
  `branch` text NOT NULL,
  `year` int(1) NOT NULL,
  `sem` int(1) NOT NULL,
  `altphone` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdinfo`
--

INSERT INTO `stdinfo` (`roll_no`, `fatname`, `motname`, `gender`, `branch`, `year`, `sem`, `altphone`, `dob`, `aadhar`, `address`) VALUES
('17041C04012', 'dsfds', 'sfsd', 'female', 'cse', 2, 4, 1234567891, '2020-03-17', 24234234234, 'dsfs'),
('17041C04013', 'd', 'aasd', 'm', 'cse', 3, 6, 1234567890, '2020-03-05', 123456789017, 'xc'),
('17041C04060', 'kishor shah', 'dk', 'male', 'cse', 3, 6, 123456789, '2020-03-09', 123456789012, 'azswx'),
('17041C04061', 'deepak navik', 'meena navik', 'male', 'cse', 3, 6, 9893961155, '2002-07-22', 909612457421, 'azad nagar'),
('17041ME12', 'dgdg', 'dgdg', 'male', 'mech', 3, 6, 12345678978, '2020-03-11', 12163, 'sdsfg');

-- --------------------------------------------------------

--
-- Table structure for table `stdreg`
--

CREATE TABLE `stdreg` (
  `sno` int(11) NOT NULL,
  `roll` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdreg`
--

INSERT INTO `stdreg` (`sno`, `roll`, `name`, `img`, `pass`, `phone`, `mail`, `status`) VALUES
(1, '17041C04061', 'yash navik', 'Screenshot (1).png', '860597464b31f718bc28e3994d28d0f0', 7000915288, 'yashnavik99@gmail.com', 'A'),
(2, '17041C04060', 'praful shah', '', '23123', 1234567890, 'p@123.com', 'A'),
(3, '17041C04012', 'asf', '', '23123', 1234567895, 'sds', 'A'),
(4, '17041ME12', 'hiroshi', '', '23123', 1234567897, 'dasds', 'A'),
(6, '17041C04013', 'Mayur', 'image/profile.jpg', 'c8ffe9a587b126f152ed3d89a146b445', 2016574387, 'mayur@123.com', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_desc`) VALUES
(1, 'Admin'),
(2, 'Management'),
(3, 'Faculty'),
(4, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`code`(5)),
  ADD KEY `sno` (`sno`);

--
-- Indexes for table `facreg`
--
ALTER TABLE `facreg`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `query_ans`
--
ALTER TABLE `query_ans`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `answerer_type` (`answerer_type`);

--
-- Indexes for table `query_que`
--
ALTER TABLE `query_que`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `asker_type` (`asker_type`);

--
-- Indexes for table `stdinfo`
--
ALTER TABLE `stdinfo`
  ADD PRIMARY KEY (`roll_no`),
  ADD UNIQUE KEY `aadhar` (`aadhar`);

--
-- Indexes for table `stdreg`
--
ALTER TABLE `stdreg`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facreg`
--
ALTER TABLE `facreg`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `query_ans`
--
ALTER TABLE `query_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query_que`
--
ALTER TABLE `query_que`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stdreg`
--
ALTER TABLE `stdreg`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `facreg` (`sno`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `stdreg` (`roll`);

--
-- Constraints for table `query_ans`
--
ALTER TABLE `query_ans`
  ADD CONSTRAINT `answerer_type` FOREIGN KEY (`answerer_type`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `query_que`
--
ALTER TABLE `query_que`
  ADD CONSTRAINT `asker_type` FOREIGN KEY (`asker_type`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `stdinfo`
--
ALTER TABLE `stdinfo`
  ADD CONSTRAINT `roll` FOREIGN KEY (`roll_no`) REFERENCES `stdreg` (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
