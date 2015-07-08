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

 Date: 07/08/2015 12:23:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `traffic_timezone`
-- ----------------------------
DROP TABLE IF EXISTS `traffic_timezone`;
CREATE TABLE `traffic_timezone` (
  `degree` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
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
--  Records of `traffic_timezone`
-- ----------------------------
BEGIN;
INSERT INTO `traffic_timezone` VALUES ('博士', '食堂', '2', '0', '0', '0', '0', '7', '60', '621', '1922', '1259', '462', '2902', '3136', '453', '249', '182', '481', '3972', '1907', '238', '295', '217', '47', '20'), ('博士', '教学楼', '2743', '886', '772', '247', '203', '230', '758', '5203', '46561', '72518', '47120', '62162', '75365', '63540', '49206', '45218', '49903', '90555', '57611', '61521', '65579', '59827', '47379', '6162'), ('博士', '其他', '183', '83', '151', '49', '72', '33', '674', '1215', '6005', '6104', '3441', '5234', '6228', '6166', '4029', '3939', '3720', '6469', '6815', '8478', '6819', '5592', '1852', '763'), ('博士', '宿舍', '20', '5', '15', '0', '0', '8', '39', '184', '390', '328', '98', '222', '299', '158', '133', '57', '58', '349', '223', '83', '107', '162', '304', '92'), ('硕士', '教学楼', '2745', '1164', '808', '755', '404', '323', '652', '12510', '112543', '145269', '91938', '113149', '147711', '156396', '120723', '106971', '107904', '139039', '124949', '135187', '143738', '94872', '27859', '10987'), ('硕士', '食堂', '182', '19', '0', '0', '0', '6', '481', '2133', '6450', '4684', '1746', '8456', '8514', '1332', '1342', '925', '1800', '13032', '5661', '1725', '2213', '1124', '318', '225'), ('硕士', '其他', '354', '139', '59', '45', '35', '41', '270', '2296', '22905', '20716', '15862', '15472', '19316', '18646', '16921', '14913', '12797', '17798', '19013', '18851', '13729', '8955', '3285', '1579'), ('硕士', '宿舍', '16', '8', '3', '2', '0', '0', '25', '367', '641', '623', '191', '870', '664', '440', '216', '190', '200', '634', '430', '231', '496', '439', '353', '127'), ('本科', '食堂', '665', '86', '39', '103', '27', '94', '3513', '16726', '11685', '10796', '5785', '26430', '31491', '5962', '6691', '4421', '6915', '40219', '22741', '8199', '10531', '7120', '538', '1466'), ('本科', '教学楼', '5033', '2272', '1509', '730', '1403', '728', '6876', '49457', '166313', '115807', '105170', '105896', '106499', '97515', '81424', '80623', '89457', '107929', '85682', '93627', '106256', '90081', '43690', '12660'), ('本科', '其他', '557', '184', '193', '109', '41', '64', '1157', '4493', '8053', '9697', '6975', '7753', '13282', '11202', '8330', '7813', '7838', '12274', '12534', '13390', '16204', '10599', '6963', '3281'), ('本科', '宿舍', '1152', '579', '186', '242', '32', '40', '251', '878', '711', '705', '555', '657', '982', '618', '490', '536', '915', '1063', '825', '634', '1156', '1456', '1012', '1630');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
