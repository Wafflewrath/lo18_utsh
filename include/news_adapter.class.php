<?php include('news/news_display.class.php'); ?>
<?php include('news/news_template.class.php'); ?>
<?php include('news/news_creator.class.php'); ?>

<?php
class News_adapter
{
	private $news_class;
	private $class_type;
	
	private $newsEtat_valide = 1;
	private $newsDisplayNumber = 3;

	function __construct()
	{	
		if (isset($_GET['newsid']))
			$newsId = $_GET['newsid'];
		if ($newsId != "")
		{
			// construction de l'objet News_template
			$newsId = intval($newsId);
			$this->news_class = new News_template($newsId);
		}
		elseif (isset($_POST['news_title']) && isset($_POST['news_content']) && isset($_POST['news_resume']))
		{
			$newsContent = htmlspecialchars($_POST['news_content'], ENT_QUOTES);
			$newsTitle = htmlspecialchars($_POST['news_title'], ENT_QUOTES);
			$newsResume = htmlspecialchars($_POST['news_resume'], ENT_QUOTES);
			$this->news_class = new News_creator($newsTitle, $newsContent, $newsResume);
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
}
?>