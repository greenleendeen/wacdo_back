<?php
// Classe user : gestion des objets utilisateurs 

class user extends _model {

    // attributs à valoriser
    protected $table = "user";               // Nom de la table
    protected $fields = [ "nom_user", "login", "motdepasse", "role" ];       // 



    // methode verifier_connexion($login , $motdepasse ) 
    // rôle: vérifier si les données de connexion introduites dans le formulaire sont corectes: existent dans la bdd 
    //parametres: $login $motdepasse (les identifiants de l'utilisateur) 
    //            $user: l'objet utilisateur qui est sur une ligne 

    function verifier_connexion($login, $motdepasse)
    {

        //récupérer avec une requête SQL ----la ligne de l'utilisateur ---- correspondant au login dans la BDD

        // requette sql: $sql = "SELECT...
        $sql = "SELECT  `id`,`login`,`motdepasse` FROM `user` WHERE `login` = :login ";

        // valorisée dans un tableau
        $param = [":login" => $login];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et  $req->execute($param)
        global $bdd;
        $req = $bdd->prepare($sql);

        // si la requette n'execute pas les parametres demandés:
        if (!$req->execute($param)) {
            // On a une erreur de requête 
            return false;
        }

        // fetch recupère une ligne.. 
        $user = $req->fetch(PDO::FETCH_ASSOC);
       
        // correspondant au login: si le login saisi est le même que celui de la bdd: affiche 

        // si $user n'est pas vide
        if (!empty($user)) {

            //On teste que le mot de passe passé en paramètre correspond au mot de passe récupéré.
            if (password_verify($motdepasse, $user["motdepasse"])) {
                //Si tout est bon, on charge l'objet de l'utilisateur à partir de l'id
                $this->load($user["id"]);

                //Si le mot de passe est bon, on renvoi True 
                return true;
            } else {
                //sinon on renvoie False
                return false;
            }
            //  if : terminé

        } else {
            return false;
        }
    }
    // verifier_connexion: terminé    

}