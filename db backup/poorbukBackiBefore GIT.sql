-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 03:46:41
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `poorbuk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_amigo_table`
--

CREATE TABLE `poorbuk_amigo_table` (
  `amigoid` bigint(20) NOT NULL,
  `amigouserid` bigint(20) NOT NULL,
  `amigofriendid` bigint(20) NOT NULL,
  `amigofriendstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poorbuk_amigo_table`
--

INSERT INTO `poorbuk_amigo_table` (`amigoid`, `amigouserid`, `amigofriendid`, `amigofriendstatus`) VALUES
(1, 3, 1, 'AMIGO'),
(2, 3, 2, 'AMIGO'),
(4, 4, 1, 'AMIGO'),
(5, 4, 2, 'AMIGO'),
(6, 4, 3, 'AMIGO'),
(7, 5, 1, 'AMIGO'),
(8, 5, 4, 'REQUEST SENDED'),
(9, 1, 9, 'REQUEST SENDED'),
(10, 2, 8, 'REQUEST SENDED'),
(11, 2, 10, 'AMIGO'),
(12, 2, 1, 'AMIGO'),
(13, 3, 10, 'AMIGO'),
(14, 3, 8, 'REQUEST SENDED'),
(15, 3, 5, 'REQUEST SENDED'),
(16, 3, 6, 'REQUEST SENDED'),
(17, 3, 7, 'REQUEST SENDED'),
(18, 2, 5, 'REQUEST SENDED'),
(19, 2, 7, 'REQUEST SENDED');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_cms_menu_table`
--

CREATE TABLE `poorbuk_cms_menu_table` (
  `mId` bigint(20) NOT NULL,
  `mUId` bigint(20) NOT NULL,
  `mWebId` bigint(20) NOT NULL,
  `mPId` bigint(20) NOT NULL,
  `mName` varchar(200) NOT NULL,
  `mParent` varchar(200) NOT NULL,
  `mUrl` varchar(200) NOT NULL,
  `mWebsiteName` varchar(200) NOT NULL,
  `mActive` varchar(20) NOT NULL,
  `mPosition` int(11) NOT NULL,
  `mType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_cms_postgarbage_table`
--

CREATE TABLE `poorbuk_cms_postgarbage_table` (
  `pGarbageId` bigint(20) NOT NULL,
  `pWebId` bigint(20) NOT NULL,
  `pWebsiteName` varchar(200) NOT NULL,
  `pId` bigint(20) NOT NULL,
  `pUId` bigint(20) NOT NULL,
  `pGuestUId` varchar(3000) NOT NULL,
  `pTitle` varchar(200) NOT NULL,
  `pUrl` varchar(200) NOT NULL,
  `pTextEditorHTML` longtext NOT NULL,
  `pHeader` varchar(200) NOT NULL DEFAULT 'header.php',
  `pMenu` varchar(200) NOT NULL DEFAULT 'menu.php',
  `pContent` varchar(200) NOT NULL,
  `pFooter` varchar(200) NOT NULL DEFAULT 'footer.php',
  `pType` varchar(20) NOT NULL DEFAULT '',
  `pDateHour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pPublished` varchar(20) NOT NULL DEFAULT 'YES',
  `pCommentAllowed` varchar(20) NOT NULL DEFAULT 'NO',
  `pLoveAllowed` varchar(20) NOT NULL,
  `pLoveCounter` bigint(20) NOT NULL DEFAULT '0',
  `pPass` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_cms_post_table`
--

CREATE TABLE `poorbuk_cms_post_table` (
  `pId` bigint(20) NOT NULL,
  `pWebId` bigint(20) NOT NULL,
  `pWebsiteName` varchar(200) NOT NULL,
  `pUId` bigint(20) NOT NULL,
  `pGuestUId` varchar(3000) NOT NULL,
  `pTitle` varchar(200) NOT NULL,
  `pUrl` varchar(200) NOT NULL,
  `pTextEditorHTML` longtext NOT NULL,
  `pHeader` varchar(200) NOT NULL DEFAULT 'header.php',
  `pMenu` varchar(200) NOT NULL DEFAULT 'menu.php',
  `pContent` varchar(200) NOT NULL,
  `pFooter` varchar(200) NOT NULL DEFAULT 'footer.php',
  `pType` varchar(20) NOT NULL DEFAULT '',
  `pDateHour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pPublished` varchar(20) NOT NULL DEFAULT 'YES',
  `pCommentAllowed` varchar(20) NOT NULL DEFAULT 'NO',
  `pLoveAllowed` varchar(20) NOT NULL,
  `pLoveCounter` bigint(20) NOT NULL DEFAULT '0',
  `pPass` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_cms_websites_table`
--

CREATE TABLE `poorbuk_cms_websites_table` (
  `webId` bigint(20) NOT NULL,
  `webName` varchar(200) NOT NULL,
  `webUsersIDs` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_comment_table`
--

CREATE TABLE `poorbuk_comment_table` (
  `commentid` bigint(20) NOT NULL,
  `commentpostid` bigint(20) NOT NULL,
  `commentcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentuserid` bigint(20) NOT NULL,
  `commentdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poorbuk_comment_table`
--

INSERT INTO `poorbuk_comment_table` (`commentid`, `commentpostid`, `commentcontent`, `commentuserid`, `commentdatehour`) VALUES
(1, 7, 'HOLA', 1, '2018-03-18 04:45:35'),
(2, 7, 'COMO ESTAS', 1, '2018-03-18 04:45:46'),
(3, 7, 'YO BIEN...Y TU?', 1, '2018-03-18 04:46:15'),
(4, 7, 'DE MARAVILLA', 1, '2018-03-18 04:46:29'),
(5, 17, 'hola jarim. Buen rollito :)', 1, '2018-03-18 17:08:32'),
(6, 21, 'Nunca :)', 1, '2018-03-23 17:08:37'),
(7, 21, 'Vamos...', 1, '2018-03-23 17:13:05'),
(8, 21, 'Vergaaaa :)', 1, '2018-03-23 17:14:46'),
(9, 21, 'hola', 1, '2018-03-23 17:54:24'),
(10, 21, 'xxx', 1, '2018-03-23 17:56:43'),
(11, 21, 'vvv', 1, '2018-03-23 17:57:05'),
(12, 21, 'b', 1, '2018-03-23 17:58:36'),
(13, 21, 'c', 1, '2018-03-23 17:58:42'),
(14, 21, 'dd', 1, '2018-03-23 17:59:07'),
(15, 21, 'xxxx', 1, '2018-03-23 18:01:24'),
(16, 21, 'c\n					', 1, '2018-03-23 18:01:54'),
(17, 21, 'vvv', 1, '2018-03-23 18:02:34'),
(18, 21, 'bb', 1, '2018-03-23 18:03:07'),
(19, 21, 'ggg', 1, '2018-03-23 18:03:22'),
(20, 21, 'fff', 1, '2018-03-23 18:03:54'),
(21, 21, 'bbb', 1, '2018-03-24 08:03:48'),
(22, 22, 'eeee', 1, '2018-03-24 08:05:03'),
(23, 23, 'Hola nr. 3. Bienvenido :)', 1, '2018-03-24 09:19:59'),
(24, 25, 'Hola tronco. QuÃ© tal te va?', 1, '2018-03-25 01:18:13'),
(25, 29, 'Ole :)', 2, '2018-03-26 03:15:43'),
(26, 23, 'olas del mar :)', 2, '2018-03-27 17:23:50'),
(27, 26, 'Hola tronco test 1', 2, '2018-03-28 17:53:26'),
(28, 26, 'Hola tronco test 1 notifications', 2, '2018-03-28 17:53:36'),
(29, 26, 'Hola tronco test 1 notifications', 2, '2018-03-28 17:53:39'),
(30, 26, 'Hola tronco test 1 notifications', 2, '2018-03-28 17:53:42'),
(31, 26, 'Hola tronco test 1 notifications', 2, '2018-03-28 17:53:44'),
(32, 26, 'Hola tronco test 1 notifications', 2, '2018-03-28 17:53:48'),
(33, 22, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:01'),
(34, 21, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:08'),
(35, 20, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:13'),
(36, 19, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:21'),
(37, 18, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:31'),
(38, 17, 'Hola tronco test 1 notifications\n					', 2, '2018-03-28 17:54:38'),
(39, 31, 'Hola test 1', 1, '2018-03-28 18:10:06'),
(40, 31, 'Hola test 1', 1, '2018-03-28 18:10:09'),
(41, 29, 'Hola test 1\n					', 1, '2018-03-28 18:10:54'),
(42, 29, 'Hola test 1', 1, '2018-03-28 18:10:57'),
(43, 26, 'Hola troncos', 2, '2018-03-29 18:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_event_table`
--

CREATE TABLE `poorbuk_event_table` (
  `eventid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `titel` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `stampdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventdate` date NOT NULL,
  `eventtime` time NOT NULL,
  `eventfor` varchar(30) NOT NULL DEFAULT 'me and friends'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_filelinks_table`
--

CREATE TABLE `poorbuk_filelinks_table` (
  `fileLinksTableId` bigint(20) NOT NULL,
  `myFileName` varchar(300) COLLATE utf8_estonian_ci NOT NULL,
  `myFilePath` varchar(300) COLLATE utf8_estonian_ci NOT NULL,
  `userFolder` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `linksUID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_guestbook_table`
--

CREATE TABLE `poorbuk_guestbook_table` (
  `guestbooid` bigint(20) NOT NULL,
  `guestbookpost` varchar(3000) NOT NULL,
  `guestbookuser` varchar(30) NOT NULL,
  `guestbooktimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_instacomment_table`
--

CREATE TABLE `poorbuk_instacomment_table` (
  `instacommentid` bigint(20) NOT NULL,
  `instaid` bigint(20) NOT NULL,
  `instacommenttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `instacommentworkers` varchar(300) NOT NULL,
  `instacommentresume` varchar(3000) NOT NULL,
  `instacommentmaterial` varchar(3000) NOT NULL,
  `instacommentconclusion` varchar(3000) NOT NULL,
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_instacontact_table`
--

CREATE TABLE `poorbuk_instacontact_table` (
  `instacontactid` bigint(20) NOT NULL,
  `instacontactname` varchar(40) NOT NULL,
  `instacontactphone` varchar(20) NOT NULL,
  `instaid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_insta_table`
--

CREATE TABLE `poorbuk_insta_table` (
  `instaid` bigint(20) NOT NULL,
  `instaname` varchar(500) NOT NULL,
  `instaaddress` varchar(500) NOT NULL,
  `instacity` varchar(30) NOT NULL,
  `instazip` varchar(15) NOT NULL,
  `instanotas` varchar(3000) NOT NULL,
  `instamaterial` varchar(3000) NOT NULL,
  `instatimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_ip_table`
--

CREATE TABLE `poorbuk_ip_table` (
  `ipid` bigint(20) NOT NULL,
  `ipadr` varchar(50) NOT NULL,
  `ipuserid` bigint(20) NOT NULL,
  `iptimenow` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poorbuk_ip_table`
--

INSERT INTO `poorbuk_ip_table` (`ipid`, `ipadr`, `ipuserid`, `iptimenow`) VALUES
(47, '::1', 4, '2018-03-25 16:35:56'),
(64, '::1', 5, '2018-03-26 18:50:53'),
(65, '::1', 6, '2018-03-26 19:00:57'),
(66, '::1', 7, '2018-03-26 19:04:32'),
(67, '::1', 8, '2018-03-26 19:10:05'),
(68, '::1', 9, '2018-03-26 19:24:20'),
(94, '::1', 3, '2018-03-30 18:55:32'),
(102, '::1', 2, '2018-04-06 18:07:02'),
(103, '::1', 10, '2018-05-03 16:16:13'),
(104, '::1', 1, '2019-11-30 02:44:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_love_table`
--

CREATE TABLE `poorbuk_love_table` (
  `loveid` bigint(20) NOT NULL,
  `lovepostid` bigint(20) NOT NULL,
  `loveuserid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poorbuk_love_table`
--

INSERT INTO `poorbuk_love_table` (`loveid`, `lovepostid`, `loveuserid`) VALUES
(1, 15, 1),
(2, 21, 1),
(3, 22, 3),
(4, 24, 3),
(5, 24, 1),
(6, 25, 1),
(7, 23, 1),
(9, 27, 2),
(11, 29, 1),
(12, 28, 1),
(13, 26, 2),
(14, 22, 2),
(15, 21, 2),
(16, 20, 2),
(17, 19, 2),
(18, 18, 2),
(19, 17, 2),
(20, 34, 3),
(21, 33, 3),
(22, 32, 3),
(23, 31, 3),
(24, 29, 3),
(25, 27, 3),
(26, 26, 3),
(27, 32, 1),
(28, 33, 2),
(29, 32, 2),
(30, 31, 2),
(31, 29, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_messageindex_table`
--

CREATE TABLE `poorbuk_messageindex_table` (
  `id` bigint(20) NOT NULL,
  `messageid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_message_table`
--

CREATE TABLE `poorbuk_message_table` (
  `messageid` bigint(20) NOT NULL,
  `fromid` bigint(20) NOT NULL,
  `toid` varchar(2000) NOT NULL,
  `toname` varchar(3000) NOT NULL,
  `messagetext` varchar(3000) NOT NULL,
  `messagedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_notifications_table`
--

CREATE TABLE `poorbuk_notifications_table` (
  `notificationsid` bigint(20) NOT NULL,
  `fromuserid` bigint(20) NOT NULL,
  `touserid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow',
  `postid` bigint(20) NOT NULL,
  `handling` varchar(40) NOT NULL,
  `notificationdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poorbuk_notifications_table`
--

INSERT INTO `poorbuk_notifications_table` (`notificationsid`, `fromuserid`, `touserid`, `seencolor`, `postid`, `handling`, `notificationdatehour`) VALUES
(1, 1, 1, 'white', 0, 'comment follow', '2018-03-17 17:33:20'),
(2, 1, 1, 'white', 0, 'comment follow', '2018-03-17 17:57:19'),
(3, 1, 1, 'white', 0, 'comment follow', '2018-03-18 04:17:44'),
(4, 1, 1, 'white', 0, 'comment follow', '2018-03-18 04:20:22'),
(5, 1, 1, 'white', 0, 'comment follow', '2018-03-18 04:21:39'),
(6, 1, 1, 'white', 0, 'comment follow', '2018-03-18 04:25:03'),
(7, 1, 1, 'white', 0, 'comment follow', '2018-03-18 04:44:56'),
(11, 1, 1, 'white', 7, 'comment follow', '2018-03-18 04:46:29'),
(12, 1, 1, 'white', 0, 'comment follow', '2018-03-18 15:47:14'),
(13, 1, 1, 'white', 0, 'comment follow', '2018-03-18 15:49:57'),
(14, 1, 1, 'white', 0, 'comment follow', '2018-03-18 15:53:11'),
(15, 1, 1, 'white', 0, 'comment follow', '2018-03-18 15:56:32'),
(16, 1, 1, 'white', 13, 'comment follow', '2018-03-18 16:05:08'),
(17, 1, 1, 'white', 14, 'comment follow', '2018-03-18 16:10:51'),
(18, 1, 1, 'white', 15, 'comment follow', '2018-03-18 16:11:35'),
(19, 1, 0, 'yellow', 15, 'love', '2018-03-18 16:11:40'),
(20, 1, 0, 'yellow', 15, 'clon', '2018-03-18 16:11:45'),
(22, 1, 1, 'white', 17, 'comment follow', '2018-03-18 17:08:32'),
(23, 1, 1, 'white', 18, 'comment follow', '2018-03-19 02:16:35'),
(24, 1, 1, 'white', 19, 'comment follow', '2018-03-19 02:16:49'),
(25, 1, 1, 'white', 20, 'comment follow', '2018-03-19 02:17:20'),
(42, 1, 1, 'white', 21, 'comment follow', '2018-03-24 08:03:48'),
(44, 1, 1, 'white', 22, 'comment follow', '2018-03-24 08:05:03'),
(45, 3, 3, 'white', 23, 'comment follow', '2018-03-24 09:19:15'),
(46, 1, 1, 'white', 23, 'comment follow', '2018-03-24 09:19:59'),
(47, 2, 2, 'white', 24, 'comment follow', '2018-03-24 09:21:57'),
(48, 3, 1, 'white', 22, 'love', '2018-03-24 09:28:46'),
(49, 3, 2, 'white', 24, 'love', '2018-03-24 09:28:52'),
(50, 3, 3, 'yellow', 25, 'comment follow', '2018-03-25 01:13:37'),
(51, 1, 2, 'white', 24, 'love', '2018-03-25 01:17:55'),
(52, 1, 3, 'yellow', 25, 'love', '2018-03-25 01:17:58'),
(53, 1, 1, 'white', 25, 'comment follow', '2018-03-25 01:18:14'),
(54, 1, 1, 'white', 26, 'comment follow', '2018-03-25 01:18:53'),
(55, 1, 3, 'white', 23, 'love', '2018-03-25 08:01:19'),
(56, 4, 4, 'white', 27, 'comment follow', '2018-03-25 16:36:48'),
(57, 5, 5, 'white', 28, 'comment follow', '2018-03-25 17:17:43'),
(59, 2, 2, 'white', 29, 'comment follow', '2018-03-26 03:15:43'),
(60, 5, 5, 'white', 30, 'comment follow', '2018-03-26 17:28:41'),
(61, 2, 2, 'white', 31, 'comment follow', '2018-03-27 16:48:18'),
(62, 2, 4, 'yellow', 27, 'love', '2018-03-27 16:48:39'),
(63, 1, 2, 'white', 31, 'love', '2018-03-27 16:48:59'),
(64, 1, 2, 'white', 29, 'love', '2018-03-27 16:49:06'),
(65, 1, 5, 'yellow', 28, 'love', '2018-03-27 16:49:10'),
(66, 2, 2, 'white', 23, 'comment follow', '2018-03-27 17:23:50'),
(67, 2, 1, 'white', 26, 'love', '2018-03-28 17:52:28'),
(74, 2, 1, 'white', 22, 'love', '2018-03-28 17:53:56'),
(75, 2, 2, 'white', 22, 'comment follow', '2018-03-28 17:54:01'),
(76, 2, 1, 'white', 21, 'love', '2018-03-28 17:54:05'),
(77, 2, 2, 'white', 21, 'comment follow', '2018-03-28 17:54:08'),
(78, 2, 1, 'white', 20, 'love', '2018-03-28 17:54:10'),
(79, 2, 2, 'white', 20, 'comment follow', '2018-03-28 17:54:13'),
(80, 2, 1, 'white', 19, 'love', '2018-03-28 17:54:16'),
(81, 2, 2, 'white', 19, 'comment follow', '2018-03-28 17:54:21'),
(82, 2, 1, 'white', 18, 'love', '2018-03-28 17:54:29'),
(83, 2, 2, 'white', 18, 'comment follow', '2018-03-28 17:54:31'),
(84, 2, 1, 'white', 17, 'love', '2018-03-28 17:54:34'),
(85, 2, 2, 'white', 17, 'comment follow', '2018-03-28 17:54:38'),
(87, 1, 1, 'white', 31, 'comment follow', '2018-03-28 18:10:09'),
(89, 1, 1, 'white', 29, 'comment follow', '2018-03-28 18:10:57'),
(90, 2, 2, 'white', 26, 'comment follow', '2018-03-29 18:39:50'),
(91, 2, 2, 'white', 32, 'comment follow', '2018-03-29 18:42:49'),
(92, 2, 2, 'white', 33, 'comment follow', '2018-03-29 18:43:23'),
(93, 3, 3, 'white', 34, 'comment follow', '2018-03-29 19:01:27'),
(94, 3, 2, 'white', 33, 'love', '2018-03-30 18:55:42'),
(95, 3, 2, 'white', 32, 'love', '2018-03-30 18:55:48'),
(96, 3, 2, 'white', 31, 'love', '2018-03-30 18:55:53'),
(97, 3, 2, 'white', 29, 'love', '2018-03-30 18:55:58'),
(98, 3, 4, 'yellow', 27, 'love', '2018-03-30 18:56:10'),
(99, 3, 1, 'white', 26, 'love', '2018-03-30 18:56:13'),
(100, 3, 3, 'white', 35, 'comment follow', '2018-03-30 18:56:56'),
(101, 1, 1, 'white', 36, 'comment follow', '2018-03-30 18:59:48'),
(102, 1, 2, 'white', 32, 'love', '2018-04-01 15:15:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_post_table`
--

CREATE TABLE `poorbuk_post_table` (
  `postid` bigint(20) NOT NULL,
  `postcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postiduser` bigint(20) NOT NULL,
  `postlove` bigint(20) NOT NULL DEFAULT '0',
  `postdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Volcado de datos para la tabla `poorbuk_post_table`
--

INSERT INTO `poorbuk_post_table` (`postid`, `postcontent`, `postiduser`, `postlove`, `postdatehour`) VALUES
(1, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/29101576101556236289783237196453186396977428n.jpg\"></div>', 1, 0, '2018-03-17 17:33:19'),
(2, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2870143420640839171810635684083387277647665o.jpg\"></div>', 1, 0, '2018-03-17 17:57:19'),
(3, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2870143420640839171810635684083387277647665o1.jpg\"></div>', 1, 0, '2018-03-18 04:17:43'),
(4, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2906657519373008465987324090514646413344768n.jpg\"></div>', 1, 0, '2018-03-18 04:20:22'),
(5, 'hola jarim', 1, 0, '2018-03-18 04:21:39'),
(6, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2847200019747233495125115365621042809143296n.jpg\"></div>', 1, 0, '2018-03-18 04:25:03'),
(7, 'DDDDD', 1, 0, '2018-03-18 04:44:55'),
(8, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2882813021228922479460973221051015969018211o.jpg\"></div>', 1, 0, '2018-03-18 15:47:14'),
(9, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2775028515798084387208646691849055788401764n.jpg\"></div>', 1, 0, '2018-03-18 15:49:57'),
(10, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2775067918649850402035278216505311228422935n.jpg\"></div>', 1, 0, '2018-03-18 15:53:11'),
(11, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/1200217816795639655988433804469837797770536n.jpg\"></div>', 1, 0, '2018-03-18 15:54:58'),
(12, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/28279943102161369206436692996614852502394829n.jpg\"></div>', 1, 0, '2018-03-18 15:58:01'),
(13, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/1200217816795639655988433804469837797770536n1.jpg\"></div>', 1, 0, '2018-03-18 16:05:07'),
(14, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2882813021228922479460973221051015969018211o1.jpg\"></div>', 1, 0, '2018-03-18 16:10:51'),
(15, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2921645420571850812200226709376709201554018n.jpg\"></div>', 1, 1, '2018-03-18 16:11:35'),
(16, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2921645420571850812200226709376709201554018n.jpg\"></div>', 1, 0, '2018-03-18 16:11:45'),
(17, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2775028515798084387208646691849055788401764n1.jpg\"></div>', 1, 1, '2018-03-18 16:31:47'),
(18, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2882813021228922479460973221051015969018211o2.jpg\"></div>', 1, 1, '2018-03-19 02:16:35'),
(19, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2771033516292000638286932236053405266579408o.jpg\"></div>', 1, 1, '2018-03-19 02:16:49'),
(20, 'Bonita foto :)<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2921645420571850812200226709376709201554018n1.jpg\"></div>', 1, 1, '2018-03-19 02:17:20'),
(21, 'Nunca...<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2935614820582861577765814956589184807433756n.jpg\"></div>', 1, 2, '2018-03-23 17:08:18'),
(22, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2934268714621759538921077105554801710071808n.jpg\"></div>', 1, 2, '2018-03-24 08:04:14'),
(23, 'Hola...soy nr. 3 :)<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/3/images/2947244320690835466811002337454641406042185n.jpg\"></div>', 3, 1, '2018-03-24 09:19:15'),
(24, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/2/images/2690477618430498357567743525802300404483424n.png\"></div>', 2, 2, '2018-03-24 09:21:57'),
(25, '<div class=\"myDivFileUploadFile\" download=\"\"><a href=\"application/files/users/3/files/LIBRO_2__Alfa_y_omega__la_tortura_del_ser_humano.odt\">LIBRO 2 - Alfa y omega - la tortura del ser humano.odt</a></div>', 3, 1, '2018-03-25 01:13:37'),
(26, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2847200019747233495125115365621042809143296n1.jpg\"></div>', 1, 2, '2018-03-25 01:18:53'),
(27, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/4/images/294972399958903205637657356479281328860416n.jpg\"></div>', 4, 2, '2018-03-25 16:36:48'),
(28, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/295429312193806337302342528074367903880939n.jpg\"></div>', 5, 1, '2018-03-25 17:17:43'),
(29, 'Vamo que nos vamos ;)<div class=\"myDivFileUploadFile\" download=\"\"><a href=\"application/files/users/2/files/LIBRO_2__Alfa_y_omega__la_tortura_del_ser_humano.odt\">LIBRO 2 - Alfa y omega - la tortura del ser humano.odt</a></div><div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/2/images/2954243021067910262233184764725713759616035n.jpg\"></div>', 2, 3, '2018-03-26 03:15:27'),
(30, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/2951220616218938211789925598170316804458479n.jpg\"></div>', 5, 0, '2018-03-26 17:28:41'),
(31, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/2/images/2954150418798857653580463125852553194130162n.jpg\"></div>', 2, 2, '2018-03-27 16:48:18'),
(32, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/2/images/woman4997561280.jpg\"></div>', 2, 3, '2018-03-29 18:42:49'),
(33, '<div class=\"myDivFileUploadFile\" download=\"\"><a href=\"application/files/users/2/files/LIBRO_2__Alfa_y_omega__la_tortura_del_ser_humano1.odt\">LIBRO 2 - Alfa y omega - la tortura del ser humano.odt</a></div><div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/2/images/295429879982170636644244453514170868134725n.jpg\"></div>', 2, 2, '2018-03-29 18:43:23'),
(34, 'Eso dicen algunos...<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/3/images/2966326320751829760711576314212021145653842o.jpg\"></div>', 3, 1, '2018-03-29 19:01:27'),
(35, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/3/images/295943759982169203311056373559340115711780n.jpg\"><div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/3/images/2966326320751829760711576314212021145653842o1.jpg\"></div></div>', 3, 0, '2018-03-30 18:56:56'),
(36, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/1/images/2942568014645710703192627971758394308558848n.jpg\"></div>', 1, 0, '2018-03-30 18:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poorbuk_user_table`
--

CREATE TABLE `poorbuk_user_table` (
  `userid` bigint(20) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `passUserOriginalCoded` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `passUserRandomNow` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `usermail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `userphoto` varchar(200) CHARACTER SET utf8 DEFAULT 'application/files/profileimages/myprofil.jpg',
  `userdescription` varchar(3000) CHARACTER SET utf8 DEFAULT NULL,
  `userbirthday` date NOT NULL DEFAULT '2004-04-04',
  `userlanguage` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `usercssbackgroundpicture` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `usercssbackgroundcolor` varchar(50) CHARACTER SET utf8 DEFAULT 'black',
  `usercssbackgroundpicturesize` varchar(20) CHARACTER SET utf8 DEFAULT '600px',
  `userfolder` varchar(100) CHARACTER SET utf8 DEFAULT 'tempiferroruserfolderpnoborrar',
  `useridcodec` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `userdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userroll` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT 'NORMAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `poorbuk_user_table`
--

INSERT INTO `poorbuk_user_table` (`userid`, `username`, `passUserOriginalCoded`, `passUserRandomNow`, `usermail`, `userphoto`, `userdescription`, `userbirthday`, `userlanguage`, `usercssbackgroundpicture`, `usercssbackgroundcolor`, `usercssbackgroundpicturesize`, `userfolder`, `useridcodec`, `userdatehour`, `userroll`) VALUES
(1, 'jarim', '356a192b7913b04c54574d18c28d46e6395428ab', 'W5ht79ybsghcjGy9sYtPMxD8nnmSComZFQ16xOQK1OXSh4tHHCaGNMqppsI8Ox6xgzrhwtEh3CrxsO3hTjFJFO2F8hgr1WxB2FwyWvXGHRau5GDJslXTpDcyJ2odSXjs6IViMvWJoRn3r1iqXoYGyz', '1', 'application/files/users/1/images/288284797990550769454731127985102469951376o.jpg', 'hOlas del mar para tod@s :P ;) XXX :D MisiÃ³n conseguida ;)', '1974-12-29', 'Spanish', NULL, 'black', '600px', '1', NULL, '2018-03-17 16:58:59', 'NORMAL'),
(2, 'Abdula', '356a192b7913b04c54574d18c28d46e6395428ab', 'lUqJU8l94uH7MHZlbeceUlnPYD9f2sY5Xz6HzW7vCQWkjq3uc9mzmzQHKWa5HSb8TqxGS7NxBkQ1cT8pU6fMXOugUXKmZvj4pNC9OeComyG2DJlg1ZPCKn2Fj0QhpQCVYx6OufcdmGxhd7kDwCqpUI', '2', 'application/files/users/2/images/2906657519373008465987324090514646413344768n.jpg', 'Que pasa pequeÃ±in :)', '2001-01-08', 'Spanish', NULL, 'black', '600px', '2', NULL, '2018-03-24 08:39:34', 'NORMAL'),
(3, 'Oscar', '356a192b7913b04c54574d18c28d46e6395428ab', 'eMeXm96hT7kQkJMeGGkgW8wsEpmePeuBkZPDorM1OD9fwCmhBV7jB0tFjIR8KSTeFRWtlK9N2foaIf6J0PNwCV4oTQyy0HQxPqFRVrzWi29tH7Hmg20EzNHYpfTFTdj2yBnfOjWUNUZgpVGSojzHId', '3', 'application/files/users/3/images/2347245717376338395832401640580876401860761n.jpg', 'Que pasa tronco :)', '2000-04-04', 'Spanish', NULL, 'black', '600px', '3', NULL, '2018-03-24 08:41:09', 'NORMAL'),
(4, 'Josemi', '356a192b7913b04c54574d18c28d46e6395428ab', 'hVuuyeB3K5BuUc7P5DhGHKvdHV7InFztHtnM40FaJsOzJYYpUjjnNwxW424E6c2ycnnmVtOv0NZdXn7d1BNlwFZDaF1ywxSHKrNSsxOpZZt2eqHoZH4INZBRiPTYwr0QPor4raK8MHcxMREehWWWG0', '5', 'application/files/users/4/images/295109229958937205634253827815485797827838n.jpg', 'Muhahahaha', '2004-04-04', 'Spanish', NULL, 'black', '600px', '4', NULL, '2018-03-25 16:35:55', 'NORMAL'),
(5, '7', '356a192b7913b04c54574d18c28d46e6395428ab', 'iPk4P84XrNjTz5Sed9XHHzHvY07tBx9VkCdC7d1Zitt1t9xv5QC4bdkZFHrVQVHT96maQEHB3oYVhDiTVhyJ4G1rzbQYHwWs378OTe2sHVRHBFN8Oc1vXZpQVEPkrZ1wF9Igc1HgEKDOrrqPmsw4T8', '7', 'application/files/profileimages/myprofil.jpg', '', '2004-04-04', 'Spanish', NULL, 'black', '600px', '5', NULL, '2018-03-25 17:16:33', 'NORMAL'),
(6, '8', '356a192b7913b04c54574d18c28d46e6395428ab', 'pwWJ3WIJxy47gdavBjKlJiNKETbqOqaQBtm7z9G0UEct27h7mOkXheoUBwyDXZ5d7aCd7NuGXGbnxojEv4B59dG3TREe6wS8Q8XTQ4YvUHlTeTHfneuTbpa7TENnKuXXaJ7yXHf5JeEvqYIVbmv4Zi', '8', 'application/files/profileimages/myprofil.jpg', NULL, '2004-04-04', 'Spanish', NULL, 'black', '600px', '6', NULL, '2018-03-26 18:57:23', 'NORMAL'),
(7, '9', '356a192b7913b04c54574d18c28d46e6395428ab', 'E29qxghhQo0GC06aoQZhQ31Uj7X2gWyHcNegF1sOi1bKd3fgDHFwh0oEelcPcMZeIw1qN2vuHkxqjCqyr1Y7XuSSPxH04ookFHrlQPFroN9HM3umzMFHKXEQuJe8aGnTjQWYvozVom1ZZfxjRIC8zy', '9', 'application/files/profileimages/myprofil.jpg', NULL, '2004-04-04', 'Spanish', NULL, 'black', '600px', '7', NULL, '2018-03-26 19:04:32', 'NORMAL'),
(8, 'jarimos', '356a192b7913b04c54574d18c28d46e6395428ab', 's6Mp6UpkGgRhH9Ck1rkruy530uj2wUWH4c7fq6tSBGuXDPZsx5H1w0nqNwXj2SKMarU0pcI1CCoK1Vswggs02GH5cds6Y41PTxaRlOHBGwUKaHP6UazS93K1flC80PomGaMtqC8EWCGlbYkoBaVtv1', 'jarim', 'application/files/profileimages/myprofil.jpg', NULL, '2004-04-04', 'Spanish', NULL, 'black', '600px', '8', NULL, '2018-03-26 19:10:04', 'NORMAL'),
(9, 'El puto amo', '356a192b7913b04c54574d18c28d46e6395428ab', 'USYRazGNtKIIgHEUWtn5eH4E5sgjvfYNFoNsFz4UTxOCX5IGkbsHl0TpPec8ggI884zyK3cXvUPs1MN9E2UlzeWizY9h3kVSVuDisSO0rjUDiGJ2SVfWB7GCDSESzFNYOtu2Sgcxm4kIuzGejsbz68', 'jarimortega', 'application/files/profileimages/myprofil.jpg', NULL, '2004-04-04', 'Spanish', NULL, 'black', '600px', '9', NULL, '2018-03-26 19:24:20', 'NORMAL'),
(10, 'jarimoXXX', 'Ixc0czCBHqso1zjY9HUBIOzwlD6SV2dD3lI62xqU8fymIEnqkWiJrlI76rHmRryVDqTUZMZRFtGmnfjWf7kNIFmuroZldjI519DFztMBqDldMSfPCEUyz0fZIW3Hkzmi4SJzkgRoCwbQGnSGvV2hCM', 'JBdxvvijhZY6xa9902KuRjkt6zGhEuvDfHHZuHCnobqgIFHU3beVUHxtSjvKUoN0eH5pT7SrD931yJgX69vuxQg4zefhoSHh6hrGTDkFBCUUczwxsNBvds4YFneUOkMcWHRRcf3dCMdzluVzgyqwF8', 'jarimortega@gmail.com', 'application/files/users/10/images/2882813021228922479460973221051015969018211o.jpg', '', '2004-04-04', 'Spanish', NULL, 'black', '600px', '10', NULL, '2018-03-26 19:35:19', 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `poorbuk_amigo_table`
--
ALTER TABLE `poorbuk_amigo_table`
  ADD PRIMARY KEY (`amigoid`),
  ADD KEY `amigouserid` (`amigouserid`);

--
-- Indices de la tabla `poorbuk_cms_menu_table`
--
ALTER TABLE `poorbuk_cms_menu_table`
  ADD PRIMARY KEY (`mId`);

--
-- Indices de la tabla `poorbuk_cms_postgarbage_table`
--
ALTER TABLE `poorbuk_cms_postgarbage_table`
  ADD PRIMARY KEY (`pGarbageId`);

--
-- Indices de la tabla `poorbuk_cms_post_table`
--
ALTER TABLE `poorbuk_cms_post_table`
  ADD PRIMARY KEY (`pId`);

--
-- Indices de la tabla `poorbuk_cms_websites_table`
--
ALTER TABLE `poorbuk_cms_websites_table`
  ADD PRIMARY KEY (`webId`);

--
-- Indices de la tabla `poorbuk_comment_table`
--
ALTER TABLE `poorbuk_comment_table`
  ADD PRIMARY KEY (`commentid`);

--
-- Indices de la tabla `poorbuk_event_table`
--
ALTER TABLE `poorbuk_event_table`
  ADD PRIMARY KEY (`eventid`);

--
-- Indices de la tabla `poorbuk_filelinks_table`
--
ALTER TABLE `poorbuk_filelinks_table`
  ADD PRIMARY KEY (`fileLinksTableId`);

--
-- Indices de la tabla `poorbuk_guestbook_table`
--
ALTER TABLE `poorbuk_guestbook_table`
  ADD PRIMARY KEY (`guestbooid`);

--
-- Indices de la tabla `poorbuk_instacomment_table`
--
ALTER TABLE `poorbuk_instacomment_table`
  ADD PRIMARY KEY (`instacommentid`);

--
-- Indices de la tabla `poorbuk_instacontact_table`
--
ALTER TABLE `poorbuk_instacontact_table`
  ADD PRIMARY KEY (`instacontactid`);

--
-- Indices de la tabla `poorbuk_insta_table`
--
ALTER TABLE `poorbuk_insta_table`
  ADD PRIMARY KEY (`instaid`);

--
-- Indices de la tabla `poorbuk_ip_table`
--
ALTER TABLE `poorbuk_ip_table`
  ADD PRIMARY KEY (`ipid`);

--
-- Indices de la tabla `poorbuk_love_table`
--
ALTER TABLE `poorbuk_love_table`
  ADD PRIMARY KEY (`loveid`);

--
-- Indices de la tabla `poorbuk_messageindex_table`
--
ALTER TABLE `poorbuk_messageindex_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `poorbuk_message_table`
--
ALTER TABLE `poorbuk_message_table`
  ADD PRIMARY KEY (`messageid`);

--
-- Indices de la tabla `poorbuk_notifications_table`
--
ALTER TABLE `poorbuk_notifications_table`
  ADD PRIMARY KEY (`notificationsid`);

--
-- Indices de la tabla `poorbuk_post_table`
--
ALTER TABLE `poorbuk_post_table`
  ADD PRIMARY KEY (`postid`);

--
-- Indices de la tabla `poorbuk_user_table`
--
ALTER TABLE `poorbuk_user_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `usermail` (`usermail`);

--
-- Indices de la tabla `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indices de la tabla `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indices de la tabla `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indices de la tabla `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indices de la tabla `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indices de la tabla `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indices de la tabla `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indices de la tabla `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indices de la tabla `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indices de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `poorbuk_amigo_table`
--
ALTER TABLE `poorbuk_amigo_table`
  MODIFY `amigoid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `poorbuk_cms_menu_table`
--
ALTER TABLE `poorbuk_cms_menu_table`
  MODIFY `mId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_cms_postgarbage_table`
--
ALTER TABLE `poorbuk_cms_postgarbage_table`
  MODIFY `pGarbageId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_cms_post_table`
--
ALTER TABLE `poorbuk_cms_post_table`
  MODIFY `pId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_cms_websites_table`
--
ALTER TABLE `poorbuk_cms_websites_table`
  MODIFY `webId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_comment_table`
--
ALTER TABLE `poorbuk_comment_table`
  MODIFY `commentid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `poorbuk_event_table`
--
ALTER TABLE `poorbuk_event_table`
  MODIFY `eventid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_filelinks_table`
--
ALTER TABLE `poorbuk_filelinks_table`
  MODIFY `fileLinksTableId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_guestbook_table`
--
ALTER TABLE `poorbuk_guestbook_table`
  MODIFY `guestbooid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_instacomment_table`
--
ALTER TABLE `poorbuk_instacomment_table`
  MODIFY `instacommentid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_instacontact_table`
--
ALTER TABLE `poorbuk_instacontact_table`
  MODIFY `instacontactid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_insta_table`
--
ALTER TABLE `poorbuk_insta_table`
  MODIFY `instaid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_ip_table`
--
ALTER TABLE `poorbuk_ip_table`
  MODIFY `ipid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `poorbuk_love_table`
--
ALTER TABLE `poorbuk_love_table`
  MODIFY `loveid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `poorbuk_messageindex_table`
--
ALTER TABLE `poorbuk_messageindex_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_message_table`
--
ALTER TABLE `poorbuk_message_table`
  MODIFY `messageid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poorbuk_notifications_table`
--
ALTER TABLE `poorbuk_notifications_table`
  MODIFY `notificationsid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `poorbuk_post_table`
--
ALTER TABLE `poorbuk_post_table`
  MODIFY `postid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `poorbuk_user_table`
--
ALTER TABLE `poorbuk_user_table`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
