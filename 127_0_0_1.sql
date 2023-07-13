-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 06:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brief4`
--
CREATE DATABASE IF NOT EXISTS `brief4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `brief4`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`) VALUES
(1, 'Raghad', 'Raghad1', 'admin1@gmail.com'),
(2, 'Islam', 'Islam11', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `caaarts`
--

CREATE TABLE `caaarts` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `img_url` varchar(500) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `num` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`num`, `user_id`, `product_id`, `name`, `price`, `quantity`, `image`) VALUES
(1, 0, 3, 'Heavenly Meringue', 100, 1, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/heavenly-meringue-562797_1800x1800.webp?v='),
(2, 0, 4, 'Lily Grace', 40, 1, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/lily-grace-760242_1800x1800.webp?v=1678727'),
(3, 0, 5, 'Sunflowers', 25, 1, 'https://m.media-amazon.com/images/I/813k4UolXML.jpg'),
(4, 0, 4, 'Lily Grace', 40, 1, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/lily-grace-760242_1800x1800.webp?v=1678727'),
(5, 0, 16, 'Jasmine', 70, 5, 'https://scontent.famm7-1.fna.fbcdn.net/v/t1.6435-9/105897054_843391752735687_6533331821577213897_n.j'),
(6, 0, 12, 'Hydrangea', 80, 4, 'https://www.flower.boutique/wp-content/uploads/2021/07/preserved-long-lasting-blue-roses.webp'),
(7, 16, 7, 'Tulips', 30, 1, 'https://m.media-amazon.com/images/I/61cDmd7EUBL.jpg'),
(8, 16, 10, 'Daffodil', 40, 1, 'https://assets.eflorist.com/assets/products/PHR_/TSP05-1A.jpg'),
(9, 0, 15, 'Sunflower', 60, 1, 'https://i.pinimg.com/originals/29/46/37/2946371f35be0bc12c7b50b37408956b.jpg'),
(10, 0, 7, 'Tulips', 30, 1, 'https://m.media-amazon.com/images/I/61cDmd7EUBL.jpg'),
(11, 0, 11, 'Carnation', 30, 1, 'https://cdn.shopify.com/s/files/1/0558/6144/4642/products/FullSizeRender215.jpg?v=1656566439&width=1'),
(12, 0, 4, 'Lily Grace', 40, 1, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/lily-grace-760242_1800x1800.webp?v=1678727');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Red'),
(2, 'White'),
(3, 'Yellow'),
(4, 'Pink'),
(5, 'Blue'),
(6, 'Colorful');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_price` int(100) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(333) NOT NULL,
  `cart_qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `image`, `cart_qty`) VALUES
(3, 'Heavenly Meringue', 100.00, 4, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/heavenly-meringue-562797_1800x1800.webp?v=1678655903', 0),
(4, 'Lily Grace', 40.00, 2, 'https://cdn.shopify.com/s/files/1/0568/0565/4684/products/lily-grace-760242_1800x1800.webp?v=1678727237', 0),
(5, 'Sunflowers', 25.00, 3, 'https://m.media-amazon.com/images/I/813k4UolXML.jpg', 0),
(6, 'Roses', 20.00, 1, 'https://cdn11.bigcommerce.com/s-tf2vn6/images/stencil/1280w/products/381/2214/50_red_roses_bouquet__46729.1642687154.jpg?c=2', 0),
(7, 'Tulips', 30.00, 6, 'https://m.media-amazon.com/images/I/61cDmd7EUBL.jpg', 0),
(8, 'Poinsettia', 35.00, 1, 'https://image.floranext.com/shared/catalog/product/c/l/classicpoinsettia.jpg?h=700&w=700&r=255&g=255&b=255', 0),
(9, 'Daisy', 20.00, 2, 'https://cdn.shopify.com/s/files/1/2776/7900/products/50036817-e59c-4915-ad55-5aba34f958b7_1024x1024.jpg?v=1641335988', 0),
(10, 'Daffodil', 40.00, 3, 'https://assets.eflorist.com/assets/products/PHR_/TSP05-1A.jpg', 0),
(11, 'Carnation', 30.00, 4, 'https://cdn.shopify.com/s/files/1/0558/6144/4642/products/FullSizeRender215.jpg?v=1656566439&width=1946', 0),
(12, 'Hydrangea', 80.00, 5, 'https://www.flower.boutique/wp-content/uploads/2021/07/preserved-long-lasting-blue-roses.webp', 0),
(13, 'Zinnia', 50.00, 6, 'https://i.pinimg.com/originals/75/37/9f/75379f6460347b58ea8b97a9de27fa1a.jpg', 0),
(14, 'Rose', 45.00, 1, 'https://asset.bloomnation.com/c_pad,d_vendor:global:catalog:product:image.png,f_auto,fl_preserve_transparency,q_auto/v1677714522/vendor/3752/catalog/product/2/0/20230211060622_file_63e7d91e91094_63e7d927e784b.jpg', 0),
(15, 'Sunflower', 60.00, 3, 'https://i.pinimg.com/originals/29/46/37/2946371f35be0bc12c7b50b37408956b.jpg', 0),
(16, 'Jasmine', 70.00, 2, 'https://scontent.famm7-1.fna.fbcdn.net/v/t1.6435-9/105897054_843391752735687_6533331821577213897_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=973b4a&_nc_ohc=DGeVG4OLdfcAX94z26Z&_nc_ht=scontent.famm7-1.fna&oh=00_AfAJNI6Tx3pnS4qmOt0ri_3nFdJnz6yIptN7L-RquhhMVA&oe=6487D80F', 0),
(17, 'Poinsettia', 35.00, 1, 'https://image.floranext.com/shared/catalog/product/c/l/classicpoinsettia.jpg?h=700&w=700&r=255&g=255&b=255', 0),
(18, 'Daisy', 20.00, 2, 'https://cdn.shopify.com/s/files/1/2776/7900/products/50036817-e59c-4915-ad55-5aba34f958b7_1024x1024.jpg?v=1641335988', 0),
(19, 'Daffodil', 40.00, 3, 'https://assets.eflorist.com/assets/products/PHR_/TSP05-1A.jpg', 0),
(20, 'Carnation', 30.00, 4, 'https://cdn.shopify.com/s/files/1/0558/6144/4642/products/FullSizeRender215.jpg?v=1656566439&width=1946', 0),
(21, 'Hydrangea', 80.00, 5, 'https://www.flower.boutique/wp-content/uploads/2021/07/preserved-long-lasting-blue-roses.webp', 0),
(22, 'Zinnia', 50.00, 6, 'https://i.pinimg.com/originals/75/37/9f/75379f6460347b58ea8b97a9de27fa1a.jpg', 0),
(23, 'Rose', 45.00, 1, 'https://asset.bloomnation.com/c_pad,d_vendor:global:catalog:product:image.png,f_auto,fl_preserve_transparency,q_auto/v1677714522/vendor/3752/catalog/product/2/0/20230211060622_file_63e7d91e91094_63e7d927e784b.jpg', 0),
(24, 'Sunflower', 60.00, 3, 'https://i.pinimg.com/originals/29/46/37/2946371f35be0bc12c7b50b37408956b.jpg', 0),
(25, 'Jasmine', 70.00, 2, 'https://scontent.famm7-1.fna.fbcdn.net/v/t1.6435-9/105897054_843391752735687_6533331821577213897_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=973b4a&_nc_ohc=DGeVG4OLdfcAX94z26Z&_nc_ht=scontent.famm7-1.fna&oh=00_AfAJNI6Tx3pnS4qmOt0ri_3nFdJnz6yIptN7L-RquhhMVA&oe=6487D80F', 0),
(26, 'Lily Stargazer', 50.00, 4, 'https://cdn.shopify.com/s/files/1/0558/6144/4642/products/RegularStargazerBouquet.jpg?v=1645122531&width=1946', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(333) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `address`, `image`) VALUES
(1, 'Raghad', '3333333333', 'raghad@gmail.com', 777777777, 'Jordan', ''),
(2, 'Rrrrr', 'Raaaaa2@', 'rrrrr@ggggg.ccc', 777777777, 'Amman', NULL),
(3, 'Taqwa', '1234567890', 'taqwa5@gmail.com', 333, 'Salt', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
