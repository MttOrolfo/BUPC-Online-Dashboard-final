-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 01:28 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `upload` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `id_no` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `is_public` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `upload`, `subject`, `date`, `id_no`, `place`, `is_public`, `time`, `file_type`, `name`, `status`) VALUES
(3, '1644699840_1644577680_02012019-33.jpg', 'BUPC', '2022-12-31', 'Kabalikat', 'BUPC', '', '12:59', 'jpg', '1644577680_02012019-33', 'Picture'),
(4, '1644699840_1644581520_BU Quality Policy5x3_2.jpg', 'BUPC', '2022-12-31', 'Kabalikat', 'BUPC', '', '12:59', 'jpg', '1644581520_BU Quality Policy5x3_2', 'Picture'),
(5, '1645185480_BUPC_720P HD.mp4', 'BUPC', '2022-12-31', 'Kabalikat', 'BUPC', '', '12:59', 'mp4', 'BUPC_720P HD', 'Video'),
(6, '1645185960_Bicol University Polangui Campus_360P.mp4', 'BUPC', '2022-12-31', 'Kabalikat', 'BUPC', '', '12:59', 'mp4', 'Bicol University Polangui Campus_360P', 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '4' COMMENT '1+admin, 2+organization, 3+professors, 4+students',
  `id_no` varchar(11) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `id_no`, `position`) VALUES
(1, 'Main Admin', 'admin', 'admin', 1, '0', 'Admin'),
(31, 'org1', 'org1@gmail.com', 'org', 2, 'Kabalikat', 'Organization'),
(32, 'none', 'none@gmail.com', 'none', 2, 'Kabalikat', 'Organization'),
(33, 'Professor', 'prof@gmail.com', 'prof', 2, 'Professor', 'Professor'),
(34, 'Joyces', 'joyce@gmail.com', 'joyce1234', 2, '123456', 'Student'),
(35, 'org2', 'org1.1@gmail.com', 'org2', 2, 'Kabalikat', 'Organization'),
(36, 'Mathew', 'mathew@gmail.com', 'mathew', 2, '123456', 'Student'),
(37, 'dummy', 'dummy@gmail.com', 'dummy', 2, '123456', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
