-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 12:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `birthday` date DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `balance` double DEFAULT 0,
  `description` text DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_group`
--

CREATE TABLE `client_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departament`
--

CREATE TABLE `departament` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departament`
--

INSERT INTO `departament` (`id`, `name`, `owner_id`, `status`, `created`, `updated`, `register_id`, `modify_id`) VALUES
(1, 'Diagnostika UZI', 1, 1, '2025-10-04 17:06:38', '2025-10-04 14:10:30', 1, 1),
(2, 'Test', 1, -1, '2025-10-04 14:10:07', '2025-10-04 14:11:04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loc_district`
--

CREATE TABLE `loc_district` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loc_region`
--

CREATE TABLE `loc_region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `percent` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `departament_id` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT 0,
  `count_patient` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `price` decimal(19,2) DEFAULT 0.00,
  `price_food` decimal(19,2) DEFAULT 0.00,
  `state` enum('WORKING','CLOSED','FULL') DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `departament_id` int(11) NOT NULL,
  `has_file` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_user`
--

CREATE TABLE `service_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL,
  `type` enum('FIXED','PERCENT') DEFAULT 'FIXED',
  `value` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `chat_id` varchar(255) DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `phone`, `refresh_token`, `role_id`, `status`, `created`, `updated`, `chat_id`, `access_token`, `prefix`) VALUES
(1, 'Admin', 'admin', '$2y$13$cW4FDIl.S5zCEEAl4we0FuRahZRLtTQYUz4nUHcX2k2bz6yZ9kTyy', '(99)967-0395', NULL, 1, 1, '2025-10-03 17:12:55', '2025-10-06 16:19:07', NULL, 'QEMbV-qE0VHVaDDGJHuDohhl9Ep3HrC0iNftJU6_ncrUulHdxCXhSfJ_c4n1awSh', NULL),
(2, 'Dilmurod', 'test[1759571500.1876][1759571778.7172]', '$2y$13$VoNJ/HhFAT/jP.oV1YlFc.GkTgGo65I9SXVvWtfFNvHdIi9ejL24m', '(99)967-0395', NULL, 1, -1, '2025-10-04 14:43:49', '2025-10-04 14:56:18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `status`, `created`, `updated`) VALUES
(1, 'Administrator', 1, '2025-07-11 12:00:58', '2025-07-11 12:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `departament_id` int(11) DEFAULT NULL,
  `price` decimal(19,2) DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `state` enum('NEW','RUNNING','DONE','CANCALLED') DEFAULT 'NEW',
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL,
  `is_emergency` int(11) DEFAULT 0,
  `emergency_car` varchar(255) DEFAULT NULL,
  `is_onetime_payment` int(11) DEFAULT 0,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_referal`
--

CREATE TABLE `visit_referal` (
  `id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `referal_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` decimal(19,2) DEFAULT 0.00,
  `price_referal` decimal(19,2) DEFAULT 0.00,
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_room`
--

CREATE TABLE `visit_room` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `state` enum('TREAT','GONE') DEFAULT 'TREAT',
  `status` int(11) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL,
  `is_food_connected` int(11) DEFAULT 0,
  `price` decimal(19,2) DEFAULT 0.00,
  `price_count` decimal(19,2) DEFAULT 0.00,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_service`
--

CREATE TABLE `visit_service` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `departament_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `code_id` int(11) DEFAULT NULL,
  `visit_time` datetime DEFAULT NULL,
  `price` decimal(19,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 1,
  `register_id` int(11) DEFAULT NULL,
  `modify_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_client_group_id` (`group_id`),
  ADD KEY `FK_client_region_id` (`region_id`),
  ADD KEY `FK_client_district_id` (`district_id`),
  ADD KEY `FK_client_source_id` (`source_id`),
  ADD KEY `FK_client_register_id` (`register_id`),
  ADD KEY `FK_client_modify_id` (`modify_id`);

--
-- Indexes for table `client_group`
--
ALTER TABLE `client_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_client_group_register_id` (`register_id`),
  ADD KEY `FK_client_group_modify_id` (`modify_id`);

--
-- Indexes for table `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_departament_owner_id` (`owner_id`),
  ADD KEY `FK_departament_register_id` (`register_id`),
  ADD KEY `FK_departament_modify_id` (`modify_id`);

--
-- Indexes for table `loc_district`
--
ALTER TABLE `loc_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_loc_district_region_id` (`region_id`);

--
-- Indexes for table `loc_region`
--
ALTER TABLE `loc_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_referal_register_id` (`register_id`),
  ADD KEY `FK_referal_modify_id` (`modify_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_room_departament_id` (`departament_id`),
  ADD KEY `FK_room_user_id` (`user_id`),
  ADD KEY `FK_room_register_id` (`register_id`),
  ADD KEY `FK_room_modify_id` (`modify_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_service_departament_id` (`departament_id`),
  ADD KEY `FK_service_register_id` (`register_id`),
  ADD KEY `FK_service_modify_id` (`modify_id`);

--
-- Indexes for table `service_user`
--
ALTER TABLE `service_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_service_user_user_id` (`user_id`),
  ADD KEY `FK_service_user_service_id` (`service_id`),
  ADD KEY `FK_service_user_register_id` (`register_id`),
  ADD KEY `FK_service_user_modify_id` (`modify_id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visit_client_id` (`client_id`),
  ADD KEY `FK_visit_register_id` (`register_id`),
  ADD KEY `FK_visit_modify_id` (`modify_id`),
  ADD KEY `FK_visit_departament_id` (`departament_id`);

--
-- Indexes for table `visit_referal`
--
ALTER TABLE `visit_referal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visit_referal_visit_id` (`visit_id`),
  ADD KEY `FK_visit_referal_referal_id` (`referal_id`),
  ADD KEY `FK_visit_referal_service_id` (`service_id`),
  ADD KEY `FK_visit_referal_register_id` (`register_id`),
  ADD KEY `FK_visit_referal_modify_id` (`modify_id`);

--
-- Indexes for table `visit_room`
--
ALTER TABLE `visit_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visit_room_room_id` (`room_id`),
  ADD KEY `FK_visit_room_visit_id` (`visit_id`),
  ADD KEY `FK_visit_room_client_id` (`client_id`),
  ADD KEY `FK_visit_room_register_id` (`register_id`),
  ADD KEY `FK_visit_room_modify_id` (`modify_id`),
  ADD KEY `FK_visit_room_doctor_id` (`doctor_id`);

--
-- Indexes for table `visit_service`
--
ALTER TABLE `visit_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visit_service_doctor_id` (`doctor_id`),
  ADD KEY `FK_visit_service_service_id` (`service_id`),
  ADD KEY `FK_visit_service_visit_id` (`visit_id`),
  ADD KEY `FK_visit_service_departament_id` (`departament_id`),
  ADD KEY `FK_visit_service_register_id` (`register_id`),
  ADD KEY `FK_visit_service_modify_id` (`modify_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_group`
--
ALTER TABLE `client_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loc_district`
--
ALTER TABLE `loc_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loc_region`
--
ALTER TABLE `loc_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_user`
--
ALTER TABLE `service_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_referal`
--
ALTER TABLE `visit_referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_room`
--
ALTER TABLE `visit_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_service`
--
ALTER TABLE `visit_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_client_district_id` FOREIGN KEY (`district_id`) REFERENCES `loc_district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_group_id` FOREIGN KEY (`group_id`) REFERENCES `client_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_region_id` FOREIGN KEY (`region_id`) REFERENCES `loc_region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_source_id` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_group`
--
ALTER TABLE `client_group`
  ADD CONSTRAINT `FK_client_group_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_client_group_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departament`
--
ALTER TABLE `departament`
  ADD CONSTRAINT `FK_departament_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_departament_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_departament_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loc_district`
--
ALTER TABLE `loc_district`
  ADD CONSTRAINT `FK_loc_district_region_id` FOREIGN KEY (`region_id`) REFERENCES `loc_region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `referal`
--
ALTER TABLE `referal`
  ADD CONSTRAINT `FK_referal_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_referal_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_room_departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_room_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_room_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_room_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_service_departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_service_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_service_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_user`
--
ALTER TABLE `service_user`
  ADD CONSTRAINT `FK_service_user_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_service_user_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_service_user_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_service_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `FK_visit_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit_referal`
--
ALTER TABLE `visit_referal`
  ADD CONSTRAINT `FK_visit_referal_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_referal_referal_id` FOREIGN KEY (`referal_id`) REFERENCES `referal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_referal_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_referal_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_referal_visit_id` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit_room`
--
ALTER TABLE `visit_room`
  ADD CONSTRAINT `FK_visit_room_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_room_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_room_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_room_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_room_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_room_visit_id` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visit_service`
--
ALTER TABLE `visit_service`
  ADD CONSTRAINT `FK_visit_service_departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_service_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_service_modify_id` FOREIGN KEY (`modify_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_service_register_id` FOREIGN KEY (`register_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_service_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_visit_service_visit_id` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
