-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 07:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mark_name` varchar(191) NOT NULL,
  `mark_img` varchar(191) NOT NULL,
  `income` int(11) DEFAULT NULL,
  `place` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `mark_name`, `mark_img`, `income`, `place`, `type`, `created_at`, `updated_at`) VALUES
(9, 39, 'Mobile', '3e7a637951309997fcb270783701ded5.jpg', 250000, 'Dhaka', 'Mayor', '2018-06-29 08:10:49', '2018-12-10 14:30:27'),
(10, 40, 'Chair', '2c566158322dd79b372150a75593ba6b.jpg', 200000, 'Dhaka', 'chairman', '2018-06-29 08:12:45', '2018-12-10 14:30:59'),
(11, 43, 'bird', '4e2a72ff520a491f8e7a8bca2746f26b.jpg', 190000, 'Dhaka', 'member', '2018-06-29 08:13:26', '2018-12-10 14:31:26'),
(12, 30, 'House', '8b12b41f403078d81f660e7eb422d191.jpg', 150000, 'Dhaka', 'Mayor', '2018-06-29 08:18:36', '2018-06-29 08:18:36'),
(13, 28, 'Candle', '5cb6ba607a0c8da466cbe523a06ac784.jpg', 123400, 'Dhaka', 'chairman', '2018-06-29 11:50:43', '2018-06-29 11:50:43'),
(14, 41, 'Rose', 'b0513378fa80f01977b2e244cbdd1d3e.jpg', 170000, 'Dhaka', 'chairman', '2018-06-29 11:52:40', '2018-12-10 14:32:32'),
(15, 27, 'telescope', '20ee1a5ee2d6489ab539ecd7be7bf7f5.jpg', 21000, 'Dhaka', 'Mayor', '2018-06-29 11:58:38', '2018-12-10 14:28:42'),
(16, 17, 'Onion', 'bc570bbef898ef38d0b2063dbe04c8bc.jpg', 123000, 'Dhaka', 'member', '2018-09-11 22:07:57', '2018-09-11 22:07:57'),
(17, 38, 'Camera', '4aa0569a8da67039643bbb538bc42a54.jpg', 35000, 'mirpur', 'chairman', '2018-12-10 14:25:55', '2018-12-10 14:25:55'),
(18, 42, 'telescope', '9a5dde2a6253f5c4aa2342d652e0199f.jpg', 220000, 'Dhaka', 'chairman', '2018-12-10 14:57:31', '2018-12-10 14:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_user`
--

CREATE TABLE `candidate_user` (
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_user`
--

INSERT INTO `candidate_user` (`candidate_id`, `user_id`, `type`) VALUES
(1, 3, 'chairman'),
(11, 6, 'chairman'),
(3, 10, 'Mayor'),
(5, 12, 'chairman'),
(7, 9, 'chairman'),
(4, 9, 'mayor'),
(14, 32, 'chairman'),
(10, 41, 'chairman'),
(11, 41, 'member'),
(9, 41, 'Mayor'),
(10, 38, 'chairman'),
(10, 1, 'chairman');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_08_035812_laratrust_setup_tables', 2),
(4, '2018_05_08_042053_create_candidates_table', 3),
(5, '2018_05_09_050422_candidate_user', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$3aFJTwRl1J1rzoEO.VibSOKuhGsrTh0bJpozhUV921xmGeErybrki', '2018-05-14 00:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, '2018-05-07 22:13:59', '2018-05-07 22:13:59'),
(2, 'candidate', NULL, NULL, '2018-05-07 22:14:14', '2018-05-07 22:14:14'),
(3, 'voter', NULL, NULL, '2018-05-07 22:14:20', '2018-05-07 22:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'male',
  `nid` varchar(20) NOT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `father_name` varchar(191) NOT NULL,
  `mother_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `present_division` varchar(191) NOT NULL,
  `present_district` varchar(191) NOT NULL,
  `present_upazilla` varchar(191) NOT NULL,
  `present_village` varchar(191) NOT NULL,
  `present_po` varchar(191) NOT NULL,
  `present_pc` varchar(191) NOT NULL,
  `permanent_division` varchar(191) NOT NULL,
  `permanent_district` varchar(191) NOT NULL,
  `permanent_upazilla` varchar(191) NOT NULL,
  `permanent_village` varchar(191) NOT NULL,
  `permanent_po` varchar(191) NOT NULL,
  `permanent_pc` varchar(191) NOT NULL,
  `religion` varchar(191) NOT NULL,
  `marital` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `blood` varchar(4) NOT NULL,
  `occupation` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `nid`, `birthday`, `father_name`, `mother_name`, `email`, `password`, `present_division`, `present_district`, `present_upazilla`, `present_village`, `present_po`, `present_pc`, `permanent_division`, `permanent_district`, `permanent_upazilla`, `permanent_village`, `permanent_po`, `permanent_pc`, `religion`, `marital`, `gender`, `blood`, `occupation`, `mobile`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'male.jpg', '11111111111111', '1989-12-31 18:00:00', 'FName', 'MName', 'admin@admin.com', '$2y$10$gdw3tWMd/kRb4VYOfoS.SuPPwdpSIQ69y/FstLGWNrssjbBh4dj36', 'Dhaka', 'Dhaka', 'Mirpur-2', 'Rupnagar R/A', 'Mirpur', '1216', 'Dhaka', 'Dhaka', 'Mirpur-2', 'Rupnagar R/A', 'Mirpur', '1216', 'Islam', '0', '0', 'A+', 'Student', '01711111111', 1, '4BvabHtYpJptSyPEr1LFDEt9MlCCJrZfmJqYbMRStYQzSlhHvXMLtSmJAMsR', '2018-05-04 15:48:48', '2018-12-10 13:52:05'),
(9, 'Shah Md. Sultan', 'ca3297d7482a4593b0aae1aff5eb9d36.jpg', '19953918531000346', '1995-02-02 18:00:00', 'Amzad Hosasin', 'Jasmin Akter', 'shahed0096@gmail.com', '$2y$10$ftuW5Rge.jCeIR3WD15AruWde6oCmDP6ifNfpWeKp.9rJnAPqsE5K', 'Dhaka', 'Dhaka', 'Mirpur-2', 'Rupnagar R/A', 'Mirpur', '1216', 'Dhaka', 'Jamalpur', 'Sarishabari', 'Charhatbari', 'Kuthirhat', '2055', 'Muslim', '0', '0', 'A+', 'Student', '01717401833', 1, 'Dm2Z4OOWsNl8sRCMJFmxL5jgTQzPMbPCFyEmSFibUeWvixVBIc62Ur4SZrFv', '2018-05-26 03:16:39', '2018-05-26 03:38:28'),
(10, 'Md. Shipon Miah', '2f24bfe9da418dd71ad1805da7271a2c.jpg', '19953918531000385', '1995-10-19 18:00:00', 'Md. Rais Uddin', 'Monowara Begum', 'shipon.cse.bubt@gmail.com', '$2y$10$BHY6ZrA38b2JjyyE.HK2MuH1mXUcna72byrMfTIVUiqCfaLcqJ9/6', 'Dhaka', 'Dhaka', 'Mirpur', 'Rupnagar R/A', 'Mirpur', '1216', 'Dhaka', 'Tangail', 'Bhuapur', 'Deopur', 'Deopur', '1960', 'Muslim', '0', '0', 'B+', 'Student', '01785593460', 1, 'NBQVjkDKvvzbbZ3cjtuRq80XgL3OaIC6PR0KbqTI5zhKSS9J6k3wNbPqNGWb', '2018-05-26 03:23:28', '2018-05-26 03:31:42'),
(11, 'Md. Mazharul Hasan Sajeeb', '1ce302980d45c79eae0565258ef8c324.jpg', '19953918531003002', '1995-08-07 18:00:00', 'Father\'s Name', 'Mother\'s Name', 'sajeeb3002@gmail.com', '$2y$10$EkJdUuPrcEglAN4Sk5HLPejna7MTC2gi2BJHaVFQaxyGmvPj4XBvy', 'Dhaka', 'Dhaka', 'Mirpur', 'Mirpur-10', 'Mirpur-2', '1216', 'Dinajpur', 'Dinajpur', 'Dinajpur', 'Dinajpur', 'Dinajpur', '6600', 'Muslim', '0', '0', 'B+', 'Student', '01717401802', 1, 'aKCq4o1DHipbyx0R8QapDTMS71gY4ko1FokydHv8STJUtrrrE4Ikekw3zsEg', '2018-05-26 23:16:14', '2018-05-26 23:16:39'),
(12, 'Rifat Jahan', '706237f9b6a88e6b791b53a4528e019c.jpg', '19953918531000374', '2018-07-07 14:18:00', 'Amzad Hossain', 'Jasmin Amzad', 'shahed603@gmail.com', '$2y$10$.uqB7nM9JBnCxOwLFRT8ue4Np7RL6WZfKOO.fU6HnSDSIQ0K1SRLy', 'Dhaka', 'Gazipur', 'Gazipur Sador', 'Telipara', 'Gazipur Chowrasta', '1702', 'Dhaka', 'Jamalpur', 'Sarishabari', 'Charhatbari', 'Kuthirhat', '2055', 'Muslim', '0', '0', 'B+', 'Student', '01720830025', 1, 'l8bVtxPpPu1ZnPmYHOjgPCADNt9xZ0SxxFCvMxT4xLII9SwZIU7BWTeOMGqN', '2018-05-30 19:58:20', '2018-05-30 19:59:09'),
(13, 'Sazzad Hasan', 'f4e53f3f13ef32ffbc9b2f20ee4d0d95.jpg', '19950013142103011', '1996-04-01 18:00:00', 'Hosain Jobber', 'Amina Khatun', 'shahed.bsme@gmail.com', '$2y$10$RF4WtBXeQg/W.uR6vnMbieDgKFq3P2s2Su6I1UmWuPrXn.mTlZ6i.', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Shafipur', 'Shafipur', '1702', 'Dhaka', 'Gopalgonj', 'Tungipaara', 'Tungipaara', 'Kashiani', '8133', 'Muslim', '0', '0', 'AB+', 'Student', '01724331460', 1, 'y0tpNQRahfN0WuPUunecRQBCexgpMxPx9UAqSliBJIxAQJTxG5leRK4amNNO', '2018-06-06 04:02:17', '2018-06-06 04:02:43'),
(14, 'Farna Shafrina', '73f3d27412fb26c78b3cebda7e11a695.jpg', '19953918531003047', '1995-06-07 18:00:00', 'Abdul Habib', 'Amina Khatun', 'shafrina.cse@gmail.com', '$2y$10$.U0mwk.CRUxj6XP1rRbP4ekFgT7/8eI.M5Hhv/kUobQNAsys05NOm', 'Dhaka', 'Dhaka', 'Mirpur', 'Mirpur-2,Dhaka-1216.', 'Mirpur', '1216', 'B.Baria', 'B.Baria Sadar', 'Ksaba', 'Ksaba Para', 'Ksaba Para', '3400', 'Muslim', '0', '1', 'B+', 'Student', '01717403047', 1, 't3tAbBcD4p9rvdXahnyzTQ1YUCzsjNFHMVcHQGciHKbroemeqt66WXKwotT3', '2018-06-26 01:58:04', '2018-06-26 01:58:33'),
(16, 'Rabaya Arby Rima', '40f4261f5a4b67b7953e65da4c427739.jpg', '19953918531003049', '1996-06-04 18:00:00', 'Hosain Abdul', 'Aleya Akter', 'rabaya.cse@gamil.com', '$2y$10$btMoqqG/3Dfb4JwlqG8RTu/Pjr5ZAiskUJXQ2aLv4rSsQqcnl8wie', 'Dhaka', 'Dhaka', 'Mirpur', 'Mirpur-2', 'Mirpur', '1216', 'Dinajpur', 'Dinajpur', 'Dinajpur', 'Dinajpur Keya', 'Kuthirhat', '7890', 'Muslim', '0', '0', 'A+', 'Student', '01717403049', 1, 'W4x1XoHBvT6cbuFSOOUODozBEBATP9TVzXagMtGZQxZRq47WtgTHaFuCGQqk', '2018-06-26 02:19:14', '2018-06-26 02:20:06'),
(17, 'Md. Anupam Hayat Shawon', 'a84fc916661724ee2172da665290c0e6.jpg', '19953918531003087', '2018-06-07 14:18:00', 'Hosain Ali', 'Nila Begum', 'anupam.cse@gmail.com', '$2y$10$XmMuQi8Hc5UgOlAc0myUGuAnwho6QqKKJkFG702siT3j7oWv9Xb2C', 'Dhaka', 'Dhaka', 'Mirpur 2', 'Rupnagar R/A', 'Mirpur 2', '1216', 'Dinajpur', 'Dinajpur', 'Dinajpur', 'Sopnopori', 'Sopnopori', '7450', 'Muslim', '0', '0', 'B+', 'Student', '01717403087', 1, 'Hr7TOcfTXhPJZ7LdSvtK1AmiqtDQsn0Lt1oxKDVbYRxtUapLEA9VSojfPYr0', '2018-06-27 03:00:03', '2018-06-27 03:00:27'),
(18, 'Bulbul Ahmed', 'f1725d8cecb7386d1c1210580a721953.jpg', '19953918531003048', '1994-06-13 18:00:00', 'Siraj Ahmed', 'MIla Khan', 'bulbul.cse@gamil.com', '$2y$10$i9JdPPvg3ICJF3NgnapyoOSJXTQUsmOje0EmJ5hHmOuJOz27wf3.G', 'Dhaka', 'Dhaka', 'Mirpur', 'Rupnagar', 'Mirpur 2', '7890', 'Rajshahi', 'Natore', 'Natore Sadar', 'Pauklla', 'Pauklla', '7890', 'Muslim', '0', '0', 'B+', 'Student', '01717403048', 1, '9Ro2hqm9GLLkTYOBJbnwfubK4ff4qlwU6KcdKyOuCnOh4NzNodNaYy4VSqqF', '2018-06-29 06:37:58', '2018-06-29 07:46:18'),
(19, 'M.Z Sajeeb', '55cc4e56e54ef4c204963247e7aed873.jpg', '19953918531003040', '1995-05-10 18:00:00', 'Khan Bahadur', 'Aklima Khatun', 'sajeeb40@gmail.com', '$2y$10$NblIZnN0XJUB01tubAo9v.luDynd3icErYI1ewqcFLT9ZCPgfeDju', 'Dhaka', 'Dhaka', 'Mohammadpur', 'Mohammadpur', 'Adabor', '1210', 'Mymensingh', 'Kishoregonj', 'Kishoregonj', 'Bajitpur', 'Bajitpur', '3450', 'Muslim', '0', '0', 'A+', 'Student', '01717403040', 1, 'AXeaLDBg8USmjg4sFU8yEYFKMdtXNkthMQyRjXs4ZPOqGry2IpW7rodZzb9V', '2018-06-29 06:41:06', '2018-06-29 07:46:20'),
(20, 'F.R Shuvo', '2d669a8d8d022bee5f02c939b00fa82d.jpg', '19953918531003051', '1993-05-06 18:00:00', 'Khan Jamal', 'Mita Begum', 'shuvo.cse@gamil.com', '$2y$10$I74wzyLja/5F.ao416oFouigOuM26hJLs1PawKbvI//M/PLN3mJNO', 'Dhaka', 'Dhaka', 'Badda', 'Hazipara', 'Badda', '1230', 'Rajshahi', 'Bogra', 'Sherpur', 'Sathmatha', 'Sathmatha', '2230', 'Muslim', '0', '0', 'O+', 'Student', '01717403051', 1, 'QVKQzwkEHKCkzy5P1cZquDh7YR9JSTxlP9BV0k2JRoPvCEPoKhSKfMBinxVd', '2018-06-29 06:44:43', '2018-06-29 07:46:00'),
(21, 'M Rayhan', 'cc7a103589e814ae4b6c2c5c4efede90.jpg', '19953918531003052', '1994-07-20 18:00:00', 'Khan Rayhan', 'Aleya Begum', 'rayhan.cse@gmail.com', '$2y$10$l8hrM7wf3F4GKhoikRQaiOktoBt68g6Prha8CqiSvdiowiu3cZzSe', 'Dhaka', 'Dhaka', 'Mirpur 10', 'Kazipara', 'Sewarapara', '1216', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Safipur', 'Safipur Bazar', '7955', 'Muslim', '0', '0', 'O-', 'Student', '01717403052', 1, 'AtS7IZ9WobprYhTEeKDNlNfnX0gM6NJzBRAj6CbcmLdw4EYJFTz7WXSIlVdn', '2018-06-29 06:47:54', '2018-06-29 07:46:04'),
(22, 'U.S Sawon', '58046739bad744f8c11d177d56373c9a.jpg', '19953918531003062', '1995-07-27 18:00:00', 'Suruj Miah', 'Bilkis Begum', 'sawon62.cse@gmail.com', '$2y$10$/NcAlg0thSlYfKDnuiYH6e27eHHoPftofOaqmY7h2ZZ65vVe06CYe', 'Dhaka', 'Dhaka', 'Mirpur 2', 'Kollyanpur', 'Mirpur 2', '1216', 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Jorpukur', 'Joydevpur', '7092', 'Muslim', '0', '1', 'B+', 'Student', '01917403062', 1, 'KHuEMevMfhaSqSLotTezr7VLppK7nQ9DKy2W26zBohuLJ2csdas6e2y9J0rw', '2018-06-29 06:52:01', '2018-06-29 07:46:07'),
(23, 'Laboni Akter', '73200191a3a542e039beda8ceeff5fe3.jpg', '19953918531003061', '1994-08-24 18:00:00', 'Monju Ahmed', 'Rokeya Khtun', 'laboni.cse@gmail.com', '$2y$10$Z9wfX7nMvq/3YhPbHfvhSuOowrluWVxTgHZP/g0I01XyH3ogPND9C', 'Dhaka', 'Dhaka', 'Pallabi', 'Senpara', 'Pallabi', '1216', 'Dhaka', 'Gopalgonj', 'Mokhsedpur', 'Mayapur', 'Moksedpur', '6790', 'Muslim', '1', '1', 'AB+', 'House Wife', '01617403061', 1, 'EjcKj5htJvi9NJqdE2uD6BNe5UY6EZwhmIOtzArww51sKybiUca878E4KsMd', '2018-06-29 06:56:31', '2018-06-29 12:22:15'),
(24, 'Hafizul Alom', 'c719b9942b1c73df2911f61c292ef647.jpg', '19953918531003063', '1993-04-06 18:00:00', 'Limon Hossain', 'Sonia Akter', 'hafiz.cse@gmail.com', '$2y$10$SgBiGwMgNc7YrBavQiLSC.MNVWKr6IziPnguVs.kwyUUsONsEsnI2', 'Dhaka', 'Dhaka', 'Pallabi', 'Mirpur Siramic Moor', 'Pallabi', '1216', 'Rajshahi', 'Bogra', 'Bogra Sadar', 'Gosaibari', 'Gosaibari', '5880', 'Muslim', '0', '0', 'B+', 'Intern', '01517403063', 1, 'QBt94xXgt80YgerVrXiqQKQKVrUqMaFCP1A43arwuCikqF9eVnTNbQEt29bZ', '2018-06-29 07:02:05', '2018-06-29 12:22:17'),
(25, 'Saiful Islam', 'edd80a35c6b89ae95c5f25be92e025c2.jpg', '19953918531003064', '1993-06-24 18:00:00', 'Bablu Sarkar', 'Nargis Akter', 'saiful.cse@gmail.com', '$2y$10$F7wvN93Y1YbMcRq2V6au9.e4BggM9ucLeLV3NlhWyvzKAS5nQB3cm', 'Dhaka', 'Dhaka', 'Mirpur 2', 'Chowdury Para', 'Mirpur 2', '12216', 'Barishal', 'Patuakhali', 'Patuakhali', 'Bukkhinagar', 'Bukhinagar', '8200', 'Muslim', '0', '0', 'B+', 'Student', '01617403064', 1, 'Obak8yhS9d3BGsOT8MDa4iAHcVDRv4l2pQXc0aUejspR69kZkraPTXHBmUq5', '2018-06-29 07:06:21', '2018-06-29 07:46:24'),
(26, 'Sabrina Sama', '16f4d02771488fb2b5011dc4e4ffef30.jpg', '19953918531003068', '1993-06-13 18:00:00', 'Yousuf Ali', 'Chamili Akter', 'sabrina.cse@gmail.com', '$2y$10$TLnHcyCsUjC0eKXOW9v4leOBnHh6hrrOK.srDfgSNV1kN8tvHMQpu', 'Dhaka', 'Dhaka', 'Mirpur 2', 'Senpara Porbata', 'Mirpur 2', '1216', 'Dhaka', 'Gopalgonj', 'Kaliakoir', 'Bariopara', 'Safipur Bazar', '1750', 'Muslim', '0', '1', 'AB+', 'Student', '01717403068', 1, 'BkJqqcI8ygb9ZgA50rzOELk7FuTU8db6KQiaNiGWAH0w8TR0SNRKWevEUyzo', '2018-06-29 07:11:48', '2018-06-29 07:45:56'),
(27, 'Nipa Sarkar', '1f825b83b9f7c71af8d2b635556334c0.jpg', '19953918531003077', '1995-05-16 18:00:00', 'Abdul Alim', 'Jahanara Begum', 'nipa.cse@gmail.com', '$2y$10$EApF9LcyuSStWGM55p7Tc.2NVreNDOf8WfLC6jzrJXWYFGx6pCGiu', 'Dhaka', 'Dhaka', 'Mirpur 2', 'Rupnagor R/A', 'Mirpur 2', '1216', 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Chandana Chowrasta', 'B.R.R', '1703', 'Muslim', '0', '1', 'A+', 'Student', '01717403077', 1, 'Z10y62OPPrqSuUjafGDKgvJptAHmjYcrfWcAfvy8i3KQiOxFJ26orm76Ykd9', '2018-06-29 07:16:28', '2018-06-29 07:46:28'),
(28, 'Shiman Hossain', 'c40a7ef6e3a632877b07858d584f984c.jpg', '19953918531003078', '1995-02-04 18:00:00', 'Ripon Miah', 'Taslima Akter', 'shiman.cse@gmail.com', '$2y$10$tgFKp5GCAGRc8dXApd.ebefuu8/eMd88UDie8U23h8alSxD88y6t6', 'Dhaka', 'Dhaka', 'Tejgoan', 'Malibagh', 'Khilgaon TSO', '1219', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Chaondra', 'Kaliakoir', '1750', 'Muslim', '0', '0', 'AB+', 'Student', '01916308184', 1, '71Ob2zBsLUZ4XZFP1LvUd1xnXjIEGzdsPOhytuL6OSwMnSAkkgR9gwZgF0fg', '2018-06-29 07:21:19', '2018-06-29 07:46:12'),
(29, 'Lopa Akter', '904a22db9d1a4205b8d5bddee54b3c30.jpg', '19953918531003081', '1995-06-14 18:00:00', 'Based Talukdar', 'Nilima Sarkar', 'lopa.cse@gmail.com', '$2y$10$g4TtMaryEcad3lWkkX6afuT0iAQMChHdi6XfUbxJ4vN7V2ENfhkP.', 'Dhaka', 'Faridpur', 'Boialmari', 'Rupatpat', 'Rupatpat', '7861', 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Ershadad Nagar', 'Ershadad Nagar', '1712', 'Muslim', '0', '1', 'B+', 'Student', '01717403081', 1, 'VV8B3sYFyX0oF3nnI3V7gZtVGUwqsuRm5UX1EBNUB7G8K19CACzvbdA3CXYx', '2018-06-29 07:26:41', '2018-06-29 07:46:31'),
(30, 'J.I Sourav', '446146cadc1ae3166f6bfbba809efb19.jpg', '19953918531003088', '1995-06-07 18:00:00', 'Shahin Miah', 'Trapa Begum', 'sourav.cse@gmail.com', '$2y$10$cq7xoUmPe3xK0uPTSYzW1Otp9bCDrrnEqH/pss.rQwJimyWS7nLo6', 'Rajshahi', 'Sirajgonj', 'Ullapara', 'Ullapara', 'Beluchi', '6760', 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Chayabithi', 'Joydevpur', '1702', 'Muslim', '0', '0', 'B+', 'Student', '01717403088', 1, 'tBGlxoYmnNPVZZHKuncqMTfWeUVLj5cUsNlB3LsDyfGX4sffR9jP8d5Kg7Z7', '2018-06-29 07:34:40', '2018-06-29 08:33:05'),
(31, 'Riyajul Islam', 'a8a55153abbdc2c939acedabdcad188a.jpg', '19953918531003090', '1994-06-16 18:00:00', 'Rubel Hossain', 'Happy Akter', 'abir.cse@gmail.com', '$2y$10$Fl.s8YYDWnr3Z7uHI9PECedUPJWoGMmf8rZmK.8F/Q6Uwc.1NZ4hu', 'Dhaka', 'Sirajganj', 'Sirajganj Sadar', 'Rashidabad', 'Rashidabad', '6702', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Sreefaltoli', 'Kaliakoir', '1750', 'Muslim', '0', '0', 'AB+', 'Student', '01717403090', 1, '4dmv9dnMYi97Je5i4SEwE9mWKfWuDHA9X0H8HKHBViui3W0s5LWoExbD0IhZ', '2018-06-29 07:38:02', '2018-06-29 12:22:20'),
(32, 'Tamana Jahid', '513aeeaab4d25b57ac0272fdaff37efb.jpg', '19953918531003137', '1995-06-08 18:00:00', 'Hasan Ali', 'Tara Banu', 'tamanna.cse@gmail.com', '$2y$10$3LxG3KAdsgGK/D4eVWi73OWfvw.utEHoizlmqbkQ.1Oel8IcFgfei', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Srefaltoili', 'Kaliakoir', '1750', 'Dhaka', 'Gazipur', 'Kaliakoir', 'Srefaltoili', 'Kaliakoir', '1750', 'Muslim', '0', '1', 'AB+', 'Student', '01717403137', 1, 'sjdTMruXqh0AQUq7mvtcEU6HLjIZI9nFwgZpKdS7qo4POiDUKdaqekjmQ9dl', '2018-06-29 07:40:53', '2018-06-29 07:46:35'),
(33, 'Md. Shafiqur Rahman', '046e4826fb37e8f642a1beb423626aea.jpg', '19953918531003139', '1995-06-07 18:00:00', 'Firoj Al-Mamun', 'Fatema Akter', 'nakib.cse@gmail.com', '$2y$10$hQO.PFpuptEUhLAzxlkASuokJ73HqUml9vcp9wXHV.zq6/oGiRzia', 'Barishal', 'Uzirpur', 'Shikarpur', 'Shikarpur', 'Shikarpur', '8224', 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'B.OF', 'B.O.F', '1703', 'Muslim', '0', '0', 'B+', 'Student', '01717403139', 1, '6LOCulacrjHOBekDA7WHqk7UfbYLnCPnGt1KeGy23Etskq8aMTvTIbQfWq0d', '2018-06-29 07:45:21', '2018-06-29 07:46:38'),
(34, 'Mr. Jaman', '123f1c22541692ea4a91af271b178f2e.jpg', '19953918531001001', '1994-06-07 18:00:00', 'Mr. Walid Khan', 'Mrs. Jenia Khan', 'user.1@gmail.com', '$2y$10$c7/NNy1P4c8ZgAlxvuSIg.UeSYbcbIGH6e/39/TyT7oldcADyWOGe', 'Dhaka', 'Dhaka', 'Uttara Model TwonTSO', 'Uttara Model TwonTSO', 'Uttara Model TwonTSO', '1230', 'Dhaka', 'Dhaka', 'Uttara Model TwonTSO', 'Uttara Model TwonTSO', 'Uttara Model TwonTSO', '1230', 'Muslim', '0', '0', 'B+', 'Business', '01717401001', 1, 'KrXMYJBpzqutAYJd2WSDZCRgRKe976GHetO8s6sB2EeEAwyTfXXxiG7A21Fi', '2018-06-29 12:12:56', '2018-06-29 12:14:23'),
(35, 'Khan Bahadur', 'b6204bfc1abda47d6956f3776ca08d03.jpg', '19953918531001002', '1993-06-13 18:00:00', 'Hosain Jobber', 'Nargis Akter', 'user.2@gmail.com', '$2y$10$GUX.NJ9hBonbgrekmupJUeqJFDifYc6HLtIfaQ0icswWb.so932hi', 'Dhaka', 'Dhaka', 'Banani TSO', 'Banani TSO', 'Banani TSO', '1213', 'Dhaka', 'Dhaka', 'Banani TSO', 'Banani TSO', 'Banani TSO', '1213', 'Muslim', '0', '0', 'AB+', 'Business', '01717401888', 1, 'lLzZ4TrwEjhijtZBwkEQIasc2EicDTOH2Gnh1lksKRogLLIt73IeJSKqBHki', '2018-06-29 12:18:01', '2018-12-12 03:00:05'),
(36, 'Mrs. Mollikca Akter', '550d27fa9eccb0a5503d3918966cbbc8.jpg', '19950013142103021', '1993-05-03 18:00:00', 'Hosain Ali', 'Nargis Nila', 'user.21@gmail.com', '$2y$10$AZ0068d6ImozfzOi3rEp0evjCfWqx8p2VAUcwDC/6vooCSuTtulHi', 'Dhaka', 'Dhaka', 'Gulshan Model Town', 'Gulshan Model Town', 'Gulshan Model Town', '1212', 'Dhaka', 'Dhaka', 'Gulshan Model Town', 'Gulshan Model Town', 'Gulshan Model Town', '1212', 'Muslim', '1', '1', 'B+', 'House Wife', '01717401821', 0, 'jxRJX3FVubIZDK5VGScjNMb5h9RyV9JS3mdwnJ1FcNQSCp6gWbZQhu1tAahp', '2018-06-29 12:21:18', '2018-06-29 12:21:18'),
(37, 'Mr. Habib Wahid', 'ac6937c0af3067a18455ae9d5c1ca9aa.jpg', '19950013142103015', '1993-05-31 18:00:00', 'Habibulla Bahar', 'Jahanara Chowdury', 'user@gmail.com', '$2y$10$gdw3tWMd/kRb4VYOfoS.SuPPwdpSIQ69y/FstLGWNrssjbBh4dj36', 'Dhaka', 'Dhaka', 'Khilkhet', 'KhilkhetTSO', 'KhilkhetTSO', '1229', 'Dhaka', 'Dhaka', 'Khilkhet', 'KhilkhetTSO', 'KhilkhetTSO', '1229', 'Muslim', '0', '0', 'A+', 'Services Man', '01717401815', 0, 'ASMwP3natF3RVMr3CmCD7vWsPmkSNct1qrKbZpSHjSfWl7ycKmA4LyVPeqw0', '2018-06-30 11:14:49', '2018-06-30 11:14:49'),
(38, 'saila', 'f8d23a3f900e6b8a6459573d01cf9aba.jpg', '19963000500020182', '1996-12-30 18:00:00', 'Omar Faruk', 'Fatema', 'saila@gmail.com', '$2y$10$..XSTaGKmtDL0XoWNa5k1OgdBWN41I8fwOoq2HaYhi/kUAuDPNWgq', 'dhaka', 'dhaka', 'mirpur', 'kafrul', 'kafrul', '1216', 'dhaka', 'dhaka', 'mirpur', 'kafrul', 'kafrul', '1216', 'Muslim', '0', '1', 'O+', 'Student', '01703030980', 1, '9glZoZLGmN6eaNii3apX536fENQiFnj5aVYJsXeCvIPXb49vDNOJpiP23tFj', '2018-12-10 14:01:26', '2018-12-10 14:23:01'),
(39, 'moriom', '115727babbf32041b1681f73e9e93914.jpg', '19962000400020181', '1996-12-30 18:00:00', 'Abu bakar Siddik', 'ayesha', 'moriom@gmail.com', '$2y$10$pBRa6osxGdqEsQjlNUfI1OTRW85Z41jQiqsgCKJTH6biXCVeKbCNS', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'Muslim', '0', '1', 'A+', 'Student', '01671234111', 1, 'xh0lxrXij2EgDJAB1D6ctyQfxyJsi06gnRwPsEb2icRE1PoONKlRV0pqWoe2', '2018-12-10 14:06:54', '2018-12-10 14:23:08'),
(40, 'atiya', '0f1cb5e9ce1abd39853f7e3cb1ef3a33.jpg', '19964000600020183', '1996-12-30 18:00:00', 'A k Azad', 'hosneara', 'atiya@gmail.com', '$2y$10$0UaWWNmze1NLDo7rxU4Kcek372Xs8cXQy8qxLDlUvR4yX1Wl7IBOm', 'dhaka', 'dhaka', 'mirpur', 'sheorapara', 'sheorapara', '1216', 'dhaka', 'dhaka', 'mirpur', 'sheorapara', 'sheorapara', '1216', 'Muslim', '0', '1', 'O+', 'Student', '01722803836', 1, 'VNmGaz2tj3C52wScOCVTHGtRU1izX3cvlU8h6ZNcsVgtksrgB4iNcBvE8Nq0', '2018-12-10 14:09:37', '2018-12-10 14:23:12'),
(41, 'avrojit', 'd2175daa0d4ee4851b5e0c400c13fa64.jpg', '19965000700020184', '1995-12-30 18:00:00', 'mrinmoy das', 'mala rani das', 'avrojit@gmail.com', '$2y$10$IG1R5qI3aOn2wxeDQVUX7eCGSu5F85XU6ZHaYbbZEbWyZuH55W6/K', 'dhaka', 'dhaka', 'Uttara', 'uttara', 'Uttara', '1230', 'dhaka', 'dhaka', 'Uttara', 'uttara', 'Uttara', '1230', 'Hindu', '0', '0', 'A+', 'Student', '01765721348', 1, 'VLsFaPCbrXYjng5neB59WGcRXjxE9LI4UpNoULeFHHlVApOoqsfma2Mwz7E9', '2018-12-10 14:15:15', '2018-12-10 14:23:17'),
(42, 'tasnova', 'b249b0f125e09c7f7b7d9f0758272192.jpg', '19966000800020185', '1996-12-30 18:00:00', 'azizul hakim', 'khadiza', 'tasnova@gmail.com', '$2y$10$4HLIPt5ZzwLwMRdwq2S5R.5DlJV0WVSm4f3Zml7pmr3KICVjIgzqW', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'Muslim', '0', '1', 'A+', 'Student', '01765701248', 1, 'z9NuF6WbKgiriR1JziL0TaklDorqBmIdUQagdWmZ20T6qyGebX6fJYt9svyh', '2018-12-10 14:18:28', '2018-12-10 14:39:48'),
(43, 'rafiKabir', '1849e2a71294c6522de4820f10b2115d.jpg', '19957000900020186', '1995-12-30 18:00:00', 'abdur rahman', 'hosneara', 'rafi@gmail.com', '$2y$10$MCx3PcXchcaxajDwokvPV.T7WPJsBlWzYpMjLoRLMZoJhFjzwx23e', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'dhaka', 'dhaka', 'mirpur', 'rupnagor', 'rupnagor', '1216', 'Muslim', '0', '0', 'O+', 'Student', '01722701248', 0, 'Q0CSH1OHHqHW5rCg3YmROTz4Xp9i8v1HIEOszJlPIhw7EmQbcvbVZhLCo8zi', '2018-12-10 14:22:25', '2018-12-10 14:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nid_unique` (`nid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
