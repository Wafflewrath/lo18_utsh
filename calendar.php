			<div class=<?php echo '"tuilecalendar'; if(! $user->data['is_registered']){ echo " desactivate"; } echo '"'; ?> >
					<div class=<?php echo '"tuiletitle'; if(! $user->data['is_registered']){ echo " alone"; } echo '"'; ?> >Calendrier</div>
					<div id="my-calendar"></div>
					<?php $Privilege_manager->execif_Admin("echo '<a href=\"edit_reu.php\" class=\"createnews_link\">Créer un event</a> - <a href=\"reu.php\" class=\"createnews_link\">Editer - supprimer un event</a>';") ?>
			</div>