let form = document.getElementById("envoyer");

let nom = document.getElementById("nom");
let nom_erreur = document.getElementById("nom_erreur");
let email = document.getElementById("email");
let email_erreur = document.getElementById("email_erreur");

form.addEventListener("click", function(event) {
    let valide = true;
    
    // Expression regulière pour verifier la validé du nom et du prenom
    const nom_valide = /^[A-Za-z]+([ -][A-Za-z]+)*$/;

    // Expression regulière pour verifier la validité de l'email
    const email_valide = /^[^\s@]+@[^\s@\.]+\.[^\s@]+$/;

    // Vérifier que le champ n'est pas vide d'abord
   if (nom.value.trim() === "") {
    nom_erreur.textContent = "Le nom est requis.";
    valide = false;
    } 
    else if (!nom_valide.test(nom.value)) {
        nom_erreur.textContent = "Nom Invalide. Il doit commencer par une lettre et ne contenir que des lettres, tirets ou espaces.";
        valide = false;
    }

    // Vérifier que le champ n'est pas vide d'abord
    if (email.value.trim() === "") {
        email_erreur.textContent = "L'email est requis.";
        valide = false;
    } 
    else if (!email_valide.test(email.value)){
        email_erreur.textContent = "Email Invalide. Il doit contenir '@' et '.'";
        valide = false;
    }

    // Si une erreur est présente, empêcher l'envoi du formulaire
    if (!valide) {
        event.preventDefault();
    }
});


nom.addEventListener("input", function() {
    nom_erreur.textContent = "";
});


email.addEventListener("input", function() {
    email_erreur.textContent = "";
});


//---------------------------------------------------------------
let jours = document.getElementById("service");

jours.addEventListener("change", function(){
    let choix = jours.value;

    if(choix == "individuel"){

        let label_jour = document.getElementById("label_jour");
        let nbjour = document.getElementById("nbjour");

        label_jour.style = "display: initial";
        nbjour.type = "number";
    }
    else{
        let label_jour = document.getElementById("label_jour");
        let nbjour = document.getElementById("nbjour");

        label_jour.style = "display: none";
        nbjour.type = "hidden";
    }
});

