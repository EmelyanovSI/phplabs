-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 23 2019 г., 12:05
-- Версия сервера: 5.6.13
-- Версия PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shoes` varchar(255) DEFAULT NULL,
  `number` int(11) unsigned DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `email3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `sale`
--

INSERT INTO `sale` (`id`, `shoes`, `number`, `date3`, `email3`) VALUES
(1, 'Туфли, Кроссовки, Тапки, Ботинки, Кроксы, Шлепки', 1, '2019-03-17', 'emelyanov@gmail.com'),
(2, 'Кроксы', 4, '2019-03-18', 'emelyanov@gmail.com'),
(3, 'Туфли, Кроссовки, Тапки, Ботинки, Кроксы, Шлепки', 1, '2019-03-17', 'emelyanov@gmail.com'),
(4, 'Кроксы', 4, '2019-03-18', 'emelyanov@gmail.com'),
(5, 'Кроксы', 6, '2019-05-29', 'emelyanov@gmail.com'),
(6, 'Кроксы', 1, '2019-05-20', 'emelyanov@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
