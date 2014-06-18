<?php include('header.php') ?>
<?php include('include/privadmin.class.php') ?>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{	
	?>

				<div class="tuile_container col-lg-12" style="border-bottom:1px solid black">
					<div class="tuile_container col-lg-6">
							<div class="lineHeader">
								<h2>Modifier les droits d'un utilisateur</h2>
							</div>
							<br />
								<form action="priv_admin_process.php" method="post">
									<div class="radioform">
									<label>Accorder les droits :</label><br/>
									<input type="radio" name="privilege" value="1"> Administrateur<br/>
									<input type="radio" name="privilege" value="2"> Utilisateur enregistré<br/>
									<input type="radio" name="privilege" value="3"> Visiteur<br/>
									</div>
									<label>Pour l'utilisateur : </label>
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
									<input type="submit" />
								</form>
							<br/>
					</div>
					<div class="tuile_container col-lg-6">
							<div class="lineHeader">
								<h2>Récapitulatif des droits</h2>
							</div>
							<br />
							<ul> 
								<li> Administrateur : <br/>
									Visualisation, édition et suppression du contenu des News, Ressources, Projets  publiques/privés et Calendrier </li> 
								<li> Utilisateur enregistré : <br/>
									Visualisation des News, Projets publiques/privés et Calendrier
									Ajout de Ressources </li> 
								<li> Visiteur : <br/>
									Visualisation des News et Projets publiques </li>
							</ul>
							<br/>
					</div>
				</div>
				
				<div class="tuile_container col-lg-12" style="border-bottom:1px solid black; margin-bottom:10px;">
					<div class="tuile_container col-lg-6" style="margin-bottom: 20px;">
						<div class="lineHeader">
							<h2>Administration actuelle</h2>
							<span style="font-style: italic;">Nom utilisateur : Privilège</span>
						</div>
						<div>
							<?php
								$res->displayElevatedUsers("1");
							?>
						</div>
					</div>
					<div class="tuile_container col-lg-6" style="margin-bottom: 20px;">
						<div class="lineHeader">
							<h2>Utilisateurs actuels</h2>
							<span style="font-style: italic;">Nom utilisateur : Privilège</span>
						</div>
						<div>
							<?php
								$res->displayElevatedUsers("2");
							?>
						</div>
					</div>
				</div>
				<br/>
				
	<?php
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php?forbidden=1");
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
