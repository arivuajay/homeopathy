/*
SQLyog Ultimate v8.55 
MySQL - 5.5.36 : Database - homeopathy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `hme_med_categories` */

DROP TABLE IF EXISTS `hme_med_categories`;

CREATE TABLE `hme_med_categories` (
  `med_cat_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `med_cat_name` varchar(100) NOT NULL,
  `med_cat_parent` mediumint(9) DEFAULT NULL,
  `med_cat_unit` enum('1','2') NOT NULL COMMENT '1 => ml, 2 => gms',
  `med_cat_desc` text NOT NULL,
  `med_cat_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`med_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_med_categories` */

/*Table structure for table `hme_med_stock` */

DROP TABLE IF EXISTS `hme_med_stock`;

CREATE TABLE `hme_med_stock` (
  `tenant` mediumint(9) NOT NULL,
  `stk_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `stk_med_id` mediumint(9) NOT NULL,
  `stk_pkg_id` mediumint(9) NOT NULL,
  `stk_batch_no` varchar(150) DEFAULT NULL,
  `stk_avail_units` int(11) NOT NULL DEFAULT '0',
  `stk_debit_units` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stk_id`),
  KEY `FK_hme_med_stock_medicine` (`stk_med_id`),
  KEY `FK_hme_med_stock_medpackage` (`stk_pkg_id`),
  KEY `FK_hme_med_stock_tenant` (`tenant`),
  CONSTRAINT `FK_hme_med_stock_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_med_stock_medicine` FOREIGN KEY (`stk_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_med_stock_medpackage` FOREIGN KEY (`stk_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_med_stock` */

/*Table structure for table `hme_medicine_pkg` */

DROP TABLE IF EXISTS `hme_medicine_pkg`;

CREATE TABLE `hme_medicine_pkg` (
  `pkg_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `pkg_med_id` mediumint(9) NOT NULL,
  `pkg_med_unit` mediumint(9) NOT NULL,
  `pkg_med_power` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`pkg_id`),
  KEY `FK_hme_medicine_pkg_medicine` (`pkg_med_id`),
  CONSTRAINT `FK_hme_medicine_pkg_medicine` FOREIGN KEY (`pkg_med_id`) REFERENCES `hme_medicines` (`med_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_medicine_pkg` */

/*Table structure for table `hme_medicines` */

DROP TABLE IF EXISTS `hme_medicines`;

CREATE TABLE `hme_medicines` (
  `tenant` mediumint(9) NOT NULL,
  `med_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `med_cat_id` mediumint(9) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `med_desc` longtext,
  `med_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`med_id`),
  KEY `FK_hme_medicines_category` (`med_cat_id`),
  KEY `FK_hme_medicines_tenant` (`tenant`),
  CONSTRAINT `FK_hme_medicines_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_medicines_category` FOREIGN KEY (`med_cat_id`) REFERENCES `hme_med_categories` (`med_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_medicines` */

/*Table structure for table `hme_purchase_order` */

DROP TABLE IF EXISTS `hme_purchase_order`;

CREATE TABLE `hme_purchase_order` (
  `tenant` mediumint(9) NOT NULL,
  `po_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `po_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `po_vendor` mediumint(9) NOT NULL,
  `po_invoice` varchar(100) NOT NULL,
  `po_memo` text,
  `po_total` decimal(10,2) NOT NULL,
  `po_paid` decimal(10,2) DEFAULT NULL,
  `po_status` enum('0','1','2') NOT NULL DEFAULT '1',
  `po_created_by` mediumint(9) NOT NULL,
  PRIMARY KEY (`po_id`),
  KEY `FK_hme_purchase_order_vendor` (`po_vendor`),
  KEY `FK_hme_purchase_order_tenant` (`tenant`),
  KEY `FK_hme_purchase_order_created_by` (`po_created_by`),
  CONSTRAINT `FK_hme_purchase_order_created_by` FOREIGN KEY (`po_created_by`) REFERENCES `hme_users` (`ur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_vendor` FOREIGN KEY (`po_vendor`) REFERENCES `hme_vendors` (`ven_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_purchase_order` */

/*Table structure for table `hme_purchase_order_medicines` */

DROP TABLE IF EXISTS `hme_purchase_order_medicines`;

CREATE TABLE `hme_purchase_order_medicines` (
  `itm_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `itm_po_id` mediumint(9) NOT NULL,
  `itm_med_id` mediumint(9) NOT NULL,
  `itm_pkg_id` mediumint(9) NOT NULL,
  `itm_batch_no` varchar(150) NOT NULL,
  `itm_manf_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `itm_exp_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `itm_vat_tax` decimal(10,2) DEFAULT NULL,
  `itm_mrp_price` decimal(10,2) DEFAULT NULL,
  `itm_discount` decimal(10,2) DEFAULT NULL,
  `itm_net_rate` decimal(10,2) DEFAULT NULL,
  `itm_qty` tinyint(4) NOT NULL,
  `itm_total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`itm_id`),
  KEY `FK_hme_purchase_order_medicines_porder` (`itm_po_id`),
  KEY `FK_hme_purchase_order_medicines_medicine` (`itm_med_id`),
  KEY `FK_hme_purchase_order_medicines_medpackage` (`itm_pkg_id`),
  CONSTRAINT `FK_hme_purchase_order_medicines_medicine` FOREIGN KEY (`itm_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_medicines_medpackage` FOREIGN KEY (`itm_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_medicines_porder` FOREIGN KEY (`itm_po_id`) REFERENCES `hme_purchase_order` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_purchase_order_medicines` */

/*Table structure for table `hme_sales_order` */

DROP TABLE IF EXISTS `hme_sales_order`;

CREATE TABLE `hme_sales_order` (
  `tenant` mediumint(9) NOT NULL,
  `so_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `so_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 => Retailer(Patient), 2=> Wholesale(Other homeo centre)',
  `so_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `so_user` mediumint(9) DEFAULT NULL COMMENT 'If SO Type is 1 => refer user tbl, else refer vendor tbl',
  `so_doctor` mediumint(9) DEFAULT NULL,
  `so_memo` text,
  `so_total` decimal(10,2) NOT NULL,
  `so_paid` decimal(10,2) DEFAULT NULL,
  `so_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`so_id`),
  KEY `FK_hme_sales_order_tenant` (`tenant`),
  CONSTRAINT `FK_hme_sales_order_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_sales_order` */

/*Table structure for table `hme_sales_order_medicines` */

DROP TABLE IF EXISTS `hme_sales_order_medicines`;

CREATE TABLE `hme_sales_order_medicines` (
  `itm_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `itm_so_id` mediumint(9) NOT NULL COMMENT 'Relatrion to sales_order',
  `itm_med_id` mediumint(9) NOT NULL COMMENT 'Relatrion to medicines',
  `itm_pkg_id` mediumint(9) NOT NULL COMMENT 'Relatrion to med_package',
  `itm_batch_no` varchar(150) NOT NULL,
  `itm_vat_tax` decimal(10,2) DEFAULT NULL,
  `itm_mrp_price` decimal(10,2) DEFAULT NULL,
  `itm_discount` decimal(10,2) DEFAULT NULL,
  `itm_net_rate` decimal(10,2) DEFAULT NULL,
  `itm_qty` tinyint(4) NOT NULL,
  `itm_total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`itm_id`),
  KEY `FK_hme_sales_order_medicines_sorder` (`itm_so_id`),
  KEY `FK_hme_sales_order_medicines_medicine` (`itm_med_id`),
  KEY `FK_hme_sales_order_medicines_medpackage` (`itm_pkg_id`),
  CONSTRAINT `FK_hme_sales_order_medicines_medpackage` FOREIGN KEY (`itm_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_sales_order_medicines_medicine` FOREIGN KEY (`itm_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_sales_order_medicines_sorder` FOREIGN KEY (`itm_so_id`) REFERENCES `hme_sales_order` (`so_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_sales_order_medicines` */

/*Table structure for table `hme_tenants` */

DROP TABLE IF EXISTS `hme_tenants`;

CREATE TABLE `hme_tenants` (
  `tn_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tn_hospital_name` varchar(150) NOT NULL,
  `tn_address_one` varchar(255) NOT NULL,
  `tn_address_two` varchar(255) NOT NULL,
  `tn_address_three` varchar(255) DEFAULT NULL,
  `tn_city` mediumint(9) DEFAULT NULL,
  `tn_state` mediumint(9) DEFAULT NULL,
  `tn_country` mediumint(9) DEFAULT NULL,
  `tn_website` varchar(100) DEFAULT NULL,
  `tn_email` varchar(100) DEFAULT NULL,
  `tn_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tn_created_by` mediumint(9) DEFAULT NULL,
  `tn_status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_tenants` */

/*Table structure for table `hme_user_role` */

DROP TABLE IF EXISTS `hme_user_role`;

CREATE TABLE `hme_user_role` (
  `urole_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `urole_name` varchar(150) NOT NULL,
  `urole_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`urole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hme_user_role` */

insert  into `hme_user_role`(`urole_id`,`urole_name`,`urole_status`) values (8,'Patient','1'),(9,'Doctor','1'),(10,'Pharmacist','1'),(11,'Admin','1');

/*Table structure for table `hme_users` */

DROP TABLE IF EXISTS `hme_users`;

CREATE TABLE `hme_users` (
  `tenant` mediumint(9) NOT NULL COMMENT 'Users amongst which tenant id, refers hme_tenants table PK',
  `ur_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ur_role_id` mediumint(9) NOT NULL COMMENT 'User role id, refers hme_user_role table PK',
  `ur_username` varchar(100) NOT NULL,
  `ur_password` varchar(100) NOT NULL,
  `ur_activation_key` varchar(100) DEFAULT NULL,
  `ur_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ur_modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ur_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ur_last_ip` varchar(50) DEFAULT NULL,
  `ur_status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`ur_id`),
  KEY `FK_hme_users_role` (`ur_role_id`),
  KEY `FK_hme_users_tenant` (`tenant`),
  CONSTRAINT `FK_hme_users_role` FOREIGN KEY (`ur_role_id`) REFERENCES `hme_user_role` (`urole_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_users_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_users` */

/*Table structure for table `hme_vendors` */

DROP TABLE IF EXISTS `hme_vendors`;

CREATE TABLE `hme_vendors` (
  `tenant` mediumint(9) NOT NULL,
  `ven_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ven_name` varchar(255) NOT NULL,
  `ven_address` text,
  `ven_phone_no` varchar(150) DEFAULT NULL,
  `ven_email` varchar(150) DEFAULT NULL,
  `ven_status` enum('0','1') NOT NULL DEFAULT '1',
  `ven_created_by` mediumint(9) NOT NULL,
  `ven_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ven_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hme_vendors` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
