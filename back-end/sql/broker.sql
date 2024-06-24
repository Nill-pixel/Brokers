-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 04:46 PM
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
(7, 'Stark San', '', 'stark@gmail.com', '$2y$10$NxmcNbDRrMIRbNVT98vqt.Sqvy0FZTjS.R6OKfoU5AQErFlpOnRui', NULL, NULL),
(9, 'Zaunita zau', '', 'zaunita@gmail.com', '$2y$10$1xuF8rsxzL8noXkOmoTmCec5gROuOBU2QPmV.dFSaEMlxsdQm104q', '2024-06-06 13:49:39', NULL),
(10, 'Nilvany', 'Sunguessungue', 'nilvanytiago@gmail.com', '$2y$10$moTNxDE5IkfCNaQhmGsxwe6opMgmomP/BGbIxign67l79V1eRtoFe', '2024-06-07 16:15:00', '2024-06-08 13:09:54'),
(12, 'Himel Fern', '', 'nil@gmail.com', '$2y$10$MvO48RLbbh9MdWyZzZNSGuz80NqHUT.W9mLI43w06vorxiRv.sSnq', '2024-06-07 16:31:03', NULL);

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
(2, 7, 0.00, NULL, NULL),
(4, 9, 0.00, NULL, NULL),
(5, 10, 0.00, NULL, NULL),
(6, 12, 0.00, '2024-06-07 16:31:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `employees` (`id`, `name`, `admission_date`, `resignation_date`, `phone`, `base_salary`, `created_at`, `updated_at`) VALUES
(2, 'Antonio Mateus', '2023-01-15', '2024-05-20', '+55123456789', 5000.00, '2024-06-24 14:45:10', NULL);

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
(1, 7, 2, '2024-06-24 15:07:46', NULL);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `portfolio_stocks_portfolio_id_foreign` (`portfolio_id`),
  ADD KEY `portfolio_stocks_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `portfolio_values`
--
ALTER TABLE `portfolio_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_values_portfolio_id_foreign` (`portfolio_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client_current_accounts`
--
ALTER TABLE `client_current_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_commissions`
--
ALTER TABLE `employee_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_stocks`
--
ALTER TABLE `portfolio_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_values`
--
ALTER TABLE `portfolio_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
