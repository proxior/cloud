-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2020 at 02:26 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proxior`
--

-- --------------------------------------------------------

--
-- Table structure for table `prox_access_level`
--

CREATE TABLE IF NOT EXISTS `prox_access_level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `email` varchar(70) NOT NULL,
  `email_type` varchar(12) NOT NULL,
  `access_level` varchar(8) NOT NULL,
  `access_level_num` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_backup_data`
--

CREATE TABLE IF NOT EXISTS `prox_backup_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mac_addr` varchar(24) NOT NULL,
  `ip_addr` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_backup_devices`
--

CREATE TABLE IF NOT EXISTS `prox_backup_devices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `device_id` varchar(64) NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` varchar(128) NOT NULL,
  `longitude` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  `all_info` varchar(256) NOT NULL,
  `all_info2` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=988 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_backup_login`
--

CREATE TABLE IF NOT EXISTS `prox_backup_login` (
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_data`
--

CREATE TABLE IF NOT EXISTS `prox_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mac_addr` varchar(24) NOT NULL,
  `ip_addr` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_deny_level`
--

CREATE TABLE IF NOT EXISTS `prox_deny_level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `access_level` varchar(8) NOT NULL,
  `error_level` varchar(8) NOT NULL,
  `ip_addr` varchar(31) NOT NULL,
  `os` varchar(16) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_devices`
--

CREATE TABLE IF NOT EXISTS `prox_devices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `device_id` varchar(64) NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` varchar(128) NOT NULL,
  `longitude` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  `all_info` varchar(256) NOT NULL,
  `all_info2` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_forgot`
--

CREATE TABLE IF NOT EXISTS `prox_forgot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `when_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `result` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_login`
--

CREATE TABLE IF NOT EXISTS `prox_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL DEFAULT 'NOT NULL',
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_type` varchar(12) NOT NULL,
  `forgot_text` varchar(32) NOT NULL,
  `verification_code` varchar(5) NOT NULL,
  `verify` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_login_error_attempts`
--

CREATE TABLE IF NOT EXISTS `prox_login_error_attempts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_addr` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_log_file`
--

CREATE TABLE IF NOT EXISTS `prox_log_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `ip_addr` varchar(32) NOT NULL,
  `path` varchar(128) NOT NULL,
  `connect` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4038 ;

-- --------------------------------------------------------

--
-- Table structure for table `prox_users_activities`
--

CREATE TABLE IF NOT EXISTS `prox_users_activities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  `ip_addr` varchar(64) NOT NULL,
  `os` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `log_in_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=435 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
