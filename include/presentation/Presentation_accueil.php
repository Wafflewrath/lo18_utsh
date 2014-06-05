<?php
class Presentation_accueil
{
	private $value;

	function __construct()
	{	
	}

	private function getValue()
	{
		$encode="SET NAMES 'utf8';";
		$DB_temp = new Database;
		$query = "SELECT * FROM presentation";
		$raw_data = $DB_temp->select($encode);
		$raw_data = $DB_temp->select($query);
		if ($raw_data !== false)
		{
			$this->value = html_entity_decode($raw_data[0]['TextAccueil'], ENT_QUOTES, 'UTF-8');
		}
		else
		{
			$this->value = "Erreur pas de présentation";	
		}
	}
	
	public function display()
	{
		$this->getValue();
		echo $this->value;
	}

	public function displayRegistered()
	{
		$this->getValue();
		$max=200;
		$i=$max;
		if(strlen($this->value)>$i)
			while($this->value[$i]!=' ')
				$i++;
		$ret=substr($this->value, 0, $i);
		if($i>$max)
			if($this->value[$i-1]=='.')
				$ret=$ret."..";
			else
				$ret=$ret."...";
		echo $ret;
	}

	function edit()
	{	
		if (isset($_POST['presentation'])) {
			$DB_temp = new Database;
			$encode="SET NAMES 'utf8';";
			$raw_data = $DB_temp->select($encode);
			$query = "UPDATE presentation 
					SET TextAccueil = '".html_entity_decode($_POST['presentation'], ENT_QUOTES, 'UTF-8')."';";
			$DB_temp->insert($query);
			redirect($_SERVER['REQUEST_URI']."/../index.php?presentation_edit=1");
		}
		else
		{
			$encode="SET NAMES 'utf8';";
			$DB_temp = new Database;
			$query = "SELECT * FROM presentation";
			$raw_data = $DB_temp->select($encode);
			$raw_data = $DB_temp->select($query);
			
			if ($raw_data !== false)
			{
				$this->value = html_entity_decode($raw_data[0]['TextAccueil'], ENT_QUOTES, 'UTF-8');
				
			}
			else
			{
				$this->value = "Entrez votre présentation";
				
			}
			$this->displayEditForm($this->value);

		}
		
	}
	
	public function displayEditForm($value)
	{
		echo '<div class="tuile_container col-lg-12">
						<div class="lineHeader">
							<h2>Modifier la présentation</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_pres.php" method="post">
								Editer le texte de la présentation de l\'accueil:
								<div class="news_resume form">
									<textarea id="presentation" name="presentation" value="' . $value . '" rows="10" cols="150"></textarea>
									
								</div>
								
								<input type="submit" value="Modifier la présentation">
							</form>
						</div>
						<br/>
				</div>';
	}
}
?>