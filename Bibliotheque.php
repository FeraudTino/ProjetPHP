<html>
    <head>

			<?php 
				include_once("function.php");
							?>
            <title>Spotizer</title>
			<link rel="stylesheet" type="text/css" href="css.css" />
			<link rel="icon" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/626071/line-logo.svg" />

    </head>

    <body>
<div class="wrapper">
	<div class="header">
		<ul class="menu">
				<a title="Accueil" href="Index.php"><li>Accueil</li></a>
			<a title="Rechercher" href="rechercher.php"><li>Recherche</li></a>
			<a title="Bibliothèque" href="Bibliotheque.php"><li>Bibliothèque</li></a>
			<a title="inscription" href="inscription.php"><li>Inscription & Connexion</li></a>
		</ul><div class="titre1">
				</div>
	
				
			<div class="casebilio">
				<h3>Tout nos Albums</h3>
				<h5>Veuillez vous connecter afin d'accéder aux albums</h5>

					<?php
						

						if(isset($_GET['id']) AND $_GET['id'] > 0) {

						$bdd = getDataBase();
						$ID = 0;
						$requette = $bdd->query("SELECT * FROM album");
						$ID = $bdd->query("SELECT nomAlb FROM album");
						$donnee = $requette->fetchAll(PDO::FETCH_OBJ);
						if($donnee){
							foreach($donnee as $album){

								?>
								<a href="album.php?id=<?= $album->idAlb ?>"> <h4> <?= $album->nomAlb ?> </h4> </a><br/>
								<?php
							} 
					?>	
				<?php
					} }
					?>
						
						
				
				
				
			
			<h4>Vous êtes arrivé à la fin de notre bibliotèque musicale, veuillez attendre d'autre musique arriverons plutard.</h4>
		</div>
        <a title="Acceuil" href="Index.php"><img class="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/626071/line-logo.svg"></a>
        <a title="Acceuil" href="Index.php"><h1 class="logo2">Spotizer</h1> </a>
		<img class="curve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/626071/bottom-curve_copy.svg">
		<img class="waves" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/626071/waves_copy.svg">
	</div>
</div>
<div class="background"></div>
    </body>

</html>
<!--

<div class="buttons">
        <a class="button case1" href="#">Gautou</a>
        <a class="button case2" href="#">Titi</a>
    </div>

-->
