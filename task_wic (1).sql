-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 23 2019 г., 00:57
-- Версия сервера: 5.6.43
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_wic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `country_id` int(6) NOT NULL,
  `country` varchar(30) NOT NULL,
  `country_code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country`, `country_code`) VALUES
(1, 'Andorra', 'AD'),
(2, 'Argentina', 'AR'),
(3, 'American Samoa', 'AS'),
(4, 'Bulgaria', 'BG'),
(5, 'Brazil', 'BR'),
(6, 'Canada', 'CA'),
(7, 'Spain', 'ES'),
(8, 'India', 'IN'),
(9, 'Italy', 'IT'),
(10, 'Monaco', 'MC');

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(6) NOT NULL,
  `places` text NOT NULL,
  `country_id` int(6) DEFAULT NULL,
  `postcode_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `places`, `country_id`, `postcode_id`) VALUES
(1, 'aaaaaaa', 1, 2),
(3, '[{\"place name\":\"Canillo\",\"longitude\":\"1.6667\",\"state\":\"\",\"state abbreviation\":\"\",\"latitude\":\"42.5833\"}]', 1, 32),
(4, '[{\"place name\":\"Escaldes-Engordany\",\"longitude\":\"1.5667\",\"state\":\"\",\"state abbreviation\":\"\",\"latitude\":\"42.5\"}]', 1, 33),
(5, '[{\"place name\":\"Encamp\",\"longitude\":\"1.6333\",\"state\":\"\",\"state abbreviation\":\"\",\"latitude\":\"42.5333\"}]', 1, 34),
(6, '[{\"place name\":\"Ordino\",\"longitude\":\"1.55\",\"state\":\"\",\"state abbreviation\":\"\",\"latitude\":\"42.6\"}]', 1, 35),
(13, '[{\"place name\":\"Andorra la Vella\",\"longitude\":\"1.5\",\"state\":\"\",\"state abbreviation\":\"\",\"latitude\":\"42.5\"}]', 1, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `postcodes`
--

CREATE TABLE `postcodes` (
  `postcode_id` int(6) NOT NULL,
  `postcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `postcodes`
--

INSERT INTO `postcodes` (`postcode_id`, `postcode`) VALUES
(1, 'A0A'),
(2, '1601'),
(3, '96799'),
(4, '01000-000'),
(5, '110001'),
(6, '00010'),
(7, 'L-1009'),
(8, '101000'),
(30, 'AD100'),
(31, 'AD100'),
(32, 'AD100'),
(33, 'AD700'),
(34, 'AD200'),
(35, 'AD300'),
(42, 'AD500');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `postcode_id` (`postcode_id`);

--
-- Индексы таблицы `postcodes`
--
ALTER TABLE `postcodes`
  ADD PRIMARY KEY (`postcode_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `postcodes`
--
ALTER TABLE `postcodes`
  MODIFY `postcode_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`postcode_id`) REFERENCES `postcodes` (`postcode_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
