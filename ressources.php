<?php include('header.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>
<?php include('include/ressources/Ressource_type_display.class.php') ?>
<?php include('include/ressources/Ressource_delete.class.php') ?>

<?php
	// si l'utilisateur est connecté, on affiche la page, sinon on le redirige
	if ($Privilege_manager->execif_Registered("") == false)
	{
		redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
	}

if (isset($_GET['del']))
{
	echo '<div class="alert alert-success">La ressource a bien été supprimée.</div>';
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
			if (! isset($_GET['page'])) {
				$page = 1;
			}
			else {
				$page = intval($_GET['page']);
			}
			if ($_POST['filtre'] != null) {
				$res = new Ressources_display(htmlspecialchars($_POST['filtre']), $page);
				$res->displayRessources();
			}
			else {
				$res = new Ressources_display("datecreation", $page);
				$res->displayRessources();
			}
			
			?>

			
			
		</div>
		
	</div>	
	
	<script>
		function confirm_del(id)
		{
			$('#res_del_'+id).text('').append('<a class="del_alert" href="././res_delete.php?id='+id+'">Souhaitez vous vraiment supprimer ce contenu ?</a>');
			return false;
		}
	</script>

<?php include('footer.php') ?>