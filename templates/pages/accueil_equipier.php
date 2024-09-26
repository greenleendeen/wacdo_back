<?php
/*

Template de page complète : affiche la page d’accueil d’un utilisateur-equipier d'accueil

Paramètres : 
    $user : objet user chargé avec ses détails
    
*/

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil equipier d'accueil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="">

    <div class="padding">
        <h2 class=""> Accueil équipier: prise et remise des commandes Wacdo </h2>

        <?php
        include "templates/fragments/div_user_connected.php";
        ?>
        <div class="margin active pseudoNav">
            <h3 class="padding"> vous pouvez créer une commande:</h3>
            <div class="flex spaceAround ">
                <!-- formulaire de CREATION commande "sur place"-->
                <form method="post" action="afficher_form_crea_commande.php">
                    <select hidden id="lieu" name="lieu">
                        <option value="place" selected>sur place</option>
                    </select>

                    <select hidden id="statut" name="statut">
                        <option value="0" selected>en cours</option>
                    </select>

                    <input type="hidden" name="heure_commande" value="<?php echo date('Y-m-d H:i:s'); ?>">

                    <input class="button" type="submit" name="submit" value="sur place">
                </form>


                <!-- formulaire de CREATION commande "à emporter"-->
                <form method="post" action="afficher_form_crea_commande.php">
                    <select hidden id="lieu" name="lieu">
                        <option value="emport" selected>sur place</option>
                    </select>
                    <select hidden id="statut" name="statut">
                        <option value="0" selected>en cours</option>
                    </select>
                    <input class="button" type="submit" name="submit" value="à emporter">
                </form>


                
                <a href="enregistrer_commande.php"><button class="button">valider le paiement</button> </a>
            </div>
        </div>



    </div>


</body>

</html>