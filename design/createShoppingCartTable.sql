--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingcart`
--

