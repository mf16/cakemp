-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cakemp
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (4,'','blah blah','password'),(5,'','asdf','asdf'),(6,'','lksajdgl','asdf'),(7,'','lksajdgl','asdf'),(8,'','asdf','asdf'),(9,'','new account free credits','asdf'),(10,'','asdfasdf','asdf'),(11,'','asdfasdf','asdf'),(12,'','asdf','asdf'),(13,'','asdfasdf','asdf'),(14,'','asdfasdf','asdf'),(15,'','asdf','asdf'),(16,'','asdf','asdf');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (7,'img/uploads/27_1432707452_cliff_drop.jpg','cliff_drop.jpg'),(8,'img/uploads/27_1432707525_cliff_drop.jpg','cliff_drop.jpg'),(9,'img/uploads/27_1432707533_cliff_drop.jpg','cliff_drop.jpg'),(10,'img/uploads/27_1432707549_boots.jpg','boots.jpg');
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments_tasks`
--

DROP TABLE IF EXISTS `attachments_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments_tasks` (
  `attachment_id` int(10) unsigned NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`attachment_id`,`task_id`),
  KEY `fk_attachments_tasks_2_idx` (`task_id`),
  CONSTRAINT `fk_attachments_tasks_1` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attachments_tasks_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments_tasks`
--

LOCK TABLES `attachments_tasks` WRITE;
/*!40000 ALTER TABLE `attachments_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tasks_id` int(11) NOT NULL,
  `bidder_id` varchar(45) NOT NULL,
  `work_time` decimal(5,2) NOT NULL COMMENT 'hours',
  `wait_time` int(11) DEFAULT NULL COMMENT 'days',
  PRIMARY KEY (`id`,`tasks_id`),
  KEY `fk_bids_tasks1_idx` (`tasks_id`),
  CONSTRAINT `fk_bids_tasks1` FOREIGN KEY (`tasks_id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (3,27,'63',2.00,2),(4,27,'63',2.00,1);
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_packages`
--

DROP TABLE IF EXISTS `credit_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_packages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `credits` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `recurring` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_packages`
--

LOCK TABLES `credit_packages` WRITE;
/*!40000 ALTER TABLE `credit_packages` DISABLE KEYS */;
INSERT INTO `credit_packages` VALUES (1,'Starter','This is your basic starter package.',10,15.00,0),(2,'Coolio','THis is super rad, yo',15,17.25,0),(3,'Recurring','Get a discount for recurring',10,13.00,1);
/*!40000 ALTER TABLE `credit_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_statuses`
--

DROP TABLE IF EXISTS `credit_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_statuses`
--

LOCK TABLES `credit_statuses` WRITE;
/*!40000 ALTER TABLE `credit_statuses` DISABLE KEYS */;
INSERT INTO `credit_statuses` VALUES (1,'unused'),(2,'used');
/*!40000 ALTER TABLE `credit_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credits`
--

DROP TABLE IF EXISTS `credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(2) NOT NULL DEFAULT '1',
  `purchase_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_credits_credits_statuses_idx` (`status`),
  KEY `fk_credits_purchases1_idx` (`purchase_id`),
  KEY `fk_credits_accounts1_idx` (`account_id`),
  CONSTRAINT `credit_status_id` FOREIGN KEY (`status`) REFERENCES `credit_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credits`
--

LOCK TABLES `credits` WRITE;
/*!40000 ALTER TABLE `credits` DISABLE KEYS */;
INSERT INTO `credits` VALUES (63,2,0,16,'2015-05-27 07:53:29','free'),(64,2,0,16,'2015-05-27 07:53:29','free');
/*!40000 ALTER TABLE `credits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_statuses`
--

DROP TABLE IF EXISTS `permission_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_statuses`
--

LOCK TABLES `permission_statuses` WRITE;
/*!40000 ALTER TABLE `permission_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `account_id` int(11) NOT NULL,
  `github_url` varchar(255) DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  KEY `fk_projects_accounts1_idx` (`account_id`),
  CONSTRAINT `fk_projects_accounts1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (3,'Kissr',16,'www.github.com/kissr','this is tyler\'s baby'),(4,'new project',16,'','yayyyy new project');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_permissions`
--

DROP TABLE IF EXISTS `projects_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_permissions` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `fk_projects_has_users_users1_idx` (`user_id`),
  KEY `fk_projects_has_users_projects1_idx` (`project_id`),
  KEY `fk_project_permissions_permissions_statuses1_idx` (`status_id`),
  CONSTRAINT `fk_projects_has_users_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_permissions_permissions_statuses1` FOREIGN KEY (`status_id`) REFERENCES `permission_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_permissions`
--

LOCK TABLES `projects_permissions` WRITE;
/*!40000 ALTER TABLE `projects_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `credit_package_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchases_accounts1_idx` (`account_id`),
  KEY `fk_purchases_credit_packages1_idx` (`credit_package_id`),
  CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `credit_package_id` FOREIGN KEY (`credit_package_id`) REFERENCES `credit_packages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skillsets`
--

DROP TABLE IF EXISTS `skillsets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skillsets` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skillsets`
--

LOCK TABLES `skillsets` WRITE;
/*!40000 ALTER TABLE `skillsets` DISABLE KEYS */;
INSERT INTO `skillsets` VALUES (1,'PHP'),(2,'MySQL'),(3,'HTML'),(4,'Javascript');
/*!40000 ALTER TABLE `skillsets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skillsets_tasks`
--

DROP TABLE IF EXISTS `skillsets_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skillsets_tasks` (
  `task_id` int(11) NOT NULL,
  `skillset_id` int(11) NOT NULL,
  PRIMARY KEY (`task_id`,`skillset_id`),
  KEY `fk_tasks_has_skillsets_skillsets1_idx` (`skillset_id`),
  KEY `fk_tasks_has_skillsets_tasks1_idx` (`task_id`),
  CONSTRAINT `fk_tasks_has_skillsets_skillsets1` FOREIGN KEY (`skillset_id`) REFERENCES `skillsets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tasks_has_skillsets_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skillsets_tasks`
--

LOCK TABLES `skillsets_tasks` WRITE;
/*!40000 ALTER TABLE `skillsets_tasks` DISABLE KEYS */;
INSERT INTO `skillsets_tasks` VALUES (27,3);
/*!40000 ALTER TABLE `skillsets_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skillsets_users`
--

DROP TABLE IF EXISTS `skillsets_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skillsets_users` (
  `user_id` int(11) NOT NULL,
  `skillset_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`skillset_id`),
  KEY `fk_users_has_skillsets_skillsets1_idx` (`skillset_id`),
  KEY `fk_users_has_skillsets_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_skillsets_skillsets1` FOREIGN KEY (`skillset_id`) REFERENCES `skillsets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_skillsets_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skillsets_users`
--

LOCK TABLES `skillsets_users` WRITE;
/*!40000 ALTER TABLE `skillsets_users` DISABLE KEYS */;
INSERT INTO `skillsets_users` VALUES (63,1),(63,2);
/*!40000 ALTER TABLE `skillsets_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_statuses`
--

DROP TABLE IF EXISTS `task_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '			',
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_statuses`
--

LOCK TABLES `task_statuses` WRITE;
/*!40000 ALTER TABLE `task_statuses` DISABLE KEYS */;
INSERT INTO `task_statuses` VALUES (1,'new'),(2,'awaiting bid'),(3,'awaiting bid acceptance'),(5,'bid rejected'),(6,'in progress'),(7,'client review'),(8,'completed'),(9,'cancelled');
/*!40000 ALTER TABLE `task_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_timeline`
--

DROP TABLE IF EXISTS `task_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text,
  `attachment_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_messages_tasks1_idx` (`task_id`),
  KEY `fk_task_timeline_1_idx` (`attachment_id`),
  KEY `fk_task_timeline_2_idx` (`author`),
  CONSTRAINT `fk_task_messages_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_timeline_1` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_timeline_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_timeline`
--

LOCK TABLES `task_timeline` WRITE;
/*!40000 ALTER TABLE `task_timeline` DISABLE KEYS */;
INSERT INTO `task_timeline` VALUES (57,26,66,'2015-05-27 06:02:05','Task created.',NULL),(58,26,66,'2015-05-27 06:11:17','Task cancelled by client.',NULL),(59,26,66,'2015-05-27 06:11:47','Task cancelled by client.',NULL),(60,26,66,'2015-05-27 06:13:11','Task cancelled by client.',NULL),(61,26,66,'2015-05-27 06:14:12','Task cancelled by client.',NULL),(62,27,66,'2015-05-27 06:17:20','Task created.',NULL),(63,27,66,'2015-05-27 06:17:32','here is the new favicon i want.',7),(64,27,66,'2015-05-27 06:18:45','here is the new favicon i want.',8),(65,27,66,'2015-05-27 06:18:53','here is the new favicon i want.',9),(66,27,66,'2015-05-27 06:19:09','actually this one.',10),(67,27,61,'2015-05-27 06:21:47','Task assigned to developer for bid estimate.',NULL),(68,27,63,'2015-05-27 06:22:10','Bid on by Mitch Facer with a lead time of 2 days and work time of 3 hours',NULL),(69,27,63,'2015-05-27 06:23:07','Bid on by Mitch Facer with a lead time of 1 days and work time of 4 hours.',NULL),(70,27,66,'2015-05-27 06:30:28','Bid rejected by client.',NULL),(71,27,66,'2015-05-27 06:30:36','too high.',NULL),(72,27,61,'2015-05-27 06:32:36','Task assigned to developer for bid estimate.',NULL),(73,27,63,'2015-05-27 06:32:52','Bid on by Mitch Facer with a lead time of 1 days and work time of 3 hours.',NULL),(74,27,66,'2015-05-27 06:33:20','Bid accepted by client.',NULL),(75,27,63,'2015-05-27 06:38:01','i finished. please confirm.',NULL),(76,27,63,'2015-05-27 06:43:45','Task sent to client for review.',NULL),(77,27,66,'2015-05-27 06:45:13','Task marked complete by client.',NULL),(78,27,63,'2015-05-27 06:45:40','Task sent to client for review.',NULL),(79,27,66,'2015-05-27 06:47:52','Task cancelled by client.',NULL),(80,27,66,'2015-05-27 06:48:05','Task marked complete by client.',NULL),(81,27,66,'2015-05-27 06:56:00','Task Rejected Complete by client.',NULL),(82,27,63,'2015-05-27 06:56:30','no really, it\'s finished, check it out.',NULL),(83,27,63,'2015-05-27 07:01:18','Task sent to client for review.',NULL),(84,27,66,'2015-05-27 07:02:34','Task rejected complete by client.',NULL),(85,27,63,'2015-05-27 07:02:44','foreals',NULL),(86,27,63,'2015-05-27 07:02:46','Task sent to client for review.',NULL),(87,27,66,'2015-05-27 07:11:49','Task marked complete by client.',NULL),(88,27,66,'2015-05-27 07:23:44','Task rejected complete by client.',NULL),(89,27,66,'2015-05-27 07:24:31','Task rejected complete by client.',NULL),(90,27,66,'2015-05-27 07:25:14','Task rejected complete by client.',NULL),(91,27,63,'2015-05-27 07:25:49','Task sent to client for review.',NULL),(92,27,66,'2015-05-27 07:27:17','Task marked complete by client.',NULL),(93,27,66,'2015-05-27 07:28:59','Task marked complete by client.',NULL),(94,27,66,'2015-05-27 07:29:21','Task marked complete by client.',NULL),(95,27,66,'2015-05-27 07:30:50','Task marked complete by client.',NULL),(96,27,66,'2015-05-27 07:31:44','Task marked complete by client.',NULL),(97,27,66,'2015-05-27 07:32:51','Task marked complete by client.',NULL),(98,27,66,'2015-05-27 07:36:35','Task marked complete by client.',NULL),(99,27,66,'2015-05-27 07:37:10','Task marked complete by client.',NULL),(100,27,66,'2015-05-27 07:38:37','Task marked complete by client.',NULL),(101,27,66,'2015-05-27 07:38:50','Task marked complete by client.',NULL),(102,27,66,'2015-05-27 07:39:19','Task rejected complete by client.',NULL),(103,27,66,'2015-05-27 07:39:43','Task rejected complete by client.',NULL),(104,27,63,'2015-05-27 07:39:53','Task sent to client for review.',NULL),(105,27,66,'2015-05-27 07:40:14','Task marked complete by client.',NULL),(106,27,66,'2015-05-27 07:42:11','Task marked complete by client.',NULL),(107,27,66,'2015-05-27 07:42:45','Task marked complete by client.',NULL),(108,27,66,'2015-05-27 07:43:04','Task marked complete by client.',NULL),(109,27,66,'2015-05-27 07:43:24','Task marked complete by client.',NULL),(110,27,66,'2015-05-27 07:44:26','Task marked complete by client.',NULL),(111,27,66,'2015-05-27 07:44:33','Task marked complete by client.',NULL),(112,27,66,'2015-05-27 07:48:24','asdf',NULL),(113,27,66,'2015-05-27 07:48:48','asdfasdfasdf',NULL),(114,27,63,'2015-05-27 07:49:04','Task sent to client for review.',NULL),(115,27,66,'2015-05-27 07:53:29','Task marked complete by client.',NULL);
/*!40000 ALTER TABLE `task_timeline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status_id` int(11) NOT NULL,
  `assignee` int(11) DEFAULT NULL,
  `last_assignee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_projects1_idx` (`project_id`),
  KEY `fk_tasks_task_statuses1_idx` (`status_id`),
  CONSTRAINT `fk_tasks_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tasks_task_statuses1` FOREIGN KEY (`status_id`) REFERENCES `task_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (26,3,'Change the favicon','Please chagne the favicon to one I will attach.',9,NULL,NULL),(27,3,'Ok really this time, change the favicon','change ittttt',8,63,NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_metas`
--

DROP TABLE IF EXISTS `user_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_metas` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` char(7) NOT NULL,
  `github_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_users_extra_users1_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_metas`
--

LOCK TABLES `user_metas` WRITE;
/*!40000 ALTER TABLE `user_metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `account_id` int(11) DEFAULT NULL,
  `role` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `manager` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  KEY `fk_users_accounts1_idx` (`account_id`),
  KEY `fk_users_1_idx` (`manager`),
  CONSTRAINT `fk_users_1` FOREIGN KEY (`manager`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_metas_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (45,NULL,'admin','admin@mp.com','$2y$10$5.LMkJQvMLZdEyAcBfzrGu2tDTfGVSc1LfxuNGz.mRLAO/c8.X2Yq','adminFirstName','adminLastName',NULL),(61,NULL,'manager','manager@mp.com','$2y$10$gZJixHqYR6Jq2KbEWWoJLuD9MaZIgKPyrplJ0hy5N7dZsUWdb1a8m','Jeff','ManagerGuy',NULL),(63,NULL,'developer','developer@mp.com','$2y$10$OpY84zFLyc2wHGhtPEpqguhbaBixRX3gtfz3qcIYBU1xKK8XOQgM2','Mitch','Facer',61),(66,16,'client','client@mp.com','$2y$10$JPP.LoszoUIEyM1yQNTSe.nHgibNcrw4qflx7K1D9ZwX.9zcn79Hm','Jeff','Gordan',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-27  2:04:06
