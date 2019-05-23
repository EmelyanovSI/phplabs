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
-- Структура таблицы `rang`
--

CREATE TABLE IF NOT EXISTS `rang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `manufacturer1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `price1` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `rang`
--

INSERT INTO `rang` (`id`, `name1`, `manufacturer1`, `site1`, `date1`, `price1`) VALUES
(1, 'Тапочки', 'Puma', 'http://bukinshoes.ru', '2019-05-17', 1210),
(2, 'Туфли', 'Nike', 'http://bukinshoes.ru', '2019-05-18', 1210),
(3, 'Кросы', 'Adidas', 'http://bukinshoes.ru', '2019-05-18', 6050),
(4, 'Тапочки', 'Puma', 'http://bukinshoes.ru', '2019-05-09', 6050);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
