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
(1, 1, 'Welcome to Night Vale.\r\nHello, listeners.\r\n\r\nTo start things off, I?ve been asked to read this brief notice:', 1, '2017-03-06 00:00:00'),
(2, 1, 'The City Council announces the opening of a new Dog Park at the corner of Earl and Somerset, near the Ralph?s.', 2, '2017-03-07 00:00:00'),
(3, 2, 'But still, ''twas dark.', 1, '2017-03-06 00:00:00'),
(4, 2, 'KRAMPUS came.', 1, '2017-03-09 15:38:05'),
(6, 2, 'CHILDREN cried.', 1, '2017-03-09 15:39:26'),
(8, 1, 'They would like to remind everyone that dogs are not allowed in the Dog Park. People are not allowed in the Dog Park.', 1, '2017-03-09 15:42:10'),
(9, 1, 'It is possible you will see Hooded Figures in the Dog Park.', 1, '2017-03-09 15:42:31'),
(10, 1, 'Do not approach them. Do not approach the Dog Park.', 1, '2017-03-09 15:44:34'),
(12, 1, 'The fence is electrified and highly dangerous.', 1, '2017-03-09 15:46:30'),
(13, 5, 'Welcome to Night Vale.', 1, '2017-03-09 16:22:32'),
(14, 6, 'Welcome to Night Vale.', 2, '2017-03-09 16:26:19'),
(15, 2, 'And then it was morning again.', 1, '2017-03-11 13:28:02'),
(16, 7, 'It is only the truth seeker who wonders, why is the glass there? Why is there water all over the floor?  Why is it covering every other surface of the house? ', 1, '2017-03-11 13:50:27'),
(17, 8, 'Readers, there is a Blinking Light up on the Mountain. It is red. Blinking Lights are always red.', 1, '2017-03-11 13:56:48');

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
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `post` varchar(170) CHARACTER SET utf8 DEFAULT NULL,
  `no_contri` int(11) DEFAULT '0',
  `no_fave` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `pdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post`, `no_contri`, `no_fave`, `author_id`, `pdate`) VALUES
(1, 'Welcome to Night Vale', 'A friendly desert community where the sun is hot, the moon is beautiful, and mysterious lights pass overhead while we all pretend to sleep. Welcome to Night Vale.', 6, NULL, 2, '2017-03-05 00:24:37'),
(2, '''Twas the night before Christmas', 'All was well and shining.', 4, NULL, 2, '2017-03-05 01:11:21'),
(5, 'Glow Cloud', 'The desert seems vast, even endless, and yet scientists tell us that somewhere, even now, there is snow.', 1, NULL, 1, '2017-03-09 16:18:08'),
(6, 'Station Management', 'The arctic is lit by the midnight sun. The surface of the moon is lit by the face of the earth. Our little town is lit, too, by lights just above that we cannot explain.', 1, NULL, 1, '2017-03-09 16:24:01'),
(7, 'The Traveler', 'The optimist says the glass is half full. The pessimist says the glass is half empty.', 1, NULL, 1, '2017-03-11 13:42:17'),
(8, 'A Blinking Light up on the Mountain', 'Our God is an awesome God. Much better than that ridiculous god that Desert Bluffs has. ', 1, NULL, 1, '2017-03-11 13:55:55');

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
  `no_followers` int(11) DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `school` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
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
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `follower_id` (`follower_id`);

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
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `contributions_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;