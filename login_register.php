<?php include('header.php') ?>

	<?php
		if ($user->data['is_registered'] == false)
		{
	?>
		
			<div class="content row">
			
				<div class="col-lg-3 grptuile">
				</div>
				<div class="col-lg-3 grptuile">
					<div class="tuile login" onclick="window.location.href='<?php echo $phpbb_root_path . 'ucp.php?mode=login&redir=1' ; ?>'">
						<div class="tuiletitle alone">Connexion</div>
					</div>
				</div>
				<div class="col-lg-3 grptuile">
					<div class="tuile login" onclick="window.location.href='<?php echo $phpbb_root_path . 'ucp.php?mode=login&redir=1' ; ?>'">
						<div class="tuiletitle alone">Inscription</div>
					</div>
				</div>
				<div class="col-lg-3 grptuile">
				</div>
			
			</div>
	<?php
		}
		else
		{
			// echo $_SERVER['REQUEST_URI'];
			header('Location: index.php?ck=0.1'); //cache killer pour obfuscation du sid
			die();
		}
	?>
<?php include('footer.php') ?>