<?php
    session_start(); // Démarre ou reprend la session.

    if (isset($_GET['deconnexion'])) {
        // Si l'utilisateur veut se déconnecter.
        session_unset(); // Supprime toutes les variables de session.
        session_destroy(); // Détruit la session.
        header('Location: index.php'); // redirection vers la même page après déconnexion.
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
    
    <link rel="stylesheet" href="recap_inscription.css">
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


    <?php

        $serveur = "localhost";
        $login = "root";
        $pass = "";
        $nomBD = "sportify";

        try{
            $connexion = new PDO("mysql:host=$serveur; dbname=$nomBD", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Creation de la table utilisateur
            $creation_table = "CREATE TABLE IF NOT EXISTS COURS(
                                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                nom VARCHAR(50)  NOT NULL,
                                prenom VARCHAR(50) NOT NULL,
                                date_naissance DATE  NOT NULL,
                                telephone VARCHAR(50),
                                type_cours VARCHAR(50) NOT NULL,
                                libelle_cours VARCHAR(50) NOT NULL,
                                niveau_cours VARCHAR(50) NOT NULL,
                                jours_dispo VARCHAR(50),
                                heure_dispo VARCHAR(50)
            )";
            $connexion->exec($creation_table);

            
            //Insertion des données
            if(isset($_POST["valider_inscription"])){

                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $dateN = $_POST["dateN"];
                $telephone = $_POST["telephone"];
                $niveau = $_POST["niveau"];
                $heure_dispo = "";
                $jours_dispo = "";
            
                // Pour savoir s'il s'agit d'un cours collectif ou individuel
                if($_POST["cours_a_faire"] == "individuel")
                {
                    $libelle = $_POST["cours_souhaite"];
                    $type_cours = "individuel";
                    $heure_dispo = $_POST["heure_dispo"];
                    // Récupérer les jours sélectionnés dans un tableau
                    $jours_dispo = $_POST['jours']; 

                    // Créer une chaîne avec les jours séparés par un espace
                    $jours_str = implode(" ", $jours_dispo); 
                }
                else
                {
                    $libelle = $_POST["cours_a_faire"];
                    $type_cours = "collectif";
                    $heure_dispo = "";
                    $jours_str = "";
                }

                


                $insert = "INSERT INTO COURS(nom, prenom, date_naissance, telephone, type_cours, libelle_cours, niveau_cours, jours_dispo, heure_dispo ) 
                            VALUES (:nom, :prenom, :date_naissance, :telephone, :type_cours, :libelle_cours, :niveau_cours, :jours_dispo, :heure_dispo)";

                $ajout = $connexion->prepare($insert);
                $ajout->execute(['nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $dateN, 'telephone' => $telephone, 'type_cours' => $type_cours,
                                    'libelle_cours' => $libelle, 'niveau_cours' => $niveau, 'jours_dispo' => $jours_str, 'heure_dispo' => $heure_dispo ]);
                

                // Enregistrer les détails de l'inscription dans la session.
                $_SESSION['inscription_details'] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'dateN' => $dateN,
                    'telephone' => $telephone,
                    'type_cours' => $type_cours,
                    'libelle' => $libelle,
                    'niveau_cours' => $niveau,
                    'jours_dispo' => $jours_str,
                    'heure_dispo' => $heure_dispo
                ];


                // Rediriger vers la même page pour éviter la soumission répétée du formulaire en cas de rechargement
                header('Location: recap_inscription.php');
                exit(); 
            }
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


        // Vérifiez si les données de l'inscription sont stockées dans la session
        if (isset($_SESSION['inscription_details'])) {
            // Récupération des données de l'inscription
            $details = $_SESSION['inscription_details'];

            $num_tel = "";
            $label_tel = "";

            $label_heure = "";
            $heure = "";

            $label_jours = "";
            $jours = "";

            if($details['telephone'] !== ""){
                $num_tel = $details['telephone'];
                $label_tel = "Téléphone: ";
            }
            if($details['heure_dispo'] !== ""){
                $label_heure = "Heure Disponible: ";
                $heure = $details["heure_dispo"];
            }
            if($details["jours_dispo"] !== ""){
                $label_jours = "Jour(s) Disponible(s): ";
                $jours = $details["jours_dispo"];
            }

            echo '
                        <section class="container-fluid" id="accueil">
                            <div class="container">
                                <div class="row text-center">
                                    <p> Récapitulatif de votre Inscription</p>
                                </div>
                                <div class = "row d-flex justify-content-center">
                                    
                                    <div class="col-md-6 text-center">
                                        <h4><strong>Nom : </strong>' . $details["nom"] . '</h4> 
                                        <h4><strong>Prénoms: </strong>'. $details["prenom"] . ' </h4>
                                        <h4><strong>Date de Naissance: </strong>'. $details["dateN"] . '</h4>
                                        <h4><strong>'. $label_tel .' </strong>' . $num_tel . '</h4>
                                        <h4><strong>Type de Cours: </strong>'. $details["type_cours"] . '</h4>
                                        <h4><strong>Cours choisi: </strong>' . $details["libelle"] . '</h4>
                                        <h4><strong>Niveau choisi: </strong>' . $details["niveau_cours"] . '</h4>
                                        <h4><strong>'. $label_jours . '</strong>' . $jours . '</h4>
                                        <h4><strong>'. $label_heure .' </strong>' . $heure . '</h4>            
                                    </div>
                                    
                                </div>
                            </div>
                        </section>
                    
                    ';

        }

    ?>




    <!--Footer-->

    <section class="container-fluid fixed-bottom" id="footer">
        <div class="row">
            <p>&copy;alpha-fatima-talib-limoges 2025</p>
        </div>
    <section>
   
    <!-- Bootstrap 5 JavaScript (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
