//Gestion du mot de passe oublié

//Partie 1 - Modale 1 - Vérification de la validité de l'email
document.addEventListener("DOMContentLoaded", function () {
    let reinitiliser = document.getElementById("reinitilisation");
    let email_modal = document.getElementById("email_modal");
    let erreur_email_modal = document.getElementById("erreur_email_modal");

    if (reinitiliser) {
        reinitiliser.addEventListener("click", function (event) {
            let erreur_email = "";

            erreur_email_modal.textContent = "";

            const email_valide = /^[^\s@]+@[^\s@\.]+\.[^\s@]+$/;

            if (!email_valide.test(email_modal.value)) {
                erreur_email = "Email Invalide. Il doit contenir '@' et '.'";
            }

            if (erreur_email !== "") {
                event.preventDefault(); // Empêche l'envoi du formulaire
                erreur_email_modal.textContent = erreur_email;
            }
        });
    }

    if (email_modal) {
        email_modal.addEventListener("input", function () {
            erreur_email_modal.textContent = "";
        });
    }
});


//Partie 2 - Modal 3 - Vérification du mot de passe

document.addEventListener("DOMContentLoaded", function () {
    let enregistrer_nouveau_mot_de_passe = document.getElementById("enregistrer_nouveau_mot_de_passe");

    let nouveau_mot_de_passe = document.getElementById("nouveau_mot_de_passe");
    let confirm_nouveau_mot_de_passe = document.getElementById("confirm_nouveau_mot_de_passe");

    let erreur_nouveau_mot_de_passe = document.getElementById("erreur_nouveau_mot_de_passe");
    let erreur_confirm_nouveau_mot_de_passe = document.getElementById("erreur_confirm_nouveau_mot_de_passe");

    if (enregistrer_nouveau_mot_de_passe) {
        enregistrer_nouveau_mot_de_passe.addEventListener("click", function (event) {
            let valide = true;

            erreur_nouveau_mot_de_passe.textContent = "";
            erreur_confirm_nouveau_mot_de_passe.textContent = "";

            if(nouveau_mot_de_passe.value.trim() === ""){
                erreur_nouveau_mot_de_passe.textContent = "Le mot de passe est réquis.";
                valide = false;
            }
        
            else if (nouveau_mot_de_passe.value.trim().length < 6 || !/[a-zA-Z]/.test(nouveau_mot_de_passe.value.trim()) || !/[0-9]/.test(nouveau_mot_de_passe.value.trim())) 
            {
                erreur_nouveau_mot_de_passe.textContent = "Mot de passe Invalide. Il doit contenir au moins 6 caractères, une lettre et un chiffre.";
                valide = false;
            }
        
            if (confirm_nouveau_mot_de_passe.value.trim() === "") {
                erreur_confirm_nouveau_mot_de_passe.textContent = "Veuillez confirmer le mot de passe.";
                valide = false;
            } 
            else if (nouveau_mot_de_passe.value !== confirm_nouveau_mot_de_passe.value) {
                erreur_confirm_nouveau_mot_de_passe.textContent = "Les mots de passe ne correspondent pas.";
                valide = false;
            }
        
        
            if (!valide) {
                event.preventDefault(); // On bloque l’envoi du formulaire
            }
        });

        nouveau_mot_de_passe.addEventListener("input", function(){
            erreur_nouveau_mot_de_passe.textContent = "";
        });
        
        
        confirm_nouveau_mot_de_passe.addEventListener("input", function () {
            erreur_confirm_nouveau_mot_de_passe.textContent = "";
        });

    }
});

