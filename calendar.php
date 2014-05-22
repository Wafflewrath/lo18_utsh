			<div class=<?php echo '"tuilecalendar'; if(! $user->data['is_registered']){ echo " desactivate"; } echo '"'; ?> >
					<div class=<?php echo '"tuiletitle'; if(! $user->data['is_registered']){ echo " alone"; } echo '"'; ?> >Accès au projet et calendrier</div>
					<div id="my-calendar"></div>
			</div>