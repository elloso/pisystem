-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

--
-- Dumping data for table `tbliar`
--

INSERT INTO `tbliar` (`iar_id`, `iar_po_id`, `iar_po_number`, `iar_supplier`, `entity_name`, `iar_number`, `iar_date`, `invoice_number`, `invoice_date`, `fund_cluster`, `office_dept`, `rcc`, `inspection_officer`, `inspection_date`, `acceptance_custodian`, `acceptance_date`) VALUES
(75, 1, '11212023', 'ICS', 'SLSU', '11132022', '2023-11-23', '0232123', '2023-11-23', 'FC', 'MIS', 'RCC', 'Alvin Salvacion', '2023-11-23', 'Reynaldo Danganan', '2023-11-23'),
(76, 2, '11212', 'ICS 2', 'SLSU', '1113202', '2023-11-23', '02321223', '2023-11-23', 'FC', 'MIS', 'RCC', 'Jayven Villanueva', '2023-11-23', 'Reynaldo Danganan', '2023-11-23'),
(77, 3, '1121223', 'Multiple ICS', 'SLSU', '11223', '2023-11-23', '023212223323', '2023-11-30', 'FC', 'MIS', 'RCC', 'Jayven Villanueva', '2023-11-23', 'Reynaldo Danganan', '2023-11-23'),
(78, 4, '111322', 'Sample PAR', 'SLSU', '1113202301', '2023-12-11', '12112023', '2023-12-12', 'FC', 'MIS', 'RCC', '', '', '', ''),
(79, 5, '11132223', 'Sample PAR', 'SLSU', '12112023', '2023-12-11', '12112023123', '2023-12-11', 'FC', 'MIS', 'RCC', '', '', '', '');

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

--
-- Dumping data for table `tblics`
--

INSERT INTO `tblics` (`ics_id`, `ics_po_id`, `ics_supplier`, `ics_iar_no`, `ics_total_cost`, `ics_amount`, `ics_no`, `ics_fund`, `ics_date`, `ics_useful_life`, `ics_receivedby`, `ics_received_date`, `ics_receivedfrom`, `ics_receivedfrom_date`) VALUES
(32, 1, 'ICS', '11132022', '', 0, 'TE23222', 'OBS', '', '', 'Marlon Elloso', '2023-11-23', 'Reynaldo Danganan', '2023-11-30'),
(33, 2, 'ICS 2', '1113202', '', 0, 'Test 123', 'OBS', '', '', 'Reniel Domirez', '2023-11-23', 'Reynaldo Danganan', '2023-11-30'),
(34, 3, 'Multiple ICS', '11223', '', 0, 'Test 3-4', 'OBS', '', '', 'Sherwin Villa', '2023-11-23', 'Reynaldo Danganan', '2023-11-24'),
(35, 4, 'Sample PAR', '1113202301', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblics_rsepi`
--

CREATE TABLE `tblics_rsepi` (
  `id` int(30) NOT NULL,
  `id_tblpo_item` int(30) NOT NULL,
  `icsrsepi_po_id` int(30) NOT NULL,
  `rsepi_property_no` varchar(30) NOT NULL,
  `returned` varchar(50) NOT NULL,
  `reissued` varchar(50) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `disposal_reason` varchar(50) NOT NULL,
  `date_disposed` varchar(30) NOT NULL,
  `date_transfer` varchar(30) NOT NULL,
  `transfer_type` varchar(30) NOT NULL,
  `others_specifiy` varchar(50) NOT NULL,
  `itr_no` int(11) NOT NULL,
  `condition_inventory` varchar(30) NOT NULL,
  `approved` varchar(50) NOT NULL,
  `released` varchar(50) NOT NULL,
  `received` varchar(50) NOT NULL,
  `reason_transfer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblics_rsepi`
--

INSERT INTO `tblics_rsepi` (`id`, `id_tblpo_item`, `icsrsepi_po_id`, `rsepi_property_no`, `returned`, `reissued`, `remarks`, `disposal_reason`, `date_disposed`, `date_transfer`, `transfer_type`, `others_specifiy`, `itr_no`, `condition_inventory`, `approved`, `released`, `received`, `reason_transfer`) VALUES
(186, 230, 1, 'SLSU2023-00001', 'Marlon Elloso', 'Ana Banana', 'Returned', '', '', '2023-11-24', 'Relocate', '', 2024, 'Good', 'Reynaldo Danganan', 'MJ Francisco', 'Ana Banana', ''),
(187, 231, 2, 'SLSU2023-00002', 'Reniel Domirez', 'Jayven Villanueva', 'Re-issued', '', '', '2023-11-23', 'Reassignment', '', 20231, '', 'Reynaldo Danganan', 'MJ Francisco', 'Jayven Villanueva', ''),
(188, 232, 3, 'SLSU2023-00003', 'Sherwin Villa', 'Kirt Cada', 'Re-issued', '', '', '2023-11-23', 'Relocate', '', 2025, 'Good', 'Reynaldo Danganan', 'MJ Francisco', 'Kirt Cada', ''),
(189, 233, 3, 'SLSU2023-00004', 'Sherwin Villa', 'Gil The Great', 'Re-issued', '', '', '2023-11-23', '', '', 2026, '', 'Reynaldo Danganan', 'MJ Francisco', 'Gil The Great', ''),
(190, 234, 4, 'SLSU2023-00005', '', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(191, 235, 4, 'SLSU2023-00006', '', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(192, 236, 5, 'SLSU2023-00007', 'Alvin Salvacion', '', 'Returned', '', '', '', '', '', 0, '', '', '', '', ''),
(193, 237, 5, 'SLSU2023-00008', '', '', '', '', '', '', '', '', 0, '', '', '', '', '');

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

--
-- Dumping data for table `tblpar`
--

INSERT INTO `tblpar` (`par_id`, `par_po_id`, `par_supplier`, `par_iarno`, `par_total_cost`, `par_amount`, `par_no`, `par_fund`, `par_date`, `par_useful_life`, `par_receivedby`, `par_received_date`, `par_receivedfrom`, `par_receivedfrom_date`) VALUES
(13, 5, 'Sample PAR', '12112023', '156,270.00', 0, '11236123', 'OBS', '', '', 'Alvin Salvacion', '2023-12-11', 'Reynaldo Danganan', '2023-12-11');

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

--
-- Dumping data for table `tblpo`
--

INSERT INTO `tblpo` (`id`, `po_id`, `po_number`, `pr_number`, `pgr_number`, `supplier`, `po_date`, `made_of_procurment`, `total_cost`) VALUES
(104, 1, '11212023', '1121202333', '', 'ICS', '2023-11-23', 'MOP', '1505.00'),
(105, 2, '11212', '1121', '', 'ICS 2', '2023-11-24', 'MOP', '1900.00'),
(106, 3, '1121223', '11212323', '', 'Multiple ICS', '2023-11-23', 'MOP', '4500.00'),
(107, 4, '111322', '11132023-0121', '', 'Sample PAR', '2023-12-11', 'MOP', '10400.00'),
(108, 5, '11132223', '11132023-012123', '', 'Sample PAR', '2023-12-11', 'MOP', '103710.00');

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

--
-- Dumping data for table `tblpo_item`
--

INSERT INTO `tblpo_item` (`id`, `po_id`, `po_number`, `pr_number`, `pgr_number`, `item_no`, `property_no`, `quantity`, `unit`, `item_description`, `unit_cost`, `total_unit_cost`, `useful_life`, `date_acquired`) VALUES
(230, 1, '11212023', '1121202333', '', 1, 'SLSU2023-00001-00001', 1, 'pc', 'Test 1', '1505', '1505.00', '', ''),
(231, 2, '11212', '1121', '', 1, 'SLSU2023-00002-00002', 1, 'pc', 'Test 2', '1900', '1900.00', '', ''),
(232, 3, '1121223', '11212323', '', 1, 'SLSU2023-00003-00003', 1, 'pc', 'Test 3', '2100', '2100.00', '', ''),
(233, 3, '1121223', '11212323', '', 2, 'SLSU2023-00004-00004', 1, 'pc', 'Test 4', '2400', '2400.00', '', ''),
(234, 4, '111322', '11132023-0121', '', 1, 'SLSU2023-00005', 1, 'pc', 'PAR 01', '5150', '5150.00', '', ''),
(235, 4, '111322', '11132023-0121', '', 2, 'SLSU2023-00006', 1, 'pc', 'PAR 02', '5250', '5250.00', '', ''),
(236, 5, '11132223', '11132023-012123', '', 1, 'SLSU2023-00007', 1, 'pc', 'Sample PAR 01', '51150', '51150.00', '2 years', ''),
(237, 5, '11132223', '11132023-012123', '', 2, 'SLSU2023-00008', 1, 'pc', 'Sample PAR 02', '52560', '52560.00', '3 years', '');

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
  MODIFY `iar_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tblics`
--
ALTER TABLE `tblics`
  MODIFY `ics_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblics_rsepi`
--
ALTER TABLE `tblics_rsepi`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tblpar`
--
ALTER TABLE `tblpar`
  MODIFY `par_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblpo`
--
ALTER TABLE `tblpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tblpo_item`
--
ALTER TABLE `tblpo_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
