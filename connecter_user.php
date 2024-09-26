<?php
/*
    Controleur :  vérifie et valide les champs de l’identification,  connecte l’utilisateur ou ré-affiche le formulaire, affiche la page d’accueil respective (ad, pc, ea)
    
    Parametres: POST: mail , motdepasse , role:  les valeurs inscrites dans les  champs
*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// verification des données insérées dans le input : si les valeurs ne sont pas nulles
if (isset($_POST['login']) && isset($_POST['motdepasse'])) {

    // vérifie si les données role, login et mot de passe sont corrècts.  j'appelle la fonction verifier_connexion() dans user.php

    // création de l'objet user pour recupérer les données 
    $user = new user();

    // je mets dans $reponse ce qui a été posté dans le input du formulaire
    $reponse = $user->verifier_connexion($_POST['login'], $_POST['motdepasse']);

    // si l'idenetnification est corecte: commence la session et affiche la page d'accueil correspondante
    
    if ($reponse === true) {
        session_connect($user->id());
   // echo "coucou  <br><br>";
     }

    else {
        echo "erreur  <br><br>";
    }

    // si role = ad: affiche page administrateur; sinon: page preparateur de commande; sinon: page equipier d'accueil
    $roleUser = $user->get("role");
    //  echo $roleUser;

    if ($roleUser === "ad") {

        include "templates/pages/accueil_admin.php";
        exit;

    } else if ($roleUser === "pc") {

        include "templates/pages/accueil_prepa_commande.php";
        exit;

    } else if ($roleUser === "ea") {

        include "templates/pages/accueil_equipier.php";
        exit;

    } 
} 
else {
    // si idenetnification incorrecte: message d'erreur
    include "templates/pages/connexion_user.php";
   
    exit;
}

