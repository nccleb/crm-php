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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf32;

INSERT INTO address VALUES("2","","","3","","","","","","deir","","2");
INSERT INTO address VALUES("4","","","3","","","","","","haz","","4");
INSERT INTO address VALUES("5","","","5","","","","","","hadath","","5");
INSERT INTO address VALUES("6","","","8","","","","","","hazmieh municipalirty road","","6");
INSERT INTO address VALUES("7","","","1","","","","","","beirut","","7");
INSERT INTO address VALUES("8","","","1","","","","","","mazraa","","8");
INSERT INTO address VALUES("9","","","1","","","","","","dekwaneh","","9");
INSERT INTO address VALUES("10","","","1","","","","","","beirut","","10");
INSERT INTO address VALUES("11","","","1","","","","","","daoura","","11");
INSERT INTO address VALUES("12","","","1","","","","","","deir el kamar","","12");
INSERT INTO address VALUES("13","","","3","","","","","","awkar","","13");
INSERT INTO address VALUES("14","","","1","","","","","","daora","","14");
INSERT INTO address VALUES("15","","","1","","","","","","kfarnis","","15");
INSERT INTO address VALUES("16","","","1","","","","","","trablos","","16");
INSERT INTO address VALUES("17","","","1","","","","","","beirut","","17");
INSERT INTO address VALUES("18","","","1","","","","","","saida","","18");
INSERT INTO address VALUES("19","","","1","","","","","","deir el kamar","","19");
INSERT INTO address VALUES("20","","","1","","","","","","daora","","20");
INSERT INTO address VALUES("21","","","1","","","","","","beirut","","21");
INSERT INTO address VALUES("22","","","1","","","","","","deir el kamar","","22");
INSERT INTO address VALUES("23","","","1","","","","","","beirut","","23");
INSERT INTO address VALUES("24","","","1","","","","","","beirut","","24");
INSERT INTO address VALUES("25","","","1","","","","","","hazmieh","","25");
INSERT INTO address VALUES("26","","","1","","","","","","beirut","","26");
INSERT INTO address VALUES("27","","","1","","","","","","hazmieh","","27");
INSERT INTO address VALUES("28","","","1","","","","","","beirut","","28");
INSERT INTO address VALUES("29","","","1","","","","","","beirut","","29");
INSERT INTO address VALUES("30","","","1","","","","","","sin el fil","","30");
INSERT INTO address VALUES("31","","","1","","","","","","beirut","","31");
INSERT INTO address VALUES("32","","","1","","","","","","beirut","","32");
INSERT INTO address VALUES("33","","","1","","","","","","beirut","","33");
INSERT INTO address VALUES("34","","","1","","","","","","beirut","","34");
INSERT INTO address VALUES("35","","","1","","","","","","baaklin","","35");



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
  `number` varchar(11) DEFAULT NULL UNIQUE,
  `inumber` varchar(11) DEFAULT NULL UNIQUE,
  `email` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `business` varchar(30) DEFAULT NULL,
  `telmobile` varchar(11) DEFAULT NULL UNIQUE,
  `telother` varchar(11) DEFAULT NULL UNIQUE,
  `idf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_number` (`id`),
  KEY `idf` (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO client VALUES("2","joujou","nahed","","03205818","202","","","","","","4");
INSERT INTO client VALUES("4","george","nahed","","81721326","","","","","","","4");
INSERT INTO client VALUES("5","charbel","nahed","","70556648","","","","","","","4");
INSERT INTO client VALUES("6","jeannette","nahed","","03517543","","","","","","","4");
INSERT INTO client VALUES("7","hassan","harb","","03557275","","","","","","","4");
INSERT INTO client VALUES("8","walid","hadad","spot electronics","76648138","01300149","spotelectronic@gmail.com","","","","","4");
INSERT INTO client VALUES("9","nehme","khoury","","03764499","71333147","","","","","","4");
INSERT INTO client VALUES("10","ali","ayash","","03336188","","","","","","","4");
INSERT INTO client VALUES("11","johnny","doumt","","03868841","","","","","","","4");
INSERT INTO client VALUES("12","hisham","nahed","","03160800","","","","","","","4");
INSERT INTO client VALUES("13","rachad","maalouf","","03094623","","","","","","","4");
INSERT INTO client VALUES("14","walid","koussa","","03659911","","","","","","","4");
INSERT INTO client VALUES("15","joseph","khoury","","03249622","","","","","","","4");
INSERT INTO client VALUES("16","ibrahim","karnakout","","03935910","","","","","","","4");
INSERT INTO client VALUES("17","nazih","kanaan","","70912635","","","","","","","4");
INSERT INTO client VALUES("18","sami","traboulsi","","03701056","","","","","","","4");
INSERT INTO client VALUES("19","jad","bou nader","","03866548","","","","","","","4");
INSERT INTO client VALUES("20","habib","fayad","manalco","70454249","","","","","","","4");
INSERT INTO client VALUES("21","mohamad","laban","","03218854","","","","","","","4");
INSERT INTO client VALUES("22","abdo","moubarak","","03213814","","","","","","","4");
INSERT INTO client VALUES("23","abed","el hadi","","03805333","","","","","","","4");
INSERT INTO client VALUES("24","abed","sinji","","0381311","","","","","","","4");
INSERT INTO client VALUES("25","adel","mouwaness","","03660256","","","","","","","4");
INSERT INTO client VALUES("26","ahmad","attwi","","03230420","","","","","","","4");
INSERT INTO client VALUES("27","ahmad","microvision","","03155361","","","","","","","4");
INSERT INTO client VALUES("28","ali","sabra","","03932221","","","","","","","4");
INSERT INTO client VALUES("29","andre","sagesse","","03811392","","","","","","","4");
INSERT INTO client VALUES("30","antoinette","nahed","","70602503","","","","","","","4");
INSERT INTO client VALUES("31","assem","assem","","03797789","","","","","","","4");
INSERT INTO client VALUES("32","bachir","imad","","03332233","","","","","","","4");
INSERT INTO client VALUES("33","bilal","bilal","","03379061","","","","","","","4");
INSERT INTO client VALUES("34","chadi","ibc","","70795269","","","","","","","4");
INSERT INTO client VALUES("35","chadi","kleib","","03939767","05509905","","","","","","4");



DROP TABLE crm;

CREATE TABLE `crm` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `balance` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `lcd` datetime DEFAULT CURRENT_TIMESTAMP,
  `la` text CHARACTER SET latin1,
  `incident` text CHARACTER SET latin1,
  `status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `num` varchar(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `idfc` int(11) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO crm VALUES("2","","","2022-03-08 16:38:51","did not buy","not happy","Resolved","81721326","2","4");
INSERT INTO crm VALUES("12","","","2022-03-08 17:13:59","buy","happy","Resolved","03205818","4","4");
INSERT INTO crm VALUES("13","","","2022-03-08 22:25:58","buy","happy","In Progress","70556648","5","4");
INSERT INTO crm VALUES("14","","","2022-03-08 22:35:35","buy","happy","Resolved","03517543","6","4");
INSERT INTO crm VALUES("15","","","2022-03-09 14:33:25","buy","happy","Resolved","03764499","9","4");
INSERT INTO crm VALUES("16","","","2022-03-09 19:45:51","buy","happy","In Progress","70556648","5","4");



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

INSERT INTO form_element VALUES("4","george nahed","samira@samira.com","1234","1234","0");
INSERT INTO form_element VALUES("10","sam","samira@samira.com","12345","1234","0");



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




