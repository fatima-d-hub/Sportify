let form = document.getElementById("envoyer");

// Récupère les éléments du formulaire
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let email = document.getElementById("email");
let msg = document.getElementById("msg");

// Récupère les paragraphes pour les messages d'erreur
let erreur_nom = document.getElementById("erreur_nom");
let erreur_prenom = document.getElementById("erreur_prenom");
let erreur_email = document.getElementById("erreur_email");
let erreur_msg = document.getElementById("erreur_msg");

// Ecoute l'événement de soumission du formulaire
form.addEventListener("click", function(event) {
    let valide = true;

    // Réinitialiser les messages d'erreur
    erreur_nom.textContent = "";
    erreur_prenom.textContent = "";
    erreur_email.textContent = "";
    erreur_msg.textContent = "";

    // Expression regulière pour verifier la validé du nom et du prenom
    const nom_prenom_valide = /^[A-Za-z]+([ -][A-Za-z]+)*$/;

     // Expression regulière pour verifier la validité de l'email
     const email_valide = /^[^\s@]+@[^\s@\.]+\.[^\s@]+$/;

    // Vérifier que les champs ne sont pas vides d'abord
   if (nom.value.trim() === "") {
        erreur_nom.textContent = "Le nom est requis.";
        valide = false;
    } 
    else if (!nom_prenom_valide.test(nom.value)) {
        erreur_nom.textContent = "Nom Invalide. Il doit commencer par une lettre et ne contenir que des lettres, tirets ou espaces.";
        valide = false;
    }
    

    if (prenom.value.trim() === "") {
        erreur_prenom.textContent = "Le prénom est requis.";
        valide = false;
    } 
    else if (!nom_prenom_valide.test(prenom.value)) {
        erreur_prenom.textContent = "Prénom invalide. Il doit commencer par une lettre et ne contenir que des lettres, tirets ou espaces.";
        valide = false;
    }

    if (email.value.trim() === "") {
        erreur_email.textContent = "L'email est requis.";
        valide = false;
    } 
    else if (!email_valide.test(email.value)){
        erreur_email.textContent = "Email Invalide. Il doit contenir '@' et '.'";
        valide = false;
    }

    if (msg.value.trim() === "") {
        erreur_msg.textContent = "Le message ne doit pas être vide.";
        valide = false;
    }

    // Si une erreur est présente, empêcher la soumission
    if (!valide) {
        event.preventDefault();
    }
});

// Efface l'erreur dès que l'utilisateur commence à modifier les champs
nom.addEventListener("input", function () {
    erreur_nom.textContent = "";
});

prenom.addEventListener("input", function () {
    erreur_prenom.textContent = "";
});

email.addEventListener("input", function () {
    erreur_email.textContent = "";
});

msg.addEventListener("input", function () {
    erreur_msg.textContent = "";
});