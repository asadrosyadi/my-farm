-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2021 at 12:06 AM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1148742_myfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `amoniak_akuarium`
--

CREATE TABLE `amoniak_akuarium` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` text NOT NULL,
  `mid` text NOT NULL,
  `max` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amoniak_akuarium`
--

INSERT INTO `amoniak_akuarium` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, '0', '0.012', '0.024'),
(2, 39, '0', '0.012', '0.024');

-- --------------------------------------------------------

--
-- Table structure for table `co2_tanaman`
--

CREATE TABLE `co2_tanaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co2_tanaman`
--

INSERT INTO `co2_tanaman` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 0, 2500, 5000),
(2, 39, 0, 2500, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `suhu_tanaman` text NOT NULL,
  `PH_tanaman` text NOT NULL,
  `intentitascahaya_tanaman` text NOT NULL,
  `intentitascahaya_tanaman2` text NOT NULL,
  `kelembapan_tanaman` text NOT NULL,
  `kelembapan_tanaman2` text NOT NULL,
  `co2_tanaman` text NOT NULL,
  `o2_tanaman` text NOT NULL,
  `debit_tanaman` text NOT NULL,
  `mineral_tanaman` text NOT NULL,
  `mineral_tanaman2` text NOT NULL,
  `indikatornutrisi_tanaman` text NOT NULL,
  `PH_akuarium` text NOT NULL,
  `suhu_akuarium` text NOT NULL,
  `oksigen_akuarium` text NOT NULL,
  `amoniak_akuarium` text NOT NULL,
  `indikatorpakan_akuarium` text NOT NULL,
  `indikatorvitamin_akuarium` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `HWID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`id`, `id_user`, `suhu_tanaman`, `PH_tanaman`, `intentitascahaya_tanaman`, `intentitascahaya_tanaman2`, `kelembapan_tanaman`, `kelembapan_tanaman2`, `co2_tanaman`, `o2_tanaman`, `debit_tanaman`, `mineral_tanaman`, `mineral_tanaman2`, `indikatornutrisi_tanaman`, `PH_akuarium`, `suhu_akuarium`, `oksigen_akuarium`, `amoniak_akuarium`, `indikatorpakan_akuarium`, `indikatorvitamin_akuarium`, `timestamp`, `HWID`) VALUES
(1, '30', '25', '7', '80%', '80', '20%', '20', '2000', '1500', '0.3', '60%', '60', '85%', '7', '26', '4', '0.0004', '50', '40', '2021-07-03 23:13:35', '000112'),
(7, '30', '26', '6', '40%', '40', '5%', '5', '2000', '1200', '0.01', '45%', '45', '40%', '5', '24', '2', '0.011', '40', '30', '2021-07-04 01:24:59', '000112'),
(8, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60%', '6', '26', '4', '0.01', '40', '30', '2021-07-23 23:11:07', 'BKV50002'),
(9, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60%', '6', '26', '4', '0.01', '40', '30', '2021-09-02 01:35:46', 'BKV50002'),
(10, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-06 18:59:01', 'BKV50002'),
(11, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-07 00:55:59', 'BKV50002'),
(12, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-07 07:18:35', 'BKV50002'),
(13, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-07 07:18:37', 'BKV50002'),
(14, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-07 18:36:25', 'BKV50002'),
(15, '39', '24', '7', '90%', '90', '10%', '10', '2400', '2000', '0.3', '45%', '45', '60', '6', '26', '4', '0.01', '40', '30', '2021-12-07 18:36:43', 'BKV50002'),
(16, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 19:18:17', 'BKV50002'),
(17, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 19:48:59', 'BKV50002'),
(18, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 19:50:40', 'BKV50002'),
(19, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 20:03:00', 'BKV50002'),
(20, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 20:03:45', 'BKV50002'),
(21, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 20:27:33', 'BKV50002'),
(22, '39', '0', '0', '0%', '0', '0%', '0', '0', '0', '0', '0%', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-07 23:20:22', 'BKV50002'),
(23, '39', 'nan', '0.00', '-40%', '-40', 'nan%', 'nan', '0.04', '0.33', '0', '0%', '0', '0.00', '0.00', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-07 23:21:15', 'BKV50002'),
(24, '39', 'nan', '0.00', '-40%', '-40', 'nan%', 'nan', '0.02', '0.20', '0', '0%', '0', '0.00', '0.00', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-08 01:01:29', 'BKV50002'),
(25, '39', 'nan', '17.24', '-40%', '-40', 'nan%', 'nan', '0.01', '0.24', '0', '0%', '0', '0.00', '6.95', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-08 01:02:10', 'BKV50002'),
(26, '39', 'nan', '0.00', '-40%', '-40', 'nan%', 'nan', '0.02', '0.15', '0', '0%', '0', '0.00', '0.00', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-08 03:42:56', 'BKV50002'),
(27, '39', 'nan', '17.24', '-40%', '-40', 'nan%', 'nan', '0.00', '0.02', '0', '0%', '0', '0.00', '6.95', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-08 03:43:31', 'BKV50002'),
(28, '39', 'nan', '17.24', '-40%', '-40', 'nan%', 'nan', '0.00', '0.00', '0', '0%', '0', '0.00', '6.95', '-127.00', '0.00', '0.00', '80', '0.00', '2021-12-08 03:44:07', 'BKV50002');

-- --------------------------------------------------------

--
-- Table structure for table `fuzzyrule`
--

CREATE TABLE `fuzzyrule` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzyrule`
--

INSERT INTO `fuzzyrule` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 22, 24, 26),
(2, 39, 22, 24, 26);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzyrule_intentitascahaya_tanaman2`
--

CREATE TABLE `fuzzyrule_intentitascahaya_tanaman2` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzyrule_intentitascahaya_tanaman2`
--

INSERT INTO `fuzzyrule_intentitascahaya_tanaman2` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 70, 85, 100),
(2, 39, 70, 85, 100);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzyrule_phtanaman`
--

CREATE TABLE `fuzzyrule_phtanaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzyrule_phtanaman`
--

INSERT INTO `fuzzyrule_phtanaman` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 4, 6, 8),
(2, 39, 4, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kelembapan_tanaman`
--

CREATE TABLE `kelembapan_tanaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelembapan_tanaman`
--

INSERT INTO `kelembapan_tanaman` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 0, 15, 30),
(2, 39, 0, 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `oksigen_akuarium`
--

CREATE TABLE `oksigen_akuarium` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oksigen_akuarium`
--

INSERT INTO `oksigen_akuarium` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 2, 4, 6),
(2, 39, 2, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ph_akuarium`
--

CREATE TABLE `ph_akuarium` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ph_akuarium`
--

INSERT INTO `ph_akuarium` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 4, 6, 8),
(2, 39, 4, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sortby`
--

CREATE TABLE `sortby` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sortby` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortby`
--

INSERT INTO `sortby` (`id`, `id_user`, `sortby`) VALUES
(1, 30, 2800),
(2, 39, 2800);

-- --------------------------------------------------------

--
-- Table structure for table `suhu_akuarium`
--

CREATE TABLE `suhu_akuarium` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suhu_akuarium`
--

INSERT INTO `suhu_akuarium` (`id`, `id_user`, `min`, `mid`, `max`) VALUES
(1, 30, 24, 26, 28),
(3, 39, 24, 26, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `token` text NOT NULL,
  `HWID` text NOT NULL,
  `jadwal_pupuk` text NOT NULL,
  `waktu_pakan_ikan` text NOT NULL,
  `waktu_pakan_ikan2` text NOT NULL,
  `waktu_pakan_ikan3` text NOT NULL,
  `waktu_vitamin_ikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `token`, `HWID`, `jadwal_pupuk`, `waktu_pakan_ikan`, `waktu_pakan_ikan2`, `waktu_pakan_ikan3`, `waktu_vitamin_ikan`) VALUES
(30, 'Mohammad As\'ad Rosyadi', 'admin@myfarmportable.com', 'default.jpg', '$2y$10$lxQQTW93HUwpAQy0CA5Wle/2KZRbXCOIJTFI5Qw9DXBuAo2wrUIIy', 1, 1, 1622251755, 'zwJdmaOCQoDW9XgH', '000112', '0', '07.30 && 13.30 && 18.30', '', '', '0'),
(39, 'My Farm', 'portablemyfarm@gmail.com', 'default.jpg', '$2y$10$wofzCnNfHoRA6w6PsHsWJOevCvFh7yFxAGed2cOwzB/c3LEkv98vW', 2, 1, 1627080152, 'uTh3tZ16pXOdaQm8', 'BKV50002', 'Wednesday:03:36', '08:02', '13:10', '19:15', 'Wednesday:15:41'),
(44, 'Widad Lazuardi', 'rosyadi.asad@gmail.com', 'default.jpg', '$2y$10$HF3L.MAHpPRX817h5MRRPOYBDDSDCL2xNst2fNsq5wvY3dUUv0ATm', 2, 1, 1631224669, '0zKMWEIwdojL1QCD', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 2),
(6, 2, 5),
(10, 1, 4),
(12, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Userdata'),
(5, 'Historydevice');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 0),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(14, 8, 'User Data', 'userdata', 'fa-fw fas fa-users', 1),
(15, 4, 'User Data', 'userdata', 'fas fa-fw fa-users', 1),
(16, 5, 'Schedule', 'historydevice/control', 'fas fa-fw fa-gamepad', 1),
(17, 5, 'Monitoring Device', 'historydevice', 'fas fa-fw fa-laptop-code', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amoniak_akuarium`
--
ALTER TABLE `amoniak_akuarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co2_tanaman`
--
ALTER TABLE `co2_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasensor`
--
ALTER TABLE `datasensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuzzyrule`
--
ALTER TABLE `fuzzyrule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuzzyrule_intentitascahaya_tanaman2`
--
ALTER TABLE `fuzzyrule_intentitascahaya_tanaman2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuzzyrule_phtanaman`
--
ALTER TABLE `fuzzyrule_phtanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelembapan_tanaman`
--
ALTER TABLE `kelembapan_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oksigen_akuarium`
--
ALTER TABLE `oksigen_akuarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ph_akuarium`
--
ALTER TABLE `ph_akuarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortby`
--
ALTER TABLE `sortby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu_akuarium`
--
ALTER TABLE `suhu_akuarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amoniak_akuarium`
--
ALTER TABLE `amoniak_akuarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `co2_tanaman`
--
ALTER TABLE `co2_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datasensor`
--
ALTER TABLE `datasensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fuzzyrule`
--
ALTER TABLE `fuzzyrule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuzzyrule_intentitascahaya_tanaman2`
--
ALTER TABLE `fuzzyrule_intentitascahaya_tanaman2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuzzyrule_phtanaman`
--
ALTER TABLE `fuzzyrule_phtanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelembapan_tanaman`
--
ALTER TABLE `kelembapan_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oksigen_akuarium`
--
ALTER TABLE `oksigen_akuarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ph_akuarium`
--
ALTER TABLE `ph_akuarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sortby`
--
ALTER TABLE `sortby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suhu_akuarium`
--
ALTER TABLE `suhu_akuarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
