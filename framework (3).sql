-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 10:57 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `film_desc` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`film_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `name`, `country`, `genre`, `duration`, `director`, `date`, `actors`, `film_desc`, `image`, `video`, `created_at`) VALUES
(28, 'Dunkirk', 'USA', 'Action', '106', 'Christopher Nolan', '2017-08-10', 'Cilian Merphy', 'During World War II, soldiers from the British Empire, Belgium and France try to evacuate from the town of Dunkirk during a arduous battle with German forces.', '19f8d736839ef9864f71041b87ec1489.jpg', '02cd68fdd3cb018add5f0ce6b03e7613.jpg', '2022-08-26 19:47:33.308740'),
(18, 'The Dark Knight', 'USA', 'Action/Adventure', '152', 'Christopher Nolan', '2008', 'Christian Bale', 'After Gordon, Dent and Batman begin an assault on Gotham\'s organised crime, the mobs hire the Joker, a psychopathic criminal mastermind who offers to kill Batman and bring the city to its knees.', '262bcc1ed7c7533c514db47a3a1ad36f.jpg', '262bcc1ed7c7533c514db47a3a1ad36f.jpg', '2022-07-26 09:59:59.193815'),
(19, 'Once Upon a Time in... Hollywood', 'USA', 'Action', '181', 'Quentin Tarantino', '', 'Brad Pitt', 'A faded television actor and his stunt double strive to achieve fame and success in the final years of Hollywood\'s Golden Age in 1969 Los Angeles.', '46ae8119c4f68eea99e479ba4f682678.jpg', '46ae8119c4f68eea99e479ba4f682678.jpg', '2022-07-28 08:36:33.872212'),
(29, 'Inglourious Basterds', 'USA', 'War', '153', 'Quentin Tarantino', '2009-08-23', 'Christoph Waltz', 'A few Jewish soldiers are on an undercover mission to bring down the Nazi government and put an end to the war. Meanwhile, a woman wants to avenge the death of her family from a German officer.', '56df79d80c19b9b5885da8dffc938305.jpg', 'acb13bbe66198f3e65cf16eb4506676c.jpg', '2022-08-26 19:49:55.506459'),
(30, 'The Hateful Eight', 'USA', 'Drama', '187', 'Quentin Tarantino', '2015-08-09', 'Tim Roth', 'A bounty hunter and his captured fugitive are caught in the middle of a snowstorm. They seek refuge at a small lodge and encounter a twisted turn of events there.', 'd5afe2ad9a42c18b509f7d23ed6bbb2f.jpg', 'e5d5073a545d90b3894f77eb36b8833b.jpg', '2022-08-26 19:52:28.761520');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `age`, `gender`) VALUES
(4, 'Maneh', 'hak', 'man.hakobjanyan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 17, 'female'),
(3, 'Maneh', 'Hakobjanyan', 'man.hakobjanyan@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', 17, 'female'),
(5, 'Inglourious Basterds', 'kar', 'fdfd@as', 'a2550eeab0724a691192ca13982e6ebd', 17, 'female');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
