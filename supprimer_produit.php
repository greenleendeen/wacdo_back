<?php
/*
Controleur : supprime un produit dans la base de données

Parametres: get id: le id du produit à supprimer

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// récupération des paramètres / vérification

if (isset($_GET["id"])){
        $idProduit = $_GET["id"];
} else {
       $idProduit = 0;
}

echo "l'id $idProduit ";

// traitement sur la bdd
// on crée l'objet produit
$produit= new produit();
// on le charge avec le id prévu
$produit->load($idProduit);

//si il n'existe pas

if(! $produit->is()){
echo "n'existe pas";
} else {
//sinon génère la page de détail produit.
// on utilise le template detail_produit.php
}

// Suppression dans la BDD 

$produit->delete();
// on affiche la liste : liste_produits.php
// Il a besoin de $liste : liste des produits
$liste = $produit->listAll();
include "templates/pages/liste_produits.php";