<?php include('Reu_Creator.class.php') ?>
<?php include('include/reu/Reu_generation.class.php') ?>

<?php
class Reu_adapter
{
	private $reu_class;


	function __construct()
	{	
		if (isset($_GET['reuid']))
			$newsId = $_GET['reuid'];
		if (isset($_POST['reu_title']) && isset($_POST['reu_content']) && isset($_POST['reu_lieu']) && isset($_POST['reu_date']) && !isset($_POST['reuedit_id']))
			{
				$reuContent = $_POST['reu_content'];
				$reuTitle = htmlspecialchars($_POST['reu_title'], ENT_QUOTES);
				$reuDate = htmlspecialchars($_POST['reu_date'], ENT_QUOTES);
				$reuLieu = htmlspecialchars($_POST['reu_lieu'], ENT_QUOTES);
				$reuLieu = implode("-", explode("/", $reuLieu));
				$this->news_class = new Reu_creator($reuContent, $reuTitle, $reuDate, $reuLieu);
			}
		

	}

}