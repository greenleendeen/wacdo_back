<?php
/*
Controleur : enregistre le formulaire d'ajout d'un nouveau produit
    
Parametres: 
POST: les valeurs inscrites dans les champs 
*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";



// vérification si le formulaire a été sousmis

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $prix= $_POST['prix'];
   // $image = $_FILES['image'];

   /*
// Vérifier que le fichier est uploader
if (empty($_FILES["image"])) {
    // Erreur : pas de fichier envoyé
    // traitement (message / template)
    exit;
} 

$image= $_FILES["image"];
// Code erreur
$code = $image["error"];
if ($code == UPLOAD_ERR_INI_SIZE or $code == UPLOAD_ERR_FORM_SIZE) {
    // Erreur : fichier trop gros
    // traitement (message / template)
    exit;
} else if ($code != UPLOAD_ERR_OK) {
    // Erreur : autre ereur technique
    // traitement (message / template)
    exit;
}

// On a bien un fichier
// On a décidé de le stocker dans le dossier "./fichiers", avec un nom aléatoire, 
$nom = time() . "-" . uniqid();
// ON conserve l'extension
// Le nom d'origine est dans $file["name"]
$nom .= "." . pathinfo($image["name"], PATHINFO_EXTENSION);
// On va copier le fichier chargé dans ./fichiers/$nom
// Le fichier est dans $file["tmp_name"]
// ON va s'assurer que le répertoire est créé
if ( !  is_dir("images")) mkdir("images", 0777, true);
// vérifier que le nom n'existe pas déjà
if (file_exists("images/$nom")) {
    // On cherche un autre nom
}


move_uploaded_file($image["tmp_name"], "images/$nom");
}
// fin verification upload fichiers

// Récupération des valeurs des champs 
/*
if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
}*/

// traitement sur la bdd
//création de l'objet produit
$produit = new produit();

if ($produit->loadFromTab($_POST)) {
    // si les nouvelles valeurs sont acceptées: on les enregistre dans la BDD
   // print_r ($produit);

   
    $produit->insert();

    // insert le nouveau produit avec la fonction insert() : ajout de l'objet courant dans la BDD
   
    // on affiche la liste des produits , on a déjà son paramètre $produit
    $listeProduits = $produit ->listAll();
   
    include "templates/pages/liste_produits.php";
  
} else {
    // Les valeurs ont été refusées : on réaffiche le formulaire
    // on a déjà son paramètre $produit

    include "templates/pages/formulaire_ajout_produit.php";
    echo "valuers refusées";
  
}
}
// si la case 'valide' (qui correspond au paiement de la commande) est non: dans la case commande inserer 'commande' inscrire le -> last insert id 
// si valide est oui: faire le update sur la bdd 'commande' avec le remplissage de tous les champs demandés