-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2020 at 10:47 AM
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
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_branches`
--

INSERT INTO `rv_branches` (`branch_id`, `name`, `email`, `description`, `address_line1`, `address_line2`, `city`, `phone`, `mobile`, `allow_new_manager`, `allow_new_trainer`, `allow_new_staff`, `allow_new_client`, `allow_new_appointment`, `status`, `is_deleted`, `data_created`, `data_modified`) VALUES
(4, 'Coimbatore Branch', 'cbe@gamil.com', 'Coimbatore Branch', '33 Tatabad', 'Ghandhipuram', 'Coimbatore', '0422 - 4785962', '8745693215', 1, 1, 1, 1, 1, 0, 0, '2020-11-21 00:00:00', '2020-11-21 00:00:00'),
(5, 'Trichy Branch', 'trcy@gmail.com', 'Trichy Branch', '55,Seb Colony', 'Malaikottai', 'Trichy', '0462 - 4875250', '7896541230', 1, 1, 1, 1, 1, 0, 0, '2020-11-21 00:00:00', '2020-11-21 00:00:00'),
(6, 'Nachumuthu Gym', 'kc@naa.com', 'Sample', 'Kunguma palayam', 'Dharapuram', 'Tirupur', '04258-4529865', '9632587412', 1, 1, 1, 1, 1, 0, 0, '2020-11-21 00:00:00', '2020-11-21 00:00:00'),
(7, 'Nellai Branch', 'nella@gmail.com', 'Sample', '35 A Street', 'GN Pudur', 'Nellai', '0468-896523', '7896542301', 1, 1, 1, 1, 1, 0, 0, '2020-11-23 20:09:03', '2020-11-23 20:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `rv_branches_timeslot`
--

CREATE TABLE `rv_branches_timeslot` (
  `slot_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `day` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `maximum_booking` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_branches_timeslot`
--

INSERT INTO `rv_branches_timeslot` (`slot_id`, `branch_id`, `name`, `day`, `start_time`, `end_time`, `status`, `is_deleted`, `maximum_booking`, `data_created`, `data_modified`) VALUES
(1, 1, 'New times sot', 'Sunday', '8:01 PM', '10:01 PM', 1, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 6, 'Early Morning', 'Monday', '5:30 AM', '7:00 AM', 0, 0, 25, '0000-00-00 00:00:00', '2020-11-22 21:46:06'),
(6, 6, 'Morning', 'Monday', '7:30 AM', '9:00 AM', 1, 0, 17, '2020-11-22 21:03:04', '0000-00-00 00:00:00'),
(7, 6, 'Evening ', 'Monday', '5:30 PM', '8:00 PM', 1, 0, 26, '2020-11-22 21:04:45', '0000-00-00 00:00:00'),
(8, 6, 'Night', 'Monday', '8:00 PM', '10:00 PM', 1, 0, 24, '2020-11-22 21:05:17', '0000-00-00 00:00:00'),
(9, 7, 'Morining', 'Monday', '6:00 AM', '9:00 AM', 1, 0, 32, '2020-11-23 20:09:56', '2020-11-23 20:09:56'),
(10, 7, 'Evening', 'Monday', '6:00 AM', '10:00 AM', 1, 0, 41, '2020-11-23 20:10:33', '2020-11-23 20:10:33'),
(11, 7, 'Moring', 'Tuesday', '6:00 AM', '9:00 AM', 1, 0, 15, '2020-11-23 20:11:10', '2020-11-23 20:11:10');

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
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `salary` decimal(6,2) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_manager`
--

INSERT INTO `rv_manager` (`manager_id`, `user_id`, `name`, `email_address`, `mobile`, `gender`, `address_line1`, `address_line2`, `city`, `zipcode`, `salary`, `profile_pic`, `document`, `data_created`, `data_modified`) VALUES
(1, 19, 'ssss', 'ass@ddd.ddd', 'sss', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-23 21:46:51', '2020-11-23 21:46:51'),
(2, 20, 'ssss', 'ass@ddd.ddd', 'sss', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-23 21:47:24', '2020-11-23 21:47:24'),
(3, 21, 'google.com', 'ad1234@dd.ddd', '8745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-23 21:48:37', '2020-11-24 22:17:27'),
(4, 22, 'sss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 19:31:34', '2020-11-24 19:31:34'),
(5, 23, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 19:48:13', '2020-11-24 19:48:13'),
(6, 24, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 20:10:20', '2020-11-24 20:10:20'),
(7, 25, 'sssssssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 20:10:39', '2020-11-24 20:10:39'),
(8, 26, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 20:16:27', '2020-11-24 20:16:27'),
(9, 27, 'ssssssss', 'ad1234@dd.dddsssssss', '08745693215', '', 'ssssssssssss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 20:31:55', '2020-11-24 22:13:14'),
(10, 28, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 20:37:15', '2020-11-24 20:37:15'),
(11, 29, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '', '', '2020-11-24 22:26:36', '2020-11-24 22:26:36');

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
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user`
--

INSERT INTO `rv_user` (`user_id`, `branch_id`, `username`, `password`, `email_address`, `status`, `is_deleted`, `data_created`, `data_modified`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 1, 0, '2020-11-18 00:00:00', '2020-11-18 00:00:00'),
(4, 4, 'fesdgefgfg', '3c1d4baa14ad36f3e5bfb6598caa3995', 'ad1234@dd.ddd', 0, 0, '2020-11-23 20:47:06', '2020-11-23 20:47:06'),
(5, 5, 'sssssss69518545', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:53:30', '2020-11-23 20:53:30'),
(6, 5, 'sssssss61316607', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:53:37', '2020-11-23 20:53:37'),
(7, 5, 'sssssss69631330', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:54:22', '2020-11-23 20:54:22'),
(8, 5, 'sssssss83302853', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:55:54', '2020-11-23 20:55:54'),
(9, 5, 'sssssss27205821', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:57:00', '2020-11-23 20:57:00'),
(10, 5, 'sssssss96982462', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:57:20', '2020-11-23 20:57:20'),
(11, 5, 'sssssss58001179', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:58:51', '2020-11-23 20:58:51'),
(12, 5, 'sssssss', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', 0, 0, '2020-11-23 20:59:17', '2020-11-23 20:59:17'),
(13, 5, 'admin257', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 0, 0, '2020-11-23 21:03:15', '2020-11-23 21:03:15'),
(14, 5, 'admin413', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 0, 0, '2020-11-23 21:03:19', '2020-11-23 21:03:19'),
(15, 5, 'admin818', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 0, 0, '2020-11-23 21:03:33', '2020-11-23 21:03:33'),
(16, 5, 'admin445', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 0, 0, '2020-11-23 21:06:07', '2020-11-23 21:06:07'),
(17, 5, 'admin214', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 0, 0, '2020-11-23 21:06:25', '2020-11-23 21:06:25'),
(18, 5, 'ssssss', '2d02e669731cbade6a64b58d602cf2a4', 'ass@ddd.ddd', 0, 0, '2020-11-23 21:45:59', '2020-11-23 21:45:59'),
(19, 5, 'sssssssssss', 'b330cf2425c6ac1561c63f825e680a53', 'ass@ddd.ddd', 0, 0, '2020-11-23 21:46:51', '2020-11-23 21:46:51'),
(20, 5, 'srrrrrr', '338d811d532553557ca33be45b6bde55', 'ass@ddd.ddd', 0, 0, '2020-11-23 21:47:23', '2020-11-23 21:47:23'),
(21, 5, 'ssssssssssew', '338d811d532553557ca33be45b6bde55', 'ad1234@dd.ddd', 1, 0, '2020-11-23 21:48:37', '2020-11-24 22:17:27'),
(22, 4, 'sssss', '2d02e669731cbade6a64b58d602cf2a4', 'ad1234@dd.ddd', 0, 1, '2020-11-24 19:31:33', '2020-11-24 19:31:33'),
(23, 4, 'adminssss', 'a03fd6e43c16b44429d829dffa31321a', 'ad1234@dd.ddd', 0, 1, '2020-11-24 19:48:13', '2020-11-24 19:48:13'),
(24, 4, 'a', '8f60c8102d29fcd525162d02eed4566b', 'ad1234@dd.ddd', 0, 1, '2020-11-24 20:10:19', '2020-11-24 20:10:19'),
(25, 4, 'asssss', '033c91317f9b6795106a825cf8ef773d', 'ad1234@dd.ddd', 0, 1, '2020-11-24 20:10:39', '2020-11-24 20:10:39'),
(26, 4, 'adminsss', 'a03fd6e43c16b44429d829dffa31321a', 'ad1234@dd.ddd', 0, 1, '2020-11-24 20:16:27', '2020-11-24 20:16:27'),
(27, 5, 'adminssssss', '033c91317f9b6795106a825cf8ef773d', 'ad1234@dd.dddsssssss', 1, 0, '2020-11-24 20:31:55', '2020-11-24 22:13:14'),
(28, 5, 'adminssssssss', 'b330cf2425c6ac1561c63f825e680a53', 'ad1234@dd.ddd', 1, 0, '2020-11-24 20:37:15', '2020-11-24 20:37:15'),
(29, 4, 'admins', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 1, 0, '2020-11-24 22:26:36', '2020-11-24 22:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `rv_user_permission`
--

CREATE TABLE `rv_user_permission` (
  `user_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user_permission`
--

INSERT INTO `rv_user_permission` (`user_id`, `page`) VALUES
(11, 'client'),
(11, 'dashboard'),
(11, 'staff'),
(11, 'trainer'),
(12, 'client'),
(12, 'dashboard'),
(12, 'staff'),
(12, 'trainer'),
(15, 'client'),
(15, 'dashboard'),
(15, 'staff'),
(15, 'trainer'),
(17, 'client'),
(17, 'dashboard'),
(17, 'staff'),
(17, 'trainer'),
(18, 'client'),
(18, 'dashboard'),
(18, 'staff'),
(18, 'trainer'),
(19, 'client'),
(19, 'dashboard'),
(19, 'staff'),
(19, 'trainer'),
(20, 'client'),
(20, 'dashboard'),
(20, 'staff'),
(20, 'trainer'),
(21, 'client'),
(21, 'dashboard'),
(21, 'staff'),
(21, 'trainer'),
(22, 'client'),
(22, 'dashboard'),
(22, 'staff'),
(22, 'trainer'),
(23, 'client'),
(23, 'dashboard'),
(23, 'staff'),
(23, 'trainer'),
(24, 'client'),
(24, 'dashboard'),
(24, 'staff'),
(24, 'trainer'),
(25, 'client'),
(25, 'dashboard'),
(25, 'staff'),
(25, 'trainer'),
(26, 'client'),
(26, 'dashboard'),
(26, 'staff'),
(26, 'trainer'),
(27, 'client'),
(27, 'dashboard'),
(27, 'staff'),
(27, 'trainer'),
(28, 'dashboard'),
(29, 'client'),
(29, 'dashboard'),
(29, 'staff'),
(29, 'trainer');

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
(4, 'staff');

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
(1, 1),
(5, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2);

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
  ADD PRIMARY KEY (`slot_id`);

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
  ADD PRIMARY KEY (`user_id`,`page`);

--
-- Indexes for table `rv_user_role`
--
ALTER TABLE `rv_user_role`
  ADD PRIMARY KEY (`role_id`,`name`);

--
-- Indexes for table `rv_user_role_association`
--
ALTER TABLE `rv_user_role_association`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rv_branches`
--
ALTER TABLE `rv_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rv_branches_timeslot`
--
ALTER TABLE `rv_branches_timeslot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rv_trainer`
--
ALTER TABLE `rv_trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rv_user`
--
ALTER TABLE `rv_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
