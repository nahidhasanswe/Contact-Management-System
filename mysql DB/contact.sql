-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 05:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactlist`
--

CREATE TABLE `contactlist` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Zipcode` varchar(8) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactlist`
--

INSERT INTO `contactlist` (`Id`, `Name`, `Address`, `City`, `District`, `Zipcode`, `Email`, `Phone`, `Image`) VALUES
(4, 'Nahid Hasan', 'Khidirpur, Majpara', 'Atgharia', 'Pabna', '6610', 'nahidh527@gmail.com', '01729440883', 'contactImage/Nahid.jpg'),
(5, 'Rowshonara Khatun', 'Dasgram, Chandai', 'Boraigram', 'Natore', '4530', 'mousumi@gmail.com', '01785354405', 'contactImage/Rojoni.jpg'),
(6, 'Raisul Ahmed', 'Shibgonj', 'Shibgonj', 'NobabGanj', '1253', 'raisul@gmail.com', '01752369800', 'contactImage/13769493_1055428411172002_6628223441927514957_n.jpg'),
(7, 'Shohidul Islam', 'Gokul Nagar, Khidirpur', 'Atgharia', 'Pabna', '6610', 'shohidul@gmail.com', '01745253698', 'contactImage/15727126_686169088209387_6376409111284953276_n.jpg'),
(8, 'Misrat Zahan', 'Par Gobindopur, Mahmudpur', 'PabnaSadar', 'Pabna', '6602', 'misrat@gmail.com', '01747869524', 'contactImage/10169317_1383272258652377_7095619999749306817_n.jpg'),
(9, 'Enamul Haque', 'Gokul Nagar, Khidirpur', 'Atgharia', 'Pabna', '6610', 'tutul@gmail.com', '01745313801', 'contactImage/Enamul.jpg'),
(10, 'Rubaiya Ruba', 'Gori Para, Atgram', 'Mymensing', 'Mymensing', '4213', 'ruba@yahoo.com', '01685326365', 'contactImage/Ruba.jpg'),
(11, 'Ashraf Rimon', '10/5 Pallabi', 'Mirpur', 'Dhaka', '1215', 'remon@gmail.com', '01683256321', 'contactImage/Rimon.jpg'),
(12, 'Avijit Noyon', '26/10 Sher Shah Shuri Road', 'Mohammadpur', 'Dhaka', '1207', 'avi@gmail.com', '01621523447', 'contactImage/Avi.jpg'),
(13, 'Repon Sarker', '26/20 Tajmahal Road', 'Mohammadpur', 'Dhaka', '1207', 'repon.swe@gmail.com', '01678456985', 'contactImage/Repon.jpg'),
(14, 'Akter Spondon', '26/10 Sher Shah Shuri Road', 'Mohammadpur', 'Dhaka', '1207', 'akter.oc@gmail.com', '01750598958', 'contactImage/Akter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('Admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactlist`
--
ALTER TABLE `contactlist`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactlist`
--
ALTER TABLE `contactlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
