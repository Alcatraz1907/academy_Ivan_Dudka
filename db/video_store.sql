-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2014 г., 17:35
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
  `firstname_name_produser_id` int(11) NOT NULL,
  `name_film` char(50) NOT NULL,
  `ganre` char(50) NOT NULL,
  `duration` char(50) NOT NULL,
  `publication_year` date NOT NULL,
  `budget` float NOT NULL,
  `studio_id` int(11) NOT NULL,
  `date_delivery_on_depositoriy` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `studio_id` (`studio_id`),
  KEY `firstname_name_produser_id` (`firstname_name_produser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `firstname_name_produser_id`, `name_film`, `ganre`, `duration`, `publication_year`, `budget`, `studio_id`, `date_delivery_on_depositoriy`) VALUES
(3, 1, 'форсаж 4', 'бойовик', '2', '2014-10-01', 20000000, 1, '1652');

-- --------------------------------------------------------

--
-- Структура таблицы `produser`
--

CREATE TABLE IF NOT EXISTS `produser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(40) NOT NULL,
  `name` char(40) NOT NULL,
  `year_of_birth` int(4) NOT NULL,
  `year_of_death` int(4) NOT NULL,
  `nationality` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `produser`
--

INSERT INTO `produser` (`id`, `first_name`, `name`, `year_of_birth`, `year_of_death`, `nationality`) VALUES
(1, 'Дудка', 'Іван', 1994, 0, 'українець');

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
-- Ограничения внешнего ключа таблицы `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`),
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`firstname_name_produser_id`) REFERENCES `produser` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
