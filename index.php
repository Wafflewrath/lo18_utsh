<?php include('header.php') ?>

	<div class="content row">
	
		<div class="col-lg-3 grptuile">
			<div class="tuile" onclick="window.location.href='presentation.php';">
				<div class="tuiletitle">Qui sommes-nous?</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vitae dapibus orci. Sed vel aliquam mi, eu mattis eros.</p>
			</div>
			
			<div class=<?php echo '"tuilecalendar'; if(! $user->data['is_registered']){ echo " desactivate"; } echo '"'; ?> >
					<div class="tuiletitle">Accès au projet et calendrier</div>
					<div id="my-calendar"></div>
			</div>
		</div>
		
		
		<div class="col-lg-5 grptuile">
			<div class="tuilecontainer">
				<h1 id="newstitle">News</h1>
				<?php 
					$news = new News_adapter();
					$news->displayNews();
					
					$Privilege_manager->execif_Admin("echo '<a href=\"edit_form.php\" class=\"createnews_link\">Créer une news</a>';")
				?>
			</div>
		</div>
		
		<div class="col-lg-4 grptuile">
				<?php
					if($user->data['is_registered'])
					{
						// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
						$nb_new_msg =$db->sql_query("SELECT COUNT(msg_id) AS nb FROM phpbb_privmsgs_to WHERE user_id='".$user->data['user_id']."' AND pm_new=1 LIMIT 1");
						$nb_new_msg =$db->sql_fetchrow($nb_new_msg);
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
				<div <?php echo'class="tuiletitle forumtitle'; if($user->data['is_registered']){ echo  ' " onclick="window.location.href='."'./forum'".';"';} else { echo ' desactivate"'; } ?>>Forums</div>
				<?php
					if($user->data['is_registered'])
					{
						$forum = new Forum_articles(2);
						$forum->displayAll();
					}
				?>
			</div>
			<div class=<?php echo '"tuile tuiletitle alone'; if(! $user->data['is_registered']){ echo ' desactivate"'; } else { echo 'onclick="window.location.href=\'ressources.php\';';} ?>>Liens / Ressources</div>
		</div>	
	</div>

	<script type="application/javascript">
	    $(document).ready(function () {
	        $("#my-calendar").zabuto_calendar(
	        					{
	        						language: "fr",
	        						today: true,
	        						nav_icon: { prev: '<i class="fa fa-chevron-circle-left"></i>', next: '<i class="fa fa-chevron-circle-right"></i>' },
	        						ajax: { url: "jsonTest/json.json", modal: true }
	    						}
	    	);

	    });
	</script>

<?php include('footer.php') ?>
