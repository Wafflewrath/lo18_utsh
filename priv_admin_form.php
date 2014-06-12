<?php include('header.php') ?>
<?php include('include/privadmin.class.php') ?>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{	
	?>

				<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Modification des droits des utilisateurs</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="priv_admin_process.php" method="post">
								<select name="user_select" style="width:250px">
									<?php 
										$res = new Privilege_Administration($user->data['user_id']);
										$res->getFormData();
										echo '<option value="0">Modifier les droits d\'un utilisateur</option>';
										for($i = 0; $i < $res->user_nbr; $i++)
										{
											echo '<option value="' . $res->user_id[$i] . '">' . $res->user_name[$i] . '</option>';
										}
									?>
								</select>
								<div class="radioform">
								<input type="radio" name="privilege" value="1"> Administrateur<br/>
								<input type="radio" name="privilege" value="2"> Utilisateur enregistré<br/>
								<input type="radio" name="privilege" value="3"> Visiteur<br/>
								</div>
								<input type="submit" />
							</form>
						</div>
						<br/>
				</div>
				
	<?php
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
