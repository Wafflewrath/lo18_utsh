<?php include('header.php') ?>
<?php include('include/privadmin.class.php') ?>
<body>

	<?php
		// si l'utilisateur est admin, on affiche la page, sinon on le redirige
		if ($Privilege_manager->execif_Admin("") == true)
		{	
			$PrivClass = new Privilege_Administration($user->data['user_id']);
			
			if (! $PrivClass->already_privileged(intval($_POST['user_select'])))
			{
				switch (intval($_POST['privilege'])) 
				{
					case 1:
						$user_id = intval($_POST['user_select']);
						$PrivClass->addas_Admin($user_id);
						break;
					case 2:
						$user_id = intval($_POST['user_select']);
						$PrivClass->addas_Registered($user_id);
						break;
					case 3:
						$user_id = intval($_POST['user_select']);
						$PrivClass->addas_Visitor($user_id);
						break;
				}
			}
			else
			{
				switch (intval($_POST['privilege'])) 
				{
					case 1:
						$user_id = intval($_POST['user_select']);
						$PrivClass->changeto_Admin($user_id);
						break;
					case 2:
						$user_id = intval($_POST['user_select']);
						$PrivClass->changeto_Registered($user_id);
						break;
					case 3:
						$user_id = intval($_POST['user_select']);
						$PrivClass->changeto_Visitor($user_id);
						break;
				}
			}
			
			redirect($_SERVER['REQUEST_URI']."/../index.php");
		}
		else
		{
			redirect($_SERVER['REQUEST_URI']."/../index.php");
		}
	?>

</body>
<?php include('footer.php') ?>
