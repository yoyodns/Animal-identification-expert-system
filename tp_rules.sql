# Host: localhost  (Version: 5.5.40)
# Date: 2015-12-17 00:39:19
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tp_rules"
#

DROP TABLE IF EXISTS `tp_rules`;
CREATE TABLE `tp_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fact` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "tp_rules"
#

/*!40000 ALTER TABLE `tp_rules` DISABLE KEYS */;
INSERT INTO `tp_rules` VALUES (1,'1','6'),(2,'2','6'),(3,'3','7'),(5,'4,5,6,7','8');
/*!40000 ALTER TABLE `tp_rules` ENABLE KEYS */;
