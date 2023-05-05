--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reviewType` varchar(255) NOT NULL,
  `rating` double(10,2) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
