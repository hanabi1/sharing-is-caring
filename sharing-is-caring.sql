-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2014 at 12:52 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sharing-is-caring`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `link` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `thumbnailres` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `machinetitle` varchar(55) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `youtubeid` varchar(255) COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`link`, `description`, `thumbnailres`, `title`, `machinetitle`, `id`, `youtubeid`, `timestamp`, `userid`) VALUES
('http://www.youtube.com/watch?v=PpccpglnNf0&feature=youtube_gdata', 'PART 2 of "Goats Yelling Like Humans" right here http://youtu.be/AIFvFuZPr68<br />\n<br />\nKeep reading RSVLTS.com for more super cut videos.', 'http://i1.ytimg.com/vi/PpccpglnNf0/1.jpg', 'Goats Yelling Like Humans - Super Cut Compilation', 'goats-yelling-like-humans-super-cut-compilation', 21, 'PpccpglnNf0', '2014-06-03 18:02:45', 88803632),
('http://www.youtube.com/watch?v=WcCYUDKFs3Q&feature=youtube_gdata', 'Daft Punk   Goat Lucky<br />\nRemake Of Daft Punk Get Lucky!<br />\nEnjoy :)', 'http://i1.ytimg.com/vi/WcCYUDKFs3Q/1.jpg', 'Daft Punk   Goat Lucky', 'daft-punk-goat-lucky', 22, 'WcCYUDKFs3Q', '2014-06-03 18:03:32', 88803632),
('http://www.youtube.com/watch?v=HLI4EuDckgM&feature=youtube_gdata', 'TAYLOR SWIFT-I Knew You Were Trouble (GOAT VERSION)', 'http://i1.ytimg.com/vi/HLI4EuDckgM/1.jpg', 'TAYLOR SWIFT-I Knew You Were Trouble (GOAT VERSION)', 'taylor-swift-i-knew-you-were-trouble-goat-version', 23, 'HLI4EuDckgM', '2014-06-03 18:05:52', 88803632),
('http://www.youtube.com/watch?v=seUA6LgMQYw&feature=youtube_gdata', 'TEH GOAT baAAaaaAAAAaaaaa<br />\n____________________<br />\nLike my Facebaaahk Fan Page: http://goo.gl/Eorlka<br />\nBah me on Twitter: http://goo.gl/YN9hxZ<br />\nSupport my future videos by becoming a GoatStep Patron: http://bit.ly/goatsteppatreon<br />\n<br />\nThe Screaming Sheep (and some other sheeps/goats) are from YouTube user: http://www.youtube.com/user/AjQ2891<br />\n<br />\nYeah Lamb is from YouTube user: http://www.youtube.com/camelsandfriends<br />\n<br />\nNOTE: This video is for entertainment purposes only.<br />\n<br />\n<br />\nTAGS: Ylvis - The Fox Goat Remix Edition TVNorge TV Norge Norway The Goat Teh Sheep What Does The Goat Say GoatStep Goat Step Screaming Goats And Sheeps Taco Pizza Chocolate Burger Goat Edition Full Version', 'http://i1.ytimg.com/vi/seUA6LgMQYw/1.jpg', 'Ylvis - The Fox (Goat Remix) [Full Version]', 'ylvis-the-fox-goat-remix-full-version', 24, 'seUA6LgMQYw', '2014-06-03 18:07:11', 88803632),
('http://www.youtube.com/watch?v=X6tKZ-cg4RI&feature=youtube_gdata', 'Os presentamos la mejor temporada de Game of Thrones. Otra gran exclusiva de Marca Blanca.<br />\n<br />\n#GOaT', 'http://i1.ytimg.com/vi/X6tKZ-cg4RI/1.jpg', 'GAME OF GOATS (Game of Thrones Goat Version) #GOaT', 'game-of-goats-game-of-thrones-goat-version-goat', 25, 'X6tKZ-cg4RI', '2014-06-03 18:09:01', 88803632),
('http://www.youtube.com/watch?v=uKG1MYIN6iI&feature=youtube_gdata', 'Check out what it''s like to be a GOAT in Goat Simulator.', 'http://i1.ytimg.com/vi/uKG1MYIN6iI/1.jpg', 'Goat Simulator - Steam Pre-Order Trailer', 'goat-simulator-steam-pre-order-trailer', 26, 'uKG1MYIN6iI', '2014-06-03 18:09:45', 88803632),
('http://www.youtube.com/watch?v=gO-CsbM8FzQ&feature=youtube_gdata', 'Justin Bieber feat. coat and Nicki Minaj feat. Goat<br />\n<br />\nGoat Complation The Best Harlem Shake Ever 2013 in the world justin bieber nicki minaj Daffy Funny Funniest Must watch! most shocking Goat Remixes Remix Remixing<br />\n<br />\nFeauting ft.<br />\nBieber ft. Goat', 'http://i1.ytimg.com/vi/gO-CsbM8FzQ/1.jpg', 'Justin Bieber feat. Goat + Bonus', 'justin-bieber-feat-goat-bonus', 27, 'gO-CsbM8FzQ', '2014-06-03 18:11:59', 88803632),
('http://www.youtube.com/watch?v=gur6nMbfc4o&feature=youtube_gdata', 'Taio Cruz Dynamite Goat Edition - http://www.youtube.com/watch?v=KRUNdBxyuTA <br />\nTaylor Swift I Knew You Were Trouble Goat Edition - <br />\nhttp://www.youtube.com/watch?v=EaDPA-4ODzI<br />\nSubscribe for more Daily Funny Video''s<br />\nCredit http://www.youtube.com/watch?v=QdzQcJ0UGXY<br />\n<br />\n<br />\nGangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix Gangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix Gangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix Gangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix Gangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix <br />\nUntergang Style Remix Hitler Edition<br />\nUntergang Style Remix Hitler Edition<br />\nUntergang Style Remix Hitler Edition<br />\nUntergang Style Remix Hitler Edition<br />\nGangnam Style Sheep Lamb Edition<br />\nGangnam Style Sheep Lamb Edition<br />\nGangnam Style Sheep Lamb Edition<br />\nGangnam Style Sheep Lamb EditionGangnam Style Sheep Lamb Edition<br />\nGangnam Style Sheep Lamb Edition <br />\n- Untergang Style Remix <br />\n- Untergang Style Remix <br />\n- Untergang Style Remix <br />\n- Untergang Style Remix <br />\n- Untergang Style Remix <br />\nGangnam Sheep Style (Hitler, Sheep and Lamb)<br />\nGangnam Sheep Style (Hitler, Sheep and Lamb)<br />\nGangnam Sheep Style (Hitler, Sheep and Lamb)<br />\nGangnam Sheep Style (Hitler, Sheep and Lamb)<br />\nGangnam Sheep Style (Hitler, Sheep and Lamb)', 'http://i1.ytimg.com/vi/gur6nMbfc4o/1.jpg', 'Gangnam Sheep Style (Hitler, Sheep and Lamb) - Untergang Style Remix', 'gangnam-sheep-style-hitler-sheep-and-lamb-untergang-sty', 28, 'gur6nMbfc4o', '2014-06-03 18:14:12', 88803632),
('http://www.youtube.com/watch?v=kxopViU98Xo&feature=youtube_gdata', '10 hours of sax guy playing :D', 'http://i1.ytimg.com/vi/kxopViU98Xo/1.jpg', 'Epic sax guy 10 hours', 'epic-sax-guy-10-hours', 29, 'kxopViU98Xo', '2014-06-03 18:15:01', 88803632),
('http://www.youtube.com/watch?v=wZZ7oFKsKzY&feature=youtube_gdata', 'First and best edition of longest Nyan Cat video on Youtube.<br />\nFeel free to watch whole video..<br />\n<br />\nOriginal video:<br />\nhttp://www.youtube.com/watch?v=QH2-TGUlwu4<br />\n<br />\nCreators website:<br />\nhttp://www.prguitarman.com/index.php?id=348<br />\n<br />\nnyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan nyan', 'http://i1.ytimg.com/vi/wZZ7oFKsKzY/1.jpg', 'Nyan Cat 10 hours (original)', 'nyan-cat-10-hours-original', 30, 'wZZ7oFKsKzY', '2014-06-02 12:36:55', 87011592),
('http://www.youtube.com/watch?v=7LKHpM1UeDA&feature=youtube_gdata', 'Puddings for 10 hours o_o', 'http://i1.ytimg.com/vi/7LKHpM1UeDA/1.jpg', 'Puddi Puddi 10 hours', 'puddi-puddi-10-hours', 31, '7LKHpM1UeDA', '2014-06-02 12:38:27', 87011592),
('public/videos/1secondvideo.mp4', 'description', 'http://127.0.0.1/plugg/git/sharing-is-caring/public/videos/1secondvideo.mp4-thumb.jpg', '1 sec', '1-sec', 35, '94072629', '2014-06-04 10:22:04', 87011592);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fullname` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_link`
--

CREATE TABLE IF NOT EXISTS `user_social_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_token` char(36) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`user_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_social_link`
--

INSERT INTO `user_social_link` (`id`, `user_id`, `user_token`) VALUES
(2, 87011592, '1d0fb235-b8a7-41cc-af33-d48053b71537'),
(1, 88803632, '71f5ceb5-97fd-404d-9242-611fbbddf818');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;