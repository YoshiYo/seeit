-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 25 Novembre 2014 à 13:36
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `seeit`
--
CREATE DATABASE IF NOT EXISTS `seeit` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `seeit`;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `favori_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`favori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_src` mediumtext COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` varchar(250) COLLATE utf8_bin NOT NULL,
  `categorie` varchar(250) COLLATE utf8_bin NOT NULL,
  `size` varchar(250) COLLATE utf8_bin NOT NULL,
  `color` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_src`, `user_id`, `title`, `description`, `categorie`, `size`, `color`) VALUES
(12, 'http://vpnhotlist.com/wp-content/uploads/2014/03/image.jpg', 0, 'titre', '', '', '', ''),
(13, 'http://www.zastavki.com/pictures/originals/2013/Photoshop_Image_of_the_horse_053857_.jpg', 0, 'photo de merde', '', '', '', ''),
(14, 'http://www.in.com/contents/elements/SaveImage.php?image=8d512c56b197753d761bc7501d7c09ee_w_s.jpg&id=313242&ctid=WALLPAPERS', 0, 'La bite', '', '', '', ''),
(16, 'https://lh5.ggpht.com/-GmnZzTGMD7o/Uafk33IaVYI/AAAAAAAAMd4/aFjhymvWvak/s640/PatrickPichette414.jpg', 0, 'Triste vie', '', '', '', ''),
(17, 'http://www.lefigaro.fr/medias/2014/07/03/PHOf2d2cd5c-0291-11e4-bc67-a9e89e449400-805x453.jpg', 0, 'Vagues', '', '', '', ''),
(18, 'http://farm8.staticflickr.com/7304/11949811256_99cd5cbd55_b.jpg', 0, 'Patates', '', '', '', ''),
(19, 'http://www.glamourparis.com/uploads/images/thumbs/201324/photo___les_plus_beaux_clich__s_sous_marins_2608_north_640x440.jpg', 0, 'Miam', 'requin', 'Animaux', 'HD', 'blue');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `mail`, `password`, `first_name`, `last_name`, `admin`) VALUES
(3, 'louis.charbonier@y-nov.com', '777cadc280bb23ebea268ded98338c39', 'louis', 'la bite', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
