<?php 

$bdd = new PDO('mysql: host=localhost; dbname=projet;', 'root', '');
$allusers = $bdd->query('SELECT name FROM items ORDER BY id DESC');

if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT name FROM items WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC');
    
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
        <link rel="stylesheet" href="../css/style6.css"> 
    </head>
    
    <body>
    
   
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> RECHERCHEZ VOS EVENEMENTS  <span class="glyphicon glyphicon-glass"></span></h1>
    
       <div class="container admin">
            <div class="row">
 
                <h5><a href="evenement.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Révénir sur la page d'accueil</a></h5>
   
             <form  method="GET">
                    <input type="search" name="s" placeholder="recherchez vos événements" autocomplete="off" >
                    <input type="submit" name="envoyer">
             </form>
             
             <section class="afficher_les_evenements">
             
                <?php 
                    
                    if($allusers->rowCount() > 0){
                        while($items = $allusers->fetch()){
                            ?>
                            <p><?= $items['name']; ?></p>
                            <?php
                        }
                        
                        
                    }else
                        
                         echo "<p>Aucun événement trouvé</p>";
                         
                    

                ?>

             </section>
      
   
    </div>
        </div>
    
    </body>

</html>


	
    