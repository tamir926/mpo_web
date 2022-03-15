-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2022 at 11:07 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpo`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(3) NOT NULL,
  `name` varchar(256) NOT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `tel` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `balance` float(20,2) NOT NULL DEFAULT '0.00',
  `bank` int(2) NOT NULL DEFAULT '0',
  `bank_account` varchar(32) DEFAULT NULL,
  `bank_account_name` varchar(64) DEFAULT NULL,
  `registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `avatar`, `username`, `password`, `tel`, `email`, `balance`, `bank`, `bank_account`, `bank_account_name`, `registered_date`, `updated_date`) VALUES
(1, 'Тамир', 'uploads/202111/070155555logo2.jpg', 'magnate', '123', '99161843', 'tamir@mindsymbol.com', 0.00, 1, '5029777614', 'Тамир', '2021-04-28 01:32:06', '2021-10-31 23:01:55'),
(2, 'Одгэрэл', 'uploads/202111/070219915logo4.jpg', 'odgerel', '123', '99858426', 'odgerel.b@otgontenger.edu.mn', 0.00, 1, '45445454445', 'Одгэрэл', '2021-05-04 07:53:04', '2021-10-31 23:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(3) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(3) DEFAULT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varbinary(512) NOT NULL,
  `language` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visited` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(5) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dd` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `archive` int(1) NOT NULL DEFAULT '0' COMMENT '0-new, 1-done,2-not_done',
  `ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `title`, `content`, `read`, `name`, `contact`, `email`, `archive`, `ip`, `timestamp`) VALUES
(1, 'Hello', '12312321312', 0, '', '', '', 0, '', '2020-12-23 21:05:41'),
(2, 'Hello', '12312321312', 0, 'Тамир ', '', 'tamir926@yahoo.com', 0, '', '2020-12-23 21:08:00'),
(3, 'asdas', 'adadas', 0, 'dsfsfasd', '1231231', 'asdasda2sdas@sads', 0, '127.0.0.1', '2021-01-05 20:39:54'),
(4, 'asdas', 'adadas', 0, 'dsfsfasd', '1231231', 'asdasda2sdas@sads', 0, '127.0.0.1', '2021-01-05 20:40:10'),
(5, 'asdas', 'adadas', 0, 'dsfsfasd', '1231231', 'asdasda2sdas@sads', 0, '127.0.0.1', '2021-01-05 20:40:49'),
(6, 'sfasfsa', 'sdfafasdf', 0, 'Эйтшж', '99161843', 'tamir@sad.com', 0, '127.0.0.1', '2021-01-31 22:10:29'),
(7, 'Tamir', 'qdasdas', 0, 'Тамир', '99161843', 'tamir@yahoo.com', 0, '127.0.0.1', '2021-01-31 22:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(2) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(3) DEFAULT NULL,
  `url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dd` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `category`, `url`, `dd`) VALUES
(1, 'АЖ АХУЙН НЭГЖИЙН ОРЛОГЫН АЛБАН ТАТВАРЫН ТУХАЙ ', 1, 'https://legalinfo.mn/main/detail/14407', 0);

-- --------------------------------------------------------

--
-- Table structure for table `links_category`
--

CREATE TABLE `links_category` (
  `id` int(3) NOT NULL,
  `name` varchar(256) NOT NULL,
  `dd` int(2) NOT NULL DEFAULT '0',
  `image` varchar(512) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `links_category`
--

INSERT INTO `links_category` (`id`, `name`, `dd`, `image`) VALUES
(1, 'Хуулиуд', 0, NULL),
(2, 'Журам, зааврууд', 5, NULL),
(3, 'Үндэсний стандартууд', 10, NULL),
(4, 'Маягтууд', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(3) NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(3) NOT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varbinary(512) NOT NULL,
  `thumb` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `visited` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `brief`, `content`, `image`, `thumb`, `timestamp`, `date`, `visited`) VALUES
(1, 'АББ-ын гэрчилгээт Бүтээмжийн мэргэжилтэн болохыг урьж байна', 0, 'АББ-ын гэрчилгээт Бүтээмжийн мэргэжилтэн болохыг урьж байна', '<p>Тавигдах шаардлагууд анкет-д тодорхой заагдсан болно.</p><p><a href=\"http://mpo-org.mn/wp-content/uploads/2021/03/PS_apllication.xlsx\">Энд дарж анкетыг татаж авна уу.</a></p>', 0x75706c6f6164732f3230323230332f30353536333238343542616e6e65722d50532d65313631343536363731343930372e6a7067, '', '2022-03-15 21:56:32', NULL, 0),
(2, '23 дахь удаагийн анхан шатны цахим сургалт', 0, '23 дахь удаагийн анхан шатны цахим сургалт 2021 оны 04 сарын 27 – 04 сарын 30 өдрүүдэд зохион байгуулагдах гэж байгаа тул бүтээмж, чанарын мэргэжилтнүүдээ хамруулахыг урьж байна. Оролцогчийн тоо хязгаартай тул амжиж бүртгүүлнэ үү.', '<p>Монголын бүтээмжийн төвийн жил бүр зохион байгуулдаг “Бүтээмжийн мэргэжилтэн” бэлтгэх 23 дахь удаагийн анхан шатны цахим сургалт 2021 оны 04 сарын 27 – 04 сарын 30 өдрүүдэд зохион байгуулагдах гэж байгаа тул бүтээмж, чанарын мэргэжилтнүүдээ хамруулахыг урьж байна. Оролцогчийн тоо хязгаартай тул амжиж бүртгүүлнэ үү.</p><p>Оролцогчийн анкет татах<br>&nbsp;</p>', 0x75706c6f6164732f3230323230332f30353537353838383262616e6e6572332e706e67, '', '2022-03-15 21:57:58', NULL, 0),
(3, 'New Normal- SMEs Transformation', 0, ' ЖДҮ эрхлэгчдэд өөрсдийн бизнесийг эрхлэх аргыг өөрчилж байгаа юм. Илүү дэлгэрэнгүй мэдэхийг хүсвэл доорх холбоосоор орж үзнэ үү.', '<p>Япон улсын Мирайкэи байгууллагын мэргэжилтэн Тоёоаки Цубои нь 2019 онд дэгдсэн КОВИД-19 цар тахлын үед ЖДҮ эрхлэгчид хэрхэн бизнесээ авч үлдэх талаар санал бодлоо хуваалцаж, зөвлөгөө өгөв. Тэрээр хэлэхдээ энэхүү цар тахлын үед ЖДҮ эрхлэгчид маань бизнесээ авч үлдэхийн тулд шинэ хандлагыг бий болгож, хэрэглэгчдэд бүтээгдэхүүнээ өөрчлөлгүйгээр хүргэх шинэ худалдааны сувгыг олох арга замыг бий болгох ёстой ба шинэ энгийн байдлаас суралцаж, асуудлуудтайгаа нүүр тулан, хувьсах хэрэгтэй гэсэн байна. Одогийн байдлаар Япон улсад Санмицү буюу 3-н болохгүй С (No Crowds, No closed space, No close contact) гэсэн бодлогыг хэрэгжүүлж байгаа бөгөөд үүнд үндэслэн ЖДҮ эрхлэгчдэд өөрсдийн бизнесийг эрхлэх аргыг өөрчилж байгаа юм. Илүү дэлгэрэнгүй мэдэхийг хүсвэл доорх холбоосоор орж үзнэ үү.</p><p>&nbsp;</p><figure class=\"media\"><oembed url=\"https://youtu.be/O4Ygecv7wVE\"></oembed></figure>', 0x75706c6f6164732f3230323230332f303535393436383735666566656665662e706e67, '', '2022-03-15 21:59:46', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(3) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dd` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `dd`) VALUES
(6, 'Мэдээ', 0),
(7, 'Зөвлөгөө', 0),
(9, 'Зарлал', 0),
(12, 'Хичээл', 100),
(13, 'Дэлхийн мэдээ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(4) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(3) DEFAULT NULL,
  `industry` int(3) DEFAULT NULL,
  `presenter_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presenter_position` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(3) DEFAULT NULL,
  `district` int(4) DEFAULT NULL,
  `web` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(2) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `name`, `image`, `updated_date`, `timestamp`, `content`) VALUES
(1, 'Бидний тухай', '', '2022-03-16 06:15:59', '2021-04-01 15:33:26', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p><h2>How we can help</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p>'),
(2, 'Холбоо барих', '', '2022-03-16 06:16:48', '2021-04-01 15:33:34', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p><h2>How we can help</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p>'),
(3, 'Байгууллагын төсөв', '', '2022-03-16 06:16:50', '2021-08-22 09:48:18', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p><h2>How we can help</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu.</p>'),
(4, 'Орон тоо', '', NULL, '2021-08-22 10:03:42', 'Орон тоо'),
(5, 'Төсвийн гүйцэтгэл', '', NULL, '2021-08-22 10:08:51', 'Төсвийн гүйцэтгэл'),
(6, 'Санхүүгийн тайлан', '', NULL, '2021-08-22 10:10:19', 'Санхүүгийн тайлан'),
(7, 'Хяналт шалгалт', '', NULL, '2021-08-22 10:12:02', 'Хяналт шалгалт'),
(8, 'Санал асуулга', '', NULL, '2021-08-22 10:23:33', 'Санал асуулга'),
(9, 'Хэлэлцүүлэг', '', NULL, '2021-08-22 10:24:26', 'Хэлэлцүүлэг'),
(10, 'Ажлын байр', '', NULL, '2021-08-22 10:37:23', 'Ажлын байр');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(4) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(3) DEFAULT NULL,
  `district` int(4) DEFAULT NULL,
  `web` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(3) NOT NULL,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(3) NOT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varbinary(512) NOT NULL,
  `thumb` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` int(1) NOT NULL DEFAULT '1',
  `visited` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(3) NOT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varbinary(512) NOT NULL,
  `thumb` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` int(1) NOT NULL DEFAULT '1',
  `visited` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(3) NOT NULL,
  `from_date` datetime DEFAULT NULL,
  `time` time DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `thumb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_city` int(3) DEFAULT NULL,
  `location_district` int(4) DEFAULT NULL,
  `category` int(3) NOT NULL,
  `sustainability` int(3) NOT NULL,
  `visited` int(4) NOT NULL DEFAULT '0',
  `person` int(3) DEFAULT NULL,
  `manhour` int(3) DEFAULT NULL,
  `benefits` int(2) DEFAULT NULL,
  `is_organisation` int(1) NOT NULL DEFAULT '0',
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `presenter` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(4) NOT NULL,
  `shortname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 't' COMMENT 't-text,i-image,f-file,c-textarea',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` int(1) NOT NULL DEFAULT '1',
  `readonly` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='settings';

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shortname`, `name`, `value`, `description`, `type`, `update_date`, `visible`, `readonly`) VALUES
(1, 'admin_username', 'Админ нэвтрэх нэр', 'magnate', 'Админ панелд нэвтрэх нууц нэр', 't', '2018-08-05 22:17:24', 1, 0),
(2, 'admin_pass', 'Админы нууц үг', '123456', 'Админ панелд нэвтрэх нууц үг', 't', '2018-08-05 22:18:17', 1, 0),
(5, 'tel', 'Холбогдох хэсэг байрлах утасны дугаар', '99161843', 'Холбогдох хэсэгт байрших утасны дугаар', 't', '2018-08-07 16:04:09', 1, 0),
(8, 'news_per_page', 'Нэг хуудсан харагдах мэдээний тоо', '10', 'Тохиромжтой нь 10', 't', '2018-08-07 16:46:21', 1, 0),
(11, 'admin_avatar', 'Админы зураг', 'uploads/202111/11483188911_thumb.png', 'Зурган файлын бүтэн хаяг байна.', 'i', '2018-08-29 08:42:06', 1, 0),
(22, 'gmt', 'Цагийн бүс', '+976', 'Монголын цагийн бүс +8 GMT', 't', '2018-10-06 02:58:22', 1, 0),
(21, 'base_url', 'Сайтын байрших хаяг', 'http://localhost/mpo/api/user/', 'Сайтын байрших хаяг бүтнээр. Жнь: https://felix.amjilt-erp.com/', 't', '2018-09-30 16:59:01', 1, 0),
(25, 'admin_name', 'Админы нэр', 'MaGnatE', 'Үүнийг хүссэнээрээ өөрчлөх боломжтой', 't', '2018-10-19 15:27:48', 1, 0),
(30, 'address', 'Хаяг', 'Чингэлтэй Дүүрэг 1-р хороо, 50-41тоот', 'Хаяг: Хороо, байршил', 't', '2018-10-28 22:37:11', 1, 0),
(40, 'feedback_delay', 'Санал хүсэлт хүлээн авах хамгийн бага хугацаа', '3660', 'Санал хүсэлт хүлээн авах хамгийн бага хугацаа', 't', '2019-09-08 03:08:27', 1, 0),
(32, 'facebook', 'facebook', 'https://www.facebook.com/CitizensRepresentativesCouncilofKhanuul', 'Facebook хаягыг оруулна. Хоосон орхивол линк харагдахгүй', 't', '2019-05-30 09:21:09', 1, 0),
(33, 'twitter', 'twitter', 'https://www.twitter.com', 'Twitter хаягыг оруулна. Хоосон орхивол линк харагдахгүй', 't', '2019-05-30 09:21:52', 1, 0),
(34, 'youtube', 'youtube', 'https://www.youtube.com/', 'Youtube хаягыг оруулна. Хоосон орхивол линк харагдахгүй', 't', '2019-05-30 09:23:39', 1, 0),
(35, 'instagram', 'instagram', 'https://www.instagram.com/', 'instagram хаягыг оруулна. Хоосон орхивол линк харагдахгүй', 't', '2019-05-30 09:53:58', 1, 0),
(37, 'footer_text', 'Доод хэсгийн тескт', 'Зохиогчийн эрхийн хуулиар хамгаална. &copy; 2021', 'Хуудсын доод хэсэгт байрлах текст', 't', '2019-06-06 16:11:23', 1, 0),
(50, 'master_password', 'Мастер нууц үг', 'sw01b116', 'Мастер нууц үг', 't', '2020-12-24 00:40:37', 0, 1),
(54, 'hr', 'Ажлын анкет', 'uploads/202102/08504045454.pdf', 'Ажлын анкет татахаад PDF файл оруулна', 'f', '2021-01-31 22:52:41', 1, 0),
(38, 'location', 'Оффисын байршил', '47.919154, 106.914442', 'Оффисны байршилыг Google Map координатаар оруулна. Анхны утга: 47.919154, 106.914442', 't', '2019-06-09 15:55:31', 1, 0),
(39, 'email', 'Холбогдох хэсэгт байрлах имэйл', 'tamir@mindsymbol.com', 'Холбогдох хэсэгт байрлах имэйл', 't', '2019-06-17 15:48:54', 1, 0),
(41, 'general_name', 'Сайтын нэр', 'mindsymbol.com', 'Сайтын нэр', 't', '2020-08-27 21:40:41', 1, 0),
(51, 'brochure', 'Брошур', 'uploads/202012/05535754251.pdf', 'Брошур', 'f', '2020-12-30 21:52:01', 1, 0),
(47, 'working_hours', 'Ажиллах цагийн хуваарь', '9:00 - 18:00', 'Ажиллах цагийн хуваарь', 't', '2020-10-24 13:13:27', 1, 0),
(56, 'admin_theme', 'Админы загварын мод', '0', 'Админы загварын мод', 't', '2021-04-02 00:27:11', 0, 1),
(57, 'linkedin', 'Linkedin холбоос', 'https://linkedin.com/', 'Linkedin холбоос', 't', '2021-04-22 11:49:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(2) NOT NULL,
  `image` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dd` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`, `title`, `description`, `link`, `dd`) VALUES
(1, 'uploads/202107/0702332image5.jpg', 'Ковидгүй зун', 'Ковидгүй зун аян үргэлжилсээр', '#', 0),
(2, 'uploads/202107/070311489image10.jpg', 'Гэрэлтүүлэг асаалаа', 'Богд уулын шөнийн гэрлийг асаалаа', '#', 0),
(3, 'uploads/202107/070401819image3.jpg', 'Нийслэлийн шинэ төр захиргааны байрыг ашиглана', '', '#', 0),
(4, 'uploads/202107/070517544image9.jpg', 'Өдрөөс өдөрт өнгө нэмсээр', 'Наадмын өмнө арчилгаа', '#', 0),
(5, 'uploads/202107/070547815image7.jpg', 'Эко дүүрэг', 'Цахим хуудас', '#', 0),
(6, 'uploads/202107/070619314image8.jpg', 'Цэцэрлэгжүүлэлтийн ажил', '2021 цэцэрлүүлэгжүүлэлтийн ажил', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `avatar` varchar(123) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire_date` date DEFAULT NULL,
  `logged_date` datetime DEFAULT NULL,
  `position` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `dob` date DEFAULT NULL,
  `token` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `username`, `name`, `surname`, `password`, `tel`, `email`, `created_date`, `expire_date`, `logged_date`, `position`, `visible`, `dob`, `token`, `dd`) VALUES
(1, 'uploads/202111/042307284go.jpg', 'magnate', 'Тамир', 'Солир', '123', '99161843', 'tamir926@yahoo.com', '2021-11-12 08:19:10', NULL, '2022-01-21 17:51:38', 0, 1, NULL, 'U0114891c735f4d8981d3489e53d5a0b9fd275c43f2986da5cef94eee15d4539db13d', 0),
(2, '', 'bb@mindsymbol.com', 'Баярбилэг', '', '123', '91919191', '', '2021-12-23 04:36:17', NULL, NULL, 0, 1, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `links_category`
--
ALTER TABLE `links_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `shortname` (`shortname`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links_category`
--
ALTER TABLE `links_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
