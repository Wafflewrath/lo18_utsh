<?php

class Project_editor
{	

	function __construct($projectTitle, $project_title_complet, $projectResume, $url, $projectVisibilite, $project_id, $ress_id = null)
	{
		$DB_temp = new Database;
		$query = "UPDATE projets  
				SET nom = '".$projectTitle."', nomcomplet = '".$project_title_complet."', texte = '".$projectResume."' , url = '". $url ."', visibilite = " .$projectVisibilite."
				WHERE id = ".$project_id.";";
				
		$DB_temp->update($query);
		
		$ress_array = explode("-", $ress_id);
		for ($v = 0; $v < count($ress_array); $v++)
		{
			$ressource_id = $ress_array[$v];
			if ($ressource_id != null && $ressource_id != "" && $project_id != null)
			{
				$query_ressource = "INSERT INTO projets_ressources (ressource, projet) 
									VALUES (".intval($ressource_id).", ".intval($project_id).");";
				$DB_temp->insert($query_ressource);
			}
		}
	}
}
?>