<!--sessions etc... -->
<?php 
	define('IN_PHPBB', true);
	$phpbb_root_path = './forum/'; // changer path par le nom du dossier de votre forum.
	$phpEx = substr(strrchr(__FILE__, '.'), 1);
	include($phpbb_root_path . 'common.' .$phpEx);
	$user->session_begin();
?>

<?php
	session_start();
	$_SESSION['return_page'] = $_SERVER['REQUEST_URI'];
?>

<?php include('include.php') ?>

<?php // Classe à utiliser pour les executions et affichages selon les droits sur le site
	$Privilege_manager = new Privilege($user->data['user_id']);
?>

<meta charset="utf-8">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>UTSH</title>
	<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="./style/footer.css" />
	<link rel="stylesheet" type="text/css" href="./style/body.css" />
	<link rel="stylesheet" type="text/css" href="./style/header.css" />
	<link rel="stylesheet" type="text/css" href="./style/zabuto_calendar.min.css" />
	<link rel="shortcut icon" href="./style/images/LogoMini.png">
	<script type="text/JavaScript" src="js/jquery.js"></script>
	<script type="text/JavaScript" src="js/bootstrap.min.js"></script>
	<script src="js/zabuto_calendar.min.js"></script>
</head>
<body>
	<header>
		<div class="degrade col-lg-12">
			<div class="logo" onclick="window.location.href='index.php';"></div>

			<?php
					if($user->data['is_registered'])
					{
						echo '<nav class="nav_deco">';
					}
					else
					{
						echo "<nav>";
					}
			?>
				<a href="index.php"><div class="menuElementFirst"><p>Accueil</p></div></a>
				<a href="news.php"><div><p>Actualités</p></div></a>
				<a href="presentation.php"><div><p>UTSH</p></div></a>
				<a href="./forum"><div><p>Forum</p></div></a>
				<a href="ressources.php"><div><p>Ressources</p></div></a>
				<a href="projets.php"><div><p>Projets</p></div></a>
			<?php
					if($user->data['is_registered'])
					{
						$javascript_to_add = "window.location.href='".$phpbb_root_path."ucp.php?mode=logout&redir=1&sid=".$user->session_id."'";
						echo '<a onclick="'.$javascript_to_add.'"><div class="deco"><p>Déconnexion</p></div></a>';
					}
			?>
			</nav>
		</div>

		<div class="image_en_tete col-lg-12"></div>
	</header>
</body>