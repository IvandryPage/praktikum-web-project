-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 02:25 PM
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
-- Database: `terahub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `total_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image_url`, `total_stock`) VALUES
(4, 'Ring of the Crimson Sun', 'Cincin emas dengan batu merah menyala yang menyimpan kekuatan api kuno.', '27.png', 10),
(5, 'Amethyst Band', 'Cincin ungu yang meningkatkan kekuatan sihir pemiliknya.', '39.png', 15),
(6, 'Ring of Arcane Might', 'Cincin yang memberi tambahan energi sihir.', '26.png', 7),
(7, 'Phantom Wings', 'Sayap transparan untuk melayang tanpa suara.', '4.png', 5),
(8, 'Wings of the Fallen', 'Sayap robek dari malaikat jatuh.', '11.png', 6),
(9, 'Skull of the Fallen King', 'Tengkorak dengan rune kuno.', '1.png', 5),
(10, 'Cursed Skull', 'Tengkorak terkutuk.', '2.png', 6),
(11, 'Greaves of Thunder', 'Menggetarkan tanah saat melangkah.', '18.png', 5),
(12, 'Tail of the Shadow Beast', 'Ekor siluman bayangan.', '20.png', 2),
(13, 'Draconic Tail', 'Ekor naga kuno.', '21.png', 4),
(14, 'Golden Dragon Coin', 'Koin emas naga.', '23.png', 20),
(15, 'Bronze War Coin', 'Koin dari medan perang.', '43.png', 12),
(16, 'Claw of the Abyss', 'Cakar dari kedalaman kegelapan.', '17.png', 4),
(17, 'Shadowfang Crown', 'Mahkota kegelapan.', '31.png', 3),
(18, 'Crown of Light', 'Mahkota cahaya suci.', '32.png', 4),
(19, 'Emerald Crown', 'Mahkota zamrud kerajaan.', '30.png', 2),
(20, 'Crown of Madness', 'Mahkota kegilaan.', '37.png', 1),
(21, 'Necklace of the Moonlight', 'Kalung sinar bulan.', '34.png', 6),
(22, 'Emerald Talisman', 'Melindungi dari serangan.', '35.png', 4),
(23, 'Chalice of Eternity', 'Piala penyembuhan abadi.', '42.png', 3),
(24, 'Crystal Cup of Dreams', 'Menunjukkan mimpi masa depan.', '41.png', 5),
(25, 'Treasure Chest of Greed', 'Peti yang tak pernah cukup.', '46.png', 6),
(26, 'Mimic Box', 'Peti yang hidup.', '47.png', 2),
(27, 'Ancient Relic Chest', 'Berisi artefak kuno.', '48.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `balance`) VALUES
(1, 'alice', 'password123', 'user', 100),
(2, 'bob', 'secret456', 'user', 1000),
(3, 'admin', 'adminpass', 'admin', 1000),
(4, 'ivan', 'human', 'user', 2150),
(5, 'ivan', 'human', 'user', 1000),
(6, 'Rahmat', '111', 'user', 750),
(7, 'rafid', '111', 'user', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user_items`
--

CREATE TABLE `user_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_for_sale` tinyint(1) NOT NULL,
  `sale_quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_items`
--

INSERT INTO `user_items` (`id`, `user_id`, `item_id`, `quantity`, `is_for_sale`, `sale_quantity`, `price`) VALUES
(63, 1, 4, 4, 1, 3, 1800),
(64, 4, 5, 3, 0, 0, NULL),
(65, 2, 6, 1, 1, 1, 1400),
(66, 3, 7, 2, 0, 0, NULL),
(67, 5, 8, 4, 1, 2, 2100),
(68, 1, 9, 3, 1, 1, 2700),
(69, 4, 10, 1, 0, 0, NULL),
(70, 2, 11, 2, 1, 2, 1900),
(71, 1, 12, 5, 0, 0, NULL),
(72, 3, 13, 3, 1, 2, 1600),
(73, 5, 14, 2, 1, 1, 2400),
(74, 4, 15, 1, 0, 0, NULL),
(75, 2, 16, 4, 1, 4, 2000),
(76, 3, 17, 1, 0, 0, NULL),
(77, 1, 18, 2, 1, 1, 3000),
(78, 5, 19, 5, 1, 3, 1900),
(79, 4, 20, 3, 0, 0, NULL),
(80, 2, 21, 1, 1, 1, 1350),
(81, 3, 22, 2, 0, 0, NULL),
(82, 1, 23, 3, 1, 2, 2750),
(83, 4, 24, 4, 1, 3, 1200),
(84, 5, 25, 2, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buyer` (`buyer_id`),
  ADD KEY `fk_seller` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item` (`item_id`),
  ADD KEY `fk_owner` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_items`
--
ALTER TABLE `user_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_buyer` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_items`
--
ALTER TABLE `user_items`
  ADD CONSTRAINT `fk_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
