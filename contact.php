<!DOCTYPE html>
<html lang="fr">
	<!-- Head -->
	<?php include("head.php"); ?>
	
	<body>
	
	<div class="container">
		<!-- Logo AS+ -->
		<a href="index.php">
			<img src="images/as_ing.png">
		</a>
		
		
		<div class="center-block" style="width:900px;">
			<h1>Contactez nous !</h1>
			<header>
				<ul class="nav nav-tabs">
					<li role="presentation" ><a href="index">Accueil</a></li>
					<li role="presentation"><a href="presentation">Qui sommes nous ?</a></li>						
					<li role="presentation"><a href="realisations">Nos réalisations</a></li>	
					<li role="presentation" class="active"><a href="contact">Nous contacter</a></li>					
				</ul>
			</header>
			<br>
			
			
			<div class="col-md-7">
				<div class="form-area">  
					<br style="clear:both">
					<form role="form" id="contactForm">
						<div class="form-group">
							<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="tel" name="tel" placeholder="n° tel" required
							pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" id="message" placeholder="Message" rows="7" required></textarea>                   
						</div>
						<button type="submit" class="btn btn-primary" id="bt_envoyer" name="bt_envoyer">Envoyer</button>
						<div id="msg" class="h3 text-center hidden">Méssage Reçu!</div>
					</form>
				</div>
			</div>
			<div class="col-md-5">
				<img src="images/as_ing2.png">
			</div>
		</div>
	</div>
	<br>
	<script type="text/javascript" src="js/form-scripts.js"></script>
	<!-- Footer -->
	<?php include("footer.php"); ?>
	</body>
</html>