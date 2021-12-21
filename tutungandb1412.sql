-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tutungandb
-- ------------------------------------------------------
-- Server version	5.7.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_wish_id_idx` (`wish_id`),
  CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fl_card_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Elektronik',NULL,'2021-12-14 22:42:15',NULL),(2,'Komputer dan Aksesoris',NULL,'2021-12-14 22:42:15',NULL),(3,'Handphone dan Aksesoris',NULL,'2021-12-14 22:42:15',NULL),(4,'Pakaian Pria',NULL,'2021-12-14 22:42:15',NULL),(5,'Sepatu Pria',NULL,'2021-12-14 22:42:15',NULL),(6,'Tas Pria',NULL,'2021-12-14 22:42:15',NULL),(7,'Aksesoris Fashion',NULL,'2021-12-14 22:42:15',NULL),(8,'Jam Tangan',NULL,'2021-12-14 22:42:15',NULL),(9,'Kesehatan',NULL,'2021-12-14 22:42:15',NULL),(10,'Hobi dan Koleksi',NULL,'2021-12-14 22:42:15',NULL),(11,'Olahraga dan Outdoor',NULL,'2021-12-14 22:42:15',NULL),(12,'Buku dan Alat Tulis',NULL,'2021-12-14 22:42:15',NULL),(13,'Makanan dan Minuman',NULL,'2021-12-14 22:42:15',NULL),(14,'Perawatan adn Kecantikan',NULL,'2021-12-14 22:42:15',NULL),(15,'Perlengkapan Rumah',NULL,'2021-12-14 22:42:15',NULL),(16,'Pakaian Wanita',NULL,'2021-12-14 22:42:15',NULL),(17,'Fashion Muslim',NULL,'2021-12-14 22:42:15',NULL),(18,'Fashion Bayi dan Anak',NULL,'2021-12-14 22:42:15',NULL),(19,'Ibu dan Bayi',NULL,'2021-12-14 22:42:15',NULL),(20,'Sepatu Wanita',NULL,'2021-12-14 22:42:15',NULL),(21,'Tas Wanita',NULL,'2021-12-14 22:42:15',NULL),(22,'Otomotif',NULL,'2021-12-14 22:42:15',NULL),(23,'Souvenir dan Pesta',NULL,'2021-12-14 22:42:15',NULL),(24,'Fotografi',NULL,'2021-12-14 22:42:15',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `reason`
--

DROP TABLE IF EXISTS `reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reason` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reason`
--

LOCK TABLES `reason` WRITE;
/*!40000 ALTER TABLE `reason` DISABLE KEYS */;
INSERT INTO `reason` VALUES (1,'Barang Mudah Meledak','2021-12-14 22:55:03',NULL),(2,'Barang Mengandung Cairan','2021-12-14 22:55:03',NULL),(3,'Barang Terlalu Besar','2021-12-14 22:55:03',NULL);
/*!40000 ALTER TABLE `reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `review` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_wish_id_idx` (`wish_id`),
  CONSTRAINT `fk_review_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_review_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin','2021-12-14 22:23:14',NULL),(2,'user','2021-12-14 22:23:25',NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipper`
--

DROP TABLE IF EXISTS `shipper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipper`
--

LOCK TABLES `shipper` WRITE;
/*!40000 ALTER TABLE `shipper` DISABLE KEYS */;
INSERT INTO `shipper` VALUES (1,'JNE','Domestic','2021-12-14 22:29:52',NULL),(2,'JNT','Domestic','2021-12-14 22:29:52',NULL),(3,'Si Cepat','Domestic','2021-12-14 22:29:52',NULL),(4,'Anter Aja','Domestic','2021-12-14 22:29:52',NULL),(5,'DHL','International','2021-12-14 22:29:52',NULL),(6,'UPS','International','2021-12-14 22:29:52',NULL),(7,'FedEx','International','2021-12-14 22:29:52',NULL),(8,'TNT','International','2021-12-14 22:29:52',NULL);
/*!40000 ALTER TABLE `shipper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_transaksi`
--

DROP TABLE IF EXISTS `status_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_transaksi` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_transaksi`
--

LOCK TABLES `status_transaksi` WRITE;
/*!40000 ALTER TABLE `status_transaksi` DISABLE KEYS */;
INSERT INTO `status_transaksi` VALUES (1,'Menunggu Pembayaran','2021-12-14 22:47:31',NULL),(2,'Menunggu Tenggat Waktu','2021-12-14 22:47:31',NULL),(3,'Sedang Diproses','2021-12-14 22:47:31',NULL),(4,'Sedang Dikirim','2021-12-14 22:47:31',NULL),(5,'Sampai Tujuan','2021-12-14 22:47:31',NULL),(6,'Dibatalkan','2021-12-14 22:47:31',NULL);
/*!40000 ALTER TABLE `status_transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_wish`
--

DROP TABLE IF EXISTS `status_wish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_wish` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_by` datetime NOT NULL,
  `updated_by` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_wish`
--

LOCK TABLES `status_wish` WRITE;
/*!40000 ALTER TABLE `status_wish` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_wish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_status_transaksi`
--

DROP TABLE IF EXISTS `sub_status_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_status_transaksi` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_status_transaksi`
--

LOCK TABLES `sub_status_transaksi` WRITE;
/*!40000 ALTER TABLE `sub_status_transaksi` DISABLE KEYS */;
INSERT INTO `sub_status_transaksi` VALUES (1,'Pembayaran Diverifikasi','2021-12-14 22:53:32',NULL),(2,'Sedang Diproses Admin','2021-12-14 22:53:32',NULL),(3,'Pemrosesan Gagal','2021-12-14 22:53:32',NULL),(4,'Berangkat dari Lokasi Penjual','2021-12-14 22:53:32',NULL),(5,'Sampai Gudang','2021-12-14 22:53:32',NULL),(6,'Sudah Dibungkus','2021-12-14 22:53:32',NULL),(7,'Menunggu Pickup','2021-12-14 22:53:32',NULL),(8,'Sudah Dikirim','2021-12-14 22:53:32',NULL),(9,'Sudah Sampai Tujuan','2021-12-14 22:53:32',NULL),(10,'Transaksi Dikonfirmasi','2021-12-14 22:53:32',NULL),(11,'Transaksi Selesai','2021-12-14 22:53:32',NULL),(12,'Transaksi Dibatalkan','2021-12-14 22:53:33',NULL);
/*!40000 ALTER TABLE `sub_status_transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `process_date` datetime DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `finished_date` datetime DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_wish_id_idx` (`wish_id`),
  KEY `fk_shipper_id_idx` (`shipper_id`),
  CONSTRAINT `fk_transaction_shipper_id` FOREIGN KEY (`shipper_id`) REFERENCES `shipper` (`id`),
  CONSTRAINT `fk_transaction_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_transaction_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `bod` datetime NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `disable` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role_id_idx` (`role_id`),
  CONSTRAINT `fk_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wish`
--

DROP TABLE IF EXISTS `wish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `curr_qty` int(11) DEFAULT NULL,
  `target_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_created_by_idx` (`created_by`),
  KEY `fk_approved_by_idx` (`approved_by`),
  KEY `fk_category_id_idx` (`category_id`),
  KEY `fk_reason_id_idx` (`reason_id`),
  KEY `fk_status_id_idx` (`status`),
  CONSTRAINT `fk_wish_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_wish_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_wish_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_wish_reason_id` FOREIGN KEY (`reason_id`) REFERENCES `reason` (`id`),
  CONSTRAINT `fk_wish_status_id` FOREIGN KEY (`status`) REFERENCES `status_transaksi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wish`
--

LOCK TABLES `wish` WRITE;
/*!40000 ALTER TABLE `wish` DISABLE KEYS */;
/*!40000 ALTER TABLE `wish` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-14 22:55:36
