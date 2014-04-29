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
		echo '<div class="news_date">'.$this->datecreation.'</div><br />';
	}

	private function printContenu()
	{
		echo "<div class='news_resume'>".$this->contenu."</div>";
	}
	
	public function displayNewsTemplate()
	{
		$this->printTitleAndDate($news_index);
		$this->printContenu($news_index);
	}
	

	/*
	<div class="tuile_container col-lg-8">
			<div class="lineHeader">
				<h2>Compte rendu de réunion</h2>
			</div>
			<div class="news_date">
				23/04/2014 14h15
			</div>
			<br />
		
			<div class="news_resume">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
			</div>
			
			
			
		</div> */	
}
?>