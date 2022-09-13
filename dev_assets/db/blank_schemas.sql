/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.24 : Database - election2022
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ldap_user_new` */

DROP TABLE IF EXISTS `ldap_user_new`;

CREATE TABLE `ldap_user_new` (
  `idcardno` varchar(255) DEFAULT NULL,
  `hrcode` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `thcn` varchar(255) DEFAULT NULL,
  `thsn` varchar(255) DEFAULT NULL,
  `facultyou` varchar(255) DEFAULT NULL,
  `wlanstatus` varchar(255) DEFAULT NULL,
  `accountStatus` varchar(255) DEFAULT NULL,
  `employeeType` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `dn` varchar(255) DEFAULT NULL,
  KEY `idx_hrcode` (`hrcode`),
  KEY `idx_idcardno` (`idcardno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `sitesettings` */

DROP TABLE IF EXISTS `sitesettings`;

CREATE TABLE `sitesettings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `exec_process` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `pcode` varchar(20) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `card_id` varchar(13) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_level` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_candidate` */

DROP TABLE IF EXISTS `tbl_candidate`;

CREATE TABLE `tbl_candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `fullname2` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_event` */

DROP TABLE IF EXISTS `tbl_event`;

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `detail` text,
  `ccolor` varchar(10) DEFAULT NULL,
  `st_date` datetime DEFAULT NULL,
  `en_date` datetime DEFAULT NULL,
  `selected` tinyint(4) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` varchar(20) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1346 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_logs` */

DROP TABLE IF EXISTS `tbl_logs`;

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(50) DEFAULT NULL,
  `hrcode` varchar(10) DEFAULT NULL,
  `uidnumber` varchar(50) DEFAULT NULL,
  `displayname` varchar(255) DEFAULT NULL,
  `card_id` varchar(20) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1347 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_score01` */

DROP TABLE IF EXISTS `tbl_score01`;

CREATE TABLE `tbl_score01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `score_order1` int(11) DEFAULT NULL,
  `score_order2` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_score02` */

DROP TABLE IF EXISTS `tbl_score02`;

CREATE TABLE `tbl_score02` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `score_order` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_score03` */

DROP TABLE IF EXISTS `tbl_score03`;

CREATE TABLE `tbl_score03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `score_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_order` int(11) DEFAULT NULL,
  `n_order2` int(11) DEFAULT NULL,
  `n_order3` int(11) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `hrcode` varchar(20) DEFAULT NULL,
  `card_id` varchar(20) DEFAULT NULL,
  `pcode` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `vote_group` int(11) DEFAULT NULL,
  `position_level` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `sub_department` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `position_name` varchar(255) DEFAULT NULL,
  `position_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_hrcode` (`hrcode`),
  KEY `idx_cardid` (`card_id`),
  KEY `idx_login` (`uid`,`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1496 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_vote` */

DROP TABLE IF EXISTS `tbl_vote`;

CREATE TABLE `tbl_vote` (
  `user_id` int(11) NOT NULL,
  `pcode` varchar(10) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tbl_vote_detail` */

DROP TABLE IF EXISTS `tbl_vote_detail`;

CREATE TABLE `tbl_vote_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_id` int(11) NOT NULL,
  `a_num` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `c_num` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12357 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `vw_score_02` */

DROP TABLE IF EXISTS `vw_score_02`;

CREATE TABLE `vw_score_02` (
  `id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fullname2` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `score` bigint(21) NOT NULL DEFAULT '0',
  `num_row` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `vw_score_03` */

DROP TABLE IF EXISTS `vw_score_03`;

CREATE TABLE `vw_score_03` (
  `id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) DEFAULT NULL,
  `c_number` int(11) DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fullname2` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `score` bigint(21) NOT NULL DEFAULT '0',
  `num_row` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
