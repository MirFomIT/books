-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 22 2019 г., 07:15
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image_id` int(10) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `advertising`
--

CREATE TABLE `advertising` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `http_path` varchar(255) DEFAULT NULL,
  `left_column` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `description` text,
  `key_words` text,
  `title` varchar(255) NOT NULL,
  `new` enum('1','0') DEFAULT '0',
  `image_id` int(11) DEFAULT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `publishing_house` varchar(255) DEFAULT '0',
  `pdf` varchar(255) DEFAULT NULL,
  `style` varchar(255) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL,
  `site_count` int(11) NOT NULL,
  `img_count` int(11) NOT NULL,
  `alt` varchar(10) NOT NULL,
  `price_pdf` double NOT NULL DEFAULT '0',
  `description_meta` text NOT NULL,
  `pdf_full` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `description`, `key_words`, `title`, `new`, `image_id`, `date_create`, `date_update`, `year`, `publishing_house`, `pdf`, `style`, `price`, `date`, `site_count`, `img_count`, `alt`, `price_pdf`, `description_meta`, `pdf_full`) VALUES
(1, ' Однажды ночью в Яшкиной спальне с антресолей упала вешалка… А из темноты таинственный голос прошептал: «Абра-ар… Бурундун… Вьюга-вьюн… Гагатун… Дзинь-да-да…» Эта странная тарабарщина оказалась волшебным заклинанием, пробудившим к жизни пластилиновые буквы.\r\n <br/><br/> Их Яшка вылепил на днях с маминой помощью, которая таким вот образом пыталась обучить сына «абэвэгэдэйке». Буквы, как известно, – начало любой сказки. И наша история не будет исключением… Теперь для малыша открыты двери в Антресолию – страну забытых желаний.<br/><br/>\r\n Там уже ждут его, ибо грядёт конец света… Чёрная Старуха вознамерилась уничтожить мечты и фантазии, которым не суждено было сбыться, поскольку люди забыли о них. Всё сказочное братство: буквы и цифры, говорящие птицы, животные и насекомые, эльфы и гномы, феи, русалки, великаны и драконы – с надеждой смотрит в небо, выискивая там танцующие облака…\r\n<br/><br/>Это знак пришествия Спасителя – человеческого детёныша с Чистым Сердцем. Не ошибся ли Тайный Советник Барсениус, выбрав на роль Героя Яшку? Сумеет ли мальчик выучить все буквы и освоить магию слова, чтобы подчинить себе Книгу заклятий? Сможет ли спасти Антресолию и победить Старуху?..<br/><br/>\r\nВедь сила её заключается в чёрных сердцах, которые Ведьма вырвала из груди людей, когда-то утративших веру в чудо…', 'детская фантастика, приключения, сказки, фєнтези, антресолия яшка, ермолаев, волшебное заклинание,абэвэгэдэйке,буквы,забытые желания,Чёрная Старуха,уничтожить мечты,фантазия,буквы и цифры, говорящие птицы, животные и насекомые, эльфы и гномы, феи, русалки, великаны, драконы,танцующие облака,спаситель,человеческий детёныш,чистое сердце,мальчик,книга заклятий,ведьма,веру в чудо ', 'Антресолия – страна забытых желаний, или Приключения Яшки Ермолаева', '0', 1, '2019-09-16 18:04:57', NULL, 2013, ' «Написано пером», Санкт-Петербург', 'antresolia.pdf', 'детская фантастика, приключения, сказки, фєнтези', 0, '2009-2010', 300, 42, '6+', 60, 'сказка о Яшке Ермолаеве, который вылепил пластилиновые буквы на днях с маминой помощью, которая таким вот образом пыталась обучить сына «абэвэгэдэйке». Теперь для малыша открыты двери в Антресолию – страну забытых желаний.Там уже ждут его, ибо грядёт конец света… Чёрная Старуха вознамерилась уничтожить мечты и фантазии, которым не суждено было сбыться, поскольку люди забыли о них. Всё сказочное братство: буквы и цифры, говорящие птицы, животные и насекомые, эльфы и гномы, феи, русалки, великаны и драконы – с надеждой смотрит в небо, выискивая там танцующие облака.', 'antresolia_all.pdf'),
(2, 'В прихожей Ложкиных зазвонил поломанный будильник. Взрослые не услышали его сумасшедший звон, что и неудивительно, ведь предназначался он исключительно малышу – Петюньке, прозванному сверстниками Очкастым.<br/><br/>\r\nЧтобы угомонить будильник, мальчик обыскал трельяж и в верхнем ящике обнаружил коробку из-под пластилина. В ней что-то шевелилось, чихало и ругалось.<br/><br/>\r\nПричиной переполоха стали пластилиновые буквы: Абра-ар, Бурундун, Вьюга-вьюн, Гагатун и Дзинь-да-да. Они были хорошо знакомы Петюньке по рассказам его лучшего друга – Ермолаева Яшки, который однажды побывал в Антресолевой стране, где живут забытые желания.\r\n<br/><br/>\r\nПластилиновые буквы ожили и превратились в миниатюрных человечков. Их странные имена, произнесённые вслух в алфавитном порядке, сработали как заклинание, которое отворило отражённую в зеркале дверь.\r\nЧерез открывшийся проём вместе с зелёным туманом в прихожую ввалился толстый фей снов – пан Сонька. Ночной гость поведал малышу удивительную историю.<br/><br/>\r\nОказывается, наряду с добрыми желаниями существуют также желания тёмные, злые. Чтобы они не засоряли собой сказки, их отправляют в ссылку на холодную планету ТРЕЛЬЯЖ.\r\nНадзирателем тюрьмы был назначен колдун Сморчок. Опьянённый тёмными человеческими желаниями, он провозгласил себя Князем Трельяжа и вознамерился стереть Границу, выпустить узников и заляпать грязью розовую страну Антресолию.\r\n<br/><br/>\r\nСилу свою Сморчок черпает в кошмарах, которые он насылает на людей посредством отобранного у феев снов волшебного порошка.\r\nСамих же панов Сонек колдун заточил в темницу. На свободе остался только один – Петюнькин гость.\r\n<br/><br/>\r\nДа и того на глазах мальчика поглотила Тень. В последнюю минуту пан Сонька успевает забросить под шкаф мешочек с сонным порошком и крылатые тапки.\r\nПосовещавшись с буквами, Петюнька решает воспользоваться феевскими вещами и отправиться в сказку, чтобы вызволить феев снов, сохранить Границу и оградить верхний мир от тёмных желаний.\r\n', NULL, 'Петюнька Очкастый в Трельяжном королевстве, или История с сонным порошком', '0', 3, '2019-09-07 17:46:57', NULL, 2019, '«Адверта», Днепр', 'petunka.pdf', 'детская фантастика, приключения, сказки, фєнтези', 499, '23 сентября - 10 августа 2013', 392, 50, '6+', 140, 'Сказка о друге Яшки Ермолаева - Петюньке, прозванному сверстниками Очкастым. О толстом фей снов – пан Сонька, о добрых желаниях и желания хтёмных, злых. о надзирателе тюрьмы - колдуне Сморчке. Опьянённый тёмными человеческими желаниями, он провозгласил себя Князем Трельяжа и вознамерился стереть Границу, выпустить узников и заляпать грязью розовую страну Антресолию. о мешочке с сонным порошком и крылатых тапках.', 'petunka_all.pdf'),
(3, 'Трельяжный Князь Сморчок в ранге обыкновенного смертного сослан на Землю отбывать наказание за преступления, совершённые им против Антресолии – страны забытых желаний.\r\n<br/><br/>\r\nТень по имени Ахуратс добровольно разделила с хозяином участь падшего. Сосланный, но несломленный старик мечтает вернуться домой. Помочь в этом деле бывшему тёмному колдуну может только человеческий детёныш с Чистым Сердцем.\r\n Волею судьбы роль адвоката падшего досталась шестилетней Машеньке Журавлёвой.\r\n</span>\r\n<span> \r\nМалышка заступилась за Сморчка перед лицом самого Хранителя. Но этого оказалось мало. Чтобы отбелить своё имя, колдун должен заручиться поддержкой тридцати трёх букв волшебного алфавита.<br/><br/>\r\nСтарик и девочка отправляются в Антресолию, задействовав древнее «двери отпирающее» заклинание: «Абра-ар, Бурундун, Вьюга-вьюн, Гагатун, Дзинь-да-да». \r\n<br/><br/>\r\nЗа Дверью их ждут фантастические приключения и невероятные испытания. Парной космос, зонтичные города, в которых живут ангелы, Лес Совести, молочная река, халвовые горы, Океан Слёз, радужные межмирные переходы, паучья швейная фабрика, яблочные космолёты – все эти и многие другие чудеса, которые встретит на своём пути малышка, под угрозой гибели.\r\nИх точат Черви Сомнения, порождённые людьми, которые утратили веру в чудо. \r\n<br/><br>\r\nСправится ли Машенька с возложенной на неё миссией? \r\nПоможет ли колдуну, спасёт ли Антресолию от монстров? \r\nНасколько велика сила её Чистого Сердца? Об этом, друзья, вы узнаете, совершив вместе с главной героиней путешествие по моей сказке.\r\n', NULL, 'Рисунки на пару, или Сказка для Машеньки', '0', 2, '2019-09-16 18:05:46', NULL, 0000, '0', 'stream_drawings.pdf', 'детская фантастика, приключения, сказки, фєнтези', 0, '30 августа 2013 - 21 апреля 2014', 201, 0, '6+', 0, 'Трельяжный Князь Сморчок в ранге обыкновенного смертного сослан на Землю отбывать наказание за преступления, совершённые им против Антресолии – страны забытых желаний. Тень по имени Ахуратс добровольно разделила с хозяином участь падшего.Волею судьбы роль адвоката падшего досталась шестилетней Машеньке Журавлёвой. Малышка заступилась за Сморчка перед лицом самого Хранителя. Справится ли Машенька с возложенной на неё миссией? Поможет ли колдуну, спасёт ли Антресолию от монстров? Насколько велика сила её Чистого Сердца?', 'stream_drawings_all.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `date`, `user_id`, `article_id`, `comment`, `allow`) VALUES
(3, '2019-02-06', 3, 2, 'Yes, this book is very interesting for reading Yes, this book is very interesting for readingYes, this book is very interesting for reading\r\n', 1),
(5, '2019-04-21', 3, 2, 'Yes, this book is  interesting for reading very well', 1),
(6, '2019-04-21', 3, 3, 'Yes, this book is very interesting for reading ok!!', 1),
(7, '2019-04-21', 3, 2, 'Yes, this book is very interesting for reading ok!!', 1),
(8, '2019-08-07', 4, 2, 'hi', 0),
(9, '2019-09-08', 5, 3, 'Поучительная книга, которая рассказывает о захватывающих приключениях детей и буквенных героев в сказочной стране Антресолии', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `first_story`
--

CREATE TABLE `first_story` (
  `id` int(11) NOT NULL,
  `text` text,
  `image_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_slider` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `image_path`, `date_create`, `date_update`, `is_slider`) VALUES
(1, 'antresolia2.jpg', '2019-08-16 04:13:59', '0000-00-00 00:00:00', 0),
(2, 'steam_drawings.jpg', '2019-04-19 16:12:28', '0000-00-00 00:00:00', 0),
(3, 'petunka.jpg', '2019-04-26 10:46:21', '0000-00-00 00:00:00', 0),
(6, 'logo.png', '2019-05-07 15:45:43', '0000-00-00 00:00:00', 0),
(41, '1.jpg', '2019-05-07 19:12:07', '0000-00-00 00:00:00', 1),
(43, '3.jpg', '2019-05-07 19:12:15', '0000-00-00 00:00:00', 1),
(45, '5.jpg', '2019-05-07 19:12:21', '0000-00-00 00:00:00', 1),
(47, '7.jpg', '2019-05-07 19:12:29', '0000-00-00 00:00:00', 1),
(48, '8.jpg', '2019-05-07 19:12:36', '0000-00-00 00:00:00', 1),
(49, '9.jpg', '2019-05-07 19:12:40', '0000-00-00 00:00:00', 1),
(50, '10.jpg', '2019-05-07 19:12:44', '0000-00-00 00:00:00', 1),
(51, '11.jpg', '2019-05-07 19:12:57', '0000-00-00 00:00:00', 1),
(54, '14.jpg', '2019-05-07 19:13:05', '0000-00-00 00:00:00', 1),
(55, '15.jpg', '2019-05-07 19:13:09', '0000-00-00 00:00:00', 1),
(57, '17.jpg', '2019-07-08 12:32:06', '0000-00-00 00:00:00', 1),
(58, '18.jpg', '2019-07-08 12:32:06', '0000-00-00 00:00:00', 1),
(61, 'youtube.png', '2019-09-22 13:59:01', '0000-00-00 00:00:00', 0),
(62, 'vk.png', '2019-09-22 13:58:45', '0000-00-00 00:00:00', 0),
(63, 'twitter.png', '2019-09-22 13:58:28', '0000-00-00 00:00:00', 0),
(64, 'instagram.png', '2019-09-22 13:58:24', '0000-00-00 00:00:00', 0),
(65, 'facebook.png', '2019-09-22 13:56:31', '0000-00-00 00:00:00', 0),
(66, 'google.png', '2019-09-22 13:56:31', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `linl`
--

CREATE TABLE `linl` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message_text` text,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `article_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `quote_text` text NOT NULL,
  `quote` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quote`
--

INSERT INTO `quote` (`id`, `quote_text`, `quote`) VALUES
(1, 'Верьте в себя, Вы и есть настоящее чудо!\r\n                           Не откладывайте свои желания на антресоли. \r\n                           Ибо сомневающийся подобен волнам, ветром гонимым и о камни разбиваемым...\r\n', '0'),
(3, '\'\',\'<p>Привет, друзья!</p>\' +\r\n        \'<p>От чистого сердца приглашаю Вас \' +\r\n        \'совершить вместе со мной путешествие в<p> Антресолевую страну</p> \' +\r\n        \'и лично познакомиться с ее загадочными жителями!</p> \' +\r\n        \'<p>Дверь в мои сказки открыта для всех -\'+\r\n        \'и для малышей, и для взрослых.</p>\'+\r\n        \' <p>P.S.</p>\'+\r\n        \'<p>По секрету делюсь волшебным кодом к Двери:</p> \'+\r\n        \'<p>Абра-ар, Бурундун, Вьюга-Вьюн, Гагатун, Дзинь-да-да!</p> \'+\r\n        \'<p>Только тс-с...  Никому!!!</p>\'', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `scroll`
--

CREATE TABLE `scroll` (
  `id` int(11) NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scroll`
--

INSERT INTO `scroll` (`id`, `text`) VALUES
(1, 'Привет, друзья!\r\nОт чистого сердца приглашаю Вас совершить вместе со мной путешествие в Антресолевую страну и лично познакомиться с ее загадочными жителями! Дверь в мои сказки открыта для всех - и для малышей, и для взрослых.\r\nP.S.\r\nПо секрету делюсь волшебным кодом к Двери: \r\nАбра-ар, Бурундун, Вьюга-Вьюн, Гагатун, Дзинь-да-да!\r\nТолько тс-с... Никому!!!');

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `image_id` int(10) DEFAULT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `path`, `image_id`, `title`) VALUES
(2, 'https://www.facebook.com/profile.php?id=100037646226486', 65, 'facebook'),
(5, 'https://vk.com/id321837818', 62, 'vk'),
(6, 'https://twitter.com/Antresolca?', 63, 'twitter'),
(9, 'https://www.youtube.com/channel/UCW4MkL5S0_j1cbv2VsrySvQ', 61, 'youtube'),
(10, 'https://www.instagram.com/irina_malchukova/?hl=ru', 64, 'instagram'),
(11, NULL, 66, 'google+');

-- --------------------------------------------------------

--
-- Структура таблицы `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `link_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_confirm` varchar(255) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image_id` int(11) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `password_confirm`, `date_create`, `date_update`, `image_id`, `auth_key`, `phone`) VALUES
(1, 'Ирина', 'Мальчукова', '', '$2y$13$dWvwnKSoyCMQ1iOlPTGlG.QL/pyaRrfTYilUxnHuYx9x.omRahOFS', NULL, '2019-06-17 08:50:50', '0000-00-00 00:00:00', NULL, '', '+38 066 301 4645'),
(3, 'Elena', '', 'elena.mironenko1201@gmail.com', '$2y$13$pZ7VlZtGKhZYEujaZ25IH.Pp6TJKFylLGsw2NLk5cKzTQqpKs3njW', NULL, '2019-04-19 13:49:18', '0000-00-00 00:00:00', NULL, '', ''),
(4, 'Лена', '', '', NULL, NULL, '2019-08-07 15:34:46', '0000-00-00 00:00:00', NULL, '', ''),
(5, 'Светлана', '', '', NULL, NULL, '2019-09-08 18:10:48', '0000-00-00 00:00:00', NULL, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `path` text,
  `article_id` int(11) DEFAULT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id`, `path`, `article_id`, `new`) VALUES
(1, '<iframe src=\"https://www.youtube.com/embed/hideVjpaVBI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>\r\n</iframe>', NULL, 1),
(2, '<iframe\r\n                                      src=\"https://www.youtube.com/embed/MO_BnnHMCf4?start=4\"\r\n                                      frameborder=\"0\"\r\n                                      allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\"\r\n                                      allowfullscreen>\r\n                              </iframe>', NULL, 1),
(3, '<iframe src=\"https://www.youtube.com/embed/hideVjpaVBI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>\r\n</iframe>', NULL, 1),
(4, 'https://www.youtube.com/watch?v=MO_BnnHMCf4', NULL, 0),
(5, 'https://www.youtube.com/watch?v=MO_BnnHMCf4', NULL, 0),
(6, 'https://www.youtube.com/watch?v=MO_BnnHMCf4', NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `first_story`
--
ALTER TABLE `first_story`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_path` (`image_path`);

--
-- Индексы таблицы `linl`
--
ALTER TABLE `linl`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `scroll`
--
ALTER TABLE `scroll`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `first_story`
--
ALTER TABLE `first_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `linl`
--
ALTER TABLE `linl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `scroll`
--
ALTER TABLE `scroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `first_story`
--
ALTER TABLE `first_story`
  ADD CONSTRAINT `first_story_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
