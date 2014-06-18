<?php include('header.php') ?>
<?php include('include/ressources/Ressource_type_display.class.php') ?>
<?php include('include/ressources/Ressource_adder.class.php') ?>

<body>

	<?php
	// Doit être un user connecté.
	if (isset($_POST['ressource_title']) && isset($_POST['ressource_type']))
			{
				echo "lolilol";
				$news = new Ressource_adder();
				redirect($_SERVER['REQUEST_URI']."/../index.php?ressourceUpload=1");
				die();
			}

	?>

		<div class="tuile_container col-lg-12">
				<div class="lineHeader">
					<h2>Ajouter une ressource</h2>
				</div>
				<br />
				<div class="news_actualite"> 
					<form action="upload_ressource.php" method="post" enctype="multipart/form-data">
						<div class="news_title form">
							<input type="text" placeholder="Entrez votre Titre" name="ressource_title">
						</div>
						<div class="news_resume form">
							<label for="ressource_type">Type de ressource : </label>
								<select name="ressource_type">
									<?php 
										$res = new Ressources_type_display();
										$res->displayRessourcesTypesInList();
									?>
								</select>
						</div>
						<div class="ressource_file form">
							<label for="news_content">upload fichier : </label><input type="file" name="ressource_file" />
						</div>
						<input type="submit" value="Envoyer la ressource">
					</form>
				</div>
				<br/>
		</div>


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
