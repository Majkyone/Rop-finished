-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: data
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Hugo Boss'),(2,'Armani'),(3,'Calvin Klein'),(4,'DIOR'),(5,'Yves Saint Laurent'),(6,'Adidas'),(7,'Al Haramain'),(8,'Bond No.9'),(9,'Creed'),(10,'David Beckham'),(11,'Chanel'),(12,'Lacoste'),(13,'The Library of Fragrance'),(14,'Xerjoff');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Kolínska voda'),(2,'Toaletná voda'),(3,'Parfúmová voda'),(4,'Parfémy'),(5,'Telové spreje');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `psc` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Marian','Sula','0904-160-002','marianosko.s@gmail.com','Trebejovská 46','Družstevná pri Hornáde','044 31','Slovensko'),(2,'Daniel','Sula','0904-160-002','marianosko.s@gmail.com','Trebejovská 46','Družstevná pri Hornáde','044 31','Slovensko'),(3,'Marian','Sula','0904-160-002','marianosko.s@gmail.com','Trebejovská 46','Družstevná pri Hornáde','044 31','Slovensko'),(6,'Marián','Šuľa','0911-222-333','marian.sula@student.spseke.sk','Ulica 26','košice','445 23','Slovensko'),(7,'Marian','Sula','0904-160-002','marianosko.s@gmail.com','Trebejovská 46','Družstevná pri Hornáde','044 31','Slovensko');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `order_time` datetime NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_product` (`id_product`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,76,1,1,147,'2023-02-07 19:29:44'),(2,74,2,1,183,'2023-02-07 19:30:21'),(3,73,3,1,183,'2023-02-07 20:20:59'),(9,46,6,2,54,'2023-03-12 15:16:08'),(10,76,7,1,147,'2023-03-20 20:40:49');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `price` float NOT NULL,
  `caption` text COLLATE utf8_slovak_ci NOT NULL,
  `description` text COLLATE utf8_slovak_ci NOT NULL,
  `image` varchar(2048) COLLATE utf8_slovak_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `volume` bigint(20) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (24,'Pure Game Edition 2022','Adidas','Aromatická','Toaletná voda',7.9,'toaletná voda pre mužov','Mužnosť, silu a odvahu, ktoré sú vo vás ukryté, vám pomôže odhaliť pánska toaletná voda Adidas Pure Game Edition 2022. Vôňa prekypuje maskulinitou a dokonale podčiarkne váš charakter na každom kroku.','images/fuRWPYhk/adidas-pure-game-edition-2022-toaletna-voda-pre-muzov_.jpg',875,50),(25,'Ice Dive Edition 2022','Adidas','Ovocná','Toaletná voda',8.1,'toaletná voda pre mužov','Mužnosť, silu a odvahu, ktoré sú vo vás ukryté, vám pomôže odhaliť pánska toaletná voda Adidas Ice Dive Edition 2022. Vôňa prekypuje maskulinitou a dokonale podčiarkne váš charakter na každom kroku.','images/wyiDBJdj/adidas-ice-dive-edition-2022-toaletna-voda-pre-muzov_.jpg',9,50),(26,'Team Force Edition 2022','Adidas','Citrusová','Telové spreje',2.8,'parfémovaný telový sprej','Značka Adidas je u väčšiny známa predovšetkým v spojitosti s produkciou športového oblečenia, obuvi a ďalších doplnkov. Vznik značky sa datuje do roku 1925 a je spojený s menom Adolf Dassler, jej zakladateľom. Adidas dnes patrí k najpredávanejším výrobcom športových produktov.','images/TOajftFt/adidas_team_force.png',1055,200),(27,'Victory League Edition 2022','Adidas','Korenistá','Toaletná voda',8.1,'toaletná voda pre mužov','Novú závislosť, ktorej sa nebudete chcieť vzdať, predstavuje toaletná voda pre mužov Adidas Victory League Edition 2022. Presvedčí vás hneď pri prvom privoňaní, že odteraz bude neodmysliteľnou súčasťou každého vášho dňa.','images/j0kLfMD5/adidas-victory-league-edition-2022-toaletna-voda-pre-muzov_.jpg',418,50),(28,'Team Force Edition 2022','Adidas','Citrusová','Toaletná voda',5,'toaletná voda pre mužov','Mužnosť, silu a odvahu, ktoré sú vo vás ukryté, vám pomôže odhaliť pánska toaletná voda Adidas Team Force Edition 2022. Vôňa prekypuje maskulinitou a dokonale podčiarkne váš charakter na každom kroku.','images/tF2BKW2j/adidas-team-force-edition-2022-toaletna-voda-pre-muzov_ (1).jpg',310,50),(29,'Dynamic Pulse Edition 2022','Adidas','Ovocná','Toaletná voda',8.1,'toaletná voda pre mužov','Ľahká, svieža a zároveň nezameniteľná. Toaletná voda pre mužov Adidas Dynamic Pulse Edition 2022 vás dostane jemnou, sofistikovanou vonnou kompozíciou, ktorá je ako stvorená na každodenné nosenie.','images/Qvxgiiov/adidas-dynamic-pulse-edition-2022-toaletna-voda-pre-muzov_.jpg',684,50),(30,'Victory League Edition 2022','Adidas','Korenistá','Telové spreje',2.9,'parfémovaný telový sprej','Pre dobrodruha telom aj dušou. Telový sprej Adidas Victory League Edition 2022 je ako stvorený pre moderného muža, ktorý miluje výzvy a žiadna prekážka mu nezabráni v ceste za jeho snami.','images/OhyDFwKI/victory.png',654,200),(31,'Pure Game Edition 2022','Adidas','Aromatická','Telové spreje',2.9,'parfémovaný telový sprej','Pánsky telový sprej Adidas Pure Game Edition 2022 je skvelým doplnkom vône z rovnomennej kolekcie. Ráno použite intenzívnejšiu vôňu, počas dňa potom stačí pokožku kedykoľvek osviežiť telovým sprejom.','images/1w4rArE1/puregame.png',632,150),(32,'After Sport','Adidas','Aromatická','Telové spreje',2.9,'parfémovaný telový sprej','Pánsky telový sprej Adidas After Sport je skvelým doplnkom vône z rovnomennej kolekcie. Ráno použite intenzívnejšiu vôňu, počas dňa potom stačí pokožku kedykoľvek osviežiť telovým sprejom.','images/cbxZB8o2/aftersport.png',357,150),(33,'Culture of Sport Strike','Adidas','Fougerova','Toaletná voda',25.1,'toaletná voda pre mužov','Nedajte sa ničím zastaviť a doprajte si vzpruhu v akejkoľvek situácii. Toaletná voda pre mužov Adidas Culture of Sport Strike vám zaistí okamžitý prílev energie na zmyslovej úrovni. Povzbudí vás tak, že všetko zvládnete s prehľadom a ľahkosťou.','images/RZzHwueG/strx.png',87,50),(34,'Culture of Sport Charge','Adidas','Citrusová','Toaletná voda',25.1,'toaletná voda pre mužov','Ľahká, svieža a zároveň nezameniteľná. Toaletná voda pre mužov Adidas Culture of Sport Charge vás dostane jemnou, sofistikovanou vonnou kompozíciou, ktorá je ako stvorená na každodenné nosenie.','images/FSeXZTs7/chrg.png',650,50),(36,'UEFA CL Champions','Adidas','Kvetinová','Parfúmová voda',12.3,'parfumovaná voda pre mužov','Ak si neviete predstaviť deň bez športu a nevynecháte žiadny tréning, tak sa parfumovaná voda pre mužov Adidas UEFA Champions League Champions Intense stane vaším spoľahlivým sparingpartnerom. Užite si prílev novej energie a nekonečnej sviežosti.','images/KZxs6AID/chl.png',143,100),(37,'Team Five','Adidas','Aromatická','Toaletná voda',12.25,'toaletná voda pre mužov','Ak si neviete predstaviť deň bez športu a nevynecháte žiadny tréning, tak sa toaletná voda pre mužov Adidas Team Five stane vaším spoľahlivým sparingpartnerom. Užite si prílev novej energie a nekonečnej sviežosti.','images/xASvqmcC/adidas-team-five-toaletna-voda-pre-muzov___32.jpg',321,100),(38,'Ice Dive','Adidas','Aromatická','Telové spreje',9.23,'telový sprej pre mužov','Adidas Ice Dive je chladivá korenistá vôňa pre muža, ktorú navrhol Philippe Bousseton. Vo vrchných tónoch sa rafinovane prepája aróma kiwi, mandarínky, yuzu a grapefruitu s levanduľou, mätou, anízom a bergamotom. Toaletná voda v srdci uchováva pikantnú zmes santalového dreva, pačuli a pelargónie. V základe sa rozvíjajú fazule Tonka, pižmo, vanilka, ambra a korenie. Kolekcia bola uvedená na trh v roku 2001.','images/3yteDJ4f/dive.png',781,100),(39,'UEFA CL Dare Edition','Adidas','Citrusová','Toaletná voda',9.87,'toaletná voda pre mužov','Nový deň, nová príležitosť zdolávať výzvy. Toaletná voda pre mužov Adidas UEFA Champions League Dare Edition osvieži vašu myseľ a vy tak môžete smelo nasledovať svoj inštinkt. Vydajte sa v ústrety každodennému dobrodružstvu.','images/m2Ce7QxY/dare.png',325,100),(40,'Ice Dive','Adidas','Korenistá','Toaletná voda',14.8,'toaletná voda pre mužov','Adidas Ice Dive je ľadovo-chladivá pánska vôňa. Tento parfém sa bude páčiť všetkým aktívnym a odvážnym mužom, ktorí radi športujú a chcú si naplno užiť každý svoj ​​deň. Parfém Ice Dive vás prekvapí svojou nadčasovosťou! Jedinečný mix sviežich ovocných tónov sa jemne mieša s korenenými akordmi a spoločne tak vytvárajú nezameniteľnú a príťažlivú arómu.','images/oDkklDLm/adidas-ice-dive-toaletna-voda-pre-muzov___3.jpg',243,50),(41,'Get Ready! For Him','Adidas','Drevitá','Toaletná voda',16.87,'toaletná voda pre mužov','Nestraťte tempo ani na konci náročného dňa! Toaletná voda pre mužov Adidas Get Ready! For Him je pestrou kombináciou vonných ingrediencií, ktorá vás neprestane baviť a udrží vás v správnom rytme.','images/vyci8RUu/ready.png',317,100),(42,'Dynamic Pulse','Adidas','Drevitá','Toaletná voda',8.5,'toaletná voda pre mužov','Adidas Dynamic Pulse je svieža pánska vôňa, ktorá pomáha každému mužovi nájsť pocit vitality, energie a sily na nový aktívny deň. Tento unikátny parfém je určený športovo založeným mužom, ktorí radi dosahujú svoje limity a posúvajú hranice svojich možností. Táto vôňa Dynamic Pulse je plná atraktivity, mladosti a dynamiky. Svojím unikátnym zložením cielene dodáva pocit čistej energie a revitalizuje dušu. Zároveň pomáha vyjadrovať jedinečnosť osobnosti.','images/rjcv1ViN/adidas-dynamic-pulse-toaletna-voda-pre-muzov___3.jpg',55,50),(43,'Team Force','Adidas','Aromatická','Telové spreje',6.5,'telový sprej pre mužov','Adidas Team Force predstavuje aromatickú vôňu pre mužov. Vrchné tóny vynikajú ovocnou arómou pomaranča, ananásu, mandarínky, grapefruitu a aldehydov. Stredné tony zjemňuje kolekcia borievky a jazmínu spolu s dráždivou vôňou santalového dreva. V základe je vôňa rafinovane dochutená jantárom, cédrovým drevom a tabakom. Team Force sa objavil na trhu v roku 2000.','images/DMITCPIq/force.png',654,100),(44,'Active Bodies','Adidas','Aromatická','Toaletná voda',12,'toaletná voda pre mužov','Novú závislosť, ktorej sa nebudete chcieť vzdať, predstavuje toaletná voda pre mužov Adidas Active Bodies . Presvedčí vás hneď pri prvom privoňaní, že odteraz bude neodmysliteľnou súčasťou každého vášho dňa.','images/0fi6Qhac/active-bodies.png',160,100),(45,'Détour noir','Al Haramain','Kvetinová','Parfúmová voda',35.9,'parfumovaná voda pre mužov','Novú závislosť, ktorej sa nebudete chcieť vzdať, predstavuje parfumovaná voda pre mužov Al Haramain Détour noir . Presvedčí vás hneď pri prvom privoňaní, že odteraz bude neodmysliteľnou súčasťou každého vášho dňa.','images/JaTqhtrV/detour.png',35,100),(46,'Signature Blue','Al Haramain','Fougerova','Parfúmová voda',27,'parfumovaná voda pre mužov','Aká zvodná vie byť vôňa Orientu, vám odhalí pánska parfumovaná voda Al Haramain Signature Blue. Tajuplnosť a štipka záhady, ktorú vyžaruje, podnieti zvedavosť všetkých okolo vás.','images/f2aAINOw/signature.png',45,100),(47,'Amber Oud Tobacco Edition','Al Haramain','Orientálna','Parfúmová voda',69,'parfumovaná voda pre mužov','Zahaľte sa aj vy do vône, vďaka ktorej budete mať skvelú náladu po celý deň. Pánska parfumovaná voda Al Haramain Amber Oud Tobacco Edition je vyjadrením optimizmu a pocitu absolútneho šťastia.','images/JRec8UiA/al-haramain-amber-oud-tobacco-edition-parfumovana-voda-unisex_.jpg',87,60),(48,'ĽAventure Knight','Al Haramain','Orientálna','Parfúmová voda',74.2,'parfumovaná voda pre mužov','Ľahká, svieža a zároveň nezameniteľná. Parfumovaná voda pre mužov Al Haramain ĽAventure Knight vás dostane jemnou, sofistikovanou vonnou kompozíciou, ktorá je ako stvorená na každodenné nosenie.','images/6vR4aV1T/knight.png',45,100),(49,'Maze','Al Haramain','Kvetinová','Parfúmová voda',40,'parfumovaná voda pre mužov','Objavte vôňu, ktorá nezapadá do žiadnych škatuliek, a pritom majstrovsky zdôrazní osobnosť svojho nositeľa. Pánska parfumovaná voda Al Haramain Maze je tá pravá vôňa, ktorá umožní vyniknúť vašej originalite.','images/WJbbmoLq/maze.png',57,50),(50,'Dehnal Oudh Ateeq','Al Haramain','Korenistá','Parfúmová voda',45,'parfumovaná voda pre mužov','Aká zvodná vie byť vôňa Orientu, vám odhalí pánska parfumovaná voda Al Haramain Dehnal Oudh Ateeq . Tajuplnosť a štipka záhady, ktorú vyžaruje, podnieti zvedavosť všetkých okolo vás.','images/g18t2six/dehnal.png',25,60),(51,'Dazzle Intense','Al Haramain','Ovocná','Parfúmová voda',44,'parfumovaná voda pre mužov','Objavte vôňu, ktorá nezapadá do žiadnych škatuliek, a pritom majstrovsky zdôrazní osobnosť svojho nositeľa. Pánska parfumovaná voda Al Haramain Dazzle Intense je tá pravá vôňa, ktorá umožní vyniknúť vašej originalite','images/tv1dKdMe/dazzle.png',78,100),(52,'Mena','Al Haramain','Orientálna','Parfúmová voda',31.52,'parfumovaná voda pre mužov','Kúzlo tejto vône tkvie v tom, že sa skvelo hodí pre ženy aj mužov. Každý si v nej nájde to svoje, na každom sa rozvonia inak. Pánska parfumovaná voda Al Haramain Mena sa na vašom toaletnom stolíku rozhodne nestratí a navyše sa o ňu môžete deliť aj so svojou drahou polovičkou.','images/xxWsoPeH/mena.png',115,60),(53,'Dubai','Al Haramain','Orientálna','Parfúmová voda',30,'parfumovaná voda pre mužov','Na rande, na večierok alebo na stretnutie s priateľmi? Pánska parfumovaná voda Al Haramain Dubai sa skvele hodí kedykoľvek, keď chcete zažiariť. Objavte aj vy vôňu, ktorá dokonale doplní vašu jedinečnú charizmu.','images/06lZP8eR/dubai.png',34,60),(54,'Amber Oud','Al Haramain','Orientálna','Parfúmová voda',79,'parfumovaná voda pre mužov','Aká zvodná vie byť vôňa Orientu, vám odhalí pánska parfumovaná voda Al Haramain Amber Oud . Tajuplnosť a štipka záhady, ktorú vyžaruje, podnieti zvedavosť všetkých okolo vás.','images/imaJ1Ney/amber-oud.png',234,60),(55,'Mukhamria Maliki Ateeq','Al Haramain','Pižmová','Parfúmová voda',41,'parfumovaná voda pre mužov','Dovoľte, aby o vás parfumovaná voda Al Haramain Mukhamria Maliki Ateeq prezradila, že do miestnosti práve vstúpil muž, ktorý dostane všetko, po čom túži. Vôňa plná mužnej zmyselnosti, zvodnosti a vášne nenechá chladným nikoho vo vašom okolí.','images/V6Vnikz6/ateeq.png',21,60),(56,'Platinum Oud 50 years','Al Haramain','Drevitá','Parfúmová voda',84.7,'parfumovaná voda pre mužov','Nový deň, nová príležitosť zdolávať výzvy. Pánska parfumovaná voda Al Haramain Platinum Oud 50 years osvieži vašu myseľ a vy tak môžete smelo nasledovať svoj inštinkt. Vydajte sa v ústrety každodennému dobrodružstvu.','images/7aR36zIa/platinum50.png',15,100),(57,'Rawaa','Al Haramain','Kvetinová','Parfúmová voda',30.48,'parfumovaná voda pre mužov','Na rande, na večierok alebo na stretnutie s priateľmi? Pánska parfumovaná voda Al Haramain Rawaa sa skvele hodí kedykoľvek, keď chcete zažiariť. Objavte aj vy vôňu, ktorá dokonale doplní vašu jedinečnú charizmu.','images/9x29AmqD/raawa.png',156,100),(58,'Portfolio Imperial Oud','Al Haramain','Drevitá','Parfúmová voda',198,'parfumovaná voda pre mužov','Zabudnite na pravidlá, hranice a limity. Pánska parfumovaná voda Al Haramain Portfolio Imperial Oud sa skvele hodí pre každého, kto sa nebojí vystúpiť z davu','images/6XY7XhlH/portfolio.png',12,60),(59,'Sheikh','Al Haramain','Orientálna','Parfúmová voda',35.58,'parfumovaná voda pre mužov','Nový deň, nová príležitosť zdolávať výzvy. Parfumovaná voda pre mužov Al Haramain Sheikh osvieži vašu myseľ a vy tak môžete smelo nasledovať svoj inštinkt. Vydajte sa v ústrety každodennému dobrodružstvu.','images/1n8ls2AL/Sheikh.png',231,100),(60,'Matar Al Hub','Al Haramain','Orientálna','Parfúmová voda',30,'parfumovaná voda pre mužov','Kúzlo tejto vône tkvie v tom, že sa skvelo hodí pre ženy aj mužov. Každý si v nej nájde to svoje, na každom sa rozvonia inak. Pánska parfumovaná voda Al Haramain Matar Al Hub sa na vašom toaletnom stolíku rozhodne nestratí a navyše sa o ňu môžete deliť aj so svojou drahou polovičkou.','images/HMZl1LGk/matar.png',241,100),(61,'Vintage Classic','Al Haramain','Korenistá','Parfúmová voda',23,'parfumovaná voda pre mužov','Či už vás čaká dôležité pracovné rokovanie, párty s priateľmi alebo večera s osudovou ženou, parfumovaná voda pre mužov Al Haramain Vintage Classic je vždy skvelou voľbou. Podporí vaše sebavedomie kedykoľvek, keď budete chcieť zažiariť.','images/XqWMYmP6/vintage.png',232,100),(62,'Coupe','Al Haramain','Drevitá','Parfúmová voda',34,'parfumovaná voda pre mužov','Novú závislosť, ktorej sa nebudete chcieť vzdať, predstavuje parfumovaná voda pre mužov Al Haramain Coupe . Presvedčí vás hneď pri prvom privoňaní, že odteraz bude neodmysliteľnou súčasťou každého vášho dňa.','images/BQd1EhJe/coupe.png',541,100),(63,'Nasmah','Al Haramain','Kvetinová','Parfúmová voda',32.84,'parfumovaná voda pre mužov','Parfémy Al Haramain s obľubou kombinujú tradičné arabské a moderné vône. Veľký ohlas si získali najmä produkty, ktorých hlavnou zložkou je vzácne agarové drevo.','images/LA5xyEgS/nasmah.png',215,50),(64,'Portfolio Neroli Canvas','Al Haramain','Orientálna','Parfúmová voda',213.99,'parfumovaná voda pre mužov','Pre každého. Bez rozdielu. Pánska parfumovaná voda Al Haramain Portfolio Neroli Canvas sa skvele hodí ako pre ženy, tak aj pre mužov, a nechá naplno vyniknúť vašu osobnosť.','images/MnoUfbgZ/portfoliocanvas.png',26,60),(65,'Oudh Patchouli','Al Haramain','Orientálna','Parfúmová voda',67,'parfumovaná voda pre mužov','Pre každého. Bez rozdielu. Pánska parfumovaná voda Al Haramain Oudh Patchouli sa skvele hodí ako pre ženy, tak aj pre mužov, a nechá naplno vyniknúť vašu osobnosť.','images/KiQmElRB/oudh.png',35,100),(66,'Eugenie','Al Haramain','Orientálna','Parfúmová voda',41,'parfumovaná voda pre mužov','Kúzlo tejto vône tkvie v tom, že sa skvelo hodí pre ženy aj mužov. Každý si v nej nájde to svoje, na každom sa rozvonia inak. Pánska parfumovaná voda Al Haramain Eugenie sa na vašom toaletnom stolíku rozhodne nestratí a navyše sa o ňu môžete deliť aj so svojou drahou polovičkou.','images/LXGNCIX3/eugenie.png',231,100),(67,'Portfolio Royale Stallion','Al Haramain','Aromatická','Parfúmová voda',211,'parfumovaná voda pre mužov','Zabudnite na pravidlá, hranice a limity. Pánska parfumovaná voda Al Haramain Portfolio Royale Stallion sa skvele hodí pre každého, kto sa nebojí vystúpiť z davu.','images/OKL8wIRL/portroyale.png',124,60),(68,'Faris Aswad','Al Haramain','Drevitá','Parfúmová voda',50,'parfumovaná voda pre mužov','Objavte vôňu, ktorá nezapadá do žiadnych škatuliek, a pritom majstrovsky zdôrazní osobnosť svojho nositeľa. Pánska parfumovaná voda Al Haramain Faris Aswad je tá pravá vôňa, ktorá umožní vyniknúť vašej originalite.','images/bvGrcA9Y/faris.png',238,60),(69,'Haramain Treasure','Al Haramain','Pižmová','Parfúmová voda',330.9,'parfumovaná voda pre mužov','Al Haramain sa podľa svojich vlastných slov usiluje o dokonalosť. Preto kladie enormný dôraz aj na obalový dizajn. Do detailov prepracované flakóny v podobe prepychových orientálnych cukorničiek, čajových kanvičiek etc., patria k tomu jednoznačne najpodarenejšiemu, čo je v tejto oblasti k videniu.','images/UJFuckj1/Haramain Treasure.png',8,60),(70,'Sheikh II','Al Haramain','Drevitá','Parfúmová voda',255,'parfumovaná voda pre mužov','Ako únik do samotného srdca prírody na vás zapôsobí parfumovaná voda pre mužov Al Haramain Sheikh II. Nechajte za chrbtom stresujúci mestský zhon a sústreďte sa na to, čo je naozaj dôležité.','images/isFGk5Eb/sheikh2.png',9,60),(71,'ĽAventure Intense','Al Haramain','Cyprusová','Parfúmová voda',39.95,'parfumovaná voda pre mužov','Nový deň, nová príležitosť zdolávať výzvy. Parfumovaná voda pre mužov Al Haramain Ľaventure Intense osvieži vašu myseľ a vy tak môžete smelo nasledovať svoj inštinkt. Vydajte sa v ústrety každodennému dobrodružstvu.','images/UhL8jhV4/laventureintense.png',45,100),(72,'Détour noir','Al Haramain','Kvetinová','Parfúmová voda',35.9,'parfumovaná voda pre mužov','Novú závislosť, ktorej sa nebudete chcieť vzdať, predstavuje parfumovaná voda pre mužov Al Haramain Détour noir . Presvedčí vás hneď pri prvom privoňaní, že odteraz bude neodmysliteľnou súčasťou každého vášho dňa.','images/BU3FPTiI/voir.png',68,100),(73,'Acqua di Giò Profondo','Armani','Aromatická','Parfúmová voda',183,'parfumovaná voda pre mužov','Do hlbín mora, až tam, kde odtiene modrej získavajú tie najtemnejšie odtiene, ponorí vaše zmysly pánska parfumovaná voda Giorgio Armani Acqua di Giò Profondo. Objavte a preskúmajte novú dimenziu vody aj svojej duše.','images/TQJBPRLM/Acqua di Giò Profondo.png',43,200),(74,'Acqua di Giò Absolu','Armani','Vodná','Parfúmová voda',183,'parfumovaná voda pre mužov','Parfumovaná voda pre mužov Armani Acqua di Giò Absolu je novou interpretáciou klasickej vône Acqua di Giò. Oproti pôvodnej verzii sa vyznačuje spojením pôsobivých drevitých a jemných vodných tónov.','images/PfP4TlMW/Acqua di Giò Absolu.png',48,200),(75,'Code Homme Parfum','Armani','Aromatická','Parfúmová voda',125,'parfumovaná voda pre mužov','Mužnosť a citlivosť. Pluralitu muža dneška stelesňuje pánsky parfém Armani Code Le Parfum. Táto vôňa bola inšpirovaná súčasnými mužmi, ktorí slobodne vyjadrujú emócie a autenticky prejavujú svoju maskulinitu.','images/KHI7Qq9T/Code Homme Parfum.png',87,150),(76,'Acqua di Giò Profumo','Armani','Vodná','Parfúmová voda',147,'parfumovaná voda pre mužov','Aké to je, keď sa spoja drsné vulkanické horniny so slanou vodou z hlbín oceánu, vám dá pocítiť parfumovaná voda pre mužov Armani Acqua di Giò Profumo. Táto sofistikovaná a silne maskulínna vôňa vás prenesie na stredomorské pobrežie, kde sa rozbúrené more stretáva s tvrdou skalou, a zahalí vaše telo do intenzívnej minerálnej sviežosti.','images/5rUSdBjU/Acqua di Giò Profumo.png',30,120),(77,'Emporio Stronger With You Absolutely','Armani','Fougerova','Parfúmová voda',105,'parfumovaná voda pre mužov','Vášeň silnejšia než kedykoľvek predtým. Zažite ju aj vy. Pánsky parfém Armani Emporio Stronger With You Absolutely odhaľuje zážitok absolútnej lásky v mimoriadne zmyselnej podobe. Tento parfém si vás zaručene podmaní svojou zvodnou a vysoko návykovou vonnou kompozíciou.','images/6gtibdgu/Emporio Stronger With You Absolutely.png',75,100),(78,'Emporio Stronger With You Intensely','Armani','Korenistá','Parfúmová voda',99,'parfumovaná voda pre mužov','Parfumovaná voda Giorgio Armani Emporio Stronger With You Intensely je inšpirovaná hlbokým milostným príbehom súčasného mladého muža, ktorý každý deň posúva hranice svojej lásky a posilňuje ju.','images/AomMBFXe/Emporio Stronger With You Intensely.png',54,100);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Aromatická'),(2,'Citrusová'),(3,'Cyprusová'),(4,'Drevitá'),(5,'Gurmánska'),(6,'Korenistá'),(7,'Kožená'),(8,'Kvetinová'),(9,'Orientálna'),(10,'Ovocná'),(11,'Pižmová'),(12,'Vodná'),(13,'Zelená'),(14,'Fougerova');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volume`
--

DROP TABLE IF EXISTS `volume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volume` (
  `id_volume` int(11) NOT NULL AUTO_INCREMENT,
  `volume` bigint(20) NOT NULL,
  PRIMARY KEY (`id_volume`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volume`
--

LOCK TABLES `volume` WRITE;
/*!40000 ALTER TABLE `volume` DISABLE KEYS */;
INSERT INTO `volume` VALUES (1,50),(2,60),(3,100),(4,120),(5,150),(6,200);
/*!40000 ALTER TABLE `volume` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-24 17:18:28
