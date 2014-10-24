-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2014 г., 11:18
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `video_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_produser` text NOT NULL,
  `name_director_produser` text NOT NULL,
  `name_film` text NOT NULL,
  `ganre` text NOT NULL,
  `duration` text NOT NULL,
  `publication_year` date NOT NULL,
  `budget` float NOT NULL,
  `studio` int(11) NOT NULL,
  `date_delivery_on_depositoriy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `produser`
--

CREATE TABLE IF NOT EXISTS `produser` (
  `produser_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(40) NOT NULL,
  `name` char(40) NOT NULL,
  `year_of_birth` int(4) NOT NULL,
  `year_of_death` int(4) NOT NULL,
  `nationality` char(50) NOT NULL,
  PRIMARY KEY (`produser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `studio`
--

CREATE TABLE IF NOT EXISTS `studio` (
  `studio_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `country` char(40) NOT NULL,
  `city` char(40) NOT NULL,
  `street` char(100) NOT NULL,
  `house` char(20) NOT NULL,
  `post_index` char(30) NOT NULL,
  `dealer` char(50) NOT NULL,
  PRIMARY KEY (`studio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
