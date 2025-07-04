<?php

if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
    // Connexion à la base de données (exemple simple)
    $serveur = "localhost";
    $login = "root";
    $pass = "";
    $nomBD = "sportify";

    try {
        // Connexion à MySQL pour vérifier l'existence de la base
        $connexion = new PDO("mysql:host=$serveur", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification de l'existence de la base de données
        $db_verification = $connexion->query("SHOW DATABASES LIKE '$nomBD'");
        if ($db_verification->rowCount() == 0) {
            // Si la base n'existe pas, on ne fait rien, on affiche juste un message d'erreur
            $_SESSION['erreur_connexion'] = "Email ou Mot de Passe Incorrect";
            
        }
        else{
            // Maintenant qu'on a assuré l'existence de la base de données, on se connecte à elle
            $connexion = new PDO("mysql:host=$serveur;dbname=$nomBD", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si la table USERS existe
            $table_verification = $connexion->query("SHOW TABLES LIKE 'USERS'");

            if ($table_verification->rowCount() == 0) {

                // Si la table n'existe pas, on affiche simplement un message d'erreur
                $_SESSION['erreur_connexion'] = "Email ou Mot de Passe Incorrect";
                
            }
            else{

                // Récupération des données du formulaire
                $email = $_POST['user_email'];
                $password = $_POST['user_password'];

                // Requête de vérification des informations de connexion
                $verifier_existence_user = "SELECT * FROM USERS WHERE email = :email AND mot_de_passe = :password";
                $se_trouve = $connexion->prepare($verifier_existence_user);
                $se_trouve->execute(['email' => $email, 'password' => $password]);
                $user = $se_trouve->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Utilisateur trouvé, connexion réussie
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_nom'] = $user['nom']; // Stockage du nom
                    $_SESSION['user_prenom'] = $user['prenom']; // Stockage du prénom

                    header('Location: index.php'); // Redirection vers la page d'accueil
                    exit();
                } else {
                    // Si l'utilisateur n'existe pas dans la base, on affiche un message d'erreur
                    $_SESSION['erreur_connexion'] = "Email ou Mot de Passe Incorrect";
                    header('Location: connexion.php');
                    exit();
                }

            }

        
        }

        

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>