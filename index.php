<?php
    session_start(); // Démarre ou reprend la session.

    if (isset($_GET['deconnexion'])) {
        // Si l'utilisateur veut se déconnecter.
        session_unset(); // Supprime toutes les variables de session.
        session_destroy(); // Détruit la session.
        header('Location: index.php'); // Redirection vers la page d'accueil après déconnexion.
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sportify</title>
    
    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <!-- Barre de navigation Bootstrap -->
<nav class="navbar navbar-expand-md bg-info fixed-top" id="navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#" id="brand">
            <img src="logo/sportify.png" alt="Mon Logo" width="50" height="50" class="d-inline-block">
            Sportify
        </a>

        <!-- Bouton pour mobile (visible uniquement en dessous de md) -->
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#monMenu" aria-controls="monMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu (visible dès md) -->
        <div class="collapse navbar-collapse" id="monMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="activites.php">Activités</a></li>
                <li class="nav-item"><a class="nav-link" href="devis.php">Devis</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <!-- Si l'utilisateur est connecté, afficher "Se déconnecter", sinon "Se connecter" -->
            <?php if (isset($_SESSION['user_email'])): ?>
                    <span class="navbar-text me-3">
                         <?php echo "<strong>" . strtoupper($_SESSION['user_nom']). ' '. strtoupper($_SESSION['user_prenom']) . "</strong>"; // Affiche l'email de l'utilisateur ?> 
                    </span>
                    <a href="index.php?deconnexion=true" class="btn btn-danger">Se déconnecter</a>
                <?php else: ?>
                    
                    <a href="connexion.php" class="btn btn-primary" id="login">Se connecter</a>
                <?php endif; ?>
        </div>
    </div>
</nav>

    

    <!-- Contenu des sections -->

    <!--Premier section ACCUEIL-->

	<!-- Image principale -->
	<section class="container" id="accueil">
		<div class="row">
            <!--Message d'accueil-->
            <div class="col-md-6">
                <h1>Bienvenue chez Sportify</h1>
                <p>Rejoignez Sportify et transformez votre routine sportive.</p>
                <div class="paraphe">
                    <span>Des cours en ligne adaptés à tous les niveaux, accessibles où que vous soyez...
                        Réservez vos séances de yoga, fitness, pilates et plus encore avec nos coachs experts. Découvrez un entraînement sur mesure pour atteindre vos objectifs en toute simplicité.
                    </span>
                </div>
                <div class="button1">
                    <a href="#services" class="btn btn-info">Explorez nos offres</a>
                </div>
            </div>
            <!--Images d'accueil-->
			<div class="col-md-6" id="mainImage">
                
            <div id="carouselAccueil" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <!-- Image 1 -->
                    <div class="carousel-item active">
                        <img src="images/yoga.jpg" class="d-block w-100" alt="Yoga">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Du yoga comme nulle part ailleurs</h2>
                        </div>
                    </div>
                    <!-- Image 2 -->
                    <div class="carousel-item">
                        <img src="images/fitness.jpg" class="d-block w-100" alt="Fitness">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Fitness de haut niveau</h2>
                        </div>
                    </div>
                    <!-- Image 3 -->
                    <div class="carousel-item">
                        <img src="images/muscu.jpg" class="d-block w-100" alt="Musculation">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Faites de la musculation votre routine</h2>
                        </div>
                    </div>
                    <!-- Image 4 -->
                    <div class="carousel-item">
                        <img src="images/pilates.jpg" class="d-block w-100" alt="Pilates">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Libérez votre énergie intérieure grâce au Pilates</h2>
                        </div>
                    </div>
                    <!-- Image 5 -->
                    <div class="carousel-item">
                        <img src="images/velo.jpg" class="d-block w-100" alt="Cycling">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Libérez votre énergie intérieure grâce au Pilates</h2>
                        </div>
                    </div>
                   
                </div>
            
                <!-- Flèches de navigation -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAccueil" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselAccueil" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
            </div>
            

		</div>
	</section>

      <!--Page des services -->

      <section class="container-fluid" id="services">
        <h1 id="mes_services">Pourquoi Sportify ?</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row img_icon d-flex justify-content-center" >
                        <img src="logo/icons8-yoga-100.png" alt="">
                    </div>
                    <h2>Cours collectifs en ligne</h2>
                    <h3>Yoga, pilates, fitness, muscu</h3>
                    <p>Environs 1 heures en groupe encadré</p>
                </div>
                <div class="col-md-4">
                    <div class="row img_icon d-flex justify-content-center" >
                        <img src="logo/icons8-personal-trainer-100.png" alt="">
                    </div>
                    <h2>Coaching individuel</h2>
                    <h3>Un coach dédié </h3>
                    <p>Programe adapté</p>
                    <p>Suvis hebdomadaire</p>
                </div>
                <div class="col-md-4">
                    <div class="row img_icon  d-flex justify-content-center" >
                        <img src="logo/icons8-dollar-100.png" alt="">
                    </div>
                    <h2>Devis personnalisés</h2>
                    <h3>Estimation rapide</h3>
                    <p>Recevez votre devis par mail</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="row img_icon d-flex justify-content-center" >
                        <img src="logo/icons8-education-100.png" alt="">
                    </div>
                    <h2>Experts certifiés</h2>
                    <h3>Coachs diplômés</h3>
                    <p>et réconnus</p>
                </div>
                <div class="col-md-4">
                    <div class="row img_icon d-flex justify-content-center" >
                        <img src="logo/icons8-meeting-time-100.png" alt="">
                    </div>
                    <h2>Horaires flexibles</h2>
                    <h3>Cours à tous moments</h3>
                    <p>Selon vos disponibiltés</p>
                </div>
                <div class="col-md-4">
                    <div class="row img_icon d-flex justify-content-center" >
                        <img src="logo/icons8-circle-around-100.png" alt="">
                    </div>
                    <h2>Annulation facile</h2>
                    <h3>Sans engagment</h3>
                    <p>Vous êtes libres</p>
                </div>
            </div>
            <div class="row">
                <a href="activites.php"><button class="btn btn-primary">Voir les activites</button></a>
            </div>
        </div>

      </section>


    <!--Section de temoignages-->
    <div class="divider"></div>
    <!--Les temoignages-->
    <section id="testimonials" class="temoignages">
        <div class="container">
          <h2 class="text-center mb-4"><span class="nos_clients">Ce que nos clients disent de nous!</span></h2>
          <div id="carouselTestimonials" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="d-block w-100 text-center">
                  <p class="lead">"Sportify a transformé ma routine ! Les cours en ligne sont flexibles et les coachs sont très professionnels. J'ai enfin trouvé un programme adapté à mes besoins."</p>
                  <h5>- Sophie L., cliente fidèle</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-block w-100 text-center">
                  <p class="lead">"Je n'ai jamais été aussi motivé à faire du sport. Les séances de yoga sont géniales et l'ambiance est vraiment top !"</p>
                  <h5>- Marc D., passionné de yoga</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-block w-100 text-center">
                  <p class="lead">"En tant que débutant, je me sens très bien accompagné. Le cours de renforcement musculaire m'a permis de prendre confiance en moi."</p>
                  <h5>- Anna K., nouvelle adepte du fitness</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-block w-100 text-center">
                  <p class="lead">"J'apprécie vraiment la flexibilité des cours collectifs et individuels. Je peux m'entraîner quand je veux et où je veux, c'est super pratique !"</p>
                  <h5>- Pierre M., utilisateur régulier</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-block w-100 text-center">
                  <p class="lead">"Le programme personnalisé m'a aidé à atteindre mes objectifs rapidement. Je recommande vivement Sportify à tout le monde !"</p>
                  <h5>- Julie R., cliente satisfaite</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>


      <!--Page de contact-->
      <section class="container-fluid " id="contact">
        <div class="container">
            <div class="row">
                <h1>CONTACT</h1>
                <h3>Pour des questions ou des suggestions, n'hesiter pas a nous contacter.</h3>
            </div>
            <div class="row">
                <div class="col-md-6 infoContact"> 
                    <p><strong>Email:</strong> sportify@gmail.com</p>
                    <p><strong>Telephone:</strong> 0789897633</p>
                    <p><strong>Adresse:</strong> 185 avenue Albert Thomas, Limoges</p>
                </div>
                <div class="col-md-6"> 
                    
                <form method="post" action="gestion_contact.php" id="form-contact">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom*</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                                <small id="erreur_nom" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prenom*</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                                <small id="erreur_prenom" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <small id="erreur_email" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="msg" class="form-label">Message*</label>
                        <textarea id="msg" rows="6" cols="5" class="form-control" name="message" required></textarea>
                        <small id="erreur_msg" class="text-danger"></small>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-light w-10" id ="envoyer" name="envoie_msg" value="envoyer">Envoyer</button>
                        </div>
                        <div class="col-md-8">
                            <?php
                            // Vérifie si le message de confirmation existe dans la session
                            if (isset($_SESSION['confirmation_msg'])) {
                                echo '<p style="color: green; font-weight: bold;">' . $_SESSION['confirmation_msg'] . '</p>';

                                // Après l'affichage, on supprime le message pour qu'il ne soit pas affiché à nouveau
                                unset($_SESSION['confirmation_msg']);
                            }
                            ?>
                        </div>
                    </div>
                </form>

                </div>
                

            </div>

        </div>
      </section>

      

      <!--Footer-->

      <section class="container-fluid" id="footer">
        <div class="row">
            <p>&copy;alpha-fatima-talib-limoges 2025</p>
        </div>
      </section>
      
   

    <!-- Bootstrap 5 JavaScript (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_contact.js"></script>
</body>
</html>


