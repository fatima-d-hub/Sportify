<?php
    session_start();

    // Vérification si le formulaire a été soumis
    if (isset($_POST['devis_envoie'])) {
        // Récupérer les données du formulaire
        $civilite = $_POST['civilite'];
        $nom_complet = $_POST['nom_complet'];
        $email = $_POST['email'];
        $formation = $_POST['formation'];
        $nbjours = "4"; // Nombre de jours pour les cours collectifs 
        $service = $_POST['service'];
        $niveau = $_POST['niveau'];

        if($service == "individuel"){
            $nbjours = $_POST['nbjours'];
        }

        // Définir les tarifs pour chaque combinaison de formation, service et niveau
        $tarifs = [
            'yoga' => [
                'individuel' => [
                    'debutant' => 10,
                    'intermediaire' => 12,
                    'avance' => 15
                ],
                'collectif' => [
                    'debutant' => 3,
                    'intermediaire' => 4,
                    'avance' => 5
                ]
            ],
            'fitness' => [
                'individuel' => [
                    'debutant' => 10,
                    'intermediaire' => 13,
                    'avance' => 16
                ],
                'collectif' => [
                    'debutant' => 3,
                    'intermediaire' => 4,
                    'avance' => 5
                ]
            ],
            'pilates' => [
                'individuel' => [
                    'debutant' => 8,
                    'intermediaire' => 10,
                    'avance' => 12
                ],
                'collectif' => [
                    'debutant' => 3,
                    'intermediaire' => 5,
                    'avance' => 7
                ]
            ],
            'musculation' => [
                'individuel' => [
                    'debutant' => 10,
                    'intermediaire' => 12,
                    'avance' => 15
                ],
                'collectif' => [
                    'debutant' => 4,
                    'intermediaire' => 5,
                    'avance' => 6
                ]
            ],
            'cycling' => [
                'individuel' => [
                    'debutant' => 12,
                    'intermediaire' => 15,
                    'avance' => 18
                ],
                'collectif' => [
                    'debutant' => 5,
                    'intermediaire' => 7,
                    'avance' => 9
                ]
            ]
        ];

        // Calcul du tarif en fonction des choix de l'utilisateur
        $tarif_par_jour = $tarifs[$formation][$service][$niveau];

        // Calcul du total pour le mois
        $total_devis = $tarif_par_jour * $nbjours * 4;

        // Email de confirmation à l'utilisateur
        $subject_user = "Sportify : Confirmation de votre demande de devis";
        $body_user = "Bonjour $civilite $nom_complet,\n\n";
        $body_user .= "Nous avons bien reçu votre demande de devis pour la formation \"$formation\".\n";
        $body_user .= "Voici un résumé de votre demande :\n\n";
        $body_user .= "Nom Complet : $nom_complet\n";
        $body_user .= "Email : $email\n";
        $body_user .= "Formation choisie : $formation\n";
        $body_user .= "Type de service : $service\n";
        $body_user .= "Niveau : $niveau\n";
        $body_user .= "Nombre de jours : $nbjours\n";
        $body_user .= "Tarif par jour : $tarif_par_jour EUR\n";
        $body_user .= "Total devis pour le mois : $total_devis EUR\n\n";
        $body_user .= "\nVeuillez nous contacter pour plus de renseignements.\n\n";
        $body_user .= "Cordialement,\nL'équipe Sportify";

        $headers_user = "From: Sportify <diallomt2002@gmail.com>\r\n";
        $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers_user .= "Reply-To: diallomt2002@gmail.com\r\n";

        mail($email, $subject_user, $body_user, $headers_user);

        $_SESSION['confirmation_devis'] = "Veuillez consulter votre email pour voir le devis demandé!";

        header("Location: devis.php#footer");
        exit();

    }


?>