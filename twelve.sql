-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: twelve
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` char(40) NOT NULL,
  `level` tinyint(4) DEFAULT '3',
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'','mastopp@gmail.com','d033e22ae348aeb5660fc2140aec35850c4da997',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id_cust` int(11) NOT NULL AUTO_INCREMENT,
  `nm_lengkap` varchar(50) NOT NULL,
  `alamat_prov` varchar(30) DEFAULT NULL,
  `alamat_jln` text,
  `kode_pos` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `pass` char(40) NOT NULL,
  PRIMARY KEY (`id_cust`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'nurrohman','1','jl. gajah no.9 rt.04 rw.01 warung boto yogyakarta',55164,'nur@gmail.com','83867084605',1,'12dea96fec20593566ab75692c9949596833adc9'),(4,'Nasrul Adi Anto','Jogja',NULL,59174,'nasrul@gmail.com','8572756091',1,'268d1be87bcd2cae9eb9aa0be6e85f2d07b6f857'),(5,'Lukman','Jogja',NULL,53453,'lukman@gmail.com','0899456234',1,'33d1dc7c53f3ea2e08bc6a5b9f50c7e972ff5614');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfirmasi`
--

DROP TABLE IF EXISTS `konfirmasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfirmasi` (
  `id_konfirm` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(30) DEFAULT NULL,
  `nm_bank` varchar(30) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `a_nama` varchar(50) DEFAULT NULL,
  `tujuan` varchar(30) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_konfirm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfirmasi`
--

LOCK TABLES `konfirmasi` WRITE;
/*!40000 ALTER TABLE `konfirmasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(30) NOT NULL,
  `ongkos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'Yogyakarta',0),(2,'Solo',0),(3,'Magelang',0),(4,'Semarang',0),(5,'Jakarta',0);
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nm_material` varchar(20) DEFAULT NULL,
  `stok` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id_order_det` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ukuran` int(11) DEFAULT '0',
  `qty_order` tinyint(4) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `disc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order_det`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,'1469611158',3,1,1,200000,0),(2,'1469891665',3,2,1,200000,0),(3,'1469891665',17,2,1,110000,0),(4,'1469891665',14,2,1,65000,0),(5,'1469893004',4,6,1,220000,0),(6,'1469893004',4,1,1,200000,0);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_tmp`
--

DROP TABLE IF EXISTS `order_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_tmp` (
  `id_order_temp` int(11) NOT NULL AUTO_INCREMENT,
  `session_order` varchar(30) NOT NULL,
  `qty_order` tinyint(3) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  PRIMARY KEY (`id_order_temp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_tmp`
--

LOCK TABLES `order_tmp` WRITE;
/*!40000 ALTER TABLE `order_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `no_faktur` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `id_cust` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('1469891665','2016-07-30',1,3,375000,'belum'),('1469893004','2016-07-30',1,2,420000,'belum');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_produk` varchar(5) NOT NULL,
  `nm_produk` varchar(50) NOT NULL,
  `desk_produk` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `nm_sablon` varchar(30) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `kd_kategori` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `balance` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `max_stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `disc` int(11) NOT NULL,
  `berat` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (1,'sk82','Blazer Blue Crows Denim','---','sk82.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,150000,0,NULL),(2,'sk83','Blazer Blue Crows Denim 4','---','sk83.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(3,'sk84','Blazer Blue Crows Denim 3','---','sk84.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(4,'bk01','Blazer Jaket List Putih','---','bk01.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(5,'ks15','Blazer Korean Style','---','ks15.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(6,'ks29','Blazer Korean Lee Min Hoo','...','ks29.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(7,'ks30','Blazer Korean Style Abu-abu Lengan Pendek','...','ks30.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(8,'ks33','Blazer Korean Style Black','...','ks33.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(9,'ks59','Blazer Korean Style Pria Abu-Abu','...','ks59.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(10,'bk02','Blazer Korean Style Black 2','...','bk02.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(11,'sk65','Blazer Korean Style Cool ','...','sk65.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(12,'sk103','Fit Blazer ','...','sk103.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(13,'sk46','Blazer Aliando GGS ','...','sk46.png',NULL,NULL,200000,1,'2016-04-21',10,0,0,0,0,NULL),(14,'b9','T.F.O.A Bandana','---','b9.png',NULL,NULL,65000,4,'2016-04-21',10,0,0,0,0,NULL),(15,'tr03','Mancester United Backpack','---','tr03.png',NULL,NULL,235000,4,'2016-04-21',10,0,0,0,0,NULL),(16,'h6','Harumichi Chibi','---','h6.png',NULL,NULL,110000,3,'2016-04-21',10,0,0,0,0,NULL),(17,'h3','T-Shirt - TFOA','---','h3.png',NULL,NULL,110000,3,'2016-04-21',10,0,0,0,0,NULL),(18,'h4','T-Shirt - TFOA 2','---','h4.png',NULL,NULL,110000,3,'2016-04-21',10,0,0,0,0,NULL),(19,'g3','Genji Neck Skull','---','g3.png',NULL,NULL,110000,3,'2016-04-21',10,0,0,0,0,NULL),(20,'n12','Black Green Hoodie - Shikamaru Nara','---','n12.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(21,'z04','Green Hoodie','---','z04.png',NULL,NULL,230000,2,'2016-04-21',10,0,0,0,0,NULL),(22,'tg6','Black Hard Hoodie - Tokyo Ghoul','---','tg6.png',NULL,NULL,229000,2,'2016-04-21',10,0,0,0,0,NULL),(23,'s7','Gakuran School Premium Edition','---','s7.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(24,'n13','Gaara - Naruto Shippuden','---','n13.png',NULL,NULL,235000,2,'2016-04-21',10,0,0,0,0,NULL),(25,'n10','Dewa Kematian - Shiki Fuujin','---','n10.png',NULL,NULL,235000,2,'2016-04-21',10,0,0,0,0,NULL),(26,'ks8','Jacket Korean Double Zipper','---','ks8.png',NULL,NULL,270000,2,'2016-04-21',10,0,0,0,0,NULL),(27,'gps','Genji Perfect Seiha','---','gps.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(28,'gs1','Genji Sporty Edition','---','gs1.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(29,'e12','Blackbeard Pirates ','---','e12.png',NULL,NULL,230000,2,'2016-04-21',10,0,0,0,0,NULL),(30,'e6','Monkey D. Luffy','---','e6.png',NULL,NULL,235000,2,'2016-04-21',10,0,0,0,0,NULL),(31,'e9','Roronoa Zoro','---','e9.png',NULL,NULL,235000,2,'2016-04-21',10,0,0,0,0,NULL),(32,'e7','Marine Jacket One Piece','---','e7.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(33,'z03','Shingeki no Kyojin - Scouting Legion','---','z03.png',NULL,NULL,225000,2,'2016-04-21',10,0,0,0,0,NULL),(34,'gg1','Gakuran Suzuran','---','gg1.png',NULL,NULL,205000,2,'2016-04-21',10,0,0,0,0,NULL),(35,'gh1','Gakuran Housen Gakuen','---','gh1.png',NULL,NULL,205000,2,'2016-04-21',10,0,0,0,0,NULL);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retur`
--

DROP TABLE IF EXISTS `retur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(30) NOT NULL,
  `jml_retur` int(11) DEFAULT NULL,
  `tgl_retur` date NOT NULL,
  `ket_retur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retur`
--

LOCK TABLES `retur` WRITE;
/*!40000 ALTER TABLE `retur` DISABLE KEYS */;
/*!40000 ALTER TABLE `retur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `jml_masuk` int(11) DEFAULT NULL,
  `jml_keluar` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `stok_real` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ukuran`
--

DROP TABLE IF EXISTS `ukuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL AUTO_INCREMENT,
  `nm_ukuran` varchar(4) NOT NULL,
  `harga_ukuran` int(11) NOT NULL,
  PRIMARY KEY (`id_ukuran`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ukuran`
--

LOCK TABLES `ukuran` WRITE;
/*!40000 ALTER TABLE `ukuran` DISABLE KEYS */;
INSERT INTO `ukuran` VALUES (1,'S',0),(2,'M',0),(3,'L',0),(4,'XL',0),(5,'XXL',15000),(6,'XXXL',20000);
/*!40000 ALTER TABLE `ukuran` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-03 15:07:54
