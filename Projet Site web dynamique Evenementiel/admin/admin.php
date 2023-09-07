<!DOCTYPE html>  
<html>  
 <!-- On a bessoin ces packages bootstrap et googleapis pour notre page dynamique---->
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
    
   
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Événementiel LY & Azdat <span class="glyphicon glyphicon-glass"></span></h1>
   
       <div class="container admin">
            <div class="row">
     
                <h1><strong>Liste des événements   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter un événement</a></h1>
                <h3><a href="reservation.php" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-eur"></span> Les réservations en cours</a></h1>
                <h3><a href="recup_message.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-envelope"></span> Messagérie</a></h1>
                <h5><strong>Accueil </strong><a href="evenement.php" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-home"></span> Déconnexion</a></h5>
   
 
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Lieu</th>
                      <th>Nombre_place</th>
                      <th>Catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  
 
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect(); 
                        #  $statement: permet de récuperer les lignes lignes et colonnes avec la fonction  query en utilisant select 
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.Date, items.Lieu, items.Nombre_place, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
                       # la boucle while: va permettre d'afficher uniquement une ligne après une ligne avec "fetch"
                       while($item = $statement->fetch()) 
                        {
                   
                        # avec cette concatenation, ça nous affichera tous les éléments 
                          echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['description'] . '</td>';
                            echo '<td>'. $item['Date'] . '</td>';
                            echo '<td>'. $item['Lieu'] . '</td>';
                            echo '<td>'. $item['Nombre_place'] . '</td>';
                            echo '<td>'. $item['category'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    
    </body>
    
    
    
    
</html>
	
    