<?php 

$bdd = new PDO('mysql: host=localhost; dbname=basededonnees;', 'root', '');
$allusers = $bdd->query('SELECT type_reservation FROM categories ORDER BY id_categorie DESC');

if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT type_reservation FROM categories WHERE type_reservation LIKE "%'.$recherche.'%" ORDER BY id_categorie DESC');
    
}
?>



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
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
    
   
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> RECHERCHEZ VOS Salles de réservation  <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">
 
                <h5><a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Révénir sur la page d'accueil</a></h5>
   
             <form  method="GET">
                    <input type="search" name="s" placeholder="recherchez vos Réservations" autocomplete="off" >
                    <input type="submit" name="envoyer">
             </form>
             
             <section class="afficher_les_evenements">
             
                <?php 
                    
                    if($allusers->rowCount() > 0){
                        while($salle = $allusers->fetch()){
                            ?>
                            <p><?= $salle['type_reservation']; ?></p>
                            <?php
                        }
                        
                        
                    }else
                        
                         echo "<p>Aucun Type de Réservation trouvée</p>";
                         
                    

                ?>

             </section>
      
   
    </div>
        </div>
    
    </body>

</html>


	
    