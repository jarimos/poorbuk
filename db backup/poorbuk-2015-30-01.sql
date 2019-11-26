-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2015 at 08:15 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plugintest01`
--

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_amigo_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_amigo_table` (
  `amigoid` bigint(20) NOT NULL AUTO_INCREMENT,
  `amigouserid` bigint(20) NOT NULL,
  `amigofriendid` bigint(20) NOT NULL,
  `amigofriendstatus` varchar(20) NOT NULL,
  PRIMARY KEY (`amigoid`),
  KEY `amigouserid` (`amigouserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_menu_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_cms_menu_table` (
  `mId` bigint(20) NOT NULL AUTO_INCREMENT,
  `mUId` bigint(20) NOT NULL,
  `mWebId` bigint(20) NOT NULL,
  `mPId` bigint(20) NOT NULL,
  `mName` varchar(200) NOT NULL,
  `mParent` varchar(200) NOT NULL,
  `mUrl` varchar(200) NOT NULL,
  `mWebsiteName` varchar(200) NOT NULL,
  `mActive` varchar(20) NOT NULL,
  `mPosition` int(11) NOT NULL,
  `mType` varchar(40) NOT NULL,
  PRIMARY KEY (`mId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_postgarbage_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_cms_postgarbage_table` (
  `pGarbageId` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `pPass` varchar(20) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`pGarbageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_post_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_cms_post_table` (
  `pId` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `pPass` varchar(20) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`pId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_cms_websites_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_cms_websites_table` (
  `webId` bigint(20) NOT NULL AUTO_INCREMENT,
  `webName` varchar(200) NOT NULL,
  `webUsersIDs` varchar(3000) NOT NULL,
  PRIMARY KEY (`webId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_comment_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_comment_table` (
  `commentid` bigint(20) NOT NULL AUTO_INCREMENT,
  `commentpostid` bigint(20) NOT NULL,
  `commentcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentuserid` bigint(20) NOT NULL,
  `commentdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_event_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_event_table` (
  `eventid` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `titel` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `stampdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventdate` date NOT NULL,
  `eventtime` time NOT NULL,
  `eventfor` varchar(30) NOT NULL DEFAULT 'me and friends',
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_filelinks_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_filelinks_table` (
  `fileLinksTableId` bigint(20) NOT NULL AUTO_INCREMENT,
  `myFileName` varchar(300) COLLATE utf8_estonian_ci NOT NULL,
  `myFilePath` varchar(300) COLLATE utf8_estonian_ci NOT NULL,
  `userFolder` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `linksUID` bigint(20) NOT NULL,
  PRIMARY KEY (`fileLinksTableId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_guestbook_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_guestbook_table` (
  `guestbooid` bigint(20) NOT NULL AUTO_INCREMENT,
  `guestbookpost` varchar(3000) NOT NULL,
  `guestbookuser` varchar(30) NOT NULL,
  `guestbooktimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`guestbooid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_instacomment_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_instacomment_table` (
  `instacommentid` bigint(20) NOT NULL AUTO_INCREMENT,
  `instaid` bigint(20) NOT NULL,
  `instacommenttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `instacommentworkers` varchar(300) NOT NULL,
  `instacommentresume` varchar(3000) NOT NULL,
  `instacommentmaterial` varchar(3000) NOT NULL,
  `instacommentconclusion` varchar(3000) NOT NULL,
  `userid` bigint(20) NOT NULL,
  PRIMARY KEY (`instacommentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_instacontact_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_instacontact_table` (
  `instacontactid` bigint(20) NOT NULL AUTO_INCREMENT,
  `instacontactname` varchar(40) NOT NULL,
  `instacontactphone` varchar(20) NOT NULL,
  `instaid` bigint(20) NOT NULL,
  PRIMARY KEY (`instacontactid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_insta_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_insta_table` (
  `instaid` bigint(20) NOT NULL AUTO_INCREMENT,
  `instaname` varchar(500) NOT NULL,
  `instaaddress` varchar(500) NOT NULL,
  `instacity` varchar(30) NOT NULL,
  `instazip` varchar(15) NOT NULL,
  `instanotas` varchar(3000) NOT NULL,
  `instamaterial` varchar(3000) NOT NULL,
  `instatimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) NOT NULL,
  PRIMARY KEY (`instaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_ip_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_ip_table` (
  `ipid` bigint(20) NOT NULL AUTO_INCREMENT,
  `ipadr` varchar(50) NOT NULL,
  `ipuserid` bigint(20) NOT NULL,
  `iptimenow` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ipid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_love_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_love_table` (
  `loveid` bigint(20) NOT NULL AUTO_INCREMENT,
  `lovepostid` bigint(20) NOT NULL,
  `loveuserid` bigint(20) NOT NULL,
  PRIMARY KEY (`loveid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_messageindex_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_messageindex_table` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `messageid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_message_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_message_table` (
  `messageid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fromid` bigint(20) NOT NULL,
  `toid` varchar(2000) NOT NULL,
  `toname` varchar(3000) NOT NULL,
  `messagetext` varchar(3000) NOT NULL,
  `messagedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_notifications_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_notifications_table` (
  `notificationsid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fromuserid` bigint(20) NOT NULL,
  `touserid` bigint(20) NOT NULL,
  `seencolor` varchar(20) NOT NULL DEFAULT 'yellow',
  `postid` bigint(20) NOT NULL,
  `handling` varchar(40) NOT NULL,
  `notificationdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notificationsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_post_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_post_table` (
  `postid` bigint(20) NOT NULL AUTO_INCREMENT,
  `postcontent` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postiduser` bigint(20) NOT NULL,
  `postlove` bigint(20) NOT NULL DEFAULT '0',
  `postdatehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Table structure for table `poorbuk_user_table`
--

CREATE TABLE IF NOT EXISTS `poorbuk_user_table` (
  `userid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `passUserOriginalCoded` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `passUserOriginalCoded` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
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
  `userroll` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT 'NORMAL',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `usermail` (`usermail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
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
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=443 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
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
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
