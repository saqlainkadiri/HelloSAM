-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2018 at 05:22 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hellosam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `a_password`, `a_name`, `email`) VALUES
('A001', '98765', 'ABCDE', 'ABCDE@GMAIL.COM'),
('A002', '89646', 'WXYZ', 'WXYZ@GMAIL.COM');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_rollno` varchar(60) NOT NULL,
  `s_name` varchar(60) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `dept_name` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `s_email` varchar(60) NOT NULL,
  `p_email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `s_rollno`, `s_name`, `p_name`, `dept_name`, `class_id`, `s_email`, `p_email`) VALUES
(1, '15', 'Saqlain Kadiri', 'rahul@r', 'COMPS', 'C001', 'saqlain.kadiri@gmail.com', 'rahuljoshi3423@gmail.com'),
(2, '14', 'raw', 'fa', 'COMPS', 'C001', 'a@a.com', 'a@a.com'),
(4, '18', 'Saqlain Kadiri', 'Rahul', 'COMPS', 'C001', 'saqlain.kadiri@gmail.com', 'rahuljoshi3423@gmail.com'),
(7, 'S001', 'Rahul', 'Saqlain', 'COMPS', 'C001', 'rahuljoshi3423@gmail.com', 'saqlaink1106@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

DROP TABLE IF EXISTS `attend`;
CREATE TABLE IF NOT EXISTS `attend` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` varchar(60) NOT NULL,
  `sub_id` varchar(60) NOT NULL,
  `s_roll` varchar(60) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `time_from` varchar(60) NOT NULL,
  `time_to` varchar(60) NOT NULL,
  `attended` varchar(60) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`att_id`, `t_id`, `sub_id`, `s_roll`, `date`, `time_from`, `time_to`, `attended`) VALUES
(25, '15', 'S001', '12', '2018-03-25 04:41:41', '08:00', '09:00', '1'),
(26, '7', 'S001', '12', '2018-03-25 04:41:59', '08:00', '09:00', '1'),
(27, '7', 'S001', '14', '2018-03-25 04:41:59', '08:00', '09:00', '1'),
(28, '7', 'S001', '15', '2018-03-25 04:41:59', '08:00', '09:00', '1'),
(29, '7', 'S001', '15', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(30, '7', 'S001', '16', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(31, '7', 'S001', '14', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(32, '7', 'S001', '15', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(33, '7', 'S001', '10', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(34, '7', '', '15', '2018-03-25 07:46:57', '09:00', '10:00', '1'),
(35, '7', '', '14', '2018-03-25 08:45:22', '08:00', '09:00', '1'),
(36, '7', 'S001', '15', '2018-03-25 00:00:00', '08:00', '09:00', '1'),
(37, '7', 'S001', '17', '2018-03-25 00:00:00', '08:00', '09:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` varchar(60) NOT NULL,
  `sub_id` varchar(60) NOT NULL,
  `dept_name` varchar(60) NOT NULL,
  `id` varchar(60) NOT NULL,
  `sub_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `sub_id`, `dept_name`, `id`, `sub_name`) VALUES
('C001', 'S001', 'D001', '1', 'Microprocessor'),
('C001', 'S002', 'D001', '2', 'OperatingSystems'),
('C001', 'S003', 'D001', '3', 'StructuredandObjectOrientedAnalysisandDesign'),
('C001', 'S004', 'D001', '4', 'ComputerNetworks'),
('C001', 'S005', 'D001', '5', 'WebTechnologiesLaboratory'),
('C001', 'S006', 'D001', '6', 'BusinessCommunicationandEthics'),
('C002', 'S001', 'D001', '7', 'SystemProgrammingandCompilerConstruction'),
('C002', 'S002', 'D001', '8', 'SoftwareEngineering'),
('C002', 'S003', 'D001', '9', 'DistributedDatabases'),
('C002', 'S004', 'D001', '10', 'MobileCommunicationandComputing'),
('C002', 'S005', 'D001', '11', 'NetworkProgrammingLaboratory'),
('C002', 'S006', 'D001', '12', 'ProjectManagement');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `n_id` varchar(60) NOT NULL,
  `n_path` varchar(60) NOT NULL,
  `n_title` varchar(60) NOT NULL,
  `n_subject` varchar(60) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` varchar(60) NOT NULL,
  `sub_id` varchar(60) NOT NULL,
  `s_rollno` varchar(60) NOT NULL,
  `marks` varchar(60) NOT NULL,
  `exam_id` varchar(60) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`r_id`, `t_id`, `sub_id`, `s_rollno`, `marks`, `exam_id`) VALUES
(37, 'kadiri.saqlain@gmail.com', 'S001', '15', '1', 'E001'),
(38, 'kadiri.saqlain@gmail.com', 'S002', '15', '1', 'E001'),
(39, 'kadiri.saqlain@gmail.com', 'S003', '15', '1', 'E001'),
(40, 'kadiri.saqlain@gmail.com', 'S004', '15', '1', 'E001'),
(41, 'kadiri.saqlain@gmail.com', 'S005', '15', '1', 'E001'),
(42, 'kadiri.saqlain@gmail.com', 'S006', '15', '1', 'E001');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` varchar(60) NOT NULL,
  `t_name` varchar(60) NOT NULL,
  `t_email` varchar(60) NOT NULL,
  `t_mobile` varchar(60) NOT NULL,
  `t_subjects` varchar(60) NOT NULL,
  `user_role` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `t_id`, `t_name`, `t_email`, `t_mobile`, `t_subjects`, `user_role`) VALUES
(7, 'saqlain.kadiri@gmail.com', 'Saqlain', 'saqlain.kadiri@gmail.com', '', 'SoftwareEngineering', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_rollno` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `s_email` varchar(60) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `user_role` varchar(60) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `s_rollno`, `username`, `password`, `s_email`, `mobile`, `user_role`, `token`) VALUES
(5, '15', 'admin', 'aa21355244016d73426cfd5430b378de', 'saqlain.kadiri@gmail.com', '7506561544', 'admin', '79b146b0353f3e2d11887f4aea9aaf27'),
(8, '15', 'saqlain', 'aa21355244016d73426cfd5430b378de', 'saqlain.kadiri@gmail.com', '7506561544', 'teacher', '79b146b0353f3e2d11887f4aea9aaf27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
