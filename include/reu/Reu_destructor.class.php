

<?php

class Reu_destructor
{

	function __construct($reuId)
	{
		$DB_temp = new Database;
		$query = "DELETE FROM calendrier WHERE id = ".$reuId.";";
		// var_dump($query);
		$DB_temp->update($query);

		$generation = new Reu_generation();
	}
}
?>