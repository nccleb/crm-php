DROP TABLE calendar;

CREATE TABLE `calendar` (
  `idi` int NOT NULL AUTO_INCREMENT,
  `date` text,
  `time` text,
  `cal` text CHARACTER SET utf32 COLLATE utf32_general_ci,
  `ag` int DEFAULT NULL,
  `dr` int DEFAULT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`idi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




DROP TABLE client;

CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `con_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `company` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
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
  `floor` int DEFAULT NULL,
  `near` text,
  `remark` text,
  `address` text,
  `address_two` text,
  `idf` int DEFAULT '1',
  `idx` int DEFAULT '1',
  `delivery_instructions` text,
  `access_code` varchar(50) DEFAULT NULL,
  `best_delivery_time` varchar(50) DEFAULT NULL,
  `location_type` varchar(50) DEFAULT NULL,
  `parking_notes` varchar(255) DEFAULT NULL,
  `delivery_contact` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_number` (`id`),
  KEY `idf` (`idf`),
  KEY `idx` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

INSERT INTO client VALUES("1","2025-08-17 21:47:59","charbel","nahed","","","","","","81721326","","","","","regular","","","","","","hazmieh","new municipality","","rahal","","3","","","hazmieh","deir el qamar","0","1","","","Evening (6PM-10PM)","","","");
INSERT INTO client VALUES("5","2025-08-19 01:00:17","george","nahed","","","","","","306","","","","","regular","","","","","","","","","","","0","","","St.ROCK","deir el qamar","1","0","","","","","","");
INSERT INTO client VALUES("6","2025-08-19 01:24:12","george","nahed","","","","","","03205818","","","","","regular","","","","","","BEIRUT","St.ROCK","nahed","rahal","blue","3","municipality","","St.ROCK","deir el qamar","1","0","","","","","","");



DROP TABLE client_notes;

CREATE TABLE `client_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` varchar(50) NOT NULL,
  `notes` text,
  `agent` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_client` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO client_notes VALUES("1","6","this is a test sdfdsfsd
","user","2025-08-21 20:24:42","2025-08-21 20:39:00");
INSERT INTO client_notes VALUES("2","1","","user","2025-08-21 20:48:03","2025-08-22 22:23:33");



DROP TABLE comments;

CREATE TABLE `comments` (
  `id_co` int NOT NULL AUTO_INCREMENT,
  `comment_subject` varchar(50) DEFAULT NULL,
  `comment_text` text,
  `comment_status` int DEFAULT '0',
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO comments VALUES("1","","credit issues","0");
INSERT INTO comments VALUES("2","","bad management","0");



DROP TABLE crm;

CREATE TABLE `crm` (
  `idc` int NOT NULL AUTO_INCREMENT,
  `task` varchar(255) DEFAULT NULL,
  `lcd` datetime DEFAULT CURRENT_TIMESTAMP,
  `la` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `incident` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `num` varchar(11) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `comment_status` int DEFAULT '0',
  `id` int NOT NULL,
  `idfc` int NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




DROP TABLE currency;

CREATE TABLE `currency` (
  `curid` int NOT NULL AUTO_INCREMENT,
  `curr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`curid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO currency VALUES("1","Dollar");
INSERT INTO currency VALUES("2","euro");



DROP TABLE deals;

CREATE TABLE `deals` (
  `idce` int NOT NULL AUTO_INCREMENT,
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
  `post_status` int NOT NULL,
  `idd` int NOT NULL,
  PRIMARY KEY (`idce`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

INSERT INTO deals VALUES("1","pipe1","deal1","asasdasd","2024-10-11 08:09:35","george","55535","2024-10-31","admin","03205818","New business","Medium","2","53");



DROP TABLE delivery_zones;

CREATE TABLE `delivery_zones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(100) NOT NULL,
  `zone_polygon` text,
  `delivery_fee` decimal(10,2) DEFAULT '0.00',
  `estimated_delivery_time` int DEFAULT '30',
  `dispatcher_id` int DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE dispatch_assignments;

CREATE TABLE `dispatch_assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `dispatcher_id` int DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `gps_latitude` decimal(10,8) DEFAULT NULL,
  `gps_longitude` decimal(11,8) DEFAULT NULL,
  `delivery_instructions` text,
  `status` enum('pending','assigned','in_transit','delivered','failed') DEFAULT 'pending',
  `estimated_arrival` datetime DEFAULT NULL,
  `actual_arrival` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `dispatcher_id` (`dispatcher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO dispatch_assignments VALUES("17","6","","1","dsfsdfsd","","","","delivered","2025-08-21 11:11:00","2025-08-22 12:13:00","2025-08-21 10:11:54","2025-08-22 12:13:49");
INSERT INTO dispatch_assignments VALUES("18","6","","1","dsdsadsadsdsds","","","asdasdsdasdasd","delivered","2025-08-21 14:12:00","2025-08-21 13:13:00","2025-08-21 13:13:02","2025-08-21 13:13:31");
INSERT INTO dispatch_assignments VALUES("12","1","","2","dsdffdgfdgdfg 

","","","","delivered","2025-08-20 12:25:00","2025-08-22 12:13:00","2025-08-20 21:25:33","2025-08-22 12:13:32");
INSERT INTO dispatch_assignments VALUES("13","1","","1","this is a test","","","this is a test","failed","2025-08-20 13:32:00","2025-08-21 22:25:00","2025-08-20 22:33:15","2025-08-21 22:25:10");
INSERT INTO dispatch_assignments VALUES("14","6","","1","fdfsdfssdfsf","","","","delivered","2025-08-21 01:36:00","2025-08-21 01:05:00","2025-08-21 00:37:00","2025-08-21 01:05:33");
INSERT INTO dispatch_assignments VALUES("15","6","","1","dfdsfdsfdfsdfsd","","","","delivered","2025-08-21 01:24:00","2025-08-21 01:25:00","2025-08-21 01:24:56","2025-08-21 01:25:23");
INSERT INTO dispatch_assignments VALUES("16","6","","1","foolx1
homosx5
tormosx8
banadourax6
kheyarx9","","","","delivered","2025-08-21 10:15:00","2025-08-21 09:19:00","2025-08-21 09:15:49","2025-08-21 09:19:38");
INSERT INTO dispatch_assignments VALUES("11","6","","1","10452
10453
10454
10455
10456
10457
10458
10459
10460
10461
10462
10463
10464
10465
10466
10467
10468
10469
10470","","","","failed","2025-08-20 12:07:00","2025-08-20 21:17:00","2025-08-20 21:09:10","2025-08-20 21:17:36");



DROP TABLE drivers;

CREATE TABLE `drivers` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `name_d` varchar(50) NOT NULL,
  `num_d` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

INSERT INTO drivers VALUES("1","sami","03205818","info@nccleb.com");
INSERT INTO drivers VALUES("2","zaki","03517543","nccleb@gmail.com");



DROP TABLE failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE form_element;

CREATE TABLE `form_element` (
  `idf` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `eemail` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `active` int DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO form_element VALUES("1","user","info@nccleb.com","12345678","no","0");



DROP TABLE image;

CREATE TABLE `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




DROP TABLE password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE pipeline;

CREATE TABLE `pipeline` (
  `idp` int NOT NULL AUTO_INCREMENT,
  `pipe1` text,
  `pipe2` text,
  `pipe3` text,
  `pipe4` text,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

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
  `codep` int NOT NULL AUTO_INCREMENT,
  `nomp` varchar(30) NOT NULL,
  `price` int DEFAULT NULL,
  `onhand` int DEFAULT NULL,
  `ond` varchar(50) NOT NULL,
  PRIMARY KEY (`codep`),
  UNIQUE KEY `nomp` (`nomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




DROP TABLE vente;

CREATE TABLE `vente` (
  `idv` int NOT NULL AUTO_INCREMENT,
  `id` int DEFAULT NULL,
  `codep` int DEFAULT NULL,
  `qtv` int DEFAULT NULL,
  `che` int NOT NULL,
  `ord` int NOT NULL,
  `cheord` int DEFAULT NULL,
  `idx` int DEFAULT NULL,
  `dat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idff` int DEFAULT NULL,
  PRIMARY KEY (`idv`),
  KEY `idx` (`idx`),
  KEY `idff` (`idff`),
  CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`idx`) REFERENCES `drivers` (`idx`),
  CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`idff`) REFERENCES `form_element` (`idf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




