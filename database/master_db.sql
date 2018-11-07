-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 02:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `contact`, `gender`, `country`, `address`, `image`, `password`, `dob`, `language`) VALUES
(1, 'Dinesh', 'paliwaldinesh116@gmail.com', '8769511173', 'Male', 'USA', 'Plot No 19-20 Ram Nagar, Shikargarh, Near Bahadur Singh Enclave', 'images/IMG_0006_26KB.jpg', '123456789', '1996-05-10', 'english,hindi,marwari'),
(3, 'Mukesh', 'mukesh@gmail.com', '9955028446', 'Male', 'China', 'Jaipur Rajasthan', 'images/IMG_0010.jpg', 'qwerty', '2018-10-19', 'marwari'),
(4, 'Sonika Khan', 'sonika@gmail.com', '8769511176', 'Female', 'Pakistan', 'Lahore Pakistan', 'images/images.jpg', 'sonika', '1996-03-07', 'english'),
(5, 'Pamela', 'pamela@gmail.com', '8765432190', 'Female', 'USA', 'Washington Dc', 'images/images (7).jpg', 'pamela', '2018-02-13', 'english'),
(6, 'John', 'john@gmail.com', '0987654321', 'Male', 'Japan', 'Chicago', 'images/images (1).jpg', 'john', '1943-06-16', 'english'),
(7, 'Mark Ruffalo', 'markruffalo@gmail.com', '5647839201', 'Male', 'China', 'Tokyo', 'images/images (2).jpg', 'markruffalo', '1977-06-22', 'english'),
(8, 'Tony', 'tony@gmail.com', '8675940365', 'Male', 'USA', 'Marazzo street', 'images/images (3).jpg', 'tony', '1932-06-29', 'english'),
(9, 'xyz', '', '', '', 'India', '', 'images/', '', '', ''),
(10, 'kjbkj', '', '', '', 'India', '', 'images/', '', '', ''),
(12, 'DAN', 'dan@gmail.com', '132454788y43421', 'Male', 'Japan', 'vvbnsdfdghfnbvfbdnfhmjhkl', 'images/images (6).jpg', '456', '2018-10-03', 'hindi'),
(14, 'Something', 'someeewkfh@gmail.com', '134589', 'Female', 'India', 'dsfchjlkjhjghcjkn,m gjciu', 'images/', '123456789', '', ''),
(15, 'Samya', 'samya@gmail.com', '123489', 'Female', 'Pakistan', 'pak napak ', 'images/typeandlogo-05.jpg', '1234567890', '2018-10-10', 'hindi'),
(16, 'test', 'test@gmail.cm', 'isfjsaidfjisajdif', 'Male', 'India', 'sadf', 'images/Ã‰tienne-de-Silhouette.jpg', '', '', 'english,hindi'),
(17, 'Sonam', 'sonam@gmail.com', '3124567894', 'Female', 'India', 'Juhu Mumbai', 'images/eatme.jpg-e1486090851368.jpeg', 'sonam', '1525-06-15', 'english'),
(18, 'Suhana Khan', 'suhana@gmail.com', '7685940365', 'Female', 'Pakistan', 'Lahore Pakistan Rawalpindi', 'images/geneius-awwwards-logos.jpg', 'suhana', '1937-06-15', 'hindi'),
(19, 'dfdfg', '', '', '', 'India', '', 'images/reading-fast.jpg', '', '', ''),
(20, 'Caged Parrot', 'caged@gmail.com', '7865434234', 'Male', 'India', 'Hyderabad', 'images/attachment_62272779-e1485985175780.png', 'parrot', '2018-10-11', 'english'),
(21, 'Dummy Name', 'dummy@gmail.com', '9844567867', 'Male', 'Nepal', 'dummy street dummy set', 'images/geneius-awwwards-logos.jpg', 'dummy', '2006-02-14', 'english');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
