<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <title>Informations pour reserver</title>
  <link rel="stylesheet" href="inscription_login.css">
	
</head>

<body>




<?php 
		//$mysqli = new mysqli("localhost", "root", "", "team_events");
		//$mysqli -> set_charset("utf8");
		//$requete = "SELECT * FROM salle";
		//$resultat = $mysqli -> query($requete);
		//while ($ligne = $resultat -> fetch_assoc()) {
			//echo $ligne['prix_semi_reu_demi'] .' '.$ligne['prix_semi_reu_compl'] . ' '. $ligne['prix_semi_resid'] . ' ' . $ligne['prix_dejeuner_groupe'] . ' ';
			//echo $ligne['prix_diner_groupe'] . ' ' . $ligne['prix_cocktail'] .' '.$ligne['prix_soiree'] .''.$ligne['prix_loc_seule'] .'<br>';
		//}
		//$mysqli->close();
?>



<?php

$prix_semi_reu_demi ='200';
$prix_semi_reu_compl ='400';
$prix_semi_resid ='100';
$prix_dejeuner_groupe ='15';
$prix_diner_groupe ='25';
$prix_cocktail ='10';
$prix_soiree ='20';
$prix_loc_seule ='70';

?>

<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup">Complétez vos informations</h2> 
		<form name="inscription" method="post" action="resa.php">
		<div class="form-holder">
			<input type="number" class="input" name="nbr_personnes" min="1" max="100" step="2" placeholder= "Nombre de personnes"/>
			<input type="date" class="input" name="date_resa"  min="2023-02-02" max="2092-08-31" placeholder= "Date"/> 
			<input type="hidden" name="id_s" value="<?php echo $_GET['id_s'];?>"/>
			<select name="tarifs">
    <option value="">Choisisez votre prestation</option>
    <option value="<?php echo $prix_semi_reu_demi;?>"/>Seminaire réunion demi journée - 200 € </option>
    <option value="<?php echo $prix_semi_reu_compl;?>"/>Seminaire réunion journée  complète - 400 €</option>
    <option value="<?php echo $prix_semi_resid;?>"/>Séminaire résidentiel 100€</option>
    <option value="<?php echo $prix_dejeuner_groupe;?>"/>Déjeuner - 15€/pers</option>
    <option value="<?php echo $prix_diner_groupe;?>"/>Diner - 25€/pers </option>
    <option value="<?php echo $prix_cocktail;?>"/>Cocktail - 10€/pers</option>
    <option value="<?php echo $prix_soiree;?>"/>Soirée - 20€/pers</option>
    <option value="<?php echo $prix_loc_seule;?>"/>Location seule -70€</option>
</select>

    




		</div>
		

		<button class="submit-btn" type="submit">Confirmer</button>
		
		
	</div>


	

</body>
</html>
