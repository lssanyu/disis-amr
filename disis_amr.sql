-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 12:31 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disis_amr`
--

-- --------------------------------------------------------

--
-- Table structure for table `ah_organismscombined`
--

CREATE TABLE `ah_organismscombined` (
  `oid` int(11) NOT NULL,
  `organism` text,
  `Antibiotic` text,
  `percentage` int(11) DEFAULT NULL,
  `lowerlimit` double DEFAULT NULL,
  `upperlimit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ah_organismscombined`
--

INSERT INTO `ah_organismscombined` (`oid`, `organism`, `Antibiotic`, `percentage`, `lowerlimit`, `upperlimit`) VALUES
(1, 'Eco', 'Ampicillin ', 87, 78.12607, 92.20532),
(2, 'Eco', 'Cefepime', 29, 20.54213, 38.96404),
(3, 'Eco', 'Ceftriaxone', 21, 13.95259, 30.6348),
(4, 'Eco', 'Chloramphenicol ', 39, 29.46992, 49.21754),
(5, 'Eco', 'Ciprofloxacin ', 76, 65.75163, 83.26722),
(6, 'Eco', 'Gentamicin', 23, 15.79819, 33.05171),
(7, 'Eco', 'Meropenem', 10, 5.35068, 17.92417),
(8, 'Eco', 'Tetracycline ', 98, 92.25547, 99.38846),
(9, 'Eco', 'Cotrimoxazole', 92, 84.80614, 96.18152),
(10, 'Ent', 'Ampicillin', 22, 11.07479, 36.34578),
(11, 'Ent', 'Vancomycin', 45, 30.1464, 60.2937);

-- --------------------------------------------------------

--
-- Table structure for table `ah_organismsisolated`
--

CREATE TABLE `ah_organismsisolated` (
  `oid` int(11) NOT NULL,
  `organism` text,
  `district` text,
  `numberisolates` int(11) DEFAULT NULL,
  `percentage` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ah_organismsisolated`
--

INSERT INTO `ah_organismsisolated` (`oid`, `organism`, `district`, `numberisolates`, `percentage`) VALUES
(1, 'E.coli', 'Mbarara', 27, 87.1),
(2, 'E.coli', 'Wakiso', 63, 76),
(3, 'Enterococcus spp.', 'Mbarara', 9, 29.1),
(4, 'Enterococcus spp.', 'Wakiso', 29, 35);

-- --------------------------------------------------------

--
-- Table structure for table `hh_organismsisolated`
--

CREATE TABLE `hh_organismsisolated` (
  `oid` int(11) NOT NULL,
  `Facility` text,
  `Organism` text,
  `Specimentype` text,
  `ReportingPeriod` text,
  `Numberofisolates` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hh_organismsisolated`
--

INSERT INTO `hh_organismsisolated` (`oid`, `Facility`, `Organism`, `Specimentype`, `ReportingPeriod`, `Numberofisolates`) VALUES
(1, 'Arua RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 1),
(2, 'Arua RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(3, 'Arua RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(4, 'Arua RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 0),
(5, 'Arua RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(6, 'Arua RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 7),
(7, 'Arua RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 1),
(8, 'Arua RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 1),
(9, 'Arua RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 17),
(10, 'Arua RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 4),
(11, 'Arua RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 18', 0),
(12, 'Arua RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jan-Mar 19', 0),
(13, 'Arua RRH', 'Klebsiella pneumoniae ', 'Urine', 'Apr-Jun 19', 0),
(14, 'Arua RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jul-Sep 19', 4),
(15, 'Arua RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 19', 0),
(16, 'Arua RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 18', 1),
(17, 'Arua RRH', 'Salmonella sp.', 'Blood', 'Jan-Mar 19', 0),
(18, 'Arua RRH', 'Salmonella sp.', 'Blood', 'Apr-Jun 19', 0),
(19, 'Arua RRH', 'Salmonella sp.', 'Blood', 'Jul-Sep 19', 3),
(20, 'Arua RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 19', 8),
(21, 'Arua RRH', 'Salmonella sp.', 'CSF', 'Oct-Dec 18', 0),
(22, 'Arua RRH', 'Salmonella sp.', 'CSF', 'Jan-Mar 19', 1),
(23, 'Arua RRH', 'Salmonella sp.', 'CSF', 'Apr-Jun 19', 0),
(24, 'Arua RRH', 'Salmonella sp.', 'CSF', 'Jul-Sep 19', 0),
(25, 'Arua RRH', 'Salmonella sp.', 'CSF', 'Oct-Dec 19', 0),
(26, 'Arua RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 1),
(27, 'Arua RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 1),
(28, 'Arua RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 0),
(29, 'Arua RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 0),
(30, 'Arua RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(31, 'Arua RRH', 'Shigella sp.', 'Stool', 'Oct-Dec 18', 1),
(32, 'Arua RRH', 'Shigella sp.', 'Stool', 'Jan-Mar 19', 1),
(33, 'Arua RRH', 'Shigella sp.', 'Stool', 'Apr-Jun 19', 0),
(34, 'Arua RRH', 'Shigella sp.', 'Stool', 'Jul-Sep 19', 0),
(35, 'Arua RRH', 'Shigella sp.', 'Stool', 'Oct-Dec 19', 0),
(36, 'Fort Portal RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 18', 0),
(37, 'Fort Portal RRH', 'Acinetobacter baumannii', 'Blood', 'Jan-Mar 19', 2),
(38, 'Fort Portal RRH', 'Acinetobacter baumannii', 'Blood', 'Apr-Jun 19', 0),
(39, 'Fort Portal RRH', 'Acinetobacter baumannii', 'Blood', 'Jul-Sep 19', 0),
(40, 'Fort Portal RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 19', 0),
(41, 'Fort Portal RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 0),
(42, 'Fort Portal RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(43, 'Fort Portal RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(44, 'Fort Portal RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 1),
(45, 'Fort Portal RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(46, 'Fort Portal RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 2),
(47, 'Fort Portal RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 1),
(48, 'Fort Portal RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 2),
(49, 'Fort Portal RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 2),
(50, 'Fort Portal RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 3),
(51, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 18', 1),
(52, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jan-Mar 19', 0),
(53, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Blood', 'Apr-Jun 19', 1),
(54, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jul-Sep 19', 1),
(55, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 19', 0),
(56, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 18', 1),
(57, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jan-Mar 19', 0),
(58, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Urine', 'Apr-Jun 19', 0),
(59, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jul-Sep 19', 1),
(60, 'Fort Portal RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 19', 0),
(61, 'Fort Portal RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 18', 0),
(62, 'Fort Portal RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jan-Mar 19', 1),
(63, 'Fort Portal RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Apr-Jun 19', 0),
(64, 'Fort Portal RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jul-Sep 19', 0),
(65, 'Fort Portal RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 19', 0),
(66, 'Fort Portal RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 18', 0),
(67, 'Fort Portal RRH', 'Salmonella sp.', 'Blood', 'Jan-Mar 19', 0),
(68, 'Fort Portal RRH', 'Salmonella sp.', 'Blood', 'Apr-Jun 19', 0),
(69, 'Fort Portal RRH', 'Salmonella sp.', 'Blood', 'Jul-Sep 19', 1),
(70, 'Fort Portal RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 19', 0),
(71, 'Fort Portal RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 2),
(72, 'Fort Portal RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 2),
(73, 'Fort Portal RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 0),
(74, 'Fort Portal RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 2),
(75, 'Fort Portal RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 2),
(76, 'Hoima RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 0),
(77, 'Hoima RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(78, 'Hoima RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(79, 'Hoima RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 1),
(80, 'Hoima RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(81, 'Hoima RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 4),
(82, 'Hoima RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 3),
(83, 'Hoima RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 0),
(84, 'Hoima RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 0),
(85, 'Hoima RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 0),
(86, 'Hoima RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 18', 0),
(87, 'Hoima RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jan-Mar 19', 1),
(88, 'Hoima RRH', 'Klebsiella pneumoniae ', 'Urine', 'Apr-Jun 19', 0),
(89, 'Hoima RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jul-Sep 19', 0),
(90, 'Hoima RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 19', 0),
(91, 'Hoima RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 18', 0),
(92, 'Hoima RRH', 'Salmonella sp.', 'Stool', 'Jan-Mar 19', 1),
(93, 'Hoima RRH', 'Salmonella sp.', 'Stool', 'Apr-Jun 19', 0),
(94, 'Hoima RRH', 'Salmonella sp.', 'Stool', 'Jul-Sep 19', 0),
(95, 'Hoima RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 19', 0),
(96, 'Hoima RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 1),
(97, 'Hoima RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 0),
(98, 'Hoima RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 0),
(99, 'Hoima RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 0),
(100, 'Hoima RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(101, 'Hoima RRH', 'Shigella sp.', 'Stool', 'Oct-Dec 18', 1),
(102, 'Hoima RRH', 'Shigella sp.', 'Stool', 'Jan-Mar 19', 0),
(103, 'Hoima RRH', 'Shigella sp.', 'Stool', 'Apr-Jun 19', 0),
(104, 'Hoima RRH', 'Shigella sp.', 'Stool', 'Jul-Sep 19', 0),
(105, 'Hoima RRH', 'Shigella sp.', 'Stool', 'Oct-Dec 19', 0),
(106, 'Jinja RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 18', 0),
(107, 'Jinja RRH', 'Acinetobacter baumannii', 'Blood', 'Jan-Mar 19', 2),
(108, 'Jinja RRH', 'Acinetobacter baumannii', 'Blood', 'Apr-Jun 19', 0),
(109, 'Jinja RRH', 'Acinetobacter baumannii', 'Blood', 'Jul-Sep 19', 0),
(110, 'Jinja RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 19', 0),
(111, 'Jinja RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 1),
(112, 'Jinja RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 1),
(113, 'Jinja RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(114, 'Jinja RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 2),
(115, 'Jinja RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 1),
(116, 'Jinja RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 2),
(117, 'Jinja RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 2),
(118, 'Jinja RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 5),
(119, 'Jinja RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 1),
(120, 'Jinja RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 1),
(121, 'Jinja RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 18', 0),
(122, 'Jinja RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jan-Mar 19', 1),
(123, 'Jinja RRH', 'Klebsiella pneumoniae ', 'Blood', 'Apr-Jun 19', 0),
(124, 'Jinja RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jul-Sep 19', 0),
(125, 'Jinja RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 19', 0),
(126, 'Jinja RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 3),
(127, 'Jinja RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 1),
(128, 'Jinja RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 3),
(129, 'Jinja RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 20),
(130, 'Jinja RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 5),
(131, 'Kabale RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 0),
(132, 'Kabale RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(133, 'Kabale RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(134, 'Kabale RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 1),
(135, 'Kabale RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 2),
(136, 'Kabale RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 10),
(137, 'Kabale RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 4),
(138, 'Kabale RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 5),
(139, 'Kabale RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 15),
(140, 'Kabale RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 7),
(141, 'Kabale RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 18', 0),
(142, 'Kabale RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jan-Mar 19', 0),
(143, 'Kabale RRH', 'Klebsiella pneumoniae ', 'Urine', 'Apr-Jun 19', 0),
(144, 'Kabale RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jul-Sep 19', 0),
(145, 'Kabale RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 19', 2),
(146, 'Kabale RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 18', 2),
(147, 'Kabale RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jan-Mar 19', 0),
(148, 'Kabale RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Apr-Jun 19', 1),
(149, 'Kabale RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jul-Sep 19', 0),
(150, 'Kabale RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 19', 0),
(151, 'Kabale RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 18', 4),
(152, 'Kabale RRH', 'Salmonella sp.', 'Stool', 'Jan-Mar 19', 2),
(153, 'Kabale RRH', 'Salmonella sp.', 'Stool', 'Apr-Jun 19', 0),
(154, 'Kabale RRH', 'Salmonella sp.', 'Stool', 'Jul-Sep 19', 1),
(155, 'Kabale RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 19', 3),
(156, 'Kabale RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 0),
(157, 'Kabale RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 2),
(158, 'Kabale RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 1),
(159, 'Kabale RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 1),
(160, 'Kabale RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(161, 'Mbale RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 1),
(162, 'Mbale RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 1),
(163, 'Mbale RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(164, 'Mbale RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 0),
(165, 'Mbale RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(166, 'Mbale RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 6),
(167, 'Mbale RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 0),
(168, 'Mbale RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 1),
(169, 'Mbale RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 2),
(170, 'Mbale RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 0),
(171, 'Mbale RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 18', 1),
(172, 'Mbale RRH', 'Salmonella sp.', 'Blood', 'Jan-Mar 19', 0),
(173, 'Mbale RRH', 'Salmonella sp.', 'Blood', 'Apr-Jun 19', 0),
(174, 'Mbale RRH', 'Salmonella sp.', 'Blood', 'Jul-Sep 19', 0),
(175, 'Mbale RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 19', 0),
(176, 'Mbale RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 18', 1),
(177, 'Mbale RRH', 'Salmonella sp.', 'Stool', 'Jan-Mar 19', 1),
(178, 'Mbale RRH', 'Salmonella sp.', 'Stool', 'Apr-Jun 19', 0),
(179, 'Mbale RRH', 'Salmonella sp.', 'Stool', 'Jul-Sep 19', 1),
(180, 'Mbale RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 19', 0),
(181, 'Mbale RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 1),
(182, 'Mbale RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 0),
(183, 'Mbale RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 1),
(184, 'Mbale RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 3),
(185, 'Mbale RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(186, 'Mbarara RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 18', 0),
(187, 'Mbarara RRH', 'Acinetobacter baumannii', 'Blood', 'Jan-Mar 19', 0),
(188, 'Mbarara RRH', 'Acinetobacter baumannii', 'Blood', 'Apr-Jun 19', 0),
(189, 'Mbarara RRH', 'Acinetobacter baumannii', 'Blood', 'Jul-Sep 19', 0),
(190, 'Mbarara RRH', 'Acinetobacter baumannii', 'Blood', 'Oct-Dec 19', 1),
(191, 'Mbarara RRH', 'Acinetobacter baumannii', 'CSF', 'Oct-Dec 18', 0),
(192, 'Mbarara RRH', 'Acinetobacter baumannii', 'CSF', 'Jan-Mar 19', 0),
(193, 'Mbarara RRH', 'Acinetobacter baumannii', 'CSF', 'Apr-Jun 19', 0),
(194, 'Mbarara RRH', 'Acinetobacter baumannii', 'CSF', 'Jul-Sep 19', 0),
(195, 'Mbarara RRH', 'Acinetobacter baumannii', 'CSF', 'Oct-Dec 19', 2),
(196, 'Mbarara RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 0),
(197, 'Mbarara RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 1),
(198, 'Mbarara RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(199, 'Mbarara RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 2),
(200, 'Mbarara RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 5),
(201, 'Mbarara RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 3),
(202, 'Mbarara RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 1),
(203, 'Mbarara RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 2),
(204, 'Mbarara RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 8),
(205, 'Mbarara RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 9),
(206, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 18', 0),
(207, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jan-Mar 19', 0),
(208, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Blood', 'Apr-Jun 19', 1),
(209, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Blood', 'Jul-Sep 19', 5),
(210, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Blood', 'Oct-Dec 19', 7),
(211, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'CSF', 'Oct-Dec 18', 0),
(212, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'CSF', 'Jan-Mar 19', 0),
(213, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'CSF', 'Apr-Jun 19', 0),
(214, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'CSF', 'Jul-Sep 19', 0),
(215, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'CSF', 'Oct-Dec 19', 1),
(216, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 18', 0),
(217, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jan-Mar 19', 0),
(218, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Urine', 'Apr-Jun 19', 0),
(219, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Urine', 'Jul-Sep 19', 0),
(220, 'Mbarara RRH', 'Klebsiella pneumoniae ', 'Urine', 'Oct-Dec 19', 1),
(221, 'Mbarara RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 18', 2),
(222, 'Mbarara RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jan-Mar 19', 3),
(223, 'Mbarara RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Apr-Jun 19', 6),
(224, 'Mbarara RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Jul-Sep 19', 4),
(225, 'Mbarara RRH', 'Neisseria gonorrhoeae', 'Urethra', 'Oct-Dec 19', 8),
(226, 'Mbarara RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 18', 0),
(227, 'Mbarara RRH', 'Salmonella sp.', 'Blood', 'Jan-Mar 19', 0),
(228, 'Mbarara RRH', 'Salmonella sp.', 'Blood', 'Apr-Jun 19', 0),
(229, 'Mbarara RRH', 'Salmonella sp.', 'Blood', 'Jul-Sep 19', 0),
(230, 'Mbarara RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 19', 1),
(231, 'Mbarara RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 3),
(232, 'Mbarara RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 2),
(233, 'Mbarara RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 0),
(234, 'Mbarara RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 0),
(235, 'Mbarara RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 2),
(236, 'Mubende RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 1),
(237, 'Mubende RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(238, 'Mubende RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(239, 'Mubende RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 0),
(240, 'Mubende RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(241, 'Mubende RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 18', 1),
(242, 'Mubende RRH', 'Salmonella sp.', 'Blood', 'Jan-Mar 19', 0),
(243, 'Mubende RRH', 'Salmonella sp.', 'Blood', 'Apr-Jun 19', 0),
(244, 'Mubende RRH', 'Salmonella sp.', 'Blood', 'Jul-Sep 19', 0),
(245, 'Mubende RRH', 'Salmonella sp.', 'Blood', 'Oct-Dec 19', 0),
(246, 'Mubende RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 2),
(247, 'Mubende RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 0),
(248, 'Mubende RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 0),
(249, 'Mubende RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 0),
(250, 'Mubende RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(251, 'Mubende RRH', 'Streptococcus pneumoniae', 'Blood', 'Oct-Dec 18', 0),
(252, 'Mubende RRH', 'Streptococcus pneumoniae', 'Blood', 'Jan-Mar 19', 0),
(253, 'Mubende RRH', 'Streptococcus pneumoniae', 'Blood', 'Apr-Jun 19', 0),
(254, 'Mubende RRH', 'Streptococcus pneumoniae', 'Blood', 'Jul-Sep 19', 0),
(255, 'Mubende RRH', 'Streptococcus pneumoniae', 'Blood', 'Oct-Dec 19', 2),
(256, 'Soroti RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 18', 1),
(257, 'Soroti RRH', 'Escherichia Coli', 'Blood', 'Jan-Mar 19', 0),
(258, 'Soroti RRH', 'Escherichia Coli', 'Blood', 'Apr-Jun 19', 0),
(259, 'Soroti RRH', 'Escherichia Coli', 'Blood', 'Jul-Sep 19', 0),
(260, 'Soroti RRH', 'Escherichia Coli', 'Blood', 'Oct-Dec 19', 0),
(261, 'Soroti RRH', 'Escherichia Coli', 'CSF', 'Oct-Dec 18', 0),
(262, 'Soroti RRH', 'Escherichia Coli', 'CSF', 'Jan-Mar 19', 2),
(263, 'Soroti RRH', 'Escherichia Coli', 'CSF', 'Apr-Jun 19', 0),
(264, 'Soroti RRH', 'Escherichia Coli', 'CSF', 'Jul-Sep 19', 1),
(265, 'Soroti RRH', 'Escherichia Coli', 'CSF', 'Oct-Dec 19', 0),
(266, 'Soroti RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 18', 7),
(267, 'Soroti RRH', 'Escherichia Coli', 'Urine', 'Jan-Mar 19', 14),
(268, 'Soroti RRH', 'Escherichia Coli', 'Urine', 'Apr-Jun 19', 7),
(269, 'Soroti RRH', 'Escherichia Coli', 'Urine', 'Jul-Sep 19', 11),
(270, 'Soroti RRH', 'Escherichia Coli', 'Urine', 'Oct-Dec 19', 2),
(271, 'Soroti RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 18', 0),
(272, 'Soroti RRH', 'Salmonella sp.', 'Stool', 'Jan-Mar 19', 0),
(273, 'Soroti RRH', 'Salmonella sp.', 'Stool', 'Apr-Jun 19', 1),
(274, 'Soroti RRH', 'Salmonella sp.', 'Stool', 'Jul-Sep 19', 0),
(275, 'Soroti RRH', 'Salmonella sp.', 'Stool', 'Oct-Dec 19', 0),
(276, 'Soroti RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 18', 0),
(277, 'Soroti RRH', 'Staphylococcus aureus ', 'Blood', 'Jan-Mar 19', 1),
(278, 'Soroti RRH', 'Staphylococcus aureus ', 'Blood', 'Apr-Jun 19', 3),
(279, 'Soroti RRH', 'Staphylococcus aureus ', 'Blood', 'Jul-Sep 19', 3),
(280, 'Soroti RRH', 'Staphylococcus aureus ', 'Blood', 'Oct-Dec 19', 0),
(281, 'Soroti RRH', 'Staphylococcus aureus ', 'CSF', 'Oct-Dec 18', 0),
(282, 'Soroti RRH', 'Staphylococcus aureus ', 'CSF', 'Jan-Mar 19', 0),
(283, 'Soroti RRH', 'Staphylococcus aureus ', 'CSF', 'Apr-Jun 19', 1),
(284, 'Soroti RRH', 'Staphylococcus aureus ', 'CSF', 'Jul-Sep 19', 1),
(285, 'Soroti RRH', 'Staphylococcus aureus ', 'CSF', 'Oct-Dec 19', 1),
(286, 'Soroti RRH', 'Haemophilus sp.', 'CSF', 'Oct-Dec 18', 0),
(287, 'Soroti RRH', 'Haemophilus sp.', 'CSF', 'Jan-Mar 19', 0),
(288, 'Soroti RRH', 'Haemophilus sp.', 'CSF', 'Apr-Jun 19', 1),
(289, 'Soroti RRH', 'Haemophilus sp.', 'CSF', 'Jul-Sep 19', 0),
(290, 'Soroti RRH', 'Haemophilus sp.', 'CSF', 'Oct-Dec 19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hh_resistance`
--

CREATE TABLE `hh_resistance` (
  `oid` int(11) NOT NULL,
  `Organism` text,
  `Specimentype` text,
  `antibiotictested` text,
  `Numberofisolates` int(11) DEFAULT NULL,
  `percentageresistance` double DEFAULT NULL,
  `lowerlimit` double DEFAULT NULL,
  `upperlimit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hh_resistance`
--

INSERT INTO `hh_resistance` (`oid`, `Organism`, `Specimentype`, `antibiotictested`, `Numberofisolates`, `percentageresistance`, `lowerlimit`, `upperlimit`) VALUES
(1, 'Escherichia Coli', 'Urine', 'CIP*', 135, 62.2, 53.81243, 69.95568),
(2, 'Escherichia Coli', 'Urine', 'GEN', 133, 44.4, 36.19375, 52.84466),
(3, 'Escherichia Coli', 'Urine', 'SXT*', 101, 84.2, 75.80642, 90.00724),
(4, 'Escherichia Coli', 'Urine', 'CHL', 98, 30.6, 22.36266, 40.32444),
(5, 'Escherichia Coli', 'Urine', 'AMP*', 96, 88.5, 80.63738, 93.48013),
(6, 'Escherichia Coli', 'Urine', 'NIT', 93, 28, 19.85034, 37.81242),
(7, 'Escherichia Coli', 'Urine', 'CXM', 91, 68.1, 57.99091, 76.804),
(8, 'Escherichia Coli', 'Urine', 'IPM*', 87, 31, 22.28916, 41.38382),
(9, 'Escherichia Coli', 'Urine', 'NAL', 84, 85.7, 76.6699, 91.63498),
(10, 'Escherichia Coli', 'Urine', 'AMC', 70, 58.6, 46.88121, 69.36982),
(11, 'Escherichia Coli', 'Urine', 'CRO*', 69, 58, 46.20741, 68.89388),
(12, 'Escherichia Coli', 'Urine', 'TCY*', 63, 77.8, 66.08772, 86.27499),
(13, 'Staphylococcus aureus Species', 'Blood', 'CLI', 51, 45.1, 32.26752, 58.61529),
(14, 'Staphylococcus aureus Species', 'Blood', 'GEN', 49, 24.5, 14.60235, 38.08632),
(15, 'Staphylococcus aureus Species', 'Blood', 'CIP', 47, 8.5, 3.35941, 19.93154),
(16, 'Staphylococcus aureus Species', 'Blood', 'ERY', 43, 65.1, 50.17178, 77.58141),
(17, 'Staphylococcus aureus Species', 'Blood', 'CHL', 34, 29.4, 16.83463, 46.16891),
(18, 'Staphylococcus aureus Species', 'Blood', 'TCY', 34, 41.2, 26.36597, 57.77841),
(19, 'Staphylococcus aureus Species', 'Blood', 'VAN', 29, 10.3, 3.58149, 26.38508),
(20, 'Staphylococcus aureus Species', 'Blood', 'SXT', 26, 53.8, 35.45794, 71.24415),
(21, 'Staphylococcus aureus Species', 'Blood', 'OXA*', 15, 26.7, 10.89745, 51.95043),
(22, 'Staphylococcus aureus Species', 'Blood', 'IPM', 14, 21.4, 7.57139, 47.58923),
(23, 'Escherichia Coli', 'Blood', 'GEN', 19, 42.1, 23.14189, 63.7241),
(24, 'Escherichia Coli', 'Blood', 'IPM*', 17, 35.3, 17.30972, 58.69964),
(25, 'Escherichia Coli', 'Blood', 'CIP*', 17, 52.9, 30.96324, 73.83489),
(26, 'Escherichia Coli', 'Blood', 'AMP*', 15, 93.3, 70.18347, 98.81331),
(27, 'Escherichia Coli', 'Blood', 'SXT*', 14, 78.6, 52.41077, 92.42861),
(28, 'Escherichia Coli', 'Blood', 'CHL', 14, 42.9, 21.3808, 67.40936),
(29, 'Escherichia Coli', 'Blood', 'CRO*', 13, 53.8, 29.1438, 76.79393),
(30, 'Escherichia Coli', 'Blood', 'CXM', 12, 66.7, 39.06221, 86.18799),
(31, 'Escherichia Coli', 'Blood', 'AMC', 10, 60, 31.26738, 83.18197),
(32, 'Escherichia Coli', 'Blood', 'TCY*', 10, 90, 59.585, 98.21238),
(33, 'Salmonella Species', 'Stool', 'SXT', 14, 50, 26.7992, 73.2008),
(34, 'Salmonella Species', 'Stool', 'CXM', 12, 50, 25.37816, 74.62184),
(35, 'Salmonella Species', 'Stool', 'CIP*', 12, 33.3, 13.81201, 60.93779),
(36, 'Salmonella Species', 'Stool', 'TCY', 12, 75, 46.76947, 91.10583),
(37, 'Salmonella Species', 'Stool', 'IPM*', 11, 9.1, 1.62322, 37.73584),
(38, 'Salmonella Species', 'Stool', 'GEN', 11, 18.2, 5.13677, 47.69806),
(39, 'Salmonella Species', 'Stool', 'NAL', 10, 20, 5.66822, 50.98375),
(40, 'Salmonella Species', 'Stool', 'AMP', 8, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hh_sampleswithgrowth`
--

CREATE TABLE `hh_sampleswithgrowth` (
  `oid` int(11) DEFAULT NULL,
  `facility` text,
  `specimen` text,
  `period` text,
  `nogrowthsamples` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hh_sampleswithgrowth`
--

INSERT INTO `hh_sampleswithgrowth` (`oid`, `facility`, `specimen`, `period`, `nogrowthsamples`) VALUES
(1, 'Arua', 'Blood', 'Oct-Dec 18', 9),
(2, 'Arua', 'Blood', 'Jan-Mar 19', 1),
(3, 'Arua', 'Blood', 'Apr-Jun 19', 3),
(4, 'Arua', 'Blood', 'Jul-Sep 19', 13),
(5, 'Arua', 'Blood', 'Oct-Dec 19', 10),
(6, 'Arua', 'Cerebrospinal fluid', 'Oct-Dec 18', 0),
(7, 'Arua', 'Cerebrospinal fluid', 'Jan-Mar 19', 1),
(8, 'Arua', 'Cerebrospinal fluid', 'Apr-Jun 19', 2),
(9, 'Arua', 'Cerebrospinal fluid', 'Jul-Sep 19', 1),
(10, 'Arua', 'Cerebrospinal fluid', 'Oct-Dec 19', 1),
(11, 'Arua', 'Urine', 'Oct-Dec 18', 9),
(12, 'Arua', 'Urine', 'Jan-Mar 19', 5),
(13, 'Arua', 'Urine', 'Apr-Jun 19', 3),
(14, 'Arua', 'Urine', 'Jul-Sep 19', 48),
(15, 'Arua', 'Urine', 'Oct-Dec 19', 7),
(16, 'Arua', 'Stool', 'Oct-Dec 18', 1),
(17, 'Arua', 'Stool', 'Jan-Mar 19', 1),
(18, 'Arua', 'Stool', 'Apr-Jun 19', 1),
(19, 'Arua', 'Stool', 'Jul-Sep 19', 0),
(20, 'Arua', 'Stool', 'Oct-Dec 19', 0),
(21, 'Arua', 'Uro-Genital Swabs', 'Oct-Dec 18', 7),
(22, 'Arua', 'Uro-Genital Swabs', 'Jan-Mar 19', 3),
(23, 'Arua', 'Uro-Genital Swabs', 'Apr-Jun 19', 0),
(24, 'Arua', 'Uro-Genital Swabs', 'Jul-Sep 19', 14),
(25, 'Arua', 'Uro-Genital Swabs', 'Oct-Dec 19', 3),
(26, 'kabale', 'Blood', 'Oct-Dec 18', 2),
(27, 'kabale', 'Blood', 'Jan-Mar 19', 2),
(28, 'kabale', 'Blood', 'Apr-Jun 19', 2),
(29, 'kabale', 'Blood', 'Jul-Sep 19', 2),
(30, 'kabale', 'Blood', 'Oct-Dec 19', 3),
(31, 'kabale', 'Cerebrospinal fluid', 'Oct-Dec 18', 0),
(32, 'kabale', 'Cerebrospinal fluid', 'Jan-Mar 19', 0),
(33, 'kabale', 'Cerebrospinal fluid', 'Apr-Jun 19', 0),
(34, 'kabale', 'Cerebrospinal fluid', 'Jul-Sep 19', 2),
(35, 'kabale', 'Cerebrospinal fluid', 'Oct-Dec 19', 0),
(36, 'kabale', 'Urine', 'Oct-Dec 18', 24),
(37, 'kabale', 'Urine', 'Jan-Mar 19', 30),
(38, 'kabale', 'Urine', 'Apr-Jun 19', 25),
(39, 'kabale', 'Urine', 'Jul-Sep 19', 46),
(40, 'kabale', 'Urine', 'Oct-Dec 19', 29),
(41, 'kabale', 'Stool', 'Oct-Dec 18', 4),
(42, 'kabale', 'Stool', 'Jan-Mar 19', 4),
(43, 'kabale', 'Stool', 'Apr-Jun 19', 2),
(44, 'kabale', 'Stool', 'Jul-Sep 19', 4),
(45, 'kabale', 'Stool', 'Oct-Dec 19', 3),
(46, 'kabale', 'Uro-Genital Swabs', 'Oct-Dec 18', 2),
(47, 'kabale', 'Uro-Genital Swabs', 'Jan-Mar 19', 0),
(48, 'kabale', 'Uro-Genital Swabs', 'Apr-Jun 19', 2),
(49, 'kabale', 'Uro-Genital Swabs', 'Jul-Sep 19', 15),
(50, 'kabale', 'Uro-Genital Swabs', 'Oct-Dec 19', 11),
(51, 'Mbale', 'Blood', 'Oct-Dec 18', 13),
(52, 'Mbale', 'Blood', 'Jan-Mar 19', 6),
(53, 'Mbale', 'Blood', 'Apr-Jun 19', 5),
(54, 'Mbale', 'Blood', 'Jul-Sep 19', 7),
(55, 'Mbale', 'Blood', 'Oct-Dec 19', 7),
(56, 'Mbale', 'Cerebrospinal fluid', 'Oct-Dec 18', 2),
(57, 'Mbale', 'Cerebrospinal fluid', 'Jan-Mar 19', 0),
(58, 'Mbale', 'Cerebrospinal fluid', 'Apr-Jun 19', 0),
(59, 'Mbale', 'Cerebrospinal fluid', 'Jul-Sep 19', 1),
(60, 'Mbale', 'Cerebrospinal fluid', 'Oct-Dec 19', 0),
(61, 'Mbale', 'Urine', 'Oct-Dec 18', 24),
(62, 'Mbale', 'Urine', 'Jan-Mar 19', 10),
(63, 'Mbale', 'Urine', 'Apr-Jun 19', 4),
(64, 'Mbale', 'Urine', 'Jul-Sep 19', 9),
(65, 'Mbale', 'Urine', 'Oct-Dec 19', 2),
(66, 'Mbale', 'Stool', 'Oct-Dec 18', 4),
(67, 'Mbale', 'Stool', 'Jan-Mar 19', 2),
(68, 'Mbale', 'Stool', 'Apr-Jun 19', 11),
(69, 'Mbale', 'Stool', 'Jul-Sep 19', 22),
(70, 'Mbale', 'Stool', 'Oct-Dec 19', 3),
(71, 'Mbale', 'Uro-Genital Swabs', 'Oct-Dec 18', 0),
(72, 'Mbale', 'Uro-Genital Swabs', 'Jan-Mar 19', 1),
(73, 'Mbale', 'Uro-Genital Swabs', 'Apr-Jun 19', 0),
(74, 'Mbale', 'Uro-Genital Swabs', 'Jul-Sep 19', 1),
(75, 'Mbale', 'Uro-Genital Swabs', 'Oct-Dec 19', 1),
(76, 'Mbarara', 'Blood', 'Oct-Dec 18', 7),
(77, 'Mbarara', 'Blood', 'Jan-Mar 19', 11),
(78, 'Mbarara', 'Blood', 'Apr-Jun 19', 2),
(79, 'Mbarara', 'Blood', 'Jul-Sep 19', 23),
(80, 'Mbarara', 'Blood', 'Oct-Dec 19', 37),
(81, 'Mbarara', 'Cerebrospinal fluid', 'Oct-Dec 18', 0),
(82, 'Mbarara', 'Cerebrospinal fluid', 'Jan-Mar 19', 0),
(83, 'Mbarara', 'Cerebrospinal fluid', 'Apr-Jun 19', 0),
(84, 'Mbarara', 'Cerebrospinal fluid', 'Jul-Sep 19', 0),
(85, 'Mbarara', 'Cerebrospinal fluid', 'Oct-Dec 19', 2),
(86, 'Mbarara', 'Urine', 'Oct-Dec 18', 3),
(87, 'Mbarara', 'Urine', 'Jan-Mar 19', 5),
(88, 'Mbarara', 'Urine', 'Apr-Jun 19', 6),
(89, 'Mbarara', 'Urine', 'Jul-Sep 19', 12),
(90, 'Mbarara', 'Urine', 'Oct-Dec 19', 14),
(91, 'Mbarara', 'Stool', 'Oct-Dec 18', 0),
(96, 'Mbarara', 'Uro-Genital Swabs', 'Oct-Dec 18', 2),
(97, 'Mbarara', 'Uro-Genital Swabs', 'Jan-Mar 19', 9),
(98, 'Mbarara', 'Uro-Genital Swabs', 'Apr-Jun 19', 9),
(99, 'Mbarara', 'Uro-Genital Swabs', 'Jul-Sep 19', 5),
(100, 'Mbarara', 'Uro-Genital Swabs', 'Oct-Dec 19', 2),
(101, 'Jinja', 'Blood', 'Oct-Dec 18', 18),
(102, 'Jinja', 'Blood', 'Jan-Mar 19', 10),
(103, 'Jinja', 'Blood', 'Apr-Jun 19', 4),
(104, 'Jinja', 'Blood', 'Jul-Sep 19', 33),
(105, 'Jinja', 'Blood', 'Oct-Dec 19', 9),
(106, 'Jinja', 'Cerebrospinal fluid', 'Oct-Dec 18', 0),
(107, 'Jinja', 'Cerebrospinal fluid', 'Jan-Mar 19', 0),
(108, 'Jinja', 'Cerebrospinal fluid', 'Apr-Jun 19', 0),
(109, 'Jinja', 'Cerebrospinal fluid', 'Jul-Sep 19', 1),
(110, 'Jinja', 'Cerebrospinal fluid', 'Oct-Dec 19', 1),
(111, 'Jinja', 'Urine', 'Oct-Dec 18', 5),
(112, 'Jinja', 'Urine', 'Jan-Mar 19', 2),
(113, 'Jinja', 'Urine', 'Apr-Jun 19', 7),
(114, 'Jinja', 'Urine', 'Jul-Sep 19', 2),
(115, 'Jinja', 'Urine', 'Oct-Dec 19', 4),
(116, 'Jinja', 'Stool', 'Oct-Dec 18', 1),
(117, 'Jinja', 'Stool', 'Jan-Mar 19', 1),
(118, 'Jinja', 'Stool', 'Apr-Jun 19', 1),
(119, 'Jinja', 'Stool', 'Jul-Sep 19', 2),
(120, 'Jinja', 'Stool', 'Oct-Dec 19', 0),
(126, 'Hoima', 'Blood', 'Oct-Dec 18', 1),
(127, 'Hoima', 'Blood', 'Jan-Mar 19', 0),
(128, 'Hoima', 'Blood', 'Apr-Jun 19', 1),
(129, 'Hoima', 'Blood', 'Jul-Sep 19', 3),
(130, 'Hoima', 'Blood', 'Oct-Dec 19', 0),
(131, 'Hoima', 'Cerebrospinal fluid', 'Oct-Dec 18', 4),
(132, 'Hoima', 'Cerebrospinal fluid', 'Jan-Mar 19', 1),
(133, 'Hoima', 'Cerebrospinal fluid', 'Apr-Jun 19', 0),
(134, 'Hoima', 'Cerebrospinal fluid', 'Jul-Sep 19', 2),
(135, 'Hoima', 'Cerebrospinal fluid', 'Oct-Dec 19', 0),
(136, 'Hoima', 'Urine', 'Oct-Dec 18', 11),
(137, 'Hoima', 'Urine', 'Jan-Mar 19', 7),
(138, 'Hoima', 'Urine', 'Apr-Jun 19', 7),
(139, 'Hoima', 'Urine', 'Jul-Sep 19', 18),
(140, 'Hoima', 'Urine', 'Oct-Dec 19', 2),
(141, 'Hoima', 'Stool', 'Oct-Dec 18', 8),
(142, 'Hoima', 'Stool', 'Jan-Mar 19', 3),
(143, 'Hoima', 'Stool', 'Apr-Jun 19', 0),
(144, 'Hoima', 'Stool', 'Jul-Sep 19', 1),
(145, 'Hoima', 'Stool', 'Oct-Dec 19', 0),
(146, 'Soroti', 'Blood', 'Oct-Dec 18', 1),
(147, 'Soroti', 'Blood', 'Jan-Mar 19', 1),
(148, 'Soroti', 'Blood', 'Apr-Jun 19', 3),
(149, 'Soroti', 'Blood', 'Jul-Sep 19', 4),
(150, 'Soroti', 'Blood', 'Oct-Dec 19', 1),
(151, 'Soroti', 'Cerebrospinal fluid', 'Oct-Dec 18', 1),
(152, 'Soroti', 'Cerebrospinal fluid', 'Jan-Mar 19', 2),
(153, 'Soroti', 'Cerebrospinal fluid', 'Apr-Jun 19', 1),
(154, 'Soroti', 'Cerebrospinal fluid', 'Jul-Sep 19', 5),
(155, 'Soroti', 'Cerebrospinal fluid', 'Oct-Dec 19', 1),
(156, 'Soroti', 'Urine', 'Oct-Dec 18', 24),
(157, 'Soroti', 'Urine', 'Jan-Mar 19', 37),
(158, 'Soroti', 'Urine', 'Apr-Jun 19', 22),
(159, 'Soroti', 'Urine', 'Jul-Sep 19', 34),
(160, 'Soroti', 'Urine', 'Oct-Dec 19', 25),
(161, 'Soroti', 'Stool', 'Oct-Dec 18', 4),
(162, 'Soroti', 'Stool', 'Jan-Mar 19', 13),
(163, 'Soroti', 'Stool', 'Apr-Jun 19', 9),
(164, 'Soroti', 'Stool', 'Jul-Sep 19', 11),
(165, 'Soroti', 'Stool', 'Oct-Dec 19', 1),
(166, 'Soroti', 'Uro-Genital Swabs', 'Oct-Dec 18', 1),
(167, 'Soroti', 'Uro-Genital Swabs', 'Jan-Mar 19', 0),
(168, 'Soroti', 'Uro-Genital Swabs', 'Apr-Jun 19', 0),
(169, 'Soroti', 'Uro-Genital Swabs', 'Jul-Sep 19', 0),
(170, 'Soroti', 'Uro-Genital Swabs', 'Oct-Dec 19', 0),
(171, 'Fort Portal', 'Blood', 'Oct-Dec 18', 5),
(172, 'Fort Portal', 'Blood', 'Jan-Mar 19', 5),
(173, 'Fort Portal', 'Blood', 'Apr-Jun 19', 5),
(174, 'Fort Portal', 'Blood', 'Jul-Sep 19', 9),
(175, 'Fort Portal', 'Blood', 'Oct-Dec 19', 12),
(176, 'Fort Portal', 'Cerebrospinal fluid', 'Oct-Dec 18', 0),
(177, 'Fort Portal', 'Cerebrospinal fluid', 'Jan-Mar 19', 2),
(178, 'Fort Portal', 'Cerebrospinal fluid', 'Apr-Jun 19', 1),
(179, 'Fort Portal', 'Cerebrospinal fluid', 'Jul-Sep 19', 2),
(180, 'Fort Portal', 'Cerebrospinal fluid', 'Oct-Dec 19', 1),
(181, 'Fort Portal', 'Urine', 'Oct-Dec 18', 9),
(182, 'Fort Portal', 'Urine', 'Jan-Mar 19', 3),
(183, 'Fort Portal', 'Urine', 'Apr-Jun 19', 8),
(184, 'Fort Portal', 'Urine', 'Jul-Sep 19', 5),
(185, 'Fort Portal', 'Urine', 'Oct-Dec 19', 9),
(186, 'Fort Portal', 'Stool', 'Oct-Dec 18', 0),
(187, 'Fort Portal', 'Stool', 'Jan-Mar 19', 0),
(188, 'Fort Portal', 'Stool', 'Apr-Jun 19', 0),
(189, 'Fort Portal', 'Stool', 'Jul-Sep 19', 1),
(190, 'Fort Portal', 'Stool', 'Oct-Dec 19', 0),
(191, 'Fort Portal', 'Uro-Genital Swabs', 'Oct-Dec 18', 0),
(192, 'Fort Portal', 'Uro-Genital Swabs', 'Jan-Mar 19', 1),
(193, 'Fort Portal', 'Uro-Genital Swabs', 'Apr-Jun 19', 1),
(194, 'Fort Portal', 'Uro-Genital Swabs', 'Jul-Sep 19', 0),
(195, 'Fort Portal', 'Uro-Genital Swabs', 'Oct-Dec 19', 0),
(196, 'Mubende', 'Blood', 'Oct-Dec 18', 11),
(197, 'Mubende', 'Blood', 'Jan-Mar 19', 2),
(198, 'Mubende', 'Blood', 'Apr-Jun 19', 0),
(199, 'Mubende', 'Blood', 'Jul-Sep 19', 0),
(200, 'Mubende', 'Blood', 'Oct-Dec 19', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wambede', 'Ramothan', 'rwambede@idi.co.ug', 'rama', '$2y$10$LnnYVbFwGpegT5398JEYv.IxTwZk0JvI7PQ3mdNmhzc3G7vY5SplG', NULL, '2020-05-20 16:04:32', '2020-05-20 16:04:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ah_organismscombined`
--
ALTER TABLE `ah_organismscombined`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `ah_organismsisolated`
--
ALTER TABLE `ah_organismsisolated`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `hh_organismsisolated`
--
ALTER TABLE `hh_organismsisolated`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `hh_resistance`
--
ALTER TABLE `hh_resistance`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ah_organismscombined`
--
ALTER TABLE `ah_organismscombined`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ah_organismsisolated`
--
ALTER TABLE `ah_organismsisolated`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hh_organismsisolated`
--
ALTER TABLE `hh_organismsisolated`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `hh_resistance`
--
ALTER TABLE `hh_resistance`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
