DROP TABLE address;

CREATE TABLE `address` (
  `idad` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `apartment` varchar(255) CHARACTER SET utf16 NOT NULL,
  `building` varchar(50) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `near` text,
  `remark` text,
  `address` text CHARACTER SET utf8 NOT NULL,
  `address_two` text CHARACTER SET utf8,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`idad`),
  KEY `id` (`id`),
  CONSTRAINT `address_fk` FOREIGN KEY (`id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32;

INSERT INTO address VALUES("1","beirut","","5","","","yellow","","","hazmieh","deir el kamar","1");
INSERT INTO address VALUES("2","deir el kamar","","1","","","","","","hazmieh","deir el kamar","2");
INSERT INTO address VALUES("3","","","1","","","","","","mazraa","","3");
INSERT INTO address VALUES("4","","","3","","","","","","hazmieh","deir el kamar","4");
INSERT INTO address VALUES("5","","","6","","","","","nothung specai","hadath","deir el kamar","5");
INSERT INTO address VALUES("7","","","0","","","","","","hazmieh","deir el kamar","7");
INSERT INTO address VALUES("8","","","0","","","","","","haz","","8");
INSERT INTO address VALUES("9","","","0","","","","","","grttgr","","9");



DROP TABLE billing;

CREATE TABLE `billing` (
  `callerId` int(11) DEFAULT NULL,
  `extension` int(11) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




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
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `company` varchar(50) CHARACTER SET utf32 DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `inumber` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `business` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `payment` varchar(5) DEFAULT NULL,
  `card` varchar(30) DEFAULT NULL,
  `telmobile` varchar(11) DEFAULT NULL,
  `telother` varchar(11) DEFAULT NULL,
  `idf` int(11) DEFAULT '1',
  `idx` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `index_number` (`id`),
  KEY `idf` (`idf`),
  KEY `idx` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("1","joujou","nahed","","ncc","81721326","326","info@nccleb.com","http://www.nccleb.com","telecom","gold","Cash","","","4326","1","1");
INSERT INTO client VALUES("2","georgio","nahed","","ncc","03205818","","info@nccleb.com","http://www.nccleb.com","","gold","Visa","Yes","","","1","1");
INSERT INTO client VALUES("3","ahmad","attwi","","ncc","03230420","","info@nccleb.com","http://www.nccleb.com","telecom","regular","","","","","1","1");
INSERT INTO client VALUES("4","jeannette","nahed","","","03517543","","","","","regular","","","","","1","1");
INSERT INTO client VALUES("5","gergi","hadad","","","306","","","","","gold","Visa","Yes","","","1","1");
INSERT INTO client VALUES("7","joujou","zong","ge.jpg","","205","","","","","regular","","","","","1","0");
INSERT INTO client VALUES("8","said","najar","","","206","","","","","regular","","","","","1","");
INSERT INTO client VALUES("9","grtgt","grttgr","","","207","","","","","regular","","","","","1","0");



DROP TABLE comments;

CREATE TABLE `comments` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `comment_subject` varchar(50) DEFAULT NULL,
  `comment_text` text,
  `comment_status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO comments VALUES("18","","complaint","0");



DROP TABLE crm;

CREATE TABLE `crm` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) DEFAULT NULL,
  `lcd` datetime DEFAULT CURRENT_TIMESTAMP,
  `la` text CHARACTER SET latin1,
  `incident` text CHARACTER SET latin1,
  `status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `num` varchar(11) DEFAULT NULL,
  `comment_status` int(1) DEFAULT '0',
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8;

INSERT INTO crm VALUES("5","geo2","2022-06-08 19:22:48","last activity","very poor connection","In Progress","304","1","6","1");
INSERT INTO crm VALUES("6","geo2","2022-06-08 19:24:09","buy panasonic pbx","very bad support","In Progress","306","1","5","2");
INSERT INTO crm VALUES("7","geo3","2022-06-09 13:52:14","","i called twice no reply ","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("8","","2022-06-10 22:47:09","","very bad reply","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("9","geo3","2022-06-11 08:16:42","nothing","very good start","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("10","","2022-06-11 15:31:58","","very poor connection","Resolved","03660256","1","9","1");
INSERT INTO crm VALUES("11","geo2","2022-06-11 15:47:27","","bad request","Not Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("12","","2022-06-11 16:26:45","","very bad request","Resolved","09220492","1","10","1");
INSERT INTO crm VALUES("13","geo2","2022-06-12 07:12:55","nothing really important","very bad connection","In Progress","03213814","1","11","1");
INSERT INTO crm VALUES("14","","2022-06-12 08:00:12","","bad request","Not Resolved","70155361","1","12","1");
INSERT INTO crm VALUES("15","geo2","2022-06-12 08:01:10","buy food from the superstore","always complaining","In Progress","70155361","1","12","2");
INSERT INTO crm VALUES("16","wal1","2022-06-22 17:18:57","nothing important","very poor manifestation","In Progress","305","1","14","1");
INSERT INTO crm VALUES("17","wal1","2022-06-22 17:22:59","","when i find my self in trouble ","Resolved","304","1","6","1");
INSERT INTO crm VALUES("18","geo1","2022-06-22 20:25:56","buy food for dog","the guy answered and shouted on me","Not Resolved","304","1","6","2");
INSERT INTO crm VALUES("19","geo2","2022-06-22 21:29:19","","never answer","Resolved","305","1","14","2");
INSERT INTO crm VALUES("20","","2022-06-22 21:29:52","","bad request of all time","Resolved","304","1","6","1");
INSERT INTO crm VALUES("21","","2022-06-23 23:02:43","","she is palying with love","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("22","geo2","2022-06-23 23:30:10","","bad request","Resolved","304","1","6","1");
INSERT INTO crm VALUES("23","geo2","2022-06-23 23:47:40","","answering issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("24","geo3","2022-06-23 23:50:00","","plu issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("25","geo4","2022-06-24 12:53:28","","very bad connection","In Progress","306","1","5","1");
INSERT INTO crm VALUES("26","","2022-06-24 13:07:08","","bad connection ","Resolved","306","1","5","1");
INSERT INTO crm VALUES("27","geo5","2022-06-24 13:18:26","","ifive times i called no one answered","In Progress","304","1","6","1");
INSERT INTO crm VALUES("28","geo5","2022-06-25 09:36:16","no last activity","no complaints","In Progress","307","1","15","1");
INSERT INTO crm VALUES("29","geo1","2022-06-25 09:36:56","no last activity","no complaints","Resolved","306","1","5","1");
INSERT INTO crm VALUES("30","geo2","2022-06-25 09:37:58","No last activity","complaint","In Progress","307","1","15","2");
INSERT INTO crm VALUES("31","geo3","2022-06-25 10:01:03","no last activity","no complaints","Resolved","306","1","5","2");
INSERT INTO crm VALUES("32","geo4","2022-06-25 11:07:32","no last activity","no complaints","In Progress","304","1","6","2");
INSERT INTO crm VALUES("33","geo3","2022-06-25 11:55:58","no last activity ","no complaints","Resolved","308","1","16","2");
INSERT INTO crm VALUES("34","geo4","2022-06-26 22:23:30","","no complaints","Resolved","308","1","16","1");
INSERT INTO crm VALUES("35","geo5","2022-06-26 22:30:10","","too late","Resolved","309","1","17","1");
INSERT INTO crm VALUES("36","geo7","2022-07-04 18:12:22","last activity and first activity","credit issues","Resolved","310","1","18","1");
INSERT INTO crm VALUES("37","geo6","2022-07-04 18:40:45","bought chimney","pricing issues","In Progress","310","1","18","2");
INSERT INTO crm VALUES("38","geo2","2022-07-04 18:41:27","","bad service ","Resolved","304","1","6","2");
INSERT INTO crm VALUES("39","","2022-07-04 21:11:05","","damaged items","Resolved","311","1","19","2");
INSERT INTO crm VALUES("40","geo2","2022-07-04 23:01:08","dfdsas","dssdsfd","Resolved","304","1","6","2");
INSERT INTO crm VALUES("41","geo1","2022-07-04 23:12:43","czxczxc","zxczczzc","In Progress","304","1","6","2");
INSERT INTO crm VALUES("42","geo2","2022-07-04 23:15:59","sadsada","test","Resolved","304","1","6","1");
INSERT INTO crm VALUES("43","geo2","2022-07-04 23:22:31","xcvxvxc","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("44","geo5","2022-07-04 23:23:13","","bad request","In Progress","306","1","5","1");
INSERT INTO crm VALUES("45","geo1","2022-07-08 10:25:41","buying running shoes","Bad service","In Progress","324","1","20","1");
INSERT INTO crm VALUES("46","geo5","2022-07-08 10:30:39","","very bad request","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("47","geo4","2022-07-09 08:08:25","purchase panasonic pbx","Pricing issues","In Progress","324","1","20","1");
INSERT INTO crm VALUES("48","geo5","2022-07-09 22:23:58","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("49","geo5","2022-07-09 22:24:21","","Pricing issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("50","geo5","2022-07-10 01:45:16","","Damged items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("51","geo2","2022-07-10 02:15:05","","Bad service","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("52","geo6","2022-07-10 09:39:07","buying kenefeh","Damged items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("53","geo5","2022-07-10 16:17:04","return items","Credit issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("54","geo5","2022-07-11 08:12:25","last activity","Scanning issues","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("55","geo4","2022-07-11 22:10:00","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("56","geo5","2022-07-11 23:37:51","last activity","Credit issues","In Progress","03205818","1","2","2");
INSERT INTO crm VALUES("57","geo3","2022-07-12 08:20:28","last activity","Expired items","Not Resolved","312","1","22","2");
INSERT INTO crm VALUES("58","geo2","2022-07-13 13:00:21","","Credit","Resolved","304","1","6","1");
INSERT INTO crm VALUES("59","geo5","2022-07-13 13:25:53","","Credit issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("60","geo1","2022-07-13 15:19:17","","Pricing","Resolved","304","1","6","1");
INSERT INTO crm VALUES("61","geo5","2022-07-13 15:19:35","","Pricing","In Progress","306","1","5","1");
INSERT INTO crm VALUES("62","geo2","2022-07-13 15:43:37","","Creditissues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("63","geo5","2022-07-13 15:43:55","","Creditissues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("64","geo4","2022-07-13 15:44:14","","Creditissues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("65","geo5","2022-07-13 18:55:27","","Credit issues","Not Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("66","geo2","2022-07-14 09:50:52","","Missing items","In Progress","304","1","6","2");
INSERT INTO crm VALUES("67","geo2","2022-07-14 12:43:45","","Credit issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("68","geo1","2022-07-14 15:50:42","","never trust a stranger","In Progress","306","1","5","1");
INSERT INTO crm VALUES("69","geo3","2022-07-14 15:51:18","buy food","Good","Not Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("70","geo4","2022-07-14 15:58:05","","Bad","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("71","geo2","2022-07-14 17:24:54","","Good quality","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("72","geo3","2022-07-14 18:32:15","","Good quality","In Progress","306","1","5","1");
INSERT INTO crm VALUES("73","geo4","2022-07-14 18:34:48","last activity","Excellent quality","In Progress","305","1","14","1");
INSERT INTO crm VALUES("74","geo2","2022-07-15 09:25:48","","Expired items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("75","geo4","2022-07-15 10:30:17","last activity","very bad","In Progress","03205818","1","2","2");
INSERT INTO crm VALUES("76","geo2","2022-07-16 21:32:51","last activity","very bad quality","In Progress","312","1","22","1");
INSERT INTO crm VALUES("77","geo5","2022-07-21 12:09:18","last activity","Damaged items","In Progress","313","1","23","1");
INSERT INTO crm VALUES("78","geo5","2022-07-21 18:42:34","last activity","bad luck","In Progress","314","1","24","1");
INSERT INTO crm VALUES("79","geo2","2022-07-21 18:47:59","","Wrong PLU","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("80","geo2","2022-07-21 18:48:10","","Bad quality","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("81","geo5","2022-07-22 08:37:22","last activity","very bad quality","Not Resolved","315","1","25","1");
INSERT INTO crm VALUES("86","geo2","2022-07-22 16:50:47","csdcdc","Credit issues","Resolved","","1","25","1");
INSERT INTO crm VALUES("87","geo2","2022-07-22 16:51:24","dscs","Pricing issues","Resolved","","1","25","1");
INSERT INTO crm VALUES("88","geo4","2022-07-22 16:53:12","last activity","Expired items","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("89","geo2","2022-07-23 10:36:49","last activity","Credit issues","super","70556648","1","7","1");
INSERT INTO crm VALUES("90","geo2","2020-07-23 12:00:56","ffdsfsdfsd","Credit issues","In Progres","306","1","5","1");
INSERT INTO crm VALUES("91","geo4","2022-07-27 22:57:39","last activity","Wrong PLU","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("92","geo5","2022-07-27 22:58:29","","Wrong PLU","In Progress","304","1","6","1");
INSERT INTO crm VALUES("93","geo6","2022-07-28 16:14:53","chimney building","Good quality","In Progress","03755289","1","30","1");
INSERT INTO crm VALUES("94","geo4","2022-07-28 17:41:46","last activity","Wrong PLU","In Progress","327","1","31","1");
INSERT INTO crm VALUES("95","geo5","2022-07-29 10:54:51","last activity","Credit issues","In Progress","328","1","32","1");
INSERT INTO crm VALUES("96","geo6","2022-07-29 11:12:40","last activity","Credit issues","In Progress","331","1","40","1");
INSERT INTO crm VALUES("97","geo5","2022-07-29 11:15:48","first activity and buying","Credit issues","In Progress","330","1","39","1");
INSERT INTO crm VALUES("98","geo7","2022-07-29 11:18:16","rent an office","Credit issues","In Progress","331","1","40","1");
INSERT INTO crm VALUES("99","geo2","2022-07-30 09:22:18","ride a bike ","Credit issues","In Progress","340","1","49","1");
INSERT INTO crm VALUES("100","geo5","2022-07-30 09:41:45","","Credit issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("101","geo6","2022-07-30 09:42:54","last activity","Credit issues","In Progress","70556648","1","7","2");
INSERT INTO crm VALUES("102","geo6","2022-07-30 20:58:40","","Credit issues","In Progress","342","1","51","1");
INSERT INTO crm VALUES("103","geo6","2022-07-30 21:00:07","nothing special","Credit issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("104","geo6","2022-07-30 21:02:55","nothing ","Credit issues","In Progress","343","1","52","1");
INSERT INTO crm VALUES("105","geo5","2022-07-30 21:04:35","nothing important","Credit issues","In Progress","345","1","53","1");
INSERT INTO crm VALUES("106","geo5","2022-07-30 21:05:03","last activity","Credit issues","In Progress","345","1","53","1");
INSERT INTO crm VALUES("107","geo5","2022-07-30 23:13:16","first activity","Damaged items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("108","geo2","2022-07-31 18:25:29","last activity","Damaged items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("109","geo6","2022-07-31 18:29:59","first payment","Expired items","In Progress","355","1","64","1");
INSERT INTO crm VALUES("110","geo5","2022-07-31 18:37:20","","Scanning issues","In Progress","357","1","66","1");
INSERT INTO crm VALUES("111","geo2","2022-07-31 18:37:37","","Wrong PLU","In Progress","351","1","60","1");
INSERT INTO crm VALUES("112","geo3","2022-07-31 18:38:01","activity","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("113","geo2","2022-07-31 18:38:12","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("114","geo2","2022-07-31 18:38:44","activity","Bad service","In Progress","357","1","66","1");
INSERT INTO crm VALUES("115","geo2","2022-07-31 18:38:55","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("116","geo2","2022-07-31 18:39:05","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("117","geo5","2022-07-31 18:39:15","","Missing items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("118","geo5","2022-07-31 18:39:28","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("119","geo5","2022-07-31 18:39:41","","Pricing issues","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("120","geo7","2022-07-31 18:42:45","activity","Damaged items","In Progress","359","1","68","1");
INSERT INTO crm VALUES("121","geo5","2022-07-31 18:47:24","","Pricing issues","Resolved","361","1","70","1");
INSERT INTO crm VALUES("122","geo2","2022-07-31 18:47:35","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("123","geo2","2022-07-31 18:47:44","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("124","geo2","2022-07-31 18:47:58","","Credit issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("125","geo5","2022-07-31 18:48:16","","Missing items","In Progress","356","1","65","1");
INSERT INTO crm VALUES("126","geo2","2022-07-31 18:48:25","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("127","geo5","2022-07-31 18:48:58","","Missing items","In Progress","355","1","64","1");
INSERT INTO crm VALUES("128","geo5","2022-07-31 18:49:21","activity","Bad service","In Progress","358","1","67","1");
INSERT INTO crm VALUES("129","geo5","2022-07-31 18:49:35","","Bad service","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("130","geo5","2022-07-31 18:50:46","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("131","geo5","2022-07-31 18:51:08","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("132","geo5","2022-07-31 18:51:24","","Pricing issues","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("133","geo5","2022-07-31 18:51:38","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("134","geo5","2022-07-31 18:51:53","","Pricing issues","In Progress","356","1","65","1");
INSERT INTO crm VALUES("135","geo5","2022-07-31 18:52:36","","Bad service","Resolved","304","1","6","1");
INSERT INTO crm VALUES("136","geo5","2022-07-31 18:52:53","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("137","geo5","2022-07-31 18:53:14","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("138","geo5","2022-07-31 18:53:26","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("139","geo5","2022-07-31 18:53:44","","Damaged items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("140","geo2","2022-07-31 18:56:01","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("141","","2022-07-31 18:56:08","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("142","","2022-07-31 18:56:18","","Missing items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("143","","2022-07-31 18:56:30","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("144","","2022-07-31 18:56:43","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("145","","2022-07-31 19:05:20","","Pricing issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("146","geo5","2022-07-31 19:05:36","","Pricing issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("147","","2022-07-31 19:05:46","","Missing items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("148","","2022-07-31 19:05:54","","Missing items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("149","","2022-07-31 19:06:04","","Credit issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("150","","2022-07-31 19:07:04","","Pricing issues","Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("151","","2022-07-31 19:07:13","","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("152","","2022-07-31 19:07:27","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("153","","2022-07-31 19:07:37","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("154","","2022-07-31 19:07:44","","Credit issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("155","","2022-07-31 19:07:51","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("156","","2022-07-31 19:08:00","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("157","","2022-07-31 19:08:09","","Pricing issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("158","","2022-07-31 19:08:17","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("159","","2022-07-31 19:08:24","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("160","","2022-07-31 19:08:33","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("161","","2022-07-31 20:05:24","","Credit issues","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("162","","2022-07-31 20:05:31","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("163","","2022-07-31 20:05:40","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("164","","2022-07-31 20:05:48","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("165","","2022-07-31 20:05:56","","Pricing issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("166","","2022-07-31 20:06:04","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("167","geo2","2022-07-31 20:06:14","","Wrong PLU","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("168","","2022-07-31 20:06:21","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("169","geo2","2022-07-31 20:06:30","","Damaged items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("170","geo5","2022-07-31 20:06:39","","Damaged items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("171","geo4","2022-07-31 20:06:49","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("172","","2022-07-31 20:06:56","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("173","geo2","2022-07-31 20:07:05","","Bad service","In Progress","306","1","5","1");
INSERT INTO crm VALUES("174","geo5","2022-07-31 20:07:15","","Scanning issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("175","geo5","2022-07-31 20:07:24","","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("176","","2022-07-31 20:07:31","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("177","","2022-07-31 20:07:39","","Damaged items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("178","geo5","2022-07-31 20:07:49","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("179","","2022-07-31 20:07:58","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("180","geo5","2022-07-31 20:08:06","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("181","geo5","2022-07-31 20:08:22","","Pricing issues","In Progress","354","1","63","1");
INSERT INTO crm VALUES("182","geo5","2022-07-31 20:08:29","","Damaged items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("183","geo5","2022-07-31 20:08:53","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("184","","2022-07-31 20:09:00","","Scanning issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("185","","2022-07-31 20:09:09","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("186","","2022-07-31 20:09:16","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("187","geo2","2022-07-31 20:09:24","","Damaged items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("188","geo2","2022-07-31 20:09:32","","Bad service","Resolved","304","1","6","1");
INSERT INTO crm VALUES("189","","2022-07-31 20:09:39","","Missing items","Resolved","306","1","5","1");
INSERT INTO crm VALUES("190","geo2","2022-07-31 20:09:47","","Bad service","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("191","","2022-07-31 20:11:13","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("192","","2022-07-31 20:11:19","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("193","","2022-07-31 20:11:24","","Damaged items","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("194","","2022-07-31 20:11:29","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("195","","2022-07-31 20:11:36","","Bad quality","Resolved","306","1","5","1");
INSERT INTO crm VALUES("196","geo2","2022-07-31 20:11:45","","Damaged items","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("197","","2022-07-31 20:11:50","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("198","","2022-07-31 20:11:55","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("199","","2022-07-31 20:12:03","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("200","geo2","2022-07-31 20:12:12","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("201","geo2","2022-07-31 20:12:19","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("202","","2022-07-31 20:12:25","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("203","geo2","2022-07-31 20:12:33","","Missing items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("204","","2022-07-31 20:12:50","","other complaints","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("205","","2022-07-31 20:12:57","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("206","geo2","2022-07-31 20:13:06","","Scanning issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("207","","2022-07-31 20:13:13","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("208","geo2","2022-07-31 20:13:21","","Damaged items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("209","geo2","2022-07-31 20:13:28","","Damaged items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("210","geo2","2022-07-31 20:13:35","","Damaged items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("211","","2022-07-31 20:13:41","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("212","geo5","2022-07-31 20:13:49","","Bad service","Resolved","351","1","60","1");
INSERT INTO crm VALUES("213","geo5","2022-07-31 20:13:56","","Bad service","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("214","geo5","2022-07-31 20:14:03","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("215","geo2","2022-07-31 20:14:11","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("216","geo2","2022-07-31 20:14:18","","Bad service","Resolved","306","1","5","1");
INSERT INTO crm VALUES("217","geo5","2022-07-31 20:14:26","","Pricing issues","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("218","geo4","2022-07-31 20:14:34","","Pricing issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("219","","2022-07-31 20:14:41","","Missing items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("220","geo5","2022-07-31 20:14:50","","Damaged items","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("221","geo5","2022-07-31 22:18:42","","Missing items","Resolved","362","1","71","1");
INSERT INTO crm VALUES("222","","2022-07-31 22:19:19","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("223","","2022-07-31 22:19:27","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("224","","2022-07-31 22:19:35","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("225","","2022-07-31 22:19:43","","Missing items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("226","","2022-07-31 22:19:53","","Bad service","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("227","","2022-07-31 22:20:08","","Damaged items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("228","","2022-07-31 22:20:23","","Damaged items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("229","","2022-07-31 22:20:34","","Scanning issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("230","","2022-07-31 22:20:42","","Expired items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("231","","2022-07-31 22:20:53","","Wrong PLU","Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("232","","2022-07-31 22:21:07","","Bad quality","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("233","","2022-07-31 22:21:13","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("234","","2022-07-31 22:21:19","","Credit issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("235","","2022-07-31 22:21:26","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("236","","2022-07-31 22:21:32","","Credit issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("237","","2022-07-31 22:21:39","","Pricing issues","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("238","","2022-07-31 22:21:49","","Missing items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("239","","2022-07-31 22:21:55","","Damaged items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("240","","2022-07-31 22:22:07","","Scanning issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("241","","2022-07-31 22:22:14","","Scanning issues","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("242","","2022-07-31 22:22:23","","Good quality","Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("243","","2022-07-31 22:22:30","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("244","","2022-07-31 22:22:37","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("245","","2022-07-31 22:22:44","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("246","","2022-07-31 22:22:51","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("247","","2022-07-31 22:23:02","","Missing items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("248","","2022-07-31 22:23:09","","Bad service","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("249","","2022-07-31 22:23:17","","Missing items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("250","","2022-07-31 22:23:26","","Bad service","Resolved","351","1","60","1");
INSERT INTO crm VALUES("251","","2022-07-31 22:38:32","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("252","","2022-07-31 22:40:44","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("253","","2022-07-31 22:40:54","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("254","","2022-07-31 22:41:04","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("255","","2022-07-31 22:41:20","","Missing items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("256","","2022-07-31 22:41:34","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("257","","2022-07-31 22:41:53","","Pricing issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("258","","2022-07-31 22:42:02","","Pricing issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("259","","2022-07-31 22:42:12","","Pricing issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("260","","2022-07-31 22:42:21","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("261","","2022-07-31 22:42:30","","Credit issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("262","","2022-07-31 22:42:39","","Missing items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("263","","2022-07-31 22:42:47","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("264","","2022-07-31 22:42:57","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("265","","2022-07-31 22:43:05","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("266","geo2","2022-07-31 22:43:15","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("267","","2022-07-31 22:43:25","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("268","","2022-07-31 22:43:32","","Missing items","Resolved","306","1","5","1");
INSERT INTO crm VALUES("269","","2022-07-31 22:43:42","","Damaged items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("270","","2022-07-31 22:43:53","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("271","","2022-07-31 22:44:01","","Bad service","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("272","","2022-07-31 22:44:09","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("273","","2022-07-31 22:44:19","","Missing items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("274","","2022-07-31 22:44:29","","Bad service","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("275","","2022-07-31 22:44:36","","Pricing issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("276","","2022-07-31 22:44:46","","Missing items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("277","","2022-07-31 22:44:57","","Missing items","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("278","","2022-07-31 22:45:06","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("279","","2022-07-31 22:45:15","","Damaged items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("280","","2022-07-31 22:45:26","","Damaged items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("281","","2022-07-31 22:45:35","","Credit issues","Resolved","306","1","5","1");
INSERT INTO crm VALUES("282","","2022-07-31 22:45:53","","Pricing issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("283","","2022-07-31 22:46:03","","Damaged items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("284","","2022-07-31 22:46:11","","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("285","","2022-07-31 22:46:19","","Damaged items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("286","","2022-07-31 22:46:28","","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("287","","2022-07-31 22:46:36","","Missing items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("288","","2022-07-31 22:46:44","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("289","","2022-07-31 22:46:54","","Bad service","In Progress","351","1","60","1");
INSERT INTO crm VALUES("290","","2022-07-31 22:47:07","","Missing items","Resolved","304","1","6","1");
INSERT INTO crm VALUES("291","","2022-08-01 12:35:58","","Pricing issue","Resolved","351","1","60","1");
INSERT INTO crm VALUES("292","","2022-08-01 12:36:12","","Missing items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("293","","2022-08-01 12:36:24","","Credit issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("294","","2022-08-01 12:36:43","","Credit issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("295","","2022-08-01 12:36:57","","Bad service","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("296","","2022-08-01 12:37:14","","Bad service","Resolved","306","1","5","1");
INSERT INTO crm VALUES("297","","2022-08-01 12:37:23","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("298","","2022-08-01 12:37:46","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("299","","2022-08-01 12:37:56","","Expired items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("300","","2022-08-01 12:38:25","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("301","","2022-08-01 12:38:46","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("302","","2022-08-01 12:43:53","","Missing items","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("303","","2022-08-01 12:52:10","","Scanning issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("304","","2022-08-01 12:52:22","","Missing items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("305","","2022-08-01 12:52:33","","Pricing issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("306","","2022-08-01 12:53:03","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("307","","2022-08-01 12:53:15","","Damaged items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("308","","2022-08-01 12:53:31","","Bad service","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("309","","2022-08-01 12:53:44","","Scanning issues","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("310","","2022-08-01 12:53:57","","Bad service","In Progress","351","1","60","1");
INSERT INTO crm VALUES("311","","2022-08-01 12:54:09","","Pricing issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("312","","2022-08-01 12:54:11","","Pricing issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("313","geo5","2022-08-01 12:54:23","","Missing items","Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("314","geo5","2022-08-01 12:54:34","","Pricing issues","Resolved","351","1","60","1");
INSERT INTO crm VALUES("315","geo4","2022-08-01 12:54:47","","Expired items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("316","geo5","2022-08-01 12:54:59","","Expired items","Resolved","306","1","5","1");
INSERT INTO crm VALUES("317","","2022-08-01 13:08:03","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("318","geo2","2022-08-01 13:08:16","","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("319","","2022-08-01 13:08:26","","Credit issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("320","geo2","2022-08-01 13:10:10","","Pricing issues","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("321","geo2","2022-08-01 13:10:27","","Damaged items","Resolved","351","1","60","1");
INSERT INTO crm VALUES("324","geo2","2022-08-01 20:42:28","","Credit issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("325","geo2","2022-08-01 20:42:38","last activity","Expired items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("327","geo5","2022-08-01 20:42:58","","Missing items","Not Resolved","81721326","1","1","1");
INSERT INTO crm VALUES("328","geo4","2022-08-01 20:43:10","","Expired items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("329","geo1","2022-08-01 20:43:23","","Bad quality","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("330","geo6","2022-08-01 20:43:34","","Credit issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("331","geo5","2022-08-01 20:43:51","","Bad service","Resolved","360","1","69","1");
INSERT INTO crm VALUES("332","geo7","2022-08-02 19:30:23","","Bad service","Not Resolved","369","1","78","1");
INSERT INTO crm VALUES("333","geo2","2022-08-02 19:30:34","","Credit issues","Resolved","304","1","6","1");
INSERT INTO crm VALUES("334","geo5","2022-08-02 19:30:43","","Scanning issues","In Progress","306","1","5","1");
INSERT INTO crm VALUES("335","geo5","2022-08-02 19:30:57","","Pricing issues","In Progress","351","1","60","1");
INSERT INTO crm VALUES("336","geo2","2022-08-02 19:32:43","","Bad quality","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("337","geo2","2022-08-02 19:33:03","","Missing items","In Progress","304","1","6","1");
INSERT INTO crm VALUES("338","geo2","2022-08-02 19:33:16","","Bad service","In Progress","351","1","60","1");
INSERT INTO crm VALUES("339","geo2","2022-08-02 19:33:42","","Bad service","In Progress","351","1","60","1");
INSERT INTO crm VALUES("340","geo4","2022-08-02 19:33:57","","Expired items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("341","geo6","2022-08-02 19:34:24","","Wrong PLU","In Progress","351","1","60","1");
INSERT INTO crm VALUES("342","geo6","2022-08-02 19:34:39","","Bad quality","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("343","geo4","2022-08-02 19:34:52","","Bad quality","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("344","geo6","2022-08-02 19:35:25","","Wrong PLU","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("345","geo2","2022-08-02 19:35:40","","Damaged items","In Progress","306","1","5","1");
INSERT INTO crm VALUES("346","geo5","2022-08-02 19:35:51","","Damaged items","In Progress","351","1","60","1");
INSERT INTO crm VALUES("347","geo5","2022-08-02 19:36:04","","Damaged items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("348","geo2","2022-08-02 19:36:20","","Damaged items","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("349","geo4","2022-08-02 19:36:31","","Scanning issues","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("350","geo5","2022-08-02 19:36:45","","Damaged items","In Progress","81721326","1","1","1");
INSERT INTO crm VALUES("351","geo5","2022-08-02 19:36:56","","Missing items","In Progress","70556648","1","7","1");
INSERT INTO crm VALUES("352","geo6","2022-08-03 19:04:02","","Damaged items","In Progress","371","1","80","2");
INSERT INTO crm VALUES("353","geo2","2022-08-03 19:04:40","","Wrong PLU","In Progress","03205818","1","2","2");
INSERT INTO crm VALUES("356","geo4","2022-08-03 19:05:13","","Good quality","In Progress","70556648","1","7","2");
INSERT INTO crm VALUES("357","geo5","2022-08-03 19:05:27","","very bad quality","In Progress","351","1","60","2");
INSERT INTO crm VALUES("358","geo2","2022-08-03 19:05:38","","policies issues","In Progress","81721326","1","1","2");
INSERT INTO crm VALUES("359","geo5","2022-08-03 19:05:49","","policy issues","In Progress","81721326","1","1","2");
INSERT INTO crm VALUES("361","geo5","2022-08-03 19:06:12","","Pricing issues","In Progress","304","1","6","2");
INSERT INTO crm VALUES("362","geo2","2022-08-03 19:06:20","","Bad service","Resolved","306","1","5","2");
INSERT INTO crm VALUES("363","geo2","2022-08-03 19:06:30","","Credit issues","Resolved","03205818","1","2","2");
INSERT INTO crm VALUES("365","geo4","2022-08-03 19:07:05","last","Damaged items","In Progress","304","1","6","2");
INSERT INTO crm VALUES("368","geo2","2022-08-03 19:16:37","","very bad quality","Resolved","333","1","42","2");
INSERT INTO crm VALUES("369","geo6","2022-08-03 19:17:49","","Scanning issues","In Progress","70556648","1","7","2");
INSERT INTO crm VALUES("370","geo2","2022-08-03 19:18:11","","tough guys","In Progress","81721326","1","1","2");
INSERT INTO crm VALUES("371","geo2","2022-08-03 19:18:31","","Bad service","In Progress","81721326","1","1","2");
INSERT INTO crm VALUES("372","geo2","2022-08-03 20:59:06","","drink issues","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("373","geo2","2022-08-03 20:59:27","","fgfgfgfnngng","Not Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("374","geo2","2022-08-03 20:59:53","","","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("375","geo2","2022-08-03 21:00:34","","","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("376","geo2","2022-08-04 21:11:36","","Pricing issues","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("377","geo5","2022-08-04 21:11:46","","csdsdsdfsd","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("378","geo4","2022-08-04 21:11:55","","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("379","geo2","2022-08-05 09:47:36","last activity","Expired items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("380","geo2","2022-08-05 09:48:07","","Bad service","In Progress","304","1","6","1");
INSERT INTO crm VALUES("381","geo2","2022-08-05 09:48:18","","Damaged items","Resolved","70556648","1","7","1");
INSERT INTO crm VALUES("382","geo5","2022-08-05 10:05:12","","Wrong PLU","In Progress","373","1","82","1");
INSERT INTO crm VALUES("383","geo2","2022-08-05 10:06:00","","sfdfsdfd","Not Resolved","304","1","6","1");
INSERT INTO crm VALUES("384","geo10","2022-08-06 10:16:57","last activity","Scanning issue","In Progress","374","1","83","1");
INSERT INTO crm VALUES("385","geo19","2022-08-06 10:21:19","last comments","bad commment","In Progres","03205818","1","2","2");
INSERT INTO crm VALUES("386","geo2","2022-08-06 12:18:21","last activity","Pricing issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("387","geo5","2022-08-06 12:24:09","last activity","bad issues","In Progress","304","1","6","1");
INSERT INTO crm VALUES("388","geo5","2022-08-06 13:05:55","last activity","bad issue","Resolved","03205818","1","2","1");
INSERT INTO crm VALUES("389","geo5","2022-08-07 17:58:19","last activity","Scanning issues","In Progress","375","1","84","1");
INSERT INTO crm VALUES("390","geo5","2022-08-07 18:00:14","buy food","Damaged items","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("391","geo5","2022-08-07 20:07:05","last activity","Scanning issues","In Progress","375","1","84","1");
INSERT INTO crm VALUES("392","geo7","2022-08-07 20:07:17","last activity","Wrong PLU","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("393","geo8","2022-08-08 21:11:01","last activity","Wrong PLU","In Progress","377","1","86","1");
INSERT INTO crm VALUES("394","geo5","2022-08-10 12:46:27","last","Bad quality","In Progress","378","1","87","1");
INSERT INTO crm VALUES("395","geo5","2022-08-11 11:12:24","last","Missing items","In Progress","380","1","89","1");
INSERT INTO crm VALUES("396","geo9","2022-08-11 14:34:08","last","Bad service","Not Resolved","381","1","90","1");
INSERT INTO crm VALUES("397","geo5","2022-08-11 14:34:27","last activity","Wrong PLU","In Progress","380","1","89","1");
INSERT INTO crm VALUES("398","geo9","2022-08-13 08:28:08","last ","Bad service","In Progress","382","1","91","1");
INSERT INTO crm VALUES("399","geo5","2022-08-14 15:06:51","last","Wrong PLU","Not Resolved","383","1","92","1");
INSERT INTO crm VALUES("400","geo5","2022-08-15 09:44:39","last","Bad quality","In Progress","384","1","93","1");
INSERT INTO crm VALUES("401","geo4","2022-08-15 10:15:13","last activity","Expired items","In Progress","384","1","93","1");
INSERT INTO crm VALUES("402","geo5","2022-08-17 11:36:12","last activity","Bad service","In Progress","03205818","1","2","1");
INSERT INTO crm VALUES("403","geo5","2022-08-17 15:26:21","last activity","Wrong PLU","In Progress","385","1","94","1");
INSERT INTO crm VALUES("404","geo5","2022-08-18 16:54:31","last","Wrong PLU","In Progress","387","1","96","1");
INSERT INTO crm VALUES("405","geo5","2022-08-21 07:54:10","last activity","very bad quality","In Progress","388","1","97","1");
INSERT INTO crm VALUES("406","geo11","2022-08-24 10:36:48","last  activity","Damaged items","In Progress","389","1","98","1");
INSERT INTO crm VALUES("407","geo11","2022-08-27 09:55:56","last activity","Scanning issues","In Progress","390","1","99","1");
INSERT INTO crm VALUES("408","geo5","2022-09-01 08:28:27","last activity","Scanning issues","In Progress","400","1","100","1");
INSERT INTO crm VALUES("409","geo2","2022-09-09 09:24:01","last activity","Wrong PLU","In Progress","401","1","101","1");
INSERT INTO crm VALUES("410","geo203","2022-09-28 12:30:42","last activity","Credit issues","In Progress","203","1","107","1");
INSERT INTO crm VALUES("412","geo6","2022-09-29 12:36:37","last activity","Missing items","In Progress","205","1","108","1");
INSERT INTO crm VALUES("414","geo5","2022-09-30 12:12:29","last activity","nothing special","In Progress","05458114","1","109","1");
INSERT INTO crm VALUES("415","geo5","2022-10-06 22:50:35","last activity","Scanning issues","In Progress","01682856","1","110","1");
INSERT INTO crm VALUES("416","geo10","2022-10-07 15:56:45","last activity","Pricing issues","In Progress","205","1","108","1");
INSERT INTO crm VALUES("417","geo5","2022-10-14 10:06:32","last activity","Credit issues","In Progress","05270295","1","111","1");
INSERT INTO crm VALUES("418","geo5","2022-10-25 11:39:34","last activity","Credit issues","In Progress","202","1","129","1");
INSERT INTO crm VALUES("419","geo2","2022-10-26 15:35:16","last activity","Credit issues","Resolved","205","1","108","1");



DROP TABLE drivers;

CREATE TABLE `drivers` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name_d` varchar(50) NOT NULL,
  `num_d` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

INSERT INTO drivers VALUES("1","sam","03123456","");
INSERT INTO drivers VALUES("3","wam","71205818","");
INSERT INTO drivers VALUES("4","tom","1515","");
INSERT INTO drivers VALUES("5","wissam","70094049","");



DROP TABLE form_element;

CREATE TABLE `form_element` (
  `idf` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eemail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO form_element VALUES("1","super","super@nccleb.com","1234","1234","0");
INSERT INTO form_element VALUES("2","user","user@email.com","1234","user","0");
INSERT INTO form_element VALUES("3","admin","admin@nccleb.com","1234","admin","0");



DROP TABLE image;

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




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




