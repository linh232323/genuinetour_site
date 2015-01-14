-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 06:36 PM
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
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `name_en`, `link`, `parent_id`) VALUES
(1, 'Trang chủ', 'Home', '/', 0),
(2, 'Nội địa', 'Domestic', '/tour/list/tour-section/10', 0),
(3, 'Khuyến Mãi Đặc Biệt', 'Northern', '/tour/list/tour-section/13', 2),
(4, 'Hành Trình Đông – Tây Bắc', 'Central', '/tour/list/tour-section/1', 2),
(5, 'Miền Bắc', 'Highland', '/tour/list/tour-section/2', 2),
(6, 'Miền Trung', ' ', '/tour/list/tour-section/3', 2),
(7, 'Miền Nam', ' ', '/tour/list/tour-section/4', 2),
(8, 'Tây Nguyên', ' ', '/tour/list/tour-section/5', 2),
(9, 'Khởi hành từ Hà Nội', ' ', '/tour/list/tour-section/14', 2),
(10, 'Xuyên Việt', '', '/tour/list/tour-section/6', 2),
(11, 'Tour quốc tế', '  ', '/tour/list/tour-section/11', 0),
(12, 'Đông Nam Á', ' ', '/tour/list/tour-section/7', 11),
(13, 'Đông Bắc Á', ' ', '/tour/list/tour-section/8', 11),
(14, 'Ấn Độ - Nepal', '  ', '/tour/list/tour-section/10', 11),
(15, 'Âu - Mỹ - Úc', ' ', '/tour/list/tour-section/15', 11),
(16, 'Tour đặc biệt', ' ', '/tour/list/tour-section/12', 0),
(17, 'Tuần Trăng Mật', ' ', '#', 16),
(18, 'Resort 5 sao', '', '#', 16),
(19, 'Vé Máy Bay - Tàu', ' ', '/post/list/post-cat/2', 0),
(20, 'Lịch khởi hành', ' ', '#', 0),
(21, 'Lịch Tour Nội Địa', ' ', '#', 20),
(22, 'Lịch Tour Nước Ngoài', ' ', '#', 20),
(23, 'Lịch Tour Đặc Biệt', ' ', '#', 20),
(24, 'Bảng giá', ' ', '#', 0),
(25, 'Giá Tour Nội Địa', ' ', '#', 25),
(26, 'Giá Tour Nước Ngoài', ' ', '#', 25),
(27, 'Giá Tour Đặc Biệt', ' ', '#', 25),
(28, 'Benly Café', ' ', '/post/list/post-cat/9', 0),
(29, 'Dịch vụ', '', '#', 0),
(30, 'Xe', '', '/post/list/post-cat/4', 29),
(31, 'Khách Sạn', ' ', '/post/list/post-cat/3', 29),
(32, 'Hướng dẫn viên', '', '/post/list/post-cat/5', 29),
(33, 'Tàu hỏa', '', '#', 29),
(34, 'Tour Voucher', '', '#', 29),
(35, 'Visa', '', '#', 29),
(36, 'Từ thiện', '', '/post/list/post-cat/10', 0);

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
  `num_6_12_children` int(11) NOT NULL,
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
  `payment_id` int(11) DEFAULT NULL,
  `tour_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `num_0_5_children`, `num_6_12_children`, `num_2_12_children`, `num_adults`, `num_foreigners`, `outward_transport`, `return_transport`, `tour_cat_id`, `order_date`, `status`, `surcharges`, `total`, `payment_id`, `tour_id`) VALUES
(1, 3, 11, 11, 11, 11, 11, 1, 1, 1, '2012-10-25 16:28:29', 'ok', 11, 11, NULL, 1),
(2, 3, 13, 33, 33, 33, 33, 1, 1, 2, '2012-10-25 16:28:43', 'sd', 123, 123, NULL, 1);

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
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `create_date`, `last_modify`, `user_id`, `thumbnail_url`, `post_cat_id`, `description`) VALUES
(1, 'Cần Giờ', '<p>&#160;</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; "><b>Cần Giờ</b>&#160;là một&#160;<a href="http://vi.wikipedia.org/wiki/Huy%E1%BB%87n" title="Huyện" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">huyện</a>&#160;ven biển nằm ở phía đông nam của&#160;<a href="http://vi.wikipedia.org/wiki/Th%C3%A0nh_ph%E1%BB%91_H%E1%BB%93_Ch%C3%AD_Minh" title="Thành phố Hồ Chí Minh" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Thành phố Hồ Chí Minh</a>, cách trung tâm khoảng 50&#160;<a href="http://vi.wikipedia.org/wiki/Kil%C3%B4m%C3%A9t" title="Kilômét" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">km</a>. Vào năm 2009, huyện có số dân là 68.213 người, gồm các dân tộc&#160;<a href="http://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Vi%E1%BB%87t" title="Người Việt" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Kinh</a>&#160;(80%),&#160;<a href="http://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Khmer" title="Người Khmer" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Khmer</a>&#160;và&#160;<a href="http://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Ch%C4%83m" title="Người Chăm" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Chăm</a>. Huyện Cần Giờ bao gồm&#160;<a href="http://vi.wikipedia.org/wiki/Th%E1%BB%8B_tr%E1%BA%A5n" title="Thị trấn" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">thị trấn</a>&#160;<a href="http://vi.wikipedia.org/wiki/C%E1%BA%A7n_Th%E1%BA%A1nh" title="Cần Thạnh" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Cần Thạnh</a>&#160;và 6&#160;<a href="http://vi.wikipedia.org/wiki/X%C3%A3" title="Xã" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">xã</a>: Bình Khánh, An Thới Đông, Lý Nhơn, Tam Thôn Hiệp, Long Hòa và Thạnh An.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Diện tích của huyện là 704,2&#160;<a href="http://vi.wikipedia.org/wiki/Kil%C3%B4m%C3%A9t_vu%C3%B4ng" title="Kilômét vuông" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">km²</a><span class="reference plainlinksneverexpand" id="ref_no" style="background-image: none !important; padding: 0px !important; font-size: 10px; white-space: nowrap; background-position: initial initial !important; background-repeat: initial initial !important; "><sup style="line-height: 1em; "><a class="external autonumber" href="http://vi.wikipedia.org/wiki/C%E1%BA%A7n_Gi%E1%BB%9D#endnote_no" style="text-decoration: none; color: rgb(102, 51, 102); background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAVklEQVR4Xn3PgQkAMQhDUXfqTu7kTtkpd5RA8AInfArtQ2iRXFWT2QedAfttj2FsPIOE1eCOlEuoWWjgzYaB/IkeGOrxXhqB+uA9Bfcm0lAZuh+YIeAD+cAqSz4kCMUAAAAASUVORK5CYII=); padding-top: 0px !important; padding-right: 13px; padding-bottom: 0px !important; padding-left: 0px !important; background-position: 0% 0%; background-repeat: no-repeat no-repeat; ">[2]</a></sup></span>. Địa hình chia cắt bởi sông, rạch, không có nước ngọt. Rừng sác và đước, đất rừng chiếm 47,25% diện tích.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Huyện có khoảng 786 km sông rạch. Mật độ vào khoảng 1.11km/km2.( đo bằng phần mềm Map.Info )</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Huyện Cần Giờ tiếp cận với&#160;<a href="http://vi.wikipedia.org/wiki/Bi%E1%BB%83n_%C4%90%C3%B4ng" title="Biển Đông" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">biển Đông</a>&#160;hiện hữu một khu rừng ngập mặn đan xen với&#160;<a href="http://vi.wikipedia.org/w/index.php?title=H%E1%BB%87_th%E1%BB%91ng_s%C3%B4ng&amp;action=edit&amp;redlink=1" class="new" title="Hệ thống sông (trang chưa được viết)" style="text-decoration: none; color: rgb(165, 88, 88); background-image: none; background-position: initial initial; background-repeat: initial initial; ">hệ thống sông</a>&#160;rạch dày đặc chứa đựng các hệ sinh thái mang tính đa dạng sinh học cao với nhiều loài động thực vật đặc hữu của miền duyên hải&#160;<a href="http://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam" title="Việt Nam" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Việt Nam</a>, đó là khu&#160;<a href="http://vi.wikipedia.org/wiki/R%E1%BB%ABng_ng%E1%BA%ADp_m%E1%BA%B7n_C%E1%BA%A7n_Gi%E1%BB%9D" title="Rừng ngập mặn Cần Giờ" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">rừng ngập mặn Cần Giờ</a>.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Huyện này có 69&#160;<a href="http://vi.wikipedia.org/wiki/C%C3%B9_lao" title="Cù lao" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">cù lao</a>&#160;lớn nhỏ.</p>\r\n<div class="thumb tright" style="clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; font-family: sans-serif; font-size: 13px; line-height: 19.200000762939453px; ">\r\n<div class="thumbinner" style="border: 1px solid rgb(204, 204, 204); background-color: rgb(249, 249, 249); font-size: 12px; text-align: center; overflow: hidden; padding: 3px !important; width: 202px; "><a href="http://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Can_Gio_Arenga_Forest.JPG" class="image" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; "><img alt="" src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Can_Gio_Arenga_Forest.JPG/200px-Can_Gio_Arenga_Forest.JPG" width="200" height="148" class="thumbimage" style="border: 1px solid rgb(204, 204, 204); vertical-align: middle; background-color: rgb(255, 255, 255); " /></a>\r\n<div class="thumbcaption" style="border: none; line-height: 1.4em; font-size: 11px; padding: 3px !important; text-align: left; ">\r\n<div class="magnify" style="border: none !important; background-image: none !important; float: right; background-position: initial initial !important; background-repeat: initial initial !important; "><a href="http://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Can_Gio_Arenga_Forest.JPG" class="internal" title="Phóng lớn" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none !important; display: block; border: none !important; background-position: initial initial !important; background-repeat: initial initial !important; "><img src="http://bits.wikimedia.org/static-1.20wmf10/skins/common/images/magnify-clip.png" width="15" height="11" alt="" style="border: none !important; vertical-align: middle; display: block; background-image: none !important; background-position: initial initial !important; background-repeat: initial initial !important; " /></a></div>\r\nRừng Cần Giờ</div>\r\n</div>\r\n</div>\r\n<h2 style="background-image: none; font-weight: normal; margin: 0px 0px 0.6em; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); font-size: 19px; font-family: sans-serif; line-height: 19.200000762939453px; "><span class="editsection" style="-webkit-user-select: none; float: right; font-size: 13px; margin-left: 5px; ">[<a href="http://vi.wikipedia.org/w/index.php?title=C%E1%BA%A7n_Gi%E1%BB%9D&amp;action=edit&amp;section=1" title="Sửa đổi phần “Lịch sử”" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">sửa</a>]</span><span class="mw-headline" id="L.E1.BB.8Bch_s.E1.BB.AD">Lịch sử</span></h2>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Thời&#160;<a href="http://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam_C%E1%BB%99ng_h%C3%B2a" title="Việt Nam Cộng hòa" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Việt Nam Cộng hòa</a>, địa bàn huyện Cần Giờ gồm hai quận Cần Giờ và&#160;<a href="http://vi.wikipedia.org/w/index.php?title=Qu%E1%BA%A3ng_Xuy%C3%AAn&amp;action=edit&amp;redlink=1" class="new" title="Quảng Xuyên (trang chưa được viết)" style="text-decoration: none; color: rgb(165, 88, 88); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Quảng Xuyên</a>, thuộc tỉnh&#160;<a href="http://vi.wikipedia.org/wiki/Ph%C6%B0%E1%BB%9Bc_Tuy" title="Phước Tuy" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Phước Tuy</a>. Quận Quảng Xuyên được thành lập ngày&#160;<a href="http://vi.wikipedia.org/wiki/29_th%C3%A1ng_1" title="29 tháng 1" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">29 tháng 1</a>&#160;năm&#160;<a href="http://vi.wikipedia.org/wiki/1959" title="1959" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">1959</a>, gồm các xã Bình Khánh, An Thới Đông, Tam Thôn Hiệp, và Lý Nhơn.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Ngày&#160;<a href="http://vi.wikipedia.org/wiki/9_th%C3%A1ng_9" title="9 tháng 9" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">9 tháng 9</a>&#160;năm&#160;<a href="http://vi.wikipedia.org/wiki/1960" title="1960" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">1960</a>, chính quyền Việt Nam Cộng hòa chuyển hai quận này sang&#160;<a href="http://vi.wikipedia.org/wiki/T%E1%BB%89nh_Bi%C3%AAn_H%C3%B2a" title="Tỉnh Biên Hòa" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">tỉnh Biên Hòa</a>. Năm 1970 thì hai quận này nhập vào&#160;<a href="http://vi.wikipedia.org/wiki/T%E1%BB%89nh_Gia_%C4%90%E1%BB%8Bnh" title="Tỉnh Gia Định" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">tỉnh Gia Định</a>.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Về phía chính quyền&#160;<a href="http://vi.wikipedia.org/wiki/M%E1%BA%B7t_tr%E1%BA%ADn_d%C3%A2n_t%E1%BB%99c_gi%E1%BA%A3i_ph%C3%B3ng_mi%E1%BB%81n_Nam_Vi%E1%BB%87t_Nam" title="Mặt trận dân tộc giải phóng miền Nam Việt Nam" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Mặt trận dân tộc giải phóng miền Nam Việt Nam</a>, và&#160;<a href="http://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam_D%C3%A2n_ch%E1%BB%A7_C%E1%BB%99ng_h%C3%B2a" title="Việt Nam Dân chủ Cộng hòa" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Việt Nam Dân chủ Cộng hòa</a>, thì huyện Cần Giờ thuộc tỉnh&#160;<a href="http://vi.wikipedia.org/wiki/Gia_%C4%90%E1%BB%8Bnh" title="Gia Định" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Gia Định</a>&#160;cũ. Sau khi đất nước thống nhất, huyện thuộc tỉnh&#160;<a href="http://vi.wikipedia.org/wiki/%C4%90%E1%BB%93ng_Nai" title="Đồng Nai" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Đồng Nai</a>&#160;(1976–78) với tên gọi là huyện Duyên Hải. Ngày&#160;<a href="http://vi.wikipedia.org/wiki/28_th%C3%A1ng_12" title="28 tháng 12" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">28 tháng 12</a>&#160;năm&#160;<a href="http://vi.wikipedia.org/wiki/1978" title="1978" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">1978</a>&#160;huyện&#160;<a href="http://vi.wikipedia.org/wiki/Duy%C3%AAn_H%E1%BA%A3i,_Th%C3%A0nh_ph%E1%BB%91_H%E1%BB%93_Ch%C3%AD_Minh" title="Duyên Hải, Thành phố Hồ Chí Minh" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Duyên Hải</a>được sáp nhập vào Thành phố Hồ Chí Minh. Ngày&#160;<a href="http://vi.wikipedia.org/wiki/18_th%C3%A1ng_12" title="18 tháng 12" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">18 tháng 12</a>&#160;năm&#160;<a href="http://vi.wikipedia.org/wiki/1991" title="1991" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">1991</a>&#160;huyện lấy lại tên cũ là Cần Giờ. Huyện có GDP thấp nhất của TP HCM.</p>\r\n<div class="thumb tright" style="clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; font-family: sans-serif; font-size: 13px; line-height: 19.200000762939453px; ">\r\n<div class="thumbinner" style="border: 1px solid rgb(204, 204, 204); background-color: rgb(249, 249, 249); font-size: 12px; text-align: center; overflow: hidden; padding: 3px !important; width: 202px; "><a href="http://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Can_Gio_Beach.JPG" class="image" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; "><img alt="" src="http://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Can_Gio_Beach.JPG/200px-Can_Gio_Beach.JPG" width="200" height="149" class="thumbimage" style="border: 1px solid rgb(204, 204, 204); vertical-align: middle; background-color: rgb(255, 255, 255); " /></a>\r\n<div class="thumbcaption" style="border: none; line-height: 1.4em; font-size: 11px; padding: 3px !important; text-align: left; ">\r\n<div class="magnify" style="border: none !important; background-image: none !important; float: right; background-position: initial initial !important; background-repeat: initial initial !important; "><a href="http://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Can_Gio_Beach.JPG" class="internal" title="Phóng lớn" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none !important; display: block; border: none !important; background-position: initial initial !important; background-repeat: initial initial !important; "><img src="http://bits.wikimedia.org/static-1.20wmf10/skins/common/images/magnify-clip.png" width="15" height="11" alt="" style="border: none !important; vertical-align: middle; display: block; background-image: none !important; background-position: initial initial !important; background-repeat: initial initial !important; " /></a></div>\r\nBiển Cần Giờ</div>\r\n</div>\r\n</div>\r\n<h2 style="background-image: none; font-weight: normal; margin: 0px 0px 0.6em; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); font-size: 19px; font-family: sans-serif; line-height: 19.200000762939453px; "><span class="editsection" style="-webkit-user-select: none; float: right; font-size: 13px; margin-left: 5px; ">[<a href="http://vi.wikipedia.org/w/index.php?title=C%E1%BA%A7n_Gi%E1%BB%9D&amp;action=edit&amp;section=2" title="Sửa đổi phần “Chùa”" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; ">sửa</a>]</span><span class="mw-headline" id="Ch.C3.B9a">Chùa</span></h2>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; ">Huyện Cần Giờ có 8 ngôi chùa; 2 chùa thuộc phái Tịnh Độ Cư sĩ; Chỉ có Chùa Hải Đức (xã Cần Thạnh), Chùa Quang Minh Như Lai (xã Bình Khánh) và Chùa Nhơn Hòa (xã Lý Nhơn) là có tu sĩ trụ trì. Chùa Thạnh Phước (Chùa Cây Me) ở xã Cần Thạnh là chùa cổ hơn cả.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; font-family: sans-serif; font-size: 13px; "><cite id="endnote_no" style="font-style: normal; word-wrap: break-word; "><a href="http://vi.wikipedia.org/wiki/C%E1%BA%A7n_Gi%E1%BB%9D#ref_no" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial; "><b>^</b></a></cite>&#160; Theo&#160;<i>Tập bản đồ Hành chính Việt Nam</i>,&#160;<a href="http://vi.wikipedia.org/w/index.php?title=Nh%C3%A0_xu%E1%BA%A5t_b%E1%BA%A3n_B%E1%BA%A3n_%C4%91%E1%BB%93&amp;action=edit&amp;redlink=1" class="new" title="Nhà xuất bản Bản đồ (trang chưa được viết)" style="text-decoration: none; color: rgb(165, 88, 88); background-image: none; background-position: initial initial; background-repeat: initial initial; ">Nhà xuất bản Bản đồ</a>, 9/2005.</p>\r\n<div>&#160;</div>\r\n<div class="boilerplate metadata plainlinks" id="stub" style="background-image: url(http://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Baustelle.svg/32px-Baustelle.svg.png); padding-left: 40px; font-family: sans-serif; font-size: 13px; line-height: 19.200000762939453px; background-position: 0% 50%; background-repeat: no-repeat no-repeat; ">&#160;</div>\r\n<p>&#160;</p>', '2012-10-24 17:09:42', '2012-10-24 17:09:42', 2, '', 2, '<p>&#160;asd</p>'),
(2, 'Máy bay', '<p>asd&#160;</p>', '2012-10-24 17:09:58', '2012-10-24 17:09:58', 2, '', 2, '<p>asdasd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `name_en`) VALUES
(1, 'Chưa sắp xếp', 'Unschedule'),
(2, 'Vé Máy bay - Tàu', 'Airplane - Train'),
(3, 'Đặt phòng khách sạn', 'Booking hotel'),
(4, 'Cho thuê xe', 'Car For Rent'),
(5, 'Cho thuê hướng dẫn viên', 'Guide For Rent'),
(6, 'Tổ chức sự kiện', 'Event'),
(7, 'Dịch vụ tư vấn quản lý', 'Consultant'),
(8, 'Mặt hàng thời trang', 'Fashion'),
(9, 'Benly Cafe', 'Benly Coffee'),
(10, 'Từ thiện', 'Charity'),
(11, 'Dịch vụ', 'Service');

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
(1, 'system', '8da44e6f6953055b61b2e7af1e01811c38f475a6', 'linh232324@gmail.com'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tour_intro`
--

INSERT INTO `tour_intro` (`id`, `name`, `name_en`, `program`, `program_en`, `outward_transport`, `return_transport`, `post_intro`, `post_intro_en`, `appendix`, `appendix_en`, `thumbnail_url`, `during`, `during_en`, `price`, `tour_section_id`) VALUES
(1, 'asd', 'asd', '<p>&#160;asd</p>', '<p>&#160;asd</p>', 1, 1, '<p><a href="http://benly.com/post/detail/id/1">asdkasdkljsad</a>&#160;asd</p>\r\n<p>&#160;</p>\r\n<p>&#160;</p>\r\n<div>HO Duy nhat linh</div>\r\n<p>&#160;</p>\r\n<p>&#160;</p>', '<p>&#160;asd</p>', '<p>Khởi hành</p>', '<p><span class="Apple-tab-span" style="white-space:pre">	</span></p>', NULL, 'asd', 'asd', 10000, 10),
(2, 'asd', 'asd', '<p>&#160;asd</p>', '<p>&#160;asd</p>', 1, 1, '<p>&#160;asd</p>', '<p>&#160;asd</p>', '<p>&#160;asd</p>', '<p>&#160;asd</p>', 'http://benly.com/upload/', 'asd', 'asda', 123123, 11),
(3, 'ddddddddddddd', 'asd', '<p>&#160;asd</p>', '<p>&#160;asd</p>', 1, 1, '<p>&#160;asd</p>', '<p>&#160;asd</p>', '<p>&#160;asd</p>', '<p>&#160;asd</p>', NULL, 'asd', 'asd', 122, 4);

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
(1, 1, 1000000, 100000, 200000);

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
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tour_section`
--

INSERT INTO `tour_section` (`id`, `parent_id`, `name`, `name_en`) VALUES
(1, 10, 'Hành trình Đông - Tây Bắc', ' '),
(2, 10, 'Miền Bắc', ' '),
(3, 10, 'Miền Trung', ' '),
(4, 10, 'Miền Nam', ' '),
(5, 10, 'Tây Nguyên', ' '),
(6, 10, 'Xuyên Việt', ' '),
(7, 0, 'Đông Nam Á', NULL),
(8, 0, 'Đông Bắc Á', NULL),
(9, 0, 'Âu - Úc - Mỹ', NULL),
(10, 0, 'Tour nội địa', ' '),
(11, 0, 'Tour quốc tế', ' '),
(12, 0, 'Tour đặc biệt', 'Special Tour'),
(13, 0, 'Khuyến mãi đặc biệt', ' '),
(14, 0, 'Khởi hành từ Hà Nội', 'From Ha Noi'),
(15, 0, 'Ấn Độ - Nepal', 'Ấn Độ - Nepal');

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
