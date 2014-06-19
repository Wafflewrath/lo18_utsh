<?php include('header.php') ?>
<?php include('include/presentation/Presentation_display.class.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">Présentation</li>
		</ol>

		<div class="tuile_container col-lg-8">
			<div class="lineHeader">
				<h2>Présentation</h2>
			</div>
			<?php if($Privilege_manager->execif_Admin("") == true) {
				echo '<div>';
				echo '<a href="presentation_edit.php" class="createnews_link">Éditer la présentation</a>';
				echo '</div>';
			}
			?>
			<div class="presentation">
				<?php 
					$pres = new Presentation_display();
				?>
			</div>
			<div class="image_presentation"></div>
		</div>
		
		<?php include('left_colomn_presentation.php'); ?>
		
	</div>	

<?php include('footer.php') ?>