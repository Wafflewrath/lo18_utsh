<?php include('header.php') ?>
	<div class="content row">
	
		<div class="col-lg-3 grptuile">
		</div>
		<div class="col-lg-3 grptuile">
			<div class="tuile login" onclick="window.location.href='<?php echo $phpbb_root_path . 'ucp.php?mode=login&redir=1' ; ?>'">
				<div class="tuiletitle">Connexion</div>
			</div>
		</div>
		<div class="col-lg-3 grptuile">
			<div class="tuile login" onclick="window.location.href='<?php echo $phpbb_root_path . 'ucp.php?mode=login&redir=1' ; ?>'">
				<div class="tuiletitle">Inscription</div>
			</div>
		</div>
		<div class="col-lg-3 grptuile">
		</div>
	
	</div>
<?php include('footer.php') ?>