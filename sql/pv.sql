/*
 Navicat Premium Data Transfer

 Source Server         : myMac
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : elite

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 06/27/2015 22:43:31 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `pv`
-- ----------------------------
DROP TABLE IF EXISTS `pv`;
CREATE TABLE `pv` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `ts` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pv`
-- ----------------------------
BEGIN;
INSERT INTO `pv` VALUES ('1', '0.0.0.0', '1434361635'), ('2', '0.0.0.0', '1434362064'), ('3', '0.0.0.0', '1434374881'), ('4', '0.0.0.0', '1434416966'), ('5', '0.0.0.0', '1434428805'), ('6', '0.0.0.0', '1434466164'), ('7', '0.0.0.0', '1434505447'), ('8', '0.0.0.0', '1434550673'), ('9', '0.0.0.0', '1434632845'), ('10', '0.0.0.0', '1434695854'), ('11', '0.0.0.0', '1435119654'), ('12', '0.0.0.0', '1435195692'), ('13', '0.0.0.0', '1435323461'), ('14', '0.0.0.0', '1435408204');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
