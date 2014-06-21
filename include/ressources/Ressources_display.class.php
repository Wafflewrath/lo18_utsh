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
	
	public $nombre_ressources_affiche = 0;
	
	private $ressourceEtat_valide = 1;
	private $nombreTotal;
	private $pageTotal;
	private $actualPage;
	private $displayedNumber = 6;

	function __construct($filtre, $page = -99)
	{	
		if ($page != -99) // IF ELSE CRADE, mais moins que le refactor du code pour le link/unlink des ressources
		{
			$initialNumber = ($page - 1) * $this->displayedNumber;
			$finalNumber = $initialNumber + $this->displayedNumber;
			$this->actualPage = $page;

			$DB_temp = new Database;
			if ($filtre == "datecreation" || $filtre == "type" || $filtre == "titre") {
				$query = "SELECT ressources.id, titre, datecreation, ressources.ressource_name, nom_ressource FROM ressources INNER JOIN type_ressources ON ressources.type = type_ressources.id WHERE etat = " . $this->ressourceEtat_valide. " ORDER BY " . $filtre . " DESC LIMIT ".$initialNumber. ",".$this->displayedNumber .";";
			}
			else {
				$query = "SELECT ressources.id, titre, datecreation, ressources.ressource_name, type_ressources.nom_ressource FROM ressources INNER JOIN type_ressources ON ressources.type = type_ressources.id WHERE etat = " . $this->ressourceEtat_valide. " AND nom_ressource = '" . $filtre . "' ORDER BY datecreation DESC LIMIT ".$initialNumber. ",".$this->displayedNumber .";";
			}

			$raw_data = $DB_temp->select($query);
			
			if ($raw_data !== false)
			{
				$this->nombre_ressources_affiche = count($raw_data);
				for ($i = 0; $i < $this->nombre_ressources_affiche; $i++)
				{
					$this->id[$i] = $raw_data[$i]['id'];
					$this->title[$i] = $raw_data[$i]['titre'];
					$this->datecreation[$i] = $raw_data[$i]['datecreation'];
					$this->nom[$i] = $raw_data[$i]['ressource_name'];
					$this->type[$i] = $raw_data[$i]['nom_ressource'];
				}
			}
			else
			{
				$this->title[0] = "Aucune Ressource";
				$this->datecreation[0] = "Il n'y a actuellement aucune ressource !";
				$this->type[0] = "";
			}

			$queryCount = "SELECT count(*) as counter FROM ressources;";
			$raw_data = $DB_temp->select($queryCount);
			
			if ($raw_data !== false)
			{
				$this->nombreTotal = $raw_data[0]['counter'];
				$this->pageTotal = $this->nombreTotal / $this->displayedNumber;
				if($this->nombreTotal / $this->displayedNumber != 0) {
					$this->pageTotal += 1;
				}
			}
		}
		else
		{
			$DB_temp = new Database;
			$query = "SELECT ressources.id, titre, datecreation, ressources.ressource_name, nom_ressource FROM ressources INNER JOIN type_ressources ON ressources.type = type_ressources.id WHERE etat = " . $this->ressourceEtat_valide. " ORDER BY datecreation DESC;";
			
			$raw_data = $DB_temp->select($query);
			if ($raw_data !== false)
			{
				$this->nombre_ressources_affiche = count($raw_data);
				for ($i = 0; $i < $this->nombre_ressources_affiche; $i++)
				{
					$this->id[$i] = $raw_data[$i]['id'];
					$this->title[$i] = $raw_data[$i]['titre'];
					$this->datecreation[$i] = $raw_data[$i]['datecreation'];
					$this->nom[$i] = $raw_data[$i]['ressource_name'];
					$this->type[$i] = $raw_data[$i]['nom_ressource'];
				}
			}
			else
			{
				$this->title[0] = "Aucune Ressource";
				$this->datecreation[0] = "Il n'y a actuellement aucune ressource !";
				$this->type[0] = "";
			}
		}
	}
	
	private function printTitle($index)
	{
		echo "<div class='res_title'>" . $this->title[$index] . "</div>";
	}

	private function printDate($index)
	{
		echo "<div class='res_date'>Créé le : " . $this->datecreation[$index] . "</div>";
	}

	private function printType($index)
	{
		echo "<div class='ressource_type'>Type : " . $this->type[$index] . "</div>";
	}

	private function printLink($index)
	{
		echo "<div class='ressource_link'><a href='././ressources/". $this->nom[$index] . "'>Télécharger la ressource</a></div>";
	}

	private function printDelete($index)
	{
		global $user;
		$Privilege_manager = new Privilege($user->data['user_id']);
		if($Privilege_manager->execif_Admin(" "))
		{
			echo "<div class='ressource_link'><a href='././res_delete.php?id=". $this->id[$index] . "'>Supprimer la ressource</a></div>";
		}
	}
	
	public function displayRessources()
	{
		for ($ressources_index = 0; $ressources_index < $this->nombre_ressources_affiche; $ressources_index ++)
		{
			echo '<div class="a_ressource col-lg-12">';
				$this->printTitle($ressources_index);
				$this->printDate($ressources_index);
				$this->printType($ressources_index);
				$this->printLink($ressources_index);
				$this->printDelete($ressources_index);
				
			echo '</div>';
		}
		if (preg_match('/\/lo18_utsh\/ressources.php.*/', $_SERVER['REQUEST_URI']) && $this->nombreTotal > $this->displayedNumber) {
				echo '<div class="col-lg-12"><ul class="pagination">';
				if ($this->actualPage == 1) {
					echo '<li class="disabled"><a href="#">&laquo;</a></li>';
					echo '<li class="active"><a href="ressources.php?page=1">1</a></li>';
					echo '<li><a href="ressources.php?page=2">2</a></li>';
					if ($this->pageTotal > 3) {
						echo '<li><a href="ressources.php?page=3">3</a></li>';

					}
					echo '<li><a href="ressources.php?page=2">&raquo;</a></li>';
					

				}
				else {
					$precedent = $this->actualPage -1;
					$future = $this->actualPage + 1;
					if ($future > $this->pageTotal) {
						echo '<li><a href="ressources.php?page=' . $precedent . '">&laquo;</a></li>';
						echo '<li><a href="ressources.php?page=' . $precedent . '">' . $precedent . '</a></li>';
						echo '<li class="active"><a href="ressources.php?page=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
						echo '<li class="disabled"><a href="#">&raquo;</a></li>';
					}
					else {
						echo '<li><a href="ressources.php?page=' . $precedent . '">&laquo;</a></li>';
						echo '<li><a href="ressources.php?page=' . $precedent . '">' . $precedent . '</a></li>';
						echo '<li class="active"><a href="ressources.php?page=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
						echo '<li><a href="ressources.php?page=' . $future . '">' . $future . '</a></li>';
						echo '<li><a href="ressources.php?page=' . $future. '">&raquo;</a></li>';
					}
				}
				
				echo '</ul></div>';
			}
	}
}
?>