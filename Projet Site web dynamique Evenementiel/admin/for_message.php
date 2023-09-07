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
        <link rel="stylesheet" href="../css/style9.css"> <!-- c'est le lien du css -->
    </head>
    
    <body>
    
   
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Formulaire de contact  <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">
 
                <h5><a href="evenement.php" class="btn btn-primary-lg"><span class="glyphicon glyphicon-home"></span> Révénir sur la page d'accueil</a></h5>
   


<?php
          
		
        echo $_POST['prenom'];
		echo "<br>";
		echo $_POST['nom'];
        echo "<br>";
        echo $_POST['email'];
		echo "<br>";
		echo $_POST['telephone'];
        echo "<br>";
        echo $_POST['date'];
		echo "<br>";
		echo $_POST['adresse'];
        echo "<br>";
        echo $_POST['message'];
		
	
		
		
		$mysqli = new mysqli("localhost", "root", "", "projet");
		$mysqli -> set_charset("utf8");
		
		$requete="INSERT INTO contact VALUES(NULL,'" .$_POST['prenom']."',' " .$_POST['nom']."',' " .$_POST['email']."',' " .$_POST['telephone']."',' " .$_POST['date']."',' " .$_POST['adresse']."',' ". $_POST['message']. "')";
  	
		//echo $requete;
	
		$resultat = $mysqli -> query($requete);
		if ($resultat)
			
            echo "<p>Ibrahima & Azda Events vous rémercie de nous avoir écrit. Merci et à Très bientôt !</p>";
           
		else
			echo "<p>Erreur</p>";



		?>
        
 
 
  </div>
        </div>
    
    </body>

</html>
