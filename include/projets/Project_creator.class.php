<?php

class Project_creator
{
	
	private $projetEtat_valide = 1;

	function __construct($projectTitle, $project_title_complet, $projectResume, $url, $projectVisibilite, $ress_id = null)
	{
		$DB_temp = new Database;
		$query = "INSERT INTO projets (nom, nomcomplet, datecreation, texte, url, etat, visibilite) 
				VALUES ('".$projectTitle."', '".$project_title_complet."', now(),'".$projectResume."', '".$url."', ".$this->projetEtat_valide.", ".$projectVisibilite.");";
		$DB_temp->insert($query);
		
		$query_scopeIdentity = "SELECT LAST_INSERT_ID() AS id_proj;";
		$raw_data = $DB_temp->select($query_scopeIdentity);
		$project_id = $raw_data[0]["id_proj"];
		
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