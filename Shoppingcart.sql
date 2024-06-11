-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:30 PM
-- Server version: 10.11.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `order_number` int(11) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `phone`, `address`, `order_number`, `message`) VALUES
('sadgine kr', 'sadginekr@yahoo.com', '082188224220', 'Jl. Kampus', 83838, '38737373');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `street` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `card_type` varbinary(50) NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `exp_date` varchar(20) NOT NULL,
  `cvv` int(5) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_number`, `name`, `email`, `phone`, `street`, `city`, `zip_code`, `country`, `card_type`, `card_number`, `exp_date`, `cvv`, `item_id`, `tracking_number`) VALUES
(106010, 'hshs', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x76697361, '2222202', '01/2022', 2828, 3, '1'),
(624791, 'kibooooooo', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x616d6578, '38833883', '11/2024', 2332, 6, '22'),
(821457, 'Ghina Divani Nasywa', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x76697361, '292822', '11/2024', 2222, 4, ''),
(2452442, 'hshs', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x76697361, '2222', '11/2023', 2222, 2, ''),
(3336241, 'Ghina Divani Nasywa', 'ginadivani1101@gmail.com', '082188224220', 'Jl. Kampus', 'Manado', '95126', 'Indonesia', 0x76697361, '388338', '11/2022', 3444, 14, ''),
(4043419, 'k', 'vaknaturke@gufum.com', '082188224220', 'Jl. Kampus', 'Mnana', '2i2u822', 'Indonesia', 0x76697361, '929', '11/2024', 3333, 4, ''),
(6364038, 'Ghina Divani Nasywa', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x76697361, '38388383', '11/2024', 3883, 6, ''),
(6439805, 'sadgine kr', 'sadginekr@yahoo.com', '082188224220', 'Jl. Kampus', 'Manado', '95126', 'Indonesia', 0x76697361, '88383', '03/2023', 9393, 5, ''),
(7068263, 'dhdhd', 'djjdjd@gmail.com', '0821992929', 'ndndd', 'Mnana', '2i2u822', 'Indonesia', 0x76697361, '8', '11/2024', 2111, 3, ''),
(7856882, 'Ghina Divani Nasywa', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x76697361, '222222222', '01/2022', 2222, 3, ''),
(9036869, 'kibooooooo', 'ginadivani1101@gmail.com', '085775748399', 'j', 'Manado', '95126', 'Indonesia', 0x67706e, '2222', '02/2024', 2222, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `pieces`
--

CREATE TABLE `pieces` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `img` text NOT NULL,
  `estimated` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pieces`
--

INSERT INTO `pieces` (`id`, `name`, `description`, `price`, `img`, `estimated`) VALUES
(1, 'The Pink Bow Bag', 'A charming bag adorned with delicate pink and white lace, perfect for leisurely beach strolls or delightful picnic outings during summer vacations.', '240000', 'piece_665fec07bc292.jpg', '1-2 weeks'),
(2, 'Beanie With Bow', 'Adorable beanie adorned with a brown ribbon.', '80000', 'piece_665ff1068f895.jpg', '5 Days'),
(3, 'Drink Bottle Holder', 'Drink bottle holder with an extended strap. Stay hydrated by taking this bottle holder with you everywhere.', '60000', 'piece_665ff26a67b9c.jpg', '3 Days'),
(10, 'Key Chains Acc', 'Customizable animal key chains\r\n', '24000', 'piece_666060433970f.jpg', '2 Days'),
(11, 'Hair Bandana', 'Stylish bandana with a beautiful pattern, perfect for adding a touch of flair to your outdoor look.', '69000', 'piece_666060b50699e.jpg', '4 Days'),
(12, 'Fallout Walls Curtain', 'Add some flair to your living space with our home decor fallout curtain!', '160000', 'piece_666061060faff.jpg', '2 Weeks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
