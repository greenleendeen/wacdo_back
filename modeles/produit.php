<?php
// Classe produit: gestion des objets 'produit'

class produit extends _model
{

    // attributs à valoriser
    protected $table = "produit";               // Nom de la table
    protected $fields = ["nom", "categorie", "description", "prix", "image", "stock"];       // 

    protected $links = ["categorie" => "categorie"];


    function getSelectCategorie()
    {
        // Rôle : crée le code HTML pour la sélection d'une categorie pour un produit
        // Paramètre : néant
        // Retour : la balise SELECT complète


        /* resultat de ce genre :
        <select name="categorie">
        <option value="1">menus</option>
        <option value="2" selected>boissons</option>
        </select>
        */

        // génréer le début du résultat
        $html = "<select name='categorie' id='categorie'>\n";
        // Faire les lignes d'option
        // Pour cahque categorie, on fait une ligne d'option
        foreach ($this->getTarget("categorie")->listAll("+nom_cat") as $idCategorie => $categorie) {
            // Faire la ligne de option :
            // <option value="id" selected_si_categorie>nom_cat</option>
            // On va préparer $selected avec soit vide, soit le texte selected
            // Si $idCategorie = attribut categorie du produit courrant : $selected = "selected"
            // Sinon : $selected = ""
            if ($idCategorie == $this->get("categorie")) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $html .= "<option value='$idCategorie' $selected>"
                . $categorie->get("nom_cat") .  "</option>\n";
        }

        // Finir le html
        $html .= "</select>";
        // Retourner
        return $html;
    } ///OK


    // faire d'abord une requette sql pour trouver les produits qui appartiennent  à une catégorie:
    //$sql = "SELECT * FROM `produit` WHERE `categorie`=6";

    function getListeProduitFromCat($idCategorie)
    {
        //role: fournir la liste des produits qui apartiennent à une catégorie donnée
        // parametres: $idCategorie: la catégorie demandée 
        // retour: liste des produits ou tableau vide (si pas de produits dans la catégorie)


        $sql = "SELECT `id`, `nom`, `categorie`, `prix` FROM `produit` WHERE `categorie`= :id ";
        // valorisée dans un tableau
        $param = [":id" => $idCategorie];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et $req->execute($param)
        // La prépare
        global $bdd;
        $req = $bdd->prepare($sql);

        // L'exécute
        $req->execute($param);

        // Récupère le tableaux des lignes 
        $produits = $req->fetchAll(PDO::FETCH_ASSOC);
        //  print_r ($produits);
        //ok//

        // extraire la liste des produits ou une liste vide
        // Transformer son résulat en une liste d'objet produit
        // Pour chaque ligne récupérée : générer l'objet produit correspondant dans le résultat

        $result = [];       // tableau de résultat vide
        foreach ($produits as $detail) {

            // générer un objet evaluation chargé avec son $detail
            $produit = new produit();
            $produit->loadFromTab($detail);
            // L'ajouter dans $result
            $result[$produit->id()] = $produit;
        }        
        // print_r($result);
        // Retourner ce résultat
        return $result;

        // la fonction marche--> page test: $produit = new produit();
        // $produit -> getListeProduitFromCat($idCategorie=6);
        // affiche:    Array ( [0] => Array ( [id] => 1 [nom] => Menu Le 280 [categorie] => 6 [prix] => 9.00 ) 
        //                     [1] => Array ( [id] => 2 [nom] => Menu Big Tasty [categorie] => 6 [prix] => 10.60 )
        //                     [2] => Array ( [id] => 3 [nom] => Menu Big Tasty Bacon [categorie] => 6 [prix] => 10.90 ) 
        //                     [3] => Array ( [id] => 4 [nom] => Menu Big Mac [categorie] => 6 [prix] => 8.00 ) ) 


    }
    
    function getSelectTaille($idCategorie){
        //role: vérifier quelle est la catégorie selectionnée et afficher le bon select
        // parametres: $idCategorie: la catégorie selectionnée
        // retour: le formulaire select correspondant


        // d'abord récupérer le id de la catégorie choisie 
       
        $idCategorie = $_GET['idCategorie'];
        //si la catégorie choisie est = 6 ( c a d menu)
        //affiche selectMenu
        //sinon affiche selectProduit

       if ($idCategorie === 6 ) {
        include "div_select_menu.php";
       } else {
        include "div_select_produit.php";
       }

    }




}
