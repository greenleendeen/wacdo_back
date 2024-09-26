<?php
/*

Template de page complète : affiche la page d’accueil d’un utilisateur-administrateur

Paramètres : 
    $user : objet user chargé avec ses détails
    
*/

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil administateur</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="">

    <div class=" ">
        <h1> Accueil administateur Wacdo</h1>

        <?php
        include "templates/fragments/div_user_connected.php";
        ?>
        <div class="flex spaceAround pseudoNav">
            <a href="afficher_liste_produits.php"><button class="button">produits</button> </a>
            <a href="afficher_liste_menus.php"><button class="button">menus</button> </a>
            <a href="afficher_liste_users.php"><button class="button">personnel</button> </a>
        </div>
    </div>


</body>

</html>