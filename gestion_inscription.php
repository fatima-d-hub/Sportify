<?php

$serveur = "localhost";
$login = "root";
$pass = "";
$nomBD = "sportify";

try{
   // Connexion à MySQL sans spécifier de base de données pour vérifier l'existence de la base
   $connexion = new PDO("mysql:host=$serveur", $login, $pass);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // Creation de la base de données
    $creation_bd = "CREATE DATABASE IF NOT EXISTS $nomBD";
    $connexion->exec($creation_bd);
   

   // Maintenant qu'on a la base de données, on se connecte à elle
   $inscription = new PDO("mysql:host=$serveur;dbname=$nomBD", $login, $pass);
   $inscription->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Creation de la table utilisateur
    $creation_table = "CREATE TABLE IF NOT EXISTS USERS(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nom VARCHAR(50)  NOT NULL,
                        prenom VARCHAR(50) NOT NULL,
                        email VARCHAR(50) UNIQUE NOT NULL,
                        mot_de_passe VARCHAR(50) NOT NULL
    )";
    $inscription->exec($creation_table);

    
    //Insertion des données
    if(!empty($_POST["user_email"]) && !empty($_POST["user_password1"]) && !empty($_POST["user_nom"]) && !empty($_POST["user_prenom"])){

        $nom = $_POST["user_nom"];
        $prenom = $_POST["user_prenom"];
        $email = $_POST["user_email"];
        $password = $_POST["user_password1"];
            
        // Vérification si l'email existe déjà dans la base de données (en utilisant une requête préparée)
        $verifier_email = "SELECT COUNT(*) FROM USERS WHERE email = :email";
        $existe_email = $inscription->prepare($verifier_email);
        $existe_email->execute(['email' => $email]);
        $count = $existe_email->fetchColumn();  // Cette fonction renvoie le nombre de lignes
    
        if ($count > 0) {  // Si l'email existe déjà 
            $_SESSION['erreur_email'] = "Cet email existe déjà"; // Stocke l'erreur
            header('Location: inscription.php');
            exit();
        } 
        else {
            // Si l'email n'existe pas encore, on insère les données dans la base
            $insert = "INSERT INTO USERS(nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";
            $enregistrer_user = $inscription->prepare($insert);
            $enregistrer_user->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'mot_de_passe' => $password]);

            $_SESSION['user_nom'] = $nom;
            $_SESSION['user_prenom'] = $prenom;

            header('Location: connexion.php'); // Redirection après l'insertion
            exit();
        }
    }
    
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

?>
