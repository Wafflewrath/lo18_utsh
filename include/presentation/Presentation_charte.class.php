<?php
class Presentation_charte
{
	private $value;

	function __construct()
	{	
		if (isset($_POST['charte'])) {
			$DB_temp = new Database;
			$query = "UPDATE presentation 
					SET charte = '".$_POST['charte']."';";
			echo $_POST['charte'];
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
				$this->value = $raw_data[0]['charte'];
				$this->value = str_replace("\n", "", $this->value);
				
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
							<h2>Modifier la charte</h2>
						</div>
						<br />
						<div class="news_actualite"> 
							<form action="edit_charte.php" method="post">
							
								<div class="news_resume form">
									<textarea id="charte" name="charte" value="' . $value . '" rows="30" cols="150"></textarea>
									
								</div>
								
								<input type="submit" value="Modifier la charte">
							</form>
						</div>
						<br/>
				</div>
				<script type="text/javascript">
				CKEDITOR.replace( \'charte\' );
				</script>';
	}
}
?>