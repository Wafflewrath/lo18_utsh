<?php

class News_template
{
	public $id;
	public $title;
	public $contenu;
	public $contenu_resume;
	public $datecreation;
	
	public $ressource_name = array();
	public $ressource_url = array();
	public $ressource_id = array();
	
	private $newsEtat_valide = 1;
	private $Privilege_manager;

	function __construct($newsId)
	{
		global $user;
		$this->Privilege_manager = new Privilege($user->data['user_id']);
		$DB_temp = new Database;
		$query = "SELECT id, titre, contenu, contenuresume, datecreation FROM news WHERE etat = ".$this->newsEtat_valide." AND id = ".$newsId.";";
		
		$raw_data = $DB_temp->select($query);
		// var_dump($raw_data);
		
		if ($raw_data !== false && $raw_data[0] != "")
		{
			$this->id = $newsId;
			$this->title = $raw_data[0]['titre'];
			$this->contenu = htmlspecialchars_decode($raw_data[0]['contenu'], ENT_QUOTES);
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
		
		$query_ress = "SELECT ressources.id, ressources.titre, ressources.ressource_name 
						FROM ressources
						INNER JOIN news_ressources ON ressources.id = news_ressources.ressource 
						WHERE news_ressources.news = " . $this->id . "
						AND ressources.etat = 1;";
		$raw_data = $DB_temp->select($query_ress);
		
		if ($raw_data !== false && count($raw_data) != 0)
		{
			$j = 0;
			foreach($raw_data as $ressource)
			{
				$this->ressource_name[$j] = $ressource["titre"];
				$this->ressource_url[$j] = $ressource["ressource_name"];
				$this->ressource_id[$j] = $ressource["id"];
				$j++;
			}
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
	
	private function printRessource() {
		if ($this->ressource_name != false) 
		{
			for($i = 0; $i < count($this->ressource_name); $i++)
			{
				echo "<div class='proj_url'>Ressource : <a href=\"ressources/" .$this->ressource_url[$i] . "\">" . $this->ressource_name[$i] . "</a>";
				
				if ($this->Privilege_manager->execif_Admin("") == true)
				{
					echo '<a class="en_savoir_plus marge_gauche" href="news_unlink.php?id2='.$this->id.'&id1='.$this->ressource_id[$i].'">(Retirer)</a>';
				}
				
				echo "</div>";
			}
		}
	}
	
	public function displayNewsTemplate()
	{
		$this->printTitleAndDate();
		$this->printContenu();
		$this->printRessource();
		
		$editCommand = "echo \"<div class='edit_news'>\";";
		$editCommand .= "echo \"<a href='edit_form.php?newsedit=".$this->id."' class='en_savoir_plus'>Editer la News</a>\";";
		$editCommand .= " echo \" - <a href='edit_form.php?newsdelete=".$this->id."' class='en_savoir_plus'>Supprimer la News</a>\";";
		$editCommand .= "echo \"</div>\";";
		$this->Privilege_manager->execif_Admin($editCommand);
	}
	
	
	public function displayEditForm()
	{
		echo '
 		<script src="ckeditor/ckeditor.js"></script>
		<div class="tuile_container col-lg-12">
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
			<script type="text/javascript">CKEDITOR.replace( \'news_content\' );</script>			<br/>
		</div>
		';
	}
}
?>