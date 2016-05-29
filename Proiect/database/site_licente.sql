-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2016 at 12:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_licente`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversatie`
--

CREATE TABLE `conversatie` (
  `id` int(11) NOT NULL,
  `user_one` varchar(255) NOT NULL,
  `user_two` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversatie_reply`
--

CREATE TABLE `conversatie_reply` (
  `cr_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `user_id_fk` varchar(255) NOT NULL,
  `c_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `licente`
--

CREATE TABLE `licente` (
  `id` int(11) NOT NULL,
  `titlu` varchar(255) NOT NULL,
  `descriere` text NOT NULL,
  `cale_fisier` varchar(255) NOT NULL,
  `profesor` varchar(255) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `oras` varchar(255) DEFAULT NULL,
  `facultate` varchar(255) DEFAULT NULL,
  `specializare` varchar(255) DEFAULT NULL,
  `materie` varchar(255) DEFAULT NULL,
  `cui` int(11) DEFAULT NULL,
  `grupa` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `tip_cont` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversatie`
--
ALTER TABLE `conversatie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `licente`
--
ALTER TABLE `licente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversatie`
--
ALTER TABLE `conversatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `licente`
--
ALTER TABLE `licente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
