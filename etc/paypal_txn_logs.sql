create table paypal_txn_log (
	id        varchar(20) primary key,
	refno         varchar(150),
	first_name    varchar(64),
	last_name     varchar(64),
	payer_email   varchar(127),
	payer_id      varchar(13),
	payer_status  varchar(20),
	contact_phone varchar(20),
	payment_fee   decimal(10,2),
	payment_gross decimal(10,2),
	amount decimal(10,2)
);


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