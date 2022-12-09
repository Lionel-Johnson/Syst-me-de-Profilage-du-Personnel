-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 04:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_rank`
--

CREATE TABLE `tbl_academic_rank` (
  `rank_id` int(3) NOT NULL,
  `rank_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_rank`
--

INSERT INTO `tbl_academic_rank` (`rank_id`, `rank_name`) VALUES
(1, 'Enseignant I'),
(2, 'Enseignant II'),
(3, 'Enseignant III'),
(9, ' Porfesseur I'),
(10, ' Porfesseur II'),
(11, ' Porfesseur III'),
(12, 'Assistant Porfesseur IV'),
(13, 'Associé Porfesseur II'),
(14, 'Associé Porfesseur I'),
(15, 'Associé Porfesseur III'),
(16, 'Associé Porfesseur IV'),
(17, 'Associé Porfesseur V'),
(18, 'Porfesseur I'),
(19, 'Porfesseur II'),
(20, 'Porfesseur III'),
(21, 'Porfesseur IV'),
(22, 'Porfesseur V'),
(23, 'Porfesseur VI'),
(24, 'Porfesseur VII'),
(26, 'Porfesseur VIII');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(3) NOT NULL,
  `dept_name` char(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(2, 'College of Education'),
(3, 'College of Arts and Science'),
(4, 'College of Industrial Technology'),
(5, 'Institute of Industrial Technology'),
(6, 'College of Business Management and Accountancy'),
(7, 'College of Fisheries');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(7) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `per_id` int(6) NOT NULL,
  `filetype` varchar(20) NOT NULL,
  `date_uploaded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_name`, `per_id`, `filetype`, `date_uploaded`) VALUES
(32, 'uploads/1.jpg', 74, 'jpg', '0000-00-00'),
(33, 'uploads/1..5.png', 68, 'png', '0000-00-00'),
(34, 'uploads/', 69, '', '0000-00-00'),
(35, 'uploads/', 68, '', '0000-00-00'),
(36, 'uploads/evaluation-for-capstone.docx', 68, 'docx', '2022-12-03'),
(37, 'uploads/[fmovies.to] The Flash 3 - 06.srt', 67, 'srt', '2022-12-03'),
(38, 'uploads/activity_sheet3 (1).docx', 99, 'docx', '2022-12-03'),
(39, 'uploads/amCharts (1).csv', 100, 'csv', '2022-12-03'),
(40, 'uploads/Penguins.jpg', 99, 'jpg', '2022-12-03'),
(41, 'uploads/FlowchartApplication 2.docx', 106, 'docx', '2022-12-03'),
(42, 'uploads/evaluation-for-capstone.docx', 111, 'docx', '2022-12-03'),
(43, 'uploads/Koala.jpg', 100, 'jpg', '2022-12-03'),
(44, 'uploads/Jellyfish.jpg', 100, 'jpg', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gass_rank`
--

CREATE TABLE `tbl_gass_rank` (
  `gass_id` int(3) NOT NULL,
  `gass_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gass_rank`
--

INSERT INTO `tbl_gass_rank` (`gass_id`, `gass_name`) VALUES
(1, 'Agent Administratif I'),
(2, 'Agent Administratif II'),
(3, 'Agent Administratif III'),
(4, 'Agent Administratif IV'),
(5, 'Agent Administratif V'),
(6, 'Agent Administratif VI'),
(7, 'Administrateur I'),
(8, 'Administrateur II'),
(9, 'Administrateur III'),
(10, 'Administrateur IV'),
(11, 'Administrateur V'),
(12, 'Responsable Administratif I'),
(13, 'Responsable Administratif II'),
(14, 'Responsable Administratif III'),
(15, 'Responsable Administratif IV'),
(16, 'Responsable Administratif V'),
(17, 'Chef Responsable Administratif'),
(18, 'Subs du Président I'),
(19, 'Subs du Président II'),
(20, 'Subs du Président III'),
(21, 'Subs du Président IV'),
(22, 'Subs du Président V'),
(23, 'Conseiller orientation I'),
(24, 'Conseiller orientation II'),
(25, 'Conseiller orientation III'),
(26, 'Dentiste I'),
(27, 'Dentiste II'),
(28, 'Dentiste III'),
(29, 'Infirmier I'),
(30, 'Infirmier II'),
(31, 'Infirmier III'),
(32, 'Greffier I'),
(33, 'Greffier II'),
(34, 'Greffier III'),
(35, 'Greffier IV'),
(36, 'Greffier V'),
(37, 'Informaticien I'),
(38, 'Comptable II'),
(39, 'Agent de Securite III'),
(40, 'Responsable marketing IV'),
(42, 'Biblothécaire I');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `per_id` int(6) NOT NULL,
  `per_firstname` char(20) NOT NULL,
  `per_lastname` char(20) NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` char(6) NOT NULL,
  `per_status` char(8) NOT NULL,
  `per_address` varchar(150) NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `per_place_of_birth` varchar(150) NOT NULL,
  `per_date_of_original_appointment` date NOT NULL,
  `per_eligibility` varchar(20) NOT NULL,
  `per_campus` char(14) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_designation` varchar(50) NOT NULL,
  `per_gsis_bp_no` varchar(15) NOT NULL,
  `per_plantilla_no` int(25) NOT NULL,
  `promote_id` int(5) NOT NULL,
  `per_contact_no` varchar(20) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `bs_name` varchar(50) NOT NULL,
  `bs_year` year(4) NOT NULL,
  `bs_school` varchar(50) NOT NULL,
  `ms_name` varchar(50) NOT NULL,
  `ms_with_unit` varchar(12) NOT NULL,
  `ms_year` year(4) NOT NULL,
  `ms_school` varchar(50) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `dr_year` year(4) NOT NULL,
  `dr_with_unit` varchar(12) NOT NULL,
  `dr_school` varchar(50) NOT NULL,
  `other_degree` varchar(50) NOT NULL,
  `other_year` year(4) NOT NULL,
  `other_school` varchar(50) NOT NULL,
  `per_image` varchar(1000) NOT NULL,
  `date_modified` date NOT NULL,
  `gass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel_master_file`
--

CREATE TABLE `tbl_personnel_master_file` (
  `per_id` int(7) NOT NULL,
  `per_firstname` char(20) NOT NULL,
  `per_middlename` char(20) NOT NULL,
  `per_lastname` char(20) NOT NULL,
  `per_suffix` char(2) NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` char(6) NOT NULL,
  `per_status` char(8) NOT NULL,
  `per_address` varchar(150) NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `per_place_of_birth` varchar(150) NOT NULL,
  `per_date_of_original_appointment` date NOT NULL,
  `per_eligibility` varchar(20) NOT NULL,
  `per_campus` char(14) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_designation` varchar(50) NOT NULL,
  `per_tin_no` varchar(20) NOT NULL,
  `per_gsis_bp_no` varchar(15) NOT NULL,
  `per_pagibig_no` varchar(14) NOT NULL,
  `per_plantilla_no` int(25) NOT NULL,
  `promote_id` int(5) NOT NULL,
  `per_contact_no` varchar(20) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `bs_name` varchar(50) NOT NULL,
  `bs_year` year(4) NOT NULL,
  `bs_school` varchar(50) NOT NULL,
  `ms_name` varchar(50) NOT NULL,
  `ms_with_unit` varchar(12) NOT NULL,
  `ms_year` year(4) NOT NULL,
  `ms_school` varchar(50) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `dr_with_unit` varchar(12) NOT NULL,
  `dr_year` year(4) NOT NULL,
  `dr_school` varchar(50) NOT NULL,
  `other_degree` varchar(50) NOT NULL,
  `other_year` year(4) NOT NULL,
  `other_school` varchar(50) NOT NULL,
  `per_image` varchar(1000) NOT NULL,
  `date_modified` date NOT NULL,
  `gass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pos_id` int(3) NOT NULL,
  `pos_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pos_id`, `pos_name`) VALUES
(41, 'Président'),
(42, 'PME, Coordinateur'),
(43, 'comptable'),
(44, 'Predagogue, secretaire'),
(45, 'Predagogue'),
(46, 'Predagogue, Graduate School'),
(47, 'Coordinateur'),
(48, 'Predagogue, SAS'),
(49, 'Coordinateur, Extension'),
(50, 'Censeur'),
(51, 'Porvieur'),
(52, 'SSD En-Charge'),
(53, 'President de la cours criminelle'),
(54, 'Predagogue, enseignant'),
(55, 'Predagogue, Extension'),
(56, 'maitre des stages des etudients'),
(57, 'Discipline Officer'),
(58, 'Proffeur de svt'),
(59, ' intendant'),
(60, ' prsident Administration '),
(61, 'Coordinateur campus'),
(62, 'Direteur Executif '),
(63, 'Dean. College of Fisheries'),
(64, 'Research Coordinateur, Technopacer Adviser'),
(65, 'Coordinateur IGP '),
(66, 'Predagogue, BSIS                                  ICT C'),
(67, 'Acting Registrar'),
(68, 'Assistant Discipline '),
(69, 'Predagogue, BSOA'),
(70, 'Coordinateur Alumni '),
(71, 'informaticien'),
(72, 'Charge des cours, maitre des stages des etudients'),
(73, 'developpeur web'),
(74, 'Direteur, PME'),
(75, 'Predagogue, BSA'),
(76, 'prsident, Information Technology'),
(77, 'Referrent digital'),
(78, 'Predagogue, BSACT'),
(79, 'Coach'),
(80, 'professeur de soprt'),
(81, 'chercheur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promote_id` int(5) NOT NULL,
  `per_id` int(6) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `date_promoted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`promote_id`, `per_id`, `rank_id`, `date_promoted`) VALUES
(1, 67, 2, '27-11-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_gass_rank`
--
ALTER TABLE `tbl_gass_rank`
  ADD PRIMARY KEY (`gass_id`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  MODIFY `rank_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_gass_rank`
--
ALTER TABLE `tbl_gass_rank`
  MODIFY `gass_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `per_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pos_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promote_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
