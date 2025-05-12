-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 01:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_applications`
--

CREATE TABLE `catering_applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `experience_level` varchar(100) NOT NULL,
  `reason_for_applying` varchar(1000) NOT NULL,
  `application_date` datetime NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catering_applications`
--

INSERT INTO `catering_applications` (`id`, `full_name`, `email`, `phone`, `experience_level`, `reason_for_applying`, `application_date`, `address`) VALUES
(1, 'sahabi investor', 'usman@gmail.com', 890228822, 'Beginner', 'swhshhshs', '0000-00-00 00:00:00', 'nsnsnsns'),
(2, 'Abubakar Sadik', 'kabure001@gmail.com', 2147483647, 'Intermediate', 'To learn catering', '0000-00-00 00:00:00', 'At Unit'),
(4, 'Abubakar Sadik', 'admin@gmail.com', 2147483647, 'Beginner', 'qdgsdgdfhds', '0000-00-00 00:00:00', 'sardauna'),
(6, 'mallam tuge', 'tuge@gmail.com', 902223344, 'Beginner', 'jdjsjdjs', '0000-00-00 00:00:00', 'sardauna'),
(7, 'MALAMA ', 'MALAMA@GMAIL.COM', 2147483647, 'Beginner', 'To learn and start up a bussinees', '0000-00-00 00:00:00', 'SARDAUNA ESTATE'),
(9, 'usmanu ', 'kabriacid01@gmail.com', 98767456, 'Beginner', 'pokimuuyf', '0000-00-00 00:00:00', 'jkbbhjbgjnhk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'usman ribadu', 'uskid', 'b0e4237342ed84fcfac05f5ea1586f35'),
(14, 'Abdullahi Kabri', 'Acid', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(6, 'TUWO', 'Food_Category_210.jpg', 'Yes', 'Yes'),
(7, 'FAST FOOD', 'Food_Category_681.jpg', 'Yes', 'Yes'),
(8, 'NOODLES', 'Food_Category_855.jpg', 'Yes', 'Yes'),
(9, 'SNACKS', 'Food_Category_785.jpg', 'Yes', 'Yes'),
(10, 'RICE BOWLS', 'Food_Category_251.jpg', 'Yes', 'Yes'),
(11, 'EXTRAS', 'Food_Category_523.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'POUNDED YAM', 'This a ponded yam with stew and beef intestines with pomo.', '3000.00', 'Food_Name_502.jpg', 6, 'Yes', 'Yes'),
(6, 'AMALA', 'Amala a popular Nigeria staple especially among the yoruba people it is served with various soup and stew ewedu and gbegiri', '2000.00', 'Food-Name-9325.jpg', 6, 'Yes', 'Yes'),
(7, 'SEMOVITA', 'This semovita is a brand of semolina a fine wheat flour made with soup and stew which is egusi and ogu', '2500.00', 'Food-Name-2967.jpg', 6, 'Yes', 'Yes'),
(8, 'DAN WAKE ', 'Made with flour and mai da yaji with boiled egg and salad ', '1500.00', 'Food_Name_447.jpg', 7, 'Yes', 'Yes'),
(9, 'MACARONI', 'A full spicy jollof of macaroni ', '2000.00', 'Food_Name_426.jpg', 8, 'Yes', 'Yes'),
(10, 'INDOMIE NOODLES', 'A well spicy noodle with with fried egg', '1800.00', 'Food_Name_635.jpg', 8, 'Yes', 'Yes'),
(11, 'SPAGHETTI NOODLE', 'A spaghetti with stew and beef', '2000.00', 'Food_Name_867.jpg', 8, 'Yes', 'Yes'),
(12, 'SHAWARMA ', 'A chicken shawarma made with two sausage  ', '3000.00', 'Food_Name_851.jpg', 7, 'Yes', 'Yes'),
(13, 'PIZZA', 'A cut of 8 pizza', '10000.00', 'Food_Name_419.jpg', 7, 'Yes', 'Yes'),
(14, 'BURGER', 'A burger with beef and ketchup', '3000.00', 'Food_Name_979.jpg', 7, 'Yes', 'Yes'),
(15, 'SAMOSA', 'A hausa snack made with flour and beef just like meatpie', '500.00', 'Food_Name_534.jpg', 9, 'Yes', 'Yes'),
(16, 'SPRING ROLL', 'A flour filled with meat and rolled', '500.00', 'Food_Name_28.jpg', 9, 'Yes', 'Yes'),
(17, 'MEAT PIE', 'A flour filled with meat', '1500.00', 'Food_Name_256.jpg', 9, 'Yes', 'Yes'),
(18, 'MILKY DOUGHNUT ', 'a doughnut which is filled with milk', '1500.00', 'Food_Name_732.jpg', 9, 'Yes', 'Yes'),
(19, 'CUP CAKES', 'A cake with butter we have vanilla and chocolates  ', '1000.00', 'Food_Name_249.jpg', 9, 'Yes', 'Yes'),
(20, 'JOLLOF RICE', 'a rice dish with a  spiced sweetness from cooked tomatoes', '1800.00', 'Food_Name_473.jpg', 10, 'Yes', 'Yes'),
(21, 'FRIED RICE', ' rice that is stir-fried in a work with other ingredients like meat and vegetables stock', '2300.00', 'Food_Name_862.jpg', 10, 'Yes', 'Yes'),
(22, 'OIL RICE', 'flavorful rice cooked with oil and meat with vegetables', '3700.00', 'Food_Name_323.jpg', 10, 'Yes', 'Yes'),
(23, 'MOI MOI', 'a protein rich dish with a steamed bean', '500.00', 'Food_Name_796.jpg', 11, 'Yes', 'Yes'),
(24, 'FRIED PLANTAIN', 'a sweet snack maid from slide plantain', '1350.00', 'Food_Name_919.jpg', 11, 'Yes', 'Yes'),
(25, 'BOILED EGG', 'eggs boiled simply with water ', '300.00', 'Food_Name_825.jpg', 11, 'Yes', 'Yes'),
(26, 'YAM AND EGG SAUCE', 'a boiled yam garnished with egg sauce', '1700.00', 'Food_Name_166.jpg', 11, 'Yes', 'Yes'),
(27, 'MASA', 'Also known as WAINA is a type of fermented rice cake similar to Pancakes', '1000.00', 'Food_Name_389.jpg', 11, 'Yes', 'Yes'),
(28, 'WHITE RICE AND STEW', 'the rich sauce is delicious with rice', '1900.00', 'Food_Name_27.jpg', 10, 'Yes', 'Yes'),
(29, 'EBA', 'a starchy food made from garri dipping it with okra stew egusi and bitter leave stew.', '2200.00', 'Food_Name_673.jpg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `delivered` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `delivered`) VALUES
(2, 'Mac D', '503.00', 1, '503.00', '2025-04-23 10:19:16', 'Paid', 'Serina Benton', '+1 (415) 517-6747', 'tavyb@mailinator.com', 'Inventore voluptatem', 'Yes'),
(3, 'Meat pie', '990.00', 9, '8910.00', '2025-04-23 10:48:00', 'Paid', 'Wynter Kaufman', '+1 (829) 887-2092', 'fogy@mailinator.com', 'Amet magnam sed ea ', 'Yes'),
(4, 'Book', '934.00', 1, '934.00', '2025-04-23 11:02:02', 'Paid', 'Sadik', '90432483843', 'sadik@gmail.com', 'Sardauna Estate Katsina', 'Yes'),
(5, 'AMALA', '2000.00', 1, '2000.00', '2025-04-26 17:56:27', 'Paid', 'Sage Maynard', '+1 (344) 796-6045', 'tofyvuqo@mailinator.com', 'Est ad dolorum sint ', 'Yes'),
(6, 'AMALA', '2000.00', 1, '2000.00', '2025-04-26 17:56:32', 'Paid', 'Sage Maynard', '+1 (344) 796-6045', 'tofyvuqo@mailinator.com', 'Est ad dolorum sint ', 'Yes'),
(7, 'AMALA', '2000.00', 1, '2000.00', '2025-04-26 17:56:46', 'Paid', 'Sage Maynard', '+1 (344) 796-6045', 'tofyvuqo@mailinator.com', 'Est ad dolorum sint ', 'Yes'),
(8, 'AMALA', '2000.00', 1, '2000.00', '2025-04-26 17:58:09', 'Paid', 'Sage Maynard', '+1 (344) 796-6045', 'tofyvuqo@mailinator.com', 'Est ad dolorum sint ', 'Yes'),
(9, 'AMALA', '2000.00', 1, '2000.00', '2025-04-26 17:59:17', 'Paid', 'Sage Maynard', '+1 (344) 796-6045', 'tofyvuqo@mailinator.com', 'Est ad dolorum sint ', 'Yes'),
(10, 'DAN WAKE ', '1500.00', 5, '7500.00', '2025-04-26 18:03:29', 'Paid', 'Hisham', '090567895767', 'hishamdahiru02@gmail.com', 'Sardauna Estate.', 'Yes'),
(11, 'POUNDED YAM', '3000.00', 8, '24000.00', '2025-04-26 18:12:29', 'Paid', 'Lillith Faulkner', '+1 (586) 299-1266', 'usmanribadu000@gmail.com', 'Sunt quo ut et est m', 'Yes'),
(12, 'POUNDED YAM', '3000.00', 36, '108000.00', '2025-04-26 18:15:24', 'Paid', 'Nyssa Gray', '+1 (124) 842-9868', 'kabriacid01@gmail.com', 'Incididunt voluptate', 'Yes'),
(13, 'SEMOVITA', '2500.00', 5, '12500.00', '2025-04-26 19:14:45', 'Paid', 'sadik dahiru', '0804565432', 'sadikdahiru419@gmail.com', 'Adamawa, Girei', 'Yes'),
(14, 'PIZZA', '10000.00', 4, '40000.00', '2025-04-26 19:23:39', 'Paid', 'Sadik', '09056789678', 'kabriacid01@gmail.com', 'Sardauna, wada maida road', 'Yes'),
(15, 'PIZZA', '10000.00', 1, '10000.00', '2025-04-26 19:31:23', 'Paid', 'Usman', '0893895533', 'usmanribadu000@gmail.com', 'Sardauna Estate, House no 11 Safana Road.', 'Yes'),
(16, 'PIZZA', '10000.00', 4, '40000.00', '2025-04-26 19:33:04', 'Paid', 'Usman', '0893895533', 'usmanribadu000@gmail.com', 'House no 11 Safana Road.', 'Yes'),
(17, 'MOI MOI', '500.00', 1, '500.00', '2025-04-28 14:37:44', 'Paid', 'Usman Abubakar Ribadu', '08066885078', 'yerimausman000@gmail.com', 'Sardauna Estate no.11', 'No'),
(18, 'POUNDED YAM', '3000.00', 1, '3000.00', '2025-04-28 14:41:02', 'Paid', 'zakas', '098877657564', 'yaks@gmail.com', 'iuhugjhvfdtrdhfjk', 'Yes'),
(19, 'MASA', '1000.00', 3, '3000.00', '2025-04-28 15:03:23', 'Paid', 'sadik dahiru', '09035124276', 'sadikdahiru419@gmail.com', 'Sabon Layi Katsina', 'No'),
(20, 'POUNDED YAM', '3000.00', 1, '3000.00', '2025-04-28 15:09:49', 'Paid', 'Nazeef Zubairu', '07019249080', 'zubairunazif6@gmail.com', 'no.11 safana road sardauna estate', 'No'),
(21, 'BURGER', '3000.00', 1, '3000.00', '2025-04-29 10:04:10', 'Paid', 'Sahabi Sahabo', '08109500837', 'sahabosahabi078@gmail.com', 'Batagarawa KT.', 'No'),
(22, 'DAN WAKE ', '1500.00', 1, '1500.00', '2025-04-29 10:09:33', 'Paid', 'Eng. Sadik', '08039779405', 'karkiloan@gmail.com', 'Kofan Kwaya', 'No'),
(23, 'POUNDED YAM', '3000.00', 1, '3000.00', '2025-04-29 11:09:08', 'Paid', 'Abdullahi', '567890-', 'kabriacid01@gmail.com', 'Sardauna Estate', 'Yes'),
(24, 'POUNDED YAM', '3000.00', 1, '3000.00', '2025-04-29 11:10:28', 'Paid', 'Abdullahi', '567890-', 'kabriacid01@gmail.com', 'Sardauna Estate', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `tx_ref` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'NGN',
  `payment_status` varchar(50) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `response_data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `transaction_id`, `tx_ref`, `amount`, `currency`, `payment_status`, `customer_email`, `customer_name`, `order_id`, `response_data`, `created_at`) VALUES
(1, 'TRX-1745686757', 'TX-1745686498', '2000.00', 'NGN', 'successful', 'tofyvuqo@mailinator.com', 'Sage Maynard', 9, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745686498\",\"transaction_id\":\"9037767\"}', '2025-04-26 16:59:18'),
(2, 'TRX-1745687009', 'TX-1745686947', '7500.00', 'NGN', 'successful', 'hishamdahiru02@gmail.com', 'Hisham', 10, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745686947\",\"transaction_id\":\"9037780\"}', '2025-04-26 17:03:29'),
(3, 'TRX-1745687549', 'TX-1745687522', '24000.00', 'NGN', 'successful', 'usmanribadu000@gmail.com', 'Lillith Faulkner', 11, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745687522\",\"transaction_id\":\"9037799\"}', '2025-04-26 17:12:30'),
(4, 'TRX-1745687724', 'TX-1745687694', '108000.00', 'NGN', 'successful', 'kabriacid01@gmail.com', 'Nyssa Gray', 12, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745687694\",\"transaction_id\":\"9037802\"}', '2025-04-26 17:15:24'),
(5, 'TRX-1745691285', 'TX-1745691259', '12500.00', 'NGN', 'successful', 'sadikdahiru419@gmail.com', 'sadik dahiru', 13, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745691259\",\"transaction_id\":\"9037881\"}', '2025-04-26 18:14:46'),
(6, 'TRX-1745691819', 'TX-1745691798', '40000.00', 'NGN', 'successful', 'kabriacid01@gmail.com', 'Sadik', 14, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745691798\",\"transaction_id\":\"9037891\"}', '2025-04-26 18:23:39'),
(7, 'TRX-1745692283', 'TX-1745692261', '10000.00', 'NGN', 'successful', 'usmanribadu000@gmail.com', 'Usman', 15, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745692261\",\"transaction_id\":\"9037896\"}', '2025-04-26 18:31:23'),
(8, 'TRX-1745692384', 'TX-1745692362', '40000.00', 'NGN', 'successful', 'usmanribadu000@gmail.com', 'Usman', 16, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745692362\",\"transaction_id\":\"9037899\"}', '2025-04-26 18:33:04'),
(9, 'TRX-1745847464', 'TX-1745847423', '500.00', 'NGN', 'successful', 'yerimausman000@gmail.com', 'Usman Abubakar Ribadu', 17, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745847423\",\"transaction_id\":\"9040910\"}', '2025-04-28 13:37:44'),
(10, 'TRX-1745847662', 'TX-1745847633', '3000.00', 'NGN', 'successful', 'yaks@gmail.com', 'zakas', 18, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745847633\",\"transaction_id\":\"9040917\"}', '2025-04-28 13:41:02'),
(11, 'TRX-1745849003', 'TX-1745848921', '3000.00', 'NGN', 'successful', 'sadikdahiru419@gmail.com', 'sadik dahiru', 19, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745848921\",\"transaction_id\":\"9040945\"}', '2025-04-28 14:03:23'),
(12, 'TRX-1745849389', 'TX-1745849326', '3000.00', 'NGN', 'successful', 'zubairunazif6@gmail.com', 'Nazeef Zubairu', 20, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745849326\",\"transaction_id\":\"9040951\"}', '2025-04-28 14:09:49'),
(13, 'TRX-1745917450', 'TX-1745917401', '3000.00', 'NGN', 'successful', 'sahabosahabi078@gmail.com', 'Sahabi Sahabo', 21, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745917401\",\"transaction_id\":\"9042285\"}', '2025-04-29 09:04:10'),
(14, 'TRX-1745917773', 'TX-1745917720', '1500.00', 'NGN', 'successful', 'karkiloan@gmail.com', 'Eng. Sadik', 22, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745917720\",\"transaction_id\":\"9042293\"}', '2025-04-29 09:09:33'),
(15, 'TRX-1745921348', 'TX-1745921242', '3000.00', 'NGN', 'successful', 'kabriacid01@gmail.com', 'Abdullahi', 23, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745921242\",\"transaction_id\":\"9042447\"}', '2025-04-29 10:09:08'),
(16, 'TRX-1745921428', 'TX-1745921374', '3000.00', 'NGN', 'successful', 'kabriacid01@gmail.com', 'Abdullahi', 24, '{\"status\":\"completed\",\"tx_ref\":\"TX-1745921374\",\"transaction_id\":\"9042456\"}', '2025-04-29 10:10:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_applications`
--
ALTER TABLE `catering_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering_applications`
--
ALTER TABLE `catering_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
