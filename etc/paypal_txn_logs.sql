CREATE TABLE `paypal_txn_logs` (
    `id` varchar(20) NOT NULL,
    `refno` varchar(150) DEFAULT NULL,
    `first_name` varchar(64) DEFAULT NULL,
    `last_name` varchar(64) DEFAULT NULL,
    `payer_email` varchar(127) DEFAULT NULL,
    `payer_id` varchar(13) DEFAULT NULL,
    `payer_status` varchar(20) DEFAULT NULL,
    `contact_phone` varchar(20) DEFAULT NULL,
    `payment_fee` decimal(10,2) DEFAULT NULL,
    `payment_gross` decimal(10,2) DEFAULT NULL,
    `amount` decimal(10,2) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE `paypal_items` (
    `id` varchar(36) NOT NULL,
    `instant_payment_notification_id` varchar(36) NOT NULL,
    `item_name` varchar(127) default NULL,
    `item_number` varchar(127) default NULL,
    `quantity` varchar(127) default NULL,
    `mc_gross` float(10,2) default NULL,
    `mc_shipping` float(10,2) default NULL,
    `mc_handling` float(10,2) default NULL,
    `tax` float(10,2) default NULL,
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;