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
	private $Privilege_manager;

	function __construct()
	{
		$DB_temp = new Database;
		global $user;
		$this->Privilege_manager = new Privilege($user->data['user_id']);
		
		// modif de la requete SQL dans le cas d'un visiteur sans privileges pour ne pas disclose des projets privés
		if ($this->Privilege_manager->execif_Visitor("", true) == true)
		{
			$query_add = " AND projets.visibilite <> 0";
		}
		else
		{
			$query_add = "";
		}
		
		$query = "SELECT * FROM projets WHERE etat = " . $this->projetEtat_valide. " " . $query_add . " ORDER BY nom DESC LIMIT 0, 30;";
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
			$this->nombre_projets_affiche = 1;
			$this->id[0] = 0;
			$this->nom[0] = "Aucun projets";
			$this->datecreation[0] = "Il n'y a actuellement aucun projet !";
			
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

	private function printEdit($index)
	{
		echo "<a class='en_savoir_plus' href='projet_ajout.php?projectedit=".$this->id[$index]."'>Editer le projet</a>";
		echo " - ";
		echo "<a class='en_savoir_plus' href='projet_ajout.php?projectdeleteid=".$this->id[$index]."'>Supprimer le projet</a>";
	}
	
	public function displayProjects()
	{
		echo '<div class="tuile_container col-lg-12">';
		echo '<div class="lineHeader">';
		echo '<h2>Projets</h2>';
		echo '</div>';
		echo '<div class="aide"> ';
		echo '<p>Vous trouverez ici l\'ensemble des projets menés ou soutenu par le GIS.</p>';
		if ($this->Privilege_manager->execif_Admin("") == true)
		{
			echo '<a href="projet_ajout.php">Créer un nouveau projet</a>';
		}
		echo '</div>';

		for ($ressources_index = 0; $ressources_index < $this->nombre_projets_affiche; $ressources_index ++)
		{
			echo '<div class="a_project col-lg-12" onclick=window.location.href="projets.php?projectid=' . $this->id[$ressources_index] .'">';
				$this->printName($ressources_index);
				$this->printDate($ressources_index);
				
				
				if ($this->Privilege_manager->execif_admin("") == true)
				{
					$this->printEdit($ressources_index);
				}
			echo '</div>';
		}
		echo "</div>";
	}
}
?>