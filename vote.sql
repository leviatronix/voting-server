-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2012 at 09:45 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `auser` varchar(26) NOT NULL,
  `apass` varchar(26) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `auser`, `apass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cname` varchar(26) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cid`, `pid`, `cname`) VALUES
(7, 1, 'memed'),
(6, 1, 'judah'),
(8, 1, 'asdf'),
(9, 3, 'noob'),
(10, 3, 'bruh'),
(11, 3, 'pl0x'),
(12, 1, 'sql');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(26) NOT NULL,
  `pgrade` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`pid`, `pname`, `pgrade`) VALUES
(1, 'Alum', 13),
(3, 'yyyyy', 99);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `slast` varchar(26) DEFAULT NULL,
  `sfirst` varchar(26) DEFAULT NULL,
  `snumber` int(11) NOT NULL,
  `sgrade` int(11) NOT NULL,
  `svoted` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `slast`, `sfirst`, `snumber`, `sgrade`, `svoted`) VALUES
(1, 'Wyllie', 'Caleb', 420, 13, 1),
(2, 'Hovey', 'Dustin', 69, 12, 0),
(3, 'Adamson', 'Jim', 96, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vid`, `sid`, `cid`) VALUES
(1, 3, 6),
(2, 3, 9),
(3, 1, 7),
(4, 1, 6),
(5, 1, 9),
(6, 1, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
