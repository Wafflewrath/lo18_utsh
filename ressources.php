<?php include('header.php') ?>
<?php include('include/ressources/Ressources_display.php') ?>
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
			
			<div class="ressourcesfiltre">
				<p>Trier par : <select><option>date</option></select></p>
			</div>
			
			<div class="a_ressource"> 
				<div class="res_title">
					Compte rendu de réunion 17 mai
				</div>
				<div class="res_date">
					23/04/2014 14h15
				</div>
				<div class="ressource_type">
					compte rendu
				</div>
				<div class="ressource_link">
					<a href="#">lien</a>
				</div>
			</div>

			<?php 
				$res = new Ressources_display();
				$res->displayRessources();
			?>

			
			
		</div>
		
	</div>	

<?php include('footer.php') ?>