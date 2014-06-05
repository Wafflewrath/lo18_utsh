<?php

class Project_editor
{	

	function __construct($projectTitle, $project_title_complet, $projectResume, $url, $projectVisibilite, $projetId, $ressource_id = null)
	{
		$DB_temp = new Database;
		$query = "UPDATE projets  
				SET nom = '".$projectTitle."', nomcomplet = '".$project_title_complet."', texte = '".$projectResume."' , url = '". $url ."', visibilite = " .$projectVisibilite."
				WHERE id = ".$projetId.";";
				
		$DB_temp->update($query);
		
		if ($ressource_id != null && $projetId != null)
		{
			$query_ressource = "INSERT INTO projets_ressources (ressource, projet) 
								VALUES (".intval($ressource_id).", ".intval($projetId).");";
			$DB_temp->insert($query_ressource);
		}
	}
}
?>