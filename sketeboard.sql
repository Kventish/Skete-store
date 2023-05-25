-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 25 2023 г., 13:42
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
(3, 3, 'https://basket-01.wb.ru/vol133/part13369/13369788/images/big/1.jpg', 'Шортборд', 'Классический универсальный скейтборд, который подойдет как для городских прогулок, так и для выполнения разнообразных трюков', 60000, 34, 56, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sketeboard`
--
ALTER TABLE `sketeboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sketeboard`
--
ALTER TABLE `sketeboard`
  ADD CONSTRAINT `sketeboard_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_skateboard` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
