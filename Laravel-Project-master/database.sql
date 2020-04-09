-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2016 at 08:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idb_project6`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` float(6,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` char(1) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `salary`, `email`, `password`, `type`, `picture`, `created_at`, `updated_at`) VALUES
(6, 'ghjkdg', 0.00, 'adminfhdfhfgff@gmail.com', '123', 'a', 'jpg', '2016-11-12 20:50:20', '2016-11-12 20:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `teacherid` smallint(5) UNSIGNED NOT NULL,
  `year` tinyint(3) UNSIGNED NOT NULL,
  `semester` tinyint(3) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `studentid`, `teacherid`, `year`, `semester`, `date`, `status`, `created_at`, `updated_at`) VALUES
(20, 5, 2, 1, 1, '2016-11-20 07:12:01', 'p', '2016-11-20 01:12:01', '2016-11-20 01:12:01'),
(21, 6, 2, 1, 1, '2016-11-20 07:12:01', 'a', '2016-11-20 01:12:01', '2016-11-20 01:12:01'),
(22, 12, 2, 1, 1, '2016-11-20 07:12:01', 'a', '2016-11-20 01:12:01', '2016-11-20 01:12:01'),
(23, 13, 2, 1, 1, '2016-11-20 07:12:01', 'p', '2016-11-20 01:12:01', '2016-11-20 01:12:01'),
(24, 5, 2, 1, 1, '2016-11-20 07:13:30', 'a', '2016-11-20 01:13:30', '2016-11-20 01:13:30'),
(25, 6, 2, 1, 1, '2016-11-20 07:13:30', 'p', '2016-11-20 01:13:30', '2016-11-20 01:13:30'),
(26, 12, 2, 1, 1, '2016-11-20 07:13:30', 'p', '2016-11-20 01:13:30', '2016-11-20 01:13:30'),
(27, 13, 2, 1, 1, '2016-11-20 07:13:30', 'a', '2016-11-20 01:13:30', '2016-11-20 01:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_head` varchar(200) NOT NULL,
  `debit` float(10,2) NOT NULL DEFAULT '0.00',
  `credit` float(10,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `account_head`, `debit`, `credit`, `remarks`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fees', 0.00, 20000.00, 'Student ID: 23', '2016-11-16', '2016-11-15 21:56:30', '2016-11-15 21:56:30'),
(2, 'Admission Fees', 0.00, 5000.00, 'Student ID: 5', '2016-10-28', NULL, NULL),
(3, 'Admission Fees', 0.00, 2200.00, 'Student ID: 6', '2016-10-26', NULL, NULL),
(4, 'Admission Fees', 0.00, 2500.00, 'Student ID: 7', '2016-10-25', NULL, NULL),
(5, 'Admission Fees', 0.00, 2000.00, 'Student ID: 9', '2016-10-30', NULL, NULL),
(6, 'Admission Fees', 0.00, 2300.00, 'Student ID: 12', '2016-10-31', NULL, NULL),
(7, 'Admission Fees', 0.00, 2200.00, 'Student ID: 13', '2016-10-13', NULL, NULL),
(8, 'Semester Fees', 0.00, 30000.00, 'Student ID: 1, Year: 1 and Semester: 2', '2016-11-16', '2016-11-15 22:15:55', '2016-11-15 22:15:55'),
(9, 'Semester Fees', 0.00, 50000.00, 'Student ID: 2, Year: 1 and Semester: 1', '2016-11-16', '2016-11-15 22:16:20', '2016-11-15 22:16:20'),
(10, 'Expense', 50000.00, 0.00, 'Description :Purchase Computer', '2016-11-16', '2016-11-15 23:15:02', '2016-11-15 23:15:02'),
(11, 'Admission Fees', 0.00, 20000.00, 'Student ID: 24', '2016-11-20', '2016-11-19 23:01:41', '2016-11-19 23:01:41'),
(12, 'Admission Fees', 0.00, 20000.00, 'Student ID: 25', '2016-11-20', '2016-11-19 23:04:39', '2016-11-19 23:04:39'),
(13, 'Teacher Salary', 0.00, 20000.00, 'Teacher ID: 4', '2016-11-20', '2016-11-19 23:07:54', '2016-11-19 23:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `courseid` tinyint(3) UNSIGNED NOT NULL,
  `teacherid` smallint(5) UNSIGNED NOT NULL,
  `year` tinyint(3) UNSIGNED NOT NULL,
  `semester` tinyint(3) UNSIGNED NOT NULL,
  `resultid` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `studentid`, `courseid`, `teacherid`, `year`, `semester`, `resultid`) VALUES
(1, 6, 1, 1, 1, 1, 2),
(4, 9, 1, 2, 1, 1, 6),
(5, 12, 7, 2, 1, 1, 4),
(6, 13, 7, 2, 1, 1, 5),
(7, 5, 7, 2, 1, 1, 1),
(8, 6, 7, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Frozen', NULL, NULL),
(2, 'Electronics', NULL, NULL),
(3, 'Sports', NULL, NULL),
(4, 'Vegetable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Finance', '2016-10-25 11:58:46', '2016-10-25 11:58:46'),
(6, 'BBA', '2016-10-25 22:14:35', '2016-10-25 22:14:35'),
(7, 'Accounting', '2016-10-28 11:33:06', '2016-10-28 11:33:06'),
(8, 'PHP', '2016-11-17 01:33:56', '2016-11-17 01:33:56'),
(9, 'Javascript', '2016-11-17 01:34:58', '2016-11-17 01:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `year` date NOT NULL,
  `departmentid` tinyint(3) UNSIGNED NOT NULL,
  `courseid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `year`, `departmentid`, `courseid`, `created_at`, `updated_at`) VALUES
(1, '2016-10-01', 4, 7, '2016-10-28 12:40:06', '2016-10-28 12:40:06'),
(3, '2016-10-01', 3, 6, '2016-10-28 12:46:13', '2016-10-28 12:46:13'),
(4, '2016-10-04', 2, 6, '2016-10-29 13:11:03', '2016-10-29 13:11:03'),
(6, '2016-10-01', 4, 6, '2016-10-29 13:21:03', '2016-10-29 13:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Biology', '2016-10-25 18:59:01', '2016-10-25 18:59:01'),
(2, 'Finance', '2016-10-25 19:00:28', '2016-10-25 19:00:28'),
(3, 'Bangla', '2016-10-25 19:00:28', '2016-10-25 19:00:28'),
(4, 'Bangla', '2016-10-29 13:06:52', '2016-10-29 13:06:52'),
(5, 'Finance', '2016-10-29 13:09:53', '2016-10-29 13:09:53'),
(6, 'English', '2016-11-17 01:54:24', '2016-11-17 01:54:24'),
(7, 'guggug', '2016-11-17 01:55:09', '2016-11-17 01:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dean', '2016-10-25 19:04:50', '2016-10-25 19:04:50'),
(3, 'Ass. Professor ', '2016-10-28 21:05:14', '2016-10-28 21:05:14'),
(4, 'Professior', '2016-11-16 21:08:01', '2016-11-16 21:08:01'),
(5, 'SDFDF', '2016-11-17 02:38:00', '2016-11-17 02:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `examfess`
--

CREATE TABLE `examfess` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` date NOT NULL,
  `semester` varchar(2) NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `amount` float(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examfess`
--

INSERT INTO `examfess` (`id`, `year`, `semester`, `studentid`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2016-10-29', '2', 5, '2016-10-29 00:00:00', 500.00, '2016-10-28 21:38:18', '2016-10-28 21:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `amount` float(10,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `name`, `description`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(6, 'Purchase Computer', 'Purchase Computer&nbsp;Purchase Computer', 50000.00, '2016-11-17', '2016-11-15 23:15:02', '2016-11-15 23:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `picture`, `date`, `created_at`, `updated_at`) VALUES
(1, 'java', 'jpg', '2016-10-30 00:00:00', '2016-10-29 23:33:19', '2016-10-29 23:33:19'),
(2, 'Sr. Officer (Internal Audit)', 'jpg', '2016-10-30 00:00:00', '2016-10-29 23:33:26', '2016-10-29 23:33:26'),
(3, 'Sr. Officer (Internal Audit)', 'jpg', '2016-10-30 00:00:00', '2016-10-29 23:33:34', '2016-10-29 23:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_result`
--

CREATE TABLE `mcq_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `gpa` float(4,2) NOT NULL,
  `date` date NOT NULL,
  `subjectid` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_result`
--

INSERT INTO `mcq_result` (`id`, `studentid`, `gpa`, `date`, `subjectid`, `created_at`, `updated_at`) VALUES
(46, 14, 0.00, '2016-11-14', 11, '2016-11-14 09:15:32', '2016-11-14 09:15:32'),
(47, 14, 0.00, '2016-11-14', 12, '2016-11-14 09:17:27', '2016-11-14 09:17:27'),
(49, 14, 40.00, '2016-11-15', 11, '2016-11-15 03:56:07', '2016-11-15 03:55:52'),
(50, 5, 60.00, '2016-11-15', 11, '2016-11-15 03:57:56', '2016-11-15 03:57:13'),
(51, 6, 20.00, '2016-11-16', 11, '2016-11-16 08:37:26', '2016-11-16 08:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, ' EVENTS LIBRARY IQAC CONTACTS', '2016-10-30 00:00:00', '<p>East West University Center for Research and Training (EWUCRT) in collaboration with UGC/World Bank sub project organized a research proposal seminar titled &ldquo;Trial of War Rape: When Justice is an Issue&rdquo; on 27 October 2016 at East West University (EWU) premises. The research proposal presented by Dr. Tureen Afroz, Professor, Department of Law, EWU and Prosecutor, International Crime Tribunals, Bangladesh. In her presentation, Professor Dr. Tureen Afroz eloquently explained legal, social and completed justice with respect to rape victims of the Liberation War of Bangladesh. The discussant of this research proposal was Mr. Sheikh Hafizur Rahman Karzon, Associate Professor, Department of Law, University of Dhaka. Dr. Rafiqul Huda Chaudhury, Chairperson, EWUCRT moderated the seminar, while Professor Dr. Muhammed Shahriar Haque, Executive Director, EWUCRT introduced the guests. The seminar was well attended, and a vibrant discussion took place during the question and answer session. Among the audience members were Dr. Mohammed Farashuddin, Chairperson, Board of Trustees, EWU, Fersousi Priyobhashini, Freedom Fighter and Sculptor, Maleka Khan, Social Activist, Nari Punorbashon Kendra, Professor Mohammad Selim, Liberation War Researcher, Umme Wara, Coordinator, Center for the Studies of Genocide and Justice, Liberation War Museum, B. M. Abiduzzaman, Freelance Researcher, Professor Dr. Nurul Alam, Department of Anthropology, Jahangirnagar University, Deans of different faculties, Chairpersons of different departments, faculty members and students. &nbsp; &nbsp;</p>', '2016-10-29 22:03:48', '2016-10-29 22:03:48'),
(2, 'ISLM Chairperson attends an International Workshop', '2016-10-28 00:00:00', '<p>Dr. Dilara Begum, Associate Professor and Chairperson, Department of Information Studies and Library Management, East West University was invited as the Guest of Honour at the inauguration session of three-day UNESCO Supported Youth Capacity Building Workshop on Media and Information Literacy organized at Senate Hall, Punjabi University, Patiala (Punjab), India from 17-19 October 2016.</p>\r\n<p>The workshop was organized by Media and Information Literacy University Network of India (MILUNI) and Bhai Kahn Singh Nabha Library Punjabi University, Patiala and coordinated by Professor Dr. Jaghtar Singh, Department of Library and Information Science, Punjabi University, Patiala. Dr. Dilara Begum delivered a speech on Media and Information Literacy at the program towards the participants and guests of the inaugural program.</p>', '2016-10-29 22:04:38', '2016-10-29 22:04:38'),
(3, 'North South University Celebrated 24 Years of Glory', '2016-10-30 00:00:00', '<p>North South University (NSU), the first private university of Bangladesh, established in 1992, has come a long way since notable philanthropists took this commendable initiative. This year, the university marked the 24<sup>th</sup> anniversary of its founding with a plethora of programs celebrating NSU''s 24 Years of Glory from March 3 to 11. The festivities were graced by the presence of ministers, state ministers, MPs and academics from home and abroad.</p>\r\n<p>The nine-day long celebration commenced with an inaugural ceremony held on March 3. The Honorable Chairman of the Board of Trustees, Mr. M. A. Kashem, was the Guest of Honor and the Vice Chancellor, Professor Atiqul Islam, was the Session Chair. Also in attendance were all the members of the Board of Trustees, as well as the Treasurer, Dr. Gour Gobinda Goswami. Without the constant presence and patience, dignity, encouragement, and wisdom of these members of the NSU Authority, as well as the efforts of the University Librarian, Dr. Md. Mustafizur Rahman, who watched over every aspect of the events.<img src="http://www.northsouth.edu/assets/images/PRO-Office/24Yearsglry-10.jpg" alt="" width="591" height="285" /></p>\r\n<p>A beautiful and colourful rally including respected faculty members and students kicked off the celebrations. The rally highlighted the university''s global character and reach. The Plaza Area was packed with stalls each representing one of NSU''s student clubs. The stalls, decorated with banners of each club''s events and activities, brought out the creativity and distinct personality of each of the clubs. After the formal inauguration, the guests and students took a tour of these stalls. The alumni of NSU were also an integral part of these initial celebrations. Many seminars, public lectures, and programmes, which focused on subjects as diverse as as science, history, technology, and business, followed.</p>\r\n<p>These programs, featuring presentations and discussions led by many experts and graced by the presence of many dignitaries from both the public and the private sectors, offered opportunities for participants and attendees to learn a variety of topics, share their experiences, and also gain deeper knowledge in specific fields. The celebrations also included different exhibitions, dramas, sports activities, and competitions. These challenging and enlightening activities not only allowed participants to showcase their talents and build their confidence, but also to enjoy themselves immensely and share their pleasure with the audience. Members of the North South University Shangskritik Shangathan and the Confucius Institute organized stunning and entertaining cultural performances, and talented and renowned musicians enthralled their audiences. The NSU family also hosted and honored the Under-19 Cricket Team of Bangladesh.</p>\r\n<p>This nine-day run of splendid festivities finally came to an end with a road cleaning awareness program on Manik Miah Avenue on March 11. Through the entirety of this celebration of 24 Years of Glory, the NSU family memorialized its triumphs and achievements with immense joy and pride. This issue of NSU News is proud to bring you the full details and sights of all the events that made the nine-day long celebration such a resounding success.</p>', '2016-10-29 22:08:02', '2016-10-29 22:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` smallint(5) UNSIGNED NOT NULL,
  `vat` float(6,2) NOT NULL,
  `discount` float(6,2) NOT NULL,
  `categoryid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `vat`, `discount`, `categoryid`, `created_at`, `updated_at`) VALUES
(1, 'Anamul', 'Nai', 500, 4.00, 5.00, 3, '2016-10-25 01:01:55', '2016-10-25 01:01:55'),
(2, 'Anamul', 'Nai', 500, 4.00, 5.00, 3, '2016-10-25 01:03:33', '2016-10-25 01:03:33'),
(3, 'Dennis Hastert awaits sentence in hush-money case', 'Dennis Hastert awaits sentence in hush-money case Dennis Hastert awaits sentence in hush-money case', 6500, 10.00, 2.00, 2, '2016-10-25 01:04:28', '2016-10-25 01:04:28'),
(4, 'Fried Chicken Meal', 'chgcjgcjgcvjhvgjbgihio', 12, 10.00, 1.00, 1, '2016-10-25 08:59:03', '2016-10-25 08:59:03'),
(5, 'Fried Chicken Meal', 'chgcjgcjgcvjhvgjbgihio', 12, 10.00, 1.00, 1, '2016-10-25 08:59:03', '2016-10-25 08:59:03'),
(6, 'Fried Chicken Meal', 'chgcjgcjgcvjhvgjbgihio', 12, 10.00, 1.00, 1, '2016-10-25 08:59:03', '2016-10-25 08:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `opt_1` varchar(255) NOT NULL,
  `opt_2` varchar(255) NOT NULL,
  `opt_3` varchar(255) NOT NULL,
  `opt_4` varchar(255) NOT NULL,
  `subjectid` tinyint(4) NOT NULL,
  `answer` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `opt_1`, `opt_2`, `opt_3`, `opt_4`, `subjectid`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Question: What are 3 important parts of MVC? ', 'The Model represent the application data', 'The View renders a presentation of model data', 'Module represents the application part', 'The Controller handles and routes requests made by the client', 11, 3, NULL, NULL),
(3, 'Question: The view layer in CakePHP can be made up of a number of different parts. What are the deferent part of view layer? ', 'View', 'Element', 'Controller', 'Model', 11, 4, NULL, NULL),
(4, 'Question: Which block of the content contains the content of the render view?', 'Content Block', 'Title Block', 'Section Block', 'B & C', 11, 4, NULL, NULL),
(5, 'baf asdCakephp is a PHP framework package which enables you to develop custom application.It supports a MVC based architecture.?', 'TRUE', 'FALSE', 'none', 'a&b', 11, 1, NULL, NULL),
(6, 'What is the first file that gets loaded when you run a application using cakephp? \r\nIndex.php\r\n', 'Bootstrap.php', 'Core.php', 'Database.php', 'none', 11, 1, NULL, NULL),
(7, 'What is the first function that gets loaded from a controller? ', 'About', 'Index', 'Delete', 'Edit', 11, 2, NULL, NULL),
(8, 'Cakephp is a PHP framework package which enables you to develop custom application.It supports a MVC based architecture. ', 'TRUE', 'FALSE', '', '', 11, 1, NULL, NULL),
(9, 'abc What is the first file that gets loaded when you run a application using cakephp? ', 'Index.php', 'Bootstrap.php', 'Core.php', 'Database.php', 11, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referredfees`
--

CREATE TABLE `referredfees` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `amount` float(8,2) UNSIGNED NOT NULL,
  `creditid` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `marks` smallint(5) UNSIGNED NOT NULL,
  `assignment_1` smallint(5) UNSIGNED NOT NULL,
  `assignment_2` smallint(5) UNSIGNED NOT NULL,
  `assignment_3` smallint(5) UNSIGNED NOT NULL,
  `assignment_4` smallint(5) UNSIGNED NOT NULL,
  `teacherid` smallint(5) UNSIGNED NOT NULL,
  `courseid` tinyint(3) UNSIGNED NOT NULL,
  `year` tinyint(3) UNSIGNED NOT NULL,
  `semester` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `studentid`, `marks`, `assignment_1`, `assignment_2`, `assignment_3`, `assignment_4`, `teacherid`, `courseid`, `year`, `semester`, `created_at`, `updated_at`) VALUES
(1, 5, 60, 10, 10, 10, 10, 2, 7, 1, 1, '2016-11-01 00:01:10', '2016-11-01 00:01:10'),
(2, 6, 50, 20, 10, 5, 5, 2, 7, 1, 1, '2016-11-01 00:01:10', '2016-11-01 00:01:10'),
(4, 12, 23, 34, 44, 34, 23, 2, 7, 1, 1, '2016-11-01 00:01:10', '2016-11-01 00:01:10'),
(5, 13, 23, 43, 43, 34, 34, 2, 7, 1, 1, '2016-11-01 00:01:10', '2016-11-01 00:01:10'),
(6, 9, 40, 2, 10, 10, 8, 2, 1, 1, 1, '2016-11-02 07:02:45', '2016-11-02 07:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `stuffid` smallint(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` float(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `stuffid`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(9, 1, '2016-10-28', 25000.00, '2016-11-15 22:26:10', '2016-11-15 22:26:10'),
(10, 1, '2016-10-28', 25000.00, '2016-11-15 22:30:24', '2016-11-15 22:30:24'),
(11, 1, '2016-11-17', 20000.00, '2016-11-16 23:01:00', '2016-11-16 23:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `semesterfees`
--

CREATE TABLE `semesterfees` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` date NOT NULL,
  `semester` varchar(2) NOT NULL,
  `studentid` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `amount` float(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesterfees`
--

INSERT INTO `semesterfees` (`id`, `year`, `semester`, `studentid`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00', '2', 6, '2016-11-16 00:00:00', 30000.00, '2016-11-15 22:15:55', '2016-11-15 22:15:55'),
(2, '0000-00-00', '1', 5, '2016-11-16 00:00:00', 50000.00, '2016-11-15 22:16:20', '2016-11-15 22:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `fatherName` varchar(50) NOT NULL,
  `motherName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `admissionFees` float(8,2) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `departmentid` tinyint(3) UNSIGNED NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` varchar(4) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fatherName`, `motherName`, `email`, `password`, `address`, `contact`, `admissionFees`, `gender`, `dob`, `date`, `departmentid`, `year`, `semester`, `picture`, `created_at`, `updated_at`) VALUES
(5, 'Md. Musfiqur Rahman', 'Zillur Rahman', 'Shirin Pavez', 'student@gmail.com', '123', 'Banasree', '016729', 5000.00, 'm', '', '', 1, '1', '0', 'jpg', '2016-10-28 04:31:17', '2016-10-28 04:31:17'),
(6, 'Farhad hosen', 'Faras uddin', 'Fatima', 'farhad@gmail.com', '123', 'Maymansing', '12345678', 2200.00, 'm', '2016-10-04', '2016-10-26', 3, '1', '1', 'png', '2016-10-30 21:59:23', '2016-10-30 21:59:23'),
(7, 'Mohsin', 'Keramot ali', 'Karimon', 'mohsin@gmail.com', '123', 'Banasree', '123456', 2500.00, 'm', '2016-10-03', '2016-10-25', 4, '1', '1', 'png', '2016-10-30 22:01:56', '2016-10-30 22:01:56'),
(9, 'Musfiq', 'Musa', 'Momena', 'musfiq@gmail.com', '123', 'Banasree', '123456789', 2000.00, 'm', '2016-10-01', '2016-10-30', 5, '1', '1', 'png', '2016-10-30 22:05:35', '2016-10-30 22:05:35'),
(12, 'Muzammil', 'Mosleh Uddin', 'Mohsina', 'muzammil@gmail.com', '123', 'Mirpur', '123456790', 2300.00, 'm', '2016-10-01', '2016-10-31', 1, '1', '1', 'jpg', '2016-10-30 22:08:25', '2016-10-30 22:08:25'),
(13, 'Alamin', 'Anis', 'Anisa', 'alamin123@gmail.com', '123', 'Mirpur', '098765', 2200.00, 'm', '2016-10-07', '2016-10-13', 2, '1', '1', 'png', '2016-10-30 22:10:51', '2016-10-30 22:10:51'),
(14, 'Muzammil Haq', 'fdsa', 'fdsaf', 'admin@idb.com', 'cakephp3', 'f saf d', '6463534', 54.00, 'm', '2000-12-12', '2000-12-12', 1, '1', '1', 'jpg', '2016-11-09 00:53:01', '2016-11-09 00:53:01'),
(23, 'Md Al Amin', 'a', 'fdsaf', 'md.alamin@gmail.com', '123', 'Dhaka', '016546564', 20000.00, 'm', '2016-01-01', '2016-11-16', 1, '1', '0', 'jpg', '2016-11-15 21:56:30', '2016-11-15 21:56:30'),
(24, 'Professio', 'Nai', 'Nai', 'janina@gmail.com', '123', 'Dhaka', '064684848', 20000.00, 'm', '2016-11-20', '2016-11-20', 1, '1', '1', 'jpg', '2016-11-19 23:01:41', '2016-11-19 23:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `salary` float(9,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `departmentid` tinyint(3) UNSIGNED DEFAULT NULL,
  `designation` tinyint(3) UNSIGNED NOT NULL,
  `gender` varchar(1) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id`, `name`, `contact`, `salary`, `email`, `password`, `departmentid`, `designation`, `gender`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Musfiqur Rahmand', '435332412', 20000.00, 'admin@gmail.com', '123', 1, 1, 'm', 'jpg', '2016-10-29 14:37:24', '2016-10-29 14:37:24'),
(2, 'Md Nayan', '016545646', 10000.00, 'admin@gmail.com', '123', 1, 1, 'm', 'jpg', '2016-11-16 23:01:38', '2016-11-16 23:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `courseid`, `created_at`, `updated_at`) VALUES
(11, 'Marketing', 6, '2016-10-28 04:33:50', '2016-10-28 04:33:50'),
(12, 'Accounting', 6, '2016-10-28 09:18:32', '2016-10-28 09:18:32'),
(13, 'Laravel', 7, '2016-11-05 23:45:44', '2016-11-05 23:45:44'),
(14, 'Laravel', 8, '2016-11-17 01:34:17', '2016-11-17 01:34:17'),
(15, 'Jquery', 9, '2016-11-17 01:35:23', '2016-11-17 01:35:23'),
(16, 'Cakephp', 8, '2016-11-17 01:35:41', '2016-11-17 01:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `departmentid` tinyint(3) UNSIGNED NOT NULL,
  `designationid` tinyint(3) UNSIGNED NOT NULL,
  `salary` float(6,2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `contact`, `email`, `password`, `departmentid`, `designationid`, `salary`, `gender`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', '012345', 'hasancse016@gmail.com', '123', 2, 3, 0.00, 'male', 'png', '2016-10-30 21:54:56', '2016-10-30 21:54:56'),
(2, 'Farhad', '0543', 'farhad@gmail.com', '123', 1, 3, 0.00, 'male', 'png', '2016-10-30 21:55:59', '2016-10-30 21:55:59'),
(3, 'Mohsin', '0987654', 'mohsin@gmail.com', '123', 4, 1, 0.00, 'male', 'png', '2016-10-30 21:56:35', '2016-10-30 21:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `tsalary`
--

CREATE TABLE `tsalary` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `teacherid` smallint(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsalary`
--

INSERT INTO `tsalary` (`id`, `teacherid`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 1, '2016-10-30', 20.00, '2016-11-05 23:51:21', '2016-11-05 23:51:21'),
(3, 3, '2016-10-30', 30.00, '2016-11-06 00:13:00', '2016-11-06 00:13:00'),
(4, 2, '2016-10-30', 10.00, '2016-11-06 00:13:00', '2016-11-06 00:13:00'),
(7, 3, '2016-11-17', 7000.00, '2016-11-16 21:45:32', '2016-11-16 21:45:32'),
(8, 1, '2016-11-17', 4000.00, '2016-11-16 21:45:32', '2016-11-16 21:45:32'),
(9, 2, '2016-11-17', 5000.00, '2016-11-16 21:45:32', '2016-11-16 21:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`,`courseid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `teacherid` (`teacherid`),
  ADD KEY `resultid` (`resultid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`departmentid`,`courseid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examfess`
--
ALTER TABLE `examfess`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`,`semester`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_result`
--
ALTER TABLE `mcq_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjectid` (`subjectid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `referredfees`
--
ALTER TABLE `referredfees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `creditid` (`creditid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `teacherid` (`teacherid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuffid` (`stuffid`);

--
-- Indexes for table `semesterfees`
--
ALTER TABLE `semesterfees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`semester`,`studentid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `designationid` (`designationid`);

--
-- Indexes for table `tsalary`
--
ALTER TABLE `tsalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`);

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
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `examfess`
--
ALTER TABLE `examfess`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mcq_result`
--
ALTER TABLE `mcq_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `referredfees`
--
ALTER TABLE `referredfees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `semesterfees`
--
ALTER TABLE `semesterfees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tsalary`
--
ALTER TABLE `tsalary`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`);

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `batch_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `batch_ibfk_3` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `batch_ibfk_4` FOREIGN KEY (`resultid`) REFERENCES `result` (`id`);

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `credit_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`);

--
-- Constraints for table `examfess`
--
ALTER TABLE `examfess`
  ADD CONSTRAINT `examfess_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`);

--
-- Constraints for table `mcq_result`
--
ALTER TABLE `mcq_result`
  ADD CONSTRAINT `mcq_result_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `mcq_result_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`);

--
-- Constraints for table `referredfees`
--
ALTER TABLE `referredfees`
  ADD CONSTRAINT `referredfees_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `referredfees_ibfk_2` FOREIGN KEY (`creditid`) REFERENCES `credit` (`id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`stuffid`) REFERENCES `stuff` (`id`);

--
-- Constraints for table `semesterfees`
--
ALTER TABLE `semesterfees`
  ADD CONSTRAINT `semesterfees_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`);

--
-- Constraints for table `stuff`
--
ALTER TABLE `stuff`
  ADD CONSTRAINT `stuff_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`designationid`) REFERENCES `designation` (`id`);

--
-- Constraints for table `tsalary`
--
ALTER TABLE `tsalary`
  ADD CONSTRAINT `tsalary_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
