<?php
/*
Template de page complète : la page qui affiche pour l'administrateur connecté la liste des produits avec différentes actions à effectuer

Paramètres :
    $listeProduits : tableau d’objets produits indexes par leur id  
*/

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page produits </title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <h1> Produits </h1>
    <div class="conteiner">
        <div class="item">
            <a href="afficher_form_ajout_produit.php"> <button class="button">ajouter un nouveau produit </button> </a>
        </div>
    </div>

    <!-- Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter-->
    <?php
    include "templates/fragments/div_user_connected.php";
    ?>
    <!-- ici  la carcasse du tableau avec le foreach -> pour chaque produit-->
    <table class="">
        <thead>
            <tr class="">
                <th scope="col">Nom du produit</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Image</th>
                <th scope="col"> En stock</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <?php
        // pour chaque produit de la liste - afficher la div fragment_produit
        foreach ($listeProduits as $id => $produit) {
            // affiche la div fragment_produit.php
            include "templates/fragments/fragment_produit.php";
        }
        ?>
    </table>
</body>
</html>