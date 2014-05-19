<?php

class Project_editor
{	

	function __construct($projectTitle, $project_title_complet, $projectResume, $projectVisibilite, $url, $projetId)
	{
		$DB_temp = new Database;
		$query = "UPDATE projets  
				SET nom = '".$projectTitle."', nomcomplet = '".$project_title_complet."', texte = '".$projectResume."' , url = '". $url ."', visibilite = " .$projectVisibilite."
				WHERE id = ".$projetId.";";
		$DB_temp->update($query);
	}
}
?>