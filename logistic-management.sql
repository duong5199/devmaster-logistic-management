/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : logistic-management

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 26/10/2019 12:59:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kho_vandon
-- ----------------------------
DROP TABLE IF EXISTS `kho_vandon`;
CREATE TABLE `kho_vandon`  (
  `id_kho` int(10) NOT NULL,
  `id_vandon` char(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  INDEX `Pk_kho_vandon`(`id_kho`) USING BTREE,
  INDEX `Pk_vandon`(`id_vandon`) USING BTREE,
  CONSTRAINT `Pk_kho_vandon` FOREIGN KEY (`id_kho`) REFERENCES `tb_kho` (`id_kho`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `Pk_vandon` FOREIGN KEY (`id_vandon`) REFERENCES `tb_vandon` (`id_vandon`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_kho
-- ----------------------------
DROP TABLE IF EXISTS `tb_kho`;
CREATE TABLE `tb_kho`  (
  `id_kho` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kho`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_vandon
-- ----------------------------
DROP TABLE IF EXISTS `tb_vandon`;
CREATE TABLE `tb_vandon`  (
  `id_vandon` char(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_kho` int(10) NOT NULL,
  `customer` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `product` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `weight` double(10, 0) NULL DEFAULT NULL,
  `total_money` double(10, 0) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1: chờ giao hàng   2: đang giao hàng   3: đang nhập kho   4: đã nhập kho   5: đã nhận hàng ',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_vandon`) USING BTREE,
  INDEX `Pk_vandon_kho`(`id_kho`) USING BTREE,
  CONSTRAINT `Pk_vandon_kho` FOREIGN KEY (`id_kho`) REFERENCES `tb_kho` (`id_kho`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `role` enum('admin','warehouse_manage','warehouse_staff','shipper','') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `phone` char(11) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `status` int(10) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `id_kho` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `Pk_users_kho`(`id_kho`) USING BTREE,
  CONSTRAINT `Pk_users_kho` FOREIGN KEY (`id_kho`) REFERENCES `tb_kho` (`id_kho`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
