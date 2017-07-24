-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: adoptabullPups
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `adoptabullPups`
--

DROP TABLE IF EXISTS `adoptabullPups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adoptabullPups` (
  `sex` varchar(1) DEFAULT NULL,
  `isFixed` tinyint(1) DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL,
  `breed` varchar(20) DEFAULT NULL,
  `narrative` varchar(512) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adoptabullPups`
--

LOCK TABLES `adoptabullPups` WRITE;
/*!40000 ALTER TABLE `adoptabullPups` DISABLE KEYS */;
INSERT INTO `adoptabullPups` VALUES ('M',0,'SpikeTheMutt.jpg','mutt','Spike is feisty!',7,'Spike','puppy','small',1),('F',1,'MillieAsleep.png','mutt','This is Millie.  Millie is an amazing dog.  Millie dog is best dog.  This is Millie the Dog.',9,'Millie','senior','large',1),('F',1,'MillieAwake.png','mutt','Millie is a sweet old soul with an amazing personality and terrible breath. ',13,'MillieMuffin','senior','large',1),('F',1,'Maggie.jpg','Daschund','Maggie loves to get zipped into your sweater so she can curl against you like a cat.',18,'Maggie','adult','xs',1),('F',1,'Maisie.png','Pit Bull','Maisie is a sweet dog-turned-bear with a cute grin.',19,'Maisie','adult','medium',1),('M',1,'Henry.png','Pit Bull','Henry is a loving pittie with a gigantic mouth and an even larger heart. His farts are toxic.',22,'Henry','adult','large',1),('F',1,'LillytheLabrador.jpg','Labrador Retriever','Lilly loves fetch!',27,'Lilly','puppy','medium',1);
/*!40000 ALTER TABLE `adoptabullPups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04  1:12:35
