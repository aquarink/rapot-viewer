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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `instansi_tb` */

/*Table structure for table `kelas_tb` */

DROP TABLE IF EXISTS `kelas_tb`;

CREATE TABLE `kelas_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas_tb` */

/*Table structure for table `pengguna_tb` */

DROP TABLE IF EXISTS `pengguna_tb`;

CREATE TABLE `pengguna_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `username` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','siswa','instansi') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna_tb` */

insert  into `pengguna_tb`(`id`,`id_instansi`,`username`,`password`,`role`,`created_at`) values 
(1,1,0,'admin','admin','2021-03-08 11:44:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rapot_tb` */

/*Table structure for table `siswa_tb` */

DROP TABLE IF EXISTS `siswa_tb`;

CREATE TABLE `siswa_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_instansi` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa_tb` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
