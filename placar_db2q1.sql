-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: placar_db2q1
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `araclar`
--

DROP TABLE IF EXISTS `araclar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `araclar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vites` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gunluFiyat` int(11) NOT NULL,
  `marka` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motorGucu` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaTipi` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yakitTipi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renk` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yil` year(4) NOT NULL,
  `aracSahibiID` int(11) NOT NULL,
  `subelerID` int(11) NOT NULL,
  `gorsel` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `araclar`
--

LOCK TABLES `araclar` WRITE;
/*!40000 ALTER TABLE `araclar` DISABLE KEYS */;
INSERT INTO `araclar` (`id`, `model`, `vites`, `gunluFiyat`, `marka`, `motorGucu`, `kasaTipi`, `yakitTipi`, `renk`, `yil`, `aracSahibiID`, `subelerID`, `gorsel`) VALUES (1,'Clio','Manuel',210,'Renault','90','Hatchback','Benzin','Siyah',2000,14,55,'https://file.ikinciyeni.com/CarPhotos/34SY4957/MediumImage/ikinci-el-satilik-renault-clio-22-6d4beb.jpg'),(2,'Polo 1.6','Manuel',230,'Volkswagen','110','Sedan','Dizel','Beyaz',2014,22,59,'https://img.letgo.com/images/86/c1/0d/f2/86c10df29ba1dedbf65eb25af867a9cf.jpg?impolicy=img_600'),(3,'Linea','Otomatik',205,'Fiat','105','Sedan','Dizel','İnci',2011,22,51,'https://file.ikinciyeni.com/CarPhotos/34RY5680/MediumImage/ikinci-el-satilik-fiat-linea-15-c11eb5.jpg'),(4,'Panda','Otomatik',215,'Fiat','80','Hatchback','Dizel','Kırmızı',2018,14,53,'http://traraba.com/wp-content/uploads/2010/07/yeni_fiat_panda_1.jpg'),(5,'Focus','Otomatik',240,'Ford','146','Hatchback','Dizel','Gri',2017,21,56,'http://www.arabalar.com.tr/static-res/image/versiyon/660x495/ford/focus/sedan/2012/2012-ford-focus-sedan-111.jpg'),(6,'Astra 1.6','Otomatik',200,'Opel','101','Kombi','Dizel','Turuncu',2002,12,58,'http://www.ecumasters.com/wp-content/uploads/47-1.jpg'),(7,'Golf','Manuel',245,'Volkswagen','130','Minivan','Dizel','Sarı',2017,10,49,'https://image.yenisafak.com/resim/imagecrop/2016/11/11/11/09/resized_a842b-f8e549687a.jpg'),(8,'Insignia','Manuel',290,'Opel','210','Kombi','Dizel','Siyah',2017,21,50,'https://arbimg11.mncdn.com/ilanfotograflari/2018/09/08/9805123/56dcc57b-0a26-48a9-a11c-e779c895b512_image_for_silan_9805123_580x435.jpg'),(9,'A3','Manuel',270,'Audi','204','Hatchback','Benzin','Beyaz',2016,10,60,'https://s1.yzermotors.com/media/convert/resize/750x469/268783432-fe5415a0.jpg'),(10,'A3','Manuel',230,'Audi','150','Sedan','Dizel','İnci',2017,1,53,'https://i.ebayimg.com/00/s/NTcwWDEwMjQ=/z/ta0AAOSwuxFYx9wn/$_86.JPG'),(11,'320i','Manuel',235,'BMW','170','Sedan','Dizel','Kırmızı',2012,14,49,'http://store.donanimhaber.com/d1/11/53/d111536fb316a6d952a6ef8b2e2c24f8.jpg'),(12,'320i','Manuel',265,'BMW','184','Grand Tourer','Benzin','Gri',2009,39,50,'http://www.kosifleroto.com.tr/Contents/images/kullanilmis_oto/5870/10011102018092601931.jpg'),(13,'520i','Manuel',240,'BMW','170','Sedan','Benzin','Turuncu',2010,1,52,'http://wallpapers4screen.com/Uploads/16-12-2016/34676/thumb2-bmw-m4-f82-sportcars-2016-cars-tuning.jpg'),(14,'3008','Manuel',260,'Peugeot','165','Crossover','Dizel','Sarı',2018,10,54,'http://otomobiltutkunu.com/wp-content/uploads/2017/09/Peugeot-3008-Sport-Pack-Advanced-Grip-Control.jpg'),(15,'C-hr Hybrid','Manuel',220,'Toyota','122','SUV','Dizel','Beyaz',2016,39,51,'https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/2016_toyota-chr_hybrid_mte_dynamic_03.jpg?itok=8UfasHLh'),(16,'5008','Otomatik',225,'Peugeot','130','SUV','Benzin','İnci',2018,21,57,'http://picture1.goo-net.com/7009900069/30180429/J/70099000693018042900400.jpg'),(18,'XC90','Otomatik',310,'Volvo','235','SUV','Benzin','Kırmızı',2016,1,52,'https://leasing.com/cms-images/Volvo-XC90-R-Design-2016-front-red.jpg'),(23,'Centenario LP 77','Otomatik',430,'Lamborghini ','770','Cabriolet','Benzin','Gri',2016,1,52,'http://supercars.agent4stars.com/wp-content/uploads/2017/01/Screen-Shot-2017-04-17-at-15.29.57.png');
/*!40000 ALTER TABLE `araclar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kiralar`
--

DROP TABLE IF EXISTS `kiralar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kiralar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aracID` int(11) NOT NULL,
  `musteriID` int(11) NOT NULL,
  `kiraladigiTarih` date NOT NULL,
  `teslimEttigiTarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kiralar`
--

LOCK TABLES `kiralar` WRITE;
/*!40000 ALTER TABLE `kiralar` DISABLE KEYS */;
INSERT INTO `kiralar` (`id`, `aracID`, `musteriID`, `kiraladigiTarih`, `teslimEttigiTarih`) VALUES (1,1,16,'2018-11-29','2018-12-05'),(2,11,1,'2018-11-29','2018-12-12'),(3,12,1,'2018-11-07','2018-11-09'),(4,18,15,'2018-11-12','2018-11-17'),(5,2,17,'2018-11-17','2018-11-21'),(8,11,1,'2018-12-12','2018-12-27'),(9,23,38,'2018-12-25','2018-12-27'),(10,15,38,'2018-12-18','2018-12-20'),(11,32,39,'2018-12-18','2018-12-28');
/*!40000 ALTER TABLE `kiralar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kiraverir`
--

DROP TABLE IF EXISTS `kiraverir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kiraverir` (
  `aracID` int(11) NOT NULL AUTO_INCREMENT,
  `ilanBasTarihi` date NOT NULL,
  `ilanBitTarihi` date NOT NULL,
  PRIMARY KEY (`aracID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kiraverir`
--

LOCK TABLES `kiraverir` WRITE;
/*!40000 ALTER TABLE `kiraverir` DISABLE KEYS */;
INSERT INTO `kiraverir` (`aracID`, `ilanBasTarihi`, `ilanBitTarihi`) VALUES (1,'2018-11-13','2018-12-30'),(2,'2018-11-12','2019-01-31'),(3,'2018-11-11','2018-12-04'),(4,'2018-11-14','2018-12-11'),(5,'2018-11-15','2018-12-19'),(6,'2018-11-11','2018-12-20'),(7,'2018-11-01','2018-12-21'),(8,'2018-11-02','2018-12-22'),(9,'2018-11-03','2018-12-28'),(10,'2018-11-04','2018-12-24'),(11,'2018-11-17','2018-12-27'),(12,'2018-11-03','2018-12-12'),(13,'2018-11-07','2019-01-23'),(14,'2018-11-03','2018-12-04'),(15,'2018-11-03','2019-01-07'),(16,'2018-11-21','2019-01-08'),(18,'2018-11-07','2019-01-28'),(23,'2018-12-11','2019-02-14');
/*!40000 ALTER TABLE `kiraverir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `tur` int(11) NOT NULL COMMENT '1:calisan, 2:aracsahibi, 3:musteri',
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `ad` varchar(64) NOT NULL,
  `soyad` varchar(64) NOT NULL,
  `tc` bigint(20) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `adres` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `tur`, `user_name`, `user_password_hash`, `user_email`, `ad`, `soyad`, `tc`, `tel`, `adres`) VALUES (1,1,'aliegilmez','$2y$10$ppqSku1awrnBHZKQZxCGnOFUzHswxJ6MHI8NiF/4c.B8/hVc7LYPO','aliegilmez@gmail.com','Ali','Eğilmez',65951258528,'05454564775','İsmetpaşa mah. Çanakkale/Merkez'),(14,2,'burcucetiner','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','emel.akal@hotmail.com','Burcu','Çetiner',85258518170,'0 (546) 835 00 19','Sezek Durağı 8 57213 Isparta'),(15,2,'esmatazegul','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','ozbir.atakan@mynet.com','Esma','Tazegül',65951258528,'0 (500) 471 99 07','Ebru İş Hanı 4 74438 Erzincan'),(16,2,'burcusandalci','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','demirel.ada@mertoglu.com','Burcu','Sandalcı',54002815544,'0 544 299 27 46','Arıcan İş Hanı 73 45890 Bingöl'),(17,2,'egebicer','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','mkaplangi@tekelioglu.org','Ege','Biçer',19826436986,'0 (551) 496 01 18','Atakan İş Hanı 50 80471 Ardahan'),(18,2,'iremnalbant','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','ztazegul@gmail.com','İrem','Nalbantoğlu',64428286224,'0 559 834 84 73','Ebru Kavşağı 04 88073 Isparta'),(19,2,'iremkececi','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','ozberk.efe@yahoo.com','İrem','Keçeci',10257449866,'+90 535 542 95 08','Dizdar Durağı 371 34742 Mardin'),(20,3,'askinakaydin','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','capanoglu.ada@nalbantoglu.com','Aşkın','Akaydın',22108199080,'05312555105','Rüya Kavşağı 35 13190 Bingöl'),(21,3,'tunaal','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','hlimoncuoglu@yahoo.com','Tuna','Alyanak',51646969220,'+90 (550) 326 49 45','İrem Sokak 666 32943 Tokat'),(22,3,'emelerez','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','serhan43@gmail.com','Emel','Erez',75042782566,'+905529342172','Ebru Kavşağı 677 42316 Çanakkale'),(23,3,'mertutuncu','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','ikeseroglu@turk.net','Mert','Tütüncü',92987130818,'+90 508 494 98 91','Aşkın Caddesi 850 33632 Muş'),(24,3,'ruzgarakaydin','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','vayaydin@beserler.edu.tr','Rüzgar','Akaydın',18774160868,'0 533 290 90 49','Kağan Caddesi 651 17643 Mardin'),(25,3,'umranbalaban','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','suleymanoglu.burcu@hotmail.com','Ümran','Balaban',56959955878,'+90 (549) 423 23 63','Aydan İş Hanı 120 11759 Kastamonu'),(26,1,'burcukucukler','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','sinem95@turk.net','Burcu','Küçükler',32135521754,'','Baran Mevkii 346 17100 Bartın'),(27,1,'ebruaydan','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','sdusenkalkar@turk.net','Ebru','Aydan',87967689516,'','Yetkiner Mevkii 903 99749 Diyarbakır'),(28,1,'ruyabaturalp','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','emirhan68@superposta.com','Rüya','Baturalp',41294622134,'','Ebru Sokak 182 03481 Gümüşhane'),(29,1,'toprakerturk','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','tokatlioglu.toprak@abadan.com','Toprak','Ertürk',43671559088,'','Koray Caddesi 962 74774 İzmir'),(30,1,'kutayerez','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','sahnur.tuzun@hotmail.com','Kutay','Erez',57367520252,'','Kahveci Durağı 792 41608 Şırnak'),(31,1,'berkeozbey','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','ege15@turk.net','Berke','Özbey',50580604402,'','Yetkiner Kavşağı 987 84304 Bitlis'),(32,1,'esmaabadan','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','sahnur.kasapoglu@adivar.org.tr','Esma','Abadan',62104298530,'','Ada Kavşağı 9 02388 Adıyaman'),(33,1,'borayildirim','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','stekand@numanoglu.com.tr','Bora','Yıldırım',43588167642,'','Cem Mevkii 3 57865 Konya'),(34,1,'baranekici','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','lsandalci@ayverdi.com','Baran','Ekici',56883632630,'','Çörekçi Durağı 4 28293 Nevşehir'),(35,1,'baghanakman','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','doruk41@superposta.com','Dağhan','Akman',79353446124,'','Emel Durağı 81 46010 Konya'),(36,1,'iremaclan','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','serhan10@karabulut.com','İrem','Aclan',94175714626,'','Ertepınar Durağı 851 31287 Karaman'),(37,1,'borukkuculer','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','akman.cihan@yandex.com.tr','Doruk','Küçükler',87929814154,'','Türker Mevkii 636 63619 Kütahya'),(38,1,'berk','$2y$10$ppqSku1awrnBHZKQZxCGnOFUzHswxJ6MHI8NiF/4c.B8/hVc7LYPO','berk@berker.net','berk','Er',31702954674,'5647431796','İsmetpara mah. Çanakkale/Merkez'),(39,1,'berna','$2y$10$JeD52XYglOX8TJ4M86gdLuf8ouQFqNGePLKQ8ULt2N6wg7q4XNscy','bernagok@gmail.com','berna','gök',84316213200,'5456778423','Kız yurdu çanakkale'),(41,1,'e12r22rr','$2y$10$aDbMoyvl/NYyyutjFRmVNOa0vkgPOI4yGKChXhGN7yoo2xlwP58TK','alimete@gmail.com','ali','mete',12345342165,'5455784775','Cumhuriyet mah. Arıburnu cad. Alp apt. K4 no:9');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'placar_db2q1'
--

--
-- Dumping routines for database 'placar_db2q1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10 22:28:55
