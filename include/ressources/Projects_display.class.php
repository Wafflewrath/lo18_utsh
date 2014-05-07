<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Projects_display
{
	public $id = array();
	public $nom = array();
	public $texte = array();
	public $datecreation = array();
	public $url = array();
	public $etat = array();
	public $visibilite = array();
	
	public $nombre_projets_affiche = array();
	
	private $projetEtat_valide = 1;

	function __construct($filtre)
	{
		$DB_temp = new Database;

		
		$query = "SELECT * FROM projets WHERE etat = " . $this->projetsEtat_valide. " ORDER BY nom DESC LIMIT 0, 30;";
		

		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false)
		{
			$this->nombre_projets_affiche = count($raw_data);
			for ($i = 0; $i < count($raw_data); $i++)
			{
				$this->id[$i] = $raw_data[$i]['id'];
				$this->nom[$i] = $raw_data[$i]['nom'];
				$this->datecreation[$i] = $raw_data[$i]['datecreation'];
				$this->texte[$i] = $raw_data[$i]['texte'];
				$this->url[$i] = $raw_data[$i]['url'];
				$this->visibilite[$i] = $raw_data[$i]['visibilite'];
			}
		}
		else
		{
			$this->id[0] = 0;
			$this->nom[0] = "Aucun projet";
			$this->datecreation[0] = "Il n'y a actuellement aucun projets !";
			
		}
	}
	
	private function printName($index)
	{
		echo "<div class='res_title'>" . $this->nom[$index] . "</div>";
	}

	private function printDate($index)
	{
		echo "<div class='res_date'>" . $this->datecreation[$index] . "</div>";
	}
	
	public function displayProjects()
	{
		for ($ressources_index = 0; $ressources_index < $this->nombre_projets_affiche; $ressources_index ++)
		{
			echo '<div class="a_ressource col-lg-12" onclick="window.location.href="././projets.php?id=' + $this->id[$ressources_index] +'">';
				$this->printName($ressources_index);
				$this->printDate($ressources_index);
			echo '</div>';
		}
	}
}
?>