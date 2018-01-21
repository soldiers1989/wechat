/*
Navicat MySQL Data Transfer

Source Server         : wechatLocal
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : dueape

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-01-21 09:23:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tradingrecord
-- ----------------------------
DROP TABLE IF EXISTS `tradingrecord`;
CREATE TABLE `tradingrecord` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `projectId` int(10) DEFAULT NULL,
  `creat_time` varchar(250) DEFAULT NULL,
  `point` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tradingrecord
-- ----------------------------
INSERT INTO `tradingrecord` VALUES ('1', 'test', '1', '1516455806', '200', '10000', 'user@123.com');
