-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 01 2023 г., 12:14
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skeytmagazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `skate_id` int(11) NOT NULL,
  `amount_skate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `skate_id`, `amount_skate`) VALUES
(12, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cart_feedback`
--

CREATE TABLE `cart_feedback` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `discription_feedback` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart_feedback`
--

INSERT INTO `cart_feedback` (`id`, `cart_id`, `name`, `email`, `discription_feedback`) VALUES
(1, 9, 'test', 'test', 'test'),
(2, 10, 'test', 'test', 'test'),
(3, 9, 'test', 'test', 'test'),
(4, 10, 'test', 'test', 'test'),
(5, 9, 'test', 'test', 'test'),
(6, 10, 'test', 'test', 'test'),
(7, 9, 'test', 'test', 'test'),
(8, 10, 'test', 'test', 'test'),
(9, 9, 'test', 'test', 'test'),
(10, 10, 'test', 'test', 'test'),
(11, 9, 'test', 'test', 'test'),
(12, 10, 'test', 'test', 'test'),
(13, 9, 'test', 'test', 'test'),
(14, 10, 'test', 'test', 'test'),
(15, 11, 'Зарина', 'test', 'Купить');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `discription` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `discription`) VALUES
(24, 'test', 'test', 'test'),
(25, 'test', 'test', 'test'),
(26, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `sketeboard`
--

CREATE TABLE `sketeboard` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `is_liked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sketeboard`
--

INSERT INTO `sketeboard` (`id`, `type_id`, `img`, `name`, `description`, `price`, `size`, `amount`, `is_liked`) VALUES
(1, 2, 'https://ae04.alicdn.com/kf/H90a4747ceb654d12af668b2e8bcb7615H.jpg', 'Лонгборд', 'Разновидность роликовых досок, характеризующаяся большей скоростью, повышенной устойчивостью и улучшенными ходовыми качествами.', 50000, 27, 25, 0),
(2, 1, 'https://pro-market.kz/image/cache/catalog/import_yml/105/955/skejtbordvsborefootworkf1-1000x1000.jpg', 'Скейтборд', 'Доска, состоящая обычно из 7 слоёв канадского шпона, установленная на колёса небольшого диаметра (ролики).', 30000, 15, 34, 0),
(3, 3, 'https://basket-01.wb.ru/vol133/part13369/13369788/images/big/1.jpg', 'Шортборд', 'Классический универсальный скейтборд, который подойдет как для городских прогулок, так и для выполнения разнообразных трюков', 60000, 34, 56, 0),
(4, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZFp2uiKr-OOOYPs82lSEOE-x45d88ZmUky8tL43VRlNsemypjm74jtiah1191vOjsx-w&usqp=CAU', 'Скейтборд Footwork Progress Bear Attack', 'Поступила новая коллекция с красивыми артами на доске, успейте первыми', 30000, 15, 23, 0),
(5, 1, 'https://static.insales-cdn.com/r/o1vl28ssKN8/rs:fit:460:0:1/q:100/plain/images/products/1/4645/671724069/large_1_%D0%A1%D0%BA%D0%B5%D0%B9%D1%82%D0%B1%D0%BE%D1%80%D0%B4_%D0%B2_%D1%81%D0%B1%D0%BE%D1%80%D0%B5_Footwork_Drew_Black_8__X_31.5__1.webp', 'Скейтборд Footwork Drew 8\"', 'Поступила новая коллекция с красивыми артами на доске, успейте первыми', 50000, 15, 14, 0),
(6, 2, 'https://img4.traektoria.ru/upload/trk_iblock_img/493/i3xn7bfcxeh2rio68pt9g4qo276mhf0d.jpg', 'Лонгборд Footwork Hellfire SS22', 'Разновидность роликовых досок, характеризующаяся большей скоростью, повышенной устойчивостью и улучшенными ходовыми качествами.', 65000, 37, 17, 0),
(7, 2, 'https://img3.traektoria.ru/upload/trk_iblock_img/6d3/01thx6jg9xsof4675h967i7wvmryaxgr.jpg', 'Лонгборд Eastcoast Uluwatu SS22', 'Разновидность роликовых досок, характеризующаяся большей скоростью, повышенной устойчивостью и улучшенными ходовыми качествами.', 70000, 37, 21, 0),
(8, 3, 'https://tempish.com.ua/image/cache/data/tempish/skeytbordy/skejtbord-tempish-buffy-flash-w-chernyy-svetyashchiyesya-kolesa-600x600.jpg', 'Скейтборд Tempish Buffy Flash W черный (светящиеся колеса)', 'Классический универсальный скейтборд, который подойдет как для городских прогулок, так и для выполнения разнообразных трюков', 67000, 27, 30, 0),
(9, 3, 'https://shop.wakepark.by/image/cache/catalog/sector9%2822%29/triton/longisland/skate/longcr/2328252556-800x800.jpeg', 'Лонгборд Eastcoast Pipeline 35\"', 'Классический универсальный скейтборд, который подойдет как для городских прогулок, так и для выполнения разнообразных трюков', 65000, 35, 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `type_skateboard`
--

CREATE TABLE `type_skateboard` (
  `id` int(11) NOT NULL,
  `type` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_skateboard`
--

INSERT INTO `type_skateboard` (`id`, `type`) VALUES
(1, 'Обычный'),
(2, 'Скоростной'),
(3, 'Трюковой');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skate_id` (`skate_id`);

--
-- Индексы таблицы `cart_feedback`
--
ALTER TABLE `cart_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sketeboard`
--
ALTER TABLE `sketeboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `type_skateboard`
--
ALTER TABLE `type_skateboard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `cart_feedback`
--
ALTER TABLE `cart_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `type_skateboard`
--
ALTER TABLE `type_skateboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`skate_id`) REFERENCES `sketeboard` (`id`);

--
-- Ограничения внешнего ключа таблицы `sketeboard`
--
ALTER TABLE `sketeboard`
  ADD CONSTRAINT `sketeboard_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_skateboard` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
