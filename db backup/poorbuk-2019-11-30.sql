-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 03:51 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poorbuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_amigo_table`
--

CREATE TABLE `poorbuk_amigo_table` (
  `amigoid` bigint(20) NOT NULL,
  `amigouserid` bigint(20) NOT NULL,
  `amigofriendid` bigint(20) NOT NULL,
  `amigofriendstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poorbuk_amigo_table`
--

INSERT INTO `poorbuk_amigo_table` (`amigoid`, `amigouserid`, `amigofriendid`, `amigofriendstatus`) VALUES
(4, 6, 5, 'AMIGO'),
(5, 7, 5, 'AMIGO');

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_menu_table`
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
-- Table structure for table `poorbuk_cms_postgarbage_table`
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
  `pDateHour` timestamp NOT NULL DEFAULT current_timestamp(),
  `pPublished` varchar(20) NOT NULL DEFAULT 'YES',
  `pCommentAllowed` varchar(20) NOT NULL DEFAULT 'NO',
  `pLoveAllowed` varchar(20) NOT NULL,
  `pLoveCounter` bigint(20) NOT NULL DEFAULT 0,
  `pPass` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_post_table`
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
  `pDateHour` timestamp NOT NULL DEFAULT current_timestamp(),
  `pPublished` varchar(20) NOT NULL DEFAULT 'YES',
  `pCommentAllowed` varchar(20) NOT NULL DEFAULT 'NO',
  `pLoveAllowed` varchar(20) NOT NULL,
  `pLoveCounter` bigint(20) NOT NULL DEFAULT 0,
  `pPass` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_websites_table`
--

CREATE TABLE `poorbuk_cms_websites_table` (
  `webId` bigint(20) NOT NULL,
  `webName` varchar(200) NOT NULL,
  `webUsersIDs` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_comment_table`
--

CREATE TABLE `poorbuk_comment_table` (
  `commentid` bigint(20) NOT NULL,
  `commentpostid` bigint(20) NOT NULL,
  `commentcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentuserid` bigint(20) NOT NULL,
  `commentdatehour` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poorbuk_comment_table`
--

INSERT INTO `poorbuk_comment_table` (`commentid`, `commentpostid`, `commentcontent`, `commentuserid`, `commentdatehour`) VALUES
(5, 67, 'Hola tronco...como teva la vida...aquí limpiando en Kronen...y ahora al intersport...no sé si me van a dejar salir de aquí esta noche...muhahahaha', 7, '2019-11-28 16:52:07'),
(6, 69, 'Me encanta que los planes salgan bien...y a vosotros? pues eso es lo que hay de momento...', 7, '2019-11-28 16:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_event_table`
--

CREATE TABLE `poorbuk_event_table` (
  `eventid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `titel` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `stampdatehour` timestamp NOT NULL DEFAULT current_timestamp(),
  `eventdate` date NOT NULL,
  `eventtime` time NOT NULL,
  `eventfor` varchar(30) NOT NULL DEFAULT 'me and friends'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_filelinks_table`
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
-- Table structure for table `poorbuk_guestbook_table`
--

CREATE TABLE `poorbuk_guestbook_table` (
  `guestbooid` bigint(20) NOT NULL,
  `guestbookpost` varchar(3000) NOT NULL,
  `guestbookuser` varchar(30) NOT NULL,
  `guestbooktimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_instacomment_table`
--

CREATE TABLE `poorbuk_instacomment_table` (
  `instacommentid` bigint(20) NOT NULL,
  `instaid` bigint(20) NOT NULL,
  `instacommenttimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `instacommentworkers` varchar(300) NOT NULL,
  `instacommentresume` varchar(3000) NOT NULL,
  `instacommentmaterial` varchar(3000) NOT NULL,
  `instacommentconclusion` varchar(3000) NOT NULL,
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_instacontact_table`
--

CREATE TABLE `poorbuk_instacontact_table` (
  `instacontactid` bigint(20) NOT NULL,
  `instacontactname` varchar(40) NOT NULL,
  `instacontactphone` varchar(20) NOT NULL,
  `instaid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_insta_table`
--

CREATE TABLE `poorbuk_insta_table` (
  `instaid` bigint(20) NOT NULL,
  `instaname` varchar(500) NOT NULL,
  `instaaddress` varchar(500) NOT NULL,
  `instacity` varchar(30) NOT NULL,
  `instazip` varchar(15) NOT NULL,
  `instanotas` varchar(3000) NOT NULL,
  `instamaterial` varchar(3000) NOT NULL,
  `instatimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_ip_table`
--

CREATE TABLE `poorbuk_ip_table` (
  `ipid` bigint(20) NOT NULL,
  `ipadr` varchar(50) NOT NULL,
  `ipuserid` bigint(20) NOT NULL,
  `iptimenow` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poorbuk_ip_table`
--

INSERT INTO `poorbuk_ip_table` (`ipid`, `ipadr`, `ipuserid`, `iptimenow`) VALUES
(43, '::1', 6, '2019-11-28 16:48:46'),
(44, '::1', 7, '2019-11-28 16:49:03'),
(48, '::1', 5, '2019-11-30 02:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_love_table`
--

CREATE TABLE `poorbuk_love_table` (
  `loveid` bigint(20) NOT NULL,
  `lovepostid` bigint(20) NOT NULL,
  `loveuserid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poorbuk_love_table`
--

INSERT INTO `poorbuk_love_table` (`loveid`, `lovepostid`, `loveuserid`) VALUES
(8, 64, 5),
(9, 67, 5),
(10, 68, 6);

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_messageindex_table`
--

CREATE TABLE `poorbuk_messageindex_table` (
  `id` bigint(20) NOT NULL,
  `messageid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_message_table`
--

CREATE TABLE `poorbuk_message_table` (
  `messageid` bigint(20) NOT NULL,
  `fromid` bigint(20) NOT NULL,
  `toid` varchar(2000) NOT NULL,
  `toname` varchar(3000) NOT NULL,
  `messagetext` varchar(3000) NOT NULL,
  `messagedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_notifications_table`
--

CREATE TABLE `poorbuk_notifications_table` (
  `notificationsid` bigint(20) NOT NULL,
  `fromuserid` bigint(20) NOT NULL,
  `touserid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow',
  `postid` bigint(20) NOT NULL,
  `handling` varchar(40) NOT NULL,
  `notificationdatehour` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poorbuk_notifications_table`
--

INSERT INTO `poorbuk_notifications_table` (`notificationsid`, `fromuserid`, `touserid`, `seencolor`, `postid`, `handling`, `notificationdatehour`) VALUES
(72, 5, 5, 'white', 64, 'comment follow', '2019-11-28 02:24:38'),
(73, 5, 5, 'white', 66, 'comment follow', '2019-11-28 02:25:29'),
(74, 5, 5, 'white', 67, 'comment follow', '2019-11-28 02:25:57'),
(75, 6, 6, 'white', 68, 'comment follow', '2019-11-28 13:19:21'),
(77, 7, 7, 'white', 67, 'comment follow', '2019-11-28 16:52:07'),
(78, 7, 7, 'white', 69, 'comment follow', '2019-11-28 16:53:15'),
(79, 5, 5, 'white', 70, 'comment follow', '2019-11-28 16:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_post_table`
--

CREATE TABLE `poorbuk_post_table` (
  `postid` bigint(20) NOT NULL,
  `postcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postiduser` bigint(20) NOT NULL,
  `postlove` bigint(20) NOT NULL DEFAULT 0,
  `postdatehour` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `poorbuk_post_table`
--

INSERT INTO `poorbuk_post_table` (`postid`, `postcontent`, `postiduser`, `postlove`, `postdatehour`) VALUES
(64, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/67166497101574333148147049069118715915665408n.jpg\"></div>', 5, 1, '2019-11-28 02:24:38'),
(65, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/67166497101574333148147049069118715915665408n.jpg\"></div>', 5, 0, '2019-11-28 02:24:45'),
(66, '<div class=\"myDivFileUploadFile\" download=\"\"><a href=\"application/files/users/5/files/importante_jarim_til_jobcenter_samtale.rtf\">importante jarim til jobcenter samtale.rtf</a></div><div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/67166497101574333148147049069118715915665408n.jpg\"></div>', 5, 0, '2019-11-28 02:25:29'),
(67, 'hola que tal jarim', 5, 1, '2019-11-28 02:25:57'),
(68, 'Muhahahaha<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/6/images/295726919252821509866539200472680653888288n.jpg\"></div>', 6, 1, '2019-11-28 13:19:21'),
(69, '<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/7/images/7091216424191164784103276827223487657017344o.jpg\"></div>', 7, 0, '2019-11-28 16:49:49'),
(70, 'Digo yo...<div class=\"myDivFileUploadImage\"><img class=\"myImgUploaded\" src=\"application/files/users/5/images/7423811431585249874923725141003861070184448n.jpg\"></div>', 5, 0, '2019-11-28 16:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_user_table`
--

CREATE TABLE `poorbuk_user_table` (
  `userid` bigint(20) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `passUserOriginalCoded` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `passUserRandomNow` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
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
  `userdatehour` timestamp NOT NULL DEFAULT current_timestamp(),
  `userroll` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT 'NORMAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poorbuk_user_table`
--

INSERT INTO `poorbuk_user_table` (`userid`, `username`, `passUserOriginalCoded`, `passUserRandomNow`, `usermail`, `userphoto`, `userdescription`, `userbirthday`, `userlanguage`, `usercssbackgroundpicture`, `usercssbackgroundcolor`, `usercssbackgroundpicturesize`, `userfolder`, `useridcodec`, `userdatehour`, `userroll`) VALUES
(5, '1', '356a192b7913b04c54574d18c28d46e6395428ab', 'QMuFXF9gB6HrujdgRpn4P3fOSnYC4Q0lkitqKiGHVH1iKaEf8ahc33tknFtMHWKHkwmj3Bg78O8rTVzYpCp5nGk5eTXDgu0Ku6uIuRBbvZ3B2pC8QK0ZzRUhnCS59NI8ZoqhjDoNBnIPElDWIDvnl3', '1', 'application/files/users/5/images/5362242910156976816697999713751198691229696n.jpg', 'Hey...it\'s me!!! ;P', '1974-12-29', 'Spanish', NULL, 'black', '600px', '5', NULL, '2019-11-28 02:22:11', 'NORMAL'),
(6, '2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'W3qr7DIpNv66RMRQoH69OP372nqUIiVGt32HcrQ7fdYtmPY2qOsVNmm7eSxFQmo1HYyfhKFcRT3GF3iOC7eVKIcscHkP775eoaRQpMNk08OIYZqDUJFaDRrREEghH1bQBbHYYNfqFx8VmFp8MICKV7', '2', 'application/files/users/6/images/CECISARAH.jpg', '', '2004-04-04', 'English', NULL, 'black', '600px', '6', NULL, '2019-11-28 13:18:22', 'NORMAL'),
(7, '3', '77de68daecd823babbb58edb1c8e14d7106e83bb', 'k50j13XJkkS71ORmRoBrPt1ieZdl5ab7x53Nee2cDEs5YH22RJu2PiFc9Rz7eVulNuklhv0y7gsWK0r3zOCJQgp0dm7cW8J9YEs8PzEexld9qNCIdjIKEzmgHD1YM2QRdtUqpbyYZ7H9aNXmuPpazu', '3', 'application/files/users/7/images/7047630823981109902239345037534465367212032n.jpg', '', '2004-04-04', 'Spanish', NULL, 'black', '600px', '7', NULL, '2019-11-28 16:47:41', 'NORMAL');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
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
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
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
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poorbuk_amigo_table`
--
ALTER TABLE `poorbuk_amigo_table`
  ADD PRIMARY KEY (`amigoid`),
  ADD KEY `amigouserid` (`amigouserid`);

--
-- Indexes for table `poorbuk_cms_menu_table`
--
ALTER TABLE `poorbuk_cms_menu_table`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `poorbuk_cms_postgarbage_table`
--
ALTER TABLE `poorbuk_cms_postgarbage_table`
  ADD PRIMARY KEY (`pGarbageId`);

--
-- Indexes for table `poorbuk_cms_post_table`
--
ALTER TABLE `poorbuk_cms_post_table`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `poorbuk_cms_websites_table`
--
ALTER TABLE `poorbuk_cms_websites_table`
  ADD PRIMARY KEY (`webId`);

--
-- Indexes for table `poorbuk_comment_table`
--
ALTER TABLE `poorbuk_comment_table`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `poorbuk_event_table`
--
ALTER TABLE `poorbuk_event_table`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `poorbuk_filelinks_table`
--
ALTER TABLE `poorbuk_filelinks_table`
  ADD PRIMARY KEY (`fileLinksTableId`);

--
-- Indexes for table `poorbuk_guestbook_table`
--
ALTER TABLE `poorbuk_guestbook_table`
  ADD PRIMARY KEY (`guestbooid`);

--
-- Indexes for table `poorbuk_instacomment_table`
--
ALTER TABLE `poorbuk_instacomment_table`
  ADD PRIMARY KEY (`instacommentid`);

--
-- Indexes for table `poorbuk_instacontact_table`
--
ALTER TABLE `poorbuk_instacontact_table`
  ADD PRIMARY KEY (`instacontactid`);

--
-- Indexes for table `poorbuk_insta_table`
--
ALTER TABLE `poorbuk_insta_table`
  ADD PRIMARY KEY (`instaid`);

--
-- Indexes for table `poorbuk_ip_table`
--
ALTER TABLE `poorbuk_ip_table`
  ADD PRIMARY KEY (`ipid`);

--
-- Indexes for table `poorbuk_love_table`
--
ALTER TABLE `poorbuk_love_table`
  ADD PRIMARY KEY (`loveid`);

--
-- Indexes for table `poorbuk_messageindex_table`
--
ALTER TABLE `poorbuk_messageindex_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poorbuk_message_table`
--
ALTER TABLE `poorbuk_message_table`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `poorbuk_notifications_table`
--
ALTER TABLE `poorbuk_notifications_table`
  ADD PRIMARY KEY (`notificationsid`);

--
-- Indexes for table `poorbuk_post_table`
--
ALTER TABLE `poorbuk_post_table`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `poorbuk_user_table`
--
ALTER TABLE `poorbuk_user_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `usermail` (`usermail`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poorbuk_amigo_table`
--
ALTER TABLE `poorbuk_amigo_table`
  MODIFY `amigoid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poorbuk_cms_menu_table`
--
ALTER TABLE `poorbuk_cms_menu_table`
  MODIFY `mId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_cms_postgarbage_table`
--
ALTER TABLE `poorbuk_cms_postgarbage_table`
  MODIFY `pGarbageId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_cms_post_table`
--
ALTER TABLE `poorbuk_cms_post_table`
  MODIFY `pId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_cms_websites_table`
--
ALTER TABLE `poorbuk_cms_websites_table`
  MODIFY `webId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_comment_table`
--
ALTER TABLE `poorbuk_comment_table`
  MODIFY `commentid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poorbuk_event_table`
--
ALTER TABLE `poorbuk_event_table`
  MODIFY `eventid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_filelinks_table`
--
ALTER TABLE `poorbuk_filelinks_table`
  MODIFY `fileLinksTableId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_guestbook_table`
--
ALTER TABLE `poorbuk_guestbook_table`
  MODIFY `guestbooid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_instacomment_table`
--
ALTER TABLE `poorbuk_instacomment_table`
  MODIFY `instacommentid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poorbuk_instacontact_table`
--
ALTER TABLE `poorbuk_instacontact_table`
  MODIFY `instacontactid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poorbuk_insta_table`
--
ALTER TABLE `poorbuk_insta_table`
  MODIFY `instaid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poorbuk_ip_table`
--
ALTER TABLE `poorbuk_ip_table`
  MODIFY `ipid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `poorbuk_love_table`
--
ALTER TABLE `poorbuk_love_table`
  MODIFY `loveid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poorbuk_messageindex_table`
--
ALTER TABLE `poorbuk_messageindex_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_message_table`
--
ALTER TABLE `poorbuk_message_table`
  MODIFY `messageid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poorbuk_notifications_table`
--
ALTER TABLE `poorbuk_notifications_table`
  MODIFY `notificationsid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `poorbuk_post_table`
--
ALTER TABLE `poorbuk_post_table`
  MODIFY `postid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `poorbuk_user_table`
--
ALTER TABLE `poorbuk_user_table`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
