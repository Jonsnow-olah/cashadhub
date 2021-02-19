-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 10:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashad_hub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_activation`
--

CREATE TABLE `cashad_hub_activation` (
  `id` int(11) NOT NULL,
  `userid` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `activation` char(50) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_admin`
--

CREATE TABLE `cashad_hub_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_swedish_ci NOT NULL,
  `role` char(50) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_admin`
--

INSERT INTO `cashad_hub_admin` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'Taiwo Sarafa Aderemi', 'aderemi641', 'taderemi93@gmail.com', 'e464fe0cf465a9df14d6c65f30717b865bdb2b6c', 'mode'),
(3, 'Joe Smith Doe', 'smith90', 'taderemi93876@gmail.com', 'e464fe0cf465a9df14d6c65f30717b865bdb2b6c', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_ads_payment`
--

CREATE TABLE `cashad_hub_ads_payment` (
  `id` int(11) NOT NULL,
  `ad_id` char(20) COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `payment_mode` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `duration` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `whatsapp_image` blob NOT NULL,
  `facebook_image` blob NOT NULL,
  `instagram_image` blob NOT NULL,
  `coupon` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` char(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_advert_company`
--

CREATE TABLE `cashad_hub_advert_company` (
  `id` int(11) NOT NULL,
  `userid` int(50) DEFAULT NULL,
  `company_name` varchar(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `company_email` varchar(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `company_phone` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `company_address` text COLLATE latin1_swedish_ci DEFAULT NULL,
  `service_rendered` varchar(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `year_establish` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_advert_company`
--

INSERT INTO `cashad_hub_advert_company` (`id`, `userid`, `company_name`, `company_email`, `company_phone`, `company_address`, `service_rendered`, `year_establish`) VALUES
(1, 1364, 'T and K Fashion Design', 'tandkfashion@gmail.com', '080345678', 'Oke, gada Ede, Osun State', 'Fashion Designer', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_advert_user`
--

CREATE TABLE `cashad_hub_advert_user` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_swedish_ci NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_advert_user`
--

INSERT INTO `cashad_hub_advert_user` (`id`, `userid`, `name`, `phone`, `email`, `username`, `password`, `date_register`) VALUES
(1, '1364', 'Taiwo Sarafa Aderemi', '+2348030891417', 'taderemi93@gmail.com', 'aderemi641', 'e464fe0cf465a9df14d6c65f30717b865bdb2b6c', '2020-07-12 15:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_bonus`
--

CREATE TABLE `cashad_hub_bonus` (
  `id` int(11) NOT NULL,
  `userid` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `status` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_bonus`
--

INSERT INTO `cashad_hub_bonus` (`id`, `userid`, `amount`, `status`, `date`) VALUES
(1, '200', 0, '', '2020-08-11 16:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_ledger`
--

CREATE TABLE `cashad_hub_ledger` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
  `withdraw` bigint(20) NOT NULL,
  `savings` bigint(20) NOT NULL,
  `bonus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_ledger`
--

INSERT INTO `cashad_hub_ledger` (`id`, `userid`, `withdraw`, `savings`, `bonus`) VALUES
(1, '139027', 0, 0, 0),
(2, '335644', 1000, 1000, 0),
(3, '882146', 1000, 1000, 0),
(4, '576155', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_levels`
--

CREATE TABLE `cashad_hub_levels` (
  `id` int(11) NOT NULL,
  `level` char(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `payment` bigint(50) NOT NULL,
  `withdraw` bigint(20) NOT NULL,
  `savings` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_levels`
--

INSERT INTO `cashad_hub_levels` (`id`, `level`, `payment`, `withdraw`, `savings`) VALUES
(1, 'Starter', 500, 1000, 1000),
(2, 'Regular', 1000, 2000, 2000),
(3, 'Standard', 2000, 4000, 4000),
(4, 'Premium', 4000, 6000, 6000),
(5, 'Classic', 6000, 10000, 8000),
(6, 'Pro', 10000, 15000, 10000),
(7, 'Ultimate', 15000, 24000, 15000),
(8, 'Master', 24000, 50000, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_merge`
--

CREATE TABLE `cashad_hub_merge` (
  `id` int(11) NOT NULL,
  `userid` char(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` bigint(50) NOT NULL,
  `type` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `status` char(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `merge` char(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `count` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_merge` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `payment` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_merge`
--

INSERT INTO `cashad_hub_merge` (`id`, `userid`, `amount`, `type`, `status`, `level`, `merge`, `count`, `date_time`, `date_merge`, `payment`) VALUES
(4, '139027', 1000, 'Payout', 'Pending', 2, 'nill', 0, '2020-08-11 10:01:47', '', 0),
(5, '576155', 500, 'Payout', 'Pending', 1, 'nill', 0, '2020-08-11 15:16:47', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_payment`
--

CREATE TABLE `cashad_hub_payment` (
  `id` int(11) NOT NULL,
  `payer` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
  `beneficiary` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `file` blob NOT NULL,
  `paid` int(11) NOT NULL,
  `received` int(11) NOT NULL,
  `action` char(20) CHARACTER SET latin1 NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `promotion` varchar(100) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_payment`
--

INSERT INTO `cashad_hub_payment` (`id`, `payer`, `beneficiary`, `amount`, `file`, `paid`, `received`, `action`, `date_upload`, `promotion`) VALUES
(1, '882146', '139027', 500, 0x3633323033332e6a7067, 1, 1, 'Approved', '2020-08-11 09:35:58', ''),
(2, '335644', '139027', 500, 0x3738373530392e6a7067, 1, 1, 'Approved', '2020-08-11 09:58:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_promotion`
--

CREATE TABLE `cashad_hub_promotion` (
  `id` int(11) NOT NULL,
  `userid` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `promotion` varchar(100) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_promotion`
--

INSERT INTO `cashad_hub_promotion` (`id`, `userid`, `promotion`) VALUES
(3, '882146', 'August 12, 2020 10:42:49\r\n'),
(4, '335644', 'August 11, 2020 22:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_ref`
--

CREATE TABLE `cashad_hub_ref` (
  `id` int(11) NOT NULL,
  `refuserid` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `inviteduserid` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `status` char(50) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_ref`
--

INSERT INTO `cashad_hub_ref` (`id`, `refuserid`, `inviteduserid`, `status`) VALUES
(1, '139027', '576155', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_users`
--

CREATE TABLE `cashad_hub_users` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
  `dob` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `gender` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `state` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_swedish_ci NOT NULL,
  `passport` blob NOT NULL,
  `reg_date` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `status` char(20) COLLATE latin1_swedish_ci NOT NULL,
  `level` int(11) NOT NULL,
  `acstatus` char(50) COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_users`
--

INSERT INTO `cashad_hub_users` (`id`, `userid`, `name`, `email`, `phone`, `dob`, `gender`, `state`, `username`, `password`, `passport`, `reg_date`, `status`, `level`, `acstatus`) VALUES
(1, '139027', 'Taiwo Sarafa Aderemi', 'taderemi93@gmail.com', '08030891417', '2020-08-11', 'male', 'Delta', 'aderemi641', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0x3133393032372e6a7067, '1596985949', 'Suspended', 2, 'Activated'),
(2, '335644', 'Adepoju Shukurat Ajoke', 'aderemi.s641@gmail.com', '08023340987', '2020-08-04', 'male', 'Delta', 'aderemi642', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0x3333353634342e6a7067, '1596986310', 'Active', 1, 'Activated'),
(3, '882146', 'Sarafa Aderemi Ahmad', 'aderemi43@gmail.com', '08066234872', '2020-08-09', 'male', 'Bauchi', 'aderemi644', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0x3838323134362e6a7067, '1596986461', 'Active', 1, 'Activated'),
(4, '576155', 'Emeka Jhon', 'emeka@gmail.com', '08077623452', '2020-09-11', 'male', 'Edo', 'emeka1234', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0x3537363135352e6a7067, '1597157449', 'Active', 1, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `cashad_hub_user_bank`
--

CREATE TABLE `cashad_hub_user_bank` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
  `account_name` varchar(100) COLLATE latin1_swedish_ci NOT NULL,
  `account_num` char(50) COLLATE latin1_swedish_ci NOT NULL,
  `bank_name` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_updated` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashad_hub_user_bank`
--

INSERT INTO `cashad_hub_user_bank` (`id`, `userid`, `account_name`, `account_num`, `bank_name`, `phone`, `date_updated`) VALUES
(1, '139027', 'Adekilekun Taiwo O', '3050836285', 'First Bank', '08030891417', NULL),
(2, '335644', 'Babalola Taiwo O', '0987346723', 'GTB', '08023340987', NULL),
(3, '882146', 'Ayodele Taiwo', '0387623455', 'GTB', '08066234872', NULL),
(4, '576155', 'Emeka Jhon', '0976238734', 'GTB', '08077623452', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashad_hub_activation`
--
ALTER TABLE `cashad_hub_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_admin`
--
ALTER TABLE `cashad_hub_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cashad_hub_ads_payment`
--
ALTER TABLE `cashad_hub_ads_payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_id` (`ad_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cashad_hub_advert_company`
--
ALTER TABLE `cashad_hub_advert_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_advert_user`
--
ALTER TABLE `cashad_hub_advert_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `cashad_hub_bonus`
--
ALTER TABLE `cashad_hub_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_ledger`
--
ALTER TABLE `cashad_hub_ledger`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`userid`);

--
-- Indexes for table `cashad_hub_levels`
--
ALTER TABLE `cashad_hub_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_merge`
--
ALTER TABLE `cashad_hub_merge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_payment`
--
ALTER TABLE `cashad_hub_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_promotion`
--
ALTER TABLE `cashad_hub_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_ref`
--
ALTER TABLE `cashad_hub_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashad_hub_users`
--
ALTER TABLE `cashad_hub_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cashad_hub_user_bank`
--
ALTER TABLE `cashad_hub_user_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`userid`),
  ADD UNIQUE KEY `accunt_num` (`account_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashad_hub_activation`
--
ALTER TABLE `cashad_hub_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cashad_hub_admin`
--
ALTER TABLE `cashad_hub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashad_hub_ads_payment`
--
ALTER TABLE `cashad_hub_ads_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashad_hub_advert_company`
--
ALTER TABLE `cashad_hub_advert_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashad_hub_advert_user`
--
ALTER TABLE `cashad_hub_advert_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashad_hub_bonus`
--
ALTER TABLE `cashad_hub_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashad_hub_ledger`
--
ALTER TABLE `cashad_hub_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashad_hub_levels`
--
ALTER TABLE `cashad_hub_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cashad_hub_merge`
--
ALTER TABLE `cashad_hub_merge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cashad_hub_payment`
--
ALTER TABLE `cashad_hub_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashad_hub_promotion`
--
ALTER TABLE `cashad_hub_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashad_hub_ref`
--
ALTER TABLE `cashad_hub_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashad_hub_users`
--
ALTER TABLE `cashad_hub_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashad_hub_user_bank`
--
ALTER TABLE `cashad_hub_user_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
