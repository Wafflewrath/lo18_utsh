<?php include('include/ressources/Ressource_delete.class.php');
include('header.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	if($Privilege_manager->execif_Admin(""))
	{
		$res=new Ressource_delete($id);
	}
}
// header("Location: ressources.php?del=1");
die('<meta http-equiv="refresh" content="0;URL=index.php">');