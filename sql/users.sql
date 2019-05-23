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
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `secname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rights` int(11) NOT NULL,
  `blockdate` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `secname`, `age`, `email`, `rights`, `blockdate`) VALUES
(1, 'admin', 'c6610c8c237449b283278827e63aa9d9', 'Сергей', 'Емельянов', 19, 'emelyanov@gmail.com', 1, 1558610659),
(2, 'user', '35d3667416ce4c977de46e2ea17925f1', 'Иван', 'Иванов', 30, 'ivanov@gmail.com', 0, 0),
(5, 'useruser', '059b4907e73149fa50436ff592924ce3', 'Сергей', 'Емельянов', 18, 'me@gmail.com', 0, 0),
(7, 'qwerty', '54ab4e22e5b4f23ea132b4f6fd9f6633', 'Игорь', 'Емельянов', 40, '', 0, 0),
(9, 'this', '38b05f8e6b39401b10cd4b22b9efe24a', 'Макс', 'Корж', 25, '', 0, 1558611000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
