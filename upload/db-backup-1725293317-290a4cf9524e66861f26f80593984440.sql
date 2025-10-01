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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("1","2024-09-02 17:22:01","george","nahed","","","","","","03205818","","","","","regular","","","","","","","","","","","0","","","hazmieh","","2","2");
INSERT INTO client VALUES("2","2024-09-02 17:22:01","george","nahed","","","","","","05454262","","","","","regular","","","","","","","","","","","0","","","hazmieh","deir el qamar","2","2");
INSERT INTO client VALUES("3","2024-09-02 17:22:01","jeannette","nahed","","","","","","03517543","","","","","regular","","","","","","","","","","","0","","","hazmieh","","2","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO crm VALUES("1","ticket1","2024-09-02 16:05:05","","credit issues","Not Resolved","03205818","Low","1","1","2");
INSERT INTO crm VALUES("2","ticket2","2024-09-02 18:28:19","","blablabla","Not Resolved","03205818","","1","1","2");
INSERT INTO crm VALUES("3","ticket3","2024-09-02 18:30:31","","bad managent","Not Resolved","03205818","","1","1","2");



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




