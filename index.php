<?php include('header.php') ?>
<?php
if (isset($_GET['newscreate']))
{
	echo '<div class="alert alert-success">Votre news à bien été publiée</div>';
}
else if (isset($_GET['newsedit']))
{
	echo '<div class="alert alert-success">Votre news à bien été éditée</div>';
}
else if (isset($_GET['forbidden']))
{
	echo '<div class="alert alert-danger">Vous devez être connecté pour accèder à cette rubrique</div>';
}
else if (isset($_GET['projetcreate']))
{
	echo '<div class="alert alert-success">Votre projet à bien été publiée</div>';
}
else if (isset($_GET['reucreate']))
{
	echo '<div class="alert alert-success">Votre évenement à bien été publiée</div>';
}
else if (isset($_GET['projetedit']))
{
	echo '<div class="alert alert-success">Votre projet à bien été éditée</div>';
}
else if (isset($_GET['error404']))
{
	echo '<div class="alert alert-danger">La page que vous recherchez n\'existe pas.</div>';
}
else if (isset($_GET['error403']))
{
	echo '<div class="alert alert-danger">L\'accès à cette page est interdit.</div>';
}
else if (isset($_GET['error418']))
{
	echo '<div class="alert alert-danger">Le serveur est une théière.</div>';
}
else if (isset($_GET['presentation_edit']))
{
	echo '<div class="alert alert-success">La présentation a bien été mise à jour</div>';
}
else if (isset($_GET['contactEdit']))
{
	echo '<div class="alert alert-success">Le contact a bien été mis à jour</div>';
}
else if (isset($_GET['ressourceUpload']))
{
	echo '<div class="alert alert-success">Votre ressource à bien été envoyée au serveur</div>';
}
else if (isset($_GET['reuedit']))
{
	echo '<div class="alert alert-success">Votre réunion à bien été modifié</div>';
}
?>

	<div class="content row">
	
		<div class="col-lg-3 grptuile">
			<div class="tuile" onclick="window.location.href='presentation.php';">
				<div class="tuiletitle">Qui sommes-nous?</div>
				<div class="text_pres">
					<?php 
						$pres= new Presentation_accueil();
						if($user->data['is_registered'])
						{
							$pres->displayRegistered();
						}
						else
						{
							$pres->display();
						}
						$Privilege_manager->execif_Admin("echo '</br><a href=\"edit_pres.php\" class=\"createnews_link\">Editer</a>';");
					?>
				</div>
			</div>
			<?php if($user->data['is_registered']) include('calendar.php'); ?>
		</div>
		
		<div class="col-lg-5 grptuile">
			<div class="tuilecontainer">
				<div id="newstitle" onclick="window.location.href='./news.php'">News</div>
				<?php 
					$news = new News_adapter();
					$news->displayNews();
					
					$Privilege_manager->execif_Admin("echo '<a href=\"edit_form.php\" class=\"createnews_link\">Créer une news</a>';");
				?>
			</div>
		</div>
		<div class="col-lg-4 grptuile">
				<?php
					if($user->data['is_registered'])
					{
						// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
						//$nb_new_msg =$db->sql_query("SELECT COUNT(msg_id) AS nb FROM phpbb_privmsgs_to WHERE user_id='".$user->data['user_id']."' AND pm_new=1 LIMIT 1");
						//$nb_new_msg =$db->sql_fetchrow($nb_new_msg);
						$javascript_to_add = "window.location.href='".$phpbb_root_path."ucp.php?mode=logout&redir=1&sid=".$user->session_id."'";
						echo '<div class="tuile tuiletitle alone" onclick="'.$javascript_to_add.'">';
						echo 'Déconnexion';
						echo '</div>';
					}
					else
					{
						$javascript_to_add = "window.location.href='./login_register.php'";
						echo '<div class="tuile tuiletitle alone" onclick="'.$javascript_to_add.'">';
						echo 'Connexion / Demande d\'adhésion';
						echo '</div>';
					}
				?>
			<div id="forumstuile" class=<?php echo '"tuilecontainer'; if(!$user->data['is_registered']){ echo ' desactivate"'; } else {echo '"';} ?> >
				<div <?php echo'class="tuiletitle forumtitle'; if($user->data['is_registered']){ echo  ' " onclick="window.location.href='."'./forum'".';"';} else { echo ' alone desactivate"'; } ?>>Forum</div>
				<?php
					if($user->data['is_registered'])
					{
						$forum = new Forum_articles(4);
						$forum->displayAll();
					}
				?>
			</div>
			<div class=<?php echo '"tuile tuiletitle alone'; if(! $user->data['is_registered']){ echo ' desactivate"'; } else { echo '" onclick="window.location.href=\'ressources.php\';"';} ?>>Liens / Ressources</div>
			
			<?php 
				if ($Privilege_manager->execif_Admin(""))
				{
					echo '<div class="tuile tuiletitle alone" onclick="window.location.href=\'priv_admin_form.php\';">Administration</div>';
				}
			?>
			
			<?php if(!$user->data['is_registered']) include('calendar.php'); ?>
		</div>	
	</div>
<?php if($user->data['is_registered'])
					{ ?>
	<script type="application/javascript">
	    $(document).ready(function () {
	        $("#my-calendar").zabuto_calendar(
	        					{
	        						language: "fr",
	        						today: true,
	        						nav_icon: { prev: '<span class="glyphicon glyphicon-chevron-left"></span>', next: '<span class="glyphicon glyphicon-chevron-right"></span>' },
	        						ajax: { url: "jsonTest/json.json", modal: true }
	    						}
	    	);

	    });
	</script>
<?php } ?>

<?php include('footer.php') ?>
