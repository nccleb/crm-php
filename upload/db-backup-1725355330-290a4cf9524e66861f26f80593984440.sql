DROP TABLE calendar;

CREATE TABLE `calendar` (
  `idi` int(11) NOT NULL AUTO_INCREMENT,
  `date` text,
  `time` text,
  `cal` text CHARACTER SET utf32,
  `ag` int(11) DEFAULT NULL,
  `dr` int(11) DEFAULT NULL,
  PRIMARY KEY (`idi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE client;

CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `company` varchar(50) CHARACTER SET utf32 DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `inumber` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `business` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `payment` varchar(5) DEFAULT NULL,
  `card` varchar(30) DEFAULT NULL,
  `community` varchar(30) DEFAULT NULL,
  `telmobile` varchar(11) DEFAULT NULL,
  `telother` varchar(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `building` varchar(50) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `near` text,
  `remark` text,
  `address` text,
  `address_two` text,
  `idf` int(11) DEFAULT '1',
  `idx` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `index_number` (`id`),
  KEY `idf` (`idf`),
  KEY `idx` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("1","2024-09-02 17:22:01","george","nahed","","","","","","03205818","","","","","regular","","","","","","","","","","","0","","","hazmieh","","2","2");
INSERT INTO client VALUES("2","2024-09-02 17:22:01","george","nahed","","","","","","05454262","","","","","regular","","","","","","","","","","","0","","","hazmieh","deir el qamar","2","2");
INSERT INTO client VALUES("3","2024-09-02 17:22:01","jeannette","nahed","","","","","","03517543","","","","","regular","","","","","","","","","","","0","","","hazmieh","","2","0");
INSERT INTO client VALUES("4","2024-09-02 22:54:17","walid","hadad","","","","","","01300149","111","","","","regular","","","","","","","","","","","0","","","mazraa","","2","0");
INSERT INTO client VALUES("5","2024-09-02 22:57:43","george","obe","","","","","","03205819","","","","","regular","","","","","","","","","","","0","","","fdhgfdhfdgdf","fdgfdgfdgdf","2","0");
INSERT INTO client VALUES("6","2024-09-03 11:55:51","bbcvb","vbcvb","","","","","","100100","","","","","regular","","","","","","","","","","","0","","","vbcvbc","bcvbcvb","2","0");
INSERT INTO client VALUES("7","2024-09-03 11:57:02","vzxcvczxvx","cxvxcvxc","","","","","","100101","","","","","regular","","","","","","","","","","","0","","","cxvxcvxcvx","xcvxcvxcv","2","0");
INSERT INTO client VALUES("8","2024-09-03 11:57:22","dgdfg","dfgdf","","","","","","100102","","","","","regular","","","","","","","","","","","0","","","fdgdfgd","","2","0");
INSERT INTO client VALUES("9","2024-09-03 11:57:38","ddgdfg","dfgdfgdf","","","","","","100103","","","","","regular","","","","","","","","","","","0","","","dfgdfgdfgd","fgdfgdfgdfg","2","0");
INSERT INTO client VALUES("10","2024-09-03 11:57:51","fgdfgfg","fgdfgdf","","","","","","100104","","","","","regular","","","","","","","","","","","0","","","fdgdfgdfgdfg","","2","0");
INSERT INTO client VALUES("11","2024-09-03 11:58:30","dfgdfgdf","","","","","","","100105","","","","","regular","","","","","","","","","","","0","","","fdgdfgdf","","2","0");
INSERT INTO client VALUES("12","2024-09-03 11:58:43","dfgdfgd","fdgdfgdfg","","","","","","100106","","","","","regular","","","","","","","","","","","0","","","dfgfdgfdgdfg","","2","0");
INSERT INTO client VALUES("13","2024-09-03 11:58:55","fdgdfgdfg","fgdfgdfg","","","","","","100107","","","","","regular","","","","","","","","","","","0","","","fdgdfgdfgdfg","","2","0");
INSERT INTO client VALUES("14","2024-09-03 11:59:09","dfgdfgdf","dfgdfgf","","","","","","100108","","","","","regular","","","","","","","","","","","0","","","fgdfdfgdf","","2","0");
INSERT INTO client VALUES("15","2024-09-03 12:00:15","dfgdfg","fdgdfgdfg","","","","","","100109","","","","","regular","","","","","","","","","","","0","","","fgdfgfgdfg","fgfdgdfgfdgdf","2","0");
INSERT INTO client VALUES("16","2024-09-03 12:00:30","fdgdfgdfg","fdgfdgfdgf","","","","","","100110","","","","","regular","","","","","","","","","","","0","","","gdfgfdgfgdf","","2","0");
INSERT INTO client VALUES("17","2024-09-03 12:00:42","fdgdfgdfg","fgdfgdfgg","","","","","","100111","","","","","regular","","","","","","","","","","","0","","","gdfgdfgfg","","2","0");
INSERT INTO client VALUES("18","2024-09-03 12:01:04","fgfdgdfg","fgdfgdfgdf","","","","","","100112","","","","","regular","","","","","","","","","","","0","","","gdfgfdgfgfg","","2","0");
INSERT INTO client VALUES("19","2024-09-03 12:01:24","gdfgdg","fgdfgdfg","","","","","","100113","","","","","regular","","","","","","","","","","","0","","","gdfgfdgdfg","","2","0");
INSERT INTO client VALUES("20","2024-09-03 12:01:38","fgdfgfgd","fgfgfgdfg","","","","","","100114","","","","","regular","","","","","","","","","","","0","","","gdfgfgfdfg","","2","0");
INSERT INTO client VALUES("21","2024-09-03 12:01:52","gfdgdfg","fgfdgdfgd","","","","","","100115","","","","","regular","","","","","","","","","","","0","","","gfdgdfgfdgfdg","","2","0");
INSERT INTO client VALUES("22","2024-09-03 12:04:26","sdasdsad","dasdasd","","","","","","100200","","","","","regular","","","","","","","","","","","0","","","sdasdasd","","2","0");
INSERT INTO client VALUES("23","2024-09-03 12:04:37","sdasd","sadasd","","","","","","100201","","","","","regular","","","","","","","","","","","0","","","asdasdas","","2","0");
INSERT INTO client VALUES("24","2024-09-03 12:04:48","dasdasd","dasdas","","","","","","100202","","","","","regular","","","","","","","","","","","0","","","asdasdasd","","2","0");
INSERT INTO client VALUES("25","2024-09-03 12:05:02","sdasdas","dasdasd","","","","","","100203","","","","","regular","","","","","","","","","","","0","","","dasdasdas","","2","0");
INSERT INTO client VALUES("26","2024-09-03 12:05:16","asdasd","sdasda","","","","","","100204","","","","","regular","","","","","","","","","","","0","","","dasdsadas","","2","0");
INSERT INTO client VALUES("27","2024-09-03 12:06:57","dfgfgd","fdgdf","","","","","","100205","","","","","regular","","","","","","","","","","","0","","","gdfgdfg","","2","0");
INSERT INTO client VALUES("28","2024-09-03 12:07:50","dgfgdf","gdfgdfgd","","","","","","100206","","","","","regular","","","","","","","","","","","0","","","dfgdfgdfgf","","2","0");
INSERT INTO client VALUES("29","2024-09-03 12:14:12","sdfsdfsd","dfsdfsdf","","","","","","100207","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","dsfsdfsdfsd","2","0");
INSERT INTO client VALUES("30","2024-09-03 12:14:25","dsfsdf","fsdfsdf","","","","","","100208","","","","","regular","","","","","","","","","","","0","dfsdfsdfsdf","","fdsfsdfsdfsd","","2","0");
INSERT INTO client VALUES("31","2024-09-03 12:14:47","fsdfsdfsd","fsdfsdf","","","","","","100209","","","","","regular","","","","","","","","","","","2","fsdfsdf","fsdfsdfsdfs","fsdfdsfsdfsd","fsdfsdf","2","1");
INSERT INTO client VALUES("32","2024-09-03 12:15:00","fsdfsd","fdsfsdf","","","","","","100210","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfs","","2","0");
INSERT INTO client VALUES("33","2024-09-03 12:15:13","fsdfsdf","fsdfsdfsd","","","","","","100212","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfs","","2","0");
INSERT INTO client VALUES("34","2024-09-03 12:15:25","fsdfsd","fsdfsdf","","","","","","100213","","","","","regular","","","","","","","","","","","0","","","fsdfsfsd","","2","0");
INSERT INTO client VALUES("35","2024-09-03 12:15:38","fsdfsdf","fsdfsdfs","","","","","","100214","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsd","","2","0");
INSERT INTO client VALUES("36","2024-09-03 12:15:51","fsdfsdfs","fsdfsdfs","","","","","","100215","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("37","2024-09-03 12:16:05","fsdfsdf","fsdfdds","","","","","","100217","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsds","","2","0");
INSERT INTO client VALUES("38","2024-09-03 12:16:18","fsfdsf","fdfsdfsd","","","","","","100218","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("39","2024-09-03 12:16:32","fsdfsdf","fsdfsdf","","","","","","100220","","","","","regular","","","","","","","","","","","0","","","fsdsdfsd","","2","0");
INSERT INTO client VALUES("40","2024-09-03 12:16:44","fsdfsdf","fsdfsdfsd","","","","","","100221","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("41","2024-09-03 12:16:57","fsdfsdsf","fsdfsdfd","","","","","","100222","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("42","2024-09-03 12:17:18","fsd","fsdfsd","","","","","","100230","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("43","2024-09-03 12:17:30","fsdfsd","fsdfsd","","","","","","100231","","","","","regular","","","","","","","","","","","0","","","sdfsdfsdfsd","","2","0");
INSERT INTO client VALUES("44","2024-09-03 12:17:41","fsdfsdf","sdfsdfsd","","","","","","100232","","","","","regular","","","","","","","","","","","0","","","dfsdfsdfsdf","","2","0");
INSERT INTO client VALUES("45","2024-09-03 12:17:53","fsdfsdf","sdfsdfsdf","","","","","","100233","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfs","","2","0");
INSERT INTO client VALUES("46","2024-09-03 12:18:04","fsdfsdf","fsdfsdfsd","","","","","","100234","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsd","","2","0");
INSERT INTO client VALUES("47","2024-09-03 12:18:16","fsdfsd","fsdfsf","","","","","","100235","","","","","regular","","","","","","","","","","","0","","","fsddfsdfsd","","2","0");
INSERT INTO client VALUES("48","2024-09-03 12:18:28","fsdssdffs","fsdfsdf","","","","","","100236","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfd","","2","0");
INSERT INTO client VALUES("49","2024-09-03 12:18:39","sdfsdfs","fsdfsdf","","","","","","100237","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsd","","2","0");
INSERT INTO client VALUES("50","2024-09-03 12:18:51","fsdfsd","fsdfsdf","","","","","","100238","","","","","regular","","","","","","","","","","","0","","","fsdfsdf","","2","0");
INSERT INTO client VALUES("51","2024-09-03 12:19:03","sdfsdfs","fsdfsdf","","","","","","100239","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdf","","2","0");
INSERT INTO client VALUES("52","2024-09-03 12:19:14","fsdfsd","sdfsdfs","","","","","","100240","","","","","regular","","","","","","","","","","","0","","","sdfsdfsdfs","","2","0");
INSERT INTO client VALUES("53","2024-09-03 12:19:26","fsdfsdf","fsdfsdfsd","","","","","","100241","","","","","regular","","","","","","","","","","","0","","","fsdfsdfd","","2","0");
INSERT INTO client VALUES("54","2024-09-03 12:19:38","fsdfsdf","dfsdfsdf","","","","","","100242","","","","","regular","","","","","","","","","","","0","","","fsdfdsfsd","","2","0");
INSERT INTO client VALUES("55","2024-09-03 12:19:49","fsdfsdf","fsdfdsfsd","","","","","","100243","","","","","regular","","","","","","","","","","","0","","","fsdfsdfdf","","2","0");
INSERT INTO client VALUES("56","2024-09-03 12:21:52","dfddfdfg","gdfgdfgdf","","","","","","100223","","","","","regular","","","","","","","","","","","0","","","gdfgdfgdfg","","2","0");



DROP TABLE comments;

CREATE TABLE `comments` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `comment_subject` varchar(50) DEFAULT NULL,
  `comment_text` text,
  `comment_status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO comments VALUES("1","","credit issues","0");
INSERT INTO comments VALUES("2","","bad managent","0");



DROP TABLE crm;

CREATE TABLE `crm` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) DEFAULT NULL,
  `lcd` datetime DEFAULT CURRENT_TIMESTAMP,
  `la` text CHARACTER SET latin1,
  `incident` text CHARACTER SET latin1,
  `status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `num` varchar(11) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `comment_status` int(1) DEFAULT '0',
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

INSERT INTO crm VALUES("1","ticket1","2024-09-02 16:05:05","","credit issues","Not Resolved","03205818","Low","1","1","2");
INSERT INTO crm VALUES("2","ticket2","2024-09-02 18:28:19","","blablabla","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("3","ticket3","2024-09-02 18:30:31","","bad managent","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("4","ticket2","2024-09-02 23:13:44","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("5","ticket2","2024-09-02 23:13:57","","bad managent","In Progress","03205818","","1","1","2");
INSERT INTO crm VALUES("6","ticket2","2024-09-02 23:14:11","","credit issues","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("7","ticket2","2024-09-02 23:14:32","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("8","ticket1","2024-09-02 23:14:45","","bad managent","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("9","","2024-09-02 23:14:54","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("10","ticket2","2024-09-02 23:15:16","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("11","ticket2","2024-09-02 23:15:28","","bad managent","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("12","ticket2","2024-09-02 23:15:37","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("13","ticket2","2024-09-02 23:15:53","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("14","ticket2","2024-09-02 23:16:02","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("15","ticket2","2024-09-02 23:16:25","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("16","ticket2","2024-09-02 23:16:36","","credit issues","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("17","ticket2","2024-09-02 23:16:57","","credit issues","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("18","ticket2","2024-09-02 23:17:09","","bad managent","Closed","03205818","Low","1","1","2");
INSERT INTO crm VALUES("19","ticket1","2024-09-02 23:48:29","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("20","ticket2","2024-09-02 23:48:37","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("21","ticket2","2024-09-02 23:48:45","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("22","ticket2","2024-09-02 23:48:55","","credit issues","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("23","ticket2","2024-09-02 23:49:08","","credit issues","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("24","ticket2","2024-09-02 23:49:43","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("25","ticket2","2024-09-02 23:49:52","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("26","ticket1","2024-09-02 23:50:04","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("27","ticket2","2024-09-02 23:50:13","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("28","ticket2","2024-09-02 23:50:22","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("29","ticket2","2024-09-02 23:51:42","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("30","ticket2","2024-09-02 23:51:50","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("31","ticket2","2024-09-02 23:51:57","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("32","ticket2","2024-09-02 23:52:06","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("33","ticket2","2024-09-02 23:52:12","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("34","ticket2","2024-09-02 23:52:20","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("35","ticket2","2024-09-02 23:52:26","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("36","ticket2","2024-09-02 23:52:34","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("37","ticket2","2024-09-02 23:52:39","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("38","ticket1","2024-09-02 23:53:20","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("39","ticket3","2024-09-02 23:53:28","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("40","ticket2","2024-09-02 23:53:40","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("41","ticket2","2024-09-02 23:53:47","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("42","ticket2","2024-09-02 23:54:11","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("43","ticket2","2024-09-02 23:54:19","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("44","ticket2","2024-09-02 23:54:28","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("45","ticket2","2024-09-02 23:54:38","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("46","ticket2","2024-09-02 23:54:45","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("47","ticket2","2024-09-02 23:54:53","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("49","ticket2","2024-09-02 23:57:24","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("50","ticket2","2024-09-02 23:57:32","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("51","ticket1","2024-09-02 23:57:40","","bad managent","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("52","ticket1","2024-09-02 23:57:48","","bad managent","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("53","ticket2","2024-09-02 23:57:57","","credit issues","Closed","03205818","","1","1","2");
INSERT INTO crm VALUES("54","ticket2","2024-09-03 12:20:48","","credit issues","Not Resolved","100222","Low","0","41","2");
INSERT INTO crm VALUES("55","ticket2","2024-09-03 12:20:59","","credit issues","In Progress","100222","","0","41","2");
INSERT INTO crm VALUES("56","ticket3","2024-09-03 12:21:11","","credit issues","Resolved","03205818","Medium","0","1","2");
INSERT INTO crm VALUES("57","ticket2","2024-09-03 12:21:20","","credit issues","Not Resolved","03205818","","0","1","2");



DROP TABLE currency;

CREATE TABLE `currency` (
  `curid` int(11) NOT NULL AUTO_INCREMENT,
  `curr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`curid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO currency VALUES("1","Dollar");
INSERT INTO currency VALUES("2","euro");



DROP TABLE deals;

CREATE TABLE `deals` (
  `idce` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `contact_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `stage` text NOT NULL,
  `amount` varchar(11) DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `idd` int(11) NOT NULL,
  PRIMARY KEY (`idce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE drivers;

CREATE TABLE `drivers` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name_d` varchar(50) NOT NULL,
  `num_d` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

INSERT INTO drivers VALUES("1","sam","1","info@nccleb.com");
INSERT INTO drivers VALUES("2","zaki","2","nccleb@gmail.com");
INSERT INTO drivers VALUES("3","joujou","306","info@nccleb.com");



DROP TABLE failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE form_element;

CREATE TABLE `form_element` (
  `idf` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eemail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO form_element VALUES("1","super","info@nccleb.com","A3A3a3a3","no","0");
INSERT INTO form_element VALUES("2","admin","admin@nccleb.com","A2A2a2a2","no","0");
INSERT INTO form_element VALUES("3","guest","guest@nccleb.com","1234","no","0");
INSERT INTO form_element VALUES("4","samira","nccleb@gmail.com","1234","no","0");
INSERT INTO form_element VALUES("5","joujou","nccleb@gmail.com","12345678","no","0");



DROP TABLE image;

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE produit;

CREATE TABLE `produit` (
  `codep` int(11) NOT NULL AUTO_INCREMENT,
  `nomp` varchar(30) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `onhand` int(11) DEFAULT NULL,
  `ond` varchar(50) NOT NULL,
  PRIMARY KEY (`codep`),
  UNIQUE KEY `nomp` (`nomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE vente;

CREATE TABLE `vente` (
  `idv` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `codep` int(11) DEFAULT NULL,
  `qtv` int(11) DEFAULT NULL,
  `che` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `cheord` int(11) DEFAULT NULL,
  `idx` int(11) DEFAULT NULL,
  `dat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idff` int(11) DEFAULT NULL,
  PRIMARY KEY (`idv`),
  KEY `idx` (`idx`),
  KEY `idff` (`idff`),
  CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`idx`) REFERENCES `drivers` (`idx`),
  CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`idff`) REFERENCES `form_element` (`idf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




