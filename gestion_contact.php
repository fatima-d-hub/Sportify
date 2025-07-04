<?php

    session_start(); // Démarre ou reprend la session.

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['message'])){
       
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        //Adresse du destinaire
        $to = "diallomt2002@gmail.com";

        $subject = "📬 Nouveau message de $nom $prenom";

        $headers = "From: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "Reply-To: $email\r\n";

        $body = $message;

        //Envoie du mail
        if(mail($to, $subject, $body, $headers)){

           // Envoi de l'email de confirmation à l'utilisateur
           $confirmation_subject = " Confirmation de réception de votre message";
           $confirmation_body = "Bonjour $prenom $nom,\n\nNous avons bien reçu votre message.\n\nMerci de nous avoir contactés. Nous reviendrons vers vous sous peu.\n\nCordialement,\nL'équipe Sportify";
           $confirmation_headers = "From: Sportify <diallomt2002@gmail.com>\r\n";
           $confirmation_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
           $confirmation_headers .= "Reply-To: diallomt2002@gmail.com\r\n";

           // Envoi du mail de confirmation
           mail($email, $confirmation_subject, $confirmation_body, $confirmation_headers);


        }

       $_SESSION["confirmation_msg"] = "Nous avons bien reçu votre message!";

            
        // 5. Rediriger vers la même page pour éviter la re-soumission
        header("Location: index.php#contact");
        exit();

    }

    
?>