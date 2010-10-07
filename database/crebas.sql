SET FOREIGN_KEY_CHECKS=0;

-- Drop table hna_list_users_statuses
DROP TABLE IF EXISTS `hna_list_users_statuses`;

CREATE TABLE `hna_list_users_statuses` (
  `status` int(11),
  `description` char(250)
)
ENGINE=MYISAM
ROW_FORMAT=default;

-- Drop table hna_list_log_users_actions
DROP TABLE IF EXISTS `hna_list_log_users_actions`;

CREATE TABLE `hna_list_log_users_actions` (
  `action` int(11),
  `description` char(250)
)
ENGINE=MYISAM
ROW_FORMAT=default;

-- Drop table hna_list_log_admins_actions
DROP TABLE IF EXISTS `hna_list_log_admins_actions`;

CREATE TABLE `hna_list_log_admins_actions` (
  `action` int(11),
  `description` char(250)
)
ENGINE=MYISAM
ROW_FORMAT=default;

-- Drop table hna_log_admins
DROP TABLE IF EXISTS `hna_log_admins`;

CREATE TABLE `hna_log_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `login` char(15),
  `time` datetime,
  `ip` char(16),
  `action` int(11) DEFAULT NULL,
  PRIMARY KEY(`id`)
)
ENGINE=MYISAM
ROW_FORMAT=default;

-- Drop table hna_pays
DROP TABLE IF EXISTS `hna_pays`;

CREATE TABLE `hna_pays` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `year` int(11),
  `connect` tinyint(1) NOT NULL DEFAULT '0',
  `9` tinyint(1) NOT NULL DEFAULT '0',
  `10` tinyint(1) NOT NULL DEFAULT '0',
  `11` tinyint(1) NOT NULL DEFAULT '0',
  `12` tinyint(1) NOT NULL DEFAULT '0',
  `1` tinyint(1) NOT NULL DEFAULT '0',
  `2` tinyint(1) NOT NULL DEFAULT '0',
  `3` tinyint(1) NOT NULL DEFAULT '0',
  `4` tinyint(1) NOT NULL DEFAULT '0',
  `5` tinyint(1) NOT NULL DEFAULT '0',
  `6` tinyint(1) NOT NULL DEFAULT '0',
  `7` tinyint(4) NOT NULL DEFAULT '0',
  `8` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY(`pay_id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;

-- Drop table hna_users
DROP TABLE IF EXISTS `hna_users`;

CREATE TABLE `hna_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract` int(11),
  `surname` char(50),
  `firstname` char(50),
  `lastname` char(50),
  `login` char(30),
  `pass` char(32),
  `group` char(12),
  `block` int(4),
  `room` varbinary(50) DEFAULT 'a,b',
  `status` tinyint(1),
  `register` datetime,
  `admin_id` int(11),
  `note` char(250),
  `lastip` char(15),
  `lastmac` char(20),
  PRIMARY KEY(`user_id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;

-- Drop table hna_log_users
DROP TABLE IF EXISTS `hna_log_users`;

CREATE TABLE `hna_log_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11),
  `admin_id` int(11),
  `time` datetime,
  `action` int(11),
  `message` char(250),
  PRIMARY KEY(`id`)
)
ENGINE=MYISAM
ROW_FORMAT=default;

-- Drop table hna_admins
DROP TABLE IF EXISTS `hna_admins`;

CREATE TABLE `hna_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(50),
  `pass` char(32),
  `status` tinyint(4),
  PRIMARY KEY(`admin_id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;

SET FOREIGN_KEY_CHECKS=1;
