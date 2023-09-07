<!DOCTYPE html>
<html>

<head>
        <title>Reservez votre place </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
         <link rel="stylesheet" href="../css/style8.css">
</head>

<body>
     <h1 class="text-logo"><span class="glyphicon glyphicon-music"></span> Événementiel LY & Azdat <span class="glyphicon glyphicon-glass"></span></h1>
   
       <div class="container admin">
            <div class="row">
 <div class="container">
              
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="evenement.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-calendar"></span> Page d'accueil </a></li>
                   
                   </ul>
                </div>
  </div>
            
            
   <div id="mon_formulaire_conteneur">
      <form name="inscription" method="post" action="formulaire_reservation.php">
         <fieldset class="mon_formulaire_fieldset">
            <legend class="mon_formulaire_legend">Reservez votre place</legend>
            
            <div class="mon_formulaire_label">
               Identifiant personnel (Nom+année de naissance)
            </div>
            <div class="mon_formulaire_input">
               <input type="text" name="id_utilisateur" placeholder="Saisissez l'id que vous avez renseignez en vous inscrivant" class="mon_formulaire_champ" />
            </div><br />
            
            <div class="mon_formulaire_label">
               Numéro de l'événement
            </div>
            <div class="mon_formulaire_input">
               <input type="number" name="id_items" placeholder="Le numéro de lévénement commence par (E..)" class="mon_formulaire_champ" />
            </div><br />
            
             <div class="mon_formulaire_label">
               Nombre de place
            </div>
            <div class="mon_formulaire_input">
               <input type="number" name="place" placeholder="Saisissez le nombre de place que souhaitez réserver" class="mon_formulaire_champ" />
            </div><br />
           
            <div class="mon_formulaire_input">
               <input type="submit" name="sinscrire" value="S'inscrire" class="mon_formulaire_champ" />
            </div><br />
            <div class="form-actions">
                  <a class="btn btn-primary" href="admin/evenement.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div> 
         </fieldset>
      </form>
   </div>
	

 </div>
        </div>

</body>

</html>