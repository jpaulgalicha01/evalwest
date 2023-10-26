-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 08:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evalwestsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acad_yr`
--

CREATE TABLE `tbl_acad_yr` (
  `acad_id` int(11) NOT NULL,
  `acad_dep` text DEFAULT NULL,
  `acad_year` text DEFAULT NULL,
  `acad_sem` text DEFAULT NULL,
  `acad_SysDef` text DEFAULT NULL,
  `acad_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_id_rand` text DEFAULT NULL,
  `acc_name` text DEFAULT NULL,
  `acc_uname` text DEFAULT NULL,
  `acc_pass` text DEFAULT NULL,
  `acc_email` text DEFAULT NULL,
  `acc_type` text DEFAULT NULL,
  `acc_img` text DEFAULT NULL,
  `acc_otp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`acc_id`, `acc_id_rand`, `acc_name`, `acc_uname`, `acc_pass`, `acc_email`, `acc_type`, `acc_img`, `acc_otp`) VALUES
(1, '602567279', 'Administrator', 'admin', 'b59eb6a7ccd1f7862169defc69f425e0', 'jpaulgalicha@gmail.com', 'admin', 'school-icon-png-14053.png', '23855');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_criteria`
--

CREATE TABLE `tbl_criteria` (
  `crit_id` int(11) NOT NULL,
  `crit_criteria` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deleted_users`
--

CREATE TABLE `tbl_deleted_users` (
  `user_id` int(11) NOT NULL,
  `user_id_num` text DEFAULT NULL,
  `user_acad_year` text DEFAULT NULL,
  `user_department` text DEFAULT NULL,
  `user_course` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_yr` text DEFAULT NULL,
  `user_section` text DEFAULT NULL,
  `user_YrSec` text DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `user_position` text DEFAULT NULL,
  `user_img` text DEFAULT NULL,
  `user_otp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dep_yr_sec`
--

CREATE TABLE `tbl_dep_yr_sec` (
  `dep_yr_sec_id` int(11) NOT NULL,
  `dep_yr_sec_department` text DEFAULT NULL,
  `dep_yr_sec_course` text DEFAULT NULL,
  `dep_yr_sec_coursename` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `quest_id` int(11) NOT NULL,
  `quest_crit` text DEFAULT NULL,
  `quest_question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_eval`
--

CREATE TABLE `tbl_result_eval` (
  `id` int(11) NOT NULL,
  `eval_type` text DEFAULT NULL,
  `acad_year` text DEFAULT NULL,
  `semester` text DEFAULT NULL,
  `faculty_id` text DEFAULT NULL,
  `stud_id` text DEFAULT NULL,
  `year_level` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `course` text DEFAULT NULL,
  `id_num` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `per_criteria` text DEFAULT NULL,
  `score_per_criteria` text DEFAULT NULL,
  `mean_per_criteria` text DEFAULT NULL,
  `overall_points` text DEFAULT NULL,
  `overall_mean` text DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subj`
--

CREATE TABLE `tbl_subj` (
  `subj_id` int(11) NOT NULL,
  `subj_year` text DEFAULT NULL,
  `subj_section` text DEFAULT NULL,
  `subj_course` text DEFAULT NULL,
  `subj_subject` text DEFAULT NULL,
  `subj_id_num` text DEFAULT NULL,
  `subj_faculty_name` text DEFAULT NULL,
  `subj_semes` text DEFAULT NULL,
  `subj_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_id_num` text DEFAULT NULL,
  `user_acad_year` text DEFAULT NULL,
  `user_department` text DEFAULT NULL,
  `user_course` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_yr` text DEFAULT NULL,
  `user_section` text DEFAULT NULL,
  `user_YrSec` text DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `user_position` text DEFAULT NULL,
  `user_img` text DEFAULT NULL,
  `user_otp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yr_sec`
--

CREATE TABLE `tbl_yr_sec` (
  `yr_sec_id` int(11) NOT NULL,
  `yr_sec_course` text DEFAULT NULL,
  `yr_sec_year` text DEFAULT NULL,
  `yr_sec_section` text DEFAULT NULL,
  `yr_sec_YrSec` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acad_yr`
--
ALTER TABLE `tbl_acad_yr`
  ADD PRIMARY KEY (`acad_id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_criteria`
--
ALTER TABLE `tbl_criteria`
  ADD PRIMARY KEY (`crit_id`);

--
-- Indexes for table `tbl_deleted_users`
--
ALTER TABLE `tbl_deleted_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_dep_yr_sec`
--
ALTER TABLE `tbl_dep_yr_sec`
  ADD PRIMARY KEY (`dep_yr_sec_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `tbl_result_eval`
--
ALTER TABLE `tbl_result_eval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subj`
--
ALTER TABLE `tbl_subj`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_yr_sec`
--
ALTER TABLE `tbl_yr_sec`
  ADD PRIMARY KEY (`yr_sec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acad_yr`
--
ALTER TABLE `tbl_acad_yr`
  MODIFY `acad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_criteria`
--
ALTER TABLE `tbl_criteria`
  MODIFY `crit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_deleted_users`
--
ALTER TABLE `tbl_deleted_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dep_yr_sec`
--
ALTER TABLE `tbl_dep_yr_sec`
  MODIFY `dep_yr_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_result_eval`
--
ALTER TABLE `tbl_result_eval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subj`
--
ALTER TABLE `tbl_subj`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_yr_sec`
--
ALTER TABLE `tbl_yr_sec`
  MODIFY `yr_sec_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
