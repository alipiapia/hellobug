-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: auth
-- ------------------------------------------------------
-- Server version	5.5.27-log

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
-- Table structure for table `tk_auth_group`
--

DROP TABLE IF EXISTS `tk_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `describe` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_auth_group`
--

LOCK TABLES `tk_auth_group` WRITE;
/*!40000 ALTER TABLE `tk_auth_group` DISABLE KEYS */;
INSERT INTO `tk_auth_group` VALUES (1,'超级管理员',1,'','拥有全部权限'),(2,'网站管理员',1,'11,12,13,14,2,1,7,9,15,16,17','拥有相对多的权限'),(3,'发布人员',1,'2,15,16,17','拥有发布、修改文章的权限'),(4,'编辑',1,'11,12,13,14,2','拥有文章模块的所有权限'),(5,'积分小于50',1,'2,15','积分小于50'),(6,'积分大于50小于200',1,'2,16','积分大于50小于200'),(7,'积分大于200',1,'2,17','积分大于200'),(8,'默认组',1,'2,1,3','拥有一些通用的权限');
/*!40000 ALTER TABLE `tk_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk_auth_group_access`
--

DROP TABLE IF EXISTS `tk_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_auth_group_access`
--

LOCK TABLES `tk_auth_group_access` WRITE;
/*!40000 ALTER TABLE `tk_auth_group_access` DISABLE KEYS */;
INSERT INTO `tk_auth_group_access` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7);
/*!40000 ALTER TABLE `tk_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk_auth_rule`
--

DROP TABLE IF EXISTS `tk_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `mid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_auth_rule`
--

LOCK TABLES `tk_auth_rule` WRITE;
/*!40000 ALTER TABLE `tk_auth_rule` DISABLE KEYS */;
INSERT INTO `tk_auth_rule` VALUES (1,'Admin/Auth/accessList','权限列表',1,1,'',3),(2,'Admin/Index/index','后台首页',1,1,'',2),(3,'Admin/Auth/accessAdd','添加权限页面',1,1,'',3),(4,'Admin/Auth/groupList','角色管理页面',1,1,'',3),(5,'Admin/Auth/addHandle','添加权限',1,1,'',3),(6,'Admin/Auth/groupAddHandle','添加角色',1,1,'',3),(7,'Admin/Auth/accessSelect','角色授权页面',1,1,'',3),(8,'Admin/Auth/accessSelectHandle','更新角色权限',1,1,'',3),(9,'Admin/Auth/groupMember','角色组成员列表',1,1,'',3),(10,'Admin/Auth/accessDelHandle','删除权限',1,1,'',3),(11,'Admin/Member/memberList','会员列表',1,1,'',1),(12,'Admin/Member/memberAdd','添加会员页面',1,1,'',1),(13,'Admin/Member/addHandle','添加会员',1,1,'',1),(14,'Admin/Member/deleteHandle','删除会员',1,1,'',1),(15,'score50','积分小于50',1,1,'{score}<50',4),(16,'score100','积分大于50小于200',1,1,'{score}>50 and {score}<200',4),(17,'score200','积分大于200',1,1,'{score}>200',4);
/*!40000 ALTER TABLE `tk_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk_members`
--

DROP TABLE IF EXISTS `tk_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_members` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `score` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_members`
--

LOCK TABLES `tk_members` WRITE;
/*!40000 ALTER TABLE `tk_members` DISABLE KEYS */;
INSERT INTO `tk_members` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',500),(2,'manager','21232f297a57a5a743894a0e4a801fc3',150),(3,'publish','21232f297a57a5a743894a0e4a801fc3',500),(4,'edit','21232f297a57a5a743894a0e4a801fc3',5000),(5,'score50','21232f297a57a5a743894a0e4a801fc3',30),(6,'score100','21232f297a57a5a743894a0e4a801fc3',150),(7,'score200','21232f297a57a5a743894a0e4a801fc3',300);
/*!40000 ALTER TABLE `tk_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk_modules`
--

DROP TABLE IF EXISTS `tk_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_modules` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_modules`
--

LOCK TABLES `tk_modules` WRITE;
/*!40000 ALTER TABLE `tk_modules` DISABLE KEYS */;
INSERT INTO `tk_modules` VALUES (1,'会员管理'),(2,'后台管理'),(3,'权限管理'),(4,'其他');
/*!40000 ALTER TABLE `tk_modules` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-21 18:45:33
