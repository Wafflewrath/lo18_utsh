<?php include('header.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>
<?php include('include/ressources/Ressource_type_display.class.php') ?>

<?php
	// si l'utilisateur est connecté, on affiche la page, sinon on le redirige
	if ($Privilege_manager->execif_Registered("") == false)
	{
		redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
	}
?>

	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">Ressources</li>
		</ol>

		<div class="tuile_container col-lg-12">
			<div class="lineHeader">
				<h2>Ressources</h2>
			</div>
			
			<div class="aide"> 
				<p>Vous trouverez ici l'ensemble des ressources liés au GIS, vous pouvez les trier ou les filtrer.</p>
			</div>
			<div class="col-lg-12">
				<a class="ajout_ressource" href="upload_ressource.php">Ajouter une ressource</a>
			</div>
			<div class="ressourcesfiltre col-lg-3">
				<p>Trier par : 
					<form action="ressources.php" method="post">
						<select name="filtre">
							<option value="datecreation">date</option>
							<option value="type">type</option>
							<option value="titre">alphabetique</option>
						</select> 
						<input type="submit" value="Trier">
					</form>
				</p>
			</div>

			<div class="ressourcesfiltre col-lg-3">
				<p>filtrer par : 
					<form action="ressources.php" method="post">
						<select name="filtre">
							<?php 
								$res = new Ressources_type_display();
								$res->displayRessourcesTypesInList();
							?>
						</select> 
						<input type="submit" value="Filtrer">
					</form>
				</p>
			</div>
			
			<?php 
				if($_POST['filtre'] != null) {
					echo '<div class="infofiltre col-lg-12">Vous filtrez actuellement selon : ' . htmlspecialchars($_POST['filtre']) . '</div>';
				}
			?>

			<?php 
			if ($_POST['filtre'] != null) {
				$res = new Ressources_display(htmlspecialchars($_POST['filtre']));
				$res->displayRessources();
			}
			else {
				$res = new Ressources_display("datecreation");
				$res->displayRessources();
			}
			
			?>

			
			
		</div>
		
	</div>	

<?php include('footer.php') ?>