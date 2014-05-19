<?php include('projets/Projects_display.class.php'); ?>
<?php include('projets/Projects_template.class.php'); ?>
<?php include('projets/Project_creator.class.php'); ?>
<?php include('projets/Project_editor.class.php'); ?>

<?php
class Project_adapter
{
	public $project_class;
	private $class_type;
	
	private $newsEtat_valide = 1;
	private $newsDisplayNumber = 3;

	function __construct()
	{	
		if (isset($_GET['projectid']))
			$projectId = $_GET['projectid'];
		if ($projectId != "")
		{
			// construction de l'objet News_template
			$projectId = intval($projectId);
			$this->project_class = new Projects_template($projectId);
		}
		elseif (isset($_POST['project_title']) && isset($_POST['project_resume']) && isset($_POST['project_title_complet']) && !isset($_POST['projectedit_id']))
		{
			$project_resume = htmlspecialchars($_POST['project_resume'], ENT_QUOTES);
			$project_title_complet = htmlspecialchars($_POST['project_title_complet'], ENT_QUOTES);
			$projectTitle = htmlspecialchars($_POST['project_title'], ENT_QUOTES);
			$projectVisibilite = intval($_POST['projet_visibilite']);
			if(isset($_POST['project_url'])) {
				$projectUrl = htmlspecialchars($_POST['project_url'], ENT_QUOTES);
				
			}
			else {
				$projectUrl = "";
				
			}
			$this->news_class = new Project_creator($projectTitle, $project_title_complet, $project_resume, $projectUrl, $projectVisibilite);
			
		}
		elseif (isset($_POST['project_title']) && isset($_POST['project_resume']) && isset($_POST['project_title_complet']) && isset($_POST['projectedit_id']))
		{
			$project_resume = htmlspecialchars($_POST['project_resume'], ENT_QUOTES);
			$project_title_complet = htmlspecialchars($_POST['project_title_complet'], ENT_QUOTES);
			$projectTitle = htmlspecialchars($_POST['project_title'], ENT_QUOTES);
			$projectVisibilite = intval($_POST['projet_visibilite']);
			$projectId = intval($_POST['projectedit_id']);
			if(isset($_POST['project_url'])) {
				$projectUrl = htmlspecialchars($_POST['project_url'], ENT_QUOTES);
			}
			else {
				$project_url = "";
			}
			$this->news_class = new Project_editor($projectTitle, $project_title_complet, $project_resume, $projectUrl, $projectVisibilite);

		}
		else
		{
			// construction de l'objet News_display
			$this->project_class = new Projects_display();
		}
	}
	
	public function displayProjets()
	{
		if (get_class($this->project_class) == "Projects_template")
		{
			$this->project_class->displayProjectTemplate();
		}
		elseif (get_class($this->project_class) == "Projects_display")
		{
			$this->project_class->displayProjects();
		}
		else
		{
			echo "ERREUR N° 1.103 - class News_adapter : the class ".get_class($this->project_class)." was not found";
		}
	}

	public function getProjectName() {
		if (get_class($this->project_class) == "Projects_template")
		{
			$this->project_class->displayProjectName();
		}
	}
}
?>