-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 10:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_berakhir` time NOT NULL,
  `status` varchar(85) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_event`
--

CREATE TABLE `kehadiran_event` (
  `id` int(11) NOT NULL,
  `event_id` int(55) NOT NULL,
  `users_id` int(55) NOT NULL,
  `status_kehadiran` varchar(50) NOT NULL,
  `waktu_kehadiran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran_event`
--

INSERT INTO `kehadiran_event` (`id`, `event_id`, `users_id`, `status_kehadiran`, `waktu_kehadiran`) VALUES
(1, 55, 6, 'Hadir', '2022-05-15 08:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_event`
--

CREATE TABLE `peserta_event` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(200) NOT NULL,
  `asal` varchar(200) NOT NULL,
  `no_tlp` varchar(155) NOT NULL,
  `qr_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `asal` varchar(155) NOT NULL,
  `no_tlp` varchar(155) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kehadiran_event`
--
ALTER TABLE `kehadiran_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta_event`
--
ALTER TABLE `peserta_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_hadir`
--
ALTER TABLE `status_hadir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
