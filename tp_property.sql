# Host: localhost  (Version: 5.5.40)
# Date: 2015-12-17 00:39:07
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tp_property"
#

DROP TABLE IF EXISTS `tp_property`;
CREATE TABLE `tp_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "tp_property"
#

/*!40000 ALTER TABLE `tp_property` DISABLE KEYS */;
INSERT INTO `tp_property` VALUES (1,'有毛发'),(2,'产奶'),(3,'吃肉'),(4,'黄褐色'),(5,'暗斑点'),(6,'哺乳动物'),(7,'肉食动物'),(8,'豹');
/*!40000 ALTER TABLE `tp_property` ENABLE KEYS */;
