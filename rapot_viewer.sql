/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - rapot_viewer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rapot_viewer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rapot_viewer`;

/*Table structure for table `instansi_tb` */

DROP TABLE IF EXISTS `instansi_tb`;

CREATE TABLE `instansi_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `instansi_tb` */

insert  into `instansi_tb`(`id`,`nama_instansi`,`alamat`,`created_at`) values 
(4,'Universitas Pamulang edit','Universitas Pamulang','2021-03-08 14:30:46');

/*Table structure for table `kelas_tb` */

DROP TABLE IF EXISTS `kelas_tb`;

CREATE TABLE `kelas_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kelas_tb` */

insert  into `kelas_tb`(`id`,`id_instansi`,`nama_kelas`,`kode_kelas`,`created_at`) values 
(1,4,'1 AA','-1-AA','2021-03-08 15:29:44');

/*Table structure for table `pengguna_tb` */

DROP TABLE IF EXISTS `pengguna_tb`;

CREATE TABLE `pengguna_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','siswa','instansi') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna_tb` */

insert  into `pengguna_tb`(`id`,`id_instansi`,`username`,`password`,`role`,`created_at`) values 
(1,99999,'admin','e219b56989281a7846dd836161d7a2bd','admin','2021-03-09 09:58:03'),
(9,4,'amturanlas','e219b56989281a7846dd836161d7a2bd','instansi','2021-03-09 10:00:50'),
(10,5,'agpsnniass','a25b03b57099e4865e1b685a11236026','instansi','2021-03-08 14:30:58'),
(11,4,'123456','e219b56989281a7846dd836161d7a2bd','siswa','2021-03-09 10:21:15'),
(12,4,'123457','f1887d3f9e6ee7a32fe5e76f4ab80d63','siswa','2021-03-08 16:15:11'),
(13,4,'212121','0f5aaaf14d9a2d371853e46119abba27','siswa','2021-03-09 10:07:51');

/*Table structure for table `rapot_tb` */

DROP TABLE IF EXISTS `rapot_tb`;

CREATE TABLE `rapot_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `path_file_rapot` text NOT NULL,
  `dilihat` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `rapot_tb` */

insert  into `rapot_tb`(`id`,`id_instansi`,`id_siswa`,`id_kelas`,`path_file_rapot`,`dilihat`,`created_at`) values 
(3,4,6,1,'assets/images/rapot/4__123457__2021-03-09-04-16-14.pdf',NULL,'2021-03-09 10:16:14');

/*Table structure for table `siswa_tb` */

DROP TABLE IF EXISTS `siswa_tb`;

CREATE TABLE `siswa_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `siswa_tb` */

insert  into `siswa_tb`(`id`,`id_instansi`,`kode_siswa`,`nama_siswa`,`created_at`) values 
(5,4,'123456','Pandu','2021-03-08 16:14:46'),
(6,4,'123457','Tri yang agung','2021-03-08 16:15:11'),
(7,4,'212121','Pebri edit','2021-03-09 10:08:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
