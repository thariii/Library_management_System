-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 09:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblremovebookdetails`
--

CREATE TABLE `tblremovebookdetails` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `ISBNNumber` int(11) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `RemDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblremovebookdetails`
--

INSERT INTO `tblremovebookdetails` (`id`, `BookName`, `Category`, `ISBNNumber`, `Reason`, `RemDate`) VALUES
(1, 'PHP And MySql programming', 'Technology', 222333, 'Damaged', '2019-03-07'),
(2, 'Physical', 'Science', 1111, 'Damaged', '2019-03-06'),
(3, 'Biology', 'Science', 2222, 'Sillubus Expired', '2019-02-12'),
(4, 'Economics', 'Management', 15225, 'Cannot Use', '2019-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblremovebookdetails`
--
ALTER TABLE `tblremovebookdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblremovebookdetails`
--
ALTER TABLE `tblremovebookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
