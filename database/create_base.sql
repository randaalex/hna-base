SET FOREIGN_KEY_CHECKS=0;

-- Drop table hna_admins
DROP TABLE IF EXISTS `hna_admins`;

CREATE TABLE `hna_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(50),
  `pass` char(32),
  `prefix` int(11),
  `status` tinyint(4),
  PRIMARY KEY(`admin_id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;

-- Drop table hna_pays
DROP TABLE IF EXISTS `hna_pays`;

CREATE TABLE `hna_pays` (
  `user_id` int(11) NOT NULL,
  `connect` tinyint(1),
  `9` tinyint(1),
  `10` tinyint(1),
  `11` tinyint(1),
  `12` tinyint(1),
  `1` tinyint(1),
  `2` tinyint(1),
  `3` tinyint(1),
  `4` tinyint(1),
  `5` tinyint(1),
  `6` tinyint(1),
  PRIMARY KEY(`user_id`)
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
  `group` char(6),
  `block` int(4),
  `room` varbinary(50) DEFAULT 'a,b',
  `ip` char(14),
  `mac1` char(17),
  `mac2` char(17),
  `status` tinyint(1),
  `register` datetime,
  `admin_id` int(11),
  `note` char(250),
  PRIMARY KEY(`user_id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;

SET FOREIGN_KEY_CHECKS=1;
