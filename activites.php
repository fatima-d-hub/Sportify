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
    <title>sportify/activites</title>
    
    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_activites.css">
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
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Activités</a></li>
                <li class="nav-item"><a class="nav-link" href="devis.php">Devis</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
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

    <section class="image-accueil">
        <div class="container">
            <div class="text">
                <h1>Découvrez nos Activités Sportives</h1>
                <p>Rejoignez nos cours en ligne et améliorez votre forme physique avec des programmes adaptés à tous les niveaux.</p>
                <a href="#cours" class="btn btn-primary">Voir les cours</a>
            </div>
        </div>
    </section>
    

    <!--Section des activites-->


    <div class="container py-5" id="cours">

        <div class="row text-center activites">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/yoga.jpg" alt="Yoga" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Yoga</h3>
                    <p>Cours collectif d'1h, niveau débutant, intermédiaire, avancé.</p>
                    <p>Max 5 participants</p>
                    <p>Encadrant: <strong> Michelle Legrand</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <!-- Si l'utilisateur est connecté, afficher "Se déconnecter", sinon "Se connecter" -->
                    <?php if (isset($_SESSION['user_email'])): ?>
                            <button type="button" class="btn btn-primary nom_cours" id="yoga-button" data-bs-toggle="modal" data-bs-target="#inscriptionModal" value = "yoga">S'inscrire</button>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row text-center mt-4 activites">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/pilates.jpg" alt="Pilates" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Pilates</h3>
                    <p>Cours collectif d'1h, niveau débutant, intermédiaire, avancé.</p>
                    <p>Max 3 participants</p>
                    <p>Encadrant: <strong> Marion May</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <button type="button" class="btn btn-primary nom_cours" id="pilates_button" data-bs-toggle="modal" data-bs-target="#inscriptionModal" value = "pilates">S'inscrire</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row text-center mt-4 activites">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/muscu.jpg" alt="Musculation" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Renforcement musculaire</h3>
                    <p>Cours collectif de 45 min, niveau débutant, intermédiaire, avancé.</p>
                    <p>Max 5 participants</p>
                    <p>Encadrant: <strong> Camille Lemont</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <?php if (isset($_SESSION['user_email'])): ?>
                        
                        <button type="button" class="btn btn-primary nom_cours" id="musculation_button" data-bs-toggle="modal" data-bs-target="#inscriptionModal" value = "musculation">S'inscrire</button>

                    <?php endif; ?>
                </div>
            </div>
        </div>



        <div class="row text-center activites mt-4">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/velo.jpg" alt="Cycling" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Cycling</h3>
                    <p>Cours collectif de 45 min. Nécessite un vélo d'appartement</p>
                    <p>Max 3 participants</p>
                    <p>Encadrant: <strong> Amy Taylor</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">

                    <!--Si l'utilisateur est connecter le bouton s'inscrire s'affiche et pareil pour tous les autres cours-->
                    <?php if (isset($_SESSION['user_email'])): ?>
                       
                        <button type="button" class="btn btn-primary nom_cours" id="cycling_button" data-bs-toggle="modal" data-bs-target="#inscriptionModal" value = "cycling">S'inscrire</button>
                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row text-center mt-4 activites">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/fitness.jpg" alt="Pilates" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Fitness</h3>
                    <p>Cours collectif de 45 minutes max.</p>
                    <p>Max 3 participants</p>
                    <p>Encadrant: <strong> Lora Jones</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <?php if (isset($_SESSION['user_email'])): ?>
                     
                        <button type="button" class="btn btn-primary nom_cours" id="fitness_button" data-bs-toggle="modal" data-bs-target="#inscriptionModal" value = "fitness">S'inscrire</button>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row text-center mt-4 activites">
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="Images/personnel.jpg" alt="Fitness" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">
                    <h3>Programme personnalisé</h3>
                    <p>Coaching individuel avec un suivi hebdomadaire.</p>
                    <p>Encadrant: <strong> Laura Marins</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-card">

                    <?php if (isset($_SESSION['user_email'])): ?>
            
                        <button type="button" class="btn btn-primary" id="programmePers_button" data-bs-toggle="modal" data-bs-target="#inscriptionModalPersonnalise" value="individuel">S'inscrire</button>
                        
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!--Si l'utilisateur n'est pas connecter le bouton se connecter s'affiche-->
        <?php if (!isset($_SESSION['user_email'])): ?>
                    
            <div class="d-flex justify-content-center align-items-center connect_activite" >
                <a href="connexion.php">
                    <button type="button" class="btn btn-primary" id="seConnecter-button">Se connecter</button>
                </a>
            </div>
        <?php endif; ?>


    </div>
    

    <!--Modal-->


<!-- Modale -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Inscription au cours:</h5>
          
        </div>
        <div class="modal-body">
          <form method="post" action="recap_inscription.php" id="form_modal">

            <div class="mb-3 mt-4 row">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom*</label>
                    <input type="text" class="form-control" id="nom1" name="nom" required>
                    <small id="erreur_nom1" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom*</label>
                    <input type="text" class="form-control" id="prenom1" name="prenom" required>
                    <small id="erreur_prenom1" class="text-danger"></small>
                </div>
            </div>

            <div class="mb-3 mt-4 row">
                <div class="col-md-6">
                    <label for="date" class="form-label">Date de naissance*</label>
                    <input type="date" class="form-control" id="date" name="dateN" required>
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone1" name="telephone">
                    <small id="erreur_telephone1" class="text-danger"></small>
                </div>
            </div>
            
            <!--Cours souhaité-->
            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau*</label>
                <select class="form-select" id="niveau" name="niveau" required>
                    <option value="" selected disabled>Choisissez un niveau</option>
                  <option value="debutant">Débutant</option>
                  <option value="intermediaire">Intermédiaire</option>
                  <option value="avance">Avancé</option>
                </select>
              </div>

            

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" id="confirmer_ins" name="valider_inscription" value="valider_inscription">Confirmer l'inscription</button>
            </div>

            <script>
                let names = document.getElementsByClassName("nom_cours");
    
                for(let i = 0; i < names.length; i++){
                    names[i].addEventListener("click", function(){
                        name = names[i].value;
                        let input_cache = document.createElement("input");

                        input_cache.type = "hidden";
                        input_cache.name = "cours_a_faire";
                        input_cache.value = name;

                        let form = document.getElementById("form_modal");
                        form.appendChild(input_cache);
                    })
                }

            </script>

  
          </form>
        </div>
        
      </div>
    </div>
  </div>
    

  <!--Modale pour programme personnalisé-->
  <!-- Modale -->
<div class="modal fade" id="inscriptionModalPersonnalise" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Inscription au cours: </h5>
        </div>
        <div class="modal-body">
          <form id="form_modal_perso" method="post" action="recap_inscription.php">

            <div class="mb-3 mt-4 row">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom*</label>
                    <input type="text" class="form-control" id="nom2" name="nom" required>
                    <small id="erreur_nom2" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom*</label>
                    <input type="text" class="form-control" id="prenom2" name="prenom" required>
                    <small id="erreur_prenom2" class="text-danger"></small>
                </div>
            </div>

            <div class="mb-3 mt-4 row">
                <div class="col-md-6">
                    <label for="date" class="form-label">Date de naissance*</label>
                    <input type="date" class="form-control" id="date" name="dateN" required>
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone2" name="telephone">
                    <small id="erreur_telephone2" class="text-danger"></small>
                </div>
            </div>

            <!--Cours souhaité-->
            <div class="mb-3">
                <label for="cours_souhaite" class="form-label">Cours souhaité*</label>
                <select class="form-select" id="heure" name="cours_souhaite" required>
                    <option value="" selected disabled>Choisissez un cours</option>
                  <option value="yoga">Yoga</option>
                  <option value="cycling">Cycling</option>
                  <option value="musculation">Musculation</option>
                  <option value="fitness">Fitness</option>
                  <option value="pilates">Pilates</option>
                </select>
              </div>
            
            <!--Cours souhaité-->
            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau*</label>
                <select class="form-select" id="niveau" name="niveau" required>
                    <option value="" selected disabled>Choisissez un niveau</option>
                  <option value="debutant">Débutant</option>
                  <option value="intermediaire">Intermédiaire</option>
                  <option value="avance">Avancé</option>
                </select>
              </div>

            <!-- Jours disponibles -->
            <div class="mb-3">
                <label class="form-label">Jours disponibles*</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="lundi" class="max_jours" name="jours[]" value="Lundi">
                            <label class="form-check-label" for="lundi">Lundi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mardi" class="max_jours" name="jours[]" value="Mardi">
                            <label class="form-check-label" for="mardi">Mardi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mercredi" class="max_jours" name="jours[]" value="Mercredi">
                            <label class="form-check-label" for="mercredi">Mercredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="jeudi" class="max_jours" name="jours[]" value="Jeudi">
                            <label class="form-check-label" for="jeudi">Jeudi</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="vendredi" class="max_jours" name="jours[]" value="Vendredi">
                            <label class="form-check-label" for="vendredi">Vendredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="samedi" class="max_jours" name="jours[]" value="Samedi">
                            <label class="form-check-label" for="samedi">Samedi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dimanche" class="max_jours" name="jours[]" value="Dimanche">
                            <label class="form-check-label" for="dimanche">Dimanche</label>
                        </div>
                        <small class="text-danger" id="max_jours_erreur2"></small>
                    </div>
                </div>
            </div>
            
  
            <!-- Heures disponibles -->
            <div class="mb-3">
              <label for="heure" class="form-label">Heure disponible*</label>
              <select class="form-select" id="heure" name="heure_dispo" required>
                <option value="" selected disabled>Choisissez votre heure de disponibilité</option>
                <option value="08:00">08:00</option>
                <option value="10:00">10:00</option>
                <option value="12:00">12:00</option>
                <option value="14:00">14:00</option>
                <option value="16:00">16:00</option>
                <option value="18:00">18:00</option>
                <option value="20:00">20:00</option>
                <option value="22:00">22:00</option>
              </select>
            </div>
            
            <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" name="valider_inscription" id="valider_ins" value="valider_inscriptionI" >Confirmer l'inscription</button>
        </div>

            <script>
                    let cours = document.getElementById("programmePers_button");
    
             
                    cours.addEventListener("click", function(){
                        nom = cours.value;
                        let input_cache = document.createElement("input");

                        input_cache.type = "hidden";
                        input_cache.name = "cours_a_faire";
                        input_cache.value = nom;

                        let form = document.getElementById("form_modal_perso");
                        form.appendChild(input_cache);
                    })

            </script>


  
          </form>
        </div>
        
      </div>
    </div>
  </div>
    
	


      <!--Footer-->

      <section class="container-fluid" id="footer">
        <div class="row">
            <p>&copy;alpha-fatima-talib-limoges 2025</p>
        </div>
      </section>
      
   

    <!-- Bootstrap 5 JavaScript (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_activite.js"></script>
</body>
</html>
