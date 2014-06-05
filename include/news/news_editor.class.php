<?php

class News_editor
{	
	private $newsEtat_valide = 1;

	function __construct($newsTitle, $newsContent, $newsResume, $newsId, $ress_id = null)
	{
		$DB_temp = new Database;
		$query = "UPDATE news SET titre = '".$newsTitle."', contenu = '".$newsContent."', contenuresume = '".$newsResume."' WHERE id = ".$newsId.";";
		$DB_temp->update($query);
		
		$ress_array = explode("-", $ress_id);
		for ($v = 0; $v < count($ress_array); $v++)
		{
			$ressource_id = $ress_array[$v];
			if ($ressource_id != null && $ressource_id != "" && $newsId != null)
			{
				$query_ressource = "INSERT INTO news_ressources (ressource, news) 
									VALUES (".intval($ressource_id).", ".intval($newsId).");";
				$DB_temp->insert($query_ressource);
			}
		}
	}
}
?>