<?php include('news/news_display.class.php'); ?>
<?php include('news/news_template.class.php'); ?>

<?php
class News_adapter
{
	private $news_class;
	private $class_type;
	
	private $newsEtat_valide = 1;
	private $newsDisplayNumber = 3;

	function __construct()
	{	
		$newsId = $_GET['newsid'];
		if ($newsId != "")
		{
			// construction de l'objet News_template
			$newsId = intval($newsId);
			$this->news_class = new News_template($newsId);
		}
		else
		{
			// construction de l'objet News_display
			$this->news_class = new News_display($this->newsDisplayNumber);
		}
	}
	
	public function displayNews()
	{
		if (get_class($this->news_class) == "News_template")
		{
			$this->news_class->displayNewsTemplate();
		}
		elseif (get_class($this->news_class) == "News_display")
		{
			$this->news_class->displayNewsAccueil();
		}
		else
		{
			echo "ERREUR N° 1.103 - class News_adapter : the class ".get_class($this->news_class)." was not found";
		}
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