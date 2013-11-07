/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.1.37 : Database - aboundinginlove
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`aboundinginlove` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aboundinginlove`;

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` varchar(10) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `donation_requests` */

DROP TABLE IF EXISTS `donation_requests`;

CREATE TABLE `donation_requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `sponsee_id` bigint(20) DEFAULT NULL,
  `details` text,
  `type` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Table structure for table `instant_payment_notifications` */

DROP TABLE IF EXISTS `instant_payment_notifications`;

CREATE TABLE `instant_payment_notifications` (
  `id` char(36) NOT NULL,
  `pay_key` varchar(100) DEFAULT NULL,
  `notify_version` varchar(64) DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `address_city` varchar(40) DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `item_name` varchar(127) DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `receiver_email` varchar(127) DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `option_name1` varchar(64) DEFAULT NULL COMMENT 'Option name 1 as requested by you',
  `option_name2` varchar(64) DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection1` varchar(200) DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_selection2` varchar(200) DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) DEFAULT '' COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `invite_clicks` */

DROP TABLE IF EXISTS `invite_clicks`;

CREATE TABLE `invite_clicks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(50) NOT NULL,
  `token_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `invites` */

DROP TABLE IF EXISTS `invites`;

CREATE TABLE `invites` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `token_id` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `to` text,
  `message` text,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Table structure for table `paypal_items` */

DROP TABLE IF EXISTS `paypal_items`;

CREATE TABLE `paypal_items` (
  `id` varchar(36) NOT NULL,
  `instant_payment_notification_id` varchar(36) NOT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `quantity` varchar(127) DEFAULT NULL,
  `mc_gross` float(10,2) DEFAULT NULL,
  `mc_shipping` float(10,2) DEFAULT NULL,
  `mc_handling` float(10,2) DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `paypal_txn_logs` */

DROP TABLE IF EXISTS `paypal_txn_logs`;

CREATE TABLE `paypal_txn_logs` (
  `id` varchar(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `sponsee_id` bigint(20) DEFAULT NULL,
  `donation_type` varchar(50) DEFAULT NULL,
  `refno` varchar(150) DEFAULT NULL,
  `details` text,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `payer_email` varchar(127) DEFAULT NULL,
  `payer_id` varchar(13) DEFAULT NULL,
  `payer_status` varchar(20) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `payment_fee` decimal(10,2) DEFAULT NULL,
  `payment_gross` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `portfolio_categories` */

DROP TABLE IF EXISTS `portfolio_categories`;

CREATE TABLE `portfolio_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `portfolio_images` */

DROP TABLE IF EXISTS `portfolio_images`;

CREATE TABLE `portfolio_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` longblob,
  `content_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Table structure for table `portfolios` */

DROP TABLE IF EXISTS `portfolios`;

CREATE TABLE `portfolios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sponsee_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Table structure for table `profile_images` */

DROP TABLE IF EXISTS `profile_images`;

CREATE TABLE `profile_images` (
  `id` bigint(20) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` longblob,
  `content_type` varchar(50) DEFAULT NULL,
  `hash_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `sponsee_donation_items` */

DROP TABLE IF EXISTS `sponsee_donation_items`;

CREATE TABLE `sponsee_donation_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `sponsee_need_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

/*Table structure for table `sponsee_donations` */

DROP TABLE IF EXISTS `sponsee_donations`;

CREATE TABLE `sponsee_donations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `sponsee_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `donation_method` varchar(50) DEFAULT NULL,
  `from` datetime DEFAULT NULL,
  `to` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1131 DEFAULT CHARSET=latin1;

/*Table structure for table `sponsee_images` */

DROP TABLE IF EXISTS `sponsee_images`;

CREATE TABLE `sponsee_images` (
  `id` bigint(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` longblob,
  `content_type` varchar(50) DEFAULT NULL,
  `hash_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `sponsee_need_categories` */

DROP TABLE IF EXISTS `sponsee_need_categories`;

CREATE TABLE `sponsee_need_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Table structure for table `sponsee_needs` */

DROP TABLE IF EXISTS `sponsee_needs`;

CREATE TABLE `sponsee_needs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sponsee_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `neededamount` decimal(10,2) DEFAULT NULL,
  `donatedamount` decimal(10,2) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `donation_method` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL COMMENT 'OPEN|CLOSED',
  `payer_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Table structure for table `sponsees` */

DROP TABLE IF EXISTS `sponsees`;

CREATE TABLE `sponsees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `maplocation` varchar(500) DEFAULT NULL,
  `videolink` text,
  `long_description` text,
  `short_description` text,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `purpose_of_donation` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uix_user_username` (`username`),
  UNIQUE KEY `uix_user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `donation_request_cleaner` */

/*!50106 DROP EVENT IF EXISTS `donation_request_cleaner`*/;

DELIMITER $$

/*!50106 CREATE EVENT `donation_request_cleaner` ON SCHEDULE EVERY 1 DAY STARTS '2013-10-25 09:45:48' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	    Delete from donation_requests where date_add(created, interval 6 month) < now();
	END */$$
DELIMITER ;

/* Event structure for event `pending_donation_cleaner` */

/*!50106 DROP EVENT IF EXISTS `pending_donation_cleaner`*/;

DELIMITER $$

/*!50106 CREATE EVENT `pending_donation_cleaner` ON SCHEDULE EVERY 1 DAY STARTS '2013-10-24 12:02:02' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		DELETE sponsee_donations, sponsee_donation_items
		FROM sponsee_donations
		LEFT JOIN sponsee_donation_items
		ON sponsee_donations.id = sponsee_donation_items.parent_id
		WHERE  date_add(created, interval 6 month) < now();
	END */$$
DELIMITER ;

/*Table structure for table `friend_invites` */

DROP TABLE IF EXISTS `friend_invites`;

/*!50001 DROP VIEW IF EXISTS `friend_invites` */;
/*!50001 DROP TABLE IF EXISTS `friend_invites` */;

/*!50001 CREATE TABLE `friend_invites` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `token_id` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `to` text,
  `message` text,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `clicks` decimal(41,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `sponsee_listing` */

DROP TABLE IF EXISTS `sponsee_listing`;

/*!50001 DROP VIEW IF EXISTS `sponsee_listing` */;
/*!50001 DROP TABLE IF EXISTS `sponsee_listing` */;

/*!50001 CREATE TABLE `sponsee_listing` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `maplocation` varchar(500) DEFAULT NULL,
  `videolink` text,
  `long_description` text,
  `short_description` text,
  `birthdate` date DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `total_neededamount` decimal(32,2) DEFAULT NULL,
  `total_donatedamount` decimal(32,2) DEFAULT NULL,
  `percentage` decimal(41,6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*View structure for view friend_invites */

/*!50001 DROP TABLE IF EXISTS `friend_invites` */;
/*!50001 DROP VIEW IF EXISTS `friend_invites` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `friend_invites` AS select `i`.`id` AS `id`,`i`.`token_id` AS `token_id`,`i`.`user_id` AS `user_id`,`i`.`to` AS `to`,`i`.`message` AS `message`,`i`.`type` AS `type`,`i`.`status` AS `status`,`i`.`created` AS `created`,sum(coalesce(`ic`.`id`,0)) AS `clicks` from (`invites` `i` left join `invite_clicks` `ic` on((`ic`.`token_id` = `i`.`token_id`))) group by `i`.`id`,`ic`.`token_id` */;

/*View structure for view sponsee_listing */

/*!50001 DROP TABLE IF EXISTS `sponsee_listing` */;
/*!50001 DROP VIEW IF EXISTS `sponsee_listing` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sponsee_listing` AS select `s`.`id` AS `id`,`s`.`firstname` AS `firstname`,`s`.`lastname` AS `lastname`,`s`.`middlename` AS `middlename`,`s`.`gender` AS `gender`,`s`.`address` AS `address`,`s`.`country` AS `country`,`s`.`maplocation` AS `maplocation`,`s`.`videolink` AS `videolink`,`s`.`long_description` AS `long_description`,`s`.`short_description` AS `short_description`,`s`.`birthdate` AS `birthdate`,(year(now()) - year(`s`.`birthdate`)) AS `age`,sum(coalesce(`sn`.`neededamount`,0)) AS `total_neededamount`,sum(coalesce((case when (`sn`.`status` = 'CLOSED') then `sn`.`neededamount` else `sn`.`donatedamount` end),0)) AS `total_donatedamount`,coalesce(((sum(coalesce((case when (`sn`.`status` = 'CLOSED') then `sn`.`neededamount` else `sn`.`donatedamount` end),0)) / sum(coalesce(`sn`.`neededamount`,0))) * 100),0) AS `percentage` from (`sponsees` `s` left join `sponsee_needs` `sn` on((`sn`.`sponsee_id` = `s`.`id`))) group by `s`.`id` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
