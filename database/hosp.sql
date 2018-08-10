-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2015 at 10:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` text NOT NULL,
  `email` text NOT NULL,
  `hashed` text NOT NULL,
  `pix` text NOT NULL,
  `name` text NOT NULL,
  `hid` int(11) NOT NULL,
  `bk` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `rank`, `email`, `hashed`, `pix`, `name`, `hid`, `bk`, `active`) VALUES
(2, 'Pharmacist', 'alukobt@yahoo.com', 'b9ec3c203d6a1b0aa10b20d10400b9e3', '1410978209vlcsnap-2014-08-19-07h25m53s249.png', 'Akindutire Toyin', 1, 0, 0),
(5, 'Head Doctor', 'ibk@yahoo.com', 'f43333fed193bd2736528e95728073a9', '1411272746IMG_20140717_071912.jpg', 'Akinbuluma Ibukun Tade', 1, 0, 1),
(6, 'Distributor', 'zaxa@gmail.com', 'f4420cce8068ddaa4dea3f7fa54df4c3', '1411273336IMG_20140819_153929.jpg', 'Eze Zachariah', 0, 0, 0),
(7, 'Pharmacist', 'des@gmail.com', '6636e1322531bd6a9bf66f3c3aabd8d6', '1411568206MSO3ARC2012713.jpg', 'Desmond Ayodotun', 0, 0, 0),
(8, 'Distributor', 'alah@yahoo.com', '7b3d40a155f96184b0af850821d5435a', '1412800189MSO5MAC20121201.jpg', 'Alade Olusola', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Toothpaste'),
(2, 'Pracetamol'),
(3, 'Wine'),
(4, 'Pimples Cure');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpin`
--

CREATE TABLE IF NOT EXISTS `forgotpin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(50) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `forgotpin`
--

INSERT INTO `forgotpin` (`id`, `pass`, `hash`) VALUES
(8, 'toyin', 'b9ec3c203d6a1b0aa10b20d10400b9e3'),
(12, 'eze', 'f4420cce8068ddaa4dea3f7fa54df4c3'),
(13, 'freeman', '6636e1322531bd6a9bf66f3c3aabd8d6'),
(14, 'alade', '7b3d40a155f96184b0af850821d5435a');

-- --------------------------------------------------------

--
-- Table structure for table `newcomment`
--

CREATE TABLE IF NOT EXISTS `newcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(500) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newcomment`
--

INSERT INTO `newcomment` (`id`, `head`, `comments`, `time`) VALUES
(1, 'NEW DRUGS AVAILABLE', 'What is the meaning of that', 'Tue   05 :31 am'),
(2, 'GOOD DRUGS', 'Wow! that is great', 'Tue   05 :36 am'),
(3, 'NEW DRUGS AVAILABLE', 'Hello', 'Fri   11 :43 am'),
(4, 'GOOD DRUGS', 'Good mood\r\n', 'Fri   11 :44 am');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `report` longtext NOT NULL,
  `time` varchar(50) NOT NULL,
  `noco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject`, `report`, `time`, `noco`) VALUES
(1, 'NEW DRUGS AVAILABLE', 'We have brought new drugs, oooooooooooooooooooooooooooooooooooooooooooooooh!', 'Sep Tue, 2014 || 05:30 am', 2),
(2, 'GOOD DRUGS', 'I am having complaints on your drugs price, please beat down your price, really ,i enjoyed the extraordinary working performance of the drugs, keep it up.', 'Sep Tue, 2014 || 05:35 am', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderer`
--

CREATE TABLE IF NOT EXISTS `orderer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(60) NOT NULL,
  `name` text NOT NULL,
  `rand` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orderer`
--

INSERT INTO `orderer` (`id`, `hash`, `name`, `rand`, `Location`, `phone`, `time`) VALUES
(1, '31cba74b2e6a95f289fe0c443e404c36', 'MR HIK', '1415592206', '78 Joke Avenue', '09938', '2014 Nov 10 05:'),
(2, '34da8cb4c56786c61ddca80e29633740', 'MR AKINLADE', '1247647756', '23 Hills Bus-stop, Akure ,Nigeria', '08107926083', '2009 Jul 15 10:'),
(3, '94d5a9ad1a500b474e9535f54df0dca0', 'MR/MRS JKKJ', '1435443776', 'GU', '787687687', '2015 Jun 28 00:');

-- --------------------------------------------------------

--
-- Table structure for table `ordertab`
--

CREATE TABLE IF NOT EXISTS `ordertab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `costprice` bigint(20) NOT NULL,
  `pin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ordertab`
--

INSERT INTO `ordertab` (`id`, `item_id`, `item_name`, `quantity`, `costprice`, `pin`) VALUES
(1, 1, 'Close Up', 1, 470, '795996DP'),
(2, 4, 'Xanery', 2, 1300, '795996DP'),
(3, 3, 'Herbal', 1, 200, '795996DP'),
(4, 5, 'Emzor', 10, 4000, '795996DP'),
(5, 4, 'Xanery', 1, 650, '209918XH'),
(6, 2, 'My My', 2, 700, '209918XH');

-- --------------------------------------------------------

--
-- Table structure for table `producta`
--

CREATE TABLE IF NOT EXISTS `producta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `prod` text NOT NULL,
  `costprice` text NOT NULL,
  `details` text NOT NULL,
  `icon` text NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `producta`
--

INSERT INTO `producta` (`id`, `category_id`, `prod`, `costprice`, `details`, `icon`, `quantity`) VALUES
(1, 1, 'Close Up', '470', 'Easy Cure', '1411407255Web-Pinterest-alt-Metro-icon.png', 0),
(2, 1, 'My My', '350', 'Easy Usage', '1411407290Web-Folder-icon.png', 2),
(3, 1, 'Herbal', '200', 'Easy To Use', '1411407324Web-Folder-icon (1).png', 1),
(4, 1, 'Xanery', '650', 'Easy To Use', '1411407354Web-browser-icon.png', 8),
(5, 2, 'Emzor', '400', 'Easy To Use', '1411407435private_folder.png', 1),
(6, 2, 'M & B', '450', 'Easy To Use', '1411407459vote33.jpg', 37),
(7, 2, 'Razor', '300', 'Easy Usage', '1411407623Web-HTML-icon.png', 15),
(8, 3, 'Ponche', '540', 'Easy Cure', '1411407970images(20).jpeg', 8),
(9, 3, 'Red  Wine', '250', 'Cure Fast', '1411407999images(27).jpeg', 6),
(10, 3, 'Cocktail', '3000', 'Cure Fast', '1411408041images(23).jpeg', 4),
(11, 3, 'Eva', '1500', 'Easy Cure', '1411408084images(22).jpeg', 0),
(12, 4, 'Skineal', '350', 'Easy Cure', '1411408107images(15).jpeg', 2),
(13, 4, 'Funbact-A', '200', 'Easy To Use', '1411408127images(17).jpeg', 17),
(14, 4, 'Surphur-8', '350', 'Cure Fast', '1411408146images(25).jpeg', 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
