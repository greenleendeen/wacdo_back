<?php
/*
Controleur : affiche le formulaire d'ajout d'un nouveau produit

Parametres: néant

*/
// génération de la page du formulaire : le template formulaire_ajout_produit

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// traitement sur la bdd
//créér l'objet appartement
$produit = new produit();




// include template formulaire_ajout_produit.php

include "templates/pages/formulaire_ajout_produit.php";
