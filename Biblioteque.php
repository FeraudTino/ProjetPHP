<html>
    <head>

			<?php 
				include_once("function.php");
							?>
            <title>Spotizer</title>
			<link rel="stylesheet" type="text/css" href="Style.css" />
			<link rel="icon" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/626071/line-logo.svg" />

    </head>

    <body>
<div class="wrapper">
	<div class="header">
		<ul class="menu">
				<a title="Accueil" href="Index.php"><li>Accueil</li></a>
			<a title="Rechercher" href="rechercher.php"><li>Recherche</li></a>
			<a title="Bibliotèque" href="Biblioteque.php"><li>Bibliotèque</li></a>
			<a title="Compte" href="compte.php"><li>Compte</li></a>
		</ul><div class="titre1">
				</div>
		<div class="content">
				
			<div class="casebilio">
				<h3>Toute nos Albums</h3>
<!--
				<table>
				<tr>
					<td>Album</td>
					<td>Année de sortie</td>
					<td>Nombre de Titre</td>
				</tr>

				-->
					<?php
						

						$bdd = getDataBase();

						$requette = $bdd->query("SELECT * FROM album");

						while($donnee = $requette->fetch()){
					?>	
					
					<h4><?php echo $donnee['nomAlb']; ?>
					<?php echo $donnee['dateParution']; ?>
					<?php echo $donnee['nbTitre']; ?></h4> <br>


				
					<?php 
						}

					$requette->closeCursor();

					?>

				</table> <br>
						
						
				
				
				
			</div>
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
