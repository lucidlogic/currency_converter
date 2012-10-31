Exchange Rates
=======================

Introduction
------------
This is a simple, mobile-friendly, application to save & view given exchange rates at a given date


Installation
------------
Upload application files

Setting up cron
----------------------------

add the following lin to your crontab to execute the cron.php through command line
0 09 * * * /usr/bin/php -f /var/www/cli/cron.php

With a preferred time for cron

Create Database & table
--------------------
Create a DB and run the following sql

CREATE TABLE `exchange_rate` (
  `id_currency` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(200) NOT NULL,
  `long` varchar(200) NOT NULL,
  `rate_buy` varchar(200) NOT NULL,
  `rate_sell` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;



Set up config
------------

Change config vars, according to your server settings in /config/config.php

Read the Manual 
-----------

User manual can be found /docs/user_manual.pdf