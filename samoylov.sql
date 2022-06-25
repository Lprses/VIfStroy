-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2022 г., 23:27
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `samoylov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_23_180302_create_products_table', 1),
(4, '2022_03_24_125908_create_news_table', 1),
(5, '2022_03_25_152126_create_orders_table', 1),
(6, '2022_03_25_152607_create_order_items_table', 1),
(7, '2022_03_25_182405_create_news_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `photo`, `title_description`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Новость 1', 'ya.png', 'Краткое описание новости(на карточке)', 'Полное описание новости(на отдельной странице новости)', '2022-03-24', NULL, NULL),
(2, 'Новость 2', 'ya.png', 'Краткое описание новости(на карточке)', 'Полное описание новости(на отдельной странице новости)', '2022-03-24', NULL, NULL),
(3, 'Новость 3', 'ya.png', 'Краткое описание новости(на карточке)', 'Полное описание новости(на отдельной странице новости)', '2022-03-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Новый','Завершен','Отклонен') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'User', 'Отклонен', '2022-03-25 12:37:14', '2022-06-07 21:13:00'),
(2, 3, 'Адресс', 'Новый', '2022-06-03 04:29:21', '2022-06-03 04:29:21'),
(3, 4, 'Адресс', 'Новый', '2022-06-03 04:34:17', '2022-06-03 04:34:17'),
(5, 2, 'г.Сергиев Посад, ул. Инженерная, д.7', 'Новый', '2022-06-16 12:39:55', '2022-06-16 12:39:55');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1200.00, 1, '2022-03-25 12:37:14', '2022-03-25 12:37:14'),
(2, 2, 1, 1200.00, 1, '2022-06-03 04:29:21', '2022-06-03 04:29:21'),
(6, 5, 10, 1300.00, 1, '2022-06-16 12:39:55', '2022-06-16 12:39:55'),
(7, 5, 11, 1250.00, 1, '2022-06-16 12:39:55', '2022-06-16 12:39:55'),
(8, 5, 12, 1750.00, 1, '2022-06-16 12:39:55', '2022-06-16 12:39:55');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('Напольные покрытия','Потолочные системы','Сайдинг и фурнитура') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `title_description`, `description`, `state`, `price`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Напольное покрытие', 'Объём: 0.015 м³ Длина: 6000 мм Масса: 7.8 кг Производитель: Россия Площадь: 0.6 м²', 'Пиломатериалы — это стройматериалы из древесины. Они используются в строительстве, ценятся за прочность, долговечность, экологичность. После пропитки спецсоставами материал становится невосприимчивым к гниению и не горит. Компания «СтройДвор» предлагает купить пиломатериалы нескольких категорий. Выполняем разовые поставки и организуем постоянное снабжение оптовиков.Объём: 0.015 м³ Длина: 6000 мм Масса: 7.8 кг Производитель: Россия Площадь: 0.6 м²', 'Напольные покрытия', 1200.00, '1gif_1648235326.png', NULL, NULL),
(5, 'Потолочные системы', 'Объём: 0.015 м³ Длина: 6000 мм Масса: 7.8 кг Производитель: Россия Площадь: 0.6 м²', 'Объём: 0.015 м³\r\nДлина: 6000 мм\r\nМасса: 7.8 кг\r\nПроизводитель: Россия\r\nПлощадь: 0.6 м²', 'Потолочные системы', 3200.00, 'cheat_1648238617.png', '2022-03-25 17:03:37', '2022-03-25 17:03:37'),
(8, 'Напольное покрытие', 'Объём: 0.015 м³ Длина: 6000 мм Масса: 7.8 кг Производитель: Россия Площадь: 0.6 м²', 'Объём: 0.015 м³\r\nДлина: 6000 мм\r\nМасса: 7.8 кг\r\nПроизводитель: Россия\r\nПлощадь: 0.6 м²', 'Напольные покрытия', 1450.00, '27484eaadf64b806655c5085a756d992_1655391289.jpg', '2022-06-16 11:54:49', '2022-06-16 11:54:49'),
(9, 'Товар', 'Объём: 0.015 м³ Длина: 6000 мм Масса: 7.8 кг Производитель: Россия Площадь: 0.6 м²', 'Объём: 0.015 м³\r\nДлина: 6000 мм\r\nМасса: 7.8 кг\r\nПроизводитель: Россия\r\nПлощадь: 0.6 м²', 'Напольные покрытия', 2100.00, '93217_06a9_1655391631.jpg', '2022-06-16 12:00:31', '2022-06-16 12:00:31'),
(10, 'Угол наружный эконом белый', 'Предназначен для крепления сайдинг-панелей встык.', 'Угол наружный Эконом белый предназначен для крепления сайдинг-панелей встык на внешних углах фасада. Придает облицовке законченный, аккуратный вид благодаря треугольной конфигурации. Защищает торцы от атмосферного воздействия, ветра, накопления грязи. Оснащен двумя монтажными планками с перфорациями для установки на смежные стены. Дополнен прижимными пазами для удобной и надежной фиксации ламелей.\r\n\r\nМожет применяться при обшивке кровельных свесов. Образует плавный переход панелей. Полностью закрывает стыки. Стандартная длина – 3000 мм. Аксессуары для сайдинга Эконом изготовлены из прочного пластика (ПВХ). Легко режутся в размер и по форме. Выдерживают большие нагрузки. Устойчивы к влаге, ультрафиолету, температурным колебаниям.', 'Сайдинг и фурнитура', 1300.00, 'file_194_11__1655391732.jpg', '2022-06-16 12:02:12', '2022-06-16 12:02:12'),
(11, 'J-профиль Доломит SL 3.0 м Орех', 'Придает законченный внешний вид', 'Декоративная отделка проемов\r\nПодбирается в цвет панелей сайдинга\r\nПридает законченный внешний вид', 'Сайдинг и фурнитура', 1250.00, 'file_194_11__1655391957.jpg', '2022-06-16 12:05:58', '2022-06-16 12:05:58'),
(12, 'Околооконная планка коричневая', 'цвет Шоколад - Придает законченный внешний вид', 'Околооконная планка коричневая, цвет Шоколад применяется для наружной отделки (облицовки) зданий и одновременно выполняет защитные функции от внешних воздействий, таких как дождь, солнце, снег и.т.д.\r\n\r\n  Использование высококачественных материалов при изготовлении винилового сайдинга позволило добиться высокой прочности и долговечности.', 'Сайдинг и фурнитура', 1750.00, 'file_194_11__1655392083.jpg', '2022-06-16 12:08:03', '2022-06-16 12:08:03'),
(13, 'ПОДВЕСНОЙ ПОТОЛОК ГРИЛЬЯТО', 'Албес Придает законченный внешний вид', 'Потолок Грильято белый 100х100х40 мм бренда Албес представляет собой стильный и экологически безопасный вариант декорирования потолочной плоскости.', 'Потолочные системы', 1650.00, 'file_194_11__1655392199.jpg', '2022-06-16 12:09:59', '2022-06-16 12:09:59');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `phone`, `email`, `fullname`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, '9163403510', 'admin', 'Самойлов Даниил', '$2y$10$dwOiM6noBrg8474aqtseDOr0gzOnf/F1FtvJj0Qi8cOhyDnSbmpau', 'admin', '2022-03-25 12:35:27', '2022-03-25 12:35:27'),
(2, '8005553535', 'user', 'User User', '$2y$10$3CLN5Z9dBh97dLB.j44XL.0NT4rczZzvquslQUyNbV.l4caIYMiU6', 'user', '2022-03-25 12:36:44', '2022-03-25 12:36:44'),
(3, '9105554105', 'test@user.ua', 'User User User', '$2y$10$TbmD8QPnjxY.faaPX4/9leTaXkb2WMmvEYzTHCEjUjJjgTlNbwKuu', 'user', '2022-06-03 04:28:38', '2022-06-03 04:28:38'),
(4, '9105554104', 'test@user.ra', 'User User User', '$2y$10$qO13wAKGu6jiBMXh8SYPzeGEhCuqLz2LSmO0/ZndyXpWiri9j0eTO', 'user', '2022-06-03 04:33:40', '2022-06-03 04:33:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
