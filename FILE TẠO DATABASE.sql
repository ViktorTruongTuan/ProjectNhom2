-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 02:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< HEAD
-- Database: `laravel`---
=======
-- Database: `laravelproject`
>>>>>>> 9625901b119ec5af857915a613b39774531567e4
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfor`
--

CREATE TABLE `userinfor` (
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Telephone` varchar(10) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Role` varchar(10) DEFAULT 'User',
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfor`
--

INSERT INTO `userinfor` (`Email`, `Name`, `Telephone`, `Address`, `Role`, `Password`) VALUES
('admin@gmail.com', 'Admin', NULL, NULL, 'Admin', 'admin'),
('user@gmail.com', 'Nguyen Van A', '0967123456', '123 đường 456 phường Bảy Tám quận 9 tp HCM', 'User', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinfor`
--
ALTER TABLE `userinfor`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
