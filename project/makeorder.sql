-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-15 11:47:40
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeorder`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `weight` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `weight`) VALUES
(1, '素菜类', 6),
(2, '肉类', 4),
(3, '面食类', 3),
(4, '饮品', 2),
(7, '套餐', 3);

-- --------------------------------------------------------

--
-- 表的结构 `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(80) NOT NULL,
  `order_amount` decimal(10,0) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `user_id`, `user_name`, `user_phone`, `user_address`, `order_amount`, `order_status`, `create_time`) VALUES
(467, 34, 'tom', '123', '渭南', '11', '1', '2018-05-15 19:35:56'),
(466, 34, 'tom', '123', '渭南', '50', '0', '2018-05-15 19:35:46'),
(465, 34, 'tom', '123', '渭南', '18', '0', '2018-05-15 18:57:35'),
(468, 34, 'tom', '123', '渭南', '36', '0', '2018-05-15 19:41:43'),
(464, 34, 'tom', '123', '渭南', '36', '0', '2018-05-15 18:57:19');

-- --------------------------------------------------------

--
-- 表的结构 `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_amount` decimal(10,0) NOT NULL,
  `product_icon` varchar(200) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `order_amount`, `product_icon`, `create_time`) VALUES
(468, 9, '发VS', '21', 1, '36', '../upload/pro_image/IMG_4906.JPG', '2018-05-15 19:41:43'),
(468, 10, '的瓦房v', '4', 1, '36', '../upload/pro_image/icon_isnull.png', '2018-05-15 19:41:43'),
(468, 1, '超必杀', '11', 1, '36', '../upload/pro_image/menu1-1.png', '2018-05-15 19:41:43'),
(467, 1, '超必杀', '11', 1, '11', '../upload/pro_image/menu1-1.png', '2018-05-15 19:35:56'),
(466, 9, '发VS', '21', 1, '50', '../upload/pro_image/IMG_4906.JPG', '2018-05-15 19:35:46'),
(466, 10, '的瓦房v', '8', 2, '50', '../upload/pro_image/icon_isnull.png', '2018-05-15 19:35:46'),
(466, 11, '考虑装修风格人', '10', 1, '50', '../upload/pro_image/20180204014306_21304.gif', '2018-05-15 19:35:46'),
(466, 1, '超必杀', '11', 1, '50', '../upload/pro_image/menu1-1.png', '2018-05-15 19:35:46'),
(465, 10, '的瓦房v', '8', 2, '18', '../upload/pro_image/icon_isnull.png', '2018-05-15 18:57:35'),
(465, 11, '考虑装修风格人', '10', 1, '18', '../upload/pro_image/20180204014306_21304.gif', '2018-05-15 18:57:35'),
(464, 8, 'bdfsb', '12', 1, '36', '../upload/pro_image/iuo5676.jpg', '2018-05-15 18:57:19'),
(464, 2, '擦出了', '13', 1, '36', '../upload/pro_image/8.jpg', '2018-05-15 18:57:19'),
(464, 1, '超必杀', '11', 1, '36', '../upload/pro_image/menu1-1.png', '2018-05-15 18:57:19');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `icon`, `category_name`) VALUES
(1, '超必杀', '11', '附件二', '../upload/pro_image/menu1-1.png', '素菜类'),
(2, '擦出了', '13', '服务商', '../upload/pro_image/8.jpg', '素菜类'),
(8, 'bdfsb', '12', 'vsdzbzb', '../upload/pro_image/iuo5676.jpg', '面食类'),
(9, '发VS', '21', 'VS的VS的v不打算', '../upload/pro_image/IMG_4906.JPG', '肉类'),
(10, '的瓦房v', '4', 'vds从v在', '../upload/pro_image/icon_isnull.png', '饮品'),
(11, '考虑装修风格人', '10', 'vdccC', '../upload/pro_image/20180204014306_21304.gif', '素菜类'),
(12, 'vjfldbj', '18', 'vjskhwefjq;', '../upload/pro_image/1.jpg', '肉类'),
(13, '靠米娜進', '8', 'v點半上班公司', '../upload/pro_image/IMG_4906.JPG', '面食类');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `sex` varchar(3) DEFAULT NULL,
  `passwd` varchar(20) NOT NULL,
  `user_grant` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `address`, `sex`, `passwd`, `user_grant`) VALUES
(1, 'April', '133', '西安', '女', '123', '用户'),
(7, 'admin', '139', '西安', '男', '123', '管理员'),
(39, 'amy', '153', '西安', '女', '123', '用户'),
(34, 'tom', '123', '渭南', '男', '123', '用户');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;
--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
