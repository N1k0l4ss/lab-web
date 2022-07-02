-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2022 at 07:10 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `image`, `title`, `creator`, `date`, `content`) VALUES
(1, 'food', 'https://adelaidefoodcentral.files.wordpress.com/2017/11/a0115.jpg', 'Healthy salad', 'Nikita', '2022-07-02 18:07:38', 'There is no substitute for a plate full of veggies dressed in something spectacular, and that\'s just what this salad offers. Motivated by the warm fall weather we\'ve been having, I decided to toss together a bunch of my favorite veggies and deck them out in a dressing that is as blissful as it is tasty. With some brief chopping and processing, I had the above whipped up in just 20 minutes. Better yet, I stored the leftover chopped ingredients in containers so that I could put this special salad together in the blink of an eye throughout the week.'),
(2, 'sport', 'https://ychef.files.bbci.co.uk/1376x774/p07phq4b.jpg', 'Sport in your life', 'NIKITA', '2022-07-01 15:07:38', 'Sports have an immense impact on a person’s daily life and health. They do not just give you an interesting routine but also a healthy body. Getting indulged in physical activities like sports improves your heart function, reduces the risks of diabetes, controls blood sugar, and lowers tension and stress levels. It also brings positive energy, discipline, and other commendable qualities to your life. Playing sports strengthens your body and also improves your muscle memory and muscle coordination. Primary health care doctors recommend taking part in sports on a regular basis. There are countless benefits of sports; some of them are here for you.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
