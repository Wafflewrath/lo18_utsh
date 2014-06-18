<?php

class Reu_generation
{

	private $newsEtat_valide = 1;

	function __construct()
	{
		$DB_temp = new Database;
		$query = "SELECT * FROM calendrier;";
		$value = "[";
		$result = $DB_temp->select($query);
		if (!$result) {
		    $message  = 'Requête invalide : ' . mysql_error() . "\n";
		    $message .= 'Requête complète : ' . $query;
		    die($message);
		}
		$count = 0;
		foreach ($result as $key => $calendrier)
		{
			if ($count != 0) {
				$value = $value . ',';
			}
			$value = $value . "{" . '"date":"' . $calendrier['date'] . '",';
			$value = $value . '"badge":"true",';
			$value = $value . '"title":"' . $calendrier['nomreunion'] . '",';
			$value = $value . '"body":"' . $this->removeAntiSlashN($calendrier['contenu']) . '",';
			$value = $value . '"footer":"' . $calendrier['lieu'] . '",';
			$value = $value . '"classname":"purple-event"';
			$value = $value . "}";
			$count++;
		}

		$value = $value . "]";
		
				// 1 : on ouvre le fichier
		$monfichier = fopen('././jsonTest/json.json', 'r+');

		// 2 : on fera ici nos opérations sur le fichier...
		fputs($monfichier, $value);

				
		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);

	}

	function removeAntiSlashN($string) {
		return preg_replace("/(\r\n|\n|\r)/", " ", $string);
	}

}
?>