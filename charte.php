<?php include('header.php') ?>
<?php include('include/presentation/Presentation_display_charte.class.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li><a href="presentation.php">Présentation</a></li>
		  <li class="active">La charte du GIS</li>
		</ol>

		<div class="tuile_container col-lg-8">
			<div class="lineHeader">
				<h2>La Charte du GIS</h2>
			</div>
			<br />
			<p><?php
				 $p=new Presentation_display_charte();
				?></p>
			<div class="edit_charte">
				<?php $Privilege_manager->execif_Admin("echo '</br><a href=\"edit_charte.php\" class=\"createnews_link\">Editer</a>';")?>
			</div>
		</div>
		
		<?php include('left_colomn_presentation.php'); ?>
		
	</div>	

<?php include('footer.php') ?>