-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2014 г., 21:11
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
-- Структура таблицы `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_name` char(50) NOT NULL,
  `ganre` char(50) NOT NULL,
  `duration` char(50) NOT NULL,
  `publication_year` date NOT NULL,
  `budget` float NOT NULL,
  `date_delivery_on_depositoriy` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `film_name`, `ganre`, `duration`, `publication_year`, `budget`, `date_delivery_on_depositoriy`) VALUES
(3, 'форсаж 4', 'бойовик', '2', '2014-10-01', 20000000, '1652');

-- --------------------------------------------------------

--
-- Структура таблицы `producer`
--

CREATE TABLE IF NOT EXISTS `producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(40) NOT NULL,
  `name` char(40) NOT NULL,
  `year_of_birth` int(4) NOT NULL,
  `year_of_death` int(4) DEFAULT NULL,
  `nationality` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `producer`
--

INSERT INTO `producer` (`id`, `first_name`, `name`, `year_of_birth`, `year_of_death`, `nationality`) VALUES
(1, 'Дудка', 'Іван', 1994, 0, 'українець');

-- --------------------------------------------------------

--
-- Структура таблицы `relation_film_producer`
--

CREATE TABLE IF NOT EXISTS `relation_film_producer` (
  `film_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  UNIQUE KEY `film_id` (`film_id`),
  UNIQUE KEY `producer_id` (`producer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `relation_film_studio`
--

CREATE TABLE IF NOT EXISTS `relation_film_studio` (
  `film_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  UNIQUE KEY `film_id` (`film_id`,`studio_id`),
  KEY `studio_id` (`studio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `studio`
--

CREATE TABLE IF NOT EXISTS `studio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `country` char(40) NOT NULL,
  `city` char(40) NOT NULL,
  `street` char(100) NOT NULL,
  `house` char(20) NOT NULL,
  `post_index` char(30) NOT NULL,
  `dealer` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `studio`
--

INSERT INTO `studio` (`id`, `name`, `country`, `city`, `street`, `house`, `post_index`, `dealer`) VALUES
(1, '20 століття фох', 'США', 'Нью-йорк', 'Головна', '3', '15165', 'Погурський Олег');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `relation_film_producer`
--
ALTER TABLE `relation_film_producer`
  ADD CONSTRAINT `relation_film_producer_ibfk_4` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_film_producer_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `relation_film_studio`
--
ALTER TABLE `relation_film_studio`
  ADD CONSTRAINT `relation_film_studio_ibfk_4` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_film_studio_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
