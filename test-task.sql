-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2022 г., 16:09
-- Версия сервера: 5.7.38
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test-task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Антон Павлович Чехов'),
(2, 'Александр Сергеевич Пушкин'),
(3, 'Фёдор Михайлович Достоевский'),
(4, 'Уильям Шекспир'),
(5, 'Сергей Александрович Есенин'),
(6, 'Николай Васильевич Гоголь'),
(7, 'Лев Николаевич Толстой'),
(8, 'Автор 1'),
(9, 'Автор 2'),
(10, 'Автор 3'),
(11, 'Автор 4'),
(12, 'Автор 5'),
(13, 'Автор 6'),
(14, 'Автор 7'),
(15, 'Автор 8'),
(16, 'Автор 9'),
(17, 'Автор 10');

-- --------------------------------------------------------

--
-- Структура таблицы `author_books`
--

CREATE TABLE `author_books` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author_books`
--

INSERT INTO `author_books` (`id`, `book_id`, `author_id`) VALUES
(1, 6, 4),
(2, 5, 4),
(3, 4, 6),
(4, 2, 3),
(9, 1, 7),
(10, 7, 8),
(11, 7, 9),
(12, 7, 10),
(13, 7, 11),
(14, 8, 10),
(15, 8, 11),
(16, 8, 12),
(17, 9, 13),
(18, 10, 17),
(19, 10, 16),
(20, 10, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`) VALUES
(1, 'Война и мир'),
(2, 'Преступление и наказание'),
(3, 'Вишневый сад'),
(4, 'Мертвые души'),
(5, 'Ромео и Джульетта'),
(6, 'Король Лир'),
(7, 'Книга 1'),
(8, 'Книга 2'),
(9, 'Книга 3'),
(10, 'Книга 4');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`) VALUES
(1, 'Клиент 1'),
(2, 'Клиент 1'),
(3, 'Клиент 2'),
(4, 'Клиент 3'),
(5, 'Клиент 4'),
(6, 'Клиент 4'),
(7, 'Клиент 5'),
(8, 'Клиент 6'),
(9, 'Клиент 6'),
(10, 'Клиент 7'),
(11, 'Клиент 8'),
(12, 'Клиент 9'),
(13, 'Клиент 9'),
(14, 'Клиент 9'),
(15, 'Клиент 10');

-- --------------------------------------------------------

--
-- Структура таблицы `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date` timestamp NOT NULL,
  `views` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `visitors`
--

INSERT INTO `visitors` (`id`, `user_ip`, `last_date`, `views`) VALUES
(1, '127.0.0.1', '2022-09-28 10:14:37', 65),
(2, '192.168.0.0', '2022-09-28 18:05:08', 10),
(3, '192.168.0.1', '2022-09-28 18:05:08', 5),
(4, '127.0.0.1', '2022-09-29 10:21:34', 13);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `author_books`
--
ALTER TABLE `author_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `author_books`
--
ALTER TABLE `author_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author_books`
--
ALTER TABLE `author_books`
  ADD CONSTRAINT `author_books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `author_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
