/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : apotek

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 01/03/2021 22:59:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_setup
-- ----------------------------
DROP TABLE IF EXISTS `app_setup`;
CREATE TABLE `app_setup`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `apotek_id` bigint(20) NULL DEFAULT NULL,
  `nama_aplikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon_aplikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_aplikasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `alamat_aplikasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_setup
-- ----------------------------
INSERT INTO `app_setup` VALUES (1, 1, 'Google Apotek', NULL, 'google-apotek1614444380.png', 'Jl.Kopo', '2021-02-27 23:46:21', '2021-02-27 16:46:21');

-- ----------------------------
-- Table structure for detail_pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian_obat`;
CREATE TABLE `detail_pembelian_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_batch` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `jumlah_satuan_terkecil` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `tgl_exp` date NULL DEFAULT NULL,
  `harga_beli` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `margin_jual` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian_obat
-- ----------------------------
INSERT INTO `detail_pembelian_obat` VALUES (59, 'FTR00001', 'OBT0001', 'BTCH0001', 100, 0, 4, '2021-03-28', 1000, 2, 100, 1, '2021-02-28 06:00:12', '2021-02-28 06:00:12');
INSERT INTO `detail_pembelian_obat` VALUES (60, 'FTR00002', 'OBT0001', 'BTCH0002', 100, 0, 5, '2021-03-31', 10000, 5, 100, 1, '2021-02-28 06:01:39', '2021-02-28 06:01:39');
INSERT INTO `detail_pembelian_obat` VALUES (61, 'FTR00003', 'OBT0001', 'BTCH0003', 10, 0, 7, '2021-04-10', 100000, 10, 100, 1, '2021-02-28 06:02:48', '2021-02-28 06:02:48');
INSERT INTO `detail_pembelian_obat` VALUES (62, 'FTR00004', 'OBT0001', 'BTCH0006', 100, 0, 7, '2021-03-01', 100000, 5, 100, 1, '2021-02-28 06:10:18', '2021-02-28 06:10:18');
INSERT INTO `detail_pembelian_obat` VALUES (63, 'FTR00007', 'OBT0002', 'btch00012', 50, 0, 4, '2021-04-10', 500, 5, 100, 1, '2021-02-28 06:18:12', '2021-02-28 06:18:12');
INSERT INTO `detail_pembelian_obat` VALUES (64, 'FTR00008', 'OBT0002', 'btch00013', 50, 0, 5, '2021-04-10', 5000, 5, 100, 1, '2021-02-28 06:19:29', '2021-02-28 06:19:29');

-- ----------------------------
-- Table structure for detail_penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan_obat`;
CREATE TABLE `detail_penjualan_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_transaksi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan_obat
-- ----------------------------
INSERT INTO `detail_penjualan_obat` VALUES (75, 'OBT0001', 'TRN-28022145', 10, 4, 2000, 0, 20000, 2, '2021-02-28 09:56:50', '2021-02-28 09:56:50');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for golongan
-- ----------------------------
DROP TABLE IF EXISTS `golongan`;
CREATE TABLE `golongan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of golongan
-- ----------------------------
INSERT INTO `golongan` VALUES (1, 'Obat Herbal (Jamu)', NULL, NULL);
INSERT INTO `golongan` VALUES (2, 'Obat Fitofarmaka', NULL, NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Obat Bebas Terbatas', NULL, NULL);
INSERT INTO `kategori` VALUES (2, 'Obat Bebas', NULL, NULL);
INSERT INTO `kategori` VALUES (3, 'Obat Keras', NULL, NULL);
INSERT INTO `kategori` VALUES (4, 'Obat Wajib Apotek (OWA)', NULL, NULL);
INSERT INTO `kategori` VALUES (5, 'Obat Golongan Narkotika\r\n', NULL, NULL);
INSERT INTO `kategori` VALUES (6, 'Obat Psikotropika', NULL, NULL);
INSERT INTO `kategori` VALUES (7, 'Obat Herbal', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_02_20_163157_create_golongan_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_02_20_163221_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_02_20_163230_create_obat_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_02_20_163237_create_suplier_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_02_20_164051_create_unit_table', 1);

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_minimum` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES (11, 'OBT0001', 'Vitacimin', 100, 2, 2, 0, NULL, '2021-02-28 05:54:02', '2021-02-28 05:54:02');
INSERT INTO `obat` VALUES (12, 'OBT0002', 'Bodrexin', 100, 1, 2, 0, NULL, '2021-02-28 06:16:58', '2021-02-28 06:16:58');
INSERT INTO `obat` VALUES (13, 'OBTS001', 'AKURAT STP *1S', 100, 2, 2, 0, NULL, '2021-02-28 13:31:42', '2021-02-28 13:31:42');
INSERT INTO `obat` VALUES (14, 'OBTS002', 'CALADINE POWDER', 10, 1, 2, 0, NULL, '2021-02-28 13:33:02', '2021-02-28 13:33:02');

-- ----------------------------
-- Table structure for pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_obat`;
CREATE TABLE `pembelian_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_faktur` date NULL DEFAULT NULL,
  `suplier_id` bigint(20) NOT NULL,
  `pajak` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jatuh_tempo` date NULL DEFAULT NULL,
  `jumlah_tagihan` int(11) NULL DEFAULT NULL,
  `status_tagihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_obat
-- ----------------------------
INSERT INTO `pembelian_obat` VALUES (26, 'FTR00001', '2021-02-28', 1, 0, 0, 'Tunai', NULL, 98000, 'lunas', 1, '2021-02-28 06:00:12', '2021-02-28 06:00:12');
INSERT INTO `pembelian_obat` VALUES (27, 'FTR00002', '2021-02-28', 1, 10, 0, 'Tunai', NULL, 1045000, 'lunas', 1, '2021-02-28 06:01:39', '2021-02-28 06:01:39');
INSERT INTO `pembelian_obat` VALUES (28, 'FTR00003', '2021-02-28', 1, 10, 0, 'Tunai', NULL, 990000, 'lunas', 1, '2021-02-28 06:02:48', '2021-02-28 06:02:48');
INSERT INTO `pembelian_obat` VALUES (29, 'FTR00004', '2021-03-13', 1, 10, 0, 'Tunai', NULL, 10450000, 'lunas', 1, '2021-02-28 06:10:18', '2021-02-28 06:10:18');
INSERT INTO `pembelian_obat` VALUES (30, 'FTR00007', '2021-02-28', 1, 0, 0, 'Tunai', NULL, 23750, 'lunas', 1, '2021-02-28 06:18:12', '2021-02-28 06:18:12');
INSERT INTO `pembelian_obat` VALUES (31, 'FTR00008', '2021-02-28', 1, 0, 0, 'Kredit', '2021-03-31', 237500, 'belum_lunas', 1, '2021-02-28 06:19:29', '2021-02-28 06:19:29');

-- ----------------------------
-- Table structure for penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_obat`;
CREATE TABLE `penjualan_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_transaksi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_transaksi` date NULL DEFAULT NULL,
  `pelanggan_id` bigint(20) NOT NULL,
  `jumlah_bayar` int(11) NULL DEFAULT NULL,
  `uang_bayar` int(11) NULL DEFAULT NULL,
  `uang_kembali` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_obat
-- ----------------------------
INSERT INTO `penjualan_obat` VALUES (45, 'TRN-28022145', '2021-02-28', 0, 20000, 20000, 0, 2, '2021-02-28 09:56:50', '2021-02-28 09:56:50');

-- ----------------------------
-- Table structure for satuan_obat
-- ----------------------------
DROP TABLE IF EXISTS `satuan_obat`;
CREATE TABLE `satuan_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_id` bigint(20) NULL DEFAULT NULL,
  `jumlah_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_id_sama_dengan` bigint(20) NULL DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga_Jual` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`, `stok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satuan_obat
-- ----------------------------
INSERT INTO `satuan_obat` VALUES (19, 'OBT0001', 4, '1', 4, 115, 2000, '2021-02-28 16:56:50', '2021-02-28 09:56:50');
INSERT INTO `satuan_obat` VALUES (20, 'OBT0001', 5, '10', 4, 100, 20000, '2021-02-28 13:01:39', '2021-02-28 06:01:39');
INSERT INTO `satuan_obat` VALUES (21, 'OBT0001', 7, '50', 5, 110, 200000, '2021-02-28 13:10:18', '2021-02-28 06:10:18');
INSERT INTO `satuan_obat` VALUES (22, 'OBT0002', 4, '1', 4, 57, 1000, '2021-02-28 16:56:07', '2021-02-28 09:56:07');
INSERT INTO `satuan_obat` VALUES (23, 'OBT0002', 5, '10', 4, 50, 10000, '2021-02-28 13:19:29', '2021-02-28 06:19:29');
INSERT INTO `satuan_obat` VALUES (24, 'OBTS001', 4, '1', 4, 0, 0, '2021-02-28 13:31:42', '2021-02-28 13:31:42');
INSERT INTO `satuan_obat` VALUES (25, 'OBTS001', 5, '10', 4, 0, 0, '2021-02-28 13:31:42', '2021-02-28 13:31:42');
INSERT INTO `satuan_obat` VALUES (26, 'OBTS002', 8, '1', 8, 0, 0, '2021-02-28 13:33:02', '2021-02-28 13:33:02');
INSERT INTO `satuan_obat` VALUES (27, 'OBTS002', 9, '10', 8, 0, 0, '2021-02-28 13:33:02', '2021-02-28 13:33:02');

-- ----------------------------
-- Table structure for suplier
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suplier
-- ----------------------------
INSERT INTO `suplier` VALUES (1, 'PT Kabayan Consulting', 'Jl. Pasirkaliki Cimahi', 'Willy', '08525415532', '2021-02-20 16:45:21', '2021-02-20 16:45:21');

-- ----------------------------
-- Table structure for temp_pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `temp_pembelian_obat`;
CREATE TABLE `temp_pembelian_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_batch` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `jumlah_satuan_terkecil` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `tgl_exp` date NULL DEFAULT NULL,
  `harga_beli` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `margin_jual` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temp_pembelian_obat
-- ----------------------------
INSERT INTO `temp_pembelian_obat` VALUES (59, 'OBTS001', 'H20002', 3, 0, 5, '2025-02-27', 8500, 5, 100, 1, '2021-02-28 13:35:59', '2021-02-28 13:35:59');

-- ----------------------------
-- Table structure for temp_penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `temp_penjualan_obat`;
CREATE TABLE `temp_penjualan_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_satuan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (4, 'Pcs', 1, '2021-02-27 07:18:53', '2021-02-27 07:18:53');
INSERT INTO `unit` VALUES (5, 'Strip', 2, '2021-02-27 07:19:14', '2021-02-27 07:19:14');
INSERT INTO `unit` VALUES (6, 'Minidose', 3, '2021-02-27 07:19:24', '2021-02-27 07:19:24');
INSERT INTO `unit` VALUES (7, 'Box', 4, '2021-02-27 07:19:31', '2021-02-27 07:19:31');
INSERT INTO `unit` VALUES (8, 'Botol', 3, '2021-02-28 13:30:39', '2021-02-28 13:30:39');
INSERT INTO `unit` VALUES (9, 'Tube', 4, '2021-02-28 13:30:54', '2021-02-28 13:30:54');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin', NULL, '$2y$10$IaxscuwchfpNm/kaKV3wnebnQAnvmHfd.RO2HtJYjYvL8W64tq8Gy', 'admin', NULL, '2021-02-20 16:44:50', '2021-02-27 17:19:11');
INSERT INTO `users` VALUES (2, 'Willy', 'willy', NULL, '$2y$10$0E19YTvDZgOGNWmki3WJ6e5xLru3EjbZvW3r4DsuSTv7qzUxp85T.', 'kasir', NULL, '2021-02-27 04:29:44', '2021-02-27 04:29:44');

SET FOREIGN_KEY_CHECKS = 1;
