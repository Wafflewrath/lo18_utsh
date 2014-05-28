<?php

class Reu_creator
{

	private $newsEtat_valide = 1;

	function __construct($reuContent, $reuTitle, $reuDate, $reuLieu)
	{
		$DB_temp = new Database;
		$query = "INSERT INTO calendrier (date ,nomreunion ,contenu ,lieu) VALUES ('".$reuDate."', '".$reuTitle."', '".$reuContent."', '".$reuLieu."');";
		// var_dump($query);
		$DB_temp->insert($query);
		$flagada = new Reu_generation();
	}
}
?>