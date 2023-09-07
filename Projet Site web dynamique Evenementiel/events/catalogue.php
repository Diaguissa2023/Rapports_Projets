<html>
<head>
		<meta charset="UTF-8" />
		<title> Prestations </title>
		<link rel="stylesheet" type="text/css" href="e_liste.css" />
	</head>
<body>


<?php
try
{
	
$db = mysqli_connect ("localhost", "root", "", "team_events");
}
catch(Exception $e)
{
	
        die('Erreur : '.$e->getMessage());
}

$requete = "SELECT * FROM salle";
$result = $db->query($requete);

if (!$result) {
	echo "Erreur";
}
?>	

<table>
	
	<tr>
	    <th>Type</th>
		<th>Description</th>
		<th>Lieu</th>
		<th>Contact</th>
		<th>Photo</th>
		
	</tr>	
<?php

while($row = $result ->fetch_assoc()) {
	echo "<tr><td>".$row['nom_salle']."</td><td>".$row['description_salle']."</td><td>".$row['lieu_salle']."</td><td>".$row['mail_contact_salle']."</td><td>".$row['photo']."</td><td>";
}	
?>		

	</table>
	


</body>

</html>




