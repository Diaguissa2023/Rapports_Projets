<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="ajout_c.css" />
	</head>
	<body>
	
		
		
		<?php
		/*
		echo $_POST['nom'];
		echo "<br>";
		echo $_POST['prenom'];
		echo "<br>";
		echo $_POST['age'];
		echo "<br>";
		echo $_POST['ville'];
		echo "<br>";
		echo $_POST['codepostal'];
		echo "<br>";
		echo $_POST['email'];
		echo "<br>";
		echo $_POST['mdp'];
		echo "<br>";
		echo $_POST['remdp']; */
		
		
		$mysqli = new mysqli("localhost", "root", "", "team_events");
		$mysqli -> set_charset("utf8");
		
		$requete="INSERT INTO client VALUES(NULL,'". $_POST['nom_societe']."',' ". $_POST['nom_contact']."',' ". $_POST['mail_contact']."',' ".$_POST['numero_societe']."','". $_POST['mdp_client']."');";
  	
		
	
	    $resultat = $mysqli->query($requete);
		if ($resultat)
			echo "<p>Inscription réussie ! </p>";
		else
			echo "<p>Une erreur s'est produite, veuillez recommencer</p>";
		
	
		?>
		
		<li> <a href="http://localhost/events/login.html"> Se connecter</a></li> 
		
	</body>
</html>


