<?php include('header.php') ?>
<?php include('include/contacts/Contact_editor.class.php') ?>
 <script src="ckeditor/ckeditor.js"></script>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			if (isset($_GET['universite']) && !isset($_POST['email']) && !isset($_POST['nom'])) {
				$form = new Contact_editor($_GET['universite']);
				$form->displayForm();
			}
			else if (isset($_POST['email']) && isset($_POST['nom']) && isset($_GET['universite']))
			{
				$form = new Contact_editor($_GET['universite']);
				echo '<script type="text/javascript">window.location.href="./index.php?contactEdit=1"</script>';
				//redirect($_SERVER['REQUEST_URI']."/../index.php?contactEdit=1");
				die();
			}
			else
			{
				redirect($_SERVER['REQUEST_URI']."/../index.php");
			}
		}
		else {
			redirect($_SERVER['REQUEST_URI']."/../index.php");
		}

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
