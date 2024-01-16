-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 jan 2024 om 16:40
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilma`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `availablities`
--

CREATE TABLE `availablities` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `data_begin` varchar(255) NOT NULL,
  `timestamp_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `user_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `user_created` datetime NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `user_updated`, `user_created`, `admin`) VALUES
(8, 'wilmahaakt@gmail.com', '$2y$10$sY/9Pmis5pI4lhCATm4N7.9Sl/xgJaRyrlGGtFFCMMGaiphMa7xtO', 'Wilma', 'van den Dwerg', 676543218, '0000-00-00 00:00:00', '2024-01-16 10:36:52', 1),
(9, 'pascalberens14@gmail.com', '$2y$10$wEj5AAnysEXwMlF4m1CteuEcD/3.3SqZCnryvRf0B4ox0.szbeYvu', 'Pascal', 'Berens', 655083173, '2024-01-16 13:26:41', '2024-01-16 13:26:41', 0),
(11, '11@gmail.com', '$2y$10$DYYC/oqHXTiC1FdYuBAdU.MZumTrtqSMzv1jOQIbwp.YmW82Y/OQi', 'Brenda', 'Greer', 612345678, '2024-01-16 15:23:15', '2024-01-16 15:23:15', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `availablities`
--
ALTER TABLE `availablities`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `availablities`
--
ALTER TABLE `availablities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
