<?php 
				include_once("function.php");
							?>
<html>
    <head>

            <title>Spotizer</title>
			<link rel="stylesheet" type="text/css" href="CSS.css" />
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
		<div class="content">

		<?php 

		$bdd = getDataBase();
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=base', 'root', '');

		session_start();


         if(isset($_POST['formconnexion'])) {
            $mailconnect = htmlspecialchars($_POST['mailconnect']);
            $mdpconnect = sha1($_POST['mdpconnect']);
         if(!empty($mailconnect) AND !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
               $userinfo = $requser->fetch();
               $_SESSION['id'] = $userinfo['id'];
               $_SESSION['pseudo'] = $userinfo['pseudo'];
               $_SESSION['mail'] = $userinfo['mail'];
               header("Location: bibliotheque.php?id=".$_SESSION['id']);
            } else {
               $erreur = "Mauvais mail ou mot de passe !";
            }
         } else {
            $erreur = "Tous les champs doivent être complétés !";
         }
         }
		?>

<div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            
         <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />

         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="grey">'.$erreur."</font>";
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
