/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : yzw

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-07 13:56:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yzw_ad`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_ad`;
CREATE TABLE `yzw_ad` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '广告位置ID',
  `media_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '广告类型',
  `ad_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告名称',
  `ad_link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `img_id` int(10) NOT NULL COMMENT '图片表id',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '投放时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `link_man` varchar(60) NOT NULL DEFAULT '' COMMENT '添加人',
  `link_email` varchar(60) NOT NULL DEFAULT '' COMMENT '添加人邮箱',
  `link_phone` varchar(60) NOT NULL DEFAULT '' COMMENT '添加人联系电话',
  `click_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `orderby` smallint(6) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`ad_id`),
  KEY `enabled` (`enabled`),
  KEY `position_id` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_ad
-- ----------------------------
INSERT INTO `yzw_ad` VALUES ('90', '0', '0', '123', '123123', '27', '1497542400', '1497456000', '', '', '', '0', '0', '123');
INSERT INTO `yzw_ad` VALUES ('95', '51328', '0', '22', '22', '28', '1496246400', '1498752000', '', '', '', '0', '0', '22');
INSERT INTO `yzw_ad` VALUES ('98', '11', '0', '11', '11', '29', '1501084800', '1498838400', '', '', '', '0', '1', '11');
INSERT INTO `yzw_ad` VALUES ('99', '11', '0', '11', '11', '20', '1499011200', '1500566400', '', '', '', '0', '1', '11');

-- ----------------------------
-- Table structure for `yzw_ad_position`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_ad_position`;
CREATE TABLE `yzw_ad_position` (
  `position_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `position_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告位置名称',
  `ad_width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位宽度',
  `ad_height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位高度',
  `position_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '广告描述',
  `is_open` tinyint(1) DEFAULT '0' COMMENT '0关闭1开启',
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51356 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_ad_position
-- ----------------------------
INSERT INTO `yzw_ad_position` VALUES ('51328', '123', '123', '123', '123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123sadsadad1231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231231', '1');
INSERT INTO `yzw_ad_position` VALUES ('51335', '123', '123', '123', '123', '0');
INSERT INTO `yzw_ad_position` VALUES ('51350', '11', '11', '11', '11', '1');
INSERT INTO `yzw_ad_position` VALUES ('51355', '测试', '11', '11', '测试广告位', '1');

-- ----------------------------
-- Table structure for `yzw_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_admin`;
CREATE TABLE `yzw_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT 'email',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `last_login` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` int(40) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `role_id` smallint(5) NOT NULL DEFAULT '1' COMMENT '等级id',
  `log_id` int(11) NOT NULL COMMENT '日志ID',
  PRIMARY KEY (`id`),
  KEY `user_name` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_admin
-- ----------------------------
INSERT INTO `yzw_admin` VALUES ('1', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '1483155409', '1499406744', '2130706433', '0', '0');
INSERT INTO `yzw_admin` VALUES ('29', 'qwe', '', '202cb962ac59075b964b07152d234b70', '1498727336', '1499406766', '2130706433', '29', '0');
INSERT INTO `yzw_admin` VALUES ('31', 'asd', '', '7815696ecbf1c96e6894b779456d330e', '1499045201', '1499045210', '2130706433', '27', '0');
INSERT INTO `yzw_admin` VALUES ('46', '11', '', '6512bd43d9caa6e02c990b0a82652dca', '1499306805', '1499397812', '2130706433', '7', '0');
INSERT INTO `yzw_admin` VALUES ('47', '123', '', '202cb962ac59075b964b07152d234b70', '1499306912', '1499329884', '2130706433', '7', '0');

-- ----------------------------
-- Table structure for `yzw_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_admin_log`;
CREATE TABLE `yzw_admin_log` (
  `log_id` bigint(16) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `admin_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `admin_username` varchar(50) DEFAULT NULL,
  `log_info` varchar(255) DEFAULT NULL COMMENT '日志描述',
  `log_ip` varchar(30) DEFAULT NULL COMMENT 'ip地址',
  `log_url` varchar(50) DEFAULT NULL COMMENT 'url',
  `log_time` int(15) DEFAULT NULL COMMENT '日志时间',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=994 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_admin_log
-- ----------------------------
INSERT INTO `yzw_admin_log` VALUES ('809', '1', null, '管理员删除编号为100的广告', '2130706433', null, '1498872581');
INSERT INTO `yzw_admin_log` VALUES ('808', '1', null, '管理员删除编号为102的广告', '2130706433', null, '1498872578');
INSERT INTO `yzw_admin_log` VALUES ('810', '1', null, '后台登录', '2130706433', null, '1498872674');
INSERT INTO `yzw_admin_log` VALUES ('814', '1', null, '管理员添加广告位编号为51353', '2130706433', null, '1498872979');
INSERT INTO `yzw_admin_log` VALUES ('812', '1', null, '管理员修改编号为51352的广告位', '2130706433', null, '1498872905');
INSERT INTO `yzw_admin_log` VALUES ('813', '1', null, '管理员删除编号为51352的广告位', '2130706433', null, '1498872907');
INSERT INTO `yzw_admin_log` VALUES ('815', '1', null, '管理员修改编号为90的广告', '2130706433', null, '1498872999');
INSERT INTO `yzw_admin_log` VALUES ('816', '1', null, '管理员删除编号为51353的广告位', '2130706433', null, '1498873203');
INSERT INTO `yzw_admin_log` VALUES ('817', '1', null, '后台登录', '2130706433', null, '1498878540');
INSERT INTO `yzw_admin_log` VALUES ('818', '1', null, '后台登录', '2130706433', null, '1498878759');
INSERT INTO `yzw_admin_log` VALUES ('819', '29', null, '后台登录', '', null, '1498894549');
INSERT INTO `yzw_admin_log` VALUES ('820', '29', null, '后台登录', '2130706433', null, '1498895082');
INSERT INTO `yzw_admin_log` VALUES ('821', '29', null, '后台登录', '', null, '1498895318');
INSERT INTO `yzw_admin_log` VALUES ('822', '1', null, '后台登录', '', null, '1498896271');
INSERT INTO `yzw_admin_log` VALUES ('823', '29', null, '后台登录', '2130706433', null, '1498896512');
INSERT INTO `yzw_admin_log` VALUES ('824', '1', null, '管理员添加广告位编号为51354', '', null, '1498899086');
INSERT INTO `yzw_admin_log` VALUES ('825', '1', null, '管理员修改编号为51354的广告位', '', null, '1498899090');
INSERT INTO `yzw_admin_log` VALUES ('826', '1', null, '管理员删除编号为51354的广告位', '', null, '1498899091');
INSERT INTO `yzw_admin_log` VALUES ('827', '1', null, '管理员删除编号为87的广告', '', null, '1498899119');
INSERT INTO `yzw_admin_log` VALUES ('828', '29', null, '后台登录', '2130706433', null, '1498899170');
INSERT INTO `yzw_admin_log` VALUES ('829', '29', null, '管理员删除编号为101的广告', '2130706433', null, '1498899175');
INSERT INTO `yzw_admin_log` VALUES ('830', '1', null, '管理员添加广告位编号为51355', '', null, '1498900489');
INSERT INTO `yzw_admin_log` VALUES ('831', '1', null, '后台登录', '2130706433', null, '1499042245');
INSERT INTO `yzw_admin_log` VALUES ('832', '1', null, '管理员添加广告编号为103', '2130706433', null, '1499044471');
INSERT INTO `yzw_admin_log` VALUES ('833', '1', null, '管理员修改编号为103的广告', '2130706433', null, '1499044712');
INSERT INTO `yzw_admin_log` VALUES ('834', '31', null, '后台登录', '2130706433', null, '1499045210');
INSERT INTO `yzw_admin_log` VALUES ('835', '1', null, '后台登录', '2130706433', null, '1499046456');
INSERT INTO `yzw_admin_log` VALUES ('836', '1', null, '后台登录', '2130706433', null, '1499048683');
INSERT INTO `yzw_admin_log` VALUES ('837', '29', null, '后台登录', '2130706433', null, '1499050023');
INSERT INTO `yzw_admin_log` VALUES ('838', '1', null, '后台登录', '2130706433', null, '1499050096');
INSERT INTO `yzw_admin_log` VALUES ('839', '29', null, '后台登录', '2130706433', null, '1499050178');
INSERT INTO `yzw_admin_log` VALUES ('840', '29', null, '后台登录', '2130706433', null, '1499050298');
INSERT INTO `yzw_admin_log` VALUES ('841', '29', null, '后台登录', '2130706433', null, '1499050337');
INSERT INTO `yzw_admin_log` VALUES ('842', '34', null, '后台登录', '2130706433', null, '1499051009');
INSERT INTO `yzw_admin_log` VALUES ('843', '29', null, '后台登录', '2130706433', null, '1499051026');
INSERT INTO `yzw_admin_log` VALUES ('844', '1', null, '后台登录', '2130706433', null, '1499051108');
INSERT INTO `yzw_admin_log` VALUES ('845', '1', null, '管理员删除编号为103的广告', '2130706433', null, '1499051293');
INSERT INTO `yzw_admin_log` VALUES ('846', '29', null, '后台登录', '2130706433', null, '1499051653');
INSERT INTO `yzw_admin_log` VALUES ('847', '35', null, '后台登录', '2130706433', null, '1499051673');
INSERT INTO `yzw_admin_log` VALUES ('848', '29', null, '后台登录', '2130706433', null, '1499053968');
INSERT INTO `yzw_admin_log` VALUES ('849', '1', null, '后台登录', '2130706433', null, '1499053977');
INSERT INTO `yzw_admin_log` VALUES ('850', '35', null, '后台登录', '2130706433', null, '1499058360');
INSERT INTO `yzw_admin_log` VALUES ('851', '1', null, '后台登录', '2130706433', null, '1499058754');
INSERT INTO `yzw_admin_log` VALUES ('852', '36', null, '后台登录', '2130706433', null, '1499058768');
INSERT INTO `yzw_admin_log` VALUES ('853', '32', null, '后台登录', '2130706433', null, '1499059184');
INSERT INTO `yzw_admin_log` VALUES ('854', '37', null, '后台登录', '2130706433', null, '1499059262');
INSERT INTO `yzw_admin_log` VALUES ('855', '38', null, '后台登录', '2130706433', null, '1499059313');
INSERT INTO `yzw_admin_log` VALUES ('856', '1', null, '后台登录', '2130706433', null, '1499059330');
INSERT INTO `yzw_admin_log` VALUES ('857', '1', null, '后台登录', '2130706433', null, '1499059479');
INSERT INTO `yzw_admin_log` VALUES ('858', '39', null, '后台登录', '2130706433', null, '1499059505');
INSERT INTO `yzw_admin_log` VALUES ('859', '1', null, '后台登录', '2130706433', null, '1499059544');
INSERT INTO `yzw_admin_log` VALUES ('860', '1', null, '管理员添加项目类型编号为2', '2130706433', null, '1499062168');
INSERT INTO `yzw_admin_log` VALUES ('861', '1', null, '管理员添加项目类型编号为1', '2130706433', null, '1499062220');
INSERT INTO `yzw_admin_log` VALUES ('862', '1', null, '管理员添加项目类型编号为2', '2130706433', null, '1499062233');
INSERT INTO `yzw_admin_log` VALUES ('863', '1', null, '管理员添加项目类型编号为3', '2130706433', null, '1499062280');
INSERT INTO `yzw_admin_log` VALUES ('864', '40', null, '后台登录', '2130706433', null, '1499062529');
INSERT INTO `yzw_admin_log` VALUES ('865', '1', null, '后台登录', '2130706433', null, '1499062566');
INSERT INTO `yzw_admin_log` VALUES ('866', '41', null, '后台登录', '2130706433', null, '1499062643');
INSERT INTO `yzw_admin_log` VALUES ('867', '29', null, '后台登录', '2130706433', null, '1499062654');
INSERT INTO `yzw_admin_log` VALUES ('868', '42', null, '后台登录', '2130706433', null, '1499062861');
INSERT INTO `yzw_admin_log` VALUES ('869', '29', null, '后台登录', '2130706433', null, '1499062876');
INSERT INTO `yzw_admin_log` VALUES ('870', '43', null, '后台登录', '2130706433', null, '1499062952');
INSERT INTO `yzw_admin_log` VALUES ('871', '29', null, '后台登录', '2130706433', null, '1499062963');
INSERT INTO `yzw_admin_log` VALUES ('872', '44', null, 'q后台登录', '2130706433', null, '1499063033');
INSERT INTO `yzw_admin_log` VALUES ('873', '29', null, 'qwe后台登录', '2130706433', null, '1499063046');
INSERT INTO `yzw_admin_log` VALUES ('874', '45', '1', '1后台登录', '2130706433', null, '1499063240');
INSERT INTO `yzw_admin_log` VALUES ('875', '1', 'admin', 'admin后台登录', '2130706433', null, '1499063288');
INSERT INTO `yzw_admin_log` VALUES ('876', '1', 'admin', '管理员添加项目类型编号为4', '2130706433', null, '1499063446');
INSERT INTO `yzw_admin_log` VALUES ('877', '1', 'admin', '管理员添加项目类型编号为5', '2130706433', null, '1499064645');
INSERT INTO `yzw_admin_log` VALUES ('878', '1', 'admin', '管理员添加项目类型编号为6', '2130706433', null, '1499064649');
INSERT INTO `yzw_admin_log` VALUES ('879', '1', 'admin', '管理员修改项目类型编号为5', '2130706433', null, '1499065941');
INSERT INTO `yzw_admin_log` VALUES ('880', '1', 'admin', '管理员修改项目类型编号为5', '2130706433', null, '1499065947');
INSERT INTO `yzw_admin_log` VALUES ('881', '1', 'admin', '管理员修改项目类型编号为5', '2130706433', null, '1499065953');
INSERT INTO `yzw_admin_log` VALUES ('882', '1', 'admin', '管理员添加项目类型编号为7', '2130706433', null, '1499066015');
INSERT INTO `yzw_admin_log` VALUES ('883', '1', 'admin', '管理员修改项目类型编号为7', '2130706433', null, '1499066021');
INSERT INTO `yzw_admin_log` VALUES ('884', '1', 'admin', '管理员添加项目类型编号为8', '2130706433', null, '1499066476');
INSERT INTO `yzw_admin_log` VALUES ('885', '1', 'admin', '管理员添加项目类型编号为9', '2130706433', null, '1499066479');
INSERT INTO `yzw_admin_log` VALUES ('886', '1', 'admin', '管理员添加项目类型编号为10', '2130706433', null, '1499066481');
INSERT INTO `yzw_admin_log` VALUES ('887', '1', 'admin', '管理员添加项目类型编号为11', '2130706433', null, '1499066484');
INSERT INTO `yzw_admin_log` VALUES ('888', '1', 'admin', '管理员添加项目类型编号为12', '2130706433', null, '1499066491');
INSERT INTO `yzw_admin_log` VALUES ('889', '1', 'admin', '管理员添加项目类型编号为13', '2130706433', null, '1499066495');
INSERT INTO `yzw_admin_log` VALUES ('890', '1', 'admin', '管理员添加项目类型编号为14', '2130706433', null, '1499066498');
INSERT INTO `yzw_admin_log` VALUES ('891', '1', 'admin', '管理员修改项目类型编号为9', '2130706433', null, '1499066505');
INSERT INTO `yzw_admin_log` VALUES ('892', '1', 'admin', '管理员添加项目类型编号为15', '2130706433', null, '1499066511');
INSERT INTO `yzw_admin_log` VALUES ('893', '1', 'admin', '管理员修改项目类型编号为1', '2130706433', null, '1499072490');
INSERT INTO `yzw_admin_log` VALUES ('894', '1', 'admin', '管理员修改项目类型编号为2', '2130706433', null, '1499072496');
INSERT INTO `yzw_admin_log` VALUES ('895', '29', 'qwe', 'qwe后台登录', '2130706433', null, '1499127997');
INSERT INTO `yzw_admin_log` VALUES ('896', '1', 'admin', '后台登录', '2130706433', null, '1499145482');
INSERT INTO `yzw_admin_log` VALUES ('897', '29', 'qwe', '后台登录', '2130706433', null, '1499145743');
INSERT INTO `yzw_admin_log` VALUES ('898', '1', 'admin', '后台登录', '2130706433', null, '1499145770');
INSERT INTO `yzw_admin_log` VALUES ('899', '29', 'qwe', '后台登录', '2130706433', null, '1499145798');
INSERT INTO `yzw_admin_log` VALUES ('900', '1', 'admin', '后台登录', '2130706433', null, '1499146077');
INSERT INTO `yzw_admin_log` VALUES ('901', '29', 'qwe', '后台登录', '2130706433', null, '1499146092');
INSERT INTO `yzw_admin_log` VALUES ('902', '1', 'admin', '后台登录', '2130706433', null, '1499146108');
INSERT INTO `yzw_admin_log` VALUES ('903', '29', 'qwe', '后台登录', '2130706433', null, '1499146176');
INSERT INTO `yzw_admin_log` VALUES ('904', '1', 'admin', '后台登录', '2130706433', null, '1499146279');
INSERT INTO `yzw_admin_log` VALUES ('905', '1', 'admin', '管理员生成公司会员账号3条', '2130706433', null, '1499146512');
INSERT INTO `yzw_admin_log` VALUES ('906', '1', 'admin', '管理员生成公司会员账号3条', '2130706433', null, '1499146873');
INSERT INTO `yzw_admin_log` VALUES ('907', '29', 'qwe', '后台登录', '2130706433', null, '1499218947');
INSERT INTO `yzw_admin_log` VALUES ('908', '1', 'admin', '后台登录', '2130706433', null, '1499218979');
INSERT INTO `yzw_admin_log` VALUES ('909', '29', 'qwe', '后台登录', '2130706433', null, '1499224668');
INSERT INTO `yzw_admin_log` VALUES ('910', '1', 'admin', '后台登录', '2130706433', null, '1499224677');
INSERT INTO `yzw_admin_log` VALUES ('911', '1', 'admin', '后台登录', '2130706433', null, '1499302108');
INSERT INTO `yzw_admin_log` VALUES ('912', '1', 'admin', '后台登录', '2130706433', null, '1499302125');
INSERT INTO `yzw_admin_log` VALUES ('913', '1', 'admin', '后台登录', '2130706433', null, '1499302189');
INSERT INTO `yzw_admin_log` VALUES ('914', '29', 'qwe', '后台登录', '2130706433', null, '1499304088');
INSERT INTO `yzw_admin_log` VALUES ('915', '1', 'admin', '后台登录', '2130706433', null, '1499304955');
INSERT INTO `yzw_admin_log` VALUES ('916', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499304963');
INSERT INTO `yzw_admin_log` VALUES ('917', '1', 'admin', '管理员删除编号为10的项目分类', '2130706433', null, '1499304982');
INSERT INTO `yzw_admin_log` VALUES ('918', '1', 'admin', '管理员修改项目类型编号为9', '2130706433', null, '1499304992');
INSERT INTO `yzw_admin_log` VALUES ('919', '1', 'admin', '管理员修改项目分类编号为9', '2130706433', null, '1499305036');
INSERT INTO `yzw_admin_log` VALUES ('920', '1', 'admin', '管理员添加项目分类编号为16', '2130706433', null, '1499305040');
INSERT INTO `yzw_admin_log` VALUES ('921', '1', 'admin', '管理员删除编号为14的项目分类', '2130706433', null, '1499305058');
INSERT INTO `yzw_admin_log` VALUES ('922', '1', 'admin', '管理员删除编号为12的项目分类', '2130706433', null, '1499305060');
INSERT INTO `yzw_admin_log` VALUES ('923', '1', 'admin', '管理员添加项目状态编号为9', '2130706433', null, '1499305079');
INSERT INTO `yzw_admin_log` VALUES ('924', '1', 'admin', '管理员修改编号为9的项目状态', '2130706433', null, '1499305083');
INSERT INTO `yzw_admin_log` VALUES ('925', '1', 'admin', '管理员删除编号为9的项目状态', '2130706433', null, '1499305085');
INSERT INTO `yzw_admin_log` VALUES ('926', '29', 'qwe', '后台登录', '2130706433', null, '1499305659');
INSERT INTO `yzw_admin_log` VALUES ('927', '1', 'admin', '后台登录', '2130706433', null, '1499305703');
INSERT INTO `yzw_admin_log` VALUES ('928', '29', 'qwe', '后台登录', '2130706433', null, '1499306614');
INSERT INTO `yzw_admin_log` VALUES ('929', '1', 'admin', '后台登录', '2130706433', null, '1499306635');
INSERT INTO `yzw_admin_log` VALUES ('930', '1', 'admin', '后台登录', '2130706433', null, '1499306667');
INSERT INTO `yzw_admin_log` VALUES ('931', '47', '123', '后台登录', '2130706433', null, '1499306934');
INSERT INTO `yzw_admin_log` VALUES ('932', '1', 'admin', '后台登录', '2130706433', null, '1499306950');
INSERT INTO `yzw_admin_log` VALUES ('933', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499310232');
INSERT INTO `yzw_admin_log` VALUES ('934', '1', 'admin', '管理员添加项目状态编号为10', '2130706433', null, '1499313182');
INSERT INTO `yzw_admin_log` VALUES ('935', '1', 'admin', '管理员删除编号为10的项目状态', '2130706433', null, '1499313184');
INSERT INTO `yzw_admin_log` VALUES ('936', '1', 'admin', '管理员添加项目状态编号为11', '2130706433', null, '1499313402');
INSERT INTO `yzw_admin_log` VALUES ('937', '1', 'admin', '管理员修改编号为51328的广告位', '2130706433', null, '1499319382');
INSERT INTO `yzw_admin_log` VALUES ('938', '1', 'admin', '后台登录', '2130706433', null, '1499329358');
INSERT INTO `yzw_admin_log` VALUES ('939', '47', '123', '后台登录', '2130706433', null, '1499329884');
INSERT INTO `yzw_admin_log` VALUES ('940', '1', 'admin', '后台登录', '2130706433', null, '1499329895');
INSERT INTO `yzw_admin_log` VALUES ('941', '29', 'qwe', '后台登录', '2130706433', null, '1499329942');
INSERT INTO `yzw_admin_log` VALUES ('942', '1', 'admin', '后台登录', '2130706433', null, '1499329961');
INSERT INTO `yzw_admin_log` VALUES ('943', '1', 'admin', '后台登录', '2130706433', null, '1499330103');
INSERT INTO `yzw_admin_log` VALUES ('944', '29', 'qwe', '后台登录', '2130706433', null, '1499330216');
INSERT INTO `yzw_admin_log` VALUES ('945', '29', 'qwe', '后台登录', '2130706433', null, '1499330229');
INSERT INTO `yzw_admin_log` VALUES ('946', '29', 'qwe', '管理员删除编号为96的广告', '2130706433', null, '1499330341');
INSERT INTO `yzw_admin_log` VALUES ('947', '1', 'admin', '后台登录', '2130706433', null, '1499330400');
INSERT INTO `yzw_admin_log` VALUES ('948', '29', 'qwe', '后台登录', '2130706433', null, '1499330415');
INSERT INTO `yzw_admin_log` VALUES ('949', '1', 'admin', '后台登录', '2130706433', null, '1499330579');
INSERT INTO `yzw_admin_log` VALUES ('950', '29', 'qwe', '后台登录', '2130706433', null, '1499330595');
INSERT INTO `yzw_admin_log` VALUES ('951', '1', 'admin', '后台登录', '2130706433', null, '1499330647');
INSERT INTO `yzw_admin_log` VALUES ('952', '29', 'qwe', '后台登录', '2130706433', null, '1499331360');
INSERT INTO `yzw_admin_log` VALUES ('953', '29', 'qwe', '后台登录', '2130706433', null, '1499331452');
INSERT INTO `yzw_admin_log` VALUES ('954', '29', 'qwe', '后台登录', '2130706433', null, '1499331536');
INSERT INTO `yzw_admin_log` VALUES ('955', '1', 'admin', '后台登录', '2130706433', null, '1499331546');
INSERT INTO `yzw_admin_log` VALUES ('956', '1', 'admin', '管理员添加项目分类编号为17', '2130706433', null, '1499331627');
INSERT INTO `yzw_admin_log` VALUES ('957', '1', 'admin', '后台登录', '2130706433', null, '1499387092');
INSERT INTO `yzw_admin_log` VALUES ('958', '1', 'admin', '后台登录', '2130706433', null, '1499387193');
INSERT INTO `yzw_admin_log` VALUES ('959', '29', 'qwe', '后台登录', '2130706433', null, '1499392283');
INSERT INTO `yzw_admin_log` VALUES ('960', '1', 'admin', '后台登录', '2130706433', null, '1499392298');
INSERT INTO `yzw_admin_log` VALUES ('961', '29', 'qwe', '后台登录', '2130706433', null, '1499392736');
INSERT INTO `yzw_admin_log` VALUES ('962', '1', 'admin', '后台登录', '2130706433', null, '1499393605');
INSERT INTO `yzw_admin_log` VALUES ('963', '1', 'admin', '后台登录', '2130706433', null, '1499393656');
INSERT INTO `yzw_admin_log` VALUES ('964', '1', 'admin', '管理员修改编号为90的广告', '2130706433', null, '1499394001');
INSERT INTO `yzw_admin_log` VALUES ('965', '1', 'admin', '管理员修改编号为97的广告', '2130706433', null, '1499394009');
INSERT INTO `yzw_admin_log` VALUES ('966', '1', 'admin', '管理员删除编号为97的广告', '2130706433', null, '1499394012');
INSERT INTO `yzw_admin_log` VALUES ('967', '1', 'admin', '后台登录', '2130706433', null, '1499394044');
INSERT INTO `yzw_admin_log` VALUES ('968', '1', 'admin', '管理员修改编号为90的广告', '2130706433', null, '1499394065');
INSERT INTO `yzw_admin_log` VALUES ('969', '1', 'admin', '管理员修改编号为95的广告', '2130706433', null, '1499394072');
INSERT INTO `yzw_admin_log` VALUES ('970', '1', 'admin', '管理员修改编号为98的广告', '2130706433', null, '1499394081');
INSERT INTO `yzw_admin_log` VALUES ('971', '29', 'qwe', '后台登录', '2130706433', null, '1499394615');
INSERT INTO `yzw_admin_log` VALUES ('972', '29', 'qwe', '后台登录', '2130706433', null, '1499394635');
INSERT INTO `yzw_admin_log` VALUES ('973', '29', 'qwe', '后台登录', '2130706433', null, '1499394695');
INSERT INTO `yzw_admin_log` VALUES ('974', '1', 'admin', '后台登录', '2130706433', null, '1499394709');
INSERT INTO `yzw_admin_log` VALUES ('975', '29', 'qwe', '后台登录', '2130706433', null, '1499395446');
INSERT INTO `yzw_admin_log` VALUES ('976', '1', 'admin', '后台登录', '2130706433', null, '1499395458');
INSERT INTO `yzw_admin_log` VALUES ('977', '29', 'qwe', '后台登录', '2130706433', null, '1499395630');
INSERT INTO `yzw_admin_log` VALUES ('978', '1', 'admin', '后台登录', '2130706433', null, '1499395943');
INSERT INTO `yzw_admin_log` VALUES ('979', '29', 'qwe', '后台登录', '2130706433', null, '1499397601');
INSERT INTO `yzw_admin_log` VALUES ('980', '1', 'admin', '后台登录', '2130706433', null, '1499397613');
INSERT INTO `yzw_admin_log` VALUES ('981', '29', 'qwe', '后台登录', '2130706433', null, '1499397628');
INSERT INTO `yzw_admin_log` VALUES ('982', '1', 'admin', '后台登录', '2130706433', null, '1499397694');
INSERT INTO `yzw_admin_log` VALUES ('983', '29', 'qwe', '后台登录', '2130706433', null, '1499397704');
INSERT INTO `yzw_admin_log` VALUES ('984', '1', 'admin', '后台登录', '2130706433', null, '1499397723');
INSERT INTO `yzw_admin_log` VALUES ('985', '46', '11', '后台登录', '2130706433', null, '1499397812');
INSERT INTO `yzw_admin_log` VALUES ('986', '29', 'qwe', '后台登录', '2130706433', null, '1499397822');
INSERT INTO `yzw_admin_log` VALUES ('987', '1', 'admin', '后台登录', '2130706433', null, '1499397830');
INSERT INTO `yzw_admin_log` VALUES ('988', '29', 'qwe', '后台登录', '2130706433', null, '1499397855');
INSERT INTO `yzw_admin_log` VALUES ('989', '1', 'admin', '后台登录', '2130706433', null, '1499397876');
INSERT INTO `yzw_admin_log` VALUES ('990', '29', 'qwe', '后台登录', '2130706433', null, '1499397886');
INSERT INTO `yzw_admin_log` VALUES ('991', '1', 'admin', '后台登录', '2130706433', null, '1499397894');
INSERT INTO `yzw_admin_log` VALUES ('992', '1', 'admin', '后台登录', '2130706433', null, '1499406744');
INSERT INTO `yzw_admin_log` VALUES ('993', '29', 'qwe', '后台登录', '2130706433', null, '1499406766');

-- ----------------------------
-- Table structure for `yzw_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_admin_role`;
CREATE TABLE `yzw_admin_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限分类ID',
  `role_name` varchar(40) DEFAULT NULL COMMENT '权限分类名称',
  `act_list` varchar(100) DEFAULT NULL COMMENT '权限列表(用逗号分开)',
  `role_desc` varchar(255) DEFAULT NULL COMMENT '该等级管理描述',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_admin_role
-- ----------------------------
INSERT INTO `yzw_admin_role` VALUES ('7', '权限名称zz', '11,12,13,21', '权限描述zz');
INSERT INTO `yzw_admin_role` VALUES ('29', '22', '11,21,31,41,51', '22');
INSERT INTO `yzw_admin_role` VALUES ('27', '33', '12,21,22', '33');

-- ----------------------------
-- Table structure for `yzw_article`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_article`;
CREATE TABLE `yzw_article` (
  `article_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `cat_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '类别ID',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` longtext NOT NULL COMMENT '文章内容',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `is_open` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `description` mediumtext COMMENT '文章摘要',
  `click` int(11) DEFAULT '0' COMMENT '浏览量',
  `publish_time` int(11) DEFAULT '0' COMMENT '文章发布时间',
  `img_url` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `img_chain` varchar(255) DEFAULT NULL COMMENT '视频外链',
  `video_name` varchar(255) DEFAULT NULL COMMENT '视频路径',
  PRIMARY KEY (`article_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1317 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of yzw_article
-- ----------------------------
INSERT INTO `yzw_article` VALUES ('1284', '102', '平台介绍', '', '', '1', '1498713953', '', null, '0', '1499393492', '2017-07-07/595eedd4853aa.gif', null, null);
INSERT INTO `yzw_article` VALUES ('1285', '102', '平台优势', '', '', '1', '1498713953', '', null, '0', '1499393410', '2017-07-07/595eed82611d0.png', null, null);
INSERT INTO `yzw_article` VALUES ('1286', '102', '服务方式', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1287', '102', '运行模式', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1288', '104', '自由经理人', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1289', '104', '项目发布流程', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1290', '104', '佣金申请流程', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1291', '105', '帮助中心', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1292', '105', '常见问题', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1293', '105', '服务声明', '', '', '1', '1498713953', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1300', '103', 'sdfsdfsdf', '', '', '1', '1498783623', '', null, '0', '1499393504', '2017-07-07/595eede0443fc.gif', '', '1111.mp4');
INSERT INTO `yzw_article` VALUES ('1306', '108', '', '', '', '1', '1499137681', '', null, '0', '1499393310', '2017-07-07/595eed1e107dd.png', null, null);
INSERT INTO `yzw_article` VALUES ('1302', '103', '水电费水电费', '', '', '1', '1499064563', '', null, '0', '0', '2017-07-03/5959e8f3d835e.jpg', '', '水电费水电费');
INSERT INTO `yzw_article` VALUES ('1305', '107', '撒的发斯蒂芬斯蒂芬', '<p>153135</p><p>131</p><p>35</p><p>13</p><p>131</p><p>535131</p>', '', '1', '1499133743', '', '撒的发斯蒂芬斯蒂芬\r\n是的发送到发送到\r\nsdfasfasdfdsa', '0', '1499393523', '2017-07-07/595eedf388ebe.gif', null, null);
INSERT INTO `yzw_article` VALUES ('1310', '111', '', '', '', '1', '1499147013', '', null, '0', '1499395650', '2017-07-07/595ef642544ec.gif', null, null);

-- ----------------------------
-- Table structure for `yzw_article_cat`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_article_cat`;
CREATE TABLE `yzw_article_cat` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `cat_name` varchar(20) DEFAULT NULL COMMENT '类别名称',
  `parent_id` smallint(6) DEFAULT NULL COMMENT '夫级ID',
  `sort_order` smallint(6) DEFAULT '50' COMMENT '排序',
  `cat_desc` varchar(255) DEFAULT NULL COMMENT '分类描述',
  `keywords` varchar(30) DEFAULT NULL COMMENT '搜索关键词',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_article_cat
-- ----------------------------
INSERT INTO `yzw_article_cat` VALUES ('102', '平台信息', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('103', '精彩视频', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('104', '自由经理人', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('105', '答疑解惑', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('113', '轮播右侧', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('107', '合作企业', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('108', '顶部', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('109', '底部', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('110', '流程介绍', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('111', 'app二维码', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('112', '关注二维码', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('114', '轮播左侧', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('115', '联系我们', null, '50', null, null);

-- ----------------------------
-- Table structure for `yzw_bill`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_bill`;
CREATE TABLE `yzw_bill` (
  `bill_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '账单表id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目id',
  `bile_time` int(11) DEFAULT NULL COMMENT '派发佣金的时间',
  `bile_price` decimal(10,2) DEFAULT NULL COMMENT '派发佣金的金额',
  `bile_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未发 1已发',
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_bill
-- ----------------------------

-- ----------------------------
-- Table structure for `yzw_ceshi`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_ceshi`;
CREATE TABLE `yzw_ceshi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `timer` int(10) DEFAULT NULL,
  `visit` int(10) DEFAULT '0',
  `ip` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_ceshi
-- ----------------------------
INSERT INTO `yzw_ceshi` VALUES ('1', 'sdfsd', '1499046367', '2', '127.0.0.1', '中国', '北京', '北京');
INSERT INTO `yzw_ceshi` VALUES ('2', null, null, '0', '127.0.0.1', null, null, null);
INSERT INTO `yzw_ceshi` VALUES ('3', null, null, '0', '127.0.0.1', '中国', '黑龙江', '哈尔滨');

-- ----------------------------
-- Table structure for `yzw_commission`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_commission`;
CREATE TABLE `yzw_commission` (
  `commission_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '佣金id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `commission_percentage` float(11,2) DEFAULT NULL COMMENT '佣金金额百分比',
  `commission_distribution` int(11) DEFAULT NULL COMMENT '分销等级 0一级分销 1二级分销',
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_commission
-- ----------------------------
INSERT INTO `yzw_commission` VALUES ('1', null, null, '312.21', null);

-- ----------------------------
-- Table structure for `yzw_config`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_config`;
CREATE TABLE `yzw_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '配置名称',
  `value` varchar(255) DEFAULT NULL COMMENT '配置的值',
  `desc` varchar(255) DEFAULT NULL COMMENT '配置描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_config
-- ----------------------------
INSERT INTO `yzw_config` VALUES ('1', 'store_name', '', null);
INSERT INTO `yzw_config` VALUES ('2', 'store_logo', '2017-07-05/595c568304f0f.jpg', null);
INSERT INTO `yzw_config` VALUES ('3', 'store_title', '', null);
INSERT INTO `yzw_config` VALUES ('4', 'store_desc', '444', null);
INSERT INTO `yzw_config` VALUES ('5', 'store_keywords', '', null);
INSERT INTO `yzw_config` VALUES ('6', 'contact_name', 'aaaa', null);
INSERT INTO `yzw_config` VALUES ('7', 'contact_phone', '', null);
INSERT INTO `yzw_config` VALUES ('8', 'contact_address', '', null);
INSERT INTO `yzw_config` VALUES ('9', 'contact_qq1', '66', null);
INSERT INTO `yzw_config` VALUES ('10', 'contact_qq2', '', null);
INSERT INTO `yzw_config` VALUES ('11', 'contact_qq3', '', null);
INSERT INTO `yzw_config` VALUES ('12', 'contact_email', '', null);
INSERT INTO `yzw_config` VALUES ('13', 'profit1', '12', null);
INSERT INTO `yzw_config` VALUES ('14', 'profit2', '122222', null);
INSERT INTO `yzw_config` VALUES ('15', 'alipay', '按时送达大厦', null);
INSERT INTO `yzw_config` VALUES ('16', 'wechat', '12312312321', null);

-- ----------------------------
-- Table structure for `yzw_examine`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_examine`;
CREATE TABLE `yzw_examine` (
  `examine_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '审核表id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目表id',
  `examine_time` int(11) NOT NULL DEFAULT '0' COMMENT '审核时间',
  `examine_info` varchar(300) DEFAULT NULL COMMENT '审核信息',
  `examine_tf` tinyint(1) DEFAULT NULL COMMENT '0失败 1成功',
  PRIMARY KEY (`examine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_examine
-- ----------------------------

-- ----------------------------
-- Table structure for `yzw_img`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_img`;
CREATE TABLE `yzw_img` (
  `img_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表主键',
  `img_name` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `img_url` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `img_desc` varchar(300) DEFAULT NULL COMMENT '图片描述',
  `img_chain` varchar(255) DEFAULT NULL COMMENT '图片外链',
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_img
-- ----------------------------
INSERT INTO `yzw_img` VALUES ('5', '5955e78600ee8.gif', '/Uploads/Admin/2017-06-30/5955e78600ee8.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('6', '5955ea0743fde.png', '/Uploads/Admin/2017-06-30/5955ea0743fde.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('7', '5955ea165838d.png', '/Uploads/Admin/2017-06-30/5955ea165838d.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('8', '5955ea6593ec2.png', '/Uploads/Admin/2017-06-30/5955ea6593ec2.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('9', '5955ea7593e6d.png', '/Uploads/Admin/2017-06-30/5955ea7593e6d.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('10', '5955ece88a971.gif', '/Uploads/Admin/2017-06-30/5955ece88a971.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('11', '5955ef29ecfc3.gif', '/Uploads/Admin/2017-06-30/5955ef29ecfc3.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('12', '5955f4bc94822.gif', '/Uploads/Admin/2017-06-30/5955f4bc94822.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('13', '5955f9ae219ca.png', '/Uploads/Admin/2017-06-30/5955f9ae219ca.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('14', '5955fd6c5ca5a.gif', '/Uploads/Admin/2017-06-30/5955fd6c5ca5a.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('15', '5955fe65002be.gif', '/Uploads/Admin/2017-06-30/5955fe65002be.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('16', '5955fe7188d25.png', '/Uploads/Admin/2017-06-30/5955fe7188d25.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('17', '5955ffa819adf.png', '/Uploads/Admin/2017-06-30/5955ffa819adf.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('18', '59560109210cf.png', '/Uploads/Admin/2017-06-30/59560109210cf.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('19', '5956f75ec8a74.png', '/Uploads/Admin/2017-07-01/5956f75ec8a74.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('20', '5956f7ad08246.png', '/Uploads/Admin/2017-07-01/5956f7ad08246.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('21', '5956f7bab6296.png', '/Uploads/Admin/2017-07-01/5956f7bab6296.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('22', '5956f7e2da5de.png', '/Uploads/Admin/2017-07-01/5956f7e2da5de.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('23', '5956faa4790ad.png', '/Uploads/Admin/2017-07-01/5956faa4790ad.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('24', '59599a7782f82.png', '/Uploads/Admin/2017-07-03/59599a7782f82.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('25', '595eefd1ab0f2.gif', '/Uploads/Admin/2017-07-07/595eefd1ab0f2.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('26', '595eefd95d08f.gif', '/Uploads/Admin/2017-07-07/595eefd95d08f.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('27', '595ef011c08d3.png', '/Uploads/Admin/2017-07-07/595ef011c08d3.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('28', '595ef018177e3.gif', '/Uploads/Admin/2017-07-07/595ef018177e3.gif', '广告', null);
INSERT INTO `yzw_img` VALUES ('29', '595ef02151cae.gif', '/Uploads/Admin/2017-07-07/595ef02151cae.gif', '广告', null);

-- ----------------------------
-- Table structure for `yzw_information`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_information`;
CREATE TABLE `yzw_information` (
  `information_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '信息表id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目id',
  `information_type` int(3) DEFAULT NULL COMMENT '信息类型 0站内信息 1变更信息 2 佣金发放信息',
  `information_content` varchar(800) DEFAULT NULL COMMENT '信息内容',
  `add_time` int(11) DEFAULT NULL COMMENT '发布信息时间',
  PRIMARY KEY (`information_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_information
-- ----------------------------
INSERT INTO `yzw_information` VALUES ('1', null, null, '0', 'app上线了，快来看看呀!!!!!!', null);
INSERT INTO `yzw_information` VALUES ('2', null, null, '0', 'app上线了，快来看看呀!!!!!!', '1499319040');
INSERT INTO `yzw_information` VALUES ('4', null, null, '0', '1?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']?id=\'.$find[\'information_id\']', '1499319295');
INSERT INTO `yzw_information` VALUES ('7', '2', '3', '1', '变更信息', '1499319295');
INSERT INTO `yzw_information` VALUES ('8', '2', '4', '2', '佣金发放', '1499319295');
INSERT INTO `yzw_information` VALUES ('9', '1', '4', '1', '您的客服以变异', '1499319295');
INSERT INTO `yzw_information` VALUES ('10', '1', '3', '2', '两亿吨金条以邮到您家里', '1499319295');
INSERT INTO `yzw_information` VALUES ('12', '2', '5', '1', '您的商城项目项目已被指派客服，如有问题可咨询客服解决！', '1499392060');
INSERT INTO `yzw_information` VALUES ('13', '2', '5', '1', '您的商城项目项目客服已变更，请留意。有问题可咨询客服解决！', '1499392081');
INSERT INTO `yzw_information` VALUES ('14', '2', '4', '1', '您的项目名称2项目已被指派客服，如有问题可咨询客服解决！', '1499392494');
INSERT INTO `yzw_information` VALUES ('15', '1', '3', '1', '您的项目名称项目已被指派客服，如有问题可咨询客服解决！', '1499396717');
INSERT INTO `yzw_information` VALUES ('16', '2', '4', '1', '您的项目名称2项目客服已变更，请留意。有问题可咨询客服解决！', '1499396722');

-- ----------------------------
-- Table structure for `yzw_order`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_order`;
CREATE TABLE `yzw_order` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `project_id` int(10) NOT NULL COMMENT '项目id',
  `order_sn` varchar(35) NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态',
  `mobile` varchar(60) NOT NULL DEFAULT '' COMMENT '手机',
  `pay_code` varchar(32) NOT NULL DEFAULT '' COMMENT '支付code',
  `pay_name` varchar(120) NOT NULL DEFAULT '' COMMENT '支付方式名称',
  `project_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '项目总价',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付款金额',
  `total_amount` decimal(10,2) DEFAULT '0.00' COMMENT '订单总价',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间',
  `user_note` varchar(255) NOT NULL DEFAULT '' COMMENT '用户备注',
  `admin_note` varchar(255) DEFAULT '' COMMENT '管理员备注',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_sn` (`order_sn`),
  KEY `user_id` (`user_id`),
  KEY `order_status` (`order_status`),
  KEY `pay_status` (`pay_status`),
  KEY `pay_id` (`pay_code`)
) ENGINE=MyISAM AUTO_INCREMENT=1421 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_order
-- ----------------------------
INSERT INTO `yzw_order` VALUES ('1420', '3', '1953215646564', '1', '0', '0', '', '', '', '0.00', '4500.00', '0.00', '1499303342', '0', '', '');

-- ----------------------------
-- Table structure for `yzw_project`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_project`;
CREATE TABLE `yzw_project` (
  `project_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目id',
  `type_id` int(11) DEFAULT NULL COMMENT '项目分类id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `project_name` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `project_desc` varchar(255) DEFAULT NULL COMMENT '项目描述',
  `project_contents` varchar(500) DEFAULT NULL COMMENT '项目详细信息',
  `project_state` int(10) NOT NULL DEFAULT '0' COMMENT '项目状态id',
  `project_stime` varchar(500) DEFAULT NULL COMMENT '项目状态进度时间(用逗号按顺序分隔)',
  `project_price` decimal(10,2) DEFAULT NULL COMMENT '项目保证金',
  `project_estimate` decimal(10,2) DEFAULT NULL COMMENT '预计投资金额',
  `project_actual` decimal(10,2) DEFAULT NULL COMMENT '实际投资基金',
  `img_id` int(11) DEFAULT NULL COMMENT '图片表id',
  `project_examine` int(1) NOT NULL DEFAULT '0' COMMENT '0未审核 1审核未通过 2审核已通过',
  `project_time` int(11) DEFAULT NULL COMMENT '项目发布时间',
  `project_address` varchar(150) DEFAULT NULL COMMENT '项目所在地',
  `project_service` int(10) NOT NULL DEFAULT '0' COMMENT '定制客服id(当后台设置中开启项目指定时，当前项目只有当前指定的客服可看)',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project
-- ----------------------------
INSERT INTO `yzw_project` VALUES ('3', '1', '1', '项目名称', '项目介绍', '详细介绍', '1', '1499331599', '80.00', '5000.55', '3600.00', null, '0', '1478331996', '银河系地球', '29');
INSERT INTO `yzw_project` VALUES ('4', '2', '2', '项目名称2', '项目介绍2', '详细介绍2', '0', '', '500.00', '250.00', '120.00', null, '0', '1478331996', '火星', '46');
INSERT INTO `yzw_project` VALUES ('5', '1', '2', '商城项目', '做一个商城', '详细的商城介绍', '0', null, '2000.00', '50000.00', '2000.00', null, '0', '1478331996', '哈尔滨', '0');

-- ----------------------------
-- Table structure for `yzw_project_log`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_project_log`;
CREATE TABLE `yzw_project_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目款项派发记录',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `admin_id` int(11) DEFAULT NULL COMMENT '管理员id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目id',
  `project_price` decimal(10,2) DEFAULT NULL COMMENT '项目款项派发金额',
  `log_info` varchar(255) DEFAULT NULL COMMENT '记录描述',
  `log_ip` varchar(30) DEFAULT NULL COMMENT 'ip地址',
  `log_time` int(15) DEFAULT NULL COMMENT '记录时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_log
-- ----------------------------

-- ----------------------------
-- Table structure for `yzw_project_state`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_project_state`;
CREATE TABLE `yzw_project_state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '状态完成度(以''|''区分)',
  `add_time` int(10) DEFAULT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_state
-- ----------------------------
INSERT INTO `yzw_project_state` VALUES ('1', '发布项目|项目审核|选择服务商,签合同|服务商工作|验收|佣金下发', '1483668553', '1499232764');
INSERT INTO `yzw_project_state` VALUES ('6', '1|2|3|4|5|6', '1499232010', '1499232770');
INSERT INTO `yzw_project_state` VALUES ('8', '第三方|阿斯蒂芬我|娃儿3 |去玩儿无色|12341 投诉人|水电费', '1499233382', null);
INSERT INTO `yzw_project_state` VALUES ('11', 'a|b|c|d|e|f', '1499313402', null);

-- ----------------------------
-- Table structure for `yzw_project_type`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_project_type`;
CREATE TABLE `yzw_project_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目分类id',
  `type_name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `type_desc` varchar(255) DEFAULT NULL COMMENT '分类描述',
  `type_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0不显示 1显示',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_type
-- ----------------------------
INSERT INTO `yzw_project_type` VALUES ('1', '测试分类', '测试分类', '0');
INSERT INTO `yzw_project_type` VALUES ('2', '测试分类2', '测试分类2', '1');
INSERT INTO `yzw_project_type` VALUES ('5', '1', '2', '1');
INSERT INTO `yzw_project_type` VALUES ('7', '23', '23', '1');
INSERT INTO `yzw_project_type` VALUES ('8', '1', '', '1');
INSERT INTO `yzw_project_type` VALUES ('9', '1', '2', '1');
INSERT INTO `yzw_project_type` VALUES ('11', '1', '', '1');
INSERT INTO `yzw_project_type` VALUES ('13', '1', '', '1');
INSERT INTO `yzw_project_type` VALUES ('15', '314', '124', '1');
INSERT INTO `yzw_project_type` VALUES ('16', '1', '1', '1');
INSERT INTO `yzw_project_type` VALUES ('17', '1', '1', '1');

-- ----------------------------
-- Table structure for `yzw_qrcode`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_qrcode`;
CREATE TABLE `yzw_qrcode` (
  `qrcode_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qrcode_path` varchar(150) DEFAULT NULL COMMENT '二维码路径',
  PRIMARY KEY (`qrcode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=611 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_qrcode
-- ----------------------------
INSERT INTO `yzw_qrcode` VALUES ('583', '/Public/Admin/images/qrcode3604.png');
INSERT INTO `yzw_qrcode` VALUES ('584', '/Public/Admin/images/qrcode3605.png');
INSERT INTO `yzw_qrcode` VALUES ('585', '/Public/Admin/images/qrcode3606.png');
INSERT INTO `yzw_qrcode` VALUES ('586', '/Public/Admin/images/qrcode3607.png');
INSERT INTO `yzw_qrcode` VALUES ('587', '/Public/Admin/images/qrcode3608.png');
INSERT INTO `yzw_qrcode` VALUES ('588', '/Public/Admin/images/qrcode3609.png');
INSERT INTO `yzw_qrcode` VALUES ('589', '/Public/Admin/images/qrcode3612.png');
INSERT INTO `yzw_qrcode` VALUES ('590', '/Public/Admin/images/qrcode3613.png');
INSERT INTO `yzw_qrcode` VALUES ('591', '/Public/Admin/images/qrcode3614.png');
INSERT INTO `yzw_qrcode` VALUES ('592', '/Public/Admin/images/qrcode3615.png');
INSERT INTO `yzw_qrcode` VALUES ('593', '/Public/Admin/images/qrcode3616.png');
INSERT INTO `yzw_qrcode` VALUES ('594', '/Public/Admin/images/qrcode3617.png');
INSERT INTO `yzw_qrcode` VALUES ('595', '/Public/Admin/images/qrcode3618.png');
INSERT INTO `yzw_qrcode` VALUES ('596', '/Public/Admin/images/qrcode3619.png');
INSERT INTO `yzw_qrcode` VALUES ('597', '/Public/Admin/images/qrcode3620.png');
INSERT INTO `yzw_qrcode` VALUES ('598', '/Public/Admin/images/qrcode3621.png');
INSERT INTO `yzw_qrcode` VALUES ('599', '/Public/Admin/images/qrcode3622.png');
INSERT INTO `yzw_qrcode` VALUES ('600', '/Public/Admin/images/qrcode3623.png');
INSERT INTO `yzw_qrcode` VALUES ('601', '/Public/Admin/images/qrcode3624.png');
INSERT INTO `yzw_qrcode` VALUES ('602', '/Public/Admin/images/qrcode3625.png');
INSERT INTO `yzw_qrcode` VALUES ('603', '/Public/Admin/images/qrcode3626.png');
INSERT INTO `yzw_qrcode` VALUES ('604', '/Public/Admin/images/qrcode3627.png');
INSERT INTO `yzw_qrcode` VALUES ('605', '/Public/Admin/images/qrcode3628.png');
INSERT INTO `yzw_qrcode` VALUES ('606', '/Public/Admin/images/qrcode3629.png');
INSERT INTO `yzw_qrcode` VALUES ('607', '/Public/Admin/images/qrcode3630.png');
INSERT INTO `yzw_qrcode` VALUES ('608', '/Public/Admin/images/qrcode3631.png');
INSERT INTO `yzw_qrcode` VALUES ('609', '/Public/Admin/images/qrcode3632.png');
INSERT INTO `yzw_qrcode` VALUES ('610', '/Public/Admin/images/qrcode3633.png');

-- ----------------------------
-- Table structure for `yzw_user_wallet`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_user_wallet`;
CREATE TABLE `yzw_user_wallet` (
  `wallet_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员钱包',
  `user_id` int(10) DEFAULT NULL COMMENT '会员id',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '会员余额',
  `withdrawals_pwd` int(32) DEFAULT NULL COMMENT '提现密码',
  PRIMARY KEY (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_user_wallet
-- ----------------------------
INSERT INTO `yzw_user_wallet` VALUES ('1', '1', '10000.56', null);
INSERT INTO `yzw_user_wallet` VALUES ('2', '3610', '5796.22', null);
INSERT INTO `yzw_user_wallet` VALUES ('3', '3611', '2222.55', null);
INSERT INTO `yzw_user_wallet` VALUES ('4', '3619', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('5', '3620', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('6', '3621', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('7', '3622', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('8', '3623', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('9', '3624', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('10', '3625', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('11', '3626', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('12', '3606', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('13', '3607', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('14', '3608', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('15', '3627', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('16', '3628', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('17', '3629', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('18', '3630', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('19', '3631', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('20', '3632', '0.00', null);
INSERT INTO `yzw_user_wallet` VALUES ('21', '3633', '0.00', null);

-- ----------------------------
-- Table structure for `yzw_users`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_users`;
CREATE TABLE `yzw_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `reg_time` int(10) unsigned DEFAULT '0' COMMENT '注册时间',
  `last_login` int(10) unsigned DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号码(正常注册为手机号，后台生成为账号)',
  `mobile_validated` tinyint(1) unsigned DEFAULT '0' COMMENT '是否验证手机',
  `province` int(6) DEFAULT '0' COMMENT '省份',
  `city` int(6) DEFAULT '0' COMMENT '市区',
  `district` int(6) DEFAULT '0' COMMENT '县',
  `email_validated` tinyint(1) unsigned DEFAULT '0' COMMENT '是否验证电子邮箱',
  `distribution` tinyint(1) DEFAULT '0' COMMENT '0一级分销 1二级分销',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '一级分销商的id',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `zfb_user` varchar(50) DEFAULT NULL COMMENT '支付宝账号',
  `wx_user` varchar(50) DEFAULT NULL COMMENT '微信号',
  `qrcode_id` int(10) DEFAULT NULL COMMENT '二维码表id',
  `stateid` int(10) NOT NULL DEFAULT '0' COMMENT '自由经理人为0 公司员工为1',
  `introduce` int(10) NOT NULL DEFAULT '0' COMMENT '项目介绍人id',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3634 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_users
-- ----------------------------
INSERT INTO `yzw_users` VALUES ('3606', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499136994', '0', '', 'se914u2r6646', '0', '0', '0', '0', '0', '0', '0', '项目介绍人', null, null, '585', '1', '0');
INSERT INTO `yzw_users` VALUES ('3607', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499136994', '0', '', 'fn3ifbms8gu', '0', '0', '0', '0', '0', '0', '0', '项目介绍人', null, null, '586', '1', '0');
INSERT INTO `yzw_users` VALUES ('3608', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499136994', '0', '', 'aw8g5zve85a', '0', '0', '0', '0', '0', '0', '0', '项目介绍人', null, null, '587', '1', '0');
INSERT INTO `yzw_users` VALUES ('1', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499136994', '0', '', 'user1', '0', '0', '0', '0', '0', '1', '3608', '用户名1', 'zfb1', 'wx1', null, '0', '3608');
INSERT INTO `yzw_users` VALUES ('2', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499136994', '0', '', 'user2', '0', '0', '0', '0', '0', '1', '3608', '用户名2', 'zfb2', 'wx2', null, '0', '3608');
INSERT INTO `yzw_users` VALUES ('3624', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145108', '0', '', '12numkehvnty', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '601', '1', '0');
INSERT INTO `yzw_users` VALUES ('3625', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145108', '0', '', '0m1ma9svmyck', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '602', '1', '0');
INSERT INTO `yzw_users` VALUES ('3626', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145109', '0', '', 'lt7hukfbwas', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '603', '1', '0');
INSERT INTO `yzw_users` VALUES ('3622', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145108', '0', '', 'ei9oltcy5o0', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '599', '1', '0');
INSERT INTO `yzw_users` VALUES ('3623', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145108', '0', '', '6sptolmv66f', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '600', '1', '0');
INSERT INTO `yzw_users` VALUES ('3627', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499145947', '0', '0', '6un7mg3sm0wb', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '604', '1', '0');
INSERT INTO `yzw_users` VALUES ('3628', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146512', '0', '0', 'zegn10som38k', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '605', '1', '0');
INSERT INTO `yzw_users` VALUES ('3629', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146512', '0', '0', 'hws2a752i793', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '606', '1', '0');
INSERT INTO `yzw_users` VALUES ('3630', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146512', '0', '0', 'w3kcs50lr5el', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '607', '1', '0');
INSERT INTO `yzw_users` VALUES ('3631', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146873', '0', '0', 'ltq4l6shgk73', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '608', '1', '0');
INSERT INTO `yzw_users` VALUES ('3632', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146873', '0', '0', 'bjwhmcji8ql9', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '609', '1', '0');
INSERT INTO `yzw_users` VALUES ('3633', '', 'b5bf27b2555de44e3df2230080db5a1d', '1499146873', '0', '0', 'a5jfemi8t7ac', '0', '0', '0', '0', '0', '0', '0', 'default', null, null, '610', '1', '0');

-- ----------------------------
-- Table structure for `yzw_video`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_video`;
CREATE TABLE `yzw_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '视频表id',
  `image` varchar(255) NOT NULL COMMENT '视频页面图片',
  `videoname` varchar(100) DEFAULT NULL COMMENT '视频文件名称',
  `link` text COMMENT '外部视频链接',
  `is_open` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0不显示 1显示',
  `title` varchar(100) NOT NULL COMMENT '视频标题名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_video
-- ----------------------------
