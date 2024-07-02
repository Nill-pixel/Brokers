-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 10:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_transactions`
--

CREATE TABLE `cash_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('deposit','withdrawal') NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_transactions`
--

INSERT INTO `cash_transactions` (`id`, `portfolio_id`, `type`, `amount`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'deposit', 9900.00, '2024-07-01 20:48:01', '2024-07-01 18:48:01', NULL),
(2, 3, 'deposit', 19800.00, '2024-07-01 20:49:20', '2024-07-01 18:49:20', NULL),
(3, 3, 'deposit', 10200.00, '2024-07-01 22:31:24', '2024-07-01 20:31:24', NULL),
(4, 3, 'deposit', 5190.00, '2024-07-02 19:07:27', '2024-07-02 17:07:27', NULL),
(5, 3, 'deposit', 6180.00, '2024-07-02 19:07:36', '2024-07-02 17:07:36', NULL),
(6, 3, 'deposit', 7170.00, '2024-07-02 19:07:37', '2024-07-02 17:07:37', NULL),
(7, 3, 'deposit', 8160.00, '2024-07-02 19:07:37', '2024-07-02 17:07:37', NULL),
(8, 3, 'deposit', 9150.00, '2024-07-02 19:07:38', '2024-07-02 17:07:38', NULL),
(9, 3, 'deposit', 12120.00, '2024-07-02 19:10:02', '2024-07-02 17:10:02', NULL),
(10, 3, 'deposit', 15090.00, '2024-07-02 19:10:28', '2024-07-02 17:10:28', NULL),
(11, 3, 'deposit', 16080.00, '2024-07-02 19:12:34', '2024-07-02 17:12:34', NULL),
(12, 3, 'deposit', 16179.00, '2024-07-02 19:14:04', '2024-07-02 17:14:04', NULL),
(13, 3, 'deposit', 16188.90, '2024-07-02 19:14:58', '2024-07-02 17:14:58', NULL),
(14, 3, 'deposit', 16198.80, '2024-07-02 19:17:26', '2024-07-02 17:17:26', NULL),
(15, 3, 'deposit', 16208.70, '2024-07-02 19:19:49', '2024-07-02 17:19:49', NULL),
(16, 3, 'deposit', 17198.70, '2024-07-02 19:30:30', '2024-07-02 17:30:30', NULL),
(17, 3, 'deposit', 18188.70, '2024-07-02 19:30:36', '2024-07-02 17:30:36', NULL),
(18, 3, 'deposit', 19178.70, '2024-07-02 19:30:48', '2024-07-02 17:30:48', NULL),
(19, 3, 'deposit', 20168.70, '2024-07-02 19:30:50', '2024-07-02 17:30:50', NULL),
(20, 3, 'deposit', 21158.70, '2024-07-02 19:30:52', '2024-07-02 17:30:52', NULL),
(21, 3, 'deposit', 22148.70, '2024-07-02 19:30:53', '2024-07-02 17:30:53', NULL),
(22, 3, 'deposit', 22247.70, '2024-07-02 19:31:07', '2024-07-02 17:31:07', NULL),
(23, 3, 'deposit', 23237.70, '2024-07-02 19:31:21', '2024-07-02 17:31:21', NULL),
(24, 3, 'deposit', 24227.70, '2024-07-02 19:31:23', '2024-07-02 17:31:23', NULL),
(25, 3, 'deposit', 25217.70, '2024-07-02 19:31:32', '2024-07-02 17:31:32', NULL),
(26, 3, 'deposit', 26207.70, '2024-07-02 19:31:54', '2024-07-02 17:31:54', NULL),
(27, 3, 'deposit', 26217.60, '2024-07-02 19:42:51', '2024-07-02 17:42:51', NULL),
(28, 3, 'deposit', 26227.50, '2024-07-02 19:47:09', '2024-07-02 17:47:09', NULL),
(29, 3, 'deposit', 26237.40, '2024-07-02 19:49:00', '2024-07-02 17:49:00', NULL),
(30, 3, 'deposit', 26336.40, '2024-07-02 19:49:16', '2024-07-02 17:49:16', NULL),
(31, 3, 'deposit', 26435.40, '2024-07-02 20:03:05', '2024-07-02 18:03:05', NULL),
(32, 3, 'withdrawal', 25435.40, '2024-07-02 20:05:13', '2024-07-02 18:05:13', NULL),
(33, 3, 'deposit', 26425.40, '2024-07-02 20:05:22', '2024-07-02 18:05:22', NULL),
(34, 3, 'deposit', 27415.40, '2024-07-02 20:07:55', '2024-07-02 18:07:55', NULL),
(35, 3, 'deposit', 28405.40, '2024-07-02 20:08:31', '2024-07-02 18:08:31', NULL),
(36, 3, 'withdrawal', 24405.40, '2024-07-02 20:08:39', '2024-07-02 18:08:39', NULL),
(37, 3, 'withdrawal', 23405.40, '2024-07-02 19:30:21', '2024-07-02 18:30:21', NULL),
(38, 3, 'withdrawal', 22405.40, '2024-07-02 19:30:58', '2024-07-02 18:30:58', NULL),
(39, 3, 'deposit', 23395.40, '2024-07-02 19:31:32', '2024-07-02 18:31:32', NULL),
(40, 3, 'withdrawal', 22395.40, '2024-07-02 19:34:08', '2024-07-02 18:34:08', NULL),
(41, 3, 'withdrawal', 21395.40, '2024-07-02 20:35:29', '2024-07-02 18:35:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nilvany', 'Sunguessungue', 'sungue@gmail.com', '$2y$10$6m0xMVIDCo38XqkFiV9TX.b4P0/MCSO7nBGtdKcgu4i0TzEmN1ZX6', '2024-07-01 16:55:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_current_accounts`
--

CREATE TABLE `client_current_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_current_accounts`
--

INSERT INTO `client_current_accounts` (`id`, `client_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, 21395.40, '2024-07-01 16:55:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admission_date` date NOT NULL,
  `resignation_date` date DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `base_salary` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `admission_date`, `resignation_date`, `phone`, `base_salary`, `created_at`, `updated_at`) VALUES
(1, 'Antonio Mateus', 'ant@gamil.com', '$2y$10$eMD327sb9keFmkJiv8QbtO3QkdnNnIIj9wnwWz8Iy4M9SLm4Yq.c6', '2023-01-15', '2024-05-20', '+55123456789', 5000.00, '2024-07-01 16:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_commissions`
--

CREATE TABLE `employee_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `commission_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_commissions`
--

INSERT INTO `employee_commissions` (`id`, `employee_id`, `month`, `year`, `commission_amount`, `created_at`, `updated_at`) VALUES
(6, 1, 7, 2024, 100.00, '2024-07-01 19:48:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `client_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2024-07-01 17:47:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_stocks`
--

CREATE TABLE `portfolio_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_stocks`
--

INSERT INTO `portfolio_stocks` (`id`, `portfolio_id`, `stock_id`, `quantity`, `transaction_value`, `created_at`, `updated_at`) VALUES
(6, 3, 2, 6, 1500.00, '2024-07-01 20:36:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_values`
--

CREATE TABLE `portfolio_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_values`
--

INSERT INTO `portfolio_values` (`id`, `portfolio_id`, `date`, `total_value`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-07-01', 27000.00, '2024-07-01 21:14:28', '2024-07-01 21:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('stock','bond') NOT NULL,
  `company` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `face_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `type`, `company`, `designation`, `issue_date`, `face_value`, `created_at`, `updated_at`) VALUES
(1, 'stock', 'Empresa A', 'Ação A', '2020-01-01', 100.00, '2024-06-24 14:40:40', '2024-06-24 14:40:40'),
(2, 'bond', 'Empresa B', 'Obrigação B', '2021-02-01', 500.00, '2024-06-24 14:40:40', '2024-06-24 14:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `stock_quotes`
--

CREATE TABLE `stock_quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `closing_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_quotes`
--

INSERT INTO `stock_quotes` (`id`, `stock_id`, `date`, `closing_price`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-01', 110.00, '2024-06-24 14:42:11', '2024-06-24 14:42:11'),
(2, 1, '2024-06-02', 112.50, '2024-06-24 14:42:11', '2024-06-24 14:42:11'),
(3, 1, '2024-06-03', 108.75, '2024-06-24 14:42:11', '2024-06-24 14:42:11'),
(4, 2, '2024-06-01', 505.00, '2024-06-24 14:42:11', '2024-06-24 14:42:11'),
(5, 2, '2024-06-02', 503.75, '2024-06-24 14:42:11', '2024-06-24 14:42:11'),
(6, 2, '2024-06-03', 510.00, '2024-06-24 14:42:11', '2024-06-24 14:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_stock_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('buy','sell') NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_value` decimal(8,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `initiated_by` enum('client','employee') NOT NULL,
  `initiator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_transactions_portfolio_id_foreign` (`portfolio_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `client_current_accounts`
--
ALTER TABLE `client_current_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_current_accounts_client_id_foreign` (`client_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee_commissions`
--
ALTER TABLE `employee_commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_commissions_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`client_id`);

--
-- Indexes for table `portfolio_stocks`
--
ALTER TABLE `portfolio_stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_portfolio_stock` (`portfolio_id`,`stock_id`),
  ADD KEY `portfolio_stocks_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `portfolio_values`
--
ALTER TABLE `portfolio_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_portfolio_date` (`portfolio_id`,`date`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_quotes`
--
ALTER TABLE `stock_quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_quotes_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_portfolio_stock_id_foreign` (`portfolio_stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_current_accounts`
--
ALTER TABLE `client_current_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_commissions`
--
ALTER TABLE `employee_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio_stocks`
--
ALTER TABLE `portfolio_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolio_values`
--
ALTER TABLE `portfolio_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_quotes`
--
ALTER TABLE `stock_quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
  ADD CONSTRAINT `cash_transactions_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`);

--
-- Constraints for table `client_current_accounts`
--
ALTER TABLE `client_current_accounts`
  ADD CONSTRAINT `client_current_accounts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `employee_commissions`
--
ALTER TABLE `employee_commissions`
  ADD CONSTRAINT `employee_commissions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `portfolios_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `portfolio_stocks`
--
ALTER TABLE `portfolio_stocks`
  ADD CONSTRAINT `portfolio_stocks_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`),
  ADD CONSTRAINT `portfolio_stocks_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`);

--
-- Constraints for table `portfolio_values`
--
ALTER TABLE `portfolio_values`
  ADD CONSTRAINT `portfolio_values_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`);

--
-- Constraints for table `stock_quotes`
--
ALTER TABLE `stock_quotes`
  ADD CONSTRAINT `stock_quotes_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_portfolio_stock_id_foreign` FOREIGN KEY (`portfolio_stock_id`) REFERENCES `portfolio_stocks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
