<!DOCTYPE html>  
<html>  
 
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

     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Utilisateurs Inscrits <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">

                <h1><strong>Les réservations en cours </strong><a href="admin.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Rétour</a></h1>

         <?php
		                        $mysqli = new mysqli("localhost", "root", "", "projet");
		                        $mysqli -> set_charset("utf8");
                         
                         # La requete SQL        
		                        $requete = "SELECT id_utilisateur, pseudo,name,description, place FROM utilisateur as u INNER JOIN reserve as r on u.id = r.id_utilisateur INNER JOIN items as i on r.id_items = i.id";
                                
		                        $resultat = $mysqli -> query($requete);
                    echo "<table border=' Adrien1997 '> ";
                    echo "<tr><td>id_utilisateur</td><td>pseudo</td><td>name</td><td>description</td><td>place</td></tr> \n";
                                
		            while ($ligne = $resultat -> fetch_assoc()) 
                    
                 {
			        echo "<tr><td>{$ligne['id_utilisateur']}</td><td>{$ligne['pseudo']}</td><td>{$ligne['name']}</td><td>{$ligne['description']}</td><td>{$ligne['place']}</td></tr> \n" ;
			      
		        }
            echo "</table>" ;
		$mysqli->close();
		?>
        
  </div>
</div>
    
    </body>
 
</html>  


