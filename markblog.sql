/*
Navicat MySQL Data Transfer

Source Server         : vm
Source Server Version : 50624
Source Host           : 192.168.87.128:3306
Source Database       : markblog

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-22 18:39:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for md_category
-- ----------------------------
DROP TABLE IF EXISTS `md_category`;
CREATE TABLE `md_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for md_post
-- ----------------------------
DROP TABLE IF EXISTS `md_post`;
CREATE TABLE `md_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for md_relation
-- ----------------------------
DROP TABLE IF EXISTS `md_relation`;
CREATE TABLE `md_relation` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  KEY `cat_id` (`category_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `cat_id` FOREIGN KEY (`category_id`) REFERENCES `md_category` (`id`),
  CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `md_post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
