<?php include('header.php') ?>
<?php include('include/Project_adapter.class.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>

<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			if (isset($_GET['id1']) && isset($_GET['id2']))
			{
				$DB_temp = new Database;
				$query = "DELETE FROM projets_ressources 
							WHERE projet = ".intval($_GET['id2'])."
							AND ressource = ".intval($_GET['id1']).";";
				$DB_temp->delete($query);
			}
			// header('Location: projets.php?ck=0.1');
			die('<meta http-equiv="refresh" content="0;URL=index.php">');
		}
		else
		{
			// header('Location: projets.php?ck=0.1');
			die('<meta http-equiv="refresh" content="0;URL=index.php">');
		}
	?>

<?php
	if(!$user->data['is_bot']) 
	{ // Si l’utilisateur n’est pas un bot (Google, Yahoo, …)
		if(!$user->data['is_registered'])
		{ // Si l’utilisateur n’est pas encore logué
		}
		else
		{ // Autrement, si l’utilisateur est logué
			// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
			
		}
	}
?>

</body>
<?php include('footer.php') ?>
