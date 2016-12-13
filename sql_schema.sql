-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: webprog.cs.ship.edu    Database: webprog27
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `Emails`
--

DROP TABLE IF EXISTS `Emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Emails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(45) NOT NULL,
  `Verified` tinyint(4) NOT NULL,
  `VerificationID` varchar(45) NOT NULL,
  `UnsubscribeID` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `UnsubscribeID_UNIQUE` (`UnsubscribeID`),
  UNIQUE KEY `VerificationID_UNIQUE` (`VerificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Emails`
--

LOCK TABLES `Emails` WRITE;
/*!40000 ALTER TABLE `Emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `Emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Events`
--

DROP TABLE IF EXISTS `Events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(140) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Events`
--

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;
INSERT INTO `Events` VALUES (8,'Hubabaloo','2016-12-20','You had to be there'),(9,'feafda','2016-12-09','fdafda'),(10,'feafda','2016-12-09','fdafda'),(11,'feafda','2016-12-01','fdafda'),(20,'Presentation','2016-12-13','Stuff happened, we rocked'),(21,'Nascar','2016-12-03','This is a description');
/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Points`
--

DROP TABLE IF EXISTS `Points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Points` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Points` int(11) DEFAULT NULL,
  `EventID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Event_&_Team_Unique` (`TeamID`,`EventID`),
  KEY `ID_idx` (`TeamID`),
  KEY `EventID_idx` (`EventID`),
  CONSTRAINT `EventID` FOREIGN KEY (`EventID`) REFERENCES `Events` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `ID` FOREIGN KEY (`TeamID`) REFERENCES `Teams` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Points`
--

LOCK TABLES `Points` WRITE;
/*!40000 ALTER TABLE `Points` DISABLE KEYS */;
INSERT INTO `Points` VALUES (55,15,20,14),(56,8,20,15),(57,11,20,16),(58,0,21,14),(59,1,21,15),(60,-3,21,16);
/*!40000 ALTER TABLE `Points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `PointsPerTeamPerEvent`
--

DROP TABLE IF EXISTS `PointsPerTeamPerEvent`;
/*!50001 DROP VIEW IF EXISTS `PointsPerTeamPerEvent`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `PointsPerTeamPerEvent` AS SELECT 
 1 AS `EventID`,
 1 AS `1`,
 1 AS `2`,
 1 AS `3`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `TeamTotalPoints`
--

DROP TABLE IF EXISTS `TeamTotalPoints`;
/*!50001 DROP VIEW IF EXISTS `TeamTotalPoints`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `TeamTotalPoints` AS SELECT 
 1 AS `ID`,
 1 AS `Points`,
 1 AS `TeamID`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Teams`
--

DROP TABLE IF EXISTS `Teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Logo` varchar(45) NOT NULL,
  `Color` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teams`
--

LOCK TABLES `Teams` WRITE;
/*!40000 ALTER TABLE `Teams` DISABLE KEYS */;
INSERT INTO `Teams` VALUES (14,'Null_Pointer','/webprog27/assets/images/Nullpointer.png','#FF0000'),(15,'Off_By_One','/webprog27/assets/images/OffByOne.png','#131396'),(16,'Out_Of_Bounds','/webprog27/assets/images/OutOfBounds.png','#229613');
/*!40000 ALTER TABLE `Teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `Token` varchar(45) DEFAULT NULL,
  `TokenValidity` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (46,'raistlin','$2y$10$kxx8LIIJrewHrMZi8Gk4d.ogMkHwIwCFhz9csAZzIi69AtJNcVpLi','2016-12-13 14:47:42',NULL,'2016-12-13 14:47:42'),(58,'dr5801','$2y$10$KY0VpdsRvGqY0Rxm6F6uXuZO31Vs6si1/gSKOOEPdlWHZbzubrYqW','2016-12-12 21:13:48',NULL,'2016-12-12 21:13:48'),(75,'test','$2y$10$QBrLow0K5ZU2JZtZpF7HXOjP/l7oCGEmg7Gie1rQLnSrTUeiN8M06','2016-12-13 14:06:00','b5bc301e16c58560692821a315bfacee8097c6a3','2016-12-13 14:06:00'),(76,'drew','$2y$10$gWlJcjpvbYbYVqPUyuxU3Or6A8JwgGWLHyioaa7B8ui0CrYLunfkm','2016-12-13 12:51:25','675ae276a89c9d06c22316c2c6b1a2ee16b103b7','2016-12-13 12:51:25'),(79,'cdgira','$2y$10$fHkQ1chO1bXEVP1vROekbOUYN0lVL2Dmpd4Av/IS0ZFvEUkTeHrHa','2016-12-13 14:28:49',NULL,'2016-12-13 14:28:49'),(80,';;;','$2y$10$Y0xuYhcgRUa1mtAQfuJnvOw9AYMHroxErhPiZM5sYzgRCT2taXso6','2016-12-13 14:47:55','295395edb4e2dcc697c7129359f5fa63590448ee','2016-12-13 14:47:55');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `PointsPerTeamPerEvent`
--

/*!50001 DROP VIEW IF EXISTS `PointsPerTeamPerEvent`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`webprog27`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `PointsPerTeamPerEvent` AS select `Points`.`EventID` AS `EventID`,sum(if((`Points`.`TeamID` = '1'),`Points`.`Points`,0)) AS `1`,sum(if((`Points`.`TeamID` = '2'),`Points`.`Points`,0)) AS `2`,sum(if((`Points`.`TeamID` = '3'),`Points`.`Points`,0)) AS `3` from `Points` group by `Points`.`EventID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `TeamTotalPoints`
--

/*!50001 DROP VIEW IF EXISTS `TeamTotalPoints`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`webprog27`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `TeamTotalPoints` AS select `Points`.`ID` AS `ID`,sum(`Points`.`Points`) AS `Points`,`Points`.`TeamID` AS `TeamID` from `Points` group by `Points`.`TeamID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13 10:07:16
