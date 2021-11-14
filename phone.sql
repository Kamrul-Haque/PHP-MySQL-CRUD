-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 08:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name`, `fatherName`, `motherName`, `age`, `gender`, `email`, `password`) VALUES
(1, 'Md. Kamrul Haque', 'Md. Abdul Quyum', 'Mst. Kamrun Nahar', 24, 'Male', 'kamrul35-255@diu.edu.bd', 'abc12345'),
(2, 'Rayhan Hridoy', 'Karim', 'Saleha', 21, 'Male', 'rayhanhridoy@gmail.com', 'qwerty123'),
(3, 'Tahera Sultana', 'Faysal Ahmed', 'Raihana Chowdhury', 23, 'Female', 'tahera.tutul@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
