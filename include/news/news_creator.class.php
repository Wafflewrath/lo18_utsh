<?php

class News_creator
{
	public $title;
	public $contenu;
	public $contenu_resume;
	
	private $newsEtat_valide = 1;

	function __construct($newsTitle, $newsContent, $newsResume)
	{
		$DB_temp = new Database;
		$query = "INSERT INTO news (titre, contenu, contenuresume, datecreation, etat) VALUES ('".$newsTitle."', '".$newsContent."', '".$newsResume."', now(), ".$this->newsEtat_valide.");";
		// var_dump($query);
		$DB_temp->insert($query);
	}
}
?>