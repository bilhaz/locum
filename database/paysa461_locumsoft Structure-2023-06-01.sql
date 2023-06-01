-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2023 at 10:20 AM
-- Server version: 8.0.31
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paysa461_locumsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int NOT NULL AUTO_INCREMENT,
  `cl_reg_as` varchar(500) DEFAULT NULL,
  `cl_h_name` varchar(500) DEFAULT NULL,
  `cl_county` varchar(500) DEFAULT NULL,
  `cl_eircode` varchar(500) DEFAULT NULL,
  `cl_cont_name` varchar(500) DEFAULT NULL,
  `cl_cont_email` varchar(500) NOT NULL,
  `cl_usr` varchar(20) NOT NULL,
  `cl_cont_pwd` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cl_cont_phone` varchar(500) DEFAULT NULL,
  `cl_cont_desig` varchar(255) DEFAULT NULL,
  `cl_address` varchar(500) DEFAULT NULL,
  `cl_status` varchar(12) NOT NULL COMMENT '1 for active, 0 for disable',
  `Reset_Token` text,
  `Reset_Token_Expiry` datetime DEFAULT NULL,
  `cl_created` datetime NOT NULL,
  `cl_updated` datetime NOT NULL,
  PRIMARY KEY (`cl_id`),
  UNIQUE KEY `cl_cont_email` (`cl_cont_email`,`cl_usr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_reg_cat`
--

DROP TABLE IF EXISTS `cl_reg_cat`;
CREATE TABLE IF NOT EXISTS `cl_reg_cat` (
  `reg_cat_id` int NOT NULL AUTO_INCREMENT,
  `reg_cat_name` varchar(255) NOT NULL,
  `reg_cat_created` datetime NOT NULL,
  `reg_cat_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`reg_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
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
  `emp_pwd` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `emp_phone` varchar(500) DEFAULT NULL,
  `emp_imcr_no` varchar(500) DEFAULT NULL,
  `emp_pps_no` varchar(155) DEFAULT NULL,
  `emp_cv` varchar(500) DEFAULT NULL,
  `emp_imc_cert` varchar(500) DEFAULT NULL,
  `emp_gv_cert` varchar(500) DEFAULT NULL,
  `emp_rec_refer` varchar(500) DEFAULT NULL,
  `emp_passport` varchar(500) DEFAULT NULL,
  `emp_occup_health` varchar(500) DEFAULT NULL,
  `emp_work_permit` varchar(500) DEFAULT NULL,
  `emp_acls` varchar(500) DEFAULT NULL,
  `emp_bcls` varchar(500) DEFAULT NULL,
  `emp_bls` varchar(500) DEFAULT NULL,
  `emp_atls` varchar(500) DEFAULT NULL,
  `emp_gpIndemnity` varchar(255) DEFAULT NULL,
  `emp_otherDocs` varchar(500) DEFAULT NULL,
  `emp_status` varchar(12) DEFAULT NULL COMMENT '0 For Disable and 1 for Enable',
  `Reset_Token` text,
  `Reset_Token_Expiry` datetime DEFAULT NULL,
  `emp_created` datetime NOT NULL,
  `emp_updated` datetime NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_grade`
--

DROP TABLE IF EXISTS `emp_grade`;
CREATE TABLE IF NOT EXISTS `emp_grade` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(255) NOT NULL,
  `grade_created` datetime NOT NULL,
  `grade_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_speciality`
--

DROP TABLE IF EXISTS `emp_speciality`;
CREATE TABLE IF NOT EXISTS `emp_speciality` (
  `spec_id` int NOT NULL AUTO_INCREMENT,
  `spec_name` varchar(255) NOT NULL,
  `spec_created` datetime NOT NULL,
  `spec_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`spec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formulae`
--

DROP TABLE IF EXISTS `formulae`;
CREATE TABLE IF NOT EXISTS `formulae` (
  `id` int NOT NULL AUTO_INCREMENT,
  `formula` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ord_id` int DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `usr_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT '0-Unseen\r\n1- seen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int NOT NULL AUTO_INCREMENT,
  `ord_ref_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Locum Confirmation No.',
  `ord_speciality` varchar(1500) DEFAULT NULL,
  `ord_grade` varchar(1500) DEFAULT NULL,
  `cl_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `ord_required_from` datetime DEFAULT NULL,
  `ord_required_to` datetime DEFAULT NULL,
  `ord_datetime_detail` varchar(2000) DEFAULT NULL,
  `ord_process_date` date DEFAULT NULL,
  `ord_process_details_from` datetime DEFAULT NULL,
  `ord_process_details_to` datetime DEFAULT NULL,
  `ord_prosdatetime_detail` varchar(2000) DEFAULT NULL,
  `ord_confirmation_date` date DEFAULT NULL,
  `ord_invoice_id` varchar(1500) DEFAULT NULL,
  `ord_normal_hrs` varchar(1500) DEFAULT NULL,
  `ord_normal_hrs_rt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Employee Rate',
  `nh_p_type` varchar(255) DEFAULT NULL,
  `ord_on_call_hrs` varchar(1500) DEFAULT NULL,
  `ord_ocall_rt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Employee Rate',
  `oc_p_type` varchar(255) DEFAULT NULL,
  `ord_off_site_hrs` varchar(255) DEFAULT NULL,
  `ord_osite_rt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Employee Rate',
  `os_p_type` varchar(255) DEFAULT NULL,
  `ord_bh_week_hrs` varchar(255) DEFAULT NULL,
  `ord_bhw_rt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Employee Rate',
  `bhw_p_type` varchar(255) DEFAULT NULL,
  `ord_Hnormal_hrs_rt` varchar(255) NOT NULL COMMENT 'Hospital Rate',
  `ord_Hocall_rt` varchar(255) NOT NULL COMMENT 'Hospital Rate',
  `ord_Hosite_rt` varchar(255) NOT NULL COMMENT 'Hospital Rate',
  `ord_Hbhw_rt` varchar(255) NOT NULL COMMENT 'Hospital Rate',
  `ord_total_hrs` varchar(255) DEFAULT NULL,
  `ord_approx_cost` varchar(1500) DEFAULT NULL COMMENT 'Hospital Rate',
  `ord_hosp_earn` varchar(155) DEFAULT NULL,
  `ord_pay_to_dr` varchar(1500) DEFAULT NULL,
  `ord_paying_to_dr` varchar(155) DEFAULT NULL,
  `ord_admin_charges` varchar(1500) DEFAULT NULL,
  `ord_adminchrg_intern` varchar(155) DEFAULT NULL,
  `ord_diff_profit_admin` varchar(1500) DEFAULT NULL,
  `ord_time_sheet_rcvd` date DEFAULT NULL,
  `ord_time_sheet_mode` enum('whatsapp','email','fax','online') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ord_time_sheet_process` date DEFAULT NULL,
  `ord_time_sheet_approved` varchar(1500) DEFAULT NULL,
  `ord_timesheetSign` varchar(255) DEFAULT NULL,
  `ord_comment1` varchar(1500) DEFAULT NULL,
  `ord_invoice_refer` varchar(1500) DEFAULT NULL,
  `ord_invoice_date` date DEFAULT NULL,
  `ord_invoice_by` varchar(1500) DEFAULT NULL,
  `vat_rate` varchar(255) DEFAULT NULL,
  `ord_vat_sale` varchar(155) DEFAULT NULL,
  `ord_vat_purch` varchar(155) DEFAULT NULL,
  `ord_vat_save` varchar(155) DEFAULT NULL,
  `ord_sage_refer_no` varchar(1500) DEFAULT NULL,
  `ord_paymnt_rcvd_date` date DEFAULT NULL,
  `ord_pay_to_dr_date` date DEFAULT NULL,
  `ord_case_status` varchar(1500) DEFAULT NULL,
  `ord_payment_status` varchar(1500) DEFAULT NULL,
  `ord_emp_pay_status` varchar(255) DEFAULT NULL,
  `ord_assignment` varchar(255) DEFAULT NULL,
  `ord_comment2` varchar(1500) DEFAULT NULL,
  `ord_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ord_cancel_bdr` int NOT NULL COMMENT '1 for cancel and 0 for active',
  `ord_dr_cremarks` varchar(2000) DEFAULT NULL,
  `ord_cancel_bcl` int NOT NULL COMMENT '1 for cancel or 0 for active',
  `ord_cl_cremarks` varchar(2000) DEFAULT NULL,
  `ord_advrtise` int NOT NULL,
  `ord_created` datetime DEFAULT NULL,
  `ord_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sra_logs`
--

DROP TABLE IF EXISTS `sra_logs`;
CREATE TABLE IF NOT EXISTS `sra_logs` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `change_row_id` int NOT NULL,
  `adm_id` int NOT NULL,
  `ip_address` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `action_table` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` varchar(2000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `first_response` int NOT NULL,
  `locum_process` int NOT NULL,
  `locum_confirmation` int NOT NULL,
  `employee_confirmation` int NOT NULL,
  `event_performed` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

DROP TABLE IF EXISTS `timesheets`;
CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `dutyDate` date NOT NULL,
  `dutyTime` varchar(10) NOT NULL,
  `siteStatus` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(500) NOT NULL,
  `usr_email` varchar(500) NOT NULL,
  `usr_pwd` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `usr_designation` varchar(500) NOT NULL,
  `usr_status` varchar(255) NOT NULL,
  `grp_id` varchar(155) NOT NULL,
  `usr_created` datetime NOT NULL,
  `usr_updated` datetime NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_groups`
--

DROP TABLE IF EXISTS `usr_groups`;
CREATE TABLE IF NOT EXISTS `usr_groups` (
  `grp_id` int NOT NULL AUTO_INCREMENT,
  `grp_role` varchar(500) NOT NULL,
  `grp_created` datetime NOT NULL,
  `grp_updated` datetime NOT NULL,
  PRIMARY KEY (`grp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
