-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 06:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_new`
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
-- Table structure for table `rv_clients`
--

CREATE TABLE `rv_clients` (
  `client_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `alt_contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address_line1` varchar(225) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `source` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_clients`
--

INSERT INTO `rv_clients` (`client_id`, `branch_id`, `name`, `contact`, `alt_contact`, `gender`, `address_line1`, `address_line2`, `city`, `zipcode`, `profession`, `email`, `dob`, `source`, `profile_pic`, `status`, `is_deleted`, `created_by`, `data_created`, `data_modified`) VALUES
(1, 4, 'Loganathan', '9047325752', '9843815532', 'male', '3/35 A thangai pudur', 'MG palayam', 'Tirupur', '638702', 'Software Developer', 'loganathank1994@gmail.com', '1994-08-27', 'Website', '5fd3aa466b8b8.jpeg', 1, 0, 1, '2020-12-09 20:23:21', '2020-12-11 22:50:06'),
(2, 4, 'sssssss', '9047325752', '', 'male', 'sss', 'ss', 'Kundadam', '638702', '', 'ad1234@dd.ddd', '1970-01-01', '', '', 1, 1, 1, '2020-12-10 22:06:34', '2020-12-10 22:15:06'),
(3, 4, 'sssssss', '50840894', '', 'male', 'sss', 'ss', 'Kundadam', '638702', '', 'ad1234@dd.ddd', '1970-01-01', '', '', 1, 1, 1, '2020-12-10 22:07:07', '2020-12-10 22:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `rv_clients_membership`
--

CREATE TABLE `rv_clients_membership` (
  `membership_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'days',
  `fee` decimal(6,2) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - active , 2 - paused , 3 - completed , 3 -removed',
  `payment_status` int(11) NOT NULL COMMENT '1 - success , 2 - pending',
  `pending_amount` decimal(6,2) NOT NULL,
  `activation_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_clients_membership`
--

INSERT INTO `rv_clients_membership` (`membership_id`, `branch_id`, `package_id`, `client_id`, `duration`, `fee`, `status`, `payment_status`, `pending_amount`, `activation_date`, `expire_date`, `created_by`, `is_deleted`, `data_created`, `data_modified`) VALUES
(1, 4, 5, 1, 90, '49.00', 1, 1, '0.00', '2020-12-09', '2021-03-09', 1, 0, '2020-12-09 20:24:15', '2020-12-09 20:24:15'),
(2, 4, 5, 3, 90, '49.00', 2, 2, '4.00', '0000-00-00', '0000-00-00', 1, 0, '2020-12-10 22:09:41', '2020-12-10 22:09:41'),
(3, 4, 5, 3, 90, '49.00', 2, 2, '29.00', '0000-00-00', '0000-00-00', 1, 0, '2020-12-10 22:10:37', '2020-12-10 22:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `rv_expenses`
--

CREATE TABLE `rv_expenses` (
  `expense_id` int(11) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `recipient_name` varchar(1000) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'user_id',
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_expenses`
--

INSERT INTO `rv_expenses` (`expense_id`, `branch_id`, `type`, `date`, `recipient_name`, `amount`, `description`, `payment_method`, `is_deleted`, `created_by`, `data_created`, `data_modified`) VALUES
(5, '4', 'sss', '2020-12-19', 'sss', '50.00', 'sssss', 'Paytm', 1, 1, '2020-12-01 18:59:57', '2020-12-01 18:59:57'),
(6, '4', 'sss', '2020-12-02', 'sssssss', '50.00', 'sssssss', 'Card', 1, 1, '2020-12-01 19:01:13', '2020-12-01 19:30:07'),
(7, '6', 'ssss', '2020-12-18', 'sss', '50.00', 'sssssss', 'Card', 0, 1, '2020-12-01 20:03:56', '2020-12-01 20:03:56'),
(8, '6', 'dd', '2020-12-01', 'ddddd', '50.00', 'ddddddd', 'Cash', 0, 1, '2020-12-01 22:33:40', '2020-12-01 22:33:40'),
(9, '4', '500', '2020-12-24', 'karthi', '100.00', 'pangu', 'Card', 0, 1, '2020-12-12 07:31:10', '2020-12-12 07:31:10'),
(10, '4', 'exp1', '2020-12-12', 'karthi', '9999.99', 'asdsad', 'Cash', 0, 1, '2020-12-12 07:32:37', '2020-12-12 07:32:37');

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
(11, 29, 'sssssss', 'ad1234@dd.ddd', '08745693215', '', 'sss', 'ss', 'Kundadam', '638702', '0.00', '5fd3a8f969b32.png', '', '2020-11-24 22:26:36', '2020-12-11 22:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `rv_packages`
--

CREATE TABLE `rv_packages` (
  `package_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - normal , 2 -group , 3 -personal',
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `cloase_booking_before` int(11) NOT NULL,
  `maximum_classes` int(11) NOT NULL,
  `cancel_policy` int(11) NOT NULL,
  `cancel_booking_before` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_packages`
--

INSERT INTO `rv_packages` (`package_id`, `type`, `branch_id`, `name`, `duration`, `price`, `cloase_booking_before`, `maximum_classes`, `cancel_policy`, `cancel_booking_before`, `status`, `is_deleted`, `data_created`, `data_modified`) VALUES
(1, 1, 4, 'ssssssssss', 15, '2999.00', 0, 0, 0, 0, 1, 1, '2020-11-26 22:04:24', '2020-11-26 22:35:10'),
(2, 2, 4, 'sss', 12, '155.00', 505, 55, 1, 0, 1, 1, '2020-11-26 23:30:10', '2020-11-26 23:48:44'),
(3, 2, 4, 'sssssss', 5, '5.00', 5, 5, 1, 0, 1, 1, '2020-11-26 23:53:57', '2020-11-26 23:53:57'),
(4, 2, 4, 'Summer EOG Pack', 30, '119.00', 2, 15, 0, 0, 1, 0, '2020-11-27 08:15:34', '2020-12-10 23:02:38'),
(5, 1, 4, '3 Month Pack', 90, '49.00', 0, 0, 0, 0, 1, 0, '2020-11-27 08:16:00', '2020-12-08 19:19:55'),
(6, 1, 4, '6 Month Pack', 180, '89.00', 0, 0, 0, 0, 1, 0, '2020-11-27 08:16:10', '2020-12-08 19:20:15'),
(7, 3, 4, 'Budget Package', 180, '15.00', 2, 60, 1, 2, 1, 0, '2020-11-27 08:38:20', '2020-12-10 23:04:44'),
(8, 1, 4, '1 Year Pack', 365, '149.00', 0, 0, 0, 0, 1, 0, '2020-12-08 19:20:34', '2020-12-08 19:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `rv_package_group_class_types`
--

CREATE TABLE `rv_package_group_class_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_package_group_class_types`
--

INSERT INTO `rv_package_group_class_types` (`id`, `name`) VALUES
(1, 'Dance'),
(2, 'Zumba'),
(3, 'Kick Boxing'),
(4, 'Yoga'),
(5, 'Sky Fitness Slot'),
(6, 'Sky Fitness'),
(7, 'Workout');

-- --------------------------------------------------------

--
-- Table structure for table `rv_package_group_class_types_assoc`
--

CREATE TABLE `rv_package_group_class_types_assoc` (
  `package_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_package_group_class_types_assoc`
--

INSERT INTO `rv_package_group_class_types_assoc` (`package_id`, `class_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `rv_package_pesonal_trainer_assoc`
--

CREATE TABLE `rv_package_pesonal_trainer_assoc` (
  `trainer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_package_pesonal_trainer_assoc`
--

INSERT INTO `rv_package_pesonal_trainer_assoc` (`trainer_id`, `package_id`) VALUES
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `rv_payment`
--

CREATE TABLE `rv_payment` (
  `payment_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_for` int(11) NOT NULL COMMENT '1 - individual membership',
  `payment_amount` double(6,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0 - pending , 1 - success , 2 - denited',
  `membership_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_payment`
--

INSERT INTO `rv_payment` (`payment_id`, `branch_id`, `payment_for`, `payment_amount`, `payment_method`, `payment_reference`, `payment_status`, `membership_id`, `client_id`, `package_id`, `created_by`, `is_deleted`, `data_created`, `data_modified`) VALUES
(1, 4, 1, 12.00, 'Card', 'No. ABDC1548940', 1, 1, 1, 5, 1, 0, '2020-12-09 20:24:15', '2020-12-09 20:24:15'),
(2, 4, 1, 30.00, 'Cheque', 'Cheque No. 547855', 1, 1, 1, 5, 1, 0, '2020-12-09 20:24:55', '2020-12-09 20:24:55'),
(3, 4, 1, 7.00, 'Cheque', '', 2, 1, 1, 5, 1, 0, '2020-12-09 20:25:23', '2020-12-09 20:25:23'),
(4, 4, 1, 7.00, 'Cash', '', 1, 1, 1, 5, 1, 0, '2020-12-09 20:25:57', '2020-12-09 20:25:57'),
(5, 4, 1, 20.00, 'Cash', 'aaa', 1, 3, 3, 5, 1, 0, '2020-12-10 22:10:37', '2020-12-10 22:10:37'),
(6, 4, 1, 10.00, 'Cash', '', 1, 2, 3, 5, 1, 0, '2020-12-10 22:12:59', '2020-12-10 22:12:59'),
(7, 4, 1, 10.00, 'Cash', '', 1, 2, 3, 5, 1, 0, '2020-12-10 22:14:13', '2020-12-10 22:14:13'),
(8, 4, 1, 25.00, 'Cash', '', 1, 2, 3, 5, 1, 0, '2020-12-10 22:14:40', '2020-12-10 22:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `rv_payment_actions`
--

CREATE TABLE `rv_payment_actions` (
  `payment_action_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `change_status` int(11) NOT NULL COMMENT '0 - pending , 1 - success , 2 - denited',
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_payment_actions`
--

INSERT INTO `rv_payment_actions` (`payment_action_id`, `payment_id`, `user_id`, `change_status`, `data_created`, `data_modified`) VALUES
(3, 7, 1, 0, '2020-12-10 22:14:13', '2020-12-10 22:14:13'),
(4, 8, 1, 1, '2020-12-10 22:14:40', '2020-12-10 22:14:40'),
(5, 7, 1, 1, '2020-12-10 22:14:52', '2020-12-10 22:14:52'),
(6, 6, 1, 1, '2020-12-10 22:14:55', '2020-12-10 22:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `rv_staff`
--

CREATE TABLE `rv_staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email_address` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `employee_type` int(10) NOT NULL,
  `dob` varchar(256) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `monthly_salary` varchar(256) NOT NULL,
  `sales_target` varchar(256) NOT NULL,
  `monthly_target` varchar(256) NOT NULL,
  `daily_target` varchar(256) NOT NULL,
  `address_line1` varchar(500) NOT NULL,
  `address_line2` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `document` varchar(256) DEFAULT NULL,
  `profile_pic` varchar(256) DEFAULT NULL,
  `discount` varchar(200) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_staff`
--

INSERT INTO `rv_staff` (`staff_id`, `user_id`, `name`, `email_address`, `username`, `employee_type`, `dob`, `gender`, `phone`, `monthly_salary`, `sales_target`, `monthly_target`, `daily_target`, `address_line1`, `address_line2`, `city`, `document`, `profile_pic`, `discount`, `branch_id`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 42, 'staff', 'staff@gmail.com', 'staff', 1, '12/17/2020', 'female', '1234567890', '123', '123', '123', '123', 'asfdsafd', 'asfsaf', 'asfsaf', NULL, NULL, '123', 4, '1', '2020-12-17 17:12:54', '2020-12-17 17:12:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rv_trainer`
--

CREATE TABLE `rv_trainer` (
  `trainer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `monthly_salary` varchar(256) NOT NULL,
  `training_commision` varchar(256) NOT NULL,
  `sales_target` varchar(256) NOT NULL,
  `daily_target` varchar(256) NOT NULL,
  `monthly_target` varchar(256) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(256) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `status` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_trainer`
--

INSERT INTO `rv_trainer` (`trainer_id`, `user_id`, `name`, `email_address`, `username`, `dob`, `phone`, `gender`, `monthly_salary`, `training_commision`, `sales_target`, `daily_target`, `monthly_target`, `address_line1`, `address_line2`, `city`, `profile_pic`, `document`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 41, 'Nachimuthu', 'nachi@gmail.com', 'nachi', '12/16/2020', '1234567890', 'male', '213', '231', '123', '123', '123', 'sadsad', 'sadsad', '', '5fdb8690d55e5.jpeg', NULL, '1', '2020-12-17 16:25:52', '2020-12-17 16:25:52', 0);

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
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rv_user`
--

INSERT INTO `rv_user` (`user_id`, `branch_id`, `username`, `password`, `email_address`, `name`, `status`, `is_deleted`, `created_by`, `data_created`, `data_modified`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'Admin', 1, 0, 0, '2020-11-18 00:00:00', '2020-11-18 00:00:00'),
(4, 4, 'fesdgefgfg', '3c1d4baa14ad36f3e5bfb6598caa3995', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 20:47:06', '2020-11-23 20:47:06'),
(5, 5, 'sssssss69518545', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:53:30', '2020-11-23 20:53:30'),
(6, 5, 'sssssss61316607', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:53:37', '2020-11-23 20:53:37'),
(7, 5, 'sssssss69631330', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:54:22', '2020-11-23 20:54:22'),
(8, 5, 'sssssss83302853', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:55:54', '2020-11-23 20:55:54'),
(9, 5, 'sssssss27205821', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:57:00', '2020-11-23 20:57:00'),
(10, 5, 'sssssss96982462', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:57:20', '2020-11-23 20:57:20'),
(11, 5, 'sssssss58001179', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:58:51', '2020-11-23 20:58:51'),
(12, 5, 'sssssss', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ss@dd.ddd', '', 0, 0, 0, '2020-11-23 20:59:17', '2020-11-23 20:59:17'),
(13, 5, 'admin257', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 21:03:15', '2020-11-23 21:03:15'),
(14, 5, 'admin413', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 21:03:19', '2020-11-23 21:03:19'),
(15, 5, 'admin818', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 21:03:33', '2020-11-23 21:03:33'),
(16, 5, 'admin445', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 21:06:07', '2020-11-23 21:06:07'),
(17, 5, 'admin214', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', '', 0, 0, 0, '2020-11-23 21:06:25', '2020-11-23 21:06:25'),
(18, 5, 'ssssss', '2d02e669731cbade6a64b58d602cf2a4', 'ass@ddd.ddd', '', 0, 0, 0, '2020-11-23 21:45:59', '2020-11-23 21:45:59'),
(19, 5, 'sssssssssss', 'b330cf2425c6ac1561c63f825e680a53', 'ass@ddd.ddd', '', 0, 0, 0, '2020-11-23 21:46:51', '2020-11-23 21:46:51'),
(20, 5, 'srrrrrr', '338d811d532553557ca33be45b6bde55', 'ass@ddd.ddd', '', 0, 0, 0, '2020-11-23 21:47:23', '2020-11-23 21:47:23'),
(21, 5, 'ssssssssssew', '338d811d532553557ca33be45b6bde55', 'ad1234@dd.ddd', '', 1, 0, 0, '2020-11-23 21:48:37', '2020-11-24 22:17:27'),
(22, 4, 'sssss', '2d02e669731cbade6a64b58d602cf2a4', 'ad1234@dd.ddd', '', 0, 1, 0, '2020-11-24 19:31:33', '2020-11-24 19:31:33'),
(23, 4, 'adminssss', 'a03fd6e43c16b44429d829dffa31321a', 'ad1234@dd.ddd', '', 0, 1, 0, '2020-11-24 19:48:13', '2020-11-24 19:48:13'),
(24, 4, 'a', '8f60c8102d29fcd525162d02eed4566b', 'ad1234@dd.ddd', '', 0, 1, 0, '2020-11-24 20:10:19', '2020-11-24 20:10:19'),
(25, 4, 'asssss', '033c91317f9b6795106a825cf8ef773d', 'ad1234@dd.ddd', '', 0, 1, 0, '2020-11-24 20:10:39', '2020-11-24 20:10:39'),
(26, 4, 'adminsss', 'a03fd6e43c16b44429d829dffa31321a', 'ad1234@dd.ddd', '', 0, 1, 0, '2020-11-24 20:16:27', '2020-11-24 20:16:27'),
(27, 5, 'adminssssss', '033c91317f9b6795106a825cf8ef773d', 'ad1234@dd.dddsssssss', '', 1, 0, 0, '2020-11-24 20:31:55', '2020-11-24 22:13:14'),
(28, 5, 'adminssssssss', 'b330cf2425c6ac1561c63f825e680a53', 'ad1234@dd.ddd', '', 1, 0, 0, '2020-11-24 20:37:15', '2020-11-24 20:37:15'),
(29, 4, 'admins', '16fcb1091f8a0cc70c96e2ff97fdd213', 'ad1234@dd.ddd', 'sssssss', 1, 0, 0, '2020-11-24 22:26:36', '2020-12-11 22:44:33'),
(30, 7, 'dddddd', 'ef800207a3648c7c1ef3e9fe544f17f0', 'ss@dddd.dd', 'sss', 1, 0, 0, '2020-12-07 11:12:01', '2020-12-07 11:12:01'),
(31, 4, 'dddddddddddddd', '0687b8866cf13d6eeed51336cfc0365c', 'ddddd@edd.ddd', 'ddd', 1, 0, 0, '2020-12-07 19:18:54', '2020-12-07 19:18:54'),
(32, 4, 'dddddddd', '706db108edd9c5bcaca5e8b17a3cad25', 'ssssssss@d.dddd', 'ssssss', 1, 0, 0, '2020-12-07 19:31:56', '2020-12-07 19:31:56'),
(33, 4, 'sssssssssssssssss', '594f803b380a41396ed63dca39503542', 'ad1234@dd.ddd', 'aaa', 1, 0, 0, '2020-12-07 19:35:11', '2020-12-07 19:35:11'),
(34, 4, 'ddddddddddddddd', 'c9bb335d49576bb55ef2fafab5112ccd', 'ddd@dd.dddd', 'ddddd', 1, 0, 0, '2020-12-07 19:38:24', '2020-12-07 19:38:24'),
(35, 4, 'karthi', 'b678c60ee60fd4374df211724aedf4f7', 'karthi@gg.cc', 'Karthi Keyan', 1, 0, 0, '2020-12-09 21:58:49', '2020-12-09 21:58:49'),
(41, 4, 'nachi', '449367a9bbc5ea9a98b80a6a7c453128', 'nachi@gmail.com', 'Nachimuthu', 1, 0, 0, '2020-12-17 17:25:52', '2020-12-17 17:25:52'),
(42, 4, 'staff', '1253208465b1efa876f982d8a9e73eef', 'staff@gmail.com', 'staff', 1, 0, 0, '2020-12-17 18:12:54', '2020-12-17 18:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `rv_user_documents`
--

CREATE TABLE `rv_user_documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_type` int(11) NOT NULL,
  `document_name` varchar(250) NOT NULL,
  `document_url` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rv_user_documents`
--

INSERT INTO `rv_user_documents` (`id`, `user_id`, `document_type`, `document_name`, `document_url`, `created_at`, `updated_at`) VALUES
(1, 41, 1, 'test', 'test.pdf', '2020-12-17 17:03:54', '2020-12-17 17:03:54'),
(3, 42, 1, 'test', 'test.pdf', '2020-12-17 17:17:33', '2020-12-17 17:17:33');

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
(29, 'trainer'),
(36, 'client'),
(36, 'dashboard'),
(38, 'client'),
(38, 'dashboard'),
(39, 'client'),
(39, 'dashboard'),
(39, 'trainer'),
(41, 'dashboard'),
(42, 'dashboard'),
(42, 'trainer');

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
(29, 2),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 4),
(40, 4),
(41, 3),
(42, 4);

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
-- Indexes for table `rv_clients`
--
ALTER TABLE `rv_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `rv_clients_membership`
--
ALTER TABLE `rv_clients_membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `rv_expenses`
--
ALTER TABLE `rv_expenses`
  ADD PRIMARY KEY (`expense_id`);

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
-- Indexes for table `rv_packages`
--
ALTER TABLE `rv_packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `rv_package_group_class_types`
--
ALTER TABLE `rv_package_group_class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rv_package_group_class_types_assoc`
--
ALTER TABLE `rv_package_group_class_types_assoc`
  ADD PRIMARY KEY (`package_id`,`class_id`);

--
-- Indexes for table `rv_package_pesonal_trainer_assoc`
--
ALTER TABLE `rv_package_pesonal_trainer_assoc`
  ADD PRIMARY KEY (`trainer_id`,`package_id`);

--
-- Indexes for table `rv_payment`
--
ALTER TABLE `rv_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rv_payment_actions`
--
ALTER TABLE `rv_payment_actions`
  ADD PRIMARY KEY (`payment_action_id`);

--
-- Indexes for table `rv_staff`
--
ALTER TABLE `rv_staff`
  ADD PRIMARY KEY (`staff_id`);

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
-- Indexes for table `rv_user_documents`
--
ALTER TABLE `rv_user_documents`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `rv_clients`
--
ALTER TABLE `rv_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rv_clients_membership`
--
ALTER TABLE `rv_clients_membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rv_expenses`
--
ALTER TABLE `rv_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `rv_packages`
--
ALTER TABLE `rv_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rv_package_group_class_types`
--
ALTER TABLE `rv_package_group_class_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rv_payment`
--
ALTER TABLE `rv_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rv_payment_actions`
--
ALTER TABLE `rv_payment_actions`
  MODIFY `payment_action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rv_staff`
--
ALTER TABLE `rv_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rv_trainer`
--
ALTER TABLE `rv_trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rv_user`
--
ALTER TABLE `rv_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rv_user_documents`
--
ALTER TABLE `rv_user_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
