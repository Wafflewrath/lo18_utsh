<?php include('header.php') ?>
	<script src="ckeditor/ckeditor.js"></script>
	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			$pres = new Presentation_charte();
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
		}