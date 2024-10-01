-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Shoes'),
(2, 'Electronics'),
(3, 'Food & Drinks'),
(4, 'Sports Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `category_id`, `created_at`) VALUES
(1, 'Nike Air Max', 'Stylish and comfortable running shoes.', 129.99, 'https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/2f3fbb54-e59d-421b-985d-23ad04eb0342/nike-air-max.jpg', 1, '2024-09-30 22:30:45'),
(2, 'Adidas UltraBoost', 'Boost your running experience with these high-performance shoes.', 179.99, 'https://m.media-amazon.com/images/I/71hWbPO6gYL._AC_UY900_.jpg', 1, '2024-09-30 22:30:45'),
(3, 'Converse Chuck Taylor', 'Classic canvas sneakers with timeless appeal.', 59.99, 'https://images.footlocker.com/is/image/EBFL2/315559AA1?wid=764&hei=764&fmt=png-alpha', 1, '2024-09-30 22:30:45'),
(4, 'Apple iPhone 14', 'Experience the future with iPhone 14.', 999.99, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-14-og-202209?wid=1200&hei=630&fmt=jpeg&qlt=95&.v=1663703841566', 2, '2024-09-30 22:30:58'),
(5, 'Sony WH-1000XM4 Headphones', 'Noise-cancelling wireless headphones for superior sound quality.', 349.99, 'https://m.media-amazon.com/images/I/71o8Q5XJS5L._AC_UY500_.jpg', 2, '2024-09-30 22:30:58'),
(6, 'Samsung Galaxy Tab S7', 'A powerful tablet designed for work and play.', 649.99, 'https://img.global.news.samsung.com/global/wp-content/uploads/2024/03/Galaxy-A55-5G-and-A35-5G_main2.jpg', 2, '2024-09-30 22:30:58'),
(7, 'Coca-Cola Classic 12 Pack', 'Enjoy the refreshing taste of Coca-Cola.', 5.99, 'https://i0.wp.com/okobagels.com/wp-content/uploads/2021/02/Coke.jpg?fit=614%2C461&ssl=1', 3, '2024-09-30 22:31:03'),
(8, 'Doritos Nacho Cheese', 'Crunchy and cheesy chips for snack time.', 2.99, 'https://nosmarket.ca/wp-content/uploads/2022/06/05087040-7b18e3-1650x1650-1-600x600.jpg', 3, '2024-09-30 22:31:03'),
(9, 'Organic Apple Juice', '100% pure organic apple juice.', 3.99, 'https://assets.shop.loblaws.ca/products/20531313/b1/en/side/20531313_side_a01_@2.png', 3, '2024-09-30 22:31:03'),
(10, 'Wilson Evolution Basketball', 'The ultimate indoor basketball for high performance.', 69.99, 'https://m.media-amazon.com/images/I/91vdgs5FY4L.jpg', 4, '2024-09-30 22:31:08'),
(11, 'Adidas Soccer Ball', 'Durable and high-quality soccer ball for all skill levels.', 39.99, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/8957f62b1294400fb4feaf470100ebb7_9366/MLS_Competition_NFHS_Ball_White_HT9029_01_standard.jpg', 4, '2024-09-30 22:31:08'),
(12, 'Yonex Badminton Racket', 'Lightweight racket for superior control.', 89.99, 'https://sport.qc.ca/wp-content/uploads/2024/02/BAD-ASTROX-V2.webp', 4, '2024-09-30 22:31:08'),
(13, 'Nike Air Max', 'Stylish and comfortable running shoes.', 129.99, 'https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/2f3fbb54-e59d-421b-985d-23ad04eb0342/nike-air-max.jpg', 1, '2024-09-30 22:30:45'),
(14, 'Adidas UltraBoost', 'Boost your running experience with these high-performance shoes.', 179.99, 'https://m.media-amazon.com/images/I/71hWbPO6gYL._AC_UY900_.jpg', 1, '2024-09-30 22:30:45'),
(15, 'Converse Chuck Taylor', 'Classic canvas sneakers with timeless appeal.', 59.99, 'https://images.footlocker.com/is/image/EBFL2/315559AA1?wid=764&hei=764&fmt=png-alpha', 1, '2024-09-30 22:30:45'),
(16, 'Apple iPhone 14', 'Experience the future with iPhone 14.', 999.99, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-14-og-202209?wid=1200&hei=630&fmt=jpeg&qlt=95&.v=1663703841566', 2, '2024-09-30 22:30:58'),
(17, 'Sony WH-1000XM4 Headphones', 'Noise-cancelling wireless headphones for superior sound quality.', 349.99, 'https://m.media-amazon.com/images/I/71o8Q5XJS5L._AC_UY500_.jpg', 2, '2024-09-30 22:30:58'),
(18, 'Samsung Galaxy Tab S7', 'A powerful tablet designed for work and play.', 649.99, 'https://img.global.news.samsung.com/global/wp-content/uploads/2024/03/Galaxy-A55-5G-and-A35-5G_main2.jpg', 2, '2024-09-30 22:30:58'),
(19, 'Coca-Cola Classic 12 Pack', 'Enjoy the refreshing taste of Coca-Cola.', 5.99, 'https://i0.wp.com/okobagels.com/wp-content/uploads/2021/02/Coke.jpg?fit=614%2C461&ssl=1', 3, '2024-09-30 22:31:03'),
(20, 'Doritos Nacho Cheese', 'Crunchy and cheesy chips for snack time.', 2.99, 'https://nosmarket.ca/wp-content/uploads/2022/06/05087040-7b18e3-1650x1650-1-600x600.jpg', 3, '2024-09-30 22:31:03'),
(21, 'Organic Apple Juice', '100% pure organic apple juice.', 3.99, 'https://assets.shop.loblaws.ca/products/20531313/b1/en/side/20531313_side_a01_@2.png', 3, '2024-09-30 22:31:03'),
(22, 'Wilson Evolution Basketball', 'The ultimate indoor basketball for high performance.', 69.99, 'https://m.media-amazon.com/images/I/91vdgs5FY4L.jpg', 4, '2024-09-30 22:31:08'),
(23, 'Adidas Soccer Ball', 'Durable and high-quality soccer ball for all skill levels.', 39.99, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/8957f62b1294400fb4feaf470100ebb7_9366/MLS_Competition_NFHS_Ball_White_HT9029_01_standard.jpg', 4, '2024-09-30 22:31:08'),
(24, 'Yonex Badminton Racket', 'Lightweight racket for superior control.', 89.99, 'https://sport.qc.ca/wp-content/uploads/2024/02/BAD-ASTROX-V2.webp', 4, '2024-09-30 22:31:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
