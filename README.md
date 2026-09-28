# 🏋️‍♂️  Sportify – Plateforme de Sport Interactive

**Sportify** est une plateforme web dédiée au **sport en ligne**, permettant aux utilisateurs de découvrir des activités sportives, s’inscrire, se connecter, gérer leur profil et demander un devis pour des services personnalisés.

> ⚠️ Ce projet est purement sportif et n’a **aucun lien avec Spotify**, le service de streaming musical.

---

## 🖼️ Aperçu


# ![Fatimatou](https://github.com/Fatimatou-DIALLO-87/Sportify/blob/master/gif_sportify.gif)



## 🚀 Fonctionnalités principales

- Création de compte et authentification
- Espace utilisateur personnalisé (le nom de l’utilisateur connecté s’affiche suivi du boutton Déconnexion)
- Consultation d’activités sportives proposées
- Formulaire de contact intégré
- Système de demande de devis
- Réinitialisation de mot de passe

## 🛠️ Technologies utilisées

- **Frontend :** HTML, CSS, JavaScript, Bootstrap
- **Backend :** PHP
- **Base de données :** MySQL 
- **Autres :** Git pour le versionnement

## Structure du projet

Sportify/ <br>
├── index.php                                # Page d'accueil <br>
├── inscription.php                          # Formulaire d'inscription  <br>
├── connexion.php                            # Formulaire de connexion  <br>
├── activites.php                # Activités sportives proposées  <br>
├── devis.php                 # Formulaire de devis         <br>
├── reset.php                 # Réinitialisation mot de passe      <br>
│  <br>
├── gestion_inscription.php   # Traitement inscription  <br>
├── gestion_connexion.php     # Traitement connexion  <br>
├── gestion_contact.php       # Traitement formulaire de contact  <br>
├── gestion_devis.php         # Traitement formulaire de devis  <br>
│
├── script_insc.js            # JavaScript - Inscription  <br>
├── scriptconnect.js          # JavaScript - Connexion  <br>
├── script_activite.js        # JavaScript - Activités   <br>
├── script_devi.js            # JavaScript - Devis        <br>
├── script_contact.js         # JavaScript - Contact       <br>
├── script_pass_oublie.js     # JavaScript - Réinitialisation    <br>
│  <br>
├── style.css                 # Style global        <br>
├── style_connexion.css       # Style page connexion      <br>
├── style_inscription.css     # Style page inscription      <br>
├── style_activites.css       # Style page activités         <br>
└── style_devi.css            # Style page devis          <br>

### 🔧 Comment tester le projet en local

#### Prérequis

- Avoir installé un serveur local tel que :
  - [XAMPP](https://www.apachefriends.org/fr/index.html)
  - [WAMP](https://www.wampserver.com/)
  - [MAMP](https://www.mamp.info/en/)
- Disposer d’un navigateur web moderne (Chrome, Firefox…)
- PHP 7.4 ou version ultérieure installé

---

#### Étapes à suivre

1. **Téléchargez ou clonez le projet** :
   - Si vous avez un fichier `.zip`, décompressez-le.
   - Copiez le dossier `Sportify` dans :
     - le dossier `htdocs/` si vous utilisez **XAMPP**
     - le dossier `www/` si vous utilisez **WAMP** ou **MAMP**

2. **Démarrez votre serveur local** :
   - Lancez votre environnement (XAMPP, WAMP, etc.)
   - Lancez Apache et MySQL via XAMPP/WAMP

3. **Lancez l’application** :
   - Ouvrez votre navigateur web
   - Accédez à l’adresse suivante :  
     [http://localhost/Spotity/index.php](http://localhost/Sportify/index.php)

4. **Testez les fonctionnalités disponibles** :
   - Inscrivez-vous en créant un compte
   - Connectez-vous avec vos identifiants
   - Vérifiez que votre **nom s’affiche dans l’en-tête**
   - Naviguez dans les différentes pages : Activités, Devis, Contact
   - Testez les boutons **"S’inscrire"**, **"Se déconnecter"**, etc.

---
### Remarques techniques importantes
-🌐 L’interface du site utilise Bootstrap via un CDN : une connexion Internet est donc nécessaire pour que le style s’affiche correctement.

-✉️ Les fonctionnalités d’envoi de messages (ex. : formulaire de contact, réinitialisation de mot de passe) nécessitent la configuration d’un serveur de messagerie local compatible avec PHP, tel que Sendmail, généralement inclus avec XAMPP sur Windows.
