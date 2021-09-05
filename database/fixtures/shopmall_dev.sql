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
INSERT INTO `mall_shops` (`id`, `user_id`, `name`, `floor_number`, `created_at`, `updated_at`) VALUES (1,1,'Miss Anita Labadie',1,'2021-09-05 08:22:28','2021-09-05 08:22:28'),(2,1,'Annie Parisian MD',55,'2021-09-05 08:22:28','2021-09-05 08:22:28'),(3,1,'Corine Homenick',79,'2021-09-05 08:22:28','2021-09-05 08:22:28'),(4,1,'Glen Smith',78,'2021-09-05 08:22:28','2021-09-05 08:22:28'),(5,1,'Gerald Spencer',57,'2021-09-05 08:22:28','2021-09-05 08:22:28'),(6,5,'Kennith Gulgowski IV',72,'2021-09-05 08:22:53','2021-09-05 08:22:53'),(7,5,'Stanford Schuster',64,'2021-09-05 08:22:53','2021-09-05 08:22:53'),(8,5,'Frank Yost',78,'2021-09-05 08:22:53','2021-09-05 08:22:53'),(9,5,'Mr. Orval Ratke I',94,'2021-09-05 08:22:53','2021-09-05 08:22:53'),(10,5,'Tommie Bahringer',36,'2021-09-05 08:22:53','2021-09-05 08:22:53');
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
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES (1,'Antonia Kiehn','melyna.wilkinson@example.com','2021-09-05 08:22:28','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','9SQmpfw955','2021-09-05 08:22:28','2021-09-05 08:22:28','store-owner'),(2,'Super Admin','superadmin@example.com','2021-09-05 08:22:32','$2y$10$5ryoVeGlYomu2PJOGqn7Xe9ui8BrCMBq3z/gtleFPCYu6OnO8HQ2.','qp0h4U0pJj','2021-09-05 08:22:32','2021-09-05 08:22:32','super-admin'),(3,'Shop Manager','shop-manager@example.com','2021-09-05 08:22:32','$2y$10$vPVk92MAJyYljClNctNOuuXxB2VuIH78h.WHQiN2/dVXnsDn89K/W','YkxDRa4wZx','2021-09-05 08:22:32','2021-09-05 08:22:32','shop-manager'),(4,'Store Owner','store-owner@example.com','2021-09-05 08:22:32','$2y$10$wRPk5iNc7mi4m7UiO6gqseesasqgv7Xg21ZPGEPHWTw76UZR3EGo6','aXfPUHwDwM','2021-09-05 08:22:32','2021-09-05 08:22:32','store-owner'),(5,'Ms. Romaine Johnson','reinger.leatha@example.net','2021-09-05 08:22:53','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','xgrW9nYPYX','2021-09-05 08:22:53','2021-09-05 08:22:53','store-owner');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-05  8:55:38
