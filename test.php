<?php

/*
Controleur de test : 
Paramètres : 
*/


// Initalisations
include "utils/init.php";

echo "coucou <br> <br> " ;

$produit = new produit();
$produit -> getSelectTaille($idCategorie);

