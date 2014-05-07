<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Projects_template
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

	function __construct($id)
	{
		$DB_temp = new Database;

		
		$query = "SELECT projets.nom, projets.datecreation, projets.texte, projets.url, ressources.titre 
				FROM projets 
				INNER JOIN projets_ressources 
				ON projets.id = projets_ressources.projet 
				INNER JOIN ressources 
				ON projets_ressources.ressource = ressources.id 
				WHERE projets.id=1 
				AND projets.etat=1 
				AND ressources.etat=1 
				ORDER BY nom DESC LIMIT 0, 30;";
		

		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false)
		{
			
			$this->id[0] = $raw_data[0]['id'];
			$this->nom[0] = $raw_data[0]['nom'];
			$this->datecreation[0] = $raw_data[0]['datecreation'];
			$this->texte[0] = $raw_data[0]['texte'];
			$this->url[0] = $raw_data[0]['url'];
			$this->ressource[0] = $raw_data[0]['titre'];
			
		}
		else
		{
			$this->nom[0] = "Ce projet n'existe pas !";
			
		}
	}
	
	private function printName($index)
	{
		echo "<h2>" . $this->nom[$index] . "</h2>";
	}

	private function printDate($index)
	{
		echo "<div class='proj_date'>" . $this->datecreation[$index] . "</div>";
	}

	private function printText($index)
	{
		echo "<div class='proj_text'>" . $this->texte[$index] . "</div>";
	}

	private function printUrl($index) {
		if ($this->url[$index] != "") {
			echo "<div class='proj_url'><a href=\"" . $this->url[$index] . "\">lien vers le site</a></div>";
		}
	}
	
	private function printRessource($index) {
		echo "<div class='proj_url'><a href=\"mdr\">" . $this->ressource[$index] . "</a></div>";
	}

	public function displayProjectTemplate()
	{
		
		echo '<div class="a_ressource col-lg-12">';
			$this->printName(0);
			$this->printDate(0);
			$this->printUrl(0);
			$this->printText(0);
			$this->printRessource(0);
		echo '</div>';
		
	}

	public function displayProjectName() {
		echo $this->nom[0];
	}
}
?>