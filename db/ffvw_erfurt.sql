-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 18. Juli 2011 um 21:35
-- Server Version: 5.1.41
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ffvw_erfurt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ffvw_acclogin`
--

CREATE TABLE IF NOT EXISTS `ffvw_acclogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `ffvw_acclogin`
--

INSERT INTO `ffvw_acclogin` (`id`, `user`, `pass`, `type`, `name`) VALUES
(1, 'multiuseridenticatest1', '', 1, 'FFEF_Account'),
(2, 'multiuseridenticatest2', '', 1, 'FFEF_NODE_1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ffvw_group`
--

CREATE TABLE IF NOT EXISTS `ffvw_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `ffvw_group`
--

INSERT INTO `ffvw_group` (`id`, `name`) VALUES
(1, 'Freifunk Erfurt bei Identi.ca'),
(2, 'Zwei');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ffvw_isacc`
--

CREATE TABLE IF NOT EXISTS `ffvw_isacc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `accid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `ffvw_isacc`
--

INSERT INTO `ffvw_isacc` (`id`, `groupid`, `accid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ffvw_isgroup`
--

CREATE TABLE IF NOT EXISTS `ffvw_isgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `ffvw_isgroup`
--

INSERT INTO `ffvw_isgroup` (`id`, `userid`, `groupid`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ffvw_user`
--

CREATE TABLE IF NOT EXISTS `ffvw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `ffvw_user`
--

INSERT INTO `ffvw_user` (`id`, `name`, `password`, `email`) VALUES
(1, 'Admin', '098f6bcd4621d373cade4e832627b4f6', 'test@example.com'),
(2, 'Dummy', '098f6bcd4621d373cade4e832627b4f6', 'dummy@example.de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
