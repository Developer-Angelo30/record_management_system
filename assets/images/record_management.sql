-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 10:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `record_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `FacultyEmail` varchar(100) NOT NULL,
  `FacultyFullname` varchar(50) NOT NULL,
  `FacultyGender` varchar(6) NOT NULL,
  `FacultyCivilStatus` varchar(20) NOT NULL,
  `FacultyOccupational` varchar(100) NOT NULL,
  `FacultyReligion` text NOT NULL,
  `FacultyPhone` varchar(13) NOT NULL,
  `FacultyPassword` varchar(255) NOT NULL,
  `FacultyRole` int(1) NOT NULL COMMENT '1 - admin\r\n0 - faculty',
  `FacultyProfile` varchar(255) NOT NULL,
  `FacultyDeleted` int(1) NOT NULL COMMENT '1-Active\r\n0-unactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `FacultyEmail`, `FacultyFullname`, `FacultyGender`, `FacultyCivilStatus`, `FacultyOccupational`, `FacultyReligion`, `FacultyPhone`, `FacultyPassword`, `FacultyRole`, `FacultyProfile`, `FacultyDeleted`) VALUES
(1, 'admin@gmail.com', 'Demo Maangas', 'female', 'Single', 'Student', 'UPC', '+639991923622', 'f73bdaec4f1615d250e064a3749d8a21', 1, '', 1),
(2, 'bobo@gmail.com', 'Demo Maangas', 'female', 'Single', 'Student', 'UPC', '+639991923622', '06cb1497b9b47ee55e88346ab869ee43', 0, '', 1),
(3, 'demo1@gmail.com', 'Demo Maangas', 'female', 'Single', 'Student', 'UPC', '+639991923622', 'f73bdaec4f1615d250e064a3749d8a21', 0, '', 1),
(4, 'rovicfaundo1222@gmail.com', 'Bobo Si Roman ', 'male', 'Single', 'Hdbebdisne', 'Dhshsbbs', '+639092222811', '5be41e4b7ae5c37cd23836d490cb31f6', 0, '', 1),
(5, 'romanespanto28@gmail.com', 'roman espanto', 'male', 'Single', 'fef', 'trg', '+639074538666', 'b824fbf39b6e92c144e984c891f42a3c', 0, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FacultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
