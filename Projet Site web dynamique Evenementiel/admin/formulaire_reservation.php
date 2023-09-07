<!DOCTYPE html>  
<html>  

  <head>  
        <title>Notre page événémentiel</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="../css/style9.css"> 
    </head>
    
    <body>
    
   
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Les Réservations  <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">
 
                <h5><a href="evenement.php" class="btn btn-primary-lg"><span class="glyphicon glyphicon-home"></span> Révénir sur la page d'accueil</a></h5>
   


<?php
          
		echo $_POST['id_utilisateur'];
		echo "<br>";
        echo $_POST['id_items'];
		echo "<br>";
		echo $_POST['place'];
	
		
		
		$mysqli = new mysqli("localhost", "root", "", "projet");
		$mysqli -> set_charset("utf8");
		
		$requete="INSERT INTO reserve VALUES('".$_POST['id_utilisateur']."','" .$_POST['id_items']."',' ". $_POST['place']. "')";
  	
		
	
		$resultat = $mysqli -> query($requete);
		if ($resultat)
			
            echo "<p>Ibrahima & Azda Events vous rémercie pour votre réservation Merci et à Très bientôt !</p>";
           
		else
			echo "<p>Erreur</p>";



		?>
        
 
 
  </div>
        </div>
    
    </body>

</html>
