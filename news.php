<?php include('header.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">actualités</li>
		</ol>

		<div class="tuile_container col-lg-12">
			<div class="lineHeader">
				<h2>Actualités</h2>
				<?php 
					$Privilege_manager->execif_Admin("echo '<a href=\"edit_form.php\" class=\"createnews_link\">Créer une news</a>';");
				?>
			</div>
			<br />
			<?php 
				$news = new News_adapter();
				$news->displayNews();
			?>			
		</div>
		
	</div>	

<?php include('footer.php') ?>