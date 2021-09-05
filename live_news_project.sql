-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 12:58 PM
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
-- Database: `live_news_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_post`) VALUES
(1, 'laravel', 2),
(4, 'python', 1),
(5, 'Java', 2),
(7, 'JavaScript', 1),
(8, 'Wordpess', 1),
(9, 'Freelancing', 1),
(11, 'Sass', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `post_catagory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `post_catagory`, `post_date`, `post_author`, `post_image`) VALUES
(6, 'Responsive Web Design', 'What is a Media Query?\r\nMedia query is a CSS technique introduced in CSS3.\r\n\r\nIt uses the @media rule to include a block of CSS properties only if a certain condition is true.                                                                                           ', '8', '17 Aug, 2021', 15, '1630620727-project-sample.png'),
(9, 'সফল ফ্রিল্যান্সার হতে গেলে যে যে বিপদ আসে ৩:', '৩/ গুগল হেল্প : \r\nগুগল থেকে কিছু বের করে নিয়ে আসার জন্য টিপসগুলো জেনে নেওয়া । কন্টেন্ট এর  ধরন নিয়ে ধারনা থাকা // বেসিক  এসইও জানা / কিওয়ারড নিয়ে ধারনা থাকলে সহজে সব খুজে পাবেন ।                                                                                                                        ', '4', '26 Aug, 2021', 15, '1630616530-240893448_369676477982866_1912287680745767390_n.jpg'),
(10, 'সফল ফ্রিল্যান্সার হতে গেলে যে যে বিপদ আসে ২:', '২/ ইউটিউব হেল্প :\r\nইউটিউব ভালো চ্যানেল খুজে পাওয়া, ইউটিউব থেকে শেখার সিস্টেম (কোডিং আর গান একসাথে না চালানো / ভালো কন্টেন্ট + আপডেট কন্টেন্ট বোঝা ) // ইউটিউব থেকে  স্টেপ বাই স্টেপ কাজ শেখার সিস্টেম জানা ।                                                                                                                                              ', '9', '29 Aug, 2021', 15, '1630616473-222571343_345549340395580_420852790861866709_n.jpg'),
(15, 'সফল ফ্রিল্যান্সার হতে গেলে যে যে বিপদ আসে ১:', '১/ কম্পিউটার সেটআপ : \r\nকম্পিউটার কেনা থেকে শুরু করে ( বাজেট / কনফিগারেশন ) // ব্রাউজার সাজানো ( এক্সটেনশন + লিংক সাজানো ) // কম্পিউটার ফোল্ডার সাজানো , সফটওয়্যার সাজানো ( মূল্যবান সফটওয়্যার খুজে বের করা যেটা সময় বাচায় এবং সেগুলো ভালো করে ব্যবহার করা শেখা ) |                                                                                ', '8', '02 Sep, 2021', 15, '1630616310-241083682_371426737807840_1033206146141048696_n.jpg'),
(17, 'We Need To Know About Freelancing', '// কম্পিউটার ফোল্ডার সাজানো , সফটওয়্যার সাজানো ( মূল্যবান সফটওয়্যার খুজে বের করা যেটা সময় বাচায় এবং সেগুলো ভালো করে ব্যবহার করা শেখা ) |  ইউটিউব হেল্প :\r\nইউটিউব ভালো চ্যানেল খুজে পাওয়া, ইউটিউব থেকে শেখার সিস্টেম (কোডিং আর গান একসাথে না চালানো / ভালো কন্টেন্ট + আপডেট কন্টেন্ট বোঝা ) // ইউটিউব থেকে  স্টেপ বাই স্টেপ কাজ শেখার সিস্টেম জানা ।                      ', '7', '04 Sep, 2021', 15, '1630756898-buyer_req.png'),
(19, 'We need to learn about technology', '// কম্পিউটার ফোল্ডার সাজানো , সফটওয়্যার সাজানো ( মূল্যবান সফটওয়্যার খুজে বের করা যেটা সময় বাচায় এবং সেগুলো ভালো করে ব্যবহার করা শেখা ) |  ইউটিউব হেল্প :', '5', '05 Sep, 2021', 15, '1630803427-22.png'),
(20, 'কম্পিউটার ফোল্ডার সাজানো , সফটওয়্যার সাজানো', '// কম্পিউটার ফোল্ডার সাজানো , সফটওয়্যার সাজানো ( মূল্যবান সফটওয়্যার খুজে বের করা যেটা সময় বাচায় এবং সেগুলো ভালো করে ব্যবহার করা শেখা ) |  ইউটিউব হেল্প :                                              ', '1', '05 Sep, 2021', 15, '1630804076-buyer_req.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(4, 'Freelancer ', 'shakil', 'Shakil_PHP', 'de2840b78f03dd00ae3366c8dee04755', 1),
(6, 'shakil', 'islam', 'php_shakil', 'cc51b236f50bddf222efecc1c37cd02f', 0),
(8, 'Sabbir', 'Rahman', 'Sabbir_Laravel', '8c3e3b3b051964deb53bf118f9682ca9', 1),
(10, 'Sarika', 'islam', 'sarika_woocommerce', '2017d6f88b0ae8769b1d4ab1fb3504f7', 0),
(11, 'Freelancer', 'shakil', 'wpthemedev_shakil', 'f7bd17cea9275c449c2ef1cdac60eb8c', 0),
(12, 'Munna', 'Wordpress', 'elem_expert_munna', 'b73e95499cd02b4148b2952256fa2dec', 1),
(13, 'pagination', 'new', 'pagination', '92524d1fab3b955f5bbde330b22c95b5', 0),
(15, 'shakil', 'islam', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(16, 'moderator', 'khan', 'moderator', '0408f3c997f309c03b08bf3a4bc7b730', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
