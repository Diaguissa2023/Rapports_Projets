<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        // Patch XSS
        $id = htmlspecialchars($_POST['id']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
       // $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Ibra@gmail.com et ibra@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas
             if($row == 0)
            {
               // quatres vérifications à faire
               // 1 On verifie que la longueur de id <= 100
               if(strlen($id) <= 100)
                {
              // 1 On verifie que la longueur du pseudo <= 100 
                if(strlen($pseudo) <= 100)
                {
             // 2 On verifie que la longueur du mail <= 100     
                  if(strlen($pseudo) <= 100)
                   {
             // 3 Si l'email est de la bonne forme          
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                // 4 si les deux mdp saisis sont bon
                            if($password === $password_retype)
                            {
                // On hash le mot de passe 
                               $password = hash('sha256', $password);
                               
                 // On stock l'adresse IP              
                               $ip = $_SERVER['REMOTE_ADDR']; 
                               
                // On insère dans la base de données avec un tableau associatif (values)
                
                            $insert = $bdd->prepare('INSERT INTO utilisateur(id, pseudo, email, password, ip) VALUES(:id, :pseudo, :email, :password, :ip)');
                            $insert->execute(array(
                                'id' => $id,
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                             ));
                             
                             // On redirige avec le message de succès
                            header('Location:index.php?reg_err=success');
                   
                            } else header('Location: index.php?reg_err=password'); 
                        }else header('Location: index.php?reg_err=email'); 
                    }else header('Location: index.php?reg_err=email_length'); 
                }else header('Location: index.php?reg_err=pseudo_length'); 
            }else header('Location: index.php?reg_err=already');
  }        
    }
        
        
     