<?php
     
    require 'database.php';
 
    $nameError = $descriptionError = $DateError = $LieuError = $Nombre_placeError =  $priceError = $imageError = $categoryError  = $name = $description = $Date = $Lieu = $Nombre_place  = $priceError =  $image = $category  = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $Date        = checkInput($_POST['Date']);
        $Lieu        = checkInput($_POST['Lieu']);
        $Nombre_place = checkInput($_POST['Nombre_place']);
        $price              = checkInput($_POST['price']);
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $category           = checkInput($_POST['category']); 
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
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
        if(empty($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }        
        
       
        else
        {
            $isUploadSuccess = true;
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
            /*
            if($_FILES["image"]["size"] > 60000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            */
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description, Date, Lieu, Nombre_place, price, image, category) values(?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description, $Date, $Lieu, $Nombre_place, $price, $image ,$category));
            Database::disconnect();
            header("Location: admin.php");
        }
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
        <link href='http://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Événementiel<span class="glyphicon glyphicon-glass"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un événement</strong></h1>
                <br>
                <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom de l'événement:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description de l'événement:</label>
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
                        <label for="price">Prix de la réservation: (en €)</label>
                        <input type="number" step="0.00" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                        <span class="help-inline"><?php echo $priceError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie de l'événement:</label>
                        <select class="form-control" id="category" name="category">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM categories') as $row) 
                           {
                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $categoryError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Sélectionner une image de l'événement:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success href="evenement.php"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>