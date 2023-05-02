--
-- Table structure for table `tblproduct`
--

CREATE TABLE `products` (
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ingesting data for table `products`
--

INSERT INTO `products` (`name`, `sku`, `image`, `price`) VALUES
('FinePix Pro2 3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
('EXP Portable Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
('Luxury Ultra thin Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00),
('XP 1155 Intel Core Laptop', 'LPN45', 'product-images/laptop.jpg', 800.00);

--
-- Ingesting data for table `products`
--

INSERT INTO `products` (`name`, `sku`, `image`, `price`) VALUES
('Call of Duty MW2 Remastered', 'xters21', 'product-images/callofdutymw2remastered.jpg', 69.99),
('Call of Duty Black Ops 3', 'alog82m', 'product-images/callofdutyblackops3.jpg', 22.99);
