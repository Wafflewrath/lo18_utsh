<?php include("Reu_generation.class.php"); ?> 

<?php

class Reu_editor
{	

	function __construct($date, $nomreunion, $contenu, $lieu, $reuId)
	{
		$DB_temp = new Database;
		$query = "UPDATE calendrier 
				SET date = '".$date."', 
					nomreunion = '".$nomreunion."', 
					contenu = '".$contenu."' , 
					lieu = '".$lieu."'
				WHERE id = ".$reuId.";";
		$DB_temp->update($query);
		$generation = new Reu_generation();
	}
}
?>