-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2023 at 11:48 AM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_smartlocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ime`
--

CREATE TABLE `ime` (
  `id` int(11) NOT NULL,
  `shop_id` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `imei1` varchar(256) DEFAULT NULL,
  `imei2` varchar(256) DEFAULT NULL,
  `deviceID` varchar(256) DEFAULT NULL,
  `deviceBrand` varchar(256) DEFAULT NULL,
  `deviceTime` varchar(256) DEFAULT NULL,
  `deviceHard` varchar(256) DEFAULT NULL,
  `deviceMan` varchar(256) DEFAULT NULL,
  `deviceModel` varchar(256) DEFAULT NULL,
  `deviceSno` varchar(256) DEFAULT NULL,
  `emi_Amount` varchar(256) DEFAULT NULL,
  `due_date` varchar(256) DEFAULT NULL,
  `no_of_ime` varchar(256) DEFAULT NULL,
  `last_ime_paydate` varchar(256) DEFAULT NULL,
  `no_of_payimi` varchar(256) DEFAULT NULL,
  `lock_unlock` varchar(256) DEFAULT NULL,
  `uninstall` varchar(256) DEFAULT NULL,
  `deletes` varchar(256) DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ime`
--

INSERT INTO `ime` (`id`, `shop_id`, `name`, `email`, `mobile`, `imei1`, `imei2`, `deviceID`, `deviceBrand`, `deviceTime`, `deviceHard`, `deviceMan`, `deviceModel`, `deviceSno`, `emi_Amount`, `due_date`, `no_of_ime`, `last_ime_paydate`, `no_of_payimi`, `lock_unlock`, `uninstall`, `deletes`, `photo`) VALUES
(1, 'enterprises/LC020qk3iy', 'ajay', 'a@gmail.com', '4563218', '14868', '4268', 'enterprises/LC020qk3iy/devices/3afd037d61503c4b', 'realme', '2023-03-23T16:27:29.341Z', 'qcom', 'realme', 'RMX1911', 'ee0c2dbdd', '12338', '2023-04-11', '5458', NULL, NULL, '1', '1', '1', '178802641.jpg'),
(2, 'enterprises/LC040jj7ia', 'Rahul', 'srahulkshp@gmail.com', '8837777079', '861175057518936', '861175057518928', 'enterprises/LC040jj7ia/devices/3242fa26bced2dcf', 'OPPO', '2023-03-29T05:43:39.641Z', 'mt6765', 'OPPO', 'CPH2325', 'JNWOUC4TLBSOWWR81', '15000', '2023-04-30', '5', '2023-03-30', '1', '1', '1', '1', '113960396.jpg'),
(3, 'enterprises/LC020qk3iy', 'ajay', 'aj@gmail.com', '80053144', '45898', '6868', 'enterprises/LC020qk3iy/devices/36875de6bf3f5da0', 'OPPO', '2023-03-30T07:46:24.889Z', 'mt6765', 'OPPO', 'CPH2325', 'JNWOUC4TLBSOWWR82', '4686', '2023-03-30', '2468', NULL, NULL, '1', '1', '1', '731201558.jpg'),
(4, 'enterprises/LC040jj7ia', 'Realmec21y', 'realmec21y@gmail.com', '9878066125', '868176053617550', '86176053617543', 'enterprises/LC040jj7ia/devices/349243e67e516cab', 'realme', '2023-04-04T05:09:40.583Z', 'S19610AA1', 'realme', 'RMX3263', '2128264910AA02TA', '2000', '2023-04-04', '4', '2023-05-05', '1', '1', '1', '1', '368522076.jpg'),
(5, 'enterprises/LC040jj7ia', 'Mi9A', 'Mi9A@gmail.com', '9888871078', '863859052575854', '863859052575862', 'enterprises/LC040jj7ia/devices/3cb68826457874f4', 'Redmi', '2023-04-04T05:56:59.778Z', 'mt6762', 'Xiaomi', 'M2006C3LI', 'IFEIJF69BIPBEYPF', '2500', '2023-05-05', '4', '2023-05-05', '1', '1', '1', '1', '785068732.jpg'),
(6, 'enterprises/LC040jj7ia', 'VivoY02', 'vivoy02@gmail.com', '8699233166', '868236069650712', '868236069650704', 'enterprises/LC040jj7ia/devices/341c61a3a1045b05', 'vivo', '2023-04-04T06:11:03.517Z', 'mt6762', 'vivo', 'V2217', '10BD2P1QRX000LM', '3000', '2023-05-05', '4', '2023-05-06', '1', '1', '1', '1', '141691930.jpg'),
(7, 'enterprises/LC040jj7ia', 'Tecno6Pro', 'tecno6pro@gmail.com', '7889001176', '353620722130125', '353620722130133', 'enterprises/LC040jj7ia/devices/3761732bd8b9ebdb', 'TECNO', '2023-04-04T06:25:41.001Z', 'mt6761', 'TECNO', 'TECNO BE8', '09006312C3040706', '2300', '2023-05-05', '4', '2023-05-06', '1', '1', '1', '1', '891959891.jpg'),
(8, 'enterprises/LC040jj7ia', 'OppoA55', 'OppoA55@gmail.com', '9878066125', '866102053684814', '866102053684806', 'enterprises/LC040jj7ia/devices/3abd6b5f15e387bb', 'OPPO', '2023-04-04T06:37:03.558Z', 'mt6765', 'OPPO', 'CPH2325', '99CEY9CYOBOJZ5SK', '1900', '2023-05-05', '4', '2023-05-06', '4', '1', '1', '1', '613659175.jpg'),
(9, 'enterprises/LC020qk3iy', 'harsh', 'ha@gmail.com', '9793168164', '5868', '45890', 'enterprises/LC020qk3iy/devices/36875de6bf3f5da0', 'OPPO', '2023-03-30T07:46:24.889Z', 'mt6765', 'OPPO', 'CPH2325', 'JNWOUC4TLBSOWWR8', '458', '2023-04-04', '5', NULL, NULL, '1', '1', '1', '747642559.jpg'),
(10, 'enterprises/LC040jj7ia', 'RealmeC55', 'RealmeC55@gmail.com', '9878066125', '864755060846650', '864755060846643', 'enterprises/LC040jj7ia/devices/39eb653f2e5462a1', 'realme', '2023-04-04T07:20:34.595Z', 'mt6768', 'realme', 'RMX3710', 'PREADMZD8TAQEY4X', '1500', '2023-05-06', '5', '2023-05-06', '1', '1', '1', '1', '759196949.jpg'),
(11, '1', 'rohit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_data`
--

CREATE TABLE `shop_data` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `dp_officername` varchar(255) DEFAULT NULL,
  `dp_officer_phone` varchar(255) DEFAULT NULL,
  `dp_officer_email` varchar(255) DEFAULT NULL,
  `r_officer_name` varchar(255) DEFAULT NULL,
  `r_officer_phone` varchar(20) DEFAULT NULL,
  `r_officer_email` varchar(255) DEFAULT NULL,
  `shop_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_data`
--

INSERT INTO `shop_data` (`id`, `dname`, `contact_email`, `dp_officername`, `dp_officer_phone`, `dp_officer_email`, `r_officer_name`, `r_officer_phone`, `r_officer_email`, `shop_id`, `user_id`, `status`) VALUES
(1, '1', 'rohit@gmail.com', 'rohit', '56', 'rohit@gmail.com', 'sdfghjk', '345678', 'wertyui', '2', 1, 1),
(27, 'my shop', 'ajaykumar15798@gmail.com', 'gdhdj', '7705015444', 'aajj', 'Ajay', '7705017444', 'ajaykumar15798@gmail.com', 'enterprises/LC020qk3iy', 74, 1),
(28, 'sdfcbj', 'abnav@gmail.com', 'sdfcbj', '46890', 'a@gmail.com', 'Abhi', '6306677622', 'abnav@gmail.com', 'enterprises/LC01ig47ip', 84, 1),
(29, 'sagar telecom', 'sagarverma8434@gmail.com', 'Sagar Verma', '8434180000', 'sagarverma8434@gmail.com ', 'sagar', '8434180000', 'sagarverma8434@gmail.com', 'enterprises/LC040jj7ia', 85, 1),
(30, 'JMD', 'kakapistoli1991@gmail.com', 'sagar', '8568031500', 'jmd852@gmail.com', 'Bol bachan ', '7889001176', 'kakapistoli1991@gmail.com', 'enterprises/LC01w3jtfj', 87, 1),
(31, 'Test', 'mukeshjaiswal111@gmail.com', 'test', '9838821311', 'mukeshjaiswal111@gmail.com ', 'test', '9838821311', 'mukeshjaiswal111@gmail.com', 'enterprises/LC02zfr0om', 88, 1),
(32, 'Thapar telecom', 'theparv742@gmail.com', 'Vikas', '9814477753', 'theparv742@gmail.com', 'vikash thappar', '9814470753', 'theparv742@gmail.com', 'enterprises/LC037xqexx', 89, 1),
(33, 'Boby Telecom', 'Bobyverma123@gmail.com', 'Boby', '9815928946', 'Bobysingh@gmail.com', 'BOBY', '9815928946', 'Bobyverma123@gmail.com', 'enterprises/LC01ylldnv', 92, 1),
(34, 'preet telecom', 'GURPREET68001@GMAIL.COM', 'preet telecom', '9781268001', 'Gurpreet68001@gamil.com', 'preettelcom', '9781268001', 'GURPREET68001@GMAIL.COM', 'enterprises/LC00tvghes', 93, 1),
(35, 'Mr Singh Telecom', 'mrsinghtelecom@gmail.com', 'PARMINDER SINGH', '9888871078', 'vermaboys@gmail.com', 'Mr Singh Telecom', '8146383187', 'mrsinghtelecom@gmail.com', 'enterprises/LC01x7nonv', 94, 1),
(36, 'brother\'s mobile store', 'davindersharma4556@gmail.com', 'Davinder sharma ', '9877665809', 'davindersharma4556@gmail.com', 'Davinder sharma', '9877665809', 'davindersharma4556@gmail.com', 'enterprises/LC032yztec', 97, 1),
(37, 'kp mobile store', 'vprince496@gmail.com', 'prince verma', '9855546006', 'vprince496@gmail.com', 'prince verma', '9855546006', 'vprince496@gmail.com', 'enterprises/LC03qr679p', 98, 1),
(38, 'harmeet mobile doraha', 'soodgirl99@gmail.com', 'harmeet singh', '141421', 'harmitsingh8818@yahoo.in', 'lalita sood', '9877068499', 'soodgirl99@gmail.com', 'enterprises/LC044x9bnf', 99, 1),
(39, 'akash Turning point', 'akashturningpoint00@gmail.com', 'davinderpal singh', '9814520205', 'akashturningpoint00@gmail.com', 'Davinderpal singh', '9814520205', 'akashturningpoint00@gmail.com', 'enterprises/LC037qt7x7', 100, 1),
(40, 'INDER MOBILE UNIT 2', 'indermobiles.unit2@Gmail.com', 'PARMINDER SINGH', '9888871078', 'parmindersingh5121978@gmail.com', 'INDER MOBILE UNIT 2', '9814268588', 'indermobiles.unit2@Gmail.com', 'enterprises/LC03amldql', 101, 1),
(41, 'INDER MOBILE', 'indermobile123@gmail.com', 'PARMINDER singh', '9888871078', 'parmindersingh5121978@gmail.com', 'INDER MOBILE ', '9888618561', 'indermobile123@gmail.com', 'enterprises/LC01xbkgh9', 102, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `access_token`, `refresh_token`, `created_at`, `updated_at`) VALUES
(1, 'ya29.a0AVvZVsrWs1X8INpgjZZ6Z4Rw3c2xWXqJyQx0Qn269iPnpBJtKngwyh2c4vVqw3IxLYsG_LySo0aA3LbibGDsaHhc14V1wA0iGgWNQRLqbLninqkQQa1sJop8kbyy-K41LjOq5y0I4zYKGXO5NJoF5wBy0kaCaCgYKAd8SARASFQGbdwaIJw9TO5VZ0LLe6qHTJLq2Jw0163', '4/0AWtgzh4ayhNBjgZsj7vBhgG1acpZvO1KQwYqh3FmLR676CIXlEL4Hb7sqheJs8c1uErEEQ', 'scdc', '2023-03-15 10:13:27am');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `remainbal` int(11) DEFAULT NULL,
  `remaintid` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `typetid` varchar(20) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `remainbal`, `remaintid`, `piece`, `type`, `typetid`, `uid`, `tid`, `datetime`) VALUES
(1, NULL, 18, 1, NULL, 'debit', NULL, '74', '2023-03-25 12:57:38'),
(2, NULL, 17, 1, NULL, 'debit', NULL, '74', '2023-03-25 13:13:05'),
(3, NULL, 14, 1, NULL, 'debit', NULL, '74', '2023-03-25 13:17:19'),
(4, NULL, 12, 1, NULL, 'debit', NULL, '74', '2023-03-25 13:19:46'),
(5, NULL, 11, 1, NULL, 'debit', 74, NULL, '2023-03-25 13:20:30'),
(6, NULL, 7, 1, NULL, 'debit', 74, NULL, '2023-03-27 07:49:34'),
(7, 90, 10, 10, 'debit', 'credit', 1, '81', '2023-03-27 13:46:36'),
(8, 140, 60, 50, 'debit', 'credit', 1, '81', '2023-03-27 14:02:04'),
(9, 999990, 10, 10, 'debit', 'credit', 32, '80', '2023-03-28 13:15:45'),
(10, 9, 1, 1, 'debit', 'credit', 80, '85', '2023-03-29 10:42:05'),
(11, NULL, 6, 1, NULL, 'debit', 74, NULL, '2023-03-29 07:32:41'),
(12, NULL, 5, 1, NULL, 'debit', 74, NULL, '2023-03-29 07:33:07'),
(13, NULL, 4, 1, NULL, 'debit', 74, NULL, '2023-03-29 07:42:29'),
(14, NULL, 3, 1, NULL, 'debit', 74, NULL, '2023-03-29 07:46:18'),
(15, NULL, 2, 1, NULL, 'debit', 74, NULL, '2023-03-29 08:02:03'),
(16, NULL, 1, 1, NULL, 'debit', 74, NULL, '2023-03-29 11:47:08'),
(17, NULL, 1000, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:42:04'),
(18, NULL, 999, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:44:29'),
(19, NULL, 998, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:45:02'),
(20, NULL, 997, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:47:51'),
(21, NULL, 996, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:49:17'),
(22, NULL, 995, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:50:50'),
(23, NULL, 994, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:52:27'),
(24, NULL, 993, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:52:52'),
(25, NULL, 992, 1, NULL, 'debit', 74, NULL, '2023-03-29 12:53:53'),
(26, NULL, 991, 1, NULL, 'debit', 74, NULL, '2023-03-30 07:11:15'),
(27, NULL, 1, 1, NULL, 'debit', 85, NULL, '2023-03-30 07:19:44'),
(28, NULL, 990, 1, NULL, 'debit', 74, NULL, '2023-03-30 07:51:02'),
(29, 999980, 10, 10, 'debit', 'credit', 32, '86', '2023-04-02 12:12:18'),
(30, 7, 2, 2, 'debit', 'credit', 80, '88', '2023-04-02 16:02:51'),
(31, 999979, 1, 1, 'debit', 'credit', 32, '89', '2023-04-02 17:05:41'),
(32, 999970, 9, 9, 'debit', 'credit', 32, '85', '2023-04-04 10:30:30'),
(33, NULL, 9, 1, NULL, 'debit', 85, NULL, '2023-04-04 05:31:33'),
(34, NULL, 8, 1, NULL, 'debit', 85, NULL, '2023-04-04 06:01:01'),
(35, NULL, 7, 1, NULL, 'debit', 85, NULL, '2023-04-04 06:18:44'),
(36, NULL, 6, 1, NULL, 'debit', 85, NULL, '2023-04-04 06:30:17'),
(37, NULL, 5, 1, NULL, 'debit', 85, NULL, '2023-04-04 06:40:57'),
(38, NULL, 989, 1, NULL, 'debit', 74, NULL, '2023-04-04 07:06:02'),
(39, NULL, 4, 1, NULL, 'debit', 85, NULL, '2023-04-04 07:23:12'),
(40, 999960, 10, 10, 'debit', 'credit', 32, '90', '2023-04-04 16:33:17'),
(41, 999950, 10, 10, 'debit', 'credit', 32, '91', '2023-04-04 17:02:05'),
(42, 5, 5, 5, 'debit', 'credit', 91, NULL, '2023-04-05 13:12:02'),
(43, 4, 1, 1, 'debit', 'credit', 91, '93', '2023-04-05 13:33:59'),
(44, 0, 4, 4, 'debit', 'credit', 91, NULL, '2023-04-05 13:39:21'),
(45, 996, 5, 4, 'debit', 'credit', 1, '93', '2023-04-05 13:52:03'),
(46, 999900, 57, 50, 'debit', 'credit', 32, '80', '2023-04-05 19:01:51'),
(47, 44, 13, 13, 'debit', 'credit', 80, '94', '2023-04-05 19:12:01'),
(48, 999850, 50, 50, 'debit', 'credit', 32, '95', '2023-04-06 11:07:16'),
(49, 999800, 50, 50, 'debit', 'credit', 32, '96', '2023-04-06 11:08:06'),
(50, 31, 13, 13, 'debit', 'credit', 80, '101', '2023-04-06 17:53:59'),
(51, 996, 0, 0, 'debit', 'credit', 1, NULL, '2023-04-06 19:39:16'),
(52, 995, 989, 1, 'debit', 'credit', 1, '74', '2023-04-07 13:22:27'),
(53, 994, 990, 1, 'debit', 'credit', 1, '74', '2023-04-07 13:48:57'),
(54, 993, 991, 1, 'debit', 'credit', 1, '74', '2023-04-07 16:52:11'),
(55, 992, 992, 1, 'debit', 'credit', 1, '74', '2023-04-07 16:56:39'),
(56, 991, 993, 1, 'debit', 'credit', 1, '74', '2023-04-07 16:59:23'),
(57, 18, 13, 13, 'debit', 'credit', 80, '102', '2023-04-08 16:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'Distributer', 1),
(3, 'Retailer', 1),
(4, 'helper', 1),
(5, 'Seller', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `total_device` int(11) NOT NULL,
  `blocked_devices` int(11) NOT NULL,
  `unblocked_devices` int(11) NOT NULL,
  `free_devices` int(11) NOT NULL,
  `shop_id` varchar(55) DEFAULT NULL,
  `supdis` int(11) NOT NULL,
  `dist` int(11) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `type`, `mobile`, `email`, `photo`, `pin`, `status`, `address`, `created_by`, `total_device`, `blocked_devices`, `unblocked_devices`, `free_devices`, `shop_id`, `supdis`, `dist`, `sales`) VALUES
(1, 'Ajay Kumar', '1', '8009296978', 'manoj@gmail.com', 'scaled_IMG20230315174607.jpg', '12346', 1, NULL, NULL, 991, 0, 0, 991, '', 1, 1, 1),
(30, 'Admin Test', '1', '1234567890', 'test@gmail.com', 'scaled_IMG20230315174607.jpg', '123456', 1, NULL, NULL, 0, 0, 0, 0, '', 0, 0, 0),
(31, 'Shop Test', '2', '9876543210', 'shop@gmail.com', 'scaled_IMG20230315174607.jpg', '123456', 1, NULL, NULL, 0, 0, 0, 0, '1', 0, 0, 0),
(32, 'Suraj Gaba', '1', '9780250000', 'rakeshgaba.rg@gmail.com', '', '123456', 1, 'Gaba Televenture', 1, 999800, 0, 0, 999800, '', 0, 0, 0),
(74, 'Ajay', '2', '7705017444', 'ajaykumar15798@gmail.com', 'scaled_IMG-20230322-WA00261.jpg', '999999', 1, 'chakia ', 77, 1005, 0, 0, 993, 'enterprises/LC020qk3iy', 0, 79, 77),
(77, 'gre', '5', '7705016444', 'abcd@gmail.com', 'code23.png', '123456', 1, 'fg', 1, 20, 0, 0, 20, NULL, 78, 79, 1),
(78, 'tu', '3', '8766768686', 'abc@fmail.com', 'scaled_IMG-20230324-WA00031.jpg', '123456', 1, 'ffuhug', 1, 0, 0, 0, 0, NULL, 1, 1, 1),
(79, 'dgydyfy', '4', '7757676767', 'abiding@gmail.com', 'scaled_IMG-20230323-WA00025.jpg', '123456', 1, 'gddyydyfyf', 1, 0, 0, 0, 0, NULL, 78, 1, 1),
(80, 'Parminder ', '5', '9888871078', 'parmindersingh5121978@gmail.com', 'scaled_IMG202303271212191.jpg', '123456', 1, 'Ludhiana ', 32, 18, 0, 0, 18, NULL, 1, 1, 1),
(81, 'Nanika', '4', '8299099123', 'a1@gmail.com', 'scaled_IMG-20230326-WA00091.jpg', '123456', 1, 'ggggg', 1, 60, 0, 0, 60, NULL, 1, 1, 1),
(84, 'Abhi', '2', '6306677622', 'abnav@gmail.com', 'scaled_IMG-20230327-WA00141.jpg', '123456', 1, 'dhbkmk', 77, 0, 0, 0, 0, 'enterprises/LC01ig47ip', 78, 79, 77),
(85, 'sagar', '2', '8434180000', 'sagarverma8434@gmail.com', 'scaled_IMG-20230328-WA00171.jpg', '123456', 1, 'Tiba road', 80, 10, 0, 7, 3, 'enterprises/LC040jj7ia', 1, 1, 80),
(86, 'pawan misra', '5', '9878328887', 'pawanmishra.pm21@gmail.com', 'scaled_IMG_20210323_1048491.jpg', '123456', 1, 'tajpur road Ludhiana ', 32, 10, 0, 0, 10, NULL, 1, 1, 1),
(87, 'Bol bachan ', '2', '7889001176', 'kakapistoli1991@gmail.com', 'scaled_IMG-20230401-WA00151.jpg', '123456', 1, 'preet Nagar Tajpur Road Ludhiana ', 86, 0, 0, 0, 0, 'enterprises/LC01w3jtfj', 1, 1, 86),
(88, 'test', '2', '9838821311', 'mukeshjaiswal111@gmail.com', 'scaled_images_(16)1.jpeg', '123456', 1, 'Test', 80, 2, 0, 0, 2, 'enterprises/LC02zfr0om', 1, 1, 80),
(89, 'vikash thappar', '2', '9814477753', 'theparv742@gmail.com', 'scaled_images_(16)3.jpeg', '123456', 1, 'doraha', 32, 1, 0, 0, 1, 'enterprises/LC037xqexx', 1, 1, 1),
(91, 'honey ', '5', '8968185584', 'shiwnderpalsingh9308@gmail.com', 'scaled_IMG202304041631493.jpg', '123456', 1, 'gill road Ludhiana ', 32, 0, 0, 0, 0, NULL, 1, 1, 1),
(92, 'BOBY', '2', '9815928946', 'Bobyverma123@gmail.com', 'scaled_IMG-20230403-WA00011.jpg', '123456', 1, 'Dhuri line', 91, 0, 0, 0, 0, 'enterprises/LC01ylldnv', 1, 1, 91),
(93, 'preettelcom', '2', '9781268001', 'GURPREET68001@GMAIL.COM', 'scaled_IMG_20230405_1303311.jpg', '123456', 1, 'main bazar koom kalan', 91, 5, 0, 0, 5, 'enterprises/LC00tvghes', 1, 1, 91),
(94, 'Mr Singh Telecom', '2', '8146383187', 'mrsinghtelecom@gmail.com', 'scaled_IMG202304051839501.jpg', '123456', 1, 'Madhupuri Mittal elec opp shop', 80, 13, 0, 0, 13, 'enterprises/LC01x7nonv', 1, 1, 80),
(95, 'Deepak Sharma ', '5', '9779363894', 'sharmadeepak262999@gmail.com', 'scaled_IMG202304061104041.jpg', '123456', 1, 'sanewal ', 32, 50, 0, 0, 50, NULL, 1, 1, 1),
(96, 'Lakhwinder singh', '5', '9592789018', 'lakkisingj9018@gmail.com', 'scaled_IMG202304061105441.jpg', '123456', 1, 'Ludhiana ', 32, 50, 0, 0, 50, NULL, 1, 1, 1),
(97, 'Davinder sharma', '2', '9877665809', 'davindersharma4556@gmail.com', 'scaled_IMG_20230406_1259111.jpg', '123456', 1, 'near ramgarh chownk Sahnewal ', 95, 0, 0, 0, 0, 'enterprises/LC032yztec', 1, 1, 95),
(98, 'prince verma', '2', '9855546006', 'vprince496@gmail.com', 'scaled_IMG_20230406_1310271.jpg', '123456', 1, 'civil hospital road Sahnewal ', 95, 0, 0, 0, 0, 'enterprises/LC03qr679p', 1, 1, 95),
(99, 'lalita sood', '2', '9877068499', 'soodgirl99@gmail.com', 'scaled_IMG_20230406_1344411.jpg', '123456', 1, 'doraha', 96, 0, 0, 0, 0, 'enterprises/LC044x9bnf', 1, 1, 96),
(100, 'Davinderpal singh', '2', '9814520205', 'akashturningpoint00@gmail.com', 'scaled_IMG_20230406_1437521.jpg', '123456', 1, 'dehlon road sahnwal', 95, 0, 0, 0, 0, 'enterprises/LC037qt7x7', 1, 1, 95),
(101, 'INDER MOBILE UNIT 2', '2', '9814268588', 'indermobiles.unit2@Gmail.com', 'scaled_IMG202304061750161.jpg', '845123', 1, 'Tajpur Road Gaba electronice near shop', 80, 13, 0, 0, 13, 'enterprises/LC03amldql', 1, 1, 80),
(102, 'INDER MOBILE ', '2', '9888618561', 'indermobile123@gmail.com', 'scaled_IMG202304081637141.jpg', NULL, 1, 'Tajpur Road,Gaba paji near shop', 80, 13, 0, 0, 13, 'enterprises/LC01xbkgh9', 1, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `shop_name`, `mobile`, `email`, `image`, `address`, `gstin`, `city_id`) VALUES
(1, 1, '1', '234567', 'rk@gmail.com', 'qwertyui', 'wertyu', 'wert', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ime`
--
ALTER TABLE `ime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_data`
--
ALTER TABLE `shop_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ime`
--
ALTER TABLE `ime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop_data`
--
ALTER TABLE `shop_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
