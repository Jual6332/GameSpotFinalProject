CREATE TABLE `users` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`firstName`, `lastName`, `userType`, `username`, `password`) VALUES ('1', 'John', 'Smith', 'Manager', 'test', 'test1');
INSERT INTO `users` (`firstName`, `lastName`, `userType`, `username`, `password`) VALUES ('2', 'Emily', 'Johnson', 'Customer', 'emi124', 'deedeekitty');
