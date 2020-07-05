-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 11:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) NOT NULL,
  `med_history` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_history` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `contact`, `email`, `gender`, `age`, `med_history`, `symptoms`, `tra_history`, `address`) VALUES
(1, 'Kalp', 7865476574, 'kpanwala@gmail.com', 'male', 21, 'Heart disease, Lung disease', 'Breathlessness, Body Ache', 'Wuhan,China\r\nNew York', 'A-503\r\nBhabha Bhawan,SVNIT'),
(2, 'Raghav', 7865476574, 'raghav@gmail.com', 'male', 21, 'Diabetes, Heart disease', 'Fever, Body Ache', 'Wuhan,China', 'A-503\r\nBhabha Bhawan,SVNIT');

-- --------------------------------------------------------

--
-- Table structure for table `self_ass`
--

CREATE TABLE `self_ass` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `self_ass`
--

INSERT INTO `self_ass` (`id`, `date`, `status`) VALUES
(4, '2020-07-05', 'Safe'),
(5, '2020-06-26', 'Safe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `gender`, `email`, `password`) VALUES
(4, 'Ashish Bhatia', 'A804', 'Surat', 'male', 'ashish@gmail.com', 'bd50cf1839f726383bc657ebc80ba95c'),
(5, 'Raghav Laddha', 'A503', 'Surat', 'male', 'raghav@gmail.com', '37e84239b42ee02a53c6fb6a01fca2b3'),
(6, 'Kalp Panwala', 'A402', 'Surat', 'male', 'kalp@gmail.com', '0a282377cd8978940283d86f79d34151');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_ass`
--
ALTER TABLE `self_ass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
