<?php include('header.php') ?>
<?php include('include/Project_adapter.class.php') ?>
<div class="content row">

<?php 
	$res = new Project_adapter();
	if (get_class($res->project_class) == "Projects_template")
	{
?>
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li><a href="projets.php">Projets</a></li>
		  <li class="active"><?php $res->getProjectName(); ?></li>
		 </ol>
		 
<?php
	}
	else {
		?>

		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">Projets</li>
		</ol>
			
	<?php }
	if ($Privilege_manager->execif_Admin("") == true)
	{
		echo '<a href="projet_ajout.php">Créer un nouveau projet</a>';
	}
	$res->displayProjets();
?>
		
</div>	

<?php include('footer.php'); ?>