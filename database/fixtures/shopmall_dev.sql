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
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES (1,'App\\Models\\User',1,'myapptoken','493d82e955dd0cd085ba6150954c240a070164c1e4c55bce253e15c45b89d13f','[\"*\"]',NULL,'2021-09-09 08:24:32','2021-09-09 08:24:32');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` (`id`, `user_id`, `name`, `floor`, `visit`, `created_at`, `updated_at`) VALUES (1,4,'Prof. Aniya Heathcote',7,475,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(2,4,'Coleman Pacocha',2,641,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(3,4,'Prof. Orrin Ortiz',5,308,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(4,5,'Chet Hermann',2,790,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(5,5,'Donald Senger',9,548,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(6,5,'Prof. Jovany Heller III',6,710,'2021-09-09 08:24:19','2021-09-09 08:24:19'),(7,12,'Brionna Brekke',8,153,'2021-09-09 08:24:21','2021-09-09 08:24:21'),(8,12,'Mikayla Conroy',1,599,'2021-09-09 08:24:21','2021-09-09 08:24:21'),(9,12,'Deshaun Hodkiewicz',8,961,'2021-09-09 08:24:21','2021-09-09 08:24:21'),(10,13,'Sonya Olson',1,914,'2021-09-09 08:24:21','2021-09-09 08:24:21'),(11,13,'Stewart Herman',9,822,'2021-09-09 08:24:21','2021-09-09 08:24:21'),(12,13,'Makenzie Grady III',4,543,'2021-09-09 08:24:21','2021-09-09 08:24:21');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES (1,'Super Admin','superadmin@example.com','2021-09-09 08:24:13','$2y$10$1M4uSNM4G2I14/b.U/cG8eoTQzaxg0aqmUkfnyC2xnPmu58nTLc0.','u2nFqWhwa4','2021-09-09 08:24:13','2021-09-09 08:24:13','super-admin'),(2,'Shop Manager','shop-manager@example.com','2021-09-09 08:24:13','$2y$10$ZAsnVb6W.MVPU.dnWltg9ezBrjpw71pup1cB2XxrHdvYFibl8BOQK','TmUCWrOjIF','2021-09-09 08:24:13','2021-09-09 08:24:13','shop-manager'),(3,'Store Owner','store-owner@example.com','2021-09-09 08:24:13','$2y$10$bdhEfMTlaWJkVE/52fGL2uv48RnifTbqMkE..EnW3X6GGc/lnSFOy','vOau5dataa','2021-09-09 08:24:13','2021-09-09 08:24:13','store-owner'),(4,'Neha Cummings IV','jamey.upton@example.net','2021-09-09 08:24:19','$2y$10$X.xhXM/JsV4R0XRew5wnGO.rvqJdTuLLfbgRMOFP8KC01QSspR9S6','GViGbg4S6s','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(5,'Mr. Braden Harvey Sr.','beier.giovani@example.com','2021-09-09 08:24:19','$2y$10$NMgdahkLR.aNfgi3Y1UUGeNfEoiFhSWcdvdQ.eV8G6NjnshL6wXNm','r32eejj6zX','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(6,'Prof. Precious Larson','bertha10@example.org','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Z6B6tjx6vi','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(7,'Prof. Hardy Botsford DVM','alysson28@example.org','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','4wfNqqafbV','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(8,'Kyle Schowalter','rdurgan@example.com','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','qKRHTvjSI6','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(9,'Abdullah Leannon','mitchel26@example.com','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','McYTGVAGDN','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(10,'Ilene Jast','roscoe.bartoletti@example.net','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','5fdZbUXo9b','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(11,'Karina Schumm','lacey.osinski@example.net','2021-09-09 08:24:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MHs8GAwBBu','2021-09-09 08:24:19','2021-09-09 08:24:19','store-owner'),(12,'Kariane Tremblay','estevan.zieme@example.net','2021-09-09 08:24:21','$2y$10$PYd.lI2rzL/y2E7lXmkRlOedSH5SGn91FDztQ0yUS2dAtuM2Ga27S','bQybPI6g3C','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(13,'Dock Emard DVM','dlabadie@example.com','2021-09-09 08:24:21','$2y$10$nHynp4t0PYhKkhh10COILOmummlhkvD61LGGVqcxT1yWHdhBFRfJu','7megh0ljJO','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(14,'Zita Dare','crooks.rosanna@example.org','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','3k6jUt1HbH','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(15,'Savanna Murphy','isai06@example.com','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MZQpZpNQsU','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(16,'Prof. Katelin Walker III','nienow.mercedes@example.com','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','uphw7Moef5','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(17,'Eli Murray','kihn.cynthia@example.com','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','yJR1pj1ujq','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(18,'Kole Treutel','rsimonis@example.net','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','f6tf2LZeLJ','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner'),(19,'Kamryn Gaylord','makenna.rau@example.org','2021-09-09 08:24:21','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','e0l8IwT3BE','2021-09-09 08:24:21','2021-09-09 08:24:21','store-owner');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-09  8:25:02
