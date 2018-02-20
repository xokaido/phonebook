-- MySQL dump 10.16  Distrib 10.2.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pi
-- ------------------------------------------------------
-- Server version	10.2.12-MariaDB

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_address` (`ip_address`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (20180213111537);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phonebooks`
--

DROP TABLE IF EXISTS `phonebooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phonebooks` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `notes` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonebooks`
--

LOCK TABLES `phonebooks` WRITE;
/*!40000 ALTER TABLE `phonebooks` DISABLE KEYS */;
INSERT INTO `phonebooks` VALUES (3,1,'1818181','nananananan','slslslsl','0000-00-00 00:00:00','2018-02-14 02:28:37'),(4,1,'1818181','nananananan','slslslsl','0000-00-00 00:00:00','2018-02-14 02:28:45'),(5,1,'18282837','Item name','link','0000-00-00 00:00:00','2018-02-14 02:54:24'),(6,1,'1919191919191919191','item name','item link','0000-00-00 00:00:00','2018-02-14 03:17:27'),(7,1,'n/a','n/a','n/a','2018-02-14 07:58:30','2018-02-14 03:58:30'),(8,1,'n/a','n/a','n/a','2018-02-14 07:59:36','2018-02-14 03:59:36'),(9,1,'n/a','n/a','n/a','2018-02-14 08:00:10','2018-02-14 04:00:10'),(10,1,'n/a','n/a','n/a','2018-02-14 08:04:27','2018-02-14 04:04:27'),(11,1,'n/a','n/a','n/a','2018-02-14 08:04:41','2018-02-14 04:04:41'),(12,1,'n/a','n/a','n/a','2018-02-14 08:05:20','2018-02-14 04:05:20'),(13,1,'n/a','n/a','n/a','2018-02-14 08:05:53','2018-02-14 04:05:53'),(14,1,'n/a','n/a','n/a','2018-02-14 08:07:49','2018-02-14 04:07:49');
/*!40000 ALTER TABLE `phonebooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(55) NOT NULL DEFAULT '',
  `sku_model` bigint(15) NOT NULL DEFAULT 198287,
  `itemname` varchar(50) NOT NULL DEFAULT '',
  `itemdescription` text NOT NULL DEFAULT '',
  `itemupc` bigint(15) NOT NULL DEFAULT 198287,
  `singleitemlength` varchar(5) NOT NULL DEFAULT '',
  `singleitemweight` varchar(5) NOT NULL DEFAULT '',
  `singleitemwidth` varchar(5) NOT NULL DEFAULT '',
  `singleitemheight` varchar(5) NOT NULL DEFAULT '',
  `singleitemdepth` varchar(5) NOT NULL DEFAULT '',
  `singlepackagelength` varchar(5) NOT NULL DEFAULT '',
  `singlepackagewidth` varchar(5) NOT NULL DEFAULT '',
  `singlepackageheight` varchar(5) NOT NULL DEFAULT '',
  `singlepackageweight` varchar(5) NOT NULL DEFAULT '',
  `itemdimunit` varchar(5) NOT NULL DEFAULT '',
  `itemweightunit` varchar(5) NOT NULL DEFAULT '',
  `packagedimunit` varchar(5) NOT NULL DEFAULT '',
  `liquid` tinyint(1) NOT NULL DEFAULT 0,
  `glass` tinyint(1) NOT NULL DEFAULT 0,
  `sealedcap` tinyint(1) NOT NULL DEFAULT 0,
  `packagingtype` varchar(20) NOT NULL DEFAULT '',
  `itemfluidounces` float(2,2) NOT NULL DEFAULT 0.00,
  `itemvolumemil` int(5) unsigned NOT NULL DEFAULT 0,
  `itemingredients` varchar(250) NOT NULL DEFAULT '',
  `itembenefits` text NOT NULL DEFAULT '',
  `itemsuggesteduse` varchar(250) NOT NULL DEFAULT '',
  `itemdirections` text NOT NULL DEFAULT '',
  `itemcountryoforigin` varchar(50) NOT NULL DEFAULT '',
  `shelflife` varchar(50) NOT NULL DEFAULT '',
  `itemmainimagelink` varchar(250) NOT NULL DEFAULT '',
  `itemimagelink2` varchar(250) NOT NULL DEFAULT '',
  `itemimagelink3` varchar(250) NOT NULL DEFAULT '',
  `itemimagelink4` varchar(250) NOT NULL DEFAULT '',
  `itemimagelink5` varchar(250) NOT NULL DEFAULT '',
  `electroniccomponent` varchar(50) NOT NULL DEFAULT '',
  `voltage` varchar(20) NOT NULL DEFAULT '',
  `electriccertification` varchar(50) NOT NULL DEFAULT '',
  `itemcasepack` varchar(50) NOT NULL DEFAULT '',
  `casepackupc` varchar(50) NOT NULL DEFAULT '',
  `innerpackupc` varchar(50) NOT NULL DEFAULT '',
  `singleitemcostusd` float(4,2) NOT NULL DEFAULT 0.00,
  `singleitemretailusd` float(4,2) NOT NULL DEFAULT 0.00,
  `singleitemmapusd` varchar(25) NOT NULL DEFAULT '',
  `batteriesrequired` tinyint(1) NOT NULL DEFAULT 0,
  `batteriesincluded` tinyint(1) NOT NULL DEFAULT 0,
  `howmanybatteries` int(2) NOT NULL DEFAULT 0,
  `batterytype` int(3) NOT NULL DEFAULT 0,
  `brandstory` text NOT NULL DEFAULT '',
  `itemsioc` tinyint(1) NOT NULL DEFAULT 0,
  `itempfp` tinyint(1) NOT NULL DEFAULT 0,
  `duallanguage` tinyint(1) NOT NULL DEFAULT 0,
  `hazmat` tinyint(1) NOT NULL DEFAULT 0,
  `unnumber` tinyint(1) NOT NULL DEFAULT 0,
  `canadiancert` tinyint(1) NOT NULL DEFAULT 0,
  `datesubmittedtoamazon` datetime NOT NULL DEFAULT current_timestamp(),
  `amazonasin` varchar(20) NOT NULL DEFAULT '',
  `amazonlivelink` varchar(250) NOT NULL DEFAULT '',
  `msdslink` varchar(250) NOT NULL DEFAULT '',
  `datesubmittedtodb` datetime NOT NULL DEFAULT current_timestamp(),
  `warnings` varchar(250) NOT NULL DEFAULT '',
  `whatsincluded` varchar(250) NOT NULL DEFAULT '',
  `amazontitle` varchar(150) NOT NULL DEFAULT '',
  `amazonbulletpoint1` varchar(250) NOT NULL DEFAULT '',
  `amazonbulletpoint2` varchar(250) NOT NULL DEFAULT '',
  `amazonbulletpoint3` varchar(250) NOT NULL DEFAULT '',
  `amazonbulletpoint4` varchar(250) NOT NULL DEFAULT '',
  `amazonbulletpoint5` varchar(250) NOT NULL DEFAULT '',
  `amazondescription` text NOT NULL DEFAULT '',
  `amazonkeywords` varchar(250) NOT NULL DEFAULT '',
  `labellanguages` varchar(250) NOT NULL DEFAULT '',
  `amazonchannel` varchar(250) NOT NULL DEFAULT '',
  `amazonvendorcode` varchar(250) NOT NULL DEFAULT '',
  `amazonsubmissionid` int(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku_model` (`sku_model`),
  UNIQUE KEY `itemupc` (`itemupc`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (49,'xok',18904,'Name 1','',2004,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-19 12:19:40','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(50,'xokaido',18905,'Name 2','',2005,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-19 12:19:49','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(51,'added',18906,'Name 3','',2006,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-19 19:32:56','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(52,'added another one',18907,'Name 4','',2007,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(53,'added another one',18908,'Name 50','',2008,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(54,'Brand name',8388607,'Name 60','',8388607,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-17 22:45:47','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(55,'Upload and edit works',198287,'Name 70','',198287,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-18 14:46:08','','','','2018-02-14 20:09:50','','','','','','','','','','','','slslslslslsl','',0),(56,'added another one',18903,'Name 80','',2003,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-18 14:46:56','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(57,'checking add product',1111111,'Name 90','',2222222,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-18 15:01:23','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(62,'slslslslslsls',99922,'Name 10','',3333444,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-18 15:30:14','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(63,'slslslslslsls',99923,'','',3333443,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'2018-02-18 15:30:57','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(66,'checking add product',1111112,'','',2222223,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(67,'checking add product',1111113,'','',2222224,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(68,'checking add product',1111114,'','',2222225,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(69,'checking add product',1111115,'','',2222226,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(70,'checking add product',1111116,'','',2222227,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(71,'checking add product',1111117,'','',2222228,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(72,'checking add product',1111118,'','',2222229,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(73,'checking add product',1111119,'','',2222230,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(74,'checking add product',1111120,'','',2222231,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(75,'checking add product',1111121,'','',2222232,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(76,'checking add product',1111122,'','',2222233,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(77,'checking add product',1111123,'','',2222234,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0),(78,'checking add product',1111124,'','',2222235,'','','','','','','','','','','','',0,0,0,'',0.00,0,'','','','','','','','','','','','','','','','','',0.00,0.00,'',0,0,0,0,'',0,0,0,0,0,0,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','','','','','','','','','','','','','',0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','admin@admin.com','59zE6QwGByDHk','9462e8eee0','admin@admin.com','',NULL,NULL,'C/bgbMIlFodYWQWW/eS2J.',1268889823,1519055425,1,'Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-19 20:05:33
