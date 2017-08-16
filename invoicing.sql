-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 10:05 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invoicing`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE IF NOT EXISTS `company_master` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `owner_id` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_state` varchar(250) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `cin` varchar(250) NOT NULL,
  `gistin` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_owner_details`
--

CREATE TABLE IF NOT EXISTS `company_owner_details` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_count`
--

CREATE TABLE IF NOT EXISTS `invoice_count` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `count` int(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoice_count`
--

INSERT INTO `invoice_count` (`id`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-08-17 00:06:02', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
