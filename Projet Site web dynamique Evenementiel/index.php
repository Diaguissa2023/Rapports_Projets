<!DOCTYPE html>
    <html lang="en">
        <head>
             <title>Connexion</title>
         
             <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta name="author" content="NoS1gnal"/>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
             <link href='http://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
             <link rel="stylesheet" href="./css/style.css">
        </head>
        
        
        <body>
        
        <div class="login-form">
        
        <!-- Gestion des erreurs de la page de connexion -->
        
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;
                        
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="utilisateur.php" method="post">
                <h2 class="text-center">Page de login</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="nom@gmail.com" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
                
                <p><i>Si vous êtes un niveau utilisateur, inscrivez-vous avant de se connecter</i></p>
            
                <div class="form-group">
                 <button type="submit" class="text-center btn btn-warning "><a href="inscription.php">Inscription</a></button>
                </div> 
            </form>
            
        </div>
       
        </body>
</html>