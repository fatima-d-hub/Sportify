
function resetForm(nom_id, prenom_id, telephone_id, erreur_nom_id, erreur_prenom_id, erreur_telephone_id){
    let nom = document.getElementById(nom_id);
    let prenom = document.getElementById(prenom_id);
    let telephone = document.getElementById(telephone_id);
    let erreur_nom = document.getElementById(erreur_nom_id);
    let erreur_prenom = document.getElementById(erreur_prenom_id);
    let erreur_telephone = document.getElementById(erreur_telephone_id);
    let erreur_jours = document.getElementById("max_jours_erreur2");
    let jours = document.getElementsByName("jours[]");

    if (nom) nom.value = "";
    if (prenom) prenom.value = "";
    if (telephone) telephone.value = "";

    if (erreur_nom) erreur_nom.textContent = "";
    if (erreur_prenom) erreur_prenom.textContent = "";
    if (erreur_telephone) erreur_telephone.textContent = "";
    if (erreur_jours) erreur_jours.textContent = "";

    if (jours) {
        for (let i = 0; i < jours.length; i++) {
            jours[i].checked = false;
        }
    }
}

// Réinitialiser les erreurs et champs à l’ouverture de chaque modal

// Modal 1 - confirmer_ins
let modalConfirmer = document.getElementById('inscriptionModal');
if (modalConfirmer) {
    modalConfirmer.addEventListener('show.bs.modal', function () {
        resetForm("nom1", "prenom1", "telephone1", "erreur_nom1", "erreur_prenom1", "erreur_telephone1");
    });
}

// Modal 2 - valider_ins
let modalValider = document.getElementById('inscriptionModalPersonnalise');
if (modalValider) {
    modalValider.addEventListener('show.bs.modal', function () {
        resetForm("nom2", "prenom2", "telephone2", "erreur_nom2", "erreur_prenom2", "erreur_telephone2");
    });
}



function valider_formulaire(form_id, nom_id, prenom_id, telephone_id, erreur_nom_id, erreur_prenom_id, erreur_telephone_id){
    let form = document.getElementById(form_id);

    // Récupération des champs
    let nom = document.getElementById(nom_id);
    let prenom = document.getElementById(prenom_id);
    let telephone = document.getElementById(telephone_id);
    let max_jours = document.getElementsByName("jours[]");

    // Récupération des éléments d'erreur
    let erreur_nom = document.getElementById(erreur_nom_id);
    let erreur_prenom = document.getElementById(erreur_prenom_id);
    let erreur_telephone = document.getElementById(erreur_telephone_id);
    let erreur_jours = document.getElementById("max_jours_erreur2");

    
    form.addEventListener("click", function (event) {
        let valide = true;

        // Réinitialiser les messages d'erreur
        erreur_nom.textContent = "";
        erreur_prenom.textContent = "";
        erreur_telephone.textContent = "";
        erreur_jours.textContent = "";


        // Expression régulière pour un numéro de téléphone français valide
        let verifier_numero = /^0[1-9](\s?[0-9]{2}){4}$/;

        // Expression regulière pour verifier la validé du nom et du prenom
        const nom_prenom_valide = /^[A-Za-z]+([ -][A-Za-z]+)*$/;


        // Vérifier que les champs ne sont pas vides d'abord
        if(nom.value.trim() === "") {
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

        

        // Validation du téléphone (format français)
        if(telephone.value.trim() !== "") 
        {
            if(!verifier_numero.test(telephone.value.trim()))
            {
                erreur_telephone.textContent = "Le numéro doit être au format valide (ex: 0123456789 ou 01 23 45 67 89).";
                event.preventDefault();
            }
        }

        if(form.value == "valider_inscriptionI"){
            
            let nbChecked = 0;


            for (let i = 0; i < max_jours.length; i++) {
                if (max_jours[i].checked) {
                    nbChecked++;
                }
            }

            if (nbChecked > 5) {
                erreur_jours.textContent = "Vous ne pouvez sélectionner que 5 jours maximum.";
                valide = false;
            } 

            if (nbChecked == 0){
                erreur_jours.textContent = "Vous devez choisir au moins un jour";
                valide = false;
            }

            for(let i = 0; i < max_jours.length; i++){
                max_jours[i].addEventListener("change", function(){
                        erreur_jours.textContent = "";
                });
            }
        
        }
        

        // Si une erreur est présente, empêcher la soumission du formulaire
        if (!valide) {
            event.preventDefault();
        }
    });

    // Efface les messages d'erreur dès que l'utilisateur commence à modifier un champ
    nom.addEventListener("input", function () {
        erreur_nom.textContent = "";
    });

    prenom.addEventListener("input", function () {
        erreur_prenom.textContent = "";
    });

    telephone.addEventListener("input", function () {
        erreur_telephone.textContent = "";
    });
    
}

valider_formulaire("confirmer_ins", "nom1", "prenom1", "telephone1", "erreur_nom1", "erreur_prenom1", "erreur_telephone1");
valider_formulaire("valider_ins", "nom2", "prenom2", "telephone2", "erreur_nom2", "erreur_prenom2", "erreur_telephone2");