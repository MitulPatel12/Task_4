-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2023 at 03:55 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytable`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesstype`
--

CREATE TABLE `accesstype` (
  `access_id` int NOT NULL,
  `access_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accesstype`
--

INSERT INTO `accesstype` (`access_id`, `access_type`) VALUES
(1, 'admin'),
(2, 'Student'),
(3, 'Teacher'),
(4, 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int NOT NULL,
  `chapter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter_name`) VALUES
(19, 'gravity');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `roll_no` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `subject` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `year` int NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`roll_no`, `first_name`, `last_name`, `date_of_birth`, `subject`, `gender`, `year`, `image`) VALUES
(262, 'mitul', 'patel', '2001-12-02', 'g.k.', 'Male', 2023, 'tree-736885_1280.jpg'),
(263, 'rahuletyteyy', 'pateletyhteytr', '2001-12-02', 'science', 'Female', 2023, '952e6e6bc406bf8d8e39a97d4ba9532a.jpg'),
(264, 'mitul', 'patel', '2001-01-20', 'maths', 'Male', 2023, 'wallpaperflare.com_wallpaper.jpg'),
(265, 'Jane', 'Smith', '2001-01-20', 'science', 'Male', 2023, 'Screenshot from 2023-06-15 16-05-32.jpg'),
(266, 'Sarah', 'Thomas', '2001-01-20', 'social science', 'Female', 2023, 'Screenshot from 2023-06-12 14-58-51.jpeg'),
(267, 'Frank', 'Brown', '2001-01-20', 'G.K.', 'Male', 2023, NULL),
(268, 'Mike', 'Davis', '2001-01-20', 'gujarati', 'Male', 2023, 'Screenshot from 2023-06-12 14-58-51.jpeg'),
(269, 'Jennifer', 'Wilson', '2001-01-20', 'hindi', 'Male', 2023, NULL),
(270, 'Jessica', 'Garcia', '2001-01-20', 'sanskrit', 'Female', 2023, NULL),
(271, 'Fred', 'Clark', '2001-01-20', 'maths', 'Female', 2023, NULL),
(272, 'Bob', 'Lopez', '2001-01-20', 'science', 'Female', 2023, NULL),
(273, 'mitul', 'patel', '2001-12-02', 'g.k.', 'Male', 2023, NULL),
(274, 'rahul', 'patel', '2001-12-02', 'science', 'Female', 2023, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(3, 'patel', '12345'),
(5, 'ghgtrhhtrjj', 'rwfgewtygeyh'),
(6, 'rfgrg', '123456789'),
(9, 'thrthhrt', 'eyeyeu46'),
(12, 'eqfwrfwewr', 'wetfwrtfgwr'),
(13, 'dafwdffr', '$2y$10$iusesomecrazystrings2uHD0fi9DgGQ9zDNd3fp.s9xZPz1Fi/qC');

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`id`, `username`, `email`, `address`, `password`, `image`) VALUES
(29, 'patel', 'ergetgetg@gmail.com', 'edfwdfwfrwegewr', '123', NULL),
(30, 'mitul', 'fsfgvfgvfe@gmail.com', 'dfwfhnwerfi', '4545', NULL),
(32, 'ketu', 'fwfwrferwge@gmail.com', 'rthergyhgfyh', '12345', NULL),
(33, 'pathik', 'efrt5y@gmail.com', 'rthergyhgfyh', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `id` int NOT NULL,
  `std_name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`id`, `std_name`) VALUES
(15, 10),
(17, 11);

-- --------------------------------------------------------

--
-- Table structure for table `standard_subject`
--

CREATE TABLE `standard_subject` (
  `id` int NOT NULL,
  `std_id` int NOT NULL,
  `sub_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standard_subject`
--

INSERT INTO `standard_subject` (`id`, `std_id`, `sub_id`) VALUES
(1, 14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `student_standard`
--

CREATE TABLE `student_standard` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `std_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_standard`
--

INSERT INTO `student_standard` (`id`, `student_id`, `std_id`) VALUES
(1, 32, 15);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int NOT NULL,
  `sub_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`) VALUES
(14, 'Maths'),
(15, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `subject_chapter`
--

CREATE TABLE `subject_chapter` (
  `id` int NOT NULL,
  `sub_id` int NOT NULL,
  `chap_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_chapter`
--

INSERT INTO `subject_chapter` (`id`, `sub_id`, `chap_id`) VALUES
(1, 19, 14),
(2, 19, 15);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `access_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `user_id`, `access_type`) VALUES
(14, 29, 'admin'),
(15, 30, 'Teacher'),
(16, 31, 'Student'),
(17, 32, 'Student'),
(18, 33, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_subject`
--
ALTER TABLE `standard_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_standard`
--
ALTER TABLE `student_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_chapter`
--
ALTER TABLE `subject_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `roll_no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `standard_subject`
--
ALTER TABLE `standard_subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_standard`
--
ALTER TABLE `student_standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject_chapter`
--
ALTER TABLE `subject_chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
