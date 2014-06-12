<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Contact_display
{
	public $mail;
	public $nom;

	function __construct($universite)
	{
		$DB_temp = new Database;
		
		$query = "SELECT mail, nom
				 FROM contacts 
				 WHERE universite = '" . $universite . "';";
		

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
	
	public function displayContact()
	{
		echo '<div class="contact_"><a href="mailto:' . $this->mail . '">'. $this->nom . '</a></div>';
	}
}
?>