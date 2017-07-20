-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 07:43 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mani`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `name` varchar(14) DEFAULT NULL,
  `loc` varchar(9) DEFAULT NULL,
  `roomno` varchar(7) DEFAULT NULL,
  `room_type` varchar(9) DEFAULT NULL,
  `service_type` varchar(12) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `guest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`name`, `loc`, `roomno`, `room_type`, `service_type`, `id`, `state`, `guest`) VALUES
('gateway hotel', 'chennai', '72a', 'nonac', 'exclusive', 2, 0, ''),
('ibis hotel', 'chennai', '72a', 'deluxe', 'normal', 3, 1, 'manideep127@gmail.com'),
('trident hotel', 'chennai', '72a', 'ac', 'exclusive', 4, 1, 'wsadmani1@gmail.com'),
('red fox hotel', 'hyderabad', '72a', 'deluxe', 'normal', 5, 0, ''),
('maharaja hotel', 'hyderabad', '72a', 'nonac', 'exclusive', 6, 1, 'saichandu4444@gmail.com'),
('novotel hotel', 'hyderabad', '72a', 'ac', 'exclusive', 7, 0, ''),
('oberoi', 'mumbai', '72a', 'deluxe', 'normal', 8, 0, ''),
('sofitel', 'mumbai', '72a', 'ac', 'normal', 9, 0, ''),
('kohinoor', 'mumbai', '72a', 'nonac', 'exclusive', 10, 0, ''),
('gateway hotel', 'chennai', '54b', 'ac', 'normal', 11, 0, ''),
('gateway hotel', 'chennai', '102a', 'nonac', 'exclusive', 12, 0, ''),
('gateway hotel', 'chennai', '930s', 'deluxe', 'normal', 13, 0, ''),
('ibis hotel', 'chennai', '54b', 'ac', 'exclusive', 14, 0, ''),
('ibis hotel', 'chennai', '102b', 'nonac', 'normal', 15, 0, ''),
('ibis hotel', 'chennai', '930s', 'ac', 'exclusive', 16, 1, 'mandy@gmail.com'),
('trident hotel', 'chennai', '54b', 'deluxe', 'exclusive', 17, 1, 'pkpbhardwaj729@gmail.com'),
('trident hotel', 'chennai', '102b', 'nonac', 'normal', 18, 0, ''),
('trident hotel', 'chennai', '930s', 'ac', 'exclusive', 19, 0, ''),
('red fox hotel', 'hyderabad', '54b', 'ac', 'exclusive', 20, 0, ''),
('red fox hotel', 'hyderabad', '102a', 'nonac', 'normal', 21, 1, 'tsaimani.deep2014@vit.ac.in'),
('red fox hotel', 'hyderabad', '930s', 'deluxe', 'exclusive', 22, 0, ''),
('maharaja hotel', 'hyderabad', '54b', 'ac', 'normal', 23, 0, ''),
('maharaja hotel', 'hyderabad', '102a', 'nonac', 'normal', 24, 1, 'saichandu4444@gmail.com'),
('maharaja hotel', 'hyderabad', '930s', 'deluxe', 'normal', 25, 0, ''),
('novotel hotel', 'hyderabad', '54b', 'ac', 'exclusive', 26, 0, ''),
('novotel hotel', 'hyderabad', '102b', 'nonac', 'normal', 27, 0, ''),
('novotel hotel', 'hyderabad', '930s', 'deluxe', 'normal', 28, 1, 'manideep127@gmail.com'),
('oberoi', 'mumbai', '54b', 'ac', 'exclusive', 29, 0, ''),
('oberoi', 'mumbai', '102b', 'nonac', 'normal', 30, 1, 'tsaimani.deep2014@vit.ac.in'),
('oberoi', 'mumbai', '930s', 'deluxe', 'exclusive', 31, 0, ''),
('sofitel', 'mumbai', '54b', 'ac', 'normal', 32, 0, ''),
('sofitel', 'mumbai', '102b', 'nonac', 'exclusive', 33, 0, ''),
('sofitel', 'mumbai', '930s', 'deluxe', 'exclusive', 34, 0, ''),
('kohinoor', 'mumbai', '54b', 'ac', 'normal', 35, 0, ''),
('kohinoor', 'mumbai', '102b', 'deluxe', 'exclusive', 36, 0, ''),
('kohinoor', 'mumbai', '930s', 'deluxe', 'exclusive', 37, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `phno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `hashed_password`, `phno`) VALUES
(1, 'Prashant', 'pkpbhardwaj729@gmail.com', '$2y$10$MTgwMzk1NWRhNmNhODViNe/0SF5gYmwXBU.FPu9lVQ82NiSnpHCQq', '9962416408'),
(2, 'mandy', 'mandy@gmail.com', '$2y$10$ZjQ5MzliYjNhOWM0ODE5OOujFYLOvK3IYn.W53iIqPADVV9rLPI0m', '9441556948'),
(3, 'mani', 'manideep127@gmail.com', '$2y$10$YzMzOWJlYjMxNDgzM2U2MODDRUF.Gipo5ubgi/s.L8sTvH.T5LZGO', '9441556948'),
(5, 'sai', 'wsadmani1@gmail.com', '$2y$10$OWQ3NmFlZDczMmI1MTc0N.rbfgiX3w26UOF7Jw47ptFJHyqyH7/7C', '1234567890'),
(6, 'chandu', 'saichandu4444@gmail.com', '$2y$10$YjQwMjQzZTA5MzA4M2VjZ.qnHhu/TiKhDCIbyr6krAGtaVMLlPwFS', '9898989898');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
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
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
