<?php
    session_start();

    include("gestion_inscription.php");

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style_inscription.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <header>
        <nav class="navbar navbar-expand-md bg-info fixed-top" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="brand">
                    <img src="logo/sportify.png" alt="Mon Logo" width="50" height="50" class="d-inline-block">
                    Sportify
                </a>
                <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#monMenu" aria-controls="monMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="monMenu">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="activites.php">Activités</a></li>
                        <li class="nav-item"><a class="nav-link" href="devis.php">Devis</a></li>
                        <li class="nav-item"><a class="nav-link" href="./index.php#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Formulaire-->

    <section class="container">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="mb-3">Inscription</h4>
                <div class="card-body">
                    <form method="post" action="">
                      <div class="mb-3">
                            <label for="nom" class="form-label">Nom*</label>
                            <input type="text" class="form-control" id="nom" name="user_nom" required>
                            <small class="text-danger" id="erreur-nom"></small>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom*</label>
                            <input type="text" class="form-control" id="prenom" name="user_prenom" required>
                            <small class="text-danger" id="erreur-prenom"></small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="user_email" required>
                            <small class="text-danger" id="erreur-email"></small>

                            <?php if (!empty($_SESSION['erreur_email'])) : ?>
                                <small class="text-danger" id="email_existe"></small>
                                <?php unset($_SESSION['erreur_email']); // Supprime l'erreur après affichage ?>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe*</label>
                            <input type="password" class="form-control" id="password" name="user_password1" required>
                            <small class="text-danger" id="erreur-password"></small>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirmer le mot de passe*</label>
                            <input type="password" class="form-control" id="confirm-password" name="user_password2" required>
                            <small class="text-danger" id="erreur-confirm"></small>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="robot" required>
                            <label class="condition" for="robot">Je ne suis pas un robot</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="sinscrire" id = "sinscrire">S'inscrire</button>
                    </form>
                    <div class="mt-3 text-center">
                        Si vous avez déjà un compte, <a href="connexion.php" class="small-link"> connectez-vous</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <!--Footer-->

    <section class="container-fluid" id="footer">
        <div class="row">
            <p>&copy; alpha-fatima-talib-limoges 2025</p>
        </div>
    </section>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_insc.js"></script>



</body>
</html>

