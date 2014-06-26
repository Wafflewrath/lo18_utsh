<?php include('Reu_Creator.class.php') ?>
<?php include('Reu_destructor.class.php') ?>
<?php include('Reu_editor.class.php') ?>



<?php
class Reu_adapter
{

	function __construct()
	{	
		if (isset($_GET['reuid']))
			$reuId = $_GET['reuid'];
		if (isset($_POST['reu_title']) && isset($_POST['reu_content']) && isset($_POST['reu_lieu']) && isset($_POST['reu_date']) && !isset($_POST['reuedit_id']))
			{
				$reuContent = $_POST['reu_content'];
				$reuTitle = htmlspecialchars($_POST['reu_title'], ENT_QUOTES);
				$reuDate = htmlspecialchars($_POST['reu_date'], ENT_QUOTES);
				$reuLieu = htmlspecialchars($_POST['reu_lieu'], ENT_QUOTES);
				$reuLieu = implode("-", explode("/", $reuLieu));
				$this->news_class = new Reu_creator($reuContent, $reuTitle, $reuDate, $reuLieu);
			}
		if (isset($_GET['reuedit'])) {
			$this->displayEditForm($_GET['reuedit']);
		}
		if (isset($_GET['reudelete'])) {
			$delete = new Reu_destructor($_GET['reudelete']);
		}
		if (isset($_POST['reuedit_id'])) {
			$reuContent = $_POST['reu_content'];
			$reuTitle = htmlspecialchars($_POST['reu_title'], ENT_QUOTES);
			$reuDate = htmlspecialchars($_POST['reu_date'], ENT_QUOTES);
			$reuLieu = htmlspecialchars($_POST['reu_lieu'], ENT_QUOTES);
			$reuLieu = implode("-", explode("/", $reuLieu));
			$delete = new Reu_editor($reuDate, $reuTitle, $reuContent, $reuLieu, $_POST['reuedit_id']);
		}
		

	}

	function displayEditForm($reuId) {
				$DB_temp = new Database;

		$query = "SELECT * FROM calendrier WHERE id = ". $reuId.";";
		
		$raw_data = $DB_temp->select($query);
		if ($raw_data !== false)
		{
			$id = $raw_data[0]['id'];
			$nomreunion = $raw_data[0]['nomreunion'];
			$date = $raw_data[0]['date'];
			$lieu = $raw_data[0]['lieu'];
			$contenu = $raw_data[0]['contenu'];
		}


		echo '<div class="tuile_container col-lg-12">
								<div class="lineHeader">
									<h2>Modifier un évenement</h2>
								</div>
								<br />
								<div class="news_actualite"> 
									<form action="edit_reu.php" method="post">
										<div class="news_title form">
											<input type="text" value="'. $nomreunion .'" placeholder="Entrez votre Titre" name="reu_title">
										</div>
										<div class="news_resume form">
											<input type="text" value="'. $lieu .'" placeholder="Entrez un lieu" name="reu_lieu">
										</div>
										<div class="news_resume form">
											<textarea id="reu_content" name="reu_content" rows="13" cols="150" placeholder="Contenu de l\'évenement">'. $contenu .'</textarea>
										</div>
										<input type="hidden" value="'.$id.'" name="reuedit_id">
										<div class="news_resume form">
											<input type="date" placeholder="Entrez la date" value="'. $date .'" name="reu_date">
										</div>
										<input type="submit" value="Editer la réunion">
									</form>
								</div>
								<br/>
						</div>
						<script type="text/javascript">CKEDITOR.replace( \'reu_content\' );</script>';
	}

}