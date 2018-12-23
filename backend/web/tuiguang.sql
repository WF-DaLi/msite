-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: tuiguang
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `product_id` bigint(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mainpic` varchar(200) DEFAULT NULL,
  `itemUrl` varchar(200) DEFAULT NULL,
  `cate` varchar(100) DEFAULT NULL,
  `tbkUrl` varchar(200) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `sale` float DEFAULT NULL,
  `bl` float DEFAULT NULL,
  `yj` float DEFAULT NULL,
  `storeWw` varchar(100) DEFAULT NULL,
  `storeId` int(11) DEFAULT NULL,
  `storeName` varchar(100) DEFAULT NULL,
  `sass` tinyint(2) DEFAULT NULL COMMENT '1天猫 2 京东 3 苏宁易购',
  `couponId` varchar(100) DEFAULT NULL,
  `couponTotal` int(10) DEFAULT NULL,
  `couponAgent` varchar(100) DEFAULT NULL,
  `couponPrice` varchar(100) DEFAULT NULL,
  `couponBgtime` int(11) DEFAULT NULL,
  `couponEndtime` int(11) DEFAULT NULL,
  `couponUrl` varchar(200) DEFAULT NULL,
  `couponPushUrl` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (568033794205,'街头嘻哈潮流宽松短裤男夏天ins超火港风口袋潮牌余文乐工装裤子','http://img.alicdn.com/bao/uploaded/i2/1938808405/TB2o8ZjmMaTBuNjSszfXXXgfpXa_!!1938808405.jpg','https://item.taobao.com/item.htm?id=568033794205','男装','https://item.taobao.com/item.htm?id=568033794205&ali_trackid=2:mm_182360200_98400232_18620600467:1540563247_147_1638349619',89,147,6,5.34,'欣彩明珠',1938808405,'SEN工作室',1,'dbd92cec947e4089abd93f9f5473b113',22,'444','满80元减20元',2131231213,213213123,'https://login.taobao.com/member/login.jhtml?redirectURL=https%3A%2F%2Ftaoquan.taobao.com%2Fcoupon%2Funify_apply.htm%3FsellerId%3D1938808405%26activityId%3Ddbd92cec947e4089abd93f9f5473b113','https://uland.taobao.com/coupon/edetail?e=GJvgJwNIOr0N%2BoQUE6FNzGTMrsEzcw%2BJJR75j1uQP6rAqpRKCEVZyj6G%2FSodmxNkaM%2BrEA%2Fge4dR2nOrxVesx51wj1tzbEyahMTutZNjgjfekQ0WqaQBF4HntbNl40ggRhm3Ym7o%2FclKUpVNoZQW868TKfxLW1WPonv6QcvcARY%3D&af=1&pid=mm_182360200_98400232_18620600467');
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1540478368),('m130524_201442_init',1540478372);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sass`
--

DROP TABLE IF EXISTS `sass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sass` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sass`
--

LOCK TABLES `sass` WRITE;
/*!40000 ALTER TABLE `sass` DISABLE KEYS */;
INSERT INTO `sass` VALUES (1,'23',0),(2,'12',0),(3,'12',1),(4,'12',1),(5,'2',0),(6,'55K',0),(7,'京东ok',1),(8,'NTK-OK',0),(9,'阿尤撒',1),(10,'okdok',1),(11,'34567',1),(12,'天猫222',1);
/*!40000 ALTER TABLE `sass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `userimg` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userstatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','ES6C-FFAzXDo2T3s5gX3k6FkC33SLJPD','$2y$13$CKW2v6M/ceze3m/ATCWu2uoVQMFpyf7sexxoox9HRH5/4u7BMWp7q',NULL,'admin@admincom',1,1542583504,1543147340,NULL,1),(2,'root','XJ1QFIHuy9sF7dZw0NxOc4GnAY42ZY7x','$2y$13$MMA8.lU4A4Lsc6JobJSQveoFRmv4LivVq2mjEDuPyl6bZVZqzRedC',NULL,'root@mlab.com',2,1542640406,1543145955,NULL,1),(4,'zhangjun','8bkIck5unz9VSR76XrfdQ3ccAOEyCV6d','$2y$13$vuCCvyZJyPOKmaQf5oLJ5ewjkzM9.P7reSJQ4pfR.4r9zcMwrxxum',NULL,'zhangjun@mlab.com',2,1542641758,1543140412,NULL,1),(6,'123','_eVS9emfxz0dA6gGpZgOEaNGWPlH2YO9','$2y$13$OYoNH3BaMty3U.AcIAIcq.LnlEyJy9VnlbE8p/qRKJQTNSA2tMtwe',NULL,'123@mlab.com',2,1542720459,1542720459,NULL,1),(7,'rootabc','mJyB44HeSA1NsDOq9WOlsCSetqCke9I-','$2y$13$T7BxZoSNyvHsvdCAHxNoRO5TGG2Ri6MmSI8kYA.B2oEfH83qpBSX2',NULL,'rootabc@mlab.com',2,1542722798,1542722798,NULL,1),(8,'root123','yRyyDXe403wHjoTIEcN2HcSclw-GDo0a','$2y$13$vaiEAyg8uRmeQvXQhCxa/.izEX6FTzYbcd5CRSSb.LjDbprK8t.yC',NULL,'root123@mlab.com',2,1542722876,1542722876,NULL,1),(9,'abc99','NAbWVWYeOCt1l3E64K_9tB9HX0ArQ9dT','$2y$13$7e0hH95DTyRz9klPPWHpG.v1F8uFr4Dxd5WfUkiRepeVgpNQsLTgK',NULL,'abc99@mlab.com',2,1542722926,1543147054,NULL,1),(12,'7798','-za0UlpAvwXuMG-b9XleNU7V_OnyoQIt','$2y$13$BsJVVTO3uL8EWoywslvVk.y1qyqyNQpFvuSnemWFy5gMy48hvQSSS',NULL,'77@mlab.com',2,1542902683,1543152771,NULL,1),(13,'99','xUIL0w6QG-wDe4RjWbkIkHXK5CgG-ux5','$2y$13$FJtgssWlahFzZS58yKTHLOD2PDTPA6JMOoJHMc0LxNakvtQJ/MsiK',NULL,'99@mlab.com',2,1543148648,1543148648,NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-26  0:15:15
