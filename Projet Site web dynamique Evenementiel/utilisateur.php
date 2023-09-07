<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; 
    
    
       if(!isset($_POST['email']) && !isset($_POST['password'])) 
    {
       
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
       
        $check = $bdd->prepare('SELECT pseudo, email, password FROM connexion WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['projet'] = $data['email'];
                    header('Location: admin/evenement.php');
                    die();
                }else{ header('Location: admin/evenement.php?login_err=password'); die(); }
            }else{ header('Location: admin/evenement.php?login_err=email'); die(); }
        }else{ header('Location: admin/evenement.php?login_err=already'); die(); }
    }else{ header('Location: admin/evenement.php'); die();} // si le formulaire est envoyé sans aucune données