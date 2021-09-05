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
INSERT INTO `mall_shops` (`id`, `user_id`, `name`, `floor_number`, `store_visits`, `created_at`, `updated_at`) VALUES (1,4,'Miss Noemy Stoltenberg',76,70,'2021-09-05 09:20:40','2021-09-05 09:20:40'),(2,4,'Alexys Leuschke',22,54,'2021-09-05 09:20:40','2021-09-05 09:20:40'),(3,4,'Raphaelle Ruecker',38,81,'2021-09-05 09:20:40','2021-09-05 09:20:40'),(4,4,'Dr. Scarlett Davis II',22,37,'2021-09-05 09:20:40','2021-09-05 09:20:40'),(5,4,'Kaitlyn Reichel',40,62,'2021-09-05 09:20:40','2021-09-05 09:20:40'),(6,5,'Darwin Marquardt III',38,24,'2021-09-05 09:21:08','2021-09-05 09:21:08'),(7,5,'Darrick Moen',51,2,'2021-09-05 09:21:08','2021-09-05 09:21:08'),(8,5,'Frankie Ernser',98,52,'2021-09-05 09:21:08','2021-09-05 09:21:08'),(9,5,'Mrs. Noemi Bruen I',5,69,'2021-09-05 09:21:08','2021-09-05 09:21:08'),(10,5,'Prof. Russel Becker',12,36,'2021-09-05 09:21:08','2021-09-05 09:21:08');
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
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES (1,'Super Admin','superadmin@example.com','2021-09-05 09:20:37','$2y$10$w7aHMPiO3XeyE4gq7.N9YegpF1aNUeeNGfdeYBqKzN9LuKYiS5efC','XTMcZVWPyN','2021-09-05 09:20:37','2021-09-05 09:20:37','super-admin'),(2,'Shop Manager','shop-manager@example.com','2021-09-05 09:20:37','$2y$10$Q8mIJQGWxFhO8hzqtEvgs.F.dpPReD/vCkn3Gv0TvVR4zNZjlNA02','AgioClJ4o1','2021-09-05 09:20:37','2021-09-05 09:20:37','shop-manager'),(3,'Store Owner','store-owner@example.com','2021-09-05 09:20:37','$2y$10$YrNd2koH/6HM95XdsN4BtO2jPwOACBA0w7X6r5KorxF3kGFf3oPQC','bZckZc7mR4','2021-09-05 09:20:37','2021-09-05 09:20:37','store-owner'),(4,'Phoebe Kovacek','lwunsch@example.com','2021-09-05 09:20:40','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','fF0MW6AuaL','2021-09-05 09:20:40','2021-09-05 09:20:40','store-owner'),(5,'Zola Schoen','izaiah.boehm@example.com','2021-09-05 09:21:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1Ossx5r3Ol','2021-09-05 09:21:08','2021-09-05 09:21:08','store-owner');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-05  9:21:16
