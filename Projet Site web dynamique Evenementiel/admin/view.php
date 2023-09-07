<?php
    require 'database.php'; # lien de connection à la base de donnée

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']); # sécurité (hackeur)
    }
     
    $db = Database::connect(); 
    $statement = $db->prepare("SELECT items.id, items.name, items.description, items.Date, items.Lieu, items.Nombre_place, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch(); # ici on n'a pas besoin de boucle, on utilise fetch pour selectionner une ligne 
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Événementiel LY & Azdat</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span>Événementielle LY & Azdat <span class="glyphicon glyphicon-glass"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Voir un événement</strong></h1>
                    <br>
                    
  <!-- Mise en oeuvre des Informations de chaque items sélectionnée -->
                    <form>
                      <div class="form-group">
                        <label>Nom de l'événement:</label><?php echo '  '.$item['name'];?>
                      </div>
                      <div class="form-group">
                        <label>Description de l'événement:</label><?php echo '  '.$item['description'];?>
                      </div>
                      <div class="form-group">
                        <label>Date de l'événement:</label><?php echo '  '.$item['Date'];?>
                      </div>
                      <div class="form-group">
                        <label>Lieu de l'événement:</label><?php echo '  '.$item['Lieu'];?>
                      </div>
                      <div class="form-group">
                        <label>Nombre de place de l'événement:</label><?php echo '  '.$item['Nombre_place'];?>
                      </div>
                      <div class="form-group">
                        <label>Prix de la réservation:</label><?php echo '  '.number_format((float)$item['price'], 2, '.', ''). ' €';?>
                      </div>
                      <div class="form-group">
                        <label>Catégorie de l'événement:</label><?php echo '  '.$item['category'];?>
                      </div>
                      <div class="form-group">
                        <label>Image de l'événement:</label><?php echo '  '.$item['image'];?>
                      </div>
                    </form>
                    <br>
                    

                    <div class="form-actions">
                      <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>

                </div> 
                
      
               <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../images/'.$item['image'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$item['price'], 2, '.', ''). ' €';?></div>
                          <div class="caption">
                            <h4><?php echo $item['name'];?></h4>
                            <p><?php echo $item['description'];?></p>
                            <p><?php echo $item['Date'];?></p>
                            <p><?php echo $item['Lieu'];?></p>
                            <p><?php echo $item['price'];?></p>
                            <p><?php echo $item['Nombre_place'];?></p>
                     
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

