-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 04 Juin 2014 à 14:35
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
-- Structure de la table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `textPresentation` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `presentation`
--

INSERT INTO `presentation` (`textPresentation`) VALUES
('<p>Les Universit&eacute;s de Technologie, de Compi&egrave;gne, de Troyes, de Belfort-Montb&eacute;liard et l&rsquo;Institut LaSalle Beauvais, ont pris l&rsquo;initiative de se rassembler pour promouvoir la recherche et l&rsquo;enseignement des sciences humaines et sociales en environnement d&rsquo;ing&eacute;nierie. La situation d&rsquo;une recherche en sciences humaines et sociales dans ces contextes a un impact sur la structure, les m&eacute;thodes et contenus m&ecirc;mes de cette recherche. Le GIS UTSH vise &agrave; d&eacute;gager l&rsquo;originalit&eacute; d&rsquo;une telle approche du fait technique pour les SHS, recherche dont les enjeux sont consid&eacute;rables, tant pour la soci&eacute;t&eacute; contemporaine que pour l&rsquo;innovation ou l&rsquo;enseignement.</p>\n\n<p>Se donner le ph&eacute;nom&egrave;ne technologique comme objet de recherche premier ; penser la technique et l&rsquo;innovation ; participer directement &agrave; des projets de recherche et d&eacute;veloppement technologique ; &eacute;valuer les diverses formes de l&rsquo;exp&eacute;rience humaine et sociale associ&eacute;e aux diff&eacute;rents outils et milieux techniques ; tout cela pose le d&eacute;fi d&rsquo;une originalit&eacute; th&eacute;orique et m&eacute;thodologique pour le champ des sciences humaines et sociales. En montrant la complexit&eacute; des interactions entre usages, activit&eacute;s sociales et d&eacute;veloppements techniques, les disciplines des sciences humaines (histoire, philosophie, sciences &eacute;conomiques, sciences de gestion, s&eacute;miotique, sociologie, g&eacute;ographie humaine, anthropologie ou psychologie,&hellip;) n&rsquo;abandonnent en rien la rigueur de leurs questionnements intrins&egrave;ques, de leurs m&eacute;thodes et de leurs histoires propres. Au contraire, en posant les questions du fait technique et de l&rsquo;innovation au c&oelig;ur de leurs recherches, elles se mettent en position de renouveler les probl&eacute;matiques fondamentales de leur discipline. En m&ecirc;me temps, cela favorise la mise en place d&rsquo;un dialogue inter et transdisciplinaire f&eacute;cond, des sciences humaines entre-elles, mais aussi &eacute;tendu aux sciences de l&rsquo;ing&eacute;nieur. Dialogue qui est lui-m&ecirc;me &agrave; th&eacute;matiser. Au-del&agrave; des oppositions entre technophobie, technophilie ou technol&acirc;trie qui posent la technique comme en ext&eacute;riorit&eacute; par rapports aux choix sociaux, nous croyons possible et important d&rsquo;analyser les objets et milieux techniques dans leur diversit&eacute;s et dans la multiplicit&eacute;s des enjeux qu&rsquo;ils portent, constituant de possibles ou porteur d&rsquo;ali&eacute;nation.</p>\n\n<p>Dans ce contexte, les objectifs principaux de ce GIS UTSH sont :</p>\n\n<ul>\n	<li>de faire valoir l&rsquo;importance et la sp&eacute;cificit&eacute; de la recherche technologique en sciences humaines pour la formation, la conception, et la compr&eacute;hension des mutations en cours dans les soci&eacute;t&eacute;s contemporaines. Il s&rsquo;agit ainsi de promouvoir une science de la technique transdisciplinaire au sein des SHS :\n\n		<li>en relan&ccedil;ant le dialogue entre les SHS et les SPI pour penser les technologues de demain et pour d&eacute;velopper des projets de recherche autour de th&eacute;matiques les mobilisant conjointement. Par exemple: &laquo; R&eacute;volution num&eacute;rique et d&eacute;veloppement durable &raquo;, &laquo; Agro-technie, soci&eacute;t&eacute; et territoires &raquo; ; &laquo; Technologie de sant&eacute;, technologies du Care et liens sociaux &raquo; ; &laquo; Normes techniques, r&eacute;seaux et valeurs &eacute;conomiques &raquo; ; &laquo; Statut, activit&eacute;, positionnement de l&rsquo;ing&eacute;nieur, &agrave; la fois concepteur ; chercheur ; organisateur ; politique, et &eacute;thique &raquo;, &hellip;</li>\n		<li>en soutenant des formes d&rsquo;&eacute;valuation de la science qui valorisent l&rsquo;intervention, la diffusion des savoirs dans d&rsquo;autres milieux professionnels que ceux de la recherche, l&rsquo;engagement dans la conception d&rsquo;artefacts techniques ; ceci sans renoncer pour autant &agrave; l&rsquo;ambition d&rsquo;excellence scientifique acad&eacute;mique ;</li>\n		<li>en affirmant la n&eacute;cessit&eacute; d&rsquo;une posture &eacute;thique et normative portant sur les enjeux politiques et citoyens des choix technologiques dans les diverses activit&eacute;s d&rsquo;&eacute;ducation, de chercheurs et de concepteurs ;</li>\n	<li>de promouvoir dans les diverses formations d&rsquo;ing&eacute;nieurs et de techniciens le d&eacute;veloppement d&rsquo;une recherche non instrumentalis&eacute;e et transdisciplinaire, ainsi qu&rsquo;une formation &agrave; la recherche, dans les disciplines des sciences humaines, de la philosophie et de l&rsquo;histoire qui s&rsquo;int&eacute;ressent &agrave; la technique et &agrave; la conception.</li>\n	<li>de rassembler, autour du noyau initial d&#39;autres partenaires (&eacute;coles d&rsquo;ing&eacute;nieurs, centres de formation et recherche en technologie, organis&eacute;s ou non en r&eacute;seaux) qui partagent la situation d&rsquo;une recherche en sciences humaines et sociales dans le contexte de centres de recherche technologique. La recherche technologique en entreprises qui de fa&ccedil;on tr&egrave;s diverse fait directement intervenir les sciences humaines et sociales sera associ&eacute;e &agrave; cette d&eacute;marche.</li>\n	<li>de promouvoir les &eacute;tudes sur l&rsquo;origine, l&rsquo;histoire, l&rsquo;&eacute;pist&eacute;mologie et les m&eacute;thodes d&rsquo;une recherche en sciences humaines et sociales dans un contexte technique.</li>\n	<li>de pr&eacute;parer les structures n&eacute;cessaires &agrave; des partenariats approfondis.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>Il ne s&rsquo;agit pas tant de travailler sur les questions &eacute;thiques, &eacute;conomiques et politiques de l&rsquo;adoption sociale d&rsquo;innovations techniques r&eacute;alis&eacute;es ind&eacute;pendamment ; mais au contraire de cr&eacute;er les conditions pour que d&egrave;s la recherche fondamentale et d&egrave;s les processus d&rsquo;innovation eux-m&ecirc;mes, les SHS soient impliqu&eacute;es. Pour cela nous croyons n&eacute;cessaire de ne pas placer les SHS, en position d&rsquo;ext&eacute;riorit&eacute; ou de surplomb par rapport aux contraintes internes, concr&egrave;tes et externes de toute production technique. Il ne s&rsquo;agirait donc pas tant de r&eacute;aliser une application ou un transfert en technologie de savoirs SHS (une &laquo; valorisation &raquo; de la recherche en SHS) mais d&rsquo;abord de comprendre comment les technologies participent directement ou indirectement &agrave; la constitution des activit&eacute;s humaines et en particulier des savoirs en SHS. Ainsi, se d&eacute;voile l&rsquo;existence et la pertinence de probl&egrave;mes partag&eacute;s entre les SHS et les techniques de la vie, de la mati&egrave;re ou de l&rsquo;information.</p>\n\n<p>L&rsquo;ambition du GIS UTS est donc de contribuer &agrave; l&rsquo;&eacute;dification d&rsquo;une nouvelle approche de la question technique en SHS et par l&agrave; mettre en place de nouvelles m&eacute;thodes pour un travail v&eacute;ritablement collaboratif avec les autres sciences et savoir faire qui participent aux processus de d&eacute;veloppement et d&rsquo;innovation. A travers le soutien &agrave; divers projets concrets nous nous proposons de construire progressivement un programme de recherche g&eacute;n&eacute;ral en techno-logie, associant SHS et SPI, proposant une approche originale pour comprendre dans l&rsquo;histoire et le pr&eacute;sent ce que la technique fait de nous&hellip;et donc ce que c&rsquo;est que de faire de la technique.</p>\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
