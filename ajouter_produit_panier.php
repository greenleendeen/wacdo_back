<?php
/*
Controleur : vérifie les saisies et ajoute une ligne de produit lié à une commande

Parametres: le ID de la commande en cours de composition (GET : id)
            POST : $produit: le produit selectionné dans le formulaire


*/

 //Initialisation 
require_once "utils/init.php";
// verifier si l'user est connecté 
require_once "utils/verif_connexion.php";

// Récupération des paramètres

// dans l'objet commande
$commande = new commande();
//vérifier si une commande est en cours: récupérer le id de la commande
// créer une méthode qui fait cette vérification: getCommandeEnCours();
$isChargee = $commande->getCommandeEnCours();

/*
// le id de la commande en cours:
if(isset($_GET["id"])) {
    
    $idCommande=$_GET["id"];
}else {
   $idCommande=0;
  
}
echo "commande en cours n° $idCommande" ;
echo "<br>";


// charger avec le id prévu:
$commande->load($idCommande);
print_r ($commande);

*/

// création objet produit, lignecommande
$produit = new produit();

//vérification et récupération POST produit dans le formulaire
if(isset($_GET["id"])) {
    $idProduit = $_GET["id"];
}else {
    $idProduit=0;
}

$produit->load($idProduit);
print_r($produit);

if (isset($_POST['categorie']) && isset($_POST['produit'])&& isset($_POST['quantite']) ) {
    // récuperer les variables
    $categorie = $_POST['categorie'];
    $produit = $_POST['produit'];
    $quantite_produit = $_POST['quantite'];

    echo"coucou";
$lignecommande = new lignecommande();

$lignecommande->ajouterLigneCommande($commande, $produit, $quantite_produit);
 

    //affichage de la page de composition commande 
    //(retour sur afficher_form_crea_commande.php) jusqu'à la validation de la comm = changement de son statut

    include "templates/pages/afficher_form_crea_commande.php";
}


// si la commande existe: 
//$commande->load($idCommande);
/*
if (!$commande->is()) {

if(isset($_GET["id"])) {
    // récupération dans le tableau $_GET de l'index "id"
    $idCommande=$_GET["id"];
}else {
    $idCommande=0;
}
echo "l'id est $idCommande <br> <br>" ;

//créér l'objet commande

$commande = new commande();

// si le valeurs données sont acceptées, créer (inserer la commande dans la bdd)
if ($commande->loadFromTab($_POST)) {
   
    print_r ($commande);

$commande->insert();
} else {
    echo"erreur";
}
    */