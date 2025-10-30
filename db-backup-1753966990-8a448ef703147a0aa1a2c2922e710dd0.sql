DROP TABLE calendar;

CREATE TABLE `calendar` (
  `idi` int(11) NOT NULL AUTO_INCREMENT,
  `date` text,
  `time` text,
  `cal` text CHARACTER SET utf32,
  `ag` int(11) DEFAULT NULL,
  `dr` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("3","2024-09-15 18:13:34","jeannette","nahed","","Existing Client","","","","03517543","","","","","regular","","","","","","","","","","","3","","","hazmieh","damour","2","0");
INSERT INTO client VALUES("4","2024-09-15 19:40:55","george","nahed","","","","","","05454262","03454262","","","","regular","","","","","","","","","","","3","","","hazmieh","","2","0");
INSERT INTO client VALUES("8","2024-09-16 15:17:35","charbel","nahed","","","","","","70556648","","","","","regular","","","","","","","","","","","3","","","hadath","Hazmieh","2","0");
INSERT INTO client VALUES("9","2024-09-16 15:24:23","asaad","ghazal","","","","","","05464646","","","","","regular","","","","","","","","","","","0","","","hadath","","2","0");
INSERT INTO client VALUES("10","2024-09-16 15:26:03","sddas","sdfsdfsdf","","","","","","100","","","","","regular","","","","","","","","","","","0","","","dfsdfsdfsd","","2","0");
INSERT INTO client VALUES("11","2024-09-16 15:35:51","dcsdc","cdscds","","","","","","101","","","","","regular","","","","","","","","","","","0","","","dcsdcsdcd","","2","0");
INSERT INTO client VALUES("12","2024-09-16 15:36:19","csdsdsd","fsdfdsfs","","","","","","102","","","","","regular","","","","","","","","","","","0","","","dfsdfsdfsdf","","2","0");
INSERT INTO client VALUES("13","2024-09-16 15:37:37","cxvcv","cxvxcv","","","","","","103","","","","","regular","","","","","","","","","","","0","","","xcvxcvcxvxc","","2","0");
INSERT INTO client VALUES("14","2024-09-16 15:39:25","sasasdsad","sdasds","im2.jpg","","","","","104","","","","","regular","","","","","","","","","","","0","","","sdasdadsd","","2","0");
INSERT INTO client VALUES("15","2024-09-16 15:40:52","fsdfsd","dsfsdfsd","","","","","","105","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfsd","","2","0");
INSERT INTO client VALUES("16","2024-09-16 15:41:15","dffdgdfgdf","fgdfgdfgf","","","","","","106","","","","","regular","","","","","","","","","","","0","","","gdfgdfgdfgdfgd","","2","0");
INSERT INTO client VALUES("17","2024-09-16 15:53:06","sdsdd","sdasdasdas","","","","","","107","","","","","regular","","","","","","","","","","","0","","","dasdasdasdas","","2","0");
INSERT INTO client VALUES("18","2024-09-16 15:53:26","sdsadas","sdasdasd","","","","","","108","","","","","regular","","","","","","","","","","","0","","","sdsdasdasdas","","2","0");
INSERT INTO client VALUES("19","2024-09-16 16:00:25","dsdfdf","erwerw","","","","","","109","","","","","regular","","","","","","","","","","","0","","","rwerwrrw","","2","0");
INSERT INTO client VALUES("20","2024-09-16 16:00:59","fgfggdf","fgdfgfgd","","","","","","110","","","","","regular","","","","","","","","","","","0","","","dfgdfgdfgdf","","2","0");
INSERT INTO client VALUES("21","2024-09-16 16:11:07","fdfd","sdfdfdf","","","","","","111","","","","","regular","","","","","","","","","","","0","","","dfdsfsdfsds","","2","0");
INSERT INTO client VALUES("22","2024-09-16 16:12:26","wefefwef","feefwefwe","im2.jpg","","","","","112","","","","","regular","","","","","","","","","","","0","","","wefewfwefwefe","","2","0");
INSERT INTO client VALUES("23","2024-09-16 16:15:14","vfdfvv","dfvdfvdfvdf","im2.jpg","","","","","115","","","","","regular","","","","","","","","","","","0","","","vdfvfvdfvdfvd","","2","0");
INSERT INTO client VALUES("24","2024-09-16 16:16:06","dedwef","ewewf","","","","","","116","","","","","regular","","","","","","","","","","","0","","","fwefwefwef","","2","0");
INSERT INTO client VALUES("25","2024-09-16 16:25:07","xcxzcxc","xczxcxc","im1.jpg","","","","","118","","","","","regular","","","","","","","","","","","0","","","xzcxzcxzcc","","2","0");
INSERT INTO client VALUES("26","2024-09-16 16:32:01","sadsda","asdasdas","","","","","","120","","","","","regular","","","","","","","","","","","10","","","dasdasdas","","2","0");
INSERT INTO client VALUES("27","2024-09-16 16:32:38","sdsfsdf","dfsdfsdf","","","","","","121","","","","","regular","","","","","","","","","","","0","","","sdfdsfsdfsd","","2","0");
INSERT INTO client VALUES("28","2024-09-16 16:39:12","sdfdsfd","fsdfsdf","","","","","","122","","","","","regular","","","","","","","","","","","0","","","dfsdfsdfsdf","","0","0");
INSERT INTO client VALUES("29","2024-09-16 16:39:37","eqweqwe","wqeqweqwe","pic1.jpg","","","","","123","","","","","regular","","","","","","","","","","","0","","","ewewqeqw","","0","0");
INSERT INTO client VALUES("30","2024-09-16 16:42:13","dassas","asdasdas","","","","","","124","","","","","regular","","","","","","","","","","","0","","","sdsadasd","","0","0");
INSERT INTO client VALUES("31","2024-09-16 16:42:37","sadsd","dasdas","im1.jpg","","","","","125","","","","","regular","","","","","","","","","","","0","","","sadfasasf","","0","0");
INSERT INTO client VALUES("32","2024-09-16 16:46:42","sdfsdsfg","fgdgdffdfdf","","","","","","126","","","","","regular","","","","","","","","","","","0","","","sdfdsdfdfsd","","2","0");
INSERT INTO client VALUES("33","2024-09-16 16:47:04","sdasasfsdfd","dfsdfsdfsdf","","","","","","127","","","","","regular","","","","","","","","","","","0","","","fdfsdfsdfs","","2","0");
INSERT INTO client VALUES("34","2024-09-16 16:49:04","sdfsdff","fsdfsdfs","","","","","","128","","","","","regular","","","","","","","","","","","0","","","sdfsdfsdf","","2","0");
INSERT INTO client VALUES("35","2024-09-16 16:49:58","sdfsdf","gdfgsdgdf","","","","","","130","","","","","regular","","","","","","","","","","","0","","","fgfdggdf","","2","0");
INSERT INTO client VALUES("36","2024-09-16 16:50:51","dsfdfsd","dfdfsdfs","","","","","","131","","","","","regular","","","","","","","","","","","0","","","sdfsdfsdfsd","","2","0");
INSERT INTO client VALUES("37","2024-09-16 16:51:33","dsdsfdsfs","dfsdfsdf","","","","","","132","","","","","regular","","","","","","","","","","","0","","","dsfdfsdfsdf","","2","0");
INSERT INTO client VALUES("38","2024-09-16 16:51:55","wdsfdsfd","fdfsdfsd","im1.jpg","","","","","133","","","","","regular","","","","","","","","","","","0","","","fsdfdfsdfsdfs","","2","0");
INSERT INTO client VALUES("39","2024-09-16 16:54:07","dasdsd","sdfsdfsdf","pic1.jpg","","","","","134","","","","","regular","","","","","","","","","","","0","","","fdsfsdf","","2","0");
INSERT INTO client VALUES("40","2024-09-16 16:57:21","sddsdffsd","dfdsfsdfsdfds","im2.jpg","","","","","135","","","","","regular","","","","","","","","","","","0","","","fdsfdsfsdfsd","","2","0");
INSERT INTO client VALUES("41","2024-09-16 17:02:02","weeq","qweeqw","im1.jpg","","","","","136","","","","","regular","","","","","","","","","","","0","","","qweqweqwe","","2","0");
INSERT INTO client VALUES("42","2024-09-16 17:04:36","awdas","sdad","im1.jpg","","","","","141","","","","","regular","","","","","","","","","","","0","","","dsadas","","2","0");
INSERT INTO client VALUES("43","2024-09-16 17:05:36","dasdasd","sdasdasd","im1.jpg","","","","","142","","","","","regular","","","","","","","","","","","0","","","sadsdasd","","2","0");
INSERT INTO client VALUES("44","2024-09-16 17:08:47","asdsdaf","dfdsfsdfsdf","im1.jpg","","","","","143","","","","","regular","","","","","","","","","","","0","","","fsdfsdfsdfsd","","2","0");
INSERT INTO client VALUES("45","2024-09-16 17:09:46","wqeqweqw","ewqeqweq","im1.jpg","","","","","144","","","","","regular","","","","","","","","","","","0","","","eweqweqwew","","2","0");
INSERT INTO client VALUES("46","2024-09-16 21:43:21","fsdfsdf","nahed","im1.jpg","","","","","145","","","","","regular","","","","","","","","","","","0","","","jkllilioli","","2","0");
INSERT INTO client VALUES("47","2024-09-16 21:49:03","fsdfsd","three","im2.jpg","","","","","146","","","","","regular","","","","","","","","","","","0","","","uuuyujuy","","2","0");
INSERT INTO client VALUES("48","2024-09-16 21:54:28","charbel","rgtgrtgt","","","","","","148","","","","","regular","","","","","","","","","","","0","","","hyhthythth","","2","0");
INSERT INTO client VALUES("49","2024-09-16 21:55:27","hn","ujuyjy","im1.jpg","","","","","1477","","","","","regular","","","","","","","","","","","0","","","jyujyujyj","","2","0");
INSERT INTO client VALUES("50","2024-09-16 21:56:49","ujyjy","juyjuyj","","","Blog posts","","","666","","","","","regular","","","","","","","","","","","10","","","jyujyuju","deir el qamar","2","0");
INSERT INTO client VALUES("51","2024-09-16 21:58:36","uyjjyuj","jyujyujyjyj","","","","","","1566","","","","","regular","","","","","","","","","","","0","","","ujyujjujujuyjyujy","","2","0");
INSERT INTO client VALUES("52","2024-09-16 22:00:41","gfhghfgh","fghgfhfghfg","","","","","","6669","","","","","regular","","","","","","","","","","","0","","","ghfghfghfghfgh","","2","0");
INSERT INTO client VALUES("55","2024-10-25 16:45:17","george","nahed","","Existing Client","Blog posts","","","03205818","","","","","regular","","","","","","","","","","","5","","","hazmieh","deir el qamar","2","0");
INSERT INTO client VALUES("56","2025-06-11 12:39:12","ext","six o one","","","","","","6001","","","","","regular","","","","","","","","","","","0","","","St.ROCK","","1","0");
INSERT INTO client VALUES("57","2025-06-18 10:37:59","roby","rico","","","","","","6002","","","","","regular","","","","","","","","","","","0","","","hadath","","1","0");



DROP TABLE comments;

CREATE TABLE `comments` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `comment_subject` varchar(50) DEFAULT NULL,
  `comment_text` text,
  `comment_status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO comments VALUES("1","","credit issues","0");
INSERT INTO comments VALUES("2","","bad management","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO crm VALUES("5","ticket3","2024-09-15 19:42:11","testing","testing","Not Resolved","05454262","Medium","1","4","2");
INSERT INTO crm VALUES("8","ticket4","2024-09-24 08:38:43","last activity","bad treatment","In Progress","70556648","Low","1","8","2");



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
  `pipe` text NOT NULL,
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
  `post_status` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  PRIMARY KEY (`idce`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO deals VALUES("1","pipe1","deal1","asasdasd","2024-10-11 08:09:35","george","55535","2024-10-31","admin","03205818","New business","Medium","2","53");



DROP TABLE drivers;

CREATE TABLE `drivers` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name_d` varchar(50) NOT NULL,
  `num_d` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

INSERT INTO drivers VALUES("1","sam","1","info@nccleb.com");
INSERT INTO drivers VALUES("2","zaki","2","nccleb@gmail.com");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO form_element VALUES("1","202","info@nccleb.com","1234","no","0");
INSERT INTO form_element VALUES("2","203","admin@nccleb.com","1234","no","0");



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




DROP TABLE pipeline;

CREATE TABLE `pipeline` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `pipe1` text,
  `pipe2` text,
  `pipe3` text,
  `pipe4` text,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO pipeline VALUES("1","george","","","");
INSERT INTO pipeline VALUES("2","","one","","");
INSERT INTO pipeline VALUES("3","charbel","","","");
INSERT INTO pipeline VALUES("4","jeannette","","","");
INSERT INTO pipeline VALUES("5","fsdfsdf","","","");
INSERT INTO pipeline VALUES("6","","george","","");
INSERT INTO pipeline VALUES("7","","fsdfsdf","","");
INSERT INTO pipeline VALUES("8","","eeee","","");
INSERT INTO pipeline VALUES("9","","","george","");
INSERT INTO pipeline VALUES("10","","","charbel","");
INSERT INTO pipeline VALUES("11","","","one","");
INSERT INTO pipeline VALUES("12","","","","george");
INSERT INTO pipeline VALUES("13","","","","charbel");
INSERT INTO pipeline VALUES("14","","","","one");
INSERT INTO pipeline VALUES("15","","","","fsdfsdf");
INSERT INTO pipeline VALUES("16","","","","jeannette");
INSERT INTO pipeline VALUES("17","","","","fsdfsd");



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




