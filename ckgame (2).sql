-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2017 at 11:19 AM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ckgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ismenu` tinyint(4) NOT NULL,
  `title_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_menu` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `weight_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iscomment` tinyint(4) NOT NULL,
  `byauthored` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `onauthored` datetime NOT NULL,
  `ispublish` tinyint(4) NOT NULL,
  `isfrontend` tinyint(4) NOT NULL,
  `istoplist` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_content_type_id_foreign` (`content_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE IF NOT EXISTS `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Cate 1', '2015-08-31 17:00:00', '2015-08-31 17:00:00'),
(2, 'Cate 2', '2015-08-31 17:00:00', '2015-08-31 17:00:00'),
(5, 'Electronics', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_message` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_email`, `contact_message`, `contact_status`, `created_at`, `updated_at`) VALUES
(1, 'Le Manh Toan', 'gep2a76@gmail.com', 'Noi dung message ', 0, '2015-08-29 02:03:04', '2015-08-29 02:12:31'),
(3, 'Toanle', 'toanktv.it@gmail.com', 'Noi dung comment', 1, '2015-08-30 18:25:37', '2015-08-30 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE IF NOT EXISTS `content_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `game_clone`
--

CREATE TABLE IF NOT EXISTS `game_clone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_game` int(10) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_clone` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `game_clone`
--

INSERT INTO `game_clone` (`id`, `id_game`, `value`, `date_clone`, `created_at`, `updated_at`) VALUES
(1, 2, '25', '2016-12-18 02:37:16', '2016-12-18 02:37:16', '2016-12-18 02:37:16'),
(3, 6, '15', '2016-12-18 02:42:33', '2016-12-18 02:42:33', '2016-12-18 02:42:33'),
(4, 3, '60', '2016-12-31 21:07:02', '2016-12-31 21:07:02', '2016-12-31 21:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

CREATE TABLE IF NOT EXISTS `game_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_get` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_clone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`id`, `name`, `link_get`, `min_price`, `max_price`, `time_clone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'S&P 500 Futures', 'http://www.investing.com/indices/us-spx-500-futures/', '4', '98', '24', 'You can remove it from the WebKit browsers like this', '2016-12-18 00:57:04', '2016-12-20 07:43:36'),
(2, 'Nasdaq 100 Futures', 'http://www.investing.com/indices/nq-100-futures/', '5', '500', '5', 'There are some other says also that you can share data to all view like view composer', '2016-12-18 00:58:05', '2016-12-18 07:48:56'),
(3, 'Dow Jones Industrial Average (DJI)', 'http://www.investing.com/indices/us-30/', '10', '1000', '10', '', '2016-12-18 00:58:48', '2016-12-18 00:58:48'),
(4, 'CBOE Volatility Index (VIX)', 'http://www.investing.com/indices/volatility-s-p-500/', '15', '1500', '15', '', '2016-12-18 00:59:19', '2016-12-18 00:59:19'),
(5, 'DAX (GDAXI)', 'http://www.investing.com/indices/germany-30/', '20', '2000', '20', '', '2016-12-18 00:59:42', '2016-12-18 00:59:42'),
(6, 'Nikkei 225 (N225)', 'http://www.investing.com/indices/japan-ni225/', '22', '190', '22', 'You may attach a view composer to multiple views at once by passing an array of views as the first argument\r\n					', '2016-12-18 01:00:03', '2016-12-18 07:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `game_user`
--

CREATE TABLE IF NOT EXISTS `game_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_game` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_play` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `game_user`
--

INSERT INTO `game_user` (`id`, `id_game`, `id_user`, `value`, `price_set`, `date_play`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2', '6', '2016-12-25 03:04:46', '2016-12-25 03:04:46', '2016-12-25 03:04:46'),
(2, 1, 1, '15', '5', '2016-12-25 03:04:46', '2016-12-25 03:04:46', '2016-12-25 03:04:46'),
(3, 1, 1, '39', '7', '2016-12-25 03:04:46', '2016-12-25 03:04:46', '2016-12-25 03:04:46'),
(4, 4, 2, '5', '19', '2016-12-25 03:09:03', '2016-12-25 03:09:03', '2016-12-25 03:09:03'),
(5, 4, 2, '70', '87', '2016-12-25 03:09:03', '2016-12-25 03:09:03', '2016-12-25 03:09:03'),
(6, 5, 1, '2', '22', '2016-12-25 07:52:32', '2016-12-25 07:52:32', '2016-12-25 07:52:32'),
(7, 5, 1, '5', '21', '2016-12-25 07:53:32', '2016-12-25 07:53:32', '2016-12-25 07:53:32'),
(8, 6, 1, '7', '22', '2016-12-25 07:55:05', '2016-12-25 07:55:05', '2016-12-25 07:55:05'),
(9, 6, 1, '19', '25', '2016-12-25 07:55:06', '2016-12-25 07:55:06', '2016-12-25 07:55:06'),
(10, 6, 1, '31', '27', '2016-12-25 07:55:06', '2016-12-25 07:55:06', '2016-12-25 07:55:06'),
(11, 6, 1, '43', '26', '2016-12-25 07:55:06', '2016-12-25 07:55:06', '2016-12-25 07:55:06'),
(12, 6, 1, '55', '27', '2016-12-25 07:55:06', '2016-12-25 07:55:06', '2016-12-25 07:55:06'),
(13, 1, 1, '0', '9', '2016-12-26 09:06:19', '2016-12-26 09:06:19', '2016-12-26 09:06:19'),
(14, 1, 1, '12', '6', '2016-12-26 09:06:19', '2016-12-26 09:06:19', '2016-12-26 09:06:19'),
(15, 1, 28, '58', '4', '2016-12-31 21:19:40', '2016-12-31 21:19:40', '2016-12-31 21:19:40'),
(16, 1, 28, '60', '10', '2016-12-31 21:19:40', '2016-12-31 21:19:40', '2016-12-31 21:19:40'),
(17, 3, 28, '60', '10', '2016-12-31 21:23:13', '2016-12-31 21:23:13', '2016-12-31 21:23:13'),
(18, 3, 28, '3', '10', '2016-12-31 21:41:44', '2016-12-31 21:41:44', '2016-12-31 21:41:44'),
(19, 1, 28, '4', '4', '2017-01-01 08:35:52', '2017-01-01 08:35:52', '2017-01-01 08:35:52'),
(20, 1, 2, '3', '4', '2017-01-04 08:56:35', '2017-01-04 08:56:35', '2017-01-04 08:56:35'),
(21, 1, 2, '15', '5', '2017-01-04 08:56:35', '2017-01-04 08:56:35', '2017-01-04 08:56:35'),
(22, 1, 2, '16', '8', '2017-01-04 08:56:35', '2017-01-04 08:56:35', '2017-01-04 08:56:35'),
(23, 1, 2, '3', '4', '2017-01-04 08:57:04', '2017-01-04 08:57:04', '2017-01-04 08:57:04'),
(24, 1, 2, '15', '5', '2017-01-04 08:57:04', '2017-01-04 08:57:04', '2017-01-04 08:57:04'),
(25, 1, 2, '16', '8', '2017-01-04 08:57:04', '2017-01-04 08:57:04', '2017-01-04 08:57:04'),
(26, 1, 2, '3', '4', '2017-01-04 08:57:46', '2017-01-04 08:57:46', '2017-01-04 08:57:46'),
(27, 1, 2, '15', '5', '2017-01-04 08:57:46', '2017-01-04 08:57:46', '2017-01-04 08:57:46'),
(28, 1, 2, '16', '8', '2017-01-04 08:57:46', '2017-01-04 08:57:46', '2017-01-04 08:57:46'),
(29, 1, 2, '3', '4', '2017-01-04 08:58:37', '2017-01-04 08:58:37', '2017-01-04 08:58:37'),
(30, 1, 2, '15', '5', '2017-01-04 08:58:37', '2017-01-04 08:58:37', '2017-01-04 08:58:37'),
(31, 1, 2, '16', '8', '2017-01-04 08:58:37', '2017-01-04 08:58:37', '2017-01-04 08:58:37'),
(32, 1, 2, '3', '4', '2017-01-04 08:59:16', '2017-01-04 08:59:16', '2017-01-04 08:59:16'),
(33, 1, 2, '15', '5', '2017-01-04 08:59:16', '2017-01-04 08:59:16', '2017-01-04 08:59:16'),
(34, 1, 2, '16', '8', '2017-01-04 08:59:16', '2017-01-04 08:59:16', '2017-01-04 08:59:16'),
(35, 1, 2, '3', '4', '2017-01-04 08:59:43', '2017-01-04 08:59:43', '2017-01-04 08:59:43'),
(36, 1, 2, '15', '5', '2017-01-04 08:59:43', '2017-01-04 08:59:43', '2017-01-04 08:59:43'),
(37, 1, 2, '16', '8', '2017-01-04 08:59:43', '2017-01-04 08:59:43', '2017-01-04 08:59:43'),
(38, 1, 2, '3', '4', '2017-01-04 08:59:53', '2017-01-04 08:59:53', '2017-01-04 08:59:53'),
(39, 1, 2, '15', '5', '2017-01-04 08:59:53', '2017-01-04 08:59:53', '2017-01-04 08:59:53'),
(40, 1, 2, '16', '8', '2017-01-04 08:59:53', '2017-01-04 08:59:53', '2017-01-04 08:59:53'),
(41, 1, 2, '1', '5', '2017-01-04 09:01:03', '2017-01-04 09:01:03', '2017-01-04 09:01:03'),
(42, 1, 2, '12', '7', '2017-01-04 09:01:03', '2017-01-04 09:01:03', '2017-01-04 09:01:03'),
(43, 1, 2, '38', '6', '2017-01-04 09:01:03', '2017-01-04 09:01:03', '2017-01-04 09:01:03'),
(44, 1, 2, '51', '6', '2017-01-04 09:01:03', '2017-01-04 09:01:03', '2017-01-04 09:01:03'),
(45, 1, 2, '64', '13', '2017-01-04 09:01:03', '2017-01-04 09:01:03', '2017-01-04 09:01:03'),
(46, 1, 28, '3', '4', '2017-01-07 20:29:56', '2017-01-07 20:29:56', '2017-01-07 20:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `game_win`
--

CREATE TABLE IF NOT EXISTS `game_win` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_game_clone` int(10) DEFAULT NULL,
  `id_game_user` int(10) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_play` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_08_27_040920_create_products_table', 1),
('2015_08_29_080854_create_contacts_table', 1),
('2015_08_31_044918_create_users_table', 2),
('2015_08_31_080446_create_password_resets_table', 3),
('2015_08_31_100202_add_user_to_posts_table', 4),
('2015_09_01_021921_create_bears_table', 5),
('2015_09_01_022232_create_fish_table', 5),
('2015_09_01_022444_create_trees_table', 5),
('2015_09_01_022617_create_picnics_table', 5),
('2015_09_01_022739_create_bears_picnics_table', 5),
('2015_09_01_074554_create_cates_table', 6),
('2015_09_03_040713_create_posts_table', 7),
('2015_09_03_040805_create_comments_table', 7),
('2015_09_04_032924_create_content_type_table', 8),
('2015_09_04_033017_create_articles_table', 8),
('2015_09_04_033039_create_menu_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `body`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'New post', 'Post content', 'new-post', 1, '2015-09-02 21:45:58', '2015-09-02 21:45:58'),
(2, 1, 'Post Format – Video', 'Acccccc', 'post-format-video', 1, '2015-09-02 21:50:13', '2015-09-02 21:50:13'),
(3, 1, 'EPT Website', 'new acd', 'ept-website', 0, '2015-09-02 21:51:45', '2015-09-02 21:51:45'),
(4, 1, 'Electronics', 'dfdfdfd', 'electronics', 0, '2015-09-02 21:52:16', '2015-09-02 21:52:16'),
(5, 1, 'Cate abc', '1212', 'cate-abc', 1, '2015-09-02 21:53:43', '2015-09-02 21:53:43'),
(6, 2, 'bv1', '3344', 'bv1', 1, '2015-09-03 00:04:06', '2015-09-03 00:04:06'),
(7, 1, 'erer', 'erer', 'erer', 1, '2016-12-18 00:35:27', '2016-12-18 00:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_price`, `product_description`, `created_at`, `updated_at`, `cate_id`) VALUES
(1, 'Product 01', 'uploads/1440839687.jpg', '909', '<p>Product 01&nbsp;Product 01&nbsp;Product 01&nbsp;Product 01</p>\r\n', '2015-08-29 02:14:47', '2015-08-29 02:14:47', 1),
(2, '123', 'uploads/1441093340.jpg', '12', '<p>content</p>\r\n', '2015-09-01 00:42:20', '2015-09-01 00:42:20', 1),
(3, 'abc d', 'uploads/1441093373.jpg', '23', '<p>contant here</p>\r\n', '2015-09-01 00:42:53', '2015-09-01 00:42:53', 2),
(4, 'not pro', 'uploads/1441093391.jpg', '89', '<p>not pro</p>\r\n', '2015-09-01 00:43:11', '2015-09-01 00:43:11', 2),
(6, 'New abc d', 'uploads/1441095902.jpg', '898', '<p>New abc d product</p>\r\n', '2015-09-01 01:25:02', '2015-09-01 01:25:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_clone` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artice_id` int(10) unsigned NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `confirmation_code` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root@gmail.com', '$2y$10$FduwfD0PhZskC7Q3ULvUNuGMKKSbXLJjyHg3lFv9XWovePer1xu9C', 1, NULL, 'n3LcynGu18p8UXLC5aUWI5SGJfuXjlEWnzoFXo8Jgp1qcTnw66jQIga7ymaf', '2016-12-18 00:30:47', '2017-01-04 08:35:57'),
(2, 'toanlm', 'toankt22v.it@gmail.com', '$2y$10$xt6tga1Q1Bi8nVX7jee.LOU5kDNlH.PndxylWHXu3SJVobKGga7oO', 1, NULL, '9mUFva61h8T5tVjtP99w5CC8AC01Jm1AbwtTYmzFLDk732PH501wM8aAg3SJ', '2016-12-25 03:08:28', '2017-01-04 09:06:35'),
(28, 'toanlm', 'toanktv.it@gmail.com', '$2y$10$xt6tga1Q1Bi8nVX7jee.LOU5kDNlH.PndxylWHXu3SJVobKGga7oO', 1, NULL, 'wkNotyYVcdwzY8USLMUF1yBq0HD7jw7yu2crAVhUcNySYksncixheJplWa1W', '2016-12-25 03:08:28', '2017-01-07 20:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_amount`
--

CREATE TABLE IF NOT EXISTS `users_amount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `mount_before` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mount_current` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users_amount`
--

INSERT INTO `users_amount` (`id`, `id_user`, `mount_before`, `mount_current`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '50', '150.4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, '150.4', '135.4', '2016-12-26 09:06:19', '2016-12-26 09:06:19'),
(4, 28, '0', '100', '2016-12-31 21:16:16', '2016-12-31 21:16:16'),
(5, 28, '100', '86', '2016-12-31 21:19:40', '2016-12-31 21:19:40'),
(6, 28, '86', '76', '2016-12-31 21:23:13', '2016-12-31 21:23:13'),
(7, 28, '76', '66', '2016-12-31 21:41:44', '2016-12-31 21:41:44'),
(8, 29, '0', '0', '2017-01-01 07:00:01', '2017-01-01 07:00:01'),
(9, 30, '0', '0', '2017-01-01 07:05:00', '2017-01-01 07:05:00'),
(10, 31, '0', '0', '2017-01-01 07:42:10', '2017-01-01 07:42:10'),
(11, 32, '0', '0', '2017-01-01 07:44:16', '2017-01-01 07:44:16'),
(12, 33, '0', '0', '2017-01-01 07:45:42', '2017-01-01 07:45:42'),
(13, 34, '0', '0', '2017-01-01 07:48:14', '2017-01-01 07:48:14'),
(14, 28, '66', '62', '2017-01-01 08:35:52', '2017-01-01 08:35:52'),
(15, 35, '0', '0', '2017-01-04 07:41:51', '2017-01-04 07:41:51'),
(16, 36, '0', '0', '2017-01-04 07:49:04', '2017-01-04 07:49:04'),
(17, NULL, '0', '0', '2017-01-04 07:54:15', '2017-01-04 07:54:15'),
(18, NULL, '0', '0', '2017-01-04 07:59:30', '2017-01-04 07:59:30'),
(19, NULL, '0', '0', '2017-01-04 08:00:07', '2017-01-04 08:00:07'),
(20, NULL, '0', '0', '2017-01-04 08:00:22', '2017-01-04 08:00:22'),
(21, NULL, '0', '0', '2017-01-04 08:03:22', '2017-01-04 08:03:22'),
(22, NULL, '0', '0', '2017-01-04 08:07:12', '2017-01-04 08:07:12'),
(23, NULL, '0', '0', '2017-01-04 08:07:38', '2017-01-04 08:07:38'),
(24, NULL, '0', '0', '2017-01-04 08:09:03', '2017-01-04 08:09:03'),
(25, 37, '0', '0', '2017-01-04 08:12:12', '2017-01-04 08:12:12'),
(26, 38, '0', '0', '2017-01-04 08:19:40', '2017-01-04 08:19:40'),
(27, 2, '0', '100', '2017-01-04 08:36:30', '2017-01-04 08:36:30'),
(28, 2, '100', '83', '2017-01-04 08:59:58', '2017-01-04 08:59:58'),
(29, 2, '83', '46', '2017-01-04 09:01:06', '2017-01-04 09:01:06'),
(30, 28, '62', '65', '2017-01-04 09:08:45', '2017-01-04 09:08:45'),
(31, 28, '65', '68', '2017-01-04 09:09:53', '2017-01-04 09:09:53'),
(32, 28, '68', '64', '2017-01-07 20:30:02', '2017-01-07 20:30:02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_content_type_id_foreign` FOREIGN KEY (`content_type_id`) REFERENCES `content_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
