<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Ressources_display
{
	public $id = array();
	public $title = array();
	public $datecreation = array();
	public $type = array();
	public $lien = array();
	
	public $nombre_ressources_affiche = array();
	
	private $ressourceEtat_valide = 1;

	function __construct()
	{
		$DB_temp = new Database;
		$query = "SELECT id, titre, datecreation, type FROM ressources WHERE etat = " . $this->ressourceEtat_valide. " ORDER BY id DESC LIMIT 0, 30;";
		
		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false)
		{
			$this->nombre_ressources_affiche = count($raw_data);
			for ($i = 0; $i < count($raw_data); $i++)
			{
				$this->id[$i] = $raw_data[$i]['id'];
				$this->title[$i] = $raw_data[$i]['titre'];
				$this->datecreation[$i] = $raw_data[$i]['datecreation'];
				$this->type[$i] = $raw_data[$i]['type'];
			}
		}
		else
		{
			$this->title[0] = "Aucune News";
			$this->datecreation[0] = "Il n'y a actuellement aucune news !";
			$this->type[0] = "";
		}
	}
	
	private function printTitle($index)
	{
		echo "<div class='res_title'>" . $this->title[$index] . "</div>";
	}

	private function printDate($index)
	{
		echo "<div class='res_date'>" . $this->datecreation[$index] . "</div>";
	}

	private function printType($index)
	{
		echo "<div class='ressource_type'>" . $this->type[$index] . "</div>";
	}

	private function printLink($index)
	{
		echo "<div class='ressource_link'><a href='#'>lien</a></div>";
	}
	
	public function displayRessources()
	{
		for ($ressources_index = 0; $ressources_index < $this->nombre_ressources_affiche; $ressources_index ++)
		{
			echo '<div class="a_ressource">';
				$this->printTitle($ressources_index);
				$this->printDate($ressources_index);
				$this->printType($ressources_index);
				$this->printLink($ressources_index);
			echo '</div>';
		}
	}
}
?>