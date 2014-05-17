
<?php
class Ressource_adder
{

	function __construct()
	{	
		// A ajouter : l'utilisateur qui a entré le fichier.		

		if ($_FILES['ressource_file']['error'] > 0) {
			$erreur = "Erreur lors du transfert";
			return;
		}

		if (isset($_POST['ressource_title'])) {
			$titre = htmlspecialchars($_POST['ressource_title'], ENT_QUOTES);
			$type = htmlspecialchars($_POST['ressource_type'], ENT_QUOTES);
			$file_name = $_FILES['ressource_file']['name'];

			// Upload du fichier dans le dossier ressources
			$new_place = "././ressources/" . $file_name;
			$resultat = move_uploaded_file($_FILES['ressource_file']['tmp_name'], $new_place);

			// Vérification que le fichier à bien été uploadé à l'endroid prévu.
			if ($resultat) {
				$DB_temp = new Database;

				// On récupère le type de ressource
				$query_type = "SELECT id FROM type_ressources WHERE nom_ressource='" . $type . "';";
				$type_id = $DB_temp->select($query_type);

				// Insertion des informations de la ressource
				$query = "INSERT INTO ressources (titre, datecreation, type, etat, ressource_name) VALUES ('".$titre."', now(), ".$type_id[0]["id"].", 1, '". $file_name ."');";
				
				// var_dump($query);
				$DB_temp->insert($query);
			}

		}
		else {
			//Send error
		}
		
	}
}
?>