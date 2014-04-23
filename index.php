<?php include('header.php') ?>
	<div class="content row">
	
		<div class="col-lg-3 grptuile">
			<div class="tuile" onclick="window.location.href='presentation.php';">
				<div class="tuiletitle">Qui sommes-nous?</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vitae dapibus orci. Sed vel aliquam mi, eu mattis eros.</p>
			</div>
			
			<div class="tuile">
				<div class="tuiletitle">Accès au projet et calendrier</div>
				<div id="my-calendar"></div>
			</div>
		</div>
		
		<div class="col-lg-5 grptuile">
			<div class="tuile">
				<h1 id="newstitle">News</h1>

				<div class="a_news">
					<div class="news_title">
						Compte rendu de réunion
					</div>
					<div class="news_date">
						23/04/2014
					</div>
					<div class="news_resume">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit...
						<a href="a_news_template.php" class="en_savoir_plus">
							lire la suite
						</a>
					</div>

				</div>

				<div class="a_news">
					<div class="news_title">
						Compte rendu de réunion
					</div>
					<div class="news_date">
						23/04/2014
					</div>
					<div class="news_resume">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit...
						<a href="a_news_template.php" class="en_savoir_plus">
							lire la suite
						</a>
					</div>

				</div>
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
						echo '<div class="tuile tuiletitle" onclick="'.$javascript_to_add.'">';
						echo 'Déconnexion';
						echo '</div>';
					}
					else
					{
						$javascript_to_add = "window.location.href='./login_register.php'";
						echo '<div class="tuile tuiletitle" onclick="'.$javascript_to_add.'">';
						echo 'Connexion / Demande d\'adhésion';
						echo '</div>';
					}
				?>
			<div id="forumstuile" class="tuile" onclick="window.location.href='./forum';">
				<div class="tuiletitle">Forums</div>
				<div class="forumpost">
				<div class="forumsujet">Sujet 1</div>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vitae dapibus orci. Sed vel aliquam mi, eu mattis eros.
				</div>
				<div class="forumpost">
				<div class="forumsujet">Sujet 1</div>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vitae dapibus orci. Sed vel aliquam mi, eu mattis eros.
				</div>
			</div>
			<div class="tuile tuiletitle">Liens / Ressources</div>
		</div>	
	</div>

<?php
	if(!$user->data['is_bot']) 
	{ // Si l’utilisateur n’est pas un bot (Google, Yahoo, …)
		if(!$user->data['is_registered'])
		{ // Si l’utilisateur n’est pas encore logué
			echo '<a href="'.$phpbb_root_path.'ucp.php?mode=login&redir=1">Connexion</a> |
			 <a href="'.$phpbb_root_path.'ucp.php?mode=register">Inscription</a>';
		}
		else
		{ // Autrement, si l’utilisateur est logué
			// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
			$nb_new_msg =$db->sql_query("SELECT COUNT(msg_id) AS nb FROM phpbb_privmsgs_to WHERE user_id='".$user->data['user_id']."' AND pm_new=1 LIMIT 1");
			$nb_new_msg =$db->sql_fetchrow($nb_new_msg);
			echo '<a href="'.$phpbb_root_path.'ucp.php?mode=logout&redir=1&sid='.$user->session_id.'">Déconnexion [ '.$user->data['username'].' ]</a> |
			 <a href="'.$phpbb_root_path.'ucp.php?i=pm&folder=inbox">Vous avez <strong>'.$nb_new_msg['nb'].'</strong> nouveau message</a>';
		}
	}
?>

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
