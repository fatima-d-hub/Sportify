<?php
session_start();
$action = $_GET['action'] ?? null; // la variable action reçoit $GET['action'] si non la valeur null

 // Connexion à la base de données (exemple simple)
 $serveur = "localhost";
 $login = "root";
 $pass = "";
 $nomBD = "sportify";

 if ($action === 'send_code') {

    try {
        // Connexion à MySQL pour vérifier l'existence de la base
        $connexion = new PDO("mysql:host=$serveur", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification de l'existence de la base de données
        $db_verification = $connexion->query("SHOW DATABASES LIKE '$nomBD'");
        if ($db_verification->rowCount() == 0) {
            // Si la base n'existe pas, on ne fait rien, on affiche juste un message d'erreur
            $_SESSION['erreur_email'] = "Email Incorrect";
            header("Location: connexion.php?step=1");
                        exit();
            
        }
        else{
            // Maintenant qu'on a assuré l'existence de la base de données, on se connecte à elle
            $connexion = new PDO("mysql:host=$serveur;dbname=$nomBD", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si la table USERS existe
            $table_verification = $connexion->query("SHOW TABLES LIKE 'USERS'");

            if ($table_verification->rowCount() == 0) {

                // Si la table n'existe pas, on affiche simplement un message d'erreur
                $_SESSION['erreur_email'] = "Email Incorrect";
                header("Location: connexion.php?step=1");
                        exit();
                
            }
            else{

                // Récupération des données du formulaire
                $email = $_POST['email'];

                // Requête de vérification des informations de connexion
                    $verifier_existence_email = "SELECT * FROM USERS WHERE email = :email";
                    $se_trouve = $connexion->prepare($verifier_existence_email);
                    $se_trouve->execute(['email' => $email]);
                    $email_existe = $se_trouve->fetch(PDO::FETCH_ASSOC);

                    if ($email_existe) {

                        $code = rand(1000, 9999);
                        $_SESSION['reset_email'] = $email;
                        $_SESSION['reset_code'] = $code;

                        // Email de confirmation à l'utilisateur
                        $subject = "Sportify : Réinitialisation de votre mot de passe";

                        $body = "Voici le code de vérification pour réinitialiser votre mot de passe : ".$code;
                        
                        $body .= "\n\nCordialement,\nL'équipe Sportify";

                        $headers = "From: Sportify <diallomt2002@gmail.com>\r\n";
                        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                        $headers .= "Reply-To: diallomt2002@gmail.com\r\n";

                        mail($email, $subject, $body, $headers);

                        header("Location: connexion.php?step=2");
                        exit();

                        
                    } 
                    else{
                        // Si l'utilisateur n'existe pas dans la base, on affiche un message d'erreur
                        $_SESSION['erreur_email'] = "Email ou Mot de Passe Incorrect";
                        header("Location: connexion.php?step=1");
                        exit();
                        
                    }
            }
        }
    }
    catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
    }
 }



if ($action === 'verify_code') {
    if ($_POST['code'] == ($_SESSION['reset_code'] ?? null)) {
        header("Location: connexion.php?step=3");
    } else {
        header("Location: connexion.php?step=2&error=1");
    }
    exit;
}

if ($action === 'reset_password') {
    $email = $_SESSION['reset_email'] ?? null;
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm'];

    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBD", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Modification du mot de passe
        $update_password = "UPDATE USERS SET mot_de_passe = :mot_de_passe WHERE email = :email";
        $modifier = $connexion->prepare($update_password);

        // Exécuter la mise à jour avec les paramètres appropriés
        $modifier->execute(['mot_de_passe' => $password, 'email' => $email]);

        

        // Détruire la session de réinitialisation du mot de passe
        unset($_SESSION['reset_email']); // On retire l'email de réinitialisation de la session

        $_SESSION['nouveau_password'] = "Votre mot de passe a été mis à jour !";

        header("Location: connexion.php?step=3");
        exit();

    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    
    
}


?>