<?php
/*
Controleur : affiche le formulairede de création et saisie d'une commande en cours ou nouvelle commande 
            avec la saisie 'ligneproduit'

Parametres: $commande (si elle existe) POST 'statut' dans le formulaire

*/
// génération de la page du formulaire : le template fragment_saisie_commande_accueil

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";
// vérification session: si on est connecté: récupérer le user ; (  require_once "utils/verif_connexion.php";)
//                       si on n'est pas connecté : redirection / affichage du formulaire de connexion

require_once "utils/verif_connexion.php";

// verifier si pour cet utilisateur si une commande est 'en cours' 

// dans l'objet commande
$commande = new commande();
//vérifier si une commande est en cours: récupérer le id de la commande
// créer une méthode qui fait cette vérification: getCommandeEnCours();
$isChargee = $commande->getCommandeEnCours();

// Si la commande n'a pas été chargée, on n'a aucune commande en cours et on va en créer une
if (!$isChargee) {

    // vérifier les informations
    if (isset($_POST['lieu']) && isset($_POST['statut'])) {
        // récuperer les variables
        $lieu = $_POST['lieu'];
        $statut = $_POST['statut'];
        $heureCommande = $_POST['heure_commande'];

        // créer la nouvelle commande
        $commande->creaCommande($user->id(), $lieu, $statut, $heureCommande); // et les autres parametres...

        echo "Nouvelle commande ajoutée avec succès";
    }
}

/* PREPARATION DU FORMULAIRE DE SELECTION PRODUIT*/

// création objets, produit, lignecommande
$produit = new produit();
$lignecommande = new lignecommande();

// afficher le formulaire
// include template et fragment
include "templates/pages/accueil_equipier.php";
include "templates/fragments/fragment_saisie_commande_accueil.php";



    