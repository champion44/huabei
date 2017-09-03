-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-12 04:27:19
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `experimentlist`
--

CREATE TABLE `experimentlist` (
  `id` int(10) NOT NULL,
  `experimentname` varchar(15) NOT NULL,
  `experimentlocation` varchar(15) NOT NULL,
  `experimenttime` varchar(15) NOT NULL,
  `category` varchar(15) NOT NULL,
  `pdfurl` varchar(50) NOT NULL,
  `videourl` varchar(50) NOT NULL,
  `flashurl` varchar(50) NOT NULL,
  `First_Question` varchar(100) DEFAULT NULL,
  `First_Answer` varchar(100) DEFAULT NULL,
  `Second_Question` varchar(100) DEFAULT NULL,
  `Second_Answer` varchar(100) DEFAULT NULL,
  `Third_Question` varchar(100) DEFAULT NULL,
  `Third_Answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `experimentlist`
--

INSERT INTO `experimentlist` (`id`, `experimentname`, `experimentlocation`, `experimenttime`, `category`, `pdfurl`, `videourl`, `flashurl`, `First_Question`, `First_Answer`, `Second_Question`, `Second_Answer`, `Third_Question`, `Third_Answer`) VALUES
(37, '离心式水泵性能实验', '教四楼110', '20号上午09:00-10:0', '泵风', '离心式水泵性能实验.pdf', '离心式水泵性能实验.mp4', '离心式水泵性能实验.swf', 'This is the first question of the first experiment', 'The is the answer of the first question for the first experiment', 'This is the second question of the first experiment', 'This is the answer of the second question for the first experiment', 'This is the third question of the  first experiment', 'This is the answer of the third question for the first experiment'),
(38, '离心式风机实验', '教四楼后风机实验室', '20号下午02:30-04:3', '泵风', '离心式风机进气实验.pdf', '离心式风机进气实验.mp4', '离心式风机进气实验.swf', 'This is the first question of the second experiment', 'This is the answer of the first question for the second experiment', 'This is the second question of the second experiment', 'This is the answer of the second question for the second experiment', 'This is the third question of the second experiment', 'This is the answer of the third question for the second experiment'),
(39, '离心式风机实验', '教四楼后风机实验室', '20号下午04:30-06:3', '泵风', '离心式风机进气实验.pdf', '离心式风机进气实验.mp4', '离心式风机进气实验.swf', 'This is the first question of the second experiment', 'This is the answer of the first question for the second experiment', 'This is the second question of the second experiment', 'This is the answer of the second question for the second experiment', 'This is the third question of the second experiment', 'This is the answer of the third question for the second experiment'),
(40, '离心式风机实验', '教四楼后风机实验室', '20号上午08:30-10:3', '泵风', '离心式风机进气实验.pdf', '离心式风机进气实验.mp4', '离心式风机进气实验.swf', 'This is the first question of the second experiment', 'This is the answer of the first question for the second experiment', 'This is the second question of the second experiment', 'This is the answer of the second question for the second experiment', 'This is the third question of the second experiment', 'This is the answer of the third question for the second experiment'),
(41, '离心式风机实验', '教四楼后风机实验室', '20号上午10:30-12:3', '泵风', '离心式风机进气实验.pdf', '离心式风机进气实验.mp4', '离心式风机进气实验.swf', 'This is the first question of the second experiment', 'This is the answer of the first question for the second experiment', 'This is the second question of the second experiment', 'This is the answer of the second question for the second experiment', 'This is the third question of the second experiment', 'This is the answer of the third question for the second experiment');

-- --------------------------------------------------------

--
-- 表的结构 `homework`
--

CREATE TABLE `homework` (
  `studentname` varchar(15) NOT NULL,
  `experimentname` varchar(15) NOT NULL,
  `First_Answer` varchar(100) NOT NULL,
  `Second_Answer` varchar(100) NOT NULL,
  `Third_Answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `studentlist`
--

CREATE TABLE `studentlist` (
  `id` int(10) NOT NULL,
  `studentname` varchar(15) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `teacher` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `loginstatus` int(5) NOT NULL,
  `logintime` int(15) NOT NULL,
  `沿程损失实验` int(10) NOT NULL DEFAULT '0',
  `离心式水泵性能实验` int(10) NOT NULL DEFAULT '0',
  `离心式风机实验` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `studentlist`
--

INSERT INTO `studentlist` (`id`, `studentname`, `studentid`, `class`, `teacher`, `contact`, `loginstatus`, `logintime`, `沿程损失实验`, `离心式水泵性能实验`, `离心式风机实验`) VALUES
(16, 'student', '123', '123', '123', '123', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `teacherlist`
--

CREATE TABLE `teacherlist` (
  `id` int(10) NOT NULL,
  `teachername` varchar(15) NOT NULL,
  `teacherid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacherlist`
--

INSERT INTO `teacherlist` (`id`, `teachername`, `teacherid`) VALUES
(1, 'teacher', '123');

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
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `experimentlist`
--
ALTER TABLE `experimentlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 使用表AUTO_INCREMENT `studentlist`
--
ALTER TABLE `studentlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `teacherlist`
--
ALTER TABLE `teacherlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
