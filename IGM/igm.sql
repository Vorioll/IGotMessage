-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 28 2022 г., 23:17
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `igm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat29`
--

CREATE TABLE `chat29` (
  `id_message` int NOT NULL,
  `mestext` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mesdata` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ids` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chat29`
--

INSERT INTO `chat29` (`id_message`, `mestext`, `mesdata`, `ids`) VALUES
(1, '123', '2022-11-28', '1'),
(2, '888', '2022-11-28', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `chat30`
--

CREATE TABLE `chat30` (
  `id_message` int NOT NULL,
  `mestext` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mesdata` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ids` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chat30`
--

INSERT INTO `chat30` (`id_message`, `mestext`, `mesdata`, `ids`) VALUES
(1, '3333', '2022-11-28', '1'),
(2, '123123', '2022-11-28', '7');

-- --------------------------------------------------------

--
-- Структура таблицы `chat31`
--

CREATE TABLE `chat31` (
  `id_message` int NOT NULL,
  `mestext` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mesdata` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ids` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `id_prof` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_author` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `data` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_prof`, `id_author`, `text`, `data`) VALUES
(2, '4', '1', '123', '2022-11-28'),
(3, '4', '1', 'ТЕСТ', '2022-11-28'),
(4, '4', '7', 'ТЕСТ2', '2022-11-28'),
(5, '7', '7', '123123123213123213', '2022-11-28'),
(6, '7', '7', 'Ты лох', '2022-11-28');

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `id` int NOT NULL,
  `id_friend` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `userid` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `id_friend`, `userid`) VALUES
(1, '6', '1'),
(2, '7', '1'),
(9, '1', '8'),
(10, '6', '8');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `id_friend` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `myid` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `id_friend`, `myid`) VALUES
(29, '4', '1'),
(30, '7', '1'),
(31, '6', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `id_author` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `data` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `id_author`, `text`, `data`, `img`) VALUES
(1, '7', '12321321312', '2022-11-28', 'https://cq.ru/storage/uploads/posts/1252326/cri/1___media_library_original_1379_775.png'),
(3, '7', '', '2022-11-28', 'https://sun9-47.userapi.com/impg/XKSbJapxXdUkilM04wZ9q1SgAG5dOHPd1UWSBg/d8wA_3TiFlM.jpg?size=377x419&quality=96&sign=e76b9550f4b96378e5ae2ccaa6b036d5&type=album'),
(4, '1', '', '2022-11-28', 'https://sun9-9.userapi.com/impg/SxUtQ4jLMj-aPALBp6MvByY3gr3OZov5cxgSJw/9Qvr17FPs9Q.jpg?size=752x378&quality=96&sign=a4f05fda1ef0f27dc9d74460bb5e5a62&type=album');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `nickname` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `nickname`, `name`, `surname`, `password`, `avatar`) VALUES
(1, 'NaShiMi', 'Василь', 'Зарипов', '123', 'https://cspromogame.ru//storage/upload_images/avatars/3857.jpg'),
(4, 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'ТЕСТ', 'https://i1.sndcdn.com/artworks-OYlkPWjCDJzZD5C0-rJ5c7A-t240x240.jpg'),
(5, 'zm_vip', 'Зацепин', 'Денис', '123', 'https://www.meme-arsenal.com/memes/b6e23b9793806cb7297ac18f3fe41844.jpg'),
(6, 'Voriol', 'Никита', 'Ковин', '123', 'https://avatars.mds.yandex.net/get-vthumb/4104866/56eb0b5ef385cf625d5f8a14b95c2ae5/564x318_1'),
(7, 'Wile', 'Митяй', 'Головин', '123', 'https://cdn.discordapp.com/attachments/830042587553071104/831841626803929098/1.jpg'),
(8, 'Lev', 'Лев', 'Малявков', '123', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/220px-Lion_d%27Afrique.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat29`
--
ALTER TABLE `chat29`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `chat30`
--
ALTER TABLE `chat30`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `chat31`
--
ALTER TABLE `chat31`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_friend`),
  ADD KEY `id_friend` (`id_friend`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_friend` (`id_friend`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat29`
--
ALTER TABLE `chat29`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `chat30`
--
ALTER TABLE `chat30`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `chat31`
--
ALTER TABLE `chat31`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
