<?php

class Ressource_delete
{
	function __construct($id)
	{
		$i=htmlspecialchars($id);
		$query="UPDATE ressources SET etat='0' WHERE id=".$i.";";
		$db=new Database();
		$db->select($query);
	}
}