-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2022 at 09:33 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worktask`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_links`
--

CREATE TABLE `main_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `link_url_name` varchar(255) NOT NULL,
  `link_page_name` varchar(255) NOT NULL,
  `link_h1` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_descr` text NOT NULL,
  `site_map` tinyint(1) DEFAULT '0',
  `last_mods` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_links`
--

INSERT INTO `main_links` (`id`, `link_url_name`, `link_page_name`, `link_h1`, `meta_title`, `meta_descr`, `site_map`, `last_mods`) VALUES
(1, 'home', 'Home', 'Welcome!', 'Meta title of the home page | Your Domain', 'Meta description of the home page ', 1, '2022-01-15'),
(2, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Meta title of the privacy policy page | Your Domain', 'Meta description of the privacy policy page', 1, '2022-01-15'),
(3, 'site-map', 'Site Map', 'Site Map', 'Meta title of the site map page | Your Domain', 'Meta description of the privacy policy page', 1, '2022-01-15'),
(4, 'orders', 'Orders', 'Orders', 'Orders | Your Domain', 'Orders', 1, '2022-01-15'),
(5, 'buyer-protection', 'Buyer protection', 'Buyer Protection', 'Buyer Protection | Your Domain', 'Buyer Protection', 1, '2022-01-15'),
(6, 'delivery-options', 'Delivery options', 'Delivery Options', 'Delivery Options | Your Domain', 'Delivery Options', 1, '2022-01-15'),
(7, 'register', 'Register', 'Register', 'Register | Your Domain', 'Register your account and get full access to the site content', 1, '2022-01-15'),
(8, 'sign-in', 'Sign In', 'Sign In', 'Sign In | Your Domain', 'Sign in ', 1, '2022-01-15'),
(9, 'account', 'Account', 'Your account', 'Your Account on | Your Domain', 'Account', 0, '2022-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`) VALUES
(1, 7, '2.00'),
(2, 1, '45.25'),
(3, 1, '3.00'),
(4, 2, '0.00'),
(5, 1, '2.00'),
(6, 3, '0.00'),
(7, 4, '2.00'),
(8, 3, '0.00'),
(9, 3, '0.00'),
(10, 2, '0.00'),
(11, 7, '2.00'),
(12, 2, '0.00'),
(13, 1, '22.00'),
(14, 2, '0.00'),
(15, 4, '2.00'),
(16, 3, '0.00'),
(17, 1, '2.00'),
(18, 7, '15.99'),
(19, 8, '2.00'),
(20, 2, '0.00'),
(21, 1, '2.00'),
(22, 2, '0.00'),
(23, 4, '2.00'),
(24, 3, '0.00'),
(25, 3, '0.00'),
(26, 2, '0.00'),
(27, 5, '0.00'),
(28, 2, '0.00'),
(29, 1, '2.00'),
(30, 6, '45.00'),
(31, 4, '2.00'),
(32, 3, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `login` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `last_name`, `email`, `confirmed`, `password`, `ip`, `created_at`) VALUES
(1, 'Jimmy', 'Jimm', 'Somename', 'default@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(2, 'Mimmy', 'Mim', 'Somename', 'teshht@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(3, 'Bimmy', 'Bim', 'Somename', 'test@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(4, 'Limmy', 'Lim', 'Somename', 'one@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(5, 'Goommy', 'Goo', 'Somename', 'test@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(6, 'Dimmy', 'Dimm', 'Somename', 'one@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(7, 'Nimmy', 'Nimm', 'Somename', 'two@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15'),
(8, 'Oimmy', 'Omm', 'Somename', 'tesbbt@mail.com', 1, 'f6766af61a09264dc32a098a098d28e9c5b3e7e9', '127.0.0.1', '2022-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_links`
--
ALTER TABLE `main_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_links`
--
ALTER TABLE `main_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
