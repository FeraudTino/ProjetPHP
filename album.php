<html>
<?php
    $id_album;

?>
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
	<div class="header1">
		<ul class="menu">
				<a title="Accueil" href="Index.php"><li>Accueil</li></a>
			<a title="Rechercher" href="rechercher.php"><li>Recherche</li></a>
			<a title="Bibliothèque" href="Bibliotheque.php"><li>Bibliothèque</li></a>
			<a title="inscription" href="inscription.php"><li>Inscription & Connexion</li></a>
		</ul><div class="titre1">
				</div>
		<div class="content">
            <div class="caseMusique">		
                <?php
                    $bdd = getDataBase();
                    if(isset($_GET['id'])){
                        $id_album=htmlspecialchars($_GET['id']);
                        if(is_numeric($id_album)){
                            if($bdd){

                                if($id_album == 1){
                                            ?><h3>Casseurs Flowteurs</h3><?php
                                    $requette = $bdd->query("SELECT * FROM titre WHERE idT>0 AND idT<=18");
						            while($donnee = $requette->fetch()){

                                            $chemin = $donnee['cheminMusique']

					                    ?>	
                                        

                                        <table>
                                            <tr>
                                                <th><?php echo $donnee['nomTitre']; ?></th>
                                            </tr>
                                            <tr>
                                                <td><audio controls="controls"><source src="<?php echo $donnee['cheminMusique'] ?>" type="audio/mp3" /></td>
                                            </tr>

                                    </table>
				                    
                                        
                                        
                                         <br>
                                         

					                    <?php 
						            }

					                $requette->closeCursor();
					
                                 }
                                 if($id_album == 2){
                                    ?><h3>Breakbot</h3><?php
                                    $requette = $bdd->query("SELECT * FROM titre WHERE idT>18 AND idT<=31");
						            while($donnee = $requette->fetch()){
					                    ?>	
					
					                    <h4><?php echo $donnee['nomTitre']; ?>
					                    <?php echo $donnee['tempsTitre']; ?></h4>
                                        <br>

					                    <?php 
						            }

					                $requette->closeCursor();
					
                                 }

                $requette = "SELECT * FROM titre WHERE idT>0 AND idT<=18";
                $prep = $bdd->prepare($requette);
                $prep->execute();
                $album = $prep->fetch(PDO::FETCH_OBJ);
                if(!$album){
                    $id_album = -1;
                }
            }
           ?>
            <a></a>
           <?php
        }
    }
    ?>
        </div>
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
