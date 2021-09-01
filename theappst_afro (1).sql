-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2021 at 09:33 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theappst_afro`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

CREATE TABLE `access_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_levels`
--

INSERT INTO `access_levels` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Testing', '{\"customer\":\"read,write\",\"designer\":\"read,write\",\"model\":\"read,write\"}', '2021-03-12 14:24:17', '2021-03-25 00:03:43'),
(3, 'bvnvb', '{\"customer\":\"read,write\",\"designer\":\"read\"}', '2021-03-13 18:23:53', '2021-03-13 22:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `affiliateads`
--

CREATE TABLE `affiliateads` (
  `affiliateads_id` int(11) NOT NULL,
  `affiliateads_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `affiliateads_metadata` longtext CHARACTER SET utf8 DEFAULT NULL,
  `affiliateads_status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `affiliateads_ipaddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `affiliateads_created_by` int(11) DEFAULT NULL,
  `affiliateads_updated_by` int(11) DEFAULT NULL,
  `affiliateads_created` datetime DEFAULT NULL,
  `affiliateads_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_action`
--

CREATE TABLE `affiliate_action` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text CHARACTER SET utf8 DEFAULT NULL,
  `country_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `commission` double(22,0) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('draft','publish','unpublish') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `name`, `image`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'New Begining', 'k3TngPJ8OAWZxaypcE2ueMH5Ltw01V6z.jpg', '<p><strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span xss=removed><br></span><br></p>', 'new-begining-1', 'publish', '2021-03-16 08:44:09', '2021-03-16 08:44:09'),
(2, 2, 'Bold new faces', '5jn36xtZQVKNgCYFkDm0qzpyivO982aB.jpg', '<p><span xss=removed>Lorem Ipsum</span><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 'bold-new-faces-2', 'publish', '2021-03-16 08:45:29', '2021-03-16 08:45:29'),
(3, 1, 'Changing narratives through arts', 'cV7Awn0zFO12dBLPxeNYtubv9H5CJUQK.jpg', '<p><span xss=removed>Lorem Ipsum</span><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 'changing-narratives-through-arts-3', 'publish', '2021-03-16 08:46:19', '2021-03-16 08:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'E-Magazine', 'e-magazine-1', '2021-03-13 21:51:12', '2021-03-13 21:51:12'),
(2, 'Fashion News', 'fashion-news-2', '2021-03-13 22:02:46', '2021-03-13 22:02:46'),
(3, 'Fashion Dictionary', 'fashion-dictionary-3', '2021-03-13 22:04:02', '2021-03-13 22:04:02'),
(6, 'E-maginine', 'e-maginine-6', '2021-03-24 23:56:26', '2021-03-24 23:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) DEFAULT NULL,
  `b_type` varchar(50) DEFAULT NULL,
  `b_identification` varchar(255) DEFAULT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `b_status` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `coupon_discount` double DEFAULT 0,
  `date_added` datetime DEFAULT NULL,
  `product_variation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `session_id`, `product_id`, `refer_id`, `quantity`, `total`, `coupon_code`, `coupon_name`, `coupon_discount`, `date_added`, `product_variation`) VALUES
(1, 7, '8f7751185a4de71ebe2014326904125e4ba7ab18', 1, 1, 1, 200, '', '', 0, '2020-02-26 20:11:05', ''),
(2, 95, '37a16e99c89f29bac54d63aba2a883d61bcd7197', 2, 1, 1, 10000, '', '', 0, '2020-03-05 06:56:42', ''),
(5, 8, 'eef4ea684d3d98a30dbef593634d4d521a37f545', 2, 1, 1, 10000, '', '', 0, '2020-03-15 16:40:55', ''),
(6, 0, 'b5e7d3396dcd524b7ef25db6a8394e23b570a033', 4, 1, 1, 1, '', '', 0, '2020-03-16 07:01:45', ''),
(7, 0, 'a89eaddc5357dba405577b79247a0deaac302117', 2, 1, 1, 10000, '', '', 0, '2020-04-02 16:43:12', ''),
(9, 12, '7f450bc5dbaa6f01a0d8570b79640b5a1748eb02', 4, 1, 1, 1, '', '', 0, '2020-05-07 11:15:37', ''),
(12, 12, 'f511fa3e18b191e3c820d936343de1d3bdf98975', 4, 1, 501, 501, '', '', 0, '2020-05-08 20:14:24', ''),
(13, 12, '0e1144c7ecb165abf090c06f2274dd63dbfa8ce1', 2, 1, 1, 10000, '', '', 0, '2020-05-18 16:26:52', ''),
(14, 0, '7e3a5b38b24b3af26540109cfbdc8a85a1f4f02c', 4, 1, 1, 1, '', '', 0, '2020-05-24 16:01:14', ''),
(15, 0, '4ab353e900ff53973bf970c622443373355044a1', 3, 1, 1, 3500, '', '', 0, '2020-06-09 19:06:25', ''),
(16, 0, 'd0b79a45ff83a4876086cfddb4829443cb47e3af', 4, 1, 1, 1, '', '', 0, '2020-08-14 12:44:08', ''),
(17, 0, '7a561bb882d9c47beb084d5dbe3fecb8d91115d4', 4, 1, 1, 1, '', '', 0, '2020-08-16 12:42:19', ''),
(18, 0, 'e92cf1d9ffb1fdd0be6597578fa24e6d299a97c9', 4, 1, 2, 220, '', '', 0, '2020-08-16 14:19:07', ''),
(19, 0, 'p4k8t961o6cp5p8663avo0b9f1ri7ahb', 4, 1, 1000, 1100, '', '', 0, '2020-08-16 16:16:19', ''),
(20, 0, 'o56qi627g8k96f7e0jbk5p8ltsi6si6l', 4, 1, 1000, 1100, '', '', 0, '2020-08-17 12:51:15', ''),
(21, 0, 'atjtet9cn0m5d3bhq4qub61cdjh81rso', 4, 1, 1000, 1100, '', '', 0, '2020-08-17 12:57:33', ''),
(22, 0, '7vra0teee447itntk4pb64dopq7uc00c', 4, 1, 1, 1.1, '', '', 0, '2020-08-19 13:02:08', ''),
(23, 15, 'dgaj7a20i6do1m0b2f84c73vn9tq5v84', 4, 1, 1, 1.1, '', '', 0, '2020-08-19 23:16:08', ''),
(25, 15, '05c21b6d75d69f74090ab97cd95fbca68880dace', 4, 1, 1, 1.1, '', '', 0, '2020-08-20 07:03:29', ''),
(26, 12, '10bd2a17c687e4cb299b1302b9958bde6d5fb0db', 4, 1, 1, 1.1, '', '', 0, '2020-08-20 17:42:11', ''),
(28, 12, 'bf1461485b38ad2185284e7e2b3d0a147b9334ce', 4, 1, 1, 1.1, '', '', 0, '2020-08-21 03:40:55', ''),
(29, 12, 'e477985ffaf28f3167b4b5f36f5c0c7397ba994f', 4, 1, 1, 1.1, '', '', 0, '2020-08-21 04:30:27', ''),
(39, 0, '8e6f5ad7be9b1a8cd352ff58736a8cbc7cb2edfc', 4, 5, 2, 2.2, '', '', 0, '2020-08-22 08:49:37', ''),
(40, 0, '7141c13ecc87d3fad569f9c3d71aafa923fd8901', 4, 1, 500, 550, '', '', 0, '2020-08-28 06:20:54', ''),
(41, 30, 'ff90942e489b5ba0a5b98ae755ecb0e960ecd6a1', 4, 1, 1000, 1100, '', '', 0, '2020-08-28 12:15:04', ''),
(45, 0, '8ea43d1a89604976c6d32a8b55363b4f5e421a9d', 4, 1, 1, 1, '', '', 0, '2020-09-03 06:51:22', ''),
(46, 12, 'e761847ee2add2d321da9e67d49028e6e2d45198', 4, 1, 130, 130, '', '', 0, '2020-09-08 15:07:56', ''),
(47, 0, '631b9a2cb31d3195507e2f78b4e72fa9bd9b7274', 4, 1, 20, 20, '', '', 0, '2020-09-09 23:17:21', ''),
(49, 15, 'eeccf4f5c19a749d18684877dc01229d21c3033d', 4, 5, 13000, 13000, '', '', 0, '2020-09-10 12:26:13', ''),
(52, 32, '29aa55b7cd3700efd30896b4a0f14dc452245434', 4, 5, 687, 687, '', '', 0, '2020-09-10 18:41:22', ''),
(53, 29, 'ac0190c2741f67d16f49eeb1e4ac6161fb3b43a8', 4, 5, 2000, 2000, '', '', 0, '2020-09-26 10:21:41', ''),
(54, 12, '164e7660e77eccf8517007e901b34181cc229bd7', 4, 3, 3000, 3000, '', '', 0, '2020-09-28 21:37:15', ''),
(56, 0, 'f5e4ace257ac6310cb8b8a0d4d4a481d4a5f44f7', 3, 1, 1, 3500, '', '', 0, '2020-09-29 06:39:49', ''),
(57, 12, 'c11c9d5fe3bcb08106722c135eb6374a8d79f169', 4, 1, 3000, 3000, '', '', 0, '2020-09-29 10:19:01', ''),
(59, 33, '4c116cc2d0316190ada496993e1316874f5b507e', 4, 1, 3000, 3000, '', '', 0, '2020-10-01 11:51:53', ''),
(60, 33, '6e9c1118edbcdd3d60ed287dceca383cb777814e', 4, 1, 3000, 3000, '', '', 0, '2020-10-01 11:53:17', ''),
(63, 34, '00756cc4f64d911f4733659bb7471458fb2f0f9e', 4, 1, 1000, 1000, '', '', 0, '2020-10-02 13:33:25', ''),
(64, 36, '956eea400fe50d2356f467442ec32109d87dd8c1', 3, 11, 2, 7000, '', '', 0, '2020-11-01 11:27:30', ''),
(65, 0, '22be70d4465cde8e7151e3fd6295c532dc8862b3', 6, 1, 1, 3500, '', '', 0, '2020-11-09 06:30:13', ''),
(66, 0, 'c6120fae83f4618f6711c5164acace040104054a', 6, 1, 1, 3500, '', '', 0, '2020-11-10 06:44:43', ''),
(67, 0, '174c172865702d6a9d95d38dd62cce7fadbd2331', 6, 1, 1, 3500, '', '', 0, '2020-11-10 06:44:55', ''),
(68, 0, '63a88b110f8448b8fd2f4639c0b7380ac623cf95', 3, 3, 1, 3500, '', '', 0, '2020-11-17 23:59:49', ''),
(69, 0, '63a88b110f8448b8fd2f4639c0b7380ac623cf95', 2, 3, 1, 10000, '', '', 0, '2020-11-18 00:00:20', ''),
(70, 12, 'e28627455c6a7e027873ea67bd6790d38017c255', 4, 1, 5000, 5000, '', '', 0, '2020-11-23 02:19:06', ''),
(71, 0, '1eabd2063b775e5049e456a5f001fbb54d1982c0', 6, 1, 1, 3500, '', '', 0, '2020-11-23 18:11:50', ''),
(73, 0, 'a039a7409c0e9fb93b4e8687bc9a2049bcccbb37', 3, 1, 1, 3500, '', '', 0, '2021-01-28 16:56:21', 'null'),
(74, 0, 'd2d9c5d720076d635fefbd70d7b1cc000b15f1ee', 7, 43, 1, 30000, '', '', 0, '2021-01-31 16:34:55', 'null'),
(75, 0, '13355a7ec3c717e26d2eff03fb58e8b718630af1', 7, 43, 1, 30000, '', '', 0, '2021-01-31 16:38:47', 'null'),
(76, 0, '43f4d22742a5afe1d17d1afac3cf3f85fee57da5', 2, 37, 1, 10000, '', '', 0, '2021-02-01 13:35:17', 'null'),
(77, 12, '0dec9d342810ed313e2ba30a53f2aeb3fd06dc7c', 4, 1, 52, 52, '', '', 0, '2021-02-08 00:13:38', 'null'),
(79, 0, '592bb7aa017a501aa2b03b2d72138ca305c09ca8', 8, 1, 5, 22500, '', '', 0, '2021-08-11 12:26:18', 'null'),
(80, 0, '89c1f73c041a5ca0b3969053859f7241aa907510', 2, 1, 5, 50000, '', '', 0, '2021-08-11 12:54:04', 'null'),
(81, 0, '10491616a709749d802e3a2fb171836d51b76f9d', 2, 1, 6, 60000, '', '', 0, '2021-08-12 05:58:32', 'null'),
(82, 0, '33f1d62195f4861e17ac05a4e2c6704adf357ae5', 2, 1, 1, 10000, '', '', 0, '2021-08-12 07:39:30', 'null'),
(84, 0, 'cbaf7a9bc8ab8ca6139bc113be8e0d57b3a6f528', 3, 1, 1, 3500, '', '', 0, '2021-08-12 09:03:59', 'null'),
(85, 0, 'cbaf7a9bc8ab8ca6139bc113be8e0d57b3a6f528', 8, 1, 1, 4500, '', '', 0, '2021-08-12 09:09:50', 'null'),
(86, 0, '6915fceae9e28faf4f6718bd2babcc31020acad7', 8, 1, 3, 13500, '', '', 0, '2021-08-12 09:14:15', 'null'),
(87, 0, 'aea0304624e7be9aecf914802ae0cd663a81886f', 8, 1, 4, 18000, '', '', 0, '2021-08-12 11:25:11', 'null'),
(91, 0, '731b5c62602504c855077890d54736296d586910', 8, 1, 2, 9000, '', '', 0, '2021-08-13 08:14:49', 'null'),
(92, 93, '9547f68dedf09f6341d83e26a32d520a78f17794', 8, 1, 3, 13500, '', '', 0, '2021-08-13 08:16:18', 'null'),
(93, 93, '9547f68dedf09f6341d83e26a32d520a78f17794', 4, 1, 4, 4, '', '', 0, '2021-08-13 08:16:52', 'null'),
(94, 93, '1559d5da05e0f4f8b1e231f66ee2dbb38bfcd725', 8, 1, 1, 4500, '', '', 0, '2021-08-13 08:29:45', 'null'),
(96, 93, '1e549618df085676f4300f7fd568f935934d39e0', 2, 1, 2, 20000, '', '', 0, '2021-08-13 08:33:12', 'null'),
(98, 93, 'baa455999154bdf25dbf07e87c8a9b9a7c02bd85', 3, 1, 1, 3500, '', '', 0, '2021-08-13 10:23:05', 'null'),
(99, 93, '096e8b0c7226da1f16b074adb6be2eb2d93ba538', 8, 1, 1, 4500, '', '', 0, '2021-08-13 12:19:12', 'null'),
(101, 0, 'f707e770d7fc79e18360cd708dd589dc73d05051', 8, 1, 3, 13500, '', '', 0, '2021-08-23 12:45:16', 'null'),
(102, 99, '3b85f2933ea96ff15ff4bedae5bb9aac2bba48a6', 8, 1, 1, 4500, '', '', 0, '2021-08-30 06:30:43', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_image` varchar(255) NOT NULL,
  `category_icon` varchar(255) DEFAULT NULL,
  `color` varchar(50) NOT NULL DEFAULT '''#000000''',
  `tag` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `image`, `background_image`, `category_icon`, `color`, `tag`, `slug`, `created_at`) VALUES
(1, 0, 'Accessories', '', 'Zwaoxq6fi4Hm50IceBWOtU8YvEPnyR79.png', '', NULL, '\'#000000\'', 0, 'accessories-1', '2021-03-15 05:25:06'),
(2, 0, 'Bags', '', 'BsenNTaJvwEK2ryzADSlqUg51ifRHoXd.png', '', NULL, '\'#000000\'', 0, 'bags-2', '2021-03-15 05:35:57'),
(3, 0, 'Bespoke Men', '', 'IeijxLYVMncK7WkEZUvpQJBsgzTRP86w.png', '', NULL, '\'#000000\'', 0, 'bespoke-men-3', '2021-03-15 05:41:05'),
(4, 0, 'Bespoke Women', '', 'yUNaZnE5I34RWf069FT8Jgu7jbVBXGil.png', '', NULL, '\'#000000\'', 0, 'bespoke-women-4', '2021-03-15 05:44:17'),
(5, 0, 'Ready To Wear (Male)', '', 'EwpP6gu25dLjkZnW9vJNhTrV0DzGtlq4.png', '', NULL, '\'#000000\'', 0, 'ready-to-wear-male-5', '2021-03-15 05:48:30'),
(6, 0, 'Ready To Wear (Female)', '', 'bTCNBj4ZRhp95safVMlunUHmWiwJtF7q.png', '', NULL, '\'#000000\'', 0, 'ready-to-wear-female-6', '2021-03-15 05:48:48'),
(7, 0, 'Ready To Wear (Kids)', '', '8CbWR46XshEVlDigFcZOB2a9q1ntzfGK.png', '', NULL, '\'#000000\'', 0, 'ready-to-wear-kids-7', '2021-03-15 05:50:04'),
(8, 0, 'Shoes', '', 'U2R9BPvX4VswfCFTbz8diO1nAZEY6L5S.png', '', NULL, '\'#000000\'', 0, 'shoes-8', '2021-03-15 05:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clicks_views`
--

CREATE TABLE `clicks_views` (
  `clicks_views_id` int(11) NOT NULL,
  `clicks_views_refuser_id` int(11) DEFAULT NULL,
  `clicks_views_action_id` int(11) DEFAULT NULL,
  `clicks_views_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_status` int(11) DEFAULT NULL,
  `clicks_views_click` int(11) DEFAULT NULL,
  `clicks_views_view` int(11) NOT NULL,
  `clicks_views_sale` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_referrer` text CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_user_agent` text CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_os` text CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_browser` text CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_isp` text CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_ipaddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_created_by` int(11) DEFAULT NULL,
  `clicks_views_updated_by` int(11) DEFAULT NULL,
  `clicks_views_created` datetime DEFAULT NULL,
  `clicks_views_updated` datetime DEFAULT NULL,
  `clicks_views_click_commission` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_sale_commission` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_data_commission` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `clicks_views_view_commission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `phonecode` int(11) NOT NULL,
  `lat` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `lng` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`, `lat`, `lng`) VALUES
(1, 'AF', 'Afghanistan', 93, '33.93911', '67.709953'),
(2, 'AL', 'Albania', 355, '41.153332', '20.168331'),
(3, 'DZ', 'Algeria', 213, '28.033886', '1.659626'),
(4, 'AS', 'American Samoa', 1684, '-14.270972', '-170.132217'),
(5, 'AD', 'Andorra', 376, '42.546245', '1.601554'),
(6, 'AO', 'Angola', 244, '-11.202692', '17.873887'),
(7, 'AI', 'Anguilla', 1264, '18.220554', '-63.068615'),
(8, 'AQ', 'Antarctica', 0, '-75.250973', '-0.071389'),
(9, 'AG', 'Antigua And Barbuda', 1268, '17.060816', '-61.796428'),
(10, 'AR', 'Argentina', 54, '-38.416097', '-63.616672'),
(11, 'AM', 'Armenia', 374, '40.069099', '45.038189'),
(12, 'AW', 'Aruba', 297, '12.52111', '-69.968338'),
(13, 'AU', 'Australia', 61, '-25.274398', '133.775136'),
(14, 'AT', 'Austria', 43, '47.516231', '14.550072'),
(15, 'AZ', 'Azerbaijan', 994, '40.143105', '47.576927'),
(16, 'BS', 'Bahamas The', 1242, '25.03428', '-77.39628'),
(17, 'BH', 'Bahrain', 973, '25.930414', '50.637772'),
(18, 'BD', 'Bangladesh', 880, '23.684994', '90.356331'),
(19, 'BB', 'Barbados', 1246, '13.193887', '-59.543198'),
(20, 'BY', 'Belarus', 375, '53.709807', '27.953389'),
(21, 'BE', 'Belgium', 32, '50.503887', '4.469936'),
(22, 'BZ', 'Belize', 501, '17.189877', '-88.49765'),
(23, 'BJ', 'Benin', 229, '9.30769', '2.315834'),
(24, 'BM', 'Bermuda', 1441, '32.321384', '-64.75737'),
(25, 'BT', 'Bhutan', 975, '27.514162', '90.433601'),
(26, 'BO', 'Bolivia', 591, '-16.290154', '-63.588653'),
(27, 'BA', 'Bosnia and Herzegovina', 387, '43.915886', '17.679076'),
(28, 'BW', 'Botswana', 267, '-22.328474', '24.684866'),
(29, 'BV', 'Bouvet Island', 0, '-54.423199', '3.413194'),
(30, 'BR', 'Brazil', 55, '-14.235004', '-51.92528'),
(31, 'IO', 'British Indian Ocean Territory', 246, '-6.343194', '71.876519'),
(32, 'BN', 'Brunei', 673, '4.535277', '114.727669'),
(33, 'BG', 'Bulgaria', 359, '42.733883', '25.48583'),
(34, 'BF', 'Burkina Faso', 226, '12.238333', '-1.561593'),
(35, 'BI', 'Burundi', 257, '-3.373056', '29.918886'),
(36, 'KH', 'Cambodia', 855, '12.565679', '104.990963'),
(37, 'CM', 'Cameroon', 237, '7.369722', '12.354722'),
(38, 'CA', 'Canada', 1, '56.130366', '-106.346771'),
(39, 'CV', 'Cape Verde', 238, '16.002082', '-24.013197'),
(40, 'KY', 'Cayman Islands', 1345, '19.513469', '-80.566956'),
(41, 'CF', 'Central African Republic', 236, '6.611111', '20.939444'),
(42, 'TD', 'Chad', 235, '15.454166', '18.732207'),
(43, 'CL', 'Chile', 56, '-35.675147', '-71.542969'),
(44, 'CN', 'China', 86, '35.86166', '104.195397'),
(45, 'CX', 'Christmas Island', 61, '-10.447525', '105.690449'),
(46, 'CC', 'Cocos (Keeling) Islands', 672, '-12.164165', '96.870956'),
(47, 'CO', 'Colombia', 57, '4.570868', '-74.297333'),
(48, 'KM', 'Comoros', 269, '-11.875001', '43.872219'),
(49, 'CG', 'Republic Of The Congo', 242, '-0.228021', '15.827659'),
(50, 'CD', 'Democratic Republic Of The Congo', 242, '-4.038333', '21.758664'),
(51, 'CK', 'Cook Islands', 682, '-21.236736', '-159.777671'),
(52, 'CR', 'Costa Rica', 506, '9.748917', '-83.753428'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225, '7.539989', '-5.54708'),
(54, 'HR', 'Croatia (Hrvatska)', 385, '45.1', '15.2'),
(55, 'CU', 'Cuba', 53, '21.521757', '-77.781167'),
(56, 'CY', 'Cyprus', 357, '35.126413', '33.429859'),
(57, 'CZ', 'Czech Republic', 420, '49.817492', '15.472962'),
(58, 'DK', 'Denmark', 45, '56.26392', '9.501785'),
(59, 'DJ', 'Djibouti', 253, '11.825138', '42.590275'),
(60, 'DM', 'Dominica', 1767, '15.414999', '-61.370976'),
(61, 'DO', 'Dominican Republic', 1809, '18.735693', '-70.162651'),
(62, 'TP', 'East Timor', 670, '', ''),
(63, 'EC', 'Ecuador', 593, '-1.831239', '-78.183406'),
(64, 'EG', 'Egypt', 20, '26.820553', '30.802498'),
(65, 'SV', 'El Salvador', 503, '13.794185', '-88.89653'),
(66, 'GQ', 'Equatorial Guinea', 240, '1.650801', '10.267895'),
(67, 'ER', 'Eritrea', 291, '15.179384', '39.782334'),
(68, 'EE', 'Estonia', 372, '58.595272', '25.013607'),
(69, 'ET', 'Ethiopia', 251, '9.145', '40.489673'),
(70, 'XA', 'External Territories of Australia', 61, '', ''),
(71, 'FK', 'Falkland Islands', 500, '-51.796253', '-59.523613'),
(72, 'FO', 'Faroe Islands', 298, '61.892635', '-6.911806'),
(73, 'FJ', 'Fiji Islands', 679, '-16.578193', '179.414413'),
(74, 'FI', 'Finland', 358, '61.92411', '25.748151'),
(75, 'FR', 'France', 33, '46.227638', '2.213749'),
(76, 'GF', 'French Guiana', 594, '3.933889', '-53.125782'),
(77, 'PF', 'French Polynesia', 689, '-17.679742', '-149.406843'),
(78, 'TF', 'French Southern Territories', 0, '-49.280366', '69.348557'),
(79, 'GA', 'Gabon', 241, '-0.803689', '11.609444'),
(80, 'GM', 'Gambia The', 220, '13.443182', '-15.310139'),
(81, 'GE', 'Georgia', 995, '42.315407', '43.356892'),
(82, 'DE', 'Germany', 49, '51.165691', '10.451526'),
(83, 'GH', 'Ghana', 233, '7.946527', '-1.023194'),
(84, 'GI', 'Gibraltar', 350, '36.137741', '-5.345374'),
(85, 'GR', 'Greece', 30, '39.074208', '21.824312'),
(86, 'GL', 'Greenland', 299, '71.706936', '-42.604303'),
(87, 'GD', 'Grenada', 1473, '12.262776', '-61.604171'),
(88, 'GP', 'Guadeloupe', 590, '16.995971', '-62.067641'),
(89, 'GU', 'Guam', 1671, '13.444304', '144.793731'),
(90, 'GT', 'Guatemala', 502, '15.783471', '-90.230759'),
(91, 'XU', 'Guernsey and Alderney', 44, '', ''),
(92, 'GN', 'Guinea', 224, '9.945587', '-9.696645'),
(93, 'GW', 'Guinea-Bissau', 245, '11.803749', '-15.180413'),
(94, 'GY', 'Guyana', 592, '4.860416', '-58.93018'),
(95, 'HT', 'Haiti', 509, '18.971187', '-72.285215'),
(96, 'HM', 'Heard and McDonald Islands', 0, '-53.08181', '73.504158'),
(97, 'HN', 'Honduras', 504, '15.199999', '-86.241905'),
(98, 'HK', 'Hong Kong S.A.R.', 852, '22.396428', '114.109497'),
(99, 'HU', 'Hungary', 36, '47.162494', '19.503304'),
(100, 'IS', 'Iceland', 354, '64.963051', '-19.020835'),
(101, 'IN', 'India', 91, '20.593684', '78.96288'),
(102, 'ID', 'Indonesia', 62, '-0.789275', '113.921327'),
(103, 'IR', 'Iran', 98, '32.427908', '53.688046'),
(104, 'IQ', 'Iraq', 964, '33.223191', '43.679291'),
(105, 'IE', 'Ireland', 353, '53.41291', '-8.24389'),
(106, 'IL', 'Israel', 972, '31.046051', '34.851612'),
(107, 'IT', 'Italy', 39, '41.87194', '12.56738'),
(108, 'JM', 'Jamaica', 1876, '18.109581', '-77.297508'),
(109, 'JP', 'Japan', 81, '36.204824', '138.252924'),
(110, 'XJ', 'Jersey', 44, '', ''),
(111, 'JO', 'Jordan', 962, '30.585164', '36.238414'),
(112, 'KZ', 'Kazakhstan', 7, '48.019573', '66.923684'),
(113, 'KE', 'Kenya', 254, '-0.023559', '37.906193'),
(114, 'KI', 'Kiribati', 686, '-3.370417', '-168.734039'),
(115, 'KP', 'Korea North', 850, '40.339852', '127.510093'),
(116, 'KR', 'Korea South', 82, '35.907757', '127.766922'),
(117, 'KW', 'Kuwait', 965, '29.31166', '47.481766'),
(118, 'KG', 'Kyrgyzstan', 996, '41.20438', '74.766098'),
(119, 'LA', 'Laos', 856, '19.85627', '102.495496'),
(120, 'LV', 'Latvia', 371, '56.879635', '24.603189'),
(121, 'LB', 'Lebanon', 961, '33.854721', '35.862285'),
(122, 'LS', 'Lesotho', 266, '-29.609988', '28.233608'),
(123, 'LR', 'Liberia', 231, '6.428055', '-9.429499'),
(124, 'LY', 'Libya', 218, '26.3351', '17.228331'),
(125, 'LI', 'Liechtenstein', 423, '47.166', '9.555373'),
(126, 'LT', 'Lithuania', 370, '55.169438', '23.881275'),
(127, 'LU', 'Luxembourg', 352, '49.815273', '6.129583'),
(128, 'MO', 'Macau S.A.R.', 853, '22.198745', '113.543873'),
(129, 'MK', 'Macedonia', 389, '41.608635', '21.745275'),
(130, 'MG', 'Madagascar', 261, '-18.766947', '46.869107'),
(131, 'MW', 'Malawi', 265, '-13.254308', '34.301525'),
(132, 'MY', 'Malaysia', 60, '4.210484', '101.975766'),
(133, 'MV', 'Maldives', 960, '3.202778', '73.22068'),
(134, 'ML', 'Mali', 223, '17.570692', '-3.996166'),
(135, 'MT', 'Malta', 356, '35.937496', '14.375416'),
(136, 'XM', 'Man (Isle of)', 44, '', ''),
(137, 'MH', 'Marshall Islands', 692, '7.131474', '171.184478'),
(138, 'MQ', 'Martinique', 596, '14.641528', '-61.024174'),
(139, 'MR', 'Mauritania', 222, '21.00789', '-10.940835'),
(140, 'MU', 'Mauritius', 230, '-20.348404', '57.552152'),
(141, 'YT', 'Mayotte', 269, '-12.8275', '45.166244'),
(142, 'MX', 'Mexico', 52, '23.634501', '-102.552784'),
(143, 'FM', 'Micronesia', 691, '7.425554', '150.550812'),
(144, 'MD', 'Moldova', 373, '47.411631', '28.369885'),
(145, 'MC', 'Monaco', 377, '43.750298', '7.412841'),
(146, 'MN', 'Mongolia', 976, '46.862496', '103.846656'),
(147, 'MS', 'Montserrat', 1664, '16.742498', '-62.187366'),
(148, 'MA', 'Morocco', 212, '31.791702', '-7.09262'),
(149, 'MZ', 'Mozambique', 258, '-18.665695', '35.529562'),
(150, 'MM', 'Myanmar', 95, '21.913965', '95.956223'),
(151, 'NA', 'Namibia', 264, '-22.95764', '18.49041'),
(152, 'NR', 'Nauru', 674, '-0.522778', '166.931503'),
(153, 'NP', 'Nepal', 977, '28.394857', '84.124008'),
(154, 'AN', 'Netherlands Antilles', 599, '12.226079', '-69.060087'),
(155, 'NL', 'Netherlands', 31, '52.132633', '5.291266'),
(156, 'NC', 'New Caledonia', 687, '-20.904305', '165.618042'),
(157, 'NZ', 'New Zealand', 64, '-40.900557', '174.885971'),
(158, 'NI', 'Nicaragua', 505, '12.865416', '-85.207229'),
(159, 'NE', 'Niger', 227, '17.607789', '8.081666'),
(160, 'NG', 'Nigeria', 234, '9.081999', '8.675277'),
(161, 'NU', 'Niue', 683, '-19.054445', '-169.867233'),
(162, 'NF', 'Norfolk Island', 672, '-29.040835', '167.954712'),
(163, 'MP', 'Northern Mariana Islands', 1670, '17.33083', '145.38469'),
(164, 'NO', 'Norway', 47, '60.472024', '8.468946'),
(165, 'OM', 'Oman', 968, '21.512583', '55.923255'),
(166, 'PK', 'Pakistan', 92, '30.375321', '69.345116'),
(167, 'PW', 'Palau', 680, '7.51498', '134.58252'),
(168, 'PS', 'Palestinian Territory Occupied', 970, '31.952162', '35.233154'),
(169, 'PA', 'Panama', 507, '8.537981', '-80.782127'),
(170, 'PG', 'Papua new Guinea', 675, '-6.314993', '143.95555'),
(171, 'PY', 'Paraguay', 595, '-23.442503', '-58.443832'),
(172, 'PE', 'Peru', 51, '-9.189967', '-75.015152'),
(173, 'PH', 'Philippines', 63, '12.879721', '121.774017'),
(174, 'PN', 'Pitcairn Island', 0, '-24.703615', '-127.439308'),
(175, 'PL', 'Poland', 48, '51.919438', '19.145136'),
(176, 'PT', 'Portugal', 351, '39.399872', '-8.224454'),
(177, 'PR', 'Puerto Rico', 1787, '18.220833', '-66.590149'),
(178, 'QA', 'Qatar', 974, '25.354826', '51.183884'),
(179, 'RE', 'Reunion', 262, '-21.115141', '55.536384'),
(180, 'RO', 'Romania', 40, '45.943161', '24.96676'),
(181, 'RU', 'Russia', 70, '61.52401', '105.318756'),
(182, 'RW', 'Rwanda', 250, '-1.940278', '29.873888'),
(183, 'SH', 'Saint Helena', 290, '-24.143474', '-10.030696'),
(184, 'KN', 'Saint Kitts And Nevis', 1869, '17.357822', '-62.782998'),
(185, 'LC', 'Saint Lucia', 1758, '13.909444', '-60.978893'),
(186, 'PM', 'Saint Pierre and Miquelon', 508, '46.941936', '-56.27111'),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784, '12.984305', '-61.287228'),
(188, 'WS', 'Samoa', 684, '-13.759029', '-172.104629'),
(189, 'SM', 'San Marino', 378, '43.94236', '12.457777'),
(190, 'ST', 'Sao Tome and Principe', 239, '0.18636', '6.613081'),
(191, 'SA', 'Saudi Arabia', 966, '23.885942', '45.079162'),
(192, 'SN', 'Senegal', 221, '14.497401', '-14.452362'),
(193, 'RS', 'Serbia', 381, '44.016521', '21.005859'),
(194, 'SC', 'Seychelles', 248, '-4.679574', '55.491977'),
(195, 'SL', 'Sierra Leone', 232, '8.460555', '-11.779889'),
(196, 'SG', 'Singapore', 65, '1.352083', '103.819836'),
(197, 'SK', 'Slovakia', 421, '48.669026', '19.699024'),
(198, 'SI', 'Slovenia', 386, '46.151241', '14.995463'),
(199, 'XG', 'Smaller Territories of the UK', 44, '', ''),
(200, 'SB', 'Solomon Islands', 677, '-9.64571', '160.156194'),
(201, 'SO', 'Somalia', 252, '5.152149', '46.199616'),
(202, 'ZA', 'South Africa', 27, '-30.559482', '22.937506'),
(203, 'GS', 'South Georgia', 0, '-54.429579', '-36.587909'),
(204, 'SS', 'South Sudan', 211, '', ''),
(205, 'ES', 'Spain', 34, '40.463667', '-3.74922'),
(206, 'LK', 'Sri Lanka', 94, '7.873054', '80.771797'),
(207, 'SD', 'Sudan', 249, '12.862807', '30.217636'),
(208, 'SR', 'Suriname', 597, '3.919305', '-56.027783'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47, '77.553604', '23.670272'),
(210, 'SZ', 'Swaziland', 268, '-26.522503', '31.465866'),
(211, 'SE', 'Sweden', 46, '60.128161', '18.643501'),
(212, 'CH', 'Switzerland', 41, '46.818188', '8.227512'),
(213, 'SY', 'Syria', 963, '34.802075', '38.996815'),
(214, 'TW', 'Taiwan', 886, '23.69781', '120.960515'),
(215, 'TJ', 'Tajikistan', 992, '38.861034', '71.276093'),
(216, 'TZ', 'Tanzania', 255, '-6.369028', '34.888822'),
(217, 'TH', 'Thailand', 66, '15.870032', '100.992541'),
(218, 'TG', 'Togo', 228, '8.619543', '0.824782'),
(219, 'TK', 'Tokelau', 690, '-8.967363', '-171.855881'),
(220, 'TO', 'Tonga', 676, '-21.178986', '-175.198242'),
(221, 'TT', 'Trinidad And Tobago', 1868, '10.691803', '-61.222503'),
(222, 'TN', 'Tunisia', 216, '33.886917', '9.537499'),
(223, 'TR', 'Turkey', 90, '38.963745', '35.243322'),
(224, 'TM', 'Turkmenistan', 7370, '38.969719', '59.556278'),
(225, 'TC', 'Turks And Caicos Islands', 1649, '21.694025', '-71.797928'),
(226, 'TV', 'Tuvalu', 688, '-7.109535', '177.64933'),
(227, 'UG', 'Uganda', 256, '1.373333', '32.290275'),
(228, 'UA', 'Ukraine', 380, '48.379433', '31.16558'),
(229, 'AE', 'United Arab Emirates', 971, '23.424076', '53.847818'),
(230, 'GB', 'United Kingdom', 44, '55.378051', '-3.435973'),
(231, 'US', 'United States', 1, '37.09024', '-95.712891'),
(232, 'UM', 'United States Minor Outlying Islands', 1, '', ''),
(233, 'UY', 'Uruguay', 598, '-32.522779', '-55.765835'),
(234, 'UZ', 'Uzbekistan', 998, '41.377491', '64.585262'),
(235, 'VU', 'Vanuatu', 678, '-15.376706', '166.959158'),
(236, 'VA', 'Vatican City State (Holy See)', 39, '41.902916', '12.453389'),
(237, 'VE', 'Venezuela', 58, '6.42375', '-66.58973'),
(238, 'VN', 'Vietnam', 84, '14.058324', '108.277199'),
(239, 'VG', 'Virgin Islands (British)', 1284, '18.420695', '-64.639968'),
(240, 'VI', 'Virgin Islands (US)', 1340, '18.335765', '-64.896335'),
(241, 'WF', 'Wallis And Futuna Islands', 681, '-13.768752', '-177.156097'),
(242, 'EH', 'Western Sahara', 212, '24.215527', '-12.885834'),
(243, 'YE', 'Yemen', 967, '15.552727', '48.516388'),
(244, 'YU', 'Yugoslavia', 38, '', ''),
(245, 'ZM', 'Zambia', 260, '-13.133897', '27.849332'),
(246, 'ZW', 'Zimbabwe', 263, '-19.015438', '29.154857');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` char(1) CHARACTER SET utf8 NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `uses_total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `products` text CHARACTER SET utf8 DEFAULT NULL,
  `allow_for` varchar(1) CHARACTER SET utf8 NOT NULL,
  `date_added` datetime NOT NULL,
  `vendor_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `title` varchar(32) CHARACTER SET utf8 NOT NULL,
  `code` varchar(3) CHARACTER SET utf8 NOT NULL,
  `symbol_left` varchar(12) CHARACTER SET utf8 NOT NULL,
  `symbol_right` varchar(12) CHARACTER SET utf8 NOT NULL,
  `decimal_place` char(1) CHARACTER SET utf8 NOT NULL,
  `value` double(22,0) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_default` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_place`, `value`, `status`, `is_default`, `date_modified`) VALUES
(1, 'Nigerian Naira', 'NGN', '₦', '', '2', 1, 1, 1, '2021-02-08 20:12:49'),
(3, 'US Dollar', 'USD', '$', '', '2', 1, 1, 0, '2021-02-15 05:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `seo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fevi_icon` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sale_commision_type` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sale_commision_value` double(22,0) DEFAULT 0,
  `click_commision_type` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `click_commision_ppc` double(22,0) DEFAULT 0,
  `click_commision_per` double(22,0) DEFAULT 0,
  `form_recursion_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `form_recursion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `recursion_custom_time` bigint(20) NOT NULL,
  `recursion_endtime` datetime DEFAULT NULL,
  `product` text CHARACTER SET utf8 DEFAULT NULL,
  `coupon` text CHARACTER SET utf8 NOT NULL,
  `allow_for` text CHARACTER SET utf8 NOT NULL,
  `footer_title` text CHARACTER SET utf8 NOT NULL,
  `google_analitics` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `comment` text CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `title`, `description`, `seo`, `fevi_icon`, `sale_commision_type`, `sale_commision_value`, `click_commision_type`, `click_commision_ppc`, `click_commision_per`, `form_recursion_type`, `form_recursion`, `recursion_custom_time`, `recursion_endtime`, `product`, `coupon`, `allow_for`, `footer_title`, `google_analitics`, `created_at`, `comment`, `status`) VALUES
(2, 'Sub Partnership Forms', '<p>Sub Partnership Forms<br></p>', 'app3star_agents', 'tQyHzBGhNMTqUWl35E4ZkLmiIapXf1r9.png', 'percentage', 10, 'default', 0, 0, '', '', 0, NULL, NULL, '', 'S', 'app3star partners', '', '2020-03-16 07:01:09', NULL, 1),
(3, 'POSIM  Mega Partner Banquet', '<p>FIll the form to get your POSIM from mega partners</p>', 'posim', 'qlwzyxRkS3CjrAnMZ0Tb7LuEBv9GhXK8.png', 'fixed', 3500, 'default', 0, 0, '', '', 0, NULL, '6', '', 'S', 'app3star', '', '2020-11-09 06:22:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_action`
--

CREATE TABLE `form_action` (
  `action_id` int(11) NOT NULL,
  `action_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `pay_commition` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `country_code` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_coupon`
--

CREATE TABLE `form_coupon` (
  `form_coupon_id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` char(1) CHARACTER SET utf8 NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `uses_total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_admin_clicks_action`
--

CREATE TABLE `integration_admin_clicks_action` (
  `id` int(11) NOT NULL,
  `base_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `product_id` double(22,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commission` int(11) DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_id` int(11) NOT NULL,
  `tools_id` int(11) NOT NULL,
  `country_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_action` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_category`
--

CREATE TABLE `integration_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `integration_category`
--

INSERT INTO `integration_category` (`id`, `name`, `created_at`) VALUES
(1, 'Test', '2021-02-17 06:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `integration_clicks_action`
--

CREATE TABLE `integration_clicks_action` (
  `id` int(11) NOT NULL,
  `base_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `product_id` double(22,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commission` int(11) DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_id` int(11) NOT NULL,
  `tools_id` int(11) NOT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_action` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `custom_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_clicks_logs`
--

CREATE TABLE `integration_clicks_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `base_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browserName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browserVersion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `systemString` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osPlatform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osVersion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osShortVersion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isMobile` int(11) NOT NULL,
  `mobileName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osArch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isIntel` int(11) NOT NULL,
  `isAMD` int(11) NOT NULL,
  `isPPC` int(11) NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `click_id` int(11) NOT NULL,
  `click_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `custom_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integration_clicks_logs`
--

INSERT INTO `integration_clicks_logs` (`id`, `user_id`, `base_url`, `link`, `agent`, `browserName`, `browserVersion`, `systemString`, `osPlatform`, `osVersion`, `osShortVersion`, `isMobile`, `mobileName`, `osArch`, `isIntel`, `isAMD`, `isPPC`, `ip`, `country_code`, `created_at`, `click_id`, `click_type`, `vendor_id`, `custom_data`) VALUES
(1, 5, 'http://dashboard.app3star.com/store', 'http://dashboard.app3star.com/store', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'Google Chrome', '84.0.4147.135', 'Windows NT 10.0; Win64; x64', 'Windows', '10.0', '10.0', 0, '', '64', 1, 0, 0, '129.205.113.200', 'NG', '2020-08-28 16:18:34', 18, 'store_sale', 0, NULL),
(2, 3, 'https://dashboard.app3star.com/store', 'https://dashboard.app3star.com/store', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36 Edg/85.0.564.44', 'Google Chrome', '85.0.4183.83', 'Windows NT 10.0; Win64; x64', 'Windows', '10.0', '10.0', 0, '', '64', 1, 0, 0, '105.112.101.9', 'NG', '2020-09-10 18:11:06', 23, 'store_sale', 0, NULL),
(3, 5, 'https://dashboard.app3star.com/store', 'https://dashboard.app3star.com/store', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36 Edg/85.0.564.44', 'Google Chrome', '85.0.4183.83', 'Windows NT 10.0; Win64; x64', 'Windows', '10.0', '10.0', 0, '', '64', 1, 0, 0, '105.112.101.9', 'NG', '2020-09-10 18:20:44', 24, 'store_sale', 0, NULL),
(4, 3, 'http://dashboard.app3star.com/store', 'http://dashboard.app3star.com/store', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'Google Chrome', '85.0.4183.121', 'Windows NT 10.0; Win64; x64', 'Windows', '10.0', '10.0', 0, '', '64', 1, 0, 0, '105.112.115.254', 'NG', '2020-09-28 22:01:07', 29, 'store_sale', 0, NULL),
(5, 11, 'http://dashboard.app3star.com/store', 'http://dashboard.app3star.com/store', 'Mozilla/5.0 (Linux; Android 9; Nokia 2.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Mobile Safari/537.36', 'Google Chrome', '72.0.3626.121', 'Linux; Android 9; Nokia 2.2', 'Android', '9', '9', 1, '', NULL, 0, 0, 0, '105.112.102.176', 'NG', '2021-02-08 09:24:54', 40, 'store_sale', 0, NULL),
(6, 37, 'http://dashboard.app3star.com/store', 'http://dashboard.app3star.com/store', 'Mozilla/5.0 (Linux; Android 7.0; Infinix X571 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/88.0.4324.93 Mobile Safari/537.36 PHX/4.0', 'Google Chrome', '88.0.4324.93', 'Linux; Android 7.0; Infinix X571 Build/NRD90M; wv', 'Android', '7.0', '7.0', 1, 'Infinix X571', NULL, 0, 0, 0, '154.118.8.2', 'NG', '2021-02-08 09:37:59', 41, 'store_sale', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `integration_orders`
--

CREATE TABLE `integration_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_ids` varchar(888) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `commission_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` double NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_id` int(11) NOT NULL,
  `script_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_tran` int(11) DEFAULT NULL,
  `affiliate_tran` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `custom_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_programs`
--

CREATE TABLE `integration_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_sale` double(22,0) DEFAULT 0,
  `sale_status` int(11) DEFAULT NULL,
  `commission_number_of_click` int(11) DEFAULT NULL,
  `commission_click_commission` double(22,0) DEFAULT 0,
  `click_status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_click_status` int(11) DEFAULT NULL,
  `admin_commission_click_commission` double(22,0) DEFAULT 0,
  `admin_commission_number_of_click` int(11) DEFAULT NULL,
  `admin_commission_sale` double(22,0) DEFAULT 0,
  `admin_commission_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_sale_status` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `vendor_id` int(11) DEFAULT NULL,
  `click_allow` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integration_programs`
--

INSERT INTO `integration_programs` (`id`, `name`, `commission_type`, `commission_sale`, `sale_status`, `commission_number_of_click`, `commission_click_commission`, `click_status`, `created_at`, `admin_click_status`, `admin_commission_click_commission`, `admin_commission_number_of_click`, `admin_commission_sale`, `admin_commission_type`, `admin_sale_status`, `comment`, `status`, `vendor_id`, `click_allow`) VALUES
(1, 'BUK', 'fixed', 0, 1, 0, 0, 0, '2020-08-20 00:26:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `integration_refer_product_action`
--

CREATE TABLE `integration_refer_product_action` (
  `id` int(11) NOT NULL,
  `country_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `script_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `base_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `pay_commition` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `count_for` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_id` int(11) NOT NULL,
  `is_action` int(11) NOT NULL,
  `tools_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_tools`
--

CREATE TABLE `integration_tools` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'program',
  `action_click` double NOT NULL,
  `action_amount` double NOT NULL,
  `general_click` double NOT NULL,
  `general_amount` double NOT NULL,
  `general_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow_for` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recursion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recursion_custom_time` bigint(20) NOT NULL,
  `recursion_endtime` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_action_amount` double(22,0) DEFAULT 0,
  `admin_action_click` int(11) DEFAULT NULL,
  `admin_general_amount` double(22,0) DEFAULT 0,
  `admin_general_click` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketpostback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration_tools_ads`
--

CREATE TABLE `integration_tools_ads` (
  `id` int(11) NOT NULL,
  `tools_id` int(11) NOT NULL,
  `ads_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interest_categories`
--

CREATE TABLE `interest_categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest_categories`
--

INSERT INTO `interest_categories` (`cat_id`, `name`, `status`, `created_at`) VALUES
(1, 'Ankara', 1, '2021-08-06 05:56:25'),
(2, 'Fabrics', 1, '2021-08-06 05:56:25'),
(3, 'Models', 1, '2021-08-06 05:56:25'),
(4, 'Ready to Wear', 1, '2021-08-06 05:56:25'),
(5, 'Children Outfilts', 1, '2021-08-06 05:56:25'),
(6, 'Tailors', 1, '2021-08-06 05:56:25'),
(7, 'Beskope', 1, '2021-08-06 05:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `flag` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_rtl` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `is_default`, `flag`, `status`, `is_rtl`) VALUES
(1, 'English', 1, './assets/vertical/assets/images/flags/lr.png', 1, 0),
(3, 'Hindi', 0, './assets/vertical/assets/images/flags/in.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE `last_seen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(355) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_subject` varchar(355) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_subject` varchar(355) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `name`, `subject`, `text`, `admin_subject`, `client_subject`, `client_text`, `admin_text`, `shortcode`, `unique_id`) VALUES
(1, 'User Registration', 'User Registration Successfully', '<p>Dear [[firstname]],</p>\r\n\r\n<p>Your new affiliate user account has been created</p>\r\n\r\n<p>welcome to the [[website_name]]</p>\r\n\r\n<p>your account details:</p>\r\n\r\n<p>================</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br>\r\n[[website_name]]<br>\r\nSupport Team</p>\r\n', 'Admin : New affiliate user Register', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>Â New affiliate user Register on your siteÂ [[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br>\r\n[[website_name]]<br>\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', NULL),
(2, 'Client Registration', 'New Client Register Under you', '<p>Dear [[firstname]],</p>\r\n\r\n<p>New client account has been created under you</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : New Client Register', 'Dear [[firstname]], Welcome To Our Store', '<p>Dear [[firstname]],</p>\r\n\r\n<p>welcome to the [[website_name]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', '<p>Dear Admin,</p>\r\n\r\n<p>New client has been registered on your store</p>\r\n\r\n<p>[[firstname]] ,&nbsp;[[lastname]]&nbsp;</p>\r\n\r\n<p>[[email]] | [[username]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', NULL),
(3, 'Forget Password', 'User Forget Password', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>[[website_name]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'Admin : Forget Password', 'Client : Forget Password', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', '<p>Dear [[firstname]],</p>\r\n\r\n<p>You recently request to reset your password from your [[website_name]] account click the below link to reset password</p>\r\n\r\n<p>[[reset_link]]</p>\r\n\r\n<p>If you did not request a password rest, please ignore this email or reply us know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'reset_link,firstname,lastname,email,username,website_name,website_logo', NULL),
(4, 'Send Wallet withdrawal Request', 'Send Wallet Withdrawal Request', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request is accept successfully and procced shortly</p>\r\n\r\n<p>Amount : [[amount]]</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'Admin : Send Wallet Withdrawal Request', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request is accept successfully and procced shortly</p>\r\n\r\n<p>Amount : [[amount]]</p>\r\n\r\n<p>Thanks<br />\r\n[[website_name]]</p>\r\n', 'amount,comment,name,user_email,commission_type,website_name,website_logo', NULL),
(5, 'withdrawal request status change', 'Your withdrawal request status change', '<p>Dear [[name]],</p>\r\n\r\n<p>Your withdrawal request status has been change to : <strong>[[new_status]]</strong></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin side', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>Withdrawal request status has been change to : <strong>[[new_status]]</strong></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'amount,comment,name,user_email,commission_type,website_name,website_logo,new_status', NULL),
(6, 'Store Contact Us', '', '', 'Admin : Store Contact Us', 'We will contact to you shortly ..!', '<p>&nbsp;</p>\r\n\r\n<p><strong>Name </strong>: [[name]]</p>\r\n\r\n<p><strong>Email </strong>: [[email]]</p>\r\n\r\n<p><strong>Phone </strong>: [[phone]]</p>\r\n\r\n<p><strong>Message</strong> :</p>\r\n\r\n<p>[[message]]</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Hey Admin <strong>[[name]] </strong>trying to contact you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Name </strong>: [[name]]</p>\r\n\r\n<p><strong>Email </strong>: [[email]]</p>\r\n\r\n<p><strong>Phone </strong>: [[phone]]</p>\r\n\r\n<p><strong>Message</strong> :</p>\r\n\r\n<p>[[message]]</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'name,email,phone,message,website_name,website_logo', NULL),
(7, 'Order Status Has Been Change', 'Your Order Status Has Been Change', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', 'Admin : Your Order Status Has Been Change', 'Client: Your Order Status Has Been Change', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', '<p>Hello<strong>&nbsp;[[firstname]] [[lastname]]</strong></p>\r\n\r\n<p>Your Order Status Has Been Change to <strong>[[status]]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\norder Id :<strong> [[order_id]]</strong></p>\r\n', 'order_id,status,order_link,product_name,product_description,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,comment', NULL),
(8, 'New Order', 'Affiliate: New Order Commission From [[firstname]] [[lastname]]', '<p>Hello Affiliate,</p>\r\n\r\n<p>you got new order Commission from sale thats done under [[firstname]] [[lastname]]</p>\r\n\r\n<p>Commission: [[commission]] -&nbsp;[[commission_type]]</p>\r\n\r\n<p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]</p>\r\n\r\n<p><strong>product_description</strong> : [[product_description]]</p>\r\n', 'Admin : New OrderÂ [[order_id]]Â has been successfully placed.', 'Client : New OrderÂ [[order_id]]Â has been successfully placed.', '<p>Dear Client,</p>\r\n\r\n<p>New Order <strong>[[order_id]] </strong>has been successfully placed on your site [[website_name]] .</p>\r\n\r\n<p><strong>Order Status</strong> : [[status]]<br />\r\n<strong>Total Amount</strong> : [[total]]<br />\r\n<strong>Transaction ID</strong> : [[txn_id]]</p>\r\n\r\n<p>[[order_link]]</p>\r\n', '<p>Dear Admin,</p>\r\n\r\n<p>New Order <strong>[[order_id]] </strong>has been successfully placed on your site [[website_name]] .</p>\r\n\r\n<p><strong>Order Status</strong> : [[status]]<br />\r\n<strong>Total Amount</strong> : [[total]]<br />\r\n<strong>Transaction ID</strong> : [[txn_id]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[order_link]]</p>\r\n', 'order_id,status,order_link,product_name,product_description,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id', NULL),
(10, 'get market click notification', 'Get market click notification', '<p>Dear [[name]],</p>\r\n\r\n<p>[[firstname]] [[lastname]] got commition from market [[affiliateads_type]] click</p>\r\n\r\n<p>Commition : [[affiliate_commission]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : Get market click notification', '', '', '<p>Dear [[name]],</p>\r\n\r\n<p>[[firstname]] [[lastname]] got commition from market [[affiliateads_type]] click</p>\r\n\r\n<p>Commition : [[affiliate_commission]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'affiliateads_type,affiliate_commission,firstname,lastname,email,username,website_name,website_logo', NULL),
(11, 'External Website New Order', 'External Website New Order [[external_website_name]]', '<p>Hey&nbsp;[[username]]</p>\r\n\r\n<p>You have got&nbsp;[[commission]] from [[external_website_name]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thanks&nbsp;</strong></p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'External Website New Order [[external_website_name]]', '', '', '<p>Hey New Order Placed at&nbsp;[[external_website_name]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>User </strong>:&nbsp;[[username]]</p>\r\n\r\n<p><strong>Website </strong>:&nbsp;[[external_website_name]]</p>\r\n\r\n<p><strong>commission </strong>: [[commission]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thanks&nbsp;</strong></p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'external_website_name,commission,username,website_name,website_logo,product_ids,total,currency,commission_type,script_name', NULL),
(12, 'wallet status change to in wallet', '[[amount]] credited in your wallet', '<p>Dear [[name]],</p>\r\n\r\n<p>[[comment]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', '', '', '', '', 'amount,comment,name,user_email,website_name,website_logo,new_status', NULL),
(13, 'User Registration From Integration', 'User Registration Successfully', '<p>Dear [[firstname]],</p>\r\n\r\n<p>Your new affiliate user account has been created welcome to the [[website_name]]</p>\r\n\r\n<p>your account details:</p>\r\n\r\n<p>================</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<h2>password is :&nbsp;<strong>[[password]]</strong></h2>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'Admin : New affiliate user Register From Integration', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>&nbsp;New affiliate user Register on your site&nbsp;[[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,password,website_name,website_logo', NULL),
(14, 'Subscription Status Changed', 'Subscription Status Changed', '<p>Dear [[firstname]],</p>\r\n                <p>Your subscription status has been changed to [[status_text]]</p>\r\n                <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>', '', '', '', '', 'comment,planname,price,expire_at,started_at,status_text,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_status_change'),
(15, 'Subscription Buy', 'Subscription Buy', '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'New Subscription Buy From [[firstname]] [[lastname]]', '', '', '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_buy'),
(16, 'Subscription Expire Notification', 'Your Subscription Will Be Expired Soon.', '<p>customText</p>\r\n', '', '', '', '', 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_expire_notification'),
(17, 'Wallet Status Change To On Hold', '[[amount]] is put on hold in your wallet', '<p>Dear [[name]],</p>\n        <p>Transactions #[[id]] status changed to [[new_status]]. amount is [[amount]]</p>\n        <p><br />\n        [[website_name]]<br />\n        Support Team</p>\n', '', '', '', '', 'amount,id,name,new_status,user_email,website_name,website_logo,name', 'wallet_noti_on_hold_wallet'),
(18, 'New User Request', 'User Registration Successfull', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>User account has been registered successfully on [[website_name]], please wait while system admin apporve&nbsp;your request.<br />\r\nWe will inform you once account has been approved, Thank You.</p>\r\n\r\n<p>Support Team<br />\r\n[[website_name]]</p>\r\n', 'New User Registration - Approval Pending', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>New user has been registered on [[website_name]], apporval is pending yet!</p>\r\n\r\n<p>User Details</p>\r\n\r\n<p>Name : [[firstname]][[lastname]]<br />\r\nEmail :&nbsp;[[email]]<br />\r\nUsername : [[username]]<br />\r\nSupport Team<br />\r\n[[website_name]]</p>', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_request'),
(19, 'New User Request Approved', 'User Account Approved', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is accepted by admin, you can login and use services.</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Approved', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>You have approced registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_approved'),
(20, 'New User Request Declined', 'User Account Declined', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is declined by admin, for more information please contact supprt team</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Declined', '', '', '<p>Dear Admin,</p>\r\n\r\n<p>You have declined registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_declined'),
(21, 'Vendor Create new product', NULL, NULL, 'New Product Created By Vendor', NULL, NULL, '<p>Dear Admin,</p>\n                    <p>New Product has been created</p>\n                    <p>Name [[product_name]]</p>\n                    <p>Username [[username]]</p>\n                    <p><br />\n                [[website_name]]<br />\n                Support Team</p>\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id', 'vendor_create_product'),
(22, 'Vendor Product Status Change To Approved', 'Product Status Change To Approved', '<p>Dear, [[username]]</p>\n                    <p>Product Status Change to Approved</p>\n                    <p>Name [[product_name]]</p>\n                    <p><br />\n                [[website_name]]<br />\n                Support Team</p>\n            ', NULL, NULL, NULL, NULL, 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id', 'vendor_product_status_1'),
(36, 'Vendor Got New Order', 'Vendor: You have new order from [[firstname]] [[lastname]]', '<p>Hello Vendor,</p>\r\n                    <p>you got new order from [[firstname]] [[lastname]]</p>\r\n                    <p>Commission: [[vendor_commission]] </p>\r\n                    <p>Order Status: [[status]] </p>\r\n                    <p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]</p>\r\n                    [[website_name]]<br />\r\n                            Support Team</p>\r\n                ', '', '', '', '', 'vendor_firstname,vendor_lastname,vendor_commission,order_id,status,order_link,product_name,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id', 'new_order_for_vendor'),
(37, 'Vendor Form Status Change To Approved', 'Form Status Change To Approved', '<p>Dear, [[username]]</p>\r\n                                <p>Form Status Change to Approved</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title', 'vendor_form_status_1'),
(38, 'Vendor Create new product', '', '', 'New Product Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                                <p>New Product has been created</p>\r\n                                <p>Name [[product_name]]</p>\r\n                                <p>Username [[username]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id', 'vendor_create_product'),
(39, 'Vendor Product Status Change To Approved', 'Product Status Change To Approved', '<p>Dear, [[username]]</p>\r\n                                <p>Product Status Change to Approved</p>\r\n                                <p>Name [[product_name]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,product_name,product_short_description,product_price,product_sku,product_id', 'vendor_product_status_1'),
(40, 'Vendor Create new product', '', '', 'New Form Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                                <p>New Form has been created</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p>Username [[username]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title', 'vendor_create_form'),
(41, 'Vendor Form Status Change To In Review', 'Form Status Change To In Review', '<p>Dear,</p>\r\n                                <p>Form Status Change to In Review</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'Form Status Change To In Review', '', '', '<p>Dear,</p>\r\n                                <p>Form Status Change to In Review</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title', 'vendor_form_status_0'),
(42, 'Vendor Form Status Change To Denied', 'Form Status Change To Denied', '<p>Dear, [[username]]</p>\r\n                                <p>Form Status Change to Denied</p>\r\n                                <p>Name [[title]]</p>\r\n                                <p><br />\r\n                            [[website_name]]<br />\r\n                            Support Team</p>\r\n                        ', '', '', '', '', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,title', 'vendor_form_status_2'),
(43, 'Vendor Order Status Has Been Change', 'Vendor: New Order Commission From [[firstname]] [[lastname]]', '<p>Hello Vendor,</p>\r\n                    <p>you got new order Sale Commission from sale thats done under [[firstname]] [[lastname]]</p>\r\n                    <p>Commission: [[vendor_commission]] </p>\r\n                    <p><strong>Commission for product_name :&nbsp;</strong>[[product_name]]</p>\r\n                    [[website_name]]<br />\r\n                            Support Team</p>\r\n                ', '', '', '', '', 'vendor_firstname,vendor_lastname,vendor_commission,order_id,status,order_link,product_name,commission_type,PhoneNumber,firstname,lastname,commission,total,currency_code,txn_id,website_name,website_logo,order_id', 'vendor_order_status_complete'),
(45, 'Vendor Create new product', '', '', 'New Program Created By Vendor : [[name]]', '', '', '<p>Dear Admin,</p>\r\n                    <p>New Program has been created</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name', 'vendor_create_program'),
(46, 'Vendor Program Status Change To Denied', 'Program Status Change To Denied', '<p>Dear,</p>\r\n                    <p>Program Status Change to Denied</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Denied', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Denied</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name', 'vendor_program_status_2'),
(47, 'Vendor Program Status Change To Ask To Edit', 'Program Status Change To Ask To Edit', '<p>Dear,</p>\r\n                    <p>Program Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Ask To Edit', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name', 'vendor_program_status_3'),
(48, 'Vendor Program Status Change To In Review', 'Program Status Change To In Review', '<p>Dear,</p>\r\n                    <p>Program Status Change to In Review</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To In Review', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to In Review</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name', 'vendor_program_status_0'),
(49, 'Vendor Program Status Change To Approved', 'Program Status Change To Approved', '<p>Dear,</p>\r\n                    <p>Program Status Change to Approved</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Program Status Change To Approved', '', '', '<p>Dear,</p>\r\n                    <p>Program Status Change to Approved</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name', 'vendor_program_status_1'),
(51, 'Vendor Create Ads (Banner, Text, Link, Video)', '', '', 'New Ads ([[type]]) Created By Vendor', '', '', '<p>Dear Admin,</p>\r\n                    <p>New Ads - [[type]] has been created</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type', 'vendor_create_ads'),
(52, 'Vendor Ads (Banner, Text, Link, Video) Status Change To Approved', 'Ads ([[type]]) Status Change To Approved', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Approved </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To Approved', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Approved </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type', 'vendor_ads_status_1'),
(53, 'Vendor Ads (Banner, Text, Link, Video) Status Change To In Review', 'Ads ([[type]]) Status Change To In Review', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to In Review </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To In Review', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to In Review </p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type', 'vendor_ads_status_0'),
(54, 'Vendor Ads (Banner, Text, Link, Video) Status Change To Ask To Edit', 'Ads ([[type]]) Status Change To Ask To Edit', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'Ads ([[type]]) Status Change To Ask To Edit', '', '', '<p>Dear</p>\r\n                    <p>Ads - [[type]] Status Change to Ask To Edit</p>\r\n                    <p>Name [[name]]</p>\r\n                    <p>Username [[username]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', 'admin_last_message,vendor_last_message,firstname,lastname,email,username,website_name,website_logo,name,type,tool_type', 'vendor_ads_status_3'),
(55, 'New Order in Vendor Program', 'New Order Create In Your Program', '<p>Dear Vendor,</p>\r\n                    <p>New Order Created under your Program</p>\r\n                    <p><b>Website</b> : [[external_website_name]]</p>\r\n                    <p><b>Total</b> : [[total]]</p>\r\n                    <p><br />\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', '', '', '', '', 'external_website_name,commission,username,website_name,website_logo,product_ids,total,currency,commission_type,script_name', 'order_on_vendor_program'),
(57, 'Withdrawal Request Status Changed', 'Withdrawal Request Status Changed', '<p>Dear,</p>\r\n                <p>Your Withdrawal Request #([[request_id]]) Status has been change to <b><i>[[status]]</i></b></p>\r\n\r\n                    <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>\r\n            ', '', NULL, NULL, '', 'comment,status,request_id,firstname,lastname,email,username,website_name,website_logo,name', 'withdrwal_status_change'),
(59, 'User Registration (API)', 'Your Account Created Successfully On [[website_name]]', '<p>Welcome to [[website_name]]</p>\r\n\r\n<p>Dear [[firstname]],</p>\r\n\r\n<p>Thanks for signing up [[website_name]].</p>\r\n\r\n<p>Your&nbsp;Login&nbsp;credentials:</p>\r\n\r\n<p>Username:&nbsp;<strong>[[username]]</strong><br />\r\nPassword:&nbsp;<strong>*******</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"[[website_url]]\">Login To [[website_name]]</a></p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Registration Successfully', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>New affiliate user Register on your site&nbsp;[[website_name]]</p>\r\n\r\n<p>Affiliate details:</p>\r\n\r\n<p>============</p>\r\n\r\n<p>[[firstname]]</p>\r\n\r\n<p>[[username]]</p>\r\n\r\n<p>[[email]]</p>\r\n\r\n<p><br />\r\n[[website_name]]<br />\r\nSupport Team</p>\r\n', 'firstname,lastname,email,username,website_url,website_name,website_logo,name', 'send_register_mail_api'),
(63, 'Subscription Status Changed', 'Subscription Status Changed', '<p>Dear [[firstname]],</p>\r\n                <p>Your subscription status has been changed to [[status_text]]</p>\r\n                <p>Comment: [[comment]] </p>\r\n                [[website_name]]<br />\r\n                Support Team</p>', '', NULL, NULL, '', 'comment,planname,price,expire_at,started_at,status_text,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_status_change'),
(64, 'Subscription Buy', 'Subscription Buy', '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'New Subscription Buy From [[firstname]] [[lastname]]', NULL, NULL, '<h2>Thanks for your order</h2>\r\n\r\n<p>Welcome to Prime. As a Prime member, enjoy these great benefits. If you have any questions, call us any time at or simply reply to this email.</p>\r\n', 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_buy'),
(65, 'Subscription Expire Notification', 'Your Subscription Will Be Expired Soon.', '<p>customText</p>\r\n', NULL, NULL, NULL, NULL, 'planname,price,expire_at,started_at,firstname,lastname,email,username,website_url,website_name,website_logo,name', 'subscription_expire_notification'),
(66, 'Wallet Status Change To On Hold', '[[amount]] is put on hold in your wallet', '<p>Dear [[name]],</p>\n        <p>Transactions #[[id]] status changed to [[new_status]]. amount is [[amount]]</p>\n        <p><br />\n        [[website_name]]<br />\n        Support Team</p>\n', '', NULL, NULL, NULL, 'amount,id,name,new_status,user_email,website_name,website_logo,name', 'wallet_noti_on_hold_wallet'),
(67, 'New User Request', 'User Registration Successfull', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>User account has been registered successfully on [[website_name]], please wait while system admin apporve&nbsp;your request.<br />\r\nWe will inform you once account has been approved, Thank You.</p>\r\n\r\n<p>Support Team<br />\r\n[[website_name]]</p>\r\n', 'New User Registration - Approval Pending', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>New user has been registered on [[website_name]], apporval is pending yet!</p>\r\n\r\n<p>User Details</p>\r\n\r\n<p>Name : [[firstname]][[lastname]]<br />\r\nEmail :&nbsp;[[email]]<br />\r\nUsername : [[username]]<br />\r\nSupport Team<br />\r\n[[website_name]]</p>', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_request'),
(68, 'New User Request Approved', 'User Account Approved', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is accepted by admin, you can login and use services.</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Approved', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have approced registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_approved'),
(69, 'New User Request Declined', 'User Account Declined', '<p>Dear [[firstname]] [[lastname]],</p>\r\n\r\n<p>Your new user account registration request is declined by admin, for more information please contact supprt team</p>\r\n\r\n<p>[[website_name]]<br />\r\nSupport Team</p>\r\n', 'User Account Declined', NULL, NULL, '<p>Dear Admin,</p>\r\n\r\n<p>You have declined registration request of user having</p>\r\n\r\n<p>Name : [[firstname]]&nbsp;[[lastname]]</p>\r\n\r\n<p>Email : [[email]]</p>\r\n\r\n<p>Username : [[username]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Support Team</p>\r\n\r\n<p>[[website_name]]</p>\r\n', 'firstname,lastname,email,username,website_name,website_logo', 'new_user_declined');

-- --------------------------------------------------------

--
-- Table structure for table `membership_buy_history`
--

CREATE TABLE `membership_buy_history` (
  `id` int(11) NOT NULL,
  `buy_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership_buy_history`
--

INSERT INTO `membership_buy_history` (`id`, `buy_id`, `status_id`, `comment`, `created_at`) VALUES
(1, 1, 1, 'for labs', '2021-02-14 14:44:20'),
(2, 2, 1, 'started', '2021-02-14 14:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `billing_period` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `price` double DEFAULT 0,
  `special` double DEFAULT 0,
  `custom_period` double DEFAULT 0,
  `have_trail` int(11) DEFAULT NULL,
  `free_trail` double DEFAULT 0,
  `total_day` int(11) DEFAULT NULL,
  `bonus` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `label_text` varchar(80) CHARACTER SET utf8mb4 DEFAULT NULL,
  `label_background` varchar(50) CHARACTER SET utf8mb4 DEFAULT '#28A745',
  `label_color` varchar(50) CHARACTER SET utf8mb4 DEFAULT '#FFFFFF',
  `sort_order` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`id`, `name`, `type`, `billing_period`, `price`, `special`, `custom_period`, `have_trail`, `free_trail`, `total_day`, `bonus`, `status`, `description`, `label_text`, `label_background`, `label_color`, `sort_order`, `updated_at`, `created_at`) VALUES
(1, 'BASIC', 'free', 'monthly', 0, 0, 0, 0, 0, 30, 0, 1, '<p>Post only  5 Products or 5 Pictures</p><p>Available to  models, tailors and designers</p><p>Access to community package</p><p>Least  priority view on page</p><p>ONE ADMIN ACCOUNT</p><p><br></p>', 'Figtec ambassador', '#FF4DA0', '#FFFFFF', 0, '2021-08-23 07:20:12', '2021-01-26 22:04:46'),
(2, 'Standard', 'paid', 'monthly', 5000, 0, 90, 0, 0, 30, 0, 1, '<p>Coupon can be applied</p><p>Post  up to 100  products </p><p>Marketplace</p><p>Access to community page</p><p>PROMOTION/DISCOUNT/SALES</p><p>Second priority view</p><p>2ADMIN ACCOUNT</p>', 'Standard For Vendors', '#FF3DBE', '#FFFFFF', 2, '2021-08-23 07:45:55', '2021-01-31 15:41:48'),
(3, 'Premium', 'paid', 'monthly', 18000, 0, 0, 0, 0, 30, 0, 1, '<p class=\"MsoNormal\" xss=\"removed\">Unlimited posting of products<br></p><p class=\"MsoNormal\" xss=\"removed\">Access to community page</p><p class=\"MsoNormal\" xss=\"removed\">Access to marketplace</p><p class=\"MsoNormal\" xss=\"removed\">PRIORITY VIEW PAGE</p><p class=\"MsoNormal\" xss=\"removed\">PROMOTION /DISCOUNT /SALES</p><p class=\"MsoNormal\" xss=\"removed\">Access to fashion coach</p><p class=\"MsoNormal\" xss=\"removed\">Business analyst/ BUSINESS ADVISORS</p><p class=\"MsoNormal\" xss=\"removed\">Accounting software</p><p class=\"MsoNormal\" xss=\"removed\">DISCOUNTS ON TRAINING</p><div><br></div><ul xss=\"removed\">\r\n \r\n \r\n </ul><ul xss=\"removed\" type=\"disc\">\r\n</ul><p class=\"MsoNormal\" xss=\"removed\"><span lang=\"aa-ET\"><o></o></span></p>', 'For Vendors', '#FF3B9D', '#FFFFFF', 3, '2021-08-23 07:44:58', '2021-01-31 15:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `membership_user`
--

CREATE TABLE `membership_user` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_day` int(11) DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  `started_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_lifetime` int(11) NOT NULL DEFAULT 0,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `payment_details` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `total` double DEFAULT 0,
  `bonus_commission` double DEFAULT 0,
  `expire_mail_sent` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership_user`
--

INSERT INTO `membership_user` (`id`, `plan_id`, `user_id`, `total_day`, `expire_at`, `started_at`, `status_id`, `is_active`, `is_lifetime`, `payment_method`, `payment_details`, `total`, `bonus_commission`, `expire_mail_sent`, `created_at`) VALUES
(1, 2, 43, 90, '2021-05-15 14:44:20', '2021-02-14 14:44:20', 1, 1, 0, 'Free by Admin', '[]', 0, 0, 0, '2021-02-14 14:44:20'),
(2, 4, 11, NULL, NULL, '2021-02-14 14:44:58', 1, 1, 1, 'Free by Admin', '[]', 16000, 0, 0, '2021-02-14 14:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `meta_id` int(11) NOT NULL,
  `meta_key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_viewfor` varchar(255) DEFAULT NULL,
  `notification_view_user_id` varchar(11) DEFAULT NULL,
  `notification_title` varchar(255) DEFAULT NULL,
  `notification_url` varchar(255) NOT NULL,
  `notification_description` varchar(255) NOT NULL,
  `notification_actionID` varchar(255) NOT NULL,
  `notification_type` varchar(255) DEFAULT NULL,
  `notification_is_read` int(11) NOT NULL,
  `notification_ipaddress` varchar(255) NOT NULL,
  `notification_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_viewfor`, `notification_view_user_id`, `notification_title`, `notification_url`, `notification_description`, `notification_actionID`, `notification_type`, `notification_is_read`, `notification_ipaddress`, `notification_created_date`) VALUES
(3, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/1', 'card product is addded by admin in affiliate Program on 2020-02-26 20:08:22', '1', 'product', 1, '105.112.98.27', '2020-02-26 20:08:22'),
(5, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/2', 'School management system termly subscription product is addded by admin in affiliate Program on 2020-03-05 06:42:33', '2', 'product', 0, '105.112.96.38', '2020-03-05 06:42:33'),
(6, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/3', 'MYPOS app product is addded by admin in affiliate Program on 2020-03-05 06:54:36', '3', 'product', 1, '105.112.96.38', '2020-03-05 06:54:36'),
(9, 'client', '8', 'Your Order has been place', '/vieworder/2', 'Your Order has been place', '2', 'order', 0, '105.112.96.154', '2020-03-09 21:32:31'),
(11, 'client', '8', 'Your Order has been place', '/vieworder/3', 'Your Order has been place', '3', 'order', 0, '105.112.97.140', '2020-03-15 10:04:53'),
(12, 'user', '3', 'You made a withdrawal request ', '/wallet/withdraw', 'You made a withdrawal request ', '0', 'wallet', 1, '105.112.97.140', '2020-03-15 11:17:13'),
(14, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/4', 'Bulk sms unit product is addded by admin in affiliate Program on 2020-03-16 06:54:44', '4', 'product', 1, '105.112.98.254', '2020-03-16 06:54:44'),
(15, 'user', '11', 'You made a withdrawal request ', '/wallet/withdraw', 'You made a withdrawal request ', '0', 'wallet', 0, '105.112.97.219', '2020-03-25 12:30:27'),
(19, 'client', '12', 'Your Order has been place', '/vieworder/5', 'Your Order has been place', '5', 'order', 0, '41.190.3.137', '2020-05-07 11:11:11'),
(21, 'client', '12', 'Your Order has been place', '/vieworder/7', 'Your Order has been place', '7', 'order', 0, '41.190.2.246', '2020-05-07 14:47:48'),
(24, 'client', '13', 'Your Order has been place', '/vieworder/8', 'Your Order has been place', '8', 'order', 0, '105.112.98.158', '2020-05-07 16:15:44'),
(27, 'client', '16', 'Your Order has been place', '/vieworder/14', 'Your Order has been place', '14', 'order', 0, '105.112.101.8', '2020-08-20 23:43:18'),
(28, 'admin', NULL, 'New Client Registration', '/listclients/30', '  register as a client on affiliate Program on 2020-08-28 12:16:12', '30', 'client', 0, '41.190.31.32', '2020-08-28 12:16:12'),
(29, 'admin', NULL, 'New Order Generated by excellentdaily', '/vieworder/18', 'excellentdaily excellentdaily created a new order at affiliate Program on 2020-08-28 16:18:34', '18', 'order', 0, '129.205.113.200', '2020-08-28 16:18:34'),
(30, 'client', '19', 'Your Order has been place', '/vieworder/18', 'Your Order has been place', '18', 'order', 0, '129.205.113.200', '2020-08-28 16:18:34'),
(31, 'user', '5', 'New Order Generated by excellentdaily', '/vieworder/18', 'excellentdaily excellentdaily created a new order which you refered to him at affiliate Program on 2020-08-28 16:18:34', '18', 'order', 0, '129.205.113.200', '2020-08-28 16:18:34'),
(32, 'admin', NULL, 'New Order Generated by test', '/vieworder/20', 'test test2 created a new order at affiliate Program on 2020-08-29 03:39:29', '20', 'order', 0, '41.190.3.226', '2020-08-29 03:39:29'),
(33, 'client', '12', 'Your Order has been place', '/vieworder/20', 'Your Order has been place', '20', 'order', 0, '41.190.3.226', '2020-08-29 03:39:29'),
(34, 'admin', NULL, 'New Client Registration', '/listclients/31', '  register as a client on affiliate Program on 2020-09-03 06:52:43', '31', 'client', 0, '105.112.100.212', '2020-09-03 06:52:43'),
(35, 'admin', NULL, 'New Order Generated by test', '/vieworder/23', 'test test2 created a new order at affiliate Program on 2020-09-10 18:11:06', '23', 'order', 0, '105.112.101.9', '2020-09-10 18:11:06'),
(36, 'client', '12', 'Your Order has been place', '/vieworder/23', 'Your Order has been place', '23', 'order', 0, '105.112.101.9', '2020-09-10 18:11:06'),
(37, 'user', '3', 'New Order Generated by test', '/vieworder/23', 'test test2 created a new order which you refered to him at affiliate Program on 2020-09-10 18:11:06', '23', 'order', 0, '105.112.101.9', '2020-09-10 18:11:06'),
(38, 'admin', NULL, 'New Client Registration', '/listclients/32', '  register as a client on affiliate Program on 2020-09-10 18:20:31', '32', 'client', 0, '105.112.101.9', '2020-09-10 18:20:31'),
(39, 'admin', NULL, 'New Order Generated by excellentpas', '/vieworder/24', 'ExcellentPas MPCS created a new order at affiliate Program on 2020-09-10 18:20:44', '24', 'order', 1, '105.112.101.9', '2020-09-10 18:20:44'),
(40, 'client', '32', 'Your Order has been place', '/vieworder/24', 'Your Order has been place', '24', 'order', 0, '105.112.101.9', '2020-09-10 18:20:44'),
(41, 'user', '5', 'New Order Generated by excellentpas', '/vieworder/24', 'ExcellentPas MPCS created a new order which you refered to him at affiliate Program on 2020-09-10 18:20:44', '24', 'order', 0, '105.112.101.9', '2020-09-10 18:20:44'),
(42, 'admin', NULL, 'New Order Generated by test', '/vieworder/29', 'test test2 created a new order at affiliate Program on 2020-09-28 22:01:07', '29', 'order', 0, '105.112.115.254', '2020-09-28 22:01:07'),
(43, 'client', '12', 'Your Order has been place', '/vieworder/29', 'Your Order has been place', '29', 'order', 0, '105.112.115.254', '2020-09-28 22:01:07'),
(44, 'user', '3', 'New Order Generated by test', '/vieworder/29', 'test test2 created a new order which you refered to him at affiliate Program on 2020-09-28 22:01:07', '29', 'order', 0, '105.112.115.254', '2020-09-28 22:01:07'),
(45, 'admin', NULL, 'New Client Registration', '/listclients/33', '  register as a client on affiliate Program on 2020-10-01 11:50:20', '33', 'client', 0, '102.89.2.241', '2020-10-01 11:50:20'),
(46, 'admin', NULL, 'New Order Generated by thriftcan', '/vieworder/31', 'THRIFT COLLECTORS ASSOCIATION created a new order at affiliate Program on 2020-10-01 11:50:52', '31', 'order', 0, '102.89.2.241', '2020-10-01 11:50:52'),
(47, 'client', '33', 'Your Order has been place', '/vieworder/31', 'Your Order has been place', '31', 'order', 0, '102.89.2.241', '2020-10-01 11:50:52'),
(48, 'admin', NULL, 'New Client Registration', '/listclients/34', '  register as a client on affiliate Program on 2020-10-02 13:36:04', '34', 'client', 0, '105.112.102.113', '2020-10-02 13:36:04'),
(49, 'admin', NULL, 'New Client Registration', '/listclients/35', '  register as a client on affiliate Program on 2020-10-16 08:06:02', '35', 'client', 0, '197.210.64.225', '2020-10-16 08:06:02'),
(50, 'admin', NULL, 'New Order Generated by elawphonesng', '/vieworder/34', 'OGUNWALE OLAWALE created a new order at affiliate Program on 2020-10-16 08:06:48', '34', 'order', 0, '197.210.64.225', '2020-10-16 08:06:48'),
(51, 'client', '35', 'Your Order has been place', '/vieworder/34', 'Your Order has been place', '34', 'order', 0, '197.210.64.225', '2020-10-16 08:06:48'),
(52, 'admin', NULL, 'New Client Registration', '/listclients/36', '  register as a client on affiliate Program on 2020-11-01 11:31:44', '36', 'client', 1, '105.112.101.7', '2020-11-01 11:31:44'),
(53, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/6', 'POSIM - Mega Partner Banquest product is addded by admin in affiliate Program on 2020-11-09 06:05:36', '6', 'product', 1, '105.112.100.139', '2020-11-09 06:05:36'),
(54, 'admin', NULL, 'New Client Registration', '/listclients/40', '  register as a client on affiliate Program on 2020-11-18 00:05:09', '40', 'client', 0, '197.210.174.138', '2020-11-18 00:05:09'),
(55, 'admin', NULL, 'New Client Registration', '/listclients/41', '  register as a client on affiliate Program on 2020-11-26 09:08:16', '41', 'client', 0, '197.210.53.60', '2020-11-26 09:08:16'),
(56, 'admin', NULL, 'New Client Registration', '/listclients/42', '  register as a client on affiliate Program on 2021-01-28 08:54:04', '42', 'client', 0, '129.205.124.42', '2021-01-28 08:54:04'),
(57, 'admin', NULL, 'New Order Generated by Oseesene', '/vieworder/38', 'Ose Esene created a new order at affiliate Program on 2021-01-28 08:56:24', '38', 'order', 0, '129.205.124.42', '2021-01-28 08:56:24'),
(58, 'client', '42', 'Your Order has been place', '/vieworder/38', 'Your Order has been place', '38', 'order', 0, '129.205.124.42', '2021-01-28 08:56:24'),
(59, 'admin', NULL, 'New Product Added In Store', 'updateproduct/7', 'Comprehensive metabolic panel product is addded by xyzmedical in store on 2021-01-31 16:31:04', '7', 'vendor_product', 1, '102.89.3.248', '2021-01-31 16:31:04'),
(60, 'user', '43', 'Product Status Change to Approved', 'store_edit_product/7', 'Your product status changed by admin please review changes At 2021-01-31 16:33:32', '7', 'vendor_product', 0, '102.89.3.248', '2021-01-31 16:33:32'),
(61, 'admin', NULL, 'New Client Registration', '/listclients/44', '  register as a client on affiliate Program on 2021-02-08 09:23:38', '44', 'client', 1, '105.112.102.176', '2021-02-08 09:23:38'),
(62, 'admin', NULL, 'New Order Generated by Olowu', '/vieworder/40', 'Ezekiel Olowu created a new order at affiliate Program on 2021-02-08 09:24:54', '40', 'order', 1, '105.112.102.176', '2021-02-08 09:24:54'),
(63, 'client', '44', 'Your Order has been place', '/vieworder/40', 'Your Order has been place', '40', 'order', 0, '105.112.102.176', '2021-02-08 09:24:54'),
(64, 'user', '11', 'New Order Generated by Olowu', '/vieworder/40', 'Ezekiel Olowu created a new order which you refered to him at affiliate Program on 2021-02-08 09:24:54', '40', 'order', 1, '105.112.102.176', '2021-02-08 09:24:54'),
(65, 'admin', NULL, 'New Client Registration', '/listclients/45', '  register as a client on affiliate Program on 2021-02-08 09:36:33', '45', 'client', 0, '154.118.8.2', '2021-02-08 09:36:33'),
(66, 'admin', NULL, 'New Order Generated by Redwood', '/vieworder/41', 'Redwood Redwood created a new order at affiliate Program on 2021-02-08 09:37:59', '41', 'order', 1, '154.118.8.2', '2021-02-08 09:37:59'),
(67, 'client', '45', 'Your Order has been place', '/vieworder/41', 'Your Order has been place', '41', 'order', 0, '154.118.8.2', '2021-02-08 09:37:59'),
(68, 'user', '37', 'New Order Generated by Redwood', '/vieworder/41', 'Redwood Redwood created a new order which you refered to him at affiliate Program on 2021-02-08 09:37:59', '41', 'order', 1, '154.118.8.2', '2021-02-08 09:37:59'),
(69, 'user', 'all', 'New Product Added in Affiliate Program', '/listproduct/8', 'Antenatal Program product is addded by admin in affiliate Program on 2021-02-08 20:11:08', '8', 'product', 1, '102.89.3.64', '2021-02-08 20:11:08'),
(70, 'admin', NULL, 'New User Registration', '/userslist/55', 'Sajid Shah register as a  on affiliate Program on 2021-07-14 09:18:58', '55', 'user', 1, '::1', '2021-07-14 09:18:58'),
(71, 'admin', NULL, 'New User Registration', '/userslist/61', 'Syed Imtiaz Shah register as a  on affiliate Program on 2021-07-26 10:46:22', '61', 'user', 0, '39.34.187.155', '2021-07-26 10:46:22'),
(72, 'admin', NULL, 'New User Registration', '/userslist/62', 'Syed Imtiaz Shah register as a  on affiliate Program on 2021-07-26 12:09:22', '62', 'user', 0, '39.34.169.26', '2021-07-26 12:09:22'),
(73, 'admin', NULL, 'New User Registration', '/userslist/63', 'Sajid Shah register as a  on affiliate Program on 2021-07-26 12:29:53', '63', 'user', 0, '39.34.169.26', '2021-07-26 12:29:53'),
(74, 'admin', NULL, 'New User Registration', '/userslist/64', 'Sajid Shah register as a  on affiliate Program on 2021-07-26 12:31:08', '64', 'user', 0, '39.34.169.26', '2021-07-26 12:31:08'),
(75, 'admin', NULL, 'New User Registration', '/userslist/65', 'Sajid Shah register as a  on affiliate Program on 2021-07-26 12:37:15', '65', 'user', 0, '39.34.169.26', '2021-07-26 12:37:15'),
(76, 'admin', NULL, 'New User Registration', '/userslist/66', 'Syed Imtiaz Shah register as a  on affiliate Program on 2021-07-26 12:42:02', '66', 'user', 0, '39.34.169.26', '2021-07-26 12:42:02'),
(77, 'admin', NULL, 'New User Registration', '/userslist/67', 'Syed Imtiaz Shah register as a  on affiliate Program on 2021-07-26 12:43:23', '67', 'user', 0, '39.34.169.26', '2021-07-26 12:43:23'),
(78, 'admin', NULL, 'New User Registration', '/userslist/68', 'Sajid Shah register as a  on affiliate Program on 2021-07-26 12:44:02', '68', 'user', 0, '39.34.169.26', '2021-07-26 12:44:02'),
(79, 'admin', NULL, 'New Client Registration', '/listclients/69', '  register as a client on affiliate Program on 2021-07-30 07:40:43', '69', 'client', 0, '202.5.147.103', '2021-07-30 07:40:43'),
(80, 'admin', NULL, 'New User Registration', '/userslist/70', 'Sajid Shah register as a  on affiliate Program on 2021-08-02 06:18:33', '70', 'user', 0, '39.34.165.110', '2021-08-02 06:18:33'),
(81, 'admin', NULL, 'New User Registration', '/userslist/71', 'Sajid Hussain Shah register as a  on affiliate Program on 2021-08-02 06:19:44', '71', 'user', 0, '39.34.165.110', '2021-08-02 06:19:44'),
(82, 'admin', NULL, 'New User Registration', '/userslist/72', 'Syed Imtiaz Ahmed Shah register as a  on affiliate Program on 2021-08-02 06:20:48', '72', 'user', 0, '39.34.165.110', '2021-08-02 06:20:48'),
(83, 'admin', NULL, 'New User Registration', '/userslist/73', 'Awais Ali register as a  on affiliate Program on 2021-08-02 06:32:43', '73', 'user', 0, '39.34.165.110', '2021-08-02 06:32:43'),
(84, 'admin', NULL, 'New User Registration', '/userslist/74', 'Sajid Hussain Shah register as a  on affiliate Program on 2021-08-02 06:42:25', '74', 'user', 0, '39.34.165.110', '2021-08-02 06:42:25'),
(85, 'admin', NULL, 'New User Registration', '/userslist/75', 'Syed Imtiaz Ahmed Shah register as a  on affiliate Program on 2021-08-02 06:43:33', '75', 'user', 0, '39.34.165.110', '2021-08-02 06:43:33'),
(86, 'admin', NULL, 'New User Registration', '/userslist/76', 'Syed Imtiaz Shah register as a  on affiliate Program on 2021-08-02 06:44:34', '76', 'user', 0, '39.34.165.110', '2021-08-02 06:44:34'),
(87, 'admin', NULL, 'New User Registration', '/userslist/77', 'Sajid Jeelani register as a  on affiliate Program on 2021-08-02 06:56:27', '77', 'user', 0, '39.34.165.110', '2021-08-02 06:56:27'),
(88, 'admin', NULL, 'New User Registration', '/userslist/78', 'Sajid Shah register as a  on affiliate Program on 2021-08-03 11:34:54', '78', 'user', 0, '202.5.147.84', '2021-08-03 11:34:54'),
(89, 'admin', NULL, 'New User Registration', '/userslist/79', 'Sajid Shah register as a  on affiliate Program on 2021-08-05 09:31:19', '79', 'user', 0, '111.88.20.41', '2021-08-05 09:31:19'),
(90, 'admin', NULL, 'New User Registration', '/userslist/80', 'Uroosa Pota register as a  on affiliate Program on 2021-08-05 10:45:21', '80', 'user', 0, '39.34.160.176', '2021-08-05 10:45:21'),
(91, 'admin', NULL, 'New User Registration', '/userslist/81', 'Sajid Shah register as a  on affiliate Program on 2021-08-05 10:49:33', '81', 'user', 0, '39.34.160.176', '2021-08-05 10:49:33'),
(92, 'admin', NULL, 'New User Registration', '/userslist/82', 'Sajid Shah register as a  on affiliate Program on 2021-08-05 11:36:23', '82', 'user', 0, '39.34.160.176', '2021-08-05 11:36:23'),
(93, 'admin', NULL, 'New User Registration', '/userslist/83', 'Malik Ali register as a  on affiliate Program on 2021-08-05 13:08:49', '83', 'user', 0, '39.34.160.176', '2021-08-05 13:08:49'),
(94, 'admin', NULL, 'New User Registration', '/userslist/84', 'Sajid Shah register as a  on affiliate Program on 2021-08-06 04:47:45', '84', 'user', 0, '39.34.189.58', '2021-08-06 04:47:45'),
(95, 'admin', NULL, 'New User Registration', '/userslist/85', 'Sajid Shah register as a  on affiliate Program on 2021-08-06 12:02:36', '85', 'user', 0, '39.34.191.248', '2021-08-06 12:02:36'),
(96, 'admin', NULL, 'New User Registration', '/userslist/86', 'Sajid Shah register as a  on affiliate Program on 2021-08-09 11:19:45', '86', 'user', 0, '202.5.145.117', '2021-08-09 11:19:45'),
(97, 'admin', NULL, 'New User Registration', '/userslist/87', 'Sajid Shah register as a  on affiliate Program on 2021-08-09 11:26:50', '87', 'user', 0, '202.5.145.117', '2021-08-09 11:26:50'),
(98, 'admin', NULL, 'New User Registration', '/userslist/88', 'Sajid Shah register as a  on affiliate Program on 2021-08-09 11:39:42', '88', 'user', 0, '202.5.145.117', '2021-08-09 11:39:42'),
(99, 'admin', NULL, 'New User Registration', '/userslist/89', 'Sajid Shah register as a  on affiliate Program on 2021-08-09 12:11:13', '89', 'user', 0, '202.5.145.117', '2021-08-09 12:11:13'),
(100, 'admin', NULL, 'New Client Registration', '/listclients/90', '  register as a client on affiliate Program on 2021-08-11 06:09:13', '90', 'client', 0, '111.88.17.210', '2021-08-11 06:09:13'),
(101, 'admin', NULL, 'New Client Registration', '/listclients/91', '  register as a client on affiliate Program on 2021-08-12 09:45:01', '91', 'client', 0, '39.34.171.19', '2021-08-12 09:45:01'),
(102, 'admin', NULL, 'New Client Registration', '/listclients/92', '  register as a client on affiliate Program on 2021-08-12 11:23:21', '92', 'client', 0, '39.34.171.19', '2021-08-12 11:23:21'),
(103, 'admin', NULL, 'New Order Generated by ', '/vieworder/42', '  created a new order at affiliate Program on 2021-08-12 12:16:20', '42', 'order', 0, '39.34.171.19', '2021-08-12 12:16:20'),
(104, 'client', NULL, 'Your Order has been place', '/vieworder/42', 'Your Order has been place', '42', 'order', 0, '39.34.171.19', '2021-08-12 12:16:20'),
(105, 'admin', NULL, 'New Order Generated by ', '/vieworder/43', '  created a new order at affiliate Program on 2021-08-12 12:25:00', '43', 'order', 0, '39.34.171.19', '2021-08-12 12:25:00'),
(106, 'client', NULL, 'Your Order has been place', '/vieworder/43', 'Your Order has been place', '43', 'order', 0, '39.34.171.19', '2021-08-12 12:25:00'),
(107, 'admin', NULL, 'New Client Registration', '/listclients/93', '  register as a client on affiliate Program on 2021-08-13 06:23:11', '93', 'client', 0, '39.34.186.46', '2021-08-13 06:23:11'),
(108, 'admin', NULL, 'New Order Generated by sajidjeelani', '/vieworder/44', 'Sajid Shah created a new order at affiliate Program on 2021-08-13 06:23:35', '44', 'order', 0, '39.34.186.46', '2021-08-13 06:23:35'),
(109, 'client', '93', 'Your Order has been place', '/vieworder/44', 'Your Order has been place', '44', 'order', 0, '39.34.186.46', '2021-08-13 06:23:35'),
(110, 'admin', NULL, 'New Order Generated by sajidjeelani', '/vieworder/1', 'Sajid Shah created a new order at affiliate Program on 2021-08-13 08:48:34', '1', 'order', 0, '39.34.186.46', '2021-08-13 08:48:34'),
(111, 'client', '93', 'Your Order has been place', '/vieworder/1', 'Your Order has been place', '1', 'order', 0, '39.34.186.46', '2021-08-13 08:48:34'),
(112, 'admin', NULL, 'New Order Generated by sajidjeelani', '/vieworder/2', 'Sajid Shah created a new order at affiliate Program on 2021-08-13 12:24:11', '2', 'order', 0, '39.34.163.55', '2021-08-13 12:24:11'),
(113, 'client', '93', 'Your Order has been place', '/vieworder/2', 'Your Order has been place', '2', 'order', 0, '39.34.163.55', '2021-08-13 12:24:11'),
(114, 'admin', NULL, 'New User Registration', '/userslist/94', 'Sajid Shah register as a  on affiliate Program on 2021-08-16 12:53:12', '94', 'user', 0, '39.34.172.230', '2021-08-16 12:53:12'),
(115, 'admin', NULL, 'New User Registration', '/userslist/95', 'John Carlo register as a  on affiliate Program on 2021-08-16 12:54:36', '95', 'user', 0, '39.34.172.230', '2021-08-16 12:54:36'),
(116, 'admin', NULL, 'New User Registration', '/userslist/96', 'Mera Model register as a  on affiliate Program on 2021-08-18 11:17:22', '96', 'user', 0, '111.88.229.209', '2021-08-18 11:17:22'),
(117, 'admin', NULL, 'New User Registration', '/userslist/97', 'shahjee shahjee register as a  on affiliate Program on 2021-08-23 07:13:35', '97', 'user', 0, '202.5.146.40', '2021-08-23 07:13:35'),
(118, 'admin', NULL, 'New User Registration', '/userslist/98', 'Sajid Shah register as a  on affiliate Program on 2021-08-27 06:46:29', '98', 'user', 0, '39.34.164.253', '2021-08-27 06:46:29'),
(119, 'admin', NULL, 'New User Registration', '/userslist/99', 'Sajid Shah register as a  on affiliate Program on 2021-08-30 06:41:57', '99', 'user', 0, '202.5.146.29', '2021-08-30 06:41:57'),
(120, 'admin', NULL, 'New Order Generated by shsjeelani', '/vieworder/3', 'Sajid Shah created a new order at affiliate Program on 2021-08-30 07:37:32', '3', 'order', 0, '39.34.171.242', '2021-08-30 07:37:32'),
(121, 'client', '99', 'Your Order has been place', '/vieworder/3', 'Your Order has been place', '3', 'order', 0, '39.34.171.242', '2021-08-30 07:37:32'),
(122, 'admin', NULL, 'New User Registration', '/userslist/100', 'designers_own designers_own register as a  on affiliate Program on 2021-08-30 07:55:55', '100', 'user', 0, '39.34.171.242', '2021-08-30 07:55:55'),
(123, 'admin', NULL, 'New User Registration', '/userslist/107', 'sajidjeelani sajidjeelani register as a  on affiliate Program on 2021-08-30 09:32:22', '107', 'user', 0, '39.34.171.242', '2021-08-30 09:32:22'),
(124, 'admin', NULL, 'New User Registration', '/userslist/110', 'sajidjeelani12 sajidjeelani12 register as a  on affiliate Program on 2021-08-30 09:59:22', '110', 'user', 0, '39.34.171.242', '2021-08-30 09:59:22'),
(125, 'admin', NULL, 'New User Registration', '/userslist/111', 'Sajid Shah register as a  on affiliate Program on 2021-08-30 10:07:01', '111', 'user', 0, '39.34.171.242', '2021-08-30 10:07:01'),
(126, 'admin', NULL, 'New User Registration', '/userslist/112', 'Sajid Shah register as a  on affiliate Program on 2021-08-30 10:11:34', '112', 'user', 0, '39.34.171.242', '2021-08-30 10:11:34'),
(127, 'admin', NULL, 'New User Registration', '/userslist/113', 'Sajid Shah register as a  on affiliate Program on 2021-08-30 10:12:58', '113', 'user', 0, '39.34.171.242', '2021-08-30 10:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `shipping_cost` double NOT NULL,
  `total` double NOT NULL,
  `coupon_discount` double NOT NULL,
  `total_commition` double NOT NULL,
  `shipping_charge` double NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `allow_shipping` int(11) NOT NULL DEFAULT 1,
  `ip` varchar(30) DEFAULT NULL,
  `country_code` varchar(20) NOT NULL,
  `files` text NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `status`, `txn_id`, `user_id`, `address`, `country_id`, `state_id`, `city`, `zip_code`, `phone`, `payment_method`, `shipping_cost`, `total`, `coupon_discount`, `total_commition`, `shipping_charge`, `currency_code`, `allow_shipping`, `ip`, `country_code`, `files`, `comment`, `created_at`) VALUES
(1, 1, '', 93, '', 0, 0, '', '', '', 'Bank Transfer', 0, 22500, 0, 0, 0, 'NGN', 0, '39.34.186.46', 'PK', '[]', 'null', '2021-08-13 08:48:32'),
(2, 7, '', 93, '', 0, 0, '', '', '', 'Bank Transfer', 0, 27000, 0, 0, 0, 'NGN', 0, '39.34.163.55', 'PK', '[]', 'null', '2021-08-13 12:23:59'),
(3, 7, '', 99, '', 0, 0, '', '', '', 'Bank Transfer', 0, 1, 0, 0, 0, 'NGN', 0, '39.34.171.242', 'PK', '[]', 'null', '2021-08-30 07:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders_history`
--

CREATE TABLE `orders_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_mode` varchar(20) NOT NULL DEFAULT 'paypal',
  `history_type` varchar(20) NOT NULL DEFAULT 'payment',
  `paypal_status` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_history`
--

INSERT INTO `orders_history` (`id`, `order_id`, `payment_mode`, `history_type`, `paypal_status`, `comment`, `created_at`, `order_status_id`) VALUES
(1, 1, 'Bank Transfer', 'payment', 'Processed', '[]', '2021-08-13 08:48:34', 7),
(2, 1, 'Bank Transfer', 'order', 'Processed', 'WEMA BANK \r\n\r\nA/C NO: 0122878664\r\nA/C NAME: FIGTEC CONCEPTS LIMITED\r\n', '2021-08-13 08:48:34', 7),
(3, 1, '', 'order', '12', 'Please send payments to conform', '2021-08-13 11:39:22', 12),
(4, 1, '', 'order', '1', 'Order Delivered.', '2021-08-13 11:41:20', 1),
(5, 2, 'Bank Transfer', 'payment', 'Processed', '[]', '2021-08-13 12:24:11', 7),
(6, 2, 'Bank Transfer', 'order', 'Processed', 'WEMA BANK \r\n\r\nA/C NO: 0122878664\r\nA/C NAME: FIGTEC CONCEPTS LIMITED\r\n', '2021-08-13 12:24:11', 7),
(7, 3, 'Bank Transfer', 'payment', 'Processed', '[]', '2021-08-30 07:37:32', 7),
(8, 3, 'Bank Transfer', 'order', 'Processed', 'WEMA BANK \r\n\r\nA/C NO: 0122878664\r\nA/C NAME: FIGTEC CONCEPTS LIMITED\r\n', '2021-08-30 07:37:32', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `refer_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `commission` double NOT NULL,
  `commission_type` varchar(20) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `coupon_discount` double NOT NULL DEFAULT 0,
  `allow_shipping` int(11) NOT NULL DEFAULT 1,
  `admin_commission_type` varchar(200) DEFAULT NULL,
  `admin_commission` double(22,0) DEFAULT 0,
  `vendor_commission_type` varchar(200) DEFAULT NULL,
  `vendor_commission` double(22,0) DEFAULT 0,
  `vendor_id` int(11) DEFAULT NULL,
  `msrp` double NOT NULL,
  `variation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `refer_id`, `form_id`, `price`, `total`, `quantity`, `commission`, `commission_type`, `coupon_code`, `coupon_name`, `coupon_discount`, `allow_shipping`, `admin_commission_type`, `admin_commission`, `vendor_commission_type`, `vendor_commission`, `vendor_id`, `msrp`, `variation`) VALUES
(1, 1, 8, 0, 0, 4500, 22500, 5, 2500, 'fixed', '', '', 0, 0, '', 0, '', 0, 0, 0, 'null'),
(2, 2, 8, 0, 0, 4500, 27000, 6, 2500, 'fixed', '', '', 0, 0, '', 0, '', 0, 0, 0, 'null'),
(3, 3, 4, 0, 0, 1, 1, 1, 0.03333, 'percentage (3.333%)', '', '', 0, 0, '', 0, '', 0, 0, 0, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `order_proof`
--

CREATE TABLE `order_proof` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `proof` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_theme`
--

CREATE TABLE `pagebuilder_theme` (
  `theme_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_theme_page`
--

CREATE TABLE `pagebuilder_theme_page` (
  `theme_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_tab` int(11) NOT NULL DEFAULT 0,
  `meta_tag_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `design` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('theresachukwuonye@gmail.com', 'bad5f4b0380e95697f13435b4e9cdc52', '2020-09-29 14:11:59'),
('info@elawphonesng.com', 'ac1fc7db705e443717bd2e08b341eb55', '2021-02-06 15:33:57'),
('sajidjeelani@yahoo.com', '66659fb5527a1782ec92b36ea7e100ff', '2021-08-11 06:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `payment_id` int(11) NOT NULL,
  `payment_bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_account_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_account_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_ifsc_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_ipaddress` varchar(20) CHARACTER SET utf8 NOT NULL,
  `payment_created_date` datetime NOT NULL,
  `payment_updated_date` datetime NOT NULL,
  `payment_created_by` int(11) NOT NULL,
  `payment_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_detail`
--

INSERT INTO `payment_detail` (`payment_id`, `payment_bank_name`, `payment_account_number`, `payment_account_name`, `payment_ifsc_code`, `payment_status`, `payment_ipaddress`, `payment_created_date`, `payment_updated_date`, `payment_created_by`, `payment_updated_by`) VALUES
(1, 'First Bank', '0033648081', 'Ray Osumili', '11111', 1, '105.112.97.140', '2020-02-29 05:00:59', '2020-03-15 11:29:26', 3, 3),
(2, 'union bank', '0054791959', 'olowu Ezekiel', '22383358819', 1, '105.112.97.219', '2020-03-25 12:27:52', '0000-00-00 00:00:00', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_accounts`
--

CREATE TABLE `paypal_accounts` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal_accounts`
--

INSERT INTO `paypal_accounts` (`id`, `paypal_email`, `user_id`) VALUES
(1, 'ezekielolowu11@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text NOT NULL,
  `product_short_description` varchar(500) NOT NULL,
  `product_price` double NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_share_count` varchar(255) NOT NULL,
  `product_click_count` int(11) DEFAULT 0,
  `product_view_count` int(11) DEFAULT 0,
  `product_sales_count` int(11) DEFAULT 0,
  `product_featured_image` text NOT NULL,
  `product_banner` text NOT NULL,
  `product_video` text NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_commision_type` varchar(255) NOT NULL,
  `product_commision_value` double NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_ipaddress` varchar(20) NOT NULL,
  `product_created_date` datetime NOT NULL,
  `product_updated_date` datetime NOT NULL,
  `product_created_by` int(11) NOT NULL,
  `product_updated_by` int(11) NOT NULL,
  `product_click_commision_type` varchar(10) NOT NULL,
  `product_click_commision_ppc` double NOT NULL,
  `product_click_commision_per` double NOT NULL,
  `product_total_commission` varchar(255) DEFAULT '0',
  `product_recursion_type` varchar(255) NOT NULL,
  `product_recursion` varchar(255) NOT NULL,
  `recursion_custom_time` bigint(20) NOT NULL,
  `recursion_endtime` datetime DEFAULT NULL,
  `view` int(11) NOT NULL,
  `on_store` int(11) NOT NULL DEFAULT 0,
  `downloadable_files` text NOT NULL,
  `allow_shipping` int(11) NOT NULL DEFAULT 1,
  `allow_upload_file` int(11) NOT NULL,
  `allow_comment` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `product_avg_rating` int(11) NOT NULL DEFAULT 0,
  `product_msrp` double NOT NULL,
  `product_tags` text NOT NULL,
  `product_variations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_short_description`, `product_price`, `product_sku`, `product_slug`, `product_share_count`, `product_click_count`, `product_view_count`, `product_sales_count`, `product_featured_image`, `product_banner`, `product_video`, `product_type`, `product_commision_type`, `product_commision_value`, `product_status`, `product_ipaddress`, `product_created_date`, `product_updated_date`, `product_created_by`, `product_updated_by`, `product_click_commision_type`, `product_click_commision_ppc`, `product_click_commision_per`, `product_total_commission`, `product_recursion_type`, `product_recursion`, `recursion_custom_time`, `recursion_endtime`, `view`, `on_store`, `downloadable_files`, `allow_shipping`, `allow_upload_file`, `allow_comment`, `state_id`, `product_avg_rating`, `product_msrp`, `product_tags`, `product_variations`) VALUES
(2, 'School management system termly subscription', '<p>Features embedded on school management system.</p><p>1. Student admission </p><p>2. School fees online and offline</p><p>3. School online result.</p><p>4. homework and assignment</p><p>5. Excursion video and event video upload</p><p>6. Sell access to parents and make profit as a school proprietor</p><p><br></p>', 'Subscribe to our school management system here for just N10,000. You will enjoy all the packages. ', 10000, 'sch-sub', 'school-management-system-termly-subscription-sch-sub-2', '', 0, 0, 0, 'zvHNpgqCWtjSyro0Rw5dFnYVXmOED7cx.png', '', '', 'virtual', 'fixed', 1500, 1, '41.190.31.114', '2020-05-08 20:32:50', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', 'default', '', 0, NULL, 133, 1, '[]', 0, 0, 0, NULL, 0, 0, '', ''),
(3, 'POSIM  basic', '<p>What is MYPOS app?</p><p>1. An app for your inventory.</p><p>2. To manage your stock , wholesale or retail.</p><p>3. To get services record.</p><p>4. To collect payment from customers.</p><p>5. To give e-receipt , print receipt or sms as receipt.</p><p>6. For your sales personnel to sell even when you are not there.</p><p><br></p><p>Who is this app meant for ?</p><p>1. Publishers</p><p>2. wholesalers</p><p>3. Retailers</p><p>4. Schools</p><p>5. Shops</p><p>6. Dispatch services</p><p>7. Transport companies/</p><p>Any business that accept cash or bank transfers</p>', 'Get your online point of sale and see your business make huge profit.', 3500, 'pos', 'mypos-app-pos-3', '', 0, 0, 0, 'U2k9hjRJoZuXgI0OSnTf87tdr5v1xePQ.png', '', '', 'virtual', 'fixed', 1000, 1, '41.190.3.226', '2020-08-29 02:38:18', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', '', '', 0, NULL, 159, 1, '[]', 0, 0, 0, 0, 0, 0, '', ''),
(4, 'Bulk sms unit', '<p>Get Bulk sms and use it for Bankon3,  school management system and  POSIM. You can use it for any other business. All sms cost N3.00.</p><p><br></p><p>Bankon3</p><p>For more than 1 branch, specify the branch, the amount for each branch and send to sales@app3star.com.</p><p><br></p><p>For POSIM</p><p>Send sms quoting business to sales@app3star.com</p><p><br></p><p>Do not like sending sms after sales, then use ussd with your phone and pay for sms, add , one hundred Naira to the amount and send using your reserved account. Get one here.</p>', 'A unit of SMS is N1.00. You can only buy 500 quantity and above using this platform. Just change the quantity to your desired number you need.', 1, 'Bs', 'bulk-sms-unit-bs-4', '', 0, 0, 0, '36kSaFlTYzyGK0hm17QruDnNLMgHI5dj.jpg', '', '', 'virtual', 'percentage', 3.333, 1, '41.190.3.226', '2020-08-29 03:37:31', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', '', '', 0, NULL, 199, 1, '[]', 0, 0, 0, 0, 0, 0, '', ''),
(5, 'POSIM - REGULAR DOUBLE', '<p>What is MYPOS app?</p><p>1. An app for your inventory.</p><p>2. To manage your stock , wholesale or retail.</p><p>3. To get services record.</p><p>4. To collect payment from customers.</p><p>5. To give e-receipt , print receipt or sms as receipt.</p><p>6. For your sales personnel to sell even when you are not there.</p><p><br></p><p>Who is this app meant for ?</p><p>1. Publishers</p><p>2. wholesalers</p><p>3. Retailers</p><p>4. Schools</p><p>5. Shops</p><p>6. Dispatch services</p><p>7. Transport companies/</p><p>Any business that accept cash or bank transfers</p>', 'Get your online point of sale and see your business make huge profit.', 10000, 'posim2', 'mypos-app-pos-3', '', 0, 0, 0, 'U2k9hjRJoZuXgI0OSnTf87tdr5v1xePQ.png', '', '', 'virtual', 'fixed', 2000, 1, '41.190.2.64', '2020-08-27 17:58:01', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', '', '', 0, NULL, 25, 1, '[]', 0, 0, 0, 0, 0, 0, '', ''),
(6, 'POSIM - Mega Partner Banquest', '<p>Point of sale Regular is the a year subscription for mega partner sales where mega partners get a 100% of the sales they make.</p>', 'POSIM one year subscription credited to mega Partners', 3500, 'BPosim', 'posim-mega-partner-banquest-bposim-6', '', 0, 0, 0, 'PJ6ScwWXHVKtspnBi9bZ81q3vDurkYdF.png', '', '', 'virtual', 'fixed', 3500, 1, '105.112.100.139', '2020-11-09 06:32:25', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', '', '', 0, NULL, 2, 0, '[]', 0, 0, 0, 0, 0, 0, '', ''),
(7, 'Comprehensive metabolic panel', '<p><strong xss=removed>Comprehensive metabolic panel</strong><br></p>', 'Comprehensive metabolic panel', 30000, 'cpm', 'comprehensive-metabolic-panel-7', '', 0, 0, 0, 'Jm2wVFpjn8iSvlX3LYsBU6P9NryfRWKA.jpg', '', '', 'virtual', '', 0, 1, '102.89.3.248', '2021-01-31 16:33:32', '0000-00-00 00:00:00', 1, 0, '', 0, 0, '0', '', '', 0, NULL, 9, 1, '[]', 1, 0, 0, 0, 0, 0, 'null', 'null'),
(8, 'Antenatal Program', '<p>Antenatal program is Anchored by our specialist</p>', 'For Women who are pregnant', 4500, 'ante1', 'antenatal-program-8', '', 0, 0, 0, '8VsQlqZvG6Itp03dEfakFm4JhYoArjui.jpg', '', '', 'virtual', 'fixed', 2500, 1, '102.89.3.64', '2021-02-08 20:11:08', '0000-00-00 00:00:00', 1, 0, 'default', 0, 0, '0', '', '', 0, NULL, 44, 1, '[]', 0, 0, 0, 0, 0, 0, '[\"Antenatal\",\"vhms247\",\"pregnant women\"]', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `productslog`
--

CREATE TABLE `productslog` (
  `productslog_id` int(11) NOT NULL,
  `productslog_user_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `productslog_status` int(11) DEFAULT NULL,
  `productslog_click` int(11) DEFAULT NULL,
  `productslog_view` int(11) DEFAULT NULL,
  `productslog_referrer` text CHARACTER SET utf8 DEFAULT NULL,
  `productslog_user_agent` text CHARACTER SET utf8 DEFAULT NULL,
  `productslog_os` text CHARACTER SET utf8 DEFAULT NULL,
  `productslog_browser` text CHARACTER SET utf8 DEFAULT NULL,
  `productslog_isp` text CHARACTER SET utf8 DEFAULT NULL,
  `productslog_ipaddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `productslog_created_by` int(11) DEFAULT NULL,
  `productslog_updated_by` int(11) DEFAULT NULL,
  `productslog_created` datetime DEFAULT NULL,
  `productslog_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_action`
--

CREATE TABLE `product_action` (
  `action_id` int(11) NOT NULL,
  `action_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `pay_commition` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `country_code` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_action`
--

INSERT INTO `product_action` (`action_id`, `action_type`, `product_id`, `user_id`, `user_ip`, `viewer_id`, `counter`, `pay_commition`, `created_at`, `country_code`) VALUES
(1, 'click', 4, 5, '105.112.102.1', 0, 13, 0, '2020-08-22 07:59:06', 'NG'),
(2, 'click', 4, 5, '66.102.8.69', 0, 1, 0, '2020-08-22 10:01:43', 'US'),
(3, 'click', 4, 5, '129.205.113.200', 0, 1, 0, '2020-08-28 04:11:07', 'NG'),
(4, 'click', 4, 5, '66.102.8.73', 0, 1, 0, '2020-08-28 04:13:43', 'US'),
(5, 'click', 4, 5, '129.205.124.54', 0, 2, 0, '2020-09-10 12:14:42', 'NG'),
(6, 'click', 4, 5, '105.112.104.220', 0, 1, 0, '2020-09-26 11:06:46', 'NG'),
(7, 'click', 4, 3, '105.112.115.254', 0, 2, 0, '2020-09-28 10:14:55', 'NG'),
(8, 'click', 4, 3, '154.118.8.141', 0, 1, 0, '2020-09-29 01:02:29', 'NG'),
(9, 'click', 3, 11, '105.112.98.167', 0, 1, 0, '2020-10-02 06:16:06', 'NG'),
(10, 'click', 3, 3, '154.120.97.236', 0, 1, 0, '2020-10-26 01:39:14', 'NG'),
(11, 'click', 3, 3, '197.210.174.138', 0, 1, 0, '2020-11-17 11:59:13', 'NG'),
(12, 'click', 2, 3, '197.210.174.138', 0, 1, 0, '2020-11-18 12:00:09', 'NG'),
(13, 'click', 4, 3, '197.210.174.74', 0, 1, 0, '2020-11-18 12:11:51', 'NG'),
(14, 'click', 7, 43, '31.13.103.24', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(15, 'click', 7, 43, '31.13.103.6', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(16, 'click', 7, 43, '31.13.103.14', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(17, 'click', 2, 37, '41.217.102.248', 0, 4, 0, '2021-02-01 01:34:24', 'NG'),
(18, 'click', 2, 37, '154.118.8.2', 0, 1, 0, '2021-02-08 09:16:43', 'NG'),
(19, 'click', 2, 11, '105.112.102.176', 0, 1, 0, '2021-02-08 09:24:06', 'NG'),
(20, 'click', 8, 43, '197.210.29.253', 0, 2, 0, '2021-02-14 12:26:14', 'NG');

-- --------------------------------------------------------

--
-- Table structure for table `product_action_admin`
--

CREATE TABLE `product_action_admin` (
  `action_id` int(11) NOT NULL,
  `action_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `pay_commition` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `country_code` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_action_admin`
--

INSERT INTO `product_action_admin` (`action_id`, `action_type`, `product_id`, `user_id`, `user_ip`, `viewer_id`, `counter`, `pay_commition`, `created_at`, `country_code`) VALUES
(1, 'click', 7, 1, '31.13.103.24', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(2, 'click', 7, 1, '31.13.103.6', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(3, 'click', 7, 1, '31.13.103.14', 0, 1, 0, '2021-01-31 04:39:40', 'IE'),
(4, 'click', 2, 1, '41.217.102.248', 0, 1, 0, '2021-02-01 01:34:24', 'NG'),
(5, 'click', 2, 1, '154.118.8.2', 0, 1, 0, '2021-02-08 09:16:43', 'NG'),
(6, 'click', 2, 1, '105.112.102.176', 0, 1, 0, '2021-02-08 09:24:06', 'NG'),
(7, 'click', 8, 1, '197.210.29.253', 0, 1, 0, '2021-02-14 12:26:14', 'NG');

-- --------------------------------------------------------

--
-- Table structure for table `product_affiliate`
--

CREATE TABLE `product_affiliate` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_sale_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `admin_commission_value` double(22,0) DEFAULT 0,
  `admin_click_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `admin_click_amount` double(22,0) DEFAULT 0,
  `admin_click_count` int(11) DEFAULT NULL,
  `affiliate_sale_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `affiliate_commission_value` double(22,0) DEFAULT 0,
  `affiliate_click_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `affiliate_click_count` int(11) DEFAULT NULL,
  `affiliate_click_amount` double(22,0) DEFAULT 0,
  `comment` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_affiliate`
--

INSERT INTO `product_affiliate` (`id`, `product_id`, `user_id`, `admin_sale_commission_type`, `admin_commission_value`, `admin_click_commission_type`, `admin_click_amount`, `admin_click_count`, `affiliate_sale_commission_type`, `affiliate_commission_value`, `affiliate_click_commission_type`, `affiliate_click_count`, `affiliate_click_amount`, `comment`) VALUES
(1, 7, 43, 'default', 0, 'default', 0, 0, 'fixed', 200, 'fixed', 0, 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
(2, 1, '1'),
(8, 2, '2'),
(21, 5, '3'),
(22, 3, '3'),
(25, 4, '4'),
(28, 6, '3'),
(30, 7, '7'),
(31, 8, '8');

-- --------------------------------------------------------

--
-- Table structure for table `product_media_upload`
--

CREATE TABLE `product_media_upload` (
  `product_media_upload_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_media_upload_type` varchar(255) DEFAULT NULL,
  `product_media_upload_path` varchar(255) DEFAULT NULL,
  `product_media_upload_video_image` varchar(255) DEFAULT 'no-image.jpg',
  `product_media_upload_status` varchar(255) DEFAULT NULL,
  `product_media_upload_ipaddress` varchar(20) DEFAULT NULL,
  `product_media_upload_created_date` datetime DEFAULT NULL,
  `product_media_upload_created_by` varchar(255) DEFAULT NULL,
  `product_media_upload_os` text DEFAULT NULL,
  `product_media_upload_browser` text DEFAULT NULL,
  `product_media_upload_isp` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_user_id` int(11) DEFAULT NULL,
  `rating_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rating_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `rating_status` int(11) DEFAULT NULL,
  `rating_number` int(11) NOT NULL,
  `rating_comments` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_referrer` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_user_agent` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_os` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_browser` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_isp` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_ipaddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rating_created_by` int(11) DEFAULT NULL,
  `rating_updated_by` int(11) DEFAULT NULL,
  `rating_created` datetime DEFAULT NULL,
  `rating_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refer_market_action`
--

CREATE TABLE `refer_market_action` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text CHARACTER SET utf8 DEFAULT NULL,
  `commission` double(22,0) NOT NULL DEFAULT 0,
  `count_for` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refer_product_action`
--

CREATE TABLE `refer_product_action` (
  `action_id` int(11) NOT NULL,
  `action_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `pay_commition` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `count_for` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `refer_product_action`
--

INSERT INTO `refer_product_action` (`action_id`, `action_type`, `product_id`, `user_id`, `user_ip`, `viewer_id`, `counter`, `pay_commition`, `created_at`, `count_for`) VALUES
(1, 'click', 3, 11, '105.112.98.167', 0, 1, 1, '2020-10-02 06:16:06', '10'),
(2, 'click', 2, 37, '41.217.102.248', 0, 1, 1, '2021-02-01 01:34:24', '10'),
(3, 'click', 2, 37, '154.118.8.2', 0, 1, 1, '2021-02-08 09:16:43', '10'),
(4, 'click', 2, 11, '105.112.102.176', 0, 1, 1, '2021-02-08 09:24:06', '10');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` mediumtext DEFAULT NULL,
  `setting_type` varchar(255) DEFAULT NULL,
  `setting_status` int(11) NOT NULL,
  `setting_ipaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_key`, `setting_value`, `setting_type`, `setting_status`, `setting_ipaddress`) VALUES
(1, 'name', 'Afrocentric', 'site', 1, '39.34.160.60'),
(2, 'notify_email', 'notification@afrocentric.com', 'site', 1, '39.34.160.60'),
(3, 'footer', 'Copyright @ 2021. All rights reserved.', 'site', 1, '39.34.160.60'),
(4, 'meta_description', 'Afrocentric, your description', 'site', 1, '39.34.160.60'),
(5, 'meta_keywords', 'Afrocentric, your keywords', 'site', 1, '39.34.160.60'),
(6, 'meta_author', 'Afrocentric Pvt ltd', 'site', 1, '39.34.160.60'),
(7, 'google_analytics', '', 'site', 1, '39.34.160.60'),
(8, 'logo', 'Dei4vQVCMyr5fAszw38PRamGjH7ISl9O.png', 'site', 1, '::1'),
(9, 'api_username', 'Paypal API USERNAME', 'paymentsetting', 1, '77.125.48.104'),
(10, 'api_password', 'Paypal API PASSWORD', 'paymentsetting', 1, '77.125.48.104'),
(11, 'api_signature', 'Paypal API SIGNATURE', 'paymentsetting', 1, '77.125.48.104'),
(12, 'payment_currency', 'USD', 'paymentsetting', 1, '77.125.48.104'),
(13, 'product_commission_type', '', 'productsetting', 1, '::1'),
(14, 'product_commission', '', 'productsetting', 1, '::1'),
(15, 'product_ppc', '', 'productsetting', 1, '::1'),
(16, 'product_noofpercommission', '', 'productsetting', 1, '::1'),
(17, 'heading', 'Why You Need This Affiliate Script To Your Online Business ?    ', 'login', 1, '77.126.80.25'),
(18, 'affiliate_commission_type', '', 'affiliateprogramsetting', 1, '150.107.232.115'),
(19, 'affiliate_commission', '', 'affiliateprogramsetting', 1, '150.107.232.115'),
(20, 'affiliate_ppc', '', 'affiliateprogramsetting', 1, '150.107.232.115'),
(21, 'from_email', '', 'email', 1, '39.34.160.60'),
(22, 'from_name', '', 'email', 1, '39.34.160.60'),
(23, 'smtp_hostname', '', 'email', 1, '39.34.160.60'),
(24, 'smtp_username', '', 'email', 1, '39.34.160.60'),
(25, 'smtp_password', '', 'email', 1, '39.34.160.60'),
(26, 'smtp_port', '', 'email', 1, '39.34.160.60'),
(27, 'heading', 'Affiliate Terms & Condition', 'tnc', 1, '39.34.160.60'),
(28, 'content', '<p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><div><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p></div><div><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p></div><div><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p><p>TERM AND CONDITION TERM AND CONDITIONÂ  TERM AND CONDITION TERM AND CONDITION</p></div><div><br></div>', 'tnc', 1, '39.34.160.60'),
(29, 'payment_mode', 'sandbox', 'paymentsetting', 1, '77.125.48.104'),
(30, 'text_list', '', 'login', 1, '103.251.19.60'),
(31, 'name', 'Afrocentric', 'store', 1, '::1'),
(32, 'title', 'Welcome To App3star Registration and subscription store', 'store', 1, '105.112.96.38'),
(33, 'content', '<p><font color=\"#333333\">App3star products and services</font></p>', 'store', 1, '105.112.96.38'),
(34, 'footer', 'Afrocentric © ALL RIGHTS RESERVED', 'store', 1, '::1'),
(35, 'about_content', '<p>app3star content</p>', 'store', 1, '::1'),
(36, 'contact_content', '<p>app3star page</p>', 'store', 1, '::1'),
(37, 'policy_content', '<p>app3star page</p><p></p>', 'store', 1, '::1'),
(38, 'logo', 'TiXqzt0ZBdp5VDfFmHLlgUasoWwYPb8S.png', 'store', 1, '::1'),
(39, 'sale_commition', '', 'referlevel_3', 1, '45.41.132.41'),
(40, 'favicon', 'TiXqzt0ZBdp5VDfFmHLlgUasoWwYPb8S1.png', 'store', 1, '::1'),
(41, 'content', '<div class=\"head container\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px 0.7145rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 20px; line-height: inherit; font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" background:=\"\" url(\"data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23e4e4e4%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m187.2%2c170l157%2c141.4c3.5-6.4%2c5.7-13.6%2c5.7-21.4c0-24.8-20.1-44.9-44.9-44.9s-44.9%2c20.1-44.9%2c44.9%0a%09%09c0%2c24.7%2c20.1%2c44.8%2c44.9%2c44.8c8.7%2c0%2c16.8-2.6%2c23.7-6.9l30.2%2c28.6c176.3%2c180.4%2c181.4%2c174.9%2c187.2%2c170l187.2%2c170z%20m187.2%2c170%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m315.1%2c166.4l40.2-67.6c4%2c1.1%2c8.1%2c2%2c12.4%2c2c24.8%2c0%2c44.9-20.1%2c44.9-44.9c0-24.7-20.1-44.8-44.9-44.8%0a%09%09s-44.8%2c20-44.8%2c44.8c0%2c12.3%2c5%2c23.5%2c13%2c31.6l-40.1%2c67.4c302.7%2c158%2c309.1%2c161.8%2c315.1%2c166.4l315.1%2c166.4z%20m315.1%2c166.4%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m453.7%2c223c-19.3%2c0-35.6%2c12.3-41.9%2c29.4l-55.8-5.5c0%2c0.4%2c0.1%2c0.8%2c0.1%2c1.2c0%2c7.3-0.8%2c14.4-2.2%2c21.3l55.8%2c5.5%0a%09%09c3.4%2c21.4%2c21.8%2c37.9%2c44.2%2c37.9c24.8%2c0%2c44.9-20.1%2c44.9-44.8c498.6%2c243.1%2c478.5%2c223%2c453.7%2c223l453.7%2c223z%20m453.7%2c223%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m299.7%2c399.4l-12.5-54.6c-7%2c2.4-14.4%2c4.2-22%2c5.1l12.5%2c54.6c-14.4%2c7.5-24.2%2c22.3-24.2%2c39.6%0a%09%09c0%2c24.7%2c20%2c44.8%2c44.9%2c44.8c24.7%2c0%2c44.8-20.1%2c44.8-44.8c343.2%2c419.8%2c323.8%2c400.2%2c299.7%2c399.4l299.7%2c399.4z%20m299.7%2c399.4%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m153.2%2c269.8l-69.5%2c23.3c-8-12.2-21.8-20.4-37.5-20.4c-24.8%2c0-44.8%2c20-44.8%2c44.8s20%2c44.9%2c44.8%2c44.9%0a%09%09s44.9-20.1%2c44.9-44.9c0-1-0.2-2-0.3-3l69.7-23.4c157.4%2c284.4%2c154.9%2c277.3%2c153.2%2c269.8l153.2%2c269.8z%20m153.2%2c269.8%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m330.4%2c248.1c0%2c42.5-34.4%2c76.9-76.9%2c76.9c-42.5%2c0-76.9-34.4-76.9-76.9c0-42.5%2c34.5-76.9%2c76.9-76.9%0a%09%09c296%2c171.2%2c330.4%2c205.7%2c330.4%2c248.1l330.4%2c248.1z%20m330.4%2c248.1%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\")=\"\" center=\"\" contain=\"\" no-repeat=\"\" rgb(235,=\"\" 235,=\"\" 235);=\"\" width:=\"\" 1140px;=\"\" height:=\"\" 700px;=\"\" color:=\"\" rgb(52,=\"\" 52,=\"\" 52);=\"\" text-align:=\"\" center;\"=\"\"><div class=\"intro\" style=\"box-sizing: inherit; margin: 4em auto; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; width: 833.578px;\"><h1 style=\"box-sizing: inherit; font-size: 2em; margin-top: 0px; margin-bottom: 0px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); padding: 0px 0px 30px; border-top: 0px; border-right: 0px; border-bottom: none; border-left: 0px; border-image: initial; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">How does it work?</h1><h4 style=\"box-sizing: inherit; margin-top: 0px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); font-size: 1.2em; padding: 0px 83.3438px 20px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">We\'ve streamlined our entire affiliate process to ensure ease of use, while still maintaining extremely accurateÂ <a href=\"https://development.affiliatepro.org\" style=\"box-sizing: inherit; color: rgb(39, 174, 97); touch-action: manipulation; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px;\">affiliate tracking</a>.</h4><ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; list-style: none; color: rgb(51, 51, 51); text-align: left; counter-reset: number 0;\"><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">Visitor clicks on an affiliate link on your site or in an email.</li><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">The visitors IP is logged and a cookie is placed in their browser for tracking purposes.</li><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">The visitor browses our site and may decide to order.</li><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">If the visitor orders (the order need not be placed during the same browser session--cookies and IPs are stored indefinitely), the order will be registered as a sale for you.</li><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">We will review and approve the sale.</li><li style=\"box-sizing: inherit; margin: 0px 0px 2em; padding: 0px 0px 10px 75px; border: 0px; font: inherit; letter-spacing: 0px; display: block; position: relative; vertical-align: middle;\">You will receive commission payouts.</li></ul></div></div><div class=\"inner container-fluid\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 3em 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 20px; line-height: inherit; font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(235,=\"\" 235,=\"\" 235);=\"\" position:=\"\" relative;=\"\" color:=\"\" rgb(52,=\"\" 52,=\"\" 52);=\"\" text-align:=\"\" center;\"=\"\"><div class=\"container\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px 0.7145rem; border: 0px; font: inherit; letter-spacing: 0px;\"><div class=\"panel\" style=\"box-sizing: inherit; margin: 0px 0px 4em; padding: 2em; border-width: 0.5em 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(39, 174, 97); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font: inherit; letter-spacing: 0px; background-color: rgb(255, 255, 255); border-radius: 0.5em; height: 461px;\"><div class=\"icon\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px;\"><span class=\"icon-earn\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; width: 120px; height: 120px; display: inline-block; background: url(\" data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23333333%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m268.6%2c237.2h-37.1c-15.4%2c0-28-12.5-28-28c0-15.4%2c12.6-28%2c28-28h297c7%2c0%2c12.8-5.7%2c12.8-12.8%0a%09%09c0-7-5.7-12.8-12.8-12.8h-34.1v-26.1c0-7-5.7-12.8-12.8-12.8c-7%2c0-12.8%2c5.7-12.8%2c12.8v26.1h-5.9c-29.5%2c0-53.5%2c24-53.5%2c53.5%0a%09%09c0%2c29.5%2c24%2c53.5%2c53.5%2c53.5h37.1c15.4%2c0%2c28%2c12.5%2c28%2c28c0%2c15.4-12.5%2c28-28%2c28h-66.7c-7%2c0-12.8%2c5.7-12.8%2c12.8c0%2c7%2c5.7%2c12.8%2c12.8%2c12.8%0a%09%09h35.3v26.6c0%2c7%2c5.7%2c12.8%2c12.8%2c12.8c7%2c0%2c12.8-5.7%2c12.8-12.8v-26.6h6.5c29.1-0.4%2c52.8-24.3%2c52.8-53.5%0a%09%09c322%2c261.2%2c298.1%2c237.2%2c268.6%2c237.2l268.6%2c237.2z%20m268.6%2c237.2%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m426.8%2c73.2c379.6%2c26%2c316.8%2c0%2c250%2c0s120.4%2c26%2c73.2%2c73.2c26%2c120.4%2c0%2c183.2%2c0%2c250s26%2c129.6%2c73.2%2c176.8%0a%09%09c120.4%2c474%2c183.2%2c500%2c250%2c500s129.6-26%2c176.8-73.2c474%2c379.6%2c500%2c316.8%2c500%2c250s474%2c120.4%2c426.8%2c73.2l426.8%2c73.2z%20m250%2c474.5%0a%09%09c126.3%2c474.5%2c25.5%2c373.7%2c25.5%2c250s126.3%2c25.5%2c250%2c25.5s474.5%2c126.3%2c474.5%2c250s373.7%2c474.5%2c250%2c474.5l250%2c474.5z%20m250%2c474.5%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\");\"=\"\"></span></div><h3 style=\"box-sizing: inherit; margin-bottom: 50px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); font-size: 1.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">Earn up to 50% commission!</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 150px 30px; border: 0px; font: inherit; letter-spacing: 0px; color: rgb(102, 102, 102);\">Not only can you join our team and help spread the word about your favorite products, but you can also get rewarded for your efforts.Â <br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Our system tracks referrals and pays top commissions for every client you send our way.</p></div><div class=\"panel\" style=\"box-sizing: inherit; margin: 0px 0px 4em; padding: 2em; border-width: 0.5em 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(39, 174, 97); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font: inherit; letter-spacing: 0px; background-color: rgb(255, 255, 255); border-radius: 0.5em; height: 485px;\"><div class=\"icon\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px;\"><span class=\"icon-earn-more\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; width: 120px; height: 120px; display: inline-block; background: url(\" data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23333333%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m266.8%2c313.8h-28.6c-10.4%2c0-18.8-8.4-18.8-18.8s8.4-18.8%2c18.8-18.8h50.3c6.9%2c0%2c12.5-5.6%2c12.5-12.5%0a%09%09c0-6.9-5.6-12.5-12.5-12.5h265v-17.4c0-6.9-5.6-12.5-12.5-12.5c-6.9%2c0-12.5%2c5.6-12.5%2c12.5v17.4h-1.8c-24.1%2c0-43.8%2c19.6-43.8%2c43.8%0a%09%09c0%2c24.1%2c19.6%2c43.8%2c43.8%2c43.8h28.6c10.4%2c0%2c18.8%2c8.4%2c18.8%2c18.8c0%2c10.4-8.4%2c18.8-18.8%2c18.8h-51.2c-6.9%2c0-12.5%2c5.6-12.5%2c12.5%0a%09%09c0%2c6.9%2c5.6%2c12.5%2c12.5%2c12.5h24.5v17.8c0%2c6.9%2c5.6%2c12.5%2c12.5%2c12.5c6.9%2c0%2c12.5-5.6%2c12.5-12.5v-17.8h2.4c23.9-0.3%2c43.1-19.9%2c43.1-43.8%0a%09%09c310.6%2c333.5%2c291%2c313.8%2c266.8%2c313.8l266.8%2c313.8z%20m266.8%2c313.8%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m440%2c285.6c-13.1-30.1-31.2-59.4-54.1-86.7c-27.7-33.3-55.2-55.5-69.2-65.8l53-98.3c2.6-4.9%2c1.8-10.9-2.3-14.8%0a%09%09c353.7%2c6.5%2c339.2%2c0%2c323%2c0c-14.9%2c0-28.5%2c5.6-40.3%2c10.6c-9.4%2c3.8-18.2%2c7.6-25.4%2c7.6c-2.2%2c0-4.1-0.3-5.9-1%0a%09%09c-24.7-9-43.8-14.7-62.2-14.7c-23.3%2c0-43.1%2c9.4-62.6%2c29.3c-4.1%2c4.2-4.7%2c10.7-1.5%2c15.6l57.2%2c86.4c-14.1%2c10.5-41.2%2c32.5-68.3%2c65.1%0a%09%09c-22.8%2c27.3-41%2c56.5-54.1%2c86.7c-16.4%2c37.9-24.7%2c77.5-24.7%2c117.7c0%2c53.3%2c43.5%2c96.8%2c96.8%2c96.8h236c53.3%2c0%2c96.8-43.5%2c96.8-96.8%0a%09%09c464.8%2c363.1%2c456.4%2c323.5%2c440%2c285.6l440%2c285.6z%20m151.8%2c42.2c12.1-10.4%2c23.6-15%2c37.4-15c14.8%2c0%2c31.4%2c5%2c53.5%2c13.2%0a%09%09c4.6%2c1.7%2c9.5%2c2.5%2c14.5%2c2.5c12.2%2c0%2c23.8-4.8%2c34.9-9.5c10.7-4.5%2c20.9-8.7%2c30.8-8.7c4.8%2c0%2c11.5%2c0.8%2c20.1%2c6.9l293%2c124.3h-86.9%0a%09%09l151.8%2c42.2z%20m368%2c475.1h132c-39.6%2c0-71.8-32.2-71.8-71.8c0-66.6%2c24.4-129.8%2c72.5-187.8c30.4-36.7%2c61.2-59.5%2c70.6-66.1h93.3%0a%09%09c9.5%2c6.6%2c40.2%2c29.4%2c70.6%2c66.1c48.1%2c58%2c72.5%2c121.1%2c72.5%2c187.8c439.8%2c442.8%2c407.6%2c475.1%2c368%2c475.1l368%2c475.1z%20m368%2c475.1%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\");\"=\"\"></span></div><h3 style=\"box-sizing: inherit; margin-bottom: 50px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); font-size: 1.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">High Conversion Rate = More Money!</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 150px 30px; border: 0px; font: inherit; letter-spacing: 0px; color: rgb(102, 102, 102);\">Our website and plans generate one of the highest conversion rates in the industry. Our high conversion rates mean that the people who you send here are more likely to buy our products.Â <br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Of course, we can\'t prove that either, but if you don\'t trust us, why would you want to refer people here?</p></div><div class=\"panel\" style=\"box-sizing: inherit; margin: 0px 0px 4em; padding: 2em; border-width: 0.5em 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(39, 174, 97); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font: inherit; letter-spacing: 0px; background-color: rgb(255, 255, 255); border-radius: 0.5em; height: 389px;\"><div class=\"icon\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px;\"><span class=\"icon-clock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; width: 120px; height: 120px; display: inline-block; background: url(\" data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23333333%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m250%2c0c112.1%2c0%2c0%2c112.1%2c0%2c250c0%2c137.9%2c112.1%2c250%2c250%2c250c137.9%2c0%2c250-112.1%2c250-250c500%2c112.1%2c387.9%2c0%2c250%2c0%0a%09%09l250%2c0z%20m250%2c483.3c121.3%2c483.3%2c16.7%2c378.7%2c16.7%2c250c16.7%2c121.3%2c121.3%2c16.7%2c250%2c16.7c128.7%2c0%2c233.3%2c104.6%2c233.3%2c233.3%0a%09%09c483.3%2c378.7%2c378.7%2c483.3%2c250%2c483.3l250%2c483.3z%20m250%2c483.3%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m250%2c50c-4.6%2c0-8.3%2c3.7-8.3%2c8.3v250h-125c-4.6%2c0-8.3%2c3.7-8.3%2c8.3c0%2c4.6%2c3.7%2c8.3%2c8.3%2c8.3h250%0a%09%09c4.6%2c0%2c8.3-3.7%2c8.3-8.3v-200c258.3%2c53.7%2c254.6%2c50%2c250%2c50l250%2c50z%20m250%2c50%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\");\"=\"\"></span></div><h3 style=\"box-sizing: inherit; margin-bottom: 50px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); font-size: 1.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">Long cookie duration.</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 150px 30px; border: 0px; font: inherit; letter-spacing: 0px; color: rgb(102, 102, 102);\">If a customer comes from your site to ours and then comes back to purchase six months later, you get credit.</p></div></div></div><div class=\"container-fluid\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 3em 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 20px; line-height: inherit; font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(39,=\"\" 174,=\"\" 97);=\"\" color:=\"\" rgb(52,=\"\" 52,=\"\" 52);=\"\" text-align:=\"\" center;\"=\"\"><div class=\"container\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px 0.7145rem; border: 0px; font: inherit; letter-spacing: 0px;\"><div class=\"bg_panel\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; color: rgb(255, 255, 255);\"><div class=\"icon\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; color: inherit;\"><span class=\"icon-thats-it\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; color: inherit; width: 120px; height: 120px; display: inline-block; background: url(\" data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23ffffff%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20fill%3d%22none%22%20d%3d%22m250%2c0c112.1%2c0%2c0%2c112.2%2c0%2c250s112.1%2c250%2c250%2c250c137.9%2c0%2c250-112.2%2c250-250s387.8%2c0%2c250%2c0l250%2c0z%20m250%2c467.2%0a%09%09c-119.8%2c0-217.2-97.4-217.2-217.2s130.2%2c32.8%2c250%2c32.8c119.8%2c0%2c217.2%2c97.4%2c217.2%2c217.2s369.8%2c467.2%2c250%2c467.2l250%2c467.2z%0a%09%09%20m250%2c467.2%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20fill%3d%22none%22%20d%3d%22m340.5%2c168.2l211.6%2c297.1l159.5%2c245c-6.4-6.4-16.8-6.4-23.2%2c0c-6.4%2c6.4-6.4%2c16.8%2c0%2c23.2l63.7%2c63.7%0a%09%09c3.2%2c3.2%2c7.4%2c4.8%2c11.6%2c4.8c4.2%2c0%2c8.4-1.6%2c11.6-4.8c0%2c0%2c0%2c0%2c0%2c0l140.5-140.5c6.4-6.4%2c6.4-16.8%2c0-23.2%0a%09%09c357.3%2c161.8%2c346.9%2c161.8%2c340.5%2c168.2l340.5%2c168.2z%20m340.5%2c168.2%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\");\"=\"\"></span></div><h3 style=\"box-sizing: inherit; margin-bottom: 50px; font-weight: bold; line-height: inherit; font-size: 1.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">That\'s it! You send us business, we send you money!</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 150px 30px; border: 0px; font: inherit; letter-spacing: 0px; color: inherit;\">Signing up and getting your account configured couldn\'t be easier. You can be referring business our way in as little as five minutes.</p></div></div></div><div class=\"container\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px 0.7145rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 20px; line-height: inherit; font-family: \" titillium=\"\" web\",=\"\" sans-serif;=\"\" color:=\"\" rgb(52,=\"\" 52,=\"\" 52);=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(235,=\"\" 235,=\"\" 235);\"=\"\"><div class=\"nobg\" style=\"box-sizing: inherit; margin: 0px; padding: 4em 0px; border: 0px; font: inherit; letter-spacing: 0px;\"><div class=\"icon\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px;\"><span class=\"icon-make-money\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; letter-spacing: 0px; width: 120px; height: 120px; display: inline-block; background: url(\" data:image=\"\" svg+xml;utf8,%3csvg%20version%3d%221.1%22%20id%3d%22layer_1%22%20xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22%20xmlns%3axlink%3d%22http%3a%2f%2fwww.w3.org%2f1999%2fxlink%22%20x%3d%220px%22%20y%3d%220px%22%0a%09%20viewbox%3d%220%200%20500%20500%22%20style%3d%22enable-background%3anew%200%200%20500%20500%3b%22%20xml%3aspace%3d%22preserve%22%3e%0a%3cstyle%20type%3d%22text%2fcss%22%3e%0a%09.st0%7bfill%3a%23333333%3b%7d%0a%3c%2fstyle%3e%0a%3cg%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m182.3%2c67.9c0%2c37.4%2c30.5%2c67.9%2c67.9%2c67.9c37.4%2c0%2c67.9-30.5%2c67.9-67.9c0-37.4-30.5-67.9-67.9-67.9%0a%09%09c212.7%2c0%2c182.3%2c30.5%2c182.3%2c67.9z%20m250.2%2c34c18.7%2c0%2c34%2c15.2%2c34%2c34c0%2c18.7-15.2%2c34-34%2c34c-18.7%2c0-34-15.2-34-34%0a%09%09c216.2%2c49.2%2c231.5%2c34%2c250.2%2c34z%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m40.1%2c500h420.2c8.2%2c0%2c15.1-5.8%2c16.6-13.6v222.7c-2.5-21-20.4-37.3-42.1-37.3h319.5c2.3-2.9%2c3.6-6.5%2c3.6-10.5%0a%09%09c0-9.4-7.6-17-17-17h-112c-9.4%2c0-17%2c7.6-17%2c17c0%2c4%2c1.4%2c7.6%2c3.6%2c10.5h65.5c-23.4%2c0-42.4%2c19-42.4%2c42.4v483%0a%09%09c23.1%2c492.4%2c30.7%2c500%2c40.1%2c500z%20m57%2c227.8c0-4.6%2c3.9-8.5%2c8.5-8.5h369.3c4.6%2c0%2c8.5%2c3.9%2c8.5%2c8.5v466h57v227.8z%22%2f%3e%0a%09%3cpath%20class%3d%22st0%22%20d%3d%22m241.8%2c314.1h40.6c9.4%2c0%2c17-7.6%2c17-17c0-9.4-7.6-17-17-17h-15.3v-12.8c0-9.4-7.6-17-17-17c-9.4%2c0-17%2c7.6-17%2c17%0a%09%09v13.7c-18.2%2c4-32.2%2c20.3-32.2%2c39.1c0%2c21.7%2c18.7%2c40.1%2c40.8%2c40.1h16.8c3.3%2c0%2c6.8%2c3.2%2c6.8%2c6.1c0%2c3-3.5%2c6.1-6.8%2c6.1h-40.6%0a%09%09c-9.4%2c0-17%2c7.6-17%2c17c0%2c9.4%2c7.6%2c17%2c17%2c17h15.3v418c0%2c9.4%2c7.6%2c17%2c17%2c17c9.4%2c0%2c17-7.6%2c17-17v-12.4c18.2-4%2c32.2-20.3%2c32.2-39.1%0a%09%09c0-21.7-18.7-40.1-40.8-40.1h-16.8c-3.3%2c0-6.8-3.1-6.8-6.1c234.9%2c317.2%2c238.4%2c314.1%2c241.8%2c314.1z%22%2f%3e%0a%3c%2fg%3e%0a%3c%2fsvg%3e\");\"=\"\"></span></div><h3 style=\"box-sizing: inherit; margin-bottom: 50px; font-weight: bold; line-height: inherit; color: rgb(52, 52, 52); font-size: 1.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; letter-spacing: 0px;\">Start making money now!</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 150px 30px; border: 0px; font: inherit; letter-spacing: 0px; color: rgb(102, 102, 102);\">There is no charge to join our Affiliate Program.<br style=\"box-sizing: inherit;\">We pay commissions for all sales you referred.<br style=\"box-sizing: inherit;\">Earn up to 30% commissions</p><a class=\"btn btn-primary\" href=\"https://development.affiliatepro.org/register\" style=\"box-sizing: inherit; background-color: rgb(39, 174, 97); touch-action: manipulation; margin: 2rem 0px 0.5rem; padding: 0.75rem 4rem; border-color: rgb(39, 174, 97); font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: 1.5em; font-family: inherit; letter-spacing: 0px; border-radius: 0.75rem;\">Sign up</a><div class=\"sm-links\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; letter-spacing: 0px;\"><small style=\"box-sizing: inherit; font: inherit; margin: 0px; padding: 0px; border: 0px; letter-spacing: 0px;\">Already our affiliate?</small><br style=\"box-sizing: inherit;\"><a href=\"https://development.affiliatepro.org/login\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); touch-action: manipulation; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; letter-spacing: 0px;\">Log in</a></div></div></div>', 'login', 1, '77.126.80.25'),
(42, 'bg_color', '#4169E1', 'login', 1, '103.251.19.4'),
(43, 'footer', 'AFFILIATE PRO 2019 Â© Â ALL RIGHTS RESERVED', 'login', 1, '77.126.80.25'),
(44, 'heading', 'Client Login', 'login_client', 1, '103.251.19.60'),
(45, 'content', '<p>Client Login</p><p>Client Login<br></p>', 'login_client', 1, '103.251.19.60'),
(46, 'bg_color', '', 'login_client', 1, '103.251.19.60'),
(47, 'footer', 'client footer', 'login_client', 1, '103.251.19.60'),
(48, 'heading', 'WELCOME TO APP3STAR PARTNERSHIP PROGRAMME', 'loginclient', 1, '105.112.97.227'),
(49, 'content', '<p>This is App3star Partnership program interface </p><p>Join us automate business processes for companies and earn income</p><p>Thank you for being part of us.</p><p></p><p><br></p><p><br></p><p></p>', 'loginclient', 1, '105.112.97.227'),
(50, 'bg_color', '#1E90FF', 'loginclient', 1, '77.127.29.106'),
(51, 'footer', 'Footer', 'loginclient', 1, '219.91.238.181'),
(52, 'logo', '', 'login', 1, '77.126.70.149'),
(53, 'logo', '', 'loginclient', 1, '77.126.80.25'),
(54, 'bg_color', '#ffffff', 'emailsetting', 1, '77.125.79.113'),
(55, 'bg_footer', '#6A2AFC', 'emailsetting', 1, '77.125.79.113'),
(56, 'footer', 'App3star 2020 © ALL RIGHTS RESERVED ', 'emailsetting', 1, '105.112.102.180'),
(57, 'logo', '', 'emailsetting', 1, '77.125.91.162'),
(58, 'commition', '', 'referlevel_8', 1, '45.41.132.41'),
(59, 'sale_commition', '', 'referlevel_8', 1, '45.41.132.41'),
(60, 'ex_commition', '', 'referlevel_8', 1, '45.41.132.41'),
(61, 'ex_action_commition', '', 'referlevel_8', 1, '45.41.132.41'),
(62, 'commition', '', 'referlevel_9', 1, '45.41.132.41'),
(63, 'sale_commition', '', 'referlevel_9', 1, '45.41.132.41'),
(64, 'ex_commition', '', 'referlevel_9', 1, '45.41.132.41'),
(65, 'ex_action_commition', '', 'referlevel_9', 1, '45.41.132.41'),
(66, 'commition', '', 'referlevel_10', 1, '45.41.132.41'),
(67, 'sale_commition', '', 'referlevel_10', 1, '45.41.132.41'),
(68, 'ex_commition', '', 'referlevel_10', 1, '45.41.132.41'),
(69, 'ex_action_commition', '', 'referlevel_10', 1, '45.41.132.41'),
(70, 'is_install', '1', 'withdrawalpayment_bank_transfer', 1, '45.41.132.41'),
(71, 'is_install', '1', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(72, 'status', '1', 'withdrawalpayment_bank_transfer', 1, '45.41.132.41'),
(73, 'status', '1', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(74, 'ClientID', '', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(75, 'ClientSecret', '', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(76, 'denied_status_id', '0', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(77, 'pending_status_id', '0', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(78, 'processing_status_id', '0', 'withdrawalpayment_paypal', 1, '45.41.132.41'),
(79, 'commition', '', 'referlevel_1', 1, '105.112.101.8'),
(80, 'sale_commition', '', 'referlevel_1', 1, '105.112.101.8'),
(81, 'm_commition', '', 'referlevel_1', 1, '150.107.232.115'),
(82, 'commition', '', 'referlevel_2', 1, '105.112.101.8'),
(83, 'sale_commition', '', 'referlevel_2', 1, '105.112.101.8'),
(84, 'm_commition', '', 'referlevel_2', 1, '150.107.232.115'),
(85, 'commition', '', 'referlevel_3', 1, '105.112.101.8'),
(86, 'sale_commition', '', 'referlevel_3', 1, '105.112.101.8'),
(87, 'm_commition', '', 'referlevel_3', 1, '150.107.232.115'),
(88, 'click', '', 'referlevel', 1, '77.125.48.104'),
(89, 'm_click', '', 'referlevel', 1, '150.107.232.115'),
(90, 'product_commission_type', '', 'formsetting', 1, '::1'),
(91, 'product_commission', '', 'formsetting', 1, '::1'),
(92, 'product_ppc', '', 'formsetting', 1, '::1'),
(93, 'product_noofpercommission', '', 'formsetting', 1, '::1'),
(94, 'recaptcha', '', 'formsetting', 1, '::1'),
(95, 'favicon', 'Gxc7lWXRSAbUHdaui2oQek9D403Efjw11.png', 'site', 1, '::1'),
(96, 'affiliate_cookie', '30', 'store', 1, '39.34.160.60'),
(97, 'bank_transfer_instruction', '', 'formsetting', 1, '77.125.10.126'),
(98, 'paypal_status', '1', 'paymentsetting', 1, '77.125.48.104'),
(99, 'bank_transfer_instruction', '', 'paymentsetting', 1, '77.125.48.104'),
(100, 'bank_transfer_status', '1', 'paymentsetting', 1, '77.125.48.104'),
(101, 'product_commission_type', '', 'integration', 1, '178.162.203.194'),
(102, 'product_commission', '', 'integration', 1, '178.162.203.194'),
(103, 'product_ppc', '', 'integration', 1, '178.162.203.194'),
(104, 'product_noofpercommission', '', 'integration', 1, '178.162.203.194'),
(105, 'sale_type', 'percentage', 'referlevel', 1, '105.112.101.8'),
(106, 'ex_click', '0', 'referlevel', 1, '77.125.48.104'),
(107, 'ex_action_click', '0', 'referlevel', 1, '77.125.48.104'),
(108, 'ex_commition', '', 'referlevel_1', 1, '105.112.101.8'),
(109, 'ex_action_commition', '', 'referlevel_1', 1, '105.112.101.8'),
(110, 'ex_commition', '', 'referlevel_2', 1, '105.112.101.8'),
(111, 'ex_action_commition', '', 'referlevel_2', 1, '105.112.101.8'),
(112, 'ex_commition', '', 'referlevel_3', 1, '105.112.101.8'),
(113, 'ex_action_commition', '', 'referlevel_3', 1, '105.112.101.8'),
(114, 'logo', '', 'templates', 1, '77.127.29.106'),
(115, 'status', '1', 'store', 1, '::1'),
(116, 'wallet_min_amount', '50', 'site', 1, '39.34.160.60'),
(117, 'wallet_min_message', '<p>You can not <b>withdraw </b>less than 50$</p>', 'store', 1, '103.251.59.244'),
(118, 'wallet_min_message', '<p xss=\"removed\"><span xss=\"removed\">You can not<span>Â </span></span><b xss=\"removed\">withdraw<span>Â </span></b><span xss=\"removed\">less than 50$</span></p>', 'site', 1, '39.34.160.60'),
(119, 'front_template', 'multiple_pages', 'login', 1, '::1'),
(120, 'status', '2', 'referlevel', 1, '197.210.47.27'),
(121, 'disabled_for', '[\"3\"]', 'referlevel', 1, '197.210.47.27'),
(122, '0', '{\"type\":\"radio-group\",\"label\":\"Radio Group\",\"name\":\"radio-group-1543409142098\",\"values\":[{\"label\":\"Option 1\",\"value\":\"option-1\"},{\"label\":\"Option 2\",\"value\":\"option-2\"},{\"label\":\"Option 3\",\"value\":\"option-3\"}]}', 'registration_builder', 1, '103.251.59.165'),
(123, 'registration_builder', '[{\"type\":\"header\",\"label\":\"Firstname\"},{\"type\":\"header\",\"label\":\"Lastname\"},{\"type\":\"header\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"Mobile Number\",\"placeholder\":\"Mobile\",\"className\":\"form-control\",\"name\":\"text-1544017445927\",\"mobile_validation\":\"true\"},{\"type\":\"header\",\"label\":\"Username\"},{\"type\":\"header\",\"label\":\"Password\"},{\"type\":\"header\",\"label\":\"Confirm_password\"}]', 'registration_builder', 1, '77.125.79.113'),
(124, 'google_analytics', '', 'store', 1, '::1'),
(125, 'time_zone', 'Africa/Lagos', 'site', 1, '39.34.160.60'),
(126, 'from_email', '', 'store', 1, '103.251.59.248'),
(127, 'from_name', '', 'store', 1, '103.251.59.248'),
(128, 'smtp_hostname', '', 'store', 1, '103.251.59.248'),
(129, 'smtp_username', '', 'store', 1, '103.251.59.248'),
(130, 'smtp_password', '', 'store', 1, '103.251.59.248'),
(131, 'smtp_port', '', 'store', 1, '103.251.59.248'),
(132, 'registration_status', '1', 'store', 1, '39.34.160.60'),
(133, 'default_action_status', '1', 'referlevel', 1, '105.112.101.8'),
(134, 'faceboook_pixel', '', 'site', 1, '39.34.160.60'),
(135, 'global_script', '', 'site', 1, '39.34.160.60'),
(136, 'global_script_status', '[]', 'site', 1, '39.34.160.60'),
(137, 'bg_left', 'rgb(29, 137, 228)', 'loginclient', 1, '105.112.97.227'),
(138, 'bg_right', 'rgb(119, 186, 246)', 'loginclient', 1, '105.112.97.227'),
(139, 'footer_bf', 'rgb(12, 52, 61)', 'loginclient', 1, '105.112.97.227'),
(140, 'footer_color', 'rgb(255, 242, 204)', 'loginclient', 1, '105.112.97.227'),
(141, 'btn_sendmail_bg', 'rgb(255, 242, 204)', 'loginclient', 1, '105.112.97.227'),
(142, 'btn_sendmail_color', 'rgb(255, 255, 255)', 'loginclient', 1, '105.112.97.227'),
(143, 'btn_backlogin_bg', 'rgb(204, 65, 37)', 'loginclient', 1, '105.112.97.227'),
(144, 'btn_backlogin_color', 'rgb(255, 255, 255)', 'loginclient', 1, '105.112.97.227'),
(145, 'btn_forgotlink_bg', 'rgb(147, 196, 125)', 'loginclient', 1, '105.112.97.227'),
(146, 'btn_forgotlink_color', 'rgb(255, 255, 255)', 'loginclient', 1, '105.112.97.227'),
(147, 'btn_signin_bg', 'rgb(255, 242, 204)', 'loginclient', 1, '105.112.97.227'),
(148, 'btn_signin_color', 'rgb(147, 196, 125)', 'loginclient', 1, '105.112.97.227'),
(149, 'btn_signup_bg', 'rgb(111, 168, 220)', 'loginclient', 1, '105.112.97.227'),
(150, 'btn_signup_color', 'rgb(244, 204, 204)', 'loginclient', 1, '105.112.97.227'),
(151, 'btn_registersubmit_bg', 'rgb(32, 18, 77)', 'loginclient', 1, '105.112.97.227'),
(152, 'btn_registersubmit_color', 'rgb(255, 217, 102)', 'loginclient', 1, '105.112.97.227'),
(153, 'btn_backtologin_bg', 'rgb(212, 164, 21)', 'loginclient', 1, '219.91.238.181'),
(154, 'btn_backtologin_color', 'rgba(0, 0, 0, 0)', 'loginclient', 1, '219.91.238.181'),
(155, 'heading_color', 'rgb(108, 78, 197)', 'loginclient', 1, '105.112.97.227'),
(156, 'input_text_color', 'rgb(106, 168, 79)', 'loginclient', 1, '105.112.97.227'),
(157, 'input_bg_color', 'rgb(182, 215, 168)', 'loginclient', 1, '105.112.97.227'),
(158, 'input_label_color', 'rgb(106, 168, 79)', 'loginclient', 1, '105.112.97.227'),
(159, 'admin_integration_logs', '1', 'live_log', 1, '77.124.10.83'),
(160, 'admin_integration_orders', '1', 'live_log', 1, '77.124.10.83'),
(161, 'admin_newuser', '1', 'live_log', 1, '77.124.10.83'),
(162, 'admin_notifications', '1', 'live_log', 1, '219.91.236.167'),
(163, 'admin_sound_status', '1', 'live_dashboard', 1, '188.64.207.250'),
(164, 'header_background_color', 'rgb(255, 255, 255)', 'adminside', 1, '::1'),
(165, 'header_text_color', 'rgb(0, 0, 0)', 'adminside', 1, '::1'),
(166, 'header_language_text_color', 'rgb(0, 0, 0)', 'adminside', 1, '::1'),
(167, 'header_currency_text_color', 'rgb(0, 0, 0)', 'adminside', 1, '::1'),
(168, 'header_alert_icon', 'rgb(164, 194, 244)', 'adminside', 1, '123.201.226.15'),
(169, 'header_alert_background_color', '', 'adminside', 1, '::1'),
(170, 'header_alert_text_color', 'rgb(0, 0, 0)', 'adminside', 1, '::1'),
(171, 'header_menu_background_color', 'rgb(0, 100, 184)', 'adminside', 1, '::1'),
(172, 'header_menu_text_color', 'rgb(255, 255, 255)', 'adminside', 1, '::1'),
(173, 'top_left_text', 'ADMIN PANEL', 'adminside', 1, '::1'),
(174, 'top_left_background_color', 'rgb(34, 34, 36)', 'adminside', 1, '::1'),
(175, 'top_left_text_color', 'rgb(255, 255, 255)', 'adminside', 1, '::1'),
(176, 'sidebar_background_color', 'rgb(34, 34, 36)', 'adminside', 1, '::1'),
(177, 'sidebar_menu_background_color', 'rgb(34, 34, 36)', 'adminside', 1, '::1'),
(178, 'sidebar_menu_text_color', 'rgb(255, 255, 255)', 'adminside', 1, '::1'),
(179, 'sidebar_menu_bottom_links_background_color', 'rgb(34, 34, 36)', 'adminside', 1, '::1'),
(180, 'sidebar_menu_bottom_links_text_color', 'rgb(255, 255, 255)', 'adminside', 1, '::1'),
(181, 'header_background_color', 'rgb(255, 255, 255)', 'affiliateside', 1, '::1'),
(182, 'header_text_color', 'rgb(0, 0, 0)', 'affiliateside', 1, '::1'),
(183, 'header_language_text_color', 'rgb(0, 0, 0)', 'affiliateside', 1, '::1'),
(184, 'header_currency_text_color', 'rgb(0, 0, 0)', 'affiliateside', 1, '::1'),
(185, 'header_alert_icon', 'hsv(65, 64%, 71%)', 'affiliateside', 1, '123.201.226.15'),
(186, 'header_alert_background_color', '', 'affiliateside', 1, '::1'),
(187, 'header_alert_text_color', 'rgb(0, 0, 0)', 'affiliateside', 1, '::1'),
(188, 'header_menu_background_color', 'rgb(136, 99, 246)', 'affiliateside', 1, '::1'),
(189, 'header_menu_text_color', 'rgb(255, 255, 255)', 'affiliateside', 1, '::1'),
(190, 'top_left_text', 'AFFILIATE PANEL', 'affiliateside', 1, '::1'),
(191, 'top_left_background_color', 'rgb(52, 58, 64)', 'affiliateside', 1, '::1'),
(192, 'top_left_text_color', 'rgb(255, 255, 255)', 'affiliateside', 1, '::1'),
(193, 'sidebar_background_color', 'rgb(52, 58, 64)', 'affiliateside', 1, '::1'),
(194, 'sidebar_menu_background_color', 'rgb(52, 58, 64)', 'affiliateside', 1, '::1'),
(195, 'sidebar_menu_text_color', 'rgb(255, 255, 255)', 'affiliateside', 1, '::1'),
(196, 'sidebar_menu_bottom_links_background_color', 'rgb(52, 58, 64)', 'affiliateside', 1, '::1'),
(197, 'sidebar_menu_bottom_links_text_color', 'rgb(255, 255, 255)', 'affiliateside', 1, '::1'),
(198, 'header_menu_dropdown_background_color', 'rgb(0, 100, 184)', 'adminside', 1, '::1'),
(199, 'header_menu_dropdown_background_color', 'rgb(136, 99, 246)', 'affiliateside', 1, '::1'),
(200, 'user_sound_status', '1', 'live_dashboard', 1, '77.125.109.26'),
(201, 'user_integration_logs', '1', 'live_log', 1, '77.125.109.26'),
(202, 'user_integration_orders', '1', 'live_log', 1, '77.125.109.26'),
(203, 'user_newuser', '1', 'live_log', 1, '77.125.109.26'),
(204, 'admin_action_status', '1', 'live_dashboard', 1, '188.64.207.250'),
(205, 'admin_integration_order_status', '1', 'live_dashboard', 1, '188.64.207.250'),
(206, 'admin_affiliate_register_status', '1', 'live_dashboard', 1, '188.64.207.250'),
(207, 'admin_local_store_order_status', '1', 'live_dashboard', 1, '188.64.207.250'),
(208, 'user_action_status', '1', 'live_dashboard', 1, '77.125.109.26'),
(209, 'user_integration_order_status', '1', 'live_dashboard', 1, '77.125.109.26'),
(210, 'user_affiliate_register_status', '1', 'live_dashboard', 1, '77.125.109.26'),
(211, 'user_local_store_order_status', '1', 'live_dashboard', 1, '77.125.109.26'),
(212, 'admin_data_load_interval', '10', 'live_dashboard', 1, '188.64.207.250'),
(213, 'language_status', '0', 'store', 1, '39.34.160.60'),
(214, 'status', '1', 'storepayment_bank_transfer', 1, '105.112.100.230'),
(215, 'status', '0', 'storepayment_cod', 1, '41.190.3.137'),
(216, 'theme', '0', 'store', 1, '::1'),
(217, 'autoacceptlocalstore', '1', 'referlevel', 1, '197.210.47.27'),
(218, 'autoacceptexternalstore', '1', 'referlevel', 1, '197.210.47.27'),
(219, 'autoacceptaction', '1', 'referlevel', 1, '197.210.47.27'),
(220, 'levels', '4', 'referlevel', 1, '105.112.101.8'),
(221, 'commition', '', 'referlevel_4', 1, '105.112.101.8'),
(222, 'sale_commition', '', 'referlevel_4', 1, '105.112.101.8'),
(223, 'ex_commition', '', 'referlevel_4', 1, '105.112.101.8'),
(224, 'ex_action_commition', '', 'referlevel_4', 1, '105.112.101.8'),
(225, 'commition', '', 'referlevel_5', 1, '105.112.97.227'),
(226, 'sale_commition', '', 'referlevel_5', 1, '105.112.97.227'),
(227, 'ex_commition', '', 'referlevel_5', 1, '105.112.97.227'),
(228, 'ex_action_commition', '', 'referlevel_5', 1, '105.112.97.227'),
(229, 'commition', '', 'referlevel_6', 1, '105.112.97.227'),
(230, 'sale_commition', '', 'referlevel_6', 1, '105.112.97.227'),
(231, 'ex_commition', '', 'referlevel_6', 1, '105.112.97.227'),
(232, 'ex_action_commition', '', 'referlevel_6', 1, '105.112.97.227'),
(233, 'commition', '', 'referlevel_7', 1, '105.112.97.227'),
(234, 'sale_commition', '', 'referlevel_7', 1, '105.112.97.227'),
(235, 'ex_commition', '', 'referlevel_7', 1, '105.112.97.227'),
(236, 'ex_action_commition', '', 'referlevel_7', 1, '105.112.97.227'),
(237, 'commition', '', 'referlevel_8', 1, '105.112.97.227'),
(238, 'sale_commition', '', 'referlevel_8', 1, '105.112.97.227'),
(239, 'ex_commition', '', 'referlevel_8', 1, '105.112.97.227'),
(240, 'ex_action_commition', '', 'referlevel_8', 1, '105.112.97.227'),
(241, 'commition', '', 'referlevel_9', 1, '105.112.97.227'),
(242, 'sale_commition', '', 'referlevel_9', 1, '105.112.97.227'),
(243, 'ex_commition', '', 'referlevel_9', 1, '105.112.97.227'),
(244, 'ex_action_commition', '', 'referlevel_9', 1, '105.112.97.227'),
(245, 'commition', '', 'referlevel_10', 1, '105.112.97.227'),
(246, 'sale_commition', '', 'referlevel_10', 1, '105.112.97.227'),
(247, 'ex_commition', '', 'referlevel_10', 1, '105.112.97.227'),
(248, 'ex_action_commition', '', 'referlevel_10', 1, '105.112.97.227'),
(249, 'sitekey', '', 'googlerecaptcha', 1, '39.34.160.60'),
(250, 'secretkey', '', 'googlerecaptcha', 1, '39.34.160.60'),
(251, 'admin_login', '0', 'googlerecaptcha', 1, '39.34.160.60'),
(252, 'affiliate_login', '0', 'googlerecaptcha', 1, '39.34.160.60'),
(253, 'affiliate_register', '0', 'googlerecaptcha', 1, '39.34.160.60'),
(254, 'client_login', '0', 'googlerecaptcha', 1, '39.34.160.60'),
(255, 'client_register', '0', 'googlerecaptcha', 1, '39.34.160.60'),
(256, 'bank_details', 'WEMA BANK \r\n\r\nA/C NO: 0122878664\r\nA/C NAME: FIGTEC CONCEPTS LIMITED\r\n', 'storepayment_bank_transfer', 1, '105.112.100.230'),
(257, 'status', '0', 'storepayment_opay', 1, '77.127.103.146'),
(258, 'HashKey', '', 'storepayment_opay', 1, '77.127.103.146'),
(259, 'HashIV', '', 'storepayment_opay', 1, '77.127.103.146'),
(260, 'MerchantID', '', 'storepayment_opay', 1, '77.127.103.146'),
(261, 'order_status', '7', 'storepayment_opay', 1, '77.127.103.146'),
(262, 'failed_status', '5', 'storepayment_opay', 1, '77.127.103.146'),
(263, 'status', '0', 'storepayment_stripes', 1, '105.112.96.38'),
(264, 'environment', '1', 'storepayment_stripes', 1, '77.127.103.146'),
(265, 'test_public_key', '', 'storepayment_stripes', 1, '77.127.103.146'),
(266, 'test_secret_key', '', 'storepayment_stripes', 1, '77.127.103.146'),
(267, 'live_public_key', '', 'storepayment_stripes', 1, '77.127.103.146'),
(268, 'live_secret_key', '', 'storepayment_stripes', 1, '77.127.103.146'),
(269, 'order_success_status', '1', 'storepayment_stripes', 1, '77.127.103.146'),
(270, 'order_failed_status', '5', 'storepayment_stripes', 1, '77.127.103.146'),
(271, 'status', '0', 'storepayment_skrill', 1, '105.112.96.38'),
(272, 'status', '0', 'storepayment_paytm', 1, '77.127.103.146'),
(273, 'status', '0', 'storepayment_paypal', 1, '105.112.96.154'),
(274, 'api_username', '', 'storepayment_paypal', 1, '77.127.103.146'),
(275, 'api_password', '', 'storepayment_paypal', 1, '77.127.103.146'),
(276, 'api_signature', '', 'storepayment_paypal', 1, '77.127.103.146'),
(277, 'payment_currency', 'USD', 'storepayment_paypal', 1, '77.127.103.146'),
(278, 'payment_mode', 'live', 'storepayment_paypal', 1, '77.127.103.146'),
(279, 'canceled_reversal_status_id', '11', 'storepayment_paypal', 1, '77.127.103.146'),
(280, 'completed_status_id', '1', 'storepayment_paypal', 1, '77.127.103.146'),
(281, 'denied_status_id', '3', 'storepayment_paypal', 1, '77.127.103.146'),
(282, 'expired_status_id', '4', 'storepayment_paypal', 1, '77.127.103.146'),
(283, 'failed_status_id', '5', 'storepayment_paypal', 1, '77.127.103.146'),
(284, 'pending_status_id', '6', 'storepayment_paypal', 1, '77.127.103.146'),
(285, 'processed_status_id', '7', 'storepayment_paypal', 1, '77.127.103.146'),
(286, 'refunded_status_id', '8', 'storepayment_paypal', 1, '77.127.103.146'),
(287, 'reversed_status_id', '9', 'storepayment_paypal', 1, '77.127.103.146'),
(288, 'voided_status_id', '10', 'storepayment_paypal', 1, '77.127.103.146'),
(289, 'product_recursion', '', 'productsetting', 1, '::1'),
(290, 'recursion_custom_time', '0', 'productsetting', 1, '::1'),
(294, 'form_recursion', '', 'formsetting', 1, '::1'),
(295, 'recursion_custom_time', '0', 'formsetting', 1, '::1'),
(296, 'recursion_endtime', NULL, 'productsetting', 1, '::1'),
(297, 'recursion_endtime', NULL, 'formsetting', 1, '::1'),
(298, 'additional_bank_details', '[]', 'storepayment_bank_transfer', 1, '105.112.100.230'),
(299, 'proof', '0', 'storepayment_bank_transfer', 1, '105.112.100.230'),
(300, 'cost', '{\"1\":{\"country\":\"160\",\"cost\":\"500\"}}', 'shipping_setting', 1, '::1'),
(301, 'allow_country', '[\"10\"]', 'shipping_setting', 1, '219.91.237.198'),
(302, 'shipping_in_limited', '1', 'shipping_setting', 1, '::1'),
(303, 'shipping_error_message', 'Your country is not in our shipping list, you will not be able to order physical products.', 'shipping_setting', 1, '::1'),
(304, 'status', '0', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(305, 'email', '', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(306, 'sandbox_mode', '0', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(307, 'transaction', '1', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(308, 'canceled_reversal_status_id', '11', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(309, 'completed_status_id', '1', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(310, 'denied_status_id', '3', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(311, 'expired_status_id', '4', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(312, 'failed_status_id', '5', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(313, 'pending_status_id', '6', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(314, 'processed_status_id', '7', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(315, 'refunded_status_id', '8', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(316, 'reversed_status_id', '8', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(317, 'voided_status_id', '10', 'storepayment_paypalstandard', 1, '77.127.103.146'),
(318, 'merchant_id', '', 'storepayment_paytm', 1, '77.127.103.146'),
(319, 'merchant_key', '', 'storepayment_paytm', 1, '77.127.103.146'),
(320, 'website_name', '', 'storepayment_paytm', 1, '77.127.103.146'),
(321, 'industry_type', '', 'storepayment_paytm', 1, '77.127.103.146'),
(322, 'transaction_url', '', 'storepayment_paytm', 1, '77.127.103.146'),
(323, 'transaction_status_url', '', 'storepayment_paytm', 1, '77.127.103.146'),
(324, 'order_success_status_id', '1', 'storepayment_paytm', 1, '77.127.103.146'),
(325, 'order_failed_status_id', '5', 'storepayment_paytm', 1, '77.127.103.146'),
(326, 'email', '', 'storepayment_skrill', 1, '77.127.103.146'),
(327, 'secret', '', 'storepayment_skrill', 1, '77.127.103.146'),
(328, 'order_status', '1', 'storepayment_skrill', 1, '77.127.103.146'),
(329, 'pending_status', '6', 'storepayment_skrill', 1, '77.127.103.146'),
(330, 'canceled_status', '11', 'storepayment_skrill', 1, '77.127.103.146'),
(331, 'failed_status', '5', 'storepayment_skrill', 1, '77.127.103.146'),
(332, 'chargeback_status', '0', 'storepayment_skrill', 1, '77.127.103.146'),
(333, 'status', '1', 'storepayment_monnify', 1, '41.190.3.226'),
(334, 'monnify_api_key', 'MK_PROD_MKE55DZGCC', 'storepayment_monnify', 1, '41.190.3.226'),
(335, 'monnify_contract_code', '622991197871', 'storepayment_monnify', 1, '41.190.3.226'),
(336, 'order_success_status', '1', 'storepayment_monnify', 1, '41.190.3.226'),
(337, 'payment_mode', 'live', 'storepayment_monnify', 1, '41.190.3.226'),
(338, 'show_sponser', '', 'site', 1, '105.112.101.8');
INSERT INTO `setting` (`setting_id`, `setting_key`, `setting_value`, `setting_type`, `setting_status`, `setting_ipaddress`) VALUES
(339, 'sponser_name', '', 'site', 1, '105.112.101.8'),
(340, 'monnify_additional_charges', '100', 'storepayment_monnify', 1, '41.190.3.226'),
(341, 'status', '0', 'marketpostback', 1, '102.89.2.180'),
(342, 'url', '', 'marketpostback', 1, '102.89.2.180'),
(343, 'static', '[]', 'marketpostback', 1, '102.89.2.180'),
(344, 'marketvendorstatus', '1', 'market_vendor', 1, '102.89.2.180'),
(345, 'commission_type', 'fixed', 'market_vendor', 1, '102.89.2.180'),
(346, 'commission_sale', '200', 'market_vendor', 1, '102.89.2.180'),
(347, 'sale_status', '1', 'market_vendor', 1, '102.89.2.180'),
(348, 'commission_number_of_click', '', 'market_vendor', 1, '102.89.2.180'),
(349, 'commission_click_commission', '', 'market_vendor', 1, '102.89.2.180'),
(350, 'click_status', '0', 'market_vendor', 1, '102.89.2.180'),
(351, 'menu_on_front', '0', 'store', 1, '::1'),
(352, 'menu_on_front_blank', '0', 'store', 1, '::1'),
(353, 'contact_us_map', '', 'store', 1, '::1'),
(354, 'address', '', 'store', 1, '::1'),
(355, 'email', '', 'store', 1, '::1'),
(356, 'contact_number', '', 'store', 1, '::1'),
(357, 'is_variation_filter', '1', 'store', 1, '::1'),
(358, 'homepage_banner', '{\"title\":\"Afrocentric Store\",\"content\":\"Where you get every subscription and goods to run your business smoothly. \",\"button_text\":\"Explore our store\",\"button_link\":\"#\"}', 'store', 1, '::1'),
(359, 'homepage_bottom_section', '{\"content\":\"<p>Afrocentric Products and services are meant for everyone to make life easier and splendid. Browse through all our goodies and use to your content. Looking for how you can get more pay, why not create a store like this for free and start selling for that man to make a fee for yourself.<\\/p>\"}', 'store', 1, '::1'),
(360, 'homepage_slider', '[{\"index\":\"1\",\"title\":\"APP3STAR STORE\",\"sub_title\":\"\",\"content\":\"Pick and  Pay \",\"slider_background_image\":\"\",\"button_text\":\"\",\"button_link\":\"\",\"slider_text_color\":\"#FFFFFF\",\"button_text_color\":\"#000000\",\"button_bg_color\":\"#FFFFFF\"}]', 'store', 1, '::1'),
(361, 'homepage_features', '[]', 'store', 1, '::1'),
(362, 'bs_cards', '[{\"index\":\"1\",\"title\":\"Preparing for birth\",\"sub_title\":\"Preparing for birth\",\"bg_color\":\"#FFFFFF\",\"feature_image\":\"EFiZaYw59znlKQmUuXSctDfC102OoM7s.jpg\"}]', 'store', 1, '::1'),
(363, 'social_links', '[]', 'store', 1, '::1'),
(364, 'custom_page', '[]', 'store', 1, '::1'),
(365, 'footer_menu', '[]', 'store', 1, '::1'),
(366, 'storestatus', '1', 'vendor', 1, '::1'),
(367, 'admin_click_count', '', 'vendor', 1, '::1'),
(368, 'admin_click_amount', '', 'vendor', 1, '::1'),
(369, 'admin_sale_commission_type', 'fixed', 'vendor', 1, '::1'),
(370, 'admin_commission_value', '200', 'vendor', 1, '::1'),
(371, 'click_allow', 'single', 'productsetting', 1, '::1'),
(372, 'status', '0', 'order_comment', 1, '::1'),
(373, 'title', '[]', 'order_comment', 1, '::1'),
(374, 'notification', '[\"Subscribe to Posim. Regular, business\",\"Get Bankon3 Subscription today\",\"Buy School Access card for your children result here\",\"Get SMS at a cheaper rate\"]', 'store', 1, '::1'),
(375, 'bscimage', 'uRvVsfLZMWA2b93HjOy5PdqCkKS7BEhI.jpg', 'store', 1, '105.112.102.237'),
(376, 'status', '1', 'membership', 1, '197.210.29.253'),
(377, 'notificationbefore', '7', 'membership', 1, '197.210.29.253'),
(378, 'default_plan_id', '1', 'membership', 1, '197.210.29.253'),
(379, 'click_allow', 'single', 'market_vendor', 1, '102.89.2.180'),
(380, 'show_sponser', 'real_sponser', 'referlevel', 1, '197.210.47.27'),
(381, 'sponser_name', 'VHMS247', 'referlevel', 1, '197.210.47.27'),
(382, 'maintenance_mode', '0', 'site', 1, '39.34.160.60'),
(383, 'store_maintenance_mode', '0', 'site', 1, '39.34.160.60'),
(384, 'session_timeout', '', 'site', 1, '39.34.160.60'),
(385, 'fbmessager_script', '', 'site', 1, '39.34.160.60'),
(386, 'registration_approval', '1', 'store', 1, '39.34.160.60'),
(387, 'smtp_crypto', '', 'email', 1, '39.34.160.60');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', 101),
(2, 'Andhra Pradesh', 101),
(3, 'Arunachal Pradesh', 101),
(4, 'Assam', 101),
(5, 'Bihar', 101),
(6, 'Chandigarh', 101),
(7, 'Chhattisgarh', 101),
(8, 'Dadra and Nagar Haveli', 101),
(9, 'Daman and Diu', 101),
(10, 'Delhi', 101),
(11, 'Goa', 101),
(12, 'Gujarat', 101),
(13, 'Haryana', 101),
(14, 'Himachal Pradesh', 101),
(15, 'Jammu and Kashmir', 101),
(16, 'Jharkhand', 101),
(17, 'Karnataka', 101),
(18, 'Kenmore', 101),
(19, 'Kerala', 101),
(20, 'Lakshadweep', 101),
(21, 'Madhya Pradesh', 101),
(22, 'Maharashtra', 101),
(23, 'Manipur', 101),
(24, 'Meghalaya', 101),
(25, 'Mizoram', 101),
(26, 'Nagaland', 101),
(27, 'Narora', 101),
(28, 'Natwar', 101),
(29, 'Odisha', 101),
(30, 'Paschim Medinipur', 101),
(31, 'Pondicherry', 101),
(32, 'Punjab', 101),
(33, 'Rajasthan', 101),
(34, 'Sikkim', 101),
(35, 'Tamil Nadu', 101),
(36, 'Telangana', 101),
(37, 'Tripura', 101),
(38, 'Uttar Pradesh', 101),
(39, 'Uttarakhand', 101),
(40, 'Vaishali', 101),
(41, 'West Bengal', 101),
(42, 'Badakhshan', 1),
(43, 'Badgis', 1),
(44, 'Baglan', 1),
(45, 'Balkh', 1),
(46, 'Bamiyan', 1),
(47, 'Farah', 1),
(48, 'Faryab', 1),
(49, 'Gawr', 1),
(50, 'Gazni', 1),
(51, 'Herat', 1),
(52, 'Hilmand', 1),
(53, 'Jawzjan', 1),
(54, 'Kabul', 1),
(55, 'Kapisa', 1),
(56, 'Khawst', 1),
(57, 'Kunar', 1),
(58, 'Lagman', 1),
(59, 'Lawghar', 1),
(60, 'Nangarhar', 1),
(61, 'Nimruz', 1),
(62, 'Nuristan', 1),
(63, 'Paktika', 1),
(64, 'Paktiya', 1),
(65, 'Parwan', 1),
(66, 'Qandahar', 1),
(67, 'Qunduz', 1),
(68, 'Samangan', 1),
(69, 'Sar-e Pul', 1),
(70, 'Takhar', 1),
(71, 'Uruzgan', 1),
(72, 'Wardag', 1),
(73, 'Zabul', 1),
(74, 'Berat', 2),
(75, 'Bulqize', 2),
(76, 'Delvine', 2),
(77, 'Devoll', 2),
(78, 'Dibre', 2),
(79, 'Durres', 2),
(80, 'Elbasan', 2),
(81, 'Fier', 2),
(82, 'Gjirokaster', 2),
(83, 'Gramsh', 2),
(84, 'Has', 2),
(85, 'Kavaje', 2),
(86, 'Kolonje', 2),
(87, 'Korce', 2),
(88, 'Kruje', 2),
(89, 'Kucove', 2),
(90, 'Kukes', 2),
(91, 'Kurbin', 2),
(92, 'Lezhe', 2),
(93, 'Librazhd', 2),
(94, 'Lushnje', 2),
(95, 'Mallakaster', 2),
(96, 'Malsi e Madhe', 2),
(97, 'Mat', 2),
(98, 'Mirdite', 2),
(99, 'Peqin', 2),
(100, 'Permet', 2),
(101, 'Pogradec', 2),
(102, 'Puke', 2),
(103, 'Sarande', 2),
(104, 'Shkoder', 2),
(105, 'Skrapar', 2),
(106, 'Tepelene', 2),
(107, 'Tirane', 2),
(108, 'Tropoje', 2),
(109, 'Vlore', 2),
(110, '\'Ayn Daflah', 3),
(111, '\'Ayn Tamushanat', 3),
(112, 'Adrar', 3),
(113, 'Algiers', 3),
(114, 'Annabah', 3),
(115, 'Bashshar', 3),
(116, 'Batnah', 3),
(117, 'Bijayah', 3),
(118, 'Biskrah', 3),
(119, 'Blidah', 3),
(120, 'Buirah', 3),
(121, 'Bumardas', 3),
(122, 'Burj Bu Arririj', 3),
(123, 'Ghalizan', 3),
(124, 'Ghardayah', 3),
(125, 'Ilizi', 3),
(126, 'Jijili', 3),
(127, 'Jilfah', 3),
(128, 'Khanshalah', 3),
(129, 'Masilah', 3),
(130, 'Midyah', 3),
(131, 'Milah', 3),
(132, 'Muaskar', 3),
(133, 'Mustaghanam', 3),
(134, 'Naama', 3),
(135, 'Oran', 3),
(136, 'Ouargla', 3),
(137, 'Qalmah', 3),
(138, 'Qustantinah', 3),
(139, 'Sakikdah', 3),
(140, 'Satif', 3),
(141, 'Sayda\'', 3),
(142, 'Sidi ban-al-\'Abbas', 3),
(143, 'Suq Ahras', 3),
(144, 'Tamanghasat', 3),
(145, 'Tibazah', 3),
(146, 'Tibissah', 3),
(147, 'Tilimsan', 3),
(148, 'Tinduf', 3),
(149, 'Tisamsilt', 3),
(150, 'Tiyarat', 3),
(151, 'Tizi Wazu', 3),
(152, 'Umm-al-Bawaghi', 3),
(153, 'Wahran', 3),
(154, 'Warqla', 3),
(155, 'Wilaya d Alger', 3),
(156, 'Wilaya de Bejaia', 3),
(157, 'Wilaya de Constantine', 3),
(158, 'al-Aghwat', 3),
(159, 'al-Bayadh', 3),
(160, 'al-Jaza\'ir', 3),
(161, 'al-Wad', 3),
(162, 'ash-Shalif', 3),
(163, 'at-Tarif', 3),
(164, 'Eastern', 4),
(165, 'Manu\'a', 4),
(166, 'Swains Island', 4),
(167, 'Western', 4),
(168, 'Andorra la Vella', 5),
(169, 'Canillo', 5),
(170, 'Encamp', 5),
(171, 'La Massana', 5),
(172, 'Les Escaldes', 5),
(173, 'Ordino', 5),
(174, 'Sant Julia de Loria', 5),
(175, 'Bengo', 6),
(176, 'Benguela', 6),
(177, 'Bie', 6),
(178, 'Cabinda', 6),
(179, 'Cunene', 6),
(180, 'Huambo', 6),
(181, 'Huila', 6),
(182, 'Kuando-Kubango', 6),
(183, 'Kwanza Norte', 6),
(184, 'Kwanza Sul', 6),
(185, 'Luanda', 6),
(186, 'Lunda Norte', 6),
(187, 'Lunda Sul', 6),
(188, 'Malanje', 6),
(189, 'Moxico', 6),
(190, 'Namibe', 6),
(191, 'Uige', 6),
(192, 'Zaire', 6),
(193, 'Other Provinces', 7),
(194, 'Sector claimed by Argentina/Ch', 8),
(195, 'Sector claimed by Argentina/UK', 8),
(196, 'Sector claimed by Australia', 8),
(197, 'Sector claimed by France', 8),
(198, 'Sector claimed by New Zealand', 8),
(199, 'Sector claimed by Norway', 8),
(200, 'Unclaimed Sector', 8),
(201, 'Barbuda', 9),
(202, 'Saint George', 9),
(203, 'Saint John', 9),
(204, 'Saint Mary', 9),
(205, 'Saint Paul', 9),
(206, 'Saint Peter', 9),
(207, 'Saint Philip', 9),
(208, 'Buenos Aires', 10),
(209, 'Catamarca', 10),
(210, 'Chaco', 10),
(211, 'Chubut', 10),
(212, 'Cordoba', 10),
(213, 'Corrientes', 10),
(214, 'Distrito Federal', 10),
(215, 'Entre Rios', 10),
(216, 'Formosa', 10),
(217, 'Jujuy', 10),
(218, 'La Pampa', 10),
(219, 'La Rioja', 10),
(220, 'Mendoza', 10),
(221, 'Misiones', 10),
(222, 'Neuquen', 10),
(223, 'Rio Negro', 10),
(224, 'Salta', 10),
(225, 'San Juan', 10),
(226, 'San Luis', 10),
(227, 'Santa Cruz', 10),
(228, 'Santa Fe', 10),
(229, 'Santiago del Estero', 10),
(230, 'Tierra del Fuego', 10),
(231, 'Tucuman', 10),
(232, 'Aragatsotn', 11),
(233, 'Ararat', 11),
(234, 'Armavir', 11),
(235, 'Gegharkunik', 11),
(236, 'Kotaik', 11),
(237, 'Lori', 11),
(238, 'Shirak', 11),
(239, 'Stepanakert', 11),
(240, 'Syunik', 11),
(241, 'Tavush', 11),
(242, 'Vayots Dzor', 11),
(243, 'Yerevan', 11),
(244, 'Aruba', 12),
(245, 'Auckland', 13),
(246, 'Australian Capital Territory', 13),
(247, 'Balgowlah', 13),
(248, 'Balmain', 13),
(249, 'Bankstown', 13),
(250, 'Baulkham Hills', 13),
(251, 'Bonnet Bay', 13),
(252, 'Camberwell', 13),
(253, 'Carole Park', 13),
(254, 'Castle Hill', 13),
(255, 'Caulfield', 13),
(256, 'Chatswood', 13),
(257, 'Cheltenham', 13),
(258, 'Cherrybrook', 13),
(259, 'Clayton', 13),
(260, 'Collingwood', 13),
(261, 'Frenchs Forest', 13),
(262, 'Hawthorn', 13),
(263, 'Jannnali', 13),
(264, 'Knoxfield', 13),
(265, 'Melbourne', 13),
(266, 'New South Wales', 13),
(267, 'Northern Territory', 13),
(268, 'Perth', 13),
(269, 'Queensland', 13),
(270, 'South Australia', 13),
(271, 'Tasmania', 13),
(272, 'Templestowe', 13),
(273, 'Victoria', 13),
(274, 'Werribee south', 13),
(275, 'Western Australia', 13),
(276, 'Wheeler', 13),
(277, 'Bundesland Salzburg', 14),
(278, 'Bundesland Steiermark', 14),
(279, 'Bundesland Tirol', 14),
(280, 'Burgenland', 14),
(281, 'Carinthia', 14),
(282, 'Karnten', 14),
(283, 'Liezen', 14),
(284, 'Lower Austria', 14),
(285, 'Niederosterreich', 14),
(286, 'Oberosterreich', 14),
(287, 'Salzburg', 14),
(288, 'Schleswig-Holstein', 14),
(289, 'Steiermark', 14),
(290, 'Styria', 14),
(291, 'Tirol', 14),
(292, 'Upper Austria', 14),
(293, 'Vorarlberg', 14),
(294, 'Wien', 14),
(295, 'Abseron', 15),
(296, 'Baki Sahari', 15),
(297, 'Ganca', 15),
(298, 'Ganja', 15),
(299, 'Kalbacar', 15),
(300, 'Lankaran', 15),
(301, 'Mil-Qarabax', 15),
(302, 'Mugan-Salyan', 15),
(303, 'Nagorni-Qarabax', 15),
(304, 'Naxcivan', 15),
(305, 'Priaraks', 15),
(306, 'Qazax', 15),
(307, 'Saki', 15),
(308, 'Sirvan', 15),
(309, 'Xacmaz', 15),
(310, 'Abaco', 16),
(311, 'Acklins Island', 16),
(312, 'Andros', 16),
(313, 'Berry Islands', 16),
(314, 'Biminis', 16),
(315, 'Cat Island', 16),
(316, 'Crooked Island', 16),
(317, 'Eleuthera', 16),
(318, 'Exuma and Cays', 16),
(319, 'Grand Bahama', 16),
(320, 'Inagua Islands', 16),
(321, 'Long Island', 16),
(322, 'Mayaguana', 16),
(323, 'New Providence', 16),
(324, 'Ragged Island', 16),
(325, 'Rum Cay', 16),
(326, 'San Salvador', 16),
(327, '\'Isa', 17),
(328, 'Badiyah', 17),
(329, 'Hidd', 17),
(330, 'Jidd Hafs', 17),
(331, 'Mahama', 17),
(332, 'Manama', 17),
(333, 'Sitrah', 17),
(334, 'al-Manamah', 17),
(335, 'al-Muharraq', 17),
(336, 'ar-Rifa\'a', 17),
(337, 'Bagar Hat', 18),
(338, 'Bandarban', 18),
(339, 'Barguna', 18),
(340, 'Barisal', 18),
(341, 'Bhola', 18),
(342, 'Bogora', 18),
(343, 'Brahman Bariya', 18),
(344, 'Chandpur', 18),
(345, 'Chattagam', 18),
(346, 'Chittagong Division', 18),
(347, 'Chuadanga', 18),
(348, 'Dhaka', 18),
(349, 'Dinajpur', 18),
(350, 'Faridpur', 18),
(351, 'Feni', 18),
(352, 'Gaybanda', 18),
(353, 'Gazipur', 18),
(354, 'Gopalganj', 18),
(355, 'Habiganj', 18),
(356, 'Jaipur Hat', 18),
(357, 'Jamalpur', 18),
(358, 'Jessor', 18),
(359, 'Jhalakati', 18),
(360, 'Jhanaydah', 18),
(361, 'Khagrachhari', 18),
(362, 'Khulna', 18),
(363, 'Kishorganj', 18),
(364, 'Koks Bazar', 18),
(365, 'Komilla', 18),
(366, 'Kurigram', 18),
(367, 'Kushtiya', 18),
(368, 'Lakshmipur', 18),
(369, 'Lalmanir Hat', 18),
(370, 'Madaripur', 18),
(371, 'Magura', 18),
(372, 'Maimansingh', 18),
(373, 'Manikganj', 18),
(374, 'Maulvi Bazar', 18),
(375, 'Meherpur', 18),
(376, 'Munshiganj', 18),
(377, 'Naral', 18),
(378, 'Narayanganj', 18),
(379, 'Narsingdi', 18),
(380, 'Nator', 18),
(381, 'Naugaon', 18),
(382, 'Nawabganj', 18),
(383, 'Netrakona', 18),
(384, 'Nilphamari', 18),
(385, 'Noakhali', 18),
(386, 'Pabna', 18),
(387, 'Panchagarh', 18),
(388, 'Patuakhali', 18),
(389, 'Pirojpur', 18),
(390, 'Rajbari', 18),
(391, 'Rajshahi', 18),
(392, 'Rangamati', 18),
(393, 'Rangpur', 18),
(394, 'Satkhira', 18),
(395, 'Shariatpur', 18),
(396, 'Sherpur', 18),
(397, 'Silhat', 18),
(398, 'Sirajganj', 18),
(399, 'Sunamganj', 18),
(400, 'Tangayal', 18),
(401, 'Thakurgaon', 18),
(402, 'Christ Church', 19),
(403, 'Saint Andrew', 19),
(404, 'Saint George', 19),
(405, 'Saint James', 19),
(406, 'Saint John', 19),
(407, 'Saint Joseph', 19),
(408, 'Saint Lucy', 19),
(409, 'Saint Michael', 19),
(410, 'Saint Peter', 19),
(411, 'Saint Philip', 19),
(412, 'Saint Thomas', 19),
(413, 'Brest', 20),
(414, 'Homjel\'', 20),
(415, 'Hrodna', 20),
(416, 'Mahiljow', 20),
(417, 'Mahilyowskaya Voblasts', 20),
(418, 'Minsk', 20),
(419, 'Minskaja Voblasts\'', 20),
(420, 'Petrik', 20),
(421, 'Vicebsk', 20),
(422, 'Antwerpen', 21),
(423, 'Berchem', 21),
(424, 'Brabant', 21),
(425, 'Brabant Wallon', 21),
(426, 'Brussel', 21),
(427, 'East Flanders', 21),
(428, 'Hainaut', 21),
(429, 'Liege', 21),
(430, 'Limburg', 21),
(431, 'Luxembourg', 21),
(432, 'Namur', 21),
(433, 'Ontario', 21),
(434, 'Oost-Vlaanderen', 21),
(435, 'Provincie Brabant', 21),
(436, 'Vlaams-Brabant', 21),
(437, 'Wallonne', 21),
(438, 'West-Vlaanderen', 21),
(439, 'Belize', 22),
(440, 'Cayo', 22),
(441, 'Corozal', 22),
(442, 'Orange Walk', 22),
(443, 'Stann Creek', 22),
(444, 'Toledo', 22),
(445, 'Alibori', 23),
(446, 'Atacora', 23),
(447, 'Atlantique', 23),
(448, 'Borgou', 23),
(449, 'Collines', 23),
(450, 'Couffo', 23),
(451, 'Donga', 23),
(452, 'Littoral', 23),
(453, 'Mono', 23),
(454, 'Oueme', 23),
(455, 'Plateau', 23),
(456, 'Zou', 23),
(457, 'Hamilton', 24),
(458, 'Saint George', 24),
(459, 'Bumthang', 25),
(460, 'Chhukha', 25),
(461, 'Chirang', 25),
(462, 'Daga', 25),
(463, 'Geylegphug', 25),
(464, 'Ha', 25),
(465, 'Lhuntshi', 25),
(466, 'Mongar', 25),
(467, 'Pemagatsel', 25),
(468, 'Punakha', 25),
(469, 'Rinpung', 25),
(470, 'Samchi', 25),
(471, 'Samdrup Jongkhar', 25),
(472, 'Shemgang', 25),
(473, 'Tashigang', 25),
(474, 'Timphu', 25),
(475, 'Tongsa', 25),
(476, 'Wangdiphodrang', 25),
(477, 'Beni', 26),
(478, 'Chuquisaca', 26),
(479, 'Cochabamba', 26),
(480, 'La Paz', 26),
(481, 'Oruro', 26),
(482, 'Pando', 26),
(483, 'Potosi', 26),
(484, 'Santa Cruz', 26),
(485, 'Tarija', 26),
(486, 'Federacija Bosna i Hercegovina', 27),
(487, 'Republika Srpska', 27),
(488, 'Central Bobonong', 28),
(489, 'Central Boteti', 28),
(490, 'Central Mahalapye', 28),
(491, 'Central Serowe-Palapye', 28),
(492, 'Central Tutume', 28),
(493, 'Chobe', 28),
(494, 'Francistown', 28),
(495, 'Gaborone', 28),
(496, 'Ghanzi', 28),
(497, 'Jwaneng', 28),
(498, 'Kgalagadi North', 28),
(499, 'Kgalagadi South', 28),
(500, 'Kgatleng', 28),
(501, 'Kweneng', 28),
(502, 'Lobatse', 28),
(503, 'Ngamiland', 28),
(504, 'Ngwaketse', 28),
(505, 'North East', 28),
(506, 'Okavango', 28),
(507, 'Orapa', 28),
(508, 'Selibe Phikwe', 28),
(509, 'South East', 28),
(510, 'Sowa', 28),
(511, 'Bouvet Island', 29),
(512, 'Acre', 30),
(513, 'Alagoas', 30),
(514, 'Amapa', 30),
(515, 'Amazonas', 30),
(516, 'Bahia', 30),
(517, 'Ceara', 30),
(518, 'Distrito Federal', 30),
(519, 'Espirito Santo', 30),
(520, 'Estado de Sao Paulo', 30),
(521, 'Goias', 30),
(522, 'Maranhao', 30),
(523, 'Mato Grosso', 30),
(524, 'Mato Grosso do Sul', 30),
(525, 'Minas Gerais', 30),
(526, 'Para', 30),
(527, 'Paraiba', 30),
(528, 'Parana', 30),
(529, 'Pernambuco', 30),
(530, 'Piaui', 30),
(531, 'Rio Grande do Norte', 30),
(532, 'Rio Grande do Sul', 30),
(533, 'Rio de Janeiro', 30),
(534, 'Rondonia', 30),
(535, 'Roraima', 30),
(536, 'Santa Catarina', 30),
(537, 'Sao Paulo', 30),
(538, 'Sergipe', 30),
(539, 'Tocantins', 30),
(540, 'British Indian Ocean Territory', 31),
(541, 'Belait', 32),
(542, 'Brunei-Muara', 32),
(543, 'Temburong', 32),
(544, 'Tutong', 32),
(545, 'Blagoevgrad', 33),
(546, 'Burgas', 33),
(547, 'Dobrich', 33),
(548, 'Gabrovo', 33),
(549, 'Haskovo', 33),
(550, 'Jambol', 33),
(551, 'Kardzhali', 33),
(552, 'Kjustendil', 33),
(553, 'Lovech', 33),
(554, 'Montana', 33),
(555, 'Oblast Sofiya-Grad', 33),
(556, 'Pazardzhik', 33),
(557, 'Pernik', 33),
(558, 'Pleven', 33),
(559, 'Plovdiv', 33),
(560, 'Razgrad', 33),
(561, 'Ruse', 33),
(562, 'Shumen', 33),
(563, 'Silistra', 33),
(564, 'Sliven', 33),
(565, 'Smoljan', 33),
(566, 'Sofija grad', 33),
(567, 'Sofijska oblast', 33),
(568, 'Stara Zagora', 33),
(569, 'Targovishte', 33),
(570, 'Varna', 33),
(571, 'Veliko Tarnovo', 33),
(572, 'Vidin', 33),
(573, 'Vraca', 33),
(574, 'Yablaniza', 33),
(575, 'Bale', 34),
(576, 'Bam', 34),
(577, 'Bazega', 34),
(578, 'Bougouriba', 34),
(579, 'Boulgou', 34),
(580, 'Boulkiemde', 34),
(581, 'Comoe', 34),
(582, 'Ganzourgou', 34),
(583, 'Gnagna', 34),
(584, 'Gourma', 34),
(585, 'Houet', 34),
(586, 'Ioba', 34),
(587, 'Kadiogo', 34),
(588, 'Kenedougou', 34),
(589, 'Komandjari', 34),
(590, 'Kompienga', 34),
(591, 'Kossi', 34),
(592, 'Kouritenga', 34),
(593, 'Kourweogo', 34),
(594, 'Leraba', 34),
(595, 'Mouhoun', 34),
(596, 'Nahouri', 34),
(597, 'Namentenga', 34),
(598, 'Noumbiel', 34),
(599, 'Oubritenga', 34),
(600, 'Oudalan', 34),
(601, 'Passore', 34),
(602, 'Poni', 34),
(603, 'Sanguie', 34),
(604, 'Sanmatenga', 34),
(605, 'Seno', 34),
(606, 'Sissili', 34),
(607, 'Soum', 34),
(608, 'Sourou', 34),
(609, 'Tapoa', 34),
(610, 'Tuy', 34),
(611, 'Yatenga', 34),
(612, 'Zondoma', 34),
(613, 'Zoundweogo', 34),
(614, 'Bubanza', 35),
(615, 'Bujumbura', 35),
(616, 'Bururi', 35),
(617, 'Cankuzo', 35),
(618, 'Cibitoke', 35),
(619, 'Gitega', 35),
(620, 'Karuzi', 35),
(621, 'Kayanza', 35),
(622, 'Kirundo', 35),
(623, 'Makamba', 35),
(624, 'Muramvya', 35),
(625, 'Muyinga', 35),
(626, 'Ngozi', 35),
(627, 'Rutana', 35),
(628, 'Ruyigi', 35),
(629, 'Banteay Mean Chey', 36),
(630, 'Bat Dambang', 36),
(631, 'Kampong Cham', 36),
(632, 'Kampong Chhnang', 36),
(633, 'Kampong Spoeu', 36),
(634, 'Kampong Thum', 36),
(635, 'Kampot', 36),
(636, 'Kandal', 36),
(637, 'Kaoh Kong', 36),
(638, 'Kracheh', 36),
(639, 'Krong Kaeb', 36),
(640, 'Krong Pailin', 36),
(641, 'Krong Preah Sihanouk', 36),
(642, 'Mondol Kiri', 36),
(643, 'Otdar Mean Chey', 36),
(644, 'Phnum Penh', 36),
(645, 'Pousat', 36),
(646, 'Preah Vihear', 36),
(647, 'Prey Veaeng', 36),
(648, 'Rotanak Kiri', 36),
(649, 'Siem Reab', 36),
(650, 'Stueng Traeng', 36),
(651, 'Svay Rieng', 36),
(652, 'Takaev', 36),
(653, 'Adamaoua', 37),
(654, 'Centre', 37),
(655, 'Est', 37),
(656, 'Littoral', 37),
(657, 'Nord', 37),
(658, 'Nord Extreme', 37),
(659, 'Nordouest', 37),
(660, 'Ouest', 37),
(661, 'Sud', 37),
(662, 'Sudouest', 37),
(663, 'Alberta', 38),
(664, 'British Columbia', 38),
(665, 'Manitoba', 38),
(666, 'New Brunswick', 38),
(667, 'Newfoundland and Labrador', 38),
(668, 'Northwest Territories', 38),
(669, 'Nova Scotia', 38),
(670, 'Nunavut', 38),
(671, 'Ontario', 38),
(672, 'Prince Edward Island', 38),
(673, 'Quebec', 38),
(674, 'Saskatchewan', 38),
(675, 'Yukon', 38),
(676, 'Boavista', 39),
(677, 'Brava', 39),
(678, 'Fogo', 39),
(679, 'Maio', 39),
(680, 'Sal', 39),
(681, 'Santo Antao', 39),
(682, 'Sao Nicolau', 39),
(683, 'Sao Tiago', 39),
(684, 'Sao Vicente', 39),
(685, 'Grand Cayman', 40),
(686, 'Bamingui-Bangoran', 41),
(687, 'Bangui', 41),
(688, 'Basse-Kotto', 41),
(689, 'Haut-Mbomou', 41),
(690, 'Haute-Kotto', 41),
(691, 'Kemo', 41),
(692, 'Lobaye', 41),
(693, 'Mambere-Kadei', 41),
(694, 'Mbomou', 41),
(695, 'Nana-Gribizi', 41),
(696, 'Nana-Mambere', 41),
(697, 'Ombella Mpoko', 41),
(698, 'Ouaka', 41),
(699, 'Ouham', 41),
(700, 'Ouham-Pende', 41),
(701, 'Sangha-Mbaere', 41),
(702, 'Vakaga', 41),
(703, 'Batha', 42),
(704, 'Biltine', 42),
(705, 'Bourkou-Ennedi-Tibesti', 42),
(706, 'Chari-Baguirmi', 42),
(707, 'Guera', 42),
(708, 'Kanem', 42),
(709, 'Lac', 42),
(710, 'Logone Occidental', 42),
(711, 'Logone Oriental', 42),
(712, 'Mayo-Kebbi', 42),
(713, 'Moyen-Chari', 42),
(714, 'Ouaddai', 42),
(715, 'Salamat', 42),
(716, 'Tandjile', 42),
(717, 'Aisen', 43),
(718, 'Antofagasta', 43),
(719, 'Araucania', 43),
(720, 'Atacama', 43),
(721, 'Bio Bio', 43),
(722, 'Coquimbo', 43),
(723, 'Libertador General Bernardo O\'', 43),
(724, 'Los Lagos', 43),
(725, 'Magellanes', 43),
(726, 'Maule', 43),
(727, 'Metropolitana', 43),
(728, 'Metropolitana de Santiago', 43),
(729, 'Tarapaca', 43),
(730, 'Valparaiso', 43),
(731, 'Anhui', 44),
(732, 'Anhui Province', 44),
(733, 'Anhui Sheng', 44),
(734, 'Aomen', 44),
(735, 'Beijing', 44),
(736, 'Beijing Shi', 44),
(737, 'Chongqing', 44),
(738, 'Fujian', 44),
(739, 'Fujian Sheng', 44),
(740, 'Gansu', 44),
(741, 'Guangdong', 44),
(742, 'Guangdong Sheng', 44),
(743, 'Guangxi', 44),
(744, 'Guizhou', 44),
(745, 'Hainan', 44),
(746, 'Hebei', 44),
(747, 'Heilongjiang', 44),
(748, 'Henan', 44),
(749, 'Hubei', 44),
(750, 'Hunan', 44),
(751, 'Jiangsu', 44),
(752, 'Jiangsu Sheng', 44),
(753, 'Jiangxi', 44),
(754, 'Jilin', 44),
(755, 'Liaoning', 44),
(756, 'Liaoning Sheng', 44),
(757, 'Nei Monggol', 44),
(758, 'Ningxia Hui', 44),
(759, 'Qinghai', 44),
(760, 'Shaanxi', 44),
(761, 'Shandong', 44),
(762, 'Shandong Sheng', 44),
(763, 'Shanghai', 44),
(764, 'Shanxi', 44),
(765, 'Sichuan', 44),
(766, 'Tianjin', 44),
(767, 'Xianggang', 44),
(768, 'Xinjiang', 44),
(769, 'Xizang', 44),
(770, 'Yunnan', 44),
(771, 'Zhejiang', 44),
(772, 'Zhejiang Sheng', 44),
(773, 'Christmas Island', 45),
(774, 'Cocos (Keeling) Islands', 46),
(775, 'Amazonas', 47),
(776, 'Antioquia', 47),
(777, 'Arauca', 47),
(778, 'Atlantico', 47),
(779, 'Bogota', 47),
(780, 'Bolivar', 47),
(781, 'Boyaca', 47),
(782, 'Caldas', 47),
(783, 'Caqueta', 47),
(784, 'Casanare', 47),
(785, 'Cauca', 47),
(786, 'Cesar', 47),
(787, 'Choco', 47),
(788, 'Cordoba', 47),
(789, 'Cundinamarca', 47),
(790, 'Guainia', 47),
(791, 'Guaviare', 47),
(792, 'Huila', 47),
(793, 'La Guajira', 47),
(794, 'Magdalena', 47),
(795, 'Meta', 47),
(796, 'Narino', 47),
(797, 'Norte de Santander', 47),
(798, 'Putumayo', 47),
(799, 'Quindio', 47),
(800, 'Risaralda', 47),
(801, 'San Andres y Providencia', 47),
(802, 'Santander', 47),
(803, 'Sucre', 47),
(804, 'Tolima', 47),
(805, 'Valle del Cauca', 47),
(806, 'Vaupes', 47),
(807, 'Vichada', 47),
(808, 'Mwali', 48),
(809, 'Njazidja', 48),
(810, 'Nzwani', 48),
(811, 'Bouenza', 49),
(812, 'Brazzaville', 49),
(813, 'Cuvette', 49),
(814, 'Kouilou', 49),
(815, 'Lekoumou', 49),
(816, 'Likouala', 49),
(817, 'Niari', 49),
(818, 'Plateaux', 49),
(819, 'Pool', 49),
(820, 'Sangha', 49),
(821, 'Bandundu', 50),
(822, 'Bas-Congo', 50),
(823, 'Equateur', 50),
(824, 'Haut-Congo', 50),
(825, 'Kasai-Occidental', 50),
(826, 'Kasai-Oriental', 50),
(827, 'Katanga', 50),
(828, 'Kinshasa', 50),
(829, 'Maniema', 50),
(830, 'Nord-Kivu', 50),
(831, 'Sud-Kivu', 50),
(832, 'Aitutaki', 51),
(833, 'Atiu', 51),
(834, 'Mangaia', 51),
(835, 'Manihiki', 51),
(836, 'Mauke', 51),
(837, 'Mitiaro', 51),
(838, 'Nassau', 51),
(839, 'Pukapuka', 51),
(840, 'Rakahanga', 51),
(841, 'Rarotonga', 51),
(842, 'Tongareva', 51),
(843, 'Alajuela', 52),
(844, 'Cartago', 52),
(845, 'Guanacaste', 52),
(846, 'Heredia', 52),
(847, 'Limon', 52),
(848, 'Puntarenas', 52),
(849, 'San Jose', 52),
(850, 'Abidjan', 53),
(851, 'Agneby', 53),
(852, 'Bafing', 53),
(853, 'Denguele', 53),
(854, 'Dix-huit Montagnes', 53),
(855, 'Fromager', 53),
(856, 'Haut-Sassandra', 53),
(857, 'Lacs', 53),
(858, 'Lagunes', 53),
(859, 'Marahoue', 53),
(860, 'Moyen-Cavally', 53),
(861, 'Moyen-Comoe', 53),
(862, 'N\'zi-Comoe', 53),
(863, 'Sassandra', 53),
(864, 'Savanes', 53),
(865, 'Sud-Bandama', 53),
(866, 'Sud-Comoe', 53),
(867, 'Vallee du Bandama', 53),
(868, 'Worodougou', 53),
(869, 'Zanzan', 53),
(870, 'Bjelovar-Bilogora', 54),
(871, 'Dubrovnik-Neretva', 54),
(872, 'Grad Zagreb', 54),
(873, 'Istra', 54),
(874, 'Karlovac', 54),
(875, 'Koprivnica-Krizhevci', 54),
(876, 'Krapina-Zagorje', 54),
(877, 'Lika-Senj', 54),
(878, 'Medhimurje', 54),
(879, 'Medimurska Zupanija', 54),
(880, 'Osijek-Baranja', 54),
(881, 'Osjecko-Baranjska Zupanija', 54),
(882, 'Pozhega-Slavonija', 54),
(883, 'Primorje-Gorski Kotar', 54),
(884, 'Shibenik-Knin', 54),
(885, 'Sisak-Moslavina', 54),
(886, 'Slavonski Brod-Posavina', 54),
(887, 'Split-Dalmacija', 54),
(888, 'Varazhdin', 54),
(889, 'Virovitica-Podravina', 54),
(890, 'Vukovar-Srijem', 54),
(891, 'Zadar', 54),
(892, 'Zagreb', 54),
(893, 'Camaguey', 55),
(894, 'Ciego de Avila', 55),
(895, 'Cienfuegos', 55),
(896, 'Ciudad de la Habana', 55),
(897, 'Granma', 55),
(898, 'Guantanamo', 55),
(899, 'Habana', 55),
(900, 'Holguin', 55),
(901, 'Isla de la Juventud', 55),
(902, 'La Habana', 55),
(903, 'Las Tunas', 55),
(904, 'Matanzas', 55),
(905, 'Pinar del Rio', 55),
(906, 'Sancti Spiritus', 55),
(907, 'Santiago de Cuba', 55),
(908, 'Villa Clara', 55),
(909, 'Government controlled area', 56),
(910, 'Limassol', 56),
(911, 'Nicosia District', 56),
(912, 'Paphos', 56),
(913, 'Turkish controlled area', 56),
(914, 'Central Bohemian', 57),
(915, 'Frycovice', 57),
(916, 'Jihocesky Kraj', 57),
(917, 'Jihochesky', 57),
(918, 'Jihomoravsky', 57),
(919, 'Karlovarsky', 57),
(920, 'Klecany', 57),
(921, 'Kralovehradecky', 57),
(922, 'Liberecky', 57),
(923, 'Lipov', 57),
(924, 'Moravskoslezsky', 57),
(925, 'Olomoucky', 57),
(926, 'Olomoucky Kraj', 57),
(927, 'Pardubicky', 57),
(928, 'Plzensky', 57),
(929, 'Praha', 57),
(930, 'Rajhrad', 57),
(931, 'Smirice', 57),
(932, 'South Moravian', 57),
(933, 'Straz nad Nisou', 57),
(934, 'Stredochesky', 57),
(935, 'Unicov', 57),
(936, 'Ustecky', 57),
(937, 'Valletta', 57),
(938, 'Velesin', 57),
(939, 'Vysochina', 57),
(940, 'Zlinsky', 57),
(941, 'Arhus', 58),
(942, 'Bornholm', 58),
(943, 'Frederiksborg', 58),
(944, 'Fyn', 58),
(945, 'Hovedstaden', 58),
(946, 'Kobenhavn', 58),
(947, 'Kobenhavns Amt', 58),
(948, 'Kobenhavns Kommune', 58),
(949, 'Nordjylland', 58),
(950, 'Ribe', 58),
(951, 'Ringkobing', 58),
(952, 'Roervig', 58),
(953, 'Roskilde', 58),
(954, 'Roslev', 58),
(955, 'Sjaelland', 58),
(956, 'Soeborg', 58),
(957, 'Sonderjylland', 58),
(958, 'Storstrom', 58),
(959, 'Syddanmark', 58),
(960, 'Toelloese', 58),
(961, 'Vejle', 58),
(962, 'Vestsjalland', 58),
(963, 'Viborg', 58),
(964, '\'Ali Sabih', 59),
(965, 'Dikhil', 59),
(966, 'Jibuti', 59),
(967, 'Tajurah', 59),
(968, 'Ubuk', 59),
(969, 'Saint Andrew', 60),
(970, 'Saint David', 60),
(971, 'Saint George', 60),
(972, 'Saint John', 60),
(973, 'Saint Joseph', 60),
(974, 'Saint Luke', 60),
(975, 'Saint Mark', 60),
(976, 'Saint Patrick', 60),
(977, 'Saint Paul', 60),
(978, 'Saint Peter', 60),
(979, 'Azua', 61),
(980, 'Bahoruco', 61),
(981, 'Barahona', 61),
(982, 'Dajabon', 61),
(983, 'Distrito Nacional', 61),
(984, 'Duarte', 61),
(985, 'El Seybo', 61),
(986, 'Elias Pina', 61),
(987, 'Espaillat', 61),
(988, 'Hato Mayor', 61),
(989, 'Independencia', 61),
(990, 'La Altagracia', 61),
(991, 'La Romana', 61),
(992, 'La Vega', 61),
(993, 'Maria Trinidad Sanchez', 61),
(994, 'Monsenor Nouel', 61),
(995, 'Monte Cristi', 61),
(996, 'Monte Plata', 61),
(997, 'Pedernales', 61),
(998, 'Peravia', 61),
(999, 'Puerto Plata', 61),
(1000, 'Salcedo', 61),
(1001, 'Samana', 61),
(1002, 'San Cristobal', 61),
(1003, 'San Juan', 61),
(1004, 'San Pedro de Macoris', 61),
(1005, 'Sanchez Ramirez', 61),
(1006, 'Santiago', 61),
(1007, 'Santiago Rodriguez', 61),
(1008, 'Valverde', 61),
(1009, 'Aileu', 62),
(1010, 'Ainaro', 62),
(1011, 'Ambeno', 62),
(1012, 'Baucau', 62),
(1013, 'Bobonaro', 62),
(1014, 'Cova Lima', 62),
(1015, 'Dili', 62),
(1016, 'Ermera', 62),
(1017, 'Lautem', 62),
(1018, 'Liquica', 62),
(1019, 'Manatuto', 62),
(1020, 'Manufahi', 62),
(1021, 'Viqueque', 62),
(1022, 'Azuay', 63),
(1023, 'Bolivar', 63),
(1024, 'Canar', 63),
(1025, 'Carchi', 63),
(1026, 'Chimborazo', 63),
(1027, 'Cotopaxi', 63),
(1028, 'El Oro', 63),
(1029, 'Esmeraldas', 63),
(1030, 'Galapagos', 63),
(1031, 'Guayas', 63),
(1032, 'Imbabura', 63),
(1033, 'Loja', 63),
(1034, 'Los Rios', 63),
(1035, 'Manabi', 63),
(1036, 'Morona Santiago', 63),
(1037, 'Napo', 63),
(1038, 'Orellana', 63),
(1039, 'Pastaza', 63),
(1040, 'Pichincha', 63),
(1041, 'Sucumbios', 63),
(1042, 'Tungurahua', 63),
(1043, 'Zamora Chinchipe', 63),
(1044, 'Aswan', 64),
(1045, 'Asyut', 64),
(1046, 'Bani Suwayf', 64),
(1047, 'Bur Sa\'id', 64),
(1048, 'Cairo', 64),
(1049, 'Dumyat', 64),
(1050, 'Kafr-ash-Shaykh', 64),
(1051, 'Matruh', 64),
(1052, 'Muhafazat ad Daqahliyah', 64),
(1053, 'Muhafazat al Fayyum', 64),
(1054, 'Muhafazat al Gharbiyah', 64),
(1055, 'Muhafazat al Iskandariyah', 64),
(1056, 'Muhafazat al Qahirah', 64),
(1057, 'Qina', 64),
(1058, 'Sawhaj', 64),
(1059, 'Sina al-Janubiyah', 64),
(1060, 'Sina ash-Shamaliyah', 64),
(1061, 'ad-Daqahliyah', 64),
(1062, 'al-Bahr-al-Ahmar', 64),
(1063, 'al-Buhayrah', 64),
(1064, 'al-Fayyum', 64),
(1065, 'al-Gharbiyah', 64),
(1066, 'al-Iskandariyah', 64),
(1067, 'al-Ismailiyah', 64),
(1068, 'al-Jizah', 64),
(1069, 'al-Minufiyah', 64),
(1070, 'al-Minya', 64),
(1071, 'al-Qahira', 64),
(1072, 'al-Qalyubiyah', 64),
(1073, 'al-Uqsur', 64),
(1074, 'al-Wadi al-Jadid', 64),
(1075, 'as-Suways', 64),
(1076, 'ash-Sharqiyah', 64),
(1077, 'Ahuachapan', 65),
(1078, 'Cabanas', 65),
(1079, 'Chalatenango', 65),
(1080, 'Cuscatlan', 65),
(1081, 'La Libertad', 65),
(1082, 'La Paz', 65),
(1083, 'La Union', 65),
(1084, 'Morazan', 65),
(1085, 'San Miguel', 65),
(1086, 'San Salvador', 65),
(1087, 'San Vicente', 65),
(1088, 'Santa Ana', 65),
(1089, 'Sonsonate', 65),
(1090, 'Usulutan', 65),
(1091, 'Annobon', 66),
(1092, 'Bioko Norte', 66),
(1093, 'Bioko Sur', 66),
(1094, 'Centro Sur', 66),
(1095, 'Kie-Ntem', 66),
(1096, 'Litoral', 66),
(1097, 'Wele-Nzas', 66),
(1098, 'Anseba', 67),
(1099, 'Debub', 67),
(1100, 'Debub-Keih-Bahri', 67),
(1101, 'Gash-Barka', 67),
(1102, 'Maekel', 67),
(1103, 'Semien-Keih-Bahri', 67),
(1104, 'Harju', 68),
(1105, 'Hiiu', 68),
(1106, 'Ida-Viru', 68),
(1107, 'Jarva', 68),
(1108, 'Jogeva', 68),
(1109, 'Laane', 68),
(1110, 'Laane-Viru', 68),
(1111, 'Parnu', 68),
(1112, 'Polva', 68),
(1113, 'Rapla', 68),
(1114, 'Saare', 68),
(1115, 'Tartu', 68),
(1116, 'Valga', 68),
(1117, 'Viljandi', 68),
(1118, 'Voru', 68),
(1119, 'Addis Abeba', 69),
(1120, 'Afar', 69),
(1121, 'Amhara', 69),
(1122, 'Benishangul', 69),
(1123, 'Diredawa', 69),
(1124, 'Gambella', 69),
(1125, 'Harar', 69),
(1126, 'Jigjiga', 69),
(1127, 'Mekele', 69),
(1128, 'Oromia', 69),
(1129, 'Somali', 69),
(1130, 'Southern', 69),
(1131, 'Tigray', 69),
(1132, 'Christmas Island', 70),
(1133, 'Cocos Islands', 70),
(1134, 'Coral Sea Islands', 70),
(1135, 'Falkland Islands', 71),
(1136, 'South Georgia', 71),
(1137, 'Klaksvik', 72),
(1138, 'Nor ara Eysturoy', 72),
(1139, 'Nor oy', 72),
(1140, 'Sandoy', 72),
(1141, 'Streymoy', 72),
(1142, 'Su uroy', 72),
(1143, 'Sy ra Eysturoy', 72),
(1144, 'Torshavn', 72),
(1145, 'Vaga', 72),
(1146, 'Central', 73),
(1147, 'Eastern', 73),
(1148, 'Northern', 73),
(1149, 'South Pacific', 73),
(1150, 'Western', 73),
(1151, 'Ahvenanmaa', 74),
(1152, 'Etela-Karjala', 74),
(1153, 'Etela-Pohjanmaa', 74),
(1154, 'Etela-Savo', 74),
(1155, 'Etela-Suomen Laani', 74),
(1156, 'Ita-Suomen Laani', 74),
(1157, 'Ita-Uusimaa', 74),
(1158, 'Kainuu', 74),
(1159, 'Kanta-Hame', 74),
(1160, 'Keski-Pohjanmaa', 74),
(1161, 'Keski-Suomi', 74),
(1162, 'Kymenlaakso', 74),
(1163, 'Lansi-Suomen Laani', 74),
(1164, 'Lappi', 74),
(1165, 'Northern Savonia', 74),
(1166, 'Ostrobothnia', 74),
(1167, 'Oulun Laani', 74),
(1168, 'Paijat-Hame', 74),
(1169, 'Pirkanmaa', 74),
(1170, 'Pohjanmaa', 74),
(1171, 'Pohjois-Karjala', 74),
(1172, 'Pohjois-Pohjanmaa', 74),
(1173, 'Pohjois-Savo', 74),
(1174, 'Saarijarvi', 74),
(1175, 'Satakunta', 74),
(1176, 'Southern Savonia', 74),
(1177, 'Tavastia Proper', 74),
(1178, 'Uleaborgs Lan', 74),
(1179, 'Uusimaa', 74),
(1180, 'Varsinais-Suomi', 74),
(1181, 'Ain', 75),
(1182, 'Aisne', 75),
(1183, 'Albi Le Sequestre', 75),
(1184, 'Allier', 75),
(1185, 'Alpes-Cote dAzur', 75),
(1186, 'Alpes-Maritimes', 75),
(1187, 'Alpes-de-Haute-Provence', 75),
(1188, 'Alsace', 75),
(1189, 'Aquitaine', 75),
(1190, 'Ardeche', 75),
(1191, 'Ardennes', 75),
(1192, 'Ariege', 75),
(1193, 'Aube', 75),
(1194, 'Aude', 75),
(1195, 'Auvergne', 75),
(1196, 'Aveyron', 75),
(1197, 'Bas-Rhin', 75),
(1198, 'Basse-Normandie', 75),
(1199, 'Bouches-du-Rhone', 75),
(1200, 'Bourgogne', 75),
(1201, 'Bretagne', 75),
(1202, 'Brittany', 75),
(1203, 'Burgundy', 75),
(1204, 'Calvados', 75),
(1205, 'Cantal', 75),
(1206, 'Cedex', 75),
(1207, 'Centre', 75),
(1208, 'Charente', 75),
(1209, 'Charente-Maritime', 75),
(1210, 'Cher', 75),
(1211, 'Correze', 75),
(1212, 'Corse-du-Sud', 75),
(1213, 'Cote-d\'Or', 75),
(1214, 'Cotes-d\'Armor', 75),
(1215, 'Creuse', 75),
(1216, 'Crolles', 75),
(1217, 'Deux-Sevres', 75),
(1218, 'Dordogne', 75),
(1219, 'Doubs', 75),
(1220, 'Drome', 75),
(1221, 'Essonne', 75),
(1222, 'Eure', 75),
(1223, 'Eure-et-Loir', 75),
(1224, 'Feucherolles', 75),
(1225, 'Finistere', 75),
(1226, 'Franche-Comte', 75),
(1227, 'Gard', 75),
(1228, 'Gers', 75),
(1229, 'Gironde', 75),
(1230, 'Haut-Rhin', 75),
(1231, 'Haute-Corse', 75),
(1232, 'Haute-Garonne', 75),
(1233, 'Haute-Loire', 75),
(1234, 'Haute-Marne', 75),
(1235, 'Haute-Saone', 75),
(1236, 'Haute-Savoie', 75),
(1237, 'Haute-Vienne', 75),
(1238, 'Hautes-Alpes', 75),
(1239, 'Hautes-Pyrenees', 75),
(1240, 'Hauts-de-Seine', 75),
(1241, 'Herault', 75),
(1242, 'Ile-de-France', 75),
(1243, 'Ille-et-Vilaine', 75),
(1244, 'Indre', 75),
(1245, 'Indre-et-Loire', 75),
(1246, 'Isere', 75),
(1247, 'Jura', 75),
(1248, 'Klagenfurt', 75),
(1249, 'Landes', 75),
(1250, 'Languedoc-Roussillon', 75),
(1251, 'Larcay', 75),
(1252, 'Le Castellet', 75),
(1253, 'Le Creusot', 75),
(1254, 'Limousin', 75),
(1255, 'Loir-et-Cher', 75),
(1256, 'Loire', 75),
(1257, 'Loire-Atlantique', 75),
(1258, 'Loiret', 75),
(1259, 'Lorraine', 75),
(1260, 'Lot', 75),
(1261, 'Lot-et-Garonne', 75),
(1262, 'Lower Normandy', 75),
(1263, 'Lozere', 75),
(1264, 'Maine-et-Loire', 75),
(1265, 'Manche', 75),
(1266, 'Marne', 75),
(1267, 'Mayenne', 75),
(1268, 'Meurthe-et-Moselle', 75),
(1269, 'Meuse', 75),
(1270, 'Midi-Pyrenees', 75),
(1271, 'Morbihan', 75),
(1272, 'Moselle', 75),
(1273, 'Nievre', 75),
(1274, 'Nord', 75),
(1275, 'Nord-Pas-de-Calais', 75),
(1276, 'Oise', 75),
(1277, 'Orne', 75),
(1278, 'Paris', 75),
(1279, 'Pas-de-Calais', 75),
(1280, 'Pays de la Loire', 75),
(1281, 'Pays-de-la-Loire', 75),
(1282, 'Picardy', 75),
(1283, 'Puy-de-Dome', 75),
(1284, 'Pyrenees-Atlantiques', 75),
(1285, 'Pyrenees-Orientales', 75),
(1286, 'Quelmes', 75),
(1287, 'Rhone', 75),
(1288, 'Rhone-Alpes', 75),
(1289, 'Saint Ouen', 75),
(1290, 'Saint Viatre', 75),
(1291, 'Saone-et-Loire', 75),
(1292, 'Sarthe', 75),
(1293, 'Savoie', 75),
(1294, 'Seine-Maritime', 75),
(1295, 'Seine-Saint-Denis', 75),
(1296, 'Seine-et-Marne', 75),
(1297, 'Somme', 75),
(1298, 'Sophia Antipolis', 75),
(1299, 'Souvans', 75),
(1300, 'Tarn', 75),
(1301, 'Tarn-et-Garonne', 75),
(1302, 'Territoire de Belfort', 75),
(1303, 'Treignac', 75),
(1304, 'Upper Normandy', 75),
(1305, 'Val-d\'Oise', 75),
(1306, 'Val-de-Marne', 75),
(1307, 'Var', 75),
(1308, 'Vaucluse', 75),
(1309, 'Vellise', 75),
(1310, 'Vendee', 75),
(1311, 'Vienne', 75),
(1312, 'Vosges', 75),
(1313, 'Yonne', 75),
(1314, 'Yvelines', 75),
(1315, 'Cayenne', 76),
(1316, 'Saint-Laurent-du-Maroni', 76),
(1317, 'Iles du Vent', 77),
(1318, 'Iles sous le Vent', 77),
(1319, 'Marquesas', 77),
(1320, 'Tuamotu', 77),
(1321, 'Tubuai', 77),
(1322, 'Amsterdam', 78),
(1323, 'Crozet Islands', 78),
(1324, 'Kerguelen', 78),
(1325, 'Estuaire', 79),
(1326, 'Haut-Ogooue', 79),
(1327, 'Moyen-Ogooue', 79),
(1328, 'Ngounie', 79),
(1329, 'Nyanga', 79),
(1330, 'Ogooue-Ivindo', 79),
(1331, 'Ogooue-Lolo', 79),
(1332, 'Ogooue-Maritime', 79),
(1333, 'Woleu-Ntem', 79),
(1334, 'Banjul', 80),
(1335, 'Basse', 80),
(1336, 'Brikama', 80),
(1337, 'Janjanbureh', 80),
(1338, 'Kanifing', 80),
(1339, 'Kerewan', 80),
(1340, 'Kuntaur', 80),
(1341, 'Mansakonko', 80),
(1342, 'Abhasia', 81),
(1343, 'Ajaria', 81),
(1344, 'Guria', 81),
(1345, 'Imereti', 81),
(1346, 'Kaheti', 81),
(1347, 'Kvemo Kartli', 81),
(1348, 'Mcheta-Mtianeti', 81),
(1349, 'Racha', 81),
(1350, 'Samagrelo-Zemo Svaneti', 81),
(1351, 'Samche-Zhavaheti', 81),
(1352, 'Shida Kartli', 81),
(1353, 'Tbilisi', 81),
(1354, 'Auvergne', 82),
(1355, 'Baden-Wurttemberg', 82),
(1356, 'Bavaria', 82),
(1357, 'Bayern', 82),
(1358, 'Beilstein Wurtt', 82),
(1359, 'Berlin', 82),
(1360, 'Brandenburg', 82),
(1361, 'Bremen', 82),
(1362, 'Dreisbach', 82),
(1363, 'Freistaat Bayern', 82),
(1364, 'Hamburg', 82),
(1365, 'Hannover', 82),
(1366, 'Heroldstatt', 82),
(1367, 'Hessen', 82),
(1368, 'Kortenberg', 82),
(1369, 'Laasdorf', 82),
(1370, 'Land Baden-Wurttemberg', 82),
(1371, 'Land Bayern', 82),
(1372, 'Land Brandenburg', 82),
(1373, 'Land Hessen', 82),
(1374, 'Land Mecklenburg-Vorpommern', 82),
(1375, 'Land Nordrhein-Westfalen', 82),
(1376, 'Land Rheinland-Pfalz', 82),
(1377, 'Land Sachsen', 82),
(1378, 'Land Sachsen-Anhalt', 82),
(1379, 'Land Thuringen', 82),
(1380, 'Lower Saxony', 82),
(1381, 'Mecklenburg-Vorpommern', 82),
(1382, 'Mulfingen', 82),
(1383, 'Munich', 82),
(1384, 'Neubeuern', 82),
(1385, 'Niedersachsen', 82),
(1386, 'Noord-Holland', 82),
(1387, 'Nordrhein-Westfalen', 82),
(1388, 'North Rhine-Westphalia', 82),
(1389, 'Osterode', 82),
(1390, 'Rheinland-Pfalz', 82),
(1391, 'Rhineland-Palatinate', 82),
(1392, 'Saarland', 82),
(1393, 'Sachsen', 82),
(1394, 'Sachsen-Anhalt', 82),
(1395, 'Saxony', 82),
(1396, 'Schleswig-Holstein', 82),
(1397, 'Thuringia', 82),
(1398, 'Webling', 82),
(1399, 'Weinstrabe', 82),
(1400, 'schlobborn', 82),
(1401, 'Ashanti', 83),
(1402, 'Brong-Ahafo', 83),
(1403, 'Central', 83),
(1404, 'Eastern', 83),
(1405, 'Greater Accra', 83),
(1406, 'Northern', 83),
(1407, 'Upper East', 83),
(1408, 'Upper West', 83),
(1409, 'Volta', 83),
(1410, 'Western', 83),
(1411, 'Gibraltar', 84),
(1412, 'Acharnes', 85),
(1413, 'Ahaia', 85),
(1414, 'Aitolia kai Akarnania', 85),
(1415, 'Argolis', 85),
(1416, 'Arkadia', 85),
(1417, 'Arta', 85),
(1418, 'Attica', 85),
(1419, 'Attiki', 85),
(1420, 'Ayion Oros', 85),
(1421, 'Crete', 85),
(1422, 'Dodekanisos', 85),
(1423, 'Drama', 85),
(1424, 'Evia', 85),
(1425, 'Evritania', 85),
(1426, 'Evros', 85),
(1427, 'Evvoia', 85),
(1428, 'Florina', 85),
(1429, 'Fokis', 85),
(1430, 'Fthiotis', 85),
(1431, 'Grevena', 85),
(1432, 'Halandri', 85),
(1433, 'Halkidiki', 85),
(1434, 'Hania', 85),
(1435, 'Heraklion', 85),
(1436, 'Hios', 85),
(1437, 'Ilia', 85),
(1438, 'Imathia', 85),
(1439, 'Ioannina', 85),
(1440, 'Iraklion', 85),
(1441, 'Karditsa', 85),
(1442, 'Kastoria', 85),
(1443, 'Kavala', 85),
(1444, 'Kefallinia', 85),
(1445, 'Kerkira', 85),
(1446, 'Kiklades', 85),
(1447, 'Kilkis', 85),
(1448, 'Korinthia', 85),
(1449, 'Kozani', 85),
(1450, 'Lakonia', 85),
(1451, 'Larisa', 85),
(1452, 'Lasithi', 85),
(1453, 'Lesvos', 85),
(1454, 'Levkas', 85),
(1455, 'Magnisia', 85),
(1456, 'Messinia', 85),
(1457, 'Nomos Attikis', 85),
(1458, 'Nomos Zakynthou', 85),
(1459, 'Pella', 85),
(1460, 'Pieria', 85),
(1461, 'Piraios', 85),
(1462, 'Preveza', 85),
(1463, 'Rethimni', 85),
(1464, 'Rodopi', 85),
(1465, 'Samos', 85),
(1466, 'Serrai', 85),
(1467, 'Thesprotia', 85),
(1468, 'Thessaloniki', 85),
(1469, 'Trikala', 85),
(1470, 'Voiotia', 85),
(1471, 'West Greece', 85),
(1472, 'Xanthi', 85),
(1473, 'Zakinthos', 85),
(1474, 'Aasiaat', 86),
(1475, 'Ammassalik', 86),
(1476, 'Illoqqortoormiut', 86),
(1477, 'Ilulissat', 86),
(1478, 'Ivittuut', 86),
(1479, 'Kangaatsiaq', 86),
(1480, 'Maniitsoq', 86),
(1481, 'Nanortalik', 86),
(1482, 'Narsaq', 86),
(1483, 'Nuuk', 86),
(1484, 'Paamiut', 86),
(1485, 'Qaanaaq', 86),
(1486, 'Qaqortoq', 86),
(1487, 'Qasigiannguit', 86),
(1488, 'Qeqertarsuaq', 86),
(1489, 'Sisimiut', 86),
(1490, 'Udenfor kommunal inddeling', 86),
(1491, 'Upernavik', 86),
(1492, 'Uummannaq', 86),
(1493, 'Carriacou-Petite Martinique', 87),
(1494, 'Saint Andrew', 87),
(1495, 'Saint Davids', 87),
(1496, 'Saint George\'s', 87),
(1497, 'Saint John', 87),
(1498, 'Saint Mark', 87),
(1499, 'Saint Patrick', 87),
(1500, 'Basse-Terre', 88),
(1501, 'Grande-Terre', 88),
(1502, 'Iles des Saintes', 88),
(1503, 'La Desirade', 88),
(1504, 'Marie-Galante', 88),
(1505, 'Saint Barthelemy', 88),
(1506, 'Saint Martin', 88),
(1507, 'Agana Heights', 89),
(1508, 'Agat', 89),
(1509, 'Barrigada', 89),
(1510, 'Chalan-Pago-Ordot', 89),
(1511, 'Dededo', 89),
(1512, 'Hagatna', 89),
(1513, 'Inarajan', 89),
(1514, 'Mangilao', 89),
(1515, 'Merizo', 89),
(1516, 'Mongmong-Toto-Maite', 89),
(1517, 'Santa Rita', 89),
(1518, 'Sinajana', 89),
(1519, 'Talofofo', 89),
(1520, 'Tamuning', 89),
(1521, 'Yigo', 89),
(1522, 'Yona', 89),
(1523, 'Alta Verapaz', 90),
(1524, 'Baja Verapaz', 90),
(1525, 'Chimaltenango', 90),
(1526, 'Chiquimula', 90),
(1527, 'El Progreso', 90),
(1528, 'Escuintla', 90),
(1529, 'Guatemala', 90),
(1530, 'Huehuetenango', 90),
(1531, 'Izabal', 90),
(1532, 'Jalapa', 90),
(1533, 'Jutiapa', 90),
(1534, 'Peten', 90),
(1535, 'Quezaltenango', 90),
(1536, 'Quiche', 90),
(1537, 'Retalhuleu', 90),
(1538, 'Sacatepequez', 90),
(1539, 'San Marcos', 90),
(1540, 'Santa Rosa', 90),
(1541, 'Solola', 90),
(1542, 'Suchitepequez', 90),
(1543, 'Totonicapan', 90),
(1544, 'Zacapa', 90),
(1545, 'Alderney', 91),
(1546, 'Castel', 91),
(1547, 'Forest', 91),
(1548, 'Saint Andrew', 91),
(1549, 'Saint Martin', 91),
(1550, 'Saint Peter Port', 91),
(1551, 'Saint Pierre du Bois', 91),
(1552, 'Saint Sampson', 91),
(1553, 'Saint Saviour', 91),
(1554, 'Sark', 91),
(1555, 'Torteval', 91),
(1556, 'Vale', 91),
(1557, 'Beyla', 92),
(1558, 'Boffa', 92),
(1559, 'Boke', 92),
(1560, 'Conakry', 92),
(1561, 'Coyah', 92),
(1562, 'Dabola', 92),
(1563, 'Dalaba', 92),
(1564, 'Dinguiraye', 92),
(1565, 'Faranah', 92),
(1566, 'Forecariah', 92),
(1567, 'Fria', 92),
(1568, 'Gaoual', 92),
(1569, 'Gueckedou', 92),
(1570, 'Kankan', 92),
(1571, 'Kerouane', 92),
(1572, 'Kindia', 92),
(1573, 'Kissidougou', 92),
(1574, 'Koubia', 92),
(1575, 'Koundara', 92),
(1576, 'Kouroussa', 92),
(1577, 'Labe', 92),
(1578, 'Lola', 92),
(1579, 'Macenta', 92),
(1580, 'Mali', 92),
(1581, 'Mamou', 92),
(1582, 'Mandiana', 92),
(1583, 'Nzerekore', 92),
(1584, 'Pita', 92),
(1585, 'Siguiri', 92),
(1586, 'Telimele', 92),
(1587, 'Tougue', 92),
(1588, 'Yomou', 92),
(1589, 'Bafata', 93),
(1590, 'Bissau', 93),
(1591, 'Bolama', 93),
(1592, 'Cacheu', 93),
(1593, 'Gabu', 93),
(1594, 'Oio', 93),
(1595, 'Quinara', 93),
(1596, 'Tombali', 93),
(1597, 'Barima-Waini', 94),
(1598, 'Cuyuni-Mazaruni', 94),
(1599, 'Demerara-Mahaica', 94),
(1600, 'East Berbice-Corentyne', 94),
(1601, 'Essequibo Islands-West Demerar', 94),
(1602, 'Mahaica-Berbice', 94),
(1603, 'Pomeroon-Supenaam', 94),
(1604, 'Potaro-Siparuni', 94),
(1605, 'Upper Demerara-Berbice', 94),
(1606, 'Upper Takutu-Upper Essequibo', 94),
(1607, 'Artibonite', 95),
(1608, 'Centre', 95),
(1609, 'Grand\'Anse', 95),
(1610, 'Nord', 95),
(1611, 'Nord-Est', 95),
(1612, 'Nord-Ouest', 95),
(1613, 'Ouest', 95),
(1614, 'Sud', 95),
(1615, 'Sud-Est', 95),
(1616, 'Heard and McDonald Islands', 96),
(1617, 'Atlantida', 97),
(1618, 'Choluteca', 97),
(1619, 'Colon', 97),
(1620, 'Comayagua', 97),
(1621, 'Copan', 97),
(1622, 'Cortes', 97),
(1623, 'Distrito Central', 97),
(1624, 'El Paraiso', 97),
(1625, 'Francisco Morazan', 97),
(1626, 'Gracias a Dios', 97),
(1627, 'Intibuca', 97),
(1628, 'Islas de la Bahia', 97),
(1629, 'La Paz', 97),
(1630, 'Lempira', 97),
(1631, 'Ocotepeque', 97),
(1632, 'Olancho', 97),
(1633, 'Santa Barbara', 97),
(1634, 'Valle', 97),
(1635, 'Yoro', 97),
(1636, 'Hong Kong', 98),
(1637, 'Bacs-Kiskun', 99),
(1638, 'Baranya', 99),
(1639, 'Bekes', 99),
(1640, 'Borsod-Abauj-Zemplen', 99),
(1641, 'Budapest', 99),
(1642, 'Csongrad', 99),
(1643, 'Fejer', 99),
(1644, 'Gyor-Moson-Sopron', 99),
(1645, 'Hajdu-Bihar', 99),
(1646, 'Heves', 99),
(1647, 'Jasz-Nagykun-Szolnok', 99),
(1648, 'Komarom-Esztergom', 99),
(1649, 'Nograd', 99),
(1650, 'Pest', 99),
(1651, 'Somogy', 99),
(1652, 'Szabolcs-Szatmar-Bereg', 99),
(1653, 'Tolna', 99),
(1654, 'Vas', 99),
(1655, 'Veszprem', 99),
(1656, 'Zala', 99),
(1657, 'Austurland', 100),
(1658, 'Gullbringusysla', 100),
(1659, 'Hofu borgarsva i', 100),
(1660, 'Nor urland eystra', 100),
(1661, 'Nor urland vestra', 100),
(1662, 'Su urland', 100),
(1663, 'Su urnes', 100),
(1664, 'Vestfir ir', 100),
(1665, 'Vesturland', 100),
(1666, 'Aceh', 102),
(1667, 'Bali', 102),
(1668, 'Bangka-Belitung', 102),
(1669, 'Banten', 102),
(1670, 'Bengkulu', 102),
(1671, 'Gandaria', 102),
(1672, 'Gorontalo', 102),
(1673, 'Jakarta', 102),
(1674, 'Jambi', 102),
(1675, 'Jawa Barat', 102),
(1676, 'Jawa Tengah', 102),
(1677, 'Jawa Timur', 102),
(1678, 'Kalimantan Barat', 102),
(1679, 'Kalimantan Selatan', 102),
(1680, 'Kalimantan Tengah', 102),
(1681, 'Kalimantan Timur', 102),
(1682, 'Kendal', 102),
(1683, 'Lampung', 102),
(1684, 'Maluku', 102),
(1685, 'Maluku Utara', 102),
(1686, 'Nusa Tenggara Barat', 102),
(1687, 'Nusa Tenggara Timur', 102),
(1688, 'Papua', 102),
(1689, 'Riau', 102),
(1690, 'Riau Kepulauan', 102),
(1691, 'Solo', 102),
(1692, 'Sulawesi Selatan', 102),
(1693, 'Sulawesi Tengah', 102),
(1694, 'Sulawesi Tenggara', 102),
(1695, 'Sulawesi Utara', 102),
(1696, 'Sumatera Barat', 102),
(1697, 'Sumatera Selatan', 102),
(1698, 'Sumatera Utara', 102),
(1699, 'Yogyakarta', 102),
(1700, 'Ardabil', 103),
(1701, 'Azarbayjan-e Bakhtari', 103),
(1702, 'Azarbayjan-e Khavari', 103),
(1703, 'Bushehr', 103),
(1704, 'Chahar Mahal-e Bakhtiari', 103),
(1705, 'Esfahan', 103),
(1706, 'Fars', 103),
(1707, 'Gilan', 103),
(1708, 'Golestan', 103),
(1709, 'Hamadan', 103),
(1710, 'Hormozgan', 103),
(1711, 'Ilam', 103),
(1712, 'Kerman', 103),
(1713, 'Kermanshah', 103),
(1714, 'Khorasan', 103),
(1715, 'Khuzestan', 103),
(1716, 'Kohgiluyeh-e Boyerahmad', 103),
(1717, 'Kordestan', 103),
(1718, 'Lorestan', 103),
(1719, 'Markazi', 103),
(1720, 'Mazandaran', 103),
(1721, 'Ostan-e Esfahan', 103),
(1722, 'Qazvin', 103),
(1723, 'Qom', 103),
(1724, 'Semnan', 103),
(1725, 'Sistan-e Baluchestan', 103),
(1726, 'Tehran', 103),
(1727, 'Yazd', 103),
(1728, 'Zanjan', 103),
(1729, 'Babil', 104),
(1730, 'Baghdad', 104),
(1731, 'Dahuk', 104),
(1732, 'Dhi Qar', 104),
(1733, 'Diyala', 104),
(1734, 'Erbil', 104),
(1735, 'Irbil', 104),
(1736, 'Karbala', 104),
(1737, 'Kurdistan', 104),
(1738, 'Maysan', 104),
(1739, 'Ninawa', 104),
(1740, 'Salah-ad-Din', 104),
(1741, 'Wasit', 104),
(1742, 'al-Anbar', 104),
(1743, 'al-Basrah', 104),
(1744, 'al-Muthanna', 104),
(1745, 'al-Qadisiyah', 104),
(1746, 'an-Najaf', 104),
(1747, 'as-Sulaymaniyah', 104),
(1748, 'at-Ta\'mim', 104),
(1749, 'Armagh', 105),
(1750, 'Carlow', 105),
(1751, 'Cavan', 105),
(1752, 'Clare', 105),
(1753, 'Cork', 105),
(1754, 'Donegal', 105),
(1755, 'Dublin', 105),
(1756, 'Galway', 105),
(1757, 'Kerry', 105),
(1758, 'Kildare', 105),
(1759, 'Kilkenny', 105),
(1760, 'Laois', 105),
(1761, 'Leinster', 105),
(1762, 'Leitrim', 105),
(1763, 'Limerick', 105),
(1764, 'Loch Garman', 105),
(1765, 'Longford', 105),
(1766, 'Louth', 105),
(1767, 'Mayo', 105),
(1768, 'Meath', 105),
(1769, 'Monaghan', 105),
(1770, 'Offaly', 105),
(1771, 'Roscommon', 105),
(1772, 'Sligo', 105),
(1773, 'Tipperary North Riding', 105),
(1774, 'Tipperary South Riding', 105),
(1775, 'Ulster', 105),
(1776, 'Waterford', 105),
(1777, 'Westmeath', 105),
(1778, 'Wexford', 105),
(1779, 'Wicklow', 105),
(1780, 'Beit Hanania', 106),
(1781, 'Ben Gurion Airport', 106),
(1782, 'Bethlehem', 106),
(1783, 'Caesarea', 106),
(1784, 'Centre', 106),
(1785, 'Gaza', 106),
(1786, 'Hadaron', 106),
(1787, 'Haifa District', 106),
(1788, 'Hamerkaz', 106),
(1789, 'Hazafon', 106),
(1790, 'Hebron', 106),
(1791, 'Jaffa', 106),
(1792, 'Jerusalem', 106),
(1793, 'Khefa', 106),
(1794, 'Kiryat Yam', 106),
(1795, 'Lower Galilee', 106),
(1796, 'Qalqilya', 106),
(1797, 'Talme Elazar', 106),
(1798, 'Tel Aviv', 106),
(1799, 'Tsafon', 106),
(1800, 'Umm El Fahem', 106),
(1801, 'Yerushalayim', 106),
(1802, 'Abruzzi', 107),
(1803, 'Abruzzo', 107),
(1804, 'Agrigento', 107),
(1805, 'Alessandria', 107),
(1806, 'Ancona', 107),
(1807, 'Arezzo', 107),
(1808, 'Ascoli Piceno', 107),
(1809, 'Asti', 107),
(1810, 'Avellino', 107),
(1811, 'Bari', 107),
(1812, 'Basilicata', 107),
(1813, 'Belluno', 107),
(1814, 'Benevento', 107),
(1815, 'Bergamo', 107),
(1816, 'Biella', 107),
(1817, 'Bologna', 107),
(1818, 'Bolzano', 107),
(1819, 'Brescia', 107),
(1820, 'Brindisi', 107),
(1821, 'Calabria', 107),
(1822, 'Campania', 107),
(1823, 'Cartoceto', 107),
(1824, 'Caserta', 107),
(1825, 'Catania', 107),
(1826, 'Chieti', 107),
(1827, 'Como', 107),
(1828, 'Cosenza', 107),
(1829, 'Cremona', 107),
(1830, 'Cuneo', 107),
(1831, 'Emilia-Romagna', 107),
(1832, 'Ferrara', 107),
(1833, 'Firenze', 107),
(1834, 'Florence', 107),
(1835, 'Forli-Cesena ', 107),
(1836, 'Friuli-Venezia Giulia', 107),
(1837, 'Frosinone', 107),
(1838, 'Genoa', 107),
(1839, 'Gorizia', 107),
(1840, 'L\'Aquila', 107),
(1841, 'Lazio', 107),
(1842, 'Lecce', 107),
(1843, 'Lecco', 107),
(1844, 'Lecco Province', 107),
(1845, 'Liguria', 107),
(1846, 'Lodi', 107),
(1847, 'Lombardia', 107),
(1848, 'Lombardy', 107),
(1849, 'Macerata', 107),
(1850, 'Mantova', 107),
(1851, 'Marche', 107),
(1852, 'Messina', 107),
(1853, 'Milan', 107),
(1854, 'Modena', 107),
(1855, 'Molise', 107),
(1856, 'Molteno', 107),
(1857, 'Montenegro', 107),
(1858, 'Monza and Brianza', 107),
(1859, 'Naples', 107),
(1860, 'Novara', 107),
(1861, 'Padova', 107),
(1862, 'Parma', 107),
(1863, 'Pavia', 107),
(1864, 'Perugia', 107),
(1865, 'Pesaro-Urbino', 107),
(1866, 'Piacenza', 107),
(1867, 'Piedmont', 107),
(1868, 'Piemonte', 107),
(1869, 'Pisa', 107),
(1870, 'Pordenone', 107),
(1871, 'Potenza', 107),
(1872, 'Puglia', 107),
(1873, 'Reggio Emilia', 107),
(1874, 'Rimini', 107),
(1875, 'Roma', 107),
(1876, 'Salerno', 107),
(1877, 'Sardegna', 107),
(1878, 'Sassari', 107),
(1879, 'Savona', 107),
(1880, 'Sicilia', 107),
(1881, 'Siena', 107),
(1882, 'Sondrio', 107),
(1883, 'South Tyrol', 107),
(1884, 'Taranto', 107),
(1885, 'Teramo', 107),
(1886, 'Torino', 107),
(1887, 'Toscana', 107),
(1888, 'Trapani', 107),
(1889, 'Trentino-Alto Adige', 107),
(1890, 'Trento', 107),
(1891, 'Treviso', 107),
(1892, 'Udine', 107),
(1893, 'Umbria', 107),
(1894, 'Valle d\'Aosta', 107),
(1895, 'Varese', 107),
(1896, 'Veneto', 107),
(1897, 'Venezia', 107),
(1898, 'Verbano-Cusio-Ossola', 107),
(1899, 'Vercelli', 107),
(1900, 'Verona', 107),
(1901, 'Vicenza', 107),
(1902, 'Viterbo', 107),
(1903, 'Buxoro Viloyati', 108),
(1904, 'Clarendon', 108),
(1905, 'Hanover', 108),
(1906, 'Kingston', 108),
(1907, 'Manchester', 108),
(1908, 'Portland', 108),
(1909, 'Saint Andrews', 108),
(1910, 'Saint Ann', 108),
(1911, 'Saint Catherine', 108),
(1912, 'Saint Elizabeth', 108),
(1913, 'Saint James', 108),
(1914, 'Saint Mary', 108),
(1915, 'Saint Thomas', 108),
(1916, 'Trelawney', 108),
(1917, 'Westmoreland', 108),
(1918, 'Aichi', 109),
(1919, 'Akita', 109),
(1920, 'Aomori', 109),
(1921, 'Chiba', 109),
(1922, 'Ehime', 109),
(1923, 'Fukui', 109),
(1924, 'Fukuoka', 109),
(1925, 'Fukushima', 109),
(1926, 'Gifu', 109),
(1927, 'Gumma', 109),
(1928, 'Hiroshima', 109),
(1929, 'Hokkaido', 109),
(1930, 'Hyogo', 109),
(1931, 'Ibaraki', 109),
(1932, 'Ishikawa', 109),
(1933, 'Iwate', 109),
(1934, 'Kagawa', 109),
(1935, 'Kagoshima', 109),
(1936, 'Kanagawa', 109),
(1937, 'Kanto', 109),
(1938, 'Kochi', 109),
(1939, 'Kumamoto', 109),
(1940, 'Kyoto', 109),
(1941, 'Mie', 109),
(1942, 'Miyagi', 109),
(1943, 'Miyazaki', 109),
(1944, 'Nagano', 109),
(1945, 'Nagasaki', 109),
(1946, 'Nara', 109),
(1947, 'Niigata', 109),
(1948, 'Oita', 109),
(1949, 'Okayama', 109),
(1950, 'Okinawa', 109),
(1951, 'Osaka', 109),
(1952, 'Saga', 109),
(1953, 'Saitama', 109),
(1954, 'Shiga', 109),
(1955, 'Shimane', 109),
(1956, 'Shizuoka', 109),
(1957, 'Tochigi', 109),
(1958, 'Tokushima', 109),
(1959, 'Tokyo', 109),
(1960, 'Tottori', 109),
(1961, 'Toyama', 109),
(1962, 'Wakayama', 109),
(1963, 'Yamagata', 109),
(1964, 'Yamaguchi', 109),
(1965, 'Yamanashi', 109),
(1966, 'Grouville', 110),
(1967, 'Saint Brelade', 110),
(1968, 'Saint Clement', 110),
(1969, 'Saint Helier', 110),
(1970, 'Saint John', 110),
(1971, 'Saint Lawrence', 110),
(1972, 'Saint Martin', 110),
(1973, 'Saint Mary', 110),
(1974, 'Saint Peter', 110),
(1975, 'Saint Saviour', 110),
(1976, 'Trinity', 110),
(1977, '\'Ajlun', 111),
(1978, 'Amman', 111),
(1979, 'Irbid', 111),
(1980, 'Jarash', 111),
(1981, 'Ma\'an', 111),
(1982, 'Madaba', 111),
(1983, 'al-\'Aqabah', 111),
(1984, 'al-Balqa\'', 111),
(1985, 'al-Karak', 111),
(1986, 'al-Mafraq', 111),
(1987, 'at-Tafilah', 111),
(1988, 'az-Zarqa\'', 111),
(1989, 'Akmecet', 112),
(1990, 'Akmola', 112),
(1991, 'Aktobe', 112),
(1992, 'Almati', 112),
(1993, 'Atirau', 112),
(1994, 'Batis Kazakstan', 112),
(1995, 'Burlinsky Region', 112),
(1996, 'Karagandi', 112),
(1997, 'Kostanay', 112),
(1998, 'Mankistau', 112),
(1999, 'Ontustik Kazakstan', 112),
(2000, 'Pavlodar', 112),
(2001, 'Sigis Kazakstan', 112),
(2002, 'Soltustik Kazakstan', 112),
(2003, 'Taraz', 112),
(2004, 'Central', 113),
(2005, 'Coast', 113),
(2006, 'Eastern', 113),
(2007, 'Nairobi', 113),
(2008, 'North Eastern', 113),
(2009, 'Nyanza', 113),
(2010, 'Rift Valley', 113),
(2011, 'Western', 113),
(2012, 'Abaiang', 114),
(2013, 'Abemana', 114),
(2014, 'Aranuka', 114),
(2015, 'Arorae', 114),
(2016, 'Banaba', 114),
(2017, 'Beru', 114),
(2018, 'Butaritari', 114),
(2019, 'Kiritimati', 114),
(2020, 'Kuria', 114),
(2021, 'Maiana', 114),
(2022, 'Makin', 114),
(2023, 'Marakei', 114),
(2024, 'Nikunau', 114),
(2025, 'Nonouti', 114),
(2026, 'Onotoa', 114),
(2027, 'Phoenix Islands', 114),
(2028, 'Tabiteuea North', 114),
(2029, 'Tabiteuea South', 114),
(2030, 'Tabuaeran', 114),
(2031, 'Tamana', 114),
(2032, 'Tarawa North', 114),
(2033, 'Tarawa South', 114),
(2034, 'Teraina', 114),
(2035, 'Chagangdo', 115),
(2036, 'Hamgyeongbukto', 115),
(2037, 'Hamgyeongnamdo', 115),
(2038, 'Hwanghaebukto', 115),
(2039, 'Hwanghaenamdo', 115),
(2040, 'Kaeseong', 115),
(2041, 'Kangweon', 115),
(2042, 'Nampo', 115),
(2043, 'Pyeonganbukto', 115),
(2044, 'Pyeongannamdo', 115),
(2045, 'Pyeongyang', 115),
(2046, 'Yanggang', 115),
(2047, 'Busan', 116),
(2048, 'Cheju', 116),
(2049, 'Chollabuk', 116),
(2050, 'Chollanam', 116),
(2051, 'Chungbuk', 116),
(2052, 'Chungcheongbuk', 116),
(2053, 'Chungcheongnam', 116),
(2054, 'Chungnam', 116),
(2055, 'Daegu', 116),
(2056, 'Gangwon-do', 116),
(2057, 'Goyang-si', 116),
(2058, 'Gyeonggi-do', 116),
(2059, 'Gyeongsang ', 116),
(2060, 'Gyeongsangnam-do', 116),
(2061, 'Incheon', 116),
(2062, 'Jeju-Si', 116),
(2063, 'Jeonbuk', 116),
(2064, 'Kangweon', 116),
(2065, 'Kwangju', 116),
(2066, 'Kyeonggi', 116),
(2067, 'Kyeongsangbuk', 116),
(2068, 'Kyeongsangnam', 116),
(2069, 'Kyonggi-do', 116),
(2070, 'Kyungbuk-Do', 116),
(2071, 'Kyunggi-Do', 116),
(2072, 'Kyunggi-do', 116),
(2073, 'Pusan', 116),
(2074, 'Seoul', 116),
(2075, 'Sudogwon', 116),
(2076, 'Taegu', 116),
(2077, 'Taejeon', 116),
(2078, 'Taejon-gwangyoksi', 116),
(2079, 'Ulsan', 116),
(2080, 'Wonju', 116),
(2081, 'gwangyoksi', 116),
(2082, 'Al Asimah', 117),
(2083, 'Hawalli', 117),
(2084, 'Mishref', 117),
(2085, 'Qadesiya', 117),
(2086, 'Safat', 117),
(2087, 'Salmiya', 117),
(2088, 'al-Ahmadi', 117),
(2089, 'al-Farwaniyah', 117),
(2090, 'al-Jahra', 117),
(2091, 'al-Kuwayt', 117),
(2092, 'Batken', 118),
(2093, 'Bishkek', 118),
(2094, 'Chui', 118),
(2095, 'Issyk-Kul', 118),
(2096, 'Jalal-Abad', 118),
(2097, 'Naryn', 118),
(2098, 'Osh', 118),
(2099, 'Talas', 118),
(2100, 'Attopu', 119),
(2101, 'Bokeo', 119),
(2102, 'Bolikhamsay', 119),
(2103, 'Champasak', 119),
(2104, 'Houaphanh', 119),
(2105, 'Khammouane', 119),
(2106, 'Luang Nam Tha', 119),
(2107, 'Luang Prabang', 119),
(2108, 'Oudomxay', 119),
(2109, 'Phongsaly', 119),
(2110, 'Saravan', 119),
(2111, 'Savannakhet', 119),
(2112, 'Sekong', 119),
(2113, 'Viangchan Prefecture', 119),
(2114, 'Viangchan Province', 119),
(2115, 'Xaignabury', 119),
(2116, 'Xiang Khuang', 119),
(2117, 'Aizkraukles', 120),
(2118, 'Aluksnes', 120),
(2119, 'Balvu', 120),
(2120, 'Bauskas', 120),
(2121, 'Cesu', 120),
(2122, 'Daugavpils', 120),
(2123, 'Daugavpils City', 120),
(2124, 'Dobeles', 120),
(2125, 'Gulbenes', 120),
(2126, 'Jekabspils', 120),
(2127, 'Jelgava', 120),
(2128, 'Jelgavas', 120),
(2129, 'Jurmala City', 120),
(2130, 'Kraslavas', 120),
(2131, 'Kuldigas', 120),
(2132, 'Liepaja', 120),
(2133, 'Liepajas', 120),
(2134, 'Limbazhu', 120),
(2135, 'Ludzas', 120),
(2136, 'Madonas', 120),
(2137, 'Ogres', 120),
(2138, 'Preilu', 120),
(2139, 'Rezekne', 120),
(2140, 'Rezeknes', 120),
(2141, 'Riga', 120),
(2142, 'Rigas', 120),
(2143, 'Saldus', 120),
(2144, 'Talsu', 120),
(2145, 'Tukuma', 120),
(2146, 'Valkas', 120),
(2147, 'Valmieras', 120),
(2148, 'Ventspils', 120),
(2149, 'Ventspils City', 120),
(2150, 'Beirut', 121),
(2151, 'Jabal Lubnan', 121),
(2152, 'Mohafazat Liban-Nord', 121),
(2153, 'Mohafazat Mont-Liban', 121),
(2154, 'Sidon', 121),
(2155, 'al-Biqa', 121),
(2156, 'al-Janub', 121),
(2157, 'an-Nabatiyah', 121),
(2158, 'ash-Shamal', 121),
(2159, 'Berea', 122),
(2160, 'Butha-Buthe', 122),
(2161, 'Leribe', 122),
(2162, 'Mafeteng', 122),
(2163, 'Maseru', 122),
(2164, 'Mohale\'s Hoek', 122),
(2165, 'Mokhotlong', 122),
(2166, 'Qacha\'s Nek', 122),
(2167, 'Quthing', 122),
(2168, 'Thaba-Tseka', 122),
(2169, 'Bomi', 123),
(2170, 'Bong', 123),
(2171, 'Grand Bassa', 123),
(2172, 'Grand Cape Mount', 123),
(2173, 'Grand Gedeh', 123),
(2174, 'Loffa', 123),
(2175, 'Margibi', 123),
(2176, 'Maryland and Grand Kru', 123),
(2177, 'Montserrado', 123),
(2178, 'Nimba', 123),
(2179, 'Rivercess', 123),
(2180, 'Sinoe', 123),
(2181, 'Ajdabiya', 124);
INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(2182, 'Fezzan', 124),
(2183, 'Banghazi', 124),
(2184, 'Darnah', 124),
(2185, 'Ghadamis', 124),
(2186, 'Gharyan', 124),
(2187, 'Misratah', 124),
(2188, 'Murzuq', 124),
(2189, 'Sabha', 124),
(2190, 'Sawfajjin', 124),
(2191, 'Surt', 124),
(2192, 'Tarabulus', 124),
(2193, 'Tarhunah', 124),
(2194, 'Tripolitania', 124),
(2195, 'Tubruq', 124),
(2196, 'Yafran', 124),
(2197, 'Zlitan', 124),
(2198, 'al-\'Aziziyah', 124),
(2199, 'al-Fatih', 124),
(2200, 'al-Jabal al Akhdar', 124),
(2201, 'al-Jufrah', 124),
(2202, 'al-Khums', 124),
(2203, 'al-Kufrah', 124),
(2204, 'an-Nuqat al-Khams', 124),
(2205, 'ash-Shati\'', 124),
(2206, 'az-Zawiyah', 124),
(2207, 'Balzers', 125),
(2208, 'Eschen', 125),
(2209, 'Gamprin', 125),
(2210, 'Mauren', 125),
(2211, 'Planken', 125),
(2212, 'Ruggell', 125),
(2213, 'Schaan', 125),
(2214, 'Schellenberg', 125),
(2215, 'Triesen', 125),
(2216, 'Triesenberg', 125),
(2217, 'Vaduz', 125),
(2218, 'Alytaus', 126),
(2219, 'Anyksciai', 126),
(2220, 'Kauno', 126),
(2221, 'Klaipedos', 126),
(2222, 'Marijampoles', 126),
(2223, 'Panevezhio', 126),
(2224, 'Panevezys', 126),
(2225, 'Shiauliu', 126),
(2226, 'Taurages', 126),
(2227, 'Telshiu', 126),
(2228, 'Telsiai', 126),
(2229, 'Utenos', 126),
(2230, 'Vilniaus', 126),
(2231, 'Capellen', 127),
(2232, 'Clervaux', 127),
(2233, 'Diekirch', 127),
(2234, 'Echternach', 127),
(2235, 'Esch-sur-Alzette', 127),
(2236, 'Grevenmacher', 127),
(2237, 'Luxembourg', 127),
(2238, 'Mersch', 127),
(2239, 'Redange', 127),
(2240, 'Remich', 127),
(2241, 'Vianden', 127),
(2242, 'Wiltz', 127),
(2243, 'Macau', 128),
(2244, 'Berovo', 129),
(2245, 'Bitola', 129),
(2246, 'Brod', 129),
(2247, 'Debar', 129),
(2248, 'Delchevo', 129),
(2249, 'Demir Hisar', 129),
(2250, 'Gevgelija', 129),
(2251, 'Gostivar', 129),
(2252, 'Kavadarci', 129),
(2253, 'Kichevo', 129),
(2254, 'Kochani', 129),
(2255, 'Kratovo', 129),
(2256, 'Kriva Palanka', 129),
(2257, 'Krushevo', 129),
(2258, 'Kumanovo', 129),
(2259, 'Negotino', 129),
(2260, 'Ohrid', 129),
(2261, 'Prilep', 129),
(2262, 'Probishtip', 129),
(2263, 'Radovish', 129),
(2264, 'Resen', 129),
(2265, 'Shtip', 129),
(2266, 'Skopje', 129),
(2267, 'Struga', 129),
(2268, 'Strumica', 129),
(2269, 'Sveti Nikole', 129),
(2270, 'Tetovo', 129),
(2271, 'Valandovo', 129),
(2272, 'Veles', 129),
(2273, 'Vinica', 129),
(2274, 'Antananarivo', 130),
(2275, 'Antsiranana', 130),
(2276, 'Fianarantsoa', 130),
(2277, 'Mahajanga', 130),
(2278, 'Toamasina', 130),
(2279, 'Toliary', 130),
(2280, 'Balaka', 131),
(2281, 'Blantyre City', 131),
(2282, 'Chikwawa', 131),
(2283, 'Chiradzulu', 131),
(2284, 'Chitipa', 131),
(2285, 'Dedza', 131),
(2286, 'Dowa', 131),
(2287, 'Karonga', 131),
(2288, 'Kasungu', 131),
(2289, 'Lilongwe City', 131),
(2290, 'Machinga', 131),
(2291, 'Mangochi', 131),
(2292, 'Mchinji', 131),
(2293, 'Mulanje', 131),
(2294, 'Mwanza', 131),
(2295, 'Mzimba', 131),
(2296, 'Mzuzu City', 131),
(2297, 'Nkhata Bay', 131),
(2298, 'Nkhotakota', 131),
(2299, 'Nsanje', 131),
(2300, 'Ntcheu', 131),
(2301, 'Ntchisi', 131),
(2302, 'Phalombe', 131),
(2303, 'Rumphi', 131),
(2304, 'Salima', 131),
(2305, 'Thyolo', 131),
(2306, 'Zomba Municipality', 131),
(2307, 'Johor', 132),
(2308, 'Kedah', 132),
(2309, 'Kelantan', 132),
(2310, 'Kuala Lumpur', 132),
(2311, 'Labuan', 132),
(2312, 'Melaka', 132),
(2313, 'Negeri Johor', 132),
(2314, 'Negeri Sembilan', 132),
(2315, 'Pahang', 132),
(2316, 'Penang', 132),
(2317, 'Perak', 132),
(2318, 'Perlis', 132),
(2319, 'Pulau Pinang', 132),
(2320, 'Sabah', 132),
(2321, 'Sarawak', 132),
(2322, 'Selangor', 132),
(2323, 'Sembilan', 132),
(2324, 'Terengganu', 132),
(2325, 'Alif Alif', 133),
(2326, 'Alif Dhaal', 133),
(2327, 'Baa', 133),
(2328, 'Dhaal', 133),
(2329, 'Faaf', 133),
(2330, 'Gaaf Alif', 133),
(2331, 'Gaaf Dhaal', 133),
(2332, 'Ghaviyani', 133),
(2333, 'Haa Alif', 133),
(2334, 'Haa Dhaal', 133),
(2335, 'Kaaf', 133),
(2336, 'Laam', 133),
(2337, 'Lhaviyani', 133),
(2338, 'Male', 133),
(2339, 'Miim', 133),
(2340, 'Nuun', 133),
(2341, 'Raa', 133),
(2342, 'Shaviyani', 133),
(2343, 'Siin', 133),
(2344, 'Thaa', 133),
(2345, 'Vaav', 133),
(2346, 'Bamako', 134),
(2347, 'Gao', 134),
(2348, 'Kayes', 134),
(2349, 'Kidal', 134),
(2350, 'Koulikoro', 134),
(2351, 'Mopti', 134),
(2352, 'Segou', 134),
(2353, 'Sikasso', 134),
(2354, 'Tombouctou', 134),
(2355, 'Gozo and Comino', 135),
(2356, 'Inner Harbour', 135),
(2357, 'Northern', 135),
(2358, 'Outer Harbour', 135),
(2359, 'South Eastern', 135),
(2360, 'Valletta', 135),
(2361, 'Western', 135),
(2362, 'Castletown', 136),
(2363, 'Douglas', 136),
(2364, 'Laxey', 136),
(2365, 'Onchan', 136),
(2366, 'Peel', 136),
(2367, 'Port Erin', 136),
(2368, 'Port Saint Mary', 136),
(2369, 'Ramsey', 136),
(2370, 'Ailinlaplap', 137),
(2371, 'Ailuk', 137),
(2372, 'Arno', 137),
(2373, 'Aur', 137),
(2374, 'Bikini', 137),
(2375, 'Ebon', 137),
(2376, 'Enewetak', 137),
(2377, 'Jabat', 137),
(2378, 'Jaluit', 137),
(2379, 'Kili', 137),
(2380, 'Kwajalein', 137),
(2381, 'Lae', 137),
(2382, 'Lib', 137),
(2383, 'Likiep', 137),
(2384, 'Majuro', 137),
(2385, 'Maloelap', 137),
(2386, 'Mejit', 137),
(2387, 'Mili', 137),
(2388, 'Namorik', 137),
(2389, 'Namu', 137),
(2390, 'Rongelap', 137),
(2391, 'Ujae', 137),
(2392, 'Utrik', 137),
(2393, 'Wotho', 137),
(2394, 'Wotje', 137),
(2395, 'Fort-de-France', 138),
(2396, 'La Trinite', 138),
(2397, 'Le Marin', 138),
(2398, 'Saint-Pierre', 138),
(2399, 'Adrar', 139),
(2400, 'Assaba', 139),
(2401, 'Brakna', 139),
(2402, 'Dhakhlat Nawadibu', 139),
(2403, 'Hudh-al-Gharbi', 139),
(2404, 'Hudh-ash-Sharqi', 139),
(2405, 'Inshiri', 139),
(2406, 'Nawakshut', 139),
(2407, 'Qidimagha', 139),
(2408, 'Qurqul', 139),
(2409, 'Taqant', 139),
(2410, 'Tiris Zammur', 139),
(2411, 'Trarza', 139),
(2412, 'Black River', 140),
(2413, 'Eau Coulee', 140),
(2414, 'Flacq', 140),
(2415, 'Floreal', 140),
(2416, 'Grand Port', 140),
(2417, 'Moka', 140),
(2418, 'Pamplempousses', 140),
(2419, 'Plaines Wilhelm', 140),
(2420, 'Port Louis', 140),
(2421, 'Riviere du Rempart', 140),
(2422, 'Rodrigues', 140),
(2423, 'Rose Hill', 140),
(2424, 'Savanne', 140),
(2425, 'Mayotte', 141),
(2426, 'Pamanzi', 141),
(2427, 'Aguascalientes', 142),
(2428, 'Baja California', 142),
(2429, 'Baja California Sur', 142),
(2430, 'Campeche', 142),
(2431, 'Chiapas', 142),
(2432, 'Chihuahua', 142),
(2433, 'Coahuila', 142),
(2434, 'Colima', 142),
(2435, 'Distrito Federal', 142),
(2436, 'Durango', 142),
(2437, 'Estado de Mexico', 142),
(2438, 'Guanajuato', 142),
(2439, 'Guerrero', 142),
(2440, 'Hidalgo', 142),
(2441, 'Jalisco', 142),
(2442, 'Mexico', 142),
(2443, 'Michoacan', 142),
(2444, 'Morelos', 142),
(2445, 'Nayarit', 142),
(2446, 'Nuevo Leon', 142),
(2447, 'Oaxaca', 142),
(2448, 'Puebla', 142),
(2449, 'Queretaro', 142),
(2450, 'Quintana Roo', 142),
(2451, 'San Luis Potosi', 142),
(2452, 'Sinaloa', 142),
(2453, 'Sonora', 142),
(2454, 'Tabasco', 142),
(2455, 'Tamaulipas', 142),
(2456, 'Tlaxcala', 142),
(2457, 'Veracruz', 142),
(2458, 'Yucatan', 142),
(2459, 'Zacatecas', 142),
(2460, 'Chuuk', 143),
(2461, 'Kusaie', 143),
(2462, 'Pohnpei', 143),
(2463, 'Yap', 143),
(2464, 'Balti', 144),
(2465, 'Cahul', 144),
(2466, 'Chisinau', 144),
(2467, 'Chisinau Oras', 144),
(2468, 'Edinet', 144),
(2469, 'Gagauzia', 144),
(2470, 'Lapusna', 144),
(2471, 'Orhei', 144),
(2472, 'Soroca', 144),
(2473, 'Taraclia', 144),
(2474, 'Tighina', 144),
(2475, 'Transnistria', 144),
(2476, 'Ungheni', 144),
(2477, 'Fontvieille', 145),
(2478, 'La Condamine', 145),
(2479, 'Monaco-Ville', 145),
(2480, 'Monte Carlo', 145),
(2481, 'Arhangaj', 146),
(2482, 'Bajan-Olgij', 146),
(2483, 'Bajanhongor', 146),
(2484, 'Bulgan', 146),
(2485, 'Darhan-Uul', 146),
(2486, 'Dornod', 146),
(2487, 'Dornogovi', 146),
(2488, 'Dundgovi', 146),
(2489, 'Govi-Altaj', 146),
(2490, 'Govisumber', 146),
(2491, 'Hentij', 146),
(2492, 'Hovd', 146),
(2493, 'Hovsgol', 146),
(2494, 'Omnogovi', 146),
(2495, 'Orhon', 146),
(2496, 'Ovorhangaj', 146),
(2497, 'Selenge', 146),
(2498, 'Suhbaatar', 146),
(2499, 'Tov', 146),
(2500, 'Ulaanbaatar', 146),
(2501, 'Uvs', 146),
(2502, 'Zavhan', 146),
(2503, 'Montserrat', 147),
(2504, 'Agadir', 148),
(2505, 'Casablanca', 148),
(2506, 'Chaouia-Ouardigha', 148),
(2507, 'Doukkala-Abda', 148),
(2508, 'Fes-Boulemane', 148),
(2509, 'Gharb-Chrarda-Beni Hssen', 148),
(2510, 'Guelmim', 148),
(2511, 'Kenitra', 148),
(2512, 'Marrakech-Tensift-Al Haouz', 148),
(2513, 'Meknes-Tafilalet', 148),
(2514, 'Oriental', 148),
(2515, 'Oujda', 148),
(2516, 'Province de Tanger', 148),
(2517, 'Rabat-Sale-Zammour-Zaer', 148),
(2518, 'Sala Al Jadida', 148),
(2519, 'Settat', 148),
(2520, 'Souss Massa-Draa', 148),
(2521, 'Tadla-Azilal', 148),
(2522, 'Tangier-Tetouan', 148),
(2523, 'Taza-Al Hoceima-Taounate', 148),
(2524, 'Wilaya de Casablanca', 148),
(2525, 'Wilaya de Rabat-Sale', 148),
(2526, 'Cabo Delgado', 149),
(2527, 'Gaza', 149),
(2528, 'Inhambane', 149),
(2529, 'Manica', 149),
(2530, 'Maputo', 149),
(2531, 'Maputo Provincia', 149),
(2532, 'Nampula', 149),
(2533, 'Niassa', 149),
(2534, 'Sofala', 149),
(2535, 'Tete', 149),
(2536, 'Zambezia', 149),
(2537, 'Ayeyarwady', 150),
(2538, 'Bago', 150),
(2539, 'Chin', 150),
(2540, 'Kachin', 150),
(2541, 'Kayah', 150),
(2542, 'Kayin', 150),
(2543, 'Magway', 150),
(2544, 'Mandalay', 150),
(2545, 'Mon', 150),
(2546, 'Nay Pyi Taw', 150),
(2547, 'Rakhine', 150),
(2548, 'Sagaing', 150),
(2549, 'Shan', 150),
(2550, 'Tanintharyi', 150),
(2551, 'Yangon', 150),
(2552, 'Caprivi', 151),
(2553, 'Erongo', 151),
(2554, 'Hardap', 151),
(2555, 'Karas', 151),
(2556, 'Kavango', 151),
(2557, 'Khomas', 151),
(2558, 'Kunene', 151),
(2559, 'Ohangwena', 151),
(2560, 'Omaheke', 151),
(2561, 'Omusati', 151),
(2562, 'Oshana', 151),
(2563, 'Oshikoto', 151),
(2564, 'Otjozondjupa', 151),
(2565, 'Yaren', 152),
(2566, 'Bagmati', 153),
(2567, 'Bheri', 153),
(2568, 'Dhawalagiri', 153),
(2569, 'Gandaki', 153),
(2570, 'Janakpur', 153),
(2571, 'Karnali', 153),
(2572, 'Koshi', 153),
(2573, 'Lumbini', 153),
(2574, 'Mahakali', 153),
(2575, 'Mechi', 153),
(2576, 'Narayani', 153),
(2577, 'Rapti', 153),
(2578, 'Sagarmatha', 153),
(2579, 'Seti', 153),
(2580, 'Bonaire', 154),
(2581, 'Curacao', 154),
(2582, 'Saba', 154),
(2583, 'Sint Eustatius', 154),
(2584, 'Sint Maarten', 154),
(2585, 'Amsterdam', 155),
(2586, 'Benelux', 155),
(2587, 'Drenthe', 155),
(2588, 'Flevoland', 155),
(2589, 'Friesland', 155),
(2590, 'Gelderland', 155),
(2591, 'Groningen', 155),
(2592, 'Limburg', 155),
(2593, 'Noord-Brabant', 155),
(2594, 'Noord-Holland', 155),
(2595, 'Overijssel', 155),
(2596, 'South Holland', 155),
(2597, 'Utrecht', 155),
(2598, 'Zeeland', 155),
(2599, 'Zuid-Holland', 155),
(2600, 'Iles', 156),
(2601, 'Nord', 156),
(2602, 'Sud', 156),
(2603, 'Area Outside Region', 157),
(2604, 'Auckland', 157),
(2605, 'Bay of Plenty', 157),
(2606, 'Canterbury', 157),
(2607, 'Christchurch', 157),
(2608, 'Gisborne', 157),
(2609, 'Hawke\'s Bay', 157),
(2610, 'Manawatu-Wanganui', 157),
(2611, 'Marlborough', 157),
(2612, 'Nelson', 157),
(2613, 'Northland', 157),
(2614, 'Otago', 157),
(2615, 'Rodney', 157),
(2616, 'Southland', 157),
(2617, 'Taranaki', 157),
(2618, 'Tasman', 157),
(2619, 'Waikato', 157),
(2620, 'Wellington', 157),
(2621, 'West Coast', 157),
(2622, 'Atlantico Norte', 158),
(2623, 'Atlantico Sur', 158),
(2624, 'Boaco', 158),
(2625, 'Carazo', 158),
(2626, 'Chinandega', 158),
(2627, 'Chontales', 158),
(2628, 'Esteli', 158),
(2629, 'Granada', 158),
(2630, 'Jinotega', 158),
(2631, 'Leon', 158),
(2632, 'Madriz', 158),
(2633, 'Managua', 158),
(2634, 'Masaya', 158),
(2635, 'Matagalpa', 158),
(2636, 'Nueva Segovia', 158),
(2637, 'Rio San Juan', 158),
(2638, 'Rivas', 158),
(2639, 'Agadez', 159),
(2640, 'Diffa', 159),
(2641, 'Dosso', 159),
(2642, 'Maradi', 159),
(2643, 'Niamey', 159),
(2644, 'Tahoua', 159),
(2645, 'Tillabery', 159),
(2646, 'Zinder', 159),
(2647, 'Abia', 160),
(2648, 'Abuja Federal Capital Territor', 160),
(2649, 'Adamawa', 160),
(2650, 'Akwa Ibom', 160),
(2651, 'Anambra', 160),
(2652, 'Bauchi', 160),
(2653, 'Bayelsa', 160),
(2654, 'Benue', 160),
(2655, 'Borno', 160),
(2656, 'Cross River', 160),
(2657, 'Delta', 160),
(2658, 'Ebonyi', 160),
(2659, 'Edo', 160),
(2660, 'Ekiti', 160),
(2661, 'Enugu', 160),
(2662, 'Gombe', 160),
(2663, 'Imo', 160),
(2664, 'Jigawa', 160),
(2665, 'Kaduna', 160),
(2666, 'Kano', 160),
(2667, 'Katsina', 160),
(2668, 'Kebbi', 160),
(2669, 'Kogi', 160),
(2670, 'Kwara', 160),
(2671, 'Lagos', 160),
(2672, 'Nassarawa', 160),
(2673, 'Niger', 160),
(2674, 'Ogun', 160),
(2675, 'Ondo', 160),
(2676, 'Osun', 160),
(2677, 'Oyo', 160),
(2678, 'Plateau', 160),
(2679, 'Rivers', 160),
(2680, 'Sokoto', 160),
(2681, 'Taraba', 160),
(2682, 'Yobe', 160),
(2683, 'Zamfara', 160),
(2684, 'Niue', 161),
(2685, 'Norfolk Island', 162),
(2686, 'Northern Islands', 163),
(2687, 'Rota', 163),
(2688, 'Saipan', 163),
(2689, 'Tinian', 163),
(2690, 'Akershus', 164),
(2691, 'Aust Agder', 164),
(2692, 'Bergen', 164),
(2693, 'Buskerud', 164),
(2694, 'Finnmark', 164),
(2695, 'Hedmark', 164),
(2696, 'Hordaland', 164),
(2697, 'Moere og Romsdal', 164),
(2698, 'Nord Trondelag', 164),
(2699, 'Nordland', 164),
(2700, 'Oestfold', 164),
(2701, 'Oppland', 164),
(2702, 'Oslo', 164),
(2703, 'Rogaland', 164),
(2704, 'Soer Troendelag', 164),
(2705, 'Sogn og Fjordane', 164),
(2706, 'Stavern', 164),
(2707, 'Sykkylven', 164),
(2708, 'Telemark', 164),
(2709, 'Troms', 164),
(2710, 'Vest Agder', 164),
(2711, 'Vestfold', 164),
(2712, 'ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚', 164),
(2713, 'Al Buraimi', 165),
(2714, 'Dhufar', 165),
(2715, 'Masqat', 165),
(2716, 'Musandam', 165),
(2717, 'Rusayl', 165),
(2718, 'Wadi Kabir', 165),
(2719, 'ad-Dakhiliyah', 165),
(2720, 'adh-Dhahirah', 165),
(2721, 'al-Batinah', 165),
(2722, 'ash-Sharqiyah', 165),
(2723, 'Baluchistan', 166),
(2724, 'Federal Capital Area', 166),
(2725, 'Federally administered Tribal ', 166),
(2726, 'North-West Frontier', 166),
(2727, 'Northern Areas', 166),
(2728, 'Punjab', 166),
(2729, 'Sind', 166),
(2730, 'Aimeliik', 167),
(2731, 'Airai', 167),
(2732, 'Angaur', 167),
(2733, 'Hatobohei', 167),
(2734, 'Kayangel', 167),
(2735, 'Koror', 167),
(2736, 'Melekeok', 167),
(2737, 'Ngaraard', 167),
(2738, 'Ngardmau', 167),
(2739, 'Ngaremlengui', 167),
(2740, 'Ngatpang', 167),
(2741, 'Ngchesar', 167),
(2742, 'Ngerchelong', 167),
(2743, 'Ngiwal', 167),
(2744, 'Peleliu', 167),
(2745, 'Sonsorol', 167),
(2746, 'Ariha', 168),
(2747, 'Bayt Lahm', 168),
(2748, 'Bethlehem', 168),
(2749, 'Dayr-al-Balah', 168),
(2750, 'Ghazzah', 168),
(2751, 'Ghazzah ash-Shamaliyah', 168),
(2752, 'Janin', 168),
(2753, 'Khan Yunis', 168),
(2754, 'Nabulus', 168),
(2755, 'Qalqilyah', 168),
(2756, 'Rafah', 168),
(2757, 'Ram Allah wal-Birah', 168),
(2758, 'Salfit', 168),
(2759, 'Tubas', 168),
(2760, 'Tulkarm', 168),
(2761, 'al-Khalil', 168),
(2762, 'al-Quds', 168),
(2763, 'Bocas del Toro', 169),
(2764, 'Chiriqui', 169),
(2765, 'Cocle', 169),
(2766, 'Colon', 169),
(2767, 'Darien', 169),
(2768, 'Embera', 169),
(2769, 'Herrera', 169),
(2770, 'Kuna Yala', 169),
(2771, 'Los Santos', 169),
(2772, 'Ngobe Bugle', 169),
(2773, 'Panama', 169),
(2774, 'Veraguas', 169),
(2775, 'East New Britain', 170),
(2776, 'East Sepik', 170),
(2777, 'Eastern Highlands', 170),
(2778, 'Enga', 170),
(2779, 'Fly River', 170),
(2780, 'Gulf', 170),
(2781, 'Madang', 170),
(2782, 'Manus', 170),
(2783, 'Milne Bay', 170),
(2784, 'Morobe', 170),
(2785, 'National Capital District', 170),
(2786, 'New Ireland', 170),
(2787, 'North Solomons', 170),
(2788, 'Oro', 170),
(2789, 'Sandaun', 170),
(2790, 'Simbu', 170),
(2791, 'Southern Highlands', 170),
(2792, 'West New Britain', 170),
(2793, 'Western Highlands', 170),
(2794, 'Alto Paraguay', 171),
(2795, 'Alto Parana', 171),
(2796, 'Amambay', 171),
(2797, 'Asuncion', 171),
(2798, 'Boqueron', 171),
(2799, 'Caaguazu', 171),
(2800, 'Caazapa', 171),
(2801, 'Canendiyu', 171),
(2802, 'Central', 171),
(2803, 'Concepcion', 171),
(2804, 'Cordillera', 171),
(2805, 'Guaira', 171),
(2806, 'Itapua', 171),
(2807, 'Misiones', 171),
(2808, 'Neembucu', 171),
(2809, 'Paraguari', 171),
(2810, 'Presidente Hayes', 171),
(2811, 'San Pedro', 171),
(2812, 'Amazonas', 172),
(2813, 'Ancash', 172),
(2814, 'Apurimac', 172),
(2815, 'Arequipa', 172),
(2816, 'Ayacucho', 172),
(2817, 'Cajamarca', 172),
(2818, 'Cusco', 172),
(2819, 'Huancavelica', 172),
(2820, 'Huanuco', 172),
(2821, 'Ica', 172),
(2822, 'Junin', 172),
(2823, 'La Libertad', 172),
(2824, 'Lambayeque', 172),
(2825, 'Lima y Callao', 172),
(2826, 'Loreto', 172),
(2827, 'Madre de Dios', 172),
(2828, 'Moquegua', 172),
(2829, 'Pasco', 172),
(2830, 'Piura', 172),
(2831, 'Puno', 172),
(2832, 'San Martin', 172),
(2833, 'Tacna', 172),
(2834, 'Tumbes', 172),
(2835, 'Ucayali', 172),
(2836, 'Batangas', 173),
(2837, 'Bicol', 173),
(2838, 'Bulacan', 173),
(2839, 'Cagayan', 173),
(2840, 'Caraga', 173),
(2841, 'Central Luzon', 173),
(2842, 'Central Mindanao', 173),
(2843, 'Central Visayas', 173),
(2844, 'Cordillera', 173),
(2845, 'Davao', 173),
(2846, 'Eastern Visayas', 173),
(2847, 'Greater Metropolitan Area', 173),
(2848, 'Ilocos', 173),
(2849, 'Laguna', 173),
(2850, 'Luzon', 173),
(2851, 'Mactan', 173),
(2852, 'Metropolitan Manila Area', 173),
(2853, 'Muslim Mindanao', 173),
(2854, 'Northern Mindanao', 173),
(2855, 'Southern Mindanao', 173),
(2856, 'Southern Tagalog', 173),
(2857, 'Western Mindanao', 173),
(2858, 'Western Visayas', 173),
(2859, 'Pitcairn Island', 174),
(2860, 'Biale Blota', 175),
(2861, 'Dobroszyce', 175),
(2862, 'Dolnoslaskie', 175),
(2863, 'Dziekanow Lesny', 175),
(2864, 'Hopowo', 175),
(2865, 'Kartuzy', 175),
(2866, 'Koscian', 175),
(2867, 'Krakow', 175),
(2868, 'Kujawsko-Pomorskie', 175),
(2869, 'Lodzkie', 175),
(2870, 'Lubelskie', 175),
(2871, 'Lubuskie', 175),
(2872, 'Malomice', 175),
(2873, 'Malopolskie', 175),
(2874, 'Mazowieckie', 175),
(2875, 'Mirkow', 175),
(2876, 'Opolskie', 175),
(2877, 'Ostrowiec', 175),
(2878, 'Podkarpackie', 175),
(2879, 'Podlaskie', 175),
(2880, 'Polska', 175),
(2881, 'Pomorskie', 175),
(2882, 'Poznan', 175),
(2883, 'Pruszkow', 175),
(2884, 'Rymanowska', 175),
(2885, 'Rzeszow', 175),
(2886, 'Slaskie', 175),
(2887, 'Stare Pole', 175),
(2888, 'Swietokrzyskie', 175),
(2889, 'Warminsko-Mazurskie', 175),
(2890, 'Warsaw', 175),
(2891, 'Wejherowo', 175),
(2892, 'Wielkopolskie', 175),
(2893, 'Wroclaw', 175),
(2894, 'Zachodnio-Pomorskie', 175),
(2895, 'Zukowo', 175),
(2896, 'Abrantes', 176),
(2897, 'Acores', 176),
(2898, 'Alentejo', 176),
(2899, 'Algarve', 176),
(2900, 'Braga', 176),
(2901, 'Centro', 176),
(2902, 'Distrito de Leiria', 176),
(2903, 'Distrito de Viana do Castelo', 176),
(2904, 'Distrito de Vila Real', 176),
(2905, 'Distrito do Porto', 176),
(2906, 'Lisboa e Vale do Tejo', 176),
(2907, 'Madeira', 176),
(2908, 'Norte', 176),
(2909, 'Paivas', 176),
(2910, 'Arecibo', 177),
(2911, 'Bayamon', 177),
(2912, 'Carolina', 177),
(2913, 'Florida', 177),
(2914, 'Guayama', 177),
(2915, 'Humacao', 177),
(2916, 'Mayaguez-Aguadilla', 177),
(2917, 'Ponce', 177),
(2918, 'Salinas', 177),
(2919, 'San Juan', 177),
(2920, 'Doha', 178),
(2921, 'Jarian-al-Batnah', 178),
(2922, 'Umm Salal', 178),
(2923, 'ad-Dawhah', 178),
(2924, 'al-Ghuwayriyah', 178),
(2925, 'al-Jumayliyah', 178),
(2926, 'al-Khawr', 178),
(2927, 'al-Wakrah', 178),
(2928, 'ar-Rayyan', 178),
(2929, 'ash-Shamal', 178),
(2930, 'Saint-Benoit', 179),
(2931, 'Saint-Denis', 179),
(2932, 'Saint-Paul', 179),
(2933, 'Saint-Pierre', 179),
(2934, 'Alba', 180),
(2935, 'Arad', 180),
(2936, 'Arges', 180),
(2937, 'Bacau', 180),
(2938, 'Bihor', 180),
(2939, 'Bistrita-Nasaud', 180),
(2940, 'Botosani', 180),
(2941, 'Braila', 180),
(2942, 'Brasov', 180),
(2943, 'Bucuresti', 180),
(2944, 'Buzau', 180),
(2945, 'Calarasi', 180),
(2946, 'Caras-Severin', 180),
(2947, 'Cluj', 180),
(2948, 'Constanta', 180),
(2949, 'Covasna', 180),
(2950, 'Dambovita', 180),
(2951, 'Dolj', 180),
(2952, 'Galati', 180),
(2953, 'Giurgiu', 180),
(2954, 'Gorj', 180),
(2955, 'Harghita', 180),
(2956, 'Hunedoara', 180),
(2957, 'Ialomita', 180),
(2958, 'Iasi', 180),
(2959, 'Ilfov', 180),
(2960, 'Maramures', 180),
(2961, 'Mehedinti', 180),
(2962, 'Mures', 180),
(2963, 'Neamt', 180),
(2964, 'Olt', 180),
(2965, 'Prahova', 180),
(2966, 'Salaj', 180),
(2967, 'Satu Mare', 180),
(2968, 'Sibiu', 180),
(2969, 'Sondelor', 180),
(2970, 'Suceava', 180),
(2971, 'Teleorman', 180),
(2972, 'Timis', 180),
(2973, 'Tulcea', 180),
(2974, 'Valcea', 180),
(2975, 'Vaslui', 180),
(2976, 'Vrancea', 180),
(2977, 'Adygeja', 181),
(2978, 'Aga', 181),
(2979, 'Alanija', 181),
(2980, 'Altaj', 181),
(2981, 'Amur', 181),
(2982, 'Arhangelsk', 181),
(2983, 'Astrahan', 181),
(2984, 'Bashkortostan', 181),
(2985, 'Belgorod', 181),
(2986, 'Brjansk', 181),
(2987, 'Burjatija', 181),
(2988, 'Chechenija', 181),
(2989, 'Cheljabinsk', 181),
(2990, 'Chita', 181),
(2991, 'Chukotka', 181),
(2992, 'Chuvashija', 181),
(2993, 'Dagestan', 181),
(2994, 'Evenkija', 181),
(2995, 'Gorno-Altaj', 181),
(2996, 'Habarovsk', 181),
(2997, 'Hakasija', 181),
(2998, 'Hanty-Mansija', 181),
(2999, 'Ingusetija', 181),
(3000, 'Irkutsk', 181),
(3001, 'Ivanovo', 181),
(3002, 'Jamalo-Nenets', 181),
(3003, 'Jaroslavl', 181),
(3004, 'Jevrej', 181),
(3005, 'Kabardino-Balkarija', 181),
(3006, 'Kaliningrad', 181),
(3007, 'Kalmykija', 181),
(3008, 'Kaluga', 181),
(3009, 'Kamchatka', 181),
(3010, 'Karachaj-Cherkessija', 181),
(3011, 'Karelija', 181),
(3012, 'Kemerovo', 181),
(3013, 'Khabarovskiy Kray', 181),
(3014, 'Kirov', 181),
(3015, 'Komi', 181),
(3016, 'Komi-Permjakija', 181),
(3017, 'Korjakija', 181),
(3018, 'Kostroma', 181),
(3019, 'Krasnodar', 181),
(3020, 'Krasnojarsk', 181),
(3021, 'Krasnoyarskiy Kray', 181),
(3022, 'Kurgan', 181),
(3023, 'Kursk', 181),
(3024, 'Leningrad', 181),
(3025, 'Lipeck', 181),
(3026, 'Magadan', 181),
(3027, 'Marij El', 181),
(3028, 'Mordovija', 181),
(3029, 'Moscow', 181),
(3030, 'Moskovskaja Oblast', 181),
(3031, 'Moskovskaya Oblast', 181),
(3032, 'Moskva', 181),
(3033, 'Murmansk', 181),
(3034, 'Nenets', 181),
(3035, 'Nizhnij Novgorod', 181),
(3036, 'Novgorod', 181),
(3037, 'Novokusnezk', 181),
(3038, 'Novosibirsk', 181),
(3039, 'Omsk', 181),
(3040, 'Orenburg', 181),
(3041, 'Orjol', 181),
(3042, 'Penza', 181),
(3043, 'Perm', 181),
(3044, 'Primorje', 181),
(3045, 'Pskov', 181),
(3046, 'Pskovskaya Oblast', 181),
(3047, 'Rjazan', 181),
(3048, 'Rostov', 181),
(3049, 'Saha', 181),
(3050, 'Sahalin', 181),
(3051, 'Samara', 181),
(3052, 'Samarskaya', 181),
(3053, 'Sankt-Peterburg', 181),
(3054, 'Saratov', 181),
(3055, 'Smolensk', 181),
(3056, 'Stavropol', 181),
(3057, 'Sverdlovsk', 181),
(3058, 'Tajmyrija', 181),
(3059, 'Tambov', 181),
(3060, 'Tatarstan', 181),
(3061, 'Tjumen', 181),
(3062, 'Tomsk', 181),
(3063, 'Tula', 181),
(3064, 'Tver', 181),
(3065, 'Tyva', 181),
(3066, 'Udmurtija', 181),
(3067, 'Uljanovsk', 181),
(3068, 'Ulyanovskaya Oblast', 181),
(3069, 'Ust-Orda', 181),
(3070, 'Vladimir', 181),
(3071, 'Volgograd', 181),
(3072, 'Vologda', 181),
(3073, 'Voronezh', 181),
(3074, 'Butare', 182),
(3075, 'Byumba', 182),
(3076, 'Cyangugu', 182),
(3077, 'Gikongoro', 182),
(3078, 'Gisenyi', 182),
(3079, 'Gitarama', 182),
(3080, 'Kibungo', 182),
(3081, 'Kibuye', 182),
(3082, 'Kigali-ngali', 182),
(3083, 'Ruhengeri', 182),
(3084, 'Ascension', 183),
(3085, 'Gough Island', 183),
(3086, 'Saint Helena', 183),
(3087, 'Tristan da Cunha', 183),
(3088, 'Christ Church Nichola Town', 184),
(3089, 'Saint Anne Sandy Point', 184),
(3090, 'Saint George Basseterre', 184),
(3091, 'Saint George Gingerland', 184),
(3092, 'Saint James Windward', 184),
(3093, 'Saint John Capesterre', 184),
(3094, 'Saint John Figtree', 184),
(3095, 'Saint Mary Cayon', 184),
(3096, 'Saint Paul Capesterre', 184),
(3097, 'Saint Paul Charlestown', 184),
(3098, 'Saint Peter Basseterre', 184),
(3099, 'Saint Thomas Lowland', 184),
(3100, 'Saint Thomas Middle Island', 184),
(3101, 'Trinity Palmetto Point', 184),
(3102, 'Anse-la-Raye', 185),
(3103, 'Canaries', 185),
(3104, 'Castries', 185),
(3105, 'Choiseul', 185),
(3106, 'Dennery', 185),
(3107, 'Gros Inlet', 185),
(3108, 'Laborie', 185),
(3109, 'Micoud', 185),
(3110, 'Soufriere', 185),
(3111, 'Vieux Fort', 185),
(3112, 'Miquelon-Langlade', 186),
(3113, 'Saint-Pierre', 186),
(3114, 'Charlotte', 187),
(3115, 'Grenadines', 187),
(3116, 'Saint Andrew', 187),
(3117, 'Saint David', 187),
(3118, 'Saint George', 187),
(3119, 'Saint Patrick', 187),
(3120, 'A\'ana', 188),
(3121, 'Aiga-i-le-Tai', 188),
(3122, 'Atua', 188),
(3123, 'Fa\'asaleleaga', 188),
(3124, 'Gaga\'emauga', 188),
(3125, 'Gagaifomauga', 188),
(3126, 'Palauli', 188),
(3127, 'Satupa\'itea', 188),
(3128, 'Tuamasaga', 188),
(3129, 'Va\'a-o-Fonoti', 188),
(3130, 'Vaisigano', 188),
(3131, 'Acquaviva', 189),
(3132, 'Borgo Maggiore', 189),
(3133, 'Chiesanuova', 189),
(3134, 'Domagnano', 189),
(3135, 'Faetano', 189),
(3136, 'Fiorentino', 189),
(3137, 'Montegiardino', 189),
(3138, 'San Marino', 189),
(3139, 'Serravalle', 189),
(3140, 'Agua Grande', 190),
(3141, 'Cantagalo', 190),
(3142, 'Lemba', 190),
(3143, 'Lobata', 190),
(3144, 'Me-Zochi', 190),
(3145, 'Pague', 190),
(3146, 'Al Khobar', 191),
(3147, 'Aseer', 191),
(3148, 'Ash Sharqiyah', 191),
(3149, 'Asir', 191),
(3150, 'Central Province', 191),
(3151, 'Eastern Province', 191),
(3152, 'Ha\'il', 191),
(3153, 'Jawf', 191),
(3154, 'Jizan', 191),
(3155, 'Makkah', 191),
(3156, 'Najran', 191),
(3157, 'Qasim', 191),
(3158, 'Tabuk', 191),
(3159, 'Western Province', 191),
(3160, 'al-Bahah', 191),
(3161, 'al-Hudud-ash-Shamaliyah', 191),
(3162, 'al-Madinah', 191),
(3163, 'ar-Riyad', 191),
(3164, 'Dakar', 192),
(3165, 'Diourbel', 192),
(3166, 'Fatick', 192),
(3167, 'Kaolack', 192),
(3168, 'Kolda', 192),
(3169, 'Louga', 192),
(3170, 'Saint-Louis', 192),
(3171, 'Tambacounda', 192),
(3172, 'Thies', 192),
(3173, 'Ziguinchor', 192),
(3174, 'Central Serbia', 193),
(3175, 'Kosovo and Metohija', 193),
(3176, 'Vojvodina', 193),
(3177, 'Anse Boileau', 194),
(3178, 'Anse Royale', 194),
(3179, 'Cascade', 194),
(3180, 'Takamaka', 194),
(3181, 'Victoria', 194),
(3182, 'Eastern', 195),
(3183, 'Northern', 195),
(3184, 'Southern', 195),
(3185, 'Western', 195),
(3186, 'Singapore', 196),
(3187, 'Banskobystricky', 197),
(3188, 'Bratislavsky', 197),
(3189, 'Kosicky', 197),
(3190, 'Nitriansky', 197),
(3191, 'Presovsky', 197),
(3192, 'Trenciansky', 197),
(3193, 'Trnavsky', 197),
(3194, 'Zilinsky', 197),
(3195, 'Benedikt', 198),
(3196, 'Gorenjska', 198),
(3197, 'Gorishka', 198),
(3198, 'Jugovzhodna Slovenija', 198),
(3199, 'Koroshka', 198),
(3200, 'Notranjsko-krashka', 198),
(3201, 'Obalno-krashka', 198),
(3202, 'Obcina Domzale', 198),
(3203, 'Obcina Vitanje', 198),
(3204, 'Osrednjeslovenska', 198),
(3205, 'Podravska', 198),
(3206, 'Pomurska', 198),
(3207, 'Savinjska', 198),
(3208, 'Slovenian Littoral', 198),
(3209, 'Spodnjeposavska', 198),
(3210, 'Zasavska', 198),
(3211, 'Pitcairn', 199),
(3212, 'Central', 200),
(3213, 'Choiseul', 200),
(3214, 'Guadalcanal', 200),
(3215, 'Isabel', 200),
(3216, 'Makira and Ulawa', 200),
(3217, 'Malaita', 200),
(3218, 'Rennell and Bellona', 200),
(3219, 'Temotu', 200),
(3220, 'Western', 200),
(3221, 'Awdal', 201),
(3222, 'Bakol', 201),
(3223, 'Banadir', 201),
(3224, 'Bari', 201),
(3225, 'Bay', 201),
(3226, 'Galgudug', 201),
(3227, 'Gedo', 201),
(3228, 'Hiran', 201),
(3229, 'Jubbada Hose', 201),
(3230, 'Jubbadha Dexe', 201),
(3231, 'Mudug', 201),
(3232, 'Nugal', 201),
(3233, 'Sanag', 201),
(3234, 'Shabellaha Dhexe', 201),
(3235, 'Shabellaha Hose', 201),
(3236, 'Togdher', 201),
(3237, 'Woqoyi Galbed', 201),
(3238, 'Eastern Cape', 202),
(3239, 'Free State', 202),
(3240, 'Gauteng', 202),
(3241, 'Kempton Park', 202),
(3242, 'Kramerville', 202),
(3243, 'KwaZulu Natal', 202),
(3244, 'Limpopo', 202),
(3245, 'Mpumalanga', 202),
(3246, 'North West', 202),
(3247, 'Northern Cape', 202),
(3248, 'Parow', 202),
(3249, 'Table View', 202),
(3250, 'Umtentweni', 202),
(3251, 'Western Cape', 202),
(3252, 'South Georgia', 203),
(3253, 'Central Equatoria', 204),
(3254, 'A Coruna', 205),
(3255, 'Alacant', 205),
(3256, 'Alava', 205),
(3257, 'Albacete', 205),
(3258, 'Almeria', 205),
(3259, 'Andalucia', 205),
(3260, 'Asturias', 205),
(3261, 'Avila', 205),
(3262, 'Badajoz', 205),
(3263, 'Balears', 205),
(3264, 'Barcelona', 205),
(3265, 'Bertamirans', 205),
(3266, 'Biscay', 205),
(3267, 'Burgos', 205),
(3268, 'Caceres', 205),
(3269, 'Cadiz', 205),
(3270, 'Cantabria', 205),
(3271, 'Castello', 205),
(3272, 'Catalunya', 205),
(3273, 'Ceuta', 205),
(3274, 'Ciudad Real', 205),
(3275, 'Comunidad Autonoma de Canarias', 205),
(3276, 'Comunidad Autonoma de Cataluna', 205),
(3277, 'Comunidad Autonoma de Galicia', 205),
(3278, 'Comunidad Autonoma de las Isla', 205),
(3279, 'Comunidad Autonoma del Princip', 205),
(3280, 'Comunidad Valenciana', 205),
(3281, 'Cordoba', 205),
(3282, 'Cuenca', 205),
(3283, 'Gipuzkoa', 205),
(3284, 'Girona', 205),
(3285, 'Granada', 205),
(3286, 'Guadalajara', 205),
(3287, 'Guipuzcoa', 205),
(3288, 'Huelva', 205),
(3289, 'Huesca', 205),
(3290, 'Jaen', 205),
(3291, 'La Rioja', 205),
(3292, 'Las Palmas', 205),
(3293, 'Leon', 205),
(3294, 'Lerida', 205),
(3295, 'Lleida', 205),
(3296, 'Lugo', 205),
(3297, 'Madrid', 205),
(3298, 'Malaga', 205),
(3299, 'Melilla', 205),
(3300, 'Murcia', 205),
(3301, 'Navarra', 205),
(3302, 'Ourense', 205),
(3303, 'Pais Vasco', 205),
(3304, 'Palencia', 205),
(3305, 'Pontevedra', 205),
(3306, 'Salamanca', 205),
(3307, 'Santa Cruz de Tenerife', 205),
(3308, 'Segovia', 205),
(3309, 'Sevilla', 205),
(3310, 'Soria', 205),
(3311, 'Tarragona', 205),
(3312, 'Tenerife', 205),
(3313, 'Teruel', 205),
(3314, 'Toledo', 205),
(3315, 'Valencia', 205),
(3316, 'Valladolid', 205),
(3317, 'Vizcaya', 205),
(3318, 'Zamora', 205),
(3319, 'Zaragoza', 205),
(3320, 'Amparai', 206),
(3321, 'Anuradhapuraya', 206),
(3322, 'Badulla', 206),
(3323, 'Boralesgamuwa', 206),
(3324, 'Colombo', 206),
(3325, 'Galla', 206),
(3326, 'Gampaha', 206),
(3327, 'Hambantota', 206),
(3328, 'Kalatura', 206),
(3329, 'Kegalla', 206),
(3330, 'Kilinochchi', 206),
(3331, 'Kurunegala', 206),
(3332, 'Madakalpuwa', 206),
(3333, 'Maha Nuwara', 206),
(3334, 'Malwana', 206),
(3335, 'Mannarama', 206),
(3336, 'Matale', 206),
(3337, 'Matara', 206),
(3338, 'Monaragala', 206),
(3339, 'Mullaitivu', 206),
(3340, 'North Eastern Province', 206),
(3341, 'North Western Province', 206),
(3342, 'Nuwara Eliya', 206),
(3343, 'Polonnaruwa', 206),
(3344, 'Puttalama', 206),
(3345, 'Ratnapuraya', 206),
(3346, 'Southern Province', 206),
(3347, 'Tirikunamalaya', 206),
(3348, 'Tuscany', 206),
(3349, 'Vavuniyawa', 206),
(3350, 'Western Province', 206),
(3351, 'Yapanaya', 206),
(3352, 'kadawatha', 206),
(3353, 'A\'ali-an-Nil', 207),
(3354, 'Bahr-al-Jabal', 207),
(3355, 'Central Equatoria', 207),
(3356, 'Gharb Bahr-al-Ghazal', 207),
(3357, 'Gharb Darfur', 207),
(3358, 'Gharb Kurdufan', 207),
(3359, 'Gharb-al-Istiwa\'iyah', 207),
(3360, 'Janub Darfur', 207),
(3361, 'Janub Kurdufan', 207),
(3362, 'Junqali', 207),
(3363, 'Kassala', 207),
(3364, 'Nahr-an-Nil', 207),
(3365, 'Shamal Bahr-al-Ghazal', 207),
(3366, 'Shamal Darfur', 207),
(3367, 'Shamal Kurdufan', 207),
(3368, 'Sharq-al-Istiwa\'iyah', 207),
(3369, 'Sinnar', 207),
(3370, 'Warab', 207),
(3371, 'Wilayat al Khartum', 207),
(3372, 'al-Bahr-al-Ahmar', 207),
(3373, 'al-Buhayrat', 207),
(3374, 'al-Jazirah', 207),
(3375, 'al-Khartum', 207),
(3376, 'al-Qadarif', 207),
(3377, 'al-Wahdah', 207),
(3378, 'an-Nil-al-Abyad', 207),
(3379, 'an-Nil-al-Azraq', 207),
(3380, 'ash-Shamaliyah', 207),
(3381, 'Brokopondo', 208),
(3382, 'Commewijne', 208),
(3383, 'Coronie', 208),
(3384, 'Marowijne', 208),
(3385, 'Nickerie', 208),
(3386, 'Para', 208),
(3387, 'Paramaribo', 208),
(3388, 'Saramacca', 208),
(3389, 'Wanica', 208),
(3390, 'Svalbard', 209),
(3391, 'Hhohho', 210),
(3392, 'Lubombo', 210),
(3393, 'Manzini', 210),
(3394, 'Shiselweni', 210),
(3395, 'Alvsborgs Lan', 211),
(3396, 'Angermanland', 211),
(3397, 'Blekinge', 211),
(3398, 'Bohuslan', 211),
(3399, 'Dalarna', 211),
(3400, 'Gavleborg', 211),
(3401, 'Gaza', 211),
(3402, 'Gotland', 211),
(3403, 'Halland', 211),
(3404, 'Jamtland', 211),
(3405, 'Jonkoping', 211),
(3406, 'Kalmar', 211),
(3407, 'Kristianstads', 211),
(3408, 'Kronoberg', 211),
(3409, 'Norrbotten', 211),
(3410, 'Orebro', 211),
(3411, 'Ostergotland', 211),
(3412, 'Saltsjo-Boo', 211),
(3413, 'Skane', 211),
(3414, 'Smaland', 211),
(3415, 'Sodermanland', 211),
(3416, 'Stockholm', 211),
(3417, 'Uppsala', 211),
(3418, 'Varmland', 211),
(3419, 'Vasterbotten', 211),
(3420, 'Vastergotland', 211),
(3421, 'Vasternorrland', 211),
(3422, 'Vastmanland', 211),
(3423, 'Vastra Gotaland', 211),
(3424, 'Aargau', 212),
(3425, 'Appenzell Inner-Rhoden', 212),
(3426, 'Appenzell-Ausser Rhoden', 212),
(3427, 'Basel-Landschaft', 212),
(3428, 'Basel-Stadt', 212),
(3429, 'Bern', 212),
(3430, 'Canton Ticino', 212),
(3431, 'Fribourg', 212),
(3432, 'Geneve', 212),
(3433, 'Glarus', 212),
(3434, 'Graubunden', 212),
(3435, 'Heerbrugg', 212),
(3436, 'Jura', 212),
(3437, 'Kanton Aargau', 212),
(3438, 'Luzern', 212),
(3439, 'Morbio Inferiore', 212),
(3440, 'Muhen', 212),
(3441, 'Neuchatel', 212),
(3442, 'Nidwalden', 212),
(3443, 'Obwalden', 212),
(3444, 'Sankt Gallen', 212),
(3445, 'Schaffhausen', 212),
(3446, 'Schwyz', 212),
(3447, 'Solothurn', 212),
(3448, 'Thurgau', 212),
(3449, 'Ticino', 212),
(3450, 'Uri', 212),
(3451, 'Valais', 212),
(3452, 'Vaud', 212),
(3453, 'Vauffelin', 212),
(3454, 'Zug', 212),
(3455, 'Zurich', 212),
(3456, 'Aleppo', 213),
(3457, 'Dar\'a', 213),
(3458, 'Dayr-az-Zawr', 213),
(3459, 'Dimashq', 213),
(3460, 'Halab', 213),
(3461, 'Hamah', 213),
(3462, 'Hims', 213),
(3463, 'Idlib', 213),
(3464, 'Madinat Dimashq', 213),
(3465, 'Tartus', 213),
(3466, 'al-Hasakah', 213),
(3467, 'al-Ladhiqiyah', 213),
(3468, 'al-Qunaytirah', 213),
(3469, 'ar-Raqqah', 213),
(3470, 'as-Suwayda', 213),
(3471, 'Changhwa', 214),
(3472, 'Chiayi Hsien', 214),
(3473, 'Chiayi Shih', 214),
(3474, 'Eastern Taipei', 214),
(3475, 'Hsinchu Hsien', 214),
(3476, 'Hsinchu Shih', 214),
(3477, 'Hualien', 214),
(3478, 'Ilan', 214),
(3479, 'Kaohsiung Hsien', 214),
(3480, 'Kaohsiung Shih', 214),
(3481, 'Keelung Shih', 214),
(3482, 'Kinmen', 214),
(3483, 'Miaoli', 214),
(3484, 'Nantou', 214),
(3485, 'Northern Taiwan', 214),
(3486, 'Penghu', 214),
(3487, 'Pingtung', 214),
(3488, 'Taichung', 214),
(3489, 'Taichung Hsien', 214),
(3490, 'Taichung Shih', 214),
(3491, 'Tainan Hsien', 214),
(3492, 'Tainan Shih', 214),
(3493, 'Taipei Hsien', 214),
(3494, 'Taipei Shih / Taipei Hsien', 214),
(3495, 'Taitung', 214),
(3496, 'Taoyuan', 214),
(3497, 'Yilan', 214),
(3498, 'Yun-Lin Hsien', 214),
(3499, 'Yunlin', 214),
(3500, 'Dushanbe', 215),
(3501, 'Gorno-Badakhshan', 215),
(3502, 'Karotegin', 215),
(3503, 'Khatlon', 215),
(3504, 'Sughd', 215),
(3505, 'Arusha', 216),
(3506, 'Dar es Salaam', 216),
(3507, 'Dodoma', 216),
(3508, 'Iringa', 216),
(3509, 'Kagera', 216),
(3510, 'Kigoma', 216),
(3511, 'Kilimanjaro', 216),
(3512, 'Lindi', 216),
(3513, 'Mara', 216),
(3514, 'Mbeya', 216),
(3515, 'Morogoro', 216),
(3516, 'Mtwara', 216),
(3517, 'Mwanza', 216),
(3518, 'Pwani', 216),
(3519, 'Rukwa', 216),
(3520, 'Ruvuma', 216),
(3521, 'Shinyanga', 216),
(3522, 'Singida', 216),
(3523, 'Tabora', 216),
(3524, 'Tanga', 216),
(3525, 'Zanzibar and Pemba', 216),
(3526, 'Amnat Charoen', 217),
(3527, 'Ang Thong', 217),
(3528, 'Bangkok', 217),
(3529, 'Buri Ram', 217),
(3530, 'Chachoengsao', 217),
(3531, 'Chai Nat', 217),
(3532, 'Chaiyaphum', 217),
(3533, 'Changwat Chaiyaphum', 217),
(3534, 'Chanthaburi', 217),
(3535, 'Chiang Mai', 217),
(3536, 'Chiang Rai', 217),
(3537, 'Chon Buri', 217),
(3538, 'Chumphon', 217),
(3539, 'Kalasin', 217),
(3540, 'Kamphaeng Phet', 217),
(3541, 'Kanchanaburi', 217),
(3542, 'Khon Kaen', 217),
(3543, 'Krabi', 217),
(3544, 'Krung Thep', 217),
(3545, 'Lampang', 217),
(3546, 'Lamphun', 217),
(3547, 'Loei', 217),
(3548, 'Lop Buri', 217),
(3549, 'Mae Hong Son', 217),
(3550, 'Maha Sarakham', 217),
(3551, 'Mukdahan', 217),
(3552, 'Nakhon Nayok', 217),
(3553, 'Nakhon Pathom', 217),
(3554, 'Nakhon Phanom', 217),
(3555, 'Nakhon Ratchasima', 217),
(3556, 'Nakhon Sawan', 217),
(3557, 'Nakhon Si Thammarat', 217),
(3558, 'Nan', 217),
(3559, 'Narathiwat', 217),
(3560, 'Nong Bua Lam Phu', 217),
(3561, 'Nong Khai', 217),
(3562, 'Nonthaburi', 217),
(3563, 'Pathum Thani', 217),
(3564, 'Pattani', 217),
(3565, 'Phangnga', 217),
(3566, 'Phatthalung', 217),
(3567, 'Phayao', 217),
(3568, 'Phetchabun', 217),
(3569, 'Phetchaburi', 217),
(3570, 'Phichit', 217),
(3571, 'Phitsanulok', 217),
(3572, 'Phra Nakhon Si Ayutthaya', 217),
(3573, 'Phrae', 217),
(3574, 'Phuket', 217),
(3575, 'Prachin Buri', 217),
(3576, 'Prachuap Khiri Khan', 217),
(3577, 'Ranong', 217),
(3578, 'Ratchaburi', 217),
(3579, 'Rayong', 217),
(3580, 'Roi Et', 217),
(3581, 'Sa Kaeo', 217),
(3582, 'Sakon Nakhon', 217),
(3583, 'Samut Prakan', 217),
(3584, 'Samut Sakhon', 217),
(3585, 'Samut Songkhran', 217),
(3586, 'Saraburi', 217),
(3587, 'Satun', 217),
(3588, 'Si Sa Ket', 217),
(3589, 'Sing Buri', 217),
(3590, 'Songkhla', 217),
(3591, 'Sukhothai', 217),
(3592, 'Suphan Buri', 217),
(3593, 'Surat Thani', 217),
(3594, 'Surin', 217),
(3595, 'Tak', 217),
(3596, 'Trang', 217),
(3597, 'Trat', 217),
(3598, 'Ubon Ratchathani', 217),
(3599, 'Udon Thani', 217),
(3600, 'Uthai Thani', 217),
(3601, 'Uttaradit', 217),
(3602, 'Yala', 217),
(3603, 'Yasothon', 217),
(3604, 'Centre', 218),
(3605, 'Kara', 218),
(3606, 'Maritime', 218),
(3607, 'Plateaux', 218),
(3608, 'Savanes', 218),
(3609, 'Atafu', 219),
(3610, 'Fakaofo', 219),
(3611, 'Nukunonu', 219),
(3612, 'Eua', 220),
(3613, 'Ha\'apai', 220),
(3614, 'Niuas', 220),
(3615, 'Tongatapu', 220),
(3616, 'Vava\'u', 220),
(3617, 'Arima-Tunapuna-Piarco', 221),
(3618, 'Caroni', 221),
(3619, 'Chaguanas', 221),
(3620, 'Couva-Tabaquite-Talparo', 221),
(3621, 'Diego Martin', 221),
(3622, 'Glencoe', 221),
(3623, 'Penal Debe', 221),
(3624, 'Point Fortin', 221),
(3625, 'Port of Spain', 221),
(3626, 'Princes Town', 221),
(3627, 'Saint George', 221),
(3628, 'San Fernando', 221),
(3629, 'San Juan', 221),
(3630, 'Sangre Grande', 221),
(3631, 'Siparia', 221),
(3632, 'Tobago', 221),
(3633, 'Aryanah', 222),
(3634, 'Bajah', 222),
(3635, 'Bin \'Arus', 222),
(3636, 'Binzart', 222),
(3637, 'Gouvernorat de Ariana', 222),
(3638, 'Gouvernorat de Nabeul', 222),
(3639, 'Gouvernorat de Sousse', 222),
(3640, 'Hammamet Yasmine', 222),
(3641, 'Jundubah', 222),
(3642, 'Madaniyin', 222),
(3643, 'Manubah', 222),
(3644, 'Monastir', 222),
(3645, 'Nabul', 222),
(3646, 'Qabis', 222),
(3647, 'Qafsah', 222),
(3648, 'Qibili', 222),
(3649, 'Safaqis', 222),
(3650, 'Sfax', 222),
(3651, 'Sidi Bu Zayd', 222),
(3652, 'Silyanah', 222),
(3653, 'Susah', 222),
(3654, 'Tatawin', 222),
(3655, 'Tawzar', 222),
(3656, 'Tunis', 222),
(3657, 'Zaghwan', 222),
(3658, 'al-Kaf', 222),
(3659, 'al-Mahdiyah', 222),
(3660, 'al-Munastir', 222),
(3661, 'al-Qasrayn', 222),
(3662, 'al-Qayrawan', 222),
(3663, 'Adana', 223),
(3664, 'Adiyaman', 223),
(3665, 'Afyon', 223),
(3666, 'Agri', 223),
(3667, 'Aksaray', 223),
(3668, 'Amasya', 223),
(3669, 'Ankara', 223),
(3670, 'Antalya', 223),
(3671, 'Ardahan', 223),
(3672, 'Artvin', 223),
(3673, 'Aydin', 223),
(3674, 'Balikesir', 223),
(3675, 'Bartin', 223),
(3676, 'Batman', 223),
(3677, 'Bayburt', 223),
(3678, 'Bilecik', 223),
(3679, 'Bingol', 223),
(3680, 'Bitlis', 223),
(3681, 'Bolu', 223),
(3682, 'Burdur', 223),
(3683, 'Bursa', 223),
(3684, 'Canakkale', 223),
(3685, 'Cankiri', 223),
(3686, 'Corum', 223),
(3687, 'Denizli', 223),
(3688, 'Diyarbakir', 223),
(3689, 'Duzce', 223),
(3690, 'Edirne', 223),
(3691, 'Elazig', 223),
(3692, 'Erzincan', 223),
(3693, 'Erzurum', 223),
(3694, 'Eskisehir', 223),
(3695, 'Gaziantep', 223),
(3696, 'Giresun', 223),
(3697, 'Gumushane', 223),
(3698, 'Hakkari', 223),
(3699, 'Hatay', 223),
(3700, 'Icel', 223),
(3701, 'Igdir', 223),
(3702, 'Isparta', 223),
(3703, 'Istanbul', 223),
(3704, 'Izmir', 223),
(3705, 'Kahramanmaras', 223),
(3706, 'Karabuk', 223),
(3707, 'Karaman', 223),
(3708, 'Kars', 223),
(3709, 'Karsiyaka', 223),
(3710, 'Kastamonu', 223),
(3711, 'Kayseri', 223),
(3712, 'Kilis', 223),
(3713, 'Kirikkale', 223),
(3714, 'Kirklareli', 223),
(3715, 'Kirsehir', 223),
(3716, 'Kocaeli', 223),
(3717, 'Konya', 223),
(3718, 'Kutahya', 223),
(3719, 'Lefkosa', 223),
(3720, 'Malatya', 223),
(3721, 'Manisa', 223),
(3722, 'Mardin', 223),
(3723, 'Mugla', 223),
(3724, 'Mus', 223),
(3725, 'Nevsehir', 223),
(3726, 'Nigde', 223),
(3727, 'Ordu', 223),
(3728, 'Osmaniye', 223),
(3729, 'Rize', 223),
(3730, 'Sakarya', 223),
(3731, 'Samsun', 223),
(3732, 'Sanliurfa', 223),
(3733, 'Siirt', 223),
(3734, 'Sinop', 223),
(3735, 'Sirnak', 223),
(3736, 'Sivas', 223),
(3737, 'Tekirdag', 223),
(3738, 'Tokat', 223),
(3739, 'Trabzon', 223),
(3740, 'Tunceli', 223),
(3741, 'Usak', 223),
(3742, 'Van', 223),
(3743, 'Yalova', 223),
(3744, 'Yozgat', 223),
(3745, 'Zonguldak', 223),
(3746, 'Ahal', 224),
(3747, 'Asgabat', 224),
(3748, 'Balkan', 224),
(3749, 'Dasoguz', 224),
(3750, 'Lebap', 224),
(3751, 'Mari', 224),
(3752, 'Grand Turk', 225),
(3753, 'South Caicos and East Caicos', 225),
(3754, 'Funafuti', 226),
(3755, 'Nanumanga', 226),
(3756, 'Nanumea', 226),
(3757, 'Niutao', 226),
(3758, 'Nui', 226),
(3759, 'Nukufetau', 226),
(3760, 'Nukulaelae', 226),
(3761, 'Vaitupu', 226),
(3762, 'Central', 227),
(3763, 'Eastern', 227),
(3764, 'Northern', 227),
(3765, 'Western', 227),
(3766, 'Cherkas\'ka', 228),
(3767, 'Chernihivs\'ka', 228),
(3768, 'Chernivets\'ka', 228),
(3769, 'Crimea', 228),
(3770, 'Dnipropetrovska', 228),
(3771, 'Donets\'ka', 228),
(3772, 'Ivano-Frankivs\'ka', 228),
(3773, 'Kharkiv', 228),
(3774, 'Kharkov', 228),
(3775, 'Khersonska', 228),
(3776, 'Khmel\'nyts\'ka', 228),
(3777, 'Kirovohrad', 228),
(3778, 'Krym', 228),
(3779, 'Kyyiv', 228),
(3780, 'Kyyivs\'ka', 228),
(3781, 'L\'vivs\'ka', 228),
(3782, 'Luhans\'ka', 228),
(3783, 'Mykolayivs\'ka', 228),
(3784, 'Odes\'ka', 228),
(3785, 'Odessa', 228),
(3786, 'Poltavs\'ka', 228),
(3787, 'Rivnens\'ka', 228),
(3788, 'Sevastopol\'', 228),
(3789, 'Sums\'ka', 228),
(3790, 'Ternopil\'s\'ka', 228),
(3791, 'Volyns\'ka', 228),
(3792, 'Vynnyts\'ka', 228),
(3793, 'Zakarpats\'ka', 228),
(3794, 'Zaporizhia', 228),
(3795, 'Zhytomyrs\'ka', 228),
(3796, 'Abu Zabi', 229),
(3797, 'Ajman', 229),
(3798, 'Dubai', 229),
(3799, 'Ras al-Khaymah', 229),
(3800, 'Sharjah', 229),
(3801, 'Sharjha', 229),
(3802, 'Umm al Qaywayn', 229),
(3803, 'al-Fujayrah', 229),
(3804, 'ash-Shariqah', 229),
(3805, 'Aberdeen', 230),
(3806, 'Aberdeenshire', 230),
(3807, 'Argyll', 230),
(3808, 'Armagh', 230),
(3809, 'Bedfordshire', 230),
(3810, 'Belfast', 230),
(3811, 'Berkshire', 230),
(3812, 'Birmingham', 230),
(3813, 'Brechin', 230),
(3814, 'Bridgnorth', 230),
(3815, 'Bristol', 230),
(3816, 'Buckinghamshire', 230),
(3817, 'Cambridge', 230),
(3818, 'Cambridgeshire', 230),
(3819, 'Channel Islands', 230),
(3820, 'Cheshire', 230),
(3821, 'Cleveland', 230),
(3822, 'Co Fermanagh', 230),
(3823, 'Conwy', 230),
(3824, 'Cornwall', 230),
(3825, 'Coventry', 230),
(3826, 'Craven Arms', 230),
(3827, 'Cumbria', 230),
(3828, 'Denbighshire', 230),
(3829, 'Derby', 230),
(3830, 'Derbyshire', 230),
(3831, 'Devon', 230),
(3832, 'Dial Code Dungannon', 230),
(3833, 'Didcot', 230),
(3834, 'Dorset', 230),
(3835, 'Dunbartonshire', 230),
(3836, 'Durham', 230),
(3837, 'East Dunbartonshire', 230),
(3838, 'East Lothian', 230),
(3839, 'East Midlands', 230),
(3840, 'East Sussex', 230),
(3841, 'East Yorkshire', 230),
(3842, 'England', 230),
(3843, 'Essex', 230),
(3844, 'Fermanagh', 230),
(3845, 'Fife', 230),
(3846, 'Flintshire', 230),
(3847, 'Fulham', 230),
(3848, 'Gainsborough', 230),
(3849, 'Glocestershire', 230),
(3850, 'Gwent', 230),
(3851, 'Hampshire', 230),
(3852, 'Hants', 230),
(3853, 'Herefordshire', 230),
(3854, 'Hertfordshire', 230),
(3855, 'Ireland', 230),
(3856, 'Isle Of Man', 230),
(3857, 'Isle of Wight', 230),
(3858, 'Kenford', 230),
(3859, 'Kent', 230),
(3860, 'Kilmarnock', 230),
(3861, 'Lanarkshire', 230),
(3862, 'Lancashire', 230),
(3863, 'Leicestershire', 230),
(3864, 'Lincolnshire', 230),
(3865, 'Llanymynech', 230),
(3866, 'London', 230),
(3867, 'Ludlow', 230),
(3868, 'Manchester', 230),
(3869, 'Mayfair', 230),
(3870, 'Merseyside', 230),
(3871, 'Mid Glamorgan', 230),
(3872, 'Middlesex', 230),
(3873, 'Mildenhall', 230),
(3874, 'Monmouthshire', 230),
(3875, 'Newton Stewart', 230),
(3876, 'Norfolk', 230),
(3877, 'North Humberside', 230),
(3878, 'North Yorkshire', 230),
(3879, 'Northamptonshire', 230),
(3880, 'Northants', 230),
(3881, 'Northern Ireland', 230),
(3882, 'Northumberland', 230),
(3883, 'Nottinghamshire', 230),
(3884, 'Oxford', 230),
(3885, 'Powys', 230),
(3886, 'Roos-shire', 230),
(3887, 'SUSSEX', 230),
(3888, 'Sark', 230),
(3889, 'Scotland', 230),
(3890, 'Scottish Borders', 230),
(3891, 'Shropshire', 230),
(3892, 'Somerset', 230),
(3893, 'South Glamorgan', 230),
(3894, 'South Wales', 230),
(3895, 'South Yorkshire', 230),
(3896, 'Southwell', 230),
(3897, 'Staffordshire', 230),
(3898, 'Strabane', 230),
(3899, 'Suffolk', 230),
(3900, 'Surrey', 230),
(3901, 'Sussex', 230),
(3902, 'Twickenham', 230),
(3903, 'Tyne and Wear', 230),
(3904, 'Tyrone', 230),
(3905, 'Utah', 230),
(3906, 'Wales', 230),
(3907, 'Warwickshire', 230),
(3908, 'West Lothian', 230),
(3909, 'West Midlands', 230),
(3910, 'West Sussex', 230),
(3911, 'West Yorkshire', 230),
(3912, 'Whissendine', 230),
(3913, 'Wiltshire', 230),
(3914, 'Wokingham', 230),
(3915, 'Worcestershire', 230),
(3916, 'Wrexham', 230),
(3917, 'Wurttemberg', 230),
(3918, 'Yorkshire', 230),
(3919, 'Alabama', 231),
(3920, 'Alaska', 231),
(3921, 'Arizona', 231),
(3922, 'Arkansas', 231),
(3923, 'Byram', 231),
(3924, 'California', 231),
(3925, 'Cokato', 231),
(3926, 'Colorado', 231),
(3927, 'Connecticut', 231),
(3928, 'Delaware', 231),
(3929, 'District of Columbia', 231),
(3930, 'Florida', 231),
(3931, 'Georgia', 231),
(3932, 'Hawaii', 231),
(3933, 'Idaho', 231),
(3934, 'Illinois', 231),
(3935, 'Indiana', 231),
(3936, 'Iowa', 231),
(3937, 'Kansas', 231),
(3938, 'Kentucky', 231),
(3939, 'Louisiana', 231),
(3940, 'Lowa', 231),
(3941, 'Maine', 231),
(3942, 'Maryland', 231),
(3943, 'Massachusetts', 231),
(3944, 'Medfield', 231),
(3945, 'Michigan', 231),
(3946, 'Minnesota', 231),
(3947, 'Mississippi', 231),
(3948, 'Missouri', 231),
(3949, 'Montana', 231),
(3950, 'Nebraska', 231),
(3951, 'Nevada', 231),
(3952, 'New Hampshire', 231),
(3953, 'New Jersey', 231),
(3954, 'New Jersy', 231),
(3955, 'New Mexico', 231),
(3956, 'New York', 231),
(3957, 'North Carolina', 231),
(3958, 'North Dakota', 231),
(3959, 'Ohio', 231),
(3960, 'Oklahoma', 231),
(3961, 'Ontario', 231),
(3962, 'Oregon', 231),
(3963, 'Pennsylvania', 231),
(3964, 'Ramey', 231),
(3965, 'Rhode Island', 231),
(3966, 'South Carolina', 231),
(3967, 'South Dakota', 231),
(3968, 'Sublimity', 231),
(3969, 'Tennessee', 231),
(3970, 'Texas', 231),
(3971, 'Trimble', 231),
(3972, 'Utah', 231),
(3973, 'Vermont', 231),
(3974, 'Virginia', 231),
(3975, 'Washington', 231),
(3976, 'West Virginia', 231),
(3977, 'Wisconsin', 231),
(3978, 'Wyoming', 231),
(3979, 'United States Minor Outlying I', 232),
(3980, 'Artigas', 233),
(3981, 'Canelones', 233),
(3982, 'Cerro Largo', 233),
(3983, 'Colonia', 233),
(3984, 'Durazno', 233),
(3985, 'FLorida', 233),
(3986, 'Flores', 233),
(3987, 'Lavalleja', 233),
(3988, 'Maldonado', 233),
(3989, 'Montevideo', 233),
(3990, 'Paysandu', 233),
(3991, 'Rio Negro', 233),
(3992, 'Rivera', 233),
(3993, 'Rocha', 233),
(3994, 'Salto', 233),
(3995, 'San Jose', 233),
(3996, 'Soriano', 233),
(3997, 'Tacuarembo', 233),
(3998, 'Treinta y Tres', 233),
(3999, 'Andijon', 234),
(4000, 'Buhoro', 234),
(4001, 'Buxoro Viloyati', 234),
(4002, 'Cizah', 234),
(4003, 'Fargona', 234),
(4004, 'Horazm', 234),
(4005, 'Kaskadar', 234),
(4006, 'Korakalpogiston', 234),
(4007, 'Namangan', 234),
(4008, 'Navoi', 234),
(4009, 'Samarkand', 234),
(4010, 'Sirdare', 234),
(4011, 'Surhondar', 234),
(4012, 'Toskent', 234),
(4013, 'Malampa', 235),
(4014, 'Penama', 235),
(4015, 'Sanma', 235),
(4016, 'Shefa', 235),
(4017, 'Tafea', 235),
(4018, 'Torba', 235),
(4019, 'Vatican City State (Holy See)', 236),
(4020, 'Amazonas', 237),
(4021, 'Anzoategui', 237),
(4022, 'Apure', 237),
(4023, 'Aragua', 237),
(4024, 'Barinas', 237),
(4025, 'Bolivar', 237),
(4026, 'Carabobo', 237),
(4027, 'Cojedes', 237),
(4028, 'Delta Amacuro', 237),
(4029, 'Distrito Federal', 237),
(4030, 'Falcon', 237),
(4031, 'Guarico', 237),
(4032, 'Lara', 237),
(4033, 'Merida', 237),
(4034, 'Miranda', 237),
(4035, 'Monagas', 237),
(4036, 'Nueva Esparta', 237),
(4037, 'Portuguesa', 237),
(4038, 'Sucre', 237),
(4039, 'Tachira', 237),
(4040, 'Trujillo', 237),
(4041, 'Vargas', 237),
(4042, 'Yaracuy', 237),
(4043, 'Zulia', 237),
(4044, 'Bac Giang', 238),
(4045, 'Binh Dinh', 238),
(4046, 'Binh Duong', 238),
(4047, 'Da Nang', 238),
(4048, 'Dong Bang Song Cuu Long', 238),
(4049, 'Dong Bang Song Hong', 238),
(4050, 'Dong Nai', 238),
(4051, 'Dong Nam Bo', 238),
(4052, 'Duyen Hai Mien Trung', 238),
(4053, 'Hanoi', 238),
(4054, 'Hung Yen', 238),
(4055, 'Khu Bon Cu', 238),
(4056, 'Long An', 238),
(4057, 'Mien Nui Va Trung Du', 238),
(4058, 'Thai Nguyen', 238),
(4059, 'Thanh Pho Ho Chi Minh', 238),
(4060, 'Thu Do Ha Noi', 238),
(4061, 'Tinh Can Tho', 238),
(4062, 'Tinh Da Nang', 238),
(4063, 'Tinh Gia Lai', 238),
(4064, 'Anegada', 239),
(4065, 'Jost van Dyke', 239),
(4066, 'Tortola', 239),
(4067, 'Saint Croix', 240),
(4068, 'Saint John', 240),
(4069, 'Saint Thomas', 240),
(4070, 'Alo', 241),
(4071, 'Singave', 241),
(4072, 'Wallis', 241),
(4073, 'Bu Jaydur', 242),
(4074, 'Wad-adh-Dhahab', 242),
(4075, 'al-\'Ayun', 242),
(4076, 'as-Samarah', 242),
(4077, '\'Adan', 243),
(4078, 'Abyan', 243),
(4079, 'Dhamar', 243),
(4080, 'Hadramaut', 243),
(4081, 'Hajjah', 243),
(4082, 'Hudaydah', 243),
(4083, 'Ibb', 243),
(4084, 'Lahij', 243),
(4085, 'Ma\'rib', 243),
(4086, 'Madinat San\'a', 243),
(4087, 'Sa\'dah', 243),
(4088, 'Sana', 243),
(4089, 'Shabwah', 243),
(4090, 'Ta\'izz', 243),
(4091, 'al-Bayda', 243),
(4092, 'al-Hudaydah', 243),
(4093, 'al-Jawf', 243),
(4094, 'al-Mahrah', 243),
(4095, 'al-Mahwit', 243),
(4096, 'Central Serbia', 244),
(4097, 'Kosovo and Metohija', 244),
(4098, 'Montenegro', 244),
(4099, 'Republic of Serbia', 244),
(4100, 'Serbia', 244),
(4101, 'Vojvodina', 244),
(4102, 'Central', 245),
(4103, 'Copperbelt', 245),
(4104, 'Eastern', 245),
(4105, 'Luapala', 245),
(4106, 'Lusaka', 245),
(4107, 'North-Western', 245),
(4108, 'Northern', 245),
(4109, 'Southern', 245),
(4110, 'Western', 245),
(4111, 'Bulawayo', 246),
(4112, 'Harare', 246),
(4113, 'Manicaland', 246),
(4114, 'Mashonaland Central', 246),
(4115, 'Mashonaland East', 246),
(4116, 'Mashonaland West', 246),
(4117, 'Masvingo', 246),
(4118, 'Matabeleland North', 246),
(4119, 'Matabeleland South', 246),
(4120, 'Midlands', 246);

-- --------------------------------------------------------

--
-- Table structure for table `theme_faq`
--

CREATE TABLE `theme_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_theme_id` int(11) NOT NULL,
  `faq_question` text COLLATE utf8_unicode_ci NOT NULL,
  `faq_answer` text COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_homecontent`
--

CREATE TABLE `theme_homecontent` (
  `homecontent_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theme_homecontent`
--

INSERT INTO `theme_homecontent` (`homecontent_id`, `theme_id`, `title`, `description`, `image`, `position`, `status`, `created`) VALUES
(1, 0, 'Subscription', 'Pay your subscription from services to products.&nbsp;', 'PhUrvnDE1eHuAjsyCc2NWbm9ZGJKgTtd.jpg', '', '1', '2021-01-28 20:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `theme_home_sections_setting`
--

CREATE TABLE `theme_home_sections_setting` (
  `sec_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `sec_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec_position` tinyint(1) NOT NULL,
  `sec_is_enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theme_home_sections_setting`
--

INSERT INTO `theme_home_sections_setting` (`sec_id`, `theme_id`, `sec_title`, `sec_position`, `sec_is_enable`) VALUES
(1, 0, 'Membership Section', 1, 1),
(2, 0, 'Home Content', 2, 1),
(3, 0, 'Home Section', 3, 1),
(4, 0, 'Video Section', 4, 1),
(5, 0, 'Recommendation Section', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `theme_links`
--

CREATE TABLE `theme_links` (
  `tlink_id` int(11) NOT NULL,
  `tlink_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tlink_url` text COLLATE utf8_unicode_ci NOT NULL,
  `tlink_position` tinyint(4) NOT NULL,
  `tlink_status` tinyint(1) NOT NULL DEFAULT 1,
  `tlink_target_blank` tinyint(1) NOT NULL DEFAULT 1,
  `tlink_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_pages`
--

CREATE TABLE `theme_pages` (
  `page_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_banner_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_banner_sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link_footer_section` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_recommendation`
--

CREATE TABLE `theme_recommendation` (
  `recommendation_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_sections`
--

CREATE TABLE `theme_sections` (
  `section_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `button_text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE `theme_settings` (
  `settings_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `top_banner_slider` text COLLATE utf8_unicode_ci NOT NULL,
  `membership_top_title` text COLLATE utf8_unicode_ci NOT NULL,
  `membership_sub_title` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_t_title` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_slug_title` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_sec_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact_sec_subtitle` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_full_address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_iframe` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_banner_image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `youtube_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `instegram_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp_default_msg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `footer_about_title` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_about_text` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_menu_title_a` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_menu_title_b` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_menu_title_c` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_menu_title_d` text COLLATE utf8_unicode_ci NOT NULL,
  `banner_bottom_title` text COLLATE utf8_unicode_ci NOT NULL,
  `banner_bottom_slug` text COLLATE utf8_unicode_ci NOT NULL,
  `banner_button_text` text COLLATE utf8_unicode_ci NOT NULL,
  `banner_button_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `video_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `video_sub_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `login_img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reg_img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `terms_img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `login_content` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_content` text COLLATE utf8_unicode_ci NOT NULL,
  `terms_content` text COLLATE utf8_unicode_ci NOT NULL,
  `home_section_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `home_section_subtitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `recommendation_section_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `recommendation_section_subtitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `faq_banner_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `faq_section_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `faq_section_subtitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `faq_banner_image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `homepage_video_section_bg` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_sliders`
--

CREATE TABLE `theme_sliders` (
  `slider_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `button_text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theme_sliders`
--

INSERT INTO `theme_sliders` (`slider_id`, `theme_id`, `title`, `description`, `image`, `link`, `button_text`, `status`, `created`) VALUES
(1, 1, 'APP3STAR Products/services ', 'Pay Subscriptions. Buy Goods. Sell Goods', '', 'www.app3star.com', 'explore and get', '1', '2021-01-28 20:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `theme_videos`
--

CREATE TABLE `theme_videos` (
  `video_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `video_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `video_sub_title` text COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `refid` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'user',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `twaddress` text DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `ucity` varchar(50) DEFAULT NULL,
  `ucountry` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `uzip` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `online` varchar(255) DEFAULT '1',
  `unique_url` text DEFAULT NULL,
  `bitly_unique_url` text DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `umode` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(40) DEFAULT NULL,
  `Addressone` text DEFAULT NULL,
  `Addresstwo` text DEFAULT NULL,
  `City` varchar(40) DEFAULT NULL,
  `Country` varchar(40) DEFAULT NULL,
  `StateProvince` varchar(40) DEFAULT NULL,
  `Zip` varchar(50) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `public_profile` varchar(10) DEFAULT NULL,
  `f_link` varchar(255) DEFAULT NULL,
  `t_link` varchar(255) DEFAULT NULL,
  `l_link` varchar(255) DEFAULT NULL,
  `product_commission` double(22,0) DEFAULT 0,
  `affiliate_commission` double(22,0) DEFAULT 0,
  `product_commission_paid` double(22,0) DEFAULT 0,
  `affiliate_commission_paid` double(22,0) DEFAULT 0,
  `product_total_click` int(11) DEFAULT NULL,
  `product_total_sale` int(11) DEFAULT NULL,
  `affiliate_total_click` int(11) DEFAULT NULL,
  `sale_commission` double(22,0) DEFAULT 0,
  `sale_commission_paid` double(22,0) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `status_reason` varchar(25) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `last_ping` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_vendor` tinyint(1) NOT NULL,
  `install_location_details` text DEFAULT NULL,
  `plan_id` int(11) NOT NULL DEFAULT -1,
  `products_wishlist` text DEFAULT NULL,
  `reg_approved` tinyint(1) NOT NULL DEFAULT 1,
  `access_level_id` int(11) DEFAULT NULL,
  `dob` varchar(90) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `identifications` varchar(255) DEFAULT NULL,
  `NIC` varchar(255) DEFAULT NULL,
  `total_experience` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `refid`, `type`, `firstname`, `lastname`, `email`, `username`, `password`, `phone`, `twaddress`, `address1`, `address2`, `ucity`, `ucountry`, `state`, `uzip`, `avatar`, `online`, `unique_url`, `bitly_unique_url`, `google_id`, `facebook_id`, `twitter_id`, `umode`, `PhoneNumber`, `Addressone`, `Addresstwo`, `City`, `Country`, `StateProvince`, `Zip`, `birthday`, `gender`, `public_profile`, `f_link`, `t_link`, `l_link`, `product_commission`, `affiliate_commission`, `product_commission_paid`, `affiliate_commission_paid`, `product_total_click`, `product_total_sale`, `affiliate_total_click`, `sale_commission`, `sale_commission_paid`, `status`, `status_reason`, `value`, `last_ping`, `created_at`, `updated_at`, `is_vendor`, `install_location_details`, `plan_id`, `products_wishlist`, `reg_approved`, `access_level_id`, `dob`, `business_name`, `business_type`, `identifications`, `NIC`, `total_experience`, `education`, `skills`) VALUES
(1, 0, 'admin', 'App3star', 'Dashboard', 'figtec@app3star.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '', '', '', '1OCaeSc7oznKDwIZsQFMqbNgXGiPV4xW.jpg', '1', '', '', '', '', '', '', '07066407870', '', '', 'Lagos', '160', NULL, '343411', NULL, NULL, NULL, '', '', '', 0, 21, 0, 0, 0, 0, 28, 0, 0, 1, NULL, '', '2021-08-23 08:14:50', '2018-11-22 14:52:36', '2021-08-23 08:14:50', 0, '', -1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'designer', 'designer', 'axa', 'debade@yahoo.com', 'designer', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '160', '1', '', '', '1', '', '', '', '', '', '', '', '', '', '', '160', '', '', NULL, NULL, NULL, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, '{\"is_vendor\":\"1\",\"custom_text-1544017445927\":\"+234816 238 5564\",\"refid\":\"0\",\"country_id\":\"160\"}', '2021-03-14 09:20:47', '2020-02-23 13:02:22', '2021-07-23 00:08:59', 1, '', -1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 10, 'model', 'Angela', 'Edeme', 'model@gmail.com', 'angela', 'c2a620da7f6cee7b0e312c096bc287d23d672f15', '', '', '', '', '', '160', '0', '', '', '1', '', '', '', '', '', '', '', '349', 'janak vihar', 'jaipur', '160', 'Rajasthan', '302012', NULL, NULL, NULL, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'dfgfg', '{\"custom_text-1544017445927\":\"+23408064858511\",\"refid\":\"10\",\"country_id\":\"160\"}', '2020-05-27 23:16:30', '2020-05-27 23:14:05', '2021-08-09 11:41:04', 0, '', -1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 10, 'tailor', 'Angela', 'Edeme', 'tailor@gmail.com', 'angela', 'c2a620da7f6cee7b0e312c096bc287d23d672f15', '', '', '', '', '', '160', '0', '', '', '1', '', '', '', '', '', '', '', '349', 'janak vihar', 'jaipur', '160', 'Rajasthan', '302012', NULL, NULL, NULL, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'gfdgh', '{\"custom_text-1544017445927\":\"+23408064858511\",\"refid\":\"10\",\"country_id\":\"160\"}', '2020-05-27 23:16:30', '2020-05-27 23:14:05', '2020-05-27 23:14:05', 0, '', -1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `int_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `like_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_request`
--

CREATE TABLE `user_payment_request` (
  `user_payment_request_id` int(11) NOT NULL,
  `user_payment_request_user_id` int(11) DEFAULT NULL,
  `user_payment_request_amount` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_amount_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_amount_status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_payment_mode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_ipaddress` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_created_date` datetime DEFAULT NULL,
  `user_payment_request_updated_date` datetime DEFAULT NULL,
  `user_payment_request_user_agent` text CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_os` text CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_browser` text CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_isp` text CHARACTER SET utf8 DEFAULT NULL,
  `user_payment_request_created_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_payment_request_updated_by` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `rating_number` int(11) NOT NULL,
  `rating_comments` text CHARACTER SET utf8 DEFAULT NULL,
  `rating_ipaddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`id`, `from_user_id`, `to_user_id`, `rating_number`, `rating_comments`, `rating_ipaddress`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 47, 4, 'fsf', NULL, NULL, NULL, '2021-03-10 09:13:35', NULL),
(2, 2, 47, 2, 'fsf', NULL, NULL, NULL, '2021-03-10 09:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_setting`
--

CREATE TABLE `vendor_setting` (
  `user_id` int(11) NOT NULL,
  `vendor_status` int(11) NOT NULL DEFAULT 0,
  `affiliate_sale_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `affiliate_commission_value` double(22,0) DEFAULT 0,
  `affiliate_click_count` int(11) DEFAULT NULL,
  `affiliate_click_amount` double(22,0) DEFAULT 0,
  `form_affiliate_click_count` int(11) DEFAULT NULL,
  `form_affiliate_click_amount` double(22,0) DEFAULT 0,
  `form_affiliate_sale_commission_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `form_affiliate_commission_value` double(22,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `version_update`
--

CREATE TABLE `version_update` (
  `update_id` int(11) NOT NULL,
  `code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `comment` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dis_type` varchar(25) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `reference_id` int(11) NOT NULL,
  `reference_id_2` varchar(255) DEFAULT NULL,
  `ip_details` text DEFAULT NULL,
  `comm_from` varchar(20) NOT NULL DEFAULT 'store',
  `domain_name` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `is_action` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `from_user_id` int(11) DEFAULT NULL,
  `group_id` double(22,0) DEFAULT 0,
  `is_vendor` int(11) NOT NULL DEFAULT 0,
  `wv` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `amount`, `comment`, `type`, `dis_type`, `status`, `reference_id`, `reference_id_2`, `ip_details`, `comm_from`, `domain_name`, `page_name`, `is_action`, `parent_id`, `created_at`, `from_user_id`, `group_id`, `is_vendor`, `wv`) VALUES
(1, 5, 0.03333, 'Commission for order Id order_id=18 | Order By : excellentdaily excellentdaily <br> Sale done from ip_message', 'sale_commission', NULL, 1, 18, NULL, '[{\"ip\":\"129.205.113.200\",\"country_code\":\"NG\"}]', 'store', NULL, NULL, 0, 0, '2020-08-28 16:18:34', NULL, NULL, 0, NULL),
(2, 5, 73.3, 'Commission Earn for sms purchase', 'admin_transaction', '', 1, 0, '0', '', '', '', NULL, 0, 0, '2020-08-29 10:26:08', NULL, NULL, 0, NULL),
(4, 5, 433.29, 'Commission for order Id order_id=24 | Order By : ExcellentPas MPCS <br> Sale done from ip_message', 'sale_commission', NULL, 1, 24, NULL, '[{\"ip\":\"105.112.101.9\",\"country_code\":\"NG\"}]', 'store', NULL, NULL, 0, 0, '2020-09-10 18:20:44', NULL, NULL, 0, NULL),
(5, 3, 33.33, 'Commission for order Id order_id=29 | Order By : test test2 <br> Sale done from ip_message', 'sale_commission', NULL, 1, 29, NULL, '[{\"ip\":\"105.112.115.254\",\"country_code\":\"NG\"}]', 'store', NULL, NULL, 0, 0, '2020-09-28 22:01:07', NULL, NULL, 0, NULL),
(6, 11, 1500, 'Commission for order Id order_id=40 | Order By : Ezekiel Olowu <br> Sale done from ip_message', 'sale_commission', NULL, 0, 40, NULL, '[{\"ip\":\"105.112.102.176\",\"country_code\":\"NG\"}]', 'store', NULL, NULL, 0, 0, '2021-02-08 09:24:54', NULL, 1612772694, 0, NULL),
(7, 37, 1500, 'Commission for order Id order_id=41 | Order By : Redwood Redwood <br> Sale done from ip_message', 'sale_commission', NULL, 0, 41, NULL, '[{\"ip\":\"154.118.8.2\",\"country_code\":\"NG\"}]', 'store', NULL, NULL, 0, 0, '2021-02-08 09:37:59', NULL, 1612773479, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recursion`
--

CREATE TABLE `wallet_recursion` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `custom_time` bigint(20) DEFAULT NULL,
  `next_transaction` datetime NOT NULL,
  `last_transaction` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_request`
--

CREATE TABLE `wallet_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_requests`
--

CREATE TABLE `wallet_requests` (
  `id` int(11) NOT NULL,
  `tran_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prefer_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_requests_history`
--

CREATE TABLE `wallet_requests_history` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_levels`
--
ALTER TABLE `access_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliateads`
--
ALTER TABLE `affiliateads`
  ADD PRIMARY KEY (`affiliateads_id`);

--
-- Indexes for table `affiliate_action`
--
ALTER TABLE `affiliate_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clicks_views`
--
ALTER TABLE `clicks_views`
  ADD PRIMARY KEY (`clicks_views_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `form_action`
--
ALTER TABLE `form_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `form_coupon`
--
ALTER TABLE `form_coupon`
  ADD PRIMARY KEY (`form_coupon_id`);

--
-- Indexes for table `integration_admin_clicks_action`
--
ALTER TABLE `integration_admin_clicks_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_category`
--
ALTER TABLE `integration_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_clicks_action`
--
ALTER TABLE `integration_clicks_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_clicks_logs`
--
ALTER TABLE `integration_clicks_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_orders`
--
ALTER TABLE `integration_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_programs`
--
ALTER TABLE `integration_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_refer_product_action`
--
ALTER TABLE `integration_refer_product_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_tools`
--
ALTER TABLE `integration_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_tools_ads`
--
ALTER TABLE `integration_tools_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_categories`
--
ALTER TABLE `interest_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_seen`
--
ALTER TABLE `last_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_buy_history`
--
ALTER TABLE `membership_buy_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_user`
--
ALTER TABLE `membership_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_proof`
--
ALTER TABLE `order_proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagebuilder_theme`
--
ALTER TABLE `pagebuilder_theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `pagebuilder_theme_page`
--
ALTER TABLE `pagebuilder_theme_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `paypal_accounts`
--
ALTER TABLE `paypal_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `productslog`
--
ALTER TABLE `productslog`
  ADD PRIMARY KEY (`productslog_id`);

--
-- Indexes for table `product_action`
--
ALTER TABLE `product_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `product_action_admin`
--
ALTER TABLE `product_action_admin`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `product_affiliate`
--
ALTER TABLE `product_affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media_upload`
--
ALTER TABLE `product_media_upload`
  ADD PRIMARY KEY (`product_media_upload_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `refer_market_action`
--
ALTER TABLE `refer_market_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_product_action`
--
ALTER TABLE `refer_product_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_faq`
--
ALTER TABLE `theme_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `theme_homecontent`
--
ALTER TABLE `theme_homecontent`
  ADD PRIMARY KEY (`homecontent_id`);

--
-- Indexes for table `theme_home_sections_setting`
--
ALTER TABLE `theme_home_sections_setting`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `theme_links`
--
ALTER TABLE `theme_links`
  ADD PRIMARY KEY (`tlink_id`);

--
-- Indexes for table `theme_pages`
--
ALTER TABLE `theme_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `theme_recommendation`
--
ALTER TABLE `theme_recommendation`
  ADD PRIMARY KEY (`recommendation_id`);

--
-- Indexes for table `theme_sections`
--
ALTER TABLE `theme_sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `theme_sliders`
--
ALTER TABLE `theme_sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `theme_videos`
--
ALTER TABLE `theme_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`int_id`);

--
-- Indexes for table `user_payment_request`
--
ALTER TABLE `user_payment_request`
  ADD PRIMARY KEY (`user_payment_request_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_setting`
--
ALTER TABLE `vendor_setting`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `version_update`
--
ALTER TABLE `version_update`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_recursion`
--
ALTER TABLE `wallet_recursion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_request`
--
ALTER TABLE `wallet_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_requests`
--
ALTER TABLE `wallet_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_requests_history`
--
ALTER TABLE `wallet_requests_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_levels`
--
ALTER TABLE `access_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `affiliateads`
--
ALTER TABLE `affiliateads`
  MODIFY `affiliateads_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `affiliate_action`
--
ALTER TABLE `affiliate_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clicks_views`
--
ALTER TABLE `clicks_views`
  MODIFY `clicks_views_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_action`
--
ALTER TABLE `form_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_coupon`
--
ALTER TABLE `form_coupon`
  MODIFY `form_coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_admin_clicks_action`
--
ALTER TABLE `integration_admin_clicks_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_category`
--
ALTER TABLE `integration_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `integration_clicks_action`
--
ALTER TABLE `integration_clicks_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_clicks_logs`
--
ALTER TABLE `integration_clicks_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `integration_orders`
--
ALTER TABLE `integration_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_programs`
--
ALTER TABLE `integration_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `integration_refer_product_action`
--
ALTER TABLE `integration_refer_product_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_tools`
--
ALTER TABLE `integration_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integration_tools_ads`
--
ALTER TABLE `integration_tools_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interest_categories`
--
ALTER TABLE `interest_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `last_seen`
--
ALTER TABLE `last_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `membership_buy_history`
--
ALTER TABLE `membership_buy_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership_plans`
--
ALTER TABLE `membership_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership_user`
--
ALTER TABLE `membership_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_history`
--
ALTER TABLE `orders_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_proof`
--
ALTER TABLE `order_proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagebuilder_theme`
--
ALTER TABLE `pagebuilder_theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagebuilder_theme_page`
--
ALTER TABLE `pagebuilder_theme_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paypal_accounts`
--
ALTER TABLE `paypal_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productslog`
--
ALTER TABLE `productslog`
  MODIFY `productslog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_action`
--
ALTER TABLE `product_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_action_admin`
--
ALTER TABLE `product_action_admin`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_affiliate`
--
ALTER TABLE `product_affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_media_upload`
--
ALTER TABLE `product_media_upload`
  MODIFY `product_media_upload_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refer_market_action`
--
ALTER TABLE `refer_market_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refer_product_action`
--
ALTER TABLE `refer_product_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4121;

--
-- AUTO_INCREMENT for table `theme_faq`
--
ALTER TABLE `theme_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_homecontent`
--
ALTER TABLE `theme_homecontent`
  MODIFY `homecontent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme_home_sections_setting`
--
ALTER TABLE `theme_home_sections_setting`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theme_links`
--
ALTER TABLE `theme_links`
  MODIFY `tlink_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_pages`
--
ALTER TABLE `theme_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_recommendation`
--
ALTER TABLE `theme_recommendation`
  MODIFY `recommendation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_sections`
--
ALTER TABLE `theme_sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_settings`
--
ALTER TABLE `theme_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_sliders`
--
ALTER TABLE `theme_sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme_videos`
--
ALTER TABLE `theme_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_payment_request`
--
ALTER TABLE `user_payment_request`
  MODIFY `user_payment_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `version_update`
--
ALTER TABLE `version_update`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet_recursion`
--
ALTER TABLE `wallet_recursion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_request`
--
ALTER TABLE `wallet_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_requests`
--
ALTER TABLE `wallet_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_requests_history`
--
ALTER TABLE `wallet_requests_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
