<?php

class News_editor
{	
	private $newsEtat_valide = 1;

	function __construct($newsTitle, $newsContent, $newsResume, $newsId)
	{
		$DB_temp = new Database;
		$query = "UPDATE news SET titre = '".$newsTitle."', contenu = '".$newsContent."', contenuresume = '".$newsResume."' WHERE id = ".$newsId.";";
		$DB_temp->update($query);
	}
}
?>