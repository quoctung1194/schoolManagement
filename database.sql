CREATE DATABASE  IF NOT EXISTS `schoolmanagement` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `schoolmanagement`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: schoolmanagement
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `classks`
--

DROP TABLE IF EXISTS `classks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classks`
--

LOCK TABLES `classks` WRITE;
/*!40000 ALTER TABLE `classks` DISABLE KEYS */;
INSERT INTO `classks` VALUES (1,'Lop A1',1,NULL,NULL,NULL),(2,'Lop A2',1,NULL,NULL,NULL),(3,'Lop A3',1,NULL,NULL,NULL),(4,'Lop B1',2,NULL,NULL,NULL),(5,'Lop B2',2,NULL,NULL,NULL),(6,'Lop B3',2,NULL,NULL,NULL),(8,'Lop C1',3,NULL,NULL,NULL),(9,'Lop C2',3,NULL,NULL,NULL),(10,'Lop C3',3,NULL,NULL,NULL),(11,'AC CCCD',1,NULL,'2017-03-02 08:31:56','2017-03-02 08:31:56'),(12,'Lớp Demo',1,NULL,'2017-03-02 08:56:33','2017-03-02 08:56:33'),(13,'FFFFF',2,NULL,'2017-03-23 08:55:46','2017-03-23 08:55:46');
/*!40000 ALTER TABLE `classks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_26_051941_create_specialities_table',1),(5,'2017_02_26_081216_create_classes_table',2),(6,'2017_02_26_052157_create_students_table',3),(7,'2017_03_02_071655_create_subjects_table',4),(8,'2017_03_02_071908_create_subject_specialities_table',4),(9,'2017_03_07_023441_student_marks',5),(10,'2017_05_12_084005_create_student_classks_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191)),
  KEY `password_resets_token_index` (`token`(191))
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
-- Table structure for table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialities`
--

LOCK TABLES `specialities` WRITE;
/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` VALUES (1,'Khoa A',NULL,NULL,NULL),(2,'Khoa B',NULL,NULL,NULL),(3,'Khoa C',NULL,NULL,NULL);
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_classks`
--

DROP TABLE IF EXISTS `student_classks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_classks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `classk_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_classks`
--

LOCK TABLES `student_classks` WRITE;
/*!40000 ALTER TABLE `student_classks` DISABLE KEYS */;
INSERT INTO `student_classks` VALUES (1,24,2,'2017-05-12 02:51:19','2017-05-12 02:50:55','2017-05-12 02:51:19'),(2,23,2,NULL,'2017-05-12 02:51:14','2017-05-12 02:51:14'),(3,24,2,NULL,'2017-05-12 02:51:19','2017-05-12 02:51:19'),(4,22,2,NULL,'2017-05-12 02:51:24','2017-05-12 02:51:24'),(5,21,2,NULL,'2017-05-12 02:51:28','2017-05-12 02:51:28'),(6,20,10,NULL,'2017-05-12 02:51:33','2017-05-12 02:51:33'),(7,18,6,'2017-05-12 02:51:46','2017-05-12 02:51:39','2017-05-12 02:51:46'),(8,18,6,NULL,'2017-05-12 02:51:46','2017-05-12 02:51:46'),(9,17,1,NULL,'2017-05-12 02:51:51','2017-05-12 02:51:51'),(10,16,1,NULL,'2017-05-12 02:51:54','2017-05-12 02:51:54'),(11,15,4,NULL,'2017-05-12 02:51:57','2017-05-12 02:51:57'),(12,3,10,'2017-06-10 20:33:29','2017-05-12 02:52:02','2017-06-10 20:33:29'),(13,2,1,NULL,'2017-05-12 02:52:07','2017-05-12 02:52:07'),(14,1,2,NULL,'2017-05-12 02:52:12','2017-05-12 02:52:12'),(15,27,1,'2017-05-13 03:12:23','2017-05-12 03:06:09','2017-05-13 03:12:23'),(16,27,2,'2017-05-13 03:12:23','2017-05-12 03:06:09','2017-05-13 03:12:23'),(17,27,1,'2017-05-13 03:53:36','2017-05-13 03:12:23','2017-05-13 03:53:36'),(18,27,1,'2017-05-13 03:53:36','2017-05-13 03:12:23','2017-05-13 03:53:36'),(19,27,3,'2017-05-13 03:53:36','2017-05-13 03:12:23','2017-05-13 03:53:36'),(20,27,1,'2017-05-13 04:21:59','2017-05-13 03:53:36','2017-05-13 04:21:59'),(21,27,5,'2017-05-13 04:21:59','2017-05-13 03:53:36','2017-05-13 04:21:59'),(22,27,10,'2017-05-13 04:21:59','2017-05-13 03:53:36','2017-05-13 04:21:59'),(23,27,1,NULL,'2017-05-13 04:21:59','2017-05-13 04:21:59'),(24,27,5,NULL,'2017-05-13 04:21:59','2017-05-13 04:21:59'),(25,27,8,NULL,'2017-05-13 04:21:59','2017-05-13 04:21:59'),(26,28,1,NULL,'2017-05-13 04:54:50','2017-05-13 04:54:50'),(27,28,8,NULL,'2017-05-13 04:54:50','2017-05-13 04:54:50'),(28,28,6,NULL,'2017-05-13 04:54:50','2017-05-13 04:54:50'),(29,29,1,'2017-06-09 19:45:35','2017-06-09 19:45:07','2017-06-09 19:45:35'),(30,29,5,'2017-06-09 19:45:35','2017-06-09 19:45:07','2017-06-09 19:45:35'),(31,29,10,'2017-06-09 19:45:35','2017-06-09 19:45:07','2017-06-09 19:45:35'),(32,29,1,'2017-06-09 19:54:56','2017-06-09 19:45:35','2017-06-09 19:54:56'),(33,29,5,'2017-06-09 19:54:56','2017-06-09 19:45:35','2017-06-09 19:54:56'),(34,29,10,'2017-06-09 19:54:56','2017-06-09 19:45:35','2017-06-09 19:54:56'),(35,29,1,'2017-06-09 19:55:10','2017-06-09 19:54:56','2017-06-09 19:55:10'),(36,29,10,'2017-06-09 19:55:10','2017-06-09 19:54:56','2017-06-09 19:55:10'),(37,29,6,'2017-06-09 20:31:00','2017-06-09 19:55:10','2017-06-09 20:31:00'),(38,29,1,'2017-06-09 20:31:00','2017-06-09 19:55:10','2017-06-09 20:31:00'),(39,29,9,'2017-06-09 20:31:00','2017-06-09 19:55:10','2017-06-09 20:31:00'),(40,29,6,'2017-06-09 20:31:07','2017-06-09 20:31:00','2017-06-09 20:31:07'),(41,29,1,'2017-06-09 20:31:07','2017-06-09 20:31:00','2017-06-09 20:31:07'),(42,29,9,'2017-06-09 20:31:07','2017-06-09 20:31:00','2017-06-09 20:31:07'),(43,29,6,'2017-06-09 20:36:50','2017-06-09 20:31:07','2017-06-09 20:36:50'),(44,29,1,'2017-06-09 20:36:50','2017-06-09 20:31:08','2017-06-09 20:36:50'),(45,29,9,'2017-06-09 20:36:50','2017-06-09 20:31:08','2017-06-09 20:36:50'),(46,29,6,NULL,'2017-06-09 20:36:50','2017-06-09 20:36:50'),(47,29,1,NULL,'2017-06-09 20:36:50','2017-06-09 20:36:50'),(48,29,9,NULL,'2017-06-09 20:36:50','2017-06-09 20:36:50'),(49,3,10,NULL,'2017-06-10 20:33:29','2017-06-10 20:33:29');
/*!40000 ALTER TABLE `student_classks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_marks`
--

DROP TABLE IF EXISTS `student_marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_marks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `completed_date` date DEFAULT NULL,
  `relearn_date` date DEFAULT NULL,
  `mark` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_marks`
--

LOCK TABLES `student_marks` WRITE;
/*!40000 ALTER TABLE `student_marks` DISABLE KEYS */;
INSERT INTO `student_marks` VALUES (27,1,4,'2017-06-21','2017-12-21',0.00,'2017-06-09 21:59:28','2017-06-09 21:59:28'),(28,1,13,'2017-06-21','2017-09-21',0.00,'2017-06-09 21:59:28','2017-06-09 21:59:28'),(29,1,3,'2017-06-21','2017-12-21',0.00,'2017-06-09 21:59:28','2017-06-09 21:59:28'),(30,2,4,'2017-06-02',NULL,0.00,'2017-06-09 21:59:48','2017-06-09 21:59:48'),(31,3,2,'2017-03-01','2018-03-01',0.00,'2017-06-09 22:00:15','2017-06-09 22:00:15'),(32,2,13,'2017-06-15','2017-09-15',0.00,'2017-06-10 02:00:49','2017-06-10 02:00:49');
/*!40000 ALTER TABLE `student_marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classk_id` int(11) NOT NULL,
  `id_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `begin_term` date DEFAULT NULL,
  `end_term` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Vo','Tung gggg',2,'GC60314',NULL,NULL,NULL,NULL,'2017-03-01 22:38:06'),(2,'Phan Thanh','Ti',1,'asdas dsada',NULL,NULL,NULL,NULL,'2017-03-01 21:05:45'),(3,'Nguyen','Hue',10,'GC31112','2017-06-07','2017-06-14',NULL,NULL,'2017-06-10 20:33:29'),(4,'Tài','Nguyễn Văn',9,'GC112322','2017-06-14','2017-06-14','2017-03-02 08:31:14','2017-03-01 21:56:54','2017-03-02 08:31:14'),(15,'VHQ','TUNG',4,'221383934',NULL,NULL,NULL,'2017-03-02 08:12:45','2017-03-02 08:12:53'),(16,'TEO','VO',1,'GC501122',NULL,NULL,NULL,'2017-03-02 08:47:54','2017-03-02 08:47:54'),(17,'TEO','VO',1,'GC50232',NULL,NULL,NULL,'2017-03-02 08:50:17','2017-03-02 08:50:17'),(18,'CCC','aAA',6,'GC5011222',NULL,NULL,NULL,'2017-03-02 08:51:38','2017-03-02 09:03:07'),(19,'sadsad','asdA',9,'C221233',NULL,NULL,'2017-05-13 05:11:17','2017-03-02 09:03:37','2017-05-13 05:11:17'),(20,'asdasdsada','asdASD',10,'sdasdasd',NULL,NULL,NULL,'2017-03-02 09:46:35','2017-03-02 09:46:35'),(21,'Tú','Hà Minh',2,'TH14',NULL,NULL,NULL,'2017-05-12 00:18:33','2017-05-12 01:20:11'),(22,'Tu','Ha',2,'TH15',NULL,NULL,NULL,'2017-05-12 01:21:18','2017-05-12 01:21:18'),(23,'Ha','Ha',2,'HH04',NULL,NULL,NULL,'2017-05-12 01:22:24','2017-05-12 01:22:24'),(24,'Han','Ha Minh',2,'HH4',NULL,NULL,NULL,'2017-05-12 01:24:12','2017-05-12 01:24:51'),(27,'An','Nguyen',1,'NA01',NULL,NULL,NULL,'2017-05-12 03:06:09','2017-05-12 03:06:09'),(28,'Toan','Le',1,'LT01',NULL,NULL,NULL,'2017-05-13 04:54:50','2017-05-13 04:54:50'),(29,'Quốc Tèo','Văn Tí',6,'992213839344','2017-06-14','2017-06-19',NULL,'2017-06-09 19:45:07','2017-06-09 20:36:50');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_specialities`
--

DROP TABLE IF EXISTS `subject_specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_specialities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_specialities`
--

LOCK TABLES `subject_specialities` WRITE;
/*!40000 ALTER TABLE `subject_specialities` DISABLE KEYS */;
INSERT INTO `subject_specialities` VALUES (52,12,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(53,6,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(54,10,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(59,12,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(61,10,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(74,11,2,NULL,'2017-06-09 21:39:25','2017-06-09 21:39:25'),(75,11,3,NULL,'2017-06-09 21:39:25','2017-06-09 21:39:25'),(76,2,2,NULL,'2017-06-09 21:39:34','2017-06-09 21:39:34'),(77,2,3,NULL,'2017-06-09 21:39:34','2017-06-09 21:39:34'),(78,3,1,NULL,'2017-06-09 21:39:53','2017-06-09 21:39:53'),(79,3,3,NULL,'2017-06-09 21:39:53','2017-06-09 21:39:53'),(80,5,2,NULL,'2017-06-09 21:40:32','2017-06-09 21:40:32'),(81,4,1,NULL,'2017-06-10 19:39:54','2017-06-10 19:39:54'),(82,4,2,NULL,'2017-06-10 19:39:54','2017-06-10 19:39:54'),(83,4,3,NULL,'2017-06-10 19:39:54','2017-06-10 19:39:54'),(84,13,1,NULL,'2017-06-10 19:42:35','2017-06-10 19:42:35'),(85,13,2,NULL,'2017-06-10 19:42:35','2017-06-10 19:42:35'),(86,13,3,NULL,'2017-06-10 19:42:35','2017-06-10 19:42:35');
/*!40000 ALTER TABLE `subject_specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_relearn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range_begin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Môn ABC DEF','+1 year','+1 weeks','2017-03-02 08:14:10',NULL,'2017-03-02 08:14:10'),(2,'Môn B','+1 year','+1 weeks',NULL,NULL,'2017-06-09 21:39:34'),(3,'Môn C','+6 months','+1 weeks',NULL,NULL,'2017-06-09 21:39:53'),(4,'Môn D','+6 months','+1 weeks',NULL,NULL,'2017-06-10 19:39:54'),(5,'Môn E','+6 months',NULL,NULL,NULL,'2017-03-02 02:18:56'),(6,'Môn F','+3 months',NULL,NULL,NULL,'2017-03-02 07:05:43'),(7,'Môn G','+3 months',NULL,NULL,NULL,'2017-03-02 02:15:33'),(8,'Môn TESTS','+3 months',NULL,NULL,'2017-03-02 07:38:49','2017-03-02 07:38:49'),(9,'TESTING 01','+3 months',NULL,'2017-03-02 08:11:05','2017-03-02 08:11:05','2017-03-02 09:04:10'),(10,'Môn TESTING','+3 months',NULL,NULL,'2017-03-02 08:13:37','2017-03-02 08:13:37'),(11,'Hello Bacsi','+3 months',NULL,NULL,'2017-03-02 08:15:40','2017-06-09 21:39:25'),(12,'Môn Dự bị',NULL,NULL,NULL,'2017-03-02 08:19:38','2017-03-02 08:19:38'),(13,'Demo AloAlo','+3 months','+2 weeks',NULL,'2017-03-02 09:03:57','2017-06-10 19:42:35');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@yahoo.com','$2y$10$YLOtIZvoLXTMVH.oCB/0JO9b4esua7H6YFlsl8.lKKP6KnXf34MmS','e0yzj1ws4GXIkaCZYVcIP7hgLWbB4HPs3WWXzpOIuFS0RmkQbhA7mTckCGHa',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'schoolmanagement'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 11:14:16
