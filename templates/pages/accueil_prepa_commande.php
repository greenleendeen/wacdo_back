<?php
/*

Template de page complète : affiche la page d’accueil d’un utilisateur-préparateur de commande

Paramètres : 
    $user : objet user chargé avec ses détails
    
*/

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil préparateur commande</title>
    <link rel="stylesheet" href="/css/style.css">
    
</head>

<body>

    <div class="block">
        <h2> Accueil préparation de commandes Wacdo</h2>

        <?php
        include "templates/fragments/div_user_connected.php";
        ?>

        <div class="block flex spaceAround">
            
            <div class="div45">
                <h3>liste des commandes</h3>
            </div>

            <div class="div45">
                <h3>detail commande en cours</h3>
            </div>
    </div>
    </div>

</body>

</html>