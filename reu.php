<?php include('header.php') ?>
<?php include('/include/reu/Reu_display.class.php') ?>
<?php 
	if ($Privilege_manager->execif_Admin("") == false) {
			redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
	}
	?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">Réunion</li>
		</ol>

		<div class="tuile_container col-lg-12">
			<div class="lineHeader">
				<h2>Réunions</h2>
				<?php 
					$Privilege_manager->execif_Admin("echo '<a href=\"edit_reu.php\" class=\"createnews_link\">Créer une réunion</a>';");
				?>
			</div>
			<br />
			<?php 
				$value = 1;
				if (isset($_GET['reuPage'])) {
					$value =  intval($_GET['reuPage']);
				}

				$reu = new Reu_display(6, $value);
				$reu->displayReu();
			?>			
		</div>
		
	</div>	

<?php include('footer.php') ?>