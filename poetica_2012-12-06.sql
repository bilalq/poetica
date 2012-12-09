# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.42)
# Database: poetica
# Generation Time: 2012-12-06 20:46:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Comments`;

CREATE TABLE `Comments` (
  `poem_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`poem_id`,`user_id`,`post_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table Education
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Education`;

CREATE TABLE `Education` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `school` varchar(40) NOT NULL,
  `start` date DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `major` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`,`school`,`major`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Education` WRITE;
/*!40000 ALTER TABLE `Education` DISABLE KEYS */;

INSERT INTO `Education` (`user_id`, `school`, `start`, `end`, `major`)
VALUES
	(0,'Handi School','2009-09-12',2014,'Computer Science'),
	(1,'Rutgers','2009-09-12',2013,'Computer Science'),
	(2,'Rutgers','2009-09-12',2013,'Computer Science'),
	(3,'Rutgers','1996-07-21',2013,'Computer Science'),
	(12,'Pokemon Center','2006-07-14',2000,'Pokemon Master'),
	(13,'Digi Universe','2006-07-14',2015,'Digimon Trainer'),
	(4,'Opt School','2009-09-12',2014,'Biology'),
	(5,'Rutgers','2009-06-13',2015,'Biology'),
	(1,'Princeton','2005-10-12',2015,'Philosophy'),
	(5,'rutgers','2009-06-17',2013,'Math'),
	(6,'rutgers','2009-06-17',2013,'Physics'),
	(7,'rutgers','2009-06-17',2014,'Pharmacy'),
	(8,'rutgers','2009-06-17',2014,'Chemistry'),
	(9,'rutgers','2010-06-17',2015,'History'),
	(10,'rutgers','2010-06-17',2015,'Finance'),
	(11,'rutgers','2010-06-17',2015,'Accounting'),
	(12,'rutgers','2010-06-17',2015,'Biology'),
	(13,'rutgers','2010-06-17',2015,'Finance'),
	(14,'rutgers','2010-06-17',2015,'Computer Science'),
	(15,'rutgers','2010-06-17',2015,'Math');

/*!40000 ALTER TABLE `Education` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Employment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Employment`;

CREATE TABLE `Employment` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `job_title` varchar(50) NOT NULL,
  `employer` varchar(50) NOT NULL DEFAULT '',
  `e_address` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`user_id`,`job_title`,`employer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Employment` WRITE;
/*!40000 ALTER TABLE `Employment` DISABLE KEYS */;

INSERT INTO `Employment` (`user_id`, `job_title`, `employer`, `e_address`, `salary`, `start`, `end`)
VALUES
	(0,'Teacher Assistance','Butterworth Institute','b.worth@gmail.com',100000,'2012-11-28','2013-11-28'),
	(1,'Web Designer','Meanface','m.face@gmail.com',100000,'2012-11-28','2013-11-28'),
	(2,'Web Developer','Walking','walking@gmail.com',100000,'2012-11-28','2013-11-28'),
	(3,'Linux Developer','Lin Town','lin.u@gmail.com',100000,'2012-11-28','2013-11-28'),
	(12,'Pokemon Trainer','Pokemon Universe','poke@mon.com',1000000,'1996-07-21','0000-00-00'),
	(13,'Digimon Trainer','Digital World','digital@world.com',1000000,'2006-07-14','2015-09-09'),
	(4,'Police Office','Metrod PD','metrod@gmail.com',50000,'2008-12-12','2012-04-07'),
	(6,'Web Designer','Rutgers','metrod@gmail.com',50000,'2008-12-12','2012-04-07'),
	(7,'Researcher','Rutgers','research@rutgers.edu',50000,'2008-12-12','2012-04-07'),
	(8,'Help Desk Support','Rutgers','support@rutgers.edu',50000,'2008-12-12','2012-04-07'),
	(9,'Waiter','Stuff Ur Face','waiter@stuffurface.com',50000,'2008-12-12','2012-04-07'),
	(10,'Bartender','Stuff Ur Face','bartender@stuffurface.com',60000,'2001-04-12','2012-04-07'),
	(11,'Cashier','Shoprite','cashier@Shoprite.com',30000,'2001-04-12','2010-04-07'),
	(14,'Gym Support','Rutgers Recreation','gym@rutgers.edu',40000,'2001-04-12','2010-04-07'),
	(15,'SaS Dean','Rutgers','dean@rutgers.edu',90000,'1991-04-12','2010-04-07');

/*!40000 ALTER TABLE `Employment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Followings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Followings`;

CREATE TABLE `Followings` (
  `follower` int(11) NOT NULL DEFAULT '0',
  `followee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follower`,`followee`),
  KEY `followee` (`followee`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table Messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Messages`;

CREATE TABLE `Messages` (
  `sender` int(11) NOT NULL DEFAULT '0',
  `receiver` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `sent_time` datetime NOT NULL,
  PRIMARY KEY (`sender`,`receiver`,`sent_time`),
  KEY `receiver` (`receiver`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;

INSERT INTO `Messages` (`sender`, `receiver`, `subject`, `message`, `sent_time`)
VALUES
	(6,8,'Urgent!','Need to buy a tuxedo','2012-10-26 00:00:00'),
	(12,13,'Trade!','Wanna trade a master ball for your digi device?','2012-11-11 00:00:00'),
	(15,0,'Hungry!','Got cheese?','2012-11-17 00:00:00');

/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Poems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Poems`;

CREATE TABLE `Poems` (
  `poem_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`poem_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `Poems` WRITE;
/*!40000 ALTER TABLE `Poems` DISABLE KEYS */;

INSERT INTO `Poems` (`poem_id`, `user_id`, `votes`, `title`, `content`, `post_time`, `category`)
VALUES
	(1,1,1,'Food','Food is awesome','2012-11-28 00:00:00','Free Verse'),
	(2,3,3,'Pokemon','Pokemon, Gotta Catch Them All!','2012-11-29 00:00:00','Free Verse');

/*!40000 ALTER TABLE `Poems` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Relationships
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Relationships`;

CREATE TABLE `Relationships` (
  `requester` int(11) NOT NULL DEFAULT '0',
  `receiver` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`requester`,`receiver`),
  KEY `receiver` (`receiver`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Relationships` WRITE;
/*!40000 ALTER TABLE `Relationships` DISABLE KEYS */;

INSERT INTO `Relationships` (`requester`, `receiver`, `type`, `status`)
VALUES
	(12,14,'Married',1),
	(0,2,'Relationship',2),
	(0,1,'Relationship',2),
	(1,2,'Relationship',2),
	(3,5,'Relationship',1);

/*!40000 ALTER TABLE `Relationships` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(27) NOT NULL,
  `last_name` varchar(27) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `num_address` int(11) DEFAULT NULL,
  `street_address` varchar(50) DEFAULT NULL,
  `town_address` varchar(50) DEFAULT NULL,
  `state_address` varchar(50) DEFAULT NULL,
  `country_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `email`, `password_hash`, `birth_date`, `gender`, `num_address`, `street_address`, `town_address`, `state_address`, `country_address`)
VALUES
	(1,'Alexio','Mota','alexmota@poetica.com','e38ad214943daad1d64c102faec29de4afe9da3d','1991-04-17',1,123,'Frank Ave','Kearny','NJ','USA'),
	(2,'Bilal','Quadri','bilalquadri@poetica.com','2aa60a8ff7fcd473d321e0146afd9e26df395147','1991-05-25',1,467,'Jenesaispas St.','South Brunswick','NJ','USA'),
	(3,'Hua','Yan','huayang@poetica.com','1119cfd37ee247357e034a08d844eea25f6fd20f','1989-04-19',1,123,'Easy Lane','Eastern Township','NJ','USA'),
	(4,'Billy','Lynch','billlynch@rutgers.edu','a1d7584daaca4738d499ad7082886b01117275d8','1992-11-18',1,756,'lynchlord ave','Brunswick','NJ','USA'),
	(5,'Jenny','Shi','jenstar@rutgers.edu','edba955d0ea15fdef4f61726ef97e5af507430c0','1992-02-02',2,876,'feministfood ct','Hillsborough','NJ','USA'),
	(6,'Scott','Rocker','scottrocker@rutgers.edu','a8dbbfa41cec833f8dd42be4d1fa9a13142c85c2','1991-09-01',1,768,'sc2hoe ct','Piscataway','NJ','USA'),
	(7,'Erik','Kamp','ekamp@rutgers.edu','edba955d0ea15fdef4f61726ef97e5af507430c0','1992-05-23',1,98,'lol street','Sarahville','NJ','USA'),
	(8,'Sean','Wilkins','swilkins@rutgers.edu','330ba60e243186e9fa258f9992d8766ea6e88bc1','1991-07-12',1,651,'tripleM ave','Piscataway','NJ','USA'),
	(9,'Scott','Rocker','scottrocker@rutgers.edu','a8dbbfa41cec833f8dd42be4d1fa9a13142c85c2','1991-09-01',1,768,'sc2hoe ct','Piscataway','NJ','USA'),
	(10,'Eugene','Learnanate','eugeneL@rutgers.edu','024b01916e3eaec66a2c4b6fc587b1705f1a6fc8','1981-07-04',1,657,'submarine st','Newyorker','NY','USA'),
	(11,'Byrant','Satterfield','bryantsat@rutgers.edu','f68ec41cde16f6b806d7b04c705766b7318fbb1d','1992-08-09',1,1337,'smitelol street','SummonerRift','NJ','USA'),
	(12,'Elon','Musk','elonmusk@spacex.com','ddf6c9a1df4d57aef043ca8610a5a0dea097af0b','0000-00-00',1,1337,'tesla lane','San Diego','CA','USA'),
	(13,'Misty','Ketchup','mistyketchup@pokemon.com','10c28f9cf0668595d45c1090a7b4a2ae98edfa58','1995-01-12',2,123,'pokemon street','Pokerus','Tokyo','Japan'),
	(14,'Kari','Kamiya','karydigi@digimon.com','d505832286e2c1d2839f394de89b3af8dc3f8c1f','0000-00-00',2,22,'gatomon ave','DigiTown','Tokyo','Japan'),
	(15,'Kimberly','Hart','kimhart@pinkranger.net','89f747bced37a9d8aee5c742e2aea373278eb29f','1998-04-07',2,55,'mighty ave','Morpher','CA','USA'),
	(16,'Mickey','Mouse','mickey@mouse.se','bd021e21c14628faa94d4aaac48c869d6b5d0ec3','1928-11-01',1,77,'McMouse Lane','Disney','CA','USA');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Votes`;

CREATE TABLE `Votes` (
  `poem_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`poem_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Votes` WRITE;
/*!40000 ALTER TABLE `Votes` DISABLE KEYS */;

INSERT INTO `Votes` (`poem_id`, `user_id`)
VALUES
	(0,9),
	(1,1),
	(1,3),
	(1,12);

/*!40000 ALTER TABLE `Votes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
