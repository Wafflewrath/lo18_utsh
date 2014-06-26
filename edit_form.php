<?php include('header.php') ?>
<?php include('include/ressources/Ressources_display.class.php') ?>
 <script src="ckeditor/ckeditor.js"></script>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{
			
			if (isset($_POST['news_title']) && !isset($_POST['newsedit_id']))
			{
				$news = new News_adapter();
				redirect($_SERVER['REQUEST_URI']."/../index.php?newscreate=1");
				die();
			}
			elseif (isset($_POST['newsedit_id']))
			{
				$news = new News_adapter();
				redirect($_SERVER['REQUEST_URI']."/../index.php?newsedit=1");
				die();
			}
			elseif (isset($_GET['newsedit']))
			{
				$news = new News_adapter();
			}
			elseif (isset($_GET['newsdelete']) && !isset($_GET['confirm']))
			{
				?>
				<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Confirmer la suppression de la news ?</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_form.php" method="get" style="margin-bottom:15px;">
							<input type="hidden" name="newsdelete" value="<?php echo $_GET['newsdelete']; ?>">
							<input type="hidden" name="confirm" value="true">
							<input type="submit" value="Supprimer la News" style="margin-left:45%">
							</form>
						</div>
						<br/>
				</div>
				<?php
			}
			elseif (isset($_GET['newsdelete']) && isset($_GET['confirm']))
			{
				$news = new News_adapter();
				header('Location: index.php?ck=0.1'); //cache killer pour obfuscation du sid
				die();
			}
			else
			{
	
	?>

				<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Ecrire une News</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_form.php" method="post">
								<div class="news_title form">
									<input class="news_form" type="text" placeholder="Entrez votre Titre" name="news_title">
								</div>
								<div class="news_resume form">
									<textarea class="news_form" id="news_resume" name="news_resume" rows="6" cols="150" placeholder="Résumé de la news (affiché sur la page d\'accueil)"></textarea>
								</div>
								<div class="news_resume form">
									<textarea class="news_form" id="news_content" name="news_content" rows="13" cols="150">Entrez le contenu de la news</textarea>
								</div>
								<div id="divID">
								<select name="ressource_link" style="width:250px">
									<?php 
										$res = new Ressources_display("datecreation");
										echo '<option value="0">Ne pas lier de ressource</option>';
										for($i = 0; $i < $res->nombre_ressources_affiche; $i++)
										{
											echo '<option value="' . $res->id[$i] . '">' . $res->title[$i] . '</option>';
										}
									?>
								</select>
								</div>
								<div id="add_ressource">Ajouter une autre ressource</div>
								<input class="input_form" type="submit" value="Créer la News">
								<script type="text/javascript">
									$("#add_ressource").attr('onclick','add_ress();');
									var compteur = 1;
									function add_ress()
									{
										var div = $('#divID');
										div.append('<br/><br/><select name="ressource_link'+compteur+'" style="width:250px">' + '<?php 
																				$res = new Ressources_display("datecreation");
																				echo '<option value="0">Ne pas lier de ressource</option>';
																				for($i = 0; $i < $res->nombre_ressources_affiche; $i++)
																				{
																					echo '<option value="' . $res->id[$i] . '">' . $res->title[$i] . '</option>';
																				}
																			?> '
																		+ '</select>');
										compteur++;
									}
								</script>
							</form>
						</div>
						<br/>
				</div>
				<script type="text/javascript">CKEDITOR.replace( 'news_content' );</script>
				
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
