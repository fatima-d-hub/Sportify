let inscription = document.getElementById("sinscrire");

let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let mail = document.getElementById("email");
let paswd1 = document.getElementById("password");
let paswd2 = document.getElementById("confirm-password");

let erreurNom = document.getElementById("erreur-nom");
let erreurPrenom = document.getElementById("erreur-prenom");
let erreurEmail = document.getElementById("erreur-email");
let erreurPassword = document.getElementById("erreur-password");
let erreurConfirm = document.getElementById("erreur-confirm");

let erreur_msg = document.getElementById('email_existe'); //Pour le message d'erreur Email ou Mot de passe Incorrect



inscription.addEventListener("click", function(event){
    let valide = true;

    // Réinitialisation des erreurs
    erreurNom.textContent = "";
    erreurPrenom.textContent = "";
    erreurEmail.textContent = "";
    erreurPassword.textContent = "";
    erreurConfirm.textContent = "";
    

    // Expression regulière pour verifier la validé du nom et du prenom
    const nom_prenom_valide = /^[A-Za-z]+([ -][A-Za-z]+)*$/;

    // Expression regulière pour verifier la validité de l'email
    const email_valide = /^[^\s@]+@[^\s@\.]+\.[^\s@]+$/;

   // Vérifier que les champs ne sont pas vides d'abord
   if (nom.value.trim() === "") {
    erreurNom.textContent = "Le nom est requis.";
    valide = false;
    } 
    else if (!nom_prenom_valide.test(nom.value)) {
        erreurNom.textContent = "Nom Invalide. Il doit commencer par une lettre et ne contenir que des lettres, tirets ou espaces.";
        valide = false;
    }
    

    if (prenom.value.trim() === "") {
        erreurPrenom.textContent = "Le prénom est requis.";
        valide = false;
    } 
    else if (!nom_prenom_valide.test(prenom.value)) {
        erreurPrenom.textContent = "Prénom invalide. Il doit commencer par une lettre et ne contenir que des lettres, tirets ou espaces.";
        valide = false;
    }

    if (mail.value.trim() === "") {
        erreurEmail.textContent = "L'email est requis.";
        valide = false;
    } 
    else if (!email_valide.test(mail.value)){
        erreurEmail.textContent = "Email Invalide. Il doit contenir '@' et '.'";
        valide = false;
    }

    if(paswd1.value.trim() === ""){
        erreurPassword.textContent = "Le mot de passe est réquis.";
        valide = false;
    }

    else if (paswd1.value.trim().length < 6 || !/[a-zA-Z]/.test(paswd1.value.trim()) || !/[0-9]/.test(paswd1.value.trim())) 
    {
        erreurPassword.textContent = "Mot de passe Invalide. Il doit contenir au moins 6 caractères, une lettre et un chiffre.";
        valide = false;
    }

    if (paswd2.value.trim() === "") {
        erreurConfirm.textContent = "Veuillez confirmer le mot de passe.";
        valide = false;
    } 
    else if (paswd1.value !== paswd2.value) {
        erreurConfirm.textContent = "Les mots de passe ne correspondent pas.";
        valide = false;
    }


    if (!valide) {
        event.preventDefault(); // On bloque l’envoi du formulaire
    }
});
    
nom.addEventListener("input", function () {
    erreurNom.textContent = "";
});

prenom.addEventListener("input", function () {
    erreurPrenom.textContent = "";
});

mail.addEventListener("input", function () {
    erreurEmail.textContent = "";
});

paswd1.addEventListener("input", function () {
    const valeur = paswd1.value.trim();
    
    if (valeur.length < 6 || !/[a-zA-Z]/.test(valeur) || !/[0-9]/.test(valeur)) {
        erreurPassword.textContent = "Le mot de passe doit contenir au moins 6 caractères, une lettre et un chiffre !";
    } else {
        erreurPassword.textContent = "";
    }
});



paswd2.addEventListener("input", function () {
    erreurConfirm.textContent = "";
});

//Affichage du message Email ou Mot de passe Incorrect
erreur_msg.textContent = "Cet email existe déjà !";
erreur_msg.style = "color: red";

//Effacer l'erreur dès que l'utilisateur commence à ecrire
mail.addEventListener('input', supprimer_erreur);
paswd1.addEventListener('input', supprimer_erreur);

function supprimer_erreur() {
    if (erreur_msg) {
        erreur_msg.textContent = ""; // Effacer le message 
    }
}

