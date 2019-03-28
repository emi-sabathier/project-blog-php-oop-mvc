-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 28 mars 2019 à 07:53
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
  `report` int(11) DEFAULT '0',
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `report`, `comment_date`) VALUES
(80, 3, 'Jean Forteroche', 'Donec tellus turpis, ornare sit amet aliquet ac, facilisis elementum libero.', 0, '2019-03-20 20:52:14'),
(125, 7, 'Jean Forteroche', 'y', 1, '2019-03-27 16:01:12'),
(126, 7, 'Soan Kei', 'commentaire méchant', 1, '2019-03-28 07:58:46'),
(127, 7, 'Soan Kei', 'c\'est nul ici', 1, '2019-03-28 07:59:11');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `post_date`) VALUES
(1, 'Episode 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id maximus lectus. Nulla sit amet volutpat ipsum, lobortis mattis nisi. Integer orci enim, dapibus vitae erat non, bibendum sollicitudin urna. In tristique eu lorem quis mattis. Suspendisse accumsan vulputate tellus, sit amet varius quam gravida vel. Vivamus accumsan dui et sem mollis, sed viverra est facilisis. Praesent sed consectetur est. Donec a ipsum sed erat pharetra faucibus. Mauris nibh enim, lacinia ac pulvinar id, sollicitudin eget nisl. Mauris nisl nisl, porttitor vitae laoreet nec, posuere vitae eros.</p>', '2019-03-20 20:46:16'),
(2, 'Episode 2', '<p>Praesent finibus quis augue nec cursus. Curabitur sit amet erat eu nisi suscipit pharetra sit amet vitae ligula. Sed nec nibh ac tortor aliquam tempor ut quis metus. Nunc et scelerisque orci. In hac habitasse platea dictumst. Phasellus vitae leo nisl. Mauris eu tempus dolor, viverra sollicitudin nisl. Mauris in quam dolor.</p>', '2019-03-20 20:46:28'),
(3, 'Episode 3', '<p>re Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id maximus lectus. Nulla sit amet volutpat ipsum, lobortis mattis nisi. Integer orci enim, dapibus vitae erat non, bibendum sollicitudin urna. In tristique eu lorem quis mattis. Suspendisse accumsan vulputate tellus, sit amet varius quam gravida vel. Vivamus accumsan dui et sem mollis, sed viverra est facilisis. Praesent sed consectetur est. Donec a ipsum sed erat pharetra faucibus. Mauris nibh enim, lacinia ac pulvinar id, sollicitudin eget nisl. Mauris nisl nisl, porttitor vitae laoreet nec, posuere vitae eros.</p>', '2019-03-20 20:46:43'),
(7, 'Episode 4', '<p>test Suspendisse potenti. Curabitur porttitor elementum ex, quis interdum velit tempor vel. Donec condimentum elit eget sapien tempor auctor. Duis at risus arcu. Fusce facilisis feugiat condimentum. Vestibulum tincidunt urna vehicula sem vulputate malesuada. Maecenas mollis lacus quis fringilla ultrices. Maecenas dictum et diam non pellentesque. Nulla sit amet neque auctor, mattis nisi ac, placerat ante. Fusce lacus elit, varius non ipsum vel, feugiat pharetra orci.</p>', '2019-03-26 13:01:56');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_login`, `user_password`, `user_role`) VALUES
(9, 'Soan Kei', 'soan', '$2y$10$OkiW0u.kAFfA2BD7X9MfU.AYdMb9IjhfxxFl0VJ4J07VSYv3DNNuS', 0),
(14, 'Jean Forteroche', 'rocheforte', '$2y$10$IqcAO0iNRuc3Y4igixfFLe9EAmT2N4MWybx6kVH1c2qdpmVZzOhae', 1),
(15, 'Emilie Sabathier', 'esabathier', '$2y$10$NQ6BEDNnAKBNffBzdPMYIuBDb/UaCrCV.bjI82hZpRhM1YdcvV8YW', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
