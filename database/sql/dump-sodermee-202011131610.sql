-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: sodermee
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `subkategori_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'14.1.1','Sodermee Luminous Day Cream',3,2,1,'2020-10-28 08:03:54','2020-10-28 08:03:54',NULL),(2,'14.1.2','Sodermee Luminous Night Cream',4,2,5,'2020-10-28 08:13:52','2020-10-28 08:13:52',NULL),(3,'14.1.5','Sodermee Luminous Serum',3,2,3,'2020-11-13 08:48:50','2020-11-13 08:48:50',NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_kirim`
--

DROP TABLE IF EXISTS `barang_kirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_kirim` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kirim_barang_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `jumlah_kurang` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_kirim`
--

LOCK TABLES `barang_kirim` WRITE;
/*!40000 ALTER TABLE `barang_kirim` DISABLE KEYS */;
INSERT INTO `barang_kirim` VALUES (2,2,1,1,0,'close','2020-11-13 05:41:33','2020-11-13 06:59:25',NULL),(3,3,1,1,0,'close','2020-11-13 05:44:08','2020-11-13 06:59:58',NULL),(4,4,1,249,0,'close','2020-11-13 05:44:27','2020-11-13 07:00:24',NULL),(5,5,2,234,0,'close','2020-11-13 08:17:54','2020-11-13 08:18:48',NULL),(6,6,2,500,0,'close','2020-11-13 08:30:29','2020-11-13 08:31:19',NULL),(7,7,2,811,411,'close','2020-11-13 08:31:50','2020-11-13 08:32:38',NULL),(8,8,2,411,0,'close','2020-11-13 08:33:15','2020-11-13 08:34:08',NULL);
/*!40000 ALTER TABLE `barang_kirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_penjualan`
--

DROP TABLE IF EXISTS `barang_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint(20) unsigned NOT NULL,
  `barang_id` bigint(20) unsigned NOT NULL,
  `harga` bigint(20) unsigned NOT NULL,
  `jumlah` bigint(20) unsigned NOT NULL,
  `subtotal` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_penjualan`
--

LOCK TABLES `barang_penjualan` WRITE;
/*!40000 ALTER TABLE `barang_penjualan` DISABLE KEYS */;
INSERT INTO `barang_penjualan` VALUES (1,6,2,0,5,165000,'2020-11-03 15:41:20','2020-11-03 15:41:20',NULL),(2,6,1,0,10,240000,'2020-11-03 15:41:20','2020-11-03 15:41:20',NULL),(3,7,2,33000,10,330000,'2020-11-03 15:47:52','2020-11-03 15:47:52',NULL),(4,7,1,24000,11,264000,'2020-11-03 15:47:52','2020-11-03 15:47:52',NULL),(5,8,2,33000,6,198000,'2020-11-03 15:58:43','2020-11-03 15:58:43',NULL),(6,8,1,24000,7,168000,'2020-11-03 15:58:43','2020-11-03 15:58:43',NULL),(7,9,2,33000,6,198000,'2020-11-03 16:01:36','2020-11-03 16:01:36',NULL),(8,9,1,24000,7,168000,'2020-11-03 16:01:36','2020-11-03 16:01:36',NULL),(9,10,2,33000,6,198000,'2020-11-03 16:02:32','2020-11-03 16:02:32',NULL),(10,10,1,24000,7,168000,'2020-11-03 16:02:32','2020-11-03 16:02:32',NULL),(11,11,2,33000,6,198000,'2020-11-03 16:08:39','2020-11-03 16:08:39',NULL),(12,11,1,24000,7,168000,'2020-11-03 16:08:39','2020-11-03 16:08:39',NULL),(13,12,2,33000,6,198000,'2020-11-03 16:08:57','2020-11-03 16:08:57',NULL),(14,12,1,24000,7,168000,'2020-11-03 16:08:57','2020-11-03 16:08:57',NULL),(15,13,2,33000,6,198000,'2020-11-03 16:09:33','2020-11-03 16:09:33',NULL),(16,13,1,24000,7,168000,'2020-11-03 16:09:33','2020-11-03 16:09:33',NULL),(17,14,2,33000,6,198000,'2020-11-03 16:09:45','2020-11-03 16:09:45',NULL),(18,14,1,24000,7,168000,'2020-11-03 16:09:45','2020-11-03 16:09:45',NULL),(19,15,2,33000,6,198000,'2020-11-03 16:10:27','2020-11-03 16:10:27',NULL),(20,15,1,24000,7,168000,'2020-11-03 16:10:27','2020-11-03 16:10:27',NULL),(21,16,2,33000,6,198000,'2020-11-03 16:11:52','2020-11-03 16:11:52',NULL),(22,16,1,24000,7,168000,'2020-11-03 16:11:52','2020-11-03 16:11:52',NULL),(23,17,1,24000,7,168000,'2020-11-03 16:27:36','2020-11-03 16:27:36',NULL),(24,17,2,33000,7,231000,'2020-11-03 16:27:36','2020-11-03 16:27:36',NULL),(25,18,1,24000,7,168000,'2020-11-03 16:28:07','2020-11-03 16:28:07',NULL),(26,18,2,33000,7,231000,'2020-11-03 16:28:07','2020-11-03 16:28:07',NULL),(27,19,1,24000,7,168000,'2020-11-03 16:28:26','2020-11-03 16:28:26',NULL),(28,19,2,33000,7,231000,'2020-11-03 16:28:26','2020-11-03 16:28:26',NULL),(29,20,1,24000,7,168000,'2020-11-03 16:29:07','2020-11-03 16:29:07',NULL),(30,20,2,33000,7,231000,'2020-11-03 16:29:07','2020-11-03 16:29:07',NULL),(31,21,1,24000,7,168000,'2020-11-03 16:29:12','2020-11-03 16:29:12',NULL),(32,21,2,33000,7,231000,'2020-11-03 16:29:12','2020-11-03 16:29:12',NULL),(33,22,1,24000,7,168000,'2020-11-03 16:30:35','2020-11-03 16:30:35',NULL),(34,22,2,33000,7,231000,'2020-11-03 16:30:35','2020-11-03 16:30:35',NULL),(35,23,2,33000,5,165000,'2020-11-03 16:32:44','2020-11-03 16:32:44',NULL),(36,23,1,24000,5,120000,'2020-11-03 16:32:44','2020-11-03 16:32:44',NULL),(37,24,2,33000,5,165000,'2020-11-03 16:35:41','2020-11-03 16:35:41',NULL),(38,24,1,24000,5,120000,'2020-11-03 16:35:41','2020-11-03 16:35:41',NULL),(39,25,2,33000,5,165000,'2020-11-03 16:36:11','2020-11-03 16:36:11',NULL),(40,25,1,24000,5,120000,'2020-11-03 16:36:11','2020-11-03 16:36:11',NULL),(41,26,2,33000,5,165000,'2020-11-03 16:36:27','2020-11-03 16:36:27',NULL),(42,26,1,24000,5,120000,'2020-11-03 16:36:27','2020-11-03 16:36:27',NULL),(43,27,2,33000,5,165000,'2020-11-03 16:36:38','2020-11-03 16:36:38',NULL),(44,27,1,24000,5,120000,'2020-11-03 16:36:38','2020-11-03 16:36:38',NULL),(45,28,2,33000,5,165000,'2020-11-03 16:38:48','2020-11-03 16:38:48',NULL),(46,28,1,24000,5,120000,'2020-11-03 16:38:48','2020-11-03 16:38:48',NULL),(47,29,2,33000,5,165000,'2020-11-03 16:39:18','2020-11-03 16:39:18',NULL),(48,29,1,24000,5,120000,'2020-11-03 16:39:18','2020-11-03 16:39:18',NULL),(49,30,2,33000,5,165000,'2020-11-03 16:39:32','2020-11-03 16:39:32',NULL),(50,30,1,24000,5,120000,'2020-11-03 16:39:32','2020-11-03 16:39:32',NULL),(51,31,2,33000,5,165000,'2020-11-03 16:40:46','2020-11-03 16:40:46',NULL),(52,31,1,24000,5,120000,'2020-11-03 16:40:46','2020-11-03 16:40:46',NULL),(53,32,2,33000,5,165000,'2020-11-03 17:47:00','2020-11-03 17:47:00',NULL),(54,32,1,24000,5,120000,'2020-11-03 17:47:00','2020-11-03 17:47:00',NULL),(55,33,2,33000,5,165000,'2020-11-03 17:50:53','2020-11-03 17:50:53',NULL),(56,33,1,24000,10,240000,'2020-11-03 17:50:53','2020-11-03 17:50:53',NULL),(57,34,2,33000,16,528000,'2020-11-03 17:57:13','2020-11-03 17:57:13',NULL),(58,34,1,24000,9,216000,'2020-11-03 17:57:13','2020-11-03 17:57:13',NULL),(59,35,2,33000,8,264000,'2020-11-03 18:33:55','2020-11-03 18:33:55',NULL),(60,35,1,24000,10,240000,'2020-11-03 18:33:55','2020-11-03 18:33:55',NULL),(61,36,2,33000,7,231000,'2020-11-03 18:41:23','2020-11-03 18:41:23',NULL),(62,37,2,33000,8,264000,'2020-11-04 09:07:23','2020-11-04 09:07:23',NULL),(63,37,1,24000,9,216000,'2020-11-04 09:07:23','2020-11-04 09:07:23',NULL),(64,38,2,33000,10,330000,'2020-11-05 07:04:46','2020-11-05 07:04:46',NULL),(65,38,1,24000,2,48000,'2020-11-05 07:04:46','2020-11-05 07:04:46',NULL),(66,39,2,33000,8,264000,'2020-11-05 07:20:19','2020-11-05 07:20:19',NULL),(67,40,1,24000,12,288000,'2020-11-05 07:21:57','2020-11-05 07:21:57',NULL),(68,41,1,24000,7,168000,'2020-11-05 07:24:19','2020-11-05 07:24:19',NULL),(69,42,2,33000,191,6303000,'2020-11-05 07:28:26','2020-11-05 07:28:26',NULL),(70,43,1,24000,126,3024000,'2020-11-05 08:53:05','2020-11-05 08:53:05',NULL),(71,44,1,24000,50,1200000,'2020-11-09 17:07:41','2020-11-09 17:07:41',NULL),(72,45,1,24000,32,768000,'2020-11-09 17:08:37','2020-11-09 17:08:37',NULL),(73,46,2,33000,100,3300000,'2020-11-13 08:52:00','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `barang_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_retur`
--

DROP TABLE IF EXISTS `barang_retur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_retur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `retur_barang_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `jumlah_kurang` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_retur`
--

LOCK TABLES `barang_retur` WRITE;
/*!40000 ALTER TABLE `barang_retur` DISABLE KEYS */;
INSERT INTO `barang_retur` VALUES (1,3,1,88,88,'open','2020-11-13 08:39:48','2020-11-13 08:39:48',NULL),(2,3,2,545,545,'open','2020-11-13 08:39:48','2020-11-13 08:39:48',NULL);
/*!40000 ALTER TABLE `barang_retur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_terima`
--

DROP TABLE IF EXISTS `barang_terima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_terima` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terima_barang_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `jumlah_kurang` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_terima`
--

LOCK TABLES `barang_terima` WRITE;
/*!40000 ALTER TABLE `barang_terima` DISABLE KEYS */;
INSERT INTO `barang_terima` VALUES (2,2,1,1,1,'open','2020-11-13 06:56:53','2020-11-13 06:56:53',NULL),(3,3,1,1,1,'open','2020-11-13 06:59:52','2020-11-13 06:59:52',NULL),(4,4,1,249,249,'open','2020-11-13 07:00:19','2020-11-13 07:00:19',NULL),(5,5,2,234,234,'open','2020-11-13 08:18:40','2020-11-13 08:18:40',NULL),(6,6,2,500,500,'open','2020-11-13 08:31:14','2020-11-13 08:31:14',NULL),(7,7,2,400,400,'open','2020-11-13 08:32:33','2020-11-13 08:32:33',NULL),(8,8,2,411,411,'open','2020-11-13 08:33:55','2020-11-13 08:33:55',NULL);
/*!40000 ALTER TABLE `barang_terima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bintang`
--

DROP TABLE IF EXISTS `bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bintang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_id` int(10) unsigned NOT NULL,
  `bintang` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bintang`
--

LOCK TABLES `bintang` WRITE;
/*!40000 ALTER TABLE `bintang` DISABLE KEYS */;
INSERT INTO `bintang` VALUES (5,1,384,'2020-11-03 16:40:46','2020-11-05 08:53:05',NULL),(6,2,95,'2020-11-03 17:47:00','2020-11-05 07:20:19',NULL),(7,3,86,'2020-11-03 17:50:53','2020-11-09 17:08:37',NULL),(8,10,180,'2020-11-09 17:07:41','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_purchase_order`
--

DROP TABLE IF EXISTS `detail_purchase_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_purchase_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `jumlah_kurang` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_purchase_order`
--

LOCK TABLES `detail_purchase_order` WRITE;
/*!40000 ALTER TABLE `detail_purchase_order` DISABLE KEYS */;
INSERT INTO `detail_purchase_order` VALUES (1,2,1,1,0,'Close','2020-11-13 05:14:57','2020-11-13 05:43:32',NULL),(2,3,1,1,0,'Close','2020-11-13 05:15:18','2020-11-13 05:44:14',NULL),(4,4,1,249,0,'Close','2020-11-13 05:27:07','2020-11-13 05:44:33',NULL),(5,5,2,234,0,'Close','2020-11-13 08:07:14','2020-11-13 08:18:02',NULL),(6,6,2,1311,0,'Close','2020-11-13 08:27:48','2020-11-13 08:33:20',NULL);
/*!40000 ALTER TABLE `detail_purchase_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `harga`
--

DROP TABLE IF EXISTS `harga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `harga` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `harga`
--

LOCK TABLES `harga` WRITE;
/*!40000 ALTER TABLE `harga` DISABLE KEYS */;
INSERT INTO `harga` VALUES (1,1,24000,'2020-10-28 08:31:07','2020-10-28 08:31:07',NULL),(2,2,33000,'2020-11-02 17:24:34','2020-11-02 17:24:34',NULL),(3,3,0,'2020-11-13 08:48:50','2020-11-13 08:48:50',NULL);
/*!40000 ALTER TABLE `harga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'CUSTOMER SERVICE','2020-11-01 05:13:16','2020-11-01 05:13:16',NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kartu_stok_penjualan`
--

DROP TABLE IF EXISTS `kartu_stok_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kartu_stok_penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `penjualan_id` int(10) unsigned NOT NULL,
  `stok_awal` int(10) unsigned NOT NULL,
  `masuk` int(10) unsigned NOT NULL,
  `keluar` int(10) unsigned NOT NULL,
  `stok_akhir` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kartu_stok_penjualan`
--

LOCK TABLES `kartu_stok_penjualan` WRITE;
/*!40000 ALTER TABLE `kartu_stok_penjualan` DISABLE KEYS */;
INSERT INTO `kartu_stok_penjualan` VALUES (1,1,1,55,0,5,50,'2020-11-01','2020-11-01 06:30:51','2020-11-01 06:30:51',NULL);
/*!40000 ALTER TABLE `kartu_stok_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kartu_stok_penyesuaian`
--

DROP TABLE IF EXISTS `kartu_stok_penyesuaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kartu_stok_penyesuaian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `penyesuaian_id` int(10) unsigned NOT NULL,
  `stok_awal` int(10) unsigned NOT NULL,
  `masuk` int(10) unsigned NOT NULL,
  `keluar` int(10) unsigned NOT NULL,
  `stok_akhir` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kartu_stok_penyesuaian`
--

LOCK TABLES `kartu_stok_penyesuaian` WRITE;
/*!40000 ALTER TABLE `kartu_stok_penyesuaian` DISABLE KEYS */;
INSERT INTO `kartu_stok_penyesuaian` VALUES (1,1,1,211,0,11,200,'2020-11-01','2020-11-01 09:03:21','2020-11-01 09:03:21',NULL);
/*!40000 ALTER TABLE `kartu_stok_penyesuaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kartu_stok_retur_barang`
--

DROP TABLE IF EXISTS `kartu_stok_retur_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kartu_stok_retur_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `retur_barang_id` int(10) unsigned NOT NULL,
  `stok_awal` int(10) unsigned NOT NULL,
  `retur` int(10) unsigned NOT NULL,
  `stok_akhir` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kartu_stok_retur_barang`
--

LOCK TABLES `kartu_stok_retur_barang` WRITE;
/*!40000 ALTER TABLE `kartu_stok_retur_barang` DISABLE KEYS */;
INSERT INTO `kartu_stok_retur_barang` VALUES (1,1,1,42,12,30,'2020-11-01','2020-11-01 06:45:26','2020-11-01 06:45:26',NULL);
/*!40000 ALTER TABLE `kartu_stok_retur_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kartu_stok_terima_barang`
--

DROP TABLE IF EXISTS `kartu_stok_terima_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kartu_stok_terima_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `terima_barang_id` int(10) unsigned NOT NULL,
  `stok_awal` int(10) unsigned NOT NULL,
  `masuk` int(10) unsigned NOT NULL,
  `keluar` int(10) unsigned NOT NULL,
  `stok_akhir` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kartu_stok_terima_barang`
--

LOCK TABLES `kartu_stok_terima_barang` WRITE;
/*!40000 ALTER TABLE `kartu_stok_terima_barang` DISABLE KEYS */;
INSERT INTO `kartu_stok_terima_barang` VALUES (1,2,1,55,200,0,255,'2020-11-01','2020-11-01 06:38:58','2020-11-01 06:38:58',NULL);
/*!40000 ALTER TABLE `kartu_stok_terima_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_barang`
--

LOCK TABLES `kategori_barang` WRITE;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` VALUES (1,'Body','2020-10-28 07:48:03','2020-10-28 07:48:03',NULL),(2,'Face','2020-10-28 07:48:11','2020-10-28 07:48:11',NULL),(3,'Hand','2020-10-28 08:01:05','2020-10-28 08:01:05',NULL);
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kirim_barang`
--

DROP TABLE IF EXISTS `kirim_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kirim_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) unsigned NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `tanggal_kirim` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kirim_barang`
--

LOCK TABLES `kirim_barang` WRITE;
/*!40000 ALTER TABLE `kirim_barang` DISABLE KEYS */;
INSERT INTO `kirim_barang` VALUES (2,2,'KB-2011-0000',1,1,'2020-11-13 12:11:53','Close','2020-11-13 05:41:15','2020-11-13 06:59:25',NULL),(3,3,'KB-2011-0001',1,1,'2020-11-13 12:11:14','Close','2020-11-13 05:44:07','2020-11-13 06:59:58',NULL),(4,4,'KB-2011-0002',1,1,'2020-11-13 12:11:33','Close','2020-11-13 05:44:26','2020-11-13 07:00:24',NULL),(5,5,'KB-2011-0003',1,1,'2020-11-13 15:11:02','Close','2020-11-13 08:17:53','2020-11-13 08:18:48',NULL),(6,6,'KB-2011-0004',1,1,'2020-11-13 15:11:38','Close','2020-11-13 08:30:28','2020-11-13 08:31:19',NULL),(7,6,'KB-2011-0005',1,1,'2020-11-13 15:11:56','Close','2020-11-13 08:31:49','2020-11-13 08:32:38',NULL),(8,6,'KB-2011-0006',1,1,'2020-11-13 15:11:20','Close','2020-11-13 08:33:14','2020-11-13 08:34:08',NULL);
/*!40000 ALTER TABLE `kirim_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'KOTA SURABAYA','2020-10-25 09:13:26','2020-10-25 09:13:36',NULL);
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_mitra`
--

DROP TABLE IF EXISTS `level_mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level_mitra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_mitra`
--

LOCK TABLES `level_mitra` WRITE;
/*!40000 ALTER TABLE `level_mitra` DISABLE KEYS */;
INSERT INTO `level_mitra` VALUES (1,'reseller','RESELLER','2020-10-22 10:57:20','2020-10-28 09:17:36',NULL),(2,'distributor','DISTRIBUTOR','2020-10-22 10:57:34','2020-10-28 09:17:46',NULL),(3,'agen','AGEN','2020-10-22 10:57:41','2020-10-28 09:17:55',NULL),(4,'dropshipper','DROPSHIPPER','2020-11-03 17:43:49','2020-11-03 17:43:49',NULL);
/*!40000 ALTER TABLE `level_mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_bintang`
--

DROP TABLE IF EXISTS `log_bintang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_bintang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_id` bigint(20) unsigned NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_bintang`
--

LOCK TABLES `log_bintang` WRITE;
/*!40000 ALTER TABLE `log_bintang` DISABLE KEYS */;
INSERT INTO `log_bintang` VALUES (1,10,'penjualan',48,'2020-11-09 17:07:41','2020-11-09 17:07:41',NULL),(2,3,'penjualan',31,'2020-11-09 17:08:37','2020-11-09 17:08:37',NULL),(3,10,'penjualan',132,'2020-11-13 08:52:00','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `log_bintang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_poin`
--

DROP TABLE IF EXISTS `log_poin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_poin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_id` bigint(20) unsigned NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_poin`
--

LOCK TABLES `log_poin` WRITE;
/*!40000 ALTER TABLE `log_poin` DISABLE KEYS */;
INSERT INTO `log_poin` VALUES (1,10,'penjualan',48,'2020-11-09 17:07:41','2020-11-09 17:07:41',NULL),(2,3,'penjualan',31,'2020-11-09 17:08:37','2020-11-09 17:08:37',NULL),(3,10,'penjualan',132,'2020-11-13 08:52:00','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `log_poin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_10_15_084448_create_media_table',1),(5,'2020_10_19_142809_create_permission_tables',1),(7,'2020_10_20_074505_create_barang_table',3),(8,'2020_10_20_075528_create_barang_table',4),(9,'2020_10_20_080013_create_satuan_barang_table',5),(10,'2020_10_20_080118_create_kategori_barang_table',6),(11,'2020_10_20_080219_create_subkategori_barang_table',7),(12,'2020_10_20_081034_create_supplier_table',8),(13,'2020_10_20_081749_create_mitra_table',9),(14,'2020_10_21_053336_create_purchase_order_table',10),(15,'2020_10_21_053824_create_kirim_barang_table',11),(16,'2020_10_21_054241_create_terima_barang_table',12),(17,'2020_10_21_054730_create_retur_barang_table',13),(18,'2020_10_21_060156_create_promo_table',14),(19,'2020_10_21_060530_create_harga_table',15),(20,'2020_10_21_061134_create_stok_table',16),(21,'2020_10_21_073004_create_kartu_stok_penjualan_table',17),(22,'2020_10_21_073312_create_kartu_stok_terima_barang_table',18),(23,'2020_10_21_074435_create_kartu_stok_retur_barang_table',19),(24,'2020_10_21_074921_create_kartu_stok_penyesuaian_table',20),(25,'2020_10_21_081107_create_penjualan_table',21),(26,'2020_10_21_082332_create_parameter_table',22),(27,'2020_10_22_161056_create_poin_table',23),(28,'2020_10_22_174212_create_bintang_table',24),(29,'2020_10_22_174850_create_referral_table',25),(30,'2020_10_22_175604_create_level_mitra_table',26),(31,'2020_10_25_160543_create_kota_table',27),(32,'2020_10_25_161154_create_pekerjaan_table',28),(35,'2020_10_20_072945_create_pelanggan_table',29),(36,'2020_10_26_170458_create_detail_penjualan_table',30),(37,'2020_10_26_172411_create_detail_pelanggan_table',31),(38,'2020_11_01_115509_create_pegawai_table',32),(39,'2020_11_01_120111_create_jabatan_table',33),(40,'2020_11_01_152833_create_penyesuaian_stok_table',34),(41,'2020_11_03_222634_create_barang_penjualan_table',35),(42,'2020_11_09_233742_create_log_poin_table',36),(43,'2020_11_09_234215_create_log_bintang_table',37),(44,'2020_10_27_163702_create_detail_purchase_order_table',38),(45,'2020_11_03_115048_create_barang_kirim_table',39),(46,'2020_11_03_122347_create_barang_terima_table',40),(47,'2020_11_10_130415_create_barang_retur_table',41);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan_id` int(10) unsigned NOT NULL,
  `level_mitra_id` bigint(20) unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `referral_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES (1,'M109876',1,2,'2020-10-28','2020-12-31',NULL,NULL,'2020-10-28 09:19:44','2020-10-28 09:19:44',NULL),(2,'M827827',2,4,'2020-11-04','2021-02-04',NULL,NULL,'2020-11-03 17:44:45','2020-11-03 17:44:45',NULL),(3,'M7645367',3,4,'2020-11-04','2021-02-04',NULL,NULL,'2020-11-03 17:45:16','2020-11-03 17:45:16',NULL),(4,'MT78617648',4,3,'2020-11-05','2020-11-05',NULL,NULL,'2020-11-05 11:21:01','2020-11-05 11:36:35','2020-11-05 11:36:35'),(5,'P0001',4,1,'2020-11-05','2020-11-29',NULL,NULL,'2020-11-05 11:49:50','2020-11-09 14:38:19','2020-11-09 14:38:19'),(6,'M8478398',4,4,'2020-11-09','2021-02-09',NULL,NULL,'2020-11-09 14:39:00','2020-11-09 14:40:09','2020-11-09 14:40:09'),(7,'M02938738',4,4,'2020-11-09','2021-02-09',13,NULL,'2020-11-09 14:44:02','2020-11-09 15:21:36','2020-11-09 15:21:36'),(8,'M82729283',4,1,'2020-11-09','2021-01-09',14,NULL,'2020-11-09 15:22:25','2020-11-09 15:22:47','2020-11-09 15:22:47'),(9,'M2873849',4,1,'2020-11-09','2021-02-09',15,NULL,'2020-11-09 15:23:22','2020-11-09 15:24:17','2020-11-09 15:24:17'),(10,'M0829019',4,1,'2020-11-09','2021-03-09',16,2,'2020-11-09 15:25:41','2020-11-13 08:53:26','2020-11-13 08:53:26'),(11,'M8372820',4,1,'2020-11-13','2021-01-13',17,2,'2020-11-13 08:54:32','2020-11-13 08:54:32',NULL);
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2),(2,'App\\User',8),(2,'App\\User',9),(2,'App\\User',17);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter`
--

DROP TABLE IF EXISTS `parameter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter`
--

LOCK TABLES `parameter` WRITE;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` VALUES (1,'kurs_poin','25000','2020-10-21 01:26:25','2020-11-03 15:52:00',NULL),(2,'kuota_mitra','250','2020-10-21 01:26:40','2020-10-21 01:26:40',NULL),(3,'level_mitra','0','2020-10-21 01:26:55','2020-10-21 01:26:55',NULL),(4,'periode_mitra','3 Bulan','2020-10-21 01:27:13','2020-10-21 01:28:07',NULL),(5,'komisi_referral','10%','2020-10-21 01:27:50','2020-10-21 01:27:50',NULL),(6,'kurs_bintang','25000','2020-11-03 15:51:50','2020-11-03 15:51:50',NULL);
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,'PEG0001','DANILLA RIYADI','1988-03-01','Ngagel, Surabaya','081786765654',1,'2020-11-01 05:26:32','2020-11-01 14:33:11',NULL);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pekerjaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pekerjaan`
--

LOCK TABLES `pekerjaan` WRITE;
/*!40000 ALTER TABLE `pekerjaan` DISABLE KEYS */;
INSERT INTO `pekerjaan` VALUES (1,'KARYAWAN SWASTA','2020-10-25 09:13:04','2020-10-25 09:13:04',NULL),(2,'WIRASWASTA','2020-10-25 10:21:23','2020-10-25 10:21:23',NULL);
/*!40000 ALTER TABLE `pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan_id` bigint(20) unsigned NOT NULL,
  `kota_id` bigint(20) unsigned NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,'74839309','8188463069397409','ABDUL GOFARO BILLAH','Laki-laki','1980-08-25',2,1,'KENJERAN','081786765654','081786765654','2020-10-25','2020-10-25 09:59:29','2020-10-25 10:45:59',NULL),(2,'8764763','73847918237401837098','APRILIA FITRI','Perempuan','1991-06-06',2,1,'GUBENG','081764773727','081746737727','2020-11-04','2020-11-03 17:39:42','2020-11-03 17:39:42',NULL),(3,'71837463','10410374938749182374','HILMY NAUFAL KARIIM','Laki-laki','1992-05-04',1,1,'BALAS KLUMPRIK','081410115329','081786765654','2020-11-04','2020-11-03 17:43:20','2020-11-03 17:43:20',NULL),(4,'7161719','75482009384029840','ARSA NAJANDRA','Laki-laki','1990-06-01',2,1,'KETINTANG','0816563566377','0817467637467','2020-11-05','2020-11-05 11:19:41','2020-11-05 11:19:54',NULL);
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelanggan_id` int(10) unsigned DEFAULT NULL,
  `mitra_id` bigint(20) unsigned DEFAULT NULL,
  `ppn` int(10) unsigned DEFAULT NULL,
  `diskon` int(10) unsigned DEFAULT NULL,
  `total` bigint(20) unsigned DEFAULT NULL,
  `bayar` bigint(20) unsigned DEFAULT NULL,
  `kembali` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (1,'P0001',1,NULL,10,10,80000,80000,NULL,'2020-11-01 06:30:07','2020-11-01 06:30:07',NULL),(2,'P0003',1,1,0,0,237000,80000,20000,'2020-11-03 15:39:36','2020-11-03 15:39:36',NULL),(3,'P0003',1,1,0,0,237000,80000,20000,'2020-11-03 15:39:58','2020-11-03 15:39:58',NULL),(4,'P0003',1,1,0,0,237000,80000,20000,'2020-11-03 15:40:59','2020-11-03 15:40:59',NULL),(5,'P0003',1,1,0,0,237000,80000,20000,'2020-11-03 15:41:13','2020-11-03 15:41:13',NULL),(6,'P0003',1,1,0,0,237000,80000,20000,'2020-11-03 15:41:20','2020-11-03 15:41:20',NULL),(7,'P0001',1,1,0,0,237000,80000,20000,'2020-11-03 15:47:52','2020-11-03 15:47:52',NULL),(8,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 15:58:43','2020-11-03 15:58:43',NULL),(9,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:01:36','2020-11-03 16:01:36',NULL),(10,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:02:32','2020-11-03 16:02:32',NULL),(11,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:08:39','2020-11-03 16:08:39',NULL),(12,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:08:57','2020-11-03 16:08:57',NULL),(13,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:09:33','2020-11-03 16:09:33',NULL),(14,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:09:45','2020-11-03 16:09:45',NULL),(15,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:10:27','2020-11-03 16:10:27',NULL),(16,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:11:52','2020-11-03 16:11:52',NULL),(17,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:27:36','2020-11-03 16:27:36',NULL),(18,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:28:07','2020-11-03 16:28:07',NULL),(19,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:28:26','2020-11-03 16:28:26',NULL),(20,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:29:07','2020-11-03 16:29:07',NULL),(21,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:29:12','2020-11-03 16:29:12',NULL),(22,'P0001',1,1,0,0,77000,109000,20000,'2020-11-03 16:30:35','2020-11-03 16:30:35',NULL),(23,'P0001',1,1,0,10,70000,20000,20000,'2020-11-03 16:32:44','2020-11-03 16:32:44',NULL),(24,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:35:41','2020-11-03 16:35:41',NULL),(25,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:36:11','2020-11-03 16:36:11',NULL),(26,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:36:27','2020-11-03 16:36:27',NULL),(27,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:36:38','2020-11-03 16:36:38',NULL),(28,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:38:48','2020-11-03 16:38:48',NULL),(29,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:39:18','2020-11-03 16:39:18',NULL),(30,'P0001',1,1,0,10,77000,20000,20000,'2020-11-03 16:39:32','2020-11-03 16:39:32',NULL),(31,'P0001',1,1,0,10,237000,109000,20000,'2020-11-03 16:40:46','2020-11-03 16:40:46',NULL),(32,'PJ71817848',2,2,0,0,1455000,1455000,0,'2020-11-03 17:46:59','2020-11-03 17:46:59',NULL),(33,'PJ817171617',3,3,0,0,1215000,1215000,1215000,'2020-11-03 17:50:53','2020-11-03 17:50:53',NULL),(34,'PJ837837',2,2,0,0,744000,744000,744000,'2020-11-03 17:57:13','2020-11-03 17:57:13',NULL),(35,'PJ8378276',2,3,10,10,498960,498960,0,'2020-11-03 18:33:55','2020-11-03 18:33:55',NULL),(36,'PJ9873979',2,2,10,10,228690,229000,310,'2020-11-03 18:41:23','2020-11-03 18:41:23',NULL),(37,'PJ00009839',2,2,10,10,475200,476000,800,'2020-11-04 09:07:23','2020-11-04 09:07:23',NULL),(38,'P0001',2,2,10,10,374220,375000,780,'2020-11-05 07:04:46','2020-11-05 07:04:46',NULL),(39,'P0001',2,2,10,10,261360,262000,640,'2020-11-05 07:20:19','2020-11-05 07:20:19',NULL),(40,'PJ8272828',3,3,10,5,300960,301000,40,'2020-11-05 07:21:57','2020-11-05 07:21:57',NULL),(41,'P0001',3,3,10,10,166320,170000,3680,'2020-11-05 07:24:19','2020-11-05 07:24:19',NULL),(42,'P0001',1,1,10,10,6239970,6240000,30,'2020-11-05 07:28:26','2020-11-05 07:28:26',NULL),(43,'P0001',1,1,10,10,2993760,3000000,6240,'2020-11-05 08:53:05','2020-11-05 08:53:05',NULL),(44,'P98171918',4,10,0,0,1200000,1200000,0,'2020-11-09 17:07:41','2020-11-09 17:07:41',NULL),(45,'P8782748347',3,3,0,0,768000,768000,0,'2020-11-09 17:08:37','2020-11-09 17:08:37',NULL),(46,'P000222c3',4,10,10,10,3267000,3267000,0,'2020-11-13 08:52:00','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyesuaian_stok`
--

DROP TABLE IF EXISTS `penyesuaian_stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penyesuaian_stok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `stok_database` int(10) unsigned NOT NULL,
  `stok_lapangan` int(10) unsigned NOT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyesuaian_stok`
--

LOCK TABLES `penyesuaian_stok` WRITE;
/*!40000 ALTER TABLE `penyesuaian_stok` DISABLE KEYS */;
INSERT INTO `penyesuaian_stok` VALUES (1,'PS0001',2,211,200,'Keluar',11,'2020-11-01','2020-11-01 08:48:19','2020-11-01 08:56:48',NULL);
/*!40000 ALTER TABLE `penyesuaian_stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (2,'pelanggan.index','web','2020-10-21 02:52:11','2020-10-21 02:52:11'),(3,'pelanggan.create','web','2020-10-21 02:53:30','2020-10-21 02:53:30'),(4,'pelanggan.store','web','2020-10-21 02:53:39','2020-10-21 02:53:39'),(5,'pelanggan.edit','web','2020-10-21 02:53:47','2020-10-21 02:53:47'),(6,'pelanggan.update','web','2020-10-21 02:53:54','2020-10-21 02:53:54'),(7,'pelanggan.destroy','web','2020-10-21 02:55:05','2020-10-21 02:55:05'),(8,'barang.index','web','2020-10-21 02:55:41','2020-10-21 02:55:41'),(9,'barang.create','web','2020-10-21 02:55:49','2020-10-21 02:55:49'),(10,'barang.store','web','2020-10-21 02:57:05','2020-10-21 02:57:05'),(11,'barang.edit','web','2020-10-21 02:57:15','2020-10-21 02:57:15'),(12,'barang.update','web','2020-10-21 02:58:10','2020-10-21 02:58:10'),(13,'satuanBarang.index','web','2020-10-21 02:58:43','2020-10-21 02:58:43'),(14,'satuanBarang.create','web','2020-10-21 02:58:51','2020-10-21 02:58:51'),(15,'satuanBarang.store','web','2020-10-21 02:59:03','2020-10-21 02:59:03'),(16,'satuanBarang.edit','web','2020-10-21 02:59:32','2020-10-21 02:59:32'),(17,'satuanBarang.update','web','2020-10-21 03:00:03','2020-10-21 03:00:03'),(18,'satuanBarang.destroy','web','2020-10-21 03:00:10','2020-10-21 03:00:10'),(19,'barang.destroy','web','2020-10-21 03:00:49','2020-10-21 03:00:49'),(20,'kategoriBarang.index','web','2020-10-21 03:01:24','2020-10-21 03:01:24'),(21,'kategoriBarang.create','web','2020-10-21 03:01:44','2020-10-21 03:01:44'),(22,'kategoriBarang.store','web','2020-10-21 03:02:06','2020-10-21 03:02:06'),(23,'kategoriBarang.edit','web','2020-10-21 03:02:36','2020-10-21 03:03:05'),(24,'kategoriBarang.update','web','2020-10-21 03:03:24','2020-10-21 03:03:24'),(25,'kategoriBarang.destroy','web','2020-10-21 03:03:31','2020-10-21 03:03:31'),(26,'subkategoriBarang.index','web','2020-10-21 03:16:33','2020-10-21 03:16:33'),(27,'subkategoriBarang.create','web','2020-10-21 03:17:20','2020-10-21 03:17:20'),(28,'subkategoriBarang.store','web','2020-10-21 03:17:33','2020-10-21 03:17:33'),(29,'subkategoriBarang.edit','web','2020-10-21 03:17:43','2020-10-21 03:17:43'),(30,'subkategoriBarang.update','web','2020-10-21 03:17:51','2020-10-21 03:17:51'),(31,'subkategoriBarang.destroy','web','2020-10-21 03:17:59','2020-10-21 03:17:59'),(32,'promo.index','web','2020-10-21 03:18:12','2020-10-21 03:18:12'),(33,'promo.create','web','2020-10-21 03:18:41','2020-10-21 03:18:41'),(34,'promo.store','web','2020-10-21 03:18:55','2020-10-21 03:18:55'),(35,'promo.edit','web','2020-10-21 03:19:03','2020-10-21 03:19:03'),(36,'promo.update','web','2020-10-21 03:19:36','2020-10-21 03:19:36'),(37,'promo.destroy','web','2020-10-21 03:20:18','2020-10-21 03:20:18'),(38,'harga.index','web','2020-10-21 03:20:31','2020-10-21 03:20:31'),(39,'harga.create','web','2020-10-21 03:20:38','2020-10-21 03:20:38'),(40,'harga.store','web','2020-10-21 03:20:48','2020-10-21 03:20:48'),(41,'harga.edit','web','2020-10-21 03:21:02','2020-10-21 03:21:02'),(42,'harga.update','web','2020-10-21 03:21:13','2020-10-21 03:21:13'),(43,'harga.destroy','web','2020-10-21 03:21:19','2020-10-21 03:21:19'),(44,'stok.index','web','2020-10-21 03:21:34','2020-10-21 03:21:34'),(45,'stok.create','web','2020-10-21 03:21:41','2020-10-21 03:21:41'),(46,'stok.store','web','2020-10-21 03:22:03','2020-10-21 03:22:03'),(47,'stok.edit','web','2020-10-21 03:22:15','2020-10-21 03:22:15'),(48,'stok.update','web','2020-10-21 03:22:22','2020-10-21 03:22:22'),(49,'stok.destroy','web','2020-10-21 03:22:34','2020-10-21 03:22:34'),(50,'supplier.index','web','2020-10-21 03:22:53','2020-10-21 03:22:53'),(51,'supplier.create','web','2020-10-21 03:22:59','2020-10-21 03:22:59'),(52,'supplier.store','web','2020-10-21 03:23:05','2020-10-21 03:23:05'),(53,'supplier.edit','web','2020-10-21 03:23:12','2020-10-21 03:23:12'),(54,'supplier.update','web','2020-10-21 03:23:17','2020-10-21 03:23:17'),(55,'supplier.destroy','web','2020-10-21 03:24:10','2020-10-21 03:24:10'),(56,'mitra.index','web','2020-10-21 03:24:26','2020-10-21 03:24:26'),(57,'mitra.create','web','2020-10-21 03:24:34','2020-10-21 03:24:34'),(58,'mitra.store','web','2020-10-21 03:24:44','2020-10-21 03:24:44'),(59,'mitra.update','web','2020-10-21 03:24:55','2020-10-21 03:25:16'),(60,'mitra.edit','web','2020-10-21 03:25:03','2020-10-21 03:25:03'),(61,'mitra.destroy','web','2020-10-21 03:25:27','2020-10-21 03:25:27'),(62,'penjualan.index','web','2020-10-21 03:25:52','2020-10-21 03:25:52'),(63,'penjualan.create','web','2020-10-21 03:26:02','2020-10-21 03:26:02'),(64,'penjualan.store','web','2020-10-21 03:26:09','2020-10-21 03:26:09'),(65,'penjualan.edit','web','2020-10-21 03:26:21','2020-10-21 03:26:21'),(66,'penjualan.destroy','web','2020-10-21 03:26:26','2020-10-21 03:26:54'),(67,'penjualan.update','web','2020-10-21 03:26:33','2020-10-21 03:26:33'),(68,'purchaseOrder.index','web','2020-10-21 03:27:16','2020-10-21 03:27:16'),(69,'purchaseOrder.create','web','2020-10-21 03:27:24','2020-10-21 03:27:24'),(70,'purchaseOrder.store','web','2020-10-21 03:27:30','2020-10-21 03:27:30'),(71,'purchaseOrder.edit','web','2020-10-21 03:27:37','2020-10-21 03:27:37'),(72,'purchaseOrder.update','web','2020-10-21 03:27:46','2020-10-21 03:27:46'),(73,'purchaseOrder.destroy','web','2020-10-21 03:28:14','2020-10-21 03:28:14'),(74,'kirimBarang.index','web','2020-10-21 03:29:03','2020-10-21 03:29:03'),(75,'kirimBarang.create','web','2020-10-21 03:29:09','2020-10-21 03:29:09'),(76,'kirimBarang.store','web','2020-10-21 03:29:15','2020-10-21 03:29:15'),(77,'kirimBarang.edit','web','2020-10-21 03:29:23','2020-10-21 03:29:23'),(78,'kirimBarang.destroy','web','2020-10-21 03:29:31','2020-10-21 03:29:51'),(79,'kirimBarang.update','web','2020-10-21 03:29:39','2020-10-21 03:29:39'),(80,'terimaBarang.index','web','2020-10-21 03:30:07','2020-10-21 03:30:07'),(81,'terimaBarang.create','web','2020-10-21 03:30:14','2020-10-21 03:30:14'),(82,'terimaBarang.edit','web','2020-10-21 03:30:20','2020-10-21 03:30:46'),(83,'terimaBarang.store','web','2020-10-21 03:30:22','2020-10-21 03:30:22'),(84,'terimaBarang.update','web','2020-10-21 03:31:00','2020-10-21 03:31:00'),(85,'terimaBarang.destroy','web','2020-10-21 03:31:25','2020-10-21 03:31:25'),(86,'returBarang.index','web','2020-10-21 03:31:45','2020-10-21 03:31:45'),(87,'returBarang.create','web','2020-10-21 03:31:52','2020-10-21 03:31:52'),(88,'returBarang.store','web','2020-10-21 03:32:01','2020-10-21 03:32:01'),(89,'returBarang.edit','web','2020-10-21 03:32:11','2020-10-21 03:32:11'),(90,'returBarang.update','web','2020-10-21 03:32:25','2020-10-21 03:32:25'),(91,'returBarang.destroy','web','2020-10-21 03:32:37','2020-10-21 03:32:37'),(92,'kartuStokPenjualan.index','web','2020-10-21 03:33:03','2020-10-21 03:33:03'),(93,'kartuStokPenjualan.create','web','2020-10-21 03:33:17','2020-10-21 03:33:17'),(94,'kartuStokPenjualan.store','web','2020-10-21 03:33:27','2020-10-21 03:33:27'),(95,'kartuStokPenjualan.edit','web','2020-10-21 03:33:32','2020-10-21 03:33:32'),(96,'kartuStokPenjualan.update','web','2020-10-21 03:33:41','2020-10-21 03:33:41'),(97,'kartuStokPenjualan.destroy','web','2020-10-21 03:33:52','2020-10-21 03:33:52'),(98,'kartuStokTerimaBarang.index','web','2020-10-21 03:34:16','2020-10-21 03:34:16'),(99,'kartuStokTerimaBarang.create','web','2020-10-21 03:34:22','2020-10-21 03:34:22'),(100,'kartuStokTerimaBarang.store','web','2020-10-21 03:34:30','2020-10-21 03:34:30'),(101,'kartuStokTerimaBarang.update','web','2020-10-21 03:34:40','2020-10-21 03:34:59'),(102,'kartuStokTerimaBarang.edit','web','2020-10-21 03:34:50','2020-10-21 03:34:50'),(103,'kartuStokTerimaBarang.destroy','web','2020-10-21 03:35:19','2020-10-21 03:35:19'),(104,'kartuStokReturBarang.index','web','2020-10-21 03:35:35','2020-10-21 03:35:35'),(105,'kartuStokReturBarang.create','web','2020-10-21 03:35:43','2020-10-21 03:35:43'),(106,'kartuStokReturBarang.store','web','2020-10-21 03:35:48','2020-10-21 03:35:48'),(107,'kartuStokReturBarang.edit','web','2020-10-21 03:35:56','2020-10-21 03:35:56'),(108,'kartuStokReturBarang.update','web','2020-10-21 03:36:02','2020-10-21 03:36:02'),(109,'kartuStokReturBarang.destroy','web','2020-10-21 03:36:08','2020-10-21 03:36:08'),(110,'kartuStokPenyesuaian.index','web','2020-10-21 03:36:29','2020-10-21 03:36:29'),(111,'kartuStokPenyesuaian.create','web','2020-10-21 03:36:46','2020-10-21 03:36:46'),(112,'kartuStokPenyesuaian.store','web','2020-10-21 03:38:18','2020-10-21 03:38:18'),(113,'kartuStokPenyesuaian.edit','web','2020-10-21 03:38:28','2020-10-21 03:38:28'),(114,'kartuStokPenyesuaian.update','web','2020-10-21 03:38:34','2020-10-21 03:38:34'),(115,'kartuStokPenyesuaian.destroy','web','2020-10-21 03:38:39','2020-10-21 03:38:39'),(116,'parameter.index','web','2020-10-21 03:39:35','2020-10-21 03:39:35'),(117,'parameter.create','web','2020-10-21 03:39:42','2020-10-21 03:39:42'),(118,'parameter.store','web','2020-10-21 03:40:32','2020-10-21 03:40:32'),(119,'parameter.edit','web','2020-10-21 03:40:41','2020-10-21 03:40:41'),(120,'parameter.update','web','2020-10-21 03:42:33','2020-10-21 03:42:33'),(121,'parameter.destroy','web','2020-10-21 03:42:52','2020-10-21 03:42:52'),(122,'pengguna.index','web','2020-10-21 03:43:07','2020-10-21 03:43:07'),(123,'pengguna.create','web','2020-10-21 03:43:32','2020-10-21 03:43:32'),(124,'pengguna.store','web','2020-10-21 03:43:44','2020-10-21 03:43:44'),(125,'pengguna.edit','web','2020-10-21 03:43:50','2020-10-21 03:43:50'),(126,'pengguna.update','web','2020-10-21 03:43:56','2020-10-21 03:43:56'),(127,'pengguna.destroy','web','2020-10-21 03:44:03','2020-10-21 03:44:03'),(128,'roles.index','web','2020-10-21 03:44:17','2020-10-21 03:44:17'),(129,'roles.create','web','2020-10-21 03:44:38','2020-10-21 03:44:38'),(130,'roles.store','web','2020-10-21 03:44:46','2020-10-21 03:44:46'),(131,'roles.edit','web','2020-10-21 03:44:56','2020-10-21 03:44:56'),(132,'roles.update','web','2020-10-21 03:45:02','2020-10-21 03:45:02'),(133,'roles.destroy','web','2020-10-21 03:45:08','2020-10-21 03:45:08'),(134,'permissions.index','web','2020-10-21 03:45:29','2020-10-21 03:45:29'),(135,'permissions.create','web','2020-10-21 03:45:37','2020-10-21 03:45:37'),(136,'permissions.store','web','2020-10-21 03:45:41','2020-10-21 03:45:41'),(137,'permissions.edit','web','2020-10-21 03:45:48','2020-10-21 03:45:48'),(138,'permissions.update','web','2020-10-21 03:45:54','2020-10-21 03:45:54'),(139,'permissions.destroy','web','2020-10-21 03:45:59','2020-10-21 03:45:59'),(140,'master','web','2020-10-28 03:34:38','2020-10-28 03:34:38'),(141,'pengadaanBarang','web','2020-10-28 03:37:55','2020-10-28 03:37:55'),(142,'kartuStok','web','2020-10-28 03:39:13','2020-10-28 03:39:13'),(143,'home','web','2020-10-28 04:26:35','2020-10-28 04:41:18'),(144,'poin.index','web','2020-10-28 04:51:24','2020-10-28 04:51:24'),(145,'poin.create','web','2020-10-28 04:51:32','2020-10-28 04:51:32'),(146,'poin.store','web','2020-10-28 04:51:41','2020-10-28 04:51:41'),(147,'poin.edit','web','2020-10-28 04:51:54','2020-10-28 04:51:54'),(148,'poin.update','web','2020-10-28 04:52:01','2020-10-28 04:52:01'),(149,'poin.destroy','web','2020-10-28 04:52:09','2020-10-28 04:52:09'),(150,'pengaturan','web','2020-10-28 05:16:15','2020-10-28 05:16:15'),(151,'users.index','web','2020-10-28 05:19:46','2020-10-28 05:19:46'),(152,'users.create','web','2020-10-28 05:20:03','2020-10-28 05:20:03'),(153,'users.store','web','2020-10-28 05:20:21','2020-10-28 05:20:21'),(154,'users.edit','web','2020-10-28 05:20:41','2020-10-28 05:20:41'),(155,'users.update','web','2020-10-28 05:21:11','2020-10-28 05:21:11'),(156,'levelMitra.index','web','2020-10-28 05:29:15','2020-10-28 05:29:15'),(157,'levelMitra.create','web','2020-10-28 05:29:45','2020-10-28 05:29:45'),(158,'levelMitra.store','web','2020-10-28 05:29:56','2020-10-28 05:29:56'),(159,'levelMitra.edit','web','2020-10-28 05:30:08','2020-10-28 05:30:08'),(160,'levelMitra.update','web','2020-10-28 05:30:17','2020-10-28 05:30:17'),(161,'levelMitra.destroy','web','2020-10-28 05:30:26','2020-10-28 05:30:26'),(162,'bintang.index','web','2020-10-28 05:30:53','2020-10-28 05:30:53'),(163,'bintang.create','web','2020-10-28 05:31:07','2020-10-28 05:31:07'),(164,'bintang.store','web','2020-10-28 05:31:27','2020-10-28 05:31:27'),(165,'bintang.edit','web','2020-10-28 05:31:42','2020-10-28 05:31:42'),(166,'bintang.update','web','2020-10-28 05:31:51','2020-10-28 05:31:51'),(167,'bintang.destroy','web','2020-10-28 05:31:59','2020-10-28 05:31:59'),(168,'bintang.show','web','2020-10-28 05:32:08','2020-10-28 05:32:08'),(169,'users.destroy','web','2020-10-28 06:05:49','2020-10-28 06:05:49'),(170,'users.show','web','2020-10-28 06:06:02','2020-10-28 06:06:02'),(171,'referral.index','web','2020-10-28 06:37:57','2020-10-28 06:38:06'),(172,'referral.create','web','2020-10-28 06:38:43','2020-10-28 06:38:43'),(173,'referral.store','web','2020-10-28 06:38:57','2020-10-28 06:38:57'),(174,'referral.edit','web','2020-10-28 06:39:05','2020-10-28 06:39:05'),(175,'referral.update','web','2020-10-28 06:39:18','2020-10-28 06:39:18'),(176,'referral.destroy','web','2020-10-28 06:39:27','2020-10-28 06:39:27'),(177,'referral.show','web','2020-10-28 06:39:35','2020-10-28 06:39:35'),(178,'kemitraan','web','2020-10-28 08:42:34','2020-10-28 08:42:34'),(179,'pegawai.index','web','2020-11-01 05:05:27','2020-11-01 05:05:27'),(180,'pegawai.create','web','2020-11-01 05:05:39','2020-11-01 05:05:39'),(181,'pegawai.store','web','2020-11-01 05:05:50','2020-11-01 05:05:50'),(182,'pegawai.edit','web','2020-11-01 05:06:34','2020-11-01 05:06:34'),(183,'pegawai.update','web','2020-11-01 05:06:46','2020-11-01 05:06:46'),(184,'pegawai.show','web','2020-11-01 05:06:54','2020-11-01 05:06:54'),(185,'pegawai.destroy','web','2020-11-01 05:07:03','2020-11-01 05:07:03'),(186,'jabatan.index','web','2020-11-01 05:11:20','2020-11-01 05:11:20'),(187,'jabatan.create','web','2020-11-01 05:11:27','2020-11-01 05:11:27'),(188,'jabatan.store','web','2020-11-01 05:11:35','2020-11-01 05:11:35'),(189,'jabatan.edit','web','2020-11-01 05:12:02','2020-11-01 05:12:02'),(190,'jabatan.update','web','2020-11-01 05:12:09','2020-11-01 05:12:09'),(191,'jabatan.show','web','2020-11-01 05:12:15','2020-11-01 05:12:15'),(192,'jabatan.destroy','web','2020-11-01 05:12:23','2020-11-01 05:12:23'),(193,'penyesuaianStok.index','web','2020-11-01 08:29:35','2020-11-01 08:29:35'),(194,'penyesuaianStok.create','web','2020-11-01 08:30:00','2020-11-01 08:30:00'),(195,'penyesuaianStok.store','web','2020-11-01 08:30:10','2020-11-01 08:30:10'),(196,'penyesuaianStok.edit','web','2020-11-01 08:30:17','2020-11-01 08:30:17'),(197,'penyesuaianStok.update','web','2020-11-01 08:30:25','2020-11-01 08:30:25'),(198,'penyesuaianStok.show','web','2020-11-01 08:30:34','2020-11-01 08:30:34'),(199,'penyesuaianStok.destroy','web','2020-11-01 08:30:44','2020-11-01 08:30:44'),(200,'manajemenStok','web','2020-11-01 08:37:11','2020-11-01 08:37:11'),(201,'mitra.show','web','2020-11-09 15:06:11','2020-11-09 15:06:11'),(202,'logPoin.index','web','2020-11-09 16:43:29','2020-11-09 16:43:29'),(203,'logPoin.show','web','2020-11-09 16:43:41','2020-11-09 16:43:41'),(204,'logPoin.create','web','2020-11-09 16:43:50','2020-11-09 16:43:50'),(205,'logPoin.store','web','2020-11-09 16:43:59','2020-11-09 16:43:59'),(206,'logPoin.edit','web','2020-11-09 16:44:16','2020-11-09 16:44:16'),(207,'logPoin.update','web','2020-11-09 16:44:24','2020-11-09 16:44:24'),(208,'logPoin.destroy','web','2020-11-09 16:44:35','2020-11-09 16:44:35'),(209,'logBintang.index','web','2020-11-09 16:45:11','2020-11-09 16:45:11'),(210,'logBintang.show','web','2020-11-09 16:45:23','2020-11-09 16:45:23'),(211,'logBintang.create','web','2020-11-09 16:45:37','2020-11-09 16:45:37'),(212,'logBintang.store','web','2020-11-09 16:45:47','2020-11-09 16:45:47'),(213,'logBintang.edit','web','2020-11-09 16:46:20','2020-11-09 16:46:20'),(214,'logBintang.update','web','2020-11-09 16:46:32','2020-11-09 16:46:32'),(215,'logBintang.destroy','web','2020-11-09 16:46:39','2020-11-09 16:46:47'),(216,'history','web','2020-11-09 17:20:42','2020-11-09 17:20:42'),(217,'updatePurchaseOrder','web','2020-11-13 05:16:06','2020-11-13 05:16:37'),(218,'purchaseOrder.show','web','2020-11-13 05:27:46','2020-11-13 05:27:46'),(219,'kirimBarang.show','web','2020-11-13 05:41:55','2020-11-13 05:41:55'),(220,'updateKirimBarang','web','2020-11-13 05:43:16','2020-11-13 05:43:16'),(221,'terimaBarang.show','web','2020-11-13 06:57:24','2020-11-13 06:57:24'),(222,'updateTerimaBarang','web','2020-11-13 06:57:58','2020-11-13 06:57:58'),(223,'updateReturBarang','web','2020-11-13 08:40:28','2020-11-13 08:40:28'),(224,'returBarang.show','web','2020-11-13 08:42:45','2020-11-13 08:42:45');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poin`
--

DROP TABLE IF EXISTS `poin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_id` int(10) unsigned NOT NULL,
  `poin` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poin`
--

LOCK TABLES `poin` WRITE;
/*!40000 ALTER TABLE `poin` DISABLE KEYS */;
INSERT INTO `poin` VALUES (7,1,384,'2020-11-03 16:40:46','2020-11-05 08:53:05',NULL),(8,2,95,'2020-11-03 17:47:00','2020-11-05 07:20:19',NULL),(9,3,86,'2020-11-03 17:50:53','2020-11-09 17:08:37',NULL),(10,10,180,'2020-11-09 17:07:41','2020-11-13 08:52:00',NULL);
/*!40000 ALTER TABLE `poin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo`
--

LOCK TABLES `promo` WRITE;
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_diproses` datetime DEFAULT NULL,
  `pegawai_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order`
--

LOCK TABLES `purchase_order` WRITE;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
INSERT INTO `purchase_order` VALUES (2,'PO-2011-0000','2020-11-13 12:11:54',1,1,'Close','2020-11-13 05:14:56','2020-11-13 06:58:10',NULL),(3,'PO-2011-0001','2020-11-13 12:11:22',1,1,'Close','2020-11-13 05:15:17','2020-11-13 06:59:58',NULL),(4,'PO-2011-0002','2020-11-13 12:11:20',1,1,'Close','2020-11-13 05:26:45','2020-11-13 07:00:24',NULL),(5,'PO-2011-0003','2020-11-13 15:11:58',1,1,'Close','2020-11-13 08:07:14','2020-11-13 08:18:48',NULL),(6,'PO-2011-0004','2020-11-13 15:11:55',1,1,'Close','2020-11-13 08:27:47','2020-11-13 08:33:20',NULL);
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referral`
--

DROP TABLE IF EXISTS `referral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `child_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referral`
--

LOCK TABLES `referral` WRITE;
/*!40000 ALTER TABLE `referral` DISABLE KEYS */;
INSERT INTO `referral` VALUES (1,2,8,9,'2020-10-28 08:56:10','2020-10-28 08:56:10',NULL);
/*!40000 ALTER TABLE `referral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retur_barang`
--

DROP TABLE IF EXISTS `retur_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retur_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retur_barang`
--

LOCK TABLES `retur_barang` WRITE;
/*!40000 ALTER TABLE `retur_barang` DISABLE KEYS */;
INSERT INTO `retur_barang` VALUES (3,'RB-2011-0000',1,1,'Kadaluarsa','2020-11-13 15:11:42','Diretur','2020-11-13 08:39:47','2020-11-13 08:40:42',NULL);
/*!40000 ALTER TABLE `retur_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(157,1),(158,1),(159,1),(160,1),(161,1),(162,1),(163,1),(164,1),(165,1),(166,1),(167,1),(168,1),(169,1),(170,1),(171,1),(172,1),(173,1),(174,1),(175,1),(176,1),(177,1),(178,1),(179,1),(180,1),(181,1),(182,1),(183,1),(184,1),(185,1),(186,1),(187,1),(188,1),(189,1),(190,1),(191,1),(192,1),(193,1),(194,1),(195,1),(196,1),(197,1),(198,1),(199,1),(200,1),(201,1),(202,1),(209,1),(216,1),(217,1),(218,1),(219,1),(220,1),(221,1),(222,1),(223,1),(224,1),(143,2),(202,2),(209,2),(216,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2020-10-21 01:19:02','2020-10-21 01:19:02'),(2,'mitra','web','2020-10-21 04:01:20','2020-10-21 04:01:20'),(3,'cs','web','2020-10-27 18:20:38','2020-10-27 18:20:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan_barang`
--

DROP TABLE IF EXISTS `satuan_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuan_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan_barang`
--

LOCK TABLES `satuan_barang` WRITE;
/*!40000 ALTER TABLE `satuan_barang` DISABLE KEYS */;
INSERT INTO `satuan_barang` VALUES (1,'m','Meter','2020-10-28 07:44:04','2020-10-28 07:44:04',NULL),(2,'g','Gram','2020-10-28 07:44:12','2020-10-28 07:44:12',NULL),(3,'btl','Botol','2020-10-28 08:00:04','2020-10-28 08:00:04',NULL),(4,'pot','Potion','2020-10-28 08:11:44','2020-10-28 08:11:44',NULL),(5,'pcs','Pieces','2020-10-28 08:12:41','2020-10-28 08:12:41',NULL);
/*!40000 ALTER TABLE `satuan_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(10) unsigned NOT NULL,
  `stok` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES (1,2,900,'2020-10-28 08:38:34','2020-11-13 08:52:00',NULL),(2,1,700,'2020-10-28 08:38:55','2020-11-13 08:40:42',NULL),(3,3,0,'2020-11-13 08:48:50','2020-11-13 08:48:50',NULL);
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subkategori_barang`
--

DROP TABLE IF EXISTS `subkategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subkategori_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subkategori_barang`
--

LOCK TABLES `subkategori_barang` WRITE;
/*!40000 ALTER TABLE `subkategori_barang` DISABLE KEYS */;
INSERT INTO `subkategori_barang` VALUES (1,'Day Cream','2020-10-28 07:50:46','2020-10-28 07:50:46',NULL),(2,'Bedak','2020-10-28 07:50:55','2020-10-28 07:50:55',NULL),(3,'Tonic','2020-10-28 07:51:04','2020-10-28 07:51:04',NULL),(4,'Facial Wash','2020-10-28 07:51:11','2020-10-28 07:51:11',NULL),(5,'Night Cream','2020-10-28 08:09:45','2020-10-28 08:09:45',NULL);
/*!40000 ALTER TABLE `subkategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'SUP0001','Gudang Utama','-','Ngagel','Ngagel','Ngagel','SURABAYA','62065','081786765654','081786765654','gudang_utama@demo.com','Internal','-','-','2020-11-01 05:41:30','2020-11-01 05:41:30',NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terima_barang`
--

DROP TABLE IF EXISTS `terima_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terima_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) unsigned NOT NULL,
  `kirim_barang_id` int(10) unsigned NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `tanggal_terima` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terima_barang`
--

LOCK TABLES `terima_barang` WRITE;
/*!40000 ALTER TABLE `terima_barang` DISABLE KEYS */;
INSERT INTO `terima_barang` VALUES (2,2,2,'TB-2011-0000',1,1,'2020-11-13 13:11:26','Diterima','2020-11-13 06:56:24','2020-11-13 06:59:26',NULL),(3,3,3,'TB-2011-0001',1,1,'2020-11-13 13:11:58','Diterima','2020-11-13 06:59:51','2020-11-13 06:59:58',NULL),(4,4,4,'TB-2011-0002',1,1,'2020-11-13 14:11:24','Diterima','2020-11-13 07:00:18','2020-11-13 07:00:24',NULL),(5,5,5,'TB-2011-0003',1,1,'2020-11-13 15:11:48','Diterima','2020-11-13 08:18:39','2020-11-13 08:18:48',NULL),(6,6,6,'TB-2011-0004',1,1,'2020-11-13 15:11:19','Diterima','2020-11-13 08:31:13','2020-11-13 08:31:19',NULL),(7,6,7,'TB-2011-0005',1,1,'2020-11-13 15:11:38','Diterima','2020-11-13 08:32:32','2020-11-13 08:32:38',NULL),(8,6,8,'TB-2011-0006',1,1,'2020-11-13 15:11:08','Diterima','2020-11-13 08:33:54','2020-11-13 08:34:08',NULL);
/*!40000 ALTER TABLE `terima_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@demo.com','2020-10-19 23:31:59','$2y$10$HLnnFwcvRN2HWO1/loROp.B7opUz3Xj4MxI1YvOQ8iHJJoJcJvZsy',NULL,NULL,NULL,'2020-10-19 23:31:59','2020-10-19 23:31:59'),(2,'Mitra','mitra@demo.com',NULL,'$2y$10$ywHQ.536SvANfTiJs48RTeA6gB2U7izdZTErZaVl0W665jVf4Lnaq','0818767654',NULL,NULL,'2020-10-21 04:02:53','2020-10-21 04:02:53'),(8,'Nadin Amizah','nadin_amizah@demo.com',NULL,'$2y$10$5k5DXhF5s0kzUTuENLG68.q6vV1oIE/.cetsQykUz1h1PIARffhnS',NULL,NULL,NULL,'2020-10-28 08:54:57','2020-10-28 08:54:57'),(9,'Wangi Gitaswara','wangi_gitaswara@demo.com',NULL,'$2y$10$.m7vLHsn22pMF8INUpulSeiKW6OdUmTQJMu4RGfNidK19Cadzjd/G',NULL,NULL,NULL,'2020-10-28 08:55:17','2020-10-28 08:55:17'),(17,'ARSA NAJANDRA','arsa_najandra@demo.com',NULL,'$2y$10$PzEnZMdK04PCA2eATrfq5eev7a3bj8.eHuzHIa5Gp8SzSUhYsRqxi',NULL,NULL,NULL,'2020-11-13 08:54:32','2020-11-13 08:54:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sodermee'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-13 16:10:53
