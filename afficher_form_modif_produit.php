<?php
/*
Controleur : récupere et affiche le produit à modifier et le formulaire de modification avec des champs à remplir ou à modifier

Parametres: le id du produit (GET:id - le id du produit à modifier)

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

//verification si user connecté
require_once "utils/verif_connexion.php";

// récupération des paramertes et vérification
// le id fourni ou 0 si il n'y a pas de id
// vérifie si l'index "id" existe dans le tableau $_GET

if(isset($_GET["id"])) {
    $idProduit=$_GET["id"];
}else {
    $idProduit=0;
}
echo "l'id du produit est $idProduit <br> <br>" ;


// traitement sur la BDD
// créer un objet 'produit'
$produit = new produit();

// charger avec le id prévu:
$produit->load($idProduit);

print_r ($produit);
// si il n'existe pas
if (! $produit->is()) {

    echo "pas chargé: l'id $idProduit n'existe pas";

} else {
// sinon: génerer la page avec le formulaire de modification du produit: template form_modif_produit

// affichage
include "templates/pages/formulaire_modif_produit.php";

}




