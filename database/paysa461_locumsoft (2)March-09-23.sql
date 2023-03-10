-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2023 at 10:07 AM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `clients` (
  `cl_id` int(155) NOT NULL,
  `cl_reg_as` varchar(500) DEFAULT NULL,
  `cl_h_name` varchar(500) DEFAULT NULL,
  `cl_county` varchar(500) DEFAULT NULL,
  `cl_eircode` varchar(500) DEFAULT NULL,
  `cl_cont_name` varchar(500) DEFAULT NULL,
  `cl_cont_email` varchar(500) NOT NULL,
  `cl_usr` varchar(20) NOT NULL,
  `cl_cont_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cl_cont_phone` varchar(500) DEFAULT NULL,
  `cl_cont_desig` varchar(255) DEFAULT NULL,
  `cl_address` varchar(500) DEFAULT NULL,
  `cl_status` varchar(12) NOT NULL COMMENT '1 for active, 0 for disable',
  `cl_created` datetime NOT NULL,
  `cl_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_reg_as`, `cl_h_name`, `cl_county`, `cl_eircode`, `cl_cont_name`, `cl_cont_email`, `cl_usr`, `cl_cont_pwd`, `cl_cont_phone`, `cl_cont_desig`, `cl_address`, `cl_status`, `cl_created`, `cl_updated`) VALUES
(1, '1', 'University Hospital Limerick', 'Limerick', 'V94PKF1', 'Frances Enright', 'francesa.enright@hse.ie', 'uhlimerick', '$2y$10$xnmqSqkDIHBx5RX6sZOxBu/w/VW8NUP0.28i/vES2uAwXiNVd.1I.', '061482040', 'Clerical Officer /Medical Manpower Department', 'Houston Hall ,  Ballycummin Ave,  Raheen Buisness Park ,  Raheen', '1', '2023-03-07 14:05:37', '2023-03-07 14:07:18'),
(2, '1', 'Cork University Hospital', 'Cork', 'T12 DC4A', 'Eamonn Forrest', 'Eamonn.Forrest@hse.ie', 'cuhospital', '$2y$10$KZJk76jcKnG55DnuRRRGSO32gL6X5N9pVkd83nqkATfQcb6kkjScS', '0214920937', 'Staff Officer - Medical Manpower', 'Wilton', '1', '2023-03-07 14:10:56', '2023-03-07 14:13:17'),
(3, '1', 'Midland Hospital Portlaoise', 'Laois', 'R32 RW61', 'Bernie Malone', 'bernie.malone@hse.ie', 'mrhportlaoise', '$2y$10$z0AZgUkfEF5TNNbznsPPfev6HJtMN5qro6jChhnWeULtgjCIQikoO', '0578696373', 'Medical Manpower Office', 'Block Rd, Ballyroan, Portlaoise', '1', '2023-03-07 14:14:34', '2023-03-08 16:47:43'),
(4, '1', 'Wexford General Hospital', 'Wexford', 'Y35WP93', 'Grace Monaghan', 'Grace.monaghan@hse.ie', 'wghospital', '$2y$10$KUMPmMqSUt8GTqqT353Id.cGxsMBk1Jkv7wHIcRwBsB0nmz/ojMPi', '0539153134', 'Medical Administration Manager', '11 Ardcavan Business Park, Ardcavan ', '1', '2023-03-07 14:20:59', '2023-03-07 14:22:15'),
(5, '1', 'Midland Regional Hospital ', 'Westmeath', 'N91 NA43', ' Mairead Fox', 'MaireadR.Fox@hse.ie', 'mrhmullingar', '$2y$10$NukcAMgXX0ikqhkKhc.F..W1Qvhe.jzyXL4z.p/sMn4QUSA55TVeG', '0449394146', 'Staff Officer | Medical Manpower', 'Mullingar', '1', '2023-03-07 14:24:38', '2023-03-07 14:26:30'),
(6, '1', 'Naas General Hospital', 'Kildare', 'W91 AE76', ' Angela Murphy', 'angela.murphy14@hse.ie', 'naashospital', '$2y$10$J8E1To0L0mgx3oKsNumYMOHYIZPMBTDLk/0CMh0PAzeQoBmBzv2ai', '045849764', 'Med & ED Admin', 'Craddockstown Rd, Naas East, Naas', '1', '2023-03-07 14:29:33', '2023-03-07 14:30:58'),
(7, '1', 'University Maternity Hospital Limerick', 'Limerick', 'V94 C566', 'Geraldine Morrissey', 'geraldinem.morrissey@hse.ie', 'umhlimerick', '$2y$10$5cxJ941Olno.6zeHGzjigOtHcycEWJqd8QpewNRRZHNVLDVn1hJ8C', '061585578', 'PA to Claire Hartnett General Manager', 'Ennis Road', '1', '2023-03-07 14:33:19', '2023-03-07 14:36:34'),
(8, '1', 'St. Patrick\'s Hospital John\'s Hill', 'Waterford ', 'X91 XE86', 'Mona O\'Malley', 'Mona.OMalley@hse.ie', 'stphospital', '$2y$10$gxbaFaapbQam7WRFfQo6X.BoF6wx//2UnnPMq0lcH/xiI9G/yVy4.', '051847223', 'Staff Officer', 'Waterford Residential Care Centre,  St. Patrick’s Way  ', '1', '2023-03-07 14:40:23', '2023-03-07 14:42:16'),
(9, '1', 'Midland Regional Hospital Tullamore', 'Offaly', 'R35 NY51', 'Regina Vickers', 'regina.vickers@hse.ie', 'mrhtullamore', '$2y$10$yaQe5iy0jY5Pz8MCigVNN.um5oygyuf2fh7dKahWPHzlCdULHTUv6', '0579358458', 'Staff Officer', 'Arden Rd, Puttaghan, Tullamore', '1', '2023-03-07 14:44:08', '2023-03-07 14:45:38'),
(10, '1', 'St Luke’s General Hospital', 'Kilkenny ', 'R95 FY71', 'Rufina McCormack', 'rufina.mccormack@hse.ie', 'stlhospital', '$2y$10$vtLSNZ2Tusew0PQvVfRwk.yCN9cCYLMjmtmneJqU5qqIJOgLj1Q.O', '0567785330', 'Medical Manpower', 'Carlow-Kilkenny Freshford Road', '1', '2023-03-07 14:47:49', '2023-03-07 14:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `cl_reg_cat`
--

CREATE TABLE `cl_reg_cat` (
  `reg_cat_id` int(155) NOT NULL,
  `reg_cat_name` varchar(255) NOT NULL,
  `reg_cat_created` datetime NOT NULL,
  `reg_cat_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cl_reg_cat`
--

INSERT INTO `cl_reg_cat` (`reg_cat_id`, `reg_cat_name`, `reg_cat_created`, `reg_cat_updated`) VALUES
(1, 'HSE Hospital', '2023-01-24 07:43:30', '2023-02-27 15:15:41'),
(2, 'Private Hospital', '2023-01-24 07:43:30', '2023-02-17 12:32:14'),
(3, 'GP Clinic', '2023-01-24 07:43:30', '2023-02-17 12:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(155) NOT NULL,
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
  `emp_pps_no` varchar(155) DEFAULT NULL,
  `emp_cv` varchar(500) DEFAULT NULL,
  `emp_imc_cert` varchar(500) DEFAULT NULL,
  `emp_gv_cert` varchar(500) DEFAULT NULL,
  `emp_rec_refer` varchar(500) DEFAULT NULL,
  `emp_passport` varchar(500) DEFAULT NULL,
  `emp_occup_health` varchar(500) DEFAULT NULL,
  `emp_work_permit` varchar(500) DEFAULT NULL,
  `emp_status` varchar(12) DEFAULT NULL COMMENT '0 For Disable and 1 for Enable',
  `emp_created` datetime NOT NULL,
  `emp_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_spec1`, `emp_spec2`, `emp_spec3`, `emp_grade1`, `emp_grade2`, `emp_grade3`, `emp_fname`, `emp_lname`, `emp_email`, `emp_gender`, `emp_pwd`, `emp_phone`, `emp_imcr_no`, `emp_pps_no`, `emp_cv`, `emp_imc_cert`, `emp_gv_cert`, `emp_rec_refer`, `emp_passport`, `emp_occup_health`, `emp_work_permit`, `emp_status`, `emp_created`, `emp_updated`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dramjad66@gmail.com', NULL, '$2y$10$dqJOVrUsZGSM25Y98PiA8u9g5biySajhH1.qDODrsAcZs55Xsc1De', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 11:55:36', '2023-03-07 11:55:36'),
(2, '2', '3', '8', '4', '5', '5', 'Zain', 'Komal', 'zainkomal00@gmail.com', 'F', '$2y$10$r/PTAXgaInxeGCt1sKafJegG9C0dReKxGlaGPVBsUro5IGKQKpAQK', '0899893404', '427828', '2315241GA', 'OGJGUENoMDBaVlM5cVhzOVpVdTZ1K2NLK1Rjak1LcVVISU5OSFdSYmlGWT0=.docx', 'SFF3cmw2b01PeFdSS3hnUWFTSVNla1FUTXREY2x0WmNkWkF4bXR0U0swSW8wdDRXaVRCQWEzVUQwNHNkbVBHV0FVMXplZlRKc2F1TThpbDRyb25OMlE9PQ==.pdf', NULL, 'TjlVOWZ4bUtrYTdkTXFPYXZpQzZsYW0yZENvSUlCdGJqZ1RMNCtYV2ZQST0=.jpg', 'bVRpTENjTThWL2x5TWxBR2VqanVzUT09.pdf', 'cWV4ZnVSNlJFaUNwM2F0RHZOUEpLT2pwMkN3V0JxeG1EU2ZhZGF2VExtQ2ljRmo2TmpzaXlTVnhZK1FGNyt5aw==.pdf', 'VVVaVHNLRzhvZE5jbE9XWnBRVFNZZz09.pdf', '1', '2023-03-07 12:24:18', '2023-03-08 10:37:43'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dr.farahkamal@gmail.com', NULL, '$2y$10$oUilPOjpXhozzc9aDJM17eJVWCVjncwXFc9qQGYbiweavfvblCcFC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:24:51', '2023-03-07 12:24:51'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'soban111@yahoo.com', NULL, '$2y$10$DtDmIfYEkpZ6VEce2qMwLucKpie2TfNw8XyKyW137SiygEiwTzmu2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:25:17', '2023-03-07 12:25:17'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drzulfiqar_77@hotmail.com', NULL, '$2y$10$gqazC4BJEttbVKmTOXAkUe2uabWdc1jlHmm5.jPPCT3Z9MbiimShm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:25:45', '2023-03-07 12:25:45'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maaz.seerat1@gmail.com', NULL, '$2y$10$x4nIvNKbtoTo9Tm1BlZP4uPTV8XdHRhQfUoE38cpfWgt2M2FEQgGG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:26:50', '2023-03-07 12:26:50'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ahmedamin366@yahoo.com', NULL, '$2y$10$d0AwkoKTUXqLAA2Sh9vC5uuk7r/54Kwb04d/DY7QSVP83D82KjzPK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:27:29', '2023-03-07 12:27:29'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drhasnain1979@gmail.com', NULL, '$2y$10$CDI5cMlnW6VL3VlN80IZ4OKjoOr3vhD2A3gWCTazMc7jz5fKfFrZK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:27:54', '2023-03-07 12:27:54'),
(9, '2', '2', '', '4', '5', '', 'Elshekh Elhadi', 'Ahmed Mohammed', 'shekhalhadi@icloud.com', 'M', '$2y$10$dXjOWfbk7U/J8z4EINbAsOgZ7HBmVB9B1wcqWkHntUApjSs66HUIi', '871322196', '424846', '9207290DA', 'WGZBUSs3MVo4TktTbkZYc2NVZUFBTTMwVVZWMG42eGhtdER6ZnF3Nlp1VEJ6ZktWSHRaNkhxb0xFWUs2QWRybkoyRERia1BjZFp3d3NKTTlRMmRMNGc9PQ==.pdf', 'Qkd0Y0xGVkxLc09OWnlwTFNocmFmb1BDRWNBeTRpSkZvU2FaN25Ca0pPM2pEeXl3N2kwUStpTHk2am5uZ1c4Ri9ZNjBXdWc2TVhrNzVBc0twWHpqSWc9PQ==.pdf', 'SnlGVGhqZE9QVlEyMVlhNnFqZS9HQVE0U1I1R1NVQVFxR3Z4d3k4cmRwZVRhRmVvTWpCb2VlQWYvM0w1Vks2NHI5aVhmWkNtN29rV3pnaTk3MmRmdnc9PQ==.pdf', 'VEQxazZJSXRscGZPeFcwZ1lvMTI5ZjFWMVZVUXBmWm0xRzd4SHdhVk9ua2p0M0J2dWs0TENqQWhlVW9QdjhxTg==.pdf', NULL, NULL, 'Z3pCUCtKK25aMVQ5UDE0QXE5M0JpUnlObTdtQjlKUEdDK3djSDJmeTBvTWdpSUtqYitXcG1RRm0zRHBtbTJlSkRvNnVvTTZITEFVOFZESlZ6a0wySWc9PQ==.pdf', '1', '2023-03-07 12:28:14', '2023-03-08 15:46:18'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bushra-house1001@hotmail.com', NULL, '$2y$10$FdLKna8DemVxjKLiQZRsAedPEozoHtpTb8DWzUKItTivIDduGRLMS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:28:41', '2023-03-07 12:28:41'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'waelhismail@gmail.com', NULL, '$2y$10$ectWYBtkMMqph2Ot/JQuTuIrjopKHIjeIiixzQYH4ObaRuzUZBF0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:29:08', '2023-03-07 12:29:08'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drshaziagayaz@gmail.com', NULL, '$2y$10$Abk6.uwk2/ug7hfIw6DjdOM4BWWPvFJgJiyCakwQB.tNUKwkCO/Hm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:30:12', '2023-03-07 12:30:12'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sissy_1976@hotmail.com', NULL, '$2y$10$8mP8uylHpg4pw9lNJHfiZ.YyH5EsEstBNFx.4rzV7lqe4SvhgIIsu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:30:41', '2023-03-07 12:30:41'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'msimsaa83@gmail.com', NULL, '$2y$10$0teHfSzkiKdltLPhqYV3z.3BEC9RA.tvW4l2A/wokSWMuSn7mzudW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:31:28', '2023-03-07 12:31:28'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ak_imran@yahoo.com', NULL, '$2y$10$hYEw4j0vqQnbdaOC.G33hOrhzj5t808oK9bKu/g73DHXLJgL7Zncm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:31:58', '2023-03-07 12:31:58'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yomionikoyideckon@yahoo.com', NULL, '$2y$10$knn5tMbyGsXo8tiD4wA6vOkKnNr4uBR97bnLBUOPM/YKRXsm170M6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:32:20', '2023-03-07 12:32:20'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'roberta.jianu@yahoo.com', NULL, '$2y$10$E7xxd0JN60qZGdVuG4dOaeFiNbls4TJKmP/GxlNTD0QldzJFixIzm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:32:49', '2023-03-07 12:32:49'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abowisam@yahoo.com', NULL, '$2y$10$5ld94XZh8bYlV4iiECKKi.N1g6.HOMJ.DYidD7iH8ipRloRCqmkAq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:33:16', '2023-03-07 12:33:16'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drzahooronline@hotmail.com', NULL, '$2y$10$FVzOrenDd6PTac4OC6HtIerlVhI5zSCXP.Fn2/PnNdHomyedmV9He', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:33:43', '2023-03-07 12:33:43'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dralinazafar@yahoo.com', NULL, '$2y$10$1qyMPc20VmoWXpdixdtqT.fh50/aaddJji9Ujc4F7fpPjuRDFA5om', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:34:12', '2023-03-07 12:34:12'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dr.najam.iqbal@gmail.com', NULL, '$2y$10$hCT25bs02t/c8H0Pi3wuDuBf54jAnTB0tDXIZpuQQ8KYRxcVUFj3.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:34:45', '2023-03-07 12:34:45'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khalid.abdelbagi@hotmail.com', NULL, '$2y$10$0q0Mv3JvfBt4BHgyhckZc.mhSthNuaHIhBMUqveHG.3CUJ0UQ8CaW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:35:16', '2023-03-07 12:35:16'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'myada970@yahoo.com', NULL, '$2y$10$mynk.DjwsZsu3wF4jPdcNOH1A8.QTo7X4bEdf5zqjzOJEWOVdH7aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:35:37', '2023-03-07 12:35:37'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nmf1988g@hotmail.com', NULL, '$2y$10$wgJVeZryu/SHu71UAwxgyOEiyNg40cEz1LnpyVUAC7.Hpq2.jPs.u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:36:01', '2023-03-07 12:36:01'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ijazamir@hotmail.com', NULL, '$2y$10$OMWYfOxejaWw6XJ7qV5W6.FlY0bkk1a1AHZ7OKqPEnDxCwQF7Po.S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:36:29', '2023-03-07 12:36:29'),
(26, '6', '', '', '4', '', '', 'Ishraga', 'Bukhari', 'isragabukhari@gmail.com', 'F', '$2y$10$QwMN974F/ZHUcnVj/TB9jOxbE/aACSUYg/zZ995WW5YkGGLhOvyly', '858164268', '96277', '2723695O', 'K2pXV2dqN3VGTGpXcXV4aFlKSlRjaUFjd1NBbnF0Y01XZzlWNUFFNjRzeVNGRFkrelhXVlp1NFBwQy91MG16cg==.pdf', 'NDF1aFIwMkF4a3hydmVESXJNYUkzK3BoaW03bTkwVWs5b3c1NXBRa1JTQ2lZbnI0Q0JKNVJhS3NaeExja21HNA==.pdf', NULL, 'TCt0dTdLUlIzaG1aWEdIdzZCWlVSMVd5ci85QnFnR3kyeUd0MUtJSmw4UjNMeTFHV1NnRmQ1WThDTnNPMHNMSA==.pdf', 'OVVpN1orcHh1MlJFbmZvdUVJSWM0QVgrQ1dndVVnbU9hUXd1bmgxTjRzSWxUaWlUY1lFdzFyRi9UMFhXb0hnTg==.pdf', 'eDFVKzMvSzMrMlRlNHB3WVg0ek1lcTNNbDgzL3pjbk9zbU9EY0d6azN5d0NyalMzVXQ0UVp4VFFRdGRpZnNDYQ==.pdf', NULL, '1', '2023-03-07 12:36:54', '2023-03-08 14:20:04'),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muhammadmgkakahel@rcsi.com', NULL, '$2y$10$RTRxatHMUB2neuCw9VJwxOYwIkQ4Z4l..AEbO3V7D38O3nDZ.TqHW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:37:19', '2023-03-07 12:37:19'),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'usmanshafi_leo@hotmail.com', NULL, '$2y$10$KclJcdF9RBpGbPbnt3k7EehAdJX.DSO.wQ1AouRAv8ozCD5/1d9tG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:37:41', '2023-03-07 12:37:41'),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drtanveer33@yahoo.com', NULL, '$2y$10$nobL/IVadG3ZBAgw2pKG.uG.dYDfUaRuf2J4v583190y23ROAGsFa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:38:04', '2023-03-07 12:38:04'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dr_ammara.sultana@yahoo.com', NULL, '$2y$10$42cdg2r4fGuVEFM5IwGe2.rSjVXmyNhp0BaqKhKFW4TDBIJenhuaS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 12:39:34', '2023-03-07 12:39:34'),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abdoog@msn.com', NULL, '$2y$10$IQHS/BXHNfuwQv05iezMw.9OLlPStL8GpoaWmvWb/wqz84W07R8Zm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-07 13:21:03', '2023-03-07 13:21:03'),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mustufali@hotmail.com', NULL, '$2y$10$1XLfNWwq8QZTTEdWrn5t7exzBaWwyvOGxJZ05jI8ejIVEniVkmpW6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:08:51', '2023-03-08 11:08:51'),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drrabiabatool@gmail.com', NULL, '$2y$10$EV8d7RKTmeZ8xLY4T0GSS.Kg/B9GYovACtI7vk5zV9u/FZ9n2QByy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:09:14', '2023-03-08 11:09:14'),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aboodnayef91@hotmail.com', NULL, '$2y$10$SBbArtWy.pZqbll76Y6AY.r5EUrp5OZQeWIsUB567E2zfab6jqTlG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:09:38', '2023-03-08 11:09:38'),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drmaryammumtaz@gmail.com', NULL, '$2y$10$KOU6jqn7gQCneASPHrc6G.6.KsC3lzVvTbby7yH16SdlJj4BSdTra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:10:02', '2023-03-08 11:10:02'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dr.ssharif@hotmail.com', NULL, '$2y$10$41EPFjSkkwEkRzildeJVvupWe.4UMbZ8zZTEDXLdNIU19FOFNg42q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:10:26', '2023-03-08 11:10:26'),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shafiqchd@yahoo.com', NULL, '$2y$10$u4pMqHFzLZr.CsgGfwCoLOYyOBuOZHR7HiBKg01EUF1dawzldxrWm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:19:42', '2023-03-08 11:19:42'),
(38, '2', '', '', '5', '', '', 'Fareha', 'Amin', 'farehaaminm@gmail.com', 'F', '$2y$10$1g9LSvIU7jNGBYMnZGiXqO65Ai6WbiPxbfRb1Jutu0wcAX1tacxJO', '0871151371', '429101', '0680757I', 'Z29OMEJtK0Z3cVdOdThlek5MeWZ1amRDeVNlT3FMZndJL3JscC9XRVFsK3YrWkQ5a2VTYkNJNGJzYkt3NkR6Qw==.pdf', 'eW1UbHRGZTN2MmpEOFRSb1NvUTMzUlVSZ25LOC9XSmk4aHRsVTB2RThQNERMK2VERU5FcUdJUmJrd29FbU5VVw==.jpg', NULL, 'MUF4UWFGMy9RWERFdExNUVllZjcvMWJLb3lDQjlKdURkSVF1a0IyYTRIOD0=.pdf', 'bW5EYmVBODVUTFJnWE5OUjF6VEJ4bFBzT0c4bnBteHlQTWNobnZ4SVJqdz0=.pdf', NULL, NULL, '1', '2023-03-08 11:20:04', '2023-03-08 11:41:39'),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamedsiddig80@gmail.com', NULL, '$2y$10$gOo4JmO3n2SR.JfsUkZCM.3s/ckBRdBINxbX8tMwjbSWZ1g4dLAK6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:20:56', '2023-03-08 11:20:56'),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'beslin18.dhas@gmail.com', NULL, '$2y$10$bAkGXkM6AnT7c4DwmGeXl..Cev.Ov6DDUuVs4eWjuOZY1onNivlGa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:21:21', '2023-03-08 11:21:21'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'burhanbarki@gmail.com', NULL, '$2y$10$8aqlxVsFTN///qzwrfZhLOeVFkUsgGA9lA8YYGVfh28u8BfJwlI0m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-08 11:35:05', '2023-03-08 11:35:05'),
(42, '2', '2', '', '2', '4', '', 'Fahad ', 'Malik', 'drfahad09@gmail.com', 'M', '$2y$10$O6tBq2z13qo2Pd5DcQ2qc.7HG/OBen03.IwhkxYhlKdOrna2.zrga', '0834575801', '410555', '0', 'Wlk1emNVQ3BiTUd0aCtsMEVPbWF4am5CMDBwVnhFZ0c2Qkw0ZmhwajI2c2YrZTJldU54VENIdllzbFFtdXpNdQ==.pdf', 'UmtNZnhzRDN1aVUyQ2Q3d1JkM09XRG1mSHphVndqUkJUbzlPU3FGWnYxOD0=.pdf', NULL, NULL, NULL, 'QlpJM2ZDSGQvZ29tZlJSMUpVTTIvL1dLMDFNVUc4WVphQ0hMK1FwTDRwUT0=.pdf', 'Q2hQckJocDB2cDRsSFl5ek14Unc3ektHWDVTeEw0d3dKMWx2Zm5MSFE0MD0=.pdf', '1', '2023-03-08 15:01:34', '2023-03-08 15:20:19'),
(43, '6', '6', '', '4', '5', '', 'Tayyar', 'Anwar', 'tayyabanwar3@gmail.com', 'M', '$2y$10$M6CoFenhSXO8Te070/ZUVe9qmiFeGTvG1n/DNxyClpzJHaVxmMKye', '0838816565', '412053', '1929572UA', 'SDI3ZnVKUHZNeDZxRS8wU00wQ1k3Q1NDbE83TmN0YWVRbndTQzhwbExDVTNQMEZRNFByZ3IzZmJxYmYzTk1RTQ==.pdf', 'Z0FUV0c1QUdHNXNrWTZrTEg2QjV1TG5IUlBxeHFEcmtaR3VxWWU2eE5tT3V6Ymp2Q2NxR3lTWW5jRHNDZVZ5UUJWK3N4NWNOTmFnbHYvSURBdWZmYmc9PQ==.pdf', 'NUk1YTdvTno3eCtwWGZsNjR6ckdCWi9oNTlPZXJvd29PcWlaRHNmc3lyY2xhby9JMDlMYm5OcTJoQm53Q2xrVA==.pdf', 'T05jWkM1WWMyM2hEbTVHTXpYZXp3SU5VOS9oNGFCQ0x3K1BVQ1hmRGNGcz0=.pdf', NULL, 'Y3RPdXBhNE5Od2F4ejRrSW93US9POUNpVnJmaXd4MkJmbXAzQXZmRmF4WHE3dU1JS3FoaXRhV3dVVkl3QWdnWg==.pdf', 'UTVSOGhSNE5wVC8zQzVqQm9zNlo5ZTVlbDZGUjBsVTF2THhBWENQOW9tOD0=.pdf', '1', '2023-03-08 16:14:31', '2023-03-08 16:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `emp_grade`
--

CREATE TABLE `emp_grade` (
  `grade_id` int(155) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_created` datetime NOT NULL,
  `grade_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `emp_speciality` (
  `spec_id` int(155) NOT NULL,
  `spec_name` varchar(255) NOT NULL,
  `spec_created` datetime NOT NULL,
  `spec_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(15, 'RMO', '2023-01-23 03:59:28', '2023-01-23 03:59:28'),
(20, 'Microbiology', '2023-03-07 15:12:01', '2023-03-07 15:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `formulae`
--

CREATE TABLE `formulae` (
  `id` int(155) NOT NULL,
  `formula` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulae`
--

INSERT INTO `formulae` (`id`, `formula`, `title`, `created`, `updated`) VALUES
(1, '88.95', 'Payrate (Employee)', '2023-02-07 04:58:49', '2023-02-18 00:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(155) NOT NULL,
  `ord_id` int(155) DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `emp_id` int(155) DEFAULT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT '0-Unseen\r\n1- seen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `ord_id`, `link`, `emp_id`, `notification`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'backend/t-view', 38, 'New Timesheet submitted', '1', '2023-03-08 13:35:52', '2023-03-08 14:04:27'),
(2, 2, 'backend/t-view', 38, 'New Timesheet submitted', '1', '2023-03-08 14:03:59', '2023-03-08 14:04:31'),
(3, 3, 'backend/t-view', 26, 'New Timesheet submitted', '1', '2023-03-08 14:43:29', '2023-03-08 14:43:44'),
(4, 6, 'backend/order_view', 3, 'Order Cancel by Client', '1', '2023-03-08 16:24:00', '2023-03-08 16:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(155) NOT NULL,
  `ord_ref_no` varchar(255) DEFAULT NULL,
  `ord_speciality` varchar(1500) DEFAULT NULL,
  `ord_grade` varchar(1500) DEFAULT NULL,
  `cl_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
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
  `ord_on_call_hrs` varchar(1500) DEFAULT NULL,
  `ord_total_hrs` varchar(255) DEFAULT NULL,
  `ord_approx_cost` varchar(1500) DEFAULT NULL COMMENT 'Hospital Rate',
  `ord_hosp_earn` varchar(155) DEFAULT NULL,
  `ord_pay_to_dr` varchar(1500) DEFAULT NULL,
  `ord_paying_to_dr` varchar(155) DEFAULT NULL,
  `ord_admin_charges` varchar(1500) DEFAULT NULL,
  `ord_adminchrg_intern` varchar(155) DEFAULT NULL,
  `ord_diff_profit_admin` varchar(1500) DEFAULT NULL,
  `ord_time_sheet_rcvd` date DEFAULT NULL,
  `ord_time_sheet_mode` enum('whatsapp','email','fax','') DEFAULT NULL,
  `ord_time_sheet_process` date DEFAULT NULL,
  `ord_time_sheet_approved` varchar(1500) DEFAULT NULL,
  `ord_comment1` varchar(1500) DEFAULT NULL,
  `ord_invoice_refer` varchar(1500) DEFAULT NULL,
  `ord_invoice_date` date DEFAULT NULL,
  `ord_invoice_by` varchar(1500) DEFAULT NULL,
  `ord_vat_sale` varchar(155) DEFAULT NULL,
  `ord_vat_purch` varchar(155) DEFAULT NULL,
  `ord_vat_save` varchar(155) DEFAULT NULL,
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
  `ord_cancel_bcl` int(155) NOT NULL COMMENT '1 for cancel or 0 for active',
  `ord_cl_cremarks` varchar(2000) DEFAULT NULL,
  `ord_created` datetime DEFAULT NULL,
  `ord_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_ref_no`, `ord_speciality`, `ord_grade`, `cl_id`, `emp_id`, `ord_required_from`, `ord_required_to`, `ord_datetime_detail`, `ord_process_date`, `ord_process_details_from`, `ord_process_details_to`, `ord_prosdatetime_detail`, `ord_confirmation_date`, `ord_invoice_id`, `ord_normal_hrs`, `ord_on_call_hrs`, `ord_total_hrs`, `ord_approx_cost`, `ord_hosp_earn`, `ord_pay_to_dr`, `ord_paying_to_dr`, `ord_admin_charges`, `ord_adminchrg_intern`, `ord_diff_profit_admin`, `ord_time_sheet_rcvd`, `ord_time_sheet_mode`, `ord_time_sheet_process`, `ord_time_sheet_approved`, `ord_comment1`, `ord_invoice_refer`, `ord_invoice_date`, `ord_invoice_by`, `ord_vat_sale`, `ord_vat_purch`, `ord_vat_save`, `ord_sage_refer_no`, `ord_paymnt_rcvd_date`, `ord_pay_to_dr_date`, `ord_case_status`, `ord_payment_status`, `ord_assignment`, `ord_comment2`, `ord_status`, `ord_cancel_bdr`, `ord_dr_cremarks`, `ord_cancel_bcl`, `ord_cl_cremarks`, `ord_created`, `ord_updated`) VALUES
(1, 'SRAL-3440-Y23', '2', '5', 1, 38, '2023-01-09 16:43:00', '2023-01-12 16:44:00', 'Mon 9th - Thurs 12th Jan 2023 (9am - 7pm)', '2023-01-04', '2023-01-09 16:44:00', '2023-01-12 16:45:00', 'Mon 9th - Thurs 12th Jan 2023 (9am - 7pm)', '2023-01-04', 'SRAL-0472-Y23', '44', '0', '44.00', '50', NULL, '48/ 55/100', NULL, '7', NULL, '9.00', '2023-01-15', 'whatsapp', '2023-01-16', 'Approved', '', 'Monday 9th January 2023 (9am – 7pm), Tuesday 10th January 2023 (8am – 7pm), Wednesday 11th January 2023 (7am – 7pm), Thursday 12th January 2023 (8am – 7pm)', '2023-01-16', 'HS', '541.42', '0', '541.42', 'SRA-43385', NULL, '2023-01-20', 'Pending', 'Paid', '', '', '4', '', NULL, 0, NULL, '2023-03-08 12:42:15', '2023-03-08 13:53:58'),
(2, 'SRAL-3441-Y23', '2', '5', 1, 38, '2023-01-13 18:55:00', '2023-01-13 18:55:00', 'Fri 13th Jan 2023 (8am - 3pm)', '2023-01-05', '2023-01-13 18:55:00', '2023-01-13 18:55:00', 'Fri 13th Jan 2023 (8am - 3pm)', '2023-01-05', 'SRAL-0472-Y23', '7', '0', '7.00', '50', NULL, '48', NULL, '7', NULL, '9.00', '2023-01-15', 'whatsapp', '2023-01-16', 'Approved', '', 'Friday 13th January 2023 (8am – 3pm)', '2023-01-16', 'HS', '86.14', '0', '86.14', 'SRA-43385', NULL, '2023-01-20', '', 'Paid', NULL, '', '4', NULL, NULL, 0, NULL, '2023-03-08 14:01:52', '2023-03-08 14:01:52'),
(3, 'SRAL-3442-Y23', '6', '4', 2, 26, '2022-12-12 19:22:00', '2022-12-25 19:23:00', 'Mon 12th Dec 2022 - Onwards', '2023-01-04', '2022-12-12 19:23:00', '2022-12-25 19:23:00', 'Mon 12th Dec - Sun 25th Dec 2022', '2023-01-04', 'SRAL-0475-Y23', '40', '60', '100.00', '50, 60, 65, 70', NULL, '50, 60, 65, 70', NULL, '7', NULL, '402.50', '2023-01-16', 'email', '2023-01-17', 'Approved', '', 'Mon 12th Dec - Sun 25th Dec 2022', '2023-01-17', 'HS', '1415.08', '0', '1415.08', 'SRA-43388', NULL, '2023-01-20', '', 'Paid', NULL, '', '4', NULL, NULL, 0, NULL, '2023-03-08 14:35:11', '2023-03-08 14:35:11'),
(4, 'SRAL-3443-Y23', '2', '4', 1, 42, '2023-01-12 19:49:00', '2023-01-13 19:49:00', 'Thurs 12th Jan 2023 (10am - 10pm), Fri 13th Jan 2023 (8am - 8pm)', '2023-01-05', '2023-01-12 19:50:00', '2023-01-13 19:50:00', 'Thurs 12th Jan 2023 (10am - 10pm), Fri 13th Jan 2023 (8am - 8pm)', '2023-01-05', 'SRAL-0474-Y23', '16', '8', '24.00', '90', NULL, '90', NULL, '7', NULL, '151.20', '2023-01-16', 'email', '2023-01-17', 'Approved', '', 'Thursday 12th Jan 2023 (10am – 10pm), Friday 13th Jan 2023 (8am – 8pm)', '2023-01-17', 'HS', '531.58', '0', '531.58', 'SRA-43387', NULL, '2023-01-20', 'Pending', 'Paid', '', '', '4', '', NULL, 0, NULL, '2023-03-08 14:57:57', '2023-03-08 15:49:48'),
(5, 'SRAL-3444-Y23', '2', '5', 3, 9, '2023-01-06 20:54:00', '2023-01-06 20:54:00', 'Fri 6th Jan 2023 (9am - 9pm)', '2023-01-05', '2023-01-06 20:54:00', '2023-01-06 20:54:00', 'Fri 6th Jan 2023 (9am - 9pm)', '2023-01-05', 'SRAL-0464-Y23', '8', '4', '12.00', '55', NULL, '55', NULL, '7', NULL, '46.20', '2023-01-10', 'email', '2023-01-11', 'Approved', '', 'Friday 6th January 2022 (9am – 9pm)', '2023-01-11', 'HS', '162.43', '0', '162.43', 'SRA-43375', NULL, '2023-01-13', 'Pending', 'Paid', NULL, '', '4', NULL, NULL, 0, NULL, '2023-03-08 15:59:56', '2023-03-08 15:59:56'),
(6, '', '6', '5', 3, 43, '2023-01-07 21:21:00', '2023-01-07 21:21:00', 'Sat 7th Jan 2023 (9am - 9am)', '2023-01-05', '2023-01-09 21:21:00', '2023-01-09 21:21:00', 'Sat 7th Jan 2023 (9am - 9pm)', '0000-00-00', '', '8', '4', '12.00', '70', '840', '70', '840', '7', '58.80', '58.80', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2', '', NULL, 1, 'Arranged via another locum agency', '2023-03-08 16:23:35', '2023-03-09 09:01:10'),
(7, '', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '', '', '', NULL, '', NULL, '7', NULL, '0.00', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '', '1', NULL, NULL, 0, NULL, '2023-03-09 08:49:05', '2023-03-09 08:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `dutyDate` date NOT NULL,
  `dutyTime` varchar(10) NOT NULL,
  `siteStatus` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `order_id`, `dutyDate`, `dutyTime`, `siteStatus`, `createdAt`, `updatedAt`) VALUES
(20, 1, '2023-01-10', '10', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(19, 1, '2023-01-09', '10', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(18, 1, '2023-01-12', '9', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(17, 1, '2023-01-11', '9', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(16, 1, '2023-01-10', '9', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(15, 1, '2023-01-09', '9', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(14, 1, '2023-01-12', '8', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(13, 1, '2023-01-11', '8', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(12, 1, '2023-01-10', '8', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(11, 1, '2023-01-11', '7', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(21, 1, '2023-01-11', '10', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(22, 1, '2023-01-12', '10', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(23, 1, '2023-01-09', '11', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(24, 1, '2023-01-10', '11', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(25, 1, '2023-01-11', '11', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(26, 1, '2023-01-12', '11', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(27, 1, '2023-01-09', '12', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(28, 1, '2023-01-10', '12', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(29, 1, '2023-01-11', '12', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(30, 1, '2023-01-12', '12', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(31, 1, '2023-01-09', '13', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(32, 1, '2023-01-10', '13', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(33, 1, '2023-01-11', '13', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(34, 1, '2023-01-12', '13', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(35, 1, '2023-01-09', '14', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(36, 1, '2023-01-10', '14', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(37, 1, '2023-01-11', '14', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(38, 1, '2023-01-12', '14', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(39, 1, '2023-01-09', '15', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(40, 1, '2023-01-10', '15', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(41, 1, '2023-01-11', '15', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(42, 1, '2023-01-12', '15', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(43, 1, '2023-01-09', '16', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(44, 1, '2023-01-10', '16', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(45, 1, '2023-01-11', '16', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(46, 1, '2023-01-12', '16', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(47, 1, '2023-01-09', '17', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(48, 1, '2023-01-10', '17', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(49, 1, '2023-01-11', '17', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(50, 1, '2023-01-12', '17', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(51, 1, '2023-01-09', '18', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(52, 1, '2023-01-10', '18', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(53, 1, '2023-01-11', '18', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(54, 1, '2023-01-12', '18', 1, '2023-03-08 13:39:30', '2023-03-08 13:39:30'),
(55, 2, '2023-01-13', '8', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(56, 2, '2023-01-13', '9', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(57, 2, '2023-01-13', '10', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(58, 2, '2023-01-13', '11', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(59, 2, '2023-01-13', '12', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(60, 2, '2023-01-13', '13', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(61, 2, '2023-01-13', '14', 1, '2023-03-08 14:03:59', '2023-03-08 14:03:59'),
(62, 3, '2022-12-12', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(63, 3, '2022-12-13', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(64, 3, '2022-12-14', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(65, 3, '2022-12-15', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(66, 3, '2022-12-18', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(67, 3, '2022-12-19', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(68, 3, '2022-12-20', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(69, 3, '2022-12-21', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(70, 3, '2022-12-22', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(71, 3, '2022-12-25', '12', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(72, 3, '2022-12-12', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(73, 3, '2022-12-13', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(74, 3, '2022-12-14', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(75, 3, '2022-12-15', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(76, 3, '2022-12-18', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(77, 3, '2022-12-19', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(78, 3, '2022-12-20', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(79, 3, '2022-12-21', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(80, 3, '2022-12-22', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(81, 3, '2022-12-25', '13', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(82, 3, '2022-12-12', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(83, 3, '2022-12-13', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(84, 3, '2022-12-14', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(85, 3, '2022-12-15', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(86, 3, '2022-12-18', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(87, 3, '2022-12-19', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(88, 3, '2022-12-20', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(89, 3, '2022-12-21', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(90, 3, '2022-12-22', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(91, 3, '2022-12-25', '14', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(92, 3, '2022-12-12', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(93, 3, '2022-12-13', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(94, 3, '2022-12-14', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(95, 3, '2022-12-15', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(96, 3, '2022-12-18', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(97, 3, '2022-12-19', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(98, 3, '2022-12-20', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(99, 3, '2022-12-21', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(100, 3, '2022-12-22', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(101, 3, '2022-12-25', '15', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(102, 3, '2022-12-12', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(103, 3, '2022-12-13', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(104, 3, '2022-12-14', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(105, 3, '2022-12-15', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(106, 3, '2022-12-18', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(107, 3, '2022-12-19', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(108, 3, '2022-12-20', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(109, 3, '2022-12-21', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(110, 3, '2022-12-22', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(111, 3, '2022-12-25', '16', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(112, 3, '2022-12-12', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(113, 3, '2022-12-13', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(114, 3, '2022-12-14', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(115, 3, '2022-12-15', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(116, 3, '2022-12-18', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(117, 3, '2022-12-19', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(118, 3, '2022-12-20', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(119, 3, '2022-12-21', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(120, 3, '2022-12-22', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(121, 3, '2022-12-25', '17', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(122, 3, '2022-12-12', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(123, 3, '2022-12-13', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(124, 3, '2022-12-14', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(125, 3, '2022-12-15', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(126, 3, '2022-12-18', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(127, 3, '2022-12-19', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(128, 3, '2022-12-20', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(129, 3, '2022-12-21', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(130, 3, '2022-12-22', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(131, 3, '2022-12-25', '18', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(132, 3, '2022-12-12', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(133, 3, '2022-12-13', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(134, 3, '2022-12-14', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(135, 3, '2022-12-15', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(136, 3, '2022-12-18', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(137, 3, '2022-12-19', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(138, 3, '2022-12-20', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(139, 3, '2022-12-21', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(140, 3, '2022-12-22', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(141, 3, '2022-12-25', '19', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(142, 3, '2022-12-12', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(143, 3, '2022-12-13', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(144, 3, '2022-12-14', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(145, 3, '2022-12-15', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(146, 3, '2022-12-18', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(147, 3, '2022-12-19', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(148, 3, '2022-12-20', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(149, 3, '2022-12-21', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(150, 3, '2022-12-22', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(151, 3, '2022-12-25', '20', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(152, 3, '2022-12-12', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(153, 3, '2022-12-13', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(154, 3, '2022-12-14', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(155, 3, '2022-12-15', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(156, 3, '2022-12-18', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(157, 3, '2022-12-19', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(158, 3, '2022-12-20', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(159, 3, '2022-12-21', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(160, 3, '2022-12-22', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(161, 3, '2022-12-25', '21', 1, '2023-03-08 14:43:29', '2023-03-08 14:43:29'),
(162, 4, '2023-01-13', '8', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(163, 4, '2023-01-13', '9', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(164, 4, '2023-01-12', '10', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(165, 4, '2023-01-13', '10', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(166, 4, '2023-01-12', '11', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(167, 4, '2023-01-13', '11', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(168, 4, '2023-01-12', '12', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(169, 4, '2023-01-13', '12', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(170, 4, '2023-01-12', '13', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(171, 4, '2023-01-13', '13', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(172, 4, '2023-01-12', '14', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(173, 4, '2023-01-13', '14', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(174, 4, '2023-01-12', '15', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(175, 4, '2023-01-13', '15', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(176, 4, '2023-01-12', '16', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(177, 4, '2023-01-13', '16', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(178, 4, '2023-01-12', '17', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(179, 4, '2023-01-13', '17', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(180, 4, '2023-01-12', '18', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(181, 4, '2023-01-13', '18', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(182, 4, '2023-01-12', '19', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(183, 4, '2023-01-13', '19', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(184, 4, '2023-01-12', '20', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(185, 4, '2023-01-12', '21', 1, '2023-03-08 15:26:07', '2023-03-08 15:26:07'),
(186, 5, '2023-01-06', '9', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(187, 5, '2023-01-06', '10', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(188, 5, '2023-01-06', '11', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(189, 5, '2023-01-06', '12', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(190, 5, '2023-01-06', '13', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(191, 5, '2023-01-06', '14', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(192, 5, '2023-01-06', '15', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(193, 5, '2023-01-06', '16', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(194, 5, '2023-01-06', '17', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(195, 5, '2023-01-06', '18', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(196, 5, '2023-01-06', '19', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46'),
(197, 5, '2023-01-06', '20', 1, '2023-03-08 16:00:46', '2023-03-08 16:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(155) NOT NULL,
  `usr_name` varchar(500) NOT NULL,
  `usr_email` varchar(500) NOT NULL,
  `usr_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usr_designation` varchar(500) NOT NULL,
  `usr_status` varchar(255) NOT NULL,
  `grp_id` varchar(155) NOT NULL,
  `usr_created` datetime NOT NULL,
  `usr_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_email`, `usr_pwd`, `usr_designation`, `usr_status`, `grp_id`, `usr_created`, `usr_updated`) VALUES
(3, 'Shahid Ali', 'shahid@sra.com', '$2y$10$zUM7PG7P.brojV7SQrCm/.MypOVHhEvhBPieLg.L1iaWQmGQKjs0S', 'Locum Coordinator', '1', 'admin', '2023-02-28 20:20:15', '2023-03-07 10:58:13'),
(2, 'Imran Vardak', 'imranvardak@gmail.com', '$2y$10$Y2TOKjdFJ0MTX4uKML0tO.305IvdTErFfFoU/iXTqleIMA//DHD8W', 'CEO', '1', 'super_admin', '2023-01-24 21:41:05', '2023-03-07 11:29:13'),
(4, 'Wahab', 'wahab@sra.com', '$2y$10$q7e4bv.2KTupEcL9AUa3N.vXewi7wyXAGv5qnr8kjRqX6xZB0IL.6', 'CSR', '1', 'user', '2023-02-28 20:21:08', '2023-03-07 10:58:37'),
(5, 'Hamaad Siraj', 'hamaad@sra.com', '$2y$10$AJOTd0ovB7kY8Tp0Sb69Xu8uHLJlSJB31Y0zyl5v80pZlY2cbQgHG', 'Manager', '1', 'admin', '2023-03-07 10:46:37', '2023-03-07 10:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `usr_groups`
--

CREATE TABLE `usr_groups` (
  `grp_id` int(155) NOT NULL,
  `grp_role` varchar(500) NOT NULL,
  `grp_created` datetime NOT NULL,
  `grp_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_groups`
--

INSERT INTO `usr_groups` (`grp_id`, `grp_role`, `grp_created`, `grp_updated`) VALUES
(1, 'SuperAdmin', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(2, 'Admin', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(3, 'Editor', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(4, 'HR', '2023-01-24 14:34:05', '2023-01-24 14:34:05'),
(5, 'Finance', '2023-01-24 14:34:05', '2023-01-24 14:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`),
  ADD UNIQUE KEY `cl_cont_email` (`cl_cont_email`,`cl_usr`);

--
-- Indexes for table `cl_reg_cat`
--
ALTER TABLE `cl_reg_cat`
  ADD PRIMARY KEY (`reg_cat_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_grade`
--
ALTER TABLE `emp_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `emp_speciality`
--
ALTER TABLE `emp_speciality`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `formulae`
--
ALTER TABLE `formulae`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `usr_groups`
--
ALTER TABLE `usr_groups`
  ADD PRIMARY KEY (`grp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cl_reg_cat`
--
ALTER TABLE `cl_reg_cat`
  MODIFY `reg_cat_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `emp_grade`
--
ALTER TABLE `emp_grade`
  MODIFY `grade_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_speciality`
--
ALTER TABLE `emp_speciality`
  MODIFY `spec_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `formulae`
--
ALTER TABLE `formulae`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usr_groups`
--
ALTER TABLE `usr_groups`
  MODIFY `grp_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
