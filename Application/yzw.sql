/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : yzw

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-21 08:55:34
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
INSERT INTO `yzw_ad` VALUES ('90', '0', '0', '123', '123123', '68', '1497542400', '1497456000', '', '', '', '0', '0', '123');
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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_admin
-- ----------------------------
INSERT INTO `yzw_admin` VALUES ('1', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '1483155409', '1500511133', '2130706433', '0', '0');
INSERT INTO `yzw_admin` VALUES ('29', 'qwe', '', '202cb962ac59075b964b07152d234b70', '1498727336', '1499479464', '2130706433', '29', '0');
INSERT INTO `yzw_admin` VALUES ('31', 'asd', '', '7815696ecbf1c96e6894b779456d330e', '1499045201', '1499045210', '2130706433', '27', '0');
INSERT INTO `yzw_admin` VALUES ('46', '11', '', '6512bd43d9caa6e02c990b0a82652dca', '1499306805', '1499397812', '2130706433', '7', '0');
INSERT INTO `yzw_admin` VALUES ('47', '123', '', '202cb962ac59075b964b07152d234b70', '1499306912', '1499329884', '2130706433', '7', '0');
INSERT INTO `yzw_admin` VALUES ('48', '33', '', '182be0c5cdcd5072bb1864cdee4d3d6e', '1499407124', '1499407156', '2130706433', '7', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=1218 DEFAULT CHARSET=utf8;

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
INSERT INTO `yzw_admin_log` VALUES ('994', '1', 'admin', '后台登录', '2130706433', null, '1499407100');
INSERT INTO `yzw_admin_log` VALUES ('995', '48', '33', '后台登录', '2130706433', null, '1499407129');
INSERT INTO `yzw_admin_log` VALUES ('996', '1', 'admin', '后台登录', '2130706433', null, '1499407138');
INSERT INTO `yzw_admin_log` VALUES ('997', '48', '33', '后台登录', '2130706433', null, '1499407156');
INSERT INTO `yzw_admin_log` VALUES ('998', '1', 'admin', '后台登录', '2130706433', null, '1499407198');
INSERT INTO `yzw_admin_log` VALUES ('999', '1', 'admin', '管理员添加项目状态编号为12', '2130706433', null, '1499407234');
INSERT INTO `yzw_admin_log` VALUES ('1000', '1', 'admin', '管理员发布站内消息编号为17', '2130706433', null, '1499407379');
INSERT INTO `yzw_admin_log` VALUES ('1001', '1', 'admin', '管理员修改站内消息编号为17', '2130706433', null, '1499407385');
INSERT INTO `yzw_admin_log` VALUES ('1002', '1', 'admin', '管理员删除站内消息编号为17', '2130706433', null, '1499407387');
INSERT INTO `yzw_admin_log` VALUES ('1003', '1', 'admin', '管理员删除编号为1317的首页图片', '2130706433', null, '1499408266');
INSERT INTO `yzw_admin_log` VALUES ('1004', '1', 'admin', '管理员删除编号为1302的视频', '2130706433', null, '1499408363');
INSERT INTO `yzw_admin_log` VALUES ('1005', '1', 'admin', '管理员删除编号为1318的企业文章', '2130706433', null, '1499408590');
INSERT INTO `yzw_admin_log` VALUES ('1006', '1', 'admin', '管理员添加图片', '2130706433', null, '1499408800');
INSERT INTO `yzw_admin_log` VALUES ('1007', '1', 'admin', '管理员添加视频', '2130706433', null, '1499409151');
INSERT INTO `yzw_admin_log` VALUES ('1008', '1', 'admin', '管理员添加图片', '2130706433', null, '1499409217');
INSERT INTO `yzw_admin_log` VALUES ('1009', '1', 'admin', '管理员添加企业文章', '2130706433', null, '1499409320');
INSERT INTO `yzw_admin_log` VALUES ('1010', '1', 'admin', '管理员修改视频', '2130706433', null, '1499409512');
INSERT INTO `yzw_admin_log` VALUES ('1011', '1', 'admin', '管理员添加视频', '2130706433', null, '1499409512');
INSERT INTO `yzw_admin_log` VALUES ('1012', '1', 'admin', '管理员修改图片', '2130706433', null, '1499409620');
INSERT INTO `yzw_admin_log` VALUES ('1013', '1', 'admin', '管理员添加图片', '2130706433', null, '1499409620');
INSERT INTO `yzw_admin_log` VALUES ('1014', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1499409624');
INSERT INTO `yzw_admin_log` VALUES ('1015', '1', 'admin', '管理员修改视频', '2130706433', null, '1499409628');
INSERT INTO `yzw_admin_log` VALUES ('1016', '1', 'admin', '管理员添加视频', '2130706433', null, '1499409628');
INSERT INTO `yzw_admin_log` VALUES ('1017', '1', 'admin', '管理员修改企业文章', '2130706433', null, '1499409633');
INSERT INTO `yzw_admin_log` VALUES ('1018', '1', 'admin', '管理员添加企业文章', '2130706433', null, '1499409633');
INSERT INTO `yzw_admin_log` VALUES ('1019', '1', 'admin', '管理员修改图片', '2130706433', null, '1499409693');
INSERT INTO `yzw_admin_log` VALUES ('1020', '1', 'admin', '管理员添加图片', '2130706433', null, '1499409693');
INSERT INTO `yzw_admin_log` VALUES ('1021', '1', 'admin', '管理员修改图片', '2130706433', null, '1499409759');
INSERT INTO `yzw_admin_log` VALUES ('1022', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1499409764');
INSERT INTO `yzw_admin_log` VALUES ('1023', '1', 'admin', '管理员修改视频', '2130706433', null, '1499409768');
INSERT INTO `yzw_admin_log` VALUES ('1024', '1', 'admin', '管理员修改企业文章', '2130706433', null, '1499409773');
INSERT INTO `yzw_admin_log` VALUES ('1025', '1', 'admin', '管理员生成公司会员账号50条', '2130706433', null, '1499413018');
INSERT INTO `yzw_admin_log` VALUES ('1026', '1', 'admin', '管理员修改图片', '2130706433', null, '1499413533');
INSERT INTO `yzw_admin_log` VALUES ('1027', '1', 'admin', '后台登录', '2130706433', null, '1499414718');
INSERT INTO `yzw_admin_log` VALUES ('1028', '29', 'qwe', '后台登录', '2130706433', null, '1499414885');
INSERT INTO `yzw_admin_log` VALUES ('1029', '1', 'admin', '后台登录', '2130706433', null, '1499414916');
INSERT INTO `yzw_admin_log` VALUES ('1030', '1', 'admin', '后台登录', '2130706433', null, '1499415655');
INSERT INTO `yzw_admin_log` VALUES ('1031', '29', 'qwe', '后台登录', '2130706433', null, '1499416014');
INSERT INTO `yzw_admin_log` VALUES ('1032', '1', 'admin', '后台登录', '2130706433', null, '1499416125');
INSERT INTO `yzw_admin_log` VALUES ('1033', '1', 'admin', '后台登录', '2130706433', null, '1499474089');
INSERT INTO `yzw_admin_log` VALUES ('1034', '1', 'admin', '后台登录', '2130706433', null, '1499474187');
INSERT INTO `yzw_admin_log` VALUES ('1035', '1', 'admin', '后台登录', '2130706433', null, '1499474450');
INSERT INTO `yzw_admin_log` VALUES ('1036', '1', 'admin', '后台登录', '2130706433', null, '1499476948');
INSERT INTO `yzw_admin_log` VALUES ('1037', null, null, '后台登录', '2130706433', null, '1499477162');
INSERT INTO `yzw_admin_log` VALUES ('1038', null, null, '后台登录', '2130706433', null, '1499477166');
INSERT INTO `yzw_admin_log` VALUES ('1039', null, null, '后台登录', '2130706433', null, '1499477273');
INSERT INTO `yzw_admin_log` VALUES ('1040', null, null, '后台登录', '2130706433', null, '1499477288');
INSERT INTO `yzw_admin_log` VALUES ('1041', null, null, '后台登录', '2130706433', null, '1499478245');
INSERT INTO `yzw_admin_log` VALUES ('1042', null, null, '后台登录', '2130706433', null, '1499478255');
INSERT INTO `yzw_admin_log` VALUES ('1043', null, null, '后台登录', '2130706433', null, '1499478342');
INSERT INTO `yzw_admin_log` VALUES ('1044', '1', 'admin', '后台登录', '2130706433', null, '1499478460');
INSERT INTO `yzw_admin_log` VALUES ('1045', null, null, '后台登录', '2130706433', null, '1499478517');
INSERT INTO `yzw_admin_log` VALUES ('1046', null, null, '后台登录', '2130706433', null, '1499478544');
INSERT INTO `yzw_admin_log` VALUES ('1047', null, null, '后台登录', '2130706433', null, '1499478587');
INSERT INTO `yzw_admin_log` VALUES ('1048', null, null, '后台登录', '2130706433', null, '1499478597');
INSERT INTO `yzw_admin_log` VALUES ('1049', null, null, '后台登录', '2130706433', null, '1499478624');
INSERT INTO `yzw_admin_log` VALUES ('1050', null, null, '后台登录', '2130706433', null, '1499478643');
INSERT INTO `yzw_admin_log` VALUES ('1051', null, null, '后台登录', '2130706433', null, '1499478670');
INSERT INTO `yzw_admin_log` VALUES ('1052', null, null, '后台登录', '2130706433', null, '1499478728');
INSERT INTO `yzw_admin_log` VALUES ('1053', null, null, '后台登录', '2130706433', null, '1499478758');
INSERT INTO `yzw_admin_log` VALUES ('1054', null, null, '后台登录', '2130706433', null, '1499478812');
INSERT INTO `yzw_admin_log` VALUES ('1055', '1', 'admin', '后台登录', '2130706433', null, '1499478900');
INSERT INTO `yzw_admin_log` VALUES ('1056', null, null, '后台登录', '2130706433', null, '1499479055');
INSERT INTO `yzw_admin_log` VALUES ('1057', null, null, '后台登录', '2130706433', null, '1499479184');
INSERT INTO `yzw_admin_log` VALUES ('1058', null, null, '后台登录', '2130706433', null, '1499479226');
INSERT INTO `yzw_admin_log` VALUES ('1059', null, null, '后台登录', '2130706433', null, '1499479321');
INSERT INTO `yzw_admin_log` VALUES ('1060', null, null, '后台登录', '2130706433', null, '1499479352');
INSERT INTO `yzw_admin_log` VALUES ('1061', null, null, '后台登录', '2130706433', null, '1499479375');
INSERT INTO `yzw_admin_log` VALUES ('1062', '29', 'qwe', '后台登录', '2130706433', null, '1499479442');
INSERT INTO `yzw_admin_log` VALUES ('1063', '29', 'qwe', '后台登录', '2130706433', null, '1499479448');
INSERT INTO `yzw_admin_log` VALUES ('1064', '29', 'qwe', '后台登录', '2130706433', null, '1499479464');
INSERT INTO `yzw_admin_log` VALUES ('1065', '1', 'admin', '后台登录', '2130706433', null, '1499479551');
INSERT INTO `yzw_admin_log` VALUES ('1066', '1', 'admin', '管理员生成公司会员账号10条', '2130706433', null, '1499483517');
INSERT INTO `yzw_admin_log` VALUES ('1067', '1', 'admin', '管理员修改视频', '2130706433', null, '1499653723');
INSERT INTO `yzw_admin_log` VALUES ('1068', '1', 'admin', '管理员添加视频', '2130706433', null, '1499653739');
INSERT INTO `yzw_admin_log` VALUES ('1069', '1', 'admin', '管理员修改视频', '2130706433', null, '1499653897');
INSERT INTO `yzw_admin_log` VALUES ('1070', '1', 'admin', '管理员修改视频', '2130706433', null, '1499656709');
INSERT INTO `yzw_admin_log` VALUES ('1071', '1', 'admin', '管理员添加视频', '2130706433', null, '1499656861');
INSERT INTO `yzw_admin_log` VALUES ('1072', '1', 'admin', '管理员删除编号为1325的视频', '2130706433', null, '1499656870');
INSERT INTO `yzw_admin_log` VALUES ('1073', '1', 'admin', '管理员添加视频', '2130706433', null, '1499656889');
INSERT INTO `yzw_admin_log` VALUES ('1074', '1', 'admin', '管理员添加视频', '2130706433', null, '1499657012');
INSERT INTO `yzw_admin_log` VALUES ('1075', '1', 'admin', '后台登录', '2130706433', null, '1499658474');
INSERT INTO `yzw_admin_log` VALUES ('1076', '1', 'admin', '后台登录', '2130706433', null, '1499658984');
INSERT INTO `yzw_admin_log` VALUES ('1077', '1', 'admin', '后台登录', '2130706433', null, '1499663109');
INSERT INTO `yzw_admin_log` VALUES ('1078', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1499664262');
INSERT INTO `yzw_admin_log` VALUES ('1079', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1499664278');
INSERT INTO `yzw_admin_log` VALUES ('1080', '1', 'admin', '管理员修改编号为4的项目信息', '2130706433', null, '1499759713');
INSERT INTO `yzw_admin_log` VALUES ('1081', '1', 'admin', '管理员修改编号为5的项目信息', '2130706433', null, '1499760459');
INSERT INTO `yzw_admin_log` VALUES ('1082', '1', 'admin', '管理员修改编号为4的项目信息', '2130706433', null, '1499760679');
INSERT INTO `yzw_admin_log` VALUES ('1083', '1', 'admin', '管理员修改编号为5的项目信息', '2130706433', null, '1499838672');
INSERT INTO `yzw_admin_log` VALUES ('1084', '1', 'admin', '管理员修改编号为4的项目信息', '2130706433', null, '1499839652');
INSERT INTO `yzw_admin_log` VALUES ('1085', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499843103');
INSERT INTO `yzw_admin_log` VALUES ('1086', '1', 'admin', '后台登录', '2130706433', null, '1499993217');
INSERT INTO `yzw_admin_log` VALUES ('1087', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499993254');
INSERT INTO `yzw_admin_log` VALUES ('1088', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499993423');
INSERT INTO `yzw_admin_log` VALUES ('1089', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1499994430');
INSERT INTO `yzw_admin_log` VALUES ('1090', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1499994438');
INSERT INTO `yzw_admin_log` VALUES ('1091', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499994635');
INSERT INTO `yzw_admin_log` VALUES ('1092', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499994646');
INSERT INTO `yzw_admin_log` VALUES ('1093', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499995493');
INSERT INTO `yzw_admin_log` VALUES ('1094', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499995499');
INSERT INTO `yzw_admin_log` VALUES ('1095', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499995754');
INSERT INTO `yzw_admin_log` VALUES ('1096', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1499995948');
INSERT INTO `yzw_admin_log` VALUES ('1097', '1', 'admin', '管理员添加图片', '2130706433', null, '1500006562');
INSERT INTO `yzw_admin_log` VALUES ('1098', '1', 'admin', '管理员修改图片', '2130706433', null, '1500006576');
INSERT INTO `yzw_admin_log` VALUES ('1099', '1', 'admin', '管理员添加图片', '2130706433', null, '1500006586');
INSERT INTO `yzw_admin_log` VALUES ('1100', '1', 'admin', '管理员添加图片', '2130706433', null, '1500008614');
INSERT INTO `yzw_admin_log` VALUES ('1101', '1', 'admin', '管理员添加图片', '2130706433', null, '1500009225');
INSERT INTO `yzw_admin_log` VALUES ('1102', '1', 'admin', '管理员修改图片', '2130706433', null, '1500009522');
INSERT INTO `yzw_admin_log` VALUES ('1103', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500009800');
INSERT INTO `yzw_admin_log` VALUES ('1104', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500009825');
INSERT INTO `yzw_admin_log` VALUES ('1105', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500009922');
INSERT INTO `yzw_admin_log` VALUES ('1106', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500010410');
INSERT INTO `yzw_admin_log` VALUES ('1107', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500010433');
INSERT INTO `yzw_admin_log` VALUES ('1108', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500011158');
INSERT INTO `yzw_admin_log` VALUES ('1109', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500011231');
INSERT INTO `yzw_admin_log` VALUES ('1110', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500011272');
INSERT INTO `yzw_admin_log` VALUES ('1111', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500011310');
INSERT INTO `yzw_admin_log` VALUES ('1112', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500011692');
INSERT INTO `yzw_admin_log` VALUES ('1113', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500012072');
INSERT INTO `yzw_admin_log` VALUES ('1114', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500012810');
INSERT INTO `yzw_admin_log` VALUES ('1115', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500013365');
INSERT INTO `yzw_admin_log` VALUES ('1116', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500013608');
INSERT INTO `yzw_admin_log` VALUES ('1117', '1', 'admin', '管理员添加图片', '2130706433', null, '1500013817');
INSERT INTO `yzw_admin_log` VALUES ('1118', '1', 'admin', '管理员修改图片', '2130706433', null, '1500013887');
INSERT INTO `yzw_admin_log` VALUES ('1119', '1', 'admin', '管理员修改图片', '2130706433', null, '1500014071');
INSERT INTO `yzw_admin_log` VALUES ('1120', '1', 'admin', '管理员修改图片', '2130706433', null, '1500014159');
INSERT INTO `yzw_admin_log` VALUES ('1121', '1', 'admin', '管理员添加图片', '2130706433', null, '1500014171');
INSERT INTO `yzw_admin_log` VALUES ('1122', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500079859');
INSERT INTO `yzw_admin_log` VALUES ('1123', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500080002');
INSERT INTO `yzw_admin_log` VALUES ('1124', '1', 'admin', '管理员修改企业文章', '2130706433', null, '1500080634');
INSERT INTO `yzw_admin_log` VALUES ('1125', '1', 'admin', '管理员修改企业文章', '2130706433', null, '1500081050');
INSERT INTO `yzw_admin_log` VALUES ('1126', '1', 'admin', '管理员修改企业文章', '2130706433', null, '1500081198');
INSERT INTO `yzw_admin_log` VALUES ('1127', '1', 'admin', '后台登录', '2130706433', null, '1500081374');
INSERT INTO `yzw_admin_log` VALUES ('1128', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500083926');
INSERT INTO `yzw_admin_log` VALUES ('1129', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500084065');
INSERT INTO `yzw_admin_log` VALUES ('1130', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500084201');
INSERT INTO `yzw_admin_log` VALUES ('1131', '1', 'admin', '管理员添加图片', '2130706433', null, '1500084700');
INSERT INTO `yzw_admin_log` VALUES ('1132', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500090196');
INSERT INTO `yzw_admin_log` VALUES ('1133', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500090268');
INSERT INTO `yzw_admin_log` VALUES ('1134', '1', 'admin', '后台登录', '2130706433', null, '1500090585');
INSERT INTO `yzw_admin_log` VALUES ('1135', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500090569');
INSERT INTO `yzw_admin_log` VALUES ('1136', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500090576');
INSERT INTO `yzw_admin_log` VALUES ('1137', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500090600');
INSERT INTO `yzw_admin_log` VALUES ('1138', '1', 'admin', '后台登录', '2130706433', null, '1500103173');
INSERT INTO `yzw_admin_log` VALUES ('1139', '1', 'admin', '管理员生成公司会员账号10条', '2130706433', null, '1500103229');
INSERT INTO `yzw_admin_log` VALUES ('1140', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500106537');
INSERT INTO `yzw_admin_log` VALUES ('1141', '1', 'admin', '后台登录', '2130706433', null, '1500254347');
INSERT INTO `yzw_admin_log` VALUES ('1142', '1', 'admin', '后台登录', '2130706433', null, '1500254396');
INSERT INTO `yzw_admin_log` VALUES ('1143', '1', 'admin', '管理员修改编号为3的项目信息', '2130706433', null, '1500257534');
INSERT INTO `yzw_admin_log` VALUES ('1144', '1', 'admin', '管理员删除编号为13的项目分类', '2130706433', null, '1500261372');
INSERT INTO `yzw_admin_log` VALUES ('1145', '1', 'admin', '管理员删除编号为11的项目分类', '2130706433', null, '1500261373');
INSERT INTO `yzw_admin_log` VALUES ('1146', '1', 'admin', '管理员删除编号为15的项目分类', '2130706433', null, '1500261375');
INSERT INTO `yzw_admin_log` VALUES ('1147', '1', 'admin', '管理员删除编号为9的项目分类', '2130706433', null, '1500261376');
INSERT INTO `yzw_admin_log` VALUES ('1148', '1', 'admin', '管理员删除编号为8的项目分类', '2130706433', null, '1500261377');
INSERT INTO `yzw_admin_log` VALUES ('1149', '1', 'admin', '管理员删除编号为17的项目分类', '2130706433', null, '1500261377');
INSERT INTO `yzw_admin_log` VALUES ('1150', '1', 'admin', '管理员删除编号为5的项目分类', '2130706433', null, '1500261379');
INSERT INTO `yzw_admin_log` VALUES ('1151', '1', 'admin', '管理员删除编号为16的项目分类', '2130706433', null, '1500261380');
INSERT INTO `yzw_admin_log` VALUES ('1152', '1', 'admin', '管理员修改项目分类编号为7', '2130706433', null, '1500261396');
INSERT INTO `yzw_admin_log` VALUES ('1153', '1', 'admin', '管理员添加项目分类编号为18', '2130706433', null, '1500261400');
INSERT INTO `yzw_admin_log` VALUES ('1154', '1', 'admin', '管理员修改图片', '2130706433', null, '1500261364');
INSERT INTO `yzw_admin_log` VALUES ('1155', '1', 'admin', '管理员添加图片', '2130706433', null, '1500261443');
INSERT INTO `yzw_admin_log` VALUES ('1156', '1', 'admin', '管理员删除编号为1336的首页图片', '2130706433', null, '1500261453');
INSERT INTO `yzw_admin_log` VALUES ('1157', '1', 'admin', '后台登录', '2130706433', null, '1500273968');
INSERT INTO `yzw_admin_log` VALUES ('1158', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281061');
INSERT INTO `yzw_admin_log` VALUES ('1159', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281242');
INSERT INTO `yzw_admin_log` VALUES ('1160', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281443');
INSERT INTO `yzw_admin_log` VALUES ('1161', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281551');
INSERT INTO `yzw_admin_log` VALUES ('1162', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281627');
INSERT INTO `yzw_admin_log` VALUES ('1163', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281835');
INSERT INTO `yzw_admin_log` VALUES ('1164', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281918');
INSERT INTO `yzw_admin_log` VALUES ('1165', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500281950');
INSERT INTO `yzw_admin_log` VALUES ('1166', '1', 'admin', '后台登录', '2130706433', null, '1500282168');
INSERT INTO `yzw_admin_log` VALUES ('1167', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500282676');
INSERT INTO `yzw_admin_log` VALUES ('1168', '1', 'admin', '后台登录', '2130706433', null, '1500338238');
INSERT INTO `yzw_admin_log` VALUES ('1169', '1', 'admin', '管理员修改图片', '2130706433', null, '1500338255');
INSERT INTO `yzw_admin_log` VALUES ('1170', '1', 'admin', '管理员修改图片', '2130706433', null, '1500338263');
INSERT INTO `yzw_admin_log` VALUES ('1171', '1', 'admin', '管理员修改图片', '2130706433', null, '1500338277');
INSERT INTO `yzw_admin_log` VALUES ('1172', '1', 'admin', '管理员修改图片', '2130706433', null, '1500338805');
INSERT INTO `yzw_admin_log` VALUES ('1173', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500339655');
INSERT INTO `yzw_admin_log` VALUES ('1174', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500339825');
INSERT INTO `yzw_admin_log` VALUES ('1175', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500339836');
INSERT INTO `yzw_admin_log` VALUES ('1176', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500339841');
INSERT INTO `yzw_admin_log` VALUES ('1177', '1', 'admin', '管理员修改编号为1的项目状态', '2130706433', null, '1500339857');
INSERT INTO `yzw_admin_log` VALUES ('1178', '1', 'admin', '管理员修改编号为90的广告', '2130706433', null, '1500339926');
INSERT INTO `yzw_admin_log` VALUES ('1179', '1', 'admin', '管理员修改编号为5的项目信息', '2130706433', null, '1500341196');
INSERT INTO `yzw_admin_log` VALUES ('1180', '1', 'admin', '管理员修改图片', '2130706433', null, '1500343435');
INSERT INTO `yzw_admin_log` VALUES ('1181', '1', 'admin', '后台登录', '2130706433', null, '1500365739');
INSERT INTO `yzw_admin_log` VALUES ('1182', '1', 'admin', '后台登录', '2130706433', null, '1500429586');
INSERT INTO `yzw_admin_log` VALUES ('1183', '1', 'admin', '后台登录', '2130706433', null, '1500429623');
INSERT INTO `yzw_admin_log` VALUES ('1184', '1', 'admin', '管理员修改编号为20的项目信息', '2130706433', null, '1500431934');
INSERT INTO `yzw_admin_log` VALUES ('1185', '1', 'admin', '管理员发布站内消息编号为37', '2130706433', null, '1500432219');
INSERT INTO `yzw_admin_log` VALUES ('1186', '1', 'admin', '管理员添加视频', '2130706433', null, '1500441900');
INSERT INTO `yzw_admin_log` VALUES ('1187', '1', 'admin', '管理员添加视频', '2130706433', null, '1500441905');
INSERT INTO `yzw_admin_log` VALUES ('1188', '1', 'admin', '管理员添加视频', '2130706433', null, '1500441912');
INSERT INTO `yzw_admin_log` VALUES ('1189', '1', 'admin', '管理员修改视频', '2130706433', null, '1500441919');
INSERT INTO `yzw_admin_log` VALUES ('1190', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500442953');
INSERT INTO `yzw_admin_log` VALUES ('1191', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443004');
INSERT INTO `yzw_admin_log` VALUES ('1192', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443010');
INSERT INTO `yzw_admin_log` VALUES ('1193', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443448');
INSERT INTO `yzw_admin_log` VALUES ('1194', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443560');
INSERT INTO `yzw_admin_log` VALUES ('1195', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443641');
INSERT INTO `yzw_admin_log` VALUES ('1196', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443720');
INSERT INTO `yzw_admin_log` VALUES ('1197', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443729');
INSERT INTO `yzw_admin_log` VALUES ('1198', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443784');
INSERT INTO `yzw_admin_log` VALUES ('1199', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443815');
INSERT INTO `yzw_admin_log` VALUES ('1200', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443840');
INSERT INTO `yzw_admin_log` VALUES ('1201', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443854');
INSERT INTO `yzw_admin_log` VALUES ('1202', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443864');
INSERT INTO `yzw_admin_log` VALUES ('1203', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443897');
INSERT INTO `yzw_admin_log` VALUES ('1204', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500443947');
INSERT INTO `yzw_admin_log` VALUES ('1205', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500444288');
INSERT INTO `yzw_admin_log` VALUES ('1206', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500444463');
INSERT INTO `yzw_admin_log` VALUES ('1207', '1', 'admin', '管理员修改文章分类', '2130706433', null, '1500444516');
INSERT INTO `yzw_admin_log` VALUES ('1208', '1', 'admin', '管理员修改编号为22的项目信息', '2130706433', null, '1500445598');
INSERT INTO `yzw_admin_log` VALUES ('1209', '1', 'admin', '管理员修改编号为22的项目信息', '2130706433', null, '1500447593');
INSERT INTO `yzw_admin_log` VALUES ('1210', '1', 'admin', '后台登录', '2130706433', null, '1500451247');
INSERT INTO `yzw_admin_log` VALUES ('1211', '1', 'admin', '后台登录', '2130706433', null, '1500511133');
INSERT INTO `yzw_admin_log` VALUES ('1212', '1', 'admin', '管理员修改编号为24的项目信息', '2130706433', null, '1500511824');
INSERT INTO `yzw_admin_log` VALUES ('1213', '1', 'admin', '管理员修改编号为26的项目信息', '2130706433', null, '1500513508');
INSERT INTO `yzw_admin_log` VALUES ('1214', '1', 'admin', '管理员修改编号为27的项目信息', '2130706433', null, '1500513763');
INSERT INTO `yzw_admin_log` VALUES ('1215', '1', 'admin', '管理员修改编号为28的项目信息', '2130706433', null, '1500513802');
INSERT INTO `yzw_admin_log` VALUES ('1216', '1', 'admin', '管理员修改编号为29的项目信息', '2130706433', null, '1500514177');
INSERT INTO `yzw_admin_log` VALUES ('1217', '1', 'admin', '管理员删除站内消息编号为4', '2130706433', null, '1500515832');

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
INSERT INTO `yzw_admin_role` VALUES ('7', '权限名称zz', '11,12,13,21,31', '权限描述zz');
INSERT INTO `yzw_admin_role` VALUES ('29', '22', '31,32,33', '22');
INSERT INTO `yzw_admin_role` VALUES ('27', '33', '12,21,22', '33');

-- ----------------------------
-- Table structure for `yzw_article`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_article`;
CREATE TABLE `yzw_article` (
  `article_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `cat_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '类别ID',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content_title` longtext NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=1341 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of yzw_article
-- ----------------------------
INSERT INTO `yzw_article` VALUES ('1284', '102', '平台介绍', '免费注册成为星级会员，开放式分红，随时随地发布信息坐享高额佣金', '<p style=\"text-align: center;\">我们要做的，不仅是作为国内首家进行招标代理、造价查询等项目的对接平台，更竭诚为您打造一个完善的资源共享平台。您可以在此发布信息，在成功签订咨询合同后，将获得丰厚的佣金。资源共享，收益共享，让我们的快乐共享！一对一客服，让最专业的人为您答疑解惑。您的咨询将是我们莫大的荣幸！<br/></p>', '', '1', '1498713953', '', null, '0', '1500011692', '2017-07-07/595eedd4853aa.gif', null, null);
INSERT INTO `yzw_article` VALUES ('1285', '102', '平台优势', '', '行业首家咨询服务类信息对接平台,不分年龄、时间、地域，随时随地即可一键发布项目,成交即可获得高额佣金', '', '1', '1498713953', '', null, '0', '1500012072', '2017-07-07/595eed82611d0.png', null, null);
INSERT INTO `yzw_article` VALUES ('1286', '102', '服务方式', '一站式服务', '<p><span style=\"color: rgb(84, 141, 212);\"></span></p><h4 class=\"service\" style=\"box-sizing: border-box; margin: 10px 0px 39.375px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); font-size: 24px; white-space: normal; background-color: rgb(255, 255, 255);\">一站式服务</h4><p><span style=\"color: rgb(84, 141, 212);\">1、收获共赢化</span>项目签订佣金，不错过每一次分享</p><p><span style=\"color: rgb(84, 141, 212);\">2、体验个性化</span>专业客服服务，不耽误每一次提升。</p><p><span style=\"color: rgb(84, 141, 212);\">3、集合多元化</span>建筑项目信息，不放过每一桶金。</p><p><br/></p>', '', '1', '1498713953', '', null, '0', '1500090196', '2017-07-15/596966f3c4323.jpg', null, null);
INSERT INTO `yzw_article` VALUES ('1287', '102', '运行模式', '', '', '', '1', '1498713953', '', null, '0', '1500080002', '2017-07-15/596967821b0a6.png', null, null);
INSERT INTO `yzw_article` VALUES ('1288', '104', '自由经理人', '成为自由经理人，获取高额佣金', '<p>注册成为平台的自由经理人，通过向平台推荐项目，项目成交即可获得高额佣金！</p><p>并且佣金的提取非常方便，可通过平台自动提取佣金，审核完成后，您的佣金将在两周内到达您的账户。</p>', '', '1', '1498713953', '', null, '0', '1500013365', null, null, null);
INSERT INTO `yzw_article` VALUES ('1289', '104', '项目发布流程', '', '<h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">登陆或注册</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; color: rgb(16, 16, 16); line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">登陆或注册成为平台会员。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">发布项目</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; color: rgb(16, 16, 16); line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">发布您的项目，并与客服详细沟通细节。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">项目开发</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; color: rgb(16, 16, 16); line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">由平台出面，寻找开发商开发项目，并监督执行。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">佣金下发</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; color: rgb(16, 16, 16); line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">项目成交后，平台会下发相应佣金至经理人账户。</p><p><br/></p>', '', '1', '1498713953', '', null, '0', '1500084065', '2017-07-15/596977611ecc5.jpg', null, null);
INSERT INTO `yzw_article` VALUES ('1290', '104', '佣金申请流程', '', '', '', '1', '1498713953', '', null, '0', '1500084201', '2017-07-15/596977e9241d9.png', null, null);
INSERT INTO `yzw_article` VALUES ('1291', '105', '帮助中心', '', '<h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">1、为什么要注册优赚网</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">注册优赚网，成为优赚网的自由经理人，可以通过向平台推荐项目获取高额佣金。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">2、如何注册优赚网</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">在注册界面，填写手机号等相关信息完成注册。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">3、注册收不到手机验证码怎么办</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">点击收不到短信，按照提示编辑短信注册，zc#6位以上数字字母密码到10690999106直接注册（例如zc#123456）。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">4、手机号码已被注册怎么办</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">如果您的手机号码已被注册，您可以通过找回密码来重设密码，找回账号。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">5、通过优赚网赚取佣金安全吗</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">我们是招标代理和造价咨询等项目信息对接的专业凭条，一对一的客服服务，并且承诺载合同签订后完成收款，将在第一时间下发佣金。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">6、没有收到佣金怎么办</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，可能您的账户有误，需要立即联系我们的客服人员，进行账号核实。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">7、为什么可以获得高额佣金？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，被推荐项目成功通过优赚网成交后，开发商将把提成返给优赚网，我们会第一时间将提成分享给自由经理人。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">8、佣金到账周期是多久？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，自由经理人确认佣金提现申请后，我们工作人员将在10个个工作日内，将佣金打到您账户中。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">9、一定要成交以后才能获得佣金吗？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，是的，只有被推荐项目成功成交后，开发商才将提成返给优赚网，这时才能产生收益。</p><p><br/></p>', '', '1', '1498713953', '', null, '0', '1500090268', null, null, null);
INSERT INTO `yzw_article` VALUES ('1292', '105', '常见问题', '', '<h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">1、什么是佣金</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">佣金是本平台对项目经理人推荐项目成交后的酬劳奖励，被推荐项目成功通过本平台成交后，我们会第一时间将佣金发放给自由经理人。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">2、如何获得佣金</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">已注册的自由经理人，通过提供项目信息成功与平台合作企业签订合同，成交后即可获得佣金。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">3、佣金如何提取</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">已注册并且添加银行账户的，可通过平台自动提取佣金，审核完成后，我们的工作人员将在两周内安排发放佣金至自由经理人所绑定的银行卡账户，也可以通过在线预约的形式，预约现金领取。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">4、如何注册成为自由经理人</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">自由经理人注册时非常方便的，只要您提交过项目信息，您的手机号码就是您账号，密码可以通过密码找回功能设置。当然您也可以直接注册自由经理人并成功设置密码，登录后提交。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">5、通过优赚网赚取佣金安全吗</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">我们是招标代理和造价咨询等项目信息对接的专业凭条，一对一的客服服务，并且承诺载合同签订后完成收款，将在第一时间下发佣金。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">6、没有收到佣金怎么办</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，可能您的账户有误，需要立即联系我们的客服人员，进行账号核实。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">7、为什么可以获得高额佣金？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，被推荐项目成功通过优赚网成交后，开发商将把提成返给优赚网，我们会第一时间将提成分享给自由经理人。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">8、佣金到账周期是多久？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，自由经理人确认佣金提现申请后，我们工作人员将在10个个工作日内，将佣金打到您账户中。</p><p><br style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-family: 微软雅黑; color: rgb(51, 51, 51); font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">9、一定要成交以后才能获得佣金吗？</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">您好，是的，只有被推荐项目成功成交后，开发商才将提成返给优赚网，这时才能产生收益。</p><p><br/></p>', '', '1', '1498713953', '', null, '0', '1500090569', null, null, null);
INSERT INTO `yzw_article` VALUES ('1293', '105', '服务声明', '', '<h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">1、优赚网服务条款的接受</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">通过完成优赚网注册程序，用户便表明其接受了本服务协议的条款，并同意受本服务协议的约束；同时，用户保证其提交的信息真实、准确、及时和完整。 本服务协议所称的用户是指完全同意所有条款(以下简称“服务条款”)并完成注册程序的服务接受者。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">2、 服务条款的变更和修改</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">优赚网保留依其自主判断在将来的任何时间变更、修改、增加或删除本服务协议条款的权利。所有修改的协议均构成本服务协议的一部分。优赚网有权随时对服务条款进行修改，一旦发生服务条款的变动，优赚网将提示修改的内容；当用户使用优赚网的特殊服务时，应接受优赚网随时提供的与该特殊服务相关的规则或说明，并且此规则或说明均构成本服务条款的一部分。用户如果不同意服务条款的修改，可以主动取消已经获得的网络服务；如果用户继续享用网络服务，则视为用户已经接受服务条款的修改。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">3、 服务说明</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">优赚网运用自己的操作系统通过国际互联网向用户提供丰富的网上资源，包括各种信息工具、网上论坛、个性化内容等(以下简称本服务)。除非另有明确规定，增强或强化目前服务的任何新功能，包括新产品，均无条件地适用本服务条款。 除非本协议中另有规定，否则优赚网对网络服务不承担任何责任，即用户对网络服务的使用承担风险。优赚网不保证服务一定会满足用户的使用要求，也不保证服务不会受中断，对服务的及时性、安全性、准确性也不作担保。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">A. 为使用本服务，用户必须：</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(1).自行配备进入国际互联网所必需的设备，包括计算机、数据机，其他存取装置或接受服务所需其它设备；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2).自行支付与此服务有关的费用；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">B. 用户接受本服务须同意：</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(1).提供完整、真实、准确、最新的个人资料；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2).不断更新注册资料。 若用户提供任何错误、不实、过时或不完整的资料，或者优赚网有合理理由怀疑前述资料为错误、不实、过时或不完整，优赚网有权暂停或终止用户的帐号，并拒绝其现在或将来使用本服务的全部或一部分。 优赚网有权规定并修改使用本服务的一般措施，包括但不限于决定保留电子邮件讯息或其他上载内容的时间、限制本服务一个帐号可接收信息的数量等措施。如优赚网未能储存或删除本服务的内容或其他讯息。 由于用户经由本服务张贴或传送内容、与本服务连线、违反本服务条款或侵害其他人的任何权利导致任何第三方提出权利主张或使优赚网遭受任何形式的罚款或处罚，用户同意以适当方式充分消除对优赚网的不利影响，赔偿优赚网及其分公司、关联公司、代理人或其他合作伙伴及员工的损失，并使其免受损害。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">4、 用户应遵守以下法律及法规</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">用户同意遵守中华人民共和国法律法规，尤其是《中华人民共和国保守国家秘密法》、《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》等有关计算机及互联网的法律法规和实施办法。在任何情况下，如果优赚网有合理理由认为用户的行为可能违反上述法律、法规，优赚网可以在任何时候，不经事先通知终止向该用户提供服务。用户应了解国际互联网的无国界性，应特别注意遵守当地所有有关的法律和法规。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">5、 用户隐私权</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">当用户注册优赚网的服务时，用户须提供个人信息。优赚网收集个人信息的目的是为用户提供尽可能多的个人化网上服务以及为广告商提供一个方便的途径来接触到适合的用户，并且可以发送相关的信息和广告。在此过程中，广告商绝对不会接触到用户的个人信息。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">A. 优赚网不会在未经合法用户授权时，公开、编辑或透露其个人信息及保存在优赚网中的非公开内容，除非有下列情况：</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(1).有关法律规定或优赚网合法服务程序规定；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2).在紧急情况下，为维护用户及公众的权益；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(3).为维护优赚网的合法权益；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(4).其他需要公开、编辑或透露个人信息的情况。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">B. 在以下(包括但不限于)几种情况下，优赚网有权使用用户的个人信息：</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(1).在进行促销或抽奖时，优赚网可能会与赞助商共享用户的个人信息，在这些情况下优赚网会在发送用户信息之前进行提示，并且用户可以通过不参与来终止传送过程。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2).优赚网可以将用户信息与第三方数据匹配。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(3).优赚网会通过透露合计用户统计数据，向未来的合作伙伴、广告商及其他第三方以及为了其他合法目的而描述优赚网的服务。 优赚网会向用户发送客户订制的信息或者优赚网认为用户会感兴趣的其他信息。如果用户不希望收到这样的信息，只需在提供个人信息时或其他任何时候告知即可。另外，优赚网会采取行业惯用措施保护用户信息的安全，但优赚网不能确信或保证任何个人信息的安全性，用户须自己承担风险。比如用户联机公布可被公众访问的个人信息时，用户有可能会收到未经用户同意的信息；优赚网的合作伙伴和可通过优赚网访问的第三方因特网站点和服务；通过抽奖、促销等活动得知用户个人信息的第三方会进行独立的数据收集工作等活动。优赚网对用户及其他任何第三方的上述行为，不承担任何责任。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">6、 用户帐号、密码和安全</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">用户一旦注册成功，便成为优赚网的合法用户，将得到一个密码和帐号。用户有义务保证密码和帐号的安全。用户对利用该密码和帐号所进行的一切活动负全部责任；因此所衍生的任何损失或损害，优赚网无法也不承担任何责任。用户的密码和帐号遭到未授权的使用或发生其他任何安全问题，用户可以立即通知优赚网，并且用户在每次连线结束，应结束帐号使用，否则用户可能得不到优赚网的安全保护。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">7、 对用户信息的存储和限制</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">优赚网不对用户所发布信息的删除或储存失败负责。优赚网有权判断用户的行为是否符合优赚网服务条款规定的权利，如果优赚网认为用户违背了服务条款的规定，优赚网有权删除用户发布或发送的信息，乃至中断或终止向其提供网络服务。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">8、 禁止用户从事以下行为</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">(1).上载、张贴、发送或传送任何非法、有害、淫秽、粗俗、猥亵的，胁迫、骚扰、中伤他人的，诽谤、侵害他人隐私或诋毁他人名誉或商誉的，种族歧视或其他不适当的信息或电子邮件，包括但不限于资讯、资料、文字、软件、音乐、照片、图形、信息或其他资料(以下简称内容)。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2).以任何方式危害未成年人。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(3).冒充任何人或机构，或以虚伪不实的方式谎称或使人误认为与任何人或任何机构有关。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(4).伪造标题或以其他方式操控识别资料，使人误认为该内容为优赚网所传送。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(5).上载、张贴、发送电子邮件或以其他方式传送无权传送的内容(例如内部资料、机密资料)。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(6).上载、张贴、发送电子邮件或以其他方式传送侵犯任何人的专利、商标、著作权、商业秘密或其他专属权利之内容。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(7).在优赚网网站专供张贴广告的区域之外，上载、张贴、发送电子邮件或以其他方式传送广告函件、促销资料、&quot;垃圾邮件&quot;等。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(8).上载、张贴、发送电子邮件或以其他方式传送有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(9).干扰或破坏本服务或与本服务相连的服务器和网络，或不遵守本服务协议之规定。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(10).故意或非故意违反任何相关的中国法律、法规、规章、条例等其他具有法律效力的规范。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(11).跟踪或以其他方式骚扰他人。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(12).其它被优赚网视为不适当的行为。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">用户对经由本服务上载、张贴、发送电子邮件或传送的内容负全部责任；对于经由本服务而传送的内容，优赚网不保证前述内容的正确性、完整性或品质。用户在接受本服务时，有可能会接触到令人不快、不适当或令人厌恶的内容。在任何情况下，优赚网均不对任何内容负责，包括但不限于任何内容发生任何错误或纰漏以及衍生的任何损失或损害。优赚网有权(但无义务)自行拒绝或删除经由本服务提供的任何内容。用户使用上述内容，应自行承担风险。 优赚网有权利在下述情况下，对内容进行保存或披露：</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(1) 法律程序所规定；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(2) 本服务条款规定；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(3) 被侵害的第三人提出权利主张；</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(4) 为保护优赚网、其使用者及社会公众的权利、财产或人身安全。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">(5) 其他优赚网认为有必要的情况。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">9、 关于用户在优赚网的公开使用区域张贴内容</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">“公开使用区域”包括网上论坛和其它一般公众可以使用的区域； 用户一旦在本服务公开使用区域张贴内容，即视为用户授予优赚网该内容著作权之免费及非独家许可使用权，优赚网有权为展示、传播及推广前述张贴的内容之服务目的，对上述内容进行复制、修改、出版。由此展示、传播及推广行为所产生的损失或利润，均由优赚网承担或享受。优赚网有权自主决定是否给予此类用户鼓励或奖励。因用户进行上述张贴，而导致任何第三方提出索赔要求或衍生的任何损害或损失，用户须承担全部责任。用户不得对他人张贴在公开使用区域或本服务其他内容进行复制、出售或用作其他商业用途。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">10、 关于链接</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本服务可能会提供与其他国际互联网网站或资源进行链接。对于前述网站或资源是否可以利用，优赚网不予担保。因使用或依赖上述网站或资源所产生的损失或损害，优赚网也不承担任何责任。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">11、 服务的修改和终止</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">优赚网有权在任何时候，暂时或永久地修改或终止本服务或其中任何一部分，无论是否通知。优赚网对本服务的修改或终止对用户和任何第三人不承担任何责任。优赚网有权基于任何理由，终止用户的帐号、密码或拒绝其使用本服务，或删除、转移用户存储、发布在本服务的内容，优赚网采取上述行为均不需通知，并且对用户和任何第三人不承担任何责任。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">12、 通知</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">优赚网向用户发出的通知，可以采用电子邮件、页面公告、常规信件或优赚网认为适合的形式。服务条款的修改或其他事项变更时，优赚网将会以上述形式进行通知。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">13、全部协议</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本服务协议规范用户使用本服务，将取代用户先前与优赚网签署的任何协议。本服务协议和优赚网的其他服务条款构成完整的协议。同时您也同意遵守以下两项服务管理规定和办法。《互联网电子公告服务管理规定》、《互联网信息服务管理办法》</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">14、 法律的适用和管辖</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本服务条款的生效、履行、解释及争议的解决均适用中华人民共和国法律，发生的争议提交哈尔滨仲裁委员会，其仲裁裁决是终局的。如果本服务协议中某项条款因与中华人民共和国现行法律相抵触而导致无效，将不影响其他部分的效力。</p><h4 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; font-family: 微软雅黑; font-weight: 500; line-height: 1.1; color: rgb(0, 135, 210); white-space: normal; background-color: rgb(255, 255, 255);\">15、 生效条件</h4><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; font-family: 微软雅黑; font-size: 14px; color: rgb(68, 68, 68); text-indent: 2%; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">除非另行通知，本协议自2016年04月01日起生效。</p><p><br/></p>', '', '1', '1498713953', '', null, '0', '1500090600', null, null, null);
INSERT INTO `yzw_article` VALUES ('1300', '103', 'sdfsdfsdf', '', '', '', '1', '1498783623', '', null, '0', '1499409768', '2017-07-07/595eede0443fc.gif', '', '1111.mp4');
INSERT INTO `yzw_article` VALUES ('1306', '108', '', '', '', '', '1', '1499137681', '', null, '0', '1500343435', '2017-07-18/596d6c8b3d7a3.png', null, null);
INSERT INTO `yzw_article` VALUES ('1322', '107', '永明项目管理有限公司', '', '<p>1</p>', '', '1', '1499409320', '', '永明项目管理有限公司成立于2002年5月27日，多年来坚持不懈地专注于建筑工程项目管理的研究和开发，现已发展成为具有房屋建筑工程监理甲级、市政公用工程监理甲级、工程招标代理机构甲级、工程造价咨询企业甲级等十多项综合资质的建筑服务企业。\r\n\r\n\r\n现为中国建设监理协会、中国建设工程造价管理协会会员、陕西建设网永久高级会员、陕西省建设监理协会常务理事、陕西省招标投标协会常务理事、陕西省建设工程造价管理协会理事单位、西安市建设监理协会副秘书长单位等。', '0', '1500080634', '2017-07-15/596969fa11110.png', null, null);
INSERT INTO `yzw_article` VALUES ('1319', '110', '', '', '', '', '1', '1499408800', '', null, '0', '1500014158', '2017-07-14/5968664ee76fd.png', null, null);
INSERT INTO `yzw_article` VALUES ('1320', '103', '21', '', '', '', '1', '1499409151', '', null, '0', '0', '2017-07-07/595f2aff1e9fc.png', '', '1`');
INSERT INTO `yzw_article` VALUES ('1321', '113', '', '', '', '', '1', '1499409217', '', null, '0', '1500009522', '2017-07-14/596854326fc2d.png', null, null);
INSERT INTO `yzw_article` VALUES ('1305', '107', '撒的发斯蒂芬斯蒂芬', '', '<p>153135</p><p>131</p><p>35</p><p>13</p><p>131</p><p>535131</p>', '', '1', '1499133743', '', '永明项目管理有限公司成立于2002年5月27日，多年来坚持不懈地专注于建筑工程项目管理的研究和开发，现已发展成为具有房屋建筑工程监理甲级、市政公用工程监理甲级、工程招标代理机构甲级、工程造价咨询企业甲级等十多项综合资质的建筑服务企业。 现为中国建设监理协会、中国建设工程造价管理协会会员、陕西建设网永久高级会员、陕西省建设监理协会常务理事、陕西省招标投标协会常务理事、陕西省建设工程造价管理协会理事单位、西安市建设监理协会副秘书长单位等。', '0', '1500081198', '2017-07-15/59696b9ae2803.png', null, null);
INSERT INTO `yzw_article` VALUES ('1310', '111', '', '', '', '', '1', '1499147013', '', null, '0', '1500014071', '2017-07-14/596865f745917.jpeg', null, null);
INSERT INTO `yzw_article` VALUES ('1323', '201', '666', '', '<p>阿斯顿发送到发送到法师打发</p><p>阿斯顿发生大幅度</p><p>阿萨德法师打发</p>', '', '1', '0', '', null, '0', '1499653723', null, null, null);
INSERT INTO `yzw_article` VALUES ('1328', '108', '', '', '', '', '1', '1500006562', '', null, '0', '0', '2017-07-14/596848a2c1f7a.png', null, null);
INSERT INTO `yzw_article` VALUES ('1329', '108', '', '', '', '', '1', '1500006586', '', null, '0', '0', '2017-07-14/596848ba4c603.png', null, null);
INSERT INTO `yzw_article` VALUES ('1330', '108', '', '', '', '', '1', '1500008614', '', null, '0', '0', '2017-07-14/596850a6c9233.png', null, null);
INSERT INTO `yzw_article` VALUES ('1331', '114', '', '', '', '', '1', '1500009225', '', null, '0', '0', '2017-07-14/59685309984b3.png', null, null);
INSERT INTO `yzw_article` VALUES ('1334', '112', '', '', '', '', '1', '1500014171', '', null, '0', '0', '2017-07-14/5968665bd7fe1.jpeg', null, null);
INSERT INTO `yzw_article` VALUES ('1333', '109', '', '', '', '', '1', '1500013817', '', null, '0', '1500013887', '2017-07-14/5968653f15577.png', null, null);
INSERT INTO `yzw_article` VALUES ('1335', '115', '', '', '', '', '1', '1500084700', '', null, '0', '0', '2017-07-15/596979dc2a1b8.jpg', null, null);
INSERT INTO `yzw_article` VALUES ('1337', '0', '', '', '', '', '1', '1500441900', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1338', '0', '', '', '', '', '1', '1500441905', '', null, '0', '0', null, null, null);
INSERT INTO `yzw_article` VALUES ('1339', '201', '123', '', '<p>123111</p>', '', '1', '1500441912', '', null, '0', '1500441919', null, null, null);
INSERT INTO `yzw_article` VALUES ('1340', '116', '首页最新消息', '', '最新成交消息：总成交量110个项目    总成交额5213624.55元', '', '1', '0', '', '最新成交消息：总成交量7个项目              \r\n     总成交额281818元', '0', '1500444516', null, null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

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
INSERT INTO `yzw_article_cat` VALUES ('116', '首页最新消息', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('201', '77766', null, '50', null, null);
INSERT INTO `yzw_article_cat` VALUES ('202', '666', null, '50', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

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
INSERT INTO `yzw_img` VALUES ('48', '596c7c3e15db2.png', '/Uploads/Admin/2017-07-17/596c7c3e15db2.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('49', '596c7c3e17523.png', '/Uploads/Admin/2017-07-17/596c7c3e17523.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('50', '596c7c3e1907b.png', '/Uploads/Admin/2017-07-17/596c7c3e1907b.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('51', '596c7c5e6e9cf.png', '/Uploads/Admin/2017-07-17/596c7c5e6e9cf.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('52', '596c7c5e70528.png', '/Uploads/Admin/2017-07-17/596c7c5e70528.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('53', '596c7c5e71c98.png', '/Uploads/Admin/2017-07-17/596c7c5e71c98.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('54', '596c7f3476804.png', '/Uploads/Admin/2017-07-17/596c7f3476804.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('55', '596c7f3477f75.png', '/Uploads/Admin/2017-07-17/596c7f3477f75.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('56', '596c7f3479acd.png', '/Uploads/Admin/2017-07-17/596c7f3479acd.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('57', '596c7f347b23d.png', '/Uploads/Admin/2017-07-17/596c7f347b23d.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('58', '596c7f347cd96.png', '/Uploads/Admin/2017-07-17/596c7f347cd96.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('59', '596c7f347e506.png', '/Uploads/Admin/2017-07-17/596c7f347e506.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('60', '596c7f348005f.png', '/Uploads/Admin/2017-07-17/596c7f348005f.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('61', '596d5e7131e56.png', '/Uploads/Admin/2017-07-18/596d5e7131e56.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('62', '596d5e71335c6.png', '/Uploads/Admin/2017-07-18/596d5e71335c6.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('63', '596d5e7134d37.png', '/Uploads/Admin/2017-07-18/596d5e7134d37.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('64', '596d5e71360bf.png', '/Uploads/Admin/2017-07-18/596d5e71360bf.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('65', '596d5e713782f.png', '/Uploads/Admin/2017-07-18/596d5e713782f.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('66', '596d5e7138bb7.png', '/Uploads/Admin/2017-07-18/596d5e7138bb7.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('67', '596d5e713a710.png', '/Uploads/Admin/2017-07-18/596d5e713a710.png', '广告', null);
INSERT INTO `yzw_img` VALUES ('68', '596d5ed65640f.png', '/Uploads/Admin/2017-07-18/596d5ed65640f.png', '广告', null);

-- ----------------------------
-- Table structure for `yzw_information`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_information`;
CREATE TABLE `yzw_information` (
  `information_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '信息表id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `project_id` int(11) DEFAULT NULL COMMENT '项目id',
  `information_type` int(3) DEFAULT NULL COMMENT '信息类型 0站内信息 1变更信息 2 佣金发放信息 3首页最新消息 4钱包变动消息',
  `information_content` varchar(800) DEFAULT NULL COMMENT '信息内容',
  `add_time` int(11) DEFAULT NULL COMMENT '发布信息时间',
  PRIMARY KEY (`information_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_information
-- ----------------------------
INSERT INTO `yzw_information` VALUES ('1', null, null, '0', 'app上线了，快来看看呀!!!!!!', null);
INSERT INTO `yzw_information` VALUES ('2', null, null, '0', 'app上线了，快来看看呀!!!!!!', '1499319040');
INSERT INTO `yzw_information` VALUES ('7', '2', '3', '1', '变更信息', '1499319295');
INSERT INTO `yzw_information` VALUES ('8', '2', '4', '2', '佣金发放', '1499319295');
INSERT INTO `yzw_information` VALUES ('9', '1', '4', '1', '您的客服以变异', '1499319295');
INSERT INTO `yzw_information` VALUES ('10', '1', '3', '2', '两亿吨金条以邮到您家里', '1499319295');
INSERT INTO `yzw_information` VALUES ('12', '2', '5', '1', '您的商城项目项目已被指派客服，如有问题可咨询客服解决！', '1499392060');
INSERT INTO `yzw_information` VALUES ('13', '2', '5', '1', '您的商城项目项目客服已变更，请留意。有问题可咨询客服解决！', '1499392081');
INSERT INTO `yzw_information` VALUES ('14', '2', '4', '1', '您的项目名称2项目已被指派客服，如有问题可咨询客服解决！', '1499392494');
INSERT INTO `yzw_information` VALUES ('15', '1', '3', '1', '您的项目名称项目已被指派客服，如有问题可咨询客服解决！', '1499396717');
INSERT INTO `yzw_information` VALUES ('16', '2', '4', '1', '您的项目名称2项目客服已变更，请留意。有问题可咨询客服解决！', '1499396722');
INSERT INTO `yzw_information` VALUES ('18', '1', '3', '1', '您的项目名称项目客服已变更，请留意。有问题可咨询客服解决！', '1499409944');
INSERT INTO `yzw_information` VALUES ('19', '2', '5', '1', '您的商城项目项目已被指派客服，如有问题可咨询客服解决！', '1499409965');
INSERT INTO `yzw_information` VALUES ('20', '2', '4', '2', '您的项目名称2项目佣金已发送，请注意查收!', '1499410759');
INSERT INTO `yzw_information` VALUES ('21', '2', '4', '1', '您的项目名称2项目已被指派客服，如有问题可咨询客服解决！', '1499416041');
INSERT INTO `yzw_information` VALUES ('22', '2', '5', '1', '您的商城项目项目已被指派客服，如有问题可咨询客服解决！', '1499416073');
INSERT INTO `yzw_information` VALUES ('23', null, null, '3', '总总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元总成交量七个项目  总成交额24588元', '1499459892');
INSERT INTO `yzw_information` VALUES ('24', '1', '3', '2', '您的项目名称项目佣金已发送，请注意查收!', '1499738467');
INSERT INTO `yzw_information` VALUES ('25', '2', '5', '2', '您的商城项目项目佣金已发送，请注意查收!', '1499738565');
INSERT INTO `yzw_information` VALUES ('26', '3735', '17', '1', '您的123项目已被指派客服，如有问题可咨询客服解决！', '1500365756');
INSERT INTO `yzw_information` VALUES ('27', '3735', '17', '1', '您的123项目客服已变更，请留意。有问题可咨询客服解决！', '1500366088');
INSERT INTO `yzw_information` VALUES ('28', '3736', '19', '1', '您的1243项目已被指派客服，如有问题可咨询客服解决！', '1500429726');
INSERT INTO `yzw_information` VALUES ('29', '3722', '12', '1', '您的测试分类4项目已被指派客服，如有问题可咨询客服解决！', '1500429729');
INSERT INTO `yzw_information` VALUES ('30', '3722', '12', '1', '您的测试分类4项目客服已变更，请留意。有问题可咨询客服解决！', '1500429746');
INSERT INTO `yzw_information` VALUES ('31', '3722', '12', '1', '您的测试分类4项目客服已变更，请留意。有问题可咨询客服解决！', '1500429759');
INSERT INTO `yzw_information` VALUES ('32', '3736', '19', '1', '您的1243项目客服已变更，请留意。有问题可咨询客服解决！', '1500429779');
INSERT INTO `yzw_information` VALUES ('33', '3736', '19', '1', '您的1243项目客服已变更，请留意。有问题可咨询客服解决！', '1500429789');
INSERT INTO `yzw_information` VALUES ('34', '3736', '19', '1', '您的1243项目客服已变更，请留意。有问题可咨询客服解决！', '1500429809');
INSERT INTO `yzw_information` VALUES ('35', '3736', '20', '1', '您的商城项目已被指派客服，如有问题可咨询客服解决！', '1500431898');
INSERT INTO `yzw_information` VALUES ('36', '3736', '20', '1', '您的商城项目客服已变更，请留意。有问题可咨询客服解决！', '1500431903');
INSERT INTO `yzw_information` VALUES ('37', null, null, '0', '123123123', '1500432219');
INSERT INTO `yzw_information` VALUES ('38', '3736', '21', '1', '您的物流项目项目已被指派客服，如有问题可咨询客服解决！', '1500432804');
INSERT INTO `yzw_information` VALUES ('39', '3736', '21', '1', '您的物流项目项目客服已变更，请留意。有问题可咨询客服解决！', '1500432809');
INSERT INTO `yzw_information` VALUES ('40', '3736', '21', '2', '您的项目佣金已发放，请注意查收', '1500432835');
INSERT INTO `yzw_information` VALUES ('41', '3736', '21', '2', '您的物流项目项目佣金已发放，请注意查收', '1500432914');
INSERT INTO `yzw_information` VALUES ('42', '3736', '21', '1', '您的\"物流项目\"项目客服已变更，请留意。有问题可咨询客服解决！', '1500432980');
INSERT INTO `yzw_information` VALUES ('43', '3736', '22', '1', '您的\"市场平台\"项目已被指派客服，如有问题可咨询客服解决！', '1500445024');
INSERT INTO `yzw_information` VALUES ('44', '3737', '22', '1', '您的\"市场平台\"项目客服已变更，请留意。有问题可咨询客服解决！', '1500447576');
INSERT INTO `yzw_information` VALUES ('45', '3737', '22', '2', '您的\"市场平台\"项目佣金已发放，请注意查收', '1500448590');
INSERT INTO `yzw_information` VALUES ('46', '3737', '22', '2', '您的\"市场平台\"项目佣金已发放，请注意查收', '1500448799');
INSERT INTO `yzw_information` VALUES ('47', '3737', '22', '2', '您的\"市场平台\"项目佣金已发放，请注意查收', '1500448864');
INSERT INTO `yzw_information` VALUES ('48', '3739', '21', '2', '您的\"物流项目\"项目佣金已发放，请注意查收', '1500511518');
INSERT INTO `yzw_information` VALUES ('49', '3739', '22', '2', '您的\"市场平台\"项目佣金已发放，请注意查收', '1500511521');
INSERT INTO `yzw_information` VALUES ('50', '3739', '24', '1', '您的\"1234123\"项目已被指派客服，如有问题可咨询客服解决！', '1500511643');
INSERT INTO `yzw_information` VALUES ('51', '3739', '23', '1', '您的\"216131\"项目已被指派客服，如有问题可咨询客服解决！', '1500511768');
INSERT INTO `yzw_information` VALUES ('52', '3739', '24', '1', '您的\"1234123\"项目客服已变更，请留意。有问题可咨询客服解决！', '1500511777');
INSERT INTO `yzw_information` VALUES ('53', '3722', '12', '2', '您的\"测试分类4\"项目佣金已发放，请注意查收', '1500511831');
INSERT INTO `yzw_information` VALUES ('54', '3739', '24', '2', '您的\"1234123\"项目佣金已发放，请注意查收', '1500512229');
INSERT INTO `yzw_information` VALUES ('55', '3739', '23', '2', '您的\"216131\"项目佣金已发放，请注意查收', '1500512258');
INSERT INTO `yzw_information` VALUES ('56', '3739', '25', '1', '您的\"`12\"项目已被指派客服，如有问题可咨询客服解决！', '1500513143');
INSERT INTO `yzw_information` VALUES ('57', '3739', '25', '2', '您的\"`12\"项目佣金已发放，请注意查收', '1500513164');
INSERT INTO `yzw_information` VALUES ('58', '3739', '26', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500513359');
INSERT INTO `yzw_information` VALUES ('59', '3739', '26', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500513406');
INSERT INTO `yzw_information` VALUES ('60', '3739', '26', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500513463');
INSERT INTO `yzw_information` VALUES ('61', '3739', '26', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500513512');
INSERT INTO `yzw_information` VALUES ('62', '3740', '27', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500513768');
INSERT INTO `yzw_information` VALUES ('63', '3740', '28', '2', '您的\"123123\"项目佣金已发放，请注意查收', '1500513826');
INSERT INTO `yzw_information` VALUES ('64', '3740', '29', '2', '您的\"123\"项目佣金已发放，请注意查收', '1500514182');
INSERT INTO `yzw_information` VALUES ('65', '3740', '29', '1', '您的\"123\"项目已被指派客服，如有问题可咨询客服解决！', '1500514409');
INSERT INTO `yzw_information` VALUES ('66', '3740', '29', '1', '您的\"123\"项目客服已变更，请留意。有问题可咨询客服解决！', '1500514417');

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
  `prant_two` int(11) DEFAULT NULL COMMENT '二级分销id',
  `prant_one` int(10) DEFAULT NULL COMMENT '一级分销id',
  `project_name` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `project_desc` varchar(2000) DEFAULT NULL COMMENT '项目描述',
  `project_contents` varchar(2000) DEFAULT NULL COMMENT '项目详细信息',
  `project_state` int(10) NOT NULL DEFAULT '1' COMMENT '项目状态id',
  `project_stime` varchar(500) DEFAULT NULL COMMENT '项目状态进度时间(用逗号按顺序分隔)',
  `project_snum` int(10) NOT NULL DEFAULT '0' COMMENT '当前处于哪步状态',
  `project_price` decimal(10,2) DEFAULT NULL COMMENT '项目保证金',
  `project_estimate` decimal(10,2) DEFAULT NULL COMMENT '预计投资金额',
  `project_actual` decimal(10,2) DEFAULT NULL COMMENT '实际投资基金',
  `img_id` int(11) DEFAULT NULL COMMENT '图片表id',
  `project_examine` int(1) NOT NULL DEFAULT '0' COMMENT '0未审核 1审核未通过 2审核已通过',
  `project_time` int(11) DEFAULT NULL COMMENT '项目发布时间',
  `project_address` varchar(150) DEFAULT NULL COMMENT '项目所在地',
  `project_service` int(10) NOT NULL DEFAULT '0' COMMENT '定制客服id(当后台设置中开启项目指定时，当前项目只有当前指定的客服可看)',
  `distribute` int(2) DEFAULT NULL COMMENT '是否派发佣金 0为派发   1已派发',
  `project_yj` varchar(100) DEFAULT NULL COMMENT '项目设定的佣金百分比',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project
-- ----------------------------
INSERT INTO `yzw_project` VALUES ('3', '1', '3722', '2', '3627', '项目名称', '项目介绍', '详细介绍', '1', '1500341167', '1', '80.00', '5000.55', '3600.00', null, '0', '1478331996', '银河系地球', '47', '0', null);
INSERT INTO `yzw_project` VALUES ('4', '2', '3722', '3627', null, '项目名称2', '项目介绍2', '详细介绍2', '1', '1500341172', '1', '500.00', '250.00', '120.00', null, '0', '1478331996', '火星', '29', '1', null);
INSERT INTO `yzw_project` VALUES ('5', '1', '3722', '3627', null, '商城项目', '做一个商城', '详细的商城介绍', '1', '1500341192|1500341194', '2', '2000.00', '50000.00', '2000.00', null, '0', '1478331996', '哈尔滨', '46', '1', null);
INSERT INTO `yzw_project` VALUES ('6', '1', '3722', '2', '3627', '项目', '项目', '项目', '1', '1500341277|1500341280|1500341282', '3', null, '50000.00', null, null, '0', '1478331996', null, '0', null, null);
INSERT INTO `yzw_project` VALUES ('7', '1', '3722', '2', '3627', '项目', '项目', '项目', '1', null, '0', null, '50000.00', null, null, '0', '1478331996', null, '0', null, null);
INSERT INTO `yzw_project` VALUES ('8', '1', '3722', '3627', '3627', '项目', '项目', '项目', '1', '1500341315|1500341316|1500341319|1500341321', '4', null, '50000.00', null, null, '0', '1478331996', null, '0', null, null);
INSERT INTO `yzw_project` VALUES ('9', '1', '3722', null, null, '项目', '项目', '项目', '1', '1500341332|1500341334|1500341336|1500341338|1500341340', '5', null, '50000.00', '6666.00', null, '0', '1478331996', null, '0', '1', null);
INSERT INTO `yzw_project` VALUES ('10', '1', '3722', '3627', '3627', '项目', '项目', '项目', '1', null, '0', null, '50000.00', null, null, '0', '1478331996', null, '0', null, null);
INSERT INTO `yzw_project` VALUES ('11', '1', '3722', null, null, '项目测试1', null, '一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。一般是受招标人的委托或授权办理招标事宜的行为。', '1', null, '0', null, '1000000.23', null, null, '0', '1500278357', '哈尔滨那个的屯', '0', null, null);
INSERT INTO `yzw_project` VALUES ('12', '18', '3722', null, null, '测试分类4', null, '测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4测试分类4', '1', '1500341354|1500341356|1500341358|1500341360|1500341361|1500341363', '6', null, '0.00', null, null, '0', '1500278505', '大连测试分类4', '1', '1', null);
INSERT INTO `yzw_project` VALUES ('17', '18', '3735', null, null, '123', null, '123', '1', '1500365747', '1', null, '123.00', null, null, '0', '1500364243', '哈尔滨123', '31', null, null);
INSERT INTO `yzw_project` VALUES ('18', '1', '3735', null, null, '123', null, '123', '1', '1500366231|1500366233|1500366240|1500366245|1500366247|1500366249', '6', null, '123.00', null, null, '0', '1500366106', '哈尔滨123', '0', '1', null);
INSERT INTO `yzw_project` VALUES ('19', '2', '3736', null, null, '1243', null, '1234124', '1', '1500429825|1500429826|1500429828|1500429830|1500429832|1500429833', '6', null, '124312.00', null, null, '0', '1500429713', '大连124', '1', '1', null);
INSERT INTO `yzw_project` VALUES ('20', '1', '3736', null, null, '商城', null, '做一个最牛掰的的商城网站', '1', '1500431912|1500431914|1500431915|1500431917|1500431919|1500431920', '6', '50000.00', '500000.00', '450000.00', null, '0', '1500431875', '哈尔滨那个的屯', '1', '1', null);
INSERT INTO `yzw_project` VALUES ('21', '2', '3739', '3725', '3739', '物流项目', null, '史上最牛掰的物流就是我', '1', '1500432896|1500432898|1500432900|1500432901|1500432903|1500432905', '6', null, '1000000.00', null, null, '0', '1500432786', '哈尔滨那啥乡', '46', '1', null);
INSERT INTO `yzw_project` VALUES ('22', '2', '3739', '3725', '3739', '市场平台', null, '全球最大银河系最强的市场平台', '1', '1500445587|1500445589|1500447586|1500447588|1500447590|1500447592', '6', '500.00', '99999999.99', '10000.00', null, '0', '1500445013', '哈尔滨地球村', '1', '1', null);
INSERT INTO `yzw_project` VALUES ('23', '18', '3739', '3725', '3739', '216131', null, 'scvzc', '1', '1500511794|1500511797|1500511800|1500512247|1500512248|1500512250', '6', null, '30000.00', null, null, '0', '1500511615', '哈哈哈123tsv', '31', '1', null);
INSERT INTO `yzw_project` VALUES ('24', '1', '3739', '3725', '3739', '1234123', null, '1231234123', '1', '1500511807|1500511809|1500511811|1500511813|1500511815|1500511817', '6', '1000.00', '300000.00', '100000.00', null, '0', '1500511634', '大连123123', '47', '1', null);
INSERT INTO `yzw_project` VALUES ('25', '1', '3739', '3725', '3739', '`12', null, '1`23', '1', '1500513147|1500513149|1500513151|1500513153|1500513155|1500513157', '6', null, '30000.00', null, null, '0', '1500513136', '哈尔滨`12', '47', '1', null);
INSERT INTO `yzw_project` VALUES ('26', '1', '3739', '3725', '3739', '123', null, '234324', '1', '1500513327|1500513329|1500513347|1500513349|1500513350|1500513352', '6', '5000.00', '30000.00', '30000.00', null, '0', '1500513319', '哈尔滨123', '0', '1', null);
INSERT INTO `yzw_project` VALUES ('27', '1', '3740', '3723', null, '123', null, '45252', '1', '1500513739|1500513746|1500513749|1500513750|1500513752|1500513754', '6', '5000.00', '123.00', '30000.00', null, '0', '1500513720', '大连30000', '0', '1', null);
INSERT INTO `yzw_project` VALUES ('28', '1', '3740', '3723', null, '123123', null, '45454', '1', '1500513788|1500513790|1500513791|1500513792|1500513794|1500513794', '6', '50000.00', '300000.00', '300000.00', null, '0', '1500513782', '哈尔滨45', '0', '1', null);
INSERT INTO `yzw_project` VALUES ('29', '1', '3740', '3723', null, '123', null, '123123', '1', '1500514143|1500514145|1500514147|1500514149|1500514151|1500514153', '6', '30000.00', '600000.00', '600000.00', null, '0', '1500514094', '哈尔滨3213', '29', '1', null);

-- ----------------------------
-- Table structure for `yzw_project_address`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_project_address`;
CREATE TABLE `yzw_project_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '项目所在地',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_address
-- ----------------------------
INSERT INTO `yzw_project_address` VALUES ('1', '哈尔滨');
INSERT INTO `yzw_project_address` VALUES ('2', '大连');
INSERT INTO `yzw_project_address` VALUES ('5', '哈哈哈');

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
  `img_id` varchar(100) DEFAULT NULL COMMENT '图片表id(以''|''区分)',
  `add_time` int(10) DEFAULT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_state
-- ----------------------------
INSERT INTO `yzw_project_state` VALUES ('1', '发布项目|项目审核|选择服务商,签合同|服务商工作|验收|佣金下发', '61|62|63|64|65|66|67', '1483668553', '1500339857');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_project_type
-- ----------------------------
INSERT INTO `yzw_project_type` VALUES ('1', '招标代理', '一般是受招标人的委托或授权办理招标事宜的行为。', '1');
INSERT INTO `yzw_project_type` VALUES ('2', '造价咨询', '是指面向社会接受委托、承担建设项目的全过程、动态的造价管理。', '1');
INSERT INTO `yzw_project_type` VALUES ('7', '其他', '其他更多的项目信息', '1');
INSERT INTO `yzw_project_type` VALUES ('18', '测试分类4', '测试分类4', '1');

-- ----------------------------
-- Table structure for `yzw_qrcode`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_qrcode`;
CREATE TABLE `yzw_qrcode` (
  `qrcode_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qrcode_path` varchar(150) DEFAULT NULL COMMENT '二维码路径',
  PRIMARY KEY (`qrcode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=715 DEFAULT CHARSET=utf8;

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
INSERT INTO `yzw_qrcode` VALUES ('611', '/Public/Admin/images/qrcode3634.png');
INSERT INTO `yzw_qrcode` VALUES ('612', '/Public/Admin/images/qrcode3635.png');
INSERT INTO `yzw_qrcode` VALUES ('613', '/Public/Admin/images/qrcode3636.png');
INSERT INTO `yzw_qrcode` VALUES ('614', '/Public/Admin/images/qrcode3637.png');
INSERT INTO `yzw_qrcode` VALUES ('615', '/Public/Admin/images/qrcode3638.png');
INSERT INTO `yzw_qrcode` VALUES ('616', '/Public/Admin/images/qrcode3639.png');
INSERT INTO `yzw_qrcode` VALUES ('617', '/Public/Admin/images/qrcode3640.png');
INSERT INTO `yzw_qrcode` VALUES ('618', '/Public/Admin/images/qrcode3641.png');
INSERT INTO `yzw_qrcode` VALUES ('619', '/Public/Admin/images/qrcode3642.png');
INSERT INTO `yzw_qrcode` VALUES ('620', '/Public/Admin/images/qrcode3643.png');
INSERT INTO `yzw_qrcode` VALUES ('621', '/Public/Admin/images/qrcode3644.png');
INSERT INTO `yzw_qrcode` VALUES ('622', '/Public/Admin/images/qrcode3645.png');
INSERT INTO `yzw_qrcode` VALUES ('623', '/Public/Admin/images/qrcode3646.png');
INSERT INTO `yzw_qrcode` VALUES ('624', '/Public/Admin/images/qrcode3647.png');
INSERT INTO `yzw_qrcode` VALUES ('625', '/Public/Admin/images/qrcode3648.png');
INSERT INTO `yzw_qrcode` VALUES ('626', '/Public/Admin/images/qrcode3649.png');
INSERT INTO `yzw_qrcode` VALUES ('627', '/Public/Admin/images/qrcode3650.png');
INSERT INTO `yzw_qrcode` VALUES ('628', '/Public/Admin/images/qrcode3651.png');
INSERT INTO `yzw_qrcode` VALUES ('629', '/Public/Admin/images/qrcode3652.png');
INSERT INTO `yzw_qrcode` VALUES ('630', '/Public/Admin/images/qrcode3653.png');
INSERT INTO `yzw_qrcode` VALUES ('631', '/Public/Admin/images/qrcode3654.png');
INSERT INTO `yzw_qrcode` VALUES ('632', '/Public/Admin/images/qrcode3655.png');
INSERT INTO `yzw_qrcode` VALUES ('633', '/Public/Admin/images/qrcode3656.png');
INSERT INTO `yzw_qrcode` VALUES ('634', '/Public/Admin/images/qrcode3657.png');
INSERT INTO `yzw_qrcode` VALUES ('635', '/Public/Admin/images/qrcode3658.png');
INSERT INTO `yzw_qrcode` VALUES ('636', '/Public/Admin/images/qrcode3659.png');
INSERT INTO `yzw_qrcode` VALUES ('637', '/Public/Admin/images/qrcode3660.png');
INSERT INTO `yzw_qrcode` VALUES ('638', '/Public/Admin/images/qrcode3661.png');
INSERT INTO `yzw_qrcode` VALUES ('639', '/Public/Admin/images/qrcode3662.png');
INSERT INTO `yzw_qrcode` VALUES ('640', '/Public/Admin/images/qrcode3663.png');
INSERT INTO `yzw_qrcode` VALUES ('641', '/Public/Admin/images/qrcode3664.png');
INSERT INTO `yzw_qrcode` VALUES ('642', '/Public/Admin/images/qrcode3665.png');
INSERT INTO `yzw_qrcode` VALUES ('643', '/Public/Admin/images/qrcode3666.png');
INSERT INTO `yzw_qrcode` VALUES ('644', '/Public/Admin/images/qrcode3667.png');
INSERT INTO `yzw_qrcode` VALUES ('645', '/Public/Admin/images/qrcode3668.png');
INSERT INTO `yzw_qrcode` VALUES ('646', '/Public/Admin/images/qrcode3669.png');
INSERT INTO `yzw_qrcode` VALUES ('647', '/Public/Admin/images/qrcode3670.png');
INSERT INTO `yzw_qrcode` VALUES ('648', '/Public/Admin/images/qrcode3671.png');
INSERT INTO `yzw_qrcode` VALUES ('649', '/Public/Admin/images/qrcode3672.png');
INSERT INTO `yzw_qrcode` VALUES ('650', '/Public/Admin/images/qrcode3673.png');
INSERT INTO `yzw_qrcode` VALUES ('651', '/Public/Admin/images/qrcode3674.png');
INSERT INTO `yzw_qrcode` VALUES ('652', '/Public/Admin/images/qrcode3675.png');
INSERT INTO `yzw_qrcode` VALUES ('653', '/Public/Admin/images/qrcode3676.png');
INSERT INTO `yzw_qrcode` VALUES ('654', '/Public/Admin/images/qrcode3677.png');
INSERT INTO `yzw_qrcode` VALUES ('655', '/Public/Admin/images/qrcode3678.png');
INSERT INTO `yzw_qrcode` VALUES ('656', '/Public/Admin/images/qrcode3679.png');
INSERT INTO `yzw_qrcode` VALUES ('657', '/Public/Admin/images/qrcode3680.png');
INSERT INTO `yzw_qrcode` VALUES ('658', '/Public/Admin/images/qrcode3681.png');
INSERT INTO `yzw_qrcode` VALUES ('659', '/Public/Admin/images/qrcode3682.png');
INSERT INTO `yzw_qrcode` VALUES ('660', '/Public/Admin/images/qrcode3683.png');
INSERT INTO `yzw_qrcode` VALUES ('661', '/Public/Admin/images/qrcode3684.png');
INSERT INTO `yzw_qrcode` VALUES ('662', '/Public/Admin/images/qrcode3685.png');
INSERT INTO `yzw_qrcode` VALUES ('663', '/Public/Admin/images/qrcode3686.png');
INSERT INTO `yzw_qrcode` VALUES ('664', '/Public/Admin/images/qrcode3687.png');
INSERT INTO `yzw_qrcode` VALUES ('665', '/Public/Admin/images/qrcode3688.png');
INSERT INTO `yzw_qrcode` VALUES ('666', '/Public/Admin/images/qrcode3689.png');
INSERT INTO `yzw_qrcode` VALUES ('667', '/Public/Admin/images/qrcode3690.png');
INSERT INTO `yzw_qrcode` VALUES ('668', '/Public/Admin/images/qrcode3691.png');
INSERT INTO `yzw_qrcode` VALUES ('669', '/Public/Admin/images/qrcode3692.png');
INSERT INTO `yzw_qrcode` VALUES ('670', '/Public/Admin/images/qrcode3693.png');
INSERT INTO `yzw_qrcode` VALUES ('671', '/Public/Admin/images/qrcode3696.png');
INSERT INTO `yzw_qrcode` VALUES ('672', '/Public/Admin/images/qrcode3697.png');
INSERT INTO `yzw_qrcode` VALUES ('673', '/Public/Admin/images/qrcode3698.png');
INSERT INTO `yzw_qrcode` VALUES ('674', '/Public/Admin/images/qrcode3699.png');
INSERT INTO `yzw_qrcode` VALUES ('675', '/Public/Admin/images/qrcode3700.png');
INSERT INTO `yzw_qrcode` VALUES ('676', '/Public/Admin/images/qrcode3701.png');
INSERT INTO `yzw_qrcode` VALUES ('677', '/Public/Admin/images/qrcode3702.png');
INSERT INTO `yzw_qrcode` VALUES ('678', '/Public/Admin/images/qrcode3703.png');
INSERT INTO `yzw_qrcode` VALUES ('679', '/Public/Admin/images/qrcode3704.png');
INSERT INTO `yzw_qrcode` VALUES ('680', '/Public/Admin/images/qrcode3706.png');
INSERT INTO `yzw_qrcode` VALUES ('681', '/Public/Admin/images/qrcode3707.png');
INSERT INTO `yzw_qrcode` VALUES ('682', '/Public/Admin/images/qrcode3708.png');
INSERT INTO `yzw_qrcode` VALUES ('683', '/Public/Admin/images/qrcode3709.png');
INSERT INTO `yzw_qrcode` VALUES ('684', '/Public/Admin/images/qrcode3710.png');
INSERT INTO `yzw_qrcode` VALUES ('685', '/Public/Admin/images/qrcode3711.png');
INSERT INTO `yzw_qrcode` VALUES ('686', '/Public/Admin/images/qrcode3712.png');
INSERT INTO `yzw_qrcode` VALUES ('687', '/Public/Admin/images/qrcode3713.png');
INSERT INTO `yzw_qrcode` VALUES ('688', '/Public/Admin/images/qrcode3714.png');
INSERT INTO `yzw_qrcode` VALUES ('689', '/Public/Admin/images/qrcode3715.png');
INSERT INTO `yzw_qrcode` VALUES ('690', '/Public/Admin/images/qrcode3716.png');
INSERT INTO `yzw_qrcode` VALUES ('691', '/Public/Admin/images/qrcode3717.png');
INSERT INTO `yzw_qrcode` VALUES ('692', '/Public/Admin/images/qrcode3718.png');
INSERT INTO `yzw_qrcode` VALUES ('693', '/Public/Admin/images/qrcode3719.png');
INSERT INTO `yzw_qrcode` VALUES ('694', '/Public/Admin/images/qrcode3720.png');
INSERT INTO `yzw_qrcode` VALUES ('695', '/Public/Admin/images/qrcode3721.png');
INSERT INTO `yzw_qrcode` VALUES ('696', '/Public/Admin/images/qrcode3722.png');
INSERT INTO `yzw_qrcode` VALUES ('697', '/Public/Admin/images/qrcode3723.png');
INSERT INTO `yzw_qrcode` VALUES ('698', '/Public/Admin/images/qrcode3724.png');
INSERT INTO `yzw_qrcode` VALUES ('699', '/Public/Admin/images/qrcode3725.png');
INSERT INTO `yzw_qrcode` VALUES ('700', '/Public/Admin/images/qrcode3726.png');
INSERT INTO `yzw_qrcode` VALUES ('701', '/Public/Admin/images/qrcode3727.png');
INSERT INTO `yzw_qrcode` VALUES ('702', '/Public/Admin/images/qrcode3728.png');
INSERT INTO `yzw_qrcode` VALUES ('703', '/Public/Admin/images/qrcode3729.png');
INSERT INTO `yzw_qrcode` VALUES ('704', '/Public/Admin/images/qrcode3730.png');
INSERT INTO `yzw_qrcode` VALUES ('705', '/Public/Admin/images/qrcode3731.png');
INSERT INTO `yzw_qrcode` VALUES ('706', '/Public/Admin/images/qrcode3732.png');
INSERT INTO `yzw_qrcode` VALUES ('707', '/Public/Admin/images/qrcode3733.png');
INSERT INTO `yzw_qrcode` VALUES ('708', '/Public/Admin/images/qrcode3734.png');
INSERT INTO `yzw_qrcode` VALUES ('709', '/Public/Admin/images/qrcode3735.png');
INSERT INTO `yzw_qrcode` VALUES ('710', '/Public/Home/qrcode/qrcode1500431796.png');
INSERT INTO `yzw_qrcode` VALUES ('711', '/Public/Home/qrcode/qrcode1500447478.png');
INSERT INTO `yzw_qrcode` VALUES ('712', '/Public/Admin/images/qrcode3738.png');
INSERT INTO `yzw_qrcode` VALUES ('713', '/Public/Home/qrcode/qrcode1500511421.png');
INSERT INTO `yzw_qrcode` VALUES ('714', '/Public/Home/qrcode/qrcode1500513695.png');

-- ----------------------------
-- Table structure for `yzw_user_wallet`
-- ----------------------------
DROP TABLE IF EXISTS `yzw_user_wallet`;
CREATE TABLE `yzw_user_wallet` (
  `wallet_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员钱包',
  `user_id` int(10) DEFAULT NULL COMMENT '会员id',
  `order_id` varchar(100) NOT NULL COMMENT '支付宝返回order_id',
  `reason` varchar(100) DEFAULT NULL COMMENT '变动原因',
  `price_change` decimal(10,2) DEFAULT NULL COMMENT '变动金额',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '会员余额',
  `timer` int(10) NOT NULL COMMENT '変动时间',
  `pay_code` varchar(100) NOT NULL COMMENT '支付方式',
  `status` int(2) DEFAULT '0' COMMENT '金额发放状态   0未发放   1已发放',
  PRIMARY KEY (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_user_wallet
-- ----------------------------
INSERT INTO `yzw_user_wallet` VALUES ('1', '1', '', 'sfsdfsadf', '100.00', '10000.56', '1499481330', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('2', '3610', '', 'asdsad', '200.00', '5796.22', '0', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('16', '3628', '', null, null, '0.00', '0', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('17', '3629', '', null, null, '0.00', '0', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('20', '3632', '', null, null, '0.00', '0', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('21', '3633', '', null, null, '0.00', '0', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('73', '1', '', '提现', '0.10', '10000.66', '1499496182', '支付宝', '0');
INSERT INTO `yzw_user_wallet` VALUES ('74', '1', '20170708110070001502780005142109', '提现', '0.10', '10000.56', '1499496406', '支付宝', '0');
INSERT INTO `yzw_user_wallet` VALUES ('75', '3627', '', '佣金派发', '3240.00', '3240.00', '1499829284', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('76', '2', '', '佣金派发', '2880.00', '8676.22', '1499829284', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('77', '3627', '', '佣金派发', '3240.00', '6480.00', '1499829360', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('78', '2', '', '佣金派发', '2880.00', '11556.22', '1499829360', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('79', '3627', '', '佣金派发', '3240.00', '9720.00', '1499830065', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('80', '2', '', '佣金派发', '2880.00', '14436.22', '1499830065', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('81', '3627', '', '佣金派发', '1600.00', '11320.00', '1499838699', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('82', '3627', '', '佣金派发', '96.00', '11416.00', '1499839657', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('83', '3627', '', '佣金派发', '0.00', '11416.00', '1499993579', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('84', '2', '', '佣金派发', '0.00', '14436.22', '1499993579', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('85', '3627', '', '佣金派发', '720.00', '12136.00', '1499993825', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('86', '2', '', '佣金派发', '1080.00', '15516.22', '1499993825', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('87', '3722', '', '佣金派发', '120.00', '2555.25', '1500099656', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('88', '3722', '', '佣金派发', '0.00', '2555.25', '1500259080', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('89', '3722', '', '佣金派发', '0.00', '2555.25', '1500259128', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('90', '3722', '', '佣金派发', '0.00', '2555.25', '1500259218', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('91', '3722', '', '佣金派发', '0.00', '2555.25', '1500259813', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('92', '3722', '', '佣金派发', '0.00', '2555.25', '1500259836', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('93', '3722', '', '佣金派发', '0.00', '2555.25', '1500259855', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('94', '3722', '', '佣金派发', '1333.20', '3888.45', '1500259892', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('101', '3737', '', '佣金派发', '3000.00', '3000.00', '1500448864', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('102', '3731', '', '佣金派发', '2000.00', '2000.00', '1500448864', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('103', '3732', '', '佣金派发', '1000.00', '1000.00', '1500448864', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('104', '3739', '', '佣金派发', '0.00', '0.00', '1500511518', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('105', '3739', '', '佣金派发', '0.00', '0.00', '1500511518', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('106', '3725', '', '佣金派发', '0.00', '0.00', '1500511518', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('107', '3739', '', '佣金派发', '3000.00', '3000.00', '1500511521', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('108', '3739', '', '佣金派发', '2000.00', '5000.00', '1500511521', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('109', '3725', '', '佣金派发', '1000.00', '1000.00', '1500511521', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('110', '3722', '', '佣金派发', '0.00', '3888.45', '1500511831', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('111', '3739', '', '佣金派发', '30000.00', '33000.00', '1500512229', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('112', '3739', '', '佣金派发', '20000.00', '53000.00', '1500512229', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('113', '3725', '', '佣金派发', '10000.00', '11000.00', '1500512229', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('114', '3739', '', '佣金派发', '0.00', '53000.00', '1500512258', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('115', '3739', '', '佣金派发', '0.00', '53000.00', '1500512258', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('116', '3725', '', '佣金派发', '0.00', '11000.00', '1500512258', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('117', '3739', '', '佣金派发', '0.00', '53000.00', '1500513164', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('118', '3739', '', '佣金派发', '0.00', '53000.00', '1500513164', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('119', '3725', '', '佣金派发', '0.00', '11000.00', '1500513164', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('120', '3739', '', '佣金派发', '0.00', '53000.00', '1500513358', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('121', '3739', '', '佣金派发', '0.00', '53000.00', '1500513359', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('122', '3725', '', '佣金派发', '0.00', '11000.00', '1500513359', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('123', '3739', '', '佣金派发', '0.00', '53000.00', '1500513406', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('124', '3739', '', '佣金派发', '0.00', '53000.00', '1500513406', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('125', '3725', '', '佣金派发', '0.00', '11000.00', '1500513406', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('126', '3739', '', '佣金派发', '0.00', '53000.00', '1500513463', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('127', '3739', '', '佣金派发', '0.00', '53000.00', '1500513463', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('128', '3725', '', '佣金派发', '0.00', '11000.00', '1500513463', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('129', '3739', '', '佣金派发', '9000.00', '62000.00', '1500513512', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('130', '3739', '', '佣金派发', '6000.00', '68000.00', '1500513512', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('131', '3725', '', '佣金派发', '3000.00', '14000.00', '1500513512', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('132', '3740', '', '佣金派发', '9000.00', '9000.00', '1500513768', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('133', '3723', '', '佣金派发', '3000.00', '3000.00', '1500513768', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('134', '3740', '', '佣金派发', '90000.00', '99000.00', '1500513826', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('135', '3723', '', '佣金派发', '30000.00', '33000.00', '1500513826', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('136', '3740', '', '佣金派发', '180000.00', '279000.00', '1500514181', '', '0');
INSERT INTO `yzw_user_wallet` VALUES ('137', '3723', '', '佣金派发', '60000.00', '93000.00', '1500514181', '', '0');

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
  `user_name` varchar(20) NOT NULL DEFAULT '默认名称' COMMENT '用户名',
  `zfb_user` varchar(50) DEFAULT NULL COMMENT '支付宝账号',
  `zfb_user_name` varchar(255) DEFAULT NULL COMMENT '支付宝姓名',
  `wx_user` varchar(50) DEFAULT NULL COMMENT '微信号',
  `qrcode_id` int(10) NOT NULL DEFAULT '0' COMMENT '二维码表id',
  `stateid` int(10) NOT NULL DEFAULT '0' COMMENT '自由经理人为0 公司员工为1',
  `introduce` int(10) NOT NULL DEFAULT '0' COMMENT '项目介绍人id',
  `withdrawals_pwd` varchar(100) DEFAULT NULL COMMENT '钱包密码',
  `head_pic` varchar(150) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3741 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzw_users
-- ----------------------------
INSERT INTO `yzw_users` VALUES ('3723', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'i0tew352uzj9', '0', '0', '0', '0', '0', 'default', null, null, null, '697', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3724', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'vz1sssadm19p', '0', '0', '0', '0', '0', 'default', null, null, null, '698', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3725', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'q6vgqawb0o96', '0', '0', '0', '0', '0', 'default', null, null, null, '699', '1', '3739', null, null);
INSERT INTO `yzw_users` VALUES ('3726', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'eptd4uvods3r', '0', '0', '0', '0', '0', 'default', null, null, null, '700', '1', '3739', null, null);
INSERT INTO `yzw_users` VALUES ('3727', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'vjwcubts0umw', '0', '0', '0', '0', '0', 'default', null, null, null, '701', '1', '3739', null, null);
INSERT INTO `yzw_users` VALUES ('3728', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', '5z6dk1rt98', '0', '0', '0', '0', '0', 'default', null, null, null, '702', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3729', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'p60c7yhfeffi', '0', '0', '0', '0', '0', 'default', null, null, null, '703', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3730', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', '1zmqph7skcbc', '0', '0', '0', '0', '0', 'default', null, null, null, '704', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3731', '', 'f379eaf3c831b04de153469d1bec345e', '1500103229', '0', '0', 'p1sddts1znm6', '0', '0', '0', '0', '0', 'default', null, null, null, '705', '1', '0', null, null);
INSERT INTO `yzw_users` VALUES ('3732', '', '4297f44b13955235245b2497399d7a93', '1500103229', '0', '0', '13111111111', '1', '0', '0', '0', '0', 'ceshi', null, null, null, '706', '1', '3740', null, null);
INSERT INTO `yzw_users` VALUES ('3740', '', '4297f44b13955235245b2497399d7a93', '1500513678', '1500597042', '127.0.0.1', '13845044043', '1', '0', '0', '0', '0', 'sam', '13845044043', '孙航', 'ssdhr12321', '714', '0', '3723', null, '/Uploads/Home/2017-07-20/5970059fbf8e3.jpg');

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
