<?php include('header.php') ?>
<?php include('include/reu/Reu_adapter.class.php') ?>
 <script src="ckeditor/ckeditor.js"></script>

<body>
	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			
			if (isset($_POST['reu_title']) && !isset($_POST['reuedit_id']))
			{
				$news = new Reu_adapter();
				redirect($_SERVER['REQUEST_URI']."/../index.php?reucreate=1");
				die();
			}
			elseif (isset($_POST['reuedit_id']))
			{
				$news = new Reu_adapter();
				redirect($_SERVER['REQUEST_URI']."/../index.php?reuedit=1");
				die();
			}
			elseif (isset($_GET['reuedit']))
			{
				$news = new Reu_adapter();
			}
			elseif (isset($_GET['reudelete']))
			{
				$news = new Reu_adapter();
				header('Location: index.php?ck=0.1'); //cache killer pour obfuscation du sid
				die();
			}
			else
			{
	
	?>

				<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Créer un évenement</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_reu.php" method="post">
								<div class="news_title form">
									<input type="text" placeholder="Entrez votre Titre" name="reu_title">
								</div>
								<div class="news_resume form">
									<input type="text" placeholder="Entrez un lieu" name="reu_lieu">
								</div>
								<div class="news_resume form">
									<textarea id="reu_content" name="reu_content" rows="13" cols="150" placeholder="Contenu de l'évenement"></textarea>
								</div>
								<div class="news_resume form">
									<input type="date" placeholder="Entrez la date" name="reu_date">
								</div>
								<input type="submit" value="Créer la réunion">
							</form>
						</div>
						<br/>
				</div>
				<script type="text/javascript">CKEDITOR.replace( 'reu_content' );</script>
				
	<?php
			}
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php");
		}
	?>

<?php
	if(!$user->data['is_bot']) 
	{ // Si l’utilisateur n’est pas un bot (Google, Yahoo, …)
		if(!$user->data['is_registered'])
		{ // Si l’utilisateur n’est pas encore logué
		}
		else
		{ // Autrement, si l’utilisateur est logué
			// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
			
		}
	}
?>

</body>
<?php include('footer.php') ?>
