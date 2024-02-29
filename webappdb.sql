-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-02-29 16:32:22
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `webappdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_acc` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_PIN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_acc`, `admin_pass`, `admin_PIN`) VALUES
(4040518, 'admin', 'admin112233', '112233');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `review` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `product_id`, `rating`, `review`) VALUES
(190402966, 7797681, 2, 'Excellent', '');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_detail` text NOT NULL,
  `product_category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `product_detail`, `product_category`) VALUES
(1, 'Chicken Slice', 12.5, './IMAGE/sandwich1.png', 'With succulent slices of Chicken ham, you cannot beat this favorite. Especially as its got under 6 grams of fat.', 'food'),
(2, 'Chicken Teriyaki', 13.5, './IMAGE/sandwich2.png', 'An Asian classic, is made with tender chicken pieces dressed lightly with teriyaki sauce, served hot and topped with your choice of fresh vegetables and condiments on freshly baked bread.', 'food'),
(3, 'Italian B.M.T.', 12.5, './IMAGE/sandwich3.png', 'An old world favourite sandwich that is made up of beef salami, beef pepperoni and chicken ham. Some say B.M.T.™ stands for biggest, meatiest, tastiest.', 'food'),
(4, 'Mala Chicken', 12.5, './IMAGE/sandwich4.png', 'It is usually made with marinated chicken breast, vegetables, and a mala sauce. The sandwich can be customized to include other ingredients, such as cheese or avocado, and can be served on a variety of breads.', 'food'),
(5, 'Meatball Marinara Melt', 16.5, './IMAGE/sandwich5.png', 'The Italian meatball sandwich at Subway comes with meatballs in tangy tomato marinara sauce, fresh vegetables, and condiments on freshly baked bread.', 'food'),
(6, 'Roast Beef', 15.5, './IMAGE/sandwich6.png', 'A classic favorite, comprises of lean and tender sliced roast beef with your choice of fresh vegetables and condiments served on freshly baked bread.', 'food'),
(7, 'Roasted Chicken Breast', 13.5, './IMAGE/sandwich7.png', 'Oven Roasted Chicken Breast sandwich at Subway includes a tender chicken breast patty, fresh vegetables, condiments on freshly baked bread.', 'food'),
(8, 'Veggie Delite™', 11.5, './IMAGE/sandwich8.png', 'The Veggie Delite sandwich at Subway includes fresh lettuce, tomatoes, green peppers, onions, olives and pickles, with your choice of condiments on freshly baked bread.', 'food'),
(9, 'Coca-Cola', 5.5, './IMAGE/drink1.png', 'Coca-Cola is a carbonated soft drink made from a recipe of sugar, water, caffeine, and a proprietary blend of natural flavors.', 'drink'),
(10, 'Sprite', 5.5, './IMAGE/drink2.png', 'Sprite is a clear, lemon-lime flavored, caffeine-free soft drink created by The Coca-Cola Company. ', 'drink'),
(11, 'Heaven and Earth Passion ', 5.5, './IMAGE/drink3.png', 'Heaven and Earth Fruity Teas fuse tea with fruit flavors and other natural ingredients to deliver a fresh, contemporary expression of tea. ', 'drink'),
(12, 'Double Chocolate Chip Coo', 7.5, './IMAGE/dessert1.png', 'Double chocolate chip cookie is a type of cookie that contains chocolate chips and cocoa powder, giving it a double dose of chocolate flavor. ', 'dessert'),
(13, 'White Chip Macadamia Nut ', 6.5, './IMAGE/dessert2.png', 'White Chip Macadamia Nut Cookie is a type of cookie that contains white chocolate chips and macadamia nuts, providing a sweet and nutty flavor. ', 'dessert'),
(14, 'Heaven and Earth Passion ', 5.5, './IMAGE/dessert3.png', 'Oatmeal & Raisin Cookie is a type of cookie that contains oats, raisins, and spices.', 'dessert');

-- --------------------------------------------------------

--
-- 表的结构 `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `shipping_method` varchar(100) NOT NULL,
  `shipping_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `cart_id`, `product_id`, `quantity`, `subtotal`, `shipping_method`, `shipping_status`) VALUES
(2147483647, 7797681, 2147483647, 2, 2, 27, 'Delivery', 3);

-- --------------------------------------------------------

--
-- 表的结构 `userinformation`
--

CREATE TABLE `userinformation` (
  `Uuser_id` int(11) NOT NULL,
  `Ucart_id` int(11) NOT NULL,
  `Uemail` varchar(100) NOT NULL,
  `Uname` varchar(100) NOT NULL,
  `Uaddress` text NOT NULL,
  `Uphone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `userinformation`
--

INSERT INTO `userinformation` (`Uuser_id`, `Ucart_id`, `Uemail`, `Uname`, `Uaddress`, `Uphone`) VALUES
(7797681, 0, 'ai2103s90@siswa.uthm.edu.my', 'CHING KAI YUAN', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'a');

-- --------------------------------------------------------

--
-- 表的结构 `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_acc` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_PIN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_acc`, `user_pass`, `user_PIN`) VALUES
(7797681, 'admin', 'admin112233', '112233');

--
-- 转储表的索引
--

--
-- 表的索引 `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- 表的索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- 表的索引 `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`Uuser_id`);

--
-- 表的索引 `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4040519;

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- 使用表AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190402967;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- 使用表AUTO_INCREMENT `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `Uuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7797682;

--
-- 使用表AUTO_INCREMENT `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7797682;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
