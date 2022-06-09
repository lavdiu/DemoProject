DROP database IF EXISTS demoapp;
CREATE database demoapp CHARACTER SET UTF8 COLLATE utf8_general_ci;
USE demoapp;
##DEFAULT CHARSET=UTF8mb4 COLLATE utf8mb4_bin ## for case sensitive databases


CREATE TABLE `time_zone` (
    `id` int(5) NOT NULL AUTO_INCREMENT,
    `description` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `time_zone` VALUES (1,'Pacific/Niue'),(2,'Pacific/Pago_Pago'),(3,'Pacific/Midway'),(4,'Pacific/Honolulu'),(5,'Pacific/Rarotonga'),(6,'Pacific/Tahiti'),(7,'Pacific/Johnston'),(8,'Pacific/Marquesas'),(9,'America/Adak'),(10,'Pacific/Gambier'),(11,'America/Sitka'),(12,'America/Juneau'),(13,'America/Metlakatla'),(14,'America/Nome'),(15,'America/Anchorage'),(16,'America/Yakutat'),(17,'Pacific/Pitcairn'),(18,'America/Whitehorse'),(19,'America/Dawson'),(20,'America/Santa_Isabel'),(21,'America/Los_Angeles'),(22,'America/Vancouver'),(23,'America/Tijuana'),(24,'America/Creston'),(25,'America/Phoenix'),(26,'America/Hermosillo'),(27,'America/Fort_Nelson'),(28,'America/Dawson_Creek'),(29,'America/Boise'),(30,'America/Cambridge_Bay'),(31,'America/Yellowknife'),(32,'America/Tegucigalpa'),(33,'America/Mazatlan'),(34,'America/Managua'),(35,'America/Inuvik'),(36,'America/Belize'),(37,'America/Ojinaga'),(38,'America/Costa_Rica'),(39,'America/Denver'),(40,'America/El_Salvador'),(41,'America/Edmonton'),(42,'Pacific/Galapagos'),(43,'America/Regina'),(44,'America/Swift_Current'),(45,'America/Chihuahua'),(46,'America/Guatemala'),(47,'America/Lima'),(48,'America/Guayaquil'),(49,'America/Atikokan'),(50,'America/Eirunepe'),(51,'America/Indiana/Knox'),(52,'America/Menominee'),(53,'America/Cancun'),(54,'America/Indiana/Tell_City'),(55,'America/Bogota'),(56,'America/Chicago'),(57,'America/Jamaica'),(58,'America/Bahia_Banderas'),(59,'America/Matamoros'),(60,'America/Panama'),(61,'America/Winnipeg'),(62,'Pacific/Easter'),(63,'America/North_Dakota/New_Salem'),(64,'America/North_Dakota/Center'),(65,'America/Rio_Branco'),(66,'America/Resolute'),(67,'America/Merida'),(68,'America/Rankin_Inlet'),(69,'America/Rainy_River'),(70,'America/North_Dakota/Beulah'),(71,'America/Mexico_City'),(72,'America/Monterrey'),(73,'America/Caracas'),(74,'America/Indiana/Vevay'),(75,'America/Indiana/Marengo'),(76,'America/St_Kitts'),(77,'America/Havana'),(78,'America/St_Thomas'),(79,'America/Guyana'),(80,'America/St_Vincent'),(81,'America/Thunder_Bay'),(82,'America/St_Lucia'),(83,'America/Toronto'),(84,'America/St_Barthelemy'),(85,'America/Puerto_Rico'),(86,'America/Indiana/Indianapolis'),(87,'America/Tortola'),(88,'America/Santo_Domingo'),(89,'America/Port_of_Spain'),(90,'America/Guadeloupe'),(91,'America/La_Paz'),(92,'America/Kralendijk'),(93,'America/Lower_Princes'),(94,'America/Montserrat'),(95,'America/Martinique'),(96,'America/Marigot'),(97,'America/Manaus'),(98,'America/Nassau'),(99,'America/Kentucky/Monticello'),(100,'America/Port-au-Prince'),(101,'America/Indiana/Winamac'),(102,'America/Indiana/Vincennes'),(103,'America/Pangnirtung'),(104,'America/Iqaluit'),(105,'America/New_York'),(106,'America/Kentucky/Louisville'),(107,'America/Nipigon'),(108,'America/Porto_Velho'),(109,'America/Indiana/Petersburg'),(110,'America/Blanc-Sablon'),(111,'America/Boa_Vista'),(112,'America/Cayman'),(113,'America/Cuiaba'),(114,'America/Barbados'),(115,'America/Anguilla'),(116,'America/Antigua'),(117,'America/Aruba'),(118,'America/Asuncion'),(119,'America/Curacao'),(120,'America/Campo_Grande'),(121,'America/Grenada'),(122,'America/Grand_Turk'),(123,'America/Dominica'),(124,'America/Detroit'),(125,'America/Moncton'),(126,'America/Santarem'),(127,'America/Araguaina'),(128,'America/Argentina/Buenos_Aires'),(129,'America/Argentina/Catamarca'),(130,'America/Montevideo'),(131,'America/Argentina/Cordoba'),(132,'America/Sao_Paulo'),(133,'America/Argentina/La_Rioja'),(134,'Antarctica/Rothera'),(135,'America/Paramaribo'),(136,'America/Thule'),(137,'Atlantic/Stanley'),(138,'Antarctica/Palmer'),(139,'America/Recife'),(140,'America/Santiago'),(141,'America/Argentina/Jujuy'),(142,'Atlantic/Bermuda'),(143,'America/Argentina/Mendoza'),(144,'America/Belem'),(145,'America/Fortaleza'),(146,'America/Glace_Bay'),(147,'America/Goose_Bay'),(148,'America/Halifax'),(149,'America/Bahia'),(150,'America/Cayenne'),(151,'America/Argentina/San_Juan'),(152,'America/Argentina/San_Luis'),(153,'America/Maceio'),(154,'America/Argentina/Ushuaia'),(155,'America/Argentina/Tucuman'),(156,'America/Argentina/Salta'),(157,'America/Argentina/Rio_Gallegos'),(158,'America/St_Johns'),(159,'America/Godthab'),(160,'America/Miquelon'),(161,'America/Noronha'),(162,'Atlantic/South_Georgia'),(163,'Atlantic/Cape_Verde'),(164,'Africa/Abidjan'),(165,'Atlantic/St_Helena'),(166,'Atlantic/Reykjavik'),(167,'Africa/Freetown'),(168,'America/Scoresbysund'),(169,'Africa/Dakar'),(170,'Africa/Accra'),(171,'Africa/Bamako'),(172,'Africa/Banjul'),(173,'Africa/Bissau'),(174,'Africa/Conakry'),(175,'UTC'),(176,'Africa/Lome'),(177,'Africa/Monrovia'),(178,'Atlantic/Azores'),(179,'Africa/Ouagadougou'),(180,'America/Danmarkshavn'),(181,'Africa/Nouakchott'),(182,'Africa/Sao_Tome'),(183,'Africa/Niamey'),(184,'Europe/Guernsey'),(185,'Africa/Bangui'),(186,'Africa/Ndjamena'),(187,'Africa/Porto-Novo'),(188,'Europe/Jersey'),(189,'Europe/Isle_of_Man'),(190,'Europe/Lisbon'),(191,'Europe/Dublin'),(192,'Europe/London'),(193,'Africa/Libreville'),(194,'Africa/Algiers'),(195,'Atlantic/Faroe'),(196,'Africa/Malabo'),(197,'Africa/El_Aaiun'),(198,'Atlantic/Canary'),(199,'Africa/Kinshasa'),(200,'Africa/Lagos'),(201,'Africa/Luanda'),(202,'Africa/Douala'),(203,'Atlantic/Madeira'),(204,'Africa/Tunis'),(205,'Africa/Windhoek'),(206,'Africa/Casablanca'),(207,'Africa/Brazzaville'),(208,'Europe/Amsterdam'),(209,'Europe/Gibraltar'),(210,'Europe/Copenhagen'),(211,'Europe/Busingen'),(212,'Europe/Sarajevo'),(213,'Europe/Brussels'),(214,'Europe/Berlin'),(215,'Europe/Belgrade'),(216,'Europe/Budapest'),(217,'Europe/Andorra'),(218,'Europe/Bratislava'),(219,'Europe/Monaco'),(220,'Europe/Vaduz'),(221,'Europe/Tirane'),(222,'Europe/Stockholm'),(223,'Europe/Skopje'),(224,'Europe/Vatican'),(225,'Europe/Zurich'),(226,'Europe/Warsaw'),(227,'Europe/Zagreb'),(228,'Europe/Vienna'),(229,'Europe/San_Marino'),(230,'Europe/Rome'),(231,'Europe/Madrid'),(232,'Europe/Luxembourg'),(233,'Europe/Ljubljana'),(234,'Europe/Malta'),(235,'Europe/Oslo'),(236,'Europe/Prague'),(237,'Europe/Podgorica'),(238,'Europe/Paris'),(239,'Europe/Kaliningrad'),(240,'Antarctica/Troll'),(241,'Africa/Lubumbashi'),(242,'Africa/Kigali'),(243,'Africa/Johannesburg'),(244,'Africa/Lusaka'),(245,'Africa/Maputo'),(246,'Arctic/Longyearbyen'),(247,'Africa/Tripoli'),(248,'Africa/Mbabane'),(249,'Africa/Harare'),(250,'Africa/Maseru'),(251,'Africa/Blantyre'),(252,'Africa/Bujumbura'),(253,'Africa/Gaborone'),(254,'Africa/Cairo'),(255,'Africa/Ceuta'),(256,'Africa/Addis_Ababa'),(257,'Asia/Aden'),(258,'Europe/Mariehamn'),(259,'Europe/Moscow'),(260,'Antarctica/Syowa'),(261,'Europe/Minsk'),(262,'Asia/Amman'),(263,'Europe/Kiev'),(264,'Europe/Bucharest'),(265,'Europe/Athens'),(266,'Asia/Damascus'),(267,'Asia/Gaza'),(268,'Asia/Beirut'),(269,'Europe/Chisinau'),(270,'Europe/Helsinki'),(271,'Asia/Baghdad'),(272,'Asia/Bahrain'),(273,'Europe/Riga'),(274,'Europe/Sofia'),(275,'Indian/Antananarivo'),(276,'Africa/Khartoum'),(277,'Europe/Zaporozhye'),(278,'Indian/Comoro'),(279,'Indian/Mayotte'),(280,'Africa/Djibouti'),(281,'Africa/Juba'),(282,'Africa/Kampala'),(283,'Africa/Dar_es_Salaam'),(284,'Europe/Volgograd'),(285,'Africa/Mogadishu'),(286,'Africa/Nairobi'),(287,'Europe/Simferopol'),(288,'Europe/Tallinn'),(289,'Europe/Uzhgorod'),(290,'Europe/Vilnius'),(291,'Asia/Hebron'),(292,'Africa/Asmara'),(293,'Europe/Istanbul'),(294,'Asia/Nicosia'),(295,'Asia/Kuwait'),(296,'Asia/Jerusalem'),(297,'Asia/Qatar'),(298,'Asia/Riyadh'),(299,'Asia/Tbilisi'),(300,'Indian/Mahe'),(301,'Asia/Dubai'),(302,'Europe/Samara'),(303,'Asia/Yerevan'),(304,'Indian/Mauritius'),(305,'Asia/Muscat'),(306,'Indian/Reunion'),(307,'Asia/Tehran'),(308,'Asia/Kabul'),(309,'Asia/Samarkand'),(310,'Asia/Aqtau'),(311,'Asia/Yekaterinburg'),(312,'Asia/Karachi'),(313,'Asia/Aqtobe'),(314,'Antarctica/Mawson'),(315,'Asia/Baku'),(316,'Asia/Ashgabat'),(317,'Indian/Kerguelen'),(318,'Asia/Tashkent'),(319,'Asia/Dushanbe'),(320,'Indian/Maldives'),(321,'Asia/Oral'),(322,'Asia/Colombo'),(323,'Asia/Kolkata'),(324,'Asia/Kathmandu'),(325,'Asia/Almaty'),(326,'Indian/Chagos'),(327,'Asia/Thimphu'),(328,'Asia/Omsk'),(329,'Asia/Novosibirsk'),(330,'Antarctica/Vostok'),(331,'Asia/Urumqi'),(332,'Asia/Qyzylorda'),(333,'Asia/Bishkek'),(334,'Asia/Dhaka'),(335,'Indian/Cocos'),(336,'Asia/Rangoon'),(337,'Asia/Pontianak'),(338,'Asia/Ho_Chi_Minh'),(339,'Indian/Christmas'),(340,'Asia/Krasnoyarsk'),(341,'Antarctica/Davis'),(342,'Asia/Phnom_Penh'),(343,'Asia/Vientiane'),(344,'Asia/Novokuznetsk'),(345,'Asia/Bangkok'),(346,'Asia/Jakarta'),(347,'Asia/Chita'),(348,'Asia/Hong_Kong'),(349,'Asia/Irkutsk'),(350,'Asia/Manila'),(351,'Australia/Perth'),(352,'Asia/Singapore'),(353,'Asia/Shanghai'),(354,'Asia/Makassar'),(355,'Asia/Taipei'),(356,'Asia/Kuching'),(357,'Asia/Kuala_Lumpur'),(358,'Asia/Macau'),(359,'Asia/Hovd'),(360,'Asia/Brunei'),(361,'Antarctica/Casey'),(362,'Asia/Pyongyang'),(363,'Australia/Eucla'),(364,'Asia/Khandyga'),(365,'Asia/Ulaanbaatar'),(366,'Asia/Choibalsan'),(367,'Asia/Jayapura'),(368,'Asia/Yakutsk'),(369,'Asia/Tokyo'),(370,'Pacific/Palau'),(371,'Asia/Seoul'),(372,'Asia/Dili'),(373,'Australia/Darwin'),(374,'Australia/Adelaide'),(375,'Australia/Broken_Hill'),(376,'Pacific/Guam'),(377,'Asia/Magadan'),(378,'Australia/Brisbane'),(379,'Australia/Currie'),(380,'Pacific/Chuuk'),(381,'Pacific/Port_Moresby'),(382,'Pacific/Saipan'),(383,'Australia/Hobart'),(384,'Asia/Sakhalin'),(385,'Australia/Sydney'),(386,'Antarctica/DumontDUrville'),(387,'Asia/Vladivostok'),(388,'Asia/Ust-Nera'),(389,'Australia/Lindeman'),(390,'Australia/Melbourne'),(391,'Australia/Lord_Howe'),(392,'Pacific/Noumea'),(393,'Asia/Srednekolymsk'),(394,'Antarctica/Macquarie'),(395,'Pacific/Efate'),(396,'Pacific/Pohnpei'),(397,'Pacific/Norfolk'),(398,'Pacific/Guadalcanal'),(399,'Pacific/Kosrae'),(400,'Pacific/Bougainville'),(401,'Asia/Anadyr'),(402,'Pacific/Wallis'),(403,'Antarctica/McMurdo'),(404,'Pacific/Tarawa'),(405,'Pacific/Wake'),(406,'Pacific/Kwajalein'),(407,'Asia/Kamchatka'),(408,'Pacific/Fiji'),(409,'Pacific/Majuro'),(410,'Pacific/Nauru'),(411,'Pacific/Funafuti'),(412,'Pacific/Auckland'),(413,'Pacific/Chatham'),(414,'Pacific/Tongatapu'),(415,'Pacific/Fakaofo'),(416,'Pacific/Enderbury'),(417,'Pacific/Apia'),(418,'Pacific/Kiritimati');


CREATE TABLE `record_status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `record_status` VALUES (1,'Active'),(2,'Pending'),(3,'Banned'),(4,'Suspended'),(5,'Deleted'),(6,'Archived'),(7,'Paused');


CREATE TABLE `yes_or_no` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(10),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `yes_or_no` VALUES (1,'Yes'),(0,'No');


CREATE TABLE `country` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iso` char(2) CHARACTER SET latin1 NOT NULL,
  `label` varchar(80) NOT NULL COMMENT '{"fields":{"setDisplayField":"label"}}',
  `iso3` char(3),
  `numcode` smallint(6),
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `country` VALUES (1,'AF','Afghanistan','AFG',4,93),(2,'AL','Albania','ALB',8,355),(3,'DZ','Algeria','DZA',12,213),(4,'AS','American Samoa','ASM',16,1684),(5,'AD','Andorra','AND',20,376),(6,'AO','Angola','AGO',24,244),(7,'AI','Anguilla','AIA',660,1264),(8,'AQ','Antarctica',NULL,NULL,0),(9,'AG','Antigua and Barbuda','ATG',28,1268),(10,'AR','Argentina','ARG',32,54),(11,'AM','Armenia','ARM',51,374),(12,'AW','Aruba','ABW',533,297),(13,'AU','Australia','AUS',36,61),(14,'AT','Austria','AUT',40,43),(15,'AZ','Azerbaijan','AZE',31,994),(16,'BS','Bahamas','BHS',44,1242),(17,'BH','Bahrain','BHR',48,973),(18,'BD','Bangladesh','BGD',50,880),(19,'BB','Barbados','BRB',52,1246),(20,'BY','Belarus','BLR',112,375),(21,'BE','Belgium','BEL',56,32),(22,'BZ','Belize','BLZ',84,501),(23,'BJ','Benin','BEN',204,229),(24,'BM','Bermuda','BMU',60,1441),(25,'BT','Bhutan','BTN',64,975),(26,'BO','Bolivia','BOL',68,591),(27,'BA','Bosnia and Herzegovina','BIH',70,387),(28,'BW','Botswana','BWA',72,267),(29,'BV','Bouvet Island',NULL,NULL,0),(30,'BR','Brazil','BRA',76,55),(31,'IO','British Indian Ocean Territory',NULL,NULL,246),(32,'BN','Brunei Darussalam','BRN',96,673),(33,'BG','Bulgaria','BGR',100,359),(34,'BF','Burkina Faso','BFA',854,226),(35,'BI','Burundi','BDI',108,257),(36,'KH','Cambodia','KHM',116,855),(37,'CM','Cameroon','CMR',120,237),(38,'CA','Canada','CAN',124,1),(39,'CV','Cape Verde','CPV',132,238),(40,'KY','Cayman Islands','CYM',136,1345),(41,'CF','Central African Republic','CAF',140,236),(42,'TD','Chad','TCD',148,235),(43,'CL','Chile','CHL',152,56),(44,'CN','China','CHN',156,86),(45,'CX','Christmas Island',NULL,NULL,61),(46,'CC','Cocos (Keeling) Islands',NULL,NULL,672),(47,'CO','Colombia','COL',170,57),(48,'KM','Comoros','COM',174,269),(49,'CG','Congo','COG',178,242),(50,'CD','Congo, the Democratic Republic of the','COD',180,242),(51,'CK','Cook Islands','COK',184,682),(52,'CR','Costa Rica','CRI',188,506),(53,'CI','Cote D\'Ivoire','CIV',384,225),(54,'HR','Croatia','HRV',191,385),(55,'CU','Cuba','CUB',192,53),(56,'CY','Cyprus','CYP',196,357),(57,'CZ','Czech Republic','CZE',203,420),(58,'DK','Denmark','DNK',208,45),(59,'DJ','Djibouti','DJI',262,253),(60,'DM','Dominica','DMA',212,1767),(61,'DO','Dominican Republic','DOM',214,1809),(62,'EC','Ecuador','ECU',218,593),(63,'EG','Egypt','EGY',818,20),(64,'SV','El Salvador','SLV',222,503),(65,'GQ','Equatorial Guinea','GNQ',226,240),(66,'ER','Eritrea','ERI',232,291),(67,'EE','Estonia','EST',233,372),(68,'ET','Ethiopia','ETH',231,251),(69,'FK','Falkland Islands (Malvinas)','FLK',238,500),(70,'FO','Faroe Islands','FRO',234,298),(71,'FJ','Fiji','FJI',242,679),(72,'FI','Finland','FIN',246,358),(73,'FR','France','FRA',250,33),(74,'GF','French Guiana','GUF',254,594),(75,'PF','French Polynesia','PYF',258,689),(76,'TF','French Southern Territories',NULL,NULL,0),(77,'GA','Gabon','GAB',266,241),(78,'GM','Gambia','GMB',270,220),(79,'GE','Georgia','GEO',268,995),(80,'DE','Germany','DEU',276,49),(81,'GH','Ghana','GHA',288,233),(82,'GI','Gibraltar','GIB',292,350),(83,'GR','Greece','GRC',300,30),(84,'GL','Greenland','GRL',304,299),(85,'GD','Grenada','GRD',308,1473),(86,'GP','Guadeloupe','GLP',312,590),(87,'GU','Guam','GUM',316,1671),(88,'GT','Guatemala','GTM',320,502),(89,'GN','Guinea','GIN',324,224),(90,'GW','Guinea-Bissau','GNB',624,245),(91,'GY','Guyana','GUY',328,592),(92,'HT','Haiti','HTI',332,509),(93,'HM','Heard Island and Mcdonald Islands',NULL,NULL,0),(94,'VA','Holy See (Vatican City State)','VAT',336,39),(95,'HN','Honduras','HND',340,504),(96,'HK','Hong Kong','HKG',344,852),(97,'HU','Hungary','HUN',348,36),(98,'IS','Iceland','ISL',352,354),(99,'IN','India','IND',356,91),(100,'ID','Indonesia','IDN',360,62),(101,'IR','Iran, Islamic Republic of','IRN',364,98),(102,'IQ','Iraq','IRQ',368,964),(103,'IE','Ireland','IRL',372,353),(104,'IL','Israel','ISR',376,972),(105,'IT','Italy','ITA',380,39),(106,'JM','Jamaica','JAM',388,1876),(107,'JP','Japan','JPN',392,81),(108,'JO','Jordan','JOR',400,962),(109,'KZ','Kazakhstan','KAZ',398,7),(110,'KE','Kenya','KEN',404,254),(111,'KI','Kiribati','KIR',296,686),(112,'KP','Korea, Democratic People\'s Republic of','PRK',408,850),(113,'KR','Korea, Republic of','KOR',410,82),(114,'KW','Kuwait','KWT',414,965),(115,'KG','Kyrgyzstan','KGZ',417,996),(116,'LA','Lao People\'s Democratic Republic','LAO',418,856),(117,'LV','Latvia','LVA',428,371),(118,'LB','Lebanon','LBN',422,961),(119,'LS','Lesotho','LSO',426,266),(120,'LR','Liberia','LBR',430,231),(121,'LY','Libyan Arab Jamahiriya','LBY',434,218),(122,'LI','Liechtenstein','LIE',438,423),(123,'LT','Lithuania','LTU',440,370),(124,'LU','Luxembourg','LUX',442,352),(125,'MO','Macao','MAC',446,853),(126,'MK','Macedonia, the Former Yugoslav Republic of','MKD',807,389),(127,'MG','Madagascar','MDG',450,261),(128,'MW','Malawi','MWI',454,265),(129,'MY','Malaysia','MYS',458,60),(130,'MV','Maldives','MDV',462,960),(131,'ML','Mali','MLI',466,223),(132,'MT','Malta','MLT',470,356),(133,'MH','Marshall Islands','MHL',584,692),(134,'MQ','Martinique','MTQ',474,596),(135,'MR','Mauritania','MRT',478,222),(136,'MU','Mauritius','MUS',480,230),(137,'YT','Mayotte',NULL,NULL,269),(138,'MX','Mexico','MEX',484,52),(139,'FM','Micronesia, Federated States of','FSM',583,691),(140,'MD','Moldova, Republic of','MDA',498,373),(141,'MC','Monaco','MCO',492,377),(142,'MN','Mongolia','MNG',496,976),(143,'MS','Montserrat','MSR',500,1664),(144,'MA','Morocco','MAR',504,212),(145,'MZ','Mozambique','MOZ',508,258),(146,'MM','Myanmar','MMR',104,95),(147,'NA','Namibia','NAM',516,264),(148,'NR','Nauru','NRU',520,674),(149,'NP','Nepal','NPL',524,977),(150,'NL','Netherlands','NLD',528,31),(151,'AN','Netherlands Antilles','ANT',530,599),(152,'NC','New Caledonia','NCL',540,687),(153,'NZ','New Zealand','NZL',554,64),(154,'NI','Nicaragua','NIC',558,505),(155,'NE','Niger','NER',562,227),(156,'NG','Nigeria','NGA',566,234),(157,'NU','Niue','NIU',570,683),(158,'NF','Norfolk Island','NFK',574,672),(159,'MP','Northern Mariana Islands','MNP',580,1670),(160,'NO','Norway','NOR',578,47),(161,'OM','Oman','OMN',512,968),(162,'PK','Pakistan','PAK',586,92),(163,'PW','Palau','PLW',585,680),(164,'PS','Palestinian Territory, Occupied',NULL,NULL,970),(165,'PA','Panama','PAN',591,507),(166,'PG','Papua New Guinea','PNG',598,675),(167,'PY','Paraguay','PRY',600,595),(168,'PE','Peru','PER',604,51),(169,'PH','Philippines','PHL',608,63),(170,'PN','Pitcairn','PCN',612,0),(171,'PL','Poland','POL',616,48),(172,'PT','Portugal','PRT',620,351),(173,'PR','Puerto Rico','PRI',630,1787),(174,'QA','Qatar','QAT',634,974),(175,'RE','Reunion','REU',638,262),(176,'RO','Romania','ROM',642,40),(177,'RU','Russian Federation','RUS',643,70),(178,'RW','Rwanda','RWA',646,250),(179,'SH','Saint Helena','SHN',654,290),(180,'KN','Saint Kitts and Nevis','KNA',659,1869),(181,'LC','Saint Lucia','LCA',662,1758),(182,'PM','Saint Pierre and Miquelon','SPM',666,508),(183,'VC','Saint Vincent and the Grenadines','VCT',670,1784),(184,'WS','Samoa','WSM',882,684),(185,'SM','San Marino','SMR',674,378),(186,'ST','Sao Tome and Principe','STP',678,239),(187,'SA','Saudi Arabia','SAU',682,966),(188,'SN','Senegal','SEN',686,221),(189,'CS','Serbia and Montenegro',NULL,NULL,381),(190,'SC','Seychelles','SYC',690,248),(191,'SL','Sierra Leone','SLE',694,232),(192,'SG','Singapore','SGP',702,65),(193,'SK','Slovakia','SVK',703,421),(194,'SI','Slovenia','SVN',705,386),(195,'SB','Solomon Islands','SLB',90,677),(196,'SO','Somalia','SOM',706,252),(197,'ZA','South Africa','ZAF',710,27),(198,'GS','South Georgia and the South Sandwich Islands',NULL,NULL,0),(199,'ES','Spain','ESP',724,34),(200,'LK','Sri Lanka','LKA',144,94),(201,'SD','Sudan','SDN',736,249),(202,'SR','Suriname','SUR',740,597),(203,'SJ','Svalbard and Jan Mayen','SJM',744,47),(204,'SZ','Swaziland','SWZ',748,268),(205,'SE','Sweden','SWE',752,46),(206,'CH','Switzerland','CHE',756,41),(207,'SY','Syrian Arab Republic','SYR',760,963),(208,'TW','Taiwan, Province of China','TWN',158,886),(209,'TJ','Tajikistan','TJK',762,992),(210,'TZ','Tanzania, United Republic of','TZA',834,255),(211,'TH','Thailand','THA',764,66),(212,'TL','Timor-Leste',NULL,NULL,670),(213,'TG','Togo','TGO',768,228),(214,'TK','Tokelau','TKL',772,690),(215,'TO','Tonga','TON',776,676),(216,'TT','Trinidad and Tobago','TTO',780,1868),(217,'TN','Tunisia','TUN',788,216),(218,'TR','Turkey','TUR',792,90),(219,'TM','Turkmenistan','TKM',795,7370),(220,'TC','Turks and Caicos Islands','TCA',796,1649),(221,'TV','Tuvalu','TUV',798,688),(222,'UG','Uganda','UGA',800,256),(223,'UA','Ukraine','UKR',804,380),(224,'AE','United Arab Emirates','ARE',784,971),(225,'GB','United Kingdom','GBR',826,44),(226,'US','United States','USA',840,1),(227,'UM','United States Minor Outlying Islands',NULL,NULL,1),(228,'UY','Uruguay','URY',858,598),(229,'UZ','Uzbekistan','UZB',860,998),(230,'VU','Vanuatu','VUT',548,678),(231,'VE','Venezuela','VEN',862,58),(232,'VN','Viet Nam','VNM',704,84),(233,'VG','Virgin Islands, British','VGB',92,1284),(234,'VI','Virgin Islands, U.s.','VIR',850,1340),(235,'WF','Wallis and Futuna','WLF',876,681),(236,'EH','Western Sahara','ESH',732,212),(237,'YE','Yemen','YEM',887,967),(238,'ZM','Zambia','ZMB',894,260),(239,'ZW','Zimbabwe','ZWE',716,263),(240,'RS','Serbia','SRB',688,381),(241,'AP','Asia / Pacific Region','0',0,0),(242,'ME','Montenegro','MNE',499,382),(243,'AX','Aland Islands','ALA',248,358),(244,'BQ','Bonaire, Sint Eustatius and Saba','BES',535,599),(245,'CW','Curacao','CUW',531,599),(246,'GG','Guernsey','GGY',831,44),(247,'IM','Isle of Man','IMN',833,44),(248,'JE','Jersey','JEY',832,44),(249,'XK','Kosovo','---',0,383),(250,'BL','Saint Barthelemy','BLM',652,590),(251,'MF','Saint Martin','MAF',663,590),(252,'SX','Sint Maarten','SXM',534,1),(253,'SS','South Sudan','SSD',728,211);


CREATE TABLE `address`
(
	id INT AUTO_INCREMENT
	, address1 VARCHAR(255)
	, address2 VARCHAR(255)
	, city VARCHAR(255)
	, state_province VARCHAR(255)
	, postal_code VARCHAR(255)
	, country_id integer
	, attention VARCHAR(255)
	, PRIMARY KEY(id),
    KEY `address_country_fk` (`country_id`),
	CONSTRAINT `address_country_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
)ENGINE = InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;

CREATE TABLE `person_type` (
   `id` int(2) NOT NULL AUTO_INCREMENT,
   `label` varchar(255),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `person_type` VALUES (1,'Administrator'),(2,'I Kufizuar');

CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reports_to_id` INTEGER NULL,
  `name` varchar(50),
  `email` varchar(50),
  `password` varchar(255),
  `created_on` datetime,
  `created_by` integer,
  `updated_on` datetime,
  `updated_by` integer,
  `record_status_id` int(5),
  `address_id` int,
  `time_zone_id` int(8),
  `profile_picture_id` int(10),
  `phone` varchar(255),
  `login_cookie` text,
  `login_ip` varchar(255),
  `login_time` datetime,
  `login_duration_minutes` int(8),
  `login_agent` varchar(255),
  last_activity datetime,
  `activation_code` text,
  `reset_password_code` text,
  `reset_password_time` datetime,
  `requires_login_device_approval` int(8),
  `person_type_id` int(8),
  PRIMARY KEY (`id`),
  KEY `demoapp_person_tz_id_fk` (`time_zone_id`),
  UNIQUE KEY `demoapp_person_email_uq_idx` (`email`),
  KEY `demoapp_person_created_by_id_fk` (`created_by`),
  KEY `demoapp_person_updated_by_id_fk` (`updated_by`),
  KEY `demoapp_person_reports_to_id_fk` (`reports_to_id`),
  KEY `demoapp_person_record_status_id_fk` (`record_status_id`),
  KEY `demoapp_person_address_id_fk` (`address_id`),
  KEY `asm_laf_person_p_type_id_fk` (`person_type_id`),
  KEY `demoapp_person_requires_login_device_approval_fk` (`requires_login_device_approval`),
  CONSTRAINT `demoapp_person_created_by_id_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_person_updated_by_id_fk` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_person_reports_to_id_fk` FOREIGN KEY (`reports_to_id`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_person_record_status_id_fk` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`),
  CONSTRAINT `demoapp_person_record_address_id_fk` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  CONSTRAINT `demoapp_person_tz_id_fk` FOREIGN KEY (`time_zone_id`) REFERENCES `time_zone` (`id`),
  CONSTRAINT `demoapp_person_requires_login_device_approval_fk` FOREIGN KEY (`requires_login_device_approval`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `asm_laf_person_p_type_id_fk` FOREIGN KEY (`person_type_id`) REFERENCES `person_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;

CREATE TABLE `person_login_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(8) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `device_name` text DEFAULT NULL,
  `approved_by` int(8) DEFAULT NULL,
  `approved_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_person_login_device_person_id_fk` (`person_id`),
  KEY `demoapp_person_login_device_approved_by_fk` (`approved_by`),
  CONSTRAINT `demoapp_person_login_device_person_id_fk` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_person_login_device_approved_by_fk` FOREIGN KEY (`approved_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `person_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(14),
  `created_on` datetime,
  `ip_address` varchar(45),
  `user_agent` text,
  PRIMARY KEY (`id`),
  KEY `demoapp_person_login_log_fk1` (`person_id`),
  CONSTRAINT `demoapp_person_login_log_fk1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci COMMENT='login history for users';


CREATE TABLE `person_password_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(14),
  `created_on` datetime,
  `password` varchar(255),
  PRIMARY KEY (`id`),
  KEY `demoapp_person_pass_history_login_log_fk1` (`person_id`),
  CONSTRAINT `demoapp_person_pass_history_login_log_fk1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci COMMENT='Password history for users';


CREATE TABLE `document` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `file_name_original` varchar(255),
  `file_name` varchar(255),
  `file_extension` varchar(10),
  `file_size` int(10),
  `mime_type` varchar(255),
  `created_by` int(10),
  `created_on` datetime,
  `updated_on` datetime,
  `updated_by` int(10),
  `parent_id` int(14),
  `thumbnail_name` varchar(255),
  `encrypt_key` varchar(255),
  PRIMARY KEY (`id`),
  KEY `demoapp_document_created_by_fk` (`created_by`),
  KEY `demoapp_document_parent_id_fk` (`parent_id`),
  KEY `demoapp_document_updated_by_fk` (`updated_by`),
  CONSTRAINT `demoapp_document_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_document_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `document` (`id`),
  CONSTRAINT `demoapp_document_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;


CREATE TABLE `language` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(51),
  `native` varchar(57),
  `iso6391` varchar(2),
  `iso6392T` varchar(3),
  `iso6392b` varchar(3),
  `iso6393` varchar(5),
  `iso6396` varchar(4),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `language` VALUES (1,'Abkhaz','????? ??????, ??????','ab','abk','abk','abk','abks'),(2,'Afar','Afaraf','aa','aar','aar','aar','aars'),(3,'Afrikaans','Afrikaans','af','afr','afr','afr','afrs'),(4,'Akan','Akan','ak','aka','aka','aka',''),(5,'Albanian','Shqip','sq','sqi','alb','sqi',''),(6,'Amharic','????','am','amh','amh','amh',''),(7,'Arabic','??????? ','ar','ara','ara','ara',''),(8,'Aragonese','Aragonés','an','arg','arg','arg',''),(9,'Armenian','???????','hy','hye','arm','hye',''),(10,'Assamese','???????','as','asm','asm','asm',''),(11,'Avaric','???? ????, ???????? ????','av','ava','ava','ava',''),(12,'Avestan','Avesta','ae','ave','ave','ave',''),(13,'Aymara','Aymar aru','ay','aym','aym','aym',''),(14,'Azerbaijani','Az?rbaycan dili','az','aze','aze','aze',''),(15,'Bambara','bamanankan','bm','bam','bam','bam',''),(16,'Bashkir','??????? ????','ba','bak','bak','bak',''),(17,'Basque','euskara, euskera','eu','eus','baq','eus',''),(18,'Belarusian','?????????? ????','be','bel','bel','bel',''),(19,'Bengali, Bangla','?????','bn','ben','ben','ben',''),(20,'Bihari','???????','bh','bih','bih','',''),(21,'Bislama','Bislama','bi','bis','bis','bis',''),(22,'Bosnian','Bosanski','bs','bos','bos','bos','boss'),(23,'Breton','Brezhoneg','br','bre','bre','bre',''),(24,'Bulgarian','????????? ????','bg','bul','bul','bul','buls'),(25,'Burmese','?????','my','mya','bur','mya',''),(26,'Catalan','Català','ca','cat','cat','cat',''),(27,'Chamorro','Chamoru','ch','cha','cha','cha',''),(28,'Chechen','??????? ????','ce','che','che','che',''),(29,'Chichewa, Chewa, Nyanja','chiChe?a, chinyanja','ny','nya','nya','nya',''),(30,'Chinese','?? (Zh?ngwén), ??, ??','zh','zho','chi','zho',''),(31,'Chuvash','????? ?????','cv','chv','chv','chv',''),(32,'Cornish','Kernewek','kw','cor','cor','cor',''),(33,'Corsican','Corsu','co','cos','cos','cos',''),(34,'Cree','???????','cr','cre','cre','cre',''),(35,'Croatian','Hrvatski','hr','hrv','hrv','hrv',''),(36,'Czech','?eština, ?eský jazyk','cs','ces','cze','ces',''),(37,'Danish','Dansk','da','dan','dan','dan',''),(38,'Divehi, Dhivehi, Maldivian','?????? ','dv','div','div','div',''),(39,'Dutch','Nederlands, Vlaams','nl','nld','dut','nld',''),(40,'Dzongkha','??????','dz','dzo','dzo','dzo',''),(41,'English','English','en','eng','eng','eng','engs'),(42,'Esperanto','Esperanto','eo','epo','epo','epo',''),(43,'Estonian','Eesti','et','est','est','est',''),(44,'Ewe','E?egbe','ee','ewe','ewe','ewe',''),(45,'Faroese','Føroyskt','fo','fao','fao','fao',''),(46,'Fijian','Vosa Vakaviti','fj','fij','fij','fij',''),(47,'Finnish','Suomi, suomen kieli','fi','fin','fin','fin',''),(48,'French','Français','fr','fra','fre','fra','fras'),(49,'Fula, Fulah, Pulaar, Pular','Fulfulde, Pulaar, Pular','ff','ful','ful','ful ',''),(50,'Galician','Galego','gl','glg','glg','glg',''),(51,'Georgian','???????','ka','kat','geo','kat',''),(52,'German','Deutsch','de','deu','ger','deu','deus'),(53,'Greek','????????','el','ell','gre','ell','ells'),(54,'Guaraní','Avañe\"?','gn','grn','grn','grn',''),(55,'Gujarati','???????','gu','guj','guj','guj',''),(56,'Haitian, Haitian Creole','Kreyòl ayisyen','ht','hat','hat','hat',''),(57,'Hausa','(Hausa) ?????? ','ha','hau','hau','hau',''),(58,'Hebrew','????? ','he','heb','heb','heb',''),(59,'Herero','Otjiherero','hz','her','her','her',''),(60,'Hindi','??????, ?????','hi','hin','hin','hin','hins'),(61,'Hiri Motu','Hiri Motu','ho','hmo','hmo','hmo',''),(62,'Hungarian','magyar','hu','hun','hun','hun',''),(63,'Interlingua','Interlingua','ia','ina','ina','ina',''),(64,'Indonesian','Bahasa Indonesia','id','ind','ind','ind',''),(66,'Irish','Gaeilge','ga','gle','gle','gle',''),(67,'Igbo','As?s? Igbo','ig','ibo','ibo','ibo',''),(68,'Inupiaq','Iñupiaq, Iñupiatun','ik','ipk','ipk','ipk',''),(69,'Ido','Ido','io','ido','ido','ido','idos'),(70,'Icelandic','�?slenska','is','isl','ice','isl',''),(71,'Italian','Italiano','it','ita','ita','ita','itas'),(72,'Inuktitut','??????','iu','iku','iku','iku',''),(73,'Japanese','??? (????)','ja','jpn','jpn','jpn',''),(74,'Javanese','????','jv','jav','jav','jav',''),(75,'Kalaallisut, Greenlandic','kalaallisut, kalaallit oqaasii','kl','kal','kal','kal',''),(76,'Kannada','?????','kn','kan','kan','kan',''),(77,'Kanuri','Kanuri','kr','kau','kau','kau',''),(78,'Kashmiri','???????, ???????','ks','kas','kas','kas',''),(79,'Kazakh','????? ????','kk','kaz','kaz','kaz',''),(80,'Khmer','?????, ????????, ?????????','km','khm','khm','khm',''),(81,'Kikuyu, Gikuyu','G?k?y?','ki','kik','kik','kik',''),(82,'Kinyarwanda','Ikinyarwanda','rw','kin','kin','kin',''),(83,'Kyrgyz','????????, ?????? ????','ky','kir','kir','kir',''),(84,'Komi','???? ???','kv','kom','kom','kom',''),(85,'Kongo','Kikongo','kg','kon','kon','kon',''),(86,'Korean','???, ???','ko','kor','kor','kor',''),(87,'Kurdish','Kurdî, ??????','ku','kur','kur','kur',''),(88,'Kwanyama, Kuanyama','Kuanyama','kj','kua','kua','kua',''),(89,'Latin','latine, lingua latina','la','lat','lat','lat','lats'),(90,'Luxembourgish','Lëtzebuergesch','lb','ltz','ltz','ltz',''),(91,'Ganda','Luganda','lg','lug','lug','lug',''),(92,'Limburgish','Limburgs','li','lim','lim','lim',''),(93,'Lingala','Lingála','ln','lin','lin','lin',''),(94,'Lao','???????','lo','lao','lao','lao',''),(95,'Lithuanian','lietuvi? kalba','lt','lit','lit','lit',''),(96,'Luba-Katanga','Tshiluba','lu','lub','lub','lub',''),(97,'Latvian','latviešu valoda','lv','lav','lav','lav',''),(98,'Manx','Gaelg, Gailck','gv','glv','glv','glv',''),(99,'Macedonian','?????????? ?????','mk','mkd','mac','mkd',''),(100,'Malagasy','fiteny malagasy','mg','mlg','mlg','mlg',''),(101,'Malay','bahasa Melayu, ???? ??????','ms','msa','may','msa',''),(102,'Malayalam','??????','ml','mal','mal','mal',''),(103,'Maltese','Malti','mt','mlt','mlt','mlt',''),(104,'M?ori','te reo M?ori','mi','mri','mao','mri',''),(105,'Marathi (Mar??h?)','?????','mr','mar','mar','mar',''),(106,'Marshallese','Kajin M?aje?','mh','mah','mah','mah',''),(107,'Mongolian','?????? ???','mn','mon','mon','mon ',''),(108,'Nauruan','Dorerin Naoero','na','nau','nau','nau',''),(109,'Navajo, Navaho','Diné bizaad','nv','nav','nav','nav',''),(110,'Northern Ndebele','isiNdebele','nd','nde','nde','nde',''),(111,'Nepali','??????','ne','nep','nep','nep',''),(112,'Ndonga','Owambo','ng','ndo','ndo','ndo',''),(113,'Norwegian Bokmål','Norsk bokmål','nb','nob','nob','nob',''),(114,'Norwegian Nynorsk','Norsk nynorsk','nn','nno','nno','nno',''),(115,'Norwegian','Norsk','no','nor','nor','nor ',''),(116,'Nuosu','??? Nuosuhxop','ii','iii','iii','iii',''),(117,'Southern Ndebele','isiNdebele','nr','nbl','nbl','nbl',''),(118,'Occitan','occitan, lenga d\"òc','oc','oci','oci','oci',''),(119,'Ojibwe, Ojibwa','????????','oj','oji','oji','oji ',''),(121,'Oromo','Afaan Oromoo','om','orm','orm','orm ',''),(122,'Oriya','?????','or','ori','ori','ori',''),(123,'Ossetian, Ossetic','???? æ????','os','oss','oss','oss',''),(124,'Panjabi, Punjabi','??????, ???????','pa','pan','pan','pan',''),(125,'P?li','????','pi','pli','pli','pli',''),(126,'Persian (Farsi)','????? ','fa','fas','per','fas ',''),(127,'Polish','j?zyk polski, polszczyzna','pl','pol','pol','pol','pols'),(128,'Pashto, Pushto','???? ','ps','pus','pus','pus ',''),(129,'Portuguese','Português','pt','por','por','por',''),(130,'Quechua','Runa Simi, Kichwa','qu','que','que','que 4',''),(131,'Romansh','Rumantsch grischun','rm','roh','roh','roh',''),(132,'Kirundi','Ikirundi','rn','run','run','run',''),(134,'Romanian','limba român?','ro','ron','rum','ron',''),(135,'Russian','???????','ru','rus','rus','rus',''),(136,'Sanskrit','?????????','sa','san','san','san',''),(137,'Sardinian','sardu','sc','srd','srd','srd ',''),(138,'Sindhi','??????, ????? ??????','sd','snd','snd','snd',''),(139,'Northern Sami','Davvisámegiella','se','sme','sme','sme',''),(140,'Samoan','gagana fa\"a Samoa','sm','smo','smo','smo',''),(141,'Sango','yângâ tî sängö','sg','sag','sag','sag',''),(142,'Serbian','?????? ?????','sr','srp','srp','srp',''),(143,'Gaelic','Gàidhlig','gd','gla','gla','gla',''),(144,'Shona','chiShona','sn','sna','sna','sna',''),(145,'Sinhala','?????','si','sin','sin','sin',''),(146,'Slovak','Slovenský jazyk','sk','slk','slo','slk',''),(147,'Slovene','Slovenš?ina','sl','slv','slv','slv',''),(148,'Somali','Soomaaliga, af Soomaali','so','som','som','som',''),(149,'Southern Sotho','Sesotho','st','sot','sot','sot',''),(150,'Spanish','Español','es','spa','spa','spa',''),(151,'Sundanese','Basa Sunda','su','sun','sun','sun',''),(152,'Swahili','Kiswahili','sw','swa','swa','swa ',''),(153,'Swati','SiSwati','ss','ssw','ssw','ssw',''),(154,'Swedish','Svenska','sv','swe','swe','swe',''),(155,'Tamil','?????','ta','tam','tam','tam',''),(156,'Telugu','??????','te','tel','tel','tel',''),(157,'Tajik','??????, toçik?, ???????','tg','tgk','tgk','tgk',''),(158,'Thai','???','th','tha','tha','tha',''),(159,'Tigrinya','????','ti','tir','tir','tir',''),(160,'Tibetan Standard, Tibetan, Central','???????','bo','bod','tib','bod',''),(161,'Turkmen','Türkmen','tk','tuk','tuk','tuk',''),(162,'Tagalog','Wikang Tagalog','tl','tgl','tgl','tgl',''),(163,'Tswana','Setswana','tn','tsn','tsn','tsn',''),(164,'Tonga','Faka Tonga','to','ton','ton','ton',''),(165,'Turkish','Türkçe','tr','tur','tur','tur',''),(166,'Tsonga','Xitsonga','ts','tso','tso','tso',''),(168,'Twi','Twi','tw','twi','twi','twi',''),(169,'Tahitian','Reo Tahiti','ty','tah','tah','tah',''),(170,'Uyghur','?????????, Uyghurche','ug','uig','uig','uig',''),(171,'Ukrainian','??????????','uk','ukr','ukr','ukr',''),(172,'Urdu','???? ','ur','urd','urd','urd',''),(173,'Uzbek','O?zbek, ?????, ???????','uz','uzb','uzb','uzb ',''),(174,'Venda','Tshiven?a','ve','ven','ven','ven',''),(175,'Vietnamese','Ti?ng Vi?t','vi','vie','vie','vie',''),(176,'Volapük','Volapük','vo','vol','vol','vol',''),(177,'Walloon','walon','wa','wln','wln','wln',''),(178,'Welsh','Cymraeg','cy','cym','wel','cym',''),(179,'Wolof','Wollof','wo','wol','wol','wol',''),(180,'Western Frisian','Frysk','fy','fry','fry','fry',''),(181,'Xhosa','isiXhosa','xh','xho','xho','xho',''),(182,'Yiddish','?????? ','yi','yid','yid','yid ',''),(183,'Yoruba','Yorùbá','yo','yor','yor','yor',''),(184,'Zhuang, Chuang','Sa? cue??','za','zha','zha','zha 6',''),(185,'Zulu','isiZulu','zu','zul','zul','zul','');


CREATE TABLE `email` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `email_from` text,
  `email_to` text,
  `email_cc` text,
  `email_bcc` text,
  `subject` text,
  `body` text,
  `created_on` datetime,
  `created_by` int(10),
  `sent_on` datetime,
  `ref_hash` varchar(100),
  PRIMARY KEY (`id`),
  KEY `demoapp_email_creator_fk_idx` (`created_by`),
  CONSTRAINT `demoapp_email_creator_fk_idx` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;



CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` char(3),
  `description` varchar(255),
  `IsFund` tinyint(4),
  `IsComplimentary` tinyint(4),
  `IsMetal` tinyint(4),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
INSERT INTO `currency` VALUES (1,'AED','United Arab Emirates dirham',0,0,0),(2,'AFN','Afghani',0,0,0),(3,'ALL','Albanian Lek',0,0,0),(4,'AMD','Armenian Dram',0,0,0),(5,'ANG','Netherlands Antillian Guilder',0,0,0),(6,'AOA','Kwanza',0,0,0),(7,'ARS','Argentine Peso',0,0,0),(8,'AUD','Australian Dollar',0,0,0),(9,'AWG','Aruban Guilder',0,0,0),(10,'AZN','Azerbaijanian Manat',0,0,0),(11,'BAM','Convertible Marks',0,0,0),(12,'BBD','Barbados Dollar',0,0,0),(13,'BDT','Bangladeshi Taka',0,0,0),(14,'BGN','Bulgarian Lev',0,0,0),(15,'BHD','Bahraini Dinar',0,0,0),(16,'BIF','Burundian Franc',0,0,0),(17,'BMD','Bermudian Dollar',0,0,0),(18,'BND','Brunei Dollar',0,0,0),(19,'BOB','Boliviano',0,0,0),(20,'BOV','Bolivian Mvdol',1,0,0),(21,'BRL','Brazilian Real',0,0,0),(22,'BSD','Bahamian Dollar',0,0,0),(23,'BTN','Ngultrum',0,0,0),(24,'BWP','Pula',0,0,0),(25,'BYR','Belarussian Ruble',0,0,0),(26,'BZD','Belize Dollar',0,0,0),(27,'CAD','Canadian Dollar',0,0,0),(28,'CDF','Franc Congolais',0,0,0),(29,'CHE','WIR Euro',0,1,0),(30,'CHF','Swiss Franc',0,0,0),(31,'CHW','WIR Franc',0,1,0),(32,'CLF','Unidades de formento',1,0,0),(33,'CLP','Chilean Peso',0,0,0),(34,'CNY','Yuan Renminbi',0,0,0),(35,'COP','Colombian Peso',0,0,0),(36,'COU','Unidad de Valor Real',0,0,0),(37,'CRC','Costa Rican Colon',0,0,0),(38,'CUP','Cuban Peso',0,0,0),(39,'CVE','Cape Verde Escudo',0,0,0),(40,'CYP','Cyprus Pound',0,0,0),(41,'CZK','Czech Koruna',0,0,0),(42,'DJF','Djibouti Franc',0,0,0),(43,'DKK','Danish Krone',0,0,0),(44,'DOP','Dominican Peso',0,0,0),(45,'DZD','Algerian Dinar',0,0,0),(46,'EEK','Kroon',0,0,0),(47,'EGP','Egyptian Pound',0,0,0),(48,'ERN','Nakfa',0,0,0),(49,'ETB','Ethiopian Birr',0,0,0),(50,'EUR','Euro',0,0,0),(51,'FJD','Fiji Dollar',0,0,0),(52,'FKP','Falkland Islands Pound',0,0,0),(53,'GBP','Pound Sterling',0,0,0),(54,'GEL','Lari',0,0,0),(55,'GHS','Cedi',0,0,0),(56,'GIP','Gibraltar pound',0,0,0),(57,'GMD','Dalasi',0,0,0),(58,'GNF','Guinea Franc',0,0,0),(59,'GTQ','Quetzal',0,0,0),(60,'GYD','Guyana Dollar',0,0,0),(61,'HKD','Hong Kong Dollar',0,0,0),(62,'HNL','Lempira',0,0,0),(63,'HRK','Croatian Kuna',0,0,0),(64,'HTG','Haiti Gourde',0,0,0),(65,'HUF','Forint',0,0,0),(66,'IDR','Rupiah',0,0,0),(67,'ILS','New Israeli Shekel',0,0,0),(68,'INR','Indian Rupee',0,0,0),(69,'IQD','Iraqi Dinar',0,0,0),(70,'IRR','Iranian Rial',0,0,0),(71,'ISK','Iceland Krona',0,0,0),(72,'JMD','Jamaican Dollar',0,0,0),(73,'JOD','Jordanian Dinar',0,0,0),(74,'JPY','Japanese yen',0,0,0),(75,'KES','Kenyan Shilling',0,0,0),(76,'KGS','Som',0,0,0),(77,'KHR','Riel',0,0,0),(78,'KMF','Comoro Franc',0,0,0),(79,'KPW','North Korean Won',0,0,0),(80,'KRW','South Korean Won',0,0,0),(81,'KWD','Kuwaiti Dinar',0,0,0),(82,'KYD','Cayman Islands Dollar',0,0,0),(83,'KZT','Tenge',0,0,0),(84,'LAK','Kip',0,0,0),(85,'LBP','Lebanese Pound',0,0,0),(86,'LKR','Sri Lanka Rupee',0,0,0),(87,'LRD','Liberian Dollar',0,0,0),(88,'LSL','Loti',0,0,0),(89,'LTL','Lithuanian Litas',0,0,0),(90,'LVL','Latvian Lats',0,0,0),(91,'LYD','Libyan Dinar',0,0,0),(92,'MAD','Moroccan Dirham',0,0,0),(93,'MDL','Moldovan Leu',0,0,0),(94,'MGA','Malagasy Ariary',0,0,0),(95,'MKD','Denar',0,0,0),(96,'MMK','Kyat',0,0,0),(97,'MNT','Tugrik',0,0,0),(98,'MOP','Pataca',0,0,0),(99,'MRO','Ouguiya',0,0,0),(100,'MTL','Maltese Lira',0,0,0),(101,'MUR','Mauritius Rupee',0,0,0),(102,'MVR','Rufiyaa',0,0,0),(103,'MWK','Kwacha',0,0,0),(104,'MXN','Mexican Peso',0,0,0),(105,'MXV','Mexican Unidad de Inversion (UDI)',1,0,0),(106,'MYR','Malaysian Ringgit',0,0,0),(107,'MZN','Metical',0,0,0),(108,'NAD','Namibian Dollar',0,0,0),(109,'NGN','Naira',0,0,0),(110,'NIO','Cordoba Oro',0,0,0),(111,'NOK','Norwegian Krone',0,0,0),(112,'NPR','Nepalese Rupee',0,0,0),(113,'NZD','New Zealand Dollar',0,0,0),(114,'OMR','Rial Omani',0,0,0),(115,'PAB','Balboa',0,0,0),(116,'PEN','Nuevo Sol',0,0,0),(117,'PGK','Kina',0,0,0),(118,'PHP','Philippine Peso',0,0,0),(119,'PKR','Pakistan Rupee',0,0,0),(120,'PLN','Zloty',0,0,0),(121,'PYG','Guarani',0,0,0),(122,'QAR','Qatari Rial',0,0,0),(123,'RON','Romanian New Leu',0,0,0),(124,'RSD','Serbian Dinar',0,0,0),(125,'RUB','Russian Ruble',0,0,0),(126,'RWF','Rwanda Franc',0,0,0),(127,'SAR','Saudi Riyal',0,0,0),(128,'SBD','Solomon Islands Dollar',0,0,0),(129,'SCR','Seychelles Rupee',0,0,0),(130,'SDG','Sudanese Pound',0,0,0),(131,'SEK','Swedish Krona',0,0,0),(132,'SGD','Singapore Dollar',0,0,0),(133,'SHP','Saint Helena Pound',0,0,0),(134,'SKK','Slovak Koruna',0,0,0),(135,'SLL','Leone',0,0,0),(136,'SOS','Somali Shilling',0,0,0),(137,'SRD','Surinam Dollar',0,0,0),(138,'STD','Dobra',0,0,0),(139,'SYP','Syrian Pound',0,0,0),(140,'SZL','Lilangeni',0,0,0),(141,'THB','Baht',0,0,0),(142,'TJS','Somoni',0,0,0),(143,'TMM','Manat',0,0,0),(144,'TND','Tunisian Dinar',0,0,0),(145,'TOP','Pa\'anga',0,0,0),(146,'TRY','New Turkish Lira',0,0,0),(147,'TTD','Trinidad and Tobago Dollar',0,0,0),(148,'TWD','New Taiwan Dollar',0,0,0),(149,'TZS','Tanzanian Shilling',0,0,0),(150,'UAH','Hryvnia',0,0,0),(151,'UGX','Uganda Shilling',0,0,0),(152,'USD','US Dollar',0,0,0),(153,'XAF','CFA Franc BEAC',0,0,0),(154,'XAG','Silver (one troy ounce)',0,0,1),(155,'XAU','Gold (one troy ounce)',0,0,1),(156,'XCD','East Carribean Dollar',0,0,0),(157,'XPT','Palladium (one troy ounce)',0,0,1),(158,'XXX','No Currency',0,0,0);

DROP TABLE IF EXISTS `grid`;
CREATE TABLE `grid` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `grid_name` varchar(255),
    `title` text,
    `params_list` longtext,
    `expected_params_count` int(11),
    `column_list` longtext,
    `sql_query` text,
    `settings` text,
    `rows_per_page` int,
    `created_by` int(11),
    `created_on` datetime,
    `updated_by` int(11),
    `updated_on` datetime,
    PRIMARY KEY (`id`),
    UNIQUE KEY `demoapp_grid_name_UNIQUE` (`grid_name`),
    KEY `demoapp_grid_created_by_id_fk` (`created_by`),
    KEY `demoapp_grid_updated_by_id_fk` (`updated_by`),
    CONSTRAINT `demoapp_grid_created_by_id_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
    CONSTRAINT `demoapp_grid_updated_by_id_fk` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;

  
CREATE TABLE laf_schema_object (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `demoapp_laf_schema_object_email_uq_idx` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;


CREATE TABLE change_log (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	laf_schema_object INTEGER,
	field_name VARCHAR(255),
	old_value text,
	new_value text,
	created_on DATETIME,
	created_by integer,
	PRIMARY KEY (`id`),
	KEY `demoapp_change_log_person_fd_idx` (`created_by`),
	CONSTRAINT demoapp_change_log_person_fd_idx FOREIGN KEY (created_by) REFERENCES person(id)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;


DROP TABLE IF EXISTS routing_table;
CREATE TABLE `routing_table` (
    `id` int(8) NOT NULL AUTO_INCREMENT,
    `parent_id` int(8),
    `unique_name` varchar(55),
    `label` varchar(255),
    `icon` varchar(100),
    `page_file` varchar(150),
    `is_default` int(1),
    `is_visible` int(1),
    `ordinal` int(4),
    `is_standalone` int(1),
    `requires_login` int(1),
    `actions` text,
    PRIMARY KEY (id),
    UNIQUE KEY `demoapp_rt_email_uq_idx` (unique_name),
    KEY `demoapp_routing_table_parent_id_fk1` (parent_id),
    KEY `demoapp_routing_table_visible_ix2` (`is_visible`),
    KEY `demoapp_routing_table_is_default_fk1_idx1` (`is_default`),
    CONSTRAINT demoapp_routing_table_parent_id_fk1 FOREIGN KEY (parent_id) REFERENCES routing_table(id),
    CONSTRAINT demoapp_routing_table_visible_ix2 FOREIGN KEY (is_visible) REFERENCES yes_or_no(id),
    CONSTRAINT demoapp_routing_table_is_default_fk1_idx1 FOREIGN KEY (is_visible) REFERENCES yes_or_no(id)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;
ALTER TABLE routing_table AUTO_INCREMENT = 100000;



CREATE TABLE `email_attachment` (
    `email_id` int(14) NOT NULL,
    `document_id` int(14) NOT NULL,
    PRIMARY KEY (`email_id`,`document_id`),
    KEY `email_attachment_fk1` (`document_id`),
    CONSTRAINT `email_attachment_fk1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`),
    CONSTRAINT `email_attachment_fk2` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_general_ci;



CREATE TABLE `dummy_table` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `varchar_field45` VARCHAR(45) NULL,
    `text_field` TEXT NULL,
    `integer_field` INT NULL,
    `decimal_field` DECIMAL(8,2) NULL,
    `date_field` DATE NULL,
    `datetime_field` DATETIME NULL,
    `time_field` TIME NULL,
    `float_field` FLOAT NULL,
    `json_field` JSON NULL,
    `null_field` TEXT NULL,
    `empty_field` TEXT NULL,
    `unique_field` TEXT NULL,
    `parent_id` INT NULL,
    `deleted` INT NULL,
    KEY `demoapp_dt_parent_id_fk` (`parent_id`),
    CONSTRAINT `demoapp_dt_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `dummy_table` (`id`),
    PRIMARY KEY (`id`)
);
CREATE UNIQUE INDEX `demoapp_dt_unique_field_UNIQUE` ON dummy_table(`unique_field`(255) ASC);




#
# creating missing foreign keys at the end
# since some tables do nott exist at that point
#

ALTER TABLE person ADD CONSTRAINT demoapp_person_profile_pic_id_fk FOREIGN KEY (profile_picture_id) REFERENCES document(id);


##
## insert default entries in routing table
##
INSERT INTO routing_table (id, unique_name, label, page_file, is_default, is_visible, ordinal, requires_login) VALUES
(1, 'home', 'Home', 'home.page', 1, 0, 0, 0)
,(2, 'register', 'Register', 'register.page', 0, 0, 0, 0)
,(3, 'login', 'Login', 'login.page', 0, 0, 0, 0)
,(4, 'logout', 'Log Out', 'login.page', 0, 0, 0, 0)
,(5, 'reset_password', 'Reset Password', 'reset_password.page', 0, 0, 0, 0)
,(6, 'change_password', 'Change Password', 'change_password.page', 0, 0, 0, 1)
,(7, 'confirm_registration', 'Confirm Registration', 'register.page', 0, 0, 0, 0)
,(8, '404', '404', 'error.page', 0, 0, 0, 0)
,(9, 'account_settings', 'Account Settings', 'account_settings.page', 0, 0, 0, 1)
,(10, 'person_list', 'Person List', 'person_list.page', 0, 0, 0, 0)
,(11, 'group_list', 'Group List', 'person_list.page', 0, 0, 0, 0)
,(12, 'role_list', 'Role List', 'group_list.page', 0, 0, 0, 0)
,(13, 'self_update', 'Self Update', 'self_update.page', 0, 0, 0, 0)
,(14, 'process_list', 'Process List', 'process_list.page', 0, 0, 0, 0)
,(15, 'grid_list', 'Grid List', 'grid_list.page', 0, 0, 0, 0)
,(16, 'generator', 'Generator', 'generator.page', 0, 1, 999999, 0)
,(17, 'reload_menu', 'reload_menu', 'reload_menu.page', 0, 0, 0, 0)
,(18, 'routing_table', 'Routing table', 'routing_table.page', 0, 1, 9, 0)
;


#reset autoincrement to a good starting value
ALTER TABLE routing_table AUTO_INCREMENT = 1000;




CREATE TABLE `role` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `label` varchar(255) DEFAULT NULL,
        `description` text DEFAULT NULL,
        `record_status_id` int(11) DEFAULT NULL,
        `unique_name` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `role_uq_fld_ix2` (`unique_name`),
        KEY `role_record_status_id_fk_idx` (`record_status_id`),
        CONSTRAINT `role_record_status_id_fk_idx` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  

CREATE TABLE `group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` varchar(255),
  `description` text,
  `record_status_id` INT NULL,
  PRIMARY KEY (`id`),
  KEY `group_record_status_id_fk_idx` (`record_status_id`),
  CONSTRAINT `group_record_status_id_fk` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`));


CREATE TABLE `person_group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  person_id INT NOT NULL,
  group_id INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_group_person_id_fk` (`person_id`),
  KEY `person_group_group_id_fk` (`group_id`),
  CONSTRAINT `person_group_person_id_fk` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `person_group_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
  );

CREATE TABLE `group_role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  role_id INT NOT NULL,
  group_id INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_role_role_id_fk` (`role_id`),
  KEY `group_role_group_id_fk` (`group_id`),
  CONSTRAINT `group_role_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `group_role_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
  );
  
  CREATE TABLE `group_routing_table` (
  `id` INT NOT NULL AUTO_INCREMENT,
  routing_table_id INT NOT NULL,
  group_id INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_routing_table_routing_table_id_fk` (`routing_table_id`),
  KEY `group_routing_table_group_id_fk` (`group_id`),
  CONSTRAINT `group_routing_table_routing_table_id_fk` FOREIGN KEY (`routing_table_id`) REFERENCES `routing_table` (`id`),
  CONSTRAINT `group_routing_table_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
  );


CREATE TABLE ticket_status
    (
        id INT AUTO_INCREMENT
      , label VARCHAR(255)
      , PRIMARY KEY(id)
    )
    ENGINE = InnoDB;


CREATE TABLE ticket_category
    (
        id INT AUTO_INCREMENT
      , label VARCHAR(255)
      , PRIMARY KEY(id)
    )
    ENGINE = InnoDB;

CREATE TABLE ticket
    (
        id INT AUTO_INCREMENT
      , subject TEXT
      , body TEXT
      , created_by INTEGER
      , created_on DATETIME
      , updated_by INT
      , updated_on DATETIME
      , approved_by INT
      , approved_on DATETIME
      , priority INT
      , resolution TEXT
      , assigned_to INT
      , ticket_status_id INT
      , ticket_category_id INT
      , PRIMARY KEY(id)
      , KEY ticket_created_by_fk1 (created_by)
      , KEY ticket_updated_by_fk2 (updated_by)
      , KEY ticket_approved_by_fk3 (approved_by)
      , KEY ticket_assigned_to_fk4 (assigned_to)
      , KEY ticket_ticket_status_fk5 (ticket_status_id)
      , KEY ticket_ticket_category_fk6 (ticket_category_id)
      
      , CONSTRAINT ticket_created_by_fk1 FOREIGN KEY(created_by) REFERENCES `person`(`id`)
      , CONSTRAINT ticket_updated_by_fk2 FOREIGN KEY(updated_by) REFERENCES `person`(id)
      , CONSTRAINT ticket_approved_by_fk3 FOREIGN KEY(approved_by) REFERENCES `person`(`id`)
      , CONSTRAINT ticket_assigned_to_fk4 FOREIGN KEY(assigned_to) REFERENCES `person`(`id`)
      , CONSTRAINT ticket_ticket_status_fk5 FOREIGN KEY(ticket_status_id) REFERENCES `ticket_status`(`id`)
      , CONSTRAINT ticket_ticket_category_fk6 FOREIGN KEY(ticket_category_id) REFERENCES `ticket_category`(`id`)
    )
    ENGINE = InnoDB;
	
INSERT INTO ticket_category VALUES(null, 'Bug/Error'), (null, 'Modification to current feature'), (null, 'New Feature Request'), (null, 'Bulk Import/Export'), (null, 'Permissions update');
INSERT INTO ticket_status VALUES(null, 'Open'), (null, 'In Progress'), (null, 'Ready to Test'), (null, 'Completed'), (null, 'Declined'), (null, 'Pending Approval');


ALTER TABLE `ticket` 
ADD COLUMN `requested_by` INT NULL AFTER `ticket_category_id`,
ADD INDEX `ticket_requested_by_fk1_idx` (`approved_on`);
;
ALTER TABLE `ticket` 
ADD CONSTRAINT `ticket_requested_by_fk1`
  FOREIGN KEY (`requested_by`)
  REFERENCES `person` (`id`);


CREATE TABLE ticket_priority
    (
        id INT AUTO_INCREMENT
      , label VARCHAR(255)
      , PRIMARY KEY(id)
    )
    ENGINE = InnoDB;
    
    alter table ticket drop column priority;

alter table ticket
	add ticket_priority_id int null;

alter table ticket
	add constraint ticket_t_priority_id_fk
		foreign key (ticket_priority_id) references ticket_priority (id);

INSERT INTO ticket_priority VALUES 
(null, 'Low'),
(null, 'Medium'),
(null, 'High');
update yes_or_no set id=0 where id = 2





