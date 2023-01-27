-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 26, 2021 at 03:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applib`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `adId` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `ad` text NOT NULL,
  PRIMARY KEY (`adId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `autId` int(11) NOT NULL AUTO_INCREMENT,
  `autName` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`autId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`autId`, `autName`) VALUES
(1, 'مولانا مفتی محمد ایاز صاحب'),
(2, 'ڈاکٹر مولانا حشمت علی صافی'),
(3, 'دیگر');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 1,
  `autId` int(11) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `name`, `order_no`, `autId`) VALUES
(1, 'قرآنیات', 1, 1),
(2, ' حدیث  و سیرت النبیﷺ', 2, 1),
(3, 'فقہ و اصول فقہ', 3, 1),
(4, 'اصلاح عقائد و اعمال', 4, 1),
(5, 'فضائل و مسائل', 5, 1),
(6, 'دعوتی وتحریکی کتب', 6, 1),
(7, 'بچوں کے لیے', 7, 2),
(9, 'مسنون دعائیں و ازکار', 8, 3),
(10, 'کالمز', 9, 3),
(11, 'حج و عمرہ', 11, 3),
(12, 'تعارف جامعہ تبلیغ القرآن', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_menus`
--

DROP TABLE IF EXISTS `main_menus`;
CREATE TABLE IF NOT EXISTS `main_menus` (
  `mmId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hassub` int(1) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`mmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `seqNo` int(11) NOT NULL,
  `productTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `productDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `seqNo`, `productTitle`, `catId`, `description`, `productDate`) VALUES
(3, 1, 'تعلیماتی قرآنی', 1, NULL, '2021-11-03 08:07:19'),
(7, 1, 'درس قرآن', 1, NULL, '2021-11-03 08:51:28'),
(9, 1, 'آسان تجوید', 1, NULL, '2021-11-03 08:51:28'),
(11, 1, 'التیسیر فی اصول التفسیر', 1, NULL, '2021-11-03 08:51:28'),
(12, 1, 'تعلیمات نبوی', 1, NULL, '2021-11-03 08:51:28'),
(13, 1, 'دینیات', 1, NULL, '2021-11-03 08:51:28'),
(14, 1, 'الفھم الحدیث فی اصطلاحات الحدیث', 1, NULL, '2021-11-03 08:51:28'),
(16, 1, 'تعارف فقہ و رصول فقہ', 1, NULL, '2021-11-03 08:51:28'),
(18, 1, 'تعلیمات اسلامی', 1, NULL, '2021-11-03 08:51:28'),
(19, 1, 'مختصر اصول فقہ', 1, NULL, '2021-11-03 08:51:28'),
(20, 1, '', 1, NULL, '2021-11-03 08:51:28'),
(21, 1, 'عمرہ قدم بہ قدم', 1, NULL, '2021-11-03 08:51:28'),
(22, 1, 'تعلیم المیراث', 1, NULL, '2021-11-03 08:51:28'),
(23, 1, 'دین کامل', 1, NULL, '2021-11-03 08:51:28'),
(24, 1, 'عقیدہ توحید اور ردشرک', 1, NULL, '2021-11-03 08:51:28'),
(25, 1, 'سبیل السنہ لردالبعۃ', 1, NULL, '2021-11-03 08:51:28'),
(28, 1, 'محرم کی حقیقت اور بدعات', 1, NULL, '2021-11-03 08:51:28'),
(29, 1, 'ماہ صفر', 1, NULL, '2021-11-03 08:51:28'),
(30, 1, 'عید میلادنبی کی حقیقت', 1, NULL, '2021-11-03 08:51:28'),
(31, 1, 'فضائل و مسائل رمضان المبارک', 1, NULL, '2021-11-03 08:51:28'),
(32, 1, 'فضائل و مسائل قربانی اور عیدین و احکام عشرہ ذی الھجہ', 1, NULL, '2021-11-03 08:51:28'),
(33, 1, 'ریاست مدینہ کا قیام و نظام', 1, NULL, '2021-11-03 08:51:28'),
(34, 1, 'مختصر تذکرہ سیرت نبی کریم ﷺ و صحابہ کرام', 1, NULL, '2021-11-03 08:51:28'),
(37, 1, 'تعلیم الصرف اردو شرح ارشاد الصرف', 1, NULL, '2021-11-03 08:51:28'),
(39, 1, 'مسنون دعائیں', 1, NULL, '2021-11-03 08:51:28'),
(40, 1, 'صدائے حق', 1, NULL, '2021-11-03 08:51:28'),
(42, 1, 'اسلام میں صفائی کا مقام اور اہمیت', 1, NULL, '2021-11-03 08:51:28'),
(43, 1, 'نظم جماعت اور تربیت ارکان', 1, NULL, '2021-11-03 08:51:28'),
(44, 1, 'اسلام میں خدمت خلق کی اہمیت، مقام اور طریقہ کار', 1, NULL, '2021-11-03 08:51:28'),
(45, 1, 'نوجوانان اسلام کی دینی و ملی ذمہ داریاں', 1, NULL, '2021-11-03 08:51:28'),
(46, 1, 'خواتین اسلام ', 1, NULL, '2021-11-03 08:51:28'),
(47, 1, 'ہم دعوت کا کام کیسے کریں؟', 1, NULL, '2021-11-03 08:51:28'),
(48, 1, 'ضرورت جماعت اور اطاعت امیر', 1, NULL, '2021-11-03 08:51:28'),
(49, 1, 'بحیثیت مسلمان ہماری ذمہ داریاں', 1, NULL, '2021-11-03 08:51:28'),
(50, 1, 'کامیابی تصور اور اصول', 1, NULL, '2021-11-03 08:51:28'),
(51, 1, 'مدارس عربیہ', 1, NULL, '2021-11-03 08:51:28'),
(53, 2, 'درس قرآن مقاصد، اھداف', 2, NULL, '2021-11-04 08:35:26'),
(54, 2, 'خلاصۃ القرآن', 2, NULL, '2021-11-04 08:35:26'),
(55, 2, 'تفسیر سورۃ فاتحہ و اصول تفسیر', 2, NULL, '2021-11-04 08:35:26'),
(56, 2, 'دعوت', 2, NULL, '2021-11-04 08:35:26'),
(57, 2, 'بحیثیت مسلمان ذمہ داری', 2, NULL, '2021-11-04 08:35:26'),
(58, 2, 'خدمت خلق اہمیت، مقام او طریقہ کار', 2, NULL, '2021-11-04 08:35:26'),
(59, 2, 'دینی او ملی ذمہ واریانی', 2, NULL, '2021-11-04 08:35:27'),
(60, 2, 'د زنانو ذمہ واریانی', 2, NULL, '2021-11-04 08:35:27'),
(61, 2, 'د کامیابی تصور و اصول', 2, NULL, '2021-11-04 08:35:27'),
(62, 2, 'صفائی او اسلامی تعلیمات', 2, NULL, '2021-11-04 08:35:27'),
(63, 2, 'مختصرہ تذکرہ د نبی کریمﷺ او د صحابہ کرام سیرت', 2, NULL, '2021-11-04 08:35:27'),
(64, 2, 'د ریاست مدینہ قیام و نظام', 2, NULL, '2021-11-04 08:35:27'),
(65, 2, 'عقیدہ توحید اور ردشرک', 2, NULL, '2021-11-04 08:35:27'),
(66, 2, 'سبیل السنہ لردالبعۃ', 2, NULL, '2021-11-04 08:35:27'),
(67, 2, 'دین کامل یعنی مکمل نظام حیات', 2, NULL, '2021-11-04 08:35:27'),
(68, 2, 'دینیات', 2, NULL, '2021-11-04 08:35:27'),
(69, 2, 'حج و عمرہ قدم بہ قدم', 2, NULL, '2021-11-04 08:35:27'),
(70, 2, 'د محرم تاریخ پس منظر او مروجہ بدعات', 2, NULL, '2021-11-04 08:35:27'),
(71, 2, 'د ربیع الاول میاشت او عید میلاد نبیﷺ', 2, NULL, '2021-11-04 08:35:27'),
(72, 2, 'د رمضان فضاٗئل او مسائل', 2, NULL, '2021-11-04 08:35:27'),
(73, 2, 'د قربانی فضائل او مسائل', 2, NULL, '2021-11-04 08:35:27'),
(74, 2, 'تعلیمات نبویﷺ', 2, NULL, '2021-11-04 08:35:27'),
(75, 2, 'تعلیمات قرآنی', 2, NULL, '2021-11-04 08:35:27'),
(76, 2, 'تعلیمات اسلامی', 2, NULL, '2021-11-04 08:35:27'),
(77, 2, 'د مونز لفظی ترجمہ', 2, NULL, '2021-11-04 08:35:27'),
(78, 2, 'مسنون دعاگانے', 2, NULL, '2021-11-04 08:35:27'),
(81, 3, 'تعلیم القرآن قاعدہ', 3, NULL, '2021-11-06 05:08:57'),
(82, 3, 'حج و عمرہ قدم بہ قدم', 3, NULL, '2021-11-06 05:08:57'),
(83, 3, 'دین کامل', 3, NULL, '2021-11-06 05:08:57'),
(84, 3, 'عقدہ توحید رد شرک', 3, NULL, '2021-11-06 05:08:57'),
(85, 3, 'سبیل السنہ لرد البدعہ', 3, NULL, '2021-11-06 05:08:57'),
(86, 3, 'خدمت خلق اہمیت، مقام او طریقہ کار', 3, NULL, '2021-11-06 05:08:57'),
(87, 3, 'سیرت النبی', 3, NULL, '2021-11-06 05:08:57'),
(88, 3, 'تصورو اساسات موفقیت', 3, NULL, '2021-11-06 05:08:57'),
(89, 3, 'تعلیماتی قرآنی', 3, NULL, '2021-11-06 05:08:57'),
(90, 3, 'تعلیماتی نبوی', 3, NULL, '2021-11-06 05:08:57'),
(91, 3, 'تعلیماتی اسلامی', 3, NULL, '2021-11-06 05:08:57'),
(92, 4, 'Taleemat-e-Qurani', 4, NULL, '2021-11-06 05:20:28'),
(93, 4, 'Taleemat-e-Nabavi', 4, NULL, '2021-11-06 05:20:28'),
(94, 4, 'Deen-e-Kamil', 4, NULL, '2021-11-06 05:20:28'),
(95, 4, 'The Successs ', 4, NULL, '2021-11-06 05:20:28'),
(96, 4, 'Terminologues of Tafseer', 4, NULL, '2021-11-06 05:20:28'),
(97, 4, 'Holy Prophet', 4, NULL, '2021-11-06 05:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `slideId` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `slide` text NOT NULL,
  PRIMARY KEY (`slideId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slideId`, `link`, `slide`) VALUES
(1, '#', 'jtq_fb.jpg'),
(2, '#', 'kws_jtq.jpg'),
(3, '#', 'ilm_fb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subCatId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  PRIMARY KEY (`subCatId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subsId` int(11) NOT NULL AUTO_INCREMENT,
  `subsName` varchar(155) NOT NULL,
  `subsContact` varchar(155) NOT NULL,
  `subsCountry` varchar(11) DEFAULT NULL,
  `subsCity` varchar(11) NOT NULL,
  `subsRegion` varchar(11) DEFAULT NULL,
  `subsAddress` text NOT NULL,
  `subsEmail` varchar(155) NOT NULL,
  `subsPassword` varchar(155) NOT NULL,
  `subsDate` date NOT NULL,
  PRIMARY KEY (`subsId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

DROP TABLE IF EXISTS `sub_menus`;
CREATE TABLE IF NOT EXISTS `sub_menus` (
  `subId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sequence` int(11) NOT NULL,
  `page_link_name` varchar(25) NOT NULL,
  `mmId` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`subId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

DROP TABLE IF EXISTS `verifications`;
CREATE TABLE IF NOT EXISTS `verifications` (
  `verId` int(11) NOT NULL AUTO_INCREMENT,
  `verMobile` varchar(100) NOT NULL,
  `verCode` varchar(11) NOT NULL,
  `verDate` datetime NOT NULL,
  PRIMARY KEY (`verId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
