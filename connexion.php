<?php

    session_start();

    include('gestion_connexion.php');
    
    // Gestion des actions
    $step = $_GET['step'] ?? 0;
    $error = $_GET['error'] ?? '';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_connexion.css">
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
                        <li class="nav-item"><a class="nav-link" href="activites.php">Nos Activités</a></li>
                        <li class="nav-item"><a class="nav-link" href="devis.php">Devis</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</header>

<!-- Partie formulaire Connexion -->
<section>
        <div class="login-box">
            <h4 class="mb-3">Connexion</h4>
            <form method="post" action="" id="form-connexion">
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="user_email" placeholder="Email" required>
                    <small class="text-danger" id="erreur_email"></small>
                </div>
                <div class="mb-3" id="error_connect">
                    <input type="password" class="form-control" id="password" name="user_password" placeholder="Mot de passe" required>
                    <small class="text-danger" id="erreur_password"></small>

                    <?php if (!empty($_SESSION['erreur_connexion'])) : ?>
                        <small class="text-danger" id ="erreur_infos"></small>
                        <?php unset($_SESSION['erreur_connexion']); ?>
                    <?php endif; ?>
                    
                </div>
                <button type="submit" class="btn btn-primary w-100" id = "connexion">Se connecter</button>
            </form>

            <div class="mt-3">
            <a href="?step=1" class="d-block mt-2 connect">Mot de passe oublié ?</a>
                <a href="inscription.php" class="d-block mt-2 connect">Inscris-toi</a>
            </div>
        </div>
    </section>

<!-- MODAL ÉTAPE 1 -->
<?php if ($step == 1): ?>
<div class="modal fade show d-block" id="emailModal" tabindex="-1" style="background: rgba(0,0,0,0.5);">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <h5 class="modal-title">Réinitialisation de mot de passe</h5>
      <form method="POST" action="reset.php?action=send_code">
        <input type="email" name="email" id="email_modal" class="form-control my-2" placeholder="Entrez votre email" required>
        <small class="text-danger" id="erreur_email_modal"></small>
        <?php if (!empty($_SESSION['erreur_email'])): ?>
          <p class="text-danger">Cet email n'existe pas !</p>
          <?php unset($_SESSION['erreur_email']); ?>
        <?php endif; ?>
        <button class="btn btn-primary w-100" type="submit" id="reinitilisation">Recevoir le code</button>
        <!-- Annuler redirige vers la page sans ?step -->
        <a href="connexion.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>


<!-- MODAL ÉTAPE 2 -->
<?php if ($step == 2): ?>
<div class="modal fade show d-block" id="codeModal" tabindex="-1" style="background: rgba(0,0,0,0.5);">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <h5 class="modal-title">Code de vérification</h5>
      <form method="POST" action="reset.php?action=verify_code">
        <label for="code">Entrez le code reçu :</label>
        <input type="text" name="code" class="form-control my-2" required>
        <?php if ($error): ?>
          <p class="text-danger">Le code est incorrect.</p>
        <?php endif; ?>
        <button class="btn btn-success w-100" type="submit">Valider</button>
        <!-- Annuler redirige à l'accueil -->
        <a href="connexion.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- MODAL ÉTAPE 3 -->
<?php if ($step == 3): ?>
<div class="modal fade show d-block" id="pwdModal" tabindex="-1" style="background: rgba(0,0,0,0.5);">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <h5 class="modal-title">Nouveau mot de passe</h5>
      <form method="POST" action="reset.php?action=reset_password">
        <input type="password" name="password" id="nouveau_mot_de_passe" class="form-control my-2" placeholder="Nouveau mot de passe" required>
        <small class="text-danger" id="erreur_nouveau_mot_de_passe"></small>
        <input type="password" name="confirm" id="confirm_nouveau_mot_de_passe" class="form-control my-2" placeholder="Confirmez le mot de passe" required>
        <small class="text-danger" id="erreur_confirm_nouveau_mot_de_passe"></small>
        <small class="text-danger" id="erreur_nouveau_mot_de_passe"></small>
        <button class="btn btn-primary w-100" id="enregistrer_nouveau_mot_de_passe" type="submit">Enregistrer</button>
        <!-- Annuler redirige à l'accueil -->
        <a href="connexion.php" id="annulation" class="btn btn-secondary w-100 mt-2">Annuler</a>
        <?php if (!empty($_SESSION['nouveau_password'])): ?>
          <p style="color: green; font-weight: bold; text-align: center;"><?php echo $_SESSION['nouveau_password'];?></p>
          <a href="connexion.php" class="btn btn-secondary w-100 mt-2">Retour</a>
          <script>
                    let nouveau_mot_de_passe = document.getElementById("nouveau_mot_de_passe");
                    let confirm_nouveau_mot_de_passe = document.getElementById("confirm_nouveau_mot_de_passe");

                    let enregistrer_nouveau_mot_de_passe = document.getElementById("enregistrer_nouveau_mot_de_passe");

                    let annulation = document.getElementById("annulation");

                    nouveau_mot_de_passe.disabled = true;
                    confirm_nouveau_mot_de_passe.disabled = true;
                    enregistrer_nouveau_mot_de_passe.disabled = true;
                    annulation.style.pointerEvents = "none";  // empêche tout clic
          </script>
          <?php unset($_SESSION['nouveau_password']); ?>
        <?php endif; ?>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>


    <!--Footer-->

    <section class="container-fluid fixed-bottom" id="footer">
        <div class="row">
            <p>&copy; alpha-fatima-talib-limoges 2025</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scriptconnect.js"></script>
    <script src="script_pass_oublie.js"></script>
    
</body>
</html>
