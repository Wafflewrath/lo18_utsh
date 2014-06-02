<?php include('header.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li><a href="news.php">Actualités</a></li>
		  <li class="active">Compte rendu de réunion</li>
		</ol>

		<div class="tuile_container col-lg-12">
			<?php 
				$news = new News_adapter();
				$news->displayNews();
			?>
		</div>
		
	</div>	

<?php include('footer.php') ?>