-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 06 2019 г., 08:50
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deti`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abonements`
--

CREATE TABLE `abonements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `visits_in_abonement` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `abonements`
--

INSERT INTO `abonements` (`id`, `name`, `price`, `visits_in_abonement`, `created_at`, `updated_at`) VALUES
(1, 'Полный абонемент на 8 занятий в месяц', 350000, 8, '2019-05-23 06:31:48', '2019-05-23 06:43:35'),
(2, 'Половинный абонемент на 4 занятия в месяц', 220000, 4, '2019-05-23 06:32:52', '2019-05-23 06:32:52');

-- --------------------------------------------------------

--
-- Структура таблицы `abonement_logs`
--

CREATE TABLE `abonement_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `abonement_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `comment` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `abonement_logs`
--

INSERT INTO `abonement_logs` (`id`, `abonement_id`, `client_id`, `count`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 8, 'Продажа абонемента клиенту', '2019-05-23 08:08:33', '2019-05-23 08:08:33'),
(2, 1, 51, 8, 'Продажа абонемента клиенту', '2019-08-06 05:41:23', '2019-08-06 05:41:23');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `birthcalendar`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `birthcalendar` (
`id` int(10) unsigned
,`name` varchar(191)
,`birthday` date
,`day` int(3)
);

-- --------------------------------------------------------

--
-- Структура таблицы `calendars`
--

CREATE TABLE `calendars` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_event` date NOT NULL,
  `time_start_event` time NOT NULL,
  `time_end_event` time NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calendars`
--

INSERT INTO `calendars` (`id`, `date_event`, `time_start_event`, `time_end_event`, `event_id`, `created_at`, `updated_at`) VALUES
(7, '2019-05-23', '11:00:00', '11:30:00', 2, '2019-05-13 07:54:31', '2019-05-23 04:47:36'),
(8, '2019-05-23', '12:00:00', '12:30:00', 9, '2019-05-13 07:54:52', '2019-05-23 04:47:51'),
(9, '2019-05-23', '13:00:00', '13:30:00', 1, '2019-05-22 06:44:45', '2019-05-23 04:51:47');

-- --------------------------------------------------------

--
-- Структура таблицы `checks`
--

CREATE TABLE `checks` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT '0',
  `stop` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `checks`
--

INSERT INTO `checks` (`id`, `client_id`, `user_id`, `is_closed`, `stop`, `created_at`, `updated_at`) VALUES
(22, 30, 1, 1, NULL, '2019-05-22 04:15:29', '2019-05-22 07:16:53'),
(23, 5, 1, 1, NULL, '2019-05-22 05:17:47', '2019-05-23 04:47:08'),
(24, 51, 1, 1, NULL, '2019-05-23 00:48:31', '2019-05-23 05:08:13'),
(25, 51, 1, 1, NULL, '2019-05-23 05:35:03', '2019-08-06 05:40:29');

-- --------------------------------------------------------

--
-- Структура таблицы `check_bodies`
--

CREATE TABLE `check_bodies` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_id` int(10) UNSIGNED NOT NULL,
  `good_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `check_bodies`
--

INSERT INTO `check_bodies` (`id`, `check_id`, `good_id`, `quantity`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(37, 22, 2, 1, 7000, 7000, '2019-05-22 07:15:52', '2019-05-22 07:15:52'),
(38, 22, 9, 1, 7000, 7000, '2019-05-22 07:15:52', '2019-05-22 07:15:52'),
(39, 22, 1, 1, 50000, 50000, '2019-05-22 07:15:52', '2019-05-22 07:15:52'),
(40, 22, 4, 1, 3000, 3000, '2019-05-22 07:16:04', '2019-05-22 07:16:04'),
(41, 23, 5, 1, 6000, 6000, '2019-05-22 07:18:10', '2019-05-22 07:18:10'),
(42, 23, 9, 1, 50000, 50000, '2019-05-22 07:18:13', '2019-05-22 07:18:13'),
(43, 23, 1, 1, 35500, 35500, '2019-05-22 07:18:13', '2019-05-22 07:18:13'),
(48, 24, 1, 1, 35500, 35500, '2019-05-23 04:56:57', '2019-05-23 04:56:57'),
(49, 24, 9, 1, 50000, 50000, '2019-05-23 04:57:18', '2019-05-23 04:57:18'),
(50, 24, 2, 1, 10000, 10000, '2019-05-23 04:57:32', '2019-05-23 04:57:32'),
(51, 24, 5, 1, 6000, 6000, '2019-05-23 04:57:59', '2019-05-23 04:57:59');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/avatars/noImage.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `birthday`, `parent`, `description`, `phone`, `imageUrl`, `created_at`, `updated_at`) VALUES
(1, 'Гаврилов Спартак Александрович', '2017-01-26', 'Роман Александрович Гусев', 'Sed recusandae repellendus aut autem sunt consequuntur. Nemo labore minus pariatur. Praesentium ipsam consequuntur est quia.', '12441', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(2, 'Евдокимов Аркадий Львович', '2017-03-22', 'Александрова Ника Александровна', 'Assumenda quia fugit fugit nemo aperiam iure distinctio dolores. Voluptatem aliquid illum impedit ut. Aliquam beatae aut ea quae delectus voluptas. Cum maiores dolores natus pariatur.', '834140698', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(3, 'Григорьев Дмитрий Дмитриевич', '2010-03-24', 'Михайлова Екатерина Максимовна', 'Occaecati sint adipisci temporibus voluptates nemo et deserunt saepe. Exercitationem dolor aut molestiae. Esse omnis ut excepturi eum. Nam quia quia et minus modi.', '19', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(4, 'Ростислав Дмитриевич Александров', '2014-01-07', 'Диана Борисовна Якушева', 'Commodi consequatur assumenda reiciendis temporibus et et iste. Corporis modi natus corrupti adipisci ea mollitia dolor. Sed atque ea exercitationem qui sunt sit sed.', '12', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(5, 'Васильев Марат Александрович', '2010-05-09', 'Марат Романович Кудряшов', 'Voluptatum dolor facilis voluptas voluptates est doloribus tempora. Quod amet repellat sint assumenda nihil placeat et. Inventore molestiae dignissimos eos ad mollitia quaerat.', '472814', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(6, 'Потапов Степан Владимирович', '2013-12-17', 'Людмила Алексеевна Воронова', 'Similique maxime quaerat aut ea et accusantium magni. Animi quasi modi nobis molestias voluptas ea ea.', '33747216', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(7, 'Кошелева Лада Дмитриевна', '2010-04-09', 'Иван Алексеевич Белозёров', 'Qui et eveniet cupiditate vitae. Commodi quia voluptas labore rerum excepturi. Asperiores qui iusto voluptatem doloribus voluptates aliquam illo est. Debitis iure placeat eligendi quos.', '5', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(8, 'Павлов Максим Владимирович', '2016-05-22', 'Иммануил Львович Самойлов', 'Ut qui illo cupiditate esse nobis. Similique quo iusto inventore. Atque minus quae nesciunt labore. Temporibus veniam nemo rerum quisquam ea.', '909', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(9, 'Юлий Иванович Зыков', '2010-10-03', 'Гусев Мирослав Андреевич', 'Alias fugiat inventore iure perspiciatis. Non sapiente asperiores sed.', '229505331', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(10, 'Эдуард Алексеевич Блинов', '2010-05-30', 'Валерия Алексеевна Миронова', 'Quidem quidem incidunt accusamus. Et corrupti sequi culpa est assumenda. Eaque iusto adipisci rem quasi aut.', '6', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(11, 'Котова Злата Дмитриевна', '2009-09-26', 'Майя Романовна Фёдорова', 'Officiis quia in cum autem voluptatem consequatur. Expedita ducimus et dolorum at neque iure. Ut aut velit quia consequatur veniam nisi ratione. Accusantium excepturi ad dolores temporibus.', '42', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(12, 'Дан Алексеевич Морозов', '2014-10-20', 'Стефан Владимирович Степанов', 'Aperiam nihil aut blanditiis laudantium pariatur sit voluptates. Ut minus voluptates ratione delectus. Blanditiis dignissimos atque voluptatibus et. Doloribus dolores molestias in voluptatem quam.', '574791020', 'public/avatars/noImage.png', '2019-01-18 04:23:04', '2019-01-18 04:23:04'),
(13, 'Александра Дмитриевна Самсонова', '2009-10-17', 'Вера Андреевна Брагина', 'Facere reprehenderit possimus veritatis. Ea inventore voluptas modi delectus qui laboriosam ipsam ipsam. Rerum eligendi autem alias facere quia quaerat et culpa. Distinctio expedita illum fuga eos.', '514556', 'public/avatars/m72uJjlEJePwolIdSYhd0IlHyZpKDz55buQsHVNE.jpeg', '2019-01-18 04:23:04', '2019-01-18 10:55:24'),
(14, 'Суханов Степан Фёдорович', '2016-01-27', 'Медведев Гордей Андреевич', 'Eligendi distinctio dolor sit voluptatibus magni quia. Veritatis odit consequatur placeat non consectetur aperiam ex. Est maxime modi molestias doloremque quidem.', '924', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(15, 'Чернов Игорь Фёдорович', '2011-05-16', 'Ананий Иванович Мельников', 'Corporis magni praesentium saepe harum. Sit distinctio cumque odio. Facere qui vitae magnam ut.', '83', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(17, 'Адам Романович Сафонов', '2016-02-09', 'Мария Андреевна Исакова', 'Maiores rem nisi et aut. Iste et alias officia quod. Exercitationem aut aut sunt recusandae. Eum officiis consectetur quaerat ratione iusto hic consequatur.', '361784899', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(18, 'Яна Фёдоровна Колесникова', '2015-10-24', 'Жуков Юлиан Максимович', 'Sapiente omnis omnis provident et ex dicta. Voluptatem consequuntur cupiditate exercitationem reprehenderit neque. Laborum illum impedit soluta voluptates consequatur et alias vero. Maiores accusamus autem quis adipisci ipsa mollitia.', '9733297', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(19, 'Кононов Василий Владимирович', '2017-01-23', 'Варвара Фёдоровна Миронова', 'Iure voluptas vel sit magni cumque modi. Quidem eligendi iste facilis ducimus. Neque laboriosam nihil aut sed eos debitis fugit excepturi.', '6601', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 09:40:11'),
(20, 'Любовь Евгеньевна Селезнёва', '2016-04-07', 'Анфиса Дмитриевна Никитина', 'Ullam provident delectus quam laboriosam. Similique distinctio officiis vitae eum ipsam qui et.', '9082793', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(22, 'Анисимова Рада Владимировна', '2012-05-19', 'Альбина Фёдоровна Журавлёва', 'Sed quisquam nobis eligendi at. Nemo provident est magni aut assumenda repellat. Aut qui voluptate aut corrupti ut sequi. Dicta aut et laudantium est doloribus. Perspiciatis perspiciatis ad vel non debitis.', '224', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(23, 'Лапина Владлена Алексеевна', '2016-06-09', 'Карпов Фёдор Фёдорович', 'Similique et nostrum accusantium id aut dicta quaerat. Sit sed reiciendis autem placeat sint. Tenetur eligendi provident dolor. Occaecati molestiae voluptatem reiciendis sed.', '43118693', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(24, 'Абрам Евгеньевич Маслов', '2016-11-27', 'Терентьев Афанасий Сергеевич', '<p><strong>Nemo</strong> et architecto non voluptatem voluptates nihil. Esse maiores in beatae eum occaecati quia labore. Quia libero id omnis voluptatem eum qui. Cupiditate molestiae culpa ea optio vel et dolorem enim. 1234</p>\r\n\r\n<ol>\r\n	<li>Нет аллергии</li>\r\n	<li>Очень любит играть</li>\r\n</ol>', '79796', 'public/avatars/QF66XI9kB5ylwV98wLiMWcXt9hzDTND0OLzHW5DA.jpeg', '2019-01-18 04:23:05', '2019-05-23 22:43:04'),
(25, 'Николаева Инна Фёдоровна', '2014-10-26', 'Суханова Антонина Львовна', 'Est alias voluptatem sapiente soluta. Tempora odio earum fuga. Eaque velit delectus asperiores aut.', '19007286', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(26, 'Ларионова Зинаида Алексеевна', '2016-12-06', 'Ксения Романовна Русакова', 'Incidunt non quibusdam eaque consectetur. Fugiat necessitatibus in exercitationem repellat. Esse tempore dolores aut beatae perspiciatis illum.', '13218232', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(27, 'Егорова Алиса Сергеевна', '2010-02-11', 'Влад Фёдорович Архипов', 'Similique animi eveniet nisi quo quos vel. Explicabo quidem consectetur vel consequuntur quasi cumque et. Ipsa rerum veniam ad itaque voluptas dolores et quia. Corporis est amet facere magnam molestias ut eos.', '577526113', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(28, 'Александра Андреевна Чернова', '2013-08-05', 'Шарова Анна Борисовна', 'Aliquid molestiae maiores maiores vero iste veniam. Optio et et rerum voluptates sint distinctio.', '290448888', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(29, 'Терентьева Антонина Александровна', '2013-01-23', 'Герман Романович Титов', 'Eius molestiae ut earum rerum amet repellendus corporis. Magnam quidem enim autem provident. Provident repellendus consequatur omnis maxime distinctio. Et molestiae ducimus eos.', '33087054', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 09:40:00'),
(30, 'Альбина Евгеньевна Степанова', '2014-09-06', 'Баранов Ростислав Максимович', 'Animi eius aut cupiditate molestias maxime sit. Non incidunt ut facere sequi expedita deserunt sapiente. Necessitatibus ut odio sapiente. Sunt consequatur necessitatibus rem voluptas dolor quia est.', '9088', 'public/avatars/cgDvKwTEUs3hl0XfyrzrdTmbAHEZYHlKWGJEWc1q.jpeg', '2019-01-18 04:23:05', '2019-01-18 10:54:49'),
(31, 'Алина Романовна Шубина', '2015-01-18', 'Бобров Аким Львович', 'Animi aliquid qui autem recusandae. Itaque fugiat incidunt delectus ipsa mollitia debitis. Tenetur omnis sit eius non commodi ullam consequatur.', '78838075', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 09:40:30'),
(32, 'Юлия Львовна Герасимова', '2012-12-19', 'Майя Алексеевна Васильева', 'Eum quo animi itaque quidem occaecati. Corporis tempora a esse dolore. Eligendi velit modi numquam reprehenderit nihil aut.', '743145', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(33, 'Донат Владимирович Юдин', '2013-05-24', 'Тимофеев Денис Андреевич', 'Nihil aut cumque dicta voluptates. Non sit dolor reiciendis. Ratione earum quis exercitationem voluptatem iste. Eos atque autem rerum nesciunt est earum consequuntur.', '6', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(34, 'Дарья Ивановна Захарова', '2016-10-01', 'Анна Сергеевна Александрова', 'Modi qui magnam non necessitatibus explicabo. Et necessitatibus non et perferendis aut. Fugit modi maxime enim rem omnis veniam quia. Est itaque sit ut totam neque dolore molestias.', '97', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(35, 'Ираклий Алексеевич Сорокин', '2011-03-18', 'Спартак Дмитриевич Фёдоров', 'Enim non provident doloremque inventore perspiciatis. Atque veniam iure rem deleniti. Veniam qui eos laborum ex deserunt.', '826033', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(37, 'Лазарева София Сергеевна', '2014-01-06', 'Нелли Львовна Дроздова', 'Quasi sit adipisci qui distinctio nemo voluptas perferendis et. Praesentium culpa eum nemo voluptatum. In placeat nihil non ea. Consequatur unde magnam distinctio tempore repellat omnis iste.', '875', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(38, 'Петухов Гордей Романович', '2015-07-25', 'Владлен Дмитриевич Мамонтов', 'Qui perferendis consequatur ipsa saepe. Adipisci expedita eos reiciendis natus at. Sed dicta deleniti voluptas quisquam pariatur modi.', '7926893', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(39, 'Надежда Александровна Мамонтова', '2010-02-05', 'Аркадий Владимирович Красильников', 'Consequuntur nihil occaecati unde aperiam sint dignissimos. Et ut architecto fuga id et. Est ex at explicabo maxime omnis.', '+79146895645', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-24 01:40:54'),
(40, 'Евгений Андреевич Попов', '2010-06-01', 'Лада Львовна Исакова', 'Reprehenderit odit deleniti expedita veniam. Assumenda voluptatem laborum earum occaecati. Eos iusto quo corporis dolores non consequatur facere aut. Provident dolor id laborum ut.', '5360', 'public/avatars/noImage.png', '2019-01-18 04:23:05', '2019-01-18 04:23:05'),
(41, 'Евсеев Назар Романович', '2013-12-07', 'Дементьев Яков Владимирович', 'Et molestiae quia amet ex. Occaecati molestias nihil cumque repellendus nobis facere officia. Et mollitia iste ut adipisci aperiam placeat saepe sit.', '8', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(42, 'Наталья Фёдоровна Мухина', '2009-07-29', 'Никонова Кристина Романовна', 'Qui eum voluptates ut qui molestiae ad autem. Iusto suscipit temporibus atque quos aut nam.', '7', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(43, 'Бобров Аполлон Александрович', '2016-10-07', 'Оксана Романовна Коновалова', 'Et ipsa sit ipsa. Distinctio molestiae deserunt expedita hic. Non aliquam ut ullam voluptas. Incidunt placeat veniam doloribus iste qui.', '45996', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(44, 'Даниил Алексеевич Казаков', '2012-03-11', 'Сафонов Андрей Дмитриевич', 'Necessitatibus animi placeat necessitatibus voluptas quod. Temporibus et quidem nihil impedit praesentium cum.', '10', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(45, 'Муравьёва Софья Владимировна', '2016-06-02', 'Лаврентьев Илья Алексеевич', 'Repellendus ratione ad et velit. Amet expedita unde dolores quia perspiciatis ipsam reprehenderit. Velit magnam omnis ab odit ea. Adipisci accusamus et quasi possimus eius.', '8', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(46, 'Клавдия Ивановна Лыткина', '2014-12-15', 'Афанасий Александрович Нестеров', 'Molestias sunt nesciunt expedita aliquam. Occaecati quos reprehenderit sunt inventore. Voluptates quae est eos doloremque.', '8536495', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-24 02:20:18'),
(47, 'Ефимова Владлена Андреевна', '2015-11-22', 'Щербакова Клавдия Александровна', 'Dolor dolor omnis atque ut. Quam at id magnam rem. Nostrum eos et qui necessitatibus.', '98208', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(48, 'Майя Максимовна Архипова', '2014-01-20', 'Бобылёва Вера Евгеньевна', 'Quae facilis eum omnis sunt amet autem ut et. Molestiae fugit reiciendis nemo alias placeat quo quisquam. Accusamus optio dolore impedit dignissimos non at consequatur. Porro eaque saepe accusantium necessitatibus. At ullam voluptates aut occaecati.', '4646', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 09:39:38'),
(49, 'Гущина Эмма Евгеньевна', '2012-05-14', 'Дементьева Лариса Алексеевна', 'Nihil labore quis enim architecto eius velit. Maxime eos officiis voluptatum quod esse itaque. Quam sint inventore tempore suscipit. Repudiandae odio voluptatem ad provident.', '1774873', 'public/avatars/noImage.png', '2019-01-18 04:23:06', '2019-01-18 04:23:06'),
(51, 'Андрей', '2018-02-07', 'Батяня', '<p>Очень шустрый пацан. За ним нужен глаз да глаз.</p>', '(914) 704-70-84', 'public/avatars/DVXjjXbrckOnRtrXYZpzXlZBjHziAMigHc8sRMSb.jpeg', '2019-01-25 05:51:30', '2019-08-06 05:42:53');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `type` enum('service','good') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Развивалочка', 35500, 'service', '2019-01-18 04:27:13', '2019-05-22 05:27:26'),
(2, 'Учимся читать', 10000, 'service', '2019-01-18 04:27:27', '2019-01-18 04:27:27'),
(3, 'День рождения', 300000, 'service', '2019-01-18 04:29:56', '2019-01-18 04:29:56'),
(4, 'Сок апельсиновый', 3000, 'good', '2019-01-18 04:33:46', '2019-05-22 06:14:37'),
(5, 'Печенье овсянное', 6000, 'good', '2019-01-18 10:33:01', '2019-05-22 05:04:36'),
(6, 'Новогодний утренник', 100056, 'service', '2019-01-18 10:33:38', '2019-05-22 05:45:12'),
(7, 'Чипсы картофельные', 7000, 'good', '2019-05-22 00:15:22', '2019-05-22 05:04:25'),
(8, 'Лимонад', 7000, 'good', '2019-05-22 05:10:19', '2019-05-22 05:10:19'),
(9, 'Хороводы', 50000, 'service', '2019-05-22 05:55:04', '2019-05-22 05:55:04'),
(10, 'Молоко', 10000, 'good', '2019-05-22 05:58:42', '2019-05-22 05:59:10');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_ins`
--

CREATE TABLE `goods_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `good_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods_ins`
--

INSERT INTO `goods_ins` (`id`, `good_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(28, 4, 10, 200, '2019-05-22 05:02:59', '2019-05-22 05:02:59'),
(29, 5, 10, 500, '2019-05-22 05:03:23', '2019-05-22 05:03:23'),
(30, 7, 20, 1200, '2019-05-22 05:03:49', '2019-05-22 05:03:49');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `goods_in_docs`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `goods_in_docs` (
`id` int(10) unsigned
,`name` varchar(191)
,`quantity` int(10) unsigned
,`amount` int(11)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_logs`
--

CREATE TABLE `goods_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `optype` enum('+','-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_id` int(10) UNSIGNED NOT NULL,
  `doc_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods_logs`
--

INSERT INTO `goods_logs` (`id`, `optype`, `good_id`, `doc_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(18, '+', 4, 28, 10, 20000, '2019-05-22 05:02:59', '2019-05-22 05:02:59'),
(19, '+', 5, 29, 10, 50000, '2019-05-22 05:03:23', '2019-05-22 05:03:23'),
(20, '+', 7, 30, 20, 120000, '2019-05-22 05:03:49', '2019-05-22 05:03:49'),
(34, '-', 4, 22, -1, -3000, '2019-05-22 07:16:53', '2019-05-22 07:16:53'),
(35, '-', 5, 23, -1, -6000, '2019-05-23 04:47:07', '2019-05-23 04:47:07'),
(36, '-', 5, 24, -1, -6000, '2019-05-23 05:08:13', '2019-05-23 05:08:13');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2018_11_16_050245_create_prices_table', 4),
(80, '2014_10_12_000000_create_users_table', 5),
(81, '2014_10_12_100000_create_password_resets_table', 5),
(82, '2018_11_09_050116_create_clients_table', 5),
(83, '2018_11_16_045736_create_goods_table', 5),
(84, '2018_11_21_053024_create_checks_table', 5),
(85, '2018_11_21_053157_create_goods_ins_table', 5),
(86, '2018_11_21_053255_create_check_bodies_table', 5),
(87, '2019_01_16_112326_create_calendars_table', 5),
(88, '2019_05_14_103729_add_fixed_field_to_goods_ins', 6),
(91, '2019_05_14_154233_create_warehouses_table', 7),
(94, '2019_05_21_161459_create_goods_logs_table', 8),
(95, '2019_05_23_153745_create_abonements_table', 9),
(96, '2019_05_23_155039_create_abonement_logs_table', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `good_id` int(10) UNSIGNED NOT NULL,
  `price_date` date NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `prices`
--

INSERT INTO `prices` (`good_id`, `price_date`, `value`, `created_at`, `updated_at`) VALUES
(1, '2018-11-19', 3000, '2018-11-18 15:19:37', '2018-11-18 15:19:37'),
(2, '2018-11-28', 400, '2018-11-28 06:05:08', '2018-11-28 06:05:08');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `sklad`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `sklad` (
`good_id` int(10) unsigned
,`good_name` varchar(191)
,`good_price` int(10) unsigned
,`total_quantity` decimal(32,0)
,`total_amount` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Андрей', 'w54661c@gmail.com', NULL, '$2y$10$C7noHEXrXN1LlR5ShKYKjONMQ24aRDuA1RP1xnTwtg5y0JaDG8GMq', 'irAjAsfRHfhdS1stCWf06ek81FDnQJ7ExeH3J58zMp7ULNvddKGEf8DDSh2a', '2019-01-18 04:26:32', '2019-01-18 04:26:32');

-- --------------------------------------------------------

--
-- Структура таблицы `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `good_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `warehouses`
--

INSERT INTO `warehouses` (`id`, `good_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 4, 117, 2553, '2019-05-21 05:35:35', '2019-05-21 05:53:13'),
(4, 5, 20, 155, '2019-05-21 05:54:34', '2019-05-21 05:54:34');

-- --------------------------------------------------------

--
-- Структура для представления `birthcalendar`
--
DROP TABLE IF EXISTS `birthcalendar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `birthcalendar`  AS  select `clients`.`id` AS `id`,`clients`.`name` AS `name`,`clients`.`birthday` AS `birthday`,dayofyear(`clients`.`birthday`) AS `day` from `clients` where (dayofyear(`clients`.`birthday`) between dayofyear(now()) and dayofyear((now() + interval 7 day))) order by dayofyear(`clients`.`birthday`) ;

-- --------------------------------------------------------

--
-- Структура для представления `goods_in_docs`
--
DROP TABLE IF EXISTS `goods_in_docs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `goods_in_docs`  AS  select `gi`.`id` AS `id`,`gd`.`name` AS `name`,`gi`.`quantity` AS `quantity`,`gi`.`amount` AS `amount`,`gi`.`created_at` AS `created_at` from (`goods_ins` `gi` join `goods` `gd` on((`gi`.`good_id` = `gd`.`id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `sklad`
--
DROP TABLE IF EXISTS `sklad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sklad`  AS  select `g`.`id` AS `good_id`,`g`.`name` AS `good_name`,`g`.`price` AS `good_price`,sum(`gl`.`quantity`) AS `total_quantity`,sum(`gl`.`amount`) AS `total_amount` from (`goods_logs` `gl` join `goods` `g` on((`g`.`id` = `gl`.`good_id`))) group by `g`.`id`,`g`.`name`,`g`.`price` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abonements`
--
ALTER TABLE `abonements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `abonement_logs`
--
ALTER TABLE `abonement_logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `check_bodies`
--
ALTER TABLE `check_bodies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_ins`
--
ALTER TABLE `goods_ins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_logs`
--
ALTER TABLE `goods_logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`good_id`,`price_date`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warehouses_good_id_unique` (`good_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abonements`
--
ALTER TABLE `abonements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `abonement_logs`
--
ALTER TABLE `abonement_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `check_bodies`
--
ALTER TABLE `check_bodies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `goods_ins`
--
ALTER TABLE `goods_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `goods_logs`
--
ALTER TABLE `goods_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
