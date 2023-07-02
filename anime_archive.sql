-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 10:23 AM
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
-- Database: `anime_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime_info`
--

CREATE TABLE `anime_info` (
  `id` int(5) NOT NULL,
  `Anime_Name` varchar(100) NOT NULL,
  `No_Of_Episodes` int(5) NOT NULL,
  `Anime_Img` varchar(255) NOT NULL,
  `Anime_Description` text NOT NULL,
  `Studios` varchar(50) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Views` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anime_info`
--

INSERT INTO `anime_info` (`id`, `Anime_Name`, `No_Of_Episodes`, `Anime_Img`, `Anime_Description`, `Studios`, `Genre`, `Rating`, `Views`, `Created_At`, `Updated_At`) VALUES
(1, 'One Piece', 0, 'one_piece.jpg', 'The Pirate King, Gol D. Roger, struck fear into the hearts of all who sailed the Grand Line with his unmatched strength and notorious reputation. However, his downfall at the hands of the World Government instigated a momentous shift in the world. His final words divulged...', 'Toei Animation', 'action', 1, 31, '2023-05-06 18:15:00', '2023-06-18 15:21:09'),
(2, 'MASHLE- MAGIC AND MUSCLES', 0, 'Screenshot_20211201-173054.png', 'In a world where magic reigns supreme, Mash Burnedead suffers from the disadvantage of being young and without power. Perceived as a danger to the purity of the gene pool, he is forced to hide in the forest and dedicate himself to daily physical training. His goal: to develop...', 'A-1 Pictures', 'romance', 4, 32, '2023-05-06 18:15:00', '2023-06-14 07:47:24'),
(3, 'Oshi No Ko', 0, 'Screenshot_20211223-200824.png', 'Ai Hoshino, a youthful and beautiful idol, is highly revered by her adoring fans as the epitome of innocence and purity. However, her pristine image is merely a facade.\r\nGorou Amemiya, a country-side gynecologist and passionate devotee of Ai, is astounded ...', 'Doga Kobo', 'adventure', 3, 201, '2023-05-06 18:15:00', '2023-06-18 16:58:52'),
(4, 'Brawl stars', 0, 'Screenshot_20211024-183436.png', 'this is brawl stars', 'Ankit', 'action', 4, 0, '2023-05-25 11:04:56', '2023-06-14 07:47:24'),
(5, 'The legendary hero is dead', 0, 'the-hero-is-dead.jpg', 'Amidst a realm of enchantment and fearsome creatures, the valiant Sion sets forth to rescue humanity from the clutches of demons. However, his mission takes an unexpected turn when he tumbles into a hole cunningly crafted by a deceitful local named Touka, and meets his ...', 'lidenfilms', 'action,adventure,fantasy,romance,comedy,', 3, 0, '2023-05-26 00:38:42', '2023-06-30 01:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(5) NOT NULL,
  `U_Id` int(5) NOT NULL,
  `A_Id` int(5) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `Like` int(5) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `Comment`, `U_Id`, `Like`, `Created_At`, `Updated_At`) VALUES
(4, 'yohohoho', 13, 0, '2023-06-30 00:45:08', '2023-06-30 00:45:08'),
(6, 'hiiiiiiiiiii', 11, 0, '2023-06-30 01:01:44', '2023-06-30 01:01:44'),
(12, 'yiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 13, 0, '2023-06-30 01:25:45', '2023-06-30 01:25:45'),
(13, 'bbbbbb', 13, 0, '2023-06-30 01:27:45', '2023-06-30 01:27:45'),
(14, 'uuu', 13, 0, '2023-06-30 01:45:43', '2023-06-30 01:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `anime_id` int(5) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`anime_id`, `rating`) VALUES
(3, 3),
(3, 2),
(1, 3),
(1, 1),
(3, 4),
(3, 5),
(3, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Pic` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Role` text NOT NULL DEFAULT 'User',
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `User_Name`, `Pic`, `Email`, `Password`, `Role`, `Created_At`, `Updated_At`) VALUES
(10, 'admin', 'Screenshot_20211024-183436.png', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-05-24 12:01:35', '2023-05-24 12:01:35'),
(11, 'user', 'pic.png', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2023-05-25 01:50:37', '2023-05-25 01:53:03'),
(12, 'creator', 'Screenshot_20211223-200824.png', 'creator@gmail.com', 'ee2433259b0fe399b40e81d2c98a38b6', 'creator', '2023-05-25 02:45:26', '2023-05-25 02:45:26'),
(13, 'User2', 'one_piece.jpg', 'user2@gmail.com', '0d8d5cd06832b29560745fe4e1b941cf', 'user', '2023-06-18 10:26:24', '2023-06-30 01:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `Episode_Name` varchar(50) NOT NULL,
  `Ep_Video` varchar(255) NOT NULL,
  `A_Name` varchar(200) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `Episode_Name`, `Ep_Video`, `A_Name`, `ext`, `Created_At`, `Updated_At`) VALUES
(26, 'ep1', 'ep1.mp4', 'One Piece', 'mp4', '2023-06-05 10:58:29', '2023-06-05 10:58:29'),
(27, 'ep1', 'ep1.mp4', 'MASHLE- MAGIC AND MUSCLES', 'mp4', '2023-06-05 10:58:40', '2023-06-05 10:58:40'),
(28, 'ep1', 'ep1.mp4', 'Oshi No Ko', 'mp4', '2023-06-05 10:58:53', '2023-06-05 10:58:53'),
(29, 'ep1', 'ep1.mp4', 'Brawl stars', 'mp4', '2023-06-05 10:59:06', '2023-06-05 10:59:06'),
(30, 'ep1', 'ep1.mp4', 'The legendary hero is dead', 'mp4', '2023-06-05 10:59:20', '2023-06-05 10:59:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime_info`
--
ALTER TABLE `anime_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Anime_Name` (`Anime_Name`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `U_Id` (`U_Id`),
  ADD UNIQUE KEY `A_Id` (`A_Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `A_Name` (`A_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime_info`
--
ALTER TABLE `anime_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `anime_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`U_Id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `user` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`A_Name`) REFERENCES `anime_info` (`Anime_Name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
