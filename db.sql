/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : laravel_tranning

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-09-04 17:18:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
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
  KEY `articles_content_type_id_foreign` (`content_type_id`),
  CONSTRAINT `articles_content_type_id_foreign` FOREIGN KEY (`content_type_id`) REFERENCES `content_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for bears
-- ----------------------------
DROP TABLE IF EXISTS `bears`;
CREATE TABLE `bears` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `danger_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bears
-- ----------------------------
INSERT INTO `bears` VALUES ('1', 'Lawly', 'Grizzly', '8', '2015-09-01 03:15:11', '2015-09-01 03:15:11');
INSERT INTO `bears` VALUES ('2', 'Cerms', 'Black', '4', '2015-09-01 03:15:11', '2015-09-01 03:15:11');
INSERT INTO `bears` VALUES ('3', 'Adobot', 'Polar', '3', '2015-09-01 03:15:11', '2015-09-01 03:15:11');

-- ----------------------------
-- Table structure for bears_picnics
-- ----------------------------
DROP TABLE IF EXISTS `bears_picnics`;
CREATE TABLE `bears_picnics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bear_id` int(11) NOT NULL,
  `picnic_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bears_picnics
-- ----------------------------

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', 'Cate 1', '2015-09-01 00:00:00', '2015-09-01 00:00:00');
INSERT INTO `cates` VALUES ('2', 'Cate 2', '2015-09-01 00:00:00', '2015-09-01 00:00:00');
INSERT INTO `cates` VALUES ('5', 'Electronics', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `on_post` int(10) unsigned NOT NULL DEFAULT '0',
  `from_user` int(10) unsigned NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_on_post_foreign` (`on_post`),
  KEY `comments_from_user_foreign` (`from_user`),
  CONSTRAINT `comments_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_on_post_foreign` FOREIGN KEY (`on_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_message` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'Le Manh Toan', 'gep2a76@gmail.com', 'Noi dung message ', '0', '2015-08-29 09:03:04', '2015-08-29 09:12:31');
INSERT INTO `contacts` VALUES ('3', 'Toanle', 'toanktv.it@gmail.com', 'Noi dung comment', '1', '2015-08-31 01:25:37', '2015-08-31 01:25:37');

-- ----------------------------
-- Table structure for content_type
-- ----------------------------
DROP TABLE IF EXISTS `content_type`;
CREATE TABLE `content_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of content_type
-- ----------------------------

-- ----------------------------
-- Table structure for fish
-- ----------------------------
DROP TABLE IF EXISTS `fish`;
CREATE TABLE `fish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weight` int(11) NOT NULL,
  `bear_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fish
-- ----------------------------
INSERT INTO `fish` VALUES ('1', '5', '1', '2015-09-01 03:15:12', '2015-09-01 03:15:12');
INSERT INTO `fish` VALUES ('2', '12', '2', '2015-09-01 03:15:12', '2015-09-01 03:15:12');
INSERT INTO `fish` VALUES ('3', '4', '3', '2015-09-01 03:15:12', '2015-09-01 03:15:12');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2015_08_27_040920_create_products_table', '1');
INSERT INTO `migrations` VALUES ('2015_08_29_080854_create_contacts_table', '1');
INSERT INTO `migrations` VALUES ('2015_08_31_044918_create_users_table', '2');
INSERT INTO `migrations` VALUES ('2015_08_31_080446_create_password_resets_table', '3');
INSERT INTO `migrations` VALUES ('2015_08_31_100202_add_user_to_posts_table', '4');
INSERT INTO `migrations` VALUES ('2015_09_01_021921_create_bears_table', '5');
INSERT INTO `migrations` VALUES ('2015_09_01_022232_create_fish_table', '5');
INSERT INTO `migrations` VALUES ('2015_09_01_022444_create_trees_table', '5');
INSERT INTO `migrations` VALUES ('2015_09_01_022617_create_picnics_table', '5');
INSERT INTO `migrations` VALUES ('2015_09_01_022739_create_bears_picnics_table', '5');
INSERT INTO `migrations` VALUES ('2015_09_01_074554_create_cates_table', '6');
INSERT INTO `migrations` VALUES ('2015_09_03_040713_create_posts_table', '7');
INSERT INTO `migrations` VALUES ('2015_09_03_040805_create_comments_table', '7');
INSERT INTO `migrations` VALUES ('2015_09_04_032924_create_content_type_table', '8');
INSERT INTO `migrations` VALUES ('2015_09_04_033017_create_articles_table', '8');
INSERT INTO `migrations` VALUES ('2015_09_04_033039_create_menu_table', '8');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for picnics
-- ----------------------------
DROP TABLE IF EXISTS `picnics`;
CREATE TABLE `picnics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taste_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of picnics
-- ----------------------------
INSERT INTO `picnics` VALUES ('1', 'Yellowstone', '6', '2015-09-01 03:15:12', '2015-09-01 03:15:12');
INSERT INTO `picnics` VALUES ('2', 'Grand Canyon', '5', '2015-09-01 03:15:12', '2015-09-01 03:15:12');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
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
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', '1', 'New post', 'Post content', 'new-post', '1', '2015-09-03 04:45:58', '2015-09-03 04:45:58');
INSERT INTO `posts` VALUES ('2', '1', 'Post Format – Video', 'Acccccc', 'post-format-video', '1', '2015-09-03 04:50:13', '2015-09-03 04:50:13');
INSERT INTO `posts` VALUES ('3', '1', 'EPT Website', 'new acd', 'ept-website', '0', '2015-09-03 04:51:45', '2015-09-03 04:51:45');
INSERT INTO `posts` VALUES ('4', '1', 'Electronics', 'dfdfdfd', 'electronics', '0', '2015-09-03 04:52:16', '2015-09-03 04:52:16');
INSERT INTO `posts` VALUES ('5', '1', 'Cate abc', '1212', 'cate-abc', '1', '2015-09-03 04:53:43', '2015-09-03 04:53:43');
INSERT INTO `posts` VALUES ('6', '2', 'bv1', '3344', 'bv1', '1', '2015-09-03 07:04:06', '2015-09-03 07:04:06');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Product 01', 'uploads/1440839687.jpg', '909', '<p>Product 01&nbsp;Product 01&nbsp;Product 01&nbsp;Product 01</p>\r\n', '2015-08-29 09:14:47', '2015-08-29 09:14:47', '1');
INSERT INTO `products` VALUES ('2', '123', 'uploads/1441093340.jpg', '12', '<p>content</p>\r\n', '2015-09-01 07:42:20', '2015-09-01 07:42:20', '1');
INSERT INTO `products` VALUES ('3', 'abc d', 'uploads/1441093373.jpg', '23', '<p>contant here</p>\r\n', '2015-09-01 07:42:53', '2015-09-01 07:42:53', '2');
INSERT INTO `products` VALUES ('4', 'not pro', 'uploads/1441093391.jpg', '89', '<p>not pro</p>\r\n', '2015-09-01 07:43:11', '2015-09-01 07:43:11', '2');
INSERT INTO `products` VALUES ('6', 'New abc d', 'uploads/1441095902.jpg', '898', '<p>New abc d product</p>\r\n', '2015-09-01 08:25:02', '2015-09-01 08:25:02', '1');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artice_id` int(10) unsigned NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for trees
-- ----------------------------
DROP TABLE IF EXISTS `trees`;
CREATE TABLE `trees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bear_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of trees
-- ----------------------------
INSERT INTO `trees` VALUES ('1', 'Redwood', '500', '1', '2015-09-01 03:15:12', '2015-09-01 03:15:12');
INSERT INTO `trees` VALUES ('2', 'Oak', '400', '1', '2015-09-01 03:15:12', '2015-09-01 03:15:12');


-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'toan', 'manhtoan_0510@yahoo.com.vn', '$2y$10$g7c/h4Zf2RuSCJkIQWNtXOyjYwYNGHtZ8HqyLE/GE9.7M5PFqAlwu', '4K481BvnxjwiCtaePoBiLd3NnYuPjoDTDla3y1Y1e0qI5reVRnbVutPcIPnc', '2015-08-31 04:50:44', '2015-09-03 07:01:53');
INSERT INTO `users` VALUES ('2', 'ToanLM', 'toanktv.it@gmail.com', '$2y$10$g7c/h4Zf2RuSCJkIQWNtXOyjYwYNGHtZ8HqyLE/GE9.7M5PFqAlwu', 'AuMxKU7a8VHsBHShTbFaEtWBWH9LD4lWcOTk2w6Mkp6kKOrUoIYPxTH9b13c', '2015-08-31 07:43:02', '2015-09-03 03:49:10');


-- ----------------------------
-- Table structure for results
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_clone` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for game_type
-- ----------------------------
DROP TABLE IF EXISTS `game_type`;
CREATE TABLE `game_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_clone` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for game_flags
-- ----------------------------
DROP TABLE IF EXISTS `game_flags`;
CREATE TABLE `game_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(50),
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `game_type` int(10),
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2),
  `role` int(2),
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users_verified
-- ----------------------------
DROP TABLE IF EXISTS `users_verified`;
CREATE TABLE `users_verified` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

