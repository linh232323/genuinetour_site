-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2012 at 10:52 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `benly`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE IF NOT EXISTS `customer_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cid_passport` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`id`, `username`, `password`, `email`, `cid_passport`, `phone`, `name`, `nation_id`) VALUES
(3, 'linh', '7c8c42518a3c1973f467f9a748b778c13037695b', 'linh', '123', '11', 'ho1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE IF NOT EXISTS `nation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`id`, `name`) VALUES
(1, 'Việt Nam'),
(3, 'American');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modify` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `num_0_5_children` int(11) NOT NULL,
  `num_5_11_children` int(11) NOT NULL,
  `num_2_12_children` int(11) NOT NULL,
  `num_adults` int(11) NOT NULL,
  `num_foreigners` int(11) NOT NULL,
  `outward_transport` int(11) NOT NULL,
  `return_transport` int(11) NOT NULL,
  `tour_cat_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `surcharges` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `num_0_5_children`, `num_5_11_children`, `num_2_12_children`, `num_adults`, `num_foreigners`, `outward_transport`, `return_transport`, `tour_cat_id`, `order_date`, `status`, `surcharges`, `total`) VALUES
(1, 3, 11, 11, 11, 11, 11, 1, 1, 1, '2012-10-14 15:01:24', 'ok', 11, 11),
(2, 3, 13, 33, 33, 33, 33, 1, 1, 2, '2012-10-17 17:01:08', 'sd', 123, 123);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modify` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `post_cat_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `create_date`, `last_modify`, `user_id`, `thumbnail_url`, `post_cat_id`) VALUES
(1, 'Cần Giờ', '<p>asldas;ldk;lsakd;laskd;asd</p>', '2012-10-20 08:27:48', '2012-10-20 08:27:48', 2, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `name_en`) VALUES
(1, 'Chưa sắp xếp', 'Unschedule'),
(2, 'Benly Cafe', 'Benly Coffee'),
(3, 'Dịch vụ', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE IF NOT EXISTS `room_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_cat_name` varchar(20) NOT NULL,
  `room_cat_name_en` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `room_cat_name`, `room_cat_name_en`) VALUES
(1, 'Đạt chuẩn', 'Standard'),
(2, '2 Sao', '2 Star'),
(3, '3 Sao', '3 Star'),
(4, '4 Sao', '4 Star'),
(5, '5 Sao', '5 Star'),
(6, 'Resort 3 Sao', 'Resort 3 Star'),
(7, 'Resort 4 Sao', 'Resort 4 Star'),
(8, 'Resort 5 Sao', 'Resort 5 Star');

-- --------------------------------------------------------

--
-- Table structure for table `room_order`
--

CREATE TABLE IF NOT EXISTS `room_order` (
  `order_id` int(10) unsigned NOT NULL,
  `room_cat_id` int(10) unsigned NOT NULL,
  `num_1_0` int(11) NOT NULL,
  `num_2_0` int(11) NOT NULL,
  `num_1_1` int(11) NOT NULL,
  `num_0_2` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`room_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_order`
--

INSERT INTO `room_order` (`order_id`, `room_cat_id`, `num_1_0`, `num_2_0`, `num_1_1`, `num_0_2`) VALUES
(1, 1, 4, 2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_account`
--

CREATE TABLE IF NOT EXISTS `system_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_account`
--

INSERT INTO `system_account` (`id`, `username`, `password`, `email`) VALUES
(1, 'system', '1071610ca5b642643e61098eab8f742fd393bf32', 'linh232324@gmail.com'),
(2, 'linhho', '1071610ca5b642643e61098eab8f742fd393bf32', 'linh232324@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE IF NOT EXISTS `tour_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_cat_name` varchar(20) NOT NULL,
  `tour_cat_name_en` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `tour_cat_name`, `tour_cat_name_en`) VALUES
(1, '2 sao', '2 star'),
(2, 'Đạt chuẩn', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `tour_intro`
--

CREATE TABLE IF NOT EXISTS `tour_intro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `program` text,
  `program_en` text,
  `outward_transport` int(11) NOT NULL,
  `return_transport` int(11) NOT NULL,
  `post_intro` text,
  `post_intro_en` text,
  `appendix` text,
  `appendix_en` text,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `during` varchar(255) DEFAULT NULL,
  `during_en` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tour_section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tour_intro`
--

INSERT INTO `tour_intro` (`id`, `name`, `name_en`, `program`, `program_en`, `outward_transport`, `return_transport`, `post_intro`, `post_intro_en`, `appendix`, `appendix_en`, `thumbnail_url`, `during`, `during_en`, `price`, `tour_section_id`) VALUES
(1, 'asd', 'asd', '<p>&nbsp;asd</p>', '<p>&nbsp;asd</p>', 1, 1, '<p><a href="http://benly.com/post/detail/id/1">asdkasdkljsad</a>&nbsp;asd</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>HO Duy nhat linh</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p>&nbsp;asd</p>', '<p>Khởi h&agrave;nh</p>', '<p><span class="Apple-tab-span" style="white-space:pre">	</span></p>', 'http://benly.com/upload/New Bitmap Image - Copy.bmp', 'asd', 'asd', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour_price`
--

CREATE TABLE IF NOT EXISTS `tour_price` (
  `tour_id` int(10) unsigned NOT NULL,
  `tour_cat_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `surcharge` int(11) NOT NULL,
  `foreign_charge` int(11) NOT NULL,
  PRIMARY KEY (`tour_id`,`tour_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_price`
--

INSERT INTO `tour_price` (`tour_id`, `tour_cat_id`, `price`, `surcharge`, `foreign_charge`) VALUES
(1, 1, 6666, 6666, 555);

-- --------------------------------------------------------

--
-- Table structure for table `tour_schedule`
--

CREATE TABLE IF NOT EXISTS `tour_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tour_schedule`
--

INSERT INTO `tour_schedule` (`id`, `tour_id`, `start_date`) VALUES
(1, 1, '2012-10-17 17:00:00'),
(2, 1, '2012-10-25 17:00:00'),
(3, 1, '2012-10-30 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour_section`
--

CREATE TABLE IF NOT EXISTS `tour_section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tour_section`
--

INSERT INTO `tour_section` (`id`, `name`, `name_en`) VALUES
(1, 'Hành trình Đông - Tây Bắc', ' '),
(2, 'Miền Bắc', ' '),
(3, 'Miền Trung', ' '),
(4, 'Miền Nam', ' '),
(5, 'Tây Nguyên', ' '),
(6, 'Xuyên Việt', ' '),
(7, 'Đông Nam Á', NULL),
(8, 'Đông Bắc Á', NULL),
(9, 'Âu - Úc - Mỹ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `name`, `name_en`) VALUES
(1, 'Xe', 'Bus'),
(2, 'Máy bay', 'Airplane'),
(3, 'Xe lửa', 'Train'),
(4, 'Tàu thủy', 'Ship');

-- --------------------------------------------------------

--
-- Table structure for table `transport_detail`
--

CREATE TABLE IF NOT EXISTS `transport_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transport_id` int(11) NOT NULL,
  `price_description` text,
  `price` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transport_detail`
--

INSERT INTO `transport_detail` (`id`, `transport_id`, `price_description`, `price`, `tour_id`) VALUES
(1, 1, 'asd', 200000, 1),
(2, 3, 'asdsad', 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE IF NOT EXISTS `traveller` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `passport` varchar(20) NOT NULL,
  `nation_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `old_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `traveller`
--

INSERT INTO `traveller` (`id`, `order_id`, `name`, `passport`, `nation_id`, `address`, `phone`, `old_year`) VALUES
(2, 1, 'asdsad', 'asd', 1, 'sad', 'asd', 123),
(3, 1, 'sad', 'asdd', 1, 'dd', 'dd', 44),
(4, 2, 'dsasd', 'dsad', 1, 'sdsd', 'sdsd', 123);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
