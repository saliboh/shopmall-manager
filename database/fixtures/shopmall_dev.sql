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
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` (`id`, `user_id`, `name`, `floor`, `visit`, `created_at`, `updated_at`) VALUES (1,4,'Harmon Prohaska',2,841,'2021-09-08 01:16:25','2021-09-08 01:16:25'),(2,4,'Julien Kreiger',2,191,'2021-09-08 01:16:25','2021-09-08 01:16:25'),(3,4,'Travis Hills',9,448,'2021-09-08 01:16:25','2021-09-08 01:16:25'),(4,5,'Wilfredo Lubowitz',4,563,'2021-09-08 01:16:25','2021-09-08 01:16:25'),(5,5,'Giovanna Bradtke',0,355,'2021-09-08 01:16:25','2021-09-08 01:16:25'),(6,5,'Bell Abernathy',4,871,'2021-09-08 01:16:25','2021-09-08 01:16:25');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES (1,'Super Admin','superadmin@example.com','2021-09-08 01:16:17','$2y$10$OWS7gbULH1M/rYW.POyxieg4elkRzIBnMEWTcyLEeU3SXKNVsxWbq','mg3xH4oRGS','2021-09-08 01:16:17','2021-09-08 01:16:17','super-admin'),(2,'Shop Manager','shop-manager@example.com','2021-09-08 01:16:18','$2y$10$PsTMKXanKHiSTTQ2ppGSXee0UOF.ysQd2Rla4uNR6vAnYdk9HZoQi','u6ic5fyjuz','2021-09-08 01:16:18','2021-09-08 01:16:18','shop-manager'),(3,'Store Owner','store-owner@example.com','2021-09-08 01:16:18','$2y$10$97N4S1QLUcN19JliwUOSuOx9gq6V3y4vwusnRtsPLxLNTJnaOQcrG','sRZu2xqx5w','2021-09-08 01:16:18','2021-09-08 01:16:18','store-owner'),(4,'Marian Steuber PhD','elvie32@example.org','2021-09-08 01:16:24','$2y$10$6v2QfYTdPEIq66IyBUHMD.nhUX1WQ2hf9vriZC4zBN1CqgtJ7Ym6y','CXvYmzmFXS','2021-09-08 01:16:24','2021-09-08 01:16:24','store-owner'),(5,'Winnifred Abshire','blaise19@example.net','2021-09-08 01:16:25','$2y$10$ki1J8dC3yeuqzRQA/zD2Re1nQf9kS1FdBUPrASBgXsbFoiKOM6mEu','ZQG3wSmdCH','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(6,'Beaulah Barton','josinski@example.net','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','wuJfUhP61K','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(7,'Mr. Emmitt Wintheiser','mozelle60@example.org','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','hbldI2q5TM','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(8,'Billy Klocko','santa.lueilwitz@example.net','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MUix9Jixq6','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(9,'Mrs. Letha Parisian','ckunde@example.com','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','0Wbj8K0KGd','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(10,'Winfield Bogan','ywilkinson@example.net','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ovnNK2RQPE','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner'),(11,'Dr. Mikel Marks','declan.hane@example.org','2021-09-08 01:16:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','xjkJTCPTx0','2021-09-08 01:16:25','2021-09-08 01:16:25','store-owner');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-08  1:18:35
