<?php include('header.php') ?>

<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			
			if (isset($_POST['news_title']))
			{
				$news = new News_adapter();
				redirect($_SERVER['REQUEST_URI']."/../index.php");
			}
			else
			{
	
			echo '
			<div class="tuile_container col-lg-8">
					<div class="lineHeader">
						<h2>Ecrire une News</h2>
					</div>
					<br />
					<div class="news_actualite"> 
						<form action="edit_form.php" method="post">
							<div class="news_title form">
								<input type="text" placeholder="Entrez votre Titre" name="news_title">
							</div>
							<div class="news_resume form">
								<textarea name="news_resume" rows="6" cols="150" placeholder="Résumé de la news (affiché sur la page d\'accueil)"></textarea>
							</div>
							<div class="news_resume form">
								<textarea name="news_content" rows="13" cols="150" placeholder="Contenu de la news"></textarea>
							</div>
							<input type="submit" value="Créer la News">
						</form>
					</div>
					<br/>
			</div>
			';
	
	
			}
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
