-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2017 at 05:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Software_Engineer_Management`
--
DROP DATABASE IF EXISTS `Software_Engineer_Management`;
CREATE DATABASE IF NOT EXISTS `Software_Engineer_Management` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Software_Engineer_Management`;

-- --------------------------------------------------------

--
-- Table structure for table `Engineer`
--

CREATE TABLE `Engineer` (
  `idEngineer` int(10) NOT NULL,
  `engineerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TechSkill` text COLLATE utf8_unicode_ci NOT NULL,
  `Experience` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateJoin` date DEFAULT NULL,
  `outOfDate` date DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `birthday` date DEFAULT NULL,
  `birthday_mail` int(1) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `busy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Engineer`
--

INSERT INTO `Engineer` (`idEngineer`, `engineerName`, `Address`, `Phone`, `Email`, `TechSkill`, `Experience`, `dateJoin`, `outOfDate`, `avatar`, `birthday`, `birthday_mail`, `status`, `busy`) VALUES
(1, 'Ngô Ngọc Nhân', 'Đà Nẵng', '0971620629', 'ngongocnhan.95@gmail.com', ' - PHP - JAVA - .NET', '1 year', '2017-06-30', '2017-07-29', '', '1995-07-17', 1, 1, 0),
(2, 'Trần Ngọc Bảo Long', 'Quảng Nam', '0123456789', 'ngongocnhan.95@gmail.com', ' - PHP - JAVA - .NET', '1 year', '2015-07-11', NULL, '', '1995-07-17', 1, 1, 1),
(3, 'Trần Hữu Quân', 'Quảng Nam', '0123456789', 'abc@gmail.com', ' - PHP - JAVA - IOS', 'No experience', '2017-07-14', NULL, 'project.png', '1995-07-14', 0, 1, 0),
(4, 'Lê Thị Đạt', 'Cà Mau', '0123456789', 'abc@gmail.com', '- .NET\n- Ruby', '1 year', NULL, NULL, NULL, NULL, 0, 1, 1),
(5, 'Quách Thành Vũ', 'Nghệ An', '0123456789', 'abc@gmail.com', '- Android\n- IOS\n- .NET', '3 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(6, 'Lê Văn Trinh', 'Hà Tĩnh', '0123456789', 'abc@gmail.com', '- PHP\n- Java\n- Android', '5 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(7, 'Tạ Thị Long', 'Hà Nội', '0123456789', 'abc@gmail.com', '- .NET\n- PHP', '5 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(8, 'Đinh Văn Lút', 'Tiền Giang', '0123456789', 'abc@gmail.com', '- IOS\n- Java\n- Ruby', '7 years', NULL, NULL, NULL, NULL, 0, 1, 0),
(9, 'Bùi Hồng Thảo', 'Nghệ An', '0123456789', 'abc@gmail.com', '- Android\n- IOS\n- Java\n- .NET', '10 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(10, 'Trương Pew Pew', 'Hồ Chí Minh', '0123456789', 'abc@gmail.com', '- IOS\n- PHP', '4 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(11, 'Đặng Đức Đạt', 'Cần Thơ', '0123456789', 'abc@gmail.com', '- PHP\n- IOS', '9 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(12, 'Nguyễn Hải Nghị', 'Đà Nẵng', '0123456789', 'abc@gmail.com', '- JAVA\n- .NET', '6 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(13, 'Lê Văn Tùng', 'Thanh Hóa', '0123456789', 'abc@gmail.com', '- Android\n- .NET', '5 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(14, 'Nguyễn Thị Khánh', 'Huế', '0123456789', 'abc@gmail.com', '- Ruby', '1 year', NULL, NULL, NULL, NULL, 0, 1, 1),
(15, 'Đặng Ba Đuê', 'Hải Phòng', '0123456789', 'abc@gmail.com', '- Ruby\n- .NET\n- IOS', '11 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(16, 'Trần Cẩm Chướng', 'Đà Lạt', '0123456789', 'abc@gmail.com', '- Ruby\n- Java', '3 years', NULL, NULL, NULL, NULL, 0, 1, 0),
(17, 'Võ Thị Tám', 'Bến Tre', '0123456789', 'abc@gmail.com', '- .NET\n- Ruby\n- Android', '8 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(18, 'Tô Thị Màu', 'Bạc Liêu', '0123456789', 'abc@gmail.com', 'Android', '2 years', NULL, NULL, NULL, NULL, 0, 1, 0),
(19, 'Lương Thị Nam', 'Bình Định', '0123456789', 'abc@gmail.com', '- PHP\n- Java\n- IOS', '7 years', NULL, NULL, NULL, NULL, 0, 1, 1),
(20, 'Trần Thị Mạnh', 'Buôn Mê Thuộc', '0123456789', 'ngongocnhan.95@gmail.com', '- PHP\n- .NET', '1 year', NULL, NULL, NULL, NULL, 0, 1, 0),
(21, 'Nathan', 'Quang Ngai', '0971620629', 'ngongocnhan.95@gmail.com', ' - PHP - Java - .Net', 'More 2 years', '1970-01-01', '2017-02-25', '', '1995-12-01', 0, 1, 0),
(22, 'Nathan Ngo', 'Quang Ngai', '0971620629', 'ngongocnhan.95@gmail.com', ' - PHP - JAVA - .NET', 'More 2 years', '1970-01-01', '2017-02-01', NULL, '2017-07-10', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE `History` (
  `idHistory` int(11) NOT NULL,
  `idEngineer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idProject` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idTeam` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfJoining` date NOT NULL,
  `expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`idHistory`, `idEngineer`, `idProject`, `idTeam`, `role`, `DateOfJoining`, `expire`) VALUES
(10, '1', '', '5', 'coder', '2017-06-07', '2017-06-21'),
(12, '5', '', '4', 'manger', '2017-06-24', '2017-07-25'),
(14, '14', '', '3', 'tester', '2017-06-30', NULL),
(15, '12', '', '1', 'coder', '2017-06-22', '2017-07-06'),
(16, '20', '', '5', 'coder', '2017-05-02', '2017-06-02'),
(18, '11', '', '3', 'manager	', '2017-06-25', NULL),
(19, '13', '', '6', 'coder', '2017-06-23', '2017-07-25'),
(21, '9', '', '3', 'tester', '2017-06-21', NULL),
(22, '15', '', '3', 'tester', '2017-07-11', NULL),
(23, '2', '', '1', 'coder', '2017-05-16', '2017-06-05'),
(25, '19', '', '3', 'coder', '2017-07-12', NULL),
(30, '8', '', '6', 'manager', '2017-05-16', '2017-07-25'),
(31, '1', '', '6', 'coder', '2017-07-19', '2017-07-19'),
(32, '6', '9', '6', 'coder', '2017-07-19', '2017-07-25'),
(33, '3', '8', '4', 'coder', '2017-07-25', '2017-07-26'),
(34, '4', '8', '4', 'coder', '2017-07-25', NULL),
(35, '10', '8', '4', 'coder', '2017-07-25', NULL),
(36, '2', '8', '4', 'coder', '2017-07-25', NULL),
(37, '5', '8', '4', 'coder', '2017-07-25', NULL),
(38, '12', '8', '4', 'coder', '2017-07-25', NULL),
(39, '6', '8', '4', 'coder', '2017-07-26', NULL),
(40, '3', '10', '2', 'coder', '2017-07-28', '2017-07-28'),
(41, '7', '10', '2', 'coder', '2017-07-28', '2017-07-28'),
(42, '17', '10', '2', 'coder', '2017-07-28', NULL),
(43, '8', '10', '2', 'coder', '2017-07-28', '2017-07-28'),
(44, '16', '10', '2', 'coder', '2017-07-28', '2017-07-28'),
(45, '7', '10', '2', 'coder', '2017-07-28', '2017-07-28'),
(46, '13', '10', '2', 'coder', '2017-07-28', NULL),
(47, '7', '7', '1', 'coder', '2017-07-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `idProject` int(10) NOT NULL,
  `projectName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `techSkill` text COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBegin` date NOT NULL,
  `dateOfEnd` date NOT NULL,
  `customer_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idTeam` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`idProject`, `projectName`, `status`, `techSkill`, `dateOfBegin`, `dateOfEnd`, `customer_code`, `idTeam`) VALUES
(1, 'Engineers Management', 0, 'PHP', '2017-06-05', '2017-06-21', 'Avalon', ''),
(2, 'Devices Management', 0, 'Java', '2017-04-04', '2017-06-05', 'Dallas', '3'),
(3, 'Job Seeking Website', 0, '.NET', '2017-06-14', '2017-07-31', 'Ohama', ''),
(4, 'Faster Shopping on Mobile', 0, 'Android', '2017-06-11', '2017-08-05', 'Houston', ''),
(5, 'Faster Shopping on Mobile', 0, 'IOS', '2017-06-11', '2017-08-05', 'Sioux', ''),
(6, 'Human Resource System', 0, 'Java', '2017-05-15', '2017-07-06', 'Dakota', ''),
(7, 'City Parking Finder', 0, 'Java', '2017-07-07', '2017-09-21', 'Mateo', '1'),
(8, 'City Parking Finder', 0, 'Java', '2017-07-07', '2017-09-21', 'Boston', '4'),
(9, 'City Parking Finder', 0, 'Java', '2017-07-07', '2017-09-21', 'Fox', 'T00T006'),
(10, 'Catching Bus', 1, 'Java', '2016-12-04', '2017-01-21', 'Canyon', '2'),
(11, 'Animals Management in Zoo', 0, 'Ruby', '2017-06-19', '2017-08-18', 'Chicago', ''),
(12, 'Workout Everyday', 0, '.NET', '2017-06-09', '2017-10-21', 'Austin', ''),
(14, 'Storyteller App for Kids', 0, 'Android', '2017-06-15', '2017-11-04', 'San Jose', ''),
(15, 'Where did I go today?', 0, 'IOS', '2017-07-06', '2017-09-22', 'Denver', ''),
(16, 'Where did I go today?', 0, 'Android', '2017-07-06', '2017-09-22', 'Detroit', ''),
(17, 'Random Chat', 0, 'PHP', '2017-03-13', '2017-06-02', 'Miami', ''),
(18, 'Personal Timeline', 0, 'Ruby', '2017-05-11', '2017-08-04', 'Phoenix', ''),
(19, 'Find the nearest public toilet', 0, 'IOS', '2017-06-05', '2017-09-16', 'Atlanta', ''),
(20, 'Grocery near me', 0, 'PHP', '2016-06-05', '2016-08-04', 'Baltimore', ''),
(22, 'java', 1, 'Java', '2017-07-20', '2017-07-21', 'noname', '');

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE `Team` (
  `idTeam` int(10) NOT NULL,
  `teamName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `techSkill` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`idTeam`, `teamName`, `techSkill`, `status`, `TimeStamp`) VALUES
(1, 'JAVA', 'Java', 'Assigned', '2017-07-17 11:02:00'),
(2, 'Android', 'Android', 'Assigned', '2017-07-17 11:02:00'),
(3, 'IOS', 'IOS', 'Assigned', '2017-07-17 11:02:00'),
(4, '.NET', '.NET', 'Assigned', '2017-07-17 11:02:00'),
(5, 'PHP', 'PHP', 'New', '2017-07-17 11:02:00'),
(6, 'Ruby', 'Ruby', 'Assigned', '2017-07-17 11:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `Technical`
--

CREATE TABLE `Technical` (
  `idTech` int(5) NOT NULL,
  `Technical` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Technical`
--

INSERT INTO `Technical` (`idTech`, `Technical`) VALUES
(1, 'Java'),
(2, 'Android'),
(3, '.NET'),
(4, 'IOS'),
(5, 'Ruby'),
(6, 'PHP'),
(7, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_17_150936_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `miniUser`
--

CREATE TABLE `miniUser` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ngongocnhan.95@gmail.com', '$2y$10$n1xSaZm1R16sEygBiT7JEuU8PY5aLCe/jfoZIvet3IKVCO3BXATTi', '2017-07-04 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ngongocnhan.95@gmail.com', '$2y$10$sCuacLIjIg1DpZY46e.6yeGVO0WgL6Xd037WJdPTTJwp6IWqE3.S.', 'HRm02wblCLEnGL6thmhHuBYQH90R8KriTp0uSgiisRBFvFX5sRzY99uWpquo', NULL, '2017-07-04 09:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Engineer`
--
ALTER TABLE `Engineer`
  ADD PRIMARY KEY (`idEngineer`);

--
-- Indexes for table `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`idHistory`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`idProject`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`idTeam`);

--
-- Indexes for table `Technical`
--
ALTER TABLE `Technical`
  ADD PRIMARY KEY (`idTech`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miniUser`
--
ALTER TABLE `miniUser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Engineer`
--
ALTER TABLE `Engineer`
  MODIFY `idEngineer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `History`
--
ALTER TABLE `History`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `idProject` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Team`
--
ALTER TABLE `Team`
  MODIFY `idTeam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `miniUser`
--
ALTER TABLE `miniUser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
