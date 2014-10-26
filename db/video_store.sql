-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 26 2014 г., 00:28
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

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getFilmsByProducer`(IN `id` INT)
    NO SQL
    DETERMINISTIC
select 
f.name_film as film_name,
s.name as studio_name,
p.name as producer_name
from produser as p
inner join films as f on p.id=f.firstname_name_produser_id
inner join studio as s on s.id = f.studio_id
where p.id=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `countres`
--

CREATE TABLE IF NOT EXISTS `countres` ( -- countries
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `ganre_id` int(11) NOT NULL,
  `duration` time NOT NULL,
  `year_of_publication` date NOT NULL,
  `budget` float NOT NULL,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ganre_id` (`ganre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `name`, `ganre_id`, `duration`, `year_of_publication`, `budget`, `delivery_date`) VALUES
(3, 'форсаж 4', 0, '00:00:02', '2014-10-01', 20000000, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `ganres`
--

CREATE TABLE IF NOT EXISTS `ganres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ganre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `ganre` (`ganre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `ganres_films`
--

CREATE TABLE IF NOT EXISTS `ganres_films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ganre_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `ganre_id` (`ganre_id`,`film_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `producers`
--

CREATE TABLE IF NOT EXISTS `producers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` char(40) NOT NULL,
  `name` char(40) NOT NULL,
  `year_of_birth` year(4) NOT NULL,
  `year_of_death` year(4) DEFAULT NULL,
  `nationality_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nationality` (`nationality_id`),
  KEY `nationality_id` (`nationality_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `producers`
--

INSERT INTO `producers` (`id`, `last_name`, `name`, `year_of_birth`, `year_of_death`, `nationality_id`) VALUES
(1, 'Дудка', 'Іван', 1994, 0000, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `producers_films`
--

CREATE TABLE IF NOT EXISTS `producers_films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) NOT NULL,
  `produсer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `film_id_2` (`produсer_id`),
  KEY `produсer_id` (`produсer_id`),
  KEY `produсer_id_2` (`produсer_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `studios`
--

CREATE TABLE IF NOT EXISTS `studios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` char(40) NOT NULL,
  `address` char(100) NOT NULL,
  `postcode` char(100) NOT NULL,
  `contact_person` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `studios`
--

INSERT INTO `studios` (`id`, `name`, `country_id`, `city`, `address`, `postcode`, `contact_person`) VALUES
(1, '20 століття фох', 0, 'Нью-йорк', 'Головна', '15165', 'Погурський Олег');

-- --------------------------------------------------------

--
-- Структура таблицы `studios_films`
--

CREATE TABLE IF NOT EXISTS `studios_films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `film_id` (`film_id`),
  KEY `studio_id` (`studio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ganres_films`
--
ALTER TABLE `ganres_films`
  ADD CONSTRAINT `ganres_films_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`ganre_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ganres_films_ibfk_2` FOREIGN KEY (`ganre_id`) REFERENCES `ganres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `producers_films`
--
ALTER TABLE `producers_films`
  ADD CONSTRAINT `producers_films_ibfk_2` FOREIGN KEY (`produсer_id`) REFERENCES `producers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producers_films_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `studios_films`
--
ALTER TABLE `studios_films`
  ADD CONSTRAINT `studios_films_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studios_films_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
