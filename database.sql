-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1,	'admin@admin.com',	'$2y$10$qIv8oZ0NaQ1Ht1g4P6gnDeev6XR1hK8jq1lwqnyAXU8oIkIpeLVGe');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `salt` varchar(150) DEFAULT NULL,
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `password`, `salt`, `phone`, `address`, `city`, `country`) VALUES
(1,	'Carine',	'Schmitt',	'test@gmail.com',	'$2y$10$JHNB7dWic2KhKz3KBASiGuRByRi1FUMVwUirNcll.eQQg5nv50nCy',	'3YBI7',	'40.32.2555',	'54, rue Royale',	'Nantes',	'France'),
(2,	'Jean',	'King',	NULL,	NULL,	NULL,	'7025551838',	'8489 Strong St.',	'Las Vegas',	'USA'),
(3,	'Peter',	'Ferguson',	NULL,	NULL,	NULL,	'03 9520 4555',	'636 St Kilda Road',	'Melbourne',	'Australia'),
(4,	'Janine ',	'Labrune',	NULL,	NULL,	NULL,	'40.67.8555',	'67, rue des Cinquante Otages',	'Nantes',	'France'),
(5,	'Jonas ',	'Bergulfsen',	NULL,	NULL,	NULL,	'07-98 9555',	'Erling Skakkes gate 78',	'Stavern',	'Norway'),
(6,	'Susan',	'Nelson',	NULL,	NULL,	NULL,	'4155551450',	'5677 Strong St.',	'San Rafael',	'USA'),
(7,	'Zbyszek ',	'Piestrzeniewicz',	NULL,	NULL,	NULL,	'(26) 642-7555',	'ul. Filtrowa 68',	'Warszawa',	'Poland'),
(8,	'Roland',	'Keitel',	NULL,	NULL,	NULL,	'+49 69 66 90 2555',	'Lyonerstr. 34',	'Frankfurt',	'Germany'),
(9,	'Julie',	'Murphy',	NULL,	NULL,	NULL,	'6505555787',	'5557 North Pendale Street',	'San Francisco',	'USA'),
(10,	'Kwai',	'Lee',	NULL,	NULL,	NULL,	'2125557818',	'897 Long Airport Avenue',	'NYC',	'USA'),
(11,	'Diego ',	'Freyre',	NULL,	NULL,	NULL,	'(91) 555 94 44',	'C/ Moralzarzal, 86',	'Madrid',	'Spain'),
(12,	'Christina ',	'Berglund',	NULL,	NULL,	NULL,	'0921-12 3555',	'Berguvsvägen  8',	'Luleå',	'Sweden'),
(13,	'Jytte ',	'Petersen',	NULL,	NULL,	NULL,	'31 12 3555',	'Vinbæltet 34',	'Kobenhavn',	'Denmark'),
(14,	'Mary ',	'Saveley',	NULL,	NULL,	NULL,	'78.32.5555',	'2, rue du Commerce',	'Lyon',	'France'),
(15,	'Eric',	'Natividad',	NULL,	NULL,	NULL,	'+65 221 7555',	'Bronz Sok.',	'Singapore',	'Singapore'),
(16,	'Jeff',	'Young',	NULL,	NULL,	NULL,	'2125557413',	'4092 Furth Circle',	'NYC',	'USA'),
(17,	'Kelvin',	'Leong',	NULL,	NULL,	NULL,	'2155551555',	'7586 Pompton St.',	'Allentown',	'USA'),
(18,	'Juri',	'Hashimoto',	NULL,	NULL,	NULL,	'6505556809',	'9408 Furth Circle',	'Burlingame',	'USA'),
(19,	'Wendy',	'Victorino',	NULL,	NULL,	NULL,	'+65 224 1555',	'106 Linden Road Sandown',	'Singapore',	'Singapore'),
(20,	'Veysel',	'Oeztan',	NULL,	NULL,	NULL,	'+47 2267 3215',	'Brehmen St. 121',	'Bergen',	'Norway  '),
(21,	'Keith',	'Franco',	NULL,	NULL,	NULL,	'2035557845',	'149 Spinnaker Dr.',	'New Haven',	'USA'),
(22,	'Isabel ',	'de Castro',	NULL,	NULL,	NULL,	'(1) 356-5555',	'Estrada da saúde n. 58',	'Lisboa',	'Portugal'),
(23,	'Martine ',	'Rancé',	NULL,	NULL,	NULL,	'20.16.1555',	'184, chaussée de Tournai',	'Lille',	'France'),
(24,	'Marie',	'Bertrand',	NULL,	NULL,	NULL,	'(1) 42.34.2555',	'265, boulevard Charonne',	'Paris',	'France'),
(25,	'Jerry',	'Tseng',	NULL,	NULL,	NULL,	'6175555555',	'4658 Baden Av.',	'Cambridge',	'USA'),
(26,	'Julie',	'King',	NULL,	NULL,	NULL,	'2035552570',	'25593 South Bay Ln.',	'Bridgewater',	'USA'),
(27,	'Mory',	'Kentary',	NULL,	NULL,	NULL,	'+81 06 6342 5555',	'1-6-20 Dojima',	'Kita-ku',	'Japan'),
(28,	'Michael',	'Frick',	NULL,	NULL,	NULL,	'2125551500',	'2678 Kingston Rd.',	'NYC',	'USA'),
(29,	'Matti',	'Karttunen',	NULL,	NULL,	NULL,	'90-224 8555',	'Keskuskatu 45',	'Helsinki',	'Finland'),
(30,	'Rachel',	'Ashworth',	NULL,	NULL,	NULL,	'(171) 555-1555',	'Fauntleroy Circus',	'Manchester',	'UK'),
(31,	'Dean',	'Cassidy',	NULL,	NULL,	NULL,	'+353 1862 1555',	'25 Maiden Lane',	'Dublin',	'Ireland'),
(32,	'Leslie',	'Taylor',	NULL,	NULL,	NULL,	'6175558428',	'16780 Pompton St.',	'Brickhaven',	'USA'),
(33,	'Elizabeth',	'Devon',	NULL,	NULL,	NULL,	'(171) 555-2282',	'12, Berkeley Gardens Blvd',	'Liverpool',	'UK'),
(34,	'Yoshi ',	'Tamuri',	NULL,	NULL,	NULL,	'(604) 555-3392',	'1900 Oak St.',	'Vancouver',	'Canada'),
(35,	'Miguel',	'Barajas',	NULL,	NULL,	NULL,	'6175557555',	'7635 Spinnaker Dr.',	'Brickhaven',	'USA'),
(36,	'Julie',	'Young',	NULL,	NULL,	NULL,	'6265557265',	'78934 Hillside Dr.',	'Pasadena',	'USA'),
(37,	'Brydey',	'Walker',	NULL,	NULL,	NULL,	'+612 9411 1555',	'Suntec Tower Three',	'Singapore',	'Singapore'),
(38,	'Frédérique ',	'Citeaux',	NULL,	NULL,	NULL,	'88.60.1555',	'24, place Kléber',	'Strasbourg',	'France'),
(39,	'Mike',	'Gao',	NULL,	NULL,	NULL,	'+852 2251 1555',	'Bank of China Tower',	'Central Hong Kong',	'Hong Kong'),
(40,	'Eduardo ',	'Saavedra',	NULL,	NULL,	NULL,	'(93) 203 4555',	'Rambla de Cataluña, 23',	'Barcelona',	'Spain'),
(41,	'Mary',	'Young',	NULL,	NULL,	NULL,	'3105552373',	'4097 Douglas Av.',	'Glendale',	'USA'),
(42,	'Horst ',	'Kloss',	NULL,	NULL,	NULL,	'0372-555188',	'Taucherstraße 10',	'Cunewalde',	'Germany'),
(43,	'Palle',	'Ibsen',	NULL,	NULL,	NULL,	'86 21 3555',	'Smagsloget 45',	'Århus',	'Denmark'),
(44,	'Jean ',	'Fresnière',	NULL,	NULL,	NULL,	'(514) 555-8054',	'43 rue St. Laurent',	'Montréal',	'Canada'),
(45,	'Alejandra ',	'Camino',	NULL,	NULL,	NULL,	'(91) 745 6555',	'Gran Vía, 1',	'Madrid',	'Spain'),
(46,	'Valarie',	'Thompson',	NULL,	NULL,	NULL,	'7605558146',	'361 Furth Circle',	'San Diego',	'USA'),
(47,	'Helen ',	'Bennett',	NULL,	NULL,	NULL,	'(198) 555-8888',	'Garden House',	'Cowes',	'UK'),
(48,	'Annette ',	'Roulet',	NULL,	NULL,	NULL,	'61.77.6555',	'1 rue Alsace-Lorraine',	'Toulouse',	'France'),
(49,	'Renate ',	'Messner',	NULL,	NULL,	NULL,	'069-0555984',	'Magazinweg 7',	'Frankfurt',	'Germany'),
(50,	'Paolo ',	'Accorti',	NULL,	NULL,	NULL,	'011-4988555',	'Via Monte Bianco 34',	'Torino',	'Italy'),
(51,	'Daniel',	'Da Silva',	NULL,	NULL,	NULL,	'+33 1 46 62 7555',	'27 rue du Colonel Pierre Avia',	'Paris',	'France'),
(52,	'Daniel ',	'Tonini',	NULL,	NULL,	NULL,	'30.59.8555',	'67, avenue de l\'Europe',	'Versailles',	'France'),
(53,	'Henriette ',	'Pfalzheim',	NULL,	NULL,	NULL,	'0221-5554327',	'Mehrheimerstr. 369',	'Köln',	'Germany'),
(54,	'Elizabeth ',	'Lincoln',	NULL,	NULL,	NULL,	'(604) 555-4555',	'23 Tsawassen Blvd.',	'Tsawassen',	'Canada'),
(55,	'Peter ',	'Franken',	NULL,	NULL,	NULL,	'089-0877555',	'Berliner Platz 43',	'München',	'Germany'),
(56,	'Anna',	'O\'Hara',	NULL,	NULL,	NULL,	'02 9936 8555',	'201 Miller Street',	'North Sydney',	'Australia'),
(57,	'Giovanni ',	'Rovelli',	NULL,	NULL,	NULL,	'035-640555',	'Via Ludovico il Moro 22',	'Bergamo',	'Italy'),
(58,	'Adrian',	'Huxley',	NULL,	NULL,	NULL,	'+61 2 9495 8555',	'Monitor Money Building',	'Chatswood',	'Australia'),
(59,	'Marta',	'Hernandez',	NULL,	NULL,	NULL,	'6175558555',	'39323 Spinnaker Dr.',	'Cambridge',	'USA'),
(60,	'Ed',	'Harrison',	NULL,	NULL,	NULL,	'+41 26 425 50 01',	'Rte des Arsenaux 41 ',	'Fribourg',	'Switzerland'),
(61,	'Mihael',	'Holz',	NULL,	NULL,	NULL,	'0897-034555',	'Grenzacherweg 237',	'Genève',	'Switzerland'),
(62,	'Jan',	'Klaeboe',	NULL,	NULL,	NULL,	'+47 2212 1555',	'Drammensveien 126A',	'Oslo',	'Norway  '),
(63,	'Bradley',	'Schuyler',	NULL,	NULL,	NULL,	'+31 20 491 9555',	'Kingsfordweg 151',	'Amsterdam',	'Netherlands'),
(64,	'Mel',	'Andersen',	NULL,	NULL,	NULL,	'030-0074555',	'Obere Str. 57',	'Berlin',	'Germany'),
(65,	'Pirkko',	'Koskitalo',	NULL,	NULL,	NULL,	'981-443655',	'Torikatu 38',	'Oulu',	'Finland'),
(66,	'Catherine ',	'Dewey',	NULL,	NULL,	NULL,	'(02) 5554 67',	'Rue Joseph-Bens 532',	'Bruxelles',	'Belgium'),
(67,	'Steve',	'Frick',	NULL,	NULL,	NULL,	'9145554562',	'3758 North Pendale Street',	'White Plains',	'USA'),
(68,	'Wing',	'Huang',	NULL,	NULL,	NULL,	'5085559555',	'4575 Hillside Dr.',	'New Bedford',	'USA'),
(69,	'Julie',	'Brown',	NULL,	NULL,	NULL,	'6505551386',	'7734 Strong St.',	'San Francisco',	'USA'),
(70,	'Mike',	'Graham',	NULL,	NULL,	NULL,	'+64 9 312 5555',	'162-164 Grafton Road',	'Auckland  ',	'New Zealand'),
(71,	'Ann ',	'Brown',	NULL,	NULL,	NULL,	'(171) 555-0297',	'35 King George',	'London',	'UK'),
(72,	'William',	'Brown',	NULL,	NULL,	NULL,	'2015559350',	'7476 Moss Rd.',	'Newark',	'USA'),
(73,	'Ben',	'Calaghan',	NULL,	NULL,	NULL,	'61-7-3844-6555',	'31 Duncan St. West End',	'South Brisbane',	'Australia'),
(74,	'Kalle',	'Suominen',	NULL,	NULL,	NULL,	'+358 9 8045 555',	'Software Engineering Center',	'Espoo',	'Finland'),
(75,	'Philip ',	'Cramer',	NULL,	NULL,	NULL,	'0555-09555',	'Maubelstr. 90',	'Brandenburg',	'Germany'),
(76,	'Francisca',	'Cervantes',	NULL,	NULL,	NULL,	'2155554695',	'782 First Street',	'Philadelphia',	'USA'),
(77,	'Jesus',	'Fernandez',	NULL,	NULL,	NULL,	'+34 913 728 555',	'Merchants House',	'Madrid',	'Spain'),
(78,	'Brian',	'Chandler',	NULL,	NULL,	NULL,	'2155554369',	'6047 Douglas Av.',	'Los Angeles',	'USA'),
(79,	'Patricia ',	'McKenna',	NULL,	NULL,	NULL,	'2967 555',	'8 Johnstown Road',	'Cork',	'Ireland'),
(80,	'Laurence ',	'Lebihan',	NULL,	NULL,	NULL,	'91.24.4555',	'12, rue des Bouchers',	'Marseille',	'France'),
(81,	'Paul ',	'Henriot',	NULL,	NULL,	NULL,	'26.47.1555',	'59 rue de l\'Abbaye',	'Reims',	'France'),
(82,	'Armand',	'Kuger',	NULL,	NULL,	NULL,	'+27 21 550 3555',	'1250 Pretorius Street',	'Hatfield',	'South Africa'),
(83,	'Wales',	'MacKinlay',	NULL,	NULL,	NULL,	'64-9-3763555',	'199 Great North Road',	'Auckland',	'New Zealand'),
(84,	'Karin',	'Josephs',	NULL,	NULL,	NULL,	'0251-555259',	'Luisenstr. 48',	'Münster',	'Germany'),
(85,	'Juri',	'Yoshido',	NULL,	NULL,	NULL,	'6175559555',	'8616 Spinnaker Dr.',	'Boston',	'USA'),
(86,	'Dorothy',	'Young',	NULL,	NULL,	NULL,	'6035558647',	'2304 Long Airport Avenue',	'Nashua',	'USA'),
(87,	'Lino ',	'Rodriguez',	NULL,	NULL,	NULL,	'(1) 354-2555',	'Jardim das rosas n. 32',	'Lisboa',	'Portugal'),
(88,	'Braun',	'Urs',	NULL,	NULL,	NULL,	'0452-076555',	'Hauptstr. 29',	'Bern',	'Switzerland'),
(89,	'Allen',	'Nelson',	NULL,	NULL,	NULL,	'6175558555',	'7825 Douglas Av.',	'Brickhaven',	'USA'),
(90,	'Pascale ',	'Cartrain',	NULL,	NULL,	NULL,	'(071) 23 67 2555',	'Boulevard Tirou, 255',	'Charleroi',	'Belgium'),
(91,	'Georg ',	'Pipps',	NULL,	NULL,	NULL,	'6562-9555',	'Geislweg 14',	'Salzburg',	'Austria'),
(92,	'Arnold',	'Cruz',	NULL,	NULL,	NULL,	'+63 2 555 3587',	'15 McCallum Street',	'Makati City',	'Philippines'),
(93,	'Maurizio ',	'Moroni',	NULL,	NULL,	NULL,	'0522-556555',	'Strada Provinciale 124',	'Reggio Emilia',	'Italy'),
(94,	'Akiko',	'Shimamura',	NULL,	NULL,	NULL,	'+81 3 3584 0555',	'2-2-8 Roppongi',	'Minato-ku',	'Japan'),
(95,	'Dominique',	'Perrier',	NULL,	NULL,	NULL,	'(1) 47.55.6555',	'25, rue Lauriston',	'Paris',	'France'),
(96,	'Rita ',	'Müller',	NULL,	NULL,	NULL,	'0711-555361',	'Adenauerallee 900',	'Stuttgart',	'Germany'),
(97,	'Sarah',	'McRoy',	NULL,	NULL,	NULL,	'04 499 9555',	'101 Lambton Quay',	'Wellington',	'New Zealand'),
(98,	'Michael',	'Donnermeyer',	NULL,	NULL,	NULL,	' +49 89 61 08 9555',	'Hansastr. 15',	'Munich',	'Germany'),
(99,	'Maria',	'Hernandez',	NULL,	NULL,	NULL,	'2125558493',	'5905 Pompton St.',	'NYC',	'USA'),
(100,	'Alexander ',	'Feuer',	NULL,	NULL,	NULL,	'0342-555176',	'Heerstr. 22',	'Leipzig',	'Germany'),
(101,	'Dan',	'Lewis',	NULL,	NULL,	NULL,	'2035554407',	'2440 Pompton St.',	'Glendale',	'USA'),
(102,	'Martha',	'Larsson',	NULL,	NULL,	NULL,	'0695-34 6555',	'Åkergatan 24',	'Bräcke',	'Sweden'),
(103,	'Sue',	'Frick',	NULL,	NULL,	NULL,	'4085553659',	'3086 Ingle Ln.',	'San Jose',	'USA'),
(104,	'Roland ',	'Mendel',	NULL,	NULL,	NULL,	'7675-3555',	'Kirchgasse 6',	'Graz',	'Austria'),
(105,	'Leslie',	'Murphy',	NULL,	NULL,	NULL,	'2035559545',	'567 North Pendale Street',	'New Haven',	'USA'),
(106,	'Yu',	'Choi',	NULL,	NULL,	NULL,	'2125551957',	'5290 North Pendale Street',	'NYC',	'USA'),
(107,	'Martín ',	'Sommer',	NULL,	NULL,	NULL,	'(91) 555 22 82',	'C/ Araquil, 67',	'Madrid',	'Spain'),
(108,	'Sven ',	'Ottlieb',	NULL,	NULL,	NULL,	'0241-039123',	'Walserweg 21',	'Aachen',	'Germany'),
(109,	'Violeta',	'Benitez',	NULL,	NULL,	NULL,	'5085552555',	'1785 First Street',	'New Bedford',	'USA'),
(110,	'Carmen',	'Anton',	NULL,	NULL,	NULL,	'+34 913 728555',	'c/ Gobelas, 19-1 Urb. La Florida',	'Madrid',	'Spain'),
(111,	'Sean',	'Clenahan',	NULL,	NULL,	NULL,	'61-9-3844-6555',	'7 Allen Street',	'Glen Waverly',	'Australia'),
(112,	'Franco',	'Ricotti',	NULL,	NULL,	NULL,	'+39 022515555',	'20093 Cologno Monzese',	'Milan',	'Italy'),
(113,	'Steve',	'Thompson',	NULL,	NULL,	NULL,	'3105553722',	'3675 Furth Circle',	'Burbank',	'USA'),
(114,	'Hanna ',	'Moos',	NULL,	NULL,	NULL,	'0621-08555',	'Forsterstr. 57',	'Mannheim',	'Germany'),
(115,	'Alexander ',	'Semenov',	NULL,	NULL,	NULL,	'+7 812 293 0521',	'2 Pobedy Square',	'Saint Petersburg',	'Russia'),
(116,	'Raanan',	'Altagar,G M',	NULL,	NULL,	NULL,	'+ 972 9 959 8555',	'3 Hagalim Blv.',	'Herzlia',	'Israel'),
(117,	'José Pedro ',	'Roel',	NULL,	NULL,	NULL,	'(95) 555 82 82',	'C/ Romero, 33',	'Sevilla',	'Spain'),
(118,	'Rosa',	'Salazar',	NULL,	NULL,	NULL,	'2155559857',	'11328 Douglas Av.',	'Philadelphia',	'USA'),
(119,	'Sue',	'Taylor',	NULL,	NULL,	NULL,	'4155554312',	'2793 Furth Circle',	'Brisbane',	'USA'),
(120,	'Thomas ',	'Smith',	NULL,	NULL,	NULL,	'(171) 555-7555',	'120 Hanover Sq.',	'London',	'UK'),
(121,	'Valarie',	'Franco',	NULL,	NULL,	NULL,	'6175552555',	'6251 Ingle Ln.',	'Boston',	'USA'),
(122,	'Tony',	'Snowden',	NULL,	NULL,	NULL,	'+64 9 5555500',	'Arenales 1938 3\'A\'',	'Auckland  ',	'New Zealand');

-- 2018-04-24 06:29:29
