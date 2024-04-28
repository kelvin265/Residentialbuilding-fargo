-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `residential`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img_url` text NOT NULL,
  `estimated` smallint(6) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `project_id`, `phase_id`, `start_date`, `end_date`, `img_url`, `estimated`, `description`) VALUES
(8, 4, 2, '2024-04-21', '2024-07-24', '', 1, 'excavating'),
(9, 4, 2, '2024-07-26', '2024-08-24', '', 1, 'footing'),
(13, 4, 2, '2024-04-21', '2024-05-01', '', 0, 'excavating the site'),
(14, 5, 3, '2024-04-21', '2024-05-15', '', 1, 'foooting activity'),
(15, 5, 2, '2024-05-21', '2024-06-25', '', 1, 'building the foundation'),
(16, 5, 3, '2024-04-21', '2024-04-29', '', 0, 'footing works'),
(17, 4, 2, '2024-05-02', '0000-00-00', '', 0, 'footing works');

-- --------------------------------------------------------

--
-- Table structure for table `activity_machine`
--

CREATE TABLE `activity_machine` (
  `machine_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `activity_machine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_machine`
--

INSERT INTO `activity_machine` (`machine_id`, `activity_id`, `activity_machine_id`) VALUES
(2, 0, 0),
(2, 8, 0),
(3, 9, 0),
(2, 13, 0),
(3, 15, 0),
(2, 0, 0),
(2, 8, 0),
(3, 9, 0),
(2, 13, 0),
(3, 15, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activity_machine_cost`
-- (See below for the actual view)
--
CREATE TABLE `activity_machine_cost` (
`activity_id` int(11)
,`name` varchar(255)
,`daily_rate` float
,`total_days` int(7)
,`total_cost` double
);

-- --------------------------------------------------------

--
-- Table structure for table `activity_material`
--

CREATE TABLE `activity_material` (
  `material_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `activity_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_material`
--

INSERT INTO `activity_material` (`material_id`, `activity_id`, `quantity`, `activity_material_id`) VALUES
(2, 8, 10000, 2),
(2, 9, 10000, 3),
(4, 9, 15, 4),
(4, 14, 10, 5),
(4, 16, 10, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activity_material_cost`
-- (See below for the actual view)
--
CREATE TABLE `activity_material_cost` (
`activity_id` int(11)
,`material_name` varchar(30)
,`description` varchar(255)
,`price` float
,`quantity` float
,`total_cost` double
);

-- --------------------------------------------------------

--
-- Table structure for table `activity_worker`
--

CREATE TABLE `activity_worker` (
  `activity_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `activity_worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_worker`
--

INSERT INTO `activity_worker` (`activity_id`, `worker_id`, `activity_worker_id`) VALUES
(8, 3, 1),
(9, 2, 2),
(9, 3, 3),
(14, 5, 4),
(14, 2, 5),
(15, 2, 6),
(16, 2, 7),
(16, 3, 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activity_worker_cost`
-- (See below for the actual view)
--
CREATE TABLE `activity_worker_cost` (
`activity_id` int(11)
,`start_date` date
,`end_date` date
,`worker_name` varchar(61)
,`total_days` int(7)
,`total_cost` double
,`worker_type_description` varchar(30)
,`hourly_rate` float
);

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `machine_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `daily_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`machine_id`, `name`, `description`, `daily_rate`) VALUES
(2, 'Mini hydraulic excavator', 'used for digging, lifting and moving heavy materials', 250000),
(3, 'Cement Mixer', 'used for mixing cement', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(30) NOT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `material_name`, `price`, `description`) VALUES
(2, 'Brick', 50, 'Used for building, Price is given per brick'),
(3, 'sand', 10000, 'sand for building, cost given per tone'),
(4, 'Cement', 20000, 'used for building, charged per bag');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `phase_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`phase_id`, `name`, `description`) VALUES
(2, 'Foundation', 'The base of the house'),
(3, 'Footing', 'stacking up of the building parameters');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `est_start_date` date NOT NULL,
  `est_end_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `start_date`, `end_date`, `est_start_date`, `est_end_date`, `customer_id`, `project_name`, `status`) VALUES
(4, '2024-05-02', '0000-00-00', '2024-02-22', '2024-06-05', 17, 'Mr CKs House', 'inprogress'),
(5, '0000-00-00', '0000-00-00', '2024-05-01', '2024-08-01', 19, 'Hannas House', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `user_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `dob`, `user_type`) VALUES
(17, 'Kelvin', 'Chikwati', 'kelvinchikwati0@gmail.com', '$2y$10$BHV9HSxbpvQfwYO5AxM3A.RMz2.7OQNRZBHkBfN36bCkPIMUtfqBG', 'Male', '2001-04-21', 0),
(18, 'Vanessa', 'Magreta', 'vanessa@gmail.com', '$2y$10$XNU3ggv8ypQH30CFb6OADeGWpVOwq9eVNelGYkntP946b.IgVu5WK', 'Female', '2024-04-09', 1),
(19, 'hanna', 'magaleta', 'hanna@gmail.com', '$2y$10$HLzoJ1b0q96rpi4zTbGmdOUMjKmX9fw60C0GYRRfEsGDY8ixZzIBO', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `worker_type_code` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `first_name`, `last_name`, `address`, `gender`, `phone`, `worker_type_code`) VALUES
(2, 'James', 'mawindo', 'ndirande', 'Male', '0883316293', 'BKL'),
(3, 'Patricia', 'mungoni', 'manase', 'Female', '0999777888', 'FRM'),
(4, 'gift', 'halawa', 'machinjiri', 'male', '0886677456', 'BKL'),
(5, 'chisomo', 'maged', 'ndirande', 'male', '0883316294', 'Plumbe');

-- --------------------------------------------------------

--
-- Table structure for table `worker_types`
--

CREATE TABLE `worker_types` (
  `worker_type_code` varchar(6) NOT NULL,
  `worker_type_description` varchar(30) DEFAULT NULL,
  `hourly_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker_types`
--

INSERT INTO `worker_types` (`worker_type_code`, `worker_type_description`, `hourly_rate`) VALUES
('BKL', 'Brick Layer', 500),
('FRM', 'Foreman', 1000),
('Plumbe', 'for plumbing works', 500);

-- --------------------------------------------------------

--
-- Structure for view `activity_machine_cost`
--
DROP TABLE IF EXISTS `activity_machine_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activity_machine_cost`  AS SELECT `s`.`activity_id` AS `activity_id`, `m`.`name` AS `name`, `m`.`daily_rate` AS `daily_rate`, to_days(`s`.`end_date`) - to_days(`s`.`start_date`) AS `total_days`, (to_days(`s`.`end_date`) - to_days(`s`.`start_date`)) * `m`.`daily_rate` AS `total_cost` FROM ((`machines` `m` join `activity_machine` `x` on(`m`.`machine_id` = `x`.`machine_id`)) join `activities` `s` on(`s`.`activity_id` = `x`.`activity_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `activity_material_cost`
--
DROP TABLE IF EXISTS `activity_material_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activity_material_cost`  AS SELECT `a`.`activity_id` AS `activity_id`, `m`.`material_name` AS `material_name`, `m`.`description` AS `description`, `m`.`price` AS `price`, `s`.`quantity` AS `quantity`, `s`.`quantity`* `m`.`price` AS `total_cost` FROM ((`materials` `m` join `activity_material` `s` on(`m`.`material_id` = `s`.`material_id`)) join `activities` `a` on(`s`.`activity_id` = `a`.`activity_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `activity_worker_cost`
--
DROP TABLE IF EXISTS `activity_worker_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activity_worker_cost`  AS SELECT `a`.`activity_id` AS `activity_id`, `s`.`start_date` AS `start_date`, `s`.`end_date` AS `end_date`, concat(`w`.`first_name`,' ',`w`.`last_name`) AS `worker_name`, to_days(`s`.`end_date`) - to_days(`s`.`start_date`) AS `total_days`, (to_days(`s`.`end_date`) - to_days(`s`.`start_date`)) * 12 * `wt`.`hourly_rate` AS `total_cost`, `wt`.`worker_type_description` AS `worker_type_description`, `wt`.`hourly_rate` AS `hourly_rate` FROM (((`workers` `w` join `activity_worker` `a` on(`w`.`worker_id` = `a`.`worker_id`)) join `activities` `s` on(`s`.`activity_id` = `a`.`activity_id`)) join `worker_types` `wt` on(`w`.`worker_type_code` = `wt`.`worker_type_code`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `activity_material`
--
ALTER TABLE `activity_material`
  ADD PRIMARY KEY (`activity_material_id`);

--
-- Indexes for table `activity_worker`
--
ALTER TABLE `activity_worker`
  ADD PRIMARY KEY (`activity_worker_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`phase_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `Worker_type_code` (`worker_type_code`);

--
-- Indexes for table `worker_types`
--
ALTER TABLE `worker_types`
  ADD PRIMARY KEY (`worker_type_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activity_material`
--
ALTER TABLE `activity_material`
  MODIFY `activity_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_worker`
--
ALTER TABLE `activity_worker`
  MODIFY `activity_worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `phase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`worker_type_code`) REFERENCES `worker_types` (`worker_type_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
