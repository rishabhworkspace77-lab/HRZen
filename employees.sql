-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2025 at 04:57 AM
-- Server version: 10.6.22-MariaDB-cll-lve
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuan_hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `relative_reference` varchar(100) DEFAULT NULL,
  `job_role` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo_path` varchar(511) NOT NULL,
  `aadhar_path` varchar(511) NOT NULL,
  `pan_path` varchar(511) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mother_name` varchar(255) NOT NULL,
  `emergency_contact` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `clothing_size` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `father_name`, `address`, `email`, `phone`, `relative_reference`, `job_role`, `location`, `photo_path`, `aadhar_path`, `pan_path`, `status`, `created_at`, `mother_name`, `emergency_contact`, `dob`, `date_of_joining`, `marital_status`, `clothing_size`) VALUES
(2, 'Anuj', 'Anun', 'Anshan ', 'anauja@gmai.com', '7710053769', 'N', 'Therpaist', 'SEAFA THAI SPA COLABA', 'uploads/image.jpg', 'uploads/image.jpg', 'uploads/image.jpg', 'Active', '2025-09-19 14:20:00', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
(3, 'Sakun Tamang', 'Dawa Tamang', 'Goregaon east royal plam aaray colony ', 'sakuntamang@gmail.com', '9082219044', 'Friend', 'Therapist ', 'YUAN THAI SPA BANDRA', 'uploads/IDG_20250630_210303_535.jpeg', 'uploads/a7cef67b-b96c-4b76-b593-94c3f052d544.jpeg', 'uploads/cb7b5c8a-3de9-4261-93d8-63b266d8b3b2.jpeg', 'Active', '2025-09-19 14:38:24', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
(4, 'Vikas saroj ', 'Rajendra saroj ', 'Salempur dadaura Kunda Pratapgarh ', 'vikashkumar122394@gmail.com', '9167122394', 'Friends reference ', 'Hand helping ', 'YUAN THAI SPA PEDDAR ROAD', 'uploads/1000215636.jpg', 'uploads/IMG-20240322-WA0001.jpg', 'uploads/IMG-20240322-WA0002.jpg', 'Active', '2025-09-19 14:51:26', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
(5, 'Vikas saroj ', 'Rajendra saroj ', 'Salempur dadaur kunda Pratapgarh ', 'vikashkumar122394@gmail.com', '9167122394', 'Friends reference ', 'Hand helping ', 'YUAN THAI SPA PEDDAR ROAD', 'uploads/1000234040.jpg', 'uploads/IMG-20240322-WA0001.jpg', 'uploads/IMG-20240322-WA0009.jpg', 'Active', '2025-09-19 15:33:11', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
(6, 'Pangamla kashing', 'Dominic kashung', 'Khar danda mumbai', 'awungshipangamla@gmail.com', '8119054590', 'Friend', 'Therapy', 'YUAN THAI SPA BANDRA', 'uploads/17583523007334411605629561422380.jpg', 'uploads/17583521865375372706876946905043.jpg', 'uploads/1758352479631544855067859705123.jpg', 'Active', '2025-09-20 07:23:43', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
(12, 'Bhavin solanki ', 'Rajesh Solanki ', 'Lalji pada ', 'bhavinsolanki2232000@gmail.com', '8956638206', 'NA', 'CCTV operater ', 'FTV SALON', 'uploads/1000267923.jpg', 'uploads/Snapchat-1304362365.jpg', 'uploads/Snapchat-526632646.jpg', 'Active', '2025-09-20 10:13:56', 'Usha Solanki ', '9372440941', '2023-09-18', '2025-09-11', '', ''),
(14, 'Nelofer nawabudin Qureshi ', 'Nawabudin Qureshi ', 'KURLA EAST Galaxy Apartment  E wing 3 folr 1305', 'aliyashaikh13051992@gmli.com', '9867845658', 'Anil ', 'Therapist', 'VEDA CHEMBUR', 'uploads/image.jpg', 'uploads/IMG-20241107-WA0001.jpeg', 'uploads/IMG-20240926-WA0008.jpeg', 'Active', '2025-09-22 12:39:24', 'Meheraj bano', '8104590824', '1992-05-13', '2025-09-22', 'Married', 'XL'),
(15, 'Lalrampari', 'Lungtiawia', 'Lunglei ,Mizoram', 'parisralte390@gmail.com', '8798189695', 'Myself', 'Therapist', 'LOFT THANE', 'uploads/1000129471.jpg', 'uploads/17585446698694961156278911277425.jpg', 'uploads/IMG-20250922-WA0007.jpg', 'Active', '2025-09-22 12:57:09', 'Vanlalhriati', '8974199821', '1986-07-16', '2025-08-02', 'Single', 'XL'),
(16, 'Pooja soni', 'Muni Lal soni', 'Taloja ph', 'poojasoni@16243gmail.com', '7039929953', 'Anil', 'Therapist', 'VEDA CHEMBUR', 'uploads/image.jpg', 'uploads/image.jpg', 'uploads/image.jpg', 'Active', '2025-09-22 13:01:32', 'Usha soni', '816-9286620', '1990-02-07', '2025-09-22', 'Married', 'XL'),
(17, 'Chingreiphi shimrah ', 'Wormishang shimrah ', 'Kalina jama masjid lane ', 'chingreiphyshimrah@gmail.com', '6009692636', 'Kimi', 'Spa therapist ', 'VEDA CHEMBUR', 'uploads/1000103631.webp', 'uploads/IMG_20241126_220616.jpg', 'uploads/IMG_20240620_135153.jpg', 'Active', '2025-09-22 13:02:13', 'Ayaola shimrah ', '9366121697', '2001-02-03', '2025-09-14', 'Single', 'XS'),
(18, 'Vanlalhmahruaii', 'Hc.Lalnghenchhana(L)', 'Versova ', 'vhmahruaii@gmail.com', '8433913053', 'Lalruatzeli', 'Therapist ', 'SEA SALT BANDRA', 'uploads/AC0E956E-9DE1-4857-88D4-45900E0B13B2.jpeg', 'uploads/IMG_1117.jpeg', 'uploads/IMG_4110.jpeg', 'Active', '2025-09-22 13:25:28', 'C.Lalsawmliani', '6009110260', '2000-12-07', '2025-08-15', 'Single', 'M'),
(19, 'As Philangam horam', 'As star horam', 'Kalina,Santacruz near moonlight ', 'evitahoram@gmail.com', '8974498400', 'Ningreihor', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/1000105493.jpg', 'uploads/20231204_072625.jpg', 'uploads/20220601_121009.jpg', 'Active', '2025-09-22 14:01:54', 'As holly horam ', '8974144087', '1988-01-11', '2025-05-23', 'Single', 'M'),
(20, 'Ramu chaupal', 'Kari chaupal ', 'Baigani darbhanga bihar ', 'ramuchaupal778@gmail.com', '8271395352', 'Ram chaupal', 'Housekeeping ', 'VEDA CHEMBUR', 'uploads/1000001564.jpg', 'uploads/17585540722423635649832302293372.jpg', 'uploads/1758554048670911923055605636763.jpg', 'Active', '2025-09-22 15:15:09', 'Bijlee chaupal', '7678085440', '2006-01-01', '2025-09-22', 'Single', 'M'),
(21, 'Lalvarkim zote', 'Siemkung', 'Kalina jama masjid land', 'kimiopheli@gmail.com', '9774539195', 'Juju', 'Therapist', 'YUAN THAI SPA CHEMBUR', 'uploads/1000120997.jpg', 'uploads/Screenshot_2025-08-16-12-25-01-32_99c04817c0de5652397fc8b56c3b3817.jpg', 'uploads/Screenshot_2025-08-04-17-07-41-63_99c04817c0de5652397fc8b56c3b3817.jpg', 'Active', '2025-09-22 15:24:39', 'Thiemi', '8591057846', '1991-06-22', '2025-05-12', 'Single', 'S'),
(22, 'Guchi shu ', 'Guchi tath', 'District kamporijo lower subansiri Arunachal Pradesh ', 'guchishow82@gmail.com', '08010060206', 'Guchi yamen ', 'Therepes ', 'AURA THAI SPA POWAI', 'uploads/Screenshot_2024-12-23-16-47-06-91_87dd071a61d3aa2ef6ddc24a836c4632.jpg', 'uploads/IMG20250624125721.jpg', 'uploads/IMG-20250801-WA0006.jpg', 'Active', '2025-09-22 17:26:19', 'Guchi Ludi ', '7900065137', '2025-01-01', '2025-09-22', 'Single', 'M'),
(23, 'Nipa Mustafa shaikh', 'Mustafa shaikh', 'Room 701 rs/residency Ulwe sector 23 .navi mumbai', 'nipashaikh@gmail.com', '7045219094', 'Sonu house keeping', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/IMG_3723.jpeg', 'uploads/IMG20220725140210_Original.jpeg', 'uploads/IMG_4779.jpeg', 'Active', '2025-09-23 07:31:57', 'Hameeda shaikh', '9172706394', '1987-08-23', '2020-11-23', 'Married', 'M'),
(24, 'Muzakkir Hussain', 'Mahmod ali', 'Uttar nowabil Ambari hojai assam ', 'mujakkirhussain8822@gmail.com', '8822319203', 'Gulab', 'Housekeeping ', 'VEDA CHEMBUR', 'uploads/1000075478.jpg', 'uploads/IMG_20250921_142726050_HDR.jpg', 'uploads/IMG_20250921_142645583_HDR.jpg', 'Active', '2025-09-23 07:52:30', 'Monerun nasa', '9101808014', '2004-12-18', '2025-09-23', 'Single', 'M'),
(25, 'Sothing vashi', 'Phungshin valui', 'Kalina Santacruz ', 'Sothingvashi7@gmail.com', '8974144087', 'Ester', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/1000263932.jpg', 'uploads/DSC_1537.jpg', 'uploads/20240803_084303.jpg', 'Active', '2025-09-23 08:52:14', 'Basanti valui', '9082043867', '1988-12-18', '2025-03-05', 'Married', 'XL'),
(26, 'Kundan Kumar ', 'Jhameli mandal ', 'Bishanpur ghanshyam bihar ', 'kundanmandal33333@gmail.com', '+917079637511', 'Anil ', 'Housekeeping ', 'VEDA CHEMBUR', 'uploads/1000288961.jpg', 'uploads/IMG_20250921_143938.jpg', 'uploads/Screenshot_20240123_120226.jpg', 'Active', '2025-09-23 11:06:29', 'Sarita devi ', '8092713505', '2004-09-15', '2025-09-23', 'Single', 'L'),
(27, 'Sanjana chasiya', 'Dilip chasiya ', 'Dattamandir road Vakola Santacruz East ', 'sanjanachasiya77@gmail.com', '7021776402', '9892959958 brother ', 'therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/1000019193.jpeg', 'uploads/1000024888.jpeg', 'uploads/1000015659.jpeg', 'Active', '2025-09-24 07:26:51', 'Sarika chasiya', '7021776402', '2003-06-24', '2025-02-09', 'Single', 'S'),
(28, 'Kajal. ', 'Ashok', 'Mahavir darsha sector 6  Navi Mumbai ', 'kajalkamthe8@gmail.com', '9167066589', '9892959958', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/IMG_5666.jpeg', 'uploads/IMG_0817.jpeg', 'uploads/IMG_3252.jpeg', 'Active', '2025-09-24 07:28:03', 'Savita', '9167066589', '1999-12-21', '2023-01-24', 'Single', 'M'),
(29, 'Neha Jayswal ', 'Sila Prasad Jayswal ', 'Room102 Purnima deep Honda kilobyte panvel', 'ananyasingh123@gmail.com', '8591678385', 'Suraj ', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/IMG_3877.jpeg', 'uploads/IMG_3879.jpeg', 'uploads/IMG_3879.jpeg', 'Active', '2025-09-24 07:30:49', 'Kamlesh Jayswal ', '8850768485', '2020-08-15', '2025-09-15', '', ''),
(30, 'Ashwini ', 'Balram ', 'Yuan Thai spa road no 15 Chembur ', 'jasmine123@gmail.com', '9653382323', 'Suraj ', 'Therapist ', 'YUAN THAI SPA CHEMBUR', 'uploads/image.jpg', 'uploads/DE52607B-BEB0-4BAD-BE70-9C6374FFFC42.jpeg', 'uploads/0D2EB034-6C5C-43B5-A61D-D3D5F16A0CF4.jpeg', 'Active', '2025-09-24 07:32:07', 'Aruna ', '9892959958', '1994-11-06', '2022-07-24', 'Single', 'S'),
(31, 'Rubina khan', 'Shahabuddin Khan', 'Koparkhana sector 12 d Ramnagar Navi Mumbai Maharashtra ', 'khanrubina787@gmail.com', '08108032679', 'Sujit', 'Therapist', 'YUAN THAI SPA CHEMBUR', 'uploads/1000174634.jpg', 'uploads/17586994817908341756400537847756.jpg', 'uploads/17586995031481126984775323193900.jpg', 'Active', '2025-09-24 07:39:43', 'Kadrunnisha Khan', '8850757582', '1994-02-20', '2021-02-10', 'Married', 'S'),
(32, 'Timmiwon Zimik ', 'Chinaongam Zimik', '96/jacinto house Kalina Kolivery village, Santacruz East ', 'timmiwonns@gmail.com', '7629013353', 'Suzen', 'Therapist ', 'YUAN THAI SPA BANDRA', 'uploads/IMG_3689.jpeg', 'uploads/IMG_3949.jpeg', 'uploads/IMG_3952.jpeg', 'Active', '2025-09-24 08:15:08', 'Shanti zimik ', '7629013353', '2003-07-18', '2025-09-24', 'Single', ''),
(33, 'Selena ralte', 'Darzamlova ralte', 'Kalina', 'selenaraltehriati@gmail.com', '74998 98930', 'Friends ', 'Theparapist', 'YUAN THAI SPA JUHU', 'uploads/1000361993.jpg', 'uploads/Screenshot_20250610_222243_Gallery.jpg', 'uploads/Screenshot_20250610_222243_Gallery.jpg', 'Active', '2025-09-24 08:33:38', 'Julie lalrempuii ', '7276503922', '1999-06-13', '2025-09-23', 'Single', 'M'),
(34, 'Sirikhwan Pimpakhan', 'Somsak Pimpakhan', 'Aradhana apartment room N5 chembur Mumbai ', 'sirisaran1298@gmail.com', '9004089371', 'Na', 'Thrrapist', 'SEA SALT BANDRA', 'uploads/1000000088.jpg', 'uploads/Messenger_creation_812145883144156.jpeg', 'uploads/Messenger_creation_812145883144156.jpeg', 'Active', '2025-09-25 09:09:34', 'Banja Pimpakhan', '+919082536927', '1988-05-11', '2025-09-17', 'Single', 'XL'),
(35, 'sothingla tingphei ', 'mahaiwung', 'saven banglow varsova Andheri west', 'asonaotingphei@gmail.com', '8119863659', '8730994450', 'Therapist ', 'SEA SALT BANDRA', 'uploads/17587912827109195646033501900047.jpg', 'uploads/IMG-20250807-WA0006.jpeg', 'uploads/IMG-20250807-WA0002.jpeg', 'Active', '2025-09-25 09:10:54', 'samila', '8730994450', '1994-12-12', '2025-09-17', 'Single', ''),
(36, 'Sarah lalmawizuali ', 'Lalremchhunga ', 'Vakola Santacruz East ', 'mrszotribal@gmail.com', '9362377004', 'Mimi', 'Therapy ', 'SEA SALT BANDRA', 'uploads/1000464371.jpg', 'uploads/1758791449032691279662739026710.jpg', 'uploads/17587914663112112570139144774877.jpg', 'Active', '2025-09-25 09:12:07', 'Lalnunthari ', '9362377004', '2026-01-01', '2025-09-24', 'Single', ''),
(37, 'Sarina gurung', 'Suran gurung', 'Goregaon Metro Station Balaji building  b wing 32', 'gurungsarina403@gamil.com', '9892010889', 'Majestic ', ' Therapy', 'VEDA BANDRA', 'uploads/image.jpg', 'uploads/image.jpg', 'uploads/image.jpg', 'Active', '2025-09-25 10:51:35', 'Manila gurung', '8356968678', '1991-07-08', '2025-08-02', 'Married', 'L'),
(38, 'Sabina chettri', 'Suresh chettri', 'Juhu Tara Road ', 'chettrisabina782@gmail.com', '9064375319', 'Suzen ', 'Therapist ', 'AURA THAI SPA GINGER ANDHERI EAST', 'uploads/IMG_0759.jpeg', 'uploads/IMG_1610.png', 'uploads/IMG_1634.png', 'Active', '2025-09-25 13:22:18', 'Roma chettri', '7679132363', '2005-07-10', '2025-04-25', 'Single', 'M'),
(39, 'Ngalaton khamsak', 'Honsan khamsak', 'kalina ', 'khamsaktonphi@gamail.com', '8974911067', 'Elina', 'therapist', 'AURA THAI SPA GINGER ANDHERI EAST', 'uploads/IMG-20250709-WA0056.jpg', 'uploads/IMG-20250808-WA0007.jpg', 'uploads/IMG-20250808-WA0011.jpg', 'Active', '2025-09-25 13:33:47', 'panam khamsak', '8413084964', '1998-11-28', '2024-05-15', 'Single', 'M'),
(40, 'Rachna jatav', 'Dinesh Jatav ', '501 Haresh hire Goma Gail varsova ', 'rachnajatav855@gmail.com', '6266347206', 'Veda varsova ', 'Therapist ', 'VEDA BANDRA', 'uploads/ED5016A8-C0B4-45B3-B4F7-C9EE2C909810.jpeg', 'uploads/B5A7B24A-FB32-4942-B510-C8A668554172.jpeg', 'uploads/IMG_2943.png', 'Active', '2025-09-25 20:45:16', 'Kamla jatav', '6262846387', '1995-05-30', '2025-06-26', 'Single', 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
