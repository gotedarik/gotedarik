-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: oganizetedarik.c9lueszizrub.eu-central-1.rds.amazonaws.com    Database: organizetedarik
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `dateadd` datetime NOT NULL,
  `title` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (35,'Mehmet Serefoglu','mehmet@gmail.com','d2da1e9f79c6ca6d5d60c7a2b8673c5a','2016-06-24 15:41:44','Yazılım Uzmanı',1),(36,'Samed Ceylan','imadige@gmail.com','44209a6a592dea91bcf7d4dd53e47a5a','2016-06-24 17:02:06','Yazılım Uzmanı',1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cityareas`
--

DROP TABLE IF EXISTS `cityareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cityareas` (
  `cityareas_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`cityareas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cityareas`
--

LOCK TABLES `cityareas` WRITE;
/*!40000 ALTER TABLE `cityareas` DISABLE KEYS */;
INSERT INTO `cityareas` VALUES (1,'Akdeniz Bölgesi'),(2,'Karadeniz Bölgesi'),(3,'Güneydoğu Anadolu Bölgesi'),(4,'İç Anadolu Bölgesi'),(5,'Doğu Anadolu Bölgesi'),(6,'Ege Bölgesi'),(7,'Marmara Bölgesi');
/*!40000 ALTER TABLE `cityareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citys`
--

DROP TABLE IF EXISTS `citys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citys` (
  `citys_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cityareas_id` int(11) NOT NULL,
  PRIMARY KEY (`citys_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citys`
--

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;
INSERT INTO `citys` VALUES (1,'Adana',1),(2,'Adıyaman',3),(3,'Afyonkarahisar',6),(4,'Ağrı',5),(5,'Amasya',2),(6,'Ankara',4),(7,'Antalya',1),(8,'Artvin',2),(9,'Aydın',6),(10,'Balıkesir',7),(11,'Bilecik',7),(12,'Bingöl',5),(13,'Bitlis',5),(14,'Bolu',2),(15,'Burdur',1),(16,'Bursa',7),(17,'Çanakkale',7),(18,'Çankırı',4),(19,'Çorum',4),(20,'Denizli',6),(21,'Diyarbakır',3),(22,'Edirne',7),(23,'Elazığ',5),(24,'Erzincan',5),(25,'Erzurum',5),(26,'Eskişehir',4),(27,'Gaziantep',3),(28,'Giresun',2),(29,'Gümüşhane',2),(30,'Hakkari',5),(31,'Hatay',1),(32,'Isparta',1),(33,'Mersin',1),(34,'İstanbul',7),(35,'İzmir',6),(36,'Kars',5),(37,'Kastamonu',2),(38,'Kayseri',4),(39,'Kırklareli',7),(40,'Kırşehir',4),(41,'Kocaeli',7),(42,'Konya',4),(43,'Kütahya',7),(44,'Malatya',5),(45,'Manisa',6),(46,'Kahramanmaraş',1),(47,'Mardin',3),(48,'Muğla',6),(49,'Muş',5),(50,'Nevşehir',4),(51,'Niğde',1),(52,'Ordu',2),(53,'Rize',2),(54,'Sakarya',7),(55,'Samsun',2),(56,'Siirt',3),(57,'Sinop',2),(58,'Sivas',4),(59,'Tekirdağ',7),(60,'Tokat',4),(61,'Trabzon',2),(62,'Tunceli',5),(63,'Şanlıurfa',3),(64,'Uşak',6),(65,'Van',5),(66,'Yozgat',4),(67,'Zonguldak',2),(68,'Aksaray',4),(69,'Bayburt',2),(70,'Karaman',4),(71,'Kırıkkale',4),(72,'Batman',3),(73,'Şırnak',3),(74,'Bartın',2),(75,'Ardahan',5),(76,'Iğdır',5),(77,'Yalova',7),(78,'Karabük',2),(79,'Kilis',3),(80,'Osmaniye',1),(81,'Düzce',2);
/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_messages`
--

DROP TABLE IF EXISTS `company_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_messages` (
  `company_messages_ids` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `message` mediumtext CHARACTER SET utf8 NOT NULL,
  `dateadd` datetime NOT NULL,
  `company_messagesbox_ids` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`company_messages_ids`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_messages`
--

LOCK TABLES `company_messages` WRITE;
/*!40000 ALTER TABLE `company_messages` DISABLE KEYS */;
INSERT INTO `company_messages` VALUES (14,1,'asdasdas','2016-11-21 23:37:05','1'),(15,1,'asdasdas','2016-11-21 23:37:23','2'),(16,1,'asdasdas','2016-11-21 23:37:43','3'),(17,1,'asdasdas','2016-11-21 23:37:50','4'),(18,1,'asdasdas','2016-11-21 23:39:56','5'),(19,1,'asdasdas','2016-11-21 23:41:13','6'),(20,1,'asdasdas','2016-11-21 23:41:30','7'),(21,1,'asdasdas','2016-11-21 23:41:52','8'),(22,1,'asdsadasd21','2016-11-21 23:46:24','9');
/*!40000 ALTER TABLE `company_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_messagesbox`
--

DROP TABLE IF EXISTS `company_messagesbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_messagesbox` (
  `company_messagesbox_ids` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `sender` tinyint(1) NOT NULL,
  `subject` varchar(120) COLLATE utf8_turkish_ci NOT NULL,
  `readuser` tinyint(1) NOT NULL,
  `dateadd` datetime NOT NULL,
  `code` varchar(45) CHARACTER SET utf8 NOT NULL,
  `readsupplier` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`company_messagesbox_ids`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_messagesbox`
--

LOCK TABLES `company_messagesbox` WRITE;
/*!40000 ALTER TABLE `company_messagesbox` DISABLE KEYS */;
INSERT INTO `company_messagesbox` VALUES (1,7,2,1,'adasdas',0,'2016-11-21 23:37:05','O7H9I0B8R5Q6147976062527','1'),(2,7,2,1,'adasdas',0,'2016-11-21 23:37:23','S6Z7U7P0N4147976064327','1'),(3,7,2,1,'adasdas',0,'2016-11-21 23:37:43','E7A1P9A6I0W8147976066327','1'),(4,7,2,1,'adasdas',0,'2016-11-21 23:37:50','H9M0C7N1T3Z5Q2147976067027','1'),(5,7,2,1,'adasdas',0,'2016-11-21 23:39:56','L4I0W9J2V1147976079627','1'),(6,7,2,1,'adasdas',0,'2016-11-21 23:41:13','X4V6S3N6M7147976087327','1'),(7,7,2,1,'adasdas',0,'2016-11-21 23:41:30','M0G1D9M9W7S2A2V1147976089027','1'),(8,7,2,1,'adasdas',0,'2016-11-21 23:41:51','G9F2M6Z1D6J7147976091127','1'),(9,7,2,1,'adasdas',0,'2016-11-21 23:46:23','C8V4V3B0P9147976118327','1');
/*!40000 ALTER TABLE `company_messagesbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companyfollowlist`
--

DROP TABLE IF EXISTS `companyfollowlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companyfollowlist` (
  `companyfollowlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_date` datetime NOT NULL,
  PRIMARY KEY (`companyfollowlist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companyfollowlist`
--

LOCK TABLES `companyfollowlist` WRITE;
/*!40000 ALTER TABLE `companyfollowlist` DISABLE KEYS */;
INSERT INTO `companyfollowlist` VALUES (20,2,15,'2016-10-31 23:40:06'),(26,1,15,'2016-11-01 21:35:22');
/*!40000 ALTER TABLE `companyfollowlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comparelist`
--

DROP TABLE IF EXISTS `comparelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comparelist` (
  `compare_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`compare_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comparelist`
--

LOCK TABLES `comparelist` WRITE;
/*!40000 ALTER TABLE `comparelist` DISABLE KEYS */;
INSERT INTO `comparelist` VALUES (10,20,7,'2016-10-15 11:54:51');
/*!40000 ALTER TABLE `comparelist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_testimonials`
--

DROP TABLE IF EXISTS `customer_testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_testimonials` (
  `testimonials_id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `logo_s3url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `text` text COLLATE utf8_turkish_ci NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`testimonials_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_testimonials`
--

LOCK TABLES `customer_testimonials` WRITE;
/*!40000 ALTER TABLE `customer_testimonials` DISABLE KEYS */;
INSERT INTO `customer_testimonials` VALUES (3,'Samed a.ş','https://organizetedarik.s3.eu-central-1.amazonaws.com/customertestimonials/N8C4P1Z2_1479627638_0.jpg','customertestimonials/N8C4P1Z2_1479627638_0.jpg','<p>samed a.ş test yazısıa</p>\r\n','2016-11-20 10:40:38'),(4,'Şerefoğlu Holding','https://organizetedarik.s3.eu-central-1.amazonaws.com/customertestimonials/U2Q0W8E3U7_1479754651_0.jpg','customertestimonials/U2Q0W8E3U7_1479754651_0.jpg','<p>&Ccedil;ok iyi olmuş. Başarılar</p>\r\n','2016-11-21 21:57:31');
/*!40000 ALTER TABLE `customer_testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakeproducts`
--

DROP TABLE IF EXISTS `fakeproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakeproducts` (
  `fakeproducts_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`fakeproducts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakeproducts`
--

LOCK TABLES `fakeproducts` WRITE;
/*!40000 ALTER TABLE `fakeproducts` DISABLE KEYS */;
INSERT INTO `fakeproducts` VALUES (5,6,'http://urun.n11.com/karakter-oyuncak/zoomer-dino-P128808336?rf=n11-ozel-secimi'),(6,6,'http://urun.n11.com/outdoor-kameralar/gopro-hero-5-black-aksiyon-kamerasi-P144291063?rf=n11-ozel-secimi');
/*!40000 ALTER TABLE `fakeproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followlist`
--

DROP TABLE IF EXISTS `followlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followlist` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followlist`
--

LOCK TABLES `followlist` WRITE;
/*!40000 ALTER TABLE `followlist` DISABLE KEYS */;
INSERT INTO `followlist` VALUES (1,20,7,'2016-11-09 19:22:53'),(2,37,7,'2016-11-09 19:26:53');
/*!40000 ALTER TABLE `followlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_announcement`
--

DROP TABLE IF EXISTS `help_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `title` varchar(145) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_announcement`
--

LOCK TABLES `help_announcement` WRITE;
/*!40000 ALTER TABLE `help_announcement` DISABLE KEYS */;
INSERT INTO `help_announcement` VALUES (2,35,'KİŞİSEL VERİLERİN KORUNMASI HAKKINDA BİLGİLENDİRME','<p style=\"margin: 10px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	OrganizeTedarik olarak özel hayatınızın gizliliğine ve kişisel verileriniz\r\n korunmasını önem veriyoruz. Bu amaçla, \"Kişisel Verilerin Korunması \r\nKanunu\" hakkında sizleri bilgilendirmek isteriz.</p>\r\n<p style=\"margin: 10px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	Ülkemizde yeni yasalaşan Kişisel Verilerin Korunması Kanunu (6698 \r\nSayılı Kanun) kapsamında 7 Ekim 2016 tarihinden itibaren bilgilerinizin \r\nGizlilik Politikası kapsamında işlenmesinden sorumlu olan OrganizeTedarik \r\nBilgi Teknolojileri Sanayi ve Ticaret Anonim Şirketi’ne \r\nbaşvurabileceğinizi, kendinizle ilgili kişisel veri işlenip \r\nişlenmediğini öğrenebileceğinizi ve işlenmişse, buna ilişkin bilgi talep\r\n edebileceğinizi biliyor muydunuz? Böylelikle kişisel verilerin işlenme \r\namacına uygun kullanılıp kullanılmadığını öğrenebilecek, yurt içinde \r\nveya yurt dışında kişisel verilerinizin hangi üçüncü kişilere \r\naktarılabileceğini bilebilecek, eksik veya yanlış işlenen kişisel \r\nverilerinizin düzeltilmesini, işlemeyi gerektiren sebeplerin ortadan \r\nkalkması halinde kişisel verilerinizin silinmesini veya yok edilmesini \r\nveya anonim hale getirilmesini isteyebileceksiniz. Bu şekilde yapılan \r\ndüzeltme, yok etme ve silme işlemlerinin; kişisel verilerinizin \r\naktarıldığı üçüncü kişilere bildirilmesini de talep edebilirsiniz. \r\nİşlenen verilerin özellikle otomatik sistemler vasıtasıyla analiz \r\nedilmesi suretiyle, kendiniz aleyhine bir sonucun ortaya çıkmasına \r\nitiraz etme hakkınız ve kişisel verilerin kanuna aykırı olarak işlenmesi\r\n sebebiyle zarara uğraması halinde zararın giderilmesini talep etme \r\nhakkınız artık 6698 Sayılı Kanun ile korunuyor.</p>\r\n<p style=\"margin: 10px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	Bilgilerinizin gizliliğini ve güvenliğini korumayı her zaman öncelikli \r\namaçlarından biri olarak kabul eden OrganizeTedarik bünyesinde, 7 Ekim 2016\r\n tarihi itibarıyla yukarıda bilgisi verilen haklarınızı \r\nkullanabileceğiniz çözüm ve destek mekanizmalarını siz değerli kullanıcı\r\n ve üyelerimize ayrıca duyuracağız. Gizlilik konusunda daha fazla bilgi \r\nalmak istediğiniz takdirde, sizlere&nbsp;<a href=\"http://yardim.gittigidiyor.com/arama-sonuclari?kat=ku\">Gizlilik Merkezi</a>&nbsp;ve&nbsp;<a href=\"http://yardim.gittigidiyor.com/musteri-hizmetleri\">Müşteri Hizmetleri</a>&nbsp;üzerinden yardımcı olmaya hazırız. Gizlilik Politikasına ulaşmak için&nbsp;<a href=\"http://yardim.gittigidiyor.com/arama-sonuclari?kat=kb\">tıklayın</a>.</p>\r\n<p style=\"margin: 10px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	Saygılarımızla,</p>\r\n<p style=\"margin: 10px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;\">OrganizeTedarik</p>','2016-08-25 12:19:07');
/*!40000 ALTER TABLE `help_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_categories`
--

DROP TABLE IF EXISTS `help_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_categories`
--

LOCK TABLES `help_categories` WRITE;
/*!40000 ALTER TABLE `help_categories` DISABLE KEYS */;
INSERT INTO `help_categories` VALUES (1,0,'Alıcıyım',1),(2,0,'Satıcıyım',1),(3,0,'Üyelik İşlemleri',1),(4,0,'Rapor Et',1),(5,1,'Ürün Arıyorum',1),(6,1,'Ürün Listelemek',1),(7,3,'Kayıt Olmak',1);
/*!40000 ALTER TABLE `help_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_questions`
--

DROP TABLE IF EXISTS `help_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `admin_id` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `answer` text COLLATE utf8_turkish_ci NOT NULL,
  `dateadd` datetime NOT NULL,
  `popular` tinyint(1) DEFAULT '0',
  `readyquestions` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_questions`
--

LOCK TABLES `help_questions` WRITE;
/*!40000 ALTER TABLE `help_questions` DISABLE KEYS */;
INSERT INTO `help_questions` VALUES (7,7,'35','Nasıl Üye Olurum ? ','<p><img alt=\"\" src=\"http://i.hizliresim.com/7A5pJN.png\" style=\"height:350px; width:800px\" /></p>\r\n\r\n<p>Resimde g&ouml;r&uuml;ld&uuml;ğ&uuml; gibi sağ &uuml;st k&ouml;şedeki <u><strong>&uuml;ye ol</strong></u> butonuna tıklayarak &uuml;ye olma ekranına gidebilirsiniz daha sonra;</p>\r\n\r\n<p><img alt=\"\" src=\"http://i.hizliresim.com/9G031Z.png\" style=\"height:350px; width:800px\" /></p>\r\n\r\n<p>&Uuml;ye olma şeklinizi se&ccedil;ip ilgili alanları doldurarak &uuml;cretsiz olarak &uuml;yelik işlemlerinizi tamamlıyabilirsiniz.</p>\r\n','2016-10-29 20:33:04',1,NULL),(8,5,'35','Nasıl Ürün Bulurum','<p>deneme</p>\r\n','2016-11-06 13:07:21',0,1);
/*!40000 ALTER TABLE `help_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `admins_id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `imgS` varchar(150) CHARACTER SET utf8 NOT NULL,
  `imgS_s3url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dateadd` datetime NOT NULL,
  `read` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `imgM` varchar(150) CHARACTER SET utf8 NOT NULL,
  `imgM_s3url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (14,35,'Bu bir deneme Yazısıdır','asdad asd asd ad as asd asd as dasd asd asdasddasd<br>asdlaskda s<br>d asd<br>as<br>d<br>asdasdaldjkadjakldjasjd<br>as<br>da<br>da<br>dasjldakldjakldjadjaklda<br>da<br>d<br>asd<br>asdlşakisdajsdkajdkajdşakdjasdas<br>d<br>asd<br>as<br>d<br>asdaskdladjkasdjasklşdas<br>d<br>','news/P4L3Z3J6_1471863843_S.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/news/P4L3Z3J6_1471863843_S.jpg','2016-08-22 14:04:03',1,0,'news/F5S0H2P8I6U0W3_1471863843_M.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/news/F5S0H2P8I6U0W3_1471863843_M.jpg'),(15,36,'Altın Merkez\'in kararına odaklandı!','<p>Forex Ko&ccedil;u, sabah raporunda altın fiyatlarını değerlendirdi</p>\r\n\r\n<p>Son d&ouml;nemde piyasalarda kaos ortamının hakim olması sarı metalin g&uuml;venli liman olarak alıcı bulmasını sağladı. Ge&ccedil;tiğimiz hafta alıcıların devreye girmesinden sonra 1375 b&ouml;lgesi &uuml;zerine y&uuml;kseliş ger&ccedil;ekleşti fakat ABD istihdam raporu sonrasında ALTINda ani y&ouml;n değişimleri yaşandı.</p>\r\n\r\n<p>Tdi değişimi verisinin beklentiden iyi gelmesi sarı metalde d&uuml;ş&uuml;şleri getirdi fakat sonrasında k&ouml;t&uuml; maaşlar verisinin fiyatlanmasından sonra sarı metalde keskin bir y&uuml;kseliş yaşandı. Bug&uuml;n Asya seansının ilk b&ouml;l&uuml;m&uuml;nde alıcılar devreye girmeye &ccedil;alıştı fakat bir t&uuml;rl&uuml; 1375 b&ouml;lgesi alınamadı ve g&uuml;n i&ccedil;erisinde geri &ccedil;ekilme yaşandı.</p>\r\n\r\n<p>Bu hafta ABD&rsquo;den &ouml;nemli veriler a&ccedil;ıklanacak. &Ouml;zellikle Cuma g&uuml;n&uuml; ABD&rsquo;den gelecek olan enflasyon ve perakende verileri sarı metale b&uuml;y&uuml;k hareketler getirebilir. Sarı metaldeki y&uuml;kselişin devam etmesi i&ccedil;in G&uuml;m&uuml;ş&uuml;n yukarı iştahını s&uuml;rd&uuml;rmesi gerekiyor. Aşağıda 1350 ve 1335 b&ouml;lgesinin &ouml;nemli destek olarak &ccedil;alışmasını bekliyoruz. Yukarıda ise 1380 ve 1400 b&ouml;lgesi &ouml;nemli diren&ccedil; olarak karşımıza &ccedil;ıkıyor.</p>\r\n','news/K9R5H0X1Z2A4P8G4_1471894691_S.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/news/K9R5H0X1Z2A4P8G4_1471894691_S.jpg','2016-08-22 22:38:11',10,1,'','https://organizetedarik.s3.eu-central-1.amazonaws.com/news/V8J3F8B8N2H3E4O3_1471894691_M.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsreadip`
--

DROP TABLE IF EXISTS `newsreadip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsreadip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsreadip`
--

LOCK TABLES `newsreadip` WRITE;
/*!40000 ALTER TABLE `newsreadip` DISABLE KEYS */;
INSERT INTO `newsreadip` VALUES (1,15,'127.0.0.1'),(2,15,'81.213.150.192'),(3,15,'62.248.29.85'),(4,15,'212.252.96.66'),(5,15,'85.97.21.184'),(6,15,'::1'),(7,15,'88.235.136.103'),(8,15,'162.158.64.234');
/*!40000 ALTER TABLE `newsreadip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerbasket`
--

DROP TABLE IF EXISTS `offerbasket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offerbasket` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `count_number` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerbasket`
--

LOCK TABLES `offerbasket` WRITE;
/*!40000 ALTER TABLE `offerbasket` DISABLE KEYS */;
INSERT INTO `offerbasket` VALUES (80,20,1,20,'2016-10-21 21:58:17'),(81,37,1,20,'2016-10-21 21:58:17'),(84,37,1,7,'2016-10-23 13:37:21'),(86,37,41,25,'2016-10-25 22:20:00'),(87,20,21,25,'2016-10-25 22:20:00');
/*!40000 ALTER TABLE `offerbasket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `offers_id` int(11) NOT NULL AUTO_INCREMENT,
  `filo_id` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `offerunitprice` double DEFAULT NULL,
  `products_id` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  `read_user` tinyint(1) DEFAULT '0',
  `approval` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`offers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (14,'F2F6151477424287',15,14,35,37,'2016-10-25 22:38:07',0,0),(15,'F2F6151477424287',15,48,1100,20,'2016-10-25 22:38:07',0,1);
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producgropssublist`
--

DROP TABLE IF EXISTS `producgropssublist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producgropssublist` (
  `producgropssublist_id` int(11) NOT NULL AUTO_INCREMENT,
  `productgroup_id` int(11) NOT NULL,
  `productgroupsub_ids` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`producgropssublist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=589 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producgropssublist`
--

LOCK TABLES `producgropssublist` WRITE;
/*!40000 ALTER TABLE `producgropssublist` DISABLE KEYS */;
INSERT INTO `producgropssublist` VALUES (569,1,'1,2,19,18,10'),(570,2,'2'),(571,3,'3,4,5,6,7,21'),(572,4,'4,5,6'),(573,5,'5,6'),(574,6,'6'),(575,7,'7,21'),(576,10,'10'),(577,11,'11,13,12'),(578,12,'12'),(579,13,'13'),(580,14,'14,17,15'),(581,15,'15'),(582,17,'17'),(583,18,'18'),(584,19,'19'),(585,20,'20'),(586,21,'21'),(587,32,'32'),(588,33,'33');
/*!40000 ALTER TABLE `producgropssublist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productgroup`
--

DROP TABLE IF EXISTS `productgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productgroup` (
  `productgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `image_s3url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`productgroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productgroup`
--

LOCK TABLES `productgroup` WRITE;
/*!40000 ALTER TABLE `productgroup` DISABLE KEYS */;
INSERT INTO `productgroup` VALUES (1,0,'Tahıllar',1,NULL,NULL),(2,1,'Buğday',1,NULL,NULL),(3,0,'Sebzeler',1,NULL,NULL),(4,3,'Domates',1,NULL,NULL),(5,4,'Chery Domates',1,NULL,NULL),(6,5,'deneme',1,NULL,NULL),(7,3,'Patlıcan',1,NULL,NULL),(10,1,'Tatlı İrmigi',1,NULL,NULL),(11,0,'Un',1,NULL,NULL),(12,11,'Esmer Un',1,NULL,NULL),(13,11,'Beyaz Un',1,NULL,NULL),(14,0,'test',1,NULL,NULL),(15,14,'tes3',1,NULL,NULL),(17,14,'13123sad',1,NULL,NULL),(18,1,'Şeker1',1,NULL,NULL),(19,1,'şeker',1,NULL,NULL),(20,0,'giysi',1,'productgroup/W6F4Q5D3O4_1475347203_0.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productgroup/W6F4Q5D3O4_1475347203_0.jpg'),(21,7,'Deneme',1,NULL,NULL),(32,0,'Elektronik',1,'productgroup/I3D9V4E2_1475998617_0.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productgroup/I3D9V4E2_1475998617_0.jpg'),(33,0,'test2',1,'productgroup/N1G8G1R9_1475998696_0.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productgroup/N1G8G1R9_1475998696_0.jpg');
/*!40000 ALTER TABLE `productgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productimages`
--

DROP TABLE IF EXISTS `productimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productimages` (
  `productimages_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `imagetype` tinyint(4) NOT NULL,
  `imageXL` varchar(150) CHARACTER SET utf8 NOT NULL,
  `imageXL_s3url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `imageL` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `imageL_s3url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `imageM` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `imageM_s3url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `imageS` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `imageS_s3url` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`productimages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productimages`
--

LOCK TABLES `productimages` WRITE;
/*!40000 ALTER TABLE `productimages` DISABLE KEYS */;
INSERT INTO `productimages` VALUES (8,12,0,'productimages/12_N2G1F6R8Y8M2_1471704038_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_N2G1F6R8Y8M2_1471704038_0_1.jpg','productimages/12_N2G1F6R8Y8M2_1471704038_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_N2G1F6R8Y8M2_1471704038_0_2.jpg','productimages/12_N2G1F6R8Y8M2_1471704038_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_N2G1F6R8Y8M2_1471704038_0_3.jpg','productimages/12_N2G1F6R8Y8M2_1471704038_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_N2G1F6R8Y8M2_1471704038_0_4.jpg'),(10,12,1,'productimages/12_F5L0R3A3_1471704078_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_F5L0R3A3_1471704078_1_1.jpg','productimages/12_F5L0R3A3_1471704078_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_F5L0R3A3_1471704078_1_2.jpg','productimages/12_F5L0R3A3_1471704078_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_F5L0R3A3_1471704078_1_3.jpg','productimages/12_F5L0R3A3_1471704078_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/12_F5L0R3A3_1471704078_1_4.jpg'),(13,13,2,'productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_1.jpg','productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_2.jpg','productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_3.jpg','productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_F4E0V6Z5E2P0C7N4_1471719977_2_4.jpg'),(14,13,1,'productimages/13_O8M8A7O9I2V9_1471720805_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_O8M8A7O9I2V9_1471720805_1_1.jpg','productimages/13_O8M8A7O9I2V9_1471720805_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_O8M8A7O9I2V9_1471720805_1_2.jpg','productimages/13_O8M8A7O9I2V9_1471720805_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_O8M8A7O9I2V9_1471720805_1_3.jpg','productimages/13_O8M8A7O9I2V9_1471720805_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_O8M8A7O9I2V9_1471720805_1_4.jpg'),(15,13,0,'productimages/13_I2C6G5Q0F3_1471721134_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_I2C6G5Q0F3_1471721134_0_1.jpg','productimages/13_I2C6G5Q0F3_1471721134_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_I2C6G5Q0F3_1471721134_0_2.jpg','productimages/13_I2C6G5Q0F3_1471721134_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_I2C6G5Q0F3_1471721134_0_3.jpg','productimages/13_I2C6G5Q0F3_1471721134_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/13_I2C6G5Q0F3_1471721134_0_4.jpg'),(16,14,0,'productimages/14_R3L7K4U5_1471767510_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_R3L7K4U5_1471767510_0_1.jpg','productimages/14_R3L7K4U5_1471767510_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_R3L7K4U5_1471767510_0_2.jpg','productimages/14_R3L7K4U5_1471767510_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_R3L7K4U5_1471767510_0_3.jpg','productimages/14_R3L7K4U5_1471767510_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_R3L7K4U5_1471767510_0_4.jpg'),(17,14,1,'productimages/14_E9B7O5G2_1471767514_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_E9B7O5G2_1471767514_1_1.jpg','productimages/14_E9B7O5G2_1471767514_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_E9B7O5G2_1471767514_1_2.jpg','productimages/14_E9B7O5G2_1471767514_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_E9B7O5G2_1471767514_1_3.jpg','productimages/14_E9B7O5G2_1471767514_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_E9B7O5G2_1471767514_1_4.jpg'),(18,14,2,'productimages/14_Q7Y6D7T6L1D9_1471767521_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_Q7Y6D7T6L1D9_1471767521_2_1.jpg','productimages/14_Q7Y6D7T6L1D9_1471767521_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_Q7Y6D7T6L1D9_1471767521_2_2.jpg','productimages/14_Q7Y6D7T6L1D9_1471767521_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_Q7Y6D7T6L1D9_1471767521_2_3.jpg','productimages/14_Q7Y6D7T6L1D9_1471767521_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/14_Q7Y6D7T6L1D9_1471767521_2_4.jpg'),(19,15,0,'productimages/15_C6E6Y8V7_1471806615_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_C6E6Y8V7_1471806615_0_1.jpg','productimages/15_C6E6Y8V7_1471806615_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_C6E6Y8V7_1471806615_0_2.jpg','productimages/15_C6E6Y8V7_1471806615_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_C6E6Y8V7_1471806615_0_3.jpg','productimages/15_C6E6Y8V7_1471806615_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_C6E6Y8V7_1471806615_0_4.jpg'),(20,15,1,'productimages/15_E6Q5E3R9Z1_1471806619_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E6Q5E3R9Z1_1471806619_1_1.jpg','productimages/15_E6Q5E3R9Z1_1471806619_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E6Q5E3R9Z1_1471806619_1_2.jpg','productimages/15_E6Q5E3R9Z1_1471806619_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E6Q5E3R9Z1_1471806619_1_3.jpg','productimages/15_E6Q5E3R9Z1_1471806619_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E6Q5E3R9Z1_1471806619_1_4.jpg'),(21,15,2,'productimages/15_O8S6O0B3_1471806623_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_O8S6O0B3_1471806623_2_1.jpg','productimages/15_O8S6O0B3_1471806623_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_O8S6O0B3_1471806623_2_2.jpg','productimages/15_O8S6O0B3_1471806623_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_O8S6O0B3_1471806623_2_3.jpg','productimages/15_O8S6O0B3_1471806623_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_O8S6O0B3_1471806623_2_4.jpg'),(22,15,3,'productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_1.jpg','productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_2.jpg','productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_3.jpg','productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_W5S1S4J8B8V3M2Q3_1471806716_3_4.jpg'),(23,15,4,'productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_1.jpg','productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_2.jpg','productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_3.jpg','productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_D1M0T7D5Q4R1F1P4_1471806719_4_4.jpg'),(24,15,5,'productimages/15_Y6J0K0E8A7A1F9_1471806724_5_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_Y6J0K0E8A7A1F9_1471806724_5_1.jpg','productimages/15_Y6J0K0E8A7A1F9_1471806724_5_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_Y6J0K0E8A7A1F9_1471806724_5_2.jpg','productimages/15_Y6J0K0E8A7A1F9_1471806724_5_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_Y6J0K0E8A7A1F9_1471806724_5_3.jpg','productimages/15_Y6J0K0E8A7A1F9_1471806724_5_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_Y6J0K0E8A7A1F9_1471806724_5_4.jpg'),(26,15,6,'productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_1.jpg','productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_2.jpg','productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_3.jpg','productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E1P3S2S4J9N9I4G4_1471806734_6_4.jpg'),(27,15,7,'productimages/15_E4P6H3O2_1471806740_7_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E4P6H3O2_1471806740_7_1.jpg','productimages/15_E4P6H3O2_1471806740_7_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E4P6H3O2_1471806740_7_2.jpg','productimages/15_E4P6H3O2_1471806740_7_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E4P6H3O2_1471806740_7_3.jpg','productimages/15_E4P6H3O2_1471806740_7_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_E4P6H3O2_1471806740_7_4.jpg'),(28,15,8,'productimages/15_F1X6H3Z9L4Q0_1471807734_8_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_F1X6H3Z9L4Q0_1471807734_8_1.jpg','productimages/15_F1X6H3Z9L4Q0_1471807734_8_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_F1X6H3Z9L4Q0_1471807734_8_2.jpg','productimages/15_F1X6H3Z9L4Q0_1471807734_8_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_F1X6H3Z9L4Q0_1471807734_8_3.jpg','productimages/15_F1X6H3Z9L4Q0_1471807734_8_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/15_F1X6H3Z9L4Q0_1471807734_8_4.jpg'),(29,16,0,'productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_1.jpg','productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_2.jpg','productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_3.jpg','productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_R0D7L6R8Y0M1U5K3_1471862220_0_4.jpg'),(30,16,1,'productimages/16_W7R4A1O9_1471862277_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_W7R4A1O9_1471862277_1_1.jpg','productimages/16_W7R4A1O9_1471862277_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_W7R4A1O9_1471862277_1_2.jpg','productimages/16_W7R4A1O9_1471862277_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_W7R4A1O9_1471862277_1_3.jpg','productimages/16_W7R4A1O9_1471862277_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_W7R4A1O9_1471862277_1_4.jpg'),(31,16,2,'productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_1.jpg','productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_2.jpg','productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_3.jpg','productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_J1O3A2K1B8W7S8U1_1471862289_2_4.jpg'),(32,16,3,'productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_1.jpg','productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_2.jpg','productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_3.jpg','productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/16_X7S3X3B7E1U4E8T0_1471862308_3_4.jpg'),(33,19,0,'productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_1.jpg','productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_2.jpg','productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_3.jpg','productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_Q2H1C5D7O4R3Y9D2_1472323442_0_4.jpg'),(34,19,1,'productimages/19_O2M8K6Y4F0H7T1_1472323450_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_O2M8K6Y4F0H7T1_1472323450_1_1.jpg','productimages/19_O2M8K6Y4F0H7T1_1472323450_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_O2M8K6Y4F0H7T1_1472323450_1_2.jpg','productimages/19_O2M8K6Y4F0H7T1_1472323450_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_O2M8K6Y4F0H7T1_1472323450_1_3.jpg','productimages/19_O2M8K6Y4F0H7T1_1472323450_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/19_O2M8K6Y4F0H7T1_1472323450_1_4.jpg'),(35,1,0,'productimages/1_G9K9J9Y6N4L1L1_1472324588_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_G9K9J9Y6N4L1L1_1472324588_0_1.jpg','productimages/1_G9K9J9Y6N4L1L1_1472324588_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_G9K9J9Y6N4L1L1_1472324588_0_2.jpg','productimages/1_G9K9J9Y6N4L1L1_1472324588_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_G9K9J9Y6N4L1L1_1472324588_0_3.jpg','productimages/1_G9K9J9Y6N4L1L1_1472324588_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_G9K9J9Y6N4L1L1_1472324588_0_4.jpg'),(36,1,1,'productimages/1_X2C7O4P4C2T1K3_1472324592_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_X2C7O4P4C2T1K3_1472324592_1_1.jpg','productimages/1_X2C7O4P4C2T1K3_1472324592_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_X2C7O4P4C2T1K3_1472324592_1_2.jpg','productimages/1_X2C7O4P4C2T1K3_1472324592_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_X2C7O4P4C2T1K3_1472324592_1_3.jpg','productimages/1_X2C7O4P4C2T1K3_1472324592_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/1_X2C7O4P4C2T1K3_1472324592_1_4.jpg'),(37,5,0,'productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_1.jpg','productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_2.jpg','productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_3.jpg','productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_X7T0P9L2M8Y9G6I4_1472399785_0_4.jpg'),(38,5,1,'productimages/5_I7J0I6E3Y6V8A3_1472399788_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_I7J0I6E3Y6V8A3_1472399788_1_1.jpg','productimages/5_I7J0I6E3Y6V8A3_1472399788_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_I7J0I6E3Y6V8A3_1472399788_1_2.jpg','productimages/5_I7J0I6E3Y6V8A3_1472399788_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_I7J0I6E3Y6V8A3_1472399788_1_3.jpg','productimages/5_I7J0I6E3Y6V8A3_1472399788_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_I7J0I6E3Y6V8A3_1472399788_1_4.jpg'),(39,5,2,'productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_1.jpg','productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_2.jpg','productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_3.jpg','productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/5_Q5M6D8F1M1K9X3W6_1472399792_2_4.jpg'),(40,8,0,'productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_1.jpg','productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_2.jpg','productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_3.jpg','productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_C6I2R3M1Y6D7F1P6_1472476972_0_4.jpg'),(41,8,1,'productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_1.jpg','productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_2.jpg','productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_3.jpg','productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_M2C8Y5V9W5A1Z4_1472477047_1_4.jpg'),(43,8,2,'productimages/8_Z2Y8D5I2T2X0_1472477072_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_Z2Y8D5I2T2X0_1472477072_2_1.jpg','productimages/8_Z2Y8D5I2T2X0_1472477072_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_Z2Y8D5I2T2X0_1472477072_2_2.jpg','productimages/8_Z2Y8D5I2T2X0_1472477072_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_Z2Y8D5I2T2X0_1472477072_2_3.jpg','productimages/8_Z2Y8D5I2T2X0_1472477072_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/8_Z2Y8D5I2T2X0_1472477072_2_4.jpg'),(44,10,0,'productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_1.jpg','productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_2.jpg','productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_3.jpg','productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_L6Y3I1H6Y5Z4N6H6_1472494304_0_4.jpg'),(45,10,1,'productimages/10_X0G2S7L9_1472494308_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_X0G2S7L9_1472494308_1_1.jpg','productimages/10_X0G2S7L9_1472494308_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_X0G2S7L9_1472494308_1_2.jpg','productimages/10_X0G2S7L9_1472494308_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_X0G2S7L9_1472494308_1_3.jpg','productimages/10_X0G2S7L9_1472494308_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/10_X0G2S7L9_1472494308_1_4.jpg'),(46,11,0,'productimages/11_Y1V6R9K6_1472552492_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_Y1V6R9K6_1472552492_0_1.jpg','productimages/11_Y1V6R9K6_1472552492_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_Y1V6R9K6_1472552492_0_2.jpg','productimages/11_Y1V6R9K6_1472552492_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_Y1V6R9K6_1472552492_0_3.jpg','productimages/11_Y1V6R9K6_1472552492_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_Y1V6R9K6_1472552492_0_4.jpg'),(47,11,1,'productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_1.jpg','productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_2.jpg','productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_3.jpg','productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_W5V8S8E0M1V8T5E2_1472552505_1_4.jpg'),(48,11,2,'productimages/11_J7L0U3D7G3T1U5_1472552516_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_J7L0U3D7G3T1U5_1472552516_2_1.jpg','productimages/11_J7L0U3D7G3T1U5_1472552516_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_J7L0U3D7G3T1U5_1472552516_2_2.jpg','productimages/11_J7L0U3D7G3T1U5_1472552516_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_J7L0U3D7G3T1U5_1472552516_2_3.jpg','productimages/11_J7L0U3D7G3T1U5_1472552516_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/11_J7L0U3D7G3T1U5_1472552516_2_4.jpg'),(49,17,0,'productimages/17_D0Y4L5W2W6F9P7_1472904027_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D0Y4L5W2W6F9P7_1472904027_0_1.jpg','productimages/17_D0Y4L5W2W6F9P7_1472904027_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D0Y4L5W2W6F9P7_1472904027_0_2.jpg','productimages/17_D0Y4L5W2W6F9P7_1472904027_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D0Y4L5W2W6F9P7_1472904027_0_3.jpg','productimages/17_D0Y4L5W2W6F9P7_1472904027_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D0Y4L5W2W6F9P7_1472904027_0_4.jpg'),(50,17,1,'productimages/17_B3E1P1D8Y0_1472904048_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_B3E1P1D8Y0_1472904048_1_1.jpg','productimages/17_B3E1P1D8Y0_1472904048_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_B3E1P1D8Y0_1472904048_1_2.jpg','productimages/17_B3E1P1D8Y0_1472904048_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_B3E1P1D8Y0_1472904048_1_3.jpg','productimages/17_B3E1P1D8Y0_1472904048_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_B3E1P1D8Y0_1472904048_1_4.jpg'),(51,17,2,'productimages/17_D3J9F5L1J0S1W6_1472904073_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D3J9F5L1J0S1W6_1472904073_2_1.jpg','productimages/17_D3J9F5L1J0S1W6_1472904073_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D3J9F5L1J0S1W6_1472904073_2_2.jpg','productimages/17_D3J9F5L1J0S1W6_1472904073_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D3J9F5L1J0S1W6_1472904073_2_3.jpg','productimages/17_D3J9F5L1J0S1W6_1472904073_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_D3J9F5L1J0S1W6_1472904073_2_4.jpg'),(52,17,3,'productimages/17_M7K4B8A8J9U5I4_1472904093_3_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_M7K4B8A8J9U5I4_1472904093_3_1.jpg','productimages/17_M7K4B8A8J9U5I4_1472904093_3_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_M7K4B8A8J9U5I4_1472904093_3_2.jpg','productimages/17_M7K4B8A8J9U5I4_1472904093_3_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_M7K4B8A8J9U5I4_1472904093_3_3.jpg','productimages/17_M7K4B8A8J9U5I4_1472904093_3_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_M7K4B8A8J9U5I4_1472904093_3_4.jpg'),(53,17,4,'productimages/17_H5W6Z7F3Q5_1472904104_4_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_H5W6Z7F3Q5_1472904104_4_1.jpg','productimages/17_H5W6Z7F3Q5_1472904104_4_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_H5W6Z7F3Q5_1472904104_4_2.jpg','productimages/17_H5W6Z7F3Q5_1472904104_4_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_H5W6Z7F3Q5_1472904104_4_3.jpg','productimages/17_H5W6Z7F3Q5_1472904104_4_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/17_H5W6Z7F3Q5_1472904104_4_4.jpg'),(54,18,0,'productimages/18_R8W1O1I8G9_1472904291_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_R8W1O1I8G9_1472904291_0_1.jpg','productimages/18_R8W1O1I8G9_1472904291_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_R8W1O1I8G9_1472904291_0_2.jpg','productimages/18_R8W1O1I8G9_1472904291_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_R8W1O1I8G9_1472904291_0_3.jpg','productimages/18_R8W1O1I8G9_1472904291_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_R8W1O1I8G9_1472904291_0_4.jpg'),(55,18,1,'productimages/18_U0K2T5Z2_1472904295_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_U0K2T5Z2_1472904295_1_1.jpg','productimages/18_U0K2T5Z2_1472904295_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_U0K2T5Z2_1472904295_1_2.jpg','productimages/18_U0K2T5Z2_1472904295_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_U0K2T5Z2_1472904295_1_3.jpg','productimages/18_U0K2T5Z2_1472904295_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/18_U0K2T5Z2_1472904295_1_4.jpg'),(56,20,0,'productimages/20_Q3W7R5V0P4K9_1473186836_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_Q3W7R5V0P4K9_1473186836_0_1.jpg','productimages/20_Q3W7R5V0P4K9_1473186836_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_Q3W7R5V0P4K9_1473186836_0_2.jpg','productimages/20_Q3W7R5V0P4K9_1473186836_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_Q3W7R5V0P4K9_1473186836_0_3.jpg','productimages/20_Q3W7R5V0P4K9_1473186836_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_Q3W7R5V0P4K9_1473186836_0_4.jpg'),(57,20,1,'productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_1.jpg','productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_2.jpg','productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_3.jpg','productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/20_K4Z7E1K6Y4W2K0O6_1473186843_1_4.jpg'),(59,21,1,'productimages/21_O5S5E7N7T5V4_1473188376_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_O5S5E7N7T5V4_1473188376_1_1.jpg','productimages/21_O5S5E7N7T5V4_1473188376_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_O5S5E7N7T5V4_1473188376_1_2.jpg','productimages/21_O5S5E7N7T5V4_1473188376_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_O5S5E7N7T5V4_1473188376_1_3.jpg','productimages/21_O5S5E7N7T5V4_1473188376_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_O5S5E7N7T5V4_1473188376_1_4.jpg'),(60,22,0,'productimages/22_V1L0F1B3K2Q5_1473246346_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/22_V1L0F1B3K2Q5_1473246346_0_1.jpg','productimages/22_V1L0F1B3K2Q5_1473246346_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/22_V1L0F1B3K2Q5_1473246346_0_2.jpg','productimages/22_V1L0F1B3K2Q5_1473246346_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/22_V1L0F1B3K2Q5_1473246346_0_3.jpg','productimages/22_V1L0F1B3K2Q5_1473246346_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/22_V1L0F1B3K2Q5_1473246346_0_4.jpg'),(61,23,0,'productimages/23_X7B1M3J2B1R3J0_1473247587_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/23_X7B1M3J2B1R3J0_1473247587_0_1.jpg','productimages/23_X7B1M3J2B1R3J0_1473247587_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/23_X7B1M3J2B1R3J0_1473247587_0_2.jpg','productimages/23_X7B1M3J2B1R3J0_1473247587_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/23_X7B1M3J2B1R3J0_1473247587_0_3.jpg','productimages/23_X7B1M3J2B1R3J0_1473247587_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/23_X7B1M3J2B1R3J0_1473247587_0_4.jpg'),(62,24,0,'productimages/24_D6M6H8N0_1474313165_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/24_D6M6H8N0_1474313165_0_1.jpg','productimages/24_D6M6H8N0_1474313165_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/24_D6M6H8N0_1474313165_0_2.jpg','productimages/24_D6M6H8N0_1474313165_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/24_D6M6H8N0_1474313165_0_3.jpg','productimages/24_D6M6H8N0_1474313165_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/24_D6M6H8N0_1474313165_0_4.jpg'),(63,21,2,'productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_1.jpg','productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_2.jpg','productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_3.jpg','productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_V8X6M4D3S7F6E0X9_1474824679_2_4.jpg'),(64,30,0,'productimages/30_G8F2M4A5T5M1I1_1475512043_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/30_G8F2M4A5T5M1I1_1475512043_0_1.jpg','productimages/30_G8F2M4A5T5M1I1_1475512043_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/30_G8F2M4A5T5M1I1_1475512043_0_2.jpg','productimages/30_G8F2M4A5T5M1I1_1475512043_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/30_G8F2M4A5T5M1I1_1475512043_0_3.jpg','productimages/30_G8F2M4A5T5M1I1_1475512043_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/30_G8F2M4A5T5M1I1_1475512043_0_4.jpg'),(71,31,0,'productimages/31_F9V5S0V5_1475519940_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/31_F9V5S0V5_1475519940_0_1.jpg','productimages/31_F9V5S0V5_1475519940_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/31_F9V5S0V5_1475519940_0_2.jpg','productimages/31_F9V5S0V5_1475519940_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/31_F9V5S0V5_1475519940_0_3.jpg','productimages/31_F9V5S0V5_1475519940_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/31_F9V5S0V5_1475519940_0_4.jpg'),(74,21,0,'productimages/21_H1K6U1T7V4B1_1475939229_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_H1K6U1T7V4B1_1475939229_0_1.jpg','productimages/21_H1K6U1T7V4B1_1475939229_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_H1K6U1T7V4B1_1475939229_0_2.jpg','productimages/21_H1K6U1T7V4B1_1475939229_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_H1K6U1T7V4B1_1475939229_0_3.jpg','productimages/21_H1K6U1T7V4B1_1475939229_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/21_H1K6U1T7V4B1_1475939229_0_4.jpg'),(75,34,0,'productimages/34_N5V7C6H6Y1_1476043899_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/34_N5V7C6H6Y1_1476043899_0_1.jpg','productimages/34_N5V7C6H6Y1_1476043899_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/34_N5V7C6H6Y1_1476043899_0_2.jpg','productimages/34_N5V7C6H6Y1_1476043899_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/34_N5V7C6H6Y1_1476043899_0_3.jpg','productimages/34_N5V7C6H6Y1_1476043899_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/34_N5V7C6H6Y1_1476043899_0_4.jpg'),(76,35,0,'productimages/35_K5K1T5X5E3_1476302128_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/35_K5K1T5X5E3_1476302128_0_1.jpg','productimages/35_K5K1T5X5E3_1476302128_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/35_K5K1T5X5E3_1476302128_0_2.jpg','productimages/35_K5K1T5X5E3_1476302128_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/35_K5K1T5X5E3_1476302128_0_3.jpg','productimages/35_K5K1T5X5E3_1476302128_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/35_K5K1T5X5E3_1476302128_0_4.jpg'),(77,37,0,'productimages/37_I2B2Z5L2_1476526346_0_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_I2B2Z5L2_1476526346_0_1.jpg','productimages/37_I2B2Z5L2_1476526346_0_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_I2B2Z5L2_1476526346_0_2.jpg','productimages/37_I2B2Z5L2_1476526346_0_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_I2B2Z5L2_1476526346_0_3.jpg','productimages/37_I2B2Z5L2_1476526346_0_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_I2B2Z5L2_1476526346_0_4.jpg'),(78,37,1,'productimages/37_F7T2E3W6F0P8F3_1476526368_1_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_F7T2E3W6F0P8F3_1476526368_1_1.jpg','productimages/37_F7T2E3W6F0P8F3_1476526368_1_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_F7T2E3W6F0P8F3_1476526368_1_2.jpg','productimages/37_F7T2E3W6F0P8F3_1476526368_1_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_F7T2E3W6F0P8F3_1476526368_1_3.jpg','productimages/37_F7T2E3W6F0P8F3_1476526368_1_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_F7T2E3W6F0P8F3_1476526368_1_4.jpg'),(79,37,2,'productimages/37_L0A8W2X0R1F4X5_1476526372_2_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_L0A8W2X0R1F4X5_1476526372_2_1.jpg','productimages/37_L0A8W2X0R1F4X5_1476526372_2_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_L0A8W2X0R1F4X5_1476526372_2_2.jpg','productimages/37_L0A8W2X0R1F4X5_1476526372_2_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_L0A8W2X0R1F4X5_1476526372_2_3.jpg','productimages/37_L0A8W2X0R1F4X5_1476526372_2_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_L0A8W2X0R1F4X5_1476526372_2_4.jpg'),(81,37,3,'productimages/37_J3M0W0O1_1476528260_3_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_J3M0W0O1_1476528260_3_1.jpg','productimages/37_J3M0W0O1_1476528260_3_2.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_J3M0W0O1_1476528260_3_2.jpg','productimages/37_J3M0W0O1_1476528260_3_3.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_J3M0W0O1_1476528260_3_3.jpg','productimages/37_J3M0W0O1_1476528260_3_4.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/productimages/37_J3M0W0O1_1476528260_3_4.jpg');
/*!40000 ALTER TABLE `productimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `productgroup_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `admindeleted` tinyint(1) NOT NULL,
  `dateadd` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `text` longtext CHARACTER SET utf8,
  `salestype` tinyint(1) DEFAULT NULL,
  `lastshowdates` datetime DEFAULT NULL,
  `cargopricetype` tinyint(1) DEFAULT NULL,
  `cargoprice` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `lastshowday` int(11) DEFAULT NULL,
  `lastbidday` int(11) DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  `startingprice` double DEFAULT NULL,
  `viewed` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `discount` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `currency` tinyint(1) DEFAULT NULL,
  `updatedateadd` datetime NOT NULL,
  `totalpoint` tinyint(1) NOT NULL,
  `uservotecount` int(11) NOT NULL,
  `viewok` tinyint(1) NOT NULL,
  `lastbidprice` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`products_id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (15,5,'Deneme Ürünü',1,1,0,'2016-09-03 09:57:44',2,'Mehmet','<p>sdasdasdasdadad</p>\n',1,'2016-09-10 09:58:31',NULL,NULL,30,7,NULL,NULL,NULL,0,10015,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(16,5,'Ürün1 asd as',10,1,0,'2016-09-03 14:57:09',2,'asd asd Ürün2','<p>adasdasd</p>\n',2,'2016-10-03 14:58:41',NULL,NULL,2000,30,NULL,NULL,NULL,0,10016,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(17,5,'Ayakkabı',1,1,0,'2016-09-03 14:59:37',2,'En Uygun Ayakkabılar','<p>adadad asd asd asd adasd asd asd asd ad</p>\n',2,'2016-09-13 16:03:08',NULL,NULL,500,10,NULL,NULL,NULL,0,10017,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(18,2,'dasdasd a',3,1,0,'2016-09-03 15:04:36',2,'asdas dasdas','<p>asdasd</p>\n',1,'2017-03-02 15:05:05',NULL,NULL,222.33,180,NULL,NULL,NULL,0,10018,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(19,5,'Samsung Galaxy S6 32 GB (Samsung Türkiye Garantili)',3,1,0,'2016-09-03 15:20:05',1,'Seçili Beşken Elektronik mağazası ürünlerinde kargo bedava!','<p>Samsung Galaxy S6 <img src=\"http://images.hepsiburada.net/assets/Telefon/ProductDesc/akilli-telefon-samsung-galaxy-s6-html1.jpg\" /> Yeni Galaxy İle Tanışın</p>\r\n\r\n<p>Metal ve cam tasarımın şıklığı, Yeni Samsung Galaxy S6 ile Galaxy&rsquo;nin en yenisi, Galaxy&rsquo;nin en iyisi karşınızda. Onunla tasarımda yeni bir d&ouml;neme merhaba deyin. Metal tasarımın kusursuzluğu camın en saf hali ile buluştu. Gelecek yeni Samsung Galaxy S6 ile akıllı telefonunuzda. Parlaklık ve şıklık. Hayallerinizin &ouml;n&uuml;n&uuml; a&ccedil;ın, hayal edebildiğinizin &ouml;tesinde yeni Samsung Galaxy S6&hellip;</p>\r\n\r\n<p>S&uuml;per Hızlı Şarj &Ouml;zelliği</p>\r\n\r\n<p>S&uuml;per hızlı şarj &ouml;zelliği ile artık şarj ile ilgili sorunlarınız artık kalmayacak. Ortalama 10 dakikalık bir şarj s&uuml;resi ile bir film izleyebilecek (şarj s&uuml;resi, ışık yapısı, kullanılan uygulamalar gibi &ouml;zelliklerle farklılık g&ouml;sterebilir) şarja sahip olabilirsiniz. Sizin i&ccedil;in dakikalar i&ccedil;erisinde hazır olacak. Galaxy serisi akıllı telefonlara oranla 1i5 kat daha hızlı şarj olabilen yeni Samsung Galaxy S6 sizin i&ccedil;in en m&uuml;kemmeli olarak tasarlandı. Kablosuz şarj &ouml;zelliğine* ile kablosuz şarj cihazınıza yerleştirerek anında şarj etmeye başlayabilirsiniz. * Kablosuz şarj pedi dahil değildir. Sadece WPC ve PMA uyumlu kablosuz şarj pedlerinde ge&ccedil;erlidir.</p>\r\n\r\n<p><img src=\"http://images.hepsiburada.net/assets/Telefon/ProductDesc/akilli-telefon-samsung-galaxy-s6-html2.jpg\" /> <img src=\"http://images.hepsiburada.net/assets/Telefon/ProductDesc/akilli-telefon-samsung-galaxy-s6-html3.jpg\" /> Sizin İ&ccedil;in En Değerli Anlar Hep Yanınızda</p>\r\n\r\n<p>Yeni Samsung Galaxy S6 &uuml;st&uuml;n kamera &ouml;zellikleriyle sizi yeni bir deneyime davet ediyor. Hızlı kamera başlatma &ouml;zelliği ile artık hi&ccedil;bir anı ka&ccedil;ırmayacaksınız. Ana ekran tuşuna iki defa basmanız yeterli. En g&uuml;zel anları anında yakalayabilecek yaratıcılığınızı dilediğinizde kullanabileceksiniz. Hayatın en g&uuml;zel anları onunla en kusursuz halleriyle hep yanınızda. Yeni F1.9 diyaframı ile &ccedil;ok daha net fotoğraflar &ccedil;ekeceksiniz.</p>\r\n\r\n<p>Akıllı Telefonunuz Onunla G&uuml;vende</p>\r\n\r\n<p>Yeni Samsung Galaxy S6 akıllı telefonunuzda g&uuml;venliğiniz i&ccedil;in 3 farklı &ouml;zellikle donatıldı. Knox ile akıllı telefonunuzda sizden başka kimsenin ulaşamayacağı &ouml;zel bir alanınız var. İş bilgileriniz, &ouml;zel bilgileriniz artık g&uuml;vende. Samsung Galaxy S6 Knox &ouml;zelliği ile en &ouml;nemli bilgilerinizi kendinize ait yeni bir akıllı telefon ekranında g&ouml;r&uuml;nt&uuml;leyebileceksiniz. Parmak izi sens&ouml;r&uuml; ile akıllı telefonunuz artık daha kişisel. Sanal şifreleme ile g&uuml;venlik sağlayan sanal kredi kartı hizmetlerinden faydalanabileceksiniz.</p>\r\n\r\n<p><img src=\"http://images.hepsiburada.net/assets/Telefon/ProductDesc/akilli-telefon-samsung-galaxy-s6-html4.jpg\" /> &nbsp; Estetik ve şık dizaynı ile dikkat &ccedil;eken Samsung&#39;un yeni modeli Galaxy S6, akıcı kullanımı ve hafif tasarımı ile keyifli bir kullanım imkanı sunuyor. Metal ve camın birleştiği modern yapısını g&uuml;&ccedil;lendirilmiş teknolojik &ouml;zellikler ile destekleyen Samsung Galaxy S6, 6.8 mm kalınlığı ve 138 gram ağırlığı ile segmentindeki rakipleri arasında &ouml;n plana &ccedil;ıkıyor. Samsung Galaxy S6, 2560*1440 piksel &ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğe sahip 5.1 in&ccedil; Super AMOLED Gorilla Glass 4 ekranı ile benzersiz bir deneyim olanağı veriyor. 8 &ccedil;ekirdekli 64-bit Exynos 7420 işlemcisi, 3 GB Ram ile birleştiğinde &uuml;st&uuml;n bir performans sağlıyor. Kablosuz şarj ve hızlı şarj se&ccedil;eneklerine sahip olan yeni teknolojisi ile kolay şarj olanağı sunan Samsung Galaxy S6, sosyal ağlardan oyunlara kadar farklı aktiviteleri keyifle kullanabilmenize yardımcı oluyor. Parmak izi tarayıcısı ile geliştirilmiş bir g&uuml;venlik imkanı sunan ve akıllı y&ouml;neticisi sayesinde pil &ouml;mr&uuml;, depolama, Ram ve g&uuml;venlik gibi konularda avantaj sağlayan Galaxy S6 benzersiz bir deneyim sunuyor. Geliştirilmiş f/1.9 lens&#39;e sahip 16 MP arka kamerası ve 5 MP &ouml;n kamerası ile &ccedil;ok net fotoğraflar yakalamanıza yardımcı olan Samsung Galaxy S6 ile sevdiklerinizle ge&ccedil;irdiğiniz anları kaydedebilir, &ccedil;ok net fotoğraflar &ccedil;ekebilirsiniz. Profesyonel bir deneyim sağlayan Galaxy S6, 32 GB dahili hafızası ile dilediğiniz videoları, uygulamaları ve oyunları depolayabilmenizi sağlıyor. &Uuml;st&uuml;n performans &ouml;zellikleri ve estetik dizaynı ile benzersiz bir deneyim sunan Samsung Galaxy S6, hepsiburada.com kalitesi ve g&uuml;vencesi ile ayağınıza geliyor. Dilerseniz &uuml;r&uuml;n&uuml; sepetinize ekleyerek hemen satın alabilirsiniz. Ayrıca Samsung Galaxy S6 Gold se&ccedil;eneği de sizleri bekliyor.</p>\r\n',2,'2016-09-18 14:52:01',NULL,NULL,NULL,NULL,14,NULL,220,0,10019,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(20,5,'Tam Altın 2016 Yeni Tarihli (Kulplu)',3,0,0,'2016-09-06 21:32:48',1,'Bu mağzada kargo bedava','<p>asdasdas</p>\n',1,'2017-06-05 18:21:51',NULL,NULL,949,240,NULL,NULL,NULL,3,10020,'35',1,'2016-10-08 18:21:51',0,0,1,NULL),(21,2,'Zeyland Erkek Çocuk Beyaz Gömlek K-62Kl3584 2',3,0,0,'2016-09-06 21:53:55',1,'Bu mağazada kargo bedava!','<p>ASDASDASD2</p>\n',2,'2016-12-20 09:58:12',NULL,NULL,11.22,NULL,30,NULL,11.22,47,10021,'0',1,'2016-11-20 09:58:12',0,0,1,'21.8'),(22,5,'denem asdadas  sa',1,1,0,'2016-09-07 10:30:50',2,'denemöeasd asd asd as','<p>deneme</p>\n',1,'2017-09-02 14:05:59',NULL,NULL,5000,360,NULL,NULL,NULL,0,10022,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(23,5,'SDJASLKDJASKL DJAKL',2,1,0,'2016-09-07 14:26:05',2,'LASDJKALŞDK','<p>ASDASDA DA DASDASDASDADVASVAS AS ASD AD ASD ASD ASD ASD</p>\n',2,'2016-09-21 14:26:39',NULL,NULL,NULL,NULL,14,NULL,300,0,10023,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(24,2,'asdasd',3,1,0,'2016-09-19 22:11:03',2,'asdasdas','<p>sadasd</p>\n',1,'2016-10-19 22:26:15',NULL,NULL,2.22,30,NULL,NULL,NULL,0,10024,NULL,1,'2016-09-25 10:40:01',0,0,0,NULL),(34,5,'Deneme',1,0,0,'2016-10-09 23:10:13',1,'Deneme123','<p>Deneme &Uuml;r&uuml;n&uuml;d&uuml;r</p>\n',2,'2016-10-19 23:11:57',NULL,NULL,NULL,NULL,10,NULL,160,0,623907196,'0',1,'2016-10-09 23:11:57',0,0,0,NULL),(37,5,'Philips BG105 Erkek Vücut Bakım Tıraş Makinesi',3,0,0,'2016-10-15 13:09:59',1,'ayn9ı gün kargoda','<p><img src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/Series1000_BG105_bodygroom_VID_01.jpg\" style=\"height:auto; width:100%\" /><br />\n<br />\n&nbsp;</p>\n\n<p>BG105, v&uuml;cut i&ccedil;in kullanılan manuel ve elektrikli ara&ccedil;lara en iyi alternatiftir. Erkek v&uuml;cudu i&ccedil;in &ouml;zel olarak tasarlanan BG105, benzersiz bir cilt koruma sistemine ve ince tasarıma sahiptir; b&ouml;ylece daha k&uuml;&ccedil;&uuml;k ve hassas b&ouml;lgelerde ya da hareket halindeyken kullanım i&ccedil;in idealdir.</p>\n\n<p><img src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/BG105_11_RTP__16030204z2.png\" style=\"margin:0 auto\" /> <img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> &nbsp; <img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> &nbsp;</p>\n\n<p style=\"text-align:center\">Hassas b&ouml;lgelerde<br />\nkesik, &ccedil;izik olmadan,<br />\n<span style=\"font-size:xx-large\">tehlikesiz</span> &amp; <span style=\"font-size:xx-large\">kolay </span><br />\ntıraş.</p>\n\n<p><img src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/Series1000_BG105_bodygroom_tehlikesiz_kolay.jpg\" style=\"margin:0 auto; padding-right:20px\" /> <img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> <img alt=\"Cilt koruma sistemi\nBenzersiz cilt koruma sistemi, vücudunuzun en hassas bölgelerini bile koruduğundan bıçakların keskin kenarıyla cildiniz doğrudan temas etmeden rahatça 0,5 mm\'ye kadar kısa düzeltme yapabilirsiniz.\n\nÇift yönlü düzeltici ve tarak\nÇift yönlü düzelticiye ve 3 mm tarağa sahip benzersiz tasarım ile farklı yönlerde uzayan tüyleri bile yakalayıp kesmeniz mümkündür. Daha kalın tüyler için tarakla ön düzeltme yapılması önerilir.\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/Series1000_BG105-11_bodygroom_VID_07.jpg\" style=\"height:auto; width:100%\" /> <img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> <img src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/Series1000_BG105_bodygroom_10-8.jpg\" style=\"margin:0 auto\" /></p>\n\n<p style=\"text-align:center\">Kullanan,<br />\n<span style=\"font-size:xx-large\">10</span> erkekten <span style=\"font-size:xx-large\">8</span>&#39;i<br />\n<span style=\"font-size:xx-large\">Philips BG105</span>&#39;i<br />\n&ouml;neriyor*</p>\n\n<p>&nbsp;</p>\n\n<p style=\"text-align:center\">*Nielsen&#39;in 2016&#39;da, 101 erkekle ger&ccedil;ekleştirdiği araştırmaya g&ouml;re</p>\n\n<p><img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> Sık&ccedil;a Sorulan Sorular 1. &Uuml;r&uuml;n&uuml;n kullanım &ouml;mr&uuml; ne kadar?</p>\n\n<p>D&uuml;nya &ccedil;apında 2 yıl garantili olan Philips BG105 uzun &ouml;m&uuml;rl&uuml;d&uuml;r.</p>\n\n<p>2. V&uuml;cudun hangi b&ouml;lgelerinde kullanılabilir?</p>\n\n<p>Philips BG105, benzersiz bir cilt koruma sistemine ve ince tasarıma sahiptir. B&ouml;ylece daha k&uuml;&ccedil;&uuml;k ve hassas b&ouml;lgelerde ya da hareket halindeyken kullanım i&ccedil;in idealdir. Sadece boyun &ccedil;izgisinin altında kalan b&ouml;lgelerde kullanılabilir. Erkek v&uuml;cuduna &ouml;zel, koltuk altı, g&ouml;ğ&uuml;s ve karın b&ouml;lgesi, sırt ve omuzlar, kasık b&ouml;lgesi ve bacaklarda g&uuml;venli ve rahat kullanım i&ccedil;in tasarlanmıştır.</p>\n\n<p>3. Islak kullanım i&ccedil;in uygun mudur?</p>\n\n<p>Philips BG 105&rsquo;i ıslak veya kuru olarak rahatlıkla kullanabilirsiniz. Su ge&ccedil;irmez olup dușta kullanımı %100 g&uuml;venlidir. En iyi sonu&ccedil;lar i&ccedil;in duștan &ouml;nce kuru t&uuml;yler &uuml;zerinde kullanmanızı tavsiye ederiz.</p>\n\n<p>4. Cildi tahriş eder mi?</p>\n\n<p>Philips BG105, cildi kesinlikle tahriş etmez. Benzersiz cilt koruma sistemi, v&uuml;cudunuzun en hassas b&ouml;lgelerini bile koruduğundan bı&ccedil;akların keskin kenarıyla cildiniz doğrudan temas etmeyecek şekilde tasarlanmıştır.</p>\n\n<p>5. T&uuml;y&uuml;n sıfırlanmasını sağlar mı?</p>\n\n<p>Philips BG105 neredeyse sıfır tıraş sağlar. 0,05 cm&#39;ye kadar, yani g&ouml;zle g&ouml;r&uuml;lmeyecek bir tıraş sonucu rahatlıkla elde edebilirsiniz. Benzersiz cilt koruma sistemi, v&uuml;cudunuzun en hassas b&ouml;lgelerini korumak uzere tasarlandığı i&ccedil;in bı&ccedil;akların keskin kenarı cildiniz ile doğrudan temas etmemektedir.</p>\n\n<p>6. En iyi sonu&ccedil; i&ccedil;in nasıl kullanmalıyım?</p>\n\n<p>Philips BG105 su ge&ccedil;irmez olup dușta kullanımı %100 g&uuml;venlidir. İșiniz bittiğinde durulayarak temizlemeniz yeterlidir. En iyi sonu&ccedil;lar i&ccedil;in duștan &ouml;nce kuru t&uuml;yler &uuml;zerinde kullanabilirsiniz.</p>\n\n<p>7. Nasıl temizlenir?</p>\n\n<p>Philips BG105 su ge&ccedil;irmez olduğundan, ișiniz bittiğinde durulayarak temizlemeniz yeterlidir.</p>\n\n<p>8. Yağlama gerektirir mi?</p>\n\n<p>Philips BG105 yağlama gerektirmez.</p>\n\n<p>9. Bı&ccedil;akların değiştirilmesi gerekir mi?</p>\n\n<p>Bı&ccedil;ak değişimine gerek olmadan 2 yıl garanti kapsamında uzun s&uuml;reli kullanılabilir.</p>\n\n<p>10. &Uuml;r&uuml;n&uuml; başka biriyle paylaşabilir miyim?</p>\n\n<p>Hijyenik nedenlerden dolayı sadece bir kişi tarafından kullanılmalıdır.</p>\n\n<p>11. Pil ile ne kadar s&uuml;re kullanılabilir?</p>\n\n<p>Bir AA pil, 2 aylık kullanım sağlar. &Ccedil;alıșma s&uuml;resi t&uuml;y tipine ve kullanım sıklığına bağlı olarak farklılık g&ouml;sterebilir.</p>\n\n<p>12. Pili kendim değiştirebilir miyim?</p>\n\n<p>Philips BG 105&rsquo;in AA pilini kendiniz rahatlıkla değiştirebilirsiniz. Pil b&ouml;lmesi kapağını kaldırmak i&ccedil;in kapağı kilit a&ccedil;ık konumuna gelinceye kadar saat y&ouml;n&uuml;nde d&ouml;nd&uuml;r&uuml;p pil b&ouml;lmesi kapağını tutma yerinden &ccedil;ıkarabilirsiniz.</p>\n\n<p><img alt=\"\" src=\"http://images.hepsiburada.com/assets/SG/ProductDesc/bg105divider.png\" style=\"margin:0 auto\" /> &nbsp; &nbsp;</p>\n\n<table>\n	<tbody>\n		<tr>\n			<td><a href=\"javascript:;\" onclick=\"_FFOpenWin(\"><img alt=\"\" id=\"_flixbtn900737\" src=\"http://media.flixcar.com/delivery//static/minisite-buttons/default/default-tr.gif\" /></a> &nbsp; &nbsp; &nbsp; Philips Bodygroom series 1000 erkek v&uuml;cut bakım seti BG105/10 Cilt koruma sistemi 1 tarak, 3 mm 1 AA pil dahildir Duş kablosu <strong>V&uuml;cut t&uuml;ylerini d&uuml;zeltir, cildi korur</strong>\n\n			<p>Hassas b&ouml;lgelerde bile</p>\n\n			<p>1000 Serisi, diğer y&uuml;z i&ccedil;in &uuml;retilen diğer manuel veya elektrikli aletlerin aksine v&uuml;cuda &ouml;zel olarak tasarlanmıştır. Benzersiz bir cilt koruma sistemi ve kompakt tasarım ile birlikte gelir. K&uuml;&ccedil;&uuml;k, hassas b&ouml;lgelerde ya da hareket halinde kullanım i&ccedil;in idealdir.</p>\n			&Ouml;nemli noktalar <strong>Cilt dostu performans</strong>\n\n			<ul>\n				<li>0,5 mm&#39;ye kadar yakın d&uuml;zeltme yaparken cildinizi koruyun</li>\n				<li>3 mm tarak ile t&uuml;yleri istediğiniz y&ouml;nde d&uuml;zeltin</li>\n			</ul>\n			<strong>Kullanım kolaylığı</strong>\n\n			<ul>\n				<li>2 aylık kullanım i&ccedil;in bir adet AA pil dahildir</li>\n				<li>Duşta veya duş dışında kolay temizleme ve kullanım</li>\n				<li>Maksimum kontrol i&ccedil;in ergonomik tutma yeri</li>\n				<li>Kolay saklama i&ccedil;in duş kablosu</li>\n			</ul>\n			<strong>Uzun &ouml;m&uuml;rl&uuml;</strong>\n\n			<ul>\n				<li>2 yıl garantili, yağlama gerekmez</li>\n			</ul>\n			&nbsp; &nbsp;\n\n			<ul>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976017274-BG105_10-MI1-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976017274-BG105_10-MI1-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976017352-BG105_10-RTP-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976017352-BG105_10-RTP-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976017100-BG105_10-DPP-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976017100-BG105_10-DPP-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976016546-BG105_10-D2P-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976016546-BG105_10-D2P-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976016591-BG105_10-D4P-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976016591-BG105_10-D4P-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976016332-BG105_10-APP-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976016332-BG105_10-APP-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976017625-BG105_10-UPL-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976017625-BG105_10-UPL-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-341699881-BG105_10-U1P-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-341699881-BG105_10-U1P-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-1142523909-BG105_10-U2P-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-1142523909-BG105_10-U2P-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-976017481-BG105_10-U2P-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-976017481-BG105_10-U2P-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n				<li><a href=\"http://media.flixcar.com/f360cdn/Philips-1038467374-BG105_10-BPP-global-001-zoom.tif\"><img alt=\"image\" src=\"http://media.flixcar.com/f360cdn/Philips-1038467374-BG105_10-BPP-global-001-preview.tif\" style=\"height:135px; width:200px\" /> </a></li>\n			</ul>\n			&nbsp; &nbsp; &nbsp;\n\n			<table>\n				<tbody>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1088423988-F400076944_BG105_10-FIL-global-001.jpg\" /></td>\n						<td><strong>0,5 mm&#39;ye kadar yakın d&uuml;zeltme yaparken cildinizi koruyun</strong>\n						<p>Benzersiz cilt koruma sistemi, v&uuml;cudunuzun en hassas b&ouml;lgelerini bile koruduğundan bı&ccedil;akların keskin kenarıyla cildiniz doğrudan temas etmeden rahat&ccedil;a 0,5 mm&#39;ye kadar kısa d&uuml;zeltme yapabilirsiniz.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1088424049-F400076945_BG105_10-FIL-global-001.jpg\" /></td>\n						<td><strong>3 mm tarak ile t&uuml;yleri istediğiniz y&ouml;nde d&uuml;zeltin</strong>\n						<p>&Ccedil;ift y&ouml;nl&uuml; d&uuml;zelticiye ve 3 mm tarağa sahip benzersiz tasarım ile farklı y&ouml;nlerde uzayan t&uuml;yleri bile yakalayıp kesmeniz m&uuml;mk&uuml;nd&uuml;r. Daha kalın t&uuml;yler i&ccedil;in tarakla &ouml;n d&uuml;zeltme yapılması &ouml;nerilir.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-976734075-F400069006-FIL-global-001.jpg\" /></td>\n						<td><strong>2 aylık kullanım i&ccedil;in bir adet AA pil dahildir</strong>\n						<p>AA pille &ccedil;alışan bu kompakt d&uuml;zelticiyi ihtiyacınız olan her an ve her yerde kullanabilirsiniz. Bir pil, iki aylık kullanım sağlar; &ccedil;alışma s&uuml;resi t&uuml;y tipine ve v&uuml;cut bakımı sıklığına bağlı olarak farklılık g&ouml;sterebilir. En iyi performans i&ccedil;in yalnızca y&uuml;ksek kaliteli Philips Alkalin AA piller kullanın.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1088424159-F400069002_BG105_10-FIL-global-001.jpg\" /></td>\n						<td><strong>Duşta veya duş dışında kolay temizleme ve kullanım</strong>\n						<p>Bu v&uuml;cut bakım seti su ge&ccedil;irmez olup duşta kullanımı %100 g&uuml;venlidir; işiniz bittiğinde seti durulayarak temizlemeniz yeterlidir. En iyi sonu&ccedil;lar i&ccedil;in duştan &ouml;nce kuru t&uuml;yler &uuml;zerinde kullanın.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1088424182-F400075817_BG105_10-FIL-global-001.jpg\" /></td>\n						<td><strong>Maksimum kontrol i&ccedil;in ergonomik tutma yeri</strong>\n						<p>Kau&ccedil;uk tutma yeri; duşta veya duş dışında ıslak kullanım sırasında bile daha iyi kontrol sağlamak i&ccedil;in tasarlanmıştır.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1088424202-F400070397_BG105_10-FIL-global-001.jpg\" /></td>\n						<td><strong>Kolay saklama i&ccedil;in duş kablosu</strong>\n						<p>V&uuml;cut bakım setinizi duş kablosuyla sizin i&ccedil;in en rahat olan yere asın. Kolayca erişilebilir ve her durumda daima kullanıma hazırdır.</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img src=\"http://media.flixcar.com/f360cdn/Philips-1074425497-F400077592-FIL-global-001.jpg\" /></td>\n						<td><strong>2 yıl garantili, yağlama gerekmez</strong>\n						<p>T&uuml;m bakım &uuml;r&uuml;nlerimiz uzun &ouml;m&uuml;rl&uuml;d&uuml;r. Cihazlarımız d&uuml;nya &ccedil;apında 2 yıl garantilidir ve yağlanmaları gerekmez.</p>\n						</td>\n					</tr>\n				</tbody>\n			</table>\n			&Ouml;d&uuml;ller\n\n			<table>\n				<tbody>\n					<tr>\n						<td><img class=\"inpage_award_image\" src=\"http://media.flixcar.com/f360cdn/Philips-1041332037-GA40018399-GAP-global-001.jpg\" /></td>\n						<td><strong>2016 iF TASARIM &Ouml;D&Uuml;L&Uuml;</strong>\n						<p>BodyGroom 1000</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img class=\"inpage_award_image\" src=\"http://media.flixcar.com/f360cdn/Philips-1024824590-ALA_187750633-AWP-global-001.jpg\" /></td>\n						<td><strong>2016 iF TASARIM &Ouml;D&Uuml;L&Uuml;</strong>\n						<p>Philips BG105/10</p>\n						</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<table>\n				<tbody>\n					<tr>\n						<td><img class=\"inpage_award_image\" src=\"http://media.flixcar.com/f360cdn/Philips-1041332058-GA40018402-GAP-global-001.jpg\" /></td>\n						<td><strong>2016 Red Dot &Ouml;d&uuml;l&uuml; Sahibi</strong>\n						<p>BodyGroom 1000</p>\n						</td>\n					</tr>\n					<tr>\n						<td><img class=\"inpage_award_image\" src=\"http://media.flixcar.com/f360cdn/Philips-1024820169-ALA_187750115-AWP-global-001.jpg\" /></td>\n						<td><strong>2016 Red Dot &Ouml;d&uuml;l&uuml; Sahibi</strong>\n						<p>Philips BG105/10</p>\n						</td>\n					</tr>\n				</tbody>\n			</table>\n			&nbsp;\n\n			<table>\n				<tbody>\n					<tr>\n						<td><strong>Kesme sistemi</strong></td>\n						<td>\n						<ul>\n							<li>Kesici genişliği - 32 mm</li>\n							<li>Kesici &uuml;nite - &Ccedil;ift y&ouml;nl&uuml; d&uuml;zeltici</li>\n							<li>Cilt rahatlığı - Cilt koruma sistemi,Hassas b&ouml;lgelerde konfor</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>İstediğiniz g&ouml;r&uuml;n&uuml;m&uuml; yaratın</strong></td>\n						<td>\n						<ul>\n							<li>Uzunluk ayarı sayısı - 1 sabit uzunluk ayarı</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>Aksesuarlar</strong></td>\n						<td>\n						<ul>\n							<li>Piller dahil - AA pil dahildir</li>\n							<li>Duş kablosu - Evet</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>Kolay kullanım</strong></td>\n						<td>\n						<ul>\n							<li>G&uuml;venli uzunluk ayarları - Evet</li>\n							<li>Islak ve Kuru - Tamamen yıkanabilir,Duşta kullanılır ve kolay temizlenir</li>\n							<li>&Ccedil;alışma - Kablosuz kullanım</li>\n							<li>Bakım gerektirmez - Yağlamak gerekmez,Bı&ccedil;akları değiştirmeniz gerekmez</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>Tasarım</strong></td>\n						<td>\n						<ul>\n							<li>G&ouml;vde - Ergonomik tutuş ve kavrama</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>G&uuml;&ccedil;</strong></td>\n						<td>\n						<ul>\n							<li>Pil tipi - AA pil</li>\n							<li>&Ccedil;alışma - 2 aya kadar</li>\n						</ul>\n						</td>\n					</tr>\n					<tr>\n						<td><strong>Servis</strong></td>\n						<td>\n						<ul>\n							<li>D&uuml;nya &ccedil;apında 2 yıl garanti - Evet</li>\n						</ul>\n						</td>\n					</tr>\n				</tbody>\n			</table>\n			&nbsp; Daha fazla bilgi\n\n			<ul>\n				<li><img alt=\"image\" src=\"http://media.flixcar.com/delivery/static/inpage/28/images/datasheet.png\" /> <a href=\"http://media.flixcar.com/f360cdn/Philips-1449883818-bg105_10_dfu_fra.pdf\" target=\"_blank\">User manual</a></li>\n				<li><img alt=\"image\" src=\"http://media.flixcar.com/delivery/static/inpage/28/images/datasheet.png\" /> <a href=\"http://media.flixcar.com/f360cdn/Philips-1448871503-bg105_10_pss_.pdf\" target=\"_blank\">Leaflet</a></li>\n				<li><img alt=\"image\" src=\"http://media.flixcar.com/delivery/static/inpage/28/images/datasheet.png\" /> <a href=\"http://media.flixcar.com/f360cdn/Philips-1458851615-bg105_10_rtl_turtr.pdf\" target=\"_blank\">Retail Trade Leaflet</a></li>\n			</ul>\n			&nbsp; &nbsp; &nbsp; &nbsp; <a class=\"flix-privacy-policy-link\" href=\"http://www.hepsiburada.com/philips-bg105-erkek-vucut-bakim-tiras-makinesi-p-SGPHQG703747#\"><img alt=\"Powered by Flixmedia\" src=\"http://media.flixcar.com/delivery/static/images/icon_privacy_policy.gif\" title=\"Powered by Flixmedia\" /></a> Bu i&ccedil;erik, deneyiminizi iyileştirmek i&ccedil;in &ccedil;erezler kullanmaktadır. Devam ederek, bu kullanımı kabul etmiş olursunuz. Daha fazlasını &ouml;ğrenmek i&ccedil;in http://flixmedia.eu/privacy-policy/ adresini ziyaret ediniz.</td>\n		</tr>\n	</tbody>\n</table>\n\n<table>\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<table>\n	<tbody>\n		<tr>\n			<td>&nbsp; Marka\n			<table class=\"data-list tech-spec\">\n				<tbody>\n					<tr>\n						<td><a href=\"http://www.hepsiburada.com/philips\" title=\"Philips\">Philips</a></td>\n					</tr>\n				</tbody>\n			</table>\n			&nbsp; Garanti S&uuml;resi (Ay) Yurtdışına Satış Stok kodu\n\n			<table class=\"data-list tech-spec\">\n				<tbody>\n					<tr>\n						<td>24</td>\n					</tr>\n					<tr>\n						<td>Yok</td>\n					</tr>\n					<tr>\n						<td>SGPHQG703747</td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',1,'2018-10-05 20:43:16',NULL,NULL,24,720,NULL,NULL,NULL,4,623907199,'25',2,'2016-10-15 20:43:16',0,0,1,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_db`
--

DROP TABLE IF EXISTS `settings_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings_db` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_number` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` varchar(245) COLLATE utf8_turkish_ci DEFAULT NULL,
  `copyright` varchar(245) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email_address` varchar(145) COLLATE utf8_turkish_ci DEFAULT NULL,
  `maps` longtext COLLATE utf8_turkish_ci,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_db`
--

LOCK TABLES `settings_db` WRITE;
/*!40000 ALTER TABLE `settings_db` DISABLE KEYS */;
INSERT INTO `settings_db` VALUES (1,'(327) 221 16 85','(312) 552 54 00','gaziantep','<p>&copy;&nbsp;<strong>Organizetedarik</strong>&nbsp;- T&uuml;m Hakları Saklıdır</p>\r\n','destek@organizetedarik.com',NULL);
/*!40000 ALTER TABLE `settings_db` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialnetworks`
--

DROP TABLE IF EXISTS `socialnetworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socialnetworks` (
  `socialnetwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `socialnetwork_name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `socialnetwork_url` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`socialnetwork_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socialnetworks`
--

LOCK TABLES `socialnetworks` WRITE;
/*!40000 ALTER TABLE `socialnetworks` DISABLE KEYS */;
INSERT INTO `socialnetworks` VALUES (1,'Facebook','https://www.facebook.com/',1),(2,'Twitter','https://github.com/organizetedarik2/organizetedarik',0),(3,'Linkedin','https://twitter.com/',1),(4,'İnstagram','',0);
/*!40000 ALTER TABLE `socialnetworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staticpages`
--

DROP TABLE IF EXISTS `staticpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staticpages` (
  `staticpage_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  PRIMARY KEY (`staticpage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staticpages`
--

LOCK TABLES `staticpages` WRITE;
/*!40000 ALTER TABLE `staticpages` DISABLE KEYS */;
INSERT INTO `staticpages` VALUES (1,'Gizlilik İlkeleri	','<p>Buraya gizlilik ilkeleri yazısı gelecek</p>\r\n'),(2,'Hakkımızda','<p>Buraya hakkımızda yazısı gelecek</p>\r\n'),(3,'Şartlar & Koşullar	','<p>Buraya şartlar & koşullar yazısı gelecek</p>'),(4,'Teslimat Bilgileri	','<p>Buraya teslimat bilgileri yazısı gelecek</p>\r\n');
/*!40000 ALTER TABLE `staticpages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliercompanydocuments`
--

DROP TABLE IF EXISTS `suppliercompanydocuments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliercompanydocuments` (
  `suppliercompanydocuments_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplierscompany_id` int(11) NOT NULL,
  `document` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `documents3url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `documentminis3url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `documentmini` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`suppliercompanydocuments_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliercompanydocuments`
--

LOCK TABLES `suppliercompanydocuments` WRITE;
/*!40000 ALTER TABLE `suppliercompanydocuments` DISABLE KEYS */;
INSERT INTO `suppliercompanydocuments` VALUES (35,2,'suppliercompanydocuments/2_F0U6C0U7_1477680516_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/suppliercompanydocuments/2_F0U6C0U7_1477680516_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/suppliercompanydocuments/2_F0U6C0U7_1477680516_2.jpg','suppliercompanydocuments/2_F0U6C0U7_1477680516_2.jpg'),(37,1,'suppliercompanydocuments/1_M5J7X1F6J5C1T1_1477733910_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/suppliercompanydocuments/1_M5J7X1F6J5C1T1_1477733910_1.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/suppliercompanydocuments/1_M5J7X1F6J5C1T1_1477733910_2.jpg','suppliercompanydocuments/1_M5J7X1F6J5C1T1_1477733910_2.jpg');
/*!40000 ALTER TABLE `suppliercompanydocuments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplierreviews`
--

DROP TABLE IF EXISTS `supplierreviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplierreviews` (
  `supplierreviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `text` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `point` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`supplierreviews_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplierreviews`
--

LOCK TABLES `supplierreviews` WRITE;
/*!40000 ALTER TABLE `supplierreviews` DISABLE KEYS */;
INSERT INTO `supplierreviews` VALUES (1,2,15,'deneme',4,'2016-07-24 22:24:36');
/*!40000 ALTER TABLE `supplierreviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `suppliers_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `citys_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `company` varchar(145) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dateadd` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `phone` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `fax` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fake` tinyint(1) DEFAULT '0',
  `companyjob` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`suppliers_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (2,'samed ceylan','','imadige2@gmail.com','59a69d15bacb7e8054e966dfda8f095e',1,'',NULL,'2016-07-24 22:24:36',0,'',542145,NULL,0,NULL),(5,'Mehmet Şerefoğlu Tedarikçi','','memet@gmail.com','d2da1e9f79c6ca6d5d60c7a2b8673c5a',34,'',NULL,'2016-08-01 16:18:25',0,'1231231231',125012,'1231231223',0,NULL),(6,'Bozdoğanlar','bozdogan','bozdogan@gmail.com','d2da1e9f79c6ca6d5d60c7a2b8673c5a',15,'adasdas',NULL,'2016-11-18 20:50:47',0,NULL,125220,NULL,1,NULL),(7,'testja',NULL,'testja@gmail.com','59a69d15bacb7e8054e966dfda8f095e',0,NULL,NULL,'2016-11-19 18:31:25',0,NULL,125221,NULL,0,NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplierscompany`
--

DROP TABLE IF EXISTS `supplierscompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplierscompany` (
  `supplierscompany_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `suppliers_id` int(11) NOT NULL,
  `logo` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `logos3url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `totalpoint` double NOT NULL DEFAULT '0',
  `commentcount` int(11) NOT NULL DEFAULT '0',
  `opentime` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  `closetime` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  `map` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`supplierscompany_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplierscompany`
--

LOCK TABLES `supplierscompany` WRITE;
/*!40000 ALTER TABLE `supplierscompany` DISABLE KEYS */;
INSERT INTO `supplierscompany` VALUES (1,'sasaw21asda','',2,'supplierscompanylogo/1_T9U7F1P9N3_1477219373.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/supplierscompanylogo/1_T9U7F1P9N3_1477219373.jpg',0,0,'00:00','00:00','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.6780755656882!2d29.011565950366126!3d41.07602902310127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab64261a9c0e5%3A0xf46c2150f17f61fe!2sMetrocity!5e0!3m2!1str!2str!4v1477734088394',''),(2,'Şerefoğlu Holding',' asdasda',5,'','',0,0,'00:25','00:50','https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d195884.7199739243!2d32.76276475!3d39.903376550','www.serefoglu.com');
/*!40000 ALTER TABLE `supplierscompany` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenderoffers`
--

DROP TABLE IF EXISTS `tenderoffers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenderoffers` (
  `tenderoffers_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `dateadd` datetime NOT NULL,
  PRIMARY KEY (`tenderoffers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenderoffers`
--

LOCK TABLES `tenderoffers` WRITE;
/*!40000 ALTER TABLE `tenderoffers` DISABLE KEYS */;
INSERT INTO `tenderoffers` VALUES (1,15,1,21,800.3,'2016-10-20 21:10:31'),(2,15,1,21,6500,'2016-10-20 21:33:22'),(3,15,1,21,550,'2016-10-20 21:36:48'),(4,15,1,21,5,'2016-10-20 21:45:34'),(5,15,1,21,5,'2016-10-20 21:45:40'),(6,15,1,21,5,'2016-10-20 21:48:58'),(7,15,1,21,85.4,'2016-10-20 21:52:26'),(8,15,8,21,9000,'2016-10-20 22:49:16'),(9,7,2,21,1,'2016-11-09 19:55:08'),(10,7,1,21,20,'2016-11-20 14:06:54'),(11,7,2,21,20,'2016-11-20 14:31:57'),(12,7,21,21,22,'2016-11-20 14:32:26'),(13,7,22,21,22,'2016-11-20 14:32:51'),(14,7,22,21,33.5,'2016-11-20 14:33:21'),(15,7,1,21,122.2,'2016-11-20 14:35:13'),(16,7,1,21,23.6,'2016-11-20 14:39:53'),(17,7,1,21,21.8,'2016-11-20 14:52:43');
/*!40000 ALTER TABLE `tenderoffers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_adresses`
--

DROP TABLE IF EXISTS `user_adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_adresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `current_address` tinyint(1) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_adresses`
--

LOCK TABLES `user_adresses` WRITE;
/*!40000 ALTER TABLE `user_adresses` DISABLE KEYS */;
INSERT INTO `user_adresses` VALUES (4,15,1,'gaziantep'),(6,16,1,'istanbul'),(7,15,0,'adsasdasdas'),(8,15,0,'adasda sd as'),(9,15,0,'sadasda dasdaadadasd as '),(10,15,0,'adasd asd asd asd as'),(11,15,0,'adsada das'),(12,7,1,'yeni mah '),(14,7,0,'asdasdas');
/*!40000 ALTER TABLE `user_adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `citys_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `company` varchar(145) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dateadd` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `fax` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'','59a69d15bacb7e8054e966dfda8f095e','imadige@gmail.com','samed ceylan233',NULL,NULL,NULL,NULL,'2016-07-24 17:29:17',1,'',NULL),(15,'','d2da1e9f79c6ca6d5d60c7a2b8673c5a','memet@gmail.com','Mehmet Şerefoğlu',14,NULL,NULL,NULL,'2016-08-01 16:13:21',0,'','11111'),(25,NULL,'d2da1e9f79c6ca6d5d60c7a2b8673c5a','ss@gmail.com','ssss sss',NULL,NULL,NULL,NULL,'2016-10-25 22:19:59',0,'',NULL),(26,NULL,'d2da1e9f79c6ca6d5d60c7a2b8673c5a','sqsq@gmail.com','sqsq sqsq',NULL,NULL,NULL,NULL,'2016-10-26 20:41:46',0,'',NULL),(27,NULL,'a45f90b0acbbb05857dfc86cd9d06a61','imadige@jumbada.com','test2 ceylan',NULL,NULL,NULL,NULL,'2016-11-15 10:57:03',0,'',NULL),(28,NULL,'59a69d15bacb7e8054e966dfda8f095e','testsamed@jumbada.com','test test',NULL,NULL,NULL,NULL,'2016-11-19 18:30:48',0,'',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userscompany`
--

DROP TABLE IF EXISTS `userscompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userscompany` (
  `userscompany_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `logo` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `logos3url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`userscompany_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userscompany`
--

LOCK TABLES `userscompany` WRITE;
/*!40000 ALTER TABLE `userscompany` DISABLE KEYS */;
INSERT INTO `userscompany` VALUES (2,'Deneme','Deneme',15,'',''),(3,'aa şiti ltd','',7,'usercompanylogo/3_X0Y4K5U9_1470510887.jpg','https://organizetedarik.s3.eu-central-1.amazonaws.com/usercompanylogo/3_X0Y4K5U9_1470510887.jpg');
/*!40000 ALTER TABLE `userscompany` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-25 22:07:20
