-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 07:50 AM
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

--
-- Dumping data for table `conversatie`
--

INSERT INTO `conversatie` (`id`, `user_one`, `user_two`) VALUES
(5, 'patrusorin', 'dumitrud'),
(7, 'dumitrud', 'bitd');

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

--
-- Dumping data for table `conversatie_reply`
--

INSERT INTO `conversatie_reply` (`cr_id`, `reply`, `user_id_fk`, `c_id_fk`) VALUES
(5, 'Buna ziua!', 'patrusorin', 5),
(7, 'O tema de licenta foarte interesanta!', 'dumitrud', 7);

-- --------------------------------------------------------

--
-- Table structure for table `licenta_3`
--

CREATE TABLE `licenta_3` (
  `id` int(11) NOT NULL,
  `nume_aplicant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licenta_3`
--

INSERT INTO `licenta_3` (`id`, `nume_aplicant`) VALUES
(1, 'Neacsu Flavia'),
(2, 'Radu Cristian');

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

--
-- Dumping data for table `licente`
--

INSERT INTO `licente` (`id`, `titlu`, `descriere`, `cale_fisier`, `profesor`, `firma`, `student`) VALUES
(3, 'Licenta 1', 'Descrierea licentei 1.', 'upload/60111C01.pdf', 'Dragulici Dumitru', 'Bitdefender', NULL),
(4, 'Licenta 2', 'Descriere licenta 2.', 'upload/78849C01.pdf', NULL, 'Intel', NULL),
(6, 'Licenta 3', 'Descriere licenta 3.', 'upload/87116C01.pdf', 'Paun Andrei', NULL, NULL),
(7, 'Licenta 4', 'Descriere licenta 4.', 'upload/23116C01.pdf', 'Dragulici Dumitru', NULL, 'Patru Sorin');

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
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`nume`, `prenume`, `email`, `data`, `oras`, `facultate`, `specializare`, `materie`, `cui`, `grupa`, `username`, `parola`, `tip_cont`) VALUES
('Paun', 'Andrei', 'p.andrei@fmi.ro', '1976-10-08', NULL, 'FMI', NULL, 'LFA', NULL, NULL, 'andreip', 'andrei123', 1),
('Bitdefender', NULL, 'bit@bit.com', '1983-02-14', 'Bucuresti', NULL, 'IT', NULL, 24353, NULL, 'bitd', 'bitd123', 2),
('Dragulici', 'Dumitru', 'd.dumitru@fmi.ro', '1973-01-29', NULL, 'FMI', NULL, 'POO', NULL, NULL, 'dumitrud', 'dumitru123', 1),
('Neacsu', 'Flavia', 'haha@yahoo.com', '1995-10-22', NULL, 'FMI', 'Informatica', NULL, NULL, 234, 'flavianeacsu', 'flavia123', 3),
('Intel', NULL, 'i@ntel.ro', '1986-06-03', 'Bucuresti', NULL, 'it', NULL, 12312512, NULL, 'intel', 'intel', 2),
('Leustean', 'Ioana', 'leustean@ioana.an', '1983-10-29', NULL, 'FMI', NULL, 'TW', NULL, NULL, 'ioanal', 'ioana123', 1),
('Patru', 'Sorin', 'patru.sorin95@gmail.com', '1995-07-18', NULL, 'FMI', 'Informatica', NULL, NULL, 234, 'patrusorin', 'sorin123', 3),
('Radu', 'Cristian', 'cristi.thesniper2000@gmail.com', '1995-06-19', NULL, 'FMI', 'Informatica', NULL, NULL, 234, 'r.cristian', 'qwerty', 3);

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
-- Indexes for table `licenta_3`
--
ALTER TABLE `licenta_3`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `licenta_3`
--
ALTER TABLE `licenta_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `licente`
--
ALTER TABLE `licente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
