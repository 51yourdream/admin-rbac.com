/*
Navicat MySQL Data Transfer

Source Server         : homestead
Source Server Version : 50547
Source Host           : 192.168.33.10:3306
Source Database       : laravel5rbac

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-04-05 18:58:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for admin_user_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_role`;
CREATE TABLE `admin_user_role` (
  `admin_user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`admin_user_id`,`role_id`),
  KEY `admin_user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `admin_user_roles_admin_user_id_foreign` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user_role
-- ----------------------------
INSERT INTO `admin_user_role` VALUES ('1', '10');

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$GBKiY/ngDVpe1iHwlTem3e0fbNrnv1sRLGcj4wT1isK0gbzY4oQoC', '1', 'aot2y8pFRyurjUWQs2JiH3QWZJcSTepfsgB1qXPwtXST8inqnjdTwilMSaa4', '2016-02-23 02:44:26', '2016-02-23 02:44:26');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价钱',
  `stocks` smallint(6) NOT NULL DEFAULT '0' COMMENT '库存量',
  `salenum` smallint(6) NOT NULL DEFAULT '0' COMMENT '销量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '测试商品1', 'pic', '测试商品', '测试商品', '2016-03-12 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('2', '测试商品2', 'pic', '测试商品', '测试商品', '2016-03-13 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('3', '测试商品3', 'pic', '测试商品', '测试商品', '2016-03-14 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('4', '测试商品4', 'pic', '测试商品', '测试商品', '2016-03-15 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('5', '测试商品5', 'pic', '测试商品', '测试商品', '2016-03-12 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('6', '测试商品6', 'pic', '测试商品', '测试商品', '2016-03-04 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('7', '测试商品7', 'pic', '测试商品', '测试商品', '2016-03-25 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');
INSERT INTO `goods` VALUES ('8', '测试商品8', 'pic', '测试商品', '测试商品', '2016-03-12 15:06:23', '2016-03-12 15:06:23', '9.99', '0', '0');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_18_071439_create_admin_users', '1');
INSERT INTO `migrations` VALUES ('2016_01_18_071720_create_admin_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_23_031442_entrust_base', '1');
INSERT INTO `migrations` VALUES ('2016_01_23_031518_entrust_pivot_admin_user_role', '1');
INSERT INTO `migrations` VALUES ('2016_03_31_065156_create_goods_table', '2');
INSERT INTO `migrations` VALUES ('2016_03_31_073043_edit_goods_table', '3');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('20', '10');
INSERT INTO `permission_role` VALUES ('21', '10');
INSERT INTO `permission_role` VALUES ('22', '10');
INSERT INTO `permission_role` VALUES ('35', '10');
INSERT INTO `permission_role` VALUES ('36', '10');
INSERT INTO `permission_role` VALUES ('37', '10');
INSERT INTO `permission_role` VALUES ('38', '10');
INSERT INTO `permission_role` VALUES ('39', '10');
INSERT INTO `permission_role` VALUES ('40', '10');
INSERT INTO `permission_role` VALUES ('42', '10');
INSERT INTO `permission_role` VALUES ('43', '10');
INSERT INTO `permission_role` VALUES ('44', '10');
INSERT INTO `permission_role` VALUES ('45', '10');
INSERT INTO `permission_role` VALUES ('46', '10');
INSERT INTO `permission_role` VALUES ('47', '10');
INSERT INTO `permission_role` VALUES ('48', '10');
INSERT INTO `permission_role` VALUES ('49', '10');
INSERT INTO `permission_role` VALUES ('50', '10');
INSERT INTO `permission_role` VALUES ('51', '10');
INSERT INTO `permission_role` VALUES ('52', '10');
INSERT INTO `permission_role` VALUES ('53', '10');
INSERT INTO `permission_role` VALUES ('54', '10');
INSERT INTO `permission_role` VALUES ('55', '10');
INSERT INTO `permission_role` VALUES ('56', '10');
INSERT INTO `permission_role` VALUES ('57', '10');
INSERT INTO `permission_role` VALUES ('58', '10');
INSERT INTO `permission_role` VALUES ('20', '12');
INSERT INTO `permission_role` VALUES ('21', '12');
INSERT INTO `permission_role` VALUES ('22', '12');
INSERT INTO `permission_role` VALUES ('35', '12');
INSERT INTO `permission_role` VALUES ('36', '12');
INSERT INTO `permission_role` VALUES ('37', '12');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单父ID',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图标class',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否作为菜单显示,[1|0]',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('20', '0', 'edit', '#-1456129983', '系统设置', '', '1', '100', '2016-02-22 08:33:03', '2016-02-22 08:33:03');
INSERT INTO `permissions` VALUES ('21', '20', '', 'admin.admin_user.index', '用户权限', '查看后台用户列表', '1', '0', '2016-02-18 07:56:26', '2016-02-18 07:56:26');
INSERT INTO `permissions` VALUES ('22', '20', '', 'admin.admin_user.create', '创建后台用户', '页面', '0', '0', '2016-02-23 03:48:18', '2016-02-23 03:48:18');
INSERT INTO `permissions` VALUES ('35', '0', 'home', 'admin.home', 'Dashboard', '后台首页', '1', '0', '2016-02-22 08:32:40', '2016-02-22 08:32:40');
INSERT INTO `permissions` VALUES ('36', '0', ' fa-laptop', '#-1456132007', '博客管理', '', '1', '0', '2016-02-22 09:06:47', '2016-02-22 09:06:47');
INSERT INTO `permissions` VALUES ('37', '36', '', 'admin.blog.index', '博客列表', '', '1', '0', '2016-02-22 09:15:48', '2016-02-22 09:15:48');
INSERT INTO `permissions` VALUES ('38', '20', '', 'admin.admin_user.store', '保存新建后台用户', '操作', '0', '0', '2016-02-23 03:48:52', '2016-02-23 03:48:52');
INSERT INTO `permissions` VALUES ('39', '20', '', 'admin.admin_user.destroy', '删除后台用户', '操作', '0', '0', '2016-02-23 03:49:09', '2016-02-23 03:49:09');
INSERT INTO `permissions` VALUES ('40', '20', '', 'admin.admin_user.destroy.all', '批量后台用户删除', '操作', '0', '0', '2016-02-23 04:01:01', '2016-02-23 04:01:01');
INSERT INTO `permissions` VALUES ('42', '20', '', 'admin.admin_user.edit', '编辑后台用户', '页面', '0', '0', '2016-02-23 03:48:35', '2016-02-23 03:48:35');
INSERT INTO `permissions` VALUES ('43', '20', '', 'admin.admin_user.update', '保存编辑后台用户', '操作', '0', '0', '2016-02-23 03:50:12', '2016-02-23 03:50:12');
INSERT INTO `permissions` VALUES ('44', '20', '', 'admin.permission.index', '权限管理', '', '1', '0', '2016-03-31 08:14:54', '2016-03-31 08:14:54');
INSERT INTO `permissions` VALUES ('45', '20', '', 'admin.permission.create', '新建权限', '页面', '0', '0', '2016-02-23 03:52:16', '2016-02-23 03:52:16');
INSERT INTO `permissions` VALUES ('46', '20', '', 'admin.permission.store', '保存新建权限', '操作', '0', '0', '2016-02-23 03:52:38', '2016-02-23 03:52:38');
INSERT INTO `permissions` VALUES ('47', '20', '', 'admin.permission.edit', '编辑权限', '页面', '0', '0', '2016-02-23 03:53:29', '2016-02-23 03:53:29');
INSERT INTO `permissions` VALUES ('48', '20', '', 'admin.permission.update', '保存编辑权限', '操作', '0', '0', '2016-02-23 03:53:56', '2016-02-23 03:53:56');
INSERT INTO `permissions` VALUES ('49', '20', '', 'admin.permission.destroy', '删除权限', '操作', '0', '0', '2016-02-23 03:54:27', '2016-02-23 03:54:27');
INSERT INTO `permissions` VALUES ('50', '20', '', 'admin.permission.destroy.all', '批量删除权限', '操作', '0', '0', '2016-02-23 03:55:17', '2016-02-23 03:55:17');
INSERT INTO `permissions` VALUES ('51', '20', '', 'admin.role.index', '角色管理', '', '1', '0', '2016-03-31 08:27:23', '2016-03-31 08:27:23');
INSERT INTO `permissions` VALUES ('52', '20', '', 'admin.role.create', '新建角色', '页面', '0', '0', '2016-02-23 03:56:33', '2016-02-23 03:56:33');
INSERT INTO `permissions` VALUES ('53', '20', '', 'admin.role.store', '保存新建角色', '操作', '0', '0', '2016-02-23 03:57:26', '2016-02-23 03:57:26');
INSERT INTO `permissions` VALUES ('54', '20', '', 'admin.role.edit', '编辑角色', '页面', '0', '0', '2016-02-23 03:58:25', '2016-02-23 03:58:25');
INSERT INTO `permissions` VALUES ('55', '20', '', 'admin.role.update', '保存编辑角色', '操作', '0', '0', '2016-02-23 03:58:50', '2016-02-23 03:58:50');
INSERT INTO `permissions` VALUES ('56', '20', '', 'admin.role.permissions', '角色权限设置', '', '0', '0', '2016-02-23 03:59:26', '2016-02-23 03:59:26');
INSERT INTO `permissions` VALUES ('57', '20', '', 'admin.role.destroy', '角色删除', '操作', '0', '0', '2016-02-23 03:59:49', '2016-02-23 03:59:49');
INSERT INTO `permissions` VALUES ('58', '20', '', 'admin.role.destroy.all', '批量删除角色', '', '0', '0', '2016-02-23 04:01:58', '2016-02-23 04:01:58');
INSERT INTO `permissions` VALUES ('59', '0', 'shopping-cart', '#-1459822337', '商品管理', '商品管理', '1', '0', '2016-04-05 02:12:17', '2016-04-05 02:12:17');
INSERT INTO `permissions` VALUES ('60', '59', '', 'admin.goods.index', '商品列表', '商品列表', '1', '0', '2016-04-05 02:22:02', '2016-04-05 02:22:02');
INSERT INTO `permissions` VALUES ('61', '59', '', 'admin.goods.create', '添加商品', '添加商品', '1', '0', '2016-04-05 02:27:07', '2016-04-05 02:27:07');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('10', 'administrator', '系统管理员', '', '2016-02-19 09:59:52', '2016-02-19 09:59:52');
INSERT INTO `roles` VALUES ('12', 'test', '测试员', '', '2016-02-19 10:00:43', '2016-02-19 10:00:43');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
