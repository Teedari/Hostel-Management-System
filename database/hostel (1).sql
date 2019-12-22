-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 12:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`, `user_role`) VALUES
(1, 'admin', 'admin@gmail.com', '123456789', '2019-04-30 16:25:30', '2019-05-01', 'Admin'),
(2, 'Teedari', 'godfredderi47@gmail.com', '123', '2019-03-31 00:18:29', '2019-04-05', 'Admin'),
(3, 'blissett', 'UE23225776', '', '2019-05-24 20:33:26', '0000-00-00', ''),
(4, 'blissett', 'UE20032617', '1234', '2019-05-24 20:34:17', '0000-00-00', 'User'),
(5, 'blissett', 'UE23225776', '0247440221', '2019-05-24 20:35:58', '0000-00-00', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(40) NOT NULL,
  `program` varchar(200) NOT NULL,
  `posting_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program`, `posting_date`) VALUES
(1, 'BSc. Computer Engineering', '2019-04-28'),
(2, 'BSc. Electrical and Electronic Engineering', '2019-04-28'),
(3, 'Diploma Electrical and Electronic Engineering', '2019-04-28'),
(4, 'BSc. Agricultural Engineering', '2019-05-17'),
(5, 'BSc. Mechanical Engineering', '2019-04-28'),
(6, 'BSc. Environmental Engineering', '2019-04-28'),
(7, 'BSc. Petroleum Engineering', '2019-04-28'),
(8, 'BSc. Renewable Energy Engineering', '2019-04-28'),
(9, 'BSc. Civil Engineering', '2019-04-28'),
(10, 'BSc. Biological Sciences', '2019-04-28'),
(11, 'BSc. Medical Biodiagnostic Sciences', '2019-04-28'),
(12, 'BSc. Nursing', '2019-04-28'),
(13, 'BSc. Chemistry', '2019-04-28'),
(14, 'BSc. Computer Science', '2019-04-28'),
(15, 'BSc. Information Technology', '2019-04-28'),
(16, 'Diploma Information Technology', '2019-04-28'),
(17, 'Diploma Computer Science', '2019-04-28'),
(18, 'BSc. Actuarial Science', '2019-04-28'),
(19, 'BSc. Mathematics', '2019-04-28'),
(20, 'BSc. Statistics', '2019-04-28'),
(21, 'Diploma Statistics', '2019-04-28'),
(22, 'Diploma Insurance', '2019-04-28'),
(23, 'BSc. Fire and Disaster Management', '2019-04-28'),
(24, 'Diploma Fire, Safety and Disaster Management', '2019-04-28'),
(25, 'BSc. Natural Resources(Ecotourism,Fisheries and Aquaculture,Forest Resource Management,Land Reclamation and Restoration,Social Forestry,Wood Science and Forest Products)', '2019-04-28'),
(26, 'BSc. Professional French', '2019-04-28'),
(27, 'BSc. Resource Enterprise and Entrepreneurship', '2019-04-28'),
(28, 'Diploma Enterprise Management', '2019-04-28'),
(29, 'BSc. Agribusiness', '2019-04-28'),
(30, 'BSc. Agriculture(Animal Production,Crop Production,Horticulture)', '2019-04-28'),
(31, 'Diploma Agriculture', '2019-04-28'),
(32, 'BSc. Climate Change and Sustainable Development', '2019-04-28'),
(33, 'BSc. Planning and Sustainability', '2019-04-28'),
(34, 'Diploma Geo-Information Science', '2019-04-28'),
(36, 'BSc. Mechanical Engineering', '2019-04-28'),
(37, 'BSc. Computer Engineering', '2019-04-28'),
(38, 'BSc. Electrical and Electronic Engineering', '2019-04-28'),
(39, 'Diploma Electrical and Electronic Engineering', '2019-04-28'),
(40, 'BSc. Agricultural Engineering', '2019-04-28'),
(41, 'BSc. Mechanical Engineering', '2019-04-28'),
(42, 'BSc. Environmental Engineering', '2019-04-28'),
(43, 'BSc. Petroleum Engineering', '2019-04-28'),
(44, 'BSc. Renewable Energy Engineering', '2019-04-28'),
(45, 'BSc. Civil Engineering', '2019-04-28'),
(46, 'BSc. Biological Sciences', '2019-04-28'),
(47, 'BSc. Medical Biodiagnostic Sciences', '2019-04-28'),
(48, 'BSc. Nursing', '2019-04-28'),
(49, 'BSc. Chemistry', '2019-04-28'),
(50, 'BSc. Computer Science', '2019-04-28'),
(51, 'BSc. Information Technology', '2019-04-28'),
(52, 'Diploma Information Technology', '2019-04-28'),
(53, 'Diploma Computer Science', '2019-04-28'),
(54, 'BSc. Actuarial Science', '2019-04-28'),
(55, 'BSc. Mathematics', '2019-04-28'),
(56, 'BSc. Statistics', '2019-04-28'),
(57, 'Diploma Statistics', '2019-04-28'),
(58, 'Diploma Insurance', '2019-04-28'),
(59, 'BSc. Fire and Disaster Management', '2019-04-28'),
(60, 'Diploma Fire, Safety and Disaster Management', '2019-04-28'),
(61, 'BSc. Natural Resources(Ecotourism,Fisheries and Aquaculture,Forest Resource Management,Land Reclamation and Restoration,Social Forestry,Wood Science and Forest Products)', '2019-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `feespm` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` varchar(250) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` varchar(11) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` varchar(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `postingDate`) VALUES
(14, 5, 3, 3211, '2019-05-20', 12, 'Diploma Information Technology', 'UE20032617', 'stephen', 'burnes', 'blissett', 'male', '546133889', 'sblissett24@gmail.com', '242669512', 'samuel', 'father ', '244132822', 'tc 40', 'Tarkwa', '2019-05-20 17:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `status`, `posting_date`) VALUES
(25, 4, 1, 1200, 0, '2019-05-15 20:30:34'),
(26, 5, 2, 2000, 0, '2019-05-15 20:55:44'),
(27, 3, 5, 3211, 2, '2019-05-15 21:03:50'),
(28, 3, 5, 1500, 2, '2019-05-20 17:37:11'),
(30, 1, 8, 1200, 0, '2019-05-16 23:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `room_status`
--

CREATE TABLE `room_status` (
  `id` int(100) NOT NULL,
  `seater` int(100) NOT NULL,
  `room_no` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_status`
--

INSERT INTO `room_status` (`id`, `seater`, `room_no`, `status`) VALUES
(1, 3, 5, '3'),
(2, 4, 6, '4'),
(3, 2, 7, '2'),
(4, 1, 8, '1'),
(5, 3, 10, '3');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 10, 'test@gmail.com', '', '', '', '2016-06-22 13:16:42'),
(2, 10, 'test@gmail.com', '', '', '', '2016-06-24 18:20:28'),
(4, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-24 18:22:47'),
(5, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-26 22:37:40'),
(6, 20, 'Benjamin@gmail.com', 0x3a3a31, '', '', '2016-06-26 23:40:57'),
(7, 10, 'test@gmail.com', 0x3a3a31, '', '', '2019-02-10 15:43:43'),
(8, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 16:49:33'),
(9, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 16:52:11'),
(10, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 16:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`) VALUES
(10, '108061211', 'code', 'test', 'projects', 'male', 8467067344, 'test@gmail.com', 'Test@123', '2016-06-22 11:21:33'),
(19, '102355', 'Harry', 'projects', 'Singh', 'male', 6786786786, 'Harry@gmail.com', '6786786786', '2016-06-26 23:33:36'),
(20, '586952', 'Benjamin', '', 'projects', 'male', 8596185625, 'Benjamin@gmail.com', '8596185625', '2016-06-26 23:40:07'),
(21, 'UE20032617', 'Godfred', 'Tumwini', 'Dari', 'male', 247440223, 'godfredderi47@gmail.com', '247440223', '2019-04-29 00:18:59'),
(22, 'UE20032617', 'Godfred', 'Tumwini', 'Dari', 'male', 247440223, 'godfredderi47@gmail.com', '247440223', '2019-04-29 00:23:53'),
(23, 'UE23225217', 'Lucio', 'djsakfljla', 'jlajfkdlj', 'female', 2121221114, 'gjdojso@fjkajl.com', '2121221114', '2019-05-13 17:48:13'),
(24, 'UE32212461', 'LUCIO', 'kUUUPON', 'Kuupoon', 'male', 212134564, 'lucion@agmil.com', '212134564', '2019-05-15 19:09:24'),
(25, 'uedp20026117', 'expensive', 'Ballack', 'EBEN', 'male', 553301346, 'expensive@gmail.com', '553301346', '2019-05-15 19:32:34'),
(36, 'UE20032617', 'Godfred', 'Tumwini', 'Dari', 'male', 213264578, 'godfredderi47@gmail.com', '213264578', '2019-05-16 04:33:35'),
(37, 'UE20032617', 'David', 'Ray', 'Henson', 'male', 213264578, 'godfredderi47@gmail.com', '0247440223', '2019-05-16 04:35:47'),
(38, 'UE20032617', 'David', 'Ray', 'Henson', 'male', 213264578, 'godfredderi47@gmail.com', '', '2019-05-16 04:35:54'),
(39, 'UE20032617', 'David', 'Ray', 'Henson', 'male', 213264578, 'godfredderi47@gmail.com', '1234', '2019-05-16 04:36:00'),
(40, 'uedp20024517', 'stephen', 'burnes', 'blissett', 'male', 546133889, 'sblissett24@gmail.com', '546133889', '2019-05-20 17:42:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `room_status`
--
ALTER TABLE `room_status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
