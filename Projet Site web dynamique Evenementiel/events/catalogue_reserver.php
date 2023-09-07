<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<title> Prestations </title>
	<link rel="stylesheet"href="reserver.css">
</head>

<body>




<div class = "utilisateur">

<?php

		session_start ();
 echo $_SESSION['nom_societe'];
 echo $_SESSION['id_client'];
?>
</div>


<div class = "recherche">
<form method = "POST" action="catalogue_reserver.php">
    <input type = "search" class = "taper" name = "recherche" placeholder = "Que recherchez-vous ?">
	<input type = "submit" class = "rechercher" name = "rechercher" value = "Go">

</form>
</div>


<section class="afficher_evenements">

<?php
$mysqli = new mysqli("localhost", "root", "", "team_events");
$mysqli -> set_charset("utf8");

	
if( isset($_POST['recherche'])){
	$req="SELECT * FROM salle, client WHERE nom_salle LIKE '%".$_POST['recherche']."%'";
	$stmt = $mysqli -> prepare ($req);
}
else{
	$stmt = $mysqli -> prepare ("SELECT * FROM salle");
}
$stmt -> execute();
$res = $stmt -> get_result();


foreach ($res as $row){
	echo "
	<div>

<form action = "devis.php" method = 'POST'> 
	<h1>".$row['nom_salle']."</h1>
	<h8>Lieu : ".$row['lieu_salle']."</h8></br></br>
	<h8>Contact : ".$row['mail_contact_salle']."</h8></br></br>
	<p>".$row['description_salle']."<br/></br></br>
</form>
	
</div>";
}
?>

</section>


</body>
</html>


