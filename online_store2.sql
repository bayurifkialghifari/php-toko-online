-- MySQL dump 10.13  Distrib 8.0.33, for macos12.6 (x86_64)
--
-- Host: localhost    Database: online_store
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner_setting`
--

DROP TABLE IF EXISTS `banner_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banner_setting` (
  `bann_id` int NOT NULL AUTO_INCREMENT,
  `bann_menu_id` int NOT NULL,
  `bann_name` varchar(50) NOT NULL,
  `bann_image` varchar(100) NOT NULL,
  `bann_description` text NOT NULL,
  `bann_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bann_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_setting`
--

LOCK TABLES `banner_setting` WRITE;
/*!40000 ALTER TABLE `banner_setting` DISABLE KEYS */;
INSERT INTO `banner_setting` VALUES (1,26,'Home','1609076865bg-01.jpg','Home page',0,'2020-12-27 13:47:45','2020-12-27 13:47:45'),(2,47,'Products','1609918242bg-01.jpg','Product Page Banner',1,'2021-01-06 07:30:42','2021-01-07 02:44:48');
/*!40000 ALTER TABLE `banner_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `bolg_user_id` int NOT NULL,
  `blog_cate_id` int NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_thumbnal` varchar(100) NOT NULL,
  `blog_view` int NOT NULL,
  `blog_content` text NOT NULL,
  `blog_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,1,4,'GGWP','16107865091609918242bg-01.jpg',13,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2021-01-20 03:27:26','2021-01-16 08:39:05');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_user_id` int NOT NULL,
  `cart_total_price` int NOT NULL,
  `cart_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (4,7,3000000,0,'2021-01-07 03:07:18','2021-01-08 14:28:23'),(5,7,1000000,0,'2021-01-10 03:51:48','2021-01-16 05:35:38'),(6,7,2000000,0,'2021-01-17 06:23:00','2023-06-30 06:48:38'),(7,7,2000000,0,'2023-06-30 06:49:43','2023-06-30 06:50:00'),(8,7,2000000,0,'2023-06-30 07:01:30','2023-06-30 07:01:46'),(9,7,1000000,0,'2023-06-30 07:02:31','2023-06-30 07:03:12');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_detail` (
  `card_id` int NOT NULL AUTO_INCREMENT,
  `card_cart_id` int NOT NULL,
  `card_prod_id` int NOT NULL,
  `cart_size_id` int NOT NULL,
  `cart_color_id` int NOT NULL,
  `card_price` int NOT NULL,
  `card_qty` int NOT NULL,
  `card_total_price` int NOT NULL,
  `card_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_detail`
--

LOCK TABLES `cart_detail` WRITE;
/*!40000 ALTER TABLE `cart_detail` DISABLE KEYS */;
INSERT INTO `cart_detail` VALUES (26,4,1,3,1,1000000,2,2000000,1,'2021-01-07 09:04:55','2021-01-08 11:34:39'),(27,4,1,4,1,1000000,1,1000000,1,'2021-01-07 09:04:58','2021-01-07 11:34:54'),(28,5,1,1,1,1000000,1,1000000,1,'2021-01-16 05:35:16','2021-01-16 05:35:16'),(29,6,1,1,1,1000000,2,2000000,1,'2021-01-17 06:23:00','2023-06-30 06:40:01'),(30,7,1,1,1,1000000,2,2000000,1,'2023-06-30 06:49:43','2023-06-30 06:49:43'),(31,8,1,1,1,1000000,2,2000000,1,'2023-06-30 07:01:30','2023-06-30 07:01:30'),(32,9,1,1,1,1000000,1,1000000,1,'2023-06-30 07:02:31','2023-06-30 07:02:31');
/*!40000 ALTER TABLE `cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `cate_id` int NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `cate_parent` int NOT NULL,
  `cate_url` varchar(100) NOT NULL,
  `cate_keywords` varchar(100) NOT NULL,
  `cate_banner` varchar(100) NOT NULL,
  `cate_description` text NOT NULL,
  `cate_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'Clothes',0,'clothes-colection','Men,Women,Clothes,Colection,Wear,Bags,Accesories','','-',1,'2020-12-28 07:31:42','2020-12-28 07:31:42'),(4,'Hat',0,'hat-colection','Men,Women,Clothes,Colection,Wear,Bags,Accesories','','-',1,'2020-12-28 07:36:10','2020-12-28 07:36:10');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `check_id` int NOT NULL AUTO_INCREMENT,
  `check_code` varchar(20) NOT NULL,
  `check_order_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `check_user_id` int NOT NULL,
  `check_cart_id` int NOT NULL,
  `check_total` int NOT NULL,
  `check_description` text NOT NULL,
  `check_status_value` varchar(50) NOT NULL,
  `check_status_code` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` VALUES (5,'16101917473837',NULL,7,4,3007000,'-','SETTLEMENT',1,'2021-01-08 14:28:23','2023-06-30 07:03:28'),(6,'1688107718246257',NULL,7,6,2012000,'-','FAILURE',0,'2023-06-30 06:48:38','2023-06-30 07:03:28'),(7,'1688107800887452',NULL,7,7,2012000,'-','Pendding',0,'2023-06-30 06:50:00','2023-06-30 07:03:28'),(8,'16881085925071115','1211699520',7,9,1009000,'-','Pendding',0,'2023-06-30 07:03:12','2023-06-30 07:07:37');
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout_payment`
--

DROP TABLE IF EXISTS `checkout_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout_payment` (
  `checp_id` int NOT NULL AUTO_INCREMENT,
  `checp_check_code` varchar(20) NOT NULL,
  `checp_type` varchar(20) NOT NULL,
  `checp_file` varchar(250) NOT NULL,
  `checp_account_number` varchar(20) NOT NULL,
  `checp_transaction_id` varchar(50) NOT NULL,
  `checp_order_id` varchar(15) NOT NULL,
  `checp_gross_amount` int NOT NULL,
  `checp_payment_type` varchar(20) NOT NULL,
  `checp_transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checp_bank` varchar(20) NOT NULL,
  `checp_payment_code` varchar(20) NOT NULL,
  `checp_va_number` varchar(20) NOT NULL,
  `checp_fraud_status` varchar(20) NOT NULL,
  `checp_pdf_url` text NOT NULL,
  `checp_status_value` varchar(50) NOT NULL,
  `checp_status_code` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`checp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout_payment`
--

LOCK TABLES `checkout_payment` WRITE;
/*!40000 ALTER TABLE `checkout_payment` DISABLE KEYS */;
INSERT INTO `checkout_payment` VALUES (1,'16101917473837','manual','16103529934.png','080123123','','',3007000,'bank','2021-01-11 07:43:20','bni','','','accept','','SETTLEMENT',1,'2021-01-11 07:43:20','2021-01-16 06:14:09');
/*!40000 ALTER TABLE `checkout_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout_shipping`
--

DROP TABLE IF EXISTS `checkout_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout_shipping` (
  `checs_id` int NOT NULL AUTO_INCREMENT,
  `checs_check_id` int NOT NULL,
  `checs_aggent` varchar(50) NOT NULL,
  `checs_service_name` varchar(50) NOT NULL,
  `checs_service_description` text NOT NULL,
  `checs_cost` int NOT NULL,
  `checs_etd` varchar(15) NOT NULL,
  `checs_from_province` varchar(50) NOT NULL,
  `checs_to_province` varchar(50) NOT NULL,
  `checs_from_city` varchar(50) NOT NULL,
  `checs_to_city` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`checs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout_shipping`
--

LOCK TABLES `checkout_shipping` WRITE;
/*!40000 ALTER TABLE `checkout_shipping` DISABLE KEYS */;
INSERT INTO `checkout_shipping` VALUES (3,5,'POS Indonesia (POS)','Paket Kilat Khusus','Paket Kilat Khusus',7000,'2-3 HARI','Jawa Barat','Jawa Barat','Cimahi','Bandung Barat','2021-01-08 14:28:23','2021-01-08 14:28:23'),(4,6,'Citra Van Titipan Kilat (TIKI)','ONS','Over Night Service',12000,'1','Jawa Barat','Jawa Barat','Cimahi','Bandung Barat','2023-06-30 06:48:38','2023-06-30 06:48:38'),(5,7,'Citra Van Titipan Kilat (TIKI)','ONS','Over Night Service',12000,'1','Jawa Barat','Jawa Barat','Cimahi','Bandung Barat','2023-06-30 06:50:00','2023-06-30 06:50:00'),(7,8,'Citra Van Titipan Kilat (TIKI)','REG','Regular Service',9000,'3','Jawa Barat','Jawa Barat','Cimahi','Bandung Barat','2023-06-30 07:03:12','2023-06-30 07:03:12');
/*!40000 ALTER TABLE `checkout_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `color_description` text NOT NULL,
  `color_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Red','cc0000','-',1,'2020-12-28 09:10:25','2020-12-28 09:10:25');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_list`
--

DROP TABLE IF EXISTS `discount_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discount_list` (
  `disl_id` int NOT NULL AUTO_INCREMENT,
  `disl_dist_id` int NOT NULL,
  `disl_name` varchar(50) NOT NULL,
  `disl_discount` int NOT NULL,
  `disl_description` text NOT NULL,
  `disl_from` date NOT NULL,
  `disl_to` date NOT NULL,
  `disl_limit` int NOT NULL,
  `disl_uses` int NOT NULL,
  `disl_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`disl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_list`
--

LOCK TABLES `discount_list` WRITE;
/*!40000 ALTER TABLE `discount_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_product`
--

DROP TABLE IF EXISTS `discount_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discount_product` (
  `disp_id` int NOT NULL AUTO_INCREMENT,
  `disp_prod_id` int NOT NULL,
  `disp_disl_id` int NOT NULL,
  `disp_description` text NOT NULL,
  `disp_limit` int NOT NULL,
  `disp_uses` int NOT NULL,
  `disp_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`disp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_product`
--

LOCK TABLES `discount_product` WRITE;
/*!40000 ALTER TABLE `discount_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_theme`
--

DROP TABLE IF EXISTS `discount_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discount_theme` (
  `dist_id` int NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(50) NOT NULL,
  `dist_description` text NOT NULL,
  `dist_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_theme`
--

LOCK TABLES `discount_theme` WRITE;
/*!40000 ALTER TABLE `discount_theme` DISABLE KEYS */;
INSERT INTO `discount_theme` VALUES (2,'Natal','-',1,'2020-12-28 11:22:25','2020-12-28 11:22:25'),(3,'Ramadhan','-',1,'2020-12-28 11:22:32','2020-12-28 11:22:32'),(4,'New Year','-',1,'2020-12-28 11:22:38','2020-12-28 11:22:38');
/*!40000 ALTER TABLE `discount_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_setting`
--

DROP TABLE IF EXISTS `footer_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footer_setting` (
  `foo_id` int NOT NULL AUTO_INCREMENT,
  `foo_foo_id` int NOT NULL,
  `foo_name` varchar(50) NOT NULL,
  `foo_value` text NOT NULL,
  `foo_description` text NOT NULL,
  `foo_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`foo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_setting`
--

LOCK TABLES `footer_setting` WRITE;
/*!40000 ALTER TABLE `footer_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `footer_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_setting`
--

DROP TABLE IF EXISTS `header_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `header_setting` (
  `head_id` int NOT NULL AUTO_INCREMENT,
  `head_name` varchar(50) NOT NULL,
  `head_value` text NOT NULL,
  `head_description` text NOT NULL,
  `head_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`head_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_setting`
--

LOCK TABLES `header_setting` WRITE;
/*!40000 ALTER TABLE `header_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `header_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `level` (
  `lev_id` int NOT NULL AUTO_INCREMENT,
  `lev_name` varchar(50) NOT NULL,
  `lev_description` text NOT NULL,
  `lev_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (1,'Administrator','-',1,'2020-12-25 10:08:01','2020-12-25 10:08:01'),(2,'Customer','-',1,'2020-12-25 14:04:55','2020-12-25 14:04:55');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `menu_menu_id` int NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_description` text NOT NULL,
  `menu_index` int NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_views` int NOT NULL,
  `menu_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (10,0,'Dashboard','-',1,'fa fa-suitcase','admin/dashboard',0,1,'2020-12-25 15:01:15','2020-12-25 15:01:15'),(15,0,'Setting','-',10,'fa fa-cogs','#',0,1,'2020-12-25 15:03:47','2020-12-25 15:03:47'),(16,15,'Level','-',1,'fa fa-caret-right','admin/setting/level',0,1,'2020-12-25 15:04:45','2020-12-25 15:04:45'),(17,15,'Menu','-',2,'fa fa-caret-right','admin/setting/menu',0,1,'2020-12-25 15:05:34','2020-12-25 15:05:34'),(18,15,'Role Menu','-',3,'fa fa-caret-right','admin/setting/role-menu',0,1,'2020-12-25 15:05:53','2020-12-25 15:05:53'),(19,0,'Website','-',6,'fa fa-comments-o','#',0,1,'2020-12-25 15:07:50','2020-12-25 15:07:50'),(22,19,'Configuration','-',1,'fa fa-caret-right','admin/website-setting',0,1,'2020-12-26 11:17:42','2020-12-26 11:17:42'),(23,19,'Banner','-',3,'fa fa-caret-right','admin/website-banner',0,1,'2020-12-26 11:18:12','2020-12-26 11:18:12'),(24,19,'Header','-',6,'fa fa-caret-right','admin/website-header',0,1,'2020-12-26 11:18:36','2021-01-16 10:51:49'),(25,19,'Footer','-',7,'fa fa-caret-right','admin/website-footer',0,1,'2020-12-26 11:19:07','2021-01-16 10:51:57'),(26,0,'Home','-',1,'fa fa-home','user/home',0,1,'2020-12-26 15:30:06','2020-12-26 15:30:06'),(27,19,'Slider','-',2,'fa fa-caret-right','admin/website-slider',0,1,'2020-12-26 16:09:32','2020-12-26 16:09:32'),(28,0,'Catalog','-',2,'fa fa-tag','#',0,1,'2020-12-27 14:22:00','2020-12-27 14:22:00'),(29,28,'Categories','-',1,'fa fa-caret-right','admin/catalog-category',0,1,'2020-12-27 14:22:33','2020-12-27 14:22:33'),(30,28,'Products','-',2,'fa fa-caret-right','admin/catalog-product',0,1,'2020-12-27 14:23:36','2020-12-27 14:23:36'),(31,28,'Colors','-',3,'fa fa-caret-right','admin/catalog-color',0,1,'2020-12-27 14:25:21','2020-12-27 14:25:21'),(32,28,'Sizes','-',4,'fa fa-caret-right','admin/catalog-size',0,1,'2020-12-27 14:25:43','2020-12-27 14:25:43'),(33,28,'Reviews','-',6,'fa fa-caret-right','admin/catalog-reviews',0,1,'2020-12-27 14:27:18','2020-12-27 14:27:18'),(34,0,'Information','-',5,'fa fa-info-circle','#',0,1,'2020-12-27 14:30:22','2020-12-27 14:30:22'),(35,34,'FAQ','-',1,'fa fa-caret-right','admin/information-faq',0,1,'2020-12-27 14:30:47','2020-12-27 14:30:47'),(36,34,'Terms & Conditions','-',2,'fa fa-caret-right','admin/information-terms-condition',0,1,'2020-12-27 14:31:13','2020-12-27 14:31:13'),(37,0,'Sales','-',4,'fa fa-shopping-cart','#',0,1,'2020-12-27 14:34:47','2020-12-27 14:34:47'),(38,37,'Payment Method','-',1,'fa fa-caret-right','admin/sales-payment-method',0,1,'2020-12-27 14:35:34','2020-12-27 14:35:34'),(39,37,'Orders','-',2,'fa fa-caret-right','admin/sales-order-list',0,1,'2020-12-27 14:35:54','2020-12-27 14:35:54'),(40,37,'Payments','-',3,'fa fa-caret-right','admin/sales-payment-list',0,1,'2020-12-27 14:37:14','2020-12-27 14:37:14'),(41,37,'Voucher','-',4,'fa fa-caret-right','admin/sales-voucher',0,1,'2020-12-27 14:37:38','2020-12-27 14:37:38'),(42,0,'Discount','-',3,'fa fa-percent','#',0,1,'2020-12-27 14:40:59','2020-12-27 14:40:59'),(43,42,'Dsicount Theme','-',1,'fa fa-caret-right','admin/discount-theme',0,1,'2020-12-27 14:41:36','2020-12-27 14:41:36'),(44,42,'Discount List','-',2,'fa fa-caret-right','admin/discount-list',0,1,'2020-12-27 14:41:54','2020-12-27 14:41:54'),(45,42,'Discount Product','-',3,'fa fa-caret-right','admin/discount-product',0,1,'2020-12-27 14:42:19','2020-12-27 14:42:19'),(46,28,'Tags','-',5,'fa fa-caret-right','admin/catalog-tags',0,1,'2020-12-28 07:37:24','2020-12-28 07:37:24'),(47,0,'Products','-',2,'fa fa-product-hunt','user/product-list',0,1,'2021-01-06 07:28:38','2021-01-06 07:28:38'),(48,19,'Blog','-',4,'fa fa-caret-right','admin/website-blog',0,1,'2021-01-16 08:27:33','2021-01-16 08:27:57'),(49,0,'Blog','-',3,'fa fa-caret-right','user/blog',0,1,'2021-01-16 08:42:31','2021-01-16 08:42:31'),(50,19,'Testimonials','-',5,'fa fa-caret-right','admin/website-testimonials',0,1,'2021-01-16 10:51:34','2021-01-16 10:51:34');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_method` (
  `paynt_id` int NOT NULL AUTO_INCREMENT,
  `paynt_name` varchar(50) NOT NULL,
  `paynt_description` text NOT NULL,
  `paynt_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`paynt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'Manual','-',1,'2021-01-16 05:38:46','2021-01-16 05:34:03'),(2,'Midtrans','-',1,'2021-01-16 05:34:18','2021-01-16 05:34:09');
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_cate_id` int NOT NULL,
  `prod_merc_id` int NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_keyword` varchar(100) NOT NULL,
  `prod_url` varchar(100) NOT NULL,
  `prod_image` text NOT NULL,
  `prod_weight` int NOT NULL DEFAULT '350',
  `prod_size` text NOT NULL,
  `prod_tags` text NOT NULL,
  `prod_color` text NOT NULL,
  `prod_price` int NOT NULL,
  `prod_stok` int NOT NULL,
  `prod_rating` int NOT NULL,
  `prod_description` text NOT NULL,
  `prod_views` int NOT NULL,
  `prod_upload_by` int NOT NULL,
  `prod_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,2,0,'Baju Baru','Cool,Clothes,Expensive','baju-baru-bagus-sekali','1609753532product-05.jpg',350,'1,2,3,4,5','2,3','1',1000000,993,0,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',18,1,1,'2021-01-04 09:41:17','2023-06-30 07:03:12');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_menu`
--

DROP TABLE IF EXISTS `role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_menu` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_menu_id` int NOT NULL,
  `role_lev_id` int NOT NULL,
  `role_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_menu`
--

LOCK TABLES `role_menu` WRITE;
/*!40000 ALTER TABLE `role_menu` DISABLE KEYS */;
INSERT INTO `role_menu` VALUES (3,10,1,1,'2020-12-26 09:08:32','2020-12-26 09:08:32'),(4,15,1,1,'2020-12-26 09:08:40','2020-12-26 09:08:40'),(5,19,1,1,'2020-12-26 09:08:49','2020-12-26 09:08:49'),(6,16,1,1,'2020-12-26 09:08:58','2020-12-26 09:08:58'),(7,17,1,1,'2020-12-26 09:09:05','2020-12-26 09:09:05'),(8,18,1,1,'2020-12-26 09:09:14','2020-12-26 09:09:14'),(9,22,1,1,'2020-12-26 11:20:04','2020-12-26 11:20:04'),(10,23,1,1,'2020-12-26 11:20:49','2020-12-26 11:20:49'),(11,24,1,1,'2020-12-26 11:20:58','2020-12-26 11:20:58'),(12,25,1,1,'2020-12-26 11:21:05','2020-12-26 11:21:05'),(13,26,2,1,'2020-12-26 15:30:14','2020-12-26 15:30:14'),(14,27,1,1,'2020-12-26 16:17:46','2020-12-26 16:17:46'),(15,28,1,1,'2020-12-27 14:23:48','2020-12-27 14:23:48'),(16,29,1,1,'2020-12-27 14:23:59','2020-12-27 14:23:59'),(17,30,1,1,'2020-12-27 14:24:11','2020-12-27 14:24:11'),(18,31,1,1,'2020-12-27 14:26:03','2020-12-27 14:26:03'),(19,32,1,1,'2020-12-27 14:26:13','2020-12-27 14:26:13'),(20,33,1,1,'2020-12-27 14:27:39','2020-12-27 14:27:39'),(21,34,1,1,'2020-12-27 14:31:52','2020-12-27 14:31:52'),(22,35,1,1,'2020-12-27 14:32:03','2020-12-27 14:32:03'),(23,36,1,1,'2020-12-27 14:32:11','2020-12-27 14:32:11'),(24,37,1,1,'2020-12-27 14:35:07','2020-12-27 14:35:07'),(25,38,1,1,'2020-12-27 14:36:39','2020-12-27 14:36:39'),(26,39,1,1,'2020-12-27 14:36:46','2020-12-27 14:36:46'),(27,40,1,1,'2020-12-27 14:37:50','2020-12-27 14:37:50'),(28,41,1,1,'2020-12-27 14:37:58','2020-12-27 14:37:58'),(29,42,1,1,'2020-12-27 14:42:26','2020-12-27 14:42:26'),(30,43,1,1,'2020-12-27 14:42:36','2020-12-27 14:42:36'),(31,44,1,1,'2020-12-27 14:42:45','2020-12-27 14:42:45'),(32,45,1,1,'2020-12-27 14:42:55','2020-12-27 14:42:55'),(33,46,1,1,'2020-12-28 07:37:37','2020-12-28 07:37:37'),(34,47,2,1,'2021-01-06 07:28:49','2021-01-06 07:28:49'),(35,48,1,1,'2021-01-16 08:28:10','2021-01-16 08:28:10'),(36,49,2,1,'2021-01-16 08:42:42','2021-01-16 08:42:42'),(37,50,1,1,'2021-01-16 10:52:09','2021-01-16 10:52:09');
/*!40000 ALTER TABLE `role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size` (
  `size_id` int NOT NULL AUTO_INCREMENT,
  `size_category_id` int NOT NULL,
  `size_name` varchar(50) NOT NULL,
  `size_description` text NOT NULL,
  `size_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,2,'XL','Extra Large',1,'2020-12-28 09:23:05','2020-12-28 09:23:05'),(2,2,'XXL','Extra Extra Large',1,'2021-01-02 10:33:48','2021-01-02 10:33:48'),(3,2,'L','Large',1,'2021-01-02 10:34:35','2021-01-02 10:34:35'),(4,2,'MD','Medium',1,'2021-01-02 10:35:14','2021-01-02 10:35:14'),(5,2,'SM','Small',1,'2021-01-02 10:35:27','2021-01-02 10:35:27');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_setting`
--

DROP TABLE IF EXISTS `slider_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_setting` (
  `slide_id` int NOT NULL AUTO_INCREMENT,
  `slide_menu_id` int NOT NULL,
  `slide_caption` varchar(50) NOT NULL,
  `slide_image` varchar(100) NOT NULL,
  `slide_description` text NOT NULL,
  `slide_url` varchar(100) NOT NULL,
  `slide_text_1` text NOT NULL,
  `slide_text_2` text NOT NULL,
  `slide_text_3` text NOT NULL,
  `slide_index` int NOT NULL,
  `slide_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_setting`
--

LOCK TABLES `slider_setting` WRITE;
/*!40000 ALTER TABLE `slider_setting` DISABLE KEYS */;
INSERT INTO `slider_setting` VALUES (1,26,'Women Colection','1609057201slide-05.jpg','New Arivals Women Colection 2020','user/product-list','Women Colection 2020','New Arivals','SHOP NOW',1,1,'2020-12-27 08:20:01','2020-12-27 08:20:01'),(2,26,'Women Colection 2020','1609057730slide-01.jpg','Women Colection 2020','user/product-list','Women','Colection','SHOP IN 2020',2,1,'2020-12-27 08:28:50','2020-12-27 08:28:50');
/*!40000 ALTER TABLE `slider_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `tage_id` int NOT NULL AUTO_INCREMENT,
  `tage_name` varchar(50) NOT NULL,
  `tage_description` text NOT NULL,
  `tage_views` int NOT NULL,
  `tage_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (2,'Awesome','-',0,1,'2020-12-28 07:43:07','2020-12-28 07:43:07'),(3,'Camera','-',0,1,'2020-12-28 07:43:13','2020-12-28 07:43:13');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonial` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) NOT NULL,
  `test_content` text NOT NULL,
  `test_image` varchar(100) NOT NULL,
  `test_date` date NOT NULL,
  `test_rating` smallint NOT NULL,
  `test_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
INSERT INTO `testimonial` VALUES (2,'Nice','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','16107988481608998456logo-01.png','2021-12-31',5,1,'2021-01-17 04:07:54','2021-01-16 12:07:28'),(3,'Haduh','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','1610856569joki.jpeg','2021-01-04',5,1,'2021-01-17 04:09:29','2021-01-17 04:09:29');
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_lev_id` int NOT NULL,
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
  `verified_email` tinyint NOT NULL DEFAULT '0',
  `verified_phone` tinyint NOT NULL DEFAULT '0',
  `verified_account` tinyint NOT NULL DEFAULT '0',
  `blokir` tinyint NOT NULL DEFAULT '0',
  `is_logged_in` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'Administrator','administrator@gmail.com','$2a$10$.Z/W4wcIBySQhYL69YlATeEFEothDhxqwxiyiz022mPPFF1bxnfA.','08123123','-','-','2020-12-01','-','-','',1,1,1,0,0,'2020-12-25 10:06:45','2020-12-25 10:06:45'),(7,2,'Bayu Rifki Alghifari','bayurifkialgh@gmail.com','$2y$10$q9akqYRxuJ9W84//mLG4GuQGwVD3IpaTMS9RBMqEEBkC.S9WA2fbG','08123123123','','','0000-00-00','','','0640430e420d619c86db92e1b8839c67',1,0,0,0,0,'2021-01-06 14:47:53','2021-01-23 09:14:57');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_setting`
--

DROP TABLE IF EXISTS `web_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `web_setting` (
  `web_id` int NOT NULL AUTO_INCREMENT,
  `web_name` varchar(100) NOT NULL,
  `web_language` varchar(10) NOT NULL,
  `web_description` text NOT NULL,
  `web_icon` varchar(100) NOT NULL,
  `web_template` tinyint NOT NULL,
  `web_setting` text NOT NULL,
  `web_logo` varchar(100) NOT NULL,
  `web_copyright` varchar(100) NOT NULL,
  `web_type` varchar(50) NOT NULL,
  `web_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_setting`
--

LOCK TABLES `web_setting` WRITE;
/*!40000 ALTER TABLE `web_setting` DISABLE KEYS */;
INSERT INTO `web_setting` VALUES (1,'Online Store','en','Website online store','1608998456favicon.png',1,'','1608998456logo-01.png','Online Store','Single',1,'2020-12-26 11:30:20','2020-12-26 11:30:20');
/*!40000 ALTER TABLE `web_setting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-30 14:16:27
