<?php @session_start(); ?>
<!DOCTYPE html>  
<html>  
   
   <head>  
<!-- Le titre de notre formulaire -->
	
		<title>CONTACTEZ-NOUS</title>
<!-- L'encodage de notre page -->
		<meta charset = "utf-8" />
<!-- le responsive de notre formulaire -->
	<meta name="viewport" content="width=device-width, 
	initial-scale=1">
<!-- On peut utiliser des packages comme: jquery, bootstrap depuis google pour intégrer dans notre projet.  -->
<!-- Package jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js">
			</script>
<!-- Package bootstrap -->
			<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- couleur de font sur google pour le formulaire -->
			<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<!-- Là on a mis toutes les packages externes qu'on doit utliser pour notre formulaire -->
<!-- Metons en place la page css dans notre page htlm -->
			<link rel="stylesheet" href="/css/style3.css"> 
    </head>


    <!-- code pour mettre le trait orange et le titre              IBRAHIMA LY VA FINALISER-->
<body>
<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="#reseaux">Nous suivre</a></li>
                        <li><a href="#recommandations">Avis</a></li>
                       
                        <li><a href="#contact">Nous Contacter</a></li>
                        
                       
                    </ul>
                </div>
            
            </div>
        </nav>

       <section id="condition" class="container-fluid">
            <div class="col-xs-0 col-md-0 profile-picture">
                <img src="/images/p.png" alt="événementiel" class="img-Rounded Circle">
            </div>
            
         </section>
     
        
        <section id="reseaux">
            <div class="container">
                <div class="white-divider"></div>
                <div class="heading">
                    
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.facebook.com" target="_blank">
                            <img src="/images/facebook_share.png" alt="facebook share">
                        </a>
                    </div>
                     <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.linkedin.com" target="_blank">
                            <img src="/images/Linkedin_video.jpg" alt="My account Linkedin">
                        </a>
                    </div>
                     <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.twitter.com" target="_blank">
                            <img src="/images/twitter_video.png" alt="twitter video">
                        </a>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.google.com" target="_blank">
                            <img src="/images/youtube.png" alt="youtube">
                        </a>
                    </div>
                     <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.twitter.com" target="_blank">
                            <img src="/images/twitter_retweet.png" alt="twitter retweet">
                        </a>
                    </div>
                     <div class="col-sm-4">
                        <a class="thumbnail" href="http://www.facebook.com" target="_blank">
                            <img src="/images/facebook_video.png" alt="facebook video">
                        </a>
                    </div>
                </div>
            
            </div>
         </section>
         
         
          <section id="recommandations" class="container-fluid">
            <div class="container">
                <div class="red-divider"></div>
                <div class="heading">
                    <h2>Présentation</h2>
                </div>
                <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                    <ol class="carousel-indicators">
                         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                         <li data-target="#myCarousel" data-slide-to="1"></li>
                         <li data-target="#myCarousel" data-slide-to="2"></li>  
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <h3>"Equipe au top ! <br>
                   Réactive, toujours là quand il faut, disponible pour <br>
              donner des conseils...
                        Je recommande vivement. <br>
            Je ne m'attendais pas à autant quand je suis arrivée sur les lieux de la réception.<br>
                                        Encore un grand Merci !"</h3>
                                  
                        </div>
                          <div class="item">
                            <h3>Merci Lucille <br>

                        Un grand professionnalisme, une belle énergie et une grande gentillesse.<br>

                                    Au plaisir de retravailler ensemble.<br>
                                    <br>

                                       Djamila</h4>  <br>
                                       <br>
                           <h4>Université de Montpellier, Fac d'économie</h4>                                        
                        </div>
                          <div class="item">
                            <h3>"Je vous remercie !... Mes améliorations dépendent de vos conseils et suggestions!"</h3>
                            <h4>Merci à tous mes professeurs</h4>       
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                
                </div>
            
            </div>
        </section>
            <br>
            <br>
        
        
        <footer class="text-center">
            <a href="#about">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <h5>© 2022 Semestre 2: Outils pour le web</h5>
        </footer>
                
         <br>
            <br>
            <br>
            <br>
         
      
        <section id="contact">
            
            <div id="mon_formulaire_conteneur">
                <div class="divider"></div>
                    <div class="heading">
                        <h2>Formulaire de Contact</h2>
                    </div>
    
            <div class="row">
            <div class="col-lg-10 col-lg-offset-1">    
                        <form id="contact-form" name="inscription" method="post" action="ajouter.php">
                        <div class="row">
                        <fieldset class="mon_formulaire_fieldset">
                            <legend class="mon_formulaire_legend">VOUS SOUHAITERIEZ ORGANISER UN EVÉNEMENT PROFESSIONNEL, CONTACTEZ-NOUS </legend>
            
            <div class="mon_formulaire_label">
               <label for="password">Nom<span class="blue"> *</span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="text" name="name" class="form-control" class="mon_formulaire_champ" placeholder="renseignez votre nom" />
               <p class="comments">Vous devez renseigner ce champ</p>
            </div><br />
            
            <div class="mon_formulaire_label">
               <label for="password">Prénom<span class="blue"> *</span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="text" name="firstname" class="form-control" class="mon_formulaire_champ" placeholder="renseignez votre prénom"/>
               <p class="comments">Vous devez renseigner ce champ</p>
            </div><br />
        
            <div class="mon_formulaire_label">
               <label for="password">Login<span class="blue"> /span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="text" name="login" class="form-control" class="mon_formulaire_champ" placeholder="renseignez votre Login personnel"/>
               <p class="comments">Vous devez renseigner ce champ</p>
            </div><br />
            
            <div class="mon_formulaire_label">
               <label for="password">Mot de passe<span class="blue"> *</span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="password" name="mdp" class="form-control" class="mon_formulaire_champ" placeholder="renseignez votre mot de passe"/>
               <p class="comments">le mot de passe doit contenir un maj, un minus et un chiffre</p>
            </div><br />
            
            <div class="mon_formulaire_label">
               <label for="password">Confirmer votre mot de passe<span class="blue"> *</span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="password" name="remdp" class="form-control" class="mon_formulaire_champ" />
               <p class="comments">Le mot de passe doit être identique</p>
            </div><br />
            
            <div class="mon_formulaire_label">
            <label for="password">Message<span class="blue"> *</span></label>
            </div>
            
            <div class="col-md-12" class="mon_formulaire_input">
               <input type="text" name="message" class="form-control" class="mon_formulaire_champ" />
               <p class="comments">Le message ne doit pas dépassé 400 caractères</p>
            </div><br />
            
            
             </section>
            <div class="mon_formulaire_label">

            </div>
            
            <div class="col-md-9">
                <p class="blue"><strong>* Ces informations dont réquises</strong></p>
			</div>
                            
            <div class="col-md-5" class="mon_formulaire_input">
                <input type="submit"  class="button1" name="sinscrire" value="Envoyer"  />
            </div><br />
            
         </fieldset>
         </div>
         <p class="thank-you">Votre message a bien été envoyé. Merci d'avoir me contacter :)</p>
      </form>
      
  
  </div> 
  </div>
  </div>
   
   
   </body>  
</html>