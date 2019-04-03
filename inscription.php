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

		if(isset($_POST['forminscription'])) {
 			$pseudo = htmlspecialchars($_POST['pseudo']);
   			$mail = htmlspecialchars($_POST['mail']);
  			$mail2 = htmlspecialchars($_POST['mail2']);
   			$mdp = sha1($_POST['mdp']);
   			$mdp2 = sha1($_POST['mdp2']);
   		if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      		$pseudolength = strlen($pseudo);
      		if($pseudolength <= 255) {
         		if($mail == $mail2) {
            		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
						$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();
               		if($mailexist == 0) {
                  		if($mdp == $mdp2) {
                     		$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                     		$insertmbr->execute(array($pseudo, $mail, $mdp));
                     		$erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  		}else {
                     		$erreur = "Vos mots de passes ne correspondent pas !";
                  	}
               		} else {
                  		$erreur = "Adresse mail déjà utilisée !";
               			}
            		} else {
               		$erreur = "Votre adresse mail n'est pas valide !";
            		}
         		} else {
            		$erreur = "Vos adresses mail ne correspondent pas !";
         		}
      		} else {
         		$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      		}
   		} else {
      		$erreur = "Tous les champs doivent être complétés !";
   		}
		}
	
		?>

<div align="center">
         <h2>Inscription</h2>
		 <a title="Connexion" href="connexion.php"><h4>Connexion ici !</h4></a>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
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
