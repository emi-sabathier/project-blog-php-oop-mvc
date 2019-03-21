-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 mars 2019 à 08:22
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p4_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `comment_date`) VALUES
(81, 2, 'Jean Forteroche', 'Donec tellus turpis, ornare sit amet aliquet ac, facilisis elementum libero.', '2019-03-20 20:52:18'),
(77, 4, 'Jean Forteroche', 'Nulla ipsum est, blandit sit amet viverra nec, maximus vitae enim. ', '2019-03-20 20:51:52'),
(37, 15156161, 'Emi', 'dsffsdsdfsdf', '2019-03-15 11:39:25'),
(82, 2, 'Jean Forteroche', 'ornare sit amet aliquet ac, facilisis elementum libero.', '2019-03-20 20:52:22'),
(78, 4, 'Jean Forteroche', 'Praesent scelerisque massa in urna ultricies vulputate. ', '2019-03-20 20:51:55'),
(79, 4, 'Jean Forteroche', 'Donec tellus turpis, ornare sit amet aliquet ac, facilisis elementum libero.', '2019-03-20 20:51:57'),
(80, 3, 'Jean Forteroche', 'Donec tellus turpis, ornare sit amet aliquet ac, facilisis elementum libero.', '2019-03-20 20:52:14');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(255) NOT NULL DEFAULT 'Jean Forteroche',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `content`, `post_date`) VALUES
(1, '1', 'Episode 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id maximus lectus. Nulla sit amet volutpat ipsum, lobortis mattis nisi. Integer orci enim, dapibus vitae erat non, bibendum sollicitudin urna. In tristique eu lorem quis mattis. Suspendisse accumsan vulputate tellus, sit amet varius quam gravida vel. Vivamus accumsan dui et sem mollis, sed viverra est facilisis. Praesent sed consectetur est. Donec a ipsum sed erat pharetra faucibus. Mauris nibh enim, lacinia ac pulvinar id, sollicitudin eget nisl. Mauris nisl nisl, porttitor vitae laoreet nec, posuere vitae eros.</p>', '2019-03-20 20:46:16'),
(2, '1', 'Episode 2', '<p>Praesent finibus quis augue nec cursus. Curabitur sit amet erat eu nisi suscipit pharetra sit amet vitae ligula. Sed nec nibh ac tortor aliquam tempor ut quis metus. Nunc et scelerisque orci. In hac habitasse platea dictumst. Phasellus vitae leo nisl. Mauris eu tempus dolor, viverra sollicitudin nisl. Mauris in quam dolor.</p>', '2019-03-20 20:46:28'),
(3, '1', 'Episode 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id maximus lectus. Nulla sit amet volutpat ipsum, lobortis mattis nisi. Integer orci enim, dapibus vitae erat non, bibendum sollicitudin urna. In tristique eu lorem quis mattis. Suspendisse accumsan vulputate tellus, sit amet varius quam gravida vel. Vivamus accumsan dui et sem mollis, sed viverra est facilisis. Praesent sed consectetur est. Donec a ipsum sed erat pharetra faucibus. Mauris nibh enim, lacinia ac pulvinar id, sollicitudin eget nisl. Mauris nisl nisl, porttitor vitae laoreet nec, posuere vitae eros.</p>', '2019-03-20 20:46:43'),
(4, '1', 'Episode 4', '<p>Quisque quis arcu varius, vulputate nisi et, euismod nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eu quam eros. Etiam vestibulum eget arcu non lobortis. Nulla ipsum est, blandit sit amet viverra nec, maximus vitae enim. Praesent scelerisque massa in urna ultricies vulputate. Donec tellus turpis, ornare sit amet aliquet ac, facilisis elementum libero.</p>', '2019-03-20 20:47:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_login`, `user_password`, `user_role`) VALUES
(1, 'Jean Forteroche', 'rocheforte', 'jeuj', 'admin'),
(3, 'Emilie Sabathier', 'esabathier', 'jeuj', 'member');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
