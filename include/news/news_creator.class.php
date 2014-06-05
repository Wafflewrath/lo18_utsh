<?php

class News_creator
{
	public $title;
	public $contenu;
	public $contenu_resume;
	
	private $newsEtat_valide = 1;

	function __construct($newsTitle, $newsContent, $newsResume, $ress_id = null)
	{
		$DB_temp = new Database;
		$query = "INSERT INTO news (titre, contenu, contenuresume, datecreation, etat) VALUES ('".$newsTitle."', '".$newsContent."', '".$newsResume."', now(), ".$this->newsEtat_valide.");";
		// var_dump($query);
		$DB_temp->insert($query);
		
		$query_scopeIdentity = "SELECT LAST_INSERT_ID() AS id_news;";
		$raw_data = $DB_temp->select($query_scopeIdentity);
		$news_id = $raw_data[0]["id_news"];
		
		$ress_array = explode("-", $ress_id);
		for ($v = 0; $v < count($ress_array); $v++)
		{
			$ressource_id = $ress_array[$v];
			if ($ressource_id != null && $ressource_id != "" && $news_id != null)
			{
				$query_ressource = "INSERT INTO news_ressources (ressource, news) 
									VALUES (".intval($ressource_id).", ".intval($news_id).");";
				$DB_temp->insert($query_ressource);
			}
		}
	}
}
?>