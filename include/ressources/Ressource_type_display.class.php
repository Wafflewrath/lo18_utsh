<?php

class Ressources_type_display
{
	public $nom = array();

	function __construct()
	{
		$DB_temp = new Database;

		
		$query = "SELECT nom_ressource FROM type_ressources;";
		

		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false)
		{
			$this->nombre_ressources_affiche = count($raw_data);
			for ($i = 0; $i < count($raw_data); $i++)
			{
				$this->nom[$i] = $raw_data[$i]['nom_ressource'];;
			}
		}
		else
		{
			$this->nom[0] = "erreur";
		}
	}
	
	public function displayRessourcesTypesInList()
	{
		for ($ressources_index = 0; $ressources_index < $this->nombre_ressources_affiche; $ressources_index ++)
		{
			echo '<option value="' . $this->nom[$ressources_index] . '">' . $this->nom[$ressources_index] . '</option>';
		}
	}
}
?>