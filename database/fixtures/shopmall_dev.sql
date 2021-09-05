-- MariaDB dump 10.19  Distrib 10.5.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: db    Database: shopmall
-- ------------------------------------------------------
-- Server version	5.7.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mall_shops`
--

LOCK TABLES `mall_shops` WRITE;
/*!40000 ALTER TABLE `mall_shops` DISABLE KEYS */;
INSERT INTO `mall_shops` (`id`, `user_id`, `name`, `floor_number`, `store_visits`, `created_at`, `updated_at`) VALUES (1,4,'Ms. Alexa Parker',40,37,'2021-09-05 09:31:55','2021-09-05 09:31:55'),(2,4,'Nickolas Beier',21,99,'2021-09-05 09:31:55','2021-09-05 09:31:55'),(3,4,'Mrs. Elisha Leannon',85,35,'2021-09-05 09:31:55','2021-09-05 09:31:55'),(4,5,'Mr. Kristoffer Ratke',64,32,'2021-09-05 09:31:55','2021-09-05 09:31:55'),(5,5,'Mrs. Albertha Bergstrom PhD',69,52,'2021-09-05 09:31:55','2021-09-05 09:31:55'),(6,5,'Marielle Runte',31,68,'2021-09-05 09:31:55','2021-09-05 09:31:55');
/*!40000 ALTER TABLE `mall_shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES (1,'Super Admin','superadmin@example.com','2021-09-05 09:31:50','$2y$10$.Pvimk5vbwyjrcjRmRLkyu8i3D/QnnRZ.ZeByxn46IUUIv5gD1Wf.','ZnD2EkaGsg','2021-09-05 09:31:50','2021-09-05 09:31:50','super-admin'),(2,'Shop Manager','shop-manager@example.com','2021-09-05 09:31:50','$2y$10$GfNfaQ4FekZWXEJZkhPxH.1SiAU6JyJScEVFcqyWLEcw.FDnEd7wy','lTdFUagHJV','2021-09-05 09:31:50','2021-09-05 09:31:50','shop-manager'),(3,'Store Owner','store-owner@example.com','2021-09-05 09:31:51','$2y$10$ZOTNkFmFuaIVH63IkjjjN.9Dg22fllLfR1.tNJ6uUqltFvbGPoU3u','gaI7xfsHmU','2021-09-05 09:31:51','2021-09-05 09:31:51','store-owner'),(4,'Larissa Parker','qklocko@example.com','2021-09-05 09:31:54','$2y$10$vorPvL1yjb0vgbcFQ9.3D.HibgY5u4dlQhUUK0bV0PG7X1pjLWajm','1XgvXykGQc','2021-09-05 09:31:54','2021-09-05 09:31:54','store-owner'),(5,'Isabel Schinner DDS','vfunk@example.net','2021-09-05 09:31:55','$2y$10$2/8v9tj/e9jOVt.5r7ppZeeq02Vxq68Ib7/BAR.EogE6klpqs5j6i','zOBXkyTZ29','2021-09-05 09:31:55','2021-09-05 09:31:55','store-owner');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-05  9:32:00
