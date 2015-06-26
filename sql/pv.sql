-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 24, 2015 at 06:23 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `elite`
--

-- --------------------------------------------------------

--
-- Table structure for table `pv`
--
DROP TABLE IF EXISTS `pv`;
CREATE TABLE `pv` (
`ID` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ts` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pv`
--

INSERT INTO `pv` (`ID`, `ip`, `ts`) VALUES
(1, '0.0.0.0', 1434361635),
(2, '0.0.0.0', 1434362064),
(3, '0.0.0.0', 1434374881),
(4, '0.0.0.0', 1434416966),
(5, '0.0.0.0', 1434428805),
(6, '0.0.0.0', 1434466164),
(7, '0.0.0.0', 1434505447),
(8, '0.0.0.0', 1434550673),
(9, '0.0.0.0', 1434632845),
(10, '0.0.0.0', 1434695854),
(11, '0.0.0.0', 1435119654);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pv`
--
ALTER TABLE `pv`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pv`
--
ALTER TABLE `pv`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;