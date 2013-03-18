-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.0.45-community-nt - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-18 21:07:58
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for finance
CREATE DATABASE IF NOT EXISTS `finance` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `finance`;


-- Dumping structure for table finance.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(70) collate utf8_unicode_ci NOT NULL,
  `parent_type` varchar(15) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `context` varchar(300) collate utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(10) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(20) collate utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL auto_increment,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ip_address` varchar(50) collate utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `city` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `context` text collate utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `ctr` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.news_image
CREATE TABLE IF NOT EXISTS `news_image` (
  `id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL,
  `uploads_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.replies
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `rep_context` varchar(300) collate utf8_unicode_ci NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL auto_increment,
  `session_id` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ip_address` varchar(50) collate utf8_unicode_ci NOT NULL,
  `user_agent` varchar(200) collate utf8_unicode_ci NOT NULL,
  `last_activity` varchar(50) collate utf8_unicode_ci NOT NULL,
  `user_data` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL auto_increment,
  `file_name` varchar(25) collate utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table finance.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(50) collate utf8_unicode_ci NOT NULL,
  `password` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
