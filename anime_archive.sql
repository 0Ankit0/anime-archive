-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 02:21 PM
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
(1, 'One Piece', 0, 'https://static.bunnycdn.ru/i/cache/images/5/58/5806a16f2892768b4930c39ebf6ce756.jpg', 'The Pirate King, Gol D. Roger, struck fear into the hearts of all who sailed the Grand Line with his unmatched strength and notorious reputation. However, his downfall at the hands of the World Government instigated a momentous shift in the world. Roger\'s final words divulged...', 'Toei Animation', 'Action', 5, 50, '2023-05-06 18:15:00', '2023-05-16 13:08:25'),
(2, 'MASHLE: MAGIC AND MUSCLES', 0, 'https://static.bunnycdn.ru/i/cache/images/a/a9/a9b1f759ee2b267d54b5e190210183a7.jpg', 'In a world where magic reigns supreme, Mash Burnedead suffers from the disadvantage of being young and without power. Perceived as a danger to the purity of the gene pool, he\'s forced to hide in the forest and dedicate himself to daily physical training. His goal: to develop...', 'A-1 Pictures', 'adventure', 4, 0, '2023-05-06 18:15:00', '2023-05-07 04:58:11'),
(3, 'Oshi No Ko', 0, 'https://static.bunnycdn.ru/i/cache/images/a/ac/ac328030476f399d5513a6d5f4dc325c.jpg', 'Ai Hoshino, a youthful and beautiful idol, is highly revered by her adoring fans as the epitome of innocence and purity. However, her pristine image is merely a facade.\r\nGorou Amemiya, a country-side gynecologist and passionate devotee of Ai, is astounded ...', 'Doga Kobo', 'Adventure', 4, 200, '2023-05-06 18:15:00', '2023-05-16 13:07:26');

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
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'user', '', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2023-05-13 07:59:13', '2023-05-14 01:10:39'),
(7, 'creator', '', 'creator@gmail.com', 'ee2433259b0fe399b40e81d2c98a38b6', 'creator', '2023-05-14 01:08:28', '2023-05-17 10:40:46'),
(10, 'admin', 'Screenshot_20211024-183436.png', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-05-24 12:01:35', '2023-05-24 12:01:35');

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
(8, 'ep1', 'ep1.mp4', 'One Piece', 'mp4', '2023-05-16 12:57:26', '2023-05-16 12:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime_info`
--
ALTER TABLE `anime_info`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `A_Id` (`U_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime_info`
--
ALTER TABLE `anime_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
