/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_apotek

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 09/06/2020 23:59:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pembuat_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  PRIMARY KEY (`id_obat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES (1, 'Furosemide', 'Dr.Albert', '100', '2020-06-08');
INSERT INTO `obat` VALUES (2, 'PCMX with Emollient', 'Dr.Tirta', '100', '2024-06-20');
INSERT INTO `obat` VALUES (3, 'Saline Nasal', 'Dr.Fajar', '100', '2020-06-22');
INSERT INTO `obat` VALUES (4, 'Natural herb', 'Dr.Enstein', '100', '2020-07-22');
INSERT INTO `obat` VALUES (5, 'Naproxen', 'Dr.Najwa', '100', '2020-06-16');
INSERT INTO `obat` VALUES (6, 'Torsemide', 'Dr.Opung', '100', '2020-06-22');
INSERT INTO `obat` VALUES (7, 'Glycopyrrolate', 'Dr.Avrom', '100', '2020-06-11');
INSERT INTO `obat` VALUES (8, 'PurKlenz', 'Dr.Libbie', '100', '2020-07-02');
INSERT INTO `obat` VALUES (9, 'Haloperidol Decanoate', 'Dr.Lissi', '100', '2020-07-30');
INSERT INTO `obat` VALUES (10, 'Methocarbamol', 'Dr.Amrosi', '100', '2020-06-18');

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  PRIMARY KEY (`id_pasien`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES (1, 'Tn.Fajar', '1996-09-01');
INSERT INTO `pasien` VALUES (2, 'Tn.Ipul', '2020-06-08');
INSERT INTO `pasien` VALUES (3, 'Ny.Anissa', '2020-06-10');
INSERT INTO `pasien` VALUES (4, 'Tn.Bobi', '2020-06-02');
INSERT INTO `pasien` VALUES (5, 'Ny.Indah', '2020-06-04');
INSERT INTO `pasien` VALUES (6, 'Ny.Bella', '2020-06-04');
INSERT INTO `pasien` VALUES (7, 'Ny.Santi', '2020-06-11');
INSERT INTO `pasien` VALUES (8, 'Ny.Laure', '2020-06-17');
INSERT INTO `pasien` VALUES (9, 'Tn.Tades', '2020-06-18');
INSERT INTO `pasien` VALUES (10, 'Tn.Glenn', '2020-06-24');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (1, 1, 1, '1');
INSERT INTO `transaksi` VALUES (2, 2, 2, '2');
INSERT INTO `transaksi` VALUES (3, 3, 3, '3');
INSERT INTO `transaksi` VALUES (4, 4, 4, '4');
INSERT INTO `transaksi` VALUES (5, 5, 5, '5');

SET FOREIGN_KEY_CHECKS = 1;
