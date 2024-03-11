-- Kimwellery | Web Application Programming Assignment 

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 04:54 PM
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
-- Database: `kimwellery`
--
CREATE DATABASE IF NOT EXISTS `kimwellery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kimwellery`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_qty`, `product_name`, `product_price`, `product_image`, `total_price`, `product_id`, `user_id`) VALUES
(113, 25, 'Celestial Shimmers Bracelet', '100', 'image/Bracelet_CelestialShimmers.png', 2500, 'b01', 2),
(114, 1, 'Cleopatra Rosegold Bracelet', '110', 'image/Bracelet_CleopatraRosegold.png', 110, 'b02', 1),
(115, 1, 'Couture Lock Bracelet', '120', 'image/Bracelet_CoutureLock.jpg', 120, 'b03', 1),
(116, 1, 'Diamond Delight Bracelet', '130', 'image/Bracelet_DiamondDelight.png', 130, 'b04', 1),
(117, 6, 'Celestial Shimmers Bracelet', '100', 'image/Bracelet_CelestialShimmers.png', 600, 'b01', 1),
(118, 1, 'Mirage Mesh Bracelet', '170', 'image/Bracelet_MirageMesh.jpg', 170, 'b08', 1),
(119, 1, 'Resplendent Rivulets Earring', '250', 'image/Earring_ResplendentRivulets.png', 250, 'e06', 1),
(120, 1, 'Oval Aura Earring', '240', 'image/Earring_OvalAura.jpg', 240, 'e05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_email` varchar(100) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_products` varchar(1000) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_name`, `order_email`, `order_phone`, `order_address`, `order_date`, `order_status`, `order_products`, `amount_paid`, `user_id`) VALUES
(1006, 'Wei Ean', 'teoh.weiean@gmail.com', '0177491678', '2A, Jalan Sungai Merbau 32/76B,, Amverton Park', '0000-00-00 00:00:00', 'Processing', 'Celestial Shimmers Bracelet    x1', '160', 2),
(1007, 'Wei Ean', 'teoh.weiean@gmail.com', '0177491678', '2A, Jalan Sungai Merbau 32/76B,, Amverton Park', '0000-00-00 00:00:00', 'Processing', 'Cleopatra Rosegold Bracelet    x1<br>Marigold Magic Earring    x1', '380', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_variation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_qty`, `product_price`, `product_image`, `product_category`, `product_variation`) VALUES
('b01', 'Celestial Shimmers Bracelet', 1000, '100', 'image/Bracelet_CelestialShimmers.png', 'bracelets', 'S'),
('b02', 'Cleopatra Rosegold Bracelet', 1000, '110', 'image/Bracelet_CleopatraRosegold.png', 'bracelets', 'S'),
('b03', 'Couture Lock Bracelet', 1000, '120', 'image/Bracelet_CoutureLock.jpg', 'bracelets', 'S'),
('b04', 'Diamond Delight Bracelet', 1000, '130', 'image/Bracelet_DiamondDelight.png', 'bracelets', 'M'),
('b05', 'Elite Embellish Bracelet', 1000, '140', 'image/Bracelet_EliteEmbellish.jpg', 'bracelets', 'M'),
('b06', 'Luminous Stars Bracelet', 1000, '150', 'image/Bracelet_LuminousStars.png', 'bracelets', 'M'),
('b07', 'Luxe Lustra Bracelet', 1000, '160', 'image/Bracelet_LuxeLustra.jpg', 'bracelets', 'L'),
('b08', 'Mirage Mesh Bracelet', 1000, '170', 'image/Bracelet_MirageMesh.jpg', 'bracelets', 'L'),
('b09', 'Noble Nouveau Bracelet', 1000, '180', 'image/Bracelet_NobleNouveau.jpg', 'bracelets', 'L'),
('b10', 'Starry Night Bracelet', 1000, '190', 'image/Bracelet_StarryNight.png', 'bracelets', 'XL'),
('e01', 'Golden Dust Earring', 1000, '200', 'image/Earring_GoldenDust.jpg', 'earrings', 'Gold'),
('e02', 'Marigold Magic Earring', 1000, '210', 'image/Earring_MarigoldMagic.jpg', 'earrings', 'Gold'),
('e03', 'Nova Wave Earring', 1000, '220', 'image/Earring_NovaWave.jpg', 'earrings', 'Silver'),
('e04', 'Opulent Orbs Earring', 1000, '230', 'image/Earring_OpulentOrbs.png', 'earrings', 'Pearl'),
('e05', 'Oval Aura Earring', 1000, '240', 'image/Earring_OvalAura.jpg', 'earrings', 'Silver'),
('e06', 'Resplendent Rivulets Earring', 1000, '250', 'image/Earring_ResplendentRivulets.png', 'earrings', 'Silver'),
('e07', 'Serenity Silver Earring', 1000, '260', 'image/Earring_SerenitySilver.png', 'earrings', 'Silver'),
('e08', 'Timeless Teardrops Earring', 1000, '270', 'image/Earing_TimelessTeardrops.png', 'earrings', 'Quartz'),
('e09', 'Twinkling Twists Earring', 1000, '280', 'image/Earring_TwinklingTwists.png', 'earrings', 'Silver'),
('e10', 'Urban Hues Earring', 1000, '290', 'image/Earring_UrbanHues.jpg', 'earrings', 'Silver'),
('n01', 'Alchemy Touch Necklace', 1000, '300', 'image/Necklace_AlchemyTouch.jpg', 'necklaces', 'Gold'),
('n02', 'Classic Pearl Necklace', 1000, '310', 'image/Necklace_ClassicPearl.jpg', 'necklaces', 'Silver'),
('n03', 'Crystal Cascade Necklace', 1000, '320', 'image/Necklace_CrystalCascade.png', 'necklaces', 'Rose'),
('n04', 'Enchanté Gold Necklace', 1000, '330', 'image/Necklace_EnchanteGold.png', 'necklaces', 'Rose'),
('n05', 'Glamour Pendant Necklace', 1000, '340', 'image/Necklace_GlamourPendant.png', 'necklaces', 'Silver'),
('n06', 'Ivory Pearl Necklace', 1000, '350', 'image/Necklace_IvoryPearl.png', 'necklaces', 'Rose'),
('n07', 'La Vie En Rose Necklace', 1000, '360', 'image/Necklace_LaVieEnRose.png', 'necklaces', 'Gold'),
('n08', 'Peacock Plume Necklace', 1000, '370', 'image/Necklace_PeacockPlume.jpg', 'necklaces', 'Silver'),
('n09', 'Sparkling Feathers Necklace', 1000, '380', 'image/Necklace_SparklingFeathers.jpg', 'necklaces', 'Silver'),
('n10', 'Tranquil Tide Necklace', 1000, '390', 'image/Necklace_TranquilTide.jpg', 'necklaces', 'Gold'),
('r01', 'Enigmatic Eclipses Ring', 1000, '400', 'image/Ring_EnigmaticEclipses.png', 'rings', 'S'),
('r02', 'Luxe Loops Ring', 1000, '410', 'image/Ring_LuxeLoops.png', 'rings', 'S'),
('r03', 'Midnight Jewel Ring', 1000, '420', 'image/Ring_MidnightJewel.jpg', 'rings', 'S'),
('r04', 'Moonlight Charms Ring', 1000, '430', 'image/RIng_MoonlightCharms.png', 'rings', 'M'),
('r05', 'Noir Elegance Ring', 1000, '440', 'image/Ring_NoirElegance.jpg', 'rings', 'M'),
('r06', 'Peony Petal Ring', 1000, '450', 'image/Ring_PeonyPetal.jpg', 'rings', 'M'),
('r07', 'Regal Resonance Ring', 1000, '460', 'image/Ring_RegalResonance.png', 'rings', 'L'),
('r08', 'Silver Fluid Ring', 1000, '470', 'image/Ring_SilverFluid.jpg', 'rings', 'L'),
('r09', 'Sterling Triad Ring', 1000, '480', 'image/Ring_SterlingTriad.jpg', 'rings', 'L'),
('r10', 'Vintage Tapestry Ring', 1000, '490', 'image/Ring_VintageTapestry.png', 'rings', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_loginhistory` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_role`, `user_address`, `user_phone`, `user_loginhistory`) VALUES
(1, 'hehe', 'he', 'he', 'hehe@email.com', '202cb962ac59075b964b07152d234b70', 'user', '01, Jalan Hehe, 12345 Taman Hehe', '0123456789', '2023-06-01 23:59:59'),
(2, 'hoho', 'ho', 'ho', 'hoho@email.com', '202cb962ac59075b964b07152d234b70', 'user', '01, Jalan Hoho, 12345 Taman Hoho', '0123456789', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
