<?php

session_start();

		$mysqli = new mysqli("localhost", "root", "", "team_events");
		$mysqli -> set_charset("utf8");

		$resultat = $mysqli -> prepare("INSERT INTO reserver VALUES (?,?,?,?,?,?)");
		$resultat->bind_param('iissss', $i1, $i2, $i3, $i4, $i5, $i6);





		$i1 = $_POST['id_s'];	
		$i2 = $_SESSION['id'];
		$i3 = $_POST['nbr_personnes'];
		$i4 = $_POST['date_resa'];		
		$i5 = $_POST['tarifs'];
		$i6 = 'NULL';
		
	


		$resultat->execute();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title> Confirmation </title>
		<link rel="stylesheet" type="text/css" href="resaconf.css" />
	</head>
	
	<body>
	
	<h1> Réservation confirmée </h1>
	<h2> A bientôt </h2>
	
	 
	
    </body>
	
</html>