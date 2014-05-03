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