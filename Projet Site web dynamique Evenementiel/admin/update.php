<?php

    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

 $nameError = $descriptionError = $DateError = $LieuError = $Nombre_placeError = $priceError = $categoryError = $imageError = $name = $description = $Date = $Lieu = $Nombre_place =  $price = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $Date        = checkInput($_POST['Date']);
        $Lieu        = checkInput($_POST['Lieu']);
        $Nombre_place = checkInput($_POST['Nombre_place']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($Date)) 
        {
            $DateError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($Lieu)) 
        {
            $LieuError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($Nombre_place)) 
        {
            $Nombre_placeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if(empty($price)) 
        {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
         
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
         
        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
        { 
            $db = Database::connect();
            if($isImageUpdated)
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, Date = ?, Lieu = ?, Nombre_place = ?, price = ?, category = ?, image = ? WHERE id = ?");
                $statement->execute(array($name,$description, $Date, $Lieu, $Nombre_place, $price, $category,$image,$id));
            }
            else
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, Date = ?, Lieu = ?, Nombre_place = ?, price = ? , category = ? WHERE id = ?");
                $statement->execute(array($name,$description, $Date, $Lieu, $Nombre_place, $price, $category,$id));
            }
            Database::disconnect();
            header("Location: admin.php");
        }
        else if($isImageUpdated && !$isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM items where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $image          = $item['image'];
            Database::disconnect();
           
        }
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $description    = $item['description'];
        $Date    = $item['Date'];
        $Lieu    = $item['Lieu'];
        $Nombre_place    = $item['Nombre_place'];

        $category       = $item['category'];
        $image          = $item['image'];
        Database::disconnect();
    }

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
        <h1 class="text-logo"><span class="glyphicon glyphicon-glass"></span> Événementielle LY & Azdat <span class="glyphicon glyphicon-music"></span></h1>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier un événement</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nom de l'événement:
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description de l'événement:
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                        </div>
                        <div class="form-group">
                        <label for="Date">Date de l'événement:</label>
                        <input type="date" class="form-control" id="Date" name="Date" placeholder="Date" value="<?php echo $Date;?>">
                        <span class="help-inline"><?php echo $DateError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="Lieu">Lieu de l'événement:</label>
                        <input type="text" class="form-control" id="Lieu" name="Lieu" placeholder="Lieu" value="<?php echo $Lieu;?>">
                        <span class="help-inline"><?php echo $LieuError;?></span>
                    </div> 
                    <div class="form-group">
                        <label for="Nombre_place">Nombre de place de l'événement:</label>
                        <input type="number" class="form-control" id="Nombre_place" name="Nombre_place" placeholder="Nombre_place" value="<?php echo $Nombre_place;?>">
                        <span class="help-inline"><?php echo $Nombre_placeError;?></span>
                    </div> 
                        <div class="form-group">
                        <label for="price">Prix de la réservation: (en €)
                            <input type="number" step="0.00" class="form-control" id="price" name="price" placeholder="Gratuit" value="<?php echo $price;?>">
                            <span class="help-inline"><?php echo $priceError;?></span>
                        </div>


                        <div class="form-group">
                            <label for="category">Catégorie de l'événement:
                            <select class="form-control" id="category" name="category">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories') as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>';
                                    else
                                        echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <p><?php echo $image;?></p>
                            <label for="image">Sélectionner une nouvelle image de l'événement:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../images/'.$image;?>" alt="...">
                        <div class="price"><?php echo number_format((float)$price, 2, '.', ''). ' €';?></div>
                          <div class="caption">
                            <h4><?php echo $name;?></h4>
                            <p><?php echo $description;?></p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Reservez votre place</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
