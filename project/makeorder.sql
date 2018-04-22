-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-22 14:25:21
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
  `weight` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `weight`) VALUES
(1, '素菜类', 5),
(2, '肉类', 4),
(3, '面食类', 3),
(4, '饮品', 1);

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
  `order_remarks` varchar(200) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `create_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `user_id`, `user_name`, `user_phone`, `user_address`, `order_amount`, `order_remarks`, `order_status`, `create_time`) VALUES
(1, 1, 'lj', '133', 'ncjska', '21', 'jnjbjjVS ', '0', 1);

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
  `create_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(1, '超必杀', '11', '附件二', '1', '素菜类'),
(2, '擦出了', '13', '服务商', '', '素菜类'),
(8, 'bdfsb', '12', 'vsdzbzb', '1', '面食类');

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
(7, 'admin', '139', 'sasc', '男', '123', '管理员');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `weight` (`weight`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
