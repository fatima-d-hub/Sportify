// Gestion du formulaire de connexion
let connexion = document.getElementById("connexion"); 
let email = document.getElementById("email"); 
let password = document.getElementById("password"); 
let erreur_message_email = document.getElementById("erreur_email");
let erreur_message_password = document.getElementById("erreur_password");

let erreur_msg = document.getElementById('erreur_infos'); //Pour le message d'erreur Email ou Mot de passe Incorrect


connexion.addEventListener("click", function (event) {
    let erreur_email = "";
    let erreur_password = "";

    // Réinitialiser les messages d'erreur avant validation
    erreur_message_email.textContent = "";
    erreur_message_password.textContent = "";

    const email_valide = /^[^\s@]+@[^\s@\.]+\.[^\s@]+$/;

    if (!email_valide.test(email.value)) {
        erreur_email = "Email Invalide. Il doit contenir '@' et '.'";
    }

    
    const password_value = password.value.trim();

    if (password_value.length < 6 || !/[a-zA-Z]/.test(password_value) || !/[0-9]/.test(password_value)) 
    {
        erreur_password = "Mot de passe Invalide. Il doit contenir au moins 6 caractères, une lettre et un chiffre.";
    }
    
    // Si une erreur existe, empêcher la soumission et afficher les messages d'erreur
    if (erreur_email !== "" || erreur_password !== "") {
        event.preventDefault(); // Empêche l'envoi du formulaire
        erreur_message_email.textContent = erreur_email;
        erreur_message_password.textContent = erreur_password;
    }
});

// Efface l'erreur dès que l'utilisateur commence à modifier un champ
email.addEventListener("input", function () {
    erreur_message_email.textContent = ""; // Réinitialiser l'erreur de l'email
});

password.addEventListener("input", function () {
    erreur_message_password.textContent = ""; // Réinitialiser l'erreur du mot de passe
});


//Affichage du message Email ou Mot de passe Incorrect
erreur_msg.textContent = "Email ou Mot de passe Incorrect";
erreur_msg.style = "color: red";


//Effacer l'erreur dès que l'utilisateur commence à ecrire
email.addEventListener('input', supprimer_erreur);
password.addEventListener('input', supprimer_erreur);

function supprimer_erreur() {
    if (erreur_msg) {
        erreur_msg.textContent = ""; // Effacer le message 
    }
}

