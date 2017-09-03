-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 18, 2017 at 03:18 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `experimentlist`
--

CREATE TABLE `experimentlist` (
  `id` int(10) NOT NULL,
  `experimentname` varchar(15) NOT NULL,
  `experimentlocation` varchar(15) NOT NULL,
  `experimenttime` varchar(100) NOT NULL,
  `category` varchar(15) NOT NULL,
  `pdfurl` varchar(50) DEFAULT NULL,
  `videourl` varchar(50) DEFAULT NULL,
  `flashurl` varchar(50) DEFAULT NULL,
  `First_Question` varchar(100) DEFAULT NULL,
  `First_Answer` varchar(100) DEFAULT NULL,
  `Second_Question` varchar(100) DEFAULT NULL,
  `Second_Answer` varchar(100) DEFAULT NULL,
  `Third_Question` varchar(100) DEFAULT NULL,
  `Third_Answer` varchar(100) DEFAULT NULL,
  `teacher` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experimentlist`
--

INSERT INTO `experimentlist` (`id`, `experimentname`, `experimentlocation`, `experimenttime`, `category`, `pdfurl`, `videourl`, `flashurl`, `First_Question`, `First_Answer`, `Second_Question`, `Second_Answer`, `Third_Question`, `Third_Answer`, `teacher`) VALUES
(37, '离心式水泵性能实验', '教四楼110', '2号上午08:00-10:00 1号上午08:00-10:00', '泵风', '离心式水泵性能实验.pdf', '离心式水泵性能实验.mp4', '离心式水泵性能实验.swf', 'This is the first question of the first experiment', 'The is the answer of the first question for the first experiment', 'This is the second question of the first experiment', 'This is the answer of the second question for the first experiment', 'This is the third question of the  first experiment', 'This is the answer of the third question for the first experiment', 'zf'),
(38, '离心式风机实验', '教四楼后风机实验室', '2号上午08:00-10:00 4号上午08:00-10:00 2号下午08:00-10:00', '泵风', '离心式风机进气实验.pdf', '离心式风机进气实验.mp4', '离心式风机进气实验.swf', 'This is the first question of the second experiment', 'This is the answer of the first question for the second experiment', 'This is the second question of the second experiment', 'This is the answer of the second question for the second experiment', 'This is the third question of the second experiment', 'This is the answer of the third question for the second experiment', 'ry'),
(42, '流体力学', '教四楼', '1号上午08:00-10:00 28号上午08:00-10:00', '流体', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zt'),
(43, '并联管路分流', '威中', '31号上午08:00-10:00 1号上午08:00-10:00', '流体', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ygc');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `studentname` varchar(15) NOT NULL,
  `experimentname` varchar(15) NOT NULL,
  `First_Answer` varchar(100) NOT NULL,
  `Second_Answer` varchar(100) NOT NULL,
  `Third_Answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`studentname`, `experimentname`, `First_Answer`, `Second_Answer`, `Third_Answer`) VALUES
('123', '离心式风机实验', 'undefined', 'undefined', 'undefined'),
('123', '离心式水泵性能实验', 'undefined', 'undefined', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `id` int(10) NOT NULL,
  `studentname` varchar(15) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `teacher` varchar(15) NOT NULL,
  `contact` varchar(12) DEFAULT '0',
  `loginstatus` int(5) DEFAULT '1',
  `logintime` int(15) DEFAULT '1502285390',
  `labName` varchar(20) DEFAULT NULL,
  `labTime` varchar(100) DEFAULT NULL,
  `离心式水泵性能实验` int(4) DEFAULT '0',
  `离心式风机实验` int(20) DEFAULT '0',
  `流体力学` int(5) DEFAULT '0',
  `并联管路分流` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`id`, `studentname`, `studentid`, `class`, `teacher`, `contact`, `loginstatus`, `logintime`, `labName`, `labTime`, `离心式水泵性能实验`, `离心式风机实验`, `流体力学`, `并联管路分流`) VALUES
(10, 'gjj', '220', '2', 'zf', '0', 1, 1502709786, '离心式水泵性能实验', '1号上午08:00-10:00', 1, 0, 0, 0),
(17, 'gjj', '220', '2', 'ry', '0', 1, 1502028572, '离心式风机实验', '4号上午08:00-10:00', 0, 1, 0, 0),
(33, 'gjj', '220', '2', 'zt', '0', 1, 1502028572, '流体力学', '1号上午08:00-10:00', 0, 0, 1, 0),
(34, 'gjj', '220', '2', 'ygc', '0', 1, 1502028572, '并联管路分流', '1号上午08:00-10:00', 0, 0, 0, 1),
(35, 'czh', '320', '3', 'zf', '0', 1, 1502709804, '离心式水泵性能实验', '2号上午08:00-10:00', 1, 0, 0, 0),
(45, 'lz', '222', '2', 'zf', '0', 1, 1502340163, '离心式水泵性能实验', '1号上午08:00-10:00', 1, 0, 0, 0),
(49, 'lz', '222', '2', 'ry', '0', 1, 1502285390, '离心式风机实验', '4号上午08:00-10:00', 0, 1, 0, 0),
(52, 'lz', '222', '2', 'ygc', '0', 1, 1502285390, '并联管路分流', '31号上午08:00-10:00', 0, 0, 0, 1),
(56, 'czh', '320', '3', 'ry', '0', 1, 1502285390, '离心式风机实验', '3号上午08:00-10:00', 0, 2, 0, 0),
(57, 'czh', '320', '3', 'zt', '0', 1, 1502285390, '流体力学', '28号上午08:00-10:00', 0, 0, 1, 0),
(60, 'czh', '320', '3', 'ygc', '0', 1, 1502285390, '并联管路分流', '31号上午08:00-10:00', 0, 0, 0, 1),
(61, 'lz', '222', '2', 'zt', '0', 1, 1502285390, '流体力学', '28号上午08:00-10:00', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacherlist`
--

CREATE TABLE `teacherlist` (
  `id` int(10) NOT NULL,
  `teachername` varchar(15) NOT NULL,
  `teacherid` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacherlist`
--

INSERT INTO `teacherlist` (`id`, `teachername`, `teacherid`) VALUES
(1, 'teacher', '123'),
(2, 'ry', '123'),
(3, 'zf', '123'),
(4, 'zt', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experimentlist`
--
ALTER TABLE `experimentlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherlist`
--
ALTER TABLE `teacherlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experimentlist`
--
ALTER TABLE `experimentlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `studentlist`
--
ALTER TABLE `studentlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `teacherlist`
--
ALTER TABLE `teacherlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;