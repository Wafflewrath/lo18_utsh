<?php include('header.php') ?>
<?php include('include/Project_adapter.class.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>

<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			
			if (isset($_POST['project_title']) && !isset($_POST['projectedit_id']))
			{
				$news = new Project_adapter();
				redirect($_SERVER['REQUEST_URI']."/../projets.php?projetcreate=1");
				die();
			}
			elseif (isset($_POST['projectedit_id']))
			{
				$news = new Project_adapter();
				redirect($_SERVER['REQUEST_URI']."/../projets.php?projetedit=1");
				die();
			}
			elseif (isset($_GET['projectedit']))
			{
				$news = new Project_adapter();
			}
			elseif (isset($_GET['projectdeleteid']))
			{
				$news = new Project_adapter();
				header('Location: projets.php?ck=0.1'); //cache killer pour obfuscation du sid
				die();
			}
			else
			{
	
	?>

				<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Créer un nouveau projet</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="projet_ajout.php" method="post">
								<div class="news_title form">
									<input type="text" placeholder="Entrez le sigle du projet" name="project_title">
								</div>
								<div class="news_title form">
									<input type="text" placeholder="Entrez le titre complet du projet" name="project_title_complet">
								</div>
								<div class="news_resume form">
									<textarea name="project_resume" rows="6" cols="150" placeholder="Résumé du projet"></textarea>
								</div>
								<div class="news_resume form">
									<input type="text" placeholder="Lien vers le site" name="project_link" style="min-width:300px">
								</div>

								<div class="news_title form">
									<select name="projet_visibilite">
										<option value="1">Publique</option>
										<option value="2">Private</option>
									</select>
								</div>
								
								<div>
								<select name="ressource_link" style="width:250px">
									<?php 
										$res = new Ressources_display("datecreation");
										echo '<option value="0">Ne pas lier de ressource</option>';
										for($i = 0; $i < $res->nombre_ressources_affiche; $i++)
										{
											echo '<option value="' . $res->nom[$i] . '">' . $res->title[$i] . '</option>';
										}
									?>
								</select>
								</div>
								<br/><input type="submit" value="Créer le projet">
								
								<script type="text/javascript">
									document.getElementById("add_ressource").onclick(function() {
										var div = document.getElementById('divID');

										div.innerHTML = div.innerHTML + '<p>Extra stuff</p>';
									})
								</script>
								
							</form>
						</div>
						<br/>
				</div>
				
	<?php
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
