-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 أكتوبر 2025 الساعة 15:47
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'igh'),
(2, 'kjhgg'),
(3, 'اخبار محلية'),
(4, 'hgfd'),
(5, 'nmb jv');

-- --------------------------------------------------------

--
-- بنية الجدول `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `image`, `status`, `category_id`, `user_id`) VALUES
(1, 'njkbjhvhgv', 'jnjhbhknm,jknhlbgjvgf', '1759769792_Screenshot_٢٠٢٤٠٨١٢_١٠١٥١٨_Gallery.jpg', 'deleted', 1, 4),
(2, 'الاقتصاد العالمي', 'mnbvcxzasertyujkljnjhvfxewasqe6yipkmjb123456', '1759771578_Screenshot_٢٠٢٤٠٨١٢_١٠١٥٥٣_Gallery.jpg', 'deleted', 1, 5),
(3, 'm nm bbvhg', 'njkbhgcfc', '', 'active', 1, 4),
(4, ',njbh', ';koinhvfgbhjnm', '', 'active', 1, 6),
(5, 'الحرب في غزة', 'العدوان الصهيوني على القطاع في غزة...........................................................................................................................زززززززززززززززززززززززززززز', '1759842532_سكرين.jpg', 'deleted', 3, 10),
(6, 'jhgf', 'm, nbgfdsxcvbnm,./hjkl;', '1759844077_سكرين.jpg', 'deleted', 1, 6);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, '123', 'halahigazi00@gmail.com', '$2y$10$ECxSvwWitCEKSOGPZGS71O60pMCS9PlICPgN.L7hwFBbyrEGApMLy'),
(4, 'hala', 'halahigazi@gmail.com', '$2y$10$qUUE0O4Fcr0XBlumnY.eK.HZTk/UNHBQsHWKZjGvN0AHxbAturXbK'),
(5, 'ahmed', 'ahmed@gmail.com', '$2y$10$ybgprU/vrs9sA43ziCpKb.u84lXfOHwu1UGNd9eL/GDrFgVA/yaEO'),
(6, 'hala', 'halahesham@gmail.com', '$2y$10$FaHBeA61M.AyFYxjqic0cO.vA2B8cE0bstH959gfMQ2DN9tF4Lq0S'),
(10, 'higazihala', 'hala@gmail.com', '$2y$10$h3iKZQLlOBzpThax.ICcaOd0Knl0aNjxf7Sj9ORyUuvYOi7lKSugO'),
(11, 'hgff', 'ahmedl@gmail.com', '$2y$10$QY5xDWcLK.l2Znx3VjO0X.NhgqQHq.orQ4eegwX4jDzznWXyWRLam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
