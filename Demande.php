<!DOCTYPE html>
<html lang="fr">
	<!-- Head -->
	<?php include("head.php"); ?>
	
	<body id="demande">
	
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
			
			<div id="formDemandeDevis">
				<form method="post" id="formDemande" class="form-horizontal" enctype="multipart/form-data">
				<h2>Nouvelle demande de travaux</h2>
					<div class="form-group">
						<label for="nom"class="col-sm-2 control-label">Nom</label>
						<div class="col-sm-5">
							<input type="text" name="nom" id="nom" placeholder="" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="prenom"class="col-sm-2 control-label">Prénom</label>
						<div class="col-sm-5">
							<input type="text" name="prenom" id="prenom" placeholder="" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="prenom"class="col-sm-2 control-label">Email</label>
						<div class="col-sm-5">
							<input type="email" name="email" id="email" placeholder="" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="tel"class="col-sm-2 control-label">Téléphone</label>
						<div class="col-sm-5">
							<input type="text" name="tel" id="tel" placeholder="" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="heure"class="col-sm-2 control-label">Heure d'appel souhaitez</label>
						<div class="col-sm-5">
							<select name="heure" id="heure" class="form-control" required>
								<option value="">Choissisez une tranche horaire</option>
								<option value="9h-12h">9h-12h</option>
								<option value="14h-17h">14h-17h</option>
								<option value="17h-19h">17h-19h</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="commune"class="col-sm-2 control-label">Commune</label>
						<div class="col-sm-5">
							<select name="commune" id="commune" class="form-control" required>
								<option value="">Choissisez une commune</option>
							</select>							
						</div>
					</div>
					
					<div class="form-group">
						<label for="checkbox"class="col-sm-2 control-label">Quel service souhaitez-vous ?</label>
    						<div class="checkbox" id="checkboxid">
      							<label class="checkbox-inline"><input type="checkbox" value="plan" name="service[]" id="plan">Plans</label>    						
      							<label class="checkbox-inline"><input type="checkbox" value="diagnostics" name="service[]" id="diagnostic">Diagnostics</label>
      							<label class="checkbox-inline"><input type="checkbox" value="quantitatifs" name="service[]" id="quantitatif">Quantitatifs</label>
      							<label class="checkbox-inline"><input type="checkbox" value="metres" name="service[]" id="metres">Métrès</label>
    						</div>
    						<div class="checkbox" id="checkboxid">
    							<label class="checkbox-inline"><input type="checkbox" value="construction" name="service[]" id="construction">Construction</label>
      							<label class="checkbox-inline"><input type="checkbox" value="renovation" name="service[]" id="renovation">Rénovation</label>
      							<label class="checkbox-inline"><input type="checkbox" value="projet_hic" name="service[]" id="phic">Projet d'habitation individuelle et collective</label>
      							<label class="checkbox-inline"><input type="checkbox" value="autre" name="service[]" id="autre">Autre</label>
    						</div>
    						
					</div>
				
				
					<div class="form-group">
						<label for="type_projet"class="col-sm-2 control-label">Ce projet concerne une maison ou un commerce/bureau ?</label>
						<div class="col-sm-5">
							<select name="typeProjet" id="typeProjet" class="form-control" required>
								<option value="">Choissisez un type</option>
								<option value="maison">Maison</option>
								<option value="commerce">Commerce</option>
								<option value="bureau">Bureau</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="delai"class="col-sm-2 control-label">Délai du besoin</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="2" cols="70" name="delai" id="delai" class="form-control" required></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="autreChoses" class="col-sm-2 control-label">Autre chose à ajouter</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="5" cols="70" name="autreChose" id="autreChose" class="form-control"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="autreChoses" class="col-sm-2 control-label">Ajouter des photos !</label>
						<div class="col-sm-5">
							<input type="file" id="userImages" name="userImages[]"  accept=".png, .jpg, .jpeg" multiple/>
							 <div class="imageSelectionner">
    							<p>Aucun fichier sélectionné pour le moment</p>
  							</div>
						</div>
					</div>
					<button type="button" id="btnDemande">Envoyer votre demande !</button>
					<div id = "message" ></div> 
				</form>
			</div>
		</div>	
	</div>
	
    <!-- Footer -->
	<?php include("footer.php"); ?>
	<script async src="https://vicopo.selfbuild.fr/code/971?callback=getVille" type="text/javascript"></script>
	<script type="text/javascript" src="js/data_js.js"></script>
	</body>
</html>