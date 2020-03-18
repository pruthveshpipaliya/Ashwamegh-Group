-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 07:53 PM
-- Server version: 5.7.14
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashwamegh`
--

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `catalouge_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `image_path` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdata`
--

INSERT INTO `productdata` (`id`, `catalouge_name`, `image_path`) VALUES
(52, 'Cotton Dress', 'images/uploads/dressmaterial (4).jpg'),
(51, 'Cotton Dress', 'images/uploads/dressmaterial (3).jpg'),
(50, 'Cotton Dress', 'images/uploads/dressmaterial (2).jpg'),
(48, 'Apple Embroidery', 'images/uploads/appleembroidery (1).jpg'),
(49, 'Cotton Dress', 'images/uploads/dressmaterial (1).jpg'),
(47, 'Apple Embroidery', 'images/uploads/appleembroidery (12).jpg'),
(43, 'Apple Embroidery', 'images/uploads/appleembroidery (8).jpg'),
(41, 'Apple Embroidery', 'images/uploads/appleembroidery (6).jpg'),
(46, 'Apple Embroidery', 'images/uploads/appleembroidery (11).jpg'),
(45, 'Apple Embroidery', 'images/uploads/appleembroidery (10).jpg'),
(44, 'Apple Embroidery', 'images/uploads/appleembroidery (9).jpg'),
(42, 'Apple Embroidery', 'images/uploads/appleembroidery (7).jpg'),
(40, 'Apple Embroidery', 'images/uploads/appleembroidery (5).jpg'),
(39, 'Apple Embroidery', 'images/uploads/appleembroidery (4).jpg'),
(38, 'Apple Embroidery', 'images/uploads/appleembroidery (3).jpg'),
(36, 'Apple Embroidery', 'images/uploads/appleembroidery (2).jpg'),
(37, 'Apple Embroidery', 'images/uploads/appleembroidery (1).jpg'),
(53, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (1).jpg'),
(54, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (2).jpg'),
(55, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (3).jpg'),
(56, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (4).jpg'),
(57, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (5).jpg'),
(58, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (6).jpg'),
(59, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (7).jpg'),
(60, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (8).jpg'),
(61, 'Kohinoor Bandhej', 'images/uploads/kohinoorbandhej (9).jpg'),
(63, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (1).jpg'),
(68, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (2).jpg'),
(69, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (3).jpg'),
(70, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (4).jpg'),
(71, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (5).jpg'),
(72, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (6).jpg'),
(73, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (7).jpg'),
(74, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (8).jpg'),
(75, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (9).jpg'),
(76, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (10).jpg'),
(77, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (11).jpg'),
(78, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (12).jpg'),
(79, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (13).jpg'),
(80, 'Shrishti Pooja Special', 'images/uploads/shrishtipoojaspecial (14).jpg'),
(81, 'Shubh Mangal', 'images/uploads/shubhmangal (1).jpg'),
(82, 'Shubh Mangal', 'images/uploads/shubhmangal (2).jpg'),
(83, 'Shubh Mangal', 'images/uploads/shubhmangal (3).jpg'),
(84, 'Shubh Mangal', 'images/uploads/shubhmangal (4).jpg'),
(85, 'Shubh Mangal', 'images/uploads/shubhmangal (5).jpg'),
(86, 'Shubh Mangal', 'images/uploads/shubhmangal (6).jpg'),
(87, 'Shubh Mangal', 'images/uploads/shubhmangal (7).jpg'),
(88, 'Shubh Mangal', 'images/uploads/shubhmangal (8).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
