<?php

class Project_creator
{
	
	private $projetEtat_valide = 1;

	function __construct($projectTitle, $project_title_complet, $projectResume, $url, $projectVisibilite)
	{
		$DB_temp = new Database;
		$query = "INSERT INTO projets (nom, nomcomplet, datecreation, texte, url, etat, visibilite) 
				VALUES ('".$projectTitle."', '".$project_title_complet."', now(),'".$projectResume."', '".$url."', ".$this->projetEtat_valide.", ".$projectVisibilite.");";
		// var_dump($query);
		$DB_temp->insert($query);
	}
}
?>