<!DOCTYPE html>
<html lang="fr">
	<!-- Head -->
	<?php include("head.php"); ?>
	
	<body id="index">
	
	<div class="container" >
		<!-- Logo AS+ -->
		<a href="index.php">
			<img src="images/as_ing.png">
		</a>
		<div id="container">
			<h1>Bureau d'études techniques tous corps d'état</h1>
			<header>
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="index">Accueil</a></li>	
					<li role="presentation"><a href="presentation">Qui sommes nous ?</a></li>						
					<li role="presentation"><a href="realisations">Nos réalisations</a></li>	
					<li role="presentation"><a href="contact">Nous contacter</a></li>					
				</ul>
			</header>
			<br>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<img src="images/1.jpeg" style="width:100%;">
				  </div>

				  <div class="item">
					<img src="images/2.jpeg" style="width:100%;">
				  </div>
				
				  <div class="item">
					<img src="images/3.jpeg" style="width:100%;">
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		
		<br>
	
		
		<!-- Liste déroulante -->
		<div id="form1">
			<div class="form-inline">
			<br>
			<form>
			  <label for="offres">Nos offres:</label>
			  <select class="form-control" id="offresIndex" name="offresIndex">
			  	<option selected="selected">Par ici que sa commence!</option>
				<option value="plan">Plans</option>
				<option value="diagnostics">Diagnostics</option>
				<option value="quantitatifs">Quantitatifs</option>
				<option value="metres">Métrès</option>
				<option value="construction">Construction</option>
				<option value="renovation">Rénovation</option>
				<option value="projet_hic">Projet d'habitation individuelle et collective</option>
			  </select>
			 </form>
			</div>	
			<br>
		</div>	
	</div>
	
	<!-- Footer -->
	<?php include("footer.php"); ?>
	</body>
	<script type="text/javascript" src="js/data_js.js"></script>
</html>