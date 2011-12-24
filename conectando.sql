-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2011 at 01:11 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conectando`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_noticias`
--

DROP TABLE IF EXISTS `t_noticias`;
CREATE TABLE IF NOT EXISTS `t_noticias` (
  `n_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `n_active` tinyint(4) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_body` longtext NOT NULL,
  `n_image` varchar(255) NOT NULL,
  `n_imagetxt` varchar(255) NOT NULL,
  `n_link` varchar(255) NOT NULL,
  `n_linktxt` varchar(255) NOT NULL,
  `n_pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `t_noticias`
--

INSERT INTO `t_noticias` VALUES(16, 1, 'Boston', 'Ciudad de Boston', 'a610e3ef3e0065c871e1f28c47043b74.jpg', 'Boston', 'http://www.Dropbox.com', 'Dropbox', '2011-12-14 00:00:00');
INSERT INTO `t_noticias` VALUES(17, 1, 'Rana', 'Aenean viverra fringilla neque, lacinia dapibus nisi mollis ac. Nulla facilisi. In adipiscing lectus vel quam congue porttitor. Nullam eu tortor nibh. Vivamus sodales nibh vitae nibh lacinia id venenatis magna rhoncus. Aenean non vulputate lectus. Curabitur porttitor, tortor vitae imperdiet ultricies, lacus tortor vulputate velit, a vestibulum eros augue nec mauris. Nunc at ullamcorper elit. Nam vehicula luctus velit, eu faucibus leo tincidunt eget. Morbi vitae dui eget risus rhoncus facilisis. Aenean pretium lacinia mi id blandit. Ut dictum ligula vitae massa dignissim ac pellentesque mi vehicula. Aliquam aliquet risus eu sem pharetra pellentesque. Donec non tempus arcu.\n\n\nSed nec ligula nec velit tincidunt tincidunt. Vestibulum in risus et mi pellentesque tempus. Nam porttitor, risus sed volutpat viverra, nisi nunc sagittis est, a cursus urna massa vitae dolor. Donec porta nibh quis justo euismod feugiat. Donec in neque nec orci congue pulvinar ac vitae ipsum. Sed nec nulla et nibh eleifend euismod. Pellentesque pulvinar pretium neque, sit amet fermentum nisi iaculis eu. Pellentesque nec ipsum ligula. Donec egestas pellentesque sem, vitae pharetra tortor tincidunt non.\n\n\nSed sit amet lobortis libero. Quisque consectetur viverra justo sed interdum. Praesent gravida, magna quis tempus tempus, sapien diam lacinia sapien, et vestibulum tortor lectus et odio. Mauris rutrum venenatis eros et facilisis. In consectetur vehicula felis at auctor. Praesent rutrum viverra lacus aliquam sagittis. Ut auctor molestie accumsan. Cras nec velit a nibh scelerisque feugiat. Integer cursus tellus ut lorem vulputate viverra id vel purus. Phasellus nec nisl lacus, in accumsan felis. Aliquam ut velit eros. Pellentesque velit risus, gravida vel euismod sed, convallis ut erat. Curabitur at elit lacus, quis scelerisque velit.\n\n\nNulla dictum ultrices purus, at vulputate sem consectetur id. Sed sed ante elit. Sed elementum lectus at lacus rhoncus et tempus velit vestibulum. Cras non venenatis mauris. Aliquam imperdiet, orci at malesuada molestie, sem libero feugiat justo, non mattis mi leo ullamcorper felis. Fusce at imperdiet nibh. Nulla id aliquam ipsum. Curabitur mollis, ligula pellentesque placerat lacinia, metus ipsum dictum justo, in pulvinar massa odio eu nunc. Nam semper rhoncus turpis et ultrices. Fusce condimentum lobortis tellus. Aliquam placerat, est vel tincidunt blandit, erat justo molestie quam, sed dapibus velit magna eu felis. Ut velit justo, lacinia ac varius rutrum, blandit ac sem.\n\n\nCras risus nulla, tristique non faucibus vitae, dapibus a lectus. Nullam neque eros, lobortis sit amet condimentum vitae, posuere at magna. Vivamus mollis iaculis sem, nec fringilla velit placerat id. Vivamus vel fermentum diam. Suspendisse id lectus lectus, at fringilla sem. Quisque elementum dictum dolor, sed pellentesque velit faucibus ut. Cras nibh leo, elementum eu vulputate ac, ornare a elit. Quisque pellentesque tempor urna, sed tempus nunc venenatis sed. Nullam consequat adipiscing eleifend. Vivamus varius, ante in pharetra egestas, nulla purus fermentum massa, a vehicula turpis enim at leo. Suspendisse potenti.\n\n\nMorbi vitae dolor sed velit imperdiet fermentum. Fusce quis neque a eros molestie scelerisque. Proin consequat fermentum urna id adipiscing. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec dictum dictum molestie. In sit amet lectus sed augue malesuada lacinia posuere a tellus. Aliquam imperdiet viverra sapien id aliquam. Curabitur ac diam dui. Curabitur rhoncus viverra feugiat. Phasellus interdum mollis gravida. Morbi vel lorem eu sapien pharetra congue. Proin fringilla, ante nec pretium aliquet, lorem mauris dapibus lorem, sit amet sagittis velit urna quis mi. Aliquam erat volutpat. Quisque urna nisl, laoreet ac hendrerit in, consectetur eu lorem. Suspendisse potenti.', 'dc06d86329316536a6b2ad36abab0c26.jpg', 'Costa Rican Frog', 'http://www.google.com', 'Google', '2011-12-14 00:00:00');
INSERT INTO `t_noticias` VALUES(18, 1, 'Galaxy Nexus One', 'Each year, several dozen smartphones land on our collective desks. They come in different shapes and sizes, boast different features and sell at different price points. We take each of them for a spin and review most of them, but only a handful really stand out. This is especially true with Android handsets, where incremental updates appear to be the modus operandi. Every now and then a device comes along that we really look forward to getting our hands on. Google''s line of Nexus smartphones falls into this category, setting the new standard for Android each year.\n\nIn early 2010, the Nexus One became the yardstick for all future Android handsets and, later that year, the launch vehicle for FroYo. A year ago, the Nexus S introduced us to Gingerbread on the popular Galaxy S platform. Now, a few weeks after being unveiled with much fanfare, we''re finally able to sink our teeth into Ice Cream Sandwich with the Galaxy Nexus, arguably the latest addition to Samsung''s critically acclaimed Galaxy S II family. So, does this highly anticipated device live up to our expectations? Is the Galaxy Nexus the smartphone to beat? Most importantly, is Ice Cream Sandwich ready to take Android to the next level? In a word, yes. Read on for our full review.', '62dfa7142b1be280519a583897bc979b.jpg', 'Nexus One', 'http://www.engadget.com/2011/11/24/galaxy-nexus-hspa-review/', 'Galaxy Nexus HSPA+ review', '2011-12-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
CREATE TABLE IF NOT EXISTS `t_users` (
  `u_id` bigint(50) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(50) NOT NULL,
  `u_pass` varchar(32) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` VALUES(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'pdgarcia@gmail.com');
