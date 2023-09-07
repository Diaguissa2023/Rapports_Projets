

<!DOCTYPE html>  
<html>  
   
   <head>  
        
        <title>Ibrahima & Azdat Events</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="NoS1gnal"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/style2.css"> 
    </head>
    
    
    
<body> 



 <nav class="navbar navbar-default ">
            <div class="container">
              
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><p><a href="/admin/loginA.php" class="btn btn-link"><span class="glyphicon glyphicon-calendar"></span> Administrateur <br/> Connexion </a></p></li>
                        
                        <li><p><a href="/admin/presentation.php" class="btn btn-link"><span class="glyphicon glyphicon-user"></span >Qui sommes nous</a></p></li>
                        
                        <li><p><a href="/admin/recherche.php" class="btn btn-link"><span class="glyphicon glyphicon-search"></span >Page de recherche</a></p></li>
               
                        <li><p><a href="/index.php" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span > Déconnexion </a></p></li> 
                    </ul>
                </div>
            </div>
</nav> 
    
  <div class="container site"> 
            <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Ibrahima & Azdat Events<span class="glyphicon glyphicon-music ">
    </span></h1> 
 

            <?php
            
            require '../admin/database.php';
            echo ' <nav>
                     <ul class="nav nav-pills">';
            $db = Database::connect();
            $statement = $db->query('SELECT * FROM categories');
            $categories = $statement->fetchAll();
            
            foreach($categories as $category)
            {
                if($category['id'] == '1')
                    echo '<li rol="presentation" class="active"><a href="#' . $category['id'] . '" data-toggle="tab">' .$category['name']. '</a></li>';
                else
                    echo '<li rol="presentation"><a href="#' . $category['id'] . '" data-toggle="tab">' .$category['name']. '</a></li>';
            }
            
            echo '</ul>
              </nav>';
              
            echo '<div class="tab-content">';
            foreach($categories as $category)
            {
                if($category['id'] == '1')
                    echo '<div class="tab-pane active" id="' . $category['id'] . '">';
                else
                    echo '<div class="tab-pane" id="' . $category['id'] . '">';
                echo ' <div class="row">';
                
                $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                $statement->execute(array($category['id']));
                
                while($item = $statement->fetch())
                {
                    echo' <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="../images/' . $item['image'] . '" alt="...">
                              <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                 <div class="caption">
                                    <h4>' . $item['name'] . '</h4>
                                    <p>' . $item['description'] . '</p>
                                    <h3><strong></strong><a href="formulaire_utilisateur.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Reservez votre place </a></h3>
                                 </div>
                            </div>
                        </div>' ;
                }  //<a href="../devi.php?id_salle=<?php echo $row['id_salle']; ?>">Details</a>
              echo '</div>
                  </div>'  ;
            }
            Database::disconnect();
            echo '</div>'; 
            ?>
      </div>
     </div>
   </body>
</html>