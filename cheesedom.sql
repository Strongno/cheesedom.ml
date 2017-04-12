-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2016 г., 11:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cheesedom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Соленые', 1),
(2, 'Сладкие', 1),
(3, 'Кислые', 1),
(4, 'Острые', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `comment`, `date`, `email`, `name`) VALUES
(1, 1, 'выыфвыфвфы', '2016-04-28 08:46:54', 'sdasda@mail.ru', 'ваыфавыф');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `body` text NOT NULL,
  `additional` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL DEFAULT 'Admin',
  `for_slider` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `body`, `additional`, `date`, `author`, `for_slider`) VALUES
(1, 'NEW BANNER FREE VECTOR GRAPHIC', 'news_pic_1', 'Lorem ipsum dolor sit amet, consequat blandit scelerisque lacus in quis. Felis cras, adipisci in ac donec donec nulla quis. Luctus justo ultricies at, ligula dolor quis, dictum libero facilisis potenti. Ipsum consequat, purus nibh eget ea pede dis. Neque in qui aenean purus. Quis orci sed at aliquet, tempor facilisis turpis sapien molestie rutrum, mus orci malesuada dis integer dignissim dui, tempor ligula commodo lobortis ac. Ut urna varius quis odio tortor, elementum enim vestibulum. Sed lorem. Amet diam, aptent facere, nec ullamcorper, viverra nam et ut suscipit, ornare ut sed urna sem cursus id.', '', '2016-03-26 07:56:42', 'Admin', 1),
(2, 'DECORATIVE FRAME FREE VECTOR GRAPHIC', 'news_pic_4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis, lectus eu tempor posuere, augue nisi blandit ante, non tempor nibh lorem non ante. Donec mollis vulputate aliquam. Aliquam luctus placerat ipsum sed volutpat. Sed rhoncus, odio nec iaculis faucibus, felis risus pulvinar leo, sed suscipit ipsum sapien vel arcu. Nullam ac varius nisi. Duis pulvinar, dolor et dignissim porta, nunc risus laoreet tellus, pellentesque consectetur nibh dui sit amet purus. Curabitur a mauris sapien, a tempus justo. Nunc aliquam vehicula dapibus. Ut nec nulla nunc, vel adipiscing libero. Nam suscipit orci ac est blandit volutpat. Phasellus dignissim velit vitae mauris sodales lacinia mollis magna vulputate. Phasellus aliquam est eros, nec pharetra risus. Suspendisse dictum nunc eget lectus sodales lobortis. Aenean scelerisque suscipit tempor. Sed viverra sollicitudin mauris sit amet pulvinar.', '', '2016-03-26 07:57:42', 'Admin', 1),
(3, 'DECORATIVE FRAME FREE VECTOR GRAPHIC', 'news_pic_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis, lectus eu tempor posuere, augue nisi blandit ante, non tempor nibh lorem non ante. Donec mollis vulputate aliquam. Aliquam luctus placerat ipsum sed volutpat. Sed rhoncus, odio nec iaculis faucibus, felis risus pulvinar leo, sed suscipit ipsum sapien vel arcu. Nullam ac varius nisi. Duis pulvinar, dolor et dignissim porta, nunc risus laoreet tellus, pellentesque consectetur nibh dui sit amet purus. Curabitur a mauris sapien, a tempus justo. Nunc aliquam vehicula dapibus. Ut nec nulla nunc, vel adipiscing libero. Nam suscipit orci ac est blandit volutpat. Phasellus dignissim velit vitae mauris sodales lacinia mollis magna vulputate. Phasellus aliquam est eros, nec pharetra risus. Suspendisse dictum nunc eget lectus sodales lobortis. Aenean scelerisque suscipit tempor. Sed viverra sollicitudin mauris sit amet pulvinar.', '', '2016-03-26 07:57:42', 'Admin', 1),
(4, 'NEW BANNER FREE VECTOR GRAPHIC', 'news_pic_1', 'Lorem ipsum dolor sit amet, consequat blandit scelerisque lacus in quis. Felis cras, adipisci in ac donec donec nulla quis. Luctus justo ultricies at, ligula dolor quis, dictum libero facilisis potenti. Ipsum consequat, purus nibh eget ea pede dis. Neque in qui aenean purus. Quis orci sed at aliquet, tempor facilisis turpis sapien molestie rutrum, mus orci malesuada dis integer dignissim dui, tempor ligula commodo lobortis ac. Ut urna varius quis odio tortor, elementum enim vestibulum. Sed lorem. Amet diam, aptent facere, nec ullamcorper, viverra nam et ut suscipit, ornare ut sed urna sem cursus id.', '', '2016-03-26 07:56:42', 'Admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_comment` text NOT NULL,
  `user_telephone` text NOT NULL,
  `user_id` text NOT NULL,
  `dates` text NOT NULL,
  `products` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_email`, `user_comment`, `user_telephone`, `user_id`, `dates`, `products`) VALUES
(21, 'dsadas', 'rostme@mail.ru', 'dasdas', 'dasdasdasd', 'none', '21:03--14-04-2016', '__Качотта(0.5)'),
(22, '2131312', 'rostme@mail.ru', '31312', '312312312312', 'none', '21:06--14-04-2016', '__Качотта(0.5)');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `materials` text NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `header`, `body`, `price`, `description`, `materials`, `stock`, `category_id`, `image`) VALUES
(4, 'Качотта', 'Cтруктура мягкая, пластичная, готовится с добавлением паприки и пажитника, что придает сыру неповторимый вкус. Молодой сыр готов к употреблению через 10 дней, зрелый через 2 месяца.', 195, 'Cтруктура мягкая, пластичная, готовится с добавлением паприки и пажитника, что придает сыру неповторимый вкус. Молодой сыр готов к употреблению через 10 дней, зрелый через 2 месяца.', 'Cтруктура мягкая, пластичная, готовится с добавлением паприки и пажитника, что придает сыру неповторимый вкус. Молодой сыр готов к употреблению через 10 дней, зрелый через 2 месяца.', 1, 1, '../../template/images/Kach'),
(5, 'Мраморный', 'мягкий сливочный вкус, двухцветный сыр смотрится оригинально на праздничном столе (используется натуральный краситель  АННАТО). Срок созревания 20 дней.', 180, 'мягкий сливочный вкус, двухцветный сыр смотрится оригинально на праздничном столе (используется натуральный краситель  АННАТО). Срок созревания 20 дней.', 'мягкий сливочный вкус, двухцветный сыр смотрится оригинально на праздничном столе (используется натуральный краситель  АННАТО). Срок созревания 20 дней.', 1, 2, '../../template/images/Mram'),
(10, 'Голландский', 'национальный продукт Голландии. Вкусный, умеренно пикантный сыр, консистенция этого продукта плотная, но при этом она достаточно эластичная. Срок созревания 40 дней.', 190, 'национальный продукт Голландии. Вкусный, умеренно пикантный сыр, консистенция этого продукта плотная, но при этом она достаточно эластичная. Срок созревания 40 дней.', 'национальный продукт Голландии. Вкусный, умеренно пикантный сыр, консистенция этого продукта плотная, но при этом она достаточно эластичная. Срок созревания 40 дней.', 1, 1, ''),
(11, 'Гауда', 'сыр с упругой консистенцией, в меру пикантный, со сладковатым привкусом. Срок созревания 40 дней.', 190, 'сыр с упругой консистенцией, в меру пикантный, со сладковатым привкусом. Срок созревания 40 дней.', 'сыр с упругой консистенцией, в меру пикантный, со сладковатым привкусом. Срок созревания 40 дней.', 1, 2, ''),
(12, 'Маасдам', 'отличительной чертой, которая, безусловно, выделяет сыр Маасдам, придавая ему оригинальность, являются большие дыры, называемые «глазками». Срок созревания 40 дней.', 190, 'отличительной чертой, которая, безусловно, выделяет сыр Маасдам, придавая ему оригинальность, являются большие дыры, называемые «глазками». Срок созревания 40 дней.', 'отличительной чертой, которая, безусловно, выделяет сыр Маасдам, придавая ему оригинальность, являются большие дыры, называемые «глазками». Срок созревания 40 дней.', 1, 3, ''),
(13, 'Адыгейский', '"гладкая",нежная консистенция, при этом достаточно плотная и чудесный сливочный вкус. Срок созревания сутки.', 110, '"гладкая",нежная консистенция, при этом достаточно плотная и чудесный сливочный вкус. Срок созревания сутки.', '"гладкая",нежная консистенция, при этом достаточно плотная и чудесный сливочный вкус. Срок созревания сутки.', 1, 1, '../../template/images/Adeg'),
(14, 'Осетинский', 'аромат специй и трав неразделимо сольется в симфонии вкуса со сливочным вкусом сыра. Срок созревания сутки.', 110, 'аромат специй и трав неразделимо сольется в симфонии вкуса со сливочным вкусом сыра. Срок созревания сутки.', 'аромат специй и трав неразделимо сольется в симфонии вкуса со сливочным вкусом сыра. Срок созревания сутки.', 1, 1, '../../template/images/Oset'),
(15, 'Рикотта', 'традиционный итальянский молочный сыр, творожной нежнейшей консистенции, имеет сладковатый вкус. Срок созревания сутки.', 70, 'традиционный итальянский молочный сыр, творожной нежнейшей консистенции, имеет сладковатый вкус. Срок созревания сутки.', 'традиционный итальянский молочный сыр, творожной нежнейшей консистенции, имеет сладковатый вкус. Срок созревания сутки.', 1, 2, ''),
(16, 'Фета', 'внешне Фета напоминает молодой прессованный творог, однако вкус у сыра более выразительный, солоноватый, с нежной молочной кислинкой. Срок созревания ____ дней.', 100, 'внешне Фета напоминает молодой прессованный творог, однако вкус у сыра более выразительный, солоноватый, с нежной молочной кислинкой. Срок созревания ____ дней.', 'внешне Фета напоминает молодой прессованный творог, однако вкус у сыра более выразительный, солоноватый, с нежной молочной кислинкой. Срок созревания ____ дней.', 1, 3, ''),
(17, 'Бри', 'Аромат с ореховой ноткой, с белой плесенью, вкус пикантный, свойственный всем сырам с плесенью. Чем дольше вызревает БРИ, тем более ярким вкусом и ароматом он будет обладать. Срок созревания от 14 дней.', 180, 'Аромат с ореховой ноткой, с белой плесенью, вкус пикантный, свойственный всем сырам с плесенью. Чем дольше вызревает БРИ, тем более ярким вкусом и ароматом он будет обладать. Срок созревания от 14 дней.', 'Аромат с ореховой ноткой, с белой плесенью, вкус пикантный, свойственный всем сырам с плесенью. Чем дольше вызревает БРИ, тем более ярким вкусом и ароматом он будет обладать. Срок созревания от 14 дней.', 1, 4, '../../template/images/Bri'),
(18, 'Камамбер', 'С белой плесенью, вкус имеет ярко выраженную грибную ноту, чем больше времени проходит с момента приготовления сыра, тем более насыщенным и пикантным ароматом он обладает. Срок созревания от 14 дней.', 180, 'С белой плесенью, вкус имеет ярко выраженную грибную ноту, чем больше времени проходит с момента приготовления сыра, тем более насыщенным и пикантным ароматом он обладает. Срок созревания от 14 дней.', 'С белой плесенью, вкус имеет ярко выраженную грибную ноту, чем больше времени проходит с момента приготовления сыра, тем более насыщенным и пикантным ароматом он обладает. Срок созревания от 14 дней.', 1, 3, ''),
(19, 'Дор Блю', 'изысканный сыр с белой и синей плесенью, с маслянистой, пористой, нежной структурой, ярким, пикантным, изысканным ароматом, умеренно острый. Срок созревания от 14 дней.', 195, 'изысканный сыр с белой и синей плесенью, с маслянистой, пористой, нежной структурой, ярким, пикантным, изысканным ароматом, умеренно острый. Срок созревания от 14 дней.', 'изысканный сыр с белой и синей плесенью, с маслянистой, пористой, нежной структурой, ярким, пикантным, изысканным ароматом, умеренно острый. Срок созревания от 14 дней.', 1, 4, ''),
(20, 'Рокфор', 'самый знаменитый из всего семейства сыров с благородной, голубой плесенью. Он похож по вкусу на лесные орехи с добавлением различных запахов, нежной, пористой мякотью, с красивыми разводами благородной голубой плесени - любимец рестораторов! Идеально сочетается не только с овощами, но и с фруктами. Даже просто на свежем хлебе Рокфор украсит любой стол. Срок созревания от 35 дней.', 180, 'самый знаменитый из всего семейства сыров с благородной, голубой плесенью. Он похож по вкусу на лесные орехи с добавлением различных запахов, нежной, пористой мякотью, с красивыми разводами благородной голубой плесени - любимец рестораторов! Идеально сочетается не только с овощами, но и с фруктами. Даже просто на свежем хлебе Рокфор украсит любой стол. Срок созревания от 35 дней.', 'самый знаменитый из всего семейства сыров с благородной, голубой плесенью. Он похож по вкусу на лесные орехи с добавлением различных запахов, нежной, пористой мякотью, с красивыми разводами благородной голубой плесени - любимец рестораторов! Идеально сочетается не только с овощами, но и с фруктами. Даже просто на свежем хлебе Рокфор украсит любой стол. Срок созревания от 35 дней.', 1, 3, '../../template/images/Dor');

-- --------------------------------------------------------

--
-- Структура таблицы `slider_image`
--

CREATE TABLE IF NOT EXISTS `slider_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `slider_image`
--

INSERT INTO `slider_image` (`id`, `image`) VALUES
(1, 'slider_1'),
(4, 'slider_2'),
(6, 'slider_3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `other` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `telephone`, `password`, `other`) VALUES
(1, 'Oleg', 'asdas', 'dasd@mail.ru', 2147483647, '123455', ''),
(2, 'oleg', 'rost', 'rostme@mail.ru', 123456789, '123456', ''),
(3, 'dasdsa', 'ddasd', 'ddasdas@mail.ru', 662874081, 'dasdas', ''),
(4, 'dasdas', 'ddsadas', 'sdaDdsa@mail.ru', 0, '2312312312', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
