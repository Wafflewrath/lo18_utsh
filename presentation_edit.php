<?php include('header.php') ?>
<?php include('include/presentation/Presentation_editor.class.php') ?>
 <script src="ckeditor/ckeditor.js"></script>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			$pres = new Presentation_editor();	
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php");
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
