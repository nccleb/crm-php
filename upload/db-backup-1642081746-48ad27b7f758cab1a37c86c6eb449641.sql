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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

INSERT INTO address VALUES("1","","","1","","","","","","hazmieh","","1");
INSERT INTO address VALUES("2","","","1","","","","","","hazmieh","","2");
INSERT INTO address VALUES("3","","","1","","","","","","hadath","","3");



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
  `company` varchar(50) CHARACTER SET utf32 DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `inumber` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `business` varchar(30) DEFAULT NULL,
  `telmobile` varchar(11) DEFAULT NULL,
  `telother` varchar(11) DEFAULT NULL,
  `idf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_number` (`id`),
  KEY `idf` (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("1","george","nahed","","03205818","","","","","","","4");
INSERT INTO client VALUES("2","joujou","nahed","","81721326","","","","","","","4");
INSERT INTO client VALUES("3","charbel","nahed","","70556648","","","","","","","4");



DROP TABLE crm;

CREATE TABLE `crm` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `balance` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `lcd` date DEFAULT NULL,
  `la` text CHARACTER SET latin1,
  `incident` text CHARACTER SET latin1,
  `status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `num` varchar(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE drivers;

CREATE TABLE `drivers` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name_d` varchar(50) NOT NULL,
  `num_d` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf32;

INSERT INTO drivers VALUES("1","sami","9613205818","sami@nccleb.com");
INSERT INTO drivers VALUES("2","salim","96181721326","nahedgeorge@hotmail.com");
INSERT INTO drivers VALUES("3","toni","9613517543","info@nccleb.com");
INSERT INTO drivers VALUES("4","george nahed","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("5","wael","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("6","said","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("7","nirmin","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("8","khaled","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("9","farid","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("10","sam","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("11","zico","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("12","boula","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("13","sonia","9613205818","infos@nccleb.com");
INSERT INTO drivers VALUES("14","ziad","9613205818","info@nccleb.com");
INSERT INTO drivers VALUES("15","wassim","9613205818","info@nccleb.com");



DROP TABLE form_element;

CREATE TABLE `form_element` (
  `idf` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eemail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO form_element VALUES("4","george nahed","samira@samira.com","12345","1234","1");
INSERT INTO form_element VALUES("10","samo","samira@samira.com","12345","1234","0");



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




