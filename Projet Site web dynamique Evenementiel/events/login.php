<html>
<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="u_liste.css" />
	</head>
<body>


<?php

	
$mysqli = new mysqli("localhost", "root", "", "team_events");
$mysqli -> set_charset("utf8");

		
$stmt = $mysqli -> prepare ("SELECT id_client, nom_societe, mdp FROM client WHERE nom_societe = ?" );

$stmt -> execute ([$_POST['nom']]);
$res = $stmt -> get_result();

foreach ($res as $row){
	if ($row['mdp'] == $_POST['mdp_client'])
	{
		echo "bon";
		session_start ();
		$_SESSION['nom'] = $row['nom_societe'];
		$_SESSION['id'] = $row['id_client'];
		header('Location: catalogue_reserver.php');
		
	}
	else
	{
		echo "Erreur dans le pseudo ou le mot de passe";
	}
}	


?>





</body>
</html>