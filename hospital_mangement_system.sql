-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 04:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_mangement_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`) VALUES
(1, 'SlowArrow', 'cf1e0458898891b3c4243f882c215822');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `A_ID` int(11) NOT NULL,
  `DoctorSpecializationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `consultancyFees` varchar(255) DEFAULT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `Creation_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`A_ID`, `DoctorSpecializationID`, `UserID`, `DoctorID`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `Creation_Date`) VALUES
(17, 6, 1, 6, '500 EGP', '2020-08-16', '22:00', '2020-08-15 22:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `Message` text NOT NULL,
  `Posting_Date` date DEFAULT NULL,
  `isRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`ID`, `Full_Name`, `Email`, `contact_no`, `Message`, `Posting_Date`, `isRead`) VALUES
(1, 'Kirolos', 'kokojo2021@yahoo.com', '01275504397', 'Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello ', '2020-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `SpecializationID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DocFees` int(11) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegisterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `SpecializationID`, `Address`, `DocFees`, `ContactNo`, `Email`, `Password`, `RegisterDate`) VALUES
(5, 'Mohamed Mandour', 12, 'Safyr Square ', 400, 1001234567, 'MohamedMandour@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-08-13'),
(6, 'Kirolos', 6, '221b Baker Street', 500, 1255887689, 'test@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecialization`
--

CREATE TABLE `doctorspecialization` (
  `ID` int(11) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `Creation_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctorspecialization`
--

INSERT INTO `doctorspecialization` (`ID`, `Specialization`, `Creation_Date`) VALUES
(1, 'Gynecologist/Obstetrician', '2020-07-12 16:46:14'),
(2, 'General Physician', '2020-07-12 17:46:20'),
(3, 'Dermatologist', '2020-07-13 16:46:29'),
(4, 'Homeopath', '2020-07-13 16:46:33'),
(5, 'Ayurveda', '2020-07-15 16:46:37'),
(6, 'Dentist', '2020-07-08 16:46:41'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2020-07-13 16:46:45'),
(8, 'Demo test', '2020-07-30 16:46:51'),
(9, 'Bones Specialist demo', '2020-07-14 16:46:54'),
(10, 'Dermatologist', '2020-07-18 16:47:02'),
(12, 'Cardiology', '2020-08-13 21:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `BloodPressure` varchar(255) NOT NULL,
  `BloodSugar` varchar(255) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `Temprature` varchar(255) NOT NULL,
  `MedicalPres` text NOT NULL,
  `Creation_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`ID`, `Patient_ID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temprature`, `MedicalPres`, `Creation_Date`) VALUES
(6, 5, '90/170', '350', '125', '39', 'Fever with hight BP\r\n', '2020-07-08 11:44:54'),
(7, 5, '120/70', '120', '125', '36.9 C', '1-Paracitamol', '2020-07-08 13:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `Doc_ID` int(11) NOT NULL,
  `Patient_Name` varchar(255) NOT NULL,
  `Patient_Contact` varchar(255) NOT NULL,
  `Patient_Email` varchar(255) NOT NULL,
  `Patient_Gender` tinyint(1) NOT NULL,
  `Patient_Address` varchar(255) NOT NULL,
  `Patient_Age` int(11) NOT NULL,
  `Patient_mHistory` text NOT NULL,
  `Creation_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `Doc_ID`, `Patient_Name`, `Patient_Contact`, `Patient_Email`, `Patient_Gender`, `Patient_Address`, `Patient_Age`, `Patient_mHistory`, `Creation_Date`) VALUES
(5, 1, 'test5', '01275504397', 'test@test.com', 0, '221b Baker Street, London', 28, 'Diabetes Patient ', '2020-07-08 08:34:07'),
(8, 1, 'test2', '0156468796', 'test2@test2.com', 1, 'qeqwea', 22, '', '2020-07-08 09:19:19'),
(9, 6, 'kirolos', '05646498', 'asdad@asdad.com', 0, 'asdasd', 25, '', '2021-01-16 17:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` int(1) NOT NULL COMMENT '0 = > Male\r\n1 => Female',
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegisterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Full_Name`, `Address`, `Gender`, `Username`, `Email`, `Password`, `RegisterDate`) VALUES
(1, 'test', '221b Baker Street', 0, 'test', 'test@test.com', 'b447fc351ceae8dcc7bf2a7581675abf67656359', '2020-07-02'),
(9, 'Sherlock Holmes', '221b Baker Street, London', 0, 'SH', 'Sherlock_Holmes@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-07-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `_USER` (`UserID`),
  ADD KEY `_Doc` (`DoctorID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `_Specialization` (`SpecializationID`);

--
-- Indexes for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `_Doc` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_USER` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `_Specialization` FOREIGN KEY (`SpecializationID`) REFERENCES `doctorspecialization` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
