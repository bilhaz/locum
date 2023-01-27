-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2023 at 06:13 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sra_l_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(155) NOT NULL AUTO_INCREMENT,
  `cl_reg_as` varchar(500) DEFAULT NULL,
  `cl_h_name` varchar(500) DEFAULT NULL,
  `cl_county` varchar(500) DEFAULT NULL,
  `cl_eircode` varchar(500) DEFAULT NULL,
  `cl_cont_name` varchar(500) DEFAULT NULL,
  `cl_gender` varchar(155) DEFAULT NULL,
  `cl_cont_email` varchar(500) NOT NULL,
  `cl_cont_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cl_cont_phone` varchar(500) DEFAULT NULL,
  `cl_cont_desig` varchar(255) DEFAULT NULL,
  `cl_address` varchar(500) DEFAULT NULL,
  `cl_status` varchar(12) NOT NULL,
  `cl_created` datetime NOT NULL,
  `cl_updated` datetime NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_reg_as`, `cl_h_name`, `cl_county`, `cl_eircode`, `cl_cont_name`, `cl_gender`, `cl_cont_email`, `cl_cont_pwd`, `cl_cont_phone`, `cl_cont_desig`, `cl_address`, `cl_status`, `cl_created`, `cl_updated`) VALUES
(1, '3', 'Alkhidmat Hospital', 'pesh', '250000', 'malak niaz', 'M', 'alkhidmat@akh.com', '$2y$10$QdnoPJ1SYUaBYytymNm9CePeOGRTeD.kjTpJjmoOKWGuFlVsc8FFe', '7865435678', 'xyz', 'FerozAbad Colony', '1', '2023-01-21 12:00:31', '2023-01-26 22:55:38'),
(2, '2', 'Hayatabad Medical center', 'Khyber pukhtun khwa', '25600', 'Akash Khan123', 'M', 'hmc@hmc.pk', '$2y$10$C4HmZwTjdiRXiduu4jHDIu0wn/5a.3jQqedajL7QcEHo0UlpByn1G', '3456787996', 'CEO', 'House#392', '1', '2023-01-21 12:06:36', '2023-01-26 18:22:40'),
(3, NULL, NULL, NULL, NULL, NULL, '', 'test@hosp.com', '$2y$10$TkMRp8ezUzMzioiGf20bgOP09y0Hcy1VUtulbcoGpzIzZCVyboUyG', NULL, NULL, NULL, '1', '2023-01-21 12:14:11', '2023-01-21 12:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `cl_reg_cat`
--

DROP TABLE IF EXISTS `cl_reg_cat`;
CREATE TABLE IF NOT EXISTS `cl_reg_cat` (
  `reg_cat_id` int(155) NOT NULL AUTO_INCREMENT,
  `reg_cat_name` varchar(255) NOT NULL,
  `reg_cat_created` datetime NOT NULL,
  `reg_cat_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`reg_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cl_reg_cat`
--

INSERT INTO `cl_reg_cat` (`reg_cat_id`, `reg_cat_name`, `reg_cat_created`, `reg_cat_updated`) VALUES
(1, 'Doctor', '2023-01-24 07:43:30', '2023-01-24 07:43:30'),
(2, 'Nurse', '2023-01-24 07:43:30', '2023-01-24 07:43:30'),
(3, 'HealthCare Assistant', '2023-01-24 07:43:30', '2023-01-24 07:43:30'),
(4, 'Midwife', '2023-01-24 07:43:30', '2023-01-24 07:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(155) NOT NULL AUTO_INCREMENT,
  `emp_spec1` varchar(500) DEFAULT NULL,
  `emp_spec2` varchar(500) DEFAULT NULL,
  `emp_spec3` varchar(500) DEFAULT NULL,
  `emp_grade1` varchar(500) DEFAULT NULL,
  `emp_grade2` varchar(500) DEFAULT NULL,
  `emp_grade3` varchar(500) DEFAULT NULL,
  `emp_fname` varchar(500) DEFAULT NULL,
  `emp_lname` varchar(500) DEFAULT NULL,
  `emp_email` varchar(500) NOT NULL,
  `emp_gender` varchar(155) DEFAULT NULL,
  `emp_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_phone` varchar(500) DEFAULT NULL,
  `emp_imcr_no` varchar(500) DEFAULT NULL,
  `emp_pps_no` int(155) DEFAULT NULL,
  `emp_cv` varchar(500) DEFAULT NULL,
  `emp_imc_cert` varchar(500) DEFAULT NULL,
  `emp_gv_cert` varchar(500) DEFAULT NULL,
  `emp_rec_refer` varchar(500) DEFAULT NULL,
  `emp_passport` varchar(500) DEFAULT NULL,
  `emp_occup_health` varchar(500) DEFAULT NULL,
  `emp_work_permit` varchar(500) DEFAULT NULL,
  `emp_status` varchar(12) DEFAULT NULL,
  `emp_created` datetime NOT NULL,
  `emp_updated` datetime NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_spec1`, `emp_spec2`, `emp_spec3`, `emp_grade1`, `emp_grade2`, `emp_grade3`, `emp_fname`, `emp_lname`, `emp_email`, `emp_gender`, `emp_pwd`, `emp_phone`, `emp_imcr_no`, `emp_pps_no`, `emp_cv`, `emp_imc_cert`, `emp_gv_cert`, `emp_rec_refer`, `emp_passport`, `emp_occup_health`, `emp_work_permit`, `emp_status`, `emp_created`, `emp_updated`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shahid@prime.edu.pk', '', '$2y$10$r/.rBm5s1H8g5uR9KeJkS.ryJo6EU.G6Wm3f6xbEoxMkZdtDdobbG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-01-18 09:58:07', '2023-01-25 13:11:38'),
(2, '1', '1', '3', '1', '1', '4', 'abc', 'x7HZXbWPkV', 'okasha@gmail.com', 'M', '$2y$10$J9x2v52mwYt/8aKzDFy3wOHY3qsc7bWkQGV/JZcJWq/.ySaJmyfwi', '924524', '714057', 725133, 'TmVEMytzYzJqK05yUWp3N3VzazZkVFdiOEFNSy9GSXRSbWVOSlBYZW5XOD0=', 'ZzE4TGVHYkFNc1o1NlVjQmJadkMzUG5SeVdwMkZOTlhyR2EvNUxZQTZuUT0=', 'VlY1RFpjOFZnSzNEMmZRRE8zb3hhVmVCbStva25FLy9Cc0dqeWtLVFRDQT0=', 'ZzE4TGVHYkFNc1o1NlVjQmJadkMzTjAvekFoRElhYjVDNnFqUllKQXFmWT0=', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', '1', '2023-01-18 11:35:25', '2023-01-26 18:32:13'),
(3, 'yJUX7csFaF', 'zcSRZKFIYv', '', 'myKnyGx0l8', 'AKGMjse3UN', '', 'qeq8aHtKCC', 'gRDsECihGB', 'test@pmc.com', '', '$2y$10$m96xc1NSjcLyD0b...VoT.BzXdmJTbhjr.E4/ajbv6R7V92.ptKty', '533106', '224990', 132701, 'bW9OMGIwMU4xaitLY0RmRVcrR3FPZz09', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-01-18 22:06:51', '2023-01-20 12:10:43'),
(4, 'niQAouL4jM', 'F0oAeeh1Nr', '', 'phQBx224pb', 'l9CtLRZz5Q', '', 'ijSl4emsLS', 'LCJZPoAsTb', 'kth@prime.edu.pk', '', '$2y$10$Yi/XQdvqss4Rsq6/WnYXwePVEKjqM1wPAfutoRxUpwHlNjwiTwRKm', '949780', '855614', 206775, 'WVpmWDlQbTF0ZWpGMHJjMnZEcWk1V1p3Zy8vcDlzVzkxV09jVE4wRWpzVT0=', 'T1c1V0dJYXJkcVNlQXphNFdlZFFPQT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'MU5VdjZ4djkyS3FGS085ZHVmSFhMZz09', 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09', 'U0gyQzhUUzVCNkppL2d5L3JDYzU3MjUrNUNZbWd1dDRnSDhKUkh3MFRIRWFLZ01lbFpNYzlNVXRNdEZuT2V3V2VvNFNXWE55WFRWWUlWQ01SMXpkb3c9PQ==', 'ejl3enJOeDFUMFhhb2FIbmR5eklnUT09', '1', '2023-01-18 22:48:11', '2023-01-20 12:13:37'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mth@prime.edu.pk', '', '$2y$10$shMi9imDGi822cqijxVK3OOU9aokpowvNxTwnMKMuGMbxGJ73bzBi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-01-18 22:52:54', '2023-01-20 12:15:04'),
(6, 'KuNAVYBCYo', 'J50YD0Upsc', '', 'cyEAHyOfVs', 'MYbtDc7ite', '', 'zH32ITMbQT', 'UEz0fMBDTk', 'pth@prime.edu.pk', '', '$2y$10$amei78yjv1UfHIZNsZ08muNgOfQszsqSnodveQJf5X4wJ0kLjT26a', '872757', '6985934567', 215656, 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09.jpg', 'NjJxQVhOQnpwNERFN3dseWJnN2pyZz09.jpg', 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09.jpg', 'U0gyQzhUUzVCNkppL2d5L3JDYzU3MjUrNUNZbWd1dDRnSDhKUkh3MFRIRWFLZ01lbFpNYzlNVXRNdEZuT2V3V2VvNFNXWE55WFRWWUlWQ01SMXpkb3c9PQ==.jpg', 'ejl3enJOeDFUMFhhb2FIbmR5eklnUT09.jpg', 'WVZ4UGJ6UTlJZXByZURSTFRNMlRUaDhGbkM3QU5RWVVNSDQzWjBGZGhzakpTWDlKdVBGN0xaN0ZUWjlRd2ozdA==.jpg', 'WVpmWDlQbTF0ZWpGMHJjMnZEcWk1V1p3Zy8vcDlzVzkxV09jVE4wRWpzVT0=.jpg', '0', '2023-01-18 22:58:38', '2023-01-20 12:13:42'),
(7, '2', '5', '4', '3', '5', '2', 'okashaaa', 'ok', 'ok@gmail.com', '', 'ok@gmail.com', '786543', '67897654', 4567890, 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', '1', '2023-01-24 12:27:19', '2023-01-24 12:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `emp_grade`
--

DROP TABLE IF EXISTS `emp_grade`;
CREATE TABLE IF NOT EXISTS `emp_grade` (
  `grade_id` int(155) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(255) NOT NULL,
  `grade_created` datetime NOT NULL,
  `grade_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_grade`
--

INSERT INTO `emp_grade` (`grade_id`, `grade_name`, `grade_created`, `grade_updated`) VALUES
(1, 'GP', '2023-01-23 04:02:28', '2023-01-23 04:02:28'),
(2, 'Consultant', '2023-01-23 04:02:28', '2023-01-23 04:02:28'),
(3, 'SPR', '2023-01-23 04:02:28', '2023-01-23 04:02:28'),
(4, 'Registrar', '2023-01-23 04:02:28', '2023-01-23 04:02:28'),
(5, 'SHO', '2023-01-23 04:02:28', '2023-01-23 04:02:28'),
(6, 'Junior SHO', '2023-01-23 04:03:35', '2023-01-23 04:03:35'),
(7, 'Intern', '2023-01-23 04:03:35', '2023-01-24 13:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `emp_speciality`
--

DROP TABLE IF EXISTS `emp_speciality`;
CREATE TABLE IF NOT EXISTS `emp_speciality` (
  `spec_id` int(155) NOT NULL AUTO_INCREMENT,
  `spec_name` varchar(255) NOT NULL,
  `spec_created` datetime NOT NULL,
  `spec_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`spec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_speciality`
--

INSERT INTO `emp_speciality` (`spec_id`, `spec_name`, `spec_created`, `spec_updated`) VALUES
(1, 'General Practitioner(GP)', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(2, 'General Medicine', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(3, 'Accident & Emergency', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(4, 'General Surgery', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(5, 'Obstetric & Genecology', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(6, 'Paediatric', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(7, 'Orthopedic', '2023-01-23 03:54:16', '2023-01-23 03:54:16'),
(8, 'Cardiology', '2023-01-24 06:55:32', '2023-01-24 06:55:32'),
(9, 'Hematology', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(10, 'Anesthetic', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(11, 'Urology', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(12, 'Dermatology', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(13, 'Psychiatry', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(14, 'ENT', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(15, 'RMO', '2023-01-23 03:59:28', '2023-01-23 03:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(155) NOT NULL AUTO_INCREMENT,
  `ord_L_S_date` datetime DEFAULT NULL,
  `ord_L_E_date` datetime DEFAULT NULL,
  `ord_speciality` varchar(1500) DEFAULT NULL,
  `ord_grade` varchar(1500) DEFAULT NULL,
  `cl_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `ord_required_from` datetime DEFAULT NULL,
  `ord_required_to` datetime DEFAULT NULL,
  `ord_process_date` date DEFAULT NULL,
  `ord_process_details_from` datetime DEFAULT NULL,
  `ord_process_details_to` datetime DEFAULT NULL,
  `ord_confirmation_date` date DEFAULT NULL,
  `ord_invoice_id` varchar(1500) DEFAULT NULL,
  `ord_normal_hrs` varchar(1500) DEFAULT NULL,
  `ord_on_call_hrs` varchar(1500) DEFAULT NULL,
  `ord_total_hrs` varchar(255) DEFAULT NULL,
  `ord_approx_cost` varchar(1500) DEFAULT NULL,
  `ord_pay_to_dr` varchar(1500) DEFAULT NULL,
  `ord_admin_charges` varchar(1500) DEFAULT NULL,
  `ord_diff_profit_admin` varchar(1500) DEFAULT NULL,
  `ord_time_sheet_rcvd` date DEFAULT NULL,
  `ord_time_sheet_mode` enum('whatsapp','email','fax','') DEFAULT NULL,
  `ord_time_sheet_process` date DEFAULT NULL,
  `ord_time_sheet_approved` varchar(1500) DEFAULT NULL,
  `ord_comment1` varchar(1500) DEFAULT NULL,
  `ord_invoice_refer` varchar(1500) DEFAULT NULL,
  `ord_invoice_date` date DEFAULT NULL,
  `ord_invoice_by` varchar(1500) DEFAULT NULL,
  `ord_sage_refer_no` varchar(1500) DEFAULT NULL,
  `ord_paymnt_rcvd_date` date DEFAULT NULL,
  `ord_pay_to_dr_date` date DEFAULT NULL,
  `ord_case_status` varchar(1500) DEFAULT NULL,
  `ord_payment_status` varchar(1500) DEFAULT NULL,
  `ord_assignment` varchar(255) DEFAULT NULL,
  `ord_comment2` varchar(1500) DEFAULT NULL,
  `ord_status` varchar(255) NOT NULL,
  `ord_created` datetime DEFAULT NULL,
  `ord_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_L_S_date`, `ord_L_E_date`, `ord_speciality`, `ord_grade`, `cl_id`, `emp_id`, `ord_required_from`, `ord_required_to`, `ord_process_date`, `ord_process_details_from`, `ord_process_details_to`, `ord_confirmation_date`, `ord_invoice_id`, `ord_normal_hrs`, `ord_on_call_hrs`, `ord_total_hrs`, `ord_approx_cost`, `ord_pay_to_dr`, `ord_admin_charges`, `ord_diff_profit_admin`, `ord_time_sheet_rcvd`, `ord_time_sheet_mode`, `ord_time_sheet_process`, `ord_time_sheet_approved`, `ord_comment1`, `ord_invoice_refer`, `ord_invoice_date`, `ord_invoice_by`, `ord_sage_refer_no`, `ord_paymnt_rcvd_date`, `ord_pay_to_dr_date`, `ord_case_status`, `ord_payment_status`, `ord_assignment`, `ord_comment2`, `ord_status`, `ord_created`, `ord_updated`) VALUES
(1, '2023-01-28 10:25:00', '2023-01-11 10:25:00', '2', '5', 2, 4, '2023-02-09 03:22:00', '2023-02-03 17:14:00', '2023-02-03', '2023-01-27 10:25:00', '2023-01-26 17:08:00', '2023-01-23', '23456', '15', '5', '20', '7', '34', '5', '6', '2023-01-25', 'whatsapp', '2023-01-19', 'Not-Approved', '123', '435325', '2023-01-09', 'ak', '2023-01-22', '2023-01-11', '2023-01-17', 'Pending', 'Pending', 'RWlxOEpoOW0ydkhJNmIya3pjYUo1UT09.pdf', 'abc', '1', '2023-01-23 10:25:20', '2023-01-26 23:59:31'),
(2, '2023-01-28 10:25:00', '2023-01-11 10:25:00', '15', '2', 1, 3, '2023-02-09 03:22:00', '2023-01-31 10:27:00', '2023-02-03', '2023-01-27 10:25:00', '2023-01-23 10:25:00', '2023-01-23', '23456', '7', '5', '11', '7', '34', '5', '6', '2023-02-02', 'whatsapp', '2023-01-19', 'Approved', '324423', '435325', '2023-01-09', 'ak', '2023-01-22', '2023-01-11', '2023-01-17', 'Closed', 'Paid', '', '', '3', '2023-01-23 12:15:57', '2023-01-26 13:50:41'),
(3, '2023-01-06 10:32:00', '2023-01-17 10:32:00', '2', '3', 1, 4, '2023-01-31 10:32:00', '2023-01-28 00:32:00', '2023-01-20', '2023-01-27 10:32:00', '2023-01-20 10:32:00', '2023-01-25', 'SqQdIFe2z5', '999524', '585893', '912231', 'TpXC5LZ3Fv', 'Tg9OfM6DX7', 'Hjpmt6MAd1', 'WhfUQc6CG2', '2023-01-17', 'email', '2023-01-10', 'Approved', 'jpKJczGQRC', '9hHD6FSisw', '2023-01-16', 'I6ux4dd5gF', '2023-01-19', '2023-01-27', '2023-01-20', 'Closed', 'Paid', '', 'Z75fbsji54', '1', '2023-01-26 17:49:34', '2023-01-26 17:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(155) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(500) NOT NULL,
  `usr_email` varchar(500) NOT NULL,
  `usr_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usr_designation` varchar(500) NOT NULL,
  `usr_status` varchar(255) NOT NULL,
  `grp_id` int(155) NOT NULL,
  `usr_created` datetime NOT NULL,
  `usr_updated` datetime NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_email`, `usr_pwd`, `usr_designation`, `usr_status`, `grp_id`, `usr_created`, `usr_updated`) VALUES
(1, 'okasha', 'kth@prime.edu.pk', '$2y$10$8Ayba5Vu4arbSIku.xfiOOaQdZy9guemMLoSSUCbaMnmCPln1Cg.m', 'IT', '1', 2, '2023-01-17 08:16:22', '2023-01-25 11:29:01'),
(2, 'Administrator', 'admin@prime.edu.pk', '$2y$10$8Ayba5Vu4arbSIku.xfiOOaQdZy9guemMLoSSUCbaMnmCPln1Cg.m', 'Master', '1', 1, '2023-01-24 21:41:05', '2023-01-25 11:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `usr_groups`
--

DROP TABLE IF EXISTS `usr_groups`;
CREATE TABLE IF NOT EXISTS `usr_groups` (
  `grp_id` int(155) NOT NULL AUTO_INCREMENT,
  `grp_role` varchar(500) NOT NULL,
  `grp_created` datetime NOT NULL,
  `grp_updated` datetime NOT NULL,
  PRIMARY KEY (`grp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_groups`
--

INSERT INTO `usr_groups` (`grp_id`, `grp_role`, `grp_created`, `grp_updated`) VALUES
(1, 'SuperAdmin', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(2, 'Admin', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(3, 'Editor', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(4, 'HR', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(5, 'Finance', '2023-01-24 14:34:05', '2023-01-24 14:34:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
