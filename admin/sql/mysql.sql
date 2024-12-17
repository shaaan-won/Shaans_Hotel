-- 1. Users Table
CREATE TABLE `ht_users` (
  `id`  int(10) auto_increment primary key NOT NULL ,
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
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-29 05:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-04 05:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-15 04:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-04 05:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-04 05:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-04 05:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-04 05:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-15 04:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-04 05:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 07:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 06:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 07:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', '');

CREATE TABLE `ht_roles` (
  `id` int(10) auto_increment primary key NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_roles`
--

INSERT INTO `ht_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-02 04:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 06:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-07 04:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 06:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 06:25:53');

-- 3. RoomTypes Table
CREATE TABLE ht_room_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
     max_occupancy INT,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 4. Rooms Table
CREATE TABLE ht_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) UNIQUE NOT NULL,
    room_type_id INT NOT NULL,
    status ENUM('Available', 'Occupied', 'Maintenance') DEFAULT 'Available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 5. Reservations Table
CREATE TABLE ht_reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    customer_id INT,
    booking_date timestamp default current_timestamp,
    room_id INT,
    check_in_date DATE,
    check_out_date DATE,
    special_requests TEXT,
    room_price DECIMAL(10, 2),
    discount DECIMAL(10, 2),
    tax DECIMAL(10, 2),
    total_amount DECIMAL(10, 2),
    remaining_amount DECIMAL(10, 2),
    payment_status ENUM('Pending', 'Paid', 'Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 6. CheckInCheckOut Table
CREATE TABLE ht_check_in_check_outs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    check_in_date datetime,
    check_out_date datetime,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 7. Billing Table
CREATE TABLE ht_billings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    user_id INT,
    room_id INT,
    customer_id INT,
    check_in_date datetime,
    check_out_date datetime,
    room_price DECIMAL(10, 2),
    tax DECIMAL(10, 2),
    discount DECIMAL(10, 2),
    other_services_id INT,
    other_services_price DECIMAL(10, 2),
    cleaning_charges DECIMAL(10, 2),
    service_charges DECIMAL(10, 2),
    total_amount DECIMAL(10, 2),
    payment_method_id INT,
    payment_date timestamp,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- 8. Payments Table
CREATE TABLE ht_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    amount DECIMAL(10, 2),
    amount_received DECIMAL(10, 2),
    amount_due DECIMAL(10, 2),
    payment_method_id INT,
    payment_status ENUM('Pending', 'Paid', 'Cancelled') DEFAULT 'Pending',
    payment_date timestamp,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 9. ServiceRequests Table
CREATE TABLE ht_room_service_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    room_id INT,
    request_type VARCHAR(50),
    request_description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 10. Staff Table
CREATE TABLE ht_staffs ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    role_id INT,
    email VARCHAR(255) UNIQUE,
    phone VARCHAR(15),
    address TEXT,
    work_schedule JSON,
    hired_date DATE,
    performance_score DECIMAL(3, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 11. StaffRoles Table
CREATE TABLE ht_staff_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 12. PerformanceReviews Table
CREATE TABLE ht_performance_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    review_date DATE,
    review_score DECIMAL(3, 2),
    review_comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 13. Reports Table
CREATE TABLE ht_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_type VARCHAR(255),
    report_data JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 14. Payments Methods Table
CREATE TABLE ht_payment_methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT
);

-- 15. CustomerFeedback Table
CREATE TABLE ht_customer_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    comments TEXT,
    rating INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- 16. Customers Table
CREATE TABLE ht_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    phone VARCHAR(15),
    id_card_type_id INT,
    id_card_type_name VARCHAR(10),
    id_card_number int(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 17. id_card_types Table
CREATE TABLE ht_id_card_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 18. work_schedule Table
CREATE TABLE ht_work_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    day_of_week VARCHAR(10),
    start_time TIME,
    end_time TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 19. Status Table
CREATE TABLE ht_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
-- 20. Other Services Table
CREATE TABLE ht_other_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description TEXT,
    status_id INT,
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- INSERT dummy data into tables

-- Dummy Data for ht_room_types Table
INSERT INTO ht_room_types (name, description, price, max_occupancy, photo)
VALUES 
('Deluxe Room', 'A luxurious room with all amenities.', 150.00, 2, 'deluxe'),
('Standard Room', 'A standard single room for budget travelers.', 80.00, 1, 'standard'),
('Suite', 'A spacious suite for families.', 300.00, 4, 'suite'),
('Double Deluxe', 'Two deluxe rooms combined with a shared area.', 250.00, 4, 'double_deluxe');

-- Dummy Data for ht_rooms Table
INSERT INTO ht_rooms (room_number, room_type_id, status)
VALUES 
('101', 1, 'Available'),
('102', 2, 'Occupied'),
('103', 3, 'Available'),
('104', 4, 'Maintenance');

-- Dummy Data for ht_reservations Table
INSERT INTO ht_reservations (user_id, customer_id, room_id, check_in_date, check_out_date, special_requests, room_price, discount, tax, total_amount, remaining_amount, payment_status)
VALUES 
(1, 1, 1, '2024-06-01', '2024-06-05', 'Extra pillows, late check-in', 150.00, 10.00, 18.00, 158.00, 0.00, 'Paid'),
(2, 2, 2, '2024-06-03', '2024-06-06', 'No smoking room', 80.00, 5.00, 9.00, 84.00, 0.00, 'Paid'),
(3, 3, 3, '2024-06-07', '2024-06-10', 'High floor room', 300.00, 20.00, 36.00, 316.00, 50.00, 'Pending'),
(4, 4, 4, '2024-06-10', '2024-06-12', 'Quiet room', 250.00, 15.00, 30.00, 265.00, 100.00, 'Pending');

-- Dummy Data for ht_check_in_check_outs Table
INSERT INTO ht_check_in_check_outs (reservation_id, check_in_date, check_out_date, comments)
VALUES 
(1, '2024-06-01 14:00:00', '2024-06-05 11:00:00', 'Smooth check-in'),
(2, '2024-06-03 15:00:00', '2024-06-06 10:00:00', 'Guest requested early check-out'),
(3, '2024-06-07 13:00:00', '2024-06-10 12:00:00', 'Family with kids'),
(4, '2024-06-10 14:30:00', '2024-06-12 11:30:00', 'Requested quiet room');

-- Dummy Data for ht_billings Table
INSERT INTO ht_billings (reservation_id, user_id, room_id, customer_id, check_in_date, check_out_date, room_price, tax, discount, other_services_id, other_services_price, cleaning_charges, service_charges, total_amount, payment_method_id, payment_date)
VALUES
(1, 1, 1, 1, '2024-06-01', '2024-06-05', 150.00, 18.00, 10.00, 1, 10.00, 10.00, 10.00, 158.00, 1, '2024-06-05 11:00:00'),
(2, 2, 2, 2, '2024-06-03', '2024-06-06', 80.00, 9.00, 5.00, 2, 5.00, 5.00, 5.00, 84.00, 2, '2024-06-06 10:00:00'),
(3, 3, 3, 3, '2024-06-07', '2024-06-10', 300.00, 36.00, 20.00, 3, 20.00, 20.00, 20.00, 316.00, 3, '2024-06-10 12:00:00'),
(4, 4, 4, 4, '2024-06-10', '2024-06-12', 250.00, 30.00, 15.00, 4, 15.00, 15.00, 15.00, 265.00, 1, '2024-06-12 11:30:00');
-- Dummy Data for ht_payments Table
INSERT INTO ht_payments (reservation_id, amount, amount_received, amount_due, payment_method_id, payment_status, payment_date)
VALUES 
(1, 203.00, 203.00, 0.00, 1, 'Paid', '2024-06-05 11:00:00'),
(2, 104.00, 104.00, 0.00, 2, 'Paid', '2024-06-06 10:00:00'),
(3, 376.00, 326.00, 50.00, 3, 'Pending', '2024-06-10 12:00:00'),
(4, 295.00, 195.00, 100.00, 1, 'Pending', '2024-06-12 11:30:00');

-- Dummy Data for ht_room_service_requests Table
INSERT INTO ht_room_service_requests (user_id, room_id, request_type, request_description)
VALUES 
(1, 1, 'Cleaning', 'Request for additional towels'),
(2, 2, 'Maintenance', 'Leaking faucet in bathroom'),
(3, 3, 'Room Service', 'Need extra pillows'),
(4, 4, 'Cleaning', 'Room requires vacuuming');

-- Dummy Data for ht_staffs Table
INSERT INTO ht_staffs (name, role_id, email, phone, address, work_schedule, hired_date, performance_score)
VALUES 
('John Doe', 1, 'johndoe@example.com', '1234567890', '123 Main Street, City', '{"Monday":"9:00-17:00", "Wednesday":"9:00-17:00"}', '2023-01-15', 4.8),
('Jane Smith', 2, 'janesmith@example.com', '0987654321', '456 Elm Street, City', '{"Tuesday":"8:00-16:00", "Thursday":"8:00-16:00"}', '2023-03-01', 4.5),
('Michael Brown', 3, 'michaelbrown@example.com', '1122334455', '789 Oak Avenue, City', '{"Monday":"7:00-15:00", "Friday":"7:00-15:00"}', '2022-12-01', 4.6),
('Emily Davis', 4, 'emilydavis@example.com', '6677889900', '321 Pine Street, City', '{"Saturday":"10:00-18:00", "Sunday":"10:00-18:00"}', '2024-02-20', 4.7);

-- Dummy Data for ht_staff_roles Table
INSERT INTO ht_staff_roles (role_name)
VALUES 
('Manager'),
('Receptionist'),
('Housekeeping'),
('Concierge');

-- Dummy Data for ht_performance_reviews Table
INSERT INTO ht_performance_reviews (staff_id, review_date, review_score, review_comments)
VALUES 
(1, '2024-06-01', 4.8, 'Excellent management skills'),
(2, '2024-06-03', 4.5, 'Good at customer interaction'),
(3, '2024-06-07', 4.6, 'Efficient in cleaning services'),
(4, '2024-06-10', 4.7, 'Great at guest relations');

-- Dummy Data for ht_reports Table
INSERT INTO ht_reports (report_type, report_data)
VALUES 
('Monthly Revenue', '{"total_revenue": "50000", "total_guests": "100"}'),
('Customer Satisfaction', '{"average_rating": "4.5"}'),
('Room Occupancy', '{"rooms_occupied": "75", "rooms_available": "25"}'),
('Staff Performance', '{"average_performance_score": "4.7"}');

-- Dummy Data for ht_payment_methods Table
INSERT INTO ht_payment_methods (name, description)
VALUES 
('Credit Card', 'Payments made via credit cards.'),
('Cash', 'Direct cash payments.'),
('Debit Card', 'Payments made via debit cards.'),
('Online Transfer', 'Payments made through online bank transfer.');

-- Dummy Data for ht_customer_feedback Table
INSERT INTO ht_customer_feedback (user_id, comments, rating)
VALUES 
(1, 'Excellent service! The room was clean and comfortable.', 5),
(2, 'Average experience. The WiFi was slow.', 3),
(3, 'The stay was great, but the check-in process was slow.', 4),
(4, 'I had a wonderful stay, and the staff were very friendly.', 5);

-- Dummy Data for ht_customers Table
INSERT INTO ht_customers (name, first_name, last_name, email, phone, id_card_type_id, id_card_type_name, id_card_number, address)
VALUES 
('John Doe', 'John', 'Doe', 'johndoe@example.com', '1234567890', 1, 'Passport', 123456789, '123 Main Street, City'),
('Jane Smith', 'Jane', 'Smith', 'janesmith@example.com', '0987654321', 2, 'Driver License', 987654321, '456 Elm Street, City'),
('Michael Brown', 'Michael', 'Brown', 'michaelbrown@example.com', '1122334455', 3, 'National ID', 112233445, '789 Oak Avenue, City'),
('Emily Davis', 'Emily', 'Davis', 'emilydavis@example.com', '6677889900', 1, 'Passport', 667788990, '321 Pine Street, City');

-- Dummy Data for ht_id_card_types Table
INSERT INTO ht_id_card_types (name)
VALUES 
('Passport'),
('Driver License'),
('National ID');
-- Dummy Data for ht_work_schedule Table
INSERT INTO ht_work_schedule (staff_id, day_of_week, start_time, end_time)
VALUES 
(1, 'Monday', '09:00:00', '17:00:00'),
(1, 'Wednesday', '09:00:00', '17:00:00'),
(2, 'Tuesday', '08:00:00', '16:00:00'),
(2, 'Thursday', '08:00:00', '16:00:00'),
(3, 'Monday', '07:00:00', '15:00:00'),
(3, 'Friday', '07:00:00', '15:00:00'),
(4, 'Saturday', '10:00:00', '18:00:00'),
(4, 'Sunday', '10:00:00', '18:00:00');

-- Dummy Data for ht_status Table
INSERT INTO ht_status (name)
VALUES 
('Available'),
('Occupied'),
('Maintenance'),
('Out of Order');

-- dummy data for other_services table
INSERT INTO ht_other_services (name, description, status_id, price)
VALUES 
('Breakfast', 'Breakfast included', 1, 50.00),
('Lunch', 'Lunch included', 1, 100.00),
('Dinner', 'Dinner included', 1, 150.00);
