<?php

class Project_destructor
{	

	function __construct($projetId)
	{
		$DB_temp = new Database;
		$query = "UPDATE projets 
				SET etat = 0 
				WHERE id = ".$projetId.";";
				
		$DB_temp->update($query);
	}
}
?>