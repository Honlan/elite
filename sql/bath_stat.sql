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

 Date: 06/30/2015 09:05:39 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `bath_stat`
-- ----------------------------
DROP TABLE IF EXISTS `bath_stat`;
CREATE TABLE `bath_stat` (
  `code` int(11) DEFAULT NULL,
  `t0` int(11) DEFAULT NULL,
  `t1` int(11) DEFAULT NULL,
  `t2` int(11) DEFAULT NULL,
  `t3` int(11) DEFAULT NULL,
  `t4` int(11) DEFAULT NULL,
  `t5` int(11) DEFAULT NULL,
  `t6` int(11) DEFAULT NULL,
  `t7` int(11) DEFAULT NULL,
  `t8` int(11) DEFAULT NULL,
  `t9` int(11) DEFAULT NULL,
  `t10` int(11) DEFAULT NULL,
  `t11` int(11) DEFAULT NULL,
  `t12` int(11) DEFAULT NULL,
  `t13` int(11) DEFAULT NULL,
  `t14` int(11) DEFAULT NULL,
  `t15` int(11) DEFAULT NULL,
  `t16` int(11) DEFAULT NULL,
  `t17` int(11) DEFAULT NULL,
  `t18` int(11) DEFAULT NULL,
  `t19` int(11) DEFAULT NULL,
  `t20` int(11) DEFAULT NULL,
  `t21` int(11) DEFAULT NULL,
  `t22` int(11) DEFAULT NULL,
  `t23` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bath_stat`
-- ----------------------------
BEGIN;
INSERT INTO `bath_stat` VALUES ('1000091', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '30', '61', '275', '235', '316', '322', '379', '477', '91', '0'), ('1000093', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15', '236', '220', '317', '339', '408', '491', '124', '0'), ('1000092', '0', '0', '0', '0', '0', '0', '0', '0', '32', '1', '0', '3', '0', '0', '1', '22', '173', '115', '154', '152', '219', '298', '57', '0'), ('1000095', '0', '1079', '20', '5', '3', '4', '22', '114', '180', '150', '147', '103', '78', '75', '96', '92', '172', '165', '163', '177', '279', '492', '725', '18');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
