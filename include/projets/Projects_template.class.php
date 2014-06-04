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
	public $nomcomplet = array();
	
	public $nombre_projets_affiche = array();
	
	private $projetEtat_valide = 1;
	private $Privilege_manager;

	function __construct($id)
	{
		$DB_temp = new Database;
		global $user;
		$this->Privilege_manager = new Privilege($user->data['user_id']);
		
		if ($this->Privilege_manager->execif_Visitor("", true) == true)
		{
			$query_add = " AND projets.visibilite <> 0 AND projets.visibilite <> 2";
		}
		else
		{
			$query_add = "";
		}

		
		$query = "SELECT projets.nom, projets.nomcomplet, projets.datecreation, projets.texte, projets.url, ressources.titre, ressources.etat, ressources.ressource_name
				FROM projets 
				LEFT OUTER JOIN projets_ressources 
				ON projets.id = projets_ressources.projet 
				LEFT OUTER JOIN ressources 
				ON projets_ressources.ressource = ressources.id 
				WHERE projets.id=".$id.$query_add." 
				AND projets.etat=1;";
				
		
		
		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false && count($raw_data) != 0)
		{
			if ($raw_data[0]['etat'] != 2) {
				$this->id[0] = $id;
				$this->nom[0] = $raw_data[0]['nom'];
				$this->datecreation[0] = $raw_data[0]['datecreation'];
				$this->texte[0] = $raw_data[0]['texte'];
				$this->url[0] = $raw_data[0]['url'];
				$this->ressource[0] = $raw_data[0]['titre'];
				$this->nomcomplet[0] = $raw_data[0]['nomcomplet'];
				$this->nameressource[0] = $raw_data[0]['ressource_name'];
				$this->etat[0] = 1;
			}
			
		}
		else
		{
			$this->id[0] = 0;
			$this->nom[0] = "Aucun Projet";
			$this->datecreation[0] = "";
			$this->texte[0] = "";
			$this->url[0] = "";
			$this->ressource[0] = "";
			$this->nomcomplet[0] = "Ce projet n'existe pas !";
			$this->etat[0] = 0;
		}
	}
	
	private function printName($index)
	{
		echo "<h2>" . $this->nomcomplet[$index] . "</h2>";
	}

	private function printDate($index)
	{
		echo "<div class='proj_date'>Créé le : " . $this->datecreation[$index] . "</div>";
	}

	private function printText($index)
	{
		echo "<div class='proj_text'><h3>Présentation du projet</h3>" . $this->texte[$index] . "</div>";
	}

	private function printUrl($index) {
		if ($this->url[$index] != "") {
			echo "<div class='proj_url'><a href=\"" . $this->url[$index] . "\">lien vers le site</a></div>";
		}
	}
	
	private function printRessource($index) {
		if ($this->ressource[$index] != null) {
			echo "<div class='proj_url'>Ressource : <a href=\"ressources/" .$this->nameressource[$index] . "\">" . $this->ressource[$index] . "</a></div>";
		}
	}
	
	private function printEdit($index)
	{
		echo "<div class='edit_ressource'>";
		echo "<a class='en_savoir_plus' href='projet_ajout.php?projectedit=".$this->id[$index]."'>Editer le projet</a>";
		echo " - ";
		echo "<a class='en_savoir_plus' href='projet_ajout.php?projectdeleteid=".$this->id[$index]."'>Supprimer le projet</a>";
		echo "</div>";
	}
	
	public function displayProjectTemplate()
	{
		
		echo '<div class="one_ressource col-lg-12">';
			$this->printName(0);
			$this->printDate(0);
			$this->printUrl(0);
			$this->printText(0);
			$this->printRessource(0);
			
			if ($this->Privilege_manager->execif_admin("") == true && $this->etat[0] != 0)
			{
				$this->printEdit(0);
			}
		echo '</div>';
		
	}

	public function displayProjectName() {
		echo $this->nom[0];
	}
	
	private function checkEmptyStrings()
	{
		if ($this->url[0] == "")
		{
			$this->url[0] = 'placeholder="Lien vers le site du projet"';
		}
		else
		{
			$this->url[0] = 'value="'.$this->url[0].'"';
		}
	}
	
	public function displayEditForm()
	{
		$this->checkEmptyStrings();
		
		echo '
		<div class="tuile_container col-lg-12">
			<div class="lineHeader">
				<h2>Editer un projet</h2>
			</div>
			<br />
			<div class="news_actualite"> 
				<form action="projet_ajout.php" method="post">
					<input type ="hidden" value="'.$this->id[0].'" name="projectedit_id" />
					<div class="news_title form">
						<input type="text" value="'.$this->nom[0].'" name="project_title">
					</div>
					<div class="news_title form">
						<input type="text" value="'.$this->nomcomplet[0].'" name="project_title_complet">
					</div>
					<div class="news_resume form">
						<textarea name="project_resume" rows="6" cols="150">'.$this->texte[0].'</textarea>
					</div>
					<div class="news_resume form">
						<input type="text" '.$this->url[0].' name="project_link" style="min-width:300px">
					</div>

					<div class="news_title form">
						<select name="projet_visibilite">
							<option value="1">Publique</option>
							<option value="2">Private</option>
						</select>
					</div>
					
					<div id="ressource_projet"></div>
					<a id="add_ressource">ajouter une ressource à ce projet</a>
					<br/><input type="submit" value="Sauvegarder les changements">
					
					<script type="text/javascript">
						document.getElementById("add_ressource").onclick(function() {
							var div = document.getElementById("divID");

							div.innerHTML = div.innerHTML + "<p>Extra stuff</p>";
						})
					</script>
					
				</form>
			</div>
			<br/>
		</div>
		';
	}
}
?>