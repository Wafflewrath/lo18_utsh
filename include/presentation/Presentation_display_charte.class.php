<?php
class Presentation_display_charte
{
	private $value;

	function __construct()
	{	
		$encode="SET NAMES 'utf8';";
		$DB_temp = new Database;
		$query = "SELECT * FROM presentation";
		$raw_data = $DB_temp->select($encode);
		$raw_data = $DB_temp->select($query);
		
		if ($raw_data !== false)
		{
			$this->value = $raw_data[0]['charte'];
			
		}
		else
		{
			$this->value = "Erreur pas de présentation";
			
		}
		$this->display($this->value);

		
	}
	
	public function display($value)
	{
		echo $value;
	}
}
?>