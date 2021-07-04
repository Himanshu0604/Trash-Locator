-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 04:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcremote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'himanshu', 'himanshu0604choudhary99@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', '2021-04-11 17:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(18, '00a40ac0-1a14-4b3a-a1ce-d8c89d37d1cd_6afde6c9-bbbb-47c6-acf5-8b0392c59fba.jpg', '0000-00-00 00:00:00', '1'),
(19, '00a44355-7598-4a84-b99f-86e57bbfc19d_3f4fcc3b-605f-4210-86b2-5dc82098bc5c.jpg', '0000-00-00 00:00:00', '1'),
(20, '00b4f9f9-1df0-434e-84d2-aace25b4de67_1256dd3a-3366-448a-9d6d-f52e2442046d.jpg', '0000-00-00 00:00:00', '1'),
(21, '00b4f9f9-1df0-434e-84d2-aace25b4de67_e3b28362-9d6b-4faf-8ce5-e4af2959d2f2.jpg', '0000-00-00 00:00:00', '1'),
(22, '0a355d40-1bd2-4a91-83c3-2f9844ef63da_b420e076-3642-4600-bab5-36747aa9445e.jpg', '0000-00-00 00:00:00', '1'),
(23, '0a507b0e-fc46-4a99-af24-1b379db32886_ec99c435-3f52-48d5-9e67-7d37c1e4e780.jpg', '0000-00-00 00:00:00', '1'),
(24, '0a563ba0-e421-4f36-817d-9f967210c288_657a9cd4-c04a-4d8b-917f-77e4eadc3ff1.jpg', '0000-00-00 00:00:00', '1'),
(25, '0a563ba0-e421-4f36-817d-9f967210c288_9429b023-ea35-4b08-88e7-5989be66c1fe.jpg', '0000-00-00 00:00:00', '1'),
(26, '0a563ba0-e421-4f36-817d-9f967210c288_cd5b9456-0c79-4395-b4ec-82f599084bd3.jpg', '0000-00-00 00:00:00', '1'),
(28, '001.JPG', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `name` varchar(20) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unpicked',
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_source` varchar(10) NOT NULL DEFAULT 'mobile',
  `id` int(11) NOT NULL,
  `area` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`name`, `longitude`, `latitude`, `status`, `time_stamp`, `img_source`, `id`, `area`) VALUES
('bangalore', 77.5946, 12.9716, 'unpicked', '2021-04-12 11:31:43', 'mobile', 1, 75),
('Delhi', 77.1025, 28.7041, 'unpicked', '2021-04-12 11:31:47', 'drone', 2, 80),
('Karan', 79.9864, 23.1815, 'unpicked', '2021-04-12 11:31:53', 'mobile', 3, 150),
('himanshu ', 77.6294, 13.1202, 'unpicked', '2021-04-12 11:31:57', 'cctv', 4, 210);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'himanshu', 'himanshu0604choudhary99@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', '2021-04-10 17:42:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
