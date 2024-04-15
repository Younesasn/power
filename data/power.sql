-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 15 avr. 2024 à 08:43
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `power`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id_actors` int(11) NOT NULL,
  `first_name_actors` varchar(50) DEFAULT NULL,
  `last_name_actors` varchar(50) DEFAULT NULL,
  `surname_actors` varchar(30) DEFAULT NULL,
  `description_actors` text,
  `date_birth_actors` date DEFAULT NULL,
  `quote_actors` text,
  `picture_actors` varchar(255) DEFAULT NULL,
  `status_actors` enum('En vie','Mort') NOT NULL DEFAULT 'En vie',
  `picture_round_actors` varchar(255) NOT NULL,
  `date_add_actors` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `occupation_actors` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id_actors`, `first_name_actors`, `last_name_actors`, `surname_actors`, `description_actors`, `date_birth_actors`, `quote_actors`, `picture_actors`, `status_actors`, `picture_round_actors`, `date_add_actors`, `occupation_actors`) VALUES
(16, 'Angela', 'Valdes', 'Angie', 'Angela était une agente du FBI et l\'assistante du procureur de l\'Etat de New York. Elle est devenue aussi chef de la brigade criminelle à New York. Angela était l\'amour de jeunesse de James St. Patrick. Le jour où ils se revoient après plusieurs années, leur relation reprend. Mais Angela ne sait pas que James est le criminel qu\'elle recherche et James ne sait pas qu\'elle est une agent du FBI.', '1980-04-20', 'Jamie je t\'aime', 'angela_vAHDPApGul_3GVByNOxXO.webp', 'Mort', 'angela_pdp_7QWvpsiBuA_72BSK3Y15e.webp', '2024-04-12 12:13:08', 'Agent du FBI'),
(17, 'Diana', 'Tejada', 'Princess DIana', 'Diana est la fille de Monet Stewart Tejada et Lorenzo Tejada et la sœur de Cane et Dru Tejada. Elle gère le business avec sa mère et sa famille et ne va pas à l\'école sous la demande de sa mère car elle a besoin d\'elle sur le terrain.', '2003-08-11', 'La moitié des merdes qui nous tombent dessus viennent du fait que t\'es incapable de la boucler, et tu te mêles toujours des affaires des autres.', 'diana_nKHjx16ofn_VsHKaeKF9e.webp', 'En vie', 'diana_pdp_5qwv2G6u89_A63XispbWb.webp', '2024-04-12 12:15:26', 'Étudiante à Stansfield'),
(18, 'LaKeisha', 'Grant', 'Keisha', 'LaKeisha était la meilleure amie de Tasha St. Patrick depuis l\'école primaire. Elle donnait des conseils utiles et solides à sa meilleure amie sur ses relations. Mais même si elle avait plus de connaissances sur la beauté, elle était souvent ignoré par les hommes.', '1982-09-12', 'Quand est-ce que j\'ai balancé un truc sur toi, Tasha ? Moi j\'ai tout risqué pour ta famille, toujours et plusieurs fois et tu me demandes de te prouver ma loyauté ? Y\'en a marre ! Pourquoi je devrais autant de loyauté ? A cause d\'un putain de sac que tu m\'as refilé ? Je dois m\'occuper de mon fils moi aussi et pour lui non plus c\'est pas juste !', 'lakeisha_YSAm8v3Rm1.jpg', 'Mort', 'lakeisha_pdp_13MajIRTmf.jpg', '2024-04-12 12:19:00', 'Informatrice fédérale'),
(19, 'Tariq', 'Saint Patrick', 'Riq', 'Tariq est le fils de James St. Patrick et Tasha St. Patrick et le grand-frère de Raina et Yasmine St. Patrick. Tariq est le premier fils de James et Tasha mais voir son père quitter la maison pour aller voir son amante Angela a animer une haine en lui. Après avoir commis un acte irréparable, Tariq continue sa vie à l\'Université et commence un business de drogue pour aider sa mère.', '2002-11-11', 'Vous me connaissez pas. J\'ai tué mon propre père pour sauver ma mère. J\'ai tué mon meilleur ami pour protéger ma famille. Et d\'après vous, je me battrai pas pour survivre ? Je fais toujours ce que j\'ai à faire. Ca se joue toujours entre moi, ma famille et mon flingue.', 'tariq_JHlvECYqCI.jpg', 'En vie', 'tariq_pdp_mweOuf2lIh.jpg', '2024-04-12 12:24:02', 'Dealeur de drogue'),
(20, 'Tasha', 'Saint Patrick', 'Tash', 'Tasha est l\'ex-femme de James St. Patrick avec qui elle a eu trois enfants Tariq, Raina et Yasmine. Tasha était favorable à la double vie de son ex mari et ne voulait pas qu\'il s\'éloigne de ce milieu très productif. Mais cela change lorsqu\'elle découvre qu\'il la trompe et qu\'il s\'éloigne d\'elle.', '1990-11-17', 'Tariq rentre à la maison', 'tasha_HDCsSY6hRe.webp', 'En vie', 'tasha_pdp_sTtbnUSsN7.webp', '2024-04-12 12:28:32', 'Témoin fédéral'),
(21, 'Tommy', 'Egan', 'Tommy', 'Tommy est le meilleur ami de James St. Patrick depuis qu\'ils sont enfants. Vivant dans les rues du Queens, les deux enfants ont grandis en apprenant les vices de la rue dans le monde du crime grâce à leur mentor Kanan Stark et Breeze. Les deux petits enfants qui vendaient de la drogue au coin des rues finissent par construire leur propre organisation de drogue après la mort de Breeze et l\'arrestation de Kanan Stark et vendent les produits du fournisseur Felipe Lobos. Grâce à l\'aide de Tasha et du blanchiment d\'argent, Tommy et Ghost ont su sortir de la rue mais continuent leurs activités illégales.', '1976-06-27', 'Business is Business', 'tommy_9CObWxZzTJ.webp', 'En vie', 'tommy_pdp_oYfBau39st.jpg', '2024-04-12 12:30:15', 'Distributeur de drogue'),
(22, 'James', 'Saint Patrick', 'Ghost', 'Ghost était le propriétaire du fameux club Truth et était en course pour devenir le lieutenant-gouverneur de New-York. Avant ça, James était connu sous le nom de Ghost en tant qu\'un grand dealeur de drogue dans les rues de New York avec son partenaire et ami d\'enfance Tommy Egan, avant de se retirer de ce dangereux monde.', '1978-04-05', 'C\'est toi qui a fait de moi ce que je suis, rappelle-toi mec. C\'est ce que je suis, c\'est ce que j\'ai toujours été. Si j\'avais vécu ailleurs, si tu m\'avais pas pris sous ton aile, j\'aurais fait une putain d\'école de commerce. Je suis un entrepreneur, moi ! J\'ai fais des détours pour y arriver, ouais, mais c\'est bon, ça y est, j\'ai la place que je mérite.', 'ghost_pcYfgrTv3Y.webp', 'Mort', 'ghost_pdp_EfqJ9J0rLy.jpeg', '2024-04-15 09:07:19', 'Baron de la drogue'),
(23, 'Kanan', 'Stark', 'Kay', 'Kanan était un gangster qui a grandi avec Ghost, Tasha et Tommy et était leur mentor avant de devenir leur rival. Il a été piégé et envoyé en prison par James et Tasha pendant 10 ans. Après sa sortie de prison, il essaie de se venger d\'eux et particulièrement de Ghost.', '1975-08-15', 'Tu sais que tout ça n\'est pas réel ? Que ça change rien à ce que tu es ? Moi, je souhaite la taule à personne, mais toi t\'es un criminel, un sale mec, tout comme moi négro.', 'kanan_UfkzG0C3ga.jpg', 'Mort', 'kanan_pdp_r2M8YtFs8W.jpg', '2024-04-15 09:16:33', 'Gangster'),
(27, 'Monet', 'Tejada', 'Mo', 'Monet est la mère de Dru, Diana et Cane Tejada et la tante de Zeke Cross. Elle aussi la femme de Lorenzo Tejada et gère le business de drogue pendant qu\'il est en prison. Un jour, Tariq St. Patrick se présente à elle et lui propose de vendre de la drogue pour lui, ce qu\'elle accepte. En même temps, Monet bannie son premier fils Cane de la famille étant donné que ce dernier part en vrille. A cause de ça, Monet se retrouve vite en difficulté face au menace de son fournisseur à cause d\'un de ses hommes qu\'elle a tuée, sans compter les problèmes que Cane lui apporte. Elle tue alors Rico Barnes, aide Tariq de se débarrasser de Tommy Egan et l\'accueille dans sa famille.', '1982-01-29', 'Va te faire foutre mec', 'monet_Gn6z0OFra2.webp', 'En vie', 'monet_pdp_zAw9Xn1zr7.jpg', '2024-04-15 09:26:10', 'Dealeuse de drogue'),
(28, 'Brayden', 'Weston', 'Le morveux', 'Brayden est le meilleur ami et colocataire de Tariq St. Patrick à l\'Université de Stansfield. A Choate, lui et Tariq vendent de la drogue au sein du lycée et se sont liés d\'amitié jusqu\'à ce que Tariq se fasse viré. Lorsque Tariq vient à Stansfield, les deux amis recréent des liens et recommencent leur business ensemble.', '2002-11-11', 'Je me suis fait tellement de pognon super vite. J’ai du le refiler à Cane mais c’est moi qui l’ai gagné ! C’était ma tune, pas celle de mes parents. Et j’ai adoré, mec.', 'brayden_bZWbGRcvJn.webp', 'En vie', 'brayden_pdp_y9ucgr4Ojf.webp', '2024-04-15 09:30:30', 'Étudiant à Stansfield'),
(29, 'Cane', 'Tejada', 'Cane', 'Cane est le grand-frère de Diana et Dru Tejada et le fils Lorenzo et Monet Stewart Tejada. Il est aussi son bras droit dans le business de la drogue. Il essaye de perpétrer l\'autorité de son père depuis qu\'il est incarcéré. Cependant, Cane voit sa place se faire voler petit à petit par Tariq St. Patrick qui devient le vendeur principal. Cane voit son arrivée d\'un mauvais œil et fait tout pour faire comprendre à sa mère que Tariq ne rapportera que des problèmes. Mais son impulsivité et imprévisibilité obligeront sa mère à le bannir de la famille et le reste de sa famille à lui tourner le dos. Il se met alors en tête d\'aller tuer Tariq mais il finit par s\'allier avec lui pour se dédouaner du meurtre du professeur Reynolds.', '1990-02-27', 'Tu vois... J\'ai pas besoin de détails ou qu\'on l\'attache pour torturer quelqu\'un. J\'ai rien à te prouver. Mais voilà qui je suis.', 'cane_pJYkhvVzPq.webp', 'En vie', 'cane_pdp_DpDE3Rpcv3.webp', '2024-04-15 09:36:17', 'Dealeur de drogue'),
(31, 'Lauren', 'Baldwin', 'Lauree', 'Lauren est une étudiante de l\'Université de Stansfield. Elle est dans la classe de lettres classiques de Tariq St. Patrick et s\'est très vite lié d\'amitié avec lui, ou peut-être plus.', '2003-01-01', 'Pardonne moi Tariq', 'lauren_Trj6xwBa88.webp', 'En vie', 'lauren_pdp_tJDTPfNtTv.webp', '2024-04-15 09:40:23', 'Témoin fédéral'),
(32, 'Raquel', 'Thomas', 'Raq', 'Dans la rue, Raq est fière, dure et féroce. Elle est une femme dangereuse et qui arrive à se faire un nom dans un monde gouverné par les hommes. Elle est dure, résolue, impitoyable mais sait exprimer de l\'amour. Le seul qui en reçoit est son fils Kanan, pour qui elle fait tout. Mais parfois, elle se demande si elle aime pour qui il est ou parce qu\'elle se voit en lui. La cadette de sa famille, elle s\'occupe aussi de ses deux frères. Elle est le soleil et tout le monde dans son univers n\'est qu\'un orbite.', '1967-03-13', 'Kanan ne rentre pas là-dedans', 'raquel_T3ymGNFifh.webp', 'En vie', 'raquel_pdp_o8tskUSyht.webp', '2024-04-15 09:45:00', 'Dealeuse de drogue'),
(33, 'LaVerne', 'Ganner', 'Jukebox', 'Jukebox était une agente corrompu de la police de Washington. Elle était aussi la cousine de Kanan Stark et Jukebox utilisait son badge de police pour faciliter ses délits.', '1976-09-19', 'Vous entendez ? Vous le ressentez ? Ma cousine Jukebox sait chanter. Mais cette voix est trompeuse parce que je connais personne plus dure à cuire qu\'elle et je l\'aime plus que tout. Juke est parfaite.', 'jukebox_KtDfHUfvQS.webp', 'Mort', 'jukebox_pdp_agaWMTSFRg.webp', '2024-04-15 09:49:39', 'Gangster'),
(34, 'Kadeem', 'Mathis', 'Unique', 'Unique est sans doute le plus grand baron de la drogue dans le quartier de South Jamaica, dans le Queens. La direction du business lui a été confié par son frère qui va devoir finir sa vie en prison. Unique est le rival principal de Raquel Thomas pour leur quête de domination du quartier dans le monde de la drogue. Beau, viril, astucieux, il est l\'homme alpha dans tous les sens. Unique contrôle le quartier et lorsqu\'il y a un obstacle, il devient dur mais toujours juste, ou pas. Car si quelqu\'un lui met un couteau dans le dos, il fera ce qu\'il faut pour se protéger.', '1976-05-12', 'Fuck You Raquel', 'unique_D8fTvvgUyu.webp', 'En vie', 'unique_pdp_hmoT4XEmLI.jpg', '2024-04-15 09:54:48', 'Baron de la drogue'),
(35, 'Malcolm', 'Howard', 'Malcolm', 'Ennemi juré du South Jamaica, il harcèle constamment ses habitants pour tenter de faire régner l\'ordre, une faible tentative de nettoyage du quartier le plus dangereux de NYC en 1991. Il a une place spéciale, froide et sombre dans son cœur pour Raq, bien que nous ne sachions pas encore pourquoi.', '1965-01-12', 'Tous les flics et criminels de la ville savent que Malcolm Howard assure et maintient l\'ordre. Ces enfoirés me respectent, ils me craignent. C\'est à moi qu\'on rend des comptes. Voilà qui je suis. Tous les flics et criminels de la ville savent que Malcolm Howard assure et maintient l\'ordre. Ces enfoirés me respectent, ils me craignent. C\'est à moi qu\'on rend des comptes.', 'malcolm_Hs0b2GrFh4.webp', 'En vie', 'malcolm_zrpfGHedVy.webp', '2024-04-15 10:03:12', 'Enquêteur de police'),
(36, 'Davis', 'Sampton', 'Diamond', 'Diamond est un gentil géant aux yeux doux et un corps fait en granite muni d\'une défense précise, un trait physique forgé pendant son séjour en prison qui a duré 15 ans. Avant que Diamond soit incarcéré, il était à la tête du gang le plus prometteur de Chicago qui allait prendre la tête de la ville. Derrière les barreaux, Diamond s\'est créé une tactique pour vendre de la drogue respectée par les plus grandes familles du crime. Il a aussi passé son temps à lire des classiques de la littérature ainsi qu\'à s\'instruire de l\'histoire à la philosophie tout en passant par la littérature. Maintenant qu\'il est sorti de prison, Diamond a bien l\'intention de reprendre les rênes des mains de son successeur par intérim, son petit frère.', '1978-04-25', 'Tommy est mon frère', 'diamond_2E69r2gOFv.webp', 'En vie', 'diamond_pdp_7PLUCTtRDn.jpg', '2024-04-15 10:06:42', 'Chef des CBI'),
(37, 'Claudia', 'Flynn', 'Claud', 'Claud est la seule fille du plus grand baron de la drogue de Chicago. Astucieuse n\'est pas assez pour la décrire : son intelligence est le mix entre ses cours d\'Ivy League et les cours appris dans les rues de Chicago. Elle est aussi brillante qu\'un politicien et aussi léthal qu\'une clé serre-tube au visage. Claud n\'a pas besoin d\'un feu vert pour faire quelque chose, elle est celle qui le donne et celle qui ne faut pas oublier dans la ville de Chicago. Dans ce business généralement dirigé par les hommes, Claud est determinée à frayer son propre chemin, qui pourrait peut-être sauver sa famille.', '1980-06-21', 'Le Dahlia est à moi !', 'claudia_GAczjPSw0O.webp', 'Mort', 'claudia_pdp_LEzVj8Gnxk.webp', '2024-04-15 10:11:20', 'Gangster'),
(38, 'Darnell', 'McDowell', 'D-Mac', 'D-Mac est un jeune homme élevé par les rues du côté sud de Chicago. Indépendant, fièrement loyal, il n\'y a pas mieux que lui pour représenter son gang. Néanmoins, D-Mac n\'est seulement qu\'un enfant qui veut qu\'on s\'occuper de lui. Après avoir donné de l\'aide à Tommy pendant une course, D-Mac voit Tommy comme la personne qui peut complètement changé son futur.', '2005-07-17', 'Laissez-moi vivre bordel', 'd-mac_NXHllgch3U.webp', 'En vie', 'd-mac_pdp_KQ4z5aN7fc.webp', '2024-04-15 10:15:39', 'Dealeur de drogue'),
(39, 'Vic', 'Flynn', 'Vic', 'Vic est l\'héritier de la plus grande famille du crime de Chicago, un prince qui dirige aussi bien avec son cœur qu\'avec ses poings. Cependant, Vic n\'aime pas que son père ait tracé toute sa vie à sa place, que ce soit pour l\'amour ou le business. Vic peut être vu avec les mondains les plus riches de Chicago tout autant qu\'avec les dealeurs les plus influents de la ville. Réalisant que son père s\'intéresse de plus en plus à Tommy, Vic se battra pour reprendre ce qui lui revient de droit à tout prix. Cherchant à améliorer le business familial et résoudre tous les quiproquos, l\'allégeance de Vic est mise à rude épreuve et cela impactera l\'entièreté de la ville de Chicago.', '1980-12-12', 'Gloria je t\'aime', 'vic_ru1XRUna8v.webp', 'En vie', 'vic_pdp_x2fcvR754H.webp', '2024-04-15 10:18:37', 'Gangster'),
(40, 'Gloria', 'Rogers', 'Glo', 'Gloria est une ancienne soldat de la Marine époustouflante qui cherche à frayer son propre chemin dans Chicago. Elle est fougueuse, fière et n\'a aucun compte à rendre à personne, surtout pas un homme. Dans la cuisine à l\'arrière du restaurant auquel elle travaille, elle cusine des plats jamaïcains digne d\'un restaurant Michelin. Elle accueille souvent des criminels irlandais cherchant à emménager dans ses bien immobiliers. Mais cela n\'arrête pas les magouilles de Gloria qui rêve d\'ouvrir, un jour, son propre restaurant et s\'éloigner d\'une famille du crime avec qui elle s\'est dangereusement mélangée. Sa rencontre avec Tommy cause rapidement un énorme changement dans la vie de ceux qui l\'entourent et seule elle peut tout régler.', '1980-10-10', 'Vic ma vie', 'gloria_HiwXoQBooO.webp', 'Mort', 'gloria_pdp_NlNiRBbf7V.webp', '2024-04-15 10:21:07', 'Serveuse');

--
-- Déclencheurs `actors`
--
DELIMITER $$
CREATE TRIGGER `add_new_actor` AFTER INSERT ON `actors` FOR EACH ROW BEGIN INSERT INTO actors_log(action_log, surname_actors) VALUES ('Ajout', NEW.surname_actors); END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_actor` AFTER DELETE ON `actors` FOR EACH ROW BEGIN INSERT INTO actors_log(action_log, surname_actors) VALUES ('Suppression', OLD.surname_actors); END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_actor` AFTER UPDATE ON `actors` FOR EACH ROW BEGIN INSERT INTO actors_log(action_log, surname_actors) VALUES ('Modification', NEW.surname_actors); END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `actors_log`
--

CREATE TABLE `actors_log` (
  `id_actors_log` int(11) NOT NULL,
  `action_log` enum('Ajout','Modification','Suppression') NOT NULL,
  `date_action_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `surname_actors` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actors_series`
--

CREATE TABLE `actors_series` (
  `id_actors_series` int(11) NOT NULL,
  `id_actors` int(11) NOT NULL,
  `id_series` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actors_series`
--

INSERT INTO `actors_series` (`id_actors_series`, `id_actors`, `id_series`) VALUES
(16, 16, 1),
(17, 17, 2),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 19, 2),
(23, 22, 1),
(24, 23, 1),
(25, 23, 3),
(26, 21, 4),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 31, 2),
(31, 32, 3),
(32, 33, 3),
(33, 34, 3),
(34, 35, 3),
(35, 36, 4),
(36, 37, 4),
(37, 38, 4),
(38, 39, 4),
(39, 40, 4);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', '$2y$10$RnmAlGLCRJbYlMnxXM64fuujb1pSXWJV6TJhaqyBusiRqjmWHgP5m');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id_contacts` int(11) NOT NULL,
  `first_name_contacts` varchar(30) NOT NULL,
  `last_name_contacts` varchar(30) NOT NULL,
  `email_contacts` varchar(80) DEFAULT NULL,
  `object_contacts` varchar(50) NOT NULL,
  `text_contacts` text NOT NULL,
  `date_contacts` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id_contacts`, `first_name_contacts`, `last_name_contacts`, `email_contacts`, `object_contacts`, `text_contacts`, `date_contacts`) VALUES
(1, 'test', 'test', 'test@test.fr', 'test', 'test', '2024-03-28 23:03:09'),
(2, 'test', 'test', 'test@test.fr', 'test', 'test', '2024-03-28 23:03:09'),
(3, 'you', 'you', 'you@you', 'you', 'you', '2024-03-28 23:09:58'),
(4, 'nabil', 'bail', 'nabil@nabil.com', 'nabil', 'nabil', '2024-03-30 14:03:35'),
(5, 'aimen', 'laoudi', 'aimen@main', 'fzefgze', 'ferzzrevzr', '2024-03-31 12:38:19'),
(6, 'amelie', 'ameli', 'zda@zohgzv', 'szvbnzoevb', 'qlfncqcf', '2024-04-02 10:09:27'),
(7, 'str', 'SRT', 'str@str', 'str', 'str', '2024-04-02 11:21:16'),
(8, 'Grant', 'LAKEISHA', 'lakeishagrant@gmail.com', 'Ajout d\'un personnage', 'Bonsoir j\'aimerai voir le résumé de Lakeisha Grant dans la rubrique Power s\'il vous plait merci', '2024-04-02 16:56:35'),
(9, 'test', 'TEST', 'test@test', 'test', 'test', '2024-04-02 23:25:20'),
(10, 'lucas', 'LUCAS', 'lucas@lucas', 'lucas', 'Lucas', '2024-04-03 10:42:32'),
(11, 'czVC', 'HKV', 'lihb@lihvb', 'lhb', 'lhbl', '2024-04-03 11:13:09'),
(12, 'class', 'CALSSZ', 'zda@azf', 'dadaficjocjoi', 'laïcs,dcv', '2024-04-03 11:23:37'),
(13, 'ass', 'ASS', 'assa@ass', 'ass', 'ass', '2024-04-03 13:16:25'),
(14, 'cdsdc', 'VVF', 'zef@fefze', 'zgzrgzr', 'rzgzrgef', '2024-04-04 13:00:13'),
(15, 'adaed', 'AFEZF', 'zfzef@zaef.com', 'zrszdvsv', 'vfdgbb', '2024-04-04 13:32:41'),
(16, 'ssss', 'SSS', 'sss@sss.com', 'cccccc', 'cccccc', '2024-04-04 14:59:41'),
(17, 'mira', 'CELINE', 'jfbgmejuvf@kjbfiuz.com', 'qrbjzqmf', 'mdginsmg', '2024-04-14 15:41:25');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id_series` int(11) NOT NULL,
  `name_series` varchar(30) NOT NULL,
  `picture_series` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id_series`, `name_series`, `picture_series`) VALUES
(1, 'Power', 'book1.webp'),
(2, 'Power Book II : Ghost', 'book2.webp'),
(3, 'Power Book III : Raising Kanan', 'book3.webp'),
(4, 'Power Book IV : Force', 'book4.webp');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `first_name_users` varchar(30) DEFAULT NULL,
  `last_name_users` varchar(30) DEFAULT NULL,
  `email_users` varchar(80) DEFAULT NULL,
  `password_users` varchar(255) DEFAULT NULL,
  `adress_users` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `first_name_users`, `last_name_users`, `email_users`, `password_users`, `adress_users`) VALUES
(1, 'test', 'test', 'test@test.fr', 'test', NULL),
(3, 'tost', 'tost', 'tost@tost.fr', 'tost', NULL),
(4, 'toast', 'toast', 'toast@tost.fr', 'toast', NULL),
(9, 't', 't', 't@t.fr', 'test', NULL),
(10, 'you', 'you', 'you@you.fr', 'you', NULL),
(11, 'ya', 'ya', 'ya@ya.fr', '$2y$10$O1K4i8hljnVo/b0gxZp7.uB8YwzNyIXVKGweLgT9UxITweMYa5Ryq', NULL),
(12, 'test', 'test', 'test@testztzet', '$2y$10$j/Q/tYFGXrQvxk1i8hJ5C.olsg7QF2F6rz2Ak9x6ntWGpkFXhUXma', NULL),
(13, 'abba', 'abba', 'abba@abba.com', '$2y$10$8Le5zXF3o99PIqUvqqZq3eQR7L1s52izjHXW2AP3CrukifLRLe5ae', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id_actors`),
  ADD UNIQUE KEY `surname_actors` (`surname_actors`);

--
-- Index pour la table `actors_log`
--
ALTER TABLE `actors_log`
  ADD PRIMARY KEY (`id_actors_log`);

--
-- Index pour la table `actors_series`
--
ALTER TABLE `actors_series`
  ADD PRIMARY KEY (`id_actors_series`),
  ADD KEY `id_actors` (`id_actors`),
  ADD KEY `id_series` (`id_series`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contacts`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email_users` (`email_users`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id_actors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `actors_log`
--
ALTER TABLE `actors_log`
  MODIFY `id_actors_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `actors_series`
--
ALTER TABLE `actors_series`
  MODIFY `id_actors_series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contacts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id_series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actors_series`
--
ALTER TABLE `actors_series`
  ADD CONSTRAINT `actors_series_ibfk_1` FOREIGN KEY (`id_actors`) REFERENCES `actors` (`id_actors`),
  ADD CONSTRAINT `actors_series_ibfk_2` FOREIGN KEY (`id_series`) REFERENCES `series` (`id_series`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
