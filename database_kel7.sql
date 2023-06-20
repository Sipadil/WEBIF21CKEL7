/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - webif21c-kelompok7
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webif21c-kelompok7` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `webif21c-kelompok7`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `no` int(50) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga_perolehan` varchar(50) DEFAULT NULL,
  `harga_terkini` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `tahun_perolehan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`,`kode`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `barang` */

insert  into `barang`(`no`,`kode`,`nama`,`harga_perolehan`,`harga_terkini`,`jumlah`,`kondisi`,`tahun_perolehan`,`keterangan`) values 
(1,'B001','laptop','RP.5.000.000','RP.5.400.000','10','baik','2019','Aset Kekayaan'),
(2,'B002','laptop','RP.5.000.000','RP.5.400.000','10','baik','2019','Aset Kekayaan'),
(3,'B003','Monitor','RP.5.000.000','RP.5.400.000','10','baik','2019','Aset Kekayaan'),
(4,'B004','Monitor','RP.5.000.000','RP.5.400.000','10','baik','2019','Aset Kekayaan'),
(5,'B005','Laptop','RP.5.000.000','RP.5.400.000','10','baik','2019','Aset Kekayaan');

/*Table structure for table `dokumentasiasset` */

DROP TABLE IF EXISTS `dokumentasiasset`;

CREATE TABLE `dokumentasiasset` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen` varchar(255) NOT NULL,
  `nama_asset` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis_asset` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `harga_awal` decimal(20,2) DEFAULT NULL,
  `penyimpanan_dokumen` varchar(255) DEFAULT NULL,
  `foto_asset` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_dokumen`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dokumentasiasset` */

insert  into `dokumentasiasset`(`no`,`id_dokumen`,`nama_asset`,`keterangan`,`jenis_asset`,`tanggal_masuk`,`harga_awal`,`penyimpanan_dokumen`,`foto_asset`,`created_at`,`modified_at`) values 
(1,'D001','Komputer','Dokumentasi Foto Komputer','Elektronik','2023-05-23',0.00,'Rak A','1686460788_83d17d06bc9721cd56f5.png',NULL,NULL),
(2,'D002','Monitor','Dokumentasi Foto Monitor','Elektronik','2023-05-23',0.00,'Rak A','1686460851_0735a7e52a5c40eecd4f.png',NULL,'2023-06-11 12:20:51'),
(3,'D003','Lpatop','Dokumentasi Foto Laptop','Elektronik','2023-05-23',0.00,'Rak A','1686461049_0bc4dc124934e89d5a0a.png',NULL,'2023-06-11 12:24:09'),
(4,'D004','sound','Dokumentasi Foto Sound','Elektronik','2023-05-23',0.00,'Rak A','1686461958_f146fd8970c52163be70.png',NULL,'2023-06-11 12:39:18'),
(5,'D005','Proyektor','Dokumentasi Foto Proyektor','Elektronik','2023-05-23',0.00,'Rak A','1686461991_30aab1819b0bd9835434.png',NULL,'2023-06-11 12:39:51');

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `table` varchar(255) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `history` */

insert  into `history`(`id`,`nama_admin`,`role`,`table`,`aksi`,`keterangan`,`tanggal`) values 
(1,'fajar','admin','inventarisasset','Hapus','Menghapus Data : A006','2023-06-21 00:54:20'),
(2,'fadil','admin','inventarisasset','tambah','Menambah Data : A006','2023-06-21 00:51:17'),
(3,'fadil','admin','inventarisasset','edit','Mengedit Data : A006','2023-06-21 00:51:25'),
(4,'fadil','admin','inventarisasset','Hapus','Menghapus Data : A006','2023-06-21 00:51:32'),
(5,'fadil','admin','rekappeminjaman','tambah','Menambah Data : P006','2023-06-21 00:51:58'),
(6,'fadil','admin','rekappeminjaman','edit','Mengedit Data : P006','2023-06-21 00:52:07'),
(7,'fadil','admin','rekappeminjaman','Hapus','Menghapus Data : P006','2023-06-21 00:52:10'),
(8,'fadil','admin','dokumentasiasset','tambah','Menambah Data : D006','2023-06-21 00:52:48'),
(9,'fadil','admin','dokumentasiasset','edit','Mengedit Data : D006','2023-06-21 00:52:54'),
(10,'fadil','admin','dokumentasiasset','Hapus','Menghapus Data : D006','2023-06-21 00:52:57'),
(11,'fadil','admin','trackingasset','tambah','Menambah Data : T006','2023-06-21 00:53:19'),
(12,'fadil','admin','trackingasset','edit','Mengedit Data : T006','2023-06-21 00:53:28'),
(13,'fadil','admin','trackingasset','Hapus','Menghapus Data : T006','2023-06-21 00:53:31'),
(14,'fajar','admin','inventarisasset','tambah','Menambah Data : A006','2023-06-21 00:54:06'),
(15,'fajar','admin','inventarisasset','edit','Mengedit Data : A006','2023-06-21 00:54:12'),
(16,'fajar','admin','inventarisasset','Hapus','Menghapus Data : A006','2023-06-21 00:54:20'),
(17,'fajar','admin','inventarisasset','tambah','Menambah Data : A006','2023-06-21 01:14:44'),
(18,'fajar','admin','inventarisasset','Hapus','Menghapus Data : A006','2023-06-21 01:15:04'),
(19,'fadil','admin','inventarisasset','tambah','Menambah Data : A006','2023-06-21 05:53:37'),
(20,'fadil','admin','inventarisasset','edit','Mengedit Data : A006','2023-06-21 05:53:44'),
(21,'fadil','admin','inventarisasset','Hapus','Menghapus Data : A006','2023-06-21 05:53:52'),
(22,'fadil','admin','rekappeminjaman','tambah','Menambah Data : P006','2023-06-21 05:54:01'),
(23,'fadil','admin','rekappeminjaman','edit','Mengedit Data : P006','2023-06-21 05:54:08'),
(24,'fadil','admin','rekappeminjaman','Hapus','Menghapus Data : P006','2023-06-21 05:54:12');

/*Table structure for table `inventarisasset` */

DROP TABLE IF EXISTS `inventarisasset`;

CREATE TABLE `inventarisasset` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_asset` varchar(255) NOT NULL,
  `nama_asset` varchar(255) DEFAULT NULL,
  `jumlah` int(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis_asset` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `harga_awal` varchar(255) DEFAULT NULL,
  `harga_akhir` varchar(255) DEFAULT NULL,
  `lokasi_asset` varchar(100) DEFAULT NULL,
  `kondisi_asset` varchar(50) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `nomor_serial` varchar(100) DEFAULT NULL,
  `tanggal_garansi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_asset`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `inventarisasset` */

insert  into `inventarisasset`(`no`,`id_asset`,`nama_asset`,`jumlah`,`deskripsi`,`jenis_asset`,`tanggal_masuk`,`harga_awal`,`harga_akhir`,`lokasi_asset`,`kondisi_asset`,`departemen`,`nomor_serial`,`tanggal_garansi`,`keterangan`,`created_at`,`modified_at`) values 
(1,'A001','Komputer',10,'Komputer Lab Praktik','Elektronik','2015-01-20','30000000','-','Lab Praktik A','Baik','IT Department','SNKOM','2025-01-04','Komputer Untuk Praktik Mahasiswa DI Lab A','2023-06-11 19:12:13','2023-06-11 19:12:13'),
(2,'A002','Proyektor',15,'ProyektorLab Praktik','Elektronik','2016-01-20','40000000','-','Lab Praktik A','Baik','IT Department','SNKOM','2025-01-04','Proyektor Untuk Praktik Mahasiswa DI Lab A','2023-06-11 19:12:28','2023-06-11 19:19:51'),
(3,'A003','Laptop',25,'Laptop Lab Praktik','Elektronik','2017-01-20','50000000','-','Lab Praktik A','Baik','IT Department','SNKLAP','2025-01-04','Laptop Untuk Praktik Mahasiswa DI Lab A','2023-06-11 19:12:38','2023-06-11 19:12:38'),
(4,'A004','Monitor',35,'Monitor Lab Praktik','Elektronik','2018-01-20','70000000','','Lab Praktik A','Baik','IT Department','SNMON','2025-01-04','Monitor Untuk Praktik Mahasiswa DI Lab A','2023-06-11 19:12:46','2023-06-11 19:12:46'),
(5,'A005','Sound System',12,'Sound Lab Praktik','Elektronik','2019-01-20','12500000','-','Lab Praktik A','Baik','IT Department','SNSOS','2025-01-04','Sound Untuk Praktik Mahasiswa DI Lab A','2023-06-11 12:12:35','2023-06-11 12:12:35');

/*Table structure for table `perhitungannilairoi` */

DROP TABLE IF EXISTS `perhitungannilairoi`;

CREATE TABLE `perhitungannilairoi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_perhitungan` varchar(255) NOT NULL,
  `id_asset` varchar(255) DEFAULT NULL,
  `tanggal_perhitungan` date DEFAULT NULL,
  `harga_awal` decimal(20,2) DEFAULT NULL,
  `harga_akhir` decimal(20,2) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_perhitungan`),
  KEY `id_asset` (`id_asset`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `perhitungannilairoi` */

insert  into `perhitungannilairoi`(`no`,`id_perhitungan`,`id_asset`,`tanggal_perhitungan`,`harga_awal`,`harga_akhir`,`periode`,`created_at`,`modified_at`) values 
(1,'R001','A001','2023-01-01',5000000.00,4000000.00,1,'2023-05-21 11:58:27','2023-05-21 11:58:27'),
(2,'R002','A002','2023-02-01',2000000.00,1500000.00,1,'2023-05-21 11:58:27','2023-05-21 11:58:27'),
(3,'R003','A003','2023-03-01',10000000.00,8000000.00,1,'2023-05-21 11:58:27','2023-05-21 11:58:27'),
(4,'R004','A004','2023-04-01',1500000.00,1200000.00,1,'2023-05-21 11:58:27','2023-05-21 11:58:27'),
(5,'R005','A005','2023-05-01',3000000.00,2500000.00,1,'2023-05-21 11:58:27','2023-05-21 11:58:27');

/*Table structure for table `rekappeminjaman` */

DROP TABLE IF EXISTS `rekappeminjaman`;

CREATE TABLE `rekappeminjaman` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` varchar(255) NOT NULL,
  `id_asset` varchar(255) DEFAULT NULL,
  `id_peminjam` varchar(255) DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status_peminjaman` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_asset` (`id_asset`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rekappeminjaman` */

insert  into `rekappeminjaman`(`no`,`id_peminjaman`,`id_asset`,`id_peminjam`,`tanggal_peminjaman`,`tanggal_pengembalian`,`status_peminjaman`,`created_at`,`modified_at`) values 
(1,'P001','A009','PEM001','2022-03-03','2025-01-01','Berlangsung','2023-06-11 12:18:04','2023-06-11 12:18:04'),
(2,'P002','A005','PEM002','2022-03-03','2025-01-01','Berlangsung','2023-06-11 12:17:54','2023-06-11 12:17:54'),
(3,'P003','A001','PEM003','2022-03-03','2025-01-01','Berlangsung','2023-06-11 12:17:36','2023-06-11 12:17:42'),
(4,'P004','A006','PEM004','2022-03-03','2025-01-01','Berlangsung','2023-06-11 12:20:21','2023-06-11 12:20:21'),
(5,'P005','A009','PEM005','2022-03-03','2025-01-01','Berlangsung','2023-06-21 00:46:44','2023-06-21 00:46:44');

/*Table structure for table `trackingasset` */

DROP TABLE IF EXISTS `trackingasset`;

CREATE TABLE `trackingasset` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_tracking` varchar(255) NOT NULL,
  `id_asset` varchar(255) DEFAULT NULL,
  `tanggal_update` date DEFAULT NULL,
  `status_terkini` varchar(100) DEFAULT NULL,
  `lokasi_terkini` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_tracking`),
  KEY `id_asset` (`id_asset`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `trackingasset` */

insert  into `trackingasset`(`no`,`id_tracking`,`id_asset`,`tanggal_update`,`status_terkini`,`lokasi_terkini`,`created_at`,`modified_at`) values 
(1,'T001','A006','2023-02-08','Digunakan','Lab A','2023-06-11 12:40:22','2023-06-11 12:40:22'),
(2,'T002','A005','2023-02-08','Digunakan','Lab B','2023-06-11 12:40:52','2023-06-11 12:40:52'),
(3,'T003','A002','2023-02-08','Digunakan','Lab GSG','2023-06-11 12:41:05','2023-06-11 12:41:05'),
(4,'T004','A001','2023-02-08','Nganggur','Gudang','2023-06-20 23:44:51','2023-06-20 23:44:51'),
(5,'T005','A001','2023-02-08','Digunakan','Lab C','2023-06-11 12:41:18','2023-06-11 12:41:18'),
(6,'T006','A001','2023-02-08','Digunakan','Lab C','2023-06-21 01:00:11','2023-06-21 01:00:11');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`is_admin`) values 
(1,'fadil','fadil',0),
(2,'fajar','fajar',0),
(3,'askan','admin',0),
(4,'lina','admin',0),
(5,'erik','admin',0),
(6,'habibi','admin',0),
(7,'rafiu','admin',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
