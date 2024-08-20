/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - dinaskpk_dbdashboard
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dinaskpk_dbdashboard` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dinaskpk_dbdashboard`;

/*Table structure for table `program` */

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `upload_date` datetime DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  `urusan` varchar(255) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `target_tahun_berjalan` double DEFAULT NULL,
  `indikator` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `capaian` double DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `data_triwulan` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `tampilkan` char(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `program` */

insert  into `program`(`id`,`tahun`,`upload_date`,`upload_file`,`urusan`,`program`,`target_tahun_berjalan`,`indikator`,`target`,`realisasi`,`capaian`,`keterangan`,`status`,`data_triwulan`,`satuan`,`tampilkan`,`user_id`,`bidang`,`created_at`,`updated_at`) values 
(7,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',18.46,'Persentase Kawasan Pemanfaatan Ruang Perairan Pesisir yang sesuai dengan Dokumen Perencanaan Ruang Laut','N/A','N/A',0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'kelautan','2023-11-28 11:27:01','2023-12-30 13:42:38'),
(8,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',18.46,'Persentase Kawasan Pemanfaatan Ruang Perairan Pesisir yang sesuai dengan Dokumen Perencanaan Ruang Laut',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'kelautan','2023-11-28 11:30:16','2023-11-30 21:44:33'),
(9,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',18.46,'Persentase Kawasan Pemanfaatan Ruang Perairan Pesisir yang sesuai dengan Dokumen Perencanaan Ruang Laut',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'kelautan','2023-11-28 11:33:44','2023-11-30 21:44:37'),
(10,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'kelautan','2023-11-28 13:25:05','2023-11-30 21:44:42'),
(11,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'kelautan','2023-11-28 13:25:41','2023-11-30 21:44:46'),
(12,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'kelautan','2023-11-28 13:26:48','2023-11-30 21:44:50'),
(13,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN TANGKAP',120000,'Jumlah Produksi Perikanan Tangkap','22800','41410.23',181.62381578947,NULL,'Menunggu Periksa','Triwulan I','Ton',NULL,1,'perikanan','2023-11-28 13:28:40','2023-11-28 13:38:23'),
(14,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN TANGKAP',120000,'Jumlah Produksi Perikanan Tangkap','31200','40725.84',130.53153846154,NULL,'Menunggu Periksa','Triwulan II','Ton',NULL,1,'perikanan','2023-11-28 13:36:02','2023-11-28 13:38:29'),
(15,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN TANGKAP',120000,'Jumlah Produksi Perikanan Tangkap','31200','44595.47',142.93419871795,NULL,'Menunggu Periksa','Triwulan III','Ton',NULL,1,'perikanan','2023-11-28 13:39:47','2023-11-28 13:42:31'),
(16,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'perikanan','2023-11-28 13:42:17','2023-11-30 21:44:57'),
(17,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'perikanan','2023-11-28 13:43:31','2023-11-30 21:45:05'),
(18,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN',70,'Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'perikanan','2023-11-28 13:44:53','2023-11-30 21:45:19'),
(19,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN BUDIDAYA',3838,'Jumlah Produksi Perikanan Budidaya','887','1231.01',138.78354002255,NULL,'Menunggu Periksa','Triwulan I','Ton',NULL,1,'perikanan','2023-11-28 13:46:50','2023-11-28 13:46:50'),
(20,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN BUDIDAYA',3838,'Jumlah Produksi Perikanan Budidaya','1108.75','1187.39',107.09267192785,NULL,'Menunggu Periksa','Triwulan II','Ton',NULL,1,'perikanan','2023-11-28 13:52:19','2023-11-28 13:52:19'),
(21,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN PERIKANAN BUDIDAYA',3838,'Jumlah Produksi Perikanan Budidaya','1108.75','1140.59',102.87170236753,NULL,'Menunggu Periksa','Triwulan III','Ton',NULL,1,'perikanan','2023-11-28 14:14:54','2023-11-28 14:14:54'),
(22,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',14885.27,'Jumlah Produksi dan Pemasaran Produk Olahan Hasil Perikanan','3548.713','6288.29',177.19917051618,NULL,'Menunggu Periksa','Triwulan I','Ton',NULL,1,'perikanan','2023-11-28 14:18:06','2023-11-28 14:18:06'),
(23,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',14885.27,'Jumlah Produksi dan Pemasaran Produk Olahan Hasil Perikanan','3686.932','5436.34',147.44888161756,NULL,'Menunggu Periksa','Triwulan II','Ton',NULL,1,'perikanan','2023-11-28 14:21:37','2023-11-28 14:21:37'),
(24,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',14885.27,'Jumlah Produksi dan Pemasaran Produk Olahan Hasil Perikanan','3808.515','6382.75',167.59156784206,NULL,'Menunggu Periksa','Triwulan III','Ton',NULL,1,'perikanan','2023-11-28 14:23:33','2023-11-28 14:23:33'),
(25,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',47,'Angka Konsumsi Ikan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Kg/Kapita/Tahun',NULL,1,'perikanan','2023-11-28 14:25:53','2023-11-30 21:45:25'),
(26,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',47,'Angka Konsumsi Ikan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Kg/Kapita/Tahun',NULL,1,'perikanan','2023-11-28 14:38:19','2023-11-30 21:45:30'),
(27,2023,NULL,NULL,NULL,'PROGRAM PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN',47,'Angka Konsumsi Ikan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Kg/Kapita/Tahun',NULL,1,'perikanan','2023-11-28 14:39:38','2023-11-30 21:45:33'),
(28,2023,NULL,NULL,NULL,'PROGRAM PENINGKATAN DIVERSIFIKASI DAN KETAHANAN PANGAN MASYARAKAT',100,'Persentase Ketersediaan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pangan','2023-11-28 14:42:00','2023-11-30 21:45:37'),
(29,2023,NULL,NULL,NULL,'PROGRAM PENINGKATAN DIVERSIFIKASI DAN KETAHANAN PANGAN MASYARAKAT',100,'Persentase Ketersediaan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pangan','2023-11-28 14:42:43','2023-11-30 21:45:42'),
(30,2023,NULL,NULL,NULL,'PROGRAM PENINGKATAN DIVERSIFIKASI DAN KETAHANAN PANGAN MASYARAKAT',100,'Persentase Ketersediaan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pangan','2023-11-28 14:43:58','2023-11-30 21:45:48'),
(31,2023,NULL,NULL,NULL,'PROGRAM PENANGANAN KERAWANAN PANGAN',94.45,'Persentase Wilayah Tahan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pangan','2023-11-28 14:44:58','2023-11-30 21:45:53'),
(32,2023,NULL,NULL,NULL,'PROGRAM PENANGANAN KERAWANAN PANGAN',95.45,'Persentase Wilayah Tahan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pangan','2023-11-28 14:45:59','2023-11-30 21:45:57'),
(33,2023,NULL,NULL,NULL,'PROGRAM PENANGANAN KERAWANAN PANGAN',95.45,'Persentase Wilayah Tahan Pangan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pangan','2023-11-28 14:49:49','2023-11-30 21:46:01'),
(34,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN KEAMANAN PANGAN',99.8,'Persentase Pangan yang Bebas Bahan Berbahaya','99.8','99.8',100,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pangan','2023-11-28 14:52:34','2023-11-28 14:52:34'),
(35,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN KEAMANAN PANGAN',99.8,'Persentase Pangan yang Bebas Bahan Berbahaya','99.8','99.8',100,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pangan','2023-11-28 14:54:17','2023-11-28 14:54:17'),
(36,2023,NULL,NULL,NULL,'PROGRAM PENGAWASAN KEAMANAN PANGAN',99.8,'Persentase Pangan yang Bebas Bahan Berbahaya','99.8','99.8',100,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pangan','2023-11-28 14:55:06','2023-11-28 14:55:06'),
(37,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN SARANA PERTANIAN',50,'Persentase Pemenuhan Sarana Pertanian','50','54.46',108.92,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 14:56:52','2023-11-28 14:56:52'),
(38,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN SARANA PERTANIAN',50,'Persentase Pemenuhan Sarana Pertanian','50','63.77',127.54,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 14:59:04','2023-11-28 14:59:04'),
(39,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN SARANA PERTANIAN',50,'Persentase Pemenuhan Sarana Pertanian','50','72.82',145.64,'Isi keterangan ini minimal 50 karakter, Isi keterangan ini minimal 50 karakter, Isi keterangan ini minimal 50 karakter','Menunggu Periksa','Triwulan III','Persen',NULL,11,'pertanian','2023-11-28 15:00:30','2023-11-29 15:42:28'),
(40,2018,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',50,'Persentase Prasarana Perternakan dalam Kondisi Baik','0001000',NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:03:14','2023-11-28 15:03:14'),
(41,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',50,'Persentase Prasarana Perternakan dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:05:07','2023-11-30 21:46:07'),
(42,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',50,'Persentase Prasarana Perternakan dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 15:06:34','2023-11-30 21:46:10'),
(43,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',50,'Persentase Prasarana Perternakan dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pertanian','2023-11-28 15:07:14','2023-11-30 21:46:14'),
(44,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',65,'Persentase Prasarana Pertanian dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:09:01','2023-11-30 21:46:18'),
(45,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',65,'Persentase Prasarana Pertanian dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 15:09:50','2023-11-30 21:46:22'),
(46,2023,NULL,NULL,NULL,'PROGRAM PENYEDIAAN DAN PENGEMBANGAN PRASARANA PERTANIAN',65,'Persentase Prasarana Pertanian dalam Kondisi Baik',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pertanian','2023-11-28 15:10:35','2023-11-30 21:46:26'),
(47,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',100,'Persentase Pengendalian Penyakit Hewan Menular Strategis (Rabies)',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'peternakan','2023-11-28 15:17:39','2023-11-30 21:46:29'),
(48,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',100,'Persentase Pengendalian Penyakit Hewan Menular Strategis (Rabies)','100','100',100,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'peternakan','2023-11-28 15:19:14','2023-11-28 15:19:14'),
(49,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',100,'Persentase Pengendalian Penyakit Hewan Menular Strategis (Rabies)',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'peternakan','2023-11-28 15:20:10','2023-11-30 21:46:34'),
(50,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',65,'Persentase Pengendalian Kesehatan Masyarakat Veteriner','20','28.34',141.7,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'peternakan','2023-11-28 15:21:38','2023-11-28 15:21:38'),
(51,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',65,'Persentase Pengendalian Kesehatan Masyarakat Veteriner','40','48',120,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'peternakan','2023-11-28 15:22:31','2023-11-28 15:22:31'),
(52,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',65,'Persentase Pengendalian Kesehatan Masyarakat Veteriner','50','67',134,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'peternakan','2023-11-28 15:23:16','2023-11-28 15:23:16'),
(53,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',5,'Persentase Penurunan Kejadian dan Jumlah Kasus Penyakit Hewan Menular',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'peternakan','2023-11-28 15:24:46','2023-11-30 21:46:39'),
(54,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',5,'Persentase Penurunan Kejadian dan Jumlah Kasus Penyakit Hewan Menular',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'peternakan','2023-11-28 15:26:20','2023-11-30 21:46:43'),
(55,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN KESEHATAN HEWAN DAN KESEHATAN MASYARAKAT VETERINER',5,'Persentase Penurunan Kejadian dan Jumlah Kasus Penyakit Hewan Menular',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'peternakan','2023-11-28 15:27:12','2023-11-30 21:46:47'),
(56,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN DAN PENANGGULANGAN BENCANA PERTANIAN',85,'Persentase Area Lahan yang Terkendali','85','85',100,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:29:33','2023-11-28 15:29:33'),
(57,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN DAN PENANGGULANGAN BENCANA PERTANIAN',85,'Persentase Area Lahan yang Terkendali','85','85',100,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 15:30:33','2023-11-28 15:30:45'),
(58,2023,NULL,NULL,NULL,'PROGRAM PENGENDALIAN DAN PENANGGULANGAN BENCANA PERTANIAN',85,'Persentase Area Lahan yang Terkendali','85','85',100,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pertanian','2023-11-28 15:31:15','2023-11-28 15:31:15'),
(59,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',2.5,'Persentase Peningkatan Produksi dan Pemasaran Produk Pertanian dan Peternakan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:32:27','2023-11-30 21:46:59'),
(60,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',2.5,'Persentase Peningkatan Produksi dan Pemasaran Produk Pertanian dan Peternakan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 15:33:16','2023-11-30 21:47:03'),
(61,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',2.5,'Persentase Peningkatan Produksi dan Pemasaran Produk Pertanian dan Peternakan',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pertanian','2023-11-28 15:34:11','2023-11-30 21:47:06'),
(62,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',80,'Persentase Sumber Daya Manusia Pertanian yang Meningkat Kapasitasnya','20','100',500,NULL,'Menunggu Periksa','Triwulan I','Persen',NULL,1,'pertanian','2023-11-28 15:35:54','2023-11-28 15:35:54'),
(63,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',80,'Persentase Sumber Daya Manusia Pertanian yang Meningkat Kapasitasnya','20','0',0,NULL,'Menunggu Periksa','Triwulan II','Persen',NULL,1,'pertanian','2023-11-28 15:36:51','2023-11-28 15:36:51'),
(64,2023,NULL,NULL,NULL,'PROGRAM PENYULUHAN PERTANIAN',80,'Persentase Sumber Daya Manusia Pertanian yang Meningkat Kapasitasnya','20','0',0,NULL,'Menunggu Periksa','Triwulan III','Persen',NULL,1,'pertanian','2023-11-28 15:37:51','2023-11-28 15:37:51'),
(65,2023,NULL,NULL,NULL,'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI',4,'Indeks Kepuasan Layanan Penunjang Urusan Pemerintahan Daerah','4','4',100,'4','Menunggu Periksa','Triwulan I','Indeks',NULL,1,'Sekretaris','2023-11-28 15:38:47','2023-11-28 15:38:47'),
(66,2023,NULL,NULL,NULL,'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI',4,'Indeks Kepuasan Layanan Penunjang Urusan Pemerintahan Daerah','4','4',100,NULL,'Menunggu Periksa','Triwulan II','Indeks',NULL,1,'Sekretaris','2023-11-28 15:39:45','2023-11-28 15:39:45'),
(67,2023,NULL,NULL,NULL,'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI',4,'Indeks Kepuasan Layanan Penunjang Urusan Pemerintahan Daerah','4','4',100,NULL,'Menunggu Periksa','Triwulan III','Indeks',NULL,1,'Sekretaris','2023-11-28 15:40:11','2023-11-28 15:40:11'),
(68,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',197.54,'Luas perairan ekosistem laut dan pesisir yang dikelola melalui kegiatan konservasi dan rehabilitasi',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan I','Ha',NULL,1,'kelautan','2023-11-28 15:41:05','2023-11-30 21:47:11'),
(69,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',197.54,'Luas perairan ekosistem laut dan pesisir yang dikelola melalui kegiatan konservasi dan rehabilitasi',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan II','Ha',NULL,1,'kelautan','2023-11-28 15:41:50','2023-11-30 21:47:15'),
(70,2023,NULL,NULL,NULL,'PROGRAM PENGELOLAAN KELAUTAN, PESISIR DAN PULAU-PULAU KECIL',197.54,'Luas perairan ekosistem laut dan pesisir yang dikelola melalui kegiatan konservasi dan rehabilitasi',NULL,NULL,0,NULL,'Menunggu Periksa','Triwulan III','Ha',NULL,1,'kelautan','2023-11-28 15:42:30','2023-11-30 21:47:19');

/*Table structure for table `renstra` */

DROP TABLE IF EXISTS `renstra`;

CREATE TABLE `renstra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  `indikator_tujuan` varchar(255) DEFAULT NULL,
  `indikator_sasaran` varchar(255) DEFAULT NULL,
  `target_satuan_berjalan` double DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `capaian` double DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `data_triwulan` varchar(255) DEFAULT NULL,
  `tampilkan` char(2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `renstra` */

insert  into `renstra`(`id`,`tahun`,`upload_file`,`upload_date`,`indikator_tujuan`,`indikator_sasaran`,`target_satuan_berjalan`,`target`,`realisasi`,`capaian`,`keterangan`,`status`,`satuan`,`data_triwulan`,`tampilkan`,`user_id`,`bidang`,`created_at`,`updated_at`) values 
(18,2023,NULL,NULL,'Indeks Ketahanan Pangan',NULL,80,NULL,NULL,0,NULL,'Menunggu Periksa','Indeks','Triwulan II',NULL,1,'Ketahanan Pangan','2023-11-28 16:14:15','2024-07-16 02:04:21'),
(19,2023,NULL,NULL,'Indeks Ketahanan Pangan',NULL,80,NULL,NULL,0,NULL,'Menunggu Periksa','Indeks','Triwulan III',NULL,1,'Ketahanan Pangan','2023-11-28 16:14:44','2024-07-16 02:04:41'),
(20,2023,NULL,NULL,'Indeks Kesehatan Laut di wilayah kewenangan Provinsi',NULL,65,'N/A','N/A',0,NULL,'Menunggu Periksa','Indeks','Triwulan I',NULL,1,'kelautan','2023-11-28 16:15:36','2024-01-08 09:50:02'),
(21,2023,NULL,NULL,'Indeks Kesehatan Laut di wilayah kewenangan Provinsi',NULL,65,'N/A','N/A',0,NULL,'Menunggu Periksa','Indeks','Triwulan II',NULL,1,'kelautan','2023-11-28 16:16:05','2024-01-08 09:50:09'),
(22,2023,NULL,NULL,'Indeks Kesehatan Laut di wilayah kewenangan Provinsi',NULL,65,'N/A','N/A',0,NULL,'Menunggu Periksa','Indeks','Triwulan III',NULL,1,'kelautan','2023-11-28 16:16:35','2024-01-08 09:50:16'),
(23,2020,NULL,NULL,'Persentase Peningkatan Produksi Pertanian',NULL,22.5,'20.5','23.65',115.36585365854,NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'pertanian','2023-11-28 16:17:36','2023-11-28 16:17:36'),
(24,2023,NULL,NULL,'Persentase Peningkatan Produksi Pertanian',NULL,22.5,'20.5','23.65',115.36585365854,NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'pertanian','2023-11-28 16:18:20','2023-11-28 16:18:20'),
(25,2023,NULL,NULL,'Persentase Peningkatan Produksi Pertanian',NULL,22.5,'21','21',100,NULL,'Menunggu Periksa','Persen','Triwulan II',NULL,1,'pertanian','2023-11-28 16:19:44','2023-11-28 16:19:44'),
(26,2023,NULL,NULL,'Persentase Peningkatan Produksi Pertanian',NULL,22.5,'21.5','28.05',130.46511627907,NULL,'Menunggu Periksa','Persen','Triwulan III',NULL,1,'pertanian','2023-11-28 16:26:00','2023-11-28 16:26:00'),
(27,2023,NULL,NULL,'Indek Kesehatan Laut',NULL,65,'65','66',101.53846153846,'Realisasi melampaui target','Menunggu Periksa','Indeks','Triwulan III',NULL,1,'kelautan','2023-12-11 10:21:00','2024-03-25 13:59:08'),
(28,2023,NULL,NULL,'Indeks Ketahanan Pangan',NULL,80,'80','82.22',102.775,NULL,'Menunggu Periksa','Indeks','Triwulan IV',NULL,1,'pangan','2024-03-25 08:59:37','2024-03-25 08:59:37'),
(29,2023,NULL,NULL,'Indeks Kesehatan Laut di wilayah kewenangan Provinsi',NULL,65,'65','68.77',105.8,NULL,'Menunggu Periksa','Indeks','Triwulan IV',NULL,1,'kelautan','2024-03-25 09:01:05','2024-03-25 09:01:05'),
(30,2023,NULL,NULL,'Persentase Peningkatan Produksi Pertanian',NULL,22.5,'22.5','23.62',104.97777777778,NULL,'Menunggu Periksa','Persen','Triwulan IV',NULL,1,'pertanian','2024-03-25 09:02:16','2024-03-25 09:02:16');

/*Table structure for table `renstra_sasaran` */

DROP TABLE IF EXISTS `renstra_sasaran`;

CREATE TABLE `renstra_sasaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  `indikator_tujuan` varchar(255) DEFAULT NULL,
  `indikator_sasaran` varchar(255) DEFAULT NULL,
  `target_satuan_berjalan` double DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `capaian` varchar(255) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `data_triwulan` varchar(255) DEFAULT NULL,
  `tampilkan` char(2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `renstra_sasaran` */

insert  into `renstra_sasaran`(`id`,`tahun`,`upload_file`,`upload_date`,`indikator_tujuan`,`indikator_sasaran`,`target_satuan_berjalan`,`target`,`realisasi`,`capaian`,`keterangan`,`status`,`satuan`,`data_triwulan`,`tampilkan`,`user_id`,`bidang`,`created_at`,`updated_at`) values 
(5,2023,NULL,NULL,NULL,'Skor Pola Pangan Harapan (PPH)',90,'N/A','N/A','0',NULL,'Menunggu Periksa','Skor','Triwulan I',NULL,1,'pangan','2023-11-29 09:23:30','2024-01-28 21:26:40'),
(7,2023,NULL,NULL,NULL,'Skor Pola Pangan Harapan (PPH)',90,NULL,NULL,'0',NULL,'Menunggu Periksa','Skor','Triwulan II',NULL,1,'pangan','2023-11-29 09:26:49','2023-11-30 21:51:14'),
(8,2023,NULL,NULL,NULL,'Skor Pola Pangan Harapan (PPH)',90,NULL,NULL,'0',NULL,'Menunggu Periksa','Skor','Triwulan III',NULL,1,'pangan','2023-11-29 09:27:34','2023-11-30 21:51:21'),
(9,2023,NULL,NULL,NULL,'Prevalensi Ketidakcukupan Konsumsi Pangan/Prevalence of Undernourishment (PoU)',2.4,'N/A','N/A','0',NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'pangan','2023-11-29 09:28:47','2024-01-28 21:26:45'),
(10,2023,NULL,NULL,NULL,'Prevalensi Ketidakcukupan Konsumsi Pangan/Prevalence of Undernourishment (PoU)',2.4,NULL,NULL,'0',NULL,'Menunggu Periksa','Persen','Triwulan II',NULL,1,'pangan','2023-11-29 09:29:24','2023-11-30 21:51:29'),
(11,2023,NULL,NULL,NULL,'Prevalensi Ketidakcukupan Konsumsi Pangan/Prevalence of Undernourishment (PoU)',2.4,NULL,NULL,'0',NULL,'Menunggu Periksa','Persen','Triwulan III',NULL,1,'pangan','2023-11-29 09:29:59','2023-11-30 21:51:32'),
(12,2023,NULL,NULL,NULL,'Persentase luasan kawasan perairan dan pesisir yang memiliki ekosistem pesisir esensial dalam kondisi sedang dan baik',36.56,'N/A','N/A','0',NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'kelautan','2023-11-29 09:30:48','2024-01-28 21:26:49'),
(13,2023,NULL,NULL,NULL,'Persentase luasan kawasan perairan dan pesisir yang memiliki ekosistem pesisir esensial dalam kondisi sedang dan baik',36.56,NULL,NULL,'0',NULL,'Menunggu Periksa','Persen','Triwulan II',NULL,1,'pangan','2023-11-29 09:31:41','2023-11-30 21:51:39'),
(14,2023,NULL,NULL,NULL,'Persentase luasan kawasan perairan dan pesisir yang memiliki ekosistem pesisir esensial dalam kondisi sedang dan baik',36.56,NULL,NULL,'0',NULL,'Menunggu Periksa','Persen','Triwulan III',NULL,1,'pangan','2023-11-29 09:32:17','2023-11-30 21:51:43'),
(16,2023,NULL,NULL,NULL,'Jumlah Produksi Perikanan',139320,'27864','48929.53','175.60124174562',NULL,'Menunggu Periksa','Ton','Triwulan I',NULL,1,'perikanan','2023-11-29 09:34:23','2023-11-29 09:49:38'),
(17,2023,NULL,NULL,NULL,'Jumlah Produksi Perikanan',139320,'34830','47350','135.94602354292',NULL,'Menunggu Periksa','Ton','Triwulan II',NULL,1,'perikanan','2023-11-29 09:36:27','2023-11-29 09:49:45'),
(18,2023,NULL,NULL,NULL,'Jumlah Produksi Perikanan',139320,'34830.00','52118.80','149.63766867643',NULL,'Menunggu Periksa','Ton','Triwulan III',NULL,1,'perikanan','2023-11-29 09:39:21','2023-11-29 09:49:51'),
(19,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Pangan Dan Hortikultura',22.5,'20.5','24.42','119.12195121951',NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'pertanian','2023-11-29 09:44:38','2023-11-29 09:44:38'),
(20,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Pangan Dan Hortikultura',22.5,'21','25.23','120.14285714286',NULL,'Menunggu Periksa','Persen','Triwulan II',NULL,1,'pertanian','2023-11-29 09:45:33','2023-11-29 09:45:33'),
(21,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Pangan Dan Hortikultura',22.5,'21.5','27.84','129.48837209302',NULL,'Menunggu Periksa','Persen','Triwulan III',NULL,1,'pertanian','2023-11-29 09:47:36','2023-11-29 09:47:36'),
(22,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Peternakan',2.5,'0.5','23.6','4720',NULL,'Menunggu Periksa','Persen','Triwulan I',NULL,1,'peternakan','2023-11-29 09:48:55','2023-11-29 09:50:10'),
(23,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Peternakan',2.5,'1','15.16','1516',NULL,'Menunggu Periksa','Persen','Triwulan II',NULL,1,'peternakan','2023-11-29 09:53:11','2023-11-29 09:53:11'),
(24,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Peternakan',2.5,'1.5','9.34','622.66666666667',NULL,'Menunggu Periksa','Persen','Triwulan III',NULL,1,'peternakan','2023-11-29 09:54:34','2023-11-29 09:54:34'),
(25,2023,NULL,NULL,NULL,'Skor Pola Pangan Harapan (PPH)',90,'90','92.7','103',NULL,'Menunggu Periksa','Skor','Triwulan IV',NULL,1,'pangan','2024-03-25 09:06:19','2024-03-25 09:06:19'),
(26,2023,NULL,NULL,NULL,'Prevalensi Ketidakcukupan Konsumsi Pangan/Prevalence of Undernourishment (PoU)',2.4,'2.4','2.57','107.08333333333',NULL,'Menunggu Periksa','Persen','Triwulan IV',NULL,1,'pangan','2024-03-25 09:11:23','2024-03-25 09:11:23'),
(27,2023,NULL,NULL,NULL,'Persentase luasan kawasan perairan dan pesisir yang memiliki ekosistem pesisir esensial dalam kondisi sedang dan baik',36.56,'36.56','36.56','100',NULL,'Menunggu Periksa','Persen','Triwulan IV',NULL,1,'kelautan','2024-03-25 09:12:41','2024-03-25 09:12:41'),
(28,2023,NULL,NULL,NULL,'Jumlah Produksi Perikanan',139.32,'41796','62721.53','150.06586754713',NULL,'Menunggu Periksa','Ton','Triwulan IV',NULL,1,'kelautan','2024-03-25 09:14:21','2024-03-25 09:14:21'),
(29,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Pangan Dan Hortikultura',22.5,'22.5','24.85','110.44444444444',NULL,'Menunggu Periksa','Persen','Triwulan IV',NULL,1,'pertanian','2024-03-25 09:15:34','2024-03-25 09:15:34'),
(30,2023,NULL,NULL,NULL,'Persentase Peningkatan Produksi Peternakan',2.5,'2.5','22.4','896',NULL,'Menunggu Periksa','Persen','Triwulan IV',NULL,1,'pertanian','2024-03-25 09:16:21','2024-03-25 09:16:21'),
(31,2024,NULL,NULL,NULL,'Sasaran 1',1,'2','3','150',NULL,'Menunggu Periksa','Test Satuan Data Sasaran','Triwulan I',NULL,1,'1','2024-05-17 22:07:07','2024-05-17 22:07:07');

/*Table structure for table `sdi` */

DROP TABLE IF EXISTS `sdi`;

CREATE TABLE `sdi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sifat_data` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tampilkan` char(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sdi` */

insert  into `sdi`(`id`,`tahun`,`bulan`,`upload_file`,`upload_date`,`nama`,`bidang`,`user_id`,`sifat_data`,`status`,`tampilkan`,`created_at`,`updated_at`) values 
(3,2023,12,'f6c02ad0f08096a3ecad149a7441cca0.xlsx','2023-11-27 09:25:41','Data Jumlah Kapal Perikanan Tangkap yang diperiksa dan Jumlah Pelanggaran di Perairan Jakarta','kelautan',1,'Public','Selesai',NULL,'2023-11-27 09:25:41','2023-12-30 13:35:22'),
(4,2023,12,'bbbab0d4cefe0c102892ddb94ed24354.xlsx','2023-11-30 13:08:52','Persentase Kawasan Pemanfaatan Ruang Perairan Pesisir yang sesuai dengan Dokumen Perencanaan Ruang Laut','kelautan',1,'Public','Selesai',NULL,'2023-11-30 13:08:52','2023-12-30 13:35:26'),
(5,2023,12,'0c39fa8e83bf0689d83abaada83ce68b.xlsx','2023-11-30 13:09:41','Persentase Kepatuhan Pelaku Usaha Kelautan dan Perikanan','kelautan',1,'Public','Selesai',NULL,'2023-11-30 13:09:41','2023-12-30 13:40:03'),
(6,2023,12,'8d7f485295e8c65d81c9a852709f1e13.xlsx','2023-11-30 13:10:29','Data Luas Kawasan Konservasi yang dipulihkan Kondisi Ekosistemnya','kelautan',1,'Public','Selesai',NULL,'2023-11-30 13:10:29','2023-12-30 13:40:08'),
(7,2023,12,'765412f5f441502cd85c44bf5c624ea4.xlsx','2023-11-30 13:12:48','Jumlah Produksi Perikanan Tangkap','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:12:48','2023-12-30 13:40:11'),
(8,2023,12,'0d17c08af68f48921635808b1dc4b51d.xlsx','2023-11-30 13:13:18','Jumlah Produksi Perikanan Budidaya','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:13:18','2023-12-30 13:40:13'),
(9,2023,12,'f321b8de0832cc42d355e555d7161e23.xlsx','2023-11-30 13:13:59','Jumlah Produksi dan Pemasaran Produk Olahan Hasil Perikanan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:13:59','2023-12-30 13:40:18'),
(10,2023,12,'c458f6f6c8f8fab6aecd0c50887b65e0.xlsx','2023-11-30 13:14:38','Angka Konsumsi Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:14:38','2023-12-30 13:40:20'),
(11,2023,12,'8938c5f9025a24f4194a6706155c051f.xlsx','2023-11-30 13:15:03','Data PPISHP, BBI dan TPHP','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:15:03','2023-12-30 13:40:23'),
(12,2023,12,'92bb6abe3291218808d4329100072f4b.xlsx','2023-11-30 13:15:35','Data Kebun Bibit dan Agrowisata','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:15:35','2023-12-30 13:40:25'),
(13,2023,12,'d5c3ab999da758423a5abcaba2b81a1b.xlsx','2023-11-30 13:15:59','Data RPH','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:15:59','2023-12-30 13:40:29'),
(14,2023,12,'3dc75b19b45ff19e66a58911835cba02.xlsx','2023-11-30 13:16:40','Data Gang Hijau','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:16:40','2023-12-30 13:40:33'),
(15,2023,12,'45e2aa2602442d05dc471b21242eb83e.xlsx','2023-11-30 13:17:29','Data Kelompok Tani','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:17:29','2023-12-30 13:40:36'),
(16,2023,NULL,'d0c227512e49e83fd686437bfe6abc77.xlsx','2023-11-30 13:19:40','Produksi Sayuran dan Buah Semusim di DKI Jakarta','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:19:40','2023-11-30 13:19:40'),
(17,2023,NULL,'ca3335c25ee6741dc5162736ab29160f.xlsx','2023-11-30 13:33:11','Data Produksi Benih Padi','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:33:11','2023-11-30 13:33:11'),
(18,2023,NULL,'7ffe414ac22c73659327836a4e4b40c5.xlsx','2023-11-30 13:33:52','Data Produksi dan Pemasaran Produk Pertanian','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:33:52','2023-11-30 13:33:52'),
(19,2023,NULL,'665bb136eb120cfac696aa7aec3ac625.xlsx','2023-11-30 13:34:20','Data Lokasi Agrowisata yang dikembangkan','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:34:20','2023-11-30 13:34:20'),
(20,2023,NULL,'c506bf2a21a9ed451bf1bb6d28ca5c87.xlsx','2023-11-30 13:35:49','Data Penambahan Jumlah Fauna yang Dikonservasi','kelautan',1,'Public','Selesai',NULL,'2023-11-30 13:35:49','2023-11-30 13:35:49'),
(21,2023,7,'4851f1c24fb6fc76cb68a7982b7fb99d.xlsx','2023-11-30 13:36:26','Skor Pola Pangan Harapan (PPH)','Ketahanan Pangan',1,'Public','Selesai',NULL,'2023-11-30 13:36:27','2024-07-16 03:00:34'),
(22,2023,NULL,'c5e8b35e01d554640bff1d99d0202020.xlsx','2023-11-30 13:37:23','Jumlah Kapal Perikanan yang Melakukan Bongkar Muat di Pelabuhan Perikanan Muara Angke Kota Administrasi Jakarta Utara','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:37:23','2023-11-30 13:37:23'),
(23,2023,NULL,'ad92d665ffe1fbc1c264925603d1acbe.xlsx','2023-11-30 13:38:42','Data Luas Panen dan Jumlah Produksi Padi dan Palawija (Bahan Pangan Utama) di DKI Jakarta','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:38:42','2023-11-30 13:38:42'),
(24,2023,NULL,'601e14729f8222a0cd0bb256afa27d1e.xlsx','2023-11-30 13:39:22','Data Luas Panen dan Produksi Sayuran dan Buah-buahan semusim DKI Jakarta','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:39:22','2023-11-30 13:39:22'),
(25,2023,NULL,'fcb1aca9e99ff3704530a3277dd75ba7.xlsx','2023-11-30 13:39:57','Data Luas Panen dan Produksi Tanaman Hias di Provinsi DKI Jakarta','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:39:57','2023-11-30 13:39:57'),
(26,2023,NULL,'4347cfeffc487eca109feb0f8423fb04.xlsx','2023-11-30 13:40:25','Data Luas Panen dan Produksi Tanaman Obat di Provinsi DKI Jakarta','pertanian',1,'Public','Selesai',NULL,'2023-11-30 13:40:25','2023-11-30 13:40:25'),
(27,2023,NULL,'ace780bbafd3c9ab6eaab5b4e2d39a16.xlsx','2023-11-30 13:41:29','Data Jumlah Peternak di DKI Jakarta','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:41:29','2023-11-30 13:41:29'),
(28,2023,NULL,'a74b882fdc528460286ea13da30db867.xlsx','2023-11-30 13:42:03','Data Jumlah Populasi Ternak di DKI Jakarta','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:42:03','2023-11-30 13:42:03'),
(29,2023,NULL,'7d50797e058e6ce740fa9d9d179fde73.xlsx','2023-11-30 13:43:52','Data Tempat Pelelangan Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:43:52','2023-11-30 13:43:52'),
(30,2023,NULL,'80c045e7d7ff65578e1804e92d1c22b4.xlsx','2023-11-30 13:44:25','Data Jumlah Nelayan di DKI Jakarta','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:44:25','2023-11-30 13:44:25'),
(31,2023,NULL,'2c277affd2269e2d2b1539a4e6788210.xlsx','2023-11-30 13:44:54','Data Produksi Ikan Menurut Tempat Pelelangan Ikan dan Bulan DKI Jakarta','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:44:54','2023-11-30 13:48:02'),
(32,2023,NULL,'b72a352d8c715fae7af14efb2af3b9a2.xlsx','2023-11-30 13:45:22','Data Produksi Perikanan Menurut Subsektor','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:45:22','2023-11-30 13:45:22'),
(33,2023,NULL,'56485124129f354e5d5aa8d8e4aedb11.xlsx','2023-11-30 13:45:47','Data Produksi Benih Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:45:47','2023-11-30 13:45:47'),
(34,2023,NULL,'94a95b0da0cebd06f1c967945854f2f1.xlsx','2023-11-30 13:46:22','Data Produksi Ikan Laut dan Ikan Darat yang Masuk Tempat Pelelangan Ikan Menurut Bulan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:46:22','2023-11-30 13:46:22'),
(35,2023,NULL,'3b62fb586c01fc2302a4625daf012c5b.xlsx','2023-11-30 13:46:50','Data Produksi Ikan Menurut Tempat Pelelangan Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:46:50','2023-11-30 13:46:50'),
(36,2023,NULL,'d1e2f66b40a67956a083d27aeb32ddd6.xlsx','2023-11-30 13:47:29','Data Produksi Ikan yang Masuk Tempat Pelelangan Ikan Menurut Jenis Alat Penangkap','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:47:29','2023-11-30 13:47:29'),
(37,2023,NULL,'90fd2684269ad6fd39fe5d92e6b649d9.xlsx','2023-11-30 13:47:52','Data Produksi Ikan yang Masuk Tempat Pelelangan Ikan Menurut Jenis Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:47:52','2023-11-30 13:47:52'),
(38,2023,NULL,'be0b2e9ead07c288a5f48adef5bbf12b.xlsx','2023-11-30 13:48:55','Data Tangkapan Jenis Ikan','perikanan',1,'Public','Selesai',NULL,'2023-11-30 13:48:55','2023-11-30 13:48:55'),
(39,2023,NULL,'14a228c356ebd3f7384f7ae605f557c8.xlsx','2023-11-30 13:49:49','Data Produksi Susu dan Daging','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:49:49','2023-11-30 13:49:49'),
(40,2023,NULL,'293f1614e54c2f44bf8490dda86911a8.xlsx','2023-11-30 13:50:17','Data Pelayanan Kesehatan Hewan','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:50:17','2023-11-30 13:50:17'),
(41,2023,NULL,'94036daecbe0fe8efe429ab22a8dc6c4.xlsx','2023-11-30 13:50:45','Data Populasi Unggas Menurut Kabupaten/Kota Administrasi dan Jenis Unggas','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:50:45','2023-11-30 13:50:45'),
(42,2023,NULL,'da36ef645963cde77529e669112b5aec.xlsx','2023-11-30 13:51:11','Persentase Peningkatan Produksi Peternakan','peternakan',1,'Public','Selesai',NULL,'2023-11-30 13:51:11','2023-11-30 13:51:11'),
(43,2024,5,NULL,NULL,'test',NULL,1,'Public','Menunggu Periksa',NULL,'2024-05-13 00:05:26','2024-05-13 00:05:26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
