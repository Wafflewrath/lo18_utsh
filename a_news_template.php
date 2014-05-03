<?php include('header.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li><a href="news.php">Actualités</a></li>
		  <li class="active">Compte rendu de réunion</li>
		</ol>

		<div class="tuile_container col-lg-8">
			<?php 
				$news = new News_adapter();
				$news->displayNews();
			?>
		</div>
		
		<div class="col-lg-4 grptuile">
			<div class="tuile tuiletitle">Connexion</div>
			<div class="tuile">
				<div class="tuiletitle">--Vidéo--</div>
			</div>
			<div class="tuile">
				<div class="tuiletitle">Les équipes</div>
				<p>Team one</p>
				<p>Team two</p>
				<p>Team three</p>
				<p>Team four</p>
			</div>
			<div class="tuile tuiletitle">La charte du GIS</div>
			<div class="tuile tuiletitle">L'organigramme</div>
			<div class="tuile tuiletitle">Conseil scientifique</div>
			
		</div>
		
	</div>	

<?php include('footer.php') ?>