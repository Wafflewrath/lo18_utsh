<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Contact_editor
{
	public $mail;
	public $nom;
	private $universite;

	function __construct($universite)
	{
		// Si on a pas les paramètres, on charge le formulaire
		if (!isset($_POST['email']) && !isset($_POST['nom'])) {
			$DB_temp = new Database;
			$query = "SELECT mail, nom
					 FROM contacts 
					 WHERE universite = '" . $universite . "';";
			$this->universite = $universite;

			// echo $query;
			$raw_data = $DB_temp->select($query);
			
			if ($raw_data !== false)
			{
				$this->mail = $raw_data[0]['mail'];
				$this->nom = $raw_data[0]['nom'];
				
			}
			else
			{
				$this->mail = "";
				$this->nom = "";
			}
		}
		else {
			$DB_temp = new Database;
			$mail = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
			$nom = htmlspecialchars_decode($_POST['nom'], ENT_QUOTES);
			$query = "UPDATE contacts
					 SET mail = '". $mail . "', nom = '" . $nom . "'
					 WHERE universite = '" . $universite . "';";
			$DB_temp->update($query);
		}
	}
	
	public function displayForm()
	{
		echo '<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Editer un contact</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_contact.php?universite=' . $this->universite . '" method="post">
								<div class="news_title form">
									<input class="news_form" type="text" placeholder="Email" name="email" value="' . $this->mail . '">
								</div>
								<div class="news_title form">
									<input class="news_form" type="text" placeholder="Nom" name="nom" value="' . $this->nom . '">
								</div>
								
								<input class="input_form" type="submit" value="Editer le contact">
								
							</form>
						</div>
						<br/>
				</div>	';
	}
}
?>