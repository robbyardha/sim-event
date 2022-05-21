-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 05:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-event`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(150) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_berakhir` time NOT NULL,
  `penyelenggara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `deskripsi_event`, `tanggal_awal`, `tanggal_akhir`, `waktu_mulai`, `waktu_berakhir`, `penyelenggara`) VALUES
(1, 'Wisuda', 'Wisuda yuk', '2022-05-21', '2022-05-22', '07:00:00', '15:00:00', 'Gembira PT'),
(2, 'Pensi', 'Pensin yuk', '2022-05-21', '2022-05-22', '07:00:00', '15:00:00', 'Gembira PT'),
(3, 'Halal Bi Halal', 'Halal bi Halal yuk', '2022-05-21', '2022-05-22', '07:00:00', '15:00:00', 'Gembira PT');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_event`
--

CREATE TABLE `kehadiran_event` (
  `id` int(11) NOT NULL,
  `event_id` int(55) NOT NULL,
  `peserta_event_id` char(32) NOT NULL,
  `status_kehadiran` varchar(50) NOT NULL,
  `waktu_kehadiran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran_event`
--

INSERT INTO `kehadiran_event` (`id`, `event_id`, `peserta_event_id`, `status_kehadiran`, `waktu_kehadiran`) VALUES
(1, 1, '534ea1c4ac294b47811102d73e5d8b44', 'HADIR', '2022-05-21 03:21:31'),
(2, 1, '534ea1c4ac294b47811102d73e5d8b44', 'HADIR', '2022-05-21 03:28:14'),
(3, 1, '534ea1c4ac294b47811102d73e5d8b44', 'HADIR', '2022-05-21 03:28:21'),
(4, 1, '534ea1c4ac294b47811102d73e5d8b44', 'HADIR', '2022-05-21 03:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_event`
--

CREATE TABLE `peserta_event` (
  `id` int(11) NOT NULL,
  `uuid` char(32) NOT NULL,
  `users_id` int(75) NOT NULL,
  `event_id` int(75) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(200) NOT NULL,
  `asal` varchar(200) NOT NULL,
  `no_tlp` varchar(155) NOT NULL,
  `qr_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_event`
--

INSERT INTO `peserta_event` (`id`, `uuid`, `users_id`, `event_id`, `tanggal_daftar`, `nama`, `asal`, `no_tlp`, `qr_img`) VALUES
(1, '534ea1c4ac294b47811102d73e5d8b36', 2, 1, '2022-05-20 20:11:19', 'Adina Everett', 'Spanyol', '0', 'Adina Everett.png'),
(2, '534ea1c4ac294b47811102d73e5d8b37', 3, 1, '2022-05-20 20:11:20', 'Macy Eastwood', 'Spanyol', '0', 'Macy Eastwood.png'),
(3, '534ea1c4ac294b47811102d73e5d8b38', 4, 1, '2022-05-20 20:11:20', 'Liam Webster', 'Spanyol', '0', 'Liam Webster.png'),
(4, '534ea1c4ac294b47811102d73e5d8b39', 5, 1, '2022-05-20 20:11:20', 'Ally Harvey', 'Spanyol', '0', 'Ally Harvey.png'),
(5, '534ea1c4ac294b47811102d73e5d8b40', 6, 1, '2022-05-20 20:11:20', 'Liv Benfield', 'Spanyol', '0', 'Liv Benfield.png'),
(6, '534ea1c4ac294b47811102d73e5d8b41', 7, 1, '2022-05-20 20:11:21', 'Maribel Ellis', 'Spanyol', '0', 'Maribel Ellis.png'),
(7, '534ea1c4ac294b47811102d73e5d8b42', 8, 1, '2022-05-20 20:11:21', 'Harvey Crawley', 'Spanyol', '0', 'Harvey Crawley.png'),
(8, '534ea1c4ac294b47811102d73e5d8b43', 9, 1, '2022-05-20 20:11:21', 'Daniel Nelson', 'Spanyol', '0', 'Daniel Nelson.png'),
(9, '534ea1c4ac294b47811102d73e5d8b44', 10, 1, '2022-05-20 20:11:22', 'Alan Downing', 'Spanyol', '0', 'Alan Downing.png'),
(10, '534ea1c4ac294b47811102d73e5d8b45', 11, 1, '2022-05-20 20:11:22', 'Logan Anderson', 'Spanyol', '0', 'Logan Anderson.png');

-- --------------------------------------------------------

--
-- Table structure for table `status_hadir`
--

CREATE TABLE `status_hadir` (
  `id` int(11) NOT NULL,
  `hadir` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_hadir`
--

INSERT INTO `status_hadir` (`id`, `hadir`) VALUES
(1, 'i029qw47eaH2922A8566D3935I2834R'),
(2, 't9374pkuerN2922U8566L3935L2834S');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `asal` varchar(155) DEFAULT NULL,
  `no_tlp` varchar(155) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `nama`, `asal`, `no_tlp`, `role_id`, `is_active`, `created_date`, `image`) VALUES
(1, 'robby@ardhacodes.com', 'robby', '$2y$10$nVqcA8T3REKAP.jQiAnwVedKS.viFowqoAdcQytwqJ6Yl5Q56Fgkm', 'Robby Firmansyah Ardha', NULL, NULL, 1, 1, '2022-05-20 17:30:54', NULL),
(2, 'Adina_Everett7235@jiman.org', 'adina', '$2y$10$nr6jw2Ywyla7ntj59oIHNOvPq6yZW70C3fwG0lBXm68p/VrDzbajy', 'Adina Everett', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:03', NULL),
(3, 'Macy_Eastwood8255@acrit.org', 'macy', '$2y$10$BcJgYX8e/sPS.m6anWuLJ.ZbquS7QeKZpBni/o2jfGyqI.Dh/sZMS', 'Macy Eastwood', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:03', NULL),
(4, 'Liam_Webster2744@acrit.org', 'liam', '$2y$10$UfNyFuKDys1Y7D1LrY6xhOvJnnaBKPyE/3oUGJiMKMrSbpcBwwxES', 'Liam Webster', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:03', NULL),
(5, 'Ally_Harvey1897@atink.com', 'ally', '$2y$10$OY6KksEBtxvV1Spu4MqGh.5VdAeThElT0ZtEk34RKuCkBBHcZGblu', 'Ally Harvey', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:03', NULL),
(6, 'Liv_Benfield6223@sveldo.biz', 'livben', '$2y$10$x1ARXKxJMrA3/bY4apbw5enGDZw2l2kaLx2HN7ZuZgrDOFjiFYTgW', 'Liv Benfield', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:03', NULL),
(7, 'Maribel_Ellis168@corti.com', 'maribel', '$2y$10$6Sx3SdEfAUXUZ33U9F8/eOrTgWnRifyrHtU.W2DAvxzxTRKKAvhTS', 'Maribel Ellis', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:04', NULL),
(8, 'Harvey_Crawley9344@gompie.com', 'harvey', '$2y$10$oXKVe5xgvD2RltVse2gwp.dQDiPbWve1yLJTNODmLSQTps14/dy6O', 'Harvey Crawley', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:04', NULL),
(9, 'Daniel_Nelson5620@corti.com', 'daniel', '$2y$10$7z.AzFkwsFIobqpW4GmRKuBYlibSOmyV/M0sAobTWTYMqzqelgRm.', 'Daniel Nelson', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:04', NULL),
(10, 'Alan_Downing3293@ubusive.com', 'alan', '$2y$10$FivwxNKWTSgwsf44/hyl/OinOYVZD3vKHoVHAB4yYbrXv6CKw8bY.', 'Alan Downing', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:04', NULL),
(11, 'Logan_Anderson8939@cispeto.com', 'logan', '$2y$10$dTlpWh66WMkjP9vaALULiea5J5cPTt0OyUl77crtdzB7uaaTqsAmO', 'Logan Anderson', 'Spanyol', '0', 2, 1, '2022-05-20 18:38:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran_event`
--
ALTER TABLE `kehadiran_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_event`
--
ALTER TABLE `peserta_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_hadir`
--
ALTER TABLE `status_hadir`
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
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kehadiran_event`
--
ALTER TABLE `kehadiran_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta_event`
--
ALTER TABLE `peserta_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_hadir`
--
ALTER TABLE `status_hadir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
