<?php
// INTERFACE ADMIN ===> SIMPLE A UTILISER  // RESSOURCES => LIEN POINTABLE // CONNEXION/DECO => changer texte des tuiles quand connecté
// message d'attente inscription : votre demande sera examinée lors de la prochaine réunion du bureau de direction du GIS
// INTERFACE D'ADMIN PROJET ==> rajout page projet  (a voir pour l'instant)
// RESOURCE ==> lien de publication de certaines ressources => passage d'un md5 généré aléatoirement par ressource en parametre
// PROJET ==> page par projet  avec nom projet, texte, ressoucre, url...
// status des projets (en cours, terminé, en attente validation)
// calendrier grisé
class News_display
{
	public $id = array();
	public $title = array();
	public $contenu = array();
	public $contenu_resume = array();
	public $datecreation = array();
	
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
		$query = "SELECT id, titre, contenu, contenuresume, datecreation FROM news WHERE etat = " . $this->newsEtat_valide. " ORDER BY id DESC LIMIT " . $initialNumber . ", " . $finalNumber . ";";

		$raw_data = $DB_temp->select($query);

		if ($raw_data !== false)
		{
			$this->nombre_news_affiche = count($raw_data);
			for ($i = 0; $i < count($raw_data); $i++)
			{
				$this->id[$i] = $raw_data[$i]['id'];
				$this->title[$i] = $raw_data[$i]['titre'];
				$this->contenu[$i] = $raw_data[$i]['contenu'];
				$this->contenu_resume[$i] = $raw_data[$i]['contenuresume'];
				$this->datecreation[$i] = $raw_data[$i]['datecreation'];
			}
		}
		else
		{
			$this->title[0] = "Aucune News";
			$this->contenu[0] = "Il n'y a actuellement aucune news !";
			$this->contenu_resume[0] = "Il n'y a actuellement aucune news !";
			$this->datecreation[0] = "";
		}

		$queryCount = "SELECT count(*) as counter FROM news;";
		$raw_data = $DB_temp->select($queryCount);
		
		if ($raw_data !== false)
		{
			$this->nombreTotal = $raw_data[0]['counter'];
			$this->pageTotal = $this->nombreTotal / $displayedNumber;
		}
	}
	
	private function printTitle($index)
	{
		echo "<div class='news_title'>" . $this->title[$index] . "</div>";
	}

	private function printDate($index)
	{
		echo "<div class='news_date'>Créé le : " . $this->datecreation[$index] . "</div>";
	}

	private function printContenuResume($index)
	{
		echo "<div class='news_resume'>" . $this->contenu_resume[$index] . "</div>";
		echo "<a href='a_news_template.php?newsid=".$this->id[$index]."' class='en_savoir_plus'>Lire la suite</a>";
		
		global $user;
		$editCommand = "echo \" - <a href='edit_form.php?newsedit=".$this->id[$index]."' class='en_savoir_plus'>Editer la news</a>\";";
		// $editCommand = "echo \" - <img src='images/edit.jpg' onclick='window.location.href=\"edit_form.php?newsedit=".$this->id[$index]."\"' class='en_savoir_plus'>Editer la news</a>\";";
		$editCommand .= " echo \" - <a href='edit_form.php?newsdelete=".$this->id[$index]."' class='en_savoir_plus'>Supprimer la News</a>\";";
		$Privilege_manager = new Privilege($user->data['user_id']);
		$Privilege_manager->execif_Admin($editCommand);
	}
	
	public function displayNewsAccueil()
	{
		for ($news_index = 0; $news_index < $this->nombre_news_affiche; $news_index ++)
		{
			echo '<div class="a_news" onclick="window.location.href=\'a_news_template.php?newsid='.$this->id[$news_index].'\'">';
				$this->printTitle($news_index);
				$this->printDate($news_index);
				$this->printContenuResume($news_index);
			echo '</div>';
			
		}
		if (preg_match('/\/lo18_utsh\/news.php.*/', $_SERVER['REQUEST_URI']) && $this->nombreTotal > $this->displayedNumber) {
				echo '<ul class="pagination">';
				if ($this->actualPage == 1) {
					echo '<li class="disabled"><a href="#">&laquo;</a></li>';
					echo '<li class="active"><a href="news.php?newsPage=1">1</a></li>';
					echo '<li><a href="news.php?newsPage=2">2</a></li>';
					if ($this->pageTotal > 3) {
						echo '<li><a href="news.php?newsPage=3">3</a></li>';

					}
					echo '<li><a href="news.php?newsPage=2">&raquo;</a></li>';
					

				}
				else {
					$precedent = $this->actualPage -1;
					$future = $this->actualPage + 1;
					if ($future > $this->pageTotal) {
						echo '<li><a href="news.php?newsPage=' . $precedent . '">&laquo;</a></li>';
						echo '<li><a href="news.php?newsPage=' . $precedent . '">' . $precedent . '</a></li>';
						echo '<li class="active"><a href="news.php?newsPage=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
						echo '<li class="disabled"><a href="#">&raquo;</a></li>';
					}
					else {
						echo '<li><a href="news.php?newsPage=' . $precedent . '">&laquo;</a></li>';
						echo '<li><a href="news.php?newsPage=' . $precedent . '">' . $precedent . '</a></li>';
						echo '<li class="active"><a href="news.php?newsPage=' . $this->actualPage . '">'.$this->actualPage.'</a></li>';
						echo '<li><a href="news.php?newsPage=' . $future . '">' . $future . '</a></li>';
						echo '<li><a href="news.php?newsPage=' . $future. '">&raquo;</a></li>';
					}
				}
				
				echo '</ul>';
			}
	}
}
?>