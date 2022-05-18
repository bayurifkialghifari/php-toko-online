-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 05:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_setting`
--

CREATE TABLE `banner_setting` (
  `bann_id` int(11) NOT NULL,
  `bann_menu_id` int(11) NOT NULL,
  `bann_name` varchar(50) NOT NULL,
  `bann_image` varchar(100) NOT NULL,
  `bann_description` text NOT NULL,
  `bann_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_setting`
--

INSERT INTO `banner_setting` (`bann_id`, `bann_menu_id`, `bann_name`, `bann_image`, `bann_description`, `bann_status`, `created_at`, `updated_at`) VALUES
(1, 26, 'Home', '1609076865bg-01.jpg', 'Home page', 0, '2020-12-27 13:47:45', '2020-12-27 13:47:45'),
(2, 47, 'Products', '1609918242bg-01.jpg', 'Product Page Banner', 1, '2021-01-06 07:30:42', '2021-01-07 02:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `bolg_user_id` int(11) NOT NULL,
  `blog_cate_id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_thumbnal` varchar(100) NOT NULL,
  `blog_view` int(11) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_status` tinyint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `bolg_user_id`, `blog_cate_id`, `blog_title`, `blog_thumbnal`, `blog_view`, `blog_content`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'GGWP', '16107865091609918242bg-01.jpg', 13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-01-20 03:27:26', '2021-01-16 08:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_total_price` int(11) NOT NULL,
  `cart_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_total_price`, `cart_status`, `created_at`, `updated_at`) VALUES
(4, 7, 3000000, 0, '2021-01-07 03:07:18', '2021-01-08 14:28:23'),
(5, 7, 1000000, 0, '2021-01-10 03:51:48', '2021-01-16 05:35:38'),
(6, 7, 0, 1, '2021-01-17 06:23:00', '2021-01-17 06:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `card_id` int(11) NOT NULL,
  `card_cart_id` int(11) NOT NULL,
  `card_prod_id` int(11) NOT NULL,
  `cart_size_id` int(11) NOT NULL,
  `cart_color_id` int(11) NOT NULL,
  `card_price` int(11) NOT NULL,
  `card_qty` int(11) NOT NULL,
  `card_total_price` int(11) NOT NULL,
  `card_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`card_id`, `card_cart_id`, `card_prod_id`, `cart_size_id`, `cart_color_id`, `card_price`, `card_qty`, `card_total_price`, `card_status`, `created_at`, `updated_at`) VALUES
(26, 4, 1, 3, 1, 1000000, 2, 2000000, 1, '2021-01-07 09:04:55', '2021-01-08 11:34:39'),
(27, 4, 1, 4, 1, 1000000, 1, 1000000, 1, '2021-01-07 09:04:58', '2021-01-07 11:34:54'),
(28, 5, 1, 1, 1, 1000000, 1, 1000000, 1, '2021-01-16 05:35:16', '2021-01-16 05:35:16'),
(29, 6, 1, 1, 1, 1000000, 1, 1000000, 1, '2021-01-17 06:23:00', '2021-01-17 06:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `cate_parent` int(11) NOT NULL,
  `cate_url` varchar(100) NOT NULL,
  `cate_keywords` varchar(100) NOT NULL,
  `cate_banner` varchar(100) NOT NULL,
  `cate_description` text NOT NULL,
  `cate_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_parent`, `cate_url`, `cate_keywords`, `cate_banner`, `cate_description`, `cate_status`, `created_at`, `updated_at`) VALUES
(2, 'Clothes', 0, 'clothes-colection', 'Men,Women,Clothes,Colection,Wear,Bags,Accesories', '', '-', 1, '2020-12-28 07:31:42', '2020-12-28 07:31:42'),
(4, 'Hat', 0, 'hat-colection', 'Men,Women,Clothes,Colection,Wear,Bags,Accesories', '', '-', 1, '2020-12-28 07:36:10', '2020-12-28 07:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `check_id` int(11) NOT NULL,
  `check_code` varchar(20) NOT NULL,
  `check_user_id` int(11) NOT NULL,
  `check_cart_id` int(11) NOT NULL,
  `check_total` int(11) NOT NULL,
  `check_description` text NOT NULL,
  `check_status_value` varchar(50) NOT NULL,
  `check_status_code` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`check_id`, `check_code`, `check_user_id`, `check_cart_id`, `check_total`, `check_description`, `check_status_value`, `check_status_code`, `created_at`, `updated_at`) VALUES
(5, '16101917473837', 7, 4, 3007000, '-', 'SETTLEMENT', 1, '2021-01-08 14:28:23', '2021-01-16 06:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_payment`
--

CREATE TABLE `checkout_payment` (
  `checp_id` int(11) NOT NULL,
  `checp_check_code` varchar(20) NOT NULL,
  `checp_type` varchar(20) NOT NULL,
  `checp_file` varchar(250) NOT NULL,
  `checp_account_number` varchar(20) NOT NULL,
  `checp_transaction_id` varchar(50) NOT NULL,
  `checp_order_id` varchar(15) NOT NULL,
  `checp_gross_amount` int(11) NOT NULL,
  `checp_payment_type` varchar(20) NOT NULL,
  `checp_transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checp_bank` varchar(20) NOT NULL,
  `checp_payment_code` varchar(20) NOT NULL,
  `checp_va_number` varchar(20) NOT NULL,
  `checp_fraud_status` varchar(20) NOT NULL,
  `checp_pdf_url` text NOT NULL,
  `checp_status_value` varchar(50) NOT NULL,
  `checp_status_code` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_payment`
--

INSERT INTO `checkout_payment` (`checp_id`, `checp_check_code`, `checp_type`, `checp_file`, `checp_account_number`, `checp_transaction_id`, `checp_order_id`, `checp_gross_amount`, `checp_payment_type`, `checp_transaction_time`, `checp_bank`, `checp_payment_code`, `checp_va_number`, `checp_fraud_status`, `checp_pdf_url`, `checp_status_value`, `checp_status_code`, `created_at`, `updated_at`) VALUES
(1, '16101917473837', 'manual', '16103529934.png', '080123123', '', '', 3007000, 'bank', '2021-01-11 07:43:20', 'bni', '', '', 'accept', '', 'SETTLEMENT', 1, '2021-01-11 07:43:20', '2021-01-16 06:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_shipping`
--

CREATE TABLE `checkout_shipping` (
  `checs_id` int(11) NOT NULL,
  `checs_check_id` int(11) NOT NULL,
  `checs_aggent` varchar(50) NOT NULL,
  `checs_service_name` varchar(50) NOT NULL,
  `checs_service_description` text NOT NULL,
  `checs_cost` int(11) NOT NULL,
  `checs_etd` varchar(15) NOT NULL,
  `checs_from_province` varchar(50) NOT NULL,
  `checs_to_province` varchar(50) NOT NULL,
  `checs_from_city` varchar(50) NOT NULL,
  `checs_to_city` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_shipping`
--

INSERT INTO `checkout_shipping` (`checs_id`, `checs_check_id`, `checs_aggent`, `checs_service_name`, `checs_service_description`, `checs_cost`, `checs_etd`, `checs_from_province`, `checs_to_province`, `checs_from_city`, `checs_to_city`, `created_at`, `updated_at`) VALUES
(3, 5, 'POS Indonesia (POS)', 'Paket Kilat Khusus', 'Paket Kilat Khusus', 7000, '2-3 HARI', 'Jawa Barat', 'Jawa Barat', 'Cimahi', 'Bandung Barat', '2021-01-08 14:28:23', '2021-01-08 14:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `color_description` text NOT NULL,
  `color_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `color_code`, `color_description`, `color_status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'cc0000', '-', 1, '2020-12-28 09:10:25', '2020-12-28 09:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `discount_list`
--

CREATE TABLE `discount_list` (
  `disl_id` int(11) NOT NULL,
  `disl_dist_id` int(11) NOT NULL,
  `disl_name` varchar(50) NOT NULL,
  `disl_discount` int(11) NOT NULL,
  `disl_description` text NOT NULL,
  `disl_from` date NOT NULL,
  `disl_to` date NOT NULL,
  `disl_limit` int(11) NOT NULL,
  `disl_uses` int(11) NOT NULL,
  `disl_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

CREATE TABLE `discount_product` (
  `disp_id` int(11) NOT NULL,
  `disp_prod_id` int(11) NOT NULL,
  `disp_disl_id` int(11) NOT NULL,
  `disp_description` text NOT NULL,
  `disp_limit` int(11) NOT NULL,
  `disp_uses` int(11) NOT NULL,
  `disp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_theme`
--

CREATE TABLE `discount_theme` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(50) NOT NULL,
  `dist_description` text NOT NULL,
  `dist_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_theme`
--

INSERT INTO `discount_theme` (`dist_id`, `dist_name`, `dist_description`, `dist_status`, `created_at`, `updated_at`) VALUES
(2, 'Natal', '-', 1, '2020-12-28 11:22:25', '2020-12-28 11:22:25'),
(3, 'Ramadhan', '-', 1, '2020-12-28 11:22:32', '2020-12-28 11:22:32'),
(4, 'New Year', '-', 1, '2020-12-28 11:22:38', '2020-12-28 11:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `footer_setting`
--

CREATE TABLE `footer_setting` (
  `foo_id` int(11) NOT NULL,
  `foo_foo_id` int(11) NOT NULL,
  `foo_name` varchar(50) NOT NULL,
  `foo_value` text NOT NULL,
  `foo_description` text NOT NULL,
  `foo_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_setting`
--

CREATE TABLE `header_setting` (
  `head_id` int(11) NOT NULL,
  `head_name` varchar(50) NOT NULL,
  `head_value` text NOT NULL,
  `head_description` text NOT NULL,
  `head_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lev_id` int(11) NOT NULL,
  `lev_name` varchar(50) NOT NULL,
  `lev_description` text NOT NULL,
  `lev_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lev_id`, `lev_name`, `lev_description`, `lev_status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '-', 1, '2020-12-25 10:08:01', '2020-12-25 10:08:01'),
(2, 'Customer', '-', 1, '2020-12-25 14:04:55', '2020-12-25 14:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_description` text NOT NULL,
  `menu_index` int(11) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_views` int(11) NOT NULL,
  `menu_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_menu_id`, `menu_name`, `menu_description`, `menu_index`, `menu_icon`, `menu_url`, `menu_views`, `menu_status`, `created_at`, `updated_at`) VALUES
(10, 0, 'Dashboard', '-', 1, 'fa fa-suitcase', 'admin/dashboard', 0, 1, '2020-12-25 15:01:15', '2020-12-25 15:01:15'),
(15, 0, 'Setting', '-', 10, 'fa fa-cogs', '#', 0, 1, '2020-12-25 15:03:47', '2020-12-25 15:03:47'),
(16, 15, 'Level', '-', 1, 'fa fa-caret-right', 'admin/setting/level', 0, 1, '2020-12-25 15:04:45', '2020-12-25 15:04:45'),
(17, 15, 'Menu', '-', 2, 'fa fa-caret-right', 'admin/setting/menu', 0, 1, '2020-12-25 15:05:34', '2020-12-25 15:05:34'),
(18, 15, 'Role Menu', '-', 3, 'fa fa-caret-right', 'admin/setting/role-menu', 0, 1, '2020-12-25 15:05:53', '2020-12-25 15:05:53'),
(19, 0, 'Website', '-', 6, 'fa fa-comments-o', '#', 0, 1, '2020-12-25 15:07:50', '2020-12-25 15:07:50'),
(22, 19, 'Configuration', '-', 1, 'fa fa-caret-right', 'admin/website-setting', 0, 1, '2020-12-26 11:17:42', '2020-12-26 11:17:42'),
(23, 19, 'Banner', '-', 3, 'fa fa-caret-right', 'admin/website-banner', 0, 1, '2020-12-26 11:18:12', '2020-12-26 11:18:12'),
(24, 19, 'Header', '-', 6, 'fa fa-caret-right', 'admin/website-header', 0, 1, '2020-12-26 11:18:36', '2021-01-16 10:51:49'),
(25, 19, 'Footer', '-', 7, 'fa fa-caret-right', 'admin/website-footer', 0, 1, '2020-12-26 11:19:07', '2021-01-16 10:51:57'),
(26, 0, 'Home', '-', 1, 'fa fa-home', 'user/home', 0, 1, '2020-12-26 15:30:06', '2020-12-26 15:30:06'),
(27, 19, 'Slider', '-', 2, 'fa fa-caret-right', 'admin/website-slider', 0, 1, '2020-12-26 16:09:32', '2020-12-26 16:09:32'),
(28, 0, 'Catalog', '-', 2, 'fa fa-tag', '#', 0, 1, '2020-12-27 14:22:00', '2020-12-27 14:22:00'),
(29, 28, 'Categories', '-', 1, 'fa fa-caret-right', 'admin/catalog-category', 0, 1, '2020-12-27 14:22:33', '2020-12-27 14:22:33'),
(30, 28, 'Products', '-', 2, 'fa fa-caret-right', 'admin/catalog-product', 0, 1, '2020-12-27 14:23:36', '2020-12-27 14:23:36'),
(31, 28, 'Colors', '-', 3, 'fa fa-caret-right', 'admin/catalog-color', 0, 1, '2020-12-27 14:25:21', '2020-12-27 14:25:21'),
(32, 28, 'Sizes', '-', 4, 'fa fa-caret-right', 'admin/catalog-size', 0, 1, '2020-12-27 14:25:43', '2020-12-27 14:25:43'),
(33, 28, 'Reviews', '-', 6, 'fa fa-caret-right', 'admin/catalog-reviews', 0, 1, '2020-12-27 14:27:18', '2020-12-27 14:27:18'),
(34, 0, 'Information', '-', 5, 'fa fa-info-circle', '#', 0, 1, '2020-12-27 14:30:22', '2020-12-27 14:30:22'),
(35, 34, 'FAQ', '-', 1, 'fa fa-caret-right', 'admin/information-faq', 0, 1, '2020-12-27 14:30:47', '2020-12-27 14:30:47'),
(36, 34, 'Terms & Conditions', '-', 2, 'fa fa-caret-right', 'admin/information-terms-condition', 0, 1, '2020-12-27 14:31:13', '2020-12-27 14:31:13'),
(37, 0, 'Sales', '-', 4, 'fa fa-shopping-cart', '#', 0, 1, '2020-12-27 14:34:47', '2020-12-27 14:34:47'),
(38, 37, 'Payment Method', '-', 1, 'fa fa-caret-right', 'admin/sales-payment-method', 0, 1, '2020-12-27 14:35:34', '2020-12-27 14:35:34'),
(39, 37, 'Orders', '-', 2, 'fa fa-caret-right', 'admin/sales-order-list', 0, 1, '2020-12-27 14:35:54', '2020-12-27 14:35:54'),
(40, 37, 'Payments', '-', 3, 'fa fa-caret-right', 'admin/sales-payment-list', 0, 1, '2020-12-27 14:37:14', '2020-12-27 14:37:14'),
(41, 37, 'Voucher', '-', 4, 'fa fa-caret-right', 'admin/sales-voucher', 0, 1, '2020-12-27 14:37:38', '2020-12-27 14:37:38'),
(42, 0, 'Discount', '-', 3, 'fa fa-percent', '#', 0, 1, '2020-12-27 14:40:59', '2020-12-27 14:40:59'),
(43, 42, 'Dsicount Theme', '-', 1, 'fa fa-caret-right', 'admin/discount-theme', 0, 1, '2020-12-27 14:41:36', '2020-12-27 14:41:36'),
(44, 42, 'Discount List', '-', 2, 'fa fa-caret-right', 'admin/discount-list', 0, 1, '2020-12-27 14:41:54', '2020-12-27 14:41:54'),
(45, 42, 'Discount Product', '-', 3, 'fa fa-caret-right', 'admin/discount-product', 0, 1, '2020-12-27 14:42:19', '2020-12-27 14:42:19'),
(46, 28, 'Tags', '-', 5, 'fa fa-caret-right', 'admin/catalog-tags', 0, 1, '2020-12-28 07:37:24', '2020-12-28 07:37:24'),
(47, 0, 'Products', '-', 2, 'fa fa-product-hunt', 'user/product-list', 0, 1, '2021-01-06 07:28:38', '2021-01-06 07:28:38'),
(48, 19, 'Blog', '-', 4, 'fa fa-caret-right', 'admin/website-blog', 0, 1, '2021-01-16 08:27:33', '2021-01-16 08:27:57'),
(49, 0, 'Blog', '-', 3, 'fa fa-caret-right', 'user/blog', 0, 1, '2021-01-16 08:42:31', '2021-01-16 08:42:31'),
(50, 19, 'Testimonials', '-', 5, 'fa fa-caret-right', 'admin/website-testimonials', 0, 1, '2021-01-16 10:51:34', '2021-01-16 10:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `paynt_id` int(11) NOT NULL,
  `paynt_name` varchar(50) NOT NULL,
  `paynt_description` text NOT NULL,
  `paynt_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`paynt_id`, `paynt_name`, `paynt_description`, `paynt_status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', '-', 1, '2021-01-16 05:38:46', '2021-01-16 05:34:03'),
(2, 'Midtrans', '-', 1, '2021-01-16 05:34:18', '2021-01-16 05:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_cate_id` int(11) NOT NULL,
  `prod_merc_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_keyword` varchar(100) NOT NULL,
  `prod_url` varchar(100) NOT NULL,
  `prod_image` text NOT NULL,
  `prod_weight` int(11) NOT NULL DEFAULT '350',
  `prod_size` text NOT NULL,
  `prod_tags` text NOT NULL,
  `prod_color` text NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_stok` int(11) NOT NULL,
  `prod_rating` int(11) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_views` int(11) NOT NULL,
  `prod_upload_by` int(11) NOT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_cate_id`, `prod_merc_id`, `prod_name`, `prod_keyword`, `prod_url`, `prod_image`, `prod_weight`, `prod_size`, `prod_tags`, `prod_color`, `prod_price`, `prod_stok`, `prod_rating`, `prod_description`, `prod_views`, `prod_upload_by`, `prod_status`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 'Baju Baru', 'Cool,Clothes,Expensive', 'baju-baru-bagus-sekali', '1609753532product-05.jpg', 350, '1,2,3,4,5', '2,3', '1', 1000000, 1000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 14, 1, 1, '2021-01-04 09:41:17', '2021-01-23 09:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL,
  `role_menu_id` int(11) NOT NULL,
  `role_lev_id` int(11) NOT NULL,
  `role_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_menu`
--

INSERT INTO `role_menu` (`role_id`, `role_menu_id`, `role_lev_id`, `role_status`, `created_at`, `updated_at`) VALUES
(3, 10, 1, 1, '2020-12-26 09:08:32', '2020-12-26 09:08:32'),
(4, 15, 1, 1, '2020-12-26 09:08:40', '2020-12-26 09:08:40'),
(5, 19, 1, 1, '2020-12-26 09:08:49', '2020-12-26 09:08:49'),
(6, 16, 1, 1, '2020-12-26 09:08:58', '2020-12-26 09:08:58'),
(7, 17, 1, 1, '2020-12-26 09:09:05', '2020-12-26 09:09:05'),
(8, 18, 1, 1, '2020-12-26 09:09:14', '2020-12-26 09:09:14'),
(9, 22, 1, 1, '2020-12-26 11:20:04', '2020-12-26 11:20:04'),
(10, 23, 1, 1, '2020-12-26 11:20:49', '2020-12-26 11:20:49'),
(11, 24, 1, 1, '2020-12-26 11:20:58', '2020-12-26 11:20:58'),
(12, 25, 1, 1, '2020-12-26 11:21:05', '2020-12-26 11:21:05'),
(13, 26, 2, 1, '2020-12-26 15:30:14', '2020-12-26 15:30:14'),
(14, 27, 1, 1, '2020-12-26 16:17:46', '2020-12-26 16:17:46'),
(15, 28, 1, 1, '2020-12-27 14:23:48', '2020-12-27 14:23:48'),
(16, 29, 1, 1, '2020-12-27 14:23:59', '2020-12-27 14:23:59'),
(17, 30, 1, 1, '2020-12-27 14:24:11', '2020-12-27 14:24:11'),
(18, 31, 1, 1, '2020-12-27 14:26:03', '2020-12-27 14:26:03'),
(19, 32, 1, 1, '2020-12-27 14:26:13', '2020-12-27 14:26:13'),
(20, 33, 1, 1, '2020-12-27 14:27:39', '2020-12-27 14:27:39'),
(21, 34, 1, 1, '2020-12-27 14:31:52', '2020-12-27 14:31:52'),
(22, 35, 1, 1, '2020-12-27 14:32:03', '2020-12-27 14:32:03'),
(23, 36, 1, 1, '2020-12-27 14:32:11', '2020-12-27 14:32:11'),
(24, 37, 1, 1, '2020-12-27 14:35:07', '2020-12-27 14:35:07'),
(25, 38, 1, 1, '2020-12-27 14:36:39', '2020-12-27 14:36:39'),
(26, 39, 1, 1, '2020-12-27 14:36:46', '2020-12-27 14:36:46'),
(27, 40, 1, 1, '2020-12-27 14:37:50', '2020-12-27 14:37:50'),
(28, 41, 1, 1, '2020-12-27 14:37:58', '2020-12-27 14:37:58'),
(29, 42, 1, 1, '2020-12-27 14:42:26', '2020-12-27 14:42:26'),
(30, 43, 1, 1, '2020-12-27 14:42:36', '2020-12-27 14:42:36'),
(31, 44, 1, 1, '2020-12-27 14:42:45', '2020-12-27 14:42:45'),
(32, 45, 1, 1, '2020-12-27 14:42:55', '2020-12-27 14:42:55'),
(33, 46, 1, 1, '2020-12-28 07:37:37', '2020-12-28 07:37:37'),
(34, 47, 2, 1, '2021-01-06 07:28:49', '2021-01-06 07:28:49'),
(35, 48, 1, 1, '2021-01-16 08:28:10', '2021-01-16 08:28:10'),
(36, 49, 2, 1, '2021-01-16 08:42:42', '2021-01-16 08:42:42'),
(37, 50, 1, 1, '2021-01-16 10:52:09', '2021-01-16 10:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_category_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL,
  `size_description` text NOT NULL,
  `size_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_category_id`, `size_name`, `size_description`, `size_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'XL', 'Extra Large', 1, '2020-12-28 09:23:05', '2020-12-28 09:23:05'),
(2, 2, 'XXL', 'Extra Extra Large', 1, '2021-01-02 10:33:48', '2021-01-02 10:33:48'),
(3, 2, 'L', 'Large', 1, '2021-01-02 10:34:35', '2021-01-02 10:34:35'),
(4, 2, 'MD', 'Medium', 1, '2021-01-02 10:35:14', '2021-01-02 10:35:14'),
(5, 2, 'SM', 'Small', 1, '2021-01-02 10:35:27', '2021-01-02 10:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `slider_setting`
--

CREATE TABLE `slider_setting` (
  `slide_id` int(11) NOT NULL,
  `slide_menu_id` int(11) NOT NULL,
  `slide_caption` varchar(50) NOT NULL,
  `slide_image` varchar(100) NOT NULL,
  `slide_description` text NOT NULL,
  `slide_url` varchar(100) NOT NULL,
  `slide_text_1` text NOT NULL,
  `slide_text_2` text NOT NULL,
  `slide_text_3` text NOT NULL,
  `slide_index` int(11) NOT NULL,
  `slide_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_setting`
--

INSERT INTO `slider_setting` (`slide_id`, `slide_menu_id`, `slide_caption`, `slide_image`, `slide_description`, `slide_url`, `slide_text_1`, `slide_text_2`, `slide_text_3`, `slide_index`, `slide_status`, `created_at`, `updated_at`) VALUES
(1, 26, 'Women Colection', '1609057201slide-05.jpg', 'New Arivals Women Colection 2020', 'user/product-list', 'Women Colection 2020', 'New Arivals', 'SHOP NOW', 1, 1, '2020-12-27 08:20:01', '2020-12-27 08:20:01'),
(2, 26, 'Women Colection 2020', '1609057730slide-01.jpg', 'Women Colection 2020', 'user/product-list', 'Women', 'Colection', 'SHOP IN 2020', 2, 1, '2020-12-27 08:28:50', '2020-12-27 08:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tage_id` int(11) NOT NULL,
  `tage_name` varchar(50) NOT NULL,
  `tage_description` text NOT NULL,
  `tage_views` int(11) NOT NULL,
  `tage_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tage_id`, `tage_name`, `tage_description`, `tage_views`, `tage_status`, `created_at`, `updated_at`) VALUES
(2, 'Awesome', '-', 0, 1, '2020-12-28 07:43:07', '2020-12-28 07:43:07'),
(3, 'Camera', '-', 0, 1, '2020-12-28 07:43:13', '2020-12-28 07:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_content` text NOT NULL,
  `test_image` varchar(100) NOT NULL,
  `test_date` date NOT NULL,
  `test_rating` smallint(6) NOT NULL,
  `test_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`test_id`, `test_name`, `test_content`, `test_image`, `test_date`, `test_rating`, `test_status`, `created_at`, `updated_at`) VALUES
(2, 'Nice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '16107988481608998456logo-01.png', '2021-12-31', 5, 1, '2021-01-17 04:07:54', '2021-01-16 12:07:28'),
(3, 'Haduh', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1610856569joki.jpeg', '2021-01-04', 5, 1, '2021-01-17 04:09:29', '2021-01-17 04:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_lev_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_gender` varchar(5) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_address` text NOT NULL,
  `user_photo_cover` varchar(100) NOT NULL,
  `user_token` varchar(50) NOT NULL,
  `verified_email` tinyint(4) NOT NULL DEFAULT '0',
  `verified_phone` tinyint(4) NOT NULL DEFAULT '0',
  `verified_account` tinyint(4) NOT NULL DEFAULT '0',
  `blokir` tinyint(4) NOT NULL DEFAULT '0',
  `is_logged_in` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_lev_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_photo`, `user_gender`, `user_birthdate`, `user_address`, `user_photo_cover`, `user_token`, `verified_email`, `verified_phone`, `verified_account`, `blokir`, `is_logged_in`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'administrator@gmail.com', '$2a$10$.Z/W4wcIBySQhYL69YlATeEFEothDhxqwxiyiz022mPPFF1bxnfA.', '08123123', '-', '-', '2020-12-01', '-', '-', '', 1, 1, 1, 0, 0, '2020-12-25 10:06:45', '2020-12-25 10:06:45'),
(7, 2, 'Bayu Rifki Alghifari', 'bayurifkialgh@gmail.com', '$2y$10$q9akqYRxuJ9W84//mLG4GuQGwVD3IpaTMS9RBMqEEBkC.S9WA2fbG', '08123123123', '', '', '0000-00-00', '', '', '0640430e420d619c86db92e1b8839c67', 1, 0, 0, 0, 0, '2021-01-06 14:47:53', '2021-01-23 09:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `web_id` int(11) NOT NULL,
  `web_name` varchar(100) NOT NULL,
  `web_language` varchar(10) NOT NULL,
  `web_description` text NOT NULL,
  `web_icon` varchar(100) NOT NULL,
  `web_template` tinyint(4) NOT NULL,
  `web_setting` text NOT NULL,
  `web_logo` varchar(100) NOT NULL,
  `web_copyright` varchar(100) NOT NULL,
  `web_type` varchar(50) NOT NULL,
  `web_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`web_id`, `web_name`, `web_language`, `web_description`, `web_icon`, `web_template`, `web_setting`, `web_logo`, `web_copyright`, `web_type`, `web_status`, `created_at`, `updated_at`) VALUES
(1, 'Online Store', 'en', 'Website online store', '1608998456favicon.png', 1, '', '1608998456logo-01.png', 'Online Store', 'Single', 1, '2020-12-26 11:30:20', '2020-12-26 11:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_setting`
--
ALTER TABLE `banner_setting`
  ADD PRIMARY KEY (`bann_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `checkout_payment`
--
ALTER TABLE `checkout_payment`
  ADD PRIMARY KEY (`checp_id`);

--
-- Indexes for table `checkout_shipping`
--
ALTER TABLE `checkout_shipping`
  ADD PRIMARY KEY (`checs_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `discount_list`
--
ALTER TABLE `discount_list`
  ADD PRIMARY KEY (`disl_id`);

--
-- Indexes for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`disp_id`);

--
-- Indexes for table `discount_theme`
--
ALTER TABLE `discount_theme`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `footer_setting`
--
ALTER TABLE `footer_setting`
  ADD PRIMARY KEY (`foo_id`);

--
-- Indexes for table `header_setting`
--
ALTER TABLE `header_setting`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lev_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`paynt_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slider_setting`
--
ALTER TABLE `slider_setting`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tage_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_setting`
--
ALTER TABLE `banner_setting`
  MODIFY `bann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkout_payment`
--
ALTER TABLE `checkout_payment`
  MODIFY `checp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout_shipping`
--
ALTER TABLE `checkout_shipping`
  MODIFY `checs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_list`
--
ALTER TABLE `discount_list`
  MODIFY `disl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_product`
--
ALTER TABLE `discount_product`
  MODIFY `disp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_theme`
--
ALTER TABLE `discount_theme`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footer_setting`
--
ALTER TABLE `footer_setting`
  MODIFY `foo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_setting`
--
ALTER TABLE `header_setting`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `paynt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider_setting`
--
ALTER TABLE `slider_setting`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
