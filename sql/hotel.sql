-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 18 2019 г., 21:01
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(21, 'Иванов Иван ', 'Анкета Паспорт ', 'Трехместный', 'Кондиционер Телевизор Сейф Интернет ', 'Мужской Мужской ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;