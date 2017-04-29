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

USE tuic8ada_demo;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_26_051941_create_specialities_table',1),(5,'2017_02_26_081216_create_classes_table',2),(6,'2017_02_26_052157_create_students_table',3),(7,'2017_03_02_071655_create_subjects_table',4),(8,'2017_03_02_071908_create_subject_specialities_table',4),(9,'2017_03_07_023441_student_marks',5);
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
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
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
  `mark` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_marks`
--

LOCK TABLES `student_marks` WRITE;
/*!40000 ALTER TABLE `student_marks` DISABLE KEYS */;
INSERT INTO `student_marks` VALUES (16,1,13,'2017-03-17',0.00,'2017-03-09 03:55:44','2017-03-09 03:55:44'),(17,1,3,'2017-03-17',0.00,'2017-03-09 03:55:44','2017-03-09 03:55:44'),(18,20,4,'2017-04-08',0.00,'2017-03-09 04:09:31','2017-03-09 04:09:31'),(19,3,2,'2017-04-08',0.00,'2017-03-09 04:09:31','2017-03-09 04:09:31'),(20,3,11,'2017-03-16',0.00,'2017-03-12 08:12:24','2017-03-12 08:12:24'),(21,3,4,'2017-03-16',0.00,'2017-03-12 08:12:24','2017-03-12 08:12:24'),(22,3,12,'2017-03-16',0.00,'2017-03-12 08:12:24','2017-03-12 08:12:24'),(23,3,6,'2017-03-24',0.00,'2017-03-23 00:16:30','2017-03-23 00:16:30'),(24,3,10,'2017-03-24',0.00,'2017-03-23 00:16:30','2017-03-23 00:16:30'),(25,15,13,'2017-03-24',0.00,'2017-03-23 00:16:30','2017-03-23 00:16:30');
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Vo','Tung gggg',2,'GC60314',NULL,NULL,'2017-03-01 22:38:06'),(2,'Phan Thanh','Ti',1,'asdas dsada',NULL,NULL,'2017-03-01 21:05:45'),(3,'Nguyen','Hue',10,'GC31112',NULL,NULL,'2017-03-02 09:03:15'),(4,'Tài','Nguyễn Văn',9,'GC112322','2017-03-02 08:31:14','2017-03-01 21:56:54','2017-03-02 08:31:14'),(15,'VHQ','TUNG',4,'221383934',NULL,'2017-03-02 08:12:45','2017-03-02 08:12:53'),(16,'TEO','VO',1,'GC501122',NULL,'2017-03-02 08:47:54','2017-03-02 08:47:54'),(17,'TEO','VO',1,'GC50232',NULL,'2017-03-02 08:50:17','2017-03-02 08:50:17'),(18,'CCC','aAA',6,'GC5011222',NULL,'2017-03-02 08:51:38','2017-03-02 09:03:07'),(19,'sadsad','asdA',9,'C221233',NULL,'2017-03-02 09:03:37','2017-03-02 09:03:37'),(20,'asdasdsada','asdASD',10,'sdasdasd',NULL,'2017-03-02 09:46:35','2017-03-02 09:46:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_specialities`
--

LOCK TABLES `subject_specialities` WRITE;
/*!40000 ALTER TABLE `subject_specialities` DISABLE KEYS */;
INSERT INTO `subject_specialities` VALUES (44,13,1,NULL,'2017-03-06 19:00:59','2017-03-06 19:00:59'),(45,3,1,NULL,'2017-03-06 19:00:59','2017-03-06 19:00:59'),(46,4,1,NULL,'2017-03-06 19:00:59','2017-03-06 19:00:59'),(47,13,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(48,11,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(49,2,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(50,3,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(51,4,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(52,12,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(53,6,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(54,10,3,NULL,'2017-03-08 00:36:27','2017-03-08 00:36:27'),(55,13,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(56,11,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(57,2,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(58,4,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(59,12,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(60,5,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34'),(61,10,2,NULL,'2017-03-08 01:22:34','2017-03-08 01:22:34');
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
INSERT INTO `subjects` VALUES (1,'Môn ABC DEF','2017-03-02 08:14:10',NULL,'2017-03-02 08:14:10'),(2,'Môn B',NULL,NULL,NULL),(3,'Môn C',NULL,NULL,NULL),(4,'Môn D',NULL,NULL,'2017-03-02 02:18:54'),(5,'Môn E',NULL,NULL,'2017-03-02 02:18:56'),(6,'Môn F',NULL,NULL,'2017-03-02 07:05:43'),(7,'Môn G',NULL,NULL,'2017-03-02 02:15:33'),(8,'Môn TESTS',NULL,'2017-03-02 07:38:49','2017-03-02 07:38:49'),(9,'TESTING 01','2017-03-02 08:11:05','2017-03-02 08:11:05','2017-03-02 09:04:10'),(10,'Môn TESTING',NULL,'2017-03-02 08:13:37','2017-03-02 08:13:37'),(11,'Hello Bacsi',NULL,'2017-03-02 08:15:40','2017-03-02 08:15:40'),(12,'Môn Dự bị',NULL,'2017-03-02 08:19:38','2017-03-02 08:19:38'),(13,'Demo AloAlo',NULL,'2017-03-02 09:03:57','2017-03-02 09:04:25');
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
INSERT INTO `users` VALUES (1,'admin','admin@yahoo.com','$2y$10$YLOtIZvoLXTMVH.oCB/0JO9b4esua7H6YFlsl8.lKKP6KnXf34MmS','DbQ916wqLwVbTrOTFv7iHFOr8nJsJFgBqD4lzKQ5qT8zGrxWSGl4xa167FSe',NULL,NULL);
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

-- Dump completed on 2017-03-23 22:59:15
