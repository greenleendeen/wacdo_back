<?php
// Classe lignecommande: gestion des objets 'lignecommande'

class lignecommande extends _model
{

    // attributs à valoriser
    protected $table = "lignecommande";               // Nom de la table
    protected $fields = ["commande", "produit", "quantite_produit", "prix", "statut", "paiement" ];       // 

    protected $links = ["commande" => "commande" , "produit" => "produit"] ;


    function ajouterLigneCommande($commande, $produit, $quantite_produit){
        // Rôle : créer une nouvelle ligne de commande et mettre à jour la BDD
      // Paramètres : les données disponibles récupérées dans le formulaire ()
      //      $commande: le id de la commande en cours
      //      $produit : id du produit
      //      $quantite: la quantité
      // Retour : true si ok, false sinon

      // Mettre à jour les attrributs
      $this->set("commande", $commande);
      $this->set("produit", $produit);
      $this->set("quantite", $quantite_produit);
     // $this->set("prix", $prix);

      // Enregistter les modifs dabs la BDD
      $this->insert();

      return true;


  }


}