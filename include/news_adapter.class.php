<?php include('news/news_display.class.php'); ?>
<?php include('news/news_template.class.php'); ?>
<?php include('news/news_creator.class.php'); ?>
<?php include('news/news_destructor.class.php'); ?>
<?php include('news/news_editor.class.php'); ?>

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
		elseif (isset($_POST['news_title']) && isset($_POST['news_content']) && isset($_POST['news_resume']) && !isset($_POST['newsedit_id']))
		{
			$ress_id = null;
			if (isset($_POST['ressource_link']) && $_POST['ressource_link'] != 0)
			{
				$ress_id = $_POST['ressource_link'];
			}
			
			for ($c = 1; $c < 100; $c++)
			{
				if (isset($_POST['ressource_link'.$c]) && $_POST['ressource_link'.$c] != 0)
				{
					$ress_id = $ress_id . "-" . $_POST['ressource_link'.$c];
				}
				else
				{
					$c = 100;
				}
			}
			
			$newsContent = htmlspecialchars($_POST['news_content'], ENT_QUOTES);
			$newsTitle = htmlspecialchars($_POST['news_title'], ENT_QUOTES);
			$newsResume = htmlspecialchars($_POST['news_resume'], ENT_QUOTES);
			$this->news_class = new News_creator($newsTitle, $newsContent, $newsResume, $ress_id);
		}
		elseif (isset($_POST['news_title']) && isset($_POST['news_content']) && isset($_POST['news_resume']) && isset($_POST['newsedit_id']))
		{
			$ress_id = null;
			if (isset($_POST['ressource_link']) && $_POST['ressource_link'] != 0)
			{
				$ress_id = $_POST['ressource_link'];
			}
			
			for ($c = 1; $c < 100; $c++)
			{
				if (isset($_POST['ressource_link'.$c]) && $_POST['ressource_link'.$c] != 0)
				{
					$ress_id = $ress_id . "-" . $_POST['ressource_link'.$c];
				}
				else
				{
					$c = 100;
				}
			}
			
			$newsContent = htmlspecialchars($_POST['news_content'], ENT_QUOTES);
			$newsTitle = htmlspecialchars($_POST['news_title'], ENT_QUOTES);
			$newsResume = htmlspecialchars($_POST['news_resume'], ENT_QUOTES);
			$newsId = intval($_POST['newsedit_id']);
			$this->news_class = new News_editor($newsTitle, $newsContent, $newsResume, $newsId, $ress_id);
		}
		elseif (isset($_GET['newsedit']))
		{
			$newsId = intval($_GET['newsedit']);
			$this->news_class = new News_template($newsId);
			$this->news_class->displayEditForm();
		}
		elseif (isset($_GET['newsdelete']))
		{
			$newsId = intval($_GET['newsdelete']);
			$this->news_class = new News_destructor($newsId);
		}
		else
		{
			// construction de l'objet News_display
			if (isset($_GET['newsPage'])) {
				$newsPage = intval($_GET['newsPage']);
			}
			else {
				$newsPage = 1;
			}
			if (preg_match('/\/lo18_utsh\/news.php.*/', $_SERVER['REQUEST_URI'])) {
				$this->newsDisplayNumber = 6;
			}
			$this->news_class = new News_display($this->newsDisplayNumber, $newsPage);
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