<?php
// Classecommande: gestion des objets 'commande'

class commande extends _model
{

    // attributs à valoriser
    protected $table = "commande";               // Nom de la table
    protected $fields = ["lieu", "heure_commande", "heure_livraison", "statut", "user", "reference_ticket", "total_ttc"];       // 

    protected $links = ["user" => "user"];



    //          dans la liste des commandes passées par un utilisateur
    //          une seule commande peut avoir le statut 'en cours', puisque les autres sont ou terminée ou supprimées. 
    //          si dans la liste il n'y a pas des comm 'en cours': on crée une nouvelle commande ;

    function getCommandeEnCours()
    {
        //role: vérifie si une commande est 'en cours' de création par l'utilisateur connecté 
        //parametres: $userId : id de l'utilisateur connecté (ou de la borne); 
        //            $statut : le statut des commandes passées par cet user.

        //retour: true si l'évaluation existe - false sinon
        $userId = session_idconnected();

        //une requette sql pour vérifier si une commande faite par cet User a le statut 'en cours'
        // SELECT `id`, `lieu`, `heure_commande`, `heure_livraison`, `statut`, `user`, `reference_ticket`, `total_ttc` 
        //FROM $this->table    (`commande`) 
        // WHERE `user`=:id  AND `statut`=0 
        $sql = "SELECT `id`, `lieu`, `heure_commande`, `heure_livraison`, `statut`, `user`, `reference_ticket`, `total_ttc`
                FROM $this->table 
                WHERE `user`=:id  AND `statut`= :statut";

        $param = [
            ":id" => $userId,
            ":statut" => 0
        ];

        // prépare
        global $bdd;
        $req = $bdd->prepare($sql);

        // exécute
        $req->execute($param);

        // Récupère la ligne
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        // Charge la commande avec ses détails
        $this->load($resultat["id"]);

        // verification et condition: si la ligne existe: retourne true, sinon false
        if ($this->is()) {
            return true;

        } else {
            
            return false;
        }
    }


    function creaCommande($user, $lieu, $statut, $heureCommande ){
          // Rôle : créer une nouvelle commande et mettre à jour la BDD
        // Paramètres : les données disponibles récupérées  (user, lieu, statut)
        //      $user : id de l'utilisateur
        //      $produit : id du produit
        //      $statut: en cours ou terminée
        //      $heureCommande: l'heure récupérée automatique
        // Retour : true si ok, false sinon

        // Mettre à jour les attrributs
        $this->set("user", $user);
        $this->set("lieu", $lieu);
        $this->set("statut", $statut);
        $this->set("heure_commande", $heureCommande);
        // Enregistter les modifs dabs la BDD
        $this->insert();

        return true;


    }
}
