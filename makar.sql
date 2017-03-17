-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 02:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
  `contribution` varchar(170) CHARACTER SET utf8 DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `post_id`, `contribution`, `author_id`, `cdate`) VALUES
(1, 1, 'In fact, most things werent considered a thing yet.', 1, '2017-03-13 14:23:51'),
(2, 1, 'This was because nobody was there to consider them as a thing.', 1, '2017-03-13 14:30:16'),
(3, 1, 'Which flags the question: Are we who we are because someone considers us as one?', 1, '2017-03-13 14:30:50'),
(4, 1, '*EXISTENTIAL CRISIS IN 3, 2, 1. . .', 1, '2017-03-13 14:31:51'),
(5, 1, 'People say that you are not what other people say about you. ', 1, '2017-03-13 14:33:25'),
(6, 1, 'If that''s the case then who defines you?', 1, '2017-03-13 14:34:00'),
(7, 1, 'Well, logic would tell you that it''s you!', 1, '2017-03-13 14:36:49'),
(8, 1, 'But then Once Upon a Time, there was no ''you''.', 1, '2017-03-13 14:37:11'),
(9, 1, 'Therefore, Once Upon a Time, you weren''t a thing.', 1, '2017-03-13 14:37:33'),
(10, 1, 'The End.\r\n\r\nGreat Story.\r\n\r\n10/10.\r\n\r\nWoohoo!', 1, '2017-03-13 14:38:02'),
(11, 1, 'Noice noice. 10/10', 2, '2017-03-15 23:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`user_id`, `post_id`) VALUES
(2, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `user_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`user_id`, `follower_id`) VALUES
(1, 2),
(2, 1),
(1, 1),
(2, 2),
(3, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `user_id` int(11) DEFAULT NULL,
  `notification` varchar(200) DEFAULT NULL,
  `nread` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`user_id`, `notification`, `nread`) VALUES
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone favourited your post: Once Upon a Time', '1'),
(1, 'Someone favourited your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone favourited your post: Once Upon a Time', '1'),
(1, 'Someone favourited your post: Once Upon a Time', '1'),
(1, 'Someone favourited your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1'),
(1, 'Someone contributed to your post: Once Upon a Time', '1');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `post` varchar(170) CHARACTER SET utf8 DEFAULT NULL,
  `no_contri` int(11) DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `pdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post`, `no_contri`, `author_id`, `pdate`) VALUES
(1, 'Once Upon a Time', 'Once upon a time, time wasnt a thing.', 11, 1, '2017-03-13 14:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `school` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `about` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `profile_pic` varchar(50) CHARACTER SET utf8 DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `address`, `school`, `dob`, `about`, `profile_pic`) VALUES
(1, 'Allena Denise', 'skysaur', 'allenazamoras@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'Adolf Hitler School for Friendship and Tolerance', '0000-00-00', 'Expert Procrastinator | Panics every 2 seconds | Has crippling depression', ''),
(2, 'Denise Zamoras', 'TheNiece', 'denisezamoras@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, ''),
(3, 'Marjorie Avenido', 'Pink_Punk123', 'marjoavenido@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD KEY `fk_fav` (`user_id`),
  ADD KEY `fk2_fav` (`post_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD KEY `fk_notify` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contributions_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `fk2_fav` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_fav` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `fk_notify` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

