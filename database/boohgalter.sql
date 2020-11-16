-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: boohgalter
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

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
-- Table structure for table `admin_codes`
--

DROP TABLE IF EXISTS `admin_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_codes`
--

LOCK TABLES `admin_codes` WRITE;
/*!40000 ALTER TABLE `admin_codes` DISABLE KEYS */;
INSERT INTO `admin_codes` VALUES (1,'1111',1,'2020-08-16 10:56:33','2020-08-16 17:51:30'),(2,'0',1,'2020-08-16 17:42:22','2020-08-16 17:49:23');
/*!40000 ALTER TABLE `admin_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Пицца','2020-08-15 06:51:00','2020-08-15 06:51:00'),(2,'Суши','2020-08-15 06:51:04','2020-08-15 06:51:04'),(3,'Наборы','2020-08-15 06:51:10','2020-08-15 06:51:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dish_ingredient`
--

DROP TABLE IF EXISTS `dish_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dish_ingredient` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dish_id` bigint NOT NULL,
  `ingredient_id` bigint NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dish_ingredient`
--

LOCK TABLES `dish_ingredient` WRITE;
/*!40000 ALTER TABLE `dish_ingredient` DISABLE KEYS */;
INSERT INTO `dish_ingredient` VALUES (1,1,1,100,NULL,NULL),(2,1,3,2,NULL,NULL),(3,2,4,1,NULL,NULL),(4,2,3,2,NULL,NULL),(5,2,6,3,NULL,NULL),(6,3,4,4,NULL,NULL),(7,3,5,3,NULL,NULL),(8,4,2,3,NULL,NULL),(9,4,3,4,NULL,NULL),(10,4,5,4,NULL,NULL),(11,5,5,6,NULL,NULL),(12,5,3,2,NULL,NULL),(13,5,5,1,NULL,NULL),(14,6,3,6,NULL,NULL),(15,8,6,150,NULL,NULL),(16,8,3,1500,NULL,NULL),(17,8,8,15000,NULL,NULL),(18,9,2,23,NULL,NULL),(19,9,9,32,NULL,NULL);
/*!40000 ALTER TABLE `dish_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dish_order`
--

DROP TABLE IF EXISTS `dish_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dish_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `dish_id` bigint NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dish_order`
--

LOCK TABLES `dish_order` WRITE;
/*!40000 ALTER TABLE `dish_order` DISABLE KEYS */;
INSERT INTO `dish_order` VALUES (1,1,2,1,NULL,NULL),(2,2,6,3,NULL,NULL),(3,2,3,4,NULL,NULL),(4,3,3,5,NULL,NULL),(5,4,3,3,NULL,NULL),(6,5,3,4,NULL,NULL),(7,6,5,6,NULL,NULL),(8,7,6,7,NULL,NULL),(9,7,2,7,NULL,NULL),(10,8,2,9,NULL,NULL),(11,9,4,5,NULL,NULL),(12,10,6,1,NULL,NULL),(13,11,6,2,NULL,NULL),(14,12,1,1,NULL,NULL),(15,13,2,1,NULL,NULL),(16,14,2,1,NULL,NULL),(17,15,1,1,NULL,NULL),(18,17,9,5,NULL,NULL),(19,18,5,12,NULL,NULL),(20,19,5,12,NULL,NULL),(21,20,5,12,NULL,NULL),(22,21,5,12,NULL,NULL),(23,22,6,10,NULL,NULL),(24,23,6,2,NULL,NULL),(25,24,6,2,NULL,NULL),(26,25,6,2,NULL,NULL),(27,26,6,10,NULL,NULL),(28,27,6,10,NULL,NULL),(29,28,6,10,NULL,NULL),(30,29,6,10,NULL,NULL),(31,30,6,10,NULL,NULL),(32,39,6,10,NULL,NULL),(33,40,6,50,NULL,NULL);
/*!40000 ALTER TABLE `dish_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dishes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishes`
--

LOCK TABLES `dishes` WRITE;
/*!40000 ALTER TABLE `dishes` DISABLE KEYS */;
INSERT INTO `dishes` VALUES (1,'пицца1',100.00,1,'2020-08-15 07:39:54','2020-08-15 07:39:54'),(2,'пицца2',2.00,1,'2020-08-15 07:40:10','2020-08-15 07:42:03'),(3,'суши2',3.00,2,'2020-08-15 07:40:22','2020-08-15 07:42:13'),(4,'суши1',4.00,2,'2020-08-15 07:40:46','2020-08-15 07:42:20'),(5,'набор1',5.00,3,'2020-08-15 07:40:59','2020-08-15 07:42:30'),(6,'набор2',6.00,3,'2020-08-15 07:41:25','2020-08-15 07:41:25'),(7,'тест',1400.00,3,'2020-11-16 12:47:14','2020-11-16 12:47:14'),(8,'тест',1400.00,3,'2020-11-16 12:48:50','2020-11-16 12:48:50'),(9,'тест2',145.00,2,'2020-11-16 12:49:37','2020-11-16 12:49:37');
/*!40000 ALTER TABLE `dishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient_organization`
--

DROP TABLE IF EXISTS `ingredient_organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient_organization` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint NOT NULL,
  `organization_id` bigint NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_organization`
--

LOCK TABLES `ingredient_organization` WRITE;
/*!40000 ALTER TABLE `ingredient_organization` DISABLE KEYS */;
INSERT INTO `ingredient_organization` VALUES (1,1,1,10,NULL,NULL),(2,1,2,40,NULL,NULL),(3,1,1,40,NULL,NULL),(4,1,2,150,NULL,NULL),(5,1,1,40,NULL,NULL),(6,1,2,150,NULL,NULL),(7,1,3,120,NULL,NULL),(8,2,1,5000,NULL,NULL),(9,6,1,1000,NULL,NULL),(10,6,2,101,NULL,NULL),(11,6,3,10,NULL,NULL),(12,3,1,100,NULL,NULL),(13,3,2,1001,NULL,NULL),(14,3,3,500,NULL,NULL),(15,5,1,342,NULL,NULL),(16,5,2,25253,NULL,NULL),(17,5,3,235,NULL,NULL),(18,5,2,25247,NULL,NULL),(19,3,2,999,NULL,NULL),(20,5,2,25252,NULL,NULL),(21,3,1,94,NULL,NULL),(22,3,1,88,NULL,NULL),(23,3,1,82,NULL,NULL),(24,3,1,76,NULL,NULL),(25,1,1,40,NULL,NULL),(26,2,1,5000,NULL,NULL),(27,6,1,1000,NULL,NULL),(28,3,1,70,NULL,NULL),(29,5,1,342,NULL,NULL),(30,4,1,0,NULL,NULL),(31,7,1,0,NULL,NULL),(32,8,1,0,NULL,NULL),(33,9,1,0,NULL,NULL),(34,10,1,0,NULL,NULL),(35,1,1,40,NULL,NULL),(36,2,1,5000,NULL,NULL),(37,6,1,1000,NULL,NULL),(38,3,1,64,NULL,NULL),(39,5,1,342,NULL,NULL),(40,4,1,0,NULL,NULL),(41,7,1,0,NULL,NULL),(42,8,1,0,NULL,NULL),(43,9,1,0,NULL,NULL),(44,10,1,0,NULL,NULL),(45,1,1,40,NULL,NULL),(46,2,1,5000,NULL,NULL),(47,6,1,1000,NULL,NULL),(48,3,1,4,NULL,NULL),(49,5,1,342,NULL,NULL),(50,4,1,0,NULL,NULL),(51,7,1,0,NULL,NULL),(52,8,1,0,NULL,NULL),(53,9,1,0,NULL,NULL),(54,10,1,0,NULL,NULL),(55,1,3,120,NULL,NULL),(56,6,3,10,NULL,NULL),(57,3,3,200,NULL,NULL),(58,5,3,235,NULL,NULL),(59,2,3,0,NULL,NULL),(60,4,3,0,NULL,NULL),(61,7,3,0,NULL,NULL),(62,8,3,0,NULL,NULL),(63,9,3,0,NULL,NULL),(64,10,3,0,NULL,NULL),(65,1,2,150,NULL,NULL),(66,6,2,101,NULL,NULL),(67,1,2,150,NULL,NULL),(68,6,2,101,NULL,NULL);
/*!40000 ALTER TABLE `ingredient_organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Рис','2020-08-15 06:51:35','2020-10-07 09:41:14'),(2,'Тесто','2020-08-15 06:51:38','2020-08-15 06:51:38'),(3,'Куриное колено','2020-08-15 06:51:48','2020-08-15 06:51:48'),(4,'Огурец','2020-08-15 06:51:54','2020-08-15 06:51:54'),(5,'Мясо','2020-08-15 06:51:58','2020-08-15 06:51:58'),(6,'Рыба','2020-08-15 06:52:02','2020-08-15 06:52:02'),(7,'Сыр','2020-08-19 13:36:44','2020-08-19 13:36:44'),(8,'гречка','2020-10-07 09:41:21','2020-10-07 09:41:26'),(9,'вареники','2020-10-07 09:53:25','2020-10-07 09:53:25'),(10,'Макароны','2020-11-16 12:05:21','2020-11-16 12:05:21');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (11,'2014_10_12_000000_create_users_table',1),(12,'2014_10_12_100000_create_password_resets_table',1),(13,'2019_08_19_000000_create_failed_jobs_table',1),(14,'2020_08_14_181959_create_organizations_table',1),(15,'2020_08_14_182007_create_dishes_table',1),(16,'2020_08_14_182016_create_ingredients_table',1),(17,'2020_08_14_182039_create_orders_table',1),(18,'2020_08_14_184125_create_categories_table',1),(19,'2020_08_14_184834_create_dish_ingredient_table',1),(20,'2020_08_15_084718_create_dish_order_table',1),(21,'2020_08_15_124643_change_comment_from_orders',2),(24,'2020_08_16_152917_add_login_to_users',3),(25,'2020_08_16_155139_create_admin_codes_table',3),(26,'2020_08_16_155952_drop_email_from_users',4),(27,'2020_08_16_223819_drop_valid_until_from_admin_codes',5),(31,'2020_11_16_171509_create_ingredient_organization_table',6),(32,'2020_11_16_171923_remove_amount_from_ingredients',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'1','1','1',1,NULL,'2020-08-15 07:51:42','2020-08-15 07:51:42'),(2,'2','2','2',3,NULL,'2020-08-15 07:52:01','2020-08-15 07:52:01'),(3,'5','5','5',2,NULL,'2020-08-15 07:54:04','2020-08-15 07:54:04'),(4,'3','3','3',1,'3','2020-08-15 07:54:10','2020-08-15 07:54:10'),(5,'4','4','4',1,NULL,'2020-08-15 07:55:01','2020-08-15 07:55:01'),(6,'6','6','6',3,'6','2020-08-15 07:55:12','2020-08-15 07:55:12'),(7,'7','7','7',2,'7','2020-08-15 07:55:25','2020-08-15 07:55:25'),(8,'9','9','9',3,NULL,'2020-08-15 07:57:06','2020-08-15 07:57:06'),(9,'сашка','111','222',3,'Привет, мир!','2020-08-16 09:42:14','2020-08-16 09:42:14'),(10,'5','5','5',2,NULL,'2020-08-16 10:07:18','2020-08-16 10:07:18'),(11,'cc','c','c',2,NULL,'2020-08-16 10:07:57','2020-08-16 10:07:57'),(12,'test','test','test',1,'test','2020-08-16 06:07:48','2020-08-16 06:07:48'),(13,'test1','test1','test1',2,'test1','2020-08-16 16:08:47','2020-08-16 16:08:47'),(14,'test1','test1','test1',2,'test1','2020-08-16 16:08:56','2020-08-16 16:08:56'),(15,'тест','123','тест',1,'теси','2020-09-14 15:23:55','2020-09-14 15:23:55'),(16,'виноград','228','погреб',2,NULL,'2020-11-16 12:51:40','2020-11-16 12:51:40'),(17,'виноград','228','погреб',2,NULL,'2020-11-16 12:52:59','2020-11-16 12:52:59'),(18,'к','к','к',2,NULL,'2020-11-16 13:47:58','2020-11-16 13:47:58'),(19,'к','к','к',2,NULL,'2020-11-16 13:49:31','2020-11-16 13:49:31'),(20,'к','к','к',2,NULL,'2020-11-16 13:49:48','2020-11-16 13:49:48'),(21,'к','к','к',2,NULL,'2020-11-16 13:53:16','2020-11-16 13:53:16'),(22,'тест','тест','тест',1,NULL,'2020-11-16 13:54:23','2020-11-16 13:54:23'),(23,'кцу','кцу','цук',1,NULL,'2020-11-16 13:55:12','2020-11-16 13:55:12'),(24,'кцу','кцу','цук',1,NULL,'2020-11-16 13:55:46','2020-11-16 13:55:46'),(25,'кцу','кцу','цук',1,NULL,'2020-11-16 13:55:53','2020-11-16 13:55:53'),(26,'11','11','11',1,NULL,'2020-11-16 13:56:20','2020-11-16 13:56:20'),(27,'пк','пв','пв',1,NULL,'2020-11-16 14:01:38','2020-11-16 14:01:38'),(28,'пк','пв','пв',1,NULL,'2020-11-16 14:01:58','2020-11-16 14:01:58'),(29,'пк','пв','пв',1,NULL,'2020-11-16 14:05:36','2020-11-16 14:05:36'),(30,'уцк','кцу','цку',1,NULL,'2020-11-16 14:07:48','2020-11-16 14:07:48'),(31,'123','132','123',1,NULL,'2020-11-16 14:08:31','2020-11-16 14:08:31'),(32,'123','132','123',1,NULL,'2020-11-16 14:08:57','2020-11-16 14:08:57'),(33,'123','132','123',1,NULL,'2020-11-16 14:09:34','2020-11-16 14:09:34'),(34,'123','132','123',1,NULL,'2020-11-16 14:09:52','2020-11-16 14:09:52'),(35,'123','132','123',1,NULL,'2020-11-16 14:10:15','2020-11-16 14:10:15'),(36,'123','132','123',1,NULL,'2020-11-16 14:10:21','2020-11-16 14:10:21'),(37,'123','132','123',1,NULL,'2020-11-16 14:10:26','2020-11-16 14:10:26'),(38,'123','132','123',1,NULL,'2020-11-16 14:11:11','2020-11-16 14:11:11'),(39,'1312','132','132',1,NULL,'2020-11-16 14:11:32','2020-11-16 14:11:32'),(40,'333','333','333',3,NULL,'2020-11-16 14:11:47','2020-11-16 14:11:47'),(41,'123','123','12',3,NULL,'2020-11-16 14:18:41','2020-11-16 14:18:41'),(42,'214','124','124',2,NULL,'2020-11-16 14:23:33','2020-11-16 14:23:33');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'Корпорация зла','2020-08-15 06:50:53','2020-08-15 06:50:53'),(2,'Конгломерат','2020-08-15 06:51:17','2020-08-15 06:51:17'),(3,'Альянс','2020-08-15 06:51:25','2020-08-15 06:51:25');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_login_unique` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin',NULL,'$2y$10$Cz1cRuf4nRVZyCUT.VsOnepcaO9Vih161E1X4kXTH8F3xaY.gUIBy',NULL,'2020-08-16 11:00:35','2020-08-16 11:00:35','admin'),(8,'Admin',NULL,'$2y$10$H8VjVPzqJe5XvbUaBNL2SO7HNimZbMZzyInhCR8lwtn3fJKbIHBpq',NULL,'2020-08-16 17:51:30','2020-08-16 17:51:30','admin2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-16 19:27:08
