<?php include('projets/Projects_display.class.php'); ?>
<?php include('projets/Projects_template.class.php'); ?>

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