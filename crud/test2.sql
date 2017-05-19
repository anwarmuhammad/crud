-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 03:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(13, 'Sokal', 'adminsokal@example.com', 'sokal', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'anwar', 'admin@example.com', ' OES/000/00', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'anwar', 'anu@gmail.com', 'anu', '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'anwar', 'anu@gmail.com', 'anu', '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'anwar', 'anu@gmail.com', 'anu', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_1` (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `login_id`, `city_name`, `website`) VALUES
(17, 'Muhammad', 'muhammad', 'admin@example.com', 13, 'Chittagong', 'www.anwar-muhammad.me'),
(18, 'anwar', 'muhammad', 'user@example.com', 13, 'Dhaka', 'www.anwar-muhammad.me'),
(20, 'a', 'aa', 'anu@gmail.com', 15, 'aa', 'aa'),
(21, 'aa', 'aa', 'anu@gmail.com', 15, 'aa', 'a'),
(22, 'aa', 'aa', 'anu@gmail.com', 15, 'aa', 'aa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
