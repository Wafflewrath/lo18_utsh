<?php

class News_destructor
{
	private $newsEtat_valide = 1;

	function __construct($newsId)
	{
		$DB_temp = new Database;
		$query = "UPDATE news SET etat = 0 WHERE id = ".$newsId.";";
		// var_dump($query);
		$DB_temp->update($query);
	}
}
?>