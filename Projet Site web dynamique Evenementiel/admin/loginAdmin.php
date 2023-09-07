<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; 
    
       if(!isset($_POST['email']) && !isset($_POST['password'])) 
    {
     
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); 
        
      
        $check = $bdd->prepare('SELECT pseudo, email, password FROM connexion WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

       
        if($row > 0)
        {
          
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
              
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['projet'] = $data['email'];
                    header('Location: /admin/admin.php');
                    die();
                }else{ header('Location: /admin/admin.php?login_err=password'); die(); }
            }else{ header('Location: /admin/admin.php?login_err=email'); die(); }
        }else{ header('Location: /admin/admin.phplogin_err=already'); die(); }
    }else{ header('Location: /admin/admin.php'); die();} // si le formulaire est envoyé sans aucune données