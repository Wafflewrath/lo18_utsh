<?php include('header.php') ?>
	<div class="content row">
		<ol class="breadcrumb">
		  <li><a href="index.php">Accueil</a></li>
		  <li class="active">actualités</li>
		</ol>

		<div class="tuile_container col-lg-8">
			<div class="lineHeader">
				<h2>Actualités</h2>
			</div>
			<br />
			<?php 
				$news = new News_adapter();
				$news->displayNews();
			?>
			<!-- <div class="news_actualite" onclick="window.location.href='a_news_template.php';"> 
				<div class="news_title">
					Compte rendu de réunion
				</div>
				<div class="news_date">
					23/04/2014 14h15
				</div>
				<div class="news_resume">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.
				</div>
			</div>
			
			<br />
			<div class="news_actualite"> 
				<div class="news_title">
					Compte rendu de réunion
				</div>
				<div class="news_date">
					23/04/2014 14h15
				</div>
				<div class="news_resume">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.
				</div>
			</div>

			<br />
			<div class="news_actualite"> 
				<div class="news_title">
					Compte rendu de réunion
				</div>
				<div class="news_date">
					23/04/2014 14h15
				</div>
				<div class="news_resume">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum nulla nisl, non mattis magna commodo vel. Maecenas a enim nec ante tincidunt convallis non vitae velit. Phasellus faucibus, lorem id accumsan facilisis, lectus lectus accumsan sapien, ut dapibus nunc risus id tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.
				</div>
			</div> -->
			
		</div>
		
		<div class="col-lg-4 grptuile">
			<div class="tuile tuiletitle">Connexion</div>
			<div class="tuile">
				<div class="tuiletitle">--Vidéo--</div>
			</div>
			<div class="tuile">
				<div class="tuiletitle">Les équipes</div>
				<p>Team one</p>
				<p>Team two</p>
				<p>Team three</p>
				<p>Team four</p>
			</div>
			<div class="tuile tuiletitle">La charte du GIS</div>
			<div class="tuile tuiletitle">L'organigramme</div>
			<div class="tuile tuiletitle">Conseil scientifique</div>
			
		</div>
		
	</div>	

<?php include('footer.php') ?>