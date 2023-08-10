/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - pengembang_informatika
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengembang_informatika` /*!40100 DEFAULT CHARACTER SET utf8mb4 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `pengembang_informatika`;

/*Table structure for table `th_login` */

DROP TABLE IF EXISTS `th_login`;

CREATE TABLE `th_login` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isrep_id` bigint unsigned DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `user_code` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int unsigned DEFAULT NULL,
  `status_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `os` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os_bit` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_type` int DEFAULT '0' COMMENT '0: Berhasil 1: Username tidak ditemukan 2: Password salah',
  `login_type` int DEFAULT '0' COMMENT '1: Mobile 2: Web',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `th_login` */

insert  into `th_login`(`id`,`session_code`,`isrep_id`,`user_id`,`user_code`,`user_login`,`username`,`status_id`,`status_code`,`ip_address`,`latitude`,`longitude`,`address`,`descr`,`agent`,`os`,`os_bit`,`browser`,`browser_number`,`error_type`,`login_type`,`created_at`,`created_time`,`created_date`,`updated_at`) values 
(1,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.8960508','107.6320868',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(2,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.8960508','107.6320868',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(3,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.8960508','107.6320868',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(4,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.8960316','107.6320637',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(5,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.9174639','107.6191228',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(6,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.9174639','107.6191228',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(7,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.9271552','107.64288',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(8,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.9271552','107.64288',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL),
(9,NULL,1,1,'00001','superadmin','SUPER ADMIN',16,'0301','::1','-6.9271552','107.64288',NULL,NULL,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL);

/*Table structure for table `tj_comp_user` */

DROP TABLE IF EXISTS `tj_comp_user`;

CREATE TABLE `tj_comp_user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `company_id` bigint DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tj_comp_user` */

insert  into `tj_comp_user`(`id`,`user_id`,`user_code`,`company_id`,`company_code`,`created_by`,`created_at`) values 
(6,6,NULL,1,NULL,NULL,NULL),
(7,7,NULL,1,NULL,NULL,NULL),
(8,8,NULL,1,NULL,NULL,NULL);

/*Table structure for table `tr_form_type` */

DROP TABLE IF EXISTS `tr_form_type`;

CREATE TABLE `tr_form_type` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desrc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tr_form_type` */

insert  into `tr_form_type`(`id`,`code`,`name`,`desrc`) values 
(1,'01','Form Pendaftaran',NULL);

/*Table structure for table `tr_generic` */

DROP TABLE IF EXISTS `tr_generic`;

CREATE TABLE `tr_generic` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `parent_id` bigint DEFAULT NULL,
  `parent_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descr` text,
  `active` int DEFAULT '1',
  `sequence` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tr_generic` */

insert  into `tr_generic`(`id`,`parent_id`,`parent_code`,`code`,`name`,`descr`,`active`,`sequence`,`created_at`,`created_by`) values 
(1,NULL,NULL,'01','Jenis Usaha',NULL,1,NULL,NULL,NULL),
(2,NULL,NULL,'02','Sekala Usaha',NULL,1,NULL,NULL,NULL),
(3,NULL,NULL,'03','Pendapatan Tahunan',NULL,1,NULL,NULL,NULL),
(4,NULL,NULL,'04','Jabatan',NULL,1,NULL,NULL,NULL),
(5,NULL,NULL,'05','Status',NULL,1,NULL,NULL,NULL),
(6,1,'01','0101','Goverment',NULL,1,NULL,NULL,NULL),
(7,1,'01','0102','Consulting',NULL,1,NULL,NULL,NULL),
(8,1,'01','0103','Health Care',NULL,1,NULL,NULL,NULL),
(9,1,'01','0104','Manufacturing',NULL,1,NULL,NULL,NULL),
(10,1,'01','0105','Pharmaceuticals',NULL,1,NULL,NULL,NULL),
(11,1,'01','0106','Retail',NULL,1,NULL,NULL,NULL),
(12,2,'02','0201','Mikro',NULL,1,NULL,NULL,NULL),
(13,2,'02','0202','Kecil',NULL,1,NULL,NULL,NULL),
(14,2,'02','0203','Menengah',NULL,1,NULL,NULL,NULL),
(15,2,'02','0204','Besar',NULL,1,NULL,NULL,NULL),
(16,3,'03','0301','0 - 50.000.000',NULL,1,NULL,NULL,NULL),
(17,3,'03','0302','50.000.000 - 500.000.000',NULL,1,NULL,NULL,NULL),
(18,3,'03','0303','500.000.000 - 2.500.000.000',NULL,1,NULL,NULL,NULL),
(19,3,'03','0304','2.500.000.000',NULL,1,NULL,NULL,NULL),
(20,4,'04','0401','Direksi',NULL,1,NULL,NULL,NULL),
(21,4,'04','0402','Direktur Utama',NULL,1,NULL,NULL,NULL),
(22,4,'04','0403','Direktur Keuangan',NULL,1,NULL,NULL,NULL),
(23,4,'04','0404','Direktur',NULL,1,NULL,NULL,NULL),
(24,4,'04','0405','Direktur Personalia',NULL,1,NULL,NULL,NULL),
(25,4,'04','0406','Manajer',NULL,1,NULL,NULL,NULL),
(26,4,'04','0407','Administrasi',NULL,1,NULL,NULL,NULL),
(27,0,'0','06','Jenis Upload',NULL,1,NULL,NULL,NULL),
(28,27,'06','0601','Form Penawaran',NULL,1,NULL,NULL,NULL),
(29,27,'06','0602','Form Penawaran Bertanda tangan',NULL,1,NULL,NULL,NULL),
(30,27,'06','0603','Form Response Penawaran',NULL,1,NULL,NULL,NULL),
(31,27,'06','0604','Form Order Demo',NULL,1,NULL,NULL,NULL),
(32,27,'06','0605','Form Presentasi',NULL,1,NULL,NULL,NULL),
(33,27,'06','0606','Form Jadwal Demo',NULL,1,NULL,NULL,NULL),
(34,27,'06','0607','Form Kontrak Produk',NULL,1,NULL,NULL,NULL),
(35,27,'06','0608','Form Kontrak Bertanda Tangan',NULL,1,NULL,NULL,NULL),
(36,27,'06','0609','Form Order Instalasi',NULL,1,NULL,NULL,NULL),
(37,27,'06','0610','Form Order Installasi Bertanda Tangan',NULL,1,NULL,NULL,NULL),
(38,27,'06','0611','Form Pelaksanaan Installasi',NULL,1,NULL,NULL,NULL),
(39,27,'06','0612','Form BAST Installasi',NULL,1,NULL,NULL,NULL),
(40,27,'06','0613','Form BAST Installasi Bertanda Tangan',NULL,1,NULL,NULL,NULL),
(41,27,'06','0614','Form BAST Installasi Bertanda Tangan Client',NULL,1,NULL,NULL,NULL);

/*Table structure for table `tr_ref_list` */

DROP TABLE IF EXISTS `tr_ref_list`;

CREATE TABLE `tr_ref_list` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cat_ref_id` bigint DEFAULT NULL,
  `cat_ref_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descr` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tr_ref_list` */

/*Table structure for table `tr_status` */

DROP TABLE IF EXISTS `tr_status`;

CREATE TABLE `tr_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sequence` int DEFAULT NULL,
  `code` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `type_id` int DEFAULT '0',
  `type_code` varchar(256) DEFAULT NULL,
  `active` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tr_status` */

insert  into `tr_status`(`id`,`sequence`,`code`,`name`,`descr`,`type_id`,`type_code`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,1,'0101','Regitered','Akun Belum Di Aktifkan',1,'01',1,NULL,NULL,NULL,NULL),
(2,2,'0102','Verified','Berhasil Login',1,'01',1,NULL,NULL,NULL,NULL),
(3,3,'0103','On Hold','Akun Ditangguhkan',1,'01',1,NULL,NULL,NULL,NULL),
(4,4,'0104','Forzen','Akun Dibekukan',1,'01',1,NULL,NULL,NULL,NULL),
(5,5,'0105','In Active','Tidak Active Atas Keinginan User',1,'01',1,NULL,NULL,NULL,NULL),
(6,1,'0201','Granted Autorized','Diperbolehkan',2,'02',1,NULL,NULL,NULL,NULL),
(7,2,'0202','Limited Autorid','Akses Terbatas',2,'02',1,NULL,NULL,NULL,NULL),
(8,3,'0203','Scheduled Autorized','Akses Berdasarkan Waktu Yang Dibatasi',2,'02',1,NULL,NULL,NULL,NULL),
(9,4,'0204','On Hold','Akses Di Tahan',2,'02',1,NULL,NULL,NULL,NULL),
(10,5,'0205','Rejected','Akses Di Tolak',2,'02',1,NULL,NULL,NULL,NULL),
(16,1,'0301','SUCCESS','Berhasil Login',3,'03',1,NULL,NULL,NULL,NULL),
(17,2,'0302','FAILED - 1','Username tidak ditemukan',3,'03',1,NULL,NULL,NULL,NULL),
(18,3,'0303','FAILED - 2','Password anda salah',3,'03',1,NULL,NULL,NULL,NULL),
(19,4,'0304','FAILED - 3','Anda sudah lama tidak melakukan login',3,'03',1,NULL,NULL,NULL,NULL),
(20,5,'0305','FAILED - 4','Device anda baru',3,'03',1,NULL,NULL,NULL,NULL),
(21,6,'0306','FAILED - 5','Akun anda dibekukan, segera hubungi admin',3,'03',1,NULL,NULL,NULL,NULL),
(22,6,'0106','Failed - 1','Username Tidak Di Temukan',1,'01',1,NULL,NULL,NULL,NULL),
(23,7,'0107','Failed - 2','Password Salah',1,'01',1,NULL,NULL,NULL,NULL),
(24,8,'0108','Failed - 3','Pengguna Di Blokir',1,'01',1,NULL,NULL,NULL,NULL),
(25,1,'0401','Email Already','Email Sudah Terdaftar',4,'04',1,NULL,NULL,NULL,NULL),
(26,2,'0402','Phone Already','Nomor Hp Sudah Terdaftar',4,'04',1,NULL,NULL,NULL,NULL),
(27,1,'0501','Form Kelayakan',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(28,2,'0502','Buat Penawaran',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(29,3,'0503','Kirim Penawaran',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(30,4,'0504','Order Demo',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(31,5,'0505','Jadwal Demo',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(32,6,'0506','Kontrak',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(33,7,'0507','Sertifikasi',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(34,8,'0508','Payment',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(35,9,'0509','Order Installasi',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(36,10,'0510','Install (WIP)',NULL,5,'05',NULL,NULL,NULL,NULL,NULL),
(38,11,'0511','Installed',NULL,5,'05',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tt_company` */

DROP TABLE IF EXISTS `tt_company`;

CREATE TABLE `tt_company` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` longtext,
  `email` varchar(255) DEFAULT NULL,
  `telepone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `skala_usaha` varchar(255) DEFAULT NULL,
  `pendapatan_tahun` varchar(255) DEFAULT NULL,
  `jumlah_karyawan` varchar(255) DEFAULT NULL,
  `active` int DEFAULT '1',
  `status_id` int DEFAULT '1',
  `status_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tt_company` */

insert  into `tt_company`(`id`,`code`,`nama`,`alamat`,`email`,`telepone`,`website`,`jenis_usaha`,`skala_usaha`,`pendapatan_tahun`,`jumlah_karyawan`,`active`,`status_id`,`status_code`,`created_at`,`created_by`) values 
(1,NULL,'PT Kubus Digital Indonesia','Jl.Tubagus ismail xv 14A','admin@cube-x.net','021-12345678','www.cube-x.net','Consulting','Menengah','500.000.000 - 2.500.000.000','100',1,1,NULL,'2023-08-08 11:03:17','superadmin'),
(2,NULL,'PT. Telkom Indonesia','Jl.gatot subroto','admin@telkom.co.id','0214567849','www.telkom.co.id','Consulting','0','0','1000',1,1,NULL,'2023-08-08 16:13:20','superadmin'),
(5,'COMP-01','PT. Asosiasi Pengembang Indonesia','SCBD','admin@ptapi.com','021-12345678','www.pengembanginformatika.com','Consulting','0','0','100',1,1,NULL,'2023-08-09 13:42:58','superadmin');

/*Table structure for table `tt_contact` */

DROP TABLE IF EXISTS `tt_contact`;

CREATE TABLE `tt_contact` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `type` int DEFAULT '1',
  `user_id` bigint DEFAULT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tt_contact` */

insert  into `tt_contact`(`id`,`nama`,`type`,`user_id`,`user_code`,`created_by`,`created_at`) values 
(9,'bds.inu@gmail.com',1,6,NULL,NULL,NULL),
(10,'0858901213',2,6,NULL,NULL,NULL),
(11,'kurniawa9157@gmail.com',1,7,NULL,NULL,NULL),
(12,'082127467706',2,7,NULL,NULL,NULL),
(13,'yogi.sumitra@gmail.com',1,8,NULL,NULL,NULL),
(14,'321654987456',2,8,NULL,NULL,NULL);

/*Table structure for table `tt_form` */

DROP TABLE IF EXISTS `tt_form`;

CREATE TABLE `tt_form` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_id` bigint DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `status_id` bigint DEFAULT NULL,
  `status_code` varchar(255) DEFAULT NULL,
  `type_id` bigint DEFAULT NULL,
  `type_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tt_form` */

insert  into `tt_form`(`id`,`code`,`name`,`company_id`,`company_code`,`status_id`,`status_code`,`type_id`,`type_code`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'01-08082023-01','Form Pendaftaran PT Company Name',1,'01',33,'0507',1,'01','2023-08-08 13:19:23',NULL,NULL,NULL),
(2,'01-08082023-02','Form Pendaftaran PT Kubus',2,'02',30,'0504',1,'01','2023-08-08 13:20:20',NULL,NULL,NULL),
(5,'01-09082023-00','Form Pendaftaran PT. Asosiasi Pengembang Indonesia',5,'COMP-01',28,'0502',1,'01','2023-08-09 13:57:21',NULL,NULL,NULL);

/*Table structure for table `tt_password` */

DROP TABLE IF EXISTS `tt_password`;

CREATE TABLE `tt_password` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `user_code` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `status_code` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tt_password` */

insert  into `tt_password`(`id`,`user_id`,`user_code`,`password`,`status_id`,`status_code`,`created_at`,`created_by`) values 
(1,1,NULL,'$2y$10$WNjCKwkk2lApCADOwXelu.Kj.mI0CCse0aQleuMp0TAyRff2iJ.vC',3,'0203','2022-10-18 20:14:41',NULL),
(2,1,'00001','$2y$10$AOCy0EOCQGSkWHWcQFu6d.PPgTlXUgEVtuPP8UgLA4VDck7.en//S',3,'0203','2023-03-24 06:57:41','Super Admin TRX'),
(3,1,'00001','$2y$10$sNzcz3Qq4/LAR.CE8nyX4uuUgSAVyWUpioislmQtsJyCv99F87ire',2,'0201','2023-03-24 06:59:08','Super Admin TRX');

/*Table structure for table `tt_user` */

DROP TABLE IF EXISTS `tt_user`;

CREATE TABLE `tt_user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `mid_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `gender` int DEFAULT '1',
  `company_id` bigint DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tt_user` */

insert  into `tt_user`(`id`,`code`,`first_name`,`mid_name`,`last_name`,`position`,`gender`,`company_id`,`created_by`,`created_at`) values 
(6,NULL,'sjahdinu','mulia','miraza','Direksi',1,NULL,NULL,NULL),
(7,NULL,'Kurniawan','Wawan',NULL,'Direktur Utama',1,NULL,NULL,NULL),
(8,NULL,'Yogi','Sumitra',NULL,'Direktur Keuangan',1,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `type_code` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `status_code` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`code`,`username`,`type_id`,`type_code`,`status_id`,`status_code`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'00001','superadmin',1,'0101',1,'0101','Admin','bds.inu@gmail.com',NULL,'$2y$10$WNjCKwkk2lApCADOwXelu.Kj.mI0CCse0aQleuMp0TAyRff2iJ.vC',NULL,NULL,'2023-07-03 10:14:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
