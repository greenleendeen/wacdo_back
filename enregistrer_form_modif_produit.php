<?php
/*
Controleur : enregistre les modification d'un produit

Parametres: GET: l'id du produit modifié
            POST: les valeurs modifiées

*/

// initialisations
require_once "utils/init.php";

if(isset($_GET["id"])) {
    $idProduit=$_GET["id"];
}else {
    $idProduit=0;
}
//echo "l'id du produit est $idProduit <br> <br>" ;


// traitement sur la BDD
// créer un objet 'produit'
$produit = new produit();

//  - charger de la classe produit, avec son id
$produit->load($idProduit);
// print_r ($produit);

// si il n'exsiste pas
if (! $produit->is()){ 

//affiche la liste
//initialise les parametres
echo "id $appart n'existe pas" ;
// on ne peut pas faire la modif
exit;
}  

if ($produit->loadFromTab($_POST)){
//si il accepte les nouvelles valeurs (opération réussie): update la bdd
    
$produit->update();
    // affiche la liste des produits 
    include "templates/pages/accueil_admin.php";
    include "templates/fragments/detail_produit.php";
  
} else {
    // Les valeurs ont été refusées : on réaffiche le formulaire

    include "templates/pages/formulaire_ajout_produit.php";
    echo "valeurs refusées";
  
}