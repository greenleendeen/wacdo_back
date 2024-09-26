<?php
/*
Controleur : génère la liste des produits
Paramètres : néant

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// récupération / analyse des paramètres : néant
$idcategorie = $_GET['idcategorie'];

// création de l'objet produit pour lui demander la liste des produits

$produit = new produit();



// Affichage de la liste : template de page : accueil_liste_produits.php
include "templates/fragments/selection_produits_categorie.php";