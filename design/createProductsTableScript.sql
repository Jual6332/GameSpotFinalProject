--
-- Table structure for table `tblproduct`
--

CREATE TABLE `products` (
  `name` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ingesting electrpodata for table `products`
--

INSERT INTO `products` (`name`, `productType`, `sku`, `image`, `price`) VALUES
('FinePix Pro2 3D Camera', 'electronics','3DcAM01', 'product-images/camera.jpg', 1500.00),
('EXP Portable Hard Drive', 'electronics', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
('Luxury Ultra thin Wrist Watch', 'jewelry', 'wristWear03', 'product-images/watch.jpg', 300.00),
('XP 1155 Intel Core Laptop', 'electronics', 'LPN45', 'product-images/laptop.jpg', 800.00),
('Call of Duty MW2 Remastered', 'game', 'xters21', 'product-images/callofdutymw2remastered.jpg', 69.99),
('Call of Duty Black Ops 3', 'game', 'alog82m', 'product-images/callofdutyblackops3.jpg', 22.99),
('FIFA 23', 'game', 'yesl1o8', 'product-images/fifa23.jpg','32.99');
