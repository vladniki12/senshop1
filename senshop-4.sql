-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Хост: 10.100.11.17:3306
-- Время создания: Дек 12 2017 г., 12:47
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `senshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `123`
--

CREATE TABLE IF NOT EXISTS `123` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is` tinyint(1) NOT NULL,
  `is1` tinyint(1) NOT NULL,
  `is2` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(255) NOT NULL,
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `material_name` (`material_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `material_storage`
--

CREATE TABLE IF NOT EXISTS `material_storage` (
  `material_storage_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_type` int(11) NOT NULL,
  `material_count` float NOT NULL,
  PRIMARY KEY (`material_storage_id`),
  UNIQUE KEY `material_type` (`material_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` text,
  `master_id` int(11) DEFAULT NULL,
  `in_cart` tinyint(4) NOT NULL DEFAULT '0',
  `completed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `order_fk0` (`customer_id`),
  KEY `order_fk1` (`product_id`),
  KEY `order_fk2` (`master_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `product_id`, `description`, `master_id`, `in_cart`, `completed`) VALUES
(87, 69, 24, NULL, 23, 0, 0),
(88, 69, 28, NULL, 23, 0, 1),
(89, 69, 30, NULL, 23, 0, 1),
(92, 79, 24, NULL, 65, 0, 1),
(93, 79, 30, NULL, 65, 0, 0),
(94, 79, 27, NULL, 65, 0, 1),
(96, 79, 26, NULL, NULL, 1, 0),
(97, 79, 27, NULL, NULL, 1, 0),
(98, 69, 24, NULL, 23, 0, 0),
(99, 69, 26, NULL, 23, 0, 0),
(100, 69, 26, NULL, 23, 0, 0),
(101, 69, 26, NULL, 59, 0, 0),
(102, 69, 24, NULL, 0, 0, 0),
(105, 69, 24, NULL, 19, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_price` float NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_material` text NOT NULL,
  `product_description` text NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_type` (`product_type`),
  KEY `product_fk0` (`product_type`),
  KEY `product_type_2` (`product_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_price`, `product_name`, `product_image`, `product_type`, `product_material`, `product_description`) VALUES
(24, 6470, 'Кольцо с фианитами и родированием', '1.jpg', 1, 'Золото', 'Изделие: Кольцо с фианитами и родированием\r\nВес изделия: 2.08\r\nПроба: 585'),
(26, 7300, 'Кольцо с алмазной гранью и родированием', '2.jpg', 1, 'Золото', 'Изделие: Кольцо с алмазной гранью и родированием\r\nВес изделия: 2.47\r\nПроба: 585'),
(27, 7880, 'Кольцо с бриллиантами и алмазной гранью', '3.jpg', 1, 'Золото', 'Изделие: Кольцо с бриллиантами и алмазной гранью\r\nВес изделия: 1.80\r\nПроба: 585\r\nВставка: Бриллиант\r\nВес вставки: 0,0275; 0,0200; 0,0270\r\nДиаметр вставки: 1,0; 1,7; 1,5\r\nСтрана производитель: Россия'),
(28, 7780, 'Серьги с гранатом и фианитами', '4.jpg', 2, 'Золото', 'Изделие: Серьги с гранатом и фианитами\r\nВес изделия: 2.41\r\nПроба: 585\r\nВставка: Гранат\r\nДиаметр вставки: 8*6'),
(29, 6490, 'Серьги с алмазной гранью и родированием', '5.jpg', 2, 'Золото', 'Изделие: Серьги с алмазной гранью и родированием\r\nВес изделия: 2.26\r\nПроба: 585'),
(30, 6740, 'Серьги с фианитами и родированием', '6.jpg', 2, 'Золото', 'Изделие: Серьги с фианитами и родированием\r\nВес изделия: 2.24\r\nПроба: 585'),
(31, 7690, 'Крест с фианитами', '7.jpg', 3, 'Золото', 'Изделие: Крест с фианитами\r\nВес изделия: 2.52\r\nПроба: 585'),
(32, 9440, 'Крест ручная гравировка', '8.jpg', 3, 'Золото', 'Изделие: Крест ручная гравировкато\r\nВес изделия: 3.26\r\nПроба: 585'),
(33, 7560, 'Подвеска с бриллиантами', '9.jpg', 3, 'Золото', 'Изделие: Подвеска с бриллиантами\r\nВес изделия: 1.05\r\nПроба: 585'),
(34, 8760, 'Кольцо обручальное косы', '6b31cfb23d61bac8661673e07b5eea9d (1).jpg', 5, 'Золото', 'Изделие: Кольцо обручальное косы, премиум, 4 мм\r\nВес изделия: 3.00\r\nПроба: 585'),
(35, 1920, 'Браслет, плетение Ромб двойной', '10.jpg', 4, 'Серебро', 'Изделие: Браслет, плетение Ромб двойной\r\nВес изделия: 7.96\r\nПроба: 925\r\nСтрана производитель: Россия'),
(36, 9940, 'Золотая цепочка, плетение Тондо', '11.jpg', 4, 'Золото', 'Изделие: Золотая цепочка, плетение Тондо\r\nВес изделия: от 2.79\r\nПроба: 585'),
(38, 11000, 'Золотая цепочка, плетение Кобра', '12.jpg', 4, 'Золото', 'Изделие: Золотая цепочка, плетение Кобра\r\nВес изделия: от 3.33\r\nПроба: 585'),
(39, 7270, 'Кольцо обручальное с бриллиантами', '167499c86d14aa1b2754f3f8360c8b83 (1).jpg', 5, '', 'Изделие: Кольцо обручальное с бриллиантами, лимонным золочением и родированием Вес изделия: 1.98 Проба: 585 Вставка: Бриллиант Вес вставки: 0,0079; 0,0191; 0,0050 Диаметр вставки: 1,2; 0,95; 0,8'),
(41, 5630, 'Кольцо обручальное', 'b6d880ca2b84a75a1a37686b86fb1d3a.jpg', 5, 'Золото', 'Изделие: Кольцо обручальное с бриллиантами, лимонным золочением и родированием Вес изделия: 1.98 Проба: 585 Вставка: Бриллиант Вес вставки: 0,0079; 0,0191; 0,0050 Диаметр вставки: 1,2; 0,95; 0,8');

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`type_id`, `type_name`) VALUES
(1, 'Кольца'),
(3, 'Подвески'),
(5, 'Свадьба'),
(2, 'Серьги'),
(4, 'Цепи');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(255) NOT NULL,
  `user_login` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login` (`user_login`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_phone` (`user_phone`),
  UNIQUE KEY `user_surname` (`user_surname`),
  KEY `user_fk0` (`user_role`),
  KEY `user_login_2` (`user_login`),
  FULLTEXT KEY `user_role` (`user_role`),
  FULLTEXT KEY `user_surname_2` (`user_surname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `user_login`, `user_password`, `user_email`, `user_phone`, `user_name`, `user_surname`) VALUES
(0, '1', 'NovikovPavel143', '319482045d4a17548858730fb3491e74', 'NovikovPavel143@ya.ru', '8 (933) 602-93-12', 'Иван', 'Новиков'),
(15, '0', 'KukolevskayaValentina379', 'qIPT9cnNdJA8', 'KukolevskayaValentina379@gmail.com', '8 (964) 638-80-82', 'Валентина', 'Куколевская'),
(19, '1', 'TarskayaAgafya260', 'u6uASgsjyMjJ', 'TarskayaAgafya260@gmail.com', '8 (977) 655-95-45', 'Агафья', 'Тарская'),
(20, '1', 'LeontevStanislav27', 'EU0cfEljjszp', 'LeontevStanislav27@gmail.com', '8 (908) 345-86-24', 'Станислав', 'Леонтьев'),
(23, '1', 'OhotaAgnessa120', 'dc7d7f9d8deff9b853ee94598e7908b2', 'OhotaAgnessa120@mail.ru', '8 (974) 136-26-59', 'ВАгнесса', 'Охота'),
(24, '1', 'BelozerovaZoya309', '081d3d8f46463480771498dccc2a4d74', 'BelozerovaZoya309@ya.ru', '8 (970) 902-48-65', 'Марина', 'Белозёрова'),
(25, '1', 'KozlovaAleksandra20', 's2BcamKhCovz', 'KozlovaAleksandra20@gmail.com', '8 (952) 137-35-19', 'Александра', 'Козлова'),
(27, '1', 'kat', '3RussianDev', 'meow@yandex.ru', '8 (976) 657-87-95', 'Мальвина', 'Театралкина'),
(59, '1', 'vffvb', 'xcvcvb', 'fd@ya.ru', '8 (909)-090-70-89', 'Маша', 'Кузьмина'),
(65, '1', 'mefimenko212', '12345678', 'Shadow_1329@mail.ru', '9059881663', 'Michail', 'Efimenko'),
(66, '1', 'onevan@mail.ru', '1234', 'onevan@mail.ru', '89299992299', 'Ivanka', 'Ivanova'),
(69, '2', 'test_test', '12345678', 'sdfsdfsd', 'sdfsdfsdf', 'aaaa', 'aaaa'),
(78, '1', 'xcvcbfg', 'bcfgbnfgn', 'hhgf@ya.ru', '8 (976) 657-86-93', 'ммчс', 'чмсчсисми'),
(79, '2', 'marta_j', 'e2fd3ecb47752318d8602fde6946c5c9', 'marta_jons@ya.ru', '8 (972) 232-22-45', 'Марта', 'Джонс'),
(80, '0', 'admin', 'admin', 'admin', '123', 'admin', 'admin'),
(81, '1', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', ''),
(87, '2', 'ghbd', '827ccb0eea8a706c4c34a16891f84e7b', 'kiki@ya.ru', '8 (909) 000-09-90', 'Марта', 'Стюарт');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_type` varchar(255) NOT NULL,
  PRIMARY KEY (`role_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`role_type`) VALUES
('0'),
('1'),
('2');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `material_storage`
--
ALTER TABLE `material_storage`
  ADD CONSTRAINT `material_storage_fk0` FOREIGN KEY (`material_type`) REFERENCES `material` (`material_id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk0` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `order_fk1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_fk2` FOREIGN KEY (`master_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk0` FOREIGN KEY (`product_type`) REFERENCES `product_type` (`type_id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`role_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
