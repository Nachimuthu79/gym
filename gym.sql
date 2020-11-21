-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2020 at 04:12 PM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `rv_branches`
--

CREATE TABLE `rv_branches` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `allow_new_manager` int(11) NOT NULL,
  `allow_new_trainer` int(11) NOT NULL,
  `allow_new_staff` int(11) NOT NULL,
  `allow_new_client` int(11) NOT NULL,
  `allow_new_appointment` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `data_created` date NOT NULL,
  `data_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_branches`
--

INSERT INTO `rv_branches` (`branch_id`, `name`, `email`, `description`, `address_line1`, `address_line2`, `city`, `phone`, `mobile`, `allow_new_manager`, `allow_new_trainer`, `allow_new_staff`, `allow_new_client`, `allow_new_appointment`, `status`, `data_created`, `data_modified`) VALUES
(1, 'Chennai Branch', 'chennai.ab@gym.com', 'Chennai Gym', '33 St Corner', 'Anna Nagar', 'Chennai', '0422 - 5856258', '987654123', 1, 1, 1, 1, 1, 1, '2020-11-21', '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `rv_branches_timeslot`
--

CREATE TABLE `rv_branches_timeslot` (
  `branch_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `slot1` varchar(100) NOT NULL,
  `slot2` varchar(100) NOT NULL,
  `slot3` varchar(100) NOT NULL,
  `slot4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_branches_timeslot`
--

INSERT INTO `rv_branches_timeslot` (`branch_id`, `day`, `slot1`, `slot2`, `slot3`, `slot4`) VALUES
(1, 'Friday', '06:00', '11:00', '18:00', '23:00'),
(1, 'Monday', '06:00', '11:00', '18:00', '23:00'),
(1, 'Saturday', '06:00', '11:00', '18:00', '23:00'),
(1, 'Thursday', '06:00', '11:00', '18:00', '23:00'),
(1, 'Tuesday', '06:00', '11:00', '18:00', '23:00'),
(1, 'Wednesday', '06:00', '11:00', '18:00', '23:00'),
(2, 'Friday', '', '', '', ''),
(2, 'Monday', '', '', '', ''),
(2, 'Saturday', '', '', '', ''),
(2, 'Sunday', '', '', '', ''),
(2, 'Thursday', '', '', '', ''),
(2, 'Tuesday', '', '', '', ''),
(2, 'Wednesday', '', '', '', ''),
(3, 'Friday', '', '', '', ''),
(3, 'Monday', '', '', '', ''),
(3, 'Saturday', '', '', '', ''),
(3, 'Sunday', '', '', '', ''),
(3, 'Thursday', '', '', '', ''),
(3, 'Tuesday', '', '', '', ''),
(3, 'Wednesday', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rv_employee`
--

CREATE TABLE `rv_employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `salary` decimal(6,2) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_log`
--

CREATE TABLE `rv_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_type` int(11) NOT NULL COMMENT '1 - edit ,2 -delete',
  `log_message` varchar(255) NOT NULL,
  `data_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_log_login`
--

CREATE TABLE `rv_log_login` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `data_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_manager`
--

CREATE TABLE `rv_manager` (
  `manager_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `salary` decimal(6,2) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_super_admin`
--

CREATE TABLE `rv_super_admin` (
  `super_admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `salary` decimal(6,2) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_trainer`
--

CREATE TABLE `rv_trainer` (
  `trainer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `salary` decimal(6,2) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_user`
--

CREATE TABLE `rv_user` (
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'MD5 hash',
  `email_address` varchar(255) NOT NULL,
  `is_blocked` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user`
--

INSERT INTO `rv_user` (`user_id`, `branch_id`, `username`, `password`, `email_address`, `is_blocked`, `is_deleted`, `data_created`, `data_updated`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 0, 0, '2020-11-18 00:00:00', '2020-11-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rv_user_permission`
--

CREATE TABLE `rv_user_permission` (
  `user_id` int(11) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `action_type` int(11) NOT NULL COMMENT '1 -view & get, 2-edit,3-delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_user_role`
--

CREATE TABLE `rv_user_role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user_role`
--

INSERT INTO `rv_user_role` (`role_id`, `name`) VALUES
(1, 'super_admin'),
(2, 'manager'),
(3, 'trainer'),
(4, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `rv_user_role_association`
--

CREATE TABLE `rv_user_role_association` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user_role_association`
--

INSERT INTO `rv_user_role_association` (`user_id`, `role_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rv_branches`
--
ALTER TABLE `rv_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `rv_branches_timeslot`
--
ALTER TABLE `rv_branches_timeslot`
  ADD PRIMARY KEY (`branch_id`,`day`);

--
-- Indexes for table `rv_employee`
--
ALTER TABLE `rv_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `rv_log`
--
ALTER TABLE `rv_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rv_log_login`
--
ALTER TABLE `rv_log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rv_manager`
--
ALTER TABLE `rv_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `rv_super_admin`
--
ALTER TABLE `rv_super_admin`
  ADD PRIMARY KEY (`super_admin_id`);

--
-- Indexes for table `rv_trainer`
--
ALTER TABLE `rv_trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `rv_user`
--
ALTER TABLE `rv_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rv_user_permission`
--
ALTER TABLE `rv_user_permission`
  ADD PRIMARY KEY (`user_id`,`action_name`,`action_type`);

--
-- Indexes for table `rv_user_role`
--
ALTER TABLE `rv_user_role`
  ADD PRIMARY KEY (`role_id`,`name`);

--
-- Indexes for table `rv_user_role_association`
--
ALTER TABLE `rv_user_role_association`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rv_branches`
--
ALTER TABLE `rv_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rv_employee`
--
ALTER TABLE `rv_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_log`
--
ALTER TABLE `rv_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_log_login`
--
ALTER TABLE `rv_log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_manager`
--
ALTER TABLE `rv_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_super_admin`
--
ALTER TABLE `rv_super_admin`
  MODIFY `super_admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_trainer`
--
ALTER TABLE `rv_trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_user`
--
ALTER TABLE `rv_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
