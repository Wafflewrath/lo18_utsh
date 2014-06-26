<?php include('header.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>

<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			if (isset($_GET['id1']) && isset($_GET['id2']))
			{
				$DB_temp = new Database;
				$query = "DELETE FROM news_ressources 
							WHERE news = ".intval($_GET['id2'])."
							AND ressource = ".intval($_GET['id1']).";";
				$DB_temp->delete($query);
			}
			// header('Location: news.php?ck=0.1');
			die('<meta http-equiv="refresh" content="0;URL=index.php">');
		}
		else
		{
			// header('Location: news.php?ck=0.1');
			die('<meta http-equiv="refresh" content="0;URL=index.php">');
		}
	?>
	
</body>
<?php include('footer.php') ?>
