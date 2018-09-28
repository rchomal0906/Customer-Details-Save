<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('detailsave')};
CREATE TABLE {$this->getTable('detailsave')} (
  `detailsave_id` int(11) unsigned NOT NULL auto_increment,
  `customer_first_name` varchar(255) NOT NULL default '',
  `customer_last_name` varchar(255) NOT NULL default '',
  `customer_email` varchar(255) NOT NULL default '',
  `customer_phone` varchar(255) NOT NULL default '',
  `customer_country` varchar(255) NOT NULL default '',
  `customer_state` varchar(255) NOT NULL default '',
  `customer_city` varchar(255) NOT NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`detailsave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 