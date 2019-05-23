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
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nomer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `udobstva` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pol` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `doc`, `nomer`, `udobstva`, `pol`) VALUES
(1, 'Сергей', 'Оплачено', 'Одноместный', 'Интернет', 'Мужской'),
(2, 'Сергей', 'Оплачено', 'Одноместный', 'Интернет', 'Мужской'),
(7, 'Иванов Иван ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(8, 'Иванов Иван ', 'Анкета ', 'Одноместный', 'Интернет ', 'Мужской '),
(9, 'Иванов Иван ', 'Анкета Паспорт ', 'Четырехместный', 'Кондиционер Телевизор Сейф Интернет ', 'Мужской '),
(10, 'Иванов Иван ', 'Анкета ', 'Одноместный', 'Интернет ', 'Мужской Мужской '),
(11, 'Иванов Иван ', 'Анкета ', 'Одноместный', 'Интернет ', 'Мужской Мужской '),
(12, '', '', '', '', ''),
(13, '', '', '', '', ''),
(14, 'аванов', 'рпувкр', 'вакрувр', 'курфукр', 'вкарукр'),
(15, 'аванов', 'рпувкр', 'вакрувр', 'курфукр', 'вкарукр'),
(16, 'жванов', 'укргыу', 'егрфукер', 'уеруер', 'уеруеруе'),
(17, 'жванов', 'укргыу', 'егрфукер', 'уеруер', 'уеруеруе'),
(18, 'яванов', 'цепукпн', 'укпнук', 'укукук', 'укрпуцкпр'),
(19, 'яванов', 'цепукпн', 'укпнук', 'укукук', 'укрпуцкпр'),
(20, 'Иванов Иван ', 'Анкета Паспорт ', 'Двуместный', 'Кондиционер Телевизор Сейф Интернет ', 'Мужской '),
(21, 'Иванов Иван ', 'Анкета Паспорт ', 'Трехместный', 'Кондиционер Телевизор Сейф Интернет ', 'Мужской Мужской '),
(22, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(23, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(24, 'Иванов Сергей ', 'Анкета Паспорт ', 'Двуместный', 'Кондиционер Телевизор Сейф Интернет ', 'Мужской '),
(25, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(26, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(27, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(28, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(29, 'Емельянов Сергей ', 'Анкета ', 'Одноместный', '', 'Мужской '),
(30, 'Емельянов Сергей ', '', 'Одноместный', 'Телевизор ', 'Мужской ');

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
