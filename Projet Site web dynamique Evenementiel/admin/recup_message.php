<!DOCTYPE html>  
<html>  
 <!-- On a bessoin ces packages bootstrap et googleapis pour notre page dynamique---->
   <head>  
        <title>Utilisateurs Inscrits</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="../css/style1.css"> 
    </head>
    
    <body>

     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Formulaire de contact "Messagerie" <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">

                <h1><strong>Les réservations en cours </strong><a href="admin.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Rétour</a></h1>

         <?php
		                        $mysqli = new mysqli("localhost", "root", "", "projet");
		                        $mysqli -> set_charset("utf8");
                         
                         # La requete SQL        
		                        $requete = "SELECT * From contact";
                                
		                        $resultat = $mysqli -> query($requete);
                    echo "<table border='1'> ";
                    echo "<tr><td>id</td><td>prenom</td><td>nom</td><td>email</td><td>telephone</td><td>date</td><td>adresse</td><td>message</td></tr> \n";
                                
		            while ($ligne = $resultat -> fetch_assoc()) 
                    
                 {
			        echo "<tr><td>{$ligne['id']}</td><td>{$ligne['prenom']}</td><td>{$ligne['nom']}</td><td>{$ligne['email']}</td><td>{$ligne['telephone']}</td><td>{$ligne['date']}</td><td>{$ligne['adresse']}</td><td>{$ligne['message']}</td></tr> \n" ;
			      
		        }
            echo "</table>" ;
		$mysqli->close();
		?>
        
  </div>
</div>
    
    </body>
 
</html>  


