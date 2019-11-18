-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 05:33 AM
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
-- Database: `danhmuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dshuyen`
--

CREATE TABLE `dshuyen` (
  `huyenid` int(11) NOT NULL,
  `tenhuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinhid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dshuyen`
--

INSERT INTO `dshuyen` (`huyenid`, `tenhuyen`, `tinhid`) VALUES
(1, 'Vụ Bản', 18),
(2, 'Mỹ Lộc', 18),
(3, 'Ý Yên', 18),
(4, 'Nam Trực', 18),
(6, 'Vũ Thư', 17),
(8, 'Tiền Hải', 17),
(13, 'Hải Hậu', 18),
(14, 'Giao Thủy', 18),
(16, 'Thủy Nguyên', 15),
(18, 'Kiến An', 15),
(22, 'Đồ Sơn', 15),
(23, 'Duy Tiên', 89),
(24, 'Thanh Liêm', 89),
(25, 'Thanh Miện', 21),
(26, 'Thanh Thủy', 19);

-- --------------------------------------------------------

--
-- Table structure for table `dstinh`
--

CREATE TABLE `dstinh` (
  `tinhid` int(4) NOT NULL,
  `tentinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dstinh`
--

INSERT INTO `dstinh` (`tinhid`, `tentinh`) VALUES
(15, 'Hải Phòng'),
(17, 'Thái Bình'),
(18, 'Nam Định'),
(19, 'Phú Thọ'),
(21, 'Hải Dương'),
(27, 'Ninh Bình'),
(89, 'Hà Nam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dshuyen`
--
ALTER TABLE `dshuyen`
  ADD PRIMARY KEY (`huyenid`),
  ADD KEY `tinhid` (`tinhid`);

--
-- Indexes for table `dstinh`
--
ALTER TABLE `dstinh`
  ADD PRIMARY KEY (`tinhid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dshuyen`
--
ALTER TABLE `dshuyen`
  MODIFY `huyenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dstinh`
--
ALTER TABLE `dstinh`
  MODIFY `tinhid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dshuyen`
--
ALTER TABLE `dshuyen`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`tinhid`) REFERENCES `dstinh` (`tinhid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
