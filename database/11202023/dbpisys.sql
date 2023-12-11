-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 09:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpisys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbliar`
--

CREATE TABLE `tbliar` (
  `iar_id` int(50) NOT NULL,
  `iar_po_id` int(11) NOT NULL,
  `iar_po_number` varchar(50) NOT NULL,
  `iar_supplier` varchar(50) NOT NULL,
  `entity_name` varchar(10) NOT NULL,
  `iar_number` varchar(50) NOT NULL,
  `iar_date` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `fund_cluster` varchar(30) NOT NULL,
  `office_dept` varchar(50) NOT NULL,
  `rcc` varchar(30) NOT NULL,
  `inspection_officer` varchar(50) NOT NULL,
  `inspection_date` varchar(50) NOT NULL,
  `acceptance_custodian` varchar(50) NOT NULL,
  `acceptance_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblics`
--

CREATE TABLE `tblics` (
  `ics_id` int(255) NOT NULL,
  `ics_po_id` int(50) NOT NULL,
  `ics_supplier` varchar(100) NOT NULL,
  `ics_iar_no` varchar(30) NOT NULL,
  `ics_total_cost` varchar(100) NOT NULL,
  `ics_amount` int(100) NOT NULL,
  `ics_no` varchar(30) NOT NULL,
  `ics_fund` varchar(20) NOT NULL,
  `ics_date` varchar(20) NOT NULL,
  `ics_useful_life` varchar(20) NOT NULL,
  `ics_receivedby` varchar(50) NOT NULL,
  `ics_received_date` varchar(20) NOT NULL,
  `ics_receivedfrom` varchar(50) NOT NULL,
  `ics_receivedfrom_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblics_rsepi`
--

CREATE TABLE `tblics_rsepi` (
  `id` int(30) NOT NULL,
  `icsrsepi_po_id` int(30) NOT NULL,
  `rsepi_property_no` varchar(30) NOT NULL,
  `returned` varchar(50) NOT NULL,
  `reissued` varchar(50) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `disposal_reason` varchar(50) NOT NULL,
  `date_disposed` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpar`
--

CREATE TABLE `tblpar` (
  `par_id` int(50) NOT NULL,
  `par_po_id` int(50) NOT NULL,
  `par_supplier` varchar(255) NOT NULL,
  `par_iarno` varchar(30) NOT NULL,
  `par_total_cost` varchar(100) NOT NULL,
  `par_amount` int(100) NOT NULL,
  `par_no` varchar(100) NOT NULL,
  `par_fund` varchar(255) NOT NULL,
  `par_date` varchar(30) NOT NULL,
  `par_useful_life` varchar(255) NOT NULL,
  `par_receivedby` varchar(255) NOT NULL,
  `par_received_date` varchar(30) NOT NULL,
  `par_receivedfrom` varchar(255) NOT NULL,
  `par_receivedfrom_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpo`
--

CREATE TABLE `tblpo` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `pr_number` varchar(50) NOT NULL,
  `pgr_number` varchar(50) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `po_date` date NOT NULL,
  `made_of_procurment` varchar(255) NOT NULL,
  `total_cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpo_item`
--

CREATE TABLE `tblpo_item` (
  `id` int(11) NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `po_number` varchar(50) NOT NULL,
  `pr_number` varchar(50) NOT NULL,
  `pgr_number` varchar(50) NOT NULL,
  `item_no` int(25) NOT NULL,
  `property_no` varchar(255) NOT NULL,
  `quantity` int(25) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `item_description` varchar(1000) NOT NULL,
  `unit_cost` varchar(50) NOT NULL,
  `total_unit_cost` varchar(50) NOT NULL,
  `useful_life` varchar(20) NOT NULL,
  `date_acquired` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`) VALUES
(3, 'MARLON', 'ELLOSO', 'ellosomarlon47@slsu.edu.ph', '$2y$10$YUDWfTwmew0Szkym12F2muvkds7amFpgN8kpjYoGTwryknoSfvdfe', 'Admin'),
(4, 'alvin', 'salvacion', 'alvin@slsu.edu.ph', '$2y$10$YdNiG/5EX9Az1HeJo1CJl.cIo8iKmGpGa/1VIrY4k5hPzmgB2ntZq', 'Admin'),
(7, 'Juan', 'Dela Cruz', 'juan@slsu.edu.ph', '$2y$10$21ayuY23zXk/WTP7kKU0ueiitacAqvmYD68qPtdK3IfNqM0Mtxqoy', 'Admin'),
(10, 'test1', 'test1', 'test1@slsu.edu.ph', '$2y$10$QlvYpzbasQ1dEmupAHRzYuEfsufv9JgVdDFOMcmSSC5Hm0Khy196e', 'User'),
(15, 'test2', 'test2', 'test2@slsu.edu.ph', '$2y$10$TDu4BHQr25PtrE..wPvxiuqkkEq1lFE9ka8tfbctxBWhSzfpxMONi', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbliar`
--
ALTER TABLE `tbliar`
  ADD PRIMARY KEY (`iar_id`);

--
-- Indexes for table `tblics`
--
ALTER TABLE `tblics`
  ADD PRIMARY KEY (`ics_id`);

--
-- Indexes for table `tblics_rsepi`
--
ALTER TABLE `tblics_rsepi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpar`
--
ALTER TABLE `tblpar`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `tblpo`
--
ALTER TABLE `tblpo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_number` (`po_number`),
  ADD UNIQUE KEY `pr_number` (`pr_number`),
  ADD UNIQUE KEY `po_id` (`po_id`);

--
-- Indexes for table `tblpo_item`
--
ALTER TABLE `tblpo_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbliar`
--
ALTER TABLE `tbliar`
  MODIFY `iar_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tblics`
--
ALTER TABLE `tblics`
  MODIFY `ics_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblics_rsepi`
--
ALTER TABLE `tblics_rsepi`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tblpar`
--
ALTER TABLE `tblpar`
  MODIFY `par_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpo`
--
ALTER TABLE `tblpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tblpo_item`
--
ALTER TABLE `tblpo_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
