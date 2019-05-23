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
-- Структура таблицы `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name2` varchar(255) DEFAULT NULL,
  `number2` int(11) unsigned DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `tel2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `receipt`
--

INSERT INTO `receipt` (`id`, `name2`, `number2`, `date2`, `tel2`) VALUES
(1, 'Туфли', 1, '2019-03-17', '80447807658'),
(2, 'Кроссовки', 2, '2019-03-18', '80447807658'),
(3, 'Туфли', 1, '2019-03-17', '80447807658'),
(4, 'Кроссовки', 2, '2019-03-18', '80447807658'),
(5, 'Туфли', 1, '2019-05-17', '80447807658'),
(6, 'Шлепки', 4, '2019-05-22', '80447807658');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
