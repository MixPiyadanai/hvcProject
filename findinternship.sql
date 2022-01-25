-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 04:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findinternship`
--

-- --------------------------------------------------------

--
-- Table structure for table `interning`
--

CREATE TABLE `interning` (
  `interningID` int(11) NOT NULL,
  `interningUser` varchar(32) NOT NULL,
  `interningIntern` varchar(32) NOT NULL,
  `interningStatus` varchar(32) NOT NULL DEFAULT 'Qualifying',
  `interningStart` timestamp NULL DEFAULT NULL,
  `interningEnd` timestamp NULL DEFAULT NULL,
  `interningDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `internID` int(11) NOT NULL,
  `internName` varchar(64) NOT NULL,
  `internLocation` varchar(128) NOT NULL,
  `internMap` text NOT NULL,
  `internPhone` varchar(10) NOT NULL,
  `internEmail` varchar(64) NOT NULL,
  `internOwner` varchar(64) NOT NULL,
  `internDesc` text NOT NULL,
  `internMax` int(8) DEFAULT NULL,
  `internSubmited` timestamp NOT NULL DEFAULT current_timestamp(),
  `internClosed` varchar(64) DEFAULT NULL,
  `internOpen` varchar(64) DEFAULT NULL,
  `internImage` varchar(64) DEFAULT NULL,
  `MOU` varchar(4) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`internID`, `internName`, `internLocation`, `internMap`, `internPhone`, `internEmail`, `internOwner`, `internDesc`, `internMax`, `internSubmited`, `internClosed`, `internOpen`, `internImage`, `MOU`) VALUES
(1, 'Soft Square Group Of Company', 'Soft Square Chiangmai 193/208 Mu Ban Kunlaphan Ville 7, Moo 4 TamBon Mae-Hea, Amphur Muang Chiangmai Thailand 50100', '!1m18!1m12!1m3!1d944.5727451063324!2d98.94064309531615!3d18.740535331587097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da30d93646a0b5%3A0x4c0f72719c1133a9!2sSoft%20Square%20Chiangmai!5e0!3m2!1sen!2sth!4v1642435177209!5m2!1sen!2sth', '053274713', 'ss_bkk@softsquaregroup.com', 'ss_bkk', 'ABC', NULL, '2022-01-17 16:07:13', 'Closed,5PM,5PM,5PM,5PM,5PM,Closed', 'Closed,9AM,9AM,9AM,9AM,9AM,Closed', 'SoftSquare.jpg', 'Yes'),
(3, 'Educatique Corporation', '152/1 ถ. ช้างคลาน ตำบลช้างคลาน อำเภอเมืองเชียงใหม่ เชียงใหม่ 50100', '!1m18!1m12!1m3!1d944.3422639449628!2d98.99947524749173!3d18.781699332899095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3b0b2d8b0eb7%3A0x92b69bf18bf91554!2sEducatique%20Corporation!5e0!3m2!1sen!2sth!4v1643120266852!5m2!1sen!2sth', '0956935216', 'infoedcoth@gmail.com', 'EDCO', 'การขายปลีกสินค้าอื่นๆ การจัดทำโปรแกรมเว็บเพจและเครือข่ายตามวัตถุประสงค์ การทำหุ่นยนต์', NULL, '2022-01-25 14:38:18', '7PM,7PM,7PM,7PM,7PM,7PM,7PM', '11AM,11AM,11AM,11AM,11AM,11AM,11AM', 'edco.jpg', 'YES'),
(4, 'Unique Digital', '158 ถนนทุ่งโฮเต็ล ตำบลวัดเกต อำเภอเมืองเชียงใหม่ เชียงใหม่ 50000', '!1m18!1m12!1m3!1d944.2804428362452!2d99.0189716332841!3d18.792725816636995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da254e74b05b6f%3A0x6a7e4885e4b23793!2z4Liq4Liz4LiZ4Lix4LiB4LiH4Liy4LiZ4Liq4LmI4LiH4LmA4Liq4Lij4Li04Lih4LmA4Lio4Lij4Lip4LiQ4LiB4Li04LiI4LiU4Li04LiI4Li04LiX4Lix4LilICjguKrguLLguILguLLguKDguLLguITguYDguKvguJnguLfguK3guJXguK3guJnguJrguJkp!5e0!3m2!1sen!2sth!4v1643123032246!5m2!1sen!2sth', '0878059316', 'patty.uniquedigital@gmail.com', 'patty', 'Unique Digital ดำเนินธุรกิจรับออกแบบและผลิตงานด้าน Digital Content แบ่งออกเป็นงานด้าน 2D, 3D, Animation , Japan Amime และ Games', NULL, '2022-01-25 15:05:50', 'Closed,10AM,10AM,10AM,10AM,10AM,Closed', 'Closed,5PM,5PM,5PM,5PM,5PM,Closed', 'uniqueDigital.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(8) NOT NULL,
  `reportOrder` int(4) NOT NULL,
  `reportOwner` int(8) NOT NULL,
  `reportDate` varchar(64) NOT NULL,
  `reportContent` text NOT NULL,
  `reportImg` varchar(64) NOT NULL DEFAULT 'noImg.png',
  `reportCreate` timestamp NOT NULL DEFAULT current_timestamp(),
  `reportLastEdit` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `reportOrder`, `reportOwner`, `reportDate`, `reportContent`, `reportImg`, `reportCreate`, `reportLastEdit`) VALUES
(1, 1, 1, '2022-01-31', 'ASDASD', 'salamander.jpg', '2022-01-25 12:10:55', '2022-01-25 19:44:34'),
(2, 1, 2, '2022-01-25', 'ABC', 'noImg.png', '2022-01-25 12:10:55', '2022-01-25 19:10:55'),
(7, 2, 1, '2022-01-26', 'ทำทุกอย่าง', 'Merm4id.jpg', '2022-01-25 13:02:18', '2022-01-25 20:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `reportintern`
--

CREATE TABLE `reportintern` (
  `riID` int(10) NOT NULL,
  `riOwner` int(10) NOT NULL,
  `riIntern` varchar(128) NOT NULL,
  `riInternLocation` text NOT NULL,
  `riMentor` varchar(128) NOT NULL,
  `riPeriodStart` varchar(64) NOT NULL,
  `riPeriodEnd` varchar(64) NOT NULL,
  `riTerm` varchar(4) NOT NULL,
  `riYear` varchar(8) NOT NULL,
  `riClass` varchar(8) NOT NULL,
  `riClassYear` varchar(8) NOT NULL,
  `riClassGroup` varchar(8) NOT NULL,
  `riWorkEnvironment` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportintern`
--

INSERT INTO `reportintern` (`riID`, `riOwner`, `riIntern`, `riInternLocation`, `riMentor`, `riPeriodStart`, `riPeriodEnd`, `riTerm`, `riYear`, `riClass`, `riClassYear`, `riClassGroup`, `riWorkEnvironment`) VALUES
(1, 2, 'NeoSpeed Extreme Shop', '', 'นาย ดนุพล กรอกรวม', '13 พฤษภาคม พ.ศ. 2562', '12 กรกฎาคม พ.ศ. 2562', '1', '2564', 'ปวส.', '3', 'A', ''),
(4, 1, 'CMTC', '9 Wiang Kaew Rd, Si Phum Sub-district, Mueang Chiang Mai District, Chiang Mai 50200', 'สมปอง', '13 พฤษภาคม พ.ศ. 2564', '13 ธันวาคม พ.ศ. 2564', '1', '2565', 'ปวช.', '2', 'A', 'หลังจากที่เริ่มเข้าทำงานในวันแรก พี่ ๆ ในสถานที่ประกอบการได้ทำการสอนลงโปรแกรมพื้นฐาน เช่น Microsoft office Google Chrome Adobe เป็นต้น พอเราเริ่มลงโปรแกรมได้คล่อง \r\nพี่ ๆ ก็เริ่มให้รับลูกค้าด้วยตัวเอง และ ลงโปรแกรมด้วยตัวเอง โดยแรก ๆ จะให้ลง ระบบปฏิบัติการ Window \r\n	หลังจากทำงานไปได้สักพัก พี่ ๆ ที่ฝึกงานก็จะเริ่มให้เรา ลุยงานนอกที่ทำเกี่ยวกับ การเดินสายแลนด์ ติดตั้งโปรเจคเตอร์ และได้เข้าการสัมมนางานเรื่อง IOT (Internet of things) และได้รับภารกิจประจำวันคือช่วยการ กวาดร้าน ถูร้าน รวมถึง การเช็คของในคลัง\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(8) NOT NULL,
  `userName` varchar(64) NOT NULL,
  `userFirstName` varchar(64) NOT NULL,
  `userLastName` varchar(64) NOT NULL,
  `userPassword` varchar(64) NOT NULL,
  `userRole` varchar(64) NOT NULL DEFAULT 'Member',
  `userSex` varchar(8) NOT NULL DEFAULT 'Male'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userFirstName`, `userLastName`, `userPassword`, `userRole`, `userSex`) VALUES
(1, 'Admin', 'Admin', 'Admin', '1234', 'Admin', 'Male'),
(2, '63309010017', 'ปิยดนัย', 'เจริญตา', '1509966186411', 'Member', 'Male'),
(3, '62309010017', 'Piyadanai', 'Charoenta', '1509966186411', 'Member', 'Male'),
(5, '64309010017', 'สมปอง', 'เจริญตา', '1509966186411', 'Member', 'Male'),
(7, '64309010016', 'สมหญิง', 'เจริญตา', '1509966186411', 'Member', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interning`
--
ALTER TABLE `interning`
  ADD PRIMARY KEY (`interningID`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`internID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `reportintern`
--
ALTER TABLE `reportintern`
  ADD PRIMARY KEY (`riID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interning`
--
ALTER TABLE `interning`
  MODIFY `interningID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `internID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reportintern`
--
ALTER TABLE `reportintern`
  MODIFY `riID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
