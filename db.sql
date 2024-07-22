-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `email_addresses`
--

DROP TABLE IF EXISTS `email_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `notify` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_email_addresses_on_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=439;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_addresses`
--

LOCK TABLES `email_addresses` WRITE;
/*!40000 ALTER TABLE `email_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_categories`
--

DROP TABLE IF EXISTS `issue_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `assigned_to_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_categories_project_id` (`project_id`),
  KEY `index_issue_categories_on_assigned_to_id` (`assigned_to_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_categories`
--

LOCK TABLES `issue_categories` WRITE;
/*!40000 ALTER TABLE `issue_categories` DISABLE KEYS */;
INSERT INTO `issue_categories` VALUES (78,1,'Category 1',NULL),(79,2,'Category 2',NULL);
/*!40000 ALTER TABLE `issue_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tracker_id` int NOT NULL,
  `project_id` int NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `description` longtext,
  `due_date` date DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `assigned_to_id` int DEFAULT NULL,
  `priority_id` int NOT NULL,
  `fixed_version_id` int DEFAULT NULL,
  `author_id` int NOT NULL,
  `lock_version` int NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `done_ratio` int NOT NULL DEFAULT '0',
  `estimated_hours` float DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `root_id` int DEFAULT NULL,
  `lft` int DEFAULT NULL,
  `rgt` int DEFAULT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT '0',
  `closed_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issues_project_id` (`project_id`),
  KEY `index_issues_on_status_id` (`status_id`),
  KEY `index_issues_on_category_id` (`category_id`),
  KEY `index_issues_on_assigned_to_id` (`assigned_to_id`),
  KEY `index_issues_on_fixed_version_id` (`fixed_version_id`),
  KEY `index_issues_on_tracker_id` (`tracker_id`),
  KEY `index_issues_on_priority_id` (`priority_id`),
  KEY `index_issues_on_author_id` (`author_id`),
  KEY `index_issues_on_created_on` (`created_on`),
  KEY `index_issues_on_root_id_and_lft_and_rgt` (`root_id`,`lft`,`rgt`),
  KEY `index_issues_on_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38023;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (1,1,1,'Bug in login page','Fix the bug in the login page','2024-12-31',1,1,2,2,NULL,2,0,'2024-07-02 19:34:26','2024-07-02 19:34:26','2024-07-01',0,NULL,NULL,1,1,2,0,NULL),(2,2,1,'Add new feature','Implement a new feature in project alpha','2024-12-31',NULL,1,2,2,NULL,3,0,'2024-07-02 19:34:26','2024-07-02 19:34:26','2024-07-01',0,NULL,NULL,2,1,2,0,NULL),(3,1,2,'Fix CSS issue','Resolve CSS issue in project beta','2024-12-31',NULL,1,3,2,NULL,4,0,'2024-07-02 19:34:26','2024-07-02 19:34:26','2024-07-01',0,NULL,NULL,3,1,2,0,NULL),(4,3,3,'Support request','Handle a support request in project gamma','2024-12-31',NULL,1,4,2,NULL,5,0,'2024-07-02 19:34:26','2024-07-02 19:34:26','2024-07-01',0,NULL,NULL,4,1,2,0,NULL),(5,2,4,'Feature enhancement','Enhance a feature in project delta','2024-12-31',NULL,1,5,2,NULL,2,0,'2024-07-02 19:34:26','2024-07-02 19:34:26','2024-07-01',0,NULL,NULL,5,1,2,0,NULL);
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_roles`
--

DROP TABLE IF EXISTS `member_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `role_id` int NOT NULL,
  `inherited_from` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_member_roles_on_member_id` (`member_id`),
  KEY `index_member_roles_on_role_id` (`role_id`),
  KEY `index_member_roles_on_inherited_from` (`inherited_from`)
) ENGINE=InnoDB AUTO_INCREMENT=18664;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_roles`
--

LOCK TABLES `member_roles` WRITE;
/*!40000 ALTER TABLE `member_roles` DISABLE KEYS */;
INSERT INTO `member_roles` VALUES (1,1,1,NULL),(2,2,2,NULL),(3,3,3,NULL),(4,4,2,NULL),(5,5,1,NULL);
/*!40000 ALTER TABLE `member_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `project_id` int NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT NULL,
  `mail_notification` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_members_on_user_id_and_project_id` (`user_id`,`project_id`),
  KEY `index_members_on_user_id` (`user_id`),
  KEY `index_members_on_project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13474;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,2,1,'2024-07-02 19:35:23',0),(2,3,2,'2024-07-02 19:35:23',0),(3,4,3,'2024-07-02 19:35:23',0),(4,5,4,'2024-07-02 19:35:23',0),(5,2,5,'2024-07-02 19:35:23',0);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `homepage` varchar(255) DEFAULT '',
  `is_public` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `lft` int DEFAULT NULL,
  `rgt` int DEFAULT NULL,
  `inherit_members` tinyint(1) NOT NULL DEFAULT '0',
  `default_version_id` int DEFAULT NULL,
  `default_assigned_to_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_projects_on_lft` (`lft`),
  KEY `index_projects_on_rgt` (`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=567;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Project Alpha','Description for Project Alpha','',1,NULL,'2024-07-02 19:32:19','2024-07-02 19:32:19','project-alpha',1,1,2,0,NULL,NULL),(2,'Project Beta','Description for Project Beta','',1,NULL,'2024-07-02 19:32:19','2024-07-02 19:32:19','project-beta',1,3,4,0,NULL,NULL),(3,'Project Gamma','Description for Project Gamma','',1,NULL,'2024-07-02 19:32:19','2024-07-02 19:32:19','project-gamma',1,5,6,0,NULL,NULL),(4,'Project Delta','Description for Project Delta','',1,NULL,'2024-07-02 19:32:19','2024-07-02 19:32:19','project-delta',1,7,8,0,NULL,NULL),(5,'Project Epsilon','Description for Project Epsilon','',1,NULL,'2024-07-02 19:32:19','2024-07-02 19:32:19','project-epsilon',1,9,10,0,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_trackers`
--

DROP TABLE IF EXISTS `projects_trackers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects_trackers` (
  `project_id` int NOT NULL DEFAULT '0',
  `tracker_id` int NOT NULL DEFAULT '0',
  UNIQUE KEY `projects_trackers_unique` (`project_id`,`tracker_id`),
  KEY `projects_trackers_project_id` (`project_id`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_trackers`
--

LOCK TABLES `projects_trackers` WRITE;
/*!40000 ALTER TABLE `projects_trackers` DISABLE KEYS */;
INSERT INTO `projects_trackers` VALUES (1,1),(1,2),(2,1),(2,3),(3,2),(3,3),(4,1),(4,2),(5,3);
/*!40000 ALTER TABLE `projects_trackers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `position` int DEFAULT NULL,
  `assignable` tinyint(1) DEFAULT '1',
  `builtin` int NOT NULL DEFAULT '0',
  `permissions` text,
  `issues_visibility` varchar(30) NOT NULL DEFAULT 'default',
  `users_visibility` varchar(30) NOT NULL DEFAULT 'all',
  `time_entries_visibility` varchar(30) NOT NULL DEFAULT 'all',
  `all_roles_managed` tinyint(1) NOT NULL DEFAULT '1',
  `settings` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Manager',1,1,0,'[]','default','all','all',1,NULL),(2,'Developer',2,1,0,'[]','default','all','all',1,NULL),(3,'Reporter',3,1,0,'[]','default','all','all',1,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,NULL,NULL,'New',NULL,NULL,NULL),(2,NULL,NULL,'In Progress',NULL,NULL,NULL),(3,NULL,NULL,'Resolved',NULL,NULL,NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_entries`
--

DROP TABLE IF EXISTS `time_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `time_entries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `author_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `issue_id` int DEFAULT NULL,
  `hours` float NOT NULL,
  `comments` varchar(1024) DEFAULT NULL,
  `activity_id` int NOT NULL,
  `spent_on` date NOT NULL,
  `tyear` int NOT NULL,
  `tmonth` int NOT NULL,
  `tweek` int NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `rate_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `time_entries_project_id` (`project_id`),
  KEY `time_entries_issue_id` (`issue_id`),
  KEY `index_time_entries_on_activity_id` (`activity_id`),
  KEY `index_time_entries_on_user_id` (`user_id`),
  KEY `index_time_entries_on_created_on` (`created_on`),
  KEY `index_time_entries_on_rate_id` (`rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144085;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_entries`
--

LOCK TABLES `time_entries` WRITE;
/*!40000 ALTER TABLE `time_entries` DISABLE KEYS */;
INSERT INTO `time_entries` VALUES (1,1,NULL,2,1,5,'Fixed login bug',9,'2024-07-01',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(2,1,NULL,3,2,3,'Added new feature',9,'2024-07-02',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(3,2,NULL,4,3,4,'Resolved CSS issue',9,'2024-07-03',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(4,3,NULL,5,4,2,'Handled support request',9,'2024-07-04',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(5,4,NULL,2,5,6,'Enhanced feature',9,'2024-07-05',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(6,1,NULL,2,1,2,'Reviewed code',9,'2024-07-06',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(7,1,NULL,3,2,3.5,'Tested new feature',9,'2024-07-07',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(8,2,NULL,4,3,1.5,'Updated documentation',9,'2024-07-08',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(9,3,NULL,5,4,2.5,'Refactored code',9,'2024-07-09',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(10,4,NULL,2,5,3.75,'Customer meeting',9,'2024-07-10',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(11,1,NULL,2,1,4.25,'Fixed security bug',9,'2024-07-11',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(12,1,NULL,3,2,2.25,'Design discussion',9,'2024-07-12',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(13,2,NULL,4,3,3,'Implemented new module',9,'2024-07-13',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(14,3,NULL,5,4,1.75,'Code review',9,'2024-07-14',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(15,4,NULL,2,5,4.5,'Bug triage',9,'2024-07-15',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(16,1,NULL,2,1,2.75,'Database optimization',9,'2024-07-16',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(17,1,NULL,3,2,3.25,'Frontend development',9,'2024-07-17',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(18,2,NULL,4,3,4.75,'Backend development',9,'2024-07-18',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(19,3,NULL,5,4,2.5,'System testing',9,'2024-07-19',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(20,4,NULL,2,5,3,'Integration testing',9,'2024-07-20',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(21,1,NULL,2,1,4.25,'Bug fixing',9,'2024-07-21',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(22,1,NULL,3,2,2.25,'New feature brainstorming',9,'2024-07-22',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(23,2,NULL,4,3,3,'Module testing',9,'2024-07-23',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(24,3,NULL,5,4,1.75,'Performance improvement',9,'2024-07-24',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(25,4,NULL,2,5,4.5,'UI/UX design',9,'2024-07-25',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(26,1,NULL,2,1,2.75,'Prototyping',9,'2024-07-26',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(27,1,NULL,3,2,3.25,'API development',9,'2024-07-27',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(28,2,NULL,4,3,4.75,'Deployment',9,'2024-07-28',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(29,3,NULL,5,4,2.5,'Training',9,'2024-07-29',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(30,4,NULL,2,5,3,'Feedback session',9,'2024-07-30',2024,7,27,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(31,1,NULL,2,1,4.25,'Security audit',9,'2024-08-01',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(32,1,NULL,3,2,2.25,'Usability testing',9,'2024-08-02',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(33,2,NULL,4,3,3,'Code merging',9,'2024-08-03',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(34,3,NULL,5,4,1.75,'Bug verification',9,'2024-08-04',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(35,4,NULL,2,5,4.5,'Customer support',9,'2024-08-05',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(36,1,NULL,2,1,2.75,'Feature finalization',9,'2024-08-06',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(37,1,NULL,3,2,3.25,'Post-deployment testing',9,'2024-08-07',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(38,2,NULL,4,3,4.75,'Documentation review',9,'2024-08-08',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(39,3,NULL,5,4,2.5,'Code cleanup',9,'2024-08-09',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL),(40,4,NULL,2,5,3,'Retrospective meeting',9,'2024-08-10',2024,8,28,'2024-07-02 19:39:16','2024-07-02 19:39:16',NULL);
/*!40000 ALTER TABLE `time_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackers`
--

DROP TABLE IF EXISTS `trackers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trackers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `is_in_chlog` tinyint(1) NOT NULL DEFAULT '0',
  `position` int DEFAULT NULL,
  `is_in_roadmap` tinyint(1) NOT NULL DEFAULT '1',
  `fields_bits` int DEFAULT '0',
  `default_status_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackers`
--

LOCK TABLES `trackers` WRITE;
/*!40000 ALTER TABLE `trackers` DISABLE KEYS */;
INSERT INTO `trackers` VALUES (1,'Bug',NULL,1,1,1,0,NULL),(2,'Feature',NULL,1,2,1,0,NULL),(3,'Support',NULL,1,3,0,0,NULL);
/*!40000 ALTER TABLE `trackers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '',
  `hashed_password` varchar(40) NOT NULL DEFAULT '',
  `firstname` varchar(30) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `last_login_on` datetime DEFAULT NULL,
  `language` varchar(5) DEFAULT '',
  `auth_source_id` int DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `identity_url` varchar(255) DEFAULT NULL,
  `mail_notification` varchar(255) NOT NULL DEFAULT '',
  `salt` varchar(64) DEFAULT NULL,
  `must_change_passwd` tinyint(1) NOT NULL DEFAULT '0',
  `passwd_changed_on` datetime DEFAULT NULL,
  `otp_secret_key` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `mobile_phone_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `ignore_2fa` tinyint(1) NOT NULL DEFAULT '0',
  `two_fa_id` decimal(10,0) DEFAULT NULL,
  `api_allowed` tinyint(1) NOT NULL DEFAULT '0',
  `two_fa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_users_on_id_and_type` (`id`,`type`),
  KEY `index_users_on_auth_source_id` (`auth_source_id`),
  KEY `index_users_on_type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=458;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','d41d8cd98f00b204e9800998ecf8427e','Admin','User',0,1,'2024-07-02 19:35:14','',NULL,'2024-07-02 19:35:14',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL),(2,'john.doe','d41d8cd98f00b204e9800998ecf8427e','John','Doe',0,1,'2024-07-02 19:35:14','',NULL,'2024-07-02 19:35:14',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL),(3,'jane.doe','d41d8cd98f00b204e9800998ecf8427e','Jane','Doe',0,1,'2024-07-02 19:35:14','',NULL,'2024-07-02 19:35:14',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL),(4,'jack.smith','d41d8cd98f00b204e9800998ecf8427e','Jack','Smith',0,1,'2024-07-02 19:35:14','',NULL,'2024-07-02 19:35:14',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL),(5,'jill.smith','d41d8cd98f00b204e9800998ecf8427e','Jill','Smith',0,1,'2024-07-02 19:35:14','',NULL,'2024-07-02 19:35:14',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL);
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

-- Dump completed on 2024-07-02 20:13:39
