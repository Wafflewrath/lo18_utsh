-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 18 Juin 2014 à 12:33
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE IF NOT EXISTS `calendrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nomreunion` varchar(35) NOT NULL,
  `contenu` mediumtext NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `calendrier`
--

INSERT INTO `calendrier` (`id`, `date`, `nomreunion`, `contenu`, `lieu`) VALUES
(1, '2014-05-14', ' Réunion commune de l’atelier de re', 'La réunion aura lieu à l’IMI, 62 Bd de Sébastopol, 75003 Paris, deuxième étage. Ordre du jour : Rapport d’activité du GIS UTSH. Débat d’orientation. Réunion à huis clos du comité directeur et du bureau de direction', '62 Bd Sépastopol'),
(2, '2014-07-01', 'Réunion de l’atelier de recherche', 'La réunion aura lieu à l’IMI, 62 Bd de Sébastopol, 75003 Paris, deuxième étage. Ordre du jour : Vers un master inter-UT', '62 Bd Sépastopol'),
(4, '2014-06-14', 'montitre', 'kjbi h lukhh ibjn ', 'compy'),
(5, '2014-06-14', 'montitre', 'kjbi h lukhh ibjn ', 'compy'),
(6, '2014-06-14', 'montitre', '<h1>Bouh !</h1>\r\n', 'compy'),
(7, '2014-06-16', 'RÃ©union au sommet', '<p>Nous allons nous faire plaisir !</p>\r\n\r\n<p>Youpi</p>\r\n', 'CompiÃ¨gne'),
(8, '2014-06-20', 'un petit testounet', '<p>Whoua on va faire une testoune</p>\r\n\r\n<ul>\r\n	<li>blablabla</li>\r\n	<li>toudoudou</li>\r\n</ul>\r\n\r\n<p>rapiat</p>\r\n', 'monlieu'),
(9, '2014-06-19', 'encore 1', '<p>fdsv</p>\r\n\r\n<p>ez fdsf za</p>\r\n\r\n<p>ze fsdfdsf</p>\r\n', 'CompiÃ¨gne'),
(10, '2014-06-27', 'evon', '<p>dsf df dsfsd</p>\r\n', 'fsdfs'),
(11, '2014-07-14', 'jaimelagyme', '<p>Super fouet</p>\r\n\r\n<p>Trop bien</p>\r\n', 'CompiÃ¨gne'),
(12, '2014-06-17', 'zef', '<p>sdf q sdfxc</p>\r\n', 'dfs'),
(13, '2014-06-01', 'edrf', '<p>zefdsvc qezg fdg</p>\r\n\r\n<p>dfd d</p>\r\n', 'fds');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `universite` enum('utc','utt','utbm','iplb') COLLATE utf8_bin NOT NULL,
  `mail` varchar(30) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `universite`, `mail`, `nom`) VALUES
(1, 'utc', 'charles.lenay@utc.fr', 'Charles Lenay'),
(2, 'utt', 'somebody@utt.fr', 'somebody'),
(3, 'utbm', 'somebody@utbm.fr', 'somebody'),
(4, 'iplb', 'somebody@iplb.fr', 'somebody');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(80) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `contenuresume` text COLLATE utf8_bin NOT NULL,
  `datecreation` date NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `contenuresume`, `datecreation`, `etat`) VALUES
(1, 'news test BD', 'test test test test test test test test test test test test test test test test test test ', 'resume resume resume resume resume resume resume ', '0000-00-00', 1),
(2, 'RÃ©union du Premier comitÃ© directeur', 'Ce comitÃ© directeur inaugurera le fonctionnement opÃ©rationnel du GIS UTSH : composition du bureau de direction, du conseil scientifique et financement.', 'RÃ©union, le 14 mai, Ã  9h. IMI, Bd de SÃ©bastopol.', '2014-04-29', 1),
(3, 'RÃ©union commune', '<p>La rÃ©union aura lieu Ã  lâ€™IMI, 62 Bd de SÃ©bastopol, 75003 Paris, deuxiÃ¨me Ã©tage.</p>\n\nOrdre du jour :\n<ul>\n<li>Rapport dâ€™activitÃ© du GIS UTSH</li>\n\n<li>DÃ©bat dâ€™orientation<.li>\n\n<li>RÃ©union Ã  huis clos du comitÃ© directeur et du bureau de direction</li>\n</ul>', 'RÃ©union commune de lâ€™atelier de recherche, du bureau de direction et du comitÃ© directeur.\r\nLa rÃ©union aura lieu Ã  lâ€™IMI, 62 Bd de SÃ©bastopol, 75003 Paris, deuxiÃ¨me Ã©tage.', '2014-05-14', 1),
(4, 'Une nouvelle news', 'Une nouvelle news. Voici une nouvelle news Voici une nouvelle news Voici une nouvelle news\r\n', 'Voici une nouvelle news', '2014-05-14', 1),
(5, 'Cool top glauque', 'Toujours avec le sourire', 'Jamais sans mon R', '2014-05-28', 1),
(6, 'Nouveau compte rendu', '&lt;p&gt;&lt;strong&gt;Salut&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Nous allons parler ici d&amp;#39;une nouveaut&amp;eacute;, enfin de trois nouveaut&amp;eacute;s :&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Tout d&amp;#39;abord le final&lt;/li&gt;\r\n	&lt;li&gt;ensuite le pr&amp;eacute;quel&lt;/li&gt;\r\n	&lt;li&gt;en finalement le rodondidhron&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;blockquote&gt;\r\n&lt;p&gt;Comme la vie est courte&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n\r\n&lt;p&gt;Vous pouvez trouver ici le compte rendu de notre derni&amp;egrave;re r&amp;eacute;union. Enfin si je met le finder en plus. A voir avec les zigotos&lt;/p&gt;\r\n', 'Retrouvez le compte rendu du jour !', '2014-06-02', 1),
(7, '', '&lt;h2&gt;&lt;strong&gt;Entrez le contenu de la news&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;p&gt;C&amp;#39;est de la boulette&lt;/p&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;Whahhha une liste trop coule&lt;/li&gt;\n	&lt;li&gt;encore une &amp;eacute;l&amp;eacute;ment, &amp;ccedil;a pete&lt;/li&gt;\n	&lt;li&gt;Sa roxe le pat&amp;eacute; m&amp;ecirc;me&lt;/li&gt;\n	&lt;li&gt;$&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;et une phrase de conclusion&lt;/p&gt;\n', '', '2014-06-02', 1),
(8, 'titre', '&lt;h2&gt;Entrez le contenu de la news&lt;/h2&gt;\r\n\r\n&lt;p&gt;Whaha une liste&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;C&amp;#39;es tune liste&lt;/li&gt;\r\n	&lt;li&gt;c&amp;#39;est une liste&lt;/li&gt;\r\n	&lt;li&gt;c&amp;#39;est une liste&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Oh yeah&lt;/p&gt;\r\n', 'rÃ©sumÃ©', '2014-06-02', 1),
(9, 'une autre news, encore', '&lt;h2&gt;Entrez le contenu de la news&lt;/h2&gt;\r\n\r\n&lt;p&gt;Blablabola&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;psdhf&lt;/li&gt;\r\n	&lt;li&gt;sqpifbds&lt;/li&gt;\r\n	&lt;li&gt;cisdbfusd&lt;/li&gt;\r\n	&lt;li&gt;pdsifhbb&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;dsfophsdqufbofuze _ghvfsdo,j&lt;/p&gt;\r\n', 'j&#039;espÃ¨re que c&#039;est bon ', '2014-06-02', 1),
(10, 'blablabla', '<h2>Entrez le contenu de la news</h2>\n\n<p>Cette fois c&amp;#39;est la bonne</p>\n\n<ul>\n	<li>Enfoir&amp;eacute; d&amp;#39;encodage,</li>\n	<li>c&amp;#39;est relou l&amp;#39;encodage</li>\n	<li>l&amp;#39;encodage, c&amp;#39;est le mal!</li>\n</ul>\n\n<p>et oui, tout cela est mauvais pour la peau</p>', 'une super Ã©mission de radio d&#039;appres le romain del bosqÃ´t', '2014-06-02', 1),
(11, 'RÃ©flexion sur l&#039;enseignement sur le forum', '&lt;p&gt;Encore une news... Cela va faire la 100&amp;egrave;me au moins&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;oh yzah&lt;/li&gt;\r\n	&lt;li&gt;yaeheah&lt;/li&gt;\r\n	&lt;li&gt;miamiam&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'Vous pouvez participer Ã  cette rÃ©flexion en vous connectant au forum !', '2014-06-02', 1),
(12, 'Lancement du projet HOMME&#039;TECH', '&lt;p&gt;Enoiscvb&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;idoshf&lt;/li&gt;\r\n	&lt;li&gt;dfjbs&lt;/li&gt;\r\n	&lt;li&gt;fio gezb&lt;/li&gt;\r\n	&lt;li&gt;oiefh&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;qp fhpfoksdfkhxw4vkco$pvh&lt;/p&gt;\r\n', 'Nous lanÃ§ons aujourd&#039;hui officiellement le projet HOMME&#039;TECH', '2014-06-02', 1),
(13, 'PrÃ©sentation du site internet', '&lt;p&gt;Nous avons pr&amp;eacute;sent&amp;eacute; le site internet aux utilisateurs finaux.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nous avons pu recueillir leurs impressions et leurs commentaires.&lt;/p&gt;\r\n', 'PrÃ©sentation du site internet dÃ©veloppÃ© dans le cadre de l&#039;UV lo18 devant les acteurs et utilisateurs finaux.', '2014-06-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news_ressources`
--

CREATE TABLE IF NOT EXISTS `news_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` int(11) NOT NULL,
  `ressource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news` (`news`,`ressource`),
  KEY `ressource` (`ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `news_ressources`
--

INSERT INTO `news_ressources` (`id`, `news`, `ressource`) VALUES
(12, 13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `textPresentation` text COLLATE utf8_bin NOT NULL,
  `TextAccueil` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `presentation`
--

INSERT INTO `presentation` (`textPresentation`, `TextAccueil`) VALUES
('<p>Les Universit&eacute;s de Technologie, de Compi&egrave;gne, de Troyes, de Belfort-Montb&eacute;liard et l&rsquo;Institut LaSalle Beauvais, ont pris l&rsquo;initiative de se rassembler pour promouvoir la recherche et l&rsquo;enseignement des sciences humaines et sociales en environnement d&rsquo;ing&eacute;nierie. La situation d&rsquo;une recherche en sciences humaines et sociales dans ces contextes a un impact sur la structure, les m&eacute;thodes et contenus m&ecirc;mes de cette recherche. Le GIS UTSH vise &agrave; d&eacute;gager l&rsquo;originalit&eacute; d&rsquo;une telle approche du fait technique pour les SHS, recherche dont les enjeux sont consid&eacute;rables, tant pour la soci&eacute;t&eacute; contemporaine que pour l&rsquo;innovation ou l&rsquo;enseignement.</p>\n\n<p>Se donner le ph&eacute;nom&egrave;ne technologique comme objet de recherche premier ; penser la technique et l&rsquo;innovation ; participer directement &agrave; des projets de recherche et d&eacute;veloppement technologique ; &eacute;valuer les diverses formes de l&rsquo;exp&eacute;rience humaine et sociale associ&eacute;e aux diff&eacute;rents outils et milieux techniques ; tout cela pose le d&eacute;fi d&rsquo;une originalit&eacute; th&eacute;orique et m&eacute;thodologique pour le champ des sciences humaines et sociales. En montrant la complexit&eacute; des interactions entre usages, activit&eacute;s sociales et d&eacute;veloppements techniques, les disciplines des sciences humaines (histoire, philosophie, sciences &eacute;conomiques, sciences de gestion, s&eacute;miotique, sociologie, g&eacute;ographie humaine, anthropologie ou psychologie,&hellip;) n&rsquo;abandonnent en rien la rigueur de leurs questionnements intrins&egrave;ques, de leurs m&eacute;thodes et de leurs histoires propres. Au contraire, en posant les questions du fait technique et de l&rsquo;innovation au c&oelig;ur de leurs recherches, elles se mettent en position de renouveler les probl&eacute;matiques fondamentales de leur discipline. En m&ecirc;me temps, cela favorise la mise en place d&rsquo;un dialogue inter et transdisciplinaire f&eacute;cond, des sciences humaines entre-elles, mais aussi &eacute;tendu aux sciences de l&rsquo;ing&eacute;nieur. Dialogue qui est lui-m&ecirc;me &agrave; th&eacute;matiser. Au-del&agrave; des oppositions entre technophobie, technophilie ou technol&acirc;trie qui posent la technique comme en ext&eacute;riorit&eacute; par rapports aux choix sociaux, nous croyons possible et important d&rsquo;analyser les objets et milieux techniques dans leur diversit&eacute;s et dans la multiplicit&eacute;s des enjeux qu&rsquo;ils portent, constituant de possibles ou porteur d&rsquo;ali&eacute;nation.</p>\n\n<p>Dans ce contexte, les objectifs principaux de ce GIS UTSH sont :</p>\n\n<ul>\n	<li>de faire valoir l&rsquo;importance et la sp&eacute;cificit&eacute; de la recherche technologique en sciences humaines pour la formation, la conception, et la compr&eacute;hension des mutations en cours dans les soci&eacute;t&eacute;s contemporaines. Il s&rsquo;agit ainsi de promouvoir une science de la technique transdisciplinaire au sein des SHS :\n\n		<li>en relan&ccedil;ant le dialogue entre les SHS et les SPI pour penser les technologues de demain et pour d&eacute;velopper des projets de recherche autour de th&eacute;matiques les mobilisant conjointement. Par exemple: &laquo; R&eacute;volution num&eacute;rique et d&eacute;veloppement durable &raquo;, &laquo; Agro-technie, soci&eacute;t&eacute; et territoires &raquo; ; &laquo; Technologie de sant&eacute;, technologies du Care et liens sociaux &raquo; ; &laquo; Normes techniques, r&eacute;seaux et valeurs &eacute;conomiques &raquo; ; &laquo; Statut, activit&eacute;, positionnement de l&rsquo;ing&eacute;nieur, &agrave; la fois concepteur ; chercheur ; organisateur ; politique, et &eacute;thique &raquo;, &hellip;</li>\n		<li>en soutenant des formes d&rsquo;&eacute;valuation de la science qui valorisent l&rsquo;intervention, la diffusion des savoirs dans d&rsquo;autres milieux professionnels que ceux de la recherche, l&rsquo;engagement dans la conception d&rsquo;artefacts techniques ; ceci sans renoncer pour autant &agrave; l&rsquo;ambition d&rsquo;excellence scientifique acad&eacute;mique ;</li>\n		<li>en affirmant la n&eacute;cessit&eacute; d&rsquo;une posture &eacute;thique et normative portant sur les enjeux politiques et citoyens des choix technologiques dans les diverses activit&eacute;s d&rsquo;&eacute;ducation, de chercheurs et de concepteurs ;</li>\n	<li>de promouvoir dans les diverses formations d&rsquo;ing&eacute;nieurs et de techniciens le d&eacute;veloppement d&rsquo;une recherche non instrumentalis&eacute;e et transdisciplinaire, ainsi qu&rsquo;une formation &agrave; la recherche, dans les disciplines des sciences humaines, de la philosophie et de l&rsquo;histoire qui s&rsquo;int&eacute;ressent &agrave; la technique et &agrave; la conception.</li>\n	<li>de rassembler, autour du noyau initial d&#39;autres partenaires (&eacute;coles d&rsquo;ing&eacute;nieurs, centres de formation et recherche en technologie, organis&eacute;s ou non en r&eacute;seaux) qui partagent la situation d&rsquo;une recherche en sciences humaines et sociales dans le contexte de centres de recherche technologique. La recherche technologique en entreprises qui de fa&ccedil;on tr&egrave;s diverse fait directement intervenir les sciences humaines et sociales sera associ&eacute;e &agrave; cette d&eacute;marche.</li>\n	<li>de promouvoir les &eacute;tudes sur l&rsquo;origine, l&rsquo;histoire, l&rsquo;&eacute;pist&eacute;mologie et les m&eacute;thodes d&rsquo;une recherche en sciences humaines et sociales dans un contexte technique.</li>\n	<li>de pr&eacute;parer les structures n&eacute;cessaires &agrave; des partenariats approfondis.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>Il ne s&rsquo;agit pas tant de travailler sur les questions &eacute;thiques, &eacute;conomiques et politiques de l&rsquo;adoption sociale d&rsquo;innovations techniques r&eacute;alis&eacute;es ind&eacute;pendamment ; mais au contraire de cr&eacute;er les conditions pour que d&egrave;s la recherche fondamentale et d&egrave;s les processus d&rsquo;innovation eux-m&ecirc;mes, les SHS soient impliqu&eacute;es. Pour cela nous croyons n&eacute;cessaire de ne pas placer les SHS, en position d&rsquo;ext&eacute;riorit&eacute; ou de surplomb par rapport aux contraintes internes, concr&egrave;tes et externes de toute production technique. Il ne s&rsquo;agirait donc pas tant de r&eacute;aliser une application ou un transfert en technologie de savoirs SHS (une &laquo; valorisation &raquo; de la recherche en SHS) mais d&rsquo;abord de comprendre comment les technologies participent directement ou indirectement &agrave; la constitution des activit&eacute;s humaines et en particulier des savoirs en SHS. Ainsi, se d&eacute;voile l&rsquo;existence et la pertinence de probl&egrave;mes partag&eacute;s entre les SHS et les techniques de la vie, de la mati&egrave;re ou de l&rsquo;information.</p>\n\n<p>L&rsquo;ambition du GIS UTS est donc de contribuer &agrave; l&rsquo;&eacute;dification d&rsquo;une nouvelle approche de la question technique en SHS et par l&agrave; mettre en place de nouvelles m&eacute;thodes pour un travail v&eacute;ritablement collaboratif avec les autres sciences et savoir faire qui participent aux processus de d&eacute;veloppement et d&rsquo;innovation. A travers le soutien &agrave; divers projets concrets nous nous proposons de construire progressivement un programme de recherche g&eacute;n&eacute;ral en techno-logie, associant SHS et SPI, proposant une approche originale pour comprendre dans l&rsquo;histoire et le pr&eacute;sent ce que la technique fait de nous&hellip;et donc ce que c&rsquo;est que de faire de la technique.</p>\n', '<p>Le GIS UTSH se propose de promouvoir une recherche et un enseignement de sciences humaines et sociales en technologie.</p>\r\n\r\n<p>Les équipes de SHS qui le composent ont l’expérience d’une recherche menée dans l’environnement d’écoles d’ingénieurs.</p>\r\n\r\n<p>Il s’agit de développer une recherche sur la question technique qui soit partagée entre sciences de l’homme, sciences de la matière et sciences du vivant, sans instrumentalisation réciproque, sans position de surplomb ; mais au contraire dans un travail commun aussi bien dans les processus d’innovations que dans la réflexion sur les choix techniques.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) NOT NULL,
  `nomcomplet` varchar(50) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `texte` mediumtext NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `visibilite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `nomcomplet`, `datecreation`, `texte`, `url`, `etat`, `visibilite`) VALUES
(1, 'HOMTECH', 'Sciences de l’HOMme en univers TECHnologique', '2014-05-12 00:00:00', 'Redaction de la description en cours', 'http://urlvershommetech.com', 1, 1),
(2, 'Projet Séminaire et Colloque', 'La relation technique/vivant en agriculture', '2014-05-12 00:00:00', '', NULL, 1, 1),
(4, 'CoolTehc', 'Eminence scientifique cooltech', '2014-05-19 15:48:54', '', '				$this-&gt;news_class = new Project_editor($pro', 1, 0),
(5, 'CoolTehc', 'Eminence scientifique cooltech', '2014-05-19 15:51:03', '				$this-&gt;news_class = new Project_editor($projectTitle, $project_title_complet, $project_resume, $projectUrl, $projectVisibilite);\r\n				$this-&gt;news_class = new Project_editor($projectTitle, $project_title_complet, $project_resume, $projectUrl, $projectVisibilite);\r\n				$this-&gt;news_class = new Project_editor($projectTitle, $project_title_complet, $project_resume, $projectUrl, $projectVisibilite);\r\n', '', 1, 0),
(6, 'CoolTehc', 'Eminence scientifique cooltech2', '2014-05-19 15:51:54', 'OK  tkt sa va marcher', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `projets_ressources`
--

CREATE TABLE IF NOT EXISTS `projets_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projet` int(11) NOT NULL,
  `ressource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projet` (`projet`),
  KEY `ressource` (`ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `projets_ressources`
--

INSERT INTO `projets_ressources` (`id`, `projet`, `ressource`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `datecreation` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `ressource_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Gère les ressources' AUTO_INCREMENT=16 ;

--
-- Contenu de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `datecreation`, `type`, `etat`, `ressource_name`) VALUES
(1, 'Compte rendu GIS UTSH 19-03-12', '2014-05-04 16:05:57', 1, 1, '1-CR GIS UTSH-19_03_12.doc'),
(2, 'Compte rendu GIS UTSH 22-03-12', '2014-05-04 18:24:02', 1, 1, '2-CR-GIS UTSH-22_03_13.doc'),
(3, 'Compte rendu GIS UTSH 21-06-13', '2014-05-04 18:47:00', 1, 1, '3-CR-GIS UTSH-21_06_13.doc'),
(4, 'Compte rendu GIS UTSH 11-10-13', '2014-05-14 00:00:00', 1, 1, '4-CR-GIS UTSH-11_10_13.doc'),
(5, 'Compte rendu GIS UTSH 13-12-13', '2014-05-14 00:00:00', 1, 1, '5-CR-GIS UTSH-13_12_13.doc'),
(6, 'Compte rendu GIS UTSH 14-03-14', '2014-05-14 00:00:00', 1, 1, '6-CR-GIS UTSH-14_03_14.doc'),
(7, 'Compte rendu GIS UTSH 16-04-14', '2014-05-14 00:00:00', 1, 1, '7-CR-GIS UTSH-16_04_14.doc'),
(8, 'Budget prévisionnel 2014', '2013-10-28 00:00:00', 2, 1, 'GIS UTSH Budget Prévis 2014 le 28 octobre 2013.xls'),
(9, 'Convention signée', '2014-04-08 00:00:00', 2, 1, 'GIS UTSH Convention signée.pdf'),
(10, 'Recherche technologique en SHS', '2014-03-05 00:00:00', 2, 1, 'Pour une recherche technologique en SHS.doc'),
(11, 'Technique BB ', '2014-03-14 00:00:00', 2, 1, 'Technique BB GIS 20140314.ppt'),
(12, 'Technique et vivant en agriculture', '2014-02-05 00:00:00', 2, 1, 'Technique et vivant en agriculture.doc'),
(13, 'Fichier super trop bien', '2014-05-17 19:02:40', 1, 1, 'CR_19_03_Lancement.pdf'),
(14, 'yo bien ta vu', '2014-06-12 10:03:09', 3, 1, 'presentation.sql'),
(15, 'kikoulol', '2014-06-18 12:07:04', 2, 1, 'DatabaseUML.png');

-- --------------------------------------------------------

--
-- Structure de la table `siteprivilege`
--

CREATE TABLE IF NOT EXISTS `siteprivilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nompriviliege` varchar(25) NOT NULL,
  `priv_id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  KEY `priv_id` (`priv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `siteprivilege`
--

INSERT INTO `siteprivilege` (`id`, `nompriviliege`, `priv_id`, `fk_user`, `etat`) VALUES
(1, 'Administrateur', 1, 2, 1),
(2, 'Registered', 2, 58, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_ressources`
--

CREATE TABLE IF NOT EXISTS `type_ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ressource` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_ressources`
--

INSERT INTO `type_ressources` (`id`, `nom_ressource`) VALUES
(1, 'compte rendus'),
(2, 'Document officiel'),
(3, 'Dossier');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news_ressources`
--
ALTER TABLE `news_ressources`
  ADD CONSTRAINT `news_ressources_ibfk_1` FOREIGN KEY (`news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `news_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`);

--
-- Contraintes pour la table `projets_ressources`
--
ALTER TABLE `projets_ressources`
  ADD CONSTRAINT `projets_ressources_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `projets_ressources_ibfk_2` FOREIGN KEY (`ressource`) REFERENCES `ressources` (`id`);

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_ressources` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
