-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 09:01 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `id` int(100) NOT NULL,
  `aword` varchar(78) NOT NULL,
  `type` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`id`, `aword`, `type`) VALUES
(1, 'select', 'query'),
(2, 'insert', 'query'),
(3, 'delete', 'query'),
(4, 'client', 'table'),
(5, 'name', 'field'),
(6, '*', 'query1'),
(7, 'update', 'query'),
(8, 'Insert', 'query'),
(9, 'alter', 'query'),
(10, 'mark', 'field');

-- --------------------------------------------------------

--
-- Table structure for table `nlq`
--

CREATE TABLE `nlq` (
  `text` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nlq`
--

INSERT INTO `nlq` (`text`) VALUES
('select project details'),
('select student deatails'),
('give all student'),
('get all project');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `age`, `department`, `gender`, `course`) VALUES
(1, 'Sruthy Nair', '30', 'CSE', 'Female', 'M Tech'),
(2, 'Aswathy N', '21', 'CSE2', 'Female', 'B Tech'),
(4, 'aaaaaa', '52', 'fdfsfs', 'male', 'gdfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `query_word` varchar(100) NOT NULL,
  `dtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `word`, `query_word`, `dtype`) VALUES
(1, 'show', 'select', 'query'),
(2, 'get', 'select', 'query'),
(3, 'view', 'select', 'query'),
(4, 'all', '*', 'attr'),
(5, 'give', 'select', 'query'),
(6, 'take ', 'select', 'query'),
(7, 'name ', 'name', 'field'),
(8, 'modify', 'update', 'query'),
(9, 'store', 'insert', 'query'),
(10, 'student', 'student', 'table'),
(12, 'project', 'project', 'table'),
(13, 'delete', 'delete', 'query'),
(14, 'insert', 'insert', 'query'),
(15, 'retrieve', 'select', 'query'),
(16, 'select', 'select', 'query'),
(17, 'address', 'address', 'field'),
(18, 'average', 'avg', 'logic'),
(19, 'total', 'sum', 'logic'),
(20, 'mark', 'mark', 'field'),
(21, 'ages', 'ages', 'field'),
(22, 'client', 'client', 'table'),
(23, 'customer', 'customer', 'table'),
(25, 'invoice', 'invoice', 'table'),
(26, 'number', 'number', 'field'),
(27, 'min', 'min', 'logic'),
(28, 'max', 'max', 'logic'),
(29, 'average', 'avg', 'logic'),
(30, 'sum', 'sum', 'logic'),
(31, 'age', 'age', 'field'),
(32, 'clients', 'clients', 'table'),
(33, 'count', 'count', 'logic'),
(34, 'max', 'max', 'logic'),
(35, 'amount', 'amount', 'field'),
(36, 'maximum', 'max', 'logic');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`) VALUES
(1, 'get'),
(2, 'all'),
(3, 'show'),
(4, 'give'),
(5, 'take'),
(6, 'name'),
(7, 'set'),
(8, 'modify'),
(9, 'student'),
(10, 'details'),
(11, 'project'),
(12, 'delete'),
(13, 'drop'),
(14, 'insert'),
(15, 'select'),
(16, 'alter'),
(17, 'our'),
(18, 'take'),
(19, 'store'),
(21, 'projects'),
(22, 'time'),
(23, 'greater '),
(24, 'than'),
(25, 'less'),
(26, 'retrieve'),
(27, 'class'),
(28, 'standard'),
(29, 'change'),
(30, 'me'),
(31, 'view'),
(32, 'i'),
(33, 'want'),
(34, 'whole'),
(35, 'into'),
(36, 'the'),
(37, 'full'),
(38, ''),
(45, 'start'),
(46, 'mark'),
(47, 'total'),
(48, 'mark'),
(49, 'name'),
(50, 'are');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
