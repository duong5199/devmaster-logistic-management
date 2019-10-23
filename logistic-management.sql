/*
 Navicat Premium Data Transfer

 Source Server         : btvn 
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : logistic-management

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 23/10/2019 17:32:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_kho
-- ----------------------------
DROP TABLE IF EXISTS `tb_kho`;
CREATE TABLE `tb_kho`  (
  `makho` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tenkho` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `manv` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ngaysua` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`makho`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_nhanvien
-- ----------------------------
DROP TABLE IF EXISTS `tb_nhanvien`;
CREATE TABLE `tb_nhanvien`  (
  `manv` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `makho` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tennv` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ngaysinh` date NULL DEFAULT NULL,
  `sdt` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chucvu` tinyint(1) NOT NULL COMMENT '1: quan ly kho    2:nhan vien kho   3:nhan vien van chuyen',
  PRIMARY KEY (`manv`) USING BTREE,
  INDEX `tk_nhanvien_kho`(`makho`) USING BTREE,
  CONSTRAINT `tk_nhanvien_kho` FOREIGN KEY (`makho`) REFERENCES `tb_kho` (`makho`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` bit(1) NULL DEFAULT NULL,
  `role` tinyint(1) NULL DEFAULT NULL COMMENT '1:  admin   2: quản lý kho   3: nhân viên kho   4: nhân viên vận chuyển ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'admin', 'admin', 'admin@gmail.com', b'1', 1);
INSERT INTO `tb_user` VALUES (2, 'harry', 'aaaaa', 'harry', 'harry@gmail.com', b'0', 2);

-- ----------------------------
-- Table structure for tb_vandon
-- ----------------------------
DROP TABLE IF EXISTS `tb_vandon`;
CREATE TABLE `tb_vandon`  (
  `mavd` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `makho` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `manv` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tenkh` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sdt` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `loaihang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `khoiluong` decimal(10, 0) NULL DEFAULT NULL,
  `tongtien` decimal(10, 0) NOT NULL,
  `trangthai` tinyint(1) NOT NULL COMMENT '1: chờ giao hàng   2: đang giao hàng   3: đang nhập kho   4: đã nhập kho   5: đã nhận hàng ',
  PRIMARY KEY (`mavd`) USING BTREE,
  INDEX `tk_vandon_kho`(`makho`) USING BTREE,
  INDEX `tk_vandon_nhanvien`(`manv`) USING BTREE,
  CONSTRAINT `tk_vandon_kho` FOREIGN KEY (`makho`) REFERENCES `tb_kho` (`makho`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tk_vandon_nhanvien` FOREIGN KEY (`manv`) REFERENCES `tb_nhanvien` (`manv`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
