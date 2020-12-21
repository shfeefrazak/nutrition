/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.5-10.4.14-MariaDB : Database - nutrition
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`nutrition` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nutrition`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id_pk` bigint(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_note` text DEFAULT NULL,
  `cat_img` text DEFAULT NULL,
  `cat_status` int(1) DEFAULT NULL,
  `cat_added` datetime DEFAULT NULL,
  `cat_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`cat_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`cat_id_pk`,`cat_name`,`cat_note`,`cat_img`,`cat_status`,`cat_added`,`cat_updated`) values (1,'cat 1',NULL,NULL,1,'2020-12-21 11:30:13','2020-12-21 11:30:13'),(2,'cat 2',NULL,NULL,1,'2020-12-21 20:57:56','2020-12-21 20:57:56');

/*Table structure for table `data` */

DROP TABLE IF EXISTS `data`;

CREATE TABLE `data` (
  `data_id_pk` bigint(11) NOT NULL AUTO_INCREMENT,
  `data_type` int(1) DEFAULT NULL,
  `data_head` text DEFAULT NULL,
  `data_price` varchar(10) DEFAULT NULL,
  `data_img` text DEFAULT NULL,
  `data_avail` bigint(1) DEFAULT 0,
  `data_lang` varchar(5) DEFAULT NULL,
  `data_region` varchar(5) DEFAULT NULL,
  `data_cat_id` int(11) DEFAULT NULL,
  `data_date` varchar(50) DEFAULT NULL,
  `data_updated` datetime DEFAULT NULL,
  `data_added` datetime DEFAULT NULL,
  `data_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`data_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data` */

insert  into `data`(`data_id_pk`,`data_type`,`data_head`,`data_price`,`data_img`,`data_avail`,`data_lang`,`data_region`,`data_cat_id`,`data_date`,`data_updated`,`data_added`,`data_status`) values (1,2,'product 1 English Saudi','252.00','uploads/posts/image_nutrition_images-1_1348.png',1,'en','sa',1,'Monday 21 December 2020','2020-12-21 11:57:14','2020-12-21 11:33:11',1),(2,2,'كن لا بد','252.00','uploads/posts/image_nutrition_images-1_8985.png',1,'ar','sa',1,'','2020-12-21 12:03:04','2020-12-21 11:34:05',1),(3,2,'product 2 UAE english','252.45','uploads/posts/image_nutrition_download-1_9386.png',0,'en','ae',1,'Monday 21 December 2020','2020-12-21 12:03:42','2020-12-21 11:48:18',1),(4,2,' و سأعرض','252.45','uploads/posts/image_nutrition_download-1_3931.png',0,'ar','ae',1,'','2020-12-21 11:53:45','2020-12-21 11:53:45',1),(5,2,'يبتسم ','444','uploads/posts/image_nutrition_images_804.png',1,'ar','sa',2,'','2020-12-21 20:59:01','2020-12-21 20:59:01',1),(6,2,'product 2 Saudi Eng','7777','uploads/posts/image_nutrition_images_9423.png',NULL,'en','sa',2,'Monday 21 December 2020','2020-12-21 22:14:18','2020-12-21 22:14:18',1),(7,2,' حي لهذا، من منا لم','55','uploads/posts/image_nutrition_product-image-png-5-Transparent-Images_9830.png',1,'ar','sa',2,'','2020-12-21 22:15:15','2020-12-21 22:15:15',1),(8,2,'فيعرضهم ','520','uploads/posts/image_nutrition_product-image-png-5-Transparent-Images_2942.png',1,'ar','sa',1,'','2020-12-21 22:16:00','2020-12-21 22:16:00',1),(9,2,'product 3 saudi','1223','uploads/posts/image_nutrition_product-image-png-5-Transparent-Images_6791.png',NULL,'en','sa',1,'Monday 21 December 2020','2020-12-21 22:16:55','2020-12-21 22:16:55',1),(10,2,'ومنطقية ','963','uploads/posts/image_nutrition_product-image-png-5-Transparent-Images_8211.png',1,'ar','ae',1,'','2020-12-21 22:17:42','2020-12-21 22:17:42',1),(11,2,'Product  2 UAE (for delete)','4514',NULL,1,'en','ae',2,'Monday 21 December 2020','2020-12-21 22:23:49','2020-12-21 22:18:23',1),(12,2,'product 3 UAE','235','uploads/posts/image_nutrition_images_8073.png',1,'en','ae',1,'Monday 21 December 2020','2020-12-21 22:19:41','2020-12-21 22:19:41',1),(13,2,'PRoduct 4 Uae','545','uploads/posts/image_nutrition_download-1_6632.png',1,'en','ae',2,'Monday 21 December 2020','2020-12-21 22:20:29','2020-12-21 22:20:29',1),(14,2,' لديه','2634165','uploads/posts/image_nutrition_unnamed_406.png',1,'ar','ae',2,'','2020-12-21 22:22:08','2020-12-21 22:22:08',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userIdPk` double DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `userType` varchar(60) DEFAULT NULL,
  `userStatus` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userIdPk`,`name`,`email`,`username`,`password`,`regDate`,`userType`,`userStatus`) values (1,'Tester','aa@aa.com','aa@aa.com','asd','2018-01-30','Admin',1),(2,'abc','abc@gmail.com','abc@gmail.com','abc123','2018-01-30','user',1),(3,'wizzo','wizzo@gmail.com','wizzo@gmail.com','wizzo123','2018-01-31','user',1),(4,'asd','asd@gmail.com','asd@gmail.com','asd123','2018-01-31','user',1),(5,'tester123','test123@gmail.com','test123@gmail.com','45','2018-02-10','user',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
