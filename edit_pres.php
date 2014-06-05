<?php include('header.php') ?>
	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			$pres = new Presentation_accueil();
			$pres->edit();
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
		}
