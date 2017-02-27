-- MySQL dump 10.13  Distrib 5.7.15, for Win64 (x86_64)
--
-- Host: localhost    Database: saleproject
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `productdesc` varchar(200) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `dateadded` date DEFAULT NULL,
  `timeadded` time DEFAULT NULL,
  `purchases` int(11) DEFAULT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogue`
--

LOCK TABLES `catalogue` WRITE;
/*!40000 ALTER TABLE `catalogue` DISABLE KEYS */;
INSERT INTO `catalogue` VALUES (1,'Varsity Jacket',350000,'Black Varsity Jacket for Men. Material : cotton','khloeXmark','2016-09-21','13:04:56',3,'img/1.jpg'),(2,'Mi Colorful Earphone',200000,'Available color : blue, black, purple, and pink','tweety','2016-10-05','14:34:13',20,'img/2.jpg'),(3,'Batik Dress',200000,'Limited Stock','bobobo','2016-10-05','14:37:45',20,'img/3.jpg');
/*!40000 ALTER TABLE `catalogue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,5),(1,6),(2,1),(2,3),(2,6),(3,6),(3,2),(3,5);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `purchase_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `seller` varchar(30) DEFAULT NULL,
  `buyer` varchar(30) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `consignee` varchar(100) DEFAULT NULL,
  `fulladdress` varchar(250) DEFAULT NULL,
  `postalcode` int(5) DEFAULT NULL,
  `newphonenumber` varchar(12) DEFAULT NULL,
  `creditcard` varchar(12) DEFAULT NULL,
  `verification` varchar(3) DEFAULT NULL,
  `datebought` date DEFAULT NULL,
  `timebought` time DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdata` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `fulladdress` varchar(250) DEFAULT NULL,
  `postalcode` int(5) DEFAULT NULL,
  `phonenumber` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
INSERT INTO `userdata` VALUES (1,'Yuliana Indah','yuli1203','yuli1203@yahoo.com','Uytf43ewq','Jalan Cempaka Putih no. 45 Banten',42434,'085276128779'),(2,'Dwi Ibrahim','ibrahim','ibrahim@gmail.com','i7vR12eR','Jalan Mercusuar no. 23 Surabaya',60185,'081644871644'),(3,'Stella Eveline','StellaEveline','stellaeveline@gmail.com','n19GR65q','Komplek Nusa Indah R4 Lampung',35141,'089862423242'),(4,'Chandra Kiem','kiemchandra','chandrak@rocketmail.com','7Y12Sqe5','Mercure Apartment Pengumben Jakarta',12210,'087823665876'),(5,'Malvin Juanda','maju','maju@gmail.com','majusexy','Jln. Horas no. 90 Medan',20211,'087812336512'),(6,'Evita Chandra','itaita','itaita@yahoo.com','itaitachan','Jln. Blabla no. 8 Cirebon',45112,'085698751256'),(7,'Taufic Leonardi','tauficls','tauficls@ymail.com','tauficunyu','Jln. Sutomo 1 Medan',32651,'082145784321');
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-07 12:09:06
