<?php
/*
Controleur : récupere et affiche les détails d'un produit (nom, description, prix, image)

Parametres: le id du produit à afficher (GET: id)

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

//verification si user connecté
require_once "utils/verif_connexion.php";


// récupération des paramètres / vérification
// récupére l'id fourni, ou 0 si pas d'id
// si l'index "id" existe dans le tableau $_GET

if (isset($_GET["id"])){
    // récupere dans le tableau $_GET l'index "id" -> dans la variable $idProduit
    $idProduit = $_GET["id"];

} else {
    //sinon la variable $idProduit reçoit 0
   $idProduit = 0;
}
//echo "l'id du produit est $idProduit ";

// traitement sur la bdd
// on crée l'objet produit
$produit= new produit();
// on le charge avec le id prévu
$produit->load($idProduit);

//si il n'existe pas, on affiche la liste (avec le template afficher_liste_produits.php)

if(! $produit->is()){
//affiche la liste: appelle la function is() dont le rôle est de dire si l'objet est chargé (si il y ce produit dans la BDD )
//echo "not ok";

} else {
//sinon génère la page de détail produit.
// on utilise le template détail_produit.php
include "templates/pages/accueil_admin.php";
include "templates/fragments/detail_produit.php";
//echo" voici votre détail du produit" ;

}