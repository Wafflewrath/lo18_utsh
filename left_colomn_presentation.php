<div class="col-lg-4 grptuile">
	<?php
		if($user->data['is_registered'])
		{
			// j’utilise ici les fonctions interne à phpBB3 pour interroger la base de donnée sur le nombre de nouveaux message.
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
	<div class="tuile" onclick="window.location.href='presentation.php';">
		<div class="tuiletitle alone" >Présentation</div>
	</div>
	<div class="tuile tuiletitle alone" onclick="window.location.href='charte.php';">La charte du GIS</div>
	<div class="tuile tuiletitle alone" onclick="window.location.href='organigramme.php';">L'organigramme</div>
</div>