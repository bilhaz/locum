-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2023 at 07:10 AM
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
  `cl_gender` varchar(155) DEFAULT NULL COMMENT 'M for Male , F for female',
  `cl_cont_email` varchar(500) NOT NULL,
  `cl_cont_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cl_cont_phone` varchar(500) DEFAULT NULL,
  `cl_cont_desig` varchar(255) DEFAULT NULL,
  `cl_address` varchar(500) DEFAULT NULL,
  `cl_status` varchar(12) NOT NULL COMMENT '1 for active, 0 for disable',
  `cl_created` datetime NOT NULL,
  `cl_updated` datetime NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_reg_as`, `cl_h_name`, `cl_county`, `cl_eircode`, `cl_cont_name`, `cl_gender`, `cl_cont_email`, `cl_cont_pwd`, `cl_cont_phone`, `cl_cont_desig`, `cl_address`, `cl_status`, `cl_created`, `cl_updated`) VALUES
(1, '3', 'Alkhidmat Hospital', 'pesh', '250000', 'malak niaz', 'M', 'alkhidmat@akh.com', '$2y$10$qPyqNWD4hCyOGl1DQaC84eHyt/h5VN/m7evmXkPwjR2P5TcXGM4SO', '7865435678', 'xyz', 'FerozAbad Colony', '1', '2023-01-21 12:00:31', '2023-02-11 20:09:37'),
(2, '2', 'Hayatabad Medical center', 'Khyber pukhtun khwa', '25600', 'Akash Khan1234', 'M', 'hmc@hmc.pk', '$2y$10$C4HmZwTjdiRXiduu4jHDIu0wn/5a.3jQqedajL7QcEHo0UlpByn1G', '3456787996', 'CEO', 'House#392', '1', '2023-01-21 12:06:36', '2023-02-15 21:45:45'),
(3, NULL, NULL, NULL, NULL, NULL, '', 'test@hosp.com', '$2y$10$TkMRp8ezUzMzioiGf20bgOP09y0Hcy1VUtulbcoGpzIzZCVyboUyG', NULL, NULL, NULL, '1', '2023-01-21 12:14:11', '2023-02-18 09:29:33'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'freehospital@gmail.com', '$2y$10$ipNE1zW/m4HliXUrtD9CNe6kbo4Y30yM0Qm45D0hgPzzyEydVFln6', NULL, NULL, NULL, '1', '2023-02-18 09:34:40', '2023-02-18 09:34:40');

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
(1, 'HSC Hospital', '2023-01-24 07:43:30', '2023-02-17 12:32:03'),
(2, 'Private Hospital', '2023-01-24 07:43:30', '2023-02-17 12:32:14'),
(3, 'GP Clinic', '2023-01-24 07:43:30', '2023-02-17 12:32:24');

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
  `emp_status` varchar(12) DEFAULT NULL COMMENT '0 For Disable and 1 for Enable',
  `emp_created` datetime NOT NULL,
  `emp_updated` datetime NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_spec1`, `emp_spec2`, `emp_spec3`, `emp_grade1`, `emp_grade2`, `emp_grade3`, `emp_fname`, `emp_lname`, `emp_email`, `emp_gender`, `emp_pwd`, `emp_phone`, `emp_imcr_no`, `emp_pps_no`, `emp_cv`, `emp_imc_cert`, `emp_gv_cert`, `emp_rec_refer`, `emp_passport`, `emp_occup_health`, `emp_work_permit`, `emp_status`, `emp_created`, `emp_updated`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shahid@prime.edu.pk', 'F', '$2y$10$r/.rBm5s1H8g5uR9KeJkS.ryJo6EU.G6Wm3f6xbEoxMkZdtDdobbG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-01-18 09:58:07', '2023-02-15 21:41:42'),
(2, '1', '1', '3', '1', '1', '4', 'abc', 'prime doc', 'okasha@gmail.com', 'M', '$2y$10$J9x2v52mwYt/8aKzDFy3wOHY3qsc7bWkQGV/JZcJWq/.ySaJmyfwi', '924524', '714057', 725133, 'TmVEMytzYzJqK05yUWp3N3VzazZkVFdiOEFNSy9GSXRSbWVOSlBYZW5XOD0=', 'ZzE4TGVHYkFNc1o1NlVjQmJadkMzUG5SeVdwMkZOTlhyR2EvNUxZQTZuUT0=', 'VlY1RFpjOFZnSzNEMmZRRE8zb3hhVmVCbStva25FLy9Cc0dqeWtLVFRDQT0=', 'ZzE4TGVHYkFNc1o1NlVjQmJadkMzTjAvekFoRElhYjVDNnFqUllKQXFmWT0=', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', '1', '2023-01-18 11:35:25', '2023-02-02 11:52:17'),
(3, 'yJUX7csFaF', 'zcSRZKFIYv', '', 'myKnyGx0l8', 'AKGMjse3UN', '', 'qeq8aHtKCC', 'gRDsECihGB', 'test@pmc.com', 'F', '$2y$10$m96xc1NSjcLyD0b...VoT.BzXdmJTbhjr.E4/ajbv6R7V92.ptKty', '533106', '224990', 132701, 'bW9OMGIwMU4xaitLY0RmRVcrR3FPZz09', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-01-18 22:06:51', '2023-01-20 12:10:43'),
(4, 'niQAouL4jM', 'F0oAeeh1Nr', '', 'phQBx224pb', 'l9CtLRZz5Q', '', 'ijSl4emsLS', 'LCJZPoAsTb', 'kth@prime.edu.pk', 'M', '$2y$10$Yi/XQdvqss4Rsq6/WnYXwePVEKjqM1wPAfutoRxUpwHlNjwiTwRKm', '949780', '855614', 206775, 'WVpmWDlQbTF0ZWpGMHJjMnZEcWk1V1p3Zy8vcDlzVzkxV09jVE4wRWpzVT0=', 'T1c1V0dJYXJkcVNlQXphNFdlZFFPQT09', 'QjlhMENHeURLbGl1T2h4ejF4cEt3QT09', 'MU5VdjZ4djkyS3FGS085ZHVmSFhMZz09', 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09', 'U0gyQzhUUzVCNkppL2d5L3JDYzU3MjUrNUNZbWd1dDRnSDhKUkh3MFRIRWFLZ01lbFpNYzlNVXRNdEZuT2V3V2VvNFNXWE55WFRWWUlWQ01SMXpkb3c9PQ==', 'ejl3enJOeDFUMFhhb2FIbmR5eklnUT09', '1', '2023-01-18 22:48:11', '2023-01-20 12:13:37'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mth@prime.edu.pk', 'M', '$2y$10$shMi9imDGi822cqijxVK3OOU9aokpowvNxTwnMKMuGMbxGJ73bzBi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-01-18 22:52:54', '2023-01-20 12:15:04'),
(6, 'KuNAVYBCYo', 'J50YD0Upsc', '', 'cyEAHyOfVs', 'MYbtDc7ite', '', 'zH32ITMbQT', 'UEz0fMBDTk', 'pth@prime.edu.pk', 'F', '$2y$10$amei78yjv1UfHIZNsZ08muNgOfQszsqSnodveQJf5X4wJ0kLjT26a', '872757', '6985934567', 215656, 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09.jpg', 'NjJxQVhOQnpwNERFN3dseWJnN2pyZz09.jpg', 'eElqQ29UQW4veUE2b0E2NEhlRmg0Zz09.jpg', 'U0gyQzhUUzVCNkppL2d5L3JDYzU3MjUrNUNZbWd1dDRnSDhKUkh3MFRIRWFLZ01lbFpNYzlNVXRNdEZuT2V3V2VvNFNXWE55WFRWWUlWQ01SMXpkb3c9PQ==.jpg', 'ejl3enJOeDFUMFhhb2FIbmR5eklnUT09.jpg', 'WVZ4UGJ6UTlJZXByZURSTFRNMlRUaDhGbkM3QU5RWVVNSDQzWjBGZGhzakpTWDlKdVBGN0xaN0ZUWjlRd2ozdA==.jpg', 'WVpmWDlQbTF0ZWpGMHJjMnZEcWk1V1p3Zy8vcDlzVzkxV09jVE4wRWpzVT0=.jpg', '0', '2023-01-18 22:58:38', '2023-01-20 12:13:42'),
(7, '2', '5', '4', '3', '5', '2', 'okashaaa', 'ok', 'ok@gmail.com', 'M', 'ok@gmail.com', '786543', '67897654', 4567890, 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', 'V3cvYlVqOVhwdm9IRHdVTllhWGd1ZHF4SDZueHVCWXlqVzFSaEI4cHVDbz0=.pdf', '1', '2023-01-24 12:27:19', '2023-01-24 12:28:29'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alkhidmat1@akh.com', NULL, '$2y$10$ChZfANuAs1BgAjTKa8lUJOZeCH6PU0JLoOK14gJ2anCkw2oDlrnV6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-02-18 09:57:38', '2023-02-18 09:57:38');

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
(1, 'GP', '2023-01-23 04:02:28', '2023-02-15 22:34:50'),
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
(1, 'General Practitioner(GP)', '2023-01-23 03:54:16', '2023-02-15 22:21:30'),
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
-- Table structure for table `formulae`
--

DROP TABLE IF EXISTS `formulae`;
CREATE TABLE IF NOT EXISTS `formulae` (
  `id` int(155) NOT NULL AUTO_INCREMENT,
  `formula` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulae`
--

INSERT INTO `formulae` (`id`, `formula`, `title`, `created`, `updated`) VALUES
(1, '88.95', 'Payrate (Employee)', '2023-02-07 04:58:49', '2023-02-18 00:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(155) NOT NULL AUTO_INCREMENT,
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
  `ord_cancel_bdr` varchar(155) DEFAULT NULL COMMENT '1 for cancel or blank/null ',
  `ord_dr_cremarks` varchar(2000) DEFAULT NULL,
  `ord_cancel_bcl` varchar(155) DEFAULT NULL COMMENT '1 for cancel or blank/null',
  `ord_cl_cremarks` varchar(2000) DEFAULT NULL,
  `ord_created` datetime DEFAULT NULL,
  `ord_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_speciality`, `ord_grade`, `cl_id`, `emp_id`, `ord_required_from`, `ord_required_to`, `ord_process_date`, `ord_process_details_from`, `ord_process_details_to`, `ord_confirmation_date`, `ord_invoice_id`, `ord_normal_hrs`, `ord_on_call_hrs`, `ord_total_hrs`, `ord_approx_cost`, `ord_pay_to_dr`, `ord_admin_charges`, `ord_diff_profit_admin`, `ord_time_sheet_rcvd`, `ord_time_sheet_mode`, `ord_time_sheet_process`, `ord_time_sheet_approved`, `ord_comment1`, `ord_invoice_refer`, `ord_invoice_date`, `ord_invoice_by`, `ord_sage_refer_no`, `ord_paymnt_rcvd_date`, `ord_pay_to_dr_date`, `ord_case_status`, `ord_payment_status`, `ord_assignment`, `ord_comment2`, `ord_status`, `ord_cancel_bdr`, `ord_dr_cremarks`, `ord_cancel_bcl`, `ord_cl_cremarks`, `ord_created`, `ord_updated`) VALUES
(1, '2', '5', 2, 2, '2023-02-09 03:22:00', '2023-02-24 17:14:00', '2023-02-03', '2023-01-27 10:25:00', '2023-01-31 17:08:00', '2023-01-23', '23456', '15', '5', '20', '7', '90', '9', '6', '2023-01-25', 'whatsapp', '2023-01-19', 'Not-Approved', '123', '435325', '2023-01-09', 'ak', '2023-01-22', '2023-01-11', '2023-01-17', 'Pending', 'Pending', 'eVdXcWdvQTVRbWM3SzdYdTNKdTg2WXlJNlZ4MXRKUkpvVlcveUZodnhLdGVLZksycEVJWVVjRU1MMWphQ1Zhaw==.pdf', 'abc', '4', NULL, NULL, NULL, NULL, '2023-01-23 10:25:20', '2023-02-17 23:29:08'),
(2, '15', '2', 1, 3, '2023-02-09 03:22:00', '2023-02-18 10:27:00', '2023-02-03', '2023-01-27 10:25:00', '2023-01-31 10:25:00', '2023-01-23', '23456', '7', '5', '11', '7', '34', '5', '6', '2023-02-02', 'whatsapp', '2023-01-19', 'Not-Approved', '324423', '435325', '2023-01-09', 'ak', '2023-01-22', '2023-01-11', '2023-01-17', 'Closed', 'Paid', '', '', '3', NULL, NULL, NULL, NULL, '2023-01-23 12:15:57', '2023-02-11 19:17:29'),
(3, '2', '3', 1, 2, '2023-01-31 10:32:00', '2023-02-25 00:32:00', '2023-01-20', '2023-01-27 10:32:00', '2023-01-30 10:32:00', '2023-01-25', 'SqQdIFe2z5', '999524', '585893', '912231', 'TpXC5LZ3Fv', '120', 'Hjpmt6MAd1', 'WhfUQc6CG2', '2023-01-17', 'email', '2023-01-10', 'Approved', 'jpKJczGQRC', '9hHD6FSisw', '2023-01-16', 'I6ux4dd5gF', '2023-01-19', '2023-01-27', '2023-01-20', 'Closed', 'Paid', 'QmlqcHpTUUZSdGl1SVFYZmdGZmJDbXhIdno1c2pUbXJ1ekVBdU4yWUNmYz0=.pdf', 'Z75fbsji54', '1', '1', NULL, '', NULL, '2023-01-26 17:49:34', '2023-02-18 19:07:04'),
(4, '', '', 0, 0, '2023-03-07 21:50:00', '2023-02-22 21:50:00', '2023-02-09', '2023-03-03 21:50:00', '2023-03-02 21:50:00', '2023-02-22', '', '227287', '358341', '218539', 'bLmnCckv8h', 'SP9edO6ToJ', 'Yb2IOZ5tGr', 'QH9o8IfynW', '2023-02-16', '', '2023-02-21', '', 'dxzk68o5lK', 'P5ULfqUMK5', NULL, 'OAHstPhjvq', '', NULL, NULL, '', '', NULL, 'S0fWsbcMN0', '2', NULL, NULL, NULL, NULL, '2023-02-17 23:21:38', '2023-02-17 23:21:38'),
(5, '', '', 1, 3, '2023-03-07 21:50:00', '2023-02-22 21:50:00', '2023-02-09', '2023-03-03 21:50:00', '2023-03-02 21:50:00', '2023-02-22', '', '237335', '564742', '464659', 'HJA0rC8gRz', '5iqDwSCgxe', 'U4s4Doj9DQ', 'wYnjLYX8Mj', '2023-02-16', '', '2023-02-21', '', 'grhaXUvKH3', 'GTWzexN4db', NULL, 'pdWfWKWxN7', '', NULL, NULL, '', '', NULL, 'iTQselxN0p', '2', NULL, NULL, NULL, NULL, '2023-02-17 23:22:10', '2023-02-17 23:22:10'),
(6, '', '', 0, 0, '2023-03-07 21:50:00', '2023-02-22 21:50:00', '2023-02-09', '2023-03-03 21:50:00', '2023-03-02 21:50:00', '2023-02-22', '', '783274', '096575', '079171', 'BvauVtcdqs', 'dGAX5pi4ex', '7SVORXZ6ag', 'FRWMWv9nNP', '2023-02-16', '', '2023-02-21', '', '86jiAHwScN', 'omaW2eG54A', NULL, 'fhLpUYo8hd', '', NULL, NULL, '', '', NULL, 'OE5gna6lwb', '3', NULL, NULL, NULL, NULL, '2023-02-17 23:22:36', '2023-02-17 23:22:36'),
(7, '', '', 0, 0, '2023-03-07 21:50:00', '2023-02-22 21:50:00', '2023-02-09', '2023-03-03 21:50:00', '2023-03-02 21:50:00', '2023-02-22', '', '012987', '533539', '240077', 'kZW2h80gR2', 'i8CU6xZnbB', 'YyXIrDILRU', 'sVWQVhaxvn', '2023-02-16', '', '2023-02-21', '', 'sLYwQeMX8Z', 'TMgvfUKFhK', NULL, 'aeYyY7rmhs', '', NULL, NULL, '', '', NULL, 'RgXLYiMdOE', '4', NULL, NULL, NULL, NULL, '2023-02-17 23:24:37', '2023-02-17 23:24:37'),
(8, '', '', 0, 0, '2023-03-07 21:50:00', '2023-02-22 21:50:00', '2023-02-09', '2023-03-03 21:50:00', '2023-03-02 21:50:00', '2023-02-22', '', '504224', '584652', '052074', '6znK4pZLOv', '3fsHtlU7jO', 'wJMQMkUo6C', 'Jc5mzhuqUu', '2023-02-16', '', '2023-02-21', '', 'NqfGevunxh', 'BcGZXLvfPj', NULL, 'prMYmZtN3W', '', NULL, NULL, '', '', NULL, 'Vy0HpAify4', '1', NULL, NULL, NULL, NULL, '2023-02-17 23:27:17', '2023-02-17 23:27:17'),
(9, '2', '3', 1, 7, '2023-01-31 10:32:00', '2023-02-16 00:32:00', '2023-01-20', '2023-01-27 10:32:00', '2023-01-30 10:32:00', '2023-01-25', 'SqQdIFe2z5', '999524', '585893', '912231', 'TpXC5LZ3Fv', '120', 'Hjpmt6MAd1', 'WhfUQc6CG2', '2023-01-17', 'email', '2023-01-10', 'Approved', 'jpKJczGQRC', '9hHD6FSisw', '2023-01-16', 'I6ux4dd5gF', '2023-01-19', '2023-01-27', '2023-01-20', 'Closed', 'Paid', 'QmlqcHpTUUZSdGl1SVFYZmdGZmJDbXhIdno1c2pUbXJ1ekVBdU4yWUNmYz0=.pdf', 'Z75fbsji54', '1', '', NULL, '', NULL, '2023-02-18 19:07:12', '2023-02-20 10:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

DROP TABLE IF EXISTS `timesheets`;
CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `dutyDate` date NOT NULL,
  `dutyTime` varchar(10) NOT NULL,
  `siteStatus` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `order_id`, `dutyDate`, `dutyTime`, `siteStatus`, `createdAt`, `updatedAt`) VALUES
(40, 3, '2023-01-30', '21', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(39, 3, '2023-01-28', '21', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(38, 3, '2023-01-27', '21', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(37, 3, '2023-01-30', '17', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(36, 3, '2023-01-29', '17', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(35, 3, '2023-01-27', '17', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(34, 3, '2023-01-30', '1', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(33, 3, '2023-01-29', '1', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(32, 3, '2023-01-27', '1', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(31, 3, '2023-01-30', '0', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(30, 3, '2023-01-29', '0', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(29, 3, '2023-01-28', '0', 2, '2023-02-20 11:42:58', '2023-02-20 11:42:58'),
(41, 3, '2023-01-29', '23', 1, '2023-02-20 11:42:58', '2023-02-20 11:42:58');

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
  `grp_id` varchar(155) NOT NULL,
  `usr_created` datetime NOT NULL,
  `usr_updated` datetime NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_email`, `usr_pwd`, `usr_designation`, `usr_status`, `grp_id`, `usr_created`, `usr_updated`) VALUES
(1, 'okasha', 'kth@prime.edu.pk', '$2y$10$fgo1bYej6fUPImEwNyBtnOXbDozihUdV7iIFeR9rEP6L.6MHGd9NO', 'IT', '1', 'user', '2023-01-17 08:16:22', '2023-02-15 22:53:17'),
(2, 'Administrator', 'admin@prime.edu.pk', '$2y$10$8Ayba5Vu4arbSIku.xfiOOaQdZy9guemMLoSSUCbaMnmCPln1Cg.m', 'Master', '1', 'super_admin', '2023-01-24 21:41:05', '2023-01-25 11:52:38');

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
