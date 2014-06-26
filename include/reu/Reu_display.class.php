<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class Reu_display
{
	public $id = array();
	public $nomreunion = array();
	public $date = array();
	
	public $nombre_news_affiche = array();
	
	private $newsEtat_valide = 1;
	private $nombreTotal;
	private $pageTotal;
	private $actualPage;
	private $displayedNumber;

	function __construct($displayedNumber, $page)
	{
		$this->displayedNumber = $displayedNumber;
		$initialNumber = ($page - 1) * $displayedNumber;
		$finalNumber = $initialNumber + $displayedNumber;
		$this->actualPage = $page;

		$DB_temp = new Database;
		if (isset($_GET["getall"])) {
			$query = "SELECT id, date, nomreunion FROM calendrier ORDER BY date DESC LIMIT " . $initialNumber . ", " . $this->displayedNumber . ";";
		}
		else {$query = "SELECT id, date, nomreunion FROM calendrier WHERE date >= now() ORDER BY date LIMIT " . $initialNumber . ", " . $this->displayedNumber . ";";

		}
		$raw_data = $DB_temp->select($query);

		if ($raw_data !== false)
		{
			$this->nombre_news_affiche = count($raw_data);
			for ($i = 0; $i < count($raw_data); $i++)
			{
				$this->id[$i] = $raw_data[$i]['id'];
				$this->nomreunion[$i] = $raw_data[$i]['nomreunion'];
				$this->date[$i] = $raw_data[$i]['date'];
			}
		}
		else
		{
			$this->nomreunion[0] = "Aucune réunion à venir";
		}
		if (isset($_GET["getall"])) {
			$queryCount = "SELECT count(*) as counter FROM calendrier;";
		}
		else {
			$queryCount = "SELECT count(*) as counter FROM calendrier WHERE date >= now();";

		}
		$raw_data = $DB_temp->select($queryCount);
		
		if ($raw_data !== false)
		{
			$this->nombreTotal = $raw_data[0]['counter'];
			$this->pageTotal = $this->nombreTotal / $displayedNumber;
			if($this->nombreTotal / $this->displayedNumber != 0) {
				$this->pageTotal += 1;
			}
		}
	}
	
	private function printName($index)
	{
		echo "<div class='news_title'>" . $this->nomreunion[$index] . "</div>";
	}

	private function printDate($index)
	{
		echo "<div class='news_date'>Le : " . $this->date[$index] . "</div>";
	}

	private function printEdition($index)
	{
		global $user;
		$editCommand = "echo \" <a href='edit_reu.php?reuedit=".$this->id[$index]."' class='en_savoir_plus'>Editer la réunion</a>\";";
		$editCommand .= " echo \" - <a href='edit_reu.php?reudelete=".$this->id[$index]."' class='en_savoir_plus'>Supprimer la réunion</a>\";";
		$Privilege_manager = new Privilege($user->data['user_id']);
		$Privilege_manager->execif_Admin($editCommand);
	}
	
	public function displayReu()
	{
		if (isset($_GET["getall"])) {
			echo '<div><a href="reu.php" class="createnews_link">Prochaines réunions</a></div>';
		}
		else {
			echo '<div><a href="reu.php?getall=1" class="createnews_link">Toutes les réunions</a></div>';
		}
		for ($news_index = 0; $news_index < $this->nombre_news_affiche; $news_index ++)
		{
			echo '<div class="a_news" onclick="window.location.href=\'edit_reu.php?reuedit='.$this->id[$news_index].'\'">';
				$this->printName($news_index);
				$this->printDate($news_index);
				$this->printEdition($news_index);
			echo '</div>';
			
		}
		if ($this->pageTotal > 1) {
			echo '<ul class="pagination">';
			if ($this->actualPage == 1) {
				echo '<li class="disabled"><a href="#">&laquo;</a></li>';
				echo '<li class="active"><a href="reu.php?reuPage=1">1</a></li>';
				echo '<li><a href="reu.php?reuPage=2">2</a></li>';
				if ($this->pageTotal > 3) {
					echo '<li><a href="reu.php?reuPage=3">3</a></li>';

				}
				echo '<li><a href="reu.php?reuPage=2">&raquo;</a></li>';
				

			}
			else {
				$precedent = $this->actualPage -1;
				$future = $this->actualPage + 1;
				if ($future > $this->pageTotal) {
					echo '<li><a href="reu.php?reuPage=' . $precedent . '">&laquo;</a></li>';
					echo '<li><a href="reu.php?reuPage=' . $precedent . '">' . $precedent . '</a></li>';
					echo '<li class="active"><a href="reu.php?newsPage=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
					echo '<li class="disabled"><a href="#">&raquo;</a></li>';
				}
				else {
					echo '<li><a href="reu.php?reuPage=' . $precedent . '">&laquo;</a></li>';
					echo '<li><a href="reu.php?reuPage=' . $precedent . '">' . $precedent . '</a></li>';
					echo '<li class="active"><a href="reu.php?reuPage=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
					echo '<li><a href="reu.php?reuPage=' . $future . '">' . $future . '</a></li>';
					echo '<li><a href="reu.php?reuPage=' . $future. '">&raquo;</a></li>';
				}
			}
			
			echo '</ul>';
		}
		
	}
}
?>