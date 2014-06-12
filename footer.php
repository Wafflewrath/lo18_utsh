<?php include('include/contacts/Contact_display.class.php') ?>

<footer class="row footer">
	<div class="contact col-lg-2">Nous contacter :</div>
	<div class="col-lg-3">
		<div>
			<div class="utc_logo" onclick="window.open('http://www.utc.fr');"></div>
			<?php 
				$contact = new Contact_display("utc");
				$contact->displayContact();
				if ($Privilege_manager->execif_Admin("") == true)
				{
					echo '<br /><a href="./edit_contact.php?universite=utc" class="en_savoir_plus">editer le contact</a>';
				}
			?>
		</div>
		<div>
			<div class="utt_logo" onclick="window.open('http://www.utt.fr)';"></div>
			<?php 
				$contact = new Contact_display("utt");
				$contact->displayContact();
				if ($Privilege_manager->execif_Admin("") == true)
				{
					echo '<br /><a href="./edit_contact.php?universite=utt" class="en_savoir_plus">editer le contact</a>';
				}
			?>
		</div>
    </div>

	<div class="col-lg-1 imgfoot">
	</div>

	<div class="col-lg-3">
		<div>
			<div class="utbm_logo" onclick="window.open('http://www.utbm.fr');"></div>
			<?php 
				$contact = new Contact_display("utbm");
				$contact->displayContact();
				if ($Privilege_manager->execif_Admin("") == true)
				{
					echo '<br /><a href="./edit_contact.php?universite=utbm" class="en_savoir_plus">editer le contact</a>';
				}
			?>
		</div>
		<div>
			<div class="lasalle_logo" onclick="window.open('http://www.lasalle-beauvais.fr');"></div>
			<?php 
				$contact = new Contact_display("iplb");
				$contact->displayContact();
				if ($Privilege_manager->execif_Admin("") == true)
				{
					echo '<br /><a href="./edit_contact.php?universite=iplb" class="en_savoir_plus">editer le contact</a>';
				}
			?>
		</div>
    </div>
</footer>
</body>
</html>