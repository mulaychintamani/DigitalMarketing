-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 05:55 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nishi_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `nishi_transaction_log`
--

CREATE TABLE `nishi_transaction_log` (
  `trans_id` int(11) NOT NULL,
  `trans_user_id` int(11) NOT NULL,
  `trans_service` varchar(300) DEFAULT NULL,
  `trans_action` enum('Add','Remove') NOT NULL,
  `trans_old_creadit` int(11) NOT NULL,
  `trans_trans_creadit` int(11) NOT NULL,
  `trans_new_creadit` int(11) NOT NULL,
  `trans_tansaction_by` int(11) NOT NULL,
  `trans_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nishi_transaction_log`
--

INSERT INTO `nishi_transaction_log` (`trans_id`, `trans_user_id`, `trans_service`, `trans_action`, `trans_old_creadit`, `trans_trans_creadit`, `trans_new_creadit`, `trans_tansaction_by`, `trans_created_at`) VALUES
(1, 1, '2', 'Remove', 23, 43, 23, 23, '2018-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nishi_user`
--

CREATE TABLE `nishi_user` (
  `user_id` int(11) NOT NULL,
  `user_type` enum('Admin','Reseller','User') DEFAULT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_client_name` varchar(500) NOT NULL,
  `user_company` varchar(300) DEFAULT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_mobile` int(13) NOT NULL,
  `user_acc_type` enum('Demo','Active') NOT NULL,
  `user_service_details_id` int(11) DEFAULT NULL,
  `user_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nishi_user`
--

INSERT INTO `nishi_user` (`user_id`, `user_type`, `user_name`, `user_password`, `user_client_name`, `user_company`, `user_email`, `user_mobile`, `user_acc_type`, `user_service_details_id`, `user_created_at`, `user_updated_at`) VALUES
(1, 'Admin', 'admin', 'admin123', 'SomeName ', '', 'admin@gmail.com', 2147483647, 'Active', 1, NULL, '2018-01-26 11:11:25'),
(2, 'Reseller', 'reseller', 'reseller123', 'ad', 'asd', 'asd', 2147483647, 'Active', 1, '2018-01-22 11:13:24', '2018-01-26 11:11:11'),
(3, 'User', 'user', 'user123', 'dsf', 'sdf', 'sdf', 2334234, 'Demo', 1, '2018-01-26 00:11:51', '2018-01-26 11:13:00'),
(4, NULL, 'asd', 'asd', 'asd', 'asd', 'sdf@ad.in', 2147483647, 'Active', NULL, '2018-01-28 15:19:50', NULL),
(6, NULL, 'asdff', 'asd', 'asd', 'asd', 'asd', 234234234, 'Demo', NULL, '2018-01-28 15:20:43', NULL),
(7, NULL, 'asdad', 'asdadd', 'asdasd', 'asdasd', 'asdasd', 2147483647, 'Demo', NULL, '2018-01-28 15:43:22', NULL),
(8, NULL, 'adadsa', 'asdasd', 'asdasd', 'asd', 'asd', 2147483647, 'Demo', NULL, '2018-01-28 15:44:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nishi_user_credit`
--

CREATE TABLE `nishi_user_credit` (
  `credit_id` int(11) NOT NULL,
  `credit_user_id` int(11) NOT NULL,
  `credit_amount` int(11) NOT NULL,
  `credit_service` enum('Whatsapp','SMS','Voice Call','Filter') NOT NULL,
  `credit_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `credit_updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nishi_user_credit`
--

INSERT INTO `nishi_user_credit` (`credit_id`, `credit_user_id`, `credit_amount`, `credit_service`, `credit_created_at`, `credit_updated_at`) VALUES
(4, 8, 11, 'Whatsapp', '2018-01-28 15:44:13', NULL),
(5, 8, 22, 'Filter', '2018-01-28 15:44:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nishi_whatsapp`
--

CREATE TABLE `nishi_whatsapp` (
  `what_id` int(11) NOT NULL,
  `what_user_id` int(11) NOT NULL,
  `what_type` enum('Message','Media','Filtering') NOT NULL,
  `what_media_type` enum('Image','Audio','Video','PDF') DEFAULT NULL,
  `what_media_file_path` varchar(3000) DEFAULT NULL,
  `what_caption` varchar(1000) DEFAULT NULL,
  `what_text` varchar(10000) DEFAULT NULL,
  `what_camp_num_type` enum('Numbers','File','List') NOT NULL,
  `what_list_number` varchar(10000) DEFAULT NULL,
  `what_list_file_path` varchar(1000) DEFAULT NULL,
  `what_list_list_id` int(11) DEFAULT NULL,
  `what_camp_start_datetime` datetime DEFAULT NULL,
  `what_created_at` timestamp NULL DEFAULT NULL,
  `what_updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nishi_transaction_log`
--
ALTER TABLE `nishi_transaction_log`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `nishi_user`
--
ALTER TABLE `nishi_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `nishi_user_credit`
--
ALTER TABLE `nishi_user_credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `nishi_whatsapp`
--
ALTER TABLE `nishi_whatsapp`
  ADD PRIMARY KEY (`what_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nishi_transaction_log`
--
ALTER TABLE `nishi_transaction_log`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nishi_user`
--
ALTER TABLE `nishi_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nishi_user_credit`
--
ALTER TABLE `nishi_user_credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nishi_whatsapp`
--
ALTER TABLE `nishi_whatsapp`
  MODIFY `what_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
