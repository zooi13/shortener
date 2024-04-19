-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Апр 19 2024 г., 13:29
-- Версия сервера: 8.3.0
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shortener`
--

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int NOT NULL,
  `url` text NOT NULL,
  `url_key` text NOT NULL,
  `count` int NOT NULL,
  `action` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `url`, `url_key`, `count`, `action`, `user_id`) VALUES
(2, 'test', 'lsByei', 0, 1, NULL),
(3, 'test1', 'XvJ1ow', 0, 1, NULL),
(4, 'test12', 'WhlSVx', 0, 1, NULL),
(5, 'test23', 'vFZEHW', 0, 1, NULL),
(6, '', 'hCgSAk', 0, 1, NULL),
(7, 'vk.com', 'SKrVIy', 3, 1, NULL),
(8, 'habr.com', 'yZz5r9', 3, 1, NULL),
(9, 'www.litres.ru/book/sergey-lukyanenko/poiski-utrachennogo-zavtra-70555663/', 'lPNBM7', 0, 1, NULL),
(10, 'gfd', 'uTvmgu', 0, 1, NULL),
(11, 'github.com/', 'jLtn7n', 0, 1, NULL),
(12, 'bootstrap-4.ru/', 'ziT51h', 5, 0, NULL),
(13, 'habr.com/ru/articles/515636/', 'AxDuZE', 2, 1, NULL),
(14, 'tests', 'Z3WuhK', 0, 1, NULL),
(15, 'testUser', 'fXh7rx', 0, 1, NULL),
(16, 'testUser1', '3YhMLM', 0, 1, NULL),
(17, 'testUsers12', '51c0Vs', 0, 1, NULL),
(18, 'UserTest1', 'Un2Jiw', 11, 1, 3),
(19, 'UserTest2', 'VgwYqP', 7, 1, 3),
(20, 'UserTest3', '1ucTl7', 1, 1, 3),
(21, 'UserTest4', '7CUnsz', 0, 1, 3),
(22, 'UserTest5', 'Ecjjhk', 2, 1, 3),
(23, 'laravel.com/', '6pG7wn', 1, 1, 3),
(24, 'gfdwe', 'pwftjI', 1, 1, NULL),
(25, 'github.com/zooi13', 'tII2MX', 4, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'test', 'test'),
(2, 'test2', '2af9b1ba42dc5eb01743e6b3759b6e4b'),
(3, 'admin', '751cb3f4aa17c36186f4856c8982bf27'),
(4, 'user1', 'd137043cbd9a0f3eddf22667c934959f'),
(5, 'user2', 'd137043cbd9a0f3eddf22667c934959f');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
