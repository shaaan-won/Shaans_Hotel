-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 09:05 PM
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
-- Database: `shaans_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ht_billings`
--

CREATE TABLE `ht_billings` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `other_service_id` int(11) DEFAULT NULL,
  `other_service_price` decimal(10,2) DEFAULT NULL,
  `cleaning_charges` decimal(10,2) DEFAULT NULL,
  `service_charges` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_billings`
--

INSERT INTO `ht_billings` (`id`, `reservation_id`, `user_id`, `room_id`, `customer_id`, `check_in_date`, `check_out_date`, `room_price`, `tax`, `discount`, `other_service_id`, `other_service_price`, `cleaning_charges`, `service_charges`, `total_amount`, `payment_method_id`, `payment_date`, `created_at`) VALUES
(1, 1, 1, 1, 1, '2024-06-01 00:00:00', '2024-06-05 00:00:00', 150.00, 18.00, 10.00, 1, 10.00, 10.00, 10.00, 158.00, 1, '2024-06-05 05:00:00', '2024-12-17 19:02:52'),
(2, 2, 2, 2, 2, '2024-06-03 00:00:00', '2024-06-06 00:00:00', 80.00, 9.00, 5.00, 2, 5.00, 5.00, 5.00, 84.00, 2, '2024-06-06 04:00:00', '2024-12-17 19:02:52'),
(3, 3, 3, 3, 3, '2024-06-07 00:00:00', '2024-06-10 00:00:00', 300.00, 36.00, 20.00, 3, 20.00, 20.00, 20.00, 316.00, 3, '2024-06-10 06:00:00', '2024-12-17 19:02:52'),
(4, 4, 4, 4, 4, '2024-06-10 00:00:00', '2024-06-12 00:00:00', 250.00, 30.00, 15.00, 4, 15.00, 15.00, 15.00, 265.00, 1, '2024-06-12 05:30:00', '2024-12-17 19:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `ht_check_in_check_outs`
--

CREATE TABLE `ht_check_in_check_outs` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_check_in_check_outs`
--

INSERT INTO `ht_check_in_check_outs` (`id`, `reservation_id`, `check_in_date`, `check_out_date`, `comments`, `created_at`) VALUES
(1, 1, '2024-06-01 14:00:00', '2024-06-05 11:00:00', 'Smooth check-in', '2024-12-17 15:18:29'),
(2, 2, '2024-06-03 15:00:00', '2024-06-06 10:00:00', 'Guest requested early check-out', '2024-12-17 15:18:29'),
(3, 3, '2024-06-07 13:00:00', '2024-06-10 12:00:00', 'Family with kids', '2024-12-17 15:18:29'),
(4, 4, '2024-06-10 14:30:00', '2024-06-12 11:30:00', 'Requested quiet room', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_customers`
--

CREATE TABLE `ht_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `id_card_type_id` int(11) DEFAULT NULL,
  `id_card_type_name` varchar(10) DEFAULT NULL,
  `id_card_number` int(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customers`
--

INSERT INTO `ht_customers` (`id`, `name`, `first_name`, `last_name`, `email`, `phone`, `id_card_type_id`, `id_card_type_name`, `id_card_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'John', 'Doe', 'johndoe@example.com', '1234567890', 1, 'Passport', 123456789, '123 Main Street, City', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(2, 'Jane Smith', 'Jane', 'Smith', 'janesmith@example.com', '0987654321', 2, 'Driver Lic', 987654321, '456 Elm Street, City', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(3, 'Michael Brown', 'Michael', 'Brown', 'michaelbrown@example.com', '1122334455', 3, 'National I', 112233445, '789 Oak Avenue, City', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(4, 'Emily Davis', 'Emily', 'Davis', 'emilydavis@example.com', '6677889900', 1, 'Passport', 667788990, '321 Pine Street, City', '2024-12-17 15:18:29', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_customer_feedback`
--

CREATE TABLE `ht_customer_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customer_feedback`
--

INSERT INTO `ht_customer_feedback` (`id`, `user_id`, `comments`, `rating`, `created_at`) VALUES
(1, 1, 'Excellent service! The room was clean and comfortable.', 5, '2024-12-17 15:18:29'),
(2, 2, 'Average experience. The WiFi was slow.', 3, '2024-12-17 15:18:29'),
(3, 3, 'The stay was great, but the check-in process was slow.', 4, '2024-12-17 15:18:29'),
(4, 4, 'I had a wonderful stay, and the staff were very friendly.', 5, '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_id_card_types`
--

CREATE TABLE `ht_id_card_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_id_card_types`
--

INSERT INTO `ht_id_card_types` (`id`, `name`, `created_at`) VALUES
(1, 'Passport', '2024-12-17 15:18:29'),
(2, 'Driver License', '2024-12-17 15:18:29'),
(3, 'National ID', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_other_services`
--

CREATE TABLE `ht_other_services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_other_services`
--

INSERT INTO `ht_other_services` (`id`, `name`, `description`, `status_id`, `price`, `created_at`) VALUES
(1, 'Breakfast', 'Breakfast included', 1, 50.00, '2024-12-17 18:25:18'),
(2, 'Lunch', 'Lunch included', 1, 100.00, '2024-12-17 18:25:18'),
(3, 'Dinner', 'Dinner included', 1, 150.00, '2024-12-17 18:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `ht_payments`
--

CREATE TABLE `ht_payments` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `amount_received` decimal(10,2) DEFAULT NULL,
  `amount_due` decimal(10,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payments`
--

INSERT INTO `ht_payments` (`id`, `reservation_id`, `amount`, `amount_received`, `amount_due`, `payment_method_id`, `payment_status`, `payment_date`, `created_at`) VALUES
(1, 1, 203.00, 203.00, 0.00, 1, 'Paid', '2024-06-05 05:00:00', '2024-12-17 15:18:29'),
(2, 2, 104.00, 104.00, 0.00, 2, 'Paid', '2024-06-06 04:00:00', '2024-12-17 15:18:29'),
(3, 3, 376.00, 326.00, 50.00, 3, 'Pending', '2024-06-10 06:00:00', '2024-12-17 15:18:29'),
(4, 4, 295.00, 195.00, 100.00, 1, 'Pending', '2024-06-12 05:30:00', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_payment_methods`
--

CREATE TABLE `ht_payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payment_methods`
--

INSERT INTO `ht_payment_methods` (`id`, `name`, `description`) VALUES
(1, 'Credit Card', 'Payments made via credit cards.'),
(2, 'Cash', 'Direct cash payments.'),
(3, 'Debit Card', 'Payments made via debit cards.'),
(4, 'Online Transfer', 'Payments made through online bank transfer.');

-- --------------------------------------------------------

--
-- Table structure for table `ht_performance_reviews`
--

CREATE TABLE `ht_performance_reviews` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_score` decimal(3,2) DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_performance_reviews`
--

INSERT INTO `ht_performance_reviews` (`id`, `staff_id`, `review_date`, `review_score`, `review_comments`, `created_at`) VALUES
(1, 1, '2024-06-01', 4.80, 'Excellent management skills', '2024-12-17 15:18:29'),
(2, 2, '2024-06-03', 4.50, 'Good at customer interaction', '2024-12-17 15:18:29'),
(3, 3, '2024-06-07', 4.60, 'Efficient in cleaning services', '2024-12-17 15:18:29'),
(4, 4, '2024-06-10', 4.70, 'Great at guest relations', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_reports`
--

CREATE TABLE `ht_reports` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `report_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`report_data`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_reports`
--

INSERT INTO `ht_reports` (`id`, `report_type`, `report_data`, `created_at`) VALUES
(1, 'Monthly Revenue', '{\"total_revenue\": \"50000\", \"total_guests\": \"100\"}', '2024-12-17 15:18:29'),
(2, 'Customer Satisfaction', '{\"average_rating\": \"4.5\"}', '2024-12-17 15:18:29'),
(3, 'Room Occupancy', '{\"rooms_occupied\": \"75\", \"rooms_available\": \"25\"}', '2024-12-17 15:18:29'),
(4, 'Staff Performance', '{\"average_performance_score\": \"4.7\"}', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_reservations`
--

CREATE TABLE `ht_reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `special_requests` text DEFAULT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `remaining_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_reservations`
--

INSERT INTO `ht_reservations` (`id`, `user_id`, `customer_id`, `booking_date`, `room_id`, `check_in_date`, `check_out_date`, `special_requests`, `room_price`, `discount`, `tax`, `total_amount`, `remaining_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-17 15:18:29', 1, '2024-06-01', '2024-06-05', 'Extra pillows, late check-in', 150.00, 10.00, 18.00, 158.00, 0.00, 'Paid', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(2, 2, 2, '2024-12-17 15:18:29', 2, '2024-06-03', '2024-06-06', 'No smoking room', 80.00, 5.00, 9.00, 84.00, 0.00, 'Paid', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(3, 3, 3, '2024-12-17 15:18:29', 3, '2024-06-07', '2024-06-10', 'High floor room', 300.00, 20.00, 36.00, 316.00, 50.00, 'Pending', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(4, 4, 4, '2024-12-17 15:18:29', 4, '2024-06-10', '2024-06-12', 'Quiet room', 250.00, 15.00, 30.00, 265.00, 100.00, 'Pending', '2024-12-17 15:18:29', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_roles`
--

CREATE TABLE `ht_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_roles`
--

INSERT INTO `ht_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-01 22:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 00:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-06 22:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 00:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 00:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `ht_rooms`
--

CREATE TABLE `ht_rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `status` enum('Available','Occupied','Maintenance') DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_rooms`
--

INSERT INTO `ht_rooms` (`id`, `room_number`, `room_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '101', 1, 'Available', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(2, '102', 2, 'Occupied', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(3, '103', 3, 'Available', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(4, '104', 4, 'Maintenance', '2024-12-17 15:18:29', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_service_requests`
--

CREATE TABLE `ht_room_service_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `request_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_service_requests`
--

INSERT INTO `ht_room_service_requests` (`id`, `user_id`, `room_id`, `request_type`, `request_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Cleaning', 'Request for additional towels', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(2, 2, 2, 'Maintenance', 'Leaking faucet in bathroom', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(3, 3, 3, 'Room Service', 'Need extra pillows', '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(4, 4, 4, 'Cleaning', 'Room requires vacuuming', '2024-12-17 15:18:29', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_types`
--

CREATE TABLE `ht_room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `max_occupancy` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_types`
--

INSERT INTO `ht_room_types` (`id`, `name`, `description`, `price`, `max_occupancy`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Room', 'A luxurious room with all amenities.', 150.00, 2, 'deluxe', '2024-12-17 15:18:51', '2024-12-17 15:18:51'),
(2, 'Standard Room', 'A standard single room for budget travelers.', 80.00, 1, 'standard', '2024-12-17 15:18:51', '2024-12-17 15:18:51'),
(3, 'Suite', 'A spacious suite for families.', 300.00, 4, 'suite', '2024-12-17 15:18:51', '2024-12-17 15:18:51'),
(4, 'Double Deluxe', 'Two deluxe rooms combined with a shared area.', 250.00, 4, 'double_deluxe', '2024-12-17 15:18:51', '2024-12-17 15:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staffs`
--

CREATE TABLE `ht_staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `work_schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`work_schedule`)),
  `hired_date` date DEFAULT NULL,
  `performance_score` decimal(3,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staffs`
--

INSERT INTO `ht_staffs` (`id`, `name`, `role_id`, `email`, `phone`, `address`, `work_schedule`, `hired_date`, `performance_score`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 1, 'johndoe@example.com', '1234567890', '123 Main Street, City', '{\"Monday\":\"9:00-17:00\", \"Wednesday\":\"9:00-17:00\"}', '2023-01-15', 4.80, '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(2, 'Jane Smith', 2, 'janesmith@example.com', '0987654321', '456 Elm Street, City', '{\"Tuesday\":\"8:00-16:00\", \"Thursday\":\"8:00-16:00\"}', '2023-03-01', 4.50, '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(3, 'Michael Brown', 3, 'michaelbrown@example.com', '1122334455', '789 Oak Avenue, City', '{\"Monday\":\"7:00-15:00\", \"Friday\":\"7:00-15:00\"}', '2022-12-01', 4.60, '2024-12-17 15:18:29', '2024-12-17 15:18:29'),
(4, 'Emily Davis', 4, 'emilydavis@example.com', '6677889900', '321 Pine Street, City', '{\"Saturday\":\"10:00-18:00\", \"Sunday\":\"10:00-18:00\"}', '2024-02-20', 4.70, '2024-12-17 15:18:29', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staff_roles`
--

CREATE TABLE `ht_staff_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staff_roles`
--

INSERT INTO `ht_staff_roles` (`id`, `role_name`, `created_at`) VALUES
(1, 'Manager', '2024-12-17 15:18:29'),
(2, 'Receptionist', '2024-12-17 15:18:29'),
(3, 'Housekeeping', '2024-12-17 15:18:29'),
(4, 'Concierge', '2024-12-17 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `ht_status`
--

CREATE TABLE `ht_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_status`
--

INSERT INTO `ht_status` (`id`, `name`, `created_at`) VALUES
(1, 'Available', '2024-12-17 15:20:49'),
(2, 'Occupied', '2024-12-17 15:20:49'),
(3, 'Maintenance', '2024-12-17 15:20:49'),
(4, 'Out of Order', '2024-12-17 15:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `ht_users`
--

CREATE TABLE `ht_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-28 23:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-03 23:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-14 22:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-03 23:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-03 23:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-03 23:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-03 23:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-14 22:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-03 23:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 01:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 00:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 01:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `ht_work_schedules`
--

CREATE TABLE `ht_work_schedules` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `day_of_week` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_work_schedules`
--

INSERT INTO `ht_work_schedules` (`id`, `staff_id`, `day_of_week`, `start_time`, `end_time`, `created_at`) VALUES
(1, 1, 'Monday', '09:00:00', '17:00:00', '2024-12-17 15:18:29'),
(2, 1, 'Wednesday', '09:00:00', '17:00:00', '2024-12-17 15:18:29'),
(3, 2, 'Tuesday', '08:00:00', '16:00:00', '2024-12-17 15:18:29'),
(4, 2, 'Thursday', '08:00:00', '16:00:00', '2024-12-17 15:18:29'),
(5, 3, 'Monday', '07:00:00', '15:00:00', '2024-12-17 15:18:29'),
(6, 3, 'Friday', '07:00:00', '15:00:00', '2024-12-17 15:18:29'),
(7, 4, 'Saturday', '10:00:00', '18:00:00', '2024-12-17 15:18:29'),
(8, 4, 'Sunday', '10:00:00', '18:00:00', '2024-12-17 15:18:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_billings`
--
ALTER TABLE `ht_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_check_in_check_outs`
--
ALTER TABLE `ht_check_in_check_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_customers`
--
ALTER TABLE `ht_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ht_customer_feedback`
--
ALTER TABLE `ht_customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_other_services`
--
ALTER TABLE `ht_other_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_payments`
--
ALTER TABLE `ht_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_payment_methods`
--
ALTER TABLE `ht_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_performance_reviews`
--
ALTER TABLE `ht_performance_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_reports`
--
ALTER TABLE `ht_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_reservations`
--
ALTER TABLE `ht_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_roles`
--
ALTER TABLE `ht_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_rooms`
--
ALTER TABLE `ht_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `ht_room_service_requests`
--
ALTER TABLE `ht_room_service_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_staffs`
--
ALTER TABLE `ht_staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_status`
--
ALTER TABLE `ht_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_work_schedules`
--
ALTER TABLE `ht_work_schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_billings`
--
ALTER TABLE `ht_billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_check_in_check_outs`
--
ALTER TABLE `ht_check_in_check_outs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_customers`
--
ALTER TABLE `ht_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_customer_feedback`
--
ALTER TABLE `ht_customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_other_services`
--
ALTER TABLE `ht_other_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_payments`
--
ALTER TABLE `ht_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_payment_methods`
--
ALTER TABLE `ht_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_performance_reviews`
--
ALTER TABLE `ht_performance_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_reports`
--
ALTER TABLE `ht_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_reservations`
--
ALTER TABLE `ht_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_roles`
--
ALTER TABLE `ht_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_rooms`
--
ALTER TABLE `ht_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_service_requests`
--
ALTER TABLE `ht_room_service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staffs`
--
ALTER TABLE `ht_staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_status`
--
ALTER TABLE `ht_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `ht_work_schedules`
--
ALTER TABLE `ht_work_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
