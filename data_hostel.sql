-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 08:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback_sys`
--

CREATE TABLE `feedback_sys` (
  `reg_no` varchar(10) NOT NULL,
  `room_no` varchar(6) NOT NULL,
  `complaint_details` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unsolved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback_sys`
--

INSERT INTO `feedback_sys` (`reg_no`, `room_no`, `complaint_details`, `status`) VALUES
('R_001', 'R12', 'FAN IS NOT WORKING .', 'unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `day` varchar(12) NOT NULL,
  `starter` varchar(30) NOT NULL,
  `maincourse` varchar(60) NOT NULL,
  `dessert` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`day`, `starter`, `maincourse`, `dessert`) VALUES
('Fri', 'Mexican-soup', 'Pasta,Pizza,Tacos,Garlic-Bread', 'Apple pie'),
('Mon', 'Paneer chilli dry', 'Papad,Chapati Roti,Bataka ni Bhaji,Khichdi-Kadhi,Chaas', 'Chocolate Ice-cream'),
('Sat', 'Chilli potato', 'Dhosa/Idli-shambhar', 'Raspberry pudding'),
('Sun', 'Harabhara Kabab', 'Dahi,Ghi-gud,Rotlo,Ringan Bhadthu,Onino-salad', 'Rajasthani-Malai Kulfi'),
('Thu', 'Aalu-tikki', 'Onion-Salad,Butter-nan,Punjabi sabji,Chaas', 'Choco lava pastry'),
('Tue', 'Cheese Balls', 'Angur Bashundi,Puri,Chole-Chana,Jeera Rice-Dal tadka', 'Gulab Jamun'),
('Wed', 'Tomato-soup', 'Salad,Parotha,Sev-tameta,Haidrabadi Biryani,Chaas', 'Anjeer-badam halwa');

-- --------------------------------------------------------

--
-- Table structure for table `room_data`
--

CREATE TABLE `room_data` (
  `room_no` varchar(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `seater` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `func` varchar(60) NOT NULL,
  `coordinator` varchar(20) DEFAULT NULL,
  `contact_no` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_data`
--

INSERT INTO `room_data` (`room_no`, `type`, `seater`, `status`, `rent`, `func`, `coordinator`, `contact_no`) VALUES
('R05', 'DELUXE', 4, 3, 50000, 'AC, FRIDGE, INTERNET SERVICE', 'Arpit Dave', '+919795367846'),
('R12', 'NORMAL', 5, 2, 40000, 'Non-AC, INTERNET SERVICE', 'Rajesh Patel', '+919745320186'),
('R16', 'SUPREME', 1, 0, 70000, 'AC, FRIDGE, INTERNET SERVICE, LEC TV, ELECTRIC STOVE', 'Hardik Panchal', '+917584620591'),
('R28', 'NORMAL', 3, 3, 42000, 'Non-AC, INTERNET SERVICE ', 'Rajesh Patel', '+918529462230'),
('R52', 'DELUXE', 2, 0, 50000, 'AC, FRIDGE, INTERNET SERVICE', 'Hardik Panchal', '+919085467440');

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `reg_no` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `emer_no` varchar(13) NOT NULL,
  `course` varchar(30) NOT NULL,
  `sem` varchar(4) NOT NULL,
  `password` varchar(60) NOT NULL,
  `room_no` varchar(5) NOT NULL,
  `fees_status` varchar(10) NOT NULL DEFAULT 'pending',
  `token` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `image` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`reg_no`, `name`, `birthdate`, `contact_no`, `email_id`, `emer_no`, `course`, `sem`, `password`, `room_no`, `fees_status`, `token`, `address`, `city`, `state`, `image`) VALUES
('R_001', 'Patel Ayush Harikrushna', '1999-10-25', '9727018723', 'patel.ayush.h@gmail.com', '9825436324', 'CE', '4', '82b8a3434904411a9fdc43ca87cee70c', 'R12', 'pending', '', 'A/6 Marutinandan Bunglows, kishan samosa lane,college road', 'Nadiad', 'Gujarat', 'R_001.jpg'),
('R_002', 'Fake John Doe', '1999-02-15', '7984697623', 'johndoe@yahoo.com', '9874563210', 'CE', '1', '6579e96f76baa00787a28653876c6127', 'R16', 'pending', NULL, 'B-12 , Bhavani society , Galiyala Pod', 'Rajkot', 'Gujarat', 'R_002.jpg'),
('R_003', 'Patel Zeel Nemishbhai', '1999-10-19', '8459946532', 'zeel19999@gmail.com', '9687452139', 'CE', '4', '6949dc1f7f8fdaaa77ea5594c24ec1c3', 'R52', 'pending', NULL, 'C-12, Himalayan Flat, Navranpura', 'Ahmedabad', 'Gujarat', 'R_003.jpg'),
('R_004', 'Parker Peter Anderson', '1992-12-15', '7965423189', 'peter.spidey@icloud.com', '8569864321', 'CIVIL', '6', '9f05aa4202e4ce8d6a72511dc735cce9', 'R12', 'pending', NULL, '15th Hamilton street, Across sweet water river', 'Navi Mumbai', 'Maharastra', 'R_004.jpg'),
('R_005', 'Parmar Ankit Ajitsigh', '1999-05-02', '9789654798', 'ankit@gmail.com', '8978654233', 'EC', '5', '8411d8501b25f07047cb941904256550', 'R12', 'pending', NULL, '15, Arvaliiya society ,Near ghat kuwa ', 'Junaghadh', 'Gujarat', 'R_005.jpg'),
('R_006', 'Gada Tipendra Jethalal', '1992-08-15', '9876543210', 'tapu@gmail.com', '9764581325', 'MECH', '8', '1b31d8eabe155844418c26493dab6c13', 'R05', 'pending', NULL, 'B-1, Gokuldham society,Goregaun East', 'Mumbai', 'Gujarat', 'R_006.JPG'),
('R_007', 'Patel Ramesh Jadugarbhai', '2000-01-08', '9468713259', 'rameshbhaithakor@gmail.com', '9468713256', 'IT', '2', '26e7867a1c8b95946966903b3487d11b', 'R52', 'pending', NULL, '5-Mota Haripura,chawda chowk', 'Viramgam', 'Gujarat', 'R_007.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`day`);

--
-- Indexes for table `room_data`
--
ALTER TABLE `room_data`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`reg_no`,`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
