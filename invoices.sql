-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoices`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_address` text NOT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `notes` text DEFAULT NULL,
  `line_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`line_items`)),
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `company_name`, `company_address`, `client_name`, `client_email`, `client_address`, `gst_number`, `issue_date`, `due_date`, `notes`, `line_items`, `total`, `created_at`, `updated_at`, `company_logo`) VALUES
(5, 'INV-1752147410', 'Chetu India Pvt Ltd', 'H6 Noida 63', 'ABN', 'abninspire@gmail.com', 'USA', '2434234', '2025-07-06', '2025-07-08', 'Good', '\"[{\\\"description\\\":\\\"Dealership\\\",\\\"hsn\\\":\\\"34242342\\\",\\\"quantity\\\":\\\"12\\\",\\\"unit_price\\\":\\\"200\\\",\\\"tax\\\":\\\"5\\\"}]\"', 2520.00, '2025-07-10 06:06:50', '2025-07-10 06:06:50', 'logos/5tthWHG5AFAlOUU2JtdlSmYblFjTmjmzSn45i3kZ.jpg'),
(6, 'INV-1752147779', 'Infosys', 'Noida sector 1', 'Adobee', 'adobe@gmail.com', 'Delhi', '3424234', '2025-07-02', '2025-07-03', 'grreaergerge', '\"[{\\\"description\\\":\\\"frdrfgfgrw\\\",\\\"hsn\\\":\\\"23232\\\",\\\"quantity\\\":\\\"23\\\",\\\"unit_price\\\":\\\"24\\\",\\\"tax\\\":\\\"5\\\"}]\"', 579.60, '2025-07-10 06:12:59', '2025-07-10 06:12:59', 'logos/cWvMSoq9ynhJ8RDrBB8O65I44hkeYYg80azsBCXt.jpg'),
(7, 'INV-1752147881', 'TCS', 'Noida Sector 2', 'Axiz bank', 'axis@gmail.com', 'Delhi 123', '14423433', '2025-07-05', '2025-07-08', 'Ask the quantity', '\"[{\\\"description\\\":\\\"Mobile App\\\",\\\"hsn\\\":\\\"221324\\\",\\\"quantity\\\":\\\"21\\\",\\\"unit_price\\\":\\\"400\\\",\\\"tax\\\":\\\"5\\\"}]\"', 8820.00, '2025-07-10 06:14:41', '2025-07-10 06:14:41', 'logos/z3df1uY4Ob5yTASOYA3lL8rfJbILWbqwy5Y70Ny2.jpg'),
(8, 'INV-1752149233', 'Atlas', 'Noida Sector 3', 'ICIC Bank', 'icici@gmail.com', 'Delhi 23', '1442343355', '2025-07-08', '2025-07-09', 'NT sk', '\"[{\\\"description\\\":\\\"Mobile App\\\",\\\"hsn\\\":\\\"22422\\\",\\\"quantity\\\":\\\"45\\\",\\\"unit_price\\\":\\\"400\\\",\\\"tax\\\":\\\"12\\\"}]\"', 20160.00, '2025-07-10 06:37:13', '2025-07-10 06:37:13', 'logos/0kPmuwA7Rfe8zVtB485MFaktKxgfLpBGMnxMxXtX.jpg'),
(9, 'INV-1752149374', 'L&T', 'Noida Sector 5', 'SBI Bank', 'sbi@gmail.com', 'Delehi', '232242422', '2025-06-30', '2025-07-02', 'Software', '\"[{\\\"description\\\":\\\"Applicatio\\\",\\\"hsn\\\":\\\"21332\\\",\\\"quantity\\\":\\\"5\\\",\\\"unit_price\\\":\\\"100\\\",\\\"tax\\\":\\\"5\\\"}]\"', 525.00, '2025-07-10 06:39:34', '2025-07-10 06:39:34', 'logos/sjEOqyFIZuBXVWGfkGZVGJ5V513kHGiNFcGSmF7y.jpg'),
(10, 'INV-1752149475', 'Jaypee Cosmos', 'Delhi 1212', 'Insund Bank', 'indsa@gmail.com', 'Delhi 87', '23224242343', '2025-06-29', '2025-07-02', 'sfvasdgddfa', '\"[{\\\"description\\\":\\\"dwdwqdasd\\\",\\\"hsn\\\":\\\"32424\\\",\\\"quantity\\\":\\\"223\\\",\\\"unit_price\\\":\\\"23\\\",\\\"tax\\\":\\\"3\\\"}]\"', 5282.87, '2025-07-10 06:41:15', '2025-07-10 06:41:15', 'logos/6i5LbwlemQ7z5F0z1eOjxsjO3hisAiJ7F380YnlK.jpg'),
(11, 'INV-1752149726', 'Wipro', 'Noida Sector 7', 'PNB Bank', 'pnb@gmail.com', 'Delhi dwarak', '243243333', '2025-06-29', '2025-07-06', 'Its is', '\"[{\\\"description\\\":\\\"Software\\\",\\\"hsn\\\":\\\"21321321\\\",\\\"quantity\\\":\\\"120\\\",\\\"unit_price\\\":\\\"300\\\",\\\"tax\\\":\\\"5\\\"}]\"', 37800.00, '2025-07-10 06:45:26', '2025-07-10 06:45:26', 'logos/vePWj9WfOXotj5c6QCtKTt8eKD4Vg3i1xVIfkQmK.jpg'),
(12, 'INV-1752149814', 'Tata Steel', 'Noida Sector 12', 'Adobee', 'adobe@gmail.com', 'dqwfqwefqwefqwef', '432423432424', '2025-06-30', '2025-07-08', 'Ask', '\"[{\\\"description\\\":\\\"weq\\\",\\\"hsn\\\":\\\"2323\\\",\\\"quantity\\\":\\\"12\\\",\\\"unit_price\\\":\\\"10000\\\",\\\"tax\\\":\\\"5\\\"}]\"', 126000.00, '2025-07-10 06:46:54', '2025-07-10 06:46:54', 'logos/7Cri6Rd4abxjEtTrJWJVDgFNtuo1uRNoMZunxruy.jpg'),
(13, 'INV-1752149936', 'JSW', 'Noida Sector 123', 'Uco Bank', 'uco@gmail.com', 'Lucknow', '24342342323', '2025-07-02', '2025-06-30', 'saASSA', '\"[{\\\"description\\\":\\\"ASDFG\\\",\\\"hsn\\\":\\\"342\\\",\\\"quantity\\\":\\\"333\\\",\\\"unit_price\\\":\\\"44\\\",\\\"tax\\\":\\\"5\\\"}]\"', 15384.60, '2025-07-10 06:48:56', '2025-07-10 06:48:56', 'logos/6agcTezr8UmWvJoctSOzHwZmNF3sySuFObJS42yD.png'),
(14, 'INV-1752157922', 'Mindtree', 'Village and post Mitthauli', 'Canera Bank', 'canerabank@gmail.com', 'Aligargh', '1234533', '2025-07-07', '2025-07-09', 'Top level', '\"[{\\\"description\\\":\\\"Mobile Application\\\",\\\"hsn\\\":\\\"1232456\\\",\\\"quantity\\\":\\\"12\\\",\\\"unit_price\\\":\\\"400\\\",\\\"tax\\\":\\\"5\\\"}]\"', 5040.00, '2025-07-10 09:02:02', '2025-07-10 09:02:02', 'logos/vzcnJsvFtMBF2Jv8fUMF1FqluYRtRi65qhLep1X8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_07_09_163258_create_invoices_table', 1),
(5, '2025_07_10_033153_add_company_logo_to_invoices_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
