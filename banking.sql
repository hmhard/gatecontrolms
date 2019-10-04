-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 06:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `account_no`, `registered_date`) VALUES
(1, 'miniyahil', '23456867', '2019-08-29'),
(2, 'abebe', '6786786786768', '2019-06-17'),
(5, 'abebe', '5675675', '2019-07-25'),
(6, 'dfgdfg', '787867', '2011-12-13'),
(7, 'golden', '3434', '2011-12-13'),
(8, 'mayregu', '6785434', '2014-10-11'),
(9, 'golden', '6786786', '2011-12-12'),
(11, 'golden', '67867867878', '2011-12-12'),
(12, 'fghg', '67867', '2014-10-11'),
(13, 'fghg', '678673453', '2014-10-11'),
(14, 'abebech kebede', '2362784', '2011-12-12'),
(15, 'dfgdfkj', '454869', '2014-10-11'),
(16, 'ghjg', '56786', '2011-12-13'),
(17, 'degeefu', '3434134545', '2011-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` datetime NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `first_name`, `last_name`, `image_url`, `phone_no`, `type`, `registered_at`, `gender`) VALUES
(1, 'RU 1212/12', 'abebe', 'bekele', 'mine.jpg', '0912266445', 'Student', '2019-09-17 00:00:00', 'Male'),
(2, 'RU3434/12', 'chaltu', 'Chala', 'bimage.jpg', '0912121212232', 'Staff', '2019-09-17 09:43:19', 'Female'),
(4, 'RU3464/12', 'bontu', 'dejasa', 'fmuser.png', '0923423', 'Student', '2019-09-09 08:29:00', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190915230348', '2019-09-15 23:06:06'),
('20190915231204', '2019-09-15 23:12:45'),
('20190917004520', '2019-09-17 00:45:45'),
('20190917161810', '2019-09-17 16:18:31'),
('20190917203005', '2019-09-17 20:30:29'),
('20190917203018', '2019-09-17 20:32:22'),
('20190917223040', '2019-09-17 22:31:02'),
('20190917231910', '2019-09-17 23:19:18'),
('20190918020810', '2019-09-18 02:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_date` datetime NOT NULL,
  `last_seen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `description`, `report_date`, `last_seen`) VALUES
(1, '', 'dfgdfgdf', '2019-07-14 01:22:15', '2019-09-19 19:19:25'),
(2, '', 'dfgdfgdf dfgdfgd df fdgdfg', '2019-08-19 01:23:42', '2019-06-21 01:23:42'),
(3, 'RU3434/12', 'done', '2019-07-20 01:25:05', '2019-11-22 23:25:46'),
(4, '', 'dfgdfg', '2019-06-22 01:25:27', '2019-09-13 01:25:27'),
(5, '', 'gdfgdf', '2019-08-09 01:26:35', '2019-07-29 01:26:35'),
(6, 'RU 1212/12', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passa and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-29 01:27:30', '2019-09-23 18:19:05'),
(7, 'RU 1212/12', 'dfgdfgd', '2019-08-24 22:12:10', '2019-07-25 22:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `sisuser`
--

CREATE TABLE `sisuser` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_number` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sisuser`
--

INSERT INTO `sisuser` (`id`, `user_id`, `update_number`, `last_update`) VALUES
(1, 'RU 1212/12', 1, '2019-09-16 08:32:00'),
(2, 'RU3464/12', 0, '2019-09-16 08:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `idno` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_date` datetime NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `idno`, `username`, `password`, `registered_date`, `full_name`, `profile_pic`) VALUES
(1, '1212', 'chaltu', 'chala', '2019-09-16 00:00:00', 'chaltu chala', 'abc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_62534E2143F810F5` (`account_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sisuser`
--
ALTER TABLE `sisuser`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sisuser`
--
ALTER TABLE `sisuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
