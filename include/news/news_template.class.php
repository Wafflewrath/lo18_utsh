<?php

class News_template
{
	public $id;
	public $title;
	public $contenu;
	public $contenu_resume;
	public $datecreation;
	
	private $newsEtat_valide = 1;

	function __construct($newsId)
	{
		$DB_temp = new Database;
		$query = "SELECT id, titre, contenu, contenuresume, datecreation FROM news WHERE etat = ".$this->newsEtat_valide." AND id = ".$newsId.";";
		
		$raw_data = $DB_temp->select($query);
		// var_dump($raw_data);
		
		if ($raw_data !== false && $raw_data[0] != "")
		{
			$this->id = $newsId;
			$this->title = $raw_data[0]['titre'];
			$this->contenu = $raw_data[0]['contenu'];
			$this->contenu_resume = $raw_data[0]['contenuresume'];
			$this->datecreation = $raw_data[0]['datecreation'];
		}
		else
		{
			$this->title = "News Introuvable";
			$this->contenu = "La news que vous recherchez n'existe pas, ou vous n'y avez pas accès !";
			$this->contenu_resume = "La news que vous recherchez n'existe pas, ou vous n'y avez pas accès !";
			$this->datecreation = "14/03/1879";
		}
	}
	
	private function printTitleAndDate()
	{
		echo "<div class='lineHeader'><h2>".$this->title."</h2></div>";
		echo '<div class="news_date">Créé le : '.$this->datecreation.'</div><br />';
	}

	private function printContenu()
	{
		echo '<div class="news_resume">'.$this->contenu.'</div>';
	}
	
	public function displayNewsTemplate()
	{
		$this->printTitleAndDate();
		$this->printContenu();
		
		global $user;
		$editCommand = "echo \"<div class='edit_news'>\";";
		$editCommand .= "echo \"<a href='edit_form.php?newsedit=".$this->id."' class='en_savoir_plus'>Editer la News</a>\";";
		$editCommand .= " echo \" - <a href='edit_form.php?newsdelete=".$this->id."' class='en_savoir_plus'>Supprimer la News</a>\";";
		$editCommand .= "echo \"</div>\";";
		$Privilege_manager = new Privilege($user->data['user_id']);
		$Privilege_manager->execif_Admin($editCommand);
	}
	
	
	public function displayEditForm()
	{
		echo '
		<div class="tuile_container col-lg-8">
			<div class="lineHeader">
				<h2>Edition d\'une News</h2>
			</div>
			<br />
			<div class="news_actualite"> 
				<form action="edit_form.php" method="post">
					<div class="news_title form">
						<input type="text" value="'.$this->title.'" name="news_title">
					</div>
					<div class="news_resume form">
						<textarea name="news_resume" rows="6" cols="150">'.$this->contenu_resume.'</textarea>
					</div>
					<div class="news_resume form">
						<textarea name="news_content" rows="13" cols="150">'.$this->contenu.'</textarea>
					</div>
					<input type="hidden" value="'.$this->id.'" name="newsedit_id">
					<input type="submit" value="Editer la News">
				</form>
			</div>
			<br/>
		</div>
		';
	}
}
?>