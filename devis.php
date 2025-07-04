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
    <title>Demande de devis - Sportify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_devi.css">
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
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="activites.php">Activités</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Devis</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
            </ul>

            <!-- Si l'utilisateur est connecté, afficher "Se déconnecter", sinon "Se connecter" -->
            <?php if (isset($_SESSION['user_email'])): ?>
                    <span class="navbar-text me-3">
                         <?php echo "<strong>" . strtoupper($_SESSION['user_nom']). ' '. strtoupper($_SESSION['user_prenom']) . "</strong>"; // Affiche l'email de l'utilisateur ?> 
                    </span>
                    <a href="index.php?deconnexion=true" class="btn btn-danger">Se déconnecter</a>
                <?php else: ?>
                    
                    <a href="connexion.php" class="btn btn-primary" id="login" style="font-weight: bold;">Se connecter</a>
                <?php endif; ?>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Demander un devis</h2>

                    <form method="post" action="gestion_devis.php">

                        <!-- Civilité -->
                        <div class="mb-3">
                            <label class="form-label">Civilité*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilite" id="madame" value="madame" required>
                                <label class="form-check-label" for="Madame">Madame</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilite" id="monsieur" value="monsieur">
                                <label class="form-check-label" for="Monsieur">Monsieur</label>
                            </div>
                        </div>  

                        <!-- Nom & Email -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom complet*</label>
                                <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom_complet" required>
                                <small id="nom_erreur" class="text-danger"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Adresse Email*</label>
                                <input type="email" class="form-control" id="email" placeholder="exemple@mail.com" name="email" required>
                                <small id="email_erreur" class="text-danger"></small>
                            </div>
                        </div>


                        <!-- Service & Niveau -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">Service souhaité*</label>
                                <select class="form-select" id="service" name="service" required>
                                    <option value="" selected disabled >Choisissez un service</option>
                                    <option value="individuel">Coaching individuel</option>
                                    <option value="collectif">Cours collectif</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="niveau" class="form-label">Niveau*</label>
                                <select class="form-select" id="niveau" name="niveau" required>
                                    <option value="" selected disabled>Choisissez un niveau</option>
                                    <option value="debutant">Débutant</option>
                                    <option value="intermediaire">Intermédiaire</option>
                                    <option value="avance">Avancé</option>
                                </select>
                            </div>
                        </div>

                        <!-- Formation souhaitée -->
                        <div class="mb-3">
                            <label class="form-label">Formation souhaitée*</label><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="formation" id="yoga" value="yoga" required>
                                        <label class="form-check-label" for="yoga">Yoga</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="formation" id="cycling" value="cycling">
                                        <label class="form-check-label" for="cycling">Cycling</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="formation" id="musculation" value="musculation">
                                        <label class="form-check-label" for="musculation">Musculation</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="formation" id="fitness" value="fitness">
                                        <label class="form-check-label" for="fitness">Fitness</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="formation" id="pilates" value="pilates">
                                        <label class="form-check-label" for="pilates">Pilates</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label for="nbjour" class="form-label" id="label_jour" style>Nombre de jours*</label>
                                        <input type="hidden" class="form-control" id="nbjour" min="1" max="5" name="nbjours" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary button_devis" id="envoyer" name="devis_envoie">Envoyer la demande</button>
                        </div>

                    </form>
                    <div class="row mt-3">
                        <?php
                                        // Vérifie si le message de confirmation existe dans la session
                                        if (isset($_SESSION['confirmation_devis'])) {
                                            echo '<p style="color: green; font-weight: bold; text-align: center;">' . $_SESSION['confirmation_devis'] . '</p>';
                                                            
                                            // Après l'affichage, on supprime le message pour qu'il ne soit pas affiché à nouveau
                                            unset($_SESSION['confirmation_devis']);
                                        }
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>


    <section class="container-fluid" id="footer">
        <div class="row">
            <p>&copy; alpha-fatima-talib-limoges 2025</p>
        </div>
    </section>

<script src="script_devi.js"></script>
</body>
</html>

