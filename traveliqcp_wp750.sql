-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2022 at 01:10 PM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveliqcp_wp750`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `closer`
--

CREATE TABLE `closer` (
  `closer_id` int(11) NOT NULL,
  `closer_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `closer_ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closer_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'rk', '1.ravi.kaliya@gmail.com', '$2y$10$X/phdGl1SlFQbxuD6h0dv.N9mgFC5dVU5dacofxcbgagMt46f1xhS'),
(2, 'rk', 'rk@gmail.com', 'arݻ.?q0?Z????'),
(3, 'rk1', 'rk1@gmail.com', '$2y$10$F206yohQNEiaNKZ21pAR3e/6ba2bspHPBQXiIB4gckQysH4KCJkKy');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `aff_fullname` varchar(50) NOT NULL,
  `aff_email` varchar(50) NOT NULL,
  `aff_pass` varchar(50) NOT NULL,
  `caff_pass` varchar(100) NOT NULL,
  `aff_mobile` varchar(30) NOT NULL,
  `aff_pincode` int(10) NOT NULL,
  `aff_state` varchar(50) NOT NULL,
  `aff_city` varchar(50) NOT NULL,
  `aff_address` varchar(100) NOT NULL,
  `aff_accnumber` varchar(20) NOT NULL,
  `aff_accname` varchar(50) NOT NULL,
  `aff_ifsccode` varchar(15) NOT NULL,
  `aff_pancard` varchar(11) NOT NULL,
  `aff_agentid` varchar(15) NOT NULL,
  `aff_manualtime` varchar(50) NOT NULL,
  `aff_uid` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'new',
  `aff_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `aff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`aff_fullname`, `aff_email`, `aff_pass`, `caff_pass`, `aff_mobile`, `aff_pincode`, `aff_state`, `aff_city`, `aff_address`, `aff_accnumber`, `aff_accname`, `aff_ifsccode`, `aff_pancard`, `aff_agentid`, `aff_manualtime`, `aff_uid`, `status`, `aff_timestamp`, `aff_id`) VALUES
('1', '1@gmail.com', 'MQ==', 'MQ==', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', 'Friday 01-07-2022 05:34:15', '10001', 'new', '2022-07-01 05:34:15', 133),
('Neeraj Garg', 'ngarg.atc@gmail.com', 'MTIzNDU2', 'MTIzNDU2', '9999410009', 122018, 'Haryana', 'Gurgaon', 'Gurgaon', '024701511218', 'NEERAJ GARG', 'ICIC0000027', 'AAYPG9036E', 'NA', 'Friday 01-07-2022 05:36:46', '10002', 'new', '2022-07-01 05:36:46', 134),
('1.ravi.kaliya@gmail.com', '1.ravi.kaliya@gmail.com', 'MS5yYXZpLmthbGl5YUBnbWFpbC5jb20=', 'MS5yYXZpLmthbGl5YUBnbWFpbC5jb20=', '122001', 122001, '122001', '122001', '122001', '122001', '122001', '122001', '122001', '122001', 'Friday 01-07-2022 05:56:46', '10003', 'new', '2022-07-01 05:56:46', 135),
('2', '2@gmail.com', 'Mg==', 'Mg==', '2', 2, '2', '2', '2', '2', '2', '2', '2', '2', 'Friday 01-07-2022 06:04:42', '10004', 'new', '2022-07-01 06:04:42', 136),
('72', '72@gmail.com', 'NzI=', 'NzI=', '72', 72, '72', '72', '72', '72', '72', '72', '72', '72', 'Friday 01-07-2022 06:45:58', '10005', 'new', '2022-07-01 06:45:58', 137);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `aff_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `aff_id` int(11) NOT NULL,
  `aff_reffid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aff_ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`aff_timestamp`, `aff_id`, `aff_reffid`, `aff_ipaddress`) VALUES
('2022-07-01 05:26:52', 12, 'ravikaliya2', '122.176.93.143'),
('2022-07-01 05:28:08', 13, '23850170382920586', '2409:4089:2e98:987::968b:cc00'),
('2022-07-01 05:28:31', 14, 'taboola', '122.161.74.206'),
('2022-07-01 05:29:14', 15, 'fb', '122.176.93.143'),
('2022-07-01 05:29:42', 16, 'fb', '122.176.93.143'),
('2022-07-01 05:31:21', 17, '23850170382920586', '2409:4064:682:6f60:268a:899b:cfe8:5737'),
('2022-07-01 05:32:17', 18, 'mind', '202.133.49.234'),
('2022-07-01 05:38:00', 19, 'mind', '2409:4041:6e46:9104::b7cb:7109'),
('2022-07-01 05:39:18', 20, '00002', '122.176.93.143'),
('2022-07-01 05:42:02', 21, '23850170382920586', '2409:4053:2d02:a79:3080:6538:6d87:f984'),
('2022-07-01 05:44:23', 22, '23850170382920586', '2401:4900:336f:eba9:1:0:716a:b37f'),
('2022-07-01 05:46:45', 23, '23850170382920586', '49.35.225.132'),
('2022-07-01 05:53:32', 24, '23850170382920586', '2409:4061:2dc9:1f03::f349:b604'),
('2022-07-01 05:58:21', 25, '00003', '122.176.93.143'),
('2022-07-01 06:00:19', 26, '23850170382920586', '2409:4089:ae1d:85f2:124b:27a5:257d:9ba4'),
('2022-07-01 06:06:41', 27, 'gadscsc', '74.125.216.78'),
('2022-07-01 06:09:07', 28, '23850170382920586', '2409:4043:789:d109:dcfb:b0cd:57c0:28f1'),
('2022-07-01 06:19:11', 29, '10003', '122.176.93.143'),
('2022-07-01 06:20:06', 30, '10003', '122.176.93.143'),
('2022-07-01 06:22:34', 31, '10002', '122.176.93.143'),
('2022-07-01 06:22:50', 32, '10002', '122.176.93.143'),
('2022-07-01 06:23:41', 33, '10002', '122.176.93.143'),
('2022-07-01 06:35:08', 34, 'wa', '2401:4900:1f3d:8ae9:792d:534b:dc5d:232d'),
('2022-07-01 06:38:12', 35, '23850170382920586', '2409:4064:2e87:d8f8:a33d:5fd4:bb40:138d'),
('2022-07-01 06:42:47', 36, '23850170382920586', '2a03:2880:11ff:17::face:b00c'),
('2022-07-01 06:46:22', 37, '23850170382920586', '2409:4064:2b9e:1aa8::c6c9:9810'),
('2022-07-01 06:46:36', 38, '10005', '122.176.93.143'),
('2022-07-01 06:50:14', 39, '23850170382920586', '2409:4061:2c87:d827::4cb:9d10'),
('2022-07-01 06:57:11', 40, 'wa', '110.44.11.155'),
('2022-07-01 07:00:22', 41, '23850170382920586', '2401:4900:4470:e43f:0:61:65d4:b401'),
('2022-07-01 07:13:47', 42, '23850170382920586', '2401:4900:3dc5:5c49:cee8:87b6:c1ba:895b'),
('2022-07-01 07:14:46', 43, '23850268752470586', '2409:4063:6d08:8104::1288:900d'),
('2022-07-01 07:15:18', 44, '23850170382920586', '2401:4900:5dc3:2ba8:0:3e:9cee:3301'),
('2022-07-01 07:27:08', 45, '23850170382920586', '2402:3a80:18ce:737f:d260:5557:cf50:22d9'),
('2022-07-01 07:29:00', 46, '23850170382920586', '2409:4043:2c18:cab1:7c70:87bd:26f1:9c1f'),
('2022-07-01 07:30:29', 47, '23850170382920586', '2401:4900:1f3c:754d:24ea:8e8d:3303:d4cd'),
('2022-07-01 07:38:05', 48, '23850170382920586', '2409:4062:4d09:aff1:c4e8:2a05:48e5:2806');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closer`
--
ALTER TABLE `closer`
  ADD PRIMARY KEY (`closer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`aff_id`),
  ADD UNIQUE KEY `aff_email` (`aff_email`),
  ADD UNIQUE KEY `aff_mobile` (`aff_mobile`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`aff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `closer`
--
ALTER TABLE `closer`
  MODIFY `closer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `aff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `aff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
