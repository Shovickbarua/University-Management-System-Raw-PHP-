-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:45 PM
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
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_student`
--

CREATE TABLE `add_student` (
  `id` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `id_no` int(100) NOT NULL,
  `dob` date NOT NULL,
  `year_id` int(100) NOT NULL,
  `class_id` int(100) NOT NULL,
  `group_id` int(100) NOT NULL,
  `shift_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_student`
--

INSERT INTO `add_student` (`id`, `usertype`, `name`, `fName`, `mName`, `mobile`, `address`, `gender`, `religion`, `discount`, `id_no`, `dob`, `year_id`, `class_id`, `group_id`, `shift_id`, `image`) VALUES
(1, 'student', 'Test', 'Test2', 'Test3', 54551, 'v vbv', 'Male', 'Islam', '121556', 20200001, '1970-01-01', 2, 1, 1, 1, 'stu_images/Star Tech - 1635482410.png'),
(2, 'student', 'dd', 'Test2', 'Test3', 54551, 'sdfd', 'Male', 'Hindu', '4245', 20200002, '1970-01-01', 1, 1, 2, 1, 'stu_images/254548650_570106837583111_748276754996781239_n.jpg'),
(3, 'student', 'shovick', 'samir', 'sunanda', 54551, 'dgdfg', 'Male', 'Buddhist', '4524', 20200003, '1970-01-01', 1, 1, 3, 1, 'stu_images/breshenham.jpg'),
(4, 'student', 'Ashraf', 'Test2', 'Test3', 54551, 'fefe', 'Male', 'Islam', '54354', 20200004, '1970-01-01', 1, 1, 3, 1, 'stu_images/dda.jpg'),
(5, 'student', 'Upama', 'Test2', 'Test3', 54551, 'gfbf', 'Female', 'Hindu', '4534', 20200005, '1970-01-01', 1, 1, 3, 1, 'stu_images/Screenshot_1.png'),
(6, 'student', 'Mohsin', 'Test2', 'Test3', 54551, 'dfgvdfg', 'Male', 'Islam', '5234', 20210006, '1970-01-01', 2, 1, 3, 1, 'stu_images/Screenshot_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double(10,2) NOT NULL,
  `pass_mark` double(10,2) NOT NULL,
  `get_mark` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `get_mark`) VALUES
(1, 1, 9, 100.00, 60.00, 100.00),
(2, 2, 10, 100.00, 60.00, 100.00),
(3, 1, 11, 100.00, 60.00, 100.00),
(4, 1, 12, 100.00, 60.00, 100.00),
(5, 1, 13, 100.00, 60.00, 100.00),
(6, 1, 14, 100.00, 60.00, 100.00),
(7, 1, 15, 100.00, 60.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, '1st Semester'),
(2, '2nd Semester'),
(3, '3rd Semester'),
(4, '4th Semester'),
(5, '5th Semester'),
(6, '6th Semester'),
(7, '7th Semester'),
(8, '8th Semester'),
(9, '9th Semester'),
(10, '10th Semester'),
(11, '11th Semester'),
(12, '12th Semester'),
(13, '13th Semester or furthermore');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`) VALUES
(1, 'Semester Final'),
(2, 'Masters Final ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`) VALUES
(1, '', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_point` varchar(255) NOT NULL,
  `start_marks` int(10) NOT NULL,
  `end_marks` int(10) NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`) VALUES
(1, 'A', '4', 93, 100, '4', '4', 'Excellent'),
(2, 'A-', '3.7', 90, 92, '3.7', '3.99', ''),
(3, 'B+', '3.3', 87, 89, '3.3', '3.6', ''),
(4, 'B', '3.0', 83, 86, '3.0', '3.5', ''),
(5, 'B-', '2.7', 80, 82, '2.7', '2.99', ''),
(6, 'C+', '2.3', 77, 79, '2.3', '2.6', ''),
(7, 'C', '2.0', 73, 76, '2.0', '2.2', ''),
(8, 'C-', '1.7', 70, 72, '1.7', '1.99', ''),
(9, 'D+', '1.3', 67, 69, '1.3', '1.6', ''),
(10, 'D', '1.0', 60, 66, '1.0', '1.2', ''),
(11, 'F', '0.0', 0, 59, '0.0', '0.0', '');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `name`) VALUES
(1, 'UNDRGRADUATE'),
(2, 'POSTGRADUATE'),
(3, 'DIPLOMA');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `marks` double(12,2) NOT NULL,
  `assign_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `group_id`, `year_id`, `class_id`, `exam_type_id`, `marks`, `assign_subject_id`) VALUES
(1, 0, '20200001', 3, 1, 1, 1, 80.00, 9),
(3, 0, '20200001', 3, 1, 1, 1, 90.00, 12),
(5, 0, '20200001', 3, 1, 1, 1, 78.00, 14);

-- --------------------------------------------------------

--
-- Table structure for table `stugroup`
--

CREATE TABLE `stugroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stugroup`
--

INSERT INTO `stugroup` (`id`, `name`) VALUES
(1, 'ETE'),
(2, 'EEE'),
(3, 'CSE'),
(4, 'BBA'),
(5, 'Economics'),
(6, 'English'),
(7, 'Biotech'),
(8, 'physics'),
(9, 'chemistry'),
(10, 'COE'),
(11, 'CTE');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `group_id`, `code`) VALUES
(9, 'Computer Graphics', 3, '223'),
(10, 'CSE', 3, '223'),
(11, 'Pulse', 3, '3254'),
(12, 'pulse lab', 3, '4145'),
(13, 'Computer Algorithm', 3, '226'),
(14, 'Computer Algorithm Lab', 3, '6565'),
(15, 'Physics', 3, '45254'),
(16, 'chemistry', 3, '5345'),
(17, 'English', 3, '223');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `name`) VALUES
(1, '2020'),
(2, '2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_student`
--
ALTER TABLE `add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stugroup`
--
ALTER TABLE `stugroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_student`
--
ALTER TABLE `add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stugroup`
--
ALTER TABLE `stugroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
