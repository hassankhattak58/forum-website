-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 04:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(50) NOT NULL,
  `blog_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_description`) VALUES
(1, 'Python', 'PythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPython'),
(2, 'Python', 'PythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPython');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `cat_title`, `cat_desc`, `time_stamp`) VALUES
(1, 'PythonPythonPython', 'PythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPythonPython', '2022-12-14 12:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(5) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `problem_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `time_stamp`, `problem_id`) VALUES
(1, 'Hi It is me. How are you..', 1, '2022-12-14 12:30:50', 1),
(2, 'dfghjkyltiuykjhtsdgajkjyythytjyu', 1, '2022-12-14 12:31:04', 1),
(3, 'dfghjkyltiuykjhtsdgajkjyythytjyu', 1, '2022-12-14 12:31:08', 1),
(4, 'dfghjkyltiuykjhtsdgajkjyythytjyu', 1, '2022-12-14 12:31:48', 2),
(5, 'dfghjkyltiuykjhtsdgajkjyythytjyu', 2, '2023-02-12 15:34:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `time_stamp`) VALUES
(1, 'hassankhattak', '$2y$10$WuTGv9kMPeZfNyWICWpGF.5Bvd8Rl5QGzFJe2utrea8vX8bAHC3Uq', '2022-12-14 12:18:37'),
(2, 'hassankhattak1', '$2y$10$scmh/SFz4VBV0W2hsHWmgORzmtD5YHAwEDGqIPP3f9qUohT0TqqLS', '2023-02-12 15:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(50) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(5) NOT NULL,
  `thread_user_id` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'there is prblem accordig to this mami', 'cvdsvdfvbjrenvsdvnvidnrigvivnfdvingvvdveififdsnveriferivdgvrnvi', 1, 1, '2022-12-14 12:27:04'),
(2, 'there is prblem accordig to this mami', 'cvdsvdfvbjrenvsdvnvidnrigvivnfdvingvvdveififdsnveriferivdgvrnvi', 1, 1, '2022-12-14 12:31:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
