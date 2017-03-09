-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 06:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `contribution_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `contribution` varchar(170) DEFAULT NULL,
  `author_name` varchar(50) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `post_id`, `contribution`, `author_name`, `cdate`) VALUES
(1, 1, 'Welcome to Night Vale.\r\nHello, listeners.\r\n\r\nTo start things off, I’ve been asked to read this brief notice:', 'skysaur', '2017-03-06 00:00:00'),
(2, 1, 'The City Council announces the opening of a new Dog Park at the corner of Earl and Somerset, near the Ralph’s.', 'TheNiece', '2017-03-07 00:00:00'),
(3, 2, 'But still, \'twas dark.', 'TheNiece', '2017-03-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `user_name` varchar(50) DEFAULT NULL,
  `follower_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`user_name`, `follower_name`) VALUES
('skysaur', 'TheNiece'),
('TheNiece', 'skysaur');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) DEFAULT NULL,
  `post` varchar(170) DEFAULT NULL,
  `no_contri` int(11) DEFAULT NULL,
  `no_fave` int(11) DEFAULT NULL,
  `author_name` varchar(50) DEFAULT NULL,
  `pdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post`, `no_contri`, `no_fave`, `author_name`, `pdate`) VALUES
(1, 'Welcome to Night Vale', 'A friendly desert community where the sun is hot, the moon is beautiful, and mysterious lights pass overhead while we all pretend to sleep. Welcome to Night Vale.', 2, NULL, 'TheNiece', '2017-03-05 00:24:37'),
(2, '\'Twas the night before Christmas', 'All was well and shining.', 1, NULL, 'TheNiece', '2017-03-05 01:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_followers` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_pic` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `no_followers`, `address`, `school`, `dob`, `profile_pic`) VALUES
(1, 'Allena Denise', 'skysaur', 'allenazamoras@yahoo.com', 'password', NULL, NULL, NULL, NULL, ''),
(2, 'Denise Zamoras', 'TheNiece', 'denisezamoras@yahoo.com', 'password', NULL, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
