-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2024_spelsida`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `price` decimal(5,0) NOT NULL,
  `game_description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `price`, `game_description`, `img`, `link`) VALUES
(1, 'STAR WARS Jedi: Survivor™', 70, 'The story of Cal Kestis continues in STAR WARS Jedi: Survivor™, a galaxy-spanning, third-person, action-adventure game.\r\n', 'assets/images/starwars.jpg', 'https://store.steampowered.com/app/1774580/STAR_WARS_Jedi_Survivor/'),
(2, 'STAR WARS Jedi: Survivor™', 69, 'The story of Cal Kestis continues in STAR WARS Jedi: Survivor™, a galaxy-spanning, third-person, action-adventure game.\r\n', 'assets/images/starwars.jpg', 'https://store.steampowered.com/app/1774580/STAR_WARS_Jedi_Survivor/'),
(3, 'STAR WARS Jedi: Survivor™', 69, 'The story of Cal Kestis continues in STAR WARS Jedi: Survivor™, a galaxy-spanning, third-person, action-adventure game.\r\n', 'assets/images/starwars.jpg', 'https://store.steampowered.com/app/1774580/STAR_WARS_Jedi_Survivor/'),
(4, 'STAR WARS Jedi: Survivor™', 69, 'The story of Cal Kestis continues in STAR WARS Jedi: Survivor™, a galaxy-spanning, third-person, action-adventure game.\r\n', 'assets/images/starwars.jpg', 'https://store.steampowered.com/app/1774580/STAR_WARS_Jedi_Survivor/');

-- --------------------------------------------------------

--
-- Table structure for table `table_roles`
--

CREATE TABLE `table_roles` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_roles`
--

INSERT INTO `table_roles` (`r_id`, `r_name`, `r_level`) VALUES
(1, 'User', 10),
(2, 'Moderator', 100),
(3, 'Admin', 500),
(4, 'Guest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_users`
--

CREATE TABLE `table_users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(512) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_role_fk` int(11) NOT NULL,
  `u_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_users`
--

INSERT INTO `table_users` (`u_id`, `u_name`, `u_password`, `u_email`, `u_role_fk`, `u_status`) VALUES
(1, 'asd', '', 'asd', 0, 0),
(2, 'Meow', '$2y$10$0YB7zXOlb1bB/PLtiay07e7xOGtlCCviup54Swa9G0q.lsNYY.rH6', 'asdfghjkl@gmail.com', 1, 1),
(3, 'qwertyuiopå', '$2y$10$UNOPmVhg4D4RxTM8tpA1e.mqEgTMPBRiKDf7cl7phummb9V6qoHRC', 'sdfxcvgbh@gmail.com', 1, 1),
(4, 'abc', '$2y$10$x7jIkPnWZDRL3WEZfQB4MeV2VnzsoKUiw2YhtqfMH3SL.DFq/dtlu', 'abc@gmail.com', 4, 1),
(5, 'a', '$2y$10$eRIIneIaruU2wqCAenGD7eZBcnlCbEMNubphpnHKtBRvlduBJAkdq', 'a@p.c', 1, 1),
(7, 'abcd', '$2y$10$yLirL0AoqtD7u0R9PrtW/.SP8qn25e8lR7KIpCg/5s5dOi39XL/tG', 'abc@gmail.com', 4, 1),
(8, 'Jag', '$2y$10$kXLg1CAOZGrlUqrOB5acTu6Adsd8Dp.V.oJe4/Aste2Ui80kiqE4K', 'Jag@gmail.com', 3, 1),
(9, 'bam', '$2y$10$EBPi2.zXQ/ZOxWsHPeRTW.xoWrsWx4L1Yq9uplH0vZH2hwWW6Upg2', 'bam@bam.com', 1, 1),
(10, 'asdfghjklöä', '$2y$10$Zu9DT9SMptmgH.5HtVDk/Ou4NxgyGhTHYbaoF2bNH6.knWGTGj70a', 'asd@gmail.com', 1, 1),
(11, 'qwe', '$2y$10$r/Lnf.KlTXtsb/KAKffJk.MWmgVt9EaTpYJraD9.5MIU90i81zjHu', 'qwe@gmail.com', 1, 1),
(13, 'dan', '$2y$10$lrgGPy9eOxyDFuxB4UNxo.9JGAWOddMFfnXrBS9/Coyj8BhIY8e66', 'dan@hotmail.com', 1, 1),
(14, 'axel', '$2y$10$HmPC8JwHLVT7DqDMsRbzaOFeyjwjFjehvZpN1GpajvTH0QaaOJQ5S', 'axel@gmail.com', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_roles`
--
ALTER TABLE `table_roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_roles`
--
ALTER TABLE `table_roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
