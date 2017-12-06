-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2017 at 02:20 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anonforix_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `anonforix_forums`
--

CREATE TABLE `anonforix_forums` (
  `fid` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `threads` text NOT NULL,
  `allowed` text NOT NULL,
  `lastpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonforix_forums`
--

INSERT INTO `anonforix_forums` (`fid`, `desc`, `threads`, `allowed`, `lastpid`) VALUES
('News', 'All of the news you wanna know!', '1', 'admin', 0),
('2', 'Misc.', '1', 'admin', 1),
('Others', 'Other infos.', '5', 'admin,test', 85);

-- --------------------------------------------------------

--
-- Table structure for table `anonforix_posts`
--

CREATE TABLE `anonforix_posts` (
  `pid` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonforix_posts`
--

INSERT INTO `anonforix_posts` (`pid`, `data`) VALUES
('1', 'Test post'),
('255', 'Testing post!'),
('15', 'Testing post,');

-- --------------------------------------------------------

--
-- Table structure for table `anonforix_threads`
--

CREATE TABLE `anonforix_threads` (
  `thread` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `posts` text NOT NULL,
  `date` date NOT NULL,
  `op` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonforix_threads`
--

INSERT INTO `anonforix_threads` (`thread`, `title`, `posts`, `date`, `op`) VALUES
('1', 'Thread 1', '1,255,5,1943138359,825692673,1440591843,1064664913,1899706712,1162525084', '2015-05-05', 'admin'),
('5', 'Testing thread.', '268', '2017-12-05', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anonforix_users`
--

CREATE TABLE `anonforix_users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `utype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonforix_users`
--

INSERT INTO `anonforix_users` (`username`, `password`, `mail`, `pin`, `utype`) VALUES
('admin', 'admin', 'test@test.com', '123456', 5),
('user', 'user', '123@123.com', '1234', 1),
('qriuui', '', 'test@testing.com', '123', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
