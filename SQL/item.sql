-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2022 г., 03:24
-- Версия сервера: 5.7.39-log
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `item`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'frozen', 'diplomant'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views_count` int(11) DEFAULT NULL,
  `published` int(1) DEFAULT NULL,
  `created_at` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `content`, `image`, `views_count`, `published`, `created_at`, `title`, `updated_at`) VALUES
(30, '11', 'img/DSCF4989.JPG', 7, 0, '20.12.22', '555', '26.12.22'),
(32, 'zzzs', 'img/DSCF4986.JPG', 6, 1, '25.12.22', 'zzz', '26.12.22'),
(33, 'kkk', 'img/rPCeqOiMqiU.jpg', 0, 0, '26.12.22', 'kkk', '26.12.22'),
(34, 'vzvzv', 'img/DSCF4980.JPG', 0, 1, '26.12.22', 'vzvz', '26.12.22'),
(35, 'xcxcxc', 'img/DSCF4990.JPG', 0, 1, '26.12.22', 'ccxc', '26.12.22'),
(36, 'gghffhdfg', 'img/DSCF4999.JPG', 0, 1, '26.12.22', 'ssssaas', '26.12.22'),
(37, 'hghghghghgh', 'img/DSCF4997.JPG', 0, 1, '26.12.22', 'tytytytyty', '26.12.22'),
(38, '3232332', 'img/DSCF4982.JPG', 2, 1, '26.12.22', 'vcvcvcvcvcvcv', '26.12.22');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_at` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_at` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `id_user`, `descr`, `date_at`, `time_at`) VALUES
(1, 2, 'Добавлена новая запись kkk', '26.12.22', '00:29'),
(2, 2, 'Добавлена новая запись 111', '26.12.22', '01:43'),
(3, 2, 'Снял с публикации товар 30', '26.12.22', '01:44'),
(4, 2, 'Изменил содержание товара 30 на 555', '26.12.22', '01:44'),
(5, 2, 'Изменил картинку товара', '26.12.22', '01:44'),
(6, 2, 'Опубликовал товар 30', '26.12.22', '01:44'),
(7, 2, 'Удалил товар 34', '26.12.22', '01:45'),
(8, 2, 'Вошёл в режим администратора', '26.12.22', '01:51'),
(9, 2, 'Вошёл в режим администратора', '26.12.22', '01:54'),
(10, 2, 'Вошёл в режим администратора', '26.12.22', '02:51'),
(11, 2, 'Вошёл в режим администратора', '26.12.22', '03:49'),
(12, 2, 'Изменил содержание товара 32 на zzz', '26.12.22', '03:50'),
(13, 2, 'Снял с публикации товар 32', '26.12.22', '03:50'),
(14, 2, 'Изменил картинку товара', '26.12.22', '03:50'),
(15, 2, 'Опубликовал товар 32', '26.12.22', '03:50'),
(16, 2, 'Снял с публикации товар 32', '26.12.22', '04:00'),
(17, 2, 'Опубликовал товар 32', '26.12.22', '04:00'),
(18, 2, 'Снял с публикации товар 32', '26.12.22', '04:00'),
(19, 2, 'Снял с публикации товар 32', '26.12.22', '04:01'),
(20, 2, 'Снял с публикации товар 32', '26.12.22', '04:06'),
(21, 2, 'Опубликовал товар 32', '26.12.22', '04:06'),
(22, 2, 'Снял с публикации товар 32', '26.12.22', '04:06'),
(23, 2, 'Опубликовал товар 32', '26.12.22', '04:06'),
(24, 2, 'Вошёл в режим администратора', '26.12.22', '04:24'),
(25, 2, 'Добавлена новая запись vzvz', '26.12.22', '22:48'),
(26, 2, 'Добавлена новая запись ccxc', '26.12.22', '22:49'),
(27, 2, 'Добавлена новая запись ssssaas', '26.12.22', '23:42'),
(28, 2, 'Добавлена новая запись tytytytyty', '26.12.22', '23:42'),
(29, 2, 'Добавлена новая запись vcvcvcvcvc', '26.12.22', '23:43'),
(30, 2, 'Вошёл в режим администратора', '27.12.22', '01:10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
