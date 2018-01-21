/*
Navicat MySQL Data Transfer

Source Server         : wechatLocal
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : dueape

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-01-21 09:23:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pointchangerecord
-- ----------------------------
DROP TABLE IF EXISTS `pointchangerecord`;
CREATE TABLE `pointchangerecord` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `point` bigint(20) DEFAULT NULL,
  `creat_time` varchar(255) DEFAULT NULL,
  `sign` bit(1) NOT NULL COMMENT '1充值，0消费',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pointchangerecord
-- ----------------------------
INSERT INTO `pointchangerecord` VALUES ('1', '10000', '150', '1516455806', '\0');
INSERT INTO `pointchangerecord` VALUES ('2', '10000', '200', '1516455905', '\0');
