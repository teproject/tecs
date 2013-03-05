-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2013 at 07:30 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techpreneurship`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `photo_file_name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `published` set('No','Yes') NOT NULL DEFAULT 'No',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `photo_file_name`, `content`, `published`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(13, 'Biomedical Competitions for Student Innovators', 'Open_2011_student_team.jpg', 'The <a href="http://nciia.org/" target="_blank" rel="nofollow">National Collegiate Inventors and Innovators Alliance</a> (NCIIA) will hold their annual Biomedical Competitions for Undergraduate and Graduate students this spring.\r\n\r\nVisit <a href="http://nciia.org/competitions/" target="_blank" rel="nofollow">http://nciia.org/competitions/</a> for more information and enter your idea for chance to win!<br><br><i></i><br>', 'Yes', '2013-02-27 17:49:47', '2013-02-27 23:38:55', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(312) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `photo_file_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `published` set('No','Yes') NOT NULL DEFAULT 'No',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `photo_file_name`, `link`, `order`, `published`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Entrepreneurship', 'Entrepreneurship.png', '', 0, 'Yes', '2013-02-27 17:36:39', '2013-02-27 17:36:39', 0, 0),
(2, 'NCIIA''s Spring 2013 BME Competition', 'nciia.png', 'http://nciia.org/competitions/', 1, 'Yes', '2013-02-05 20:07:34', '2013-02-27 17:01:21', 0, 0),
(8, 'Kauffman Foundation', 'home_banner_12_2012.jpg', 'http://www.kauffman.org/', 0, 'Yes', '2013-02-27 17:06:15', '2013-02-27 17:06:15', 0, 0),
(10, 'Entrepreneurship', 'Entrepreneurship2.png', '', 0, 'Yes', '2013-02-27 17:37:01', '2013-02-27 17:37:01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` set('Administrator','Member') NOT NULL DEFAULT 'Member',
  `name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` char(40) NOT NULL,
  `activated` set('No','Yes') NOT NULL DEFAULT 'No',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group`, `name`, `email`, `password`, `activated`, `created`, `modified`) VALUES
(1, 'Administrator', 'Stiliyan Lazarov', 'sl01303p@pace.edu', '1bcd3d3531a98e66e09cf95876b96c7ce803f16a', 'Yes', '2012-12-04 18:37:25', '2012-12-04 18:37:25'),
(4, 'Member', 'Dr. Wolf', 'ss@test.edu', '877e7532cabe3f351bc345b47ad478cc557edc10', 'Yes', '2012-12-04 20:45:24', '2012-12-04 20:45:24'),
(5, 'Member', 'Stiliyan Lazarov', 'sl01303n@pace.edu', 'e3986e422008dcec11a37800f5a0a5ce3cec5cc4', 'Yes', '2012-12-18 23:13:52', '2012-12-18 23:13:52'),
(6, 'Member', 'Dr. Joseph', 'ajoseph2@pace.edu', '3e3195bb6e0ff5a93af2e5efcde0a7d1c75f7a95', 'No', '2013-02-06 18:49:03', '2013-02-06 18:49:03');
